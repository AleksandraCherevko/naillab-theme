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

function naillab_normalize_term($term) {
    $term = remove_accents($term);
    $term = mb_strtolower($term);
    return trim($term);
}

function naillab_unaccent_sql($field) {
    $map = [
        'á' => 'a', 'ä' => 'a', 'č' => 'c', 'ď' => 'd', 'é' => 'e', 'ě' => 'e',
        'í' => 'i', 'ň' => 'n', 'ó' => 'o', 'ř' => 'r', 'š' => 's', 'ť' => 't',
        'ú' => 'u', 'ů' => 'u', 'ý' => 'y', 'ž' => 'z',
        'Á' => 'a', 'Ä' => 'a', 'Č' => 'c', 'Ď' => 'd', 'É' => 'e', 'Ě' => 'e',
        'Í' => 'i', 'Ň' => 'n', 'Ó' => 'o', 'Ř' => 'r', 'Š' => 's', 'Ť' => 't',
        'Ú' => 'u', 'Ů' => 'u', 'Ý' => 'y', 'Ž' => 'z',
    ];

    foreach ($map as $from => $to) {
        $field = "REPLACE({$field}, '{$from}', '{$to}')";
    }

    return "LOWER({$field})";
}

add_action('pre_get_posts', function ($query) {
    if (!naillab_is_product_search_query($query)) {
        return;
    }

    $query->set('post_type', 'product');
    $query->set('post_status', 'publish');
});

add_filter('posts_clauses', function ($clauses, $query) {
    global $wpdb;

    if (!naillab_is_product_search_query($query)) {
        return $clauses;
    }

    $search = $query->get('s');

    if (!$search) {
        return $clauses;
    }

    $terms = preg_split('/\s+/', $search);
    $terms = array_filter(array_map('trim', $terms));

    if (!$terms) {
        return $clauses;
    }

    $clauses['join'] .= "
        LEFT JOIN {$wpdb->postmeta} AS naillab_sku_meta
            ON {$wpdb->posts}.ID = naillab_sku_meta.post_id
            AND naillab_sku_meta.meta_key = '_sku'
        LEFT JOIN {$wpdb->term_relationships} AS naillab_tr
            ON {$wpdb->posts}.ID = naillab_tr.object_id
        LEFT JOIN {$wpdb->term_taxonomy} AS naillab_tt
            ON naillab_tr.term_taxonomy_id = naillab_tt.term_taxonomy_id
        LEFT JOIN {$wpdb->terms} AS naillab_terms
            ON naillab_tt.term_id = naillab_terms.term_id
    ";

    $title_sql   = naillab_unaccent_sql("{$wpdb->posts}.post_title");
    $excerpt_sql = naillab_unaccent_sql("{$wpdb->posts}.post_excerpt");
    $content_sql = naillab_unaccent_sql("{$wpdb->posts}.post_content");
    $sku_sql     = naillab_unaccent_sql("naillab_sku_meta.meta_value");
    $term_sql    = naillab_unaccent_sql("naillab_terms.name");

    $where_parts = [];

    foreach ($terms as $term) {
        $normalized = naillab_normalize_term($term);
        $like = '%' . $wpdb->esc_like($normalized) . '%';

        $where_parts[] = $wpdb->prepare(
            "(
                {$title_sql} LIKE %s
                OR {$excerpt_sql} LIKE %s
                OR {$content_sql} LIKE %s
                OR {$sku_sql} LIKE %s
                OR (
                    naillab_tt.taxonomy IN ('product_cat', 'product_tag')
                    AND {$term_sql} LIKE %s
                )
            )",
            $like,
            $like,
            $like,
            $like,
            $like
        );
    }

    if ($where_parts) {
        $clauses['where'] .= ' AND ' . implode(' AND ', $where_parts);
    }

    $clauses['groupby'] = "{$wpdb->posts}.ID";

    return $clauses;
}, 20, 2);
