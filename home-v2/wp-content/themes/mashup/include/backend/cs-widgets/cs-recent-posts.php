<?php
/**
 * @Recent posts widget Class
 *
 *
 */
if (!class_exists('mashup_recentposts')) {

    class mashup_recentposts extends WP_Widget {

	/**
	 * @init Recent posts Module
	 *
	 *
	 */
	public function __construct() {
	    global $mashup_var_static_text;

	    parent::__construct(
		    'mashup_recentposts', // Base ID
		    mashup_var_theme_text_srt('mashup_var_recent_post'), // Name
		    array('classname' => 'widget-recent-blog', 'description' => mashup_var_theme_text_srt('mashup_var_recent_post_des'),) // Args
	    );
	}

	/**
	 * @Recent posts html form
	 *
	 *
	 */
	function form($instance) {
	    global $mashup_var_form_fields, $mashup_var_html_fields, $mashup_var_static_text;
	    $strings = new mashup_theme_all_strings;
	    $strings->mashup_short_code_strings();
	    $instance = wp_parse_args((array) $instance, array('title' => ''));
	    $title = $instance['title'];
	    $select_category = isset($instance['select_category']) ? esc_attr($instance['select_category']) : '';
	    $showcount = isset($instance['showcount']) ? esc_attr($instance['showcount']) : '';
	    $mashup_opt_array = array(
		'name' => mashup_var_theme_text_srt('mashup_var_title_field'),
		'desc' => '',
		'hint_text' => '',
		'echo' => true,
		'field_params' => array(
		    'std' => esc_attr($title),
		    'id' => mashup_allow_special_char($this->get_field_id('title')),
		    'classes' => '',
		    'cust_id' => mashup_allow_special_char($this->get_field_name('title')),
		    'cust_name' => mashup_allow_special_char($this->get_field_name('title')),
		    'return' => true,
		    'required' => false
		),
	    );
	    $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
	    if (function_exists('mashup_show_all_cats')) {
		$default_option = $cats_options = array();
		$default_option[''] = mashup_var_theme_text_srt('mashup_var_all_cats');
		$cats_options = mashup_show_all_cats('', '', mashup_allow_special_char($this->get_field_id('select_category')), 'category', true);
		$cats_options = array_merge($default_option, $cats_options);
		$mashup_opt_array = array(
		    'name' => mashup_var_theme_text_srt('mashup_var_choose_category'),
		    'desc' => '',
		    'hint_text' => '',
		    'echo' => true,
		    'field_params' => array(
			'std' => $select_category,
			'cust_name' => mashup_allow_special_char($this->get_field_name('select_category')),
			'cust_id' => mashup_allow_special_char($this->get_field_id('select_category')),
			'id' => '',
			'options' => $cats_options,
			'classes' => 'dropdown chosen-select',
			'return' => true,
		    ),
		);

		$mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);
	    }
	    $mashup_opt_array = array(
		'name' => mashup_var_theme_text_srt('mashup_var_num_post'),
		'desc' => '',
		'hint_text' => '',
		'echo' => true,
		'field_params' => array(
		    'std' => esc_attr($showcount),
		    'id' => mashup_allow_special_char($this->get_field_id('showcount')),
		    'classes' => '',
		    'cust_id' => mashup_allow_special_char($this->get_field_name('showcount')),
		    'cust_name' => mashup_allow_special_char($this->get_field_name('showcount')),
		    'return' => true,
		    'required' => false
		),
	    );
	    $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);

	    $mashup_inline_script = 'jQuery(document).ready(function ($) {
				chosen_selectionbox();
			});';
	    mashup_admin_inline_enqueue_script($mashup_inline_script, 'mashup-custom-functions');
	}

	/**
	 * @Recent posts update form data
	 *
	 *
	 */
	function update($new_instance, $old_instance) {
	    $instance = $old_instance;
	    $instance['title'] = $new_instance['title'];
	    $instance['select_category'] = $new_instance['select_category'];
	    $instance['showcount'] = $new_instance['showcount'];
	    return $instance;
	}

	/**
	 * @Display Recent posts widget
	 *
	 */
	function widget($args, $instance) {
	    global $mashup_node, $wpdb, $post, $mashup_var_static_text;
	    extract($args, EXTR_SKIP);
	    $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
	    $title = htmlspecialchars_decode(stripslashes($title));
	    $select_category = empty($instance['select_category']) ? '' : apply_filters('widget_title', $instance['select_category']);
	    $showcount = empty($instance['showcount']) ? ' ' : apply_filters('widget_title', $instance['showcount']);
	    if ($instance['showcount'] == "") {
		$instance['showcount'] = '-1';
	    }
	    echo '<div class="widget widget-recent-post">';
	    if (!empty($title) && $title <> ' ') {
		echo '<div class="widget-title">';
		echo '<h6 class="text-color">' . mashup_allow_special_char($title) . '</h6>';
		echo '</div>';
	    }
	    ?>
	    <ul>
		<?php
		if (isset($select_category) && $select_category <> '') {
		    $args = array('posts_per_page' => $showcount, 'post_type' => 'post', 'category_name' => $select_category);
		} else {
		    $args = array('posts_per_page' => $showcount, 'post_type' => 'post');
		}
		$title_limit = 4;
		$custom_query2 = new WP_Query($args);
		if ($custom_query2->have_posts() <> "") {
		    while ($custom_query2->have_posts()) : $custom_query2->the_post();
			$mashup_post_id = get_the_ID();
			$width = 75;
			$height = 75;
			$image_id = get_post_thumbnail_id($mashup_post_id);
			$image_url = mashup_attachment_image_src($image_id, $width, $height);
			?>
		        <li>
			    <?php if ($image_url != '') { ?>
				<div class="img-holder">
				    <figure><a href="<?php echo esc_url(get_permalink()); ?>"><img src="<?php echo esc_url($image_url); ?>" alt=""></a></figure>
				</div>
			    <?php } ?>
		    	<div class="post-text">
		    	    <div class="post-title">
		    		<h4><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h4>
		    	    </div>
		    	    <div class="post-option">
		    		<span class="post-date"><i class="icon-alarm-clock text-color"></i><?php echo human_time_diff(get_the_time('U', $post->ID), current_time('timestamp')) . mashup_var_theme_text_srt('mashup_var_widget_recent_posts_ago'); ?></span> 
		    		<span class="post-comments"><i class="icon-multimedia text-color"></i><?php comments_popup_link('0', '1', '%', 'comments-link', mashup_var_theme_text_srt('mashup_var_comments_off')); ?></span> 
		    	    </div>
		    	</div>
		        </li>
			<?php
		    endwhile;
		    wp_reset_postdata();
		} else {
		    echo '<p>' . esc_html( mashup_var_theme_text_srt('mashup_var_noresult_found') ) . '</p>';
		}
		?>
	    </ul>
	    <?php
	    echo '</div>';
	}

    }

}
    add_action('widgets_init', function() {
        register_widget('mashup_recentposts');
    });
