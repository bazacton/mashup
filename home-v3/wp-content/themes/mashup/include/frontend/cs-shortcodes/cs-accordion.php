<?php

/*
 *
 * @Shortcode Name : Accordion
 * @retrun
 *
 */
if (!function_exists('mashup_accordion_shortcode')) {

    function mashup_accordion_shortcode($atts, $content = "") {
	global $acc_counter, $mashup_var_accordion_column;
	$acc_counter = rand(40, 9999999);
	$html = '';
	$defaults = array(
	    'mashup_var_column_size' => '',
	    'mashup_var_accordion_view' => '',
	    'mashup_var_accordion_column' => '',
	    'mashup_var_accordian_sub_title' => '',
	    'mashup_var_accordian_main_title' => '',
	    'accordion_align' => 'center',
	);
	extract(shortcode_atts($defaults, $atts));
	$column_class = '';
	$mashup_var_accordion_view = isset($mashup_var_accordion_view) ? $mashup_var_accordion_view : '';
	$mashup_var_column_size = isset($mashup_var_column_size) ? $mashup_var_column_size : '';
	$mashup_var_accordian_main_title = isset($mashup_var_accordian_main_title) ? $mashup_var_accordian_main_title : '';
	$mashup_var_accordian_sub_title = isset($mashup_var_accordian_sub_title) ? $mashup_var_accordian_sub_title : '';
	$mashup_var_counter_col = isset($mashup_var_accordion_column) ? $mashup_var_accordion_column : '';
	$accordion_align = isset($accordion_align) ? $accordion_align : '';
	if (isset($mashup_var_counter_col) && $mashup_var_counter_col != '') {
	    $number_col = 12 / $mashup_var_counter_col;
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
	if (isset($mashup_var_column_size) && $mashup_var_column_size != '') {
	    if (function_exists('mashup_var_custom_column_class')) {
		$column_class = mashup_var_custom_column_class($mashup_var_column_size);
	    }
	}
	if (isset($column_class) && $column_class <> '') {
	    $html .= '<div class="' . esc_html($column_class) . '">';
	}
	$boxex_class = '';
	if (isset($mashup_var_accordion_view) && $mashup_var_accordion_view == 'modern') {
	    $boxex_class = ' box';
	}
	if ((isset($mashup_var_accordian_main_title) && trim($mashup_var_accordian_main_title) <> '') || (isset($mashup_var_accordian_sub_title) && $mashup_var_accordian_sub_title <> '')) {
	    $html .= '<div class="element-title ' . esc_html($accordion_align) . '">';
	    if (isset($mashup_var_accordian_main_title) && $mashup_var_accordian_main_title <> '') {
		$html .= '<h2>' . esc_html($mashup_var_accordian_main_title) . '</h2>';
	    }
	    $html .= '<em></em>';
	    if (isset($mashup_var_accordian_sub_title) && $mashup_var_accordian_sub_title <> '') {
		$html .= '<p>' . esc_html($mashup_var_accordian_sub_title) . '</p>';
	    }
	    $html .= '</div>';
	}
	$html .= '<div class="panel-group ' . $boxex_class . '" id="accordion_' . absint($acc_counter) . '" role="tablist" aria-multiselectable="true">';
	$html .= do_shortcode($content);
	$html .= '</div>';
	if (isset($column_class) && $column_class <> '') {
	    $html .= '</div>';
	}
	return $html;
    }

    if (function_exists('mashup_var_short_code')) {
	mashup_var_short_code('mashup_accordion', 'mashup_accordion_shortcode');
    }
}

/*
 *
 * @Accordion Item
 * @retrun
 *
 */
if (!function_exists('mashup_accordion_item_shortcode')) {

    function mashup_accordion_item_shortcode($atts, $content = "") {
	global $acc_counter;
	$strings = new mashup_theme_all_strings;
	$strings->mashup_short_code_strings();
	$defaults = array(
	    'mashup_var_accordion_title' => 'Title',
	    'mashup_var_icon_box' => '',
	    'mashup_var_accordion_active' => 'yes',
	);
	extract(shortcode_atts($defaults, $atts));
	$mashup_var_acc_icon = '';
	$mashup_var_accordion_title = isset($mashup_var_accordion_title) ? $mashup_var_accordion_title : '';
	$mashup_var_icon_box = isset($mashup_var_icon_box) ? $mashup_var_icon_box : '';
	$mashup_var_accordion_active = isset($mashup_var_accordion_active) ? $mashup_var_accordion_active : '';
	if (isset($mashup_var_icon_box) && $mashup_var_icon_box != '') {
	    $mashup_var_acc_icon = '<i class="' . $mashup_var_icon_box . '"></i>';
	}
	$accordion_count = 0;
	$accordion_count = rand(4045, 99999);
	$html = '';
	$active_in = '';
	$active_class = '';
	$styleColapse = 'collapsed';
	if (isset($mashup_var_accordion_active) && $mashup_var_accordion_active == 'yes') {
	    $active_in = 'in';
	    $styleColapse = '';
	} else {
	    $active_class = 'collapsed';
	}
	$html .= ' <div class="panel panel-default">';
	$html .= '  <div class="panel-heading" role="tab" id="heading_' . absint($accordion_count) . '">';
	$html .= '   <h6 class="panel-title">';
	$html .= '<a  role="button" class="' . esc_html($active_class) . '" data-toggle="collapse" data-parent="#accordion_' . absint($acc_counter) . '" href="#collapse' . absint($accordion_count) . '">' . $mashup_var_acc_icon . esc_html($mashup_var_accordion_title) . '</a>';
	$html .= '   </h6>';
	$html .= ' </div>';
	$html .= '  <div id="collapse' . absint($accordion_count) . '" class="panel-collapse collapse ' . esc_html($active_in) . '"	role="tabpanel" aria-labelledby="heading_' . absint($accordion_count) . '">';
	$html .= '     <div class="panel-body">' . do_shortcode($content) . '</div>';
	$html .= ' </div>';
	$html .= '</div>
		';
	return $html;
    }

    if (function_exists('mashup_var_short_code')) {
	mashup_var_short_code('accordion_item', 'mashup_accordion_item_shortcode');
    }
}
?>