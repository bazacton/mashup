<?php
/**
 * Html Fields
 */
if ( ! class_exists( 'mashup_var_html_fields' ) ) {

    class mashup_var_html_fields extends mashup_var_form_fields {

        public function __construct() {
            // Do something...
        }

        /**
         * opening field markup
         * 
         */
        public function mashup_var_opening_field( $params = '' ) {
            extract( $params );
            $mashup_var_output = '';
            $mashup_var_styles = '';
            if ( isset( $styles ) && $styles != '' ) {
                $mashup_var_styles = ' style="' . $styles . '"';
            }
            $cust_id = isset( $id ) ? ' id="' . $id . '"' : '';
            $extra_attr = isset( $extra_att ) ? ' ' . $extra_att . ' ' : '';
            $name = isset( $name ) ? $name : '';
            $mashup_var_output .= '<div' . $cust_id . $extra_attr . ' class="form-elements"' . $mashup_var_styles . '>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<label>' . esc_attr( $name ) . '</label>';
            if ( isset( $hint_text ) && $hint_text != '' ) {
                $mashup_var_output .= mashup_var_tooltip_helptext( esc_html( $hint_text ) );
            }
            $mashup_var_output .= '
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">';

            return $mashup_var_output;
        }

        /**
         * full opening field markup
         * 
         */
        public function mashup_var_full_opening_field( $params = '' ) {
            extract( $params );
            $mashup_var_output = '';
            $mashup_var_output .= '<div class="form-elements"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';

            return $mashup_var_output;
        }

        /**
         * closing field markup
         * 
         */
        public function mashup_var_closing_field( $params = '' ) {
            extract( $params );
            $mashup_var_output = '';
            if ( isset( $desc ) && $desc != '' ) {
                $mashup_var_output .= '<p>' . esc_html( $desc ) . '</p>';
            }
            $mashup_var_output .= '</div>';
            if ( isset( $split ) && $split == true ) {
                $mashup_var_output .= '<div class="splitter"></div>';
            }
            $mashup_var_output .= '</div>';

            return $mashup_var_output;
        }

        /**
         * division markup
         * 
         */
        public function mashup_var_division( $params = '' ) {
            global $post;
            extract( $params );

            $mashup_var_id = 'mashup_var_' . $id;

            $d_enable = ' style="display:none;"';
            if ( isset( $enable_val ) ) {

                $d_val = '';
                $d_val = get_post_meta( $post->ID, $enable_id, true );

                $enable_multi = explode( ',', $enable_val );
                if ( is_array( $enable_multi ) && sizeof( $enable_multi ) > 1 ) {
                    $d_enable = in_array( $d_val, $enable_multi ) ? ' style="display:block;"' : ' style="display:none;"';
                } else {
                    $d_enable = $d_val == $enable_val ? ' style="display:block;"' : ' style="display:none;"';
                }
            }

            $mashup_var_output = '';
            $mashup_var_output .= '<div id="' . $mashup_var_id . '"' . $d_enable . '>';

            if ( isset( $return ) && $return == true ) {
                return $mashup_var_output;
            } else {
                echo mashup_allow_special_char( $mashup_var_output );
            }
        }

        /**
         * division markup close
         * 
         */
        public function mashup_var_division_close( $params = '' ) {

            extract( $params );
            $mashup_var_output = '</div>';

            if ( isset( $return ) && $return == true ) {
                return $mashup_var_output;
            } else {
                echo mashup_allow_special_char( $mashup_var_output );
            }
        }

        /**
         * layout style
         * 
         */
        public function mashup_form_layout_render( $params = '' ) {
            global $post, $mashup_var_form_fields, $mashup_var_html_fields, $pagenow;
            extract( $params );

            $mashup_value = get_post_meta( $post->ID, 'mashup_var_' . $id, true );
            if ( isset( $mashup_value ) && $mashup_value != '' ) {
                $value = $mashup_value;
            } else {
                $value = $std;
            }

            $mashup_left = $mashup_small_left_large_right = $mashup_large_left_small_right = $mashup_small_right = $mashup_small_left = $mashup_both_left = $mashup_both_right = $mashup_right = $mashup_none = $mashup_left_checklist = $mashup_small_left_large_right_checklist = $mashup_large_left_small_right_checklist = $mashup_small_right_checklist = $mashup_small_left_checklist = $mashup_both_left_checklist = $mashup_both_right_checklist = $mashup_right_checklist = $mashup_none_checklist = '';
            if ( isset( $mashup_value ) ) {
                if ( isset( $value ) && $value == 'left' ) {
                    $mashup_left = 'checked';
                    $mashup_left_checklist = "class=check-list";
                } else if ( isset( $value ) && $value == 'right' ) {
                    $mashup_right = 'checked';
                    $mashup_right_checklist = "class=check-list";
                } else if ( isset( $value ) && $value == 'small_right' ) {
                    $mashup_small_right = 'checked';
                    $mashup_small_right_checklist = "class=check-list";
                } else if ( isset( $value ) && $value == 'small_left' ) {
                    $mashup_small_left = 'checked';
                    $mashup_small_left_checklist = "class=check-list";
                } else if ( isset( $value ) && $value == 'small_left_large_right' ) {
                    $mashup_small_left_large_right = 'checked';
                    $mashup_small_left_large_right_checklist = "class=check-list";
                } else if ( isset( $value ) && $value == 'large_left_small_right' ) {
                    $mashup_large_left_small_right = 'checked';
                    $mashup_large_left_small_right_checklist = "class=check-list";
                } else if ( isset( $value ) && $value == 'both_left' ) {
                    $mashup_both_left = 'checked';
                    $mashup_both_left_checklist = "class=check-list";
                } else if ( isset( $value ) && $value == 'both_right' ) {
                    $mashup_both_right = 'checked';
                    $mashup_both_right_checklist = "class=check-list";
                } else if ( isset( $value ) && $value == 'none' ) {
                    $mashup_none = 'checked';
                    $mashup_none_checklist = "class=check-list";
                }
            }

            $help_text_str = '';
            if ( isset( $help_text ) && $help_text != '' ) {
                $help_text_str = $help_text;
            }

            $mashup_styles = '';
            if ( isset( $styles ) && $styles != '' ) {
                $mashup_styles = ' style="' . $styles . '"';
            }
            $cust_id = isset( $id ) ? ' id="' . $id . '"' : '';
            $extra_attr = isset( $extra_att ) ? ' ' . $extra_att . ' ' : '';

            $mashup_output = '
			<div  ' . $cust_id . $extra_attr . ' class="form-elements"' . $mashup_styles . '>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<label>' . esc_attr( $name ) . '</label>
				</div>
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">';
            $mashup_output .= '<div class="input-sec">';
            $mashup_output .= '<div class="meta-input pattern">';

            $mashup_output .= '<div class=\'radio-image-wrapper\'>';
            $mashup_opt_array = array(
                'extra_atr' => '' . $mashup_none . ' onclick="show_sidebar_page(\'none\')"',
                'cust_name' => 'mashup_var_' . sanitize_html_class( $id ),
                'cust_id' => 'page_radio_1',
                'classes' => 'radio',
                'std' => 'none',
                'return' => true,
            );
            $mashup_output .= $mashup_var_form_fields->mashup_var_form_radio_render( $mashup_opt_array );
            $mashup_output .= '<label for="page_radio_1">';
            $mashup_output .= '<span class="ss">';
            $mashup_output .= '<img src="' . get_template_directory_uri() . '/assets/backend/images/no_sidebar.png"  alt="" />';
            $mashup_output .= '</span>';
            $mashup_output .= '<span ' . $mashup_none_checklist . ' id="check-list"></span>';
            $mashup_output .= '</label>';
            $mashup_output .= '<span class="title-theme">' . mashup_var_theme_text_srt( 'mashup_var_full_width' ) . '</span></div>';

            $mashup_output .= '<div class=\'radio-image-wrapper\'>';
            $mashup_opt_array = array(
                'extra_atr' => '' . $mashup_right . ' onclick="show_sidebar_page(\'right\')"',
                'cust_name' => 'mashup_var_' . sanitize_html_class( $id ),
                'cust_id' => 'page_radio_2',
                'classes' => 'radio',
                'std' => 'right',
                'return' => true,
            );
            $mashup_output .= $mashup_var_form_fields->mashup_var_form_radio_render( $mashup_opt_array );
            $mashup_output .= '<label for="page_radio_2">';
            $mashup_output .= '<span class="ss">';
            $mashup_output .= '<img src="' . get_template_directory_uri() . '/assets/backend/images/sidebar_right.png" alt="" />';
            $mashup_output .= '</span>';
            $mashup_output .= '<span ' . $mashup_right_checklist . ' id="check-list"></span>';
            $mashup_output .= '</label>';
            $mashup_output .= '<span class="title-theme">' . mashup_var_theme_text_srt( 'mashup_var_sidebar_right' ) . '</span> </div>';

            $mashup_output .= '<div class=\'radio-image-wrapper\'>';
            $mashup_opt_array = array(
                'cust_id' => 'page_radio_3',
                'classes' => 'radio',
                'std' => 'left',
                'extra_atr' => '' . $mashup_left . ' onclick="show_sidebar_page(\'left\')"',
                'cust_name' => 'mashup_var_' . sanitize_html_class( $id ),
                'return' => true,
            );
            $mashup_output .= $mashup_var_form_fields->mashup_var_form_radio_render( $mashup_opt_array );
            $mashup_output .= '<label for="page_radio_3">';
            $mashup_output .= '<span class="ss">';
            $mashup_output .= '<img src="' . get_template_directory_uri() . '/assets/backend/images/sidebar_left.png" alt="" />';
            $mashup_output .= '</span>';
            $mashup_output .= '<span ' . $mashup_left_checklist . ' id="check-list"></span>';
            $mashup_output .= '</label>';
            $mashup_output .= '<span class="title-theme">' . mashup_var_theme_text_srt( 'mashup_var_sidebar_left' ) . '</span> </div>';

            //
            $cs_extra_layouts = false;
            if ( $pagenow == 'post.php' && get_post_type() == 'pagedd' ) {
                $cs_extra_layouts = true;
            }

            if ( $cs_extra_layouts == true ) {

                $mashup_output .= '<div class=\'radio-image-wrapper\'>';
                $mashup_opt_array = array(
                    'cust_id' => 'page_radio_small_right',
                    'classes' => 'radio',
                    'std' => 'small_right',
                    'extra_atr' => '' . $mashup_small_right . ' onclick="show_sidebar_page(\'small_right\')"',
                    'cust_name' => 'mashup_var_' . sanitize_html_class( $id ),
                    'return' => true,
                );
                $mashup_output .= $mashup_var_form_fields->mashup_var_form_radio_render( $mashup_opt_array );
                $mashup_output .= '<label for="page_radio_small_right">';
                $mashup_output .= '<span class="ss">';
                $mashup_output .= '<img src="' . get_template_directory_uri() . '/assets/backend/images/sidebar_right.png" alt="" />';
                $mashup_output .= '</span>';
                $mashup_output .= '<span ' . $mashup_small_right_checklist . ' id="check-list"></span>';
                $mashup_output .= '</label>';
                $mashup_output .= '<span class="title-theme">' . mashup_var_theme_text_srt( 'mashup_var_sidebar_small_right' ) . '</span> </div>';

                //

                $mashup_output .= '<div class=\'radio-image-wrapper\'>';
                $mashup_opt_array = array(
                    'cust_id' => 'page_radio_small_left',
                    'classes' => 'radio',
                    'std' => 'small_left',
                    'extra_atr' => '' . $mashup_small_right . ' onclick="show_sidebar_page(\'small_left\')"',
                    'cust_name' => 'mashup_var_' . sanitize_html_class( $id ),
                    'return' => true,
                );
                $mashup_output .= $mashup_var_form_fields->mashup_var_form_radio_render( $mashup_opt_array );
                $mashup_output .= '<label for="page_radio_small_left">';
                $mashup_output .= '<span class="ss">';
                $mashup_output .= '<img src="' . get_template_directory_uri() . '/assets/backend/images/sidebar_left.png" alt="" />';
                $mashup_output .= '</span>';
                $mashup_output .= '<span ' . $mashup_small_left_checklist . ' id="check-list"></span>';
                $mashup_output .= '</label>';
                $mashup_output .= '<span class="title-theme">' . mashup_var_theme_text_srt( 'mashup_var_sidebar_small_left' ) . '</span> </div>';

                //

                $mashup_output .= '<div class=\'radio-image-wrapper\'>';
                $mashup_opt_array = array(
                    'cust_id' => 'page_radio_4',
                    'classes' => 'radio',
                    'std' => 'small_left_large_right',
                    'extra_atr' => '' . $mashup_small_left_large_right . ' onclick="show_sidebar_page(\'small_left_large_right\')"',
                    'cust_name' => 'mashup_var_' . sanitize_html_class( $id ),
                    'return' => true,
                );
                $mashup_output .= $mashup_var_form_fields->mashup_var_form_radio_render( $mashup_opt_array );
                $mashup_output .= '<label for="page_radio_4">';
                $mashup_output .= '<span class="ss">';
                $mashup_output .= '<img src="' . get_template_directory_uri() . '/assets/backend/images/small_left_large_right_sidebars.png" alt="" />';
                $mashup_output .= '</span>';
                $mashup_output .= '<span ' . $mashup_small_left_large_right_checklist . ' id="check-list"></span>';
                $mashup_output .= '</label>';
                $mashup_output .= '<span class="title-theme">' . mashup_var_theme_text_srt( 'mashup_var_sidebar_small_left_large_right' ) . '</span> </div>';

                //

                $mashup_output .= '<div class=\'radio-image-wrapper\'>';
                $mashup_opt_array = array(
                    'cust_id' => 'page_radio_5',
                    'classes' => 'radio',
                    'std' => 'large_left_small_right',
                    'extra_atr' => '' . $mashup_large_left_small_right . ' onclick="show_sidebar_page(\'large_left_small_right\')"',
                    'cust_name' => 'mashup_var_' . sanitize_html_class( $id ),
                    'return' => true,
                );
                $mashup_output .= $mashup_var_form_fields->mashup_var_form_radio_render( $mashup_opt_array );
                $mashup_output .= '<label for="page_radio_5">';
                $mashup_output .= '<span class="ss">';
                $mashup_output .= '<img src="' . get_template_directory_uri() . '/assets/backend/images/large_left_small_right_sidebars.png" alt="" />';
                $mashup_output .= '</span>';
                $mashup_output .= '<span ' . $mashup_large_left_small_right_checklist . ' id="check-list"></span>';
                $mashup_output .= '</label>';
                $mashup_output .= '<span class="title-theme">' . mashup_var_theme_text_srt( 'mashup_var_sidebar_large_left_small_right' ) . '</span> </div>';

                //

                $mashup_output .= '<div class=\'radio-image-wrapper\'>';
                $mashup_opt_array = array(
                    'cust_id' => 'page_radio_6',
                    'classes' => 'radio',
                    'std' => 'both_left',
                    'extra_atr' => '' . $mashup_both_left . ' onclick="show_sidebar_page(\'both_left\')"',
                    'cust_name' => 'mashup_var_' . sanitize_html_class( $id ),
                    'return' => true,
                );
                $mashup_output .= $mashup_var_form_fields->mashup_var_form_radio_render( $mashup_opt_array );
                $mashup_output .= '<label for="page_radio_6">';
                $mashup_output .= '<span class="ss">';
                $mashup_output .= '<img src="' . get_template_directory_uri() . '/assets/backend/images/both_left_sidebars.png" alt="" />';
                $mashup_output .= '</span>';
                $mashup_output .= '<span ' . $mashup_both_left_checklist . ' id="check-list"></span>';
                $mashup_output .= '</label>';
                $mashup_output .= '<span class="title-theme">' . mashup_var_theme_text_srt( 'mashup_var_sidebar_both_left' ) . '</span> </div>';

                //

                $mashup_output .= '<div class=\'radio-image-wrapper\'>';
                $mashup_opt_array = array(
                    'cust_id' => 'page_radio_7',
                    'classes' => 'radio',
                    'std' => 'both_right',
                    'extra_atr' => '' . $mashup_both_right . ' onclick="show_sidebar_page(\'both_right\')"',
                    'cust_name' => 'mashup_var_' . sanitize_html_class( $id ),
                    'return' => true,
                );
                $mashup_output .= $mashup_var_form_fields->mashup_var_form_radio_render( $mashup_opt_array );
                $mashup_output .= '<label for="page_radio_7">';
                $mashup_output .= '<span class="ss">';
                $mashup_output .= '<img src="' . get_template_directory_uri() . '/assets/backend/images/both_right_sidebars.png" alt="" />';
                $mashup_output .= '</span>';
                $mashup_output .= '<span ' . $mashup_both_right_checklist . ' id="check-list"></span>';
                $mashup_output .= '</label>';
                $mashup_output .= '<span class="title-theme">' . mashup_var_theme_text_srt( 'mashup_var_sidebar_both_right' ) . '</span> </div>';
            }

            //

            $mashup_output .= '</div>';
            $mashup_output .= '</div>';
            $mashup_output .= '</div>';

            if ( isset( $split ) && $split == true ) {
                $mashup_output .= '<div class="splitter"></div>';
            }
            $mashup_output .= '
				</div>';

            echo force_balance_tags( $mashup_output );
        }

        /**
         * heading markup
         * 
         */
        public function mashup_var_heading_render( $params = '' ) {
            global $post;
            extract( $params );
            $mashup_var_output = '
			<div class="theme-help" id="' . sanitize_html_class( $id ) . '">
				<h4 style="padding-bottom:0px;">' . esc_attr( $name ) . '</h4>
				<div class="clear"></div>
			</div>';
            echo force_balance_tags( $mashup_var_output );
        }

        /**
         * heading markup
         * 
         */
        public function mashup_var_set_heading( $params = '' ) {
            extract( $params );
            $mashup_var_output = '';
            $mashup_var_output .= '<li><a title="' . esc_html( $name ) . '" href="#"><i class="' . sanitize_html_class( $fontawesome ) . '"></i>
				<span class="cs-title-menu">' . esc_html( $name ) . '</span></a>';
            if ( is_array( $options ) && sizeof( $options ) > 0 ) {
                $active = '';
                $mashup_var_output .= '<ul class="sub-menu">';
                foreach ( $options as $key => $value ) {
                    $active = ( $key == "tab-general-page-settings" ) ? 'active' : '';
                    $mashup_var_output .= '<li class="' . sanitize_html_class( $key ) . ' ' . $active . '"><a href="#' . $key . '" onClick="toggleDiv(this.hash);return false;">' . esc_html( $value ) . '</a></li>';
                }
                $mashup_var_output .= '</ul>';
            }
            $mashup_var_output .= '
			</li>';

            return $mashup_var_output;
        }

        /**
         * main heading markup
         * 
         */
        public function mashup_var_set_main_heading( $params = '' ) {
            extract( $params );
            $mashup_var_output = '';
            $mashup_var_output .= '<li><a title="' . $name . '" href="#' . $id . '" onClick="toggleDiv(this.hash);return false;"><i class="' . sanitize_html_class( $fontawesome ) . '"></i>
			<span class="cs-title-menu">' . esc_html( $name ) . '</span>
			</a>
			</li>';

            return $mashup_var_output;
        }

        /**
         * sub heading markup
         * 
         */
        public function mashup_var_set_sub_heading( $params = '' ) {
            extract( $params );
            $mashup_var_output = '';
            $style = '';
            if ( $counter > 1 ) {
                $mashup_var_output .= '</div>';
            }
            if ( $id != 'tab-general-page-settings' ) {
                $style = 'style="display:none;"';
            }
            $mashup_var_output .= '<div  id="' . $id . '" ' . $style . '>';
            $mashup_var_output .= '<div class="theme-header"><h1>' . esc_html( $name ) . '</h1>
			</div>';

            $mashup_var_output .= '<div class="col2-right">';

            return $mashup_var_output;
        }

        /**
         * announcement markup
         * 
         */
        public function mashup_var_set_announcement( $params = '' ) {
            extract( $params );
            $mashup_var_output = '';
            $mashup_var_output .= '<div id="' . $id . '" class="alert alert-info fade in nomargin theme_box"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&#215;</button>
			<h4>' . esc_html( $name ) . '</h4>
			<p>' . esc_html( $std ) . '</p></div>';

            return $mashup_var_output;
        }

        /**
         * settings col right markup
         * 
         */
        public function mashup_var_set_col_right( $params = '' ) {
            extract( $params );
            $mashup_var_output = '';
            $mashup_var_output .= '
			</div><!-- end col2-right-->';
            if ( (isset( $col_heading ) && $col_heading != '') || (isset( $help_text ) && $help_text <> '') ) {
                $mashup_var_output .= '<div class="col3"><h3>' . esc_html( $col_heading ) . '</h3><p>' . esc_html( $help_text ) . '</p></div>';
            }

            if ( isset( $echo ) && $echo == true ) {
                echo force_balance_tags( $mashup_var_output );
            } else {
                return $mashup_var_output;
            }
        }

        /**
         * settings section markup
         * 
         */
        public function mashup_var_set_section( $params = '' ) {
            extract( $params );
            $mashup_var_output = '';
            if ( isset( $accordion ) && $accordion == true ) {
                if ( isset( $active ) && $active == true ) {
                    $active = '';
                } else {
                    $active = ' class="collapsed"';
                }
                $mashup_var_output .= '<div class="panel-heading"><a' . $active . ' href="#accordion-' . esc_attr( $id ) . '" data-parent="#accordion-' . esc_attr( $parrent_id ) . '" data-toggle="collapse"><h4>' . esc_html( $std ) . '</h4>';
            } else {
                $mashup_var_output .= '<div class="theme-help"><h4>' . esc_html( $std ) . '</h4><div class="clear"></div></div>';
            }
            if ( isset( $accordion ) && $accordion == true ) {
                $mashup_var_output .= '</a></div>';
            }

            if ( isset( $echo ) && $echo == true ) {
                echo force_balance_tags( $mashup_var_output );
            } else {
                return $mashup_var_output;
            }
        }

        /**
         * text field markup
         * 
         */
        public function mashup_var_text_field( $params = '' ) {
            extract( $params );
            $mashup_var_output = '';

            $mashup_var_styles = '';
            if ( isset( $styles ) && $styles != '' ) {
                $mashup_var_styles = ' style="' . $styles . '"';
            }
            $cust_id = isset( $id ) ? ' id="' . $id . '"' : '';
            $extra_attr = isset( $extra_att ) ? ' ' . $extra_att . ' ' : '';
            $name = isset( $name ) ? $name : '';
            $field_params = isset( $field_params ) ? $field_params : '';
            $desc = isset( $desc ) ? $desc : '';
            $mashup_var_output .= '<div' . $cust_id . $extra_attr . ' class="form-elements"' . $mashup_var_styles . '><div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<label>' . esc_attr( $name ) . '</label>';
            if ( isset( $hint_text ) && $hint_text != '' ) {
                $mashup_var_output .= mashup_var_tooltip_helptext( esc_html( $hint_text ) );
            }
            $mashup_var_output .= '</div><div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">';
            $mashup_var_output .= parent::mashup_var_form_text_render( $field_params );
            $mashup_var_output .= '<p>' . esc_html( $desc ) . '</p></div>';
            if ( isset( $split ) && $split == true ) {
                $mashup_var_output .= '<div class="splitter"></div>';
            }
            $mashup_var_output .= '</div>';

            if ( isset( $echo ) && $echo == true ) {
                echo force_balance_tags( $mashup_var_output );
            } else {
                return $mashup_var_output;
            }
        }

        /**
         * date field markup
         * 
         */
        public function mashup_var_date_field( $params = '' ) {
            extract( $params );
            $mashup_var_output = '';

            $mashup_var_styles = '';
            if ( isset( $styles ) && $styles != '' ) {
                $mashup_var_styles = ' style="' . $styles . '"';
            }

            $cust_id = isset( $id ) ? ' id="' . $id . '"' : '';
            $extra_attr = isset( $extra_att ) ? ' ' . $extra_att . ' ' : '';
            $mashup_var_output .= '
			<div' . $cust_id . $extra_attr . ' class="form-elements"' . $mashup_var_styles . '>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<label>' . esc_attr( $name ) . '</label>';
            if ( isset( $hint_text ) && $hint_text != '' ) {
                $mashup_var_output .= mashup_var_tooltip_helptext( esc_html( $hint_text ) );
            }
            $mashup_var_output .= '</div><div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">';
            $mashup_var_output .= parent::mashup_var_form_date_render( $field_params );
            $mashup_var_output .= '<p>' . esc_html( $desc ) . '</p></div>';
            if ( isset( $split ) && $split == true ) {
                $mashup_var_output .= '<div class="splitter"></div>';
            }
            $mashup_var_output .= '</div>';

            if ( isset( $echo ) && $echo == true ) {
                echo force_balance_tags( $mashup_var_output );
            } else {
                return $mashup_var_output;
            }
        }

        /**
         * textarea field markup
         * 
         */
        public function mashup_var_textarea_field( $params = '' ) {
            extract( $params );
            $mashup_var_output = '';
            $mashup_var_styles = '';
            if ( isset( $styles ) && $styles != '' ) {
                $mashup_var_styles = ' style="' . $styles . '"';
            }

            $cust_id = isset( $id ) ? ' id="' . $id . '"' : '';
            $extra_attr = isset( $extra_att ) ? ' ' . $extra_att . ' ' : '';
            $mashup_var_output .= '<div' . $cust_id . $extra_attr . ' class="form-elements"' . $mashup_var_styles . '><div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><label>' . esc_attr( $name ) . '</label>';
            if ( isset( $hint_text ) && $hint_text != '' ) {
                $mashup_var_output .= mashup_var_tooltip_helptext( esc_html( $hint_text ) );
            }
            $mashup_var_output .= '</div><div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">';
            if ( isset( $field_params['mashup_editor'] ) ) {
                if ( $field_params['mashup_editor'] == true ) {
                    $editor_class = 'mashup_editor' . mt_rand();
                    $field_params['classes'] .= ' ' . $editor_class;
                }
            }
            $mashup_var_output .= parent::mashup_var_form_textarea_render( $field_params );
            $mashup_var_output .= '<p>' . esc_html( $desc ) . '</p>
				</div>';
            if ( isset( $split ) && $split == true ) {
                $mashup_var_output .= '<div class="splitter"></div>';
            }
            $mashup_var_output .= '</div>';
//            if ( isset( $field_params['mashup_editor'] ) ) {
//                if ( $field_params['mashup_editor'] == true ) {
//                    $mashup_inline_script = 'jQuery(".' . $editor_class . '").jqte();';
//                    $mashup_var_output .='<script>' . $mashup_inline_script . '</script>';
//                }
//            }
            if ( isset( $echo ) && $echo == true ) {
                echo force_balance_tags( $mashup_var_output );
            } else {
                return $mashup_var_output;
            }
        }

        /**
         * radio field markup
         * 
         */
        public function mashup_var_radio_field( $params = '' ) {
            extract( $params );
            $mashup_var_output = '';
            $mashup_var_output .= '
			<div class="input-sec">';
            $mashup_var_output .= parent::mashup_var_form_radio_render( $field_params );
            $mashup_var_output .= esc_html( $description );
            $mashup_var_output .= '
			</div>';

            if ( isset( $echo ) && $echo == true ) {
                echo force_balance_tags( $mashup_var_output );
            } else {
                return $mashup_var_output;
            }
        }

        /**
         * select field markup
         * 
         */
        public function mashup_var_select_field( $params = '' ) {
            extract( $params );
            $mashup_var_output = '';
            $mashup_var_styles = '';
            $desc = isset( $desc ) ? $desc : '';
            if ( isset( $styles ) && $styles != '' ) {
                $mashup_var_styles = ' style="' . $styles . '"';
            }

            $cust_id = isset( $id ) ? ' id="' . $id . '"' : '';
            $extra_attr = isset( $extra_att ) ? ' ' . $extra_att . ' ' : '';
            $mashup_var_output .= '<div' . $cust_id . $extra_attr . ' class="form-elements"' . $mashup_var_styles . '><div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><label>' . esc_attr( $name ) . '</label>';
            if ( isset( $hint_text ) && $hint_text != '' ) {
                $mashup_var_output .= mashup_var_tooltip_helptext( esc_html( $hint_text ) );
            }
            $mashup_var_output .= '</div><div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">';

            if ( isset( $array ) && $array == true ) {
                $mashup_var_random_id = rand( 123456, 987654 );
                $html_id = ' id="mashup_var_' . sanitize_html_class( $id ) . $mashup_var_random_id . '"';
            }
            if ( isset( $multi ) && $multi == true ) {
                $mashup_var_output .= parent::mashup_var_form_multiselect_render( $field_params );
            } else {
                $mashup_var_output .= parent::mashup_var_form_select_render( $field_params );
            }
            $mashup_var_output .= '<p>' . esc_html( $desc ) . '</p>
				</div>';
            if ( isset( $split ) && $split == true ) {
                $mashup_var_output .= '<div class="splitter"></div>';
            }
            $mashup_var_output .= '
			</div>';

            if ( isset( $echo ) && $echo == true ) {
                echo force_balance_tags( $mashup_var_output );
            } else {
                return $mashup_var_output;
            }
        }

        /**
         * checkbox field markup
         * 
         */
        public function mashup_var_checkbox_field( $params = '' ) {
            extract( $params );
            $mashup_var_output = '';
            $mashup_var_styles = '';
            if ( isset( $styles ) && $styles != '' ) {
                $mashup_var_styles = ' style="' . $styles . '"';
            }

            $cust_id = isset( $id ) ? ' id="' . $id . '"' : '';
            $extra_attr = isset( $extra_att ) ? ' ' . $extra_att . ' ' : '';
            $mashup_var_output .= '
			<div' . $cust_id . $extra_attr . ' class="form-elements"' . $mashup_var_styles . '>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<label>' . esc_attr( $name ) . '</label>';
            if ( isset( $hint_text ) && $hint_text != '' ) {
                $mashup_var_output .= mashup_var_tooltip_helptext( esc_html( $hint_text ) );
            }
            $mashup_var_output .= '
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">';
            $mashup_var_output .= parent::mashup_var_form_checkbox_render( $field_params );
            $mashup_var_output .= '<p>' . esc_html( $desc ) . '</p>
				</div>';
            if ( isset( $split ) && $split == true ) {
                $mashup_var_output .= '<div class="splitter"></div>';
            }
            $mashup_var_output .= '
			</div>';

            if ( isset( $echo ) && $echo == true ) {
                echo force_balance_tags( $mashup_var_output );
            } else {
                return $mashup_var_output;
            }
        }

        /**
         * upload media field markup
         * 
         */
        public function mashup_var_media_url_field( $params = '' ) {
            extract( $params );
            $mashup_var_output = '';
            $mashup_var_output .= '<div class="form-elements"><div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><label>' . esc_attr( $name ) . '</label>';
            if ( isset( $hint_text ) && $hint_text != '' ) {
                $mashup_var_output .= mashup_var_tooltip_helptext( esc_html( $hint_text ) );
            }
            $mashup_var_output .= '</div><div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">';
            $mashup_var_output .= parent::mashup_var_media_url( $field_params );
            $mashup_var_output .= '<p>' . esc_html( $desc ) . '</p>
				</div>';
            if ( isset( $split ) && $split == true ) {
                $mashup_var_output .= '<div class="splitter"></div>';
            }
            $mashup_var_output .= '</div>';

            if ( isset( $echo ) && $echo == true ) {
                echo force_balance_tags( $mashup_var_output );
            } else {
                return $mashup_var_output;
            }
        }

        /**
         * upload file field markup
         * 
         */
        public function mashup_var_upload_file_field( $params = '' ) {
            global $post, $pagenow, $image_val;

            extract( $params );
            $std = isset( $std ) ? $std : '';
            if ( $pagenow == 'post.php' ) {

                if ( isset( $dp ) && $dp == true ) {
                    $mashup_var_value = get_post_meta( $post->ID, $id, true );
                } else {
                    $mashup_var_value = get_post_meta( $post->ID, 'mashup_var_' . $id, true );
                }
            } elseif ( isset( $user ) && ! empty( $user ) ) {

                if ( isset( $dp ) && $dp == true ) {

                    $mashup_var_value = get_the_author_meta( $id, $user->ID );
                } else {
                    $mashup_var_value = get_the_author_meta( 'mashup_var_' . $id, $user->ID );
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
            if ( isset( $value ) && $value != '' ) {
                $display = 'style=display:block';
            } else {
                $display = 'style=display:none';
            }

            $mashup_var_random_id = '';
            $html_id = ' id="mashup_var_' . sanitize_html_class( $id ) . '"';
            if ( isset( $array ) && $array == true ) {
                $mashup_var_random_id = rand( 123456, 987654 );

                $html_id = ' id="mashup_var_' . sanitize_html_class( $id ) . $mashup_var_random_id . '"';
            }

            $field_params['mashup_var_random_id'] = $mashup_var_random_id;

            $mashup_var_output = '';
            $mashup_var_styles = '';
            if ( isset( $styles ) && $styles != '' ) {
                $mashup_var_styles = ' style="' . $styles . '"';
            }
            $extra_attr = isset( $extra_att ) ? ' ' . $extra_att . ' ' : '';
            $mashup_var_output .= '<div' . $extra_attr . ' class="form-elements"' . $mashup_var_styles . '><div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
	    <label>' . esc_attr( $name ) . '</label>';
            if ( isset( $hint_text ) && $hint_text != '' ) {
                $mashup_var_output .= mashup_var_tooltip_helptext( esc_html( $hint_text ) );
            }
            $mashup_var_output .= '</div><div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">';
            $mashup_var_output .= parent::mashup_var_form_fileupload_render( $field_params );
            $mashup_var_output .= '<div class="page-wrap" ' . $display . ' id="mashup_var_' . sanitize_html_class( $id ) . $mashup_var_random_id . '_box">';
            $mashup_var_output .= '<div class="gal-active">';
            $mashup_var_output .= '<div class="dragareamain" style="padding-bottom:0px;">';
            $mashup_var_output .= '<ul id="gal-sortable">';
            $mashup_var_output .= '<li class="ui-state-default" id="">';
            $mashup_var_output .= '<div class="thumb-secs"> <img src="' . esc_url( $value ) . '" id="mashup_var_' . sanitize_html_class( $id ) . $mashup_var_random_id . '_img" width="100" alt="" />';
            $mashup_var_output .= '<div class="gal-edit-opts"><a href="javascript:del_media(\'mashup_var_' . sanitize_html_class( $id ) . $mashup_var_random_id . '\')" class="delete"></a> </div>';
            $mashup_var_output .= '</div>';
            $mashup_var_output .= '</li>';
            $mashup_var_output .= '</ul>';
            $mashup_var_output .= '</div>';
            $mashup_var_output .= '</div>';
            $mashup_var_output .= '</div>';

            $mashup_var_output .= '<p>' . esc_html( $desc ) . '</p>
				</div>';
            if ( isset( $split ) && $split == true ) {
                $mashup_var_output .= '<div class="splitter"></div>';
            }
            $mashup_var_output .= '
			</div>';

            if ( isset( $echo ) && $echo == true ) {
                echo force_balance_tags( $mashup_var_output );
            } else {
                return $mashup_var_output;
            }
        }

        /**
         * select page field markup
         * 
         */
        public function mashup_var_select_page_field( $params = '' ) {
            extract( $params );
            $mashup_var_output = '';
            $mashup_var_output .= '
			<div class="form-elements">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<label>' . esc_attr( $name ) . '</label>';
            if ( isset( $hint_text ) && $hint_text != '' ) {
                $mashup_var_output .= mashup_var_tooltip_helptext( esc_html( $hint_text ) );
            }
            $mashup_var_output .= '
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<div class="select-style">';
            $mashup_var_output .= wp_dropdown_pages( $args );
            $mashup_var_output .= '<p>' . esc_html( $desc ) . '</p>
					</div>
				</div>';
            if ( isset( $split ) && $split == true ) {
                $mashup_var_output .= '<div class="splitter"></div>';
            }
            $mashup_var_output .= '
			</div>';

            if ( isset( $echo ) && $echo == true ) {
                echo force_balance_tags( $mashup_var_output );
            } else {
                return $mashup_var_output;
            }
        }

        public function mashup_var_multi_fields( $params = '' ) {
            extract( $params );
            $mashup_var_output = '';

            $mashup_var_styles = '';
            if ( isset( $styles ) && $styles != '' ) {
                $mashup_var_styles = ' style="' . $styles . '"';
            }
            $cust_id = isset( $id ) ? ' id="' . $id . '"' : '';
            $extra_attr = isset( $extra_att ) ? ' ' . $extra_att . ' ' : '';
            $mashup_var_output .= '
			<div' . $cust_id . $extra_attr . ' class="form-elements"' . $mashup_var_styles . '>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<label>' . esc_attr( $name ) . '</label>';
            if ( isset( $hint_text ) && $hint_text != '' ) {
                $mashup_var_output .= mashup_var_tooltip_helptext( esc_html( $hint_text ) );
            }
            $mashup_var_output .= '
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">';
            if ( isset( $fields_list ) && is_array( $fields_list ) ) {
                foreach ( $fields_list as $field_array ) {
                    if ( $field_array['type'] == 'text' ) {
                        $mashup_var_output .= parent::mashup_var_form_text_render( $field_array['field_params'] );
                    } elseif ( $field_array['type'] == 'hidden' ) {
                        $mashup_var_output .= parent::mashup_var_form_hidden_render( $field_array['field_params'] );
                    } elseif ( $field_array['type'] == 'select' ) {
                        $mashup_var_output .= parent::mashup_var_form_select_render( $field_array['field_params'] );
                    } elseif ( $field_array['type'] == 'multiselect' ) {
                        $mashup_var_output .= parent::mashup_var_form_multiselect_render( $field_array['field_params'] );
                    } elseif ( $field_array['type'] == 'checkbox' ) {
                        $mashup_var_output .= parent::mashup_var_form_checkbox_render( $field_array['field_params'] );
                    } elseif ( $field_array['type'] == 'radio' ) {
                        $mashup_var_output .= parent::mashup_var_form_radio_render( $field_array['field_params'] );
                    } elseif ( $field_array['type'] == 'date' ) {
                        $mashup_var_output .= parent::mashup_var_form_radio_render( $field_array['field_params'] );
                    } elseif ( $field_array['type'] == 'textarea' ) {
                        $mashup_var_output .= parent::mashup_var_form_textarea_render( $field_array['field_params'] );
                    } elseif ( $field_array['type'] == 'media' ) {
                        $mashup_var_output .= parent::mashup_var_media_url( $field_array['field_params'] );
                    } elseif ( $field_array['type'] == 'fileupload' ) {
                        $mashup_var_output .= '<div class="page-wrap" ' . $display . ' id="mashup_var_' . sanitize_html_class( $id ) . '_box">';
                        $mashup_var_output .= '<div class="gal-active">';
                        $mashup_var_output .= '<div class="dragareamain" style="padding-bottom:0px;">';
                        $mashup_var_output .= '<ul id="gal-sortable">';
                        $mashup_var_output .= '<li class="ui-state-default" id="">';
                        $mashup_var_output .= '<div class="thumb-secs"> <img src="' . esc_url( $value ) . '" id="mashup_var_' . sanitize_html_class( $id ) . '_img" width="100" alt="" />';
                        $mashup_var_output .= '<div class="gal-edit-opts"><a href="javascript:del_media(\'mashup_var_' . sanitize_html_class( $id ) . '\')" class="delete"></a> </div>';
                        $mashup_var_output .= '</div>';
                        $mashup_var_output .= '</li>';
                        $mashup_var_output .= '</ul>';
                        $mashup_var_output .= '</div>';
                        $mashup_var_output .= '</div>';
                        $mashup_var_output .= '</div>';
                        $mashup_var_output .= parent::mashup_var_form_fileupload_render( $field_params );
                    } elseif ( $field_array['type'] == 'dropdown_pages' ) {
                        $mashup_var_output .= wp_dropdown_pages( $args );
                    }
                }
            }

            $mashup_var_output .= '<p>' . esc_html( $desc ) . '</p>
				</div>';
            if ( isset( $split ) && $split == true ) {
                $mashup_var_output .= '<div class="splitter"></div>';
            }
            $mashup_var_output .= '
			</div>';

            if ( isset( $echo ) && $echo == true ) {
                echo force_balance_tags( $mashup_var_output );
            } else {
                return $mashup_var_output;
            }
        }

        public function mashup_var_get_attachment_id( $attachment_url ) {
            global $wpdb;
            $attachment_id = false;
            //  If there is no url, return. 
            if ( '' == $attachment_url )
                return;
            // Get the upload directory paths 
            $upload_dir_paths = wp_upload_dir();
            if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {
                //  If this is the URL of an auto-generated thumbnail, get the URL of the original image 
                $attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
                // Remove the upload path base directory from the attachment URL 
                $attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );

                $attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );
            }
            return $attachment_id;
        }

        public function mashup_var_get_icon_for_attachment( $post_id ) {

            return wp_get_attachment_image( $post_id, 'thumbnail' );
        }

        public function mashup_gallery_render( $params = '' ) {
            extract( $params );
            global $post, $mashup_var_plugin_core, $mashup_var_plugin_static_text;


            $mashup_var_random_id = rand( 156546, 956546 );
            ?>
            <div class="cs-gallery-con">
                <div id="gallery_container_<?php echo esc_attr( $mashup_var_random_id ); ?>" data-csid="mashup_<?php echo esc_attr( $id ) ?>">
                    <?php
                    $mashup_inline_script = '
					jQuery(document).ready(function () {
						jQuery("#gallery_sortable_' . esc_attr( $mashup_var_random_id ) . '").sortable({
							out: function (event, ui) {
								mashup_var_gallery_sorting_list(\'mashup_' . sanitize_html_class( $id ) . '\', \'' . esc_attr( $mashup_var_random_id ) . '\');
							}
						});

						gal_num_of_items(\'' . esc_attr( $id ) . '\', \'' . absint( $mashup_var_random_id ) . '\', \'\');

						jQuery(\'#gallery_container_' . esc_attr( $mashup_var_random_id ) . '\').on(\'click\', \'a.delete\', function () {
							gal_num_of_items(\'' . esc_attr( $id ) . '\', \'' . absint( $mashup_var_random_id ) . '\', 1);
							jQuery(this).closest(\'li.image\').remove();
							mashup_var_gallery_sorting_list(\'mashup_' . sanitize_html_class( $id ) . '\', \'' . esc_attr( $mashup_var_random_id ) . '\');
						});
					});';
                    mashup_admin_inline_enqueue_script( $mashup_inline_script, 'mashup-custom-functions' );
                    ?>
                    <ul class="gallery_images" id="gallery_sortable_<?php echo esc_attr( $mashup_var_random_id ); ?>">
                        <?php
                        $gallery = get_post_meta( $post->ID, 'mashup_' . $id . '_url', true );

                        $mashup_var_gal_counter = 0;
                        if ( is_array( $gallery ) && sizeof( $gallery ) > 0 ) {
                            foreach ( $gallery as $attach_url ) {

                                if ( $attach_url != '' ) {

                                    $mashup_var_gal_id = rand( 156546, 956546 );

                                    $mashup_var_attach_id = $mashup_var_plugin_core->mashup_var_get_attachment_id( $attach_url );

                                    $mashup_var_attach_img = $this->mashup_var_get_icon_for_attachment( $mashup_var_attach_id );
                                    echo '
                                    <li class="image" data-attachment_id="' . esc_attr( $mashup_var_gal_id ) . '">
                                        ' . $mashup_var_attach_img . '
                                        <input type="hidden" value="' . esc_url( $attach_url ) . '" name="mashup_' . $id . '_url[]" />
                                        <div class="actions">
                                            <span><a href="javascript:;" class="delete tips" data-tip="' . mashup_var_theme_text_srt( 'mashup_var_delete_image' ) . '"><i class="icon-cancel"></i></a></span>
                                        </div>
                                    </li>';
                                }
                                $mashup_var_gal_counter ++;
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div id="mashup_var_<?php echo esc_attr( $id ) ?>_temp"></div>
                <input type="hidden" value="" name="mashup_<?php echo esc_attr( $id ) ?>_num" />
                <div style="width:100%; display:inline-block; margin:20px 0;">
                    <label class="add_gallery hide-if-no-js" data-id="<?php echo 'mashup_' . sanitize_html_class( $id ); ?>" data-rand_id="<?php echo esc_attr( $mashup_var_random_id ); ?>">
                        <input type="button" class="button button-primary button-large" data-choose="<?php echo esc_attr( $name ); ?>" data-update="<?php echo esc_attr( $name ); ?>" data-delete="<?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_delete' ) ); ?>" data-text="<?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_delete' ) ); ?>"  value="<?php echo esc_attr( $name ); ?>">
                    </label>
                </div>
            </div>
            <?php
        }

        public function mashup_var_gallery_render( $params = '' ) {
            global $post;
            extract( $params );
            $mashup_var_random_id = rand( 156546, 956546 );
            ?>
            <div class="form-elements">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_add_gallery' ) ); ?></label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div id="gallery_container_<?php echo esc_attr( $mashup_var_random_id ); ?>" data-csid="mashup_var_<?php echo esc_attr( $id ) ?>" data-ajaxurl="<?php echo esc_url( admin_url( 'admin-ajax.php' ) );?>">
                        <?php
                        $mashup_inline_script = '
						jQuery(document).ready(function () {
							jQuery("#gallery_sortable_' . esc_attr( $mashup_var_random_id ) . '").sortable({
								out: function (event, ui) {
									mashup_var_gallery_sorting_list(\'mashup_var_' . sanitize_html_class( $id ) . '\', \'' . esc_attr( $mashup_var_random_id ) . '\');
								}
							});

							mashup_var_num_of_items(\'' . esc_attr( $id ) . '\', \'' . absint( $mashup_var_random_id ) . '\');

							jQuery(\'#gallery_container_' . esc_attr( $mashup_var_random_id ) . '\').on(\'click\', \'a.delete\', function () {
								var listItems = jQuery(\'#gallery_sortable_' . esc_attr( $mashup_var_random_id ) . '\').children();
								var count = listItems.length;
								mashup_var_num_of_items(\'' . esc_attr( $id ) . '\', \'' . absint( $mashup_var_random_id ) . '\', count);
								jQuery(this).closest(\'li.image\').remove();
								mashup_var_gallery_sorting_list(\'mashup_var_' . sanitize_html_class( $id ) . '\', \'' . esc_attr( $mashup_var_random_id ) . '\');
							});
						});';
                        mashup_admin_inline_enqueue_script( $mashup_inline_script, 'mashup-custom-functions' );
                        ?>
                        <ul class="gallery_images" id="gallery_sortable_<?php echo esc_attr( $mashup_var_random_id ); ?>">
                            <?php
                            $gallery = get_post_meta( $post->ID, 'mashup_var_' . $id, true );
                            $gallery_titles = get_post_meta( $post->ID, 'mashup_var_' . $id . '_title', true );
                            $gallery_descs = get_post_meta( $post->ID, 'mashup_var_' . $id . '_desc', true );
							$gallery_size = get_post_meta( $post->ID, 'mashup_var_' . $id . '_size', true );
							$gallery_video_url = get_post_meta( $post->ID, 'mashup_var_' . $id . '_video_url', true );
							$mashup_var_gal_counter = 0;
                            if ( is_array( $gallery ) && sizeof( $gallery ) > 0 ) {
                                foreach ( $gallery as $attach_id ) {

                                    if ( $attach_id != '' ) {

                                        $mashup_var_gal_id = rand( 156546, 956546 );
										
                                        $mashup_var_gallery_title = isset( $gallery_titles[$mashup_var_gal_counter] ) ? $gallery_titles[$mashup_var_gal_counter] : '';
                                        $mashup_var_gallery_desc = isset( $gallery_descs[$mashup_var_gal_counter] ) ? $gallery_descs[$mashup_var_gal_counter] : '';
										$mashup_var_gallery_size = isset( $gallery_size[$mashup_var_gal_counter] ) ? $gallery_size[$mashup_var_gal_counter] : '';
										$mashup_var_gallery_video_url=isset( $gallery_video_url[$mashup_var_gal_counter] ) ? $gallery_video_url[$mashup_var_gal_counter] : '';
										 $selected_small='';
										 $selected_medium='';
										 $selected_large='';
										 
										 if($mashup_var_gallery_size=='small'){
											$selected_small='selected';
											 
											}
											if($mashup_var_gallery_size=='medium'){
											$selected_medium='selected';
											 
											}
											if($mashup_var_gallery_size=='large'){
											$selected_large='selected';
											 
											}
                                        //$mashup_var_attach_id = $this->mashup_var_get_attachment_id( $attach_url );

                                        $mashup_var_attach_img = $this->mashup_var_get_icon_for_attachment( $attach_id );
                                        echo '
                                            <li class="image" data-attachment_id="' . esc_attr( $mashup_var_gal_id ) . '">
                                                    ' . $mashup_var_attach_img . '
                                                    <input type="hidden" value="' . $attach_id . '" name="mashup_var_' . $id . '[]" />
                                                    <div class="actions">
                                                            <span><a href="javascript:mashup_var_createpop(\'edit_track_form' . absint( $mashup_var_gal_id ) . '\',\'filter\')"><i class="icon-edit3"></i></a></span>
                                                            <span><a href="javascript:void(0);" class="delete tips" data-tip="' . mashup_var_theme_text_srt( 'mashup_var_delete_image' ) . '"><i class="icon-cancel"></i></a></span>
                                                    </div>
                                                    <tr class="parentdelete" id="edit_track' . absint( $mashup_var_gal_id ) . '">
                                                      <td style="width:0">
                                                      <div id="edit_track_form' . absint( $mashup_var_gal_id ) . '" style="display: none;" class="table-form-elem">
                                                              <div class="cs-heading-area">
                                                                    <h5 style="text-align: left;">' . mashup_var_theme_text_srt( 'mashup_var_edit_item' ) . '</h5>
                                                                    <span onclick="javascript:mashup_var_remove_overlay(\'edit_track_form' . absint( $mashup_var_gal_id ) . '\',\'append\')" class="cs-btnclose"> <i class="icon-cancel"></i></span>
                                                                    <div class="clear"></div>
                                                              </div>
                                                              <div class="form-elements">
                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                                      <label>&nbsp;</label>
                                                                    </div>
                                                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                                      ' . $mashup_var_attach_img . '
                                                                    </div>
                                                              </div>
                                                              <div class="form-elements">
                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                                      <label>' . mashup_var_theme_text_srt( 'mashup_var_title' ) . '</label>
                                                                    </div>
                                                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                                      <input type="text" name="mashup_var_' . $id . '_title[]" value="' . esc_html( $mashup_var_gallery_title ) . '" />
                                                                    </div>
                                                              </div>
                                                              <div class="form-elements">
                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                                      <label>' . mashup_var_theme_text_srt( 'mashup_var_description' ) . '</label>
                                                                    </div>
                                                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                                      <textarea name="mashup_var_' . $id . '_desc[]">' . esc_html( $mashup_var_gallery_desc ) . '</textarea>
                                                                    </div>
                                                              </div>
															  <div class="form-elements">
                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                                      <label>' . mashup_var_theme_text_srt( 'mashup_var_size' ) . '</label>
                                                                    </div>
                                                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
																	<select name="mashup_var_' . $id . '_size[]">
																	<option value="small" '.$selected_small.'>'. mashup_var_theme_text_srt( 'mashup_var_small' ).'</option>
																	<option  value="medium" '.$selected_medium.'>'. mashup_var_theme_text_srt( 'mashup_var_medium' ).'</option>
																	<option  value="large" '.$selected_large.'>'. mashup_var_theme_text_srt( 'mashup_var_large' ).'</option>
																	</select>
                                                                     
                                                                    </div>
                                                              </div>
															  <div class="form-elements">
                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                                      <label>' . mashup_var_theme_text_srt( 'mashup_var_video_url' ) . '</label>
                                                                    </div>
                                                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                                     
																	  <input type="text" name="mashup_var_' . $id . '_video_url[]" value="' . esc_html( $mashup_var_gallery_video_url ) . '" />
																	</div>
                                                              </div>
                                                              <ul class="form-elements noborder">
                                                                    <li class="to-label">
                                                                      <label></label>
                                                                    </li>
                                                                    <li class="to-field">
                                                                      <input type="button" value="' . mashup_var_theme_text_srt( 'mashup_var_update' ) . '" onclick="mashup_var_remove_overlay(\'edit_track_form' . absint( $mashup_var_gal_id ) . '\',\'append\')" />
                                                                    </li>
                                                              </ul>
                                                            </div>
                                                            </td>
                                                    </tr>
                                            </li>';
                                    }
                                    $mashup_var_gal_counter ++;
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <div id="mashup_var_<?php echo esc_attr( $id ) ?>_temp"></div>
                    <input type="hidden" value="" name="mashup_var_<?php echo esc_attr( $id ) ?>_num" />
                    <div style="width:100%; display:inline-block; margin:20px 0;">
                        <label class="browse-icon add_gallery hide-if-no-js" data-id="<?php echo 'mashup_var_' . sanitize_html_class( $id ); ?>" data-rand_id="<?php echo esc_attr( $mashup_var_random_id ); ?>">
                            <input type="button" class="left" data-choose="<?php echo esc_attr( $name ); ?>" data-update="<?php echo esc_attr( $name ); ?>" data-delete="<?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_delete' ) ); ?>" data-text="<?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_delete' ) ); ?>"  value="<?php echo esc_attr( $name ); ?>">
                        </label>
                    </div>
                </div>
            </div>
            <?php
        }

    }

    $var_arrays = array( 'mashup_var_html_fields' );
    $mashup_var_html_fields_global_vars = MASHUP_VAR_GLOBALS()->globalizing( $var_arrays );
    extract( $mashup_var_html_fields_global_vars );
    $mashup_var_html_fields = new mashup_var_html_fields();
}
