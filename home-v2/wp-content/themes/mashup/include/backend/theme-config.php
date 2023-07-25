<?php
/**
 * Defines configurations for Theme, Framework Plugin and rating plugin
 *
 * @since	1.0
 * @package	WordPress
 */
/*
 * THEME_ENVATO_ID contains theme unique id at envator
 */
if ( ! defined( 'THEME_ENVATO_ID' ) ) {
    define( 'THEME_ENVATO_ID', '00000000' );     
}

/*
 * THEME_NAME contains the name of the current theme
 */
if ( ! defined( 'THEME_NAME' ) ) {
    define( 'THEME_NAME', 'mashup' );
}

/*
 * THEME_TEXT_DOMAIN contains the text domain name used for this theme
 */
if ( ! defined( 'THEME_TEXT_DOMAIN' ) ) {
    define( 'THEME_TEXT_DOMAIN', 'mashup' );
}

/*
 * THEME_OPTIONS_PAGE_SLUG contains theme optinos main page slug
 */
if ( ! defined( 'THEME_OPTIONS_PAGE_SLUG' ) ) {
    define( 'THEME_OPTIONS_PAGE_SLUG', 'mashup_theme_options_constructor' );
}

/*
 * CS_JOB_HUNT_STABLE_VERSION contains job hunt stable version compitble with this theme version
 */
//if ( ! defined( 'CS_MASHUP_RATINGS_STABLE_VERSION' ) ) {
//    define( 'CS_MASHUP_RATINGS_STABLE_VERSION', '1.0' );
//}

/*
 * CS_FRAMEWORK_STABLE_VERSION contains cs framework stable version compitble with this theme version
 */
if ( ! defined( 'CS_MASHUP_FRAMEWORK_STABLE_VERSION' ) ) {
    define( 'CS_MASHUP_FRAMEWORK_STABLE_VERSION', '1.0' );
}

/*
 * CS_BASE contains the root server path of the framework that is loaded
 */
if ( ! defined( 'CS_BASE' ) ) {
    define( 'CS_BASE', get_template_directory() . '/' );
}

/*
 * CS_BASE_URL contains the http url of the framework that is loaded
 */
if ( ! defined( 'CS_BASE_URL' ) ) {
    define( 'CS_BASE_URL', get_template_directory_uri() . '/' );
}

/*
 * DEFAULT_DEMO_DATA_NAME contains the default demo data name used by CS importer
 */
if ( ! defined( 'DEFAULT_DEMO_DATA_NAME' ) ) {
    define( 'DEFAULT_DEMO_DATA_NAME', 'mashup' );
}

/*
 * DEFAULT_DEMO_DATA_URL contains the default demo data url used by CS importer
 */
if ( ! defined( 'DEFAULT_DEMO_DATA_URL' ) ) {
    define( 'DEFAULT_DEMO_DATA_URL', 'http://mashup.chimpgroup.com/wp-content/uploads/' );
}

/*
 * DEMO_DATA_URL contains the demo data url used by CS importer
 */
if ( ! defined( 'DEMO_DATA_URL' ) ) {
    define( 'DEMO_DATA_URL', 'http://mashup.chimpgroup.com/{{{demo_data_name}}}/wp-content/uploads/' );
}

/*
 * REMOTE_API_URL contains the api url used for envator purchase key verification
 */
if ( ! defined( 'REMOTE_API_URL' ) ) {
    define( 'REMOTE_API_URL', 'http://chimpgroup.com/wp-demo/webservice/' );
}

/*
 * ATTACHMENTS_REPLACE_URL contains the URL to be replaced in WP content XML attachments
 */
if ( ! defined( 'ATTACHMENTS_REPLACE_URL' ) ) {
    define( 'ATTACHMENTS_REPLACE_URL', 'http://mashup.chimpgroup.com/wp-content/uploads/' );
}

/*
 * Theme Backup Directory Path
 */
if ( ! defined( 'AUTO_UPGRADE_BACKUP_DIR' ) ) {
    define( 'AUTO_UPGRADE_BACKUP_DIR', WP_CONTENT_DIR . '/' . THEME_NAME . '-backups/' );
}

if ( ! function_exists( 'mashup_get_demo_data_structure' ) ) {

    /**
     * Return Demo datas available
     *
     * @return	array	details of demo datas available
     */
    function mashup_get_demo_data_structure() {
        $demo_data_structure = array(
            'mashup' => array(
                'slug' => 'mashup',
                'name' => 'Mashup',
                'image_url' => 'http://chimpgroup.com/wp-demo/webservice/demo_images/mashup/mashup.jpg',
            ),
        );
        return $demo_data_structure;
    }

}

if ( ! function_exists( 'mashup_get_server_requirements' ) ) {

    /**
     * Return server requirements for importer
     *
     * @return	array	server resources requirements for importer
     */
    function mashup_get_server_requirements() {
        $post_max_size = ini_get( 'post_max_size' );
        $upload_max_filesize = ini_get( 'upload_max_filesize' );
        $memory_limit = ini_get( 'memory_limit' );
        $recommended_post_max_size = 256;
        $recommended_post_max_size_unit = 'M';
        $recommended_upload_max_filesize = 256;
        $recommended_upload_max_filesize_unit = 'M';
        $recommended_memory_limit = 256;
        $recommended_memory_limit_unit = 'M';
        $server_requirements = array(
            array(
                'title' => 'POST_MAX_SIZE = ' . $recommended_post_max_size . $recommended_post_max_size_unit . ' ( Available ' . $post_max_size . ' )',
                'description' => esc_html__('Sets max size of post data allowed. This setting also affects file upload.','mashup'),
                'version' => '',
                'is_met' => ( $recommended_post_max_size <= $post_max_size ),
            ),
            array(
                'title' => 'UPLOAD_MAX_FILESIZE = ' . $recommended_upload_max_filesize . $recommended_upload_max_filesize_unit . ' ( Available ' . $upload_max_filesize . ' )',
                'description' => esc_html__('The maximum size of a file that can be uploaded.','mashup'),
                'version' => '',
                'is_met' => ( $recommended_upload_max_filesize <= $upload_max_filesize ),
            ),
            array(
                'title' => 'MEMORY_LIMIT = ' . $recommended_memory_limit . $recommended_memory_limit_unit . ' ( Available ' . $memory_limit . ' )',
                'description' => esc_html__('This sets the maximum amount of memory in bytes that a script is allowed to allocate.','mashup'),
                'version' => '',
                'is_met' => ( $recommended_memory_limit <= $memory_limit ),
            ),
        );
        return $server_requirements;
    }

}

if ( ! function_exists( 'mashup_get_plugin_requirements' ) ) {

    /**
     * Return plugin requirements for importer
     *
     * @return	array	plugin requirements for importer
     */
    function mashup_get_plugin_requirements() {
        // Default compatible plugin versions.
        $compatible_plugin_versions = array(
            'cs_mashup_framework' => CS_MASHUP_FRAMEWORK_STABLE_VERSION,
            //'mashup_ratings' => CS_MASHUP_RATINGS_STABLE_VERSION,
        );
        // Check if there is a need to prompt user to install theme.
        $is_cs_mashup_framework = class_exists( 'wp_mashup_framework' );
        $current_version_cs_mashup_framework = '0.0';
        $have_new_version_cs_mashup_framework = false;
        if ( $is_cs_mashup_framework ) {
            $current_version_cs_mashup_framework = wp_mashup_framework::get_plugin_version();
            $new_version_cs_mashup_framework = $compatible_plugin_versions['cs_mashup_framework'];
            if ( version_compare( $current_version_cs_mashup_framework, $new_version_cs_mashup_framework ) < 0 ) {
                $is_cs_mashup_mashup_framework = false;
                $have_new_version_cs_mashup_framework = true;
            }
        }
        // Check if there is a need to prompt user to install theme.
//        $is_mashup = class_exists( 'Mashup_Ratings' );
//        $current_version_mashup_ratings = '0.0';
//        $have_new_version_mashup = false;
//        if ( $is_mashup ) {
//            $current_version_mashup_ratings = Mashup_Ratings::get_plugin_version();
//            $new_version_mashup = $compatible_plugin_versions['mashup_ratings'];
//            if ( version_compare( $current_version_mashup_ratings, $new_version_mashup ) < 0 ) {
//                $is_mashup = false;
//                $have_new_version_mashup = true;
//            }
//        }
        // Check if there is a need to prompt user to install theme.
        $is_rev_slider = class_exists( 'RevSlider' );
        $have_new_version_rev_slider = false;
		$current_version_rev_slider = '0.0';
        if ( $is_rev_slider ) {
            $current_version_rev_slider = RevSliderGlobals::SLIDER_REVISION;
            $new_version_rev_slider = get_option( 'revslider-latest-version', RevSliderGlobals::SLIDER_REVISION );
            if ( empty( $new_version_rev_slider ) ) {
                $new_version_rev_slider = '5.2.5';
            }

            if ( version_compare( $current_version_rev_slider, $new_version_rev_slider ) < 0 ) {
                $is_rev_slider = false;
                $have_new_version_rev_slider = true;
            }
        }
        $plugin_requirements = array(
            'cs_mashup_framework' => array(
                'title' => esc_html__('CS Mashup Framework','mashup'),
                'description' => esc_html__('This plugin is required as this handles the core functionality of the theme.','mashup'),
                'version' => $current_version_cs_mashup_framework,
                'new_version' => ( true == $have_new_version_cs_mashup_framework ) ? $new_version_cs_mashup_framework : '',
                'is_installed' => $is_cs_mashup_framework,
            ),
            'rev_slider' => array(
                'title' => esc_html__('Revolution Slider','mashup'),
                'description' => esc_html__('This plugin is required to import Revolution sliders from demo data.','mashup'),
                'version' => $current_version_rev_slider,
                'new_version' => ( true == $have_new_version_rev_slider ) ? $new_version_rev_slider : '',
                'is_installed' => $is_rev_slider,
            ),
        );
        return $plugin_requirements;
    }

}

if ( ! function_exists( 'mashup_get_plugins_to_be_updated' ) ) {

    /**
     * Give a list of the plugins pluings need to be updated (used Auto Theme Upgrader)
     *
     * @return	array	a list of plugins which will be updated on Auto Theme update
     */
    function mashup_get_plugins_to_be_updated() {
        return array(
           
            array(
                'name' => esc_html__( 'CS Mashup Framework', 'mashup' ),
                'slug' => 'mashup-framework',
                'source' => trailingslashit( get_template_directory_uri() ) . 'include/backend/cs-activation-plugins/mashup-framework.zip',
                'required' => true,
                'version' => '',
                'force_activation' => true,
                'force_deactivation' => true,
                'external_url' => '',
            ),
        );
    }

}