<?php
/*
 * Frontend file for Contact Us short code
 */
if ( !function_exists( 'mashup_var_gallery_data' ) ) {

	function mashup_var_gallery_data( $atts, $content = "" ) {
		global $post, $mashup_gallery_cat, $mashup_var_html_fields;
		$post_id = $post->ID;

		$defaults = shortcode_atts( array(
			'mashup_var_cs_gallery_title' => '',
			'mashup_var_cs_gallery_type' => '',
			'mashup_var_cs_gallery_categories' => '',
			'mashup_var_gallery_sub_title' => '',
			'mashup_var_gallery_align' => '',
				), $atts );

		extract( shortcode_atts( $defaults, $atts ) );

		if ( isset( $mashup_var_column_size ) && $mashup_var_column_size != '' ) {
			if ( function_exists( 'mashup_var_custom_column_class' ) ) {
				$column_class = mashup_var_custom_column_class( $mashup_var_column_size );
			}
		}

		// Set All variables 
		$html = '';
		$column_class = isset( $column_class ) ? $column_class : '';
		$mashup_var_cs_gallery_title = isset( $mashup_var_cs_gallery_title ) ? $mashup_var_cs_gallery_title : '';
		$mashup_var_cs_gallery_categories = isset( $mashup_var_cs_gallery_categories ) ? $mashup_var_cs_gallery_categories : '';
		$mashup_var_cs_gallery_type = isset( $mashup_var_cs_gallery_type ) ? $mashup_var_cs_gallery_type : '';
		$mashup_var_gallery_sub_title = isset( $mashup_var_gallery_sub_title ) ? $mashup_var_gallery_sub_title : '';
		$mashup_var_gallery_align = isset( $mashup_var_gallery_align ) ? $mashup_var_gallery_align : '';
		$mashup_gallery_filterable = isset( $mashup_gallery_filterable ) ? $mashup_gallery_filterable : '';

		$cats_array = explode( ',', $mashup_var_cs_gallery_categories );

		ob_start();
		?>
		<?php
		if ( isset( $mashup_var_cs_gallery_title ) && $mashup_var_cs_gallery_title <> '' || isset( $mashup_var_gallery_sub_title ) && $mashup_var_gallery_sub_title <> '' ) {
			?>
			<div class="element-title <?php echo esc_attr( $mashup_var_gallery_align ); ?>">
				<?php if ( isset( $mashup_var_cs_gallery_title ) && $mashup_var_cs_gallery_title <> '' ) { ?>
					<h2><?php echo esc_html( $mashup_var_cs_gallery_title ); ?></h2>
				<?php } ?>
				<em></em>
				<?php
				if ( isset( $mashup_var_gallery_sub_title ) && $mashup_var_gallery_sub_title <> '' ) {
					?>
					<p><?php echo esc_html( $mashup_var_gallery_sub_title ); ?></p>
				<?php } ?>
			</div>
			<?php
		}
		?>
		<?php
		$args = array( 'post_type' => 'gallery', 'tax_query' => array(
				array(
					'taxonomy' => 'gallery-category',
					'field' => 'slug',
					'terms' => $cats_array
				)
			)
		);
		$query = new wp_query( $args );

		if ( isset( $mashup_var_cs_gallery_type ) && $mashup_var_cs_gallery_type == 'view_1' ) {

			echo '<div class="music-gallery grid">
                                   <ul class="row">';
			while ( $query->have_posts() ) {
				$query->the_post();
				$galleries = get_post_meta( get_the_ID(), 'mashup_var_list_gallery', true );
				$size = get_post_meta( get_the_ID(), 'mashup_var_list_gallery_size', true );
				$vedio_url = get_post_meta( get_the_ID(), 'mashup_var_list_gallery_video_url', true );
				$counter = 0;
				foreach ( $galleries as $gal ) {
					$class = "col-lg-3 col-md-3 col-sm-6 col-xs-12";
					$full_imag = wp_get_attachment_image_src( $gal, 'full' );
					$url = $full_imag[0];
					if ( isset( $vedio_url[$counter] ) && $vedio_url[$counter] != '' ) {
						$url = $vedio_url[$counter];
					}

					if ( isset( $size[$counter] ) ) {

						if ( $size[$counter] == 'small' ) {
							$imag = wp_get_attachment_image_src( $gal, 'mashup_media_7' );
							$class = "col-lg-3 col-md-3 col-sm-6 col-xs-12";
						}
						if ( $size[$counter] == 'medium' ) {
							$imag = wp_get_attachment_image_src( $gal, 'mashup_media_3' );
							$class = "col-lg-6 col-md-6 col-sm-6 col-xs-12";
						}
						if ( $size[$counter] == 'large' ) {
							$class = "col-lg-9 col-md-9 col-sm-9 col-xs-12";
							$imag = wp_get_attachment_image_src( $gal, 'mashup_media_1' );
						}
					}
					?>
					<li class="grid-item <?php echo $class ?>">
						<div class="img-holder">
                                                    <figure> <a  href="<?php echo $url; ?>" class="various"><img src="<?php echo $imag[0]; ?>" alt=""> </a>
								<figcaption>
									<i class="icon-plus"></i>
								</figcaption>
							</figure>
						</div>
					</li>
					<?php
					$counter ++;
				}
			}
			wp_reset_postdata();
			?>
			</ul>
			</div>
			<?php
		} else if ( isset( $mashup_var_cs_gallery_type ) && $mashup_var_cs_gallery_type == 'view_2' ) {
			echo '<div class="row">';
			while ( $query->have_posts() ) {
				$query->the_post();
				$galleries = get_post_meta( get_the_ID(), 'mashup_var_list_gallery', true );
				$size = get_post_meta( get_the_ID(), 'mashup_var_list_gallery_size', true );
				$vedio_url = get_post_meta( get_the_ID(), 'mashup_var_list_gallery_video_url', true );
				$image_title = get_post_meta( get_the_ID(), 'mashup_var_list_gallery_title', true );
				$image_desc = get_post_meta( get_the_ID(), 'mashup_var_list_gallery_desc', true );
				$counter = 0;
				$title = '';
				$desc = '';

				foreach ( $galleries as $gal ) {
					$full_imag = wp_get_attachment_image_src( $gal, 'mashup_media_5' );
					$full_frame_imag = wp_get_attachment_image_src( $gal, 'mashup_media_1' );
					if ( isset( $full_imag ) && is_array( $full_imag ) ) {
						$full_image_url = $full_imag[0];
						$full_frame_image_url = $full_frame_imag[0];
						$full_image_src = isset( $full_image_url ) ? $full_image_url : '';
						$full_frame_image_src = isset( $full_frame_image_url ) ? $full_frame_image_url : '';
					}
					if ( isset( $vedio_url[$counter] ) && $vedio_url[$counter] != '' ) {
						$url = $vedio_url[$counter];
					}
					if ( isset( $image_title[$counter] ) && $image_title[$counter] != '' ) {
						$title = $image_title[$counter];
					}
					if ( isset( $image_desc[$counter] ) && $image_desc[$counter] != '' ) {
						$desc = $image_desc[$counter];
					}
					if ( isset( $full_image_src ) && $full_image_src <> '' ) {
						?>

						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="video-grid">
								<div class="img-holder">
									<figure>
										<img src="<?php echo esc_url( $full_image_src ); ?>" alt="">
										<div class="has-shadow"></div>
										<figcaption>
											<div class="caption-text">
												<?php if ( isset( $title ) && $title <> '' ) { ?>
													<h3><a href="javascript:void(0)"><?php echo esc_html( $title ); ?></a></h3>
												<?php } if ( isset( $desc ) && $desc <> '' ) { ?>
													<span><?php echo esc_html( $desc ); ?></span>
												<?php } ?>
											</div>
											<?php if ( isset( $vedio_url[$counter] ) && $vedio_url[$counter] <> '' ) { ?>
												<a href="<?php echo esc_url( $vedio_url[$counter] ); ?>"  class="btn various"><i class="icon- icon-play3"></i></a>
											<?php } else {
												?>
												<a href="<?php echo esc_url( $full_frame_image_src ); ?>" class="btn various"><i class="icon-plus"></i></a>
												<?php }
												?>
										</figcaption>
									</figure>
								</div>
							</div>
						</div>

						<?php
					}
					$counter ++;
				}
			}
			wp_reset_postdata();
			echo '</div>';
			?>
			<script>
				$(document).ready(function () {
					if (jQuery(".video-grid").length != '') {
						jQuery('.video-grid a.various').addClass("fancybox iframe");
						jQuery('.video-grid a.various').addClass("fancybox-media");
						jQuery('.video-grid a.various').removeClass("fancybox.iframe");
						jQuery('.fancybox-media').fancybox({
							openEffect: 'none',
							closeEffect: 'none',
							showNavArrows: true,
							helpers: {
								media: {}
							}
						});
					}
				});

			</script>

			<?php
		}
		$html = ob_get_clean();
		return $html;
	}

	if ( function_exists( 'mashup_var_short_code' ) ) {
		mashup_var_short_code( 'cs_gallery', 'mashup_var_gallery_data' );
	}
}
