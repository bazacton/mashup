<?php
/*
 *
 * @File : Flex column
 * @retrun
 *
 */

if ( ! function_exists( 'mashup_var_page_builder_editor' ) ) {

    function mashup_var_page_builder_editor( $die = 0 ) {
        global $mashup_node, $post, $mashup_var_html_fields, $mashup_var_form_fields, $mashup_var_static_text;
        $shortcode_element = '';
        $filter_element = 'filterdrag';
        $shortcode_view = '';
        $output = array();
        $PREFIX = 'mashup_editor';
        $counter = $_POST['counter'];
        $mashup_counter = $_POST['counter'];
        if ( isset( $_POST['action'] ) && ! isset( $_POST['shortcode_element_id'] ) ) {
            $POSTID = '';
            $shortcode_element_id = '';
        } else {
            $POSTID = $_POST['POSTID'];
            $shortcode_element_id = $_POST['shortcode_element_id'];
            $shortcode_str = stripslashes( $shortcode_element_id );
            $parseObject = new ShortcodeParse();
            $output = $parseObject->mashup_shortcodes( $output, $shortcode_str, true, $PREFIX );
        }
        $defaults = array(
            'mashup_var_column_size' => '',
            'mashup_var_editor_title' => '',
            'mashup_var_editor_sub_title' => '',
            'mashup_var_editor_align' => '',
        );
        if ( isset( $output['0']['atts'] ) ) {
            $atts = $output['0']['atts'];
        } else {
            $atts = array();
        }
        if ( isset( $output['0']['content'] ) ) {
            $mashup_var_editor_content = $output['0']['content'];
        } else {
            $mashup_var_editor_content = '';
        }
        $editor_element_size = '25';
        foreach ( $defaults as $key => $values ) {
            if ( isset( $atts[$key] ) )
                $$key = $atts[$key];
            else
                $$key = $values;
        }
        $name = 'mashup_var_page_builder_editor';
        $coloumn_class = 'column_' . $editor_element_size;
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
             <?php echo esc_attr( $shortcode_view ); ?>" item="editor" data="<?php echo mashup_element_size_data_array_index( $editor_element_size ) ?>" >
                 <?php mashup_element_setting( $name, $mashup_counter, $editor_element_size, '', 'columns', $type = '' ); ?>
            <div class="cs-wrapp-class-<?php echo intval( $mashup_counter ) ?>
                 <?php echo esc_attr( $shortcode_element ); ?>" id="<?php echo esc_attr( $name . $mashup_counter ) ?>" data-shortcode-template="[mashup_editor {{attributes}}]{{content}}[/mashup_editor]" style="display: none;">
                <div class="cs-heading-area">
                    <h5><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_editor_options' ) ); ?></h5>
                    <a href="javascript:mashup_frame_removeoverlay('<?php echo esc_js( $name . $mashup_counter ) ?>','<?php echo esc_js( $filter_element ); ?>')"
                       class="cs-btnclose"><i class="icon-cancel"></i>
                    </a>
                </div>
                <div class="cs-pbwp-content">
                    <div class="cs-wrapp-clone cs-shortcode-wrapp">
                        <?php
                        if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
                            mashup_shortcode_element_size();
                        }
                        ?>
                        <?php
                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_element_title' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_element_title_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => mashup_allow_special_char( $mashup_var_editor_title ),
                                'cust_id' => '',
                                'classes' => 'txtfield',
                                'cust_name' => 'mashup_var_editor_title[]',
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
                                'std' => mashup_allow_special_char( $mashup_var_editor_sub_title ),
                                'id' => 'mashup_var_editor_sub_title',
                                'cust_name' => 'mashup_var_editor_sub_title[]',
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
                                'std' => $mashup_var_editor_align,
                                'id' => '',
                                'cust_id' => '',
                                'cust_name' => 'mashup_var_editor_align[]',
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
                        ?>

                        <?php
                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_short_text' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_short_text_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => esc_textarea( $mashup_var_editor_content ),
                                'cust_id' => '',
                                'classes' => 'textarea',
                                'cust_name' => 'mashup_var_editor_content[]',
                                'mashup_editor' => true,
                                'return' => true,
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
                            'std' => 'editor',
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
                        echo mashup_allow_special_char( $mashup_var_form_fields->mashup_var_form_hidden_render( $mashup_opt_array ) );
                        ?>
                        <?php
                        $mashup_opt_array = array(
                            'name' => '',
                            'desc' => '',
                            'hint_text' => '',
                            'echo' => true,
                            'field_params' => array(
                                'std' => mashup_var_theme_text_srt( 'mashup_var_save' ),
                                'cust_id' => '',
                                'cust_type' => 'button',
                                'classes' => 'cs-admin-btn',
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

    add_action( 'wp_ajax_mashup_var_page_builder_editor', 'mashup_var_page_builder_editor' );
}

if ( ! function_exists( 'mashup_save_page_builder_data_editor_callback' ) ) {

    /**
     * Save data for editor shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_editor_callback( $args ) {

        $data = $args['data'];
        $counters = $args['counters'];
        $widget_type = $args['widget_type'];
        $column = $args['column'];
        if ( $widget_type == "editor" ) {
            $shortcode = '';
            $editor = $column->addChild( 'editor' );
            $editor->addChild( 'page_element_size', htmlspecialchars( $data['editor_element_size'][$counters['mashup_global_counter_editor']] ) );
            $editor->addChild( 'editor_element_size', htmlspecialchars( $data['editor_element_size'][$counters['mashup_global_counter_editor']] ) );
            if ( isset( $data['mashup_widget_element_num'][$counters['mashup_counter']] ) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode' ) {
                $shortcode_str = stripslashes( htmlspecialchars( ( $data['shortcode']['editor'][$counters['mashup_shortcode_counter_editor']] ), ENT_QUOTES ) );
                $counters['mashup_shortcode_counter_editor'] ++;
                $editor->addChild( 'mashup_shortcode', htmlspecialchars( $shortcode_str, ENT_QUOTES ) );
            } else {
                $shortcode = '[mashup_editor ';
                if ( isset( $data['mashup_var_editor_title'][$counters['mashup_counter_editor']] ) && $data['mashup_var_editor_title'][$counters['mashup_counter_editor']] != '' ) {
                    $shortcode .= 'mashup_var_editor_title="' . stripslashes( htmlspecialchars( ($data['mashup_var_editor_title'][$counters['mashup_counter_editor']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_editor_sub_title'][$counters['mashup_counter_editor']] ) && $data['mashup_var_editor_sub_title'][$counters['mashup_counter_editor']] != '' ) {
                    $shortcode .= 'mashup_var_editor_sub_title="' . stripslashes( htmlspecialchars( ($data['mashup_var_editor_sub_title'][$counters['mashup_counter_editor']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_editor_align'][$counters['mashup_counter_editor']] ) && $data['mashup_var_editor_align'][$counters['mashup_counter_editor']] != '' ) {
                    $shortcode .= 'mashup_var_editor_align="' . stripslashes( htmlspecialchars( ($data['mashup_var_editor_align'][$counters['mashup_counter_editor']] ), ENT_QUOTES ) ) . '" ';
                }
                $shortcode .= ']';
                if ( isset( $data['mashup_var_editor_content'][$counters['mashup_counter_editor']] ) && $data['mashup_var_editor_content'][$counters['mashup_counter_editor']] != '' ) {
                    $shortcode .= htmlspecialchars( $data['mashup_var_editor_content'][$counters['mashup_counter_editor']], ENT_QUOTES ) . ' ';
                }
                $shortcode .= '[/mashup_editor]';
                $editor->addChild( 'mashup_shortcode', $shortcode );
                $counters['mashup_counter_editor'] ++;
            }
            $counters['mashup_global_counter_editor'] ++;
        }
        return array(
            'data' => $data,
            'counters' => $counters,
            'widget_type' => $widget_type,
            'column' => $column,
        );
    }

    add_filter( 'mashup_save_page_builder_data', 'mashup_save_page_builder_data_editor_callback' );
}

if ( ! function_exists( 'mashup_load_shortcode_counters_editor_callback' ) ) {

    /**
     * Populate editor shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_editor_callback( $counters ) {
        $counters['mashup_counter_editor'] = 0;
        $counters['mashup_shortcode_counter_editor'] = 0;
        $counters['mashup_global_counter_editor'] = 0;
        return $counters;
    }

    add_filter( 'mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_editor_callback' );
}
if ( ! function_exists( 'mashup_shortcode_names_list_populate_editor_callback' ) ) {

    /**
     * Populate editor shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_editor_callback( $shortcode_array ) {
        $shortcode_array['editor'] = array(
            'title' => mashup_var_frame_text_srt( 'mashup_var_editor' ),
            'name' => 'editor',
            'icon' => 'icon-clock-o',
            'categories' => 'typography',
        );
        return $shortcode_array;
    }

    add_filter( 'mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_editor_callback' );
}

if ( ! function_exists( 'mashup_element_list_populate_editor_callback' ) ) {

    /**
     * Populate editor shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_editor_callback( $element_list ) {
        $element_list['editor'] = mashup_var_frame_text_srt( 'mashup_var_editor' );
        return $element_list;
    }

    add_filter( 'mashup_element_list_populate', 'mashup_element_list_populate_editor_callback' );
}