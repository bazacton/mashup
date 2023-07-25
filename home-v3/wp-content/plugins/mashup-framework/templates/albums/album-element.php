<?php
/*
 * Albums Element
 */

if (!function_exists('mashup_var_page_builder_album')) {

    function mashup_var_page_builder_album($die = 0) {
	global $mashup_var_node, $post, $mashup_var_html_fields, $mashup_var_form_fields, $mashup_var_static_text;
	$strings = new mashup_theme_all_strings;
	$strings->mashup_short_code_strings();
	$strings->mashup_theme_option_strings();
	$shortcode_element = '';
	$filter_element = 'filterdrag';
	$shortcode_view = '';
	$output = array();
	$counter = $_POST['counter'];
	$mashup_counter = $_POST['counter'];
	if (isset($_POST['action']) && !isset($_POST['shortcode_element_id'])) {
	    $POSTID = '';
	    $shortcode_element_id = '';
	} else {
	    $POSTID = $_POST['POSTID'];
	    $shortcode_element_id = $_POST['shortcode_element_id'];
	    $shortcode_str = stripslashes($shortcode_element_id);
	    $PREFIX = 'mashup_album';
	    $parseObject = new ShortcodeParse();
	    $output = $parseObject->mashup_shortcodes($output, $shortcode_str, true, $PREFIX);
	}
	$defaults = array(
	    'mashup_album_element_title' => '',
	    'mashup_album_cat' => '',
	    'mashup_album_order_by' => 'ID',
	    'mashup_album_order_by_dir' => 'DESC',
	    'mashup_album_posts_title_length' => '',
	    'mashup_album_num_post' => '5',
	    'album_pagination' => '',
	    'mashup_album_size' => '',
	    'mashup_var_albums_sub_title' => '',
	    'mashup_var_albums_align' => '',
	);
	if (isset($output['0']['atts'])) {
	    $atts = $output['0']['atts'];
	} else {
	    $atts = array();
	}
	$album_element_size = '100';
	foreach ($defaults as $key => $values) {
	    if (isset($atts[$key])) {
		$$key = $atts[$key];
	    } else {
		$$key = $values;
	    }
	}
	$name = 'album';
	$coloumn_class = 'column_' . $album_element_size;
	if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') {
	    $shortcode_element = 'shortcode_element_class';
	    $shortcode_view = 'cs-pbwp-shortcode';
	    $filter_element = 'ajax-drag';
	    $coloumn_class = '';
	}
	$mashup_rand_id = rand(13441324, 93441324);
	?>
	<div id="<?php echo esc_attr($name . $mashup_counter); ?>_del" class="column  parentdelete <?php echo esc_attr($coloumn_class); ?> <?php echo esc_attr($shortcode_view); ?>" item="album" data="<?php echo mashup_element_size_data_array_index($album_element_size) ?>">
	    <?php mashup_element_setting($name, $mashup_counter, $album_element_size); ?>
	    <div class="cs-wrapp-class-<?php echo intval($mashup_counter) ?> <?php echo esc_attr($shortcode_element); ?>" id="<?php echo esc_attr($name . $mashup_counter) ?>" data-shortcode-template="[mashup_album {{attributes}}]"  style="display: none;">
		<div class="cs-heading-area">
		    <h5><?php echo esc_html(mashup_var_frame_text_srt('mashup_ele_edit_album_settings')); ?></h5>
		    <a href="javascript:mashup_frame_removeoverlay('<?php echo esc_js($name . $mashup_counter); ?>','<?php echo esc_js($filter_element); ?>')" class="cs-btnclose"><i class="icon-cancel"></i></a>
		</div>
		<div class="cs-pbwp-content">
		    <div class="cs-wrapp-clone cs-shortcode-wrapp">
			<?php
			if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') {
			    mashup_shortcode_element_size();
			}

			$mashup_opt_array = array(
			    'name' => mashup_var_frame_text_srt('mashup_var_album_element_title'),
			    'desc' => '',
			    'hint_text' => mashup_var_frame_text_srt('mashup_var_album_element_title_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => esc_attr($mashup_album_element_title),
				'cust_id' => '',
				'cust_name' => 'mashup_album_element_title[]',
				'return' => true,
			    ),
			);

			$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);

			$mashup_opt_array = array(
			    'name' => mashup_var_frame_text_srt('mashup_var_element_sub_title'),
			    'desc' => '',
			    'hint_text' => mashup_var_frame_text_srt('mashup_var_element_sub_title_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => mashup_allow_special_char($mashup_var_albums_sub_title),
				'id' => 'mashup_var_albums_sub_title',
				'cust_name' => 'mashup_var_albums_sub_title[]',
				'classes' => '',
				'return' => true,
			    ),
			);
			$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);

			$mashup_opt_array = array(
			    'name' => mashup_var_frame_text_srt('mashup_var_align'),
			    'desc' => '',
			    'hint_text' => mashup_var_frame_text_srt('mashup_var_align_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => $mashup_var_albums_align,
				'id' => '',
				'cust_id' => '',
				'cust_name' => 'mashup_var_albums_align[]',
				'classes' => 'dropdown chosen-select',
				'options' => array(
				    'left' => mashup_var_frame_text_srt('mashup_var_heading_sc_left'),
				    'right' => mashup_var_frame_text_srt('mashup_var_heading_sc_right'),
				    'center' => mashup_var_frame_text_srt('mashup_var_heading_sc_center'),
				),
				'return' => true,
			    ),
			);

			$mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);



			$a_options = array();
			$mashup_album_cat = isset($mashup_album_cat) ? $mashup_album_cat : '';
			if ('' != $mashup_album_cat) {
			    $mashup_album_cat = explode(',', $mashup_album_cat);
			}
			$a_options = mashup_show_all_cats('', '', $mashup_album_cat, "album-category", true);
			$mashup_opt_array = array(
			    'name' => mashup_var_frame_text_srt('mashup_var_album_choose_category'),
			    'desc' => '',
			    'hint_text' => mashup_var_frame_text_srt('mashup_var_album_cat_hint'),
			    'echo' => true,
			    'multi' => true,
			    'field_params' => array(
				'std' => $mashup_album_cat,
				'id' => '',
				'cust_name' => 'mashup_album_cat[' . $mashup_rand_id . '][]',
				'classes' => 'dropdown chosen-select',
				'options' => $a_options,
				'return' => true,
			    ),
			);

			$mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);
			?>
			<div id="album-listing<?php echo intval($mashup_counter); ?>" >
			    <?php
			    $mashup_opt_array = array(
				'name' => mashup_var_frame_text_srt('mashup_var_album_col'),
				'desc' => '',
				'hint_text' => mashup_var_frame_text_srt('mashup_var_album_col_hint'),
				'echo' => true,
				'field_params' => array(
				    'std' => $mashup_album_size,
				    'id' => '',
				    'cust_name' => 'mashup_album_size[]',
				    'classes' => 'dropdown chosen-select',
				    'options' => array(
					'1' => mashup_var_frame_text_srt('mashup_var_one_col'),
					'2' => mashup_var_frame_text_srt('mashup_var_two_col'),
					'3' => mashup_var_frame_text_srt('mashup_var_three_col'),
					'4' => mashup_var_frame_text_srt('mashup_var_four_col'),
					'6' => mashup_var_frame_text_srt('mashup_var_six_col'),
				    ),
				    'return' => true,
				),
			    );
			    $mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);

			    $options = array(
				'id' => mashup_var_frame_text_srt('mashup_var_album_views_widget_order_by_id'),
				'date' => mashup_var_frame_text_srt('mashup_var_album_views_widget_order_by_date'),
				'title' => mashup_var_frame_text_srt('mashup_var_album_views_widget_order_by_title'),
			    );
			    $options = apply_filters('posts_order_by_options', $options);
			    $mashup_opt_array = array(
				'name' => mashup_var_frame_text_srt('mashup_var_album_views_order_by'),
				'desc' => '',
				'hint_text' => mashup_var_frame_text_srt('mashup_var_album_post_order_by_hint'),
				'echo' => true,
				'field_params' => array(
				    'options' => $options,
				    'std' => esc_attr($mashup_album_order_by),
				    'id' => '',
				    'classes' => 'dropdown chosen-select',
				    'cust_id' => '',
				    'cust_name' => 'mashup_var_post_order_by[]',
				    'return' => true,
				    'required' => false,
				),
			    );
			    $mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);

			    $mashup_opt_array = array(
				'name' => mashup_var_frame_text_srt('mashup_var_album_post_order'),
				'desc' => '',
				'hint_text' => mashup_var_frame_text_srt('mashup_var_album_post_order_hint'),
				'echo' => true,
				'field_params' => array(
				    'std' => $mashup_album_order_by_dir,
				    'id' => '',
				    'cust_name' => 'mashup_album_order_by_dir[]',
				    'classes' => 'dropdown chosen-select',
				    'options' => array(
					'ASC' => mashup_var_frame_text_srt('mashup_var_album_asc'),
					'DESC' => mashup_var_frame_text_srt('mashup_var_album_desc'),
				    ),
				    'return' => true,
				),
			    );

			    $mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);
			    if (!is_numeric($mashup_album_posts_title_length)) {
				$mashup_album_posts_title_length = '';
			    }
			    $mashup_opt_array = array(
				'name' => mashup_var_frame_text_srt('mashup_var_element_post_title_length'),
				'desc' => '',
				'hint_text' => mashup_var_frame_text_srt('mashup_var_element_post_title_length_hint'),
				'echo' => true,
				'field_params' => array(
				    'std' => absint($mashup_album_posts_title_length),
				    'cust_id' => '',
				    'cust_name' => 'mashup_album_posts_title_length[]',
				    'return' => true,
				),
			    );
			    $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
			    ?>
			</div>
			<?php
			$mashup_opt_array = array(
			    'name' => mashup_var_frame_text_srt('mashup_var_post_per_page'),
			    'desc' => '',
			    'hint_text' => mashup_var_frame_text_srt('mashup_var_post_per_page_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => esc_attr($mashup_album_num_post),
				'cust_id' => '',
				'classes' => 'txtfield',
				'cust_name' => 'mashup_album_num_post[]',
				'return' => true,
			    ),
			);
			$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
			$mashup_opt_array = array(
			    'name' => mashup_var_frame_text_srt('mashup_var_album_pagination'),
			    'desc' => '',
			    'hint_text' => mashup_var_frame_text_srt('mashup_var_album_pagination_hint'),
			    'echo' => true,
			    'field_params' => array(
				'std' => $album_pagination,
				'id' => '',
				'cust_name' => 'album_pagination[]',
				'classes' => 'dropdown chosen-select',
				'options' => array(
				    'yes' => mashup_var_frame_text_srt('mashup_var_show_pagination'),
				    'no' => mashup_var_frame_text_srt('mashup_var_single_page'),
				),
				'return' => true,
			    ),
			);
			$mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);
			if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') {
			    ?>
	    		<ul class="form-elements insert-bg">
	    		    <li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:mashup_shortcode_insert_editor('<?php echo esc_js(str_replace('mashup_', '', $name)); ?>', '<?php echo esc_js($name . $mashup_counter) ?>', '<?php echo esc_js($filter_element); ?>')" ><?php echo esc_html(mashup_var_frame_text_srt('mashup_var_insert')); ?></a> </li>
	    		</ul>
	    		<div id="results-shortocde"></div>
			<?php } else { ?>
			    <?php
			    $mashup_opt_array = array(
				'std' => 'album',
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
				'id' => '',
				'std' => absint($mashup_rand_id),
				'cust_id' => "",
				'cust_name' => "mashup_album_id[]",
			    );
			    $mashup_var_form_fields->mashup_var_form_hidden_render($mashup_opt_array);
			    $mashup_opt_array = array(
				'name' => '',
				'desc' => '',
				'hint_text' => '',
				'echo' => true,
				'field_params' => array(
				    'std' => 'Save',
				    'cust_id' => '',
				    'cust_type' => 'button',
				    'classes' => 'cs-mashup-admin-btn',
				    'cust_name' => 'button',
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

    add_action('wp_ajax_mashup_var_page_builder_album', 'mashup_var_page_builder_album');
}
if (!function_exists('mashup_save_page_builder_data_album_callback')) {

    /**
     * Save data for album shortcode.
     *
     * @param	array $args
     * @return	array
     */
    function mashup_save_page_builder_data_album_callback($args) {
	$data = $args['data'];
	$counters = $args['counters'];
	$widget_type = $args['widget_type'];
	$column = $args['column'];
	if ($widget_type == "album") {
	    $mashup_var_album = '';
	    $album = $column->addChild('album');
	    $album->addChild('page_element_size', htmlspecialchars($data['album_element_size'][$counters['mashup_global_counter_album']]));
	    $album->addChild('album_element_size', htmlspecialchars($data['album_element_size'][$counters['mashup_global_counter_album']]));
	    if (isset($data['mashup_widget_element_num'][$counters['mashup_counter']]) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode') {
		$shortcode_str = stripslashes(htmlspecialchars(( $data['shortcode']['album'][$counters['mashup_shortcode_counter_album']]), ENT_QUOTES));
		$counters['mashup_shortcode_counter_album'] ++;
		$album->addChild('mashup_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
	    } else {
		$mashup_var_album = '[mashup_album ';
		if (isset($data['mashup_album_element_title'][$counters['mashup_counter_album']]) && $data['mashup_album_element_title'][$counters['mashup_counter_album']] != '') {
		    $mashup_var_album .= 'mashup_album_element_title="' . htmlspecialchars($data['mashup_album_element_title'][$counters['mashup_counter_album']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_albums_sub_title'][$counters['mashup_counter_album']]) && $data['mashup_var_albums_sub_title'][$counters['mashup_counter_album']] != '') {
		    $mashup_var_album .= 'mashup_var_albums_sub_title="' . htmlspecialchars($data['mashup_var_albums_sub_title'][$counters['mashup_counter_album']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_var_albums_align'][$counters['mashup_counter_album']]) && $data['mashup_var_albums_align'][$counters['mashup_counter_album']] != '') {
		    $mashup_var_album .= 'mashup_var_albums_align="' . htmlspecialchars($data['mashup_var_albums_align'][$counters['mashup_counter_album']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_album_posts_title_length'][$counters['mashup_counter_album']]) && $data['mashup_album_posts_title_length'][$counters['mashup_counter_album']] != '') {
		    $mashup_var_album .= 'mashup_album_posts_title_length="' . htmlspecialchars($data['mashup_album_posts_title_length'][$counters['mashup_counter_album']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_album_id'][$counters['mashup_counter_album']]) && $data['mashup_album_id'][$counters['mashup_counter_album']] != '') {
		    $mashup_album_id = $data['mashup_album_id'][$counters['mashup_counter_album']];

		    if (isset($_POST['mashup_album_cat'][$mashup_album_id]) && $_POST['mashup_album_cat'][$mashup_album_id] != '') {

			if (is_array($_POST['mashup_album_cat'][$mashup_album_id])) {

			    $mashup_var_album .= ' mashup_album_cat="' . implode(',', $_POST['mashup_album_cat'][$mashup_album_id]) . '" ';
			}
		    }
		}
		if (isset($data['mashup_var_post_order_by'][$counters['mashup_counter_album']]) && $data['mashup_var_post_order_by'][$counters['mashup_counter_album']] != '') {
		    $mashup_var_album .= 'mashup_album_order_by="' . htmlspecialchars($data['mashup_var_post_order_by'][$counters['mashup_counter_album']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_album_order_by_dir'][$counters['mashup_counter_album']]) && $data['mashup_album_order_by_dir'][$counters['mashup_counter_album']] != '') {
		    $mashup_var_album .= 'mashup_album_order_by_dir="' . htmlspecialchars($data['mashup_album_order_by_dir'][$counters['mashup_counter_album']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_album_num_post'][$counters['mashup_counter_album']]) && $data['mashup_album_num_post'][$counters['mashup_counter_album']] != '') {
		    $mashup_var_album .= 'mashup_album_num_post="' . htmlspecialchars($data['mashup_album_num_post'][$counters['mashup_counter_album']], ENT_QUOTES) . '" ';
		}
		if (isset($data['album_pagination'][$counters['mashup_counter_album']]) && $data['album_pagination'][$counters['mashup_counter_album']] != '') {
		    $mashup_var_album .= 'album_pagination="' . htmlspecialchars($data['album_pagination'][$counters['mashup_counter_album']], ENT_QUOTES) . '" ';
		}
		if (isset($data['mashup_album_size'][$counters['mashup_counter_album']]) && $data['mashup_album_size'][$counters['mashup_counter_album']] != '') {
		    $mashup_var_album .= 'mashup_album_size="' . htmlspecialchars($data['mashup_album_size'][$counters['mashup_counter_album']], ENT_QUOTES) . '" ';
		}
		$mashup_var_album .= ']';
		$mashup_var_album .= '[/mashup_album]';

		$album->addChild('mashup_shortcode', $mashup_var_album);
		$counters['mashup_counter_album'] ++;
	    }
	    $counters['mashup_global_counter_album'] ++;
	}
	return array(
	    'data' => $data,
	    'counters' => $counters,
	    'widget_type' => $widget_type,
	    'column' => $column,
	);
    }

    add_filter('mashup_save_page_builder_data', 'mashup_save_page_builder_data_album_callback');
}
if (!function_exists('mashup_load_shortcode_counters_album_callback')) {

    /**
     * Populate album shortcode counter variables.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_load_shortcode_counters_album_callback($counters) {
	$counters['mashup_global_counter_album'] = 0;
	$counters['mashup_shortcode_counter_album'] = 0;
	$counters['mashup_counter_album'] = 0;
	return $counters;
    }

    add_filter('mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_album_callback');
}
if (!function_exists('mashup_shortcode_names_list_populate_album_callback')) {

    /**
     * Populate album shortcode names list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_shortcode_names_list_populate_album_callback($shortcode_array) {
	$shortcode_array['album'] = array(
	    'title' => mashup_var_frame_text_srt('mashup_var_albums'),
	    'name' => 'album',
	    'icon' => 'icon-music2',
	    'categories' => 'loops',
	);
	return $shortcode_array;
    }

    add_filter('mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_album_callback');
}
if (!function_exists('mashup_element_list_populate_album_callback')) {

    /**
     * Populate album shortcode strings list.
     *
     * @param	array $counters
     * @return	array
     */
    function mashup_element_list_populate_album_callback($element_list) {
	$element_list['album'] = mashup_var_frame_text_srt('mashup_var_albums');
	return $element_list;
    }

    add_filter('mashup_element_list_populate', 'mashup_element_list_populate_album_callback');
}