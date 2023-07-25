<?php
/* *
 * @Shortcode Name : Heading
 * @retrun
 * */
if ( ! function_exists( 'mashup_var_page_builder_heading' ) ) {

    function mashup_var_page_builder_heading( $die = 0 ) {
        global $mashup_node, $post, $mashup_var_html_fields, $mashup_var_form_fields, $mashup_var_static_text;
        ;
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
            $PREFIX = 'mashup_heading';
            $parseObject = new ShortcodeParse();
            $output = $parseObject->mashup_shortcodes( $output, $shortcode_str, true, $PREFIX );
        }
        $defaults = array(
            'heading_title' => '',
            'color_title' => '',
            'heading_color' => '#000',
            'class' => 'cs-heading-shortcode',
            'heading_style' => '1',
            'heading_style_type' => '1',
            'heading_size' => '',
            'font_weight' => '',
            'letter_space' => '',
            'line_height' => '',
            'heading_font_style' => '',
            'heading_view' => 'view-1',
            'heading_divider_position' => 'before',
            'heading_align' => 'center',
            'heading_divider' => '',
            'heading_color' => '',
            'sub_heading_title' => '',
            'heading_content_color' => '',
            'mashup_var_heading_sub_title' => '',
                // 'mashup_var_heading_element_align' => '',
        );
        if ( isset( $output['0']['atts'] ) ) {
            $atts = $output['0']['atts'];
        } else {
            $atts = array();
        }
        if ( isset( $output['0']['content'] ) ) {
            $heading_content = $output['0']['content'];
        } else {
            $heading_content = '';
        }
        $heading_element_size = '25';
        foreach ( $defaults as $key => $values ) {
            if ( isset( $atts[$key] ) )
                $$key = $atts[$key];
            else
                $$key = $values;
        }
        $name = 'mashup_var_page_builder_heading';
        $coloumn_class = 'column_' . $heading_element_size;

        if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
            $shortcode_element = 'shortcode_element_class';
            $shortcode_view = 'cs-pbwp-shortcode';
            $filter_element = 'ajax-drag';
            $coloumn_class = '';
        }
        $strings = new mashup_theme_all_strings;
        $strings->mashup_short_code_strings();
        ?>
        <div id="<?php echo esc_attr( $name . $mashup_counter ) ?>_del" class="column parentdelete <?php echo esc_attr( $coloumn_class ); ?> <?php echo esc_attr( $shortcode_view ); ?>" item="heading" data="<?php echo mashup_element_size_data_array_index( $heading_element_size ) ?>" >
            <?php mashup_element_setting( $name, $mashup_counter, $heading_element_size, '', 'h-square', $type = '' ); ?>
            <div class="cs-wrapp-class-<?php echo intval( $mashup_counter ) ?> <?php echo esc_attr( $shortcode_element ); ?>" id="<?php echo esc_attr( $name . $mashup_counter ) ?>"  data-shortcode-template="[mashup_heading {{attributes}}]{{content}}[/mashup_heading]" style="display: none;">
                <div class="cs-heading-area">
                    <h5><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_heading_edit_options' ) ); ?></h5>
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

                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_title' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_title_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => mashup_allow_special_char( $heading_title ),
                                'cust_id' => '',
                                'classes' => 'txtfield',
                                'cust_name' => 'heading_title[]',
                                'return' => true,
                            ),
                        );
                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );


                        // element subtitle
                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_element_sub_title' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_element_sub_title_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => esc_attr( $mashup_var_heading_sub_title ),
                                'cust_id' => '',
                                'cust_name' => 'mashup_var_heading_sub_title[]',
                                'return' => true,
                            ),
                        );
                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

//			    $mashup_opt_array = array(
//				'name' => mashup_var_theme_text_srt('mashup_var_align'),
//				'desc' => '',
//				'hint_text' => mashup_var_theme_text_srt('mashup_var_align_hint'),
//				'echo' => true,
//				'field_params' => array(
//				    'std' => $mashup_var_heading_element_align,
//				    'id' => '',
//				    'cust_id' => '',
//				    'cust_name' => 'mashup_var_heading_element_align[]',
//				    'classes' => 'chosen-select select-medium',
//				    'options' => array(
//					'left' => mashup_var_theme_text_srt('mashup_var_heading_sc_left'),
//					'right' => mashup_var_theme_text_srt('mashup_var_heading_sc_right'),
//					'Center' => mashup_var_theme_text_srt('mashup_var_heading_sc_center'),
//				    ),
//				    'return' => true,
//				),
//			    );
//
//			    $mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);





                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_content' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_content_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => esc_textarea( $heading_content ),
                                'cust_id' => '',
                                'classes' => 'txtfield',
                                'cust_name' => 'heading_content[]',
                                'return' => true,
                                'mashup_editor' => true,
                                'extra_atr' => 'data-content-text="cs-shortcode-textarea"',
                            ),
                        );

                        $mashup_var_html_fields->mashup_var_textarea_field( $mashup_opt_array );

                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_type' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_type_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => $heading_style,
                                'id' => '',
                                'cust_id' => '',
                                'cust_name' => 'heading_style[]',
                                'classes' => 'dropdown chosen-select',
                                'options' => array(
                                    '1' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_h1' ),
                                    '2' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_h2' ),
                                    '3' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_h3' ),
                                    '4' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_h4' ),
                                    '5' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_h5' ),
                                    '6' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_h6' ),
                                ),
                                'return' => true,
                            ),
                        );
                        $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
                        ?>

                        <div class="form-elements">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <label><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_heading_sc_font_size' ) ); ?></label>
                                <?php
                                if ( function_exists( 'mashup_var_tooltip_helptext' ) ) {
                                    echo mashup_var_tooltip_helptext( mashup_var_theme_text_srt( 'mashup_var_heading_sc_font_size_hint' ) );
                                }
                                ?>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <?php
                                $mashup_opt_array = array(
                                    'std' => esc_attr( $heading_size ),
                                    'id' => '',
                                    'classes' => 'cs-range-input input-small',
                                    'extra_atr' => '',
                                    'cust_id' => '',
                                    'cust_name' => 'heading_size[]',
                                    'extra_atr' => ' placeholder="' . mashup_var_theme_text_srt( 'mashup_var_heading_sc_font_size' ) . '"',
                                    'return' => true,
                                    'required' => false,
                                    'rang' => true,
                                    'min' => 0,
                                    'max' => 50,
                                );
                                echo mashup_allow_special_char( $mashup_var_form_fields->mashup_var_form_text_render( $mashup_opt_array ) );
                                ?>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <label><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_heading_sc_letter_spacing' ) ); ?></label>
                                <?php
                                if ( function_exists( 'mashup_var_tooltip_helptext' ) ) {
                                    echo mashup_var_tooltip_helptext( mashup_var_theme_text_srt( 'mashup_var_heading_sc_letter_spacing_hint' ) );
                                }
                                ?>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

                                <?php
                                $mashup_opt_array = array(
                                    'std' => esc_attr( $letter_space ),
                                    'id' => '',
                                    'classes' => 'cs-range-input input-small',
                                    'extra_atr' => '',
                                    'cust_id' => '',
                                    'cust_name' => 'letter_space[]',
                                    'extra_atr' => ' placeholder="' . mashup_var_theme_text_srt( 'mashup_var_heading_sc_letter_spacing' ) . '"',
                                    'return' => true,
                                    'required' => false,
                                    'rang' => true,
                                    'min' => 0,
                                    'max' => 50,
                                );
                                echo mashup_allow_special_char( $mashup_var_form_fields->mashup_var_form_text_render( $mashup_opt_array ) );
                                ?>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <label><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_heading_sc_line_height' ) ); ?></label>
                                <?php
                                if ( function_exists( 'mashup_var_tooltip_helptext' ) ) {
                                    echo mashup_var_tooltip_helptext( mashup_var_theme_text_srt( 'mashup_var_heading_sc_line_height_hint' ) );
                                }
                                ?>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <?php
                                $mashup_opt_array = array(
                                    'std' => esc_attr( $line_height ),
                                    'id' => '',
                                    'classes' => 'cs-range-input input-small',
                                    'extra_atr' => '',
                                    'cust_id' => '',
                                    'cust_name' => 'line_height[]',
                                    'extra_atr' => ' placeholder="' . mashup_var_theme_text_srt( 'mashup_var_heading_sc_line_height' ) . '"',
                                    'return' => true,
                                    'required' => false,
                                    'rang' => true,
                                    'min' => 0,
                                    'max' => 50,
                                );
                                echo mashup_allow_special_char( $mashup_var_form_fields->mashup_var_form_text_render( $mashup_opt_array ) );
                                ?>
                            </div>
                        </div>


                        <?php
                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_heading_view' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_heading_view_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => $heading_view,
                                'id' => '',
                                'cust_id' => '',
                                'cust_name' => 'heading_view[]',
                                'classes' => 'dropdown chosen-select',
                                'options' => array(
                                    'view-1' => mashup_var_theme_text_srt( 'header_view_1' ),
                                    'view-2' => mashup_var_theme_text_srt( 'header_view_2' ),
                                ),
                                'return' => true,
                            ),
                        );

                        // $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );

                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_heading_align' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_heading_align_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => $heading_align,
                                'id' => '',
                                'cust_id' => '',
                                'cust_name' => 'heading_align[]',
                                'classes' => 'dropdown chosen-select',
                                'options' => array(
                                    'left' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_left' ),
                                    'right' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_right' ),
                                    'Center' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_center' ),
                                ),
                                'return' => true,
                            ),
                        );

                        $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );

                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_heading_color' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_heading_color_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => mashup_allow_special_char( $heading_color ),
                                'cust_id' => '',
                                'classes' => 'bg_color',
                                'cust_name' => 'heading_color[]',
                                'return' => true,
                            ),
                        );

                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_divider' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_divider_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => $heading_divider,
                                'id' => '',
                                'cust_id' => '',
                                'cust_name' => 'heading_divider[]',
                                'classes' => 'dropdown chosen-select',
                                'options' => array(
                                    'on' => mashup_var_theme_text_srt( 'mashup_var_on' ),
                                    'off' => mashup_var_theme_text_srt( 'mashup_var_off' ),
                                ),
                                'return' => true,
                            ),
                        );
                        $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );


                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_heading_divider_position' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_heading_divider_position_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => $heading_divider_position,
                                'id' => '',
                                'cust_id' => '',
                                'cust_name' => 'heading_divider_position[]',
                                'classes' => 'dropdown chosen-select',
                                'options' => array(
                                    'after' => mashup_var_theme_text_srt( 'mashup_var_heading_divider_after_subheading' ),
                                    'before' => mashup_var_theme_text_srt( 'mashup_var_heading_divider_before_subheading' ),
                                ),
                                'return' => true,
                            ),
                        );

                        $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );



                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_font_style' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_font_style_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => $heading_font_style,
                                'id' => '',
                                'cust_id' => '',
                                'cust_name' => 'heading_font_style[]',
                                'classes' => 'dropdown chosen-select',
                                'options' => array(
                                    'normal' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_normal' ),
                                    'italic' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_italic' ),
                                    'oblique' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_oblique' ),
                                ),
                                'return' => true,
                            ),
                        );

                        $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
                        ?>

                    </div>
                    <?php if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) { ?>
                        <ul class="form-elements insert-bg">
                            <li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:mashup_shortcode_insert_editor('<?php echo str_replace( 'mashup_var_page_builder_', '', $name ); ?>', '<?php echo esc_js( $name . $mashup_counter ) ?>', '<?php echo esc_js( $filter_element ); ?>')" ><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_insert' ) ); ?></a> </li>
                        </ul>
                        <div id="results-shortocde"></div>
                        <?php
                    } else {
                        $mashup_opt_array = array(
                            'std' => 'heading',
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

    add_action( 'wp_ajax_mashup_var_page_builder_heading', 'mashup_var_page_builder_heading' );
}

if ( ! function_exists( 'mashup_save_page_builder_data_heading_callback' ) ) {

    /**
     * Save data for heading shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_heading_callback( $args ) {

        $data = $args['data'];
        $counters = $args['counters'];
        $widget_type = $args['widget_type'];
        $column = $args['column'];
        if ( $widget_type == "heading" ) {

            $mashup_var_heading = '';
            $heading = $column->addChild( 'heading' );
            $heading->addChild( 'page_element_size', htmlspecialchars( $data['heading_element_size'][$counters['mashup_global_counter_heading']] ) );
            $heading->addChild( 'heading_element_size', htmlspecialchars( $data['heading_element_size'][$counters['mashup_global_counter_heading']] ) );
            if ( isset( $data['mashup_widget_element_num'][$counters['mashup_counter']] ) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode' ) {
                $shortcode_str = stripslashes( htmlspecialchars( ( $data['shortcode']['heading'][$counters['mashup_shortcode_counter_heading']] ), ENT_QUOTES ) );
                $counters['mashup_shortcode_counter_heading'] ++;
                $heading->addChild( 'mashup_shortcode', htmlspecialchars( $shortcode_str, ENT_QUOTES ) );
            } else {
                $mashup_var_heading = '[mashup_heading ';
                if ( isset( $data['heading_title'][$counters['mashup_counter_heading']] ) && $data['heading_title'][$counters['mashup_counter_heading']] != '' ) {
                    $mashup_var_heading .= 'heading_title="' . htmlspecialchars( $data['heading_title'][$counters['mashup_counter_heading']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_heading_sub_title'][$counters['mashup_counter_heading']] ) && $data['mashup_var_heading_sub_title'][$counters['mashup_counter_heading']] != '' ) {
                    $mashup_var_heading .= 'mashup_var_heading_sub_title="' . htmlspecialchars( $data['mashup_var_heading_sub_title'][$counters['mashup_counter_heading']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['sub_heading_title'][$counters['mashup_counter_heading']] ) && $data['sub_heading_title'][$counters['mashup_counter_heading']] != '' ) {
                    $mashup_var_heading .= 'sub_heading_title="' . htmlspecialchars( $data['sub_heading_title'][$counters['mashup_counter_heading']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['heading_style'][$counters['mashup_counter_heading']] ) && $data['heading_style'][$counters['mashup_counter_heading']] != '' ) {
                    $mashup_var_heading .= 'heading_style="' . htmlspecialchars( $data['heading_style'][$counters['mashup_counter_heading']] ) . '" ';
                }
                if ( isset( $data['heading_size'][$counters['mashup_counter_heading']] ) && $data['heading_size'][$counters['mashup_counter_heading']] != '' ) {
                    $mashup_var_heading .= 'heading_size="' . htmlspecialchars( $data['heading_size'][$counters['mashup_counter_heading']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['letter_space'][$counters['mashup_counter_heading']] ) && $data['letter_space'][$counters['mashup_counter_heading']] != '' ) {
                    $mashup_var_heading .= 'letter_space="' . htmlspecialchars( $data['letter_space'][$counters['mashup_counter_heading']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['line_height'][$counters['mashup_counter_heading']] ) && $data['line_height'][$counters['mashup_counter_heading']] != '' ) {
                    $mashup_var_heading .= 'line_height="' . htmlspecialchars( $data['line_height'][$counters['mashup_counter_heading']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['heading_align'][$counters['mashup_counter_heading']] ) && $data['heading_align'][$counters['mashup_counter_heading']] != '' ) {
                    $mashup_var_heading .= 'heading_align="' . htmlspecialchars( $data['heading_align'][$counters['mashup_counter_heading']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['heading_view'][$counters['mashup_counter_heading']] ) && $data['heading_view'][$counters['mashup_counter_heading']] != '' ) {
                    $mashup_var_heading .= 'heading_view="' . htmlspecialchars( $data['heading_view'][$counters['mashup_counter_heading']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['heading_divider_position'][$counters['mashup_counter_heading']] ) && $data['heading_divider_position'][$counters['mashup_counter_heading']] != '' ) {
                    $mashup_var_heading .= 'heading_divider_position="' . htmlspecialchars( $data['heading_divider_position'][$counters['mashup_counter_heading']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['heading_font_style'][$counters['mashup_counter_heading']] ) && $data['heading_font_style'][$counters['mashup_counter_heading']] != '' ) {
                    $mashup_var_heading .= 'heading_font_style="' . htmlspecialchars( $data['heading_font_style'][$counters['mashup_counter_heading']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['heading_divider'][$counters['mashup_counter_heading']] ) && $data['heading_divider'][$counters['mashup_counter_heading']] != '' ) {
                    $mashup_var_heading .= 'heading_divider="' . htmlspecialchars( $data['heading_divider'][$counters['mashup_counter_heading']] ) . '" ';
                }
                if ( isset( $data['heading_color'][$counters['mashup_counter_heading']] ) && $data['heading_color'][$counters['mashup_counter_heading']] != '' ) {
                    $mashup_var_heading .= 'heading_color="' . htmlspecialchars( $data['heading_color'][$counters['mashup_counter_heading']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['color_title'][$counters['mashup_counter_heading']] ) && $data['color_title'][$counters['mashup_counter_heading']] != '' ) {
                    $mashup_var_heading .= 'color_title="' . htmlspecialchars( $data['color_title'][$counters['mashup_counter_heading']], ENT_QUOTES ) . '" ';
                }
                $mashup_var_heading .= ']';
                if ( isset( $data['heading_content'][$counters['mashup_counter_heading']] ) && $data['heading_content'][$counters['mashup_counter_heading']] != '' ) {
                    $mashup_var_heading .= htmlspecialchars( $data['heading_content'][$counters['mashup_counter_heading']], ENT_QUOTES );
                }
                $mashup_var_heading .= '[/mashup_heading]';
                $heading->addChild( 'mashup_shortcode', $mashup_var_heading );
                $counters['mashup_counter_heading'] ++;
            }
            $counters['mashup_global_counter_heading'] ++;
        }
        return array(
            'data' => $data,
            'counters' => $counters,
            'widget_type' => $widget_type,
            'column' => $column,
        );
    }

    add_filter( 'mashup_save_page_builder_data', 'mashup_save_page_builder_data_heading_callback' );
}

if ( ! function_exists( 'mashup_load_shortcode_counters_heading_callback' ) ) {

    /**
     * Populate heading shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_heading_callback( $counters ) {
        $counters['mashup_global_counter_heading'] = 0;
        $counters['mashup_shortcode_counter_heading'] = 0;
        $counters['mashup_counter_heading'] = 0;
        return $counters;
    }

    add_filter( 'mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_heading_callback' );
}
if ( ! function_exists( 'mashup_shortcode_names_list_populate_heading_callback' ) ) {

    /**
     * Populate heading shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_heading_callback( $shortcode_array ) {
        $shortcode_array['heading'] = array(
            'title' => mashup_var_frame_text_srt( 'mashup_var_heading' ),
            'name' => 'heading',
            'icon' => 'icon-header',
            'categories' => 'contentblocks',
        );
        return $shortcode_array;
    }

    add_filter( 'mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_heading_callback' );
}

if ( ! function_exists( 'mashup_element_list_populate_heading_callback' ) ) {

    /**
     * Populate heading shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_heading_callback( $element_list ) {
        $element_list['heading'] = mashup_var_frame_text_srt( 'mashup_var_heading' );
        return $element_list;
    }

    add_filter( 'mashup_element_list_populate', 'mashup_element_list_populate_heading_callback' );
}