<?php

/**
 * dropcap html form for page builder
 */
if ( ! function_exists( 'mashup_var_dropcap_shortcode' ) ) {

    function mashup_var_dropcap_shortcode( $atts, $content = "" ) {

        $mashup_var_defaults = array(
            'mashup_var_column_size' => '',
            'mashup_dropcap_section_title' => '',
			'mashup_var_dropcap_sub_title' => '',
			'mashup_var_dropcap_align' => '',
        );
        $author_name = '';
        extract( shortcode_atts( $mashup_var_defaults, $atts ) );

        $mashup_dropcap_section_title = isset( $mashup_dropcap_section_title ) ? $mashup_dropcap_section_title : '';
		$mashup_var_dropcap_sub_title = isset( $mashup_var_dropcap_sub_title ) ? $mashup_var_dropcap_sub_title : '';
		$mashup_var_dropcap_align = isset( $mashup_var_dropcap_align ) ? $mashup_var_dropcap_align : '';
        $dropcap_cite_url = isset( $dropcap_cite_url ) ? $dropcap_cite_url : '';
        $dropcap_cite = isset( $dropcap_cite ) ? $dropcap_cite : '';
        if ( isset( $dropcap_cite_url ) && $dropcap_cite_url <> '' ) {

            if ( isset( $dropcap_cite_url ) && $dropcap_cite_url <> '' ) {
                $author_name .= '<a href="' . esc_url( $dropcap_cite_url ) . '">';
            }
            $author_name .= '-- ' . $dropcap_cite;
            if ( isset( $dropcap_cite_url ) && $dropcap_cite_url <> '' ) {
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
        if ( (isset( $mashup_dropcap_section_title ) && $mashup_dropcap_section_title <> '') || (isset( $mashup_var_dropcap_sub_title ) && $mashup_var_dropcap_sub_title <> '') ) {
            $html .= '<div class="element-title '. esc_html( $mashup_var_dropcap_align ) .'">';
			if( isset( $mashup_dropcap_section_title ) && $mashup_dropcap_section_title <> '' ){
				$html .= '<h2>' . esc_html( $mashup_dropcap_section_title ) . '</h2>';
			}
			$html .= '<em></em>';
			if( isset( $mashup_var_dropcap_sub_title ) && $mashup_var_dropcap_sub_title <> '' ){
				$html .= '<p>' . esc_html( $mashup_var_dropcap_sub_title ) . '</p>';
			}
			$html .= '</div>';
        }
        $html .= '<div class="cs-dropcap">
		<p>' . do_shortcode( $content ) . '</p>
		</div>';
        if ( isset( $column_class ) && $column_class <> '' ) {
            $html .= '</div>';
        }
        return $html;
    }

    if ( function_exists( 'mashup_var_short_code' ) )
        mashup_var_short_code( 'mashup_dropcap', 'mashup_var_dropcap_shortcode' );
}