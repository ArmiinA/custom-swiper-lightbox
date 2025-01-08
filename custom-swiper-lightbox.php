<?php
/**
 * Plugin Name: Custom Swiper Lightbox
 * Description: A custom Elementor widget using Swiper.js for a lightbox effect.
 * Version: 1.0.0
 * Author: Your Name
 * Text Domain: custom-swiper-lightbox
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Register Custom Swiper Lightbox Widget
function register_custom_swiper_lightbox_widget( $widgets_manager ) {
    require_once( plugin_dir_path( __FILE__ ) . 'widgets/custom-swiper-lightbox-widget.php' );
    $widgets_manager->register( new \Custom_Swiper_Lightbox_Widget() );
}
add_action( 'elementor/widgets/widgets_registered', 'register_custom_swiper_lightbox_widget' );

// Enqueue scripts and styles
function custom_swiper_lightbox_scripts() {
    // Enqueue Swiper.js CSS
    wp_enqueue_style(
        'swiper-css',
        'https://unpkg.com/swiper/swiper-bundle.min.css',
        [],
        '9.0.0'
    );

    // Enqueue Swiper.js JS
    wp_enqueue_script(
        'swiper-js',
        'https://unpkg.com/swiper/swiper-bundle.min.js',
        [ 'jquery' ],
        '9.0.0',
        true
    );

    // Enqueue custom script
    wp_enqueue_script(
        'custom-swiper-lightbox-script',
        plugins_url( 'assets/js/custom-swiper-lightbox.js', __FILE__ ),
        [ 'jquery', 'swiper-js' ],
        null,
        true
    );

    // Enqueue custom style
    wp_enqueue_style(
        'custom-swiper-lightbox-style',
        plugins_url( 'assets/css/custom-swiper-lightbox.css', __FILE__ )
    );
}
add_action( 'elementor/frontend/after_enqueue_scripts', 'custom_swiper_lightbox_scripts' );
