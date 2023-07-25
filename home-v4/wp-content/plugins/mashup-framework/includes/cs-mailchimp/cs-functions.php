<?php
if ( ! function_exists( 'mashup_mailchimp_list' ) ) {

    /**
     * Mailchimp list.
     *
     * @param string $apikey mailchimp shortcode api key.
     */
    function mashup_mailchimp_list( $apikey ) {
        global $mashup_var_options;
        $MailChimp = new MailChimp( $apikey );
        $mailchimp_list = $MailChimp->call( 'lists/list' );
        return $mailchimp_list;
    }

    /**
     * Mailchimp list.
     */
    if ( ! function_exists( 'mashup_mailchimp' ) ) {

        add_action( 'wp_ajax_nopriv_mashup_mailchimp', 'mashup_mailchimp' );
        add_action( 'wp_ajax_mashup_mailchimp', 'mashup_mailchimp' );

        /**
         * Mailchimp list.
         */
        function mashup_mailchimp() {
            global $mashup_var_options, $counter, $mashup_var_frame_static_text;
            $msg = array();
            $mashup_var_subscribe_success = isset( $mashup_var_frame_static_text['mashup_var_subscribe_success'] ) ? $mashup_var_frame_static_text['mashup_var_subscribe_success'] : '';
            $mashup_var_api_set_msg = isset( $mashup_var_frame_static_text['mashup_var_api_set_msg'] ) ? $mashup_var_frame_static_text['mashup_var_api_set_msg'] : '';
            $mailchimp_key = '';
            if ( isset( $mashup_var_options['mashup_var_mailchimp_key'] ) ) {
                $mailchimp_key = $mashup_var_options['mashup_var_mailchimp_key'];
            }
            if ( isset( $mashup_var_options['mashup_var_mailchimp_list'] ) ) {
                $mashup_list_id = $mashup_var_options['mashup_var_mailchimp_list'];
            }
            $mc_email = mashup_get_input( 'mc_email', false, false );
            if ( isset( $mc_email ) && ! empty( $mashup_list_id ) && '' !== $mailchimp_key ) {
                if ( $mailchimp_key <> '' ) {
                    $MailChimp = new MailChimp( $mailchimp_key );
                }
                $email = $mc_email;
                $list_id = $mashup_list_id;
                $result = $MailChimp->call( 'lists/subscribe', array(
                    'id' => $list_id,
                    'email' => array( 'email' => $email ),
                    'merge_vars' => array(),
                    'double_optin' => false,
                    'update_existing' => false,
                    'replace_interests' => false,
                    'send_welcome' => true,
                        ) );
                if ( '' !== $result ) {
                    if ( isset( $result['status'] ) && 'error' === $result['status'] ) {
                        $msg['type'] = 'error';
                        $msg['msg'] = mashup_allow_special_char( $result['error'] );
                    } else {
                        $msg['type'] = 'success';
                        $msg['msg'] = mashup_allow_special_char( $mashup_var_subscribe_success );
                    }
                }
            } else {
                $msg['type'] = 'error';
                $msg['msg'] = mashup_allow_special_char( $mashup_var_api_set_msg );
            }
            echo json_encode( $msg );
            die();
        }

    }
}

/**
 * Mailchimp frontend form.
 */
if ( ! function_exists( 'mashup_custom_mailchimp' ) ) {

    /**
     * Mailchimp frontend form.
     *
     * @param bolean $under_construction checking under construction.
     */
    function mashup_custom_mailchimp( $under_construction = '0' ) {

        global $mashup_var_options, $counter, $social_switch, $mashup_var_frame_static_text;
        $mashup_var_enter_valid = isset( $mashup_var_frame_static_text['mashup_var_enter_valid'] ) ? $mashup_var_frame_static_text['mashup_var_enter_valid'] : '';
        $counter ++;
        ?>

        <script>
            function mashup_mailchimp_submit(theme_url, counter, admin_url) {
                'use strict';
                $ = jQuery;
                $('#newsletter_error_div_' + counter).fadeOut();
                $('#newsletter_success_div_' + counter).fadeOut();
				$('#process_' + counter).show();
                $('#process_' + counter).html('<i class="icon-spinner8 fa-spin"></i>');
                $.ajax({
                    type: 'POST',
                    url: admin_url,
                    data: $('#mcform_' + counter).serialize() + '&action=mashup_mailchimp',
                    dataType: "json",
                    success: function (response) {
                        $('#mcform_' + counter).get(0).reset();
                        if (response.type === 'error') {
							$('#process_' + counter).hide();
                            $('#newsletter_mess_error_' + counter).html(response.msg);
                            $('#newsletter_error_div_' + counter).fadeIn();
                        } else {
							$('#process_' + counter).hide();
                            $('#newsletter_mess_success_' + counter).html(response.msg);
                            $('#newsletter_success_div_' + counter).fadeIn();
                        }
                        $('#newsletter_mess_' + counter).fadeIn(600);
                        $('#newsletter_mess_' + counter).html(response);
                        $('#process_' + counter).html('');
                    }
                });
            }
            function hide_div(div_hide) {
                jQuery('#' + div_hide).hide();
            }
        </script>
        <div id ="process_newsletter_<?php echo intval( $counter ); ?>">
            <div id="process_<?php echo intval( $counter ); ?>" class="status status-message cs-spinner" style="display:none"></div>
            <div id="newsletter_error_div_<?php echo intval( $counter ); ?>" style="display:none" class="alert alert-danger">
                <button class="close" type="button" onclick="hide_div('newsletter_error_div_<?php echo intval( $counter ); ?>')" aria-hidden="true">×</button>
                <p><i class="icon-warning"></i>
                    <span id="newsletter_mess_error_<?php echo intval( $counter ); ?>"></span></p>
            </div> 
            <div id="newsletter_success_div_<?php echo intval( $counter ); ?>" style="display:none" class="alert alert-success">
                <button class="close" type="button" onclick="hide_div('newsletter_success_div_<?php echo intval( $counter ); ?>')" aria-hidden="true">×</button>
                <p><i class="icon-warning"></i><span id="newsletter_mess_success_<?php echo intval( $counter ); ?>"></span></p>
            </div>
            <form  action="javascript:mashup_mailchimp_submit('<?php echo get_template_directory_uri() ?>','<?php echo esc_js( $counter ); ?>','<?php echo admin_url( 'admin-ajax.php' ); ?>')" id="mcform_<?php echo intval( $counter ); ?>" method="post">
             <?php   if($under_construction != '2' && $under_construction != '1'){ ?>
               <div class="news-letter-heading">
                    <h6><?php echo mashup_var_frame_text_srt( 'mashup_var_maintenance_newsletter' ); ?></h6>
                </div>
                <?php
                }
				if($under_construction == '1'){
				?>
				
				<div class="input-holder">
                    <input id="mashup_list_id<?php echo intval( $counter ); ?>" type="hidden" name="mashup_list_id" value="<?php
                    if ( isset( $mashup_var_options['mashup_var_mailchimp_list'] ) ) {
                        echo esc_attr( $mashup_var_options['mashup_var_mailchimp_list'] );
                    }
                    ?>" />
                    <input type="text" id="mc_email<?php echo intval( $counter ); ?>" class="txt-bar"  name="mc_email" placeholder=" <?php echo esc_html( $mashup_var_enter_valid ); ?>"   >
                    <input class="btn-submit bgcolor border-color" id="btn_newsletter_<?php echo intval( $counter ); ?>" type="submit" value="Submit">
                </div>
				
				
				<?php } else{ ?>
                <div class="filed-holder">
                    <input id="mashup_list_id<?php echo intval( $counter ); ?>" type="hidden" name="mashup_list_id" value="<?php
                    if ( isset( $mashup_var_options['mashup_var_mailchimp_list'] ) ) {
                        echo esc_attr( $mashup_var_options['mashup_var_mailchimp_list'] );
                    }
                    ?>" />
                    <input type="text" id="mc_email<?php echo intval( $counter ); ?>" class="txt-bar"  name="mc_email" placeholder=" <?php echo esc_html( $mashup_var_enter_valid ); ?>"   >
                    <label>
                    <input class="btn-submit bgcolor border-color" id="btn_newsletter_<?php echo intval( $counter ); ?>" type="submit" value="Submit">
                    </label>
                </div>
            </form>
        </div>
        <?php
				}
    }

}

if ( ! function_exists( 'mashup_var_social_network' ) ) {

    function mashup_var_social_network( $icon_type = '', $tooltip = '' ) {
        global $mashup_var_options;
        $tooltip_data = '';
        if ( $icon_type == 'large' ) {
            $icon = 'icon-2x';
        } else {

            $icon = '';
        }
        if ( isset( $tooltip ) && $tooltip <> '' ) {
            $tooltip_data = 'data-placement-tooltip="tooltip"';
        }
        if ( isset( $mashup_var_options['mashup_var_social_net_url'] ) and count( $mashup_var_options['mashup_var_social_net_url'] ) > 0 ) {
            $i = 0;
            $icon_color = array();
            $icon_color = $mashup_var_options['mashup_var_social_icon_color'];
            ?>
            <ul>
                <?php
                if ( is_array( $mashup_var_options['mashup_var_social_net_url'] ) ):
                    foreach ( $mashup_var_options['mashup_var_social_net_url'] as $val ) {

                        if ( $val != '' ) {
                            ?>      
                            <li>
                                <a style="background :<?php echo $icon_color[$i]; ?> "  href="<?php echo esc_url( $val ); ?>" data-original-title="<?php echo mashup_allow_special_char( $mashup_var_options['mashup_var_social_net_tooltip'][$i] ); ?>"  <?php echo balanceTags( $tooltip_data, false ); ?> >
                                    <?php if ( $mashup_var_options['mashup_var_social_net_awesome'][$i] <> '' && isset( $mashup_var_options['mashup_var_social_net_awesome'][$i] ) ) { ?>
                                        <i class="<?php echo esc_attr( $mashup_var_options['mashup_var_social_net_awesome'][$i] ); ?> <?php echo esc_attr( $icon ); ?>"></i>

                                    <?php } else { ?>
                                        <img title="<?php echo esc_attr( $mashup_var_options['mashup_var_social_net_tooltip'][$i] ); ?>" src="<?php echo esc_url( $mashup_var_options['mashup_var_social_icon_path_array'][$i] ); ?>" alt="<?php echo esc_attr( $mashup_var_options['mashup_var_social_net_tooltip'][$i] ); ?>" />
                                    <?php } ?>
                                </a>
                            </li>
                            <?php
                        }
                        $i ++;
                    }
                endif;
                ?>
            </ul>
            <?php
        }
    }

}
