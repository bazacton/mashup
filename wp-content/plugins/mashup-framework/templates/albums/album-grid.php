<?php
$query = new WP_Query($args);

if ( $query->have_posts() ) {

	echo '<ul id="load-list-' . $rand_num . '">';
	while ( $query->have_posts() ) : $query->the_post();
		$album_featured = get_post_meta($post->ID, 'mashup_var_album_featured', true);
		?>
		<li class="<?php echo esc_html($col_class) ?>">
			<div class="img-holder">
				<figure> 
					<?php
					if ( mashup_post_have_thumbnail($post->ID) ) {
						the_post_thumbnail('mashup_media_8');
					} else {
						echo '<img src="' . wp_mashup_framework::plugin_url('assets/images/no-image.jpg') . '" alt="" />';
					}
					?>
					<figcaption>
						<?php
						if ( $album_featured == 'on' ) {
							?>
							<span class="album-label"><em><?php _e('new', CSFRAME_DOMAIN) ?></em></span> 
							<?php
						}
						echo mashup_album_play_track($post->ID);
						?>
					</figcaption>
				</figure>
			</div>
			<div class="text-holder">
				<div class="post-title">
					<h6><a href="<?php the_permalink() ?>"><?php echo wp_trim_words(get_the_title(), $mashup_album_posts_title_length_var, '...') ?></a></h6>
				</div>
				<span class="album-tracks"><?php printf(__('%s tracks', CSFRAME_DOMAIN), mashup_album_count_tracks($post->ID)) ?></span> 
			</div>
		</li>           
		<?php
	endwhile;
	echo '</ul>';
	wp_reset_postdata();
} else {
	_e('No album found.', CSFRAME_DOMAIN);
}
