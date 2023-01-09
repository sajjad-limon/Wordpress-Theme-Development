<?php
/**
 * Template Name: Login Page
 */

the_post();
get_header(); ?>


<section id="login_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h1 class="login_text"> <?php _e( "Login", "eventpro" ); ?> </h1>

            <div class="form_section">
                <?php

                    // contact form shortcode
                    if( get_field( "login_form_shortcode" ) ) {
                        echo do_shortcode( get_field( "login_form_shortcode" ) );
                    }

                ?>
            </div>
            </div>
        </div>
    </div>
</section>



<?php get_footer(); ?>