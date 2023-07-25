<?php
/*
 *
 * @Shortcode Name : Tweets
 * @retrun
 *
 */
if ( ! function_exists( 'mashup_var_page_builder_tweets' ) ) {

    function mashup_var_page_builder_tweets( $die = 0 ) {
        global $mashup_node, $count_node, $post, $mashup_var_html_fields, $mashup_var_form_fields;
        $shortcode_element = '';
        $filter_element = 'filterdrag';
        $shortcode_view = '';
        $output = array();
        $counter = $_POST['counter'];
        $mashup_counter = $_POST['counter'];
        if ( isset( $_POST['action'] ) && ! isset( $_POST['shortcode_element_id'] ) ) {
            $POSTID = '';
            $shortcode_element_id = '';
        } else {
            $POSTID = $_POST['POSTID'];
            $shortcode_element_id = $_POST['shortcode_element_id'];
            $shortcode_str = stripslashes( $shortcode_element_id );
            $PREFIX = 'mashup_tweets';
            $parseObject = new ShortcodeParse();
            $output = $parseObject->mashup_shortcodes( $output, $shortcode_str, true, $PREFIX );
        }
        $defaults = array(
            'mashup_var_tweets_user_name' => 'default',
            'mashup_var_no_of_tweets' => '',
            'mashup_var_tweets_color' => '',
            'mashup_var_twitter_title' => '',
            'mashup_var_twitter_sub_title' => '',
            'mashup_var_twitter_element_align' => '',
        );
        if ( isset( $output['0']['atts'] ) ) {
            $atts = $output['0']['atts'];
        } else {
            $atts = array();
        }
        $tweets_element_size = '25';
        foreach ( $defaults as $key => $values ) {
            if ( isset( $atts[$key] ) ) {
                $$key = $atts[$key];
            } else {
                $$key = $values;
            }
        }
        $name = 'mashup_var_page_builder_tweets';
        $coloumn_class = 'column_' . $tweets_element_size;
        if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
            $shortcode_element = 'shortcode_element_class';
            $shortcode_view = 'cs-pbwp-shortcode';
            $filter_element = 'ajax-drag';
            $coloumn_class = '';
        }
    global $mashup_var_static_text;
        $strings = new mashup_theme_all_strings;
        $strings->mashup_short_code_strings();
        ?>
        <div id="<?php echo esc_attr( $name . $mashup_counter ) . '_del'; ?>" class="column parentdelete <?php echo esc_attr( $coloumn_class ); ?> <?php echo esc_attr( $shortcode_view ); ?>" item="tweets" data="<?php echo mashup_element_size_data_array_index( $tweets_element_size ) ?>" >
            <?php mashup_element_setting( $name, $mashup_counter, $tweets_element_size, '', 'check-square-o' ); ?>
            <div class="cs-wrapp-class-<?php echo esc_attr( $mashup_counter ) ?> <?php echo esc_attr( $shortcode_element ); ?>" id="<?php echo esc_attr( $name . $mashup_counter ) ?>" data-shortcode-template="[mashup_tweets {{attributes}}]" style="display: none;">
                <div class="cs-heading-area">
                    <h5><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_twitter_edit_msg' ) ); ?></h5>
                    <a href="javascript:mashup_frame_removeoverlay('<?php echo esc_attr( $name . $mashup_counter ); ?>','<?php echo esc_attr( $filter_element ); ?>')" class="cs-btnclose"><i class="icon-cancel"></i></a> </div>
                <div class="cs-pbwp-content">
                    <div class="cs-wrapp-clone cs-shortcode-wrapp cs-pbwp-content">
                        <?php
                        if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
                            mashup_shortcode_element_size();
                        }
                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_image_field_name' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_image_field_name_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => esc_attr( $mashup_var_twitter_title ),
                                'cust_id' => '',
                                'cust_name' => 'mashup_var_twitter_title[]',
                                'return' => true,
                            ),
                        );
                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_element_sub_title' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_element_sub_title_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => esc_attr( $mashup_var_twitter_sub_title ),
                                'cust_id' => '',
                                'cust_name' => 'mashup_var_twitter_sub_title[]',
                                'return' => true,
                            ),
                        );
                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_align' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_align_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => $mashup_var_twitter_element_align,
                                'id' => '',
                                'cust_id' => '',
                                'cust_name' => 'mashup_var_twitter_element_align[]',
                                'classes' => 'dropdown chosen-select',
                                'options' => array(
                                    'left' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_left' ),
                                    'right' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_right' ),
                                    'center' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_center' ),
                                ),
                                'return' => true,
                            ),
                        );
                        $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
                        $mashup_opt_array = array(
                            'name' => esc_html( mashup_var_theme_text_srt( 'mashup_var_twitter_username' ) ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_twitter_username_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => esc_html( $mashup_var_tweets_user_name ),
                                'cust_id' => 'mashup_var_tweets_user_name',
                                'cust_name' => 'mashup_var_tweets_user_name[]',
                                'classes' => 'input-medium',
                                'return' => true,
                            ),
                        );
                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                        $mashup_opt_array = array(
                            'name' => esc_html( mashup_var_theme_text_srt( 'mashup_var_twitter_text_color' ) ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_twitter_text_color_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => esc_html( $mashup_var_tweets_color ),
                                'cust_id' => 'mashup_var_tweets_color',
                                'cust_name' => 'mashup_var_tweets_color[]',
                                'classes' => 'bg_color',
                                'return' => true,
                            ),
                        );
                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                        $mashup_opt_array = array(
                            'name' => esc_html( mashup_var_theme_text_srt( 'mashup_var_twitter_tweets_num' ) ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_twitter_tweets_num_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => esc_html( $mashup_var_no_of_tweets ),
                                'cust_id' => 'mashup_var_no_of_tweets',
                                'cust_name' => 'mashup_var_no_of_tweets[]',
                                'classes' => 'input-medium',
                                'return' => true,
                            ),
                        );
                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                        ?>
                    </div>
                    <?php if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) { ?>
                        <ul class="form-elements insert-bg">
                            <li class="to-field">
                                <a class="insert-btn cs-main-btn" onclick="javascript:mashup_shortcode_insert_editor('<?php echo esc_js( str_replace( 'mashup_pb_', '', $name ) ); ?>', '<?php echo esc_js( $name . $mashup_counter ) ?>', '<?php echo esc_js( $filter_element ); ?>')" ><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_insert' ) ); ?></a>
                            </li>
                        </ul>
                        <div id="results-shortocde"></div>
                        <?php
                    } else {
                        $mashup_opt_array = array(
                            'std' => 'tweets',
                            'id' => '',
                            'before' => '',
                            'after' => '',
                            'classes' => '',
                            'extra_atr' => '',
                            'cust_id' => '',
                            'cust_name' => 'mashup_orderby[]',
                            'return' => true,
                            'required' => false
                        );
                        echo $mashup_var_form_fields->mashup_var_form_hidden_render( $mashup_opt_array );
                        $mashup_opt_array = array(
                            'name' => '',
                            'desc' => '',
                            'hint_text' => '',
                            'echo' => true,
                            'field_params' => array(
                                'std' => esc_html( mashup_var_theme_text_srt( 'mashup_var_save' ) ),
                                'cust_id' => '',
                                'cust_type' => 'button',
                                'classes' => 'cs-admin-btn',
                                'cust_name' => '',
                                'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
                                'return' => true,
                            ),
                        );
                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                    }
                    ?>
                </div>
            </div>
        </div>
       
        <?php
        if ( $die <> 1 ) {
            die();
        }
    }

    add_action( 'wp_ajax_mashup_var_page_builder_tweets', 'mashup_var_page_builder_tweets' );
}

if ( ! function_exists( 'mashup_save_page_builder_data_tweets_callback' ) ) {

    /**
     * Save data for tweets shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_tweets_callback( $args ) {
        $data = $args['data'];
        $counters = $args['counters'];
        $widget_type = $args['widget_type'];
        $column = $args['column'];
        if ( $widget_type == "tweets" ) {
            $shortcode = '';
            $tweet = $column->addChild( 'tweets' );
            $tweet->addChild( 'page_element_size', htmlspecialchars( $data['tweets_element_size'][$counters['mashup_global_counter_tweets']] ) );
            $tweet->addChild( 'tweets_element_size', htmlspecialchars( $data['tweets_element_size'][$counters['mashup_global_counter_tweets']] ) );
            if ( isset( $data['mashup_widget_element_num'][$counters['mashup_counter']] ) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode' ) {
                $shortcode_str = stripslashes( $data['shortcode']['tweets'][$counters['mashup_shortcode_counter_tweets']] );
                $counters['mashup_shortcode_counter_tweets'] ++;
                $tweet->addChild( 'mashup_shortcode', htmlspecialchars( $shortcode_str, ENT_QUOTES ) );
            } else {
                $shortcode = '[mashup_tweets ';
                if ( isset( $data['mashup_var_tweets_user_name'][$counters['mashup_counter_tweets']] ) && $data['mashup_var_tweets_user_name'][$counters['mashup_counter_tweets']] != '' ) {
                    $shortcode .='mashup_var_tweets_user_name="' . htmlspecialchars( $data['mashup_var_tweets_user_name'][$counters['mashup_counter_tweets']] ) . '" ';
                }
                if ( isset( $data['mashup_var_twitter_title'][$counters['mashup_counter_tweets']] ) && $data['mashup_var_twitter_title'][$counters['mashup_counter_tweets']] != '' ) {
                    $shortcode .='mashup_var_twitter_title="' . htmlspecialchars( $data['mashup_var_twitter_title'][$counters['mashup_counter_tweets']] ) . '" ';
		}
		if ( isset( $data['mashup_var_twitter_sub_title'][$counters['mashup_counter_tweets']] ) && $data['mashup_var_twitter_sub_title'][$counters['mashup_counter_tweets']] != '' ) {
                    $shortcode .='mashup_var_twitter_sub_title="' . htmlspecialchars( $data['mashup_var_twitter_sub_title'][$counters['mashup_counter_tweets']] ) . '" ';
                }
		if ( isset( $data['mashup_var_twitter_element_align'][$counters['mashup_counter_tweets']] ) && $data['mashup_var_twitter_element_align'][$counters['mashup_counter_tweets']] != '' ) {
                    $shortcode .='mashup_var_twitter_element_align="' . htmlspecialchars( $data['mashup_var_twitter_element_align'][$counters['mashup_counter_tweets']] ) . '" ';
                }
                if ( isset( $data['mashup_var_tweets_color'][$counters['mashup_counter_tweets']] ) && $data['mashup_var_tweets_color'][$counters['mashup_counter_tweets']] != '' ) {
                    $shortcode .='mashup_var_tweets_color="' . htmlspecialchars( $data['mashup_var_tweets_color'][$counters['mashup_counter_tweets']] ) . '" ';
                }
                if ( isset( $data['mashup_var_no_of_tweets'][$counters['mashup_counter_tweets']] ) && $data['mashup_var_no_of_tweets'][$counters['mashup_counter_tweets']] != '' ) {
                    $shortcode .='mashup_var_no_of_tweets="' . htmlspecialchars( $data['mashup_var_no_of_tweets'][$counters['mashup_counter_tweets']] ) . '" ';
                }
                $shortcode .=']';
                $tweet->addChild( 'mashup_shortcode', $shortcode );
                $counters['mashup_counter_tweets'] ++;
            }
            $counters['mashup_global_counter_tweets'] ++;
        }
        return array(
            'data' => $data,
            'counters' => $counters,
            'widget_type' => $widget_type,
            'column' => $column,
        );
    }

    add_filter( 'mashup_save_page_builder_data', 'mashup_save_page_builder_data_tweets_callback' );
}

if ( ! function_exists( 'mashup_load_shortcode_counters_tweets_callback' ) ) {

    /**
     * Populate tweets shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_tweets_callback( $counters ) {
        $counters['mashup_counter_tweets'] = 0;
        $counters['mashup_shortcode_counter_tweets'] = 0;
        $counters['mashup_global_counter_tweets'] = 0;
        return $counters;
    }

    add_filter( 'mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_tweets_callback' );
}

if ( ! function_exists( 'mashup_shortcode_names_list_populate_tweets_callback' ) ) {

    /**
     * Populate tweets shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_tweets_callback( $shortcode_array ) {
        $shortcode_array['tweets'] = array(
            'title' => mashup_var_frame_text_srt( 'mashup_var_tweets' ),
            'name' => 'tweets',
            'icon' => 'icon-twitter2',
            'categories' => 'loops',
        );
        return $shortcode_array;
    }

    add_filter( 'mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_tweets_callback' );
}

if ( ! function_exists( 'mashup_element_list_populate_tweets_callback' ) ) {

    /**
     * Populate tweets shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_tweets_callback( $element_list ) {
        $element_list['tweets'] = mashup_var_frame_text_srt( 'mashup_var_tweets' );
        return $element_list;
    }

    add_filter( 'mashup_element_list_populate', 'mashup_element_list_populate_tweets_callback' );
}