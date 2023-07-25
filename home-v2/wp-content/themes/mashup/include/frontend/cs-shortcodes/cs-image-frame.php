<?php

/*
 *
 * @Shortcode Name : Image Frame
 * @retrun
 *
 */
if (!function_exists('mashup_var_image_frame')) {

    function mashup_var_image_frame($atts, $content = "") {

	global $header_map, $post;
	$defaults = array(
	    'mashup_var_column_size' => '',
	    'mashup_var_image_section_title' => '',
	    'mashup_var_frame_image_url_array' => '',
	    'mashup_var_image_title' => '',
	    'mashup_var_img_align' => '',
	    'mashup_var_image_sub_title' => '',
	    'mashup_var_image_element_align' => '',
	);
	extract(shortcode_atts($defaults, $atts));
	if (isset($mashup_var_column_size) && $mashup_var_column_size != '') {
	    if (function_exists('mashup_var_custom_column_class')) {
		$column_class = mashup_var_custom_column_class($mashup_var_column_size);
	    }
	}

	$mashup_var_image_sub_title = isset($mashup_var_image_sub_title) ? $mashup_var_image_sub_title : '';
	$mashup_var_image_element_align = isset($mashup_var_image_element_align) ? $mashup_var_image_element_align : '';
	$mashup_var_image_section_title = isset($mashup_var_image_section_title) ? $mashup_var_image_section_title : '';
	$mashup_var_frame_image_url = isset($mashup_var_frame_image_url_array) ? $mashup_var_frame_image_url_array : '';
	$mashup_var_image_title = isset($mashup_var_image_title) ? $mashup_var_image_title : '';
	$mashup_var_img_align = isset($mashup_var_img_align) ? $mashup_var_img_align : '';

	$mashup_var_image_frame = '';
	if (isset($column_class) && $column_class <> '') {
	    $mashup_var_image_frame .= '<div class="' . esc_html($column_class) . '">';
	}
	
	// element title and subtitle
	if ( (isset($mashup_var_image_section_title) && $mashup_var_image_section_title <> '') || (isset($mashup_var_image_sub_title) and $mashup_var_image_sub_title <> '')) {
	    
	    $mashup_var_image_frame .= '<div class="element-title '.esc_html($mashup_var_image_element_align) .'">';
	    
	    if (isset($mashup_var_image_section_title) && $mashup_var_image_section_title <> '') {
		$mashup_var_image_frame .= '<h2>' . esc_html($mashup_var_image_section_title) . '</h2> ';
	    }
	    
	    $mashup_var_image_frame .='<em></em>';
	    
	    if (isset($mashup_var_image_sub_title) && $mashup_var_image_sub_title <> '') {
		$mashup_var_image_frame .= '<p>' . esc_html($mashup_var_image_sub_title) . '</p>';
	    }
	    
	    $mashup_var_image_frame .= '</div>';
	}
	
	$mashup_var_image_frame .= '<div class="main-post">';
	if ($mashup_var_frame_image_url <> '') {
	    $mashup_var_image_frame .= '<div class="media-holder ' . esc_html($mashup_var_img_align) . '">'
		    . '<figure><img alt = "' . esc_html($mashup_var_image_title) . '" src = "' . esc_url($mashup_var_frame_image_url) . '">'
		    . '</figure></div>';
	}
	if ($content != '' || $mashup_var_image_title != '') {
	    $mashup_var_image_frame .= '<div class="cs-text" >';
	    if ($mashup_var_image_title && trim($mashup_var_image_title) != '') {
		$mashup_var_image_frame .= '<h4>' . esc_html($mashup_var_image_title) . '</h4>';
	    }
	    if ($content <> '') {
		$mashup_var_image_frame .= do_shortcode($content);
	    }
	    $mashup_var_image_frame .= '</div>';
	}
	$mashup_var_image_frame .= '</div>';

	if (isset($column_class) && $column_class <> '') {
	    $mashup_var_image_frame .= '</div>';
	}

	return $mashup_var_image_frame;
    }

    if (function_exists('mashup_var_short_code'))
	mashup_var_short_code('mashup_image_frame', 'mashup_var_image_frame');
}