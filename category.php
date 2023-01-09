<?php do_action( "eventpro_cat_page", single_cat_title( '', true ) );?>
<?php get_header();?>

<!-- content start  -->

<section class="featured">
  <div class="container">
    <h1 class="featured-text"> <?php _e( "Category: ", "eventpro" ) . single_cat_title();?> </h1>
    <div class="main-featured">
      <div class="row">

          <?php
            $category = get_category( get_query_var( 'cat' ) );
            $cat_id = $category->cat_ID;

            $eventpro_args = new WP_Query( array(
                'post_type'      => 'event',
                'posts_per_page' => -1,
                'cat'            => $cat_id,
            ) );

            /* if( $eventpro_args->have_posts()  ){
                $post_count = $eventpro_args->found_post();
                    if( $post_count == 0) {
                        _e( "<h4>No Events in this category.</h4>");
                }
            }; */

            while ( $eventpro_args->have_posts() ) {
                $eventpro_args->the_post();

                ?>

            <div class="col-md-6 col-lg-4">
              <div class="featured-mother">
                <div class="featured-date">
                    <div class="part-a">
                <h3>
                    <?php echo esc_html(get_post_meta(get_the_ID(), 'evm_date', true)); ?>
                  </h3>
                <h2>
                    <?php echo esc_html(get_post_meta(get_the_ID(), 'evm_started', true)); ?>
                </h2>
                  </div>
                  <div class="part-b">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>
                        <?php echo esc_html(get_post_meta(get_the_ID(), 'evm_venue', true)); ?>
                    </p>
                  </div>
                </div>
                <div class="featured-image">
                  <img src="<?php esc_attr( the_post_thumbnail() );?>" alt="">
                  <h1 class="text-image"><a href=" <?php esc_url( the_permalink() );?>"><?php esc_html( the_title() );?></a></h1>
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
    </section> <!-- content end  -->

    
<!-- footer -->
<?php get_footer();?>