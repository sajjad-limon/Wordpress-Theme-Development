<?php
/**
 * Plugin Name:       Eventpro Recommended Sections
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       This plugin allows you to create a beautiful featured section on your website.
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      6.2
 * Author:            Limon Hossain
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       eventpro-recommended
 * Domain Path:       /languages
 */


function evm_rec_load_textdomain () {
    load_theme_textdomain( 'eventpro-recommended', dirname( __FILE__ ).'/languages' );
}
add_action( 'plugins_loaded', 'evm_rec_load_textdomain' );


function evm_rec_load_assets() {
    wp_enqueue_style( 'main-style', plugin_dir_path( __FILE__ ).'assets/css/style.css', null, time() );
}
add_action( 'wp_enqueue_scripts', 'evm_rec_load_assets' );
?>

