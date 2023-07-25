<?php

/*
 *
 * @Shortcode Name : Accordion
 * @retrun
 *
 */
if ( ! function_exists( 'mashup_faq_shortcode' ) ) {

    function mashup_faq_shortcode( $atts, $content = "" ) {


        global $acc_counter, $mashup_var_faq_view;
        $acc_counter = rand( 40, 9999999 );

        $html = '';
        $defaults = array(
            'mashup_var_column_size' => '',
            'mashup_var_faq_view' => '',
            'mashup_var_faq_sub_title' => '',
            'mashup_var_faq_main_title' => '',
            'faq_align' => '',
        );
        extract( shortcode_atts( $defaults, $atts ) );

        $column_class = '';
        $mashup_var_faq_view = isset( $mashup_var_faq_view ) ? $mashup_var_faq_view : '';
        $mashup_var_column_size = isset( $mashup_var_column_size ) ? $mashup_var_column_size : '';
        $mashup_var_faq_main_title = isset( $mashup_var_faq_main_title ) ? $mashup_var_faq_main_title : '';
        $mashup_var_faq_sub_title = isset( $mashup_var_faq_sub_title ) ? $mashup_var_faq_sub_title : '';
        $faq_align = isset( $faq_align ) ? $faq_align : '';
        if ( isset( $mashup_var_column_size ) && $mashup_var_column_size != '' ) {
            if ( function_exists( 'mashup_var_custom_column_class' ) ) {
                $column_class = mashup_var_custom_column_class( $mashup_var_column_size );
            }
        }
        if ( isset( $column_class ) && $column_class <> '' ) {
            $html .= '<div class="' . esc_html( $column_class ) . '">';
        }
        $boxex_class = '';
        if ( isset( $mashup_var_faq_view ) && $mashup_var_faq_view == 'modern' ) {
            $boxex_class = ' box';
        }
		if( (isset( $mashup_var_faq_main_title ) && $mashup_var_faq_main_title <> '') || (isset( $mashup_var_faq_sub_title ) && $mashup_var_faq_sub_title <> '') ){
        $html .= '<div class="element-title ' . esc_html( $faq_align ) . '">';
        if ( isset( $mashup_var_faq_main_title ) && $mashup_var_faq_main_title <> '' ){
            $html .= '<h2>' . esc_attr( $mashup_var_faq_main_title ) . '</h2>';
        }
		$html .= '<em></em>';
        if ( isset( $mashup_var_faq_sub_title ) && $mashup_var_faq_sub_title <> '' ){
            $html .= '<p>' . esc_attr( $mashup_var_faq_sub_title ) . '</p>';
        }
        $html .= '</div>';
		}
        $html .= '<div class="panel-group ' . esc_attr( $boxex_class ) . '" id="faq_' . absint( $acc_counter ) . '">';
        $html .= do_shortcode( $content );
        $html .= '</div>';

        if ( isset( $column_class ) && $column_class <> '' ) {
            $html .= '</div>';
        }

        return $html;
    }

    if ( function_exists( 'mashup_short_code' ) ) {
        mashup_short_code( 'mashup_faq', 'mashup_faq_shortcode' );
    }
}
if ( function_exists( 'mashup_var_short_code' ) )
    mashup_var_short_code( 'mashup_faq', 'mashup_faq_shortcode' );
/*
 *
 * @Accordion Item
 * @retrun
 *
 */
if ( ! function_exists( 'mashup_faq_item_shortcode' ) ) {

    function mashup_faq_item_shortcode( $atts, $content = "" ) {
        global $acc_counter, $mashup_var_faq_view;
        $strings = new mashup_theme_all_strings;
        $strings->mashup_short_code_strings();
        $defaults = array(
            'mashup_var_faq_title' => 'Title',
            'mashup_var_icon_box' => '',
            'mashup_var_faq_active' => 'yes',
        );
        extract( shortcode_atts( $defaults, $atts ) );
        $mashup_var_acc_icon = '';
        $mashup_var_faq_title = isset( $mashup_var_faq_title ) ? $mashup_var_faq_title : '';
        $mashup_var_icon_box = isset( $mashup_var_icon_box ) ? $mashup_var_icon_box : '';
        $mashup_var_faq_active = isset( $mashup_var_faq_active ) ? $mashup_var_faq_active : '';
        if ( isset( $mashup_var_faq_view ) && $mashup_var_faq_view == 'modern' ) {
            $mashup_var_acc_icon .= '<span class="cs-color">' . mashup_var_theme_text_srt( 'mashup_var_accordian_q' ) . '</span>';

            if ( isset( $mashup_var_icon_box ) && $mashup_var_icon_box != '' ) {
                $mashup_var_acc_icon .= '<i class="' . esc_html( $mashup_var_icon_box ) . '"></i>';
            }
        } else {
            if ( $mashup_var_icon_box == '' ) {
                $mashup_var_acc_icon .= '<span class="cs-color">' . mashup_var_theme_text_srt( 'mashup_var_accordian_q' ) . '</span>';
            }
            if ( isset( $mashup_var_icon_box ) && $mashup_var_icon_box != '' ) {
                $mashup_var_acc_icon .= '<i class="' . esc_html( $mashup_var_icon_box ) . '"></i>';
            }
        }
        $faq_count = 0;
        $faq_count = rand( 4045, 99999 );
        $html = '';
        $active_in = '';
        $active_class = '';
        $styleColapse = 'collapsed';
        if ( isset( $mashup_var_faq_active ) && $mashup_var_faq_active == 'yes' ) {
            $active_in = 'in';
            $styleColapse = '';
        } else {
            $active_class = 'collapsed';
        }

        $html .= ' <div class="panel panel-default">';
        $html .= '  <div class="panel-heading">';
        $html .= '   <h6 class="panel-title">';
        $html .= '<a class="' . esc_html( $active_class ) . '" data-toggle="collapse" data-parent="#faq_' . absint( $acc_counter ) . '" href="#collapse' . absint( $faq_count ) . '">' . $mashup_var_acc_icon . esc_html( $mashup_var_faq_title ) . '</a>';
        $html .= '   </h6>';
        $html .= ' </div>';
        $html .= '  <div id="collapse' . absint( $faq_count ) . '" class="panel-collapse collapse ' . esc_html( $active_in ) . '"	>';
        $html .= '     <div class="panel-body">' . do_shortcode( $content ) . '</div>';
        $html .= ' </div>';
        $html .= '</div>
		
		';
        return $html;
    }

    if ( function_exists( 'mashup_short_code' ) ) {
        mashup_short_code( 'faq_item', 'mashup_faq_item_shortcode' );
    }
}
if ( function_exists( 'mashup_var_short_code' ) )
    mashup_var_short_code( 'faq_item', 'mashup_faq_item_shortcode' );
?>