<?php
/*
 *
 * @Shortcode Name : Price Plan
 * @retrun
 *
 */

if ( ! function_exists( 'mashup_var_page_builder_price_table' ) ) {

    function mashup_var_page_builder_price_table( $die = 0 ) {
        global $post, $mashup_node, $mashup_var_html_fields, $mashup_var_form_fields, $mashup_var_static_text;
        $shortcode_element = '';
        $filter_element = 'filterdrag';
        $shortcode_view = '';
        $output = array();
        $mashup_counter = $_POST['counter'];
        $price_table_num = 0;

        if ( isset( $_POST['action'] ) && ! isset( $_POST['shortcode_element_id'] ) ) {
            $MASHUP_POSTID = '';
            $shortcode_element_id = '';
        } else {
            $MASHUP_POSTID = $_POST['POSTID'];
            $shortcode_element_id = $_POST['shortcode_element_id'];
            $shortcode_str = stripslashes( $shortcode_element_id );
            $MASHUP_PREFIX = 'mashup_price_table|price_table_item';
            $parseObject = new ShortcodeParse();
            $output = $parseObject->mashup_shortcodes( $output, $shortcode_str, true, $MASHUP_PREFIX );
        }
        $defaults = array(
            'column_size' => '1/1',
            'mashup_multi_price_table_section_title' => '',
            'price_table_style' => '',
            'mashup_multi_price_col' => '',
            'mashup_var_price_table_sub_title' => '',
            'mashup_var_price_table_element_align' => '',
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
            $price_table_num = count( $atts_content );
        }
        $price_table_element_size = '100';
        foreach ( $defaults as $key => $values ) {
            if ( isset( $atts[$key] ) ) {
                $$key = $atts[$key];
            } else {
                $$key = $values;
            }
        }
        $name = 'mashup_var_page_builder_price_table';
        $coloumn_class = 'column_' . $price_table_element_size;
        if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
            $shortcode_element = 'shortcode_element_class';
            $shortcode_view = 'cs-pbwp-shortcode';
            $filter_element = 'ajax-drag';
            $coloumn_class = '';
        }
        $strings = new mashup_theme_all_strings;
        $strings->mashup_short_code_strings();
        ?>
        <div id="<?php echo mashup_allow_special_char( $name . $mashup_counter ) ?>_del" class="column  parentdelete <?php echo mashup_allow_special_char( $coloumn_class ); ?> <?php echo mashup_allow_special_char( $shortcode_view ); ?>" item="price_table" data="<?php echo mashup_element_size_data_array_index( $price_table_element_size ) ?>" >
            <?php mashup_element_setting( $name, $mashup_counter, $price_table_element_size, '', 'comments-o', $type = '' ); ?>
            <div class="cs-wrapp-class-<?php echo mashup_allow_special_char( $mashup_counter ) ?> <?php echo mashup_allow_special_char( $shortcode_element ); ?>" id="<?php echo mashup_allow_special_char( $name . $mashup_counter ) ?>" style="display: none;">
                <div class="cs-heading-area">
                    <h5><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_price_table_edit_option' ) ); ?></h5>
                    <a href="javascript:mashup_frame_removeoverlay('<?php echo mashup_allow_special_char( $name . $mashup_counter ) ?>','<?php echo mashup_allow_special_char( $filter_element ); ?>')" class="cs-btnclose"><i class="icon-cancel"></i></a>
                </div>
                <div class="cs-clone-append cs-pbwp-content">
                    <div class="cs-wrapp-tab-box">
                        <div id="shortcode-item-<?php echo mashup_allow_special_char( $mashup_counter ); ?>" data-shortcode-template="{{child_shortcode}} [/mashup_price_table]" data-shortcode-child-template="[price_table_item {{attributes}}] {{content}} [/price_table_item]">
                            <div class="cs-wrapp-clone cs-shortcode-wrapp cs-disable-true cs-pbwp-content" data-template="[mashup_price_table {{attributes}}]">
                                <?php
                                if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
                                    mashup_shortcode_element_size();
                                }
                                $mashup_price_table_style = isset( $mashup_price_table_style ) ? $mashup_price_table_style : '';

                                $mashup_opt_array = array(
                                    'name' => mashup_var_theme_text_srt( 'mashup_var_element_title' ),
                                    'desc' => '',
                                    'hint_text' => mashup_var_theme_text_srt( 'mashup_var_element_title_hint' ),
                                    'echo' => true,
                                    'field_params' => array(
                                        'std' => esc_attr( $mashup_multi_price_table_section_title ),
                                        'id' => 'mashup_multi_price_table_section_title',
                                        'cust_name' => 'mashup_multi_price_table_section_title[]',
                                        'classes' => '',
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
                                        'std' => esc_attr( $mashup_var_price_table_sub_title ),
                                        'cust_id' => '',
                                        'cust_name' => 'mashup_var_price_table_sub_title[]',
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
                                        'std' => $mashup_var_price_table_element_align,
                                        'id' => '',
                                        'cust_id' => '',
                                        'cust_name' => 'mashup_var_price_table_element_align[]',
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
                                    'name' => mashup_var_theme_text_srt( 'mashup_var_price_plan_style' ),
                                    'desc' => '',
                                    'hint_text' => mashup_var_theme_text_srt( 'mashup_var_price_plan_style_hint' ),
                                    'echo' => true,
                                    'field_params' => array(
                                        'std' => $price_table_style,
                                        'id' => '',
                                        'cust_name' => 'price_table_style[]',
                                        'classes' => 'dropdown chosen-select',
                                        'options' => array(
                                            'simple' => mashup_var_theme_text_srt( 'mashup_var_price_plan_style_classic' ),
                                            'classic' => mashup_var_theme_text_srt( 'mashup_var_price_plan_style_modren' ),
                                        ),
                                        'return' => true,
                                    ),
                                );

                                $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
                                ?>
                                <?php
                                $mashup_opt_array = array(
                                    'name' => mashup_var_theme_text_srt( 'mashup_var_accordian_select_col' ),
                                    'desc' => '',
                                    'hint_text' => mashup_var_theme_text_srt( 'mashup_var_accordian_select_col_hint' ),
                                    'echo' => true,
                                    'field_params' => array(
                                        'std' => esc_html( $mashup_multi_price_col ),
                                        'cust_id' => 'mashup_multi_price_col',
                                        'cust_name' => 'mashup_multi_price_col[]',
                                        'classes' => 'dropdown chosen-select',
                                        'options' => array(
                                            '1' => mashup_var_theme_text_srt( 'mashup_var_accordian_one_column' ),
                                            '2' => mashup_var_theme_text_srt( 'mashup_var_accordian_two_column' ),
                                            '3' => mashup_var_theme_text_srt( 'mashup_var_accordian_three_column' ),
                                            '4' => mashup_var_theme_text_srt( 'mashup_var_accordian_four_column' ),
                                            '6' => mashup_var_theme_text_srt( 'mashup_var_accordian_six_column' ),
                                        ),
                                        'return' => true,
                                    ),
                                );
                                $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
                                ?>

                            </div>
                            <?php
                            if ( isset( $price_table_num ) && $price_table_num <> '' && isset( $atts_content ) && is_array( $atts_content ) ) {
                                foreach ( $atts_content as $price_table ) {
                                    $rand_string = rand( 1234, 7894563 );
                                    $mashup_var_price_table_text = $price_table['content'];

                                    $defaults = array(
                                        'multi_pricetable_price' => '',
                                        'multi_price_table_text' => '',
                                        'multi_price_table_title_color' => '',
                                        'multi_price_table_currency' => '$',
                                        'multi_price_table_time_duration' => '',
                                        'multi_price_table_button_text' => 'Sign Up',
                                        'pricing_detail' => '',
                                        'pricetable_featured' => '',
                                        'multi_price_table_button_color' => '',
                                        'multi_price_table_button_color_bg' => '',
                                        'multi_price_table_button_column_color' => '',
                                        'multi_price_table_column_bgcolor' => '',
                                        'button_link' => ''
                                    );
                                    foreach ( $defaults as $key => $values ) {
                                        if ( isset( $price_table['atts'][$key] ) ) {
                                            $$key = $price_table['atts'][$key];
                                        } else {
                                            $$key = $values;
                                        }
                                    }
                                    ?>
                                    <div class='cs-wrapp-clone cs-shortcode-wrapp cs-pbwp-content' id="mashup_infobox_<?php echo mashup_allow_special_char( $rand_string ); ?>">
                                        <header>
                                            <h4><i class='icon-arrows'></i><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_price_table_sc' ) ); ?></h4>
                                            <a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_remove' ) ); ?></a>
                                        </header>
                                        <?php
                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt( 'mashup_var_price_table_title' ),
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_price_table_title_hint' ),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => esc_attr( $multi_price_table_text ),
                                                'id' => 'multi_price_table_text',
                                                'cust_name' => 'multi_price_table_text[]',
                                                'classes' => '',
                                                'return' => true,
                                            ),
                                        );
                                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt( 'mashup_var_price_table_price_color' ),
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_price_table_price_color_hint' ),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => esc_html( $multi_price_table_title_color ),
                                                'id' => 'multi_price_table_title_color',
                                                'cust_name' => 'multi_price_table_title_color[]',
                                                'classes' => 'bg_color',
                                                'return' => true,
                                            ),
                                        );

                                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt( 'mashup_var_price_table_price' ),
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_price_table_price_hint' ),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => esc_attr( $multi_pricetable_price ),
                                                'id' => 'multi_pricetable_price',
                                                'cust_name' => 'multi_pricetable_price[]',
                                                'classes' => 'txtfield',
                                                'return' => true,
                                            ),
                                        );
                                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt( 'mashup_var_price_table_currency' ),
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_price_table_currency_hint' ),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => esc_attr( $multi_price_table_currency ),
                                                'id' => 'multi_price_table_currency',
                                                'cust_name' => 'multi_price_table_currency[]',
                                                'classes' => 'txtfield  input-small',
                                                'return' => true,
                                            ),
                                        );
                                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt( 'mashup_var_price_table_time' ),
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_price_table_time_hint' ),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => esc_attr( $multi_price_table_time_duration ),
                                                'id' => 'multi_price_table_time_duration',
                                                'cust_name' => 'multi_price_table_time_duration[]',
                                                'classes' => 'txtfield  input-small',
                                                'return' => true,
                                            ),
                                        );
                                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt( 'mashup_var_price_table_button_link' ),
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_price_table_button_link_hint' ),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => esc_url( $button_link ),
                                                'id' => 'button_link',
                                                'cust_name' => 'button_link[]',
                                                'classes' => 'txtfield  input-small',
                                                'return' => true,
                                            ),
                                        );
                                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt( 'mashup_var_price_table_button_text' ),
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_price_table_button_text_hint' ),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => esc_html( $multi_price_table_button_text ),
                                                'id' => 'multi_price_table_button_text',
                                                'cust_name' => 'multi_price_table_button_text[]',
                                                'classes' => 'txtfield  input-small',
                                                'return' => true,
                                            ),
                                        );
                                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt( 'mashup_var_price_table_button_color' ),
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_price_table_button_color_hint' ),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => esc_html( $multi_price_table_button_color ),
                                                'id' => 'multi_price_table_button_color',
                                                'cust_name' => 'multi_price_table_button_color[]',
                                                'classes' => 'bg_color',
                                                'return' => true,
                                            ),
                                        );

                                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );


                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt( 'mashup_var_price_table_button_bg_color' ),
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_price_table_button_bg_color_hint' ),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => esc_html( $multi_price_table_button_color_bg ),
                                                'id' => 'multi_price_table_button_color_bg',
                                                'cust_name' => 'multi_price_table_button_color_bg[]',
                                                'classes' => 'bg_color',
                                                'return' => true,
                                            ),
                                        );

                                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );



                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt( 'mashup_var_price_table_featured' ),
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_price_table_featured_hint' ),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => $pricetable_featured,
                                                'id' => '',
                                                'cust_name' => 'pricetable_featured[]',
                                                'classes' => 'dropdown chosen-select',
                                                'options' => array(
                                                    'Yes' => mashup_var_theme_text_srt( 'mashup_var_yes' ),
                                                    'No' => mashup_var_theme_text_srt( 'mashup_var_no' ),
                                                ),
                                                'return' => true,
                                            ),
                                        );

                                        $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );

                                        $mashup_opt_array = array(
                                            'name' => mashup_var_frame_text_srt( 'mashup_var_price_table_description' ),
                                            'desc' => '',
                                            'hint_text' => mashup_var_frame_text_srt( 'mashup_var_price_table_description_hint' ),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => esc_attr( $mashup_var_price_table_text ),
                                                'cust_id' => '',
                                                'cust_name' => 'mashup_var_price_table_text[]',
                                                'return' => true,
                                                'extra_atr' => 'data-content-text="cs-shortcode-textarea"',
                                                'classes' => '',
                                                'mashup_editor' => true,
                                            ),
                                        );

                                        $mashup_var_html_fields->mashup_var_textarea_field( $mashup_opt_array );


                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt( 'mashup_var_price_table_column_color' ),
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_price_table_column_color_hint' ),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => esc_attr( $multi_price_table_column_bgcolor ),
                                                'id' => 'multi_price_table_column_bgcolor',
                                                'cust_name' => 'multi_price_table_column_bgcolor[]',
                                                'classes' => 'bg_color',
                                                'return' => true,
                                            ),
                                        );

                                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
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
                                'std' => mashup_allow_special_char( $price_table_num ),
                                'id' => '',
                                'before' => '',
                                'after' => '',
                                'classes' => 'fieldCounter',
                                'extra_atr' => '',
                                'cust_id' => '',
                                'cust_name' => 'price_table_num[]',
                                'return' => true,
                                'required' => false
                            );
                            echo mashup_allow_special_char( $mashup_var_form_fields->mashup_var_form_hidden_render( $mashup_opt_array ) );
                            ?>

                        </div>
                        <div class="wrapptabbox cs-pbwp-content cs-zero-padding">
                            <div class="opt-conts">
                                <ul class="form-elements">
                                    <li class="to-field"> <a href="javascript:void(0);" class="add_servicesss cs-main-btn" onclick="mashup_shortcode_element_ajax_call('price_table', 'shortcode-item-<?php echo mashup_allow_special_char( $mashup_counter ); ?>', '<?php echo admin_url( 'admin-ajax.php' ); ?>')"><i class="icon-plus-circle"></i><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_price_table_add' ) ); ?></a> </li>
                                    <div id="loading" class="shortcodeload"></div>
                                </ul>
                                <?php if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) { ?>
                                    <ul class="form-elements insert-bg noborder">
                                        <li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:mashup_shortcode_insert_editor('<?php echo str_replace( 'mashup_var_page_builder_', '', $name ); ?>', 'shortcode-item-<?php echo mashup_allow_special_char( $mashup_counter ); ?>', '<?php echo mashup_allow_special_char( $filter_element ); ?>')" ><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_insert' ) ); ?></a> </li>
                                    </ul>
                                    <div id="results-shortocde"></div>
                                    <?php
                                } else {
                                    $mashup_opt_array = array(
                                        'std' => 'price_table',
                                        'id' => '',
                                        'before' => '',
                                        'after' => '',
                                        'classes' => '',
                                        'extra_atr' => '',
                                        'cust_id' => 'mashup_orderby' . $mashup_counter,
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
                                            'cust_id' => 'price_table_save' . $mashup_counter,
                                            'cust_type' => 'button',
                                            'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
                                            'classes' => 'cs-mashup-admin-btn',
                                            'cust_name' => 'price_table_save',
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

    add_action( 'wp_ajax_mashup_var_page_builder_price_table', 'mashup_var_page_builder_price_table' );
}

if ( ! function_exists( 'mashup_save_page_builder_data_price_table_callback' ) ) {

    /**
     * Save data for price table shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_price_table_callback( $args ) {

        $data = $args['data'];
        $counters = $args['counters'];
        $widget_type = $args['widget_type'];
        $column = $args['column'];
        if ( $widget_type == "price_table" ) {

            $shortcode = $shortcode_item = '';

            $price_table = $column->addChild( 'price_table' );
            $price_table->addChild( 'page_element_size', htmlspecialchars( $data['price_table_element_size'][$counters['mashup_global_counter_price_table']] ) );
            $price_table->addChild( 'price_table_element_size', htmlspecialchars( $data['price_table_element_size'][$counters['mashup_global_counter_price_table']] ) );
            if ( isset( $data['mashup_widget_element_num'][$counters['mashup_counter']] ) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode' ) {
                $shortcode_str = stripslashes( $data['shortcode']['price_table'][$counters['mashup_shortcode_counter_price_table']] );
                $counters['mashup_shortcode_counter_price_table'] ++;
                $price_table->addChild( 'mashup_shortcode', htmlspecialchars( $shortcode_str, ENT_QUOTES ) );
            } else {
                if ( isset( $data['price_table_num'][$counters['mashup_counter_price_table']] ) && $data['price_table_num'][$counters['mashup_counter_price_table']] > 0 ) {
                    for ( $i = 1; $i <= $data['price_table_num'][$counters['mashup_counter_price_table']]; $i ++ ) {
                        $shortcode_item .= '[price_table_item ';
                        if ( isset( $data['multi_price_table_text'][$counters['mashup_counter_price_table_node']] ) && $data['multi_price_table_text'][$counters['mashup_counter_price_table_node']] != '' ) {
                            $shortcode_item .= 'multi_price_table_text="' . htmlspecialchars( $data['multi_price_table_text'][$counters['mashup_counter_price_table_node']], ENT_QUOTES ) . '" ';
                        }
                        if ( isset( $data['multi_price_table_title_color'][$counters['mashup_counter_price_table_node']] ) && $data['multi_price_table_title_color'][$counters['mashup_counter_price_table_node']] != '' ) {
                            $shortcode_item .= 'multi_price_table_title_color="' . htmlspecialchars( $data['multi_price_table_title_color'][$counters['mashup_counter_price_table_node']], ENT_QUOTES ) . '" ';
                        }
                        if ( isset( $data['multi_pricetable_price'][$counters['mashup_counter_price_table_node']] ) && $data['multi_pricetable_price'][$counters['mashup_counter_price_table_node']] != '' ) {
                            $shortcode_item .= 'multi_pricetable_price="' . htmlspecialchars( $data['multi_pricetable_price'][$counters['mashup_counter_price_table_node']], ENT_QUOTES ) . '" ';
                        }

                        if ( isset( $data['multi_price_table_currency'][$counters['mashup_counter_price_table_node']] ) && $data['multi_price_table_currency'][$counters['mashup_counter_price_table_node']] != '' ) {
                            $shortcode_item .= 'multi_price_table_currency="' . htmlspecialchars( $data['multi_price_table_currency'][$counters['mashup_counter_price_table_node']], ENT_QUOTES ) . '" ';
                        }
                        if ( isset( $data['multi_price_table_time_duration'][$counters['mashup_counter_price_table_node']] ) && $data['multi_price_table_time_duration'][$counters['mashup_counter_price_table_node']] != '' ) {
                            $shortcode_item .= 'multi_price_table_time_duration="' . htmlspecialchars( $data['multi_price_table_time_duration'][$counters['mashup_counter_price_table_node']], ENT_QUOTES ) . '" ';
                        }
                        if ( isset( $data['button_link'][$counters['mashup_counter_price_table_node']] ) && $data['button_link'][$counters['mashup_counter_price_table_node']] != '' ) {
                            $shortcode_item .= 'button_link="' . htmlspecialchars( $data['button_link'][$counters['mashup_counter_price_table_node']], ENT_QUOTES ) . '" ';
                        }
                        if ( isset( $data['multi_price_table_button_text'][$counters['mashup_counter_price_table_node']] ) && $data['multi_price_table_button_text'][$counters['mashup_counter_price_table_node']] != '' ) {
                            $shortcode_item .= 'multi_price_table_button_text="' . htmlspecialchars( $data['multi_price_table_button_text'][$counters['mashup_counter_price_table_node']], ENT_QUOTES ) . '" ';
                        }
                        if ( isset( $data['multi_price_table_button_color'][$counters['mashup_counter_price_table_node']] ) && $data['multi_price_table_button_color'][$counters['mashup_counter_price_table_node']] != '' ) {
                            $shortcode_item .= 'multi_price_table_button_color="' . htmlspecialchars( $data['multi_price_table_button_color'][$counters['mashup_counter_price_table_node']], ENT_QUOTES ) . '" ';
                        }
                        if ( isset( $data['multi_price_table_button_color_bg'][$counters['mashup_counter_price_table_node']] ) && $data['multi_price_table_button_color_bg'][$counters['mashup_counter_price_table_node']] != '' ) {
                            $shortcode_item .= 'multi_price_table_button_color_bg="' . htmlspecialchars( $data['multi_price_table_button_color_bg'][$counters['mashup_counter_price_table_node']], ENT_QUOTES ) . '" ';
                        }
                        if ( isset( $data['pricetable_featured'][$counters['mashup_counter_price_table_node']] ) && $data['pricetable_featured'][$counters['mashup_counter_price_table_node']] != '' ) {
                            $shortcode_item .= 'pricetable_featured="' . htmlspecialchars( $data['pricetable_featured'][$counters['mashup_counter_price_table_node']], ENT_QUOTES ) . '" ';
                        }
                        if ( isset( $data['multi_price_table_column_bgcolor'][$counters['mashup_counter_price_table_node']] ) && $data['multi_price_table_column_bgcolor'][$counters['mashup_counter_price_table_node']] != '' ) {
                            $shortcode_item .= 'multi_price_table_column_bgcolor="' . htmlspecialchars( $data['multi_price_table_column_bgcolor'][$counters['mashup_counter_price_table_node']], ENT_QUOTES ) . '" ';
                        }
                        $shortcode_item .= ']';
                        if ( isset( $data['mashup_var_price_table_text'][$counters['mashup_counter_price_table_node']] ) && $data['mashup_var_price_table_text'][$counters['mashup_counter_price_table_node']] != '' ) {
                            $shortcode_item .= htmlspecialchars( $data['mashup_var_price_table_text'][$counters['mashup_counter_price_table_node']], ENT_QUOTES );
                        }
                        $shortcode_item .= '[/price_table_item]';
                        $counters['mashup_counter_price_table_node'] ++;
                    }
                }
                $section_title = '';
                if ( isset( $data['mashup_multi_price_table_section_title'][$counters['mashup_counter_price_table']] ) && $data['mashup_multi_price_table_section_title'][$counters['mashup_counter_price_table']] != '' ) {
                    $section_title .= 'mashup_multi_price_table_section_title="' . htmlspecialchars( $data['mashup_multi_price_table_section_title'][$counters['mashup_counter_price_table']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_price_table_sub_title'][$counters['mashup_counter_price_table']] ) && $data['mashup_var_price_table_sub_title'][$counters['mashup_counter_price_table']] != '' ) {
                    $section_title .= 'mashup_var_price_table_sub_title="' . htmlspecialchars( $data['mashup_var_price_table_sub_title'][$counters['mashup_counter_price_table']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_price_table_element_align'][$counters['mashup_counter_price_table']] ) && $data['mashup_var_price_table_element_align'][$counters['mashup_counter_price_table']] != '' ) {
                    $section_title .= 'mashup_var_price_table_element_align="' . htmlspecialchars( $data['mashup_var_price_table_element_align'][$counters['mashup_counter_price_table']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['price_table_style'][$counters['mashup_counter_price_table']] ) && $data['price_table_style'][$counters['mashup_counter_price_table']] != '' ) {
                    $section_title .= 'price_table_style="' . htmlspecialchars( $data['price_table_style'][$counters['mashup_counter_price_table']], ENT_QUOTES ) . '" ';
                }

                if ( isset( $data['mashup_multi_price_col'][$counters['mashup_counter_price_table']] ) && $data['mashup_multi_price_col'][$counters['mashup_counter_price_table']] != '' ) {
                    $section_title .= 'mashup_multi_price_col="' . htmlspecialchars( $data['mashup_multi_price_col'][$counters['mashup_counter_price_table']], ENT_QUOTES ) . '" ';
                }
                $shortcode = '[mashup_price_table ' . $section_title . ' ]' . $shortcode_item . '[/mashup_price_table]';
                $price_table->addChild( 'mashup_shortcode', $shortcode );
                $counters['mashup_counter_price_table'] ++;
            }
            $counters['mashup_global_counter_price_table'] ++;
        }
        return array(
            'data' => $data,
            'counters' => $counters,
            'widget_type' => $widget_type,
            'column' => $column,
        );
    }

    add_filter( 'mashup_save_page_builder_data', 'mashup_save_page_builder_data_price_table_callback' );
}

if ( ! function_exists( 'mashup_load_shortcode_counters_price_table_callback' ) ) {

    /**
     * Populate price table shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_price_table_callback( $counters ) {
        $counters['mashup_counter_price_table'] = 0;
        $counters['mashup_counter_price_table_node'] = 0;
        $counters['mashup_shortcode_counter_price_table'] = 0;
        $counters['mashup_global_counter_price_table'] = 0;
        return $counters;
    }

    add_filter( 'mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_price_table_callback' );
}

if ( ! function_exists( 'mashup_shortcode_names_list_populate_price_table_callback' ) ) {

    /**
     * Populate price table shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_price_table_callback( $shortcode_array ) {
        $shortcode_array['price_table'] = array(
            'title' => mashup_var_frame_text_srt( 'mashup_var_price_plan' ),
            'name' => 'price_table',
            'icon' => 'icon-briefcase',
            'categories' => 'contentblocks',
        );
        return $shortcode_array;
    }

    add_filter( 'mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_price_table_callback' );
}

if ( ! function_exists( 'mashup_element_list_populate_price_table_callback' ) ) {

    /**
     * Populate price table shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_price_table_callback( $element_list ) {
        $element_list['price_table'] = mashup_var_frame_text_srt( 'mashup_var_price_plan' );
        return $element_list;
    }

    add_filter( 'mashup_element_list_populate', 'mashup_element_list_populate_price_table_callback' );
}

if ( ! function_exists( 'mashup_shortcode_sub_element_ui_price_table_callback' ) ) {

    /**
     * Render UI for sub element in price table settings.
     *
     * @param	array $args
     */
    function mashup_shortcode_sub_element_ui_price_table_callback( $args ) {
        $type = $args['type'];
        $mashup_var_html_fields = $args['html_fields'];

        if ( $type == 'price_table' ) {

            $rand_id = rand( 1234, 7894563 );
            ?>
            <div class='cs-wrapp-clone cs-shortcode-wrapp cs-pbwp-content'  id="mashup_infobox_<?php echo intval( $rand_id ); ?>">
                <header>
                    <h4><i class='icon-arrows'></i><?php echo esc_html( mashup_var_frame_text_srt( 'mashup_var_price_plan' ) ); ?></h4>
                    <a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo esc_html( mashup_var_frame_text_srt( 'mashup_var_remove' ) ); ?></a>
                </header>
                <?php
                $mashup_opt_array = array(
                    'name' => mashup_var_frame_text_srt( 'mashup_var_price_table_title' ),
                    'desc' => '',
                    'hint_text' => mashup_var_frame_text_srt( 'mashup_var_price_table_title_hint' ),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'multi_price_table_text',
                        'cust_name' => 'multi_price_table_text[]',
                        'classes' => '',
                        'return' => true,
                    ),
                );
                $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                $mashup_opt_array = array(
                    'name' => mashup_var_frame_text_srt( 'mashup_var_price_table_price_color' ),
                    'desc' => '',
                    'hint_text' => mashup_var_frame_text_srt( 'mashup_var_price_table_price_color_hint' ),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'multi_price_table_title_color',
                        'cust_name' => 'multi_price_table_title_color[]',
                        'classes' => 'bg_color',
                        'return' => true,
                    ),
                );

                $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                $mashup_opt_array = array(
                    'name' => mashup_var_frame_text_srt( 'mashup_var_price_table_price' ),
                    'desc' => '',
                    'hint_text' => mashup_var_frame_text_srt( 'mashup_var_price_table_price_hint' ),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'multi_pricetable_price',
                        'cust_name' => 'multi_pricetable_price[]',
                        'classes' => 'txtfield',
                        'return' => true,
                    ),
                );
                $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                $mashup_opt_array = array(
                    'name' => mashup_var_frame_text_srt( 'mashup_var_price_table_currency' ),
                    'desc' => '',
                    'hint_text' => mashup_var_frame_text_srt( 'mashup_var_price_table_currency_hint' ),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'multi_price_table_currency',
                        'cust_name' => 'multi_price_table_currency[]',
                        'classes' => 'txtfield  input-small',
                        'return' => true,
                    ),
                );
                $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                $mashup_opt_array = array(
                    'name' => mashup_var_frame_text_srt( 'mashup_var_price_table_time' ),
                    'desc' => '',
                    'hint_text' => mashup_var_frame_text_srt( 'mashup_var_price_table_time_hint' ),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'multi_price_table_time_duration',
                        'cust_name' => 'multi_price_table_time_duration[]',
                        'classes' => 'txtfield  input-small',
                        'return' => true,
                    ),
                );
                $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                $mashup_opt_array = array(
                    'name' => mashup_var_frame_text_srt( 'mashup_var_price_table_button_link' ),
                    'desc' => '',
                    'hint_text' => mashup_var_frame_text_srt( 'mashup_var_price_table_button_link_hint' ),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'button_link',
                        'cust_name' => 'button_link[]',
                        'classes' => 'txtfield  input-small',
                        'return' => true,
                    ),
                );
                $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                $mashup_opt_array = array(
                    'name' => mashup_var_frame_text_srt( 'mashup_var_price_table_button_text' ),
                    'desc' => '',
                    'hint_text' => mashup_var_frame_text_srt( 'mashup_var_price_table_button_text_hint' ),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'multi_price_table_button_text',
                        'cust_name' => 'multi_price_table_button_text[]',
                        'classes' => 'txtfield  input-small',
                        'return' => true,
                    ),
                );
                $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                $mashup_opt_array = array(
                    'name' => mashup_var_frame_text_srt( 'mashup_var_price_table_button_color' ),
                    'desc' => '',
                    'hint_text' => mashup_var_frame_text_srt( 'mashup_var_price_table_button_color_hint' ),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'multi_price_table_button_color',
                        'cust_name' => 'multi_price_table_button_color[]',
                        'classes' => 'bg_color',
                        'return' => true,
                    ),
                );

                $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );


                $mashup_opt_array = array(
                    'name' => mashup_var_frame_text_srt( 'mashup_var_price_table_button_bg_color' ),
                    'desc' => '',
                    'hint_text' => mashup_var_frame_text_srt( 'mashup_var_price_table_button_bg_color_hint' ),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'multi_price_table_button_color_bg',
                        'cust_name' => 'multi_price_table_button_color_bg[]',
                        'classes' => 'bg_color',
                        'return' => true,
                    ),
                );

                $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );



                $mashup_opt_array = array(
                    'name' => mashup_var_frame_text_srt( 'mashup_var_price_table_featured' ),
                    'desc' => '',
                    'hint_text' => mashup_var_frame_text_srt( 'mashup_var_price_table_featured_hint' ),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => '',
                        'cust_name' => 'pricetable_featured[]',
                        'classes' => 'dropdown chosen-select',
                        'options' => array(
                            'Yes' => mashup_var_frame_text_srt( 'mashup_var_yes' ),
                            'No' => mashup_var_frame_text_srt( 'mashup_var_no' ),
                        ),
                        'return' => true,
                    ),
                );

                $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );

                $mashup_opt_array = array(
                    'name' => mashup_var_frame_text_srt( 'mashup_var_price_table_description' ),
                    'desc' => '',
                    'hint_text' => mashup_var_frame_text_srt( 'mashup_var_price_table_description_hint' ),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'cust_id' => '',
                        'cust_name' => 'mashup_var_price_table_text[]',
                        'return' => true,
                        'extra_atr' => 'data-content-text="cs-shortcode-textarea"',
                        'classes' => '',
                        'mashup_editor' => true,
                    ),
                );

                $mashup_var_html_fields->mashup_var_textarea_field( $mashup_opt_array );

                $mashup_opt_array = array(
                    'name' => mashup_var_frame_text_srt( 'mashup_var_price_table_column_color' ),
                    'desc' => '',
                    'hint_text' => mashup_var_frame_text_srt( 'mashup_var_price_table_column_color_hint' ),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'multi_price_table_column_bgcolor',
                        'cust_name' => 'multi_price_table_column_bgcolor[]',
                        'classes' => 'bg_color',
                        'return' => true,
                    ),
                );

                $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                ?>

            </div>
            <?php
        }
    }

    add_action( 'mashup_shortcode_sub_element_ui', 'mashup_shortcode_sub_element_ui_price_table_callback' );
}
