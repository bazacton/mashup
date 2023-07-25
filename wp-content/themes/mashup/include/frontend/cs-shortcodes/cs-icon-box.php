<?php

/*
 *
 * @Shortcode Name :  Start function for Multiple icon_box shortcode/element front end view
 * @retrun
 *
 */
if (!function_exists('mashup_var_icon_boxes_shortcode')) {

    function mashup_var_icon_boxes_shortcode($atts, $content = "") {
	global $post, $mashup_var_icon_box_column, $mashup_icon_box_icon_color, $mashup_title_color, $mashup_var_link_url, $mashup_var_icon_box_view, $mashup_var_icon_box_icon_size, $mashup_icon_box_content_align;
	$defaults = array(
	    'mashup_var_column_size' => '',
	    'mashup_var_icon_boxes_title' => '',
	    'mashup_var_icon_box_column' => '',
	    'mashup_icon_box_content_color' => '',
	    'mashup_title_color' => '',
	    'mashup_var_icon_box_view' => '',
	    'mashup_icon_box_icon_color' => '',
	    'mashup_var_icon_box_icon_size' => '',
	    'mashup_icon_box_content_align' => '',
	    'mashup_var_icon_box_sub_title' => '',
	    'mashup_var_icon_box_element_align' => '',
	);
	extract(shortcode_atts($defaults, $atts));
	$mashup_var_column_size = isset($mashup_var_column_size) ? $mashup_var_column_size : '';
	$mashup_var_icon_boxes_title = isset($mashup_var_icon_boxes_title) ? $mashup_var_icon_boxes_title : '';
	$mashup_var_icon_box_sub_title = isset($mashup_var_icon_box_sub_title) ? $mashup_var_icon_box_sub_title : '';
	$mashup_var_icon_box_element_align = isset($mashup_var_icon_box_element_align) ? $mashup_var_icon_box_element_align : '';
	$mashup_var_icon_box_column = isset($mashup_var_icon_box_column) ? $mashup_var_icon_box_column : '';
	$mashup_var_link_url = isset($mashup_var_link_url) ? $mashup_var_link_url : '';
	$mashup_var_icon_box_view = isset($mashup_var_icon_box_view) ? $mashup_var_icon_box_view : '';
	$mashup_var_icon_box_icon_size = isset($mashup_var_icon_box_icon_size) ? $mashup_var_icon_box_icon_size : '';
	$mashup_icon_box_content_align = isset($mashup_icon_box_content_align) ? $mashup_icon_box_content_align : '';
	$column_class = '';
	if (isset($mashup_var_column_size) && $mashup_var_column_size != '') {
	    if (function_exists('mashup_var_custom_column_class')) {
		$column_class = mashup_var_custom_column_class($mashup_var_column_size);
	    }
	}
	$mashup_section_title = '';
	$html = '';
	$title_subtitle_style = '';
	if (isset($mashup_icon_box_content_color) && $mashup_icon_box_content_color != '') {

	    $title_subtitle_style = 'style="color:' . esc_html($mashup_icon_box_content_color) . ' !important;"';
	}
	
	// element title and subtitle
	if ( (isset($mashup_var_icon_boxes_title) && $mashup_var_icon_boxes_title <> '') || (isset($mashup_var_icon_box_sub_title) and $mashup_var_icon_box_sub_title <> '') ) {
	    
	    $mashup_section_title .= '<div class="element-title '.esc_html($mashup_var_icon_box_element_align) .'">';
	    
	    if (isset($mashup_var_icon_boxes_title) && $mashup_var_icon_boxes_title <> '') {
		$mashup_section_title .= '<h2 ' . $title_subtitle_style . '>' . esc_html($mashup_var_icon_boxes_title) . '</h2> ';
	    }
	    
	    $mashup_section_title .='<em></em>';
	    
	    if (isset($mashup_var_icon_box_sub_title) && $mashup_var_icon_box_sub_title <> '') {
		$mashup_section_title .= '<p>' . esc_html($mashup_var_icon_box_sub_title) . '</p>';
	    }
	    
	    $mashup_section_title .= '</div>';
	}
	
	if ($mashup_section_title != '' || $content != '') {
	    if (isset($column_class) && $column_class <> '') {
		$html .= '<div class="' . esc_html($column_class) . '">';
	    }
	    if ($mashup_section_title != '') {
		$html .= $mashup_section_title;
	    }
	    if ($content != '') {
		$html .= '<div class="cs-icon-boxes-list">'
			. '<div class="row">';
		$html .= do_shortcode($content);
		$html .= '</div></div>';
	    }
	    if (isset($column_class) && $column_class <> '') {
		$html .= '</div>';
	    }
	}
	return do_shortcode(do_shortcode($html));
    }

    if (function_exists('mashup_var_short_code')) {
	mashup_var_short_code('icon_box', 'mashup_var_icon_boxes_shortcode');
    }
}
/*
 *
 * @Multiple  Start function for Multiple icon_box Item  shortcode/element front end view
 * @retrun
 *
 */
if (!function_exists('mashup_var_icon_boxes_item_shortcode')) {

    function mashup_var_icon_boxes_item_shortcode($atts, $content = "") {
	$defaults = array(
	    'icon_boxes_style' => '',
	    'mashup_var_icon_box_title' => '',
	    'mashup_var_icon_boxes_icon' => '',
	    'mashup_var_link_url' => '',
	    'mashup_var_icon_box_icon_type' => '',
	    'mashup_var_icon_box_image' => '',
	);
	global $post, $mashup_var_icon_box_column, $mashup_var_link_url, $mashup_title_color, $mashup_icon_box_icon_color, $mashup_var_icon_box_icon_size, $mashup_var_icon_box_view, $mashup_icon_box_content_align;

	extract(shortcode_atts($defaults, $atts));
	$html = '';
	$mashup_var_icon_box_view = isset($mashup_var_icon_box_view) ? $mashup_var_icon_box_view : '';
	$mashup_var_icon_boxes_icon = isset($mashup_var_icon_boxes_icon) ? $mashup_var_icon_boxes_icon : '';
	$mashup_var_icon_box_title = isset($mashup_var_icon_box_title) ? $mashup_var_icon_box_title : '';
	$mashup_var_link_url = isset($mashup_var_link_url) ? $mashup_var_link_url : '';
	$mashup_var_icon_box_icon_type = isset($mashup_var_icon_box_icon_type) ? $mashup_var_icon_box_icon_type : '';
	$mashup_var_icon_box_image = isset($mashup_var_icon_box_image) ? $mashup_var_icon_box_image : '';
	$col_class = '';
	if (isset($mashup_var_icon_box_column) && $mashup_var_icon_box_column != '') {
	    $number_col = 12 / $mashup_var_icon_box_column;
	    $number_col_sm = 12;
	    $number_col_xs = 12;
	    if ($number_col == 2) {
		$number_col_sm = 4;
		$number_col_xs = 6;
	    }
	    if ($number_col == 3) {
		$number_col_sm = 6;
		$number_col_xs = 12;
	    }
	    if ($number_col == 4) {
		$number_col_sm = 6;
		$number_col_xs = 12;
	    }
	    if ($number_col == 6) {
		$number_col_sm = 12;
		$number_col_xs = 12;
	    }
	    $col_class = 'col-lg-' . $number_col . ' col-md-' . $number_col . ' col-sm-' . $number_col_sm . ' col-xs-' . $number_col_xs . '';
	}
	if ($mashup_var_icon_boxes_icon != '' || $mashup_var_icon_box_title != '' || $content != '') {
	    $html .= ' <div class="' . esc_html($col_class) . '">';
	    $html .= '<div class="cs-icon-boxes ' . esc_html($mashup_var_icon_box_view) . ' ' . esc_html($mashup_icon_box_content_align) . '">';

	    if ($mashup_var_icon_boxes_icon != '' && $mashup_var_icon_box_icon_type == 'icon') {
		$html .= '<div class="cs-media">';
		if ($mashup_var_link_url != '') {
		    $html .= '<a href="' . esc_url($mashup_var_link_url) . '">';
		}
		$html .= '<i class="cs-color ' . esc_attr($mashup_var_icon_boxes_icon) . ' ' . $mashup_var_icon_box_icon_size . '" style="color:' . $mashup_icon_box_icon_color . ' !important;line-height:50px;">
                    </i>';
		if ($mashup_var_link_url != '') {
		    $html .= '</a>';
		}
		$html .= '</div>';
	    } elseif ($mashup_var_icon_box_image != '' && $mashup_var_icon_box_icon_type == 'image') {
		$html .= '<div class="cs-media">';
		if ($mashup_var_link_url != '') {
		    $html .= '<a href="' . esc_url($mashup_var_link_url) . '">';
		}
		$html .= '<div class="cs-media"><img src="' . esc_url($mashup_var_icon_box_image) . '" alt="' . esc_html($mashup_var_icon_box_title) . '"></div>';
		if ($mashup_var_link_url != '') {
		    $html .= '</a>';
		}
		$html .= '</div>';
	    }
	    if ($mashup_var_icon_box_title != '' || $content != '') {
		$html .= '<div class="cs-text left">';
		if ($mashup_var_icon_box_title != '') {
		    $html .= '<h6 style="color:' . esc_html($mashup_title_color) . ' !important;">';
		    if ($mashup_var_link_url != '') {
			$html .= '<a href="' . esc_url($mashup_var_link_url) . '" style="color:' . esc_html($mashup_title_color) . ' !important;">';
		    }
		    $html .= $mashup_var_icon_box_title;
		    if ($mashup_var_link_url != '') {
			$html .= '</a>';
		    }
		    $html .= '</h6>';
		}
		if ($content != '') {
		    $html .= do_shortcode($content);
		}
		$html .= '</div>';
	    }
	    $html .= '</div>';
	    $html .= '</div>';
	}
	return do_shortcode($html);
    }

    if (function_exists('mashup_var_short_code')) {
	mashup_var_short_code('icon_boxes_item', 'mashup_var_icon_boxes_item_shortcode');
    }
}
?>