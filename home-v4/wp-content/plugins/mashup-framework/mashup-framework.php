<?php

/*
  Plugin Name: Mashup Framework
  Plugin URI: http://themeforest.net/user/Chimpstudio/
  Description: Mashup Framework.
  Version: 2.0
  Author: ChimpStudio
  Author URI: http://themeforest.net/user/Chimpstudio/
  Requires at least: 4.1
  Tested up to: 4.5.x
  Text Domain: cs-frame
  Domain Path: /languages/

  Copyright: 2015 chimpgroup (email : info@chimpstudio.co.uk)
  License: GNU General Public License v3.0
  License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$theme = wp_get_theme();
if ( $theme->name != 'Mashup' ) {
    return;
}

if ( ! class_exists( 'wp_mashup_framework' ) ) {

    class wp_mashup_framework {

        protected static $_instance = null;

        /**
         * Main Plugin Instance
         *
         */
        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        /**
         * Initiate Plugin Actions
         *
         */
        public function __construct() {

            define( 'CSFRAME_DOMAIN', 'frame-mashup' );
            $this->plugin_actions();
            $this->includes();
            add_filter( 'template_include', array( $this, 'mashup_single_template' ) );
            add_action( 'save_post', array( $this, 'mashup_var_save_custom_option' ) );
            add_action( 'wp_ajax_mashup_admin_dismiss_notice', array( $this, 'mashup_admin_dismiss_notice' ) );
        }

        public function mashup_var_save_custom_option( $post_id = '' ) {
            global $post;

            if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
                return;
            }
            if ( mashup_var_frame()->is_request( 'admin' ) ) {
                $mashup_var_data = array();
                foreach ( $_POST as $key => $value ) {
                    if ( strstr( $key, 'mashup_var_' ) ) {
                        if ( $key == 'mashup_var_event_from_date' ) {
                            $mashup_event_datetime = $_POST["mashup_var_event_from_date"] . ' ' . $_POST["mashup_var_event_start_time"];
                            update_post_meta( $post_id, 'date_time', strtotime( $mashup_event_datetime ) );
                        }
                        $mashup_var_data[$key] = $value;
                        update_post_meta( $post_id, $key, $value );
                    }
                }
                update_post_meta( $post_id, 'mashup_var_full_data', $mashup_var_data );

                # Event Save 
                if ( isset( $_POST['mashup_var_event_repeat_num'] ) && $_POST['mashup_repeat_access'] == '' ) {

                    global $wpdb;
                    $post_thumbnail_id = get_post_thumbnail_id( $post_id );
                    $post = get_post( $post_id );
                    $from_date = $_POST["mashup_var_event_from_date"];
                    $to_date = $_POST["mashup_var_event_to_date"];
                    for ( $i = 1; $i < $_POST['mashup_var_event_repeat_num']; $i ++ ) {
                        $wpdb->insert( $wpdb->prefix . 'posts', array(
                            'post_author' => $post->post_author,
                            'post_date' => $post->post_date,
                            'post_date_gmt' => $post->post_date_gmt,
                            'post_content' => $post->post_content,
                            'post_title' => $post->post_title,
                            'post_excerpt' => $post->post_excerpt,
                            'post_status' => $post->post_status,
                            'comment_status' => $post->comment_status,
                            'ping_status' => $post->ping_status,
                            'post_name' => $post->post_name . "-" . $i,
                            'post_modified' => $post->post_modified,
                            'post_modified_gmt' => $post->post_modified_gmt,
                            'post_type' => $post->post_type
                                )
                        );

                        $inserted_id = (int) $wpdb->insert_id;

                        # adding categories start
                        $terms = wp_get_post_terms( $post->ID, "event-category" );
                        foreach ( $terms as $val ) {
                            $wpdb->insert( $wpdb->prefix . 'term_relationships', array(
                                'object_id' => $inserted_id,
                                'term_taxonomy_id' => $val->term_id,
                                'term_order' => 0
                                    )
                            );
                        }

                        # adding tag start
                        $terms = wp_get_post_terms( $post->ID, "event-tag" );
                        foreach ( $terms as $val ) {
                            $wpdb->insert( $wpdb->prefix . 'term_relationships', array(
                                'object_id' => $inserted_id,
                                'term_taxonomy_id' => $val->term_id,
                                'term_order' => 0
                                    )
                            );
                        }

                        # adding feature image start
                        if ( $post_thumbnail_id )
                            update_post_meta( $inserted_id, '_thumbnail_id', $post_thumbnail_id );


                        # Save Repeat Event Data
                        $data = array();
                        foreach ( $_POST as $key => $value ) {
                            if ( strstr( $key, 'mashup_var_' ) ) {
                                $data[$key] = $value;
                                update_post_meta( $inserted_id, $key, $value );
                            }
                        }

                        update_post_meta( $inserted_id, 'mashup_var_full_data', $data );

                        if ( isset( $_POST["mashup_var_event_from_date"] ) && $_POST["mashup_var_event_from_date"] != '' ) {

                            $mashup_event_datetime = $_POST["mashup_var_event_from_date"] . ' ' . $_POST["mashup_var_event_start_time"];

                            update_post_meta( $inserted_id, 'date_time', strtotime( $mashup_event_datetime ) );
                        }

                        if ( $_POST['mashup_var_event_repeat'] <> 0 ) {

                            $event_from_date = date( 'd-m-Y', strtotime( $from_date . $_POST["mashup_var_event_repeat"] ) );
                            $from_date = date( 'd-m-Y', strtotime( $from_date . $_POST["mashup_var_event_repeat"] ) );

                            $event_to_date = date( 'd-m-Y', strtotime( $to_date . $_POST["mashup_var_event_repeat"] ) );
                            $to_date = date( 'd-m-Y', strtotime( $to_date . $_POST["mashup_var_event_repeat"] ) );

                            update_post_meta( $inserted_id, 'mashup_var_event_from_date', $event_from_date );
                            update_post_meta( $inserted_id, 'mashup_var_event_to_date', $event_to_date );
                        }
                    }
                }
            }
        }

        /**
         * Fetch and return version of the current plugin
         *
         * @return	string	version of this plugin
         */
        public static function get_plugin_version() {
            $plugin_data = get_plugin_data( __FILE__ );
            return $plugin_data['Version'];
        }

        /**
         * Initiate Plugin 
         * Text Domain
         * @return
         */
        public function load_plugin_textdomain() {
            $locale = apply_filters( 'plugin_locale', get_locale(), 'cs-frame' );

            load_textdomain( 'cs-frame', WP_LANG_DIR . '/cs-frame/cs-frame-' . $locale . '.mo' );
            load_plugin_textdomain( 'cs-frame', false, plugin_basename( dirname( __FILE__ ) ) . "/languages" );
        }

        /**
         * Checking the Request Type
         * string $type ajax, frontend or admin
         * @return bool
         */
        public function is_request( $type ) {
            switch ( $type ) {
                case 'admin' :
                    return is_admin();
                case 'ajax' :
                    return defined( 'DOING_AJAX' );
                case 'cron' :
                    return defined( 'DOING_CRON' );
                case 'frontend' :
                    return ( ! is_admin() || defined( 'DOING_AJAX' ) ) && ! defined( 'DOING_CRON' );
            }
        }

        /**
         * Include required core files 
         * used in admin and on the frontend.
         */
        public function includes() {

            // Theme Domain Name
            require_once 'includes/cs-framework-config.php';
            require_once 'includes/cs-helpers.php';
            require_once 'assets/translate/cs-strings.php';
            //require_once 'includes/cs-maintenance-mode/cs-maintenance-mode.php';
            //require_once 'includes/cs-maintenance-mode/cs-functions.php';
            //require_once 'includes/cs-maintenance-mode/cs-fields.php';
            require_once 'includes/cs-frame-functions.php';
            require_once 'includes/cs-mailchimp/cs-class.php';
            require_once 'includes/cs-mailchimp/cs-functions.php';
            require_once 'includes/cs-page-builder.php';

            // Post Types
            require_once 'includes/cs-posttypes/cs-events.php';
            require_once 'includes/cs-posttypes/cs-albums.php';
            require_once 'includes/cs-posttypes/cs-gallery.php';

            // Post and Page Meta Boxes
            require_once 'includes/cs-metaboxes/cs-page-functions.php';
            require_once 'includes/cs-metaboxes/cs-page.php';
            require_once 'includes/cs-metaboxes/cs-post.php';
            require_once 'includes/cs-metaboxes/cs-product.php';
            require_once 'includes/cs-metaboxes/cs-events-meta.php';
            require_once 'includes/cs-metaboxes/cs-album-meta.php';
            require_once 'includes/cs-metaboxes/cs-gallery-meta.php';
            // Shortcodes
            require_once('templates/gallery/gallery-element.php');
            require_once('templates/gallery/gallery-functions.php');
            require_once 'includes/cs-shortcodes/backend/cs-maintain.php';
            require_once 'includes/cs-shortcodes/frontend/cs-maintenance.php';

            require_once 'includes/cs-shortcodes/backend/album-playlist.php';
            require_once 'includes/cs-shortcodes/frontend/album-playlist.php';
            // Importer
            require_once 'includes/cs-importer/theme-importer.php';
            //  require_once 'includes/cs-importer/class-widget-data.php';
            // Auto Update Theme
            require_once 'includes/cs-importer/auto-update-theme.php';

            // Album Element
            require_once 'templates/albums/album-element.php';
            require_once 'templates/albums/album-functions.php';

            // Events Element
            require_once 'templates/events/events-element.php';
            require_once 'templates/events/events-functions.php';
            // Widgets
            require_once 'includes/cs-widgets/cs-social-media.php';
        }

        /**
         * Set plugin actions.
         * @return
         */
        public function plugin_actions() {

            add_action( 'init', array( $this, 'load_plugin_textdomain' ), 0 );
            add_action( 'mashup_before_header', array( $this, 'under_construction' ) );
            add_action( 'admin_enqueue_scripts', array( $this, 'admin_plugin_files_enqueue' ) );
            add_action( 'wp_enqueue_scripts', array( $this, 'frontend_files_enqueue' ), 6 );
            add_filter( 'mashup_maintenance_options', array( $this, 'create_mashup_maintenance_options' ), 10, 1 );
        }

        /**
         * Get the plugin url.
         * @return string
         */
        public static function plugin_url( $path = '' ) {
            return trailingslashit( plugins_url( '/', __FILE__ ) ) . $path;
        }

        public static function plugin_dir() {
            return plugin_dir_path( __FILE__ );
        }

        /**
         * Get the plugin path.
         * @return string
         */
        public static function plugin_path() {
            return untrailingslashit( plugin_dir_path( __FILE__ ) );
        }

        /**
         * Default plugin 
         * admin files enqueue.
         * @return
         */
        public function admin_plugin_files_enqueue() {

            if ( $this->is_request( 'admin' ) ) {
                // admin js files
                $mashup_scripts_path = wp_mashup_framework::plugin_url( 'assets/js/cs-page-builder-functions.js', __FILE__ );
                wp_enqueue_script( 'cs-frame-admin', $mashup_scripts_path, array( 'jquery' ) );
            }
        }

        /**
         * Default plugin 
         * front files enqueue.
         * @return
         */
        public function frontend_files_enqueue() {

            if ( $this->is_request( 'frontend' ) ) {

                wp_register_script( 'frame-front-functions', wp_mashup_framework::plugin_url( 'assets/js/front-functions.js' ), array( 'jquery' ) );
                $mashup_code_array = array(
                    'load_more' => __( 'Load More', CSFRAME_DOMAIN ),
                    'loading' => __( 'Loading...', CSFRAME_DOMAIN ),
                    'play' => __( 'play', CSFRAME_DOMAIN ),
                    'stop' => __( 'stop', CSFRAME_DOMAIN ),
                    'pause' => __( 'pause', CSFRAME_DOMAIN ),
                );
                wp_localize_script( 'frame-front-functions', 'load_albums_strings', $mashup_code_array );
                wp_enqueue_script( 'frame-front-functions' );

                wp_enqueue_style( 'mCustomScrollbar', wp_mashup_framework::plugin_url( 'assets/css/jquery.mCustomScrollbar.css' ) );
                wp_enqueue_script( 'jplayer', wp_mashup_framework::plugin_url( 'assets/js/jplayer.js' ), '', '', true );
                wp_enqueue_script( 'mCustomScrollbar', wp_mashup_framework::plugin_url( 'assets/js/jquery.mCustomScrollbar.concat.min.js' ), '', '', true );

                if ( ! function_exists( 'mashup_plugin_inline_enqueue_script' ) ) {

                    function mashup_plugin_inline_enqueue_script( $script = '', $script_handler = 'custom' ) {
                        wp_enqueue_script( $script_handler );
                        wp_add_inline_script( $script_handler, $script );
                    }

                }
            }
        }

        public function mashup_single_template( $single_template ) {
            global $post;
            if ( is_single() ) {

                if ( get_post_type() == 'events' ) {
                    $single_template = plugin_dir_path( __FILE__ ) . '/templates/events/single-event.php';
                }
                if ( get_post_type() == 'albums' ) {
                    $single_template = plugin_dir_path( __FILE__ ) . '/templates/albums/single-album.php';
                }
                if ( get_post_type() == 'gallery' ) {
                    $single_template = plugin_dir_path( __FILE__ ) . '/templates/gallery-styles/single-gallery.php';
                }
            }
            return $single_template;
        }

        public function under_construction() {
            global $mashup_var_options;
            if ( get_option( 'mashup_underconstruction_redirecting' ) != 1 ) {
                if ( isset( $mashup_var_options['mashup_var_maintenance_switch'] ) && $mashup_var_options['mashup_var_maintenance_switch'] == 'on' && isset( $mashup_var_options['mashup_var_maintinance_mode_page'] ) && ! is_user_logged_in() ) {
                    if ( $mashup_var_options['mashup_var_maintinance_mode_page'] != '' && $mashup_var_options['mashup_var_maintinance_mode_page'] != '0' ) {
                        update_option( 'mashup_underconstruction_redirecting', '1' );
                        wp_redirect( get_permalink( $mashup_var_options['mashup_var_maintinance_mode_page'] ) );
                        exit;
                    } else {
                        echo '
                        <script>
                            alert("' . mashup_var_frame_text_srt( 'mashup_var_please_select_maintinance' ) . '");
                        </script>';
                    }
                }
            }
        }

        public function create_mashup_maintenance_options( $mashup_var_settings ) {
            global $mashup_var_frame_static_text;
            $on_off_option = array(
                "show" => "on",
                "hide" => "off",
            );

            $mashup_var_settings[] = array( "name" => mashup_var_frame_text_srt( 'mashup_var_maintenance_field_name' ),
                "fontawesome" => 'icon-settings',
                "id" => "tab-maintenanace-mode",
                "std" => "",
                "type" => "main-heading",
                "options" => ""
            );
            $mashup_var_settings[] = array( "name" => mashup_var_frame_text_srt( 'mashup_var_maintenance_field_name' ),
                "id" => "tab-maintenanace-mode",
                "with_col" => true,
                "type" => "sub-heading"
            );
            $mashup_var_settings[] = array( "name" => mashup_var_frame_text_srt( 'mashup_var_maintenance_field_name' ),
                "desc" => "",
                "hint_text" => '',
                "id" => "mashup_maintenance_options",
                "std" => "",
                "type" => "maintenance_mode"
            );
            $mashup_var_settings[] = array( "name" => mashup_var_frame_text_srt( 'mashup_var_maintenance_field_name' ),
                "desc" => "",
                "hint_text" => mashup_var_frame_text_srt( 'mashup_var_maintenance_field_mode_hint' ),
                "id" => "maintenance_switch",
                "std" => "off",
                "type" => "checkbox",
                "options" => $on_off_option
            );

            $mashup_var_settings[] = array( "name" => mashup_var_frame_text_srt( 'mashup_var_maintenance_field_logo' ),
                "desc" => "",
                "hint_text" => mashup_var_frame_text_srt( 'mashup_var_maintenance_field_logo_hint' ),
                "id" => "maintenance_logo_switch",
                "std" => "off",
                "type" => "checkbox",
                "options" => $on_off_option
            );
            $mashup_var_settings[] = array( "name" => mashup_var_frame_text_srt( 'mashup_var_maintenance_field_social' ),
                "desc" => "",
                "hint_text" => mashup_var_frame_text_srt( 'mashup_var_maintenance_field_social_hint' ),
                "id" => "maintenance_social_switch",
                "std" => "off",
                "type" => "checkbox",
                "options" => $on_off_option
            );

            $mashup_var_settings[] = array( "name" => mashup_var_frame_text_srt( 'mashup_var_maintenance_field_newsletter' ),
                "desc" => "",
                "hint_text" => mashup_var_frame_text_srt( 'mashup_var_maintenance_field_newsletter_hint' ),
                "id" => "maintenance_newsletter_switch",
                "std" => "off",
                "type" => "checkbox",
                "options" => $on_off_option
            );

            $args = array(
                'sort_order' => 'asc',
                'sort_column' => 'post_title',
                'hierarchical' => 1,
                'exclude' => '',
                'include' => '',
                'meta_key' => '',
                'meta_value' => '',
                'authors' => '',
                'child_of' => 0,
                'parent' => -1,
                'exclude_tree' => '',
                'number' => '',
                'offset' => 0,
                'post_type' => 'page',
                'post_status' => 'publish'
            );

            $mashup_var_pages = get_pages( $args );

            $mashup_var_options_array = array();
            $mashup_var_options_array[] = mashup_var_frame_text_srt( 'mashup_var_maintenance_field_select_page' );
            foreach ( $mashup_var_pages as $mashup_var_page ) {
                $mashup_var_options_array[$mashup_var_page->ID] = isset( $mashup_var_page->post_title ) && ($mashup_var_page->post_title != '') ? $mashup_var_page->post_title : mashup_var_frame_text_srt( 'mashup_var_no_title' );
            }

            $mashup_var_settings[] = array( "name" => mashup_var_frame_text_srt( 'mashup_var_maintenance_field_mode_page' ),
                "desc" => "",
                "hint_text" => mashup_var_frame_text_srt( 'mashup_var_maintenance_field_mode_page_hint' ),
                "id" => "maintinance_mode_page",
                "std" => mashup_var_frame_text_srt( 'mashup_var_maintenance_select_page' ),
                "type" => "select",
                'classes' => 'chosen-select',
                "options" => $mashup_var_options_array
            );
            $mashup_var_settings[] = array( "col_heading" => '',
                "type" => "col-right-text",
                "help_text" => ''
            );

            return $mashup_var_settings;
        }

        public function mashup_admin_dismiss_notice() {
            set_transient( 'admin_dismiss_notice', '1', 60 * 60 * 24 * 7 );
            die;
        }

    }

}

/**
 *
 * @login popup script files
 */
if ( ! function_exists( 'mashup_google_recaptcha_scripts' ) ) {

    function mashup_google_recaptcha_scripts() {
        wp_enqueue_script( 'google_recaptcha_scripts', mashup_server_protocol() . 'www.google.com/recaptcha/api.js?onload=mashup_multicap&render=explicit', '', '' );
    }

}
/**
 *
 * @social login script
 */
if ( ! function_exists( 'mashup_socialconnect_scripts' ) ) {

    function mashup_socialconnect_scripts() {
        wp_enqueue_script( 'socialconnect_js', plugins_url( '/includes/cs-login/cs-social-login/media/js/cs-connect.js', __FILE__ ), '', '', true );
    }

}

/**
 * Framework Instance
 * @return
 *
 */
if ( ! function_exists( 'mashup_var_frame' ) ) {

    function mashup_var_frame() {
        return wp_mashup_framework::instance();
    }

}

if ( ! function_exists( 'mashup_register_session' ) ) {

    function mashup_register_session() {
        if ( ! session_id() ) {
            session_start();
        }
    }

    add_action( 'init', 'mashup_register_session' );
}

// Global for backwards compatibility.
$GLOBALS['wp_mashup_framework'] = mashup_var_frame();
