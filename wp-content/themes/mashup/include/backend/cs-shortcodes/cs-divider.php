<?php
/**
 * @Divider html form for page builder
 */
if ( ! function_exists( 'mashup_var_page_builder_divider' ) ) {

    function mashup_var_page_builder_divider( $die = 0 ) {
        global $mashup_node, $count_node, $post, $mashup_var_html_fields, $mashup_var_form_fields;
        $shortcode_element = '';
        $filter_element = 'filterdrag';
        $shortcode_view = '';
        $output = array();
        $mashup_counter = $_POST['counter'];
        if ( isset( $_POST['action'] ) && ! isset( $_POST['shortcode_element_id'] ) ) {
            $POSTID = '';
            $shortcode_element_id = '';
        } else {
            $POSTID = $_POST['POSTID'];
            $shortcode_element_id = $_POST['shortcode_element_id'];
            $shortcode_str = stripslashes( $shortcode_element_id );
            $MASHUP_PREFIX = 'mashup_divider';
            $parseObject = new ShortcodeParse();
            $output = $parseObject->mashup_shortcodes( $output, $shortcode_str, true, $MASHUP_PREFIX );
        }
        $defaults = array(
            'mashup_var_divider_padding_left' => '0',
            'mashup_var_divider_padding_right' => '0',
            'mashup_var_divider_margin_top' => '0',
            'mashup_var_divider_margin_buttom' => '0',
            'mashup_var_divider_align' => '',
        );
        if ( isset( $output['0']['atts'] ) ) {
            $atts = $output['0']['atts'];
        } else {
            $atts = array();
        }
        $divider_element_size = '100';
        foreach ( $defaults as $key => $values ) {
            if ( isset( $atts[$key] ) ) {
                $$key = $atts[$key];
            } else {
                $$key = $values;
            }
        }
        $name = 'mashup_var_page_builder_divider';
        $coloumn_class = 'column_' . $divider_element_size;
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
             <?php echo esc_attr( $shortcode_view ); ?>" item="divider" data="<?php echo mashup_element_size_data_array_index( $divider_element_size ) ?>" >
                 <?php mashup_element_setting( $name, $mashup_counter, $divider_element_size ) ?>
            <div class="cs-wrapp-class-<?php echo esc_attr( $mashup_counter ); ?> <?php echo esc_attr( $shortcode_element ); ?>" id="<?php echo esc_attr( $name . $mashup_counter ) ?>" data-shortcode-template="[mashup_divider {{attributes}}]{{content}}[/mashup_divider]" style="display: none;"">
                <div class="cs-heading-area">
                    <h5><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_divider_edit' ) ); ?></h5>
                    <a href="javascript:mashup_frame_removeoverlay('<?php echo esc_js( $name . $mashup_counter ) ?>','<?php echo esc_js( $filter_element ); ?>')" class="cs-btnclose"><i class="icon-cancel"></i></a> </div>
                <div class="cs-pbwp-content">
                    <div class="cs-wrapp-clone cs-shortcode-wrapp">

                        <?php
                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_divider_field_left_padding' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_divider_field_left_padding_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => esc_html( $mashup_var_divider_padding_left ),
                                'id' => 'divider_height',
                                'cust_name' => 'mashup_var_divider_padding_left[]',
                                'return' => true,
                                'cs-range-input' => 'cs-range-input',
                            ),
                        );

                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_divider_field_right_padding' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_divider_field_right_padding_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => esc_html( $mashup_var_divider_padding_right ),
                                'id' => 'divider_height',
                                'cust_name' => 'mashup_var_divider_padding_right[]',
                                'return' => true,
                                'cs-range-input' => 'cs-range-input',
                            ),
                        );

                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_divider_field_top_margin' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_divider_field_top_margin_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => esc_html( $mashup_var_divider_margin_top ),
                                'id' => 'divider_height',
                                'cust_name' => 'mashup_var_divider_margin_top[]',
                                'return' => true,
                                'cs-range-input' => 'cs-range-input',
                            ),
                        );

                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_divider_field_bottom_margin' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_divider_field_bottom_margin_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => esc_html( $mashup_var_divider_margin_buttom ),
                                'id' => 'divider_height',
                                'cust_name' => 'mashup_var_divider_margin_buttom[]',
                                'return' => true,
                                'cs-range-input' => 'cs-range-input',
                            ),
                        );
                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_divider_field_align' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_divider_field_align_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => $mashup_var_divider_align,
                                'id' => '',
                                'cust_name' => 'mashup_var_divider_align[]',
                                'classes' => 'dropdown chosen-select',
                                'options' => array(
                                    'center' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_center' ),
                                    'left' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_left' ),
                                    'right' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_right' ),
                                ),
                                'return' => true,
                            ),
                        );
                        $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
                        ?>

                    </div>
                    <?php if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) { ?>
                        <ul class="form-elements insert-bg">
                            <li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:mashup_shortcode_insert_editor('<?php echo esc_js( str_replace( 'mashup_var_page_builder_', '', $name ) ); ?>', '<?php echo esc_js( $name . $mashup_counter ); ?>', '<?php echo esc_js( $filter_element ); ?>')" ><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_insert' ) ); ?></a> </li>
                        </ul>
                        <div id="results-shortocde"></div>
                    <?php } else { ?>
                        <?php
                        $mashup_opt_array = array(
                            'std' => 'divider',
                            'id' => '',
                            'before' => '',
                            'after' => '',
                            'classes' => '',
                            'extra_atr' => '',
                            'cust_id' => '',
                            'cust_name' => 'mashup_orderby[]',
                            'return' => false,
                            'required' => false
                        );
                        $mashup_var_html_fields->mashup_var_form_hidden_render( $mashup_opt_array );

                        $mashup_opt_array = array(
                            'name' => '',
                            'desc' => '',
                            'hint_text' => '',
                            'echo' => true,
                            'field_params' => array(
                                'std' => mashup_var_theme_text_srt( 'mashup_var_save' ),
                                'cust_id' => '',
                                'cust_type' => 'button',
                                'classes' => 'cs-mashup-admin-btn',
                                'cust_name' => '',
                                'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
                                'return' => true,
                            ),
                        );

                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                        ?>   
                    <?php } ?>
                </div>
            </div>
        </div>
        
        <?php
        if ( $die <> 1 ) {
            die();
        }
    }

    add_action( 'wp_ajax_mashup_var_page_builder_divider', 'mashup_var_page_builder_divider' );
}


if ( ! function_exists( 'mashup_save_page_builder_data_divider_callback' ) ) {

    /**
     * Save data for divider shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_divider_callback( $args ) {
        $data = $args['data'];
        $counters = $args['counters'];
        $widget_type = $args['widget_type'];
        $column = $args['column'];
        if ( $widget_type == "divider" ) {
            $shortcode = '';
            $divider = $column->addChild( 'divider' );
            $divider->addChild( 'page_element_size', htmlspecialchars( $data['divider_element_size'][$counters['mashup_global_counter_divider']] ) );
            $divider->addChild( 'divider_element_size', htmlspecialchars( $data['divider_element_size'][$counters['mashup_global_counter_divider']] ) );
            if ( isset( $data['mashup_widget_element_num'][$counters['mashup_counter']] ) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode' ) {
                $shortcode_str = stripslashes( htmlspecialchars( ( $data['shortcode']['divider'][$counters['mashup_shortcode_counter_divider']] ), ENT_QUOTES ) );
                $counters['mashup_shortcode_counter_divider'] ++;
                $divider->addChild( 'mashup_shortcode', htmlspecialchars( $shortcode_str, ENT_QUOTES ) );
            } else {
                $shortcode = '[mashup_divider ';
                if ( isset( $data['mashup_var_divider_padding_left'][$counters['mashup_counter_divider']] ) && $data['mashup_var_divider_padding_left'][$counters['mashup_counter_divider']] != '' ) {
                    $shortcode .= 'mashup_var_divider_padding_left="' . stripslashes( htmlspecialchars( ($data['mashup_var_divider_padding_left'][$counters['mashup_counter_divider']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_divider_padding_right'][$counters['mashup_counter_divider']] ) && $data['mashup_var_divider_padding_right'][$counters['mashup_counter_divider']] != '' ) {
                    $shortcode .= 'mashup_var_divider_padding_right="' . stripslashes( htmlspecialchars( ($data['mashup_var_divider_padding_right'][$counters['mashup_counter_divider']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_divider_margin_top'][$counters['mashup_counter_divider']] ) && $data['mashup_var_divider_margin_top'][$counters['mashup_counter_divider']] != '' ) {
                    $shortcode .= 'mashup_var_divider_margin_top="' . stripslashes( htmlspecialchars( ($data['mashup_var_divider_margin_top'][$counters['mashup_counter_divider']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_divider_margin_buttom'][$counters['mashup_counter_divider']] ) && $data['mashup_var_divider_margin_buttom'][$counters['mashup_counter_divider']] != '' ) {
                    $shortcode .= 'mashup_var_divider_margin_buttom="' . stripslashes( htmlspecialchars( ($data['mashup_var_divider_margin_buttom'][$counters['mashup_counter_divider']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_divider_align'][$counters['mashup_counter_divider']] ) && $data['mashup_var_divider_align'][$counters['mashup_counter_divider']] != '' ) {
                    $shortcode .= 'mashup_var_divider_align="' . stripslashes( htmlspecialchars( ($data['mashup_var_divider_align'][$counters['mashup_counter_divider']] ), ENT_QUOTES ) ) . '" ';
                }
				$shortcode .= ']';
                $shortcode .= '[/mashup_divider]';
                $divider->addChild( 'mashup_shortcode', $shortcode );

                $counters['mashup_counter_divider'] ++;
            }
            $counters['mashup_global_counter_divider'] ++;
        }
        return array(
            'data' => $data,
            'counters' => $counters,
            'widget_type' => $widget_type,
            'column' => $column,
        );
    }

    add_filter( 'mashup_save_page_builder_data', 'mashup_save_page_builder_data_divider_callback' );
}

if ( ! function_exists( 'mashup_load_shortcode_counters_divider_callback' ) ) {

    /**
     * Populate divider shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_divider_callback( $counters ) {
        $counters['mashup_counter_divider'] = 0;
        $counters['mashup_shortcode_counter_divider'] = 0;
        $counters['mashup_global_counter_divider'] = 0;
        return $counters;
    }

    add_filter( 'mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_divider_callback' );
}
if ( ! function_exists( 'mashup_shortcode_names_list_populate_divider_callback' ) ) {

    /**
     * Populate divider shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_divider_callback( $shortcode_array ) {
        $shortcode_array['divider'] = array(
            'title' => mashup_var_frame_text_srt( 'mashup_var_divider' ),
            'name' => 'divider',
            'icon' => 'icon-ellipsis-h',
            'categories' => 'typography',
        );
        return $shortcode_array;
    }

    add_filter( 'mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_divider_callback' );
}

if ( ! function_exists( 'mashup_element_list_populate_divider_callback' ) ) {

    /**
     * Populate divider shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_divider_callback( $element_list ) {
        $element_list['divider'] = mashup_var_frame_text_srt( 'mashup_var_divider' );
        return $element_list;
    }
    add_filter( 'mashup_element_list_populate', 'mashup_element_list_populate_divider_callback' );
}