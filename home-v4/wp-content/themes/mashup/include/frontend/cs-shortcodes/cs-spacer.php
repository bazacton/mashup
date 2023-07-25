<?php

/**
 * @Spacer html form for page builder
 */
if ( ! function_exists( 'mashup_var_spacer_shortcode' ) ) {

    function mashup_var_spacer_shortcode( $atts, $content = "" ) {
        global $mashup_border;

        $mashup_var_defaults = array( 'mashup_var_spacer_height' => '25' );
        extract( shortcode_atts( $mashup_var_defaults, $atts ) );

        return '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:' . do_shortcode( $mashup_var_spacer_height ) . 'px">
		</div>';
    }

    if ( function_exists( 'mashup_var_short_code' ) )
        mashup_var_short_code( 'spacer', 'mashup_var_spacer_shortcode' );
}