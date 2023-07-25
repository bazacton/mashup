<?php

/*
 * tgm class for 
 * (internal and WordPress repository) 
 * plugin activation start
 */

mashup_include_file(trailingslashit(get_template_directory()) . 'include/backend/cs-activation-plugins/class-tgm-plugin-activation.php');

if (!function_exists('mashup_var_register_required_plugins')) {
    add_action('tgmpa_register', 'mashup_var_register_required_plugins');

    function mashup_var_register_required_plugins() {
        global $mashup_var_static_text;
        $strings = new mashup_theme_all_strings;
        $strings->mashup_plugin_activation_strings();


        /*
         * Array of plugin arrays. Required keys are name and slug.
         * If the source is NOT from the .org repo, then source is also required.
         */

        $plugins = array(
            /*
             * This is an example of how to include a plugin from the WordPress Plugin Repository.
             */
            array(
                'name' => mashup_var_theme_text_srt('mashup_var_theme_option_revolution_slider'),
                'slug' => 'revslider',
                'source' => 'http://chimpgroup.com/wp-demo/download-plugin/revslider.zip',
                'required' => true,
                'version' => '',
                'force_activation' => false,
                'force_deactivation' => false,
                'external_url' => '',
            ),
            array(
                'name' => mashup_var_theme_text_srt('mashup_var_framework'),
                'slug' => 'mashup-framework',
                'source' => 'http://chimpgroup.com/wp-demo/download-plugin/mashup/mashup-framework.zip',
                'required' => true,
                'version' => '1.0',
                'force_activation' => false,
                'force_deactivation' => false,
                'external_url' => '',
            ),
            array(
                    'name' => mashup_var_theme_text_srt('mashup_var_install_plugins_woocommerce'),
                    'slug' => 'woocommerce',
                    'required' => false,
                ),
            array(
                'name' => mashup_var_theme_text_srt('mashup_var_install_plugins_loco_translate'),
                'slug' => 'loco-translate',
                'required' => true,
                'version' => '',
                'force_activation' => false,
                'force_deactivation' => false,
                'external_url' => '',
            ),
        );

        /*
         * Change this to your theme text domain, used for internationalising strings
         */
        $theme_text_domain = 'mashup';
        /**
         * Array of configuration settings. Amend each line as needed.
         * If you want the default strings to be available under your own theme domain,
         * leave the strings uncommented.
         * Some of the strings are added into a sprintf, so see the comments at the
         * end of each line for what each argument will be.
         */
        $config = array(
            'domain' => 'mashup', /* Text domain - likely want to be the same as your theme. */
            'default_path' => '', /* Default absolute path to pre-packaged plugins */
            'parent_slug' => 'themes.php', /* Default parent menu slug */
            //'parent_menu_slug' => 'themes.php', /* Default parent menu slug */
            //'parent_url_slug' => 'themes.php', /* Default parent URL slug */
            'menu' => 'install-required-plugins', /* Menu slug */
            'has_notices' => true, /* Show admin notices or not */
            'is_automatic' => true, /* Automatically activate plugins after installation or not */
            'message' => '', /* Message to output right before the plugins table */
            'strings' => array(
                'page_title' => mashup_var_theme_text_srt('mashup_var_install_require_plugins'),
                'menu_title' => mashup_var_theme_text_srt('mashup_var_install_plugins'),
                'installing' => mashup_var_theme_text_srt('mashup_var_installing_plugins'), /* %1$s = plugin name */
                'oops' => mashup_var_theme_text_srt('mashup_var_wrong'),
                'notice_can_install_required' => mashup_var_theme_text_srt('mashup_var_notice_can_install_required'), /* %1$s = plugin name(s) */
                'notice_can_install_recommended' => mashup_var_theme_text_srt('mashup_var_notice_can_install_recommended'), /* %1$s = plugin name(s) */
                'notice_cannot_install' => mashup_var_theme_text_srt('mashup_var_sorry'), /* %1$s = plugin name(s) */
                'notice_can_activate_required' => mashup_var_theme_text_srt('mashup_var_notice_can_activate_required'), /* %1$s = plugin name(s) */
                'notice_can_activate_recommended' => mashup_var_theme_text_srt('mashup_var_notice_can_activate_recommended'), /* %1$s = plugin name(s) */
                'notice_cannot_activate' => mashup_var_theme_text_srt('mashup_var_sorry_not_permission'), /* %1$s = plugin name(s) */
                'notice_ask_to_update' => mashup_var_theme_text_srt('mashup_var_notice_can_activate_recommended'), /* %1$s = plugin name(s) */
                'notice_cannot_update' => mashup_var_theme_text_srt('mashup_var_sorry_updated'), /* %1$s = plugin name(s) */
                'install_link' => mashup_var_theme_text_srt('mashup_var_install_link'),
                'activate_link' => mashup_var_theme_text_srt('mashup_var_activate_installed'),
                'return' => mashup_var_theme_text_srt('mashup_var_return'),
                'plugin_activated' => mashup_var_theme_text_srt('mashup_var_activation_success'),
                'complete' => mashup_var_theme_text_srt('mashup_var_complete'), /* %1$s = dashboard link */
                'nag_type' => mashup_var_theme_text_srt('mashup_var_updated'), /* Determines admin notice type - can only be 'updated' or 'error' */
            )
        );
        tgmpa($plugins, $config);
    }

}