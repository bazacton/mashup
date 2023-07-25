<?php

/*
 *
 * @Shortcode Name : Image Frame
 * @retrun
 *
 */
if ( ! function_exists( 'mashup_var_promobox' ) ) {

    function mashup_var_promobox( $atts, $content = "" ) {

        global $header_map, $post;
        $defaults = array(
            'mashup_var_column_size' => '',
            'mashup_var_image_section_title' => '',
            'mashup_promobox_select_background' => '',
            'mashup_var_frame_image_url_array' => '',
            'mashup_promobox_bg_color' => '',
            'mashup_var_promobox_title' => '',
            'mashup_var_frame_promo_image_url_array' => '',
            'mashup_promobox_button_bg_color' => '',
            'mashup_var_promobox_button_title' => '',
            'mashup_var_promobox_button_url' => '',
            'mashup_promobox_title_color' => '',
            'mashup_var_promobox_sub_title' => '',
            'mashup_var_promobox_element_align' => '',
        );
        extract( shortcode_atts( $defaults, $atts ) );
        if ( isset( $mashup_var_column_size ) && $mashup_var_column_size != '' ) {
            if ( function_exists( 'mashup_var_custom_column_class' ) ) {
                $column_class = mashup_var_custom_column_class( $mashup_var_column_size );
            }
        }
        $mashup_var_image_section_title = isset( $mashup_var_image_section_title ) ? $mashup_var_image_section_title : '';
        $mashup_var_promobox_sub_title = isset( $mashup_var_promobox_sub_title ) ? $mashup_var_promobox_sub_title : '';
        $mashup_var_promobox_element_align = isset( $mashup_var_promobox_element_align ) ? $mashup_var_promobox_element_align : '';
        $mashup_var_frame_image_url = isset( $mashup_var_frame_image_url_array ) ? $mashup_var_frame_image_url_array : '';
        $mashup_var_frame_promo_image_url_array = isset( $mashup_var_frame_promo_image_url_array ) ? $mashup_var_frame_promo_image_url_array : '';
        $mashup_var_promobox_button_title = isset( $mashup_var_promobox_button_title ) ? $mashup_var_promobox_button_title : '';
        $mashup_var_promobox_button_url = isset( $mashup_var_promobox_button_url ) ? $mashup_var_promobox_button_url : '';
        $mashup_promobox_button_bg_color = isset( $mashup_promobox_button_bg_color ) ? $mashup_promobox_button_bg_color : '#69b64b';
        $mashup_promobox_bg_color = isset( $mashup_promobox_bg_color ) ? $mashup_promobox_bg_color : '';
        $mashup_var_promobox_title = isset( $mashup_var_promobox_title ) ? $mashup_var_promobox_title : '';
        $mashup_promobox_title_color = isset( $mashup_promobox_title_color ) ? $mashup_promobox_title_color : '#000000';

        if ( isset( $mashup_promobox_button_bg_color ) && $mashup_promobox_button_bg_color == '' ) {
            $mashup_promobox_button_bg_color = '#69b64b';
        }

        $mashup_var_promobox = '';
        if ( isset( $column_class ) && $column_class <> '' ) {
            $mashup_var_promobox .= '<div class="' . esc_html( $column_class ) . '">';
        }
        // element title and subtitle
        if ( (isset( $mashup_var_image_section_title ) && $mashup_var_image_section_title <> '') || (isset( $mashup_var_promobox_sub_title ) and $mashup_var_promobox_sub_title <> '') ) {

            $mashup_var_promobox .= '<div class="element-title ' . esc_html( $mashup_var_promobox_element_align ) . '">';

            if ( isset( $mashup_var_image_section_title ) && $mashup_var_image_section_title <> '' ) {
                $mashup_var_promobox .= '<h2>' . esc_html( $mashup_var_image_section_title ) . '</h2> ';
            }

            $mashup_var_promobox .='<em></em>';

            if ( isset( $mashup_var_promobox_sub_title ) && $mashup_var_promobox_sub_title <> '' ) {
                $mashup_var_promobox .= '<p>' . esc_html( $mashup_var_promobox_sub_title ) . '</p>';
            }

            $mashup_var_promobox .= '</div>';
        }


        $image_url = '';
        $promobox_bg_color = '#ffffff';
        if ( isset( $mashup_var_frame_image_url ) && $mashup_var_frame_image_url <> '' ) {
            $image_url = 'url(' . $mashup_var_frame_image_url . ') right bottom no-repeat';
        }
        if ( isset( $mashup_promobox_bg_color ) && $mashup_promobox_bg_color <> '' ) {
            $promobox_bg_color = '' . $mashup_promobox_bg_color;
        }

        if ( isset( $image_url ) && $image_url <> '' || isset( $promobox_bg_color ) && $promobox_bg_color <> '' ) {
            $mashup_var_frame_image_url = ' style="background:' . $image_url . ' ' . $promobox_bg_color . ';"';
        }

        $mashup_var_promobox .= '<div class="promo-box" ' . $mashup_var_frame_image_url . '>';
        if ( $mashup_var_frame_promo_image_url_array <> '' ) {
            $mashup_var_promobox .= '<div class="img-holder">'
                    . '<figure><img alt = "' . esc_html( $mashup_var_promobox_title ) . '" src = "' . esc_url( $mashup_var_frame_promo_image_url_array ) . '">'
                    . '</figure></div>';
        }
        $title_color = '';
        if ( isset( $mashup_promobox_title_color ) && $mashup_promobox_title_color <> '' ) {
            $title_color = 'style="color:' . esc_html( $mashup_promobox_title_color ) . ' !important;"';
        }

        if ( $content != '' || $mashup_var_promobox_title != '' ) {
            $mashup_var_promobox .= '<div class="text-holder" >';
            if ( $mashup_var_promobox_title && trim( $mashup_var_promobox_title ) != '' ) {
                $mashup_var_promobox .= '<h4 ' . $title_color . ' >' . esc_html( $mashup_var_promobox_title ) . '</h4>';
            }
            if ( $content <> '' ) {
                $mashup_var_promobox .= do_shortcode( $content );
            }
            if ( isset( $mashup_var_promobox_button_url ) && $mashup_var_promobox_button_url == '' ) {
                $mashup_var_promobox_button_url = 'javascript:void(0)';
            }
            $button_bg_color = '';
            if ( isset( $mashup_promobox_button_bg_color ) && $mashup_promobox_button_bg_color <> '' ) {
                $button_bg_color = 'style="background-color:' . esc_html( $mashup_promobox_button_bg_color ) . ';"';
            }
            if ( isset( $mashup_var_promobox_button_title ) && $mashup_var_promobox_button_title <> '' ) {
                $mashup_var_promobox .='<a ' . $button_bg_color . ' href="' . esc_url( $mashup_var_promobox_button_url ) . '">' . esc_html( $mashup_var_promobox_button_title ) . '</a>';
            }
            $mashup_var_promobox .= '</div>';
        }
        $mashup_var_promobox .= '</div>';

        if ( isset( $column_class ) && $column_class <> '' ) {
            $mashup_var_promobox .= '</div>';
        }

        return $mashup_var_promobox;
    }

    if ( function_exists( 'mashup_var_short_code' ) )
        mashup_var_short_code( 'mashup_promobox', 'mashup_var_promobox' );
}