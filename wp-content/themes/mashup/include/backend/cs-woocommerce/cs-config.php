<?php

/**
 * woocommerce custom settings
 * and hooks
 */
if ( ! function_exists('mashup_woocommerce_enabled') ) {

	function mashup_woocommerce_enabled() {
		if ( class_exists('WooCommerce') ) {
			return true;
		}
		return false;
	}

}

/**
 * check if the plugin is enabled, 
 * otherwise stop the script
 */
if ( ! mashup_woocommerce_enabled() ) {
	return false;
}

/**
 * @Woocommerce Support Theme
 *
 */
add_theme_support('woocommerce');

add_filter('woocommerce_enqueue_styles', '__return_false');

if ( ! function_exists('mashup_child_manage_woocommerce_styles') ) {

	add_action('wp_enqueue_scripts', 'mashup_child_manage_woocommerce_styles', 99);

	function mashup_child_manage_woocommerce_styles() {
		//remove generator meta tag
		remove_action('wp_head', array( $GLOBALS['woocommerce'], 'generator' ));
		//first check that woo exists to prevent fatal errors
		if ( function_exists('is_woocommerce') ) {
			//dequeue scripts and styles
			if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() && ! is_shop() ) {
				wp_dequeue_script('wc_price_slider');
				wp_dequeue_script('wc-single-product');
				//wp_dequeue_script('wc-add-to-cart');
				wp_dequeue_script('wc-cart-fragments');
				wp_dequeue_script('wc-checkout');
				wp_dequeue_script('wc-add-to-cart-variation');
				wp_dequeue_script('wc-single-product');
				//wp_dequeue_script('wc-cart');
				wp_dequeue_script('wc-chosen');
				//wp_dequeue_script('woocommerce');
				wp_dequeue_script('prettyPhoto');
				wp_dequeue_script('prettyPhoto-init');
				//wp_dequeue_script('jquery-blockui');
				wp_dequeue_script('jquery-placeholder');
				wp_dequeue_script('fancybox');
				wp_dequeue_script('jqueryui');
			}
		}
	}

}
/**
 * @Remove Woocommerce Default
 * @Remove Sidebar
 * @Breadcrumb
 *
 */
if ( ! function_exists('mashup_shop_title') ) {

	function mashup_shop_title() {
		$title = '';
		return $title;
	}

	add_filter('woocommerce_show_page_title', 'mashup_shop_title');
}

remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);


/**
 * @Define Image Sizes
 *
 */
$var_arrays = array( 'pagenow' );
$congig_global_vars = MASHUP_VAR_GLOBALS()->globalizing($var_arrays);
extract($congig_global_vars);

if ( ! function_exists('mashup_woocommerce_image_dimensions') ) {

	if ( is_admin() && isset($_GET['activated']) && $pagenow == 'themes.php' )
		add_action('init', 'mashup_woocommerce_image_dimensions', 1);

	function mashup_woocommerce_image_dimensions() {
		$catalog = array(
			'width' => '350', // px
			'height' => '350', // px
			'crop' => 1 // true
		);
		$single = array(
			'width' => '350', // px
			'height' => '350', // px
			'crop' => 1 // true
		);
		$thumbnail = array(
			'width' => '350', // px
			'height' => '350', // px
			'crop' => 1 // false
		);
		// Image sizes
		update_option('shop_catalog_image_size', $catalog); // Product category thumbs
		update_option('shop_single_image_size', $single); // Single product image
		update_option('shop_thumbnail_image_size', $thumbnail); // Image gallery thumbs
	}

}


/**
 * @Removing Shop Default Title
 *
 */
if ( ! function_exists('mashup_woocommerce_shop_title') ) {

	function mashup_woocommerce_shop_title() {
		$mashup_shop_title = '';
		return $mashup_shop_title;
	}

	add_filter('woocommerce_show_page_title', 'mashup_woocommerce_shop_title');
}


/**
 * @Adding Add to Cart
 * @ Custom Text
 *
 */
//remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

if ( ! function_exists('mashup_loop_add_to_cart') ) {

	function mashup_loop_add_to_cart() {
		global $product, $mashup_var_static_text;
		$strings = new mashup_theme_all_strings;
		$strings->mashup_theme_option_strings();

		echo apply_filters('woocommerce_loop_add_to_cart_link', sprintf('<div class="product-action-button"><a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="bgcolor btn btn-flat button product_type_simple add_to_cart_button ajax_add_to_cart %s product_type_%s">%s</a></div>', esc_url($product->add_to_cart_url()), esc_attr($product->id), esc_attr($product->get_sku()), esc_attr(isset($quantity) ? $quantity : 1 ), $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '', esc_attr($product->product_type), mashup_var_theme_text_srt('mashup_var_woocommerce_add_to_cart')), $product);
	}

}

/**
 * adding flash sale
 * custom text
 */
//remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);

if ( ! function_exists('mashup_sale_flash_icon') ) {

	add_filter('woocommerce_sale_flash', 'mashup_sale_flash_icon', 10, 3);

	function mashup_sale_flash_icon() {
		$icon = '<span class="featured-product"><i class="icon-star"></i></span>';
		echo mashup_allow_special_char($icon);
	}

}

/**
 * Product single page
 * customize Title
 */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);

add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 12);




if ( ! function_exists('mashup_single_product_stock_status') ) {

	add_filter('woocommerce_single_product_summary', 'mashup_single_product_stock_status', 10);

	function mashup_single_product_stock_status() {
		global $mashup_var_static_text;

		$mashup_prod_sale = get_post_meta(get_the_id(), '_stock_status', true);
		if ( $mashup_prod_sale == 'instock' ) {
			echo '<span class="stock_wrapper">' . esc_html( mashup_var_theme_text_srt('mashup_var_availability') ) . ': <span class="stock"><b>' . esc_html( mashup_var_theme_text_srt('mashup_var_in_stock') ) . '</b></span></span>';
		} else {
			echo '<span class="stock_wrapper">' . esc_html( mashup_var_theme_text_srt('mashup_var_availability') ) . ': <span class="stock"><b>' . esc_html( mashup_var_theme_text_srt('mashup_var_out_stock') ) . '</b></span></span>';
		}
	}

}
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10);

if ( ! function_exists('mashup_single_product_title') ) {

	add_filter('woocommerce_single_product_summary', 'mashup_single_product_title', 5);

	function mashup_single_product_title() {
		global $mashup_var_static_text;
		$mashup_prod_title = get_the_title();
		if ( $mashup_prod_title ) {
			echo '<h3>' . get_the_title() . '</h3>';
		}
	}

}

if ( ! function_exists('mashup_product_img_placeholder_change') ) {
	add_filter('woocommerce_placeholder_img', 'mashup_product_img_placeholder_change');

	function mashup_product_img_placeholder_change($image) {
		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $image );
		return $html;
	}

}

/**
 * @Removing Product Image Dimensions
 */
if ( ! function_exists('mashup_remove_thumbnail_dimensions') ) {

	add_filter('post_thumbnail_html', 'mashup_remove_thumbnail_dimensions', 10, 3);

	function mashup_remove_thumbnail_dimensions($html, $post_id, $post_image_id) {
		$html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
		return $html;
	}

}
