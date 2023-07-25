<?php

/*
 * Frontend file for Contact Us short code
 */
if ( !function_exists( 'mashup_var_contact_us_data' ) ) {

	function mashup_var_contact_us_data( $atts, $content = "" ) {
		global $post, $abc;
		$defaults = shortcode_atts( array(
			'mashup_var_column_size' => '',
			'mashup_var_contact_us_element_title' => '',
			'mashup_var_contact_us_element_send' => '',
			'mashup_var_contact_us_element_success' => '',
			'mashup_var_contact_us_element_error' => '',
			'mashup_var_contact_form_sub_title' => '',
			'mashup_var_contact_form_align' => '',
				), $atts );
		extract( shortcode_atts( $defaults, $atts ) );
		$strings = new mashup_theme_all_strings;
		$strings->mashup_short_code_strings();
		if ( isset( $mashup_var_column_size ) && $mashup_var_column_size != '' ) {
			if ( function_exists( 'mashup_var_custom_column_class' ) ) {
				$column_class = mashup_var_custom_column_class( $mashup_var_column_size );
			}
		}
		$mashup_email_counter = rand( 56, 5565 );
		// Set All variables 
		$html = '';
		$section_title = '';
		$column_class = isset( $column_class ) ? $column_class : '';
		$mashup_contactus_section_title = isset( $mashup_var_contact_us_element_title ) ? $mashup_var_contact_us_element_title : '';
		$mashup_var_contact_form_sub_title = isset( $mashup_var_contact_form_sub_title ) ? $mashup_var_contact_form_sub_title : '';
		$mashup_var_contact_form_align = isset( $mashup_var_contact_form_align ) ? $mashup_var_contact_form_align : '';
		$mashup_contactus_send = isset( $mashup_var_contact_us_element_send ) ? $mashup_var_contact_us_element_send : '';
		$mashup_success = isset( $mashup_var_contact_us_element_success ) ? $mashup_var_contact_us_element_success : '';
		$mashup_error = isset( $mashup_var_contact_us_element_error ) ? $mashup_var_contact_us_element_error : '';
		// End All variables
		if ( isset( $column_class ) && $column_class <> '' ) {
			$html .= '<div class="' . esc_html( $column_class ) . '">';
		}
		if (( isset( $mashup_contactus_section_title ) && $mashup_contactus_section_title <> '') || (isset( $mashup_var_contact_form_sub_title ) && $mashup_var_contact_form_sub_title <> '' )) {
			$html .= '<div class="element-title '. esc_html( $mashup_var_contact_form_align ) .'">';
			if ( isset( $mashup_contactus_section_title ) && $mashup_contactus_section_title <> '' ) {
				$html .= '<h2>' . esc_html( $mashup_contactus_section_title ) . '</h2>';
			}
			$html .= '<em></em>';
			if ( isset( $mashup_var_contact_form_sub_title ) && $mashup_var_contact_form_sub_title <> '' ) {
				$html .= '<p>' . esc_html( $mashup_var_contact_form_sub_title ) . '</p>';
			}
			
			$html .= '</div>';
		}
		if ( trim( $mashup_success ) && trim( $mashup_success ) != '' ) {
			$success = $mashup_success;
		} else {
			$success = mashup_var_theme_text_srt( 'mashup_var_contact_default_success_msg' );
		}
		if ( trim( $mashup_error ) && trim( $mashup_error ) != '' ) {
			$error = $mashup_error;
		} else {
			$error = mashup_var_theme_text_srt( 'mashup_var_contact_default_error_msg' );
		}
		$mashup_inline_script = '
		function mashup_var_contact_frm_submit(form_id) {
			var mashup_mail_id = \'' . esc_js( $mashup_email_counter ) . '\';
			if (form_id == mashup_mail_id) {
				var $ = jQuery;
				$(\'input[type="submit"]\').attr(\'disabled\', true);
				$("#message' . esc_js( $mashup_email_counter ) . '").addClass(\'cs-spinner\');
				$("#message' . esc_js( $mashup_email_counter ) . '").html(\'<i class="icon-spinner8 icon-spin"></i>\');
				var datastring = $("#frm' . esc_js( $mashup_email_counter ) . '").serialize() + "&mashup_contact_email=' . esc_js( $mashup_contactus_send ) . '&mashup_contact_succ_msg=' . esc_js( $success ) . '&mashup_contact_error_msg=' . esc_js( $error ) . '&action=mashup_var_contact_submit";
				$.ajax({
					type: \'POST\',
					url: \'' . esc_js( esc_url( admin_url( 'admin-ajax.php' ) ) ) . '\',
					data: datastring,
					dataType: "json",
					success: function (response) {
						if (response.type == \'error\') {
							$("#message' . esc_js( $mashup_email_counter ) . '").removeClass(\'success\').addClass(\'error\');
							$("#message' . esc_js( $mashup_email_counter ) . '").removeClass(\'cs-spinner\');
							$("#message' . esc_js( $mashup_email_counter ) . '").show();
							$("#message' . esc_js( $mashup_email_counter ) . '").html(response.message);
							$(\'input[type="submit"]\').removeAttr("disabled");
						} else if (response.type == \'success\') {
							$("#message' . esc_js( $mashup_email_counter ) . '").removeClass(\'error\').addClass(\'success\');
							$("#message' . esc_js( $mashup_email_counter ) . '").removeClass(\'cs-spinner\');
							$("#message' . esc_js( $mashup_email_counter ) . '").show();
							$("#message' . esc_js( $mashup_email_counter ) . '").html(response.message);
							$(\'input[type="submit"]\').removeAttr("disabled");
						}

					}
				}
				);
			}
		}';
		mashup_inline_enqueue_script( $mashup_inline_script, 'mashup-functions' );
		$html .= '<div class="contact-form">';
		$html .= '<div class="form-holder row" id="ul_frm' . absint( $mashup_email_counter ) . '">';
		$html .= '<form  name="frm' . absint( $mashup_email_counter ) . '" id="frm' . absint( $mashup_email_counter ) . '" action="javascript:mashup_var_contact_frm_submit(' . absint( $mashup_email_counter ) . ')" >';
		$html .= '<div class="row">';
		$html .= '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">';
		$html.= '<div class="row">';
		$html.='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
		$html.='<div class="input-holder">';
		$html .= '<input name="contact_name" type="text" placeholder="' . mashup_var_theme_text_srt( 'mashup_var_contact_full_name' ) . '" required>';
		$html .= '</div>';
		$html .= '</div>';
		$html.='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
		$html.='<div class="input-holder">';
		$html .= '<input name="contact_email" type="text" placeholder="' . mashup_var_theme_text_srt( 'mashup_var_contact_email' ) . '" required>';
		$html .= '</div>';
		$html .= '</div>';
		$html.='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
		$html.='<div class="input-holder">';
		$html .= '<input name="contact_subject" type="text" placeholder="' . mashup_var_theme_text_srt( 'mashup_var_contact_subject' ) . '">';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">';
		$html.= '<div class="row">';
		$html.='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
		$html.='<div class="input-holder">';
		$html .= '<textarea name="contact_msg" placeholder="' . mashup_var_theme_text_srt( 'mashup_var_text_here' ) . '"></textarea>';
		$html .= '</div>';
		$html .= '</div>';
		$html.='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
		$html.='<div class="input-holder">';
		$html .= '<input type="submit" value="' . mashup_var_theme_text_srt( 'mashup_var_contact_button_text' ) . '" class="bgcolor">';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</form>';
		$html .= '</div>';
		$html .= '<div id="message' . absint( $mashup_email_counter ) . '" class="status status-message"></div>';
		$html .= '</div>';
		if ( isset( $column_class ) && $column_class <> '' ) {
			$html .= '</div>';
		}
		return $html;
	}

}
if ( function_exists( 'mashup_var_short_code' ) ) {
	mashup_var_short_code( 'mashup_contact_form', 'mashup_var_contact_us_data' );
}


// Contact form submit ajax
if ( !function_exists( 'mashup_var_contact_submit' ) ) {

	function mashup_var_contact_submit() {
		define( 'WP_USE_THEMES', false );
		global $abc;
		$strings = new mashup_theme_all_strings;
		$strings->mashup_short_code_strings();
		$strings->mashup_theme_strings();
		$check_box = '';
		$json = array();
		$mashup_contact_error_msg = '';
		$subject_name = '';
		foreach ( $_REQUEST as $keys => $values ) {
			$$keys = $values;
		}
		$mashup_danger_html = '<div class="alert alert-danger"><button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button><p><i class="icon-warning"></i><span>';
		$mashup_success_html = '<div class="alert alert-success"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">&times;</button><p><i class="icon-warning"></i><span>';
		$mashup_msg_html = '</span></p></div>';
		$bloginfo = get_bloginfo();
		$mashup_contactus_send = '';
		$subjecteEmail = "(" . $bloginfo . ") " . mashup_var_theme_text_srt( 'mashup_var_contact_received' );
		if ( '' == $mashup_contact_email || !preg_match( '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/', $mashup_contact_email ) ) {
			$json['type'] = "error";
			$json['message'] = $mashup_danger_html . esc_html( $mashup_contact_error_msg ) . $mashup_msg_html;
		} else {
			if ( !preg_match( '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/', $contact_email ) ) {
				$json['type'] = 'error';
				$json['message'] = $mashup_danger_html . esc_html( mashup_var_theme_text_srt( 'mashup_var_contact_valid_email' ) ) . $mashup_msg_html;
			} else if ( $contact_email == '' ) {
				$json['type'] = "error";
				$json['message'] = $mashup_danger_html . esc_html( mashup_var_theme_text_srt( 'mashup_var_contact_email_should_not_be_empty' ) ) . $mashup_msg_html;
			} else {
				$message = '
				<table width="100%" border="1">
				  <tr>
					<td width="100"><strong>' . mashup_var_theme_text_srt( 'mashup_var_contact_full_name' ) . '</strong></td>
					<td>' . esc_html( $contact_name ) . '</td>
				  </tr>
				  <tr>
					<td><strong>' . mashup_var_theme_text_srt( 'mashup_var_contact_email' ) . '</strong></td>
					<td>' . esc_html( $contact_email ) . '</td>
				  </tr>';
				if ( $contact_subject != '' ) {
					$message .= '<tr>
					<td><strong>' . mashup_var_theme_text_srt( 'mashup_var_contact_subject' ) . '</strong></td>
					<td>' . esc_html( $contact_subject ) . '</td>
				  </tr>';
				}
				if ( $contact_msg != '' ) {
					$message .= '<tr>
					<td><strong>' . mashup_var_theme_text_srt( 'mashup_var_text_here' ) . '</strong></td>
					<td>' . esc_html( $contact_msg ) . '</td>
				  </tr>';
				}
				if ( $check_box != '' ) {
					$message .= '
				  <tr>
					<td><strong>' . mashup_var_theme_text_srt( 'mashup_var_contact_check_field' ) . '</strong></td>
					<td>' . esc_html( $check_box ) . '</td>
				  </tr>';
				}
				$message .= '
				  <tr>
					<td><strong>' . mashup_var_theme_text_srt( 'mashup_var_contact_ip_address' ) . '</strong></td>
					<td>' . $_SERVER["REMOTE_ADDR"] . '</td>
				  </tr>
				</table>';
				$headers = "From: " . $contact_name . "\r\n";
				$headers .= "Reply-To: " . $contact_email . "\r\n";
				$headers .= "Content-type: text/html; charset=utf-8" . "\r\n";
				$headers .= "MIME-Version: 1.0" . "\r\n";
				$attachments = '';
				$respose = mail( $mashup_contact_email, $subjecteEmail, $message, $headers );
				if ( $respose ) {
					$json['type'] = "success";
					$json['message'] = $mashup_success_html . esc_html( $mashup_contact_succ_msg ) . $mashup_msg_html;
				} else {
					$json['type'] = "error";
					$json['message'] = $mashup_danger_html . esc_html( $mashup_contact_error_msg ) . $mashup_msg_html;
				};
			}
		}
		echo json_encode( $json );
		die();
	}

}
//Submit Contact Us Form Hooks
add_action( 'wp_ajax_nopriv_mashup_var_contact_submit', 'mashup_var_contact_submit' );
add_action( 'wp_ajax_mashup_var_contact_submit', 'mashup_var_contact_submit' );
