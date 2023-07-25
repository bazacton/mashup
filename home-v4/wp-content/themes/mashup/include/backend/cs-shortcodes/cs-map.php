<?php
/**
 * @Google map html form for page builder start
 */
if (!function_exists('mashup_var_page_builder_map')) {

    function mashup_var_page_builder_map($die = 0) {
	global $mashup_node, $post, $mashup_var_html_fields, $mashup_var_form_fields;
	$shortcode_element = '';
	$filter_element = 'filterdrag';
	$shortcode_view = '';
	$output = array();
	$mashup_counter = $_POST['counter'];
	if (isset($_POST['action']) && !isset($_POST['shortcode_element_id'])) {
	    $POSTID = '';
	    $shortcode_element_id = '';
	} else {
	    $POSTID = $_POST['POSTID'];
	    $shortcode_element_id = $_POST['shortcode_element_id'];
	    $shortcode_str = stripslashes($shortcode_element_id);
	    $PREFIX = 'mashup_map';
	    $parseObject = new ShortcodeParse();
	    $output = $parseObject->mashup_shortcodes($output, $shortcode_str, true, $PREFIX);
	}
	$defaults = array(
	    'mashup_var_map_title' => '',
	    'mashup_var_map_height' => '',
	    'mashup_var_map_lat' => '40.7143528',
	    'mashup_var_map_lon' => '-74.0059731',
	    'mashup_var_map_zoom' => '',
	    'mashup_var_map_info' => '',
	    'mashup_var_map_info_width' => '',
	    'mashup_var_map_info_height' => '',
	    'mashup_var_map_marker_icon' => '',
	    'mashup_var_map_show_marker' => 'true',
	    'mashup_var_map_controls' => '',
	    'mashup_var_map_draggable' => '',
	    'mashup_var_map_scrollwheel' => '',
	    'mashup_var_map_border' => '',
	    'mashup_var_map_border_color' => '',
	    'mashup_var_map_sub_title' => '',
	    'mashup_var_map_element_align' => '',
	);
	if (isset($output['0']['atts'])) {
	    $atts = $output['0']['atts'];
	} else {
	    $atts = array();
	}
	if (isset($output['0']['content'])) {
	    $atts_content = $output['0']['content'];
	} else {
	    $atts_content = array();
	}
	$map_element_size = '25';
	foreach ($defaults as $key => $values) {
	    if (isset($atts[$key])) {
		$$key = $atts[$key];
	    } else {
		$$key = $values;
	    }
	}
	$mashup_var_map_title = isset($mashup_var_map_title) ? $mashup_var_map_title : '';
	$mashup_var_map_height = isset($mashup_var_map_height) ? $mashup_var_map_height : '';
	$mashup_var_map_lat = isset($mashup_var_map_lat) ? $mashup_var_map_lat : '';
	$mashup_var_map_lon = isset($mashup_var_map_lon) ? $mashup_var_map_lon : '';
	$mashup_var_map_zoom = isset($mashup_var_map_zoom) ? $mashup_var_map_zoom : '';
	$mashup_var_map_info = isset($mashup_var_map_info) ? $mashup_var_map_info : '';
	$mashup_var_map_marker_icon = isset($mashup_var_map_marker_icon) ? $mashup_var_map_marker_icon : '';
	$mashup_var_map_show_marker = isset($mashup_var_map_show_marker) ? $mashup_var_map_show_marker : '';
	$mashup_var_map_controls = isset($mashup_var_map_controls) ? $mashup_var_map_controls : '';
	$mashup_var_map_draggable = isset($mashup_var_map_draggable) ? $mashup_var_map_draggable : '';
	$mashup_var_map_scrollwheel = isset($mashup_var_map_scrollwheel) ? $mashup_var_map_scrollwheel : '';
	$mashup_var_map_border = isset($mashup_var_map_border) ? $mashup_var_map_border : '';
	$mashup_var_map_border_color = isset($mashup_var_map_border_color) ? $mashup_var_map_border_color : '';
	$name = 'mashup_var_page_builder_map';
	$coloumn_class = 'column_' . $map_element_size;
	if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') {
	    $shortcode_element = 'shortcode_element_class';
	    $shortcode_view = 'cs-pbwp-shortcode';
	    $filter_element = 'ajax-drag';
	    $coloumn_class = '';
	}
	$rand_string = $mashup_counter . '' . mashup_generate_random_string(3);

	global $mashup_var_static_text;
	$strings = new mashup_theme_all_strings;
	$strings->mashup_short_code_strings();
	?>
	<div id="<?php echo esc_attr($name . $mashup_counter) ?>_del" class="column  parentdelete <?php echo esc_attr($coloumn_class); ?> <?php echo esc_attr($shortcode_view); ?>" item="map" data="<?php echo mashup_element_size_data_array_index($map_element_size) ?>" >
	    <?php mashup_element_setting($name, $mashup_counter, $map_element_size, '', 'globe'); ?>
	    <div class="cs-wrapp-class-<?php echo esc_attr($mashup_counter); ?> <?php echo esc_attr($shortcode_element); ?>" id="<?php echo esc_attr($name . $mashup_counter) ?>" data-shortcode-template="[<?php echo esc_attr('mashup_map'); ?> {{attributes}}]" style="display: none;">
		<div class="cs-heading-area">
		    <h5><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_edit_map_options')); ?></h5>
		    <a href="javascript:mashup_frame_removeoverlay('<?php echo esc_js($name . $mashup_counter) ?>','<?php echo esc_js($filter_element); ?>')" class="cs-btnclose"><i class="icon-cancel"></i></a> </div>
		<div class="cs-pbwp-content">
		    <div class="cs-wrapp-clone cs-shortcode-wrapp">
			<?php
			if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') {
			    mashup_shortcode_element_size();
			}

			$mashup_opt_array = array(
			    'name' => mashup_var_theme_text_srt('mashup_var_element_title'),
			    'desc' => '',
			    'hint_text' => mashup_var_theme_text_srt('mashup_var_element_title_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => mashup_allow_special_char($mashup_var_map_title),
				'cust_id' => '',
				'classes' => '',
				'cust_name' => 'mashup_var_map_title[]',
				'return' => true,
			    ),
			);
			$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);



			$mashup_opt_array = array(
			    'name' => mashup_var_theme_text_srt('mashup_var_element_sub_title'),
			    'desc' => '',
			    'hint_text' => mashup_var_theme_text_srt('mashup_var_element_sub_title_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => esc_attr($mashup_var_map_sub_title),
				'cust_id' => '',
				'cust_name' => 'mashup_var_map_sub_title[]',
				'return' => true,
			    ),
			);
			$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);

			$mashup_opt_array = array(
			    'name' => mashup_var_theme_text_srt('mashup_var_align'),
			    'desc' => '',
			    'hint_text' => mashup_var_theme_text_srt('mashup_var_align_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => $mashup_var_map_element_align,
				'id' => '',
				'cust_id' => '',
				'cust_name' => 'mashup_var_map_element_align[]',
				'classes' => 'dropdown chosen-select',
				'options' => array(
				    'left' => mashup_var_theme_text_srt('mashup_var_heading_sc_left'),
				    'right' => mashup_var_theme_text_srt('mashup_var_heading_sc_right'),
				    'center' => mashup_var_theme_text_srt('mashup_var_heading_sc_center'),
				),
				'return' => true,
			    ),
			);

			$mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);


			$mashup_opt_array = array(
			    'name' => mashup_var_theme_text_srt('mashup_var_map_height'),
			    'desc' => '',
			    'hint_text' => mashup_var_theme_text_srt('mashup_var_map_height_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => esc_attr($mashup_var_map_height),
				'cust_id' => '',
				'classes' => 'txtfield ',
				'cust_name' => 'mashup_var_map_height[]',
				'return' => true,
			    ),
			);
			$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
			$mashup_opt_array = array(
			    'name' => mashup_var_theme_text_srt('mashup_var_latitude'),
			    'desc' => '',
			    'hint_text' => mashup_var_theme_text_srt('mashup_var_latitude_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => esc_attr($mashup_var_map_lat),
				'cust_id' => '',
				'classes' => 'txtfield',
				'cust_name' => 'mashup_var_map_lat[]',
				'return' => true,
			    ),
			);
			$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
			$mashup_opt_array = array(
			    'name' => mashup_var_theme_text_srt('mashup_var_longitude'),
			    'desc' => '',
			    'hint_text' => mashup_var_theme_text_srt('mashup_var_longitude_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => esc_attr($mashup_var_map_lon),
				'cust_id' => '',
				'classes' => 'txtfield',
				'cust_name' => 'mashup_var_map_lon[]',
				'return' => true,
			    ),
			);
			$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
			$mashup_opt_array = array(
			    'name' => mashup_var_theme_text_srt('mashup_var_zoom'),
			    'desc' => '',
			    'hint_text' => mashup_var_theme_text_srt('mashup_var_zoom_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => esc_attr($mashup_var_map_zoom),
				'cust_id' => '',
				'classes' => 'txtfield',
				'cust_name' => 'mashup_var_map_zoom[]',
				'return' => true,
			    ),
			);
			$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);

			$mashup_opt_array = array(
			    'name' => mashup_var_theme_text_srt('mashup_var_info_text'),
			    'desc' => '',
			    'hint_text' => mashup_var_theme_text_srt('mashup_var_info_text_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => esc_attr($mashup_var_map_info),
				'cust_id' => '',
				'classes' => 'txtfield',
				'cust_name' => 'mashup_var_map_info[]',
				'return' => true,
			    ),
			);
			$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);

			$mashup_opt_array = array(
			    'name' => mashup_var_theme_text_srt('mashup_var_info_text_width'),
			    'desc' => '',
			    'hint_text' => mashup_var_theme_text_srt('mashup_var_info_text_width_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => esc_attr($mashup_var_map_info_width),
				'cust_id' => '',
				'classes' => 'txtfield input-small',
				'cust_name' => 'mashup_var_map_info_width[]',
				'return' => true,
			    ),
			);
			$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);

			$mashup_opt_array = array(
			    'name' => mashup_var_theme_text_srt('mashup_var_info_text_height'),
			    'desc' => '',
			    'hint_text' => mashup_var_theme_text_srt('mashup_var_info_text_height_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => esc_attr($mashup_var_map_info_height),
				'cust_id' => '',
				'classes' => 'txtfield input-small',
				'cust_name' => 'mashup_var_map_info_height[]',
				'return' => true,
			    ),
			);
			$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);

			$mashup_opt_array = array(
			    'std' => esc_url($mashup_var_map_marker_icon),
			    'id' => 'map_marker_icon',
			    'name' => mashup_var_theme_text_srt('mashup_var_marker_icon_path'),
			    'desc' => '',
			    'hint_text' => mashup_var_theme_text_srt('mashup_var_marker_icon_path_hint'),
			    'echo' => true,
			    'array' => true,
			    'prefix' => '',
			    'field_params' => array(
				'std' => esc_url($mashup_var_map_marker_icon),
				'cust_id' => '',
				'id' => 'map_marker_icon',
				'return' => true,
				'array' => true,
				'array_txt' => false,
				'prefix' => '',
			    ),
			);
			$mashup_var_html_fields->mashup_var_upload_file_field($mashup_opt_array);
			$mashup_opt_array = array(
			    'name' => mashup_var_theme_text_srt('mashup_var_show_marker'),
			    'desc' => '',
			    'hint_text' => mashup_var_theme_text_srt('mashup_var_show_marker_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => esc_html($mashup_var_map_show_marker),
				'id' => '',
				'cust_id' => '',
				'cust_name' => 'mashup_var_map_show_marker[]',
				'classes' => 'dropdown chosen-select',
				'options' => array(
				    'true' => mashup_var_theme_text_srt('mashup_var_on'),
				    'false' => mashup_var_theme_text_srt('mashup_var_off'),
				),
				'return' => true,
			    ),
			);

			$mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);
			$mashup_opt_array = array(
			    'name' => mashup_var_theme_text_srt('mashup_var_disable_map_controls'),
			    'desc' => '',
			    'hint_text' => mashup_var_theme_text_srt('mashup_var_disable_map_controls_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => esc_html($mashup_var_map_controls),
				'id' => '',
				'cust_id' => '',
				'cust_name' => 'mashup_var_map_controls[]',
				'classes' => 'dropdown chosen-select',
				'options' => array(
				    'true' => mashup_var_theme_text_srt('mashup_var_on'),
				    'false' => mashup_var_theme_text_srt('mashup_var_off'),
				),
				'return' => true,
			    ),
			);

			$mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);
			$mashup_opt_array = array(
			    'name' => mashup_var_theme_text_srt('mashup_var_drage_able'),
			    'desc' => '',
			    'hint_text' => mashup_var_theme_text_srt('mashup_var_drage_able_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => esc_html($mashup_var_map_draggable),
				'id' => '',
				'cust_id' => '',
				'cust_name' => 'mashup_var_map_draggable[]',
				'classes' => 'dropdown  chosen-select',
				'options' => array(
				    'true' => mashup_var_theme_text_srt('mashup_var_on'),
				    'false' => mashup_var_theme_text_srt('mashup_var_off'),
				),
				'return' => true,
			    ),
			);

			$mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);
			$mashup_opt_array = array(
			    'name' => mashup_var_theme_text_srt('mashup_var_scroll_wheel'),
			    'desc' => '',
			    'hint_text' => mashup_var_theme_text_srt('mashup_var_scroll_wheel_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => esc_html($mashup_var_map_scrollwheel),
				'id' => '',
				'cust_id' => '',
				'cust_name' => 'mashup_var_map_scrollwheel[]',
				'classes' => 'dropdown chosen-select',
				'options' => array(
				    'true' => mashup_var_theme_text_srt('mashup_var_on'),
				    'false' => mashup_var_theme_text_srt('mashup_var_off'),
				),
				'return' => true,
			    ),
			);

			$mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);
			$mashup_opt_array = array(
			    'name' => mashup_var_theme_text_srt('mashup_var_map_border'),
			    'desc' => '',
			    'hint_text' => mashup_var_theme_text_srt('mashup_var_map_border_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => esc_html($mashup_var_map_border),
				'id' => '',
				'cust_id' => '',
				'cust_name' => 'mashup_var_map_border[]',
				'classes' => 'dropdown chosen-select',
				'options' => array(
				    'yes' => mashup_var_theme_text_srt('mashup_var_yes'),
				    'no' => mashup_var_theme_text_srt('mashup_var_no'),
				),
				'return' => true,
			    ),
			);

			$mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);
			$mashup_opt_array = array(
			    'name' => mashup_var_theme_text_srt('mashup_var_border_color'),
			    'desc' => '',
			    'hint_text' => mashup_var_theme_text_srt('mashup_var_border_color_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => esc_attr($mashup_var_map_border_color),
				'cust_id' => '',
				'classes' => 'bg_color',
				'cust_name' => 'mashup_var_map_border_color[]',
				'return' => true,
			    ),
			);
			$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
			?>
		    </div>
		    <?php if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') {
			?>
	    	    <ul class="form-elements insert-bg">
	    		<li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:mashup_shortcode_insert_editor('<?php echo esc_js(str_replace('mashup_var_page_builder_', '', $name)); ?>', '<?php echo esc_js($name . $mashup_counter) ?>', '<?php echo esc_js($filter_element); ?>')" ><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_insert')); ?></a> </li>
	    	    </ul>
	    	    <div id="results-shortocde"></div>
		    <?php } else { ?>
			<?php
			$mashup_opt_array = array(
			    'std' => 'map',
			    'id' => '',
			    'before' => '',
			    'after' => '',
			    'classes' => '',
			    'extra_atr' => '',
			    'cust_id' => '',
			    'cust_name' => 'mashup_orderby[]',
			    'return' => false,
			    'required' => false
			);
			$mashup_var_form_fields->mashup_var_form_hidden_render($mashup_opt_array);

			$mashup_opt_array = array(
			    'name' => '',
			    'desc' => '',
			    'hint_text' => '',
			    'echo' => true,
			    'field_params' => array(
				'std' => mashup_var_theme_text_srt('mashup_var_save'),
				'cust_id' => '',
				'cust_type' => 'button',
				'classes' => 'cs-barber-admin-btn',
				'cust_name' => '',
				'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
				'return' => true,
			    ),
			);

			$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
			?>   
		    <?php } ?>
		</div>
	    </div>
	</div>

	<?php
	if ($die <> 1) {
	    die();
	}
    }

    add_action('wp_ajax_mashup_var_page_builder_map', 'mashup_var_page_builder_map');
}

if (!function_exists('mashup_save_page_builder_data_map_callback')) {

    /**
     * Save data for map shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_map_callback($args) {

	$data = $args['data'];
	$counters = $args['counters'];
	$widget_type = $args['widget_type'];
	$column = $args['column'];
	if ($widget_type == "map") {

	    $mashup_var_map_shortcode = '';
	    $mashup_var_map = $column->addChild('map');
	    $mashup_var_map->addChild('page_element_size', htmlspecialchars($data['map_element_size'][$counters['mashup_global_counter_map']]));
	    $mashup_var_map->addChild('map_element_size', htmlspecialchars($data['map_element_size'][$counters['mashup_global_counter_map']]));
	    if (isset($data['mashup_widget_element_num'][$counters['mashup_counter']]) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode') {
		$shortcode_str = stripslashes(htmlspecialchars(( $data['shortcode']['map'][$counters['mashup_shortcode_counter_map']]), ENT_QUOTES));
		$counters['mashup_shortcode_counter_map'] ++;
		$mashup_var_map->addChild('mashup_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
	    } else {
		$mashup_var_map_shortcode = '[mashup_map ';
		if (isset($data['mashup_var_map_title'][$counters['mashup_counter_map']]) && $data['mashup_var_map_title'][$counters['mashup_counter_map']] != '') {
		    $mashup_var_map_shortcode .= 'mashup_var_map_title="' . stripslashes(htmlspecialchars(($data['mashup_var_map_title'][$counters['mashup_counter_map']]), ENT_QUOTES)) . '" ';
		}
		if (isset($data['mashup_var_map_sub_title'][$counters['mashup_counter_map']]) && $data['mashup_var_map_sub_title'][$counters['mashup_counter_map']] != '') {
		    $mashup_var_map_shortcode .= 'mashup_var_map_sub_title="' . htmlspecialchars($data['mashup_var_map_sub_title'][$counters['mashup_counter_map']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_map_element_align'][$counters['mashup_counter_map']]) && $data['mashup_var_map_element_align'][$counters['mashup_counter_map']] != '') {
		    $mashup_var_map_shortcode .= 'mashup_var_map_element_align="' . htmlspecialchars($data['mashup_var_map_element_align'][$counters['mashup_counter_map']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_map_height'][$counters['mashup_counter_map']]) && $data['mashup_var_map_height'][$counters['mashup_counter_map']] != '') {
		    $mashup_var_map_shortcode .= 'mashup_var_map_height="' . htmlspecialchars($data['mashup_var_map_height'][$counters['mashup_counter_map']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_map_lat'][$counters['mashup_counter_map']]) && $data['mashup_var_map_lat'][$counters['mashup_counter_map']] != '') {
		    $mashup_var_map_shortcode .= 'mashup_var_map_lat="' . htmlspecialchars($data['mashup_var_map_lat'][$counters['mashup_counter_map']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_map_lon'][$counters['mashup_counter_map']]) && $data['mashup_var_map_lon'][$counters['mashup_counter_map']] != '') {
		    $mashup_var_map_shortcode .= 'mashup_var_map_lon="' . htmlspecialchars($data['mashup_var_map_lon'][$counters['mashup_counter_map']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_map_zoom'][$counters['mashup_counter_map']]) && $data['mashup_var_map_zoom'][$counters['mashup_counter_map']] != '') {
		    $mashup_var_map_shortcode .= 'mashup_var_map_zoom="' . htmlspecialchars($data['mashup_var_map_zoom'][$counters['mashup_counter_map']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_map_info'][$counters['mashup_counter_map']]) && $data['mashup_var_map_info'][$counters['mashup_counter_map']] != '') {
		    $mashup_var_map_shortcode .= 'mashup_var_map_info="' . htmlspecialchars($data['mashup_var_map_info'][$counters['mashup_counter_map']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_map_info_width'][$counters['mashup_counter_map']]) && $data['mashup_var_map_info_width'][$counters['mashup_counter_map']] != '') {
		    $mashup_var_map_shortcode .= 'mashup_var_map_info_width="' . htmlspecialchars($data['mashup_var_map_info_width'][$counters['mashup_counter_map']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_map_info_height'][$counters['mashup_counter_map']]) && $data['mashup_var_map_info_height'][$counters['mashup_counter_map']] != '') {
		    $mashup_var_map_shortcode .= 'mashup_var_map_info_height="' . htmlspecialchars($data['mashup_var_map_info_height'][$counters['mashup_counter_map']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_map_marker_icon_array'][$counters['mashup_counter_map']]) && $data['mashup_var_map_marker_icon_array'][$counters['mashup_counter_map']] != '') {
		    $mashup_var_map_shortcode .= 'mashup_var_map_marker_icon="' . htmlspecialchars($data['mashup_var_map_marker_icon_array'][$counters['mashup_counter_map']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_map_show_marker'][$counters['mashup_counter_map']]) && $data['mashup_var_map_show_marker'][$counters['mashup_counter_map']] != '') {
		    $mashup_var_map_shortcode .= 'mashup_var_map_show_marker="' . htmlspecialchars($data['mashup_var_map_show_marker'][$counters['mashup_counter_map']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_map_controls'][$counters['mashup_counter_map']]) && $data['mashup_var_map_controls'][$counters['mashup_counter_map']] != '') {
		    $mashup_var_map_shortcode .= 'mashup_var_map_controls="' . htmlspecialchars($data['mashup_var_map_controls'][$counters['mashup_counter_map']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_map_draggable'][$counters['mashup_counter_map']]) && $data['mashup_var_map_draggable'][$counters['mashup_counter_map']] != '') {
		    $mashup_var_map_shortcode .= 'mashup_var_map_draggable="' . htmlspecialchars($data['mashup_var_map_draggable'][$counters['mashup_counter_map']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_map_scrollwheel'][$counters['mashup_counter_map']]) && $data['mashup_var_map_scrollwheel'][$counters['mashup_counter_map']] != '') {
		    $mashup_var_map_shortcode .= 'mashup_var_map_scrollwheel="' . htmlspecialchars($data['mashup_var_map_scrollwheel'][$counters['mashup_counter_map']], ENT_QUOTES) . '" ';
		}

		if (isset($data['mashup_var_map_border'][$counters['mashup_counter_map']]) && $data['mashup_var_map_border'][$counters['mashup_counter_map']] != '') {
		    $mashup_var_map_shortcode .= 'mashup_var_map_border="' . htmlspecialchars($data['mashup_var_map_border'][$counters['mashup_counter_map']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_map_border_color'][$counters['mashup_counter_map']]) && $data['mashup_var_map_border_color'][$counters['mashup_counter_map']] != '') {
		    $mashup_var_map_shortcode .= 'mashup_var_map_border_color="' . htmlspecialchars($data['mashup_var_map_border_color'][$counters['mashup_counter_map']], ENT_QUOTES) . '" ';
		}
		$mashup_var_map_shortcode .= ']';
		if (isset($data['map_text'][$counters['mashup_counter_map']]) && $data['map_text'][$counters['mashup_counter_map']] != '') {
		    $mashup_var_map_shortcode .= htmlspecialchars($data['map_text'][$counters['mashup_counter_map']], ENT_QUOTES) . ' ';
		}
		$mashup_var_map_shortcode .= '[/mashup_map]';
		$mashup_var_map->addChild('mashup_shortcode', $mashup_var_map_shortcode);
		$counters['mashup_counter_map'] ++;
	    }
	    $counters['mashup_global_counter_map'] ++;
	}
	return array(
	    'data' => $data,
	    'counters' => $counters,
	    'widget_type' => $widget_type,
	    'column' => $column,
	);
    }

    add_filter('mashup_save_page_builder_data', 'mashup_save_page_builder_data_map_callback');
}

if (!function_exists('mashup_load_shortcode_counters_map_callback')) {

    /**
     * Populate map shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_map_callback($counters) {
	$counters['mashup_global_counter_map'] = 0;
	$counters['mashup_shortcode_counter_map'] = 0;
	$counters['mashup_counter_map'] = 0;
	return $counters;
    }

    add_filter('mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_map_callback');
}


if (!function_exists('mashup_shortcode_names_list_populate_map_callback')) {

    /**
     * Populate map shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_map_callback($shortcode_array) {
	$shortcode_array['map'] = array(
	    'title' => mashup_var_frame_text_srt('mashup_var_map'),
	    'name' => 'map',
	    'icon' => 'icon-location2',
	    'categories' => 'contentblocks',
	);
	return $shortcode_array;
    }

    add_filter('mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_map_callback');
}

if (!function_exists('mashup_element_list_populate_map_callback')) {

    /**
     * Populate map shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_map_callback($element_list) {
	$element_list['map'] = mashup_var_frame_text_srt('mashup_var_map');
	return $element_list;
    }

    add_filter('mashup_element_list_populate', 'mashup_element_list_populate_map_callback');
}