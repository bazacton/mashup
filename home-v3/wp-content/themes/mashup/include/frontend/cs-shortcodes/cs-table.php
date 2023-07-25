<?php

/*
 *
 * @Shortcode Name : Start function for Table shortcode/element front end view
 * @retrun
 *
 */

if ( !function_exists( 'mashup_var_table_shortcode' ) ) {

	function mashup_var_table_shortcode( $atts, $content = "" ) {
		$defaults = array( 'mashup_table_element_title' => '', 'mashup_var_column_size' => '', 'mashup_var_table_sub_title' => '', 'mashup_var_table_align' => '', );
		extract( shortcode_atts( $defaults, $atts ) );
		if ( isset( $mashup_var_column_size ) && $mashup_var_column_size != '' ) {
			if ( function_exists( 'mashup_var_custom_column_class' ) ) {
				$column_class = mashup_var_custom_column_class( $mashup_var_column_size );
			}
		}
		$html = '';
		////// Start Column Class
		if ( isset( $column_class ) && $column_class <> '' ) {
			$html .= '<div class="' . esc_html( $column_class ) . '">';
		}
		////// Element Title
		if ( (isset( $mashup_table_element_title ) && trim( $mashup_table_element_title ) <> '') || (isset( $mashup_var_table_sub_title ) && trim( $mashup_var_table_sub_title ) <> '' )) {
			$html .= '<div class="element-title ' . esc_html( $mashup_var_table_align ) . '">';
			if ( isset( $mashup_table_element_title ) && trim( $mashup_table_element_title ) <> '' ) {
				$html .='<h2>' . esc_html( $mashup_table_element_title ) . '</h2>';
			}
			$html .= '<em></em>';
			if ( isset( $mashup_var_table_sub_title ) && trim( $mashup_var_table_sub_title ) <> '' ) {
				$html .= '<p>' . esc_html( $mashup_var_table_sub_title ) . '</p>';
			}

			$html .= '</div>';
		}
		////// Table Content
		$html .= '<div class="cs-pricing-table table-responsive">' . do_shortcode( $content ) . '</div>';
		////// End Column Class
		if ( isset( $column_class ) && $column_class <> '' ) {
			$html .= ' </div>';
		}
		return $html;
	}

	if ( function_exists( 'mashup_var_short_code' ) ) {
		mashup_var_short_code( 'mashup_table', 'mashup_var_table_shortcode' );
	}
}
/*
 *
 * @Shortcode Name : Start function for Table shortcode/element front end view
 * @retrun
 *
 */
if ( !function_exists( 'mashup_table_shortcode' ) ) {

	function mashup_table_shortcode( $atts, $content = "" ) {
		$defaults = array( 'mashup_table_content' => '' );
		extract( shortcode_atts( $defaults, $atts ) );
		return '<table class="table ">' . do_shortcode( $content ) . '</table>';
	}

	if ( function_exists( 'mashup_var_short_code' ) ) {
		mashup_var_short_code( 'table', 'mashup_table_shortcode' );
	}
}

/*
 *
 * @Shortcode Name : Start function for Table Body  shortcode/element front end view
 * @retrun
 *
 */
if ( !function_exists( 'mashup_table_body_shortcode' ) ) {

	function mashup_table_body_shortcode( $atts, $content = "" ) {
		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );
		return '<tbody>' . do_shortcode( $content ) . '</tbody>';
	}

	if ( function_exists( 'mashup_var_short_code' ) ) {
		mashup_var_short_code( 'tbody', 'mashup_table_body_shortcode' );
	}
}
/*
 *
 * @Shortcode Name : Start function for Table Head  shortcode/element front end view
 * @retrun
 *
 */
if ( !function_exists( 'mashup_table_head_shortcode' ) ) {

	function mashup_table_head_shortcode( $atts, $content = "" ) {
		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );
		return '<thead>' . do_shortcode( $content ) . '</thead>';
	}

	if ( function_exists( 'mashup_var_short_code' ) ) {
		mashup_var_short_code( 'thead', 'mashup_table_head_shortcode' );
	}
}
/*
 *
 * @Shortcode Name : Start function for Table Row  shortcode/element front end view
 * @retrun
 *
 */
if ( !function_exists( 'mashup_table_row_shortcode' ) ) {

	function mashup_table_row_shortcode( $atts, $content = "" ) {
		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );
		return '<tr>' . do_shortcode( $content ) . '</tr>';
	}

	if ( function_exists( 'mashup_var_short_code' ) ) {
		mashup_var_short_code( 'tr', 'mashup_table_row_shortcode' );
	}
}

/*
 *
 * @Shortcode Name :Start function for Table Heading  shortcode/element front end view
 * @retrun
 *
 */
if ( !function_exists( 'mashup_table_heading_shortcode' ) ) {

	function mashup_table_heading_shortcode( $atts, $content = "" ) {
		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );
		$html = '';
		$html .= '<th>';
		$html .= do_shortcode( $content );
		$html .= '</th>';

		return $html;
	}

	if ( function_exists( 'mashup_var_short_code' ) ) {
		mashup_var_short_code( 'th', 'mashup_table_heading_shortcode' );
	}
}

/*
 *
 * @Shortcode Name :  Start function for Table Data  shortcode/element front end view
 * @retrun
 *
 */
if ( !function_exists( 'mashup_table_data_shortcode' ) ) {

	function mashup_table_data_shortcode( $atts, $content = "" ) {
		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );
		return '<td>' . do_shortcode( $content ) . '</td>';
	}

	if ( function_exists( 'mashup_var_short_code' ) ) {
		mashup_var_short_code( 'td', 'mashup_table_data_shortcode' );
	}
}
