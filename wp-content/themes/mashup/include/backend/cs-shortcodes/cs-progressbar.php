<?php
/*
 *
 * @Shortcode Name : Progressbar
 * @retrun
 *
 */

if (!function_exists('mashup_var_page_builder_progressbars')) {

    function mashup_var_page_builder_progressbars($die = 0) {
	global $mashup_node, $post, $mashup_var_html_fields, $mashup_var_form_fields;
	$shortcode_element = '';
	$filter_element = 'filterdrag';
	$shortcode_view = '';
	$output = array();
	$mashup_counter = $_POST['counter'];
	$PREFIX = 'mashup_progressbar|progressbar_item';
	$parseObject = new ShortcodeParse();
	$progressbars_num = 0;
	if (isset($_POST['action']) && !isset($_POST['shortcode_element_id'])) {
	    $POSTID = '';
	    $shortcode_element_id = '';
	} else {
	    $POSTID = $_POST['POSTID'];
	    $shortcode_element_id = $_POST['shortcode_element_id'];
	    $shortcode_str = stripslashes($shortcode_element_id);
	    $output = $parseObject->mashup_shortcodes($output, $shortcode_str, true, $PREFIX);
	}
	$defaults = array(
	    'column_size' => '1/1',
	    'progressbars_element_title' => '',
	    'mashup_var_progressbars_sub_title' => '',
	    'mashup_var_progressbars_element_align' => '',
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
	    $progressbars_num = count($atts_content);
	}

	$progressbars_element_size = '25';
	foreach ($defaults as $key => $values) {
	    if (isset($atts[$key])) {
		$$key = $atts[$key];
	    } else {
		$$key = $values;
	    }
	}
	$name = 'mashup_var_page_builder_progressbars';
	$coloumn_class = 'column_' . $progressbars_element_size;

	if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') {
	    $shortcode_element = 'shortcode_element_class';
	    $shortcode_view = 'cs-pbwp-shortcode';
	    $filter_element = 'ajax-drag';
	    $coloumn_class = '';
	}

	global $mashup_var_static_text;
	$strings = new mashup_theme_all_strings;
	$strings->mashup_short_code_strings();
	$strings->mashup_theme_option_field_strings();
	?>
	<div id="<?php echo esc_attr($name . $mashup_counter); ?>_del" class="column  parentdelete <?php echo esc_attr($coloumn_class); ?> <?php echo esc_attr($shortcode_view); ?>" item="progressbars" data="<?php echo mashup_element_size_data_array_index($progressbars_element_size) ?>" >
	    <?php mashup_element_setting($name, $mashup_counter, $progressbars_element_size, '', 'list-alt'); ?>
	    <div class="cs-wrapp-class-<?php echo esc_attr($mashup_counter) ?> <?php echo esc_attr($shortcode_element); ?>" id="<?php echo esc_attr($name . $mashup_counter); ?>" style="display: none;">
		<div class="cs-heading-area">
		    <h5><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_progressbar_options')); ?></h5>
		    <a href="javascript:mashup_frame_removeoverlay('<?php echo esc_js($name . $mashup_counter); ?>','<?php echo esc_js($filter_element); ?>')" class="cs-btnclose"><i class="icon-cancel"></i></a> </div>
		<div class="cs-clone-append cs-pbwp-content" >
		    <div class="cs-wrapp-tab-box">
			<div id="shortcode-item-<?php echo esc_attr($mashup_counter); ?>" data-shortcode-template="{{child_shortcode}} [/<?php echo esc_attr('mashup_progressbar'); ?>]" data-shortcode-child-template="[<?php echo esc_attr('progressbar_item'); ?> {{attributes}}] {{content}} [/<?php echo esc_attr('progressbar_item'); ?>]">
			    <div class="cs-wrapp-clone cs-shortcode-wrapp cs-disable-true cs-pbwp-content" data-template="[<?php echo esc_attr('mashup_progressbar'); ?> {{attributes}}]">
				<?php
				if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') {
				    mashup_shortcode_element_size();
				}
				?>
				<?php
				$mashup_opt_array = array(
				    'name' => mashup_var_theme_text_srt('mashup_var_element_title'),
				    'desc' => '',
				    'hint_text' => mashup_var_theme_text_srt('mashup_var_element_title_hint'),
				    'echo' => true,
				    'field_params' => array(
					'std' => esc_html($progressbars_element_title),
					'id' => 'progressbars_element_title',
					'cust_name' => 'progressbars_element_title[]',
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
					'std' => esc_attr($mashup_var_progressbars_sub_title),
					'cust_id' => '',
					'cust_name' => 'mashup_var_progressbars_sub_title[]',
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
					'std' => $mashup_var_progressbars_element_align,
					'id' => '',
					'cust_id' => '',
					'cust_name' => 'mashup_var_progressbars_element_align[]',
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
			    <?php
			    if (isset($progressbars_num) && $progressbars_num <> '' && isset($atts_content) && is_array($atts_content)) {
				foreach ($atts_content as $progressbars) {
				    $rand_id = $mashup_counter . '' . mashup_generate_random_string(3);
				    $defaults = array('progressbars_title' => '', 'progressbars_color' => '#4d8b0c', 'progressbars_percentage' => '50');
				    foreach ($defaults as $key => $values) {
					if (isset($progressbars['atts'][$key])) {
					    $$key = $progressbars['atts'][$key];
					} else {
					    $$key = $values;
					}
				    }
				    echo '<div class="cs-wrapp-clone cs-shortcode-wrapp cs-pbwp-content" id="mashup_infobox_' . absint($rand_id) . '">';
				    ?>
				    <header>
					<h4><i class='icon-arrows'></i><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_progressbar')); ?></h4>
					<a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_remove')); ?></a></header>

				    <?php
				    $mashup_opt_array = array(
					'name' => mashup_var_theme_text_srt('mashup_var_progressbar_title'),
					'desc' => '',
					'hint_text' => mashup_var_theme_text_srt('mashup_var_progressbar_title_hint'),
					'echo' => true,
					'field_params' => array(
					    'std' => esc_html($progressbars_title),
					    'id' => 'progressbars_title',
					    'cust_name' => 'progressbars_title[]',
					    'return' => true,
					),
				    );

				    $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);


				    $mashup_opt_array = array(
					'name' => mashup_var_theme_text_srt('mashup_var_progressbar_skill'),
					'desc' => '',
					'hint_text' => mashup_var_theme_text_srt('mashup_var_progressbar_skill_hint'),
					'echo' => true,
					'field_params' => array(
					    'std' => esc_html($progressbars_percentage),
					    'id' => 'progressbars_percentage',
					    'cust_name' => 'progressbars_percentage[]',
					    'return' => true,
					),
				    );

				    $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);


				    $mashup_opt_array = array(
					'name' => mashup_var_theme_text_srt('mashup_var_progressbar_color'),
					'desc' => '',
					'hint_text' => mashup_var_theme_text_srt('mashup_var_progressbar_color_hint'),
					'echo' => true,
					'field_params' => array(
					    'std' => esc_html($progressbars_color),
					    'id' => 'progressbars_color',
					    'cust_name' => 'progressbars_color[]',
					    'return' => true,
					    'classes' => 'bg_color',
					),
				    );

				    $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
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
			    'std' => esc_attr($progressbars_num),
			    'id' => '',
			    'before' => '',
			    'after' => '',
			    'classes' => 'fieldCounter',
			    'extra_atr' => '',
			    'cust_id' => '',
			    'cust_name' => 'progressbars_num[]',
			    'return' => true,
			    'required' => false
			);
			echo mashup_allow_special_char($mashup_var_form_fields->mashup_var_form_hidden_render($mashup_opt_array));
			?>
		    </div>
		    <div class="wrapptabbox cs-zero-padding">
			<div class="opt-conts">
			    <ul class="form-elements noborder">
				<li class="to-field"> <a href="javascript:void(0);" class="add_servicesss cs-main-btn" onclick="mashup_shortcode_element_ajax_call('progressbars', 'shortcode-item-<?php echo esc_js($mashup_counter); ?>', '<?php echo esc_js(admin_url('admin-ajax.php')); ?>')"><i class="icon-plus-circle"></i><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_progressbar_add_button')); ?></a> </li>
				<div id="loading" class="shortcodeload"></div>
			    </ul>
			    <?php if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') { ?>
	    		    <ul class="form-elements insert-bg">
	    			<li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:mashup_shortcode_insert_editor('<?php echo esc_js(str_replace('mashup_var_page_builder_', '', $name)); ?>', 'shortcode-item-<?php echo esc_js($mashup_counter); ?>', '<?php echo esc_js($filter_element); ?>')" ><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_insert')); ?></a> </li>
	    		    </ul>
	    		    <div id="results-shortocde"></div>
			    <?php } else { ?>

				<?php
				$mashup_opt_array = array(
				    'std' => 'progressbars',
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
				?>

				<?php
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
	    </div>
	</div>
	
	<?php
	if ($die <> 1) {
	    die();
	}
    }

    add_action('wp_ajax_mashup_var_page_builder_progressbars', 'mashup_var_page_builder_progressbars');
}



if (!function_exists('mashup_save_page_builder_data_progressbar_callback')) {

    /**
     * Save data for progressbar shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_progressbar_callback($args) {

	$data = $args['data'];
	$counters = $args['counters'];
	$widget_type = $args['widget_type'];
	$column = $args['column'];
	if ($widget_type == "progressbars") {
	    $shortcode = $shortcode_item = '';
	    $progressbars = $column->addChild('progressbars');
	    $progressbars->addChild('progressbars_element_size', $_POST['progressbars_element_size'][$counters['mashup_global_counter_progressbars']]);
	    $progressbars->addChild('page_element_size', $_POST['progressbars_element_size'][$counters['mashup_global_counter_progressbars']]);
	    if (isset($_POST['mashup_widget_element_num'][$counters['mashup_counter']]) && $_POST['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode') {
		$shortcode_str = stripslashes($_POST['shortcode']['progressbars'][$counters['mashup_shortcode_counter_progressbars']]);
		$counters['mashup_shortcode_counter_progressbars'] ++;
		$progressbars->addChild('mashup_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
	    } else {
		if (isset($_POST['progressbars_num'][$counters['mashup_counter_progressbars']]) && $_POST['progressbars_num'][$counters['mashup_counter_progressbars']] > 0) {
		    for ($i = 1; $i <= $_POST['progressbars_num'][$counters['mashup_counter_progressbars']]; $i ++) {
			$shortcode_item .= '[progressbar_item ';
			if (isset($_POST['progressbars_title'][$counters['mashup_counter_progressbars_node']]) && $_POST['progressbars_title'][$counters['mashup_counter_progressbars_node']] != '') {
			    $shortcode_item .= 'progressbars_title="' . htmlspecialchars($_POST['progressbars_title'][$counters['mashup_counter_progressbars_node']], ENT_QUOTES) . '" ';
			}
			if (isset($_POST['progressbars_percentage'][$counters['mashup_counter_progressbars_node']]) && $_POST['progressbars_percentage'][$counters['mashup_counter_progressbars_node']] != '') {
			    $shortcode_item .= 'progressbars_percentage="' . htmlspecialchars($_POST['progressbars_percentage'][$counters['mashup_counter_progressbars_node']], ENT_QUOTES) . '" ';
			}
			if (isset($_POST['progressbars_color'][$counters['mashup_counter_progressbars_node']]) && $_POST['progressbars_color'][$counters['mashup_counter_progressbars_node']] != '') {
			    $shortcode_item .= 'progressbars_color="' . htmlspecialchars($_POST['progressbars_color'][$counters['mashup_counter_progressbars_node']], ENT_QUOTES) . '" ';
			}
			$shortcode_item .=']';
			$counters['mashup_counter_progressbars_node'] ++;
		    }
		}
		$shortcode .= '[mashup_progressbar ';
		if (isset($_POST['progressbars_element_title'][$counters['mashup_counter_progressbars']]) && $_POST['progressbars_element_title'][$counters['mashup_counter_progressbars']] != '') {
		    $shortcode .= 'progressbars_element_title="' . htmlspecialchars($_POST['progressbars_element_title'][$counters['mashup_counter_progressbars']], ENT_QUOTES) . '" ';
		}
		if (isset($_POST['mashup_var_progressbars_sub_title'][$counters['mashup_counter_progressbars']]) && $_POST['mashup_var_progressbars_sub_title'][$counters['mashup_counter_progressbars']] != '') {
		    $shortcode .= 'mashup_var_progressbars_sub_title="' . htmlspecialchars($_POST['mashup_var_progressbars_sub_title'][$counters['mashup_counter_progressbars']], ENT_QUOTES) . '" ';
		}
		if (isset($_POST['mashup_var_progressbars_element_align'][$counters['mashup_counter_progressbars']]) && $_POST['mashup_var_progressbars_element_align'][$counters['mashup_counter_progressbars']] != '') {
		    $shortcode .= 'mashup_var_progressbars_element_align="' . htmlspecialchars($_POST['mashup_var_progressbars_element_align'][$counters['mashup_counter_progressbars']], ENT_QUOTES) . '" ';
		}
		$shortcode .= ']' . $shortcode_item . '[/mashup_progressbar]';
		$progressbars->addChild('mashup_shortcode', $shortcode);
		$counters['mashup_counter_progressbars'] ++;
	    }
	    $counters['mashup_global_counter_progressbars'] ++;
	}
	return array(
	    'data' => $data,
	    'counters' => $counters,
	    'widget_type' => $widget_type,
	    'column' => $column,
	);
    }

    add_filter('mashup_save_page_builder_data', 'mashup_save_page_builder_data_progressbar_callback');
}

if (!function_exists('mashup_load_shortcode_counters_progressbar_callback')) {

    /**
     * Populate progressbar shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_progressbar_callback($counters) {
	$counters['mashup_counter_progressbars'] = 0;
	$counters['mashup_counter_progressbars_node'] = 0;
	$counters['mashup_global_counter_progressbars'] = 0;
	$counters['mashup_shortcode_counter_progressbars'] = 0;
	return $counters;
    }

    add_filter('mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_progressbar_callback');
}
if (!function_exists('mashup_shortcode_names_list_populate_progressbars_callback')) {

    /**
     * Populate progressbars shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_progressbars_callback($shortcode_array) {
	$shortcode_array['progressbars'] = array(
	    'title' => mashup_var_frame_text_srt('mashup_var_progressbars'),
	    'name' => 'progressbars',
	    'icon' => 'icon-list-alt',
	    'categories' => ' loops',
	);
	return $shortcode_array;
    }

    add_filter('mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_progressbars_callback');
}

if (!function_exists('mashup_element_list_populate_progressbars_callback')) {

    /**
     * Populate progressbars shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_progressbars_callback($element_list) {
	$element_list['progressbars'] = mashup_var_frame_text_srt('mashup_var_progressbars');
	return $element_list;
    }

    add_filter('mashup_element_list_populate', 'mashup_element_list_populate_progressbars_callback');
}

if (!function_exists('mashup_shortcode_sub_element_ui_progressbars_callback')) {

    /**
     * Render UI for sub element in progressbars settings.
     *
     * @param	array $args
     */
    function mashup_shortcode_sub_element_ui_progressbars_callback($args) {
	$type = $args['type'];
	$mashup_var_html_fields = $args['html_fields'];

	if ($type == 'progressbars') {
	    $rand_id = rand(40, 9999999);
	    ?>
	    <div class='cs-wrapp-clone cs-shortcode-wrapp cs-pbwp-content' id="mashup_infobox_<?php echo intval($rand_id); ?>">
	        <header>
	    	<h4><i class='icon-arrows'></i><?php echo esc_html( mashup_var_frame_text_srt('mashup_var_progressbar') ); ?></h4>
	    	<a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo esc_html( mashup_var_frame_text_srt('mashup_var_remove') ); ?></a>
	        </header>
		<?php
		$mashup_opt_array = array(
		    'name' => mashup_var_frame_text_srt('mashup_var_progressbar_title'),
		    'desc' => '',
		    'hint_text' => mashup_var_frame_text_srt('mashup_var_progressbar_title_hint'),
		    'echo' => true,
		    'field_params' => array(
			'std' => '',
			'id' => 'progressbars_title',
			'cust_name' => 'progressbars_title[]',
			'return' => true,
		    ),
		);

		$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);


		$mashup_opt_array = array(
		    'name' => mashup_var_frame_text_srt('mashup_var_progressbar_skill'),
		    'desc' => '',
		    'hint_text' => mashup_var_frame_text_srt('mashup_var_progressbar_skill_hint'),
		    'echo' => true,
		    'field_params' => array(
			'std' => '50',
			'id' => 'progressbars_percentage',
			'cust_name' => 'progressbars_percentage[]',
			'return' => true,
		    ),
		);

		$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);


		$mashup_opt_array = array(
		    'name' => mashup_var_frame_text_srt('mashup_var_progressbar_color'),
		    'desc' => '',
		    'hint_text' => mashup_var_frame_text_srt('mashup_var_progressbar_color_hint'),
		    'echo' => true,
		    'field_params' => array(
			'std' => '#4d8b0c',
			'id' => 'progressbars_color',
			'cust_name' => 'progressbars_color[]',
			'return' => true,
			'classes' => 'bg_color',
		    ),
		);

		$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
		?>

	    </div>

	    <?php
	}
    }

    add_action('mashup_shortcode_sub_element_ui', 'mashup_shortcode_sub_element_ui_progressbars_callback');
}