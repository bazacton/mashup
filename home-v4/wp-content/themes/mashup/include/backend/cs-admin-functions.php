<?php

/**
 * Admin Functions
 *
 * @package WordPress
 * @subpackage mashup
 * @since Auto Mobile 1.0
 */
if ( ! function_exists( 'mashup_var_icomoon_icons_box' ) ) {

    function mashup_var_icomoon_icons_box( $icon_value = '', $id = '', $name = '' ) {

        global $mashup_var_html_fields, $mashup_var_form_fields, $mashup_var_static_text;

        $mashup_var_icomoon = '';
        $mashup_var_icomoon .= '<script>
		jQuery(document).ready(function ($) {

			var e9_element = $(\'#e9_element_' . esc_html( $id ) . '\').fontIconPicker({
				theme: \'fip-bootstrap\'
			});
			// Add the event on the button
			$(\'#e9_buttons_' . esc_html( $id ) . ' button\').on(\'click\', function (e) {
				e.preventDefault();
				// Show processing message
				$(this).prop(\'disabled\', true).html(\'<i class="icon-cog demo-animate-spin"></i> ' . mashup_var_theme_text_srt( 'mashup_var_wait' ) . '\');
				$.ajax({
					url: "' . get_template_directory_uri() . '/assets/common/icomoon/js/selection.json",
					type: \'GET\',
					dataType: \'json\'
				}).done(function (response) {
						// Get the class prefix
						var classPrefix = response.preferences.fontPref.prefix,
								icomoon_json_icons = [],
								icomoon_json_search = [];
						$.each(response.icons, function (i, v) {
								icomoon_json_icons.push(classPrefix + v.properties.name);
								if (v.icon && v.icon.tags && v.icon.tags.length) {
										icomoon_json_search.push(v.properties.name + \' \' + v.icon.tags.join(\' \'));
								} else {
										icomoon_json_search.push(v.properties.name);
								}
						});
						// Set new fonts on fontIconPicker
						e9_element.setIcons(icomoon_json_icons, icomoon_json_search);
						// Show success message and disable
						$(\'#e9_buttons_' . esc_html( $id ) . ' button\').removeClass(\'btn-primary\').addClass(\'btn-success\').text(\'' . mashup_var_theme_text_srt( 'mashup_var_load_icon' ) . '\').prop(\'disabled\', true);
				})
				.fail(function () {
						// Show error message and enable
						$(\'#e9_buttons_' . esc_html( $id ) . ' button\').removeClass(\'btn-primary\').addClass(\'btn-danger\').text(\'' . mashup_var_theme_text_srt( 'mashup_var_try_again' ) . '\').prop(\'disabled\', false);
				});
				e.stopPropagation();
			});
			jQuery("#e9_buttons_' . esc_html( $id ) . ' button").click();
		});
		</script>';

        $mashup_opt_array = array(
            'std' => esc_html( $icon_value ),
            'cust_id' => 'e9_element_' . esc_html( $id ),
            'cust_name' => esc_html( $name ) . '[]',
            'return' => true,
        );
        $mashup_var_icomoon .= $mashup_var_form_fields->mashup_var_form_text_render( $mashup_opt_array );
        $display = '';
        $display = 'style=display:none';
        $mashup_var_icomoon .= '
        <span id="e9_buttons_' . esc_html( $id ) . '" ' . esc_html( $display ) . '>
            <button autocomplete="off" type="button" class="btn btn-primary">' . mashup_var_theme_text_srt( 'mashup_var_load_json' ) . '</button>
        </span>';

        return $mashup_var_icomoon;
    }

}

/**
 * @count Banner Clicks
 *
 */
if ( ! function_exists( 'mashup_var_banner_click_count_plus' ) ) {

    function mashup_var_banner_click_count_plus() {
        $code_id = isset( $_POST['code_id'] ) ? $_POST['code_id'] : '';
        $banner_click_count = get_option( "banner_clicks_" . $code_id );
        $banner_click_count = $banner_click_count <> '' ? $banner_click_count : 0;
        if ( ! isset( $_COOKIE["banner_clicks_" . $code_id] ) ) {
            setcookie( "banner_clicks_" . $code_id, 'true', time() + 86400, '/' );
            update_option( "banner_clicks_" . $code_id, $banner_click_count + 1 );
        }
        die( 0 );
    }

    add_action( 'wp_ajax_mashup_var_banner_click_count_plus', 'mashup_var_banner_click_count_plus' );
    add_action( 'wp_ajax_nopriv_mashup_var_banner_click_count_plus', 'mashup_var_banner_click_count_plus' );
}

/**
 * @Adding Ads Unit
 *
 */
if ( ! function_exists( 'mashup_var_ads_banner' ) ) {

    function mashup_var_ads_banner() {

        global $mashup_var_html_fields, $mashup_var_form_fields, $mashup_var_static_text;
        $strings = new mashup_theme_all_strings;
        $strings->mashup_short_code_strings();
        $mashup_rand_num = rand( 123456, 987654 );
        $mashup_html = '';
        if ( $_POST['banner_title_input'] ) {

            $title = isset( $_POST['banner_title_input'] ) ? $_POST['banner_title_input'] : '';
        }
        $mashup_html .= '<tr id="del_' . absint( $mashup_rand_num ) . '">';
        $mashup_html .= '
		<td>' . esc_html( $title ) . '</td> 
                <td>' . esc_html( $_POST['banner_style_input'] ) . '</td> ';
        if ( $_POST['banner_type_input'] == 'image' ) {

            $mashup_html .= '<td><img src="' . esc_url( $_POST['image_path'] ) . '" alt="" width="100" /></td>';
            $mashup_html .= '<td>&nbsp;</td>';
        } else {
            $mashup_html .= '<td>' . mashup_var_theme_text_srt( 'mashup_var_custom_code' ) . '</td>';
            $mashup_html .= '<td>&nbsp;</td>';
        }

        $mashup_html .= '<td>[mashup_ads id="' . absint( $mashup_rand_num ) . '"]</td>';
        $mashup_html .= '
              <td class="centr"> 
			<a class="remove-btn" onclick="javascript:return confirm(\'' . mashup_var_theme_text_srt( 'mashup_var_are_sure' ) . '\')" href="javascript:ads_del(\'' . $mashup_rand_num . '\')"><i class="icon-cancel"></i></a>
			<a href="javascript:mashup_var_toggle(\'' . absint( $mashup_rand_num ) . '\')"><i class="icon-edit3"></i></a>
		</td>
		</tr>';



        $display = '';
        $display = 'style=display:none';
        $mashup_html .= '
		<tr id="' . absint( $mashup_rand_num ) . '" ' . esc_html( $display ) . '>
		  <td colspan="3">
			<div class="form-elements">
			  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
			  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<a onclick="mashup_var_toggle(\'' . absint( $mashup_rand_num ) . '\')"><i class="icon-cancel"></i></a>
			  </div>
			</div>';




        $mashup_opt_array = array(
            'name' => mashup_var_theme_text_srt( 'mashup_var_title_field' ),
            'desc' => '',
            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_banner_title_field_hint' ),
            'field_params' => array(
                'std' => isset( $_POST['banner_title_input'] ) ? $_POST['banner_title_input'] : '',
                'cust_id' => 'banner_title' . absint( $mashup_rand_num ),
                'cust_name' => 'mashup_var_banner_title[]',
                'classes' => '',
                'return' => true,
            ),
        );
        $mashup_html .= $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );


        $mashup_opt_array = array(
            'name' => mashup_var_theme_text_srt( 'mashup_var_banner_style' ),
            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_banner_style_hint' ),
            'field_params' => array(
                'std' => isset( $_POST['banner_style_input'] ) ? $_POST['banner_style_input'] : '',
                'cust_id' => 'banner_style' . absint( $mashup_rand_num ),
                'cust_name' => 'mashup_var_banner_style[]',
                'desc' => '',
                'classes' => 'input-small chosen-select',
                'options' =>
                array(
                    'top_banner' => mashup_var_theme_text_srt( 'mashup_var_banner_type_top' ),
                    'bottom_banner' => mashup_var_theme_text_srt( 'mashup_var_banner_type_bottom' ),
                    'sidebar_banner' => mashup_var_theme_text_srt( 'mashup_var_banner_type_sidebar' ),
                    'vertical_banner' => mashup_var_theme_text_srt( 'mashup_var_banner_type_vertical' ),
                ),
                'return' => true,
            ),
        );
        $mashup_html .= $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );




        $mashup_opt_array = array(
            'name' => mashup_var_theme_text_srt( 'mashup_var_banner_type' ),
            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_banner_type_hint' ),
            'field_params' => array(
                'std' => isset( $_POST['banner_type_input'] ) ? $_POST['banner_type_input'] : '',
                'cust_id' => 'banner_type' . absint( $mashup_rand_num ),
                'cust_name' => 'mashup_var_banner_type[]',
                'desc' => '',
                'extra_atr' => 'onchange="javascript:mashup_var_banner_type_toggle(this.value , \'' . $mashup_rand_num . '\')"',
                'classes' => 'input-small chosen-select',
                'options' =>
                array(
                    'image' => mashup_var_theme_text_srt( 'mashup_var_banner_image' ),
                    'code' => mashup_var_theme_text_srt( 'mashup_var_banner_code' ),
                ),
                'return' => true,
            ),
        );
        $mashup_html .= $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
        $display_ads = 'none';
        if ( $_POST['banner_type_input'] == 'image' ) {
            $display_ads = 'block';
        } else if ( $_POST['banner_type_input'] == 'code' ) {
            $display_ads = 'none';
        }
        $mashup_html .='<div id="ads_image' . absint( $mashup_rand_num ) . '" style="display:' . esc_html( $display_ads ) . '">';


        $mashup_opt_array = array(
            'name' => mashup_var_theme_text_srt( 'mashup_var_banner_image' ),
            'id' => 'banner_image',
            'std' => isset( $_POST['image_path'] ) ? $_POST['image_path'] : '',
            'desc' => '',
            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_banner_image_hint' ),
            'prefix' => '',
            'array' => true,
            'field_params' => array(
                'std' => isset( $_POST['image_path'] ) ? $_POST['image_path'] : '',
                'id' => 'banner_image',
                'prefix' => '',
                'array' => true,
                'return' => true,
            ),
        );

        $mashup_html .= $mashup_var_html_fields->mashup_var_upload_file_field( $mashup_opt_array );

        $mashup_html .='</div>';

        $mashup_opt_array = array(
            'name' => mashup_var_theme_text_srt( 'mashup_var_url_field' ),
            'desc' => '',
            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_url_hint' ),
            'field_params' => array(
                'std' => isset( $_POST['banner_field_url_input'] ) ? $_POST['banner_field_url_input'] : '',
                'cust_id' => 'banner_field_url' . absint( $mashup_rand_num ),
                'cust_name' => 'mashup_var_banner_field_url[]',
                'classes' => '',
                'return' => true,
            ),
        );
        $mashup_html .= $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );


        $mashup_opt_array = array(
            'name' => mashup_var_theme_text_srt( 'mashup_var_banner_target' ),
            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_banner_target_hint' ),
            'field_params' => array(
                'std' => isset( $_POST['banner_target_input'] ) ? $_POST['banner_target_input'] : '',
                'desc' => '',
                'cust_id' => 'banner_target' . absint( $mashup_rand_num ),
                'cust_name' => 'mashup_var_banner_target[]',
                'classes' => 'input-small chosen-select',
                'options' =>
                array(
                    '_self' => mashup_var_theme_text_srt( 'mashup_var_banner_target_self' ),
                    '_blank' => mashup_var_theme_text_srt( 'mashup_var_banner_target_blank' ),
                ),
                'return' => true,
            ),
        );
        $mashup_html .= $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
        $display_ads = 'none';
        if ( $_POST['banner_type_input'] == 'image' ) {
            $display_ads = 'none';
        } else if ( $_POST['banner_type_input'] == 'code' ) {
            $display_ads = 'block';
        }
        $mashup_html .='<div id="ads_code' . absint( $mashup_rand_num ) . '" style="display:' . esc_html( $display_ads ) . '">';
        $mashup_opt_array = array(
            'name' => mashup_var_theme_text_srt( 'mashup_var_banner_ad_sense_code' ),
            'desc' => '',
            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_banner_ad_sense_code_hint' ),
            'field_params' => array(
                'std' => isset( $_POST['adsense_code_input'] ) ? $_POST['adsense_code_input'] : '',
                'cust_id' => 'adsense_code' . absint( $mashup_rand_num ),
                'cust_name' => 'mashup_var_adsense_code[]',
                'classes' => '',
                'return' => true,
            ),
        );
        $mashup_html .= $mashup_var_html_fields->mashup_var_textarea_field( $mashup_opt_array );
        $mashup_html .='</div>';

        $mashup_opt_array = array(
            'std' => absint( $mashup_rand_num ),
            'id' => 'banner_field_code_no' . absint( $mashup_rand_num ),
            'cust_name' => 'mashup_var_banner_field_code_no[]',
            'return' => true,
        );
        $mashup_html .= $mashup_var_form_fields->mashup_var_form_hidden_render( $mashup_opt_array );


        $mashup_html .= '	
		  </td>
		</tr>';


        echo force_balance_tags( $mashup_html );
        die;
    }

    add_action( 'wp_ajax_mashup_var_ads_banner', 'mashup_var_ads_banner' );
}



/**
 * @Adding Social Icons
 *
 */
if ( ! function_exists( 'mashup_var_add_social_icon' ) ) {

    function mashup_var_add_social_icon() {

        global $mashup_var_html_fields, $mashup_var_form_fields, $mashup_var_static_text;
        $strings = new mashup_theme_all_strings;
        $strings->mashup_short_code_strings();
        $mashup_rand_num = rand( 123456, 987654 );
        $mashup_html = '';
        if ( $_POST['social_net_awesome'] ) {

            $icon_awesome = $_POST['social_net_awesome'];
        }
        $socail_network = get_option( 'mashup_var_social_network' );
        $mashup_html .= '<tr id="del_' . absint( $mashup_rand_num ) . '"><td>';
        if ( isset( $icon_awesome ) && $icon_awesome <> '' ) {
            $mashup_html .= '<i  class="' . $_POST['social_net_awesome'] . ' icon-2x"></i>';
        } else {
            $mashup_html .= '<img width="50" src="' . esc_url( $_POST['social_net_icon_path'] ) . '">';
        }
        $mashup_html .= '</td>';
        $mashup_html .= '
		<td>' . esc_html( $_POST['social_net_tooltip'] ) . '</td> 

		<td><a href="#">' . esc_url( $_POST['social_net_url'] ) . '</a></td> 

		<td class="centr"> 
			<a class="remove-btn" onclick="javascript:return confirm(\'' . mashup_var_theme_text_srt( 'mashup_var_are_sure' ) . '\')" href="javascript:social_icon_del(\'' . $mashup_rand_num . '\')"><i class="icon-cancel"></i></a>
			<a href="javascript:mashup_var_toggle(\'' . absint( $mashup_rand_num ) . '\')"><i class="icon-edit3"></i></a>
		</td>
		</tr>';

        $display = '';
        $display = 'style=display:none';

        $mashup_html .= '
		<tr id="' . absint( $mashup_rand_num ) . '" ' . esc_html( $display ) . '>
		  <td colspan="3">
			<div class="form-elements">
			  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
			  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<a onclick="mashup_var_toggle(\'' . absint( $mashup_rand_num ) . '\')"><i class="icon-cancel"></i></a>
			  </div>
			</div>';

        $mashup_opt_array = array(
            'name' => mashup_var_theme_text_srt( 'mashup_var_title_field' ),
            'desc' => '',
            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_icon_hint' ),
            'field_params' => array(
                'std' => isset( $_POST['social_net_tooltip'] ) ? $_POST['social_net_tooltip'] : '',
                'cust_id' => 'social_net_tooltip' . absint( $mashup_rand_num ),
                'cust_name' => 'mashup_var_social_net_tooltip[]',
                'classes' => '',
                'return' => true,
            ),
        );
        $mashup_html .= $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

        $mashup_opt_array = array(
            'name' => mashup_var_theme_text_srt( 'mashup_var_url_field' ),
            'desc' => '',
            'hint_text' => mashup_var_theme_text_srt( 'mashup_var_url_hint' ),
            'field_params' => array(
                'std' => isset( $_POST['social_net_url'] ) ? $_POST['social_net_url'] : '',
                'cust_id' => 'social_net_url' . absint( $mashup_rand_num ),
                'cust_name' => 'mashup_var_social_net_url[]',
                'classes' => '',
                'return' => true,
            ),
        );
        $mashup_html .= $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

        $mashup_opt_array = array(
            'name' => mashup_var_theme_text_srt( 'mashup_var_icon_path' ),
            'id' => 'social_icon_path',
            'std' => isset( $_POST['social_net_icon_path'] ) ? $_POST['social_net_icon_path'] : '',
            'desc' => '',
            'hint_text' => '',
            'prefix' => '',
            'array' => true,
            'field_params' => array(
                'std' => isset( $_POST['social_net_icon_path'] ) ? $_POST['social_net_icon_path'] : '',
                'id' => 'social_icon_path',
                'prefix' => '',
                'array' => true,
                'return' => true,
            ),
        );

        $mashup_html .= $mashup_var_html_fields->mashup_var_upload_file_field( $mashup_opt_array );

        $mashup_html .= '
			<div class="form-elements" id="mashup_var_infobox_networks' . absint( $mashup_rand_num ) . '">
			  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><label>' . mashup_var_theme_text_srt( 'mashup_var_icon' ) . '</label></div>
			  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
				' . mashup_var_icomoon_icons_box( $_POST['social_net_awesome'], "networks" . absint( $mashup_rand_num ), 'mashup_var_social_net_awesome' ) . '
			  </div>
			</div>';

        $mashup_opt_array = array(
            'name' => mashup_var_theme_text_srt( 'mashup_var_icon_color' ),
            'desc' => '',
            'hint_text' => '',
            'field_params' => array(
                'std' => isset( $_POST['social_font_awesome_color'] ) ? $_POST['social_font_awesome_color'] : '',
                'cust_id' => 'social_font_awesome_color' . absint( $mashup_rand_num ),
                'cust_name' => 'mashup_var_social_icon_color[]',
                'classes' => 'bg_color',
                'return' => true,
            ),
        );
        $mashup_html .= $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

        $mashup_html .= '	
		  </td>
		</tr>';

        echo force_balance_tags( $mashup_html );
        die;
    }

    add_action( 'wp_ajax_mashup_var_add_social_icon', 'mashup_var_add_social_icon' );
}


/**
 * @Tool Tip Help Text Style
 *
 */
if ( ! function_exists( 'mashup_var_tooltip_helptext' ) ) {

    function mashup_var_tooltip_helptext( $popover_text = '', $return_html = true ) {
        $popover_link = '';
        if ( isset( $popover_text ) && $popover_text != '' ) {
            $popover_link = '<a class="cs-help" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="' . esc_html( $popover_text ) . '"><i class="icon-help"></i></a>';
        }
        if ( $return_html == true ) {
            return $popover_link;
        } else {
            echo force_balance_tags( $popover_link );
        }
    }

}

/**
 * @Decoding Shortcode
 *
 */
if ( ! function_exists( 'mashup_var_custom_shortcode_decode' ) ) {

    function mashup_var_custom_shortcode_decode( $sh_content = '' ) {
        $sh_content = str_replace( array( 'mashup_open', 'mashup_close' ), array( '[', ']' ), $sh_content );
        return $sh_content;
    }

}
