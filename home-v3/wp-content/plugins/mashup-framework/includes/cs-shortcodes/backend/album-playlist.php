<?php
/*
 * Albums Element
 */

if ( ! function_exists('mashup_var_page_builder_album_playlist') ) {

	function mashup_var_page_builder_album_playlist($die = 0) {
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
		if ( isset($_POST['action']) && ! isset($_POST['shortcode_element_id']) ) {
			$POSTID = '';
			$shortcode_element_id = '';
		} else {
			$POSTID = $_POST['POSTID'];
			$shortcode_element_id = $_POST['shortcode_element_id'];
			$shortcode_str = stripslashes($shortcode_element_id);
			$PREFIX = 'mashup_album_playlist';
			$parseObject = new ShortcodeParse();
			$output = $parseObject->mashup_shortcodes($output, $shortcode_str, true, $PREFIX);
		}
		$defaults = array(
			'mashup_album_playlist_select_to_play' => '',
			'mashup_album_playlist_num_tracks' => '',
			'mashup_album_playlist_bg' => '',
			'mashup_album_playlist_bg_opacity' => '',
		);
		if ( isset($output['0']['atts']) ) {
			$atts = $output['0']['atts'];
		} else {
			$atts = array();
		}
		$album_playlist_element_size = '100';
		foreach ( $defaults as $key => $values ) {
			if ( isset($atts[$key]) ) {
				$$key = $atts[$key];
			} else {
				$$key = $values;
			}
		}
		$name = 'album_playlist';
		$coloumn_class = 'column_' . $album_playlist_element_size;
		if ( isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode' ) {
			$shortcode_element = 'shortcode_element_class';
			$shortcode_view = 'cs-pbwp-shortcode';
			$filter_element = 'ajax-drag';
			$coloumn_class = '';
		}
		$mashup_rand_id = rand(13441324, 93441324);
		?>
		<div id="<?php echo esc_attr($name . $mashup_counter); ?>_del" class="column  parentdelete <?php echo esc_attr($coloumn_class); ?> <?php echo esc_attr($shortcode_view); ?>" item="album_playlist" data="<?php echo mashup_element_size_data_array_index($album_playlist_element_size) ?>">
			<?php mashup_element_setting($name, $mashup_counter, $album_playlist_element_size); ?>
			<div class="cs-wrapp-class-<?php echo intval($mashup_counter) ?> <?php echo esc_attr($shortcode_element); ?>" id="<?php echo esc_attr($name . $mashup_counter) ?>" data-shortcode-template="[mashup_album_playlist {{attributes}}]"  style="display: none;">
				<div class="cs-heading-area">
					<h5><?php echo esc_html(mashup_var_frame_text_srt('mashup_ele_edit_album_playlist_settings')); ?></h5>
					<a href="javascript:mashup_frame_removeoverlay('<?php echo esc_js($name . $mashup_counter); ?>','<?php echo esc_js($filter_element); ?>')" class="cs-btnclose"><i class="icon-cancel"></i></a>
				</div>
				<div class="cs-pbwp-content">
					<div class="cs-wrapp-clone cs-shortcode-wrapp">
						<?php
						$alb_data = array();
						$alb_args = array( 'posts_per_page' => '-1', 'post_type' => 'albums', 'orderby' => 'ID', 'post_status' => 'publish', 'order' => 'DESC' );
						$cust_query = get_posts($alb_args);
						foreach ( $cust_query as $alb_gal ) {
							$alb_data[$alb_gal->ID] = get_the_title($alb_gal->ID);
						}
						if ( isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode' ) {
							mashup_shortcode_element_size();
						}

						$mashup_opt_array = array(
							'name' => mashup_var_frame_text_srt('mashup_var_album_playlist_select'),
							'desc' => '',
							'hint_text' => mashup_var_frame_text_srt('mashup_var_album_playlist_select_hint'),
							'echo' => true,
							'field_params' => array(
								'std' => $mashup_album_playlist_select_to_play,
								'id' => '',
								'cust_id' => '',
								'cust_name' => 'mashup_album_playlist_select_to_play[]',
								'classes' => 'dropdown chosen-select',
								'options' => $alb_data,
								'return' => true,
							),
						);

						$mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);

						$mashup_opt_array = array(
							'name' => mashup_var_frame_text_srt('mashup_var_album_playlist_num_tracks'),
							'desc' => '',
							'hint_text' => mashup_var_frame_text_srt('mashup_var_album_playlist_num_tracks_hint'),
							'echo' => true,
							'field_params' => array(
								'std' => absint($mashup_album_playlist_num_tracks),
								'cust_id' => '',
								'cust_name' => 'mashup_album_playlist_num_tracks[]',
								'return' => true,
							),
						);

						$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
						
						$mashup_opt_array = array(
							'name' => mashup_var_frame_text_srt('mashup_var_album_playlist_bg'),
							'desc' => '',
							'hint_text' => mashup_var_frame_text_srt('mashup_var_album_playlist_bg_hint'),
							'echo' => true,
							'field_params' => array(
								'std' => esc_attr($mashup_album_playlist_bg),
								'cust_id' => 'mashup_album_playlist_bg' . $mashup_rand_id,
								'classes' => 'bg_color',
								'cust_name' => 'mashup_album_playlist_bg[]',
								'return' => true,
							),
						);
						$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
						
						$mashup_opt_array = array(
							'name' => mashup_var_frame_text_srt('mashup_var_album_playlist_bg_opacity'),
							'desc' => '',
							'hint_text' => mashup_var_frame_text_srt('mashup_var_album_playlist_bg_opacity_hint'),
							'echo' => true,
							'field_params' => array(
								'std' => esc_attr($mashup_album_playlist_bg_opacity),
								'cust_id' => 'mashup_album_playlist_bg_opacity_' . $mashup_rand_id,
								'classes' => '',
								'cust_name' => 'mashup_album_playlist_bg_opacity[]',
								'return' => true,
							),
						);
						$mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);

						if ( isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode' ) {
							?>
							<ul class="form-elements insert-bg">
								<li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:mashup_shortcode_insert_editor('<?php echo esc_js(str_replace('mashup_', '', $name)); ?>', '<?php echo esc_js($name . $mashup_counter) ?>', '<?php echo esc_js($filter_element); ?>')" ><?php echo esc_html(mashup_var_frame_text_srt('mashup_var_insert')); ?></a> </li>
							</ul>
							<div id="results-shortocde"></div>
						<?php } else { ?>
							<?php
							$mashup_opt_array = array(
								'std' => 'album_playlist',
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
								'cust_name' => "mashup_album_playlist_id[]",
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
		if ( $die <> 1 ) {
			die();
		}
	}

	add_action('wp_ajax_mashup_var_page_builder_album_playlist', 'mashup_var_page_builder_album_playlist');
}
if ( ! function_exists('mashup_save_page_builder_data_album_playlist_callback') ) {

	/**
	 * Save data for album_playlist shortcode.
	 *
	 * @param	array $args
	 * @return	array
	 */
	function mashup_save_page_builder_data_album_playlist_callback($args) {

		$data = $args['data'];
		$counters = $args['counters'];
		$widget_type = $args['widget_type'];
		$column = $args['column'];
		if ( $widget_type == "album_playlist" ) {
			$mashup_var_album_playlist = '';
			$album_playlist = $column->addChild('album_playlist');
			$album_playlist->addChild('page_element_size', htmlspecialchars($data['album_playlist_element_size'][$counters['mashup_global_counter_album_playlist']]));
			$album_playlist->addChild('album_playlist_element_size', htmlspecialchars($data['album_playlist_element_size'][$counters['mashup_global_counter_album_playlist']]));
			if ( isset($data['mashup_widget_element_num'][$counters['mashup_counter']]) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode' ) {
				$shortcode_str = stripslashes(htmlspecialchars(( $data['shortcode']['album_playlist'][$counters['mashup_shortcode_counter_album_playlist']]), ENT_QUOTES));
				$counters['mashup_shortcode_counter_album_playlist'] ++;
				$album_playlist->addChild('mashup_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
			} else {
				$mashup_var_album_playlist = '[mashup_album_playlist ';
				if ( isset($data['mashup_album_playlist_select_to_play'][$counters['mashup_counter_album_playlist']]) && $data['mashup_album_playlist_select_to_play'][$counters['mashup_counter_album_playlist']] != '' ) {
					$mashup_var_album_playlist .= 'mashup_album_playlist_select_to_play="' . htmlspecialchars($data['mashup_album_playlist_select_to_play'][$counters['mashup_counter_album_playlist']], ENT_QUOTES) . '" ';
				}
				if ( isset($data['mashup_album_playlist_num_tracks'][$counters['mashup_counter_album_playlist']]) && $data['mashup_album_playlist_num_tracks'][$counters['mashup_counter_album_playlist']] != '' ) {
					$mashup_var_album_playlist .= 'mashup_album_playlist_num_tracks="' . htmlspecialchars($data['mashup_album_playlist_num_tracks'][$counters['mashup_counter_album_playlist']], ENT_QUOTES) . '" ';
				}
				if ( isset($data['mashup_album_playlist_bg'][$counters['mashup_counter_album_playlist']]) && $data['mashup_album_playlist_bg'][$counters['mashup_counter_album_playlist']] != '' ) {
					$mashup_var_album_playlist .= 'mashup_album_playlist_bg="' . htmlspecialchars($data['mashup_album_playlist_bg'][$counters['mashup_counter_album_playlist']], ENT_QUOTES) . '" ';
				}
				if ( isset($data['mashup_album_playlist_bg_opacity'][$counters['mashup_counter_album_playlist']]) && $data['mashup_album_playlist_bg_opacity'][$counters['mashup_counter_album_playlist']] != '' ) {
					$mashup_var_album_playlist .= 'mashup_album_playlist_bg_opacity="' . htmlspecialchars($data['mashup_album_playlist_bg_opacity'][$counters['mashup_counter_album_playlist']], ENT_QUOTES) . '" ';
				}
				$mashup_var_album_playlist .= ']';
				$mashup_var_album_playlist .= '[/mashup_album_playlist]';

				$album_playlist->addChild('mashup_shortcode', $mashup_var_album_playlist);
				$counters['mashup_counter_album_playlist'] ++;
			}
			$counters['mashup_global_counter_album_playlist'] ++;
		}
		return array(
			'data' => $data,
			'counters' => $counters,
			'widget_type' => $widget_type,
			'column' => $column,
		);
	}

	add_filter('mashup_save_page_builder_data', 'mashup_save_page_builder_data_album_playlist_callback');
}
if ( ! function_exists('mashup_load_shortcode_counters_album_playlist_callback') ) {

	/**
	 * Populate album_playlist shortcode counter variables.
	 *
	 * @param	array $counters
	 * @return	array
	 */
	function mashup_load_shortcode_counters_album_playlist_callback($counters) {
		$counters['mashup_global_counter_album_playlist'] = 0;
		$counters['mashup_shortcode_counter_album_playlist'] = 0;
		$counters['mashup_counter_album_playlist'] = 0;
		return $counters;
	}

	add_filter('mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_album_playlist_callback');
}
if ( ! function_exists('mashup_shortcode_names_list_populate_album_playlist_callback') ) {

	/**
	 * Populate album_playlist shortcode names list.
	 *
	 * @param	array $counters
	 * @return	array
	 */
	function mashup_shortcode_names_list_populate_album_playlist_callback($shortcode_array) {
		$shortcode_array['album_playlist'] = array(
			'title' => mashup_var_frame_text_srt('mashup_var_album_playlist'),
			'name' => 'album_playlist',
			'icon' => 'icon-music2',
			'categories' => 'loops',
		);
		return $shortcode_array;
	}

	add_filter('mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_album_playlist_callback');
}
if ( ! function_exists('mashup_element_list_populate_album_playlist_callback') ) {

	/**
	 * Populate album_playlist shortcode strings list.
	 *
	 * @param	array $counters
	 * @return	array
	 */
	function mashup_element_list_populate_album_playlist_callback($element_list) {
		$element_list['album_playlist'] = mashup_var_frame_text_srt('mashup_var_album_playlist');
		return $element_list;
	}

	add_filter('mashup_element_list_populate', 'mashup_element_list_populate_album_playlist_callback');
}