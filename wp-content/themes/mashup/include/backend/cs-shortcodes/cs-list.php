<?php
/*
 *
 * @Shortcode Name : List
 * @retrun
 *
 * 
 */
if (!function_exists('mashup_var_page_builder_list')) {

    function mashup_var_page_builder_list($die = 0) {
	global $mashup_node, $count_node, $post, $mashup_var_html_fields, $mashup_var_form_fields;

	$shortcode_element = '';
	$filter_element = 'filterdrag';
	$shortcode_view = '';
	$output = array();
	$mashup_counter = $_POST['counter'];
	$list_num = 0;
	if (isset($_POST['action']) && !isset($_POST['shortcode_element_id'])) {
	    $POSTID = '';
	    $shortcode_element_id = '';
	} else {
	    $POSTID = $_POST['POSTID'];
	    $shortcode_element_id = $_POST['shortcode_element_id'];
	    $shortcode_str = stripslashes($shortcode_element_id);
	    $PREFIX = 'mashup_list|mashup_list_item';
	    $parseObject = new ShortcodeParse();
	    $output = $parseObject->mashup_shortcodes($output, $shortcode_str, true, $PREFIX);
	}
	$defaults = array(
	    'mashup_var_list_title' => '',
	    'mashup_var_list_type' => '',
	    'mashup_var_list_item_icon_color' => '',
	    'mashup_var_list_item_icon_bg_color' => '',
	    'mashup_var_list_sub_title' => '',
	    'mashup_var_list_element_align' => '',
	);
	$mashup_var_list_item_icon_color = isset($mashup_var_list_item_icon_color) ? $mashup_var_list_item_icon_color : '';
	$mashup_var_list_item_icon_bg_color = isset($mashup_var_list_item_icon_bg_color) ? $mashup_var_list_item_icon_bg_color : '';

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
	    $list_num = count($atts_content);
	}
	$list_element_size = '25';
	foreach ($defaults as $key => $values) {
	    if (isset($atts[$key])) {
		$$key = $atts[$key];
	    } else {
		$$key = $values;
	    }
	}

	$name = 'mashup_var_page_builder_list';
	$coloumn_class = 'column_' . $list_element_size;
	$mashup_var_list_main_title = isset($mashup_var_list_main_title) ? $mashup_var_list_main_title : '';
	$mashup_var_list_sub_title = isset($mashup_var_list_sub_title) ? $mashup_var_list_sub_title : '';
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
	<div id="<?php echo mashup_allow_special_char($name . $mashup_counter) ?>_del" class="column  parentdelete <?php echo mashup_allow_special_char($coloumn_class); ?> <?php echo mashup_allow_special_char($shortcode_view); ?>" item="list" data="<?php echo mashup_element_size_data_array_index($list_element_size) ?>" >
	    <?php mashup_element_setting($name, $mashup_counter, $list_element_size, '', 'comments-o', $type = ''); ?>
	    <div class="cs-wrapp-class-<?php echo mashup_allow_special_char($mashup_counter) ?> <?php echo mashup_allow_special_char($shortcode_element); ?>" id="<?php echo mashup_allow_special_char($name . $mashup_counter) ?>" style="display: none;">
		<div class="cs-heading-area">
		    <h5><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_list_edit_option')); ?></h5>
		    <a href="javascript:mashup_frame_removeoverlay('<?php echo mashup_allow_special_char($name . $mashup_counter) ?>','<?php echo mashup_allow_special_char($filter_element); ?>')" class="cs-btnclose"><i class="icon-cancel"></i></a>
		</div>
		<div class="cs-clone-append cs-pbwp-content">
		    <div class="cs-wrapp-tab-box">
			<div id="shortcode-item-<?php echo mashup_allow_special_char($mashup_counter); ?>" data-shortcode-template="{{child_shortcode}} [/mashup_list]" data-shortcode-child-template="[mashup_list_item {{attributes}}] {{content}} [/mashup_list_item]">
			    <div class="cs-wrapp-clone cs-shortcode-wrapp cs-disable-true cs-pbwp-content" data-template="[mashup_list {{attributes}}]">
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
					'std' => mashup_allow_special_char($mashup_var_list_title),
					'id' => 'list_title' . $mashup_counter,
					'cust_name' => 'mashup_var_list_title[]',
					'classes' => '',
					'return' => true,
				    ),
				);
				$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);

				// element subtitle
				$mashup_opt_array = array(
				    'name' => mashup_var_theme_text_srt('mashup_var_element_sub_title'),
				    'desc' => '',
				    'hint_text' => mashup_var_theme_text_srt('mashup_var_element_sub_title_hint'),
				    'echo' => true,
				    'field_params' => array(
					'std' => esc_attr($mashup_var_list_sub_title),
					'cust_id' => '',
					'cust_name' => 'mashup_var_list_sub_title[]',
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
					'std' => $mashup_var_list_element_align,
					'id' => '',
					'cust_id' => '',
					'cust_name' => 'mashup_var_list_element_align[]',
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
				    'name' => mashup_var_theme_text_srt('mashup_var_list_style'),
				    'desc' => '',
				    'hint_text' => mashup_var_theme_text_srt('mashup_var_list_style_hint'),
				    'echo' => true,
				    'field_params' => array(
					'std' => $mashup_var_list_type,
					'id' => '',
					'cust_id' => 'mashup_var_list_type',
					'cust_name' => 'mashup_var_list_type[]',
					'classes' => 'dropdown chosen-select',
					'options' => array(
					    'default' => mashup_var_theme_text_srt('mashup_var_list_style_default'),
					    'numeric-icon' => mashup_var_theme_text_srt('mashup_var_list_style_numeric'),
					    'built' => mashup_var_theme_text_srt('mashup_var_list_bullet'),
					    'icon' => mashup_var_theme_text_srt('mashup_var_list_icon'),
					    'alphabetic' => mashup_var_theme_text_srt('mashup_var_list_alphabetic'),
					),
					'return' => true,
				    ),
				);
				$mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);
				?>
				<style type="text/css">
				    .icon_fields{ display: <?php echo esc_html($mashup_var_list_type == 'icon' ? 'block' : 'none' ) ?>; }
				</style>
				<div class="icon_fields">   
				    <?php
				    $mashup_opt_array = array(
					'name' => mashup_var_theme_text_srt('mashup_var_list_sc_icon_color'),
					'desc' => '',
					'hint_text' => mashup_var_theme_text_srt('mashup_var_list_sc_icon_color_hint'),
					'echo' => true,
					'field_params' => array(
					    'std' => $mashup_var_list_item_icon_color,
					    'id' => 'mashup_var_list_item_icon_color' . $mashup_counter,
					    'cust_name' => 'mashup_var_list_item_icon_color[]',
					    'classes' => 'bg_color',
					    'return' => true,
					),
				    );
				    $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);

				    $mashup_opt_array = array(
					'name' => mashup_var_theme_text_srt('mashup_var_list_sc_icon_bg_color'),
					'desc' => '',
					'hint_text' => mashup_var_theme_text_srt('mashup_var_list_sc_icon_bg_color_hint'),
					'echo' => true,
					'field_params' => array(
					    'std' => mashup_allow_special_char($mashup_var_list_item_icon_bg_color),
					    'id' => 'mashup_var_list_item_icon_bg_color' . $mashup_counter,
					    'cust_name' => 'mashup_var_list_item_icon_bg_color[]',
					    'classes' => 'bg_color',
					    'return' => true,
					),
				    );
				    $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
				    ?>
				</div>
				
			    </div>
			    <?php
			    if (isset($list_num) && $list_num <> '' && isset($atts_content) && is_array($atts_content)) {
				foreach ($atts_content as $list) {

				    $rand_id = rand(3333, 99999);
				    $mashup_var_list_text = $list['content'];
				    $defaults = array('mashup_var_list_item_text' => '', 'mashup_var_list_item_icon' => '');
				    foreach ($defaults as $key => $values) {
					if (isset($list['atts'][$key]))
					    $$key = $list['atts'][$key];
					else
					    $$key = $values;
				    }

				    $mashup_var_list_item_text = isset($mashup_var_list_item_text) ? $mashup_var_list_item_text : '';
				    $mashup_var_list_item_icon = isset($mashup_var_list_item_icon) ? $mashup_var_list_item_icon : '';
				    ?>
				    <div class='cs-wrapp-clone cs-shortcode-wrapp  cs-pbwp-content'  id="mashup_infobox_<?php echo mashup_allow_special_char($rand_id); ?>">
					<header>
					    <h4><i class='icon-arrows'></i><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_list_sc')); ?></h4>
					    <a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_remove')); ?></a></header>
					<?php
					$mashup_opt_array = array(
					    'name' => mashup_var_theme_text_srt('mashup_var_list_sc_item'),
					    'desc' => '',
					    'hint_text' => mashup_var_theme_text_srt('mashup_var_list_sc_item_hint'),
					    'echo' => true,
					    'field_params' => array(
						'std' => esc_html($mashup_var_list_item_text),
						'id' => 'list_item_text' . $mashup_counter,
						'cust_name' => 'mashup_var_list_item_text[]',
						'classes' => '',
						'return' => true,
					    ),
					);
					$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
					?>	 				

					<div class="icon_fields">
					    <div class="form-elements" id="mashup_infobox_<?php echo esc_attr($rand_id); ?>">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						    <label><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_list_sc_icon')); ?></label>
						    <?php
						    if (function_exists('mashup_var_tooltip_helptext')) {
							echo mashup_var_tooltip_helptext(mashup_var_theme_text_srt('mashup_var_list_sc_icon_hint'));
						    }
						    ?>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
						    <?php echo mashup_var_icomoon_icons_box(esc_html($mashup_var_list_item_icon), esc_attr($rand_id), 'mashup_var_list_item_icon'); ?>
						</div>
					    </div>
					    <?php
					    ?>
					</div>
				    </div>

				    <?php
				}
			    }
			    ?>
			</div>
			<div class="hidden-object">
			    <?php
			    $mashup_opt_array = array(
				'std' => $list_num,
				'id' => '',
				'before' => '',
				'after' => '',
				'classes' => 'fieldCounter',
				'extra_atr' => '',
				'cust_id' => '',
				'cust_name' => 'list_num[]',
				'return' => false,
				'required' => false
			    );
			    $mashup_var_form_fields->mashup_var_form_hidden_render($mashup_opt_array);
			    ?>
			</div>
			<div class="wrapptabbox">
			    <div class="opt-conts">
				<ul class="form-elements noborder">
				    <li class="to-field"> <a href="javascript:void(0);" class="add_servicesss cs-main-btn" onclick="mashup_shortcode_element_ajax_call('list', 'shortcode-item-<?php echo mashup_allow_special_char($mashup_counter); ?>', '<?php echo mashup_allow_special_char(admin_url('admin-ajax.php')); ?>')"><i class="icon-plus-circle"></i><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_list_sc_add_item')); ?></a> </li>
				    <div id="loading" class="shortcodeload"></div>
				</ul>
				<?php if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') { ?>
	    			<ul class="form-elements insert-bg">
	    			    <li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:mashup_shortcode_insert_editor('<?php echo esc_js(str_replace('mashup_var_page_builder_', '', $name)); ?>', 'shortcode-item-<?php echo mashup_allow_special_char($mashup_counter); ?>', '<?php echo mashup_allow_special_char($filter_element); ?>')" ><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_insert')); ?></a> </li>
	    			</ul>
	    			<div id="results-shortocde"></div>
				<?php } else { ?>

				    <?php
				    $mashup_opt_array = array(
					'std' => 'list',
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
				    $mashup_var_form_fields->mashup_var_form_hidden_render($mashup_opt_array);
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
	</div>
	
	<?php
	if ($die <> 1) {
	    die();
	}
	?>
	<?php
    }

    add_action('wp_ajax_mashup_var_page_builder_list', 'mashup_var_page_builder_list');
}
if (!function_exists('mashup_save_page_builder_data_list_callback')) {

    /**
     * Save data for list shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_list_callback($args) {

	$data = $args['data'];
	$counters = $args['counters'];
	$widget_type = $args['widget_type'];
	$column = $args['column'];
	if ($widget_type == "list") {
		$shortcode = $shortcode_item = '';
	    $list = $column->addChild('list');
	    $list->addChild('page_element_size', htmlspecialchars($data['list_element_size'][$counters['mashup_global_counter_list']]));
	    $list->addChild('list_element_size', htmlspecialchars($data['list_element_size'][$counters['mashup_global_counter_list']]));
	    if (isset($data['mashup_widget_element_num'][$counters['mashup_counter']]) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode') {
		$shortcode_str = stripslashes($data['shortcode']['list'][$counters['mashup_shortcode_counter_list']]);
		$counters['mashup_shortcode_counter_list'] ++;
		$list->addChild('mashup_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
	    } else {
		if (isset($data['list_num'][$counters['mashup_counter_list']]) && $data['list_num'][$counters['mashup_counter_list']] > 0) {
		    for ($i = 1; $i <= $data['list_num'][$counters['mashup_counter_list']]; $i ++) {
			$shortcode_item .= '[mashup_list_item ';
			if (isset($data['mashup_var_list_item_text'][$counters['mashup_counter_list_node']]) && $data['mashup_var_list_item_text'][$counters['mashup_counter_list_node']] != '') {
			    $shortcode_item .= 'mashup_var_list_item_text="' . htmlspecialchars($data['mashup_var_list_item_text'][$counters['mashup_counter_list_node']], ENT_QUOTES) . '" ';
			}
			if (isset($data['mashup_var_list_item_icon'][$counters['mashup_counter_list_node']]) && $data['mashup_var_list_item_icon'][$counters['mashup_counter_list_node']] != '') {
			    $shortcode_item .= 'mashup_var_list_item_icon="' . htmlspecialchars($data['mashup_var_list_item_icon'][$counters['mashup_counter_list_node']], ENT_QUOTES) . '" ';
			}
			$shortcode_item .= ']';
			$shortcode_item .= '[/mashup_list_item]';
			$counters['mashup_counter_list_node'] ++;
		    }
		}
		$section_title = '';
		if (isset($data['mashup_var_list_title'][$counters['mashup_counter_list']]) && $data['mashup_var_list_title'][$counters['mashup_counter_list']] != '') {
		    $section_title .= 'mashup_var_list_title="' . htmlspecialchars($data['mashup_var_list_title'][$counters['mashup_counter_list']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_list_sub_title'][$counters['mashup_counter_list']]) && $data['mashup_var_list_sub_title'][$counters['mashup_counter_list']] != '') {
		    $section_title .= 'mashup_var_list_sub_title="' . htmlspecialchars($data['mashup_var_list_sub_title'][$counters['mashup_counter_list']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_list_element_align'][$counters['mashup_counter_list']]) && $data['mashup_var_list_element_align'][$counters['mashup_counter_list']] != '') {
		    $section_title .= 'mashup_var_list_element_align="' . htmlspecialchars($data['mashup_var_list_element_align'][$counters['mashup_counter_list']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_list_type'][$counters['mashup_counter_list']]) && $data['mashup_var_list_type'][$counters['mashup_counter_list']] != '') {
		    $section_title .= 'mashup_var_list_type="' . htmlspecialchars($data['mashup_var_list_type'][$counters['mashup_counter_list']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_list_item_icon_color'][$counters['mashup_counter_list']]) && $data['mashup_var_list_item_icon_color'][$counters['mashup_counter_list']] != '') {
		    $section_title .= 'mashup_var_list_item_icon_color="' . htmlspecialchars($data['mashup_var_list_item_icon_color'][$counters['mashup_counter_list']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_list_item_icon_bg_color'][$counters['mashup_counter_list']]) && $data['mashup_var_list_item_icon_bg_color'][$counters['mashup_counter_list']] != '') {
		    $section_title .= 'mashup_var_list_item_icon_bg_color="' . htmlspecialchars($data['mashup_var_list_item_icon_bg_color'][$counters['mashup_counter_list']], ENT_QUOTES) . '" ';
		}
		$shortcode = '[mashup_list ' . $section_title . ' ]' . $shortcode_item . '[/mashup_list]';
		$list->addChild('mashup_shortcode', $shortcode);
		$counters['mashup_counter_list'] ++;
	    }
	    $counters['mashup_global_counter_list'] ++;
	}
	return array(
	    'data' => $data,
	    'counters' => $counters,
	    'widget_type' => $widget_type,
	    'column' => $column,
	);
    }

    add_filter('mashup_save_page_builder_data', 'mashup_save_page_builder_data_list_callback');
}

if (!function_exists('mashup_load_shortcode_counters_list_callback')) {

    /**
     * Populate list shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_list_callback($counters) {
	$counters['mashup_global_counter_list'] = 0;
	$counters['mashup_shortcode_counter_list'] = 0;
	$counters['mashup_counter_list_node'] = 0;
	$counters['mashup_counter_list'] = 0;

	return $counters;
    }

    add_filter('mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_list_callback');
}

if (!function_exists('mashup_shortcode_names_list_populate_list_callback')) {

    /**
     * Populate list shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_list_callback($shortcode_array) {
	$shortcode_array['list'] = array(
	    'title' => mashup_var_frame_text_srt('mashup_var_list'),
	    'name' => 'list',
	    'icon' => 'icon-list',
	    'categories' => 'typography',
	);
	return $shortcode_array;
    }

    add_filter('mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_list_callback');
}

if (!function_exists('mashup_element_list_populate_list_callback')) {

    /**
     * Populate list shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_list_callback($element_list) {
	$element_list['list'] = mashup_var_frame_text_srt('mashup_var_list');
	return $element_list;
    }

    add_filter('mashup_element_list_populate', 'mashup_element_list_populate_list_callback');
}

if (!function_exists('mashup_shortcode_sub_element_ui_list_callback')) {

    /**
     * Render UI for sub element in list settings.
     *
     * @param	array $args
     */
    function mashup_shortcode_sub_element_ui_list_callback($args) {
	$type = $args['type'];
	$mashup_var_html_fields = $args['html_fields'];

	if ($type == 'list') {

	    $rand_id = rand(23, 45453);
	    ?>
	    <div class='cs-wrapp-clone cs-shortcode-wrapp'  id="mashup_list_<?php echo intval($rand_id); ?>">
	        <header>
	    	<h4><i class='icon-arrows'></i><?php echo esc_html( mashup_var_frame_text_srt('mashup_var_list') ); ?></h4>
	    	<a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo esc_html( mashup_var_frame_text_srt('mashup_var_remove') ); ?></a>
	        </header>
		<?php
		$mashup_opt_array = array(
		    'name' => mashup_var_frame_text_srt('mashup_var_list_Item'),
		    'desc' => '',
		    'hint_text' => mashup_var_frame_text_srt('mashup_var_list_Item_hint'),
		    'echo' => true,
		    'field_params' => array(
			'std' => '',
			'id' => 'list_item_text',
			'cust_name' => 'mashup_var_list_item_text[]',
			'classes' => '',
			'return' => true,
		    ),
		);
		$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
		?>	 				

	        <div class="icon_fields">
	    	<div class="form-elements" id="mashup_infobox_<?php echo esc_attr($rand_id); ?>">
	    	    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
	    		<label><?php echo esc_html( mashup_var_frame_text_srt('mashup_var_icon') ); ?></label>
			    <?php
			    if (function_exists('mashup_var_tooltip_helptext')) {
				echo mashup_var_tooltip_helptext(mashup_var_frame_text_srt('mashup_var_icon_tooltip'));
			    }
			    ?>
	    	    </div>
	    	    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			    <?php echo mashup_var_icomoon_icons_box('', $rand_id, 'mashup_var_list_item_icon'); ?>
	    	    </div>
	    	</div>
	        </div>
	    </div>
	     
	    <?php
	}
    }

    add_action('mashup_shortcode_sub_element_ui', 'mashup_shortcode_sub_element_ui_list_callback');
}

