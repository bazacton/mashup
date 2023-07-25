<?php

/**
 * @Ads widget Class
 *
 *
 */
if ( ! class_exists( 'mashup_ads' ) ) {

    class mashup_ads extends WP_Widget {

        /**
         * @init Ads Module
         *
         *
         */
        public function __construct() {
            global $mashup_var_static_text;

            parent::__construct(
                    'mashup_ads', // Base ID
                    mashup_var_theme_text_srt( 'mashup_var_ads' ), // Name
                    array( 'classname' => '', 'description' => mashup_var_theme_text_srt( 'mashup_var_ads_description' ), ) // Args
            );
        }

        /**
         * @Ads html form
         *
         *
         */
        function form( $instance ) {
            global $mashup_var_form_fields, $mashup_var_html_fields, $mashup_var_static_text;

            $cs_rand_id = rand( 23789, 934578930 );
            $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'banner_code' => '' ) );
            $title = $instance['title'];
            $banner_style = isset( $instance['banner_style'] ) ? esc_attr( $instance['banner_style'] ) : '';
            $banner_code = $instance['banner_code'];
            $banner_view = isset( $instance['banner_view'] ) ? esc_attr( $instance['banner_view'] ) : '';
            $showcount = isset( $instance['showcount'] ) ? esc_attr( $instance['showcount'] ) : '';


            $strings = new mashup_theme_all_strings;
            $strings->mashup_short_code_strings();

            $mashup_opt_array = array(
                'name' => mashup_var_theme_text_srt( 'mashup_var_title_field' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr( $title ),
                    'id' => mashup_allow_special_char( $this->get_field_id( 'title' ) ),
                    'classes' => '',
                    'cust_id' => mashup_allow_special_char( $this->get_field_name( 'title' ) ),
                    'cust_name' => mashup_allow_special_char( $this->get_field_name( 'title' ) ),
                    'return' => true,
                    'required' => false
                ),
            );
            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_theme_text_srt( 'mashup_var_banner_view' ),
                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_banner_view_hint' ),
                'field_params' => array(
                    'std' => esc_attr( $banner_view ),
                    'cust_id' => mashup_allow_special_char( $this->get_field_id( 'banner_view' ) ),
                    'cust_name' => mashup_allow_special_char( $this->get_field_name( 'banner_view' ) ),
                    'desc' => '',
                    'classes' => 'input-small chosen-select',
                    'options' =>
                    array(
                        'single' => mashup_var_theme_text_srt( 'mashup_var_single_banner' ),
                        'random' => mashup_var_theme_text_srt( 'mashup_var_random_banner' ),
                    ),
                    'return' => true,
                ),
            );
            $output .= $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );


            $mashup_opt_array = array(
                'name' => mashup_var_theme_text_srt( 'mashup_var_banner_style' ),
                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_banner_style_hint' ),
                'field_params' => array(
                    'std' => esc_attr( $banner_style ),
                    'cust_id' => mashup_allow_special_char( $this->get_field_id( 'banner_style' ) ),
                    'cust_name' => mashup_allow_special_char( $this->get_field_name( 'banner_style' ) ),
                    'desc' => '',
                    'classes' => 'input-small chosen-select',
                    'options' =>
                    array(
                        'top_banner' => mashup_var_theme_text_srt( 'mashup_var_banner_type_top' ),
                        'bottom_banner' => mashup_var_theme_text_srt( 'mashup_var_banner_type_bottom' ),
                        'sidebar_banner' => mashup_var_theme_text_srt( 'mashup_var_banner_type_sidebar' ),
                        'vertical_banner' => mashup_var_theme_text_srt( 'mashup_var_banner_type_vertical' ),
                    ),
                    'return' => true,
                ),
            );
            $output .= $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );



            $mashup_opt_array = array(
                'name' => mashup_var_theme_text_srt( 'mashup_var_no_of_banner' ),
                'desc' => '',
                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_no_of_banner_hint' ),
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr( $showcount ),
                    'id' => mashup_allow_special_char( $this->get_field_id( 'showcount' ) ),
                    'classes' => '',
                    'cust_id' => mashup_allow_special_char( $this->get_field_name( 'showcount' ) ),
                    'cust_name' => mashup_allow_special_char( $this->get_field_name( 'showcount' ) ),
                    'return' => true,
                    'required' => false
                ),
            );
            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_theme_text_srt( 'mashup_var_banner_code' ),
                'desc' => '',
                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_banner_code_hint' ),
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr( $banner_code ),
                    'id' => mashup_allow_special_char( $this->get_field_id( 'banner_code' ) ),
                    'classes' => '',
                    'cust_id' => mashup_allow_special_char( $this->get_field_name( 'banner_code' ) ),
                    'cust_name' => mashup_allow_special_char( $this->get_field_name( 'banner_code' ) ),
                    'return' => true,
                    'required' => false
                ),
            );
            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
        }

        /**
         * @Ads update form data
         *
         *
         */
        function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance['title'] = $new_instance['title'];
            $instance['banner_style'] = esc_sql( $new_instance['banner_style'] );
            $instance['banner_code'] = $new_instance['banner_code'];
            $instance['banner_view'] = esc_sql( $new_instance['banner_view'] );
            $instance['showcount'] = esc_sql( $new_instance['showcount'] );
            return $instance;
        }

        /**
         * @Display Ads widget
         *
         */
        function widget( $args, $instance ) {
            extract( $args, EXTR_SKIP );
            global $wpdb, $post, $cs_theme_options;
            $title = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );
            $title = htmlspecialchars_decode( stripslashes( $title ) );
            $banner_style = empty( $instance['banner_style'] ) ? ' ' : apply_filters( 'widget_title', $instance['banner_style'] );
            $banner_code = empty( $instance['banner_code'] ) ? ' ' : $instance['banner_code'];
            $banner_view = empty( $instance['banner_view'] ) ? ' ' : apply_filters( 'widget_title', $instance['banner_view'] );
            $showcount = $instance['showcount'];
            // WIDGET display CODE Start
            echo balanceTags( $before_widget, false );
            if ( strlen( $title ) <> 1 || strlen( $title ) <> 0 ) {
                echo balanceTags( $before_title . $title . $after_title, false );
            }
            $showcount = ( $showcount <> '' || ! is_integer( $showcount ) ) ? $showcount : 2;

            if ( $banner_view == 'single' ) {
                echo do_shortcode( $banner_code );
            } else {


                $cs_total_banners = ( is_integer( $showcount ) && $showcount > 10) ? 10 : $showcount;
                if ( isset( $cs_theme_options['banner_field_title'] ) ) {
                    $i = 0;
                    $d = 0;
                    $cs_banner_array = array();
                    foreach ( $cs_theme_options['banner_field_title'] as $banner ) :
                        if ( $cs_theme_options['banner_field_style'][$i] == $banner_style ) {
                            $cs_banner_array[] = $i;
                            $d ++;
                        }
                        if ( $cs_total_banners == $d ) {
                            break;
                        }
                        $i ++;
                    endforeach;
                    if ( sizeof( $cs_banner_array ) > 0 ) {
                        $cs_act_size = sizeof( $cs_banner_array ) - 1;
                        $cs_rand_banner = rand( 0, $cs_act_size );

                        $rand_banner = $banner_array[$rand_banner];
                        echo do_shortcode( '[mashup_ads id="' . $cs_theme_options['banner_field_code_no'][$rand_banner] . '"]' );
                    }
                }
            }

            echo balanceTags( $after_widget, false );
        }

    }

}
    add_action('widgets_init', function() {
        register_widget('mashup_ads');
    });



