<?php
/**
 * Template part for displaying post video format.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mashup
 */
global $post;
$mashup_var_format_video_url = get_post_meta( $post->ID, 'mashup_var_format_video_url', true ); 

if ( isset( $mashup_var_format_video_url ) && '' !== $mashup_var_format_video_url ){ ?>
    <div class="main-post">
            <?php echo wp_oembed_get( esc_url( $mashup_var_format_video_url ) ); ?>
    </div>
<?php } ?>
