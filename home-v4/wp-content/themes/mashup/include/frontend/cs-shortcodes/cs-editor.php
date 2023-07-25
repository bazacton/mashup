<?php

/*
 *
 * @Shortcode Name : Start function for Eitor shortcode/element front end view
 * @retrun
 *
 */

if ( !function_exists( 'mashup_var_editor_shortocde' ) ) {

	function mashup_var_editor_shortocde( $atts, $content = "" ) {
		$defaults = array(
			'mashup_var_column_size' => '',
			'mashup_var_editor_title' => '',
			'mashup_var_editor_sub_title' => '',
			'mashup_var_editor_align' => '',
		);
		extract( shortcode_atts( $defaults, $atts ) );
		$html = '';
		if ( isset( $mashup_var_column_size ) && $mashup_var_column_size != '' ) {
			if ( function_exists( 'mashup_var_custom_column_class' ) ) {
				$column_class = mashup_var_custom_column_class( $mashup_var_column_size );
			}
		}
		if ( (isset( $mashup_var_editor_title ) && $mashup_var_editor_title <> "") || (isset( $content ) && $content <> "") ) {
			if ( isset( $column_class ) && $column_class <> '' ) {
				$html .= '<div class="' . esc_html( $column_class ) . '">';
			}
			///// Editor Element Title
			if ( (isset( $mashup_var_editor_title ) && $mashup_var_editor_title <> '') || (isset( $mashup_var_editor_sub_title ) && $mashup_var_editor_sub_title <> '') ) {
				$html .= '<div class="element-title ' . esc_html( $mashup_var_editor_align ) . '">';
				if ( isset( $mashup_var_editor_title ) && $mashup_var_editor_title <> "" ) {
					$html .= '<h2>' . esc_html( $mashup_var_editor_title ) . '</h2>';
				}
				$html .= '<em></em>';
				if ( isset( $mashup_var_editor_sub_title ) && $mashup_var_editor_sub_title <> "" ) {
					$html .= '<p>' . esc_html( $mashup_var_editor_sub_title ) . '</p>';
				}
				$html .= '</div>';
			}
			///// Editor Content
			if ( isset( $content ) && $content <> "" ) {
				$content = nl2br( $content );
				$content = mashup_var_custom_shortcode_decode( $content );
				$html .= '<div class="mashup_editor"><div>' . do_shortcode( $content ) . '</div></div>';
			}

			if ( isset( $column_class ) && $column_class <> '' ) {
				$html .= ' </div>';
			}
		}
		return $html;
	}

	if ( function_exists( 'mashup_var_short_code' ) ) {
		mashup_var_short_code( 'mashup_editor', 'mashup_var_editor_shortocde' );
	}
}