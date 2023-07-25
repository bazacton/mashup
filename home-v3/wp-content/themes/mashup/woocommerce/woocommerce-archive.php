<?php
/**
 * Shop Archive
 */
$var_arrays = array('post', 'mashup_var_options');
$page_global_vars = MASHUP_VAR_GLOBALS()->globalizing($var_arrays);
extract($page_global_vars);

$mashup_layout = isset($mashup_var_options['mashup_var_woo_archive_layout']) ? $mashup_var_options['mashup_var_woo_archive_layout'] : '';
if ($mashup_layout == "sidebar_left" || $mashup_layout == "sidebar_right") {
    $mashup_col_class = "page-content col-lg-9 col-md-9 col-sm-12 col-xs-12";
} else {
    $mashup_col_class = "page-content-fullwidth col-lg-12 col-md-12 col-sm-12 col-xs-12";
}
$mashup_sidebar = isset($mashup_var_options['mashup_var_woo_archive_sidebar']) ? $mashup_var_options['mashup_var_woo_archive_sidebar'] : '';
?>   

<div class="main-section">
    <div class="page-section">
        <!-- Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <?php if ($mashup_layout == 'sidebar_left') { ?>
                    <div class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <?php
                        if (is_active_sidebar(mashup_get_sidebar_id($mashup_sidebar))) {
                            if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($mashup_sidebar)) : endif;
                        }
                        ?>
                    </div>
                <?php } ?>
                
                <div class="<?php echo esc_html($mashup_col_class); ?>">
                    <?php
                    if (function_exists('woocommerce_content')) {
                        woocommerce_content();
                    }
                    ?>
                </div>
                <?php if ($mashup_layout == 'sidebar_right') { ?>
                    <div class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php
                    if (is_active_sidebar(mashup_get_sidebar_id($mashup_sidebar))) {
                        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($mashup_sidebar)) : endif;
                    }
                    ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>