<?php
/*
 *
 * @File : Image Frame 
 * @retrun
 *
 */

if (!function_exists('mashup_var_page_builder_promobox')) {

    function mashup_var_page_builder_promobox($die = 0) {
	global $post, $mashup_node, $mashup_var_html_fields, $coloumn_class, $mashup_var_form_fields, $mashup_var_static_text;

	if (function_exists('mashup_shortcode_names')) {
	    $shortcode_element = '';
	    $filter_element = 'filterdrag';
	    $shortcode_view = '';
	    $mashup_output = array();
	    $MASHUP_PREFIX = 'mashup_promobox';
	    $mashup_counter = isset($_POST['mashup_counter']) ? $_POST['mashup_counter'] : '';
	    $mashup_counter = ($mashup_counter == '') ? $_POST['counter'] : $mashup_counter;
	    if (isset($_POST['action']) && !isset($_POST['shortcode_element_id'])) {
		$MASHUP_POSTID = '';
		$shortcode_element_id = '';
	    } else {
		$MASHUP_POSTID = isset($_POST['POSTID']) ? $_POST['POSTID'] : '';
		$shortcode_element_id = isset($_POST['shortcode_element_id']) ? $_POST['shortcode_element_id'] : '';
		$shortcode_str = stripslashes($shortcode_element_id);
		$parseObject = new ShortcodeParse();
		$mashup_output = $parseObject->mashup_shortcodes($mashup_output, $shortcode_str, true, $MASHUP_PREFIX);
	    }
	    $defaults = array(
		'mashup_var_column' => '',
		'mashup_var_image_section_title' => '',
		'mashup_promobox_select_background' => '',
		'mashup_var_promobox_button_title' => '',
		'mashup_var_frame_image_url_array' => '',
		'mashup_var_frame_promo_image_url_array' => '',
		'mashup_promobox_button_bg_color' => '',
		'mashup_promobox_bg_color' => '',
		'mashup_var_promobox_title' => '',
		'mashup_var_promobox_button_url' => '',
		'mashup_promobox_title_color' => '',
		'mashup_var_promobox_sub_title' => '',
		'mashup_var_promobox_element_align' => '',
	    );
	    if (isset($mashup_output['0']['atts'])) {
		$atts = $mashup_output['0']['atts'];
	    } else {
		$atts = array();
	    }
	    if (isset($mashup_output['0']['content'])) {
		$mashup_var_image_description = $mashup_output['0']['content'];
	    } else {
		$mashup_var_image_description = '';
	    }
	    $promobox_element_size = '25';
	    foreach ($defaults as $key => $values) {
		if (isset($atts[$key])) {
		    $$key = $atts[$key];
		} else {
		    $$key = $values;
		}
	    }
	    $name = 'mashup_var_page_builder_promobox';
	    $coloumn_class = 'column_' . $promobox_element_size;
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
		 <?php echo esc_attr($shortcode_view); ?>" item="promobox" data="<?php echo mashup_element_size_data_array_index($promobox_element_size) ?>" >
		     <?php mashup_element_setting($name, $mashup_counter, $promobox_element_size) ?>
	        <div class="cs-wrapp-class-<?php echo intval($mashup_counter) ?>
		     <?php echo esc_attr($shortcode_element); ?>" id="<?php echo esc_attr($name . $mashup_counter) ?>" data-shortcode-template="[mashup_promobox {{attributes}}]{{content}}[/mashup_promobox]" style="display: none;">
	    	<div class="cs-heading-area" data-counter="<?php echo esc_attr($mashup_counter) ?>">
	    	    <h5><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_promo_box_options')); ?></h5>
	    	    <a href="javascript:mashup_frame_removeoverlay('<?php echo esc_js($name . $mashup_counter) ?>','<?php echo esc_js($filter_element); ?>')" class="cs-btnclose">
	    		<i class="icon-cancel"></i>
	    	    </a>
	    	</div>
	    	<div class="cs-pbwp-content">
	    	    <div class="cs-wrapp-clone cs-shortcode-wrapp">
			    <?php
			    if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') {
				mashup_shortcode_element_size();
			    }
			    $mashup_opt_array = array(
				'name' => mashup_var_theme_text_srt('mashup_var_image_field_name'),
				'desc' => '',
				'hint_text' => mashup_var_theme_text_srt('mashup_var_image_field_name_hint'),
				'echo' => true,
				'field_params' => array(
				    'std' => esc_attr($mashup_var_image_section_title),
				    'cust_id' => 'mashup_var_image_section_title' . $mashup_counter,
				    'classes' => '',
				    'cust_name' => 'mashup_var_image_section_title[]',
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
				    'std' => esc_attr($mashup_var_promobox_sub_title),
				    'cust_id' => '',
				    'cust_name' => 'mashup_var_promobox_sub_title[]',
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
				    'std' => $mashup_var_promobox_element_align,
				    'id' => '',
				    'cust_id' => '',
				    'cust_name' => 'mashup_var_promobox_element_align[]',
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
				'name' => mashup_var_theme_text_srt('mashup_var_promobox_background'),
				'desc' => '',
				'hint_text' => mashup_var_theme_text_srt('mashup_var_promobox_background_hint'),
				'echo' => true,
				'field_params' => array(
				    'std' => $mashup_promobox_select_background,
				    'id' => '',
				    'cust_name' => 'mashup_promobox_select_background[]',
				    'classes' => 'dropdown chosen-select',
				    'extra_atr' => '',
				    'options' => array(
					'image' => mashup_var_theme_text_srt('mashup_var_promobox_background_image'),
					'color' => mashup_var_theme_text_srt('mashup_var_promobox_background_color'),
				    ),
				    'return' => true,
				),
			    );
			    $mashup_opt_array = array(
				'std' => esc_url($mashup_var_frame_image_url_array),
				'id' => 'frame_image_url',
				'name' => mashup_var_theme_text_srt('mashup_var_promobox_image_field_url'),
				'desc' => '',
				'hint_text' => mashup_var_theme_text_srt('mashup_var_promobox_image_field_url_hint'),
				'echo' => true,
				'array' => true,
				'prefix' => '',
				'field_params' => array(
				    'std' => esc_url($mashup_var_frame_image_url_array),
				    'id' => 'frame_image_url',
				    'return' => true,
				    'array' => true,
				    'array_txt' => false,
				    'prefix' => '',
				),
			    );
			    $mashup_var_html_fields->mashup_var_upload_file_field($mashup_opt_array);
			    $mashup_opt_array = array(
				'name' => mashup_var_theme_text_srt('mashup_var_promobox_bg_color_field'),
				'desc' => '',
				'hint_text' => mashup_var_theme_text_srt('mashup_var_promobox_bg_color_field_hint'),
				'echo' => true,
				'field_params' => array(
				    'std' => esc_html($mashup_promobox_bg_color),
				    'id' => 'mashup_promobox_bg_color',
				    'cust_name' => 'mashup_promobox_bg_color[]',
				    'classes' => 'bg_color',
				    'return' => true,
				),
			    );
			    $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
			    //image
			    $mashup_opt_array = array(
				'std' => esc_url($mashup_var_frame_promo_image_url_array),
				'id' => 'frame_promo_image_url',
				'name' => mashup_var_theme_text_srt('mashup_var_promobox_select_image'),
				'desc' => '',
				'hint_text' => mashup_var_theme_text_srt('mashup_var_promobox_select_image_hint'),
				'echo' => true,
				'array' => true,
				'prefix' => '',
				'field_params' => array(
				    'std' => esc_url($mashup_var_frame_promo_image_url_array),
				    'id' => 'frame_promo_image_url',
				    'return' => true,
				    'array' => true,
				    'array_txt' => false,
				    'prefix' => '',
				),
			    );
			    $mashup_var_html_fields->mashup_var_upload_file_field($mashup_opt_array);
			    $mashup_opt_array = array(
				'name' => mashup_var_theme_text_srt('mashup_var_promobox_title'),
				'desc' => '',
				'hint_text' => mashup_var_theme_text_srt('mashup_var_promobox_title_hint'),
				'echo' => true,
				'field_params' => array(
				    'std' => esc_attr($mashup_var_promobox_title),
				    'cust_id' => '',
				    'classes' => 'txtfield',
				    'cust_name' => 'mashup_var_promobox_title[]',
				    'return' => true,
				),
			    );
			    $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
			    //promobox title color
			    $mashup_opt_array = array(
				'name' => mashup_var_theme_text_srt('mashup_var_promobox_title_color'),
				'desc' => '',
				'hint_text' => mashup_var_theme_text_srt('mashup_var_promobox_title_color_hint'),
				'echo' => true,
				'field_params' => array(
				    'std' => esc_html($mashup_promobox_title_color),
				    'id' => 'mashup_promobox_title_color',
				    'cust_name' => 'mashup_promobox_title_color[]',
				    'classes' => 'bg_color',
				    'return' => true,
				),
			    );
			    $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
			    $mashup_opt_array = array(
				'name' => mashup_var_theme_text_srt('mashup_var_promobox_field_desc'),
				'desc' => '',
				'hint_text' => mashup_var_theme_text_srt('mashup_var_promobox_field_desc_hint'),
				'echo' => true,
				'field_params' => array(
				    'std' => esc_textarea($mashup_var_image_description),
				    'cust_id' => 'mashup_var_image_description' . $mashup_counter,
				    'classes' => 'textarea',
				    'cust_name' => 'mashup_var_image_description[]',
				    'return' => true,
				    'mashup_editor' => true,
				    'extra_atr' => 'data-content-text="cs-shortcode-textarea"',
				),
			    );
			    $mashup_var_html_fields->mashup_var_textarea_field($mashup_opt_array);
			    //button
			    $mashup_opt_array = array(
				'name' => mashup_var_theme_text_srt('mashup_var_promobox_button_title'),
				'desc' => '',
				'hint_text' => mashup_var_theme_text_srt('mashup_var_promobox_button_title_hint'),
				'echo' => true,
				'field_params' => array(
				    'std' => esc_attr($mashup_var_promobox_button_title),
				    'cust_id' => '',
				    'classes' => 'txtfield',
				    'cust_name' => 'mashup_var_promobox_button_title[]',
				    'return' => true,
				),
			    );
			    $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
			    //button bg color
			    $mashup_opt_array = array(
				'name' => mashup_var_theme_text_srt('mashup_var_promobox_button_bg_color'),
				'desc' => '',
				'hint_text' => mashup_var_theme_text_srt('mashup_var_promobox_button_bg_color_hint'),
				'echo' => true,
				'field_params' => array(
				    'std' => esc_html($mashup_promobox_button_bg_color),
				    'id' => 'mashup_promobox_button_bg_color',
				    'cust_name' => 'mashup_promobox_button_bg_color[]',
				    'classes' => 'bg_color',
				    'return' => true,
				),
			    );
			    $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
			    $mashup_opt_array = array(
				'name' => mashup_var_theme_text_srt('mashup_var_promobox_button_url'),
				'desc' => '',
				'hint_text' => mashup_var_theme_text_srt('mashup_var_promobox_button_url_hint'),
				'echo' => true,
				'field_params' => array(
				    'std' => esc_attr($mashup_var_promobox_button_url),
				    'cust_id' => '',
				    'classes' => 'txtfield',
				    'cust_name' => 'mashup_var_promobox_button_url[]',
				    'return' => true,
				),
			    );
			    $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
			    ?>
	    	    </div>
			<?php if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') { ?>
			    <ul class="form-elements insert-bg">
				<li class="to-field">
				    <a class="insert-btn cs-main-btn" onclick="javascript:mashup_shortcode_insert_editor('<?php echo str_replace('mashup_var_page_builder_', '', $name); ?>', '<?php echo esc_js($name . $mashup_counter) ?>', '<?php echo esc_js($filter_element); ?>')" ><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_insert')); ?></a>
				</li>
			    </ul>
			    <div id="results-shortocde"></div>
			<?php
			} else {
			    $mashup_opt_array = array(
				'std' => 'promobox',
				'id' => '',
				'before' => '',
				'after' => '',
				'classes' => '',
				'cust_id' => 'mashup_orderby' . $mashup_counter,
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
				    'cust_id' => 'promobox_save',
				    'cust_type' => 'button',
				    'classes' => 'cs-mashup-admin-btn',
				    'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
				    'cust_name' => 'promobox_save' . $mashup_counter,
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
	}
	if ($die <> 1) {
	    die();
	}
    }

    add_action('wp_ajax_mashup_var_page_builder_promobox', 'mashup_var_page_builder_promobox');
}

if (!function_exists('mashup_save_page_builder_data_promobox_callback')) {

    /**
     * Save data for image frame shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_promobox_callback($args) {
	$data = $args['data'];
	$counters = $args['counters'];
	$widget_type = $args['widget_type'];
	$column = $args['column'];
	if ($widget_type == "promobox") {
	    $mashup_var_promobox = '';
	    $promobox = $column->addChild('promobox');
	    $promobox->addChild('page_element_size', htmlspecialchars($data['promobox_element_size'][$counters['mashup_global_counter_promobox']]));
	    $promobox->addChild('promobox_element_size', htmlspecialchars($data['promobox_element_size'][$counters['mashup_global_counter_promobox']]));
	    if (isset($data['mashup_widget_element_num'][$counters['mashup_counter']]) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode') {
		$shortcode_str = stripslashes(htmlspecialchars(( $data['shortcode']['promobox'][$counters['mashup_shortcode_counter_promobox']]), ENT_QUOTES));
		$counters['mashup_shortcode_counter_promobox'] ++;
		$promobox->addChild('mashup_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
	    } else {
		$mashup_var_promobox = '[mashup_promobox ';
		if (isset($data['mashup_var_image_section_title'][$counters['mashup_counter_promobox']]) && $data['mashup_var_image_section_title'][$counters['mashup_counter_promobox']] != '') {
		    $mashup_var_promobox .= 'mashup_var_image_section_title="' . htmlspecialchars($data['mashup_var_image_section_title'][$counters['mashup_counter_promobox']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_promobox_sub_title'][$counters['mashup_counter_promobox']]) && $data['mashup_var_promobox_sub_title'][$counters['mashup_counter_promobox']] != '') {
		    $mashup_var_promobox .= 'mashup_var_promobox_sub_title="' . htmlspecialchars($data['mashup_var_promobox_sub_title'][$counters['mashup_counter_promobox']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_promobox_element_align'][$counters['mashup_counter_promobox']]) && $data['mashup_var_promobox_element_align'][$counters['mashup_counter_promobox']] != '') {
		    $mashup_var_promobox .= 'mashup_var_promobox_element_align="' . htmlspecialchars($data['mashup_var_promobox_element_align'][$counters['mashup_counter_promobox']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_promobox_title'][$counters['mashup_counter_promobox']]) && $data['mashup_var_promobox_title'][$counters['mashup_counter_promobox']] != '') {
		    $mashup_var_promobox .= 'mashup_var_promobox_title="' . htmlspecialchars($data['mashup_var_promobox_title'][$counters['mashup_counter_promobox']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_promobox_title_color'][$counters['mashup_counter_promobox']]) && $data['mashup_promobox_title_color'][$counters['mashup_counter_promobox']] != '') {
		    $mashup_var_promobox .= 'mashup_promobox_title_color="' . htmlspecialchars($data['mashup_promobox_title_color'][$counters['mashup_counter_promobox']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_promobox_select_background'][$counters['mashup_counter_promobox']]) && $data['mashup_promobox_select_background'][$counters['mashup_counter_promobox']] != '') {
		    $mashup_var_promobox .= 'mashup_promobox_select_background="' . htmlspecialchars($data['mashup_promobox_select_background'][$counters['mashup_counter_promobox']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_promobox_button_title'][$counters['mashup_counter_promobox']]) && $data['mashup_var_promobox_button_title'][$counters['mashup_counter_promobox']] != '') {
		    $mashup_var_promobox .= 'mashup_var_promobox_button_title="' . htmlspecialchars($data['mashup_var_promobox_button_title'][$counters['mashup_counter_promobox']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_frame_image_url_array'][$counters['mashup_counter_promobox']]) && $data['mashup_var_frame_image_url_array'][$counters['mashup_counter_promobox']] != '') {
		    $mashup_var_promobox .= 'mashup_var_frame_image_url_array="' . htmlspecialchars($data['mashup_var_frame_image_url_array'][$counters['mashup_counter_promobox']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_frame_promo_image_url_array'][$counters['mashup_counter_promobox']]) && $data['mashup_var_frame_promo_image_url_array'][$counters['mashup_counter_promobox']] != '') {
		    $mashup_var_promobox .= 'mashup_var_frame_promo_image_url_array="' . htmlspecialchars($data['mashup_var_frame_promo_image_url_array'][$counters['mashup_counter_promobox']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_promobox_button_bg_color'][$counters['mashup_counter_promobox']]) && $data['mashup_promobox_button_bg_color'][$counters['mashup_counter_promobox']] != '') {
		    $mashup_var_promobox .= 'mashup_promobox_button_bg_color="' . htmlspecialchars($data['mashup_promobox_button_bg_color'][$counters['mashup_counter_promobox']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_promobox_button_url'][$counters['mashup_counter_promobox']]) && $data['mashup_var_promobox_button_url'][$counters['mashup_counter_promobox']] != '') {
		    $mashup_var_promobox .= 'mashup_var_promobox_button_url="' . htmlspecialchars($data['mashup_var_promobox_button_url'][$counters['mashup_counter_promobox']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_promobox_bg_color'][$counters['mashup_counter_promobox']]) && $data['mashup_promobox_bg_color'][$counters['mashup_counter_promobox']] != '') {
		    $mashup_var_promobox .= 'mashup_promobox_bg_color="' . htmlspecialchars($data['mashup_promobox_bg_color'][$counters['mashup_counter_promobox']], ENT_QUOTES) . '" ';
		}
		$mashup_var_promobox .= ']';
		if (isset($data['mashup_var_image_description'][$counters['mashup_counter_promobox']]) && $data['mashup_var_image_description'][$counters['mashup_counter_promobox']] != '') {
		    $mashup_var_promobox .= htmlspecialchars($data['mashup_var_image_description'][$counters['mashup_counter_promobox']], ENT_QUOTES) . ' ';
		}
		$mashup_var_promobox .= '[/mashup_promobox]';
		$promobox->addChild('mashup_shortcode', $mashup_var_promobox);
		$counters['mashup_counter_promobox'] ++;
	    }
	    $counters['mashup_global_counter_promobox'] ++;
	}
	return array(
	    'data' => $data,
	    'counters' => $counters,
	    'widget_type' => $widget_type,
	    'column' => $column,
	);
    }

    add_filter('mashup_save_page_builder_data', 'mashup_save_page_builder_data_promobox_callback');
}

if (!function_exists('mashup_load_shortcode_counters_promobox_callback')) {

    /**
     * Populate image frame shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_promobox_callback($counters) {
	$counters['mashup_global_counter_promobox'] = 0;
	$counters['mashup_shortcode_counter_promobox'] = 0;
	$counters['mashup_counter_promobox'] = 0;
	return $counters;
    }

    add_filter('mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_promobox_callback');
}
if (!function_exists('mashup_shortcode_names_list_populate_promobox_callback')) {

    /**
     * Populate image frame shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_promobox_callback($shortcode_array) {
	$shortcode_array['promobox'] = array(
	    'title' => mashup_var_frame_text_srt('mashup_var_promobox'),
	    'name' => 'promobox',
	    'icon' => 'icon-photo',
	    'categories' => 'typography',
	);
	return $shortcode_array;
    }

    add_filter('mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_promobox_callback');
}

if (!function_exists('mashup_element_list_populate_promobox_callback')) {

    /**
     * Populate image frame shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_promobox_callback($element_list) {
	$element_list['promobox'] = mashup_var_frame_text_srt('mashup_var_promobox');
	return $element_list;
    }

    add_filter('mashup_element_list_populate', 'mashup_element_list_populate_promobox_callback');
}