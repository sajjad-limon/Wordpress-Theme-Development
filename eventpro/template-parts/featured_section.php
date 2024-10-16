<!-- featured start -->
<section class="featured">
  <div class="container">
    <h1 class="featured-text"> <?php _e('Featured', 'eventpro'); ?> </h1>
    <div class="main-featured">
      <div class="row">

        <?php

        $eventpro_args = new WP_Query(array(
          'post_type' => 'event',
          'category_name' => 'featured',
          'posts_per_page' => 6,
          'order_by' => 'post_date',
          'order' => 'ASC'
        ));

        while ($eventpro_args->have_posts()) {
          $eventpro_args->the_post();
          ?>

          <div class="col-xs-12 col-md-6 col-lg-4">
            <div class="featured-mother">
              <div class="featured-date">
                <div class="part-a">
                  <h3>
                    <?php echo get_post_meta(get_the_ID(), 'evm_date', true); ?>
                  </h3>
                  <h2>
                    <?php echo get_post_meta(get_the_ID(), 'evm_started', true); ?>
                  </h2>
                </div>
                <div class="part-b">
                  <i class="fas fa-map-marker-alt"></i>
                  <p> <?php echo get_post_meta(get_the_ID(), 'evm_venue', true); ?></p>
                </div>
              </div>
              <div class="featured-image">
                <img src="<?php the_post_thumbnail(); ?>" alt="">
                <h1 class="text-image"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
              </div>
            </div>
          </div>
        <?php
        }
        ;
        wp_reset_query();
        ?>

      </div>
    </div>
  </div>
</section> <!-- featured end  -->