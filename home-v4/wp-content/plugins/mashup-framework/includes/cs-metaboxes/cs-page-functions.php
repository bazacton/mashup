<?php

/**
 * @Page options
 * @return html
 *
 */
if (!function_exists('mashup_subheader_element')) {

    function mashup_subheader_element() {
        global $post, $mashup_var_form_fields, $mashup_var_html_fields, $mashup_var_frame_static_text;
        $page_subheader_no_image = '';

        $mashup_default_map = '[mashup_map mashup_var_map_element_title="Address Help" mashup_var_sub_element_title="Map info" mashup_var_map_height_title="300" mashup_var_map_latitude_title="-0.127758" mashup_var_map_longitude_title="51.507351" mashup_var_info_text_title="info text" mashup_var_info_width_title="300" mashup_var_info_height_title="100" mashup_var_map_zoom="9" mashup_var_map_types="HYBRID" mashup_var_show_marker="true" mashup_var_disable_map="true" mashup_var_drag_able="true" mashup_var_scrol_wheel="true" mashup_var_map_direction="true" ][/mashup_map]';

        $mashup_banner_style = get_post_meta($post->ID, 'mashup_header_banner_style', true);

        $mashup_default_header = $mashup_breadcrumb_header = $mashup_custom_slider = $mashup_map = $mashup_no_header = 'hide';
        if (isset($mashup_banner_style) && $mashup_banner_style == 'default_header') {
            $mashup_default_header = 'show';
        } else if (isset($mashup_banner_style) && $mashup_banner_style == 'breadcrumb_header') {
            $mashup_breadcrumb_header = 'show';
        } else if (isset($mashup_banner_style) && $mashup_banner_style == 'custom_slider') {
            $mashup_custom_slider = 'show';
        } else if (isset($mashup_banner_style) && $mashup_banner_style == 'map') {
            $mashup_map = 'show';
        } else if (isset($mashup_banner_style) && $mashup_banner_style == 'no-header') {
            $mashup_no_header = 'show';
        } else {
            $mashup_default_header = 'show';
        }

        $mashup_var_opt_array = array(
            'name' => mashup_var_frame_text_srt('mashup_var_choose_subheader'),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => 'default_header',
                'id' => 'header_banner_style',
                'return' => true,
                'extra_atr' => 'onchange="mashup_header_element_toggle(this.value)"',
                'classes' => 'dropdown chosen-select',
                'options' => array(
                    'default_header' => mashup_var_frame_text_srt('mashup_var_default_subheader'),
                    'breadcrumb_header' => mashup_var_frame_text_srt('mashup_var_custom_subheader'),
                    'custom_slider' => mashup_var_frame_text_srt('mashup_var_rev_slider'),
                    'map' => mashup_var_frame_text_srt('mashup_var_map'),
                    'no-header' => mashup_var_frame_text_srt('mashup_var_no_subheader')
                ),
            ),
        );

        $mashup_var_html_fields->mashup_var_select_field($mashup_var_opt_array);


        $mashup_var_opt_array = array(
            'id' => 'custom_header',
            'enable_id' => 'mashup_var_header_banner_style',
            'enable_val' => 'breadcrumb_header',
        );

        $mashup_var_html_fields->mashup_var_division($mashup_var_opt_array);

        $mashup_var_opt_array = array(
            'name' => mashup_var_frame_text_srt('mashup_var_style'),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => 'simple',
                'id' => 'sub_header_style',
                'return' => true,
                'extra_atr' => 'onchange="mashup_var_page_subheader_style(this.value)"',
                'classes' => 'dropdown chosen-select',
                'options' => array(
                    'classic' => mashup_var_frame_text_srt('mashup_var_classic'),
                    'with_bg' => mashup_var_frame_text_srt('mashup_var_with_image'),
                ),
            ),
        );

        $mashup_var_html_fields->mashup_var_select_field($mashup_var_opt_array);

        $mashup_var_opt_array = array(
            'name' => mashup_var_frame_text_srt('mashup_var_padding_top'),
            'desc' => '',
            'hint_text' => mashup_var_frame_text_srt('mashup_var_padding_top_hint'),
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'subheader_padding_top',
                'return' => true,
            ),
        );

        $mashup_var_html_fields->mashup_var_text_field($mashup_var_opt_array);

        $mashup_var_opt_array = array(
            'name' => mashup_var_frame_text_srt('mashup_var_padding_bot'),
            'desc' => '',
            'hint_text' => mashup_var_frame_text_srt('mashup_var_padding_bot_hint'),
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'subheader_padding_bottom',
                'return' => true,
            ),
        );
        $mashup_var_html_fields->mashup_var_text_field($mashup_var_opt_array);

        $mashup_var_opt_array = array(
            'name' => mashup_var_frame_text_srt('mashup_var_margin_top'),
            'desc' => '',
            'hint_text' => mashup_var_frame_text_srt('mashup_var_margin_top_hint'),
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'subheader_margin_top',
                'return' => true,
            ),
        );

        $mashup_var_html_fields->mashup_var_text_field($mashup_var_opt_array);

        $mashup_var_opt_array = array(
            'name' => mashup_var_frame_text_srt('mashup_var_margin_bot'),
            'desc' => '',
            'hint_text' => mashup_var_frame_text_srt('mashup_var_margin_bot_hint'),
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'subheader_margin_bottom',
                'return' => true,
            ),
        );
        $mashup_var_html_fields->mashup_var_text_field($mashup_var_opt_array);

        $mashup_var_opt_array = array(
            'name' => mashup_var_frame_text_srt('mashup_var_page_title'),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'page_title_switch',
                'return' => true,
            ),
        );

        $mashup_var_html_fields->mashup_var_checkbox_field($mashup_var_opt_array);

        $mashup_var_opt_array = array(
            'name' => mashup_var_frame_text_srt('mashup_var_sub_header_align'),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => 'left',
                'id' => 'sub_header_align',
                'return' => true,
                'extra_atr' => '',
                'classes' => 'dropdown chosen-select',
                'options' => array(
                    'left' => mashup_var_frame_text_srt('mashup_var_align_left'),
                    'center' => mashup_var_frame_text_srt('mashup_var_align_center'),
                    'right' => mashup_var_frame_text_srt('mashup_var_align_right'),
                ),
            ),
        );

        $mashup_var_html_fields->mashup_var_select_field($mashup_var_opt_array);
        

        $mashup_var_opt_array = array(
            'name' => mashup_var_frame_text_srt('mashup_var_text_color'),
            'desc' => '',
            'hint_text' => mashup_var_frame_text_srt('mashup_var_text_color_hint'),
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'page_subheader_text_color',
                'classes' => 'bg_color',
                'return' => true,
            ),
        );

        $mashup_var_html_fields->mashup_var_text_field($mashup_var_opt_array);

        $mashup_var_opt_array = array(
            'id' => 'subheader_with_bc',
            'enable_id' => 'mashup_var_sub_header_style',
            'enable_val' => 'classic',
        );
        $mashup_var_html_fields->mashup_var_division($mashup_var_opt_array);
        $mashup_var_opt_array = array(
            'name' => mashup_var_frame_text_srt('mashup_var_breadcrumbs'),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'page_breadcrumbs',
                'return' => true,
            ),
        );
        $mashup_var_html_fields->mashup_var_checkbox_field($mashup_var_opt_array);
        $mashup_var_html_fields->mashup_var_division_close(array());

        $mashup_var_opt_array = array(
            'id' => 'subheader_with_bg',
            'enable_id' => 'mashup_var_sub_header_style',
            'enable_val' => 'with_bg',
        );
        $mashup_var_html_fields->mashup_var_division($mashup_var_opt_array);

        $mashup_var_opt_array = array(
            'name' => mashup_var_frame_text_srt('mashup_var_sub_heading'),
            'desc' => '',
            'hint_text' => mashup_var_frame_text_srt('mashup_var_sub_heading_hint'),
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'page_subheading_title',
                'return' => true,
            ),
        );

        $mashup_var_html_fields->mashup_var_textarea_field($mashup_var_opt_array);

        $mashup_opt_array = array(
            'name' => mashup_var_frame_text_srt('mashup_var_bg_image'),
            'id' => 'header_banner_image',
            'main_id' => '',
            'std' => '',
            'desc' => '',
            'hint_text' => mashup_var_frame_text_srt('mashup_var_bg_image_hint'),
            'prefix' => '',
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'header_banner_image',
                'prefix' => '',
                'return' => true,
            ),
        );

        $mashup_var_html_fields->mashup_var_upload_file_field($mashup_opt_array);

        $mashup_var_opt_array = array(
            'name' => mashup_var_frame_text_srt('mashup_var_parallax'),
            'desc' => '',
            'hint_text' => mashup_var_frame_text_srt('mashup_var_parallax_hint'),
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'page_subheader_parallax',
                'return' => true,
            ),
        );

        $mashup_var_html_fields->mashup_var_checkbox_field($mashup_var_opt_array);

        $mashup_var_html_fields->mashup_var_division_close(array());

        $mashup_var_opt_array = array(
            'name' => mashup_var_frame_text_srt('mashup_var_bg_color'),
            'desc' => '',
            'hint_text' => mashup_var_frame_text_srt('mashup_var_bg_color_hint'),
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'page_subheader_color',
                'classes' => 'bg_color',
                'return' => true,
            ),
        );

        $mashup_var_html_fields->mashup_var_text_field($mashup_var_opt_array);

        $mashup_var_html_fields->mashup_var_division_close(array());

        $mashup_var_opt_array = array(
            'id' => 'rev_slider_header',
            'enable_id' => 'mashup_var_header_banner_style',
            'enable_val' => 'custom_slider',
        );

        $mashup_var_html_fields->mashup_var_division($mashup_var_opt_array);

        $mashup_slider_value = get_post_meta($post->ID, 'mashup_var_custom_slider_id', true);
        $mashup_slider_options = '<option value="">' . mashup_var_frame_text_srt('mashup_var_slider') . '</option>';

        if (class_exists('RevSlider') && class_exists('mashup_var_RevSlider')) {
            $slider = new mashup_var_RevSlider();
            $arrSliders = $slider->getAllSliderAliases();
            if (is_array($arrSliders)) {
                foreach ($arrSliders as $key => $entry) {
                    $mashup_slider_selected = '';
                    if ($mashup_slider_value != '') {
                        if ($mashup_slider_value == $entry['alias']) {
                            $mashup_slider_selected = ' selected="selected"';
                        }
                    }
                    $mashup_slider_options .= '<option ' . $mashup_slider_selected . ' value="' . $entry['alias'] . '">' . $entry['title'] . '</option>';
                }
            }
        }

        $mashup_opt_array = array(
            'name' => mashup_var_frame_text_srt('mashup_var_slider'),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'custom_slider_id',
                'classes' => 'dropdown chosen-select',
                'return' => true,
                'options_markup' => true,
                'options' => $mashup_slider_options,
            ),
        );
        $mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);



        $mashup_var_html_fields->mashup_var_division_close(array());


        $mashup_var_opt_array = array(
            'id' => 'map_header',
            'enable_id' => 'mashup_var_header_banner_style',
            'enable_val' => 'map',
        );

        $mashup_var_html_fields->mashup_var_division($mashup_var_opt_array);


        $mashup_opt_array = array(
            'name' => mashup_var_frame_text_srt('mashup_var_map_sc'),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => $mashup_default_map,
                'id' => 'custom_map',
                'classes' => '',
                'return' => true,
            ),
        );
        $mashup_var_html_fields->mashup_var_textarea_field($mashup_opt_array);


        $mashup_var_html_fields->mashup_var_division_close(array());

        $mashup_var_opt_array = array(
            'id' => 'no_header',
            'enable_id' => 'mashup_var_header_banner_style',
            'enable_val' => 'no-header',
        );

        $mashup_var_html_fields->mashup_var_division($mashup_var_opt_array);


        $mashup_var_opt_array = array(
            'name' => mashup_var_frame_text_srt('mashup_var_header_border'),
            'desc' => '',
            'hint_text' => mashup_var_frame_text_srt('mashup_var_header_hint'),
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'main_header_border_color',
                'classes' => 'bg_color',
                'return' => true,
            ),
        );

        $mashup_var_html_fields->mashup_var_text_field($mashup_var_opt_array);
        $mashup_var_html_fields->mashup_var_division_close(array());
        ?>
        <script>
            jQuery(document).ready(function () {
                chosen_selectionbox();
            });
        </script>
        <?php

    }

}

/**
 * @Sidebar Layout setting start
 * @return
 *
 */
if (!function_exists('mashup_sidebar_layout_options')) {

    function mashup_sidebar_layout_options() {
        global $post, $pagenow, $mashup_var_options, $mashup_var_form_fields, $mashup_var_html_fields, $mashup_var_frame_static_text;

       // if (isset($post->post_type) && $post->post_type == 'page') {
//            $mashup_var_opt_array = array(
//                'name' => mashup_var_frame_text_srt('mashup_var_header_style'),
//                'desc' => '',
//                'hint_text' => '',
//                'echo' => true,
//                'field_params' => array(
//                    'std' => 'default_header_style',
//                    'id' => 'header_style',
//                    'return' => true,
//                    'classes' => 'dropdown chosen-select',
//                    'extra_atr' => 'onclick="mashup_header_element_toggle(this.value)"',
//                    'options' => array(
//                        'modern_header_style' => mashup_var_frame_text_srt('mashup_var_modern_header'),
//                        'default_header_style' => mashup_var_frame_text_srt('mashup_var_default_header')
//                    ),
//                ),
//            );
//
//
//            $mashup_var_html_fields->mashup_var_select_field($mashup_var_opt_array);
//        }
        $mashup_sidebars_array = array('' => mashup_var_frame_text_srt('mashup_var_side_bar'));
        if (isset($mashup_var_options['mashup_var_sidebar']) && is_array($mashup_var_options['mashup_var_sidebar']) && sizeof($mashup_var_options['mashup_var_sidebar']) > 0) {
            foreach ($mashup_var_options['mashup_var_sidebar'] as $key => $sidebar) {
                $mashup_sidebars_array[sanitize_title($sidebar)] = $sidebar;
            }
        }

        $mashup_var_html_fields->mashup_form_layout_render(
                array('name' => mashup_var_frame_text_srt('mashup_var_choose_sidebar'),
                    'id' => 'page_layout',
                    'std' => 'none',
                    'classes' => '',
                    'description' => '',
                    'onclick' => '',
                    'status' => '',
                    'meta' => '',
                    'help_text' => mashup_var_frame_text_srt('mashup_var_sidebar_hint')
                )
        );

        $mashup_var_opt_array = array(
            'id' => 'left_layout',
            'enable_id' => 'mashup_var_page_layout',
            'enable_val' => 'left,small_left,both_left,small_left_large_right,large_left_small_right',
        );

        $mashup_var_html_fields->mashup_var_division($mashup_var_opt_array);


        $mashup_opt_array = array(
            'name' => mashup_var_frame_text_srt('mashup_var_left_sidebar'),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'page_sidebar_left',
                'classes' => 'dropdown chosen-select',
                'return' => true,
                'options' => $mashup_sidebars_array,
            ),
        );
        $mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);


        $mashup_var_html_fields->mashup_var_division_close(array());


        $mashup_var_opt_array = array(
            'id' => 'right_layout',
            'enable_id' => 'mashup_var_page_layout',
            'enable_val' => 'right,small_right,both_right,small_left_large_right,large_left_small_right',
        );

        $mashup_var_html_fields->mashup_var_division($mashup_var_opt_array);


        $mashup_opt_array = array(
            'name' => mashup_var_frame_text_srt('mashup_var_right_sidebar'),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'page_sidebar_right',
                'classes' => 'dropdown chosen-select',
                'return' => true,
                'options' => $mashup_sidebars_array,
            ),
        );
        $mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);
        $mashup_var_html_fields->mashup_var_division_close(array());
		
		// Extra Layouts
		$cs_extra_layouts = false;
		if ( $pagenow == 'post.php' && get_post_type() == 'page' ) {
			$cs_extra_layouts = true;
		}
		
		if ( $cs_extra_layouts == true ) {
			
			$mashup_var_opt_array = array(
				'id' => 'second_right_layout',
				'enable_id' => 'mashup_var_page_layout',
				'enable_val' => 'both_right',
			);
			$mashup_var_html_fields->mashup_var_division($mashup_var_opt_array);
			$mashup_opt_array = array(
				'name' => mashup_var_frame_text_srt('mashup_var_second_right_sidebar'),
				'desc' => '',
				'hint_text' => '',
				'echo' => true,
				'field_params' => array(
					'std' => '',
					'id' => 'page_sidebar_right_second',
					'classes' => 'dropdown chosen-select',
					'return' => true,
					'options' => $mashup_sidebars_array,
				),
			);
			$mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);
			$mashup_var_html_fields->mashup_var_division_close(array());


			$mashup_var_opt_array = array(
				'id' => 'second_left_layout',
				'enable_id' => 'mashup_var_page_layout',
				'enable_val' => 'both_left',
			);
			$mashup_var_html_fields->mashup_var_division($mashup_var_opt_array);
			$mashup_opt_array = array(
				'name' => mashup_var_frame_text_srt('mashup_var_second_left_sidebar'),
				'desc' => '',
				'hint_text' => '',
				'echo' => true,
				'field_params' => array(
					'std' => '',
					'id' => 'page_sidebar_left_second',
					'classes' => 'dropdown chosen-select',
					'return' => true,
					'options' => $mashup_sidebars_array,
				),
			);
			$mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);
			$mashup_var_html_fields->mashup_var_division_close(array());
		}
        ?>
        <script>
            jQuery(document).ready(function () {
                chosen_selectionbox();
            });
        </script>
        <?php

    }
}