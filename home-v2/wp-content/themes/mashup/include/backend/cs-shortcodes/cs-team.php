<?php
/*
 *
 * @Shortcode Name : Team
 * @retrun
 *
 * 
 */
if ( ! function_exists( 'mashup_var_page_builder_team' ) ) {

    function mashup_var_page_builder_team( $die = 0 ) {
        global $mashup_node, $count_node, $post, $mashup_var_html_fields, $mashup_var_form_fields;

        $shortcode_element = '';
        $filter_element = 'filterdrag';
        $shortcode_view = '';
        $output = array();
        $mashup_counter = $_POST['counter'];
        $team_num = 0;
        if ( isset( $_POST['action'] ) && ! isset( $_POST['shortcode_element_id'] ) ) {
            $POSTID = '';
            $shortcode_element_id = '';
        } else {
            $POSTID = $_POST['POSTID'];
            $shortcode_element_id = $_POST['shortcode_element_id'];
            $shortcode_str = stripslashes( $shortcode_element_id );
            $PREFIX = 'mashup_team|mashup_team_item';
            $parseObject = new ShortcodeParse();
            $output = $parseObject->mashup_shortcodes( $output, $shortcode_str, true, $PREFIX );
        }
        $defaults = array(
            'mashup_var_team_title' => '',
            'mashup_var_team_col' => '',
            'mashup_var_team_views' => '',
            'mashup_var_team_sub_title' => '',
            'mashup_var_team_align' => '',
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
            $team_num = count( $atts_content );
        }
        $team_element_size = '25';
        foreach ( $defaults as $key => $values ) {
            if ( isset( $atts[$key] ) ) {
                $$key = $atts[$key];
            } else {
                $$key = $values;
            }
        }
        $name = 'mashup_var_page_builder_team';
        $coloumn_class = 'column_' . $team_element_size;
        $mashup_var_team_main_title = isset( $mashup_var_team_main_title ) ? $mashup_var_team_main_title : '';
        $mashup_var_team_sub_title = isset( $mashup_var_team_sub_title ) ? $mashup_var_team_sub_title : '';
        $mashup_var_team_align = isset( $mashup_var_team_align ) ? $mashup_var_team_align : '';
        if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
            $shortcode_element = 'shortcode_element_class';
            $shortcode_view = 'cs-pbwp-shortcode';
            $filter_element = 'ajax-drag';
            $coloumn_class = '';
        }
        global $mashup_var_static_text;
        $strings = new mashup_theme_all_strings;
        $strings->mashup_short_code_strings();
        $strings->mashup_theme_option_field_strings();
        ?>
        <div id="<?php echo mashup_allow_special_char( $name . $mashup_counter ) ?>_del" class="column  parentdelete <?php echo mashup_allow_special_char( $coloumn_class ); ?> <?php echo mashup_allow_special_char( $shortcode_view ); ?>" item="team" data="<?php echo mashup_element_size_data_array_index( $team_element_size ) ?>" >
            <?php mashup_element_setting( $name, $mashup_counter, $team_element_size, '', 'comments-o', $type = '' ); ?>
            <div class="cs-wrapp-class-<?php echo mashup_allow_special_char( $mashup_counter ) ?> <?php echo mashup_allow_special_char( $shortcode_element ); ?>" id="<?php echo mashup_allow_special_char( $name . $mashup_counter ) ?>" style="display: none;">
                <div class="cs-heading-area">
                    <h5><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_team_edit_options' ) ); ?></h5>
                    <a href="javascript:mashup_frame_removeoverlay('<?php echo mashup_allow_special_char( $name . $mashup_counter ) ?>','<?php echo mashup_allow_special_char( $filter_element ); ?>')" class="cs-btnclose"><i class="icon-cancel"></i></a>
                </div>
                <div class="cs-clone-append cs-pbwp-content">
                    <div class="cs-wrapp-tab-box">
                        <div id="shortcode-item-<?php echo mashup_allow_special_char( $mashup_counter ); ?>" data-shortcode-template="{{child_shortcode}} [/mashup_team]" data-shortcode-child-template="[mashup_team_item {{attributes}}] {{content}} [/mashup_team_item]">
                            <div class="cs-wrapp-clone cs-shortcode-wrapp cs-disable-true cs-pbwp-content" data-template="[mashup_team {{attributes}}]">
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
                                        'std' => mashup_allow_special_char( $mashup_var_team_title ),
                                        'id' => 'team_title' . $mashup_counter,
                                        'cust_name' => 'mashup_var_team_title[]',
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
                                        'std' => mashup_allow_special_char( $mashup_var_team_sub_title ),
                                        'id' => 'mashup_var_team_sub_title',
                                        'cust_name' => 'mashup_var_team_sub_title[]',
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
                                        'std' => $mashup_var_team_align,
                                        'id' => '',
                                        'cust_id' => '',
                                        'cust_name' => 'mashup_var_team_align[]',
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
                                    'name' => mashup_var_theme_text_srt( 'mashup_var_team_sc_views' ),
                                    'desc' => '',
                                    'hint_text' => mashup_var_theme_text_srt( 'mashup_var_team_sc_views_hint' ),
                                    'echo' => true,
                                    'field_params' => array(
                                        'std' => $mashup_var_team_views,
                                        'id' => '',
                                        'cust_name' => 'mashup_var_team_views[]',
                                        'classes' => 'dropdown chosen-select',
                                        'options' => array(
                                            'simple' => mashup_var_theme_text_srt( 'mashup_var_team_sc_view_simple' ),
                                            'slider' => mashup_var_theme_text_srt( 'mashup_var_team_sc_view_slider' ),
                                        ),
                                        'return' => true,
                                    ),
                                );
                                $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
                                $mashup_opt_array = array(
                                    'name' => mashup_var_theme_text_srt( 'mashup_var_col' ),
                                    'desc' => '',
                                    'hint_text' => mashup_var_theme_text_srt( 'mashup_var_sel_col_hint' ),
                                    'echo' => true,
                                    'field_params' => array(
                                        'std' => $mashup_var_team_col,
                                        'id' => '',
                                        'cust_name' => 'mashup_var_team_col[]',
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
                                ?>
                            </div>
                            <?php
                            if ( isset( $team_num ) && $team_num <> '' && isset( $atts_content ) && is_array( $atts_content ) ) {
                                foreach ( $atts_content as $team ) {
                                    $rand_id = rand( 3333, 99999 );
                                    $mashup_var_team_text = $team['content'];
                                    $defaults = array(
                                        'mashup_var_team_name' => '',
                                        'mashup_var_team_designation' => '',
                                        'mashup_var_team_image' => '',
                                        'mashup_var_team_link' => ''
                                    );
                                    foreach ( $defaults as $key => $values ) {
                                        if ( isset( $team['atts'][$key] ) )
                                            $$key = $team['atts'][$key];
                                        else
                                            $$key = $values;
                                    }
                                    $mashup_var_team_name = isset( $mashup_var_team_name ) ? $mashup_var_team_name : '';
                                    $mashup_var_team_designation = isset( $mashup_var_team_designation ) ? $mashup_var_team_designation : '';
                                    $mashup_var_team_link = isset( $mashup_var_team_link ) ? $mashup_var_team_link : '';
                                    $mashup_var_team_image = isset( $mashup_var_team_image ) ? $mashup_var_team_image : '';
                                    ?>
                                    <div class='cs-wrapp-clone cs-shortcode-wrapp  cs-pbwp-content'  id="mashup_infobox_<?php echo mashup_allow_special_char( $rand_id ); ?>">
                                        <header>
                                            <h4><i class='icon-arrows'></i><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_team_sc' ) ); ?></h4>
                                            <a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_remove' ) ); ?></a></header>
                                        <?php
                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt( 'mashup_var_team_sc_name' ),
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_team_sc_name_hint' ),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => esc_html( $mashup_var_team_name ),
                                                'id' => 'team_name' . $mashup_counter,
                                                'cust_name' => 'mashup_var_team_name[]',
                                                'classes' => '',
                                                'return' => true,
                                            ),
                                        );
                                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt( 'mashup_var_team_sc_designation' ),
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_team_sc_designation_hint' ),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => esc_html( $mashup_var_team_designation ),
                                                'id' => 'team_designation' . $mashup_counter,
                                                'cust_name' => 'mashup_var_team_designation[]',
                                                'classes' => '',
                                                'return' => true,
                                            ),
                                        );
                                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt( 'mashup_var_team_sc_link' ),
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_team_sc_link_hint' ),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => esc_html( $mashup_var_team_link ),
                                                'id' => 'team_link' . $mashup_counter,
                                                'cust_name' => 'mashup_var_team_link[]',
                                                'classes' => '',
                                                'return' => true,
                                            ),
                                        );
                                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                                        $mashup_opt_array = array(
                                            'std' => $mashup_var_team_image,
                                            'id' => 'team_image_array',
                                            'main_id' => 'team_image_array',
                                            'name' => mashup_var_theme_text_srt( 'mashup_var_team_sc_image' ),
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_team_sc_image_hint' ),
                                            'echo' => true,
                                            'array' => true,
                                            'field_params' => array(
                                                'std' => $mashup_var_team_image,
                                                'cust_id' => '',
                                                'cust_name' => 'mashup_var_team_image[]',
                                                'id' => 'team_image_array',
                                                'return' => true,
                                                'array' => true,
                                            ),
                                        );
                                        $mashup_var_html_fields->mashup_var_upload_file_field( $mashup_opt_array );
                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt( 'mashup_var_team_sc_content' ),
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_team_sc_content_hint' ),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => mashup_allow_special_char( $mashup_var_team_text ),
                                                'id' => 'team_text',
                                                'cust_name' => 'mashup_var_team_text[]',
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
                            ?>
                        </div>
                        <div class="hidden-object">
                            <?php
                            $mashup_opt_array = array(
                                'std' => $team_num,
                                'id' => '',
                                'before' => '',
                                'after' => '',
                                'classes' => 'fieldCounter',
                                'extra_atr' => '',
                                'cust_id' => '',
                                'cust_name' => 'team_num[]',
                                'return' => false,
                                'required' => false
                            );
                            $mashup_var_form_fields->mashup_var_form_hidden_render( $mashup_opt_array );
                            ?>
                        </div>
                        <div class="wrapptabbox">
                            <div class="opt-conts">
                                <ul class="form-elements noborder">
                                    <li class="to-field"> <a href="javascript:void(0);" class="add_servicesss cs-main-btn" onclick="mashup_shortcode_element_ajax_call('team', 'shortcode-item-<?php echo mashup_allow_special_char( $mashup_counter ); ?>', '<?php echo mashup_allow_special_char( admin_url( 'admin-ajax.php' ) ); ?>')"><i class="icon-plus-circle"></i><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_team_sc_add_item' ) ); ?></a> </li>
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
                                        'std' => 'team',
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
                                    } ?>
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
        ?>
        <?php
    }

    add_action( 'wp_ajax_mashup_var_page_builder_team', 'mashup_var_page_builder_team' );
}

if ( ! function_exists( 'mashup_save_page_builder_data_team_callback' ) ) {

    /**
     * Save data for team shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_team_callback( $args ) {
        $data = $args['data'];
        $counters = $args['counters'];
        $widget_type = $args['widget_type'];
        $column = $args['column'];
        if ( $widget_type == "team" ) {
            $shortcode = $shortcode_item = '';
            $team = $column->addChild( 'team' );
            $team->addChild( 'page_element_size', htmlspecialchars( $data['team_element_size'][$counters['mashup_global_counter_team']] ) );
            $team->addChild( 'team_element_size', htmlspecialchars( $data['team_element_size'][$counters['mashup_global_counter_team']] ) );
            if ( isset( $data['mashup_widget_element_num'][$counters['mashup_counter']] ) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode' ) {
                $shortcode_str = stripslashes( $data['shortcode']['team'][$counters['mashup_shortcode_counter_team']] );
                $counters['mashup_shortcode_counter_team'] ++;
                $team->addChild( 'mashup_shortcode', htmlspecialchars( $shortcode_str, ENT_QUOTES ) );
            } else {
                if ( isset( $data['team_num'][$counters['mashup_counter_team']] ) && $data['team_num'][$counters['mashup_counter_team']] > 0 ) {
                    for ( $i = 1; $i <= $data['team_num'][$counters['mashup_counter_team']]; $i ++  ) {
                        $shortcode_item .= '[mashup_team_item ';
                        if ( isset( $data['mashup_var_team_name'][$counters['mashup_counter_team_node']] ) && $data['mashup_var_team_name'][$counters['mashup_counter_team_node']] != '' ) {
                            $shortcode_item .= 'mashup_var_team_name="' . htmlspecialchars( $data['mashup_var_team_name'][$counters['mashup_counter_team_node']], ENT_QUOTES ) . '" ';
                        }
                        if ( isset( $data['mashup_var_team_designation'][$counters['mashup_counter_team_node']] ) && $data['mashup_var_team_designation'][$counters['mashup_counter_team_node']] != '' ) {
                            $shortcode_item .= 'mashup_var_team_designation="' . htmlspecialchars( $data['mashup_var_team_designation'][$counters['mashup_counter_team_node']], ENT_QUOTES ) . '" ';
                        }
                        if ( isset( $data['mashup_var_team_link'][$counters['mashup_counter_team_node']] ) && $data['mashup_var_team_link'][$counters['mashup_counter_team_node']] != '' ) {
                            $shortcode_item .= 'mashup_var_team_link="' . htmlspecialchars( $data['mashup_var_team_link'][$counters['mashup_counter_team_node']], ENT_QUOTES ) . '" ';
                        }
                        if ( isset( $data['mashup_var_team_image'][$counters['mashup_counter_team_node']] ) && $data['mashup_var_team_image'][$counters['mashup_counter_team_node']] != '' ) {
                            $shortcode_item .= 'mashup_var_team_image="' . htmlspecialchars( $data['mashup_var_team_image'][$counters['mashup_counter_team_node']], ENT_QUOTES ) . '" ';
                        }
                        $shortcode_item .= ']';
                        if ( isset( $data['mashup_var_team_text'][$counters['mashup_counter_team_node']] ) && $data['mashup_var_team_text'][$counters['mashup_counter_team_node']] != '' ) {
                            $shortcode_item .= htmlspecialchars( $data['mashup_var_team_text'][$counters['mashup_counter_team_node']], ENT_QUOTES );
                        }
                        $shortcode_item .= '[/mashup_team_item]';
                        $counters['mashup_counter_team_node'] ++;
                    }
                }
                $section_title = '';
                if ( isset( $data['mashup_var_team_title'][$counters['mashup_counter_team']] ) && $data['mashup_var_team_title'][$counters['mashup_counter_team']] != '' ) {
                    $section_title .= 'mashup_var_team_title="' . htmlspecialchars( $data['mashup_var_team_title'][$counters['mashup_counter_team']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_team_sub_title'][$counters['mashup_counter_team']] ) && $data['mashup_var_team_sub_title'][$counters['mashup_counter_team']] != '' ) {
                    $section_title .= 'mashup_var_team_sub_title="' . htmlspecialchars( $data['mashup_var_team_sub_title'][$counters['mashup_counter_team']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_team_align'][$counters['mashup_counter_team']] ) && $data['mashup_var_team_align'][$counters['mashup_counter_team']] != '' ) {
                    $section_title .= 'mashup_var_team_align="' . htmlspecialchars( $data['mashup_var_team_align'][$counters['mashup_counter_team']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_team_views'][$counters['mashup_counter_team']] ) && $data['mashup_var_team_views'][$counters['mashup_counter_team']] != '' ) {
                    $section_title .= 'mashup_var_team_views="' . htmlspecialchars( $data['mashup_var_team_views'][$counters['mashup_counter_team']], ENT_QUOTES ) . '" ';
                }
                if ( isset( $data['mashup_var_team_col'][$counters['mashup_counter_team']] ) && $data['mashup_var_team_col'][$counters['mashup_counter_team']] != '' ) {
                    $section_title .= 'mashup_var_team_col="' . htmlspecialchars( $data['mashup_var_team_col'][$counters['mashup_counter_team']], ENT_QUOTES ) . '" ';
                }
                $shortcode = '[mashup_team ' . $section_title . ' ]' . $shortcode_item . '[/mashup_team]';
                $team->addChild( 'mashup_shortcode', $shortcode );
                $counters['mashup_counter_team'] ++;
            }
            $counters['mashup_global_counter_team'] ++;
        }
        return array(
            'data' => $data,
            'counters' => $counters,
            'widget_type' => $widget_type,
            'column' => $column,
        );
    }

    add_filter( 'mashup_save_page_builder_data', 'mashup_save_page_builder_data_team_callback' );
}

if ( ! function_exists( 'mashup_load_shortcode_counters_team_callback' ) ) {

    /**
     * Populate team shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_team_callback( $counters ) {
        $counters['mashup_shortcode_counter_team'] = 0;
        $counters['mashup_global_counter_team'] = 0;
        $counters['mashup_counter_team'] = 0;
        $counters['mashup_counter_team_node'] = 0;
        return $counters;
    }

    add_filter( 'mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_team_callback' );
}

if ( ! function_exists( 'mashup_shortcode_names_list_populate_team_callback' ) ) {

    /**
     * Populate team shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_team_callback( $shortcode_array ) {
        $shortcode_array['team'] = array(
            'title' => mashup_var_frame_text_srt( 'mashup_var_team' ),
            'name' => 'team',
            'icon' => 'icon-user',
            'categories' => 'loops',
        );
        return $shortcode_array;
    }

    add_filter( 'mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_team_callback' );
}

if ( ! function_exists( 'mashup_element_list_populate_team_callback' ) ) {

    /**
     * Populate team shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_team_callback( $element_list ) {
        $element_list['team'] = mashup_var_frame_text_srt( 'mashup_var_team' );
        return $element_list;
    }

    add_filter( 'mashup_element_list_populate', 'mashup_element_list_populate_team_callback' );
}

if ( ! function_exists( 'mashup_shortcode_sub_element_ui_team_callback' ) ) {

    /**
     * Render UI for sub element in team settings.
     *
     * @param	array $args
     */
    function mashup_shortcode_sub_element_ui_team_callback( $args ) {
        $type = $args['type'];
        $mashup_var_html_fields = $args['html_fields'];
        if ( $type == 'team' ) {
            $rand_id = 'multiple_team_' . rand( 455345, 23454390 );
            ?>
            <div class='cs-wrapp-clone cs-shortcode-wrapp  cs-pbwp-content'  id="mashup_infobox_<?php echo mashup_allow_special_char( $rand_id ); ?>">
                <header>
                    <h4><i class='icon-arrows'></i><?php echo esc_html( mashup_var_frame_text_srt( 'mashup_var_team_sc' ) ); ?></h4>
                    <a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo esc_html( mashup_var_frame_text_srt( 'mashup_var_remove' ) ); ?></a></header>
                        <?php
                        $mashup_opt_array = array(
                            'name' => mashup_var_frame_text_srt( 'mashup_var_team_sc_name' ),
                            'desc' => '',
                            'hint_text' => mashup_var_frame_text_srt( 'mashup_var_team_sc_name_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => '',
                                'id' => 'team_name',
                                'cust_name' => 'mashup_var_team_name[]',
                                'classes' => '',
                                'return' => true,
                            ),
                        );
                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                        $mashup_opt_array = array(
                            'name' => mashup_var_frame_text_srt( 'mashup_var_team_sc_designation' ),
                            'desc' => '',
                            'hint_text' => mashup_var_frame_text_srt( 'mashup_var_team_sc_designation_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => '',
                                'id' => 'team_designation',
                                'cust_name' => 'mashup_var_team_designation[]',
                                'classes' => '',
                                'return' => true,
                            ),
                        );
                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_team_sc_link' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_team_sc_link_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => esc_html( $mashup_var_team_link ),
                                'id' => 'team_link' . $mashup_counter,
                                'cust_name' => 'mashup_var_team_link[]',
                                'classes' => '',
                                'return' => true,
                            ),
                        );
                        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                       $mashup_opt_array = array(
                            'std' => '',
                            'id' => 'team_image_array',
                            'main_id' => 'team_image_array',
                            'name' => mashup_var_frame_text_srt( 'mashup_var_team_sc_image' ),
                            'desc' => '',
                            'hint_text' => mashup_var_frame_text_srt( 'mashup_var_team_sc_image_hint' ),
                            'echo' => true,
                            'array' => true,
                            'field_params' => array(
                                'std' => '',
                                'cust_id' => '',
                                'cust_name' => 'mashup_var_team_image[]',
                                'id' => 'team_image_array',
                                'return' => true,
                                'array' => true,
                            ),
                        );
                        $mashup_var_html_fields->mashup_var_upload_file_field( $mashup_opt_array );
                        $mashup_opt_array = array(
                            'name' => mashup_var_theme_text_srt( 'mashup_var_team_sc_content' ),
                            'desc' => '',
                            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_team_sc_content_hint' ),
                            'echo' => true,
                            'field_params' => array(
                                'std' => '',
                                'id' => 'team_text',
                                'cust_name' => 'mashup_var_team_text[]',
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
    add_action( 'mashup_shortcode_sub_element_ui', 'mashup_shortcode_sub_element_ui_team_callback' );
}