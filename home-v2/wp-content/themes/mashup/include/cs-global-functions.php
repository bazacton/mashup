<?php
/**
 * File Type: Global Varibles Functions
 */
if (!class_exists('mashup_global_functions')) {

    class mashup_global_functions {

	// The single instance of the class
	protected static $_instance = null;

	public function __construct() {
	    // Do something...
	}

	public static function instance() {
	    if (is_null(self::$_instance)) {
		self::$_instance = new self();
	    }
	    return self::$_instance;
	}

	public function theme_options() {
	    global $mashup_var_options;

	    return $mashup_var_options;
	}

	public function globalizing($var_array = array()) {
	    if (is_array($var_array) && sizeof($var_array) > 0) {
		$return_array = array();
		foreach ($var_array as $value) {
		    global $$value;
		    $return_array[$value] = $$value;
		}
		return $return_array;
	    }
	}

    }

    function MASHUP_VAR_GLOBALS() {
	return mashup_global_functions::instance();
    }

    $GLOBALS['mashup_global_functions'] = MASHUP_VAR_GLOBALS();
}

//=====================================================================
//  Post Slick Detail function
//=====================================================================

if (!function_exists('mashup_post_slick_detail')) {

    function mashup_post_slick_detail($width, $height, $postid, $view, $return_li = 1) {
	global $post, $mashup_node, $mashup_options, $mashup_counter_node;
	$mashup_post_counter = rand(40, 9999999);
	$mashup_counter_node ++;

	if ($view == 'post-list') {
	    $viewMeta = 'mashup_post_list_gallery';
	} else {
	    $viewMeta = $view;
	}
	$mashup_meta_slider_options = get_post_meta("$postid", $viewMeta, true);
	$totaImages = '';
	?>
	<?php
	$mashup_counter = 1;
	if ($view == 'post') {
	    $sliderData = get_post_meta($post->ID, 'mashup_post_detail_gallery_url', true);
	    $totaImages = count($sliderData);
	} else if ($view == 'post-list') {
	    $sliderData = get_post_meta($post->ID, 'mashup_post_list_gallery_url', true);
	    $totaImages = count($sliderData);
	} else {
	    $sliderData = get_post_meta($post->ID, 'mashup_post_list_gallery_url', true);
	    $totaImages = count($sliderData);
	}
	if (is_array($sliderData)) {
	    asort($sliderData);
	    foreach ($sliderData as $as_node) {
		$as_node = mashup_attachment_image_id($as_node);
		$image_url = mashup_attachment_image_src((int) $as_node, $width, $height);
		echo ($return_li == 0) ? '' : '<li>';
		echo '<figure>
		<img src="' . esc_url($image_url) . '" alt=""></figure>';
		if (isset($as_node['title']) && $as_node['title'] != '') {
		    ?>         
		    <?php
		}
		echo ($return_li == 0) ? '' : '</li>';
		?>

		<?php
		$mashup_counter ++;
	    }
	}
    }

}


if (!function_exists('mashup_post_detail')) {

    function mashup_post_detail($width, $height, $postid, $view) {
	global $post, $mashup_node, $mashup_options, $mashup_counter_node;
	$mashup_post_counter = rand(40, 9999999);
	$mashup_counter_node ++;

	if ($view == 'post-list') {
	    $viewMeta = 'mashup_post_list_gallery';
	} else {
	    $viewMeta = $view;
	}
	$mashup_meta_slider_options = get_post_meta("$postid", $viewMeta, true);
	$totaImages = '';

	$mashup_counter = 1;

	$sliderData = get_post_meta($post->ID, 'mashup_post_detail_gallery_url', true);
	$totaImages = count($sliderData);

	asort($sliderData);
	foreach ($sliderData as $as_node) {
	    $as_node = mashup_attachment_image_id($as_node);
	    $image_url = mashup_attachment_image_src((int) $as_node, $width, $height);

	    echo ' <li><figure><img src="' . esc_url($image_url) . '" alt=""></figure></li>';
	    $mashup_counter ++;
	}
    }

}
/**
 * Start filter thumbnail function
 */
if (!function_exists('mashup_remove_thumbnail_dimensions')) {
    add_filter('post_thumbnail_html', 'mashup_remove_thumbnail_dimensions', 10, 3);

    function mashup_remove_thumbnail_dimensions($html, $post_id, $post_image_id) {
	$html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
	return $html;
    }

}
/**
 * Start Function Related posts
 */
if (!function_exists('mashup_related_posts')) {

    function mashup_related_posts($number_post = '-1') {
	global $post, $mashup_var_static_text;
	// check related posts on/off.
	$rel_posts = get_post_meta($post->ID, 'mashup_var_related_post', true);
	if ('on' === $rel_posts) {
	    $post_cats = wp_get_post_categories($post->ID, array('fields' => 'ids'));
	    $args = array(
		'category__in' => $post_cats,
		'posts_per_page' => $number_post,
		'post__not_in' => array($post->ID),
	    );
	    $rel_qry = new WP_Query($args);
	    if ($rel_qry->have_posts()) :
		?>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		    <div class="section-title">
			<h2><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_related_posts')); ?></h2>
		    </div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		    <div class="row">
			<?php
			while ($rel_qry->have_posts()) : $rel_qry->the_post();
			    global $post;
			    $thumb_id = get_post_thumbnail_id();
			    if ($thumb_id) :
				$post_cats = wp_get_post_categories(get_the_ID(), array('fields' => 'all'));
				$image = wp_get_attachment_image_src($thumb_id, 'mashup_media_6');
				$image_alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
				$mashup_post_like_counter = get_post_meta($post->ID, 'mashup_post_like_counter', true);
				?>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				    <div class="blog blog-modern scrollingeffect fadeInUp">
					<div class="img-holder">
					    <figure><a href="<?php echo esc_url(get_permalink()); ?>"><img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_html($image_alt); ?>" /></a>
						<?php if ($post_cats) { ?>
			    			<figcaption>
							<?php
							$space = '';
							foreach ($post_cats as $post_cat) :
							    ?>
							    <?php echo esc_attr($space); ?>
							    <a href="<?php echo esc_url(get_category_link($post_cat->term_id)); ?>"><?php echo esc_attr($post_cat->name); ?></a>
							    <?php $space = ' '; ?>
							<?php endforeach; ?>
			    			</figcaption>
						<?php } ?>
					    </figure>
					</div>
					<div class="text-holder">
						<h5><a href="<?php echo esc_url(get_permalink()); ?>" title="<?php echo get_the_title();?>" rel="bookmark"> <?php echo mashup_get_post_excerpt(get_the_title(), 4 );?></a></h5>
					    <div class="post-option"> <span></span> </div>
					    <ul class="post-option">
						<li class="post-date"><a href="<?php echo esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))); ?>"><?php echo get_the_date('F j'); ?></a></li>
						<?php
						if (!isset($mashup_post_like_counter) or empty($mashup_post_like_counter)) {
						    $mashup_post_like_counter = 0;
						}
						if ('true' === mashup_get_cookie('mashup_post_like_counter' . $post->ID)) {
						    echo '<li class="post-like liked"><a href="javascript:void(0)">' . esc_html($mashup_post_like_counter) . '</a></li>';
						} else {
						    ?>
			    			<li class="post-like">
			    			    <a href="javascript:void(0)" id="post_likes<?php echo esc_html($post->ID); ?>" onclick="mashup_post_likes_count('<?php echo esc_url(admin_url('admin-ajax.php')); ?>', '<?php echo esc_html($post->ID) ?>', 'blog_views', this)"><?php echo esc_html(absint($mashup_post_like_counter)); ?></a>
			    			</li>
						<?php } ?>
						<li class="post-comments"><?php comments_popup_link('0', '1', '%', 'comments-link', mashup_var_theme_text_srt('mashup_var_comments_off')); ?></li>
					    </ul>
					</div>
				    </div>
				</div>
			    <?php endif; ?>
			<?php endwhile; ?>
		    </div>
		</div>
		<?php
	    endif;
	    wp_reset_query();
	}
    }

}
/**
 * End Function Related Cars
 */
