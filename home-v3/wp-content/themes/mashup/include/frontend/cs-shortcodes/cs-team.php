<?php

/*
 *
 * @Shortcode Name :  Team front end view
 * @retrun
 *
 */

if ( ! function_exists( 'mashup_var_team_shortcode' ) ) {

    function mashup_var_team_shortcode( $atts, $content = "" ) {

        global $post, $mashup_var_team_column, $mashup_var_team_col, $mashup_var_team_views;
        if ( ! function_exists( 'mashup_var_theme_demo' ) ) {

            function mashup_var_theme_demo( $str = '' ) {
                global $mashup_strings;
                if ( isset( $mashup_strings[$str] ) ) {
                    return $mashup_strings[$str];
                }
            }

        }
        $defaults = array(
            'mashup_var_column_size' => '',
            'mashup_var_team_title' => '',
            'mashup_var_team_sub_title' => '',
            'mashup_var_team_col' => '',
            'mashup_var_team_views' => '',
            'mashup_var_team_align' => '',
        );
        extract( shortcode_atts( $defaults, $atts ) );

        $mashup_var_column_size = isset( $mashup_var_column_size ) ? $mashup_var_column_size : '';
        $mashup_var_team_title = isset( $mashup_var_team_title ) ? $mashup_var_team_title : '';
        $mashup_var_team_sub_title = isset( $mashup_var_team_sub_title ) ? $mashup_var_team_sub_title : '';
        $mashup_var_team_col = isset( $mashup_var_team_col ) ? $mashup_var_team_col : '';
        $mashup_var_team_views = isset( $mashup_var_team_views ) ? $mashup_var_team_views : '';
        $mashup_var_team_align = isset( $mashup_var_team_align ) ? $mashup_var_team_align : '';

        $html = '';
        $mashup_section_title = '';

        if ( isset( $mashup_var_column_size ) && $mashup_var_column_size != '' ) {
            if ( function_exists( 'mashup_var_custom_column_class' ) ) {
                $column_class = mashup_var_custom_column_class( $mashup_var_column_size );
            }
        }
        if ( isset( $column_class ) && $column_class <> '' && $mashup_var_team_views != 'slider' ) {
            $html .= '<div class="' . esc_html( $column_class ) . '">';
        }
        if ( (isset( $mashup_var_team_title ) && $mashup_var_team_title <> '') || (isset( $mashup_var_team_sub_title ) && $mashup_var_team_sub_title <> '' )) {
            $mashup_section_title .= '<div class="element-title ' . esc_html( $mashup_var_team_align ) . '">';
            if ( isset( $mashup_var_team_title ) && $mashup_var_team_title <> '' ) {
                $mashup_section_title .= '<h2>' . esc_attr( $mashup_var_team_title ) . '</h2>';
            }
            $mashup_section_title .= '<em></em>';
            if ( isset( $mashup_var_team_sub_title ) && $mashup_var_team_sub_title <> '' ) {
                $mashup_section_title .= '<p>' . esc_html( $mashup_var_team_sub_title ) . '</p>';
            }
            $mashup_section_title .= '</div>';
        }
        $html .= $mashup_section_title;

        if ( $mashup_var_team_views == 'slider' ) {
            $html .= '<div class="row">';
            $html .= '<ul class="slider" id="hero-slider">';
            $html .= do_shortcode( $content );
            $html .= '</ul>';
            $html .= '</div>';
        } else {
            $html .= '<div class="row">';
            $html .= do_shortcode( $content );
            $html .= '</div>';
        }

        if ( isset( $column_class ) && $column_class <> '' && $mashup_var_team_views != 'slider' ) {
            $html .= '</div>';
        }
        return do_shortcode( $html );
    }

}
if ( function_exists( 'mashup_var_short_code' ) )
    mashup_var_short_code( 'mashup_team', 'mashup_var_team_shortcode' );

/*
 *
 * @List  Item  shortcode/element front end view
 * @retrun
 *
 */

if ( ! function_exists( 'mashup_var_team_item_shortcode' ) ) {

    function mashup_var_team_item_shortcode( $atts, $content = "" ) {
        global $post, $mashup_var_team_col, $mashup_var_team_views;
        $defaults = array(
            'mashup_var_team_name' => '',
            'mashup_var_team_designation' => '',
            'mashup_var_team_link' => '',
            'mashup_var_team_image' => '',
            'mashup_var_team_text' => ''
        );
        extract( shortcode_atts( $defaults, $atts ) );

        $mashup_var_team_name = isset( $mashup_var_team_name ) ? $mashup_var_team_name : '';
        $mashup_var_team_designation = isset( $mashup_var_team_designation ) ? $mashup_var_team_designation : '';
        $mashup_var_team_link = isset( $mashup_var_team_link ) ? $mashup_var_team_link : '';
        $mashup_var_team_image = isset( $mashup_var_team_image ) ? $mashup_var_team_image : '';
        $mashup_var_team_text = isset( $mashup_var_team_text ) ? $mashup_var_team_text : '';
        $col_class = '';
        if ( isset( $mashup_var_team_col ) && $mashup_var_team_col != '' ) {
            $number_col = 12 / $mashup_var_team_col;
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



        $html = '';

        if ( $mashup_var_team_views == 'slider' ) {
            $html .='  <li class="animation-slide">';
            $html .='  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">';
            $html .='  <div class="cs-column-text" data-animation="fadeInLeft" data-delay="0.5s">';
            if ( isset( $mashup_var_team_name ) && $mashup_var_team_name != '' ) {
                $html .='<div class="section-title">';
                $html .='<h2>' . esc_html( $mashup_var_team_name ) . '</h2><em></em>';
                if ( isset( $mashup_var_team_designation ) && $mashup_var_team_designation != '' ) {
                    $html .='<em>' . esc_html( $mashup_var_team_designation ) . '</em>';
                }
                $html .=' </div> ';
            }
            if ( isset( $content ) && $content != '' ) {
                $html .='<p>' . do_shortcode( $content ) . '</p>';
            }
            if ( isset( $mashup_var_team_link ) && $mashup_var_team_link != '' ) {
                $html .='<a href = "' . esc_url( $mashup_var_team_link ) . '" class = "btn">READ MORE</a>';
            } else {
                $html .='<a href = "javascript:void(0)" class = "btn">READ MORE</a>';
            }
            $html .='</div>';
            $html .='</div>';
            $html .='<div class = "col-lg-6 col-md-6 col-sm-12 col-xs-12">';
            $html .='<div class = "image-frame" data-animation = "fadeInRight" data-delay = "0.5s">';
            $html .='<div class = "img-holder">';
            if ( $mashup_var_team_image <> '' ) {
                $html .='<figure> <img src = "' . esc_url( $mashup_var_team_image ) . '" alt = ""/> </figure>';
            }
            $html .='</div>';
            $html .='</div>';
            $html .='</div>';
            $html .='</li>';
        } else {

            $html .= '<div class="' . esc_html( $col_class ) . '">';

            $team_link = 'javascript:void(0)';
            if ( '' != $mashup_var_team_link ) {
                $team_link = esc_url( $mashup_var_team_link );
            }
            $html .= ' <div class="team-view scrollingeffect fadeInUp">';
            $html .= ' <div class="img-holder">';
            if ( $mashup_var_team_image <> '' ) {
                $html .= ' <figure><a href="' . $team_link . '"><img src="' . esc_url( $mashup_var_team_image ) . '" alt=""></a><figcaption><a href="' . $team_link . '"><span class="icon-add_box"></span></a></figcaption></figure>';
            }
            $html .= ' </div>';

            $html .= '<div class="team-info">';

            $html .= ' <div class="post-title">';
            if ( $mashup_var_team_designation <> '' ) {
                $html .= ' <span class="position">' . esc_html( $mashup_var_team_designation ) . '</span>';
            }

            if ( $mashup_var_team_name <> '' ) {
                $html .= ' <h2><a href="' . $team_link . '">' . esc_html( $mashup_var_team_name ) . '</a></h2>';
            }
            $html .= ' </div>';

            $html .= '<div class="team-detail">';
            $html .= '<p>' . do_shortcode( $content ) . '</p>';
            $html .= '</div>';

            $html .= ' </div>';
            $html .= ' </div>';
            $html .= ' </div>';
        }

        return do_shortcode( $html );
    }

}
if ( function_exists( 'mashup_var_short_code' ) )
    mashup_var_short_code( 'mashup_team_item', 'mashup_var_team_item_shortcode' );
?>