<?php

/**
 * Saving Theme Options
 *
 */
if (!function_exists('mashup_theme_option_save')) {

    function mashup_theme_option_save() {
		global $mashup_var_static_text;
		$strings = new mashup_theme_all_strings;
		$strings->mashup_theme_option_strings();
		// theme option save request.
		if (isset($_REQUEST['mashup_var_theme_option_save_flag'])) {
			$_POST = mashup_var_stripslashes_htmlspecialchars($_POST);
			update_option("mashup_var_options", $_POST);
			// create css file when them option call
			mashup_write_stylesheet_content();
	
			echo esc_html(mashup_var_theme_text_srt('mashup_var_save_msg'));
		}
		die();
    }

    add_action('wp_ajax_mashup_theme_option_save', 'mashup_theme_option_save');
}

/**
 * @Generate Options Backup
 * @return
 *
 */
if (!function_exists('mashup_var_settings_backup_generate')) {

    function mashup_var_settings_backup_generate() {

	global $wp_filesystem, $mashup_var_options, $mashup_var_static_text;
	$strings = new mashup_theme_all_strings;
	$strings->mashup_theme_option_field_strings();

	$mashup_var_export_options = $mashup_var_options;

	$mashup_var_option_fields = json_encode($mashup_var_export_options, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

	$backup_url = wp_nonce_url('themes.php?page=mashup_var_settings_page');
	if (false === ($creds = request_filesystem_credentials($backup_url, '', false, false, array()) )) {

	    return true;
	}

	if (!WP_Filesystem($creds)) {
	    request_filesystem_credentials($backup_url, '', true, false, array());
	    return true;
	}

	$mashup_var_upload_dir = get_template_directory() . '/include/backend/cs-theme-options/backups/';
	$mashup_var_filename = trailingslashit($mashup_var_upload_dir) . (current_time('d-M-Y_H.i.s')) . '.json';


	if (!$wp_filesystem->put_contents($mashup_var_filename, $mashup_var_option_fields, FS_CHMOD_FILE)) {
	    echo esc_html(mashup_var_theme_text_srt('mashup_var_error_saving_file'));
	} else {
	    echo esc_html(mashup_var_theme_text_srt('mashup_var_backup_generated'));
	}

	die();
    }

    add_action('wp_ajax_mashup_var_settings_backup_generate', 'mashup_var_settings_backup_generate');
}

/**
 * @Delete Backup File
 * @return
 *
 */
if (!function_exists('mashup_var_backup_file_delete')) {

    function mashup_var_backup_file_delete() {

	global $wp_filesystem, $mashup_var_static_text;

	$strings = new mashup_theme_all_strings;
	$strings->mashup_theme_option_field_strings();
	$backup_url = wp_nonce_url('themes.php?page=mashup_var_settings_page');
	if (false === ($creds = request_filesystem_credentials($backup_url, '', false, false, array()) )) {

	    return true;
	}

	if (!WP_Filesystem($creds)) {
	    request_filesystem_credentials($backup_url, '', true, false, array());
	    return true;
	}

	$mashup_var_upload_dir = get_template_directory() . '/include/backend/cs-theme-options/backups/';

	$file_name = isset($_POST['file_name']) ? $_POST['file_name'] : '';

	$mashup_var_filename = trailingslashit($mashup_var_upload_dir) . $file_name;

	if (is_file($mashup_var_filename)) {
	    unlink($mashup_var_filename);
	    printf(mashup_var_theme_text_srt('mashup_var_file_deleted_successfully'), $file_name);
	} else {
	    echo esc_html(mashup_var_theme_text_srt('mashup_var_error_deleting_file'));
	}

	die();
    }

    add_action('wp_ajax_mashup_var_backup_file_delete', 'mashup_var_backup_file_delete');
}

/**
 * @Restore Backup File
 * @return
 *
 */
if (!function_exists('mashup_var_backup_file_restore')) {

    function mashup_var_backup_file_restore() {

	global $wp_filesystem, $mashup_var_static_text;
	$strings = new mashup_theme_all_strings;
	$strings->mashup_theme_option_field_strings();

	$backup_url = wp_nonce_url('themes.php?page=mashup_var_settings_page');
	if (false === ($creds = request_filesystem_credentials($backup_url, '', false, false, array()) )) {

	    return true;
	}

	if (!WP_Filesystem($creds)) {
	    request_filesystem_credentials($backup_url, '', true, false, array());
	    return true;
	}

	$mashup_var_upload_dir = get_template_directory() . '/include/backend/cs-theme-options/backups/';

	$file_name = isset($_POST['file_name']) ? $_POST['file_name'] : '';

	$file_path = isset($_POST['file_path']) ? $_POST['file_path'] : '';

	if ($file_path == 'yes') {

	    $mashup_var_file_body = '';

	    $mashup_var_file_response = wp_remote_get($file_name, array('decompress' => false));

	    if (is_array($mashup_var_file_response)) {
		$mashup_var_file_body = isset($mashup_var_file_response['body']) ? $mashup_var_file_response['body'] : '';
	    }

	    if ($mashup_var_file_body != '') {

		$get_options_file = json_decode($mashup_var_file_body, true);

		update_option("mashup_var_options", $get_options_file);


		echo esc_html(mashup_var_theme_text_srt('mashup_var_file_import_successfully'));
	    } else {
		echo esc_html(mashup_var_theme_text_srt('mashup_var_error_restoring_file'));
	    }

	    die;
	}

	$mashup_var_filename = trailingslashit($mashup_var_upload_dir) . $file_name;

	if (is_file($mashup_var_filename)) {

	    $get_options_file = $wp_filesystem->get_contents($mashup_var_filename);

	    $get_options_file = json_decode($get_options_file, true);

	    update_option("mashup_var_options", $get_options_file);


	    $mashup_var_file_restore_successfully = mashup_var_theme_text_srt('mashup_var_file_restore_successfully');
	    printf($mashup_var_file_restore_successfully, $file_name);
	} else {
	    echo esc_html(mashup_var_theme_text_srt('mashup_var_error_restoring_file'));
	}

	die();
    }

    add_action('wp_ajax_mashup_var_backup_file_restore', 'mashup_var_backup_file_restore');
}

/**
 * @saving all the theme options end
 * @return
 *
 */
if (!function_exists('mashup_theme_option_rest_all')) {

    function mashup_theme_option_rest_all() {

	global $wp_filesystem;

	$backup_url = esc_url(home_url('/'));
	if (false === ($creds = request_filesystem_credentials($backup_url, '', false, false, array()) )) {

	    return true;
	}

	if (!WP_Filesystem($creds)) {
	    request_filesystem_credentials($backup_url, '', true, false, array());
	    return true;
	}

	$mashup_var_upload_dir = get_template_directory() . '/include/backend/cs-theme-options/default-settings/';

	$mashup_var_filename = trailingslashit($mashup_var_upload_dir) . 'default-settings.json';

	if (is_file($mashup_var_filename)) {

	    $get_options_file = $wp_filesystem->get_contents($mashup_var_filename);

	    $get_options_file = json_decode($get_options_file, true);

	    update_option("mashup_var_options", $get_options_file);
	} else {
	    mashup_var_reset_data();
	}
	die;
    }

    add_action('wp_ajax_mashup_theme_option_rest_all', 'mashup_theme_option_rest_all');
}


/**
 * @Default Options for Theme
 *
 */
if (!function_exists('mashup_theme_default_options')) {

    function mashup_theme_default_options() {

	global $wp_filesystem;

	$backup_url = wp_nonce_url('themes.php?page=mashup_var_settings_page');
	if (false === ($creds = request_filesystem_credentials($backup_url, '', false, false, array()) )) {

	    return true;
	}

	if (!WP_Filesystem($creds)) {
	    request_filesystem_credentials($backup_url, '', true, false, array());
	    return true;
	}

	$mashup_var_upload_dir = get_template_directory() . '/include/backend/cs-theme-options/default-settings/';

	$mashup_var_filename = trailingslashit($mashup_var_upload_dir) . 'default-settings.json';

	if (is_file($mashup_var_filename)) {

	    $get_options_file = $wp_filesystem->get_contents($mashup_var_filename);

	    $mashup_var_default_data = $get_options_file = json_decode($get_options_file, true);
	} else {
	    $mashup_var_default_data = '';
	}

	return $mashup_var_default_data;
    }

}


/**
 * @Getting Demo Content
 *
 */
if (!function_exists('mashup_var_get_demo_content')) {

    function mashup_var_get_demo_content($mashup_var_demo_file = '') {

	global $wp_filesystem;

	$backup_url = wp_nonce_url('themes.php?page=mashup_var_settings_page');
	if (false === ( $creds = request_filesystem_credentials($backup_url, '', false, false, array()) )) {

	    return true;
	}

	if (!WP_Filesystem($creds)) {
	    request_filesystem_credentials($backup_url, '', true, false, array());
	    return true;
	}

	$mashup_var_upload_dir = get_template_directory() . '/include/backend/cs-theme-options/demo-data/';

	$mashup_var_filename = trailingslashit($mashup_var_upload_dir) . $mashup_var_demo_file;

	$mashup_var_demo_data = array();

	if (is_file($mashup_var_filename)) {

	    $get_options_file = $wp_filesystem->get_contents($mashup_var_filename);

	    $mashup_var_demo_data = $get_options_file;
	}

	return $mashup_var_demo_data;
    }

}

/**
 * @theme activation
 * @return
 *
 */
if (!function_exists('mashup_var_activation_data')) {

    function mashup_var_activation_data() {
	update_option('mashup_var_options', theme_default_options());
    }

}

/**
 * @array for reset theme options
 * @return
 *
 */
if (!function_exists('mashup_var_reset_data')) {

    function mashup_var_reset_data() {
	global $reset_data, $mashup_var_settings;
	foreach ($mashup_var_settings as $value) {
	    if ($value['type'] <> 'heading' and $value['type'] <> 'sub-heading' and $value['type'] <> 'main-heading') {
		if ($value['type'] == 'sidebar' || $value['type'] == 'networks' || $value['type'] == 'badges') {
		    $reset_data = (array_merge($reset_data, $value['options']));
		} elseif ('check_color' == $value['type']) {
		    $reset_data[$value['id']] = $value['std'];
		    $reset_data[$value['id'] . '_switch'] = 'off';
		} else {
		    $reset_data[$value['id']] = $value['std'];
		}
	    }
	}
	return $reset_data;
    }

}
