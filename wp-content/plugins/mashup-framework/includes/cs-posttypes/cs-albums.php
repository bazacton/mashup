<?php
/**
 * @Manage Columns
 * @return
 *
 */
 
if (!class_exists('post_type_album')) {

    class post_type_album {

        // The Constructor
        public function __construct() {
            // Adding columns
            add_filter('manage_albums_posts_columns', array(&$this, 'mashup_albums_columns_add'));
            add_action('manage_albums_posts_custom_column', array(&$this, 'mashup_albums_columns'), 10, 2);
			add_action('init', array(&$this, 'mashup_albums_register'));
			add_action('init', array(&$this, 'mashup_albums_categories'));
		 
        }

		function mashup_albums_columns_add($columns) {
			$columns['category'] = mashup_var_frame_text_srt('mashup_var_album_categories');
			return $columns;
		}

		function mashup_albums_columns($name) {
			global $post;
			switch ($name) {
				case 'category':
					$categories = get_the_terms( $post->ID, 'album-category' );
						if($categories <> ""){
							$couter_comma = 0;
							foreach ( $categories as $category ) {
								echo esc_attr($category->name);
								$couter_comma++;
								if ( $couter_comma < count($categories) ) {
									echo ", ";
								}
							}
						}
				break;
			}
		}

		/**
		 * @Register Post Type
		 * @return
		 *
		 */
		function mashup_albums_register() {
			$labels = array(
				'name' => mashup_var_frame_text_srt('mashup_var_albums'),
				'all_items' => mashup_var_frame_text_srt('mashup_var_albums'),
				'add_new_item' => mashup_var_frame_text_srt('mashup_var_add_new_album'),
				'edit_item' => mashup_var_frame_text_srt('mashup_var_edit_album'), 
				'new_item' => mashup_var_frame_text_srt('mashup_var_new_album_item'),
				'add_new' => mashup_var_frame_text_srt('mashup_var_add_new_album'),
				'view_item' => mashup_var_frame_text_srt('mashup_var_view_album_item'), 
				'search_items' => mashup_var_frame_text_srt('mashup_var_search_album'), 
				'not_found' => mashup_var_frame_text_srt('mashup_var_nothing_found'),  
				'not_found_in_trash' => mashup_var_frame_text_srt('mashup_var_nothing_found_trash'),
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
				'supports' => array('title', 'editor', 'thumbnail')
			); 
			register_post_type( 'albums' , $args );

		}
		
		/**
		 * @Register Categories
		 * @return
		 *
		 */	
		
		function mashup_albums_categories() { 
			$labels = array(
				'name' => mashup_var_frame_text_srt('mashup_var_album_categories'), 
				'search_items' => mashup_var_frame_text_srt('mashup_var_search_album_categories'), 
				'edit_item' => mashup_var_frame_text_srt('mashup_var_edit_album_category'), 
				'update_item' => mashup_var_frame_text_srt('mashup_var_update_album_category'), 
				'add_new_item' => mashup_var_frame_text_srt('mashup_var_add_new_category'), 
				'menu_name' => mashup_var_frame_text_srt('mashup_var_album_categories'), 
			); 	
			register_taxonomy('album-category',array('albums'), array(
				'hierarchical' => true,
				'labels' => $labels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'album-category' ),
			));
		}
		
		/**
		 * @Register Tags
		 * @return
		 *
		 */	
 	 
	}
	
	return new post_type_album();
}
