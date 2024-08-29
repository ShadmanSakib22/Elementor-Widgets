<?php
/**
 * Plugin Name: Glitch Text Widget
 * Description: An Elementor widget that adds a glitch text effect.
 * Version: 1.0.0
 * Author: ToastyGenie
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function ssew_register_glitch_text_widget( $widgets_manager ) {

    require_once( __DIR__ . '/glitch-text-widget.php' );

    $widgets_manager->register( new \SSEW_Glitch_Text_Widget() );
}

add_action( 'elementor/widgets/register', 'ssew_register_glitch_text_widget' );

function ssew_glitch_text_widget_styles() {
    wp_enqueue_style( 'ssew-glitch-text-css', plugins_url( '/assets/style.css', __FILE__ ) );
}

add_action( 'wp_enqueue_scripts', 'ssew_glitch_text_widget_styles' );