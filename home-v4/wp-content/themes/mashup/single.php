<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mashup
 */
mashup_post_views_count(get_the_ID());
get_header();
$mashup_var_options = MASHUP_VAR_GLOBALS()->theme_options();
?>
<div class="main-section">
	<?php
	while ( have_posts() ) : the_post();
		get_template_part('template-parts/blog-detail/default_view', get_post_format());
	endwhile; // End of the loop.
	?>
</div>
<?php
get_footer();
