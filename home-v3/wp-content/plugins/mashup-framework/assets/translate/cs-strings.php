<?php

/**
 * @Text which is being used in Framework
 *
 */
if ( ! function_exists( 'mashup_var_frame_text_srt' ) ) {

    function mashup_var_frame_text_srt( $str = '' ) {
        global $mashup_var_frame_static_text;
        if ( isset( $mashup_var_frame_static_text[$str] ) ) {
            return $mashup_var_frame_static_text[$str];
        }
    }

}
if ( ! class_exists( 'mashup_var_frame_all_strings' ) ) {

    class mashup_var_frame_all_strings {

        public function __construct() {

            $this->mashup_var_frame_all_string_all();
        }

        function mashup_var_login_strings() {
            global $mashup_var_frame_static_text;
            /*
             * Sign Up
             * Sign In
             * Forget Password
             * */
            $mashup_var_frame_static_text['mashup_var_join_us'] = __( ' Register', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_confirm_password'] = __( 'CONFIRM PASSWORD ', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_user_registration'] = __( 'User Registration is disabled', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_you_have_already_logged_in'] = __( ' You have already logged in, Please logout to try again.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_please_logout_first'] = __( 'Please logout first then try to login again', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_user_login'] = __( 'User Login', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_username'] = __( 'USERNAME', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_username_small'] = __( 'username', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_password'] = __( 'PASSWORD', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_log_in'] = __( 'Login', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_forgot_password'] = __( 'Forgot Password', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_new_to_us'] = __( 'New to Us?', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_signup_signin'] = __( 'Signup / Signin with', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_desired_username'] = __( 'Type desired username', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_phone'] = __( 'Phone Number', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_phone_hint'] = __( 'Enter Phone Number', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_register_here'] = __( 'Register Here', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_create_account'] = __( 'Create Account', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_not_member_yet'] = __( 'Not a Member yet?', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_Sign_up_now'] = __( 'Sign Up Now', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_or'] = __( 'Or', CSFRAME_DOMAIN );
            //$mashup_var_frame_static_text['mashup_var_sign_in'] = __('Log in', CSFRAME_DOMAIN);
            $mashup_var_frame_static_text['mashup_var_sign_in'] = __( 'SIGN IN', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_password_should_not_be_empty'] = __( 'Password should not be empty', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_password_should_not_match'] = __( 'Password Not Match', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_already_have_account'] = __( ' Already have an account', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_login_now'] = __( ' Login Now', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_user_sign_in'] = __( 'User Sign in', CSFRAME_DOMAIN );

            /*
             *  Login File
             * */
            $mashup_var_frame_static_text['mashup_var_edit_register_options'] = __( 'User Registration Options', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_set_api_key'] = __( 'Please set API key', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_signin_with_your_Social_networks'] = __( 'Signin with your Social Networks', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_google'] = __( 'google', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_linkedin'] = __( 'Linkedin', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_linkedin_title'] = __( 'twitter', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_send_email'] = __( 'Send Email', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_login_here'] = __( 'Login Here', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_enter_email_address'] = __( 'Enter E-Mail address...', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_signup_now'] = __( 'Sign up Now', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_password_recovery'] = __( 'Password Recovery', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_oops_something_went_wrong_updating_your_account'] = __( 'Oops something went wrong updating your account', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_check_your_email_address_for_new_password'] = __( 'Check your email for your new password.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_ur_request_has_been_completed_succssfully'] = __( 'Your request has been completed succssfully, Now you can use following information for login.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_your_new_password'] = __( 'Your new password', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_your_username_is'] = __( 'Your username is:', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_your_new_password_is'] = __( 'Your new password is:', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_from'] = __( 'From:', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_there_is_no_user_registered'] = __( 'There is no user registered with that email address.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_invalid_email_address'] = __( 'Invalid e-mail address.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_username_should_not_be_empty'] = __( 'User name should not be empty.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_password_should_not_be_empty.'] = __( 'Password should not be empty.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_email_should_not_be_empty'] = __( 'Email should not be empty.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_wrong_username_or_password'] = __( 'Wrong username or password.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_login_successfully'] = __( 'Login Successfully...', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_valid_username'] = __( 'Please enter a valid username. You can only enter alphanumeric value and only ( _ ) longer than or equals 5 chars', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_valid_email'] = __( 'Please enter a valid email.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_user_already_exists'] = __( 'User already exists. Please try another one.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_user_registration_detail'] = __( 'User registration Detail', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_check_email'] = __( 'Please check your email for login details', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_successfully_registered_with_login'] = __( 'You have been successfully registered <a href="javascript:void(0);" data-toggle="modal" data-target="#cs-login" data-dismiss="modal" class="cs-color" aria-hidden="true">Login</a>.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_currently_issue'] = __( 'Currently there are and issue', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_successfully_registered'] = __( 'Your account has been registered successfully, Please contact to site admin for password.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_captcha_api_key'] = __( 'Please provide google captcha API keys', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_select_captcha_field'] = __( 'Please select captcha field.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_reload'] = __( 'Reload', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_already_linked'] = __( 'This profile is already linked with other account. Linking process failed!', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_error'] = __( 'ERROR', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_something_went_wrong'] = __( 'Something went wrong: %s', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_problem_connecting_to_twitter'] = __( ' There is problem while connecting to twitter', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_login_error'] = __( 'Login error', CSFRAME_DOMAIN );

            $mashup_var_frame_static_text['mashup_var_facebook'] = __( 'facebook', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_twitter'] = __( 'twitter', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_google_plus_icon'] = __( 'google-plus', CSFRAME_DOMAIN );





            return $mashup_var_frame_static_text;
        }

        public function mashup_var_frame_all_string_all() {

            global $mashup_var_frame_static_text;

            /* framework */


            $mashup_var_frame_static_text['mashup_var_add_page_section'] = __( 'Add Page Sections', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_blog_search'] = __( 'Blog Search', 'mashup' );
            $mashup_var_frame_static_text['mashup_var_Oops_404'] = __( 'Oops! That page can’t be found. ', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_nothing_found_404'] = __( 'It looks like nothing was found at this location. Maybe try a search?. ', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_api_set_msg'] = __( 'Please set API key', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_subscribe_success'] = __( 'subscribe successfully', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_noresult_found'] = __( 'No result found.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_comments'] = __( 'Comments', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_by'] = __( 'By', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_article_ads'] = __( 'Article Bottom Banner', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_next'] = __( 'Next', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_prev'] = __( 'PREVIOUS', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_tag'] = __( 'Tags', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_ago'] = __( 'Ago', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_related_posts'] = __( 'Related Posts', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_feature_image'] = __( 'Feature Image in Detail', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_image_edit'] = __( 'Edit "%s"', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_primary_menu'] = __( 'Primary Menu', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_social_links_menu'] = __( 'Social Links Menu', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_widget_display_text'] = __( 'This widget will be displayed on right/left side of the page.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_widget_display_right_text'] = __( 'This widget will be displayed on right side of the page.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_footer'] = __( 'Footer ', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_widgets'] = __( 'Widgets ', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_search_result'] = __( 'Search Results : %s', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_author'] = __( 'Author', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_archives'] = __( 'Archives', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_packages'] = __( 'Inventory Packages', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_tweets'] = __( 'Tweets', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_no_tweets_found'] = __( 'NO tweets found.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_tweets_time_on'] = __( 'On', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_daily_archives'] = __( 'Daily Archives: %s', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_monthly_archives'] = __( 'Monthly Archives: %s', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_yearly_archives'] = __( 'Yearly Archives: %s', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_tags'] = __( 'Tags', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_error_404'] = __( 'Error 404', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_home'] = __( 'Home', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_current_page'] = __( 'Current Page', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_theme_options'] = __( 'CS Theme Options', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_previous_page'] = __( 'Previous page', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_next_page'] = __( 'Next page', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_previous_image'] = __( 'Previous Image', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_next_image'] = __( 'Next Image', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_pages'] = __( 'Pages:', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_page'] = __( 'Page', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_comments_closed'] = __( 'Comments are closed.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_reply'] = __( 'Reply', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_full_width'] = __( 'Full width', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_sidebar_right'] = __( 'Sidebar Right', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_sidebar_left'] = __( 'Sidebar Left', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_sidebar_small_left'] = __( 'Small Left Sidebar', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_sidebar_small_right'] = __( 'Small Right Sidebar', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_sidebar_small_left_large_right'] = __( 'Small Left and Large Right Sidebars', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_sidebar_large_left_small_right'] = __( 'Large Left and Small Right Sidebars', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_sidebar_both_left'] = __( 'Both Left Sidebars', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_sidebar_both_right'] = __( 'Both Right Sidebars', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_delete_image'] = __( 'Delete image', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_edit_item'] = __( 'Edit Item', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_description'] = __( 'Description', CSFRAME_DOMAIN );

            $mashup_var_frame_static_text['mashup_var_delete'] = __( 'Delete', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_select_attribute'] = __( 'Select Attribute', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_ads'] = __( 'CS : Ads', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_select_image_ads'] = __( 'Select Image from Ads.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_flickr_gallery'] = __( 'CS : Flickr Gallery', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_flickr_description'] = __( 'Type a user name to show photos in widget', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_flickr_username'] = __( 'Flickr username', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_flickr_username_hint'] = __( 'Enter your Flicker Username here', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_flickr_photos'] = __( 'Number of Photos', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_error'] = __( 'Error:', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_flickr_api_key'] = __( 'Please Enter Flickr API key from Theme Options.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_mailchimp'] = __( 'CS: Mail Chimp', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_mailchimp_desciption'] = __( 'Mail Chimp Newsletter Widget', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_description_hint'] = __( 'Enter discription here.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_social_icon'] = __( 'Social Icon On/Off.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_recent_post'] = __( 'CS : Recent Posts', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_recent_post_des'] = __( 'Recent Posts from category.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_choose_category'] = __( 'Choose Category.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_num_post'] = __( 'Number of Posts To Display.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_availability'] = __( 'Availability', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_in_stock'] = __( 'in stock', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_out_stock'] = __( 'out of stock', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_wait'] = __( 'Please wait...', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_load_icon'] = __( 'Successfully loaded icons', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_try_again'] = __( 'Error: Try Again?', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_load_json'] = __( 'Load from IcoMoon selection.json', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_are_sure'] = __( 'Are you sure! You want to delete this', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_hint'] = __( 'Please enter text for icon', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_path'] = __( 'Icon Path', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon'] = __( 'Icon', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_comment_awaiting'] = __( 'Your comment is awaiting moderation.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_edit'] = __( 'Edit', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_you_may'] = __( 'You may use these HTML tags and attributes: %s', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_message'] = __( 'Message', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_view_posts'] = __( 'View all posts by %s', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_nothing'] = __( 'Nothing Found', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_ready_publish'] = __( 'Ready to publish your first post? Get started here.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_nothing_match'] = __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_perhaps'] = __( 'It seems we can’t find what you’re looking for. Perhaps searching can help.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_you_must'] = __( 'You must be to post a comment.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_log_out'] = __( 'Log out', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_log_in'] = __( 'Logged in as', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_require_fields'] = __( 'Required fields are marked %s', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_name'] = __( 'Name *', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_full_name'] = __( 'full name', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_email'] = __( 'Email', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_enter_email'] = __( 'Type your email address', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_website'] = __( 'Website', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_text_here'] = __( 'Text here...', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_leave_comment'] = __( 'Leave us a comment', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_cancel_reply'] = __( 'Cancel reply', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_comment'] = __( 'Post comments', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_interested'] = __( 'I am interested in a price quote on this vehicle. Please contact me at your earliest convenience with your best price for this vehicle.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_dealer'] = __( 'Dealers Listing', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_page_option'] = __( 'Page Options', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_general_setting'] = __( 'General Settings', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_subheader'] = __( 'Subheader', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_choose_subheader'] = __( 'Choose Sub-Header', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_default_subheader'] = __( 'Default Subheader', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_custom_subheader'] = __( 'Custom Subheader', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_rev_slider'] = __( 'Revolution Slider', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_map'] = __( 'Map', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_no_subheader'] = __( 'No Subheader', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_style'] = __( 'Style', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_classic'] = __( 'Classic', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_with_image'] = __( 'With Background Image', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_padding_top'] = __( 'Padding Top', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_padding_top_hint'] = __( 'Set padding top here.(In px)', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_padding_bot'] = __( 'Padding Bottom', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_padding_bot_hint'] = __( 'Set padding bottom. (In px)', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_margin_top'] = __( 'Margin Top', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_margin_top_hint'] = __( 'Set Margin top here.(In px) ', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_margin_bot'] = __( 'Margin Bottom', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_margin_bot_hint'] = __( 'Set Margin bottom. (In px)', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_select_layout'] = __( 'Select Layout', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_page_title'] = __( 'Page Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_text_color'] = __( 'Text Color', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_text_color_hint'] = __( 'Provide a hex color code here (with #) for title.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_breadcrumbs'] = __( 'Breadcrumbs', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_sub_heading'] = __( 'Sub Heading', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_sub_heading_hint'] = __( 'Enter subheading text here.it will display after title.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_bg_image'] = __( 'Background Image', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_bg_image_hint'] = __( 'Choose subheader background image from media gallery or leave it empty for display default image set by theme options.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_parallax'] = __( 'Parallax', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_parallax_hint'] = __( 'Parallax is an effect where the background content or image in this case, is moved at a different speed than the foreground content while scrolling can be enable with this switch.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_bg_color'] = __( 'Background Color', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_bg_color_hint'] = __( 'Provide a hex color code here (with #) if you want to override the default, leave it empty for using background image.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_slider'] = __( 'Select Slider', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_map_sc'] = __( 'Custom Map Short Code', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_header_border'] = __( 'Header Border Color', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_header_hint'] = __( 'Provide a hex color code here (with #) for header border color.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_header_style'] = __( 'Choose Header Style', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_modern_header'] = __( 'Modern Header Style', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_default_header'] = __( 'Default header style', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_side_bar'] = __( 'Select Sidebar', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_choose_sidebar'] = __( 'Choose Sidebar', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_sidebar_hint'] = __( 'Choose sidebar layout for this post.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_left_sidebar'] = __( 'Select Left Sidebar', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_right_sidebar'] = __( 'Select Right Sidebar', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_second_right_sidebar'] = __( 'Select Second Right Sidebar', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_second_left_sidebar'] = __( 'Select Second Left Sidebar', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_options'] = __( 'Post Options', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_social_sharing'] = __( 'Social Sharing', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_about_author'] = __( 'About Author', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_product_options'] = __( 'Product Options', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_add_element'] = __( 'Add Element', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_search'] = __( 'Search', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_show_all'] = __( 'Show all', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_filter_by'] = __( 'Filter by', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_insert_sc'] = __( 'CS: Insert shortcode', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_quote'] = __( 'Blockquote', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_dropcap'] = __( 'Dropcap', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_edit_options'] = __( '%s Options', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_title'] = __( 'Section Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_title_hint'] = __( 'This Title will view on top of this section.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_subtitle'] = __( 'Sub Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_subtitle_hint'] = __( 'This Sub Title will view below the Title of this section.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_bg_view'] = __( 'Background View', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_choose_bg'] = __( 'Choose Background View.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_none'] = __( 'None', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_section_style'] = __( 'Section Title Style', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_section_style_hint'] = __( 'Set section title style', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_default'] = __( 'Default', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_fancy'] = __( 'Fancy', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_modern'] = __( 'Modern', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_title_sub_title_align'] = __( 'Alignment', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_sub_header_align'] = __( 'Text Align', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_title_sub_title_align_hint'] = __( 'Set title/sub title alignment from this dropdown.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_align_left'] = __( 'Left', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_align_center'] = __( 'Center', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_align_right'] = __( 'Right', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_custom_slider'] = __( 'Custom Slider', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_video'] = __( 'Video', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_youtube_vimeo_video_url'] = __( 'Youtube / Vimeo Video URL', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_bg_position'] = __( 'Background Image Position', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_choose_bg_position'] = __( 'Choose Background Image Position', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_no_center_top'] = __( 'no-repeat center top', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_center_top'] = __( 'repeat center top', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_no_center'] = __( 'no-repeat center', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_no_center_cover'] = __( 'no-repeat center / cover', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_repeat_center'] = __( 'repeat center', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_no_left_top'] = __( 'no-repeat left top', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_repeat_left_top'] = __( 'repeat left top', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_no_fixed'] = __( 'no-repeat fixed center', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_no_fixed_cover'] = __( 'no-repeat fixed center / cover', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_custom_slider_hint'] = __( 'Enter Custom Slider', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_video_url'] = __( 'Video Url', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_browse'] = __( 'Browse', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_mute'] = __( 'Enable Mute', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_choose_mute'] = __( 'Choose Mute selection', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_yes'] = __( 'Yes', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_no'] = __( 'No', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_video_auto'] = __( 'Video Auto Play', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_choose_video_auto'] = __( 'Choose Video Auto Play selection', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_enable_parallax'] = __( 'Enable Parallax', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_section_nopadding'] = __( 'No Padding', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_section_nomargin'] = __( 'No Margin', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_select_view'] = __( 'Select View', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_box'] = __( 'Box', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_wide'] = __( 'Wide', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_choose_bg_coor'] = __( 'Choose background color.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_border_top'] = __( 'Border Top', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_border_top_hint'] = __( 'Set the Border top (In px)', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_border_bot'] = __( 'Border Bottom', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_border_bot_hint'] = __( 'Set the Border Bottom (In px)', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_border_color'] = __( 'Border Color', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_choose_border_color'] = __( 'Choose Border color.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_cus_id'] = __( 'Custom Id', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_cus_id_hint'] = __( 'Enter Custom Id.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_select_layout'] = __( 'Select Layout', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_edit_page'] = __( 'Edit Page Section', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_ads_only'] = __( 'Ads', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_inventories'] = __( 'Inventory Listing', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_inventories_search'] = __( 'Inventory Search', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_compare_inventories'] = __( 'Inventory Compare', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_gallery'] = __( 'Gallery', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_cs_gallery'] = __( 'Gallery', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icons_box'] = __( 'Icons Box', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price_plan'] = __( 'Pricing Tables', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_wc_feature'] = __( 'WC Feature Product', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_column'] = __( 'Columns', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_contact_form'] = __( 'Contact Form', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_schedule_form'] = __( 'Schedule Form', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_best_time'] = __( 'Best time', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_testimonial'] = __( 'Testimonial', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_accordion'] = __( 'Accordion', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_multi_services'] = __( 'Multi Services', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_partner'] = __( 'Partner', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_blog'] = __( 'Blog - Views', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_heading'] = __( 'Headings', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_counter'] = __( 'Counter', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_image_frame'] = __( 'Image Frame', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_flex_editor'] = __( 'flex editor', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_editor'] = __( 'Editor', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_call_action'] = __( 'Call To Action', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance'] = __( 'maintenance', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_list'] = __( 'List', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_contact_info'] = __( 'Contact Info', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_divider'] = __( 'Divider', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_promobox'] = __( 'Promobox', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_auto_heading'] = __( 'Mashup Heading', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_button'] = __( 'Buttons', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_sitemap'] = __( 'Site Map', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_listing_price'] = __( 'Listing Price', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_spacer'] = __( 'Spacer', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_typography'] = __( 'Typography', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_common_elements'] = __( 'Common Elements', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_media_element'] = __( 'Media Element', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_content_blocks'] = __( 'Content Blocks', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_loops'] = __( 'Loops', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_wpam'] = __( 'WPAM', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_size'] = __( 'Size', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_column_hint'] = __( 'Select column width. This width will be calculated depend page width.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_one_half'] = __( 'One half', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_one_third'] = __( 'One third', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_two_third'] = __( 'Two third', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_one_fourth'] = __( 'One fourth', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_three_fourth'] = __( 'Three fourth', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_plz_select'] = __( 'Please select..', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_text'] = __( 'Content', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_testimonial_text'] = __( 'Text', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_text_hint'] = __( 'Enter testimonial content here.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_author_hint'] = __( 'Enter testimonial author name here.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_position'] = __( 'Position', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_position_hint'] = __( 'Enter position of author here.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_image'] = __( 'Image', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_image_hint'] = __( 'Set author image from media gallery.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_active'] = __( 'Active', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_active_hint'] = __( 'You can set the accordian section that is open by default on frontend by select dropdown', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_faq_active_hint'] = __( 'You can set the faq section that is open by default on frontend by select dropdown', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_remove'] = __( 'Remove', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_list_Item'] = __( 'List Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_list_Item_hint'] = __( 'Enter list title here.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_tooltip'] = __( 'Choose icon for list.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_list_sc_icon_color'] = __( 'Icon Color', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_list_sc_icon_color_hint'] = __( 'Select icon color', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_list_sc_icon_bg_color'] = __( 'Icon Background Color', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_list_sc_icon_bg_color_hint'] = __( 'Select icon background color', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_listing_title_hint'] = __( 'Enter listing_price text here.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price'] = __( 'Price', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price_hint'] = __( 'Enter listing_price author name here', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_color'] = __( 'Color', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_color_hint'] = __( 'Set text color', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_counter_hint'] = __( 'Enter counter text here', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_counter_author_hint'] = __( 'Enter counter author name here', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_counter_text_hint'] = __( 'Enter position of author here', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_divider_hint'] = __( 'Divider setting on/off', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_image_url'] = __( 'Image Url', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_image_url_hint'] = __( 'Enter image url', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_multiple_service'] = __( 'Multiple Service', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_content_title'] = __( 'Content Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_content_title_hint'] = __( 'Add service title here..', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_link_url'] = __( 'Link Url', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_link_hint'] = __( 'e.g. http://yourdomain.com/.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_content_title_color'] = __( 'Content title Color', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_content_title_color_hint'] = __( 'Set title color from here.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_bg_color'] = __( 'Icon Background Color', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_bg_color_hint'] = __( 'Set the Service Background', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_color'] = __( 'Icon Color', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_color_hint'] = __( 'Set the position of service image here', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_service_text_hint'] = __( 'Enter little description about service.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_content_color'] = __( 'Content Color', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_content_color_hint'] = __( 'Provide a hex colour code here (with #) for text color. if you want to override the default.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_page_builder'] = __( 'CS Page Builder', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_enter_valid'] = __( 'Your Email Address', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_subscribe_success'] = __( 'subscribe successfully', 'mashup' );
            $mashup_var_frame_static_text['mashup_var_api_set_msg'] = __( 'Please set API key', 'mashup' );
            $mashup_var_frame_static_text['mashup_var_inventory_type'] = __( 'Inventory Makes', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_style'] = __( 'Style', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_view'] = __( 'View', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_view_hint'] = __( 'Select post view from this dropdown. Default view is selected from theme option.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_ad_unit'] = __( 'Ad Unit', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_select_ad'] = __( 'Select Ad', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_cover_image'] = __( 'Cover Image', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_format'] = __( 'Format', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_view_default'] = __( 'Default - Selected From Theme Options', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_view_1'] = __( 'View 1', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_view_2'] = __( 'View 2', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_view_3'] = __( 'View 3', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_view_4'] = __( 'View 4', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_view_5'] = __( 'View 5', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_format_masonary'] = __( 'Masonary Slider', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_format_medium'] = __( 'Medium Slider', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_format_large'] = __( 'Large Slider', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_format_small'] = __( 'Small Slider', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_format_sound'] = __( 'Sound', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_format_video'] = __( 'Video', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_inside_thumbnail'] = __( 'Inside Post Thumbnail', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_soundcloud_url'] = __( 'SoundCloud URL', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_view_select_format'] = __( 'Select Format', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_gallery_add_images'] = __( 'Upload Images', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_gallery_meta_options'] = __( 'Gallery Options', CSFRAME_DOMAIN );

            /*
              gallery */
            //custom post type registration gallery
            $mashup_var_frame_static_text['mashup_var_gallery_name'] = _x( 'Galleries', 'post type general name', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_gallery_singular_name'] = _x( 'Gallery', 'post type singular name', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_gallery_menu_name'] = _x( 'Galleries', 'admin menu', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_gallery_name_admin_bar'] = _x( 'Gallery', 'add new on admin bar', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_gallery_add_new'] = _x( 'Add New', 'gallery', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_gallery_add_new_item'] = __( 'Add New Gallery', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_gallery_new_item'] = __( 'New Gallery', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_gallery_edit_item'] = __( 'Edit Gallery', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_gallery_view_item'] = __( 'View Gallery', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_gallery_all_items'] = __( 'All Galleries', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_gallery_search_items'] = __( 'Search Galleries', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_gallery_parent_item_colon'] = __( 'Parent Galleries:', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_gallery_not_found'] = __( 'No galleries found.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_gallery_not_found_in_trash'] = __( 'No galleries found in Trash.', CSFRAME_DOMAIN );
            //custom post type gallery columns addition
            $mashup_var_frame_static_text['mashup_var_tour_category_column'] = __( 'Category', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_tour_cs_gallery_name_column'] = __( 'Gallery Name', CSFRAME_DOMAIN );
            //galleries categories    
            $mashup_var_frame_static_text['mashup_var_cat_name'] = _x( 'Categories', 'taxonomy general name', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_cat__singular_name'] = _x( 'Category', 'taxonomy singular name', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_cat__search_items'] = __( 'Search Categories', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_cat__all_items'] = __( 'All Categories', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_cat__parent_item'] = __( 'Parent Category', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_parent_cat__item_colon'] = __( 'Parent Category:', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_cat__edit_item'] = __( 'Edit Category', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_cat__update_item'] = __( 'Update Category', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_cat__add_new_item'] = __( 'Add New Category', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_cat__new_item_name'] = __( 'New Category Name', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_cat__menu_name'] = __( 'Categories', CSFRAME_DOMAIN );

            //cs-album posttype
            $mashup_var_frame_static_text['mashup_var_album_categories'] = __( 'Categories', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_edit_album'] = __( 'Edit Album', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_new_album_item'] = __( 'New Album Item', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_add_new_album'] = __( 'Add New Album', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_view_album_item'] = __( 'View Album Item', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_search_album'] = __( 'Search Album', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_nothing_found'] = __( 'Nothing found', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_nothing_found_trash'] = __( 'Nothing found in Trash', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_categories'] = __( 'Album Categories', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_search_album_categories'] = __( 'Search Album Categories', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_edit_album_category'] = __( 'Edit Album Category', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_update_album_category'] = __( 'Update Album Category', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_add_new_category'] = __( 'Add New Category', CSFRAME_DOMAIN );
            //cs-album-meta
            $mashup_var_frame_static_text['mashup_var_album_meta_add_track'] = __( 'Add Track', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_meta_title'] = __( 'Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_meta_actions'] = __( 'Actions', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_meta_track_setting'] = __( 'Track Setting', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_meta_add_track_list'] = __( 'Add Track to List', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_meta_update_track'] = __( 'Update Track', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_meta_featured'] = __( 'Featured', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_meta_release_date'] = __( 'Release Date', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_meta_buy_URL'] = __( 'Buy URL', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_meta_download_URL'] = __( 'Download URL', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_meta_album_tracks'] = __( 'Album Tracks', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_meta_album_mp3_track'] = __( 'Mp3 Track', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_small'] = __( 'Small', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_medium'] = __( 'Medium', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_large'] = __( 'Large', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_update'] = __( 'Update', CSFRAME_DOMAIN );



            /*
              multi counter
             */

            $mashup_var_frame_static_text['mashup_var_multiple_counter_title'] = __( 'Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_multiple_counter_title_hint'] = __( 'Enter Title Here', CSFRAME_DOMAIN );

            $mashup_var_frame_static_text['mashup_var_multiple_counter'] = __( 'Counter', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_multiple_counter_icon'] = __( 'Icon', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_multiple_counter_icon_tooltip'] = __( 'Please Select Icon ', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_multiple_counter_count'] = __( 'Count', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_multiple_counter_count_tooltip'] = __( 'Enter Counter Range', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_multiple_counter_content'] = __( 'Content', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_multiple_counter_content_tooltip'] = __( 'Enter Content Here', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_multiple_counter_content_color'] = __( 'Content Color', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_multiple_counter_content_color_tooltip'] = __( 'Select Content Color ', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_thumbnail_view_demo'] = __( 'Thumbnail View demo', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_thumbnail_view_demo_hint'] = __( 'Choose thumbnial view type for this post. None for no image. Single image for display featured image on listings and slider for display slides on thumbnail view.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_single_image'] = __( 'Single Image', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_slider'] = __( 'Slider', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_audio'] = __( 'Audio', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_thumbnail_audio_url'] = __( 'Thumbnail Audio URL', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_thumbnail_audio_url_hint'] = __( 'Enter Audio URL for this Post', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_thumbnail_video_url'] = __( 'Thumbnail Video URL', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_thumbnail_video_url_hint'] = __( 'Enter Specific Video Url (Youtube, Vimeo and Dailymotion)', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_add_gallery_images'] = __( 'Add Gallery Images', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_detail_views'] = __( 'Detail Views', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_simple'] = __( 'Simple', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_fancy'] = __( 'Fancy', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_inside_post_view'] = __( 'Inside Post Thumbnail View', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_inside_post_view_hint'] = __( 'Choose inside thumbnial view type for this post. None for no image. Single image for display featured image on detail. Slider for display slides on detail. Audio for make this audio post and video for display video inside post.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_audio_url'] = __( 'Audio Url', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_audio_url_hint'] = __( 'Enter Mp3 audio url for this post .', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_save'] = __( 'Save', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_cs_gallery_title'] = __( 'Element Title ', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_cs_gallery_title_hint'] = __( 'Enter Gallery title ', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_cs_gallery_type'] = __( 'Style .', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_cs_gallery_type_hint'] = __( 'Select a gallery stype ', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_cs_gallery_style_view_1'] = __( 'View 1', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_cs_gallery_style_view_2'] = __( 'View 2', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_cs_gallery_categories'] = __( 'Category', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_cs_gallery_categories_hint'] = __( 'Select Categories .', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_cs_gallery_type'] = __( 'Style', CSFRAME_DOMAIN );



            /*             * accordion Code */
            $mashup_var_frame_static_text['mashup_var_accordian'] = __( 'Accordion', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_faq'] = __( 'Faq', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_accordion_title'] = __( 'Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_accordion_title_hint'] = __( 'Enter accordion title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_faq_title'] = __( 'Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_faq_title_hint'] = __( 'Enter faq title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_accordion_text'] = __( 'Content', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_accordion_text_hint'] = __( 'Enter accordian content here', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_faq_text'] = __( 'Content', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_faq_text_hint'] = __( 'Enter faq content here', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_accordion_icon'] = __( 'Icon', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_accordion_icon_hint'] = __( 'Select Icon for accordion', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_faq_icon'] = __( 'Icon', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_faq_icon_hint'] = __( 'Select Icon for faq', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_accordion_title_hint'] = __( 'Enter accordion title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_accordion_view'] = __( 'View', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_accordion_view_hint'] = __( 'Select View for Accordion', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_faq_view'] = __( 'View', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_faq_view_hint'] = __( 'Select View for Accordion', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_accordion_view_simple'] = __( 'Simple', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_accordion_view_modern'] = __( 'Modern', CSFRAME_DOMAIN );

            /*             * Site map Short Code */
            $mashup_var_frame_static_text['mashup_var_edit_sitemap'] = __( 'Edit SiteMap Options', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_section_title'] = __( 'Section Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_settings'] = __( 'Post Settings', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_gallery'] = __( 'Post Gallery', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_edit_maintain_page'] = __( 'Edit Maintain Page Options', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_insert'] = __( 'Insert', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_logo'] = __( 'Logo', CSFRAME_DOMAIN );

            $mashup_var_frame_static_text['mashup_var_no_margin_hint'] = __( 'Select Yes to remove margin for this section', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_please_select_maintinance'] = __( 'Please Select a Maintinance Page', CSFRAME_DOMAIN );
            /*             * Client Short Code */
            $mashup_var_frame_static_text['mashup_var_clients'] = __( 'Clients', CSFRAME_DOMAIN );
            /*
              team
             */

            $mashup_var_frame_static_text['mashup_var_team'] = __( 'Team', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_team_sc_add_item'] = __( 'Add Team', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_team_sc_name'] = __( 'Name', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_team_sc_name_hint'] = __( 'Enter team member name here.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_team_sc_designation'] = __( 'Designation', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_team_sc_designation_hint'] = __( 'Enter team member designation here.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_team_sc_image'] = __( 'Team Profile Image', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_team_sc_image_hint'] = __( 'Select team member image from media gallery.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_team_sc_phone'] = __( 'Phone No', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_team_sc_phone_hint'] = __( 'Enter phone number here.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_team_sc_fb'] = __( 'Facebook', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_team_sc_fb_hint'] = __( 'Enter facebook account link here.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_team_sc_twitter'] = __( 'Twitter', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_team_sc_twitter_hint'] = __( 'Enter twitter account link here.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_team_sc_google'] = __( 'Google Plus', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_team_sc_google_hint'] = __( 'Enter google+ accoount link here.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_team_sc_linkedin'] = __( 'Linkedin', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_team_sc_linkedin_hint'] = __( 'Enter linkedin account link here.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_team_sc_youtube'] = __( 'Youtube', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_team_sc_youtube_hint'] = __( 'Enter youtube link here.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_team_sc_title'] = __( 'Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_team_sc_title_hint'] = __( 'Enter Team Title Here', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_team_sc_sub_title'] = __( 'Sub Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_team_sc_sub_title_hint'] = __( 'Enter Team Sub Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_team_sc'] = __( 'Team', CSFRAME_DOMAIN );
            /*             * Maintenance Short Code */

            $mashup_var_frame_static_text['mashup_var_edit_maintenance_page'] = __( 'Maintenance Options', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance'] = __( 'Maintenance', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_sc_title'] = __( 'Element Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_sc_title_hint'] = __( 'Enter Maintenance Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_sc_sub_title'] = __( 'Element Sub Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_sc_sub_title_hint'] = __( 'Enter Maintenance Subtitle', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_sc_text'] = __( 'Content', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_sc_text_hint'] = __( 'Enter Maintenance Text', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_sc_heading'] = __( 'Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_sc_heading_hint'] = __( 'Enter Maintenance title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_sc_views'] = __( 'Views ', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_sc_views_hint'] = __( 'Select a view for underconstruction page.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_sc_view1'] = __( 'View 1 ', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_sc_view2'] = __( 'View 2 ', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_sc_image_hint'] = __( 'Select Image for Maintaince background.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_sc_logo_hint'] = __( 'Select Image for Maintaince Logo.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_sc_launch_date'] = __( 'Launch Date', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_sc_launch_date_hint'] = __( 'Enter launch Date', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_sc_save'] = __( 'Save', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_save_settings'] = __( 'Save Settings', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_select_page'] = __( 'Select A page', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_newsletter'] = __( 'Newsletter ', CSFRAME_DOMAIN );
            /*
              tabs */

            $mashup_var_frame_static_text['mashup_var_tabs'] = __( 'Tabs', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_tab'] = __( 'Tab', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_tabs_desc'] = __( 'You can manage your tabs using this shortcode', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_tab_active'] = __( 'Active', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_tab_active_hint'] = __( 'You can set the tab section that is open by default on frontend by select dropdown', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_tab_item_text'] = __( 'Tab Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_tab_item_text_hint'] = __( 'Enter tab title here.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_tab_desc'] = __( 'Content', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_tab_desc_hint'] = __( 'Enter tab content here.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_tab_icon'] = __( 'Tab Icon', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_tab_icon_hint'] = __( 'Select the Icons you would like to show with your tab .', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_saving_changes'] = __( 'Saving changes...', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_no_title'] = __( 'No Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_no_padding_hint'] = __( 'Select Yes to remove padding for this section', CSFRAME_DOMAIN );




            /* Maintenance Mode */

            $mashup_var_frame_static_text['mashup_var_maintenance_save_btn'] = __( 'Save Settings', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_field_name'] = __( 'Maintenance Mode', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_field_mode'] = __( 'Maintenance Mode', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_field_mode_hint'] = __( 'Turn Maintenance Mode On/Off here', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_field_logo'] = __( 'Maintenance Mode Logo', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_field_logo_hint'] = __( 'Turn Logo On/Off here', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_field_social'] = __( 'Social Contact', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_field_social_hint'] = __( 'Turn Social Contact On/Off here', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_field_newsletter'] = __( 'Newsletter', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_field_newsletter_hint'] = __( 'Turn newsletter On/Off here', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_field_header'] = __( 'Header Switch', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_field_header_hint'] = __( 'Turn Header On/Off here', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_field_footer'] = __( 'Footer Switch', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_field_footer_hint'] = __( 'Turn Footer On/Off here', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_field_select_page'] = __( 'Please Select a Page', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_field_mode_page'] = __( 'Maintenance Mode Page', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_field_mode_page_hint'] = __( 'Choose a page that you want to set for maintenance mode', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_maintenance_save_message'] = __( 'All Settings Saved', CSFRAME_DOMAIN );
            /*
              icos box
             */
            $mashup_var_frame_static_text['mashup_var_icon_boxs_title'] = __( 'Icon Box', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_boxs_views'] = __( 'Views', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_boxs_views_hint'] = __( 'Select the Icon Box style', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_box_view_option_1'] = __( 'Simple', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_box_view_option_2'] = __( 'Top Center', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_boxes_content_title'] = __( 'Icon Box Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_boxes_content_title_hint'] = __( 'Add Icon Box title here', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_boxes_link_url'] = __( 'Title Link', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_boxes_link_url_hint'] = __( 'e.g. http://yourdomain.com/.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_boxes_content_title_color'] = __( 'Content title Color', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_boxes_content_title_color_hint'] = __( 'Set title color from here.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_boxes_Icon'] = __( 'Icon Box Icon', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_boxes_Icon_hint'] = __( 'Select the icons you would like to show with your accordion title.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_box_icon_font_size'] = __( 'Icon Font Size', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_box_icon_font_size_hint'] = __( 'Set the Icon Font Size', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_box_icon_font_size_option_1'] = __( 'Extra Small', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_box_icon_font_size_option_2'] = __( 'Small', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_box_icon_font_size_option_3'] = __( 'Medium', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_box_icon_font_size_option_4'] = __( 'Medium Large', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_box_icon_font_size_option_5'] = __( 'Large', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_box_icon_font_size_option_6'] = __( 'Extra Large', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_box_icon_font_size_option_7'] = __( 'Free Size', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_boxes_Icon_bg'] = __( 'Icon Background Color', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_boxes_Icon_bg_hint'] = __( 'Set the Icon Box Background.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_boxes_Icon_color'] = __( 'Icon Color', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_boxes_Icon_color_hint'] = __( 'Set Icon Box icon color from here', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_boxes_text'] = __( 'Icon Box Content', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_boxes_text_hint'] = __( 'Enter icon box content here.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_box_icon_type'] = __( 'Icon Type', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_box_icon_type_hint'] = __( 'Select icon type image or font icon.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_box_icon_type_1'] = __( 'Icon', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_box_icon_type_2'] = __( 'Image', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_box_image'] = __( 'Image', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_icon_box_image_hint'] = __( 'Attach image from media gallery.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_register_heading'] = __( 'User Registration', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_register'] = __( 'User Registration', CSFRAME_DOMAIN );




            /* Price Table */
            $mashup_var_frame_static_text['mashup_var_price_table_title'] = __( 'Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price_table_title_hint'] = __( 'Enter Price table Title Here', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price_table_title_color'] = __( 'Title Color', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price_table_title_color_hint'] = __( 'Set price-table title color from here', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price_table_price_color'] = __( 'Price Color', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price_table_price_color_hint'] = __( 'Set Price color from here', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price_table_price'] = __( 'Price', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price_table_price_hint'] = __( 'Add price without symbol', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price_table_currency'] = __( 'Currency Symbols', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price_table_currency_hint'] = __( 'Add your currency symbol here like $', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price_table_time'] = __( 'Time Duration', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price_table_time_hint'] = __( 'Add time duration for package or time range like this package for a month or year So wirte here for Mothly and year for Yearly Package', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price_table_button_link'] = __( 'Button Link', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price_table_button_link_hint'] = __( 'Add price table button Link here', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price_table_button_text'] = __( 'Button Text', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price_table_button_text_hint'] = __( 'Add button text here Example : Buy Now, Purchase Now, View Packages etc', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price_table_button_color'] = __( 'Button text Color', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price_table_button_color_hint'] = __( 'Set button color with color picker', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price_table_button_bg_color'] = __( 'Button Background Color', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price_table_button_bg_color_hint'] = __( 'Set button background color with color picker', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price_table_featured'] = __( 'Featured on/off', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price_table_featured_hint'] = __( 'Price table featured option enable/disable with this dropdown', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price_table_description'] = __( 'Content', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price_table_description_hint'] = __( 'Features can be add easily in input with this shortcode 
					    					[feature_item]Text here[/feature_item][feature_item]Text here[/feature_item]', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price_table_column_color'] = __( 'Column Background Color', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_price_table_column_color_hint'] = __( 'Set Column Background color', CSFRAME_DOMAIN );

            /* Progressbar Shortcode */
            $mashup_var_frame_static_text['mashup_var_progressbars'] = __( 'Progress Bars', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_progressbar'] = __( 'Progress Bar', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_progressbar_title'] = __( 'Progress Bar Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_progressbar_title_hint'] = __( 'Enter progress bar title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_progressbar_skill'] = __( 'Skill (in percentage)', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_progressbar_skill_hint'] = __( 'Enter skill (in percentage) here', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_progressbar_color'] = __( 'Progress Bar Color', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_progressbar_color_hint'] = __( 'Set progress bar color here', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_progressbar_add_button'] = __( 'Add Progress Bar', CSFRAME_DOMAIN );

            /* Table Shortcode */
            $mashup_var_frame_static_text['mashup_var_table'] = __( 'Table', CSFRAME_DOMAIN );

            /* Page Editor Tabs */
            $mashup_var_frame_static_text['mashup_var_classic_editor'] = __( 'Classic Editor', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_page_builder'] = __( 'Page Builder', CSFRAME_DOMAIN );

            /* Albums Strings */
            $mashup_var_frame_static_text['mashup_var_albums'] = __( 'Albums', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_add_new_album'] = __( 'Add New Album', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_options'] = __( 'Album Options', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_settings'] = __( 'Album Settings', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_ele_edit_album_settings'] = __( 'Edit Albums', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_element_title'] = __( 'Element Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_element_title_hint'] = __( 'Add Album Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_choose_category'] = __( 'Choose Categories', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_cat_hint'] = __( 'Choose categories to list thier albums.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_col'] = __( 'Collumn Size', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_col_hint'] = __( 'Set Collumn Size', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_one_col'] = __( '1 Column', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_two_col'] = __( '2 Column', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_three_col'] = __( '3 Column', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_four_col'] = __( '4 Column', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_six_col'] = __( '6 Column', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_views_widget_order_by_id'] = __( 'Order by ID', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_views_widget_order_by_date'] = __( 'Order by Date', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_views_widget_order_by_title'] = __( 'Order by Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_views_order_by'] = __( 'Order by', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_post_order_by_hint'] = __( 'Set order by, such as ID, Date or Title.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_post_order'] = __( 'Order', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_post_order_hint'] = __( 'Set order, such as ASC or DESC.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_asc'] = __( 'ASC', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_desc'] = __( 'DESC', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_element_post_title_length'] = __( 'Title Length', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_element_post_title_length_hint'] = __( 'Set Title Length', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_per_page'] = __( 'Posts per page', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_per_page_hint'] = __( 'Set how many posts will appear on a page.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_pagination'] = __( 'Pagination', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_pagination_hint'] = __( 'Set Pagination on/off.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_show_pagination'] = __( 'Show Pagination', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_single_page'] = __( 'Single Page', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_meta_small_desc'] = __( 'Small Description', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_meta_itunes_URL'] = __( 'itunes URL', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_meta_amazon_URL'] = __( 'Amazon URL', CSFRAME_DOMAIN );

            $mashup_var_frame_static_text['mashup_var_album_playlist'] = __( 'Album Playlist', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_ele_edit_album_playlist_settings'] = __( 'Playlist Settings', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_playlist_select'] = __( 'Select Album', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_playlist_select_hint'] = __( 'Select Album for playlist', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_playlist_num_tracks'] = __( 'Number of tracks', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_playlist_num_tracks_hint'] = __( 'Set number of tracks to play i.e 5, 8 or 10.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_playlist_bg'] = __( 'Backgroud Color', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_playlist_bg_hint'] = __( 'Backgroud Color for Playlist', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_playlist_bg_opacity'] = __( 'Backgroud Color Opacity', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_album_playlist_bg_opacity_hint'] = __( 'Set Backgroud Color Opacity for Playlist', CSFRAME_DOMAIN );

            /* Events Strings */
            $mashup_var_frame_static_text['mashup_var_events'] = __( 'Events', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_ele_edit_events_settings'] = __( 'Edit Events', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_choose_category'] = __( 'Choose Categories', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_choose_category_hint'] = __( 'Choose categories to list thier events.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_element_sub_title'] = __( 'Element Sub Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_element_sub_title_hint'] = __( 'Enter text for element subtitle.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_align'] = __( 'Align', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_align_hint'] = __( 'Select alignment from this dropdown.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_heading_sc_left'] = __( 'Left', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_heading_sc_right'] = __( 'Right', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_heading_sc_center'] = __( 'Center', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_listing_types'] = __( 'Listing Types', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_listing_types_hint'] = __( 'Choose events listing type here.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_all_events'] = __( 'All Events', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_upcoming_events'] = __( 'Upcoming Events', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_past_events'] = __( 'Past Events', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_views_order_by'] = __( 'Order by', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_events_order_by_id'] = __( 'Order by ID', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_events_order_by_date'] = __( 'Order by Date', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_events_order_by_event_strat_date'] = __( 'Order by Event Start Date', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_events_order_by_title'] = __( 'Order by Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_post_order_by_hint'] = __( 'Set order by, such as ID, Date or Title.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_post_order'] = __( 'Order', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_asc'] = __( 'ASC', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_desc'] = __( 'DESC', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_post_order_hint'] = __( 'Set order, such as ASC or DESC.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_element_event_title_length'] = __( 'Event Title Length', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_element_event_title_length_hint'] = __( 'Set event title Length (in words).', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_per_page'] = __( 'Posts per page', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_post_per_page_hint'] = __( 'Set how many posts will appear on a page.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_pagination'] = __( 'Pagination', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_pagination_hint'] = __( 'Set Pagination on/off.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_show_pagination'] = __( 'Show Pagination', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_single_page'] = __( 'Single Page', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_load_more'] = __( 'Load More', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_events_location'] = __( 'LOCATION:', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_events_timings'] = __( 'EVENT TIMINGS:', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_events_time_left'] = __( 'TIME LEFT', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_events_date_heading'] = __( 'DATE', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_events_desc_heading'] = __( 'DESCRIPTION', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_events_location_heading'] = __( 'LOCATION', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_events_ticket_price_heading'] = __( 'TICKET PRICE', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_events_tickets_heading'] = __( 'EVENT TICKETS', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_events_not_found'] = __( 'Sorry! No events found.', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_follow_on_facebook'] = __( 'Follow us on Facebook', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_find_on_twitter'] = __( 'Find us on Twitter', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_detail'] = __( 'Event Detail', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_gallery'] = __( 'GALLERY', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_related_events'] = __( 'Related Event', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_events_list_view'] = __( 'Events List', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_events_slideshow_view'] = __( 'Events Slideshow', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_events_views'] = __( 'Views', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_events_views_hint'] = __( 'Choose events listing view from this dropdown', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_events_time_left'] = __( 'TIME LEFT', CSFRAME_DOMAIN );

            //custom post type registration Events
            $mashup_var_frame_static_text['mashup_var_events'] = __( 'Events', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_add_new_event'] = __( 'Add New Event', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_edit_event'] = __( 'Edit Event', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_new_event_item'] = __( 'New Event Item', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_view_events_item'] = __( 'View Events Item', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_search_events'] = __( 'Search Events', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_nothing_found'] = __( 'Nothing found', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_nothing_found_in_trash'] = __( 'Nothing found in Trash', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_events_categories'] = __( 'Categories', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_categories'] = __( 'Event Categories', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_search_event_categories'] = __( 'Search Event Categories', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_edit_event_category'] = __( 'Edit Event Category', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_update_event_category'] = __( 'Update Event Category', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_add_new_event_category'] = __( 'Add New Event Category', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_start_date'] = __( 'Start Date', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_end_date'] = __( 'End Date', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_timing'] = __( 'Timing', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_tags'] = __( 'Event Tags', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_search_tags'] = __( 'Search Tags', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_popular_tags'] = __( 'Popular Tags', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_all_tags'] = __( 'All Tags', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_edit_tag'] = __( 'Edit Tag', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_update_tag'] = __( 'Update Tag', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_add_new_tag'] = __( 'Add New Tag', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_new_tag_name'] = __( 'New Tag Name', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_seperate_tags'] = __( 'Separate tags with commas', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_add_remove_tags'] = __( 'Add or remove tags', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_most_used_tags'] = __( 'Choose from the most used tags', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_tags'] = __( 'Tags', CSFRAME_DOMAIN );

            //custom post type Events Fields
            $mashup_var_frame_static_text['mashup_var_event_options'] = __( 'Event Options', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_location'] = __( 'Location', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_location_field'] = __( 'Event Location', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_location_address'] = __( 'Address', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_location_city_town'] = __( 'City / Town', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_location_post_code'] = __( 'Post Code', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_location_region'] = __( 'Region', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_location_country'] = __( 'Country', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_search_location_on_map'] = __( 'Search This Location on Map', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_start_date'] = __( 'Event Start Date', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_end_date'] = __( 'Event End Date', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_all_day'] = __( 'All Day', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_start_time'] = __( 'Event Start Time', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_end_time'] = __( 'Event End Time', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_repeat'] = __( 'Repeat', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_never_repeat'] = __( '-- Never Repeat --', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_every_day'] = __( 'Every Day', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_every_week'] = __( 'Every Week', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_every_month'] = __( 'Every Month', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_repeat_how_many_time'] = __( 'Repeat how many time', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_schedules_option'] = __( 'Schedules Option', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_schedules_title'] = __( 'Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_schedules_action'] = __( 'Action', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_add_schedule'] = __( 'Add Schedule', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_schedules_setting'] = __( 'Schedules Setting', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_schedules_name'] = __( 'Name', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_schedules_timing'] = __( 'Timing', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_update_schedule'] = __( 'Update Schedule', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_ticket_options'] = __( 'Ticket Options', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_ticket_status'] = __( 'Status', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_ticket_select_status'] = __( 'Please Select Status', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_ticket_status_open'] = __( 'Open', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_ticket_status_cancel'] = __( 'Cancel', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_ticket_status_free'] = __( 'Free', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_ticket_status_closed'] = __( 'Closed', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_ticket_title'] = __( 'Title', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_ticket_url'] = __( 'Url', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_ticket_price'] = __( 'Ticket Price', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_ticket_button_bg_color'] = __( 'Ticket Button Background color', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_gallery_options'] = __( 'Gallery Options', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_event_gallery'] = __( 'Event Gallery', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_gallery'] = __( 'Gallery', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_gallery_num_of_images'] = __( 'No. of Images', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_contact_options'] = __( 'Contact Options', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_contact_phone_number'] = __( 'Phone Number', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_contact_email'] = __( 'Email', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_contact_facebook_url'] = __( 'Facebook Url', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_contact_twitter_url'] = __( 'Twitter Url', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_related_events_options'] = __( 'Related Events Options', CSFRAME_DOMAIN );
            $mashup_var_frame_static_text['mashup_var_event_field_related_events'] = __( 'Related Events', CSFRAME_DOMAIN );

            return $mashup_var_frame_static_text;
        }

    }

}
new mashup_var_frame_all_strings;
