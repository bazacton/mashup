<?php
/*
 *
 * @File : Video
 * @retrun
 *
 */

if (!function_exists('mashup_var_page_builder_video')) {

    function mashup_var_page_builder_video($die = 0) {
	global $post, $mashup_node, $mashup_var_html_fields, $mashup_var_form_fields;
	if (function_exists('mashup_shortcode_names')) {
	    $shortcode_element = '';
	    $filter_element = 'filterdrag';
	    $shortcode_view = '';
	    $mashup_output = array();
	    $MASHUP_PREFIX = 'mashup_video';
	    $counter = isset($_POST['counter']) ? $_POST['counter'] : '';
	    $mashup_counter = isset($_POST['counter']) ? $_POST['counter'] : '';
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
		'mashup_var_element_title' => '',
		'mashup_var_element_sub_title' => '',
		'mashup_var_element_align' => '',
		'mashup_var_video_url' => '',
                'mashup_var_height' => '',
	    );
	    if (isset($mashup_output['0']['atts'])) {
		$atts = $mashup_output['0']['atts'];
	    } else {
		$atts = array();
	    }
	    if (isset($mashup_output['0']['content'])) {
		$video_text = $mashup_output['0']['content'];
	    } else {
		$video_text = '';
	    }
	    $video_element_size = '25';
	    foreach ($defaults as $key => $values) {
		if (isset($atts[$key])) {
		    $$key = $atts[$key];
		} else {
		    $$key = $values;
		}
	    }
	    $name = 'mashup_var_page_builder_video';
	    $coloumn_class = 'column_' . $video_element_size;
	    if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') {
		$shortcode_element = 'shortcode_element_class';
		$shortcode_view = 'cs-pbwp-shortcode';
		$filter_element = 'ajax-drag';
		$coloumn_class = '';
	    }
	    $stringsObj = new mashup_theme_all_strings;
	    $stringsObj->mashup_short_code_strings();
	    ?>
	    <div id="<?php echo esc_attr($name . $mashup_counter) ?>_del" class="column  parentdelete <?php echo esc_attr($coloumn_class); ?>
		 <?php echo esc_attr($shortcode_view); ?>" item="video" data="<?php echo mashup_element_size_data_array_index($video_element_size) ?>" >
		     <?php mashup_element_setting($name, $mashup_counter, $video_element_size) ?>
	        <div class="cs-wrapp-class-<?php echo intval($mashup_counter) ?>
		     <?php echo esc_attr($shortcode_element); ?>" id="<?php echo esc_attr($name . $mashup_counter) ?>" data-shortcode-template="[mashup_video {{attributes}}]{{content}}[/mashup_video]" style="display: none;">
	    	<div class="cs-heading-area" data-counter="<?php echo esc_attr($mashup_counter) ?>">
	    	    <h5><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_edit_video_text')); ?></h5>
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
				'name' => mashup_var_theme_text_srt('mashup_var_element_title'),
				'desc' => '',
				'hint_text' => mashup_var_theme_text_srt('mashup_var_element_title_hint'),
				'echo' => true,
				'field_params' => array(
				    'std' => mashup_allow_special_char($mashup_var_element_title),
				    'id' => 'mashup_var_element_title',
				    'cust_name' => 'mashup_var_element_title[]',
				    'classes' => '',
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
				    'std' => mashup_allow_special_char($mashup_var_element_sub_title),
				    'id' => 'mashup_var_element_sub_title',
				    'cust_name' => 'mashup_var_element_sub_title[]',
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
				    'std' => $mashup_var_element_align,
				    'id' => '',
				    'cust_id' => '',
				    'cust_name' => 'mashup_var_element_align[]',
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
				'name' => mashup_var_theme_text_srt('mashup_var_video_field_url'),
				'desc' => '',
				'hint_text' => mashup_var_theme_text_srt('mashup_var_video_field_url_hint'),
				'echo' => true,
				'field_params' => array(
				    'std' => esc_attr($mashup_var_video_url),
				    'cust_id' => 'mashup_var_video_url' . $mashup_counter,
				    'classes' => '',
				    'cust_name' => 'mashup_var_video_url[]',
				    'return' => true,
				),
			    );
			    $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
                            
                            $mashup_opt_array = array(
				'name' => mashup_var_theme_text_srt('mashup_var_video_field_height'),
				'desc' => '',
				'hint_text' => mashup_var_theme_text_srt('mashup_var_video_field_height_hint'),
				'echo' => true,
				'field_params' => array(
				    'std' => esc_attr($mashup_var_height),
				    'cust_id' => 'mashup_var_height' . $mashup_counter,
				    'classes' => '',
				    'cust_name' => 'mashup_var_height[]',
				    'return' => true,
				),
			    );
			    $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
			    ?>
	    	    </div>
			<?php if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') { ?>
			    <ul class="form-elements insert-bg">
				<li class="to-field">
				    <a class="insert-btn cs-main-btn" 
				       onclick="javascript:mashup_shortcode_insert_editor('<?php echo str_replace('mashup_var_page_builder_', '', $name); ?>', '<?php echo esc_js($name . $mashup_counter) ?>',
													   '<?php echo esc_js($filter_element); ?>')" ><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_insert')); ?></a>
				</li>
			    </ul>
			    <div id="results-shortocde"></div>
			<?php
			} else {
			    $mashup_opt_array = array(
				'std' => 'video',
				'id' => '',
				'before' => '',
				'after' => '',
				'classes' => '',
				'extra_atr' => '',
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
				    'cust_id' => 'video_save' . $mashup_counter,
				    'cust_type' => 'button',
				    'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
				    'classes' => 'cs-mashup-admin-btn',
				    'cust_name' => 'video_save',
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

    add_action('wp_ajax_mashup_var_page_builder_video', 'mashup_var_page_builder_video');
}


if (!function_exists('mashup_save_page_builder_data_video_callback')) {

    /**
     * Save data for video shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_video_callback($args) {
	$data = $args['data'];
	$counters = $args['counters'];
	$widget_type = $args['widget_type'];
	$column = $args['column'];
	if ($widget_type == "video") {
	    $shortcode = '';
	    $video = $column->addChild('video');
	    $video->addChild('page_element_size', htmlspecialchars($_POST['video_element_size'][$counters['mashup_global_counter_video']]));
	    if (isset($_POST['mashup_widget_element_num'][$counters['mashup_counter']]) && $_POST['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode') {
		$shortcode_str = stripslashes($_POST['shortcode']['video'][$counters['mashup_shortcode_counter_video']]);
		$counters['mashup_shortcode_counter_video'] ++;
		$video->addChild('mashup_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
	    } else {
		$shortcode .= '[mashup_video ';
		if (isset($_POST['mashup_var_element_title'][$counters['mashup_counter_video']]) && $_POST['mashup_var_element_title'][$counters['mashup_counter_video']] != '') {
		    $shortcode .='mashup_var_element_title="' . htmlspecialchars($_POST['mashup_var_element_title'][$counters['mashup_counter_video']], ENT_QUOTES) . '" ';
		}
		if (isset($_POST['mashup_var_element_sub_title'][$counters['mashup_counter_video']]) && $_POST['mashup_var_element_sub_title'][$counters['mashup_counter_video']] != '') {
		    $shortcode .='mashup_var_element_sub_title="' . htmlspecialchars($_POST['mashup_var_element_sub_title'][$counters['mashup_counter_video']], ENT_QUOTES) . '" ';
		}
		if (isset($_POST['mashup_var_element_align'][$counters['mashup_counter_video']]) && $_POST['mashup_var_element_align'][$counters['mashup_counter_video']] != '') {
		    $shortcode .='mashup_var_element_align="' . htmlspecialchars($_POST['mashup_var_element_align'][$counters['mashup_counter_video']], ENT_QUOTES) . '" ';
		}
		if (isset($_POST['mashup_var_video_url'][$counters['mashup_counter_video']]) && $_POST['mashup_var_video_url'][$counters['mashup_counter_video']] != '') {
		    $shortcode .='mashup_var_video_url="' . htmlspecialchars($_POST['mashup_var_video_url'][$counters['mashup_counter_video']], ENT_QUOTES) . '" ';
		}
                if (isset($_POST['mashup_var_height'][$counters['mashup_counter_video']]) && $_POST['mashup_var_height'][$counters['mashup_counter_video']] != '') {
		    $shortcode .='mashup_var_height="' . htmlspecialchars($_POST['mashup_var_height'][$counters['mashup_counter_video']], ENT_QUOTES) . '" ';
		}
		$shortcode .= ']';
		$video->addChild('mashup_shortcode', $shortcode);
		$counters['mashup_counter_video'] ++;
	    }
	    $counters['mashup_global_counter_video'] ++;
	}
	return array(
	    'data' => $data,
	    'counters' => $counters,
	    'widget_type' => $widget_type,
	    'column' => $column,
	);
    }

    add_filter('mashup_save_page_builder_data', 'mashup_save_page_builder_data_video_callback');
}

if (!function_exists('mashup_load_shortcode_counters_video_callback')) {

    /**
     * Populate video shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_video_callback($counters) {
	$counters['mashup_global_counter_video'] = 0;
	$counters['mashup_shortcode_counter_video'] = 0;
	$counters['mashup_counter_video'] = 0;
	return $counters;
    }

    add_filter('mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_video_callback');
}
if (!function_exists('mashup_shortcode_names_list_populate_video_callback')) {

    /**
     * Populate video shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_video_callback($shortcode_array) {
	$shortcode_array['video'] = array(
	    'title' => mashup_var_frame_text_srt('mashup_var_video'),
	    'name' => 'video',
	    'icon' => 'icon-video2',
	    'categories' => 'contentblocks',
	);
	return $shortcode_array;
    }

    add_filter('mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_video_callback');
}

if (!function_exists('mashup_element_list_populate_video_callback')) {

    /**
     * Populate video shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_video_callback($element_list) {
	$element_list['video'] = mashup_var_frame_text_srt('mashup_var_video');
	return $element_list;
    }

    add_filter('mashup_element_list_populate', 'mashup_element_list_populate_video_callback');
}