<?php

/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package mashup
 */
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
if ( ! function_exists( 'mashup_body_classes' ) ) {

    function mashup_body_classes( $classes ) {
        global $mashup_var_options;
        // Adds a class of group-blog to blogs with more than 1 published author.
        if ( is_multi_author() ) {
            $classes[] = 'group-blog';
        }

        // Adds a class of hfeed to non-singular pages.
        if ( ! is_singular() ) {
            $classes[] = 'hfeed';
        }

        if ( ! get_option( 'mashup_var_options' ) ) {
            $classes[] = 'cs-blog-unit';
        }

        $header_view = isset( $mashup_var_options['mashup_var_select_header_Style'] ) ? $mashup_var_options['mashup_var_select_header_Style'] : '';

        return $classes;
    }

    add_filter( 'body_class', 'mashup_body_classes' );
}

/**
 * Include shortcodes backend and frontend as well.
 */
if ( ! function_exists( 'mashup_include_shortcodes' ) ) {


    function mashup_include_shortcodes() {
        /* shortcodes files */
        mashup_require_theme_files( 'include/backend/cs-shortcodes/' );
        mashup_require_theme_files( 'include/frontend/cs-shortcodes/' );
    }

    add_action( 'init', 'mashup_include_shortcodes', 1 );
}


/**
 * Social Networks Detail
 *
 * @param string $icon_type Icon Size.
 * @param string $tooltip Description.
 *
 */
if ( ! function_exists( 'mashup_social_network' ) ) {

    function mashup_social_network( $header9, $icon_type = '', $tooltip = '' ) {
        global $mashup_var_options;

        $social_font_awesome_color = isset( $mashup_var_options['mashup_var_social_icon_color'] ) ? $mashup_var_options['mashup_var_social_icon_color'] : '';
        $html = '';
        $tooltip_data = '';
        if ( $icon_type == 'large' ) {
            $icon = 'icon-2x';
        } else {

            $icon = '';
        }
        if ( isset( $tooltip ) && $tooltip <> '' ) {
            $tooltip_data = 'data-placement-tooltip="tooltip"';
        }
        if ( isset( $mashup_var_options['mashup_var_social_net_url'] ) and count( $mashup_var_options['mashup_var_social_net_url'] ) > 0 ) {
            $i = 0;

            $html .= '<ul class="social-media">';
            if ( is_array( $mashup_var_options['mashup_var_social_net_url'] ) ):
                foreach ( $mashup_var_options['mashup_var_social_net_url'] as $val ) {
                    if ( '' !== $val ) {
                        $html .= '<li>';
                        $html .= '<a href="' . $val . '" target="_blank">';
                        if ( $mashup_var_options['mashup_var_social_net_awesome'][$i] <> '' && isset( $mashup_var_options['mashup_var_social_net_awesome'][$i] ) ) {
                            $html .= '<i style=" color: ' . $mashup_var_options['mashup_var_social_icon_color'][$i] . ' !important;" class=" ' . $mashup_var_options['mashup_var_social_net_awesome'][$i] . $icon . '"></i>';
                        } else {
                            $html .= '<img title="' . $mashup_var_options['mashup_var_social_net_tooltip'][$i] . '" src="' . $mashup_var_options['mashup_var_social_icon_path_array'][$i] . '" alt="' . $mashup_var_options['mashup_var_social_net_tooltip'][$i] . '" />';
                        }
                        $html .= '</a>
                            </li>';
                    }
                    $i ++;
                }
            endif;
            $html .= '</ul>';
        }
        if ( $header9 == 1 ) {
            return $html;
        } else {
            echo force_balance_tags( $html );
        }
    }

}

/**
 * @Get sidebar name id
 *
 */
if ( ! function_exists( 'mashup_get_sidebar_id' ) ) {

    function mashup_get_sidebar_id( $mashup_page_sidebar_left = '' ) {

        return sanitize_title( $mashup_page_sidebar_left );
    }

}

/**
 * Start Function Allow Special Character
 */
if ( ! function_exists( 'mashup_allow_special_char' ) ) {

    function mashup_allow_special_char( $input = '' ) {
        $output = $input;
        return $output;
    }

}

if ( ! function_exists( 'mashup_get_excerpt' ) ) {

    function mashup_get_excerpt( $wordslength = '', $readmore = 'true', $readmore_text = 'Read More' ) {
        global $post, $mashup_var_options;
        if ( $wordslength == '' ) {
            $wordslength = $mashup_var_options['mashup_var_excerpt_length'] ? $mashup_var_options['mashup_var_excerpt_length'] : '30';
        }
        $excerpt = trim( preg_replace( '/<a[^>]*>(.*)<\/a>/iU', '', get_the_content() ) );

        if ( $readmore == 'true' ) {
            $more = ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '">' . esc_html( $readmore_text ) . '</a>';
        } else {
            $more = '...';
        }
        $excerpt_new = wp_trim_words( $excerpt, $wordslength, $more );

        return $excerpt_new;
    }

}

if ( ! function_exists( 'mashup_post_have_thumbnail' ) ) {

    function mashup_post_have_thumbnail( $id = '' ) {

        $post_thumbnail_id = get_post_thumbnail_id( $id );
        if ( $post_thumbnail_id !== '' ) {
            return true;
        }
        return false;
    }

}

//Posts title limit count

if ( ! function_exists( 'mashup_get_post_excerpt' ) ) {

    function mashup_get_post_excerpt( $string, $wordslength = '' ) {
        global $post;

        if ( $wordslength == '' ) {
            $wordslength = '500';
        }

        $excerpt = trim( preg_replace( '/<a[^>]*>(.*)<\/a>/iU', '', $string ) );
        $excerpt_new = wp_trim_words( $excerpt, $wordslength, ' ...' );

        return $excerpt_new;
    }

}

if ( ! function_exists( 'mashup_var_get_pagination' ) ) {

    function mashup_var_get_pagination( $total_pages = 1, $page = 1, $shortcode_paging ) {
        global $mashup_var_static_text;
        $strings = new mashup_theme_all_strings;
        $strings->mashup_short_code_strings();
        $query_string = $_SERVER['QUERY_STRING'];
        $base = get_permalink() . '?' . remove_query_arg( $shortcode_paging, $query_string ) . '%_%';
        $mashup_var_pagination = paginate_links( array(
            'base' => @add_query_arg( $shortcode_paging, '%#%' ),
            'format' => '&' . $shortcode_paging . '=%#%', // this defines the query parameter that will be used, in this case "p"
            'prev_text' => '<i class="icon-long-arrow-left"></i> ' . esc_html( mashup_var_theme_text_srt( 'mashup_var_prev' ) ), // text for previous page
            'next_text' => esc_html( mashup_var_theme_text_srt( 'mashup_var_next' ) ) . ' <i class="icon-long-arrow-right"></i>', // text for next page
            'total' => $total_pages, // the total number of pages we have
            'current' => $page, // the current page
            'end_size' => 1,
            'mid_size' => 2,
            'type' => 'array',
                ) );
        $mashup_var_pages = '';
        if ( is_array( $mashup_var_pagination ) && sizeof( $mashup_var_pagination ) > 0 ) {
            $mashup_var_pages .= '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
            $mashup_var_pages .= '<nav>';
            $mashup_var_pages .= '<ul class="pagination">';
            foreach ( $mashup_var_pagination as $mashup_var_link ) {
                if ( strpos( $mashup_var_link, 'current' ) !== false ) {
                    $mashup_var_pages .= '<li><a class="active">' . preg_replace( "/[^0-9]/", "", $mashup_var_link ) . '</a></li>';
                } else {
                    $mashup_var_pages .= '<li>' . $mashup_var_link . '</li>';
                }
            }
            $mashup_var_pages .= '</ul>';
            $mashup_var_pages .= ' </nav>';
            $mashup_var_pages .= '</div>';
        }
        echo force_balance_tags( $mashup_var_pages );
    }

}

if ( ! function_exists( 'mashup_get_posts_ajax_callback' ) ) {

    function mashup_get_posts_ajax_callback() {
        $category = isset( $_POST['category'] ) ? $_POST['category'] : '';
        $posts = array();
        if ( $category != '' ) {
            
        }
        echo json_encode( array( 'status' => true, 'posts' => $posts ) );
        wp_die();
    }

    add_action( "wp_ajax_mashup_get_posts", 'mashup_get_posts_ajax_callback' );
}

function mashup_var_get_attachment_id( $attachment_url ) {
    global $wpdb;
    $attachment_id = false;
    // If there is no url, return.
    if ( '' == $attachment_url )
        return;
    // Get the upload directory paths 
    $upload_dir_paths = wp_upload_dir();
    if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {
        // If this is the URL of an auto-generated thumbnail, get the URL of the original image 
        $attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
        // Remove the upload path base directory from the attachment URL 
        $attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );

        $attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );
    }
    return $attachment_id;
}

/*
 * Wordpress default gallery customization
 */
if ( ! function_exists( 'mashup_custom_format_gallery' ) ) {
    add_filter( 'post_gallery', 'mashup_custom_format_gallery', 10, 2 );

    function mashup_custom_format_gallery( $string, $attr ) {

        $output = "";
        if ( isset( $attr['ids'] ) ) {
            $output = "<div class='post-gallery'>";

            $posts = get_posts( array( 'post__in' => $attr['ids'], 'post_type' => 'attachment' ) );

            foreach ( $posts as $imagePost ) {

                $output .='<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><div class="media-holder"><figure><img src="' . wp_get_attachment_image_src( $imagePost->ID, 'mashup_media_3' )[0] . '" alt=""></figure></div></div>';
            }

            $output .= "</div>";
        }

        return $output;
    }

}

if ( function_exists( 'mashup_var_short_code' ) ) {
    mashup_var_short_code( 'widget', 'mashup_widget_shortcode' );
}

if ( ! function_exists( 'mashup_widget_shortcode' ) ) {

    function mashup_widget_shortcode( $atts ) {

        $a = shortcode_atts( array(
            'name' => 'something',
                ), $atts );

        echo esc_html( $a['name'] );
        $params = array( $a['name'] );

        dynamic_sidebar( $a['name'] );
        the_widget( 'WP_Widget_Archives' );
    }

}
if ( ! function_exists( 'mashup_hex2rgb' ) ) {

    function mashup_hex2rgb( $color ) {
        $color = trim( $color, '#' );
        if ( strlen( $color ) === 3 ) {
            $r = hexdec( substr( $color, 0, 1 ) . substr( $color, 0, 1 ) );
            $g = hexdec( substr( $color, 1, 1 ) . substr( $color, 1, 1 ) );
            $b = hexdec( substr( $color, 2, 1 ) . substr( $color, 2, 1 ) );
        } else if ( strlen( $color ) === 6 ) {
            $r = hexdec( substr( $color, 0, 2 ) );
            $g = hexdec( substr( $color, 2, 2 ) );
            $b = hexdec( substr( $color, 4, 2 ) );
        } else {
            return array();
        }

        return array( 'red' => $r, 'green' => $g, 'blue' => $b );
    }

}


/*
 * start function for custom pagination
 */
if ( ! function_exists( 'mashup_pagination' ) ) {

    function mashup_pagination( $total_records, $per_page, $qrystr = '', $show_pagination = 'Show Pagination', $page_var = 'paged' ) {

        if ( $show_pagination <> 'Show Pagination' ) {
            return;
        } else if ( $total_records < $per_page ) {
            return;
        } else {

            $html = '';
            $dot_pre = '';

            $dot_more = '';

            $total_page = 0;
            if ( $per_page <> 0 )
                $total_page = ceil( $total_records / $per_page );
            $page_id_all = 0;
            if ( isset( $_GET[$page_var] ) && $_GET[$page_var] != '' ) {
                $page_id_all = $_GET[$page_var];
            }

            $loop_start = $page_id_all - 2;

            $loop_end = $page_id_all + 2;

            if ( $page_id_all < 3 ) {

                $loop_start = 1;

                if ( $total_page < 5 )
                    $loop_end = $total_page;
                else
                    $loop_end = 5;
            }

            else if ( $page_id_all >= $total_page - 1 ) {

                if ( $total_page < 5 )
                    $loop_start = 1;
                else
                    $loop_start = $total_page - 4;

                $loop_end = $total_page;
            }

            $html .= '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><nav role="navigation"><ul class="pagination">';
            if ( $page_id_all > 1 ) {
                $html .= '<li><a href="?page_id_all=' . ($page_id_all - 1) . $qrystr . '"  class="prev page-numbers">
				' . mashup_var_theme_text_srt( 'mashup_var_prev' ) . ' </a></li>';
            } else {
                $html .= '<li><a class="prev page-numbers">' . mashup_var_theme_text_srt( 'mashup_var_prev' ) . '</a></li>';
            }

            if ( $page_id_all > 3 and $total_page > 5 )
                $html .= '<li><a class="page-numbers" href="?page_id_all=1' . $qrystr . '">1</a></li>';

            if ( $page_id_all > 4 and $total_page > 6 )
                $html .= '<li><a>. . .</a><li>';

            if ( $total_page > 1 ) {

                for ( $i = $loop_start; $i <= $loop_end; $i ++ ) {

                    if ( $i <> $page_id_all )
                        $html .= '<li><a class="page-numbers" href="?page_id_all=' . $i . $qrystr . '">' . $i . '</a></li>';
                    else
                        $html .= '<li><a class="page-numbers active">' . $i . '</a></li>';
                }
            }

            if ( $loop_end <> $total_page and $loop_end <> $total_page - 1 ) {
                $html .= '<li><a>. . .</a></li>';
            }

            if ( $loop_end <> $total_page ) {
                $html .= '<li><a href="?page_id_all={' . $total_page . '}{' . $qrystr . '}">' . $total_page . '</a></li>';
            }
            if ( $per_page > 0 and $page_id_all < ($total_records / $per_page) ) {

                $html .= '<li><a class="next page-numbers" href="?page_id_all=' . ($page_id_all + 1) . $qrystr . '" >' . mashup_var_theme_text_srt( 'mashup_var_next' ) . '</a></li>';
            } else {
                $html .= '<li><a class="next page-numbers">' . mashup_var_theme_text_srt( 'mashup_var_next' ) . ' </a><li>';
            }
            $html .= "</ul></nav></div>";
            return $html;
        }
    }

}


/**
 * @Custom CSS
 *
 */
if ( ! function_exists( 'mashup_write_stylesheet_content' ) ) {

    function mashup_write_stylesheet_content() {
        global $wp_filesystem, $mashup_var_options;
	//echo get_template_directory() . '/include/frontend/cs-theme-styles.php';;return true;
        require_once get_template_directory() . '/include/frontend/cs-theme-styles.php';
        $mashup_export_options = mashup_var_custom_style_theme_options();
        $fileStr = $mashup_export_options;
        $regex = array(
            "`^([\t\s]+)`ism" => '',
            "`^\/\*(.+?)\*\/`ism" => "",
            "`([\n\A;]+)\/\*(.+?)\*\/`ism" => "$1",
            "`([\n\A;\s]+)//(.+?)[\n\r]`ism" => "$1\n",
            "`(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+`ism" => "\n"
        );
        $newStr = preg_replace( array_keys( $regex ), $regex, $fileStr );
        $mashup_option_fields = $newStr;
		
        $backup_url = wp_nonce_url( 'themes.php?page=mashup_var_settings_page' );
        if ( false === ($creds = request_filesystem_credentials( $backup_url, '', false, false, array() ) ) ) {
            return true;
        }
        if ( ! WP_Filesystem( $creds ) ) {
            request_filesystem_credentials( $backup_url, '', true, false, array() );
            return true;
        }
        $mashup_upload_dir = get_template_directory() . '/assets/frontend/css/';
        $mashup_filename = trailingslashit( $mashup_upload_dir ) . 'default-element.css';
        if ( ! $wp_filesystem->put_contents( $mashup_filename, $mashup_option_fields, FS_CHMOD_FILE ) ) {
            
        }
    }

}


/**
 * Including the required files
 *
 * @since Mashup 1.0
 */
if ( ! function_exists( 'mashup_require_theme_files' ) ) {

    function mashup_require_theme_files( $mashup_path = '' ) {
        global $wp_filesystem;
        $backup_url = '';

        if ( false === ($creds = request_filesystem_credentials( $backup_url, '', false, false, array() ) ) ) {
            return true;
        }

        if ( ! WP_Filesystem( $creds ) ) {
            request_filesystem_credentials( $backup_url, '', true, false, array() );
            return true;
        }

        $mashup_sh_front_dir = trailingslashit( get_template_directory() ) . $mashup_path;

        $mashup_all_f_list = $wp_filesystem->dirlist( $mashup_sh_front_dir );

        if ( is_array( $mashup_all_f_list ) && sizeof( $mashup_all_f_list ) > 0 ) {

            foreach ( $mashup_all_f_list as $file_key => $file_val ) {

                if ( isset( $file_val['name'] ) ) {

                    $mashup_file_name = $file_val['name'];

                    $mashup_ext = pathinfo( $mashup_file_name, PATHINFO_EXTENSION );

                    if ( $mashup_ext == 'php' ) {
                        require_once trailingslashit( get_template_directory() ) . $mashup_path . $mashup_file_name;
                    }
                }
            }
        }
    }

}


/**
 * @Breadcrumb Function
 *
 */
if ( ! function_exists( 'mashup_breadcrumbs' ) ) {

    function mashup_breadcrumbs( $mashup_breadcrumb_color = '', $mashup_border = '' ) {
        global $wp_query, $mashup_var_options, $post, $mashup_var_static_text;
        /* === OPTIONS === */
        $mashup_var_current_page = mashup_var_theme_text_srt( 'mashup_var_current_page' );
        $mashup_var_error_404 = mashup_var_theme_text_srt( 'mashup_var_error_404' );
        $mashup_var_home = mashup_var_theme_text_srt( 'mashup_var_home' );


        $text['home'] = esc_html( $mashup_var_home ); // text for the 'Home' link
        $text['category'] = '%s'; // text for a category page
        $text['search'] = '%s'; // text for a search results page
        $text['tag'] = '%s'; // text for a tag page
        $text['author'] = '%s'; // text for an author page
        $text['404'] = esc_attr( $mashup_var_error_404 ); // text for the 404 page

        $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
        $showOnHome = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
        $delimiter = ''; // delimiter between crumbs
        $before = '<li class="active">'; // tag before the current crumb
        $after = '</li>'; // tag after the current crumb
        /* === END OF OPTIONS === */
        $current_page = $mashup_var_current_page;
        $homeLink = home_url() . '/';
        $linkBefore = '<li>';
        $linkAfter = '</li>';
        $linkAttr = '';
        $mashup_breadcrumb_color_style = '';
        $link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;
        $linkhome = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;

        $mashup_border_style = $mashup_border != '' ? ' style="border-top: 1px solid ' . $mashup_border . ';"' : '';

        if ( $mashup_breadcrumb_color != '' ) {
            $mashup_breadcrumb_color_style = '
			.breadcrumbs ul li,
			.breadcrumbs ul li a,
			.breadcrumbs ul li::before {
				color: ' . $mashup_breadcrumb_color . ' !important;
			}';
        }
        if ( function_exists( 'mashup_var_dynamic_scripts' ) && $mashup_breadcrumb_color_style != '' ) {
            mashup_var_dynamic_scripts( 'mashup_breadcrumb_color_style', 'css', $mashup_breadcrumb_color_style );
        }

        if ( is_home() || is_front_page() ) {
            if ( $showOnHome == "1" )
                echo '<div' . $mashup_border_style . ' class="breadcrumbs pull-right"><ul>' . $before . '<a href="' . $homeLink . '">' . $text['home'] . '</a>' . $after . '</ul></div>';
        } else {
            echo '<div' . $mashup_border_style . ' class="breadcrumbs pull-right"><ul>' . sprintf( $linkhome, $homeLink, $text['home'] ) . $delimiter;
            if ( is_category() ) {
                $thisCat = get_category( get_query_var( 'cat' ), false );
                if ( $thisCat->parent != 0 ) {
                    $cats = get_category_parents( $thisCat->parent, TRUE, $delimiter );
                    $cats = str_replace( '<a', $linkBefore . '<a' . $linkAttr, $cats );
                    $cats = str_replace( '</a>', '</a>' . $linkAfter, $cats );
                    echo force_balance_tags( $cats );
                }
                echo mashup_allow_special_char( $before ) . sprintf( $text['category'], single_cat_title( '', false ) ) . mashup_allow_special_char( $after );
            } elseif ( is_search() ) {

                echo mashup_allow_special_char( $before ) . sprintf( $text['search'], get_search_query() ) . $after;
            } elseif ( is_day() ) {

                echo sprintf( $link, get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $delimiter;
                echo sprintf( $link, get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ), get_the_time( 'F' ) ) . $delimiter;
                echo mashup_allow_special_char( $before ) . get_the_time( 'd' ) . $after;
            } elseif ( is_month() ) {

                echo sprintf( $link, get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $delimiter;
                echo mashup_allow_special_char( $before ) . get_the_time( 'F' ) . $after;
            } elseif ( is_year() ) {

                echo mashup_allow_special_char( $before ) . get_the_time( 'Y' ) . $after;
            } elseif ( is_single() && ! is_attachment() ) {

                if ( function_exists( "is_shop" ) && get_post_type() == 'product' ) {
                    $mashup_shop_page_id = wc_get_page_id( 'shop' );
                    $current_page = get_the_title( get_the_id() );
                    $mashup_shop_page = "<li><a href='" . esc_url( get_permalink( $mashup_shop_page_id ) ) . "'>" . get_the_title( $mashup_shop_page_id ) . "</a></li>";
                    echo mashup_allow_special_char( $mashup_shop_page );
                    if ( $showCurrent == 1 )
                        echo mashup_allow_special_char( $before ) . $current_page . $after;
                }
                else if ( get_post_type() != 'post' ) {
                    $post_type = get_post_type_object( get_post_type() );
                    $slug = $post_type->rewrite;
                    printf( $link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name );
                    if ( $showCurrent == 1 )
                        echo mashup_allow_special_char( $delimiter ) . $before . $current_page . $after;
                } else {

                    $cat = get_the_category();
                    $cat = $cat[0];
                    $cats = get_category_parents( $cat, TRUE, $delimiter );
                    if ( $showCurrent == 0 )
                        $cats = preg_replace( "#^(.+)$delimiter$#", "$1", $cats );
                    $cats = str_replace( '<a', $linkBefore . '<a' . $linkAttr, $cats );
                    $cats = str_replace( '</a>', '</a>' . $linkAfter, $cats );
                    echo mashup_allow_special_char( $cats );

                    if ( $showCurrent == 1 )
                        echo mashup_allow_special_char( $before ) . $current_page . $after;
                }
            } elseif ( ! is_single() && ! is_page() && get_post_type() <> '' && get_post_type() != 'post' && ! is_404() ) {

                $post_type = get_post_type_object( get_post_type() );
                echo mashup_allow_special_char( $before ) . $post_type->labels->singular_name . $after;
            } elseif ( isset( $wp_query->query_vars['taxonomy'] ) && ! empty( $wp_query->query_vars['taxonomy'] ) ) {

                $taxonomy = $taxonomy_category = '';
                $taxonomy = $wp_query->query_vars['taxonomy'];
                echo mashup_allow_special_char( $before ) . $taxonomy . $after;
            } elseif ( is_page() && ! $post->post_parent ) {

                if ( $showCurrent == 1 )
                    echo mashup_allow_special_char( $before ) . get_the_title() . $after;
            } elseif ( is_page() && $post->post_parent ) {

                $parent_id = $post->post_parent;
                $breadcrumbs = array();
                while ( $parent_id ) {
                    $page = get_page( $parent_id );
                    $breadcrumbs[] = sprintf( $link, get_permalink( $page->ID ), get_the_title( $page->ID ) );
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse( $breadcrumbs );
                for ( $i = 0; $i < count( $breadcrumbs ); $i ++ ) {
                    echo mashup_allow_special_char( $breadcrumbs[$i] );
                    if ( $i != count( $breadcrumbs ) - 1 )
                        echo mashup_allow_special_char( $delimiter );
                }
                if ( $showCurrent == 1 )
                    echo mashup_allow_special_char( $delimiter . $before . get_the_title() . $after );
            } elseif ( is_tag() ) {

                echo mashup_allow_special_char( $before ) . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;
            } elseif ( is_author() ) {

                global $author;
                $userdata = get_userdata( $author );
                echo mashup_allow_special_char( $before ) . sprintf( $text['author'], $userdata->display_name ) . $after;
            } elseif ( is_404() ) {

                echo mashup_allow_special_char( $before ) . $text['404'] . $after;
            }
            echo '</ul></div>';
        }
    }

}



/**
 * Default Pages title.
 *
 * @since Auto Mobile 1.0
 */
if ( ! function_exists( 'mashup_post_page_title' ) ) {

    function mashup_post_page_title() {

        $mashup_var_search_result = mashup_var_theme_text_srt( 'mashup_var_search_result' );
        $mashup_var_author = mashup_var_theme_text_srt( 'mashup_var_author' );
        $mashup_var_archives = mashup_var_theme_text_srt( 'mashup_var_archives' );
        $mashup_var_daily_archives = mashup_var_theme_text_srt( 'mashup_var_daily_archives' );
        $mashup_var_monthly_archives = mashup_var_theme_text_srt( 'mashup_var_monthly_archives' );
        $mashup_var_yearly_archives = mashup_var_theme_text_srt( 'mashup_var_yearly_archives' );
        $mashup_var_tags = mashup_var_theme_text_srt( 'mashup_var_tags' );
        $mashup_var_category = mashup_var_theme_text_srt( 'mashup_var_category' );
        $mashup_var_error_404 = mashup_var_theme_text_srt( 'mashup_var_error_404' );
        $mashup_var_home = mashup_var_theme_text_srt( 'mashup_var_home' );

        if ( ! is_page() && ! is_singular() && ! is_search() && ! is_404() && ! is_front_page() && (function_exists( 'is_shop' ) && ! is_shop() ) ) {
            the_archive_title();
        } elseif ( is_search() ) {
            printf( $mashup_var_search_result, '<span>' . get_search_query() . '</span>' );
        } elseif ( is_404() ) {
            echo esc_attr( $mashup_var_error_404 );
        } elseif ( is_home() ) {
            echo esc_html( $mashup_var_home );
        } elseif ( is_page() || is_singular() ) {
            echo esc_html( get_the_title() );
        } elseif ( function_exists( 'is_shop' ) && is_shop() ) {
            $mashup_var_post_ID = wc_get_page_id( 'shop' );
            echo esc_html( get_the_title( $mashup_var_post_ID ) );
        }
    }

}



/*
 * Include file function
 */
if ( ! function_exists( 'mashup_include_file' ) ) {

    function mashup_include_file( $file_path = '', $inc = false ) {
        if ( $file_path != '' ) {
            if ( $inc == true ) {
                include $file_path;
            } else {
                require_once $file_path;
            }
        }
    }

}