<?php
/**
 * Mashup_Social_media Class
 *
 * @package Mashup
 */
if (!class_exists('Mashup_Social_media')) {

    /**
      Mashup_Social_media class used to implement the Custom social links widget.
     */
    class Mashup_Social_media extends WP_Widget {

        /**
         * Sets up a new mashup social links widget instance.
         */
        public function __construct() {
            parent::__construct(
                    'social_media', // Base ID.
                    mashup_var_theme_text_srt('mashup_var_social_media'), // Name.
                    array('classname' => 'widget-text', 'description' => mashup_var_theme_text_srt('mashup_var_social_media_desc'))
            );
        }

        /**
         * Outputs the mashup social links widget settings form.
         *
         * @param array $instance Current settings.
         */
        function form($instance) {
            global $mashup_var_html_fields, $mashup_var_static_text;
            $instance = wp_parse_args((array) $instance, array('title' => ''));
            $title = $instance['title'];
            $facebook_url = isset($instance['facebook_url']) ? esc_url($instance['facebook_url']) : '';
            $twitter_url = isset($instance['twitter_url']) ? $instance['twitter_url'] : '';
            $google_url = isset($instance['google_url']) ? $instance['google_url'] : '';

            $cs_opt_array = array(
                'name' => mashup_var_theme_text_srt('mashup_var_title_field'),
                'desc' => '',
                'hint_text' => mashup_var_theme_text_srt('mashup_var_multiple_counter_title_hint'),
                'echo' => true,
                'field_params' => array(
                    'std' => $title,
                    'id' => '',
                    'classes' => '',
                    'cust_id' => mashup_allow_special_char($this->get_field_id('title')),
                    'cust_name' => mashup_allow_special_char($this->get_field_name('title')),
                    'return' => true,
                    'required' => false,
                ),
            );
            $mashup_var_html_fields->mashup_var_text_field($cs_opt_array);

            $cs_opt_array = array(
                'name' => mashup_var_theme_text_srt('mashup_var_social_info_facebook_url'),
                'desc' => '',
                'hint_text' => mashup_var_theme_text_srt('mashup_var_social_info_facebook_url_desc'),
                'echo' => true,
                'field_params' => array(
                    'std' => $facebook_url,
                    'id' => '',
                    'classes' => '',
                    'cust_id' => mashup_allow_special_char($this->get_field_id('facebook_url')),
                    'cust_name' => mashup_allow_special_char($this->get_field_name('facebook_url')),
                    'return' => true,
                    'required' => false,
                ),
            );
            $mashup_var_html_fields->mashup_var_text_field($cs_opt_array);

            $cs_opt_array = array(
                'name' => mashup_var_theme_text_srt('mashup_var_social_info_twitter_url'),
                'desc' => '',
                'hint_text' => mashup_var_theme_text_srt('mashup_var_social_info_twitter_url_desc'),
                'echo' => true,
                'field_params' => array(
                    'std' => $twitter_url,
                    'id' => '',
                    'classes' => '',
                    'cust_id' => mashup_allow_special_char($this->get_field_id('twitter_url')),
                    'cust_name' => mashup_allow_special_char($this->get_field_name('twitter_url')),
                    'return' => true,
                    'required' => false,
                ),
            );
            $mashup_var_html_fields->mashup_var_text_field($cs_opt_array);

            $cs_opt_array = array(
                'name' => mashup_var_theme_text_srt('mashup_var_social_info_google_url'),
                'desc' => '',
                'hint_text' => mashup_var_theme_text_srt('mashup_var_social_info_google_url_desc'),
                'echo' => true,
                'field_params' => array(
                    'std' => $google_url,
                    'id' => '',
                    'classes' => '',
                    'cust_id' => mashup_allow_special_char($this->get_field_id('google_url')),
                    'cust_name' => mashup_allow_special_char($this->get_field_name('google_url')),
                    'return' => true,
                    'required' => false,
                ),
            );
            $mashup_var_html_fields->mashup_var_text_field($cs_opt_array);
        }

        /**
         * Handles updating settings for the current mashup social links widget instance.
         *
         * @param array $new_instance New settings for this instance as input by the user.
         * @param array $old_instance Old settings for this instance.
         * @return array Settings to save or bool false to cancel saving.
         */
        function update($new_instance, $old_instance) {
            $instance = $old_instance;
            $instance['title'] = $new_instance['title'];
            $instance['facebook_url'] = $new_instance['facebook_url'];
            $instance['twitter_url'] = $new_instance['twitter_url'];
            $instance['google_url'] = $new_instance['google_url'];
            return $instance;
        }

        /**
         * Outputs the content for the current mashup social links widget instance.
         *
         * @param array $args Display arguments including 'before_title', 'after_title',
         *                        'before_widget', and 'after_widget'.
         * @param array $instance Settings for the current Text widget instance.
         */
        function widget($args, $instance) {
            extract($args, EXTR_SKIP);
            $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
            $title = htmlspecialchars_decode(stripslashes($title));
            $facebook_url = empty($instance['facebook_url']) ? '' : esc_url($instance['facebook_url']);
            $twitter_url = empty($instance['twitter_url']) ? '' : $instance['twitter_url'];
            $google_url = empty($instance['google_url']) ? '' : $instance['google_url'];
            echo '<div class="widget widget-social-media center">';
            if ('' !== $title) {
                echo '<div class="widget-title"><h5>' . esc_html($title) . '</h5></div>';
            }
            if ('' !== $facebook_url || '' !== $twitter_url || '' !== $google_url) {
                ?>
                <ul>
                    <?php
                    if ('' !== $facebook_url) {
                        $fb = ''; //facebook_count($facebook_url);
                        ?>
                        <li><a target="_blank" href="<?php echo esc_url($facebook_url); ?>" data-original-title="facebook"><i class="icon-facebook2"></i>
                                <strong><?php echo esc_html($fb); ?></strong><span><?php echo mashup_var_theme_text_srt('mashup_var_social_media_facebook_followers'); ?></span></a></li>
                    <?php } if ('' !== $twitter_url) { ?>
                        <li><a target="_blank" href="<?php echo esc_url('https://twitter.com/search?q=' . $twitter_url . ''); ?>" data-original-title="twitter"><i class="icon-twitter2"></i><strong>
                                    <?php
                                    echo esc_html(number_format(twitter_count_follower($twitter_url)));
                                    ?>
                                </strong><span><?php echo mashup_var_theme_text_srt('mashup_var_social_media_twitter_followers'); ?></span></a></li>
                        <?php
                    } if ('' !== $google_url) {
                        $_gurl = '';
                        if (intval($google_url)) {
                            $google_url = $google_url;
                        } else {
                            $google_url = '+' . $google_url;
                        }
                        $total_count = googleplus_count($google_url);
                        $_gurl = 'https://plus.google.com/' . $google_url . '';
                        ?>
                        <li><a target="_blank" href="<?php echo esc_url($_gurl); ?>" data-original-title="google"><i class=" icon-google4"></i>
                                <strong><?php echo esc_html(number_format($total_count)); ?></strong><span><?php echo mashup_var_theme_text_srt('mashup_var_social_media_google_followers'); ?></span></a></li>
                    <?php } ?>
                </ul>
                <?php
            }
            echo '</div>';
        }

    }

}
    add_action('widgets_init', function() {
        register_widget('Mashup_Social_media');
    });
if (!function_exists('googleplus_count')) {

    function googleplus_count($user) {
        global $mashup_var_options;

        $mashup_var_google_api_key = isset($mashup_var_options['mashup_var_google_api_key']) ? $mashup_var_options['mashup_var_google_api_key'] : '';
        if ($mashup_var_google_api_key == '') {
            return 0;
        }

        $url = 'https://www.googleapis.com/plus/v1/people/' . $user . '?key=' . $mashup_var_google_api_key . ' ';
        $response = wp_remote_get($url, true);
        $data = json_decode($response['body']);
        if (isset($data->circledByCount)) {
            return $data->circledByCount;
        } else {
            return 0;
        }
    }

}
if (!function_exists('cs_server_protocol')) {

    function cs_server_protocol() {
        if (is_ssl()) {
            return 'https://';
        }
        return 'http://';
    }

}
if (!function_exists('facebook_count')) {

    function facebook_count($url) {
        
        global $facebook_acess_token;
        $fb_count = '';
        $transName = 'cs_facebook_count';
        $cacheTime = 60 * 60 * 2;
        $fb_count = get_transient($transName);
        $curl_url = cs_server_protocol() . 'graph.facebook.com/' . $url . '?fields=likes&access_token=' . $facebook_acess_token . '';
        $args = array(
            'decompress' => false,
        );
        $results = wp_remote_get($curl_url, $args);
        $html = '';

        if (isset($results) && array_key_exists('error', $results)) {
            $html .= $cs_facebook_message = 'Error - ' . $results['error']['message'];
        } else {
            $results = isset($results['body']) ? json_decode($results['body']) : '';
            $html .= isset($results->likes) ? $results->likes : '0 ';
        }
        return $html;
//        // Query in FQL
//        $fql = "SELECT share_count, like_count, comment_count ";
//        $fql .= " FROM link_stat WHERE url = '$url'";
//        $fqlURL = "https://api.facebook.com/method/fql.query?format=json&query=" . urlencode( $fql );
//        // Facebook Response is in JSON
//        $response = file_get_contents( $fqlURL );
//		//$response = '';
//        $fb = json_decode( $response );
//        if ( isset( $fb[0]->like_count ) ) {
//            return $fb[0]->like_count;
//        } else {
//            return 0;
//        }
    }

}
if (!function_exists('twitter_count_follower')) {

    function twitter_count_follower($user) {
        require_once('TwitterAPIExchange.php'); //get it from https://github.com/J7mbo/twitter-api-php
        global $mashup_var_options;

        $mashup_var_consumer_key = isset($mashup_var_options['mashup_var_consumer_key']) ? $mashup_var_options['mashup_var_consumer_key'] : '';
        $mashup_var_consumer_secret = isset($mashup_var_options['mashup_var_consumer_secret']) ? $mashup_var_options['mashup_var_consumer_secret'] : '';
        $mashup_var_access_token = isset($mashup_var_options['mashup_var_access_token']) ? $mashup_var_options['mashup_var_access_token'] : '';
        $mashup_var_access_token_secret = isset($mashup_var_options['mashup_var_access_token_secret']) ? $mashup_var_options['mashup_var_access_token_secret'] : '';

        $settings = array(
            'oauth_access_token' => $mashup_var_access_token,
            'oauth_access_token_secret' => $mashup_var_access_token_secret,
            'consumer_key' => $mashup_var_consumer_key,
            'consumer_secret' => $mashup_var_consumer_secret,
        );
        $ta_url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
        $getfield = '?screen_name=' . $user . '';
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange($settings);
        $follow_count = $twitter->setGetfield($getfield)
                ->buildOauth($ta_url, $requestMethod)
                ->performRequest();
        $data = json_decode($follow_count, true);
        if (isset($data[0]['user']['followers_count'])) {
            $followers_count = $data[0]['user']['followers_count'];
            return $followers_count;
        } else {
            return 0;
        }
    }

}