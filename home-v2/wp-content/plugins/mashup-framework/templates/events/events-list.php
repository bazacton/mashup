<?php
global $post, $wpdb, $wp_query, $mashup_var_static_text, $rand_num;
extract( $wp_query->query_vars );

$event_title_length = 10;
if ( is_numeric( $mashup_event_event_title_length ) && '' != $mashup_event_event_title_length ) {
    $event_title_length = $mashup_event_event_title_length;
}

$query = new WP_Query( $args );
if ( $query->have_posts() ) {
    ?>
    <div class="music-event-list">
        <ul id="events-load-list-<?php echo intval( $rand_num ); ?>">
            <li>
                <div class="event-title">
                    <div class="eliment-heading">
                        <h5><?php echo mashup_var_frame_text_srt( 'mashup_var_events_date_heading' ); ?></h5>
                        <em></em> 
                    </div>
                </div>
                <div class="event-info">
                    <div class="eliment-heading">
                        <h5><?php echo mashup_var_frame_text_srt( 'mashup_var_events_desc_heading' ); ?></h5>
                        <em></em> 
                    </div>
                </div>
                <div class="event-location">
                    <div class="eliment-heading">
                        <h5><?php echo mashup_var_frame_text_srt( 'mashup_var_events_location_heading' ); ?></h5>
                        <em></em> 
                    </div>
                </div>
                <div class="event-price">
                    <div class="eliment-heading">
                        <h5><?php echo mashup_var_frame_text_srt( 'mashup_var_events_ticket_price_heading' ); ?></h5>
                        <em></em> 
                    </div>
                </div>
                <div class="event-ticket">
                    <div class="eliment-heading">
                        <h5><?php echo mashup_var_frame_text_srt( 'mashup_var_events_tickets_heading' ); ?></h5>
                        <em></em> 
                    </div>
                </div>
            </li>
            <?php
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
                        <h6><a href="<?php the_permalink(); ?>"><?php echo mashup_get_post_excerpt( get_the_title(), $event_title_length ); ?></a></h6>
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
    <?php endwhile; ?>
        </ul>
    </div>
    <?php
} else {
    echo mashup_var_frame_text_srt( 'mashup_var_events_not_found' );
}
wp_reset_postdata();
