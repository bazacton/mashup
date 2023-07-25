<?php
/*
 *
 * @Shortcode Name : Table
 * @retrun
 *
 */
if (!function_exists('mashup_var_page_builder_table')) {

    function mashup_var_page_builder_table($die = 0) {
	global $mashup_node, $mashup_count_node, $post, $mashup_var_html_fields, $mashup_var_form_fields, $mashup_var_static_text;
	$shortcode_element = '';
	$filter_element = 'filterdrag';
	$shortcode_view = '';
	$output = array();
	$PREFIX = 'mashup_table';
	$defaultAttributes = false;
	$parseObject = new ShortcodeParse();
	$mashup_counter = $_POST['counter'];
	if (isset($_POST['action']) && !isset($_POST['shortcode_element_id'])) {
	    $POSTID = '';
	    $shortcode_element_id = '';
	    $defaultAttributes = true;
	} else {
	    $POSTID = $_POST['POSTID'];
	    $shortcode_element_id = $_POST['shortcode_element_id'];
	    $shortcode_str = stripslashes($shortcode_element_id);
	    $output = $parseObject->mashup_shortcodes($output, $shortcode_str, true, $PREFIX);
	}
	$defaults = array('mashup_var_column_size' => '1/2', 'mashup_table_element_title' => '', 'mashup_table_content' => '', 'mashup_table_class' => '', 'mashup_var_table_sub_title' => '', 'mashup_var_table_align' => '',);
	if (isset($output['0']['atts'])) {
	    $atts = $output['0']['atts'];
	} else {
	    $atts = array();
	}
	$atts_content = '[table]
                            [thead]
                              [tr]
                                [th]Column 1[/th]
                                [th]Column 2[/th]
                                [th]Column 3[/th]
                                [th]Column 4[/th]
                              [/tr]
                            [/thead]
                            [tbody]
                              [tr]
                                [td]Item 1[/td]
                                [td]Item 2[/td]
                                [td]Item 3[/td]
                                [td]Item 4[/td]
                              [/tr]
                              [tr]
                                [td]Item 11[/td]
                                [td]Item 22[/td]
                                [td]Item 33[/td]
                                [td]Item 44[/td]
                              [/tr]
                            [/tbody]
                        [/table]';

	if ($defaultAttributes) {
	    $atts_content = $atts_content;
	} else {
	    if (isset($output['0']['content'])) {
		$atts_content = $output['0']['content'];
	    } else {
		$atts_content = "";
	    }
	}
	$table_element_size = '25';
	foreach ($defaults as $key => $values) {
	    if (isset($atts[$key])) {
		$$key = $atts[$key];
	    } else {
		$$key = $values;
	    }
	}
	$name = 'mashup_var_page_builder_table';
	$mashup_count_node ++;
	$coloumn_class = 'column_' . $table_element_size;
	if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') {
	    $shortcode_element = 'shortcode_element_class';
	    $shortcode_view = 'cs-pbwp-shortcode';
	    $filter_element = 'ajax-drag';
	    $coloumn_class = '';
	}
	$strings = new mashup_theme_all_strings;
	$strings->mashup_short_code_strings();
	?>
	<div id="<?php echo esc_attr($name . $mashup_counter); ?>_del" class="column  parentdelete <?php echo esc_attr($coloumn_class); ?> <?php echo esc_attr($shortcode_view); ?>" item="table" data="<?php echo mashup_element_size_data_array_index($table_element_size) ?>" >
	    <?php mashup_element_setting($name, $mashup_counter, $table_element_size, '', 'th'); ?>
	    <div class="cs-wrapp-class-<?php echo esc_attr($mashup_counter) ?> <?php echo esc_attr($shortcode_element); ?>" id="<?php echo esc_attr($name . $mashup_counter) ?>"  data-shortcode-template="[mashup_table {{attributes}}] {{content}} [/mashup_table]"  style="display: none;">
		<div class="cs-heading-area">
		    <h5><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_table_options')); ?></h5>
		    <a href="javascript:mashup_frame_removeoverlay('<?php echo esc_attr($name . $mashup_counter) ?>','<?php echo esc_attr($filter_element); ?>')" class="cs-btnclose"><i class="icon-cancel"></i></a> </div>
		<div class="cs-pbwp-content">
		    <div class="cs-wrapp-clone cs-shortcode-wrapp cs-pbwp-content">
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
				'std' => mashup_allow_special_char($mashup_table_element_title),
				'cust_id' => '',
				'classes' => 'txtfield',
				'cust_name' => 'mashup_table_element_title[]',
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
				'std' => mashup_allow_special_char($mashup_var_table_sub_title),
				'id' => 'mashup_var_table_sub_title',
				'cust_name' => 'mashup_var_table_sub_title[]',
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
				'std' => $mashup_var_tab_align,
				'id' => '',
				'cust_id' => '',
				'cust_name' => 'mashup_var_table_align[]',
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
			    'name' => mashup_var_theme_text_srt('mashup_var_table_content'),
			    'desc' => '',
			    'hint_text' => mashup_var_theme_text_srt('mashup_var_table_content_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => esc_textarea($atts_content),
				'cust_id' => '',
				'classes' => '',
				'cust_name' => 'mashup_table_content[]',
				'return' => true,
				'extra_atr' => 'data-content-text="cs-shortcode-textarea"',
			    ),
			);
			$mashup_var_html_fields->mashup_var_textarea_field($mashup_opt_array);
			if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') {
			    ?>
	    		<ul class="form-elements insert-bg noborder cs-insert-noborder">
	    		    <li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:mashup_shortcode_insert_editor('<?php echo esc_js(str_replace('mashup_var_page_builder_', '', $name)); ?>', '<?php echo esc_js($name . $mashup_counter) ?>', '<?php echo esc_js($filter_element); ?>')" ><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_insert')); ?></a> </li>
	    		</ul>
	    		<div id="results-shortocde"></div>
			    <?php
			} else {
			    $mashup_opt_array = array(
				'std' => 'table',
				'id' => '',
				'before' => '',
				'after' => '',
				'classes' => '',
				'extra_atr' => '',
				'cust_id' => '',
				'cust_name' => 'mashup_orderby[]',
				'return' => true,
				'required' => false
			    );
			    echo mashup_allow_special_char($mashup_var_form_fields->mashup_var_form_hidden_render($mashup_opt_array));
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
			}
			?>
			
		    </div>
		</div>
	    </div>
	</div>
	<?php
	if ($die <> 1) {
	    die();
	}
    }

    add_action('wp_ajax_mashup_var_page_builder_table', 'mashup_var_page_builder_table');
}
if (!function_exists('mashup_save_page_builder_data_table_callback')) {

    /**
     * Save data for table shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_table_callback($args) {
	$data = $args['data'];
	$counters = $args['counters'];
	$widget_type = $args['widget_type'];
	$column = $args['column'];
	if ($widget_type == "table") {
	    $shortcode = '';
	    $table = $column->addChild('table');
	    $table->addChild('table_element_size', $data['table_element_size'][$counters['mashup_global_counter_table']]);
	    $table->addChild('page_element_size', $data['table_element_size'][$counters['mashup_global_counter_table']]);
	    if (isset($data['mashup_widget_element_num'][$counters['mashup_counter']]) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode') {
		$shortcode_str = stripslashes($data['shortcode']['table'][$counters['mashup_shortcode_counter_table']]);
		$counters['mashup_shortcode_counter_table'] ++;
		$table->addChild('mashup_shortcode', htmlspecialchars($shortcode_str));
	    } else {
		$shortcode .= '[mashup_table ';
		if (isset($data['mashup_table_element_title'][$counters['mashup_counter_table']]) && $data['mashup_table_element_title'][$counters['mashup_counter_table']] != '') {
		    $shortcode .= ' mashup_table_element_title="' . htmlspecialchars($data['mashup_table_element_title'][$counters['mashup_counter_table']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_table_sub_title'][$counters['mashup_counter_table']]) && $data['mashup_var_table_sub_title'][$counters['mashup_counter_table']] != '') {
		    $shortcode .= ' mashup_var_table_sub_title="' . htmlspecialchars($data['mashup_var_table_sub_title'][$counters['mashup_counter_table']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_table_align'][$counters['mashup_counter_table']]) && $data['mashup_var_table_align'][$counters['mashup_counter_table']] != '') {
		    $shortcode .= ' mashup_var_table_align="' . htmlspecialchars($data['mashup_var_table_align'][$counters['mashup_counter_table']], ENT_QUOTES) . '" ';
		}
		$shortcode .= ']';
		if (isset($data['mashup_table_content'][$counters['mashup_counter_table']]) && $data['mashup_table_content'][$counters['mashup_counter_table']] != '') {
		    $shortcode .= htmlspecialchars($data['mashup_table_content'][$counters['mashup_counter_table']], ENT_QUOTES);
		}
		$shortcode .='[/mashup_table]';
		$table->addChild('mashup_shortcode', $shortcode);
		$counters['mashup_counter_table'] ++;
	    }
	    $counters['mashup_global_counter_table'] ++;
	}
	return array(
	    'data' => $data,
	    'counters' => $counters,
	    'widget_type' => $widget_type,
	    'column' => $column,
	);
    }

    add_filter('mashup_save_page_builder_data', 'mashup_save_page_builder_data_table_callback');
}

if (!function_exists('mashup_load_shortcode_counters_table_callback')) {

    /**
     * Populate spacer shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_table_callback($counters) {
	$counters['mashup_counter_table'] = 0;
	$counters['mashup_global_counter_table'] = 0;
	$counters['mashup_shortcode_counter_table'] = 0;
	return $counters;
    }

    add_filter('mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_table_callback');
}
if (!function_exists('mashup_shortcode_names_list_populate_table_callback')) {

    /**
     * Populate table shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_table_callback($shortcode_array) {
	$shortcode_array['table'] = array(
	    'title' => mashup_var_frame_text_srt('mashup_var_table'),
	    'name' => 'table',
	    'icon' => 'icon-th',
	    'categories' => 'contentblocks',
	);
	return $shortcode_array;
    }

    add_filter('mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_table_callback');
}

if (!function_exists('mashup_element_list_populate_table_callback')) {

    /**
     * Populate table shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_table_callback($element_list) {
	$element_list['table'] = mashup_var_frame_text_srt('mashup_var_table');
	return $element_list;
    }

    add_filter('mashup_element_list_populate', 'mashup_element_list_populate_table_callback');
}