<?php
/*
 *
 * @Shortcode Name : Clients
 * @retrun
 *
 */

if ( !function_exists( 'mashup_var_page_builder_clients' ) ) {

	function mashup_var_page_builder_clients( $die = 0 ) {
		global $post, $mashup_node, $mashup_var_html_fields, $mashup_var_form_fields, $mashup_var_static_text;
		$shortcode_element = '';
		$filter_element = 'filterdrag';
		$shortcode_view = '';
		$output = array();
		$mashup_counter = $_POST['counter'];
		$clients_num = 0;
		$mashup_var_clients_element_title = isset( $mashup_var_clients_element_title ) ? $mashup_var_clients_element_title : '';
		$mashup_var_clients_per_slide = isset( $mashup_var_clients_per_slide ) ? $mashup_var_clients_per_slide : '';
		$mashup_var_clients_sub_title = isset( $mashup_var_clients_sub_title ) ? $mashup_var_clients_sub_title : '';
		$mashup_var_clients_align = isset( $mashup_var_clients_align ) ? $mashup_var_clients_align : '';
		$mashup_var_clients_text_color = isset( $mashup_var_clients_text_color ) ? $mashup_var_clients_text_color : '';
		$mashup_var_clients_author = isset( $mashup_var_clients_author ) ? $mashup_var_clients_author : '';
		$mashup_var_clients_position = isset( $mashup_var_clients_position ) ? $mashup_var_clients_position : '';
		$clients_img_user = isset( $clients_img_user ) ? $clients_img_user : '';
		if ( isset( $_POST['action'] ) && !isset( $_POST['shortcode_element_id'] ) ) {
			$MASHUP_POSTID = '';
			$shortcode_element_id = '';
		} else {
			$MASHUP_POSTID = $_POST['POSTID'];
			$shortcode_element_id = $_POST['shortcode_element_id'];
			$shortcode_str = stripslashes( $shortcode_element_id );
			$MASHUP_PREFIX = 'mashup_clients|clients_item';
			$parseObject = new ShortcodeParse();
			$output = $parseObject->mashup_shortcodes( $output, $shortcode_str, true, $MASHUP_PREFIX );
		}
		$defaults = array( 'column_size' => '1/1', 'mashup_var_clients_element_title' => '', 'mashup_var_clients_per_slide' => '', 'mashup_var_clients_sub_title' => '', 'mashup_var_clients_align' => '', );
		if ( isset( $output['0']['atts'] ) ) {
			$atts = $output['0']['atts'];
		} else {
			$atts = array();
		}
		if ( isset( $output['0']['content'] ) ) {
			$atts_content = $output['0']['content'];
		} else {
			$atts_content = array();
		}
		if ( is_array( $atts_content ) ) {
			$clients_num = count( $atts_content );
		}
		$clients_element_size = '100';
		foreach ( $defaults as $key => $values ) {
			if ( isset( $atts[$key] ) ) {
				$$key = $atts[$key];
			} else {
				$$key = $values;
			}
		}
		$name = 'mashup_var_page_builder_clients';
		$coloumn_class = 'column_' . $clients_element_size;
		if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
			$shortcode_element = 'shortcode_element_class';
			$shortcode_view = 'cs-pbwp-shortcode';
			$filter_element = 'ajax-drag';
			$coloumn_class = '';
		}
		$strings = new mashup_theme_all_strings;
		$strings->mashup_short_code_strings();
		?>
		<div id="<?php echo mashup_allow_special_char( $name . $mashup_counter ) ?>_del" class="column  parentdelete <?php echo mashup_allow_special_char( $coloumn_class ); ?> <?php echo mashup_allow_special_char( $shortcode_view ); ?>" item="clients" data="<?php echo mashup_element_size_data_array_index( $clients_element_size ) ?>" >
			<?php mashup_element_setting( $name, $mashup_counter, $clients_element_size, '', 'comments-o', $type = '' ); ?>
			<div class="cs-wrapp-class-<?php echo mashup_allow_special_char( $mashup_counter ) ?> <?php echo mashup_allow_special_char( $shortcode_element ); ?>" id="<?php echo mashup_allow_special_char( $name . $mashup_counter ) ?>" style="display: none;">
				<div class="cs-heading-area">
					<h5><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_client_edit_options' ) ); ?></h5>
					<a href="javascript:mashup_frame_removeoverlay('<?php echo mashup_allow_special_char( $name . $mashup_counter ) ?>','<?php echo mashup_allow_special_char( $filter_element ); ?>')" class="cs-btnclose"><i class="icon-cancel"></i></a>
				</div>
				<div class="cs-clone-append cs-pbwp-content">
					<div class="cs-wrapp-tab-box">
						<div id="shortcode-item-<?php echo mashup_allow_special_char( $mashup_counter ); ?>" data-shortcode-template="{{child_shortcode}} [/mashup_clients]" data-shortcode-child-template="[clients_item {{attributes}}] {{content}} [/clients_item]">
							<div class="cs-wrapp-clone cs-shortcode-wrapp cs-disable-true cs-pbwp-content" data-template="[mashup_clients {{attributes}}]">
								<?php
								if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
									mashup_shortcode_element_size();
								}
								$mashup_clients_style = isset( $mashup_clients_style ) ? $mashup_clients_style : '';
								$mashup_opt_array = array(
									'name' => mashup_var_theme_text_srt( 'mashup_var_client_element_title' ),
									'desc' => '',
									'hint_text' => mashup_var_theme_text_srt( 'mashup_var_client_title_hint_text' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_attr( $mashup_var_clients_element_title ),
										'cust_id' => '',
										'cust_id' => 'mashup_var_clients_element_title' . $mashup_counter,
										'cust_name' => 'mashup_var_clients_element_title[]',
										'return' => true,
									),
								);
								$mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );


								$mashup_opt_array = array(
									'name' => mashup_var_theme_text_srt( 'mashup_var_element_sub_title' ),
									'desc' => '',
									'hint_text' => mashup_var_theme_text_srt( 'mashup_var_element_sub_title_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => mashup_allow_special_char( $mashup_var_clients_sub_title ),
										'id' => 'mashup_var_clients_sub_title',
										'cust_name' => 'mashup_var_clients_sub_title[]',
										'classes' => '',
										'return' => true,
									),
								);
								$mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

								$mashup_opt_array = array(
									'name' => mashup_var_theme_text_srt( 'mashup_var_align' ),
									'desc' => '',
									'hint_text' => mashup_var_theme_text_srt( 'mashup_var_align_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => $mashup_var_clients_align,
										'id' => '',
										'cust_id' => '',
										'cust_name' => 'mashup_var_clients_align[]',
										'classes' => 'dropdown chosen-select',
										'options' => array(
											'left' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_left' ),
											'right' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_right' ),
											'center' => mashup_var_theme_text_srt( 'mashup_var_heading_sc_center' ),
										),
										'return' => true,
									),
								);

								$mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );


								$mashup_opt_array = array(
									'name' => mashup_var_theme_text_srt( 'mashup_var_client_per_slide' ),
									'desc' => '',
									'hint_text' => mashup_var_theme_text_srt( 'mashup_var_client_per_slide_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_attr( $mashup_var_clients_per_slide ),
										'cust_id' => '',
										'cust_id' => 'mashup_var_clients_per_slide' . $mashup_counter,
										'cust_name' => 'mashup_var_clients_per_slide[]',
										'return' => true,
									),
								);
								$mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
								?>

							</div>
		<?php
		if ( isset( $clients_num ) && $clients_num <> '' && isset( $atts_content ) && is_array( $atts_content ) ) {
			foreach ( $atts_content as $clients ) {
				$rand_string = rand( 1234, 7894563 );
				$mashup_var_clients_text = $clients['content'];
				$defaults = array( 'mashup_var_clients_text' => '', 'mashup_var_clients_img_user_array' => '' );
				foreach ( $defaults as $key => $values ) {
					if ( isset( $clients['atts'][$key] ) ) {
						$$key = $clients['atts'][$key];
					} else {
						$$key = $values;
					}
				}
				?>
									<div class='cs-wrapp-clone cs-shortcode-wrapp cs-pbwp-content' id="mashup_infobox_<?php echo mashup_allow_special_char( $rand_string ); ?>">
										<header>
											<h4><i class='icon-arrows'></i><?php echo esc_html( mashup_var_frame_text_srt( 'mashup_var_clients' ) ); ?></h4>
											<a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_remove' ) ); ?></a>
										</header>
				<?php
				$mashup_opt_array = array(
					'name' => mashup_var_theme_text_srt( 'mashup_var_client_url' ),
					'desc' => '',
					'hint_text' => mashup_var_theme_text_srt( 'mashup_var_client_url_hint_text' ),
					'echo' => true,
					'field_params' => array(
						'std' => esc_attr( $mashup_var_clients_text ),
						'cust_id' => '',
						'extra_atr' => 'data-content-text="cs-shortcode-textarea"',
						'cust_name' => 'mashup_var_clients_text[]',
						'return' => true,
					),
				);

				$mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

				$mashup_opt_array = array(
					'std' => $mashup_var_clients_img_user_array,
					'id' => 'clients_img_user',
					'name' => mashup_var_theme_text_srt( 'mashup_var_client_image' ),
					'desc' => '',
					'hint_text' => mashup_var_theme_text_srt( 'mashup_var_client_url_image_hint_text' ),
					'echo' => true,
					'array' => true,
					'prefix' => '',
					'field_params' => array(
						'std' => $mashup_var_clients_img_user_array,
						'id' => 'clients_img_user',
						'return' => true,
						'array' => true,
						'array_txt' => false,
						'prefix' => '',
					),
				);

				$mashup_var_html_fields->mashup_var_upload_file_field( $mashup_opt_array );
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
			'std' => mashup_allow_special_char( $clients_num ),
			'id' => '',
			'before' => '',
			'after' => '',
			'classes' => 'fieldCounter',
			'extra_atr' => '',
			'cust_id' => '',
			'cust_name' => 'clients_num[]',
			'return' => true,
			'required' => false
		);
		echo mashup_allow_special_char( $mashup_var_form_fields->mashup_var_form_hidden_render( $mashup_opt_array ) );
		?>

						</div>
						<div class="wrapptabbox cs-pbwp-content cs-zero-padding">
							<div class="opt-conts">
								<ul class="form-elements">
									<li class="to-field"> <a href="javascript:void(0);" class="add_servicesss cs-main-btn" onclick="mashup_shortcode_element_ajax_call('clients', 'shortcode-item-<?php echo mashup_allow_special_char( $mashup_counter ); ?>', '<?php echo admin_url( 'admin-ajax.php' ); ?>')"><i class="icon-plus-circle"></i><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_client_url_add_clients' ) ); ?></a> </li>
									<div id="loading" class="shortcodeload"></div>
								</ul>
		<?php if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) { ?>
									<ul class="form-elements insert-bg noborder">
										<li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:mashup_shortcode_insert_editor('<?php echo str_replace( 'mashup_var_page_builder_', '', $name ); ?>', 'shortcode-item-<?php echo mashup_allow_special_char( $mashup_counter ); ?>', '<?php echo mashup_allow_special_char( $filter_element ); ?>')" ><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_client_url_add_insert' ) ); ?></a> </li>
									</ul>
									<div id="results-shortocde"></div>
			<?php
		} else {
			$mashup_opt_array = array(
				'std' => 'clients',
				'id' => '',
				'before' => '',
				'after' => '',
				'classes' => '',
				'extra_atr' => '',
				'cust_id' => 'mashup_orderby' . $mashup_counter,
				'cust_name' => 'mashup_orderby[]',
				'return' => true,
				'required' => false
			);
			echo mashup_allow_special_char( $mashup_var_form_fields->mashup_var_form_hidden_render( $mashup_opt_array ) );

			$mashup_opt_array = array(
				'name' => '',
				'desc' => '',
				'hint_text' => '',
				'echo' => true,
				'field_params' => array(
					'std' => mashup_var_theme_text_srt( 'mashup_var_save' ),
					'cust_id' => 'clients_save' . $mashup_counter,
					'cust_type' => 'button',
					'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
					'classes' => 'cs-mashup-admin-btn',
					'cust_name' => 'clients_save',
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
			</div>

		</div>

		<?php
		if ( $die <> 1 ) {
			die();
		}
	}

	add_action( 'wp_ajax_mashup_var_page_builder_clients', 'mashup_var_page_builder_clients' );
}

if ( !function_exists( 'mashup_save_page_builder_data_clients_callback' ) ) {

	/**
	 * Save data for clients shortcode.
	 *
	 * @param	array $args
	 * @return	array
	 */
	function mashup_save_page_builder_data_clients_callback( $args ) {

		$data = $args['data'];
		$counters = $args['counters'];
		$widget_type = $args['widget_type'];
		$column = $args['column'];
		if ( $widget_type == "clients" ) {
			$shortcode = $shortcode_item = '';
			$clients = $column->addChild( 'clients' );
			$clients->addChild( 'page_element_size', htmlspecialchars( $data['clients_element_size'][$counters['mashup_global_counter_clients']] ) );
			$clients->addChild( 'clients_element_size', htmlspecialchars( $data['clients_element_size'][$counters['mashup_global_counter_clients']] ) );
			if ( isset( $data['mashup_widget_element_num'][$counters['mashup_counter']] ) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode' ) {
				$shortcode_str = stripslashes( $data['shortcode']['clients'][$counters['mashup_shortcode_counter_clients']] );
				$counters['mashup_shortcode_counter_clients'] ++;
				$clients->addChild( 'mashup_shortcode', htmlspecialchars( $shortcode_str, ENT_QUOTES ) );
			} else {
				if ( isset( $data['clients_num'][$counters['mashup_counter_clients']] ) && $data['clients_num'][$counters['mashup_counter_clients']] > 0 ) {
					for ( $i = 1; $i <= $data['clients_num'][$counters['mashup_counter_clients']]; $i ++ ) {
						$shortcode_item .= '[clients_item ';
						if ( isset( $data['mashup_var_clients_img_user_array'][$counters['mashup_counter_clients_node']] ) && $data['mashup_var_clients_img_user_array'][$counters['mashup_counter_clients_node']] != '' ) {
							$shortcode_item .= 'mashup_var_clients_img_user_array="' . htmlspecialchars( $data['mashup_var_clients_img_user_array'][$counters['mashup_counter_clients_node']], ENT_QUOTES ) . '" ';
						}
						if ( isset( $data['mashup_var_clients_text'][$counters['mashup_counter_clients_node']] ) && $data['mashup_var_clients_text'][$counters['mashup_counter_clients_node']] != '' ) {
							$shortcode_item .= 'mashup_var_clients_text="' . htmlspecialchars( $data['mashup_var_clients_text'][$counters['mashup_counter_clients_node']], ENT_QUOTES ) . '" ';
						}
						$shortcode_item .= ']';
						$shortcode_item .= '[/clients_item]';
						$counters['mashup_counter_clients_node'] ++;
					}
				}
				$clients_element_title = '';
				if ( isset( $data['mashup_var_clients_element_title'][$counters['mashup_counter_clients']] ) && $data['mashup_var_clients_element_title'][$counters['mashup_counter_clients']] != '' ) {
					$clients_element_title .= 'mashup_var_clients_element_title="' . htmlspecialchars( $data['mashup_var_clients_element_title'][$counters['mashup_counter_clients']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_var_clients_sub_title'][$counters['mashup_counter_clients']] ) && $data['mashup_var_clients_sub_title'][$counters['mashup_counter_clients']] != '' ) {
					$clients_element_title .= 'mashup_var_clients_sub_title="' . htmlspecialchars( $data['mashup_var_clients_sub_title'][$counters['mashup_counter_clients']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_var_clients_align'][$counters['mashup_counter_clients']] ) && $data['mashup_var_clients_align'][$counters['mashup_counter_clients']] != '' ) {
					$clients_element_title .= 'mashup_var_clients_align="' . htmlspecialchars( $data['mashup_var_clients_align'][$counters['mashup_counter_clients']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_var_clients_per_slide'][$counters['mashup_counter_clients']] ) && $data['mashup_var_clients_per_slide'][$counters['mashup_counter_clients']] != '' ) {
					$clients_element_title .= 'mashup_var_clients_per_slide="' . htmlspecialchars( $data['mashup_var_clients_per_slide'][$counters['mashup_counter_clients']], ENT_QUOTES ) . '" ';
				}

				$shortcode = '[mashup_clients ' . $clients_element_title . ' ]' . $shortcode_item . '[/mashup_clients]';
				$clients->addChild( 'mashup_shortcode', $shortcode );
				$counters['mashup_counter_clients'] ++;
			}
			$counters['mashup_global_counter_clients'] ++;
		}
		return array(
			'data' => $data,
			'counters' => $counters,
			'widget_type' => $widget_type,
			'column' => $column,
		);
	}

	add_filter( 'mashup_save_page_builder_data', 'mashup_save_page_builder_data_clients_callback' );
}

if ( !function_exists( 'mashup_load_shortcode_counters_clients_callback' ) ) {

	/**
	 * Populate clients shortcode counter variables.
	 *
	 * @param	array $counters
	 * @return	array
	 */
	function mashup_load_shortcode_counters_clients_callback( $counters ) {
		$counters['mashup_counter_clients'] = 0;
		$counters['mashup_counter_clients_node'] = 0;
		$counters['mashup_shortcode_counter_clients'] = 0;
		$counters['mashup_global_counter_clients'] = 0;
		return $counters;
	}

	add_filter( 'mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_clients_callback' );
}

if ( !function_exists( 'mashup_shortcode_names_list_populate_clients_callback' ) ) {

	/**
	 * Populate clients shortcode names list.
	 *
	 * @param	array $counters
	 * @return	array
	 */
	function mashup_shortcode_names_list_populate_clients_callback( $shortcode_array ) {
		$shortcode_array['clients'] = array(
			'title' => mashup_var_frame_text_srt( 'mashup_var_clients' ),
			'name' => 'clients',
			'icon' => 'icon-user3',
			'categories' => 'loops',
		);
		return $shortcode_array;
	}

	add_filter( 'mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_clients_callback' );
}

if ( !function_exists( 'mashup_element_list_populate_clients_callback' ) ) {

	/**
	 * Populate clients shortcode strings list.
	 *
	 * @param	array $counters
	 * @return	array
	 */
	function mashup_element_list_populate_clients_callback( $element_list ) {
		$element_list['clients'] = mashup_var_frame_text_srt( 'mashup_var_clients' );
		return $element_list;
	}

	add_filter( 'mashup_element_list_populate', 'mashup_element_list_populate_clients_callback' );
}

if ( !function_exists( 'mashup_shortcode_sub_element_ui_clients_callback' ) ) {

	/**
	 * Render UI for sub element in clients settings.
	 *
	 * @param	array $args
	 */
	function mashup_shortcode_sub_element_ui_clients_callback( $args ) {
		$type = $args['type'];
		$mashup_var_html_fields = $args['html_fields'];

		if ( $type == 'clients' ) {

			$rand_id = rand( 1234, 7894563 );
			?>
			<div class='cs-wrapp-clone cs-shortcode-wrapp cs-pbwp-content'  id="mashup_infobox_<?php echo intval( $rand_id ); ?>">
				<header>
					<h4><i class='icon-arrows'></i><?php echo esc_html( mashup_var_frame_text_srt( 'mashup_var_clients' ) ); ?></h4>
					<a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo esc_html( mashup_var_frame_text_srt( 'mashup_var_remove' ) ); ?></a>
				</header>
			<?php
			$mashup_opt_array = array(
				'name' => mashup_var_frame_text_srt( 'mashup_var_image_url' ),
				'desc' => '',
				'hint_text' => mashup_var_frame_text_srt( 'mashup_var_image_url_hint' ),
				'echo' => true,
				'field_params' => array(
					'std' => '',
					'cust_id' => '',
					'extra_atr' => 'data-content-text="cs-shortcode-textarea"',
					'cust_name' => 'mashup_var_clients_text[]',
					'return' => true,
				),
			);

			$mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

			$mashup_opt_array = array(
				'std' => '',
				'id' => 'clients_img_user',
				'name' => mashup_var_frame_text_srt( 'mashup_var_image' ),
				'desc' => '',
				'hint_text' => mashup_var_frame_text_srt( 'mashup_var_image_hint' ),
				'echo' => true,
				'array' => true,
				'prefix' => '',
				'field_params' => array(
					'std' => '',
					'id' => 'clients_img_user',
					'return' => true,
					'array' => true,
					'array_txt' => false,
					'prefix' => '',
				),
			);

			$mashup_var_html_fields->mashup_var_upload_file_field( $mashup_opt_array );
			?>

			</div>
			<?php
		}
	}

	add_action( 'mashup_shortcode_sub_element_ui', 'mashup_shortcode_sub_element_ui_clients_callback' );
}