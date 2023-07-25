<?php

add_action('admin_menu', 'mashup_maintenance_mode_menu');
if (!function_exists('mashup_maintenance_mode_menu')) {

    function mashup_maintenance_mode_menu() {
        add_theme_page("Maintenance Mode", mashup_var_frame_text_srt('mashup_var_maintenance_field_name'), 'read', 'mashup_maintenance_mode', 'mashup_maintenance_mode');
    }

}

if (!function_exists('mashup_maintenance_mode')) {

    function mashup_maintenance_mode() {
        global $mashup_frame_settings, $mashup_var_frame_options, $mashup_var_form_fields,$mashup_var_frame_static_text;
        
        $mashup_html = '';
        $mashup_html .= '
        <div class="theme-wrap fullwidth">
        <div class="inner">
        <div class="outerwrapp-layer">
            <div class="loading_div"> 
                <i class="icon-circle-o-notch icon-spin"></i> <br>
                ' . mashup_var_frame_text_srt('mashup_var_saving_changes') . '
            </div>
            <div class="form-msg"> 
                <i class="icon-check-circle-o"></i>
                <div class="innermsg"></div>
            </div>
        </div>
        <div class="row">
        <form id="frm" method="post">
        <div class="col2">';
        $mashup_frame_fields = new mashup_maintenance_fields();
        $return_fields = $mashup_frame_fields->mashup_fields($mashup_frame_settings);
        $mashup_html .= $return_fields;
        $mashup_html .= '
        </div>
        <div class="footer">';
        $mashup_opt_array = array(
            'std' => mashup_var_frame_text_srt('mashup_var_maintenance_save_settings'),
            'cust_id' => 'submit_btn',
            'cust_name' => 'submit_btn',
            'cust_type' => 'button',
            'extra_atr' => 'onclick="javascript:mashup_frame_option_save(\'' . esc_js(admin_url('admin-ajax.php')) . '\');"',
            'classes' => 'bottom_btn_save',
            'return' => true,
        );
        $mashup_html .= $mashup_var_form_fields->mashup_var_form_text_render($mashup_opt_array);
        $mashup_opt_array = array(
            'std' => 'mashup_frame_option_save',
            'cust_id' => 'action',
            'cust_name' => 'action',
            'classes' => '',
            'return' => true,
        );
        $mashup_html .= $mashup_var_form_fields->mashup_var_form_hidden_render($mashup_opt_array);
        $mashup_opt_array = array(
            'std' => '1',
            'cust_id' => 'mashup_frame_option_saving',
            'cust_name' => 'mashup_frame_option_saving',
            'classes' => '',
            'return' => true,
        );
        $mashup_html .= $mashup_var_form_fields->mashup_var_form_hidden_render($mashup_opt_array);
        $mashup_html .= '
        </div>
        </form>
        </div>
        </div>
        </div>';

        echo force_balance_tags($mashup_html);
    }

}

if (!function_exists('mashup_maintenance_options_array')) {
    add_action('init', 'mashup_maintenance_options_array');

    function mashup_maintenance_options_array() {
        global $mashup_frame_settings, $mashup_var_frame_options,$mashup_var_frame_static_text;

        $on_off_option = array(
            "show" => "on",
            "hide" => "off",
        );
        
        $mashup_frame_settings[] = array("name" => mashup_var_frame_text_srt('mashup_var_maintenance_field_name'),
            "std" => mashup_var_frame_text_srt('mashup_var_maintenance_field_name'),
            "type" => "section"
        );
        $mashup_frame_settings[] = array("name" => mashup_var_frame_text_srt('mashup_var_maintenance_field_name'),
            "desc" => "",
            "hint_text" => mashup_var_frame_text_srt('mashup_var_maintenance_field_mode_hint'),
            "id" => "coming_soon_switch",
            "std" => "off",
            "type" => "checkbox",
            "options" => $on_off_option
        );

        $mashup_frame_settings[] = array("name" => mashup_var_frame_text_srt('mashup_var_maintenance_field_logo'),
            "desc" => "",
            "hint_text" => mashup_var_frame_text_srt('mashup_var_maintenance_field_logo_hint'),
            "id" => "coming_logo_switch",
            "std" => "off",
            "type" => "checkbox",
            "options" => $on_off_option
        );
        $mashup_frame_settings[] = array("name" => mashup_var_frame_text_srt('mashup_var_maintenance_field_social'),
            "desc" => "",
            "hint_text" => mashup_var_frame_text_srt('mashup_var_maintenance_field_social_hint'),
            "id" => "coming_social_switch",
            "std" => "off",
            "type" => "checkbox",
            "options" => $on_off_option
        );

        $mashup_frame_settings[] = array("name" => mashup_var_frame_text_srt('mashup_var_maintenance_field_newsletter'),
            "desc" => "",
            "hint_text" => mashup_var_frame_text_srt('mashup_var_maintenance_field_newsletter_hint'),
            "id" => "coming_newsletter_switch",
            "std" => "off",
            "type" => "checkbox",
            "options" => $on_off_option
        );


        $mashup_frame_settings[] = array("name" => mashup_var_frame_text_srt('mashup_var_maintenance_field_header'),
            "desc" => "",
            "hint_text" => mashup_var_frame_text_srt('mashup_var_maintenance_field_header_hint'),
            "id" => "header_switch",
            "std" => "off",
            "type" => "checkbox",
            "options" => $on_off_option
        );

        $mashup_frame_settings[] = array("name" => mashup_var_frame_text_srt('mashup_var_maintenance_field_footer'),
            "desc" => "",
            "hint_text" => mashup_var_frame_text_srt('mashup_var_maintenance_field_footer_hint'),
            "id" => "footer_setting",
            "std" => "off",
            "type" => "checkbox",
            "options" => $on_off_option
        );
        $args = array(
            'sort_order' => 'asc',
            'sort_column' => 'post_title',
            'hierarchical' => 1,
            'exclude' => '',
            'include' => '',
            'meta_key' => '',
            'meta_value' => '',
            'authors' => '',
            'child_of' => 0,
            'parent' => -1,
            'exclude_tree' => '',
            'number' => '',
            'offset' => 0,
            'post_type' => 'page',
            'post_status' => 'publish'
        );

        $mashup_var_pages = get_pages($args);

        $mashup_var_options_array = array();
        $mashup_var_options_array[] = mashup_var_frame_text_srt('mashup_var_maintenance_field_select_page');
        foreach ($mashup_var_pages as $mashup_var_page) {

            $mashup_var_options_array[$mashup_var_page->ID] = isset($mashup_var_page->post_title) && ($mashup_var_page->post_title != '') ? $mashup_var_page->post_title : mashup_var_frame_text_srt('mashup_var_no_title');
        }


        $mashup_frame_settings[] = array("name" => mashup_var_frame_text_srt('mashup_var_maintenance_field_mode_page'),
            "desc" => "",
            "hint_text" => mashup_var_frame_text_srt('mashup_var_maintenance_field_mode_page_hint'),
            "id" => "maintinance_mode_page",
            "std" => mashup_var_frame_text_srt('mashup_var_maintenance_select_page'),
            "type" => "select",
            'classes' => 'chosen-select',
            "options" => $mashup_var_options_array
        );
    }

}