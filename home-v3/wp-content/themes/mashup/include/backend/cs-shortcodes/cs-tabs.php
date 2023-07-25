<?php
/*
 *
 * @Shortcode Name : Tabs
 * @retrun
 *
 * 
 */
if (!function_exists('mashup_var_page_builder_tabs')) {

    function mashup_var_page_builder_tabs($die = 0) {
	global $mashup_node, $count_node, $post, $mashup_var_html_fields, $mashup_var_form_fields;
	$shortcode_element = '';
	$filter_element = 'filterdrag';
	$shortcode_view = '';
	$output = array();
	$mashup_counter = $_POST['counter'];
	$tabs_num = 0;
	if (isset($_POST['action']) && !isset($_POST['shortcode_element_id'])) {
	    $POSTID = '';
	    $shortcode_element_id = '';
	} else {
	    $POSTID = $_POST['POSTID'];
	    $shortcode_element_id = $_POST['shortcode_element_id'];
	    $shortcode_str = stripslashes($shortcode_element_id);
	    $PREFIX = 'mashup_tabs|mashup_tabs_item';
	    $parseObject = new ShortcodeParse();
	    $output = $parseObject->mashup_shortcodes($output, $shortcode_str, true, $PREFIX);
	}
	$defaults = array(
	    'mashup_var_tabs_title' => '',
	    'mashup_var_tabs_style' => '',
	    'mashup_var_tab_sub_title' => '',
	    'mashup_var_tab_align' => '',
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
	    $tabs_num = count($atts_content);
	}
	$tabs_element_size = '25';
	foreach ($defaults as $key => $values) {
	    if (isset($atts[$key])) {
		$$key = $atts[$key];
	    } else {
		$$key = $values;
	    }
	}
	$name = 'mashup_var_page_builder_tabs';
	$coloumn_class = 'column_' . $tabs_element_size;
	$mashup_var_tabs_main_title = isset($mashup_var_tabs_main_title) ? $mashup_var_tabs_main_title : '';
	$mashup_var_tabs_style = isset($mashup_var_tabs_style) ? $mashup_var_tabs_style : '';
	$mashup_var_tab_sub_title = isset($mashup_var_tab_sub_title) ? $mashup_var_tab_sub_title : '';
	$mashup_var_tab_align = isset($mashup_var_tab_align) ? $mashup_var_tab_align : '';
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
	<div id="<?php echo mashup_allow_special_char($name . $mashup_counter) ?>_del" class="column  parentdelete <?php echo mashup_allow_special_char($coloumn_class); ?> <?php echo mashup_allow_special_char($shortcode_view); ?>" item="tabs" data="<?php echo mashup_element_size_data_array_index($tabs_element_size) ?>" >
	    <?php mashup_element_setting($name, $mashup_counter, $tabs_element_size, '', 'comments-o', $type = ''); ?>
	    <div class="cs-wrapp-class-<?php echo mashup_allow_special_char($mashup_counter) ?> <?php echo mashup_allow_special_char($shortcode_element); ?>" id="<?php echo mashup_allow_special_char($name . $mashup_counter) ?>" style="display: none;">
		<div class="cs-heading-area">
		    <h5><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_tabs_edit_options')); ?></h5>
		    <a href="javascript:mashup_frame_removeoverlay('<?php echo mashup_allow_special_char($name . $mashup_counter) ?>','<?php echo mashup_allow_special_char($filter_element); ?>')" class="cs-btnclose"><i class="icon-cancel"></i></a>
		</div>
		<div class="cs-clone-append cs-pbwp-content">
		    <div class="cs-wrapp-tab-box">
			<div id="shortcode-item-<?php echo mashup_allow_special_char($mashup_counter); ?>" data-shortcode-template="{{child_shortcode}} [/mashup_tabs]" data-shortcode-child-template="[mashup_tabs_item {{attributes}}] {{content}} [/mashup_tabs_item]">
			    <div class="cs-wrapp-clone cs-shortcode-wrapp cs-disable-true cs-pbwp-content" data-template="[mashup_tabs {{attributes}}]">
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
					'std' => mashup_allow_special_char($mashup_var_tabs_title),
					'id' => 'tabs_title' . $mashup_counter,
					'cust_name' => 'mashup_var_tabs_title[]',
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
					'std' => mashup_allow_special_char($mashup_var_tab_sub_title),
					'id' => 'mashup_var_tab_sub_title',
					'cust_name' => 'mashup_var_tab_sub_title[]',
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
					'cust_name' => 'mashup_var_tab_align[]',
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
				    'name' => mashup_var_theme_text_srt('mashup_var_tabs_tabs_style'),
				    'desc' => '',
				    'hint_text' => mashup_var_theme_text_srt('mashup_var_tabs_tabs_style_hint'),
				    'echo' => true,
				    'field_params' => array(
					'std' => mashup_allow_special_char($mashup_var_tabs_style),
					'id' => 'tabs_style' . $mashup_counter,
					'cust_name' => 'mashup_var_tabs_style[]',
					'classes' => 'dropdown chosen-select',
					'options' => array('Vertical' => mashup_var_theme_text_srt('mashup_var_tabs_vertical_style'), 'Horizontal' => mashup_var_theme_text_srt('mashup_var_tabs_horizontal_style'),),
					'return' => true,
				    ),
				);
				$mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);
				?>
			    </div>
			    <?php
			    if (isset($tabs_num) && $tabs_num <> '' && isset($atts_content) && is_array($atts_content)) {
				foreach ($atts_content as $tabs) {
				    $mashup_var_tabs_text = $tabs['content'];
				    $rand_id = rand(3333, 99999);
				    $defaults = array(
					'mashup_var_tabs_item_text' => 'Title',
					'mashup_var_tabs_item_icon' => '',
					'mashup_var_tabs_active' => ''
				    );
				    foreach ($defaults as $key => $values) {
					if (isset($tabs['atts'][$key]))
					    $$key = $tabs['atts'][$key];
					else
					    $$key = $values;
				    }
				    $mashup_var_tabs_item_text = isset($mashup_var_tabs_item_text) ? $mashup_var_tabs_item_text : '';
				    $mashup_var_tabs_desc = $mashup_var_tabs_text;
				    $mashup_var_tabs_item_icon = isset($mashup_var_tabs_item_icon) ? $mashup_var_tabs_item_icon : '';
				    $mashup_var_tabs_active = isset($mashup_var_tabs_active) ? $mashup_var_tabs_active : '';
				    ?>
				    <div class='cs-wrapp-clone cs-shortcode-wrapp  cs-pbwp-content'  id="mashup_infobox_<?php echo mashup_allow_special_char($rand_id); ?>">
					<header>
					    <h4><i class='icon-arrows'></i><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_tabs_tabs')); ?></h4>
					    <a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_tabs_remove')); ?></a></header>
					<?php
					$mashup_opt_array = array(
					    'name' => mashup_var_theme_text_srt('mashup_var_tabs_active'),
					    'desc' => '',
					    'hint_text' => mashup_var_theme_text_srt('mashup_var_tabs_active_hint'),
					    'echo' => true,
					    'field_params' => array(
						'std' => esc_html($mashup_var_tabs_active),
						'id' => 'tabs_active',
						'cust_name' => 'mashup_var_tabs_active[]',
						'options' => array('Yes' => mashup_var_theme_text_srt('mashup_var_yes'), 'No' => mashup_var_theme_text_srt('mashup_var_no')),
						'classes' => 'dropdown chosen-select',
						'return' => true,
					    ),
					);
					$mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);
					$mashup_opt_array = array(
					    'name' => mashup_var_theme_text_srt('mashup_var_tabs_item_text'),
					    'desc' => '',
					    'hint_text' => mashup_var_theme_text_srt('mashup_var_tabs_item_text_hint'),
					    'echo' => true,
					    'field_params' => array(
						'std' => esc_html($mashup_var_tabs_item_text),
						'id' => 'tabs_item_text' . $mashup_counter,
						'cust_name' => 'mashup_var_tabs_item_text[]',
						'classes' => '',
						'return' => true,
					    ),
					);
					$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
					?>
					<div class="form-elements" id="mashup_infobox_<?php echo esc_attr($rand_id); ?>">
					    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<label><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_tabs_icon')); ?></label>
						<?php
						if (function_exists('mashup_var_tooltip_helptext')) {
						    echo mashup_var_tooltip_helptext(mashup_var_theme_text_srt('mashup_var_tabs_icon_hint'));
						}
						?>
					    </div>
					    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<?php echo mashup_var_icomoon_icons_box(esc_html($mashup_var_tabs_item_icon), esc_attr($rand_id), 'mashup_var_tabs_item_icon'); ?>
					    </div>
					</div>
					<?php
					$mashup_opt_array = array(
					    'name' => mashup_var_theme_text_srt('mashup_var_tabs_descr'),
					    'desc' => '',
					    'hint_text' => mashup_var_theme_text_srt('mashup_var_tabs_descr_hint'),
					    'echo' => true,
					    'field_params' => array(
						'std' => mashup_allow_special_char($mashup_var_tabs_desc),
						'cust_id' => 'mashup_var_tabs_desc' . $mashup_counter,
						'cust_name' => 'mashup_var_tabs_desc[]',
						'return' => true,
						'classes' => '',
						'mashup_editor' => true,
					    ),
					);
					$mashup_var_html_fields->mashup_var_textarea_field($mashup_opt_array);
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
				'std' => $tabs_num,
				'id' => '',
				'before' => '',
				'after' => '',
				'classes' => 'fieldCounter',
				'extra_atr' => '',
				'cust_id' => '',
				'cust_name' => 'tabs_num[]',
				'required' => false
			    );
			    $mashup_var_form_fields->mashup_var_form_hidden_render($mashup_opt_array);
			    ?>
			</div>
			<div class="wrapptabbox">
			    <div class="opt-conts">
				<ul class="form-elements noborder">
				    <li class="to-field"> <a href="javascript:void(0);" class="add_servicesss cs-main-btn" onclick="mashup_shortcode_element_ajax_call('tabs', 'shortcode-item-<?php echo mashup_allow_special_char($mashup_counter); ?>', '<?php echo mashup_allow_special_char(admin_url('admin-ajax.php')); ?>')"><i class="icon-plus-circle"></i><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_tabs_add_tab')); ?></a> </li>
				    <div id="loading" class="shortcodeload"></div>
				</ul>
				<?php if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') { ?>
	    			<ul class="form-elements insert-bg">
	    			    <li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:mashup_shortcode_insert_editor('<?php echo esc_js(str_replace('mashup_var_page_builder_', '', $name)); ?>', 'shortcode-item-<?php echo mashup_allow_special_char($mashup_counter); ?>', '<?php echo mashup_allow_special_char($filter_element); ?>')" ><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_insert')); ?></a> </li>
	    			</ul>
	    			<div id="results-shortocde"></div>
				    <?php
				} else {
				    $mashup_opt_array = array(
					'std' => 'tabs',
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
				    } ?>
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
	?>
	<?php
    }

    add_action('wp_ajax_mashup_var_page_builder_tabs', 'mashup_var_page_builder_tabs');
}

if (!function_exists('mashup_save_page_builder_data_tabs_callback')) {

    /**
     * Save data for tabs shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_tabs_callback($args) {
	$data = $args['data'];
	$counters = $args['counters'];
	$widget_type = $args['widget_type'];
	$column = $args['column'];
	if ($widget_type == "tabs") {
	    $shortcode = $shortcode_item = '';
	    $tabs = $column->addChild('tabs');
	    $tabs->addChild('page_element_size', htmlspecialchars($data['tabs_element_size'][$counters['mashup_global_counter_tabs']]));
	    $tabs->addChild('tabs_element_size', htmlspecialchars($data['tabs_element_size'][$counters['mashup_global_counter_tabs']]));
	    if (isset($data['mashup_widget_element_num'][$counters['mashup_counter']]) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode') {
		$shortcode_str = stripslashes($data['shortcode']['tabs'][$counters['mashup_shortcode_counter_tabs']]);
		$counters['mashup_shortcode_counter_tabs'] ++;
		$tabs->addChild('mashup_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
	    } else {
		if (isset($data['tabs_num'][$counters['mashup_counter_tabs']]) && $data['tabs_num'][$counters['mashup_counter_tabs']] > 0) {
		    for ($i = 1; $i <= $data['tabs_num'][$counters['mashup_counter_tabs']]; $i ++) {
			$shortcode_item .= '[mashup_tabs_item ';
			if (isset($data['mashup_var_tabs_item_text'][$counters['mashup_counter_tabs_node']]) && $data['mashup_var_tabs_item_text'][$counters['mashup_counter_tabs_node']] != '') {
			    $shortcode_item .= 'mashup_var_tabs_item_text="' . htmlspecialchars($data['mashup_var_tabs_item_text'][$counters['mashup_counter_tabs_node']], ENT_QUOTES) . '" ';
			}
			if (isset($data['mashup_var_tabs_item_icon'][$counters['mashup_counter_tabs_node']]) && $data['mashup_var_tabs_item_icon'][$counters['mashup_counter_tabs_node']] != '') {
			    $shortcode_item .= 'mashup_var_tabs_item_icon="' . htmlspecialchars($data['mashup_var_tabs_item_icon'][$counters['mashup_counter_tabs_node']], ENT_QUOTES) . '" ';
			}
			if (isset($data['mashup_var_tabs_active'][$counters['mashup_counter_tabs_node']]) && $data['mashup_var_tabs_active'][$counters['mashup_counter_tabs_node']] != '') {
			    $shortcode_item .= 'mashup_var_tabs_active="' . htmlspecialchars($data['mashup_var_tabs_active'][$counters['mashup_counter_tabs_node']], ENT_QUOTES) . '" ';
			}
			$shortcode_item .= ']';
			if (isset($data['mashup_var_tabs_desc'][$counters['mashup_counter_tabs_node']]) && $data['mashup_var_tabs_desc'][$counters['mashup_counter_tabs_node']] != '') {
			    $shortcode_item .= htmlspecialchars($data['mashup_var_tabs_desc'][$counters['mashup_counter_tabs_node']], ENT_QUOTES);
			}
			$shortcode_item .= '[/mashup_tabs_item]';
			$counters['mashup_counter_tabs_node'] ++;
		    }
		}
		$section_title = '';
		if (isset($data['mashup_var_tabs_title'][$counters['mashup_counter_tabs']]) && $data['mashup_var_tabs_title'][$counters['mashup_counter_tabs']] != '') {
		    $section_title .= 'mashup_var_tabs_title="' . htmlspecialchars($data['mashup_var_tabs_title'][$counters['mashup_counter_tabs']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_tabs_style'][$counters['mashup_counter_tabs']]) && $data['mashup_var_tabs_style'][$counters['mashup_counter_tabs']] != '') {
		    $section_title .= 'mashup_var_tabs_style="' . htmlspecialchars($data['mashup_var_tabs_style'][$counters['mashup_counter_tabs']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_tab_sub_title'][$counters['mashup_counter_tabs']]) && $data['mashup_var_tab_sub_title'][$counters['mashup_counter_tabs']] != '') {
		    $section_title .= 'mashup_var_tab_sub_title="' . htmlspecialchars($data['mashup_var_tab_sub_title'][$counters['mashup_counter_tabs']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_tab_align'][$counters['mashup_counter_tabs']]) && $data['mashup_var_tab_align'][$counters['mashup_counter_tabs']] != '') {
		    $section_title .= 'mashup_var_tab_align="' . htmlspecialchars($data['mashup_var_tab_align'][$counters['mashup_counter_tabs']], ENT_QUOTES) . '" ';
		}
		$shortcode = '[mashup_tabs ' . $section_title . ' ]' . $shortcode_item . '[/mashup_tabs]';
		$tabs->addChild('mashup_shortcode', $shortcode);
		$counters['mashup_counter_tabs'] ++;
	    }
	    $counters['mashup_global_counter_tabs'] ++;
	}
	return array(
	    'data' => $data,
	    'counters' => $counters,
	    'widget_type' => $widget_type,
	    'column' => $column,
	);
    }

    add_filter('mashup_save_page_builder_data', 'mashup_save_page_builder_data_tabs_callback');
}

if (!function_exists('mashup_load_shortcode_counters_tabs_callback')) {

    /**
     * Populate tabs shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_tabs_callback($counters) {
	$counters['mashup_counter_tabs'] = 0;
	$counters['mashup_counter_tabs_node'] = 0;
	$counters['mashup_shortcode_counter_tabs'] = 0;
	$counters['mashup_global_counter_tabs'] = 0;
	return $counters;
    }

    add_filter('mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_tabs_callback');
}

if (!function_exists('mashup_shortcode_names_list_populate_tabs_callback')) {

    /**
     * Populate tabs shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_tabs_callback($shortcode_array) {
	$shortcode_array['tabs'] = array(
	    'title' => mashup_var_frame_text_srt('mashup_var_tabs'),
	    'name' => 'tabs',
	    'icon' => 'icon-tab',
	    'categories' => 'contentblocks',
	    'desc' => mashup_var_frame_text_srt('mashup_var_tabs_desc'),
	);
	return $shortcode_array;
    }

    add_filter('mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_tabs_callback');
}

if (!function_exists('mashup_element_list_populate_tabs_callback')) {

    /**
     * Populate tabs shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_tabs_callback($element_list) {
	$element_list['tabs'] = mashup_var_frame_text_srt('mashup_var_tabs');
	return $element_list;
    }

    add_filter('mashup_element_list_populate', 'mashup_element_list_populate_tabs_callback');
}

if (!function_exists('mashup_shortcode_sub_element_ui_tabs_callback')) {

    /**
     * Render UI for sub element in tabs settings.
     *
     * @param	array $args
     */
    function mashup_shortcode_sub_element_ui_tabs_callback($args) {
	$type = $args['type'];
	$mashup_var_html_fields = $args['html_fields'];
	if ($type == 'tabs') {
	    $rand_id = rand(23, 45453);
	    ?>
	    <div class='cs-wrapp-clone cs-shortcode-wrapp'  id="mashup_tabs_<?php echo intval($rand_id); ?>">
	        <header>
	    	<h4><i class='icon-arrows'></i><?php echo esc_html( mashup_var_frame_text_srt('mashup_var_tab') ); ?></h4>
	    	<a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo esc_html( mashup_var_frame_text_srt('mashup_var_remove') ); ?></a>
	        </header>
		<?php
		$mashup_opt_array = array(
		    'name' => mashup_var_frame_text_srt('mashup_var_tab_active'),
		    'desc' => '',
		    'hint_text' => mashup_var_frame_text_srt('mashup_var_tab_active_hint'),
		    'echo' => true,
		    'field_params' => array(
			'std' => '',
			'id' => 'tabs_item_text',
			'cust_name' => 'mashup_var_tabs_active[]',
			'classes' => 'dropdown chosen-select',
			'options' => array('Yes' => mashup_var_frame_text_srt('mashup_var_yes'), 'No' => mashup_var_frame_text_srt('mashup_var_no')),
			'return' => true,
		    ),
		);
		$mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);

		$mashup_opt_array = array(
		    'name' => mashup_var_frame_text_srt('mashup_var_tab_item_text'),
		    'desc' => '',
		    'hint_text' => mashup_var_frame_text_srt('mashup_var_tab_item_text_hint'),
		    'echo' => true,
		    'field_params' => array(
			'std' => '',
			'id' => 'tabs_item_text',
			'cust_name' => 'mashup_var_tabs_item_text[]',
			'classes' => '',
			'return' => true,
		    ),
		);
		$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
		?>
	        <div class="form-elements" id="mashup_infobox_<?php echo esc_attr($rand_id); ?>">
	    	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
	    	    <label><?php echo esc_html(mashup_var_frame_text_srt('mashup_var_tab_icon')); ?></label>
			<?php
			if (function_exists('mashup_var_tooltip_helptext')) {
			    echo mashup_var_tooltip_helptext(mashup_var_frame_text_srt('mashup_var_tab_icon_hint'));
			}
			?>
	    	</div>
	    	<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<?php echo mashup_var_icomoon_icons_box('', $rand_id, 'mashup_var_tabs_item_icon'); ?>
	    	</div>
	        </div>
		<?php
		$mashup_opt_array = array(
		    'name' => mashup_var_frame_text_srt('mashup_var_tab_desc'),
		    'desc' => '',
		    'hint_text' => mashup_var_frame_text_srt('mashup_var_tab_desc_hint'),
		    'echo' => true,
		    'field_params' => array(
			'std' => '',
			'id' => 'mashup_var_tabs_desc',
			'cust_name' => 'mashup_var_tabs_desc[]',
			'extra_atr' => ' data-content-text="cs-shortcode-textarea"',
			'return' => true,
			'classes' => '',
			'mashup_editor' => true
		    ),
		);
		$mashup_var_html_fields->mashup_var_textarea_field($mashup_opt_array);
		?>   
	    </div>
	    <?php
	}
    }

    add_action('mashup_shortcode_sub_element_ui', 'mashup_shortcode_sub_element_ui_tabs_callback');
}