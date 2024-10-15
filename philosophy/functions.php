<?php

require_once ( get_theme_file_path( "/inc/tgm.php" ) );
require_once ( get_theme_file_path( "/inc/acf-metaboxes.php" ) );
require_once ( get_theme_file_path( "/inc/attachments.php" ) );
require_once ( get_theme_file_path( "/widgets/social-icons-widget.php" ) );
require_once ( get_theme_file_path( "/lib/csf/codestar-framework.php" ) );
require_once ( get_theme_file_path( "/inc/cs.php" ) );
require_once ( get_theme_file_path( "/inc/customizer.php" ) );


if ( ! isset( $content_width ) ) $content_width = 960;

if(site_url() == "http://localhost/philosophy/") {
    define( "VERSION", time() );
} else {
    define( "VERSION", wp_get_theme() -> get("Version") );
}

// after theme setup
function philosophy_theme_setup () {

    load_theme_textdomain( "philosophy" );
    add_theme_support( "post-thumbnails" );
    add_theme_support( "custom-logo" );
    add_theme_support( "automatic-feed-links" );
    add_theme_support( "title-tag" );
    add_theme_support( "html5", array ( 'search-form', 'comment-list' ) );
    add_theme_support( "post-formats", array ( 'audio', 'image', 'video', 'gallery', 'link', 'quote' ) );
    add_editor_style( "/assets/css/editor-style.css" );

    add_image_size( "philosophy-home-square", 400, 400, true );

    register_nav_menu( "topmenu", __( "Top Menu", "philosophy" ) );
    register_nav_menus( array (
        "footer-left"   => __( "Footer Left Menu", "philosophy" ),
        "footer-middle"   => __( "Footer Middle Menu", "philosophy" ),
        "footer-right"   => __( "Footer Right Menu", "philosophy" ),
    ) );
}
add_action( "after_setup_theme", "philosophy_theme_setup" );


// load assets
function philosophy_assets () {
    wp_enqueue_style( "fontawesome-css", get_theme_file_uri( "/assets/css/font-awesome/css/font-awesome.min.css" ), null, "1.1" );
    wp_enqueue_style( "fonts-css", get_theme_file_uri( "/assets/css/fonts.css" ), null, "1.1" );
    wp_enqueue_style( "base-css", get_theme_file_uri( "/assets/css/base.css" ), null, "1.0" );
    wp_enqueue_style( "vendor-css", get_theme_file_uri( "/assets/css/vendor.css" ), null, "1.0" );
    wp_enqueue_style( "main-css", get_theme_file_uri( "/assets/css/main.css" ), null, "1.0" );
    wp_enqueue_style( "philosophy-css", get_stylesheet_uri(), null, VERSION );

    
    wp_enqueue_script( "modernizr-js", get_theme_file_uri( "/assets/js/modernizr.js" ), null, "1.0" );
    wp_enqueue_script( "pace-js", get_theme_file_uri( "/assets/js/pace.min.js" ), null, "1.0" );
    wp_enqueue_script( "plugins-js", get_theme_file_uri( "/assets/js/plugins.js" ), array( "jquery" ), "1.0", true );

    if ( is_singular() ) {
        wp_enqueue_script( "comment-reply" );
    }
    wp_enqueue_script( "main-js", get_theme_file_uri( "/assets/js/main.js" ), array( "jquery" ), "1.0", true );

}
add_action( "wp_enqueue_scripts", "philosophy_assets" );


// pagination
function philosophy_pagination() {

    global $wp_query;
    $links = paginate_links( array(
        'current'   => max( 1, get_query_var( 'paged' ) ),
        'total'     => $wp_query->max_num_pages,
        'type'      => 'list',
        'mid_size'  => 3,
    ) );
    $links = str_replace( "page-numbers", "pgn__num", $links );
    $links = str_replace( "<ul class='pgn__num'>", "<ul>", $links );
    $links = str_replace( "next pgn__num", "pgn__next", $links );
    $links = str_replace( "prev pgn__num", "pgn__prev", $links );
    echo wp_kses_post( $links ) ;
}


remove_action( "term_description", "wpautop" );

// widgets
function philosophy_widgets () {

    register_sidebar( array (

        'name'      => __( "About Us Page", "philosophy" ),
        'id'        => 'about-us',
        'description'   => __( "Widgets in this area will be shown on about us page.", "philosophy"  ),
        'before_widget' => '<div id="%1$s" class="col-block %2$s" >',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="quarter-top-margin" >',
        'after_title'   => '</h3>',
    ));
    register_sidebar( array (

        'name'          => __( "Contact Page Map Section", "philosophy" ),
        'id'            => 'contact-maps',
        'description'   => __( "Widgets in this area will be shown on contact page.", "philosophy"  ),
        'before_widget' => '<div id="%1$s" class=" %2$s" >',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ));

    register_sidebar( array (

        'name'          => __( "Contact Page Information Section", "philosophy" ),
        'id'            => 'contact-info',
        'description'   => __( "Widgets in this area will be shown on contact page.", "philosophy"  ),
        'before_widget' => '<div id="%1$s" class="col-block %2$s" >',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="quarter-top-margin" >',
        'after_title'   => '</h3>',
    ));
    register_sidebar( array (

        'name'          => __( "Before Footer Section", "philosophy" ),
        'id'            => 'before-footer',
        'description'   => __( "Widgets in this area will be shown on footer page.", "philosophy"  ),
        'before_widget' => '<div id="%1$s" class=" %2$s" >',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));

    register_sidebar( array (

        'name'          => __( "Footer Section", "philosophy" ),
        'id'            => 'footer-right',
        'description'   => __( "Widgets in this area will be shown on footer page.", "philosophy"  ),
        'before_widget' => '<div id="%1$s" class=" %2$s" >',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));

    register_sidebar( array (

        'name'          => __( "Footer Bottom Section", "philosophy" ),
        'id'            => 'footer-bottom',
        'description'   => __( "Widgets in this area will be shown on footer page.", "philosophy"  ),
        'before_widget' => '<div id="%1$s" class=" %2$s" >',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar( array (

        'name'          => __( "Header Section", "philosophy" ),
        'id'            => 'header-section',
        'description'   => __( "Widgets in this area will be shown on header section.", "philosophy"  ),
        'before_widget' => '<div id="%1$s" class="header__social %2$s" >',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}
add_action( "widgets_init", "philosophy_widgets" );


// search form
function philosophy_search_form ($form) {

    $home_dir       = home_url( "/" );
    $label          = __( "Search for:", "philosophy" );
    $placeholder    = __( "Type Keywords", "philosophy" );
    $button_label   = __( 'Search', "philosophy" );
    $post_type      = <<<PT
    <input type="hidden" name="post_type" value="post">
PT;

    /* exclude book type result from search */
    if( is_post_type_archive( "book" ) ) {
        $post_type      = <<<PT
    <input type="hidden" name="post_type" value="book">
PT;
    }

    $new_form  = <<<FORM
<form role="search" method="get" class="header__search-form" action="{$home_dir}">
    <label>
        <span class="hide-content">{$label}</span>
        <input type="search" class="search-field" placeholder="{$placeholder}" value="" name="s" title="{$label}" autocomplete="off">
    </label>
    {$post_type}
    <input type="submit" class="search-submit" value="{$button_label}">
</form>

FORM;
    return $new_form;
}
add_filter( "get_search_form", "philosophy_search_form" );





/****  custom filter hook ******/ 

function after_image() {
    echo "<p class='text-center'> Haaland in 2022 </p>";
}
add_action( "after_thumbnail", "after_image" );



function cat_page( $category_title ) {

    if ( $category_title == "blog" ) {
        $visit_count = get_option( "category_blog" );
        $visit_count = $visit_count?$visit_count : 0;
        $visit_count++;
        update_option( "category_blog", $visit_count );
    }
}
add_action( "philosophy_cat_page", "cat_page"  );



// fix homepage banner
function philosophy_banner_class ( $class ) {
    if ( is_home() ) {
        return $class;
    } else {
        return "";
    }
}
add_filter( "philosophy_home_banner_class", "philosophy_banner_class" );





// custom post type book
function philosophy_footer_language_title ($title) {

    if( is_post_type_archive( 'book' ) || is_tax ( 'language' )  ) {
        $title = __( 'Languages', 'philosophy' );
    }
    return $title;
}
add_filter( 'philosophy_footer_tag_title', 'philosophy_footer_language_title' );


// taxonomy language
function philosophy_footer_language_items ($items) {
    if ( is_post_type_archive ( 'book' ) || is_tax ( 'language' ) ) {
        $items = get_terms( array (
            'taxonomy'      => 'language',
            'hide_empty'    => false,
        ) );
    }
    return $items;
}
add_filter( 'philosophy_footer_tag_items', 'philosophy_footer_language_items' );





/* plugin testing hook ( word-count ) */

add_filter('word_count_heading',function($heading){
    $heading= strtoupper($heading);
    return $heading;
});

add_filter('word_count_tag',function($tags){
    return 'h3';
});

function philosophy_wordcount_reading_heading( $heading) {
    return 'Reading Time';
}
add_filter( 'word_count_reading_heading', 'philosophy_wordcount_reading_heading' );


function philosophy_wordcount_reading_tags( $tags) {
    return 'h5';
}
add_filter( 'word_count_reading_tags', 'philosophy_wordcount_reading_tags' );


function philosophy_wordcount_display_readingtime( $value ) {   // 1 for show, 0 for hide
    return 1;
}
add_filter( 'wordcount_display_readingtime', 'philosophy_wordcount_display_readingtime' ) ;





/* custom filter hook */
function modify_text( $text1, $text2, $text3 ) {
    return ucwords( $text1 ). " ". strtoupper( $text2 ). " ". ucwords( $text3 );
}
add_filter( "philosophy_text", "modify_text", 10, 3 );





/* plugin hook ( qrcode ) */
/* add_filter('pqrc_qrcode_dimension',function($dimension){
    return '150x150';
}); */


add_filter('pqrc_excluded_post_types', function($post_types){
    $post_types[]= 'page';
    return $post_types;
});

function philosophy_pqrc_qrcode(){
    echo '<h4>QR Code for this post :</h4>';
}
add_action('pqrc_qrcode', 'philosophy_pqrc_qrcode');

//remove hook
remove_action('pqrc_qrcode', 'philosophy_pqrc_qrcode');

function philosophy_before_qrcode($text){
    return "<h5>Post QR Code:</h5>";
};
add_filter('pqrc_before_qrcode', 'philosophy_before_qrcode' );


function philosophy_pqrc_countries($countries) {
    array_push( $countries, 'Hong Kong' );
    $countries = array_diff( $countries, array( 'Pakistan', 'India' ) );
    return $countries;
}
add_filter( 'pqrc_countries', 'philosophy_pqrc_countries' ) ;

