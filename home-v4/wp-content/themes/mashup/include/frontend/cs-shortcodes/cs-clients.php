<?php

/*
 *
 * @Shortcode Name :   Start function for Client shortcode/element front end view
 * @retrun
 *
 */
if ( ! function_exists( 'mashup_clients_shortcode' ) ) {

    function mashup_clients_shortcode( $atts, $content = null ) {
        global $mashup_var_blog_variables, $clients_style, $item_counter, $mashup_var_clients_text, $post, $clients_section_title;
        $randomid = rand( 1234, 7894563 );
        $defaults = array(
            'mashup_var_column_size' => '',
            'clients_style' => '',
            'mashup_var_clients_text' => '',
            'mashup_clients_text_align' => '',
            'mashup_var_clients_element_title' => '',
            'mashup_var_clients_sub_title' => '',
            'mashup_var_clients_align' => '',
            'mashup_var_clients_per_slide' => '6',
        );
        extract( shortcode_atts( $defaults, $atts ) );
        $item_counter = 1;
        $mashup_var_clients = '';
        $mashup_var_clients_element_title = isset( $mashup_var_clients_element_title ) ? $mashup_var_clients_element_title : '';
        $mashup_var_clients_per_slide = isset( $mashup_var_clients_per_slide ) ? $mashup_var_clients_per_slide : '';
        $mashup_var_clients_sub_title = isset( $mashup_var_clients_sub_title ) ? $mashup_var_clients_sub_title : '';
        $mashup_var_clients_align = isset( $mashup_var_clients_align ) ? $mashup_var_clients_align : '';

        $clients_style = isset( $clients_style ) ? $clients_style : '';
        $mashup_var_clients_text = isset( $mashup_var_clients_text ) ? $mashup_var_clients_text : '';
        if ( isset( $mashup_var_column_size ) && $mashup_var_column_size != '' ) {
            if ( function_exists( 'mashup_var_custom_column_class' ) ) {
                $column_class = mashup_var_custom_column_class( $mashup_var_column_size );
            }
        }
        if ( isset( $column_class ) && $column_class <> '' ) {

            $mashup_var_clients .= '<div class="' . esc_html( $column_class ) . '">';
        }
        if ( (isset( $mashup_var_clients_element_title ) && $mashup_var_clients_element_title <> '') || (isset( $mashup_var_clients_sub_title ) && $mashup_var_clients_sub_title <> '') ) {
            $mashup_var_clients .= '<div class="element-title ' . $mashup_var_clients_align . '">';
            if ( isset( $mashup_var_clients_element_title ) && $mashup_var_clients_element_title <> '' ) {
                $mashup_var_clients .= '<h4>' . esc_html( $mashup_var_clients_element_title ) . '</h4>';
            }
            $mashup_var_clients .= '<em></em>';
            if ( isset( $mashup_var_clients_sub_title ) && $mashup_var_clients_sub_title <> '' ) {
                $mashup_var_clients .= '<p>' . esc_html( $mashup_var_clients_sub_title ) . '</p>';
            }
            $mashup_var_clients .= '</div>';
        }
        $mashup_var_clients .='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
        $mashup_var_clients .='<div class="logo-slider">';
        $mashup_var_clients .='<ul class="client-logo" id="client-logo' . intval( $randomid ) . '">';
        $mashup_var_clients .= do_shortcode( $content );
        $mashup_var_clients .='</ul>';
        $mashup_var_clients .='</div>';
        $mashup_var_clients .='</div>';
        if ( isset( $column_class ) && $column_class <> '' ) {
            $mashup_var_clients .= '</div>';
        }

        $client_slider_script = "$(document).ready(function () {
    jQuery('#client-logo" . $randomid . "').slick({
        slidesToShow: " . $mashup_var_clients_per_slide . ",
        slidesToScroll: 1,
        dots: false,
        autoplay: true,
        speed: 300,
        arrows: true,
        swipeToSlide: true,
        responsive: [{
                breakpoint: 1170,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false

                }
            }, {
                breakpoint: 980,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    dots: false
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    dots: false
                }
            }, {
                breakpoint: 767,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    dots: false
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    dots: false
                }
            }, {
                breakpoint: 360,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false
                }
            }
        ]
    });
	});";
        mashup_inline_enqueue_script( $client_slider_script, 'mashup-functions' );

        return $mashup_var_clients;
    }

    if ( function_exists( 'mashup_var_short_code' ) ) {
        mashup_var_short_code( 'mashup_clients', 'mashup_clients_shortcode' );
    }
}

/*
 *
 * @Shortcode Name :  Start function for Client Item shortcode/element front end view
 * @retrun
 *
 */
if ( ! function_exists( 'mashup_clients_item' ) ) {

    function mashup_clients_item( $atts, $content = null ) {
        global $clients_style, $column_class, $item_counter, $clients_style, $mashup_var_clients_text_color, $post;
        $defaults = array(
            'mashup_var_clients_img_user_array' => '',
            'mashup_var_clients_text' => '',
        );
        extract( shortcode_atts( $defaults, $atts ) );
        $mashup_var_clients_item = '';
        $clients_img_user = isset( $mashup_var_clients_img_user_array ) ? $mashup_var_clients_img_user_array : '';
        if ( $mashup_var_clients_text == '' ) {
            $mashup_var_clients_text = 'javascript:void(0)';
        } else {
            $mashup_var_clients_text = esc_url( $mashup_var_clients_text );
        }
        if ( $clients_img_user <> '' ) {
            $mashup_var_clients_item .= '<li class="col-lg-2 col-md-3 col-sm-3 col-xs-12">';
            $mashup_var_clients_item .= '<figure><a href="' . $mashup_var_clients_text . '">';
            $mashup_var_clients_item .= '<img class="grayscale" src="' . esc_url( $clients_img_user ) . '" alt="" />';
            $mashup_var_clients_item .= '</a></figure>';
            $mashup_var_clients_item .= '</li>';
        }
        $item_counter ++;
        return $mashup_var_clients_item;
    }

    if ( function_exists( 'mashup_var_short_code' ) ) {
        mashup_var_short_code( 'clients_item', 'mashup_clients_item' );
    }
}
