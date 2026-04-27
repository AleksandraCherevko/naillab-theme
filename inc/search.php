<?php

defined('ABSPATH') || exit;

function naillab_is_product_search_query($query) {
    if (is_admin() || !$query instanceof WP_Query) {
        return false;
    }

    if (!$query->is_main_query() || !$query->is_search()) {
        return false;
    }

    $post_type = $query->get('post_type');

    if ($post_type === 'product' || $post_type === '' || $post_type === null) {
        return true;
    }

    if (is_array($post_type) && in_array('product', $post_type, true)) {
        return true;
    }

    return false;
}

function naillab_normalize_search_text($text) {
    $text = remove_accents((string) $text);
    $text = mb_strtolower($text, 'UTF-8');

    return trim(wp_strip_all_tags($text));
}

function naillab_split_search_terms($search) {
    $terms = preg_split('/\s+/', trim((string) $search));
    $terms = array_filter(array_map('trim', $terms));

    return array_values($terms);
}

function naillab_is_numeric_search_term($term) {
    $plain = str_replace('#', '', trim((string) $term));

    return $plain !== '' && preg_match('/^\d+$/', $plain);
}

function naillab_numeric_term_pattern($term) {
    $plain = str_replace('#', '', trim((string) $term));
    $plain = ltrim($plain, '0');
    $plain = $plain === '' ? '0' : $plain;

    return '/(^|[^0-9])#?\s*0*' . preg_quote($plain, '/') . '([^0-9]|$)/u';
}

function naillab_get_product_taxonomy_text($product_id) {
    $taxonomies = get_object_taxonomies('product', 'names');

    $excluded = [
        'product_type',
        'product_visibility',
        'product_shipping_class',
    ];

    $taxonomies = array_values(array_diff($taxonomies, $excluded));

    if (!$taxonomies) {
        return '';
    }

    $terms = wp_get_post_terms($product_id, $taxonomies, ['fields' => 'names']);

    if (is_wp_error($terms) || empty($terms)) {
        return '';
    }

    return implode(' | ', $terms);
}

function naillab_match_numeric_term($term, $title, $sku, $taxonomy_text) {
    $pattern = naillab_numeric_term_pattern($term);

    if ($title !== '' && preg_match($pattern, $title)) {
        return true;
    }

    if ($sku !== '' && preg_match($pattern, $sku)) {
        return true;
    }

    if ($taxonomy_text !== '' && preg_match($pattern, $taxonomy_text)) {
        return true;
    }

    return false;
}

function naillab_match_text_term($term, $title, $sku, $excerpt, $content, $taxonomy_text) {
    $term = naillab_normalize_search_text($term);

    if ($term === '') {
        return true;
    }

    if ($title !== '' && mb_strpos($title, $term, 0, 'UTF-8') !== false) {
        return true;
    }

    if ($sku !== '' && mb_strpos($sku, $term, 0, 'UTF-8') !== false) {
        return true;
    }

    if ($taxonomy_text !== '' && mb_strpos($taxonomy_text, $term, 0, 'UTF-8') !== false) {
        return true;
    }

    if ($excerpt !== '' && mb_strpos($excerpt, $term, 0, 'UTF-8') !== false) {
        return true;
    }

    if ($content !== '' && mb_strpos($content, $term, 0, 'UTF-8') !== false) {
        return true;
    }

    return false;
}

function naillab_calculate_search_score($search, $title, $sku, $taxonomy_text, $excerpt, $content) {
    $search = naillab_normalize_search_text($search);

    if ($search === '') {
        return 999;
    }

    if ($title === $search) {
        return 0;
    }

    if ($title !== '' && mb_strpos($title, $search, 0, 'UTF-8') !== false) {
        return 1;
    }

    if ($sku !== '' && mb_strpos($sku, $search, 0, 'UTF-8') !== false) {
        return 2;
    }

    if ($taxonomy_text !== '' && mb_strpos($taxonomy_text, $search, 0, 'UTF-8') !== false) {
        return 3;
    }

    if ($excerpt !== '' && mb_strpos($excerpt, $search, 0, 'UTF-8') !== false) {
        return 4;
    }

    if ($content !== '' && mb_strpos($content, $search, 0, 'UTF-8') !== false) {
        return 5;
    }

    return 50;
}

function naillab_find_matching_product_ids($search) {
    global $wpdb;

    $search = trim((string) $search);

    if ($search === '') {
        return [];
    }

    $terms = naillab_split_search_terms($search);

    if (!$terms) {
        return [];
    }

    $rows = $wpdb->get_results(
        "
        SELECT DISTINCT
            p.ID,
            p.post_title,
            p.post_excerpt,
            p.post_content,
            sku.meta_value AS sku
        FROM {$wpdb->posts} p
        LEFT JOIN {$wpdb->postmeta} sku
            ON p.ID = sku.post_id
            AND sku.meta_key = '_sku'
        WHERE p.post_type = 'product'
          AND p.post_status = 'publish'
        "
    );

    if (!$rows) {
        return [];
    }

    $matches = [];

    foreach ($rows as $row) {
        $title = naillab_normalize_search_text($row->post_title ?? '');
        $sku = naillab_normalize_search_text($row->sku ?? '');
        $excerpt = naillab_normalize_search_text($row->post_excerpt ?? '');
        $content = naillab_normalize_search_text($row->post_content ?? '');
        $taxonomy_text = naillab_normalize_search_text(
            naillab_get_product_taxonomy_text((int) $row->ID)
        );

        $matches_all_terms = true;

        foreach ($terms as $term) {
            if (naillab_is_numeric_search_term($term)) {
                if (!naillab_match_numeric_term($term, $title, $sku, $taxonomy_text)) {
                    $matches_all_terms = false;
                    break;
                }

                continue;
            }

            if (!naillab_match_text_term($term, $title, $sku, $excerpt, $content, $taxonomy_text)) {
                $matches_all_terms = false;
                break;
            }
        }

        if (!$matches_all_terms) {
            continue;
        }

        $matches[] = [
            'id' => (int) $row->ID,
            'score' => naillab_calculate_search_score(
                $search,
                $title,
                $sku,
                $taxonomy_text,
                $excerpt,
                $content
            ),
            'title' => $title,
        ];
    }

    if (!$matches) {
        return [];
    }

    usort($matches, function ($a, $b) {
        if ($a['score'] !== $b['score']) {
            return $a['score'] <=> $b['score'];
        }

        return strcmp($a['title'], $b['title']);
    });

    return array_values(array_unique(array_column($matches, 'id')));
}

add_action('pre_get_posts', function ($query) {
    if (!naillab_is_product_search_query($query)) {
        return;
    }

    $query->set('post_type', 'product');
    $query->set('post_status', 'publish');
    $query->set('ignore_sticky_posts', true);
});

add_filter('posts_search', function ($search_sql, $query) {
    if (!naillab_is_product_search_query($query)) {
        return $search_sql;
    }

    return '';
}, 20, 2);

add_filter('the_posts', function ($posts, $query) {
    if (!naillab_is_product_search_query($query)) {
        return $posts;
    }

    $search = trim((string) $query->get('s'));

    if ($search === '') {
        return $posts;
    }

    $matched_ids = naillab_find_matching_product_ids($search);

    if (empty($matched_ids)) {
        $query->found_posts = 0;
        $query->max_num_pages = 0;

        return [];
    }

    $ordered_posts = get_posts([
        'post_type' => 'product',
        'post_status' => 'publish',
        'post__in' => $matched_ids,
        'orderby' => 'post__in',
        'posts_per_page' => -1,
    ]);

    $query->found_posts = count($ordered_posts);
    $query->max_num_pages = 1;

    return $ordered_posts;
}, 20, 2);
