<?php
/*
 *
 * @File : Button
 * @retrun
 *
 */
if ( ! function_exists( 'mashup_var_page_builder_button' ) ) {

    function mashup_var_page_builder_button( $die = 0 ) {
        global $post, $mashup_node, $mashup_var_html_fields, $mashup_var_form_fields, $mashup_var_static_text;

        if ( function_exists( 'mashup_shortcode_names' ) ) {
            $shortcode_element = '';
            $filter_element = 'filterdrag';
            $shortcode_view = '';
            $mashup_output = array();
            $MASHUP_PREFIX = 'mashup_button';

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
                'mashup_var_column' => '1',
                'mashup_var_button_text' => '',
                'mashup_var_button_link' => '',
                'mashup_var_button_border' => '',
                'mashup_var_button_icon_position' => '',
                'mashup_var_button_type' => '',
                'mashup_var_button_target' => '',
                'mashup_var_button_border_color' => '',
                'mashup_var_button_color' => '',
                'mashup_var_button_bg_color' => '',
                'mashup_var_button_padding_top' => '',
                'mashup_var_button_padding_bottom' => '',
                'mashup_var_button_padding_left' => '',
                'mashup_var_button_padding_right' => '',
                'mashup_var_button_align' => '',
                'mashup_button_icon' => '',
                'mashup_var_button_size' => '',
                'mashup_var_icon_view' => ''
            );
            if ( isset( $mashup_output['0']['atts'] ) ) {
                $atts = $mashup_output['0']['atts'];
            } else {
                $atts = array();
            }
            if ( isset( $mashup_output['0']['content'] ) ) {
                $button_column_text = $mashup_output['0']['content'];
            } else {
                $button_column_text = '';
            }
            $button_element_size = '25';
            foreach ( $defaults as $key => $values ) {
                if ( isset( $atts[$key] ) ) {
                    $$key = $atts[$key];
                } else {
                    $$key = $values;
                }
            }

            $name = 'mashup_var_page_builder_button';
            $coloumn_class = 'column_' . $button_element_size;
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
                 <?php echo esc_attr( $shortcode_view ); ?>" item="button" data="<?php echo mashup_element_size_data_array_index( $button_element_size ) ?>" >
                     <?php mashup_element_setting( $name, $mashup_counter, $button_element_size ) ?>
                <div class="cs-wrapp-class-<?php echo intval( $mashup_counter ) ?>
                     <?php echo esc_attr( $shortcode_element ); ?>" id="<?php echo esc_attr( $name . $mashup_counter ) ?>" data-shortcode-template="[mashup_button {{attributes}}]{{content}}[/mashup_button]" style="display: none;">
                    <div class="cs-heading-area" data-counter="<?php echo esc_attr( $mashup_counter ) ?>">
                        <h5><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_button_edit_text' ) ); ?></h5>
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
                                'name' => mashup_var_theme_text_srt( 'mashup_var_button_sc_text' ),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_button_sc_text_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_var_button_text ),
                                    'cust_id' => 'mashup_var_button_text' . $mashup_counter,
                                    'classes' => '',
                                    'cust_name' => 'mashup_var_button_text[]',
                                    'return' => true,
                                ),
                            );

                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt( 'mashup_var_button_sc_url' ),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_button_sc_url_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_var_button_link ),
                                    'cust_id' => 'mashup_var_button_link' . $mashup_counter,
                                    'classes' => '',
                                    'cust_name' => 'mashup_var_button_link[]',
                                    'return' => true,
                                ),
                            );

                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt( 'mashup_var_button_sc_border' ),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_button_sc_border_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => $mashup_var_button_border,
                                    'id' => '',
                                    'cust_name' => 'mashup_var_button_border[]',
                                    'classes' => 'dropdown chosen-select',
                                    'options' => array(
                                        'yes' => mashup_var_theme_text_srt( 'mashup_var_yes' ),
                                        'no' => mashup_var_theme_text_srt( 'mashup_var_no' ),
                                    ),
                                    'return' => true,
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt( 'mashup_var_button_sc_border_color' ),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_button_sc_border_color_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_var_button_border_color ),
                                    'cust_id' => 'mashup_var_button_border_color' . $mashup_counter,
                                    'classes' => 'bg_color',
                                    'cust_name' => 'mashup_var_button_border_color[]',
                                    'return' => true,
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt( 'mashup_var_button_sc_button_bg_color' ),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_button_sc_button_bg_color_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_var_button_bg_color ),
                                    'cust_id' => 'mashup_var_button_bg_color' . $mashup_counter,
                                    'classes' => 'bg_color',
                                    'cust_name' => 'mashup_var_button_bg_color[]',
                                    'return' => true,
                                ),
                            );

                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt( 'mashup_var_button_sc_button_color' ),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_button_sc_button_color_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_var_button_color ),
                                    'cust_id' => 'mashup_var_button_color' . $mashup_counter,
                                    'classes' => 'bg_color',
                                    'cust_name' => 'mashup_var_button_color[]',
                                    'return' => true,
                                ),
                            );

                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt( 'mashup_var_button_size' ),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_button_size_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => $mashup_var_button_size,
                                    'id' => '',
                                    'cust_name' => 'mashup_var_button_size[]',
                                    'classes' => 'dropdown chosen-select',
                                    'options' => array(
                                        'btn-lg' => mashup_var_theme_text_srt( 'mashup_var_button_large' ),
                                        'medium-btn' => mashup_var_theme_text_srt( 'mashup_var_button_medium' ),
                                        'btn-sml' => mashup_var_theme_text_srt( 'mashup_var_button_small' ),
                                    ),
                                    'return' => true,
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt( 'mashup_var_button_icon_on_off' ),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_button_icon_on_off_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => $mashup_var_icon_view,
                                    'id' => '',
                                    'cust_id' => 'mashup_var_icon_view',
                                    'cust_name' => 'mashup_var_icon_view[]',
                                    'classes' => 'dropdown chosen-select',
                                    'options' => array(
                                        'on' => mashup_var_theme_text_srt( 'mashup_var_on' ),
                                        'off' => mashup_var_theme_text_srt( 'mashup_var_off' ),
                                    ),
                                    'return' => true,
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
                           
                            ?>
                            <div class="icon_fields" style="display: <?php echo esc_html($mashup_var_icon_view == 'off' ? 'none' : 'block' ) ?>;">
                                <div class="form-elements" id="mashup_button_<?php echo esc_attr( $mashup_counter ); ?>">
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <label><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_button_icon' ) ); ?></label>
                                        <?php
                                        if ( function_exists( 'mashup_var_tooltip_helptext' ) ) {
                                            echo mashup_var_tooltip_helptext( mashup_var_theme_text_srt( 'mashup_var_button_icon_hint' ) );
                                        }
                                        ?>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                        <?php echo mashup_var_icomoon_icons_box( esc_html( $mashup_button_icon ), esc_attr( $mashup_counter ), 'mashup_button_icon' ); ?>
                                    </div>
                                </div>
                                <?php
                                $mashup_opt_array = array(
                                    'name' => mashup_var_theme_text_srt( 'mashup_var_button_sc_button_alignment' ),
                                    'desc' => '',
                                    'hint_text' => mashup_var_theme_text_srt( 'mashup_var_button_sc_button_alignment_hint' ),
                                    'echo' => true,
                                    'field_params' => array(
                                        'std' => $mashup_var_button_align,
                                        'id' => '',
                                        'cust_name' => 'mashup_var_button_align[]',
                                        'classes' => 'dropdown chosen-select',
                                        'options' => array(
                                            'left' => mashup_var_theme_text_srt( 'mashup_var_button_sc_button_alignment_left' ),
                                            'right' => mashup_var_theme_text_srt( 'mashup_var_button_sc_button_alignment_right' ),
                                        ),
                                        'return' => true,
                                    ),
                                );
                                $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
                                ?>
                            </div>
                            <?php
                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt( 'mashup_var_button_sc_button_type' ),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_button_sc_button_type_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => $mashup_var_button_type,
                                    'id' => '',
                                    'cust_name' => 'mashup_var_button_type[]',
                                    'classes' => 'dropdown chosen-select',
                                    'options' => array(
                                        'square' => mashup_var_theme_text_srt( 'mashup_var_button_sc_button_type_square' ),
                                        'rounded' => mashup_var_theme_text_srt( 'mashup_var_button_sc_button_type_rounded' ),
                                    ),
                                    'return' => true,
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );

                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt( 'mashup_var_button_sc_target' ),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_button_sc_target_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => $mashup_var_button_target,
                                    'id' => '',
                                    'cust_name' => 'mashup_var_button_target[]',
                                    'classes' => 'dropdown chosen-select',
                                    'options' => array(
                                        '_self' => mashup_var_theme_text_srt( 'mashup_var_button_sc_target_blank' ),
                                        '_blank' => mashup_var_theme_text_srt( 'mashup_var_button_sc_target_self' ),
                                    ),
                                    'return' => true,
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
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
                                'std' => 'button',
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
                                    'cust_id' => 'button_save' . $mashup_counter,
                                    'cust_type' => 'button',
                                    'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
                                    'classes' => 'cs-mashup-admin-btn',
                                    'cust_name' => 'button_save',
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

    add_action( 'wp_ajax_mashup_var_page_builder_button', 'mashup_var_page_builder_button' );
}
if ( ! function_exists( 'mashup_save_page_builder_data_button_callback' ) ) {

    /**
     * Save data for button shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_button_callback( $args ) {

        $data = $args['data'];
        $counters = $args['counters'];
        $widget_type = $args['widget_type'];
        $column = $args['column'];
        if ( $widget_type == "button" ) {
            $mashup_var_button = '';
            $button = $column->addChild( 'button' );
            $button->addChild( 'page_element_size', htmlspecialchars( $data['button_element_size'][$counters['mashup_global_counter_button']] ) );
            $button->addChild( 'button_element_size', htmlspecialchars( $data['button_element_size'][$counters['mashup_global_counter_button']] ) );
            if ( isset( $data['mashup_widget_element_num'][$counters['mashup_counter']] ) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode' ) {
                $shortcode_str = stripslashes( htmlspecialchars( ( $data['shortcode']['button'][$counters['mashup_shortcode_counter_button']] ), ENT_QUOTES ) );
                $counters['mashup_shortcode_counter_button'] ++;
                $button->addChild( 'mashup_shortcode', htmlspecialchars( $shortcode_str, ENT_QUOTES ) );
            } else {
                $mashup_var_button = '[mashup_button ';
                if ( isset( $data['mashup_var_button_text'][$counters['mashup_counter_button']] ) && $data['mashup_var_button_text'][$counters['mashup_counter_button']] != '' ) {
                    $mashup_var_button .= 'mashup_var_button_text="' . htmlspecialchars( $data['mashup_var_button_text'][$counters['mashup_counter_button']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_button_link'][$counters['mashup_counter_button']] ) && $data['mashup_var_button_link'][$counters['mashup_counter_button']] != '' ) {
                    $mashup_var_button .= 'mashup_var_button_link="' . htmlspecialchars( $data['mashup_var_button_link'][$counters['mashup_counter_button']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_button_size'][$counters['mashup_counter_button']] ) && $data['mashup_var_button_size'][$counters['mashup_counter_button']] != '' ) {
                    $mashup_var_button .= 'mashup_var_button_size="' . htmlspecialchars( $data['mashup_var_button_size'][$counters['mashup_counter_button']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_button_icon'][$counters['mashup_counter_button']] ) && $data['mashup_button_icon'][$counters['mashup_counter_button']] != '' ) {
                    $mashup_var_button .= 'mashup_button_icon="' . htmlspecialchars( $data['mashup_button_icon'][$counters['mashup_counter_button']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_icon_view'][$counters['mashup_counter_button']] ) && $data['mashup_var_icon_view'][$counters['mashup_counter_button']] != '' ) {
                    $mashup_var_button .= 'mashup_var_icon_view="' . htmlspecialchars( $data['mashup_var_icon_view'][$counters['mashup_counter_button']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_button_border'][$counters['mashup_counter_button']] ) && $data['mashup_var_button_border'][$counters['mashup_counter_button']] != '' ) {
                    $mashup_var_button .= 'mashup_var_button_border="' . htmlspecialchars( $data['mashup_var_button_border'][$counters['mashup_counter_button']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_button_type'][$counters['mashup_counter_button']] ) && $data['mashup_var_button_type'][$counters['mashup_counter_button']] != '' ) {
                    $mashup_var_button .= 'mashup_var_button_type="' . htmlspecialchars( $data['mashup_var_button_type'][$counters['mashup_counter_button']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_button_align'][$counters['mashup_counter_button']] ) && $data['mashup_var_button_align'][$counters['mashup_counter_button']] != '' ) {
                    $mashup_var_button .= 'mashup_var_button_align="' . htmlspecialchars( $data['mashup_var_button_align'][$counters['mashup_counter_button']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_button_target'][$counters['mashup_counter_button']] ) && $data['mashup_var_button_target'][$counters['mashup_counter_button']] != '' ) {
                    $mashup_var_button .= 'mashup_var_button_target="' . htmlspecialchars( $data['mashup_var_button_target'][$counters['mashup_counter_button']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_button_padding_top'][$counters['mashup_counter_button']] ) && $data['mashup_var_button_padding_top'][$counters['mashup_counter_button']] != '' ) {
                    $mashup_var_button .= 'mashup_var_button_padding_top="' . htmlspecialchars( $data['mashup_var_button_padding_top'][$counters['mashup_counter_button']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_button_padding_bottom'][$counters['mashup_counter_button']] ) && $data['mashup_var_button_padding_bottom'][$counters['mashup_counter_button']] != '' ) {
                    $mashup_var_button .= 'mashup_var_button_padding_bottom="' . htmlspecialchars( $data['mashup_var_button_padding_bottom'][$counters['mashup_counter_button']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_button_padding_left'][$counters['mashup_counter_button']] ) && $data['mashup_var_button_padding_left'][$counters['mashup_counter_button']] != '' ) {
                    $mashup_var_button .= 'mashup_var_button_padding_left="' . htmlspecialchars( $data['mashup_var_button_padding_left'][$counters['mashup_counter_button']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_button_padding_right'][$counters['mashup_counter_button']] ) && $data['mashup_var_button_padding_right'][$counters['mashup_counter_button']] != '' ) {
                    $mashup_var_button .= 'mashup_var_button_padding_right="' . htmlspecialchars( $data['mashup_var_button_padding_right'][$counters['mashup_counter_button']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_button_border_color'][$counters['mashup_counter_button']] ) && $data['mashup_var_button_border_color'][$counters['mashup_counter_button']] != '' ) {
                    $mashup_var_button .= 'mashup_var_button_border_color="' . htmlspecialchars( $data['mashup_var_button_border_color'][$counters['mashup_counter_button']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_button_color'][$counters['mashup_counter_button']] ) && $data['mashup_var_button_color'][$counters['mashup_counter_button']] != '' ) {
                    $mashup_var_button .= 'mashup_var_button_color="' . htmlspecialchars( $data['mashup_var_button_color'][$counters['mashup_counter_button']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_border_color'][$counters['mashup_counter_button']] ) && $data['mashup_var_border_color'][$counters['mashup_counter_button']] != '' ) {
                    $mashup_var_button .= 'mashup_var_border_color="' . htmlspecialchars( $data['mashup_var_border_color'][$counters['mashup_counter_button']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_button_bg_color'][$counters['mashup_counter_button']] ) && $data['mashup_var_button_bg_color'][$counters['mashup_counter_button']] != '' ) {
                    $mashup_var_button .= 'mashup_var_button_bg_color="' . htmlspecialchars( $data['mashup_var_button_bg_color'][$counters['mashup_counter_button']], ENT_QUOTES ) . '" ';
                }
                $mashup_var_button .= ']';
                if ( isset( $data['button_text'][$counters['mashup_counter_button']] ) && $data['button_text'][$counters['mashup_counter_button']] != '' ) {
                    $mashup_var_button .= htmlspecialchars( $data['button_text'][$counters['mashup_counter_button']], ENT_QUOTES ) . ' ';
                }
                $mashup_var_button .= '[/mashup_button]';

                $button->addChild( 'mashup_shortcode', $mashup_var_button );
                $counters['mashup_counter_button'] ++;
            }
            $counters['mashup_global_counter_button'] ++;
        }
        return array(
            'data' => $data,
            'counters' => $counters,
            'widget_type' => $widget_type,
            'column' => $column,
        );
    }

    add_filter( 'mashup_save_page_builder_data', 'mashup_save_page_builder_data_button_callback' );
}
if ( ! function_exists( 'mashup_load_shortcode_counters_button_callback' ) ) {

    /**
     * Populate button shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_button_callback( $counters ) {
        $counters['mashup_global_counter_button'] = 0;
        $counters['mashup_shortcode_counter_button'] = 0;
        $counters['mashup_counter_button'] = 0;
        return $counters;
    }

    add_filter( 'mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_button_callback' );
}
if ( ! function_exists( 'mashup_shortcode_names_list_populate_button_callback' ) ) {

    /**
     * Populate button shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_button_callback( $shortcode_array ) {
        $shortcode_array['button'] = array(
            'title' => mashup_var_frame_text_srt( 'mashup_var_button' ),
            'name' => 'button',
            'icon' => 'icon-chain',
            'categories' => 'typography',
        );
        return $shortcode_array;
    }

    add_filter( 'mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_button_callback' );
}
if ( ! function_exists( 'mashup_element_list_populate_button_callback' ) ) {

    /**
     * Populate button shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_button_callback( $element_list ) {
        $element_list['button'] = mashup_var_frame_text_srt( 'mashup_var_button' );
        return $element_list;
    }

    add_filter( 'mashup_element_list_populate', 'mashup_element_list_populate_button_callback' );
}