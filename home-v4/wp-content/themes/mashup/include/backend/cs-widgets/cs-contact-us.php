<?php
/**
 * @Recent posts widget Class
 *
 *
 */
if (!class_exists('mashup_contactus')) {

    class mashup_contactus extends WP_Widget {

	/**
	 * @init Recent posts Module
	 *
	 *
	 */
	public function __construct() {
	    global $mashup_var_static_text;

	    parent::__construct(
		    'mashup_contactus', // Base ID
		    mashup_var_theme_text_srt('mashup_var_widget_contact_us'), // Name
		    array('classname' => 'widget-recent-blog', 'description' => mashup_var_theme_text_srt('mashup_var_widget_contact_us_dscription'),) // Args
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
	    $instance = wp_parse_args((array) $instance, array('title' => '', 'receiver_mail' => '', 'success_message' => '', 'error_message' => '',));
	    $title = isset($instance['title']) ? $instance['title'] : '';
	    $receiver_mail = isset($instance['receiver_mail']) ? $instance['receiver_mail'] : '';
	    $success_message = isset($instance['success_message']) ? $instance['success_message'] : '';
	    $error_message = isset($instance['error_message']) ? $instance['error_message'] : '';

	    $mashup_opt_array = array(
		'name' => mashup_var_theme_text_srt('mashup_var_widget_contact_us_title'),
		'desc' => '',
		'hint_text' => mashup_var_theme_text_srt('mashup_var_widget_contact_us_title_hint'),
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

	    $mashup_opt_array = array(
		'name' => mashup_var_theme_text_srt('mashup_var_widget_contact_us_mail_receiver'),
		'desc' => '',
		'hint_text' => mashup_var_theme_text_srt('mashup_var_widget_contact_us_mail_receiver_hint'),
		'echo' => true,
		'field_params' => array(
		    'std' => esc_attr($receiver_mail),
		    'id' => mashup_allow_special_char($this->get_field_id('receiver_mail')),
		    'classes' => '',
		    'cust_id' => mashup_allow_special_char($this->get_field_name('receiver_mail')),
		    'cust_name' => mashup_allow_special_char($this->get_field_name('receiver_mail')),
		    'return' => true,
		    'required' => false
		),
	    );
	    $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);

	    $mashup_opt_array = array(
		'name' => mashup_var_theme_text_srt('mashup_var_widget_contact_us_success_message'),
		'desc' => '',
		'hint_text' => mashup_var_theme_text_srt('mashup_var_widget_contact_us_success_message_hint'),
		'echo' => true,
		'field_params' => array(
		    'std' => esc_attr($success_message),
		    'id' => mashup_allow_special_char($this->get_field_id('success_message')),
		    'classes' => '',
		    'cust_id' => mashup_allow_special_char($this->get_field_name('success_message')),
		    'cust_name' => mashup_allow_special_char($this->get_field_name('success_message')),
		    'return' => true,
		    'required' => false
		),
	    );
	    $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);

	    $mashup_opt_array = array(
		'name' => mashup_var_theme_text_srt('mashup_var_widget_contact_us_error_message'),
		'desc' => '',
		'hint_text' => mashup_var_theme_text_srt('mashup_var_widget_contact_us_error_message_hint'),
		'echo' => true,
		'field_params' => array(
		    'std' => esc_attr($error_message),
		    'id' => mashup_allow_special_char($this->get_field_id('error_message')),
		    'classes' => '',
		    'cust_id' => mashup_allow_special_char($this->get_field_name('error_message')),
		    'cust_name' => mashup_allow_special_char($this->get_field_name('error_message')),
		    'return' => true,
		    'required' => false
		),
	    );
	    $mashup_var_html_fields->mashup_var_text_field($mashup_opt_array);
	}

	/**
	 * @Recent posts update form data
	 *
	 *
	 */
	function update($new_instance, $old_instance) {
	    $instance = $old_instance;
	    $instance['title'] = $new_instance['title'];
	    $instance['receiver_mail'] = $new_instance['receiver_mail'];
	    $instance['success_message'] = $new_instance['success_message'];
	    $instance['error_message'] = $new_instance['error_message'];
	    return $instance;
	}

	/**
	 * @Display Recent posts widget
	 *
	 */
	function widget($args, $instance) {
	    global $mashup_node, $wpdb, $post, $mashup_var_static_text;
	    $mashup_widget_counter = rand(6543, 99999);
	    extract($args, EXTR_SKIP);
	    $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
	    $receiver_mail = isset($instance['receiver_mail']) ? $instance['receiver_mail'] : '';
	    $success_message = isset($instance['success_message']) ? $instance['success_message'] : '';
	    $error_message = isset($instance['error_message']) ? $instance['error_message'] : '';
	    $title = htmlspecialchars_decode(stripslashes($title));
	    echo '<div class="widget widget-contact">';
	    if (!empty($title) && $title <> ' ') {
		echo '<div class="widget-title">';
		echo '<h6 class="text-color">' . esc_html(mashup_allow_special_char($title)) . '</h6>';
		echo '</div>';
	    }
	    $mashup_contactus_send = $receiver_mail; // receiever mail
	    $success = $success_message; // success message
	    $error = $error_message; // error message
	    $mashup_inline_script = '
		function mashup_var_contact_frm_submitt' . esc_js($mashup_widget_counter) . '(form_id) {
			var mashup_mail_id = \'' . esc_js($mashup_widget_counter) . '\';
			if (form_id == mashup_mail_id) {
				var $ = jQuery;
				$(\'input[type="submit"]\').attr(\'disabled\', true);
				$("#message' . esc_js($mashup_widget_counter) . '").addClass(\'cs-spinner\');
				$("#message' . esc_js($mashup_widget_counter) . '").html(\'<i class="icon-spinner8 fa-spin"></i>\');
				var datastring = $("#frmm' . esc_js($mashup_widget_counter) . '").serialize() + "&mashup_contact_email=' . esc_js($mashup_contactus_send) . '&mashup_contact_succ_msg=' . esc_js($success) . '&mashup_contact_error_msg=' . esc_js($error) . '&action=mashup_var_contact_submitt";
				$.ajax({
					type: \'POST\',
					url: \'' . esc_js(esc_url(admin_url('admin-ajax.php'))) . '\',
					data: datastring,
					dataType: "json",
					success: function (response) {
						if (response.type == \'error\') {
							$("#message' . esc_js($mashup_widget_counter) . '").removeClass(\'success\').addClass(\'error\');
							$("#message' . esc_js($mashup_widget_counter) . '").removeClass(\'cs-spinner\');
							$("#message' . esc_js($mashup_widget_counter) . '").show();
							$("#message' . esc_js($mashup_widget_counter) . '").html(response.message);
							$(\'input[type="submit"]\').removeAttr("disabled");
						} else if (response.type == \'success\') {
							$("#message' . esc_js($mashup_widget_counter) . '").removeClass(\'error\').addClass(\'success\');
							$("#message' . esc_js($mashup_widget_counter) . '").removeClass(\'cs-spinner\');
							$("#message' . esc_js($mashup_widget_counter) . '").show();
							$("#message' . esc_js($mashup_widget_counter) . '").html(response.message);
							$(\'input[type="submit"]\').removeAttr("disabled");
						}
					}
				}
				);
			}
		}';
	    mashup_inline_enqueue_script($mashup_inline_script, 'mashup-functions');
	    ?>
	    <form  name="frmm<?php echo absint($mashup_widget_counter); ?>" id="frmm<?php echo absint($mashup_widget_counter); ?>" action="javascript:mashup_var_contact_frm_submitt<?php echo absint($mashup_widget_counter); ?>(<?php echo absint($mashup_widget_counter); ?>)" >	
	        <div class="filed-holder">
	    	<input name="contact_email" type="email" placeholder="<?php echo esc_html(mashup_var_theme_text_srt('mashup_var_widget_contact_us_placeholder_mail')); ?>">
	        </div>
	        <div class="filed-holder">
	    	<textarea name="contact_msg" placeholder="<?php echo esc_html(mashup_var_theme_text_srt('mashup_var_widget_contact_us_placeholder_message')); ?>"></textarea>
	        </div>
	        <div class="filed-holder">
	    	<label>
				<input type="submit" value="<?php esc_html_e('SUBMIT','mashup'); ?>" class="btn-submit bgcolor border-color">
	    	</label>
	        </div>
	        <div id="message<?php echo absint($mashup_widget_counter); ?>" class="status status-message"></div>
	    </form>
	    <?php
	    echo '</div>';
	}

    }
}
    add_action('widgets_init', function() {
        register_widget('mashup_contactus');
    });
// Contact form submit ajax
if (!function_exists('mashup_var_contact_submitt')) {

    function mashup_var_contact_submitt() {

	define('WP_USE_THEMES', false);
	global $abc;
	$strings = new mashup_theme_all_strings;
	$strings->mashup_short_code_strings();
	$strings->mashup_theme_strings();
	$check_box = '';
	$json = array();
	$mashup_contact_error_msg = '';
	$subject_name = '';

	foreach ($_REQUEST as $keys => $values) {
	    $$keys = $values;
	}

	$mashup_danger_html = '<div class="alert alert-danger"><button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button><p><i class="icon-warning"></i><span>';
	$mashup_success_html = '<div class="alert alert-success"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">&times;</button><p><i class="icon-warning"></i><span>';
	$mashup_msg_html = '</span></p></div>';

	$bloginfo = get_bloginfo();
	$mashup_contactus_send = '';
	$subjecteEmail = "(" . $bloginfo . ") " . mashup_var_theme_text_srt('mashup_var_contact_received');
	if ('' == $mashup_contact_email || !preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/', $mashup_contact_email)) {
	    $json['type'] = "error";
	    $json['message'] = $mashup_danger_html . esc_html($mashup_contact_error_msg) . $mashup_msg_html;
	} else {
	    if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/', $contact_email)) {
		$json['type'] = 'error';
		$json['message'] = $mashup_danger_html . esc_html(mashup_var_theme_text_srt('mashup_var_contact_valid_email')) . $mashup_msg_html;
	    } else if ($contact_email == '') {
		$json['type'] = "error";
		$json['message'] = $mashup_danger_html . esc_html(mashup_var_theme_text_srt('mashup_var_contact_email_should_not_be_empty')) . $mashup_msg_html;
	    } else {
		$message = '
				<table width="100%" border="1">
				  <tr>
					<td width="100"><strong>' . mashup_var_theme_text_srt('mashup_var_contact_full_name') . '</strong></td>
					<td>' . esc_html($contact_name) . '</td>
				  </tr>
				  <tr>
					<td><strong>' . mashup_var_theme_text_srt('mashup_var_contact_email') . '</strong></td>
					<td>' . esc_html($contact_email) . '</td>
				  </tr>';
		if ($contact_subject != '') {
		    $message .= '<tr>
					<td><strong>' . mashup_var_theme_text_srt('mashup_var_contact_subject') . '</strong></td>
					<td>' . esc_html($contact_subject) . '</td>
				  </tr>';
		}
		if ($contact_msg != '') {
		    $message .= '<tr>
					<td><strong>' . mashup_var_theme_text_srt('mashup_var_text_here') . '</strong></td>
					<td>' . esc_html($contact_msg) . '</td>
				  </tr>';
		}
		if ($check_box != '') {
		    $message .= '
				  <tr>
					<td><strong>' . mashup_var_theme_text_srt('mashup_var_contact_check_field') . '</strong></td>
					<td>' . esc_html($check_box) . '</td>
				  </tr>';
		}
		$message .= '
				  <tr>
					<td><strong>' . mashup_var_theme_text_srt('mashup_var_contact_ip_address') . '</strong></td>
					<td>' . $_SERVER["REMOTE_ADDR"] . '</td>
				  </tr>
				</table>';
		$headers = "From: " . $contact_name . "\r\n";
		$headers .= "Reply-To: " . $contact_email . "\r\n";
		$headers .= "Content-type: text/html; charset=utf-8" . "\r\n";
		$headers .= "MIME-Version: 1.0" . "\r\n";
		$attachments = '';

		$respose = mail($mashup_contact_email, $subjecteEmail, $message, $headers);
		if ($respose) {
		    $json['type'] = "success";
		    $json['message'] = $mashup_success_html . esc_html($mashup_contact_succ_msg) . $mashup_msg_html;
		} else {
		    $json['type'] = "error";
		    $json['message'] = $mashup_danger_html . esc_html($mashup_contact_error_msg) . $mashup_msg_html;
		};
	    }
	}
	echo json_encode($json);
	die();
    }
}
//Submit Contact Us Form Hooks
add_action('wp_ajax_nopriv_mashup_var_contact_submitt', 'mashup_var_contact_submitt');
add_action('wp_ajax_mashup_var_contact_submitt', 'mashup_var_contact_submitt');

