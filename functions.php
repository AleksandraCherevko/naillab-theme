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


// registering custom menu
function register_menu() {
    register_nav_menu('header_menu', 'Header Menu');
    register_nav_menu('footer_info', 'Footer Info');
    register_nav_menu('footer_service', 'Footer Service');
    register_nav_menu('catalog_menu', 'Catalog Menu');

}
add_action('after_setup_theme', 'register_menu');

// add fonts 
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'astra-child-google-fonts',
        'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap',
        [],
        null
    );
}, 5);


// mobile menu script
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script(
        'astra-child-header',
        get_stylesheet_directory_uri() . '/assets/js/header.js',
        [],
        null,
        true
    );
});



