<?php
function dj_scripts()
{

    wp_enqueue_script('dj_main_js', get_template_directory_uri() . '/dist/main.js', array(), '1.0.0', true);
    wp_enqueue_style('dj_main_css',  get_template_directory_uri() . '/dist/main.css');
}

add_action('wp_enqueue_scripts', 'dj_scripts');


add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('menus');
add_theme_support('customize-selective-refresh-widgets');

add_action('widgets_init', 'dj_widgets_init');
function dj_widgets_init()
{
    register_sidebar(array(
        'name' =>  'Social Links',
        'id' => 'social_links'
    ));

   register_sidebar(array(
        'name' =>  'Footert Widget',
        'id' => 'footer_widget'
    ));
}



function dj_image_size()
{
    add_image_size('dj_blog_full', 992, 300, true);
  
}

add_action('after_setup_theme', 'dj_image_size');

if (!function_exists('djtheme_register_nav_menu')) {

    function djtheme_register_nav_menu()
    {
        register_nav_menus(array(
            'header_menu' => 'Header Menu',
            'footer_menu'  => 'Footer Menu',     
        ));
    }
    add_action('after_setup_theme', 'djtheme_register_nav_menu', 0);
}
