<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Mashup
 * @since MashUp 1.0
 */
get_header();
$var_arrays = array( 'post', 'mashup_var_static_text' );
$archive_global_vars = MASHUP_VAR_GLOBALS()->globalizing( $var_arrays );
extract( $archive_global_vars );
$mashup_var_options = MASHUP_VAR_GLOBALS()->theme_options();
if ( isset( $mashup_var_options['mashup_var_excerpt_length'] ) && $mashup_var_options['mashup_var_excerpt_length'] <> '' ) {
    $default_excerpt_length = $mashup_var_options['mashup_var_excerpt_length'];
} else {
    $default_excerpt_length = '60';
}
$mashup_layout = isset( $mashup_var_options['mashup_var_default_page_layout'] ) ? $mashup_var_options['mashup_var_default_page_layout'] : '';

if ( isset( $mashup_layout ) && ($mashup_layout == "sidebar_left" || $mashup_layout == "sidebar_right") ) {
    $mashup_col_class = "page-content col-lg-8 col-md-8 col-sm-12 col-xs-12";
} else {
    $mashup_col_class = "page-content-fullwidth col-lg-12 col-md-12 col-sm-12 col-xs-12";
}
if ( ! get_option( 'mashup_var_options' ) && is_active_sidebar( 'sidebar-1' ) ) {
    $mashup_col_class = "page-content col-lg-8 col-md-8 col-sm-12 col-xs-12";
    $mashup_def_sidebar = 'sidebar-1';
}
$mashup_sidebar = isset( $mashup_var_options['mashup_var_default_layout_sidebar'] ) ? $mashup_var_options['mashup_var_default_layout_sidebar'] : '';
$mashup_tags_name = 'post_tag';
$mashup_categories_name = 'category';
$width = '350';
$height = '210';
if ( ! isset( $_GET['page_id_all'] ) )
    $_GET['page_id_all'] = 1;
?>   

<div class="main-section">
    <div class="page-section">
        <!-- Container -->
        <div class="container">
            <!-- Row -->
            <!--Left Sidebar Starts-->
            <?php if ( $mashup_layout == 'sidebar_left' ) { ?>
                <div class="page-sidebar col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <?php
                    if ( is_active_sidebar( mashup_get_sidebar_id( $mashup_sidebar ) ) ) {
                        if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( $mashup_sidebar ) ) : endif;
                    }
                    ?>
                </div>
            <?php } ?>
            <!--Left Sidebar End-->
            <!-- Page Detail Start -->
            <div class="row">
                <div class= "<?php echo esc_html( $mashup_col_class ); ?>">
                    <div class="row">
                        <?php
                        if ( is_author() ) {
                            $var_arrays = array( 'author' );
                            $archive_global_vars = MASHUP_VAR_GLOBALS()->globalizing( $var_arrays );
                            extract( $archive_global_vars );
                            $userdata = get_userdata( $author );
                        }
                        if ( category_description() || is_tag() || (is_author() && isset( $userdata->description ) && ! empty( $userdata->description )) ) {
                            echo '<div class="widget evorgnizer">';
                            if ( is_author() ) {
                                ?>
                                <figure>
                                    <a>
                                        <?php
                                        echo get_avatar( $userdata->user_email, apply_filters( 'mashup_author_bio_avatar_size', 70 ) );
                                        ?>
                                    </a>
                                </figure>
                                <div class="left-sp">
                                    <h5><a><?php echo esc_attr( $userdata->display_name ); ?></a></h5>
                                    <p><?php echo balanceTags( $userdata->description, true ); ?></p>
                                </div>
                                <?php
                            } elseif ( is_category() ) {
                                $category_description = category_description();
                                if ( ! empty( $category_description ) ) {
                                    ?>
                                    <div class="left-sp">
                                        <p><?php echo category_description(); ?></p>
                                    </div>
                                <?php } ?>
                                <?php
                            } elseif ( is_tag() ) {
                                $tag_description = tag_description();
                                if ( ! empty( $tag_description ) ) {
                                    ?>
                                    <div class="left-sp">
                                        <p><?php echo apply_filters( 'tag_archive_meta', $tag_description ); ?></p>
                                    </div>
                                    <?php
                                }
                            }
                            echo '</div>';
                        }
                        if ( have_posts() ) {

                            while ( have_posts() ) : the_post();
                                $post_id = $post->ID;
                                $mashup_post_like_counter = get_post_meta( $post_id, 'mashup_post_like_counter', true );
                                $comments_count = wp_count_comments( $post_id );
                                $total_comments = $comments_count->total_comments;
                                $cat = get_the_category( $post_id );
                                ?>
                                <div class="blog blog-list">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="blog-post">
                                            <div class="img-holder">
                                                <?php the_post_thumbnail( 'mashup_media_6' ); ?>
                                            </div>
                                            <div class="text-holder">
                                                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                                                <div class="post-option">

                                                    <?php if ( $cat ) { ?>
                                                        <ul class="post-catagories">
                                                            <?php
                                                            $total = count( $cat );
                                                            $count = 0;
                                                            foreach ( $cat as $key => $value ) {
                                                                $cat_meta = get_term_meta( $value->term_id, 'cat_meta_data', true );
                                                                $cat_id = $value->term_id;
                                                                $cat_link = get_term_link( $cat_id );
                                                                $span_style = '';

                                                                echo '<li><a href="' . esc_url( $cat_link ) . '">';
                                                                if ( $count == 0 ) {
                                                                    echo '<i class="icon-music3"></i>';
                                                                }
                                                                echo esc_html( $value->name ) . '</a></li>';
                                                                $count ++;
                                                                if ( $count < $total ) {
                                                                    echo esc_html__( '/ ', 'mashup' );
                                                                }
                                                            }
                                                            ?>
                                                        </ul>
                                                    <?php } ?>

                                                    <span class="post-date">
                                                        <i class=" icon-date_range"></i><?php echo get_the_date(); ?></span>

                                                    <span class="post-comment">
                                                        <?php $comment_icon = '<i class=" icon-comment-o"></i>'; ?>
                                                        <?php comments_popup_link( $comment_icon . '0', $comment_icon . '1', $comment_icon . '%', 'comments-link', '' ); ?></span>

                                                </div>
                                                <p> <?php echo esc_html( mashup_get_excerpt( '', '' ) ); ?></p>
                                                <a class="btn-read-more" href="<?php the_permalink(); ?>"><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_readmore_text_capital' ) ); ?><i class=" icon-arrow-right3"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                        } else {
                            get_template_part( 'template-parts/content-none' );
                        }
                        $qrystr = '';

                        if ( $wp_query->found_posts > get_option( 'posts_per_page' ) ) {
                            if ( isset( $_GET['s'] ) )
                                $qrystr = "&amp;s=" . $_GET['s'];
                            if ( isset( $_GET['page_id'] ) )
                                $qrystr .= "&amp;page_id=" . $_GET['page_id'];
                            echo mashup_pagination( $wp_query->found_posts, get_option( 'posts_per_page' ), $qrystr, mashup_var_theme_text_srt( 'mashup_var_search_pagination' ), 'page_id_all' );
                        }
                        ?>
                    </div>
                </div>
                <?php
                if ( isset( $mashup_layout ) and $mashup_layout == 'sidebar_right' ) {
                    if ( is_active_sidebar( mashup_get_sidebar_id( $mashup_sidebar ) ) ) {
                        echo '<div class="page-sidebar right col-lg-4 col-md-4 col-sm-12 col-xs-12">';
                        if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( $mashup_sidebar ) ) :
                            ?><?php
                        endif;
                        echo '</div>';
                    }
                }
                if ( is_active_sidebar( 'sidebar-1' ) ) {
                    echo '<div class="page-sidebar col-lg-4 col-md-4 col-sm-12 col-xs-12">';
                    if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'sidebar-1' ) ) : endif;
                    echo '</div>';
                }
                ?>
            </div>

        </div><!-- .container -->
    </div><!-- .page-section -->
</div><!-- .main-section -->

<?php get_footer(); ?>