<?php
require_once get_theme_file_path( '/inc/tgm.php' );

if ( !isset( $content_width ) ) {
    $content_width = 960;
}

if ( site_url() == "https://demo.hasan.online/limon/" ) {
    define( "VERSION", time() );
} else {
    define( "VERSION", wp_get_theme()->get( "Version" ) );
}

// theme support
function eventpro_theme_setup() {
    load_theme_textdomain( 'eventpto' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'html5', array( 'search-form', 'comment-list' ) );
    add_editor_style( '/assets/css/editor-style.css' );

    register_nav_menu( 'topmenu', __( 'Top Menu', 'eventpro' ) );
    register_nav_menus( array(
        'footer-left'   => __( 'Footer Left Menu', 'eventpro' ),
        'footer-middle' => __( 'Footer Middle Menu', 'eventpro' ),
        'footer-right'  => __( 'Footer Right Menu', 'eventpro' ),
    ) );
}

add_action( 'after_setup_theme', 'eventpro_theme_setup' );

// load assets
function eventpro_load_assets() {
    wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.min.css' ), null, '1.0' );
    wp_enqueue_style( 'main-css', get_theme_file_uri( '/assets/css/style.css' ), null, time() );
    wp_enqueue_style( 'fontawesome-css', get_theme_file_uri( '/assets/fontawesome/css/all.min.css' ), null, '1.0' );
    wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css2?family=Oswald:wght@400;700&family=Poppins:wght@500;700&family=Roboto&display=swap' );
    wp_enqueue_style( 'googleapis-fonts', '//fonts.googleapis.com' );
    wp_enqueue_style( 'eventpro-css', get_stylesheet_uri(), null, VERSION );

    wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.js' ), null, '1.0', true );
    wp_enqueue_script( 'main-js', get_theme_file_uri( '/assets/js/main.js' ), array( 'jquery' ), VERSION, true );
}

add_action( 'wp_enqueue_scripts', 'eventpro_load_assets' );

// register sidebar
function eventpro_register_sidebar() {

    register_sidebar( array(

        'name'          => __( "Header Section", "eventpro" ),
        'id'            => 'header-section',
        'description'   => __( "Widgets in this area will be shown on header section.", "eventpro" ),
        'before_widget' => '<span id="%1$s" class="social_icons %2$s" >',
        'after_widget'  => '</span>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(

        'name'          => __( "Footer Bottom Left Section", "eventpro" ),
        'id'            => 'footer-bottom-section',
        'description'   => __( "Widgets in this area will be shown on footer bottom left area.", "eventpro" ),
        'before_widget' => '<div id="%1$s" class="first-p %2$s" >',
        'after_widget'  => '</div>',
        'before_title'  => '<p>',
        'after_title'   => '</p>',
    ) );

    register_sidebar( array(

        'name'          => __( "Footer Bottom Right Section", "eventpro" ),
        'id'            => 'footer-bottom-right',
        'description'   => __( "Widgets in this area will be shown on footer bottom right area.", "eventpro" ),
        'before_widget' => '<div id="%1$s" class=" %2$s" >',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );

}

add_action( 'widgets_init', 'eventpro_register_sidebar' );

//most popular section (visit_count)

function eventpro_set_post_views( $post_id ) {
    $count_key = 'wp_post_views_count';
    $count = get_post_meta( $post_id, $count_key, true );

    if ( $count == '' ) {
        $count = 0;
        delete_post_meta( $post_id, $count_key );
        add_post_meta( $post_id, $count_key, '0' );
    } else {
        $count++;
        update_post_meta( $post_id, $count_key, $count );
    }

}

function eventpro_track_post_views( $post_id ) {

    if ( !is_single() ) {
        return;
    }

    if ( empty( $post_id ) ) {
        global $post;
        $post_id = $post->ID;
    }

    eventpro_set_post_views( $post_id );
}

add_action( 'wp_head', 'eventpro_track_post_views' );

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

/* search form */