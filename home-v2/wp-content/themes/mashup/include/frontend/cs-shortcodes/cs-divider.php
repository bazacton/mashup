<?php

/**
 * @Divider html form for page builder
 */
if ( !function_exists( 'mashup_var_mashup_divider_shortcode' ) ) {

	function mashup_var_mashup_divider_shortcode( $atts, $content = "" ) {

		$mashup_var_defaults = array(
			'mashup_var_divider_padding_left' => '0',
			'mashup_var_divider_padding_right' => '0',
			'mashup_var_divider_margin_top' => '0',
			'mashup_var_divider_margin_buttom' => '0',
			'mashup_var_divider_align' => '',
		);
		extract( shortcode_atts( $mashup_var_defaults, $atts ) );


		$mashup_var_divider_padding_left = isset( $mashup_var_divider_padding_left ) ? $mashup_var_divider_padding_left : '';
		$mashup_var_divider_padding_right = isset( $mashup_var_divider_padding_right ) ? $mashup_var_divider_padding_right : '';
		$mashup_var_divider_margin_top = isset( $mashup_var_divider_margin_top ) ? $mashup_var_divider_margin_top : '';
		$mashup_var_divider_margin_buttom = isset( $mashup_var_divider_margin_buttom ) ? $mashup_var_divider_margin_buttom : '';
		$mashup_var_divider_align = isset( $mashup_var_divider_align ) ? $mashup_var_divider_align : '';
		$style_string = '';
		$html = '';
		if ( $mashup_var_divider_padding_left != '' || $mashup_var_divider_padding_right != '' || $mashup_var_divider_margin_top != '' || $mashup_var_divider_margin_buttom != '' ) {
			$style_string .= ' ';
			if ( $mashup_var_divider_padding_left != '' ) {
				$style_string .= ' padding-left:' . esc_html( $mashup_var_divider_padding_left ) . 'px; ';
			}
			if ( $mashup_var_divider_padding_right != '' ) {
				$style_string .= ' padding-right:' . esc_html( $mashup_var_divider_padding_right ) . 'px; ';
			}
			if ( $mashup_var_divider_margin_top != '' ) {
				$style_string .= ' margin-top:' . esc_html( $mashup_var_divider_margin_top ) . 'px; ';
			}
			if ( $mashup_var_divider_margin_buttom != '' ) {
				$style_string .= ' margin-bottom:' . esc_html( $mashup_var_divider_margin_buttom ) . 'px; ';
			}

			$style_string .= ' ';
		}
		$text_align = 'style=text-align:center;';
		$html .= '<div class="' . esc_html( $mashup_var_divider_align ) . '">';
		$html .= '<div  style=" ' . esc_html( $style_string ) . '" class="cs-spreator">';
		$html .= '<div class="cs-seprater" ' . esc_html( $text_align ) . '> <span> <i class="icon-transport177"> </i> </span> </div>';
		$html .= '</div>';
		$html .= '</div>';



		return do_shortcode( $html );
	}

	if ( function_exists( 'mashup_var_short_code' ) )
		mashup_var_short_code( 'mashup_divider', 'mashup_var_mashup_divider_shortcode' );
}