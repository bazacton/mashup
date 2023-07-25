<?php

/*
 *
 * @Shortcode Name :  Start function for Progressbar  shortcode/element front end view
 * @retrun
 *
 */

if (!function_exists('mashup_var_progressbars_shortcode')) {

    function mashup_var_progressbars_shortcode($atts, $content = "") {

	$defaults = array(
	    'column_size' => '1/1',
	    'progressbars_element_title' => '',
	    'mashup_var_progressbars_sub_title' => '',
	    'mashup_var_progressbars_element_align' => '',
	);
	extract(shortcode_atts($defaults, $atts));
	$column_class = mashup_var_custom_column_class($column_size);

	$mashup_inline_script = '
		jQuery(document).ready(function () {
			jQuery(\'.progress .progress-bar\').css("width",
				function () {
					return $(this).attr("aria-valuenow") + "%";
				}
			)
		});';
	mashup_inline_enqueue_script($mashup_inline_script, 'mashup-functions');
	
	$output = '';

	// element title and subtitle
	if ( (isset($progressbars_element_title) && $progressbars_element_title <> '') || (isset($mashup_var_progressbars_sub_title) and $mashup_var_progressbars_sub_title <> '')) {
	    $output .= '<div class="element-title ' . esc_html($mashup_var_progressbars_element_align) . '">';
	    if (isset($progressbars_element_title) && $progressbars_element_title <> '') {
		$output .= '<h2>' . esc_html($progressbars_element_title) . '</h2> ';
	    }

	    $output .='<em></em>';
	    if (isset($mashup_var_progressbars_sub_title) && $mashup_var_progressbars_sub_title <> '') {
		$output .= '<p>' . esc_html($mashup_var_progressbars_sub_title) . '</p>';
	    }
	    $output .= '</div>';
	}
	$output .= '<div>';
	$output .= do_shortcode($content);
	$output .= '</div>';
	return $output;
    }

    if (function_exists('mashup_var_short_code')) {
	mashup_var_short_code('mashup_progressbar', 'mashup_var_progressbars_shortcode');
    }
}

/*
 *
 * @Shortcode Name :  Start function for Progressbar  item shortcode/element front end view
 * @retrun
 *
 */



if (!function_exists('mashup_var_progressbar_item_shortcode')) {

    function mashup_var_progressbar_item_shortcode($atts, $content = "") {

	$defaults = array('progressbars_title' => '', 'progressbars_color' => '', 'progressbars_percentage' => '50');
	extract(shortcode_atts($defaults, $atts));
	$progressbars_color = isset($progressbars_color) ? $progressbars_color : '';
	$output = '';
	$output .= '<div class="progress-info">';
	$output .= '<span>' . esc_html($progressbars_title) . '</span>';
	$output .= '<small>' . esc_html($progressbars_percentage) . '%</small>';
	$output .= '</div>';
	$output .= '<div class="progress skill-bar">';
	$output .= '<div class="progress-bar progress-bar-success" style="background:' . esc_html($progressbars_color) . '; " role="progressbar" aria-valuenow="' . $progressbars_percentage . '" aria-valuemin="0" aria-valuemax="100" ></div>';
	$output .= '</div>';
	return $output;
    }

    if (function_exists('mashup_var_short_code')) {
	mashup_var_short_code('progressbar_item', 'mashup_var_progressbar_item_shortcode');
    }
}
?>