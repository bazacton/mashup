<?php

/**
 * @Manage Columns
 * @return
 *
 */
if ( ! class_exists( 'post_type_event' ) ) {

	class post_type_event {

		// The Constructor
		public function __construct() {
			// Adding columns
			add_filter( 'manage_events_posts_columns', array( &$this, 'mashup_events_columns_add' ) );
			add_action( 'manage_events_posts_custom_column', array( &$this, 'mashup_events_columns' ), 10, 2 );
			add_action( 'init', array( &$this, 'mashup_events_register' ) );
			add_action( 'init', array( &$this, 'mashup_events_categories' ) );
			add_action( 'init', array( &$this, 'mashup_events_tags' ) );
		}

		function mashup_events_columns_add( $columns ) {
			$columns['category'] = mashup_var_frame_text_srt( 'mashup_var_events_categories' );
			$columns['start_date'] = mashup_var_frame_text_srt( 'mashup_var_event_start_date' );
			$columns['end_date'] = mashup_var_frame_text_srt( 'mashup_var_event_end_date' );
			$columns['timing'] = mashup_var_frame_text_srt( 'mashup_var_event_timing' );
			return $columns;
		}

		function mashup_events_columns( $name ) {
			global $post;
			switch ( $name ) {
				case 'category':
					$categories = get_the_terms( $post->ID, 'event-category' );
					if ( $categories <> "" ) {
						$couter_comma = 0;
						foreach ( $categories as $category ) {
							echo esc_attr( $category->name );
							$couter_comma ++;
							if ( $couter_comma < count( $categories ) ) {
								echo ", ";
							}
						}
					}
					break;
				case 'start_date':
					$from_date = get_post_meta( $post->ID, 'mashup_var_event_from_date', true );
					$from_date = date_i18n( get_option( 'date_format' ), strtotime( $from_date ) );
					echo esc_attr( $from_date );
					break;
				case 'end_date':
					$end_date = get_post_meta( $post->ID, 'mashup_var_event_to_date', true );
					$end_date = date_i18n( get_option( 'date_format' ), strtotime( $end_date ) );
					echo esc_attr( $end_date );
					break;
				case 'timing':
					$start_time = get_post_meta( $post->ID, 'mashup_var_event_start_time', true );
					$end_time = get_post_meta( $post->ID, 'mashup_var_event_end_time', true );
					$all_day = get_post_meta( $post->ID, 'mashup_var_event_all_day', true );

					$start_time = date_i18n( get_option( 'time_format' ), strtotime( $start_time ) );
					$end_time = date_i18n( get_option( 'time_format' ), strtotime( $end_time ) );

					if ( $all_day == 'on' ) {
						mashup_var_frame_text_srt( 'mashup_var_event_field_all_day' );
					} else if ( $start_time <> '' && $end_time <> '' ) {
						echo esc_attr( $start_time . ' - ' . $end_time );
					} else if ( $start_time <> '' && $end_time == '' ) {
						echo esc_attr( $start_time );
					} else {
						echo '-';
					}
					break;
			}
		}

		/**
		 * @Register Post Type
		 * @return
		 *
		 */
		function mashup_events_register() {
			$labels = array(
				'name' => mashup_var_frame_text_srt( 'mashup_var_events' ),
				'all_items' => mashup_var_frame_text_srt( 'mashup_var_events' ),
				'add_new_item' => mashup_var_frame_text_srt( 'mashup_var_add_new_event' ),
				'edit_item' => mashup_var_frame_text_srt( 'mashup_var_edit_event' ),
				'new_item' => mashup_var_frame_text_srt( 'mashup_var_new_event_item' ),
				'add_new' => mashup_var_frame_text_srt( 'mashup_var_add_new_event' ),
				'view_item' => mashup_var_frame_text_srt( 'mashup_var_view_events_item' ),
				'search_items' => mashup_var_frame_text_srt( 'mashup_var_search_events' ),
				'not_found' => mashup_var_frame_text_srt( 'mashup_var_nothing_found' ),
				'not_found_in_trash' => mashup_var_frame_text_srt( 'mashup_var_nothing_found_in_trash' ),
				'parent_item_colon' => ''
			);

			$args = array(
				'labels' => $labels,
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'query_var' => true,
				'menu_icon' => 'dashicons-book',
				'rewrite' => true,
				'capability_type' => 'post',
				'has_archive' => true,
				'map_meta_cap' => true,
				'hierarchical' => false,
				'menu_position' => null,
				'can_export' => true,
				'supports' => array( 'title', 'editor', 'thumbnail' )
			);
			register_post_type( 'events', $args );
		}

		/**
		 * @Register Categories
		 * @return
		 *
		 */
		function mashup_events_categories() {
			$labels = array(
				'name' => mashup_var_frame_text_srt( 'mashup_var_event_categories' ),
				'search_items' => mashup_var_frame_text_srt( 'mashup_var_search_event_categories' ),
				'edit_item' => mashup_var_frame_text_srt( 'mashup_var_edit_event_category' ),
				'update_item' => mashup_var_frame_text_srt( 'mashup_var_update_event_category' ),
				'add_new_item' => mashup_var_frame_text_srt( 'mashup_var_add_new_event_category' ),
				'menu_name' => mashup_var_frame_text_srt( 'mashup_var_events_categories' ),
			);
			register_taxonomy( 'event-category', array( 'events' ), array(
				'hierarchical' => true,
				'labels' => $labels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'event-category' ),
			) );
		}

		/**
		 * @Register Tags
		 * @return
		 *
		 */
		function mashup_events_tags() {
			$labels = array(
				'name' => mashup_var_frame_text_srt( 'mashup_var_event_tags' ),
				'singular_name' => __( 'event-tag', 'mashup_frame' ),
				'search_items' => mashup_var_frame_text_srt( 'mashup_var_search_tags' ),
				'popular_items' => mashup_var_frame_text_srt( 'mashup_var_popular_tags' ),
				'all_items' => mashup_var_frame_text_srt( 'mashup_var_all_tags' ),
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => mashup_var_frame_text_srt( 'mashup_var_edit_tag' ),
				'update_item' => mashup_var_frame_text_srt( 'mashup_var_update_tag' ),
				'add_new_item' => mashup_var_frame_text_srt( 'mashup_var_add_new_tag' ),
				'new_item_name' => mashup_var_frame_text_srt( 'mashup_var_new_tag_name' ),
				'separate_items_with_commas' => mashup_var_frame_text_srt( 'mashup_var_seperate_tags' ),
				'add_or_remove_items' => mashup_var_frame_text_srt( 'mashup_var_add_remove_tags' ),
				'choose_from_most_used' => mashup_var_frame_text_srt( 'mashup_var_most_used_tags' ),
				'menu_name' => mashup_var_frame_text_srt( 'mashup_var_tags' ),
			);
			register_taxonomy( 'event-tag', 'events', array(
				'hierarchical' => false,
				'labels' => $labels,
				'show_ui' => true,
				'update_count_callback' => '_update_post_term_count',
				'query_var' => true,
				'rewrite' => array( 'slug' => 'event-tag' ),
			) );
		}

	}

	return new post_type_event();
}
