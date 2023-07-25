<?php

if (!function_exists('mashup_frame_option_save')) {

    function mashup_frame_option_save() {
		global $mashup_var_frame_static_text,$mashup_var_frame_options;
        if (isset($_REQUEST['mashup_frame_option_saving'])) {
            
            $_POST = mashup_var_stripslashes_htmlspecialchars($_POST);
            update_option("mashup_var_frame_options", $_POST);
            echo mashup_var_frame_text_srt('mashup_var_maintenance_save_message');
        }
        die();
    }

    add_action('wp_ajax_mashup_frame_option_save', 'mashup_frame_option_save');
}