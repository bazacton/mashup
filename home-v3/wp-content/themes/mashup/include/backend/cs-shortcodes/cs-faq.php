<?php
/*
 *
 * @Shortcode Name : Button
 * @retrun
 *
 */

if ( ! function_exists( 'mashup_var_page_builder_faq' ) ) {

    function mashup_var_page_builder_faq( $die = 0 ) {
        global $mashup_node, $count_node, $post, $mashup_var_html_fields, $mashup_var_form_fields, $mashup_var_static_text;
        $strings = new mashup_theme_all_strings;
        $strings->mashup_short_code_strings();
        $shortcode_element = '';
        $filter_element = 'filterdrag';
        $shortcode_view = '';
        $output = array();
        $mashup_counter = $_POST['counter'];
        $PREFIX = 'mashup_faq|faq_item';
        $parseObject = new ShortcodeParse();
        $faq_num = 0;
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
            'mashup_var_faq_view' => '',
            'class' => 'cs-accrodian',
            'faq_style' => '',
            'mashup_var_faq_sub_title' => '',
            'faq_animation' => '',
            'mashup_var_faq_icon' => '',
            'mashup_var_faq_main_title' => '',
            'faq_align' => '',
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
            $faq_num = count( $atts_content );
        }
        $faq_element_size = '50';
        foreach ( $defaults as $key => $values ) {
            if ( isset( $atts[$key] ) ) {
                $$key = $atts[$key];
            } else {
                $$key = $values;
            }
        }

        $name = 'mashup_var_page_builder_faq';
        $coloumn_class = 'column_' . $faq_element_size;

        $mashup_var_faq_view = isset( $mashup_var_faq_view ) ? $mashup_var_faq_view : '';
        $mashup_var_faq_main_title = isset( $mashup_var_faq_main_title ) ? $mashup_var_faq_main_title : '';
        $mashup_var_faq_sub_title = isset( $mashup_var_faq_sub_title ) ? $mashup_var_faq_sub_title : '';
        $faq_align = isset($faq_align) ? $faq_align : '';
        if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
            $shortcode_element = 'shortcode_element_class';
            $shortcode_view = 'cs-pbwp-shortcode';
            $filter_element = 'ajax-drag';
            $coloumn_class = '';
        }
        ?>
        <div id="<?php echo mashup_allow_special_char( $name . $mashup_counter ) ?>_del" class="column  parentdelete <?php echo mashup_allow_special_char( $coloumn_class ); ?> <?php echo mashup_allow_special_char( $shortcode_view ); ?>" item="faq" data="<?php echo mashup_element_size_data_array_index( $faq_element_size ) ?>" >
            <?php mashup_element_setting( $name, $mashup_counter, $faq_element_size, '', 'list-ul' ); ?>
            <div class="cs-wrapp-class-<?php echo mashup_allow_special_char( $mashup_counter ) ?> <?php echo mashup_allow_special_char( $shortcode_element ); ?>" id="<?php echo mashup_allow_special_char( $name . $mashup_counter ) ?>" data-shortcode-template="[<?php echo esc_attr( MASHUP_SC_ACCORDION ); ?> {{attributes}}]" style="display: none;">
                <div class="cs-heading-area">
                    <h5><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_faq_edit_options' ) ); ?></h5>
                    <a href="javascript:mashup_frame_removeoverlay('<?php echo mashup_allow_special_char( $name . $mashup_counter ) ?>','<?php echo mashup_allow_special_char( $filter_element ); ?>')" class="cs-btnclose"><i class="icon-cancel"></i></a> </div>
                <div class="cs-clone-append cs-pbwp-content">
                    <div class="cs-wrapp-tab-box">
                        <div id="shortcode-item-<?php echo mashup_allow_special_char( $mashup_counter ); ?>" data-shortcode-template="{{child_shortcode}}[/<?php echo esc_attr( 'mashup_faq' ); ?>]" data-shortcode-child-template="[<?php echo esc_attr( 'faq_item' ); ?> {{attributes}}] {{content}} [/<?php echo esc_attr( 'faq_item' ); ?>]">
                            <div class="cs-wrapp-clone cs-shortcode-wrapp cs-disable-true cs-pbwp-content" data-template="[<?php echo esc_attr( 'mashup_faq' ); ?> {{attributes}}]">
                                <?php
                                ?>
                                <?php
                                $mashup_opt_array = array(
                                    'name' => mashup_var_theme_text_srt( 'mashup_var_element_title' ),
                                    'desc' => '',
                                    'hint_text' => mashup_var_theme_text_srt( 'mashup_var_element_title_hint' ),
                                    'echo' => true,
                                    'field_params' => array(
                                        'std' => mashup_allow_special_char( $mashup_var_faq_main_title ),
                                        'id' => 'mashup_var_faq_main_title',
                                        'cust_name' => 'mashup_var_faq_main_title[]',
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
                                        'std' => mashup_allow_special_char( $mashup_var_faq_sub_title ),
                                        'id' => 'mashup_var_faq_sub_title',
                                        'cust_name' => 'mashup_var_faq_sub_title[]',
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
                                        'std' => $faq_align,
                                        'id' => '',
                                        'cust_id' => '',
                                        'cust_name' => 'faq_align[]',
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
                                    'name' => mashup_var_theme_text_srt( 'mashup_var_faq_views' ),
                                    'desc' => '',
                                    'hint_text' => mashup_var_theme_text_srt( 'mashup_var_faq_views_hint' ),
                                    'echo' => true,
                                    'field_params' => array(
                                        'std' => $mashup_var_faq_view,
                                        'id' => '',
                                        'cust_id' => 'mashup_var_faq_view',
                                        'cust_name' => 'mashup_var_faq_view[]',
                                        'classes' => 'service_postion dropdown chosen-select',
                                        'options' => array(
                                            'simple' => mashup_var_theme_text_srt( 'mashup_var_faq_simple' ),
                                            'modern' => mashup_var_theme_text_srt( 'mashup_var_faq_style' ),
                                        ),
                                        'return' => true,
                                    ),
                                );
                                $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
                                ?>

                            </div>
                            <?php
                            if ( isset( $faq_num ) && $faq_num <> '' && isset( $atts_content ) && is_array( $atts_content ) ) {
                                foreach ( $atts_content as $faq ) {

                                    $rand_id = rand( 3333, 99999 );
                                    $mashup_var_faq_text = $faq['content'];
                                    $defaults = array( 'mashup_var_faq_title' => 'Title', 'mashup_var_faq_active' => 'yes', 'mashup_var_icon_box' => '' );
                                    foreach ( $defaults as $key => $values ) {
                                        if ( isset( $faq['atts'][$key] ) )
                                            $$key = $faq['atts'][$key];
                                        else
                                            $$key = $values;
                                    }

                                    $mashup_var_faq_active = isset( $mashup_var_faq_active ) ? $mashup_var_faq_active : '';
                                    $mashup_var_faq_title = isset( $mashup_var_faq_title ) ? $mashup_var_faq_title : '';
                                    ?>
                                    <div class='cs-wrapp-clone cs-shortcode-wrapp  cs-pbwp-content'  id="mashup_infobox_<?php echo mashup_allow_special_char( $rand_id ); ?>">
                                        <header>
                                            <h4><i class='icon-arrows'></i><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_faq' ) ); ?></h4>
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
                                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_faq_active_hint' ),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => $mashup_var_faq_active,
                                                'id' => '',
                                                'cust_name' => 'mashup_var_faq_active[]',
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
                                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_faq_title_hint' ),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => mashup_allow_special_char( $mashup_var_faq_title ),
                                                'id' => 'faq_title',
                                                'cust_name' => 'mashup_var_faq_title[]',
                                                'classes' => '',
                                                'return' => true,
                                            ),
                                        );
                                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt( 'mashup_var_accordian_descr' ),
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_faq_descr_hint' ),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => mashup_allow_special_char( $mashup_var_faq_text ),
                                                'id' => 'mashup_var_faq_text',
                                                'cust_name' => 'mashup_var_faq_text[]',
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
                                'std' => $faq_num,
                                'id' => '',
                                'before' => '',
                                'after' => '',
                                'classes' => 'fieldCounter',
                                'extra_atr' => '',
                                'cust_id' => '',
                                'cust_name' => 'faq_num[]',
                                'return' => false,
                                'required' => false
                            );
                            $mashup_var_form_fields->mashup_var_form_hidden_render( $mashup_opt_array );
                            ?>
                        </div>
                        <div class="wrapptabbox">
                            <div class="opt-conts">
                                <ul class="form-elements noborder">
                                    <li class="to-field"> <a href="javascript:void(0);" class="add_servicesss cs-main-btn" onclick="mashup_shortcode_element_ajax_call('faq', 'shortcode-item-<?php echo mashup_allow_special_char( $mashup_counter ); ?>', '<?php echo mashup_allow_special_char( admin_url( 'admin-ajax.php' ) ); ?>')"><i class="icon-plus-circle"></i><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_add_faq' ) ); ?></a> </li>
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
                                        'std' => 'faq',
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

    add_action( 'wp_ajax_mashup_var_page_builder_faq', 'mashup_var_page_builder_faq' );
}
if ( ! function_exists( 'mashup_save_page_builder_data_faq_callback' ) ) {

    /**
     * Save data for faq shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_faq_callback( $args ) {

        $data = $args['data'];
        $counters = $args['counters'];
        $widget_type = $args['widget_type'];
        $column = $args['column'];
        if ( $widget_type == "faq" ) {
            $shortcode = $shortcode_item = '';
            $faq = $column->addChild( 'faq' );
            $faq->addChild( 'page_element_size', htmlspecialchars( $data['faq_element_size'][$counters['mashup_global_counter_faq']] ) );
            $faq->addChild( 'faq_element_size', htmlspecialchars( $data['faq_element_size'][$counters['mashup_global_counter_faq']] ) );
            if ( isset( $data['mashup_widget_element_num'][$counters['mashup_counter']] ) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode' ) {
                $shortcode_str = stripslashes( $data['shortcode']['faq'][$counters['mashup_shortcode_counter_faq']] );
                $counters['mashup_shortcode_counter_faq'] ++;
                $faq->addChild( 'mashup_shortcode', htmlspecialchars( $shortcode_str, ENT_QUOTES ) );
            } else {
                if ( isset( $data['faq_num'][$counters['mashup_counter_faq']] ) && $data['faq_num'][$counters['mashup_counter_faq']] > 0 ) {
                    for ( $i = 1; $i <= $data['faq_num'][$counters['mashup_counter_faq']]; $i ++ ) {
                        $shortcode_item .= '[faq_item ';
						if ( isset( $data['mashup_var_faq_active'][$counters['mashup_counter_faq_node']] ) && $data['mashup_var_faq_active'][$counters['mashup_counter_faq_node']] != '' ) {
                            $shortcode_item .= 'mashup_var_faq_active="' . htmlspecialchars( $data['mashup_var_faq_active'][$counters['mashup_counter_faq_node']], ENT_QUOTES ) . '" ';
                        }
						if ( isset( $data['mashup_var_faq_title'][$counters['mashup_counter_faq_node']] ) && $data['mashup_var_faq_title'][$counters['mashup_counter_faq_node']] != '' ) {
                            $shortcode_item .= 'mashup_var_faq_title="' . htmlspecialchars( $data['mashup_var_faq_title'][$counters['mashup_counter_faq_node']], ENT_QUOTES ) . '" ';
                        }
                        if ( isset( $data['mashup_var_icon_box'][$counters['mashup_counter_faq_node']] ) && $data['mashup_var_icon_box'][$counters['mashup_counter_faq_node']] != '' ) {
                            $shortcode_item .= 'mashup_var_icon_box="' . htmlspecialchars( $data['mashup_var_icon_box'][$counters['mashup_counter_faq_node']], ENT_QUOTES ) . '" ';
                        }
                        $shortcode_item .= ']';
                        if ( isset( $data['mashup_var_faq_text'][$counters['mashup_counter_faq_node']] ) && $data['mashup_var_faq_text'][$counters['mashup_counter_faq_node']] != '' ) {
                            $shortcode_item .= htmlspecialchars( $data['mashup_var_faq_text'][$counters['mashup_counter_faq_node']], ENT_QUOTES );
                        }
                        $shortcode_item .= '[/faq_item]';
                        $counters['mashup_counter_faq_node'] ++;
                    }
                }
                $section_title = '';
				if ( isset( $data['mashup_var_faq_view'][$counters['mashup_counter_faq']] ) && $data['mashup_var_faq_view'][$counters['mashup_counter_faq']] != '' ) {
                    $section_title .= 'mashup_var_faq_view="' . htmlspecialchars( $data['mashup_var_faq_view'][$counters['mashup_counter_faq']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_faq_main_title'][$counters['mashup_counter_faq']] ) && $data['mashup_var_faq_main_title'][$counters['mashup_counter_faq']] != '' ) {
                    $section_title .= 'mashup_var_faq_main_title="' . htmlspecialchars( $data['mashup_var_faq_main_title'][$counters['mashup_counter_faq']], ENT_QUOTES ) . '" ';
                }
				if ( isset( $data['mashup_var_faq_sub_title'][$counters['mashup_counter_faq']] ) && $data['mashup_var_faq_sub_title'][$counters['mashup_counter_faq']] != '' ) {
                    $section_title .= 'mashup_var_faq_sub_title="' . htmlspecialchars( $data['mashup_var_faq_sub_title'][$counters['mashup_counter_faq']], ENT_QUOTES ) . '" ';
                }
                 if ( isset( $data['faq_align'][$counters['mashup_counter_faq']] ) && $data['faq_align'][$counters['mashup_counter_faq']] != '' ) {
                    $section_title .= 'faq_align="' . htmlspecialchars( $data['faq_align'][$counters['mashup_counter_faq']], ENT_QUOTES ) . '" ';
                }
                $shortcode = '[mashup_faq ' . $section_title . ' ]' . $shortcode_item . '[/mashup_faq]';
                $faq->addChild( 'mashup_shortcode', $shortcode );
                $counters['mashup_counter_faq'] ++;
            }
            $counters['mashup_global_counter_faq'] ++;
        }
        return array(
            'data' => $data,
            'counters' => $counters,
            'widget_type' => $widget_type,
            'column' => $column,
        );
    }

    add_filter( 'mashup_save_page_builder_data', 'mashup_save_page_builder_data_faq_callback' );
}

if ( ! function_exists( 'mashup_load_shortcode_counters_faq_callback' ) ) {

    /**
     * Populate faq shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_faq_callback( $counters ) {
        $counters['mashup_global_counter_faq'] = 0;
        $counters['mashup_shortcode_counter_faq'] = 0;
        $counters['mashup_counter_faq_node'] = 0;
        $counters['mashup_counter_faq'] = 0;
        return $counters;
    }

    add_filter( 'mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_faq_callback' );
}

if ( ! function_exists( 'mashup_shortcode_names_list_populate_faq_callback' ) ) {

    /**
     * Populate faq shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_faq_callback( $shortcode_array ) {
        $shortcode_array['faq'] = array(
            'title' => mashup_var_frame_text_srt( 'mashup_var_faq' ),
            'name' => 'faq',
            'icon' => 'icon-list-ul',
            'categories' => 'contentblocks',
        );
        return $shortcode_array;
    }

    add_filter( 'mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_faq_callback' );
}

if ( ! function_exists( 'mashup_element_list_populate_faq_callback' ) ) {

    /**
     * Populate faq shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_faq_callback( $element_list ) {
        $element_list['faq'] = mashup_var_frame_text_srt( 'mashup_var_faq' );
        return $element_list;
    }

    add_filter( 'mashup_element_list_populate', 'mashup_element_list_populate_faq_callback' );
}

if ( ! function_exists( 'mashup_shortcode_sub_element_ui_faq_callback' ) ) {

    /**
     * Render UI for sub element in faq settings.
     *
     * @param	array $args
     */
    function mashup_shortcode_sub_element_ui_faq_callback( $args ) {
        $type = $args['type'];
        $mashup_var_html_fields = $args['html_fields'];

        if ( $type == 'faq' ) {
            $mashup_var_active = mashup_var_frame_text_srt( 'mashup_var_active' );
            $mashup_var_faq_active_hint = mashup_var_frame_text_srt( 'mashup_var_faq_active_hint' );
            $mashup_var_faq_title = mashup_var_frame_text_srt( 'mashup_var_faq_title' );
            $mashup_var_faq_title_hint = mashup_var_frame_text_srt( 'mashup_var_faq_title_hint' );
            $mashup_var_faq_text = mashup_var_frame_text_srt( 'mashup_var_faq_text' );
            $mashup_var_faq_text_hint = mashup_var_frame_text_srt( 'mashup_var_faq_text_hint' );

            $rand_id = rand( 324235, 993249 );
            ?>
            <div class='cs-wrapp-clone cs-shortcode-wrapp'  id="mashup_infobox_<?php echo intval( $rand_id ); ?>">
                <header>
                    <h4><i class='icon-arrows'></i><?php echo esc_html( mashup_var_frame_text_srt( 'mashup_var_faq' ) ); ?></h4>
                    <a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo esc_html( mashup_var_frame_text_srt( 'mashup_var_remove' ) ); ?></a>
                </header>

                <div class="form-elements" id="mashup_infobox_<?php echo esc_attr( $rand_id ); ?>">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label><?php echo esc_html( mashup_var_frame_text_srt( 'mashup_var_faq_icon' ) ); ?></label>
                        <?php
                        if ( function_exists( 'mashup_var_tooltip_helptext' ) ) {
                            echo mashup_var_tooltip_helptext( mashup_var_frame_text_srt( 'mashup_var_faq_icon_hint' ) );
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
                    'hint_text' => $mashup_var_faq_active_hint,
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => '',
                        'cust_name' => 'mashup_var_faq_active[]',
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
                    'name' => $mashup_var_faq_title,
                    'desc' => '',
                    'hint_text' => $mashup_var_faq_title_hint,
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'faq_title',
                        'cust_name' => 'mashup_var_faq_title[]',
                        'classes' => '',
                        'return' => true,
                    ),
                );
                $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                $mashup_opt_array = array(
                    'name' => $mashup_var_faq_text,
                    'desc' => '',
                    'hint_text' => $mashup_var_faq_text_hint,
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'mashup_var_faq_text',
                        'cust_name' => 'mashup_var_faq_text[]',
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

    add_action( 'mashup_shortcode_sub_element_ui', 'mashup_shortcode_sub_element_ui_faq_callback' );
}