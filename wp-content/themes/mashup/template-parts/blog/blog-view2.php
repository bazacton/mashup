<?php
/**
 * @ Start front end Blog list view 
 *
 *
 */
global $mashup_var_static_text;
$mashup_blog_vars = array('col_class', 'args', 'post', 'rand_num', 'mashup_blog_cats', 'mashup_blog_description', 'mashup_blog_excerpt', 'mashup_blog_posts_title_length_var', 'mashup_notification', 'wp_query', 'mashup_blog_element_title');
$mashup_blog_vars = MASHUP_VAR_GLOBALS()->globalizing($mashup_blog_vars);
extract($mashup_blog_vars);
$post_id = $post->ID;
extract($wp_query->query_vars);
$mashup_blog_element_title = isset($mashup_blog_element_title) ? $mashup_blog_element_title : '';
$wpb_all_query = new WP_Query($args);
?>
<ul id="load-list-<?php echo absint($rand_num) ?>" class="blog blog-masonry grid mashup-dev-blog-list" data-ajax-url="<?php echo esc_url(admin_url('admin-ajax.php')) ?>">
    <?php
    if ($wpb_all_query->have_posts()) :
	while ($wpb_all_query->have_posts()) : $wpb_all_query->the_post();
	    global $post;
	    $post_id = $post->ID;
	    $mashup_post_like_counter = get_post_meta($post_id, 'mashup_post_like_counter', true);
	    $comments_count = wp_count_comments($post_id);
	    $total_comments = $comments_count->total_comments;
	    if (is_sticky($post_id)) {
		?>
	        <li class="grid-item col-lg-8 col-md-8 col-sm-12 col-xs-12">
	    	<div class="blog-post featured">
	    	    <div class="img-holder">
	    		<figure>
	    		    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
	    		    <figcaption></figcaption>
	    		</figure>
	    	    </div>
	    	    <div class="text-holder">
	    		<span class="text-color"><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_blog_featured_post')); ?></span>
	    		<div class="blog-holder">
	    		    <div class="section-title left">
	    			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo esc_html(mashup_get_post_excerpt(get_the_title(), $mashup_blog_posts_title_length_var)); ?></a></h2>
	    			<em></em>
	    		    </div>
				<?php if ($mashup_blog_description == 'yes') { ?>
				    <p> <?php echo esc_html(mashup_get_excerpt('85', '', '')); ?></p>
				    <a class="btn-read-mone bgcolor" href="<?php the_permalink(); ?>"><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_readmore_text_capital')); ?></a>
				<?php } ?>

	    		</div>
	    	    </div>
	    	</div>    
	        </li>
		<?php
	    } else {
		?>
	        <li class="grid-item col-lg-4 col-md-4 col-sm-6 col-xs-12">
	    	<div class="blog-post">
	    	    <div class="img-holder">
	    		<figure>
	    		    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
	    		    <figcaption></figcaption>
	    		</figure>
	    	    </div>
	    	    <div class="text-holder">
	    		<div class="section-title left">
	    		    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo esc_html(mashup_get_post_excerpt(get_the_title(), $mashup_blog_posts_title_length_var)); ?></a></h2>
	    		    <em></em>
	    		</div>
			    <?php if ($mashup_blog_description == 'yes') { ?>
				<p> <?php echo esc_html(mashup_get_excerpt($mashup_blog_excerpt, '', '')); ?></p>
				<a class="btn-read-mone bgcolor" href="<?php the_permalink(); ?>"><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_readmore_text_capital')); ?></a>
				<?php } ?>
	    	    </div>
	    	</div>        
	        </li>

		<?php
	    }
	endwhile;
	wp_reset_postdata();
    else :
	?>	
        <p><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_sorry_no_post')); ?></p>
    <?php endif; ?>
</ul>