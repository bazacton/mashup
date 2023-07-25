<?php
/**
 * @  Blog html form for page builder Frontend side
 *
 *
 */
if (!function_exists('mashup_blog_shortcode')) {

    function mashup_blog_shortcode($atts) {
	global $mashup_blog_size, $post, $col_class, $rand_num, $mashup_blog_element_title, $wpdb, $blog_pagination, $mashup_blog_num_post, $mashup_counter_node, $mashup_column_atts, $mashup_blog_cats, $mashup_blog_description, $mashup_blog_filterable, $mashup_blog_excerpt, $mashup_blog_posts_title_length_var, $post_thumb_view, $mashup_blog_section_title, $args, $mashup_blog_orderby, $orderby;

	$defaults = array(
	    'mashup_blog_element_title' => '',
	    'mashup_blog_view' => '',
	    'mashup_blog_cat' => '',
	    'mashup_blog_orderby' => 'DESC',
	    'orderby' => 'ID',
	    'mashup_blog_order_by' => 'ID', // This is used for ratings sorting
	    'mashup_blog_order_by_dir' => 'DESC', // This is used for ratings sorting
	    'mashup_blog_description' => 'yes',
	    'mashup_blog_filterable' => '',
	    'mashup_blog_excerpt' => '255',
	    'mashup_blog_posts_title_length' => '',
	    'mashup_blog_num_post' => '10',
	    'blog_pagination' => '',
	    'mashup_blog_class' => '',
	    'mashup_blog_size' => '',
	    'mashup_var_blog_sub_title' => '',
	    'mashup_var_blog_align' => '',
	);

	extract(shortcode_atts($defaults, $atts));
	$mashup_blog_posts_title_length_var = '';
	if (!is_numeric($mashup_blog_posts_title_length) || $mashup_blog_posts_title_length == '') {
	    $mashup_blog_posts_title_length_var = '100';
	} else {
	    $mashup_blog_posts_title_length_var = $mashup_blog_posts_title_length;
	}
	$buildere_data = get_post_meta(get_the_ID(), 'mashup_page_builder', true);
	$rand_num = rand(1000000, 9999999);
	$mashup_blog_cats = $mashup_blog_cat;
	static $mashup_var_custom_counter;
	if (!isset($mashup_var_custom_counter)) {
	    $mashup_var_custom_counter = 1;
	} else {
	    $mashup_var_custom_counter ++;
	}
	$col_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
	$mashup_var_page = isset($_GET['post_paging_' . $mashup_var_custom_counter]) ? $_GET['post_paging_' . $mashup_var_custom_counter] : '1';
	if (isset($mashup_blog_size) && $mashup_blog_size != '') {
	    $number_col = 12 / $mashup_blog_size;
	    $number_col_sm = 12;
	    $number_col_xs = 12;
	    if ($number_col == 2) {
		$number_col_sm = 4;
		$number_col_xs = 6;
	    }
	    if ($number_col == 3) {
		$number_col_sm = 6;
		$number_col_xs = 12;
	    }
	    if ($number_col == 4) {
		$number_col_sm = 6;
		$number_col_xs = 12;
	    }
	    if ($number_col == 6) {
		$number_col_sm = 12;
		$number_col_xs = 12;
	    }
	    $col_class = 'col-lg-' . $number_col . ' col-md-' . $number_col . ' col-sm-' . $number_col_sm . ' col-xs-' . $number_col_xs . '';
	}
	$mashup_dataObject = get_post_meta($post->ID, 'mashup_full_data');
	$mashup_sidebarLayout = '';
	$section_mashup_layout = '';
	$pageSidebar = false;
	$box_col_class = 'col-md-3';
	if (isset($mashup_dataObject['mashup_page_layout'])) {
	    $mashup_sidebarLayout = $mashup_dataObject['mashup_page_layout'];
	}
	if (isset($mashup_column_atts->mashup_layout)) {
	    $section_mashup_layout = $mashup_column_atts->mashup_layout;
	    if ($section_mashup_layout == 'left' || $section_mashup_layout == 'right') {
		$pageSidebar = true;
	    }
	}
	if ($mashup_sidebarLayout == 'left' || $mashup_sidebarLayout == 'right') {
	    $pageSidebar = true;
	}
	if ($pageSidebar == true) {
	    $box_col_class = 'col-md-4';
	}
	if ((isset($mashup_dataObject['mashup_page_layout']) && $mashup_dataObject['mashup_page_layout'] <> '' and $mashup_dataObject['mashup_page_layout'] <> "none") || $pageSidebar == true) {
	    $mashup_blog_grid_layout = 'col-md-4';
	} else {
	    $mashup_blog_grid_layout = 'col-md-3';
	}
	$CustomId = '';
	if (isset($mashup_blog_class) && $mashup_blog_class) {
	    $CustomId = 'id="' . $mashup_blog_class . '"';
	}
	$owlcount = rand(40, 9999999);
	$mashup_counter_node ++;
	ob_start();
	$filter_category = '';
	$filter_tag = '';
	$author_filter = '';
	if (isset($_GET['filter_category']) && $_GET['filter_category'] <> '' && $_GET['filter_category'] <> '0') {
	    $filter_category = $_GET['filter_category'];
	}
	if (isset($_GET['sort']) and $_GET['sort'] == 'asc') {
	    $mashup_blog_orderby = 'ASC';
	} else {
	    $mashup_blog_orderby = $mashup_blog_orderby;
	}
	if (isset($_GET['sort']) and $_GET['sort'] == 'alphabetical') {
	    $orderby = 'title';
	    $mashup_blog_orderby = 'ASC';
	} else if (isset($mashup_blog_order_by)) {
	    $orderby = $mashup_blog_order_by;
	    $mashup_blog_orderby = $mashup_blog_order_by_dir;
	} else {
	    $orderby = 'meta_value';
	}
	if (empty($_GET['page_id_all'])) {
	    $_GET['page_id_all'] = 1;
	}
	$mashup_blog_num_post = $mashup_blog_num_post ? $mashup_blog_num_post : '-1';

	$args = array('posts_per_page' => "-1", 'post_type' => 'post', 'order' => $mashup_blog_orderby, 'orderby' => $orderby, 'post_status' => 'publish', 'ignore_sticky_posts' => 1);
	if (isset($mashup_blog_cat) && $mashup_blog_cat <> '' && $mashup_blog_cat <> '0') {
	    $blog_category_array = array(
		'tax_query' => array(
		    array(
			'taxonomy' => 'category',
			'field' => 'slug',
			'terms' => explode(',', $mashup_blog_cat),
		    )
		)
	    );
	    $args = array_merge($args, $blog_category_array);
	}

	$query = new WP_Query($args);
	$count_post = $query->post_count;
	wp_reset_postdata();
	$mashup_blog_num_post = $mashup_blog_num_post ? $mashup_blog_num_post : '-1';
	$args = array('posts_per_page' => "$mashup_blog_num_post", 'post_type' => 'post', 'paged' => $mashup_var_page, 'order' => $mashup_blog_orderby, 'orderby' => $orderby, 'post_status' => 'publish', 'ignore_sticky_posts' => 1);
	if (isset($mashup_blog_cat) && $mashup_blog_cat <> '' && $mashup_blog_cat <> '0') {
	    $blog_category_array = array(
		'tax_query' => array(
		    array(
			'taxonomy' => 'category',
			'field' => 'slug',
			'terms' => explode(',', $mashup_blog_cat),
		    )
		)
	    );
	    $args = array_merge($args, $blog_category_array);
	}

	$element_title = '';
	if (isset($mashup_blog_element_title) && trim($mashup_blog_element_title) <> '' || isset($mashup_var_blog_sub_title) && $mashup_var_blog_sub_title <> '') {
	    $element_title .= '<div class="element-title ' . $mashup_var_blog_align . '">';
	    if (isset($mashup_blog_element_title) && $mashup_blog_element_title <> '') {
		$element_title .= '<h2>' . esc_html($mashup_blog_element_title) . '</h2>';
	    }
	    $element_title .= '<em></em>';
	    if (isset($mashup_var_blog_sub_title) && $mashup_var_blog_sub_title <> '') {
		$element_title .= '<p>' . esc_html($mashup_var_blog_sub_title) . '</p>';
	    }
	    $element_title .= '</div>';
	}
	echo mashup_allow_special_char($element_title);
	$args = apply_filters('blog_views_query', $args);
	set_query_var('args', $args);
	if ($mashup_blog_view == 'view1') {
	    echo '<div class="blog blog-list">';
	    get_template_part('template-parts/blog/blog', 'view1');
	    echo '</div>';
	} else if ($mashup_blog_view == 'view2') {
	    get_template_part('template-parts/blog/blog', 'view2');
	}
	$mashup_var_post_counts = $query->post_count;
	$mashup_var_page = 'post_paging_' . $mashup_var_custom_counter;
	if ($blog_pagination == "yes" && $count_post > $mashup_blog_num_post && $mashup_blog_num_post > 0) {
	    $total_pages = '';
	    $total_pages = ceil($mashup_var_post_counts / $mashup_blog_num_post);
	    echo '<nav>';
	    echo '<div class="row">';
	    mashup_var_get_pagination($total_pages, isset($_GET[$mashup_var_page]) ? $_GET[$mashup_var_page] : 1, $mashup_var_page);
	    echo '</div>';
	    echo '</nav>';
	}
	if ($count_post > 0 && $count_post > $mashup_blog_num_post) {
	    $total_pages = ceil($count_post / $mashup_blog_num_post);
	}
	if (isset($total_pages) && $total_pages > 1 && $blog_pagination == 'load_more') {
	    $blog_category_array = '';
	    if (isset($mashup_blog_cat) && $mashup_blog_cat <> '' && $mashup_blog_cat <> '0') {
		$blog_category_array = $mashup_blog_cat;
	    }
	    echo '
			<script type="text/javascript">
			var load_data_' . $rand_num . ' = {
				\'per_page\' : \'' . $mashup_blog_num_post . '\',
				\'total_pages\' : \'' . $total_pages . '\',
				\'order\' : \'' . $mashup_blog_orderby . '\',
				\'order_by\' : \'' . $orderby . '\',
				\'title_length\' : \'' . $mashup_blog_posts_title_length_var . '\',
				\'blog_description\' : \'' . $mashup_blog_description . '\',
				\'blog_excerpt\' : \'' . $mashup_blog_excerpt . '\',
				\'this_col_class\' : \'' . $col_class . '\',
				\'blog_view\' : \'' . $mashup_blog_view . '\',
				\'blog_cats\' : \'' . $blog_category_array . '\',
			};
			</script>
			<div id="load-more-' . $rand_num . '" class="load-more-holder">
				<a href="javascript:void(0);" data-id="' . $rand_num . '" data-page="1" class="load-more mashup-load-more-blogs">' . esc_html__('Load More', 'mashup') . '</a>
			</div>';
	}
	wp_reset_postdata();
	$post_data = ob_get_clean();
	return $post_data;
    }

    if (function_exists('mashup_var_short_code')) {
	mashup_var_short_code('mashup_blog', 'mashup_blog_shortcode');
    }
}
if (!function_exists('mashup_load_more_blogs')) {

    function mashup_load_more_blogs() {
	global $post;
	$html = '';
	$total_pages = isset($_POST['total_pages']) ? $_POST['total_pages'] : '';
	$page_num = isset($_POST['page_num']) ? ((int) $_POST['page_num'] + 1) : 1;
	$per_page = isset($_POST['per_page']) ? $_POST['per_page'] : '';
	$order_by = isset($_POST['order_by']) ? $_POST['order_by'] : '';
	$order = isset($_POST['order']) ? $_POST['order'] : '';
	$blog_view = isset($_POST['blog_view']) ? $_POST['blog_view'] : '';
	$blog_cats = isset($_POST['blog_cats']) ? $_POST['blog_cats'] : '';
	$blog_description = isset($_POST['blog_description']) ? $_POST['blog_description'] : '';
	$blog_excerpt = isset($_POST['blog_excerpt']) ? $_POST['blog_excerpt'] : '';
	$title_length = isset($_POST['title_length']) ? $_POST['title_length'] : '';
	$this_col_class = isset($_POST['this_col_class']) ? $_POST['this_col_class'] : '';
	$args = array('posts_per_page' => "$per_page", 'post_type' => 'post', 'paged' => $page_num, 'order' => $order, 'orderby' => $order_by, 'post_status' => 'publish', 'ignore_sticky_posts' => 1);
	if (!empty($blog_cats)) {
	    $blog_category_array = array(
		'tax_query' => array(
		    array(
			'taxonomy' => 'category',
			'field' => 'slug',
			'terms' => explode(',', $blog_cats),
		    )
		)
	    );
	    $args = array_merge($args, $blog_category_array);
	}
	$query = new WP_Query($args);
	if ($query->have_posts()) {
	    ob_start();
	    if ($blog_view == 'view1') {
		while ($query->have_posts()) : $query->the_post();
		    $post_id = $post->ID;
		    $mashup_post_like_counter = get_post_meta($post_id, 'mashup_post_like_counter', true);
		    $comments_count = wp_count_comments($post_id);
		    $total_comments = $comments_count->total_comments;
		    $cat = get_the_category($post_id);
		    ?>
		    <div class="<?php echo esc_html($this_col_class); ?>">
		        <div class="blog-post">
		    	<div class="img-holder">
		    <?php the_post_thumbnail('mashup_media_6'); ?>
		    	</div>
		    	<div class="text-holder">
		    	    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo esc_html(mashup_get_post_excerpt(get_the_title(), $title_length)); ?></a></h2>
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
						    echo '<i class="icon-music"></i>';
						}
						echo esc_html($value->name) . '</a></li>';
						$count ++;
						if ($count < $total) {
						    echo esc_html__('/ ', 'mashup');
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
				<?php if ($blog_description == 'yes') { ?>
				    <p> <?php echo esc_html(mashup_get_excerpt($blog_excerpt, '', '')); ?></p>
				    <a class="btn-read-more" href="<?php the_permalink(); ?>"><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_readmore_text_capital')); ?><i class=" icon-arrow-right22"></i></a>
		    <?php } ?>
		    	</div>
		        </div>
		    </div>
		    <?php
		endwhile;
	    } else if ($blog_view == 'view2') {
		while ($query->have_posts()) : $query->the_post();
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
					    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo esc_html(mashup_get_post_excerpt(get_the_title(), $title_length)); ?></a></h2>
					    <em></em>
					</div>
					<?php if ($blog_description == 'yes') { ?>
			    		<p> <?php echo esc_html(mashup_get_excerpt($blog_excerpt, '', '')); ?></p>
			    		<a class="btn-read-mone bgcolor" href="<?php the_permalink(); ?>"><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_readmore_text_capital')); ?><i class=" icon-arrow-right22"></i></a>
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
					<h2><?php echo esc_html(mashup_get_post_excerpt(get_the_title(), $title_length)); ?></h2>
					<em></em>
				    </div>
					<?php if ($blog_description == 'yes') { ?>
			    	    <p> <?php echo esc_html(mashup_get_excerpt($blog_excerpt, '', '')); ?></p>
			    	    <a class="btn-read-mone bgcolor" href="<?php the_permalink(); ?>"><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_readmore_text_capital')); ?><i class=" icon-arrow-right22"></i></a>
			<?php } ?>
				</div>
			    </div>        
			</li>
			<?php
		    }
		endwhile;
	    }
	    wp_reset_postdata();
	    $html = ob_get_clean();
	}
	echo json_encode(array('list' => $html, 'page_num' => $page_num));
	die;
    }

    add_action('wp_ajax_mashup_load_more_blogs', 'mashup_load_more_blogs');
    add_action('wp_ajax_nopriv_mashup_load_more_blogs', 'mashup_load_more_blogs');
}

/**
 * @ cs get categories all post
 *
 *
 */
if (!function_exists('mashup_get_categories')) {

    function mashup_get_categories($mashup_blog_cat) {
	global $post, $wpdb;
	if (isset($mashup_blog_cat) && $mashup_blog_cat != '' && $mashup_blog_cat != '0') {
	    $row_cat = $wpdb->get_row($wpdb->prepare("SELECT * from $wpdb->terms WHERE slug = %s", $mashup_blog_cat));
	    echo '<a class="cs-color" href="' . esc_url(home_url('/')) . '?cat=' . $row_cat->term_id . '">' . $row_cat->name . '</a>';
	} else {
	    $before_cat = "";
	    $categories_list = get_the_term_list(get_the_id(), 'category', $before_cat, ' ', '');
	    if ($categories_list) {
		printf('%1$s', $categories_list);
	    }
	    // End if Categories 
	}
    }

}

if (!function_exists('mashup_get_single_category')) {

    function mashup_get_single_category($post_id) {
	$categories_list = get_the_category($post_id);
	if (isset($categories_list[0]) && is_object($categories_list[0])) {
	    $cat_id = $categories_list[0]->term_id;
	    $cat_name = $categories_list[0]->name;
	    $cat_link = get_term_link($cat_id);
	    $cat_meta = get_term_meta($cat_id, 'cat_meta_data', true);
	    
	    return '<a href="' . esc_url( $cat_link ) . '" class="category">' . esc_html( $cat_name ) . '</a>';
	}
    }

}
/**
 * @ Post Likes Counter
 *
 *
 */
if (!function_exists('mashup_var_page_builder_post_likes_count')) {

    function mashup_var_page_builder_post_likes_count() {
	$mashup_like_counter = get_post_meta($_POST['post_id'], "mashup_post_like_counter", true);
	if (!isset($_COOKIE["mashup_post_like_counter" . $_POST['post_id']])) {
	    setcookie("mashup_post_like_counter" . $_POST['post_id'], 'true', time() + 86400, '/');
	    update_post_meta($_POST['post_id'], 'mashup_post_like_counter', $mashup_like_counter + 1);
	}
	$mashup_like_counter = get_post_meta($_POST['post_id'], "mashup_post_like_counter", true);
	if (!isset($mashup_like_counter) or empty($mashup_like_counter)) {
	    $mashup_like_counter = 0;
	}
	echo mashup_var_special_char($mashup_like_counter);
	die(0);
    }

    add_action('wp_ajax_mashup_var_page_builder_post_likes_count', 'mashup_var_page_builder_post_likes_count');
    add_action('wp_ajax_nopriv_mashup_var_page_builder_post_likes_count', 'mashup_var_page_builder_post_likes_count');
}