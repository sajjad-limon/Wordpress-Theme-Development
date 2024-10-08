<?php

/**
 * Template Name: Tax Query Example
 */

 $philosophy_tax_query = array (
    'post_type'         => 'book',
    'posts_per_page'    => -1,
    'tax_query'         => array (
        'relation'      => 'AND',
            array (
                'relation'  => 'AND',
                array (
                    'taxonomy'  => 'language',
                    'field'     => 'slug',
                    'terms'     => array ( 'english' )
                ),
                array (
                    'taxonomy'  => 'language',
                    'field'     => 'slug',
                    'terms'     => array ( 'hindi' ),
                    'operator'  => 'NOT IN',
                )
            ),
            array (
                'taxonomy'  => 'genre',
                'field'     => 'slug',
                'terms'     => array ( 'horror' ),
            ),
        )
);

$philosophy_posts = new WP_Query ( $philosophy_tax_query );

while ( $philosophy_posts-> have_posts() ) {
    $philosophy_posts-> the_post();
    the_title();
    echo '</br>';
}

wp_reset_query();