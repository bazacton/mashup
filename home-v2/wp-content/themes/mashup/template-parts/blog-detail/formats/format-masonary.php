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
    <div class="blog-masonary-slider-holder swiper-container">
        <div class="swiper-loader"><div class="slice"><div data-loader="ball-roll"></div></div></div>
        <ul class="blog-masonary-slides swiper-wrapper">
            <?php
            echo '<li class="swiper-slide">';
            foreach ( $gallery_images as $key => $gallery_image_id ) {
                if ( '' != $gallery_image_id ) {
                    if ( ( $count % 2 ) == 0 && $count != 0 ) {
                        echo '</li><li class="swiper-slide">';
                    }
                    $image_alt = get_post_meta( $gallery_image_id, '_wp_attachment_image_alt', true );
                    echo '<a href="javascript:void(0);"><img src="' . wp_get_attachment_url( $gallery_image_id ) . '" alt="' . esc_html( $image_alt ) . '" /></a>';
                    $count ++;
                }
            }
            echo '</li>';
            ?>
        </ul>
        <div class="swiper-button swiper-button-next"></div>
        <div class="swiper-button swiper-button-prev"></div>
    </div>
    <?php
}