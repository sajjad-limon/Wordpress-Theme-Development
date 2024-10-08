<?php 
/**
 * Template Name: Tiny Slider Page
 */

the_post();
get_header();
?>

<!-- s-content
================================================== -->
<section class="s-content s-content--narrow s-content--no-padding-bottom">

    <article class="row format-standard">

        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                <?php the_title(); ?> 
            </h1>
            <ul class="s-content__header-meta">
                <li class="date"><?php the_date(); ?> </li>
                <li class="cat">
                    In
                    <?php echo get_the_category_list( " " ); ?>
                </li>
            </ul>
        </div> <!-- end s-content__header -->

        <div class="s-content__media col-full">
            <div class="s-content__post-thumb">
                <?php the_post_thumbnail( "large" ); ?>
            </div>
        </div> <!-- end s-content__media -->

        <div class="col-full">
        
        <?php the_content();
            wp_link_pages();
        ?>

        

    </article>


        <!-- comments
        ================================================== -->
        <?php
            if( !post_password_required() ) {
                comments_template();
            }
        ?>

    </section> <!-- s-content -->


 <?php get_footer(); ?>