<?php
/**
 * Template part for displaying post detail view 1.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mashup
 */
 global $post;
$mashup_page_sidebar_right = '';
$mashup_page_sidebar_left = '';
$mashup_var_layout = '';
$left_sidebar_flag = false;
$right_sidebar_flag = false;
$image_url = mashup_get_post_img_src($post->ID, 960, 540);
$mashup_section_bg = ( '' !== $image_url ) ? esc_url($image_url) : '';
$mashup_var_layout = get_post_meta($post->ID, 'mashup_var_page_layout', true);
$mashup_var_post_social_sharing = get_post_meta($post->ID, 'mashup_var_post_social_sharing', true);
$mashup_var_post_tags_show = get_post_meta($post->ID, 'mashup_var_post_tags_show', true);
$mashup_var_feature_image = get_post_meta($post->ID, 'mashup_var_feature_image', true);
$mashup_var_article_banner = get_post_meta($post->ID, 'mashup_var_article_banner', true);
$mashup_var_post_about_author_show = get_post_meta($post->ID, 'mashup_var_post_about_author_show', true);
$mashup_sidebar_right = get_post_meta($post->ID, 'mashup_var_page_sidebar_right', true);
$mashup_sidebar_left = get_post_meta($post->ID, 'mashup_var_page_sidebar_left', true);
$mashup_views_counter = get_post_meta($post->ID, 'mashup_post_views_counter', true);
$mashup_var_author_id = get_post_field('post_author', $post->ID);
$mashup_var_post_format = get_post_meta($post->ID, 'mashup_var_post_format', true);
$rating_template = get_post_meta($post->ID, 'selected_rating_template', true);
if ('left' === $mashup_var_layout) {
    $mashup_var_layout = 'post-content col-lg-8 col-md-8 col-sm-12 col-xs-12';
    $left_sidebar_flag = true;
} elseif ('right' === $mashup_var_layout) {
    $mashup_var_layout = 'post-content col-lg-8 col-md-8 col-sm-12 col-xs-12';
    $right_sidebar_flag = true;
} else if (is_active_sidebar('sidebar-1')) {
    $mashup_var_layout = 'post-content col-lg-8 col-md-8 col-sm-12 col-xs-12';
} else {
    $mashup_var_layout = 'post-content-fullwidth col-lg-12 col-md-12 col-sm-12 col-xs-12';
}
// plugin active or not 
?>
<div class="page-section" >
    <div class="container">
        <div class="row">
	    <?php if (true === $left_sidebar_flag) { ?>
    	    <div class="page-sidebar col-lg-4 col-md-4 col-sm-12 col-xs-12">
		    <?php
		    if (is_active_sidebar(mashup_get_sidebar_id($mashup_sidebar_left))) {
			if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($mashup_sidebar_left)) :
			    echo '';
			endif;
		    }
		    ?>
    	    </div>
	    <?php } ?>
            <div class="<?php echo esc_html($mashup_var_layout); ?>">
                <div class="blog blog-detail">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="main-post">
				<?php
				if (isset($mashup_var_post_format) && '' !== $mashup_var_post_format) {
				    get_template_part('template-parts/blog-detail/formats/' . $mashup_var_post_format);
				} else {
				    ?>
    				<div class="media-holder">
    				    <figure><?php the_post_thumbnail('mashup_media_9') ?></figure>
    				</div>
				    <?php
				}
				?>
                            </div>
                        </div>
			<?php if (isset($mashup_var_post_social_sharing) && 'on' === $mashup_var_post_social_sharing) { ?>
    			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    			    <div class="share-post">
    				<ul>
					<?php echo esc_html(mashup_social_share_blog('', 'yes')); ?>
    				</ul>
    			    </div>
    			</div>
			<?php } ?>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="rich-editor-text">
				<?php the_content(); ?>
				<?php wp_link_pages(array('before' => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'mashup') . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>')); ?>

                            </div>
                        </div>
			<?php
			if (comments_open() || get_comments_number()) :
			    comments_template();
			endif;
			?>
                    </div>
                </div>
            </div>
	    <?php
	    if (true === $right_sidebar_flag) {
		if (is_active_sidebar(mashup_get_sidebar_id($mashup_sidebar_right))) {
		    ?>
		    <div class="page-sidebar col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<?php
			if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($mashup_sidebar_right)) : endif;
			?>
		    </div>
		    <?php
		}
	    }
	    if (is_active_sidebar('sidebar-1')) {
		?>
    	    <div class="page-sidebar col-lg-4 col-md-4 col-sm-12 col-xs-12">
		    <?php
		    if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-1')) : endif;
		    ?>
    	    </div>
		<?php
	    }
	    ?>
        </div>
    </div>
</div>