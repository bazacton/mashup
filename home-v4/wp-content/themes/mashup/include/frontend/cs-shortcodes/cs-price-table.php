<?php

/*
 *
 * @Shortcode Name :   Start function for Price Plan shortcode/element front end view
 * @retrun
 *
 */
if ( ! function_exists( 'mashup_price_table_shortcode' ) ) {

    function mashup_price_table_shortcode( $atts, $content = null ) {
        global $mashup_multi_price_col, $mashup_price_plan_counter, $price_table_style;
        $mashup_price_plan_counter == 0;
        $defaults = array(
            'mashup_var_column_size' => '',
            'mashup_multi_price_table_section_title' => '',
            'price_table_style' => '',
            'mashup_multi_price_col' => '',
            'mashup_var_price_table_sub_title' => '',
            'mashup_var_price_table_element_align' => '',
        );
        extract( shortcode_atts( $defaults, $atts ) );

        $mashup_var_price_table = '';
        $mashup_var_column_size = isset( $mashup_var_column_size ) ? $mashup_var_column_size : '';
        $mashup_multi_price_table_section_title = isset( $mashup_multi_price_table_section_title ) ? $mashup_multi_price_table_section_title : '';
        $price_table_style = isset( $price_table_style ) ? $price_table_style : '';
        $mashup_var_price_table_text = isset( $mashup_var_price_table_text ) ? $mashup_var_price_table_text : '';


        if ( isset( $mashup_var_column_size ) && $mashup_var_column_size != '' ) {
            if ( function_exists( 'mashup_var_custom_column_class' ) ) {
                $column_class = mashup_var_custom_column_class( $mashup_var_column_size );
            }
        }

        if ( isset( $column_class ) && $column_class <> '' ) {

            $mashup_var_price_table .= '<div class="' . esc_html( $column_class ) . '">';
        }
        $mashup_var_price_table .='<div class="row">';
        if ( (isset( $mashup_multi_price_table_section_title ) && $mashup_multi_price_table_section_title <> '') || (isset( $mashup_var_price_table_sub_title ) and $mashup_var_price_table_sub_title <> '' )) {
            $mashup_var_price_table .='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
            $mashup_var_price_table .= '<div class="element-title ' . esc_html( $mashup_var_price_table_element_align ) . '">';
            if ( isset( $mashup_multi_price_table_section_title ) && $mashup_multi_price_table_section_title <> '' ) {
                $mashup_var_price_table .= '<h2>' . esc_html( $mashup_multi_price_table_section_title ) . '</h2> ';
            }
            $mashup_var_price_table .='<em></em>';
            if ( isset( $mashup_var_price_table_sub_title ) && $mashup_var_price_table_sub_title <> '' ) {
                $mashup_var_price_table .= '<p>' . esc_html( $mashup_var_price_table_sub_title ) . '</p>';
            }
            $mashup_var_price_table .= '</div>';
            $mashup_var_price_table .= '</div>';
        }
        $mashup_var_price_table .= '' . do_shortcode( $content ) . '';

        $mashup_inline_script = '(function($){ $(".price-items-wrapper > div").last().find(".pricetable-holder").addClass("last-element"); })(jQuery);';
        mashup_inline_enqueue_script( $mashup_inline_script, 'mashup-functions' );

        $mashup_var_price_table .='</div>';

        if ( isset( $column_class ) && $column_class <> '' ) {
            $mashup_var_price_table .= '</div>';
        }

        return $mashup_var_price_table;
    }

    if ( function_exists( 'mashup_var_short_code' ) ) {
        mashup_var_short_code( 'mashup_price_table', 'mashup_price_table_shortcode' );
    }
}

/*
 *
 * @Shortcode Name :  Start function for Price Plan Item shortcode/element front end view
 * @retrun
 *
 */
if ( ! function_exists( 'mashup_price_table_item' ) ) {

    function mashup_price_table_item( $atts, $content = null ) {
        global $mashup_multi_price_col, $mashup_price_plan_counter, $price_table_style;
        $defaults = array(
            'multi_price_table_text' => '',
            'multi_price_table_title_color' => '',
            'multi_pricetable_price' => '',
            'multi_price_table_currency' => '',
            'multi_price_table_time_duration' => '',
            'button_link' => '',
            'multi_price_table_button_text' => '',
            'multi_price_table_button_color' => '',
            'multi_price_table_button_color_bg' => '',
            'pricetable_featured' => '',
            'multi_price_table_column_bgcolor' => '',
        );

        extract( shortcode_atts( $defaults, $atts ) );

        if ( $mashup_price_plan_counter == 0 ) {
            $first = 'first-element';
        } else {
            $first = '';
        }

        $mashup_multi_price_col = isset( $mashup_multi_price_col ) ? $mashup_multi_price_col : '';

        $multi_price_table_text = isset( $multi_price_table_text ) ? $multi_price_table_text : '';
        $multi_price_table_title_color = isset( $multi_price_table_title_color ) ? $multi_price_table_title_color : '';
        $multi_pricetable_price = isset( $multi_pricetable_price ) ? $multi_pricetable_price : '';
        $multi_price_table_currency = isset( $multi_price_table_currency ) ? $multi_price_table_currency : '';
        $multi_price_table_time_duration = isset( $multi_price_table_time_duration ) ? $multi_price_table_time_duration : '';
        $button_link = isset( $button_link ) ? $button_link : '';
        $multi_price_table_button_text = isset( $multi_price_table_button_text ) ? $multi_price_table_button_text : '';
        $multi_price_table_button_color = isset( $multi_price_table_button_color ) ? $multi_price_table_button_color : '';
        $multi_price_table_button_color_bg = isset( $multi_price_table_button_color_bg ) ? $multi_price_table_button_color_bg : '';
        $pricetable_featured = isset( $pricetable_featured ) ? $pricetable_featured : '';
        $multi_price_table_column_bgcolor = isset( $multi_price_table_column_bgcolor ) ? 'style="background-color:' . $multi_price_table_column_bgcolor . '"' : '';
        $active_class = '';
        if ( $pricetable_featured == 'Yes' ) {
            $active_class = 'active';
        }

        if ( isset( $mashup_multi_price_col ) && $mashup_multi_price_col != '' ) {
            $number_col = 12 / $mashup_multi_price_col;
            $number_col_sm = 12;
            $number_col_xs = 12;
            if ( $number_col == 2 ) {
                $number_col_sm = 4;
                $number_col_xs = 6;
            }
            if ( $number_col == 3 ) {
                $number_col_sm = 6;
                $number_col_xs = 12;
            }
            if ( $number_col == 4 ) {
                $number_col_sm = 6;
                $number_col_xs = 12;
            }
            if ( $number_col == 6 ) {
                $number_col_sm = 12;
                $number_col_xs = 12;
            }
            $col_class = 'col-lg-' . $number_col . ' col-md-' . $number_col . ' col-sm-' . $number_col_sm . ' col-xs-' . $number_col_xs . '';
        }
        $mashup_var_price_table_item = '';
        $mashup_var_price_table_item .= '<div class="' . esc_html( $col_class ) . '">';
        //simple view
        if ( $price_table_style == 'simple' ) {

            $mashup_var_price_table_item .= '<div class="pricetable-holder classic ' . esc_html( $active_class ) . '" ' . force_balance_tags( $multi_price_table_column_bgcolor ) . '>';
            if ( $multi_price_table_text <> '' ) {
                $mashup_var_price_table_item .= '<h4>' . esc_html( $multi_price_table_text ) . '</h4>';
            }
            $mashup_var_price_table_item .= '<div class="price-holder ">';
            $mashup_var_price_table_item .= '<div class="cs-price"><span style="color:' . force_balance_tags( $multi_price_table_title_color ) . '!important;">';
            if ( $multi_price_table_currency <> '' ) {
                $mashup_var_price_table_item .= '' . esc_html( $multi_price_table_currency ) . '';
            }
            // $num = explode( ".", $multi_pricetable_price );
            if ( $multi_pricetable_price <> '' ) {
                $mashup_var_price_table_item .= esc_html( $multi_pricetable_price );
            }

            if ( $multi_price_table_time_duration <> '' ) {
                $mashup_var_price_table_item .= '<em> ' . esc_html( $multi_price_table_time_duration ) . '</em>';
            }
            $mashup_var_price_table_item .= '</span>';

            $mashup_var_price_table_item .= do_shortcode( $content );

            $mashup_var_price_table_item .= '</div>';
            if ( $multi_price_table_button_text <> '' ) {
                $mashup_var_price_table_item .= '<a style="background-color:' . force_balance_tags( $multi_price_table_button_color_bg ) . '!important; color:' . force_balance_tags( $multi_price_table_button_color ) . ' !important" href="' . esc_url( $button_link ) . '" class="cs-color ">' . esc_html( $multi_price_table_button_text ) . '</a>';
            }
            $mashup_var_price_table_item .= '</div>';
            $mashup_var_price_table_item .= '</div>';
        }
        //classic view
        if ( $price_table_style == 'classic' ) {
            $mashup_var_price_table_item .= '<div class="pricetable-holder modren ' . esc_html( $active_class ) . '" ' . force_balance_tags( $multi_price_table_column_bgcolor ) . '>';
            if ( $multi_price_table_text <> '' ) {
                $mashup_var_price_table_item .= '<h5>' . esc_html( $multi_price_table_text ) . '</h5>';
            }
            $mashup_var_price_table_item .= '<div class="price-holder ">';
            $mashup_var_price_table_item .= '<div class="cs-price"><span class="text-color" style="color:' . force_balance_tags( $multi_price_table_title_color ) . '!important;">';
            if ( $multi_price_table_currency <> '' ) {
                $mashup_var_price_table_item .= '<sup>' . esc_html( $multi_price_table_currency ) . '</sup>';
            }

            if ( $multi_pricetable_price <> '' ) {
                $num = explode( ".", $multi_pricetable_price );
                $mashup_var_price_table_item .= $num[0];
            }
            $mashup_var_price_table_item .= '<em> ';
            $mashup_var_price_table_item .= isset( $num[1] ) ? '.' . ($num[1]) : '';

            if ( $multi_price_table_time_duration <> '' ) {
                $mashup_var_price_table_item .= '/ ' . esc_html( $multi_price_table_time_duration );
            }
            $mashup_var_price_table_item .= '</em>';
            $mashup_var_price_table_item .= '</span>';

            $mashup_var_price_table_item .= do_shortcode( $content );

            $mashup_var_price_table_item .= '</div>';
            if ( $multi_price_table_button_text <> '' ) {
                $mashup_var_price_table_item .= '<a style="background-color:' . force_balance_tags( $multi_price_table_button_color_bg ) . '!important; color:' . force_balance_tags( $multi_price_table_button_color ) . ' !important" href="' . esc_url( $button_link ) . '" class="bgcolor ">' . esc_html( $multi_price_table_button_text ) . '</a>';
            }
            $mashup_var_price_table_item .= '</div>';
            $mashup_var_price_table_item .= '</div>';
        }
        $mashup_var_price_table_item .= '</div>';

        $mashup_price_plan_counter ++;


        return $mashup_var_price_table_item;
    }

    if ( function_exists( 'mashup_var_short_code' ) ) {
        mashup_var_short_code( 'price_table_item', 'mashup_price_table_item' );
    }
}

