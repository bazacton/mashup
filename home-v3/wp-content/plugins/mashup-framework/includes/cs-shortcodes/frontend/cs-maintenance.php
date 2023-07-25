<?php
/*
 *
 * @Shortcode Name : Maintenance
 * @retrun
 *
 */



if ( ! function_exists( 'mashup_var_maintenance' ) ) {

    function mashup_var_maintenance( $atts, $content = "" ) {
        global $post, $wp_query, $mashup_var_options, $mashup_var_post_meta;

        update_option( 'mashup_underconstruction_redirecting', '0' ); // for undercostruction reset redirect.\

        $defaults = array(
            'mashup_var_column_size' => '',
            'mashup_var_column' => '1',
            'mashup_var_maintenance_text' => '',
            'mashup_var_maintenance_time_left' => '',
            'mashup_var_maintenance_logo_url_array' => '',
            'mashup_var_maintenance_image_url_array' => '',
            'mashup_page_view' => '',
            'mashup_var_lunch_date' => '',
            'maintenance_heading_text' => '',
        );
        extract( shortcode_atts( $defaults, $atts ) );
        $column_class = '';

        if ( isset( $mashup_var_column_size ) && $mashup_var_column_size != '' ) {
            if ( $mashup_var_column_size <> '' ) {
                if ( function_exists( 'mashup_var_custom_column_class' ) ) {
                    $column_class = mashup_var_custom_column_class( $mashup_var_column_size );
                }
            }
        }

        if ( isset( $column_class ) && $column_class <> '' ) {
            echo '<div class="' . esc_html( $column_class ) . '">';
        }
        $mashup_page_view = isset( $mashup_page_view ) ? $mashup_page_view : '2';
        $mashup_var_maintenance_image_url_array = isset( $mashup_var_maintenance_image_url_array ) ? $mashup_var_maintenance_image_url_array : '';
        $mashup_var_maintenance_logo_url_array = isset( $mashup_var_maintenance_logo_url_array ) ? $mashup_var_maintenance_logo_url_array : '';
        $maintenance_heading_text = isset( $maintenance_heading_text ) ? $maintenance_heading_text : '';
        $mashup_var_maintenance_text = $content;
        $mashup_var_lunch_date = isset( $mashup_var_lunch_date ) ? $mashup_var_lunch_date : '';
        $mashup_var_maintenance_switch = isset( $mashup_var_options['mashup_var_maintenance_switch'] ) ? $mashup_var_options['mashup_var_maintenance_switch'] : '';
        $mashup_var_maintenance_logo = isset( $mashup_var_options['mashup_var_maintenance_logo_switch'] ) ? $mashup_var_options['mashup_var_maintenance_logo_switch'] : '';
        $mashup_var_maintenance_header_switch = isset( $mashup_var_options['mashup_var_maintenance_header_switch'] ) ? $mashup_var_options['mashup_var_maintenance_header_switch'] : '';
        $mashup_var_footer_switch = isset( $mashup_var_options['mashup_var_maintenance_footer_switch'] ) ? $mashup_var_options['mashup_var_maintenance_footer_switch'] : '';
        $mashup_var_maintenance_social_switch = isset( $mashup_var_options['mashup_var_maintenance_social_switch'] ) ? $mashup_var_options['mashup_var_maintenance_social_switch'] : '';
        $mashup_var_maintenance_newsletter_switch = isset( $mashup_var_options['mashup_var_maintenance_newsletter_switch'] ) ? $mashup_var_options['mashup_var_maintenance_newsletter_switch'] : '';
        $mashup_var_date = date_i18n( 'Y/m/d', strtotime( $mashup_var_lunch_date ) );
        $mashup_var_maintenance = '';
        ob_start();
        ?>
        <script>
            jQuery(document).ready(function ($) {
                var date = '<?php echo $mashup_var_date; ?>';
                if (jQuery('#getting-started').length != '') {
                    jQuery('#getting-started').countdown(date, function (event) {
                        jQuery(this).html(event.strftime('<div class="time-box"><span class="label">days</span><h4 class="dd">%D</h4></div><div class="time-box"><span class="label">hours</span><h4 class="hh">%H</h4></div><div class="time-box"><span class="label">minutes</span><h4 class="mm">%M</h4></div><div class="time-box"><span class="label">seconds</span><h4 class="ss">%S</h4></div> '));
                    });
                }
            });
        </script>
        <div id="construction" class="page-section" style="background:#f8f8f8 url(<?php echo $mashup_var_maintenance_image_url_array; ?>)no-repeat; background-size:cover; padding-top:72px; padding-bottom:140px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="construction-holder">
                            <div class="construction  fancy">
                                <div class="logo">
                                    <?php if ( isset( $mashup_var_maintenance_logo ) && $mashup_var_maintenance_logo == 'on' ) { ?>
                                        <div class="img-holder">
                                            <figure>
                                                <img src="<?php echo esc_url( $mashup_var_maintenance_logo_url_array ); ?>" alt="" />
                                            </figure>
                                        </div>
                                    <?php } ?>

                                    <?php if ( $maintenance_heading_text <> '' ) { ?>
                                        <span><?php echo htmlspecialchars_decode( $maintenance_heading_text ); ?></span>
                                    <?php } ?>

                                    <?php if ( $mashup_var_maintenance_text <> '' ) { ?>
                                        <p><?php echo htmlspecialchars_decode( $mashup_var_maintenance_text ); ?></p>
                                    <?php } ?>
                                    <div class="seprater">
                                        <span><i class=" icon-clock4 text-color"> </i></span>
                                    </div>
                                </div>
                                <div class="const-counter">
                                    <div id="getting-started"></div>
                                </div>
                                <?php if ( $mashup_var_maintenance_newsletter_switch <> '' && $mashup_var_maintenance_newsletter_switch == "on" ) { ?>
                                    <div class="news-letter">
                                        <div class="news-letter-heading">
                                            <h6><?php echo mashup_var_frame_text_srt( 'mashup_var_maintenance_newsletter' ); ?></h6>
                                        </div>
                                        <div class="news-letter-form">
                                            <?php
                                            $under_construction = '1';
                                            mashup_custom_mailchimp( $under_construction );
                                            ?>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if ( isset( $mashup_var_maintenance_social_switch ) && $mashup_var_maintenance_social_switch == 'on' ) { ?>
                                    <div class="social-media">
                                        <?php echo mashup_var_social_network(); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        ?>
        <?php
        if ( isset( $column_class ) && $column_class <> '' ) {
            echo '</div>';
        }
        ?>
        <?php
        $mashup_var_maintenance = ob_get_clean();
        return $mashup_var_maintenance;
    }

    if ( function_exists( 'mashup_var_short_code' ) )
        mashup_var_short_code( 'mashup_maintenance', 'mashup_var_maintenance' );
}