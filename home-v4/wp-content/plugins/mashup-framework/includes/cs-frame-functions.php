<?php
/**
 * Core Functions of Plugin
 * @return
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( class_exists( 'RevSlider' ) && ! class_exists( 'mashup_var_RevSlider' ) ) {

    class mashup_var_RevSlider extends RevSlider {
        /*
         * Get sliders alias, Title, ID
         */

        public function getAllSliderAliases() {
            $where = "";
            $response = $this->db->fetch( GlobalsRevSlider::$table_sliders, $where, "id" );
            $arrAliases = array();
            $slider_array = array();
            foreach ( $response as $arrSlider ) {
                $arrAliases['id'] = $arrSlider["id"];
                $arrAliases['title'] = $arrSlider["title"];
                $arrAliases['alias'] = $arrSlider["alias"];
                $slider_array[] = $arrAliases;
            }
            return($slider_array);
        }

    }

}

if ( ! function_exists( 'mashup_header_album_player' ) ) {

    function mashup_header_album_player( $html = '' ) {
        global $mashup_var_options;
        $mashup_header_music_url = $mashup_var_options['mashup_var_album_url'];
        $music_data = '';
        if ( isset( $mashup_header_music_url ) && ! empty( $mashup_header_music_url ) ) {
            $music_data = mashup_header_album_play( esc_url( $mashup_header_music_url ) );
        }
        echo $music_data;
    }

    add_action( 'mashup_header_user_option', 'mashup_header_album_player', 11 );
}

if ( ! function_exists( 'mashup_header_album_play' ) ) {

    function mashup_header_album_play( $music_url = '' ) {
        $track_randd = rand( 123, 76875 );
        $track_counter = 0;
        $track_class = ' mashup-dev-track mashup-dev-first-track';
        $html = '';
        $html .= '<script type="text/javascript">
					jQuery(document).ready(function ($) {
						$("#jquery_jplayer_' . $track_randd . '").jPlayer({
							ready: function () {
								$(this).jPlayer("setMedia", {
									title: "' . (isset( $mashup_alb_names[$track_counter] ) && $mashup_alb_names[$track_counter] != '' ? $mashup_alb_names[$track_counter] : __( 'audio', CSFRAME_DOMAIN )) . '",
									mp3: "' . $music_url . '",
									m4a: "' . $music_url . '",
									oga: "' . $music_url . '"
								});
							},
							play: function () { // To avoid multiple jPlayers playing together.
								$(this).jPlayer("pauseOthers");
							},
							supplied: "mp3, m4a, oga",
							cssSelectorAncestor: "#jp_container_' . $track_randd . '",
							wmode: "window",
							globalVolume: true,
							useStateClassSkin: true,
							autoBlur: false,
							smoothPlayBar: true,
							keyEnabled: true,
							remainingDuration: true,
						});
					});
					</script>
					<div id="jquery_jplayer_' . $track_randd . '" class="jp-jplayer"></div>
					<div id="jp_container_' . $track_randd . '" class="jp-audio" role="application" aria-label="media player" style="display:none;">
						<div class="jp-type-single">
							<div class="jp-gui jp-interface">
								<div class="jp-controls-holder">
									<div class="jp-controls">
										<button class="jp-play" role="button" tabindex="0">' . __( 'play', CSFRAME_DOMAIN ) . '</button>
										<button class="jp-stop" role="button" tabindex="0">' . __( 'stop', CSFRAME_DOMAIN ) . '</button>
									</div>
								</div>
							</div>
						</div>
					</div>';
        $html .= '<div class="user-play">
			<a href="javascript:void(0);" class="btn-play mashup-dev-play-btnn play-audio" data-id="' . $track_randd . '"></a>
		  </div>';

        return $html;
    }

}
if ( ! class_exists( 'mashup_var_core_functions' ) ) {

    class mashup_var_core_functions {

        public function __construct() {
            add_action( 'save_post', array( $this, 'mashup_var_save_custom_option' ) );
        }

        /**
         * Save Custom Fields
         * of Post Types
         * @return
         */
        public function mashup_var_save_custom_option( $post_id = '' ) {
            global $post;

            if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
                return;
            }
            if ( mashup_var_frame()->is_request( 'admin' ) ) {
                $mashup_var_data = array();
                foreach ( $_POST as $key => $value ) {
                    if ( strstr( $key, 'mashup_var_' ) ) {
                        $mashup_var_data[$key] = $value;
                        update_post_meta( $post_id, $key, $value );
                    }
                }
                update_post_meta( $post_id, 'mashup_var_full_data', $mashup_var_data );
            }
        }

    }

}


/**
 * Framework Form
 * @Fields
 *
 */
if ( ! function_exists( 'mashup_column_pb' ) ) {

    function mashup_column_pb( $die = 0, $shortcode = '' ) {
        global $post, $pagenow, $mashup_node, $mashup_xmlObject, $mashup_count_node, $column_container, $coloum_width, $mashup_var_html_fields, $mashup_var_form_fields, $mashup_var_frame_static_text;

        $total_widget = 0;
        $i = 1;
        $mashup_page_section_title = $mashup_page_section_height = $mashup_page_section_width = '';
        $mashup_section_background_option = '';
        $mashup_var_section_title = '';
        $mashup_var_section_subtitle = '';
        $title_sub_title_alignment = '';
        $mashup_var_section_style = '';
        $mashup_section_bg_image = '';
        $mashup_section_bg_image_position = '';
        $mashup_section_bg_image_repeat = '';
        $mashup_section_parallax = '';
        $mashup_section_nopadding = '';
        $mashup_section_nomargin = '';
        $mashup_section_slick_slider = '';
        $mashup_section_custom_slider = '';
        $mashup_section_video_url = '';
        $mashup_section_video_mute = '';
        $mashup_section_video_autoplay = '';
        $mashup_section_border_bottom = '0';
        $mashup_section_border_top = '0';
        $mashup_section_border_color = '#e0e0e0';
        $mashup_section_padding_top = '60';
        $mashup_section_padding_bottom = '30';
        $mashup_section_margin_top = '0';
        $mashup_section_margin_bottom = '0';
        $mashup_section_css_id = '';
        $mashup_section_view = 'container';
        $mashup_layout = '';
        $mashup_sidebar_left = '';
        $mashup_sidebar_right = '';
        $mashup_sidebar_right_second = '';
        $mashup_sidebar_left_second = '';
        $mashup_section_bg_color = '';
        if ( isset( $column_container ) ) {
            $column_attributes = $column_container->attributes();
            $column_class = $column_attributes->class;
            $mashup_var_section_title = $column_attributes->mashup_var_section_title;
            $mashup_var_section_subtitle = $column_attributes->mashup_var_section_subtitle;
            $mashup_var_section_style = $column_attributes->mashup_var_section_style;
            $title_sub_title_alignment = $column_attributes->title_sub_title_alignment;
            $mashup_section_background_option = $column_attributes->mashup_section_background_option;
            $mashup_section_bg_image = $column_attributes->mashup_section_bg_image;
            $mashup_section_bg_image_position = $column_attributes->mashup_section_bg_image_position;
            $mashup_section_bg_image_repeat = $column_attributes->mashup_section_bg_image_repeat;
            $mashup_section_slick_slider = $column_attributes->mashup_section_slick_slider;
            $mashup_section_custom_slider = $column_attributes->mashup_section_custom_slider;
            $mashup_section_video_url = $column_attributes->mashup_section_video_url;
            $mashup_section_video_mute = $column_attributes->mashup_section_video_mute;
            $mashup_section_video_autoplay = $column_attributes->mashup_section_video_autoplay;
            $mashup_section_bg_color = $column_attributes->mashup_section_bg_color;
            $mashup_section_parallax = $column_attributes->mashup_section_parallax;
            $mashup_section_nopadding = $column_attributes->mashup_section_nopadding;
            $mashup_section_nomargin = $column_attributes->mashup_section_nomargin;
            $mashup_section_padding_top = $column_attributes->mashup_section_padding_top;
            $mashup_section_padding_bottom = $column_attributes->mashup_section_padding_bottom;
            $mashup_section_border_bottom = $column_attributes->mashup_section_border_bottom;
            $mashup_section_border_top = $column_attributes->mashup_section_border_top;
            $mashup_section_border_color = $column_attributes->mashup_section_border_color;
            $mashup_section_margin_top = $column_attributes->mashup_section_margin_top;
            $mashup_section_margin_bottom = $column_attributes->mashup_section_margin_bottom;
            $mashup_section_css_id = $column_attributes->mashup_section_css_id;
            $mashup_section_view = $column_attributes->mashup_section_view;
            $mashup_layout = $column_attributes->mashup_layout;
            $mashup_sidebar_left = $column_attributes->mashup_sidebar_left;
            $mashup_sidebar_right = $column_attributes->mashup_sidebar_right;
            $mashup_sidebar_right_second = $column_attributes->mashup_sidebar_right_second;
            $mashup_sidebar_left_second = $column_attributes->mashup_sidebar_left_second;
        }
        $style = '';
        if ( isset( $_POST['action'] ) ) {
            $name = $_POST['action'];
            $mashup_counter = $_POST['counter'];
            $total_column = $_POST['total_column'];
            $column_class = $_POST['column_class'];
            $postID = $_POST['postID'];
            $randomno = rand( 12345678, 93242432 );
            $rand = rand( 12345678, 93242432 );
            $style = '';
        } else {
            $postID = $post->ID;
            $name = '';
            $mashup_counter = '';
            $total_column = 0;
            $rand = rand( 1, 999 );
            $randomno = rand( 34, 3242432 );
            $name = $_REQUEST['action'];
            $style = ' style="display:none;"';
        }
        $mashup_page_elements_name = mashup_shortcode_names();
        $mashup_page_categories_name = mashup_elements_categories();
        $mashup_var_add_element = mashup_var_frame_text_srt( 'mashup_var_add_element' );
        $mashup_var_search = mashup_var_frame_text_srt( 'mashup_var_search' );
        $mashup_var_show_all = mashup_var_frame_text_srt( 'mashup_var_search' );
        $mashup_var_filter_by = mashup_var_frame_text_srt( 'mashup_var_filter_by' );
        $mashup_var_insert_sc = mashup_var_frame_text_srt( 'mashup_var_insert_sc' );
        ?>
        <div class="cs-page-composer composer-<?php echo absint( $rand ) ?>" id="composer-<?php echo absint( $rand ) ?>" style="display:none">
            <div class="page-elements">
                <div class="cs-heading-area">

                    <h5> <i class="icon-plus-circle"></i> <?php echo esc_html( $mashup_var_add_element ); ?>  </h5>
                    <span class='cs-btnclose' onclick='javascript:mashup_frame_removeoverlay("composer-<?php echo absint( $rand ) ?>", "append")'><i class="icon-cancel"></i></span> 
                </div>
                <script>
                    jQuery(document).ready(function ($) {
                        'use strict';
                        mashup_page_composer_filterable('<?php echo absint( $rand ) ?>');
                    });
                </script>
                <div class="cs-filter-content">
                    <p>

                        <?php
                        if ( function_exists( 'mashup_var_date_picker' ) ) {

                            mashup_var_date_picker();
                        }
                        $mashup_opt_array = array(
                            'std' => '',
                            'cust_id' => 'quicksearch' . absint( $rand ),
                            'classes' => '',
                            'cust_name' => '',
                            'extra_atr' => ' placeholder=' . $mashup_var_search,
                        );
                        $mashup_var_form_fields->mashup_var_form_text_render( $mashup_opt_array );
                        ?>

                    </p>
                    <div class="cs-filtermenu-wrap">
                        <h6><?php echo esc_html( $mashup_var_filter_by ); ?></h6>
                        <ul class="cs-filter-menu" id="filters<?php echo absint( $rand ) ?>">
                            <li data-filter="all" class="active"><?php echo esc_html( $mashup_var_show_all ); ?></li>
                            <?php foreach ( $mashup_page_categories_name as $key => $value ) { ?>
                                <li data-filter="<?php echo esc_attr( $key ); ?>"><?php echo esc_attr( $value ); ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="cs-filter-inner" id="page_element_container<?php echo absint( $rand ) ?>">
                        <?php foreach ( $mashup_page_elements_name as $key => $value ) { ?>
                            <div class="element-item <?php echo esc_attr( $value['categories'] ); ?>"> 
                                <a href='javascript:mashup_frame_ajax_widget("mashup_var_page_builder_<?php echo esc_js( $value['name'] ); ?>","<?php echo esc_js( $rand ) ?>")'>
                                    <?php mashup_page_composer_elements( $value['title'], $value['icon'] ); ?>
                                </a> 
                            </div>
                        <?php } ?>                    
                    </div>
                </div>
            </div>
        </div>
        <?php
        if ( isset( $shortcode ) && $shortcode <> '' ) {
            ?>
            <a class="button" href="javascript:mashup_frame_createpop('composer-<?php echo esc_js( $rand ) ?>', 'filter')"><i class="icon-plus-circle"></i><?php echo esc_html( $mashup_var_insert_sc ); ?> </a>
            <?php
        } else {
            ?>
            <div id="<?php echo esc_attr( $randomno ); ?>_del" class="column columnmain parentdeletesection column_100" >
                <div class="column-in"> <a class="button" href="javascript:mashup_frame_createpop('composer-<?php echo esc_js( $rand ) ?>', 'filter')"><i class="icon-plus-circle"></i> <?php echo esc_html( $mashup_var_add_element ); ?></a>
                    <p> 
                        <a href="javascript:mashup_frame_createpop('<?php echo esc_js( $column_class . $randomno ); ?>','filterdrag')" class="options">
                            <i class="icon-settings"></i></a> &nbsp; <a href="#" class="delete-it btndeleteitsection"><i class="icon-trash-o"></i></a> &nbsp; 
                    </p>
                </div>
                <div class="column column_container page_section <?php echo sanitize_html_class( $column_class ); ?>" >
                    <?php
                    $parts = explode( '_', $column_class );
                    if ( $total_column > 0 ) {
                        for ( $i = 1; $i <= $total_column; $i ++  ) {
                            ?>
                            <div class="dragarea" data-item-width="col_width_<?php echo esc_attr( $parts[$i] ); ?>">

                                <?php
                                $mashup_opt_array = array(
                                    'std' => '0',
                                    'cust_id' => '',
                                    'classes' => 'textfld',
                                    'cust_name' => 'total_widget[]',
                                    'extra_atr' => '',
                                );
                                $mashup_var_form_fields->mashup_var_form_hidden_render( $mashup_opt_array );
                                ?>

                                <div class="draginner" id="counter_<?php echo absint( $rand ) ?>"></div>
                            </div>
                            <?php
                        }
                    }
                    $i = 1;

                    if ( isset( $column_container ) ) {
                        global $wpdb;
                        $total_column = count( $column_container->children() );
                        $section = 0;
                        $section_widget_element_num = 0;
                        foreach ( $column_container->children() as $column ) {
                            $section ++;
                            $total_widget = count( $column->children() );
                            ?>
                            <script type="text/javascript">

                                function mashup_var_gallery_view(val) {
                                    var mashup_var_gallery_view = jQuery('.gallery_slider_view').val();
                                    if (mashup_var_gallery_view == 'slider') {
                                        jQuery('#slider_gallery').show();
                                        jQuery('#slider_gallery').show();
                                        jQuery('.slider_view_paging').hide();
                                        jQuery('#slider_category').hide();
                                        jQuery('.slider_view_paging_unique').hide();
                                    } else if (mashup_var_gallery_view == 'unique_gallery') {
                                        jQuery('.slider_view_paging_unique').show();
                                        jQuery('.slider_view_paging_style').hide();
                                    } else {
                                        jQuery('#slider_gallery').hide();
                                        jQuery('.slider_view_paging_unique').hide();
                                        jQuery('.slider_view_paging').show();
                                        jQuery('#slider_category').show();
                                        jQuery('#slider_category_column').hide();
                                    }
                                }
                            </script>
                            <div class="dragarea" data-item-width="col_width_<?php echo esc_attr( $parts[$i] ) ?>">
                                <div class="toparea">
                                    <?php
                                    $mashup_opt_array = array(
                                        'std' => esc_attr( $total_widget ),
                                        'cust_id' => '',
                                        'classes' => 'textfld page-element-total-widget',
                                        'cust_name' => 'total_widget[]',
                                        'extra_atr' => '',
                                    );
                                    $mashup_var_form_fields->mashup_var_form_hidden_render( $mashup_opt_array );
                                    ?>
                                </div>
                                <div class="draginner" id="counter_<?php echo absint( $rand ) ?>">
                                    <?php
                                    $shortcode_element = '';
                                    $filter_element = 'filterdrag';
                                    $shortcode_view = '';
                                    $global_array = array();
                                    $section_widget__element = 0;
                                    $all_shortcode_list = mashup_shortcode_names();
                                    foreach ( $column->children() as $mashup_node ) {
                                        $section_widget__element ++;
                                        $shortcode_element_idd = $rand . '_' . $section_widget__element;
                                        $global_array[] = $mashup_node;
                                        $mashup_count_node ++;
                                        $mashup_counter = $postID . $mashup_count_node;
                                        $a = $name = "mashup_var_page_builder_" . $mashup_node->getName();
                                        $coloumn_class = 'column_' . $mashup_node->page_element_size;
                                        $type = '';
                                        if ( $mashup_node->getName() == 'page_element' ) {
                                            $type = 'page_element';
                                        }
                                        $mashup_var_quick_quote = mashup_var_frame_text_srt( 'mashup_var_quick_quote' );
                                        $mashup_var_edit_options = mashup_var_frame_text_srt( 'mashup_var_edit_options' );
                                        ?>
                                        <div id="<?php echo esc_attr( $name . $mashup_counter ); ?>_del" class="column  parentdelete  <?php echo esc_attr( $coloumn_class ); ?> <?php echo esc_attr( $shortcode_view ); ?>" item="<?php echo esc_attr( $mashup_node->getName() ); ?>" data="<?php echo mashup_element_size_data_array_index( $mashup_node->page_element_size ) ?>" >
                                            <?php mashup_ajax_element_setting( $mashup_node->getName(), $mashup_counter, $mashup_node->page_element_size, $shortcode_element_idd, $postID, $element_description = '', $mashup_node->getName() . '-icon', $type ); ?>
                                            <div class="cs-wrapp-class-<?php echo esc_attr( $mashup_counter ) ?> <?php echo esc_attr( $shortcode_element ); ?>" id="<?php echo esc_attr( $name . $mashup_counter ) ?>" style="display: none;">
                                                <div class="cs-heading-area">
                                                    <?php
                                                    $shortcode_name = '';
                                                    if ( $mashup_node->getName() == 'quick_slider' ) {
                                                        $shortcode_name = $mashup_var_quick_quote;
                                                    } else {
                                                        //$shortcode_name = str_replace("_", " ", $mashup_node->getName());
                                                        $shortcode_name = $all_shortcode_list[$mashup_node->getName()]['title'];
                                                    }
                                                    ?>
                                                    <h5><?php echo sprintf( $mashup_var_edit_options, esc_html( $shortcode_name ) ) ?></h5>

                                                    <a href="javascript:;" onclick="javascript:mashup_frame_removeoverlay('<?php echo esc_attr( $name . $mashup_counter ); ?>', '<?php echo esc_attr( $filter_element ); ?>')" class="cs-btnclose"><i class="icon-cancel"></i></a>
                                                </div>
                                                <?php
                                                $mashup_opt_array = array(
                                                    'std' => 'shortcode',
                                                    'cust_id' => 'shortcode_' . $name . $mashup_counter,
                                                    'classes' => 'cs-wiget-element-type',
                                                    'cust_name' => 'mashup_widget_element_num[]',
                                                    'extra_atr' => '',
                                                );
                                                $mashup_var_form_fields->mashup_var_form_hidden_render( $mashup_opt_array );
                                                ?>
                                                <div class="pagebuilder-data-load">
                                                    <?php
                                                    $mashup_opt_array = array(
                                                        'std' => $mashup_node->getName(),
                                                        'cust_id' => '',
                                                        'classes' => '',
                                                        'cust_name' => 'mashup_orderby[]',
														'force_std' => true,
                                                        'extra_atr' => '',
                                                    );
                                                    $mashup_var_form_fields->mashup_var_form_hidden_render( $mashup_opt_array );
                                                    $mashup_opt_array = array(
                                                        'std' => htmlspecialchars_decode( $mashup_node->mashup_shortcode ),
                                                        'cust_id' => '',
                                                        'classes' => 'cs-textarea-val',
                                                        'cust_name' => 'shortcode[' . $mashup_node->getName() . '][]',
														'force_std' => true,
                                                        'extra_atr' => ' style=display:none;',
                                                    );
                                                    $mashup_var_form_fields->mashup_var_form_textarea_render( $mashup_opt_array );
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                            $i ++;
                        }
                    }
                    ?>
                </div>
                <div id="<?php echo esc_attr( $column_class . $randomno ); ?>" style="display:none">
                    <div class="cs-heading-area">
                        <h5><?php echo mashup_var_frame_text_srt( 'mashup_var_edit_page' ); ?></h5>
                        <a href="javascript:mashup_frame_removeoverlay('<?php echo esc_js( $column_class . $randomno ); ?>','filterdrag')" class="cs-btnclose"><i class="icon-cancel"></i></a> </div>
                    <div class="cs-pbwp-content">
                        <div class="cs-wrapp-clone cs-shortcode-wrapp">
                            <?php
                            $mashup_opt_array = array(
                                'name' => mashup_var_frame_text_srt( 'mashup_var_title' ),
                                'desc' => '',
                                'hint_text' => mashup_var_frame_text_srt( 'mashup_var_title_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => $mashup_var_section_title,
                                    'id' => 'section_title',
                                    'classes' => '',
                                    'array' => true,
                                    'return' => true,
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                            $mashup_opt_array = array(
                                'name' => mashup_var_frame_text_srt( 'mashup_var_subtitle' ),
                                'desc' => '',
                                'hint_text' => mashup_var_frame_text_srt( 'mashup_var_subtitle_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => $mashup_var_section_subtitle,
                                    'id' => 'section_subtitle',
                                    'classes' => '',
                                    'array' => true,
                                    'return' => true,
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

                            $mashup_opt_array = array(
                                'name' => mashup_var_frame_text_srt( 'mashup_var_title_sub_title_align' ),
                                'desc' => '',
                                'hint_text' => mashup_var_frame_text_srt( 'mashup_var_title_sub_title_align_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => $title_sub_title_alignment,
                                    'id' => '',
                                    'cust_id' => '',
                                    'cust_name' => 'title_sub_title_alignment[]',
                                    'classes' => 'chosen-select-no-single select-medium',
                                    'options' => array(
                                        'left' => mashup_var_frame_text_srt( 'mashup_var_align_left' ),
                                        'center' => mashup_var_frame_text_srt( 'mashup_var_align_center' ),
                                        'right' => mashup_var_frame_text_srt( 'mashup_var_align_right' ),
                                    ),
                                    'return' => true,
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
                            
                            $mashup_opt_array = array(
                                'name' => mashup_var_frame_text_srt( 'mashup_var_section_style' ),
                                'desc' => '',
                                'hint_text' => mashup_var_frame_text_srt( 'mashup_var_section_style_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => $mashup_var_section_style,
                                    'id' => '',
                                    'cust_id' => '',
                                    'cust_name' => 'mashup_var_section_style[]',
                                    'classes' => 'chosen-select-no-single select-medium',
                                    'options' => array(
                                        'default' => mashup_var_frame_text_srt( 'mashup_var_default' ),
                                        'fancy' => mashup_var_frame_text_srt( 'mashup_var_fancy' ),
                                        'modern' => mashup_var_frame_text_srt( 'mashup_var_modern' ),
                                    ),
                                    'return' => true,
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );

                            $mashup_opt_array = array(
                                'name' => mashup_var_frame_text_srt( 'mashup_var_bg_view' ),
                                'desc' => '',
                                'hint_text' => mashup_var_frame_text_srt( 'mashup_var_choose_bg' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => $mashup_section_background_option,
                                    'id' => '',
                                    'cust_id' => '',
                                    'cust_name' => 'mashup_section_background_option[]',
                                    'classes' => 'chosen-select-no-single select-medium',
                                    'options' => array(
                                        'no-image' => mashup_var_frame_text_srt( 'mashup_var_none' ),
                                        'section-custom-background-image' => mashup_var_frame_text_srt( 'mashup_var_bg_image' ),
                                        'section-custom-slider' => mashup_var_frame_text_srt( 'mashup_var_custom_slider' ),
                                        'section_background_video' => mashup_var_frame_text_srt( 'mashup_var_video' ),
                                    ),
                                    'return' => true,
                                    'extra_atr' => 'onchange="javascript:mashup_section_background_settings_toggle(this.value, ' . absint( $randomno ) . ')"',
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
                            ?>    
                            <div class="meta-body noborder section-custom-background-image-<?php echo esc_attr( $randomno ); ?>" style=" <?php
                            if ( $mashup_section_background_option == "section-custom-background-image" ) {
                                echo "display:block";
                            } else
                                echo "display:none";
                            ?>">
                                     <?php
                                     $mashup_opt_array = array(
                                         'std' => $mashup_section_bg_image,
                                         'id' => 'section_bg_image',
                                         'name' => mashup_var_frame_text_srt( 'mashup_var_bg_image' ),
                                         'desc' => '',
                                         'force_std' => true,
                                         'echo' => true,
                                         'array' => true,
                                         'field_params' => array(
                                             'std' => $mashup_section_bg_image,
                                             'cust_id' => '',
                                             'id' => 'section_bg_image',
                                             'force_std' => true,
                                             'return' => true,
                                             'array' => true,
                                             'array_txt' => false,
                                         ),
                                     );
                                     $mashup_var_html_fields->mashup_var_upload_file_field( $mashup_opt_array );
                                     $mashup_opt_array = array(
                                         'name' => mashup_var_frame_text_srt( 'mashup_var_bg_position' ),
                                         'desc' => '',
                                         'hint_text' => mashup_var_frame_text_srt( 'mashup_var_bg_position_hint' ),
                                         'echo' => true,
                                         'field_params' => array(
                                             'std' => $mashup_section_bg_image_position,
                                             'id' => '',
                                             'cust_id' => '',
                                             'cust_name' => 'mashup_section_bg_image_position[]',
                                             'classes' => 'select_dropdown chosen-select-no-single select-medium',
                                             'options' => array(
                                                 'no-repeat center top' => mashup_var_frame_text_srt( 'mashup_var_no_center_top' ),
                                                 'repeat center top' => mashup_var_frame_text_srt( 'mashup_var_center_top' ),
                                                 'no-repeat center' => mashup_var_frame_text_srt( 'mashup_var_no_center' ),
                                                 'no-repeat center / cover' => mashup_var_frame_text_srt( 'mashup_var_no_center_cover' ),
                                                 'repeat center' => mashup_var_frame_text_srt( 'mashup_var_repeat_center' ),
                                                 'no-repeat left top' => mashup_var_frame_text_srt( 'mashup_var_no_left_top' ),
                                                 'repeat left top' => mashup_var_frame_text_srt( 'mashup_var_repeat_left_top' ),
                                                 'no-repeat fixed center' => mashup_var_frame_text_srt( 'mashup_var_no_fixed' ),
                                                 'no-repeat fixed center / cover' => mashup_var_frame_text_srt( 'mashup_var_no_fixed_cover' ),
                                             ),
                                             'return' => true,
                                             'extra_atr' => '',
                                         ),
                                     );
                                     $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
                                     ?>    
                            </div>
                            <div class="meta-body noborder section-slider-<?php echo esc_attr( $randomno ); ?>" style=" <?php
                            if ( $mashup_section_background_option == "section-slider" ) {
                                echo "display:block";
                            } else
                                echo "display:none";
                            ?>">
                            </div>
                            <div class="meta-body noborder section-custom-slider-<?php echo esc_attr( $randomno ); ?>" style=" <?php
                            if ( $mashup_section_background_option == "section-custom-slider" ) {
                                echo "display:block";
                            } else
                                echo "display:none";
                            ?>" >
                                     <?php
                                     $mashup_opt_array = array(
                                         'name' => mashup_var_frame_text_srt( 'mashup_var_custom_slider' ),
                                         'desc' => '',
                                         'hint_text' => mashup_var_frame_text_srt( 'mashup_var_custom_slider_hint' ),
                                         'echo' => true,
                                         'field_params' => array(
                                             'std' => esc_attr( $mashup_section_custom_slider ),
                                             'cust_id' => '',
                                             'classes' => 'txtfield',
                                             'cust_name' => 'mashup_section_custom_slider[]',
                                             'return' => true,
                                         ),
                                     );
                                     $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                                     ?>
                            </div>
                            <div class="meta-body noborder section-background-video-<?php echo esc_attr( $randomno ); ?>" style=" <?php
                            if ( $mashup_section_background_option == "section_background_video" ) {
                                echo "display:block";
                            } else
                                echo "display:none";
                            ?>">
                                <div class="form-elements">
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <label><?php echo esc_html( 'mashup_var_video_url' ); ?></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                        <div class="input-sec">
                                            <?php
                                            $mashup_opt_array = array(
                                                'std' => esc_url( mashup_var_frame_text_srt( 'mashup_section_video_url' ) ),
                                                'cust_id' => '',
                                                'id' => 'section_video_url_' . esc_attr( $randomno ),
                                                'classes' => '',
                                                'cust_name' => 'mashup_section_video_url',
                                                'extra_atr' => '',
                                            );
                                            $mashup_var_form_fields->mashup_var_form_text_render( $mashup_opt_array );
                                            ?>
                                            <label class="browse-icon">
                                                <?php
                                                $mashup_opt_array = array(
                                                    'std' => mashup_var_frame_text_srt( 'mashup_var_browse' ),
                                                    'cust_id' => '',
                                                    'cust_type' => 'button',
                                                    'classes' => 'cs-mashup-media left',
                                                    'cust_name' => 'mashup_section_video_url_' . esc_attr( $randomno ),
                                                    'extra_atr' => '',
                                                );
                                                $mashup_var_form_fields->mashup_var_form_text_render( $mashup_opt_array );
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $mashup_opt_array = array(
                                    'name' => mashup_var_frame_text_srt( 'mashup_var_mute' ),
                                    'desc' => '',
                                    'hint_text' => mashup_var_frame_text_srt( 'mashup_var_choose_mute' ),
                                    'echo' => true,
                                    'field_params' => array(
                                        'std' => $mashup_section_video_mute,
                                        'id' => '',
                                        'cust_id' => '',
                                        'cust_name' => 'mashup_section_video_mute[]',
                                        'classes' => 'select_dropdown chosen-select-no-single select-medium',
                                        'options' => array(
                                            'yes' => mashup_var_frame_text_srt( 'mashup_var_yes' ),
                                            'no' => mashup_var_frame_text_srt( 'mashup_var_no' ),
                                        ),
                                        'return' => true,
                                        'extra_atr' => '',
                                    ),
                                );
                                $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
                                ?>    
                                <?php
                                $mashup_opt_array = array(
                                    'name' => mashup_var_frame_text_srt( 'mashup_var_video_auto' ),
                                    'desc' => '',
                                    'hint_text' => mashup_var_frame_text_srt( 'mashup_var_choose_video_auto' ),
                                    'echo' => true,
                                    'field_params' => array(
                                        'std' => $mashup_section_video_autoplay,
                                        'id' => '',
                                        'cust_id' => '',
                                        'cust_name' => 'mashup_section_video_autoplay[]',
                                        'classes' => 'select_dropdown chosen-select-no-single select-medium',
                                        'options' => array(
                                            'yes' => mashup_var_frame_text_srt( 'mashup_var_yes' ),
                                            'no' => mashup_var_frame_text_srt( 'mashup_var_no' ),
                                        ),
                                        'return' => true,
                                        'extra_atr' => '',
                                    ),
                                );
                                $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
                                ?>      
                            </div>
                            <?php
                            $mashup_opt_array = array(
                                'name' => mashup_var_frame_text_srt( 'mashup_var_enable_parallax' ),
                                'desc' => '',
                                'hint_text' => '',
                                'echo' => true,
                                'field_params' => array(
                                    'std' => $mashup_section_parallax,
                                    'id' => '',
                                    'cust_id' => '',
                                    'cust_name' => 'mashup_section_parallax[]',
                                    'classes' => 'select_dropdown chosen-select-no-single select-medium',
                                    'options' => array(
                                        'yes' => mashup_var_frame_text_srt( 'mashup_var_yes' ),
                                        'no' => mashup_var_frame_text_srt( 'mashup_var_no' ),
                                    ),
                                    'return' => true,
                                    'extra_atr' => '',
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
                            $mashup_opt_array = array(
                                'name' => mashup_var_frame_text_srt( 'mashup_var_section_nopadding' ),
                                'desc' => '',
                                'hint_text' => mashup_var_frame_text_srt( 'mashup_var_no_padding_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => $mashup_section_nopadding,
                                    'id' => '',
                                    'cust_id' => '',
                                    'cust_name' => 'mashup_section_nopadding[]',
                                    'classes' => 'select_dropdown chosen-select-no-single select-medium',
                                    'options' => array(
                                        'yes' => mashup_var_frame_text_srt( 'mashup_var_yes' ),
                                        'no' => mashup_var_frame_text_srt( 'mashup_var_no' ),
                                    ),
                                    'return' => true,
                                    'extra_atr' => '',
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
                            $mashup_opt_array = array(
                                'name' => mashup_var_frame_text_srt( 'mashup_var_section_nomargin' ),
                                'desc' => '',
                                'hint_text' => mashup_var_frame_text_srt( 'mashup_var_no_margin_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => $mashup_section_nomargin,
                                    'id' => '',
                                    'cust_id' => '',
                                    'cust_name' => 'mashup_section_nomargin[]',
                                    'classes' => 'select_dropdown chosen-select-no-single select-medium',
                                    'options' => array(
                                        'yes' => mashup_var_frame_text_srt( 'mashup_var_yes' ),
                                        'no' => mashup_var_frame_text_srt( 'mashup_var_no' ),
                                    ),
                                    'return' => true,
                                    'extra_atr' => '',
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
                            $mashup_opt_array = array(
                                'name' => mashup_var_frame_text_srt( 'mashup_var_select_view' ),
                                'desc' => '',
                                'hint_text' => '',
                                'echo' => true,
                                'field_params' => array(
                                    'std' => $mashup_section_view,
                                    'id' => '',
                                    'cust_id' => '',
                                    'cust_name' => 'mashup_section_view[]',
                                    'classes' => 'select_dropdown chosen-select-no-single select-medium',
                                    'options' => array(
                                        'container' => mashup_var_frame_text_srt( 'mashup_var_box' ),
                                        'wide' => mashup_var_frame_text_srt( 'mashup_var_wide' ),
                                    ),
                                    'return' => true,
                                    'extra_atr' => '',
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
                            $mashup_opt_array = array(
                                'name' => mashup_var_frame_text_srt( 'mashup_var_bg_color' ),
                                'desc' => '',
                                'hint_text' => mashup_var_frame_text_srt( 'mashup_var_choose_bg_coor' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_section_bg_color ),
                                    'cust_id' => '',
                                    'classes' => 'bg_color',
                                    'cust_name' => 'mashup_section_bg_color[]',
                                    'return' => true,
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                            //range
                            $mashup_opt_array = array(
                                'name' => mashup_var_frame_text_srt( 'mashup_var_padding_top' ),
                                'desc' => '',
                                'hint_text' => mashup_var_frame_text_srt( 'mashup_var_padding_top_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_section_padding_top ),
                                    'id' => '',
                                    'classes' => 'small',
                                    'extra_atr' => '',
                                    'cust_id' => '',
                                    'cust_name' => 'mashup_section_padding_top[]',
                                    'return' => true,
                                    'required' => false,
                                    'after' => '<span class="mashup_form_px">(px)</span>',
                                ),
                                'return' => true,
                                'extra_atr' => '',
                            );
                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                            $mashup_opt_array = array(
                                'name' => mashup_var_frame_text_srt( 'mashup_var_padding_bot' ),
                                'desc' => '',
                                'hint_text' => mashup_var_frame_text_srt( 'mashup_var_padding_bot_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_section_padding_bottom ),
                                    'id' => '',
                                    'classes' => '',
                                    'extra_atr' => '',
                                    'cust_id' => '',
                                    'cust_name' => 'mashup_section_padding_bottom[]',
                                    'return' => true,
                                    'required' => false,
                                    'after' => '<span class="mashup_form_px">(px)</span>',
                                ),
                                'return' => true,
                                'extra_atr' => '',
                            );
                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                            $mashup_opt_array = array(
                                'name' => mashup_var_frame_text_srt( 'mashup_var_margin_top' ),
                                'desc' => '',
                                'hint_text' => mashup_var_frame_text_srt( 'mashup_var_margin_top_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_section_margin_top ),
                                    'id' => '',
                                    'classes' => '',
                                    'extra_atr' => '',
                                    'cust_id' => '',
                                    'cust_name' => 'mashup_section_margin_top[]',
                                    'return' => true,
                                    'required' => false,
                                    'after' => '<span class="mashup_form_px">(px)</span>',
                                ),
                                'return' => true,
                                'extra_atr' => '',
                            );
                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                            $mashup_opt_array = array(
                                'name' => mashup_var_frame_text_srt( 'mashup_var_margin_bot' ),
                                'desc' => '',
                                'hint_text' => mashup_var_frame_text_srt( 'mashup_var_margin_bot_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_section_margin_bottom ),
                                    'id' => '',
                                    'classes' => '',
                                    'extra_atr' => '',
                                    'cust_id' => '',
                                    'cust_name' => 'mashup_section_margin_bottom[]',
                                    'return' => true,
                                    'required' => false,
                                    'after' => '<span class="mashup_form_px">(px)</span>',
                                ),
                                'return' => true,
                                'extra_atr' => '',
                            );
                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                            $mashup_opt_array = array(
                                'name' => mashup_var_frame_text_srt( 'mashup_var_border_top' ),
                                'desc' => '',
                                'hint_text' => mashup_var_frame_text_srt( 'mashup_var_border_top_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => absint( $mashup_section_border_top ),
                                    'id' => '',
                                    'classes' => '',
                                    'extra_atr' => '',
                                    'cust_id' => '',
                                    'cust_name' => 'mashup_section_border_top[]',
                                    'return' => true,
                                    'required' => false,
                                    'after' => '<span class="mashup_form_px">(px)</span>',
                                ),
                                'return' => true,
                                'extra_atr' => '',
                            );
                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                            $mashup_opt_array = array(
                                'name' => mashup_var_frame_text_srt( 'mashup_var_border_bot' ),
                                'desc' => '',
                                'hint_text' => mashup_var_frame_text_srt( 'mashup_var_border_bot_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => absint( $mashup_section_border_bottom ),
                                    'id' => '',
                                    'classes' => '',
                                    'extra_atr' => '',
                                    'cust_id' => '',
                                    'cust_name' => 'mashup_section_border_bottom[]',
                                    'return' => true,
                                    'required' => false,
                                    'after' => '<span class="mashup_form_px">(px)</span>',
                                ),
                                'return' => true,
                                'extra_atr' => '',
                            );
                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                            $mashup_opt_array = array(
                                'name' => mashup_var_frame_text_srt( 'mashup_var_border_color' ),
                                'desc' => '',
                                'hint_text' => mashup_var_frame_text_srt( 'mashup_var_choose_border_color' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_section_border_color ),
                                    'cust_id' => '',
                                    'classes' => 'bg_color',
                                    'cust_name' => 'mashup_section_border_color[]',
                                    'return' => true,
                                ),
                            );

                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                            $choose_id = '';
                            $mashup_opt_array = array(
                                'name' => mashup_var_frame_text_srt( 'mashup_var_cus_id' ),
                                'desc' => '',
                                'hint_text' => mashup_var_frame_text_srt( 'mashup_var_cus_id_hint' ),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr( $mashup_section_css_id ),
                                    'cust_id' => '',
                                    'classes' => 'txtfield',
                                    'cust_name' => 'mashup_section_css_id[]',
                                    'return' => true,
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                            ?>
                            <div class="form-elements elementhiddenn">
                                <ul class="noborder">
                                    <li class="to-label">
                                        <label><?php echo mashup_var_frame_text_srt( 'mashup_var_select_layout' ); ?></label>
                                    </li>
                                    <li class="to-field">
                                        <div class="meta-input">
                                            <div class="meta-input pattern">
                                                <div class='radio-image-wrapper'>
                                                    <?php
                                                    $checked = '';
                                                    if ( $mashup_layout == "none" ) {
                                                        $checked = "checked";
                                                    }
                                                    $mashup_opt_array = array(
                                                        'extra_atr' => 'onclick="show_sidebar(\'none\',\'' . esc_js( $randomno ) . '\')" ' . $checked . '',
                                                        'cust_name' => 'mashup_layout[' . esc_attr( $rand ) . '][]',
                                                        'cust_id' => 'radio_1' . esc_attr( $randomno ),
                                                        'classes' => 'radio_mashup_sidebar',
                                                        'std' => 'none',
                                                    );
                                                    $mashup_var_form_fields->mashup_var_form_radio_render( $mashup_opt_array );
                                                    ?>
                                                    <label for="radio_1<?php echo esc_attr( $randomno ) ?>"> 
                                                        <span class="ss"> <img src="<?php echo mashup_var_frame()->plugin_url() . 'assets/images/no_sidebar.png'; ?>"  alt="" />  </span>
                                                        <span  <?php
                                                        if ( $mashup_layout == "none" ) {
                                                            echo "class='check-list'";
                                                        }
                                                        ?> id="check-list"></span> 
                                                    </label>
                                                    <span class="title-theme"><?php echo mashup_var_frame_text_srt( 'mashup_var_full_width' ); ?></span>
                                                </div>
                                                <div class='radio-image-wrapper'>
                                                    <?php
                                                    $checked = '';
                                                    if ( $mashup_layout == "right" ) {
                                                        $checked = "checked";
                                                    }
                                                    $mashup_opt_array = array(
                                                        'extra_atr' => 'onclick="show_sidebar(\'right\',\'' . esc_js( $randomno ) . '\')" ' . $checked . '',
                                                        'cust_name' => 'mashup_layout[' . esc_attr( $rand ) . '][]',
                                                        'cust_id' => 'radio_2' . esc_attr( $randomno ),
                                                        'classes' => 'radio_mashup_sidebar',
                                                        'std' => 'right',
                                                    );
                                                    $mashup_var_form_fields->mashup_var_form_radio_render( $mashup_opt_array );
                                                    ?>
                                                    <label for="radio_2<?php echo esc_attr( $randomno ) ?>"> 
                                                        <span class="ss"><img src="<?php echo mashup_var_frame()->plugin_url() . 'assets/images/sidebar_right.png'; ?>" alt="" /></span> 
                                                        <span <?php
                                                        if ( $mashup_layout == "right" ) {
                                                            echo "class='check-list'";
                                                        }
                                                        ?> id="check-list"></span> 
                                                    </label>
                                                    <span class="title-theme"><?php echo mashup_var_frame_text_srt( 'mashup_var_sidebar_right' ); ?></span>
                                                </div>
                                                <div class='radio-image-wrapper'>
                                                    <?php
                                                    $checked = '';
                                                    if ( $mashup_layout == "left" ) {
                                                        $checked = "checked";
                                                    }
                                                    $mashup_opt_array = array(
                                                        'extra_atr' => 'onclick="show_sidebar(\'left\',\'' . esc_js( $randomno ) . '\')" ' . $checked . '',
                                                        'cust_name' => 'mashup_layout[' . esc_attr( $rand ) . '][]',
                                                        'cust_id' => 'radio_3' . esc_attr( $randomno ),
                                                        'classes' => 'radio_mashup_sidebar',
                                                        'std' => 'left',
                                                    );
                                                    $mashup_var_form_fields->mashup_var_form_radio_render( $mashup_opt_array );
                                                    ?>
                                                    <label for="radio_3<?php echo esc_attr( $randomno ); ?>">
                                                        <span class="ss">
                                                            <img src="<?php echo mashup_var_frame()->plugin_url() . 'assets/images/sidebar_left.png'; ?>" alt="" /></span> <span <?php
                                                        if ( $mashup_layout == "left" ) {
                                                            echo "class='check-list'";
                                                        }
                                                        ?> id="check-list">
                                                        </span> 
                                                    </label>
                                                    <span class="title-theme"><?php echo mashup_var_frame_text_srt( 'mashup_var_sidebar_left' ); ?></span>
                                                </div>

                                                <?php
                                                $cs_extra_layouts = false;
                                                if ( $pagenow == 'post.php' && get_post_type() == 'pagedd' ) {
                                                    $cs_extra_layouts = true;
                                                }

                                                if ( $cs_extra_layouts == true ) {
                                                    ?>
                                                    <div class='radio-image-wrapper'>
                                                        <?php
                                                        $checked = '';
                                                        if ( $mashup_layout == "small_right" ) {
                                                            $checked = "checked";
                                                        }
                                                        $mashup_opt_array = array(
                                                            'extra_atr' => 'onclick="show_sidebar(\'small_right\',\'' . esc_js( $randomno ) . '\')" ' . $checked . '',
                                                            'cust_name' => 'mashup_layout[' . esc_attr( $rand ) . '][]',
                                                            'cust_id' => 'radio_small_right' . esc_attr( $randomno ),
                                                            'classes' => 'radio_mashup_sidebar',
                                                            'std' => 'small_right',
                                                        );
                                                        $mashup_var_form_fields->mashup_var_form_radio_render( $mashup_opt_array );
                                                        ?>
                                                        <label for="radio_small_right<?php echo esc_attr( $randomno ); ?>">
                                                            <span class="ss">
                                                                <img src="<?php echo mashup_var_frame()->plugin_url() . 'assets/images/sidebar_right.png'; ?>" alt="" /></span> <span <?php
                                                            if ( $mashup_layout == "small_right" ) {
                                                                echo "class='check-list'";
                                                            }
                                                            ?> id="check-list">
                                                            </span> 
                                                        </label>
                                                        <span class="title-theme"><?php echo mashup_var_frame_text_srt( 'mashup_var_sidebar_small_right' ); ?></span>
                                                    </div>

                                                    <div class='radio-image-wrapper'>
                                                        <?php
                                                        $checked = '';
                                                        if ( $mashup_layout == "small_left" ) {
                                                            $checked = "checked";
                                                        }
                                                        $mashup_opt_array = array(
                                                            'extra_atr' => 'onclick="show_sidebar(\'small_left\',\'' . esc_js( $randomno ) . '\')" ' . $checked . '',
                                                            'cust_name' => 'mashup_layout[' . esc_attr( $rand ) . '][]',
                                                            'cust_id' => 'radio_small_left' . esc_attr( $randomno ),
                                                            'classes' => 'radio_mashup_sidebar',
                                                            'std' => 'small_left',
                                                        );
                                                        $mashup_var_form_fields->mashup_var_form_radio_render( $mashup_opt_array );
                                                        ?>
                                                        <label for="radio_small_left<?php echo esc_attr( $randomno ); ?>">
                                                            <span class="ss">
                                                                <img src="<?php echo mashup_var_frame()->plugin_url() . 'assets/images/sidebar_left.png'; ?>" alt="" /></span> <span <?php
                                                            if ( $mashup_layout == "small_left" ) {
                                                                echo "class='check-list'";
                                                            }
                                                            ?> id="check-list">
                                                            </span> 
                                                        </label>
                                                        <span class="title-theme"><?php echo mashup_var_frame_text_srt( 'mashup_var_sidebar_small_left' ); ?></span>
                                                    </div>

                                                    <div class='radio-image-wrapper'>
                                                        <?php
                                                        $checked = '';
                                                        if ( $mashup_layout == "small_left_large_right" ) {
                                                            $checked = "checked";
                                                        }
                                                        $mashup_opt_array = array(
                                                            'extra_atr' => 'onclick="show_sidebar(\'small_left_large_right\',\'' . esc_js( $randomno ) . '\')" ' . $checked . '',
                                                            'cust_name' => 'mashup_layout[' . esc_attr( $rand ) . '][]',
                                                            'cust_id' => 'radio_3' . esc_attr( $randomno ),
                                                            'classes' => 'radio_mashup_sidebar',
                                                            'std' => 'small_left_large_right',
                                                        );
                                                        $mashup_var_form_fields->mashup_var_form_radio_render( $mashup_opt_array );
                                                        ?>
                                                        <label for="radio_3<?php echo esc_attr( $randomno ); ?>">
                                                            <span class="ss">
                                                                <img src="<?php echo mashup_var_frame()->plugin_url() . 'assets/images/small_left_large_right_sidebars.png'; ?>" alt="" /></span> <span <?php
                                                            if ( $mashup_layout == "small_left_large_right" ) {
                                                                echo "class='check-list'";
                                                            }
                                                            ?> id="check-list">
                                                            </span> 
                                                        </label>
                                                        <span class="title-theme"><?php echo mashup_var_frame_text_srt( 'mashup_var_sidebar_small_left_large_right' ); ?></span>
                                                    </div>

                                                    <div class='radio-image-wrapper'>
                                                        <?php
                                                        $checked = '';
                                                        if ( $mashup_layout == "large_left_small_right" ) {
                                                            $checked = "checked";
                                                        }
                                                        $mashup_opt_array = array(
                                                            'extra_atr' => 'onclick="show_sidebar(\'large_left_small_right\',\'' . esc_js( $randomno ) . '\')" ' . $checked . '',
                                                            'cust_name' => 'mashup_layout[' . esc_attr( $rand ) . '][]',
                                                            'cust_id' => 'radio_3' . esc_attr( $randomno ),
                                                            'classes' => 'radio_mashup_sidebar',
                                                            'std' => 'large_left_small_right',
                                                        );
                                                        $mashup_var_form_fields->mashup_var_form_radio_render( $mashup_opt_array );
                                                        ?>
                                                        <label for="radio_3<?php echo esc_attr( $randomno ); ?>">
                                                            <span class="ss">
                                                                <img src="<?php echo mashup_var_frame()->plugin_url() . 'assets/images/large_left_small_right_sidebars.png'; ?>" alt="" /></span> <span <?php
                                                            if ( $mashup_layout == "large_left_small_right" ) {
                                                                echo "class='check-list'";
                                                            }
                                                            ?> id="check-list">
                                                            </span> 
                                                        </label>
                                                        <span class="title-theme"><?php echo mashup_var_frame_text_srt( 'mashup_var_sidebar_large_left_small_right' ); ?></span>
                                                    </div>

                                                    <div class='radio-image-wrapper'>
                                                        <?php
                                                        $checked = '';
                                                        if ( $mashup_layout == "both_left" ) {
                                                            $checked = "checked";
                                                        }
                                                        $mashup_opt_array = array(
                                                            'extra_atr' => 'onclick="show_sidebar(\'both_left\',\'' . esc_js( $randomno ) . '\')" ' . $checked . '',
                                                            'cust_name' => 'mashup_layout[' . esc_attr( $rand ) . '][]',
                                                            'cust_id' => 'radio_3' . esc_attr( $randomno ),
                                                            'classes' => 'radio_mashup_sidebar',
                                                            'std' => 'both_left',
                                                        );
                                                        $mashup_var_form_fields->mashup_var_form_radio_render( $mashup_opt_array );
                                                        ?>
                                                        <label for="radio_3<?php echo esc_attr( $randomno ); ?>">
                                                            <span class="ss">
                                                                <img src="<?php echo mashup_var_frame()->plugin_url() . 'assets/images/both_left_sidebars.png'; ?>" alt="" /></span> <span <?php
                                                            if ( $mashup_layout == "both_left" ) {
                                                                echo "class='check-list'";
                                                            }
                                                            ?> id="check-list">
                                                            </span> 
                                                        </label>
                                                        <span class="title-theme"><?php echo mashup_var_frame_text_srt( 'mashup_var_sidebar_both_left' ); ?></span>
                                                    </div>

                                                    <div class='radio-image-wrapper'>
                                                        <?php
                                                        $checked = '';
                                                        if ( $mashup_layout == "both_right" ) {
                                                            $checked = "checked";
                                                        }
                                                        $mashup_opt_array = array(
                                                            'extra_atr' => 'onclick="show_sidebar(\'both_right\',\'' . esc_js( $randomno ) . '\')" ' . $checked . '',
                                                            'cust_name' => 'mashup_layout[' . esc_attr( $rand ) . '][]',
                                                            'cust_id' => 'radio_3' . esc_attr( $randomno ),
                                                            'classes' => 'radio_mashup_sidebar',
                                                            'std' => 'both_right',
                                                        );
                                                        $mashup_var_form_fields->mashup_var_form_radio_render( $mashup_opt_array );
                                                        ?>
                                                        <label for="radio_3<?php echo esc_attr( $randomno ); ?>">
                                                            <span class="ss">
                                                                <img src="<?php echo mashup_var_frame()->plugin_url() . 'assets/images/both_right_sidebars.png'; ?>" alt="" /></span> <span <?php
                                                            if ( $mashup_layout == "both_right" ) {
                                                                echo "class='check-list'";
                                                            }
                                                            ?> id="check-list">
                                                            </span> 
                                                        </label>
                                                        <span class="title-theme"><?php echo mashup_var_frame_text_srt( 'mashup_var_sidebar_both_right' ); ?></span>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <?php
                                global $wpdb;
                                $mashup_var_options = get_option( 'mashup_var_options' );
                                $a_option = array();
                                if ( isset( $mashup_var_options['mashup_var_sidebar'] ) && count( $mashup_var_options['mashup_var_sidebar'] ) > 0 ) {
                                    foreach ( $mashup_var_options['mashup_var_sidebar'] as $sidebar ) {
                                        $a_option[sanitize_title( $sidebar )] = esc_html( $sidebar );
                                    }
                                }

                                $display = 'none';
                                if ( $mashup_layout == "left" || $mashup_layout == "both_left" || $mashup_layout == "small_left" || $mashup_layout == "small_left_large_right" || $mashup_layout == "large_left_small_right" ) {
                                    $display = "block";
                                }
                                $mashup_opt_array = array(
                                    'name' => mashup_var_frame_text_srt( 'mashup_var_left_sidebar' ),
                                    'desc' => '',
                                    'classes' => 'meta-body',
                                    'styles' => 'display:' . $display,
                                    'extra_atr' => '',
                                    'id' => esc_attr( $randomno ) . '_sidebar_left',
                                    'hint_text' => '',
                                    'echo' => true,
                                    'field_params' => array(
                                        'std' => $mashup_sidebar_left,
                                        'id' => '',
                                        'cust_name' => 'mashup_sidebar_left[]',
                                        'classes' => 'dropdown chosen-select-no-single select-medium',
                                        'options' => $a_option,
                                        'return' => true,
                                    ),
                                );
                                $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );

                                $display = 'none';
                                if ( $mashup_layout == "right" || $mashup_layout == "both_right" || $mashup_layout == "small_right" || $mashup_layout == "small_left_large_right" || $mashup_layout == "large_left_small_right" ) {
                                    $display = "block";
                                }
                                $mashup_opt_array = array(
                                    'name' => mashup_var_frame_text_srt( 'mashup_var_right_sidebar' ),
                                    'desc' => '',
                                    'classes' => 'meta-body',
                                    'styles' => 'display:' . $display,
                                    'extra_atr' => '',
                                    'id' => esc_attr( $randomno ) . '_sidebar_right',
                                    'hint_text' => '',
                                    'echo' => true,
                                    'field_params' => array(
                                        'std' => $mashup_sidebar_right,
                                        'id' => '',
                                        'cust_name' => 'mashup_sidebar_right[]',
                                        'classes' => 'dropdown chosen-select-no-single select-medium',
                                        'options' => $a_option,
                                        'return' => true,
                                    ),
                                );
                                $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );

                                $display = 'none';
                                if ( $mashup_layout == "both_right" ) {
                                    $display = "block";
                                }
                                $mashup_opt_array = array(
                                    'name' => mashup_var_frame_text_srt( 'mashup_var_second_right_sidebar' ),
                                    'desc' => '',
                                    'classes' => 'meta-body',
                                    'styles' => 'display:' . $display,
                                    'extra_atr' => '',
                                    'id' => esc_attr( $randomno ) . '_sidebar_right_second',
                                    'hint_text' => '',
                                    'echo' => true,
                                    'field_params' => array(
                                        'std' => $mashup_sidebar_right_second,
                                        'id' => '',
                                        'cust_name' => 'mashup_sidebar_right_second[]',
                                        'classes' => 'dropdown chosen-select-no-single select-medium',
                                        'options' => $a_option,
                                        'return' => true,
                                    ),
                                );
                                $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );

                                $display = 'none';
                                if ( $mashup_layout == "both_left" ) {
                                    $display = "block";
                                }
                                $mashup_opt_array = array(
                                    'name' => mashup_var_frame_text_srt( 'mashup_var_second_left_sidebar' ),
                                    'desc' => '',
                                    'classes' => 'meta-body',
                                    'styles' => 'display:' . $display,
                                    'extra_atr' => '',
                                    'id' => esc_attr( $randomno ) . '_sidebar_left_second',
                                    'hint_text' => '',
                                    'echo' => true,
                                    'field_params' => array(
                                        'std' => $mashup_sidebar_left_second,
                                        'id' => '',
                                        'cust_name' => 'mashup_sidebar_left_second[]',
                                        'classes' => 'dropdown chosen-select-no-single select-medium',
                                        'options' => $a_option,
                                        'return' => true,
                                    ),
                                );
                                $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
                                ?>
                            </div>
                            <?php
                            $mashup_opt_array = array(
                                'name' => '',
                                'desc' => '',
                                'hint_text' => '',
                                'echo' => true,
                                'field_params' => array(
                                    'std' => 'Save',
                                    'cust_id' => '',
                                    'cust_type' => 'button',
                                    'classes' => 'cs-admin-btn',
                                    'cust_name' => '',
                                    'extra_atr' => 'onclick="javascript:mashup_frame_removeoverlay(\'' . esc_js( $column_class . $randomno ) . '\', \'filterdrag\')"',
                                    'return' => true,
                                ),
                            );
                            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
                            ?>   
                        </div>
                    </div>
                </div>
                <?php
                $mashup_opt_array = array(
                    'std' => esc_attr( $rand ),
                    'id' => '',
                    'before' => '',
                    'after' => '',
                    'classes' => '',
                    'extra_atr' => '',
                    'cust_id' => '',
                    'cust_name' => 'column_rand_id[]',
                    'required' => false
                );
                $mashup_var_form_fields->mashup_var_form_hidden_render( $mashup_opt_array );
                $mashup_opt_array = array(
                    'std' => esc_attr( $column_class ),
                    'id' => '',
                    'before' => '',
                    'after' => '',
                    'classes' => '',
                    'extra_atr' => '',
                    'cust_id' => '',
                    'cust_name' => 'column_class[]',
                    'required' => false
                );
                $mashup_var_form_fields->mashup_var_form_hidden_render( $mashup_opt_array );
                $mashup_opt_array = array(
                    'std' => esc_attr( $total_column ),
                    'id' => '',
                    'before' => '',
                    'after' => '',
                    'classes' => '',
                    'extra_atr' => '',
                    'cust_id' => '',
                    'cust_name' => 'total_column[]',
                    'required' => false
                );
                $mashup_var_form_fields->mashup_var_form_hidden_render( $mashup_opt_array );
                ?>                   
            </div>
            <?php
        }
        if ( $die <> 1 ) {
            die();
        }
    }

    add_action( 'wp_ajax_mashup_column_pb', 'mashup_column_pb' );
}

/**
 * Width sizes for Elements
 *
 */
if ( ! function_exists( 'mashup_var_page_builder_element_sizes' ) ) {

    function mashup_var_page_builder_element_sizes( $size = '100' ) {

        if ( isset( $size ) && $size == '' ) {
            $element_size = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
        } else {
            $element_size_col = $size;
        }
        if ( isset( $element_size_col ) and $element_size_col == '100' || $element_size_col > 75 ) {

            $element_size = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
        } else if ( isset( $element_size_col ) and $element_size_col == '75' || $element_size_col > 67 ) {

            $element_size = 'col-lg-9 col-md-9 col-sm-12 col-xs-12';
        } else if ( isset( $element_size_col ) and $element_size_col == '67' || $element_size_col > 50 ) {

            $element_size = 'col-lg-8 col-md-8 col-sm-12 col-xs-12';
        } else if ( isset( $element_size_col ) and $element_size_col == '50' || $element_size_col > 33 ) {

            $element_size = 'col-lg-6 col-md-6 col-sm-6 col-xs-12';
        } else if ( isset( $element_size_col ) and $element_size_col == '33' || $element_size_col > 25 ) {

            $element_size = 'col-lg-4 col-md-4 col-sm-6 col-xs-12';
        } else if ( isset( $element_size_col ) and $element_size_col == '25' || $element_size_col < 25 ) {

            $element_size = 'col-lg-3 col-md-3 col-sm-6 col-xs-12';
        }

        return $element_size;
    }

}

/**
 * Shortcode Names for Elements
 *
 */
if ( ! function_exists( 'mashup_shortcode_names' ) ) {

    function mashup_shortcode_names() {
        global $post, $mashup_var_frame_static_text;
        $shortcode_array = array();
        $shortcode_array = apply_filters( 'mashup_shortcode_names_list_populate', $shortcode_array );
        ksort( $shortcode_array );
        return $shortcode_array;
    }

}
/**
 * List of the elements in Page Builder
 *
 */
if ( ! function_exists( 'mashup_element_list' ) ) {

    function mashup_element_list() {
        global $mashup_var_frame_static_text;
        $element_list = array(
            'element_list' => array(),
        );
        $element_list['element_list'] = apply_filters( 'mashup_element_list_populate', $element_list['element_list'] );
        return $element_list;
    }

}

/**
 * Page builder Sorting List
 */
if ( ! function_exists( 'mashup_elements_categories' ) ) {

    function mashup_elements_categories() {
        global $mashup_var_frame_static_text;
        $strings = new mashup_var_frame_all_strings;
        $mashup_var_typography = mashup_var_frame_text_srt( 'mashup_var_typography' );
        //$mashup_var_common_elements = mashup_var_frame_text_srt('mashup_var_common_elements');
        //$mashup_var_media_element = mashup_var_frame_text_srt('mashup_var_media_element');
        $mashup_var_content_blocks = mashup_var_frame_text_srt( 'mashup_var_content_blocks' );
        $mashup_var_loops = mashup_var_frame_text_srt( 'mashup_var_loops' );
        $mashup_var_wpam = mashup_var_frame_text_srt( 'mashup_var_wpam' );
        return array( 'typography' => $mashup_var_typography, 'contentblocks' => $mashup_var_content_blocks, 'loops' => $mashup_var_loops );
    }

}

/*
 * Page builder Element (shortcode(s))
 */
if ( ! function_exists( 'mashup_page_composer_elements' ) ) {

    function mashup_page_composer_elements( $element = '', $icon = '', $description = '' ) {
        echo '<i class="' . $icon . '"></i><span data-title="' . esc_html( $element ) . '"> ' . esc_html( $element ) . '</span>';
    }

}

/**
 * Section element Size(s)
 *
 * @returm size
 */
if ( ! function_exists( 'mashup_element_size_data_array_index' ) ) {

    function mashup_element_size_data_array_index( $size ) {
        if ( $size == "" or $size == 100 ) {
            return 0;
        } else if ( $size == 75 ) {
            return 1;
        } else if ( $size == 67 ) {
            return 2;
        } else if ( $size == 50 ) {
            return 3;
        } else if ( $size == 33 ) {
            return 4;
        } else if ( $size == 25 ) {
            return 5;
        }
    }

}

/**
 * Page Builder Elements Settings
 *
 */
if ( ! function_exists( 'mashup_element_setting' ) ) {

    function mashup_element_setting( $name, $mashup_counter, $element_size, $element_description = '', $page_element_icon = 'icon-star', $type = '' ) {
        global $mashup_var_form_fields;
        $element_title = str_replace( "mashup_var_page_builder_", "", $name );
        $elm_name = str_replace( "mashup_var_page_builder_", "", $name );
        $element_list = mashup_element_list();
        $all_shortcode_list = mashup_shortcode_names();
        $current_shortcode_name = str_replace( "mashup_var_page_builder_", "", $name );
        $current_shortcode_detail = $all_shortcode_list[$current_shortcode_name];
        $shortcode_icon = isset( $current_shortcode_detail['icon'] ) ? $current_shortcode_detail['icon'] : '';
        ?>
        <div class="column-in">
            <?php
            $mashup_opt_array = array(
                'std' => esc_attr( $element_size ),
                'id' => '',
                'before' => '',
                'after' => '',
                'classes' => 'item',
                'extra_atr' => '',
                'cust_id' => '',
                'cust_name' => esc_attr( $element_title ) . '_element_size[]',
                'required' => false
            );
            $mashup_var_form_fields->mashup_var_form_hidden_render( $mashup_opt_array );
            ?>
            <a href="javascript:;" onclick="javascript:mashup_createpopshort(jQuery(this))" class="options"><i class="icon-settings"></i></a>
            <a href="#" class="delete-it btndeleteit"><i class="icon-trash-o"></i></a> &nbsp;
            <a class="decrement" onclick="javascript:mashup_decrement(this)"><i class="icon-minus3"></i></a> &nbsp; 
            <a class="increment" onclick="javascript:mashup_increment(this)"><i class="icon-plus3"></i></a> 
            <span> 
                <i class="<?php echo $shortcode_icon . ' ' . str_replace( "mashup_var_page_builder_", "", $name ); ?>-icon"></i> 
                <strong><?php
                    echo esc_html( $element_list['element_list'][$elm_name] );
                    var_dump();
                    ?></strong><br/>
                <?php echo esc_attr( $element_description ); ?> 
            </span>
        </div>
        <?php
    }

}

/**
 * Sizes for Shortcodes elements
 *
 */
if ( ! function_exists( 'mashup_shortcode_element_size' ) ) {

    function mashup_shortcode_element_size( $column_size = '' ) {
        global $mashup_var_html_fields, $mashup_var_frame_static_text;
        $mashup_opt_array = array(
            'name' => mashup_var_frame_text_srt( 'mashup_var_size' ),
            'desc' => '',
            'hint_text' => mashup_var_frame_text_srt( 'mashup_var_column_hint' ),
            'echo' => true,
            'field_params' => array(
                'std' => $column_size,
                'cust_id' => 'column_size',
                'cust_type' => 'button',
                'classes' => 'column_size  dropdown chosen-select-no-single select-medium',
                'cust_name' => 'mashup_var_column_size[]',
                'extra_atr' => '',
                'options' => array(
                    '1/1' => mashup_var_frame_text_srt( 'mashup_var_full_width' ),
                    '1/2' => mashup_var_frame_text_srt( 'mashup_var_one_half' ),
                    '1/3' => mashup_var_frame_text_srt( 'mashup_var_one_third' ),
                    '2/3' => mashup_var_frame_text_srt( 'mashup_var_two_third' ),
                    '1/4' => mashup_var_frame_text_srt( 'mashup_var_one_fourth' ),
                    '3/4' => mashup_var_frame_text_srt( 'mashup_var_three_fourth' ),
                ),
                'return' => true,
            ),
        );
        $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
    }

}

/**
 * Adding Shortcode
 *
 */
if ( ! function_exists( 'mashup_var_short_code' ) ) {

    function mashup_var_short_code( $name = '', $function = '' ) {
        if ( $name != '' && $function != '' ) {

            add_shortcode( $name, $function );
        }
    }

}

/**
 * Element Ajax Settings
 * @Size
 * @Remove
 *
 */
if ( ! function_exists( 'mashup_ajax_element_setting' ) ) {

    function mashup_ajax_element_setting( $name, $mashup_counter, $element_size, $shortcode_element_id, $mashup_POSTID, $element_description = '', $page_element_icon = '', $type = '' ) {
        global $mashup_node, $post;
        $element_title = str_replace( "mashup_var_page_builder_", "", $name );
        $all_shortcode_list = mashup_shortcode_names();
        $current_shortcode_name = str_replace( "mashup_var_page_builder_", "", $name );
        $current_shortcode_detail = $all_shortcode_list[$current_shortcode_name];
        $shortcode_icon = isset( $current_shortcode_detail['icon'] ) ? $current_shortcode_detail['icon'] : '';
        ?>
        <div class="column-in">
            <input type="hidden" name="<?php echo esc_attr( $element_title ); ?>_element_size[]" class="item" value="<?php echo esc_attr( $element_size ); ?>" >

            <a href="javascript:;" onclick="javascript:ajax_shortcode_widget_element(jQuery(this), '<?php echo esc_js( admin_url( 'admin-ajax.php' ) ); ?>', '<?php echo esc_js( $mashup_POSTID ); ?>', '<?php echo esc_js( $name ); ?>')" class="options"><i class="icon-settings"></i></a><a href="#" class="delete-it btndeleteit"><i class="icon-trash-o"></i></a> &nbsp; <a class="decrement" onclick="javascript:mashup_decrement(this)"><i class="icon-minus3"></i></a> &nbsp; <a class="increment" onclick="javascript:mashup_increment(this)"><i class="icon-plus3"></i></a> 
            <span> 
                <i class="<?php echo $shortcode_icon . ' ' . str_replace( "mashup_var_page_builder_", "", $name ); ?>-icon"></i> 
                <strong>
                    <?php
                    if ( $mashup_node->getName() == 'page_element' ) {
                        $element_name = $mashup_node->element_name;
                        $element_name = str_replace( "cs-", "", $element_name );
                    } else {
                        $element_name = $mashup_node->getName();
                        $element_name = $all_shortcode_list[$element_name]['title'];
                    }
                    echo strtoupper( str_replace( '_', ' ', $element_name ) );
                    ?>
                </strong><br/>
                <?php echo esc_attr( $element_description ); ?> 
            </span>
        </div>
        <?php
    }

}

/**
 * Page Builder ELements all Categories
 *
 */
if ( ! function_exists( 'mashup_show_all_cats' ) ) {

    function mashup_show_all_cats( $parent, $separator, $selected = "", $taxonomy, $optional = '' ) {
        global $mashup_var_frame_static_text;
        if ( $parent == "" ) {
            global $wpdb;
            $parent = 0;
        } else
            $separator .= " &ndash; ";
        $args = array(
            'parent' => $parent,
            'hide_empty' => 0,
            'taxonomy' => $taxonomy
        );
        $categories = get_categories( $args );
        if ( $optional ) {
            $a_options = array();
            //$a_options[''] = mashup_var_frame_text_srt('mashup_var_plz_select');
            foreach ( $categories as $category ) {
                $a_options[$category->slug] = $category->cat_name;
            }
            return $a_options;
        } else {
            foreach ( $categories as $category ) {
                ?>
                <option <?php
                if ( $selected == $category->slug ) {
                    echo "selected";
                }
                ?> value="<?php echo esc_attr( $category->slug ); ?>"><?php echo esc_attr( $separator . $category->cat_name ); ?></option>
                <?php
                mashup_show_all_cats( $category->slug, $separator, $selected, $taxonomy );
            }
        }
    }

}
/**
 * Bootstrap Coloumn Class
 *
 * @returm Coloumn
 */
if ( ! function_exists( 'mashup_var_custom_column_class' ) ) {

    function mashup_var_custom_column_class( $column_size ) {
        $coloumn_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
        if ( isset( $column_size ) && $column_size <> '' ) {
            list($top, $bottom) = explode( '/', $column_size );
            $width = $top / $bottom * 100;
            $width = (int) $width;
            $coloumn_class = '';
            if ( round( $width ) == '25' || round( $width ) < 25 ) {
                $coloumn_class = 'col-lg-3 col-md-3 col-sm-6 col-xs-12';
            } elseif ( round( $width ) == '33' || (round( $width ) < 33 && round( $width ) > 25) ) {
                $coloumn_class = 'col-lg-4 col-md-4 col-sm-6 col-xs-12';
            } elseif ( round( $width ) == '50' || (round( $width ) < 50 && round( $width ) > 33) ) {
                $coloumn_class = 'col-lg-6 col-md-6 col-sm-6 col-xs-12';
            } elseif ( round( $width ) == '67' || (round( $width ) < 67 && round( $width ) > 50) ) {
                $coloumn_class = 'col-lg-8 col-md-12 col-sm-12 col-xs-12';
            } elseif ( round( $width ) == '75' || (round( $width ) < 75 && round( $width ) > 67) ) {
                $coloumn_class = 'col-md-9 col-lg-9 col-sm-12 col-xs-12';
            } else {
                $coloumn_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
            }
        }
        return esc_html( $coloumn_class );
    }

}

/**
 * Page Builder Element Data on Ajax Call
 *
 */
if ( ! function_exists( 'mashup_shortcode_element_ajax_call' ) ) {

    function mashup_shortcode_element_ajax_call() {
        global $post, $mashup_var_html_fields, $mashup_var_form_fields, $mashup_var_frame_static_text;

        if ( isset( $_POST['shortcode_element'] ) ) {
            $args = array(
                'type' => $_POST['shortcode_element'],
                'html_fields' => $mashup_var_html_fields,
            );
            do_action( 'mashup_shortcode_sub_element_ui', $args );
        }
        wp_die();
    }

    add_action( 'wp_ajax_mashup_shortcode_element_ajax_call', 'mashup_shortcode_element_ajax_call' );
}

if ( ! function_exists( 'mashup_custom_shortcode_encode' ) ) {

    function mashup_custom_shortcode_encode( $sh_content = '' ) {
        $sh_content = str_replace( array( '[', ']' ), array( 'mashup_open', 'mashup_close' ), $sh_content );
        return $sh_content;
    }

}

if ( ! function_exists( 'mashup_admin_gallery_images' ) ) {

    function mashup_admin_gallery_images() {
        global $mashup_var_frame_static_text;

        $output = '';
        $attach_id = isset( $_POST['attach_id'] ) ? $_POST['attach_id'] : '';
        $gallery_id = isset( $_POST['gallery_id'] ) ? $_POST['gallery_id'] : '';

        if ( $attach_id && $gallery_id ) {
            $mashup_var_attach_img = wp_get_attachment_image( $attach_id, 'thumbnail' );
            $mashup_var_gal_id = rand( 156546, 956546 );
            $output = '<li class="image" data-attachment_id="' . esc_attr( $mashup_var_gal_id ) . '">
						' . $mashup_var_attach_img . '
						<input type="hidden" value="' . $attach_id . '" name="' . $gallery_id . '[]" />
						<div class="actions">
								<span><a href="javascript:mashup_var_createpop(\'edit_track_form' . absint( $mashup_var_gal_id ) . '\',\'filter\')"><i class="icon-edit3"></i></a></span>
								<span><a href="javascript:void(0);" class="delete tips" data-tip="' . mashup_var_frame_text_srt( 'mashup_var_delete_image' ) . '"><i class="icon-cancel"></i></a></span>
						</div>
						<tr class="parentdelete" id="edit_track' . absint( $mashup_var_gal_id ) . '">
						  <td style="width:0">
						  <div id="edit_track_form' . absint( $mashup_var_gal_id ) . '" style="display: none;" class="table-form-elem">
								  <div class="cs-heading-area">
										<h5 style="text-align: left;">' . mashup_var_frame_text_srt( 'mashup_var_edit_item' ) . '</h5>
										<span onclick="javascript:mashup_var_remove_overlay(\'edit_track_form' . absint( $mashup_var_gal_id ) . '\',\'append\')" class="cs-btnclose"> <i class="icon-cancel"></i></span>
										<div class="clear"></div>
								  </div>
								  <div class="form-elements">
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										  <label>&nbsp;</label>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
										  ' . $mashup_var_attach_img . '
										</div>
								  </div>
								  <div class="form-elements">
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										  <label>' . mashup_var_frame_text_srt( 'mashup_var_title' ) . '</label>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
										  <input type="text" name="' . $gallery_id . '_title[]" value="' . esc_html( $mashup_var_gallery_title ) . '" />
										</div>
								  </div>
								  <div class="form-elements">
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										  <label>' . mashup_var_frame_text_srt( 'mashup_var_description' ) . '</label>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
										  <textarea name="' . $gallery_id . '_desc[]">' . esc_html( $mashup_var_gallery_desc ) . '</textarea>
										</div>
								  </div>
								  <div class="form-elements">
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										  <label>' . mashup_var_frame_text_srt( 'mashup_var_size' ) . '</label>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
										<select name="' . $gallery_id . '_size[]">
										<option value="small">' . mashup_var_frame_text_srt( 'mashup_var_small' ) . '</option>
										<option value="medium">' . mashup_var_frame_text_srt( 'mashup_var_medium' ) . '</option>
										<option value="large">' . mashup_var_frame_text_srt( 'mashup_var_large' ) . '</option>
										</select>

										</div>
								  </div>
								  <div class="form-elements">
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										  <label>' . mashup_var_frame_text_srt( 'mashup_var_video_url' ) . '</label>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

										  <input type="text" name="' . $gallery_id . '_video_url[]" value="' . esc_html( $mashup_var_gallery_video_url ) . '" />
										</div>
								  </div>
								  <ul class="form-elements noborder">
										<li class="to-label">
										  <label></label>
										</li>
										<li class="to-field">
										  <input type="button" value="' . mashup_var_frame_text_srt( 'mashup_var_update' ) . '" onclick="mashup_var_remove_overlay(\'edit_track_form' . absint( $mashup_var_gal_id ) . '\',\'append\')" />
										</li>
								  </ul>
								</div>
								</td>
						</tr>
				</li>';
        }
        echo force_balance_tags( $output );
        die();
    }

}
add_action( 'wp_ajax_mashup_admin_gallery_images', 'mashup_admin_gallery_images' );
