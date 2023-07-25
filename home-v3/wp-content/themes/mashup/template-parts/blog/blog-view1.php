<?php
/**
 * @ Start front end Blog list view 
 *
 *
 */
global $mashup_var_static_text;
$mashup_blog_vars = array('col_class', 'args', 'post', 'mashup_blog_cats', 'rand_num', 'mashup_blog_description', 'mashup_blog_excerpt', 'mashup_blog_posts_title_length_var', 'mashup_notification', 'wp_query', 'mashup_blog_element_title');
$mashup_blog_vars = MASHUP_VAR_GLOBALS()->globalizing($mashup_blog_vars);
extract($mashup_blog_vars);
$col_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
$post_id = $post->ID;
extract($wp_query->query_vars);
$mashup_blog_element_title = isset($mashup_blog_element_title) ? $mashup_blog_element_title : '';
?>
<div class="row">
    <div id="load-list-<?php echo absint($rand_num) ?>" class="mashup-dev-blog-list" data-ajax-url="<?php echo esc_url(admin_url('admin-ajax.php')) ?>">
	<?php
	$wpb_all_query = new WP_Query($args);
	if ($wpb_all_query->have_posts()) :
	    $cat = '';
	    while ($wpb_all_query->have_posts()) : $wpb_all_query->the_post();
		global $post;
		$post_id = $post->ID;
		$mashup_post_like_counter = get_post_meta($post_id, 'mashup_post_like_counter', true);
		$comments_count = wp_count_comments($post_id);
		$total_comments = $comments_count->total_comments;
		$cat = get_the_category($post_id);
		?>

		<div class="<?php echo esc_html($col_class); ?>">
		    <div class="blog-post">
			<div class="img-holder">
			    <?php the_post_thumbnail('mashup_media_6'); ?>
			</div>
			<div class="text-holder">
			    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo esc_html(mashup_get_post_excerpt(get_the_title(), $mashup_blog_posts_title_length_var)); ?></a></h2>
			    <div class="post-option">
				<?php if ($cat) { ?>
	    			<ul class="post-catagories">
					<?php
					$total = count($cat);
					$count = 0;
					foreach ($cat as $key => $value) {
					    $cat_meta = get_term_meta($value->term_id, 'cat_meta_data', true);
					    $cat_id = $value->term_id;
					    $cat_link = get_term_link($cat_id);
					    
					    echo '<li><a href="' . esc_url( $cat_link ) . '">';
					    if ($count == 0) {
						echo '<i class="icon-music3"></i>';
					    }
					    echo esc_html($value->name) . '</a></li>';
					    $count ++;
					    if ($count < $total) {
						echo '<li>/ </li>';
					    }
					}
					?>
	    			</ul>
				<?php } ?>

				<span class="post-date">
				    <i class=" icon-date_range"></i><?php echo get_the_date(); ?></span>
				<span class="post-comment">
				    <?php $comment_icon = '<i class=" icon-comment-o"></i>'; ?>
				    <?php comments_popup_link($comment_icon . '0', $comment_icon . '1', $comment_icon . '%', 'comments-link', mashup_var_theme_text_srt('mashup_var_comments_off')); ?></span>
			    </div>
			    <?php if ($mashup_blog_description == 'yes') { ?>
	    		    <p> <?php echo esc_html(mashup_get_excerpt($mashup_blog_excerpt, '', '')); ?></p>
	    		    <a class="btn-read-more" href="<?php the_permalink(); ?>"><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_readmore_text_capital')); ?><i class=" icon-arrow-right3"></i></a>
				<?php } ?>
			</div>
		    </div>
		</div>
		<?php
	    endwhile;
	    wp_reset_postdata();
	else :
	    ?>	
    	<p><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_sorry_no_post')); ?></p>
	<?php
	endif;
	?>
    </div>
</div>