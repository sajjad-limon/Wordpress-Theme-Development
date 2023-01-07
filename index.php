<?php get_header(); ?>


    <?php get_template_part( 'template-parts/banner' ); ?>


    <?php get_template_part( 'template-parts/featured_section'); ?>


    <?php get_template_part( 'template-parts/upcoming_section' ); ?>


    <?php get_template_part( 'template-parts/just_announced'); ?>


    <?php get_template_part( 'template-parts/most_popular' ); ?>


    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12 main-button">
            <button class="event-button"><a href=" <?php echo home_url('/event-calender/'); ?>"> <?php _e( 'Event Calender', 'eventpro' ); ?> </a></button>
          </div>
        </div>
      </div>
    </section> <!-- button section end  -->

<?php get_footer(); ?>