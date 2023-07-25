<?php

/**
 * Mashup functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mashup
 */
require_once trailingslashit(get_template_directory()) . 'assets/frontend/translate/cs-strings.php';
require_once trailingslashit(get_template_directory()) . 'include/cs-global-functions.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-global-variables.php';
include(get_template_directory() . '/include/cs-theme-functions.php');
require_once(get_template_directory() . '/include/cs-helpers.php');

/**
 * Sets up theme defaults and registers support for various WordPress features.     *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
if (!function_exists('mashup_setup')) {

    function mashup_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on mashup, use a find and replace
         * to change 'mashup' to the name of your theme in all the template files.
         */
        load_theme_textdomain('mashup', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'mashup'),
            'copyright_menu' => esc_html__('Copyright Menu', 'mashup'),
            'footer_menu' => esc_html__('Footer Menu', 'mashup'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('mashup_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        /*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, icons, and column width.
         */
        add_editor_style('assets/backend/css/editor-style.css');
    }

    add_action('after_setup_theme', 'mashup_setup');
}


/*
 * Add images sizes for complete site
 * 
 */

add_image_size('mashup_media_1', 850, 270, true); //Large Gallery
add_image_size('mashup_media_2', 847, 296, true); //Event Detail
add_image_size('mashup_media_3', 560, 270, true); //Medium Gallery
add_image_size('mashup_media_4', 361, 515, true); //Upcoming tour
add_image_size('mashup_media_5', 356, 462, true); //Video Gallery
add_image_size('mashup_media_6', 360, 306, true); //BLOG MEDIUM
add_image_size('mashup_media_7', 272, 270, true); //Small Gallery
add_image_size('mashup_media_8', 360, 360, true); //Music Shop, Albums, Albmus Detail
add_image_size('mashup_media_9', 740, 416, true); //Music Shop, Albums, Albmus Detail

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if (!function_exists('mashup_content_width')) {

    function mashup_content_width() {
        $GLOBALS['content_width'] = apply_filters('mashup_content_width', 640);
    }

    add_action('after_setup_theme', 'mashup_content_width', 0);
}

if (class_exists('RevSlider') && !class_exists('mashup_var_RevSlider')) {

    class mashup_var_RevSlider extends RevSlider {
        /*
         * Get sliders alias, Title, ID
         */

        public function getAllSliderAliases() {
            $where = "";
            $response = $this->db->fetch(GlobalsRevSlider::$table_sliders, $where, "id");
            $arrAliases = array();
            $slider_array = array();
            foreach ($response as $arrSlider) {
                $arrAliases['id'] = $arrSlider["id"];
                $arrAliases['title'] = $arrSlider["title"];
                $arrAliases['alias'] = $arrSlider["alias"];
                $slider_array[] = $arrAliases;
            }
            return($slider_array);
        }

    }

}

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Auto Mobile 1.0
 */
if (!function_exists('mashup_widgets_init')) {

    function mashup_widgets_init() {

        global $mashup_var_options, $mashup_var_static_text;

        /**
         * @If Theme Activated
         */
        if (get_option('mashup_var_options')) {
            if (isset($mashup_var_options['mashup_var_sidebar']) && !empty($mashup_var_options['mashup_var_sidebar'])) {
                foreach ($mashup_var_options['mashup_var_sidebar'] as $sidebar) {
                    $sidebar_id = sanitize_title($sidebar);

                    $mashup_widget_start = '<div class="widget %2$s">';
                    $mashup_widget_end = '</div>';
                    if (isset($mashup_var_options['mashup_var_footer_widget_sidebar']) && $mashup_var_options['mashup_var_footer_widget_sidebar'] == $sidebar) {

                        $mashup_widget_start = '<aside class="widget col-lg-4 col-md-4 col-sm-6 col-xs-12 %2$s">';
                        $mashup_widget_end = '</aside>';
                    }
                    register_sidebar(array(
                        'name' => $sidebar,
                        'id' => $sidebar_id,
                        'description' => esc_html(mashup_var_theme_text_srt('mashup_var_widget_display_text')),
                        'before_widget' => $mashup_widget_start,
                        'after_widget' => $mashup_widget_end,
                        'before_title' => '<div class="widget-title"><h6>',
                        'after_title' => '</h6></div>'
                    ));
                }
            }

            $sidebar_name = '';
            if (isset($mashup_var_options['mashup_var_footer_sidebar']) && !empty($mashup_var_options['mashup_var_footer_sidebar'])) {
                $i = 0;
                foreach ($mashup_var_options['mashup_var_footer_sidebar'] as $mashup_var_footer_sidebar) {

                    $footer_sidebar_id = sanitize_title($mashup_var_footer_sidebar);
                    $sidebar_name = isset($mashup_var_options['mashup_var_footer_width']) ? $mashup_var_options['mashup_var_footer_width'] : '';
                    $mashup_sidebar_name = isset($sidebar_name[$i]) ? $sidebar_name[$i] : '';
                    $custom_width = str_replace('(', ' - ', $mashup_sidebar_name);
                    $mashup_widget_start = '<div class="widget %2$s">';
                    $mashup_widget_end = '</div>';

                    if (isset($mashup_var_options['mashup_var_footer_widget_sidebar']) && $mashup_var_options['mashup_var_footer_widget_sidebar'] == $mashup_var_footer_sidebar) {

                        $mashup_widget_start = '<aside class="widget col-lg-4 col-md-4 col-sm-6 col-xs-12 %2$s">';
                        $mashup_widget_end = '</aside>';
                    }

                    register_sidebar(array(
                        'name' => mashup_var_theme_text_srt('mashup_var_footer') . $mashup_var_footer_sidebar . ' ' . '(' . $custom_width . ' ',
                        'id' => $footer_sidebar_id,
                        'description' => mashup_var_theme_text_srt('mashup_var_widget_display_text'),
                        'before_widget' => $mashup_widget_start,
                        'after_widget' => $mashup_widget_end,
                        'before_title' => '<div class="widget-title"><h6>',
                        'after_title' => '</h6></div>'
                    ));
                    $i ++;
                }
            }
        } else {
            register_sidebar(array(
                'name' => mashup_var_theme_text_srt('mashup_var_widgets'),
                'id' => 'sidebar-1',
                'description' => mashup_var_theme_text_srt('mashup_var_widget_display_right_text'),
                'before_widget' => '<div class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<div class="widget-title"><h6>',
                'after_title' => '</h6></div>'
            ));
        }
    }

    add_action('widgets_init', 'mashup_widgets_init');
}
/**
 * Add meta tag in head.
 */
if (!function_exists('mashup_add_meta_tags')) {

    function mashup_add_meta_tags() {

        echo '<meta http-equiv="X-UA-Compatible" content="IE=edge" />';
    }

    add_action('wp_head', 'mashup_add_meta_tags', 2);
}

/**
 * Enqueue Google Fonts.
 */
if (!function_exists('mashup_load_google_font_families')) {

    function mashup_load_google_font_families() {
        if (mashup_is_fonts_loaded()) {
            $theme_version = mashup_get_theme_version();
            $fonts_array = mashup_is_fonts_loaded();
            $fonts_url = mashup_var_get_font_families($fonts_array);
            if ($fonts_url) {
                $font_url = add_query_arg('family', urlencode($fonts_url), "//fonts.googleapis.com/css");
                wp_enqueue_style('mashup-google-fonts', $font_url, array(), $theme_version);
            }
        }
    }

    add_action('wp_enqueue_scripts', 'mashup_load_google_font_families', 0);
}

/**
 * Enqueue scripts and styles.
 */
if (!function_exists('mashup_scripts_1')) {

    function mashup_scripts_1() {
        global $mashup_var_options;
        $mashup_var_theme_skin = isset($mashup_var_options['mashup_var_theme_skin']) ? $mashup_var_options['mashup_var_theme_skin'] : '';
        $theme_version = mashup_get_theme_version();
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/frontend/css/bootstrap.css');
        wp_enqueue_style('bootstrap-theme', get_template_directory_uri() . '/assets/frontend/css/bootstrap-theme.css');
        wp_enqueue_style('iconmoon', get_template_directory_uri() . '/assets/frontend/css/iconmoon.css');
        wp_enqueue_style('fancybox', get_template_directory_uri() . '/assets/frontend/css/fancybox.css');
        wp_enqueue_style('mashup-widget', get_template_directory_uri() . '/assets/frontend/css/widget.css');
        wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/frontend/css/swiper.css');
        wp_enqueue_style('font-montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:400,300,600,700,800|Lato:400,300,700,900');
        wp_enqueue_style('font-driod', 'https://fonts.googleapis.com/css?family=Droid+Serif:400,700');
        wp_enqueue_style('font-kaushan', 'https://fonts.googleapis.com/css?family=Kaushan+Script');
        wp_enqueue_style('light-css', get_template_directory_uri() . '/assets/frontend/css/light.css');
        wp_enqueue_style('font-open', 'https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600&subset=latin,cyrillic-ext');

        if ($mashup_var_theme_skin === 'dark') {
            wp_enqueue_style('mashup-dark', get_template_directory_uri() . '/assets/frontend/css/dark.css');
        } else {
            wp_enqueue_style('mashup-light', get_template_directory_uri() . '/assets/frontend/css/light.css');
        }
        wp_enqueue_style('mashup-style', get_stylesheet_uri());
        if (class_exists('WooCommerce')) {
            wp_enqueue_style('cs-woocommerce', trailingslashit(get_template_directory_uri()) . 'assets/frontend/css/cs-woocommerce.css');
            

        }
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/frontend/js/bootstrap.min.js', array('jquery'), $theme_version);
        wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/frontend/js/modernizr.js', array('jquery'), $theme_version, true);
        wp_enqueue_script('slick', get_template_directory_uri() . '/assets/frontend/js/slick.js', '', $theme_version, true);
        wp_enqueue_script('swiper-min', get_template_directory_uri() . '/assets/frontend/js/swiper.min.js', '', $theme_version, true);
        wp_enqueue_script('fitvids', get_template_directory_uri() . '/assets/frontend/js/jquery.fitvids.js', '', $theme_version, true);
        wp_enqueue_script('masonry', get_template_directory_uri() . '/assets/frontend/js/masonry.min.js', '', $theme_version, true);
        wp_enqueue_script('responsive-menu', get_template_directory_uri() . '/assets/frontend/js/responsive-menu.js', '', $theme_version, true);
        wp_enqueue_script('countdown', get_template_directory_uri() . '/assets/frontend/js/jquery.countdown.js', '', $theme_version, true);
        wp_enqueue_script('map-styles', get_template_directory_uri() . '/assets/frontend/js/cs-map-styles.js', '', $theme_version, true);
        wp_enqueue_script('fancybox', get_template_directory_uri() . '/assets/frontend/js/jquery.fancybox.js', '', $theme_version, true);
        wp_register_script('mashup-functions', get_template_directory_uri() . '/assets/frontend/js/functions.js', '', $theme_version, true);
        $mashup_code_array = array(
            'load_more' => esc_html__('Load More', 'mashup'),
            'loading' => esc_html__('Loading...', 'mashup'),
        );
        wp_localize_script('mashup-functions', 'load_blogs_strings', $mashup_code_array);
        wp_enqueue_script('mashup-functions');

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
        if (!function_exists('mashup_enqueue_google_map')) {

            function mashup_enqueue_google_map() {
                wp_enqueue_script('jquery-googleapis-js', 'https://maps.googleapis.com/maps/api/js?libraries=places', '', '', true);
                wp_enqueue_script('jquery-gmaps-latlon-picker-js', trailingslashit(get_template_directory_uri()) . 'assets/backend/js/jquery-gmaps-latlon-picker.js', '', '', true);
            }

        }
        if (!function_exists('mashup_enqueue_slick_script')) {

            function mashup_enqueue_slick_script() {
                wp_enqueue_script('slick', trailingslashit(get_template_directory_uri()) . '/assets/frontend/js/slick.js', '', '', true);
            }

        }

        if (!function_exists('mashup_addthis_script_init_method')) {

            function mashup_addthis_script_init_method() {
                wp_enqueue_script('addthis', 'https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57aab42bf4a35d7b', '', '', true);
            }

        }

        if (!function_exists('mashup_inline_enqueue_script')) {

            function mashup_inline_enqueue_script($script = '', $script_handler = 'custom') {
                wp_enqueue_script($script_handler);
                wp_add_inline_script($script_handler, $script);
            }

        }

        if (!function_exists('mashup_var_dynamic_scripts')) {

            function mashup_var_dynamic_scripts($mashup_js_key, $mashup_arr_key, $mashup_js_code) {
                // Register the script
                wp_register_script('mashup-dynamic-scripts', trailingslashit(get_template_directory_uri()) . 'assets/frontend/js/cs-inline-scripts-functions.js', '', '', true);
                // Localize the script
                $mashup_code_array = array(
                    $mashup_arr_key => $mashup_js_code
                );
                wp_localize_script('mashup-dynamic-scripts', $mashup_js_key, $mashup_code_array);
                wp_enqueue_script('mashup-dynamic-scripts');
            }

        }
    }

    add_action('wp_enqueue_scripts', 'mashup_scripts_1', 1);
}



/**
 * Enqueue scripts and styles.
 */
if (!function_exists('mashup_scripts_10')) {

    function mashup_scripts_10() {
        global $mashup_var_options;
        $mashup_responsive_site = isset($mashup_var_options['mashup_var_responsive']) ? $mashup_var_options['mashup_var_responsive'] : '';
        if (is_rtl()) {
            wp_enqueue_style('mashup-rtl', get_template_directory_uri() . '/assets/frontend/css/rtl.css');
        }
        if ($mashup_responsive_site == 'on') {
            $theme_version = mashup_get_theme_version();
            wp_enqueue_style('mashup-responsive', get_template_directory_uri() . '/assets/frontend/css/responsive.css', '', $theme_version);
        }
    }

    add_action('wp_enqueue_scripts', 'mashup_scripts_10', 10);
}

if (!function_exists('mashup_scripts_99')) {

    function mashup_scripts_99() {
        wp_enqueue_script('mashup-lower-scripts', trailingslashit(get_template_directory_uri()) . 'assets/frontend/js/lower-scripts.js', '', '', true);
    }

    add_action('wp_enqueue_scripts', 'mashup_scripts_99', 99);
}

if (!function_exists('mashup_header_color_styles')) {

    function mashup_header_color_styles() {
        global $mashup_var_options;
        $custom_style_ver = (isset($mashup_var_options['mashup_var_theme_option_save_flag'])) ? $mashup_var_options['mashup_var_theme_option_save_flag'] : '';
        wp_enqueue_style('mashup-default-element-style', trailingslashit(get_template_directory_uri()) . '/assets/frontend/css/default-element.css', '', $custom_style_ver);
    }

    add_action('wp_enqueue_scripts', 'mashup_header_color_styles', 9);
}
/**
 * Add Admin Page for 
 * Theme Options Menu
 */
if (!function_exists('mashup_var_options')) {

    add_action('admin_menu', 'mashup_var_options');

    function mashup_var_options() {
        global $mashup_var_static_text;
        $mashup_var_theme_options = mashup_var_theme_text_srt('mashup_var_theme_options');
        if (current_user_can('administrator')) {
            add_theme_page($mashup_var_theme_options, $mashup_var_theme_options, 'read', 'mashup_var_settings_page', 'mashup_var_settings_page');
        }
    }

}
/*
 * admin Enque Scripts
 */
if (!function_exists('mashup_var_admin_scripts_enqueue')) {

    function mashup_var_admin_scripts_enqueue() {
        $theme_version = mashup_get_theme_version();
        if (is_admin()) {
            global $mashup_var_template_path;
            $mashup_var_template_path = trailingslashit(get_template_directory_uri()) . 'assets/backend/js/cs-media-upload.js';
            wp_enqueue_style('fonticonpicker', trailingslashit(get_template_directory_uri()) . 'assets/common/icomoon/css/jquery.fonticonpicker.min.css', array(), $theme_version);
            wp_enqueue_style('fonticonpicker');
            wp_enqueue_style('iconmoon', trailingslashit(get_template_directory_uri()) . 'assets/common/icomoon/css/iconmoon.css');
            wp_enqueue_style('bootstrap', trailingslashit(get_template_directory_uri()) . 'assets/common/icomoon/theme/bootstrap-theme/jquery.fonticonpicker.bootstrap.css');
            wp_enqueue_style('chosen', trailingslashit(get_template_directory_uri()) . 'assets/backend/css/chosen.css');
            wp_enqueue_style('mashup-admin-style', trailingslashit(get_template_directory_uri()) . 'assets/backend/css/cs-admin-style.css');
            wp_enqueue_style('mashup-admin-bootstrap', trailingslashit(get_template_directory_uri()) . 'assets/backend/css/bootstrap.css');
            wp_enqueue_style('mashup-admin-lightbox', trailingslashit(get_template_directory_uri()) . 'assets/backend/css/lightbox.css');
            wp_enqueue_style('wp-color-picker');

            // all js script
            wp_enqueue_media();
            wp_enqueue_script('admin-upload', $mashup_var_template_path, array('jquery', 'media-upload', 'thickbox', 'jquery-ui-droppable', 'jquery-ui-datepicker', 'jquery-ui-slider', 'wp-color-picker'));
            wp_enqueue_script('fonticonpicker', trailingslashit(get_template_directory_uri()) . 'assets/common/icomoon/js/jquery.fonticonpicker.min.js');
            wp_enqueue_script('bootstrap', trailingslashit(get_template_directory_uri()) . 'assets/backend/js/bootstrap.min.js', '', '', true);
            wp_enqueue_style('jquery_datetimepicker', trailingslashit(get_template_directory_uri()) . 'assets/backend/css/jquery_datetimepicker.css');
            wp_enqueue_style('datepicker', trailingslashit(get_template_directory_uri()) . 'assets/backend/css/datepicker.css');
            wp_enqueue_style('jquery_ui_datepicker_theme', trailingslashit(get_template_directory_uri()) . 'assets/backend/css/jquery_ui_datepicker_theme.css');
            wp_enqueue_script('jquery_datetimepicker', trailingslashit(get_template_directory_uri()) . 'assets/backend/js/jquery_datetimepicker.js');
            wp_enqueue_script('mashup-theme-options', trailingslashit(get_template_directory_uri()) . 'assets/backend/js/cs-theme-option-fucntions.js', '', '', true);
            wp_enqueue_script('chosen-select', trailingslashit(get_template_directory_uri()) . 'assets/backend/js/chosen.select.js', '', '', true);
            wp_enqueue_script('mashup-custom-functions', trailingslashit(get_template_directory_uri()) . 'assets/backend/js/cs-fucntions.js', '', $theme_version, true);

            ////editor script
            wp_enqueue_script('editor-script', trailingslashit(get_template_directory_uri()) . 'assets/backend/editor/js/jquery-te-1.4.0.min.js');
            wp_enqueue_style('editor-style', trailingslashit(get_template_directory_uri()) . 'assets/backend/editor/css/jquery-te-1.4.0.css');

            if (!function_exists('mashup_admin_inline_enqueue_script')) {

                function mashup_admin_inline_enqueue_script($script = '', $script_handler = 'custom') {
                    wp_enqueue_script($script_handler);
                    wp_add_inline_script($script_handler, $script);
                }

            }

            if (!function_exists('mashup_admin_location_gmap_script')) {

                function mashup_admin_location_gmap_script() {
                    wp_enqueue_script('jquery-googleapis-js', 'https://maps.googleapis.com/maps/api/js?libraries=places', '', '', true);
                    wp_enqueue_script('jquery-gmaps-latlon-picker-js', trailingslashit(get_template_directory_uri()) . 'assets/backend/js/jquery-gmaps-latlon-picker.js', '', '', true);
                }

            }

            wp_register_script('mashup-framwork-colorpicker', $mashup_var_template_path);

            if (!function_exists('mashup_var_date_picker')) {

                function mashup_var_date_picker() {
                    global $mashup_var_template_path;
                    wp_enqueue_script('mashup-admin-upload', $mashup_var_template_path, array('jquery', 'media-upload'));
                }

            }
        }
    }

    add_action('admin_enqueue_scripts', 'mashup_var_admin_scripts_enqueue');
}

/*
 * Get current theme version
 */
if (!function_exists('mashup_get_theme_version')) {

    function mashup_get_theme_version() {
        $my_theme = wp_get_theme();
        $theme_version = $my_theme->get('Version');
        return $theme_version;
    }

}

/**
 * stripslashes string
 *
 * @since Auto Mobile 1.0
 */
if (!function_exists('mashup_var_stripslashes_htmlspecialchars')) {

    function mashup_var_stripslashes_htmlspecialchars($value) {
        $value = is_array($value) ? array_map('mashup_var_stripslashes_htmlspecialchars', $value) : stripslashes(htmlspecialchars($value));
        return $value;
    }

}

require_once ABSPATH . '/wp-admin/includes/file.php';

/**
 * Mega Menu.
 */
require_once trailingslashit(get_template_directory()) . 'include/mega-menu/custom-walker.php';
require_once trailingslashit(get_template_directory()) . 'include/mega-menu/edit-custom-walker.php';
require_once trailingslashit(get_template_directory()) . 'include/mega-menu/menu-functions.php';


/**
 * Implement the Custom Header feature.
 */
require_once trailingslashit(get_template_directory()) . 'include/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require_once trailingslashit(get_template_directory()) . 'include/template-tags.php';

/*
 * Inlcude themes required files for theme options
 */
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-custom-fields/cs-form-fields.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-custom-fields/cs-html-fields.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-admin-functions.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/importer-hooks.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-googlefont/cs-fonts-array.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-googlefont/cs-fonts.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-googlefont/cs-fonts-functions.php';
require_once trailingslashit(get_template_directory()) . 'include/extras.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-widgets/import/cs-class-widget-data.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-theme-options/cs-theme-options.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-theme-options/cs-theme-options-functions.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-theme-options/cs-theme-options-fields.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-theme-options/cs-theme-options-arrays.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-activation-plugins/cs-require-plugins.php';
require_once trailingslashit(get_template_directory()) . 'include/cs-class-parse.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/theme-config.php';
require_once trailingslashit(get_template_directory()) . 'include/frontend/cs-header.php';
require_once trailingslashit(get_template_directory()) . 'template-parts/blog/blog_element.php';
require_once trailingslashit(get_template_directory()) . 'template-parts/blog/blog_functions.php';
/*
 * Inlcude theme classes files
 */
require_once trailingslashit(get_template_directory()) . 'include/backend/classes/class-category-meta.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/classes/class-user-meta.php';
/*
 * Inlcude theme required files for widgets
 */

require_once trailingslashit(get_template_directory()) . 'include/backend/cs-widgets/cs-custom-menu.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-widgets/cs-flickr.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-widgets/cs-social-links.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-widgets/cs-ads.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-widgets/cs-contact-info.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-widgets/cs-recent-posts.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-widgets/cs-upcoming-events.php';

require_once trailingslashit(get_template_directory()) . 'include/backend/cs-widgets/cs-mailchimp.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-widgets/cs-twitter.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-widgets/cs-facebook.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-widgets/cs-latest-albums.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-widgets/cs-contact-us.php';
if (class_exists('woocommerce')) {
    require_once trailingslashit(get_template_directory()) . 'include/backend/cs-woocommerce/cs-config.php';
}
