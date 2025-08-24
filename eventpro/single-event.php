<?php do_action('eventpro_event_page', is_page());
get_header(); ?>

<?php while (have_posts()):
    the_post(); ?>

    <!-- banner start  -->
    <section class="single-banner">
        <div class="container">
            <div class="single-page-banner">
                <div class="row">
                    <div class="col-md-12">
                        <img src="<?php esc_attr(the_post_thumbnail()); ?>" alt="">
                        <h1>
                            <?php esc_html(the_title()); ?>
                        </h1>
                        <p><?php _e('Event Organizer: ', 'eventpro'); ?>
                            <?php echo esc_html(get_post_meta(get_the_ID(), 'evm_organizer', true)); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- banner end  -->

    <div class="row detailsSection">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        </div>
        <div class="eventInfo col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="timeLocation col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="eventDateTime">
                    <span class="fa fa-clock">
                        <span class="tc-event-start">
                            <?php
                            the_field('event_date');
                            ?>
                        </span>
                    </span>
                </div>
            </div>
            <div class="timeLocation col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="eventLocation">
                    <span class="fas fa-map-marker-alt">
                        <span class="tc-event-venue">
                            <?php echo esc_html(get_post_meta(get_the_ID(), 'evm_venue', true)); ?> </span>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        </div>
    </div>


    <!-- text section start  -->
    <section class="single-text">
        <div class="container">
            <div class="single-text-section">
                <div class="row">
                    <div class="col-md-12">
                        <span>
                            <a href="<?php echo esc_url(get_the_author_meta('contact')); ?>">
                                <?php _e('Contact', 'eventpro'); ?>
                            </a>
                        </span>
                        <h3><span><?php _e('REFUND POLICY: '); ?></span><?php _e('NO REFUNDS'); ?></h3>
                        <p>
                            <?php esc_html(the_content());
                            the_terms(get_the_ID(), 'week', '', '', '');
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- text section end  -->

<?php endwhile; ?>

<?php get_footer(); ?>
