<?php

/**
 * Template Name: Event Calender
 */

get_header();
?>

<?php
$eventpro_day_items = apply_filters('eventpro_day_items', get_terms(array(
  'taxonomy' => 'week',
  'hide_empty' => false,
  'order_by' => 'name',
  'order' => 'DESC',
)));
$eventpro_category_items = apply_filters('eventpro_cat_items', get_categories());
$eventpro_month_items = apply_filters('eventpro_month_items', get_terms(array(
  'taxonomy' => 'month',
  'hide_empty' => false,
)));
?>

<!-- display days -->
<section class="eventcalendar-all-button">
  <div class="container">

    <!-- search filter -->
    <input type="text" id="search_box" onkeyup="search()" placeholder="Search Events...">

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 filter-section">
        <div class="scrollToX">

          <?php

          if (is_array($eventpro_day_items)) {

            foreach ($eventpro_day_items as $dti) {
              printf('<span class="filter date" data-type="date" data-value="%s"><a href="%s"> %s </a> </span>', $dti->slug, get_term_link($dti->term_id), $dti->name);
            }

          }
          ?>

        </div>
        <div class="clearFilter"></div>

        <!-- display categories -->
        <div class="scrollToX indicator">

          <?php

          if (is_array($eventpro_category_items)) {

            foreach ($eventpro_category_items as $cti) {
              printf('<span class="filter category" data-filter="%s" data-type="category" data-value="%s"><a href="%s"> %s </a> </span>', $cti->slug, $cti->term_id, get_term_link($cti->term_id), $cti->name);
            }

          }
          ?>

        </div>
        <div class="clearFilter"></div>

        <!-- display months -->
        <div class="scrollToX">

          <?php

          if (is_array($eventpro_month_items)) {

            foreach ($eventpro_month_items as $mti) {
              printf('<span class="filter month" data-filter="%s" data-type="month" data-value="%s"> <a href="%s" > %s </a> </span>', $mti->slug, $mti->slug, get_term_link($mti->term_id), $mti->name);
            }

          }
          ?>

        </div>
        <div class="clearFilter"></div>

      </div>
    </div>

  </div>
</section> <!-- all categories end -->


<!--- all events start - -->
<section class="featured">
  <div class="container">
    <div class="main-featured">
      <div class="row events_area">

        <?php
        $eventpro_args = new WP_Query(array(
          'post_type' => 'event',
          'posts_per_page' => -1,
        ));

        while ($eventpro_args->have_posts()) {
          $eventpro_args->the_post();
          ?>

          <div class="col-md-4">
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
                <img src="<?php esc_attr(the_post_thumbnail()); ?>" alt="">
                <h1 class="text-image"><a href="<?php esc_url(the_permalink()); ?>">
                    <?php esc_html(the_title()); ?> </a>
                </h1>
              </div>
            </div>
          </div>

          <?php
        }
        ;
        wp_reset_query();
        ?>

        <div class="desc">
          <p>
            <?php esc_html(the_content()); ?>
          </p>
        </div>

      </div>
    </div>
  </div>
</section> <!-- events end  -->


<!-- footer -->
<?php get_footer(); ?>