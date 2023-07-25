<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package mashup
 */
get_header();
$var_arrays = array( 'mashup_var_static_text', 'mashup_var_form_fields', 'mashup_var_html_fields' );
$error_page_global_vars = MASHUP_VAR_GLOBALS()->globalizing( $var_arrays );
extract( $error_page_global_vars );
?>

<div id="main">
    <div class="main-section">
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-not-found">
                            <div class="logo-img">
                                <figure>
                                    <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri() . '/assets/frontend/images/404-logo-image.png' ?>" alt="#"></a>
                                </figure>
                            </div>
                            <div class="text-holder">
                                <span><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_404_title' ) ); ?></span>
                                <p><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_404_sub_title' ) ); ?></p>
                                <a href="<?php echo esc_url(home_url('/')) ?>"><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_404_go_to_homepage' ) ); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
