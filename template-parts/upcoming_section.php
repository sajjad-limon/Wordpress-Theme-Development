<!-- upcoming start  -->

<section class="upcoming">
    <div class="container">
    <div class="main-upcoming">
        <div class="row">
        <div class="col-md-12 border-1">
            <h1 class="upcoming-title"> <?php _e( 'UPCOMING', 'eventpro' ); ?> </h1>
            </div>

            <!--- Today --->
            <div class="col-md-4 upcoming-text">
            <h2><?php _e( 'TODAY', 'eventpro' ); ?></h2>

            <?php       //taxquery (today)
            $events_args = array(
                'post_type' => 'event',
                'posts_per_page' => -1,
                'category_name' => 'upcoming',
                'tax_query' => array(
                    'relation'  => 'AND',
                    array(
                        'taxonomy'  => 'week',
                        'field'     => 'slug',
                        'terms'     => 'today',
                    )
                )
            );
            $eventpro_today_events = new WP_Query($events_args);
            
            if($eventpro_today_events->have_posts()){
                $eventpro_today_events->the_post();
               ?>
                <a href="<?php the_permalink(); ?>"><p><?php the_title(); ?></p></a>
                <a href="<?php echo site_url('/events/today/'); ?>"><i class="fas fa-arrow-right"></i></a>
            <?php    
            } else {
                echo "<p> No Events Today! </p>";
                echo "<a href=' ". site_url('/events/today/') ." '><i class='fas fa-arrow-right'></i></a>";
            };
            wp_reset_query();            
            ?>
        </div>


        <!--- This Weekend --->
        <div class="col-md-4 upcoming-text">
            <h2><?php _e( 'THIS WEEKEND', 'eventpro' ); ?></h2>

            <?php       //taxquery (weekend)
            $events_args = array(
                'post_type' => 'event',
                'posts_per_page' => -1,
                'category_name' => 'upcoming',
                'tax_query' => array(
                    'relation'  => 'AND',
                    array(
                        'taxonomy'  => 'week',
                        'field'     => 'slug',
                        'terms'     => 'this-weekend',
                    )
                )
            );
            $eventpro_today_events = new WP_Query($events_args);
            
            if($eventpro_today_events->have_posts()){
                $eventpro_today_events->the_post();
               ?>
                <a href="<?php the_permalink(); ?>"><p><?php the_title(); ?></p></a>
                <a href="<?php echo site_url('/events/this-weekend/'); ?>"><i class="fas fa-arrow-right"></i></a>
            <?php    
            } else {
                echo "<p> No Events This Weekend! </p>";
                echo "<a href=' ". site_url('/events/this-weekend/') ." '><i class='fas fa-arrow-right'></i></a>";
            };
            wp_reset_query();            
            ?>
        </div>


        <!--- Next Week --->
        <div class="col-md-4 upcoming-text">
            <h2><?php _e( 'IN THE NEXT 7 DAYS', 'eventpro' ); ?></h2>

            <?php       //taxquery (this-week)
            $events_args = array(
                'post_type' => 'event',
                'posts_per_page' => -1,
                'category_name' => 'upcoming',
                'tax_query' => array(
                    'relation'  => 'AND',
                    array(
                        'taxonomy'  => 'week',
                        'field'     => 'slug',
                        'terms'     => 'this-week',
                    )
                )
            );
            $eventpro_today_events = new WP_Query($events_args);
            
            if($eventpro_today_events->have_posts()){
                $eventpro_today_events->the_post();
               ?>
                <a href="<?php the_permalink(); ?>"><p><?php the_title(); ?></p></a>
                <a href="<?php echo site_url('/events/this-week/'); ?>"><i class="fas fa-arrow-right"></i></a>
            <?php    
            } else {
                echo "<p> No Events This Week! </p>";
                echo "<a href=' ". site_url('/events/this-week/') ." '><i class='fas fa-arrow-right'></i></a>";
            };
            wp_reset_query();            
            ?>
        </div>

        </div>
    </div>
    </div>
</section> <!-- upcoming end  -->