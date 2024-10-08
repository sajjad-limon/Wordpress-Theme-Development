<?php do_action( "philosophy_cat_page", single_cat_title( '', true ) ); ?>
<?php get_header(); ?>

    <!-- s-content
    ================================================== -->
    <section class="s-content">
    
    <div class="row narrow">
            <div class="col-full s-content__header" data-aos="fade-up">
                <!-- Custom filter hook  (not used)-->
                <?php echo do_action( "philosophy_before_title"); ?>

                <h1>
                    <?php _e( "Category: ", "philosophy" ). single_cat_title(); ?>
                </h1>

                <p class="lead">
                <?php
                    echo category_description();
                 ?>
                 </p>

                 <!-- Custom Filter Hook Test -->
                 <?php echo apply_filters( "philosophy_text", "hello", "hola", "world" ); ?>
            </div>
        </div>


        <div class="row masonry-wrap">
            <div class="masonry">

                <div class="grid-sizer"></div>

                <?php
                    if( !have_posts() ) :
                ?>
                    <h3 class="text-center"><?php _e( "No Posts In This Category.", "philosophy" ); ?></h3>

                <?php endif; ?>


                <?php while(have_posts()) {
                    the_post();
                    get_template_part("template-parts/post-formats/post", get_post_format());
                } 
                ?>

            </div> <!-- end masonry -->
        </div> <!-- end masonry-wrap -->


        <div class="row">
            <div class="col-full">
                <nav class="pgn">
                    <?php philosophy_pagination(); ?>
                </nav>
            </div>
        </div>

    </section> <!-- s-content -->

<?php get_footer(); ?>