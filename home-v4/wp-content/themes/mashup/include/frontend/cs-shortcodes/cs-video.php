<?php

/*
 *
 * @Shortcode Name : Video 
 * @retrun
 *
 */
if (!function_exists('mashup_var_video')) {

    function mashup_var_video($atts, $content = "") {
	$defaults = array(
	    'mashup_var_column_size' => '',
	    'mashup_var_element_title' => '',
	    'mashup_var_element_sub_title' => '',
	    'mashup_var_element_align' => '',
	    'mashup_var_video_url' => '',
            'mashup_var_height' => '180',
	);
	extract(shortcode_atts($defaults, $atts));
	$mashup_var_element_title = isset($mashup_var_element_title) ? $mashup_var_element_title : '';
	$mashup_var_element_sub_title = isset($mashup_var_element_sub_title) ? $mashup_var_element_sub_title : '';
	$mashup_var_element_align = isset($mashup_var_element_align) ? $mashup_var_element_align : '';
	$mashup_var_video_url = isset($mashup_var_video_url) ? $mashup_var_video_url : '';
        $mashup_var_height = isset($mashup_var_height) ? $mashup_var_height : '';
	$video_url = '';
	$video_url = parse_url($mashup_var_video_url);
	$mashup_iframe = '<' . 'i' . 'frame ';
	// Column Class
	$column_class = '';
	if (isset($mashup_var_column_size) && $mashup_var_column_size != '') {
	    if (function_exists('mashup_var_custom_column_class')) {
		$column_class = mashup_var_custom_column_class($mashup_var_column_size);
	    }
	}
	// Start Element Column CLass
	$video = '';
	if (isset($column_class) && $column_class <> '') {
	    $video .= '<div class="' . esc_html($column_class) . '">';
	}

	// Start Video Element Content
	if ('' != $mashup_var_element_title && '' != $mashup_var_element_sub_title) {
	    $video .= '<div class="element-title ' . esc_html($mashup_var_element_align) . '">';
	    if ('' != $mashup_var_element_title) {
		$video .= '<h2>' . esc_html($mashup_var_element_title) . '</h2>';
	    }
	    $video .= '<em></em>';
	    if ('' != $mashup_var_element_sub_title) {
		$video .= '<p>' . esc_html($mashup_var_element_sub_title) . '</p>';
	    }
	    $video .= '</div>';
	}
	if ($mashup_var_video_url != '') {
	    if ($video_url['host'] == $_SERVER["SERVER_NAME"]) {
		$video .= '<figure  class="cs-video ' . $column_class . '">';
		$video .= '' . do_shortcode('[video height="'.$mashup_var_height.'"  src="' . esc_url($mashup_var_video_url) . '"][/video]') . '';
		$video .= '</figure>';
	    } else {
		if ($video_url['host'] == 'vimeo.com') {
		    $content_exp = explode("/", $mashup_var_video_url);
		    $content_vimo = array_pop($content_exp);
		    $video .= '<figure  class="cs-video ' . $column_class . '">';
		    $video .= $mashup_iframe . '  src="' . mashup_server_protocol() . 'player.vimeo.com/video/' . $content_vimo . '" height="'.$mashup_var_height.'" allowfullscreen></iframe>';
		    $video .= '</figure>';
		} else {
		    $video .= wp_oembed_get($mashup_var_video_url, array('height'=>$mashup_var_height));
		}
	    }
	}

	// End Video Element Content
	// End Element Column CLass
	if (isset($column_class) && $column_class <> '') {
	    $video .= '</div>';
	}
	return $video;
    }

    if (function_exists('mashup_var_short_code'))
	mashup_var_short_code('mashup_video', 'mashup_var_video');
}

function mashup_oembed_filter($return, $data, $url) {
    $return = str_replace('frameborder="0"', 'style="border: none"', $return);
    return $return;
}

add_filter('oembed_dataparse', 'mashup_oembed_filter', 90, 3);
