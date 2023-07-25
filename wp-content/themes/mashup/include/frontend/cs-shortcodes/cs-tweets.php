<?php

/*
 *
 * @Shortcode Name :  Start function for Tweets shortcode/element front end view
 * @retrun
 *
 */

if ( ! function_exists( 'mashup_var_tweets_shortcode' ) ) {

    function mashup_var_tweets_shortcode( $atts, $content = "" ) {

        $defaults = array( 'column_size' => '',
            'mashup_var_tweets_user_name' => 'default',
            'mashup_var_tweets_color' => '',
            'mashup_var_no_of_tweets' => '',
            'mashup_var_tweets_class' => '',
            'mashup_var_twitter_title' => '',
            'mashup_var_twitter_sub_title' => '',
            'mashup_var_twitter_element_align' => '',
        );
        extract( shortcode_atts( $defaults, $atts ) );
        $column_class = mashup_var_custom_column_class( $column_size );
        $mashup_var_twitter_title = isset( $mashup_var_twitter_title ) ? $mashup_var_twitter_title : '';
        $mashup_var_twitter_sub_title = isset( $mashup_var_twitter_sub_title ) ? $mashup_var_twitter_sub_title : '';
        $mashup_var_twitter_element_align = isset( $mashup_var_twitter_element_align ) ? $mashup_var_twitter_element_align : '';
        $mashup_var_tweets_class = isset( $mashup_var_tweets_class ) ? $mashup_var_tweets_class : '';
        $mashup_var_tweets_user_name = isset( $mashup_var_tweets_user_name ) ? $mashup_var_tweets_user_name : '';
        $mashup_var_no_of_tweets = isset( $mashup_var_no_of_tweets ) ? $mashup_var_no_of_tweets : '';
        $mashup_var_tweets_color = isset( $mashup_var_tweets_color ) ? $mashup_var_tweets_color : '';
        $CustomId = '';
        if ( isset( $mashup_var_tweets_class ) && $mashup_var_tweets_class ) {
            $CustomId = 'id="' . $mashup_var_tweets_class . '"';
        }
        $html = '';
        // element title and subtitle
        if ( (isset( $mashup_var_twitter_title ) && $mashup_var_twitter_title <> '') || (isset( $mashup_var_twitter_sub_title ) and $mashup_var_twitter_sub_title <> '') ) {
            $html .= '<div class="element-title ' . esc_html( $mashup_var_twitter_element_align ) . '">';
            if ( isset( $mashup_var_twitter_title ) && $mashup_var_twitter_title <> '' ) {
                $html .= '<h2>' . esc_html( $mashup_var_twitter_title ) . '</h2> ';
            }
            $html .='<em></em>';
            if ( isset( $mashup_var_twitter_sub_title ) && $mashup_var_twitter_sub_title <> '' ) {
                $html .= '<p>' . esc_html( $mashup_var_twitter_sub_title ) . '</p>';
            }
            $html .= '</div>';
        }
        $html .= '<div class="row">';
        $html .= mashup_get_tweets( $mashup_var_tweets_user_name, $mashup_var_no_of_tweets, $mashup_var_tweets_color );
        $html .= '</div>';
        return $html;
    }

    if ( function_exists( 'mashup_var_short_code' ) ) {
        mashup_var_short_code( 'mashup_tweets', 'mashup_var_tweets_shortcode' );
    }
}

/*
 *
 * @ Start function for Get Tweets through APi
 * @retrun
 *
 */

if ( ! function_exists( 'mashup_get_tweets' ) ) {

    function mashup_get_tweets( $username, $numoftweets, $mashup_tweets_color = '' ) {
        global $mashup_var_options, $mashup_var_static_text, $mashup_twitter_arg;
        $strings = new mashup_theme_all_strings;
        $strings->mashup_short_code_strings();
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

        $username = html_entity_decode( $username );
        $numoftweets = $numoftweets;
        if ( $numoftweets == '' ) {
            $numoftweets = 2;
        }

        if ( class_exists( 'wp_mashup_framework' ) ) {
            if ( strlen( $username ) > 1 ) {
                mashup_include_file( wp_mashup_framework::plugin_path() . '/includes/cs-twitter/display-tweets.php' );

                display_tweets_element( $username, $mashup_twitter_datetime_formate, $mashup_tweet_num_from_twitter, $numoftweets, $mashup_cache_limit_time );
            }
        }

    }

}
