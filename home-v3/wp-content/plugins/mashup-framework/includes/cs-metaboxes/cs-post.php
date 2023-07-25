<?php
/**
 * @ Start function for Add Meta Box For Post
 * @return
 */
add_action( 'add_meta_boxes', 'mashup_meta_post_add' );
if ( ! function_exists( 'mashup_meta_post_add' ) ) {

    function mashup_meta_post_add() {
        global $mashup_var_frame_static_text;
        add_meta_box( 'mashup_meta_post', mashup_var_frame_text_srt( 'mashup_var_post_options' ), 'mashup_meta_post', 'post', 'normal', 'high' );
    }

}

/**
 * @ Start function for Meta Box For Post  
 * @return
 */
if ( ! function_exists( 'mashup_meta_post' ) ) {

    function mashup_meta_post( $post ) {
        global $mashup_var_frame_static_text;
        ?>
        <div class="page-wrap page-opts left" style="overflow:hidden; position:relative;">
            <div class="option-sec" style="margin-bottom:0;">
                <div class="opt-conts">
                    <div class="elementhidden">
                        <nav class="admin-navigtion">
                            <ul id="cs-options-tab">
                                <li><a name="#tab-general-settings" href="javascript:;"><i class="icon-settings"></i><?php echo mashup_var_frame_text_srt( 'mashup_var_general_setting' ); ?> </a></li>
                                <li><a name="#tab-slideshow" href="javascript:;"><i class="icon-forward2"></i> <?php echo mashup_var_frame_text_srt( 'mashup_var_subheader' ); ?></a></li>
                                <!--<li><a name="#tab-post-options" href="javascript:;"><i class="icon-list-alt"></i><?php //echo mashup_var_frame_text_srt( 'mashup_var_post_settings' );  ?>  </a></li>-->
                                <li><a name="#tab-post-gallery" href="javascript:;"><i class="icon-list-alt"></i><?php echo mashup_var_frame_text_srt( 'mashup_var_post_gallery' ); ?>  </a></li>
                                <?php do_action( 'post_options_metabox_tabs' ); ?>
                            </ul> 
                        </nav>
                        <div id="tabbed-content">
                            <div id="tab-general-settings">
                                <?php
                                mashup_post_settings_element();
                                mashup_sidebar_layout_options();
                                ?>
                            </div>
                            <div id="tab-slideshow">
                                <?php mashup_subheader_element(); ?>
                            </div>
                            <div id="tab-post-options">
                                <?php
                                if ( function_exists( 'mashup_var_post_options' ) ) {
                                    mashup_var_post_options();
                                }
                                ?>
                            </div>
                            <div id="tab-post-gallery">
                                <?php
                                if ( function_exists( 'mashup_var_post_gallery' ) ) {
                                    mashup_var_post_gallery();
                                }
                                ?>
                            </div>

                            <?php do_action( 'post_options_metabox_tabs_content_container', $post ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <?php
    }

}



/**
 * @page/post General Settings Function
 * @return
 *
 */
if ( ! function_exists( 'mashup_post_settings_element' ) ) {

    function mashup_post_settings_element() {
        global $post, $mashup_var_form_fields, $mashup_var_html_fields, $mashup_var_frame_static_text, $mashup_var_options;
        ?>
        <script>
            function post_format_view(val) {
                if (val == 'format-video') {
                    jQuery('#post_format_video_url').show();
                    jQuery('#sound_embedded_code').hide();
                } else if (val == 'format-sound') {
                    jQuery('#post_format_video_url').hide();
                    jQuery('#sound_embedded_code').show();
                } else {
                    jQuery('#post_format_video_url').hide();
                    jQuery('#sound_embedded_code').hide();
                }
            }
         
        </script>
        <?php
        $mashup_var_opt_array = array(
            'name' => mashup_var_frame_text_srt( 'mashup_var_social_sharing' ),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'post_social_sharing',
                'return' => true,
            ),
        );

        $mashup_var_html_fields->mashup_var_checkbox_field( $mashup_var_opt_array );

//        $mashup_var_opt_array = array(
//            'name' => mashup_var_frame_text_srt( 'mashup_var_about_author' ),
//            'desc' => '',
//            'hint_text' => '',
//            'echo' => true,
//            'field_params' => array(
//                'std' => '',
//                'id' => 'post_about_author_show',
//                'return' => true,
//            ),
//        );
//
//        $mashup_var_html_fields->mashup_var_checkbox_field( $mashup_var_opt_array );

//        $mashup_var_opt_array = array(
//            'name' => mashup_var_frame_text_srt( 'mashup_var_tag' ),
//            'desc' => '',
//            'hint_text' => '',
//            'echo' => true,
//            'field_params' => array(
//                'std' => '',
//                'id' => 'post_tags_show',
//                'return' => true,
//            ),
//        );
//
//        $mashup_var_html_fields->mashup_var_checkbox_field( $mashup_var_opt_array );

//        $mashup_var_opt_array = array(
//            'name' => mashup_var_frame_text_srt( 'mashup_var_related_posts' ),
//            'desc' => '',
//            'hint_text' => '',
//            'echo' => true,
//            'field_params' => array(
//                'std' => '',
//                'id' => 'related_post',
//                'return' => true,
//            ),
//        );
//
//        $mashup_var_html_fields->mashup_var_checkbox_field( $mashup_var_opt_array );

//        $mashup_var_opt_array = array(
//            'name' => mashup_var_frame_text_srt( 'mashup_var_feature_image' ),
//            'desc' => '',
//            'hint_text' => '',
//            'echo' => true,
//            'field_params' => array(
//                'std' => '',
//                'id' => 'feature_image',
//                'return' => true,
//            ),
//        );
//
//        $mashup_var_html_fields->mashup_var_checkbox_field( $mashup_var_opt_array );

        $gewnews_combine_array = '';
        $gewnews_banner_title_array = isset( $mashup_var_options['mashup_var_banner_title'] ) ? $mashup_var_options['mashup_var_banner_title'] : '';
        $mashup_var_banner_field_code_no = isset( $mashup_var_options['mashup_var_banner_field_code_no'] ) ? $mashup_var_options['mashup_var_banner_field_code_no'] : '';
        if ( $gewnews_banner_title_array != '' && $mashup_var_banner_field_code_no != '' ):
            $gewnews_combine_array = array_combine( $mashup_var_banner_field_code_no, $gewnews_banner_title_array );
        endif;
//        $mashup_opt_array = array(
//            'name' => mashup_var_frame_text_srt( 'mashup_var_article_ads' ),
//            'desc' => '',
//            'hint_text' => '',
//            'echo' => true,
//            'field_params' => array(
//                'std' => '',
//                'id' => 'article_banner',
//                'extra_atr' => "",
//                'classes' => 'chosen-select-no-single',
//                'options' => $gewnews_combine_array,
//                'return' => true,
//            ),
//        );
//
//        $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );


//        $imageurl = get_template_directory_uri() . '/assets/backend/images/views/post/';
//        $mashup_opt_array = array(
//            'name' => mashup_var_frame_text_srt( 'mashup_var_post_view' ),
//            'desc' => '',
//            'hint_text' => '',
//            'echo' => true,
//            'field_params' => array(
//                'std' => '',
//                'id' => 'post_style',
//                'extra_atr' => " onchange=mashup_change_preview_image(this.value,'post-style-prev-image','" . esc_url( $imageurl ) . "');check_view_ad_unit(this.value);",
//                'classes' => 'chosen-select-no-single',
//                'options' => array( '' => mashup_var_frame_text_srt( 'mashup_var_post_view_default' ), 'view-1' => mashup_var_frame_text_srt( 'mashup_var_post_view_1' ), 'view-2' => mashup_var_frame_text_srt( 'mashup_var_post_view_2' ), 'view-3' => mashup_var_frame_text_srt( 'mashup_var_post_view_3' ), 'view-4' => mashup_var_frame_text_srt( 'mashup_var_post_view_4' ) ),
//                'return' => true,
//            ),
//        );
//
//        $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
//        $post_style = get_post_meta( $post->ID, 'mashup_var_post_style', true );
//        $display = ( '' !== $post_style ) ? 'block' : 'none';
//        $post_style = ( 'none' === $display ) ? 'view-1' : $post_style;
        ?>
<!--        <div id="post-style-prev-image" class="form-elements" style="display:<?php echo $display; ?>;">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right for-img">
                <div class="img-holder">
                    <figure>
                        <a href="<?php echo esc_url( $imageurl . $post_style ); ?>.jpg" class="thumbnail" title="<?php echo $post_style; ?>"><img src="<?php echo esc_url( $imageurl . $post_style ); ?>.jpg" alt="<?php echo $post_style; ?>"/></a>
                    </figure>
                </div>
            </div>
        </div>-->

        <?php
//        $post_cover_image_display = 'none';
//        $post_style_ad_display = 'none';
//        if ( $post_style == 'view-2' ) {
//            $post_cover_image_display = 'block';
//            $post_style_ad_display = 'block';
//        } else if ( $post_style == 'view-4' ) {
//            $post_cover_image_display = 'block';
//            $post_style_ad_display = 'none';
//        } else {
//            $post_cover_image_display = 'none';
//            $post_style_ad_display = 'none';
//        }
        ?>
        <!--<div id="post_cover_image" style="display:<?php echo esc_html( $post_cover_image_display ); ?>">-->
        <?php
//        $mashup_opt_array = array(
//            'name' => mashup_var_frame_text_srt( 'mashup_var_cover_image' ),
//            'id' => 'post_cover_image',
//            'main_id' => '',
//            'std' => '',
//            'desc' => '',
//            'hint_text' => '',
//            'prefix' => '',
//            'echo' => true,
//            'field_params' => array(
//                'std' => '',
//                'id' => 'post_cover_image',
//                'prefix' => '',
//                'return' => true,
//            ),
//        );
//
//        $mashup_var_html_fields->mashup_var_upload_file_field( $mashup_opt_array );
        ?>
<!--        </div>-->

        <!--<div id="post_style_ad_unit" style="display:<?php echo esc_html( $post_style_ad_display ); ?>">-->
        <?php
//        $ad_units = $mashup_var_options['mashup_var_banner_field_code_no'];
//        $options_array = array();
//        $options_array[''] = mashup_var_frame_text_srt( 'mashup_var_post_select_ad' );
//        if ( isset( $ad_units ) && count( $ad_units ) > 0 ) {
//            foreach ( $ad_units as $key => $unit ) {
//                $options_array["[mashup_ads id='$unit']"] = $mashup_var_options['mashup_var_banner_title'][$key];
//            }
//        }
//
//        $mashup_opt_array = array(
//            'name' => mashup_var_frame_text_srt( 'mashup_var_post_ad_unit' ),
//            'desc' => '',
//            'hint_text' => '',
//            'echo' => true,
//            'field_params' => array(
//                'std' => '',
//                'id' => 'post_ad_unit',
//                'extra_atr' => "",
//                'classes' => 'chosen-select-no-single',
//                'options' => $options_array,
//                'return' => true,
//            ),
//        );
//
//        $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
        ?>
        <!--</div>-->
            <?php
            $imageurl = get_template_directory_uri() . '/assets/backend/images/views/post-formats/';
            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_post_format' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'post_format',
                    'extra_atr' => " onchange=mashup_change_preview_image(this.value,'post-format-prev-image','" . $imageurl . "');post_format_view(this.value)",
                    //'extra_atr' => " onchange=post_format_view(this.value)",
                    'classes' => 'chosen-select-no-single',
                    'options' => array( '' => mashup_var_frame_text_srt( 'mashup_var_post_view_select_format' ), 'format-masonary' => mashup_var_frame_text_srt( 'mashup_var_post_format_masonary' ), 'format-medium' => mashup_var_frame_text_srt( 'mashup_var_post_format_medium' ), 'format-large' => mashup_var_frame_text_srt( 'mashup_var_post_format_large' ), 'format-small' => mashup_var_frame_text_srt( 'mashup_var_post_format_small' ), 'format-sound' => mashup_var_frame_text_srt( 'mashup_var_post_format_sound' ), 'format-video' => mashup_var_frame_text_srt( 'mashup_var_post_format_video' ) ),
                    'return' => true,
                ),
            );

            $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
            $post_format = get_post_meta( $post->ID, 'mashup_var_post_format', true );
            $display = ( '' !== $post_format ) ? 'block' : 'none';
            $post_format = ( 'none' === $display ) ? 'format-masonary' : $post_format;
            ?>
        <div id="post-format-prev-image" class="form-elements" style="display:<?php echo $display; ?>;">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right for-img">
                <div class="img-holder">
                    <figure>
                        <a href="<?php echo esc_url( $imageurl . $post_format ); ?>.jpg" class="thumbnail" title="<?php echo $post_format; ?>"><img src="<?php echo esc_url( $imageurl . $post_format ); ?>.jpg" alt="<?php echo $post_format; ?>"/></a>
                    </figure>
                </div>
            </div>
        </div>

        <?php
        $post_format_display = 'none';
        $mashup_var_post_format = get_post_meta( $post->ID, 'mashup_var_post_format', true );
        if ( isset( $mashup_var_post_format ) && $mashup_var_post_format == 'format-video' ) {
            $post_format_display = 'block';
        }
        ?>
        <div id="post_format_video_url" style="display:<?php echo esc_html( $post_format_display ); ?>">
        <?php
        $mashup_opt_array = array(
            'name' => mashup_var_frame_text_srt( 'mashup_var_youtube_vimeo_video_url' ),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                //'usermeta' => true,
                'std' => '',
                'classes' => '',
                'id' => 'format_video_url',
                'return' => true,
            ),
        );

        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
        ?>
        </div>

        <?php
        $post_format_sound_display = 'none';
        if ( isset( $mashup_var_post_format ) && $mashup_var_post_format == 'format-sound' ) {
            $post_format_sound_display = 'block';
        }
        ?>
        <div id="sound_embedded_code" style="display:<?php echo esc_html( $post_format_sound_display ); ?>">
        <?php
        $mashup_opt_array = array(
            'name' => mashup_var_frame_text_srt( 'mashup_var_soundcloud_url' ),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                //'usermeta' => true,
                'std' => '',
                'classes' => '',
                'id' => 'soundcloud_url',
                'return' => true,
            ),
        );

        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
        ?>
        </div>
            <?php
        }

    }

    /**
     * @page/post Gallery Function
     * @return
     *
     */
    if ( ! function_exists( 'mashup_var_post_gallery' ) ) {

        function mashup_var_post_gallery() {
            global $post, $mashup_var_form_fields, $mashup_var_html_fields, $mashup_var_frame_static_text;
            echo '<div id="post_detail_gallery">';
            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_add_gallery_images' ),
                'id' => 'post_detail_page_gallery',
                'classes' => '',
                'std' => '',
            );

            $mashup_var_html_fields->mashup_var_gallery_render( $mashup_opt_array );
            echo '</div>';
        }

    }
