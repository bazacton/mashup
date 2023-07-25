<?php
/**
 * The template for displaying single Album
 */
get_header();

$var_arrays = array( 'mashup_var_static_text' );
$mashup_global_vars = MASHUP_VAR_GLOBALS()->globalizing( $var_arrays );
extract( $mashup_global_vars );
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        $post_id = get_the_ID();
        $event_from_date = get_post_meta( $post_id, 'mashup_var_event_from_date', true );
        $event_to_date = get_post_meta( $post_id, 'mashup_var_event_to_date', true );
        $event_location = get_post_meta( $post_id, 'mashup_var_event_location', true );
        $ticket_title = get_post_meta( $post_id, 'mashup_var_ticket_title', true );
        $buy_url = get_post_meta( $post_id, 'mashup_var_buy_url', true );
        $ticket_price = get_post_meta( $post_id, 'mashup_var_ticket_price', true );
        $event_status = get_post_meta( $post_id, 'mashup_var_event_status', true );
        $event_buy_button_color = get_post_meta( $post_id, 'mashup_var_event_buy_button_color', true );

        $event_location = get_post_meta( $post_id, "mashup_var_event_location_switch", true );
        $location_address = get_post_meta( $post_id, "mashup_var_location_address", true );
        $location_latitude = get_post_meta( $post_id, "mashup_var_location_latitude", true );
        $location_longitude = get_post_meta( $post_id, "mashup_var_location_longitude", true );
        $location_zoom = get_post_meta( $post_id, "mashup_var_location_zoom", true );

        $event_gallery_switch = get_post_meta( $post_id, 'mashup_var_event_gallery_switch', true );
        $event_gallery = get_post_meta( $post_id, 'mashup_var_event_gallery', true );
        $gallery_list_num = get_post_meta( $post_id, 'mashup_var_gallery_list_num', true );

        $phone_num = get_post_meta( $post_id, 'mashup_var_phone_num', true );
        $email = get_post_meta( $post_id, 'mashup_var_email', true );
        $facebook_url = get_post_meta( $post_id, 'mashup_var_facebook_url', true );
        $twitter_url = get_post_meta( $post_id, 'mashup_var_twitter_url', true );

        $mashup_page_layout = get_post_meta( $post_id, 'mashup_var_page_layout', true );
        $mashup_page_sidebar_left = get_post_meta( $post_id, 'mashup_var_page_sidebar_left', true );
        $mashup_page_sidebar_right = get_post_meta( $post_id, 'mashup_var_page_sidebar_right', true );

        if ( $mashup_page_layout == "none" && $mashup_page_layout == "" ) {
            $page_element_size = 'page-content-fullwidth';
        } else if ( 'left' == $mashup_page_layout || 'right' == $mashup_page_layout ) {
            $page_element_size = 'page-content col-lg-6 col-md-6 col-sm-12 col-xs-12';
        } else {
            $page_element_size = 'page-content col-lg-9 col-md-9 col-sm-12 col-xs-12';
        }
        ?>
        <div id="main">
            <div class="page-section">
                <div class="container">
                    <div class="row">
                        <?php if ( 'left' == $mashup_page_layout ) { ?>
                            <div class="page-sidebar left col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <?php
                                if ( is_active_sidebar( $mashup_page_sidebar_left ) ) {
                                    dynamic_sidebar( $mashup_page_sidebar_left );
                                }
                                ?>
                            </div>
                        <?php } ?>
                        <div class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="widget-info">
                                <?php the_title( '<div class="post-title"><h5>', '</h5></div>' ); ?>
                                <span>
                                    <?php
                                    echo date_i18n( 'l', strtotime( $event_from_date ) ) . ', ';
                                    echo date_i18n( 'M', strtotime( $event_from_date ) ) . ' ';
                                    echo date_i18n( 'd', strtotime( $event_from_date ) );
                                    if ( strtotime( date_i18n( 'Y', strtotime( $event_from_date ) ) ) != strtotime( date_i18n( 'Y', strtotime( $event_to_date ) ) ) ) {
                                        echo ', ';
                                        echo date_i18n( 'Y', strtotime( $event_from_date ) );
                                    }
                                    echo ' - ';
                                    if ( strtotime( date_i18n( 'M', strtotime( $event_from_date ) ) ) != strtotime( date_i18n( 'M', strtotime( $event_to_date ) ) ) ) {
                                        echo date_i18n( 'M', strtotime( $event_to_date ) ) . ' ';
                                    }
                                    echo date_i18n( 'd', strtotime( $event_to_date ) ) . ', ';
                                    echo date_i18n( 'Y', strtotime( $event_to_date ) );
                                    ?>
                                </span>
                                <?php if ( $phone_num || $email || $facebook_url || $twitter_url ) { ?>
                                    <ul class="widget-social-media">
                                        <?php if ( $phone_num ) { ?>
                                            <li><a href="tel:<?php echo $phone_num; ?>"><i class="icon- icon-phone2"></i><?php echo $phone_num; ?></a></li>
                                        <?php } ?>
                                        <?php if ( $email ) { ?>
                                            <li><a href="mailto:<?php echo $email; ?>"><i class="icon- icon-envelope3"></i><?php echo $email; ?></a></li>
                                        <?php } ?>
                                        <?php if ( $facebook_url ) { ?>
                                            <li><a href="<?php echo esc_url( $facebook_url ); ?>"><i class="icon- icon-facebook3"></i><?php echo mashup_var_frame_text_srt( 'mashup_var_event_follow_on_facebook' ); ?> </a></li>
                                        <?php } ?>
                                        <?php if ( $twitter_url ) { ?>
                                            <li><a href="<?php echo esc_url( $twitter_url ); ?>"><i class="icon- icon-twitter2"></i><?php echo mashup_var_frame_text_srt( 'mashup_var_event_find_on_twitter' ); ?></a></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                                <?php
                                if ( $ticket_title ) {
                                    $button_bg_color = '';
                                    if ( $event_buy_button_color ) {
                                        $button_bg_color = 'style="background-color: ' . $event_buy_button_color . ' !important;"';
                                    }
                                    ?>
                                    <a href="<?php echo esc_url( $buy_url ); ?>" class="btn btn-efc" <?php echo $button_bg_color; ?>><?php echo esc_html( $ticket_title ); ?></a>
                                <?php } ?>
                            </div>
                            <?php
                            $mashup_map_atts = array(
                                'mashup_event_location' => $event_location,
                                'mashup_location_latitude' => $location_latitude,
                                'mashup_location_longitude' => $location_longitude,
                                'mashup_location_address' => $location_address,
                                'mashup_location_zoom' => $location_zoom,
                            );
                            mashup_detail_map( $post_id, $mashup_map_atts );
                            ?>
                        </div>
                        <div class="<?php echo $page_element_size; ?>">
                            <div class="row">
                                <div class="event-detail">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="image-frame">
                                            <figure>
                                                <?php the_post_thumbnail( 'mashup_media_2' ); ?>
                                                <div class="has-shadow"></div>
                                                <figcaption>
                                                    <span><?php echo date_i18n( 'd M', strtotime( $event_from_date ) ); ?>&rsquo;<?php echo date_i18n( 'y', strtotime( $event_from_date ) ); ?></span>
                                                    <?php the_title( '<strong>', '</strong>' ); ?>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <h3><?php echo mashup_var_frame_text_srt( 'mashup_var_event_detail' ); ?></h3>
                                        <?php the_content(); ?>
                                        <?php wp_link_pages(); ?>
                                        <h3><?php echo mashup_var_frame_text_srt( 'mashup_var_event_gallery' ); ?></h3>
                                        <?php
                                        if ( 'on' == $event_gallery_switch && '' != $event_gallery ) {
                                            $gallery = get_post_meta( $event_gallery, 'mashup_var_list_gallery', true );
                                            $gallery_size = get_post_meta( $event_gallery, 'mashup_var_list_gallery_size', true );
                                            $gallery_title = get_post_meta( $event_gallery, 'mashup_var_list_gallery_title', true );
                                            $gallery_desc = get_post_meta( $event_gallery, 'mashup_var_list_gallery_desc', true );
                                            $gallery_video_url = get_post_meta( $event_gallery, 'mashup_var_list_gallery_video_url', true );

                                            if ( $gallery ) {
                                                ?>
                                                <div class="music-gallery">
                                                    <ul class="row">
                                                        <?php
                                                        $count = 1;
                                                        foreach ( $gallery as $key => $attach_id ) {
                                                            $gal_image_size = $gal_title = $video_url = '';
                                                            $gal_image_size = ( isset( $gallery_size[$key] ) && '' != $gallery_size[$key] ) ? $gallery_size[$key] : '';
                                                            $gal_title = ( isset( $gallery_title[$key] ) && '' != $gallery_title[$key] ) ? $gallery_title[$key] : '';
                                                            $video_url = ( isset( $gallery_video_url[$key] ) && '' != $gallery_video_url[$key] ) ? $gallery_video_url[$key] : '';
                                                            $col_size = '4';
                                                            $image_size = 'mashup_media_7';
                                                            if ( 'large' == $gal_image_size ) {
                                                                $col_size = '12';
                                                                $image_size = 'mashup_media_1';
                                                            } else if ( 'medium' == $gal_image_size ) {
                                                                $col_size = '8';
                                                                $image_size = 'mashup_media_3';
                                                            }

                                                            $image = wp_get_attachment_image_src( $attach_id, $image_size );
                                                            if ( $video_url ) {
                                                                $full_url = $video_url;
                                                            } else {
                                                                $large_image = wp_get_attachment_image_src( $attach_id, 'full' );
                                                                $full_url = $large_image[0];
                                                            }
                                                            ?>
                                                            <li class="col-lg-<?php echo $col_size; ?> col-md-<?php echo $col_size; ?> col-sm-6 col-xs-12">
                                                                <div class="img-holder">
                                                                    <figure><a href="<?php echo esc_url( $full_url ); ?>" class="various" title="<?php echo esc_html( $gal_title ); ?>"><img src="<?php echo $image[0]; ?>"></a>
                                                                        <figcaption>
                                                                            <?php if ( $video_url ) { ?>
                                                                                <i class="icon- icon-play3"></i>
                                                                            <?php } else { ?>
                                                                                <i class="icon-plus"></i>
                                                                            <?php } ?>
                                                                        </figcaption>
                                                                    </figure>
                                                                </div>
                                                            </li>
                                                            <?php
                                                            if ( $count == $gallery_list_num ) {
                                                                break;
                                                            }
                                                            $count ++;
                                                            ?>
                                                        <?php } ?>
                                                    </ul>
                                                    <?php
                                                    $mashup_inline_script = 'jQuery(document).ready(function () {
															if (jQuery(\'.music-gallery\').length != \'\') {
																jQuery(\'.music-gallery a.various\').addClass(\'fancybox iframe\');
																jQuery(\'.music-gallery a.various\').addClass(\'fancybox-media\');
																jQuery(\'.music-gallery a.various\').removeClass(\'fancybox.iframe\');
																jQuery(\'.fancybox-media\').fancybox({
																	openEffect: \'none\',
																	closeEffect: \'none\',
																	showNavArrows: true,
																	helpers: {
																		media: {}
																	}
																});
															}
														});';
                                                    mashup_plugin_inline_enqueue_script( $mashup_inline_script, 'jplayer' );
                                                    ?>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>					
                        </div>
                        <?php if ( 'right' == $mashup_page_layout ) { ?>
                            <div class="page-sidebar right col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <?php
                                if ( is_active_sidebar( $mashup_page_sidebar_right ) ) {
                                    dynamic_sidebar( $mashup_page_sidebar_right );
                                }
                                ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php mashup_related_events( 4 ); ?>
        </div>
        <?php
    endwhile;
endif;
get_footer();
