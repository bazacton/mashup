<?php

/*
 *
 * @Shortcode Name :  infobox front end view
 * @retrun
 *
 */
if ( !function_exists( 'mashup_var_infobox_shortcode' ) ) {

	function mashup_var_infobox_shortcode( $atts, $content = "" ) {
		global $post, $mashup_var_infobox_column, $mashup_var_infobox_title_color, $mashup_var_info_icon_color, $mashup_var_info_title_color;
		$defaults = array(
			'mashup_var_column_size' => '',
			'mashup_var_infobox_icon' => '',
			'mashup_var_infobox_main_title' => '',
			'mashup_var_info_icon_color' => '',
			'mashup_var_info_title_color' => '',
			'mashup_var_info_content_color' => '',
			'mashup_var_info_sub_title' => '',
			'mashup_var_info_element_align' => '',
		);
		extract( shortcode_atts( $defaults, $atts ) );
		$mashup_var_info_sub_title = isset( $mashup_var_info_sub_title ) ? $mashup_var_info_sub_title : '';
		$mashup_var_info_element_align = isset( $mashup_var_info_element_align ) ? $mashup_var_info_element_align : '';
		$mashup_var_column_size = isset( $mashup_var_column_size ) ? $mashup_var_column_size : '';
		$mashup_var_infobox_main_title = isset( $mashup_var_infobox_main_title ) ? $mashup_var_infobox_main_title : '';
		$mashup_var_info_icon_color = isset( $mashup_var_info_icon_color ) ? $mashup_var_info_icon_color : '';
		$mashup_var_info_title_color = isset( $mashup_var_info_title_color ) ? $mashup_var_info_title_color : '';
		$mashup_var_info_content_color = isset( $mashup_var_info_content_color ) ? $mashup_var_info_content_color : '';
		$html = '';
		$mashup_section_title = '';
		$mashup_section_sub_title = '';
		$column_class = '';
		$column_class = '';
		if ( isset( $mashup_var_column_size ) && $mashup_var_column_size != '' ) {
			if ( function_exists( 'mashup_var_custom_column_class' ) ) {
				$column_class = mashup_var_custom_column_class( $mashup_var_column_size );
			}
		}

		if ( isset( $column_class ) && $column_class <> '' ) {
			$html .= '<div class="' . esc_html( $column_class ) . '">';
		}
		// element title and subtitle
		if ( (isset( $mashup_var_infobox_main_title ) && $mashup_var_infobox_main_title <> '') || (isset( $mashup_var_info_sub_title ) and $mashup_var_info_sub_title <> '' )) {

			$html .= '<div class="element-title ' . esc_html( $mashup_var_info_element_align ) . '">';

			if ( isset( $mashup_var_infobox_main_title ) && $mashup_var_infobox_main_title <> '' ) {
				$html .= '<h2>' . esc_html( $mashup_var_infobox_main_title ) . '</h2> ';
			}

			$html .='<em></em>';

			if ( isset( $mashup_var_info_sub_title ) && $mashup_var_info_sub_title <> '' ) {
				$html .= '<p>' . esc_html( $mashup_var_info_sub_title ) . '</p>';
			}

			$html .= '</div>';
		}

		$html .='<div class="row">';
		$html .= do_shortcode( $content );
		$html .='</div>';
		if ( isset( $column_class ) && $column_class <> '' ) {
			$html .= '</div>';
		}
		return do_shortcode( $html );
	}

}
if ( function_exists( 'mashup_var_short_code' ) )
	mashup_var_short_code( 'mashup_infobox', 'mashup_var_infobox_shortcode' );
/*
 *
 * @List  Item  shortcode/element front end view
 * @retrun
 *
 */
if ( !function_exists( 'mashup_var_infobox_item_shortcode' ) ) {

	function mashup_var_infobox_item_shortcode( $atts, $content = "" ) {
		global $post, $mashup_var_infobox_column, $mashup_var_infobox_title_color, $mashup_var_info_icon_color, $mashup_var_info_title_color;
		$output = '';
		$defaults = array(
			'mashup_var_infobox_element_title' => '',
			'mashup_var_infobox_icon' => '',
			'mashup_var_icon_box' => '',
			'mashup_var_infobox_item_title' => '',
		);
		extract( shortcode_atts( $defaults, $atts ) );
		$mashup_var_infobox_column_str = '';
		$mashup_var_infobox_element_title = isset( $mashup_var_infobox_element_title ) ? $mashup_var_infobox_element_title : '';
		$mashup_var_infobox_item_title = isset( $mashup_var_infobox_item_title ) ? $mashup_var_infobox_item_title : '';
		$mashup_var_icon_box = isset( $mashup_var_icon_box ) ? $mashup_var_icon_box : '';
		$title_color = '';
		$icon_color = '';
		if ( isset( $mashup_var_info_icon_color ) && $mashup_var_info_icon_color != '' ) {
			$icon_color = 'style="color:' . esc_html( $mashup_var_info_icon_color ) . ' !important"';
		}
		if ( isset( $mashup_var_info_title_color ) && $mashup_var_info_title_color != '' ) {
			$title_color = 'style="color:' . esc_html( $mashup_var_info_title_color ) . ' !important"';
		}

		$output .= '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">';
		$output .= '<div class="contact-info">';
		$output .= '<span class="text-color">';
		$output .='<i ' . $icon_color . ' class="' . esc_html( $mashup_var_icon_box ) . '"></i>';
		$output .= '</span>';
		$output .='<div class="text-holder">';
		$output .='<h5 ' . $title_color . '>' . esc_html( $mashup_var_infobox_item_title ) . '</h5>';
		$output .= do_shortcode( $content );
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';

		$randid = rand( 877, 9999 );
		return $output;
	}

}
if ( function_exists( 'mashup_var_short_code' ) )
	mashup_var_short_code( 'infobox_item', 'mashup_var_infobox_item_shortcode' );
?>