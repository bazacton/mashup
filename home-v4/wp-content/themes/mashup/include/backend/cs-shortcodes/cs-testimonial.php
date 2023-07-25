<?php
/*
 *
 * @Shortcode Name : Testimonial
 * @retrun
 *
 */
if (!function_exists('mashup_var_page_builder_testimonial')) {

    function mashup_var_page_builder_testimonial($die = 0) {
	global $post, $mashup_node, $mashup_var_html_fields, $mashup_var_form_fields;
	$shortcode_element = '';
	$filter_element = 'filterdrag';
	$shortcode_view = '';
	$output = array();
	$mashup_counter = $_POST['counter'];
	$testimonial_num = 0;
	if (isset($_POST['action']) && !isset($_POST['shortcode_element_id'])) {
	    $MASHUP_POSTID = '';
	    $shortcode_element_id = '';
	} else {
	    $MASHUP_POSTID = $_POST['POSTID'];
	    $shortcode_element_id = $_POST['shortcode_element_id'];
	    $shortcode_str = stripslashes($shortcode_element_id);
	    $MASHUP_PREFIX = 'mashup_testimonial|testimonial_item';
	    $parseObject = new ShortcodeParse();
	    $output = $parseObject->mashup_shortcodes($output, $shortcode_str, true, $MASHUP_PREFIX);
	}
	$defaults = array(
	    'mashup_var_column_size' => '',
	    'mashup_var_testimonial_title' => '',
	    'mashup_var_testimonial_sub_title' => '',
	    'mashup_var_author_color' => '',
	    'mashup_var_position_color' => '',
	    'mashup_var_testimonial_element_align' => ''
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
	if (is_array($atts_content)) {
	    $testimonial_num = count($atts_content);
	}
	$testimonial_element_size = '100';
	foreach ($defaults as $key => $values) {
	    if (isset($atts[$key])) {
		$$key = $atts[$key];
	    } else {
		$$key = $values;
	    }
	}
	$mashup_var_testimonial_title = isset($mashup_var_testimonial_title) ? $mashup_var_testimonial_title : '';
	$mashup_var_testimonial_element_align = isset($mashup_var_testimonial_element_align) ? $mashup_var_testimonial_element_align : '';
	$mashup_var_testimonial_sub_title = isset($mashup_var_testimonial_sub_title) ? $mashup_var_testimonial_sub_title : '';
	$mashup_var_testimonial_content = isset($mashup_var_testimonial_content) ? $mashup_var_testimonial_content : '';
	$mashup_var_author_color = isset($mashup_var_author_color) ? $mashup_var_author_color : '';
	$mashup_var_position_color = isset($mashup_var_position_color) ? $mashup_var_position_color : '';
	$name = 'mashup_var_page_builder_testimonial';
	$coloumn_class = 'column_' . $testimonial_element_size;
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
	<div id="<?php echo mashup_allow_special_char($name . $mashup_counter) ?>_del" class="column  parentdelete <?php echo mashup_allow_special_char($coloumn_class); ?> <?php echo mashup_allow_special_char($shortcode_view); ?>" item="testimonial" data="<?php echo mashup_element_size_data_array_index($testimonial_element_size) ?>" >
	    <?php mashup_element_setting($name, $mashup_counter, $testimonial_element_size, '', 'comments-o', $type = ''); ?>
	    <div class="cs-wrapp-class-<?php echo mashup_allow_special_char($mashup_counter) ?> <?php echo mashup_allow_special_char($shortcode_element); ?>" id="<?php echo mashup_allow_special_char($name . $mashup_counter) ?>" style="display: none;">
		<div class="cs-heading-area">
		    <h5><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_testimonial_edit')); ?></h5>
		    <a href="javascript:mashup_frame_removeoverlay('<?php echo mashup_allow_special_char($name . $mashup_counter) ?>','<?php echo mashup_allow_special_char($filter_element); ?>')" class="cs-btnclose"><i class="icon-cancel"></i></a>
		</div>
		<div class="cs-clone-append cs-pbwp-content">
		    <div class="cs-wrapp-tab-box">
			<div id="shortcode-item-<?php echo mashup_allow_special_char($mashup_counter); ?>" data-shortcode-template="{{child_shortcode}} [/mashup_testimonial]" data-shortcode-child-template="[testimonial_item {{attributes}}] {{content}} [/testimonial_item]">
			    <div class="cs-wrapp-clone cs-shortcode-wrapp cs-disable-true cs-pbwp-content" data-template="[mashup_testimonial {{attributes}}]">
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
					'std' => esc_attr($mashup_var_testimonial_title),
					'cust_id' => '',
					'cust_name' => 'mashup_var_testimonial_title[]',
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
					'std' => esc_attr($mashup_var_testimonial_sub_title),
					'cust_id' => '',
					'cust_name' => 'mashup_var_testimonial_sub_title[]',
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
					'std' => $mashup_var_testimonial_element_align,
					'id' => '',
					'cust_id' => '',
					'cust_name' => 'mashup_var_testimonial_element_align[]',
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
				    'name' => mashup_var_theme_text_srt('mashup_var_testimonial_author_color'),
				    'desc' => '',
				    'hint_text' => '',
				    'echo' => true,
				    'field_params' => array(
					'std' => esc_attr($mashup_var_author_color),
					'cust_id' => 'mashup_var_author_color' . $mashup_counter,
					'classes' => 'bg_color',
					'cust_name' => 'mashup_var_author_color[]',
					'return' => true,
				    ),
				);
				$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
				$mashup_opt_array = array(
				    'name' => mashup_var_theme_text_srt('mashup_var_testimonial_position_color'),
				    'desc' => '',
				    'hint_text' => '',
				    'echo' => true,
				    'field_params' => array(
					'std' => esc_attr($mashup_var_position_color),
					'cust_id' => 'mashup_var_position_color' . $mashup_counter,
					'classes' => 'bg_color',
					'cust_name' => 'mashup_var_position_color[]',
					'return' => true,
				    ),
				);
				$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
				?>
			    </div>
			    <?php
			    if (isset($testimonial_num) && $testimonial_num <> '' && isset($atts_content) && is_array($atts_content)) {
				foreach ($atts_content as $testimonial) {
				    $rand_string = rand(123456, 987654);
				    $mashup_var_testimonial_content = $testimonial['content'];
				    $defaults = array('mashup_var_testimonial_author' => '', 'mashup_var_testimonial_author_image_array' => '', 'mashup_var_testimonial_position' => '');
				    foreach ($defaults as $key => $values) {
					if (isset($testimonial['atts'][$key])) {
					    $$key = $testimonial['atts'][$key];
					} else {
					    $$key = $values;
					}
				    }
				    $mashup_var_testimonial_author = isset($mashup_var_testimonial_author) ? $mashup_var_testimonial_author : '';
				    $mashup_var_testimonial_position = isset($mashup_var_testimonial_position) ? $mashup_var_testimonial_position : '';
				    $mashup_var_testimonial_author_image_array = isset($mashup_var_testimonial_author_image_array) ? $mashup_var_testimonial_author_image_array : '';
				    ?>
				    <div class='cs-wrapp-clone cs-shortcode-wrapp cs-pbwp-content' id="mashup_infobox_<?php echo mashup_allow_special_char($rand_string); ?>">
					<header>
					    <h4><i class='icon-arrows'></i><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_testimonial')); ?></h4>
					    <a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_tabs_remove')); ?></a>
					</header>
					<?php
					$mashup_opt_array = array(
					    'name' => mashup_var_theme_text_srt('mashup_var_testimonial_field_text'),
					    'desc' => '',
					    'hint_text' => mashup_var_theme_text_srt('mashup_var_testimonial_field_text_hint'),
					    'echo' => true,
					    'field_params' => array(
						'std' => esc_attr($mashup_var_testimonial_content),
						'cust_id' => '',
						'extra_atr' => 'data-content-text="cs-shortcode-textarea"',
						'cust_name' => 'mashup_var_testimonial_content[]',
						'return' => true,
						'classes' => '',
						'mashup_editor' => true,
					    ),
					);
					$mashup_var_html_fields->mashup_var_textarea_field($mashup_opt_array);
					$mashup_opt_array = array(
					    'name' => mashup_var_theme_text_srt('mashup_var_testimonial_field_author'),
					    'desc' => '',
					    'hint_text' => mashup_var_theme_text_srt('mashup_var_testimonial_field_author_hint'),
					    'echo' => true,
					    'classes' => 'txtfield',
					    'field_params' => array(
						'std' => esc_attr($mashup_var_testimonial_author),
						'cust_id' => '',
						'cust_name' => 'mashup_var_testimonial_author[]',
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
						'std' => esc_attr($mashup_var_testimonial_position),
						'cust_id' => '',
						'cust_name' => 'mashup_var_testimonial_position[]',
						'return' => true,
					    ),
					);
					$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
					$mashup_opt_array = array(
					    'std' => esc_url($mashup_var_testimonial_author_image_array),
					    'id' => 'testimonial_author_image',
					    'name' => mashup_var_theme_text_srt('mashup_var_testimonial_field_image'),
					    'desc' => '',
					    'hint_text' => mashup_var_theme_text_srt('mashup_var_testimonial_field_image_hint'),
					    'echo' => true,
					    'array' => true,
					    'prefix' => '',
					    'field_params' => array(
						'std' => esc_url($mashup_var_testimonial_author_image_array),
						'id' => 'testimonial_author_image',
						'return' => true,
						'array' => true,
						'array_txt' => false,
						'prefix' => '',
					    ),
					);
					$mashup_var_html_fields->mashup_var_upload_file_field($mashup_opt_array);
					?>
				    </div>
				    <?php
				}
			    }
			    ?>
			</div>
			<div class="hidden-object">
			    <?php
			    $mashup_opt_array = array(
				'std' => mashup_allow_special_char($testimonial_num),
				'id' => '',
				'before' => '',
				'after' => '',
				'classes' => 'fieldCounter',
				'extra_atr' => '',
				'cust_id' => '',
				'cust_name' => 'testimonial_num[]',
				'return' => false,
				'required' => false
			    );
			    $mashup_var_form_fields->mashup_var_form_hidden_render($mashup_opt_array);
			    ?>
			</div>
			<div class="wrapptabbox cs-pbwp-content cs-zero-padding">
			    <div class="opt-conts">
				<ul class="form-elements">
				    <li class="to-field"> <a href="javascript:void(0);" class="add_servicesss cs-main-btn" onclick="mashup_shortcode_element_ajax_call('testimonial', 'shortcode-item-<?php echo mashup_allow_special_char($mashup_counter); ?>', '<?php echo admin_url('admin-ajax.php'); ?>')"><i class="icon-plus-circle"></i><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_add_testimonial')); ?></a> </li>
				    <div id="loading" class="shortcodeload"></div>
				</ul>
				<?php if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') { ?>
	    			<ul class="form-elements insert-bg noborder">
	    			    <li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:mashup_shortcode_insert_editor('<?php echo str_replace('mashup_var_page_builder_', '', $name); ?>', 'shortcode-item-<?php echo mashup_allow_special_char($mashup_counter); ?>', '<?php echo mashup_allow_special_char($filter_element); ?>')" ><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_insert')); ?></a> </li>
	    			</ul>
	    			<div id="results-shortocde"></div>
				<?php } else { ?>
				    <?php
				    $mashup_opt_array = array(
					'std' => 'testimonial',
					'id' => '',
					'before' => '',
					'after' => '',
					'classes' => '',
					'extra_atr' => '',
					'cust_id' => 'mashup_orderby' . $mashup_counter,
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
					    'cust_id' => 'testimonial_save' . $mashup_counter,
					    'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
					    'cust_type' => 'button',
					    'classes' => 'cs-mashup-admin-btn',
					    'cust_name' => 'testimonial_save',
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
	    </div>
	</div>

	<?php
	if ($die <> 1) {
	    die();
	}
    }

    add_action('wp_ajax_mashup_var_page_builder_testimonial', 'mashup_var_page_builder_testimonial');
}

if (!function_exists('mashup_save_page_builder_data_testimonial_callback')) {

    /**
     * Save data for testimonial shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_testimonial_callback($args) {

	$data = $args['data'];
	$counters = $args['counters'];
	$widget_type = $args['widget_type'];
	$column = $args['column'];
	if ($widget_type == "testimonial") {

	    $shortcode = $shortcode_item = '';
	    $testimonial = $column->addChild('testimonial');
	    $testimonial->addChild('page_element_size', htmlspecialchars($data['testimonial_element_size'][$counters['mashup_global_counter_testimonial']]));
	    $testimonial->addChild('testimonial_element_size', htmlspecialchars($data['testimonial_element_size'][$counters['mashup_global_counter_testimonial']]));
	    if (isset($data['mashup_widget_element_num'][$counters['mashup_counter']]) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode') {
		$shortcode_str = stripslashes($data['shortcode']['testimonial'][$counters['mashup_shortcode_counter_testimonial']]);
		$counters['mashup_shortcode_counter_testimonial'] ++;
		$testimonial->addChild('mashup_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
	    } else {
		if (isset($data['testimonial_num'][$counters['mashup_counter_testimonial']]) && $data['testimonial_num'][$counters['mashup_counter_testimonial']] > 0) {
		    for ($i = 1; $i <= $data['testimonial_num'][$counters['mashup_counter_testimonial']]; $i ++) {
			$shortcode_item .= '[testimonial_item ';

			if (isset($data['mashup_var_testimonial_author'][$counters['mashup_counter_testimonial_node']]) && $data['mashup_var_testimonial_author'][$counters['mashup_counter_testimonial_node']] != '') {
			    $shortcode_item .= 'mashup_var_testimonial_author="' . htmlspecialchars($data['mashup_var_testimonial_author'][$counters['mashup_counter_testimonial_node']], ENT_QUOTES) . '" ';
			}
			if (isset($data['mashup_var_testimonial_position'][$counters['mashup_counter_testimonial_node']]) && $data['mashup_var_testimonial_position'][$counters['mashup_counter_testimonial_node']] != '') {
			    $shortcode_item .= 'mashup_var_testimonial_position="' . htmlspecialchars($data['mashup_var_testimonial_position'][$counters['mashup_counter_testimonial_node']], ENT_QUOTES) . '" ';
			}
			if (isset($data['mashup_var_testimonial_author_image_array'][$counters['mashup_counter_testimonial_node']]) && $data['mashup_var_testimonial_author_image_array'][$counters['mashup_counter_testimonial_node']] != '') {
			    $shortcode_item .= 'mashup_var_testimonial_author_image_array="' . htmlspecialchars($data['mashup_var_testimonial_author_image_array'][$counters['mashup_counter_testimonial_node']], ENT_QUOTES) . '" ';
			}
			$shortcode_item .= ']';
			if (isset($data['mashup_var_testimonial_content'][$counters['mashup_counter_testimonial_node']]) && $data['mashup_var_testimonial_content'][$counters['mashup_counter_testimonial_node']] != '') {
			    $shortcode_item .= htmlspecialchars($data['mashup_var_testimonial_content'][$counters['mashup_counter_testimonial_node']], ENT_QUOTES);
			}
			$shortcode_item .= '[/testimonial_item]';
			$counters['mashup_counter_testimonial_node'] ++;
		    }
		}
		$section_title = '';
		if (isset($data['mashup_var_testimonial_title'][$counters['mashup_counter_testimonial']]) && $data['mashup_var_testimonial_title'][$counters['mashup_counter_testimonial']] != '') {
		    $section_title .= 'mashup_var_testimonial_title="' . htmlspecialchars($data['mashup_var_testimonial_title'][$counters['mashup_counter_testimonial']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_author_color'][$counters['mashup_counter_testimonial']]) && $data['mashup_var_author_color'][$counters['mashup_counter_testimonial']] != '') {
		    $section_title .= 'mashup_var_author_color="' . htmlspecialchars($data['mashup_var_author_color'][$counters['mashup_counter_testimonial']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_position_color'][$counters['mashup_counter_testimonial']]) && $data['mashup_var_position_color'][$counters['mashup_counter_testimonial']] != '') {
		    $section_title .= 'mashup_var_position_color="' . htmlspecialchars($data['mashup_var_position_color'][$counters['mashup_counter_testimonial']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_testimonial_sub_title'][$counters['mashup_counter_testimonial']]) && $data['mashup_var_testimonial_sub_title'][$counters['mashup_counter_testimonial']] != '') {
		    $section_title .= 'mashup_var_testimonial_sub_title="' . htmlspecialchars($data['mashup_var_testimonial_sub_title'][$counters['mashup_counter_testimonial']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_testimonial_element_align'][$counters['mashup_counter_testimonial']]) && $data['mashup_var_testimonial_element_align'][$counters['mashup_counter_testimonial']] != '') {
		    $section_title .= 'mashup_var_testimonial_element_align="' . htmlspecialchars($data['mashup_var_testimonial_element_align'][$counters['mashup_counter_testimonial']], ENT_QUOTES) . '" ';
		}
		$shortcode = '[mashup_testimonial ' . $section_title . ' ]' . $shortcode_item . '[/mashup_testimonial]';
		$testimonial->addChild('mashup_shortcode', $shortcode);
		$counters['mashup_counter_testimonial'] ++;
	    }
	    $counters['mashup_global_counter_testimonial'] ++;
	}
	return array(
	    'data' => $data,
	    'counters' => $counters,
	    'widget_type' => $widget_type,
	    'column' => $column,
	);
    }

    add_filter('mashup_save_page_builder_data', 'mashup_save_page_builder_data_testimonial_callback');
}

if (!function_exists('mashup_load_shortcode_counters_testimonial_callback')) {

    /**
     * Populate testimonial shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_testimonial_callback($counters) {
	$counters['mashup_counter_testimonial'] = 0;
	$counters['mashup_counter_testimonial_node'] = 0;
	$counters['mashup_shortcode_counter_testimonial'] = 0;
	$counters['mashup_global_counter_testimonial'] = 0;
	return $counters;
    }

    add_filter('mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_testimonial_callback');
}

if (!function_exists('mashup_shortcode_names_list_populate_testimonial_callback')) {

    /**
     * Populate testimonial shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_testimonial_callback($shortcode_array) {
	$shortcode_array['testimonial'] = array(
	    'title' => mashup_var_frame_text_srt('mashup_var_testimonial'),
	    'name' => 'testimonial',
	    'icon' => 'icon-comments-o',
	    'categories' => 'loops',
	);
	return $shortcode_array;
    }

    add_filter('mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_testimonial_callback');
}

if (!function_exists('mashup_element_list_populate_testimonial_callback')) {

    /**
     * Populate testimonial shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_testimonial_callback($element_list) {
	$element_list['testimonial'] = mashup_var_frame_text_srt('mashup_var_testimonial');
	return $element_list;
    }

    add_filter('mashup_element_list_populate', 'mashup_element_list_populate_testimonial_callback');
}

if (!function_exists('mashup_shortcode_sub_element_ui_testimonial_callback')) {

    /**
     * Render UI for sub element in testimonial settings.
     *
     * @param	array $args
     */
    function mashup_shortcode_sub_element_ui_testimonial_callback($args) {
	$type = $args['type'];
	$mashup_var_html_fields = $args['html_fields'];
	if ($type == 'testimonial') {
	    $rand_id = rand(324335, 9234299);
	    ?>
	    <div class='cs-wrapp-clone cs-shortcode-wrapp cs-pbwp-content'  id="mashup_infobox_<?php echo intval($rand_id); ?>">
	        <header>
	    	<h4><i class='icon-arrows'></i><?php echo esc_html(mashup_var_frame_text_srt('mashup_var_testimonial')); ?></h4>
	    	<a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo esc_html(mashup_var_frame_text_srt('mashup_var_remove')); ?></a>
	        </header>
		<?php
		$mashup_opt_array = array(
		    'name' => mashup_var_frame_text_srt('mashup_var_testimonial_text'),
		    'desc' => '',
		    'hint_text' => mashup_var_frame_text_srt('mashup_var_text_hint'),
		    'echo' => true,
		    'field_params' => array(
			'std' => '',
			'cust_id' => '',
			'extra_atr' => 'data-content-text="cs-shortcode-textarea"',
			'cust_name' => 'mashup_var_testimonial_content[]',
			'return' => true,
			'classes' => '',
			'mashup_editor' => true,
		    ),
		);

		$mashup_var_html_fields->mashup_var_textarea_field($mashup_opt_array);
		$mashup_opt_array = array(
		    'name' => mashup_var_frame_text_srt('mashup_var_author'),
		    'desc' => '',
		    'hint_text' => mashup_var_frame_text_srt('mashup_var_author_hint'),
		    'echo' => true,
		    'classes' => 'txtfield',
		    'field_params' => array(
			'std' => '',
			'cust_id' => '',
			'cust_name' => 'mashup_var_testimonial_author[]',
			'return' => true,
		    ),
		);

		$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);

		$mashup_opt_array = array(
		    'name' => mashup_var_frame_text_srt('mashup_var_position'),
		    'desc' => '',
		    'hint_text' => mashup_var_frame_text_srt('mashup_var_position_hint'),
		    'echo' => true,
		    'classes' => 'txtfield',
		    'field_params' => array(
			'std' => '',
			'cust_id' => '',
			'cust_name' => 'mashup_var_testimonial_position[]',
			'return' => true,
		    ),
		);

		$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);

		$mashup_opt_array = array(
		    'std' => '',
		    'id' => 'testimonial_author_image',
		    'name' => mashup_var_frame_text_srt('mashup_var_image'),
		    'desc' => '',
		    'hint_text' => mashup_var_frame_text_srt('mashup_var_image_hint'),
		    'echo' => true,
		    'array' => true,
		    'prefix' => '',
		    'field_params' => array(
			'std' => '',
			'id' => 'testimonial_author_image',
			'return' => true,
			'array' => true,
			'array_txt' => false,
			'prefix' => '',
		    ),
		);

		$mashup_var_html_fields->mashup_var_upload_file_field($mashup_opt_array);
		?>
	    </div>
	    <?php
	}
    }

    add_action('mashup_shortcode_sub_element_ui', 'mashup_shortcode_sub_element_ui_testimonial_callback');
}