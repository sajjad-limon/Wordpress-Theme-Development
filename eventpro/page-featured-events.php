<?php
/**
* Template Name:  Featured Events
*/
?>

<?php get_header(); ?>

<?php if(is_page('featured_events')) {
    echo do_shortcode( '[featured_events]' );
    }; ?>


<?php get_footer(); ?>
