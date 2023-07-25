<?php
/*
 * Theme style 
 */
if ( ! function_exists( 'mashup_var_custom_style_theme_options' ) ) {
    $mashup_var_custom_themeoption_str = '';

    /**
     * @Start Function for Theme Option Backend Settings and Classes
     *
     */
    function mashup_var_custom_style_theme_options() {
        global $mashup_var_custom_themeoption_str;
        $mashup_var_options = get_option( 'mashup_var_options' );
        ob_start();

        $mashup_var_theme_color = isset( $mashup_var_options['mashup_var_theme_color'] ) ? $mashup_var_options['mashup_var_theme_color'] : '';
        $mashup_var_bg_color = (isset( $mashup_var_options['mashup_var_bg_color'] ) && $mashup_var_options['mashup_var_bg_color'] != '' ) ? $mashup_var_options['mashup_var_bg_color'] : '';
        $mashup_var_text_color = (isset( $mashup_var_options['mashup_var_text_color'] ) && $mashup_var_options['mashup_var_text_color'] != '' ) ? $mashup_var_options['mashup_var_text_color'] : '';
        ?>
        /*!
        *Theme Colors Classes*/

        .text-color,
        .classic .main-navigation>ul>li:hover > a,
        .classic .main-navigation>ul>li ul>li:hover > a,
        .music-events .text-holder .time-box h4,
        .footer-widgets .widget-text ul li p a:hover,
        .music-events .text-holder a:hover,
        .woocommerce ul.products li.product:hover h4,
        .contact-info .text-holder a:hover,
        .woocommerce .widget_shopping_cart_content li a:hover,
        .woocommerce .widget_top_rated_products .product-title:hover,
        .user-option .user-cart ul li > ul li .text-holder .post-title h6 a:hover,
        .cs-copyright .condition li a:hover,
        .blog.blog-list .blog-post .text-holder .btn-read-more,
        .blog.blog-list .blog-post .text-holder .post-option .post-catagories li a:hover,
        .widget-upcoming-events .widget-upcoming li:hover .text h6 a,
        .widget-recent-post ul li:hover .post-text .post-title h4 a,
        .blog-post .text-holder h2 a:hover,
        .pagination > li > a:hover,
        .pagination > li > a.active,
        .widget_categories ul li:hover,
        .widget_categories ul li a:hover,
        .blog.blog-list .blog-post .text-holder .post-option .post-comment a:hover,
        .widget-upcoming-events .widget-upcoming li .text h6 a:hover,
        .widget.widget-categories ul li a:hover,
        .woocommerce .product-name a:hover,
         #footer .cs-copyright p a,
         .comment-form .comment-respond span a:first-child,
         .music-event-list ul li .event-info a:hover,
        .widget-recent-post ul li .post-text .post-title h4 a:hover,
        .blog.blog-list .blog-post .text-holder h2 a:hover,
        .woocommerce.widget_recent_reviews li:hover a,
        .page-not-found .text-holder span,
        .widget_product_categories li a:hover,
        .widget-info .widget-social-media li a:hover,
        .cs-color,
        .music-album figcaption .album-label em,
        blockquote,
		.slicknav_menu .slicknav_menutxt, .slicknav_nav a, .widget_calendar .calendar_wrap table thead tr th, .widget.twitter-post p a,
        .widget_archive ul li a:hover, .widget_categories ul li a:hover, .widget_pages ul li a:hover, .widget_meta ul li a:hover, .widget_recent_entries ul li a:hover,
        .blog.blog-list .blog-post .text-holder  .btn-read-more i,
		.slider .slick-arrow.slick-next,
		.widget_archive ul li, .widget_categories ul li,
		blockquote, .construction.fancy .time-box h4, .slider .slick-arrow:hover, .page-not-found .text-holder span,
		.event-next a, .music-events .slick-arrow,
		.widget-upcoming-events .widget-upcoming li .date span,
		.woocommerce ul.products li.product .price del,
		.woocommerce ul.products li.product .price span,
		.woocommerce.single-product div.product .product_meta .posted_in a
        {
        <?php if ( isset( $mashup_var_theme_color ) || $mashup_var_theme_color != '' ) { ?>
            color:<?php echo mashup_allow_special_char( $mashup_var_theme_color ); ?> !important;
        <?php } ?>
        }
        /*!
        * Theme Background Color */
        .bgcolor,
        .music-events .text-holder .time-box span.cs-slash,
        .woocommerce.single-product div.product form.cart .button,
        .woocommerce.woocommerce-page .tags-contents li:hover a,
        .single.single-product.woocommerce.woocommerce-page .next-previous a:hover i,
        .jp-audio .jp-play-bar,
        .jp-audio .jp-volume-bar-value,
        .page-not-found .text-holder a,
        .woocommerce .wc-proceed-to-checkout a.button.alt:hover,
        .woocommerce.single-product div.product .stock,
        .woocommerce .widget_shopping_cart_content .buttons a,
        .widget_price_filter .ui-slider .ui-slider-range,
        .widget_price_filter .ui-slider .ui-slider-handle,
        .main-player .mCS-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
        .comment-form form .btn-holder input[type="submit"], 
        .no-results.not-found input[type="submit"],
        .search-results .suggestions input[type="submit"],
        .section-title em,
        .eliment-heading em,
        .load-more,
        .slider .cs-column-text .btn,
        .music-album figcaption .play-btn, .widget_search .search-form input.search-submit[type="submit"], .widget_calendar .calendar_wrap caption,
		.music-events .slick-arrow:after,
		.section-title.modern h2:before, .section-title.modern h2:after
        {
        <?php if ( isset( $mashup_var_theme_color ) || $mashup_var_theme_color != '' ) { ?>
            background-color:<?php echo mashup_allow_special_char( $mashup_var_theme_color ); ?> !important;
        <?php } ?>
        }

        /*!
        * Theme Border Color */
        .border-color,
        .music-events .img-holder:after,
        .woocommerce .woocommerce-tabs .nav-tabs.wc-tabs li.active a,
        .main-player .mCS-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
        blockquote,
		.slicknav_menu .slicknav_icon-bar
        {
        <?php if ( isset( $mashup_var_theme_color ) || $mashup_var_theme_color != '' ) { ?>
            border-color:<?php echo mashup_allow_special_char( $mashup_var_theme_color ); ?> !important;
        <?php } ?>
        }

        /*!
        * Theme Border Bottom Color */
		.section-title.fancy em:before
        {
        <?php if ( isset( $mashup_var_theme_color ) || $mashup_var_theme_color != '' ) { ?>
            border-bottom-color:<?php echo mashup_allow_special_char( $mashup_var_theme_color ); ?> !important;
        <?php } ?>
        }
		
        /*!
        * Theme Border Top Color */
		.section-title.fancy em:after
        {
        <?php if ( isset( $mashup_var_theme_color ) || $mashup_var_theme_color != '' ) { ?>
            border-top-color:<?php echo mashup_allow_special_char( $mashup_var_theme_color ); ?> !important;
        <?php } ?>
        }
		
        <?php
        $mashup_var_sitcky_header_switch = isset( $mashup_var_options['mashup_var_sitcky_header_switch'] ) ? $mashup_var_options['mashup_var_sitcky_header_switch'] : '';
        $mashup_var_layout = isset( $mashup_var_options['mashup_var_layout'] ) ? $mashup_var_options['mashup_var_layout'] : '';
        $mashup_var_custom_bgimage = isset( $mashup_var_options['mashup_var_custom_bgimage'] ) ? $mashup_var_options['mashup_var_custom_bgimage'] : '';
        $mashup_var_bg_image = isset( $mashup_var_options['mashup_var_bg_image'] ) ? $mashup_var_options['mashup_var_bg_image'] : '';
        $mashup_var_pattern_image = isset( $mashup_var_options['mashup_var_pattern_image'] ) ? $mashup_var_options['mashup_var_pattern_image'] : '';
        $mashup_var_background_position = isset( $mashup_var_options['mashup_var_bgimage_position'] ) ? $mashup_var_options['mashup_var_bgimage_position'] : '';
        if ( $mashup_var_layout != 'full_width' ) {
            $mashup_repeat_options = false;
            if ( $mashup_var_custom_bgimage != "" ) {
                $mashup_repeat_options = true;
                $mashup_var_background_image = $mashup_var_custom_bgimage;
            } else if ( $mashup_var_bg_image != "" && $mashup_var_bg_image != 'bg0' ) {
                $mashup_var_background_image = trailingslashit( get_template_directory_uri() ) . "assets/backend/images/background/" . $mashup_var_bg_image . ".png";
            } else if ( $mashup_var_pattern_image != "" && $mashup_var_pattern_image != 'pattern0' ) {
                $mashup_var_background_image = trailingslashit( get_template_directory_uri() ) . "assets/backend/images/patterns/" . $mashup_var_pattern_image . ".png";
            }

            if ( isset( $mashup_var_background_image ) && $mashup_var_background_image <> "" ) {
                if ( $mashup_repeat_options == true ) {
                    $wrppaer_style = 'background:url(' . $mashup_var_background_image . ') ' . $mashup_var_background_position . ' ' . $mashup_var_bg_color . ' !important;';
                } else {
                    $wrppaer_style = 'background:url(' . $mashup_var_background_image . ') repeat ' . $mashup_var_bg_color . ' !important;';
                }
            } else if ( $mashup_var_bg_color != '' ) {
                $wrppaer_style = 'background:' . $mashup_var_bg_color . ' !important;';
            }
        } else if ( $mashup_var_custom_bgimage != '' ) {
            $wrppaer_style = 'background:url(' . $mashup_var_custom_bgimage . ') ' . $mashup_var_background_position . ' ' . $mashup_var_bg_color . ' !important;';
        } else if ( $mashup_var_bg_color != '' ) {
            $wrppaer_style = 'background:' . $mashup_var_bg_color . ' !important;';
        }

        if ( isset( $wrppaer_style ) && $wrppaer_style != '' ) {
            ?>
            body{
            <?php echo mashup_allow_special_char( $wrppaer_style ) ?>
            }
            <?php
        }

        ///// Start Extra CSS
        if ( isset( $mashup_var_sitcky_header_switch ) && $mashup_var_sitcky_header_switch == 'on' ) {
            ?>
            .cs-main-nav {
            position: fixed !important;

            z-index: 99 !important;
            }
            <?php
        } else {
            ?>
            .cs-main-nav {

            position: relative !important;

            }
            <?php
        }
       
        /**
         * @Set Header color Css
         *
         *
         */
        $mashup_var_top_strip_color = (isset( $mashup_var_options['mashup_var_top_strip_color'] )) ? $mashup_var_options['mashup_var_top_strip_color'] : '';
        $mashup_var_top_strip_bgcolor = (isset( $mashup_var_options['mashup_var_top_strip_bgcolor'] )) ? $mashup_var_options['mashup_var_top_strip_bgcolor'] : '';
        $mashup_var_header_bgcolor = (isset( $mashup_var_options['mashup_var_header_bgcolor'] ) and $mashup_var_options['mashup_var_header_bgcolor'] <> '') ? $mashup_var_options['mashup_var_header_bgcolor'] : '';
        $mashup_var_menu_color = (isset( $mashup_var_options['mashup_var_menu_color'] ) and $mashup_var_options['mashup_var_menu_color'] <> '') ? $mashup_var_options['mashup_var_menu_color'] : '';
        $mashup_var_menu_active_color = (isset( $mashup_var_options['mashup_var_menu_active_color'] ) and $mashup_var_options['mashup_var_menu_active_color'] <> '') ? $mashup_var_options['mashup_var_menu_active_color'] : '';
        $mashup_var_menu_hover_bg_color = (isset( $mashup_var_options['mashup_var_menu_hover_bg_color'] ) and $mashup_var_options['mashup_var_menu_hover_bg_color'] <> '') ? $mashup_var_options['mashup_var_menu_hover_bg_color'] : '';
        $mashup_var_submenu_2nd_level_bgcolor = (isset( $mashup_var_options['mashup_var_submenu_2nd_level_bgcolor'] ) and $mashup_var_options['mashup_var_submenu_2nd_level_bgcolor'] <> '') ? $mashup_var_options['mashup_var_submenu_2nd_level_bgcolor'] : '';



        $mashup_var_modern_menu_color = (isset( $mashup_var_options['mashup_var_modern_menu_color'] ) and $mashup_var_options['mashup_var_modern_menu_color'] <> '') ? $mashup_var_options['mashup_var_modern_menu_color'] : '';
        $mashup_var_modern_menu_active_color = (isset( $mashup_var_options['mashup_var_modern_menu_active_color'] ) and $mashup_var_options['mashup_var_modern_menu_active_color'] <> '') ? $mashup_var_options['mashup_var_modern_menu_active_color'] : '';
        $mashup_var_submenu_bgcolor = (isset( $mashup_var_options['mashup_var_submenu_bgcolor'] ) and $mashup_var_options['mashup_var_submenu_bgcolor'] <> '' ) ? $mashup_var_options['mashup_var_submenu_bgcolor'] : '';
        $mashup_var_submenu_color = (isset( $mashup_var_options['mashup_var_submenu_color'] ) and $mashup_var_options['mashup_var_submenu_color'] <> '') ? $mashup_var_options['mashup_var_submenu_color'] : '';
        $mashup_var_submenu_2nd_level_color = (isset( $mashup_var_options['mashup_var_submenu_2nd_level_color'] ) and $mashup_var_options['mashup_var_submenu_2nd_level_color'] <> '') ? $mashup_var_options['mashup_var_submenu_2nd_level_color'] : '';
        $mashup_var_menu_heading_color = (isset( $mashup_var_options['mashup_var_menu_heading_color'] ) and $mashup_var_options['mashup_var_menu_heading_color'] <> '') ? $mashup_var_options['mashup_var_menu_heading_color'] : '';
        $mashup_var_submenu_hover_color = (isset( $mashup_var_options['mashup_var_submenu_hover_color'] ) and $mashup_var_options['mashup_var_submenu_hover_color'] <> '') ? $mashup_var_options['mashup_var_submenu_hover_color'] : '';
        $mashup_var_topstrip_bgcolor = (isset( $mashup_var_options['mashup_var_topstrip_bgcolor'] ) and $mashup_var_options['mashup_var_topstrip_bgcolor'] <> '') ? $mashup_var_options['mashup_var_topstrip_bgcolor'] : '';
        $mashup_var_topstrip_text_color = (isset( $mashup_var_options['mashup_var_topstrip_text_color'] ) and $mashup_var_options['mashup_var_topstrip_text_color'] <> '') ? $mashup_var_options['mashup_var_topstrip_text_color'] : '';
        $mashup_var_topstrip_link_color = (isset( $mashup_var_options['mashup_var_topstrip_link_color'] ) and $mashup_var_options['mashup_var_topstrip_link_color'] <> '') ? $mashup_var_options['mashup_var_topstrip_link_color'] : '';
        $mashup_var_menu_activ_bg = (isset( $mashup_var_options['mashup_var_theme_color'] )) ? $mashup_var_options['mashup_var_theme_color'] : '';
        $mashup_var_page_title_color = (isset( $mashup_var_options['mashup_var_page_title_color'] )) ? $mashup_var_options['mashup_var_page_title_color'] : '';

        /**
         * @Logo Margins
         *
         */
        $mashup_var_logo_margint = (isset( $mashup_var_options['mashup_var_logo_margint'] ) and $mashup_var_options['mashup_var_logo_margint'] <> '') ? $mashup_var_options['mashup_var_logo_margint'] : '0';
        $mashup_var_logo_marginb = (isset( $mashup_var_options['mashup_var_logo_marginb'] ) and $mashup_var_options['mashup_var_logo_marginb'] <> '') ? $mashup_var_options['mashup_var_logo_marginb'] : '0';

        $mashup_var_logo_marginr = (isset( $mashup_var_options['mashup_var_logo_marginr'] ) and $mashup_var_options['mashup_var_logo_marginr'] <> '') ? $mashup_var_options['mashup_var_logo_marginr'] : '0';
        $mashup_var_logo_marginl = (isset( $mashup_var_options['mashup_var_logo_marginl'] ) and $mashup_var_options['mashup_var_logo_marginl'] <> '') ? $mashup_var_options['mashup_var_logo_marginl'] : '0';

        /**
         * @Font Family
         *
         */
        $mashup_var_content_font = (isset( $mashup_var_options['mashup_var_content_font'] )) ? $mashup_var_options['mashup_var_content_font'] : '';
        $mashup_var_content_font_att = (isset( $mashup_var_options['mashup_var_content_font_att'] )) ? $mashup_var_options['mashup_var_content_font_att'] : '';

        $mashup_var_mainmenu_font = (isset( $mashup_var_options['mashup_var_mainmenu_font'] )) ? $mashup_var_options['mashup_var_mainmenu_font'] : '';
        $mashup_var_mainmenu_font_att = (isset( $mashup_var_options['mashup_var_mainmenu_font_att'] )) ? $mashup_var_options['mashup_var_mainmenu_font_att'] : '';

        $mashup_var_heading1_font = (isset( $mashup_var_options['mashup_var_heading1_font'] )) ? $mashup_var_options['mashup_var_heading1_font'] : '';
        $mashup_var_heading1_font_att = (isset( $mashup_var_options['mashup_var_heading1_font_att'] )) ? $mashup_var_options['mashup_var_heading1_font_att'] : '';

        $mashup_var_heading2_font = (isset( $mashup_var_options['mashup_var_heading2_font'] )) ? $mashup_var_options['mashup_var_heading2_font'] : '';
        $mashup_var_heading2_font_att = (isset( $mashup_var_options['mashup_var_heading2_font_att'] )) ? $mashup_var_options['mashup_var_heading2_font_att'] : '';

        $mashup_var_heading3_font = (isset( $mashup_var_options['mashup_var_heading3_font'] )) ? $mashup_var_options['mashup_var_heading3_font'] : '';
        $mashup_var_heading3_font_att = (isset( $mashup_var_options['mashup_var_heading3_font_att'] )) ? $mashup_var_options['mashup_var_heading3_font_att'] : '';

        $mashup_var_heading4_font = (isset( $mashup_var_options['mashup_var_heading4_font'] )) ? $mashup_var_options['mashup_var_heading4_font'] : '';
        $mashup_var_heading4_font_att = (isset( $mashup_var_options['mashup_var_heading4_font_att'] )) ? $mashup_var_options['mashup_var_heading4_font_att'] : '';

        $mashup_var_heading5_font = (isset( $mashup_var_options['mashup_var_heading5_font'] )) ? $mashup_var_options['mashup_var_heading5_font'] : '';
        $mashup_var_heading5_font_att = (isset( $mashup_var_options['mashup_var_heading5_font_att'] )) ? $mashup_var_options['mashup_var_heading5_font_att'] : '';

        $mashup_var_heading6_font = (isset( $mashup_var_options['mashup_var_heading6_font'] )) ? $mashup_var_options['mashup_var_heading6_font'] : '';
        $mashup_var_heading6_font_att = (isset( $mashup_var_options['mashup_var_heading6_font_att'] )) ? $mashup_var_options['mashup_var_heading6_font_att'] : '';

        $mashup_var_section_title_font = (isset( $mashup_var_options['mashup_var_section_title_font'] )) ? $mashup_var_options['mashup_var_section_title_font'] : '';
        $mashup_var_section_title_font_att = (isset( $mashup_var_options['mashup_var_section_title_font_att'] )) ? $mashup_var_options['mashup_var_section_title_font_att'] : '';

        $mashup_var_page_title_font = (isset( $mashup_var_options['mashup_var_page_title_font'] )) ? $mashup_var_options['mashup_var_page_title_font'] : '';
        $mashup_var_page_title_font_att = (isset( $mashup_var_options['mashup_var_page_title_font_att'] )) ? $mashup_var_options['mashup_var_page_title_font_att'] : '';

        $mashup_var_post_title_font = (isset( $mashup_var_options['mashup_var_post_title_font'] )) ? $mashup_var_options['mashup_var_post_title_font'] : '';
        $mashup_var_post_title_font_att = (isset( $mashup_var_options['mashup_var_post_title_font_att'] )) ? $mashup_var_options['mashup_var_post_title_font_att'] : '';

        $mashup_var_widget_heading_font = (isset( $mashup_var_options['mashup_var_widget_heading_font'] )) ? $mashup_var_options['mashup_var_widget_heading_font'] : '';
        $mashup_var_widget_heading_font_att = (isset( $mashup_var_options['mashup_var_widget_heading_font_att'] )) ? $mashup_var_options['mashup_var_widget_heading_font_att'] : '';

        $mashup_var_ft_widget_heading_font = (isset( $mashup_var_options['mashup_var_ft_widget_heading_font'] )) ? $mashup_var_options['mashup_var_ft_widget_heading_font'] : '';
        $mashup_var_ft_widget_heading_font_att = (isset( $mashup_var_options['mashup_var_ft_widget_heading_font_att'] )) ? $mashup_var_options['mashup_var_ft_widget_heading_font_att'] : '';

        /**
         * @Setting Content Fonts
         *
         */
        $mashup_var_content_fonts = preg_split( '#(?<=\d)(?=[a-z])#i', $mashup_var_content_font_att );
	

        $mashup_var_content_font_atts = mashup_var_get_font_att_array( $mashup_var_content_fonts );

        /**
         * @Setting Main Menu Fonts
         *
         */
        $mashup_var_mainmenu_fonts = preg_split( '#(?<=\d)(?=[a-z])#i', $mashup_var_mainmenu_font_att );

        $mashup_var_mainmenu_font_atts = mashup_var_get_font_att_array( $mashup_var_mainmenu_fonts );

        /**
         * @Setting Heading Fonts
         *
         */
        $mashup_var_heading1_fonts = preg_split( '#(?<=\d)(?=[a-z])#i', $mashup_var_heading1_font_att );
        $mashup_var_heading1_font_atts = mashup_var_get_font_att_array( $mashup_var_heading1_fonts );

        $mashup_var_heading2_fonts = preg_split( '#(?<=\d)(?=[a-z])#i', $mashup_var_heading2_font_att );
        $mashup_var_heading2_font_atts = mashup_var_get_font_att_array( $mashup_var_heading2_fonts );

        $mashup_var_heading3_fonts = preg_split( '#(?<=\d)(?=[a-z])#i', $mashup_var_heading3_font_att );
        $mashup_var_heading3_font_atts = mashup_var_get_font_att_array( $mashup_var_heading3_fonts );

        $mashup_var_heading4_fonts = preg_split( '#(?<=\d)(?=[a-z])#i', $mashup_var_heading4_font_att );
        $mashup_var_heading4_font_atts = mashup_var_get_font_att_array( $mashup_var_heading4_fonts );

        $mashup_var_heading5_fonts = preg_split( '#(?<=\d)(?=[a-z])#i', $mashup_var_heading5_font_att );
        $mashup_var_heading5_font_atts = mashup_var_get_font_att_array( $mashup_var_heading5_fonts );

        $mashup_var_heading6_fonts = preg_split( '#(?<=\d)(?=[a-z])#i', $mashup_var_heading6_font_att );
        $mashup_var_heading6_font_atts = mashup_var_get_font_att_array( $mashup_var_heading6_fonts );

        /**
         * @Section Title Fonts
         *
         */
        $mashup_var_section_title_fonts = preg_split( '#(?<=\d)(?=[a-z])#i', $mashup_var_section_title_font_att );
        $mashup_var_section_title_font_atts = mashup_var_get_font_att_array( $mashup_var_section_title_fonts );

        /**
         * @Page Title Heading Fonts
         *
         */
        $mashup_var_page_title_fonts = preg_split( '#(?<=\d)(?=[a-z])#i', $mashup_var_page_title_font_att );
        $mashup_var_page_title_font_atts = mashup_var_get_font_att_array( $mashup_var_page_title_fonts );

        /**
         * @Post Title Heading Fonts
         *
         */
        $mashup_var_post_title_fonts = preg_split( '#(?<=\d)(?=[a-z])#i', $mashup_var_post_title_font_att );
        $mashup_var_post_title_font_atts = mashup_var_get_font_att_array( $mashup_var_post_title_fonts );

        /**
         * @Setting Widget Heading Fonts
         *
         */
        $mashup_var_widget_heading_fonts = preg_split( '#(?<=\d)(?=[a-z])#i', $mashup_var_widget_heading_font_att );
        $mashup_var_widget_heading_font_atts = mashup_var_get_font_att_array( $mashup_var_widget_heading_fonts );


        /**
         * @Setting Footer Widget Heading Fonts
         *
         */
        $mashup_var_ft_widget_heading_fonts = preg_split( '#(?<=\d)(?=[a-z])#i', $mashup_var_ft_widget_heading_font_att );
        $mashup_var_ft_widget_heading_font_atts = mashup_var_get_font_att_array( $mashup_var_ft_widget_heading_fonts );

        /**
         * @Font Sizes
         *
         */
        $mashup_var_content_size = (isset( $mashup_var_options['mashup_var_content_size'] )) ? $mashup_var_options['mashup_var_content_size'] : '';
        $mashup_var_mainmenu_size = (isset( $mashup_var_options['mashup_var_mainmenu_size'] )) ? $mashup_var_options['mashup_var_mainmenu_size'] : '';
        $mashup_var_heading_1_size = (isset( $mashup_var_options['mashup_var_heading_1_size'] )) ? $mashup_var_options['mashup_var_heading_1_size'] : '';
        $mashup_var_heading_2_size = (isset( $mashup_var_options['mashup_var_heading_2_size'] )) ? $mashup_var_options['mashup_var_heading_2_size'] : '';
        $mashup_var_heading_3_size = (isset( $mashup_var_options['mashup_var_heading_3_size'] )) ? $mashup_var_options['mashup_var_heading_3_size'] : '';
        $mashup_var_heading_4_size = (isset( $mashup_var_options['mashup_var_heading_4_size'] )) ? $mashup_var_options['mashup_var_heading_4_size'] : '';
        $mashup_var_heading_5_size = (isset( $mashup_var_options['mashup_var_heading_5_size'] )) ? $mashup_var_options['mashup_var_heading_5_size'] : '';
        $mashup_var_heading_6_size = (isset( $mashup_var_options['mashup_var_heading_6_size'] )) ? $mashup_var_options['mashup_var_heading_6_size'] : '';
        $mashup_var_section_title_size = (isset( $mashup_var_options['mashup_var_section_title_size'] )) ? $mashup_var_options['mashup_var_section_title_size'] : '';
        $mashup_var_page_title_size = (isset( $mashup_var_options['mashup_var_page_title_size'] )) ? $mashup_var_options['mashup_var_page_title_size'] : '';
        $mashup_var_post_title_size = (isset( $mashup_var_options['mashup_var_post_title_size'] )) ? $mashup_var_options['mashup_var_post_title_size'] : '';
        $mashup_var_widget_heading_size = (isset( $mashup_var_options['mashup_var_widget_heading_size'] )) ? $mashup_var_options['mashup_var_widget_heading_size'] : '';
        $mashup_var_ft_widget_heading_size = (isset( $mashup_var_options['mashup_var_ft_widget_heading_size'] )) ? $mashup_var_options['mashup_var_ft_widget_heading_size'] : '';

        /**
         * @Font LIne Heights
         *
         */
        $mashup_var_content_lh = (isset( $mashup_var_options['mashup_var_content_lh'] )) ? $mashup_var_options['mashup_var_content_lh'] : '';
        $mashup_var_mainmenu_lh = (isset( $mashup_var_options['mashup_var_mainmenu_lh'] )) ? $mashup_var_options['mashup_var_mainmenu_lh'] : '';
        $mashup_var_heading_1_lh = (isset( $mashup_var_options['mashup_var_heading_1_lh'] )) ? $mashup_var_options['mashup_var_heading_1_lh'] : '';
        $mashup_var_heading_2_lh = (isset( $mashup_var_options['mashup_var_heading_2_lh'] )) ? $mashup_var_options['mashup_var_heading_2_lh'] : '';
        $mashup_var_heading_3_lh = (isset( $mashup_var_options['mashup_var_heading_3_lh'] )) ? $mashup_var_options['mashup_var_heading_3_lh'] : '';
        $mashup_var_heading_4_lh = (isset( $mashup_var_options['mashup_var_heading_4_lh'] )) ? $mashup_var_options['mashup_var_heading_4_lh'] : '';
        $mashup_var_heading_5_lh = (isset( $mashup_var_options['mashup_var_heading_5_lh'] )) ? $mashup_var_options['mashup_var_heading_5_lh'] : '';
        $mashup_var_heading_6_lh = (isset( $mashup_var_options['mashup_var_heading_6_lh'] )) ? $mashup_var_options['mashup_var_heading_6_lh'] : '';
        $mashup_var_section_title_lh = (isset( $mashup_var_options['mashup_var_section_title_lh'] )) ? $mashup_var_options['mashup_var_section_title_lh'] : '';
        $mashup_var_page_title_lh = (isset( $mashup_var_options['mashup_var_page_title_lh'] )) ? $mashup_var_options['mashup_var_page_title_lh'] : '';
        $mashup_var_post_title_lh = (isset( $mashup_var_options['mashup_var_post_title_lh'] )) ? $mashup_var_options['mashup_var_post_title_lh'] : '';
        $mashup_var_widget_heading_lh = (isset( $mashup_var_options['mashup_var_widget_heading_lh'] )) ? $mashup_var_options['mashup_var_widget_heading_lh'] : '';
        $mashup_var_ft_widget_heading_lh = (isset( $mashup_var_options['mashup_var_ft_widget_heading_lh'] )) ? $mashup_var_options['mashup_var_ft_widget_heading_lh'] : '';

        $mashup_var_content_spc = (isset( $mashup_var_options['mashup_var_content_spc'] )) ? $mashup_var_options['mashup_var_content_spc'] : '';
        $mashup_var_mainmenu_spc = (isset( $mashup_var_options['mashup_var_mainmenu_spc'] )) ? $mashup_var_options['mashup_var_mainmenu_spc'] : '';
        $mashup_var_heading_1_spc = (isset( $mashup_var_options['mashup_var_heading_1_spc'] )) ? $mashup_var_options['mashup_var_heading_1_spc'] : '';
        $mashup_var_heading_2_spc = (isset( $mashup_var_options['mashup_var_heading_2_spc'] )) ? $mashup_var_options['mashup_var_heading_2_spc'] : '';
        $mashup_var_heading_3_spc = (isset( $mashup_var_options['mashup_var_heading_3_spc'] )) ? $mashup_var_options['mashup_var_heading_3_spc'] : '';
        $mashup_var_heading_4_spc = (isset( $mashup_var_options['mashup_var_heading_4_spc'] )) ? $mashup_var_options['mashup_var_heading_4_spc'] : '';
        $mashup_var_heading_5_spc = (isset( $mashup_var_options['mashup_var_heading_5_spc'] )) ? $mashup_var_options['mashup_var_heading_5_spc'] : '';
        $mashup_var_heading_6_spc = (isset( $mashup_var_options['mashup_var_heading_6_spc'] )) ? $mashup_var_options['mashup_var_heading_6_spc'] : '';
        $mashup_var_section_title_spc = (isset( $mashup_var_options['mashup_var_section_title_spc'] )) ? $mashup_var_options['mashup_var_section_title_spc'] : '';
        $mashup_var_page_title_spc = (isset( $mashup_var_options['mashup_var_page_title_spc'] )) ? $mashup_var_options['mashup_var_page_title_spc'] : '';
        $mashup_var_post_title_spc = (isset( $mashup_var_options['mashup_var_post_title_spc'] )) ? $mashup_var_options['mashup_var_post_title_spc'] : '';
        $mashup_var_widget_heading_spc = (isset( $mashup_var_options['mashup_var_widget_heading_spc'] )) ? $mashup_var_options['mashup_var_widget_heading_spc'] : '';
        $mashup_var_ft_widget_heading_spc = (isset( $mashup_var_options['mashup_var_ft_widget_heading_spc'] )) ? $mashup_var_options['mashup_var_ft_widget_heading_spc'] : '';

        /**
         * @Font Text Transform
         *
         */
        $mashup_var_content_textr = (isset( $mashup_var_options['mashup_var_content_textr'] )) ? $mashup_var_options['mashup_var_content_textr'] : '';
        $mashup_var_mainmenu_textr = (isset( $mashup_var_options['mashup_var_mainmenu_textr'] )) ? $mashup_var_options['mashup_var_mainmenu_textr'] : '';
        $mashup_var_heading_1_textr = (isset( $mashup_var_options['mashup_var_heading_1_textr'] )) ? $mashup_var_options['mashup_var_heading_1_textr'] : '';
        $mashup_var_heading_2_textr = (isset( $mashup_var_options['mashup_var_heading_2_textr'] )) ? $mashup_var_options['mashup_var_heading_2_textr'] : '';
        $mashup_var_heading_3_textr = (isset( $mashup_var_options['mashup_var_heading_3_textr'] )) ? $mashup_var_options['mashup_var_heading_3_textr'] : '';
        $mashup_var_heading_4_textr = (isset( $mashup_var_options['mashup_var_heading_4_textr'] )) ? $mashup_var_options['mashup_var_heading_4_textr'] : '';
        $mashup_var_heading_5_textr = (isset( $mashup_var_options['mashup_var_heading_5_textr'] )) ? $mashup_var_options['mashup_var_heading_5_textr'] : '';
        $mashup_var_heading_6_textr = (isset( $mashup_var_options['mashup_var_heading_6_textr'] )) ? $mashup_var_options['mashup_var_heading_6_textr'] : '';
        $mashup_var_section_title_textr = (isset( $mashup_var_options['mashup_var_section_title_textr'] )) ? $mashup_var_options['mashup_var_section_title_textr'] : '';
        $mashup_var_page_title_textr = (isset( $mashup_var_options['mashup_var_page_title_textr'] )) ? $mashup_var_options['mashup_var_page_title_textr'] : '';
        $mashup_var_post_title_textr = (isset( $mashup_var_options['mashup_var_post_title_textr'] )) ? $mashup_var_options['mashup_var_post_title_textr'] : '';
        $mashup_var_widget_heading_textr = (isset( $mashup_var_options['mashup_var_widget_heading_textr'] )) ? $mashup_var_options['mashup_var_widget_heading_textr'] : '';
        $mashup_var_ft_widget_heading_textr = (isset( $mashup_var_options['mashup_var_ft_widget_heading_textr'] )) ? $mashup_var_options['mashup_var_ft_widget_heading_textr'] : '';

        $mashup_var_widget_title_color = isset( $mashup_var_options['mashup_var_widget_title_color'] ) ? $mashup_var_options['mashup_var_widget_title_color'] : '';
        $mashup_var_ft_widget_title_color = isset( $mashup_var_options['mashup_var_footer_widget_title_color'] ) ? $mashup_var_options['mashup_var_footer_widget_title_color'] : '';


        /**
         * @Font Color
         *
         */
        $mashup_var_heading_h1_color = (isset( $mashup_var_options['mashup_var_heading_h1_color'] ) and $mashup_var_options['mashup_var_heading_h1_color'] <> '') ? $mashup_var_options['mashup_var_heading_h1_color'] : '';
        $mashup_var_heading_h2_color = (isset( $mashup_var_options['mashup_var_heading_h2_color'] ) and $mashup_var_options['mashup_var_heading_h2_color'] <> '') ? $mashup_var_options['mashup_var_heading_h2_color'] : '';
        $mashup_var_heading_h3_color = (isset( $mashup_var_options['mashup_var_heading_h3_color'] ) and $mashup_var_options['mashup_var_heading_h3_color'] <> '') ? $mashup_var_options['mashup_var_heading_h3_color'] : '';
        $mashup_var_heading_h4_color = (isset( $mashup_var_options['mashup_var_heading_h4_color'] ) and $mashup_var_options['mashup_var_heading_h4_color'] <> '') ? $mashup_var_options['mashup_var_heading_h4_color'] : '';
        $mashup_var_heading_h5_color = (isset( $mashup_var_options['mashup_var_heading_h5_color'] ) and $mashup_var_options['mashup_var_heading_h5_color'] <> '') ? $mashup_var_options['mashup_var_heading_h5_color'] : '';
        $mashup_var_heading_h6_color = (isset( $mashup_var_options['mashup_var_heading_h6_color'] ) and $mashup_var_options['mashup_var_heading_h6_color'] <> '') ? $mashup_var_options['mashup_var_heading_h6_color'] : '';

        $mashup_var_widget_heading_size = (isset( $mashup_var_options['mashup_var_widget_heading_size'] )) ? $mashup_var_options['mashup_var_widget_heading_size'] : '';
        $mashup_var_section_heading_size = (isset( $mashup_var_options['mashup_var_section_heading_size'] )) ? $mashup_var_options['mashup_var_section_heading_size'] : '';
        $mashup_var_copyright_bg_color = (isset( $mashup_var_options['mashup_var_copyright_bg_color'] )) ? $mashup_var_options['mashup_var_copyright_bg_color'] : '';

        if (
                ( isset( $mashup_var_options['mashup_var_custom_font_woff'] ) && $mashup_var_options['mashup_var_custom_font_woff'] <> '' ) &&
                ( isset( $mashup_var_options['mashup_var_custom_font_ttf'] ) && $mashup_var_options['mashup_var_custom_font_ttf'] <> '' ) &&
                ( isset( $mashup_var_options['mashup_var_custom_font_svg'] ) && $mashup_var_options['mashup_var_custom_font_svg'] <> '' ) &&
                ( isset( $mashup_var_options['mashup_var_custom_font_eot'] ) && $mashup_var_options['mashup_var_custom_font_eot'] <> '' )
        ):

            $font_face_html = "
        @font-face {
    font-family: 'mashup_var_custom_font';
    src: url('" . $mashup_var_options['mashup_var_custom_font_eot'] . "');
    src:
        url('" . $mashup_var_options['mashup_var_custom_font_eot'] . "?#iefix') format('eot'),
        url('" . $mashup_var_options['mashup_var_custom_font_woff'] . "') format('woff'),
        url('" . $mashup_var_options['mashup_var_custom_font_ttf'] . "') format('truetype'),
        url('" . $mashup_var_options['mashup_var_custom_font_svg'] . "#mashup_var_custom_font') format('svg');
    font-weight: 400;
    font-style: normal;
        }";

            $custom_font = true;
        else: $custom_font = false;
        endif;

        if ( $custom_font == true ) {
            echo mashup_allow_special_char( $font_face_html );
        }
        if ( (isset( $mashup_var_content_size ) && $mashup_var_content_size != '') || (isset( $mashup_var_content_spc ) && $mashup_var_content_spc != '') || (isset( $mashup_var_content_textr ) && $mashup_var_content_textr != '') || (isset( $mashup_var_text_color ) && $mashup_var_text_color != '') ) {
            ?>
            /*Theme TypoColors Classes*/

            body,
            .main-section p,
            .mce-content-body p
            {
            <?php
            if ( $custom_font == true ) {
                echo 'font-family: mashup_var_custom_font;';
                if ( isset( $mashup_var_content_size ) && $mashup_var_content_size != '' ) {
                    echo 'font-size: ' . $mashup_var_content_size . ';';
                }
                if ( isset( $mashup_var_content_spc ) && $mashup_var_content_spc != '' ) {
                    echo esc_html( $mashup_var_content_spc != '' ? 'letter-spacing: ' . $mashup_var_content_spc . 'px;' : ''  );
                }
                if ( isset( $mashup_var_content_textr ) && $mashup_var_content_textr != '' ) {
                    echo esc_html( $mashup_var_content_textr != '' ? 'text-transform: ' . $mashup_var_content_textr . ';' : ''  );
                }
                if ( isset( $mashup_var_text_color ) && $mashup_var_text_color != '' ) {
                    echo esc_html( $mashup_var_text_color != '' ? 'color: ' . $mashup_var_text_color . ' !important;' : ''  );
                }
            } else {
                echo mashup_var_font_font_print( $mashup_var_content_font_atts, $mashup_var_content_size, $mashup_var_content_lh, $mashup_var_content_font, true );
                if ( isset( $mashup_var_content_spc ) && $mashup_var_content_spc != '' ) {
                    echo esc_html( $mashup_var_content_spc != '' ? 'letter-spacing: ' . $mashup_var_content_spc . 'px;' : ''  );
                }
                if ( isset( $mashup_var_content_textr ) && $mashup_var_content_textr != '' ) {
                    echo esc_html( $mashup_var_content_textr != '' ? 'text-transform: ' . $mashup_var_content_textr . ';' : ''  );
                }
                if ( isset( $mashup_var_text_color ) && $mashup_var_text_color != '' ) {
                    echo esc_html( $mashup_var_text_color != '' ? 'color: ' . $mashup_var_text_color . ' !important;' : ''  );
                }
            }
            ?>
            }
            <?php
        }
        if ( (isset( $mashup_var_logo_margint ) && $mashup_var_logo_margint != '') || (isset( $mashup_var_logo_marginr ) && $mashup_var_logo_marginr != '') || (isset( $mashup_var_logo_marginb ) && $mashup_var_logo_marginb != '') || (isset( $mashup_var_logo_marginl ) && $mashup_var_logo_marginl != '') ) {
            ?>
            /*Header Default Start*/

            header .logo {
            <?php if ( isset( $mashup_var_logo_margint ) && $mashup_var_logo_margint != '' ) { ?>
                margin-top:<?php echo mashup_allow_special_char( $mashup_var_logo_margint ); ?>px;
            <?php } if ( isset( $mashup_var_logo_marginr ) && $mashup_var_logo_marginr != '' ) { ?>
                margin-right:<?php echo mashup_allow_special_char( $mashup_var_logo_marginr ); ?>px;
            <?php } if ( isset( $mashup_var_logo_marginb ) && $mashup_var_logo_marginb != '' ) { ?>
                margin-bottom:<?php echo mashup_allow_special_char( $mashup_var_logo_marginb ); ?>px;
            <?php }if ( isset( $mashup_var_logo_marginl ) && $mashup_var_logo_marginl != '' ) { ?>
                margin-left:<?php echo mashup_allow_special_char( $mashup_var_logo_marginl ); ?>px;
            <?php } ?>

            }
            <?php
        }
        if ( (isset( $mashup_var_mainmenu_size ) && $mashup_var_mainmenu_size != '') || (isset( $mashup_var_mainmenu_spc ) && $mashup_var_mainmenu_spc != '') || (isset( $mashup_var_mainmenu_textr ) && $mashup_var_mainmenu_textr != '') ) {
            ?>
            /*Navigation FontSizes*/

            #header .main-navigation > ul > li > a,
            #header .main-navigation > ul > li 
            {
            <?php
            if ( $custom_font == true ) {
                echo 'font-family: mashup_var_custom_font;';
                if ( isset( $mashup_var_mainmenu_size ) && $mashup_var_mainmenu_size != '' ) {
                    echo 'font-size: ' . $mashup_var_mainmenu_size . ';';
                }
                if ( isset( $mashup_var_mainmenu_spc ) && $mashup_var_mainmenu_spc != '' ) {
                    echo esc_html( $mashup_var_mainmenu_spc != '' ? 'letter-spacing: ' . $mashup_var_mainmenu_spc . 'px !important;' : ''  );
                }
                if ( isset( $mashup_var_mainmenu_textr ) && $mashup_var_mainmenu_textr != '' ) {
                    echo esc_html( $mashup_var_mainmenu_textr != '' ? 'text-transform: ' . $mashup_var_mainmenu_textr . ' !important;' : ''  );
                }
            } else {
                echo mashup_var_font_font_print( $mashup_var_mainmenu_font_atts, $mashup_var_mainmenu_size, $mashup_var_mainmenu_lh, $mashup_var_mainmenu_font, true );
                if ( isset( $mashup_var_mainmenu_spc ) && $mashup_var_mainmenu_spc != '' ) {
                    echo esc_html( $mashup_var_mainmenu_spc != '' ? 'letter-spacing: ' . $mashup_var_mainmenu_spc . 'px !important;' : ''  );
                }
                if ( isset( $mashup_var_mainmenu_textr ) && $mashup_var_mainmenu_textr != '' ) {
                    echo esc_html( $mashup_var_mainmenu_textr != '' ? 'text-transform: ' . $mashup_var_mainmenu_textr . ' !important;' : ''  );
                }
            }
            ?>
            }

            <?php
        }

        if ( (isset( $mashup_var_heading_1_size ) && $mashup_var_heading_1_size != '') || (isset( $mashup_var_heading_1_spc ) && $mashup_var_heading_1_spc != '') || (isset( $mashup_var_heading_1_textr ) && $mashup_var_heading_1_textr != '') || (isset( $mashup_var_heading_h1_color ) && $mashup_var_heading_h1_color != '') ) {
            ?>
            h1, h1 a{
            <?php
            if ( $custom_font == true ) {
                echo 'font-family: mashup_var_custom_font;';
                if ( isset( $mashup_var_heading_1_size ) && $mashup_var_heading_1_size != '' ) {
                    echo 'font-size: ' . $mashup_var_heading_1_size . ';';
                }
                if ( isset( $mashup_var_heading_1_spc ) && $mashup_var_heading_1_spc != '' ) {
                    echo esc_html( $mashup_var_heading_1_spc != '' ? 'letter-spacing: ' . $mashup_var_heading_1_spc . 'px !important;' : ''  );
                }
                if ( isset( $mashup_var_heading_1_textr ) && $mashup_var_heading_1_textr != '' ) {
                    echo esc_html( $mashup_var_heading_1_textr != '' ? 'text-transform: ' . $mashup_var_heading_1_textr . ' !important;' : ''  );
                }
                if ( isset( $mashup_var_heading_h1_color ) && $mashup_var_heading_h1_color != '' ) {
                    echo esc_html( $mashup_var_heading_h1_color != '' ? 'color: ' . $mashup_var_heading_h1_color . ' !important;' : ''  );
                }
            } else {
                echo mashup_var_font_font_print( $mashup_var_heading1_font_atts, $mashup_var_heading_1_size, $mashup_var_heading_1_lh, $mashup_var_heading1_font, true );
                if ( isset( $mashup_var_heading_1_spc ) && $mashup_var_heading_1_spc != '' ) {
                    echo esc_html( $mashup_var_heading_1_spc != '' ? 'letter-spacing: ' . $mashup_var_heading_1_spc . 'px !important;' : ''  );
                }
                if ( isset( $mashup_var_heading_1_textr ) && $mashup_var_heading_1_textr != '' ) {
                    echo esc_html( $mashup_var_heading_1_textr != '' ? 'text-transform: ' . $mashup_var_heading_1_textr . ' !important;' : ''  );
                }
                if ( isset( $mashup_var_heading_h1_color ) && $mashup_var_heading_h1_color != '' ) {
                    echo esc_html( $mashup_var_heading_h1_color != '' ? 'color: ' . $mashup_var_heading_h1_color . ' !important;' : ''  );
                }
            }
            ?>}
            <?php
        }
        if ( (isset( $mashup_var_heading_2_size ) && $mashup_var_heading_2_size != '') || (isset( $mashup_var_heading_2_spc ) && $mashup_var_heading_2_spc != '') || (isset( $mashup_var_heading_2_textr ) && $mashup_var_heading_2_textr != '') || (isset( $mashup_var_heading_h2_color ) && $mashup_var_heading_h2_color != '') ) {
            ?>
            h2, h2 a{
            <?php
            if ( $custom_font == true ) {
                echo 'font-family: mashup_var_custom_font;';
                if ( isset( $mashup_var_heading_2_size ) && $mashup_var_heading_2_size != '' ) {
                    echo 'font-size: ' . $mashup_var_heading_2_size . ';';
                }
                if ( isset( $mashup_var_heading_2_spc ) && $mashup_var_heading_2_spc != '' ) {
                    echo esc_html( $mashup_var_heading_2_spc != '' ? 'letter-spacing: ' . $mashup_var_heading_2_spc . 'px !important;' : ''  );
                }
                if ( isset( $mashup_var_heading_2_textr ) && $mashup_var_heading_2_textr != '' ) {
                    echo esc_html( $mashup_var_heading_2_textr != '' ? 'text-transform: ' . $mashup_var_heading_2_textr . ' !important;' : ''  );
                }
                if ( isset( $mashup_var_heading_h2_color ) && $mashup_var_heading_h2_color != '' ) {
                    echo esc_html( $mashup_var_heading_h2_color != '' ? 'color: ' . $mashup_var_heading_h2_color . ' !important;' : ''  );
                }
            } else {
                echo mashup_var_font_font_print( $mashup_var_heading2_font_atts, $mashup_var_heading_2_size, $mashup_var_heading_2_lh, $mashup_var_heading2_font, true );
                if ( isset( $mashup_var_heading_2_spc ) && $mashup_var_heading_2_spc != '' ) {
                    echo esc_html( $mashup_var_heading_2_spc != '' ? 'letter-spacing: ' . $mashup_var_heading_2_spc . 'px !important;' : ''  );
                }
                if ( isset( $mashup_var_heading_2_textr ) && $mashup_var_heading_2_textr != '' ) {
                    echo esc_html( $mashup_var_heading_2_textr != '' ? 'text-transform: ' . $mashup_var_heading_2_textr . ' !important;' : ''  );
                }
                if ( isset( $mashup_var_heading_h2_color ) && $mashup_var_heading_h2_color != '' ) {
                    echo esc_html( $mashup_var_heading_h2_color != '' ? 'color: ' . $mashup_var_heading_h2_color . ' !important;' : ''  );
                }
            }
            ?>
            }
            <?php
        }
        if ( (isset( $mashup_var_heading_3_size ) && $mashup_var_heading_3_size != '') || (isset( $mashup_var_heading_3_spc ) && $mashup_var_heading_3_spc != '') || (isset( $mashup_var_heading_3_textr ) && $mashup_var_heading_3_textr != '') || (isset( $mashup_var_heading_h3_color ) && $mashup_var_heading_h3_color != '') ) {
            ?>
            h3, h3 a{ 
            <?php
            if ( $custom_font == true ) {
                echo 'font-family: mashup_var_custom_font;';
                if ( isset( $mashup_var_heading_3_size ) && $mashup_var_heading_3_size != '' ) {
                    echo 'font-size: ' . $mashup_var_heading_3_size . ';';
                }
                if ( isset( $mashup_var_heading_3_spc ) && $mashup_var_heading_3_spc != '' ) {
                    echo esc_html( $mashup_var_heading_3_spc != '' ? 'letter-spacing: ' . $mashup_var_heading_3_spc . 'px !important;' : ''  );
                }
                if ( isset( $mashup_var_heading_3_textr ) && $mashup_var_heading_3_textr != '' ) {
                    echo esc_html( $mashup_var_heading_3_textr != '' ? 'text-transform: ' . $mashup_var_heading_3_textr . ' !important;' : ''  );
                }
                if ( isset( $mashup_var_heading_h3_color ) && $mashup_var_heading_h3_color != '' ) {
                    echo esc_html( $mashup_var_heading_h3_color != '' ? 'color: ' . $mashup_var_heading_h3_color . ' !important;' : ''  );
                }
            } else {
                echo mashup_var_font_font_print( $mashup_var_heading3_font_atts, $mashup_var_heading_3_size, $mashup_var_heading_3_lh, $mashup_var_heading3_font, true );
                if ( isset( $mashup_var_heading_3_spc ) && $mashup_var_heading_3_spc != '' ) {
                    echo esc_html( $mashup_var_heading_3_spc != '' ? 'letter-spacing: ' . $mashup_var_heading_3_spc . 'px !important;' : ''  );
                }
                if ( isset( $mashup_var_heading_3_textr ) && $mashup_var_heading_3_textr != '' ) {
                    echo esc_html( $mashup_var_heading_3_textr != '' ? 'text-transform: ' . $mashup_var_heading_3_textr . ' !important;' : ''  );
                }
                if ( isset( $mashup_var_heading_h3_color ) && $mashup_var_heading_h3_color != '' ) {
                    echo esc_html( $mashup_var_heading_h3_color != '' ? 'color: ' . $mashup_var_heading_h3_color . ' !important;' : ''  );
                }
            }
            ?>
            }
            <?php
        }
        if ( (isset( $mashup_var_heading_4_size ) && $mashup_var_heading_4_size != '') || (isset( $mashup_var_heading_4_spc ) && $mashup_var_heading_4_spc != '') || (isset( $mashup_var_heading_4_textr ) && $mashup_var_heading_4_textr != '') || (isset( $mashup_var_heading_h4_color ) && $mashup_var_heading_h4_color != '') ) {
            ?>
            h4, h4 a{
            <?php
            if ( $custom_font == true ) {
                echo 'font-family: mashup_var_custom_font;';
                if ( isset( $mashup_var_heading_4_size ) && $mashup_var_heading_4_size != '' ) {
                    echo 'font-size: ' . $mashup_var_heading_4_size . ';';
                }
                if ( isset( $mashup_var_heading_4_spc ) && $mashup_var_heading_4_spc != '' ) {
                    echo esc_html( $mashup_var_heading_4_spc != '' ? 'letter-spacing: ' . $mashup_var_heading_4_spc . 'px !important;' : ''  );
                }
                if ( isset( $mashup_var_heading_4_textr ) && $mashup_var_heading_4_textr != '' ) {
                    echo esc_html( $mashup_var_heading_4_textr != '' ? 'text-transform: ' . $mashup_var_heading_4_textr . ' !important;' : ''  );
                }
                if ( isset( $mashup_var_heading_h4_color ) && $mashup_var_heading_h4_color != '' ) {
                    echo esc_html( $mashup_var_heading_h4_color != '' ? 'color: ' . $mashup_var_heading_h4_color . ' !important;' : ''  );
                }
            } else {
                echo mashup_var_font_font_print( $mashup_var_heading4_font_atts, $mashup_var_heading_4_size, $mashup_var_heading_4_lh, $mashup_var_heading4_font, true );
                if ( isset( $mashup_var_heading_4_spc ) && $mashup_var_heading_4_spc != '' ) {
                    echo esc_html( $mashup_var_heading_4_spc != '' ? 'letter-spacing: ' . $mashup_var_heading_4_spc . 'px !important;' : ''  );
                }
                if ( isset( $mashup_var_heading_4_textr ) && $mashup_var_heading_4_textr != '' ) {
                    echo esc_html( $mashup_var_heading_4_textr != '' ? 'text-transform: ' . $mashup_var_heading_4_textr . ' !important;' : ''  );
                }
                if ( isset( $mashup_var_heading_h4_color ) && $mashup_var_heading_h4_color != '' ) {
                    echo esc_html( $mashup_var_heading_h4_color != '' ? 'color: ' . $mashup_var_heading_h4_color . ' !important;' : ''  );
                }
            }
            ?>
            }
            <?php
        }
        if ( (isset( $mashup_var_heading_5_size ) && $mashup_var_heading_5_size != '') || (isset( $mashup_var_heading_5_spc ) && $mashup_var_heading_5_spc != '') || (isset( $mashup_var_heading_5_textr ) && $mashup_var_heading_5_textr != '') || (isset( $mashup_var_heading_h5_color ) && $mashup_var_heading_h5_color != '') ) {
            ?>
            h5, h5 a{
            <?php
            if ( $custom_font == true ) {
                echo 'font-family: mashup_var_custom_font;';
                if ( isset( $mashup_var_heading_5_size ) && $mashup_var_heading_5_size != '' ) {
                    echo 'font-size: ' . $mashup_var_heading_5_size . ';';
                }
                if ( isset( $mashup_var_heading_5_spc ) && $mashup_var_heading_5_spc != '' ) {
                    echo esc_html( $mashup_var_heading_5_spc != '' ? 'letter-spacing: ' . $mashup_var_heading_5_spc . 'px !important;' : ''  );
                }
                if ( isset( $mashup_var_heading_5_textr ) && $mashup_var_heading_5_textr != '' ) {
                    echo esc_html( $mashup_var_heading_5_textr != '' ? 'text-transform: ' . $mashup_var_heading_5_textr . ' !important;' : ''  );
                }
                if ( isset( $mashup_var_heading_h5_color ) && $mashup_var_heading_h5_color != '' ) {
                    echo esc_html( $mashup_var_heading_h5_color != '' ? 'color: ' . $mashup_var_heading_h5_color . ' !important;' : ''  );
                }
            } else {
                echo mashup_var_font_font_print( $mashup_var_heading5_font_atts, $mashup_var_heading_5_size, $mashup_var_heading_5_lh, $mashup_var_heading5_font, true );
                if ( isset( $mashup_var_heading_5_spc ) && $mashup_var_heading_5_spc != '' ) {
                    echo esc_html( $mashup_var_heading_5_spc != '' ? 'letter-spacing: ' . $mashup_var_heading_5_spc . 'px !important;' : ''  );
                }
                if ( isset( $mashup_var_heading_5_textr ) && $mashup_var_heading_5_textr != '' ) {
                    echo esc_html( $mashup_var_heading_5_textr != '' ? 'text-transform: ' . $mashup_var_heading_5_textr . ' !important;' : ''  );
                }
                if ( isset( $mashup_var_heading_h5_color ) && $mashup_var_heading_h5_color != '' ) {
                    echo esc_html( $mashup_var_heading_h5_color != '' ? 'color: ' . $mashup_var_heading_h5_color . ' !important;' : ''  );
                }
            }
            ?>
            }
            <?php
        }
        if ( (isset( $mashup_var_heading_6_size ) && $mashup_var_heading_6_size != '') || (isset( $mashup_var_heading_6_spc ) && $mashup_var_heading_6_spc != '') || (isset( $mashup_var_heading_6_textr ) && $mashup_var_heading_6_textr != '') || (isset( $mashup_var_heading_h6_color ) && $mashup_var_heading_h6_color != '') ) {
            ?>
            h6, h6 a{
            <?php
            if ( $custom_font == true ) {
                echo 'font-family: mashup_var_custom_font;';
                if ( isset( $mashup_var_heading_6_size ) && $mashup_var_heading_6_size != '' ) {
                    echo 'font-size: ' . $mashup_var_heading_6_size . ';';
                }
                if ( isset( $mashup_var_heading_6_spc ) && $mashup_var_heading_6_spc != '' ) {
                    echo esc_html( $mashup_var_heading_6_spc != '' ? 'letter-spacing: ' . $mashup_var_heading_6_spc . 'px !important;' : ''  );
                }
                if ( isset( $mashup_var_heading_6_textr ) && $mashup_var_heading_6_textr != '' ) {
                    echo esc_html( $mashup_var_heading_6_textr != '' ? 'text-transform: ' . $mashup_var_heading_6_textr . ' !important;' : ''  );
                }
                if ( isset( $mashup_var_heading_h6_color ) && $mashup_var_heading_h6_color != '' ) {
                    echo esc_html( $mashup_var_heading_h6_color != '' ? 'color: ' . $mashup_var_heading_h6_color . ' !important;' : ''  );
                }
            } else {
                echo mashup_var_font_font_print( $mashup_var_heading6_font_atts, $mashup_var_heading_6_size, $mashup_var_heading_6_lh, $mashup_var_heading6_font, true );
                if ( isset( $mashup_var_heading_6_spc ) && $mashup_var_heading_6_spc != '' ) {
                    echo esc_html( $mashup_var_heading_6_spc != '' ? 'letter-spacing: ' . $mashup_var_heading_6_spc . 'px !important;' : ''  );
                }
                if ( isset( $mashup_var_heading_6_textr ) && $mashup_var_heading_6_textr != '' ) {
                    echo esc_html( $mashup_var_heading_6_textr != '' ? 'text-transform: ' . $mashup_var_heading_6_textr . ' !important;' : ''  );
                }
                if ( isset( $mashup_var_heading_h6_color ) && $mashup_var_heading_h6_color != '' ) {
                    echo esc_html( $mashup_var_heading_h6_color != '' ? 'color: ' . $mashup_var_heading_h6_color . ' !important;' : ''  );
                }
            }
            ?>
            }
            <?php
        }



        if ( (isset( $mashup_var_section_title_size ) && $mashup_var_section_title_size != '') || (isset( $mashup_var_section_title_spc ) && $mashup_var_section_title_spc != '') || (isset( $mashup_var_section_title_textr ) && $mashup_var_section_title_textr != '') || (isset( $mashup_var_section_title_color ) && $mashup_var_section_title_color != '') ) {
            ?>       
            .section-title h2, .element-title h2{
            <?php
            if ( $custom_font == true ) {
                echo 'font-family: mashup_var_custom_font;';
                if ( isset( $mashup_var_section_title_size ) && $mashup_var_section_title_size != '' ) {
                    echo 'font-size: ' . $mashup_var_section_title_size . ';';
                }
                if ( isset( $mashup_var_section_title_spc ) && $mashup_var_section_title_spc != '' ) {
                    echo esc_html( $mashup_var_section_title_spc != '' ? 'letter-spacing: ' . $mashup_var_section_title_spc . 'px !important;' : ''  );
                }
                if ( isset( $mashup_var_section_title_textr ) && $mashup_var_section_title_textr != '' ) {
                    echo esc_html( $mashup_var_section_title_textr != '' ? 'text-transform: ' . $mashup_var_section_title_textr . ' !important;' : ''  );
                }
                if ( isset( $mashup_var_section_title_color ) && $mashup_var_section_title_color != '' ) {
                    echo esc_html( $mashup_var_section_title_color != '' ? 'color: ' . $mashup_var_section_title_color . ' !important;' : ''  );
                }
            } else {

                echo mashup_var_font_font_print( $mashup_var_section_title_font_atts, $mashup_var_section_title_size, $mashup_var_section_title_lh, $mashup_var_section_title_font, true );
                if ( isset( $mashup_var_section_title_spc ) && $mashup_var_section_title_spc != '' ) {
                    echo esc_html( $mashup_var_section_title_spc != '' ? 'letter-spacing: ' . $mashup_var_section_title_spc . 'px !important;' : ''  );
                }
                if ( isset( $mashup_var_section_title_textr ) && $mashup_var_section_title_textr != '' ) {
                    echo esc_html( $mashup_var_section_title_textr != '' ? 'text-transform: ' . $mashup_var_section_title_textr . ' !important;' : ''  );
                }
                if ( isset( $mashup_var_section_title_color ) && $mashup_var_section_title_color != '' ) {
                    echo esc_html( $mashup_var_section_title_color != '' ? 'color: ' . $mashup_var_section_title_color . ' !important;' : ''  );
                }
            }
            ?>
            }
            <?php
        }

        if ( (isset( $mashup_var_post_title_size ) && $mashup_var_post_title_size != '') || (isset( $mashup_var_post_title_spc ) && $mashup_var_post_title_spc != '') || (isset( $mashup_var_post_title_textr ) && $mashup_var_post_title_textr != '') || (isset( $mashup_var_post_title_color ) && $mashup_var_post_title_color != '') ) {
            ?>
            .post-title h2{
            <?php
            if ( $custom_font == true ) {
                echo 'font-family: mashup_var_custom_font;';

                if ( isset( $mashup_var_post_title_size ) && $mashup_var_post_title_size != '' ) {
                    echo 'font-size: ' . $mashup_var_post_title_size . ';';
                }
                if ( isset( $mashup_var_post_title_spc ) && $mashup_var_post_title_spc != '' ) {
                    echo esc_html( $mashup_var_post_title_spc != '' ? 'letter-spacing: ' . $mashup_var_post_title_spc . 'px !important;' : ''  );
                }
                if ( isset( $mashup_var_post_title_textr ) && $mashup_var_post_title_textr != '' ) {
                    echo esc_html( $mashup_var_post_title_textr != '' ? 'text-transform: ' . $mashup_var_post_title_textr . ' !important;' : ''  );
                }
                if ( isset( $mashup_var_post_title_color ) && $mashup_var_post_title_color != '' ) {
                    echo esc_html( $mashup_var_post_title_color != '' ? 'color: ' . $mashup_var_post_title_color . ' !important;' : ''  );
                }
            } else {
                echo mashup_var_font_font_print( $mashup_var_post_title_font_atts, $mashup_var_post_title_size, $mashup_var_post_title_lh, $mashup_var_post_title_font, true );
                if ( isset( $mashup_var_post_title_spc ) && $mashup_var_post_title_spc != '' ) {
                    echo esc_html( $mashup_var_post_title_spc != '' ? 'letter-spacing: ' . $mashup_var_post_title_spc . 'px !important;' : ''  );
                }
                if ( isset( $mashup_var_post_title_textr ) && $mashup_var_post_title_textr != '' ) {
                    echo esc_html( $mashup_var_post_title_textr != '' ? 'text-transform: ' . $mashup_var_post_title_textr . ' !important;' : ''  );
                }
                if ( isset( $mashup_var_post_title_color ) && $mashup_var_post_title_color != '' ) {
                    echo esc_html( $mashup_var_post_title_color != '' ? 'color: ' . $mashup_var_post_title_color . ' !important;' : ''  );
                }
            }
            ?>
            }
            <?php
        }
        if ( (isset( $mashup_var_page_title_size ) && $mashup_var_page_title_size != '') || (isset( $mashup_var_page_title_spc ) && $mashup_var_page_title_spc != '') || (isset( $mashup_var_page_title_textr ) && $mashup_var_page_title_textr != '') ) {
            ?>
            .page-title h1 {
            <?php
            if ( $custom_font == true ) {
                echo 'font-family: mashup_var_custom_font;';
                if ( isset( $mashup_var_page_title_size ) && $mashup_var_page_title_size != '' ) {
                    echo 'font-size: ' . $mashup_var_page_title_size . ';';
                }
                if ( isset( $mashup_var_page_title_spc ) && $mashup_var_page_title_spc != '' ) {
                    echo esc_html( $mashup_var_page_title_spc != '' ? 'letter-spacing: ' . $mashup_var_page_title_spc . 'px !important;' : ''  );
                }
                if ( isset( $mashup_var_page_title_textr ) && $mashup_var_page_title_textr != '' ) {
                    echo esc_html( $mashup_var_page_title_textr != '' ? 'text-transform: ' . $mashup_var_page_title_textr . ' !important;' : ''  );
                }
                if ( isset( $mashup_var_page_title_color ) && $mashup_var_page_title_color != '' ) {
                    echo esc_html( $mashup_var_page_title_color != '' ? 'color: ' . $mashup_var_page_title_color . ' !important;' : ''  );
                }
            } else {

                echo mashup_var_font_font_print( $mashup_var_page_title_font_atts, $mashup_var_page_title_size, $mashup_var_page_title_lh, $mashup_var_page_title_font, true );
                if ( isset( $mashup_var_page_title_spc ) && $mashup_var_page_title_spc != '' ) {
                    echo esc_html( $mashup_var_page_title_spc != '' ? 'letter-spacing: ' . $mashup_var_page_title_spc . 'px !important;' : ''  );
                }
                if ( isset( $mashup_var_page_title_textr ) && $mashup_var_page_title_textr != '' ) {
                    echo esc_html( $mashup_var_page_title_textr != '' ? 'text-transform: ' . $mashup_var_page_title_textr . ' !important;' : ''  );
                }
                if ( isset( $mashup_var_page_title_color ) && $mashup_var_page_title_color != '' ) {
                    echo esc_html( $mashup_var_page_title_color != '' ? 'color: ' . $mashup_var_page_title_color . ' !important;' : ''  );
                }
            }
            ?>
            }
            <?php
        }







        if ( (isset( $mashup_var_widget_heading_size ) && $mashup_var_widget_heading_size != '') || (isset( $mashup_var_widget_heading_spc ) && $mashup_var_widget_heading_spc != '') || (isset( $mashup_var_widget_title_color ) && $mashup_var_widget_title_color != '') ) {
            ?>
            .widget .widget-title h6{
            <?php
            if ( $custom_font == true ) {
                echo 'font-family: mashup_var_custom_font;';
                if ( isset( $mashup_var_widget_heading_size ) && $mashup_var_widget_heading_size != '' ) {
                    echo 'font-size: ' . $mashup_var_widget_heading_size . ';';
                }
                if ( isset( $mashup_var_widget_heading_spc ) && $mashup_var_widget_heading_spc != '' ) {
                    echo esc_html( $mashup_var_widget_heading_spc != '' ? 'letter-spacing: ' . $mashup_var_widget_heading_spc . 'px !important;' : ''  );
                }
                if ( isset( $mashup_var_widget_heading_textr ) && $mashup_var_widget_heading_textr != '' ) {
                    echo esc_html( $mashup_var_widget_heading_textr != '' ? 'text-transform: ' . $mashup_var_widget_heading_textr . ' !important;' : ''  );
                }
                if ( isset( $mashup_var_widget_title_color ) && $mashup_var_widget_title_color != '' ) {
                    echo esc_html( $mashup_var_widget_title_color != '' ? 'color: ' . $mashup_var_widget_title_color . ' !important;' : ''  );
                }
            } else {
                echo mashup_var_font_font_print( $mashup_var_widget_heading_font_atts, $mashup_var_widget_heading_size, $mashup_var_widget_heading_lh, $mashup_var_widget_heading_font, true );
                if ( isset( $mashup_var_widget_heading_spc ) && $mashup_var_widget_heading_spc != '' ) {
                    echo esc_html( $mashup_var_widget_heading_spc != '' ? 'letter-spacing: ' . $mashup_var_widget_heading_spc . 'px !important;' : ''  );
                }
                if ( isset( $mashup_var_widget_heading_textr ) && $mashup_var_widget_heading_textr != '' ) {
                    echo esc_html( $mashup_var_widget_heading_textr != '' ? 'text-transform: ' . $mashup_var_widget_heading_textr . ' !important;' : ''  );
                }
                if ( isset( $mashup_var_widget_title_color ) && $mashup_var_widget_title_color != '' ) {
                    echo esc_html( $mashup_var_widget_title_color != '' ? 'color: ' . $mashup_var_widget_title_color . ' !important;' : ''  );
                }
            }
            ?>
            }
            <?php
        }


        if ( (isset( $mashup_var_ft_widget_heading_size ) && $mashup_var_ft_widget_heading_size != '') || (isset( $mashup_var_ft_widget_heading_spc ) && $mashup_var_ft_widget_heading_spc != '') || (isset( $mashup_var_ft_widget_heading_textr ) && $mashup_var_ft_widget_heading_textr != '') || (isset( $mashup_var_ft_widget_title_color ) && $mashup_var_ft_widget_title_color != '') ) {
            ?> 
            /*
            * Footer Title color and fonts
            */
            #footer .widget-title h6{
            <?php
            if ( $custom_font == true ) {
                echo 'font-family: mashup_var_custom_font;';
                if ( isset( $mashup_var_ft_widget_heading_size ) && $mashup_var_ft_widget_heading_size != '' ) {
                    echo 'font-size: ' . $mashup_var_ft_widget_heading_size . ';';
                }
                if ( isset( $mashup_var_ft_widget_heading_spc ) && $mashup_var_ft_widget_heading_spc != '' ) {
                    echo esc_html( $mashup_var_ft_widget_heading_spc != '' ? 'letter-spacing: ' . $mashup_var_ft_widget_heading_spc . 'px !important;' : ''  );
                }
                if ( isset( $mashup_var_ft_widget_heading_textr ) && $mashup_var_ft_widget_heading_textr != '' ) {
                    echo esc_html( $mashup_var_ft_widget_heading_textr != '' ? 'text-transform: ' . $mashup_var_ft_widget_heading_textr . ' !important;' : ''  );
                }
                if ( isset( $mashup_var_ft_widget_title_color ) && $mashup_var_ft_widget_title_color != '' ) {
                    echo esc_html( $mashup_var_ft_widget_title_color != '' ? 'color: ' . $mashup_var_ft_widget_title_color . ' !important;' : ''  );
                }
            } else {
                echo mashup_var_font_font_print( $mashup_var_ft_widget_heading_font_atts, $mashup_var_ft_widget_heading_size, $mashup_var_ft_widget_heading_lh, $mashup_var_ft_widget_heading_font, true );

                if ( isset( $mashup_var_ft_widget_heading_spc ) && $mashup_var_ft_widget_heading_spc != '' ) {
                    echo esc_html( $mashup_var_ft_widget_heading_spc != '' ? 'letter-spacing: ' . $mashup_var_ft_widget_heading_spc . 'px !important;' : ''  );
                }
                if ( isset( $mashup_var_ft_widget_heading_textr ) && $mashup_var_ft_widget_heading_textr != '' ) {
                    echo esc_html( $mashup_var_ft_widget_heading_textr != '' ? 'text-transform: ' . $mashup_var_ft_widget_heading_textr . ' !important;' : ''  );
                }
                if ( isset( $mashup_var_ft_widget_title_color ) && $mashup_var_ft_widget_title_color != '' ) {
                    echo esc_html( $mashup_var_ft_widget_title_color != '' ? 'color: ' . $mashup_var_ft_widget_title_color . ' !important;' : ''  );
                }
            }
            ?>
            }
            <?php
        }

        if ( isset( $mashup_var_top_strip_color ) && $mashup_var_top_strip_color != '' ) {
            ?>
            /*Topbar text Color*/

            #header .top-bar a,
            #header .top-bar .today-date{
            color: <?php echo mashup_allow_special_char( $mashup_var_top_strip_color ); ?> !important;
            }
            <?php
        }

        if ( isset( $mashup_var_top_strip_bgcolor ) && $mashup_var_top_strip_bgcolor != '' ) {
            ?>
            /*TopBar Background Color*/

            #header .top-bar {
            background: <?php echo mashup_allow_special_char( $mashup_var_top_strip_bgcolor ); ?> !important;
            }
            <?php
        }

        if ( isset( $mashup_var_submenu_bgcolor ) && $mashup_var_submenu_bgcolor != '' ) {
            ?>
            /*Dropdown and Megamenu Background Color*/

            #header .main-navigation ul ul,
            .main-navigation ul li.mega-dropdown-lg ul,
            .main-navigation ul li.mega-menu ul.mega-dropdown-lg:before,
            #header .mega-menu .mega-dropdown-lg.has-border > li:before,
            .main-navigation ul li.mega-menu ul.mega-dropdown-lg:after,
            #header .main-navigation ul ul ul li:hover > a,
            ul.mega-dropdown-lg .menu-loader:before,
            #header .main-navigation ul .mega-dropdown-post .swiper-loader
            { background-color:<?php echo mashup_allow_special_char( $mashup_var_submenu_bgcolor ); ?> !important; }
            <?php
        }



        if ( isset( $mashup_var_header_bgcolor ) && $mashup_var_header_bgcolor != '' ) {
            ?>

            /*Header Background Color*/

            #header .main-header,
            .gn-search-holder .search-container input[type='text'],
            #header.dark.fancy .main-header
            {
            background-color:<?php echo mashup_allow_special_char( $mashup_var_header_bgcolor ); ?> !important;
            }

            <?php
        }


        if ( isset( $mashup_var_submenu_color ) && $mashup_var_submenu_color != '' ) {
            ?>
            /*1st level Dropdown Link Color*/
            #header .main-navigation ul ul li a,
            #header .main-navigation ul ul li.menu-item-has-children > a:after
            {color:<?php echo mashup_allow_special_char( $mashup_var_submenu_color ); ?> !important;}
            <?php
        }

        if ( isset( $mashup_var_submenu_2nd_level_color ) && $mashup_var_submenu_2nd_level_color != '' ) {
            ?>
            /*2nd Level Menu link Color*/

            #header .main-navigation ul ul ul li a,
            #header .main-navigation ul ul ul ul li a
            {color:<?php echo mashup_allow_special_char( $mashup_var_submenu_2nd_level_color ); ?> !important;}
            <?php
        }
        if ( isset( $mashup_var_submenu_hover_color ) && $mashup_var_submenu_hover_color != '' ) {
            ?>

            /*Submenu Hover Colors*/

            #header .main-navigation ul ul li:hover > a,
            #header .main-navigation ul li.current-menu-parent ul li.current-menu-item:hover > a,
            #header .main-navigation ul li.current-menu-ancestor ul li.current-menu-item > a,
            #header .main-navigation ul li.current-menu-ancestor ul li.current-menu-item > a:after,
            #header .main-navigation ul li.current-menu-ancestor ul li.current-menu-ancestor > a,
            #header .main-navigation ul li.current-menu-ancestor ul li.current-menu-ancestor > a:after {
            color:<?php echo mashup_allow_special_char( $mashup_var_submenu_hover_color ); ?> !important;}

            <?php
        }


        if ( isset( $mashup_var_menu_color ) && $mashup_var_menu_color != '' ) {
            ?>
            /*Navigation-Menu Link Color*/
            #header .main-navigation ul li a,
			#header .main-navigation ul li:first-child.current-menu-item > a,
            #header .main-navigation ul li.menu-item-has-children a:after,
			#header .main-navigation .user-option .user-cart ul li > a i,
			#header.modren .user-option .user-cart ul li > a
            { color:<?php echo mashup_allow_special_char( $mashup_var_menu_color ); ?> !important;}
            <?php
        }
        if ( isset( $mashup_var_menu_active_color ) && $mashup_var_menu_active_color != '' ) {
            ?>
            /*Navigation-Menu Hover Link Color*/
            #header .main-navigation ul li:hover > a,
			#header .main-navigation ul li:first-child.current-menu-item:hover > a,
            #header .main-navigation ul li.menu-item-has-children:hover > a:after,
            #header .main-navigation ul li.current-menu-ancestor > a,
            #header .main-navigation ul li.current-menu-ancestor > a:after,
            #header .main-navigation ul li.current-menu-item > a,
            #header .main-navigation ul li.current-menu-item > a:after
            { color:<?php echo mashup_allow_special_char( $mashup_var_menu_active_color ); ?> !important; }
            <?php
        }
        if ( isset( $mashup_var_menu_hover_bg_color ) && $mashup_var_menu_hover_bg_color != '' ) {
            ?>
            /*Menu Link hover background-color*/

            #header .main-navigation ul li:hover > a,
            #header .main-navigation ul li.current-menu-ancestor > a,
            #header .main-navigation ul li.current-menu-item > a,
            .home #header .main-navigation ul li.current-menu-item:hover > a
            { background:<?php echo mashup_allow_special_char( $mashup_var_menu_hover_bg_color ); ?> !important; }
            <?php
        }

        if ( isset( $mashup_var_submenu_2nd_level_bgcolor ) && $mashup_var_submenu_2nd_level_bgcolor != '' ) {
            ?>
            /*DropDown 2nd Level Background-Color*/
            #header .main-navigation ul ul ul,
            #header .main-navigation ul ul li:hover > a,
            #header .main-navigation ul li.current-menu-ancestor ul li.current-menu-item > a,
            #header .main-navigation ul li.current-menu-ancestor ul li.current-menu-ancestor > a,
            #header .main-navigation ul li.mega-menu .mega-dropdown-category .category-list a
            { background:<?php echo mashup_allow_special_char( $mashup_var_submenu_2nd_level_bgcolor ); ?> !important; }
            <?php
        }


        if ( isset( $mashup_var_widget_title_color ) && $mashup_var_widget_title_color != '' ) {
            ?>
            .page-sidebar .widget-title h3, .page-sidebar .widget-title h4, .page-sidebar .widget-title h5, .page-sidebar .widget-title h6{
            color:<?php echo mashup_allow_special_char( $mashup_var_widget_title_color ); ?> !important;
            }<?php
        }
        if ( isset( $mashup_var_widget_title_color ) && $mashup_var_widget_title_color != '' ) {
            ?>
            .section-sidebar .widget-title h3, .section-sidebar .widget-title h4, .section-sidebar .widget-title h5, .section-sidebar .widget-title h6{
            color:<?php echo mashup_allow_special_char( $mashup_var_widget_title_color ); ?> !important;
            }
            <?php
        }
        /**
         * @Set Footer Colors
         *
         *
         */
        $mashup_var_footerbg_color = (isset( $mashup_var_options['mashup_var_footerbg_color'] ) and $mashup_var_options['mashup_var_footerbg_color'] <> '') ? $mashup_var_options['mashup_var_footerbg_color'] : '';
        $mashup_var_copyright_bg_color = (isset( $mashup_var_options['mashup_var_copyright_bg_color'] ) and $mashup_var_options['mashup_var_copyright_bg_color'] <> '') ? $mashup_var_options['mashup_var_copyright_bg_color'] : '';
        $mashup_var_widget_bg_color = (isset( $mashup_var_options['mashup_var_widget_bg_color'] ) and $mashup_var_options['mashup_var_widget_bg_color'] <> '') ? $mashup_var_options['mashup_var_widget_bg_color'] : '';

        $mashup_var_footerbg_image = (isset( $mashup_var_options['mashup_var_footer_background_image'] ) and $mashup_var_options['mashup_var_footer_background_image'] <> '') ? $mashup_var_options['mashup_var_footer_background_image'] : '';

        $mashup_var_footer_text_color = (isset( $mashup_var_options['mashup_var_footer_text_color'] ) and $mashup_var_options['mashup_var_footer_text_color'] <> '') ? $mashup_var_options['mashup_var_footer_text_color'] : '';
        $mashup_var_link_color = (isset( $mashup_var_options['mashup_var_link_color'] ) and $mashup_var_options['mashup_var_link_color'] <> '') ? $mashup_var_options['mashup_var_link_color'] : '';
        $mashup_var_sub_footerbg_color = (isset( $mashup_var_options['mashup_var_sub_footerbg_color'] ) and $mashup_var_options['mashup_var_sub_footerbg_color'] <> '') ? $mashup_var_options['mashup_var_sub_footerbg_color'] : '';

        $mashup_var_copyright_text_color = (isset( $mashup_var_options['mashup_var_copyright_text_color'] ) and $mashup_var_options['mashup_var_copyright_text_color'] <> '') ? $mashup_var_options['mashup_var_copyright_text_color'] : '';

        $mashup_var_copyright_bg_color = (isset( $mashup_var_options['mashup_var_copyright_bg_color'] ) and $mashup_var_options['mashup_var_copyright_bg_color'] <> '') ? $mashup_var_options['mashup_var_copyright_bg_color'] : '';


        /* Footer */

        /* Footer BackgroundImage */
        if ( isset( $mashup_var_footerbg_image ) && $mashup_var_footerbg_image != '' ) {
            ?>
            #footer .cs-footer-widgets {
            background: url(<?php echo esc_url( $mashup_var_footerbg_image ); ?>) no-repeat !important;
            background-size: cover !important;
            }
            <?php
        }
        if ( isset( $mashup_var_footerbg_color ) && $mashup_var_footerbg_color != '' ) {
            ?>
            /*Footer Background Color*/

            #footer .cs-footer-widgets { background-color:<?php echo mashup_allow_special_char( $mashup_var_footerbg_color ); ?> !important; }
            <?php
        }

        if ( isset( $mashup_var_footerbg_color ) && $mashup_var_footerbg_color != '' ) {
            ?>
            /*Footer Background Color*/

            #footer .cs-footer-widgets { background-color:<?php echo mashup_allow_special_char( $mashup_var_custom_footer_background ); ?> !important; }
            <?php
        }

        if ( isset( $mashup_var_sub_footerbg_color ) && $mashup_var_sub_footerbg_color != '' ) {
            ?>
            footer#footer-sec, footer.group:before { background-color:<?php echo mashup_allow_special_char( $mashup_var_sub_footerbg_color ); ?> !important; }
            <?php
        }
        if ( isset( $mashup_var_footer_text_color ) && $mashup_var_footer_text_color != '' ) {
            ?>
            /*Footer Text Color*/

            #footer .cs-footer-widgets p, .custom-container #footer .cs-footer-widgets p
            {color:<?php echo mashup_allow_special_char( $mashup_var_footer_text_color ); ?> !important;}
            <?php
        }
        if ( isset( $mashup_var_copyright_text_color ) && $mashup_var_copyright_text_color != '' ) {
            ?>
            /*Footer Copyright-text Color*/

            #footer .cs-copyright p,
            #footer .cs-copyright .btn-top a,
			#footer .cs-copyright ul.terms-nav li a
            {
            color:<?php echo mashup_allow_special_char( $mashup_var_copyright_text_color ); ?> !important;
            }
        <?php }
		
		if ( isset( $mashup_var_copyright_text_color ) && $mashup_var_copyright_text_color != '' ) {
            ?>
            /*Footer Copyright-text after Color*/

            ul.terms-nav li:after
            {
            background-color:<?php echo mashup_allow_special_char( $mashup_var_copyright_text_color ); ?> !important;
            }
        <?php }
		if ( isset( $mashup_var_link_color ) && $mashup_var_link_color != '' ) { ?>
            /*Footer Link Color*/

            #footer .cs-footer-widgets a,
            #footer .cs-footer-widgets a i,
			#footer .cs-copyright .widget-nav ul li a,
			#footer .cs-copyright p a,
			#footer .cs-copyright .widget-text ul li a{
            color:<?php echo mashup_allow_special_char( $mashup_var_link_color ); ?> !important;
            }<?php
        }
        if ( isset( $mashup_var_copyright_bg_color ) && $mashup_var_copyright_bg_color != '' ) {
            ?>
            /*Footer Copyright Background Color*/

            #footer .cs-copyright,
            #footer.modern-v1 .cs-copyright {background-color:<?php echo mashup_allow_special_char( $mashup_var_copyright_bg_color ); ?> !important;}
            <?php
        }


        $mashup_var_custom_themeoption_str = ob_get_clean();
        return $mashup_var_custom_themeoption_str;
    }

}
