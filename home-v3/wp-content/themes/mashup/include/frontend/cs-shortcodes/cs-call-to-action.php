<?php

/*
 *
 * @File : Call to action
 * @retrun
 *
 */

if (!function_exists('mashup_var_call_to_action_shortcode')) {

    function mashup_var_call_to_action_shortcode($atts, $content = "") {
	$defaults = array(
	    'mashup_var_column_size' => '',
	    'mashup_var_call_to_action_title' => '',
	    'mashup_var_call_to_action_sub_title' => '',
	    'mashup_var_call_to_action_align' => '',
	    'mashup_var_call_action_subtitle' => '',
	    'mashup_var_heading_color' => '#000',
	    'mashup_var_call_to_action_icon_background_color' => '',
	    'mashup_var_call_to_action_button_text' => '',
	    'mashup_var_call_to_action_button_link' => '#',
	    'mashup_var_call_to_action_bg_img' => '',
	    'mashup_var_contents_bg_color' => '',
	    'mashup_var_call_to_action_img_array' => '',
	    'mashup_var_call_action_view' => '',
	    'mashup_var_call_action_text_align' => '',
	    'mashup_var_call_to_action_class' => '',
	    'mashup_var_call_action_img_align' => '',
	    'mashup_var_button_bg_color' => '',
	    'mashup_var_button_border_color' => ''
	);
	extract(shortcode_atts($defaults, $atts));
	$mashup_var_column_size = isset($mashup_var_column_size) ? $mashup_var_column_size : '';
	$mashup_var_call_to_action_img_array = isset($mashup_var_call_to_action_img_array) ? $mashup_var_call_to_action_img_array : '';
	$mashup_var_call_action_img_align = isset($mashup_var_call_action_img_align) ? $mashup_var_call_action_img_align : '';
	$mashup_var_call_to_action_title = isset($mashup_var_call_to_action_title) ? $mashup_var_call_to_action_title : '';
	$mashup_var_call_to_action_sub_title = isset($mashup_var_call_to_action_sub_title) ? $mashup_var_call_to_action_sub_title : '';
	$mashup_var_call_to_action_align = isset($mashup_var_call_to_action_align) ? $mashup_var_call_to_action_align : '';
	$mashup_var_call_action_text_align = isset($mashup_var_call_action_text_align) ? $mashup_var_call_action_text_align : '';
	$mashup_var_call_action_subtitle = isset($mashup_var_call_action_subtitle) ? $mashup_var_call_action_subtitle : '';
	$mashup_var_heading_color = isset($mashup_var_heading_color) ? $mashup_var_heading_color : '';
	$mashup_var_call_action_contents = $content;
	$mashup_var_call_to_action_button_text = isset($mashup_var_call_to_action_button_text) ? $mashup_var_call_to_action_button_text : '';
	$mashup_var_call_to_action_button_link = isset($mashup_var_call_to_action_button_link) ? $mashup_var_call_to_action_button_link : '';
	$mashup_var_button_bg_color = isset($mashup_var_button_bg_color) ? $mashup_var_button_bg_color : '';
	$mashup_var_button_border_color = isset($mashup_var_button_border_color) ? $mashup_var_button_border_color : '';
	$mashup_var_call_to_action_icon_background_color = isset($mashup_var_call_to_action_icon_background_color) ? $mashup_var_call_to_action_icon_background_color : '';
	$column_class = '';
	if (isset($mashup_var_column_size) && $mashup_var_column_size != '') {
	    if (function_exists('mashup_var_custom_column_class')) {
		$column_class = mashup_var_custom_column_class($mashup_var_column_size);
	    }
	}
	$style_string = $mashup_var_CustomId = '';
	if ($mashup_var_call_to_action_img_array) {
	    $style_string .= ' background:url(' . esc_url($mashup_var_call_to_action_img_array) . ') ' . esc_html($mashup_var_call_action_img_align) . ' !important; background-color:#fff;';
	} else {
	    $style_string .= ' background-color:' . esc_html($mashup_var_contents_bg_color) . ' !important;';
	}
	$style_string = ' style="' . $style_string . '"';
	$html = '';
	if ((isset($mashup_var_call_to_action_title) && $mashup_var_call_to_action_title <> '') || (isset($mashup_var_call_to_action_sub_title) && $mashup_var_call_to_action_sub_title <> '')) {
	    $html .= '<div class="element-title ' . esc_html($mashup_var_call_to_action_align) . '">';
	    if (isset($mashup_var_call_to_action_title) && $mashup_var_call_to_action_title <> '') {
		$html .= '<h2>' . esc_html($mashup_var_call_to_action_title) . '</h2>';
	    }
	    $html .='<em></em>';
	    if (isset($mashup_var_call_to_action_sub_title) && $mashup_var_call_to_action_sub_title <> '') {
		$html .='<p>' . esc_html($mashup_var_call_to_action_sub_title) . '</p>';
	    }
	    $html .='</div>';
	}
	$html .= '<div ' . mashup_allow_special_char($style_string) . '>';
	if (isset($column_class) && $column_class <> '') {
	    $html .= '<div  class="' . esc_html($column_class) . '" >';
	}
	$html .= '<div class="cs-calltoaction align-' . esc_html($mashup_var_call_action_text_align) . '">';
	$html .= '<div class="cs-text">';
	if (isset($mashup_var_call_action_subtitle) && $mashup_var_call_action_subtitle <> '') {
	    $color_string = '';
	    if ($mashup_var_heading_color != '') {
		$color_string = ' style="color:' . esc_html($mashup_var_heading_color) . ' !important;"';
	    }
	    $html .= '<h2 ' . mashup_allow_special_char($color_string) . '>' . esc_html($mashup_var_call_action_subtitle) . '</h2>';
	}
	if ($mashup_var_call_action_contents != '') {
	    $color_string = '';
	}
	$html .= do_shortcode($mashup_var_call_action_contents);
	if (isset($mashup_var_call_to_action_button_text) and $mashup_var_call_to_action_button_text <> '') {
	    $color_string = '';
	    $button_text_color = '';
	    if ($mashup_var_call_to_action_icon_background_color != '') {
		$button_text_color = ' color:' . $mashup_var_call_to_action_icon_background_color . ' !important;';
	    }
	    $button_border_color = '';
	    if ($mashup_var_button_border_color != '') {
		$button_border_color = ' border: 2px solid ' . esc_html($mashup_var_button_border_color) . ' !important;';
	    }
	    if ($mashup_var_button_bg_color != '' || $mashup_var_call_to_action_icon_background_color != '') {
		$color_string = ' style="background-color:' . esc_html($mashup_var_button_bg_color) . ' !important; ' . $button_text_color . '' . $button_border_color . '"';
	    }
	    $html .= '</div>';
	    $html .= '<a href="' . esc_url($mashup_var_call_to_action_button_link) . '" class="csborder-color cs-color" ' . mashup_allow_special_char($color_string) . '>' . esc_html($mashup_var_call_to_action_button_text) . '</a>';
	}
	$html .= '</div>';

	if (isset($column_class) && $column_class <> '') {
	    $html .= '</div>';
	}
	$html .= '</div>';

	return $html;
    }

    if (function_exists('mashup_var_short_code')) {
	mashup_var_short_code('call_to_action', 'mashup_var_call_to_action_shortcode');
    }
}