<?php
/*
Plugin Name: Eventpro Event Manager
Plugin URI: htpps://limondeveloper.com/
Description: This plugin allows you to create an event, update or manage the events.
Version: 1.0
Author: Limon Hossain
Author URI: https://facebook.com/
License: GPLv2 or later
Text Domain: event-manager
Domain Path: /languages/
 */

class OurMetabox {

    function __construct() {
        add_action( 'plugins_loaded', array( $this, 'evm_load_textdomain' ) );
        add_action( 'admin_menu', array( $this, 'evm_add_metabox' ) );
        add_action( 'save_post', array( $this, 'evm_save_metabox' ) );

        //load scripts
        add_action( 'admin_enqueue_scripts', array( $this, 'evm_load_assets' ) );

        //user_contact
        add_action('user_contactmethods', array($this, 'evm_user_contactmethods'));
    }

    //load assets
    function evm_load_assets() {
        wp_enqueue_style( 'jquery-ui-css', '//ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/smoothness/jquery-ui.min.css',null,time() );
        wp_enqueue_script( 'evm-main', plugin_dir_url( __FILE__ ).'assets/admin/js/main.js' , array('jquery', 'jquery-ui-datepicker'), time(), true );
    }

    //load textdomain
    function evm_load_textdomain() {
        load_plugin_textdomain( 'event-manager', false, dirname( __FILE__ ) . '/languages/' );
    }

    //user meta
    function evm_user_contactmethods($methods) {
        $methods['facebook'] = __('Facebook');
        $methods['twitter'] = __('Twitter');
        $methods['contact'] = __('Contact');
        return $methods;
    }


    //add metabox
    function evm_add_metabox() {
        add_meta_box(
            'evm_event_details',
            __( 'Event Details', 'event-manager' ),
            array( $this, 'evm_display_metabox' ),
            'event'
        );
    }

    //check nonce field, user capability etc
    private function is_secured($nonce_field, $nonce_action, $post_id){
        
        $nonce_field = isset( $_POST[$nonce_field] ) ? $_POST[$nonce_field] : '';

        if ( $nonce_field == '' ) {
            return false;
        }

        if ( !wp_verify_nonce( $nonce_field, $nonce_action ) ) {
            return false;
        }

        if ( !current_user_can( 'edit_post' ) ) {
            return false;
        }

        if ( wp_is_post_autosave( $post_id ) ) {
            return false;
        }

        if ( wp_is_post_revision( $post_id ) ) {
            return false;
        }

    }


    //save metabox
    function evm_save_metabox( $post_id ) {

        if ( !array( $this->is_secured( 'evm_nonce', 'evm_nonce_action', $post_id ) ) ) {
            return $post_id;
        }

        $organizer = isset( $_POST['evm_organizer'] ) ? $_POST['evm_organizer'] : '';
        $venue = isset( $_POST['evm_venue'] ) ? $_POST['evm_venue'] : '';
        $event_date = isset( $_POST['evm_date'] ) ? $_POST['evm_date'] : '';
        $event_started = isset( $_POST['evm_started'] ) ? $_POST['evm_started'] : '';

        /* if ( $organizer == '' ) {
            return $post_id;
        } */

        update_post_meta( $post_id, 'evm_organizer', $organizer );
        update_post_meta( $post_id, 'evm_venue', $venue );
        update_post_meta( $post_id, 'evm_date', $event_date );
        update_post_meta( $post_id, 'evm_started', $event_started );
    }

    //metabox field structure
    function evm_display_metabox( $post ) {
        $organizer_value = get_post_meta( $post->ID, 'evm_organizer', true );
        $venue_value = get_post_meta( $post->ID, 'evm_venue', true );
        $event_date = get_post_meta( $post->ID, 'evm_date', true  );
        $event_started = get_post_meta( $post->ID, 'evm_started', true  );

        $label_1 = __( 'Event Organizer', 'event-manager' );
        $label_2 = __( 'Event Venue', 'event-manager' );
        $label_3 = __( 'Event Schedule', 'event-manager' );
        $label_4 = __( 'Event Started', 'event-manager' );

        wp_nonce_field('evm_nonce_action', 'evm_nonce');

        $metabox_html = <<<HEREDOC
        <p>
        <label for="">{$label_1}</label> <br>
        <input class="full-width" type="text" name="evm_organizer" id="evm_organizer" value="{$organizer_value}">
        </br> </br>


        <label for="">{$label_2}</label> <br>
        <input type="text" name="evm_venue" id="evm_venue" value="{$venue_value}">
        </br> </br>


        <label for="">{$label_3}</label> <br>
        <td>
        <input type="text" name="evm_date" id="evm_date" value=" {$event_date}" />
        </td>
        </br> </br>

        <label for="">{$label_4}</label> <br>
        <td>
        <input type="text" name="evm_started" id="evm_started" value=" {$event_started}" />
        </td>
        </br> </br>
        </p>
        HEREDOC;

        echo $metabox_html;
    }

}

new OurMetabox;