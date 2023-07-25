<?php
/**
 * Shortcode Name : maintenance
 *
 * @package	mashup 
 */
if ( !function_exists( 'mashup_var_page_builder_maintenance' ) ) {

	function mashup_var_page_builder_maintenance( $die = 0 ) {
		global $post, $mashup_node, $mashup_var_html_fields, $mashup_var_form_fields, $mashup_var_frame_static_text;
		if ( function_exists( 'mashup_shortcode_names' ) ) {
			$shortcode_element = '';
			$filter_element = 'filterdrag';
			$shortcode_view = '';
			$mashup_output = array();
			$mashup_PREFIX = 'mashup_maintenance';

			$mashup_counter = isset( $_POST['counter'] ) ? $_POST['counter'] : '';
			if ( isset( $_POST['action'] ) && !isset( $_POST['shortcode_element_id'] ) ) {
				$mashup_POSTID = '';
				$shortcode_element_id = '';
			} else {
				$mashup_POSTID = isset( $_POST['POSTID'] ) ? $_POST['POSTID'] : '';
				$shortcode_element_id = isset( $_POST['shortcode_element_id'] ) ? $_POST['shortcode_element_id'] : '';
				$shortcode_str = stripslashes( $shortcode_element_id );
				$parseObject = new ShortcodeParse();
				$mashup_output = $parseObject->mashup_shortcodes( $mashup_output, $shortcode_str, true, $mashup_PREFIX );
			}
			$defaults = array(
				'mashup_var_column' => '1',
				'mashup_var_maintenance_logo_url_array' => '',
				'mashup_var_maintenance_image_url_array' => '',
				'mashup_page_view' => '',
				'mashup_var_lunch_date' => '',
				'mashup_var_maintenance_estimated_time' => '',
				'mashup_var_maintenance_time_left' => '',
				'maintenance_heading_text' => '',
			);
			if ( isset( $mashup_output['0']['atts'] ) ) {
				$atts = $mashup_output['0']['atts'];
			} else {
				$atts = array();
			}
			if ( isset( $mashup_output['0']['content'] ) ) {
				$maintenance_column_text = $mashup_output['0']['content'];
			} else {
				$maintenance_column_text = '';
			}
			$maintenance_element_size = '25';
			foreach ( $defaults as $key => $values ) {
				if ( isset( $atts[$key] ) ) {
					$$key = $atts[$key];
				} else {
					$$key = $values;
				}
			}
			$name = 'mashup_var_page_builder_maintenance';
			$coloumn_class = 'column_' . $maintenance_element_size;
			if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
				$shortcode_element = 'shortcode_element_class';
				$shortcode_view = 'cs-pbwp-shortcode';
				$filter_element = 'ajax-drag';
				$coloumn_class = '';
			}
			wp_enqueue_script( 'mashup-framwork-colorpicker' );
			?>

			<div id="<?php echo esc_attr( $name . $mashup_counter ) ?>_del" class="column  parentdelete <?php echo esc_attr( $coloumn_class ); ?>
				 <?php echo esc_attr( $shortcode_view ); ?>" item="maintenance" data="<?php echo mashup_element_size_data_array_index( $maintenance_element_size ) ?>" >
				 <?php mashup_element_setting( $name, $mashup_counter, $maintenance_element_size ) ?>
				<div class="cs-wrapp-class-<?php echo intval( $mashup_counter ) ?>
					 <?php echo esc_attr( $shortcode_element ); ?>" id="<?php echo esc_attr( $name . $mashup_counter ) ?>" data-shortcode-template="[mashup_maintenance {{attributes}}]{{content}}[/mashup_maintenance]" style="display: none;">
					<div class="cs-heading-area" data-counter="<?php echo esc_attr( $mashup_counter ) ?>">
						<h5><?php echo mashup_var_frame_text_srt( 'mashup_var_edit_maintenance_page' ) ?></h5>
						<a href="javascript:mashup_frame_removeoverlay('<?php echo esc_js( $name . $mashup_counter ) ?>','<?php echo esc_js( $filter_element ); ?>')" class="cs-btnclose">
							<i class="icon-cancel"></i>
						</a>
					</div>
					<div class="cs-pbwp-content">
						<div class="cs-wrapp-clone cs-shortcode-wrapp">
							<?php
							if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
								mashup_shortcode_element_size();
							}

							$mashup_opt_array = array(
								'name' => mashup_var_frame_text_srt( 'mashup_var_maintenance_sc_heading' ),
								'desc' => '',
								'hint_text' => mashup_var_frame_text_srt( 'mashup_var_maintenance_sc_heading_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $maintenance_heading_text ),
									'cust_id' => 'maintenance_heading_text' . $mashup_counter,
									'extra_atr' => '',
									'classes' => '',
									'cust_name' => 'maintenance_heading_text[]',
									'return' => true,
									'mashup_editor' => true
								),
							);

							$mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

							$mashup_opt_array = array(
								'name' => mashup_var_frame_text_srt( 'mashup_var_maintenance_sc_text' ),
								'desc' => '',
								'hint_text' => mashup_var_frame_text_srt( 'mashup_var_maintenance_sc_text_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $maintenance_column_text ),
									'cust_id' => 'maintenance_column_text' . $mashup_counter,
									'extra_atr' => ' data-content-text="cs-shortcode-textarea"',
									'classes' => '',
									'cust_name' => 'maintenance_column_text[]',
									'return' => true,
									'mashup_editor' => true
								),
							);

							$mashup_var_html_fields->mashup_var_textarea_field( $mashup_opt_array );

							$mashup_opt_array = array(
								'std' => esc_url( $mashup_var_maintenance_logo_url_array ),
								'id' => 'maintenance_logo_url',
								'name' => mashup_var_frame_text_srt( 'mashup_var_logo' ),
								'desc' => '',
								'hint_text' => mashup_var_frame_text_srt( 'mashup_var_maintenance_sc_logo_hint' ),
								'echo' => true,
								'array' => true,
								'prefix' => '',
								'field_params' => array(
									'std' => esc_url( $mashup_var_maintenance_logo_url_array ),
									'id' => 'maintenance_logo_url',
									'return' => true,
									'array' => true,
									'array_txt' => false,
									'prefix' => '',
								),
							);
							$mashup_var_html_fields->mashup_var_upload_file_field( $mashup_opt_array );

							$mashup_opt_array = array(
								'std' => esc_url( $mashup_var_maintenance_image_url_array ),
								'id' => 'maintenance_image_url',
								'name' => mashup_var_frame_text_srt( 'mashup_var_image' ),
								'desc' => '',
								'hint_text' => mashup_var_frame_text_srt( 'mashup_var_maintenance_sc_image_hint' ),
								'echo' => true,
								'array' => true,
								'prefix' => '',
								'field_params' => array(
									'std' => esc_url( $mashup_var_maintenance_image_url_array ),
									'id' => 'maintenance_image_url',
									'return' => true,
									'array' => true,
									'array_txt' => false,
									'prefix' => '',
								),
							);

							$mashup_var_html_fields->mashup_var_upload_file_field( $mashup_opt_array );

							$mashup_opt_array = array(
								'name' => mashup_var_frame_text_srt( 'mashup_var_maintenance_sc_launch_date' ),
								'desc' => '',
								'hint_text' => mashup_var_frame_text_srt( 'mashup_var_maintenance_sc_launch_date_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => $mashup_var_lunch_date,
									'cust_id' => 'mashup_var_lunch_date',
									'classes' => '',
									'id' => 'lunch_date',
									'cust_name' => 'mashup_var_lunch_date[]',
									'return' => true,
								),
							);

							$mashup_var_html_fields->mashup_var_date_field( $mashup_opt_array );
							?>
						</div>
							<?php if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) { ?>
							<ul class="form-elements insert-bg">
								<li class="to-field">
									<a class="insert-btn cs-main-btn" onclick="javascript:mashup_shortcode_insert_editor('<?php echo str_replace( 'mashup_var_page_builder_', '', $name ); ?>', '<?php echo esc_js( $name . $mashup_counter ) ?>', '<?php echo esc_js( $filter_element ); ?>')" ><?php echo mashup_var_frame_text_srt( 'mashup_var_insert' ); ?></a>
								</li>
							</ul>
							<div id="results-shortocde"></div>
			<?php } else { ?>

							<?php
							$mashup_opt_array = array(
								'std' => 'maintenance',
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
								'name' => '',
								'desc' => '',
								'hint_text' => '',
								'echo' => true,
								'field_params' => array(
									'std' => mashup_var_frame_text_srt( 'mashup_var_maintenance_sc_save' ),
									'cust_id' => 'maintenance_save',
									'cust_type' => 'button',
									'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
									'classes' => 'cs-mashup-admin-btn',
									'cust_name' => 'maintenance_save',
									'return' => true,
								),
							);

							$mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
						}
						?>
					</div>
				</div>
				
			</div>

			<?php
		}
		if ( $die <> 1 ) {
			die();
		}
	}

	add_action( 'wp_ajax_mashup_var_page_builder_maintenance', 'mashup_var_page_builder_maintenance' );
}

if ( !function_exists( 'mashup_save_page_builder_data_maintenance_callback' ) ) {

	/**
	 * Save data for maintenance shortcode.
	 *
	 * @param	array $args
	 * @return	array
	 */
	function mashup_save_page_builder_data_maintenance_callback( $args ) {

		$data = $args['data'];
		$counters = $args['counters'];
		$widget_type = $args['widget_type'];
		$column = $args['column'];
		if ( $widget_type == "maintenance" ) {
			$mashup_bareber_maintenance = '';
			$maintenance = $column->addChild( 'maintenance' );
			$maintenance->addChild( 'page_element_size', htmlspecialchars( $data['maintenance_element_size'][$counters['mashup_global_counter_maintenance']] ) );
			$maintenance->addChild( 'maintenance_element_size', htmlspecialchars( $data['maintenance_element_size'][$counters['mashup_global_counter_maintenance']] ) );
			if ( isset( $data['mashup_widget_element_num'][$counters['mashup_counter']] ) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode' ) {
				$shortcode_str = stripslashes( htmlspecialchars( ( $data['shortcode']['maintenance'][$counters['mashup_shortcode_counter_maintenance']] ), ENT_QUOTES ) );
				$mashup_bareber_maintenance++;
				$maintenance->addChild( 'mashup_shortcode', htmlspecialchars( $shortcode_str, ENT_QUOTES ) );
			} else {
				$mashup_bareber_maintenance = '[mashup_maintenance ';
				if ( isset( $data['mashup_page_view'][$counters['mashup_counter_maintenance']] ) && $data['mashup_page_view'][$counters['mashup_counter_maintenance']] != '' ) {
					$mashup_bareber_maintenance .= 'mashup_page_view="' . htmlspecialchars( $data['mashup_page_view'][$counters['mashup_counter_maintenance']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_var_maintenance_time_left'][$counters['mashup_counter_maintenance']] ) && $data['mashup_var_maintenance_time_left'][$counters['mashup_counter_maintenance']] != '' ) {
					$mashup_bareber_maintenance .= 'mashup_var_maintenance_time_left="' . htmlspecialchars( $data['mashup_var_maintenance_time_left'][$counters['mashup_counter_maintenance']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_var_maintenance_sub_title'][$counters['mashup_counter_maintenance']] ) && $data['mashup_var_maintenance_sub_title'][$counters['mashup_counter_maintenance']] != '' ) {
					$mashup_bareber_maintenance .= 'mashup_var_maintenance_sub_title="' . htmlspecialchars( $data['mashup_var_maintenance_sub_title'][$counters['mashup_counter_maintenance']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_var_lunch_date'][$counters['mashup_counter_maintenance']] ) && $data['mashup_var_lunch_date'][$counters['mashup_counter_maintenance']] != '' ) {
					$mashup_bareber_maintenance .= 'mashup_var_lunch_date="' . htmlspecialchars( $data['mashup_var_lunch_date'][$counters['mashup_counter_maintenance']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_var_maintenance_image_url_array'][$counters['mashup_counter_maintenance']] ) && $data['mashup_var_maintenance_image_url_array'][$counters['mashup_counter_maintenance']] != '' ) {
					$mashup_bareber_maintenance .= 'mashup_var_maintenance_image_url_array="' . htmlspecialchars( $data['mashup_var_maintenance_image_url_array'][$counters['mashup_counter_maintenance']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_var_maintenance_logo_url_array'][$counters['mashup_counter_maintenance']] ) && $data['mashup_var_maintenance_logo_url_array'][$counters['mashup_counter_maintenance']] != '' ) {
					$mashup_bareber_maintenance .= 'mashup_var_maintenance_logo_url_array="' . htmlspecialchars( $data['mashup_var_maintenance_logo_url_array'][$counters['mashup_counter_maintenance']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_var_maintenance_title'][$counters['mashup_counter_maintenance']] ) && $data['mashup_var_maintenance_title'][$counters['mashup_counter_maintenance']] != '' ) {
					$mashup_bareber_maintenance .= 'mashup_var_maintenance_title="' . htmlspecialchars( $data['mashup_var_maintenance_title'][$counters['mashup_counter_maintenance']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['maintenance_heading_text'][$counters['mashup_counter_maintenance']] ) && $data['maintenance_heading_text'][$counters['mashup_counter_maintenance']] != '' ) {
					$mashup_bareber_maintenance .= 'maintenance_heading_text="' . htmlspecialchars( $data['maintenance_heading_text'][$counters['mashup_counter_maintenance']], ENT_QUOTES ) . '" ';
				}

				$mashup_bareber_maintenance .= ']';
				if ( isset( $data['maintenance_column_text'][$counters['mashup_counter_maintenance']] ) && $data['maintenance_column_text'][$counters['mashup_counter_maintenance']] != '' ) {
					$mashup_bareber_maintenance .= htmlspecialchars( $data['maintenance_column_text'][$counters['mashup_counter_maintenance']], ENT_QUOTES ) . ' ';
				}
				$mashup_bareber_maintenance .= '[/mashup_maintenance]';

				$maintenance->addChild( 'mashup_shortcode', $mashup_bareber_maintenance );
				$counters['mashup_counter_maintenance'] ++;
			}
			$counters['mashup_global_counter_maintenance'] ++;
		}
		return array(
			'data' => $data,
			'counters' => $counters,
			'widget_type' => $widget_type,
			'column' => $column,
		);
	}

	add_filter( 'mashup_save_page_builder_data', 'mashup_save_page_builder_data_maintenance_callback' );
}

if ( !function_exists( 'mashup_load_shortcode_counters_maintenance_callback' ) ) {

	/**
	 * Populate maintenance shortcode counter variables.
	 *
	 * @param	array $counters
	 * @return	array
	 */
	function mashup_load_shortcode_counters_maintenance_callback( $counters ) {
		$counters['mashup_global_counter_maintenance'] = 0;
		$counters['mashup_shortcode_counter_maintenance'] = 0;
		$counters['mashup_counter_maintenance'] = 0;
		return $counters;
	}

	add_filter( 'mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_maintenance_callback' );
}



if ( !function_exists( 'mashup_element_list_populate_maintenance_callback' ) ) {

	/**
	 * Populate maintenance shortcode strings list.
	 *
	 * @param	array $counters
	 * @return	array
	 */
	function mashup_element_list_populate_maintenance_callback( $element_list ) {
		$element_list['maintenance'] = 'Maintenance';
		return $element_list;
	}

	add_filter( 'mashup_element_list_populate', 'mashup_element_list_populate_maintenance_callback' );
}

if ( !function_exists( 'mashup_shortcode_names_list_populate_maintenance_callback' ) ) {

	/**
	 * Populate maintenance shortcode names list.
	 *
	 * @param	array $counters
	 * @return	array
	 */
	function mashup_shortcode_names_list_populate_maintenance_callback( $shortcode_array ) {
		$shortcode_array['maintenance'] = array(
			'title' => 'Maintenance',
			'name' => 'maintenance',
			'icon' => 'icon-settings',
			'categories' => 'typography',
		);

		return $shortcode_array;
	}

	add_filter( 'mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_maintenance_callback' );
}
