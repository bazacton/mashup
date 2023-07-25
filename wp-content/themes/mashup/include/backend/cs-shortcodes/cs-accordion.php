<?php
/**
 * Shortcode Name : Accordion
 *
 * @package	mashup 
 */
if ( ! function_exists( 'mashup_var_page_builder_accordion' ) ) {

    function mashup_var_page_builder_accordion( $die = 0 ) {
        global $mashup_node, $count_node, $post, $mashup_var_html_fields, $mashup_var_form_fields, $mashup_var_static_text;


        $strings = new mashup_theme_all_strings;
        $strings->mashup_short_code_strings();
        $shortcode_element = '';
        $filter_element = 'filterdrag';
        $shortcode_view = '';
        $output = array();
        $mashup_counter = $_POST['counter'];
        $PREFIX = 'mashup_accordion|accordion_item';
        $parseObject = new ShortcodeParse();
        $accordion_num = 0;
        if ( isset( $_POST['action'] ) && ! isset( $_POST['shortcode_element_id'] ) ) {
            $POSTID = '';
            $shortcode_element_id = '';
        } else {
            $POSTID = $_POST['POSTID'];
            $shortcode_element_id = $_POST['shortcode_element_id'];
            $shortcode_str = stripslashes( $shortcode_element_id );
            $output = $parseObject->mashup_shortcodes( $output, $shortcode_str, true, $PREFIX );
        }

        $defaults = array(
            'mashup_var_column_size' => '',
            'mashup_var_accordion_view' => '',
            'class' => 'cs-accrodian',
            'accordian_style' => '',
            'mashup_var_accordian_sub_title' => '',
            'accordion_animation' => '',
            'mashup_var_accordion_icon' => '',
            'accordion_align' => 'center',
            'mashup_var_accordian_main_title' => '',
            'mashup_var_accordion_column' => ''
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
            $accordion_num = count( $atts_content );
        }
        $accordion_element_size = '50';
        foreach ( $defaults as $key => $values ) {
            if ( isset( $atts[$key] ) ) {
                $$key = $atts[$key];
            } else {
                $$key = $values;
            }
        }

        $name = 'mashup_var_page_builder_accordion';
        $coloumn_class = 'column_' . $accordion_element_size;

        $mashup_var_accordion_view = isset( $mashup_var_accordion_view ) ? $mashup_var_accordion_view : '';
        $mashup_var_accordian_main_title = isset( $mashup_var_accordian_main_title ) ? $mashup_var_accordian_main_title : '';
        $mashup_var_accordian_sub_title = isset( $mashup_var_accordian_sub_title ) ? $mashup_var_accordian_sub_title : '';
        $mashup_var_accordion_column = isset( $mashup_var_accordion_column ) ? $mashup_var_accordion_column : '';
        $accordion_align = isset( $accordion_align ) ? $accordion_align : '';
        if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
            $shortcode_element = 'shortcode_element_class';
            $shortcode_view = 'cs-pbwp-shortcode';
            $filter_element = 'ajax-drag';
            $coloumn_class = '';
        }
        ?>
        <div id="<?php echo mashup_allow_special_char( $name . $mashup_counter ) ?>_del" class="column  parentdelete <?php echo mashup_allow_special_char( $coloumn_class ); ?> <?php echo mashup_allow_special_char( $shortcode_view ); ?>" item="accordion" data="<?php echo mashup_element_size_data_array_index( $accordion_element_size ) ?>" >
            <?php mashup_element_setting( $name, $mashup_counter, $accordion_element_size, '', 'list-ul' ); ?>
            <div class="cs-wrapp-class-<?php echo mashup_allow_special_char( $mashup_counter ) ?> <?php echo mashup_allow_special_char( $shortcode_element ); ?>" id="<?php echo mashup_allow_special_char( $name . $mashup_counter ) ?>" data-shortcode-template="[<?php echo esc_attr( MASHUP_SC_ACCORDION ); ?> {{attributes}}]" style="display: none;">
                <div class="cs-heading-area">
                    <h5><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_accordion_edit_options' ) ); ?></h5>
                    <a href="javascript:mashup_frame_removeoverlay('<?php echo mashup_allow_special_char( $name . $mashup_counter ) ?>','<?php echo mashup_allow_special_char( $filter_element ); ?>')" class="cs-btnclose"><i class="icon-cancel"></i></a> </div>
                <div class="cs-clone-append cs-pbwp-content">
                    <div class="cs-wrapp-tab-box">
                        <div id="shortcode-item-<?php echo mashup_allow_special_char( $mashup_counter ); ?>" data-shortcode-template="{{child_shortcode}}[/<?php echo esc_attr( 'mashup_accordion' ); ?>]" data-shortcode-child-template="[<?php echo esc_attr( 'accordion_item' ); ?> {{attributes}}] {{content}} [/<?php echo esc_attr( 'accordion_item' ); ?>]">
                            <div class="cs-wrapp-clone cs-shortcode-wrapp cs-disable-true cs-pbwp-content" data-template="[<?php echo esc_attr( 'mashup_accordion' ); ?> {{attributes}}]">
                                <?php
                                ?>
                                <?php
                                $mashup_opt_array = array(
                                    'name' => mashup_var_theme_text_srt( 'mashup_var_element_title' ),
                                    'desc' => '',
                                    'hint_text' => mashup_var_theme_text_srt( 'mashup_var_element_title_hint' ),
                                    'echo' => true,
                                    'field_params' => array(
                                        'std' => mashup_allow_special_char( $mashup_var_accordian_main_title ),
                                        'id' => 'mashup_var_accordian_main_title',
                                        'cust_name' => 'mashup_var_accordian_main_title[]',
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
                                        'std' => mashup_allow_special_char( $mashup_var_accordian_sub_title ),
                                        'id' => 'mashup_var_accordian_sub_title',
                                        'cust_name' => 'mashup_var_accordian_sub_title[]',
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
                                        'std' => $accordion_align,
                                        'id' => '',
                                        'cust_id' => '',
                                        'cust_name' => 'accordion_align[]',
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
                                if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
                                    mashup_shortcode_element_size();
                                }

                                $mashup_opt_array = array(
                                    'name' => mashup_var_theme_text_srt( 'mashup_var_accordion_views' ),
                                    'desc' => '',
                                    'hint_text' => mashup_var_theme_text_srt( 'mashup_var_accordion_view_hint' ),
                                    'echo' => true,
                                    'field_params' => array(
                                        'std' => $mashup_var_accordion_view,
                                        'id' => '',
                                        'cust_id' => 'mashup_var_accordion_view',
                                        'cust_name' => 'mashup_var_accordion_view[]',
                                        'classes' => 'service_postion dropdown chosen-select',
                                        'options' => array(
                                            'simple' => mashup_var_theme_text_srt( 'mashup_var_accordion_simple' ),
                                            'modern' => mashup_var_theme_text_srt( 'mashup_var_accordion_modern' ),
                                        ),
                                        'return' => true,
                                    ),
                                );
                                $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
                                ?>
                            </div>
                            <?php
                            if ( isset( $accordion_num ) && $accordion_num <> '' && isset( $atts_content ) && is_array( $atts_content ) ) {
                                foreach ( $atts_content as $accordion ) {

                                    $rand_id = rand( 3333, 99999 );
                                    $mashup_var_accordion_text = $accordion['content'];
                                    $defaults = array( 'mashup_var_accordion_title' => 'Title', 'mashup_var_accordion_active' => 'yes', 'mashup_var_icon_box' => '' );
                                    foreach ( $defaults as $key => $values ) {
                                        if ( isset( $accordion['atts'][$key] ) )
                                            $$key = $accordion['atts'][$key];
                                        else
                                            $$key = $values;
                                    }

                                    $mashup_var_accordion_active = isset( $mashup_var_accordion_active ) ? $mashup_var_accordion_active : '';
                                    $mashup_var_accordion_title = isset( $mashup_var_accordion_title ) ? $mashup_var_accordion_title : '';
                                    ?>
                                    <div class='cs-wrapp-clone cs-shortcode-wrapp  cs-pbwp-content'  id="mashup_infobox_<?php echo mashup_allow_special_char( $rand_id ); ?>">
                                        <header>
                                            <h4><i class='icon-arrows'></i><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_accordion' ) ); ?></h4>
                                            <a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_remove' ) ); ?></a></header>


                                        <div class="form-elements" id="mashup_infobox_<?php echo esc_attr( $rand_id ); ?>">
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <label><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_icon' ) ); ?></label>
                                                <?php
                                                if ( function_exists( 'mashup_var_tooltip_helptext' ) ) {
                                                    echo mashup_var_tooltip_helptext( mashup_var_theme_text_srt( 'mashup_var_icon_hint' ) );
                                                }
                                                ?>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <?php echo mashup_var_icomoon_icons_box( $mashup_var_icon_box, esc_attr( $rand_id ), 'mashup_var_icon_box' ); ?>
                                            </div>
                                        </div>
                                        <?php
                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt( 'mashup_var_accordian_active' ),
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_accordian_active_hint' ),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => $mashup_var_accordion_active,
                                                'id' => '',
                                                'cust_name' => 'mashup_var_accordion_active[]',
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
                                            'name' => mashup_var_theme_text_srt( 'mashup_var_accordian_title' ),
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_accordian_title_hint' ),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => mashup_allow_special_char( $mashup_var_accordion_title ),
                                                'id' => 'accordion_title',
                                                'cust_name' => 'mashup_var_accordion_title[]',
                                                'classes' => '',
                                                'return' => true,
                                            ),
                                        );
                                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt( 'mashup_var_accordian_descr' ),
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_accordian_descr_hint' ),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => mashup_allow_special_char( $mashup_var_accordion_text ),
                                                'id' => 'mashup_var_accordion_text',
                                                'cust_name' => 'mashup_var_accordion_text[]',
                                                'extra_atr' => ' data-content-text="cs-shortcode-textarea"',
                                                'classes' => '',
                                                'return' => true,
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
                                'std' => $accordion_num,
                                'id' => '',
                                'before' => '',
                                'after' => '',
                                'classes' => 'fieldCounter',
                                'extra_atr' => '',
                                'cust_id' => '',
                                'cust_name' => 'accordion_num[]',
                                'return' => false,
                                'required' => false
                            );
                            $mashup_var_form_fields->mashup_var_form_hidden_render( $mashup_opt_array );
                            ?>
                        </div>
                        <div class="wrapptabbox">
                            <div class="opt-conts">
                                <ul class="form-elements noborder">
                                    <li class="to-field"> <a href="javascript:void(0);" class="add_servicesss cs-main-btn" onclick="mashup_shortcode_element_ajax_call('accordion', 'shortcode-item-<?php echo mashup_allow_special_char( $mashup_counter ); ?>', '<?php echo mashup_allow_special_char( admin_url( 'admin-ajax.php' ) ); ?>')"><i class="icon-plus-circle"></i><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_accordian_add_accordian' ) ); ?></a> </li>
                                    <div id="loading" class="shortcodeload"></div>
                                </ul>
                                <?php if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) { ?>
                                    <ul class="form-elements insert-bg">
                                        <li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:mashup_shortcode_insert_editor('<?php echo esc_js( str_replace( 'mashup_var_page_builder_', '', $name ) ); ?>', 'shortcode-item-<?php echo mashup_allow_special_char( $mashup_counter ); ?>', '<?php echo mashup_allow_special_char( $filter_element ); ?>')" ><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_insert' ) ); ?></a> </li>
                                    </ul>
                                    <div id="results-shortocde"></div>
                                <?php } else { ?>

                                    <?php
                                    $mashup_opt_array = array(
                                        'std' => 'accordion',
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
                </div>
            </div>
        </div>
        
        <?php
        if ( $die <> 1 ) {
            die();
        }
    }

    add_action( 'wp_ajax_mashup_var_page_builder_accordion', 'mashup_var_page_builder_accordion' );
}

if ( ! function_exists( 'mashup_save_page_builder_data_accordion_callback' ) ) {

    /**
     * Save data for accordion shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_accordion_callback( $args ) {

        $data = $args['data'];
        $counters = $args['counters'];
        $widget_type = $args['widget_type'];
        $column = $args['column'];
        if ( $widget_type == "accordion" ) {
            $shortcode = $shortcode_item = '';
            $accordion = $column->addChild( 'accordion' );
            $accordion->addChild( 'page_element_size', htmlspecialchars( $data['accordion_element_size'][$counters['mashup_global_counter_accordion']] ) );
            $accordion->addChild( 'accordion_element_size', htmlspecialchars( $data['accordion_element_size'][$counters['mashup_global_counter_accordion']] ) );
            if ( isset( $data['mashup_widget_element_num'][$counters['mashup_counter']] ) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode' ) {
                $shortcode_str = stripslashes( $data['shortcode']['accordion'][$counters['mashup_shortcode_counter_accordion']] );
                $counters['mashup_shortcode_counter_accordion'] ++;
                $accordion->addChild( 'mashup_shortcode', htmlspecialchars( $shortcode_str, ENT_QUOTES ) );
            } else {
                if ( isset( $data['accordion_num'][$counters['mashup_counter_accordion']] ) && $data['accordion_num'][$counters['mashup_counter_accordion']] > 0 ) {
                    for ( $i = 1; $i <= $data['accordion_num'][$counters['mashup_counter_accordion']]; $i ++ ) {
                        $shortcode_item .= '[accordion_item ';
                        if ( isset( $data['mashup_var_accordion_active'][$counters['mashup_counter_accordion_node']] ) && $data['mashup_var_accordion_active'][$counters['mashup_counter_accordion_node']] != '' ) {
                            $shortcode_item .= 'mashup_var_accordion_active="' . htmlspecialchars( $data['mashup_var_accordion_active'][$counters['mashup_counter_accordion_node']], ENT_QUOTES ) . '" ';
                        }
                        if ( isset( $data['mashup_var_accordion_title'][$counters['mashup_counter_accordion_node']] ) && $data['mashup_var_accordion_title'][$counters['mashup_counter_accordion_node']] != '' ) {
                            $shortcode_item .= 'mashup_var_accordion_title="' . htmlspecialchars( $data['mashup_var_accordion_title'][$counters['mashup_counter_accordion_node']], ENT_QUOTES ) . '" ';
                        }
                        if ( isset( $data['mashup_var_icon_box'][$counters['mashup_counter_accordion_node']] ) && $data['mashup_var_icon_box'][$counters['mashup_counter_accordion_node']] != '' ) {
                            $shortcode_item .= 'mashup_var_icon_box="' . htmlspecialchars( $data['mashup_var_icon_box'][$counters['mashup_counter_accordion_node']], ENT_QUOTES ) . '" ';
                        }
                        $shortcode_item .= ']';
                        if ( isset( $data['mashup_var_accordion_text'][$counters['mashup_counter_accordion_node']] ) && $data['mashup_var_accordion_text'][$counters['mashup_counter_accordion_node']] != '' ) {
                            $shortcode_item .= htmlspecialchars( $data['mashup_var_accordion_text'][$counters['mashup_counter_accordion_node']], ENT_QUOTES );
                        }
                        $shortcode_item .= '[/accordion_item]';
                        $counters['mashup_counter_accordion_node'] ++;
                    }
                }
                $section_title = '';
                if ( isset( $data['mashup_var_accordion_view'][$counters['mashup_counter_accordion']] ) && $data['mashup_var_accordion_view'][$counters['mashup_counter_accordion']] != '' ) {
                    $section_title .= 'mashup_var_accordion_view="' . htmlspecialchars( $data['mashup_var_accordion_view'][$counters['mashup_counter_accordion']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_accordian_main_title'][$counters['mashup_counter_accordion']] ) && $data['mashup_var_accordian_main_title'][$counters['mashup_counter_accordion']] != '' ) {
                    $section_title .= 'mashup_var_accordian_main_title="' . htmlspecialchars( $data['mashup_var_accordian_main_title'][$counters['mashup_counter_accordion']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_accordian_sub_title'][$counters['mashup_counter_accordion']] ) && $data['mashup_var_accordian_sub_title'][$counters['mashup_counter_accordion']] != '' ) {
                    $section_title .= 'mashup_var_accordian_sub_title="' . htmlspecialchars( $data['mashup_var_accordian_sub_title'][$counters['mashup_counter_accordion']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['accordion_align'][$counters['mashup_counter_accordion']] ) && $data['accordion_align'][$counters['mashup_counter_accordion']] != '' ) {
                    $section_title .= 'accordion_align="' . htmlspecialchars( $data['accordion_align'][$counters['mashup_counter_accordion']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_accordion_column'][$counters['mashup_counter_accordion']] ) && $data['mashup_var_accordion_column'][$counters['mashup_counter_accordion']] != '' ) {
                    $section_title .= 'mashup_var_accordion_column="' . htmlspecialchars( $data['mashup_var_accordion_column'][$counters['mashup_counter_accordion']], ENT_QUOTES ) . '" ';
                }
                $shortcode = '[mashup_accordion ' . $section_title . ' ]' . $shortcode_item . '[/mashup_accordion]';
                $accordion->addChild( 'mashup_shortcode', $shortcode );
                $counters['mashup_counter_accordion'] ++;
            }
            $counters['mashup_global_counter_accordion'] ++;
        }
        return array(
            'data' => $data,
            'counters' => $counters,
            'widget_type' => $widget_type,
            'column' => $column,
        );
    }

    add_filter( 'mashup_save_page_builder_data', 'mashup_save_page_builder_data_accordion_callback' );
}

if ( ! function_exists( 'mashup_load_shortcode_counters_accordion_callback' ) ) {

    /**
     * Populate accordion shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_accordion_callback( $counters ) {
        $counters['mashup_counter_accordion'] = 0;
        $counters['mashup_counter_accordion_node'] = 0;
        $counters['mashup_shortcode_counter_accordion'] = 0;
        $counters['mashup_global_counter_accordion'] = 0;
        return $counters;
    }

    add_filter( 'mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_accordion_callback' );
}

if ( ! function_exists( 'mashup_shortcode_sub_element_ui_accordion_callback' ) ) {

    /**
     * Render UI for sub element in accordion settings.
     *
     * @param	array $args
     */
    function mashup_shortcode_sub_element_ui_accordion_callback( $args ) {
        $type = $args['type'];
        $mashup_var_html_fields = $args['html_fields'];

        if ( $type == 'accordion' ) {
            $mashup_var_active = mashup_var_frame_text_srt( 'mashup_var_active' );
            $mashup_var_active_hint = mashup_var_frame_text_srt( 'mashup_var_active_hint' );
            $mashup_var_accordion_title = mashup_var_frame_text_srt( 'mashup_var_accordion_title' );
            $mashup_var_accordion_title_hint = mashup_var_frame_text_srt( 'mashup_var_accordion_title_hint' );
            $mashup_var_accordion_text = mashup_var_frame_text_srt( 'mashup_var_accordion_text' );
            $mashup_var_accordion_text_hint = mashup_var_frame_text_srt( 'mashup_var_accordion_text_hint' );

            $rand_id = rand( 324235, 993249 );
            ?>
            <div class='cs-wrapp-clone cs-shortcode-wrapp'  id="mashup_infobox_<?php echo intval( $rand_id ); ?>">
                <header>
                    <h4><i class='icon-arrows'></i><?php echo esc_html( mashup_var_frame_text_srt( 'mashup_var_accordion' ) ); ?></h4>
                    <a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo esc_html( mashup_var_frame_text_srt( 'mashup_var_remove' ) ); ?></a>
                </header>

                <div class="form-elements" id="mashup_infobox_<?php echo esc_attr( $rand_id ); ?>">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label><?php echo esc_html( mashup_var_frame_text_srt( 'mashup_var_accordion_icon' ) ); ?></label>
                        <?php
                        if ( function_exists( 'mashup_var_tooltip_helptext' ) ) {
                            echo mashup_var_tooltip_helptext( mashup_var_frame_text_srt( 'mashup_var_accordion_icon_hint' ) );
                        }
                        ?>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <?php echo mashup_var_icomoon_icons_box( '', esc_attr( $rand_id ), 'mashup_var_icon_box' ); ?>
                    </div>
                </div>

                <?php
                $mashup_opt_array = array(
                    'name' => $mashup_var_active,
                    'desc' => '',
                    'hint_text' => $mashup_var_active_hint,
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => '',
                        'cust_name' => 'mashup_var_accordion_active[]',
                        'classes' => 'dropdown chosen-select',
                        'options' => array(
                            'yes' => mashup_var_frame_text_srt( 'mashup_var_yes' ),
                            'no' => mashup_var_frame_text_srt( 'mashup_var_no' ),
                        ),
                        'return' => true,
                    ),
                );



                $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );

                $mashup_opt_array = array(
                    'name' => $mashup_var_accordion_title,
                    'desc' => '',
                    'hint_text' => $mashup_var_accordion_title_hint,
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'accordion_title',
                        'cust_name' => 'mashup_var_accordion_title[]',
                        'classes' => '',
                        'return' => true,
                    ),
                );
                $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                $mashup_opt_array = array(
                    'name' => $mashup_var_accordion_text,
                    'desc' => '',
                    'hint_text' => $mashup_var_accordion_text_hint,
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'mashup_var_accordion_text',
                        'cust_name' => 'mashup_var_accordion_text[]',
                        'extra_atr' => ' data-content-text="cs-shortcode-textarea"',
                        'return' => true,
                        'classes' => '',
                        'mashup_editor' => true
                    ),
                );
                $mashup_var_html_fields->mashup_var_textarea_field( $mashup_opt_array );
                ?>

            </div>

            <?php
        }
    }

    add_action( 'mashup_shortcode_sub_element_ui', 'mashup_shortcode_sub_element_ui_accordion_callback' );
}

if ( ! function_exists( 'mashup_element_list_populate_accordion_callback' ) ) {

    /**
     * Populate accordion shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_accordion_callback( $element_list ) {
        $element_list['accordion'] = mashup_var_frame_text_srt( 'mashup_var_accordion' );
        return $element_list;
    }

    add_filter( 'mashup_element_list_populate', 'mashup_element_list_populate_accordion_callback' );
}

if ( ! function_exists( 'mashup_shortcode_names_list_populate_accordion_callback' ) ) {

    /**
     * Populate accordion shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_accordion_callback( $shortcode_array ) {
        $shortcode_array['accordion'] = array(
            'title' => mashup_var_frame_text_srt( 'mashup_var_accordian' ),
            'name' => 'accordion',
            'icon' => 'icon-list-ul',
            'categories' => 'contentblocks',
        );
        return $shortcode_array;
    }

    add_filter( 'mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_accordion_callback' );
}
