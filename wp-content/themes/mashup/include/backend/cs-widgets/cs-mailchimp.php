<?php

/**
 * Mashup_Mailchimp Class
 *
 * @package Mashup
 */
if ( ! class_exists( 'Mashup_Mailchimp' ) ) {

    /**
      Mashup_Mailchimp class used to implement the custom mailchimp widget.
     */
    class Mashup_Mailchimp extends WP_Widget {

        /**
         * Sets up a new mashup mailchimp widget instance.
         */
        public function __construct() {
            global $mashup_var_static_text;

            parent::__construct(
                    'mashup_mailchimp', // Base ID.
                    mashup_var_theme_text_srt( 'mashup_var_mailchimp' ), // Name.
                    array( 'classname' => 'widget-newsletter', 'description' => mashup_var_theme_text_srt( 'mashup_var_mailchimp_desciption' ) ) // Args.
            );
        }

        /**
         * Outputs the mashup mailchimp widget settings form.
         *
         * @param array $instance current settings.
         */
        function form( $instance ) {
            global $mashup_var_form_fields, $mashup_var_html_fields, $mashup_var_static_text;
            $strings = new mashup_theme_all_strings;
            $strings->mashup_short_code_strings();
            $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
            $frame = isset( $instance['frame'] ) ? $instance['frame'] : '';

            $title = $instance['title'];
            $social_switch = isset( $instance['social_switch'] ) ? esc_attr( $instance['social_switch'] ) : '';
            $description = isset( $instance['description'] ) ? esc_attr( $instance['description'] ) : '';
            $content = isset( $instance['content'] ) ? esc_attr( $instance['content'] ) : '';

            $mashup_opt_array = array(
                'name' => mashup_var_theme_text_srt( 'mashup_var_title_field' ),
                'desc' => '',
                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_multiple_counter_title_hint' ),
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr( $title ),
                    'cust_id' => '',
                    'cust_name' => mashup_allow_special_char( $this->get_field_name( 'title' ) ),
                    'return' => true,
                ),
            );
            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );


            $mashup_opt_array = array(
                'name' => mashup_var_theme_text_srt( 'mashup_var_description' ),
                'desc' => '',
                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_description_hint' ),
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr( $description ),
                    'cust_id' => '',
                    'cust_name' => mashup_allow_special_char( $this->get_field_name( 'description' ) ),
                    'return' => true,
                ),
            );
            $mashup_var_html_fields->mashup_var_textarea_field( $mashup_opt_array );
        }

        /**
         * Handles updating settings for the current mashup mailchimp widget instance.
         *
         * @param array $new_instance New settings for this instance as input by the user.
         * @param array $old_instance Old settings for this instance.
         * @return array Settings to save or bool false to cancel saving.
         */
        function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance['title'] = $new_instance['title'];
            $instance['frame'] = $new_instance['frame'];
            $instance['description'] = $new_instance['description'];
            $instance['content'] = $new_instance['content'];
            $instance['social_switch'] = $new_instance['social_switch'];
            return $instance;
        }

        /**
         * Outputs the content for the current mashup mailchimp widget instance.
         *
         * @param array $args Display arguments including 'before_title', 'after_title',
         *                        'before_widget', and 'after_widget'.
         * @param array $instance Settings for the current ads widget instance.
         */
        function widget( $args, $instance ) {
            global $mashup_node, $social_switch, $wpdb, $post;

            extract( $args, EXTR_SKIP );
            $title = empty( $instance['title'] ) ? ' ' : apply_filters( 'widget_title', $instance['title'] );
            $frame = empty( $instance['frame'] ) ? '' : $instance['frame'];
            $description = empty( $instance['description'] ) ? ' ' : apply_filters( 'widget_title', $instance['description'] );
            $content = isset( $instance['content'] ) ? esc_attr( $instance['content'] ) : '';
            $social_switch = empty( $instance['social_switch'] ) ? ' ' : apply_filters( 'widget_title', $instance['social_switch'] );
            echo mashup_allow_special_char( $args['before_widget'] );
            echo '<div class="news-letter">';
            if ( isset( $title ) || isset( $description ) ) {
                echo '<div class="text-holder"><i class="icon-mail"></i>';
                if ( isset( $title ) && $title != '' ) {
                    echo '<span class="text-color">' . esc_html( $title ) . '</span>';
                }
                if ( isset( $description ) && $description != '' ) {
                    echo html_entity_decode( $description );
                }
                echo '</div>
                ';
            }
            $under_construction = '2';
            echo mashup_custom_mailchimp( $under_construction );
            echo mashup_allow_special_char( $args['after_widget'] );
            echo '</div>';
        }

    }

}
    add_action('widgets_init', function() {
        register_widget('Mashup_Mailchimp');
    });
