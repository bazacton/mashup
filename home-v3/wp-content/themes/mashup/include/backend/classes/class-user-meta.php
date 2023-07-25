<?php
/**
 * Mashup_Category_Meta Class
 *
 * @package Mashup
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
  Mashup_Category_Meta class used to implement the category meta fields.
 */
class Mashup_User_Meta {

    /**
     * Set up mashup category meta fields.
     */
    public function __construct() {
        add_action( 'show_user_profile', array( $this, 'mashup_extra_user_profile_fields' ) );
        add_action( 'edit_user_profile', array( $this, 'mashup_extra_user_profile_fields' ) );
        add_action( 'personal_options_update', array( $this, 'mashup_extra_user_profile_update' ) );
        add_action( 'edit_user_profile_update', array( $this, 'mashup_extra_user_profile_update' ) );
    }

    public function mashup_extra_user_profile_fields( $user ) {
        global $post, $mashup_form_fields, $mashup_var_html_fields, $mashup_theme_options, $mashup_var_theme_static_text;
        $mashup_theme_options = get_option( 'mashup_theme_options' );
        $mashup_award_switch = $mashup_theme_options['mashup_award_switch'];
        $mashup_portfolio_switch = $mashup_theme_options['mashup_portfolio_switch'];
        $mashup_skills_switch = $mashup_theme_options['mashup_skills_switch'];
        $mashup_education_switch = $mashup_theme_options['mashup_education_switch'];
        $mashup_experience_switch = $mashup_theme_options['mashup_experience_switch'];
        ?>
        <h3><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_profile_social_links' ) ); ?></h3>

        <?php
        $mashup_opt_array = array(
            'name' => mashup_var_theme_text_srt( 'mashup_var_social_facebook' ),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => esc_url( get_the_author_meta( 'facebook_profile', $user->ID ) ),
                'classes' => '',
                'cust_id' => 'facebook_profile',
                'cust_name' => 'facebook_profile',
                'return' => true,
                'required' => false,
            ),
        );
        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
        ?>


        <?php
        $mashup_opt_array = array(
            'name' => mashup_var_theme_text_srt( 'mashup_var_social_twitter' ),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => esc_url( get_the_author_meta( 'twitter_profile', $user->ID ) ),
                'classes' => '',
                'cust_id' => 'twitter_profile',
                'cust_name' => 'twitter_profile',
                'return' => true,
                'required' => false,
            ),
        );
        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
        ?>


        <?php
        $mashup_opt_array = array(
            'name' => mashup_var_theme_text_srt( 'mashup_var_social_google_plus' ),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => esc_url( get_the_author_meta( 'google_profile', $user->ID ) ),
                'classes' => '',
                'cust_id' => 'google_profile',
                'cust_name' => 'google_profile',
                'return' => true,
                'required' => false,
            ),
        );
        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
        ?>


        <?php
        $mashup_opt_array = array(
            'name' => mashup_var_theme_text_srt( 'mashup_var_social_instagramme' ),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => esc_url( get_the_author_meta( 'instagrame_profile', $user->ID ) ),
                'classes' => '',
                'cust_id' => 'instagrame_profile',
                'cust_name' => 'instagrame_profile',
                'return' => true,
                'required' => false,
            ),
        );
        $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
        ?>


        <?php
    }

    public function mashup_extra_user_profile_update( $user_id ) {

        global $wpdb;
        if ( ! current_user_can( 'edit_user', $user_id ) ) {
            return false;
        }
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }
        $facebook_profile = $_POST['facebook_profile'];
        $twitter_profile = $_POST['twitter_profile'];
        $google_profile = $_POST['google_profile'];
        $instagrame_profile = $_POST['instagrame_profile'];

        update_user_meta( $user_id, 'facebook_profile', $facebook_profile );
        update_user_meta( $user_id, 'twitter_profile', $twitter_profile );
        update_user_meta( $user_id, 'google_profile', $google_profile );
        update_user_meta( $user_id, 'instagrame_profile', $instagrame_profile );
    }

}

new Mashup_User_Meta();
?>
