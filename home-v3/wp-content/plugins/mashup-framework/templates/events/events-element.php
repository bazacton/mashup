<?php
/*
 * Albums Element
 */

if ( ! function_exists( 'mashup_var_page_builder_event' ) ) {

	function mashup_var_page_builder_event( $die = 0 ) {
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
		if ( isset( $_POST['action'] ) && ! isset( $_POST['shortcode_element_id'] ) ) {
			$POSTID = '';
			$shortcode_element_id = '';
		} else {
			$POSTID = $_POST['POSTID'];
			$shortcode_element_id = $_POST['shortcode_element_id'];
			$shortcode_str = stripslashes( $shortcode_element_id );
			$PREFIX = 'mashup_event';
			$parseObject = new ShortcodeParse();
			$output = $parseObject->mashup_shortcodes( $output, $shortcode_str, true, $PREFIX );
		}
		$defaults = array(
			'mashup_event_element_title' => '',
			'mashup_event_cat' => '',
			'mashup_events_listing_type' => 'ID',
			'mashup_events_view' => 'events-list',
			'mashup_event_order_by' => 'ID',
			'mashup_event_order' => 'DESC',
			'mashup_event_event_title_length' => '10',
			'mashup_event_num_post' => '10',
			'event_pagination' => '',
			'mashup_var_events_sub_title' => '',
			'mashup_var_events_align' => '',
		);
		if ( isset( $output['0']['atts'] ) ) {
			$atts = $output['0']['atts'];
		} else {
			$atts = array();
		}
		$event_element_size = '100';
		foreach ( $defaults as $key => $values ) {
			if ( isset( $atts[$key] ) ) {
				$$key = $atts[$key];
			} else {
				$$key = $values;
			}
		}
		$name = 'event';
		$coloumn_class = 'column_' . $event_element_size;
		if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
			$shortcode_element = 'shortcode_element_class';
			$shortcode_view = 'cs-pbwp-shortcode';
			$filter_element = 'ajax-drag';
			$coloumn_class = '';
		}
		$mashup_rand_id = rand( 13441324, 93441324 );
		?>
		<div id="<?php echo esc_attr( $name . $mashup_counter ); ?>_del" class="column  parentdelete <?php echo esc_attr( $coloumn_class ); ?> <?php echo esc_attr( $shortcode_view ); ?>" item="event" data="<?php echo mashup_element_size_data_array_index( $event_element_size ) ?>">
			<?php mashup_element_setting( $name, $mashup_counter, $event_element_size ); ?>
			<div class="cs-wrapp-class-<?php echo intval( $mashup_counter ) ?> <?php echo esc_attr( $shortcode_element ); ?>" id="<?php echo esc_attr( $name . $mashup_counter ) ?>" data-shortcode-template="[mashup_event {{attributes}}]"  style="display: none;">
				<div class="cs-heading-area">
					<h5><?php echo esc_html( mashup_var_frame_text_srt( 'mashup_ele_edit_events_settings' ) ); ?></h5>
					<a href="javascript:mashup_frame_removeoverlay('<?php echo esc_js( $name . $mashup_counter ); ?>','<?php echo esc_js( $filter_element ); ?>')" class="cs-btnclose"><i class="icon-cancel"></i></a>
				</div>
				<div class="cs-pbwp-content">
					<div class="cs-wrapp-clone cs-shortcode-wrapp">
						<?php
						if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
							mashup_shortcode_element_size();
						}
				$mashup_opt_array = array(
							'name' => mashup_var_frame_text_srt( 'mashup_var_title' ),
							'desc' => '',
							'hint_text' => mashup_var_frame_text_srt( 'mashup_var_title_hint' ),
							'echo' => true,
							'field_params' => array(
								'std' => esc_attr( $mashup_event_element_title ),
								'cust_id' => '',
								'cust_name' => 'mashup_event_element_title[]',
								'return' => true,
							),
						);
						$mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
						$mashup_opt_array = array(
								'name' => mashup_var_frame_text_srt( 'mashup_var_element_sub_title' ),
								'desc' => '',
								'hint_text' => mashup_var_frame_text_srt( 'mashup_var_element_sub_title_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => mashup_allow_special_char( $mashup_var_events_sub_title ),
									'id' => 'mashup_var_events_sub_title',
									'cust_name' => 'mashup_var_events_sub_title[]',
									'classes' => '',
									'return' => true,
								),
							);
							$mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
							$mashup_opt_array = array(
								'name' => mashup_var_frame_text_srt( 'mashup_var_align' ),
								'desc' => '',
								'hint_text' => mashup_var_frame_text_srt( 'mashup_var_align_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => $mashup_var_events_align,
									'id' => '',
									'cust_id' => '',
									'cust_name' => 'mashup_var_events_align[]',
									'classes' => 'dropdown chosen-select',
									'options' => array(
										'left' => mashup_var_frame_text_srt( 'mashup_var_heading_sc_left' ),
										'right' => mashup_var_frame_text_srt( 'mashup_var_heading_sc_right' ),
										'center' => mashup_var_frame_text_srt( 'mashup_var_heading_sc_center' ),
									),
									'return' => true,
								),
							);
							$mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
						$a_options = array();
						$mashup_event_cat = isset( $mashup_event_cat ) ? $mashup_event_cat : '';
						if ( '' != $mashup_event_cat ) {
							$mashup_event_cat = explode( ',', $mashup_event_cat );
						}
						$a_options = mashup_show_all_cats( '', '', $mashup_event_cat, "event-category", true );
						$mashup_opt_array = array(
							'name' => mashup_var_frame_text_srt( 'mashup_var_event_choose_category' ),
							'desc' => '',
							'hint_text' => mashup_var_frame_text_srt( 'mashup_var_event_choose_category_hint' ),
							'echo' => true,
							'multi' => true,
							'field_params' => array(
								'std' => $mashup_event_cat,
								'id' => '',
								'cust_name' => 'mashup_event_cat[' . $mashup_rand_id . '][]',
								'classes' => 'dropdown chosen-select',
								'options' => $a_options,
								'return' => true,
							),
						);
						$mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
						$options = array(
							'all-events' => mashup_var_frame_text_srt( 'mashup_var_event_all_events' ),
							'upcoming-events' => mashup_var_frame_text_srt( 'mashup_var_event_upcoming_events' ),
							'past-events' => mashup_var_frame_text_srt( 'mashup_var_event_past_events' ),
						);
						$mashup_opt_array = array(
							'name' => mashup_var_frame_text_srt( 'mashup_var_event_listing_types' ),
							'desc' => '',
							'hint_text' => mashup_var_frame_text_srt( 'mashup_var_event_listing_types_hint' ),
							'echo' => true,
							'field_params' => array(
								'options' => $options,
								'std' => esc_attr( $mashup_events_listing_type ),
								'id' => '',
								'classes' => 'dropdown chosen-select',
								'cust_id' => '',
								'cust_name' => 'mashup_events_listing_type[]',
								'return' => true,
								'required' => false,
							),
						);
						$mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
						$options = array(
							'events-list' => mashup_var_frame_text_srt( 'mashup_var_events_list_view' ),
							'events-slideshow' => mashup_var_frame_text_srt( 'mashup_var_events_slideshow_view' ),
						);
						$mashup_opt_array = array(
							'name' => mashup_var_frame_text_srt( 'mashup_var_events_views' ),
							'desc' => '',
							'hint_text' => mashup_var_frame_text_srt( 'mashup_var_events_views_hint' ),
							'echo' => true,
							'field_params' => array(
								'options' => $options,
								'std' => esc_attr( $mashup_events_view ),
								'id' => '',
								'classes' => 'dropdown chosen-select',
								'cust_id' => '',
								'cust_name' => 'mashup_events_view[]',
								'return' => true,
								'required' => false,
							),
						);
						$mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
						$options = array(
							'id' => mashup_var_frame_text_srt( 'mashup_var_events_order_by_id' ),
							'date' => mashup_var_frame_text_srt( 'mashup_var_events_order_by_date' ),
							'date_time' => mashup_var_frame_text_srt( 'mashup_var_events_order_by_event_strat_date' ),
							'title' => mashup_var_frame_text_srt( 'mashup_var_events_order_by_title' ),
						);
						$options = apply_filters( 'posts_order_by_options', $options );
						$mashup_opt_array = array(
							'name' => mashup_var_frame_text_srt( 'mashup_var_event_views_order_by' ),
							'desc' => '',
							'hint_text' => mashup_var_frame_text_srt( 'mashup_var_event_post_order_by_hint' ),
							'echo' => true,
							'field_params' => array(
								'options' => $options,
								'std' => esc_attr( $mashup_event_order_by ),
								'id' => '',
								'classes' => 'dropdown chosen-select',
								'cust_id' => '',
								'cust_name' => 'mashup_event_order_by[]',
								'return' => true,
								'required' => false,
							),
						);
						$mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
						$mashup_opt_array = array(
							'name' => mashup_var_frame_text_srt( 'mashup_var_event_post_order' ),
							'desc' => '',
							'hint_text' => mashup_var_frame_text_srt( 'mashup_var_event_post_order_hint' ),
							'echo' => true,
							'field_params' => array(
								'std' => $mashup_event_order,
								'id' => '',
								'cust_name' => 'mashup_event_order[]',
								'classes' => 'dropdown chosen-select',
								'options' => array(
									'ASC' => mashup_var_frame_text_srt( 'mashup_var_event_asc' ),
									'DESC' => mashup_var_frame_text_srt( 'mashup_var_event_desc' ),
								),
								'return' => true,
							),
						);
						$mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
						if ( ! is_numeric( $mashup_event_posts_title_length ) ) {
							$mashup_event_posts_title_length = '';
						}
						$mashup_opt_array = array(
							'name' => mashup_var_frame_text_srt( 'mashup_var_element_event_title_length' ),
							'desc' => '',
							'hint_text' => mashup_var_frame_text_srt( 'mashup_var_element_event_title_length_hint' ),
							'echo' => true,
							'field_params' => array(
								'std' => absint( $mashup_event_event_title_length ),
								'cust_id' => '',
								'cust_name' => 'mashup_event_event_title_length[]',
								'return' => true,
							),
						);
						$mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
						$mashup_opt_array = array(
							'name' => mashup_var_frame_text_srt( 'mashup_var_post_per_page' ),
							'desc' => '',
							'hint_text' => mashup_var_frame_text_srt( 'mashup_var_post_per_page_hint' ),
							'echo' => true,
							'field_params' => array(
								'std' => esc_attr( $mashup_event_num_post ),
								'cust_id' => '',
								'classes' => 'txtfield',
								'cust_name' => 'mashup_event_num_post[]',
								'return' => true,
							),
						);
						$mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
						$mashup_opt_array = array(
							'name' => mashup_var_frame_text_srt( 'mashup_var_event_pagination' ),
							'desc' => '',
							'hint_text' => mashup_var_frame_text_srt( 'mashup_var_event_pagination_hint' ),
							'echo' => true,
							'field_params' => array(
								'std' => $event_pagination,
								'id' => '',
								'cust_name' => 'event_pagination[]',
								'classes' => 'dropdown chosen-select',
								'options' => array(
									'yes' => mashup_var_frame_text_srt( 'mashup_var_show_pagination' ),
									'load_more' => mashup_var_frame_text_srt( 'mashup_var_load_more' ),
									'no' => mashup_var_frame_text_srt( 'mashup_var_single_page' ),
									
								),
								'return' => true,
							),
						);
						$mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
						if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
							?>
							<ul class="form-elements insert-bg">
								<li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:mashup_shortcode_insert_editor('<?php echo esc_js( str_replace( 'mashup_', '', $name ) ); ?>', '<?php echo esc_js( $name . $mashup_counter ) ?>', '<?php echo esc_js( $filter_element ); ?>')" ><?php echo esc_html( mashup_var_frame_text_srt( 'mashup_var_insert' ) ); ?></a> </li>
							</ul>
							<div id="results-shortocde"></div>
						<?php } else { ?>
							<?php
							$mashup_opt_array = array(
								'std' => 'event',
								'id' => '',
								'before' => '',
								'after' => '',
								'classes' => '',
								'extra_atr' => '',
								'cust_id' => 'mashup_orderby' . $mashup_counter,
								'cust_name' => 'mashup_orderby[]',
								'required' => false
							);
							$mashup_var_form_fields->mashup_var_form_hidden_render( $mashup_opt_array );
							$mashup_opt_array = array(
								'id' => '',
								'std' => absint( $mashup_rand_id ),
								'cust_id' => "",
								'cust_name' => "mashup_event_id[]",
							);
							$mashup_var_form_fields->mashup_var_form_hidden_render( $mashup_opt_array );
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
							$mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
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
	add_action( 'wp_ajax_mashup_var_page_builder_event', 'mashup_var_page_builder_event' );
}
if ( ! function_exists( 'mashup_save_page_builder_data_event_callback' ) ) {

	/**
	 * Save data for event shortcode.
	 *
	 * @param	array $args
	 * @return	array
	 */
	function mashup_save_page_builder_data_event_callback( $args ) {
		$data = $args['data'];
		$counters = $args['counters'];
		$widget_type = $args['widget_type'];
		$column = $args['column'];
		if ( $widget_type == "event" ) {
			$mashup_var_event = '';
			$event = $column->addChild( 'event' );
			$event->addChild( 'page_element_size', htmlspecialchars( $data['event_element_size'][$counters['mashup_global_counter_event']] ) );
			$event->addChild( 'event_element_size', htmlspecialchars( $data['event_element_size'][$counters['mashup_global_counter_event']] ) );
			if ( isset( $data['mashup_widget_element_num'][$counters['mashup_counter']] ) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode' ) {
				$shortcode_str = stripslashes( htmlspecialchars( ( $data['shortcode']['event'][$counters['mashup_shortcode_counter_event']] ), ENT_QUOTES ) );
				$counters['mashup_shortcode_counter_event'] ++;
				$event->addChild( 'mashup_shortcode', htmlspecialchars( $shortcode_str, ENT_QUOTES ) );
			} else {
				$mashup_var_event = '[mashup_event ';
				if ( isset( $data['mashup_event_element_title'][$counters['mashup_counter_event']] ) && $data['mashup_event_element_title'][$counters['mashup_counter_event']] != '' ) {
					$mashup_var_event .= 'mashup_event_element_title="' . htmlspecialchars( $data['mashup_event_element_title'][$counters['mashup_counter_event']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_var_events_sub_title'][$counters['mashup_counter_event']] ) && $data['mashup_var_events_sub_title'][$counters['mashup_counter_event']] != '' ) {
					$mashup_var_event .= 'mashup_var_events_sub_title="' . htmlspecialchars( $data['mashup_var_events_sub_title'][$counters['mashup_counter_event']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_var_events_align'][$counters['mashup_counter_event']] ) && $data['mashup_var_events_align'][$counters['mashup_counter_event']] != '' ) {
					$mashup_var_event .= 'mashup_var_events_align="' . htmlspecialchars( $data['mashup_var_events_align'][$counters['mashup_counter_event']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_event_id'][$counters['mashup_counter_event']] ) && $data['mashup_event_id'][$counters['mashup_counter_event']] != '' ) {
					$mashup_event_id = $data['mashup_event_id'][$counters['mashup_counter_event']];

					if ( isset( $_POST['mashup_event_cat'][$mashup_event_id] ) && $_POST['mashup_event_cat'][$mashup_event_id] != '' ) {

						if ( is_array( $_POST['mashup_event_cat'][$mashup_event_id] ) ) {

							$mashup_var_event .= ' mashup_event_cat="' . implode( ',', $_POST['mashup_event_cat'][$mashup_event_id] ) . '" ';
						}
					}
				}
			if ( isset( $data['mashup_events_listing_type'][$counters['mashup_counter_event']] ) && $data['mashup_events_listing_type'][$counters['mashup_counter_event']] != '' ) {
					$mashup_var_event .= 'mashup_events_listing_type="' . htmlspecialchars( $data['mashup_events_listing_type'][$counters['mashup_counter_event']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_events_view'][$counters['mashup_counter_event']] ) && $data['mashup_events_view'][$counters['mashup_counter_event']] != '' ) {
					$mashup_var_event .= 'mashup_events_view="' . htmlspecialchars( $data['mashup_events_view'][$counters['mashup_counter_event']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_event_order_by'][$counters['mashup_counter_event']] ) && $data['mashup_event_order_by'][$counters['mashup_counter_event']] != '' ) {
					$mashup_var_event .= 'mashup_event_order_by="' . htmlspecialchars( $data['mashup_event_order_by'][$counters['mashup_counter_event']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_event_order'][$counters['mashup_counter_event']] ) && $data['mashup_event_order'][$counters['mashup_counter_event']] != '' ) {
					$mashup_var_event .= 'mashup_event_order="' . htmlspecialchars( $data['mashup_event_order'][$counters['mashup_counter_event']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_event_event_title_length'][$counters['mashup_counter_event']] ) && $data['mashup_event_event_title_length'][$counters['mashup_counter_event']] != '' ) {
					$mashup_var_event .= 'mashup_event_event_title_length="' . htmlspecialchars( $data['mashup_event_event_title_length'][$counters['mashup_counter_event']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_event_num_post'][$counters['mashup_counter_event']] ) && $data['mashup_event_num_post'][$counters['mashup_counter_event']] != '' ) {
					$mashup_var_event .= 'mashup_event_num_post="' . htmlspecialchars( $data['mashup_event_num_post'][$counters['mashup_counter_event']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['event_pagination'][$counters['mashup_counter_event']] ) && $data['event_pagination'][$counters['mashup_counter_event']] != '' ) {
					$mashup_var_event .= 'event_pagination="' . htmlspecialchars( $data['event_pagination'][$counters['mashup_counter_event']], ENT_QUOTES ) . '" ';
				}
				$mashup_var_event .= ']';
				$mashup_var_event .= '[/mashup_event]';
				$event->addChild( 'mashup_shortcode', $mashup_var_event );
				$counters['mashup_counter_event'] ++;
			}
			$counters['mashup_global_counter_event'] ++;
		}
		return array(
			'data' => $data,
			'counters' => $counters,
			'widget_type' => $widget_type,
			'column' => $column,
		);
	}

	add_filter( 'mashup_save_page_builder_data', 'mashup_save_page_builder_data_event_callback' );
}
if ( ! function_exists( 'mashup_load_shortcode_counters_event_callback' ) ) {

	/**
	 * Populate event shortcode counter variables.
	 *
	 * @param	array $counters
	 * @return	array
	 */
	function mashup_load_shortcode_counters_event_callback( $counters ) {
		$counters['mashup_global_counter_event'] = 0;
		$counters['mashup_shortcode_counter_event'] = 0;
		$counters['mashup_counter_event'] = 0;
		return $counters;
	}

	add_filter( 'mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_event_callback' );
}
if ( ! function_exists( 'mashup_shortcode_names_list_populate_event_callback' ) ) {

	/**
	 * Populate event shortcode names list.
	 *
	 * @param	array $counters
	 * @return	array
	 */
	function mashup_shortcode_names_list_populate_event_callback( $shortcode_array ) {
		$shortcode_array['event'] = array(
			'title' => mashup_var_frame_text_srt( 'mashup_var_events' ),
			'name' => 'event',
			'icon' => 'icon-briefcase',
			'categories' => 'loops',
		);
		return $shortcode_array;
	}

	add_filter( 'mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_event_callback' );
}
if ( ! function_exists( 'mashup_element_list_populate_event_callback' ) ) {

	/**
	 * Populate event shortcode strings list.
	 *
	 * @param	array $counters
	 * @return	array
	 */
	function mashup_element_list_populate_event_callback( $element_list ) {
		$element_list['event'] = mashup_var_frame_text_srt( 'mashup_var_events' );
		return $element_list;
	}

	add_filter( 'mashup_element_list_populate', 'mashup_element_list_populate_event_callback' );
}