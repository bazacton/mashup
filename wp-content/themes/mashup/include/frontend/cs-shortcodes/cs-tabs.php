<?php

/*
 *
 * @Shortcode Name :  tabs front end view
 * @retrun
 *
 */

if ( !function_exists( 'mashup_var_tabs_shortcode' ) ) {

	function mashup_var_tabs_shortcode( $atts, $content = "" ) {
		global $post, $mashup_var_tabs_column;
		global $tabs_content;
		$tabs_content = '';
		$defaults = array(
			'mashup_var_tabs_title' => '',
			'mashup_var_tabs_style' => '',
			'mashup_var_tab_sub_title' => '',
			'mashup_var_tab_align' => '',
		);

		extract( shortcode_atts( $defaults, $atts ) );
		$mashup_var_tabs_title = isset( $mashup_var_tabs_title ) ? $mashup_var_tabs_title : '';
		$mashup_var_tabs_style = isset( $mashup_var_tabs_style ) ? $mashup_var_tabs_style : '';
		$mashup_var_tab_sub_title = isset( $mashup_var_tab_sub_title ) ? $mashup_var_tab_sub_title : '';
		$mashup_var_tab_align = isset( $mashup_var_tab_align ) ? $mashup_var_tab_align : '';
		$html = '';
		$mashup_section_title = '';
		$mashup_section_sub_title = '';
		if ( (isset( $mashup_var_tabs_title ) && $mashup_var_tabs_title <> '') || (isset( $mashup_var_tab_sub_title ) && $mashup_var_tab_sub_title <> '' )) {
			$mashup_section_title = '<div class="element-title ' . esc_html( $mashup_var_tab_align ) . '">';

			if ( isset( $mashup_var_tabs_title ) && $mashup_var_tabs_title <> '' ) {
				$mashup_section_title .= '<h2>' . esc_attr( $mashup_var_tabs_title ) . '</h2>';
			}

			$mashup_section_title .= '<em></em>';

			if ( isset( $mashup_var_tab_sub_title ) && $mashup_var_tab_sub_title <> '' ) {
				$mashup_section_title .= '<p>' . esc_html( $mashup_var_tab_sub_title ) . '</p>';
			}
		}
		$mashup_section_title .= '</div>';
		$mashup_tabs_style = "vertical";

		$html .= $mashup_section_title;
		if ( $mashup_var_tabs_style == "Horizontal" ) {
			$html .= "<div class='cs-tabs full-width horizontal-tabs'>";
		} else {
			$html .= "<div class='cs-faq-tabs vertical-tabs'>";
		}
		$html .= '  <ul class="nav nav-tabs" role="tablist">';
		$html .= do_shortcode( $content );
		$html .= '</ul>';
		$html .= '<div class="tab-content">';
		$html .= $tabs_content;
		$html .= '</div>';
		$html .= '</div>';


		return do_shortcode( $html );
	}

	if ( function_exists( 'mashup_var_short_code' ) ) {
		mashup_var_short_code( 'mashup_tabs', 'mashup_var_tabs_shortcode' );
	}
}


/*
 *
 * @List  Item  shortcode/element front end view
 * @retrun
 *
 */

if ( !function_exists( 'mashup_var_tabs_item_shortcode' ) ) {

	function mashup_var_tabs_item_shortcode( $atts, $content = "" ) {
		global $post, $mashup_var_tabs_column, $tabs_content;
		$output = '';
		global $tabs_content;
		$defaults = array(
			'mashup_var_tabs_item_text' => '',
			'mashup_var_tabs_item_icon' => '',
			'mashup_var_tabs_active' => ''
		);
		extract( shortcode_atts( $defaults, $atts ) );
		$mashup_var_tabs_column_str = '';
		if ( $mashup_var_tabs_column != 12 ) {
			$mashup_var_tabs_column_str = 'class = "col-md-' . esc_html( $mashup_var_tabs_column ) . '"';
		}
		$mashup_var_tabs_item_text = isset( $mashup_var_tabs_item_text ) ? $mashup_var_tabs_item_text : '';
		$mashup_var_tabs_color = isset( $mashup_var_tabs_color ) ? $mashup_var_tabs_color : '';
		$mashup_var_tabs_item_icon = isset( $mashup_var_tabs_item_icon ) ? $mashup_var_tabs_item_icon : '';
		$mashup_var_tabs_active = isset( $mashup_var_tabs_active ) ? $mashup_var_tabs_active : '';
		?>

		<?php

		$activeClass = "";
		if ( $mashup_var_tabs_active == 'Yes' ) {
			$activeClass = 'active in';
		}

		$fa_icon = '';
		if ( $mashup_var_tabs_item_icon ) {
			$fa_icon = '<i class="' . sanitize_html_class( $mashup_var_tabs_item_icon ) . '"></i>  ';
		}
		$randid = rand( 877, 9999 );
		$output .= '<li  class="' . ($activeClass) . ' in"><a data-toggle="tab" href="#cs-tab-' . sanitize_title( $mashup_var_tabs_item_text ) . $randid . '"  aria-expanded="true">' . $fa_icon . $mashup_var_tabs_item_text . '</a></li>';
		$tabs_content .= '<div id="cs-tab-' . sanitize_title( $mashup_var_tabs_item_text ) . $randid . '" class="tab-pane fade ' . ($activeClass) . '">';
		$tabs_content .= do_shortcode( $content );
		$tabs_content .= '</div>';

		return do_shortcode( $output );
	}

	if ( function_exists( 'mashup_var_short_code' ) ) {
		mashup_var_short_code( 'mashup_tabs_item', 'mashup_var_tabs_item_shortcode' );
	}
}
?>