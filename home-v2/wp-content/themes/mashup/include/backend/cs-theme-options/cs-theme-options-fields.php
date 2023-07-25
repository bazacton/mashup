<?php

/**
 * mashup Theme Options Fields
 *
 * @package WordPress
 * @subpackage mashup
 * @since Auto Mobile 1.0
 */
if (!class_exists('mashup_var_fields')) {

    class mashup_var_fields {

        /**
         * Construct
         *
         * @return
         */
        public function __construct() {
            
        }

        /**
         * Sub Menu Fields
         *
         * @return
         */
        public function sub_menu($sub_menu = '') {

            $menu_items = '';
            $active = '';

            if (is_array($sub_menu) && sizeof($sub_menu) > 0) {

                $menu_items .= '<ul class="sub-menu">';
                foreach ($sub_menu as $key => $value) {
                    $active = $key == "tab-global-setting" ? 'active' : '';
                    $menu_items .= '<li class="' . sanitize_html_class($key) . ' ' . $active . ' "><a href="#' . esc_html($key) . '" onClick="toggleDiv(this.hash);return false;">' . esc_attr($value) . '</a></li>';
                }
                $menu_items .= '</ul>';
            }

            return $menu_items;
        }

        /**
         * All Options Fields
         *
         * @return
         */
        public function mashup_var_fields($mashup_var_settings = '') {

            global $mashup_var_options, $mashup_var_form_fields, $mashup_var_html_fields, $mashup_var_static_text;

            $strings = new mashup_theme_all_strings;
            $strings->mashup_theme_option_field_strings();
            $counter = 0;
            $mashup_var_counter = 0;
            $menu = '';
            $output = '';
            $parent_heading = '';
            $style = '';
            $mashup_var_countries_list = '';

            if (is_array($mashup_var_settings) && sizeof($mashup_var_settings) > 0) {
                foreach ($mashup_var_settings as $value) {
                    $counter ++;
                    $val = '';

                    $select_value = '';
                    switch ($value['type']) {

                        case "heading":
                            $parent_heading = $value['name'];
                            $menu .= '<li><a title="' . esc_html($value['name']) . '" href="#"><i class="' . sanitize_html_class($value["fontawesome"]) . '"></i><span class="cs-title-menu">' . esc_attr($value['name']) . '</span></a>';
                            if (is_array($value['options']) && $value['options'] <> '') {
                                $menu .= $this->sub_menu($value['options']);
                            }
                            $menu .= '</li>';
                            break;

                        case "main-heading":
                            $parent_heading = $value['name'];
                            $menu .= '<li><a title="' . esc_html($value['name']) . '" href="#' . $value['id'] . '" onClick="toggleDiv(this.hash);return false;">
							<i class="' . sanitize_html_class($value["fontawesome"]) . '"></i><span class="cs-title-menu">' . esc_attr($value['name']) . '</span></a>';
                            $menu .= '</li>';
                            break;

                        case 'select_dashboard':
                            if (isset($mashup_var_options) and $mashup_var_options <> '') {
                                if (isset($mashup_var_options[$value['id']])) {
                                    $select_value = $mashup_var_options[$value['id']];
                                }
                            } else {
                                $select_value = $value['std'];
                            }
                            $args = array(
                                'depth' => 0,
                                'child_of' => 0,
                                'sort_order' => 'ASC',
                                'sort_column' => 'post_title',
                                'show_option_none' => mashup_var_theme_text_srt('mashup_var_please_select_a_page'),
                                'hierarchical' => '1',
                                'exclude' => '',
                                'meta_key' => '',
                                'meta_value' => '',
                                'authors' => '',
                                'exclude_tree' => '',
                                'selected' => $select_value,
                                'echo' => 0,
                                'name' => $value['id'],
                                'post_type' => 'page'
                            );
                            $mashup_var_pages = wp_dropdown_pages($args);
                            $all_pages = get_pages();
                            //print_r( get_pages());
                            $pages_array = array();
                            foreach ($all_pages as $page) {
                                if ($page->post_type == 'page') {
                                    $pages_array[$page->ID] = $page->post_name;
                                }
                            }
                            print_r($pages_array);

                            $mashup_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $val,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => isset($value['classes']) ? $value['classes'] : '',
                                    'return' => true,
                                    'options_markup' => true,
                                ),
                                'options' => $pages_array,
                            );
                            $output .= $mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);
                            break;

                        case "division":
                            $extra_atts = isset($value['extra_atts']) ? $value['extra_atts'] : '';
                            $default_show = isset($value['default_show']) ? $value['default_show'] : '';

                            $preview_image_tag = isset($value['preview_image_tag']) ? $value['preview_image_tag'] : '';
                            $preview_image_name = isset($value['preview_image_name']) ? $value['preview_image_name'] : '';
                            $preview_field_name = isset($value['preview_field_name']) ? $value['preview_field_name'] : '';
                            $preview_folder_path = isset($value['preview_folder_path']) ? $value['preview_folder_path'] : '';

                            $d_enable = ' style="display:none;"';
                            if ($default_show == 'yes') {
                                $d_enable = ' style="display:block;"';
                            }
                            if (isset($value['enable_val'])) {
                                $enable_id = isset($value['enable_id']) ? $value['enable_id'] : '';
                                $enable_val = $value['enable_val'];
                                $d_val = '';
                                if (isset($mashup_var_options[$enable_id])) {
                                    $d_val = $mashup_var_options[$enable_id];
                                }
                                $enable_multi = explode(',', $enable_val);
                                if (is_array($enable_multi) && sizeof($enable_multi) > 1) {
                                    $d_enable = in_array($d_val, $enable_multi) ? ' style="display:block;"' : ' style="display:none;"';
                                } else {
                                    $d_enable = $d_val == $enable_val ? ' style="display:block;"' : ' style="display:none;"';
                                }
                                if ($default_show == 'yes') {
                                    $d_enable = ' style="display:yes;"';
                                }
                            }
                            $output .= '<div' . $d_enable . ' ' . $extra_atts . '>';
                            if ($preview_image_tag == 'yes') {
                                if (isset($mashup_var_options['mashup_var_' . $preview_field_name . ''])) {
                                    $preview_image_name = $mashup_var_options['mashup_var_' . $preview_field_name . ''];
                                }
                                if ('' !== $preview_image_name) {
                                    $output .= '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
                                    $output .= '<div class="img-holder">';
                                    $output .= '<figure>';
                                    $output .= '<a href="' . esc_url($preview_folder_path . $preview_image_name) . '.jpg" class="thumbnail" title="' . $preview_image_name . '"><img src="' . esc_url($preview_folder_path . $preview_image_name) . '.jpg" alt="' . $preview_image_name . '"></a>';
                                    $output .= '</figure>';
                                    $output .= '</div>';
                                    $output .= '</div>';
                                }
                            }
                            break;

                        case "division_close":
                            $output .= '</div>';
                            break;

                        case "col-right-text":
                            $col_heading = "";
                            $help_text = "";
                            if (isset($value['col_heading'])) {
                                $col_heading = isset($value['col_heading']) ? $value['col_heading'] : '';
                            }
                            if (isset($value['help_text'])) {
                                $help_text = isset($value['help_text']) ? $value['help_text'] : '';
                            }
                            $mashup_opt_array = array(
                                'col_heading' => $col_heading,
                                'help_text' => $help_text,
                            );
                            $output .= $mashup_var_html_fields->mashup_var_set_col_right($mashup_opt_array);
                            break;

                        case "sub-heading":
                            $mashup_var_counter ++;
                            if ($mashup_var_counter > 1) {
                                $output .='</div>';
                            }
                            if ($value['id'] != 'tab-global-setting') {
                                $style = 'style="display:none;"';
                            }

                            $output .= '<div id="' . $value['id'] . '" ' . $style . ' >';
                            $output .= '<div class="theme-header">
											<h1>' . esc_attr($value['name']) . '</h1>
									   </div>';
                            if (isset($value['with_col']) && $value['with_col'] == true) {
                                $output .='<div class="col2-right">';
                            }
                            break;

                        case "announcement":
                            $mashup_var_counter ++;
                            $output.='<div id="' . $value['id'] . '" class="sidebar-area theme-help">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&#215;</button>
											<h4>' . force_balance_tags($value['name']) . '</h4>
											<p>' . force_balance_tags($value['std']) . '</p>
								 </div>';
                            break;

                        case "section":
                            $output .='<div class="theme-help">
									<h4>' . esc_attr($value['std']) . '</h4>
									<div class="clear"></div>
								  </div>';
                            break;

                        case 'text':
                            if (isset($mashup_var_options['mashup_var_' . $value['id']])) {
                                $val = $mashup_var_options['mashup_var_' . $value['id']];
                            } else {
                                $val = isset($value['std']) ? $value['std'] : '';
                            }

                            $mashup_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $val,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => '',
                                    'return' => true,
                                ),
                            );

                            $output .= $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
                            break;

                        case 'slider_code':
                            if (isset($mashup_var_options['mashup_var_' . $value['id']]) && $mashup_var_options['mashup_var_' . $value['id']] <> '') {
                                $select_value = $mashup_var_options['mashup_var_' . $value['id']];
                            } else {
                                $select_value = isset($value['std']) ? $value['std'] : '';
                            }

                            $mashup_slider_options = '';

                            if (class_exists('RevSlider') && class_exists('mashup_var_RevSlider')) {
                                $slider = new mashup_var_RevSlider();
                                $arrSliders = $slider->getAllSliderAliases();
                                if (is_array($arrSliders)) {
                                    foreach ($arrSliders as $key => $entry) {

                                        $selected = '';
                                        if ($select_value != '') {
                                            if ($select_value == $entry['alias']) {
                                                $selected = ' selected="selected"';
                                            }
                                        } else {
                                            if (isset($value['std']))
                                                if ($value['std'] == $entry['alias']) {
                                                    $selected = ' selected="selected"';
                                                }
                                        }
                                        $mashup_slider_options .= '<option ' . $selected . ' value="' . $entry['alias'] . '">' . $entry['title'] . '</option>';
                                    }
                                }
                            }

                            $mashup_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $val,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => isset($value['classes']) ? $value['classes'] : '',
                                    'return' => true,
                                    'options_markup' => true,
                                    'options' => $mashup_slider_options,
                                ),
                            );
                            $output .= $mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);

                            break;

                        case 'range_font' :
                            if (isset($mashup_var_options['mashup_var_' . $value['id']])) {
                                $val = $mashup_var_options['mashup_var_' . $value['id']];
                            } else {
                                $val = isset($value['std']) ? $value['std'] : '';
                            }

                            $mashup_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'extra_att' => 'style="width:50%; display:inline-block;"',
                                'id' => 'mashup_var_' . $value['id'] . '_range',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $val,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => '',
                                    'return' => true,
                                ),
                            );

                            $output .= $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);

                            break;

                        case 'range':
                            if (isset($mashup_var_options['mashup_var_' . $value['id']])) {
                                $val = $mashup_var_options['mashup_var_' . $value['id']];
                            } else {
                                $val = isset($value['std']) ? $value['std'] : '';
                            }

                            $mashup_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'id' => 'mashup_var_' . $value['id'] . '_range',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $val,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => '',
                                    'return' => true,
                                ),
                            );

                            $output .= $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);

                            break;

                        case 'textarea':
                            if (isset($mashup_var_options['mashup_var_' . $value['id']])) {
                                $val = $mashup_var_options['mashup_var_' . $value['id']];
                            } else {
                                $val = isset($value['std']) ? $value['std'] : '';
                            }
                            $mashup_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'id' => 'mashup_var_' . $value['id'] . '_textarea',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $val,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => '',
                                    'return' => true,
                                ),
                            );

                            $output .= $mashup_var_html_fields->mashup_var_textarea_field($mashup_opt_array);

                            break;
                        case 'automatic_upgrade':
                            // If this is an request to upgrade theme.
                            if (isset($_GET['action']) && $_GET['action'] == 'upgrade_theme') {
                                $data = mashup_auto_upgrade_theme_and_plugins();

                                $cs_theme_upgraded_name = '';
                                if (isset($data['cs_theme_upgraded_name'])) {
                                    $cs_theme_upgraded_name = $data['cs_theme_upgraded_name'];
                                }

                                $plugins_str = '';
                                if (isset($data['cs_plugins_upgraded'])) {
                                    $cs_plugins_upgraded = $data['cs_plugins_upgraded'];
                                    $plugins_str = implode(', ', $cs_plugins_upgraded);
                                }

                                $msgStr = $cs_theme_upgraded_name;
                                if ($msgStr != '') {
                                    $msgStr .= ', ' . $plugins_str;
                                } else {
                                    $msgStr = $plugins_str;
                                }

                                if ($msgStr != '') {
                                    $message = esc_html__('Successfully installed ', 'mashup');
                                } else {
                                    $message = esc_html__('Sorry unable to upgrade theme. Contact Theme Author and repot this issue.', 'mashup');
                                }

                                $cs_counter ++;
                                $output.='<div id="' . $value['id'] . '" class="sidebar-area theme-help">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&#215;</button>
										<h4>Upgrade Theme and Plugin(s)</h4>
										<p>' . $message . '</p>
								</div>';
                                $mashup_inline_script = '
								(function($){
									$(function() {
										$(".wrap").hide();
									});
								})(jQuery);';
                                mashup_admin_inline_enqueue_script($mashup_inline_script, 'mashup-custom-functions');
                            }
                            break;
                        case 'generate_backup':

                            global $wp_filesystem;

                            $backup_url = wp_nonce_url('themes.php?page=mashup_var_settings_page');

                            if (false === ($creds = request_filesystem_credentials($backup_url, '', false, false, array()) )) {

                                return true;
                            }

                            if (!WP_Filesystem($creds)) {
                                request_filesystem_credentials($backup_url, '', true, false, array());
                                return true;
                            }

                            $mashup_var_upload_dir = get_template_directory() . '/include/backend/cs-theme-options/backups/';

                            $mashup_var_upload_dir_path = get_template_directory_uri() . '/include/backend/cs-theme-options/backups/';

                            $mashup_var_all_list = $wp_filesystem->dirlist($mashup_var_upload_dir);

                            $output .= '<div class="backup_generates_area" data-ajaxurl="' . esc_url(admin_url('admin-ajax.php')) . '">';
                            $mashup_var_import_options = mashup_var_theme_text_srt('mashup_var_import_options');
                            $output .= '
							<div class="cs-import-help">
								<h4>' . $mashup_var_import_options . '</h4>
							</div>';

                            $output .= '<div class="external_backup_areas">';
                            $mashup_var_location_and_hit_import_button = mashup_var_theme_text_srt('mashup_var_location_and_hit_import_button');
                            $output .= '<p>' . $mashup_var_location_and_hit_import_button . '</p>';

                            $mashup_opt_array = array(
                                'std' => '',
                                'cust_id' => 'bkup_import_url',
                                'cust_name' => 'bkup_import_url',
                                'return' => true,
                            );
                            $output .= $mashup_var_form_fields->mashup_var_form_text_render($mashup_opt_array);

                            $mashup_opt_array = array(
                                'std' => mashup_var_theme_text_srt('mashup_var_import'),
                                'cust_id' => 'cs-backup-url-restore',
                                'cust_name' => 'cs-backup-url-restore',
                                'cust_type' => 'button',
                                'return' => true,
                            );
                            $output .= $mashup_var_form_fields->mashup_var_form_text_render($mashup_opt_array);

                            $output .= '</div>';
                            $mashup_var_export_options = mashup_var_theme_text_srt('mashup_var_export_options');
                            $output .= '
							<div class="cs-import-help">
								<h4>' . $mashup_var_export_options . '</h4>
							</div>';

                            if (is_array($mashup_var_all_list) && sizeof($mashup_var_all_list) > 0) {

                                $output .= '<p>' . mashup_var_theme_text_srt('mashup_var_download_backups_hint') . '</p>';

                                $output .= '<select onchange="mashup_var_set_filename(this.value, \'' . esc_url($mashup_var_upload_dir_path) . '\')">';

                                $mashup_var_list_count = 1;
                                foreach ($mashup_var_all_list as $file_key => $file_val) {

                                    if (isset($file_val['name'])) {

                                        $mashup_var_slected = sizeof($mashup_var_all_list) == $mashup_var_list_count ? ' selected="selected"' : '';
                                        $output .= '<option' . $mashup_var_slected . '>' . $file_val['name'] . '</option>';
                                    }
                                    $mashup_var_list_count ++;
                                }
                                $output .= '</select>';
                                $output .= '<div class="backup_action_btns">';

                                if (isset($file_val['name'])) {

                                    $mashup_opt_array = array(
                                        'std' => mashup_var_theme_text_srt('mashup_var_restore'),
                                        'cust_id' => 'cs-backup-restore',
                                        'cust_name' => 'cs-backup-restore',
                                        'cust_type' => 'button',
                                        'extra_atr' => 'data-file="' . $file_val['name'] . '"',
                                        'return' => true,
                                    );
                                    $output .= $mashup_var_form_fields->mashup_var_form_text_render($mashup_opt_array);
                                    $mashup_var_download = mashup_var_theme_text_srt('mashup_var_download');
                                    $output .= '<a download="' . $file_val['name'] . '" href="' . esc_url($mashup_var_upload_dir_path . $file_val['name']) . '">' . $mashup_var_download . '</a>';

                                    $mashup_opt_array = array(
                                        'std' => mashup_var_theme_text_srt('mashup_var_delete'),
                                        'cust_id' => 'cs-backup-delte',
                                        'cust_name' => 'cs-backup-delte',
                                        'cust_type' => 'button',
                                        'extra_atr' => 'data-file="' . $file_val['name'] . '"',
                                        'return' => true,
                                    );
                                    $output .= $mashup_var_form_fields->mashup_var_form_text_render($mashup_opt_array);
                                }

                                $output .= '</div>';
                            }

                            $mashup_opt_array = array(
                                'std' => mashup_var_theme_text_srt('mashup_var_generate_backup'),
                                'cust_id' => 'cs-backup-generte',
                                'cust_name' => 'cs-backup-generte',
                                'cust_type' => 'button',
                                'extra_atr' => 'onclick="javascript:mashup_var_backup_generate(\'' . esc_js(admin_url('admin-ajax.php')) . '\');"',
                                'return' => true,
                            );
                            $output .= $mashup_var_form_fields->mashup_var_form_text_render($mashup_opt_array);

                            $output .= '</div>';

                            break;



                        case "banner_fields":
                            $mashup_var_rand_id = rand(23789, 534578930);
                            if (isset($mashup_var_options) && $mashup_var_options <> '') {
                                if (!isset($mashup_var_options['mashup_var_banner_title'])) {
                                    $network_list = '';
                                    $display = 'none';
                                } else {

                                    $network_list = isset($mashup_var_options['mashup_var_banner_title']) ? $mashup_var_options['mashup_var_banner_title'] : '';
                                    $banner_style = isset($mashup_var_options['mashup_var_banner_style']) ? $mashup_var_options['mashup_var_banner_style'] : '';
                                    $banner_type = isset($mashup_var_options['mashup_var_banner_type']) ? $mashup_var_options['mashup_var_banner_type'] : '';
                                    $banner_image = isset($mashup_var_options['mashup_var_banner_image_array']) ? $mashup_var_options['mashup_var_banner_image_array'] : '';
                                    $banner_field_url = isset($mashup_var_options['mashup_var_banner_field_url']) ? $mashup_var_options['mashup_var_banner_field_url'] : '';
                                    $banner_target = isset($mashup_var_options['mashup_var_banner_target']) ? $mashup_var_options['mashup_var_banner_target'] : '';
                                    $adsense_code = isset($mashup_var_options['mashup_var_adsense_code']) ? $mashup_var_options['mashup_var_adsense_code'] : '';
                                    $code_no = isset($mashup_var_options['mashup_var_banner_field_code_no']) ? $mashup_var_options['mashup_var_banner_field_code_no'] : '';

                                    $display = 'block';
                                }
                            } else {
                                $val = isset($mashup_var_options['options']) ? $value['options'] : '';
                                $std = isset($mashup_var_options['id']) ? $value['id'] : '';
                                $display = 'block';
                                $network_list = isset($mashup_var_options['mashup_var_banner_title']) ? $mashup_var_options['mashup_var_banner_title'] : '';
                                $banner_style = isset($mashup_var_options['mashup_var_banner_style']) ? $mashup_var_options['mashup_var_banner_style'] : '';
                                $banner_type = isset($mashup_var_options['mashup_var_banner_type']) ? $mashup_var_options['mashup_var_banner_type'] : '';
                                $banner_image = isset($mashup_var_options['mashup_var_banner_image_array']) ? $mashup_var_options['mashup_var_banner_image_array'] : '';
                                $banner_field_url = isset($mashup_var_options['mashup_var_banner_field_url']) ? $mashup_var_options['mashup_var_banner_field_url'] : '';
                                $banner_target = isset($mashup_var_options['mashup_var_banner_target']) ? $mashup_var_options['mashup_var_banner_target'] : '';
                                $adsense_code = isset($mashup_var_options['mashup_var_adsense_code']) ? $mashup_var_options['mashup_var_adsense_code'] : '';
                                $code_no = isset($mashup_var_options['mashup_var_banner_field_code_no']) ? $mashup_var_options['mashup_var_banner_field_code_no'] : '';
                            }
                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt('mashup_var_title_field'),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt('mashup_var_banner_title_field_hint'),
                                'field_params' => array(
                                    'std' => '',
                                    'cust_id' => 'banner_title_input',
                                    'cust_name' => 'banner_title_input',
                                    'classes' => '',
                                    'return' => true,
                                ),
                            );
                            $output .= $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);


                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt('mashup_var_banner_style'),
                                'hint_text' => mashup_var_theme_text_srt('mashup_var_banner_style_hint'),
                                'field_params' => array(
                                    'std' => '',
                                    'desc' => '',
                                    'cust_id' => "banner_style_input",
                                    'cust_name' => 'banner_style_input',
                                    'classes' => 'input-small chosen-select',
                                    'options' =>
                                    array(
                                        'top_banner' => mashup_var_theme_text_srt('mashup_var_banner_type_top'),
                                        'bottom_banner' => mashup_var_theme_text_srt('mashup_var_banner_type_bottom'),
                                        'sidebar_banner' => mashup_var_theme_text_srt('mashup_var_banner_type_sidebar'),
                                        'vertical_banner' => mashup_var_theme_text_srt('mashup_var_banner_type_vertical'),
                                    ),
                                    'return' => true,
                                ),
                            );
                            $output .= $mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);




                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt('mashup_var_banner_type'),
                                'hint_text' => mashup_var_theme_text_srt('mashup_var_banner_type_hint'),
                                'field_params' => array(
                                    'std' => '',
                                    'desc' => '',
                                    'cust_id' => "banner_type_input",
                                    'cust_name' => 'banner_type_input',
                                    'classes' => 'input-small chosen-select',
                                    'extra_atr' => 'onchange="javascript:mashup_var_banner_type_toggle(this.value , \'' . $mashup_var_rand_id . '\')"',
                                    'options' =>
                                    array(
                                        'image' => mashup_var_theme_text_srt('mashup_var_banner_image'),
                                        'code' => mashup_var_theme_text_srt('mashup_var_banner_code'),
                                    ),
                                    'return' => true,
                                ),
                            );
                            $output .= $mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);


                            $output .='<div id="ads_image' . absint($mashup_var_rand_id) . '">';

                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt('mashup_var_banner_image'),
                                'id' => 'banner_field_image',
                                'std' => '',
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt('mashup_var_banner_image_hint'),
                                'prefix' => '',
                                'field_params' => array(
                                    'std' => '',
                                    'id' => 'banner_field_image',
                                    'prefix' => '',
                                    'return' => true,
                                ),
                            );

                            $output .= $mashup_var_html_fields->mashup_var_upload_file_field($mashup_opt_array);
                            $output .='</div>';

                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt('mashup_var_url_field'),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt('mashup_var_url_hint'),
                                'field_params' => array(
                                    'std' => '',
                                    'cust_id' => 'banner_field_url_input',
                                    'cust_name' => 'banner_field_url_input',
                                    'classes' => '',
                                    'return' => true,
                                ),
                            );
                            $output .= $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);




                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt('mashup_var_banner_target'),
                                'hint_text' => mashup_var_theme_text_srt('mashup_var_banner_target_hint'),
                                'field_params' => array(
                                    'std' => '',
                                    'desc' => '',
                                    'cust_id' => "banner_target_input",
                                    'cust_name' => 'banner_target_input',
                                    'classes' => 'input-small chosen-select',
                                    'options' =>
                                    array(
                                        '_self' => mashup_var_theme_text_srt('mashup_var_banner_target_self'),
                                        '_blank' => mashup_var_theme_text_srt('mashup_var_banner_target_blank'),
                                    ),
                                    'return' => true,
                                ),
                            );
                            $output .= $mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);

                            $output .='<div id="ads_code' . absint($mashup_var_rand_id) . '" style="display:none">';
                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt('mashup_var_banner_ad_sense_code'),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt('mashup_var_banner_ad_sense_code_hint'),
                                'field_params' => array(
                                    'std' => '',
                                    'cust_id' => 'adsense_code_input',
                                    'cust_name' => 'adsense_code_input[]',
                                    'classes' => '',
                                    'return' => true,
                                ),
                            );
                            $output .= $mashup_var_html_fields->mashup_var_textarea_field($mashup_opt_array);

                            $output .='</div>';

                            $mashup_opt_array = array(
                                'name' => '&nbsp;',
                                'desc' => '',
                                'hint_text' => '',
                                'field_params' => array(
                                    'std' => mashup_var_theme_text_srt('mashup_var_add'),
                                    'id' => 'mashup_var_add_banner',
                                    'classes' => '',
                                    'cust_type' => 'button',
                                    'extra_atr' => 'onclick="javascript:mashup_var_add_banner(\'' . admin_url("admin-ajax.php") . '\')"',
                                    'return' => true,
                                ),
                            );

                            $output .= $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);

                            $output .= '
							<div class="social-area" style="display:' . $display . '">
							<div class="theme-help">
							  <h4 style="padding-bottom:0px;">' . mashup_var_theme_text_srt('mashup_var_banner_already_added') . '</h4>
							  <div class="clear"></div>
							</div>
							<div class="boxes">
							<table class="to-table" border="0" cellspacing="0">
								<thead>
								  <tr>
                                                                  
                                                                        <th>' . mashup_var_theme_text_srt('mashup_var_banner_table_title') . '</th>
									<th>' . mashup_var_theme_text_srt('mashup_var_banner_table_style') . '</th>
									<th>' . mashup_var_theme_text_srt('mashup_var_banner_table_image') . '</th>

									<th>' . mashup_var_theme_text_srt('mashup_var_banner_table_clicks') . '</th>
									<th>' . mashup_var_theme_text_srt('mashup_var_banner_table_shortcode') . '</th>
									<th class="centr">' . mashup_var_theme_text_srt('mashup_var_actions') . '</th>
								  </tr>
								</thead>
								<tbody id="banner_area">';
                            $i = 0;
                            if (is_array($network_list)) {
                                foreach ($network_list as $network) {
                                    if (isset($network_list[$i]) || isset($network_list[$i])) {

                                        $mashup_rand_num = rand(123456, 987654);
                                        $output .= '<tr id="del_' . $mashup_rand_num . '">';

                                        $output .= '<td>' . esc_html($network_list[$i]) . '</td>';
                                        $output .= '<td>' . esc_html($banner_style[$i]) . '</td>';
                                        if (isset($banner_image[$i]) && !empty($banner_image[$i]) && $banner_type[$i] == 'image') {
                                            $output .= '<td><img src="' . esc_url($banner_image[$i]) . '" alt="" width="100" /></td>';
                                        } else {
                                            $output .= '<td>' . mashup_var_theme_text_srt('mashup_var_custom_code') . '</td>';
                                        }

                                        if ($banner_type[$i] == 'image') {
                                            $banner_click_count = get_option("banner_clicks_" . $code_no[$i]);
                                            $banner_click_count = $banner_click_count <> '' ? $banner_click_count : '0';
                                            $output .= '<td>' . $banner_click_count . '</td>';
                                        } else {
                                            $output .= '<td>&nbsp;</td>';
                                        }

                                        $output .= '<td>[mashup_ads id="' . $code_no[$i] . '"]</td>';
                                        $output .= '
                                          <td class="centr">
                                          <a class="remove-btn" onclick="javascript:return confirm(\'' . mashup_var_theme_text_srt('mashup_var_alert_msg') . '\')" href="javascript:ads_del(\'' . $mashup_rand_num . '\')" data-toggle="tooltip" data-placement="top" title="' . mashup_var_theme_text_srt('mashup_var_remove') . '">
                                          <i class="icon-cancel"></i></a>
                                          <a href="javascript:mashup_var_toggle(\'' . absint($mashup_rand_num) . '\')" data-toggle="tooltip" data-placement="top" title="' . mashup_var_theme_text_srt('mashup_var_edit') . '">
                                          <i class="icon-mode_edit"></i>
                                          </a>
                                          </td>
                                          </tr>';

                                        $output .= '
                                          <tr id="' . absint($mashup_rand_num) . '" style="display:none">
                                          <td colspan="3">
                                          <div class="form-elements">
                                          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
                                          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                          <a class="cs-remove-btn" onclick="mashup_var_toggle(\'' . $mashup_rand_num . '\')"><i class="icon-cancel"></i></a>
                                          </div>
                                          </div>';

                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt('mashup_var_title_field'),
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt('mashup_var_banner_title_field_hint'),
                                            'field_params' => array(
                                                'std' => isset($network_list[$i]) ? $network_list[$i] : '',
                                                'cust_id' => 'banner_title',
                                                'cust_name' => 'mashup_var_banner_title[]',
                                                'classes' => '',
                                                'return' => true,
                                            ),
                                        );
                                        $output .= $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);


                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt('mashup_var_banner_style'),
                                            'hint_text' => mashup_var_theme_text_srt('mashup_var_banner_style_hint'),
                                            'field_params' => array(
                                                'std' => isset($banner_style[$i]) ? $banner_style[$i] : '',
                                                'cust_id' => 'banner_style',
                                                'cust_name' => 'mashup_var_banner_style[]',
                                                'desc' => '',
                                                'classes' => 'input-small chosen-select',
                                                'options' =>
                                                array(
                                                    'top_banner' => mashup_var_theme_text_srt('mashup_var_banner_type_top'),
                                                    'bottom_banner' => mashup_var_theme_text_srt('mashup_var_banner_type_bottom'),
                                                    'sidebar_banner' => mashup_var_theme_text_srt('mashup_var_banner_type_sidebar'),
                                                    'vertical_banner' => mashup_var_theme_text_srt('mashup_var_banner_type_vertical'),
                                                ),
                                                'return' => true,
                                            ),
                                        );
                                        $output .= $mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);




                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt('mashup_var_banner_type'),
                                            'hint_text' => mashup_var_theme_text_srt('mashup_var_banner_type_hint'),
                                            'field_params' => array(
                                                'std' => isset($banner_type[$i]) ? $banner_type[$i] : '',
                                                'cust_id' => 'banner_type',
                                                'cust_name' => 'mashup_var_banner_type[]',
                                                'desc' => '',
                                                'extra_atr' => 'onchange="javascript:mashup_var_banner_type_toggle(this.value , \'' . $mashup_rand_num . '\')"',
                                                'classes' => 'input-small chosen-select',
                                                'options' =>
                                                array(
                                                    'image' => mashup_var_theme_text_srt('mashup_var_banner_image'),
                                                    'code' => mashup_var_theme_text_srt('mashup_var_banner_code'),
                                                ),
                                                'return' => true,
                                            ),
                                        );
                                        $output .= $mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);

                                        $display_ads = 'none';
                                        if ($banner_type[$i] == 'image') {
                                            $display_ads = 'block';
                                        } elseif ($banner_type[$i] == 'code') {
                                            $display_ads = 'none';
                                        }
                                        $output .='<div id="ads_image' . absint($mashup_rand_num) . '" style="display:' . esc_html($display_ads) . '">';

                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt('mashup_var_banner_image'),
                                            'id' => 'banner_image',
                                            'std' => isset($banner_image[$i]) ? $banner_image[$i] : '',
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt('mashup_var_banner_image_hint'),
                                            'prefix' => '',
                                            'array' => true,
                                            'field_params' => array(
                                                'std' => isset($banner_image[$i]) ? $banner_image[$i] : '',
                                                'id' => 'banner_image',
                                                'prefix' => '',
                                                'array' => true,
                                                'return' => true,
                                            ),
                                        );

                                        $output .= $mashup_var_html_fields->mashup_var_upload_file_field($mashup_opt_array);
                                        $output .='</div>';


                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt('mashup_var_url_field'),
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt('mashup_var_url_hint'),
                                            'field_params' => array(
                                                'std' => isset($banner_field_url[$i]) ? $banner_field_url[$i] : '',
                                                'cust_id' => 'banner_field_url',
                                                'cust_name' => 'mashup_var_banner_field_url[]',
                                                'classes' => '',
                                                'return' => true,
                                            ),
                                        );
                                        $output .= $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);


                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt('mashup_var_banner_target'),
                                            'hint_text' => mashup_var_theme_text_srt('mashup_var_banner_target_hint'),
                                            'field_params' => array(
                                                'desc' => '',
                                                'std' => isset($banner_target[$i]) ? $banner_target[$i] : '',
                                                'cust_id' => 'banner_target',
                                                'cust_name' => 'mashup_var_banner_target[]',
                                                'classes' => 'input-small chosen-select',
                                                'options' =>
                                                array(
                                                    '_self' => mashup_var_theme_text_srt('mashup_var_banner_target_self'),
                                                    '_blank' => mashup_var_theme_text_srt('mashup_var_banner_target_blank'),
                                                ),
                                                'return' => true,
                                            ),
                                        );
                                        $output .= $mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);
                                        $display_ads = 'none';
                                        if ($banner_type[$i] == 'image') {
                                            $display_ads = 'none';
                                        } elseif ($banner_type[$i] == 'code') {
                                            $display_ads = 'block';
                                        }
                                        $output .='<div id="ads_code' . absint($mashup_rand_num) . '" style="display:' . esc_html($display_ads) . '">';
                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt('mashup_var_banner_ad_sense_code'),
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt('mashup_var_banner_ad_sense_code_hint'),
                                            'field_params' => array(
                                                'std' => isset($adsense_code[$i]) ? $adsense_code[$i] : '',
                                                'cust_id' => 'adsense_code',
                                                'cust_name' => 'mashup_var_adsense_code[]',
                                                'classes' => '',
                                                'return' => true,
                                            ),
                                        );
                                        $output .= $mashup_var_html_fields->mashup_var_textarea_field($mashup_opt_array);
                                        $output .='</div>';

                                        $mashup_opt_array = array(
                                            'std' => isset($code_no[$i]) ? $code_no[$i] : '',
                                            'id' => 'banner_field_code_no',
                                            'cust_name' => 'mashup_var_banner_field_code_no[]',
                                            'return' => true,
                                        );
                                        $output .= $mashup_var_form_fields->mashup_var_form_hidden_render($mashup_opt_array);

                                        $output .= '
										  </td>
										</tr>';
                                    }
                                    $i ++;
                                }
                            }

                            $output .= '</tbody></table></div></div>';
                            break;


                        case 'widgets_backup':

                            $output .= '<div class="backup_generates_area" data-ajaxurl="' . esc_url(admin_url('admin-ajax.php')) . '">';
                            if (class_exists('mashup_var_widget_data')) {

                                global $wp_filesystem;

                                $backup_url = wp_nonce_url('themes.php?page=mashup_var_settings_page');

                                if (false === ($creds = request_filesystem_credentials($backup_url, '', false, false, array()) )) {

                                    return true;
                                }

                                if (!WP_Filesystem($creds)) {
                                    request_filesystem_credentials($backup_url, '', true, false, array());
                                    return true;
                                }

                                $mashup_var_upload_dir = get_template_directory() . '/include/backend/cs-widgets/import/widgets-backup/';

                                $mashup_var_upload_dir_path = get_template_directory_uri() . '/include/backend/cs-widgets/import/widgets-backup/';

                                $mashup_var_all_list = $wp_filesystem->dirlist($mashup_var_upload_dir);
                                $mashup_var_import_widgets = mashup_var_theme_text_srt('mashup_var_import_widgets');
                                $output .= '
                                            <div class="cs-import-help">
                                                    <h4>' . $mashup_var_import_widgets . '</h4>
                                            </div>';

                                $output .= '
                                            <div class="external_backup_areas">
                                                    <div id="cs-import-widgets-con">
                                                            <div id="cs-import-widget-loader"></div>
                                                            ' . mashup_var_widget_data::import_settings_page() . '
                                                    </div>
                                            </div>';

                                if (is_array($mashup_var_all_list) && sizeof($mashup_var_all_list) > 0) {
                                    $mashup_var_download_backups_hint = mashup_var_theme_text_srt('mashup_var_download_backups_hint');
                                    $output .= '<p>' . $mashup_var_download_backups_hint . '</p>';

                                    $output .= '<select id="cs-wid-backup-change" onchange="mashup_var_set_filename(this.value, \'' . esc_url($mashup_var_upload_dir_path) . '\')">';

                                    $mashup_var_list_count = 1;
                                    foreach ($mashup_var_all_list as $file_key => $file_val) {

                                        if (isset($file_val['name'])) {

                                            $mashup_var_slected = sizeof($mashup_var_all_list) == $mashup_var_list_count ? ' selected="selected"' : '';
                                            $output .= '<option' . $mashup_var_slected . '>' . $file_val['name'] . '</option>';
                                        }
                                        $mashup_var_list_count ++;
                                    }
                                    $output .= '</select>';
                                    $output .= '<div class="backup_action_btns">';

                                    if (isset($file_val['name'])) {

                                        $mashup_opt_array = array(
                                            'std' => mashup_var_theme_text_srt('mashup_var_show_widget_settings'),
                                            'cust_id' => 'cs-wid-backup-restore',
                                            'cust_name' => 'cs-wid-backup-restore',
                                            'cust_type' => 'button',
                                            'extra_atr' => 'data-path="' . $mashup_var_upload_dir_path . '" data-file="' . $file_val['name'] . '"',
                                            'return' => true,
                                        );
                                        $output .= $mashup_var_form_fields->mashup_var_form_text_render($mashup_opt_array);
                                        $mashup_var_download = mashup_var_theme_text_srt('mashup_var_download');
                                        $output .= '<a download="' . $file_val['name'] . '" href="' . esc_url($mashup_var_upload_dir_path . $file_val['name']) . '">' . $mashup_var_download . '</a>';

                                        $mashup_opt_array = array(
                                            'std' => mashup_var_theme_text_srt('mashup_var_delete'),
                                            'cust_id' => 'cs-wid-backup-delte',
                                            'cust_name' => 'cs-wid-backup-delte',
                                            'cust_type' => 'button',
                                            'extra_atr' => 'data-file="' . $file_val['name'] . '"',
                                            'return' => true,
                                        );
                                        $output .= $mashup_var_form_fields->mashup_var_form_text_render($mashup_opt_array);
                                    }

                                    $output .= '</div>';
                                }
                                $output .= '
                                            <div class="cs-import-help">
                                                    <h4>' . mashup_var_theme_text_srt('mashup_var_export_widgets') . '</h4>
                                            </div>';

                                $output .= '
                                            <div id="cs-export-widgets-con">
                                                    <div id="cs-export-widget-loader"></div>
                                                    ' . mashup_var_widget_data::export_settings_page() . '
                                            </div>';
                            }

                            $output .= '</div>';

                            break;

                        case "layout":
                            global $mashup_var_header_colors;

                            if (isset($mashup_var_options['mashup_var_' . $value['id']])) {
                                $select_value = $mashup_var_options['mashup_var_' . $value['id']];
                            } else {
                                $select_value = isset($value['std']) ? $value['std'] : '';
                            }

                            if (isset($value['id'])) {

                                $mashup_name = 'mashup_var_' . $value['id'];

                                $mashup_opt_array = array(
                                    'name' => isset($value['name']) ? $value['name'] : '',
                                    'id' => $mashup_name . '_layout',
                                    'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                );
                                $output .= $mashup_var_html_fields->mashup_var_opening_field($mashup_opt_array);

                                if (is_array($value['options']) && sizeof($value['options']) > 0) {
                                    $output .= '
									<div class="input-sec">
										<div class="meta-input pattern">';
                                    foreach ($value['options'] as $key => $option) {
                                        $checked = '';
                                        $custom_class = '';
                                        if ($select_value != '') {

                                            if ($select_value == $key) {
                                                $checked = ' checked';
                                                $custom_class = 'check-list';
                                            }
                                        } else {
                                            if ($value['std'] == $key) {
                                                $checked = ' checked';
                                                $custom_class = 'check-list';
                                            }
                                        }

                                        $mashup_rand_id = rand(123456, 987654);

                                        $output .= '
												<div class="radio-image-wrapper">';
                                        $mashup_opt_array = array(
                                            'std' => esc_html($key),
                                            'cust_id' => $mashup_name . $mashup_rand_id,
                                            'cust_name' => $mashup_name,
                                            'cust_type' => 'radio',
                                            'classes' => 'radio',
                                            'extra_atr' => 'onclick="select_bg(\'' . $mashup_name . '\',\'' . esc_html($key) . '\',\'' . get_template_directory_uri() . '\',\'\')" ' . $checked,
                                            'return' => true,
                                        );
                                        $output .= $mashup_var_form_fields->mashup_var_form_text_render($mashup_opt_array);
                                        $output .= '
                                                    <label for="radio_' . esc_html($key) . '"> 
                                                            <span class="ss"><img src="' . get_template_directory_uri() . '/assets/backend/images/' . esc_html($key) . '.png" /></span> 
                                                            <span class="' . sanitize_html_class($custom_class) . '" id="check-list">&nbsp;</span>
                                                    </label>
                                                    <span class="title-theme">' . esc_attr($option) . '</span>            
                                            </div>';
                                    }
                                    $output .= '
                                                </div>
                                        </div>';
                                }
                                $output .= $mashup_var_html_fields->mashup_var_closing_field(array());
                            }
                            break;

                        case "horizontal_tab":
                            if (isset($mashup_var_options['mashup_var_layout']) && $mashup_var_options['mashup_var_layout'] <> 'boxed') {
                                echo '
                                        <style type="text/css" scoped>
                                                .horizontal_tabs,.main_tab{
                                                        display:none;
                                                }
                                        </style>';
                            }
                            $output .= '<div class="horizontal_tabs"><ul>';
                            $i = 0;
                            if (is_array($value['options']) && sizeof($value['options']) > 0) {
                                foreach ($value['options'] as $key => $val) {
                                    $active = ($i == 0) ? 'active' : '';
                                    $output .= '<li class="' . sanitize_html_class($val) . ' ' . $active . '"><a href="#' . $val . '" onclick="show_hide(this.hash);return false;">' . esc_html($key) . '</a></li>';
                                    $i ++;
                                }
                            }
                            $output .= '</ul></div>';

                            break;

                        case "layout_body":
                            global $mashup_var_header_colors;
                            $bg_counter = 0;
                            if (isset($mashup_var_options['mashup_var_' . $value['id']])) {
                                $select_value = $mashup_var_options['mashup_var_' . $value['id']];
                            } else {
                                $select_value = isset($value['std']) ? $value['std'] : '';
                            }

                            if ($value['path'] == "background") {
                                $image_name = "background";
                            } else {
                                $image_name = "pattern";
                            }

                            if (isset($value['id'])) {

                                $mashup_name = 'mashup_var_' . $value['id'];

                                $output .= '
                                        <div class="main_tab">
                                                <div class="horizontal_tab" style="display:' . $value['display'] . '" id="' . $value['tab'] . '">';

                                $mashup_opt_array = array(
                                    'name' => isset($value['name']) ? $value['name'] : '',
                                    'id' => $mashup_name . '_layout_body',
                                    'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                );
                                $output .= $mashup_var_html_fields->mashup_var_opening_field($mashup_opt_array);

                                $output .= '
                                        <div class="input-sec">
                                                <div class="meta-input pattern">';
                                if (is_array($value['options']) && sizeof($value['options']) > 0) {
                                    foreach ($value['options'] as $key => $option) {
                                        $checked = '';
                                        $custom_class = '';
                                        if ($select_value == $option) {
                                            $checked = ' checked';
                                            $custom_class = 'check-list';
                                        }

                                        $mashup_rand_id = rand(123456, 987654);

                                        $output .= '
                                                <div class="radio-image-wrapper">';
                                        $mashup_opt_array = array(
                                            'std' => $option,
                                            'cust_id' => $mashup_name . $mashup_rand_id,
                                            'cust_name' => $mashup_name,
                                            'cust_type' => 'radio',
                                            'classes' => 'radio',
                                            'extra_atr' => 'onClick="javascript:select_bg(\'' . $mashup_name . '\',\'' . $option . '\',\'' . get_template_directory_uri() . '\',\'\')" ' . $checked,
                                            'return' => true,
                                        );
                                        $output .= $mashup_var_form_fields->mashup_var_form_text_render($mashup_opt_array);
                                        $output .= '
														<label for="radio_' . esc_html($key) . '"> 
															<span class="ss"><img src="' . get_template_directory_uri() . '/assets/backend/images/' . $value['path'] . '/' . $image_name . $bg_counter . '.png" /></span> 
															<span id="check-list" class="' . sanitize_html_class($custom_class) . '">&nbsp;</span>
														</label>
													</div>';
                                        $bg_counter ++;
                                    }
                                }
                                $output .= '
											</div>
										</div>
									</div>
								</div>';
                                $output .= $mashup_var_html_fields->mashup_var_closing_field(array());
                            }
                            break;

                        case 'select':
                            if (isset($mashup_var_options['mashup_var_' . $value['id']])) {
                                $select_value = $mashup_var_options['mashup_var_' . $value['id']];
                            } else {
                                $select_value = isset($value['std']) ? $value['std'] : '';
                            }
                            $display = isset($value['display']) ? $value['display'] : '';
                            $tab = isset($value['tab']) ? $value['tab'] : '';
                            if ($tab == 'custom_image_position') {
                                $output .= '
                                        <div class="main_tab">
                                                <div class="horizontal_tab" style="display:' . $display . '" id="' . $tab . '">';
                            }
                            $mashup_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $select_value,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => isset($value['classes']) ? $value['classes'] : '',
                                    'extra_atr' => isset($value['extra_att']) ? $value['extra_att'] : '',
                                    'return' => true,
                                    'options' => isset($value['options']) ? $value['options'] : '',
                                ),
                            );
                            $output .= $mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);
                            if ($tab == 'custom_image_position') {
                                $output .= '
                                                </div>
                                            </div>';
                            }
                            break;

                        case 'gfont_select':

                            if (isset($mashup_var_options['mashup_var_' . $value['id']])) {
                                $select_value = $mashup_var_options['mashup_var_' . $value['id']];
                            } else {
                                $select_value = isset($value['std']) ? $value['std'] : '';
                            }

                            $output .= '
                                        <div class="sidebar-area theme-help ">
                                                <h4><b>' . esc_attr($value['name']) . '</b>';
                            $output .= mashup_var_tooltip_helptext($value['hint_text']);
                            $output .= '   </h4></div>';

                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt('mashup_var_font_family'),
                                'id' => isset($value['id']) ? 'mashup_var_' . $value['id'] . '_select' : '',
                                'extra_att' => 'style="width:50%; display:inline-block;"',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $select_value,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => isset($value['classes']) ? $value['classes'] : '',
                                    'return' => true,
                                    'extra_atr' => 'onchange="mashup_var_google_font_att(\'' . admin_url("admin-ajax.php") . '\',this.value, \'mashup_var_' . $value['id'] . '_att\')"',
                                    'first_option' => '<option value="">' . mashup_var_theme_text_srt('mashup_var_default_font') . '</option>',
                                    'options' => isset($value['options']) ? $value['options'] : '',
                                ),
                            );
                            $output .= $mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);

                            break;
                        case 'mailchimp':


                            if (isset($mashup_var_options) && $mashup_var_options <> '') {
                                if (isset($mashup_var_options['mashup_var_' . $value['id']])) {
                                    $select_value = $mashup_var_options['mashup_var_' . $value['id']];
                                }
                            } else {
                                $select_value = $value['std'];
                            }

                            $output .= '';



                            $output_str = '';
                            foreach ($value['options'] as $option_key => $option) {
                                $selected = '';
                                if ($select_value != '') {
                                    if ($select_value == $option_key) {
                                        $selected = ' selected="selected"';
                                    }
                                } else {
                                    if (isset($value['std']))
                                        if ($value['std'] == $option_key) {
                                            $selected = ' selected="selected"';
                                        }
                                }
                                $output_str .= '<option' . $selected . ' value="' . $option_key . '">';
                                $output_str .= $option;
                                $output_str .= '</option>';
                            }
                            $mashup_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'id' => isset($value['id']) ? 'mashup_var_' . $value['id'] . '_select' : '',
                                'extra_att' => '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $select_value,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => isset($value['classes']) ? $value['classes'] : '',
                                    'return' => true,
                                    'first_option' => '<option value="">' . mashup_var_theme_text_srt('mashup_var_select_attribute') . '</option>',
                                    'options' => isset($output_str) ? $output_str : '',
                                    'options_markup' => true,
                                ),
                            );
                            $output .= $mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);





                            $output .= '';

                            break;
                        case 'gfont_att_select':

                            if (isset($mashup_var_options['mashup_var_' . $value['id']]) && $mashup_var_options['mashup_var_' . $value['id']] <> '') {
                                $select_value = $mashup_var_options['mashup_var_' . $value['id']];
                                $value['options'] = mashup_var_get_google_font_attribute('', $mashup_var_options[str_replace('_att', '', 'mashup_var_' . $value['id'])]);
                            } else {
                                $select_value = isset($value['std']) ? $value['std'] : '';
                            }

                            $mashup_atts_array = array();
                            if (isset($value['options']) && is_array($mashup_atts_array)) {
                                foreach ($value['options'] as $mashup_att)
                                    $mashup_atts_array[$mashup_att] = $mashup_att;
                            }
                            $mashup_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'id' => isset($value['id']) ? 'mashup_var_' . $value['id'] . '_select' : '',
                                'extra_att' => 'style="width:50%; display:inline-block;"',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $select_value,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => isset($value['classes']) ? $value['classes'] : '',
                                    'return' => true,
                                    'first_option' => '<option value="">' . mashup_var_theme_text_srt('mashup_var_select_attribute') . '</option>',
                                    'options' => isset($mashup_atts_array) ? $mashup_atts_array : '',
                                ),
                            );
                            $output .= $mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);

                            break;

                        case 'select_ftext':

                            if (isset($mashup_var_options['mashup_var_' . $value['id']])) {
                                $select_value = $mashup_var_options['mashup_var_' . $value['id']];
                            } else {
                                $select_value = isset($value['std']) ? $value['std'] : '';
                            }

                            $mashup_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'id' => isset($value['id']) ? 'mashup_var_' . $value['id'] . '_select' : '',
                                'extra_att' => 'style="width:50%; display:inline-block;"',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $select_value,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => isset($value['classes']) ? $value['classes'] : '',
                                    'return' => true,
                                    'options' => isset($value['options']) ? $value['options'] : '',
                                ),
                            );
                            $output .= $mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);

                            break;

                        case 'default_header':
                            if (isset($mashup_var_options['mashup_var_' . $value['id']])) {
                                $select_value = $mashup_var_options['mashup_var_' . $value['id']];
                            } else {
                                $select_value = isset($value['std']) ? $value['std'] : '';
                            }

                            $mashup_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'id' => isset($value['id']) ? 'mashup_var_' . $value['id'] . '_header' : '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $select_value,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => isset($value['classes']) ? $value['classes'] : '',
                                    'return' => true,
                                    'extra_atr' => 'onchange="javascript:mashup_var_show_slider(this.value)"',
                                    'options' => isset($value['options']) ? $value['options'] : '',
                                ),
                            );
                            $output .= $mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);

                            break;

                        case 'select_sidebar' :

                            if (isset($mashup_var_options['mashup_var_' . $value['id']])) {
                                $select_value = $mashup_var_options['mashup_var_' . $value['id']];
                            } else {
                                $select_value = isset($value['std']) ? $value['std'] : '';
                            }

                            $mashup_options_markup = '<option value="">' . mashup_var_theme_text_srt('mashup_var_sidebar') . '</option>';

                            if (is_array($value['options']['sidebar']) && sizeof($value['options']['sidebar']) > 0) {
                                foreach ($value['options']['sidebar'] as $option) {

                                    $key = sanitize_title($option);
                                    $selected = '';
                                    if ($select_value != '') {
                                        if ($select_value == $key) {
                                            $selected = ' selected="selected"';
                                        }
                                    }
                                    $mashup_options_markup .= '<option value="' . $key . '"' . $selected . '>' . $option . '</option>';
                                }
                            }

                            $mashup_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $select_value,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => isset($value['classes']) ? $value['classes'] : '',
                                    'return' => true,
                                    'options_markup' => true,
                                    'options' => $mashup_options_markup,
                                ),
                            );
                            $output .= $mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);

                            break;

                        case "checkbox":

                            if (isset($mashup_var_options['mashup_var_' . $value['id']])) {
                                $checked_value = $mashup_var_options['mashup_var_' . $value['id']];
                            } else {
                                $checked_value = isset($value['std']) ? $value['std'] : '';
                            }

                            $mashup_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'id' => isset($value['id']) ? 'mashup_var_' . $value['id'] . '_checkbox' : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $checked_value,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => '',
                                    'return' => true,
                                ),
                            );
                            $output .= $mashup_var_html_fields->mashup_var_checkbox_field($mashup_opt_array);

                            break;

                        case 'hidden':
                            if (isset($mashup_var_options['mashup_var_' . $value['id']])) {
                                $val = $mashup_var_options['mashup_var_' . $value['id']];
                            } else {
                                $val = isset($value['std']) ? $value['std'] : '';
                            }

                            $mashup_opt_array = array(
                                'std' => $val,
                                'id' => isset($value['id']) ? $value['id'] : '',
                                'classes' => '',
                                'return' => true,
                            );
                            $output .= $mashup_var_form_fields->mashup_var_form_hidden_render($mashup_opt_array);

                            break;

                        case 'hidden_field':
                            $val = isset($value['std']) ? $value['std'] : '';
                            $mashup_opt_array = array(
                                'std' => $val,
                                'id' => isset($value['id']) ? $value['id'] : '',
                                'classes' => '',
                                'return' => true,
                            );
                            $output .= $mashup_var_form_fields->mashup_var_form_hidden_render($mashup_opt_array);

                            break;

                        case "color":

                            if (isset($mashup_var_options['mashup_var_' . $value['id']])) {
                                $val = $mashup_var_options['mashup_var_' . $value['id']];
                            } else {
                                $val = isset($value['std']) ? $value['std'] : '';
                            }
                            $display = isset($value['display']) ? $value['display'] : 'block';
                            $tab = isset($value['tab']) ? $value['tab'] : '';
                            $output .= '
                                        <div class="main_tab">
                                                <div class="horizontal_tab" style="display:' . $display . ';" id="' . $tab . '">';
                            $mashup_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'id' => isset($value['id']) ? 'mashup_var_' . $value['id'] . '_color' : '',
                                'field_params' => array(
                                    'std' => $val,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => 'bg_color',
                                    'return' => true,
                                ),
                            );
                            $output .= $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
                            $output .= '
						</div>
                                        </div>';

                            break;

                        case "upload logo":
                            $mashup_var_counter ++;

                            if (isset($mashup_var_options['mashup_var_' . $value['id']])) {
                                $val = $mashup_var_options['mashup_var_' . $value['id']];
                            } else {
                                $val = isset($value['std']) ? $value['std'] : '';
                            }
                            $display = isset($value['display']) ? $value['display'] : '';
                            $tab = isset($value['tab']) ? $value['tab'] : '';
                            $output .= '
                                        <div class="main_tab">
                                                <div class="horizontal_tab" style="display:' . $display . '" id="' . $tab . '">';
                            $mashup_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'id' => isset($value['id']) ? $value['id'] : '',
                                'main_id' => isset($value['mian_id']) ? $value['mian_id'] : '',
                                'std' => $val,
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'prefix' => '',
                                'field_params' => array(
                                    'std' => isset($val) ? $val : '',
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'prefix' => '',
                                    'return' => true,
                                ),
                            );
                            $output .= $mashup_var_html_fields->mashup_var_upload_file_field($mashup_opt_array);
                            $output .= '
						</div>
                                        </div>';

                            break;

                        case "upload font":
                            $mashup_var_counter ++;

                            if (isset($mashup_var_options['mashup_var_' . $value['id']])) {
                                $val = $mashup_var_options['mashup_var_' . $value['id']];
                            } else {
                                $val = isset($value['std']) ? $value['std'] : '';
                            }

                            $mashup_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'id' => $mashup_name . '_upload',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                            );
                            $output .= $mashup_var_html_fields->mashup_var_opening_field($mashup_opt_array);

                            $mashup_opt_array = array(
                                'std' => $val,
                                'cust_id' => $value['id'],
                                'cust_name' => 'mashup_var_' . $value['id'],
                                'classes' => 'input-medium',
                                'return' => true,
                            );
                            $output .= $mashup_var_form_fields->mashup_var_form_text_render($mashup_opt_array);
                            $output .= '
							<label class="browse-icon">';
                            $mashup_opt_array = array(
                                'std' => mashup_var_theme_text_srt('mashup_var_browse'),
                                'cust_id' => 'mashup_var_' . $value['id'],
                                'cust_name' => $value['id'],
                                'cust_type' => 'button',
                                'classes' => 'cs-mashup-media left ',
                                'return' => true,
                            );
                            $output .= $mashup_var_form_fields->mashup_var_form_text_render($mashup_opt_array);
                            $output .= '
							</label>';
                            $output .= $mashup_var_html_fields->mashup_var_closing_field(array());

                            break;

                        case "upload favicon":
                            if (isset($mashup_var_options['mashup_var_' . $value['id']])) {
                                $val = $mashup_var_options['mashup_var_' . $value['id']];
                            } else {
                                $val = isset($value['std']) ? $value['std'] : '';
                            }

                            $mashup_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'id' => isset($value['id']) ? $value['id'] : '',
                                'main_id' => isset($value['mian_id']) ? $value['mian_id'] : '',
                                'std' => $val,
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'prefix' => '',
                                'field_params' => array(
                                    'std' => isset($val) ? $val : '',
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'prefix' => '',
                                    'return' => true,
                                ),
                            );

                            $output .= $mashup_var_html_fields->mashup_var_upload_file_field($mashup_opt_array);

                            break;

                        case "sidebar" :
                            $val = array();
                            if (is_array($mashup_var_options['mashup_var_sidebar']) && count($mashup_var_options['mashup_var_sidebar']) > 0) {
                                $val['sidebar'] = $mashup_var_options['mashup_var_sidebar'];
                            }
                            if (isset($val['sidebar']) && is_array($val['sidebar']) && count($val['sidebar']) > 0) {
                                $display = 'block';
                            } else {
                                $display = 'none';
                            }

                            $mashup_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => mashup_var_theme_text_srt('mashup_var_sidebar_name'),
                            );
                            $output .= $mashup_var_html_fields->mashup_var_opening_field($mashup_opt_array);

                            $mashup_opt_array = array(
                                'std' => '',
                                'cust_id' => 'sidebar_input',
                                'cust_name' => 'sidebar_input',
                                'classes' => 'input-medium',
                                'return' => true,
                            );
                            $output .= $mashup_var_form_fields->mashup_var_form_text_render($mashup_opt_array);

                            $mashup_opt_array = array(
                                'std' => mashup_var_theme_text_srt('mashup_var_add_sidebar'),
                                'cust_type' => 'button',
                                'cust_id' => 'add_new_sidebar',
                                'cust_name' => 'add_new_sidebar',
                                'extra_atr' => 'onclick="javascript:add_sidebar()"',
                                'return' => true,
                            );
                            $output .= $mashup_var_form_fields->mashup_var_form_text_render($mashup_opt_array);

                            $output .= $mashup_var_html_fields->mashup_var_closing_field(array());
                            $output .= '
							<div class="clear"></div>
							<div class="sidebar-area" style="display:' . $display . '">
								<div class="theme-help">
								  <h4 style="padding-bottom:0px;">' . mashup_var_theme_text_srt('mashup_var_already_added_sidebar') . '</h4>
								  <div class="clear"></div>
								</div>
								<div class="boxes">
									<table class="to-table" border="0" cellspacing="0">
									<thead>
										<tr>
											<th>' . mashup_var_theme_text_srt('mashup_var_sidebar_name') . '</th>
											<th class="centr">' . mashup_var_theme_text_srt('mashup_var_actions') . '</th>
										</tr>
									</thead>
									<tbody id="sidebar_area">';
                            if ($display == 'block') {
                                $i = 1;
                                if (isset($val['sidebar']) && is_array($val['sidebar']) && sizeof($val['sidebar']) > 0) {
                                    foreach ($val['sidebar'] as $sidebar) {
                                        $output .= '
												<tr id="sidebar_' . $i . '">
													<td>';

                                        $mashup_opt_array = array(
                                            'std' => $sidebar,
                                            'id' => 'sidebar' . $i,
                                            'cust_name' => 'mashup_var_sidebar[]',
                                            'return' => true,
                                        );
                                        $output .= $mashup_var_form_fields->mashup_var_form_hidden_render($mashup_opt_array);

                                        $output .= $sidebar . '</td>
													<td class="centr"> <a class="remove-btn" onclick="javascript:return confirm(\'' . mashup_var_theme_text_srt('mashup_var_are_sure') . '\')" href="javascript:mashup_var_div_remove(\'sidebar_' . $i . '\')" data-toggle="tooltip" data-placement="top" title="' . mashup_var_theme_text_srt('mashup_var_remove') . '"><i class="icon-cancel"></i></a</td>
												</tr>';
                                        $i ++;
                                    }
                                }
                            }
                            $output .= '
									 </tbody>
									</table>
								</div>
							</div>';
                            break;

                        case "mashup_var_footer_sidebar":
                            $val = $value['std'];

                            if (isset($mashup_var_options['mashup_var_footer_sidebar']) and count($mashup_var_options['mashup_var_footer_sidebar']) > 0) {
                                $val['mashup_var_footer_sidebar'] = $mashup_var_options['mashup_var_footer_sidebar'];
                            }

                            if (isset($mashup_var_options['mashup_var_footer_width']) and count($mashup_var_options['mashup_var_footer_width']) > 0) {
                                $val['mashup_var_footer_width'] = $mashup_var_options['mashup_var_footer_width'];
                            }

                            if (isset($val['mashup_var_footer_sidebar']) and count($val['mashup_var_footer_sidebar']) > 0 and $val['mashup_var_footer_sidebar'] <> '') {
                                $display = 'block';
                            } else {
                                $display = 'none';
                            }


                            if (isset($val['mashup_var_footer_width']) and count($val['mashup_var_footer_width']) > 0 and $val['mashup_var_footer_width'] <> '') {
                                $display = 'block';
                            } else {
                                $display = 'none';
                            }

                            $output .= $mashup_var_html_fields->mashup_var_opening_field(array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'hint_text' => mashup_var_theme_text_srt('mashup_var_footer_sidebar_title'),
                                    )
                            );

                            $output .= $mashup_var_form_fields->mashup_var_form_text_render(array(
                                'std' => '',
                                'cust_id' => "footer_sidebar_input",
                                'cust_name' => 'footer_sidebar_input',
                                'classes' => 'input-medium',
                                'return' => true,
                            ));

                            $output .= $mashup_var_form_fields->mashup_var_form_select_render(array(
                                'std' => '',
                                'cust_id' => "footer_sidebar_width",
                                'cust_name' => 'footer_sidebar_width',
                                'classes' => 'select-medium chosen-select',
                                'options' =>
                                array(
                                    '2 Column (16.67%)' => mashup_var_theme_text_srt('mashup_var_2column'),
                                    '3 Column (25%)' => mashup_var_theme_text_srt('mashup_var_3column'),
                                    '4 Column (33.33%)' => mashup_var_theme_text_srt('mashup_var_4column'),
                                    '6 Column (50%)' => mashup_var_theme_text_srt('mashup_var_6column'),
                                    '8 Column (66.66%)' => mashup_var_theme_text_srt('mashup_var_8column'),
                                    '9 Column (75%)' => mashup_var_theme_text_srt('mashup_var_9column'),
                                    '10 Column (83.33%)' => mashup_var_theme_text_srt('mashup_var_10column'),
                                    '12 Column (100%)' => mashup_var_theme_text_srt('mashup_var_12column'),
                                ),
                                'return' => true,
                            ));

                            $output .= $mashup_var_form_fields->mashup_var_form_text_render(array(
                                'std' => mashup_var_theme_text_srt('mashup_var_add_sidebar'),
                                'id' => "add_footer_sidebar",
                                'cust_name' => '',
                                'cust_type' => 'button',
                                'extra_atr' => ' onclick="javascript:add_footer_sidebar()"',
                                'return' => true,
                            ));

                            $output .= $mashup_var_html_fields->mashup_var_closing_field(array(
                                'desc' => '',
                                    )
                            );

                            $output .= '
					<div class="clear"></div>
					<div class="footer_sidebar-area" style="display:' . $display . '">
						<div class="theme-help">
						  <h4 style="padding-bottom:0px;">' . mashup_var_theme_text_srt('mashup_var_already_added_sidebar') . '</h4>
						  <div class="clear"></div>
						</div>
						<div class="boxes">
							<table class="to-table" border="0" cellspacing="0">
							<thead>
								<tr>
									<th>' . mashup_var_theme_text_srt('mashup_var_siderbar_name') . '</th>
									<th>' . mashup_var_theme_text_srt('mashup_var_siderbar_width') . '</th>
									<th class="centr">' . mashup_var_theme_text_srt('mashup_var_actions') . '</th>
								</tr>
							</thead>
							<tbody id="footer_sidebar_area">';
                            if ($display == 'block') {
                                $i = 0;

                                $mashup_inline_script = '
								var $ = jQuery;
								$(document).ready(function () {
									function slideout() {
										setTimeout(function () {
											$("#footer_sidebar_area").slideUp("slow", function () {
											});

										}, 2000);
									}

									$(function () {
										$("#footer_sidebar_area").sortable({opacity: 0.8, cursor: \'move\', update: function () {

												$("#footer_sidebar_area").html(theResponse);
												$("#footer_sidebar_area").slideDown(\'slow\');
												slideout();

											}
										});
									});
								});';
                                mashup_admin_inline_enqueue_script($mashup_inline_script, 'mashup-custom-functions');

                                foreach ($val['mashup_var_footer_sidebar'] as $mashup_var_footer_sidebar) {

                                    $output .= '<tr id="footer_sidebar_' . $i . '">
							
											<td>';

                                    $mashup_footer_sidebar_name = mashup_get_sidebar_id($mashup_var_footer_sidebar);
                                    $mashup_footer_sidebar_width = $mashup_var_options['mashup_var_footer_width'][$i];

                                    $output .= $mashup_var_form_fields->mashup_var_form_text_render(array(
                                        'std' => isset($mashup_var_footer_sidebar) ? $mashup_var_footer_sidebar : '',
                                        'id' => "hide_footer_sidebar" . $i,
                                        'cust_name' => 'mashup_var_footer_sidebar[]',
                                        'cust_type' => 'hidden',
                                        'return' => true,
                                    ));

                                    $output .= $mashup_var_footer_sidebar;

                                    $output .= '<td>';

                                    $mashup_footer_sidebar_name = mashup_get_sidebar_id($mashup_var_footer_sidebar);

                                    $output .= $mashup_var_form_fields->mashup_var_form_text_render(array(
                                        'std' => isset($mashup_footer_sidebar_width) ? $mashup_footer_sidebar_width : '',
                                        'id' => "hide_footer_sidebar_width" . $i,
                                        'cust_name' => 'mashup_var_footer_width[]',
                                        'cust_type' => 'hidden',
                                        'return' => true,
                                    ));
                                    $output.= absint($mashup_footer_sidebar_width);

                                    $output.= '</td>';

                                    $output.= '</td> 
											<td class="centr"> <a class="remove-btn" onclick="javascript:return confirm(\'' . mashup_var_theme_text_srt('mashup_var_alert') . '\')" href="javascript:mashup_div_remove(\'footer_sidebar_' . $i . '\')" data-toggle="tooltip" data-placement="top" title="Remove"><i class="icon-cancel"></i></a>
										</td>
									</tr>';
                                    $i ++;
                                }
                            };
                            $output.='</tbody>
							</table>
						</div>
					</div>';
                            break;

                        case 'select_footer_sidebar':
                            if (isset($mashup_var_options) and $mashup_var_options <> '') {
                                if (isset($mashup_var_options[$value['id']])) {
                                    $select_value = $mashup_var_options[$value['id']];
                                }
                            } else {
                                $select_value = $value['std'];
                            }
                            $mashup_single_post_layout = $mashup_var_options['mashup_single_post_layout'];

                            if (isset($mashup_single_post_layout) and $mashup_single_post_layout == 'no_footer_sidebar') {
                                $cus_style = ' style="display:none;"';
                            } else {
                                $cus_style = ' style="display:block;"';
                            }
                            $mashup_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'id' => $value['id'] . '_header',
                                'extra_att' => isset($cus_style) ? $cus_style : '',
                                'desc' => $value['desc'],
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $select_value,
                                    'cust_id' => isset($value['id']) ? $value['id'] : '',
                                    'cust_name' => isset($value['id']) ? $value['id'] : '',
                                    'options' => $value['options']['mashup_var_footer_sidebar'],
                                    'return' => true,
                                    'classes' => $mashup_classes,
                                ),
                            );

                            if (isset($value['split']) && $value['split'] <> '') {
                                $mashup_opt_array['split'] = $value['split'];
                            }
                            $output .= $mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);

                            break;

                        case 'select_footer_sidebar1':

                            if (isset($mashup_var_options) and $mashup_var_options <> '') {
                                if (isset($mashup_var_options[$value['id']])) {
                                    $select_value = $mashup_var_options[$value['id']];
                                }
                            } else {
                                $select_value = $value['std'];
                            }
                            $mashup_single_post_layout = $mashup_var_options['mashup_default_page_layout'];

                            if (isset($mashup_single_post_layout) and $mashup_single_post_layout == 'no_footer_sidebar') {
                                $cus_style = ' style="display:none;"';
                            } else {
                                $cus_style = ' style="display:block;"';
                            }

                            $mashup_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'id' => $value['id'] . '_header',
                                'extra_att' => isset($cus_style) ? $cus_style : '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $select_value,
                                    'cust_id' => isset($value['id']) ? $value['id'] : '',
                                    'cust_name' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => $mashup_classes,
                                    'options' => $value['options']['mashup_var_footer_sidebar'],
                                    'return' => true,
                                ),
                            );

                            if (isset($value['split']) && $value['split'] <> '') {
                                $mashup_opt_array['split'] = $value['split'];
                            }
                            $output .= $mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);
                            break;

                        case "networks" :

                            if (isset($mashup_var_options) && $mashup_var_options <> '') {

                                if (!isset($mashup_var_options['mashup_var_social_net_awesome'])) {
                                    $network_list = '';
                                    $display = 'none';
                                } else {
                                    $network_list = isset($mashup_var_options['mashup_var_social_net_awesome']) ? $mashup_var_options['mashup_var_social_net_awesome'] : '';
                                    $social_net_tooltip = isset($mashup_var_options['mashup_var_social_net_tooltip']) ? $mashup_var_options['mashup_var_social_net_tooltip'] : '';
                                    $social_net_icon_path = isset($mashup_var_options['mashup_var_social_icon_path_array']) ? $mashup_var_options['mashup_var_social_icon_path_array'] : '';
                                    $social_net_url = isset($mashup_var_options['mashup_var_social_net_url']) ? $mashup_var_options['mashup_var_social_net_url'] : '';
                                    $social_font_awesome_color = isset($mashup_var_options['mashup_var_social_icon_color']) ? $mashup_var_options['mashup_var_social_icon_color'] : '';
                                    $display = 'block';
                                }
                            } else {
                                $val = isset($mashup_var_options['options']) ? $value['options'] : '';
                                $std = isset($mashup_var_options['id']) ? $value['id'] : '';
                                $display = 'block';
                                $network_list = isset($mashup_var_options['mashup_var_social_net_awesome']) ? $mashup_var_options['mashup_var_social_net_awesome'] : '';
                                $social_net_tooltip = isset($mashup_var_options['mashup_var_social_net_tooltip']) ? $mashup_var_options['mashup_var_social_net_tooltip'] : '';
                                $social_net_icon_path = isset($mashup_var_options['mashup_var_social_icon_path_array']) ? $mashup_var_options['mashup_var_social_icon_path_array'] : '';
                                $social_net_url = isset($mashup_var_options['mashup_var_social_net_url']) ? $mashup_var_options['mashup_var_social_net_url'] : '';
                                $social_font_awesome_color = isset($mashup_var_options['mashup_var_social_icon_color']) ? $mashup_var_options['mashup_var_social_icon_color'] : '';
                            }

                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt('mashup_var_title_field'),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt('mashup_var_icon_text'),
                                'field_params' => array(
                                    'std' => '',
                                    'cust_id' => 'social_net_tooltip_input',
                                    'cust_name' => 'social_net_tooltip_input',
                                    'classes' => '',
                                    'return' => true,
                                ),
                            );
                            $output .= $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);

                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt('mashup_var_url_field'),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt('mashup_var_url_hint'),
                                'field_params' => array(
                                    'std' => '',
                                    'cust_id' => 'social_net_url_input',
                                    'cust_name' => 'social_net_url_input',
                                    'classes' => '',
                                    'return' => true,
                                ),
                            );
                            $output .= $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);

                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt('mashup_var_icon_path'),
                                'id' => 'social_icon_input',
                                'std' => '',
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt('mashup_var_icon_path_hint'),
                                'prefix' => '',
                                'field_params' => array(
                                    'std' => '',
                                    'id' => 'social_icon_input',
                                    'prefix' => '',
                                    'return' => true,
                                ),
                            );

                            $output .= $mashup_var_html_fields->mashup_var_upload_file_field($mashup_opt_array);

                            $output .= '
							<div class="form-elements">  
								<div id="mashup_var_infobox_networks' . $counter . '">
								  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<label>' . mashup_var_theme_text_srt('mashup_var_icon') . '</label>';
                            if (function_exists('mashup_var_tooltip_helptext')) {
                                $output .= mashup_var_tooltip_helptext(mashup_var_theme_text_srt('mashup_var_icon_hint'));
                            }
                            $output .= '</div>
								  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">' . mashup_var_icomoon_icons_box("", "networks" . $counter, 'social_net_awesome_input') . '</div>
								</div>
							</div>';

                            $mashup_opt_array = array(
                                'name' => mashup_var_theme_text_srt('mashup_var_icon_color'),
                                'desc' => '',
                                'hint_text' => mashup_var_theme_text_srt('mashup_var_icon_color_hint'),
                                'field_params' => array(
                                    'std' => '',
                                    'cust_id' => 'social_font_awesome_color',
                                    'cust_name' => 'social_font_awesome_color',
                                    'classes' => 'bg_color',
                                    'return' => true,
                                ),
                            );
                            $output .= $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);

                            $mashup_opt_array = array(
                                'name' => '&nbsp;',
                                'desc' => '',
                                'hint_text' => '',
                                'field_params' => array(
                                    'std' => mashup_var_theme_text_srt('mashup_var_add'),
                                    'id' => 'add_soc_icon',
                                    'classes' => '',
                                    'cust_type' => 'button',
                                    'extra_atr' => 'onclick="javascript:mashup_var_add_social_icon(\'' . admin_url("admin-ajax.php") . '\')"',
                                    'return' => true,
                                ),
                            );

                            $output .= $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);

                            $output .= '
							<div class="social-area" style="display:' . $display . '">
							<div class="theme-help">
							  <h4 style="padding-bottom:0px;">' . mashup_var_theme_text_srt('mashup_var_already_added_social_icon') . '</h4>
							  <div class="clear"></div>
							</div>
							<div class="boxes">
							<table class="to-table" border="0" cellspacing="0">
								<thead>
								  <tr>
									<th>' . mashup_var_theme_text_srt('mashup_var_icon_path') . '</th>
									<th>' . mashup_var_theme_text_srt('mashup_var_network_name') . '</th>
									<th>' . mashup_var_theme_text_srt('mashup_var_url_field') . '</th>
									<th class="centr">' . mashup_var_theme_text_srt('mashup_var_actions') . '</th>
								  </tr>
								</thead>
								<tbody id="social_network_area">';
                            $i = 0;
                            if (is_array($network_list)) {
                                foreach ($network_list as $network) {
                                    if (isset($network_list[$i]) || isset($network_list[$i])) {

                                        $mashup_rand_num = rand(123456, 987654);
                                        $output .= '<tr id="del_' . $mashup_rand_num . '"><td>';
                                        if (isset($network_list[$i]) && !empty($network_list[$i])) {
                                            $output .= '<i  class="fa ' . $network_list[$i] . ' icon-2x"></i>';
                                        } else {
                                            $output.='<img width="50" src="' . esc_url($social_net_icon_path[$i]) . '">';
                                        }
                                        $output .= '</td><td>' . $social_net_tooltip[$i] . '</td>';
                                        $output .= '<td><a href="#">' . $social_net_url[$i] . '</a></td>';
                                        $output .= '
										  <td class="centr"> 
											<a class="remove-btn" onclick="javascript:return confirm(\'' . mashup_var_theme_text_srt('mashup_var_alert_msg') . '\')" href="javascript:social_icon_del(\'' . $mashup_rand_num . '\')" data-toggle="tooltip" data-placement="top" title="' . mashup_var_theme_text_srt('mashup_var_remove') . '">
											<i class="icon-cancel"></i></a>
											<a href="javascript:mashup_var_toggle(\'' . absint($mashup_rand_num) . '\')" data-toggle="tooltip" data-placement="top" title="' . mashup_var_theme_text_srt('mashup_var_edit') . '">
											  <i class="icon-mode_edit"></i>
											</a>
										  </td>
										</tr>';

                                        $output .= '
										<tr id="' . absint($mashup_rand_num) . '" style="display:none">
										  <td colspan="3">
											<div class="form-elements">
												<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
												<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
													<a class="cs-remove-btn" onclick="mashup_var_toggle(\'' . $mashup_rand_num . '\')"><i class="icon-cancel"></i></a>
												</div>
											</div>';

                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt('mashup_var_title_field'),
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt('mashup_var_icon_text'),
                                            'field_params' => array(
                                                'std' => isset($social_net_tooltip[$i]) ? $social_net_tooltip[$i] : '',
                                                'cust_id' => 'social_net_tooltip' . $i,
                                                'cust_name' => 'mashup_var_social_net_tooltip[]',
                                                'classes' => '',
                                                'return' => true,
                                            ),
                                        );
                                        $output .= $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);

                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt('mashup_var_url_field'),
                                            'desc' => '',
                                            'hint_text' => mashup_var_theme_text_srt('mashup_var_url_hint'),
                                            'field_params' => array(
                                                'std' => isset($social_net_url[$i]) ? $social_net_url[$i] : '',
                                                'cust_id' => 'social_net_url' . $i,
                                                'cust_name' => 'mashup_var_social_net_url[]',
                                                'classes' => '',
                                                'return' => true,
                                            ),
                                        );
                                        $output .= $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);

                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt('mashup_var_icon_path'),
                                            'id' => 'social_icon_path',
                                            'std' => isset($social_net_icon_path[$i]) ? $social_net_icon_path[$i] : '',
                                            'desc' => '',
                                            'hint_text' => '',
                                            'prefix' => '',
                                            'array' => true,
                                            'field_params' => array(
                                                'std' => isset($social_net_icon_path[$i]) ? $social_net_icon_path[$i] : '',
                                                'id' => 'social_icon_path',
                                                'prefix' => '',
                                                'array' => true,
                                                'return' => true,
                                            ),
                                        );

                                        $output .= $mashup_var_html_fields->mashup_var_upload_file_field($mashup_opt_array);
                                        $mashup_var_icon = mashup_var_theme_text_srt('mashup_var_icon');
                                        $output .= '
											<div class="form-elements">
												<div id="mashup_var_infobox_theme_options' . $i . '">
												  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
													<label>' . $mashup_var_icon . '</label>
												  </div>
												  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
													' . mashup_var_icomoon_icons_box($network_list[$i], "theme_options" . $i, 'mashup_var_social_net_awesome') . '
												  </div>
												</div>
											</div>';

                                        $mashup_opt_array = array(
                                            'name' => mashup_var_theme_text_srt('mashup_var_icon_color'),
                                            'desc' => '',
                                            'hint_text' => '',
                                            'field_params' => array(
                                                'std' => isset($social_font_awesome_color[$i]) ? $social_font_awesome_color[$i] : '',
                                                'cust_id' => 'social_font_awesome_color' . $i,
                                                'cust_name' => 'mashup_var_social_icon_color[]',
                                                'classes' => 'bg_color',
                                                'return' => true,
                                            ),
                                        );
                                        $output .= $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);

                                        $output .= '
										  </td>
										</tr>';
                                    }
                                    $i ++;
                                }
                            }

                            $output .= '</tbody></table></div></div>';


                            break;
                    }
                }
            }

            return array($output, $menu);
        }

    }

}
