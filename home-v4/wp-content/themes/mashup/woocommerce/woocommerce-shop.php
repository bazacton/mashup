<?php
/**
 * The template for 
 * displaying shop page
 */
get_header();
$var_arrays = array('post', 'mashup_node', 'mashup_sidebarLayout', 'column_class', 'mashup_xmlObject', 'mashup_node_id', 'column_attributes', 'mashup_elem_id');
$page_global_vars = MASHUP_VAR_GLOBALS()->globalizing($var_arrays);
extract($page_global_vars);

if (is_shop()) {

    $mashup_shop_id = wc_get_page_id('shop');
    $mashup_page_bulider = get_post_meta($mashup_shop_id, "mashup_page_builder", true);
    $mashup_xmlObject = new stdClass();
    if (isset($mashup_page_bulider) && $mashup_page_bulider <> '') {
        $mashup_xmlObject = new SimpleXMLElement($mashup_page_bulider);
    }
    ?>
    <!-- Main Content Section -->
    <div class="main-section">
        <?php
        $mashup_page_sidebar_right = '';
        $mashup_page_sidebar_left = '';
        $mashup_postObject = get_post_meta($mashup_shop_id, 'mashup_var_full_data', true);
        $mashup_page_layout = get_post_meta($mashup_shop_id, 'mashup_var_page_layout', true);
        $mashup_page_sidebar_right = get_post_meta($mashup_shop_id, 'mashup_var_page_sidebar_right', true);
        $mashup_page_sidebar_left = get_post_meta($mashup_shop_id, 'mashup_var_page_sidebar_left', true);
        $mashup_page_bulider = get_post_meta($mashup_shop_id, "mashup_page_builder", true);
        $section_container_width = '';
        $page_element_size = 'page-content-fullwidth';

        if (!isset($mashup_page_layout) || $mashup_page_layout == "none") {
            $page_element_size = 'page-content-fullwidth col-lg-12 col-md-12 col-sm-12 col-xs-12';
        } else {
            $page_element_size = 'page-content col-lg-9 col-md-9 col-sm-12 col-xs-12';
        }
        $mashup_xmlObject = new stdClass();

        if (isset($mashup_page_bulider) && $mashup_page_bulider <> '') {
            $mashup_xmlObject = new SimpleXMLElement($mashup_page_bulider);
        }
        if (isset($mashup_page_layout)) {
            $mashup_sidebarLayout = $mashup_page_layout;
        }
        $pageSidebar = false;
        if ($mashup_sidebarLayout == 'left' || $mashup_sidebarLayout == 'right') {
            $pageSidebar = true;
        }
        if (!empty($mashup_xmlObject) && is_array($mashup_xmlObject) && count($mashup_xmlObject) > 1) {
            //if ( isset( $mashup_xmlObject ) && count( $mashup_xmlObject ) > 1 ) {
            if (isset($mashup_page_layout)) {
                $mashup_page_sidebar_right = $mashup_page_sidebar_right;
                $mashup_page_sidebar_left = $mashup_page_sidebar_left;
            }
            $mashup_counter_node = $column_no = 0;
            $fullwith_style = '';
            $section_container_style_elements = ' ';
            if (isset($mashup_page_layout) && $mashup_sidebarLayout <> '' and $mashup_sidebarLayout <> "none") {
                $fullwith_style = 'style="width:100%;"';
                $section_container_style_elements = ' width: 100%;';
                echo '<div class="container">';
                echo '<div class="row">';
                if (isset($mashup_page_layout) && $mashup_sidebarLayout <> '' and $mashup_sidebarLayout <> "none" and $mashup_sidebarLayout == 'left') :
                    if (is_active_sidebar(mashup_get_sidebar_id($mashup_page_sidebar_left))) {
                        ?>
                        <aside class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($mashup_page_sidebar_left)) : endif; ?>
                        </aside>
                        <?php
                    }
                endif;
                echo '<div class="' . ($page_element_size) . '">';
            }
            if (post_password_required()) {
                echo '<header class="heading"><h6 class="transform">' . get_the_title($mashup_shop_id) . '</h6></header>';
                echo mashup_password_form();
            } else {
                $width = 840;
                $height = 328;
                $mashup_post_thumbnail_id = get_post_thumbnail_id($mashup_shop_id);
                $image_url = mashup_attachment_image_src($mashup_post_thumbnail_id, $width, $height);
                wp_reset_postdata();

                if ($pageSidebar != true) {
                    ?>
                    <div class="page-section">
                        <div class="container">
                            <div class="row">
                                <?php
                            }
                            if (isset($image_url) && $image_url != '') {
                                ?>
                                <a href="<?php echo esc_url($image_url); ?>" data-rel="prettyPhoto" data-title="">
                                    <figure>
                                        <div class="page-featured-image">
                                            <img class="img-thumbnail cs-page-thumbnail" title="" alt="" data-src="" src="<?php echo esc_url($image_url); ?>">
                                        </div>
                                    </figure>
                                </a>
                                <?php
                            }
                            $content_post = get_post($mashup_shop_id);
                            if (is_object($content_post)) {
                                $content = $content_post->post_content;
                                if (trim($content) <> '') {
                                    echo '<div class="cs-shop-wrap"><div class="cs-rich-editor">';
                                    $content = apply_filters('the_content', $content);
                                    $content = str_replace(']]>', ']]&gt;', $content);
                                    echo do_shortcode($content);
                                    echo '</div></div>';
                                }
                            }
                            if ($pageSidebar != true) {
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                if ($pageSidebar != true) {
                    ?>
                    <div class="page-section">
                        <div class="container">
                            <?php
                        }
                        get_template_part('woocommerce/products-loop', 'page');
                        if ($pageSidebar != true) {
                            ?>
                        </div>
                    </div>
                    <?php
                }
            }

            if (isset($mashup_xmlObject->column_container)) {
                $mashup_elem_id = 0;
            }
            foreach ($mashup_xmlObject->column_container as $column_container) {
                $mashup_section_bg_image = $mashup_var_section_title = $mashup_var_section_subtitle = $mashup_section_bg_image_position = $mashup_section_bg_image_repeat = $mashup_section_bg_color = $mashup_section_padding_top = $mashup_section_padding_bottom = $mashup_section_custom_style = $mashup_section_css_id = $mashup_layout = $mashup_sidebar_left = $mashup_sidebar_right = $css_bg_image = '';
                $section_style_elements = '';
                $section_container_style_elements = '';
                $section_video_element = '';
                $mashup_section_bg_color = '';
                $mashup_section_view = 'container';
                if (isset($column_container)) {

                    $column_attributes = $column_container->attributes();
                    $column_class = $column_attributes->class;
                    $parallax_class = '';
                    $parallax_data_type = '';
                    $mashup_section_parallax = $column_attributes->mashup_section_parallax;
                    if (isset($mashup_section_parallax) && (string) $mashup_section_parallax == 'yes') {

                        $parallax_class = ($mashup_section_parallax == 'yes') ? 'parallex-bg' : '';
                        $parallax_data_type = ' data-type="background"';
                    }
                    $mashup_var_section_title = $column_attributes->mashup_var_section_title;
                    $mashup_var_section_subtitle = $column_attributes->mashup_var_section_subtitle;
                    $mashup_section_margin_top = $column_attributes->mashup_section_margin_top;
                    $mashup_section_margin_bottom = $column_attributes->mashup_section_margin_bottom;
                    $mashup_section_padding_top = $column_attributes->mashup_section_padding_top;
                    $mashup_section_padding_bottom = $column_attributes->mashup_section_padding_bottom;
                    $mashup_section_view = $column_attributes->mashup_section_view;
                    $mashup_section_border_color = $column_attributes->mashup_section_border_color;
                    if (isset($mashup_section_border_color) && $mashup_section_border_color != '') {
                        $section_style_elements .= '';
                    }
                    if (isset($mashup_section_margin_top) && $mashup_section_margin_top != '') {
                        $section_style_elements .= 'margin-top: ' . $mashup_section_margin_top . 'px;';
                    }
                    if (isset($mashup_section_padding_top) && $mashup_section_padding_top != '') {
                        $section_style_elements .= 'padding-top: ' . $mashup_section_padding_top . 'px;';
                    }
                    if (isset($mashup_section_padding_bottom) && $mashup_section_padding_bottom != '') {
                        $section_style_elements .= 'padding-bottom: ' . $mashup_section_padding_bottom . 'px;';
                    }
                    if (isset($mashup_section_margin_bottom) && $mashup_section_margin_bottom != '') {
                        $section_style_elements .= 'margin-bottom: ' . $mashup_section_margin_bottom . 'px;';
                    }
                    $mashup_section_border_top = $column_attributes->mashup_section_border_top;
                    $mashup_section_border_bottom = $column_attributes->mashup_section_border_bottom;
                    if (isset($mashup_section_border_top) && $mashup_section_border_top != '') {
                        $section_style_elements .= 'border-top: ' . $mashup_section_border_top . 'px ' . $mashup_section_border_color . ' solid;';
                    }
                    if (isset($mashup_section_border_bottom) && $mashup_section_border_bottom != '') {
                        $section_style_elements .= 'border-bottom: ' . $mashup_section_border_bottom . 'px ' . $mashup_section_border_color . ' solid;';
                    }
                    $mashup_section_background_option = $column_attributes->mashup_section_background_option;
                    $mashup_section_bg_image_position = $column_attributes->mashup_section_bg_image_position;
                    if (isset($column_attributes->mashup_section_bg_color))
                        $mashup_section_bg_color = $column_attributes->mashup_section_bg_color;
                    if (isset($mashup_section_background_option) && $mashup_section_background_option == 'section-custom-background-image') {
                        $mashup_section_bg_image = $column_attributes->mashup_section_bg_image;
                        $mashup_section_bg_image_position = $column_attributes->mashup_section_bg_image_position;
                        $mashup_section_bg_imageg = '';
                        if (isset($mashup_section_bg_image) && $mashup_section_bg_image != '') {
                            if (isset($mashup_section_parallax) && (string) $mashup_section_parallax == 'yes') {
                                $mashup_section_bg_imageg = 'url(' . $mashup_section_bg_image . ') ' . $mashup_section_bg_image_position . ' ' . ' fixed';
                            } else {
                                $mashup_section_bg_imageg = 'url(' . $mashup_section_bg_image . ') ' . $mashup_section_bg_image_position . ' ';
                            }
                        }
                        $section_style_elements .= 'background: ' . $mashup_section_bg_imageg . ' ' . $mashup_section_bg_color . ';';
                    } else if (isset($mashup_section_background_option) && $mashup_section_background_option == 'section_background_video') {
                        $mashup_section_video_url = $column_attributes->mashup_section_video_url;
                        $mashup_section_video_mute = $column_attributes->mashup_section_video_mute;
                        $mashup_section_video_autoplay = $column_attributes->mashup_section_video_autoplay;
                        $mute_flag = $mute_control = '';
                        $mute_flag = 'true';
                        if ($mashup_section_video_mute == 'yes') {
                            $mute_flag = 'false';
                            $mute_control = 'controls muted ';
                        }
                        $mashup_video_autoplay = 'autoplay';
                        if ($mashup_section_video_autoplay == 'yes') {
                            $mashup_video_autoplay = 'autoplay';
                        } else {
                            $mashup_video_autoplay = '';
                        }
                        $section_video_class = 'video-parallex';
                        $url = parse_url($mashup_section_video_url);
                        if ($url['host'] == $_SERVER["SERVER_NAME"]) {
                            $file_type = wp_check_filetype($mashup_section_video_url);
                            if (isset($file_type['type']) && $file_type['type'] <> '') {
                                $file_type = $file_type['type'];
                            } else {
                                $file_type = 'video/mp4';
                            }
                            $rand_player_id = rand(6, 555);
                            $section_video_element = '<div class="page-section-video cs-section-video">
                                        <video id="player' . $rand_player_id . '" width="100%" height="100%" ' . $mashup_video_autoplay . ' loop="true" preload="none" volume="false" controls="controls" class="nectar-video-bg   cs-video-element"  ' . $mute_control . ' >
                                            <source src="' . esc_url($mashup_section_video_url) . '" type="' . $file_type . '">
                                        </video>
                                    </div>';
                        } else {
                            $section_video_element = wp_oembed_get($mashup_section_video_url, array('height' => '1083'));
                        }
                    } else {
                        if (isset($mashup_section_bg_color) && $mashup_section_bg_color != '') {
                            $section_style_elements .= 'background: ' . esc_attr($mashup_section_bg_color) . ';';
                        }
                    }
                    $mashup_section_padding_top = $column_attributes->mashup_section_padding_top;
                    $mashup_section_padding_bottom = $column_attributes->mashup_section_padding_bottom;
                    if (isset($mashup_section_padding_top) && $mashup_section_padding_top != '') {
                        $section_container_style_elements .= 'padding-top: ' . $mashup_section_padding_top . 'px; ';
                    }
                    if (isset($mashup_section_padding_bottom) && $mashup_section_padding_bottom != '') {
                        $section_container_style_elements .= 'padding-bottom: ' . $mashup_section_padding_bottom . 'px; ';
                    }
                    $mashup_section_custom_style = $column_attributes->mashup_section_custom_style;
                    $mashup_section_css_id = $column_attributes->mashup_section_css_id;
                    if (isset($mashup_section_css_id) && trim($mashup_section_css_id) != '') {
                        $mashup_section_css_id = 'id="' . $mashup_section_css_id . '"';
                    }

                    $page_element_size = 'section-fullwidth';
                    $mashup_layout = $column_attributes->mashup_layout;
                    if (!isset($mashup_layout) || $mashup_layout == '' || $mashup_layout == 'none') {
                        $mashup_layout = "none";
                        $page_element_size = 'section-fullwidth col-lg-12 col-md-12 col-sm-12 col-xs-12';
                    } else {
                        $page_element_size = 'section-content col-lg-9 col-md-9 col-sm-12 col-xs-12 ';
                    }
                    $mashup_sidebar_left = $column_attributes->mashup_sidebar_left;
                    $mashup_sidebar_right = $column_attributes->mashup_sidebar_right;
                }
                if (isset($mashup_section_bg_image) && $mashup_section_bg_image <> '' && $mashup_section_background_option == 'section-custom-background-image') {
                    $css_bg_image = 'url(' . $mashup_section_bg_image . ')';
                }

                $section_style_element = '';
                if ($section_style_elements) {
                    $section_style_element = 'style="' . $section_style_elements . '"';
                }
                if ($section_container_style_elements) {
                    $section_container_style_elements = 'style="' . $section_container_style_elements . '"';
                }
                ?>
                <!-- Page Section -->
                <div <?php echo mashup_allow_special_char($mashup_section_css_id); ?> class="page-section <?php echo sanitize_html_class($parallax_class); ?>" <?php echo mashup_allow_special_char($parallax_data_type); ?>  <?php echo mashup_allow_special_char($section_style_element); ?> >
                    <?php
                    echo mashup_allow_special_char($section_video_element);
                    if (isset($mashup_section_background_option) && $mashup_section_background_option == 'section-custom-slider') {
                        $mashup_section_custom_slider = $column_attributes->mashup_section_custom_slider;
                        if ($mashup_section_custom_slider != '') {
                            echo do_shortcode($mashup_section_custom_slider);
                        }
                    }
                    if ($mashup_page_layout == '' || $mashup_page_layout == 'none') {
                        if ($mashup_section_view == 'container') {
                            $mashup_section_view = 'container';
                        } else {
                            $mashup_section_view = 'wide';
                        }
                    } else {
                        $mashup_section_view = '';
                    }
                    ?>
                    <!-- Container Start -->
                    <div class="<?php echo sanitize_html_class($mashup_section_view); ?> "> 
                        <?php
                        if (isset($mashup_layout) && ( $mashup_layout != '' || $mashup_layout != 'none' )) {
                            ?>
                            <div class="row">
                                <?php
                            }
                            // start page section
                            if ($mashup_var_section_title != '' || $mashup_var_section_subtitle != '') {
                                ?>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-section-title" style="margin-bottom:27px;">
                                        <?php if ($mashup_var_section_title != '') { ?>
                                            <h2 style="font-size:24px !important; letter-spacing:1px !important; text-align:center; margin-bottom:20px;"><?php echo esc_html($mashup_var_section_title) ?></h2>
                                        <?php } if ($mashup_var_section_subtitle != '') { ?>
                                            <span><?php echo esc_html($mashup_var_section_subtitle) ?></span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php
                            }// end page section
                            if (isset($mashup_layout) && $mashup_layout == "left" && $mashup_sidebar_left <> '') {
                                echo '<aside class="section-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">';
                                if (is_active_sidebar(mashup_get_sidebar_id($mashup_sidebar_left))) {
                                    if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($mashup_sidebar_left)) : endif;
                                }
                                echo '</aside>';
                            }
                            $mashup_node_id = 0;
                            echo '<div class="' . ($page_element_size) . ' ">';
                            echo '<div class="row">';

                            foreach ($column_container->children() as $column) {
                                $column_no ++;
                                $mashup_node_id ++;
                                foreach ($column->children() as $mashup_node) {

                                    $mashup_elem_id ++;
                                    $page_element_size = '100';
                                    if (isset($mashup_node->page_element_size))
                                        $page_element_size = $mashup_node->page_element_size;
                                    echo '<div class="' . mashup_var_page_builder_element_sizes($page_element_size) . '">';
                                    $shortcode = trim((string) $mashup_node->mashup_shortcode);
                                    $shortcode = html_entity_decode($shortcode);
                                    echo do_shortcode($shortcode);
                                    echo '</div>';
                                }
                            }
                            echo '</div></div>';
                            if (isset($mashup_layout) && $mashup_layout == "right" && $mashup_sidebar_right <> '') {
                                echo '<aside class="section-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">';
                                if (is_active_sidebar(mashup_get_sidebar_id($mashup_sidebar_right))) {
                                    if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($mashup_sidebar_right)) : endif;
                                }
                                echo '</aside>';
                            }
                            if (isset($mashup_layout) && ( $mashup_layout != '' || $mashup_layout != 'none' )) {
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
                $column_no = 0;
            }
            if (isset($mashup_page_layout) && $mashup_sidebarLayout <> '' && $mashup_sidebarLayout <> "none") {
                echo '</div>';
                if (isset($mashup_page_layout) && $mashup_sidebarLayout <> '' and $mashup_sidebarLayout <> "none" and $mashup_sidebarLayout == 'right') :
                    if (is_active_sidebar(mashup_get_sidebar_id($mashup_page_sidebar_right))) {
                        ?>
                        <aside class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($mashup_page_sidebar_right)) : endif; ?>
                        </aside>
                        <?php
                    }
                endif;
                echo '</div>';
                echo '</div>';
            }
        } else {
            ?>
            <div class="container">        
                <!-- Row Start -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php get_template_part('woocommerce/products-loop', 'page'); ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}
get_footer();
