<?php

// start Heading shortcode front end view function
if (!function_exists('mashup_var_heading')) {

    function mashup_var_heading($atts, $content = "") {
	$divider_div = '';
	$defaults = array(
	    'column_size' => '1/1',
	    'heading_title' => '',
	    'color_title' => '',
	    'heading_color' => '#000',
	    'class' => 'cs-heading-shortcode',
	    'heading_style' => '',
	    'heading_style_type' => '1',
	    'heading_size' => '',
	    'letter_space' => '',
	    'line_height' => '',
	    'font_weight' => '',
	    'sub_heading_title' => '',
	    'heading_font_style' => '',
	    'heading_view' => 'view-1',
	    'heading_divider_position' => 'before',
	    'heading_align' => 'center',
	    'heading_divider' => '',
	    'heading_color' => '',
	    'heading_content_color' => '',
	    'mashup_var_heading_sub_title' => '',
	   // 'mashup_var_heading_element_align' => '',
	);

	extract(shortcode_atts($defaults, $atts));
	$column_class = mashup_var_custom_column_class($column_size);
	$html = '';
	$css = '';
	$he_font_style = '';
	
	
	// element title and subtitle
	if ( (isset($heading_title) && $heading_title <> '') || (isset($mashup_var_heading_sub_title) and $mashup_var_heading_sub_title <> '')) {
	    
	    $html .= '<div class="element-title">';
	    
	    if (isset($heading_title) && $heading_title <> '') {
		$html .= '<h' . $heading_style . ' style="color:' . esc_html($heading_color) . ' !important; font-size: ' . esc_html($heading_size) . 'px !important; letter-spacing: ' . esc_html($letter_space) . 'px !important; line-height: ' . esc_html($line_height) . 'px !important; text-align:' . esc_html($heading_align) . ';' . esc_html($he_font_style) . ';">' . esc_html($heading_title) . '</h' . $heading_style . '>';
	    }
	    
	    $html .='<em></em>';
	    
	    if (isset($mashup_var_heading_sub_title) && $mashup_var_heading_sub_title <> '') {
		$html .= '<p>' . esc_html($mashup_var_heading_sub_title) . '</p>';
	    }
	    
	    $html .= '</div>';
	}
	 
	
	if (isset($heading_divider) and $heading_divider == 'on' and isset($heading_divider_position) and $heading_divider_position == 'before') {
	    $html .= '<em></em>';
	}
	if ($content != '') {
	    $html .= nl2br($content);
	}
	if (isset($heading_divider) and $heading_divider == 'on' and isset($heading_divider_position) and $heading_divider_position == 'after') {
	    $html .= '<em></em>';
	}

	return do_shortcode($html);
    }

    if (function_exists('mashup_var_short_code')) {
	mashup_var_short_code('mashup_heading', 'mashup_var_heading');
    }
}