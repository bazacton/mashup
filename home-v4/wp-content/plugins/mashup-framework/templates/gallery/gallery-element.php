<?php
/**
 * @cs_gallery html form for page builder
 */
if (!function_exists('mashup_var_page_builder_cs_gallery')) {

    function mashup_var_page_builder_cs_gallery($die = 0) {
	global $mashup_node, $count_node, $post, $mashup_var_html_fields, $mashup_var_form_fields, $mashup_var_static_text;
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
	    $MASHUP_PREFIX = 'cs_gallery';
	    $parseObject = new ShortcodeParse();
	    $output = $parseObject->mashup_shortcodes($output, $shortcode_str, true, $MASHUP_PREFIX);
	}
	$defaults = array(
	    'mashup_var_cs_gallery_title' => '',
	    'mashup_var_cs_gallery_type' => '',
	    'mashup_var_cs_gallery_categories' => '',
	    'mashup_var_gallery_sub_title' => '',
	    'mashup_var_gallery_align' => '',
	);
	if (isset($output['0']['atts'])) {
	    $atts = $output['0']['atts'];
	} else {
	    $atts = array();
	}
	$cs_gallery_element_size = '25';
	foreach ($defaults as $key => $values) {
	    if (isset($atts[$key])) {
		$$key = $atts[$key];
	    } else {
		$$key = $values;
	    }
	}
	$name = 'mashup_var_page_builder_cs_gallery';
	$coloumn_class = 'column_' . $cs_gallery_element_size;
	if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') {
	    $shortcode_element = 'shortcode_element_class';
	    $shortcode_view = 'cs-pbwp-shortcode';
	    $filter_element = 'ajax-drag';
	    $coloumn_class = '';
	}
	$mashup_rand_id = rand(13441324, 93441324);
	?>
	<div id="<?php echo esc_attr($name . $mashup_counter) ?>_del" class="column  parentdelete <?php echo esc_attr($coloumn_class); ?>
	     <?php echo esc_attr($shortcode_view); ?>" item="cs_gallery" data="<?php echo mashup_element_size_data_array_index($cs_gallery_element_size) ?>" >
		 <?php mashup_element_setting($name, $mashup_counter, $cs_gallery_element_size) ?>
	    <div class="cs-wrapp-class-<?php echo esc_attr($mashup_counter); ?> <?php echo esc_attr($shortcode_element); ?>" id="<?php echo esc_attr($name . $mashup_counter) ?>" data-shortcode-template="[cs_gallery {{attributes}}]{{content}}[/cs_gallery]" style="display: none;"">
		<div class="cs-heading-area">
		    <h5><?php echo esc_html(mashup_var_frame_text_srt('mashup_var_edit_cs_gallery_options')); ?></h5>
		    <a href="javascript:mashup_frame_removeoverlay('<?php echo esc_js($name . $mashup_counter) ?>','<?php echo esc_js($filter_element); ?>')" class="cs-btnclose"><i class="icon-cancel"></i></a> </div>
		<div class="cs-pbwp-content">
		    <div class="cs-wrapp-clone cs-shortcode-wrapp">
			<?php
			$mashup_opt_array = array(
			    'name' => mashup_var_frame_text_srt('mashup_var_cs_gallery_title'),
			    'desc' => '',
			    'hint_text' => mashup_var_frame_text_srt('mashup_var_cs_gallery_title_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => esc_html($mashup_var_cs_gallery_title),
				'id' => 'cs_gallery_height',
				'cust_name' => 'mashup_var_cs_gallery_title[]',
				'return' => true,
				'cs-range-input' => 'cs-range-input',
			    ),
			);
			$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
			$mashup_opt_array = array(
			    'name' => mashup_var_frame_text_srt('mashup_var_element_sub_title'),
			    'desc' => '',
			    'hint_text' => mashup_var_frame_text_srt('mashup_var_element_sub_title_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => mashup_allow_special_char($mashup_var_gallery_sub_title),
				'id' => 'mashup_var_gallery_sub_title',
				'cust_name' => 'mashup_var_gallery_sub_title[]',
				'classes' => '',
				'return' => true,
			    ),
			);
			$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
			$mashup_opt_array = array(
			    'name' => mashup_var_frame_text_srt('mashup_var_align'),
			    'desc' => '',
			    'hint_text' => mashup_var_frame_text_srt('mashup_var_align_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => $mashup_var_gallery_align,
				'id' => '',
				'cust_id' => '',
				'cust_name' => 'mashup_var_gallery_align[]',
				'classes' => 'dropdown chosen-select',
				'options' => array(
				    'left' => mashup_var_frame_text_srt('mashup_var_heading_sc_left'),
				    'right' => mashup_var_frame_text_srt('mashup_var_heading_sc_right'),
				    'center' => mashup_var_frame_text_srt('mashup_var_heading_sc_center'),
				),
				'return' => true,
			    ),
			);
			$mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);
			$mashup_opt_array = array(
			    'name' => mashup_var_frame_text_srt('mashup_var_cs_gallery_type'),
			    'desc' => '',
			    'hint_text' => mashup_var_frame_text_srt('mashup_var_cs_gallery_style_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => $mashup_var_cs_gallery_type,
				'id' => '',
				'cust_id' => 'mashup_var_cs_gallery_type',
				'cust_name' => 'mashup_var_cs_gallery_type[]',
				'classes' => 'dropdown chosen-select',
				'options' => array(
				    'view_1' => mashup_var_frame_text_srt('mashup_var_cs_gallery_style_view_1'),
				    'view_2' => mashup_var_frame_text_srt('mashup_var_cs_gallery_style_view_2'),
				),
				'return' => true,
			    ),
			);
			$mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);
			$a_options = array();
			$mashup_var_cs_gallery_categories = isset($mashup_var_cs_gallery_categories) ? $mashup_var_cs_gallery_categories : '';
			if ('' != $mashup_var_cs_gallery_categories) {
			    $mashup_var_cs_gallery_categories = explode(',', $mashup_var_cs_gallery_categories);
			}
			$a_options = mashup_show_all_cats('', '', $mashup_var_cs_gallery_categories, "gallery-category", true);
			$mashup_opt_array = array(
			    'name' => mashup_var_frame_text_srt('mashup_var_cs_gallery_categories'),
			    'desc' => '',
			    'hint_text' => mashup_var_frame_text_srt('mashup_var_cs_gallery_categories_hint'),
			    'echo' => true,
			    'multi' => true,
			    'field_params' => array(
				'std' => $mashup_var_cs_gallery_categories,
				'id' => '',
				'cust_name' => 'mashup_var_cs_gallery_categories[' . $mashup_rand_id . '][]',
				'classes' => 'dropdown chosen-select',
				'options' => $a_options,
				'return' => true,
			    ),
			);
			$mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);
			?>
		    </div>
		    <?php if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') { ?>
	    	    <ul class="form-elements insert-bg">
	    		<li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:mashup_shortcode_insert_editor('<?php echo esc_js(str_replace('mashup_var_page_builder_', '', $name)); ?>', '<?php echo esc_js($name . $mashup_counter); ?>', '<?php echo esc_js($filter_element); ?>')" ><?php echo esc_html(mashup_var_frame_text_srt('mashup_var_insert')); ?></a> </li>
	    	    </ul>
	    	    <div id="results-shortocde"></div>
		    <?php } else { ?>
			<?php
			$mashup_opt_array = array(
			    'std' => 'cs_gallery',
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
			$mashup_var_html_fields->mashup_var_form_hidden_render($mashup_opt_array);
			$mashup_opt_array = array(
			    'id' => '',
			    'std' => absint($mashup_rand_id),
			    'cust_id' => "",
			    'cust_name' => "mashup_cs_gallery_id[]",
			);
			$mashup_var_html_fields->mashup_var_form_hidden_render($mashup_opt_array);
			$mashup_opt_array = array(
			    'name' => '',
			    'desc' => '',
			    'hint_text' => '',
			    'echo' => true,
			    'field_params' => array(
				'std' => mashup_var_frame_text_srt('mashup_var_save'),
				'cust_id' => '',
				'cust_type' => 'button',
				'classes' => 'cs-mashup-admin-btn',
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

    add_action('wp_ajax_mashup_var_page_builder_cs_gallery', 'mashup_var_page_builder_cs_gallery');
}

if (!function_exists('mashup_save_page_builder_data_cs_gallery_callback')) {

    /**
     * Save data for cs_gallery shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_cs_gallery_callback($args) {
	$data = $args['data'];
	$counters = $args['counters'];
	$widget_type = $args['widget_type'];
	$column = $args['column'];
	if ($widget_type == "cs_gallery") {

	    $shortcode = '';
	    $cs_gallery = $column->addChild('cs_gallery');
	    $cs_gallery->addChild('page_element_size', htmlspecialchars($data['cs_gallery_element_size'][$counters['mashup_global_counter_cs_gallery']]));
	    $cs_gallery->addChild('cs_gallery_element_size', htmlspecialchars($data['cs_gallery_element_size'][$counters['mashup_global_counter_cs_gallery']]));
	    if (isset($data['mashup_widget_element_num'][$counters['mashup_counter']]) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode') {
		$shortcode_str = stripslashes(htmlspecialchars(( $data['shortcode']['cs_gallery'][$counters['mashup_shortcode_counter_cs_gallery']]), ENT_QUOTES));
		$counters['mashup_shortcode_counter_cs_gallery'] ++;
		$cs_gallery->addChild('mashup_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
	    } else {
		$shortcode = '[cs_gallery ';
		if (isset($data['mashup_var_cs_gallery_title'][$counters['mashup_counter_cs_gallery']]) && $data['mashup_var_cs_gallery_title'][$counters['mashup_counter_cs_gallery']] != '') {
		    $shortcode .= 'mashup_var_cs_gallery_title="' . stripslashes(htmlspecialchars(($data['mashup_var_cs_gallery_title'][$counters['mashup_counter_cs_gallery']]), ENT_QUOTES)) . '" ';
		}
		if (isset($data['mashup_var_gallery_sub_title'][$counters['mashup_counter_cs_gallery']]) && $data['mashup_var_gallery_sub_title'][$counters['mashup_counter_cs_gallery']] != '') {
		    $shortcode .= 'mashup_var_gallery_sub_title="' . stripslashes(htmlspecialchars(($data['mashup_var_gallery_sub_title'][$counters['mashup_counter_cs_gallery']]), ENT_QUOTES)) . '" ';
		}
		if (isset($data['mashup_var_gallery_align'][$counters['mashup_counter_cs_gallery']]) && $data['mashup_var_gallery_align'][$counters['mashup_counter_cs_gallery']] != '') {
		    $shortcode .= 'mashup_var_gallery_align="' . stripslashes(htmlspecialchars(($data['mashup_var_gallery_align'][$counters['mashup_counter_cs_gallery']]), ENT_QUOTES)) . '" ';
		}
		if (isset($data['mashup_var_cs_gallery_type'][$counters['mashup_counter_cs_gallery']]) && $data['mashup_var_cs_gallery_type'][$counters['mashup_counter_cs_gallery']] != '') {
		    $shortcode .= 'mashup_var_cs_gallery_type="' . stripslashes(htmlspecialchars(($data['mashup_var_cs_gallery_type'][$counters['mashup_counter_cs_gallery']]), ENT_QUOTES)) . '" ';
		}
		if (isset($data['mashup_cs_gallery_id'][$counters['mashup_counter_cs_gallery']]) && $data['mashup_cs_gallery_id'][$counters['mashup_counter_cs_gallery']] != '') {
		    $mashup_cs_gallery_id = $data['mashup_cs_gallery_id'][$counters['mashup_counter_cs_gallery']];
		    if (isset($_POST['mashup_var_cs_gallery_categories'][$mashup_cs_gallery_id]) && $_POST['mashup_var_cs_gallery_categories'][$mashup_cs_gallery_id] != '') {

			if (is_array($_POST['mashup_var_cs_gallery_categories'][$mashup_cs_gallery_id])) {

			    $shortcode .= ' mashup_var_cs_gallery_categories="' . implode(',', $_POST['mashup_var_cs_gallery_categories'][$mashup_cs_gallery_id]) . '" ';
			}
		    }
		}
		$shortcode .= ']';
		$shortcode .= '[/cs_gallery]';
		$cs_gallery->addChild('mashup_shortcode', $shortcode);
		$counters['mashup_counter_cs_gallery'] ++;
	    }
	    $counters['mashup_global_counter_cs_gallery'] ++;
	}
	return array(
	    'data' => $data,
	    'counters' => $counters,
	    'widget_type' => $widget_type,
	    'column' => $column,
	);
    }

    add_filter('mashup_save_page_builder_data', 'mashup_save_page_builder_data_cs_gallery_callback');
}

if (!function_exists('mashup_load_shortcode_counters_cs_gallery_callback')) {

    /**
     * Populate cs_gallery shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_cs_gallery_callback($counters) {
	$counters['mashup_counter_cs_gallery'] = 0;
	$counters['mashup_shortcode_counter_cs_gallery'] = 0;
	$counters['mashup_global_counter_cs_gallery'] = 0;
	return $counters;
    }

    add_filter('mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_cs_gallery_callback');
}
if (!function_exists('mashup_shortcode_names_list_populate_cs_gallery_callback')) {

    /**
     * Populate cs_gallery shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_cs_gallery_callback($shortcode_array) {
	$shortcode_array['cs_gallery'] = array(
	    'title' => mashup_var_frame_text_srt('mashup_var_cs_gallery'),
	    'name' => 'cs_gallery',
	    'icon' => 'icon-ellipsis-h',
	    'categories' => 'contentblocks',
	);
	return $shortcode_array;
    }

    add_filter('mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_cs_gallery_callback');
}

if (!function_exists('mashup_element_list_populate_cs_gallery_callback')) {

    /**
     * Populate cs_gallery shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_cs_gallery_callback($element_list) {
	$element_list['cs_gallery'] = mashup_var_frame_text_srt('mashup_var_cs_gallery');
	return $element_list;
    }

    add_filter('mashup_element_list_populate', 'mashup_element_list_populate_cs_gallery_callback');
}