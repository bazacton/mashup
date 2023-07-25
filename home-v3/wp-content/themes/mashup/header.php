<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mashup
 */
do_action('mashup_before_header');
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
		<?php
		global $mashup_var_options;
		$mashup_var_layout = isset($mashup_var_options['mashup_var_layout']) ? $mashup_var_options['mashup_var_layout'] : '';
		?>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<?php
		wp_head();
		?>
    </head>
    <body <?php body_class(); ?>>
        <div class="wrapper wrapper-<?php echo esc_html($mashup_var_layout); ?>">
            <!-- Side Menu Start -->
            <div id="overlay"></div>
			<?php
			if ( is_404() ) {
				
			} else {
				$mashup_var_maintenance_page = isset($mashup_var_options['mashup_var_maintinance_mode_page']) ? $mashup_var_options['mashup_var_maintinance_mode_page'] : '';
				$mashup_var_maintenance_check = isset($mashup_var_options['mashup_var_maintenance_switch']) ? $mashup_var_options['mashup_var_maintenance_switch'] : '';
				$mashup_var_maintenance_header_switch = isset($mashup_var_options['mashup_var_maintenance_header_switch']) ? $mashup_var_options['mashup_var_maintenance_header_switch'] : 'off';
				if ( get_the_ID() == $mashup_var_maintenance_page && $mashup_var_maintenance_check == 'on' && $mashup_var_maintenance_header_switch <> 'on' ) {
					echo '<header id="header"></header>';
				} elseif ( '' != get_the_ID() && get_the_ID() == $mashup_var_maintenance_page && $mashup_var_maintenance_check <> 'on' && $mashup_var_maintenance_header_switch <> 'on' ) {
					echo '<header id="header"></header>';
				} else {
					mashup_main_header();
					if ( function_exists('mashup_var_subheader_style') ) {
						mashup_var_subheader_style();
					}
				}
			}