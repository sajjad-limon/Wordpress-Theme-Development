<?php 

class SocialWidget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'tb_social_icons', // Base ID
            __( 'Social Widget', 'eventpro' ), // Name
            array( 'description' => __( 'Social Icons', 'eventpro' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        $social_icons = array(
            "facebook",
            "twitter",
            "github",
            "pinterest",
            "instagram",
            "google-plus",
            "youtube",
            "vimeo",
            "tumblr",
            "dribbble",
            "flickr",
            "behance"
        );
        $title        = apply_filters( 'widget_title', $instance['title'] );

        echo wp_kses_post($before_widget);
        ?>
            <div class="social_icon">
                <?php
                foreach ( $social_icons as $sci ) {
                    $url = trim( $instance[ $sci ] );
                    if ( ! empty( $url ) ) {
                        if ( $sci == "vimeo" ) {
                            $sci = "vimeo-square";
                        }
                        $sci = esc_attr( $sci );
                        echo "<li><a target='_blank' href='" . esc_attr( $url ) . "'><i class='fa-brands fa-3x fa-" . esc_attr( $sci ) . "'></i></a></li>";
                    }
                }
                ?>
            </div>

        <?php
        echo wp_kses_post($after_widget);

    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance                = array();
        $instance['title']       = strip_tags( $new_instance['title'] );
        $instance['facebook']    = strip_tags( $new_instance['facebook'] );
        $instance['twitter']     = strip_tags( $new_instance['twitter'] );
        $instance['github']      = strip_tags( $new_instance['github'] );
        $instance['pinterest']   = strip_tags( $new_instance['pinterest'] );
        $instance['instagram']   = strip_tags( $new_instance['instagram'] );
        $instance['google-plus'] = strip_tags( $new_instance['google-plus'] );
        $instance['youtube']     = strip_tags( $new_instance['youtube'] );
        $instance['vimeo']       = strip_tags( $new_instance['vimeo'] );
        $instance['tumblr']      = strip_tags( $new_instance['tumblr'] );
        $instance['dribbble']    = strip_tags( $new_instance['dribbble'] );
        $instance['flickr']      = strip_tags( $new_instance['flickr'] );
        $instance['behance']     = strip_tags( $new_instance['behance'] );

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        if ( isset( $instance['title'] ) ) {
            $title = $instance['title'];
        } else {
            $title = __( 'Social Icons', 'eventpro' );
        }


        $social_icons = array(
            "facebook",
            "twitter",
            "github",
            "pinterest",
            "instagram",
            "google-plus",
            "youtube",
            "vimeo",
            "tumblr",
            "dribbble",
            "flickr",
            "behance"
        );
        foreach ( $social_icons as $sc ) {
            if ( ! isset( $instance[ $sc ] ) ) {
                $instance[ $sc ] = "";
            }
        }
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'eventpro' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>"/>
        </p>
        <?php foreach ( $social_icons as $sci ) {
            ?>
            <p>
                <label for="<?php echo wp_kses_post( $this->get_field_id( $sci )) ; ?>"><?php echo esc_html( ucfirst( $sci ) . " " . __( 'URL', 'eventpro' ) ); ?>
                    : </label>
                <br/>

                <input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( $sci ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( $sci ) ); ?>"
                       value="<?php echo esc_attr( $instance[ $sci ] ); ?>"/>
            </p>

            <?php
        }
        ?>


        <?php
    }


} // class SocialWidget