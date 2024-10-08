<?php

define ( 'CS_ACTIVE_FRAMEWORK', true );  // default true
define ( 'CS_ACTIVE_METABOX', true );  // default true
define ( 'CS_ACTIVE_TAXONOMY', true );  // default true
define ( 'CS_ACTIVE_SHORTCODE', true );  // default true
define ( 'CS_ACTIVE_CUSTOMIZE', true );  // default true


function philosophy_page_metabox ( $options ) {

    $options[] = array (
        'id'    => 'page-metabox',
        'title' => __( 'Page Meta Info', 'philosophy' ),
        'post_type'=> 'page',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array (
            array (
                'name'  => 'page-section1',
                'title' => __( 'Page Settings', 'philosophy' ),
                'icon'  => 'fa fa-image',
                'fileds'=> array (
                    array (
                        'id'    => 'page-heading',
                        'type'  => 'text',
                        'title' => __( 'Page Heading', 'philosopy' ),
                        'default' => __( 'Page Heading', 'philosopy' ),
                    ),
                    array (
                        'id'    => 'page-teaser',
                        'type'  => 'textarea',
                        'title' => __( 'Page Teaser', 'philosopy' ),
                        'default' => __( 'Page Teaser', 'philosopy' ),
                    ),
                    array (
                        'id'    => 'is-favourite',
                        'type'  => 'switcher',
                        'title' => __( 'Is Favourite', 'philosopy' ),
                        'default' => 1,
                    )
                )
            )
        )
    );

    return $options;
}


add_filter ( 'cs_metabox_options', 'philosophy_page_metabox' );