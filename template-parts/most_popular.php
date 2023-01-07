<!-- Most Popular start  -->

<section class="featured">
  <div class="container">
    <h1 class="featured-text"> <?php _e( 'Most Popular', 'eventpro' ); ?> </h1>
    <div class="main-featured">
      <div class="row">

          <?php
          
            $eventpro_args = new WP_Query( array(
              'post_type' => 'event',
              'meta_key'      => 'wp_post_views_count',
              'order_by'  => 'meta_value_num',
              'order'   => 'DESC',
              'posts_per_page'=> 3,
            ));

            while($eventpro_args->have_posts()) :  $eventpro_args->the_post(); ?>

            <div class="col-md-6 col-lg-4">
              <div class="featured-mother">
                <div class="featured-date">
                    <div class="part-a">
                <h3>
                    <?php echo esc_html(get_post_meta( get_the_ID(), 'evm_date', true )); ?>
                  </h3>
                <h2>
                    <?php echo esc_html(get_post_meta( get_the_ID(), 'evm_started', true ));?>
                </h2>
                  </div>
                  <div class="part-b">
                    <i class="fas fa-map-marker-alt"></i>
                    <p> <?php echo esc_html( get_post_meta( get_the_ID(), 'evm_venue', true )); ?></p>
                  </div>
                </div>
                <div class="featured-image">
                  <img src="<?php esc_attr( the_post_thumbnail() ); ?>" alt="">
                  <h1 class="text-image"><a href="<?php esc_url( the_permalink()); ?>"><?php esc_html(the_title()); ?></a></h1>
                </div>
              </div>
            </div>
                  <?php 
                    endwhile;
                  wp_reset_postdata();
                ?>
              
        </div>
    </div>
  </div>
</section> <!-- Most Popular end  -->