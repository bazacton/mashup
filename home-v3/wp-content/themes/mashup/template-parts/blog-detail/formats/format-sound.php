<?php
/**
 * Template part for displaying post sound format.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mashup
 */
 global $post;
$mashup_var_soundcloud_url = get_post_meta( $post->ID, 'mashup_var_soundcloud_url', true ); 
if ( isset( $mashup_var_soundcloud_url ) && $mashup_var_soundcloud_url != '' ) { ?>
<div class="blog-soundcloud scrollingeffect fadeInUp">
    <?php echo wp_oembed_get( esc_url( $mashup_var_soundcloud_url ) ); ?>
</div>
<?php } ?>
