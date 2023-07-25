<?php
/**
 * The template for displaying single Album
 */
get_header();

if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		$release_date = get_post_meta($post->ID, 'mashup_var_album_release_date', true);
		$small_description = get_post_meta($post->ID, 'mashup_var_album_small_desc', true);
		$buy_url = get_post_meta($post->ID, 'mashup_var_album_buy_url', true);
		$itunes_url = get_post_meta($post->ID, 'mashup_var_album_itunes_url', true);
		$amazon_url = get_post_meta($post->ID, 'mashup_var_album_amazon_url', true);
		?>
		<div id="main">
			<div class="page-section">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="album-detail">
								<div class="img-holder">
									<figure> 
										<?php
										if ( mashup_post_have_thumbnail($post->ID) ) {
											the_post_thumbnail('mashup_media_8');
										} else {
											echo '<img src="' . wp_mashup_framework::plugin_url('assets/images/no-image.jpg') . '" alt="" />';
										}
										echo mashup_album_play_track($post->ID, true);
										?>
									</figure>
								</div>
								<div class="text-holder"> 
									<?php
									if ( $release_date != '' ) {
										?>
										<span class="date">
											<?php printf(__('Release Date %s', CSFRAME_DOMAIN), date_i18n(get_option('date_format'), strtotime($release_date))) ?>
										</span>
										<?php
									}
									?>
									<div class="album-title">
										<h4><?php the_title() ?></h4>
									</div>
									<?php
									if ( $small_description != '' ) {
										?>
										<p><?php echo esc_html($small_description) ?></p>
										<?php
									}
									if ( $buy_url != '' ) {
										?>
										<a class="btn-buy bgcolor" href="<?php echo esc_url($buy_url) ?>"><?php _e('buy now', CSFRAME_DOMAIN) ?></a>
										<?php
									}
									if ( $itunes_url != '' ) {
										?>
										<a class="btn-itune" href="<?php echo esc_url($itunes_url) ?>"><img src="<?php echo wp_mashup_framework::plugin_url('assets/images/img-itune.png') ?>" alt="" /></a>
										<?php
									}
									if ( $amazon_url != '' ) {
										?>
										<a class="btn-amazone" href="<?php echo esc_url($amazon_url) ?>"><img src="<?php echo wp_mashup_framework::plugin_url('assets/images/img-amazon.png') ?>" alt="" /></a>
										<?php
									}
									?>
								</div>
							</div>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
							<?php echo mashup_album_list_tracks($post->ID) ?>
							<div class="album-detail">
								<div class="text-holder"> 
									<div class="album-title">
										<h4><?php _e('album detail', CSFRAME_DOMAIN); ?></h4>
									</div>
									<div class="mashup-rich-editor">
										<?php the_content() ?>
									</div>
								</div>
							</div>		
						</div>

					</div>
				</div>
			</div>
		</div>

		<?php
	endwhile;
endif;
get_footer();
