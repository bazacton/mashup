<?php
/**
 * Template part for displaying post masonary format.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mashup
 */
 global $post;
$gallery_images = get_post_meta( $post->ID, 'mashup_var_post_detail_page_gallery', true );
$count = 0;
if ( is_array( $gallery_images ) && array_filter( $gallery_images ) ) {
    ?>
    <div class="blog-small-slider-holder swiper-container">
        <ul class="blog-small-slides swiper-wrapper">
            <div class="swiper-loader"><div class="slice"><div data-loader="ball-roll"></div></div></div>
            <li class="swiper-slide">
                <?php
                foreach ( $gallery_images as $key => $gallery_image_id ) {
                    if ( '' != $gallery_image_id ) {
                        $mashup_var_src = wp_get_attachment_image_src( $gallery_image_id, 'mashup_media_3' );
                        $image_alt = get_post_meta( $gallery_image_id, '_wp_attachment_image_alt', true );
                        echo (( $count % 2 ) == 0 && $count != 0 ) ? '</li><li class="swiper-slide">' : '';
                        echo '<a href="javascript:void(0);"><img src="' . esc_url( $mashup_var_src[0] ) . '" alt="' . esc_html( $image_alt ) . '" /></a>';
                        $count ++;
                    }
                }
                ?>
            </li>
        </ul>
        <div class="swiper-button swiper-button-next"></div>
        <div class="swiper-button swiper-button-prev"></div>
    </div>
    <?php
}
