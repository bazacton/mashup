<?php
global $post, $wpdb, $wp_query, $mashup_var_static_text, $mashup_event_event_title_length;
extract( $wp_query->query_vars );

$event_title_length = 10;
if ( is_numeric( $mashup_event_event_title_length ) && '' != $mashup_event_event_title_length ) {
	$event_title_length = $mashup_event_event_title_length;
}
$rand_num = rand(123456789, 987654321);
$query = new WP_Query( $args );
$post_count = $query->found_posts;
if ( $query->have_posts() ) {
	?>
	<div class="music-events" id="music-events-<?php echo intval( $rand_num ); ?>">
		<ul class="event-slider">
			<?php
			while ( $query->have_posts() ) : $query->the_post();
				$post_id = get_the_ID();
				$event_from_date = get_post_meta( $post_id, 'mashup_var_event_from_date', true );
				$event_start_time = get_post_meta( $post_id, 'mashup_var_event_start_time', true );
				$event_address = get_post_meta( $post_id, 'mashup_var_location_address', true );
				$mashup_get_schedules = get_post_meta( $post_id, 'mashup_var_schedules_array', true );
				$mashup_schedule_times = get_post_meta( $post_id, 'mashup_var_schedule_time_array', true );
				$mashup_schedule_names = get_post_meta( $post_id, 'mashup_var_schedule_name_array', true );
				?>
				<li>	
					<?php if ( has_post_thumbnail() ) { ?>
						<div class="img-holder">
							<figure class="transform-none"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'mashup_media_4' ); ?></a></figure>
						</div>
					<?php } ?>
					<div class="text-holder">
						<h2><a href="<?php the_permalink(); ?>"><?php echo mashup_get_post_excerpt( get_the_title(), $event_title_length ); ?></a></h2>
						<ul>
							<?php if ( '' != $event_address ) { ?>
								<li> <strong><?php echo mashup_var_frame_text_srt( 'mashup_var_events_location' ); ?> </strong> <span><?php echo esc_html( $event_address ); ?> </span></li>
							<?php } ?>
							<?php if ( isset( $mashup_get_schedules ) && is_array( $mashup_get_schedules ) && count( $mashup_get_schedules ) > 0 ) { ?>
								<li> 
									<strong><?php echo mashup_var_frame_text_srt( 'mashup_var_events_timings' ); ?></strong>
									<span>
										<?php
										$br_tag = '';
										$mashup_schedule_counter = 0;
										foreach ( $mashup_get_schedules as $schedules ) {
											if ( isset( $schedules ) && $schedules <> '' ) {

												$counter_schedule = $schedule_id = $schedules;
												$mashup_schedule_time = isset( $mashup_schedule_times[$mashup_schedule_counter] ) ? $mashup_schedule_times[$mashup_schedule_counter] : '';
												$mashup_schedule_name = isset( $mashup_schedule_names[$mashup_schedule_counter] ) ? $mashup_schedule_names[$mashup_schedule_counter] : '';
												?>
												<?php echo $br_tag; ?>
												<?php echo esc_html( $mashup_schedule_name ); ?> &#64; <?php echo esc_html( $mashup_schedule_time ); ?> 
												<?php $br_tag = '<br />'; ?>
											<?php } ?>
											<?php $mashup_schedule_counter ++; ?>
										<?php } ?>
									</span> 
								</li>
							<?php } ?>
						</ul>
						<?php if( strtotime( $event_from_date . $event_start_time ) > strtotime(date('d-m-Y H:i') ) ) { ?>
							<div class="eliment-heading">
								<h5><?php echo mashup_var_frame_text_srt( 'mashup_var_events_time_left' ); ?></h5>
								<em></em> </div>
							<div class="cs-const-counter">
								<div id="getting-started_<?php echo intval( $post_id ); ?>"></div>
							</div>
							<?php
							$mashup_inline_script = 'jQuery(document).ready(function () {
									if (jQuery(\'#getting-started_' . esc_js( $post_id ) . '\').length != "") {
										jQuery(\'#getting-started_' . esc_js( $post_id ) . '\').countdown(\'' . esc_js( date_i18n( "Y/m/d H:i", strtotime( $event_from_date . $event_start_time ) ) ) . '\', function (event) {
											jQuery(this).html(event.strftime(\'<div class="time-box"> <span class="label">days</span><h4 class="dd">%D</h4><span class="cs-slash"></span></div><div class="time-box"><span class="label">hours</span><h4 class="hh">%H</h4><span class="cs-slash"></span></div><div class="time-box"> <span class="label">minutes</span><h4 class="mm">%M</h4><span class="cs-slash"></span></div><div class="time-box"> <span class="label">seconds</span><h4 class="ss">%S</h4></div>\'));
										});
									}
								});';
							mashup_plugin_inline_enqueue_script( $mashup_inline_script, 'jplayer' );
						}
						?>
					</div>
				</li>
			<?php endwhile; ?>
		</ul>
	</div>

	<?php

	$mashup_inline_script = 'if (jQuery(\'#music-events-'. esc_js( $rand_num ) .' ul.event-slider\').length != \'\') {
		$(\'#music-events-'. esc_js( $rand_num ) .' ul.event-slider\').slick({
			infinite: false,
			slidesToShow: 1,
			slidesToScroll: 1,
			swipeToSlide: true,
			dots: false,
			fade: true,
			autoplay: false,
			prevArrow: \'<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button">Previous TOUR</button>\',
			nextArrow: \'<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button">NEXT TOUR</button>\',
		});
	}';
	mashup_plugin_inline_enqueue_script( $mashup_inline_script, 'jplayer' );
	?>
	<?php
} else {
	echo mashup_var_frame_text_srt( 'mashup_var_events_not_found' );
}
wp_reset_postdata();
