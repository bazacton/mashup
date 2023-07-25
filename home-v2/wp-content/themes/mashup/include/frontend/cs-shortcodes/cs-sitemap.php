<?php
/**
 * @Spacer html form for page builder
 */
if ( !function_exists( 'mashup_sitemap' ) ) {

	function mashup_sitemap( $atts, $content = "" ) {
		global $mashup_border, $mashup_var_plugin_options, $mashup_var_static_text;
		$strings = new mashup_theme_all_strings;
		$strings->mashup_theme_option_strings();
		$mashup_search_result_page = isset( $mashup_var_plugin_options['mashup_search_result_page'] ) ? $mashup_var_plugin_options['mashup_search_result_page'] : '';

		$defaults = array( 'mashup_sitemap_section_title' => '', 'mashup_var_sitemap_sub_title' => '', 'mashup_var_sitemap_align' => '', );
		extract( shortcode_atts( $defaults, $atts ) );

		$mashup_sitemap_section_title = $mashup_sitemap_section_title ? $mashup_sitemap_section_title : '';
		$mashup_var_sitemap_sub_title = $mashup_var_sitemap_sub_title ? $mashup_var_sitemap_sub_title : '';
		$mashup_var_sitemap_align = $mashup_var_sitemap_align ? $mashup_var_sitemap_align : '';
		ob_start();
		?>
		<div class="row">
			<div class="sitemap-links">	
				<?php if ( (isset( $mashup_sitemap_section_title ) && $mashup_sitemap_section_title != '') || (isset( $mashup_var_sitemap_sub_title ) && $mashup_var_sitemap_sub_title != '' )) { ?>
					<div class="element-title col-md-12  <?php echo esc_html( $mashup_var_sitemap_align ); ?>">
						<?php if ( isset( $mashup_sitemap_section_title ) && $mashup_sitemap_section_title != '' ) { ?>
							<h2><?php echo esc_html( $mashup_sitemap_section_title ); ?></h2>
						<?php } ?>
						<em></em>
						<?php if ( isset( $mashup_var_sitemap_sub_title ) && $mashup_var_sitemap_sub_title <> '' ) { ?>
							<p><?php echo esc_html( $mashup_var_sitemap_sub_title ); ?></p>
						<?php } ?>
					</div> 
				<?php } ?>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="site-maps-links">
						<h3><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_pages' ) ); ?></h3>
						<ul>
							<?php
							$args = array(
								'posts_per_page' => "-1",
								'post_type' => 'page',
								'order' => 'ASC',
								'post_status' => 'publish',
							);
							$query = new WP_Query( $args );
							$post_count = $query->post_count;
							if ( $query->have_posts() ) {
								while ( $query->have_posts() ) : $query->the_post();
									?>
									<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
									<?php
								endwhile;
							}
							wp_reset_postdata();
							?>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="site-maps-links">
						<h4><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_posts' ) ); ?></h4>
						<ul>
							<?php
							$args = array(
								'posts_per_page' => "-1",
								'post_type' => 'post',
								'order' => 'ASC',
								'post_status' => 'publish',
							);
							$query = new WP_Query( $args );
							$post_count = $query->post_count;
							if ( $query->have_posts() ) {
								while ( $query->have_posts() ) : $query->the_post();
									?>
									<li><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 3, '...' ); ?></a></li>
									<?php
								endwhile;
							}
							wp_reset_postdata();
							?>
						</ul>
					</div>	
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="site-maps-links">
						<h4><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_categories' ) ); ?></h4>
						<ul>
							<?php
							$args = array(
								'show_option_all' => '',
								'order' => 'ASC',
								'post_type' => 'post',
								'order' => 'ASC',
								'style' => 'list',
								'title_li' => '',
								'taxonomy' => 'category'
							);

							wp_list_categories( $args );
							?>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="site-maps-links">
						<h4><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_tag' ) ); ?></h4>
						<ul>
							<?php
							$tags = get_tags( array( 'order' => 'ASC', 'post_type' => 'post', 'order' => 'DESC' ) );
							foreach ( ( array ) $tags as $tag ) {
								?>
								<li> <?php echo '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '" rel="tag">' . $tag->name . ' (' . $tag->count . ') </a>'; ?></li>
								<?php
							}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?php
		$mashup_sitemap = ob_get_clean();
		return do_shortcode( $mashup_sitemap );
	}

	if ( function_exists( 'mashup_var_short_code' ) ) {
		mashup_var_short_code( 'mashup_sitemap', 'mashup_sitemap' );
	}
}