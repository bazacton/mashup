<?php
/**
 * Header Functions
 *
 * @package WordPress
 * @subpackage mashup
 * @since Auto Mobile 1.0
 */
if ( ! get_option( 'mashup_var_options' ) ) {
    $mashup_activation_data = mashup_theme_default_options();
    if ( is_array( $mashup_activation_data ) && sizeof( $mashup_activation_data ) > 0 ) {
        $mashup_var_options = $mashup_activation_data;
    } else {
        mashup_include_file( trailingslashit( get_template_directory() ) . 'include/backend/cs-global-variables.php', true );
    }
}

if ( ! function_exists( 'mashup_custom_pages_menu' ) ) {

    function mashup_custom_pages_menu() {
        $cs_menu = wp_list_pages( array(
            'title_li' => '',
            'echo' => false,
                ) );

        echo '<ul>' . mashup_allow_special_char( $cs_menu ) . '</ul>';
    }

}

if ( ! function_exists( 'mashup_header_main_menu' ) ) {

    function mashup_header_main_menu() {
        if ( has_nav_menu( 'primary' ) ) {
            global $mashup_var_options;
            $custom_id = '';
            $header_view = isset( $mashup_var_options['mashup_var_select_header_Style'] ) ? $mashup_var_options['mashup_var_select_header_Style'] : '';
            if ( 'view-7' === $header_view ) {
                $custom_id = 'main_nav';
            } else {
                $custom_id = 'site-navigation';
            }
            ?>
            <nav id="<?php echo esc_html( $custom_id ); ?>" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'mashup' ); ?>">
                <?php
                wp_nav_menu( array(
                    'container' => ' ',
                    'theme_location' => 'primary',
                    'menu_class' => 'primary-menu',
                    'walker' => new mashup_mega_menu_walker( 'main' )
                ) );
                ?>
            </nav><!-- .main-navigation -->
            <?php
        } else {
            ?>
            <nav class="main-navigation" id="main_nav">
                <?php
                wp_nav_menu( array(
                    'container' => ' ',
                    'theme_location' => '',
                    'fallback_cb' => 'mashup_custom_pages_menu',
                ) );
                ?>
            </nav><!-- .main-navigation -->
            <?php
        }

        mashup_seperate_search_form();
    }

}
/*
  seperate search form outsite menu li
 */
if ( ! function_exists( 'mashup_seperate_search_form' ) ) {

    function mashup_seperate_search_form() {
        global $mashup_var_options, $mashup_var_form_fields;
        $mashup_search_holder = isset( $mashup_var_options['mashup_var_header_search_icon'] ) ? $mashup_var_options['mashup_var_header_search_icon'] : '';

        if ( 'on' === $mashup_search_holder ) {
            $items_search = '';
            $items_search .= '<div class="gn-search-holder">';
            $items_search .= '<div class="gn-filed"><a href="javascript:void(0)"><i class="icon-search2"></i></a>';
            $items_search .= '<form method="get" action="' . esc_url( home_url( '/' ) ) . '"><div class="search-container">';
            $mashup_opt_array = array(
                'std' => esc_html( get_search_query() ),
                'id' => '',
                'classes' => 'form-control txt-bar',
                'extra_atr' => 'onfocus="if (this.value == \'' . mashup_var_theme_text_srt( 'mashup_var_enter_your_search' ) . '\') {
								this.value = \'\';
							}" 
						   onblur="if (this.value == \'\') {
									   this.value = \'' . mashup_var_theme_text_srt( 'mashup_var_enter_your_search' ) . '\';
								   }" 
						   placeholder="' . mashup_var_theme_text_srt( 'mashup_var_enter_your_search' ) . '"',
                'cust_id' => 's',
                'cust_name' => 's',
                'return' => true,
                'required' => false
            );

            $items_search .= mashup_allow_special_char( $mashup_var_form_fields->mashup_var_form_text_render( $mashup_opt_array ) );
            $items_search .='<i href="#" class="icon-cross"></i></div>';
            $items_search .= '<label>';
            $mashup_opt_array = array(
                'std' => mashup_var_theme_text_srt( 'mashup_var_search_button' ),
                'id' => '',
                'before' => '',
                'after' => '',
                'classes' => 'btn-submit',
                'extra_atr' => '',
                'cust_id' => '',
                'cust_name' => '',
                'return' => true,
                'required' => false
            );
            $items_search .= mashup_allow_special_char( $mashup_var_form_fields->mashup_var_form_submit_render( $mashup_opt_array ) );
            $items_search .= '</label>';

            $items_search .= '</form></div>';
            $items_search .= '</div>';
            echo force_balance_tags( $items_search );
        }
    }

}
if ( ! function_exists( 'mashup_header_view_1' ) ) {

    function mashup_header_view_1() {
        global $mashup_var_options;
        $mashup_custom_logo = isset( $mashup_var_options['mashup_var_custom_logo'] ) ? $mashup_var_options['mashup_var_custom_logo'] : '';
        $mashup_custom_logo_switch = isset( $mashup_var_options['mashup_var_custom_logo_switch'] ) ? $mashup_var_options['mashup_var_custom_logo_switch'] : '';
        $mashup_custom_logo_Style = isset( $mashup_var_options['mashup_var_custom_logo_Style'] ) ? $mashup_var_options['mashup_var_custom_logo_Style'] : '';
        $mashup_header_layout = isset( $mashup_var_options['mashup_var_header_layout'] ) ? $mashup_var_options['mashup_var_header_layout'] : '';
        $mashup_trans_header = isset( $mashup_var_options['mashup_var_trans_header'] ) ? $mashup_var_options['mashup_var_trans_header'] : '';

        $mashup_logo_height = isset( $mashup_var_options['mashup_var_logo_height'] ) ? $mashup_var_options['mashup_var_logo_height'] : '';
        $mashup_logo_width = isset( $mashup_var_options['mashup_var_logo_width'] ) ? $mashup_var_options['mashup_var_logo_width'] : '';
        $mashup_autosidebar = isset( $mashup_var_options['mashup_var_autosidebar'] ) ? $mashup_var_options['mashup_var_autosidebar'] : '';

        $style_string = '';
        if ( '' !== $mashup_logo_width || '' !== $mashup_logo_height ) {
            $style_string = 'style="';
            if ( '' !== $mashup_logo_width ) {
                $style_string .= 'width:' . absint( $mashup_logo_width ) . 'px;';
            }
            if ( '' !== $mashup_logo_height ) {
                $style_string .= 'height:' . absint( $mashup_logo_height ) . 'px;';
            }

            $style_string .= '"';
        }
        $logo_class = 'left';
        if ( (isset( $mashup_custom_logo_switch ) && $mashup_custom_logo_switch == 'on') && (isset( $mashup_custom_logo_Style ) && $mashup_custom_logo_Style == 'right') ) {
            $logo_class = 'right';
        }
        if ( (isset( $mashup_custom_logo_switch ) && $mashup_custom_logo_switch == 'on') && (isset( $mashup_custom_logo_Style ) && $mashup_custom_logo_Style == 'in-menu') ) {
            $logo_class = 'center';
        }
        $header_container = 'container';
        if ( $mashup_header_layout == 'wide' ) {
            $header_container = 'fullwidth';
        } else {
            $header_container = 'container';
        }
        $transparent_class = '';
        if ( $mashup_trans_header == 'on' ) {
            $transparent_class = 'transparent-header';
        } else {
            $transparent_class = '';
        }
        ?>
        <header id="header" class="modren <?php echo esc_html( $logo_class ); ?> <?php echo esc_html( $transparent_class ); ?> ">
            <div class="main-header">
                <div class="<?php echo esc_html( $header_container ); ?>">
                    <?php if ( (isset( $mashup_custom_logo_switch ) && $mashup_custom_logo_switch == 'on') && (isset( $mashup_custom_logo_Style ) && (($mashup_custom_logo_Style == 'left') || ($mashup_custom_logo_Style == 'right')) ) ) { ?>
                        <div class="main-logo"><a href="<?php echo esc_url( home_url( '/' ) ) ?>">
                                <?php if ( $mashup_custom_logo != '' ) {
                                    ?>
                                    <img src="<?php echo esc_url( $mashup_custom_logo ) ?>" <?php echo mashup_allow_special_char( $style_string ); ?> alt="<?php esc_html( bloginfo( 'name' ) ) ?>">
                                    <?php
                                } else {
                                    ?>
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-classic.png' ) ?>" <?php echo mashup_allow_special_char( $style_string ); ?> alt="<?php esc_html( bloginfo( 'name' ) ) ?>">
                                    <?php
                                }
                                ?>
                            </a>
                        </div>    
                    <?php } ?>
                    <div class="main-nav">
                        <?php mashup_header_main_menu() ?>
                    </div>
                    <?php
					if ( wp_is_mobile() ) {
						?>
						<div class="user-option">
							<?php do_action( 'mashup_header_user_option', '' ) ?>
						</div>
						<?php
					}
					?>
                </div>
            </div>
        </header>

        <?php
    }

}

if ( ! function_exists('mashup_append_menu_item') ) {
	add_filter('wp_nav_menu_items', 'mashup_append_menu_item', 10, 2);

	function mashup_append_menu_item($items, $args) {
		if ( $args->theme_location == 'primary' && ! wp_is_mobile() ) {
			ob_start();
			?>
            <li class="masup-extra-menu">
                <div class="user-option">
                    <?php do_action( 'mashup_header_user_option', '' ) ?>
                </div>
            </li>
            <?php
			$items_append = ob_get_clean();
			return $items . $items_append;
		}
		return $items;
	}
}

if ( ! function_exists( 'mashup_main_header' ) ) {

    function mashup_main_header() {

        global $mashup_var_options;
        $header_view = isset( $mashup_var_options['mashup_var_select_header_Style'] ) ? $mashup_var_options['mashup_var_select_header_Style'] : '';
        mashup_header_view_1();
    }

}


if ( ! function_exists( 'mashup_var_subheader_style' ) ) {

    function mashup_var_subheader_style( $mashup_var_post_ID = '' ) {
        global $post, $wp_query, $mashup_var_options, $mashup_var_post_meta;
        $post_type = get_post_type( get_the_ID() );
        $mashup_var_post_ID = get_the_ID();
        if ( is_search() || is_category() || is_home() || is_404() || is_archive() ) {
            $mashup_var_post_ID = '';
        }
		if ( function_exists( 'is_shop' ) ) {
            if ( is_shop() ) {
                $mashup_var_post_ID = wc_get_page_id( 'shop' );
            }
        }
        $meta_element = 'mashup_full_data';
        $mashup_var_post_meta = get_post_meta( (int) $mashup_var_post_ID, "$meta_element", true );
        $mashup_var_header_banner_style = get_post_meta( (int) $mashup_var_post_ID, "mashup_var_header_banner_style", true );

        if ( isset( $mashup_var_header_banner_style ) && $mashup_var_header_banner_style == 'no-header' ) {
            $mashup_var_header_border_color = get_post_meta( (int) $mashup_var_post_ID, "mashup_var_main_header_border_color", true );
            if ( $mashup_var_header_border_color <> '' ) {
                $mashup_header_border_style = '
				#header {
                    border-bottom: 1px solid ' . $mashup_var_header_border_color . ';
                }';
                mashup_var_dynamic_scripts( 'mashup_header_border_style', 'css', $mashup_header_border_style );
            }
            echo '<div class="cs-no-subheader"></div>';
        } else if ( isset( $mashup_var_header_banner_style ) && $mashup_var_header_banner_style == 'breadcrumb_header' ) {

            mashup_var_breadcrumb_page_setting( $mashup_var_post_ID );
        } else if ( isset( $mashup_var_header_banner_style ) && $mashup_var_header_banner_style == 'custom_slider' ) {

            mashup_var_rev_slider( 'pages', $mashup_var_post_ID );
        } else if ( isset( $mashup_var_header_banner_style ) && $mashup_var_header_banner_style == 'map' ) {

            mashup_var_page_map( $mashup_var_post_ID );
        } else if ( isset( $mashup_var_options['mashup_var_default_header'] ) ) {

            if ( $mashup_var_options['mashup_var_default_header'] == 'no_header' ) {
                $mashup_var_header_border_color = isset( $mashup_var_options['mashup_var_header_border_color'] ) ? $mashup_var_options['mashup_var_header_border_color'] : '';
                if ( $mashup_var_header_border_color <> '' ) {
                    $mashup_header_border_style = '
                    #header .cs-main-nav .pinned {
                        border-bottom: 1px solid ' . $mashup_var_header_border_color . ';
                    }';
                    mashup_var_dynamic_scripts( 'mashup_header_border_style', 'css', $mashup_header_border_style );
                }
            } else if ( $mashup_var_options['mashup_var_default_header'] == 'breadcrumbs_sub_header' ) {
                mashup_var_breadcrumb_theme_option( $mashup_var_post_ID );
            } else if ( $mashup_var_options['mashup_var_default_header'] == 'slider' ) {

                mashup_var_rev_slider( 'default-pages', $mashup_var_post_ID );
            }
        }
    }

}

/*
 * Start Rev slider function
 */

if ( ! function_exists( 'mashup_var_rev_slider' ) ) {

    function mashup_var_rev_slider( $mashup_var_slider_type = '', $mashup_var_post_ID = '' ) {
        global $post, $post_meta, $mashup_var_options;

        if ( $mashup_var_slider_type == 'pages' ) {
            $mashup_var_rev_slider_id = get_post_meta( (int) $mashup_var_post_ID, "mashup_var_custom_slider_id", true );
        } else {
            $mashup_var_rev_slider_id = isset( $mashup_var_options['mashup_var_custom_slider'] ) ? $mashup_var_options['mashup_var_custom_slider'] : '';
        }
        if ( isset( $mashup_var_rev_slider_id ) && $mashup_var_rev_slider_id != '' ) {
            ?>
            <div class="cs-banner"> <?php echo do_shortcode( "[rev_slider alias=\"{$mashup_var_rev_slider_id}\"]" ); ?> </div>
            <?php
        }
    }

}

/*
 * Start page map function
 */

if ( ! function_exists( 'mashup_var_page_map' ) ) {

    function mashup_var_page_map( $mashup_var_post_ID = '' ) {
        global $post, $post_meta, $header_map;
        $mashup_var_custom_map = get_post_meta( (int) $mashup_var_post_ID, "mashup_var_custom_map", true );
        if ( empty( $mashup_var_custom_map ) ) {
            $mashup_var_custom_map = "";
        } else {
            $mashup_var_custom_map = html_entity_decode( $mashup_var_custom_map );
        }
        if ( isset( $mashup_var_custom_map ) && $mashup_var_custom_map != '' ) {
            $header_map = true;
            ?>
            <div class="cs-fullmap"> <?php echo do_shortcode( $mashup_var_custom_map ); ?> </div>
            <?php
        }
    }

}

/**
 * @subheader page 
 * setting breadcrums
 */
if ( ! function_exists( 'mashup_var_breadcrumb_page_setting' ) ) {

    function mashup_var_breadcrumb_page_setting() {
        global $post, $wp_query, $mashup_var_options, $post_meta;
        $meta_element = 'mashup_full_data';
        $mashup_var_post_ID = get_the_ID();
        if ( function_exists( 'is_shop' ) ) {
            if ( is_shop() ) {
                $mashup_var_post_ID = wc_get_page_id( 'shop' );
            }
        }
        $post_meta = get_post_meta( (int) $mashup_var_post_ID, "$meta_element", true );

        $mashup_var_sub_header_style = get_post_meta( (int) $mashup_var_post_ID, "mashup_var_sub_header_style", true );
        $mashup_var_sub_header_sub_hdng = get_post_meta( (int) $mashup_var_post_ID, "mashup_var_page_subheading_title", true );
        $mashup_var_header_banner_image = get_post_meta( (int) $mashup_var_post_ID, "mashup_var_header_banner_image", true );
        $mashup_var_page_subheader_parallax = get_post_meta( (int) $mashup_var_post_ID, "mashup_var_page_subheader_parallax", true );
        $mashup_var_page_subheader_color = get_post_meta( (int) $mashup_var_post_ID, "mashup_var_page_subheader_color", true );
        $mashup_var_page_title_switch = get_post_meta( (int) $mashup_var_post_ID, "mashup_var_page_title_switch", true );
        $mashup_var_sub_header_align = get_post_meta( (int) $mashup_var_post_ID, "mashup_var_sub_header_align", true );
        $mashup_var_page_breadcrumbs = get_post_meta( (int) $mashup_var_post_ID, "mashup_var_page_breadcrumbs", true );
        $mashup_var_subheader_padding_top = get_post_meta( (int) $mashup_var_post_ID, "mashup_var_subheader_padding_top", true );
        $mashup_var_subheader_padding_bottom = get_post_meta( (int) $mashup_var_post_ID, "mashup_var_subheader_padding_bottom", true );
        $mashup_var_subheader_margin_top = get_post_meta( (int) $mashup_var_post_ID, "mashup_var_subheader_margin_top", true );
        $mashup_var_subheader_margin_bottom = get_post_meta( (int) $mashup_var_post_ID, "mashup_var_subheader_margin_bottom", true );
        $mashup_var_page_subheader_text_color = get_post_meta( (int) $mashup_var_post_ID, "mashup_var_page_subheader_text_color", true );

        $mashup_all_fields = array(
            'mashup_var_post_ID' => $mashup_var_post_ID,
            'mashup_var_sub_header_style' => $mashup_var_sub_header_style,
            'mashup_var_sub_header_sub_hdng' => $mashup_var_sub_header_sub_hdng,
            'mashup_var_header_banner_image' => $mashup_var_header_banner_image,
            'mashup_var_page_subheader_parallax' => $mashup_var_page_subheader_parallax,
            'mashup_var_page_subheader_color' => $mashup_var_page_subheader_color,
            'mashup_var_sub_header_align' => $mashup_var_sub_header_align,
            'mashup_var_page_title_switch' => $mashup_var_page_title_switch,
            'mashup_var_page_breadcrumbs' => $mashup_var_page_breadcrumbs,
            'mashup_var_subheader_padding_top' => $mashup_var_subheader_padding_top,
            'mashup_var_subheader_padding_bottom' => $mashup_var_subheader_padding_bottom,
            'mashup_var_subheader_margin_top' => $mashup_var_subheader_margin_top,
            'mashup_var_subheader_margin_bottom' => $mashup_var_subheader_margin_bottom,
            'mashup_var_page_subheader_text_color' => $mashup_var_page_subheader_text_color,
        );
        mashup_var_breadcrumb_markup( $mashup_all_fields );
    }

}

/**
 * @subheader page 
 * breadcrums settings
 */
if ( ! function_exists( 'mashup_var_breadcrumb_theme_option' ) ) {

    function mashup_var_breadcrumb_theme_option() {
        global $mashup_var_options;
        $mashup_var_post_ID = get_the_ID();
        if ( function_exists( 'is_shop' ) ) {
            if ( is_shop() ) {
                $mashup_var_post_ID = wc_get_page_id( 'shop' );
            }
        }

        $mashup_var_sub_header_style = isset( $mashup_var_options['mashup_var_sub_header_style'] ) ? $mashup_var_options['mashup_var_sub_header_style'] : '';
        $mashup_var_sub_header_sub_hdng = isset( $mashup_var_options['mashup_var_sub_header_sub_hdng'] ) ? $mashup_var_options['mashup_var_sub_header_sub_hdng'] : '';
        $mashup_var_header_banner_image = isset( $mashup_var_options['mashup_var_sub_header_bg_img'] ) ? $mashup_var_options['mashup_var_sub_header_bg_img'] : '';
        $mashup_var_page_subheader_parallax = isset( $mashup_var_options['mashup_var_sub_header_parallax'] ) ? $mashup_var_options['mashup_var_sub_header_parallax'] : '';
        $mashup_var_page_subheader_color = isset( $mashup_var_options['mashup_var_sub_header_bg_clr'] ) ? $mashup_var_options['mashup_var_sub_header_bg_clr'] : '';
        $mashup_var_page_title_switch = isset( $mashup_var_options['mashup_var_page_title_switch'] ) ? $mashup_var_options['mashup_var_page_title_switch'] : '';
        $mashup_var_sub_header_align = isset( $mashup_var_options['mashup_var_sub_header_align'] ) ? $mashup_var_options['mashup_var_sub_header_align'] : '';
        $mashup_var_page_breadcrumbs = isset( $mashup_var_options['mashup_var_breadcrumbs_switch'] ) ? $mashup_var_options['mashup_var_breadcrumbs_switch'] : '';
        $mashup_var_subheader_padding_top = isset( $mashup_var_options['mashup_var_sh_paddingtop'] ) ? $mashup_var_options['mashup_var_sh_paddingtop'] : '';
        $mashup_var_subheader_padding_bottom = isset( $mashup_var_options['mashup_var_sh_paddingbottom'] ) ? $mashup_var_options['mashup_var_sh_paddingbottom'] : '';
        $mashup_var_subheader_margin_top = isset( $mashup_var_options['mashup_var_sh_margintop'] ) ? $mashup_var_options['mashup_var_sh_margintop'] : '';
        $mashup_var_subheader_margin_bottom = isset( $mashup_var_options['mashup_var_sh_marginbottom'] ) ? $mashup_var_options['mashup_var_sh_marginbottom'] : '';
        $mashup_var_page_subheader_text_color = isset( $mashup_var_options['mashup_var_sub_header_text_color'] ) ? $mashup_var_options['mashup_var_sub_header_text_color'] : '';

        $mashup_all_fields = array(
            'mashup_var_post_ID' => $mashup_var_post_ID,
            'mashup_var_sub_header_style' => $mashup_var_sub_header_style,
            'mashup_var_sub_header_sub_hdng' => $mashup_var_sub_header_sub_hdng,
            'mashup_var_header_banner_image' => $mashup_var_header_banner_image,
            'mashup_var_page_subheader_parallax' => $mashup_var_page_subheader_parallax,
            'mashup_var_page_subheader_color' => $mashup_var_page_subheader_color,
            'mashup_var_page_title_switch' => $mashup_var_page_title_switch,
            'mashup_var_sub_header_align' => $mashup_var_sub_header_align,
            'mashup_var_page_breadcrumbs' => $mashup_var_page_breadcrumbs,
            'mashup_var_subheader_padding_top' => $mashup_var_subheader_padding_top,
            'mashup_var_subheader_padding_bottom' => $mashup_var_subheader_padding_bottom,
            'mashup_var_subheader_margin_top' => $mashup_var_subheader_margin_top,
            'mashup_var_subheader_margin_bottom' => $mashup_var_subheader_margin_bottom,
            'mashup_var_page_subheader_text_color' => $mashup_var_page_subheader_text_color,
        );

        $mashup_sub_header_view = true;

        if ( $mashup_sub_header_view == true ) {
            mashup_var_breadcrumb_markup( $mashup_all_fields );
        }
    }

}

/**
 * @subheader styles 
 * markup
 */
if ( ! function_exists( 'mashup_var_breadcrumb_markup' ) ) {

    function mashup_var_breadcrumb_markup( $mashup_fields = array() ) {

        extract( $mashup_fields );
        global $post;
        $mashup_sub_style = '';
        $mashup_var_sub_header_align = isset( $mashup_var_sub_header_align ) && $mashup_var_sub_header_align != '' ? 'pull-'.$mashup_var_sub_header_align : 'pull-left';

        if ( $mashup_var_header_banner_image != '' && $mashup_var_sub_header_style == 'with_bg' ) {
            $mashup_var_parallax_fixed = $mashup_var_page_subheader_parallax == 'on' ? ' fixed' : '';

            $mashup_sub_style .= ' background:url(' . $mashup_var_header_banner_image . ') ' . $mashup_var_page_subheader_color . ' no-repeat' . $mashup_var_parallax_fixed . ' ;';
            $mashup_sub_style .= ' background-size: cover;';
        } else if ( $mashup_var_page_subheader_color != '' && ($mashup_var_sub_header_style == 'with_bg' || $mashup_var_sub_header_style == 'classic') ) {
            $mashup_sub_style .= ' background:' . $mashup_var_page_subheader_color . ' !important;';
        }
        if ( $mashup_var_subheader_padding_top != '' ) {
            $mashup_sub_style .= ' padding-top: ' . esc_html( $mashup_var_subheader_padding_top ) . 'px !important;';
        }
        if ( $mashup_var_subheader_padding_bottom != '' ) {
            $mashup_sub_style .= ' padding-bottom: ' . esc_html( $mashup_var_subheader_padding_bottom ) . 'px !important;';
        }
        if ( $mashup_var_subheader_margin_top != '' ) {
            $mashup_sub_style .= ' margin-top: ' . esc_html( $mashup_var_subheader_margin_top ) . 'px !important;';
        }
        if ( $mashup_var_subheader_margin_bottom != '' ) {
            $mashup_sub_style .= ' margin-bottom: ' . esc_html( $mashup_var_subheader_margin_bottom ) . 'px !important;';
        }

        if ( $mashup_var_header_banner_image != '' ) {
            $mashup_upload_dir = wp_upload_dir();
            $mashup_upload_baseurl = isset( $mashup_upload_dir['baseurl'] ) ? $mashup_upload_dir['baseurl'] . '/' : '';

            $mashup_upload_dir = isset( $mashup_upload_dir['basedir'] ) ? $mashup_upload_dir['basedir'] . '/' : '';

            if ( false !== strpos( $mashup_var_header_banner_image, $mashup_upload_baseurl ) ) {
                $mashup_upload_subdir_file = str_replace( $mashup_upload_baseurl, '', $mashup_var_header_banner_image );
            }

            $mashup_images_dir = trailingslashit( get_template_directory() ) . 'assets/frontend/images/';

            $mashup_img_name = preg_replace( '/^.+[\\\\\\/]/', '', $mashup_var_header_banner_image );

            if ( is_file( $mashup_upload_dir . $mashup_img_name ) || is_file( $mashup_images_dir . $mashup_img_name ) ) {
                if ( ini_get( 'allow_url_fopen' ) ) {
                    $mashup_var_header_image_height = getimagesize( $mashup_var_header_banner_image );
                }
            } else if ( isset( $mashup_upload_subdir_file ) && is_file( $mashup_upload_dir . $mashup_upload_subdir_file ) ) {
                if ( ini_get( 'allow_url_fopen' ) ) {
                    $mashup_var_header_image_height = getimagesize( $mashup_var_header_banner_image );
                }
            } else {
                $mashup_var_header_image_height = '';
            }

            if ( $mashup_var_header_image_height != '' && isset( $mashup_var_header_image_height[1] ) ) {
                $mashup_var_header_image_height = $mashup_var_header_image_height[1] . 'px';
                $mashup_sub_style .= ' height: ' . mashup_allow_special_char( $mashup_var_header_image_height ) . ' !important;';
            }
        }
        $post_type = '';
        if ( ! is_author() && ! is_404() ) {
            if ( $post ) {
                $post_type = get_post_type( $post->ID );
            }
        }
        if ( $mashup_var_sub_header_align == '' ) {
            $mashup_var_sub_header_align = 'pull-left';
        }

        if ( ! is_404() ) {
            if ( $mashup_var_sub_header_style == 'with_bg' ) {
                ?>
                <div class="cs-subheader center"<?php if ( $mashup_sub_style != '' ) { ?> style="<?php echo mashup_allow_special_char( $mashup_sub_style ) ?>"<?php } ?>>
                    <div class="container">
                        <div class="cs-page-title <?php echo sanitize_html_class( $mashup_var_sub_header_align ); ?>">
                            <?php if ( $mashup_var_page_title_switch == "on" ) { ?>
                                <h1<?php if ( $mashup_var_page_subheader_text_color != '' ) { ?> style="color:<?php echo esc_html( $mashup_var_page_subheader_text_color ); ?> !important;"<?php } ?>><?php mashup_post_page_title(); ?></h1>
                            <?php } ?>
                            <?php if ( $mashup_var_sub_header_sub_hdng != '' ) { ?>
                                <div <?php if ( $mashup_var_page_subheader_text_color != '' ) { ?> style="color:<?php echo esc_html( $mashup_var_page_subheader_text_color ); ?> !important;"<?php } ?>><?php echo do_shortcode( $mashup_var_sub_header_sub_hdng ) ?></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div class="cs-subheader"<?php if ( $mashup_sub_style != '' ) { ?> style="<?php echo mashup_allow_special_char( $mashup_sub_style ) ?>"<?php } ?>>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cs-subheader-text">
                                    <?php if ( $mashup_var_page_title_switch == "on" ) { ?>
                                        <div class="cs-page-title <?php echo sanitize_html_class( $mashup_var_sub_header_align ); ?>">
                                            <h1<?php if ( $mashup_var_page_subheader_text_color != '' ) { ?> style="color:<?php echo esc_html( $mashup_var_page_subheader_text_color ); ?> !important;"<?php } ?>><?php mashup_post_page_title(); ?></h1>
                                        </div>
                                        <?php
                                    }
                                    if ( $mashup_var_page_breadcrumbs == "on" ) {
                                        mashup_breadcrumbs($mashup_var_page_subheader_text_color);
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
    }

}
