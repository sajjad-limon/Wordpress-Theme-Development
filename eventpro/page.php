<?php
the_post();
get_header(); ?>

<div class="page-view" style="padding: 160px 0 80px 0;">

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page_title">
          <h2 class="mt-50 text-center">
            <?php the_title(); ?>
          </h2>
        </div>
      </div>

      <div class="col-md-12">
        <div class="page_content">
          <p class="mt-10 p-3 text-center">
            <?php the_content(); ?>
          </p>
        </div>
      </div>

    </div>
  </div>
</div>

<?php get_footer(); ?>