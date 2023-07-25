<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Geo_magazine
 * @since Mashup 1.0
 */
$mashup_var_options = MASHUP_VAR_GLOBALS()->theme_options();
$mashup_var_footer_switch = isset( $mashup_var_options['mashup_var_footer_switch'] ) ? $mashup_var_options['mashup_var_footer_switch'] : '';
$mashup_var_footer_widget = isset( $mashup_var_options['mashup_var_footer_widget'] ) ? $mashup_var_options['mashup_var_footer_widget'] : '';
$mashup_var_copy_write_section = isset( $mashup_var_options['mashup_var_copy_write_section'] ) ? $mashup_var_options['mashup_var_copy_write_section'] : '';
$mashup_var_copy_right = isset( $mashup_var_options['mashup_var_copy_right'] ) ? $mashup_var_options['mashup_var_copy_right'] : '';
$mashup_var_footer_contact_no = isset( $mashup_var_options['mashup_var_footer_contact_no'] ) ? $mashup_var_options['mashup_var_footer_contact_no'] : '';
$mashup_var_footer_menu = isset( $mashup_var_options['mashup_var_footer_menu'] ) ? $mashup_var_options['mashup_var_footer_menu'] : '';
$mashup_var_back_to_top = isset( $mashup_var_options['mashup_var_back_to_top'] ) ? $mashup_var_options['mashup_var_back_to_top'] : '';
$mashup_var_custom_footer_background = isset( $mashup_var_options['mashup_var_custom_footer_background'] ) ? $mashup_var_options['mashup_var_custom_footer_background'] : '';
$the_global_vars = array( 'mashup_var_frame_options', 'mashup_var_static_text' );
$mashup_var_options_vars = MASHUP_VAR_GLOBALS()->globalizing( $the_global_vars );
extract( $mashup_var_options_vars );
$mashup_var_maintenance_footer_switch = isset( $mashup_var_options['mashup_var_maintenance_footer_switch'] ) ? $mashup_var_options['mashup_var_maintenance_footer_switch'] : '';
$mashup_var_maintinance_mode_page = isset( $mashup_var_options['mashup_var_maintinance_mode_page'] ) ? $mashup_var_options['mashup_var_maintinance_mode_page'] : '';
$mashup_var_footer_phone = isset( $mashup_var_options['mashup_var_footer_phone'] ) ? $mashup_var_options['mashup_var_footer_phone'] : '';
$mashup_var_footer_email = isset( $mashup_var_options['mashup_var_footer_email'] ) ? $mashup_var_options['mashup_var_footer_email'] : '';
$mashup_var_footer_logo = isset( $mashup_var_options['mashup_var_footer_logo'] ) ? $mashup_var_options['mashup_var_footer_logo'] : '';
$mashup_var_footer_social = isset( $mashup_var_options['mashup_var_footer_social'] ) ? $mashup_var_options['mashup_var_footer_social'] : '';
$header_view = isset( $mashup_var_options['mashup_var_select_header_Style'] ) ? $mashup_var_options['mashup_var_select_header_Style'] : '';
if ( 'on' === $mashup_var_footer_switch && ! is_404() ) {
    if ( '' != get_the_ID() && 'on' <> $mashup_var_maintenance_footer_switch && get_the_id() == $mashup_var_maintinance_mode_page ) {
        echo '<div class="cs-nofooter"></div>';
    } else {
        ?>
        <footer id="footer">
            <?php
            if ( 'on' === $mashup_var_footer_widget ) {
                $footer_sidebar_list = '';
                $mashup_footer_sidebar_width = '';
                if ( isset( $mashup_var_options ) and isset( $mashup_var_options['mashup_var_footer_sidebar'] ) ) {
                    if ( is_array( $mashup_var_options['mashup_var_footer_sidebar'] ) and count( $mashup_var_options['mashup_var_footer_sidebar'] ) > 0 ) {
                        $mashup_footer_sidebar = array( 'mashup_var_footer_sidebar' => $mashup_var_options['mashup_var_footer_sidebar'] );
                    } else {
                        $mashup_footer_sidebar = array( 'mashup_var_footer_sidebar' => array() );
                    }
                } else {
                    $mashup_footer_sidebar = isset( $mashup_var_footer_sidebar ) ? $mashup_var_footer_sidebar : '';
                }
                $cssidebar = false;
                $i = 0;
                if ( isset( $mashup_footer_sidebar['mashup_var_footer_sidebar'] ) && is_array( $mashup_footer_sidebar['mashup_var_footer_sidebar'] ) ) {
                    foreach ( $mashup_footer_sidebar['mashup_var_footer_sidebar'] as $footer_sidebar_var => $footer_sidebar_val ) {
                        $footer_sidebar_list[$footer_sidebar_var] = $footer_sidebar_val;
                        $mashup_footer_sidebar_width = substr( $mashup_var_options['mashup_var_footer_width'][$i], 0, 2 );
                        $footer_sidebar_id = sanitize_title( $footer_sidebar_val );
                        if ( is_active_sidebar( $footer_sidebar_id ) ) {
                            $cssidebar = true;
                        }
                        $i ++;
                    }
                }
                $footer_bg_image = '';
                if ( true === $cssidebar ) {
                    if ( isset( $mashup_var_custom_footer_background ) && $mashup_var_custom_footer_background != '' ) {
                        $footer_bg_image = 'style="background:url(' . esc_url( $mashup_var_custom_footer_background ) . ') no-repeat !important;"';
                    }
                    ?>
                    <div class="footer-widgets" <?php echo force_balance_tags( $footer_bg_image ); ?> >
                        <div class="container">
                            <div class="row">
                                <?php
                                $i = 0;
                                if ( isset( $mashup_footer_sidebar['mashup_var_footer_sidebar'] ) ) {
                                    if ( is_array( $mashup_footer_sidebar['mashup_var_footer_sidebar'] ) ) {
                                        foreach ( $mashup_footer_sidebar['mashup_var_footer_sidebar'] as $footer_sidebar_var => $footer_sidebar_val ) {
                                            $footer_sidebar_list[$footer_sidebar_var] = $footer_sidebar_val;
                                            $mashup_footer_sidebar_width = intval( substr( $mashup_var_options['mashup_var_footer_width'][$i], 0, 2 ) );
                                            $footer_sidebar_id = sanitize_title( $footer_sidebar_val );
                                            $footer_side = '';
                                            if ( 2 === $mashup_footer_sidebar_width ) {
                                                $footer_side = 'col-lg-2 col-md-2 col-sm-6 col-xs-12';
                                            } elseif ( 3 === $mashup_footer_sidebar_width ) {
                                                $footer_side = 'col-lg-3 col-md-3 col-sm-6 col-xs-12';
                                            } elseif ( 4 === $mashup_footer_sidebar_width ) {
                                                $footer_side = 'col-lg-4 col-md-4 col-sm-6 col-xs-12';
                                            } elseif ( 6 === $mashup_footer_sidebar_width ) {
                                                $footer_side = 'col-lg-6 col-md-6 col-sm-12 col-xs-12';
                                            } elseif ( 8 === $mashup_footer_sidebar_width ) {
                                                $footer_side = 'col-lg-8 col-md-8 col-sm-12 col-xs-12';
                                            } elseif ( 9 === $mashup_footer_sidebar_width ) {
                                                $footer_side = 'col-lg-9 col-md-9 col-sm-12 col-xs-12';
                                            } elseif ( 10 === $mashup_footer_sidebar_width ) {
                                                $footer_side = 'col-lg-10 col-md-10 col-sm-12 col-xs-12';
                                            } else {
                                                $footer_side = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
                                            }
                                            if ( is_active_sidebar( mashup_get_sidebar_id( $footer_sidebar_id ) ) ) {
                                                echo '<div class="' . esc_attr( $footer_side ) . '">';
                                                dynamic_sidebar( $footer_sidebar_id );
                                                echo '</div>';
                                            }
                                            $i ++;
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div> <!-- /.cs-footer-widgets -->
                <?php } ?>
            <?php } ?>
            <div class="cs-copyright">
                <div class="container">
                    <div class="row">
                        <?php if ( 'on' === $mashup_var_footer_menu ) { ?>
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 ">
                                <div class="widget widget-nav">
                                    <?php
                                    if ( 'on' === $mashup_var_footer_menu && has_nav_menu( 'footer_menu' ) ) {
                                        $defaults = array(
                                            'theme_location' => 'footer_menu',
                                            'menu' => '',
                                            'container' => false,
                                            'menu_class' => '',
                                            'menu_id' => '',
                                            'echo' => false,
                                            'fallback_cb' => 'wp_page_menu',
                                            'before' => '',
                                            'after' => '',
                                            'link_before' => '',
                                            'link_after' => '',
                                            'items_wrap' => '<ul id="%2$s" class="%2$s">%3$s</ul>',
                                            'depth' => '',
                                        );
                                        echo wp_nav_menu( $defaults );
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php }if ( $mashup_var_footer_logo != '' ) { ?>
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 ">
                                <div class="footer-logo">
                                    <a href="<?php echo esc_url( home_url( '/' ) ) ?>"><img src="<?php echo esc_url( $mashup_var_footer_logo ); ?>" alt="" /></a>
                                </div>
                            </div>
                        <?php }if ( $mashup_var_footer_phone != '' || $mashup_var_footer_email != '' ) { ?>
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 ">
                                <div class="widget widget-text">
                                    <ul>
                                        <?php if ( $mashup_var_footer_phone != '' ) { ?>
                                            <li><a href="#"><?php echo esc_html( $mashup_var_footer_phone ); ?></a></li>
                                        <?php }if ( $mashup_var_footer_email != '' ) { ?>
                                            <li><a href="<?php echo 'mailto:' . $mashup_var_footer_email; ?>"><?php echo esc_html( $mashup_var_footer_email ); ?></a></li>      
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <?php if ( 'on' === $mashup_var_copy_write_section ) { ?>
                    <div class="footer-copyright">
                        <div class="container">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <?php if ( '' !== $mashup_var_copy_right ) { ?>
                                    <p><?php
                                        $mashup_allowed_tags = array(
                                            'a' => array( 'href' => array(), 'class' => array() ),
                                            'b' => array(),
                                            'i' => array( 'class' => array() ),
                                        );
                                        echo wp_kses( htmlspecialchars_decode( $mashup_var_copy_right ), $mashup_allowed_tags );
                                        ?></p>
                                    <?php
                                }
                                if ( 'on' === $mashup_var_footer_menu && has_nav_menu( 'copyright_menu' ) ) {
                                    $defaults = array(
                                        'theme_location' => 'copyright_menu',
                                        'menu' => '',
                                        'container' => false,
                                        'menu_class' => 'terms-nav',
                                        'menu_id' => '',
                                        'echo' => false,
                                        'fallback_cb' => 'wp_page_menu',
                                        'before' => '',
                                        'after' => '',
                                        'link_before' => '',
                                        'link_after' => '',
                                        'items_wrap' => '<ul id="%2$s" class="%2$s">%3$s</ul>',
                                        'depth' => '',
                                    );
                                    echo wp_nav_menu( $defaults );
                                }
                                if ( 'on' === $mashup_var_footer_social ) {
                                    if ( function_exists( 'mashup_social_network' ) ) {
                                        echo mashup_social_network( 1 );
                                    }
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </footer> <!-- /#footer -->
    <?php } ?>
<?php } ?>
</div> <!-- /.wrapper -->
<?php wp_footer(); ?>
</body>
</html>
