<?php
/**
 * The template for displaying image attachments
 *
 * @package WordPress
 * @subpackage Mashup
 * @since Mashup
 */
get_header();

if ( isset( $mashup_var_options['mashup_var_excerpt_length'] ) && $mashup_var_options['mashup_var_excerpt_length'] <> '' ) {
    $default_excerpt_length = $mashup_var_options['mashup_var_excerpt_length'];
} else {
    $default_excerpt_length = '60';
}
$mashup_layout = isset( $mashup_var_options['mashup_var_default_page_layout'] ) ? $mashup_var_options['mashup_var_default_page_layout'] : '';
$mashup_default_sidebar = false;
if ( $mashup_layout == '' ) {
    $mashup_default_sidebar = true;
}
if ( isset( $mashup_layout ) && ($mashup_layout == "sidebar_left" || $mashup_layout == "sidebar_right") ) {
    $mashup_col_class = "page-content col-lg-9 col-md-9 col-sm-12 col-xs-12";
} else if ( $mashup_default_sidebar == true ) {
    $mashup_col_class = "page-content col-lg-9 col-md-9 col-sm-12 col-xs-12";
} else {
    $mashup_col_class = "page-content-fullwidth col-lg-12 col-md-12 col-sm-12 col-xs-12";
}
$strings = new mashup_theme_all_strings;
$strings->mashup_theme_option_strings();
$mashup_sidebar = isset( $mashup_var_options['mashup_var_default_layout_sidebar'] ) ? $mashup_var_options['mashup_var_default_layout_sidebar'] : '';
$mashup_blog_excerpt_theme_option = isset( $mashup_var_options['mashup_var_excerpt_length'] ) ? $mashup_var_options['mashup_var_excerpt_length'] : '255';
?>
<div class="main-section">
    <div class="page-section">
        <!-- Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <?php if ( $mashup_layout == 'sidebar_left' ) { ?>
                    <div class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <?php
                        if ( is_active_sidebar( mashup_get_sidebar_id( $mashup_sidebar ) ) ) {
                            if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( $mashup_sidebar ) ) : endif;
                        }
                        ?>
                    </div>
                <?php } ?>
                <div class="<?php echo esc_html( $mashup_col_class ); ?>">
                    <?php
                    // Start the loop.
                    while ( have_posts() ) : the_post();
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <nav id="image-navigation" class="navigation image-navigation">
                                <div class="nav-links">
                                    <div class="nav-previous"><?php previous_image_link( false, mashup_var_theme_text_srt( 'mashup_var_page_previous' ) ); ?></div>
                                    <div class="nav-next"><?php next_image_link( false, mashup_var_theme_text_srt( 'mashup_var_page_next' ) ); ?></div>
                                </div><!-- .nav-links -->
                            </nav><!-- .image-navigation -->
                            <header class="entry-header">
                                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                            </header><!-- .entry-header -->
                            <div class="entry-content">
                                <div class="entry-attachment">
                                    <?php
                                    /**
                                     * Filter the default mashup image attachment size.
                                     *
                                     * @since Traveladvisor
                                     *
                                     * @param string $image_size Image size. Default 'large'.
                                     */
                                    $image_size = apply_filters( 'mashup_attachment_size', 'large' );
                                    echo wp_get_attachment_image( get_the_ID(), $image_size );
                                    ?>
                                    <?php
                                    if ( function_exists( 'mashup_excerpt' ) ):
                                        mashup_excerpt( 'entry-caption' );
                                    endif;
                                    ?>
                                </div><!-- .entry-attachment -->
                                <?php
                                the_content();
                                wp_link_pages( array(
                                    'before' => '<div class="page-links"><span class="page-links-title">' . mashup_var_theme_text_srt( 'mashup_var_pages' ) . '</span>',
                                    'after' => '</div>',
                                    'link_before' => '<span>',
                                    'link_after' => '</span>',
                                    'pagelink' => '<span class="screen-reader-text">' . mashup_var_theme_text_srt( 'mashup_var_page' ) . ' </span>%',
                                    'separator' => '<span class="screen-reader-text">, </span>',
                                ) );
                                ?>
                            </div><!-- .entry-content -->
                            <footer class="entry-footer">
                                <?php
                                if ( function_exists( 'mashup_entry_meta' ) ):
                                    mashup_entry_meta();
                                endif;
                                ?>
                                <?php
                                // Retrieve attachment metadata.
                                $metadata = wp_get_attachment_metadata();
                                if ( $metadata ) {
                                    printf( '<span class="full-size-link"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>', esc_html_x( 'Full size', 'Used before full size attachment link.', 'mashup' ), esc_url( wp_get_attachment_url() ), absint( $metadata['width'] ), absint( $metadata['height'] )
                                    );
                                }
                                edit_post_link(
                                        sprintf(
                                                /* translators: %s: Name of current post */
                                                esc_html__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'mashup' ), get_the_title()
                                        ), '<span class="edit-link">', '</span>'
                                );
                                ?>
                            </footer><!-- .entry-footer -->
                        </article><!-- #post-## -->
                        <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) {
                            comments_template();
                        }
                        // Parent post navigation.
                        the_post_navigation( array(
                            'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'mashup' ),
                        ) );
                    // End the loop.
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
                <?php
                if ( isset( $mashup_layout ) && $mashup_layout == 'sidebar_right' ) {
                    if ( is_active_sidebar( mashup_get_sidebar_id( $mashup_sidebar ) ) ) {
                        ?>
                        <div class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php
                            if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( $mashup_sidebar ) ) :
                                ?><?php
                            endif;
                            ?>
                        </div>
                        <?php
                    }
                }
                if ( is_active_sidebar( 'sidebar-1' ) ) {
                    echo '<div class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">';
                    if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'sidebar-1' ) ) : endif;
                    echo '</div>';
                }
                ?>
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-section -->
</div><!-- .main-section -->
<?php get_footer(); ?>
