<?php

/**
 * Mashup_Category_Meta Class
 *
 * @package Mashup
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
  Mashup_Category_Meta class used to implement the category meta fields.
 */
class Mashup_Category_Meta {

    /**
     * Set up mashup category meta fields.
     */
    public function __construct() {
        // add extra fields to category add/edit form callback function.
        // save extra category extra fields hook.
        add_action( 'edited_category', array( $this, 'mashup_save_extra_category_fileds' ), 10, 2 );
    }


    /**
     * Saving category meta fields.
     *
     * @param int    $cat_id category id.
     * @param string $cat_slug category slug.
     */
    public function mashup_save_extra_category_fileds( $cat_id, $cat_slug ) {
        $post_data = mashup_get_input( 'cat_meta', false, false );
        if ( isset( $post_data ) ) {
            $cat_meta = get_term_meta( $cat_slug . '_' . $cat_id );
            $cat_keys = array_keys( $post_data );
            foreach ( $cat_keys as $key ) {
                if ( isset( $post_data[$key] ) ) {
                    $cat_meta[$key] = $post_data[$key][0];
                }
            }
            update_term_meta( $cat_id, 'cat_meta_data', $cat_meta );
        }
    }

}

new Mashup_Category_Meta();
