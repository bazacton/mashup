<?php

$var_arrays = array( 'mashup_var_home', 'mashup_var_demo' );
$theme_option_array_global_vars = MASHUP_VAR_GLOBALS()->globalizing( $var_arrays );
extract( $theme_option_array_global_vars );

$home_demo = mashup_var_get_demo_content( 'home.json' );

$mashup_page_option[] = array();
$mashup_page_option['theme_options'] = array(
    'select' => array(
        'home' => isset( $mashup_var_home ) ? $mashup_var_home : '',
    ),
    'home' => array(
        'name' => isset( $mashup_var_demo ) ? $mashup_var_demo : '',
        'page_slug' => 'home',
        'theme_option' => $home_demo,
        'thumb' => 'Import-Dummy-Data'
    ),
);
?>