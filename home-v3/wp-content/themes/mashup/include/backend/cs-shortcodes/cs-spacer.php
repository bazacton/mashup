<?php
/**
 * @Spacer html form for page builder
 */
if (!function_exists('mashup_var_page_builder_spacer')) {

    function mashup_var_page_builder_spacer($die = 0) {
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
	    $MASHUP_PREFIX = 'spacer';
	    $parseObject = new ShortcodeParse();
	    $output = $parseObject->mashup_shortcodes($output, $shortcode_str, true, $MASHUP_PREFIX);
	}
	$defaults = array('mashup_var_spacer_height' => '25');
	if (isset($output['0']['atts'])) {
	    $atts = $output['0']['atts'];
	} else {
	    $atts = array();
	}
	$spacer_element_size = '25';
	foreach ($defaults as $key => $values) {
	    if (isset($atts[$key])) {
		$$key = $atts[$key];
	    } else {
		$$key = $values;
	    }
	}
	$name = 'mashup_var_page_builder_spacer';
	$coloumn_class = 'column_' . $spacer_element_size;
	if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') {
	    $shortcode_element = 'shortcode_element_class';
	    $shortcode_view = 'cs-pbwp-shortcode';
	    $filter_element = 'ajax-drag';
	    $coloumn_class = '';
	}
	$strings = new mashup_theme_all_strings;
	$strings->mashup_short_code_strings();
	?>
	<div id="<?php echo esc_attr($name . $mashup_counter) ?>_del" class="column  parentdelete <?php echo esc_attr($coloumn_class); ?>
	     <?php echo esc_attr($shortcode_view); ?>" item="spacer" data="<?php echo mashup_element_size_data_array_index($spacer_element_size) ?>" >
		 <?php mashup_element_setting($name, $mashup_counter, $spacer_element_size) ?>
	    <div class="cs-wrapp-class-<?php echo esc_attr($mashup_counter); ?> <?php echo esc_attr($shortcode_element); ?>" id="<?php echo esc_attr($name . $mashup_counter) ?>" data-shortcode-template="[spacer {{attributes}}]{{content}}[/spacer]" style="display: none;"">
		<div class="cs-heading-area">
		    <h5><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_edit_spacer_options')); ?></h5>
		    <a href="javascript:mashup_frame_removeoverlay('<?php echo esc_js($name . $mashup_counter) ?>','<?php echo esc_js($filter_element); ?>')" class="cs-btnclose"><i class="icon-cancel"></i></a> </div>
		<div class="cs-pbwp-content">
		    <div class="cs-wrapp-clone cs-shortcode-wrapp">
			<?php
			$mashup_opt_array = array(
			    'name' => mashup_var_theme_text_srt('mashup_var_spacer_height'),
			    'desc' => '',
			    'hint_text' => mashup_var_theme_text_srt('mashup_var_spacer_height_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => esc_html($mashup_var_spacer_height),
				'id' => 'spacer_height',
				'cust_name' => 'mashup_var_spacer_height[]',
				'return' => true,
				'cs-range-input' => 'cs-range-input',
			    ),
			);

			$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
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
			    'std' => 'spacer',
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
			    'name' => '',
			    'desc' => '',
			    'hint_text' => '',
			    'echo' => true,
			    'field_params' => array(
				'std' => mashup_var_theme_text_srt('mashup_var_save'),
				'cust_id' => '',
				'cust_type' => 'button',
				'classes' => 'cs-mashup-admin-btn',
				'cust_name' => '',
				'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
				'return' => true,
			    ),
			);
			$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
		    }
		    ?>
		</div>
	    </div>
	</div>
	
	<?php
	if ($die <> 1) {
	    die();
	}
    }

    add_action('wp_ajax_mashup_var_page_builder_spacer', 'mashup_var_page_builder_spacer');
}

if (!function_exists('mashup_save_page_builder_data_spacer_callback')) {

    /**
     * Save data for spacer shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_spacer_callback($args) {
	$data = $args['data'];
	$counters = $args['counters'];
	$widget_type = $args['widget_type'];
	$column = $args['column'];
	if ($widget_type == "spacer") {
	    $shortcode = '';
	    $spacer = $column->addChild('spacer');
	    $spacer->addChild('page_element_size', htmlspecialchars($data['spacer_element_size'][$counters['mashup_global_counter_spacer']]));
	    $spacer->addChild('spacer_element_size', htmlspecialchars($data['spacer_element_size'][$counters['mashup_global_counter_spacer']]));
	    if (isset($data['mashup_widget_element_num'][$counters['mashup_counter']]) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode') {
		$shortcode_str = stripslashes(htmlspecialchars(( $data['shortcode']['spacer'][$counters['mashup_shortcode_counter_spacer']]), ENT_QUOTES));
		$counters['mashup_shortcode_counter_spacer'] ++;
		$spacer->addChild('mashup_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
	    } else {
		$shortcode = '[spacer ';
		if (isset($data['mashup_var_spacer_height'][$counters['mashup_counter_spacer']]) && $data['mashup_var_spacer_height'][$counters['mashup_counter_spacer']] != '') {
		    $shortcode .= 'mashup_var_spacer_height="' . stripslashes(htmlspecialchars(($data['mashup_var_spacer_height'][$counters['mashup_counter_spacer']]), ENT_QUOTES)) . '" ';
		}
		$shortcode .= ']';
		$shortcode .= '[/spacer]';
		$spacer->addChild('mashup_shortcode', $shortcode);
		$counters['mashup_counter_spacer'] ++;
	    }
	    $counters['mashup_global_counter_spacer'] ++;
	}
	return array(
	    'data' => $data,
	    'counters' => $counters,
	    'widget_type' => $widget_type,
	    'column' => $column,
	);
    }

    add_filter('mashup_save_page_builder_data', 'mashup_save_page_builder_data_spacer_callback');
}

if (!function_exists('mashup_load_shortcode_counters_spacer_callback')) {

    /**
     * Populate spacer shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_spacer_callback($counters) {
	$counters['mashup_counter_spacer'] = 0;
	$counters['mashup_shortcode_counter_spacer'] = 0;
	$counters['mashup_global_counter_spacer'] = 0;
	return $counters;
    }

    add_filter('mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_spacer_callback');
}
if (!function_exists('mashup_shortcode_names_list_populate_spacer_callback')) {

    /**
     * Populate spacer shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_spacer_callback($shortcode_array) {
	$shortcode_array['spacer'] = array(
	    'title' => mashup_var_frame_text_srt('mashup_var_spacer'),
	    'name' => 'spacer',
	    'icon' => 'icon-ellipsis-h',
	    'categories' => 'contentblocks',
	);
	return $shortcode_array;
    }

    add_filter('mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_spacer_callback');
}

if (!function_exists('mashup_element_list_populate_spacer_callback')) {

    /**
     * Populate spacer shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_spacer_callback($element_list) {
	$element_list['spacer'] = mashup_var_frame_text_srt('mashup_var_spacer');
	return $element_list;
    }

    add_filter('mashup_element_list_populate', 'mashup_element_list_populate_spacer_callback');
}