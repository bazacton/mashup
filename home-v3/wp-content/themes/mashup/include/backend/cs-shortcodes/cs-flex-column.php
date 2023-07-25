<?php
/*
 *
 * @File : Flex column
 * @retrun
 *
 */

if ( ! function_exists( 'mashup_var_page_builder_flex_column' ) ) {

    function mashup_var_page_builder_flex_column( $die = 0 ) {
        global $post, $mashup_node, $mashup_var_html_fields, $mashup_var_form_fields;

        if ( function_exists( 'mashup_shortcode_names' ) ) {
            $shortcode_element = '';
            $filter_element = 'filterdrag';
            $shortcode_view = '';
            $mashup_output = array();
            $MASHUP_PREFIX = 'mashup_column';
            $counter = isset( $_POST['counter'] ) ? $_POST['counter'] : '';
            $mashup_counter = isset( $_POST['counter'] ) ? $_POST['counter'] : '';
            if ( isset( $_POST['action'] ) && ! isset( $_POST['shortcode_element_id'] ) ) {
                $MASHUP_POSTID = '';
                $shortcode_element_id = '';
            } else {
                $MASHUP_POSTID = isset( $_POST['POSTID'] ) ? $_POST['POSTID'] : '';
                $shortcode_element_id = isset( $_POST['shortcode_element_id'] ) ? $_POST['shortcode_element_id'] : '';
                $shortcode_str = stripslashes( $shortcode_element_id );
                $parseObject = new ShortcodeParse();
                $mashup_output = $parseObject->mashup_shortcodes( $mashup_output, $shortcode_str, true, $MASHUP_PREFIX );
            }
            $defaults = array(
                'mashup_var_column_section_title' => '',
                'mashup_column_margin_left' => '',
                'mashup_column_margin_right' => '',
                'mashup_var_column_top_padding' => '',
                'mashup_var_column_bottom_padding' => '',
                'mashup_var_column_left_padding' => '',
                'mashup_var_column_right_padding' => '',
                'mashup_var_column_image_url_array' => '',
                'mashup_var_column_bg_color' => '',
                'mashup_var_column_title_color' => '',
                'mashup_var_column_sub_title' => '',
                'column_align' => '',
            );
            if ( isset( $mashup_output['0']['atts'] ) ) {
                $atts = $mashup_output['0']['atts'];
            } else {
                $atts = array();
            }
            if ( isset( $mashup_output['0']['content'] ) ) {
                $mashup_var_column_text = $mashup_output['0']['content'];
            } else {
                $mashup_var_column_text = '';
            }
            $flex_column_element_size = '25';
            foreach ( $defaults as $key => $values ) {
                if ( isset( $atts[$key] ) ) {
                    $$key = $atts[$key];
                } else {
                    $$key = $values;
                }
            }
            $name = 'mashup_var_page_builder_flex_column';
            $coloumn_class = 'column_' . $flex_column_element_size;
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
            <div id="<?php echo esc_attr( $name . $mashup_counter ) ?>_del" class="column  parentdelete <?php echo esc_attr( $coloumn_class ); ?>
                 <?php echo esc_attr( $shortcode_view ); ?>" item="flex_column" data="<?php echo mashup_element_size_data_array_index( $flex_column_element_size ) ?>" >
                 <?php mashup_element_setting( $name, $mashup_counter, $flex_column_element_size ) ?>
                <div class="cs-wrapp-class-<?php echo intval( $mashup_counter ) ?>
                     <?php echo esc_attr( $shortcode_element ); ?>" id="<?php echo esc_attr( $name . $mashup_counter ) ?>" data-shortcode-template="[mashup_column {{attributes}}]{{content}}[/mashup_column]" style="display: none;">
                    <div class="cs-heading-area" data-counter="<?php echo esc_attr( $mashup_counter ) ?>">
                        <h5><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_column_edit_options' ) ); ?></h5>
                        <a href="javascript:mashup_frame_removeoverlay('<?php echo esc_js( $name . $mashup_counter ) ?>','<?php echo esc_js( $filter_element ); ?>')" class="cs-btnclose">
                            <i class="icon-cancel"></i>
                        </a>
                    </div>
                    <div class="cs-pbwp-content">
                        <div class="cs-wrapp-clone cs-shortcode-wrapp">
                            <?php
                            if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
                                mashup_shortcode_element_size();
                            }

                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt( 'mashup_var_column_field_title' ),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_column_field_title_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_var_column_section_title ),
                                    'cust_id' => 'mashup_var_column_section_title' . $mashup_counter,
                                    'classes' => '',
                                    'cust_name' => 'mashup_var_column_section_title[]',
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
                                        'std' => mashup_allow_special_char( $mashup_var_column_sub_title ),
                                        'id' => 'mashup_var_column_sub_title',
                                        'cust_name' => 'mashup_var_column_sub_title[]',
                                        'classes' => '',
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
                                        'std' => $column_align,
                                        'id' => '',
                                        'cust_id' => '',
                                        'cust_name' => 'column_align[]',
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
                                'name' => mashup_var_theme_text_srt( 'mashup_var_column_field_color_text' ),
                                'desc' => '',
                                'hint_text' => '',
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_var_column_title_color ),
                                    'cust_id' => 'mashup_var_column_title_color' . $mashup_counter,
                                    'classes' => 'bg_color',
                                    'cust_name' => 'mashup_var_column_title_color[]',
                                    'return' => true,
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt( 'mashup_var_column_field_text' ),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_column_field_text_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_var_column_text ),
                                    'cust_id' => 'mashup_var_column_text' . $mashup_counter,
                                    'classes' => '',
                                    'extra_atr' => ' data-content-text="cs-shortcode-textarea"',
                                    'cust_name' => 'mashup_var_column_text[]',
                                    'return' => true,
                                    'mashup_editor' => true,
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_textarea_field( $mashup_opt_array );

                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt( 'mashup_var_margin_left' ),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_margin_left_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_column_margin_left ),
                                    'cust_id' => 'mashup_column_margin_left' . $mashup_counter,
                                    'classes' => '',
                                    'cust_name' => 'mashup_column_margin_left[]',
                                    'return' => true,
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt( 'mashup_var_margin_right' ),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_margin_right_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_column_margin_right ),
                                    'cust_id' => 'mashup_column_margin_right' . $mashup_counter,
                                    'classes' => '',
                                    'cust_name' => 'mashup_column_margin_right[]',
                                    'return' => true,
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );


                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt( 'mashup_var_column_field_top_padding' ),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_column_field_top_padding_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_var_column_top_padding ),
                                    'cust_id' => 'mashup_var_column_top_padding' . $mashup_counter,
                                    'classes' => '',
                                    'cust_name' => 'mashup_var_column_top_padding[]',
                                    'return' => true,
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt( 'mashup_var_column_field_bottom_padding' ),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_column_field_bottom_padding_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_var_column_bottom_padding ),
                                    'cust_id' => 'mashup_var_column_bottom_padding' . $mashup_counter,
                                    'classes' => '',
                                    'cust_name' => 'mashup_var_column_bottom_padding[]',
                                    'return' => true,
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt( 'mashup_var_column_field_left_padding_text' ),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_column_field_left_padding_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_var_column_left_padding ),
                                    'cust_id' => 'mashup_var_column_left_padding' . $mashup_counter,
                                    'classes' => '',
                                    'cust_name' => 'mashup_var_column_left_padding[]',
                                    'return' => true,
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt( 'mashup_var_column_field_right_padding_text' ),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_column_field_right_padding_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_var_column_right_padding ),
                                    'cust_id' => 'mashup_var_column_right_padding' . $mashup_counter,
                                    'classes' => '',
                                    'cust_name' => 'mashup_var_column_right_padding[]',
                                    'return' => true,
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                            $mashup_opt_array = array(
                                'std' => esc_attr( $mashup_var_column_image_url_array ),
                                'id' => 'column_image_url',
                                'name' => mashup_var_theme_text_srt( 'mashup_var_column_field_image_text' ),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_column_field_image_hint' ),
                                'echo' => true,
                                'array' => true,
                                'prefix' => '',
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_var_column_image_url_array ),
                                    'id' => 'column_image_url',
                                    'return' => true,
                                    'array' => true,
                                    'array_txt' => false,
                                    'prefix' => '',
                                ),
                            );

                            $mashup_var_html_fields->mashup_var_upload_file_field( $mashup_opt_array );
                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt( 'mashup_var_column_field_background_color_text' ),
                                'desc' => '',
                                'hint_text' => '',
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_var_column_bg_color ),
                                    'cust_id' => 'mashup_var_column_bg_color' . $mashup_counter,
                                    'classes' => 'bg_color',
                                    'cust_name' => 'mashup_var_column_bg_color[]',
                                    'return' => true,
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                            ?>
                        </div>
                        <?php if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) { ?>
                            <ul class="form-elements insert-bg">
                                <li class="to-field">
                                    <a class="insert-btn cs-main-btn" onclick="javascript:mashup_shortcode_insert_editor('<?php echo str_replace( 'mashup_var_page_builder_', '', $name ); ?>', '<?php echo esc_js( $name . $mashup_counter ) ?>', '<?php echo esc_js( $filter_element ); ?>')" ><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_insert' ) ); ?></a>
                                </li>
                            </ul>
                            <div id="results-shortocde"></div>
                        <?php } else { ?>

                            <?php
                            $mashup_opt_array = array(
                                'std' => 'flex_column',
                                'id' => '',
                                'before' => '',
                                'after' => '',
                                'classes' => '',
                                'extra_atr' => '',
                                'cust_id' => 'mashup_orderby' . $mashup_counter,
                                'cust_name' => 'mashup_orderby[]',
                                'required' => false
                            );
                            $mashup_var_form_fields->mashup_var_form_hidden_render( $mashup_opt_array );

                            $mashup_opt_array = array(
                                'name' => '',
                                'desc' => '',
                                'hint_text' => '',
                                'echo' => true,
                                'field_params' => array(
                                    'std' => mashup_var_theme_text_srt( 'mashup_var_save' ),
                                    'cust_id' => 'flex_column_save' . $mashup_counter,
                                    'cust_type' => 'button',
                                    'classes' => 'cs-mashup-admin-btn',
                                    'cust_name' => 'flex_column_save',
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
        }
        if ( $die <> 1 ) {
            die();
        }
    }

    add_action( 'wp_ajax_mashup_var_page_builder_flex_column', 'mashup_var_page_builder_flex_column' );
}


if ( ! function_exists( 'mashup_save_page_builder_data_flex_column_callback' ) ) {

    /**
     * Save data for flex column shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_flex_column_callback( $args ) {

        $data = $args['data'];
        $counters = $args['counters'];
        $widget_type = $args['widget_type'];
        $column = $args['column'];
        if ( $widget_type == "flex_column" ) {
            $shortcode = '';
            $flex_column = $column->addChild( 'flex_column' );
            $flex_column->addChild( 'page_element_size', htmlspecialchars( $data['flex_column_element_size'][$counters['mashup_global_counter_column']] ) );
            $flex_column->addChild( 'flex_column_element_size', htmlspecialchars( $data['flex_column_element_size'][$counters['mashup_global_counter_column']] ) );
            if ( isset( $data['mashup_widget_element_num'][$counters['mashup_counter']] ) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode' ) {
                $shortcode_str = stripslashes( htmlspecialchars( ( $data['shortcode']['flex_column'][$counters['mashup_shortcode_counter_column']] ), ENT_QUOTES ) );
                $counters['mashup_shortcode_counter_column'] ++;
                $flex_column->addChild( 'mashup_shortcode', htmlspecialchars( $shortcode_str, ENT_QUOTES ) );
            } else {
                $shortcode = '[mashup_column ';
                if ( isset( $data['mashup_var_column_section_title'][$counters['mashup_counter_column']] ) && $data['mashup_var_column_section_title'][$counters['mashup_counter_column']] != '' ) {
                    $shortcode .= 'mashup_var_column_section_title="' . stripslashes( htmlspecialchars( ($data['mashup_var_column_section_title'][$counters['mashup_counter_column']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_column_sub_title'][$counters['mashup_counter_column']] ) && $data['mashup_var_column_sub_title'][$counters['mashup_counter_column']] != '' ) {
                    $shortcode .= 'mashup_var_column_sub_title="' . stripslashes( htmlspecialchars( ($data['mashup_var_column_sub_title'][$counters['mashup_counter_column']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['column_align'][$counters['mashup_counter_column']] ) && $data['column_align'][$counters['mashup_counter_column']] != '' ) {
                    $shortcode .= 'column_align="' . stripslashes( htmlspecialchars( ($data['column_align'][$counters['mashup_counter_column']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_column_margin_left'][$counters['mashup_counter_column']] ) && $data['mashup_column_margin_left'][$counters['mashup_counter_column']] != '' ) {
                    $shortcode .= 'mashup_column_margin_left="' . stripslashes( htmlspecialchars( ($data['mashup_column_margin_left'][$counters['mashup_counter_column']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_column_margin_right'][$counters['mashup_counter_column']] ) && $data['mashup_column_margin_right'][$counters['mashup_counter_column']] != '' ) {
                    $shortcode .= 'mashup_column_margin_right="' . stripslashes( htmlspecialchars( ($data['mashup_column_margin_right'][$counters['mashup_counter_column']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_column_top_padding'][$counters['mashup_counter_column']] ) && $data['mashup_var_column_top_padding'][$counters['mashup_counter_column']] != '' ) {
                    $shortcode .= 'mashup_var_column_top_padding="' . stripslashes( htmlspecialchars( ($data['mashup_var_column_top_padding'][$counters['mashup_counter_column']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_column_bottom_padding'][$counters['mashup_counter_column']] ) && $data['mashup_var_column_bottom_padding'][$counters['mashup_counter_column']] != '' ) {
                    $shortcode .= 'mashup_var_column_bottom_padding="' . stripslashes( htmlspecialchars( ($data['mashup_var_column_bottom_padding'][$counters['mashup_counter_column']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_column_left_padding'][$counters['mashup_counter_column']] ) && $data['mashup_var_column_left_padding'][$counters['mashup_counter_column']] != '' ) {
                    $shortcode .= 'mashup_var_column_left_padding="' . stripslashes( htmlspecialchars( ($data['mashup_var_column_left_padding'][$counters['mashup_counter_column']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_column_right_padding'][$counters['mashup_counter_column']] ) && $data['mashup_var_column_right_padding'][$counters['mashup_counter_column']] != '' ) {
                    $shortcode .= 'mashup_var_column_right_padding="' . stripslashes( htmlspecialchars( ($data['mashup_var_column_right_padding'][$counters['mashup_counter_column']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_column_image_url_array'][$counters['mashup_counter_column']] ) && $data['mashup_var_column_image_url_array'][$counters['mashup_counter_column']] != '' ) {
                    $shortcode .= 'mashup_var_column_image_url_array="' . htmlspecialchars( $data['mashup_var_column_image_url_array'][$counters['mashup_counter_column']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_column_title_color'][$counters['mashup_counter_column']] ) && $data['mashup_var_column_title_color'][$counters['mashup_counter_column']] != '' ) {
                    $shortcode .= 'mashup_var_column_title_color="' . htmlspecialchars( $data['mashup_var_column_title_color'][$counters['mashup_counter_column']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_column_bg_color'][$counters['mashup_counter_column']] ) && $data['mashup_var_column_bg_color'][$counters['mashup_counter_column']] != '' ) {
                    $shortcode .= 'mashup_var_column_bg_color="' . htmlspecialchars( $data['mashup_var_column_bg_color'][$counters['mashup_counter_column']], ENT_QUOTES ) . '" ';
                }
                $shortcode .= ']';
                if ( isset( $data['mashup_var_column_text'][$counters['mashup_counter_column']] ) && $data['mashup_var_column_text'][$counters['mashup_counter_column']] != '' ) {
                    $shortcode .= htmlspecialchars( $data['mashup_var_column_text'][$counters['mashup_counter_column']], ENT_QUOTES ) . ' ';
                }
                $shortcode .= '[/mashup_column]';
                $flex_column->addChild( 'mashup_shortcode', $shortcode );
                $counters['mashup_counter_column'] ++;
            }
            $counters['mashup_global_counter_column'] ++;
        }
        return array(
            'data' => $data,
            'counters' => $counters,
            'widget_type' => $widget_type,
            'column' => $column,
        );
    }

    add_filter( 'mashup_save_page_builder_data', 'mashup_save_page_builder_data_flex_column_callback' );
}

if ( ! function_exists( 'mashup_load_shortcode_counters_flex_column_callback' ) ) {

    /**
     * Populate flex column shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_flex_column_callback( $counters ) {
        $counters['mashup_global_counter_column'] = 0;
        $counters['mashup_shortcode_counter_column'] = 0;
        $counters['mashup_counter_column'] = 0;
        return $counters;
    }

    add_filter( 'mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_flex_column_callback' );
}

if ( ! function_exists( 'mashup_shortcode_names_list_populate_flex_column_callback' ) ) {

    /**
     * Populate flex column shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_flex_column_callback( $shortcode_array ) {
        $shortcode_array['flex_column'] = array(
            'title' => mashup_var_frame_text_srt( 'mashup_var_column' ),
            'name' => 'flex_column',
            'icon' => 'icon-columns',
            'categories' => 'typography',
        );
        return $shortcode_array;
    }

    add_filter( 'mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_flex_column_callback' );
}

if ( ! function_exists( 'mashup_element_list_populate_flex_column_callback' ) ) {

    /**
     * Populate flex column shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_flex_column_callback( $element_list ) {
        $element_list['flex_column'] = mashup_var_frame_text_srt( 'mashup_var_column' );
        return $element_list;
    }

    add_filter( 'mashup_element_list_populate', 'mashup_element_list_populate_flex_column_callback' );
}