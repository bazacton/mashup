<?php

/**
 * Register Post Type Gallery
 * @return
 *
 */
if ( ! class_exists( 'post_type_gallery' ) ) {

    class post_type_gallery {

        // The Constructor
        public function __construct() {
            add_action( 'init', array( $this, 'gallery_register' ) );
            add_action( 'init', array( $this, 'create_gallery_category' ) );
        }

        /**
         * @Register Post Type
         * @return
         *
         */
        function gallery_register() {
            global $mashup_var_frame_static_text;

            //$strings = new mashup_plugin_all_strings;
           //$strings->mashup_plugin_activation_strings();
            $labels = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_gallery_name' ),
                'singular_name' => mashup_var_frame_text_srt( 'mashup_var_gallery_singular_name' ),
                'menu_name' => mashup_var_frame_text_srt( 'mashup_var_gallery_menu_name' ),
                'name_admin_bar' => mashup_var_frame_text_srt( 'mashup_var_gallery_name_admin_bar' ),
                'add_new' => mashup_var_frame_text_srt( 'mashup_var_gallery_add_new' ),
                'add_new_item' => mashup_var_frame_text_srt( 'mashup_var_gallery_add_new_item' ),
                'new_item' => mashup_var_frame_text_srt( 'mashup_var_gallery_new_item' ),
                'edit_item' => mashup_var_frame_text_srt( 'mashup_var_gallery_edit_item' ),
                'view_item' => mashup_var_frame_text_srt( 'mashup_var_gallery_view_item' ),
                'all_items' => mashup_var_frame_text_srt( 'mashup_var_gallery_all_items' ),
                'search_items' => mashup_var_frame_text_srt( 'mashup_var_gallery_search_items' ),
                'parent_item_colon' => mashup_var_frame_text_srt( 'mashup_var_gallery_parent_item_colon' ),
                'not_found' => mashup_var_frame_text_srt( 'mashup_var_gallery_not_found' ),
                'not_found_in_trash' => mashup_var_frame_text_srt( 'mashup_var_gallery_not_found_in_trash' ),
            );
            register_post_type( 'gallery', array(
                'labels' => $labels,
                'label' => 'Gallery',
                'description' => '',
                'public' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'capability_type' => 'post',
                'hierarchical' => false,
                'rewrite' => array( 'slug' => 'gallery' ),
                'query_var' => true,
                'menu_icon' => 'dashicons-images-alt',
                'supports' => array( 'title', 'comments' ),
            ) );
            // Add to admin_init function
            //add_filter( 'manage_edit-gallery_columns', 'my_edit_gallery_columns' );

            function my_edit_gallery_columns( $columns ) {

                $columns = array(
                    'cb' => '<input type="checkbox" />',
                    'title' => mashup_var_frame_text_srt( 'mashup_var_tour_gallery_name_column' ),
                    'images' => mashup_var_frame_text_srt( 'mashup_var_tour_gallery_images_column' ),
                    'author' => mashup_var_frame_text_srt( 'mashup_var_tour_author_column' ),
                    'date' => mashup_var_frame_text_srt( 'mashup_var_tour_date_column' ),
                );
                return $columns;
            }

            add_action( 'manage_gallery_posts_custom_column', 'my_manage_gallery_columns', 10, 2 );

            function my_manage_gallery_columns( $column, $post_id ) {
                global $post;
                switch ( $column ) {
                    case 'images' :
                        $images = get_post_meta( $post_id, 'mashup_var_list_gallery_url', true );
                        if ( ! empty( $images ) ) {

                            $images_counter = count( $images );
                            echo esc_html( $images_counter );
                        } else {
                            echo __( '0' );
                        }
                        break;
                    default :
                        break;
                }
            }

        }

        /**
         * @Register Category
         * @return
         */
        function create_gallery_category() {
            $labels = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_cat_name' ),
                'singular_name' => mashup_var_frame_text_srt( 'mashup_var_cat__singular_name' ),
                'search_items' => mashup_var_frame_text_srt( 'mashup_var_cat__search_items' ),
                'all_items' => mashup_var_frame_text_srt( 'mashup_var_cat__all_items' ),
                'parent_item' => mashup_var_frame_text_srt( 'mashup_var_cat__parent_item' ),
                'parent_item_colon' => mashup_var_frame_text_srt( 'mashup_var_parent_cat__item_colon' ),
                'edit_item' => mashup_var_frame_text_srt( 'mashup_var_cat__edit_item' ),
                'update_item' => mashup_var_frame_text_srt( 'mashup_var_cat__update_item' ),
                'add_new_item' => mashup_var_frame_text_srt( 'mashup_var_cat__add_new_item' ),
                'new_item_name' => mashup_var_frame_text_srt( 'mashup_var_cat__new_item_name' ),
                'menu_name' => mashup_var_frame_text_srt( 'mashup_var_cat__menu_name' ),
            );
            $args = array(
                'hierarchical' => true,
                'labels' => $labels,
                'show_ui' => true,
                'show_admin_column' => true,
                'query_var' => true,
                'rewrite' => array( 'slug' => 'gallery-category' ),
            );
            register_taxonomy( 'gallery-category', array( 'gallery' ), $args );
        }

    }

    return new post_type_gallery();
}
