<?php

add_action('wp_enqueue_scripts', function () {
    $css_path = get_stylesheet_directory() . '/assets/css/style.css';
    $css_url  = get_stylesheet_directory_uri() . '/assets/css/style.css';
    $version  = file_exists($css_path) ? filemtime($css_path) : null;

    wp_enqueue_style(
        'astra-child-style',
        $css_url,
        ['astra-theme-css'],
        $version
    );
});

// Register menus
function register_menu() {
    register_nav_menu('header_menu', 'Header Menu');
    register_nav_menu('footer_info', 'Footer Info');
    register_nav_menu('footer_service', 'Footer Service');
    register_nav_menu('catalog_menu', 'Catalog Menu');
}
add_action('after_setup_theme', 'register_menu');

// Fonts
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'astra-child-google-fonts',
        'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap',
        [],
        null
    );
}, 5);

// Header script
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script(
        'astra-child-header',
        get_stylesheet_directory_uri() . '/assets/js/header.js',
        [],
        null,
        true
    );
});

// Footer script
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script(
        'astra-child-footer',
        get_stylesheet_directory_uri() . '/assets/js/footer.js',
        [],
        filemtime(get_stylesheet_directory() . '/assets/js/footer.js'),
        true
    );
});

// Home scripts
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script(
        'astra-child-home',
        get_stylesheet_directory_uri() . '/assets/js/inspire.js',
        [],
        filemtime(get_stylesheet_directory() . '/assets/js/inspire.js'),
        true
    );

    wp_enqueue_script(
        'astra-child-catalog',
        get_stylesheet_directory_uri() . '/assets/js/catalog.js',
        [],
        filemtime(get_stylesheet_directory() . '/assets/js/catalog.js'),
        true
    );
});

// Single product script
add_action('wp_enqueue_scripts', function () {
    if (is_product()) {
        wp_enqueue_script(
            'astra-child-single-product',
            get_stylesheet_directory_uri() . '/assets/js/single-product.js',
            [],
            filemtime(get_stylesheet_directory() . '/assets/js/single-product.js'),
            true
        );
    }
});

// Checkout script
add_action('wp_enqueue_scripts', function () {
    if (is_checkout()) {
        wp_enqueue_script(
            'astra-child-checkout',
            get_stylesheet_directory_uri() . '/assets/js/checkout.js',
            [],
            filemtime(get_stylesheet_directory() . '/assets/js/checkout.js'),
            true
        );
    }
});

// Account script
add_action('wp_enqueue_scripts', function () {
    if (is_account_page()) {
        wp_enqueue_script(
            'astra-child-account',
            get_stylesheet_directory_uri() . '/assets/js/account.js',
            [],
            filemtime(get_stylesheet_directory() . '/assets/js/account.js'),
            true
        );
    }
});

// WooCommerce button text
add_filter('woocommerce_product_add_to_cart_text', function () {
    return 'Přidat do košíku';
});

add_filter('woocommerce_product_single_add_to_cart_text', function () {
    return 'Přidat do košíku';
});

// Allow multiple quantities of simple products on single product page
add_filter('woocommerce_is_sold_individually', function ($sold_individually, $product) {
    if ($product && $product->is_type('simple') && is_product()) {
        return false;
    }

    return $sold_individually;
}, 10, 2);

// Turn off coupons
add_filter('woocommerce_coupons_enabled', '__return_false');

// Empty cart message translation
add_filter('gettext', function ($translated, $text, $domain) {
    if ($text === 'Your cart is currently empty.') {
        return 'Váš košík je momentálně prázdný.';
    }

    if ($text === 'Return to shop') {
        return 'Zpět do obchodu';
    }

    return $translated;
}, 20, 3);

// Search customization
require_once get_stylesheet_directory() . '/inc/search.php';

// Search result translations
add_filter('gettext', function ($translated, $text, $domain) {
    if ($text === 'No products were found matching your selection.') {
        return 'Tuto sekci právě doplňujeme. Produkty pro vás brzy přidáme.';
    }

    if ($text === 'Search results:') {
        return 'Výsledky hledání:';
    }

    return $translated;
}, 20, 3);

// Search page title
add_filter('woocommerce_page_title', function ($title) {
    if (is_search()) {
        return sprintf('Výsledky hledání: „%s“', get_search_query());
    }

    return $title;
});

// Cart quantity max according to stock
add_filter('woocommerce_quantity_input_args', function ($args, $product) {
    if (is_cart() && $product && !$product->backorders_allowed()) {
        $stock_quantity = $product->get_stock_quantity();

        if ($stock_quantity !== null) {
            $args['max_value'] = max(1, (int) $stock_quantity);
        }
    }

    return $args;
}, 10, 2);

// Validate cart quantity updates against stock levels
add_filter('woocommerce_update_cart_validation', function ($passed, $cart_item_key, $values, $quantity) {
    $product = $values['data'];

    if ($product && !$product->backorders_allowed()) {
        $stock_quantity = $product->get_stock_quantity();

        if ($stock_quantity !== null && $quantity > $stock_quantity) {
            wc_add_notice(
                sprintf(
                    'Nelze přidat více kusů produktu "%s", než je skladem (%d).',
                    $product->get_name(),
                    $stock_quantity
                ),
                'error'
            );

            return false;
        }
    }

    return $passed;
}, 10, 4);

// Account menu
add_filter('woocommerce_account_menu_items', function ($items) {
    if (isset($items['dashboard'])) {
        $items['dashboard'] = 'Můj účet';
    }

    if (isset($items['downloads'])) {
        unset($items['downloads']);
    }

    return $items;
}, 20);

// Account privacy text
add_filter('woocommerce_get_privacy_policy_text', function ($text, $type) {
    if ($type === 'registration') {
        return 'Vaše osobní údaje budou použity k podpoře vašeho používání tohoto webu, ke správě přístupu k vašemu účtu a k dalším účelům popsaným v našich <a href="' . esc_url(get_privacy_policy_url()) . '" class="woocommerce-privacy-policy-link" target="_blank">zásadách ochrany osobních údajů</a>.';
    }

    return $text;
}, 20, 2);

// Shorten address edit button text
add_filter('gettext', function ($translated, $text, $domain) {
    if ($translated === 'Upravit Fakturační adresa' || $translated === 'Upravit Doručovací adresa') {
        return 'Upravit';
    }

    return $translated;
}, 20, 3);

// Checkout required fields
add_filter('woocommerce_checkout_fields', function ($fields) {
    if (isset($fields['billing']['billing_phone'])) {
        $fields['billing']['billing_phone']['required'] = true;
    }

    if (isset($fields['billing']['billing_first_name'])) {
        $fields['billing']['billing_first_name']['required'] = true;
    }

    if (isset($fields['billing']['billing_last_name'])) {
        $fields['billing']['billing_last_name']['required'] = true;
    }

    return $fields;
});

// Checkout labels and required phone
add_filter('woocommerce_default_address_fields', function ($fields) {
    if (isset($fields['first_name'])) {
        $fields['first_name']['label'] = 'Jméno';
    }

    return $fields;
});

add_filter('woocommerce_billing_fields', function ($fields) {
    if (isset($fields['billing_first_name'])) {
        $fields['billing_first_name']['label'] = 'Jméno';
    }

    if (isset($fields['billing_phone'])) {
        $fields['billing_phone']['label'] = 'Telefon';
        $fields['billing_phone']['required'] = true;
    }

    return $fields;
});

add_filter('woocommerce_shipping_fields', function ($fields) {
    if (isset($fields['shipping_first_name'])) {
        $fields['shipping_first_name']['label'] = 'Jméno';
    }

    if (isset($fields['shipping_phone'])) {
        $fields['shipping_phone']['label'] = 'Telefon';
        $fields['shipping_phone']['required'] = true;
    }

    return $fields;
});
