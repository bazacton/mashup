<?php

/**
 * Albums html form 
 * page builder to
 * Frontend side
 * 
 * @retun markup
 */
if (!function_exists('mashup_album_shortcode')) {

    function mashup_album_shortcode($atts) {
	global $mashup_album_size, $post, $col_class, $mashup_album_element_title, $wpdb, $album_pagination, $mashup_album_num_post, $mashup_column_atts, $mashup_album_cat, $mashup_album_posts_title_length_var, $mashup_var_custom_counter, $args, $mashup_album_orderby, $orderby;

	$defaults = array(
	    'mashup_album_element_title' => '',
	    'mashup_album_cat' => '',
	    'mashup_album_order_by' => 'ID',
	    'mashup_album_order_by_dir' => 'DESC',
	    'mashup_album_posts_title_length' => '',
	    'mashup_album_num_post' => '5',
	    'album_pagination' => '',
	    'mashup_album_size' => '',
	    'mashup_var_albums_sub_title' => '',
	    'mashup_var_albums_align' => '',
	);

	extract(shortcode_atts($defaults, $atts));
	$mashup_album_posts_title_length_var = '';
	if (!is_numeric($mashup_album_posts_title_length) || $mashup_album_posts_title_length == '') {
	    $mashup_album_posts_title_length_var = '100';
	} else {
	    $mashup_album_posts_title_length_var = $mashup_album_posts_title_length;
	}
	
	$rand_num = rand(1000000, 9999999);

	$col_class = 'col-lg-4 col-md-4 col-sm-12 col-xs-12';
	if (isset($mashup_album_size) && $mashup_album_size != '') {
	    $number_col = 12 / $mashup_album_size;
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

	ob_start();

	if (empty($_GET['page_id_all'])) {
	    $_GET['page_id_all'] = 1;
	}

	$mashup_album_num_post = $mashup_album_num_post > 0 ? $mashup_album_num_post : '-1';

	$args = array('posts_per_page' => "-1", 'post_type' => 'albums', 'post_status' => 'publish');

	if (isset($mashup_album_cat) && !empty($mashup_album_cat) && $mashup_album_cat != 0) {

	    $album_category_array = array(
		'tax_query' => array(
		    array(
			'taxonomy' => 'album-category',
			'field' => 'slug',
			'terms' => explode(',', $mashup_album_cat),
		    )
		)
	    );
	    $args = array_merge($args, $album_category_array);
	}

	$query = new WP_Query($args);
	$count_post = $query->post_count;
	wp_reset_postdata();
	$mashup_album_num_post = $mashup_album_num_post ? $mashup_album_num_post : '-1';

	$mashup_var_page = 1;

	$args = array('posts_per_page' => "$mashup_album_num_post", 'post_type' => 'albums', 'paged' => $mashup_var_page, 'order' => $mashup_album_order_by_dir, 'orderby' => $mashup_album_order_by, 'post_status' => 'publish');
	
	if ( isset($mashup_album_cat) && '' != $mashup_album_cat ) {

	    $album_category_array = array(
		'tax_query' => array(
		    array(
			'taxonomy' => 'album-category',
			'field' => 'slug',
			'terms' => explode(',', $mashup_album_cat),
		    )
		)
	    );
	    $args = array_merge($args, $album_category_array);
	}

	$element_title = '';

	if (isset($mashup_album_element_title) && trim($mashup_album_element_title) <> '' || isset($mashup_var_albums_sub_title) && $mashup_var_albums_sub_title <> '') {
	    $element_title .= '<div class="element-title ' . $mashup_var_albums_align . '">';
	    if (isset($mashup_album_element_title) && $mashup_album_element_title <> '') {
		$element_title .= '<h2>' . esc_html($mashup_album_element_title) . '</h2>';
	    }
	    $element_title .= '<em></em>';
	    if (isset($mashup_var_albums_sub_title) && $mashup_var_albums_sub_title <> '') {
		$element_title .= '<p>' . esc_html($mashup_var_albums_sub_title) . '</p>';
	    }
	    $element_title .= '</div>';
	}

	echo mashup_allow_special_char($element_title);

	echo '<div class="music-album row" data-ajax-url="' . esc_url(admin_url('admin-ajax.php')) . '">';

	$args = apply_filters('album_views_query', $args);
	
	set_query_var('args', $args);
	if (isset($mashup_album_view) && $mashup_album_view == 'list') {
	    include 'album-list.php';
	} else {
	    include 'album-grid.php';
	}

	if ($count_post > 0 && $count_post > $mashup_album_num_post) {
	    $total_pages = ceil($count_post / $mashup_album_num_post);
	}

	if (isset($total_pages) && $total_pages > 1 && $album_pagination == 'yes') {
	    $album_category_array = '';
	    if (isset($mashup_album_cat) && !empty($mashup_album_cat) && $mashup_album_cat != 0) {
		$album_category_array = $mashup_album_cat;
	    }
	    echo '
			<script type="text/javascript">
			var load_data_' . $rand_num . ' = {
				\'per_page\' : \'' . $mashup_album_num_post . '\',
				\'total_pages\' : \'' . $total_pages . '\',
				\'order\' : \'' . $mashup_album_order_by_dir . '\',
				\'order_by\' : \'' . $mashup_album_order_by . '\',
				\'title_length\' : \'' . $mashup_album_posts_title_length_var . '\',
				\'album_cats\' : \'' . $album_category_array . '\',
				\'this_col_class\' : \'' . $col_class . '\',
			};
			</script>
			<div id="load-more-' . $rand_num . '" class="load-more-holder">
				<a href="javascript:void(0);" data-id="' . $rand_num . '" data-page="1" class="load-more mashup-load-more">' . __('Load More', CSFRAME_DOMAIN) . '</a>
			</div>';
	}

	echo '</div>';

	wp_reset_postdata();
	$post_data = ob_get_clean();
	return $post_data;
    }

    if (function_exists('mashup_var_short_code')) {
	mashup_var_short_code('mashup_album', 'mashup_album_shortcode');
    }
}


if (!function_exists('mashup_load_more_albums')) {

    function mashup_load_more_albums() {
	global $post;
	$html = '';
	$total_pages = isset($_POST['total_pages']) ? $_POST['total_pages'] : '';
	$page_num = isset($_POST['page_num']) ? ((int) $_POST['page_num'] + 1) : 1;
	$per_page = isset($_POST['per_page']) ? $_POST['per_page'] : '';
	$order_by = isset($_POST['order_by']) ? $_POST['order_by'] : '';
	$order = isset($_POST['order']) ? $_POST['order'] : '';
	$title_length = isset($_POST['title_length']) ? $_POST['title_length'] : '';
	$album_cats = isset($_POST['album_cats']) ? $_POST['album_cats'] : '';
	$this_col_class = isset($_POST['this_col_class']) ? $_POST['this_col_class'] : '';

	$args = array('posts_per_page' => "$per_page", 'post_type' => 'albums', 'paged' => $page_num, 'order' => $order, 'orderby' => $order_by, 'post_status' => 'publish');
	if ( isset($album_cats) && '' != $album_cats ) {

	    $album_category_array = array(
		'tax_query' => array(
		    array(
			'taxonomy' => 'album-category',
			'field' => 'slug',
			'terms' => explode(',', $album_cats),
		    )
		)
	    );
	    $args = array_merge($args, $album_category_array);
	}
	$query = new WP_Query($args);
	if ($query->have_posts()) {
	    while ($query->have_posts()) : $query->the_post();
		$album_featured = get_post_meta($post->ID, 'mashup_var_album_featured', true);
		if (mashup_post_have_thumbnail($post->ID)) {
		    $alb_img = get_the_post_thumbnail($post->ID, 'mashup_media_8');
		} else {
		    $alb_img = '<img src="' . wp_mashup_framework::plugin_url('assets/images/no-image.jpg') . '" alt="" />';
		}
		$html .= '
				<li class="' . esc_html($this_col_class) . '">
					<div class="img-holder">
						<figure> 
							' . $alb_img . '
							<figcaption>';
		if ($album_featured == 'on') {
		    $html .= '<span class="album-label"><em>' . __('new', CSFRAME_DOMAIN) . '</em></span>';
		}
		$html .= mashup_album_play_track($post->ID);
		$html .= '
							</figcaption>
						</figure>
					</div>
					<div class="text-holder">
						<div class="post-title">
							<h6><a href="' . get_permalink() . '">' . wp_trim_words(get_the_title(), $title_length, '...') . '</a></h6>
						</div>
						<span class="album-tracks">' . sprintf(__('%s tracks', CSFRAME_DOMAIN), mashup_album_count_tracks($post->ID)) . '</span> 
					</div>
				</li>';
	    endwhile;
	    wp_reset_postdata();
	}
	echo json_encode(array('list' => $html, 'page_num' => $page_num));
	die;
    }

    add_action('wp_ajax_mashup_load_more_albums', 'mashup_load_more_albums');
    add_action('wp_ajax_nopriv_mashup_load_more_albums', 'mashup_load_more_albums');
}

if (!function_exists('mashup_album_count_tracks')) {

    function mashup_album_count_tracks($album_id = '') {

	$mashup_get_tracks_list = get_post_meta($album_id, 'mashup_var_alb_list_array', true);
	if (empty($mashup_get_tracks_list)) {
	    return '0';
	}
	$num_of_tracks = absint(sizeof($mashup_get_tracks_list));
	return $num_of_tracks;
    }

}

if (!function_exists('mashup_album_list_tracks')) {

    function mashup_album_list_tracks($album_id = '') {

	$html = '';
	$mashup_get_tracks_list = get_post_meta($album_id, 'mashup_var_alb_list_array', true);
	$mashup_alb_names = get_post_meta($album_id, 'mashup_var_alb_track_name_array', true);
	$mashup_alb_tracks = get_post_meta($album_id, 'mashup_var_alb_track_url_array', true);
	$num_of_tracks = absint(sizeof($mashup_get_tracks_list));

	if (is_array($mashup_get_tracks_list) && sizeof($mashup_get_tracks_list) > 0) {
	    $html .= '
			<div class="album-player mashup-dev-album-player">';
	    $track_counter = 0;
	    foreach ($mashup_get_tracks_list as $track_item) {
		$track_class = ' mashup-dev-track';
		if ($track_counter == 0) {
		    $track_class = ' mashup-dev-track mashup-dev-first-track';
		}
		$track_rand = rand(1000000, 9999999);
		if (isset($mashup_alb_tracks[$track_counter]) && $mashup_alb_tracks[$track_counter] != '') {
		    $html .= '
					<script type="text/javascript">
					jQuery(document).ready(function ($) {
						$("#jquery_jplayer_' . $track_rand . '").jPlayer({
							ready: function () {
								$(this).jPlayer("setMedia", {
									title: "' . (isset($mashup_alb_names[$track_counter]) && $mashup_alb_names[$track_counter] != '' ? $mashup_alb_names[$track_counter] : __('audio', CSFRAME_DOMAIN)) . '",
									mp3: "' . $mashup_alb_tracks[$track_counter] . '",
									m4a: "' . $mashup_alb_tracks[$track_counter] . '",
									oga: "' . $mashup_alb_tracks[$track_counter] . '"
								});
							},
							play: function () { // To avoid multiple jPlayers playing together.
								$(this).jPlayer("pauseOthers");
							},
							supplied: "mp3, m4a, oga",
							cssSelectorAncestor: "#jp_container_' . $track_rand . '",
							wmode: "window",
							globalVolume: true,
							useStateClassSkin: true,
							autoBlur: false,
							smoothPlayBar: true,
							keyEnabled: true,
							remainingDuration: true,
						});
					});
					</script>
					<div id="jquery_jplayer_' . $track_rand . '" class="jp-jplayer"></div>
					<div id="jp_container_' . $track_rand . '" class="jp-audio' . $track_class . '" role="application" aria-label="media player">
						<div class="jp-type-single">
							<div class="jp-gui jp-interface">
								<div class="jp-volume-controls">
									<button class="jp-mute" role="button" tabindex="0">' . __('mute', CSFRAME_DOMAIN) . '</button>
									<button class="jp-volume-max" role="button" tabindex="0">' . __('max volume', CSFRAME_DOMAIN) . '</button>
									<div class="jp-volume-bar">
										<div class="jp-volume-bar-value"></div>
									</div>
								</div>
								<div class="jp-controls-holder">
									<div class="jp-controls">
										<button class="jp-play" role="button" tabindex="0">' . __('play', CSFRAME_DOMAIN) . '</button>
										<button class="jp-stop" role="button" tabindex="0">' . __('stop', CSFRAME_DOMAIN) . '</button>
									</div>
									<div class="jp-progress">
										<div class="jp-seek-bar">
											<div class="jp-play-bar"></div>
										</div>
									</div>
									<div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
									<div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
									<div class="jp-toggles">
										<button class="jp-repeat" role="button" tabindex="0">' . __('repeat', CSFRAME_DOMAIN) . '</button>
									</div>
								</div>
							</div>
							<div class="jp-details">
								<div class="jp-title" aria-label="title">&nbsp;</div>
							</div>
						</div>
					</div>';
		}
		$track_counter ++;
	    }
	    $html .= '
			</div>';
	}

	return $html;
    }

}

if (!function_exists('mashup_album_play_track')) {

    function mashup_album_play_track($album_id = '', $detail_page = false) {

	$html = '';
	$mashup_get_tracks_list = get_post_meta($album_id, 'mashup_var_alb_list_array', true);
	$mashup_alb_names = get_post_meta($album_id, 'mashup_var_alb_track_name_array', true);
	$mashup_alb_tracks = get_post_meta($album_id, 'mashup_var_alb_track_url_array', true);
	$num_of_tracks = absint(sizeof($mashup_get_tracks_list));

	if (is_array($mashup_get_tracks_list) && sizeof($mashup_get_tracks_list) > 0) {

	    $track_counter = 0;
	    $track_rand = rand(1000000, 9999999);
	    if (isset($mashup_alb_tracks[$track_counter]) && $mashup_alb_tracks[$track_counter] != '') {
		if ($detail_page == true) {
		    $html .= '<figcaption><a href="javascript:void(0);" class="btn-album mashup-dev-det-audio btn-play play-audio" data-id="' . $track_rand . '"></a></figcaption>';
		} else {
		    $html .= '
					<script type="text/javascript">
					jQuery(document).ready(function ($) {
						$("#jquery_jplayer_' . $track_rand . '").jPlayer({
							ready: function () {
								$(this).jPlayer("setMedia", {
									title: "' . (isset($mashup_alb_names[$track_counter]) && $mashup_alb_names[$track_counter] != '' ? $mashup_alb_names[$track_counter] : __('audio', CSFRAME_DOMAIN)) . '",
									mp3: "' . $mashup_alb_tracks[$track_counter] . '",
									m4a: "' . $mashup_alb_tracks[$track_counter] . '",
									oga: "' . $mashup_alb_tracks[$track_counter] . '"
								});
							},
							play: function () { // To avoid multiple jPlayers playing together.
								$(this).jPlayer("pauseOthers");
							},
							supplied: "mp3, m4a, oga",
							cssSelectorAncestor: "#jp_container_' . $track_rand . '",
							wmode: "window",
							globalVolume: true,
							useStateClassSkin: true,
							autoBlur: false,
							smoothPlayBar: true,
							keyEnabled: true,
							remainingDuration: true,
						});
					});
					</script>
					<div id="jquery_jplayer_' . $track_rand . '" class="jp-jplayer"></div>
					<div id="jp_container_' . $track_rand . '" class="jp-audio" role="application" aria-label="media player" style="display:none;">
						<div class="jp-type-single">
							<div class="jp-gui jp-interface">
								<div class="jp-controls-holder">
									<div class="jp-controls">
										<button class="jp-play" role="button" tabindex="0">' . __('play', CSFRAME_DOMAIN) . '</button>
										<button class="jp-stop" role="button" tabindex="0">' . __('stop', CSFRAME_DOMAIN) . '</button>
									</div>
								</div>
							</div>
						</div>
					</div>';
		    $html .= '<span class="music-beat mashup-dev-music-beat" style="display:none; float:right; width:180px;"><img src="' . wp_mashup_framework::plugin_url('assets/images/music-playing.gif') . '" alt="" /></span>';
		    $html .= '<a href="javascript:void(0);" class="play-btn mashup-dev-play-btn play-audio" data-id="' . $track_rand . '">' . __('play', CSFRAME_DOMAIN) . '</a>';
		}
	    }
	}

	return $html;
    }

}
