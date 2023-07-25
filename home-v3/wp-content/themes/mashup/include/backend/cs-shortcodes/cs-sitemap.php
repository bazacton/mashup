<?php
/**
 * @Sitemap html form for page builder
 */
if (!function_exists('mashup_var_page_builder_sitemap')) {

    function mashup_var_page_builder_sitemap($die = 0) {
	global $post, $mashup_node, $mashup_var_html_fields, $mashup_var_form_fields;
	$strings = new mashup_theme_all_strings;
	$strings->mashup_short_code_strings();
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
	    $PREFIX = 'mashup_sitemap';
	    $parseObject = new ShortcodeParse();
	    $output = $parseObject->mashup_shortcodes($output, $shortcode_str, true, $PREFIX);
	}
	$defaults = array('mashup_sitemap_section_title' => '', 'mashup_var_sitemap_sub_title' => '', 'mashup_var_sitemap_align' => '',);
	if (isset($output['0']['atts'])) {
	    $atts = $output['0']['atts'];
	} else {
	    $atts = array();
	}
	foreach ($defaults as $key => $values) {
	    if (isset($atts[$key])) {
		$$key = $atts[$key];
	    } else {
		$$key = $values;
	    }
	}
	$name = 'mashup_var_page_builder_sitemap';
	$coloumn_class = 'column_100';
	if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') {
	    $shortcode_element = 'shortcode_element_class';
	    $shortcode_view = 'cs-pbwp-shortcode';
	    $filter_element = 'ajax-drag';
	    $coloumn_class = '';
	}
	?>
	<div id="<?php echo esc_attr($name . $mashup_counter) ?>_del" class="column  parentdelete column_100 column_100 <?php echo esc_attr($shortcode_view); ?>" item="sitemap" data="0" >
	    <?php mashup_element_setting($name, $mashup_counter, 'column_100', '', 'arrows-v'); ?>
	    <div class="cs-wrapp-class-<?php echo esc_attr($mashup_counter); ?> <?php echo esc_attr($shortcode_element); ?>" id="<?php echo esc_attr($name . $mashup_counter) ?>" data-shortcode-template="[<?php echo esc_attr('mashup_sitemap'); ?> {{attributes}}]" style="display: none;">
		<div class="cs-heading-area">
		    <h5><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_edit_sitemap')); ?></h5>
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
				'std' => esc_html($mashup_sitemap_section_title),
				'id' => 'mashup_sitemap_section_title',
				'cust_name' => 'mashup_sitemap_section_title[]',
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
				'std' => mashup_allow_special_char($mashup_var_sitemap_sub_title),
				'id' => 'mashup_var_sitemap_sub_title',
				'cust_name' => 'mashup_var_sitemap_sub_title[]',
				'classes' => '',
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
				'std' => $mashup_var_sitemap_align,
				'id' => '',
				'cust_id' => '',
				'cust_name' => 'mashup_var_sitemap_align[]',
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
			?>
		    </div>
		    <?php if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') { ?>
	    	    <ul class="form-elements insert-bg">
	    		<li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:mashup_shortcode_insert_editor('<?php echo esc_js(str_replace('mashup_var_page_builder_', '', $name)); ?>', '<?php echo esc_js($name . $mashup_counter); ?>', '<?php echo esc_js($filter_element); ?>')" ><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_insert')); ?></a> </li>
	    	    </ul>
	    	    <div id="results-shortocde"></div>
		    <?php
		    } else {
			$mashup_opt_array = array(
			    'std' => 'sitemap',
			    'id' => '',
			    'before' => '',
			    'after' => '',
			    'classes' => '',
			    'extra_atr' => '',
			    'cust_id' => '',
			    'cust_name' => 'mashup_orderby[]',
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
				'classes' => 'cs-admin-btn',
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

    add_action('wp_ajax_mashup_var_page_builder_sitemap', 'mashup_var_page_builder_sitemap');
}

if (!function_exists('mashup_save_page_builder_data_sitemap_callback')) {

    /**
     * Save data for sitemap shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_sitemap_callback($args) {
	$data = $args['data'];
	$counters = $args['counters'];
	$widget_type = $args['widget_type'];
	$column = $args['column'];
	if ($widget_type == "sitemap") {
	    $shortcode = '';
	    $sitemap = $column->addChild('sitemap');
	    $sitemap->addChild('page_element_size', '100');
	    if (isset($data['mashup_widget_element_num'][$counters['mashup_counter']]) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode') {
		$shortcode_str = stripslashes($data['shortcode']['sitemap'][$counters['mashup_shortcode_counter_sitemap']]);
		$counters['mashup_shortcode_counter_sitemap'] ++;
		$sitemap->addChild('mashup_shortcode', htmlspecialchars($shortcode_str));
	    } else {
		$shortcode .= '[mashup_sitemap ';
		if (isset($data['mashup_sitemap_section_title'][$counters['mashup_counter_sitemap']]) && $data['mashup_sitemap_section_title'][$counters['mashup_counter_sitemap']] != '') {
		    $shortcode .= 'mashup_sitemap_section_title="' . htmlspecialchars($data['mashup_sitemap_section_title'][$counters['mashup_counter_sitemap']]) . '" ';
		}
		if (isset($data['mashup_var_sitemap_sub_title'][$counters['mashup_counter_sitemap']]) && $data['mashup_var_sitemap_sub_title'][$counters['mashup_counter_sitemap']] != '') {
		    $shortcode .= 'mashup_var_sitemap_sub_title="' . htmlspecialchars($data['mashup_var_sitemap_sub_title'][$counters['mashup_counter_sitemap']]) . '" ';
		}
		if (isset($data['mashup_var_sitemap_align'][$counters['mashup_counter_sitemap']]) && $data['mashup_var_sitemap_align'][$counters['mashup_counter_sitemap']] != '') {
			$shortcode .= 'mashup_var_sitemap_align="' . htmlspecialchars($data['mashup_var_sitemap_align'][$counters['mashup_counter_sitemap']]) . '" ';
		}
		$shortcode .= ']';
		$sitemap->addChild('mashup_shortcode', $shortcode);
		$counters['mashup_counter_sitemap'] ++;
	    }
	    $counters['mashup_global_counter_sitemap'] ++;
	}
	return array(
	    'data' => $data,
	    'counters' => $counters,
	    'widget_type' => $widget_type,
	    'column' => $column,
	);
    }

    add_filter('mashup_save_page_builder_data', 'mashup_save_page_builder_data_sitemap_callback');
}

if (!function_exists('mashup_load_shortcode_counters_sitemap_callback')) {

    /**
     * Populate sitemap shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_sitemap_callback($counters) {
	$counters['mashup_global_counter_sitemap'] = 0;
	$counters['mashup_shortcode_counter_sitemap'] = 0;
	$counters['mashup_counter_sitemap'] = 0;
	return $counters;
    }

    add_filter('mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_sitemap_callback');
}
if (!function_exists('mashup_shortcode_names_list_populate_sitemap_callback')) {

    /**
     * Populate sitemap shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_sitemap_callback($shortcode_array) {
	$shortcode_array['sitemap'] = array(
	    'title' => mashup_var_frame_text_srt('mashup_var_sitemap'),
	    'name' => 'sitemap',
	    'icon' => 'icon-arrows-v',
	    'categories' => 'typography',
	);
	return $shortcode_array;
    }

    add_filter('mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_sitemap_callback');
}

if (!function_exists('mashup_element_list_populate_sitemap_callback')) {

    /**
     * Populate sitemap shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_sitemap_callback($element_list) {
	$element_list['sitemap'] = mashup_var_frame_text_srt('mashup_var_sitemap');
	return $element_list;
    }

    add_filter('mashup_element_list_populate', 'mashup_element_list_populate_sitemap_callback');
}