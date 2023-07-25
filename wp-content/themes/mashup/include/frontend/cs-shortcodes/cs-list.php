<?php

/*
 *
 * @Shortcode Name :  List front end view
 * @retrun
 *
 */

if ( ! function_exists( 'mashup_var_list_shortcode' ) ) {

    function mashup_var_list_shortcode( $atts, $content = "" ) {
        global $post, $mashup_var_list_column, $mashup_var_list_type, $mashup_var_list_item_icon_color, $mashup_var_list_item_icon_bg_color;
        $defaults = array(
            'mashup_var_column_size' => '',
            'mashup_var_list_title' => '',
            'mashup_var_list_type' => '',
            'mashup_var_list_item_icon_color' => '',
            'mashup_var_list_item_icon_bg_color' => '',
			'mashup_var_list_sub_title' => '',
			'mashup_var_list_element_align' => '',
		);


        extract( shortcode_atts( $defaults, $atts ) );
	
		$mashup_var_list_sub_title = isset( $mashup_var_list_sub_title ) ? $mashup_var_list_sub_title : '';
        $mashup_var_list_element_align = isset( $mashup_var_list_element_align ) ? $mashup_var_list_element_align : '';
        $mashup_var_column_size = isset( $mashup_var_column_size ) ? $mashup_var_column_size : '';
        $mashup_var_list_title = isset( $mashup_var_list_title ) ? $mashup_var_list_title : '';
        $mashup_var_list_type = isset( $mashup_var_list_type ) ? $mashup_var_list_type : '';
        $mashup_var_list_item_icon_color = isset( $mashup_var_list_item_icon_color ) ? $mashup_var_list_item_icon_color : '';
        $mashup_var_list_item_icon_bg_color = isset( $mashup_var_list_item_icon_bg_color ) ? $mashup_var_list_item_icon_bg_color : '';

        $html = '';
        $mashup_section_title = '';



        if ( isset( $mashup_var_column_size ) && $mashup_var_column_size != '' ) {
            if ( function_exists( 'mashup_var_custom_column_class' ) ) {
                $column_class = mashup_var_custom_column_class( $mashup_var_column_size );
            }
        }
        if ( isset( $column_class ) && $column_class <> '' ) {
            $html .= '<div class="' . esc_html( $column_class ) . '">';
        }
	
	// element title and subtitle
	if ( (isset($mashup_var_list_title) && $mashup_var_list_title <> '') || (isset($mashup_var_list_sub_title) and $mashup_var_list_sub_title <> '')) {
	    
	    $mashup_section_title .= '<div class="element-title '.esc_html($mashup_var_list_element_align) .'">';
	    
	    if (isset($mashup_var_list_title) && $mashup_var_list_title <> '') {
		$mashup_section_title .= '<h2>' . esc_html($mashup_var_list_title) . '</h2> ';
	    }
	    
	    $mashup_section_title .='<em></em>';
	    
	    if (isset($mashup_var_list_sub_title) && $mashup_var_list_sub_title <> '') {
		$mashup_section_title .= '<p>' . esc_html($mashup_var_list_sub_title) . '</p>';
	    }
	    
	    $mashup_section_title .= '</div>';
	}
	

        $html .= $mashup_section_title;
        if ( $mashup_var_list_type == 'numeric-icon' ) {
            $html .= '<ol>';
        } elseif ( $mashup_var_list_type == 'alphabetic' ) {
            $html .= '<ol class="cs-alphabetic-list">';
        } elseif ( $mashup_var_list_type == 'built' ) {
            $html .= '<ul class="simple-liststyle">';
        } elseif ( $mashup_var_list_type == 'icon' ) {
            $html .= '<ul class="cs-icon-list">';
        } else {
            $html .= '<ul>';
        }

        $html .= do_shortcode( $content );

        if ( $mashup_var_list_type == 'numeric-icon' || $mashup_var_list_type == 'alphabetic' ) {
            $html .= '</ol>';
        } else {
            $html .= '</ul>';
        }
        if ( isset( $column_class ) && $column_class <> '' ) {
            $html .= '</div>';
        }
        return do_shortcode( $html );
    }

}
if ( function_exists( 'mashup_var_short_code' ) )
    mashup_var_short_code( 'mashup_list', 'mashup_var_list_shortcode' );

/*
 *
 * @List  Item  shortcode/element front end view
 * @retrun
 *
 */

if ( ! function_exists( 'mashup_var_list_item_shortcode' ) ) {

    function mashup_var_list_item_shortcode( $atts, $content = "" ) {
        global $post, $mashup_var_list_type, $mashup_var_list_item_icon_color, $mashup_var_list_item_icon_bg_color;
        $defaults = array( 'mashup_var_list_item_text' => '', 'mashup_var_list_item_icon' => '', );
        extract( shortcode_atts( $defaults, $atts ) );
        $mashup_var_list_item_text = isset( $mashup_var_list_item_text ) ? $mashup_var_list_item_text : '';
        $mashup_var_list_item_icon = isset( $mashup_var_list_item_icon ) ? $mashup_var_list_item_icon : '';

        $html = '';

        if ( isset( $mashup_var_list_type ) && $mashup_var_list_type == 'icon' ) {
            $icon_style = '';
            if ( $mashup_var_list_item_icon_color != '' || $mashup_var_list_item_icon_bg_color != '' ) {
                $icon_style .= ' style="';
                if ( $mashup_var_list_item_icon_color != '' ) {
                    $icon_style .= 'color: ' . esc_html( $mashup_var_list_item_icon_color ) . ' !important;';
                }
                if ( $mashup_var_list_item_icon_bg_color != '' ) {
                    $icon_style .= ' background-color: ' . esc_html( $mashup_var_list_item_icon_bg_color ) . ' !important;';
                }
                $icon_style .= '"';
            }
            $html .= '<li><i class="has-bg cs-color ' . esc_html( $mashup_var_list_item_icon ) . '" ' . $icon_style . ' ></i> ' . esc_html( $mashup_var_list_item_text ) . '</li>';
        } else
        if ( isset( $mashup_var_list_type ) && $mashup_var_list_type == 'default' ) {
            $list_style = '';
	    $list_style = 'list-style-type:none !important;';
	    $html .= '<li style="'.$list_style.'">' . esc_html( $mashup_var_list_item_text ) . '</li>';
        } else
        if ( isset( $mashup_var_list_type ) && $mashup_var_list_type == 'built' ) {
            $html .= '<li>' . esc_html( $mashup_var_list_item_text ) . '</li>';
        } else
        if ( isset( $mashup_var_list_type ) && $mashup_var_list_type == 'numeric-icon' ) {
            $html .= '<li> ' . esc_html( $mashup_var_list_item_text ) . '</li>';
        } else
        if ( isset( $mashup_var_list_type ) && $mashup_var_list_type == 'alphabetic' ) {
            $sty = '';
	    $sty = 'list-style:lower-alpha !important;';
	    $html .= '<li style="'.$sty.'"> ' . esc_html( $mashup_var_list_item_text ) . '</li>';
        }
        return do_shortcode( $html );
    }

}
if ( function_exists( 'mashup_var_short_code' ) )
    mashup_var_short_code( 'mashup_list_item', 'mashup_var_list_item_shortcode' );
?>