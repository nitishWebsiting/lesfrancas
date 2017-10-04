<?php
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function lesfrancas_setup()
{

    /*
     * Make theme available for translation.
     */
    load_theme_textdomain('lesfrancas');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');
    // additional image sizes
    add_image_size('lesfrancas-thumbnail-avatar', 100, 100, true);
    add_image_size('lesfrancas-post', 1300, 306, true);
    add_image_size('lesfrancas-post-thumbnail', 390, 306, true);
    add_image_size('lesfrancas-post-rectangle', 690, 306, true);


    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5');

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus(array(
        'top' => __('Top Menu', 'lesfrancas'),
        'footer' => __('Footer Menu', 'lesfrancas'),
        'second menu' => __('Second Menu', 'lesfrancas'),
        'acount menu' => __('Acount Menu', 'lesfrancas')
    ));

    // Add theme support for Custom Logo.
    add_theme_support('custom-logo', array(
        'width' => 250,
        'height' => 250,
        'flex-width' => true
    ));

    // Add HTML5 theme support.
    add_theme_support('html5', array('search-form'));


    date_default_timezone_set('Europe/Paris');
    setlocale (LC_TIME, 'fr_FR.utf8','fra');
}
add_action('after_setup_theme', 'lesfrancas_setup');


/**
 * Enqueue scripts and styles.
 */
function lesfrancas_scripts()
{
    // Theme stylesheet.
    wp_register_style('bootstrap', get_stylesheet_directory_uri() . '/lib/bootstrap-3.3.7-dist/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap');

    wp_enqueue_style('slick-style', 'https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css');

    //datepicker stylesheet
    wp_enqueue_style('datepicker-style', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css');
    
    //datetimepicker stylesheet
    wp_enqueue_style('datetimepicker-style', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css');

    wp_register_style('styles', get_stylesheet_directory_uri() . '/dist/css/styles.css','',true);
    wp_enqueue_style('styles');

    //Font awesome
    wp_enqueue_style('font-awesome-style', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

    // Theme scripts

    wp_enqueue_script('lesfrancas-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js', '', '3.1.0', true);

    wp_enqueue_script('slick-script', 'https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js', array('lesfrancas-jquery'), '3.1.0');

    wp_enqueue_script('bootstrap-script', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('lesfrancas-jquery'), '3.3.7');


    // datepicker script
    wp_enqueue_script('bootstrap-datepicker-script', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js', array('lesfrancas-jquery', 'bootstrap-script'), '3.3.7');

    wp_enqueue_script('moment-script', 'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js', array('lesfrancas-jquery', 'bootstrap-script'), '3.3.7');

    wp_enqueue_script('bootstrap-datetimepicker-script', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js', array('lesfrancas-jquery', 'moment-script'), '3.3.7');



    wp_enqueue_script('scripts', js_uri() . 'scripts.js', array('lesfrancas-jquery'), true);

    //Ajax category
    //wp_enqueue_script('category', js_uri() . 'category.js', array('lesfrancas-jquery'), true);
    wp_localize_script('scripts', 'ajaxurl', admin_url( 'admin-ajax.php' ) );

    wp_dequeue_style('um_minified');
}
add_action('wp_enqueue_scripts', 'lesfrancas_scripts', 1);