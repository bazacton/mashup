<?php
/**
 * Template part for displaying post large slider format.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mashup
 */
 global $post;
$gallery_images = get_post_meta( $post->ID, 'mashup_var_post_detail_page_gallery', true );
if ( is_array( $gallery_images ) && array_filter( $gallery_images ) ) {
    ?>
    <div class="main-post swiper-container">
        <div class="swiper-loader"><div class="slice"><div data-loader="ball-roll"></div></div></div>
        <ul class="slider-post swiper-wrapper" >
            <?php
            foreach ( $gallery_images as $key => $gallery_image_id ) {
                if ( '' != $gallery_image_id ) {
                    $mashup_var_src = wp_get_attachment_image_src( $gallery_image_id, 'mashup_media_9' );
                    $image_alt = get_post_meta( $gallery_image_id, '_wp_attachment_image_alt', true );
                    echo '<li class="swiper-slide"><figure><img src="' . esc_url( $mashup_var_src[0] ) . '" alt="' . esc_html( $image_alt ) . '"/></figure></li>';
                }
            }
            ?>
        </ul>
        <div class="swiper-button swiper-button-next"></div>
        <div class="swiper-button swiper-button-prev"></div>
    </div>
<?php } ?>
