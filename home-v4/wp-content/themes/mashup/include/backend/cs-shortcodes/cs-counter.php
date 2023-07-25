<?php
/*
 *
 * @Shortcode Name : multi_counter
 * @retrun
 *
 */
if ( ! function_exists( 'mashup_var_page_builder_counter' ) ) {

    function mashup_var_page_builder_counter( $die = 0 ) {
        global $post, $mashup_node, $mashup_var_html_fields, $mashup_var_form_fields;
        $shortcode_element = '';
        $filter_element = 'filterdrag';
        $shortcode_view = '';
        $output = array();
        $mashup_counter = $_POST['counter'];
        $multi_counter_num = 0;
   if ( isset( $_POST['action'] ) && ! isset( $_POST['shortcode_element_id'] ) ) {
            $MASHUP_POSTID = '';
            $shortcode_element_id = '';
        } else {
            $MASHUP_POSTID = $_POST['POSTID'];
            $shortcode_element_id = $_POST['shortcode_element_id'];
            $shortcode_str = stripslashes( $shortcode_element_id );
            $MASHUP_PREFIX = 'multi_counter|multi_counter_item';
            $parseObject = new ShortcodeParse();
            $output = $parseObject->mashup_shortcodes( $output, $shortcode_str, true, $MASHUP_PREFIX );
        }

        $defaults = array(
            'mashup_var_column_size' => '1/1',
            'mashup_multi_counter_title' => '',
            'mashup_multi_counter_sub_title' => '',
            'mashup_var_counter_col' => '',
            'mashup_var_icon_color' => '',
            'mashup_var_count_color' => '',
            'mashup_var_counters_view' => '',
            'counter_align' => '',
        );
        if ( isset( $output['0']['atts'] ) ) {
            $atts = $output['0']['atts'];
        } else {
            $atts = array();
        }
        if ( isset( $output['0']['content'] ) ) {
            $atts_content = $output['0']['content'];
        } else {
            $atts_content = array();
        }
        if ( is_array( $atts_content ) ) {
            $multi_counter_num = count( $atts_content );
        }
        $multi_counter_element_size = '100';
        foreach ( $defaults as $key => $values ) {
            if ( isset( $atts[$key] ) ) {
                $$key = $atts[$key];
            } else {
                $$key = $values;
            }
        }

        $mashup_multi_counter_title = isset( $mashup_multi_counter_title ) ? $mashup_multi_counter_title : '';
        $mashup_multi_counter_sub_title = isset( $mashup_multi_counter_sub_title ) ? $mashup_multi_counter_sub_title : '';
        $counter_align = isset($counter_align) ?$counter_align : '';
        $name = 'mashup_var_page_builder_counter';
        $coloumn_class = 'column_' . $multi_counter_element_size;
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
        <div id="<?php echo mashup_allow_special_char( $name . $mashup_counter ) ?>_del" class="column  parentdelete <?php echo mashup_allow_special_char( $coloumn_class ); ?> <?php echo mashup_allow_special_char( $shortcode_view ); ?>" item="counter" data="<?php echo mashup_element_size_data_array_index( $multi_counter_element_size ) ?>" >
            <?php mashup_element_setting( $name, $mashup_counter, $multi_counter_element_size, '', 'comments-o', $type = '' ); ?>
            <div class="cs-wrapp-class-<?php echo mashup_allow_special_char( $mashup_counter ) ?> <?php echo mashup_allow_special_char( $shortcode_element ); ?>" id="<?php echo mashup_allow_special_char( $name . $mashup_counter ) ?>" style="display: none;">
                <div class="cs-heading-area">
                    <h5><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_multi_counter_edit_options' ) ); ?></h5>
                    <a href="javascript:mashup_frame_removeoverlay('<?php echo mashup_allow_special_char( $name . $mashup_counter ) ?>','<?php echo mashup_allow_special_char( $filter_element ); ?>')" class="cs-btnclose"><i class="icon-cancel"></i></a>
                </div>
                <div class="cs-clone-append cs-pbwp-content">
                    <div class="cs-wrapp-tab-box">
                        <div id="shortcode-item-<?php echo mashup_allow_special_char( $mashup_counter ); ?>" data-shortcode-template="{{child_shortcode}} [/multi_counter]" data-shortcode-child-template="[multiple_counter_item {{attributes}}] {{content}} [/multiple_counter_item]">
                            <div class="cs-wrapp-clone cs-shortcode-wrapp cs-disable-true cs-pbwp-content" data-template="[multi_counter {{attributes}}]">
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
                                        'std' => esc_attr( $mashup_multi_counter_title ),
                                        'cust_id' => '',
                                        'cust_name' => 'mashup_multi_counter_title[]',
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
                                        'std' => mashup_allow_special_char( $mashup_multi_counter_sub_title ),
                                        'id' => 'mashup_multi_counter_sub_title',
                                        'cust_name' => 'mashup_multi_counter_sub_title[]',
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
                                        'std' => $counter_align,
                                        'id' => '',
                                        'cust_id' => '',
                                        'cust_name' => 'counter_align[]',
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
                                    'name' => mashup_var_theme_text_srt( 'mashup_var_style' ),
                                    'desc' => '',
                                    'hint_text' => mashup_var_theme_text_srt( 'mashup_var_style_hint' ),
                                    'echo' => true,
                                    'field_params' => array(
                                        'std' => $mashup_var_counters_view,
                                        'id' => '',
                                        'cust_name' => 'mashup_var_counters_view[]',
                                        'classes' => 'dropdown chosen-select',
                                        'options' => array(
                                            'default' => mashup_var_theme_text_srt( 'mashup_var_default' ),
                                        ),
                                        'return' => true,
                                    ),
                                );

                                $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
                                $mashup_opt_array = array(
                                    'name' => mashup_var_theme_text_srt( 'mashup_var_sel_col' ),
                                    'desc' => '',
                                    'hint_text' => mashup_var_theme_text_srt( 'mashup_var_sel_col_hint' ),
                                    'echo' => true,
                                    'field_params' => array(
                                        'std' => $mashup_var_counter_col,
                                        'id' => '',
                                        'cust_name' => 'mashup_var_counter_col[]',
                                        'classes' => 'dropdown chosen-select',
                                        'options' => array(
                                            '1' => mashup_var_theme_text_srt( 'mashup_var_one_col' ),
                                            '2' => mashup_var_theme_text_srt( 'mashup_var_two_col' ),
                                            '3' => mashup_var_theme_text_srt( 'mashup_var_three_col' ),
                                            '4' => mashup_var_theme_text_srt( 'mashup_var_four_col' ),
                                            '6' => mashup_var_theme_text_srt( 'mashup_var_six_col' ),
                                        ),
                                        'return' => true,
                                    ),
                                );

                                $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );


                                $mashup_opt_array = array(
                                    'name' => mashup_var_theme_text_srt( 'mashup_var_multiple_counter_icon_color' ),
                                    'desc' => '',
                                    'hint_text' => mashup_var_theme_text_srt( 'mashup_var_multiple_counter_icon_color_tooltip' ),
                                    'echo' => true,
                                    'field_params' => array(
                                        'std' => esc_attr( $mashup_var_icon_color ),
                                        'cust_id' => 'mashup_var_icon_color',
                                        'classes' => 'bg_color',
                                        'cust_name' => 'mashup_var_icon_color[]',
                                        'return' => true,
                                    ),
                                );

                                $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );


                                $mashup_opt_array = array(
                                    'name' => mashup_var_theme_text_srt( 'mashup_var_multiple_counter_count_color' ),
                                    'desc' => '',
                                    'hint_text' => mashup_var_theme_text_srt( 'mashup_var_multiple_counter_count_color_tooltip' ),
                                    'echo' => true,
                                    'field_params' => array(
                                        'std' => esc_attr( $mashup_var_count_color ),
                                        'cust_id' => 'mashup_var_count_color',
                                        'classes' => 'bg_color',
                                        'cust_name' => 'mashup_var_count_color[]',
                                        'return' => true,
                                    ),
                                );

                                $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                                ?>

                            </div>
                            <?php
                            if ( isset( $multi_counter_num ) && $multi_counter_num <> '' && isset( $atts_content ) && is_array( $atts_content ) ) {
                                foreach ( $atts_content as $multi_counter ) {
                                    $rand_string = rand( 123456, 987654 );
                                    $mashup_var_multi_counter_text = $multi_counter['content'];
                                    $defaults = array(
                                        'mashup_var_icon' => '',
                                        'mashup_var_title' => '',
                                        'mashup_var_count' => '',
                                    );
                                    foreach ( $defaults as $key => $values ) {
                                        if ( isset( $multi_counter['atts'][$key] ) ) {
                                            $$key = $multi_counter['atts'][$key];
                                        } else {
                                            $$key = $values;
                                        }
                                    }
                                    $mashup_var_icon = isset( $mashup_var_icon ) ? $mashup_var_icon : '';
                                    $mashup_var_count = isset( $mashup_var_count ) ? $mashup_var_count : '';
                                    $mashup_var_content_color = isset( $mashup_var_content_color ) ? $mashup_var_content_color : '';
                                    ?>
                                    <div class='cs-wrapp-clone cs-shortcode-wrapp cs-pbwp-content' id="mashup_multi_counter_<?php echo mashup_allow_special_char( $rand_string ); ?>">
                                        <header>
                                            <h4><i class='icon-arrows'></i><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_multiple_counter' ) ); ?></h4>
                                            <a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_remove' ) ); ?></a>
                                        </header>
                                        <div class="form-elements" id="<?php echo esc_attr( $rand_string ); ?>">
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <label><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_multiple_counter_icon' ) ); ?></label>
                                                <?php
                                                if ( function_exists( 'mashup_var_tooltip_helptext' ) ) {
                                                    echo mashup_var_tooltip_helptext( mashup_var_theme_text_srt( 'mashup_var_multiple_counter_icon_tooltip' ) );
                                                }
                                                ?>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <?php echo mashup_var_icomoon_icons_box( esc_attr( $mashup_var_icon ), $rand_string, 'mashup_var_icon' ); ?>
                                            </div>
                                        </div>
                                        <?php
                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt( 'mashup_var_multiple_counter_title' ),
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_multiple_counter_title_hint' ),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => esc_attr( $mashup_var_title ),
                                                'cust_id' => 'mashup_var_title',
                                                'classes' => '',
                                                'cust_name' => 'mashup_var_title[]',
                                                'return' => true,
                                            ),
                                        );

                                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );


                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt( 'mashup_var_multiple_counter_count' ),
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_multiple_counter_count_tooltip' ),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => esc_attr( $mashup_var_count ),
                                                'cust_id' => 'mashup_var_count',
                                                'classes' => '',
                                                'cust_name' => 'mashup_var_count[]',
                                                'return' => true,
                                            ),
                                        );
                                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                                        $mashup_opt_array = array(
                                            'name' => mashup_var_frame_text_srt( 'mashup_var_multiple_counter_content' ),
                                            'desc' => '',
                                            'hint_text' => mashup_var_frame_text_srt( 'mashup_var_multiple_counter_content_tooltip' ),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => esc_attr( $mashup_var_multi_counter_text ),
                                                'cust_id' => '',
                                                'cust_name' => 'mashup_var_multi_counter_text[]',
                                                'return' => true,
                                                'extra_atr' => 'data-content-text="cs-shortcode-textarea"',
                                                'classes' => '',
                                                'mashup_editor' => true,
                                            ),
                                        );
                                        $mashup_var_html_fields->mashup_var_textarea_field( $mashup_opt_array );
                                        ?>
                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="hidden-object">
                            <?php
                            $mashup_opt_array = array(
                                'std' => mashup_allow_special_char( $multi_counter_num ),
                                'id' => '',
                                'before' => '',
                                'after' => '',
                                'classes' => 'fieldCounter',
                                'extra_atr' => '',
                                'cust_id' => '',
                                'cust_name' => 'multi_counter_num[]',
                                'return' => false,
                                'required' => false
                            );
                            $mashup_var_form_fields->mashup_var_form_hidden_render( $mashup_opt_array );
                            ?>

                        </div>
                        <div class="wrapptabbox cs-pbwp-content cs-zero-padding">
                            <div class="opt-conts">
                                <ul class="form-elements">
                                    <li class="to-field"> <a href="javascript:void(0);" class="add_counterss cs-main-btn" onclick="mashup_shortcode_element_ajax_call('counter', 'shortcode-item-<?php echo mashup_allow_special_char( $mashup_counter ); ?>', '<?php echo admin_url( 'admin-ajax.php' ); ?>')"><i class="icon-plus-circle"></i><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_add_counter' ) ); ?></a> </li>
                                    <div id="loading" class="shortcodeload"></div>
                                </ul>
                                <?php if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) { ?>
                                    <ul class="form-elements insert-bg noborder">
                                        <li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:mashup_shortcode_insert_editor('<?php echo str_replace( 'mashup_var_page_builder_', '', $name ); ?>', 'shortcode-item-<?php echo mashup_allow_special_char( $mashup_counter ); ?>', '<?php echo mashup_allow_special_char( $filter_element ); ?>')" ><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_insert' ) ); ?></a> </li>
                                    </ul>
                                    <div id="results-shortocde"></div>
                                <?php } else { ?>
                                    <?php
                                    $mashup_opt_array = array(
                                        'std' => 'counter',
                                        'id' => '',
                                        'before' => '',
                                        'after' => '',
                                        'classes' => '',
                                        'extra_atr' => '',
                                        'cust_id' => 'mashup_orderby' . $mashup_counter,
                                        'cust_name' => 'mashup_orderby[]',
                                        'return' => false,
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
                                            'cust_id' => 'multi_counter_save' . $mashup_counter,
                                            'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
                                            'cust_type' => 'button',
                                            'classes' => 'cs-mashup-admin-btn',
                                            'cust_name' => 'multi_counter_save',
                                            'return' => true,
                                        ),
                                    );
                                    $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
        if ( $die <> 1 ) {
            die();
        }
    }

    add_action( 'wp_ajax_mashup_var_page_builder_counter', 'mashup_var_page_builder_counter' );
}

if ( ! function_exists( 'mashup_save_page_builder_data_counter_callback' ) ) {

    /**
     * Save data for counter shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_counter_callback( $args ) {

        $data = $args['data'];
        $counters = $args['counters'];
        $widget_type = $args['widget_type'];
        $column = $args['column'];
        if ( $widget_type == "counter" ) {

            $shortcode = $shortcode_item = '';
            $counter = $column->addChild( 'counter' );
            $counter->addChild( 'page_element_size', htmlspecialchars( $data['counter_element_size'][$counters['mashup_global_counter_counter']] ) );
            $counter->addChild( 'counter_element_size', htmlspecialchars( $data['counter_element_size'][$counters['mashup_global_counter_counter']] ) );
            if ( isset( $data['mashup_widget_element_num'][$counters['mashup_counter']] ) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode' ) {
                $shortcode_str = stripslashes( $data['shortcode']['counter'][$counters['mashup_shortcode_counter_counter']] );
                $counters['mashup_shortcode_counter_counter'] ++;
                $counter->addChild( 'mashup_shortcode', htmlspecialchars( $shortcode_str, ENT_QUOTES ) );
            } else {
				if ( isset( $data['multi_counter_num'][$counters['mashup_counter_counter']] ) && $data['multi_counter_num'][$counters['mashup_counter_counter']] > 0 ) {

                    for ( $i = 1; $i <= $data['multi_counter_num'][$counters['mashup_counter_counter']]; $i ++ ) {
                        $shortcode_item .= '[multi_counter_item ';
                        if ( isset( $data['mashup_var_icon'][$counters['mashup_counter_counter_node']] ) && $data['mashup_var_icon'][$counters['mashup_counter_counter_node']] != '' ) {
                            $shortcode_item .= 'mashup_var_icon="' . htmlspecialchars( $data['mashup_var_icon'][$counters['mashup_counter_counter_node']], ENT_QUOTES ) . '" ';
                        }
                        if ( isset( $data['mashup_var_title'][$counters['mashup_counter_counter_node']] ) && $data['mashup_var_title'][$counters['mashup_counter_counter_node']] != '' ) {
                            $shortcode_item .= 'mashup_var_title="' . htmlspecialchars( $data['mashup_var_title'][$counters['mashup_counter_counter_node']], ENT_QUOTES ) . '" ';
                        }
                        if ( isset( $data['mashup_var_count'][$counters['mashup_counter_counter_node']] ) && $data['mashup_var_count'][$counters['mashup_counter_counter_node']] != '' ) {
                            $shortcode_item .= 'mashup_var_count="' . htmlspecialchars( $data['mashup_var_count'][$counters['mashup_counter_counter_node']], ENT_QUOTES ) . '" ';
                        }
                        if ( isset( $data['mashup_var_content'][$counters['mashup_counter_counter_node']] ) && $data['mashup_var_content'][$counters['mashup_counter_counter_node']] != '' ) {
                            $shortcode_item .= 'mashup_var_content="' . htmlspecialchars( $data['mashup_var_content'][$counters['mashup_counter_counter_node']], ENT_QUOTES ) . '" ';
                        }
                      $shortcode_item .= ']';
                        if ( isset( $data['mashup_var_multi_counter_text'][$counters['mashup_counter_counter_node']] ) && $data['mashup_var_multi_counter_text'][$counters['mashup_counter_counter_node']] != '' ) {
                            $shortcode_item .= htmlspecialchars( $data['mashup_var_multi_counter_text'][$counters['mashup_counter_counter_node']], ENT_QUOTES );
                        }
                        $shortcode_item .= '[/multi_counter_item]';
                        $counters['mashup_counter_counter_node'] ++;
                    }
                }
				$section_title = '';
                if ( isset( $data['mashup_multi_counter_title'][$counters['mashup_counter_counter']] ) && $data['mashup_multi_counter_title'][$counters['mashup_counter_counter']] != '' ) {
                    $section_title .= 'mashup_multi_counter_title="' . htmlspecialchars( $data['mashup_multi_counter_title'][$counters['mashup_counter_counter']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_multi_counter_sub_title'][$counters['mashup_counter_counter']] ) && $data['mashup_multi_counter_sub_title'][$counters['mashup_counter_counter']] != '' ) {
                    $section_title .= 'mashup_multi_counter_sub_title="' . htmlspecialchars( $data['mashup_multi_counter_sub_title'][$counters['mashup_counter_counter']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['counter_align'][$counters['mashup_counter_counter']] ) && $data['counter_align'][$counters['mashup_counter_counter']] != '' ) {
                    $section_title .= 'counter_align="' . htmlspecialchars( $data['counter_align'][$counters['mashup_counter_counter']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_counter_col'][$counters['mashup_counter_counter']] ) && $data['mashup_var_counter_col'][$counters['mashup_counter_counter']] != '' ) {
                    $section_title .= 'mashup_var_counter_col="' . htmlspecialchars( $data['mashup_var_counter_col'][$counters['mashup_counter_counter']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_icon_color'][$counters['mashup_counter_counter']] ) && $data['mashup_var_icon_color'][$counters['mashup_counter_counter']] != '' ) {
                    $section_title .= 'mashup_var_icon_color="' . htmlspecialchars( $data['mashup_var_icon_color'][$counters['mashup_counter_counter']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_count_color'][$counters['mashup_counter_counter']] ) && $data['mashup_var_count_color'][$counters['mashup_counter_counter']] != '' ) {
                    $section_title .= 'mashup_var_count_color="' . htmlspecialchars( $data['mashup_var_count_color'][$counters['mashup_counter_counter']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_counters_view'][$counters['mashup_counter_counter']] ) && $data['mashup_var_counters_view'][$counters['mashup_counter_counter']] != '' ) {
                    $section_title .= 'mashup_var_counters_view="' . htmlspecialchars( $data['mashup_var_counters_view'][$counters['mashup_counter_counter']], ENT_QUOTES ) . '" ';
                }
                $shortcode = '[multi_counter ' . $section_title . ' ]' . $shortcode_item . '[/multi_counter]';
                $counter->addChild( 'mashup_shortcode', $shortcode );
                $counters['mashup_counter_counter'] ++;
            }
            $counters['mashup_global_counter_counter'] ++;
        }
        return array(
            'data' => $data,
            'counters' => $counters,
            'widget_type' => $widget_type,
            'column' => $column,
        );
    }

    add_filter( 'mashup_save_page_builder_data', 'mashup_save_page_builder_data_counter_callback' );
}

if ( ! function_exists( 'mashup_load_shortcode_counters_counter_callback' ) ) {

    /**
     * Populate counter shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_counter_callback( $counters ) {
        $counters['mashup_counter_counter'] = 0;
        $counters['mashup_counter_counter_node'] = 0;
        $counters['mashup_shortcode_counter_counter'] = 0;
        $counters['mashup_global_counter_counter'] = 0;
        return $counters;
    }

    add_filter( 'mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_counter_callback' );
}
if ( ! function_exists( 'mashup_shortcode_names_list_populate_counter_callback' ) ) {

    /**
     * Populate list shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_counter_callback( $shortcode_array ) {
        $shortcode_array['counter'] = array(
            'title' => mashup_var_frame_text_srt( 'mashup_var_multiple_counter' ),
            'name' => 'counter',
            'icon' => 'icon-timelapse',
            'categories' => 'loops',
        );
        return $shortcode_array;
    }

    add_filter( 'mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_counter_callback' );
}

if ( ! function_exists( 'mashup_element_list_populate_counter_callback' ) ) {

    /**
     * Populate counter shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_counter_callback( $element_list ) {
        $element_list['counter'] = mashup_var_frame_text_srt( 'mashup_var_multiple_counter' );
        return $element_list;
    }

    add_filter( 'mashup_element_list_populate', 'mashup_element_list_populate_counter_callback' );
}

if ( ! function_exists( 'mashup_shortcode_sub_element_ui_counter_callback' ) ) {

    /**
     * Render UI for sub element in list settings.
     *
     * @param	array $args
     */
    function mashup_shortcode_sub_element_ui_counter_callback( $args ) {
        $type = $args['type'];
        $mashup_var_html_fields = $args['html_fields'];

        if ( $type == 'counter' ) {

            $multiple_counter_count = 'multiple_counter_' . rand( 455345, 23454390 );
            if ( isset( $mashup_var_multi_counter_text ) && $mashup_var_multi_counter_text != '' ) {
                $mashup_var_multi_counter_text = $mashup_var_multi_counter_text;
            } else {
                $mashup_var_multi_counter_text = '';
            }
            ?>
            <div class='cs-wrapp-clone cs-shortcode-wrapp' id="mashup_multi_counter_<?php echo mashup_allow_special_char( $multiple_counter_count ); ?>">
                <header>
                    <h4><i class='icon-arrows'></i><?php echo esc_html( mashup_var_frame_text_srt( 'mashup_var_multiple_counter' ) ); ?></h4>
                    <a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php
            echo esc_html( mashup_var_frame_text_srt( 'mashup_var_remove' ) );
            ?></a>
                </header>

                <div class="form-elements" id="<?php echo esc_attr( $multiple_counter_count ); ?>">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label><?php echo esc_html( mashup_var_frame_text_srt( 'mashup_var_multiple_counter_icon' ) ); ?></label>
                        <?php
                        if ( function_exists( 'mashup_var_tooltip_helptext' ) ) {
                            echo mashup_var_tooltip_helptext( mashup_var_frame_text_srt( 'mashup_var_multiple_counter_icon_tooltip' ) );
                        }
                        ?>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <?php echo mashup_var_icomoon_icons_box( '', $multiple_counter_count, 'mashup_var_icon' ); ?>
                    </div>
                </div>


                <?php
                $mashup_opt_array = array(
                    'name' => mashup_var_frame_text_srt( 'mashup_var_multiple_counter_title' ),
                    'desc' => '',
                    'hint_text' => mashup_var_frame_text_srt( 'mashup_var_multiple_counter_title_hint' ),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'cust_id' => 'mashup_var_title',
                        'classes' => '',
                        'cust_name' => 'mashup_var_title[]',
                        'return' => true,
                    ),
                );

                $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                $mashup_opt_array = array(
                    'name' => mashup_var_frame_text_srt( 'mashup_var_multiple_counter_count' ),
                    'desc' => '',
                    'hint_text' => mashup_var_frame_text_srt( 'mashup_var_multiple_counter_count_tooltip' ),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'cust_id' => 'mashup_var_count',
                        'classes' => '',
                        'cust_name' => 'mashup_var_count[]',
                        'return' => true,
                    ),
                );

                $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                $mashup_opt_array = array(
                    'name' => mashup_var_frame_text_srt( 'mashup_var_multiple_counter_content' ),
                    'desc' => '',
                    'hint_text' => mashup_var_frame_text_srt( 'mashup_var_multiple_counter_content_tooltip' ),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'cust_id' => '',
                        'cust_name' => 'mashup_var_multi_counter_text[]',
                        'return' => true,
                        'extra_atr' => 'data-content-text="cs-shortcode-textarea"',
                        'classes' => '',
                        'mashup_editor' => true,
                    ),
                );

                $mashup_var_html_fields->mashup_var_textarea_field( $mashup_opt_array );
                ?>
            </div>

            <?php
        }
    }

    add_action( 'mashup_shortcode_sub_element_ui', 'mashup_shortcode_sub_element_ui_counter_callback' );
}