<?php

/**
 * Ads html view for page builder
 *
 * @package Mashup
 */
if (!function_exists('mashup_var_mashup_ads')) {

    /**
     * Display ads shortcode html.
     *
     * @param array  $atts ads shortcode attributes.
     * @param string $content ads shortcode content.
     */
    function mashup_var_mashup_ads($atts = '', $content = '') {

	global $mashup_var_options;
	$defaults = array('id' => '0');
	extract(shortcode_atts($defaults, $atts));
	$html = '';
	if (isset($mashup_var_options['mashup_var_banner_field_code_no']) && is_array($mashup_var_options['mashup_var_banner_field_code_no'])) {
	    $i = 0;
	    foreach ($mashup_var_options['mashup_var_banner_field_code_no'] as $banner) :
		if ($mashup_var_options['mashup_var_banner_field_code_no'][$i] === $id) {
		    break;
		}
		$i ++;
	    endforeach;
	    $mashup_var_banner_title = isset($mashup_var_options['mashup_var_banner_title'][$i]) ? $mashup_var_options['mashup_var_banner_title'][$i] : '';
	    $mashup_var_banner_style = isset($mashup_var_options['mashup_var_banner_style'][$i]) ? $mashup_var_options['mashup_var_banner_style'][$i] : '';
	    $mashup_var_banner_type = isset($mashup_var_options['mashup_var_banner_type'][$i]) ? $mashup_var_options['mashup_var_banner_type'][$i] : '';
	    $mashup_var_banner_image = isset($mashup_var_options['mashup_var_banner_image_array'][$i]) ? $mashup_var_options['mashup_var_banner_image_array'][$i] : '';
	    $mashup_var_banner_url = isset($mashup_var_options['mashup_var_banner_field_url'][$i]) ? $mashup_var_options['mashup_var_banner_field_url'][$i] : '';
	    $mashup_var_banner_url_target = isset($mashup_var_options['mashup_var_banner_target'][$i]) ? $mashup_var_options['mashup_var_banner_target'][$i] : '';
	    $mashup_var_banner_adsense_code = isset($mashup_var_options['mashup_var_adsense_code'][$i]) ? $mashup_var_options['mashup_var_adsense_code'][$i] : '';
	    $mashup_var_banner_code_no = isset($mashup_var_options['mashup_var_banner_field_code_no'][$i]) ? $mashup_var_options['mashup_var_banner_field_code_no'][$i] : '';
	    if ('image' === $mashup_var_banner_type) {
		$banner_cookie = mashup_get_cookie('banner_clicks_' . $mashup_var_banner_code_no, false);
		if (!isset($banner_cookie) || $banner_cookie == '') {
		    $html .= '<div class="cs-media ad-banner ' . esc_html($mashup_var_banner_style) . '"><figure><a onclick="mashup_var_banner_click_count_plus(\'' . admin_url('admin-ajax.php') . '\', \'' . $mashup_var_banner_code_no . '\')" id="banner_clicks' . $mashup_var_banner_code_no . '" href="' . esc_url($mashup_var_banner_url) . '" target="_blank"><img src="' . esc_url($mashup_var_banner_image) . '" alt="' . $mashup_var_banner_title . '" /></a></figure></div>';
		} else {
		    $html .= '<div class="cs-media ad-banner ' . esc_html($mashup_var_banner_style) . '"><figure><a href="' . esc_url($mashup_var_banner_url) . '" target="' . $mashup_var_banner_url_target . '"><img src="' . esc_url($mashup_var_banner_image) . '" alt="' . $mashup_var_banner_title . '" /></a></figure></div>';
		}
	    } else {
		$html .= htmlspecialchars_decode(stripslashes($mashup_var_banner_adsense_code));
	    }
	}
	$mashup_inline_script = '
		function mashup_var_banner_click_count_plus(ajax_url, id) {
			"use strict";
			var dataString = "code_id=" + id + "&action=mashup_var_banner_click_count_plus";
			jQuery.ajax({
				type: "POST",
				url: ajax_url,
				data: dataString,
				success: function (response) {
				if (response != "error") {
						jQuery("#banner_clicks" + id).removeAttr("onclick");
					}
				}
			});
			return false;
		}';
	mashup_inline_enqueue_script($mashup_inline_script, 'mashup-functions');
	return $html;
	return do_shortcode($html);
    }

    if (function_exists('mashup_var_short_code')) {
	mashup_var_short_code('mashup_ads', 'mashup_var_mashup_ads');
    }
}
