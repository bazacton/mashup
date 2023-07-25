<?php
/*
 *
 * @Shortcode Name : icon_box
 * @retrun
 *
 */
if ( !function_exists( 'mashup_var_page_builder_icon_box' ) ) {

	function mashup_var_page_builder_icon_box( $die = 0 ) {
		global $post, $mashup_node, $mashup_var_html_fields, $mashup_var_form_fields, $mashup_var_static_text;


		$string = new mashup_theme_all_strings;
		$string->mashup_short_code_strings();
		$shortcode_element = '';
		$filter_element = 'filterdrag';
		$shortcode_view = '';
		$output = array();
		$mashup_counter = $_POST['counter'];
		$icon_boxes_num = 0;

		if ( isset( $_POST['action'] ) && !isset( $_POST['shortcode_element_id'] ) ) {
			$MASHUP_POSTID = '';
			$shortcode_element_id = '';
		} else {
			$MASHUP_POSTID = $_POST['POSTID'];
			$shortcode_element_id = $_POST['shortcode_element_id'];
			$shortcode_str = stripslashes( $shortcode_element_id );
			$MASHUP_PREFIX = 'icon_box|icon_boxes_item';
			$parseObject = new ShortcodeParse();
			$output = $parseObject->mashup_shortcodes( $output, $shortcode_str, true, $MASHUP_PREFIX );
		}
		$defaults = array(
			'mashup_var_column_size' => '1/1',
			'mashup_var_icon_boxes_title' => '',
			'mashup_var_icon_boxes_sub_title' => '',
			'mashup_var_icon_box_content_align' => '',
			'mashup_var_icon_box_column' => '',
			'mashup_var_icon_box_view' => '',
			'mashup_title_color' => '',
			'mashup_icon_box_content_color' => '',
			'mashup_icon_box_icon_color' => '',
			'mashup_var_icon_box_icon_size' => '',
			'mashup_icon_box_content_align' => '',
			'mashup_var_icon_box_sub_title' => '',
			'mashup_var_icon_box_element_align' => '',
		);
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
			$icon_boxes_num = count( $atts_content );
		}
		$icon_boxes_element_size = '100';
		foreach ( $defaults as $key => $values ) {
			if ( isset( $atts[$key] ) ) {
				$$key = $atts[$key];
			} else {
				$$key = $values;
			}
		}

		$mashup_var_icon_boxes_title = isset( $mashup_var_icon_boxes_title ) ? $mashup_var_icon_boxes_title : '';
		$mashup_var_icon_boxes_sub_title = isset( $mashup_var_icon_boxes_sub_title ) ? $mashup_var_icon_boxes_sub_title : '';
		$mashup_var_icon_box_column = isset( $mashup_var_icon_box_column ) ? $mashup_var_icon_box_column : '';


		$name = 'mashup_var_page_builder_icon_box';
		$coloumn_class = 'column_' . $icon_boxes_element_size;
		if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
			$shortcode_element = 'shortcode_element_class';
			$shortcode_view = 'cs-pbwp-shortcode';
			$filter_element = 'ajax-drag';
			$coloumn_class = '';
		}
		?>
		<div id="<?php echo mashup_allow_special_char( $name . $mashup_counter ) ?>_del" class="column  parentdelete <?php echo mashup_allow_special_char( $coloumn_class ); ?> <?php echo mashup_allow_special_char( $shortcode_view ); ?>" item="icon_box" data="<?php echo mashup_element_size_data_array_index( $icon_boxes_element_size ) ?>" >
			<?php mashup_element_setting( $name, $mashup_counter, $icon_boxes_element_size, '', 'comments-o', $type = '' ); ?>
			<div class="cs-wrapp-class-<?php echo mashup_allow_special_char( $mashup_counter ) ?> <?php echo mashup_allow_special_char( $shortcode_element ); ?>" id="<?php echo mashup_allow_special_char( $name . $mashup_counter ) ?>" style="display: none;">
				<div class="cs-heading-area">
					<h5><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_icon_box_edit' ) ); ?></h5>
					<a href="javascript:mashup_frame_removeoverlay('<?php echo mashup_allow_special_char( $name . $mashup_counter ) ?>','<?php echo mashup_allow_special_char( $filter_element ); ?>')" class="cs-btnclose"><i class="icon-cancel"></i></a>
				</div>
				<div class="cs-clone-append cs-pbwp-content">
					<div class="cs-wrapp-tab-box">
						<div id="shortcode-item-<?php echo mashup_allow_special_char( $mashup_counter ); ?>" data-shortcode-template="{{child_shortcode}} [/icon_box]" data-shortcode-child-template="[icon_boxes_item {{attributes}}] {{content}} [/icon_boxes_item]">
							<div class="cs-wrapp-clone cs-shortcode-wrapp cs-disable-true cs-pbwp-content" data-template="[icon_box {{attributes}}]">
								<?php
								if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
									mashup_shortcode_element_size();
								}

								$mashup_opt_array = array(
									'name' => mashup_var_theme_text_srt( 'mashup_var_element_title' ),
									'desc' => '',
									'hint_text' => mashup_var_theme_text_srt( 'mashup_var_element_title_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_attr( $mashup_var_icon_boxes_title ),
										'cust_id' => '',
										'cust_name' => 'mashup_var_icon_boxes_title[]',
										'return' => true,
									),
								);
								$mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

								// element subtitle
								$mashup_opt_array = array(
									'name' => mashup_var_theme_text_srt( 'mashup_var_element_sub_title' ),
									'desc' => '',
									'hint_text' => mashup_var_theme_text_srt( 'mashup_var_element_sub_title_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_attr( $mashup_var_icon_box_sub_title ),
										'cust_id' => '',
										'cust_name' => 'mashup_var_icon_box_sub_title[]',
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
										'std' => $mashup_var_icon_box_element_align,
										'id' => '',
										'cust_id' => '',
										'cust_name' => 'mashup_var_icon_box_element_align[]',
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
									'name' => mashup_var_theme_text_srt( 'mashup_var_icon_boxes_title_color' ),
									'desc' => '',
									'hint_text' => mashup_var_theme_text_srt( 'mashup_var_icon_boxes_title_color_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_html( $mashup_icon_box_content_color ),
										'id' => 'mashup_icon_box_content_color',
										'cust_name' => 'mashup_icon_box_content_color[]',
										'classes' => 'bg_color',
										'return' => true,
									),
								);

								$mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

								$mashup_opt_array = array(
									'name' => mashup_var_theme_text_srt( 'mashup_var_icon_boxes_text' ),
									'desc' => '',
									'hint_text' => mashup_var_theme_text_srt( 'mashup_var_icon_boxes_content_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_attr( $mashup_var_icon_boxes_sub_title ),
										'cust_id' => '',
										'cust_name' => 'mashup_var_icon_boxes_sub_title[]',
										'return' => true,
										'classes' => '',
										'mashup_editor' => true,
									),
								);
								$mashup_var_html_fields->mashup_var_textarea_field( $mashup_opt_array );

								$mashup_opt_array = array(
									'name' => mashup_var_theme_text_srt( 'mashup_var_icon_box_styles' ),
									'desc' => '',
									'hint_text' => mashup_var_theme_text_srt( 'mashup_var_icon_box_styles_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => $mashup_var_icon_box_view,
										'id' => '',
										'cust_id' => 'mashup_var_icon_box_view',
										'cust_name' => 'mashup_var_icon_box_view[]',
										'classes' => 'mashup_var_icon_box_view dropdown chosen-select',
										'extra_atr' => ' onchange=mashup_icon_box_style_change(this.value)',
										'options' => array(
											'simple' => mashup_var_theme_text_srt( 'mashup_var_icon_box_style_simple' ),
											'has-border' => mashup_var_theme_text_srt( 'mashup_var_icon_box_style_box' ),
										),
										'return' => true,
									),
								);

								$mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );


								$mashup_opt_array = array(
									'name' => mashup_var_theme_text_srt( 'mashup_var_icon_box_alignment' ),
									'desc' => '',
									'hint_text' => mashup_var_theme_text_srt( 'mashup_var_icon_box_alignment_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => $mashup_icon_box_content_align,
										'id' => '',
										'cust_name' => 'mashup_icon_box_content_align[]',
										'classes' => 'dropdown chosen-select',
										'options' => array(
											'left' => mashup_var_theme_text_srt( 'mashup_var_icon_box_alignment_left' ),
											'right' => mashup_var_theme_text_srt( 'mashup_var_icon_box_alignment_right' ),
											'top-center' => mashup_var_theme_text_srt( 'mashup_var_icon_box_alignment_center' ),
											'top-left' => mashup_var_theme_text_srt( 'mashup_var_icon_box_alignment_top_left' ),
											'top-right' => mashup_var_theme_text_srt( 'mashup_var_icon_box_alignment_top_right' ),
										),
										'return' => true,
									),
								);
								$mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );

								$mashup_opt_array = array(
									'name' => mashup_var_theme_text_srt( 'mashup_var_icon_boxes_sel_col' ),
									'desc' => '',
									'hint_text' => mashup_var_theme_text_srt( 'mashup_var_icon_boxes_sel_col_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_html( $mashup_var_icon_box_column ),
										'cust_id' => 'mashup_var_icon_box_column' . $mashup_counter,
										'cust_name' => 'mashup_var_icon_box_column[]',
										'classes' => 'dropdown chosen-select',
										'options' => array(
											'1' => mashup_var_theme_text_srt( 'mashup_var_one_col' ),
											'2' => mashup_var_theme_text_srt( 'mashup_var_two_col' ),
											'3' => mashup_var_theme_text_srt( 'mashup_var_three_col' ),
											'4' => mashup_var_theme_text_srt( 'mashup_var_four_col' ),
											'6' => mashup_var_theme_text_srt( 'mashup_var_six_col' ),
										),
										'return' => true,
									),
								);

								$mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );

								$mashup_opt_array = array(
									'name' => mashup_var_theme_text_srt( 'mashup_var_icon_box_title_color' ),
									'desc' => '',
									'hint_text' => mashup_var_theme_text_srt( 'mashup_var_icon_box_title_color_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_attr( $mashup_title_color ),
										'cust_id' => 'mashup_title_color',
										'classes' => 'bg_color',
										'cust_name' => 'mashup_title_color[]',
										'return' => true,
									),
								);

								$mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

								$mashup_opt_array = array(
									'name' => mashup_var_theme_text_srt( 'mashup_var_icon_boxes_Icon_color' ),
									'desc' => '',
									'hint_text' => mashup_var_theme_text_srt( 'mashup_var_icon_boxes_Icon_color_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_html( $mashup_icon_box_icon_color ),
										'id' => 'mashup_icon_box_icon_color',
										'cust_name' => 'mashup_icon_box_icon_color[]',
										'classes' => 'bg_color',
										'return' => true,
									),
								);

								$mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

								$mashup_opt_array = array(
									'name' => mashup_var_theme_text_srt( 'mashup_var_icon_box_icon_font_size' ),
									'desc' => '',
									'hint_text' => mashup_var_theme_text_srt( 'mashup_var_icon_box_icon_font_size_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => $mashup_var_icon_box_icon_size,
										'id' => '',
										'cust_id' => 'mashup_var_icon_box_icon_size',
										'cust_name' => 'mashup_var_icon_box_icon_size[]',
										'classes' => 'icon_box_postion dropdown chosen-select',
										'options' => array(
											'icon-xs' => mashup_var_theme_text_srt( 'mashup_var_icon_box_icon_font_size_option_1' ),
											'icon-sm' => mashup_var_theme_text_srt( 'mashup_var_icon_box_icon_font_size_option_2' ),
											'icon-md' => mashup_var_theme_text_srt( 'mashup_var_icon_box_icon_font_size_option_3' ),
											'icon-ml' => mashup_var_theme_text_srt( 'mashup_var_icon_box_icon_font_size_option_4' ),
											'icon-lg' => mashup_var_theme_text_srt( 'mashup_var_icon_box_icon_font_size_option_5' ),
											'icon-xl' => mashup_var_theme_text_srt( 'mashup_var_icon_box_icon_font_size_option_6' ),
											'icon-xxl' => mashup_var_theme_text_srt( 'mashup_var_icon_box_icon_font_size_option_7' ),
										),
										'return' => true,
									),
								);

								$mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
								?>
							</div>
							<?php
							if ( isset( $icon_boxes_num ) && $icon_boxes_num <> '' && isset( $atts_content ) && is_array( $atts_content ) ) {
								foreach ( $atts_content as $icon_boxes ) {
									$rand_string = rand( 123456, 987654 );
									$mashup_var_icon_boxes_text = $icon_boxes['content'];
									$defaults = array(
										'mashup_var_icon_box_title' => '',
										'mashup_var_icon_box_icon_size' => '',
										'mashup_var_icon_boxes_icon' => '',
										'mashup_var_link_url' => '',
										'mashup_var_icon_box_icon_type' => '',
										'mashup_var_icon_box_image' => ''
									);
									foreach ( $defaults as $key => $values ) {
										if ( isset( $icon_boxes['atts'][$key] ) ) {
											$$key = $icon_boxes['atts'][$key];
										} else {
											$$key = $values;
										}
									}
									$mashup_var_icon_boxes_text = isset( $mashup_var_icon_boxes_text ) ? $mashup_var_icon_boxes_text : '';
									$mashup_var_icon_box_title = isset( $mashup_var_icon_box_title ) ? $mashup_var_icon_box_title : '';
									$mashup_var_icon_boxes_icon = isset( $mashup_var_icon_boxes_icon ) ? $mashup_var_icon_boxes_icon : '';
									$mashup_var_icon_box_icon_size = isset( $mashup_var_icon_box_icon_size ) ? $mashup_var_icon_box_icon_size : '';
									$mashup_var_icon_box_icon_color = isset( $mashup_var_icon_box_icon_color ) ? $mashup_var_icon_box_icon_color : '';
									$mashup_var_link_url = isset( $mashup_var_link_url ) ? $mashup_var_link_url : '';
									$mashup_var_icon_box_icon_type = isset( $mashup_var_icon_box_icon_type ) ? $mashup_var_icon_box_icon_type : '';
									$mashup_var_icon_box_image = isset( $mashup_var_icon_box_image ) ? $mashup_var_icon_box_image : '';
									?>
									<div class='cs-wrapp-clone cs-shortcode-wrapp cs-pbwp-content' id="mashup_infobox_<?php echo mashup_allow_special_char( $rand_string ); ?>">
										<header>
											<h4><i class='icon-arrows'></i><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_icon_boxes' ) ); ?></h4>
											<a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_tabs_remove' ) ); ?></a>
										</header>
										<?php
										$mashup_opt_array = array(
											'name' => mashup_var_theme_text_srt( 'mashup_var_icon_box_title' ),
											'desc' => '',
											'hint_text' => mashup_var_theme_text_srt( 'mashup_var_icon_box_title_hint' ),
											'echo' => true,
											'field_params' => array(
												'std' => mashup_allow_special_char( $mashup_var_icon_box_title ),
												'cust_id' => 'mashup_var_icon_box_title',
												'classes' => '',
												'cust_name' => 'mashup_var_icon_box_title[]',
												'return' => true,
											),
										);

										$mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

										$mashup_opt_array = array(
											'name' => mashup_var_theme_text_srt( 'mashup_var_icon_boxes_link_url' ),
											'desc' => '',
											'hint_text' => mashup_var_theme_text_srt( 'mashup_var_icon_boxes_link_url_hint' ),
											'echo' => true,
											'field_params' => array(
												'std' => esc_attr( $mashup_var_link_url ),
												'cust_id' => 'mashup_var_link_url',
												'classes' => '',
												'cust_name' => 'mashup_var_link_url[]',
												'return' => true,
											),
										);
										$mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

										$mashup_opt_array = array(
											'name' => mashup_var_theme_text_srt( 'mashup_var_icon_box_icon_type' ),
											'desc' => '',
											'hint_text' => mashup_var_theme_text_srt( 'mashup_var_icon_box_icon_type_hint' ),
											'echo' => true,
											'field_params' => array(
												'std' => esc_html( $mashup_var_icon_box_icon_type ),
												'id' => 'mashup_var_icon_box_icon_type',
												'cust_name' => 'mashup_var_icon_box_icon_type[]',
												'classes' => 'dropdown chosen-select function-class',
												'options' => array(
													'icon' => mashup_var_theme_text_srt( 'mashup_var_icon_box_icon_type_1' ),
													'image' => mashup_var_theme_text_srt( 'mashup_var_icon_box_icon_type_2' ),
												),
												'return' => true,
											),
										);
										$mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
										?>	 				

										<div class="cs-sh-icon_box-image-area" style="display:<?php echo esc_html( $mashup_var_icon_box_icon_type == 'image' ? 'block' : 'none'  ) ?>;">
											<?php
											$mashup_opt_array = array(
												'std' => $mashup_var_icon_box_image,
												'id' => 'icon_box_image_array',
												'main_id' => 'icon_box_image_array',
												'name' => mashup_var_theme_text_srt( 'mashup_var_image_field' ),
												'desc' => '',
												'hint_text' => mashup_var_theme_text_srt( 'mashup_var_icon_box_image_hint' ),
												'echo' => true,
												'array' => true,
												'field_params' => array(
													'std' => $mashup_var_icon_box_image,
													'cust_id' => '',
													'cust_name' => 'mashup_var_icon_box_image[]',
													'id' => 'icon_box_image_array',
													'return' => true,
													'array' => true,
												),
											);
											$mashup_var_html_fields->mashup_var_upload_file_field( $mashup_opt_array );

											$rand_id = rand( 1111111, 9999999 );
											?>
										</div>

										<div class="cs-sh-icon_box-icon-area" style="display:<?php echo esc_html( $mashup_var_icon_box_icon_type != 'image' ? 'block' : 'none'  ) ?>;">
											<div class="form-elements" id="mashup_infobox_<?php echo esc_attr( $rand_id ); ?>">
												<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
													<label><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_icon_boxes_icon' ) ); ?></label>
													<?php
													if ( function_exists( 'mashup_var_tooltip_helptext' ) ) {
														echo mashup_var_tooltip_helptext( mashup_var_theme_text_srt( 'mashup_var_icon_boxes_icon_hint' ) );
													}
													?>
												</div>
												<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
													<?php echo mashup_var_icomoon_icons_box( $mashup_var_icon_boxes_icon, esc_attr( $rand_id ), 'mashup_var_icon_boxes_icon' ); ?>
												</div>
											</div>

										</div>
										<?php
										$mashup_opt_array = array(
											'name' => mashup_var_theme_text_srt( 'mashup_var_icon_box_icon_content' ),
											'desc' => '',
											'hint_text' => mashup_var_theme_text_srt( 'mashup_var_icon_box_icon_content_hint' ),
											'echo' => true,
											'field_params' => array(
												'std' => esc_attr( $mashup_var_icon_boxes_text ),
												'cust_id' => '',
												'extra_atr' => 'data-content-text="cs-shortcode-textarea"',
												'cust_name' => 'mashup_var_icon_boxes_text[]',
												'return' => true,
												'classes' => '',
												'mashup_editor' => true,
											),
										);
										$mashup_var_html_fields->mashup_var_textarea_field( $mashup_opt_array );
										?>
									</div>

									<?php
								}
							}
							?>
							<script type="text/javascript">
								jQuery('.function-class').change(function ($) {
									var value = jQuery(this).val();

									var parentNode = jQuery(this).parent().parent().parent();
									if (value == 'image') {
										parentNode.find(".cs-sh-icon_box-image-area").show();
										parentNode.find(".cs-sh-icon_box-icon-area").hide();
									} else {
										parentNode.find(".cs-sh-icon_box-image-area").hide();
										parentNode.find(".cs-sh-icon_box-icon-area").show();
									}

								}
								);
							</script>
						</div>
						<div class="hidden-object">
							<?php
							$mashup_opt_array = array(
								'std' => mashup_allow_special_char( $icon_boxes_num ),
								'id' => '',
								'before' => '',
								'after' => '',
								'classes' => 'fieldCounter',
								'extra_atr' => '',
								'cust_id' => '',
								'cust_name' => 'icon_boxes_num[]',
								'return' => false,
								'required' => false
							);
							$mashup_var_form_fields->mashup_var_form_hidden_render( $mashup_opt_array );
							?>

						</div>
						<div class="wrapptabbox cs-pbwp-content cs-zero-padding">
							<div class="opt-conts">
								<ul class="form-elements">
									<li class="to-field"> <a href="javascript:void(0);" class="add_icon_boxesss cs-main-btn" onclick="mashup_shortcode_element_ajax_call('icon_box', 'shortcode-item-<?php echo mashup_allow_special_char( $mashup_counter ); ?>', '<?php echo admin_url( 'admin-ajax.php' ); ?>')"><i class="icon-plus-circle"></i><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_icon_box_add' ) ); ?></a> </li>
									<div id="loading" class="shortcodeload"></div>
								</ul>
								<?php if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) { ?>
									<ul class="form-elements insert-bg noborder">
										<li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:mashup_shortcode_insert_editor('<?php echo str_replace( 'mashup_var_page_builder_', '', $name ); ?>', 'shortcode-item-<?php echo mashup_allow_special_char( $mashup_counter ); ?>', '<?php echo mashup_allow_special_char( $filter_element ); ?>')" ><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_insert' ) ); ?></a> </li>
									</ul>
									<div id="results-shortocde"></div>
								<?php } else { ?>


									<?php
									$mashup_opt_array = array(
										'std' => 'icon_box',
										'id' => '',
										'before' => '',
										'after' => '',
										'classes' => '',
										'extra_atr' => '',
										'cust_id' => 'mashup_orderby' . $mashup_counter,
										'cust_name' => 'mashup_orderby[]',
										'return' => false,
										'required' => false
									);
									$mashup_var_form_fields->mashup_var_form_hidden_render( $mashup_opt_array );

									$mashup_opt_array = array(
										'name' => '',
										'desc' => '',
										'hint_text' => '',
										'echo' => true,
										'field_params' => array(
											'std' => mashup_var_theme_text_srt( 'mashup_var_save' ),
											'cust_id' => 'icon_boxes_save' . $mashup_counter,
											'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
											'cust_type' => 'button',
											'classes' => 'cs-mashup-admin-btn',
											'cust_name' => 'icon_boxes_save',
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

	add_action( 'wp_ajax_mashup_var_page_builder_icon_box', 'mashup_var_page_builder_icon_box' );
}

if ( !function_exists( 'mashup_save_page_builder_data_icon_box_callback' ) ) {

	/**
	 * Save data for icon_box shortcode.
	 *
	 * @param	array $args
	 * @return	array
	 */
	function mashup_save_page_builder_data_icon_box_callback( $args ) {

		$data = $args['data'];
		$counters = $args['counters'];
		$widget_type = $args['widget_type'];
		$column = $args['column'];
		if ( $widget_type == "icon_box" ) {
			$shortcode = $shortcode_item = '';
			$icon_boxes = $column->addChild( 'icon_box' );
			$icon_boxes->addChild( 'page_element_size', htmlspecialchars( $data['icon_box_element_size'][$counters['mashup_global_counter_icon_boxes']] ) );
			$icon_boxes->addChild( 'icon_box_element_size', htmlspecialchars( $data['icon_box_element_size'][$counters['mashup_global_counter_icon_boxes']] ) );
			if ( isset( $data['mashup_widget_element_num'][$counters['mashup_counter']] ) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode' ) {
				$shortcode_str = stripslashes( $data['shortcode']['icon_box'][$counters['mashup_shortcode_counter_icon_boxes']] );
				$counters['mashup_shortcode_counter_icon_boxes'] ++;
				$icon_boxes->addChild( 'mashup_shortcode', htmlspecialchars( $shortcode_str, ENT_QUOTES ) );
			} else {
				if ( isset( $data['icon_boxes_num'][$counters['mashup_counter_icon_boxes']] ) && $data['icon_boxes_num'][$counters['mashup_counter_icon_boxes']] > 0 ) {
					for ( $i = 1; $i <= $data['icon_boxes_num'][$counters['mashup_counter_icon_boxes']]; $i ++ ) {
						$shortcode_item .= '[icon_boxes_item ';
						if ( isset( $data['mashup_var_icon_box_view'][$counters['mashup_counter_icon_boxes_node']] ) && $data['mashup_var_icon_box_view'][$counters['mashup_counter_icon_boxes_node']] != '' ) {
							$shortcode_item .= 'mashup_var_icon_box_view="' . htmlspecialchars( $data['mashup_var_icon_box_view'][$counters['mashup_counter_icon_boxes_node']], ENT_QUOTES ) . '" ';
						}
						if ( isset( $data['mashup_var_icon_box_title'][$counters['mashup_counter_icon_boxes_node']] ) && $data['mashup_var_icon_box_title'][$counters['mashup_counter_icon_boxes_node']] != '' ) {
							$shortcode_item .= 'mashup_var_icon_box_title="' . htmlspecialchars( $data['mashup_var_icon_box_title'][$counters['mashup_counter_icon_boxes_node']], ENT_QUOTES ) . '" ';
						}
						if ( isset( $data['mashup_var_link_url'][$counters['mashup_counter_icon_boxes_node']] ) && $data['mashup_var_link_url'][$counters['mashup_counter_icon_boxes_node']] != '' ) {
							$shortcode_item .= 'mashup_var_link_url="' . htmlspecialchars( $data['mashup_var_link_url'][$counters['mashup_counter_icon_boxes_node']], ENT_QUOTES ) . '" ';
						}
						if ( isset( $data['mashup_var_icon_boxes_icon'][$counters['mashup_counter_icon_boxes_node']] ) && $data['mashup_var_icon_boxes_icon'][$counters['mashup_counter_icon_boxes_node']] != '' ) {
							$shortcode_item .= 'mashup_var_icon_boxes_icon="' . htmlspecialchars( $data['mashup_var_icon_boxes_icon'][$counters['mashup_counter_icon_boxes_node']], ENT_QUOTES ) . '" ';
						}
						if ( isset( $data['mashup_var_icon_box_icon_type'][$counters['mashup_counter_icon_boxes_node']] ) && $data['mashup_var_icon_box_icon_type'][$counters['mashup_counter_icon_boxes_node']] != '' ) {
							$shortcode_item .= 'mashup_var_icon_box_icon_type="' . htmlspecialchars( $data['mashup_var_icon_box_icon_type'][$counters['mashup_counter_icon_boxes_node']], ENT_QUOTES ) . '" ';
						}
						if ( isset( $data['mashup_var_icon_box_image'][$counters['mashup_counter_icon_boxes_node']] ) && $data['mashup_var_icon_box_image'][$counters['mashup_counter_icon_boxes_node']] != '' ) {
							$shortcode_item .= 'mashup_var_icon_box_image="' . htmlspecialchars( $data['mashup_var_icon_box_image'][$counters['mashup_counter_icon_boxes_node']], ENT_QUOTES ) . '" ';
						}
						$shortcode_item .= ']';
						if ( isset( $data['mashup_var_icon_boxes_text'][$counters['mashup_counter_icon_boxes_node']] ) && $data['mashup_var_icon_boxes_text'][$counters['mashup_counter_icon_boxes_node']] != '' ) {
							$shortcode_item .= htmlspecialchars( $data['mashup_var_icon_boxes_text'][$counters['mashup_counter_icon_boxes_node']], ENT_QUOTES );
						}
						$shortcode_item .= '[/icon_boxes_item]';
						$counters['mashup_counter_icon_boxes_node'] ++;
					}
				}
				$section_title = '';
				if ( isset( $data['mashup_var_icon_boxes_title'][$counters['mashup_counter_icon_boxes']] ) && $data['mashup_var_icon_boxes_title'][$counters['mashup_counter_icon_boxes']] != '' ) {
					$section_title .= 'mashup_var_icon_boxes_title="' . htmlspecialchars( $data['mashup_var_icon_boxes_title'][$counters['mashup_counter_icon_boxes']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_var_icon_box_sub_title'][$counters['mashup_counter_icon_boxes']] ) && $data['mashup_var_icon_box_sub_title'][$counters['mashup_counter_icon_boxes']] != '' ) {
					$section_title .= 'mashup_var_icon_box_sub_title="' . htmlspecialchars( $data['mashup_var_icon_box_sub_title'][$counters['mashup_counter_icon_boxes']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_var_icon_box_element_align'][$counters['mashup_counter_icon_boxes']] ) && $data['mashup_var_icon_box_element_align'][$counters['mashup_counter_icon_boxes']] != '' ) {
					$section_title .= 'mashup_var_icon_box_element_align="' . htmlspecialchars( $data['mashup_var_icon_box_element_align'][$counters['mashup_counter_icon_boxes']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_title_color'][$counters['mashup_counter_icon_boxes']] ) && $data['mashup_title_color'][$counters['mashup_counter_icon_boxes']] != '' ) {
					$section_title .= 'mashup_title_color="' . htmlspecialchars( $data['mashup_title_color'][$counters['mashup_counter_icon_boxes']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_icon_box_content_color'][$counters['mashup_counter_icon_boxes']] ) && $data['mashup_icon_box_content_color'][$counters['mashup_counter_icon_boxes']] != '' ) {
					$section_title .= 'mashup_icon_box_content_color="' . htmlspecialchars( $data['mashup_icon_box_content_color'][$counters['mashup_counter_icon_boxes']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_icon_box_icon_color'][$counters['mashup_counter_icon_boxes']] ) && $data['mashup_icon_box_icon_color'][$counters['mashup_counter_icon_boxes']] != '' ) {
					$section_title .= 'mashup_icon_box_icon_color="' . htmlspecialchars( $data['mashup_icon_box_icon_color'][$counters['mashup_counter_icon_boxes']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_var_icon_box_icon_size'][$counters['mashup_counter_icon_boxes']] ) && $data['mashup_var_icon_box_icon_size'][$counters['mashup_counter_icon_boxes']] != '' ) {
					$section_title .= 'mashup_var_icon_box_icon_size="' . htmlspecialchars( $data['mashup_var_icon_box_icon_size'][$counters['mashup_counter_icon_boxes']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_var_icon_box_view'][$counters['mashup_counter_icon_boxes']] ) && $data['mashup_var_icon_box_view'][$counters['mashup_counter_icon_boxes']] != '' ) {
					$section_title .= 'mashup_var_icon_box_view="' . htmlspecialchars( $data['mashup_var_icon_box_view'][$counters['mashup_counter_icon_boxes']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_icon_box_content_align'][$counters['mashup_counter_icon_boxes']] ) && $data['mashup_icon_box_content_align'][$counters['mashup_counter_icon_boxes']] != '' ) {
					$section_title .= 'mashup_icon_box_content_align="' . htmlspecialchars( $data['mashup_icon_box_content_align'][$counters['mashup_counter_icon_boxes']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_var_icon_boxes_sub_title'][$counters['mashup_counter_icon_boxes']] ) && $data['mashup_var_icon_boxes_sub_title'][$counters['mashup_counter_icon_boxes']] != '' ) {
					$section_title .= 'mashup_var_icon_boxes_sub_title="' . htmlspecialchars( str_replace( '"', '\'', mashup_custom_shortcode_encode( $data['mashup_var_icon_boxes_sub_title'][$counters['mashup_counter_icon_boxes']] ) ) ) . '" ';
				}
				if ( isset( $data['mashup_var_icon_box_column'][$counters['mashup_counter_icon_boxes']] ) && $data['mashup_var_icon_box_column'][$counters['mashup_counter_icon_boxes']] != '' ) {
					$section_title .= 'mashup_var_icon_box_column="' . htmlspecialchars( $data['mashup_var_icon_box_column'][$counters['mashup_counter_icon_boxes']], ENT_QUOTES ) . '" ';
				}
				$shortcode = '[icon_box ' . $section_title . ' ]' . $shortcode_item . '[/icon_box]';
				$icon_boxes->addChild( 'mashup_shortcode', $shortcode );
				$counters['mashup_counter_icon_boxes'] ++;
			}
			$counters['mashup_global_counter_icon_boxes'] ++;
		}
		return array(
			'data' => $data,
			'counters' => $counters,
			'widget_type' => $widget_type,
			'column' => $column,
		);
	}

	add_filter( 'mashup_save_page_builder_data', 'mashup_save_page_builder_data_icon_box_callback' );
}

if ( !function_exists( 'mashup_load_shortcode_counters_icon_box_callback' ) ) {

	/**
	 * Populate spacer shortcode counter variables.
	 *
	 * @param	array $counters
	 * @return	array
	 */
	function mashup_load_shortcode_counters_icon_box_callback( $counters ) {
		$counters['mashup_counter_icon_boxes'] = 0;
		$counters['mashup_counter_icon_boxes_node'] = 0;
		$counters['mashup_shortcode_counter_icon_boxes'] = 0;
		$counters['mashup_global_counter_icon_boxes'] = 0;
		return $counters;
	}

	add_filter( 'mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_icon_box_callback' );
}

if ( !function_exists( 'mashup_shortcode_names_list_populate_icon_box_callback' ) ) {

	/**
	 * Populate icon box shortcode names list.
	 *
	 * @param	array $counters
	 * @return	array
	 */
	function mashup_shortcode_names_list_populate_icon_box_callback( $shortcode_array ) {
		$shortcode_array['icon_box'] = array(
			'title' => mashup_var_frame_text_srt( 'mashup_var_icon_boxs_title' ),
			'name' => 'icon_box',
			'icon' => 'icon-database2',
			'categories' => 'loops',
		);
		return $shortcode_array;
	}

	add_filter( 'mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_icon_box_callback' );
}

if ( !function_exists( 'mashup_element_list_populate_icon_box_callback' ) ) {

	/**
	 * Populate icon box shortcode strings list.
	 *
	 * @param	array $counters
	 * @return	array
	 */
	function mashup_element_list_populate_icon_box_callback( $element_list ) {
		$element_list['icon_box'] = mashup_var_frame_text_srt( 'mashup_var_icon_boxs_title' );
		return $element_list;
	}

	add_filter( 'mashup_element_list_populate', 'mashup_element_list_populate_icon_box_callback' );
}

if ( !function_exists( 'mashup_shortcode_sub_element_ui_icon_box_callback' ) ) {

	/**
	 * Render UI for sub element in icon box settings.
	 *
	 * @param	array $args
	 */
	function mashup_shortcode_sub_element_ui_icon_box_callback( $args ) {
		$type = $args['type'];
		$mashup_var_html_fields = $args['html_fields'];

		if ( $type == 'icon_box' ) {
			$icon_boxes_count = 'icon_boxes_' . rand( 455345, 23454390 );
			if ( isset( $mashup_var_icon_boxes_text ) && $mashup_var_icon_boxes_text != '' ) {
				$mashup_var_icon_boxes_text = $mashup_var_icon_boxes_text;
			} else {
				$mashup_var_icon_boxes_text = '';
			}
			?>
			<div class='cs-wrapp-clone cs-shortcode-wrapp' id="mashup_infobox_<?php echo mashup_allow_special_char( $icon_boxes_count ); ?>">
				<header>
					<h4><i class='icon-arrows'></i><?php echo esc_html( mashup_var_frame_text_srt( 'mashup_var_icon_boxs_title' ) ); ?></h4>
					<a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo esc_html( mashup_var_frame_text_srt( 'mashup_var_remove' ) ); ?></a>
				</header>
				<?php
				$mashup_opt_array = array(
					'name' => mashup_var_frame_text_srt( 'mashup_var_icon_boxes_content_title' ),
					'desc' => '',
					'hint_text' => mashup_var_frame_text_srt( 'mashup_var_icon_boxes_content_title_hint' ),
					'echo' => true,
					'field_params' => array(
						'std' => '',
						'cust_id' => 'mashup_var_icon_box_title',
						'classes' => '',
						'cust_name' => 'mashup_var_icon_box_title[]',
						'return' => true,
					),
				);

				$mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

				$mashup_opt_array = array(
					'name' => mashup_var_frame_text_srt( 'mashup_var_icon_boxes_link_url' ),
					'desc' => '',
					'hint_text' => mashup_var_frame_text_srt( 'mashup_var_icon_boxes_link_url_hint' ),
					'echo' => true,
					'field_params' => array(
						'std' => '',
						'cust_id' => 'mashup_var_link_url',
						'classes' => '',
						'cust_name' => 'mashup_var_link_url[]',
						'return' => true,
					),
				);
				$mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );


				$mashup_opt_array = array(
					'name' => mashup_var_frame_text_srt( 'mashup_var_icon_box_icon_type' ),
					'desc' => '',
					'hint_text' => mashup_var_frame_text_srt( 'mashup_var_icon_box_icon_type_hint' ),
					'echo' => true,
					'field_params' => array(
						'std' => '',
						'id' => 'mashup_var_icon_box_icon_type',
						'cust_name' => 'mashup_var_icon_box_icon_type[]',
						'classes' => 'dropdown chosen-select function-class',
						'options' => array(
							'icon' => mashup_var_frame_text_srt( 'mashup_var_icon_box_icon_type_1' ),
							'image' => mashup_var_frame_text_srt( 'mashup_var_icon_box_icon_type_2' ),
						),
						'return' => true,
					),
				);
				$mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
				$rand_id = rand( 123450, 854987 );
				?>	 				

				<div class="cs-sh-icon_box-image-area" style="display:none;">
					<?php
					$mashup_opt_array = array(
						'std' => '',
						'id' => 'icon_box_image_array',
						'main_id' => 'icon_box_image_array',
						'name' => mashup_var_frame_text_srt( 'mashup_var_icon_box_image' ),
						'desc' => '',
						'hint_text' => mashup_var_frame_text_srt( 'mashup_var_icon_box_image_hint' ),
						'echo' => true,
						'array' => true,
						'field_params' => array(
							'std' => '',
							'cust_id' => '',
							'cust_name' => 'mashup_var_icon_box_image[]',
							'id' => 'icon_box_image_array',
							'return' => true,
							'array' => true,
						),
					);
					$mashup_var_html_fields->mashup_var_upload_file_field( $mashup_opt_array );

					$rand_id = rand( 1111111, 9999999 );
					?>
				</div>
				<div class="cs-sh-icon_box-icon-area" style="display:block;">
					<div class="form-elements" id="<?php echo esc_attr( $rand_id ); ?>">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<label><?php echo esc_html( mashup_var_frame_text_srt( 'mashup_var_icon_boxes_Icon' ) ); ?></label>
							<?php
							if ( function_exists( 'mashup_var_tooltip_helptext' ) ) {
								echo mashup_var_tooltip_helptext( mashup_var_frame_text_srt( 'mashup_var_icon_boxes_Icon_hint' ) );
							}
							?>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
							<?php echo mashup_var_icomoon_icons_box( '', $rand_id, 'mashup_var_icon_boxes_icon' ); ?>
						</div>
					</div>

				</div>
				<?php
				$mashup_opt_array = array(
					'name' => mashup_var_frame_text_srt( 'mashup_var_icon_boxes_text' ),
					'desc' => '',
					'hint_text' => mashup_var_frame_text_srt( 'mashup_var_icon_boxes_text_hint' ),
					'echo' => true,
					'field_params' => array(
						'std' => '',
						'cust_id' => '',
						'cust_name' => 'mashup_var_icon_boxes_text[]',
						'return' => true,
						'extra_atr' => 'data-content-text="cs-shortcode-textarea"',
						'classes' => '',
						'mashup_editor' => true,
					),
				);

				$mashup_var_html_fields->mashup_var_textarea_field( $mashup_opt_array );
				?>
			</div>
			<script type="text/javascript">
				jQuery('.function-class').change(function ($) {
					var value = jQuery(this).val();

					var parentNode = jQuery(this).parent().parent().parent();
					if (value == 'image') {
						parentNode.find(".cs-sh-icon_box-image-area").show();
						parentNode.find(".cs-sh-icon_box-icon-area").hide();
					} else {
						parentNode.find(".cs-sh-icon_box-image-area").hide();
						parentNode.find(".cs-sh-icon_box-icon-area").show();
					}

				}
				);
			</script>
			<?php
		}
	}

	add_action( 'mashup_shortcode_sub_element_ui', 'mashup_shortcode_sub_element_ui_icon_box_callback' );
}