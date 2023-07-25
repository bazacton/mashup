<?php

/*
 *
 * @Shortcode Name : Button
 * @retrun
 *
 */
if (!function_exists('mashup_var_button')) {

    function mashup_var_button($atts, $content = "") {
	$defaults = array(
	    'mashup_var_column_size' => '',
	    'mashup_var_column' => '1',
	    'mashup_var_button_text' => '',
	    'mashup_var_button_link' => '#',
	    'mashup_var_button_border' => '',
	    'mashup_var_button_icon_position' => '',
	    'mashup_var_button_type' => 'rounded',
	    'mashup_var_button_target' => '_self',
	    'mashup_var_button_border_color' => '',
	    'mashup_var_button_color' => '#fff',
	    'mashup_var_button_bg_color' => '',
	    'mashup_var_button_padding_top' => '',
	    'mashup_var_button_padding_bottom' => '',
	    'mashup_var_button_padding_left' => '',
	    'mashup_var_button_padding_right' => '',
	    'mashup_var_button_align' => '',
	    'mashup_button_icon' => '',
	    'mashup_var_button_size' => 'btn-lg',
	    'mashup_var_icon_view' => ''
	);
	extract(shortcode_atts($defaults, $atts));
	$mashup_var_column = isset($mashup_var_column) ? $mashup_var_column : '';
	$mashup_var_button_text = isset($mashup_var_button_text) ? $mashup_var_button_text : '';
	$mashup_var_button_link = isset($mashup_var_button_link) ? $mashup_var_button_link : '';
	$mashup_var_button_border = isset($mashup_var_button_border) ? $mashup_var_button_border : '';
	$mashup_var_button_icon_position = isset($mashup_var_button_icon_position) ? $mashup_var_button_icon_position : '';
	$mashup_var_button_type = isset($mashup_var_button_type) ? $mashup_var_button_type : '';
	$mashup_var_button_padding_top = isset($mashup_var_button_padding_top) ? $mashup_var_button_padding_top : '';
	$mashup_var_button_border_color = isset($mashup_var_button_border_color) ? $mashup_var_button_border_color : '';
	$mashup_var_button_bg_color = isset($mashup_var_button_bg_color) ? $mashup_var_button_bg_color : '';
	$mashup_var_button_color = isset($mashup_var_button_color) ? $mashup_var_button_color : '';
	$mashup_var_button_target = isset($mashup_var_button_target) ? $mashup_var_button_target : '';
	$mashup_button_icon = isset($mashup_button_icon) ? $mashup_button_icon : '';
	$button_size = isset($mashup_var_button_size) ? $mashup_var_button_size : '';
	$mashup_var_icon_view = isset($mashup_var_icon_view) ? $mashup_var_icon_view : '';
	$column_class = '';
	$html = '';
	if (isset($mashup_var_column_size) && $mashup_var_column_size != '') {
	    if (function_exists('mashup_var_custom_column_class')) {
		$column_class = mashup_var_custom_column_class($mashup_var_column_size);
	    }
	}
	if (isset($column_class) && $column_class <> '') {
	    $html .= '<div  class="' . esc_html($column_class) . '" >';
	}
	$button_type_class = 'no_circle';
	$mashup_var_button_align = isset($mashup_var_button_align) ? $mashup_var_button_align : '';
	$border = '';
	$has_icon = '';
	if ($button_size == 'btn-xlg') {
	    $button_size = 'large';
	} elseif ($button_size == 'btn-lg') {
	    $button_size = 'custom-btn btn-lg';
	} elseif ($button_size == 'medium-btn') {
	    $button_size = 'medium';
	} else {
	    $button_size = 'small';
	}
	if (isset($mashup_var_button_border) && $mashup_var_button_border == 'yes' && $mashup_var_button_border_color <> '') {
	    $border = ' border: 2px solid ' . esc_attr($mashup_var_button_border_color) . ' !important;';
	}
	if (isset($mashup_var_button_type) && $mashup_var_button_type == 'rounded') {
	    $button_type_class = 'circle';
	}
	if (isset($mashup_var_button_type) && $mashup_var_button_type == 'three-d') {
	    $button_type_class = 'has-shadow';
	    $border = '';
	}
	if (isset($mashup_button_icon) && $mashup_button_icon <> '') {
	    $has_icon = 'has_icon';
	}
	$button_class_position = (isset($mashup_var_button_align) and $mashup_var_button_align == 'left') ? 'icon-left' : 'icon-right';
	$has_border = '';
	if ($mashup_var_button_border == 'yes') {
	    $has_border = 'has-border';
	}
	if (isset($mashup_var_button_target) && $mashup_var_button_target == '_blank') {
	    $mashup_var_button_target = ' target=' . $mashup_var_button_target . '';
	} else {
	    $mashup_var_button_target = ' target=' . $mashup_var_button_target . '';
	}
	$html .= '<div class="button_style cs-button">';

	$html .= '<a href="' . esc_url($mashup_var_button_link) . '" class="csborder-color ' . esc_attr($has_border) . ' btn-post ' . sanitize_html_class($button_type_class) . '  ' . esc_attr($button_size) . ' bg-color  ' . $has_icon . ' button-icon-' . esc_attr($mashup_var_button_align) . '" style="' . esc_attr($border) . '  background-color: ' . esc_attr($mashup_var_button_bg_color) . '; color:' . esc_attr($mashup_var_button_color) . ' !important;"' . esc_html($mashup_var_button_target) . '>';
	if (isset($mashup_button_icon) && $mashup_button_icon <> '' && isset($mashup_var_icon_view) && $mashup_var_icon_view == 'on') {
	    $html .= '<i class="' . esc_attr($mashup_button_icon) . '"></i>';
	}
	if (isset($mashup_var_button_text) && $mashup_var_button_text <> '') {
	    $html .= $mashup_var_button_text;
	}
	$html .= '</a>';
	$html .= '</div>';
	if (isset($column_class) && $column_class <> '') {
	    $html .= '</div>';
	}
	return do_shortcode($html);
    }

    if (function_exists('mashup_var_short_code')) {
	mashup_var_short_code('mashup_button', 'mashup_var_button');
    }
}