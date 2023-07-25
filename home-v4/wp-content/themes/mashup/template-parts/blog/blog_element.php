<?php
/*
 *
 * @File : blog
 * @retrun
 *
 */
if ( !function_exists( 'mashup_var_page_builder_blog' ) ) {

	function mashup_var_page_builder_blog( $die = 0 ) {
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
		if ( isset( $_POST['action'] ) && !isset( $_POST['shortcode_element_id'] ) ) {
			$POSTID = '';
			$shortcode_element_id = '';
		} else {
			$POSTID = $_POST['POSTID'];
			$shortcode_element_id = $_POST['shortcode_element_id'];
			$shortcode_str = stripslashes( $shortcode_element_id );
			$PREFIX = 'mashup_blog';
			$parseObject = new ShortcodeParse();
			$output = $parseObject->mashup_shortcodes( $output, $shortcode_str, true, $PREFIX );
		}
		$defaults = array(
			'mashup_blog_element_title' => '',
			'mashup_blog_view' => 'view1',
			'mashup_blog_cat' => '',
			'mashup_blog_cat' => '',
			'mashup_blog_order_by' => 'ID',
			'mashup_blog_order_by_dir' => 'DESC',
			'mashup_blog_description' => 'yes',
			'mashup_blog_filterable' => '',
			'mashup_blog_excerpt' => '30',
			'mashup_blog_posts_title_length' => '',
			'mashup_blog_num_post' => '5',
			'blog_pagination' => '',
			'mashup_blog_class' => '',
			'mashup_blog_size' => '',
			'mashup_var_blog_sub_title' => '',
			'mashup_var_blog_align' => '',
		);
		if ( isset( $output['0']['atts'] ) ) {
			$atts = $output['0']['atts'];
		} else {
			$atts = array();
		}
		$blog_element_size = '50';
		foreach ( $defaults as $key => $values ) {
			if ( isset( $atts[$key] ) ) {
				$$key = $atts[$key];
			} else {
				$$key = $values;
			}
		}
		$name = 'blog';
		$coloumn_class = 'column_' . $blog_element_size;
		if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
			$shortcode_element = 'shortcode_element_class';
			$shortcode_view = 'cs-pbwp-shortcode';
			$filter_element = 'ajax-drag';
			$coloumn_class = '';
		}
		$mashup_rand_id = rand( 13441324, 93441324 );
		?>
		<div id="<?php echo esc_attr( $name . $mashup_counter ); ?>_del" class="column  parentdelete <?php echo esc_attr( $coloumn_class ); ?> <?php echo esc_attr( $shortcode_view ); ?>" item="blog" data="<?php echo mashup_element_size_data_array_index( $blog_element_size ) ?>">
			<?php mashup_element_setting( $name, $mashup_counter, $blog_element_size ); ?>
			<div class="cs-wrapp-class-<?php echo intval( $mashup_counter ) ?> <?php echo esc_attr( $shortcode_element ); ?>" id="<?php echo esc_attr( $name . $mashup_counter ) ?>" data-shortcode-template="[mashup_blog {{attributes}}]"  style="display: none;">
				<div class="cs-heading-area">
					<h5><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_edit_blog_items' ) ); ?></h5>
					<a href="javascript:mashup_frame_removeoverlay('<?php echo esc_js( $name . $mashup_counter ); ?>','<?php echo esc_js( $filter_element ); ?>')" class="cs-btnclose"><i class="icon-cancel"></i></a>
				</div>
				<div class="cs-pbwp-content">
					<div class="cs-wrapp-clone cs-shortcode-wrapp">
						<?php
						if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
							mashup_shortcode_element_size();
						}
						?>
						<?php
						$mashup_opt_array = array(
							'name' => mashup_var_theme_text_srt( 'mashup_var_element_title' ),
							'desc' => '',
							'hint_text' => mashup_var_theme_text_srt( 'mashup_var_element_title_hint' ),
							'echo' => true,
							'field_params' => array(
								'std' => esc_attr( $mashup_blog_element_title ),
								'cust_id' => '',
								'cust_name' => 'mashup_blog_element_title[]',
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
								'std' => mashup_allow_special_char( $mashup_var_blog_sub_title ),
								'id' => 'mashup_var_blog_sub_title',
								'cust_name' => 'mashup_var_blog_sub_title[]',
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
								'std' => $mashup_var_blog_align,
								'id' => '',
								'cust_id' => '',
								'cust_name' => 'mashup_var_blog_align[]',
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



						$a_options = array();
						$mashup_blog_cat = isset( $mashup_blog_cat ) ? $mashup_blog_cat : '';
						if ( '' != $mashup_blog_cat ) {
							$mashup_blog_cat = explode( ',', $mashup_blog_cat );
						}
						$a_options = mashup_show_all_cats( '', '', $mashup_blog_cat, "category", true );
						$mashup_opt_array = array(
							'name' => mashup_var_theme_text_srt( 'mashup_var_choose_category' ),
							'desc' => '',
							'hint_text' => mashup_var_theme_text_srt( 'mashup_var_blog_cat_hint' ),
							'echo' => true,
							'multi' => true,
							'field_params' => array(
								'std' => $mashup_blog_cat,
								'id' => '',
								'cust_name' => 'mashup_blog_cat[' . $mashup_rand_id . '][]',
								'classes' => 'dropdown chosen-select',
								'options' => $a_options,
								'return' => true,
							),
						);

						$mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );

						$rand = rand( 12345678, 93242432 );
						$imageurl = get_template_directory_uri() . '/assets/backend/images/views/blog-listings/';

						$mashup_opt_array = array(
							'name' => mashup_var_theme_text_srt( 'mashup_var_blog_design_views' ),
							'desc' => '',
							'hint_text' => mashup_var_theme_text_srt( 'mashup_var_blog_design_views_hint' ),
							'echo' => true,
							'field_params' => array(
								'std' => $mashup_blog_view,
								'id' => '',
								'cust_name' => 'mashup_blog_view[]',
								'classes' => 'dropdown chosen-select',
								'extra_atr' => " onchange=mashup_change_preview_image(this.value,'mashup-blog-views-preview-image-" . $rand . "','" . $imageurl . "','" . $rand . "')",
								'options' => array(
									'view1' => mashup_var_theme_text_srt( 'mashup_var_blog_design_view1' ),
									'view2' => mashup_var_theme_text_srt( 'mashup_var_blog_design_view2' ),
								),
								'return' => true,
							),
						);
						$mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );

						echo '<div id="mashup-blog-views-preview-image-' . $rand . '" class="form-elements">';
						echo '<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right for-img">';
						echo '<div class="img-holder">';
						echo '<figure>';
						echo '<a href="' . esc_url( $imageurl . $mashup_blog_view ) . '.jpg" class="thumbnail" title="' . $mashup_blog_view . '"><img src="' . esc_url( $imageurl . $mashup_blog_view ) . '.jpg" alt="' . $mashup_blog_view . '"></a>';
						echo '</figure>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
						?>
						<div id="Blog-listing<?php echo intval( $mashup_counter ); ?>" >
							<?php
							$mashup_opt_array = array(
								'name' => mashup_var_theme_text_srt( 'mashup_var_blog_col' ),
								'desc' => '',
								'hint_text' => mashup_var_theme_text_srt( 'mashup_var_blog_col_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => $mashup_blog_size,
									'id' => '',
									'cust_name' => 'mashup_blog_size[]',
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

							$options = array(
								'id' => mashup_var_theme_text_srt( 'mashup_var_blog_views_widget_order_by_id' ),
								'date' => mashup_var_theme_text_srt( 'mashup_var_blog_views_widget_order_by_date' ),
								'title' => mashup_var_theme_text_srt( 'mashup_var_blog_views_widget_order_by_title' ),
							);
							$options = apply_filters( 'posts_order_by_options', $options );
							$mashup_opt_array = array(
								'name' => mashup_var_theme_text_srt( 'mashup_var_blog_views_widget_order_by' ),
								'desc' => '',
								'hint_text' => mashup_var_theme_text_srt( 'mashup_var_blog_post_order_hint' ),
								'echo' => true,
								'field_params' => array(
									'options' => $options,
									'std' => esc_attr( $mashup_blog_order_by ),
									'id' => '',
									'classes' => 'dropdown chosen-select',
									'cust_id' => '',
									'cust_name' => 'mashup_var_post_order_by[]',
									'return' => true,
									'required' => false,
								),
							);
							$mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );

							$mashup_opt_array = array(
								'name' => mashup_var_theme_text_srt( 'mashup_var_blog_post_order' ),
								'desc' => '',
								'hint_text' => mashup_var_theme_text_srt( 'mashup_var_blog_post_order_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => $mashup_blog_order_by_dir,
									'id' => '',
									'cust_name' => 'mashup_blog_order_by_dir[]',
									'classes' => 'dropdown chosen-select',
									'options' => array(
										'ASC' => mashup_var_theme_text_srt( 'mashup_var_blog_asc' ),
										'DESC' => mashup_var_theme_text_srt( 'mashup_var_blog_desc' ),
									),
									'return' => true,
								),
							);

							$mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );

							$mashup_opt_array = array(
								'name' => mashup_var_theme_text_srt( 'mashup_var_post_description' ),
								'desc' => '',
								'hint_text' => mashup_var_theme_text_srt( 'mashup_var_post_description_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => $mashup_blog_description,
									'id' => '',
									'cust_name' => 'mashup_blog_description[]',
									'classes' => 'dropdown chosen-select',
									'options' => array(
										'yes' => mashup_var_theme_text_srt( 'mashup_var_yes' ),
										'no' => mashup_var_theme_text_srt( 'mashup_var_no' ),
									),
									'return' => true,
								),
							);

							$mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );

							$mashup_opt_array = array(
								'name' => mashup_var_theme_text_srt( 'mashup_var_length_excerpt' ),
								'desc' => '',
								'hint_text' => mashup_var_theme_text_srt( 'mashup_var_length_excerpt_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $mashup_blog_excerpt ),
									'cust_id' => '',
									'classes' => 'txtfield',
									'cust_name' => 'mashup_blog_excerpt[]',
									'return' => true,
								),
							);

							$mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

							if ( !is_numeric( $mashup_blog_posts_title_length ) ) {
								$mashup_blog_posts_title_length = '';
							}

							$mashup_opt_array = array(
								'name' => mashup_var_theme_text_srt( 'mashup_var_element_post_title_length' ),
								'desc' => '',
								'hint_text' => mashup_var_theme_text_srt( 'mashup_var_element_post_title_length_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $mashup_blog_posts_title_length ),
									'cust_id' => '',
									'cust_name' => 'mashup_blog_posts_title_length[]',
									'return' => true,
								),
							);

							$mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
							?>
						</div>

						<?php
						$mashup_opt_array = array(
							'name' => mashup_var_theme_text_srt( 'mashup_var_post_per_page' ),
							'desc' => '',
							'hint_text' => mashup_var_theme_text_srt( 'mashup_var_post_per_page_hint' ),
							'echo' => true,
							'field_params' => array(
								'std' => esc_attr( $mashup_blog_num_post ),
								'cust_id' => '',
								'classes' => 'txtfield',
								'cust_name' => 'mashup_blog_num_post[]',
								'return' => true,
							),
						);

						$mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

						$filter_view1 = $filter_view2 = $filter_all_posts = '';
						$all_posts_blog_views = array( 'view11', 'view12', 'view13', 'view17', 'view19' );
						if ( 'view1' === $mashup_blog_view || '' === $mashup_blog_view ) {
							$filter_view1 = 'none';
							$filter_view2 = 'block';
							$filter_all_posts = 'none';
						} else if ( in_array( $mashup_blog_view, $all_posts_blog_views ) ) {
							$filter_view1 = 'none';
							$filter_view2 = 'none';
							$filter_all_posts = 'block';
						} else {
							$filter_view1 = 'block';
							$filter_view2 = 'none';
							$filter_all_posts = 'none';
						}

						//// Pagination Field
						$mashup_opt_array = array(
							'name' => mashup_var_theme_text_srt( 'mashup_var_blog_pagination' ),
							'desc' => '',
							'hint_text' => mashup_var_theme_text_srt( 'mashup_var_blog_pagination_hint' ),
							'echo' => true,
							'field_params' => array(
								'std' => $blog_pagination,
								'id' => '',
								'cust_name' => 'blog_pagination[]',
								'classes' => 'dropdown chosen-select',
								'options' => array(
									'yes' => mashup_var_theme_text_srt( 'mashup_var_show_pagination' ),
									'load_more' => mashup_var_theme_text_srt( 'mashup_var_show_load_more' ),
									'no' => mashup_var_theme_text_srt( 'mashup_var_single_page' ),
								),
								'return' => true,
							),
						);
						$mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );


						//// All Posts Field
						echo '<div id="filter_all_records_' . $rand . '" style="display:' . $filter_all_posts . ';">';
						$mashup_opt_array = array(
							'name' => mashup_var_theme_text_srt( 'mashup_var_blog_all_posts' ),
							'desc' => '',
							'hint_text' => '',
							'echo' => true,
							'field_params' => array(
								'std' => $mashup_blog_all_posts,
								'id' => '',
								'cust_name' => 'mashup_blog_all_posts[]',
								'classes' => 'dropdown chosen-select',
								'options' => array(
									'all' => mashup_var_theme_text_srt( 'mashup_var_blog_all_posts' ),
								),
								'return' => true,
							),
						);
						$mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
						echo '</div>';
						?>

						<?php if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) { ?>
							<ul class="form-elements insert-bg">
								<li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:mashup_shortcode_insert_editor('<?php echo esc_js( str_replace( 'mashup_', '', $name ) ); ?>', '<?php echo esc_js( $name . $mashup_counter ) ?>', '<?php echo esc_js( $filter_element ); ?>')" ><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_insert' ) ); ?></a> </li>
							</ul>
							<div id="results-shortocde"></div>
						<?php } else { ?>
							<?php
							$mashup_opt_array = array(
								'std' => 'blog',
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
								'cust_name' => "mashup_blog_id[]",
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

	add_action( 'wp_ajax_mashup_var_page_builder_blog', 'mashup_var_page_builder_blog' );
}
if ( !function_exists( 'mashup_save_page_builder_data_blog_callback' ) ) {

	/**
	 * Save data for blog shortcode.
	 *
	 * @param	array $args
	 * @return	array
	 */
	function mashup_save_page_builder_data_blog_callback( $args ) {

		$data = $args['data'];
		$counters = $args['counters'];
		$widget_type = $args['widget_type'];
		$column = $args['column'];
		if ( $widget_type == "blog" ) {
			$mashup_var_blog = '';
			$blog = $column->addChild( 'blog' );
			$blog->addChild( 'page_element_size', htmlspecialchars( $data['blog_element_size'][$counters['mashup_global_counter_blog']] ) );
			$blog->addChild( 'blog_element_size', htmlspecialchars( $data['blog_element_size'][$counters['mashup_global_counter_blog']] ) );
			if ( isset( $data['mashup_widget_element_num'][$counters['mashup_counter']] ) && $data['mashup_widget_element_num'][$counters['mashup_counter']] == 'shortcode' ) {
				$shortcode_str = stripslashes( htmlspecialchars( ( $data['shortcode']['blog'][$counters['mashup_shortcode_counter_blog']] ), ENT_QUOTES ) );
				$counters['mashup_shortcode_counter_blog'] ++;
				$blog->addChild( 'mashup_shortcode', htmlspecialchars( $shortcode_str, ENT_QUOTES ) );
			} else {
				$mashup_var_blog = '[mashup_blog ';
				if ( isset( $data['mashup_blog_element_title'][$counters['mashup_counter_blog']] ) && $data['mashup_blog_element_title'][$counters['mashup_counter_blog']] != '' ) {
					$mashup_var_blog .= 'mashup_blog_element_title="' . htmlspecialchars( $data['mashup_blog_element_title'][$counters['mashup_counter_blog']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_var_blog_sub_title'][$counters['mashup_counter_blog']] ) && $data['mashup_var_blog_sub_title'][$counters['mashup_counter_blog']] != '' ) {
					$mashup_var_blog .= 'mashup_var_blog_sub_title="' . htmlspecialchars( $data['mashup_var_blog_sub_title'][$counters['mashup_counter_blog']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_var_blog_align'][$counters['mashup_counter_blog']] ) && $data['mashup_var_blog_align'][$counters['mashup_counter_blog']] != '' ) {
					$mashup_var_blog .= 'mashup_var_blog_align="' . htmlspecialchars( $data['mashup_var_blog_align'][$counters['mashup_counter_blog']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_blog_posts_title_length'][$counters['mashup_counter_blog']] ) && $data['mashup_blog_posts_title_length'][$counters['mashup_counter_blog']] != '' ) {
					$mashup_var_blog .= 'mashup_blog_posts_title_length="' . htmlspecialchars( $data['mashup_blog_posts_title_length'][$counters['mashup_counter_blog']], ENT_QUOTES ) . '" ';
				}

				if ( isset( $data['mashup_blog_id'][$counters['mashup_counter_blog']] ) && $data['mashup_blog_id'][$counters['mashup_counter_blog']] != '' ) {
					$mashup_blog_id = $data['mashup_blog_id'][$counters['mashup_counter_blog']];

					if ( isset( $_POST['mashup_blog_cat'][$mashup_blog_id] ) && $_POST['mashup_blog_cat'][$mashup_blog_id] != '' ) {

						if ( is_array( $_POST['mashup_blog_cat'][$mashup_blog_id] ) ) {

							$mashup_var_blog .= ' mashup_blog_cat="' . implode( ',', $_POST['mashup_blog_cat'][$mashup_blog_id] ) . '" ';
						}
					}
				}
				if ( isset( $data['mashup_var_post_order_by'][$counters['mashup_counter_blog']] ) && $data['mashup_var_post_order_by'][$counters['mashup_counter_blog']] != '' ) {
					$mashup_var_blog .= 'mashup_blog_order_by="' . htmlspecialchars( $data['mashup_var_post_order_by'][$counters['mashup_counter_blog']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_blog_order_by_dir'][$counters['mashup_counter_blog']] ) && $data['mashup_blog_order_by_dir'][$counters['mashup_counter_blog']] != '' ) {
					$mashup_var_blog .= 'mashup_blog_order_by_dir="' . htmlspecialchars( $data['mashup_blog_order_by_dir'][$counters['mashup_counter_blog']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['orderby'][$counters['mashup_counter_blog']] ) && $data['orderby'][$counters['mashup_counter_blog']] != '' ) {
					$mashup_var_blog .= 'orderby="' . htmlspecialchars( $data['orderby'][$counters['mashup_counter_blog']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_blog_description'][$counters['mashup_counter_blog']] ) && $data['mashup_blog_description'][$counters['mashup_counter_blog']] != '' ) {
					$mashup_var_blog .= 'mashup_blog_description="' . htmlspecialchars( $data['mashup_blog_description'][$counters['mashup_counter_blog']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_blog_filterable'][$counters['mashup_counter_blog']] ) && $data['mashup_blog_filterable'][$counters['mashup_counter_blog']] != '' ) {
					$mashup_var_blog .= 'mashup_blog_filterable="' . htmlspecialchars( $data['mashup_blog_filterable'][$counters['mashup_counter_blog']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_blog_excerpt'][$counters['mashup_counter_blog']] ) && $data['mashup_blog_excerpt'][$counters['mashup_counter_blog']] != '' ) {
					$mashup_var_blog .= 'mashup_blog_excerpt="' . htmlspecialchars( $data['mashup_blog_excerpt'][$counters['mashup_counter_blog']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_blog_excerpt'][$counters['mashup_counter_blog']] ) && $data['mashup_blog_excerpt'][$counters['mashup_counter_blog']] != '' ) {
					$mashup_var_blog .= 'mashup_blog_excerpt="' . htmlspecialchars( $data['mashup_blog_excerpt'][$counters['mashup_counter_blog']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_blog_num_post'][$counters['mashup_counter_blog']] ) && $data['mashup_blog_num_post'][$counters['mashup_counter_blog']] != '' ) {
					$mashup_var_blog .= 'mashup_blog_num_post="' . htmlspecialchars( $data['mashup_blog_num_post'][$counters['mashup_counter_blog']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['blog_pagination'][$counters['mashup_counter_blog']] ) && $data['blog_pagination'][$counters['mashup_counter_blog']] != '' ) {
					$mashup_var_blog .= 'blog_pagination="' . htmlspecialchars( $data['blog_pagination'][$counters['mashup_counter_blog']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_blog_class'][$counters['mashup_counter_blog']] ) && $data['mashup_blog_class'][$counters['mashup_counter_blog']] != '' ) {
					$mashup_var_blog .= 'mashup_blog_class="' . htmlspecialchars( $data['mashup_blog_class'][$counters['mashup_counter_blog']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_blog_view'][$counters['mashup_counter_blog']] ) && $data['mashup_blog_view'][$counters['mashup_counter_blog']] != '' ) {
					$mashup_var_blog .= 'mashup_blog_view="' . htmlspecialchars( $data['mashup_blog_view'][$counters['mashup_counter_blog']], ENT_QUOTES ) . '" ';
				}
				if ( isset( $data['mashup_blog_size'][$counters['mashup_counter_blog']] ) && $data['mashup_blog_size'][$counters['mashup_counter_blog']] != '' ) {
					$mashup_var_blog .= 'mashup_blog_size="' . htmlspecialchars( $data['mashup_blog_size'][$counters['mashup_counter_blog']], ENT_QUOTES ) . '" ';
				}
				$mashup_var_blog .= ']';
				if ( isset( $data['blog_text'][$counters['mashup_counter_blog']] ) && $data['blog_text'][$counters['mashup_counter_blog']] != '' ) {
					$mashup_var_blog .= htmlspecialchars( $data['blog_text'][$counters['mashup_counter_blog']], ENT_QUOTES ) . ' ';
				}
				$mashup_var_blog .= '[/mashup_blog]';

				$blog->addChild( 'mashup_shortcode', $mashup_var_blog );
				$counters['mashup_counter_blog'] ++;
			}
			$counters['mashup_global_counter_blog'] ++;
		}
		return array(
			'data' => $data,
			'counters' => $counters,
			'widget_type' => $widget_type,
			'column' => $column,
		);
	}

	add_filter( 'mashup_save_page_builder_data', 'mashup_save_page_builder_data_blog_callback' );
}
if ( !function_exists( 'mashup_load_shortcode_counters_blog_callback' ) ) {

	/**
	 * Populate blog shortcode counter variables.
	 *
	 * @param	array $counters
	 * @return	array
	 */
	function mashup_load_shortcode_counters_blog_callback( $counters ) {
		$counters['mashup_global_counter_blog'] = 0;
		$counters['mashup_shortcode_counter_blog'] = 0;
		$counters['mashup_counter_blog'] = 0;
		return $counters;
	}

	add_filter( 'mashup_load_shortcode_counters', 'mashup_load_shortcode_counters_blog_callback' );
}
if ( !function_exists( 'mashup_shortcode_names_list_populate_blog_callback' ) ) {

	/**
	 * Populate blog shortcode names list.
	 *
	 * @param	array $counters
	 * @return	array
	 */
	function mashup_shortcode_names_list_populate_blog_callback( $shortcode_array ) {
		$shortcode_array['blog'] = array(
			'title' => mashup_var_frame_text_srt( 'mashup_var_blog' ),
			'name' => 'blog',
			'icon' => 'icon-support',
			'categories' => 'typography',
		);
		return $shortcode_array;
	}

	add_filter( 'mashup_shortcode_names_list_populate', 'mashup_shortcode_names_list_populate_blog_callback' );
}
if ( !function_exists( 'mashup_element_list_populate_blog_callback' ) ) {

	/**
	 * Populate blog shortcode strings list.
	 *
	 * @param	array $counters
	 * @return	array
	 */
	function mashup_element_list_populate_blog_callback( $element_list ) {
		$element_list['blog'] = mashup_var_frame_text_srt( 'mashup_var_blog' );
		return $element_list;
	}
	add_filter( 'mashup_element_list_populate', 'mashup_element_list_populate_blog_callback' );
}