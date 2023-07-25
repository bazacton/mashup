<?php

/**
 * Mashup_Flickr Class
 *
 * @package Mashup
 */
if ( ! class_exists( 'Mashup_contact' ) ) {

    /**
      Mashup_contact class used to implement the custom contact widget.
     */
    class Mashup_contact extends WP_Widget {

        /**
         * Sets up a new mashup contact widget instance.
         */
        public function __construct() {
            global $mashup_var_static_text;

            parent::__construct(
                    'mashup_contact', // Base ID.
                    mashup_var_theme_text_srt( 'mashup_var_contact' ), // Name.
                    array( 'classname' => 'widget-ad', 'description' => mashup_var_theme_text_srt( 'mashup_var_contact_description' ) )
            );
        }

        /**
         * Outputs the mashup contact widget settings form.
         *
         * @param array $instance current settings.
         */
        function form( $instance ) {
            global $mashup_var_form_fields, $mashup_var_html_fields, $mashup_var_static_text;

            $cs_rand_id = rand( 23789, 934578930 );
            $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'contact_code' => '' ) );
            $title = $instance['title'];
            $address_content = isset( $instance['address_content'] ) ? esc_attr( $instance['address_content'] ) : '';
            $contact_code = $instance['contact_code'];
            $phone = isset( $instance['phone'] ) ? esc_attr( $instance['phone'] ) : '';
            $showcount = isset( $instance['showcount'] ) ? esc_attr( $instance['showcount'] ) : '';
            $email = isset( $instance['email'] ) ? esc_attr( $instance['email'] ) : '';
            $description = isset( $instance['description'] ) ? esc_attr( $instance['description'] ) : '';
            $contact_logo = isset( $instance['contact_logo'] ) ? esc_attr( $instance['contact_logo'] ) : '';

            $strings = new mashup_theme_all_strings;
            $strings->mashup_short_code_strings();

            $mashup_opt_array = array(
                'name' => mashup_var_theme_text_srt( 'mashup_var_title_field' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr( $title ),
                    'classes' => '',
                    'cust_id' => mashup_allow_special_char( $this->get_field_name( 'title' ) ),
                    'cust_name' => mashup_allow_special_char( $this->get_field_name( 'title' ) ),
                    'return' => true,
                    'required' => false,
                ),
            );
            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

            $mashup_opt_array = array(
                'std' => $contact_logo,
                'id' => 'contact_logo',
                'name' => mashup_var_theme_text_srt( 'mashup_var_contact_logo' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'array' => true,
                'field_params' => array(
                    'std' => $contact_logo,
                    'return' => true,
                    'cust_name' => mashup_allow_special_char( $this->get_field_name( 'contact_logo' ) ),
                    'id' => 'contact_logo',
                    'array' => true,
                    'array_txt' => false,
                ),
            );

            $mashup_var_html_fields->mashup_var_upload_file_field( $mashup_opt_array );



            $mashup_opt_array = array(
                'name' => mashup_var_theme_text_srt( 'mashup_var_contact_desc' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => esc_textarea( $description ),
                    'classes' => 'txtfield',
                    'cust_id' => mashup_allow_special_char( $this->get_field_name( 'description' ) ),
                    'cust_name' => mashup_allow_special_char( $this->get_field_name( 'description' ) ),
                    'return' => true,
                ),
            );

            $mashup_var_html_fields->mashup_var_textarea_field( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_theme_text_srt( 'mashup_var_contact_email' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr( $email ),
                    'classes' => '',
                    'cust_id' => mashup_allow_special_char( $this->get_field_name( 'email' ) ),
                    'cust_name' => mashup_allow_special_char( $this->get_field_name( 'email' ) ),
                    'return' => true,
                    'required' => false,
                ),
            );
            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_theme_text_srt( 'mashup_var_contact_address' ),
                'desc' => '',
                'hint_text' => mashup_var_theme_text_srt( 'mashup_var_contact_address_hint' ),
                'echo' => true,
                'field_params' => array(
                    'std' => esc_textarea( $address_content ),
                    'classes' => 'txtfield',
                    'cust_id' => mashup_allow_special_char( $this->get_field_name( 'address_content' ) ),
                    'cust_name' => mashup_allow_special_char( $this->get_field_name( 'address_content' ) ),
                    'return' => true,
                ),
            );

            $mashup_var_html_fields->mashup_var_textarea_field( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_theme_text_srt( 'mashup_var_contact_phone' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr( $phone ),
                    'classes' => '',
                    'cust_id' => mashup_allow_special_char( $this->get_field_name( 'phone' ) ),
                    'cust_name' => mashup_allow_special_char( $this->get_field_name( 'phone' ) ),
                    'return' => true,
                    'required' => false,
                ),
            );
            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
        }

        /**
         * Handles updating settings for the current mashup contact widget instance.
         *
         * @param array $new_instance New settings for this instance as input by the user.
         * @param array $old_instance Old settings for this instance.
         * @return array Settings to save or bool false to cancel saving.
         */
        function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance['title'] = $new_instance['title'];
            $instance['address_content'] = esc_sql( $new_instance['address_content'] );
            $instance['contact_code'] = $new_instance['contact_code'];
            $instance['phone'] = esc_sql( $new_instance['phone'] );
            $instance['showcount'] = esc_sql( $new_instance['showcount'] );
            $instance['email'] = esc_sql( $new_instance['email'] );
            $instance['description'] = esc_sql( $new_instance['description'] );
            $instance['contact_logo'] = esc_sql( $new_instance['contact_logo'] );
            return $instance;
        }

        /**
         * Outputs the content for the current mashup contact widget instance.
         *
         * @param array $args Display arguments including 'before_title', 'after_title',
         *                        'before_widget', and 'after_widget'.
         * @param array $instance Settings for the current contact widget instance.
         */
        function widget( $args, $instance ) {

            extract( $args, EXTR_SKIP );
            global $wpdb, $post, $mashup_var_options;
            $title = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );

            $title = htmlspecialchars_decode( stripslashes( $title ) );
            $address_content = empty( $instance['address_content'] ) ? '' : $instance['address_content'];
            $contact_code = empty( $instance['contact_code'] ) ? '' : $instance['contact_code'];
            $phone = empty( $instance['phone'] ) ? '' : $instance['phone'];
            $email = empty( $instance['email'] ) ? '' : $instance['email'];
            $description = empty( $instance['description'] ) ? '' : $instance['description'];
            $contact_logo = empty( $instance['contact_logo'] ) ? '' : $instance['contact_logo'];
            $showcount = empty( $instance['showcount'] ) ? '' : $instance['showcount'];
            echo '<div class="widget widget-text">';
            if ( '' !== $title ) {
                echo mashup_allow_special_char( $args['before_title'] . $title . $args['after_title'] );
            }
            $showcount = ( '' !== $showcount || ! is_integer( $showcount ) ) ? $showcount : 2;
            echo '<div class="widget widget-text">
                <div class="img-frame"> ';
            if ( filter_var( $contact_logo, FILTER_VALIDATE_URL ) != FALSE ) {
                echo '<a href="' . esc_url( home_url() ) . '"><img src="' . esc_url( $contact_logo ) . '" alt="" /></a>';
            }
            echo '</div>';
            if ( '' !== $description ) {
                echo '<p>' . esc_html($description) . '</p>';
            }
                echo '<ul>';
            if ( '' !== $phone ) {
                echo '<li> <i class="icon-phone-call text-color"></i>
                        <p>' . esc_html($phone) . '</p>
                    </li>';
            }
            if ( '' !== $address_content ) {
                echo '<li> <i class="icon-placeholder text-color"></i>
                        <p>' . esc_html($address_content) . '</p>
                    </li>';
            }
            if ( '' !== $email ) {
                echo '<li> <i class="icon-mail text-color"></i>
                        <p><a href="mailto:' . esc_html($email)   . '">' . esc_html($email) . '</a></p>
                    </li>';
            }
            echo '</ul>
            </div>';

            echo '</div>';
        }

    }

}
    add_action('widgets_init', function() {
        register_widget('Mashup_contact');
    });



