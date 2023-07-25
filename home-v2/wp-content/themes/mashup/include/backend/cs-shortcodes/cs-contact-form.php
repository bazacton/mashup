<?php
/*
 *
 * @File : Contact Us Short Code
 * @retrun
 *
 */

if ( ! function_exists( 'mashup_var_page_builder_contact_form' ) ) {

    function mashup_var_page_builder_contact_form( $die = 0 ) {
        global $post, $mashup_node, $mashup_var_html_fields, $mashup_var_form_fields, $mashup_var_static_text;

        if ( function_exists( 'mashup_shortcode_names' ) ) {

            $shortcode_element = '';
            $filter_element = 'filterdrag';
            $shortcode_view = '';
            $mashup_output = array();
            $MASHUP_PREFIX = 'mashup_contact_form';
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
                'mashup_var_contact_us_element_title' => '',
                'mashup_var_contact_us_element_send' => '',
                'mashup_var_contact_us_element_success' => '',
                'mashup_var_contact_us_element_error' => '',
                'mashup_var_contact_form_sub_title' => '',
                'mashup_var_contact_form_align' => '',
            );
            if ( isset( $mashup_output['0']['atts'] ) ) {
                $atts = $mashup_output['0']['atts'];
            } else {
                $atts = array();
            }
            if ( isset( $mashup_output['0']['content'] ) ) {
                $contact_us_text = $mashup_output['0']['content'];
            } else {
                $contact_us_text = '';
            }
            $contact_form_element_size = '25';
            foreach ( $defaults as $key => $values ) {
                if ( isset( $atts[$key] ) ) {
                    $$key = $atts[$key];
                } else {
                    $$key = $values;
                }
            }
            $name = 'mashup_var_page_builder_contact_form';
            $coloumn_class = 'column_' . $contact_form_element_size;
            if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
                $shortcode_element = 'shortcode_element_class';
                $shortcode_view = 'cs-pbwp-shortcode';
                $filter_element = 'ajax-drag';
                $coloumn_class = '';
            }
            $strings = new mashup_theme_all_strings;
            $strings->mashup_short_code_strings();
            ?>
            <div id="<?php echo esc_attr( $name . $mashup_counter ) ?>_del" class="column  parentdelete <?php echo esc_attr( $coloumn_class ); ?>
                 <?php echo esc_attr( $shortcode_view ); ?>" item="contact_form" data="<?php echo mashup_element_size_data_array_index( $contact_form_element_size ) ?>" >
                     <?php mashup_element_setting( $name, $mashup_counter, $contact_form_element_size ) ?>
                <div class="cs-wrapp-class-<?php echo intval( $mashup_counter ) ?>
                     <?php echo esc_attr( $shortcode_element ); ?>" id="<?php echo esc_attr( $name . $mashup_counter ) ?>" data-shortcode-template="[mashup_contact_form {{attributes}}]{{content}}[/mashup_contact_form]" style="display: none;">
                    <div class="cs-heading-area" data-counter="<?php echo esc_attr( $mashup_counter ) ?>">
                        <h5><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_edit_form' ) ); ?></h5>
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
                                'name' => mashup_var_theme_text_srt( 'mashup_var_element_title' ),
                                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_element_title_hint' ),
                                'desc' => '',
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_var_contact_us_element_title ),
                                    'cust_id' => 'mashup_var_contact_us_element_title' . $mashup_counter,
                                    'classes' => '',
                                    'cust_name' => 'mashup_var_contact_us_element_title[]',
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
                                    'std' => mashup_allow_special_char( $mashup_var_contact_form_sub_title ),
                                    'id' => 'mashup_var_contact_form_sub_title',
                                    'cust_name' => 'mashup_var_contact_form_sub_title[]',
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
                                    'std' => $mashup_var_contact_form_align,
                                    'id' => '',
                                    'cust_id' => '',
                                    'cust_name' => 'mashup_var_contact_form_align[]',
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
                                'name' => mashup_var_theme_text_srt( 'mashup_var_send_to' ),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_send_to_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_var_contact_us_element_send ),
                                    'cust_id' => 'mashup_var_contact_us_element_send' . $mashup_counter,
                                    'classes' => '',
                                    'cust_name' => 'mashup_var_contact_us_element_send[]',
                                    'return' => true,
                                ),
                            );

                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt( 'mashup_var_success_message' ),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_success_message_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_var_contact_us_element_success ),
                                    'cust_id' => 'mashup_var_contact_us_element_success' . $mashup_counter,
                                    'classes' => '',
                                    'cust_name' => 'mashup_var_contact_us_element_success[]',
                                    'return' => true,
                                ),
                            );

                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt( 'mashup_var_error_message' ),
                                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_error_message_hint' ),
                                'desc' => '',
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_var_contact_us_element_error ),
                                    'cust_id' => 'mashup_var_contact_us_element_error' . $mashup_counter,
                                    'classes' => '',
                                    'cust_name' => 'mashup_var_contact_us_element_error[]',
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
                                'std' => 'contact_form',
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
                                    'cust_id' => 'contact_form_save' . $mashup_counter,
                                    'cust_type' => 'button',
                                    'classes' => '',
                                    'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
                                    'cust_name' => 'contact_from_save',
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

    add_action( 'wp_ajax_mashup_var_page_builder_contact_form', 'mashup_var_page_builder_contact_form' );
}

if ( ! function_exists( 'mashup_save_page_builder_data_contact_form_callback' ) ) {

    /**
     * Save data for contact_form shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_contact_form_callback( $args ) {

        $data = $args['data'];
        $counters = $args['counters'];
        $widget_type = $args['widget_type'];
        $column = $args['column'];
        if ( $widget_type == "contact_form" ) {
            $shortcode = '';
            $contact_us = $column->addChild( 'contact_form' );
            $contact_us->addChild( 'page_element_size', htmlspecialchars( $data['contact_form_element_size'][$counters['mashup_global_counter_contact_us']] ) );
            $contact_us->addChild( 'contact_form_element_size', htmlspecialchars( $data['contact_form_element_size'][$counters['mashup_global_counter_contact_us']] ) );
            if ( isset( $data['mashup_widget_element_num'][$counters['mashup_counter']] ) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode' ) {
                $shortcode_str = stripslashes( htmlspecialchars( ( $data['shortcode']['contact_form'][$counters['mashup_shortcode_counter_contact_us']] ), ENT_QUOTES ) );
                $counters['mashup_shortcode_counter_contact_us'] ++;
                $contact_us->addChild( 'mashup_shortcode', htmlspecialchars( $shortcode_str, ENT_QUOTES ) );
            } else {
                $shortcode = '[mashup_contact_form ';
                if ( isset( $data['mashup_var_contact_us_element_title'][$counters['mashup_counter_contact_us']] ) && $data['mashup_var_contact_us_element_title'][$counters['mashup_counter_contact_us']] != '' ) {
                    $shortcode .= 'mashup_var_contact_us_element_title="' . stripslashes( htmlspecialchars( ($data['mashup_var_contact_us_element_title'][$counters['mashup_counter_contact_us']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_contact_form_sub_title'][$counters['mashup_counter_contact_us']] ) && $data['mashup_var_contact_form_sub_title'][$counters['mashup_counter_contact_us']] != '' ) {
                    $shortcode .= 'mashup_var_contact_form_sub_title="' . stripslashes( htmlspecialchars( ($data['mashup_var_contact_form_sub_title'][$counters['mashup_counter_contact_us']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_contact_form_align'][$counters['mashup_counter_contact_us']] ) && $data['mashup_var_contact_form_align'][$counters['mashup_counter_contact_us']] != '' ) {
                    $shortcode .= 'mashup_var_contact_form_align="' . stripslashes( htmlspecialchars( ($data['mashup_var_contact_form_align'][$counters['mashup_counter_contact_us']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_contact_us_element_send'][$counters['mashup_counter_contact_us']] ) && $data['mashup_var_contact_us_element_send'][$counters['mashup_counter_contact_us']] != '' ) {
                    $shortcode .= 'mashup_var_contact_us_element_send="' . htmlspecialchars( $data['mashup_var_contact_us_element_send'][$counters['mashup_counter_contact_us']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_contact_us_element_success'][$counters['mashup_counter_contact_us']] ) && $data['mashup_var_contact_us_element_success'][$counters['mashup_counter_contact_us']] != '' ) {
                    $shortcode .= 'mashup_var_contact_us_element_success="' . htmlspecialchars( $data['mashup_var_contact_us_element_success'][$counters['mashup_counter_contact_us']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_contact_us_element_error'][$counters['mashup_counter_contact_us']] ) && $data['mashup_var_contact_us_element_error'][$counters['mashup_counter_contact_us']] != '' ) {
                    $shortcode .= 'mashup_var_contact_us_element_error="' . htmlspecialchars( $data['mashup_var_contact_us_element_error'][$counters['mashup_counter_contact_us']], ENT_QUOTES ) . '" ';
                }
                $shortcode .= ']';
                $shortcode .= '[/mashup_contact_form]';
                $contact_us->addChild( 'mashup_shortcode', $shortcode );
                $counters['mashup_counter_contact_us'] ++;
            }
            $counters['mashup_global_counter_contact_us'] ++;
        }
        return array(
            'data' => $data,
            'counters' => $counters,
            'widget_type' => $widget_type,
            'column' => $column,
        );
    }

    add_filter( 'mashup_save_page_builder_data', 'mashup_save_page_builder_data_contact_form_callback' );
}

if ( ! function_exists( 'mashup_load_shortcode_counters_contact_form_callback' ) ) {

    /**
     * Populate contact_form shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_contact_form_callback( $counters ) {
        $counters['mashup_global_counter_contact_us'] = 0;
        $counters['mashup_shortcode_counter_contact_us'] = 0;
        $counters['mashup_counter_contact_us'] = 0;
        return $counters;
    }

    add_filter( 'mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_contact_form_callback' );
}

if ( ! function_exists( 'mashup_shortcode_names_list_populate_contact_form_callback' ) ) {

    /**
     * Populate contact form shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_contact_form_callback( $shortcode_array ) {
        $shortcode_array['contact_form'] = array(
            'title' => mashup_var_frame_text_srt( 'mashup_var_contact_form' ),
            'name' => 'contact_form',
            'icon' => 'icon-building-o',
            'categories' => 'typography',
        );
        return $shortcode_array;
    }

    add_filter( 'mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_contact_form_callback' );
}

if ( ! function_exists( 'mashup_element_list_populate_contact_form_callback' ) ) {

    /**
     * Populate contact form shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_contact_form_callback( $element_list ) {
        $element_list['contact_form'] = mashup_var_frame_text_srt( 'mashup_var_contact_form' );
        return $element_list;
    }

    add_filter( 'mashup_element_list_populate', 'mashup_element_list_populate_contact_form_callback' );
}