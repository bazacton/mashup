<?php

/*
 *
 * @Shortcode Name :   Start function for Testimonial shortcode/element front end view
 * @retrun
 *
 */
if (!function_exists('mashup_testimonials_shortcode')) {

    function mashup_testimonials_shortcode($atts, $content = null) {
	global $column_class, $section_title, $post, $mashup_var_author_color, $mashup_var_position_color;
	$randomid = rand(0123, 9999);
	$defaults = array(
	    'mashup_var_column_size' => '',
	    'mashup_var_testimonial_content' => '',
	    'mashup_var_testimonial_title' => '',
	    'mashup_var_testimonial_sub_title' => '',
	    'mashup_var_author_color' => '',
	    'mashup_var_position_color' => '',
	    'mashup_var_testimonial_element_align' => ''
	);
	extract(shortcode_atts($defaults, $atts));
	$html = '';
	$section_title = '';
	$mashup_var_testimonial_title = isset($mashup_var_testimonial_title) ? $mashup_var_testimonial_title : '';
	$mashup_var_testimonial_element_align = isset($mashup_var_testimonial_element_align) ? $mashup_var_testimonial_element_align : '';
	$mashup_var_testimonial_content = isset($mashup_var_testimonial_content) ? $mashup_var_testimonial_content : '';
	$mashup_var_testimonial_sub_title = isset($mashup_var_testimonial_sub_title) ? $mashup_var_testimonial_sub_title : '';
	$mashup_var_column_size = isset($mashup_var_column_size) ? $mashup_var_column_size : '';
	$mashup_var_author_color = isset($mashup_var_author_color) ? $mashup_var_author_color : '';
	$mashup_var_position_color = isset($mashup_var_position_color) ? $mashup_var_position_color : '';

	if (isset($mashup_var_column_size) && $mashup_var_column_size != '') {
	    if (function_exists('mashup_var_custom_column_class')) {
		$column_class = mashup_var_custom_column_class($mashup_var_column_size);
	    }
	}

	if (isset($column_class) && $column_class <> '') {
	    $html .= '<div class="' . esc_html($column_class) . '">';
	}
	if ((isset($mashup_var_testimonial_title) && $mashup_var_testimonial_title <> '') || (isset($mashup_var_testimonial_sub_title) and $mashup_var_testimonial_sub_title <> '')) {
	    
	    $html .= '<div class="element-title '.esc_html($mashup_var_testimonial_element_align) .'">';
	    
	    if (isset($mashup_var_testimonial_title) && $mashup_var_testimonial_title <> '') {
		$html .= '<h2>' . esc_html($mashup_var_testimonial_title) . '</h2> ';
	    }
	    
	    $html .='<em></em>';
	    
	    if (isset($mashup_var_testimonial_sub_title) && $mashup_var_testimonial_sub_title <> '') {
		$html .= '<p>' . esc_html($mashup_var_testimonial_sub_title) . '</p>';
	    }
	    
	    $html .= '</div>';
	}
	
	if (function_exists('mashup_enqueue_slick_script')) {
	    mashup_enqueue_slick_script();
	}

	$mashup_inline_script = '
		jQuery(document).ready(function () {
			"use strict";
			jQuery(".cs-testimonial-slider").slick({
				dots: true,
				arrows: false,
				slidesToShow: 1,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 2000,
			});
		});';
	mashup_inline_enqueue_script($mashup_inline_script, 'mashup-functions');

	$html .= '<ul class="cs-testimonial-slider">';
	$html .= do_shortcode($content);
	$html .= ' </ul>';

	if (isset($column_class) && $column_class <> '') {
	    $html .= ' </div>';
	}

	return $html;
    }

    if (function_exists('mashup_short_code')) {
	mashup_short_code('mashup_testimonial', 'mashup_testimonials_shortcode');
    }
}

if (function_exists('mashup_var_short_code'))
    mashup_var_short_code('mashup_testimonial', 'mashup_testimonials_shortcode');
/*
 *
 * @Shortcode Name :  Start function for Testimonial Item shortcode/element front end view
 * @retrun
 *
 */
if (!function_exists('mashup_testimonial_item')) {

    function mashup_testimonial_item($atts, $content = null) {
	global $column_class, $post, $mashup_var_author_color, $mashup_var_position_color;
	$width = '150';
	$height = '150';
	$defaults = array('mashup_var_testimonial_author' => '', 'mashup_var_testimonial_position' => '', 'mashup_var_testimonial_author_image_array' => '');

	extract(shortcode_atts($defaults, $atts));
	$figure = '';
	$html = '';

	$mashup_var_testimonial_author_image_array = isset($mashup_var_testimonial_author_image_array) ? $mashup_var_testimonial_author_image_array : '';
	$image_id = mashup_var_get_image_id($mashup_var_testimonial_author_image_array);
	$image_url = mashup_attachment_image_src($image_id, $width, $height);
	$mashup_var_testimonial_position = isset($mashup_var_testimonial_position) ? $mashup_var_testimonial_position : '';
	$mashup_var_testimonial_author = isset($mashup_var_testimonial_author) ? $mashup_var_testimonial_author : '';
	$author_color = '';
	if ($mashup_var_author_color != '') {
	    $author_color = 'style="color: ' . esc_html($mashup_var_author_color) . ' !important;"';
	}
	$position_color = '';
	if ($mashup_var_position_color != '') {
	    $position_color = 'style="color: ' . esc_html($mashup_var_position_color) . ' !important;"';
	}

	$html .= '';
	$html .= ' <li>';
	if ($image_url <> '') {
	    $html .= '<div class="cs-media">';
	    $html .= ' <figure><img src="' . esc_url($image_url) . '" alt=""></figure>';
	    $html .= '</div>';
	}
	$html .= '<div class="cs-text">';
	$html .= '<p>' . do_shortcode($content) . '</p>';
	$html .= '<div class="author-detail">';
	$html .= '<div class="author-name">';

	$html .= '<span class="cs-divider-shap cs-color"></span>';
	if ($mashup_var_testimonial_author <> '') {
	    $html .= '<h6 ' . $author_color . '>' . esc_html($mashup_var_testimonial_author) . '';
	}
	if ($mashup_var_testimonial_position <> '') {
	    $html .= '<span ' . $position_color . '>' . esc_html($mashup_var_testimonial_position) . '</span></h6>';
	}
	$html .= '</div>';
	$html .= ' </div>';
	$html .= '</div>';
	$html .= '</li>';
	return $html;
    }

    if (function_exists('mashup_short_code')) {
	mashup_short_code('testimonial_item', 'mashup_testimonial_item');
    }
}
if (function_exists('mashup_var_short_code'))
    mashup_var_short_code('testimonial_item', 'mashup_testimonial_item');
