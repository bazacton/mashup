<?php

/*
 *
 * @Shortcode Name : Map
 * @retrun
 *
 */
if ( ! function_exists( 'mashup_var_column' ) ) {

    function mashup_var_column( $atts, $content = "" ) {
        global $header_map;
        $defaults = array(
            'mashup_var_column_size' => '',
            'mashup_var_column_section_title' => '',
            'mashup_var_column_text' => '',
            'mashup_column_margin_left' => '',
            'mashup_column_margin_right' => '',
            'mashup_var_column_top_padding' => '',
            'mashup_var_column_bottom_padding' => '',
            'mashup_var_column_left_padding' => '',
            'mashup_var_column_right_padding' => '',
            'mashup_var_column_image_url_array' => '',
            'mashup_var_column_bg_color' => '',
            'mashup_var_column_title_color' => '',
            'mashup_var_column_sub_title' => '',
            'column_align' => '',
        );
        extract( shortcode_atts( $defaults, $atts ) );

        $mashup_var_column_section_title = isset( $mashup_var_column_section_title ) ? $mashup_var_column_section_title : '';
        $mashup_var_column_title_color = isset( $mashup_var_column_title_color ) ? $mashup_var_column_title_color : '';
        $mashup_column_margin_left = isset( $mashup_column_margin_left ) ? $mashup_column_margin_left : '';
        $mashup_column_margin_right = isset( $mashup_column_margin_right ) ? $mashup_column_margin_right : '';
        $mashup_var_column_top_padding = isset( $mashup_var_column_top_padding ) ? $mashup_var_column_top_padding : '';
        $mashup_var_column_bottom_padding = isset( $mashup_var_column_bottom_padding ) ? $mashup_var_column_bottom_padding : '';
        $mashup_var_column_left_padding = isset( $mashup_var_column_left_padding ) ? $mashup_var_column_left_padding : '';
        $mashup_var_column_right_padding = isset( $mashup_var_column_right_padding ) ? $mashup_var_column_right_padding : '';
        $mashup_var_column_image_url = isset( $atts['mashup_var_column_image_url_array'] ) ? $atts['mashup_var_column_image_url_array'] : '';
        $mashup_var_column_bg_color = isset( $mashup_var_column_bg_color ) ? $mashup_var_column_bg_color : '';
        $mashup_var_column_sub_title = isset($mashup_var_column_sub_title) ? $mashup_var_column_sub_title : '';
        $column_align = isset($column_align) ? $column_align : '';

        $column_class = '';
        if ( isset( $mashup_var_column_size ) && $mashup_var_column_size != '' ) {
            if ( function_exists( 'mashup_var_custom_column_class' ) ) {
                $column_class = mashup_var_custom_column_class( $mashup_var_column_size );
            }
        }

        $style_string = '';
        if ( $mashup_var_column_top_padding != '' || $mashup_var_column_bottom_padding != '' || $mashup_var_column_left_padding != '' || $mashup_var_column_right_padding != '' || $mashup_column_margin_left != '' || $mashup_column_margin_right != '' ) {
           // $style_string .= 'style=" ';
            if ( $mashup_var_column_top_padding != '' ) {
                $style_string .= ' padding-top:' . $mashup_var_column_top_padding . 'px; ';
            }
            if ( $mashup_var_column_bottom_padding != '' ) {
                $style_string .= ' padding-bottom:' . $mashup_var_column_bottom_padding . 'px; ';
            }
            if ( $mashup_var_column_left_padding != '' ) {
                $style_string .= ' padding-left:' . $mashup_var_column_left_padding . 'px; ';
            }
            if ( $mashup_var_column_right_padding != '' ) {
                $style_string .= ' padding-right:' . $mashup_var_column_right_padding . 'px; ';
            }
            if ( $mashup_column_margin_left != '' ) {
                $style_string .= ' margin-left:' . $mashup_column_margin_left . 'px; ';
            }
            if ( $mashup_column_margin_right != '' ) {
                $style_string .= ' margin-right:' . $mashup_column_margin_right . 'px; ';
            }
            if ( $mashup_var_column_image_url != '' ) {
                $style_string .= ' background-image:url(' . esc_url( $mashup_var_column_image_url ) . '); ';
            }
            if ( $mashup_var_column_bg_color != '' ) {
                $style_string .= ' background-color:' . $mashup_var_column_bg_color . '; ';
            }
           // $style_string .= '" ';
        }

        $html_column = '';
        if ( isset( $column_class ) && $column_class <> '' ) {
            $html_column .= '<div class="' . force_balance_tags( $column_class ) . '">';
        }
        $mashup_column_bg_class = '';
        if ( isset( $mashup_var_column_bg_color ) && $mashup_var_column_bg_color != '' ) {
            $mashup_column_bg_class = ' has-bg';
        }
        if ( (isset( $mashup_var_column_section_title ) && $mashup_var_column_section_title <> '') || (isset( $mashup_var_column_sub_title ) && $mashup_var_column_sub_title <> '') ) {
            $title_style = '';
            if ( $mashup_var_column_title_color ) {
                $title_style = 'style="color:' . esc_attr( $mashup_var_column_title_color ) . ' !important;"';
            }
			
            $html_column .= '<div class="element-title '.$column_align.'">';
            if(isset( $mashup_var_column_section_title ) && $mashup_var_column_section_title <> ''){
            $html_column .= '<h2 ' . $title_style . '>' . esc_html( $mashup_var_column_section_title ) . '</h2>';
            }
			$html_column .= '<em></em>';
            if(isset( $mashup_var_column_sub_title ) && $mashup_var_column_sub_title <> ''){
            $html_column .= '<p>' . esc_html( $mashup_var_column_sub_title ) . '</p>';
            }
            $html_column .= '</div>';
			
        }
        $html_column .= '<div style=" ' . esc_html( $style_string ) . '" class="column-content ' . esc_html( $mashup_column_bg_class ) . '">';
        $html_column .= do_shortcode( $content );
        $html_column .= '</div>';

        if ( isset( $column_class ) && $column_class <> '' ) {
            $html_column .= '</div>';
        }
        return $html_column;
    }

    if ( function_exists( 'mashup_var_short_code' ) )
        mashup_var_short_code( 'mashup_column', 'mashup_var_column' );
}