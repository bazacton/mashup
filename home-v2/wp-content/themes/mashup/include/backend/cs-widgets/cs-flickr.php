<?php

/**
 * Mashup_Flickr Class
 *
 * @package Mashup
 */
if ( ! class_exists( 'Mashup_Flickr' ) ) {

    /**
      Mashup_Flickr class used to implement the Custom flicker gallery widget.
     */
    class Mashup_Flickr extends WP_Widget {

        /**
         * Sets up a new mashup flicker widget instance.
         */
        public function __construct() {
            global $mashup_var_static_text;
            parent::__construct(
                    'mashup_flickr', // Base ID.
                    mashup_var_theme_text_srt( 'mashup_var_flickr_gallery' ), // Name.
                    array( 'classname' => 'widget-gallery', 'description' => mashup_var_theme_text_srt( 'mashup_var_flickr_description' ) )
            );
        }

        /**
         * Outputs the mashup flicker widget settings form.
         *
         * @param array $instance Current settings.
         */
        function form( $instance ) {
            global $mashup_var_html_fields, $mashup_var_static_text;
            $strings = new mashup_theme_all_strings;
            $strings->mashup_short_code_strings();

            $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
            $title = $instance['title'];
            $username = isset( $instance['username'] ) ? esc_attr( $instance['username'] ) : '';
            $no_of_photos = isset( $instance['no_of_photos'] ) ? esc_attr( $instance['no_of_photos'] ) : '';

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
                'name' => mashup_var_theme_text_srt( 'mashup_var_flickr_username' ),
                'desc' => '',
                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_flickr_username_hint' ),
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr( $username ),
                    'cust_id' => '',
                    'cust_name' => mashup_allow_special_char( $this->get_field_name( 'username' ) ),
                    'return' => true,
                ),
            );

            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_theme_text_srt( 'mashup_var_flickr_photos' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr( $no_of_photos ),
                    'cust_id' => '',
                    'cust_name' => mashup_allow_special_char( $this->get_field_name( 'no_of_photos' ) ),
                    'return' => true,
                ),
            );

            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
        }

        /**
         * Handles updating settings for the current mashup flicker widget instance.
         *
         * @param array $new_instance New settings for this instance as input by the user.
         * @param array $old_instance Old settings for this instance.
         * @return array Settings to save or bool false to cancel saving.
         */
        function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance['title'] = $new_instance['title'];
            $instance['username'] = $new_instance['username'];
            $instance['no_of_photos'] = $new_instance['no_of_photos'];
            return $instance;
        }

        /**
         * Outputs the content for the current mashup flicker widget instance.
         *
         * @param array $args Display arguments including 'before_title', 'after_title',
         *                        'before_widget', and 'after_widget'.
         * @param array $instance Settings for the current Text widget instance.
         */
        function widget( $args, $instance ) {
            global $mashup_var_options, $mashup_var_static_text;
            extract( $args, EXTR_SKIP );

            $title = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );
            $title = htmlspecialchars_decode( stripslashes( $title ) );
            $username = empty( $instance['username'] ) ? ' ' : apply_filters( 'widget_title', $instance['username'] );
            $no_of_photos = empty( $instance['no_of_photos'] ) ? ' ' : apply_filters( 'widget_title', $instance['no_of_photos'] );
            if ( '' === $instance['no_of_photos'] ) {
                $instance['no_of_photos'] = '3';
            }
            $before_widget = isset( $args['before_widget'] ) ? $args['before_widget'] : '';
            $after_widget = isset( $args['after_widget'] ) ? $args['after_widget'] : '';

            echo mashup_allow_special_char( $before_widget );
            if ( '' !== $title ) {
                echo '<div class="widget-title"><h6>' . esc_html( $title ) . '</h6></div>';
            }

            $get_flickr_array = array();
            $apikey = $mashup_var_options['mashup_var_flickr_key'];
            if ( '' !== $apikey ) {
                // Getting transient.
                $cachetime = 86400;
                $transient = 'flickr_gallery_data';
                $check_transient = get_transient( $transient );
                // Get Flickr Gallery saved data.
                $saved_data = get_option( 'flickr_gallery_data' );
                $db_apikey = '';
                $db_user_name = '';
                $db_total_photos = '';
                if ( '' !== $saved_data ) {
                    $db_apikey = isset( $saved_data['api_key'] ) ? $saved_data['api_key'] : '';
                    $db_user_name = isset( $saved_data['user_name'] ) ? $saved_data['user_name'] : '';
                    $db_total_photos = isset( $saved_data['total_photos'] ) ? $saved_data['total_photos'] : '';
                }
                if ( false === $check_transient || ($apikey !== $db_apikey || $username !== $db_user_name || $no_of_photos !== $db_total_photos) ) {
                    $user_id = 'https://api.flickr.com/services/rest/?method=flickr.people.findByUsername&api_key=' . $apikey . '&username=' . $username . '&format=json&nojsoncallback=1';
                    $user_info = wp_remote_get( $user_id, array( 'decompress' => false ) );
                    $user_info = isset( $user_info['body'] ) ? $user_info['body'] : '';
					$user_info = json_decode( $user_info, true );
                    if ( 'ok' === $user_info['stat'] ) {
                        $user_get_id = $user_info['user']['id'];
                        $get_flickr_array['api_key'] = $apikey;
                        $get_flickr_array['user_name'] = $username;
                        $get_flickr_array['user_id'] = $user_get_id;
                        $url = 'https://api.flickr.com/services/rest/?method=flickr.people.getPublicPhotos&api_key=' . $apikey . '&user_id=' . $user_get_id . '&per_page=' . $no_of_photos . '&format=json&nojsoncallback=1';
                        $content = wp_remote_get( $url, array( 'decompress' => false ) );
                        $content = isset( $content['body'] ) ? $content['body'] : '';
                        $content = json_decode( $content, true );
                        if ( 'ok' === $content['stat'] ) {
                            $counter = 0;
                            echo '<ul>';
                            foreach ( (array) $content['photos']['photo'] as $photo ) {
                                $image_file = "https://farm{$photo['farm']}.staticflickr.com/{$photo['server']}/{$photo['id']}_{$photo['secret']}_s.jpg";
                                $img_headers = get_headers( $image_file );
                                if ( strpos( $img_headers[0], '200' ) !== false ) {
                                    $image_file = $image_file;
                                } else {
                                    $image_file = "https://farm{$photo['farm']}.staticflickr.com/{$photo['server']}/{$photo['id']}_{$photo['secret']}_q.jpg";
                                    $img_headers = get_headers( $image_file );
                                    if ( strpos( $img_headers[0], '200' ) !== false ) {
                                        $image_file = $image_file;
                                    } else {
                                        $image_file = get_template_directory_uri() . '/assets/images/no_image_thumb.jpg';
                                    }
                                }
                                echo '<li>';
                                echo '<div class="cs-media">';
                                echo '<figure> <img alt="" src="' . esc_url( $image_file ) . '">';
                                echo '<figcaption class="cs-bgcolor"><a target="_blank" href="https://www.flickr.com/photos/' . $photo['owner'] . '/' . $photo['id'] . '/"></a></figcaption>';
                                echo '</figure>';
                                echo '</div>';
                                echo '</li>';
                                $counter ++;
                                $get_flickr_array['photo_src'][] = $image_file;
                                $get_flickr_array['photo_title'][] = $photo['title'];
                                $get_flickr_array['photo_owner'][] = $photo['owner'];
                                $get_flickr_array['photo_id'][] = $photo['id'];
                            }
                            echo '</ul>';
                            $get_flickr_array['total_photos'] = $counter;
                            // Setting Transient.
                            set_transient( $transient, true, $cachetime );
                            update_option( 'flickr_gallery_data', $get_flickr_array );
                            if ( $counter == 0 ) {
                                echo esc_html( mashup_var_theme_text_srt( 'mashup_var_noresult_found' ));
                            }
                        } else {
                            echo esc_html( mashup_var_theme_text_srt( 'mashup_var_error' )) . $content['code'] . ' - ' . $content['message'];
                        }
                    } else {
                        echo esc_html( mashup_var_theme_text_srt( 'mashup_var_error' )) . $user_info['code'] . ' - ' . $user_info['message'];
                    }
                } else {
                    if ( get_option( 'flickr_gallery_data' ) <> '' ) {
                        $flick_data = get_option( 'flickr_gallery_data' );
                        echo '<ul>';
                        if ( isset( $flick_data['photo_src'] ) ) :
                            $i = 0;
                            foreach ( $flick_data['photo_src'] as $ph ) {
                                echo '<li>';
                                echo '<div class="cs-media">';
                                echo '<figure> <img alt="" src="' . esc_url( $flick_data['photo_src'][$i] ) . '">';
                                echo '<figcaption class="cs-bgcolor"><a target="_blank" href="https://www.flickr.com/photos/' . $flick_data['photo_owner'][$i] . '/' . $flick_data['photo_id'][$i] . '/"></a></figcaption>';
                                echo '</figure>';
                                echo '</div>';
                                echo '</li>';
                                $i ++;
                            }
                        endif;
                        echo '</ul>';
                    } else {
                        echo esc_html( mashup_var_theme_text_srt( 'mashup_var_noresult_found' ));
                    }
                }
            } else {
                echo esc_html( mashup_var_theme_text_srt( 'mashup_var_flickr_api_key' ));
            }
            echo mashup_allow_special_char( $after_widget );
        }

    }

}
    add_action('widgets_init', function() {
        register_widget('mashup_flickr');
    });
