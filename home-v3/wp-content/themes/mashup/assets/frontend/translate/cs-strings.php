<?php

/**
 * Static string Return
 */
if (!function_exists('mashup_var_theme_text_srt')) {

    function mashup_var_theme_text_srt($str = '') {
	global $mashup_var_static_text;
	if (isset($mashup_var_static_text[$str])) {
	    return $mashup_var_static_text[$str];
	}
    }

}
if (!class_exists('mashup_theme_all_strings')) {

    class mashup_theme_all_strings {

	public function __construct() {

	    $this->mashup_theme_strings();
	}

	public function mashup_theme_option_strings() {
	    global $mashup_var_static_text;

	    /*
	     * Theme Options
	     */

	    $mashup_var_static_text['mashup_var_theme_option_save_msg'] = esc_html__('Saving changes...', 'mashup');
	    $mashup_var_static_text['mashup_var_save_msg'] = esc_html__('Save All Settings', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_reset_msg'] = esc_html__('Reset All Options', 'mashup');
	    $mashup_var_static_text['mashup_var_please_select'] = esc_html__('Please Select', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_breadcrumbs_sub_header'] = esc_html__('Breadcrumbs Sub Header', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_revolution_slider'] = esc_html__('Revolution Slider', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_no_sub_header'] = esc_html__('No sub Header', 'mashup');
	    $mashup_var_static_text['mashup_var_general'] = esc_html__('General', 'mashup');
	    $mashup_var_static_text['mashup_var_global'] = esc_html__('Global', 'mashup');
	    $mashup_var_static_text['mashup_var_header'] = esc_html__('Header', 'mashup');
	    $mashup_var_static_text['mashup_var_sub_header'] = esc_html__('Sub Header', 'mashup');
	    $mashup_var_static_text['mashup_var_social_icons'] = esc_html__('Social icons', 'mashup');
	    $mashup_var_static_text['mashup_var_social_sharing'] = esc_html__('Social sharing', 'mashup');
	    $mashup_var_static_text['mashup_var_color'] = esc_html__('Color', 'mashup');
	    $mashup_var_static_text['mashup_var_heading'] = esc_html__('Headings', 'mashup');
	    $mashup_var_static_text['mashup_var_all'] = esc_html__('All', 'mashup');

	    // Maintenance Mod

	    $mashup_var_static_text['mashup_var_maintenance_mod_settings'] = esc_html__('Maintenance Mod settings', 'mashup');

	    $mashup_var_static_text['mashup_var_maintenance_mod'] = esc_html__('Maintenance Mod', 'mashup');
	    $mashup_var_static_text['mashup_var_maintenance_mod_hint'] = esc_html__('Turn maintenance mod on/off here', 'mashup');

	    $mashup_var_static_text['mashup_var_maintenance_mod_show_logo'] = esc_html__('Show logo', 'mashup');
	    $mashup_var_static_text['mashup_var_maintenance_mod_show_logo_hint'] = esc_html__('Turn logo on/off here', 'mashup');

	    $mashup_var_static_text['mashup_var_maintenance_mod_social_contacts'] = esc_html__('Social Contacts', 'mashup');
	    $mashup_var_static_text['mashup_var_maintenance_mod_social_contacts_hint'] = esc_html__('Turn social contacts on/off here', 'mashup');

	    $mashup_var_static_text['mashup_var_maintenance_mod_newsletter'] = esc_html__('Newsletter', 'mashup');
	    $mashup_var_static_text['mashup_var_maintenance_mod_newsletter_hint'] = esc_html__('Turn newsletter on/off here', 'mashup');

	    $mashup_var_static_text['mashup_var_maintenance_mod_header_switch'] = esc_html__('Header switch', 'mashup');
	    $mashup_var_static_text['mashup_var_maintenance_mod_header_switch_hint'] = esc_html__('Turn header on/off here', 'mashup');

	    $mashup_var_static_text['mashup_var_maintenance_mod_footer_switch'] = esc_html__('Footer switch', 'mashup');
	    $mashup_var_static_text['mashup_var_maintenance_mod_footer_switch_hint'] = esc_html__('Turn footer on/off here', 'mashup');

	    $mashup_var_static_text['mashup_var_maintenance_mod_page'] = esc_html__('Maintinance Mod page', 'mashup');
	    $mashup_var_static_text['mashup_var_maintenance_mod_page_hint'] = esc_html__('Select a page that ypu want to set for maintinance mode', 'mashup');

	    /* Api Key */
	    $mashup_var_static_text['mashup_var_twitter'] = esc_html__('Show Twitter', 'mashup');
	    $mashup_var_static_text['mashup_var_twitter_hint'] = esc_html__('Manage user registration via Twitter here. If this switch is set ON, users will be able to sign up / sign in with Twitter. If it will be OFF, users will not be able to register / sign in through Twitter.', 'mashup');
	    $mashup_var_static_text['mashup_var_facebook_section'] = esc_html__('Facebook', 'mashup');
	    $mashup_var_static_text['mashup_var_facebook_switch'] = esc_html__('Facebook Login On/Off', 'mashup');
	    $mashup_var_static_text['mashup_var_facebook_switch_hint'] = esc_html__('Manage user registration via Facebook here. If this switch is set ON, users will be able to sign up / sign in with Facebook. If it will be OFF, users will not be able to register / sign in through Facebook.', 'mashup');
	    $mashup_var_static_text['mashup_var_facebook_app_id'] = esc_html__('Facebook Application ID', 'mashup');
	    $mashup_var_static_text['mashup_var_facebook_app_id_hint'] = esc_html__('Here you have to add your Facebook application ID. You will get this ID when you create Facebook App.', 'mashup');
	    $mashup_var_static_text['mashup_var_facebook_secret'] = esc_html__('Facebook Secret', 'mashup');
	    $mashup_var_static_text['mashup_var_facebook_secret_hint'] = esc_html__('Put your Facebook Secret here. You can find it in your Facebook Application Dashboard', 'mashup');
	    $mashup_var_static_text['mashup_var_linkedin_section'] = esc_html__('Linked-in', 'mashup');
	    $mashup_var_static_text['mashup_var_linkedin_switch'] = esc_html__('Linked-in Login On/Off', 'mashup');
	    $mashup_var_static_text['mashup_var_linkedin_switch_hint'] = esc_html__('Manage user registration via Linked-in here. If this switch is set ON, users will be able to sign up / sign in with Linked-in. If it will be OFF, users will not be able to register / sign in through Linked-in.', 'mashup');
	    $mashup_var_static_text['mashup_var_linkedin_app_id'] = esc_html__('Linked-in Application ID', 'mashup');
	    $mashup_var_static_text['mashup_var_linkedin_app_id_hint'] = esc_html__('Add LinkedIn application ID. To get your Linked-in Application ID, go to your Linked-in Dashboard', 'mashup');
	    $mashup_var_static_text['mashup_var_linkedin_secret'] = esc_html__('Linked-in Secret', 'mashup');
	    $mashup_var_static_text['mashup_var_linkedin_secret_hint'] = esc_html__('Put your Linked-in Secret here. You can find it in your Linked-in Application Dashboard', 'mashup');
	    $mashup_var_static_text['mashup_var_google_section'] = esc_html__('Google', 'mashup');
	    $mashup_var_static_text['mashup_var_google_switch'] = esc_html__('Google+ Login On/Off', 'mashup');
	    $mashup_var_static_text['mashup_var_google_switch_hint'] = esc_html__('Manage user registration via Google+ here. If this switch is set ON, users will be able to sign up / sign in with Google+. If it will be OFF, users will not be able to register / sign in through Google+.', 'mashup');
	    $mashup_var_static_text['mashup_var_google_client_id'] = esc_html__('Google+ Client ID', 'mashup');
	    $mashup_var_static_text['mashup_var_google_client_id_hint'] = esc_html__('Put your Google+ client ID here.  To get this ID, go to your Google+ account Dashboard', 'mashup');
	    $mashup_var_static_text['mashup_var_google_client_secret'] = esc_html__('Google+ Client Secret', 'mashup');
	    $mashup_var_static_text['mashup_var_google_client_secret_hint'] = esc_html__('Put your google+ client secret here.  To get client secret, go to your Google+ account', 'mashup');
	    $mashup_var_static_text['mashup_var_google_api'] = esc_html__('Google API key', 'mashup');
	    $mashup_var_static_text['mashup_var_google_api_hint'] = esc_html__('Put your Google API key here.  To get API, go to your Google account', 'mashup');
	    $mashup_var_static_text['mashup_var_redirect'] = esc_html__('Fixed redirect url for login', 'mashup');
	    $mashup_var_static_text['mashup_var_redirect_hint'] = esc_html__('Put your google+ redirect url here.', 'mashup');
	    $mashup_var_static_text['mashup_var_captcha'] = esc_html__('Captcha', 'mashup');
	    $mashup_var_static_text['mashup_var_captcha_hint'] = esc_html__('Manage your captcha code for secured Signup here. If this switch will be ON, user can register after entering Captcha code. It helps to avoid robotic / spam sign-up', 'mashup');
	    $mashup_var_static_text['mashup_var_captcha_site_key'] = esc_html__('Site Key', 'mashup');
	    $mashup_var_static_text['mashup_var_captcha_site_key_hint'] = esc_html__('Put your site key for captcha. You can get this site key after registering your site on Google.', 'mashup');
	    $mashup_var_static_text['mashup_var_captcha_secret'] = esc_html__('Secret Key', 'mashup');
	    $mashup_var_static_text['mashup_var_captcha_secret_hint'] = esc_html__('Put your site Secret key for captcha. You can get this Secret Key after registering your site on Google.', 'mashup');
	    /*
	     * Global Setting 
	     */

	    $mashup_var_static_text['mashup_var_ads_unit_settings'] = esc_html__('Ads Unit Settings', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_custom_favicon'] = esc_html__('Custom favicon', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_custom_favicon_hint'] = esc_html__('Custom favicon for your site', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_rtl'] = esc_html__('RTL', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_rtl_hint'] = esc_html__('Turn RTL On/Off here for Right to Left languages like Arabic etc.', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_responsive'] = esc_html__('Responsive', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_responsive_hint'] = esc_html__('Set responsive design layout for mobile devices On/Off here', 'mashup');
	    $mashup_var_static_text['mashup_var_excerpt'] = esc_html__('Excerpt (in words)', 'mashup');
	    $mashup_var_static_text['mashup_var_excerpt_hint'] = esc_html__('Set excerpt length/limit from here. It controls text limit for all posts content', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_global_settings'] = esc_html__('Global Settings', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_global_settings_hint'] = esc_html__('This is Global Settings.', 'mashup');
	    $mashup_var_static_text['mashup_var_default_header_style'] = esc_html__('Default Header Style', 'mashup');
	    $mashup_var_static_text['mashup_var_default_header_style_hint'] = esc_html__('Choose default header style for complete site', 'mashup');
	    $mashup_var_static_text['mashup_var_default'] = esc_html__('Default', 'mashup');
	    $mashup_var_static_text['mashup_var_std_default'] = esc_html__('default', 'mashup');
	    $mashup_var_static_text['mashup_var_modern'] = esc_html__('Modern', 'mashup');
	    $mashup_var_static_text['mashup_var_logo'] = esc_html__('Logo', 'mashup');
	    $mashup_var_static_text['toggle_sidebar'] = esc_html__('Toggle Sidebar', 'mashup');
	    $mashup_var_static_text['toggle_sidebar_hint'] = esc_html__('Select Toggle sidebar for header', 'mashup');
	    $mashup_var_static_text['select_header_top_categories'] = esc_html__('Header news', 'mashup');
	    $mashup_var_static_text['select_header_top_categories_hint'] = esc_html__('Select category for header news', 'mashup');
	    $mashup_var_static_text['banner_add'] = esc_html__('Banner', 'mashup');
	    $mashup_var_static_text['banner_add_hint'] = esc_html__('Select the add from dropdown that you want to dispaly', 'mashup');
	    $mashup_var_static_text['select_header_posts_positions'] = esc_html__('Header Posts Position', 'mashup');
	    $mashup_var_static_text['mashup_var_before_header'] = esc_html__('Before Header', 'mashup');
	    $mashup_var_static_text['mashup_var_after_header'] = esc_html__('After Header', 'mashup');
	    $mashup_var_static_text['mashup_var_password_form_message'] = esc_html__("This post is password protected. To view it please enter your password below:", 'mashup');
	    $mashup_var_static_text['mashup_submit_button_text'] = esc_html__("Submit", 'mashup');
	    /*
	     * Top Strip
	     */
	    $mashup_var_static_text['header_top_strip'] = esc_html__('Header Top Strip', 'mashup');
	    $mashup_var_static_text['header_top_strip_hint'] = esc_html__('Enable/Disable header top strip', 'mashup');
	    $mashup_var_static_text['header_top_strip_time'] = esc_html__('Date/Time', 'mashup');
	    $mashup_var_static_text['header_top_strip_time_hint'] = esc_html__('Enable/Disable Header Top Strip Date/Time', 'mashup');
	    $mashup_var_static_text['header_top_strip_menu'] = esc_html__('Menu', 'mashup');
	    $mashup_var_static_text['header_top_strip_menu_hint'] = esc_html__('Enable/Disable Header Top Strip Menu', 'mashup');
	    $mashup_var_static_text['header_top_strip_social_network'] = esc_html__('Social Links', 'mashup');
	    $mashup_var_static_text['header_top_strip_social_network_hint'] = esc_html__('Enable/Disable Header Top Strip Social Links', 'mashup');
	    $mashup_var_static_text['header_search_icon'] = esc_html__('Search Icon', 'mashup');
	    $mashup_var_static_text['header_search_icon_hint'] = esc_html__('Enable/Disable Header Top Strip Search Icon', 'mashup');
	    $mashup_var_static_text['header_top_strip_register'] = esc_html__('Join Us', 'mashup');
	    $mashup_var_static_text['header_top_strip_register_hint'] = esc_html__('Enable/Disable Join Us', 'mashup');
	    $mashup_var_static_text['mashup_var_custom_logo_switch'] = esc_html__('Logo Switch', 'mashup');
	    $mashup_var_static_text['mashup_var_custom_logo_switch_hint'] = esc_html__('If you want to turn off logo in your header then off this switch', 'mashup');
	    $mashup_var_static_text['mashup_var_custom_header_layout'] = esc_html__('Header Layout', 'mashup');
	    $mashup_var_static_text['mashup_var_custom_header_layout_hint'] = esc_html__('Select layout for header.', 'mashup');
	    $mashup_var_static_text['mashup_var_custom_header_box'] = esc_html__('Box', 'mashup');
	    $mashup_var_static_text['mashup_var_custom_header_wide'] = esc_html__('Wide', 'mashup');
	    $mashup_var_static_text['mashup_var_custom_transparent_header'] = esc_html__('Transparent Header', 'mashup');
	    $mashup_var_static_text['mashup_var_custom_transparent_header_hint'] = esc_html__('Enable/Disable transparent header', 'mashup');
	    $mashup_var_static_text['mashup_var_custom_logo_style'] = esc_html__('Logo Style', 'mashup');
	    $mashup_var_static_text['mashup_var_custom_logo_style_hint'] = esc_html__('You can chose logo position but it depends on header view. ', 'mashup');
	    $mashup_var_static_text['mashup_var_custom_logo_style_option_1'] = esc_html__('Left', 'mashup');
	    $mashup_var_static_text['mashup_var_custom_logo_style_option_2'] = esc_html__('In Menu', 'mashup');
	    $mashup_var_static_text['mashup_var_custom_logo_style_option_3'] = esc_html__('Right', 'mashup');
	    $mashup_var_static_text['mashup_var_custom_logo_position'] = esc_html__('Logo Position', 'mashup');
	    $mashup_var_static_text['mashup_var_custom_logo_position_hint'] = esc_html__('you can add the position of logo in number formate. It will be execute if you selected menue style `In Menu`. ', 'mashup');
	    $mashup_var_static_text['mashup_var_logo_hint'] = esc_html__('Upload your custom logo in .png .jpg .gif formats only.', 'mashup');
	    $mashup_var_static_text['mashup_var_logo_modern'] = esc_html__('Logo Modern', 'mashup');
	    $mashup_var_static_text['mashup_var_logo_height'] = esc_html__('Logo Height', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_view22_latest_news'] = esc_html__('Latest News', 'mashup');
	    $mashup_var_static_text['header_view_1'] = esc_html__('View 1', 'mashup');
	    $mashup_var_static_text['header_view_2'] = esc_html__('View 2', 'mashup');
	    $mashup_var_static_text['header_view_3'] = esc_html__('View 3', 'mashup');
	    $mashup_var_static_text['header_view_4'] = esc_html__('View 4', 'mashup');
	    $mashup_var_static_text['header_view_5'] = esc_html__('View 5', 'mashup');
	    $mashup_var_static_text['header_view_6'] = esc_html__('View 6', 'mashup');
	    $mashup_var_static_text['header_view_7'] = esc_html__('View 7', 'mashup');
	    $mashup_var_static_text['header_view_8'] = esc_html__('View 8', 'mashup');
	    $mashup_var_static_text['header_view_9'] = esc_html__('View 9', 'mashup');
	    $mashup_var_static_text['header_view_10'] = esc_html__('View 10', 'mashup');
	    $mashup_var_static_text['select_header_style'] = esc_html__('Header View', 'mashup');
	    $mashup_var_static_text['select_header_style_hint'] = esc_html__('Select header view from this dropdown.', 'mashup');
	    $mashup_var_static_text['mashup_var_post_style_1'] = esc_html__('View 1', 'mashup');
	    $mashup_var_static_text['mashup_var_post_style_2'] = esc_html__('View 2', 'mashup');
	    $mashup_var_static_text['mashup_var_post_style_3'] = esc_html__('View 3', 'mashup');
	    $mashup_var_static_text['mashup_var_post_style_4'] = esc_html__('View 4', 'mashup');
	    $mashup_var_static_text['mashup_var_post_style_5'] = esc_html__('View 5', 'mashup');
	    $mashup_var_static_text['mashup_var_post_style'] = esc_html__('Post Style', 'mashup');
	    $mashup_var_static_text['mashup_var_post_view'] = esc_html__('Post View', 'mashup');
	    $mashup_var_static_text['mashup_var_post_view_hint'] = esc_html__('Select post default view for all posts from this dropdown.', 'mashup');
	    $mashup_var_static_text['mashup_var_logo_height_hint'] = esc_html__('Set exact logo height otherwise logo will not display normally.', 'mashup');
	    $mashup_var_static_text['mashup_var_logo_width'] = esc_html__('Logo Width', 'mashup');
	    $mashup_var_static_text['mashup_var_logo_width_hint'] = esc_html__('Set exact logo width otherwise logo will not display normally.', 'mashup');
	    $mashup_var_static_text['mashup_var_album_url'] = esc_html__('Music URL', 'mashup');
	    $mashup_var_static_text['mashup_var_album_url_hint'] = esc_html__('Enter a valid music url here..', 'mashup');
	    $mashup_var_static_text['mashup_var_woo_cart'] = esc_html__('Woocommerce Cart', 'mashup');
	    $mashup_var_static_text['mashup_var_logo_margin_top'] = esc_html__('Logo margin top', 'mashup');
	    $mashup_var_static_text['mashup_var_logo_margin_top_hint'] = esc_html__('Logo spacing margin from top', 'mashup');
	    $mashup_var_static_text['mashup_var_logo_margin_bottom'] = esc_html__('Logo margin bottom', 'mashup');
	    $mashup_var_static_text['mashup_var_logo_margin_bottom_hint'] = esc_html__('Logo spacing margin from bottom.', 'mashup');
	    $mashup_var_static_text['mashup_var_logo_margin_right'] = esc_html__('Logo margin right', 'mashup');
	    $mashup_var_static_text['mashup_var_logo_margin_right_hint'] = esc_html__('Logo spacing margin from right.', 'mashup');
	    $mashup_var_static_text['mashup_var_logo_margin_left'] = esc_html__('Logo margin left', 'mashup');
	    $mashup_var_static_text['mashup_var_logo_margin_left_hint'] = esc_html__('Logo spacing margin from left', 'mashup');
	    $mashup_var_static_text['header_preview_area'] = esc_html__('Header Preview', 'mashup');
	    $mashup_var_static_text['mashup_var_map_style'] = esc_html__('Map Style', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_search_result'] = esc_html__('Blog Search Result', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_search_result_hint'] = esc_html__('Select Page for Blog Search Result', 'mashup');
	    $mashup_var_static_text['mashup_var_map_style_hint'] = esc_html__('Select Map style for all Maps.', 'mashup');
	    $mashup_var_static_text['mashup_var_map_style_1'] = esc_html__('Map Box', 'mashup');
	    $mashup_var_static_text['mashup_var_map_style_2'] = esc_html__('Blue Water', 'mashup');
	    $mashup_var_static_text['mashup_var_map_style_3'] = esc_html__('Icy Blue', 'mashup');
	    $mashup_var_static_text['mashup_var_map_style_4'] = esc_html__('Bluish', 'mashup');
	    $mashup_var_static_text['mashup_var_map_style_5'] = esc_html__('Light Blue Water', 'mashup');
	    $mashup_var_static_text['mashup_var_map_style_6'] = esc_html__('Clad Me', 'mashup');
	    $mashup_var_static_text['mashup_var_map_style_7'] = esc_html__('Chilled', 'mashup');
	    $mashup_var_static_text['mashup_var_map_style_8'] = esc_html__('Two Tone', 'mashup');
	    $mashup_var_static_text['mashup_var_map_style_9'] = esc_html__('Light and Dark', 'mashup');
	    $mashup_var_static_text['mashup_var_map_style_10'] = esc_html__('Ilustracao', 'mashup');
	    $mashup_var_static_text['mashup_var_map_style_11'] = esc_html__('Flat Pale', 'mashup');
	    $mashup_var_static_text['mashup_var_map_style_12'] = esc_html__('Title', 'mashup');
	    $mashup_var_static_text['mashup_var_map_style_13'] = esc_html__('Moret', 'mashup');
	    /*
	     * WooCommerce
	     */
	    $mashup_var_static_text['mashup_var_book_now_url'] = esc_html__('Book Now Url', 'mashup');
	    $mashup_var_static_text['mashup_var_wooCommerce'] = esc_html__('WooCommerce', 'mashup');
	    $mashup_var_static_text['mashup_var_wooCommerce_cart_icon'] = esc_html__('WooCommerce Cart Icon', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_wc_archive_sidebar'] = esc_html__('WooCommerce Archive Sidebar', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_wc_archive_sidebar_discription'] = esc_html__('Set Sidebar for WooCommerce Archive, Category etc', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_wc_archive_sidebar_hint'] = esc_html__('Select Sidebar for WooCommerce Archive, Category etc', 'mashup');
	    /*
	     *
	     * Sub Header
	     */
	    $mashup_var_static_text['mashup_var_default_sub_header'] = esc_html__('Default Sub Header', 'mashup');
	    $mashup_var_static_text['mashup_var_default_sub_header_hint'] = esc_html__('Sub Header settings made here will be implemented on all pages.', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_header_border_color'] = esc_html__('Header Border Color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_revolution_slider_hint'] = esc_html__('Please select Revolution Slider if already included in package. Otherwise buy Sliders from Code canyon But its optional', 'mashup');
	    $mashup_var_static_text['mashup_var_style'] = esc_html__('Style', 'mashup');
	    $mashup_var_static_text['mashup_var_subheader_style_hint'] = esc_html__('Select Subheader Style', 'mashup');
	    $mashup_var_static_text['mashup_var_classic'] = esc_html__('Classic', 'mashup');
	    $mashup_var_static_text['mashup_var_with_background_image'] = esc_html__('With Background Image', 'mashup');
	    $mashup_var_static_text['mashup_var_padding_top'] = esc_html__('Padding Top', 'mashup');
	    $mashup_var_static_text['mashup_var_sub_header_padding_top_hint'] = esc_html__('Set custom padding for sub header content top area.', 'mashup');
	    $mashup_var_static_text['mashup_var_padding_bottom'] = esc_html__('Padding Bottom', 'mashup');
	    $mashup_var_static_text['mashup_var_sub_header_padding_bottom_hint'] = esc_html__('Set custom padding for sub header content bottom area.', 'mashup');
	    $mashup_var_static_text['mashup_var_margin_top'] = esc_html__('Margin Top', 'mashup');
	    $mashup_var_static_text['mashup_var_sub_header_margin_top_hint'] = esc_html__('Set custom Margin for sub header content top area.', 'mashup');
	    $mashup_var_static_text['mashup_var_margin_bottom'] = esc_html__('Margin Bottom', 'mashup');
	    $mashup_var_static_text['mashup_var_margin_bottom_hint'] = esc_html__('Set custom Margin for sub header content bottom area.', 'mashup');
	    $mashup_var_static_text['mashup_var_page_title'] = esc_html__('Page Title', 'mashup');
	    $mashup_var_static_text['mashup_var_page_title_hint'] = esc_html__('Enable/disable Subheader Page Title', 'mashup');
	    $mashup_var_static_text['mashup_var_text_color'] = esc_html__('Content Color', 'mashup');
	    $mashup_var_static_text['mashup_var_subheader_text_color_hint'] = esc_html__('Set Subheader Content Color', 'mashup');
	    $mashup_var_static_text['mashup_var_breadcrumbs'] = esc_html__('Breadcrumbs', 'mashup');
	    $mashup_var_static_text['mashup_var_breadcrumbs_hint'] = esc_html__('Enable/disable Breadcrumbs', 'mashup');
	    $mashup_var_static_text['mashup_var_sub_heading'] = esc_html__('Sub Heading', 'mashup');
	    $mashup_var_static_text['mashup_var_bg_image_hint'] = esc_html__('Upload background image in .png .jpg .gif formats only.', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_parallax'] = esc_html__('Parallax', 'mashup');
	    /*
	     * Footer Options
	     */
	    $mashup_var_static_text['mashup_var_footer_options'] = esc_html__('Footer options', 'mashup');
	    $mashup_var_static_text['mashup_var_footer_section'] = esc_html__('Footer section', 'mashup');
	    $mashup_var_static_text['mashup_var_footer_section_hint'] = esc_html__('Enable/disable footer area', 'mashup');
	    $mashup_var_static_text['mashup_var_footer_widgets'] = esc_html__('Footer Widgets', 'mashup');
	    $mashup_var_static_text['mashup_var_footer_widgets_hint'] = esc_html__('Enable/disable footer widget area', 'mashup');
	    $mashup_var_static_text['mashup_var_footer_phone'] = esc_html__('Footer Phone', 'mashup');
	    $mashup_var_static_text['mashup_var_footer_phone_hint'] = esc_html__('Enable/disable footer phone area', 'mashup');
	    $mashup_var_static_text['mashup_var_footer_email'] = esc_html__('Footer Email', 'mashup');
	    $mashup_var_static_text['mashup_var_footer_email_hint'] = esc_html__('Enable/disable footer email area', 'mashup');
	    $mashup_var_static_text['mashup_var_footer_logo'] = esc_html__('Footer Logo', 'mashup');
	    $mashup_var_static_text['mashup_var_footer_logo_hint'] = esc_html__('Enable/disable footer logo area', 'mashup');
	    $mashup_var_static_text['mashup_var_footer_social'] = esc_html__('Footer Social Icons', 'mashup');
	    $mashup_var_static_text['mashup_var_footer_social_hint'] = esc_html__('Enable/disable footer social icons area', 'mashup');
	    $mashup_var_static_text['mashup_var_copy_write_section'] = esc_html__('Copyright Section', 'mashup');
	    $mashup_var_static_text['mashup_var_copy_write_section_hint'] = esc_html__('enable/disable Copyright Section', 'mashup');
	    $mashup_var_static_text['mashup_var_copyright_text'] = esc_html__('Copyright Text', 'mashup');
	    $mashup_var_static_text['mashup_var_copyright_text_hint'] = esc_html__('write your own copyright text', 'mashup');
	    $mashup_var_static_text['mashup_var_copyright_text_value'] = esc_html__('2015 mashup Name All rights reserved. Design by Chimp Studio', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_footer_menu'] = esc_html__('Footer Menu', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_footer_menu_hint'] = esc_html__('Enable/disable footer menu option.', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_back_to_top'] = esc_html__('Back to top', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_back_to_top_hint'] = esc_html__('Enable/disable footer back to top option.', 'mashup');
	    $mashup_var_static_text['mashup_var_footer_background'] = esc_html__('Footer background image', 'mashup');
	    $mashup_var_static_text['mashup_var_footer_background_hint'] = esc_html__('Upload Bakcground Image for footer', 'mashup');
	    /*
	     * Colors
	     */
	    $mashup_var_static_text['mashup_var_theme_option_general_color'] = esc_html__('General Colors', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_color'] = esc_html__('Theme Color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_color_hint'] = esc_html__('Choose theme skin color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_text_color'] = esc_html__('Body Text Color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_text_color_hint'] = esc_html__('Choose text color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_header_color'] = esc_html__('Header colors', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_default_header_colors'] = esc_html__('Default Header Colors', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_default_header_colors_hint'] = esc_html__('Change Header background color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_menu_link_color'] = esc_html__('Menu Link color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_menu_link_color_hint'] = esc_html__('Change Header Menu Link color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_menu_hover_color'] = esc_html__('Menu Hover / Active Link color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_menu_hover_color_hint'] = esc_html__('Change Header Menu Active Link color', 'mashup');


	    $mashup_var_static_text['mashup_var_theme_option_menu_hover_bg_color'] = esc_html__('Menu Hover / Active Link Background Color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_menu_hover_bg_color_hint'] = esc_html__('Change Header Menu Active Link Background color', 'mashup');

	    $mashup_var_static_text['mashup_var_theme_option_submenu_2nd_level_bgcolor'] = esc_html__('Submenu 2nd Level Background Color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_submenu_2nd_level_bgcolor_hint'] = esc_html__('Change Header Submenu 2nd Level Background Color', 'mashup');


	    $mashup_var_static_text['mashup_var_theme_option_submenu_hover_bg_color'] = esc_html__('Submenu Hover Background', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_submenu_hover_bg_color_hint'] = esc_html__('Change Submenu Hover Background color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_submenu_link_color'] = esc_html__('Submenu Link Color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_submenu_link_color_hint'] = esc_html__('Change Submenu Link color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_submenu_2nd_level_color'] = esc_html__('Submenu 2nd Level Link Color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_submenu_2nd_level_color_hint'] = esc_html__('Change Submenu 2nd Level Link color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_submenu_hover_color'] = esc_html__('Submenu Hover / Active Link Color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_submenu_hover_color_hint'] = esc_html__('Change Submenu Hover / Active Link color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_submenu_bg_color'] = esc_html__('Submenu Background', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_submenu_bg_color_hint'] = esc_html__('Change Submenu Background color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_footer_color'] = esc_html__('footer colors', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_footer_bg_color'] = esc_html__('Footer Background Color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_footer_bg_color_hint'] = esc_html__('Change Background Color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_footer_text_color'] = esc_html__('Footer Text Color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_footer_text_color_hint'] = esc_html__('Change Footer Text Color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_footer_link_color'] = esc_html__('Footer Link Color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_footer_link_color_hint'] = esc_html__('Change Footer Link Color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_copyright_text_color'] = esc_html__('Copyright Text', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_copyright_text_color_hint'] = esc_html__('Change Copyright Text Color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_widget_bg_color'] = esc_html__('Widget Background Color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_copyright_bg_color'] = esc_html__('Copyright Background Color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_copyright_bg_color_hint'] = esc_html__('Change Copyright Background Color', 'mashup');

	    /*
	     * heading colors
	     */
	    $mashup_var_static_text['mashup_var_theme_option_heading_color'] = esc_html__('heading colors', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_heading_h1'] = esc_html__('heading h1', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_heading_h2'] = esc_html__('heading h2', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_heading_h3'] = esc_html__('heading h3', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_heading_h4'] = esc_html__('heading h4', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_heading_h5'] = esc_html__('heading h5', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_heading_h6'] = esc_html__('heading h6', 'mashup');
	    $mashup_var_static_text['mashup_var_section_title'] = esc_html__('Section Title', 'mashup');
	    $mashup_var_static_text['mashup_var_post_title'] = esc_html__('Post Title', 'mashup');
	    $mashup_var_static_text['mashup_var_page_title_hint'] = esc_html__('Enable/disable Subheader Page Title', 'mashup');
	    $mashup_var_static_text['mashup_var_widget_title'] = esc_html__('Widgets Title', 'mashup');
	    $mashup_var_static_text['mashup_var_footer_widget_title'] = esc_html__('Footer Widgets Title', 'mashup');
	    /*
	     * Custom Font
	     */
	    $mashup_var_static_text['mashup_var_theme_option_custom_font_woff'] = esc_html__('Custom Font .woff', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_custom_font_woff_hint'] = esc_html__('Upload Your Custom Font file in .woff format', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_custom_font_ttf'] = esc_html__('Custom Font .ttf', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_custom_font_ttf_hint'] = esc_html__('Upload Your Custom Font file in .ttf format', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_custom_font_svg'] = esc_html__('Custom Font .svg', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_custom_font_svg_hint'] = esc_html__('Upload Your Custom Font file in .svg format', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_custom_font_eot'] = esc_html__('Custom Font .eot', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_custom_font_eot_hint'] = esc_html__('Upload Your Custom Font file in .eot format', 'mashup');
	    /*
	     * Google Fonts
	     */
	    $mashup_var_static_text['mashup_var_theme_option_content_font'] = esc_html__('Content Font', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_content_font_discription'] = esc_html__('Set fonts for Body text', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_font_attribute'] = esc_html__('Font Attribute', 'mashup');
	    $mashup_var_static_text['mashup_var_size'] = esc_html__('Size', 'mashup');
	    $mashup_var_static_text['mashup_var_line_height'] = esc_html__('Line Height', 'mashup');
	    $mashup_var_static_text['mashup_var_text_transform'] = esc_html__('Text Transform', 'mashup');
	    $mashup_var_static_text['mashup_var_none'] = esc_html__('none', 'mashup');
	    $mashup_var_static_text['mashup_var_capitalize'] = esc_html__('capitalize', 'mashup');
	    $mashup_var_static_text['mashup_var_uppercase'] = esc_html__('uppercase', 'mashup');
	    $mashup_var_static_text['mashup_var_lowercase'] = esc_html__('lowercase', 'mashup');
	    $mashup_var_static_text['mashup_var_initial'] = esc_html__('initial', 'mashup');
	    $mashup_var_static_text['mashup_var_inherit'] = esc_html__('inherit', 'mashup');
	    $mashup_var_static_text['mashup_var_letter_spacing'] = esc_html__('Letter Spacing', 'mashup');
	    $mashup_var_static_text['mashup_var_main_menu_font'] = esc_html__('Main Menu Font', 'mashup');
	    $mashup_var_static_text['mashup_var_main_menu_font_hint'] = esc_html__('Set font for main Menu. It will be applied to sub menu as well', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_font_attribute_hint.'] = esc_html__('Set Font Attribute', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_Heading1_font'] = esc_html__('Heading 1 Font', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_Heading_font_hint'] = esc_html__('Select font for Headings. It will apply on all posts and pages headings', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_Heading2_font'] = esc_html__('Heading 2 Font', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_Heading3_font'] = esc_html__('Heading 3 Font', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_Heading4_font'] = esc_html__('Heading 4 Font', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_Heading5_font'] = esc_html__('Heading 5 Font', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_Heading6_font'] = esc_html__('Heading 6 Font', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_section_title_font'] = esc_html__('Section Title Font', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_section_title_font_hint'] = esc_html__('Set font for Section Title Headings', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_page_title_font'] = esc_html__('Page Title Font', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_font_page_title_hint'] = esc_html__('Set font for Page Title Headings', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_post_title_font'] = esc_html__('Post Title Font', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_font_post_title_hint'] = esc_html__('Set font for Post Title Headings', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_sidebar_widget_font'] = esc_html__('Sidebar Widget Font', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_sidebar_widget_font_hint'] = esc_html__('Set font for Widget Headings', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_footer_widget_font'] = esc_html__('Footer Widget Font', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_footer_widget_font_hint'] = esc_html__('Set font for Footer Widget Headings', 'mashup');
	    /*
	     * Social Network
	     */
	    $mashup_var_static_text['mashup_var_theme_option_social_network'] = esc_html__('Social Network', 'mashup');
	    $mashup_var_static_text['mashup_var_fb'] = esc_html__('Facebook', 'mashup');
	    $mashup_var_static_text['mashup_var_twitter'] = esc_html__('Twitter', 'mashup');
	    $mashup_var_static_text['mashup_var_g_plus'] = esc_html__('Google Plus', 'mashup');
	    $mashup_var_static_text['mashup_var_tumblr'] = esc_html__('Tumblr', 'mashup');
	    $mashup_var_static_text['mashup_var_dribbble'] = esc_html__('Dribbble', 'mashup');
	    $mashup_var_static_text['mashup_var_instagram'] = esc_html__('Instagram', 'mashup');
	    $mashup_var_static_text['mashup_var_stumbleupon'] = esc_html__('StumbleUpon', 'mashup');
	    $mashup_var_static_text['mashup_var_youtube'] = esc_html__('youtube', 'mashup');
	    $mashup_var_static_text['mashup_var_share_more'] = esc_html__('share more', 'mashup');

	    /*
	     * Sidebar
	     */
	    $mashup_var_static_text['mashup_var_sidebar'] = esc_html__('Select Sidebar', 'mashup');
	    $mashup_var_static_text['mashup_var_sidebar_name'] = esc_html__('Sidebar Name', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_sidebar_hint'] = esc_html__('Select a sidebar from the list already given. (Nine pre-made sidebars are given)', 'mashup');
	    $mashup_var_static_text['mashup_var_default_pages'] = esc_html__('Default Pages', 'mashup');
	    $mashup_var_static_text['mashup_var_default_pages_sidebar'] = esc_html__('Default Pages Sidebar', 'mashup');
	    $mashup_var_static_text['mashup_var_default_pages_layout'] = esc_html__('Default Pages Layout', 'mashup');
	    $mashup_var_static_text['mashup_var_default_pages_layout_hint'] = esc_html__('Set Sidebar for all pages like Search, Author Archive, Category Archive etc', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_default_pages_sidebar_hint'] = esc_html__('Select pre-made sidebars for default pages on sidebar layout. Full width layout cannot have sidebars', 'mashup');
	    /**
	     * Maintenance Mode
	     */
	    $mashup_var_static_text['mashup_var_theme_option_maintenance_mode_hint'] = esc_html__('Turn Maintenance Mode On/Off here', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_maintenance_mode_logo_hint'] = esc_html__('Turn Logo On/Off here', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_maintenance_mode_social'] = esc_html__('Social Contact', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_maintenance_mode_social_hint'] = esc_html__('Turn Social Contact On/Off here', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_maintenance_mode_newsletter'] = esc_html__('Newsletter', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_maintenance_mode_newsletter_hint'] = esc_html__('Turn newsletter On/Off here', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_maintenance_mode_header'] = esc_html__('Header Switch', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_maintenance_mode_header_hint'] = esc_html__('Turn Header On/Off here', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_maintenance_mode_footer'] = esc_html__('Footer Switch', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_maintenance_mode_footer_hint'] = esc_html__('Turn Footer On/Off here', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_maintenance_mode_no_title'] = esc_html__('No Title', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_maintenance_mode_page'] = esc_html__('Maintenance Mode page', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_maintenance_mode_page_hint'] = esc_html__('Choose a page that you want to set for maintenance mode', 'mashup');
	    /**
	     * API Setting
	     */
	    $mashup_var_static_text['mashup_var_theme_option_mailchimp_key'] = esc_html__('Mail Chimp Key', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_mailchimp_key_hint'] = esc_html__('Enter a valid Mail Chimp API key here to get started. Once you\'\'ve done that, you can use the Mail Chimp Widget from the Widgets menu. You will need to have at least Mail Chimp list set up before the using the widget. You can get your mail chimp activation key', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_mailchimp_list'] = esc_html__('Mail Chimp List', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_flickr_api_setting'] = esc_html__('Flickr API Setting', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_flickr_key'] = esc_html__('Flickr key', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_flickr_key_hint'] = esc_html__('add your flickr key here.', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_twitter_api_setting'] = esc_html__('Twitter API Setting', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_twitter_consumer_key'] = esc_html__('Consumer Key', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_twitter_consumer_key_hint'] = esc_html__('insert your consumer key here.', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_twitter_cache_time_limit'] = esc_html__('Cache Time Limit', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_twitter_cache_time_limit_hint'] = esc_html__('Please enter the time limit in minutes for refresh cache.', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_twitter_num'] = esc_html__('Number of tweet', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_twitter_num_hint'] = esc_html__('Please enter number of tweet that you get from twitter for chache file.', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_twitter_date_time_formate'] = esc_html__('Date Time Formate', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_twitter_date_time_formate_hint'] = esc_html__('Select date time formate for every tweet.', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_twitter_date_time_formate_1'] = esc_html__('Displays November 06 2012', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_twitter_date_time_formate_2'] = esc_html__('Displays 6th November', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_twitter_date_time_formate_3'] = esc_html__('Displays 06 Nov', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_twitter_date_time_formate_4'] = esc_html__('Displays 06 Nov 2012', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_twitter_date_time_formate_5'] = esc_html__('Displays Tues 06 Nov 2012', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_twitter_date_time_formate_6'] = esc_html__('Displays in hours, minutes etc', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_twitter_consumer_secret'] = esc_html__('Consumer Secret', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_twitter_consumer_secret_hint'] = esc_html__('insert your cunsumer secret key here.', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_twitter_access_token'] = esc_html__('Access Token', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_twitter_access_token_hint'] = esc_html__('insert access token here.', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_twitter_access_token_secret'] = esc_html__('Access Token Secret', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_twitter_access_token_secret_hint'] = esc_html__('insert access token secret here.', 'mashup');

	    /**
	     * import & export
	     */
	    $mashup_var_static_text['mashup_var_theme_option_import_export'] = esc_html__('import & export', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_backup_option'] = esc_html__('Theme Backup Options', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_backup'] = esc_html__('Backup', 'mashup');
	    $mashup_var_static_text['mashup_var_widgets_backup_options'] = esc_html__('Widgets Backup Options', 'mashup');
	    $mashup_var_static_text['mashup_var_widgets_backup'] = esc_html__('Widgets Backup', 'mashup');
	    /**
	     * Menu
	     */
	    $mashup_var_static_text['mashup_var_theme_option_typo_font'] = esc_html__('Typography / Fonts', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_custom_font'] = esc_html__('Custom Font', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_google_font'] = esc_html__('Google Fonts', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_sidebar'] = esc_html__('Sidebar', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_footer_sidebar'] = esc_html__('Footer sidebar', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_maintaince_mode'] = esc_html__('MAINTENANCE MODE', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_api_setting'] = esc_html__('API Setting', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_layout'] = esc_html__('Layout', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_layout_type'] = esc_html__('Layout type', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_box'] = esc_html__('Boxed', 'mashup');
	    $mashup_var_static_text['mashup_var_background'] = esc_html__('Background', 'mashup');
	    $mashup_var_static_text['mashup_var_bgcolor'] = esc_html__('Background color', 'mashup');
	    $mashup_var_static_text['mashup_var_bgcolor_hint'] = esc_html__('Set Subheader Background color', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_pattern'] = esc_html__('Pattern', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_custom_image'] = esc_html__('Custom Image', 'mashup');
	    $mashup_var_static_text['mashup_var_background_image'] = esc_html__('Background image', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_bg_image_hint'] = esc_html__('Choose from Predefined Background images.', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_bg_pattern'] = esc_html__('Background pattern', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_bg_pattern_hint'] = esc_html__('Choose from Predefined Pattern images.', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_bgcolor_hint'] = esc_html__('Provide a hex color code here (with #) for theme background color.', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_layout_hint'] = esc_html__('This option can be used only with Boxed Layout.', 'mashup');
	    $mashup_var_static_text['mashup_var_bg_image_position'] = esc_html__('Background image position', 'mashup');
            $mashup_var_static_text['mashup_var_theme_skin'] = esc_html__('Theme Skin', 'mashup');
            $mashup_var_static_text['mashup_var_theme_skin_hint'] = esc_html__('Choose theme default skin style.', 'mashup');
            $mashup_var_static_text['mashup_var_dark'] = esc_html__('Dark', 'mashup');
            $mashup_var_static_text['mashup_var_light'] = esc_html__('Light', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_option_bg_image_position_hint'] = esc_html__('Choose image position for body background', 'mashup');
	    $mashup_var_static_text['mashup_var_no_repeat_center_top'] = esc_html__('no-repeat center top', 'mashup');
	    $mashup_var_static_text['mashup_var_repeat_center_top'] = esc_html__('repeat center top', 'mashup');
	    $mashup_var_static_text['mashup_var_no_repeat_center'] = esc_html__('no-repeat center', 'mashup');
	    $mashup_var_static_text['mashup_var_repeat_center'] = esc_html__('Repeat Center', 'mashup');
	    $mashup_var_static_text['mashup_var_no_repeat_left_top'] = esc_html__('no-repeat left top', 'mashup');
	    $mashup_var_static_text['mashup_var_repeat_left_top'] = esc_html__('repeat left top', 'mashup');
	    $mashup_var_static_text['mashup_var_no_repeat_fixed_center'] = esc_html__('no-repeat fixed center', 'mashup');
	    $mashup_var_static_text['mashup_var_no_repeat_fixed_center_cover.'] = esc_html__('no-repeat fixed center / cover', 'mashup');
	    $mashup_var_static_text['mashup_var_woocommerce_add_to_cart'] = esc_html__('add to cart', 'mashup');

	    /**
	     * Post Detail
	     */
	    $mashup_var_static_text['mashup_var_posted_on'] = esc_html__('POSTED ON', 'mashup');
	    $mashup_var_static_text['mashup_var_posted_by'] = esc_html__('BY', 'mashup');
	    $mashup_var_static_text['mashup_var_ago'] = esc_html__('ago', 'mashup');
	    $mashup_var_static_text['mashup_var_logout'] = esc_html__('Log Out', 'mashup');

	    return $mashup_var_static_text;
	}

	function mashup_var_login_strings() {
	    global $mashup_var_static_text;
	    /*
	     * Sign Up
	     * Sign In
	     * Forget Password
	     * */
	    $mashup_var_static_text['mashup_var_join_us'] = esc_html__(' Register', 'mashup');
	    $mashup_var_static_text['mashup_var_confirm_password'] = esc_html__('CONFIRM PASSWORD ', 'mashup');
	    $mashup_var_static_text['mashup_var_user_registration'] = esc_html__('User Registration is disabled', 'mashup');
	    $mashup_var_static_text['mashup_var_you_have_already_logged_in'] = esc_html__(' You have already logged in, Please logout to try again.', 'mashup');
	    $mashup_var_static_text['mashup_var_please_logout_first'] = esc_html__('Please logout first then try to login again', 'mashup');
	    $mashup_var_static_text['mashup_var_user_login'] = esc_html__('User Login', 'mashup');
	    $mashup_var_static_text['mashup_var_username'] = esc_html__('USERNAME', 'mashup');
	    $mashup_var_static_text['mashup_var_password'] = esc_html__('PASSWORD', 'mashup');
	    $mashup_var_static_text['mashup_var_log_in'] = esc_html__('Login', 'mashup');
	    $mashup_var_static_text['mashup_var_forgot_password'] = esc_html__('Forgot Password', 'mashup');
	    $mashup_var_static_text['mashup_var_new_to_us'] = esc_html__('New to Us?', 'mashup');
	    $mashup_var_static_text['mashup_var_signup_signin'] = esc_html__('Signup / Signin with', 'mashup');
	    $mashup_var_static_text['mashup_var_desired_username'] = esc_html__('Type desired username', 'mashup');
	    $mashup_var_static_text['mashup_var_phone'] = esc_html__('Phone Number', 'mashup');
	    $mashup_var_static_text['mashup_var_phone_hint'] = esc_html__('Enter Phone Number', 'mashup');
	    $mashup_var_static_text['mashup_var_register_here'] = esc_html__('Register Here', 'mashup');
	    $mashup_var_static_text['mashup_var_create_account'] = esc_html__('Create Account', 'mashup');
	    $mashup_var_static_text['mashup_var_not_member_yet'] = esc_html__('Not a Member yet?', 'mashup');
	    $mashup_var_static_text['mashup_var_Sign_up_now'] = esc_html__('Sign Up Now', 'mashup');
	    $mashup_var_static_text['mashup_var_or'] = esc_html__('Or', 'mashup');
	    $mashup_var_static_text['mashup_var_sign_in'] = esc_html__('Sign in', 'mashup');

	    $mashup_var_static_text['mashup_var_already_have_account'] = esc_html__(' Already have account', 'mashup');
	    $mashup_var_static_text['mashup_var_login_now'] = esc_html__(' Login Now', 'mashup');
	    $mashup_var_static_text['mashup_var_user_sign_in'] = esc_html__('User Sign in', 'mashup');

	    /*
	     *  Login File
	     * */
	    $mashup_var_static_text['mashup_var_edit_register_options'] = esc_html__('User Registration Options', 'mashup');
	    $mashup_var_static_text['mashup_var_set_api_key'] = esc_html__('Please set API key', 'mashup');
	    $mashup_var_static_text['mashup_var_signin_with_your_Social_networks'] = esc_html__('Signin with your Social Networks', 'mashup');
	    $mashup_var_static_text['mashup_var_google'] = esc_html__('google', 'mashup');
	    $mashup_var_static_text['mashup_var_google_plus_icon'] = esc_html__('google', 'mashup');
	    $mashup_var_static_text['mashup_var_linkedin'] = esc_html__('Linkedin', 'mashup');
	    $mashup_var_static_text['mashup_var_linkedin_title'] = esc_html__('linked-in', 'mashup');
	    $mashup_var_static_text['mashup_var_send_email'] = esc_html__('Send Email', 'mashup');
	    $mashup_var_static_text['mashup_var_login_here'] = esc_html__('Login Here', 'mashup');
	    $mashup_var_static_text['mashup_var_enter_email_address'] = esc_html__('Enter E-Mail address...', 'mashup');
	    $mashup_var_static_text['mashup_var_signup_now'] = esc_html__('Sign up Now', 'mashup');
	    $mashup_var_static_text['mashup_var_password_recovery'] = esc_html__('Password Recovery', 'mashup');
	    $mashup_var_static_text['mashup_var_oops_something_went_wrong_updating_your_account'] = esc_html__('Oops something went wrong updating your account', 'mashup');
	    $mashup_var_static_text['mashup_var_check_your_email_address_for_new_password'] = esc_html__('Check your email for your new password.', 'mashup');
	    $mashup_var_static_text['mashup_var_ur_request_has_been_completed_succssfully'] = esc_html__('Your request has been completed succssfully, Now you can use following information for login.', 'mashup');
	    $mashup_var_static_text['mashup_var_your_new_password'] = esc_html__('Your new password', 'mashup');
	    $mashup_var_static_text['mashup_var_your_username_is'] = esc_html__('Your username is:', 'mashup');
	    $mashup_var_static_text['mashup_var_your_new_password_is'] = esc_html__('Your new password is:', 'mashup');
	    $mashup_var_static_text['mashup_var_from'] = esc_html__('From:', 'mashup');
	    $mashup_var_static_text['mashup_var_there_is_no_user_registered'] = esc_html__('There is no user registered with that email address.', 'mashup');
	    $mashup_var_static_text['mashup_var_invalid_email_address'] = esc_html__('Invalid e-mail address.', 'mashup');
	    $mashup_var_static_text['mashup_var_username_should_not_be_empty'] = esc_html__('User name should not be empty.', 'mashup');
	    $mashup_var_static_text['mashup_var_password_should_not_be_empty.'] = esc_html__('Password should not be empty.', 'mashup');
	    $mashup_var_static_text['mashup_var_email_should_not_be_empty'] = esc_html__('Email should not be empty.', 'mashup');
	    $mashup_var_static_text['mashup_var_wrong_username_or_password'] = esc_html__('Wrong username or password.', 'mashup');
	    $mashup_var_static_text['mashup_var_login_successfully'] = esc_html__('Login Successfully...', 'mashup');
	    $mashup_var_static_text['mashup_var_valid_username'] = esc_html__('Please enter a valid username. You can only enter alphanumeric value and only ( _ ) longer than or equals 5 chars', 'mashup');
	    $mashup_var_static_text['mashup_var_valid_email'] = esc_html__('Please enter a valid email.', 'mashup');
	    $mashup_var_static_text['mashup_var_user_already_exists'] = esc_html__('User already exists. Please try another one.', 'mashup');
	    $mashup_var_static_text['mashup_var_user_registration_detail'] = esc_html__('User registration detail', 'mashup');
	    $mashup_var_static_text['mashup_var_check_email'] = esc_html__('Please check your email for login details', 'mashup');
	    $mashup_var_static_text['mashup_var_currently_issue'] = esc_html__('Currently there are and issue', 'mashup');
	    $mashup_var_static_text['mashup_var_successfully_registered'] = esc_html__('Your account has been registered successfully, Please contact to site admin for password.', 'mashup');
	    $mashup_var_static_text['mashup_var_captcha_api_key'] = esc_html__('Please provide google captcha API keys', 'mashup');
	    $mashup_var_static_text['mashup_var_select_captcha_field'] = esc_html__('Please select captcha field.', 'mashup');
	    $mashup_var_static_text['mashup_var_reload'] = esc_html__('Reload', 'mashup');
	    $mashup_var_static_text['mashup_var_already_linked'] = esc_html__('This profile is already linked with other account. Linking process failed!', 'mashup');
	    $mashup_var_static_text['mashup_var_error'] = esc_html__('ERROR', 'mashup');
	    $mashup_var_static_text['mashup_var_something_went_wrong'] = esc_html__('Something went wrong: %s', 'mashup');
	    $mashup_var_static_text['mashup_var_problem_connecting_to_twitter'] = esc_html__(' There is problem while connecting to twitter', 'mashup');
	    $mashup_var_static_text['mashup_var_login_error'] = esc_html__('Login error', 'mashup');


	    return $mashup_var_static_text;
	}

	public function mashup_theme_option_field_strings() {
	    global $mashup_var_static_text;
	    $mashup_var_static_text['mashup_var_demo'] = esc_html__('Demo', 'mashup');
	    $mashup_var_static_text['mashup_var_import'] = esc_html__('Import', 'mashup');
	    $mashup_var_static_text['mashup_var_import_options'] = esc_html__('Import Options', 'mashup');
	    $mashup_var_static_text['mashup_var_location_and_hit_import_button'] = esc_html__('Input the URL from another location and hit Import Button to apply settings', 'mashup');
	    $mashup_var_static_text['mashup_var_please_select_a_page'] = esc_html__('Please select a page', 'mashup');
	    $mashup_var_static_text['mashup_var_export_options'] = esc_html__('Export Options', 'mashup');
	    $mashup_var_static_text['mashup_var_restore'] = esc_html__('Restore', 'mashup');
	    $mashup_var_static_text['mashup_var_error_saving_file'] = esc_html__('Error saving file!', 'mashup');
	    $mashup_var_static_text['mashup_var_backup_generated'] = esc_html__('Backup Generated.', 'mashup');
	    $mashup_var_static_text['mashup_var_file_deleted_successfully'] = esc_html__("File '%s' Deleted Successfully", 'mashup');
	    $mashup_var_static_text['mashup_var_error_deleting_file'] = esc_html__('Error Deleting file!', 'mashup');
	    $mashup_var_static_text['mashup_var_file_import_successfully'] = esc_html__('File Import Successfully', 'mashup');
	    $mashup_var_static_text['mashup_var_error_restoring_file'] = esc_html__('Error Restoring file!', 'mashup');
	    $mashup_var_static_text['mashup_var_file_restore_successfully'] = esc_html__("File '%s' Restore Successfully", 'mashup');
	    $mashup_var_static_text['mashup_var_download_backups_hint'] = esc_html__('Here you can Generate/Download Backups. Also you can use these Backups to Restore settings.', 'mashup');
	    $mashup_var_static_text['mashup_var_download'] = esc_html__('Download', 'mashup');
	    $mashup_var_static_text['mashup_var_generate_backup'] = esc_html__('Generate Backup', 'mashup');
	    $mashup_var_static_text['mashup_var_import_widgets'] = esc_html__('Import Widgets', 'mashup');
	    $mashup_var_static_text['mashup_var_show_widget_settings'] = esc_html__('Show Widget Settings', 'mashup');
		$mashup_var_static_text['mashup_var_import_widget_settings'] = esc_html__('Import Widget Settings', 'mashup');
	    $mashup_var_static_text['mashup_var_font_family'] = esc_html__('Font Family', 'mashup');
	    $mashup_var_static_text['mashup_var_browse'] = esc_html__('Browse', 'mashup');
	    $mashup_var_static_text['mashup_var_add_sidebar'] = esc_html__('Add Sidebar', 'mashup');
	    $mashup_var_static_text['mashup_var_already_added_sidebar'] = esc_html__('Added Sidebars', 'mashup');
	    $mashup_var_static_text['mashup_var_actions'] = esc_html__('Actions', 'mashup');
	    $mashup_var_static_text['mashup_var_alert_msg'] = esc_html__('Are you sure! You want to delete this', 'mashup');
	    $mashup_var_static_text['mashup_var_remove'] = esc_html__('Remove', 'mashup');
	    $mashup_var_static_text['mashup_var_footer_sidebar_title'] = esc_html__('Please enter the desired title of Footer sidebar', 'mashup');
	    $mashup_var_static_text['mashup_var_2column'] = esc_html__('2 Column (16.67%)', 'mashup');
	    $mashup_var_static_text['mashup_var_3column'] = esc_html__('3 Column (25%)', 'mashup');
	    $mashup_var_static_text['mashup_var_4column'] = esc_html__('4 Column (33.33%)', 'mashup');
	    $mashup_var_static_text['mashup_var_6column'] = esc_html__('6 Column (50%)', 'mashup');
	    $mashup_var_static_text['mashup_var_8column'] = esc_html__('8 Column (66.66%)', 'mashup');
	    $mashup_var_static_text['mashup_var_9column'] = esc_html__('9 Column (75%)', 'mashup');
	    $mashup_var_static_text['mashup_var_10column'] = esc_html__('10 Column (83.33%)', 'mashup');
	    $mashup_var_static_text['mashup_var_12column'] = esc_html__('12 Column (100%)', 'mashup');
	    $mashup_var_static_text['mashup_var_siderbar_name'] = esc_html__('SiderBar Name', 'mashup');
	    $mashup_var_static_text['mashup_var_siderbar_width'] = esc_html__('Sider Bar Width', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_color'] = esc_html__('Icon Color', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_color_hint'] = esc_html__('Set Icon Color', 'mashup');
	    $mashup_var_static_text['mashup_var_add'] = esc_html__('+ Add to List', 'mashup');
	    $mashup_var_static_text['mashup_var_already_added_social_icon'] = esc_html__('Added Social Icons', 'mashup');
	    $mashup_var_static_text['mashup_var_network_name'] = esc_html__('Network Name', 'mashup');

	    $mashup_var_static_text['mashup_var_export_widgets'] = esc_html__('Export Widgets', 'mashup');
	    $mashup_var_static_text['mashup_var_default_font'] = esc_html__(' Default Font', 'mashup');
	    $mashup_var_static_text['mashup_var_sticky_text'] = esc_html__('STICKY POST', 'mashup');
	    $mashup_var_static_text['select_header_style'] = esc_html__('Header Style', 'mashup');
	    return $mashup_var_static_text;
	}

	public function mashup_plugin_activation_strings() {
	    global $mashup_var_static_text;
	    $mashup_var_static_text['mashup_var_theme_option_revolution_slider'] = esc_html__('Revolution Slider', 'mashup');
	    $mashup_var_static_text['mashup_var_notice_can_install_required'] = _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'mashup');
	    $mashup_var_static_text['mashup_var_notice_can_install_recommended'] = _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'mashup');
	    $mashup_var_static_text['mashup_var_notice_cannot_install'] = _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin.', 'Sorry, but you do not have the correct permissions to install the %s plugins.', 'mashup');
	    $mashup_var_static_text['mashup_var_notice_can_activate_required'] = _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'mashup');
	    $mashup_var_static_text['mashup_var_notice_can_activate_recommended'] = _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'mashup');
	    $mashup_var_static_text['mashup_var_notice_cannot_activate'] = _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin.', 'Sorry, but you do not have the correct permissions to activate the %s plugins.', 'mashup');
	    $mashup_var_static_text['mashup_var_notice_ask_to_update'] = _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'mashup');
	    $mashup_var_static_text['mashup_var_notice_cannot_update'] = _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin.', 'Sorry, but you do not have the correct permissions to update the %s plugins.', 'mashup');
	    $mashup_var_static_text['mashup_var_install_link'] = _n_noop('Begin installing plugin', 'Begin installing plugins', 'mashup');
	    $mashup_var_static_text['mashup_var_activate_link'] = _n_noop('Begin activating plugin', 'Begin activating plugins', 'mashup');
	    $mashup_var_static_text['mashup_var_sorry'] = _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'mashup');
	    $mashup_var_static_text['mashup_var_sorry_not_permission'] = _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'mashup');
	    $mashup_var_static_text['mashup_var_sorry_updated'] = _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'mashup');
	    $mashup_var_static_text['mashup_var_activate_installed'] = _n_noop('Activate installed plugin', 'Activate installed plugins', 'mashup');
	    $mashup_var_static_text['mashup_var_install_require_plugins'] = esc_html__('Install Required Plugins', 'mashup');
	    $mashup_var_static_text['mashup_var_install_plugins'] = esc_html__('Install Plugins', 'mashup');
		$mashup_var_static_text['mashup_var_install_plugins_woocommerce'] = esc_html__('Woocommerce', 'mashup');
		$mashup_var_static_text['mashup_var_install_plugins_loco_translate'] = esc_html__('Loco translate', 'mashup');
	    /* Tgm New Strings */

	    $mashup_var_static_text['mashup_var_updating_plugins'] = esc_html__('Updating Plugin: %s', 'mashup');
	    $mashup_var_static_text['mashup_var_something_went_wrong'] = esc_html__('Something went wrong with the plugin API.', 'mashup');
	    $mashup_var_static_text['mashup_var_ask_to_update_maybe'] = esc_html__('There is an update available for: %1$s. There are updates available for the following plugins: %1$s.', 'mashup');
	    $mashup_var_static_text['mashup_var_update_link'] = esc_html__('Begin updating plugin Begin updating plugins', 'mashup');
	    $mashup_var_static_text['mashup_var_small'] = esc_html__('Small', 'mashup');
	    $mashup_var_static_text['mashup_var_medium'] = esc_html__('Medium', 'mashup');
	    $mashup_var_static_text['mashup_var_large'] = esc_html__('Large', 'mashup');



	    $mashup_var_static_text['mashup_var_plugin_needs_higher_version'] = esc_html__('Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'mashup');
	    $mashup_var_static_text['mashup_var_notice_cannot_install_activate'] = esc_html__('There are one or more required or recommended plugins to install, update or activate.', 'mashup');
	    $mashup_var_static_text['mashup_var_plugin_need_to_be_updated'] = esc_html__('This plugin needs to be updated to be compatible with your theme.', 'mashup');
	    $mashup_var_static_text['mashup_var_update_required'] = esc_html__('Update Required', 'mashup');

	    $mashup_var_static_text['mashup_var_updated'] = esc_html__('updated', 'mashup');
	    $mashup_var_static_text['mashup_var_version'] = esc_html__('Version', 'mashup');
	    $mashup_var_static_text['mashup_var_upgrade_msg'] = esc_html__('Upgrade message from the plugin author:', 'mashup');
	    $mashup_var_static_text['mashup_var_installed_no_action_taken'] = esc_html__('No plugins were selected to be installed. No action taken.', 'mashup');
	    $mashup_var_static_text['mashup_var_updated_no_action_taken'] = esc_html__('No plugins were selected to be updated. No action taken.', 'mashup');

	    $mashup_var_static_text['mashup_var_no_updated_at_this_time'] = esc_html__('No plugins are available to be updated at this time.', 'mashup');
	    $mashup_var_static_text['mashup_var_install_at_this_time'] = esc_html__('No plugins are available to be installed at this time.', 'mashup');



	    $mashup_var_static_text['mashup_var_no_plugin_install_update_activate'] = esc_html__('No plugins to install, update or activate.', 'mashup');
	    $mashup_var_static_text['mashup_var_install_2s'] = esc_html__('Install %2$s', 'mashup');
	    $mashup_var_static_text['mashup_var_update_2s'] = esc_html__('Update %2$s', 'mashup');
	    $mashup_var_static_text['mashup_var_activate_2s'] = esc_html__('Activate %2$s', 'mashup');

	    $mashup_var_static_text['mashup_var_activable_version'] = esc_html__('Available version:', 'mashup');
	    $mashup_var_static_text['mashup_var_minimum_required_version'] = esc_html__('Minimum required version:', 'mashup');
	    $mashup_var_static_text['mashup_var_install_version'] = esc_html__('Installed version:', 'mashup');
	    $mashup_var_static_text['mashup_var_version_nr_unknown'] = _x('unknown', 'as in: "version nr unknown"', 'mashup');

	    $mashup_var_static_text['mashup_var_install_update_status'] = _x('%1$s, %2$s', 'Install/Update Status', 'mashup');
	    $mashup_var_static_text['mashup_var_update_recommended'] = esc_html__('Update recommended', 'mashup');
	    $mashup_var_static_text['mashup_var_requires_update_not_available'] = esc_html__('Required Update not Available', 'mashup');
	    $mashup_var_static_text['mashup_var_active'] = esc_html__('Active', 'mashup');
	    $mashup_var_static_text['mashup_var_requires_update'] = esc_html__('Requires Update', 'mashup');



	    $mashup_var_static_text['mashup_var_updating_plugin_1s'] = esc_html__('Updating Plugin %1$s (%2$d/%3$d)', 'mashup');
	    $mashup_var_static_text['mashup_var_error_occurred'] = esc_html__('An error occurred while installing %1$s: <strong>%2$s</strong>.', 'mashup');
	    $mashup_var_static_text['mashup_var_updated'] = esc_html__('updated', 'mashup');
	    $mashup_var_static_text['mashup_var_version'] = esc_html__('Version', 'mashup');
	    $mashup_var_static_text['mashup_var_no_plugins_activated_at_time'] = esc_html__('No plugins are available to be activated at this time.', 'mashup');
	    $mashup_var_static_text['mashup_var_no_plugins_activated'] = esc_html__('No plugins were selected to be activated. No action taken.', 'mashup');
	    $mashup_var_static_text['mashup_var_plugina_pluginb'] = _x('and', 'plugin A *and* plugin B', 'mashup');
	    $mashup_var_static_text['mashup_var_plugin_actived_successfully'] = esc_html__('The following plugin was activated successfully: The following plugins were activated successfully:', 'mashup');



	    /**/
	    $mashup_var_static_text['mashup_var_installing_plugins'] = esc_html__('Installing Plugin: %s', 'mashup');
	    $mashup_var_static_text['mashup_var_something_wrong'] = esc_html__('Something went wrong.', 'mashup');
	    $mashup_var_static_text['mashup_var_return'] = esc_html__('Return to Required Plugins Installer', 'mashup');
	    $mashup_var_static_text['mashup_var_dashboard'] = esc_html__('Return to the dashboard', 'mashup');
	    $mashup_var_static_text['mashup_var_plugin_activated'] = esc_html__('Plugin activated successfully.', 'mashup');
	    $mashup_var_static_text['mashup_var_activated_successfully'] = esc_html__('The following plugin was activated successfully:', 'mashup');
	    $mashup_var_static_text['mashup_var_complete'] = esc_html__('All plugins installed and activated successfully. %1$s', 'mashup');
	    $mashup_var_static_text['mashup_var_dismiss'] = esc_html__('Dismiss this notice', 'mashup');
	    $mashup_var_static_text['mashup_var_contact_admin'] = esc_html__('Please contact the administrator of this site for help.', 'mashup');
	    $mashup_var_static_text['mashup_var_rename_failed'] = esc_html__('The remote plugin package is does not contain a folder with the desired slug and renaming did not work.', 'mashup');
	    $mashup_var_static_text['mashup_var_plugin_provider'] = esc_html__('Please contact the plugin provider and ask them to package their plugin according to the WordPress guidelines.', 'mashup');
	    $mashup_var_static_text['mashup_var_packaged_wrong'] = esc_html__('The remote plugin package consists of more than one file, but the files are not packaged in a folder.', 'mashup');
	    $mashup_var_static_text['mashup_var_wordpress_guidelines'] = esc_html__('Please contact the plugin provider and ask them to package their plugin according to the WordPress guidelines.', 'mashup');
	    $mashup_var_static_text['mashup_var_already_active'] = esc_html__('No action taken. Plugin %1$s was already active.', 'mashup');
	    $mashup_var_static_text['mashup_var_external_source'] = esc_html__('External Source', 'mashup');
	    $mashup_var_static_text['mashup_var_pre_packaged'] = esc_html__('Pre-Packaged', 'mashup');
	    $mashup_var_static_text['mashup_var_repository'] = esc_html__('WordPress Repository', 'mashup');
	    $mashup_var_static_text['mashup_var_required'] = esc_html__('Required', 'mashup');
	    $mashup_var_static_text['mashup_var_recommended'] = esc_html__('Recommended', 'mashup');
	    $mashup_var_static_text['mashup_var_not_installed'] = esc_html__('Not Installed', 'mashup');
	    $mashup_var_static_text['mashup_var_installed_but'] = esc_html__('Installed But Not Activated', 'mashup');
	    $mashup_var_static_text['mashup_var_no_plugins'] = esc_html__('No plugins to install or activate. Return to the Dashboard', 'mashup');
	    $mashup_var_static_text['mashup_var_plugin'] = esc_html__('Plugin', 'mashup');
	    $mashup_var_static_text['mashup_var_source'] = esc_html__('Source', 'mashup');
	    $mashup_var_static_text['mashup_var_type'] = esc_html__('Type', 'mashup');
	    $mashup_var_static_text['mashup_var_status'] = esc_html__('Status', 'mashup');
	    $mashup_var_static_text['mashup_var_install'] = esc_html__('Install', 'mashup');
	    $mashup_var_static_text['mashup_var_activate'] = esc_html__('Activate', 'mashup');
	    $mashup_var_static_text['mashup_var_no_plugin_available'] = esc_html__('No plugins are available to be installed at this time', 'mashup');
	    $mashup_var_static_text['mashup_var_no_package'] = esc_html__('Install package not available', 'mashup');
	    $mashup_var_static_text['mashup_var_downloading_package'] = esc_html__('Downloading install package from %s', 'mashup');
	    $mashup_var_static_text['mashup_var_unpack_package'] = esc_html__('Unpacking the package', 'mashup');
	    $mashup_var_static_text['mashup_var_installing_package'] = esc_html__('Installing the plugin', 'mashup');
	    $mashup_var_static_text['mashup_var_process_failed'] = esc_html__('Plugin install failed.', 'mashup');
	    $mashup_var_static_text['mashup_var_process_success'] = esc_html__('Plugin installed successfully.', 'mashup');
	    $mashup_var_static_text['mashup_var_activation_failed'] = esc_html__('Plugin activation failed.', 'mashup');
	    $mashup_var_static_text['mashup_var_activation_success'] = esc_html__('Plugin activated successfully.', 'mashup');
	    $mashup_var_static_text['mashup_var_skin_update_failed_error'] = esc_html__('An error occurred while installing %1$s: %2$s.', 'mashup');
	    $mashup_var_static_text['mashup_var_skin_update_failed'] = esc_html__('The installation of %1$s failed.', 'mashup');
	    $mashup_var_static_text['mashup_var_skin_upgrade_start'] = esc_html__('The installation and activation process is starting. This process may take a while on some hosts, so please be patient.', 'mashup');
	    $mashup_var_static_text['mashup_var_skin_update_successful'] = esc_html__('%1$s installed and activated successfully.', 'mashup');
	    $mashup_var_static_text['mashup_var_show_details'] = esc_html__('Show Details', 'mashup');
	    $mashup_var_static_text['mashup_var_skin_upgrade_end'] = esc_html__('All installations and activations have been completed.', 'mashup');
	    $mashup_var_static_text['mashup_var_skin_before_update_header'] = esc_html__('Installing and Activating Plugin %1$s (%2$d/%3$d)', 'mashup');
	    $mashup_var_static_text['mashup_var_upgrade_start'] = esc_html__('The installation process is starting. This process may take a while on some hosts, so please be patient.', 'mashup');
	    $mashup_var_static_text['mashup_var_hide_details'] = esc_html__('Hide Details', 'mashup');
	    $mashup_var_static_text['mashup_var_update_successful'] = esc_html__('%1$s installed successfully.', 'mashup');
	    $mashup_var_static_text['mashup_var_upgrade_end'] = esc_html__('All installations have been completed.', 'mashup');
	    $mashup_var_static_text['mashup_var_before_update_header'] = esc_html__('Installing Plugin %1$s (%2$d/%3$d)', 'mashup');
	    $mashup_var_static_text['mashup_var_framework'] = esc_html__('CS mashup Framework', 'mashup');
	    $mashup_var_static_text['mashup_var_wrong'] = esc_html__('Something went wrong with the plugin API', 'mashup');
	    return $mashup_var_static_text;
	}

	public function mashup_short_code_strings() {
	    global $mashup_var_static_text;
	    $mashup_var_static_text['mashup_var_element_title'] = esc_html__('Element Title', 'mashup');
	    $mashup_var_static_text['mashup_var_element_title_hint'] = esc_html__('Enter element title here.', 'mashup');
	    $mashup_var_static_text['mashup_var_element_post_title_length'] = esc_html__('Post Title Length', 'mashup');
	    $mashup_var_static_text['mashup_var_element_post_title_length_hint'] = esc_html__('Please enter post title length in numeric', 'mashup');
	    $mashup_var_static_text['mashup_var_element_sub_title'] = esc_html__('Element Sub Title', 'mashup');
	    $mashup_var_static_text['mashup_var_element_sub_title_hint'] = esc_html__('Enter element sub title here.', 'mashup');
	    $mashup_var_static_text['mashup_var_excerpt_length'] = esc_html__('Excerpt Length', 'mashup');

	    $mashup_var_static_text['mashup_var_title'] = esc_html__('Title', 'mashup');
	    $mashup_var_static_text['mashup_var_title_hint'] = esc_html__('Enter title here.', 'mashup');
	    $mashup_var_static_text['mashup_var_title_color'] = esc_html__('Title Color', 'mashup');
	    $mashup_var_static_text['mashup_var_title_color_hint'] = esc_html__('Set title color with this color picker.', 'mashup');

	    $mashup_var_static_text['mashup_var_sel_col'] = esc_html__('Select Column', 'mashup');
	    $mashup_var_static_text['mashup_var_col'] = esc_html__('Column', 'mashup');
	    $mashup_var_static_text['mashup_var_sel_col_hint'] = esc_html__('Select Column view from this drop down', 'mashup');
	    $mashup_var_static_text['mashup_var_sc_edit_msg'] = esc_html__('Edit Form Options', 'mashup');
	    $mashup_var_static_text['mashup_var_image_field'] = esc_html__('Image', 'mashup');
	    $mashup_var_static_text['mashup_var_image_field_alignment'] = esc_html__('Alignment', 'mashup');
	    $mashup_var_static_text['mashup_var_image_field_alignment_hint'] = esc_html__('Set Alignment for Image', 'mashup');
	    $mashup_var_static_text['mashup_var_image_hint'] = esc_html__('Select Image from media gallery with this button', 'mashup');

	    $mashup_var_static_text['mashup_var_save'] = esc_html__('Save', 'mashup');
	    $mashup_var_static_text['mashup_var_insert'] = esc_html__('Insert', 'mashup');
	    $mashup_var_static_text['mashup_var_yes'] = esc_html__('Yes', 'mashup');
	    $mashup_var_static_text['mashup_var_no'] = esc_html__('No', 'mashup');
	    $mashup_var_static_text['mashup_var_text'] = esc_html__('Text', 'mashup');
	    $mashup_var_static_text['mashup_var_edit_sitemap'] = esc_html__('Site Map Options', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_title_hint'] = esc_html__('Enter Section title here', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_edit'] = esc_html__('Icon Box Option', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_views'] = esc_html__('Views', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_views_hint'] = esc_html__('Set the Icon Box style', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_views_option_1'] = esc_html__('Simple', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_views_option_2'] = esc_html__('Top Center', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_title_hint'] = esc_html__('Enter Icon Box title here', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_title_color'] = esc_html__('Icon Box Title Color', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_title_color_hint'] = esc_html__('Set icon box title color here.', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_icon_type'] = esc_html__('Icon Type', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_icon_type_hint'] = esc_html__('Select icon type image or font icon.', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_icon_type_1'] = esc_html__('Icon', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_icon_type_2'] = esc_html__('Image', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_image_hint'] = esc_html__('Attach image from media gallery.', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_icon'] = esc_html__('Icon', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_icon_hint'] = esc_html__('Select the Icon you would like to show with your accordian title.', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_icon_font_size'] = esc_html__('Icon Font Size', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_icon_font_size_hint'] = esc_html__('Set the Icon Font Size', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_icon_font_size_option_1'] = esc_html__('Extra Small', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_icon_font_size_option_2'] = esc_html__('Small', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_icon_font_size_option_3'] = esc_html__('Medium', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_icon_font_size_option_4'] = esc_html__('Medium Large', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_icon_font_size_option_5'] = esc_html__('Large', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_icon_font_size_option_6'] = esc_html__('Extra Large', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_icon_font_size_option_7'] = esc_html__('Free Size', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_icon_color'] = esc_html__('Icon Color', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_icon_color_hint'] = esc_html__('Provide a hex colour code here (with #) for text color. if you want to override the default.', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_title_link'] = esc_html__('Title Link', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_title_link_hint'] = esc_html__('Enter Icon Box title link here', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_content'] = esc_html__('Content', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_content_hint'] = esc_html__('Enter the content here', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_content_color'] = esc_html__('Content Color', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_content_color_hint'] = esc_html__('Provide a hex colour code here (with #) for text color. if you want to override the default.', 'mashup');
	    $mashup_var_static_text['mashup_var_multi_counter'] = esc_html__('Counter', 'mashup');
	    $mashup_var_static_text['mashup_var_multi_counter_edit_options'] = esc_html__('Counter Options', 'mashup');
	    $mashup_var_static_text['mashup_var_multiple_counter_title'] = esc_html__('Title', 'mashup');
	    $mashup_var_static_text['mashup_var_multiple_counter_title_hint'] = esc_html__('Enter Title Here', 'mashup');
	    $mashup_var_static_text['mashup_var_multiple_counter_sub_title'] = esc_html__('Sub Title', 'mashup');
	    $mashup_var_static_text['mashup_var_multiple_counter_sub_title_hint'] = esc_html__('Enter Sub Tiltle Here', 'mashup');
	    $mashup_var_static_text['mashup_var_add_counter'] = esc_html__('Add Counter', 'mashup');
	    $mashup_var_static_text['mashup_var_multiple_counter'] = esc_html__('Counter', 'mashup');
	    $mashup_var_static_text['mashup_var_multiple_counter_icon'] = esc_html__('Icon', 'mashup');
	    $mashup_var_static_text['mashup_var_multiple_counter_icon_tooltip'] = esc_html__('Please Select Icon ', 'mashup');
	    $mashup_var_static_text['mashup_var_multiple_counter_count'] = esc_html__('Count', 'mashup');
	    $mashup_var_static_text['mashup_var_multiple_counter_count_tooltip'] = esc_html__('Enter Counter Range', 'mashup');
	    $mashup_var_static_text['mashup_var_multiple_counter_content'] = esc_html__('Content', 'mashup');
	    $mashup_var_static_text['mashup_var_multiple_counter_content_tooltip'] = esc_html__('Enter Content Here', 'mashup');


	    $mashup_var_static_text['mashup_var_multiple_counter_icon_color'] = esc_html__('Icon Color', 'mashup');
	    $mashup_var_static_text['mashup_var_multiple_counter_icon_color_tooltip'] = esc_html__('Select Icon Color ', 'mashup');


	    $mashup_var_static_text['mashup_var_multiple_counter_count_color'] = esc_html__('Count Color', 'mashup');
	    $mashup_var_static_text['mashup_var_multiple_counter_count_color_tooltip'] = esc_html__('Select Count Color ', 'mashup');
	    $mashup_var_static_text['mashup_var_multiple_counter_content_color'] = esc_html__('Content Color', 'mashup');
	    $mashup_var_static_text['mashup_var_multiple_counter_content_color_tooltip'] = esc_html__('Select Content Color ', 'mashup');


	    $mashup_var_static_text['mashup_var_published_by'] = esc_html__('published by', 'mashup');
	    $mashup_var_static_text['mashup_var_view_all_posts_by'] = esc_html__('View all posts by ', 'mashup');
	    $mashup_var_static_text['mashup_var_counter'] = esc_html__('Counter', 'mashup');
	    $mashup_var_static_text['mashup_var_counter_hint'] = esc_html__('Enter counter author name here', 'mashup');
	    $mashup_var_static_text['mashup_var_color_hint'] = esc_html__('Choose Color of Counter Text', 'mashup');
	    $mashup_var_static_text['mashup_var_divider'] = esc_html__('Divider', 'mashup');
	    $mashup_var_static_text['mashup_var_divider_hint'] = esc_html__('Divider setting on/off', 'mashup');
	    $mashup_var_static_text['mashup_var_list_edit_option'] = esc_html__('List Options', 'mashup');
	    $mashup_var_static_text['mashup_var_list_sc_title'] = esc_html__('Title', 'mashup');
	    $mashup_var_static_text['mashup_var_list_sc_title_hint'] = esc_html__('Enter list title here', 'mashup');
	    $mashup_var_static_text['mashup_var_list_sc_sub_title'] = esc_html__('Sub Title', 'mashup');
	    $mashup_var_static_text['mashup_var_list_sc_sub_title_hint'] = esc_html__('Enter list sub title here', 'mashup');
	    $mashup_var_static_text['mashup_var_list_style'] = esc_html__('List Style', 'mashup');
	    $mashup_var_static_text['mashup_var_list_style_hint'] = esc_html__('Choose list style from here.', 'mashup');
	    $mashup_var_static_text['mashup_var_list_style_default'] = esc_html__('Default', 'mashup');
	    $mashup_var_static_text['mashup_var_list_style_numeric'] = esc_html__('Numeric', 'mashup');
	    $mashup_var_static_text['mashup_var_list_bullet'] = esc_html__('Bullet', 'mashup');
	    $mashup_var_static_text['mashup_var_list_icon'] = esc_html__('Icon', 'mashup');
	    $mashup_var_static_text['mashup_var_list_alphabetic'] = esc_html__('Alphabetic', 'mashup');
	    $mashup_var_static_text['mashup_var_list_sc_item'] = esc_html__('List Title', 'mashup');
	    $mashup_var_static_text['mashup_var_list_sc'] = esc_html__('List', 'mashup');
	    $mashup_var_static_text['mashup_var_list_sc_item_hint'] = esc_html__('Enter list title here.', 'mashup');
	    $mashup_var_static_text['mashup_var_list_sc_icon'] = esc_html__('Icon', 'mashup');
	    $mashup_var_static_text['mashup_var_list_sc_icon_color'] = esc_html__('Icon Color', 'mashup');
	    $mashup_var_static_text['mashup_var_list_sc_icon_color_hint'] = esc_html__('Select icon color', 'mashup');
	    $mashup_var_static_text['mashup_var_list_sc_icon_bg_color'] = esc_html__('Icon Background Color', 'mashup');
	    $mashup_var_static_text['mashup_var_list_sc_icon_bg_color_hint'] = esc_html__('Select icon background color', 'mashup');
	    $mashup_var_static_text['mashup_var_list_sc_icon_hint'] = esc_html__('Choose icon for list.', 'mashup');
	    $mashup_var_static_text['mashup_var_list_sc_add_item'] = esc_html__('Add List Item', 'mashup');
	    $mashup_var_static_text['mashup_var_ads_edit_options'] = esc_html__('Ads Options', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_edit_options'] = esc_html__('Headings Options', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_heading_style'] = esc_html__('Views', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_heading_style_hint'] = esc_html__('Select headings style with this dropdown. simple and one Fancy view. All headings font sizes,color and family can be change from theme options.', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_heading_style_simple'] = esc_html__('Simple', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_heading_style_fancy'] = esc_html__('Fancy', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_fancy_heading'] = esc_html__('Fancy Heading', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_fancy_heading_hint'] = esc_html__('Enter text for fancy heading', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_title'] = esc_html__('Element Title', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_title_hint'] = esc_html__('Enter your element title here', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_sub_title'] = esc_html__('Element Sub Title', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_sub_title_hint'] = esc_html__('Enter your element sub title here', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_content'] = esc_html__('Content', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_content_hint'] = esc_html__('Enter content here.', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_font_size'] = esc_html__('Font Size', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_font_size_hint'] = esc_html__('Add font size for heading here.', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_text_transform'] = esc_html__('Text Transform', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_text_transform_hint'] = esc_html__('Select style to heading. If you dont select heading it will display H1', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_capitalize'] = esc_html__('Capitalize', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_initial'] = esc_html__('Initial', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_inherit'] = esc_html__('Inherit', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_lowercase'] = esc_html__('Lowercase', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_none'] = esc_html__('None', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_uppercase'] = esc_html__('Uppercase', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_letter_spacing'] = esc_html__('Letter Spacing', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_letter_spacing_hint'] = esc_html__('Add letter spacing for heading here.', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_bottom_margin'] = esc_html__('Bottom Margin', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_bottom_margin_hint'] = esc_html__('Enter heading bottom margin in numaric values only', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_line_height'] = esc_html__('Line Height', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_line_height_hint'] = esc_html__('Add line height for heading here.', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_color'] = esc_html__('Element title color', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_color_hint'] = esc_html__('Choose element title color with this color picker.', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_sub_title_color'] = esc_html__('Element sub title color', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_sub_title_color_hint'] = esc_html__('Select color title', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_content_color'] = esc_html__('Content Color', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_content_color_hint'] = esc_html__('select content color', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_type'] = esc_html__('Heading Style', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_type_hint'] = esc_html__('Select headings and style with this dropdown. H1 to H6 Headings and one Fancy view. All headings font sizes,color and family can be change from theme options.', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_h1'] = esc_html__('H1', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_h2'] = esc_html__('H2', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_h3'] = esc_html__('H3', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_h4'] = esc_html__('H4', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_h5'] = esc_html__('H5', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_h6'] = esc_html__('H6', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_heading_align'] = esc_html__('Heading Align', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_heading_align_hint'] = esc_html__('Align the heading position with this dropdown.', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_heading_view'] = esc_html__('Heading View', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_heading_view_hint'] = esc_html__('Select the heading view from this dropdown.', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_left'] = esc_html__('Left', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_right'] = esc_html__('Right', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_center'] = esc_html__('Center', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_color'] = esc_html__('Heading Color', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_color_hint'] = esc_html__('Choose heading color with this color picker.', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_divider'] = esc_html__('Divider On/Off', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_divider_hint'] = esc_html__('Set divider on/off for heading with this dropdown.', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_divider_position'] = esc_html__('Divider Position', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_divider_position_hint'] = esc_html__('Set divider position with this dropdown.', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_divider_after_subheading'] = esc_html__('After Content', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_divider_before_subheading'] = esc_html__('Before Content', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_yes'] = esc_html__('Yes', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_no'] = esc_html__('No', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_font_style'] = esc_html__('Font Style', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_font_style_hint'] = esc_html__('Select the font style here.', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_normal'] = esc_html__('Normal', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_italic'] = esc_html__('Italic', 'mashup');
	    $mashup_var_static_text['mashup_var_heading_sc_oblique'] = esc_html__('Oblique', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_views'] = esc_html__('Views', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_views_hint'] = esc_html__('Select a team style', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_view_simple'] = esc_html__('Simple', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_view_slider'] = esc_html__('Slider', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_add_item'] = esc_html__('Add Team', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_name'] = esc_html__('Name', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_name_hint'] = esc_html__('Enter team member name here.', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_designation'] = esc_html__('Designation', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_link'] = esc_html__('Link', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_link_hint'] = esc_html__('Enter team member link here.', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_designation_hint'] = esc_html__('Enter team member designation here.', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_image'] = esc_html__('Team Profile Image', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_image_hint'] = esc_html__('Select team member image from media gallery.', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_phone'] = esc_html__('Phone No', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_phone_hint'] = esc_html__('Enter phone number here.', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_fb'] = esc_html__('Facebook', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_fb_hint'] = esc_html__('Enter facebook account link here.', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_twitter'] = esc_html__('Twitter', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_twitter_hint'] = esc_html__('Enter twitter account link here.', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_google'] = esc_html__('Google Plus', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_google_hint'] = esc_html__('Enter google+ accoount link here.', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_linkedin'] = esc_html__('Linkedin', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_linkedin_hint'] = esc_html__('Enter linkedin account link here.', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_youtube'] = esc_html__('Youtube', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_youtube_hint'] = esc_html__('Enter youtube link here.', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_content'] = esc_html__('Content', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_content_hint'] = esc_html__('Enter team member content here.', 'mashup');
	    $mashup_var_static_text['mashup_var_team_edit_options'] = esc_html__('Team Options', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_title'] = esc_html__('Element Title', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_title_hint'] = esc_html__('Enter Element Title Here', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_sub_title'] = esc_html__('Element Sub Title', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc_sub_title_hint'] = esc_html__('Enter Element Sub Title', 'mashup');
	    $mashup_var_static_text['mashup_var_team_sc'] = esc_html__('Team', 'mashup');
	    $mashup_var_static_text['mashup_var_call_to_action_edit'] = esc_html__('Call to Action Options', 'mashup');
	    $mashup_var_static_text['mashup_var_short_text'] = esc_html__('Content', 'mashup');
	    $mashup_var_static_text['mashup_var_short_text_hint'] = esc_html__('Enter Content here.', 'mashup');
	    $mashup_var_static_text['mashup_var_text_color_hint'] = esc_html__('select content color with this color picker', 'mashup');
	    $mashup_var_static_text['mashup_var_bg_color_hint'] = esc_html__('Define call to action background color with this color picker', 'mashup');
	    $mashup_var_static_text['mashup_var_button_color'] = esc_html__('Button Text Color', 'mashup');


	    $mashup_var_static_text['mashup_var_author_hint'] = esc_html__('Give the name of the quote author', 'mashup');
	    $mashup_var_static_text['mashup_var_quote'] = esc_html__('Quote', 'mashup');
	    $mashup_var_static_text['mashup_var_quote_edit'] = esc_html__('Blockquote OPTIONS', 'mashup');

	    $mashup_var_static_text['mashup_var_dropcap_edit'] = esc_html__('Dropcap OPTIONS', 'mashup');
	    $mashup_var_static_text['mashup_var_dropcaps_content_field_text'] = esc_html__('Content', 'mashup');
	    $mashup_var_static_text['mashup_var_dropcaps_content_field_hint'] = esc_html__('Enter Content Here', 'mashup');




	    $mashup_var_static_text['mashup_var_author_url'] = esc_html__('Author Url', 'mashup');
	    $mashup_var_static_text['mashup_var_author_url_hint'] = esc_html__('Give the URL of author profile external/internal', 'mashup');


	    $mashup_var_static_text['mashup_var_call_to_action_button_border'] = esc_html__('Button Border Color', 'mashup');
	    $mashup_var_static_text['mashup_var_call_to_action_button_border_hint'] = esc_html__('Select Button Border color', 'mashup');

	    $mashup_var_static_text['mashup_var_call_to_action_button_bg'] = esc_html__('Button Background Color', 'mashup');
	    $mashup_var_static_text['mashup_var_call_to_action_button_bg_hint'] = esc_html__('Select Button Background color', 'mashup');



	    $mashup_var_static_text['mashup_var_button_color_hint'] = esc_html__('Set the button color for your call to action.', 'mashup');
	    $mashup_var_static_text['mashup_var_button_text'] = esc_html__('Button Text', 'mashup');
	    $mashup_var_static_text['mashup_var_button_text_hint'] = esc_html__('Enter text of the button.', 'mashup');
	    $mashup_var_static_text['mashup_var_button_link'] = esc_html__('Button Link', 'mashup');
	    $mashup_var_static_text['mashup_var_button_link_hint'] = esc_html__('Enter button link here.', 'mashup');
	    $mashup_var_static_text['mashup_var_text_align'] = esc_html__('Text Align', 'mashup');
	    $mashup_var_static_text['mashup_var_center_align'] = esc_html__('Center Align', 'mashup');
	    $mashup_var_static_text['mashup_var_left_align'] = esc_html__('Left Align', 'mashup');
	    $mashup_var_static_text['mashup_var_right_align'] = esc_html__('Right Align', 'mashup');
	    $mashup_var_static_text['mashup_var_custom_id'] = esc_html__('Custom Id', 'mashup');
	    $mashup_var_static_text['mashup_var_custom_id_hint'] = esc_html__('Use this option if you want to use specified id for this element.', 'mashup');
	    $mashup_var_static_text['mashup_var_call_action'] = esc_html__('Call To Action', 'mashup');
	    $mashup_var_static_text['mashup_var_image_position'] = esc_html__('Image Position', 'mashup');
	    $mashup_var_static_text['mashup_var_client_edit_options'] = esc_html__('Clients Options', 'mashup');
	    $mashup_var_static_text['mashup_var_client_element_title'] = esc_html__('Element title', 'mashup');
	    $mashup_var_static_text['mashup_var_client_title_hint_text'] = esc_html__('Enter Element Title Here', 'mashup');
	    $mashup_var_static_text['mashup_var_client_per_slide'] = esc_html__('Per Slide', 'mashup');
	    $mashup_var_static_text['mashup_var_client_per_slide_hint'] = esc_html__('Enter number of clients to be shown on page', 'mashup');
	    $mashup_var_static_text['mashup_var_client_per_slide'] = esc_html__('Per Slide', 'mashup');
	    $mashup_var_static_text['mashup_var_client_per_slide_hint_text'] = esc_html__('Enter the number of images to be shown for a row', 'mashup');
	    $mashup_var_static_text['mashup_var_client_style'] = esc_html__('Client Style', 'mashup');
	    $mashup_var_static_text['mashup_var_client_style_hint_text'] = esc_html__('Select the style for clients logos', 'mashup');
	    $mashup_var_static_text['mashup_var_client_url'] = esc_html__('Client Url', 'mashup');
	    $mashup_var_static_text['mashup_var_client_url_hint_text'] = esc_html__('Enter Url for Client logo', 'mashup');
	    $mashup_var_static_text['mashup_var_client_image'] = esc_html__('Client Image', 'mashup');
	    $mashup_var_static_text['mashup_var_client_url_image_hint_text'] = esc_html__('Enter The Image for Client', 'mashup');
	    $mashup_var_static_text['mashup_var_client_url_add_clients'] = esc_html__('Add Client', 'mashup');
	    $mashup_var_static_text['mashup_var_client_url_add_insert'] = esc_html__('Insert', 'mashup');
	    $mashup_var_static_text['mashup_var_client_slider'] = esc_html__('Slider', 'mashup');
	    $mashup_var_static_text['mashup_var_client_counter'] = esc_html__('Counter', 'mashup');
	    $mashup_var_static_text['mashup_var_accordion'] = esc_html__('Accordion', 'mashup');
	    $mashup_var_static_text['mashup_var_align'] = esc_html__('Align', 'mashup');
	    $mashup_var_static_text['mashup_var_align_hint'] = esc_html__('Set alignment for title', 'mashup');
	    $mashup_var_static_text['mashup_var_title_hint'] = esc_html__('Add your title here', 'mashup');
	    $mashup_var_static_text['mashup_var_accordion_simple'] = esc_html__('Simple', 'mashup');
	    $mashup_var_static_text['mashup_var_accordion_modern'] = esc_html__('Modern', 'mashup');
	    $mashup_var_static_text['mashup_var_faq_simple'] = esc_html__('Simple', 'mashup');
	    $mashup_var_static_text['mashup_var_faq_style'] = esc_html__('Modern', 'mashup');
	    $mashup_var_static_text['mashup_var_accordion_views'] = esc_html__('View', 'mashup');
	    $mashup_var_static_text['mashup_var_accordion_view_hint'] = esc_html__('select view for accordion', 'mashup');
	    $mashup_var_static_text['mashup_var_faq_views'] = esc_html__('View', 'mashup');
	    $mashup_var_static_text['mashup_var_faq_views_hint'] = esc_html__('select view for faq', 'mashup');
	    $mashup_var_static_text['mashup_var_faq_icon_hint'] = esc_html__('select icon for faq', 'mashup');
	    $mashup_var_static_text['mashup_var_accordian_edit_options'] = esc_html__('Edit Tabs options', 'mashup');
	    $mashup_var_static_text['mashup_var_margin_left'] = esc_html__('Margin Left', 'mashup');
	    $mashup_var_static_text['mashup_var_margin_right'] = esc_html__('Margin Right', 'mashup');
	    $mashup_var_static_text['mashup_var_margin_left_hint'] = esc_html__('Enter margin left without px', 'mashup');
	    $mashup_var_static_text['mashup_var_margin_right_hint'] = esc_html__('Enter margin right without px', 'mashup');
	    $mashup_var_static_text['mashup_var_sub_title_hint'] = esc_html__('Enter Sub Title Here', 'mashup');
	    $mashup_var_static_text['mashup_var_accordion_edit_options'] = esc_html__('Accordion Options', 'mashup');
	    $mashup_var_static_text['mashup_var_faq_edit_options'] = esc_html__('Faq Options', 'mashup');

	    $mashup_var_static_text['mashup_var_accordian_select_col'] = esc_html__('Columns', 'mashup');
	    $mashup_var_static_text['mashup_var_accordian_select_col_hint'] = esc_html__('Select No Of Columns', 'mashup');
	    $mashup_var_static_text['mashup_var_accordian_active'] = esc_html__('Active', 'mashup');
	    $mashup_var_static_text['mashup_var_accordian_active_hint'] = esc_html__('You can set the accordion section that is open by default on frontend by select dropdown', 'mashup');
	    $mashup_var_static_text['mashup_var_faq_active_hint'] = esc_html__('You can set the faq section that is open by default on frontend by select dropdown', 'mashup');
	    $mashup_var_static_text['mashup_var_accordian_title'] = esc_html__('Title', 'mashup');
	    $mashup_var_static_text['mashup_var_accordian_title_hint'] = esc_html__('enter title for your accordion', 'mashup');
	    $mashup_var_static_text['mashup_var_faq_title_hint'] = esc_html__('enter title for your faq', 'mashup');
	    $mashup_var_static_text['mashup_var_accordian_q'] = esc_html__('Q.', 'mashup');
	    $mashup_var_static_text['mashup_var_accordian_descr'] = esc_html__('Content', 'mashup');
	    $mashup_var_static_text['mashup_var_accordian_descr_hint'] = esc_html__('Enter content for acordion', 'mashup');
	    $mashup_var_static_text['mashup_var_faq_descr_hint'] = esc_html__('Enter content for faq', 'mashup');
	    $mashup_var_static_text['mashup_var_accordian_add_accordian'] = esc_html__('Add Accordion', 'mashup');
	    $mashup_var_static_text['mashup_var_add_faq'] = esc_html__('Add Faq', 'mashup');
	    $mashup_var_static_text['mashup_var_accordian_one_column'] = esc_html__('One Column', 'mashup');
	    $mashup_var_static_text['mashup_var_accordian_two_column'] = esc_html__('Two Column', 'mashup');
	    $mashup_var_static_text['mashup_var_accordian_three_column'] = esc_html__('Three Column', 'mashup');
	    $mashup_var_static_text['mashup_var_accordian_four_column'] = esc_html__('Four Column', 'mashup');
	    $mashup_var_static_text['mashup_var_accordian_six_column'] = esc_html__('Six Column', 'mashup');
	    $mashup_var_static_text['mashup_var_column_edit_options'] = esc_html__('Columns Options', 'mashup');
	    $mashup_var_static_text['mashup_var_column_field_title'] = esc_html__('Element Title', 'mashup');
	    $mashup_var_static_text['mashup_var_column_field_title_hint'] = esc_html__('Enter element title here.', 'mashup');
	    $mashup_var_static_text['mashup_var_column_field_text'] = esc_html__('Content', 'mashup');
	    $mashup_var_static_text['mashup_var_column_field_text_hint'] = esc_html__('Enter content of the column', 'mashup');
	    $mashup_var_static_text['mashup_var_column_field_top_padding'] = esc_html__('Top Padding', 'mashup');
	    $mashup_var_static_text['mashup_var_column_field_top_padding_hint'] = esc_html__('Enter padding top without px.', 'mashup');
	    $mashup_var_static_text['mashup_var_column_field_bottom_padding'] = esc_html__('Bottom Padding', 'mashup');
	    $mashup_var_static_text['mashup_var_column_field_bottom_padding_hint'] = esc_html__('Enter padding bottom without px.', 'mashup');
	    $mashup_var_static_text['mashup_var_column_field_left_padding_text'] = esc_html__('Left Padding', 'mashup');
	    $mashup_var_static_text['mashup_var_column_field_left_padding_hint'] = esc_html__('Enter padding left without px.', 'mashup');
	    $mashup_var_static_text['mashup_var_column_field_right_padding_text'] = esc_html__('Right Padding', 'mashup');
	    $mashup_var_static_text['mashup_var_column_field_right_padding_hint'] = esc_html__('Enter padding right without px.', 'mashup');
	    $mashup_var_static_text['mashup_var_column_field_image_text'] = esc_html__('Background Image', 'mashup');
	    $mashup_var_static_text['mashup_var_column_field_image_hint'] = esc_html__('Select Image for column background.', 'mashup');
	    $mashup_var_static_text['mashup_var_column_field_color_text'] = esc_html__('Element Title Color', 'mashup');
	    $mashup_var_static_text['mashup_var_infobox'] = esc_html__('Infobox', 'mashup');
	    $mashup_var_static_text['mashup_var_remove'] = esc_html__('Remove', 'mashup');
	    $mashup_var_static_text['mashup_var_infobox_edit_options'] = esc_html__('Infobox Options', 'mashup');
	    $mashup_var_static_text['mashup_var_infobox_icon_color'] = esc_html__('Icon Color', 'mashup');
	    $mashup_var_static_text['mashup_var_infobox_icon_color_hint'] = esc_html__('Set the Color for Icon', 'mashup');
	    $mashup_var_static_text['mashup_var_infobox_icon_title_color'] = esc_html__('Title Color', 'mashup');
	    $mashup_var_static_text['mashup_var_infobox_icon_title_color_hint'] = esc_html__('Set the Color for Title', 'mashup');
	    $mashup_var_static_text['mashup_var_infobox_title_color'] = esc_html__('Title Color', 'mashup');
	    $mashup_var_static_text['mashup_var_infobox_title_color_hint'] = esc_html__('Set the Color for Title', 'mashup');
	    $mashup_var_static_text['mashup_var_infobox_content_color'] = esc_html__('Content color', 'mashup');
	    $mashup_var_static_text['mashup_var_infobox_content_color_hint'] = esc_html__('Set the Color for Content', 'mashup');
	    $mashup_var_static_text['mashup_var_infobox_icon'] = esc_html__('Info Box Font awesome Icon', 'mashup');
	    $mashup_var_static_text['mashup_var_infobox_icon_hint'] = esc_html__('Select the Icons you would like to show in infobox section.', 'mashup');
	    $mashup_var_static_text['mashup_var_infobox_title'] = esc_html__('Infobox Title', 'mashup');
	    $mashup_var_static_text['mashup_var_infobox_title_hint'] = esc_html__('Enter the infobox title here', 'mashup');
	    $mashup_var_static_text['mashup_var_infobox_content'] = esc_html__('Infobox Content', 'mashup');
	    $mashup_var_static_text['mashup_var_infobox_content_hint'] = esc_html__('Enter the content here', 'mashup');
	    $mashup_var_static_text['mashup_var_add_infobox'] = esc_html__('Add Item', 'mashup');
	    $mashup_var_static_text['mashup_var_infobox_item_title'] = esc_html__('Title', 'mashup');
	    $mashup_var_static_text['mashup_var_infobox_item_title_hint'] = esc_html__('Enter the item title here.', 'mashup');


	    $mashup_var_static_text['mashup_var_column_field_background_color_text'] = esc_html__('Background Color', 'mashup');
	    $mashup_var_static_text['mashup_var_edit_form'] = esc_html__('Contact Form Options', 'mashup');
	    $mashup_var_static_text['mashup_var_edit_schedule'] = esc_html__('Schedule Form Options', 'mashup');
	    $mashup_var_static_text['mashup_var_best_time'] = esc_html__('Best time', 'mashup');
	    $mashup_var_static_text['mashup_var_request_service'] = esc_html__('Request a service', 'mashup');
	    $mashup_var_static_text['mashup_var_send_to'] = esc_html__('Receiver Email', 'mashup');
	    $mashup_var_static_text['mashup_var_schedule_text'] = esc_html__('Schedule Services Hint Text', 'mashup');
	    $mashup_var_static_text['mashup_var_schedule_text_hint'] = esc_html__('This hint text will show right side of schedule button.', 'mashup');
	    $mashup_var_static_text['mashup_var_send_to_hint'] = esc_html__('Receiver, or receivers of the mail.', 'mashup');
	    $mashup_var_static_text['mashup_var_success_message'] = esc_html__('Success Message', 'mashup');
	    $mashup_var_static_text['mashup_var_success_message_hint'] = esc_html__('Enter Mail Successfully Send Message.', 'mashup');
	    $mashup_var_static_text['mashup_var_error_message'] = esc_html__('Error Message', 'mashup');
	    $mashup_var_static_text['mashup_var_error_message_hint'] = esc_html__('Enter Error Message In any case Mail Not Submited.', 'mashup');
	    $mashup_var_static_text['mashup_var_contact_us'] = esc_html__('Contact Us', 'mashup');
	    $mashup_var_static_text['mashup_var_contact_full_name'] = esc_html__('Your Name', 'mashup');
	    $mashup_var_static_text['mashup_var_contact_email'] = esc_html__('Email Address', 'mashup');
	    $mashup_var_static_text['mashup_var_contact_phone_number'] = esc_html__('Phone Number', 'mashup');
	    $mashup_var_static_text['mashup_var_contact_subject'] = esc_html__('Subject Of  the Email', 'mashup');
	    $mashup_var_static_text['mashup_var_make_model'] = esc_html__('Make/Model', 'mashup');
	    $mashup_var_static_text['mashup_var_contact_email_should_not_be_empty'] = esc_html__('Email should not be empty.', 'mashup');
	    $mashup_var_static_text['mashup_var_contact_valid_email'] = esc_html__('Please enter a valid email.', 'mashup');
	    $mashup_var_static_text['mashup_var_mileage'] = esc_html__('Mileage (optional)', 'mashup');
	    $mashup_var_static_text['mashup_var_contact_check_field'] = esc_html__('Subscribe and Get latest updates and offers by Email', 'mashup');
	    $mashup_var_static_text['mashup_var_contact_message'] = esc_html__('I am interested in a price quote on this vehicle. Please contact me at you earliest convenience with your best price for this vehicle', 'mashup');
	    $mashup_var_static_text['mashup_var_contact_button_text'] = esc_html__('SEND YOUR MESSAGE', 'mashup');
	    $mashup_var_static_text['mashup_var_contact_required_fields_error_msg'] = esc_html__(' *ERROR: please fill the required fields.', 'mashup');
	    $mashup_var_static_text['mashup_var_contact_default_success_msg'] = esc_html__('Email has been sent Successfully', 'mashup');
	    $mashup_var_static_text['mashup_var_contact_default_error_msg'] = esc_html__('An error Occured, please try again later', 'mashup');
	    $mashup_var_static_text['mashup_var_contact_ip_address'] = esc_html__('IP Address:', 'mashup');
	    $mashup_var_static_text['mashup_var_contact_received'] = esc_html__('Contact Form Received', 'mashup');
	    $mashup_var_static_text['mashup_var_tabs_edit_options'] = esc_html__('Tabs Options', 'mashup');
	    $mashup_var_static_text['mashup_var_tabs_tabs_style'] = esc_html__('Tab Style', 'mashup');
	    $mashup_var_static_text['mashup_var_tabs_vertical_style'] = esc_html__('Vertical', 'mashup');
	    $mashup_var_static_text['mashup_var_tabs_horizontal_style'] = esc_html__('Horizontal', 'mashup');
	    $mashup_var_static_text['mashup_var_tabs_tabs_style_hint'] = esc_html__('Select your tabs style', 'mashup');
	    $mashup_var_static_text['mashup_var_tabs_active'] = esc_html__('Active', 'mashup');
	    $mashup_var_static_text['mashup_var_tabs_active_hint'] = esc_html__('You can set the tab section that is open by default on frontend by select dropdown', 'mashup');
	    $mashup_var_static_text['mashup_var_tabs_item_text'] = esc_html__('Tab Title', 'mashup');
	    $mashup_var_static_text['mashup_var_tabs_item_text_hint'] = esc_html__('Enter tab title here.', 'mashup');
	    $mashup_var_static_text['mashup_var_tabs_descr'] = esc_html__('Content', 'mashup');
	    $mashup_var_static_text['mashup_var_tabs_descr_hint'] = esc_html__('Enter the tab content here.', 'mashup');
	    $mashup_var_static_text['mashup_var_tabs_add_accordian'] = esc_html__('Image', 'mashup');
	    $mashup_var_static_text['mashup_var_tabs_insert'] = esc_html__('Image', 'mashup');
	    $mashup_var_static_text['mashup_var_tabs_tabs'] = esc_html__('Tab', 'mashup');
	    $mashup_var_static_text['mashup_var_tabs_remove'] = esc_html__('Remove', 'mashup');
	    $mashup_var_static_text['mashup_var_tabs_icon'] = esc_html__('Tab Icon', 'mashup');
	    $mashup_var_static_text['mashup_var_tabs_add_tab'] = esc_html__('Add Tab', 'mashup');
	    $mashup_var_static_text['mashup_var_tabs_icon_hint'] = esc_html__('Select the Icons you would like to show with your Tabs .', 'mashup');
	    $mashup_var_static_text['mashup_var_map'] = esc_html__('Map', 'mashup');
	    $mashup_var_static_text['mashup_var_edit_map_options'] = esc_html__('Map Options', 'mashup');
	    $mashup_var_static_text['mashup_var_map_height'] = esc_html__('Height', 'mashup');
	    $mashup_var_static_text['mashup_var_map_height_hint'] = esc_html__('Map height set here', 'mashup');
	    $mashup_var_static_text['mashup_var_latitude'] = esc_html__('Latitude', 'mashup');
	    $mashup_var_static_text['mashup_var_latitude_hint'] = esc_html__('Latitude is the angular distance of a place north or south of the earths equator, or of the equator of a celestial object, usually expressed in degrees and minutes.', 'mashup');
	    $mashup_var_static_text['mashup_var_longitude'] = esc_html__('Longitude', 'mashup');
	    $mashup_var_static_text['mashup_var_longitude_hint'] = esc_html__('Longitude the angular distance of a place east or west of the Greenwich meridian, or west of the standard meridian of a celestial object, usually expressed in degrees and minutes.', 'mashup');
	    $mashup_var_static_text['mashup_var_zoom'] = esc_html__('Zoom', 'mashup');
	    $mashup_var_static_text['mashup_var_zoom_hint'] = esc_html__('Set map zoom level example 10 or leave it empty by deafult will be apply.', 'mashup');
	    $mashup_var_static_text['mashup_var_map_types'] = esc_html__('Map Types', 'mashup');
	    $mashup_var_static_text['mashup_var_map_types_hint'] = esc_html__('Choose map type with this dropdown', 'mashup');
	    $mashup_var_static_text['mashup_var_roadmap'] = esc_html__('ROADMAP', 'mashup');
	    $mashup_var_static_text['mashup_var_hybrid'] = esc_html__('HYBRID', 'mashup');
	    $mashup_var_static_text['mashup_var_satellite'] = esc_html__('SATELLITE', 'mashup');
	    $mashup_var_static_text['mashup_var_terrain'] = esc_html__('TERRAIN', 'mashup');
	    $mashup_var_static_text['mashup_var_info_text'] = esc_html__('Info Text', 'mashup');
	    $mashup_var_static_text['mashup_var_info_text_hint'] = esc_html__('Enter info text for marker.', 'mashup');
	    $mashup_var_static_text['mashup_var_info_text_width'] = esc_html__('Info Text Width', 'mashup');
	    $mashup_var_static_text['mashup_var_info_text_width_hint'] = esc_html__('Set info text max width here.', 'mashup');
	    $mashup_var_static_text['mashup_var_info_text_height'] = esc_html__('Info Text Height', 'mashup');
	    $mashup_var_static_text['mashup_var_info_text_height_hint'] = esc_html__('Set info text max height here.', 'mashup');
	    $mashup_var_static_text['mashup_var_marker_icon_path'] = esc_html__('Marker Icon', 'mashup');
	    $mashup_var_static_text['mashup_var_marker_icon_path_hint'] = esc_html__('Select the Marker Icon Path for element.', 'mashup');
	    $mashup_var_static_text['mashup_var_show_marker'] = esc_html__('Show Marker', 'mashup');
	    $mashup_var_static_text['mashup_var_show_marker_hint'] = esc_html__('This switch on/off marker from the map.', 'mashup');
	    $mashup_var_static_text['mashup_var_on'] = esc_html__('On', 'mashup');
	    $mashup_var_static_text['mashup_var_off'] = esc_html__('Off', 'mashup');
	    $mashup_var_static_text['mashup_var_disable_map_controls'] = esc_html__('Disable Controls', 'mashup');
	    $mashup_var_static_text['mashup_var_disable_map_controls_hint'] = esc_html__('Map control disable/enable with this dropdown.', 'mashup');
	    $mashup_var_static_text['mashup_var_drage_able'] = esc_html__('Draggable', 'mashup');
	    $mashup_var_static_text['mashup_var_drage_able_hint'] = esc_html__('Draggable On/Off in map.', 'mashup');
	    $mashup_var_static_text['mashup_var_scroll_wheel'] = esc_html__('Scroll Wheel', 'mashup');
	    $mashup_var_static_text['mashup_var_scroll_wheel_hint'] = esc_html__('Set Scroll wheel zoom in zoom out enable disable from this dropdown.', 'mashup');
	    $mashup_var_static_text['mashup_var_map_border'] = esc_html__('Border', 'mashup');
	    $mashup_var_static_text['mashup_var_map_border_hint'] = esc_html__('Set border for map', 'mashup');
	    $mashup_var_static_text['mashup_var_border_color'] = esc_html__('Border Color', 'mashup');
	    $mashup_var_static_text['mashup_var_border_color_hint'] = esc_html__('Choose map border color.', 'mashup');
	    $mashup_var_static_text['mashup_var_button_edit_text'] = esc_html__('Buttons Options', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_text'] = esc_html__('Label', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_text_hint'] = esc_html__('Add button text here', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_url'] = esc_html__('Link', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_url_hint'] = esc_html__('Enter button link/url here', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_padding_top'] = esc_html__('Button Padding Top ', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_padding_top_hint'] = esc_html__('Enter button top padding for Button', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_padding_bottom'] = esc_html__('Button Padding Bottom ', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_padding_bottom_hint'] = esc_html__('Enter button bottom padding ', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_padding_left'] = esc_html__('Button Padding Left ', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_padding_left_hint'] = esc_html__('Enter button Left padding ', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_button_color'] = esc_html__('Lable Color ', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_border_color'] = esc_html__('Border Color', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_border_color_hint'] = esc_html__('Define button border color with this color picker.', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_button_color_hint'] = esc_html__('Define button text color with this color picker.', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_padding_right'] = esc_html__('Button Padding Right ', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_padding_right_hint'] = esc_html__('Enter button padding Right ', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_border'] = esc_html__('Enable Border ', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_border_hint'] = esc_html__('Enable/Disable button border with this drop down.', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_button_type'] = esc_html__('Type ', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_button_type_hint'] = esc_html__('Select button type with this dropdown two button types avaiable rounded and square', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_button_type_square'] = esc_html__('Square ', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_button_type_rounded'] = esc_html__('Rounded ', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_button_bg_color'] = esc_html__('Background Color ', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_button_bg_color_hint'] = esc_html__('Define button border color with this color picker', 'mashup');
	    $mashup_var_static_text['mashup_var_button_size'] = esc_html__('Size', 'mashup');
	    $mashup_var_static_text['mashup_var_button_icon_on_off'] = esc_html__('Icon ON/OFF', 'mashup');
	    $mashup_var_static_text['mashup_var_button_icon_on_off_hint'] = esc_html__('Set button icon on/off from this dropdown', 'mashup');
	    $mashup_var_static_text['mashup_var_button_icon'] = esc_html__('Icon', 'mashup');
	    $mashup_var_static_text['mashup_var_button_large'] = esc_html__('Large', 'mashup');
	    $mashup_var_static_text['mashup_var_button_medium'] = esc_html__('Medium', 'mashup');
	    $mashup_var_static_text['mashup_var_button_small'] = esc_html__('Small', 'mashup');
	    $mashup_var_static_text['mashup_var_button_icon_hint'] = esc_html__('Select the Icons you would like to show in your button.', 'mashup');
	    $mashup_var_static_text['mashup_var_button_size_hint'] = esc_html__('Select button size.Three sizes avaiable Large, Medium and Small', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_button_alignment'] = esc_html__('Icon Position ', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_button_alignment_hint'] = esc_html__('Select button icon position with this dropdown', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_button_alignment_left'] = esc_html__('Left', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_button_alignment_right'] = esc_html__('Right', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_target'] = esc_html__('Open link', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_target_hint'] = esc_html__('Select target type', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_target_blank'] = esc_html__('In same tab', 'mashup');
	    $mashup_var_static_text['mashup_var_button_sc_target_self'] = esc_html__('In new tab', 'mashup');
	    $mashup_var_static_text['mashup_var_image_edit_options'] = esc_html__('Image Frame Options', 'mashup');
	    $mashup_var_static_text['mashup_var_image_field_name'] = esc_html__('Element Title', 'mashup');
	    $mashup_var_static_text['mashup_var_image_field_name_hint'] = esc_html__('Enter element title here', 'mashup');
	    $mashup_var_static_text['mashup_var_image_title'] = esc_html__('Image Title', 'mashup');
	    $mashup_var_static_text['mashup_var_image_title_hint'] = esc_html__('Enter image title.', 'mashup');
	    $mashup_var_static_text['mashup_var_image_field_url'] = esc_html__('Select Image ', 'mashup');
	    $mashup_var_static_text['mashup_var_image_field_url_hint'] = esc_html__('Select image from media gallery with this button.', 'mashup');
	    $mashup_var_static_text['mashup_var_image_field_caption'] = esc_html__('Caption', 'mashup');
	    $mashup_var_static_text['mashup_var_image_field_caption_hint'] = esc_html__('Enter caption text', 'mashup');

	    $mashup_var_static_text['mashup_var_mailchimp_edit_options'] = esc_html__('Mail Chimp Options', 'mashup');
	    $mashup_var_static_text['mashup_var_mail_title'] = esc_html__('Element Title', 'mashup');
	    $mashup_var_static_text['mashup_var_mail_title_hint'] = esc_html__('Enter element title here', 'mashup');
	    $mashup_var_static_text['mashup_var_mail_sub_title'] = esc_html__('Sub Title', 'mashup');
	    $mashup_var_static_text['mashup_var_mail_sub_title_hint'] = esc_html__('Enter sub title.', 'mashup');
	    $mashup_var_static_text['mashup_var_mail_description'] = esc_html__('Mail description ', 'mashup');
	    $mashup_var_static_text['mashup_var_mail_description_hint'] = esc_html__('Enter mail Description here.', 'mashup');
	    $mashup_var_static_text['mashup_var_mail_chimp'] = esc_html__('Mail Chimp', 'mashup');
	    $mashup_var_static_text['mashup_var_mail_bgcolor'] = esc_html__('Background Color', 'mashup');
	    $mashup_var_static_text['mashup_var_mail_bgcolor_hint'] = esc_html__('Set background color for newsletter', 'mashup');
	    //promobox strings
	    $mashup_var_static_text['mashup_var_promo_box_options'] = esc_html__('Promobox Options', 'mashup');
	    $mashup_var_static_text['mashup_var_promobox_title'] = esc_html__('Content Title', 'mashup');
	    $mashup_var_static_text['mashup_var_promobox_title_hint'] = esc_html__('Please enter content title here', 'mashup');
	    $mashup_var_static_text['mashup_var_promobox_background'] = esc_html__('Select Background', 'mashup');
	    $mashup_var_static_text['mashup_var_promobox_background_hint'] = esc_html__('Select background from this dropdown', 'mashup');
	    $mashup_var_static_text['mashup_var_promobox_background_image'] = esc_html__('Image', 'mashup');
	    $mashup_var_static_text['mashup_var_promobox_background_color'] = esc_html__('Color', 'mashup');
	    $mashup_var_static_text['mashup_var_promobox_button_url'] = esc_html__('Button Url', 'mashup');
	    $mashup_var_static_text['mashup_var_promobox_button_url_hint'] = esc_html__('Enter Button Url here', 'mashup');

	    $mashup_var_static_text['mashup_var_promobox_image_field_url'] = esc_html__('Select Background Image ', 'mashup');
	    $mashup_var_static_text['mashup_var_promobox_image_field_url_hint'] = esc_html__('Select a image for promobox background', 'mashup');
	    $mashup_var_static_text['mashup_var_promobox_bg_color_field'] = esc_html__('Select Background Color ', 'mashup');
	    $mashup_var_static_text['mashup_var_promobox_bg_color_field_hint'] = esc_html__('Select a color for promobox background', 'mashup');
	    $mashup_var_static_text['mashup_var_promobox_field_desc'] = esc_html__('Content', 'mashup');
	    $mashup_var_static_text['mashup_var_promobox_field_desc_hint'] = esc_html__('Enter the Promobox Description here', 'mashup');
	    $mashup_var_static_text['mashup_var_promobox_button_title'] = esc_html__('Button Text', 'mashup');
	    $mashup_var_static_text['mashup_var_promobox_button_title_hint'] = esc_html__('Enter Promobox button title here', 'mashup');
	    $mashup_var_static_text['mashup_var_promobox_select_image'] = esc_html__('Select Image', 'mashup');
	    $mashup_var_static_text['mashup_var_promobox_select_image_hint'] = esc_html__('Choose image for promobox', 'mashup');
	    $mashup_var_static_text['mashup_var_promobox_button_bg_color'] = esc_html__('Button Color', 'mashup');
	    $mashup_var_static_text['mashup_var_promobox_button_bg_color_hint'] = esc_html__('Choose Button Color here', 'mashup');
	    $mashup_var_static_text['mashup_var_promobox_title_color'] = esc_html__('Content Title Color', 'mashup');
	    $mashup_var_static_text['mashup_var_promobox_title_color_hint'] = esc_html__('Choose content title color here', 'mashup');

	    $mashup_var_static_text['mashup_var_image_field_desc'] = esc_html__('Image Description', 'mashup');
	    $mashup_var_static_text['mashup_var_image_field_desc_hint'] = esc_html__('If you would like a caption to be shown below the image, add it here.', 'mashup');
	    $mashup_var_static_text['mashup_var_edit_author_items'] = esc_html__('Author Options', 'mashup');
	    $mashup_var_static_text['mashup_var_testimonial_field_title'] = esc_html__('Title', 'mashup');
	    $mashup_var_static_text['mashup_var_testimonial_field_title_hint'] = esc_html__('Enter your title here.', 'mashup');
	    $mashup_var_static_text['mashup_var_testimonial_field_subtitle'] = esc_html__('Sub title', 'mashup');
	    $mashup_var_static_text['mashup_var_testimonial_field_subtitle_hint'] = esc_html__('Enter your sub title here.', 'mashup');
	    $mashup_var_static_text['mashup_var_testimonial_field_text_color'] = esc_html__('Text Color', 'mashup');
	    $mashup_var_static_text['mashup_var_testimonial_field_text_color_hint'] = esc_html__('Set text color here', 'mashup');
	    $mashup_var_static_text['mashup_var_testimonial_field_text'] = esc_html__('Text', 'mashup');
	    $mashup_var_static_text['mashup_var_testimonial_author_color'] = esc_html__('Author Color', 'mashup');
	    $mashup_var_static_text['mashup_var_testimonial_position_color'] = esc_html__('Position Color', 'mashup');
	    $mashup_var_static_text['mashup_var_testimonial_field_text_hint'] = esc_html__('Enter testimonial content here.', 'mashup');
	    $mashup_var_static_text['mashup_var_testimonial_field_author'] = esc_html__('Author', 'mashup');
	    $mashup_var_static_text['mashup_var_testimonial_field_author_hint'] = esc_html__('Enter testimonial author name here.', 'mashup');
	    $mashup_var_static_text['mashup_var_testimonial_field_position'] = esc_html__('Position', 'mashup');
	    $mashup_var_static_text['mashup_var_testimonial_field_position_hint'] = esc_html__('Enter position of author here.', 'mashup');
	    $mashup_var_static_text['mashup_var_testimonial_field_image'] = esc_html__('Image', 'mashup');
	    $mashup_var_static_text['mashup_var_testimonial_field_image_hint'] = esc_html__('Set author image from media gallery.', 'mashup');
	    $mashup_var_static_text['mashup_var_testimonial'] = esc_html__('Testimonial', 'mashup');
	    $mashup_var_static_text['mashup_var_add_testimonial'] = esc_html__('Add Testimonial', 'mashup');
	    $mashup_var_static_text['mashup_var_testimonial_edit'] = esc_html__('Testimonial options', 'mashup');
	    $mashup_var_static_text['mashup_var_divider_field_left_padding'] = esc_html__('Padding Left', 'mashup');
	    $mashup_var_static_text['mashup_var_divider_field_left_padding_hint'] = esc_html__('Set padding left for the divider in px.', 'mashup');
	    $mashup_var_static_text['mashup_var_divider_field_right_padding'] = esc_html__('Padding Right', 'mashup');
	    $mashup_var_static_text['mashup_var_divider_field_right_padding_hint'] = esc_html__('Set padding right for the divider in px.', 'mashup');
	    $mashup_var_static_text['mashup_var_divider_field_top_margin'] = esc_html__('Margin Top', 'mashup');
	    $mashup_var_static_text['mashup_var_divider_field_top_margin_hint'] = esc_html__('Set margin top for the divider in px.', 'mashup');
	    $mashup_var_static_text['mashup_var_divider_field_bottom_margin'] = esc_html__('Margin Bottom', 'mashup');
	    $mashup_var_static_text['mashup_var_divider_field_bottom_margin_hint'] = esc_html__('Set margin bottom for the divider in px.', 'mashup');
	    $mashup_var_static_text['mashup_var_divider_field_align'] = esc_html__('Align', 'mashup');
	    $mashup_var_static_text['mashup_var_divider_field_align_hint'] = esc_html__('Select Alignment Of Divider', 'mashup');
	    $mashup_var_static_text['mashup_var_divider_edit'] = esc_html__('Divider Options', 'mashup');
	    $mashup_var_static_text['mashup_var_edit_blog_items'] = esc_html__('Blog Options', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_section_hint'] = esc_html__('Enter your blog section title here.', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_cat_hint'] = esc_html__('Select category to show posts. If you dont select category it will display all posts.', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_design_views'] = esc_html__('Blog Design Views', 'mashup');
	    $mashup_var_static_text['mashup_var_blog14_publiush'] = esc_html__('Published', 'mashup');
	    $mashup_var_static_text['mashup_var_blog15_featured'] = esc_html__('Featured', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_design_views_hint'] = esc_html__('Select blog view from this drop down', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_design_view1'] = esc_html__('View 1', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_design_view2'] = esc_html__('View 2', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_design_view3'] = esc_html__('View 3', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_design_view4'] = esc_html__('View 4', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_design_view5'] = esc_html__('View 5', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_design_view6'] = esc_html__('View 6', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_design_view7'] = esc_html__('View 7', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_design_view8'] = esc_html__('View 8', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_design_view9'] = esc_html__('View 9', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_design_view10'] = esc_html__('View 10', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_design_view11'] = esc_html__('View 11', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_design_view12'] = esc_html__('View 12', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_design_view13'] = esc_html__('View 13', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_design_view14'] = esc_html__('View 14', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_design_view15'] = esc_html__('View 15', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_design_view16'] = esc_html__('View 16', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_design_view17'] = esc_html__('View 17', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_design_view18'] = esc_html__('View 18', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_design_view19'] = esc_html__('View 19', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_design_view20'] = esc_html__('View 20', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_design_view21'] = esc_html__('View 21', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_design_view22'] = esc_html__('View 22', 'mashup');

	    // Blog Views Widget
	    $mashup_var_static_text['mashup_var_blog_views_widget_order_by'] = esc_html__('Order By', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_views_widget_order_by_dir'] = esc_html__('Order Direction', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_views_widget_order_by_id'] = esc_html__('Post ID', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_views_widget_order_by_title'] = esc_html__('Title', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_views_widget_order_by_date'] = esc_html__('Date', 'mashup');


	    $mashup_var_static_text['mashup_var_blog_grid'] = esc_html__('Grid', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_large'] = esc_html__('Large', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_medium'] = esc_html__('Medium', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_post_order'] = esc_html__('Post Order', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_post_order_hint'] = esc_html__('Arranging posts in ascending order and descending order with this dropdown.', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_asc'] = esc_html__('ASC', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_desc'] = esc_html__('DESC', 'mashup');
	    $mashup_var_static_text['mashup_var_post_description'] = esc_html__('Post Description', 'mashup');
	    $mashup_var_static_text['mashup_var_post_description_hint'] = esc_html__('Show/Hide post description with this dropdown.', 'mashup');
	    $mashup_var_static_text['mashup_var_length_excerpt'] = esc_html__('Length of Excerpt', 'mashup');
	    $mashup_var_static_text['mashup_var_length_excerpt_hint'] = esc_html__('Add number of excerpt words here for display on blog listing.', 'mashup');
	    $mashup_var_static_text['mashup_var_post_per_page'] = esc_html__('No. of Post Per Page', 'mashup');
	    $mashup_var_static_text['mashup_var_post_per_page_hint'] = esc_html__('Add number of post for show posts on page.', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_pagination'] = esc_html__('Pagination', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_pagination_hint'] = esc_html__('Pagination is the process of dividing a document into discrete pages. Manage your pagiantion via this dropdown.', 'mashup');
	    $mashup_var_static_text['mashup_var_show_pagination'] = esc_html__('Show Pagination', 'mashup');
	    $mashup_var_static_text['mashup_var_show_load_more'] = esc_html__('Load More', 'mashup');
	    $mashup_var_static_text['mashup_var_filterable'] = esc_html__('Enable Filterable', 'mashup');
	    $mashup_var_static_text['mashup_var_filterable_hint'] = esc_html__('Show/Hide categories filterbale with this dropdown.', 'mashup');
	    $mashup_var_static_text['mashup_var_single_page'] = esc_html__('Single Page', 'mashup');
	    $mashup_var_static_text['mashup_var_single_page_with_filterable'] = esc_html__('Single Page with Filterable', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_all_posts'] = esc_html__('All Posts', 'mashup');
	    $mashup_var_static_text['mashup_var_divider_field_align'] = esc_html__('Align', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_add'] = esc_html__('Add Icon Box', 'mashup');

	    $mashup_var_static_text['mashup_var_author_post_order'] = esc_html__('Author Order', 'mashup');
	    $mashup_var_static_text['mashup_var_author_post_order_hint'] = esc_html__('Select Author Listing Order', 'mashup');
	    $mashup_var_static_text['mashup_var_author_asc'] = esc_html__('ASC', 'mashup');
	    $mashup_var_static_text['mashup_var_author_desc'] = esc_html__('DESC', 'mashup');
	    $mashup_var_static_text['mashup_var_author_description'] = esc_html__('Author Description', 'mashup');
	    $mashup_var_static_text['mashup_var_author_description_hint'] = esc_html__('Show/Hide author description with this dropdown.', 'mashup');
	    $mashup_var_static_text['mashup_var_length_author_excerpt'] = esc_html__('Length of Excerpt', 'mashup');
	    $mashup_var_static_text['mashup_var_length_author_excerpt_hint'] = esc_html__('Add number of excerpt words here for display on author listing.', 'mashup');
	    $mashup_var_static_text['mashup_var_author_per_page'] = esc_html__('No. of author Per Page', 'mashup');
	    $mashup_var_static_text['mashup_var_author_per_page_hint'] = esc_html__('Add number of author for show authors on page.', 'mashup');
	    $mashup_var_static_text['mashup_var_author_pagination'] = esc_html__('Pagination', 'mashup');
	    $mashup_var_static_text['mashup_var_author_pagination_hint'] = esc_html__('Pagination is the process of dividing a document into discrete pages. Manage your pagiantion via this dropdown.', 'mashup');

	    $mashup_var_static_text['mashup_var_icon_boxes'] = esc_html__('Icon Box', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_boxes_edit_options'] = esc_html__('Edit Multi icon Box options', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_boxes_title'] = esc_html__('Title', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_boxes_title_hint'] = esc_html__('Enter your  title here', 'mashup');
	    $mashup_var_static_text['mashup_var_multi_subtitle'] = esc_html__('Sub Title', 'mashup');
	    $mashup_var_static_text['mashup_var_multi_subtitle_hint'] = esc_html__('Enter sub title here.', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_boxes_sel_col'] = esc_html__('Column', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_boxes_sel_col_hint'] = esc_html__('Select number of columns', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_col'] = esc_html__('Column', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_col_hint'] = esc_html__('Select the number of column ', 'mashup');
	    $mashup_var_static_text['mashup_var_one_col'] = esc_html__('One Column', 'mashup');
	    $mashup_var_static_text['mashup_var_two_col'] = esc_html__('Two Column', 'mashup');
	    $mashup_var_static_text['mashup_var_three_col'] = esc_html__('Three Column', 'mashup');
	    $mashup_var_static_text['mashup_var_four_col'] = esc_html__('Four Column', 'mashup');
	    $mashup_var_static_text['mashup_var_six_col'] = esc_html__('Six Column', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_boxes_content_title'] = esc_html__('Content Title', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_boxes_content_title_hint'] = esc_html__('Add icon Box title here..', 'mashup');

	    $mashup_var_static_text['mashup_var_icon_box_title'] = esc_html__('Icon Box Title', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_title_hint'] = esc_html__('Add icon box title here.', 'mashup');

	    $mashup_var_static_text['mashup_var_icon_boxes_link_url'] = esc_html__('Title Link', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_boxes_link_url_hint'] = esc_html__('e.g. http://yourdomain.com/.', 'mashup');
	    $mashup_var_static_text['mashup_var_multi_content_title_color'] = esc_html__('Content title Color', 'mashup');
	    $mashup_var_static_text['mashup_var_multi_content_title_color_hint'] = esc_html__('Provide a hex colour code here (with #) for text color. if you want to override the default. ', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_boxes_icon_hint'] = esc_html__('Select the icon you would like to show with your icon box title.', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_boxes_icon_bg_color'] = esc_html__('Icon Background Color', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_boxes_icon_bg_color_hint'] = esc_html__('Set the icon Box Background Color', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_boxes_icon_color'] = esc_html__('Icon Box icon Color', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_boxes_icon'] = esc_html__('Icon Box Icon', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_boxes_icon_color_hint'] = esc_html__('Set icon box icon color here.', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_boxes_text'] = esc_html__('Icon Box Content', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_boxes_text_hint'] = esc_html__('Enter icon box content here.', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_boxes_title_color'] = esc_html__('Element Title color', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_boxes_title_color_hint'] = esc_html__('Provide a hex colour code here (with #) for element title color. if you want to override the default.', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_boxes_single_service_title_color'] = esc_html__('Single icon Box Title Color', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_boxes_single_service_title_color_hint'] = esc_html__('Set Single icon Box title color from here.', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_styles'] = esc_html__('Styles', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_styles_hint'] = esc_html__('Choose styles for icon box.', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_style_simple'] = esc_html__('Simple', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_style_box'] = esc_html__('Box', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_alignment'] = esc_html__('Alignment', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_alignment_left'] = esc_html__('Left', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_alignment_right'] = esc_html__('Right', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_alignment_center'] = esc_html__('Top Center', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_alignment_top_left'] = esc_html__('Top Left', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_alignment_top_right'] = esc_html__('Top Right', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_alignment_hint'] = esc_html__('Set the position of icon_box image here', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_boxes_single_service_icon_color'] = esc_html__('Single icon Box icon Color', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_boxes_single_service_icon_color_hint'] = esc_html__('Provide a hex colour code here (with #) for icon color. if you want to override the default.', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_boxes_Icon_color'] = esc_html__('Icon Box icon Color', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_boxes_Icon_color_hint'] = esc_html__('Set icon box icon color here.', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_boxes_text'] = esc_html__('Content', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_boxes_text_hint'] = esc_html__('Enter icon box content here.', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_boxes_content_hint'] = esc_html__('Add content here.', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_icon_content'] = esc_html__('Icon Box Content', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_box_icon_content_hint'] = esc_html__('Enter icon box content here.', 'mashup');

	    //$mashup_var_static_text['mashup_var_multi_services_text_color'] = esc_html__('Text Color', 'mashup');
	    //$mashup_var_static_text['mashup_var_multi_services_text_color_hint'] = esc_html__('Provide a hex colour code here (with #) for text color. if you want to override the default.', 'mashup');
	    $mashup_var_static_text['mashup_var_add_service'] = esc_html__('Add Service', 'mashup');

	    /* Twitter Shortcode */
	    $mashup_var_static_text['mashup_var_twitter_edit_msg'] = esc_html__('Tweets OPTIONS', 'mashup');
	    $mashup_var_static_text['mashup_var_twitter_title'] = esc_html__('Title', 'mashup');
	    $mashup_var_static_text['mashup_var_twitter_username'] = esc_html__('Twitter User Name', 'mashup');
	    $mashup_var_static_text['mashup_var_twitter_username_hint'] = esc_html__('Enter your twitter user name here', 'mashup');
	    $mashup_var_static_text['mashup_var_twitter_view'] = esc_html__('View', 'mashup');
	    $mashup_var_static_text['mashup_var_twitter_view_option_1'] = esc_html__('Modern', 'mashup');
	    $mashup_var_static_text['mashup_var_twitter_view_option_2'] = esc_html__('Fancy', 'mashup');
	    $mashup_var_static_text['mashup_var_twitter_text_color'] = esc_html__('Text Color', 'mashup');
	    $mashup_var_static_text['mashup_var_twitter_text_color_hint'] = esc_html__('Set text color here', 'mashup');
	    $mashup_var_static_text['mashup_var_twitter_tweets_num'] = esc_html__('No of Tweets', 'mashup');
	    $mashup_var_static_text['mashup_var_twitter_tweets_num_hint'] = esc_html__('Enter no of tweets here', 'mashup');
	    $mashup_var_static_text['mashup_var_twitter_class'] = esc_html__('Class', 'mashup');
	    $mashup_var_static_text['mashup_var_twitter_valid_api'] = esc_html__('Please enter valid Twitter API Keys', 'mashup');
	    $mashup_var_static_text['mashup_var_no_tweets_found'] = esc_html__('No Tweets Found', 'mashup');


	    /* Video Shortcode */
	    $mashup_var_static_text['mashup_var_video_field_title'] = esc_html__('Title', 'mashup');
	    $mashup_var_static_text['mashup_var_video_field_title_hint'] = esc_html__('Enter text of the Title.', 'mashup');
	    $mashup_var_static_text['mashup_var_video_field_url'] = esc_html__('Video Url', 'mashup');
	    $mashup_var_static_text['mashup_var_video_field_url_hint'] = esc_html__('Enter url for the video here.', 'mashup');
	    $mashup_var_static_text['mashup_var_video_field_width'] = esc_html__('Width', 'mashup');
	    $mashup_var_static_text['mashup_var_video_field_width_hint'] = esc_html__('Set video frame width here.', 'mashup');
	    $mashup_var_static_text['mashup_var_video_field_height'] = esc_html__('Height', 'mashup');
	    $mashup_var_static_text['mashup_var_video_field_height_hint'] = esc_html__('Set video frame height here.', 'mashup');
	    $mashup_var_static_text['mashup_var_edit_video_text'] = esc_html__('Video Options', 'mashup');
	    $mashup_var_static_text['mashup_var_edit_spacer_options'] = esc_html__('Spacer Options', 'mashup');
	    $mashup_var_static_text['mashup_var_spacer_height'] = esc_html__('Spacer Height', 'mashup');
	    $mashup_var_static_text['mashup_var_spacer_height_hint'] = esc_html__('Set spacer height without(px)', 'mashup');



	    /* Price Plan Shortcode */
	    $mashup_var_static_text['mashup_var_price_plan_style'] = esc_html__('Styles', 'mashup');
	    $mashup_var_static_text['mashup_var_price_plan_style_hint'] = esc_html__('Choose multi price table style here', 'mashup');
	    $mashup_var_static_text['mashup_var_price_plan_style_classic'] = esc_html__('Classic', 'mashup');
	    $mashup_var_static_text['mashup_var_price_plan_style_modren'] = esc_html__('Modren', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_sc'] = esc_html__('Price Table', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_add'] = esc_html__('Add Price Table', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_edit_option'] = esc_html__('Pricing Tables OPTIONS', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_title'] = esc_html__('Title', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_title_hint'] = esc_html__('Enter Price plan Title Here', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_title_color'] = esc_html__('Title Color', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_title_color_hint'] = esc_html__('Set price-table title color from here', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_price_color'] = esc_html__('Price Color', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_price_color_hint'] = esc_html__('Set Price color from here', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_price'] = esc_html__('Price', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_price_hint'] = esc_html__('Add price without symbol', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_currency'] = esc_html__('Currency Symbols', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_currency_hint'] = esc_html__('Add your currency symbol here like $', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_time'] = esc_html__('Time Duration', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_time_hint'] = esc_html__('Add time duration for package or time range like this package for a month or year So write here for Mothly and year for Yearly Package', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_button_link'] = esc_html__('Button Link', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_button_link_hint'] = esc_html__('Add price table button Link here', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_button_text'] = esc_html__('Button Text', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_button_text_hint'] = esc_html__('Add button text here Example : Buy Now, Purchase Now, View Packages etc', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_button_color'] = esc_html__('Button text Color', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_button_color_hint'] = esc_html__('Set button color with color picker', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_button_bg_color'] = esc_html__('Button Background Color', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_button_bg_color_hint'] = esc_html__('Set button background color with color picker', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_featured'] = esc_html__('Featured on/off', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_featured_hint'] = esc_html__('Price table featured optiton enable/disbale with this dropdown', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_description'] = esc_html__('Content', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_description_hint'] = esc_html__('Features can be add easily in input with this shortcode 
					    					[feature_item]Text here[/feature_item][feature_item]Text here[/feature_item]', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_column_color'] = esc_html__('Column Background Color', 'mashup');
	    $mashup_var_static_text['mashup_var_price_table_column_color_hint'] = esc_html__('Set Column Background color', 'mashup');

	    /* Progressbar Shortcode */
	    $mashup_var_static_text['mashup_var_progressbar_options'] = esc_html__('Progress Bars Options', 'mashup');
	    $mashup_var_static_text['mashup_var_progressbar'] = esc_html__('Progress Bar', 'mashup');
	    $mashup_var_static_text['mashup_var_progressbar_title'] = esc_html__('Progress Bar Title', 'mashup');
	    $mashup_var_static_text['mashup_var_progressbar_title_hint'] = esc_html__('Enter progress bar title', 'mashup');
	    $mashup_var_static_text['mashup_var_progressbar_skill'] = esc_html__('Skill (in percentage)', 'mashup');
	    $mashup_var_static_text['mashup_var_progressbar_skill_hint'] = esc_html__('Enter skill (in percentage) here', 'mashup');
	    $mashup_var_static_text['mashup_var_progressbar_color'] = esc_html__('Progress Bar Color', 'mashup');
	    $mashup_var_static_text['mashup_var_progressbar_color_hint'] = esc_html__('Set progress bar color here', 'mashup');
	    $mashup_var_static_text['mashup_var_progressbar_add_button'] = esc_html__('Add Progress Bar', 'mashup');

	    /* Table Shortcode */
	    $mashup_var_static_text['mashup_var_table_options'] = esc_html__('Table Options', 'mashup');
	    $mashup_var_static_text['mashup_var_table_content'] = esc_html__('Table Content', 'mashup');
	    $mashup_var_static_text['mashup_var_table_content_hint'] = esc_html__('Fill your table content in shortcode here. (th) for table heading and (td) for table container.', 'mashup');

	    /* Author shortcode */
	    $mashup_var_static_text['mashup_var_author_all_posts'] = esc_html__('View all Posts ', 'mashup');


	    /* Flex Editor Shortcode */
	    $mashup_var_static_text['mashup_var_editor_options'] = esc_html__('Editor Options', 'mashup');

	    /* blog search */
	    $mashup_var_static_text['mashup_var_edit_blog_search'] = esc_html__('Blog Search Options', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_search'] = esc_html__('Blog Search', 'mashup');
	    $mashup_var_static_text['mashup_var_sortby'] = esc_html__('Enable Sort By', 'mashup');
	    $mashup_var_static_text['mashup_var_sortby_option'] = esc_html__('Sort By', 'mashup');
	    $mashup_var_static_text['mashup_var_sortby_name'] = esc_html__('Name', 'mashup');
	    $mashup_var_static_text['mashup_var_sortby_date'] = esc_html__('Date', 'mashup');
	    $mashup_var_static_text['mashup_var_sortby_hint'] = esc_html__('Show/Hide categories Sort by with this dropdown.', 'mashup');

	    /* blog categories */
	    $mashup_var_static_text['mashup_var_edit_blog_categories'] = esc_html__('Blog Categories Options', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_categories'] = esc_html__('Blog Categories', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_categories_selection'] = esc_html__('Categories', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_categories_selection_hint'] = esc_html__('Choose categories selection from this dropdown.', 'mashup');
	    $mashup_var_static_text['mashup_var_choose_cats'] = esc_html__('Choose Categories', 'mashup');
	    $mashup_var_static_text['mashup_var_choose_cats_hint'] = esc_html__('Choose categories from this dropdown.', 'mashup');
	    $mashup_var_static_text['mashup_var_all_cats'] = esc_html__('All Categories', 'mashup');
	    $mashup_var_static_text['mashup_var_selected_cats'] = esc_html__('Selected Categories', 'mashup');
	    $mashup_var_static_text['mashup_var_cats_per_page'] = esc_html__('No. of Categories Per Page', 'mashup');
	    $mashup_var_static_text['mashup_var_cats_per_page_hint'] = esc_html__('Add number of categories for show categories on page.', 'mashup');
	    $mashup_var_static_text['mashup_var_cats_more_link'] = esc_html__('More Link', 'mashup');
	    $mashup_var_static_text['mashup_var_cats_more_link_hint'] = esc_html__('Add more link here.', 'mashup');
	    $mashup_var_static_text['mashup_var_cats_more'] = esc_html__('More', 'mashup');
	    $mashup_var_static_text['mashup_var_cats_more_on_off'] = esc_html__('More Link On/OFF', 'mashup');
	    $mashup_var_static_text['mashup_var_cats_more_on_off_hint'] = esc_html__('Choose more link On/OFF here.', 'mashup');

	    return $mashup_var_static_text;
	}

	public function mashup_theme_strings() {
	    global $mashup_var_static_text;

	    $mashup_var_static_text['mashup_var_custom_code'] = esc_html__('Custom Code', 'mashup');
	    $mashup_var_static_text['mashup_var_blog_featured_post'] = esc_html__('FEATURED POST', 'mashup');
	    $mashup_var_static_text['mashup_var_custom_menu_description'] = esc_html__('Add a custom menu to your sidebar.', 'mashup');
	    $mashup_var_static_text['mashup_var_custom_menu'] = esc_html__('CS: Custom Menu', 'mashup');
	    $mashup_var_static_text['mashup_var_no_menus'] = esc_html__('No menus have been created yet. <a href="%s">Create some</a>.', 'mashup');
	    $mashup_var_static_text['mashup_var_html_fields_title'] = esc_html__('Title', 'mashup');
	    $mashup_var_static_text['mashup_var_enter_title_here'] = esc_html__('Enter your element title here.', 'mashup');
	    $mashup_var_static_text['mashup_var_select_menu'] = esc_html__('Select Menu:', 'mashup');
	    $mashup_var_static_text['mashup_var_single_banner'] = esc_html__(' Single Banner', 'mashup');
	    $mashup_var_static_text['mashup_var_random_banner'] = esc_html__('Random Banners', 'mashup');
	    $mashup_var_static_text['mashup_var_banner_view'] = esc_html__('Banner View ', 'mashup');
	    $mashup_var_static_text['mashup_var_banner_view_hint'] = esc_html__('Select Banner View ', 'mashup');
	    $mashup_var_static_text['mashup_var_search_pagination'] = esc_html__('Show Pagination', 'mashup');
	    $mashup_var_static_text['mashup_var_no_of_banner'] = esc_html__('Number of Banners', 'mashup');
	    $mashup_var_static_text['mashup_var_no_of_banner_hint'] = esc_html__('Please Number of Banners here', 'mashup');
	    $mashup_var_static_text['mashup_var_banner_code'] = esc_html__('Banner Code', 'mashup');
	    $mashup_var_static_text['mashup_var_banner_code_hint'] = esc_html__('Please Banner Code here', 'mashup');
	    $mashup_var_static_text['mashup_var_banner_border'] = esc_html__('Border', 'mashup');
	    $mashup_var_static_text['mashup_var_banner_border_desc'] = esc_html__('Set border for widget yes/no here.', 'mashup');
	    $mashup_var_static_text['mashup_var_title'] = esc_html__('Title', 'mashup');
	    $mashup_var_static_text['mashup_var_widget_length_excerpt_hint'] = esc_html__('Add number of excerpt words here for display on blog widget.', 'mashup');


	    /* Ads Banner */
	    $mashup_var_static_text['mashup_var_banner_title_field_hint'] = esc_html__('Please enter Banner Title', 'mashup');
	    $mashup_var_static_text['mashup_var_banner_style'] = esc_html__('Banner Style', 'mashup');
	    $mashup_var_static_text['mashup_var_banner_style_hint'] = esc_html__('Please Select  Banner Style', 'mashup');
	    $mashup_var_static_text['mashup_var_banner_type'] = esc_html__('Banner Type', 'mashup');
	    $mashup_var_static_text['mashup_var_banner_type_hint'] = esc_html__('Please enter  Banner Type', 'mashup');
	    $mashup_var_static_text['mashup_var_banner_type_top'] = esc_html__('Top Banner', 'mashup');
	    $mashup_var_static_text['mashup_var_banner_type_bottom'] = esc_html__('Bottom Banner', 'mashup');
	    $mashup_var_static_text['mashup_var_banner_type_sidebar'] = esc_html__('Sidebar Banner', 'mashup');


	    $mashup_var_static_text['mashup_var_banner_type_vertical'] = esc_html__('Vertical Banner', 'mashup');
	    $mashup_var_static_text['mashup_var_banner_image'] = esc_html__('Image', 'mashup');
	    $mashup_var_static_text['mashup_var_banner_code'] = esc_html__('Code', 'mashup');
	    $mashup_var_static_text['mashup_var_banner_ad_sense_code'] = esc_html__('Ad sense Code', 'mashup');
	    $mashup_var_static_text['mashup_var_banner_ad_sense_code_hint'] = esc_html__('Please enter Banner Ad sense Code', 'mashup');
	    $mashup_var_static_text['mashup_var_banner_image_hint'] = esc_html__('Please Select Banner Image', 'mashup');
	    $mashup_var_static_text['mashup_var_banner_target'] = esc_html__('Target', 'mashup');
	    $mashup_var_static_text['mashup_var_banner_target_hint'] = esc_html__('Please select Banner Link Target', 'mashup');
	    $mashup_var_static_text['mashup_var_banner_target_self'] = esc_html__('Self', 'mashup');
	    $mashup_var_static_text['mashup_var_banner_target_blank'] = esc_html__('Blank', 'mashup');
	    $mashup_var_static_text['mashup_var_banner_already_added'] = esc_html__('Added Banners', 'mashup');

	    $mashup_var_static_text['mashup_var_banner_table_title'] = esc_html__('Title', 'mashup');
	    $mashup_var_static_text['mashup_var_banner_table_style'] = esc_html__('Style', 'mashup');
	    $mashup_var_static_text['mashup_var_banner_table_image'] = esc_html__('Image', 'mashup');
	    $mashup_var_static_text['mashup_var_banner_table_clicks'] = esc_html__('Clicks', 'mashup');
	    $mashup_var_static_text['mashup_var_banner_table_shortcode'] = esc_html__('Shortcode', 'mashup');

	    $mashup_var_static_text['mashup_var_title_field'] = esc_html__('Title', 'mashup');
	    $mashup_var_static_text['mashup_var_excerpt_field'] = esc_html__('Excerpt (max 10 words)', 'mashup');
	    $mashup_var_static_text['mashup_var_title_filter'] = esc_html__('Title', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_link'] = esc_html__('View all link', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_text'] = esc_html__('Please enter text for icon', 'mashup');
	    $mashup_var_static_text['mashup_var_url_field'] = esc_html__('Subject', 'mashup');
	    $mashup_var_static_text['mashup_var_url_hint'] = esc_html__('Enter image Url here', 'mashup');
	    $mashup_var_static_text['mashup_var_default'] = esc_html__('Default', 'mashup');
	    $mashup_var_static_text['mashup_var_style'] = esc_html__('Style', 'mashup');
	    $mashup_var_static_text['mashup_var_style_hint'] = esc_html__('Select counter view', 'mashup');
	    $mashup_var_static_text['mashup_var_full_size'] = _x('Full size', 'Used before full size attachment link.', 'mashup');
	    $mashup_var_static_text['mashup_var_published_in'] = _x('<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'mashup');
	    $mashup_var_static_text['mashup_var_search_for'] = _x('Search for:', 'label', 'mashup');
	    $mashup_var_static_text['mashup_var_search_hellip'] = _x('Search &hellip;', 'placeholder', 'mashup');
	    $mashup_var_static_text['mashup_var_search_by_key'] = esc_html__('Search by Keyword', 'mashup');
	    $mashup_var_static_text['mashup_var_search_string'] = _x('Search', 'submit button', 'mashup');
	    $mashup_var_static_text['mashup_var_page_previous'] = esc_html__('Previous Image.', 'mashup');
	    $mashup_var_static_text['mashup_var_page_next'] = esc_html__('Next Image', 'mashup');

	    $mashup_var_static_text['mashup_var_showing_search_results_for'] = esc_html__('showing search results for', 'mashup');
	    $mashup_var_static_text['mashup_var_suggestioins'] = esc_html__('Suggestions', 'mashup');
	    $mashup_var_static_text['mashup_var_content_none_line1'] = esc_html__('Make sure all words are spelled correctly', 'mashup');
	    $mashup_var_static_text['mashup_var_content_none_line2'] = esc_html__('Wildcard searches (using the asterisk *) are not supported', 'mashup');
	    $mashup_var_static_text['mashup_var_content_none_line3'] = esc_html__('Try more general keywords, especially if you are attempting a name', 'mashup');
	    $mashup_var_static_text['mashup_var_404_title'] = esc_html__('PAGE NOT FOUND', 'mashup');
	    $mashup_var_static_text['mashup_var_404_sub_title'] = esc_html__("WE'RE SORRY, BUT THE PAGE YOU WERE LOOKING FOR DOSEN'T EXIST.", 'mashup');
	    $mashup_var_static_text['mashup_var_404_go_to_homepage'] = esc_html__('Go to Homepage', 'mashup');
	    $mashup_var_static_text['mashup_var_search_by_keyword'] = esc_html__('Enter your keyword', 'mashup');
	    $mashup_var_static_text['mashup_var_enter_your_search'] = esc_html__('Enter your search', 'mashup');
	    $mashup_var_static_text['mashup_var_find_videos'] = esc_html__('Find Videos and more....', 'mashup');
	    $mashup_var_static_text['mashup_var_search'] = esc_html__('Search ...', 'mashup');
	    $mashup_var_static_text['mashup_var_search_button'] = esc_html__('Search', 'mashup');
	    $mashup_var_static_text['mashup_var_api_set_msg'] = esc_html__('Please set API key', 'mashup');
	    $mashup_var_static_text['mashup_var_subscribe_success'] = esc_html__('subscribe successfully', 'mashup');
	    $mashup_var_static_text['mashup_var_noresult_found'] = esc_html__('No result found.', 'mashup');
	    $mashup_var_static_text['mashup_var_social_facebook'] = esc_html__('FaceBook.', 'mashup');
	    $mashup_var_static_text['mashup_var_profile_social_links'] = esc_html__('Social Links.', 'mashup');
	    $mashup_var_static_text['mashup_var_social_twitter'] = esc_html__('Twitter.', 'mashup');
	    $mashup_var_static_text['mashup_var_social_google_plus'] = esc_html__('Google Plus.', 'mashup');
	    $mashup_var_static_text['mashup_var_social_instagramme'] = esc_html__('Instagramme.', 'mashup');
	    $mashup_var_static_text['mashup_var_latest_stories'] = esc_html__('Latest Stories', 'mashup');
	    $mashup_var_static_text['mashup_var_view_all_posts'] = esc_html__('View all Posts', 'mashup');
	    $mashup_var_static_text['mashup_var_no_authors_found'] = esc_html__('No authors found', 'mashup');
	    $mashup_var_static_text['mashup_var_featured_topics'] = esc_html__('FEATURED TOPICS:', 'mashup');
	    $mashup_var_static_text['mashup_var_comments'] = esc_html__('Comments', 'mashup');
	    $mashup_var_static_text['mashup_var_comments_off'] = esc_html__('Comments are off for this article', 'mashup');
	    $mashup_var_static_text['mashup_var_most_relevent'] = esc_html__('Most Relevent Links', 'mashup');
	    $mashup_var_static_text['mashup_var_by'] = esc_html__('By ', 'mashup');
	    $mashup_var_static_text['mashup_var_next'] = esc_html__('Next', 'mashup');
	    $mashup_var_static_text['mashup_var_prev'] = esc_html__('Previous', 'mashup');
	    $mashup_var_static_text['mashup_var_tag'] = esc_html__('Tags', 'mashup');
	    $mashup_var_static_text['mashup_var_views'] = esc_html__('Views', 'mashup');
	    $mashup_var_static_text['mashup_var_posts'] = esc_html__('Posts', 'mashup');
	    $mashup_var_static_text['mashup_var_categories'] = esc_html__('Categories', 'mashup');
	    $mashup_var_static_text['mashup_var_dealer_types'] = esc_html__('Dealer Types', 'mashup');
	    $mashup_var_static_text['mashup_var_inventories'] = esc_html__('Inventories', 'mashup');
	    $mashup_var_static_text['mashup_var_inventory_types'] = esc_html__('Inventory types', 'mashup');
	    $mashup_var_static_text['mashup_var_load_from_icomoon'] = esc_html__('Load from IcoMoon', 'mashup');
	    $mashup_var_static_text['mashup_var_ago'] = esc_html__('Ago', 'mashup');
	    $mashup_var_static_text['mashup_var_dont_miss'] = esc_html__("DON'T MISS", 'mashup');
	    $mashup_var_static_text['mashup_var_related_posts'] = esc_html__('Related Posts', 'mashup');
	    $mashup_var_static_text['mashup_var_image_edit'] = esc_html__('Edit "%s"', 'mashup');
	    $mashup_var_static_text['mashup_var_primary_menu'] = esc_html__('Primary Menu', 'mashup');
	    $mashup_var_static_text['mashup_var_social_links_menu'] = esc_html__('Social Links Menu', 'mashup');
	    $mashup_var_static_text['mashup_var_widget_display_text'] = esc_html__('This widget will be displayed on right/left side of the page.', 'mashup');
	    $mashup_var_static_text['mashup_var_widget_display_right_text'] = esc_html__('This widget will be displayed on right side of the page.', 'mashup');
	    $mashup_var_static_text['mashup_var_footer'] = esc_html__('Footer ', 'mashup');
	    $mashup_var_static_text['mashup_var_widgets'] = esc_html__('Widgets ', 'mashup');
	    $mashup_var_static_text['mashup_var_search_result'] = esc_html__('Search Results : %s', 'mashup');
	    $mashup_var_static_text['mashup_var_author'] = esc_html__('Author', 'mashup');
	    $mashup_var_static_text['mashup_var_follow_us'] = esc_html__('Follow me', 'mashup');
	    $mashup_var_static_text['mashup_var_archives'] = esc_html__('Archives', 'mashup');
	    $mashup_var_static_text['mashup_var_daily_archives'] = esc_html__('Daily Archives: %s', 'mashup');
	    $mashup_var_static_text['mashup_var_monthly_archives'] = esc_html__('Monthly Archives: %s', 'mashup');
	    $mashup_var_static_text['mashup_var_yearly_archives'] = esc_html__('Yearly Archives: %s', 'mashup');
	    $mashup_var_static_text['mashup_var_tags'] = esc_html__('Tags', 'mashup');
	    $mashup_var_static_text['mashup_var_category'] = esc_html__('Category', 'mashup');
	    $mashup_var_static_text['mashup_var_home'] = esc_html__('Home', 'mashup');
	    $mashup_var_static_text['mashup_var_current_page'] = esc_html__('Current Page', 'mashup');
	    $mashup_var_static_text['mashup_var_theme_options'] = esc_html__('CS Theme Options', 'mashup');
	    $mashup_var_static_text['mashup_var_previous_page'] = esc_html__('Previous page', 'mashup');
	    $mashup_var_static_text['mashup_var_next_page'] = esc_html__('Next page', 'mashup');
	    $mashup_var_static_text['mashup_var_previous_image'] = esc_html__('Previous Image', 'mashup');
	    $mashup_var_static_text['mashup_var_next_image'] = esc_html__('Next Image', 'mashup');
	    $mashup_var_static_text['mashup_var_pages'] = esc_html__('Pages', 'mashup');
	    $mashup_var_static_text['mashup_var_page'] = esc_html__('Page', 'mashup');
	    $mashup_var_static_text['mashup_var_comments_closed'] = esc_html__('Comments are closed.', 'mashup');
	    $mashup_var_static_text['mashup_var_reply'] = esc_html__('Reply', 'mashup');
	    $mashup_var_static_text['mashup_var_full_width'] = esc_html__('Full Width', 'mashup');
	    $mashup_var_static_text['mashup_var_sidebar_right'] = esc_html__('Sidebar Right', 'mashup');
	    $mashup_var_static_text['mashup_var_sidebar_left'] = esc_html__('Sidebar Left', 'mashup');
	    $mashup_var_static_text['mashup_var_sidebar_small_left'] = esc_html__('Small Left Sidebar', 'mashup');
	    $mashup_var_static_text['mashup_var_sidebar_small_right'] = esc_html__('Small Right Sidebar', 'mashup');
	    $mashup_var_static_text['mashup_var_sidebar_small_left_large_right'] = esc_html__('Small Left and Large Right Sidebars', 'mashup');
	    $mashup_var_static_text['mashup_var_sidebar_large_left_small_right'] = esc_html__('Large Left and Small Right Sidebars', 'mashup');
	    $mashup_var_static_text['mashup_var_sidebar_both_left'] = esc_html__('Both Left Sidebars', 'mashup');
	    $mashup_var_static_text['mashup_var_sidebar_both_right'] = esc_html__('Both Right Sidebars', 'mashup');
	    $mashup_var_static_text['mashup_var_delete_image'] = esc_html__('Delete image', 'mashup');
	    $mashup_var_static_text['mashup_var_edit_item'] = esc_html__('Edit Item', 'mashup');
	    $mashup_var_static_text['mashup_var_description'] = esc_html__('Description', 'mashup');
	    $mashup_var_static_text['mashup_var_video_url'] = esc_html__('Video Url', 'mashup');
	    $mashup_var_static_text['mashup_var_update'] = esc_html__('Update', 'mashup');
	    $mashup_var_static_text['mashup_var_delete'] = esc_html__('Delete', 'mashup');
	    $mashup_var_static_text['mashup_var_select_attribute'] = esc_html__('Select Attribute', 'mashup');
	    $mashup_var_static_text['mashup_var_twitter_widget'] = esc_html__('CS: Twitter Widget', 'mashup');
	    $mashup_var_static_text['mashup_var_twitter_widget_desciption'] = esc_html__('Twitter Widget.', 'mashup');
	    $mashup_var_static_text['mashup_var_twitter_widget_user_name'] = esc_html__('User Name', 'mashup');
	    $mashup_var_static_text['mashup_var_twitter_widget_tweets_num'] = esc_html__('Num of Tweets', 'mashup');
	    $mashup_var_static_text['mashup_var_flickr_gallery'] = esc_html__('CS : Flickr Gallery', 'mashup');
	    $mashup_var_static_text['mashup_var_flickr_description'] = esc_html__('Type a user name to show photos in widget', 'mashup');
	    $mashup_var_static_text['mashup_var_flickr_username'] = esc_html__('Flickr username', 'mashup');
	    $mashup_var_static_text['mashup_var_flickr_username_hint'] = esc_html__('Enter your Flicker Username here', 'mashup');
	    $mashup_var_static_text['mashup_var_flickr_photos'] = esc_html__('Number of Photos', 'mashup');
	    $mashup_var_static_text['mashup_var_error'] = esc_html__('Error:', 'mashup');
	    $mashup_var_static_text['mashup_var_flickr_api_key'] = esc_html__('Please Enter Flickr API key from Theme Options.', 'mashup');
	    $mashup_var_static_text['mashup_var_mailchimp'] = esc_html__('CS: Mail Chimp', 'mashup');
	    $mashup_var_static_text['mashup_var_mailchimp_desciption'] = esc_html__('Mail Chimp Newsletter Widget', 'mashup');
	    $mashup_var_static_text['mashup_var_description_hint'] = esc_html__('Enter discription here.', 'mashup');
	    $mashup_var_static_text['mashup_var_social_icon'] = esc_html__('Social Icon On/Off.', 'mashup');
	    $mashup_var_static_text['mashup_var_recent_post'] = esc_html__('CS : Recent Posts', 'mashup');
	    $mashup_var_static_text['mashup_var_recent_post_des'] = esc_html__('Recent Posts from category.', 'mashup');
	    $mashup_var_static_text['mashup_var_latest_albums'] = esc_html__('CS : Latest Albums', 'mashup');
	    $mashup_var_static_text['mashup_var_latest_albums_des'] = esc_html__('Latest Albums from category.', 'mashup');
	    $mashup_var_static_text['mashup_var_choose_post'] = esc_html__('Choose Post', 'mashup');
	    $mashup_var_static_text['mashup_var_news_reviews_widget_name'] = esc_html__('CS: News Reviews', 'mashup');
	    $mashup_var_static_text['mashup_var_news_reviews_widget_description'] = esc_html__('News Reviews for all website/any category/any post.', 'mashup');
	    $mashup_var_static_text['mashup_var_previous_artical'] = esc_html__('previous artical', 'mashup');
	    $mashup_var_static_text['mashup_var_next_artical'] = esc_html__('Next artical', 'mashup');
	    $mashup_var_static_text['mashup_var_upcoming_events'] = esc_html__('CS : Upcoming Events', 'mashup');
	    $mashup_var_static_text['mashup_var_upcoming_events_desc'] = esc_html__('Upcoming Events from date.', 'mashup');

	    // cs-contact us widget
	    $mashup_var_static_text['mashup_var_widget_contact_us'] = esc_html__('CS : Contact Us', 'mashup');
	    $mashup_var_static_text['mashup_var_widget_contact_us_dscription'] = esc_html__('Add contact us form to your sidebar ', 'mashup');
	    $mashup_var_static_text['mashup_var_widget_contact_us_title'] = esc_html__('Title', 'mashup');
	    $mashup_var_static_text['mashup_var_widget_contact_us_title_hint'] = esc_html__('Enter the title of the widget', 'mashup');
	    $mashup_var_static_text['mashup_var_widget_contact_us_mail_receiver'] = esc_html__('Receiver Mail', 'mashup');
	    $mashup_var_static_text['mashup_var_widget_contact_us_mail_receiver_hint'] = esc_html__('Enter the mail id of message receiver', 'mashup');
	    $mashup_var_static_text['mashup_var_widget_contact_us_success_message'] = esc_html__('Success Message', 'mashup');
	    $mashup_var_static_text['mashup_var_widget_contact_us_success_message_hint'] = esc_html__('Enter mail successfully send message', 'mashup');
	    $mashup_var_static_text['mashup_var_widget_contact_us_error_message'] = esc_html__('Error Message', 'mashup');
	    $mashup_var_static_text['mashup_var_widget_contact_us_error_message_hint'] = esc_html__('Enter error message in any case mail not submitted', 'mashup');
	    $mashup_var_static_text['mashup_var_widget_contact_us_placeholder_mail'] = esc_html__('Enter your email address', 'mashup');
	    $mashup_var_static_text['mashup_var_widget_contact_us_placeholder_message'] = esc_html__('Message...', 'mashup');

	    // recent post widget
	    $mashup_var_static_text['mashup_var_widget_recent_posts_ago'] = esc_html__(' Ago', 'mashup');


	    $mashup_var_static_text['mashup_var_plz_select'] = esc_html__('Please select..', 'mashup');
	    $mashup_var_static_text['mashup_var_choose_category'] = esc_html__('Choose Category', 'mashup');
	    $mashup_var_static_text['mashup_var_choose_category_hint'] = esc_html__('Select category to show posts. If you dont select category it will display all posts.', 'mashup');
	    $mashup_var_static_text['mashup_var_posts_view'] = esc_html__('CS : Posts Views', 'mashup');
	    $mashup_var_static_text['mashup_var_posts_view_des'] = esc_html__('Posts view from category.', 'mashup');
	    $mashup_var_static_text['mashup_var_video_posts'] = esc_html__('CS : Video Posts', 'mashup');
	    $mashup_var_static_text['mashup_var_video_posts_desc'] = esc_html__('Video Posts from category.', 'mashup');
	    $mashup_var_static_text['mashup_var_popular_post'] = esc_html__('CS : Popular Posts', 'mashup');
	    $mashup_var_static_text['mashup_var_popular_post_desc'] = esc_html__('Populay Posts by filter', 'mashup');
	    $mashup_var_static_text['mashup_var_post_excerpt_length'] = esc_html__('Excerpt Length', 'mashup');
	    $mashup_var_static_text['mashup_var_post_excerpt_length_hint'] = esc_html__('Count the words length not a characters', 'mashup');

	    ///widgets cs facebook widget
	    $mashup_var_static_text['mashup_var_facebook'] = esc_html__('CS : Facebook', 'mashup');
	    $mashup_var_static_text['mashup_var_facebook_desc'] = esc_html__('Facebook widget like box total customized with theme.', 'mashup');
	    $mashup_var_static_text['mashup_var_facebook_title'] = esc_html__('Title', 'mashup');
	    $mashup_var_static_text['mashup_var_facebook_url'] = esc_html__('Page Url', 'mashup');
	    $mashup_var_static_text['mashup_var_facebook_profile_url'] = esc_html__('Page Url', 'mashup');
	    $mashup_var_static_text['mashup_var_facebook_bgcolor'] = esc_html__('Background Color', 'mashup');
	    $mashup_var_static_text['mashup_var_facebook_width'] = esc_html__('Width', 'mashup');
	    $mashup_var_static_text['mashup_var_facebook_lightbox_height'] = esc_html__('Like Box Height', 'mashup');
	    $mashup_var_static_text['mashup_var_facebook_hide_cover'] = esc_html__('Hide Cover', 'mashup');
	    $mashup_var_static_text['mashup_var_facebook_show_faces'] = esc_html__('Show Faces', 'mashup');
	    $mashup_var_static_text['mashup_var_facebook_show_post'] = esc_html__('Show Post', 'mashup');
	    $mashup_var_static_text['mashup_var_facebook_hide_cta'] = esc_html__('Hide Cta', 'mashup');
	    $mashup_var_static_text['mashup_var_facebook_small_header'] = esc_html__('Small Header', 'mashup');
	    $mashup_var_static_text['mashup_var_facebook_adaptwidth'] = esc_html__('Adapt Width', 'mashup');

	    $mashup_var_static_text['mashup_var_multiple_cats_posts'] = esc_html__('CS : Multiple Categories Posts', 'mashup');
	    $mashup_var_static_text['mashup_var_multiple_cats_posts_desc'] = esc_html__('Recent Posts from Multiple Categories with Tabs Style.', 'mashup');
	    $mashup_var_static_text['mashup_var_choose_categories'] = esc_html__('Choose Categories.', 'mashup');
	    $mashup_var_static_text['mashup_var_num_post'] = esc_html__('Number of Posts To Display', 'mashup');
	    $mashup_var_static_text['mashup_var_availability'] = esc_html__('Availability', 'mashup');
	    $mashup_var_static_text['mashup_var_ads_description'] = esc_html__('Set Banners option in widget.', 'mashup');
	    $mashup_var_static_text['mashup_var_ads'] = esc_html__('CS: Ads', 'mashup');
	    $mashup_var_static_text['mashup_var_contact'] = esc_html__('CS: Contact Info', 'mashup');
	    $mashup_var_static_text['mashup_var_contact_description'] = esc_html__('Set Contact Info in widget.', 'mashup');
	    $mashup_var_static_text['mashup_var_contact_address'] = esc_html__('Address', 'mashup');
	    $mashup_var_static_text['mashup_var_contact_address_hint'] = esc_html__('Add contact Address here', 'mashup');
	    $mashup_var_static_text['mashup_var_contact_phone'] = esc_html__('Phone', 'mashup');
	    $mashup_var_static_text['mashup_var_contact_email'] = esc_html__('Email', 'mashup');
	    $mashup_var_static_text['mashup_var_contact_desc'] = esc_html__('Description', 'mashup');
	    $mashup_var_static_text['mashup_var_contact_logo'] = esc_html__('Logo', 'mashup');

	    $mashup_var_static_text['mashup_var_due_date_cal'] = esc_html__('CS: Due Date Calculator', 'mashup');
	    $mashup_var_static_text['mashup_var_image'] = esc_html__('Add Image', 'mashup');
	    $mashup_var_static_text['mashup_var_image_ads_hint'] = esc_html__('Select Image for Ads .', 'mashup');
	    $mashup_var_static_text['mashup_var_ads_url'] = esc_html__('Image Url', 'mashup');
	    $mashup_var_static_text['mashup_var_in_stock'] = esc_html__('in stock', 'mashup');
	    $mashup_var_static_text['mashup_var_out_stock'] = esc_html__('out of stock', 'mashup');
	    $mashup_var_static_text['mashup_var_wait'] = esc_html__('Please wait...', 'mashup');
	    $mashup_var_static_text['mashup_var_load_icon'] = esc_html__('Successfully loaded icons', 'mashup');
	    $mashup_var_static_text['mashup_var_try_again'] = esc_html__('Error: Try Again?', 'mashup');
	    $mashup_var_static_text['mashup_var_load_json'] = esc_html__('Load from IcoMoon selection.json', 'mashup');
	    $mashup_var_static_text['mashup_var_are_sure'] = esc_html__('Are you sure! You want to delete this', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_hint'] = esc_html__('Please enter text for icon', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_path'] = esc_html__('Icon Path', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_path_hint'] = esc_html__('Choose Icon Path', 'mashup');
	    $mashup_var_static_text['mashup_var_icon'] = esc_html__('Icon', 'mashup');
	    $mashup_var_static_text['mashup_var_icon_hint'] = esc_html__('Choose icon', 'mashup');
	    $mashup_var_static_text['mashup_var_comment_awaiting'] = esc_html__('Your comment is awaiting moderation.', 'mashup');
	    $mashup_var_static_text['mashup_var_edit'] = esc_html__('Edit', 'mashup');
	    $mashup_var_static_text['mashup_var_you_may'] = esc_html__('You may use these HTML tags and attributes: %s', 'mashup');
	    $mashup_var_static_text['mashup_var_message'] = esc_html__('Comment', 'mashup');
	    $mashup_var_static_text['mashup_var_view_posts'] = esc_html__('View all posts by %s', 'mashup');
	    $mashup_var_static_text['mashup_var_nothing'] = esc_html__('No Pages Were Found Containing "your added text"', 'mashup');
	    $mashup_var_static_text['mashup_var_ready_publish'] = esc_html__('Ready to publish your first post? Get started here.', 'mashup');
	    $mashup_var_static_text['mashup_var_nothing_match'] = esc_html__('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'mashup');
	    $mashup_var_static_text['mashup_var_perhaps'] = esc_html__('It seems we cannot find what you are looking for. Perhaps searching can help.', 'mashup');
	    $mashup_var_static_text['mashup_var_you_must'] = esc_html__('You must be to post a comment.', 'mashup');
	    $mashup_var_static_text['mashup_var_log_out'] = esc_html__('Log out', 'mashup');
	    $mashup_var_static_text['mashup_var_suggestions'] = esc_html__('Suggestions:', 'mashup');
	    $mashup_var_static_text['mashup_var_make_sure'] = esc_html__('Make sure all words are spelled correctly', 'mashup');
	    $mashup_var_static_text['mashup_var_wildcard_searches'] = esc_html__('Wildcard searches (using the asterisk *) are not supported', 'mashup');
	    $mashup_var_static_text['mashup_var_try_more'] = esc_html__('Try more general keywords, especially if you are attempting a name', 'mashup');
	    $mashup_var_static_text['mashup_var_log_out'] = esc_html__('Log out', 'mashup');
		$mashup_var_static_text['mashup_var_logged_in'] = esc_html__('logged in', 'mashup');
		$mashup_var_static_text['mashup_var_log_out_account'] = esc_html__('Log out of this account', 'mashup');
	    $mashup_var_static_text['mashup_var_log_in'] = esc_html__('Logged in as', 'mashup');
	    $mashup_var_static_text['mashup_var_require_fields'] = esc_html__('Required fields are marked %s', 'mashup');
	    $mashup_var_static_text['mashup_var_name'] = esc_html__('Full Name *', 'mashup');
	    $mashup_var_static_text['mashup_var_full_name'] = esc_html__('full name', 'mashup');
	    $mashup_var_static_text['mashup_var_email'] = esc_html__('Email *', 'mashup');
	    $mashup_var_static_text['mashup_var_enter_email'] = esc_html__('Email', 'mashup');
	    $mashup_var_static_text['mashup_var_website'] = esc_html__('Website', 'mashup');
	    $mashup_var_static_text['mashup_var_text_here'] = esc_html__('Your Message', 'mashup');
	    $mashup_var_static_text['mashup_var_leave_comment'] = esc_html__('Leave us a comment', 'mashup');
	    $mashup_var_static_text['mashup_var_cancel_reply'] = esc_html__('Cancel reply', 'mashup');
	    $mashup_var_static_text['mashup_var_post_comment'] = esc_html__('Leave A Comment', 'mashup');
	    $mashup_var_static_text['mashup_var_interested'] = esc_html__('I am interested in a price quote on this vehicle. Please contact me at your earliest convenience with your best price for this vehicle.', 'mashup');
	    $mashup_var_static_text['mashup_var_add_gallery'] = esc_html__('Add Gallery Images', 'mashup');
	    $mashup_var_static_text['mashup_var_widget_setting'] = esc_html__('Widget Setting Export', 'mashup');
	    $mashup_var_static_text['mashup_var_select_all'] = esc_html__('Select All', 'mashup');
		$mashup_var_static_text['mashup_var_widget_setting_import'] = esc_html__('Widget Setting Import', 'mashup');
	    $mashup_var_static_text['mashup_var_unselect_all'] = esc_html__('Un-Select All', 'mashup');
	    $mashup_var_static_text['mashup_var_clear_current'] = esc_html__('Clear Current Widgets Before Import', 'mashup');
	    $mashup_var_static_text['mashup_var_all_active'] = esc_html__('All active widgets will be moved to inactive', 'mashup');
	    $mashup_var_static_text['mashup_var_put_file'] = esc_html__('Put File URL that contains widget settings', 'mashup');
	    $mashup_var_static_text['mashup_var_widget_imported'] = esc_html__('Widgets Imported Successfully.', 'mashup');
	    $mashup_var_static_text['mashup_var_widget_not'] = esc_html__('Widgets data not Imported.', 'mashup');
	    $mashup_var_static_text['mashup_var_readmore_text'] = esc_html__('Read More', 'mashup');
	    $mashup_var_static_text['mashup_var_readmore_text_capital'] = esc_html__('READ MORE', 'mashup');
	    $mashup_var_static_text['mashup_var_sorry_no_post'] = esc_html__('Sorry, no posts matched your criteria.', 'mashup');
	    $mashup_var_static_text['mashup_var_comment_text'] = esc_html__('comment', 'mashup');
	    $mashup_var_static_text['mashup_var_comments_text'] = esc_html__('comments', 'mashup');
	    $mashup_var_static_text['mashup_var_no_post_error'] = esc_html__('No blog post found.', 'mashup');
	    $mashup_var_static_text['mashup_var_published_by'] = esc_html__('published by', 'mashup');
	    $mashup_var_static_text['mashup_var_view_all_posts_by'] = esc_html__('View all posts by ', 'mashup');
	    $mashup_var_static_text['mashup_var_email_not_publish'] = esc_html__('Your email address will not be published. Required fields are marked *', 'mashup');

	    // Social Info widget
	    $mashup_var_static_text['mashup_var_social_info'] = esc_html__('CS : Social Info', 'mashup');
	    $mashup_var_static_text['mashup_var_social_info_desc'] = esc_html__('Enter Social info here.', 'mashup');
	    $mashup_var_static_text['mashup_var_social_info_fb_url'] = esc_html__('Facebook Url', 'mashup');
	    $mashup_var_static_text['mashup_var_social_info_fb_url_desc'] = esc_html__('Enter facebook url here.', 'mashup');
	    $mashup_var_static_text['mashup_var_social_info_tw_url'] = esc_html__('Twitter Url', 'mashup');
	    $mashup_var_static_text['mashup_var_social_info_tw_url_desc'] = esc_html__('Enter twitter url here.', 'mashup');
	    $mashup_var_static_text['mashup_var_social_info_gl_url'] = esc_html__('Google Url', 'mashup');
	    $mashup_var_static_text['mashup_var_social_info_gl_url_desc'] = esc_html__('Enter google url here.', 'mashup');
	    $mashup_var_static_text['mashup_var_social_info_lk_url'] = esc_html__('Linkedin Url', 'mashup');
	    $mashup_var_static_text['mashup_var_social_info_lk_url_desc'] = esc_html__('Enter linkedin url here.', 'mashup');
	    $mashup_var_static_text['mashup_var_social_info_vimeo_url'] = esc_html__('Vimeo Url', 'mashup');
	    $mashup_var_static_text['mashup_var_social_info_vimeo_url_desc'] = esc_html__('Enter vimeo url here.', 'mashup');
	    $mashup_var_static_text['mashup_var_social_info_yt_url'] = esc_html__('Youtube Url', 'mashup');
	    $mashup_var_static_text['mashup_var_social_info_yt_url_desc'] = esc_html__('Enter youtube url here.', 'mashup');
	    $mashup_var_static_text['mashup_var_social_info_rss_url'] = esc_html__('Rss Url', 'mashup');
	    $mashup_var_static_text['mashup_var_social_info_rss_url_desc'] = esc_html__('Enter Rss url here.', 'mashup');

	    //Social media widget
	    $mashup_var_static_text['mashup_var_social_media'] = esc_html__('CS : Social media', 'mashup');
	    $mashup_var_static_text['mashup_var_social_media_desc'] = esc_html__('Enter Social media here.', 'mashup');
	    $mashup_var_static_text['mashup_var_social_info_facebook_url'] = esc_html__('Facebook Page Url', 'mashup');
	    $mashup_var_static_text['mashup_var_social_info_facebook_url_desc'] = esc_html__('Enter facebook page url here.', 'mashup');
	    $mashup_var_static_text['mashup_var_social_info_twitter_url'] = esc_html__('Twitter user', 'mashup');
	    $mashup_var_static_text['mashup_var_social_info_twitter_url_desc'] = esc_html__('Enter twitter user here.', 'mashup');
	    $mashup_var_static_text['mashup_var_social_info_google_url'] = esc_html__('Google username/id', 'mashup');
	    $mashup_var_static_text['mashup_var_social_info_google_url_desc'] = esc_html__('Enter google user or ID  here.', 'mashup');
	    $mashup_var_static_text['mashup_var_social_media_twitter_followers'] = esc_html__('Twitter followers', 'mashup');
	    $mashup_var_static_text['mashup_var_social_media_google_followers'] = esc_html__('G+ Followers', 'mashup');
	    $mashup_var_static_text['mashup_var_social_media_facebook_followers'] = esc_html__('Facebook Fans', 'mashup');

	    // Category fields.
	    $mashup_var_static_text['mashup_var_cat_icon'] = esc_html__('Category Icon', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_icon_hint'] = esc_html__('add category icon here.', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_color'] = esc_html__('Category Color', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_color_hint'] = esc_html__('Choose category color here.', 'mashup');

	    // Category widget.
	    $mashup_var_static_text['mashup_var_cat_widget_title'] = esc_html__('CS: Categories', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_widget_desc'] = esc_html__('A list or dropdown of categories.', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_widget_select_cat'] = esc_html__('Select Category', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_widget_as_dropdown'] = esc_html__('Display as dropdown', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_widget_show_posts_count'] = esc_html__('Show post counts', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_widget_style'] = esc_html__('Views', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_widget_style_desc'] = esc_html__('Choose categories widget views here.', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_widget_style_simple'] = esc_html__('View1', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_widget_style_modern'] = esc_html__('View2', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_widget_show_hierarchy'] = esc_html__('Hierarchy', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_widget_view1'] = esc_html__('View 1', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_widget_view2'] = esc_html__('View 2', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_widget_view3'] = esc_html__('View 3', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_widget_view4'] = esc_html__('View 4', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_widget_view5'] = esc_html__('View 5', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_widget_view6'] = esc_html__('View 6', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_widget_view7'] = esc_html__('View 7', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_widget_view8'] = esc_html__('View 8', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_widget_view9'] = esc_html__('View 9', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_widget_view10'] = esc_html__('View 10', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_widget_bg_color'] = esc_html__('Background Color', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_widget_bg_color_hint'] = esc_html__('Select background color for view', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_widget_filter'] = esc_html__('Filters', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_widget_view_all'] = esc_html__('View All', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_widget_order_by'] = esc_html__('Order By', 'mashup');
	    $mashup_var_static_text['mashup_var_cat_widget_order_by_dir'] = esc_html__('Order Direction', 'mashup');

	    // Weather widget.
	    $mashup_var_static_text['mashup_var_weather_widget_title'] = esc_html__('CS : Weather', 'mashup');
	    $mashup_var_static_text['mashup_var_weather_widget_desc'] = esc_html__('Show the weather from a location you specify.', 'mashup');
	    $mashup_var_static_text['mashup_var_weather_widget_city'] = esc_html__('City', 'mashup');
	    $mashup_var_static_text['mashup_var_weather_widget_city_desc'] = esc_html__('Enter weather city here', 'mashup');
	    $mashup_var_static_text['mashup_var_weather_widget_country'] = esc_html__('Country', 'mashup');
	    $mashup_var_static_text['mashup_var_weather_widget_country_desc'] = esc_html__('Enter weather country here', 'mashup');
	    $mashup_var_static_text['mashup_var_weather_widget_scale'] = esc_html__('Scale', 'mashup');
	    $mashup_var_static_text['mashup_var_weather_widget_scale_desc'] = esc_html__('Choose weather scale here', 'mashup');
	    $mashup_var_static_text['mashup_var_weather_widget_scale_centigrade'] = esc_html__('Centigrade', 'mashup');
	    $mashup_var_static_text['mashup_var_weather_widget_scale_fahrenhite'] = esc_html__('Fahrenhite', 'mashup');
	    $mashup_var_static_text['mashup_var_weather_widget_no_of_days'] = esc_html__('Number of Days', 'mashup');
	    $mashup_var_static_text['mashup_var_weather_widget_no_of_days_desc'] = esc_html__('Choose weather number of days here', 'mashup');
	    $mashup_var_static_text['mashup_var_weather_widget_image_color'] = esc_html__('Image color', 'mashup');
	    $mashup_var_static_text['mashup_var_weather_widget_image_color_hint'] = esc_html__('Select the image color', 'mashup');
	    $mashup_var_static_text['mashup_var_weather_widget_text_color'] = esc_html__('Text color', 'mashup');
	    $mashup_var_static_text['mashup_var_weather_widget_text_color_hint'] = esc_html__('Choose text color', 'mashup');

	    // Due Date widget.
	    $mashup_var_static_text['mashup_var_due_date_desc'] = esc_html__('Enter the first day of your last period and find out when your baby is due.', 'mashup');
	    $mashup_var_static_text['mashup_var_due_date_num_days'] = esc_html__('Usual number of days in your cycle:', 'mashup');
	    $mashup_var_static_text['mashup_var_due_date_calculate_button'] = esc_html__('Calculate my due date', 'mashup');
	    $mashup_var_static_text['mashup_var_due_date_calculate_msg'] = esc_html__('Here are the results based on the information you provided:<br /><br />You next most fertile period is <strong>%1$s to %2$s</strong>.<br ><br />If you conceive within this timeframe, your estimated due date will be <strong>%3$s</strong>', 'mashup');
	    $mashup_var_static_text['mashup_var_due_date_calculate_again_button'] = esc_html__('Calculate again!', 'mashup');

	    // Front End Mega Menu.
	    $mashup_var_static_text['mashup_var_menu_view_more'] = esc_html__('View more...', 'mashup');
	    $mashup_var_static_text['mashup_var_menu_view_less'] = esc_html__('View less', 'mashup');

	    return $mashup_var_static_text;
	}

    }

    new mashup_theme_all_strings;
}
