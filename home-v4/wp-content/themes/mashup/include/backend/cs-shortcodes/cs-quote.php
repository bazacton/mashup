<?php
/**
 * Quotes html form for page builder
 */
if (!function_exists('mashup_var_page_builder_quote')) {

    function mashup_var_page_builder_quote($die = 0) {
	global $mashup_node, $count_node, $post, $mashup_var_html_fields, $mashup_var_form_fields;
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
	    $MASHUP_PREFIX = 'mashup_quote';
	    $parseObject = new ShortcodeParse();
	    $output = $parseObject->mashup_shortcodes($output, $shortcode_str, true, $MASHUP_PREFIX);
	}
	$defaults = array(
	    'mashup_var_column_size' => '',
	    'mashup_quote_section_title' => '',
	    'quote_cite' => '',
	    'quote_cite_url' => '#',
	    'author_position' => '',
	    'mashup_var_quote_sub_title' => '',
	    'mashup_var_quote_element_align' => '',
	);
	if (isset($output['0']['atts'])) {
	    $atts = $output['0']['atts'];
	} else {
	    $atts = array();
	}

	if (isset($output['0']['content'])) {
	    $quotes_content = $output['0']['content'];
	} else {
	    $quotes_content = '';
	}

	$quote_element_size = '100';
	foreach ($defaults as $key => $values) {
	    if (isset($atts[$key])) {
		$$key = $atts[$key];
	    } else {
		$$key = $values;
	    }
	}
	$name = 'mashup_var_page_builder_quote';
	$coloumn_class = 'column_' . $quote_element_size;
	if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') {
	    $shortcode_element = 'shortcode_element_class';
	    $shortcode_view = 'cs-pbwp-shortcode';
	    $filter_element = 'ajax-drag';
	    $coloumn_class = '';
	}
	global $mashup_var_static_text;
	$strings = new mashup_theme_all_strings;
	$strings->mashup_short_code_strings();
	?>
	<div id="<?php echo esc_attr($name . $mashup_counter) ?>_del" class="column  parentdelete <?php echo esc_attr($coloumn_class); ?>
	     <?php echo esc_attr($shortcode_view); ?>" item="quote" data="<?php echo mashup_element_size_data_array_index($quote_element_size) ?>" >
		 <?php mashup_element_setting($name, $mashup_counter, $quote_element_size) ?>
	    <div class="cs-wrapp-class-<?php echo esc_attr($mashup_counter); ?> <?php echo esc_attr($shortcode_element); ?>" id="<?php echo esc_attr($name . $mashup_counter) ?>" data-shortcode-template="[mashup_quote {{attributes}}]{{content}}[/mashup_quote]" style="display: none;"">
		<div class="cs-heading-area">
		    <h5><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_quote_edit')); ?></h5>
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
				'std' => esc_html($mashup_quote_section_title),
				'id' => 'mashup_quote_section_title',
				'cust_name' => 'mashup_quote_section_title[]',
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
				'std' => esc_attr($mashup_var_quote_sub_title),
				'cust_id' => '',
				'cust_name' => 'mashup_var_quote_sub_title[]',
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
				'std' => $mashup_var_quote_element_align,
				'id' => '',
				'cust_id' => '',
				'cust_name' => 'mashup_var_quote_element_align[]',
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
			    'name' => mashup_var_theme_text_srt('mashup_var_author'),
			    'desc' => '',
			    'hint_text' => mashup_var_theme_text_srt('mashup_var_author_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => esc_html($quote_cite),
				'id' => 'quote_cite',
				'cust_name' => 'quote_cite[]',
				'return' => true,
			    ),
			);
			$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
			$mashup_opt_array = array(
			    'name' => mashup_var_theme_text_srt('mashup_var_author_url'),
			    'desc' => '',
			    'hint_text' => mashup_var_theme_text_srt('mashup_var_author_url_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => esc_url($quote_cite_url),
				'id' => 'quote_cite_url',
				'cust_name' => 'quote_cite_url[]',
				'return' => true,
			    ),
			);
			$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
			$mashup_opt_array = array(
			    'name' => mashup_var_theme_text_srt('mashup_var_testimonial_field_position'),
			    'desc' => '',
			    'hint_text' => mashup_var_theme_text_srt('mashup_var_testimonial_field_position_hint'),
			    'echo' => true,
			    'classes' => 'txtfield',
			    'field_params' => array(
				'std' => esc_attr($author_position),
				'id' => 'author_position',
				'cust_name' => 'author_position[]',
				'return' => true,
			    ),
			);
			$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
			$mashup_opt_array = array(
			    'name' => mashup_var_theme_text_srt('mashup_var_column_field_text'),
			    'desc' => '',
			    'hint_text' => mashup_var_theme_text_srt('mashup_var_column_field_text_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => esc_attr($quotes_content),
				'cust_id' => 'quotes_content',
				'classes' => '',
				'extra_atr' => ' data-content-text="cs-shortcode-textarea"',
				'cust_name' => 'quotes_content[]',
				'return' => true,
				'mashup_editor' => true,
			    ),
			);
			$mashup_var_html_fields->mashup_var_textarea_field($mashup_opt_array);
			?>
		    </div>
		    <?php if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') { ?>
	    	    <ul class="form-elements insert-bg">
	    		<li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:mashup_shortcode_insert_editor('<?php echo esc_js(str_replace('mashup_var_page_builder_', '', $name)); ?>', '<?php echo esc_js($name . $mashup_counter); ?>', '<?php echo esc_js($filter_element); ?>')" ><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_insert')); ?></a> </li>
	    	    </ul>
	    	    <div id="results-shortocde"></div>
		    <?php } else { ?>
			<?php
			$mashup_opt_array = array(
			    'std' => 'quote',
			    'id' => '',
			    'before' => '',
			    'after' => '',
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

    add_action('wp_ajax_mashup_var_page_builder_quote', 'mashup_var_page_builder_quote');
}


if (!function_exists('mashup_save_page_builder_data_quote_callback')) {

    /**
     * Save data for quote shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_quote_callback($args) {
	$data = $args['data'];
	$counters = $args['counters'];
	$widget_type = $args['widget_type'];
	$column = $args['column'];
	if ($widget_type == "quote") {
	    $shortcode = '';
	    $quote = $column->addChild('quote');
	    $quote->addChild('page_element_size', htmlspecialchars($data['quote_element_size'][$counters['mashup_global_counter_quote']]));
	    $quote->addChild('quote_element_size', htmlspecialchars($data['quote_element_size'][$counters['mashup_global_counter_quote']]));
	    if (isset($data['mashup_widget_element_num'][$counters['mashup_counter']]) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode') {
		$shortcode_str = stripslashes(htmlspecialchars(( $data['shortcode']['quote'][$counters['mashup_shortcode_counter_quote']]), ENT_QUOTES));
		$counters['mashup_shortcode_counter_quote'] ++;
		$quote->addChild('mashup_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
	    } else {
		$shortcode = '[mashup_quote ';
		if (isset($data['mashup_quote_section_title'][$counters['mashup_counter_quote']]) && $data['mashup_quote_section_title'][$counters['mashup_counter_quote']] != '') {
		    $shortcode .= 'mashup_quote_section_title="' . stripslashes(htmlspecialchars(($data['mashup_quote_section_title'][$counters['mashup_counter_quote']]), ENT_QUOTES)) . '" ';
		}
		if (isset($data['mashup_var_quote_sub_title'][$counters['mashup_counter_quote']]) && $data['mashup_var_quote_sub_title'][$counters['mashup_counter_quote']] != '') {
		    $shortcode .= 'mashup_var_quote_sub_title="' . stripslashes(htmlspecialchars(($data['mashup_var_quote_sub_title'][$counters['mashup_counter_quote']]), ENT_QUOTES)) . '" ';
		}
		if (isset($data['mashup_var_quote_element_align'][$counters['mashup_counter_quote']]) && $data['mashup_var_quote_element_align'][$counters['mashup_counter_quote']] != '') {
		    $shortcode .= 'mashup_var_quote_element_align="' . stripslashes(htmlspecialchars(($data['mashup_var_quote_element_align'][$counters['mashup_counter_quote']]), ENT_QUOTES)) . '" ';
		}
		if (isset($data['quote_cite'][$counters['mashup_counter_quote']]) && $data['quote_cite'][$counters['mashup_counter_quote']] != '') {
		    $shortcode .= 'quote_cite="' . htmlspecialchars($data['quote_cite'][$counters['mashup_counter_quote']], ENT_QUOTES) . '" ';
		}
		if (isset($data['quote_cite_url'][$counters['mashup_counter_quote']]) && $data['quote_cite_url'][$counters['mashup_counter_quote']] != '') {
		    $shortcode .= 'quote_cite_url="' . htmlspecialchars($data['quote_cite_url'][$counters['mashup_counter_quote']], ENT_QUOTES) . '" ';
		}
		if (isset($data['author_position'][$counters['mashup_counter_quote']]) && $data['author_position'][$counters['mashup_counter_quote']] != '') {
		    $shortcode .= 'author_position="' . htmlspecialchars($data['author_position'][$counters['mashup_counter_quote']], ENT_QUOTES) . '" ';
		}
		$shortcode .= ']';
		if (isset($data['quotes_content'][$counters['mashup_counter_quote']]) && $data['quotes_content'][$counters['mashup_counter_quote']] != '') {
		    $shortcode .= htmlspecialchars($data['quotes_content'][$counters['mashup_counter_quote']], ENT_QUOTES) . ' ';
		}
		$shortcode .= '[/mashup_quote]';
		$quote->addChild('mashup_shortcode', $shortcode);
		$counters['mashup_counter_quote'] ++;
	    }
	    $counters['mashup_global_counter_quote'] ++;
	}
	return array(
	    'data' => $data,
	    'counters' => $counters,
	    'widget_type' => $widget_type,
	    'column' => $column,
	);
    }

    add_filter('mashup_save_page_builder_data', 'mashup_save_page_builder_data_quote_callback');
}

if (!function_exists('mashup_load_shortcode_counters_quote_callback')) {

    /**
     * Populate quote shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_quote_callback($counters) {
	$counters['mashup_counter_quote'] = 0;
	$counters['mashup_shortcode_counter_quote'] = 0;
	$counters['mashup_global_counter_quote'] = 0;
	return $counters;
    }

    add_filter('mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_quote_callback');
}
if (!function_exists('mashup_shortcode_names_list_populate_quote_callback')) {

    /**
     * Populate quote shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_quote_callback($shortcode_array) {
	$shortcode_array['quote'] = array(
	    'title' => mashup_var_frame_text_srt('mashup_var_quote'),
	    'name' => 'quote',
	    'icon' => 'icon-comments-o',
	    'categories' => 'typography',
	);
	return $shortcode_array;
    }

    add_filter('mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_quote_callback');
}

if (!function_exists('mashup_element_list_populate_quote_callback')) {

    /**
     * Populate quote shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_quote_callback($element_list) {
	$element_list['quote'] = mashup_var_frame_text_srt('mashup_var_quote');
	return $element_list;
    }

    add_filter('mashup_element_list_populate', 'mashup_element_list_populate_quote_callback');
}