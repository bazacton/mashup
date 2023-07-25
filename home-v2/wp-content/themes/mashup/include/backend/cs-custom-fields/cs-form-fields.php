<?php

/**
 * Form Fields
 */
if ( ! class_exists( 'mashup_var_form_fields' ) ) {

    class mashup_var_form_fields {

        private $counter = 0;

        public function __construct() {

            // Do something...
        }

        /**
         * @ render label
         */
        public function mashup_var_form_text_render( $params = '' ) {

            global $post, $pagenow, $user;

            if ( isset( $params ) && is_array( $params ) ) {
                extract( $params );
            }
            $mashup_var_output = '';
            $prefix_enable = 'true'; // default value of prefix add in name and id
            if ( ! isset( $id ) ) {
                $id = '';
            }
            if ( ! isset( $std ) ) {
                $std = '';
            }

            if ( isset( $prefix_on ) ) {
                $prefix_enable = $prefix_on;
            }

            $prefix = 'mashup_var_'; // default prefix
            if ( isset( $field_prefix ) && $field_prefix != '' ) {
                $prefix = $field_prefix;
            }
            if ( $prefix_enable != true ) {
                $prefix = '';
            }
            if ( $pagenow == 'post.php' && $id != '' ) {
                if ( isset( $cus_field ) && $cus_field == true ) {
                    $mashup_var_value = get_post_meta( $post->ID, $id, true );
                } else {
                    $mashup_var_value = get_post_meta( $post->ID, $prefix . $id, true );
                }
            } elseif ( isset( $usermeta ) && $usermeta == true && $id != '' ) {
                if ( isset( $cus_field ) && $cus_field == true ) {
                    $mashup_var_value = get_the_author_meta( $id, $user->ID );
                } else {
                    if ( isset( $id ) && $id != '' ) {
                        $mashup_var_value = get_the_author_meta( 'mashup_var_' . $id, $user->ID );
                    }
                }
            } else {
                $mashup_var_value = isset( $std ) ? $std : '';
            }
            if ( isset( $mashup_var_value ) && $mashup_var_value != '' ) {
                $value = $mashup_var_value;
            } else {
                $value = $std;
            }

            if ( isset( $force_std ) && $force_std == true ) {
                $value = $std;
            }

            $mashup_var_rand_id = time();

            if ( isset( $rand_id ) && $rand_id != '' ) {
                $mashup_var_rand_id = $rand_id;
            }

            $html_id = ' id="' . $prefix . sanitize_html_class( $id ) . '"';

            if ( isset( $cus_field ) && $cus_field == true ) {
                $html_name = ' name="' . $prefix . 'cus_field[' . sanitize_html_class( $id ) . ']"';
            } else {
                $html_name = ' name="' . $prefix . sanitize_html_class( $id ) . '"';
            }

            if ( isset( $array ) && $array == true ) {
                $html_id = ' id="' . $prefix . sanitize_html_class( $id ) . $mashup_var_rand_id . '"';
                $html_name = ' name="' . $prefix . sanitize_html_class( $id ) . '_array[]"';
            }

            if ( isset( $cust_id ) && $cust_id != '' ) {
                $html_id = ' id="' . $cust_id . '"';
            }

            if ( isset( $cust_name ) && $cust_name != '' ) {
                $html_name = ' name="' . $cust_name . '"';
            }

            // Disabled Field
            $mashup_var_visibilty = '';
            if ( isset( $active ) && $active == 'in-active' ) {
                $mashup_var_visibilty = 'readonly="readonly"';
            }

            $mashup_var_required = '';
            if ( isset( $required ) && $required == 'yes' ) {
                $mashup_var_required = ' required';
            }

            $mashup_var_classes = '';
            if ( isset( $classes ) && $classes != '' ) {
                $mashup_var_classes = ' class="' . $classes . '"';
            }
            $extra_atributes = '';
            if ( isset( $extra_atr ) && $extra_atr != '' ) {
                $extra_atributes = $extra_atr;
            }

            $mashup_var_input_type = 'text';
            if ( isset( $cust_type ) && $cust_type != '' ) {
                $mashup_var_input_type = $cust_type;
            }

            $mashup_var_before = '';
            if ( isset( $before ) && $before != '' ) {
                $mashup_var_before = '<div class="' . $before . '">';
            }

            $mashup_var_after = '';
            if ( isset( $after ) && $after != '' ) {
                $mashup_var_after = $after;
            }

            if ( $html_id == ' id=""' || $html_id == ' id="mashup_var_"' ) {
                $html_id = '';
            }

            if ( isset( $rang ) && $rang == true && isset( $min ) && isset( $max ) ) {
                
            }
            if ( isset( $rang ) && $rang == true && isset( $min ) && isset( $max ) ) {
                $mashup_var_output .= '<ul><li class="to-field"><div class="cs-drag-slider" data-slider-min="' . $min . '" data-slider-max="' . $max . '" data-slider-step="1" data-slider-value="' . $value . '"></div>';
            }

            $mashup_var_output .= $mashup_var_before;
            if ( $value != '' ) {
                $mashup_var_output .= '<input type="' . $mashup_var_input_type . '" ' . $mashup_var_visibilty . $mashup_var_required . ' ' . $extra_atributes . ' ' . $mashup_var_classes . ' ' . $html_id . $html_name . ' value="' . $value . '" />';
            } else {
                $mashup_var_output .= '<input type="' . $mashup_var_input_type . '" ' . $mashup_var_visibilty . $mashup_var_required . ' ' . $extra_atributes . ' ' . $mashup_var_classes . ' ' . $html_id . $html_name . ' />';
            }
            if ( isset( $rang ) && $rang == true && isset( $min ) && isset( $max ) ) {
                $mashup_var_output .= "</li></ul>";
            }
            $mashup_var_output .= $mashup_var_after;

            if ( isset( $return ) && $return == true ) {
                return force_balance_tags( $mashup_var_output );
            } else {
                echo force_balance_tags( $mashup_var_output );
            }
        }

        /**
         * @ render Radio field
         */
        public function mashup_var_form_radio_render( $params = '' ) {
            global $post, $pagenow;
            extract( $params );

            $mashup_var_output = '';

            if ( ! isset( $id ) ) {
                $id = '';
            }

            $prefix_enable = 'true'; // default value of prefix add in name and id

            if ( isset( $prefix_on ) ) {
                $prefix_enable = $prefix_on;
            }

            $prefix = 'mashup_var_';    // default prefix
            if ( isset( $field_prefix ) && $field_prefix != '' ) {
                $prefix = $field_prefix;
            }
            if ( $prefix_enable != true ) {
                $prefix = '';
            }

            if ( $pagenow == 'post.php' && $id != '' ) {
                $mashup_var_value = get_post_meta( $post->ID, 'mashup_var_' . $id, true );
                if ( isset( $mashup_var_value ) && $mashup_var_value != '' ) {
                    $value = $mashup_var_value;
                } else {
                    $value = $std;
                }
            } else {
                $value = $std;
            }

            if ( isset( $cus_field ) && $cus_field == true ) {
                $html_name = ' name="' . $prefix . 'cus_field[' . sanitize_html_class( $id ) . ']"';
            } else {
                $html_name = ' name="' . $prefix . sanitize_html_class( $id ) . '"';
            }

            if ( isset( $array ) && $array == true ) {
                $html_id = ' id="' . $prefix . sanitize_html_class( $id ) . $mashup_var_rand_id . '"';
                $html_name = ' name="' . $prefix . sanitize_html_class( $id ) . '_array[]"';
            }

            if ( isset( $cust_id ) && $cust_id != '' ) {
                $html_id = ' id="' . $cust_id . '"';
            }

            if ( isset( $cust_name ) ) {
                $html_name = ' name="' . $cust_name . '"';
            }

            $html_id = isset( $html_id ) ? $html_id : '';

            // Disbaled Field
            $mashup_var_visibilty = '';
            if ( isset( $active ) && $active == 'in-active' ) {
                $mashup_var_visibilty = 'readonly="readonly"';
            }
            $mashup_var_required = '';
            if ( isset( $required ) && $required == 'yes' ) {
                $mashup_var_required = ' required';
            }
            $mashup_var_classes = '';
            if ( isset( $classes ) && $classes != '' ) {
                $mashup_var_classes = ' class="' . $classes . '"';
            }

            $extra_atributes = '';
            if ( isset( $extra_atr ) && $extra_atr != '' ) {
                $extra_atributes = $extra_atr;
            }

            if ( $html_id == ' id=""' || $html_id == ' id="mashup_var_"' ) {
                $html_id = '';
            }

            $mashup_var_output .= '<input type="radio" ' . $mashup_var_visibilty . $mashup_var_required . ' ' . $mashup_var_classes . ' ' . $extra_atributes . ' ' . $html_id . $html_name . ' value="' . sanitize_text_field( $value ) . '" />';

            if ( isset( $return ) && $return == true ) {
                return force_balance_tags( $mashup_var_output );
            } else {
                echo force_balance_tags( $mashup_var_output );
            }
        }

        /**
         * @ render Radio field
         */
        public function mashup_var_form_hidden_render( $params = '' ) {
            global $post, $pagenow;
            extract( $params );

            $mashup_var_rand_id = time();

            if ( ! isset( $id ) ) {
                $id = '';
            }
            $html_id = '';
            $html_id = ' id="mashup_var_' . sanitize_html_class( $id ) . '"';
            $html_name = ' name="mashup_var_' . sanitize_html_class( $id ) . '"';

            if ( isset( $array ) && $array == true ) {
                $html_name = ' name="mashup_var_' . sanitize_html_class( $id ) . '_array[]"';
            }

            if ( isset( $cust_id ) && $cust_id != '' ) {
                $html_id = ' id="' . $cust_id . '"';
            }

            if ( isset( $cust_name ) ) {
                $html_name = ' name="' . $cust_name . '"';
            }

            $mashup_var_classes = '';
            if ( isset( $classes ) && $classes != '' ) {
                $mashup_var_classes = ' class="' . $classes . '"';
            }

            $extra_atributes = '';
            if ( isset( $extra_atr ) && $extra_atr != '' ) {
                $extra_atributes = $extra_atr;
            }

            if ( $html_id == ' id=""' || $html_id == ' id="mashup_var_"' ) {
                $html_id = '';
            }

            $mashup_var_output = '<input type="hidden" ' . $html_id . ' ' . $mashup_var_classes . ' ' . $extra_atributes . ' ' . $html_name . ' value="' . sanitize_text_field( $std ) . '" />';
            if ( isset( $return ) && $return == true ) {
                return force_balance_tags( $mashup_var_output );
            } else {
                echo force_balance_tags( $mashup_var_output );
            }
        }

        /**
         * @ render Date field
         */
        public function mashup_var_form_date_render( $params = '' ) {

            global $post, $pagenow, $user;
            $mashup_var_format = 'd-m-Y';
            if ( isset( $format ) && $format != '' ) {
                $mashup_var_format = $format;
            }

            if ( isset( $params ) && is_array( $params ) ) {
                extract( $params );
            }

            $mashup_var_output = '';
            $prefix_enable = 'true'; // default value of prefix add in name and id
            if ( ! isset( $id ) ) {
                $id = '';
            }
            if ( ! isset( $std ) ) {
                $std = '';
            }

            if ( isset( $prefix_on ) ) {
                $prefix_enable = $prefix_on;
            }

            $prefix = 'mashup_var_'; // default prefix
            if ( isset( $field_prefix ) && $field_prefix != '' ) {
                $prefix = $field_prefix;
            }
            if ( $prefix_enable != true ) {
                $prefix = '';
            }
            if ( $pagenow == 'post.php' && $id != '' ) {
                if ( isset( $cus_field ) && $cus_field == true ) {
                    $mashup_var_value = get_post_meta( $post->ID, $id, true );
                } else {
                    $mashup_var_value = get_post_meta( $post->ID, $prefix . $id, true );
                }
            } elseif ( isset( $usermeta ) && $usermeta == true && $id != '' ) {
                if ( isset( $cus_field ) && $cus_field == true ) {
                    $mashup_var_value = get_the_author_meta( $id, $user->ID );
                } else {
                    if ( isset( $id ) && $id != '' ) {
                        $mashup_var_value = get_the_author_meta( 'mashup_var_' . $id, $user->ID );
                    }
                }
            } else {
                $mashup_var_value = isset( $std ) ? $std : '';
            }
            if ( isset( $mashup_var_value ) && $mashup_var_value != '' ) {
                $value = $mashup_var_value;
            } else {
                $value = $std;
            }

            if ( isset( $force_std ) && $force_std == true ) {
                $value = $std;
            }

            $mashup_var_rand_id = time();

            if ( isset( $rand_id ) && $rand_id != '' ) {
                $mashup_var_rand_id = $rand_id;
            }

            $html_id = ' id="' . $prefix . sanitize_html_class( $id ) . '"';

            if ( isset( $cus_field ) && $cus_field == true ) {
                $html_name = ' name="' . $prefix . 'cus_field[' . sanitize_html_class( $id ) . ']"';
            } else {
                $html_name = ' name="' . $prefix . sanitize_html_class( $id ) . '"';
            }

            if ( isset( $array ) && $array == true ) {
                $html_id = ' id="' . $prefix . sanitize_html_class( $id ) . $mashup_var_rand_id . '"';
                $html_name = ' name="' . $prefix . sanitize_html_class( $id ) . '_array[]"';
            }

            if ( isset( $cust_id ) && $cust_id != '' ) {
                $html_id = ' id="' . $cust_id . '"';
            }

            if ( isset( $cust_name ) && $cust_name != '' ) {
                $html_name = ' name="' . $cust_name . '"';
            }

            // Disabled Field
            $mashup_var_visibilty = '';
            if ( isset( $active ) && $active == 'in-active' ) {
                $mashup_var_visibilty = 'readonly="readonly"';
            }

            $mashup_var_required = '';
            if ( isset( $required ) && $required == 'yes' ) {
                $mashup_var_required = ' required';
            }

            $mashup_var_classes = '';
            if ( isset( $classes ) && $classes != '' ) {
                $mashup_var_classes = ' class="' . $classes . '"';
            }
            $extra_atributes = '';
            if ( isset( $extra_atr ) && $extra_atr != '' ) {
                $extra_atributes = $extra_atr;
            }

            $mashup_var_input_type = 'text';
            if ( isset( $cust_type ) && $cust_type != '' ) {
                $mashup_var_input_type = $cust_type;
            }

            $mashup_var_before = '';
            if ( isset( $before ) && $before != '' ) {
                $mashup_var_before = '<div class="' . $before . '">';
            }

            $mashup_var_after = '';
            if ( isset( $after ) && $after != '' ) {
                $mashup_var_after = $after;
            }

            if ( $html_id == ' id=""' || $html_id == ' id="mashup_var_"' ) {
                $html_id = '';
            }

            if ( isset( $rang ) && $rang == true && isset( $min ) && isset( $max ) ) {
                $mashup_var_output .= '<div class="cs-drag-slider" data-slider-min="' . absint( $min ) . '" data-slider-max="' . absint( $max ) . '" data-slider-step="1" data-slider-value="' . $value . '">';
            }
            $mashup_var_output .= $mashup_var_before;

            $mashup_var_output .= '<script>
                                jQuery(function(){
                                    jQuery("#' . $prefix . $id . '").datetimepicker({
                                        format:"' . $mashup_var_format . '",
                                        timepicker:false
                                    });
                                });
                          </script>';

            if ( $value != '' ) {
                $mashup_var_output .= '<input type="' . $mashup_var_input_type . '" ' . $mashup_var_visibilty . $mashup_var_required . ' ' . $extra_atributes . ' ' . $mashup_var_classes . ' ' . $html_id . $html_name . ' value="' . $value . '" />';
            } else {
                $mashup_var_output .= '<input type="' . $mashup_var_input_type . '" ' . $mashup_var_visibilty . $mashup_var_required . ' ' . $extra_atributes . ' ' . $mashup_var_classes . ' ' . $html_id . $html_name . ' />';
            }

            $mashup_var_output .= $mashup_var_after;

            if ( isset( $return ) && $return == true ) {
                return force_balance_tags( $mashup_var_output );
            } else {
                echo force_balance_tags( $mashup_var_output );
            }
        }

        /**
         * @ render Textarea field
         */
        public function mashup_var_form_textarea_render( $params = '' ) {
            global $post, $pagenow;
            extract( $params );

            $mashup_var_output = '';
            if ( ! isset( $id ) ) {
                $id = '';
            }
            if ( $pagenow == 'post.php' ) {
                if ( isset( $cus_field ) && $cus_field == true ) {
                    $mashup_var_value = get_post_meta( $post->ID, $id, true );
                } else {
                    $mashup_var_value = get_post_meta( $post->ID, 'mashup_var_' . $id, true );
                }
            } elseif ( isset( $usermeta ) && $usermeta == true ) {
                if ( isset( $cus_field ) && $cus_field == true ) {
                    $mashup_var_value = get_the_author_meta( $id, $user->ID );
                } else {
                    if ( isset( $id ) && $id != '' ) {
                        $mashup_var_value = get_the_author_meta( 'mashup_var_' . $id, $user->ID );
                    }
                }
            } else {
                $mashup_var_value = $std;
            }

            if ( isset( $mashup_var_value ) && $mashup_var_value != '' ) {
                $value = $mashup_var_value;
            } else {
                $value = $std;
            }

            $mashup_var_rand_id = time();

            if ( isset( $force_std ) && $force_std == true ) {
                $value = $std;
            }

            $html_id = ' id="mashup_var_' . sanitize_html_class( $id ) . '"';
            if ( isset( $cus_field ) && $cus_field == true ) {
                $html_name = ' name="mashup_var_cus_field[' . sanitize_html_class( $id ) . ']"';
            } else {
                $html_name = ' name="mashup_var_' . sanitize_html_class( $id ) . '"';
            }

            if ( isset( $array ) && $array == true ) {
                $html_id = ' id="mashup_var_' . sanitize_html_class( $id ) . $mashup_var_rand_id . '"';
                $html_name = ' name="mashup_var_' . sanitize_html_class( $id ) . '_array[]"';
            }

            if ( isset( $cust_id ) && $cust_id != '' ) {
                $html_id = ' id="' . $cust_id . '"';
            }

            if ( isset( $cust_name ) ) {
                $html_name = ' name="' . $cust_name . '"';
            }

            $mashup_var_required = '';
            if ( isset( $required ) && $required == 'yes' ) {
                $mashup_var_required = ' required';
            }
            $mashup_var_before = '';
            if ( isset( $before ) && $before != '' ) {
                $mashup_var_before = '<div class="' . $before . '">';
            }

            $extra_atributes = '';
            if ( isset( $extra_atr ) && $extra_atr != '' ) {
                $extra_atributes = $extra_atr;
            }

            $mashup_var_classes = '';
            if ( isset( $classes ) && $classes != '' ) {
                $mashup_var_classes = ' class="' . $classes . '"';
            }

            $mashup_var_after = '';
            if ( isset( $after ) && $after != '' ) {
                $mashup_var_after = '</div>';
            }

            if ( $html_id == ' id=""' || $html_id == ' id="mashup_var_"' ) {
                $html_id = '';
            }

            $mashup_var_output .= $mashup_var_before;
            $mashup_var_output .= ' <textarea' . $mashup_var_required . ' ' . $extra_atributes . ' ' . $html_id . $html_name . $mashup_var_classes . '>' . $value . '</textarea>';
            $mashup_var_output .= $mashup_var_after;

            if ( isset( $return ) && $return == true ) {
                return force_balance_tags( $mashup_var_output );
            } else {
                echo force_balance_tags( $mashup_var_output );
            }
        }

        /**
         * @ render select field
         */
        public function mashup_var_form_select_render( $params = '' ) {
            global $post, $pagenow;
            extract( $params );
            $prefix_enable = 'true';    // default value of prefix add in name and id
            if ( ! isset( $id ) ) {
                $id = '';
            }
            $mashup_var_output = '';

            if ( isset( $prefix_on ) ) {
                $prefix_enable = $prefix_on;
            }

            $prefix = 'mashup_var_';    // default prefix
            if ( isset( $field_prefix ) && $field_prefix != '' ) {
                $prefix = $field_prefix;
            }
            if ( $prefix_enable != true ) {
                $prefix = '';
            }

            $mashup_var_onchange = '';

            if ( $pagenow == 'post.php' && $id != '' ) {
                if ( isset( $cus_field ) && $cus_field == true ) {
                    $mashup_var_value = get_post_meta( $post->ID, $id, true );
                } else {
                    $mashup_var_value = get_post_meta( $post->ID, $prefix . $id, true );
                }
            } elseif ( isset( $usermeta ) && $usermeta == true ) {
                if ( isset( $cus_field ) && $cus_field == true ) {
                    $mashup_var_value = get_the_author_meta( $id, $user->ID );
                } else {
                    if ( isset( $id ) && $id != '' ) {
                        $mashup_var_value = get_the_author_meta( 'mashup_var_' . $id, $user->ID );
                    }
                }
            } else {
                $mashup_var_value = $std;
            }

            if ( isset( $mashup_var_value ) && $mashup_var_value != '' ) {
                $value = $mashup_var_value;
            } else {
                $value = $std;
            }

            $mashup_var_rand_id = time();
            if ( isset( $rand_id ) && $rand_id != '' ) {
                $mashup_var_rand_id = $rand_id;
            }

            $html_wraper = ' id="wrapper_' . sanitize_html_class( $id ) . '"';
            $html_id = ' id="' . $prefix . sanitize_html_class( $id ) . '"';
            if ( isset( $cus_field ) && $cus_field == true ) {
                $html_name = ' name="' . $prefix . 'cus_field[' . sanitize_html_class( $id ) . ']"';
            } else {
                $html_name = ' name="' . $prefix . sanitize_html_class( $id ) . '"';
            }

            if ( isset( $array ) && $array == true ) {
                $html_id = ' id="' . $prefix . sanitize_html_class( $id ) . $mashup_var_rand_id . '"';
                $html_name = ' name="' . $prefix . sanitize_html_class( $id ) . '_array[]"';
                $html_wraper = ' id="wrapper_' . sanitize_html_class( $id ) . $mashup_var_rand_id . '"';
            }

            if ( isset( $cust_id ) && $cust_id != '' ) {
                $html_id = ' id="' . $cust_id . '"';
            }

            if ( isset( $cust_name ) ) {
                $html_name = ' name="' . $cust_name . '"';
            }

            $mashup_var_display = '';
            if ( isset( $status ) && $status == 'hide' ) {
                $mashup_var_display = 'style=display:none';
            }

            if ( isset( $onclick ) && $onclick != '' ) {
                $mashup_var_onchange = 'onchange="' . $onclick . '"';
            }

            $mashup_var_visibilty = '';
            if ( isset( $active ) && $active == 'in-active' ) {
                $mashup_var_visibilty = 'readonly="readonly"';
            }
            $mashup_var_required = '';
            if ( isset( $required ) && $required == 'yes' ) {
                $mashup_var_required = ' required';
            }
            $mashup_var_classes = '';
            if ( isset( $classes ) && $classes != '' ) {
                $mashup_var_classes = ' class="' . $classes . '"';
            }
            $extra_atributes = '';
            if ( isset( $extra_atr ) && $extra_atr != '' ) {
                $extra_atributes = $extra_atr;
            }

            if ( isset( $markup ) && $markup != '' ) {
                $mashup_var_output .= $markup;
            }

            if ( isset( $div_classes ) && $div_classes <> "" ) {
                $mashup_var_output .= '<div class="' . esc_attr( $div_classes ) . '">';
            }

            if ( $html_id == ' id=""' || $html_id == ' id="mashup_var_"' ) {
                $html_id = '';
            }

            $mashup_var_output .= '<select ' . $mashup_var_visibilty . ' ' . $mashup_var_required . ' ' . $extra_atributes . ' ' . $mashup_var_classes . ' ' . $html_id . $html_name . ' ' . $mashup_var_onchange . ' >';
            if ( isset( $options_markup ) && $options_markup == true ) {
                $mashup_var_output .= $options;
            } else {
                if ( isset( $first_option ) && $first_option <> "" ) {
                    $mashup_var_output .= $first_option;
                }
                if ( is_array( $options ) ) {
                    foreach ( $options as $key => $option ) {
                        if ( ! is_array( $option ) ) {
                            $mashup_var_output .= '<option ' . selected( $key, $value, false ) . ' value="' . $key . '">' . $option . '</option>';
                        }
                    }
                }
            }
            $mashup_var_output .= '</select>';

            if ( isset( $div_classes ) && $div_classes <> "" ) {
                $mashup_var_output .= '</div>';
            }

            if ( isset( $return ) && $return == true ) {
                return force_balance_tags( $mashup_var_output );
            } else {
                echo force_balance_tags( $mashup_var_output );
            }
        }

        /**
         * @ render Multi Select field
         */
        public function mashup_var_form_multiselect_render( $params = '' ) {
            global $post, $pagenow;
            extract( $params );

            $mashup_var_output = '';

            $prefix_enable = 'true';    // default value of prefix add in name and id
            if ( isset( $prefix_on ) ) {
                $prefix_enable = $prefix_on;
            }

            $prefix = 'mashup_var_';    // default prefix
            if ( isset( $field_prefix ) && $field_prefix != '' ) {
                $prefix = $field_prefix;
            }
            if ( $prefix_enable != true ) {
                $prefix = '';
            }
            $mashup_var_onchange = '';

            if ( $pagenow == 'post.php' ) {
                if ( isset( $cus_field ) && $cus_field == true ) {
                    $mashup_var_value = get_post_meta( $post->ID, $id, true );
                } else {
                    $mashup_var_value = get_post_meta( $post->ID, $prefix . $id, true );
                }
            } elseif ( isset( $usermeta ) && $usermeta == true ) {
                if ( isset( $cus_field ) && $cus_field == true ) {
                    $mashup_var_value = get_the_author_meta( $id, $user->ID );
                } else {
                    if ( isset( $id ) && $id != '' ) {
                        $mashup_var_value = get_the_author_meta( 'mashup_var_' . $id, $user->ID );
                    }
                }
            } else {
                $mashup_var_value = $std;
            }
            if ( isset( $mashup_var_value ) && $mashup_var_value != '' ) {
                $value = $mashup_var_value;
            } else {
                $value = $std;
            }
            $mashup_var_rand_id = time();
            if ( isset( $rand_id ) && $rand_id != '' ) {
                $mashup_var_rand_id = $rand_id;
            }
            $html_wraper = '';
            if ( isset( $id ) && $id != '' ) {
                $html_wraper = ' id="wrapper_' . sanitize_html_class( $id ) . '"';
            }
            $html_id = '';
            if ( isset( $id ) && $id != '' ) {
                $html_id = ' id="' . $prefix . sanitize_html_class( $id ) . '"';
            }
            $html_name = '';
            if ( isset( $cus_field ) && $cus_field == true ) {
                $html_name = ' name="' . $prefix . 'cus_field[' . sanitize_html_class( $id ) . '][]"';
            } else {
                if ( isset( $id ) && $id != '' ) {
                    $html_name = ' name="' . $prefix . sanitize_html_class( $id ) . '[]"';
                }
            }

            if ( isset( $cust_id ) && $cust_id != '' ) {
                $html_id = ' id="' . $cust_id . '"';
            }

            if ( isset( $cust_name ) ) {
                $html_name = ' name="' . $cust_name . '"';
            }

            $mashup_var_display = '';
            if ( isset( $status ) && $status == 'hide' ) {
                $mashup_var_display = 'style=display:none';
            }

            if ( isset( $onclick ) && $onclick != '' ) {
                $mashup_var_onchange = 'onchange="javascript:' . $onclick . '(this.value, \'' . esc_js( admin_url( 'admin-ajax.php' ) ) . '\')"';
            }

            if ( ! is_array( $value ) && $value != '' ) {
                $value = explode( ',', $value );
            }

            if ( ! is_array( $value ) ) {
                $value = array();
            }

            // Disbaled Field
            $mashup_var_visibilty = '';
            if ( isset( $active ) && $active == 'in-active' ) {
                $mashup_var_visibilty = 'readonly="readonly"';
            }
            $mashup_var_required = '';
            if ( isset( $required ) && $required == 'yes' ) {
                $mashup_var_required = ' required';
            }
            $mashup_var_classes = '';
            if ( isset( $classes ) && $classes != '' ) {
                $mashup_var_classes = ' class="multiple ' . $classes . '"';
            } else {
                $mashup_var_classes = ' class="multiple"';
            }
            $extra_atributes = '';
            if ( isset( $extra_atr ) && $extra_atr != '' ) {
                $extra_atributes = $extra_atr;
            }

            if ( $html_id == ' id=""' || $html_id == ' id="mashup_var_"' ) {
                $html_id = '';
            }

            $mashup_var_output .= '<select' . $mashup_var_visibilty . $mashup_var_required . ' ' . $extra_atributes . ' ' . $mashup_var_classes . ' ' . ' multiple="multiple" ' . $html_id . $html_name . ' ' . $mashup_var_onchange . ' style="height:110px !important;">';

            if ( isset( $options_markup ) && $options_markup == true ) {
                $mashup_var_output .= $options;
            } else {
                foreach ( $options as $key => $option ) {
                    $selected = '';
                    if ( in_array( $key, $value ) ) {
                        $selected = 'selected="selected"';
                    }

                    $mashup_var_output .= '<option ' . $selected . 'value="' . $key . '">' . $option . '</option>';
                }
            }
            $mashup_var_output .= '</select>';

            if ( isset( $return ) && $return == true ) {
                return force_balance_tags( $mashup_var_output );
            } else {
                echo force_balance_tags( $mashup_var_output );
            }
        }

        /**
         * @ render Checkbox field
         */
        public function mashup_var_form_checkbox_render( $params = '' ) {
            global $post, $pagenow;
            extract( $params );
            $prefix_enable = 'true';    // default value of prefix add in name and id

            $mashup_var_output = '';

            if ( isset( $prefix_on ) ) {
                $prefix_enable = $prefix_on;
            }

            if ( ! isset( $id ) ) {
                $id = '';
            }

            $prefix = 'mashup_var_';    // default prefix
            if ( isset( $field_prefix ) && $field_prefix != '' ) {
                $prefix = $field_prefix;
            }
            if ( $prefix_enable != true ) {
                $prefix = '';
            }
            if ( $pagenow == 'post.php' ) {
                $mashup_var_value = get_post_meta( $post->ID, 'mashup_var_' . $id, true );
            } elseif ( isset( $usermeta ) && $usermeta == true ) {
                if ( isset( $cus_field ) && $cus_field == true ) {
                    $mashup_var_value = get_the_author_meta( $id, $user->ID );
                } else {
                    if ( isset( $id ) && $id != '' ) {
                        $mashup_var_value = get_the_author_meta( 'mashup_var_' . $id, $user->ID );
                    }
                }
            } else {
                $mashup_var_value = $std;
            }

            if ( isset( $mashup_var_value ) && $mashup_var_value != '' ) {
                $value = $mashup_var_value;
            } else {
                $value = $std;
            }

            $mashup_var_rand_id = time();

            $html_id = ' id="' . $prefix . sanitize_html_class( $id ) . '"';
            $btn_name = ' name="' . $prefix . sanitize_html_class( $id ) . '"';
            $html_name = ' name="' . $prefix . sanitize_html_class( $id ) . '"';

            if ( isset( $array ) && $array == true ) {
                $html_id = ' id="' . $prefix . sanitize_html_class( $id ) . $mashup_var_rand_id . '"';
                $btn_name = ' name="' . $prefix . sanitize_html_class( $id ) . $mashup_var_rand_id . '"';
                $html_name = ' name="' . $prefix . sanitize_html_class( $id ) . '_array[]"';
            }

            if ( isset( $cust_id ) && $cust_id != '' ) {
                $html_id = ' id="' . $cust_id . '"';
            }

            if ( isset( $cust_name ) ) {
                $html_name = ' name="' . $cust_name . '"';
            }

            $checked = isset( $value ) && $value == 'on' ? ' checked="checked"' : '';
            // Disbaled Field
            $mashup_var_visibilty = '';
            if ( isset( $active ) && $active == 'in-active' ) {
                $mashup_var_visibilty = 'readonly="readonly"';
            }
            $mashup_var_required = '';
            if ( isset( $required ) && $required == 'yes' ) {
                $mashup_var_required = ' required';
            }
            $mashup_var_classes = '';
            if ( isset( $classes ) && $classes != '' ) {
                $mashup_var_classes = ' class="' . $classes . '"';
            }
            $extra_atributes = '';
            if ( isset( $extra_atr ) && $extra_atr != '' ) {
                $extra_atributes = $extra_atr;
            }

            if ( $html_id == ' id=""' || $html_id == ' id="mashup_var_"' ) {
                $html_id = '';
            }

            if ( isset( $simple ) && $simple == true ) {
                if ( $value == '' ) {
                    $mashup_var_output .= '<input type="checkbox" ' . $html_id . $html_name . ' ' . $mashup_var_classes . ' ' . $checked . ' ' . $extra_atributes . ' />';
                } else {
                    $mashup_var_output .= '<input type="checkbox" ' . $html_id . $html_name . ' ' . $mashup_var_classes . ' ' . $checked . ' value="' . $value . '"' . $extra_atributes . ' />';
                }
            } else {
                $mashup_var_output .= '<label class="pbwp-checkbox cs-chekbox">';
                $mashup_var_output .= '<input type="hidden"' . $html_id . $html_name . ' value="' . sanitize_text_field( $std ) . '" />';
                $mashup_var_output .= '<input type="checkbox" ' . $mashup_var_classes . ' ' . $btn_name . $checked . ' ' . $extra_atributes . ' />';
                $mashup_var_output .= '<span class="pbwp-box"></span>';
                $mashup_var_output .= '</label>';
            }

            if ( isset( $return ) && $return == true ) {
                return force_balance_tags( $mashup_var_output );
            } else {
                echo force_balance_tags( $mashup_var_output );
            }
        }

        /**
         * @ render Checkbox With Input Field
         */
        public function mashup_var_form_checkbox_with_field_render( $params = '' ) {
            global $post, $pagenow;
            extract( $params );
            extract( $field );
            $prefix_enable = 'true';    // default value of prefix add in name and id

            if ( isset( $prefix_on ) ) {
                $prefix_enable = $prefix_on;
            }

            $prefix = 'mashup_var_';    // default prefix
            if ( isset( $field_prefix ) && $field_prefix != '' ) {
                $prefix = $field_prefix;
            }
            if ( $prefix_enable != true ) {
                $prefix = '';
            }

            $mashup_var_value = get_post_meta( $post->ID, $prefix . $id, true );
            if ( isset( $usermeta ) && $usermeta == true ) {
                if ( isset( $cus_field ) && $cus_field == true ) {
                    $mashup_var_value = get_the_author_meta( $id, $user->ID );
                } else {
                    if ( isset( $id ) && $id != '' ) {
                        $mashup_var_value = get_the_author_meta( 'mashup_var_' . $id, $user->ID );
                    }
                }
            }
            if ( isset( $mashup_var_value ) && $mashup_var_value != '' ) {
                $value = $mashup_var_value;
            } else {
                $value = $std;
            }

            $mashup_var_input_value = get_post_meta( $post->ID, $prefix . $field_id, true );
            if ( isset( $mashup_var_input_value ) && $mashup_var_input_value != '' ) {
                $input_value = $mashup_var_input_value;
            } else {
                $input_value = $field_std;
            }

            $mashup_var_visibilty = ''; // Disbaled Field
            if ( isset( $active ) && $active == 'in-active' ) {
                $mashup_var_visibilty = 'readonly="readonly"';
            }
            $mashup_var_required = '';
            if ( isset( $required ) && $required == 'yes' ) {
                $mashup_var_required = ' required';
            }
            $mashup_var_classes = '';
            if ( isset( $classes ) && $classes != '' ) {
                $mashup_var_classes = ' class="' . $classes . '"';
            }
            $extra_atributes = '';
            if ( isset( $extra_atr ) && $extra_atr != '' ) {
                $extra_atributes = $extra_atr;
            }

            $mashup_var_output .= '<label class="pbwp-checkbox">';
            $mashup_var_output .= $this->mashup_var_form_hidden_render( array( 'id' => $id, 'std' => '', 'type' => '', 'return' => 'return' ) );
            $mashup_var_output .= '<input type="checkbox" ' . $mashup_var_visibilty . $mashup_var_required . ' ' . $extra_atributes . ' ' . $mashup_var_classes . ' ' . ' name="' . $prefix . sanitize_html_class( $id ) . '" id="' . $prefix . sanitize_html_class( $id ) . '" value="' . sanitize_text_field( 'on' ) . '" ' . checked( 'on', $value, false ) . ' />';
            $mashup_var_output .= '<span class="pbwp-box"></span>';
            $mashup_var_output .= '</label>';
            $mashup_var_output .= '<input type="text" name="' . $prefix . sanitize_html_class( $field_id ) . '"  value="' . sanitize_text_field( $input_value ) . '">';
            $mashup_var_output .= $this->mashup_var_form_description( $description );

            if ( isset( $return ) && $return == true ) {
                return force_balance_tags( $mashup_var_output );
            } else {
                echo force_balance_tags( $mashup_var_output );
            }
        }

        /**
         * @ render File Upload field
         */
        public function mashup_var_media_url( $params = '' ) {
            global $post, $pagenow, $mashup_var_static_text;
            $strings = new mashup_theme_all_strings;
            $strings->mashup_theme_option_field_strings();
            extract( $params );

            $mashup_var_output = '';

            $mashup_var_value = isset( $post->ID ) ? get_post_meta( $post->ID, 'mashup_var_' . $id, true ) : '';
            if ( isset( $usermeta ) && $usermeta == true ) {
                if ( isset( $cus_field ) && $cus_field == true ) {
                    $mashup_var_value = get_the_author_meta( $id, $user->ID );
                } else {
                    if ( isset( $dp ) && $dp == true ) {
                        $mashup_var_value = get_the_author_meta( $id, $user->ID );
                    } else {
                        if ( isset( $id ) && $id != '' ) {
                            $mashup_var_value = get_the_author_meta( 'mashup_var_' . $id, $user->ID );
                        }
                    }
                }
            }
            if ( isset( $mashup_var_value ) && $mashup_var_value != '' ) {
                $value = $mashup_var_value;
            } else {
                $value = $std;
            }

            $mashup_var_rand_id = time();

            if ( isset( $force_std ) && $force_std == true ) {
                $value = $std;
            }

            $html_id = ' id="mashup_var_' . sanitize_html_class( $id ) . '"';
            $html_id_btn = ' id="mashup_var_' . sanitize_html_class( $id ) . '_btn"';
            $html_name = ' name="mashup_var_' . sanitize_html_class( $id ) . '"';

            if ( isset( $array ) && $array == true ) {
                $html_id = ' id="mashup_var_' . sanitize_html_class( $id ) . $mashup_var_rand_id . '"';
                $html_id_btn = ' id="mashup_var_' . sanitize_html_class( $id ) . $mashup_var_rand_id . '_btn"';
                $html_name = ' name="mashup_var_' . sanitize_html_class( $id ) . '_array[]"';
            }
            $mashup_var_output .= '<input type="text" class="cs-form-text cs-input" ' . $html_id . $html_name . ' value="' . sanitize_text_field( $value ) . '" />';
            $mashup_var_output .= '<label class="cs-browse">';
            $mashup_var_output .= '<input type="button" ' . $html_id_btn . $html_name . ' class="uploadfile left" value="' . mashup_var_theme_text_srt( 'mashup_var_browse' ) . '"/>';
            $mashup_var_output .= '</label>';

            if ( isset( $return ) && $return == true ) {
                return $mashup_var_output;
            } else {
                echo force_balance_tags( $mashup_var_output );
            }
        }

        /**
         * @ render File Upload field
         */
        public function mashup_var_form_fileupload_render( $params = '' ) {
            global $post, $pagenow, $image_val, $mashup_var_static_text;
            $strings = new mashup_theme_all_strings;
            $strings->mashup_theme_option_field_strings();
            extract( $params );

            $mashup_var_output = '';
            if ( $pagenow == 'post.php' ) {

                if ( isset( $dp ) && $dp == true ) {
                    $mashup_var_value = get_post_meta( $post->ID, $id, true );
                } else {
                    $mashup_var_value = get_post_meta( $post->ID, 'mashup_var_' . $id, true );
                }
            } elseif ( isset( $usermeta ) && $usermeta == true ) {
                if ( isset( $cus_field ) && $cus_field == true ) {
                    $mashup_var_value = get_the_author_meta( $id, $user->ID );
                } else {
                    if ( isset( $dp ) && $dp == true ) {
                        $mashup_var_value = get_the_author_meta( $id, $user->ID );
                    } else {
                        if ( isset( $id ) && $id != '' ) {
                            $mashup_var_value = get_the_author_meta( 'mashup_var_' . $id, $user->ID );
                        }
                    }
                }
            } else {
                $mashup_var_value = $std;
            }

            if ( isset( $mashup_var_value ) && $mashup_var_value != '' ) {
                $value = $mashup_var_value;
                if ( isset( $dp ) && $dp == true ) {
                    $value = mashup_var_get_img_url( $mashup_var_value, 'mashup_var_media_5' );
                } else {
                    $value = $mashup_var_value;
                }
            } else {
                $value = $std;
            }

            if ( isset( $force_std ) && $force_std == true ) {
                $value = $std;
            }

            $btn_name = ' name="mashup_var_' . sanitize_html_class( $id ) . '"';
            $html_id = ' id="mashup_var_' . sanitize_html_class( $id ) . '"';
            $html_name = ' name="mashup_var_' . sanitize_html_class( $id ) . '"';

            if ( isset( $array ) && $array == true ) {
                $btn_name = ' name="mashup_var_' . sanitize_html_class( $id ) . $mashup_var_random_id . '"';
                $html_id = ' id="mashup_var_' . sanitize_html_class( $id ) . $mashup_var_random_id . '"';
                $html_name = ' name="mashup_var_' . sanitize_html_class( $id ) . '_array[]"';
            } else if ( isset( $dp ) && $dp == true ) {
                $html_name = ' name="' . sanitize_html_class( $id ) . '"';
            }

            if ( isset( $cust_name ) && $cust_name == true ) {
                $html_name = ' name="' . $cust_name . '"';
            }

            if ( isset( $value ) && $value != '' ) {
                $display_btn = ' style=display:none';
            } else {
                $display_btn = ' style=display:block';
            }

            $mashup_var_output .= '<input' . $html_id . $html_name . 'type="hidden" class="" value="' . $value . '"/>';

            $mashup_var_output .= '<label' . $display_btn . ' class="browse-icon"><input' . $btn_name . 'type="button" class="cs-mashup-media left" value=' . mashup_var_theme_text_srt( 'mashup_var_browse' ) . ' /></label>';

            if ( isset( $return ) && $return == true ) {
                return force_balance_tags( $mashup_var_output );
            } else {
                echo force_balance_tags( $mashup_var_output );
            }
        }

        /**
         * @ render Random String
         */
        public function mashup_var_generate_random_string( $length = 3 ) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            for ( $i = 0; $i < $length; $i ++  ) {
                $randomString .= $characters[rand( 0, strlen( $characters ) - 1 )];
            }
            return $randomString;
        }

        /**
         * @ render submit field
         */
        public function mashup_var_form_submit_render( $params = '' ) {
            global $post, $pagenow;
            extract( $params );

            $mashup_rand_id = time();

            if ( ! isset( $id ) ) {
                $id = '';
            }

            $html_id = ' id="mashup_' . sanitize_html_class( $id ) . '"';
            $html_name = ' name="mashup_' . sanitize_html_class( $id ) . '"';

            if ( isset( $array ) && $array == true ) {
                $html_name = ' name="mashup_' . sanitize_html_class( $id ) . '_array[]"';
            }

            if ( isset( $cust_id ) && $cust_id != '' ) {
                $html_id = ' id="' . $cust_id . '"';
            }

            if ( isset( $cust_name ) ) {
                if ( $cust_name == '' ) {
                    $html_name = '';
                } else {
                    $html_name = ' name="' . $cust_name . '"';
                }
            }

            $mashup_classes = '';
            if ( isset( $classes ) && $classes != '' ) {
                $mashup_classes = ' class="' . $classes . '"';
            }
            $extra_atributes = '';
            if ( isset( $extra_atr ) && $extra_atr != '' ) {
                $extra_atributes = $extra_atr;
            }
            if ( $html_id == ' id=""' || $html_id == ' id="mashup_"' ) {
                $html_id = '';
            }
            $mashup_output = '<input type="submit" ' . $html_id . ' ' . $extra_atributes . ' ' . $mashup_classes . ' ' . $html_name . ' value="' . sanitize_text_field( $std ) . '" />';

            if ( isset( $return ) && $return == true ) {
                return force_balance_tags( $mashup_output );
            } else {
                echo force_balance_tags( $mashup_output );
            }
        }

        public function mashup_location_map_render( $params = '' ) {
            global $post;
            extract( $params );

            $mashup_location_latitude = get_post_meta( $post->ID, 'mashup_var_location_latitude', true );
            $mashup_location_longitude = get_post_meta( $post->ID, 'mashup_var_location_longitude', true );
            $mashup_location_zoom = get_post_meta( $post->ID, 'mashup_var_location_zoom', true );

            $mashup_output = '<div class="gllpLatlonPicker" style="width:100%;">';
            $mashup_output .= '<div id="map_search_btn" class="form-elements">';
            $mashup_output .= '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">';
            $mashup_output .= '<label></label>';
            $mashup_output .= '</div>';
            $mashup_output .= '<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">';
            $mashup_output .= '<input type="button" class="gllpSearchButton" value="' . $name . '" onClick="gll_search_map()">';
            $mashup_output .= '</div>';
            $mashup_output .= '</div>';
            $mashup_output .= '<div class="form-elements">';
            $mashup_output .= '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
            $mashup_output .= '<div class="clear"></div>';
            $mashup_output .= '<div class="gllpMap" id="cs-map-location-id"></div>';
            $mashup_output .= '<input type="hidden" name="add_new_loc" class="gllpSearchField" style="margin-bottom:10px;" >';
            $mashup_output .= '<input type="hidden" name="mashup_var_location_latitude" value="' . esc_attr( $mashup_location_latitude ) . '" class="gllpLatitude" />';
            $mashup_output .= '<input type="hidden" name="mashup_var_location_longitude" value="' . esc_attr( $mashup_location_longitude ) . '" class="gllpLongitude" />';
            $mashup_output .= '<input type="hidden" name="mashup_var_location_zoom" value="' . esc_attr( $mashup_location_zoom ) . '" class="gllpZoom" />';
            $mashup_output .= '<input type="button" class="gllpUpdateButton" value="update map" style="display:none">';
            $mashup_output .= '</div>';
            $mashup_output .= '</div>';
            $mashup_output .= '</div>';

            echo force_balance_tags( $mashup_output );
        }

    }

    $var_arrays = array( 'mashup_var_form_fields' );
    $form_fields_global_vars = MASHUP_VAR_GLOBALS()->globalizing( $var_arrays );
    extract( $form_fields_global_vars );
    $mashup_var_form_fields = new mashup_var_form_fields();
}

/**
 * 
 * @ render Wrapper Start
 */
function mashup_wrapper_start_render( $params = '' ) {
    global $post, $jobcareer_html_fields;
    extract( $params );
    $mashup_display = '';
    if ( isset( $status ) && $status == 'hide' ) {
        $mashup_display = 'style="display:none;"';
    }

    $mashup_output = '<div class="wrapper_' . sanitize_html_class( $id ) . '" id="wrapper_' . sanitize_html_class( $id ) . '" ' . $mashup_display . '>';
    echo mashup_allow_special_char( $mashup_output );
}

/**
 * 
 * @ render Wrapper Start
 */
function mashup_wrapper_end_render( $params = '' ) {
    global $post, $jobcareer_html_fields;
    extract( $params );

    $mashup_output = '</div>';
    echo mashup_allow_special_char( $mashup_output );
}
