<?php
/**
 * The template for displaying all pages
 */
get_header();
global $post;
$var_arrays = array('post', 'mashup_node', 'mashup_sidebarLayout', 'column_class', 'mashup_xmlObject', 'mashup_node_id', 'column_attributes', 'mashup_paged_id', 'mashup_elem_id');
$page_global_vars = MASHUP_VAR_GLOBALS()->globalizing($var_arrays);
extract($page_global_vars);
$mashup_post_id = isset($post->ID) ? $post->ID : '';
if (isset($mashup_post_id) and $mashup_post_id <> '') {
    $mashup_postObject = get_post_meta($post->ID, 'mashup_full_data', true);
} else {
    $mashup_post_id = '';
}
?>
<!-- Main Content Section -->
<div class="main-section">
    <?php
    $mashup_page_sidebar_right = '';
    $mashup_page_sidebar_left = '';
    $mashup_postObject = get_post_meta($post->ID, 'mashup_var_full_data', true);
    $mashup_page_layout = get_post_meta($post->ID, 'mashup_var_page_layout', true);
    $mashup_page_sidebar_right = get_post_meta($post->ID, 'mashup_var_page_sidebar_right', true);
    $mashup_page_sidebar_left = get_post_meta($post->ID, 'mashup_var_page_sidebar_left', true);
    $mashup_page_bulider = get_post_meta($post->ID, "mashup_page_builder", true);
    $section_container_width = '';
    $page_element_size = 'page-content-fullwidth';

    if (!isset($mashup_page_layout) || $mashup_page_layout == "none") {
        $page_element_size = 'page-content-fullwidth';
    } else {
        $page_element_size = 'page-content col-lg-8 col-md-8 col-sm-12 col-xs-12';
    }
    $mashup_xmlObject =  array();

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

    if (!empty($mashup_xmlObject[0])) {
        $count = count($mashup_xmlObject) > 1;
    } else {
        $count = '';
    }
    if (isset($mashup_xmlObject) && !empty($mashup_xmlObject) && $count) {
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
                    <aside class="page-sidebar left col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($mashup_page_sidebar_left)) : endif; ?>
                    </aside>
                    <?php
                }
            endif;
            echo '<div class="' . ($page_element_size) . '">';
        }
        if (post_password_required()) {
            echo '<header class="heading"><h6 class="transform">' . get_the_title() . '</h6></header>';
            echo mashup_password_form();
        } else {
            $width = 840;
            $height = 328;
            $image_url = mashup_get_post_img_src($post->ID, $width, $height);
            wp_reset_postdata();
            if (get_the_content() != '' || $image_url != '') {
                if ($pageSidebar != true) {
                    ?>
                    <div class="page-section ">
                        <!-- Container Start -->
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                                echo '<div class="cs-rich-editor">';
                                the_content();
                                wp_link_pages(array('before' => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'mashup') . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>'));
                                echo '</div>';
                                if ($pageSidebar != true) {
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
        }
        $mashup_page_inline_style = '';
        if (isset($mashup_xmlObject->column_container)) {
            $mashup_elem_id = 0;
        }
        foreach ($mashup_xmlObject->column_container as $column_container) {
            $mashup_section_bg_image = $mashup_var_section_title = $mashup_var_section_subtitle = $title_sub_title_alignment = $mashup_section_bg_image_position = $mashup_section_bg_image_repeat = $mashup_section_bg_color = $mashup_section_padding_top = $mashup_section_padding_bottom = $mashup_section_custom_style = $mashup_section_css_id = $mashup_layout = $mashup_sidebar_left = $mashup_sidebar_right = $css_bg_image = '';
            $section_style_elements = '';
            $section_container_style_elements = '';
            $section_video_element = '';
            $mashup_section_bg_color = '';
            $mashup_section_view = 'container';
            $mashup_section_rand_id = rand(123456, 987654);
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
                $title_sub_title_alignment = $column_attributes->title_sub_title_alignment;
                $mashup_var_section_style = $column_attributes->mashup_var_section_style;
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
                            $mashup_paralax_str = false !== strpos($mashup_section_bg_image_position, 'fixed') ? '' : ' fixed';
                            $mashup_section_bg_imageg = 'url(' . $mashup_section_bg_image . ') ' . $mashup_section_bg_image_position . ' ' . $mashup_paralax_str;
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
                                    <video id="player' . mashup_allow_special_char($rand_player_id) . '" width="100%" height="100%" ' . mashup_allow_special_char($mashup_video_autoplay) . ' loop="true" preload="none" volume="false" controls="controls" class="nectar-video-bg   cs-video-element"  ' . mashup_allow_special_char($mute_control) . ' >
                                        <source src="' . esc_url($mashup_section_video_url) . '" type="' . mashup_allow_special_char($file_type) . '">
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
                    $page_element_size = 'section-content col-lg-8 col-md-8 col-sm-12 col-xs-12 ';
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
                $mashup_page_inline_style .= ".cs-page-sec-{$mashup_section_rand_id}{{$section_style_elements}}";
            }
            if ($section_container_style_elements) {
                $section_container_style_elements = 'style="' . $section_container_style_elements . '"';
            }
            ?>
            <!-- Page Section -->
            <?php
            $mashup_section_nopadding = $column_attributes->mashup_section_nopadding;
            $mashup_section_nomargin = $column_attributes->mashup_section_nomargin;
            $paddingClass = ($mashup_section_nopadding == 'yes') ? 'nopadding' : '';
            $marginClass = ($mashup_section_nomargin == 'yes') ? 'cs-nomargin' : '';
            ?>
            <div <?php echo mashup_allow_special_char($mashup_section_css_id); ?> class="page-section cs-page-sec-<?php echo absint($mashup_section_rand_id) ?> <?php echo sanitize_html_class($parallax_class); ?> <?php echo sanitize_html_class($paddingClass); ?> <?php echo sanitize_html_class($marginClass); ?>" <?php echo mashup_allow_special_char($parallax_data_type); ?>  <?php //echo mashup_allow_special_char($section_style_element);                       ?> >
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
                        $section_title_style = '';
                        if ($mashup_var_section_style == 'fancy') {
                            $section_title_style = 'fancy';
                        } elseif ($mashup_var_section_style == 'modern') {
                            $section_title_style = 'modern';
                        } else {
                            $section_title_style = '';
                        }
                        if ($mashup_var_section_title != '' || $mashup_var_section_subtitle != '') {
                            $title_align = '';
                            if ($title_sub_title_alignment <> '') {
                                $title_align = ' style="text-align:' . $title_sub_title_alignment . '!important;"';
                            }
                            ?>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="section-title <?php echo esc_html($section_title_style); ?> " <?php echo force_balance_tags($title_align); ?>>
                                    <?php if ($mashup_var_section_title != '') { ?>
                                        <h2><?php echo esc_html($mashup_var_section_title) ?></h2>
                                    <?php } if ($mashup_var_section_subtitle != '') { ?>
                                        <span><?php echo esc_html($mashup_var_section_subtitle) ?></span>
                                    <?php } ?>
                                    <em></em>
                                </div>
                            </div>
                            <?php
                        } // end page section
                        if (isset($mashup_layout) && $mashup_layout == "left" && $mashup_sidebar_left <> '') {
                            echo '<aside class="section-sidebar left col-lg-4 col-md-4 col-sm-12 col-xs-12">';
                            if (is_active_sidebar(mashup_get_sidebar_id($mashup_sidebar_left))) {
                                if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($mashup_sidebar_left)) : endif;
                            }
                            echo '</aside>';
                        }
                        $mashup_node_id = 0;
                        echo '<div class="' . ($page_element_size) . '">';
                        echo '<div class="row">';
                        foreach ($column_container->children() as $column) {
                            $column_no ++;
                            $mashup_node_id ++;
                            foreach ($column->children() as $mashup_node) {
                                $mashup_elem_id ++;
                                $page_element_size = '100';
                                if (isset($mashup_node->page_element_size))
                                    $page_element_size = $mashup_node->page_element_size;
                                if (function_exists('mashup_var_page_builder_element_sizes')) {
                                    echo '<div class="' . mashup_var_page_builder_element_sizes($page_element_size) . ' ">';
                                }
                                $shortcode = trim((string) $mashup_node->mashup_shortcode);
                                $shortcode = html_entity_decode($shortcode);
                                echo do_shortcode($shortcode);
                                if (function_exists('mashup_var_page_builder_element_sizes')) {
                                    echo '</div>';
                                }
                            }
                        }
                        echo '</div><!-- end section row -->';
                        echo '</div>';
                        if (isset($mashup_layout) && $mashup_layout == "right" && $mashup_sidebar_right <> '') {
                            echo '<aside class="section-sidebar right col-lg-4 col-md-4 col-sm-12 col-xs-12">';
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
                </div>  <!-- End Container Start -->
            </div> <!-- End Page Section -->
            <?php
            $column_no = 0;
        }
        if (isset($mashup_page_layout) && $mashup_sidebarLayout <> '' and $mashup_sidebarLayout <> "none") {
            echo '</div>';
        }
        if (isset($mashup_page_layout) && $mashup_sidebarLayout <> '' && $mashup_sidebarLayout <> "none" && $mashup_sidebarLayout == 'right') :
            if (is_active_sidebar(mashup_get_sidebar_id($mashup_page_sidebar_right))) {
                ?>
                <aside class="page-sidebar right col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($mashup_page_sidebar_right)) : endif; ?>
                </aside>
                <?php
            }
        endif;
        if (isset($mashup_page_layout) && $mashup_sidebarLayout <> '' and $mashup_sidebarLayout <> "none") {
            echo '</div>';
            echo '</div>';
        }
        if ($mashup_page_inline_style != '') {
            mashup_var_dynamic_scripts('mashup_page_style', 'css', $mashup_page_inline_style);
        }
    } else {
        $col_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
        if (is_active_sidebar('sidebar-1')) {
            $col_class = 'col-lg-8 col-md-8 col-sm-12 col-xs-12';
        }
        ?>
        <div class="container">        
            <!-- Row Start -->
            <div class="row">
                <div class="<?php echo esc_html($col_class) ?>">
                    <?php
                    while (have_posts()) : the_post();
                        echo '<div class="cs-rich-editor">';
                        the_content();
                        echo '</div>';
                    endwhile;
                    if (comments_open()) :
                        comments_template('', true);
                    endif;
                    ?>
                </div>
                <?php
                if (is_active_sidebar('sidebar-1')) {
                    echo '<div class="page-sidebar col-lg-4 col-md-4 col-sm-12 col-xs-12">';
                    if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-1')) : endif;
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        <?php
    }
    ?>
</div><!-- End Main Content Section -->
<?php
get_footer();
