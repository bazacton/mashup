<?php

/*
 * @Shortcode Name :   Start function for Counter shortcode/element front end view
 */
if ( !function_exists( 'mashup_counters_shortcode' ) ) {

	function mashup_counters_shortcode( $atts, $content = null ) {
		global $post, $mashup_var_counter_col, $mashup_var_icon_color, $mashup_var_count_color, $mashup_var_content_color;
		$defaults = array(
			'mashup_var_column_size' => '1/1',
			'mashup_multi_counter_title' => '',
			'mashup_multi_counter_sub_title' => '',
			'mashup_var_counter_col' => '',
			'mashup_var_icon_color' => '',
			'mashup_var_count_color' => '',
			'mashup_var_content_color' => '',
			'mashup_var_counters_view' => '',
			'counter_align' => '',
		);
		extract( shortcode_atts( $defaults, $atts ) );
		$mashup_section_title = '';
		$mashup_var_column_size = '';
		$mashup_multi_counter_title = isset( $mashup_multi_counter_title ) ? $mashup_multi_counter_title : '';
		$mashup_multi_counter_sub_title = isset( $mashup_multi_counter_sub_title ) ? $mashup_multi_counter_sub_title : '';
		$mashup_var_counter_col = isset( $mashup_var_counter_col ) ? $mashup_var_counter_col : '';
		$counter_align = isset( $counter_align ) ? $counter_align : '';
		if ( isset( $mashup_var_column_size ) && $mashup_var_column_size != '' ) {
			if ( function_exists( 'mashup_var_custom_column_class' ) ) {
				$column_class = mashup_var_custom_column_class( $mashup_var_column_size );
			}
		}
		$mashup_var_counter = '';
		if ( isset( $column_class ) && $column_class <> '' ) {
			$mashup_var_counter .= '<div class="' . esc_html( $column_class ) . '">';
		}
		if ( (isset( $mashup_multi_counter_title ) && $mashup_multi_counter_title <> '') || (isset( $mashup_multi_counter_sub_title ) && $mashup_multi_counter_sub_title <> '') ) {
			$mashup_section_title .= '<div class="element-title ' . esc_html( $counter_align ) . '">';
			if ( isset( $mashup_multi_counter_title ) && $mashup_multi_counter_title <> '' ) {
				$mashup_section_title .= '<h2>' . esc_html( $mashup_multi_counter_title ) . '</h2>';
			}
			$mashup_section_title .= '<em></em>';
			if ( isset( $mashup_multi_counter_sub_title ) && $mashup_multi_counter_sub_title <> '' ) {
				$mashup_section_title .= '<p>' . esc_html( $mashup_multi_counter_sub_title ) . '</p>';
			}
			$mashup_section_title .= '</div>';
		}
		$mashup_var_counter .= $mashup_section_title;

		$mashup_var_counter .=' <div class="row">';
		$mashup_var_counter .= do_shortcode( $content );
		$mashup_var_counter .=' </div>';

		if ( isset( $column_class ) && $column_class <> '' ) {
			$mashup_var_counter .= '</div>';
		}

		return $mashup_var_counter;
	}

}

if ( function_exists( 'mashup_var_short_code' ) )
	mashup_var_short_code( 'multi_counter', 'mashup_counters_shortcode' );

/*
 * @Shortcode Name :  Start function for counter Item
 */
if ( !function_exists( 'mashup_counter_item' ) ) {

	function mashup_counter_item( $atts, $content = null ) {
		global $post, $mashup_var_counter_col, $mashup_var_icon_color, $mashup_var_count_color, $mashup_var_content_color;
		$col_class = '';
		if ( isset( $mashup_var_counter_col ) && $mashup_var_counter_col != '' ) {
			$number_col = 12 / $mashup_var_counter_col;
			$number_col_sm = 12;
			$number_col_xs = 12;
			if ( $number_col == 2 ) {
				$number_col_sm = 4;
				$number_col_xs = 6;
			}
			if ( $number_col == 3 ) {
				$number_col_sm = 6;
				$number_col_xs = 12;
			}
			if ( $number_col == 4 ) {
				$number_col_sm = 6;
				$number_col_xs = 12;
			}
			if ( $number_col == 6 ) {
				$number_col_sm = 12;
				$number_col_xs = 12;
			}
			$col_class = 'col-lg-' . $number_col . ' col-md-' . $number_col . ' col-sm-' . $number_col_sm . ' col-xs-' . $number_col_xs . '';
		}
		$mashup_var_counter_item = '';
		$defaults = array(
			'mashup_var_icon' => '',
			'mashup_var_count' => '',
			'mashup_var_title' => ''
		);

		extract( shortcode_atts( $defaults, $atts ) );
		$mashup_var_icon = isset( $mashup_var_icon ) ? $mashup_var_icon : '';
		$mashup_var_count = isset( $mashup_var_count ) ? $mashup_var_count : '';
		$mashup_var_icon_color = isset( $mashup_var_icon_color ) ? $mashup_var_icon_color : '';
		$mashup_var_count_color = isset( $mashup_var_count_color ) ? $mashup_var_count_color : '';
		$mashup_var_content_color = isset( $mashup_var_content_color ) ? $mashup_var_content_color : '';

		$mashup_var_content = $content;

		$mashup_var_counter_item .='<div class="' . esc_html( $col_class ) . '">';
		$mashup_var_counter_item .='<div class="cs-counter">';
		$mashup_var_counter_item .='<div class="cs-media">';
		if ( $mashup_var_title <> '' ) {
			$mashup_var_counter_item .='<h3>' . esc_html( $mashup_var_title ) . '</h3>';
		}
		$mashup_var_counter_item .='<figure> <i style="color:' . esc_html( $mashup_var_icon_color ) . ' !important" class="' . esc_html( $mashup_var_icon ) . ' cs-color"> </i> </figure>';
		$mashup_var_counter_item .='</div>';
		$mashup_var_counter_item .='<div class="cs-text" style="color:' . esc_html( $mashup_var_content_color ) . ' !important"> <strong  style="color:' . esc_html( $mashup_var_count_color ) . ' !important"  class="counter">' . esc_html( ($mashup_var_count ) ) . '</strong> <span>' . ($mashup_var_content) . '</span> </div>';
		$mashup_var_counter_item .='</div>';
		$mashup_var_counter_item .='</div>';

		return $mashup_var_counter_item;
	}

	if ( function_exists( 'mashup_var_short_code' ) )
		mashup_var_short_code( 'multi_counter_item', 'mashup_counter_item' );
}
