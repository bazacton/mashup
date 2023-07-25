<?php
/**
 * Mashup_Social_Links Class
 *
 * @package Mashup
 */
if ( ! class_exists( 'Mashup_Social_Links' ) ) {

    /**
      Mashup_Social_Links class used to implement the Custom social links widget.
     */
    class Mashup_Social_Links extends WP_Widget {

        /**
         * Sets up a new mashup social links widget instance.
         */
        public function __construct() {
            parent::__construct(
                    'social_links', // Base ID.
                    mashup_var_theme_text_srt( 'mashup_var_social_info' ), // Name.
                    array( 'classname' => 'widget-text', 'description' => mashup_var_theme_text_srt( 'mashup_var_social_info_desc' ) )
            );
        }

        /**
         * Outputs the mashup social links widget settings form.
         *
         * @param array $instance Current settings.
         */
        function form( $instance ) {
            global $mashup_var_html_fields, $mashup_var_static_text;
            $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
            $title = $instance['title'];
            $fb_url = isset( $instance['fb_url'] ) ? esc_url( $instance['fb_url'] ) : '';
            $tw_url = isset( $instance['tw_url'] ) ? esc_url( $instance['tw_url'] ) : '';
            $gl_url = isset( $instance['gl_url'] ) ? esc_url( $instance['gl_url'] ) : '';
            $lk_url = isset( $instance['lk_url'] ) ? esc_url( $instance['lk_url'] ) : '';
            $vimeo_url = isset( $instance['vimeo_url'] ) ? esc_url( $instance['vimeo_url'] ) : '';
            $yt_url = isset( $instance['yt_url'] ) ? esc_url( $instance['yt_url'] ) : '';
            $ig_url = isset( $instance['ig_url'] ) ? esc_url( $instance['ig_url'] ) : '';

            $cs_opt_array = array(
                'name' => mashup_var_theme_text_srt( 'mashup_var_title_field' ),
                'desc' => '',
                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_multiple_counter_title_hint' ),
                'echo' => true,
                'field_params' => array(
                    'std' => $title,
                    'id' => '',
                    'classes' => '',
                    'cust_id' => mashup_allow_special_char( $this->get_field_id( 'title' ) ),
                    'cust_name' => mashup_allow_special_char( $this->get_field_name( 'title' ) ),
                    'return' => true,
                    'required' => false,
                ),
            );
            $mashup_var_html_fields->mashup_var_text_field( $cs_opt_array );

            $cs_opt_array = array(
                'name' => mashup_var_theme_text_srt( 'mashup_var_social_info_fb_url' ),
                'desc' => '',
                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_social_info_fb_url_desc' ),
                'echo' => true,
                'field_params' => array(
                    'std' => $fb_url,
                    'id' => '',
                    'classes' => '',
                    'cust_id' => mashup_allow_special_char( $this->get_field_id( 'fb_url' ) ),
                    'cust_name' => mashup_allow_special_char( $this->get_field_name( 'fb_url' ) ),
                    'return' => true,
                    'required' => false,
                ),
            );
            $mashup_var_html_fields->mashup_var_text_field( $cs_opt_array );

            $cs_opt_array = array(
                'name' => mashup_var_theme_text_srt( 'mashup_var_social_info_tw_url' ),
                'desc' => '',
                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_social_info_tw_url_desc' ),
                'echo' => true,
                'field_params' => array(
                    'std' => $tw_url,
                    'id' => '',
                    'classes' => '',
                    'cust_id' => mashup_allow_special_char( $this->get_field_id( 'tw_url' ) ),
                    'cust_name' => mashup_allow_special_char( $this->get_field_name( 'tw_url' ) ),
                    'return' => true,
                    'required' => false,
                ),
            );
            $mashup_var_html_fields->mashup_var_text_field( $cs_opt_array );

            $cs_opt_array = array(
                'name' => mashup_var_theme_text_srt( 'mashup_var_social_info_gl_url' ),
                'desc' => '',
                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_social_info_gl_url_desc' ),
                'echo' => true,
                'field_params' => array(
                    'std' => $gl_url,
                    'id' => '',
                    'classes' => '',
                    'cust_id' => mashup_allow_special_char( $this->get_field_id( 'gl_url' ) ),
                    'cust_name' => mashup_allow_special_char( $this->get_field_name( 'gl_url' ) ),
                    'return' => true,
                    'required' => false,
                ),
            );
            $mashup_var_html_fields->mashup_var_text_field( $cs_opt_array );

            $cs_opt_array = array(
                'name' => mashup_var_theme_text_srt( 'mashup_var_social_info_lk_url' ),
                'desc' => '',
                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_social_info_lk_url_desc' ),
                'echo' => true,
                'field_params' => array(
                    'std' => $lk_url,
                    'id' => '',
                    'classes' => '',
                    'cust_id' => mashup_allow_special_char( $this->get_field_id( 'lk_url' ) ),
                    'cust_name' => mashup_allow_special_char( $this->get_field_name( 'lk_url' ) ),
                    'return' => true,
                    'required' => false,
                ),
            );
            $mashup_var_html_fields->mashup_var_text_field( $cs_opt_array );

            $cs_opt_array = array(
                'name' => mashup_var_theme_text_srt( 'mashup_var_social_info_vimeo_url' ),
                'desc' => '',
                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_social_info_vimeo_url_desc' ),
                'echo' => true,
                'field_params' => array(
                    'std' => $vimeo_url,
                    'id' => '',
                    'classes' => '',
                    'cust_id' => mashup_allow_special_char( $this->get_field_id( 'vimeo_url' ) ),
                    'cust_name' => mashup_allow_special_char( $this->get_field_name( 'vimeo_url' ) ),
                    'return' => true,
                    'required' => false,
                ),
            );
            $mashup_var_html_fields->mashup_var_text_field( $cs_opt_array );
        }

        /**
         * Handles updating settings for the current mashup social links widget instance.
         *
         * @param array $new_instance New settings for this instance as input by the user.
         * @param array $old_instance Old settings for this instance.
         * @return array Settings to save or bool false to cancel saving.
         */
        function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance['title'] = $new_instance['title'];
            $instance['fb_url'] = $new_instance['fb_url'];
            $instance['tw_url'] = $new_instance['tw_url'];
            $instance['gl_url'] = $new_instance['gl_url'];
            $instance['lk_url'] = $new_instance['lk_url'];
            $instance['vimeo_url'] = $new_instance['vimeo_url'];
            $instance['yt_url'] = $new_instance['yt_url'];
            $instance['ig_url'] = $new_instance['ig_url'];
            return $instance;
        }

        /**
         * Outputs the content for the current mashup social links widget instance.
         *
         * @param array $args Display arguments including 'before_title', 'after_title',
         *                        'before_widget', and 'after_widget'.
         * @param array $instance Settings for the current Text widget instance.
         */
        function widget( $args, $instance ) {
            extract( $args, EXTR_SKIP );
            $title = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );
            $title = htmlspecialchars_decode( stripslashes( $title ) );
            $fb_url = empty( $instance['fb_url'] ) ? '' : esc_url( $instance['fb_url'] );
            $tw_url = empty( $instance['tw_url'] ) ? '' : esc_url( $instance['tw_url'] );
            $gl_url = empty( $instance['gl_url'] ) ? '' : esc_url( $instance['gl_url'] );
            $lk_url = empty( $instance['lk_url'] ) ? '' : esc_url( $instance['lk_url'] );
            $vimeo_url = empty( $instance['vimeo_url'] ) ? '' : esc_url( $instance['vimeo_url'] );
            $yt_url = empty( $instance['yt_url'] ) ? '' : esc_url( $instance['yt_url'] );
            $ig_url = empty( $instance['ig_url'] ) ? '' : esc_url( $instance['ig_url'] );
            echo '<div class="widget widget-follow-us">';
            if ( '' !== $title ) {
                echo '<div class="widget-title"><h6>' . esc_html( $title ) . '</h6></div>';
            }
            if ( '' !== $fb_url || '' !== $tw_url || '' !== $gl_url || '' !== $lk_url || '' !== $vimeo_url || '' !== $yt_url || '' !== $ig_url ) {
                ?>
                <ul>
                    <?php if ( '' !== $fb_url ) { ?>
                        <li><a href="<?php echo esc_url( $fb_url ); ?>" data-original-title="facebook"><i class="icon-facebook"></i></a></li>
                    <?php } if ( '' !== $tw_url ) { ?>
                        <li><a href="<?php echo esc_url( $tw_url ); ?>" data-original-title="twitter"><i class="icon-twitter"></i></a></li>
                    <?php } if ( '' !== $gl_url ) { ?>
                        <li><a href="<?php echo esc_url( $gl_url ); ?>" data-original-title="google-plus"><i class="icon-google-plus"></i></a></li>
                    <?php } if ( '' !== $lk_url ) { ?>
                        <li><a href="<?php echo esc_url( $lk_url ); ?>" data-original-title="linkedin"><i class="icon-linkedin2"></i></a></li>
                    <?php } if ( '' !== $vimeo_url ) { ?>
                        <li><a href="<?php echo esc_url( $vimeo_url ); ?>" data-original-title="vimeo"><i class="icon-vimeo"></i></a></li>
                            <?php } ?>
                </ul>
                <?php
            }
            echo '</div>';
        }

    }

}
    add_action('widgets_init', function() {
        register_widget('Mashup_Social_Links');
    });
