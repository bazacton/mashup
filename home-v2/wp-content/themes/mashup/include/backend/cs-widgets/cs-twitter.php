<?php

/**
 * Mashup_Twitter_Widget Class
 *
 * @package MashUp
 */
if ( ! class_exists( 'Mashup_Twitter_Widget' ) ) {

    /**
      Mashup_Weather class used to implement the custom weather widget.
     */
    class Mashup_Twitter_Widget extends WP_Widget {

        /**
         * Sets up a new mashup twitter widget instance.
         */
        public function __construct() {
            global $mashup_var_static_text;
            parent::__construct(
                    'mashup_var_twitter_widget', // Base ID.
                    mashup_var_theme_text_srt( 'mashup_var_twitter_widget' ), // Name.
                    array( 'classname' => 'twitter-post', 'description' => mashup_var_theme_text_srt( 'mashup_var_twitter_widget_desciption' ) )
            );
        }

        /**
         * Outputs the mashup twitter widget settings form.
         *
         * @param array $instance Current settings.
         */
        function form( $instance ) {
            global $mashup_var_form_fields, $mashup_var_html_fields, $mashup_var_static_text;
            $strings = new mashup_theme_all_strings;
            $strings->mashup_short_code_strings();
            $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
            $title = $instance['title'];
            $username = isset( $instance['username'] ) ? esc_attr( $instance['username'] ) : '';
            $numoftweets = isset( $instance['numoftweets'] ) ? esc_attr( $instance['numoftweets'] ) : '';

            $mashup_opt_array = array(
                'name' => mashup_var_theme_text_srt( 'mashup_var_title_field' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => esc_html( $title ),
                    'id' => '',
                    'cust_name' => mashup_allow_special_char( $this->get_field_name( 'title' ) ),
                    'cust_id' => mashup_allow_special_char( $this->get_field_name( 'title' ) ),
                    'return' => true,
                ),
            );
            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_theme_text_srt( 'mashup_var_twitter_widget_user_name' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => esc_html( $username ),
                    'id' => '',
                    'cust_name' => mashup_allow_special_char( $this->get_field_name( 'username' ) ),
                    'cust_id' => mashup_allow_special_char( $this->get_field_name( 'username' ) ),
                    'return' => true,
                ),
            );
            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_theme_text_srt( 'mashup_var_twitter_widget_tweets_num' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => esc_html( $numoftweets ),
                    'id' => '',
                    'cust_name' => mashup_allow_special_char( $this->get_field_name( 'numoftweets' ) ),
                    'cust_id' => mashup_allow_special_char( $this->get_field_name( 'numoftweets' ) ),
                    'return' => true,
                ),
            );
            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
        }

        /**
         * Handles updating settings for the current mashup twitter widget instance.
         *
         * @param array $new_instance New settings for this instance as input by the user.
         * @param array $old_instance Old settings for this instance.
         * @return array Settings to save or bool false to cancel saving.
         */
        function update( $new_instance, $old_instance ) {

            $instance = $old_instance;
            $instance['title'] = $new_instance['title'];
            $instance['username'] = $new_instance['username'];
            $instance['numoftweets'] = $new_instance['numoftweets'];
            return $instance;
        }

        /**
         * Outputs the content for the current mashup twitter widget instance.
         *
         * @param array $args Display arguments including 'before_title', 'after_title',
         *                        'before_widget', and 'after_widget'.
         * @param array $instance Settings for the current twitter widget instance.
         */
        function widget( $args, $instance ) {
            global $mashup_var_options, $mashup_twitter_arg;
            $mashup_twitter_arg['consumerkey'] = isset( $mashup_var_options['mashup_var_consumer_key'] ) ? $mashup_var_options['mashup_var_consumer_key'] : '';
            $mashup_twitter_arg['consumersecret'] = isset( $mashup_var_options['mashup_var_consumer_secret'] ) ? $mashup_var_options['mashup_var_consumer_secret'] : '';
            $mashup_twitter_arg['accesstoken'] = isset( $mashup_var_options['mashup_var_access_token'] ) ? $mashup_var_options['mashup_var_access_token'] : '';
            $mashup_twitter_arg['accesstokensecret'] = isset( $mashup_var_options['mashup_var_access_token_secret'] ) ? $mashup_var_options['mashup_var_access_token_secret'] : '';
            $mashup_cache_limit_time = isset( $mashup_var_options['mashup_var_cache_limit_time'] ) ? $mashup_var_options['mashup_var_cache_limit_time'] : '';
            $mashup_tweet_num_from_twitter = isset( $mashup_var_options['mashup_var_tweet_num_post'] ) ? $mashup_var_options['mashup_var_tweet_num_post'] : '';
            $mashup_twitter_datetime_formate = isset( $mashup_var_options['mashup_var_twitter_datetime_formate'] ) ? $mashup_var_options['mashup_var_twitter_datetime_formate'] : '';

            if ( '' === intval( $mashup_cache_limit_time ) ) {
                $mashup_cache_limit_time = 60;
            }
            if ( '' === $mashup_twitter_datetime_formate ) {
                $mashup_twitter_datetime_formate = 'time_since';
            }
            if ( '' === intval( $mashup_tweet_num_from_twitter ) ) {
                $mashup_tweet_num_from_twitter = 5;
            }

            extract( $args, EXTR_SKIP );
            $title = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );
            $title = htmlspecialchars_decode( stripslashes( $title ) );
            $username = $instance['username'];
            $numoftweets = $instance['numoftweets'];

            if ( '' === intval( $numoftweets ) ) {
                $numoftweets = 2;
            }

            echo mashup_allow_special_char( $before_widget );
            if ( ! empty( $title ) && ' ' !== $title ) {
                echo mashup_allow_special_char( $args['before_title'] . esc_html( $title ) . $args['after_title'] );
            }
            if ( class_exists( 'wp_mashup_framework' ) ) {
                if ( strlen( $username ) > 1 ) {
                    mashup_include_file( wp_mashup_framework::plugin_path() . '/includes/cs-twitter/display-tweets.php' );
                    display_tweets( $username, $mashup_twitter_datetime_formate, $mashup_tweet_num_from_twitter, $numoftweets, $mashup_cache_limit_time );
                }
            }
            echo mashup_allow_special_char( $after_widget );
        }

    }

}
    add_action('widgets_init', function() {
        register_widget('Mashup_Twitter_Widget');
    });


