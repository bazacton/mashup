<?php
/**
 * dropcaps html form for page builder
 */
if ( ! function_exists( 'mashup_var_page_builder_dropcap' ) ) {

    function mashup_var_page_builder_dropcap( $die = 0 ) {
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
            $MASHUP_PREFIX = 'mashup_dropcap';
            $parseObject = new ShortcodeParse();
            $output = $parseObject->mashup_shortcodes( $output, $shortcode_str, true, $MASHUP_PREFIX );
        }
        $defaults = array(
            'mashup_var_column_size' => '',
            'mashup_dropcap_section_title' => '',
            'mashup_var_dropcap_sub_title' => '',
            'mashup_var_dropcap_align' => '',
        );
        if ( isset( $output['0']['atts'] ) ) {
            $atts = $output['0']['atts'];
        } else {
            $atts = array();
        }

        if ( isset( $output['0']['content'] ) ) {
            $dropcaps_content = $output['0']['content'];
        } else {
            $dropcaps_content = '';
        }

        $dropcap_element_size = '100';
        foreach ( $defaults as $key => $values ) {
            if ( isset( $atts[$key] ) ) {
                $$key = $atts[$key];
            } else {
                $$key = $values;
            }
        }
        $name = 'mashup_var_page_builder_dropcap';
        $coloumn_class = 'column_' . $dropcap_element_size;
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
             <?php echo esc_attr( $shortcode_view ); ?>" item="dropcap" data="<?php echo mashup_element_size_data_array_index( $dropcap_element_size ) ?>" >
                 <?php mashup_element_setting( $name, $mashup_counter, $dropcap_element_size ) ?>
            <div class="cs-wrapp-class-<?php echo esc_attr( $mashup_counter ); ?> <?php echo esc_attr( $shortcode_element ); ?>" id="<?php echo esc_attr( $name . $mashup_counter ) ?>" data-shortcode-template="[mashup_dropcap {{attributes}}]{{content}}[/mashup_dropcap]" style="display: none;"">
                <div class="cs-heading-area">
                    <h5><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_dropcap_edit' ) ); ?></h5>
                    <a href="javascript:mashup_frame_removeoverlay('<?php echo esc_js( $name . $mashup_counter ) ?>','<?php echo esc_js( $filter_element ); ?>')" class="cs-btnclose"><i class="icon-cancel"></i></a> </div>
                <div class="cs-pbwp-content">
                    <div class="cs-wrapp-clone cs-shortcode-wrapp">

                        <?php
                        if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
                            mashup_shortcode_element_size();
                        }
                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_element_title' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_element_title_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => esc_html( $mashup_dropcap_section_title ),
                                'id' => 'mashup_dropcap_section_title',
                                'cust_name' => 'mashup_dropcap_section_title[]',
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
                                'std' => mashup_allow_special_char( $mashup_var_dropcap_sub_title ),
                                'id' => 'mashup_var_dropcap_sub_title',
                                'cust_name' => 'mashup_var_dropcap_sub_title[]',
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
                                'std' => $mashup_var_dropcap_align,
                                'id' => '',
                                'cust_id' => '',
                                'cust_name' => 'mashup_var_dropcap_align[]',
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
                            'name' => mashup_var_theme_text_srt( 'mashup_var_dropcaps_content_field_text' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_dropcaps_content_field_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => esc_attr( $dropcaps_content ),
                                'cust_id' => 'dropcaps_content',
                                'classes' => '',
                                'extra_atr' => ' data-content-text="cs-shortcode-textarea"',
                                'cust_name' => 'dropcaps_content[]',
                                'return' => true,
                                'mashup_editor' => true,
                            ),
                        );
                        $mashup_var_html_fields->mashup_var_textarea_field( $mashup_opt_array );
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
                            'std' => 'dropcap',
                            'id' => '',
                            'before' => '',
                            'after' => '',
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

    add_action( 'wp_ajax_mashup_var_page_builder_dropcap', 'mashup_var_page_builder_dropcap' );
}


if ( ! function_exists( 'mashup_save_page_builder_data_dropcap_callback' ) ) {

    /**
     * Save data for dropcap shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_dropcap_callback( $args ) {

        $data = $args['data'];
        $counters = $args['counters'];
        $widget_type = $args['widget_type'];
        $column = $args['column'];
        if ( $widget_type == "dropcap" ) {

            $shortcode = '';
            $dropcap = $column->addChild( 'dropcap' );
            $dropcap->addChild( 'page_element_size', htmlspecialchars( $data['dropcap_element_size'][$counters['mashup_global_counter_dropcap']] ) );
            $dropcap->addChild( 'dropcap_element_size', htmlspecialchars( $data['dropcap_element_size'][$counters['mashup_global_counter_dropcap']] ) );
            if ( isset( $data['mashup_widget_element_num'][$counters['mashup_counter']] ) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode' ) {
                $shortcode_str = stripslashes( htmlspecialchars( ( $data['shortcode']['dropcap'][$counters['mashup_shortcode_counter_dropcap']] ), ENT_QUOTES ) );
                $counters['mashup_shortcode_counter_dropcap'] ++;
                $dropcap->addChild( 'mashup_shortcode', htmlspecialchars( $shortcode_str, ENT_QUOTES ) );
            } else {
                $shortcode = '[mashup_dropcap ';
                if ( isset( $data['mashup_dropcap_section_title'][$counters['mashup_counter_dropcap']] ) && $data['mashup_dropcap_section_title'][$counters['mashup_counter_dropcap']] != '' ) {
                    $shortcode .= 'mashup_dropcap_section_title="' . stripslashes( htmlspecialchars( ($data['mashup_dropcap_section_title'][$counters['mashup_counter_dropcap']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_dropcap_sub_title'][$counters['mashup_counter_dropcap']] ) && $data['mashup_var_dropcap_sub_title'][$counters['mashup_counter_dropcap']] != '' ) {
                    $shortcode .= 'mashup_var_dropcap_sub_title="' . stripslashes( htmlspecialchars( ($data['mashup_var_dropcap_sub_title'][$counters['mashup_counter_dropcap']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_dropcap_align'][$counters['mashup_counter_dropcap']] ) && $data['mashup_var_dropcap_align'][$counters['mashup_counter_dropcap']] != '' ) {
                    $shortcode .= 'mashup_var_dropcap_align="' . stripslashes( htmlspecialchars( ($data['mashup_var_dropcap_align'][$counters['mashup_counter_dropcap']] ), ENT_QUOTES ) ) . '" ';
                }
                $shortcode .= ']';
                if ( isset( $data['dropcaps_content'][$counters['mashup_counter_dropcap']] ) && $data['dropcaps_content'][$counters['mashup_counter_dropcap']] != '' ) {
                    $shortcode .= htmlspecialchars( $data['dropcaps_content'][$counters['mashup_counter_dropcap']], ENT_QUOTES ) . ' ';
                }
                $shortcode .= '[/mashup_dropcap]';
                $dropcap->addChild( 'mashup_shortcode', $shortcode );
                $counters['mashup_counter_dropcap'] ++;
            }
            $counters['mashup_global_counter_dropcap'] ++;
        }
        return array(
            'data' => $data,
            'counters' => $counters,
            'widget_type' => $widget_type,
            'column' => $column,
        );
    }

    add_filter( 'mashup_save_page_builder_data', 'mashup_save_page_builder_data_dropcap_callback' );
}

if ( ! function_exists( 'mashup_load_shortcode_counters_dropcap_callback' ) ) {

    /**
     * Populate dropcap shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_dropcap_callback( $counters ) {
        $counters['mashup_counter_dropcap'] = 0;
        $counters['mashup_shortcode_counter_dropcap'] = 0;
        $counters['mashup_global_counter_dropcap'] = 0;
        return $counters;
    }

    add_filter( 'mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_dropcap_callback' );
}
if ( ! function_exists( 'mashup_shortcode_names_list_populate_dropcap_callback' ) ) {

    /**
     * Populate dropcap shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_dropcap_callback( $shortcode_array ) {
        $shortcode_array['dropcap'] = array(
            'title' => mashup_var_frame_text_srt( 'mashup_var_dropcap' ),
            'name' => 'dropcap',
            'icon' => 'icon-comments-o',
            'categories' => 'typography',
        );
        return $shortcode_array;
    }

    add_filter( 'mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_dropcap_callback' );
}

if ( ! function_exists( 'mashup_element_list_populate_dropcap_callback' ) ) {

    /**
     * Populate dropcap shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_dropcap_callback( $element_list ) {
        $element_list['dropcap'] = mashup_var_frame_text_srt( 'mashup_var_dropcap' );
        return $element_list;
    }

    add_filter( 'mashup_element_list_populate', 'mashup_element_list_populate_dropcap_callback' );
}