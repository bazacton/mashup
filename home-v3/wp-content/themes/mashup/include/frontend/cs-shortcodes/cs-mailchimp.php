<?php

/*
 *
 * @Shortcode Name : Image Frame
 * @retrun
 *
 */
if ( ! function_exists( 'mashup_var_mail_chimp' ) ) {

    function mashup_var_mail_chimp( $atts, $content = "" ) {

        global $header_map, $post;
        $defaults = array(
            'mashup_var_column_size' => '',
            'mashup_var_mail_section_title' => '',
        );
        extract( shortcode_atts( $defaults, $atts ) );
        if ( isset( $mashup_var_column_size ) && $mashup_var_column_size != '' ) {
            if ( function_exists( 'mashup_var_custom_column_class' ) ) {
                $column_class = mashup_var_custom_column_class( $mashup_var_column_size );
            }
        }

        $mashup_var_mail_section_title = isset( $mashup_var_mail_section_title ) ? $mashup_var_mail_section_title : '';
        $mashup_var_mail_chimp = '';
        if ( isset( $column_class ) && $column_class <> '' ) {
            echo '<div class="' . esc_html( $column_class ) . '">';
        }
        echo '<div class="news-letter">
            <div class="row">';
        if ( isset( $mashup_var_mail_section_title ) || isset( $content ) ) {
            echo '<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="text-holder"><i class="icon-mail"></i>';
            if ( isset( $mashup_var_mail_section_title ) && $mashup_var_mail_section_title != '' ) {
                echo '<span class="text-color">' . esc_html( $mashup_var_mail_section_title ) . '</span>';
            }
            if ( isset( $content ) && $content != '' ) {
                echo '<div class="content">'.do_shortcode( $content ).'</div>';
            }
            echo '</div>
                </div>';
        }
        $under_construction = '2';
        echo '<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">';
        echo mashup_custom_mailchimp( $under_construction );
        echo '</div>
            </div>
        </div>';
        if ( isset( $column_class ) && $column_class <> '' ) {
            echo '</div>';
        }

        return $mashup_var_mail_chimp;
    }

    if ( function_exists( 'mashup_var_short_code' ) ) {
        mashup_var_short_code( 'mashup_mail_chimp', 'mashup_var_mail_chimp' );
    }
}