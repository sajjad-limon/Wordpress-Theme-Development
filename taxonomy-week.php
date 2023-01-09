<?php get_header();?>


<!-- content start  -->

<section class="featured">
    <div class="container">
        <h1 class="featured-text">
              <?php _e( "Events In ", "eventpro" ). single_term_title( '', true ); ?>
        </h1>
        <div class="main-featured">
            <div class="row">
                <?php
                    if( !have_posts() ) :
                ?>
                    <h3><?php _e( "No Events Available.", "eventpro" ); ?></h3>

                <?php endif;

                while(have_posts() ):
                the_post();
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
                  <img src="<?php esc_attr( the_post_thumbnail() ); ?>" alt="">
                  <h1 class="text-image"><a href=" <?php esc_url( the_permalink() ); ?>"><?php esc_html( the_title() ); ?></a></h1>
                </div>
              </div>
            </div>
            
        <?php endwhile;?>


            </div>
        </div>
    </div>
</section> <!-- content end  -->




<!-- footer -->
<?php get_footer();?>