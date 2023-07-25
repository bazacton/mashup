<?php
/*
 *
 * @File : Call to action
 * @retrun
 *
 */

if ( ! function_exists( 'mashup_var_page_builder_call_to_action' ) ) {

    function mashup_var_page_builder_call_to_action( $die = 0 ) {

        global $post, $mashup_node, $mashup_var_html_fields, $mashup_var_form_fields, $mashup_var_static_text;

        $shortcode_element = '';
        $filter_element = 'filterdrag';
        $shortcode_view = '';
        $output = array();
        $MASHUP_BARBER_PREFIX = 'call_to_action';
        $mashup_counter = isset( $_POST['counter'] ) ? $_POST['counter'] : '';
        $parseObject = new ShortcodeParse();
        if ( isset( $_POST['action'] ) && ! isset( $_POST['shortcode_element_id'] ) ) {
            $MASHUP_POSTID = '';
            $shortcode_element_id = '';
        } else {
            $MASHUP_POSTID = $_POST['POSTID'];
            $shortcode_element_id = $_POST['shortcode_element_id'];
            $mashup_var_shortcode_str = stripslashes( $shortcode_element_id );
            $output = $parseObject->mashup_shortcodes( $output, $mashup_var_shortcode_str, true, $MASHUP_BARBER_PREFIX );
        }
        $defaults = array(
            'mashup_var_column_size' => '',
            'mashup_var_call_to_action_title' => '',
            'mashup_var_call_to_action_sub_title' => '',
            'mashup_var_call_to_action_align' => '',
            'mashup_var_call_action_subtitle' => '',
            'mashup_var_heading_color' => '#000',
            'mashup_var_icon_color' => '#FFF',
            'mashup_var_call_to_action_icon_background_color' => '',
            'mashup_var_call_to_action_button_text' => '',
            'mashup_var_call_to_action_button_link' => '#',
            'mashup_var_call_to_action_bg_img' => '',
            'mashup_var_contents_bg_color' => '',
            'mashup_var_call_to_action_img_array' => '',
            'mashup_var_call_action_text_align' => '',
            'mashup_var_call_to_action_class' => '',
            'mashup_var_call_action_img_align' => '',
            'mashup_var_button_bg_color' => '',
            'mashup_var_button_border_color' => ''
        );
        if ( isset( $output['0']['atts'] ) ) {
            $atts = $output['0']['atts'];
        } else {
            $atts = array();
        }
        if ( isset( $output['0']['content'] ) )
            $atts_content = $output['0']['content'];
        else
            $atts_content = "";
        $call_to_action_element_size = '100';
        foreach ( $defaults as $key => $values ) {
            if ( isset( $atts[$key] ) ) {
                $$key = $atts[$key];
            } else {
                $$key = $values;
            }
        }


        $name = 'mashup_var_page_builder_call_to_action';
        $coloumn_class = 'column_' . $call_to_action_element_size;

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
             <?php echo esc_attr( $shortcode_view ); ?>" item="call_to_action" data="<?php echo mashup_element_size_data_array_index( $call_to_action_element_size ) ?>" >
                 <?php mashup_element_setting( $name, $mashup_counter, $call_to_action_element_size ) ?>
            <div class="cs-wrapp-class-<?php echo intval( $mashup_counter ) ?>
                 <?php echo esc_attr( $shortcode_element ); ?>" id="<?php echo esc_attr( $name . $mashup_counter ) ?>" data-shortcode-template="[call_to_action {{attributes}}]{{content}}[/call_to_action]" style="display: none;">
                <div class="cs-heading-area" data-counter="<?php echo esc_attr( $mashup_counter ) ?>">
                    <h5><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_call_to_action_edit' ) ); ?></h5>
                    <a href="javascript:mashup_frame_removeoverlay('<?php echo esc_js( $name . $mashup_counter ) ?>','<?php echo esc_js( $filter_element ); ?>')" class="cs-btnclose">
                        <i class="icon-cancel"></i>
                    </a>
                </div> 
                <div class="cs-pbwp-content">
                    <div class="cs-wrapp-clone cs-shortcode-wrapp cs-pbwp-content">
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
                                'std' => mashup_allow_special_char( $mashup_var_call_to_action_title ),
                                'cust_id' => '',
                                'classes' => 'txtfield',
                                'cust_name' => 'mashup_var_call_to_action_title[]',
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
                                'std' => mashup_allow_special_char( $mashup_var_call_to_action_sub_title ),
                                'id' => 'mashup_var_call_to_action_sub_title',
                                'cust_name' => 'mashup_var_call_to_action_sub_title[]',
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
                                'std' => $mashup_var_call_to_action_align,
                                'id' => '',
                                'cust_id' => '',
                                'cust_name' => 'mashup_var_call_to_action_align[]',
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
                            'name' => mashup_var_theme_text_srt( 'mashup_var_title' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_title_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => mashup_allow_special_char( $mashup_var_call_action_subtitle ),
                                'cust_id' => '',
                                'classes' => 'txtfield',
                                'cust_name' => 'mashup_var_call_action_subtitle[]',
                                'return' => true,
                            ),
                        );

                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_title_color' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_title_color_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => esc_attr( $mashup_var_heading_color ),
                                'cust_id' => '',
                                'classes' => 'bg_color',
                                'cust_name' => 'mashup_var_heading_color[]',
                                'return' => true,
                            ),
                        );

                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                        ?>

                        <?php
                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_short_text' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_short_text_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => esc_textarea( $atts_content ),
                                'cust_id' => 'atts_content' . $mashup_counter,
                                'classes' => '',
                                'cust_name' => 'atts_content[]',
                                'return' => true,
                                'extra_atr' => 'data-content-text="cs-shortcode-textarea"',
                                'mashup_editor' => true,
                            ),
                        );

                        $mashup_var_html_fields->mashup_var_textarea_field( $mashup_opt_array );
                        ?>

                        <?php
                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_bgcolor' ),
                            'desc' => '',
                            'id' => 'call_to_action_id',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_bg_color_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => esc_attr( $mashup_var_contents_bg_color ),
                                'cust_id' => '',
                                'classes' => 'bg_color',
                                'cust_name' => 'mashup_var_contents_bg_color[]',
                                'return' => true,
                            ),
                        );

                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                        ?>
                        <?php
                        $mashup_opt_array = array(
                            'std' => $mashup_var_call_to_action_img_array,
                            'id' => 'call_to_action_img',
                            'main_id' => 'call_to_action_img_id',
                            'name' => mashup_var_theme_text_srt( 'mashup_var_background_image' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_theme_option_bg_image_hint' ),
                            'echo' => true,
                            'array' => true,
                            'field_params' => array(
                                'std' => $mashup_var_call_to_action_img_array,
                                'cust_id' => '',
                                'id' => 'call_to_action_img',
                                'return' => true,
                                'array' => true,
                                'array_txt' => false,
                            ),
                        );
                        $mashup_var_html_fields->mashup_var_upload_file_field( $mashup_opt_array );
                        ?>
                        <?php
                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_image_position' ),
                            'desc' => '',
                            'hint_text' => '',
                            'echo' => true,
                            'field_params' => array(
                                'std' => $mashup_var_call_action_img_align,
                                'cust_id' => '',
                                'classes' => 'dropdown chosen-select',
                                'cust_name' => 'mashup_var_call_action_img_align[]',
                                'options' => array( "no-repeat center top" => mashup_var_theme_text_srt( 'mashup_var_no_repeat_center_top' ),
                                    "repeat center top" => mashup_var_theme_text_srt( 'mashup_var_repeat_center_top' ),
                                    "no-repeat center" => mashup_var_theme_text_srt( 'mashup_var_no_repeat_center' ),
                                    "Repeat Center" => mashup_var_theme_text_srt( 'mashup_var_repeat_center' ),
                                    "no-repeat left top" => mashup_var_theme_text_srt( 'mashup_var_no_repeat_left_top' ),
                                    "repeat left top" => mashup_var_theme_text_srt( 'mashup_var_repeat_left_top' ),
                                    "no-repeat fixed center" => mashup_var_theme_text_srt( 'mashup_var_no_repeat_fixed_center' ),
                                    "no-repeat fixed center / cover" => mashup_var_theme_text_srt( 'mashup_var_no_repeat_fixed_center_cover' )
                                ),
                                'return' => true,
                            ),
                        );

                        $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_call_to_action_button_bg' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_call_to_action_button_bg_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => esc_attr( $mashup_var_button_bg_color ),
                                'cust_id' => '',
                                'classes' => 'bg_color',
                                'cust_name' => 'mashup_var_button_bg_color[]',
                                'return' => true,
                            ),
                        );

                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_call_to_action_button_border' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_call_to_action_button_border_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => esc_attr( $mashup_var_button_border_color ),
                                'cust_id' => '',
                                'classes' => 'bg_color',
                                'cust_name' => 'mashup_var_button_border_color[]',
                                'return' => true,
                            ),
                        );

                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_button_color' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_button_color_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => esc_attr( $mashup_var_call_to_action_icon_background_color ),
                                'cust_id' => '',
                                'classes' => 'bg_color',
                                'cust_name' => 'mashup_var_call_to_action_icon_background_color[]',
                                'return' => true,
                            ),
                        );

                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                        ?>
                        <?php
                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_button_text' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_button_text_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => esc_attr( $mashup_var_call_to_action_button_text ),
                                'cust_id' => '',
                                'classes' => '',
                                'cust_name' => 'mashup_var_call_to_action_button_text[]',
                                'return' => true,
                            ),
                        );

                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_button_link' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_button_link_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => esc_attr( $mashup_var_call_to_action_button_link ),
                                'cust_id' => '',
                                'classes' => '',
                                'cust_name' => 'mashup_var_call_to_action_button_link[]',
                                'return' => true,
                            ),
                        );

                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_text_align' ),
                            'desc' => '',
                            'hint_text' => '',
                            'echo' => true,
                            'field_params' => array(
                                'std' => esc_attr( $mashup_var_call_action_text_align ),
                                'cust_id' => '',
                                'classes' => 'dropdown chosen-select',
                                'cust_name' => 'mashup_var_call_action_text_align[]',
                                'options' => array( 'center' => mashup_var_theme_text_srt( 'mashup_var_center_align' ), 'left' => mashup_var_theme_text_srt( 'mashup_var_left_align' ), 'right' => mashup_var_theme_text_srt( 'mashup_var_right_align' ) ),
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
                            <div id="results-shortocde"></div>
        <?php } else { ?>
                            <?php
                            $mashup_opt_array = array(
                                'std' => 'call_to_action',
                                'id' => '',
                                'before' => '',
                                'after' => '',
                                'classes' => '',
                                'extra_atr' => '',
                                'cust_id' => 'mashup_orderby',
                                'cust_name' => 'mashup_orderby[]',
                                'return' => false,
                                'required' => false
                            );
                            $mashup_var_form_fields->mashup_var_form_hidden_render( $mashup_opt_array );
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
                                    'classes' => 'cs-barber-admin-btn',
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

    add_action( 'wp_ajax_mashup_var_page_builder_call_to_action', 'mashup_var_page_builder_call_to_action' );
}

if ( ! function_exists( 'mashup_save_page_builder_data_call_to_action_callback' ) ) {

    /**
     * Save data for call to action shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_call_to_action_callback( $args ) {

        $data = $args['data'];
        $counters = $args['counters'];
        $widget_type = $args['widget_type'];
        $column = $args['column'];
        if ( $widget_type == "call_to_action" ) {

            $shortcode = '';
            $call_to_action = $column->addChild( 'call_to_action' );
            $call_to_action->addChild( 'page_element_size', htmlspecialchars( $data['call_to_action_element_size'][$counters['mashup_global_counter_call_to_action']] ) );
            $call_to_action->addChild( 'call_to_action_element_size', htmlspecialchars( $data['call_to_action_element_size'][$counters['mashup_global_counter_call_to_action']] ) );
            if ( isset( $data['mashup_widget_element_num'][$counters['mashup_counter']] ) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode' ) {
                $shortcode_str = stripslashes( htmlspecialchars( ( $data['shortcode']['call_to_action'][$counters['mashup_shortcode_counter_call_to_action']] ), ENT_QUOTES ) );
                $counters['mashup_shortcode_counter_call_to_action'] ++;
                $call_to_action->addChild( 'mashup_shortcode', htmlspecialchars( $shortcode_str, ENT_QUOTES ) );
            } else {
                $shortcode = '[call_to_action ';
                if ( isset( $data['mashup_var_call_to_action_title'][$counters['mashup_counter_call_to_action']] ) && $data['mashup_var_call_to_action_title'][$counters['mashup_counter_call_to_action']] != '' ) {
                    $shortcode .= 'mashup_var_call_to_action_title="' . stripslashes( htmlspecialchars( ($data['mashup_var_call_to_action_title'][$counters['mashup_counter_call_to_action']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_call_to_action_sub_title'][$counters['mashup_counter_call_to_action']] ) && $data['mashup_var_call_to_action_sub_title'][$counters['mashup_counter_call_to_action']] != '' ) {
                    $shortcode .= 'mashup_var_call_to_action_sub_title="' . stripslashes( htmlspecialchars( ($data['mashup_var_call_to_action_sub_title'][$counters['mashup_counter_call_to_action']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_call_to_action_align'][$counters['mashup_counter_call_to_action']] ) && $data['mashup_var_call_to_action_align'][$counters['mashup_counter_call_to_action']] != '' ) {
                    $shortcode .= 'mashup_var_call_to_action_align="' . stripslashes( htmlspecialchars( ($data['mashup_var_call_to_action_align'][$counters['mashup_counter_call_to_action']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_call_action_subtitle'][$counters['mashup_counter_call_to_action']] ) && $data['mashup_var_call_action_subtitle'][$counters['mashup_counter_call_to_action']] != '' ) {
                    $shortcode .= 'mashup_var_call_action_subtitle="' . stripslashes( htmlspecialchars( ($data['mashup_var_call_action_subtitle'][$counters['mashup_counter_call_to_action']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_button_bg_color'][$counters['mashup_counter_call_to_action']] ) && $data['mashup_var_button_bg_color'][$counters['mashup_counter_call_to_action']] != '' ) {
                    $shortcode .= 'mashup_var_button_bg_color="' . htmlspecialchars( $data['mashup_var_button_bg_color'][$counters['mashup_counter_call_to_action']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_button_border_color'][$counters['mashup_counter_call_to_action']] ) && $data['mashup_var_button_border_color'][$counters['mashup_counter_call_to_action']] != '' ) {
                    $shortcode .= 'mashup_var_button_border_color="' . htmlspecialchars( $data['mashup_var_button_border_color'][$counters['mashup_counter_call_to_action']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_heading_color'][$counters['mashup_counter_call_to_action']] ) && $data['mashup_var_heading_color'][$counters['mashup_counter_call_to_action']] != '' ) {
                    $shortcode .= 'mashup_var_heading_color="' . stripslashes( htmlspecialchars( ($data['mashup_var_heading_color'][$counters['mashup_counter_call_to_action']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_icon_color'][$counters['mashup_counter_call_to_action']] ) && $data['mashup_var_icon_color'][$counters['mashup_counter_call_to_action']] != '' ) {
                    $shortcode .= 'mashup_var_icon_color="' . stripslashes( htmlspecialchars( ($data['mashup_var_icon_color'][$counters['mashup_counter_call_to_action']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_call_to_action_icon_background_color'][$counters['mashup_counter_call_to_action']] ) && $data['mashup_var_call_to_action_icon_background_color'][$counters['mashup_counter_call_to_action']] != '' ) {
                    $shortcode .= 'mashup_var_call_to_action_icon_background_color="' . stripslashes( htmlspecialchars( ($data['mashup_var_call_to_action_icon_background_color'][$counters['mashup_counter_call_to_action']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_call_to_action_button_text'][$counters['mashup_counter_call_to_action']] ) && $data['mashup_var_call_to_action_button_text'][$counters['mashup_counter_call_to_action']] != '' ) {
                    $shortcode .= 'mashup_var_call_to_action_button_text="' . stripslashes( htmlspecialchars( ($data['mashup_var_call_to_action_button_text'][$counters['mashup_counter_call_to_action']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_call_to_action_button_link'][$counters['mashup_counter_call_to_action']] ) && $data['mashup_var_call_to_action_button_link'][$counters['mashup_counter_call_to_action']] != '' ) {
                    $shortcode .= 'mashup_var_call_to_action_button_link="' . stripslashes( htmlspecialchars( ($data['mashup_var_call_to_action_button_link'][$counters['mashup_counter_call_to_action']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_call_to_action_bg_img'][$counters['mashup_counter_call_to_action']] ) && $data['mashup_var_call_to_action_bg_img'][$counters['mashup_counter_call_to_action']] != '' ) {
                    $shortcode .= 'mashup_var_call_to_action_bg_img="' . stripslashes( htmlspecialchars( ($data['mashup_var_call_to_action_bg_img'][$counters['mashup_counter_call_to_action']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_contents_bg_color'][$counters['mashup_counter_call_to_action']] ) && $data['mashup_var_contents_bg_color'][$counters['mashup_counter_call_to_action']] != '' ) {
                    $shortcode .= 'mashup_var_contents_bg_color="' . stripslashes( htmlspecialchars( ($data['mashup_var_contents_bg_color'][$counters['mashup_counter_call_to_action']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_call_to_action_img_array'][$counters['mashup_counter_call_to_action']] ) && $data['mashup_var_call_to_action_img_array'][$counters['mashup_counter_call_to_action']] != '' ) {
                    $shortcode .= 'mashup_var_call_to_action_img_array="' . stripslashes( htmlspecialchars( ($data['mashup_var_call_to_action_img_array'][$counters['mashup_counter_call_to_action']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_call_action_text_align'][$counters['mashup_counter_call_to_action']] ) && $data['mashup_var_call_action_text_align'][$counters['mashup_counter_call_to_action']] != '' ) {
                    $shortcode .= 'mashup_var_call_action_text_align="' . stripslashes( htmlspecialchars( ($data['mashup_var_call_action_text_align'][$counters['mashup_counter_call_to_action']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_call_to_action_class'][$counters['mashup_counter_call_to_action']] ) && $data['mashup_var_call_to_action_class'][$counters['mashup_counter_call_to_action']] != '' ) {
                    $shortcode .= 'mashup_var_call_to_action_class="' . stripslashes( htmlspecialchars( ($data['mashup_var_call_to_action_class'][$counters['mashup_counter_call_to_action']] ), ENT_QUOTES ) ) . '" ';
                }
                if ( isset( $data['mashup_var_call_action_img_align'][$counters['mashup_counter_call_to_action']] ) && $data['mashup_var_call_action_img_align'][$counters['mashup_counter_call_to_action']] != '' ) {
                    $shortcode .= 'mashup_var_call_action_img_align="' . stripslashes( htmlspecialchars( ($data['mashup_var_call_action_img_align'][$counters['mashup_counter_call_to_action']] ), ENT_QUOTES ) ) . '" ';
                }
                $shortcode .= '] ';
                if ( isset( $data['atts_content'][$counters['mashup_counter_call_to_action']] ) && $data['atts_content'][$counters['mashup_counter_call_to_action']] != '' ) {
                    $shortcode .= htmlspecialchars( $data['atts_content'][$counters['mashup_counter_call_to_action']], ENT_QUOTES ) . ' ';
                }
                $shortcode .= '[/call_to_action]';
                $call_to_action->addChild( 'mashup_shortcode', $shortcode );
                $counters['mashup_counter_call_to_action'] ++;
            }
            $counters['mashup_global_counter_call_to_action'] ++;
        }
        return array(
            'data' => $data,
            'counters' => $counters,
            'widget_type' => $widget_type,
            'column' => $column,
        );
    }

    add_filter( 'mashup_save_page_builder_data', 'mashup_save_page_builder_data_call_to_action_callback' );
}

if ( ! function_exists( 'mashup_load_shortcode_counters_call_to_action_callback' ) ) {

    /**
     * Populate call to action shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_call_to_action_callback( $counters ) {
        $counters['mashup_counter_call_to_action'] = 0;
        $counters['mashup_shortcode_counter_call_to_action'] = 0;
        $counters['mashup_global_counter_call_to_action'] = 0;
        return $counters;
    }

    add_filter( 'mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_call_to_action_callback' );
}
if ( ! function_exists( 'mashup_shortcode_names_list_populate_call_to_action_callback' ) ) {

    /**
     * Populate call_to_action shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_call_to_action_callback( $shortcode_array ) {
        $shortcode_array['call_to_action'] = array(
            'title' => mashup_var_frame_text_srt( 'mashup_var_call_action' ),
            'name' => 'call_to_action',
            'icon' => 'fa icon-info-circle',
            'categories' => 'typography',
        );
        return $shortcode_array;
    }

    add_filter( 'mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_call_to_action_callback' );
}

if ( ! function_exists( 'mashup_element_list_populate_call_to_action_callback' ) ) {

    /**
     * Populate call_to_action shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_call_to_action_callback( $element_list ) {
        $element_list['call_to_action'] = mashup_var_frame_text_srt( 'mashup_var_call_action' );
        return $element_list;
    }

    add_filter( 'mashup_element_list_populate', 'mashup_element_list_populate_call_to_action_callback' );
}