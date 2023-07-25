<?php
/*
 *
 * @File : Image Frame 
 * @retrun
 *
 */

if ( ! function_exists( 'mashup_var_page_builder_mail_chimp' ) ) {

    function mashup_var_page_builder_mail_chimp( $die = 0 ) {
        global $post, $mashup_node, $mashup_var_html_fields, $coloumn_class, $mashup_var_form_fields, $mashup_var_static_text;

        if ( function_exists( 'mashup_shortcode_names' ) ) {
            $shortcode_element = '';
            $filter_element = 'filterdrag';
            $shortcode_view = '';
            $mashup_output = array();
            $MASHUP_PREFIX = 'mashup_mail_chimp';

            $mashup_counter = isset( $_POST['mashup_counter'] ) ? $_POST['mashup_counter'] : '';
            $mashup_counter = ($mashup_counter == '') ? $_POST['counter'] : $mashup_counter;

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
                'mashup_var_column' => '',
                'mashup_var_mail_section_title' => '',
                'mashup_var_mail_sub_title' => '',
            );
            if ( isset( $mashup_output['0']['atts'] ) ) {
                $atts = $mashup_output['0']['atts'];
            } else {
                $atts = array();
            }
            if ( isset( $mashup_output['0']['content'] ) ) {
                $mashup_var_mail_description = $mashup_output['0']['content'];
            } else {
                $mashup_var_mail_description = '';
            }
            $mail_chimp_element_size = '25';
            foreach ( $defaults as $key => $values ) {
                if ( isset( $atts[$key] ) ) {
                    $$key = $atts[$key];
                } else {
                    $$key = $values;
                }
            }
            $name = 'mashup_var_page_builder_mail_chimp';
            $coloumn_class = 'column_' . $mail_chimp_element_size;
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
                 <?php echo esc_attr( $shortcode_view ); ?>" item="mail_chimp" data="<?php echo mashup_element_size_data_array_index( $mail_chimp_element_size ) ?>" >
                     <?php mashup_element_setting( $name, $mashup_counter, $mail_chimp_element_size ) ?>
                <div class="cs-wrapp-class-<?php echo intval( $mashup_counter ) ?>
                     <?php echo esc_attr( $shortcode_element ); ?>" id="<?php echo esc_attr( $name . $mashup_counter ) ?>" data-shortcode-template="[mashup_mail_chimp {{attributes}}]{{content}}[/mashup_mail_chimp]" style="display: none;">
                    <div class="cs-heading-area" data-counter="<?php echo esc_attr( $mashup_counter ) ?>">
                        <h5><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_mailchimp_edit_options' ) ); ?></h5>
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
                                'name' => mashup_var_theme_text_srt( 'mashup_var_mail_title' ),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_mail_title_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_var_mail_section_title ),
                                    'cust_id' => 'mashup_var_mail_section_title' . $mashup_counter,
                                    'classes' => '',
                                    'cust_name' => 'mashup_var_mail_section_title[]',
                                    'return' => true,
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt( 'mashup_var_mail_description' ),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_mail_description_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_textarea( $mashup_var_mail_description ),
                                    'cust_id' => 'mashup_var_mail_description' . $mashup_counter,
                                    'classes' => 'textarea',
                                    'cust_name' => 'mashup_var_mail_description[]',
                                    'return' => true,
                                    'mashup_editor' => true,
                                    'extra_atr' => 'data-content-text="cs-shortcode-textarea"',
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_textarea_field( $mashup_opt_array );
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
                                'std' => 'mail_chimp',
                                'id' => '',
                                'before' => '',
                                'after' => '',
                                'classes' => '',
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
                                    'cust_id' => 'mail_chimp_save',
                                    'cust_type' => 'button',
                                    'classes' => 'cs-mashup-admin-btn',
                                    'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
                                    'cust_name' => 'mail_chimp_save' . $mashup_counter,
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

    add_action( 'wp_ajax_mashup_var_page_builder_mail_chimp', 'mashup_var_page_builder_mail_chimp' );
}

if ( ! function_exists( 'mashup_save_page_builder_data_mail_chimp_callback' ) ) {

    /**
     * Save data for image frame shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_mail_chimp_callback( $args ) {

        $data = $args['data'];
        $counters = $args['counters'];
        $widget_type = $args['widget_type'];
        $column = $args['column'];
        if ( $widget_type == "mail_chimp" ) {
            $mashup_var_mail_chimp = '';
            $mail_chimp = $column->addChild( 'mail_chimp' );
            $mail_chimp->addChild( 'page_element_size', htmlspecialchars( $data['mail_chimp_element_size'][$counters['mashup_global_counter_mail_chimp']] ) );
            $mail_chimp->addChild( 'mail_chimp_element_size', htmlspecialchars( $data['mail_chimp_element_size'][$counters['mashup_global_counter_mail_chimp']] ) );
            if ( isset( $data['mashup_widget_element_num'][$counters['mashup_counter']] ) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode' ) {
                $shortcode_str = stripslashes( htmlspecialchars( ( $data['shortcode']['mail_chimp'][$counters['mashup_shortcode_counter_mail_chimp']] ), ENT_QUOTES ) );
                $counters['mashup_shortcode_counter_mail_chimp'] ++;
                $mail_chimp->addChild( 'mashup_shortcode', htmlspecialchars( $shortcode_str, ENT_QUOTES ) );
            } else {
                $mashup_var_mail_chimp = '[mashup_mail_chimp ';
                if ( isset( $data['mashup_var_mail_section_title'][$counters['mashup_counter_mail_chimp']] ) && $data['mashup_var_mail_section_title'][$counters['mashup_counter_mail_chimp']] != '' ) {
                    $mashup_var_mail_chimp .= 'mashup_var_mail_section_title="' . htmlspecialchars( $data['mashup_var_mail_section_title'][$counters['mashup_counter_mail_chimp']], ENT_QUOTES ) . '" ';
                }
                $mashup_var_mail_chimp .= ']';
                if ( isset( $data['mashup_var_mail_description'][$counters['mashup_counter_mail_chimp']] ) && $data['mashup_var_mail_description'][$counters['mashup_counter_mail_chimp']] != '' ) {
                    $mashup_var_mail_chimp .= htmlspecialchars( $data['mashup_var_mail_description'][$counters['mashup_counter_mail_chimp']], ENT_QUOTES ) . ' ';
                }
                $mashup_var_mail_chimp .= '[/mashup_mail_chimp]';
				$mail_chimp->addChild( 'mashup_shortcode', $mashup_var_mail_chimp );
                $counters['mashup_counter_mail_chimp'] ++;
            }
            $counters['mashup_global_counter_mail_chimp'] ++;
        }
        return array(
            'data' => $data,
            'counters' => $counters,
            'widget_type' => $widget_type,
            'column' => $column,
        );
    }

    add_filter( 'mashup_save_page_builder_data', 'mashup_save_page_builder_data_mail_chimp_callback' );
}

if ( ! function_exists( 'mashup_load_shortcode_counters_mail_chimp_callback' ) ) {

    /**
     * Populate image frame shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_mail_chimp_callback( $counters ) {
        $counters['mashup_global_counter_mail_chimp'] = 0;
        $counters['mashup_shortcode_counter_mail_chimp'] = 0;
        $counters['mashup_counter_mail_chimp'] = 0;
        return $counters;
    }

    add_filter( 'mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_mail_chimp_callback' );
}
if ( ! function_exists( 'mashup_shortcode_names_list_populate_mail_chimp_callback' ) ) {

    /**
     * Populate image frame shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_mail_chimp_callback( $shortcode_array ) {
        $strings = new mashup_theme_all_strings;
        $strings->mashup_short_code_strings();
        $shortcode_array['mail_chimp'] = array(
            'title' => mashup_var_theme_text_srt( 'mashup_var_mail_chimp' ),
            'name' => 'mail_chimp',
            'icon' => 'icon-photo',
            'categories' => 'typography',
        );
        return $shortcode_array;
    }

    add_filter( 'mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_mail_chimp_callback' );
}

if ( ! function_exists( 'mashup_element_list_populate_mail_chimp_callback' ) ) {

    /**
     * Populate image frame shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_mail_chimp_callback( $element_list ) {
        $strings = new mashup_theme_all_strings;
        $strings->mashup_short_code_strings();
        $element_list['mail_chimp'] = mashup_var_theme_text_srt( 'mashup_var_mail_chimp' );
        return $element_list;
    }

    add_filter( 'mashup_element_list_populate', 'mashup_element_list_populate_mail_chimp_callback' );
}