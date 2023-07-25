<?php

/**
 * Quote html form for page builder
 */
if ( !function_exists( 'mashup_var_quote_shortcode' ) ) {

	function mashup_var_quote_shortcode( $atts, $content = "" ) {

		$mashup_var_defaults = array(
			'mashup_var_column_size' => '',
			'mashup_quote_section_title' => '',
			'quote_cite' => '',
			'quote_cite_url' => '#',
			'author_position' => '',
			'mashup_var_quote_sub_title' => '',
			'mashup_var_quote_element_align' => '',
		);
		$author_name = '';
		extract( shortcode_atts( $mashup_var_defaults, $atts ) );

		$mashup_quote_section_title = isset( $mashup_quote_section_title ) ? $mashup_quote_section_title : '';
		$quote_cite_url = isset( $quote_cite_url ) ? $quote_cite_url : '';
		$quote_cite = isset( $quote_cite ) ? $quote_cite : '';
		if ( isset( $quote_cite_url ) && $quote_cite_url <> '' ) {

			if ( isset( $quote_cite_url ) && $quote_cite_url <> '' ) {
				$author_name .= '<a class="text-color" href="' . esc_url( $quote_cite_url ) . '">';
			}
			$author_name .= $quote_cite;
			if ( isset( $quote_cite_url ) && $quote_cite_url <> '' ) {
				$author_name .= '</a>';
			}
		}

		$html = '';
		$column_class = '';
		if ( isset( $mashup_var_column_size ) && $mashup_var_column_size != '' ) {
			if ( function_exists( 'mashup_var_custom_column_class' ) ) {
				$column_class = mashup_var_custom_column_class( $mashup_var_column_size );
			}
		}
		if ( isset( $column_class ) && $column_class <> '' ) {
			$html .= '<div  class="' . esc_html( $column_class ) . '" >';
		}
		if ( (isset( $mashup_quote_section_title ) && $mashup_quote_section_title <> '') || (isset( $mashup_var_quote_sub_title ) and $mashup_var_quote_sub_title <> '' )) {

			$html .= '<div class="element-title ' . esc_html( $mashup_var_quote_element_align ) . '">';

			if ( isset( $mashup_quote_section_title ) && $mashup_quote_section_title <> '' ) {
				$html .= '<h2>' . esc_html( $mashup_quote_section_title ) . '</h2> ';
			}

			$html .='<em></em>';

			if ( isset( $mashup_var_quote_sub_title ) && $mashup_var_quote_sub_title <> '' ) {
				$html .= '<p>' . esc_html( $mashup_var_quote_sub_title ) . '</p>';
			}

			$html .= '</div>';
		}
		$html .= '<blockquote>';
		$html .= '<p>' . do_shortcode( $content ) . '</p>';
		if ( $author_name || $author_position ) {
			$html .= '<span class="author-name">';
			$html .= $author_name;
			if ( $author_name && $author_position ) {
				$html .= ' ';
			}
			$html .= $author_position;
			$html .= '</span>';
		}
		$html .= '</blockquote>';
		if ( isset( $column_class ) && $column_class <> '' ) {
			$html .= '</div>';
		}
		return $html;
	}

	if ( function_exists( 'mashup_var_short_code' ) )
		mashup_var_short_code( 'mashup_quote', 'mashup_var_quote_shortcode' );
}