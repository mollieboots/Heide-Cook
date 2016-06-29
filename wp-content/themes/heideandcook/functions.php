<?php
require_once __DIR__.'/App/bootstrap.php';
require_once __DIR__.'/src/functions.php';
global $container;

//Stylesheets and scriptes
add_action('wp_enqueue_scripts', function() {
    wp_register_style( 'Cabin', 'https://fonts.googleapis.com/css?family=Cabin' );
    wp_register_style( 'Raleway', 'https://fonts.googleapis.com/css?family=Raleway:400,700' );
    wp_register_style( 'Montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:400,700' );
    wp_register_style( 'slick-css', get_template_directory_uri() . '/src/slick/slick/slick.css' );
    wp_register_style( 'slick-theme-css', get_template_directory_uri() . '/src/slick/slick/slick-theme.css' );
    wp_register_style( 'fancybox-css', get_template_directory_uri() . '/src/fancybox/source/jquery.fancybox.css' );
    wp_register_style( 'app', get_template_directory_uri() . '/web/stylesheets/app.css',  [
        'Cabin',
        'Raleway',
        'Montserrat',
        'slick-css',
        'slick-theme-css',
        'fancybox-css'
    ] );

    wp_register_script( 'slick', get_template_directory_uri() . '/src/slick/slick/slick.js', ['jquery'] );
    wp_register_script( 'fancybox', get_template_directory_uri() . '/src/fancybox/source/jquery.fancybox.pack.js', ['jquery'] );
    wp_register_script( 'app_script', get_template_directory_uri() . '/web/scripts-min/app.min.js', ['slick', 'fancybox'] );

    wp_enqueue_style( 'app' );
    wp_enqueue_script( 'slick' );
    wp_enqueue_script( 'fancybox' );
    wp_enqueue_script( 'app_script' );
});

add_action('init', function() {
    register_post_type('case_studies', [
        'labels' => [
            'name' => 'Case Studies',
            'singular_name' => 'Case Study',
        ],
        'public' => true,
        'menu_icon' => 'dashicons-portfolio',
        'menu_position' => 5,
        'supports' => [
            'title',
            'author',
            'thumbnail',
            'page-attributes',
        ],
        'has_archive' => true,
    ]);

    register_taxonomy('case_studies_tags', 'case_studies', [
        'hierarchical' => true,
    ]);

    register_nav_menus([
        'primary_menu' => 'Primary Menu',
        'mobile_menu' => 'Mobile Menu',
    ]);

    add_image_size('slider', 500, 332, true);

    if(function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Theme Options',
            'capability' => 'edit_theme_options',
            'icon_url' => 'dashicons-sayenko',
        ]);
    }
});