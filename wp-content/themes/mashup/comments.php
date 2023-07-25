<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage mashup
 * @since Auto Mobile 1.0
  /*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
$var_arrays = array('post_id', 'mashup_var_static_text');
$comment_global_vars = mashup_VAR_GLOBALS()->globalizing($var_arrays);
extract($comment_global_vars);

if (have_comments()) :
    if (function_exists('the_comments_navigation')) {
	the_comments_navigation();
    }
    ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="comments" id="comments">
    	<div class="element-title">
    	    <h4>
		    <?php
		    $comments_number = get_comments_number();
		    if (1 === $comments_number) {
			/* translators: %s: post title */
			printf(esc_html(_x('One thought on &ldquo;%s&rdquo;', 'comments title', 'mashup')), get_the_title());
		    } else {
			printf(
				// translators: 1: number of comments, 2: post title.
				esc_html(_nx(
						'%1$s Response', '%1$s Responses', $comments_number, 'comments title', 'mashup'
				)), esc_html(number_format_i18n($comments_number)), get_the_title()
			);
		    }
		    ?>
    	    </h4>
    	</div>
    	<ul>
		<?php wp_list_comments(array('callback' => 'mashup_var_comment')); ?>
    	</ul>	
        </div><!-- .comment-list -->

	<?php
	if (function_exists('the_comments_navigation')) {
	    the_comments_navigation();
	}
	?>
    </div>
    <?php
endif; // Check for have_comments().  
// If comments are closed and there are comments, let's leave a little note, shall we?
if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
    ?>
    <p class="no-comments"><?php echo esc_html(mashup_var_theme_text_srt('mashup_var_comments_closed')); ?></p>
<?php endif; ?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div id="respond" class="comment-form">
	<?php
	$mashup_msg_class = '';
	if (is_user_logged_in()) {
	    $mashup_msg_class = ' cs-message';
	}
	$you_may_use = mashup_var_theme_text_srt('mashup_var_you_may');
	$must_login = '<a href="%s">'. mashup_var_theme_text_srt('mashup_var_logged_in') .'</a>' . mashup_var_theme_text_srt('mashup_var_you_must');
	$logged_in_as = mashup_var_theme_text_srt('mashup_var_log_in') . ' <a href="%1$s">%2$s</a>.<a href="%3$s" title="'. mashup_var_theme_text_srt('mashup_var_log_out_account') .'">' . mashup_var_theme_text_srt('mashup_var_log_out') . '</a>';
	$required_fields_mark = ' ' . mashup_var_theme_text_srt('mashup_var_require_fields');
	$required_text = sprintf($required_fields_mark, '<span class="required">*</span>');
	$defaults = array(
	    'fields' => apply_filters('comment_form_default_fields', array(
	    'author' => '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	    <div class="input-holder">
	    <input id="author"  name="author" class="nameinput" type="text" placeholder="' . mashup_var_theme_text_srt('mashup_var_name') . ' " value=""' .
	    esc_attr($commenter['comment_author']) . ' tabindex="1" required></div></div>',
	    'email' => '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><div class="input-holder">' .
	    '<input id="email" name="email" class="emailinput" type="text" placeholder="' . mashup_var_theme_text_srt('mashup_var_email') . ' "  value=""' .
	    esc_attr($commenter['comment_author_email']) . ' size="30" tabindex="2" required>' .
	    '</div></div>',
	    )),
	    'comment_field' => '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    <div class="input-holder" ' . $mashup_msg_class . '">
	    <textarea id="comment_mes" name="comment"  placeholder="' . mashup_var_theme_text_srt('mashup_var_text_here') . '" class="commenttextarea" rows="55" cols="15"></textarea>' .
	    '</div></div>',
	    'must_log_in' => '<span>' . sprintf($must_login, wp_login_url(apply_filters('the_permalink', get_permalink($post_id)))) . '</span>',
	    'logged_in_as' => '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><span class="mashup-loggedin-as">' . sprintf($logged_in_as, admin_url('profile.php'), $user_identity, wp_logout_url(apply_filters('the_permalink', get_permalink($post_id)))) . '</span></div>',
	    'comment_notes_before' => '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 error-massege"><span>' . mashup_var_theme_text_srt('mashup_var_email_not_publish') . '</span></div>',
	    'comment_notes_after' => '',
	    'class_form' => 'comment-form contact-form row',
	    'id_form' => 'form-style',
	    'class_submit' => 'cs-button cs-bgcolor',
	    'id_submit' => 'cs-bg-color',
	    'title_reply' => '<div class="element-title">
			    <h4>' . mashup_var_theme_text_srt('mashup_var_post_comment') . '</h4>
                            </div>',
	    'title_reply_to' => '<h2 class="element-title">' . mashup_var_theme_text_srt('mashup_var_leave_comment') . '</h2>',
	    'cancel_reply_link' => mashup_var_theme_text_srt('mashup_var_cancel_reply'),
	    'label_submit' => mashup_var_theme_text_srt('mashup_var_post_comment'),
	);
	comment_form($defaults, $post_id);
	?>
    </div>
</div><!-- .comments-area -->
