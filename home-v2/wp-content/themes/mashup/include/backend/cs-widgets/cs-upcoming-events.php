<?php
/**
 * @Recent posts widget Class
 *
 *
 */
if ( !class_exists( 'mashup_upcoming' ) ) {

	class mashup_upcoming extends WP_Widget {

		/**
		 * @init Events posts Module
		 *
		 *
		 */
		public function __construct() {
			global $mashup_var_static_text;

			parent::__construct(
					'mashup_upcoming', // Base ID
					mashup_var_theme_text_srt( 'mashup_var_upcoming_events' ), // Name
					array( 'classname' => 'widget-upcoming-events', 'description' => mashup_var_theme_text_srt( 'mashup_var_upcoming_events_desc' ), ) // Args
			);
		}

		/**
		 * @Upcoming Upcoming Events posts html form
		 *
		 *
		 */
		function form( $instance ) {
			global $mashup_var_form_fields, $mashup_var_html_fields, $mashup_var_static_text;
			$strings = new mashup_theme_all_strings;
			$strings->mashup_short_code_strings();

			$instance = wp_parse_args( ( array ) $instance, array( 'title' => '' ) );
			$title = $instance['title'];
			$select_category = isset( $instance['select_category'] ) ? esc_attr( $instance['select_category'] ) : '';
			$showcount = isset( $instance['showcount'] ) ? esc_attr( $instance['showcount'] ) : '';

			$mashup_opt_array = array(
				'name' => mashup_var_theme_text_srt( 'mashup_var_title_field' ),
				'desc' => '',
				'hint_text' => '',
				'echo' => true,
				'field_params' => array(
					'std' => esc_attr( $title ),
					'id' => mashup_allow_special_char( $this->get_field_id( 'title' ) ),
					'classes' => '',
					'cust_id' => mashup_allow_special_char( $this->get_field_name( 'title' ) ),
					'cust_name' => mashup_allow_special_char( $this->get_field_name( 'title' ) ),
					'return' => true,
					'required' => false
				),
			);
			$mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
			if ( function_exists( 'mashup_show_all_cats' ) ) {
				$default_option = $cats_options = array();
				$default_option[''] = mashup_var_theme_text_srt( 'mashup_var_all_cats' ); 
				$cats_options = mashup_show_all_cats( '', '', mashup_allow_special_char( $this->get_field_id( 'select_category' ) ), 'event-category', true );
				$cats_options = array_merge($default_option, $cats_options);
				$mashup_opt_array = array(
					'name' => mashup_var_theme_text_srt( 'mashup_var_choose_category' ),
					'desc' => '',
					'hint_text' => '',
					'echo' => true,
					'field_params' => array(
						'std' => $select_category,
						'cust_name' => mashup_allow_special_char( $this->get_field_name( 'select_category' ) ),
						'cust_id' => mashup_allow_special_char( $this->get_field_id( 'select_category' ) ),
						'id' => '',
						'classes' => 'dropdown chosen-select',
						'options' => $cats_options,
						'return' => true,
					),
				);

				$mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
			}
			$mashup_opt_array = array(
				'name' => mashup_var_theme_text_srt( 'mashup_var_num_post' ),
				'desc' => '',
				'hint_text' => '',
				'echo' => true,
				'field_params' => array(
					'std' => esc_attr( $showcount ),
					'id' => mashup_allow_special_char( $this->get_field_id( 'showcount' ) ),
					'classes' => '',
					'cust_id' => mashup_allow_special_char( $this->get_field_name( 'showcount' ) ),
					'cust_name' => mashup_allow_special_char( $this->get_field_name( 'showcount' ) ),
					'return' => true,
					'required' => false
				),
			);
			$mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
			
			$mashup_inline_script = 'jQuery(document).ready(function ($) {
				chosen_selectionbox();
			});';
			mashup_admin_inline_enqueue_script( $mashup_inline_script, 'mashup-custom-functions' );
		}

		/**
		 * @Upcoming Events posts update form data
		 *
		 *
		 */
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = $new_instance['title'];
			$instance['select_category'] = $new_instance['select_category'];
			$instance['showcount'] = $new_instance['showcount'];
			return $instance;
		}

		/**
		 * @Display Upcoming Events posts widget
		 *
		 */
		function widget( $args, $instance ) {
			global $mashup_node, $wpdb, $post, $mashup_var_static_text;
			extract( $args, EXTR_SKIP );
			$title = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );
			$title = htmlspecialchars_decode( stripslashes( $title ) );
			$select_category = empty($instance['select_category']) ? '' : $instance['select_category'];
			$showcount = empty( $instance['showcount'] ) ? ' ' : apply_filters( 'widget_title', $instance['showcount'] );
			if ( $instance['showcount'] == "" ) {
				$instance['showcount'] = '-1';
			}
			echo '<div class="widget widget-upcoming-events">';
			if ( !empty( $title ) && $title <> ' ' ) {

				echo '<div class="widget-title">';
				echo '<h6 class="text-color">' . mashup_allow_special_char( $title ) . '</h6>';
				echo '</div>';
			}
			?>
			<ul class="widget-upcoming" >
				<?php
				$current_time = strtotime( current_time( 'd-m-Y H:i', $gmt = 0 ) );
				$meta_compare = '>=';
				
				if ( isset( $select_category ) && $select_category != '' ) {
					$args = array( 'post_type' => 'events',
						'posts_per_page' => $showcount,
						'meta_key' => 'date_time',
						'meta_value' => $current_time,
						'meta_compare' => $meta_compare,
						'orderby' => 'meta_value',
						'order' => 'ASC',
						'tax_query' => array(
							array(
								'taxonomy' => 'event-category',
								'field' => 'slug',
								'terms' => $select_category,
							),
						),
					);
				} else {
					$args = array( 'posts_per_page' => $showcount,
						'post_type' => 'events',
						'posts_per_page' => $showcount,
						'meta_key' => 'date_time',
						'meta_value' => $current_time,
						'meta_compare' => $meta_compare,
						'orderby' => 'meta_value',
						'order' => 'ASC',
					);
				}
				
				$title_limit = 4;
				$dateArray = '';
				$month_name = '';
				$event_location_city = $event_location_country = '';
				$custom_query = new WP_Query( $args );
				if ( $custom_query->have_posts() <> "" ) {
					while ( $custom_query->have_posts() ) : $custom_query->the_post();
						$mashup_post_id = get_the_ID();
						$event_from_date = get_post_meta( $mashup_post_id, 'mashup_var_event_from_date', true );
						$event_location_city = get_post_meta( $mashup_post_id, 'mashup_var_location_city', true );
						$event_location_country = get_post_meta( $mashup_post_id, 'mashup_var_location_country', true );
						
						$dateArray = date_parse_from_format( 'd-m-Y', $event_from_date );
						$month_name = ucfirst( strftime( "%b", strtotime( $event_from_date ) ) );
						?>
						<li>
							<div class="date"><span><?php echo esc_html($dateArray['day']); ?></span><i><?php echo esc_html( $month_name ); ?></i></div>
							<div class="text">
								<h6><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h6>
								<span><?php echo esc_html( $event_location_city ); ?> , <?php echo esc_html( $event_location_country ); ?> </span>
							</div>
						</li>    

						<?php
					endwhile;
					wp_reset_postdata();
				} else {
					echo '<p>' . esc_html( mashup_var_theme_text_srt( 'mashup_var_noresult_found' ) ) . '</p>';
				}
				?>
			</ul>
			<?php
			echo '</div>';
		}

	}

}
    add_action('widgets_init', function() {
        register_widget('mashup_upcoming');
    });

