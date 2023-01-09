<?php
/*
Plugin Name: Social Widgets Init
Plugin URI: http://localhost/philosophy/wp-admin/plugins.php?
Description: This plugin allow to social icons as widgets in your website.
Version: 1.0
Author: Limon Hossain
Author URI: https://facebook.com/
License: GPLv2 or later
Text Domain: widgets-init
 */

require_once plugin_dir_path( __FILE__ ) . "/widgets/class.widgets-init.php";

// load textdomain
function wid_load_textdomain() {
    load_plugin_textdomain( 'widgets-init', false, plugin_dir_path( __FILE__ ) . "/languages" );
}
add_action( 'plugins_loaded', 'wid_load_textdomain' );

// register widget
function wid_register_widget() {
    register_widget( 'SocialWidget' );
}
add_action( 'widgets_init', 'wid_register_widget' );

// load assets
function wid_load_assets( $screen ) {

    if ( $screen == 'widgets.php' ) {
        wp_enqueue_style( 'widgets-style', plugin_dir_url( __FILE__ ) . "/assets/css/widget.css" );
    }

}
add_action( 'admin_enqueue_scripts', 'wid_load_assets' );