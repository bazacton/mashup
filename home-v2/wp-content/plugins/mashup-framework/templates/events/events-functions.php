<?php
/**
 * @  Blog html form for page builder Frontend side
 *
 *
 */
if ( ! function_exists( 'mashup_event_shortcode' ) ) {

    function mashup_event_shortcode( $atts ) {
        global $post, $wpdb, $mashup_event_event_title_length, $mashup_event_num_post, $event_pagination, $rand_num;

        $defaults = array(
            'mashup_event_element_title' => '',
            'mashup_event_cat' => '',
            'mashup_events_listing_type' => 'ID',
            'mashup_events_view' => 'events-list',
            'mashup_event_order_by' => 'ID',
            'mashup_event_order' => 'DESC',
            'mashup_event_event_title_length' => '',
            'mashup_event_num_post' => '5',
            'event_pagination' => '',
            'mashup_var_events_sub_title' => '',
            'mashup_var_events_align' => '',
        );

        extract( shortcode_atts( $defaults, $atts ) );

        $mashup_event_cats = $mashup_event_cat;
        static $mashup_var_custom_counter;
        if ( ! isset( $mashup_var_custom_counter ) ) {
            $mashup_var_custom_counter = 1;
        } else {
            $mashup_var_custom_counter ++;
        }
        $mashup_var_page = isset( $_GET['post_paging_' . $mashup_var_custom_counter] ) ? $_GET['post_paging_' . $mashup_var_custom_counter] : '1';

        ob_start();

        $rand_num = rand( 1000000, 9999999 );

        date_default_timezone_set( 'UTC' );
        $current_time = strtotime( current_time( 'd-m-Y H:i', $gmt = 0 ) );

        $meta_compare = "";
        $meta_value = $current_time;
        $meta_key = 'date_time';

        if ( $mashup_events_listing_type == "upcoming-events" ) {
            $meta_compare = '>=';
        } else if ( $mashup_events_listing_type == "past-events" ) {
            $meta_compare = '<';
        }
        if ( empty( $_GET['page_id_all'] ) ) {
            $_GET['page_id_all'] = 1;
        }

        $mashup_event_num_post = $mashup_event_num_post ? $mashup_event_num_post : '-1';

        $args['post_type'] = 'events';
        $args['posts_per_page'] = $mashup_event_num_post;
        $args['paged'] = $mashup_var_page;
        $args['post_status'] = 'publish';
        $args['orderby'] = $mashup_event_order_by;
        $args['order'] = $mashup_event_order;
        if ( $mashup_events_listing_type != "all-events" ) {
            $args['meta_key'] = $meta_key;
            $args['meta_value'] = $meta_value;
            $args['meta_compare'] = $meta_compare;
        }
        if ( $mashup_events_listing_type == "all-events" && $mashup_event_order_by == 'date_time' ) {
            $args['meta_key'] = $meta_key;
        }

        if ( isset( $mashup_event_cat ) && '' != $mashup_event_cat ) {
            $mashup_event_cat = explode( ',', $mashup_event_cat );
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'event-category',
                    'field' => 'slug',
                    'terms' => $mashup_event_cat
                )
            );
        }

        $event_meta_key = $meta_key;
        $event_meta_value = $meta_value;
        $event_meta_compare = $meta_compare;

        // Element Title and Sub Title.
        if ( isset( $mashup_event_element_title ) && $mashup_event_element_title <> '' || isset( $mashup_var_events_sub_title ) && $mashup_var_events_sub_title <> '' ) {
            echo '<div class="section-title ' . $mashup_var_events_align . '">';
            if ( isset( $mashup_event_element_title ) && $mashup_event_element_title <> '' ) {
                echo '<h2>' . mashup_allow_special_char( $mashup_event_element_title ) . '</h2>';
            }
            echo '<em></em>';
            if ( isset( $mashup_var_events_sub_title ) && $mashup_var_events_sub_title <> '' ) {
                echo '<p>' . mashup_allow_special_char( $mashup_var_events_sub_title ) . '</p>';
            }
            echo '</div>';
        }

        set_query_var( 'args', $args );
        if ( 'events-slideshow' == $mashup_events_view ) {
            include 'events-slideshow.php';
        } else {
            include 'events-list.php';
        }

        $query = new WP_Query( $args );
        $count_post = $query->found_posts;
        $mashup_var_page = 'post_paging_' . $mashup_var_custom_counter;

        if ( ( $event_pagination == "yes" || $event_pagination == "load_more" ) && $count_post > $mashup_event_num_post && $mashup_event_num_post > 0 && 'events-slideshow' != $mashup_events_view ) {
            $total_pages = '';
            $total_pages = ceil( $count_post / $mashup_event_num_post );
            if ( $event_pagination == "yes" ) {
                echo '<nav>';
                echo '<div class="row">';
                mashup_var_get_pagination( $total_pages, isset( $_GET[$mashup_var_page] ) ? $_GET[$mashup_var_page] : 1, $mashup_var_page );
                echo '</div>';
                echo '</nav>';
            } else {
                echo '
				<script type="text/javascript">
				var load_data_' . $rand_num . ' = {
					\'per_page\' : \'' . $mashup_event_num_post . '\',
					\'total_pages\' : \'' . $total_pages . '\',
					\'event_listing_type\' : \'' . $mashup_events_listing_type . '\',
					\'meta_key\' : \'' . $event_meta_key . '\',
					\'meta_value\' : \'' . $event_meta_value . '\',
					\'meta_compare\' : \'' . $event_meta_compare . '\',
					\'event_cats\' : \'' . $mashup_event_cat . '\',
					\'order\' : \'' . $mashup_event_order . '\',
					\'order_by\' : \'' . $mashup_event_order_by . '\',
					\'title_length\' : \'' . $mashup_event_event_title_length . '\',
				};
				</script>
				<div id="events-load-more-' . $rand_num . '" class="load-more-holder">
					<a href="javascript:void(0);" data-id="' . $rand_num . '" data-page="1" data-ajaxurl="' . admin_url( 'admin-ajax.php' ) . '" class="load-more mashup-event-load-more">' . __( 'Load More', CSFRAME_DOMAIN ) . '</a>
				</div>';
            }
        }

        wp_reset_postdata();
        $post_data = ob_get_clean();
        return $post_data;
    }

    if ( function_exists( 'mashup_var_short_code' ) ) {
        mashup_var_short_code( 'mashup_event', 'mashup_event_shortcode' );
    }
}

if ( ! function_exists( 'mashup_load_more_events' ) ) {

    function mashup_load_more_events() {
        global $post;
        ob_start();
        $total_pages = isset( $_POST['total_pages'] ) ? $_POST['total_pages'] : '';
        $page_num = isset( $_POST['page_num'] ) ? ((int) $_POST['page_num'] + 1) : 1;
        $per_page = isset( $_POST['per_page'] ) ? $_POST['per_page'] : '';

        $mashup_events_listing_type = isset( $_POST['event_listing_type'] ) ? $_POST['event_listing_type'] : '';
        $meta_key = isset( $_POST['meta_key'] ) ? $_POST['meta_key'] : '';
        $meta_value = isset( $_POST['meta_value'] ) ? $_POST['meta_value'] : '';
        $meta_compare = isset( $_POST['order'] ) ? $_POST['meta_compare'] : '';
        $mashup_event_cat = isset( $_POST['event_cats'] ) ? $_POST['event_cats'] : '';
        $mashup_event_order_by = isset( $_POST['order_by'] ) ? $_POST['order_by'] : '';
        $mashup_event_order = isset( $_POST['order'] ) ? $_POST['order'] : '';
        $event_title_length = isset( $_POST['title_length'] ) ? $_POST['title_length'] : '';

        $args['post_type'] = 'events';
        $args['posts_per_page'] = $per_page;
        $args['paged'] = $page_num;
        $args['post_status'] = 'publish';
        $args['orderby'] = $mashup_event_order_by;
        $args['order'] = $mashup_event_order;
        if ( $mashup_events_listing_type != "all-events" ) {
            $args['meta_key'] = $meta_key;
            $args['meta_value'] = $meta_value;
            $args['meta_compare'] = $meta_compare;
        }
        if ( $mashup_events_listing_type == "all-events" && $mashup_event_order_by == 'date_time' ) {
            $args['meta_key'] = $meta_key;
        }

        if ( isset( $mashup_event_cat ) && '' != $mashup_event_cat ) {
            $mashup_event_cat = explode( ',', $mashup_event_cat );
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'event-category',
                    'field' => 'slug',
                    'terms' => $mashup_event_cat
                )
            );
        }

        $query = new WP_Query( $args );
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) : $query->the_post();
                $post_id = get_the_ID();
                $event_from_date = get_post_meta( $post_id, 'mashup_var_event_from_date', true );
                $event_address = get_post_meta( $post_id, 'mashup_var_location_address', true );
                $ticket_title = get_post_meta( $post_id, 'mashup_var_ticket_title', true );
                $buy_url = get_post_meta( $post_id, 'mashup_var_buy_url', true );
                $ticket_price = get_post_meta( $post_id, 'mashup_var_ticket_price', true );
                $event_status = get_post_meta( $post_id, 'mashup_var_event_status', true );
                $event_buy_button_color = get_post_meta( $post_id, 'mashup_var_event_buy_button_color', true );

                $event_gallery = get_post_meta( $post_id, 'mashup_var_event_gallery', true );
                $gallery = get_post_meta( $event_gallery, 'mashup_var_list_gallery', true );
                ?>
                <li <?php
                if ( '' != $event_status ) {
                    echo 'class="ticket-' . esc_html( $event_status ) . '"';
                }
                ?>>
                    <div class="event-title">
                        <h3><?php echo date_i18n( 'd M', strtotime( $event_from_date ) ); ?>&rsquo;<?php echo date_i18n( 'y', strtotime( $event_from_date ) ); ?></h3>
                    </div>
                    <div class="event-info">
                        <p><a href="<?php the_permalink(); ?>"><?php echo mashup_get_post_excerpt( get_the_title(), $event_title_length ); ?></a></p>
                    </div>
                    <?php if ( '' != $event_address ) { ?>
                        <div class="event-location">
                            <p><?php echo esc_html( $event_address ); ?></p>
                        </div>
                    <?php } ?>
                    <?php if ( '' != $ticket_price ) { ?>
                        <div class="event-price">
                            <span><?php echo esc_html( $ticket_price ); ?></span>
                        </div>
                    <?php } ?>
                    <?php if ( '' != $ticket_title ) { ?>
                        <div class="event-ticket">
                            <?php
                            $button_bg_color = '';
                            if ( $event_buy_button_color ) {
                                $button_bg_color = 'style="background-color: ' . $event_buy_button_color . ' !important;"';
                            }
                            ?>
                            <a href="<?php echo esc_url( $buy_url ); ?>" class="bgcolor btn-efc" <?php echo mashup_allow_special_char( $button_bg_color ); ?>><?php echo esc_html( $ticket_title ); ?></a>
                        </div>
                    <?php } ?>
                </li>   
                <?php
            endwhile;
            wp_reset_postdata();
        }
        $posts_data = ob_get_clean();
        echo json_encode( array( 'list' => $posts_data, 'page_num' => $page_num ) );
        die;
    }

    add_action( 'wp_ajax_mashup_load_more_events', 'mashup_load_more_events' );
    add_action( 'wp_ajax_nopriv_mashup_load_more_events', 'mashup_load_more_events' );
}

if ( ! function_exists( 'mashup_related_events' ) ) {

    function mashup_related_events( $number_events = '-1' ) {
        global $post, $mashup_var_static_text;
        // check related events on/off.
        $related_events = get_post_meta( $post->ID, 'mashup_var_related_events', true );
        if ( 'on' === $related_events ) {
            $post_terms = wp_get_post_terms( $post->ID, 'event-category', array( 'fields' => 'ids' ) );

            $args['post_type'] = 'events';
            $args['posts_per_page'] = $number_events;
            $args['post_status'] = 'publish';
            $args['meta_key'] = 'date_time';
            $args['orderby'] = 'meta_value';
            $args['order'] = 'ASC';
            $args['post__not_in'] = array( $post->ID );
            if ( $post_terms ) {
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'event-category',
                        'field' => 'id',
                        'terms' => $post_terms
                    )
                );
            }

            $rel_qry = new WP_Query( $args );
            if ( $rel_qry->have_posts() ) :
                ?>
                <div class="related-events">
                    <div class="container">
                        <div class="row">
                            <div class="event-list-holder">
                                <div class="section-title">
                                    <h2><?php echo mashup_var_frame_text_srt( 'mashup_var_related_events' ); ?></h2>
                                </div>
                                <div class="music-event-list event-detail-list">
                                    <ul>
                                        <?php
                                        while ( $rel_qry->have_posts() ) : $rel_qry->the_post();
                                            $post_id = get_the_ID();
                                            $event_from_date = get_post_meta( $post_id, 'mashup_var_event_from_date', true );
                                            $event_address = get_post_meta( $post_id, 'mashup_var_location_address', true );
                                            $ticket_title = get_post_meta( $post_id, 'mashup_var_ticket_title', true );
                                            $buy_url = get_post_meta( $post_id, 'mashup_var_buy_url', true );
                                            $ticket_price = get_post_meta( $post_id, 'mashup_var_ticket_price', true );
                                            $event_status = get_post_meta( $post_id, 'mashup_var_event_status', true );
                                            $event_buy_button_color = get_post_meta( $post_id, 'mashup_var_event_buy_button_color', true );
                                            ?>
                                            <li <?php
                                            if ( $event_status == 3 ) {
                                                echo 'class="album-sold"';
                                            }
                                            ?>>
                                                <div class="event-title">
                                                    <h3><?php echo date_i18n( 'd M', strtotime( $event_from_date ) ); ?>&rsquo;<?php echo date_i18n( 'y', strtotime( $event_from_date ) ); ?></h3>
                                                </div>
                                                <div class="event-info">
                                                    <h6><a href="<?php the_permalink(); ?>"><?php echo mashup_get_post_excerpt( get_the_title(), 10 ); ?></a></h6>
                                                </div>
                                                <?php if ( '' != $event_address ) { ?>
                                                    <div class="event-location">
                                                        <p><?php echo $event_address; ?></p>
                                                    </div>
                                                <?php } ?>
                                                <?php if ( '' != $ticket_price ) { ?>
                                                    <div class="event-price">
                                                        <span><?php echo $ticket_price; ?></span>
                                                    </div>
                                                <?php } ?>
                                                <?php if ( '' != $ticket_title ) { ?>
                                                    <div class="event-ticket">
                                                        <?php
                                                        $button_bg_color = '';
                                                        if ( $event_buy_button_color ) {
                                                            $button_bg_color = 'style="background-color: ' . $event_buy_button_color . ' !important;"';
                                                        }
                                                        ?>
                                                        <a href="<?php echo esc_url( $buy_url ); ?>" class="bgcolor btn-efc" <?php echo $button_bg_color; ?>><?php echo esc_html( $ticket_title ); ?></a>
                                                    </div>
                                                <?php } ?>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            endif;
            wp_reset_query();
        }
    }

}

if ( ! function_exists( 'mashup_detail_map' ) ) {

    function mashup_detail_map( $mashup_map_id = '5', $map_atts = array() ) {
        global $mashup_var_options;
        extract( $map_atts );

        if ( $mashup_event_location == 'on' && $mashup_location_latitude != '' && $mashup_location_longitude != '' && $mashup_location_zoom != '' ) {
            $map_style = isset( $mashup_var_options['mashup_var_def_map_style'] ) ? $mashup_var_options['mashup_var_def_map_style'] : '';
            ?>
            <div class="widget-map">
                <?php if ( '' != $mashup_location_address ) { ?>
                    <div class="text-holder">
                        <i class="icon- icon-location"></i>
                        <span><?php echo esc_html( $mashup_location_address ); ?></span>
                    </div>
                <?php } ?>
                <div class="map-holder">
                    <div id="map_canvas<?php echo absint( $mashup_map_id ) ?>" style="height:223px;"></div>
                </div>
            </div>
            <?php
            $mashup_inline_script = '
			jQuery(document).ready(function() {
				initialize();
			});
			function initialize() {

				google.maps.event.addDomListener(window, \'load\', initialize);
				var mashup_Latlng = new google.maps.LatLng("' . esc_js( $mashup_location_latitude ) . '", "' . esc_js( $mashup_location_longitude ) . '");

				var mashup_map_options = {
					zoom: ' . esc_js( $mashup_location_zoom ) . ',
					center: mashup_Latlng,
					//mapTypeId: google.maps.MapTypeId.ROADMAP,
					scrollwheel: true,
					draggable: true,
					streetViewControl: false,
					disableDefaultUI: false,
				};
				var map = new google.maps.Map(document.getElementById(\'map_canvas' . esc_js( $mashup_map_id ) . '\'), mashup_map_options);
				var style = \'' . esc_js( $map_style ) . '\';
				if (style != \'\') {
					var styles = mashup_map_select_style(style);
					if (styles != \'\') {
						var styledMap = new google.maps.StyledMapType(styles,
								{name: \'Styled Map\'});
						map.mapTypes.set(\'map_style\', styledMap);
						map.setMapTypeId(\'map_style\');
					}
				}
				var infowindow = new google.maps.InfoWindow({
					content: \'' . esc_js( $mashup_location_address ) . '\',
					maxWidth: 200,
					maxHeight: 100,
				});
				var marker = new google.maps.Marker({
					position: mashup_Latlng,
					map: map,
					title: \'\',
					icon: \'\',
					shadow: \'\'
				});
				if (infowindow.content != \'\') {
					google.maps.event.addListener(marker, \'click\', function (event) {
						infowindow.open(map, marker);
						map.panBy(1, -60);
					});
				}

				google.maps.event.trigger(map, "resize");
			}';
            mashup_plugin_inline_enqueue_script( $mashup_inline_script, 'jplayer' );

            if ( function_exists( 'mashup_enqueue_google_map' ) ) {
                mashup_enqueue_google_map();
            }
        }
    }

}
