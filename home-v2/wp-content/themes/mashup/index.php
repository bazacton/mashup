<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mashup
 */
get_header();
$var_arrays = array( 'post', 'current_user', 'mashup_user', 'mashup_num' );
$search_global_vars = MASHUP_VAR_GLOBALS()->globalizing( $var_arrays );
extract( $search_global_vars );
extract( $search_global_vars );
$mashup_var_options = MASHUP_VAR_GLOBALS()->theme_options();
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
    $mashup_col_class = "page-content col-lg-8 col-md-8 col-sm-12 col-xs-12";
} else if ( $mashup_default_sidebar == true ) {
    $mashup_col_class = "page-content col-lg-8 col-md-8 col-sm-12 col-xs-12";
} else {
    $mashup_col_class = "page-content-fullwidth col-lg-12 col-md-12 col-sm-12 col-xs-12";
}
$strings = new mashup_theme_all_strings;
$strings->mashup_theme_option_strings();
$mashup_sidebar = isset( $mashup_var_options['mashup_var_default_layout_sidebar'] ) ? $mashup_var_options['mashup_var_default_layout_sidebar'] : '';
?>
<div class="main-section">
    <div class="page-section">
        <!-- Container -->
        <div class="container">
            <!-- Row -->
            <div class="row"> 
                <?php
                if ( $mashup_layout == 'sidebar_left' ) {
                    if ( is_active_sidebar( mashup_get_sidebar_id( $mashup_sidebar ) ) ) {
                        ?>
                        <div class="page-sidebar col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <?php
                            if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( $mashup_sidebar ) ) : endif;
                            ?>
                        </div>
                        <?php
                    }
                }
                ?>
                <div class="<?php echo esc_html( $mashup_col_class ); ?>">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <?php
                            $mashup_cat_name = isset( $_GET['cat'] ) ? $_GET['cat'] : '';
                            $mashup_post_title = isset( $_GET['s'] ) ? $_GET['s'] : '';
                            $paged = isset( $_GET['page_id_all'] ) ? $_GET['page_id_all'] : 1;
                            $posts_per_page = get_option( 'posts_per_page' );

                            $args = array( 'post_type' => 'post',
                                'search_title' => $mashup_post_title,
                                'posts_per_page' => $posts_per_page,
                                'paged' => $paged,
                            );
                            if ( isset( $mashup_cat_name ) && $mashup_cat_name != "" ) {
                                $args['tax_query'] = array(
                                    array(
                                        'taxonomy' => 'category',
                                        'field' => 'slug',
                                        'terms' => $mashup_cat_name,
                                    )
                                );
                            }
                            $mashup_total = 0;
                            $query = new WP_Query( $args );
                            if ( $query->have_posts() ) {
                                while ( $query->have_posts() ) : $query->the_post();
                                    $post_id = $post->ID;
                                    $mashup_post_like_counter = get_post_meta( $post_id, 'mashup_post_like_counter', true );
                                    $comments_count = wp_count_comments( $post_id );
                                    $total_comments = $comments_count->total_comments;
                                    $cat = get_the_category( $post_id );
                                    ?>
                                    <div class="blog blog-list">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="blog-post">
                                                    <div class="img-holder">
                                                        <?php the_post_thumbnail( 'mashup_media_6' ); ?>
                                                    </div>
                                                    <div class="text-holder">
                                                        <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo get_the_title(); ?></a></h2>
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
                                    </div>
                                    <?php
                                endwhile;
                            } else {
                                echo esc_html( mashup_var_theme_text_srt( 'mashup_var_noresult_found' ) );
                            }
                            wp_reset_postdata();
                            ?>
                        </div>
                        <?php
                        $mashup_current_page = 1;
                        $mashup_totalposts = wp_count_posts()->publish;
                        if ( isset( $_GET['page_id_all'] ) ) {
                            $mashup_current_page = $_GET['page_id_all'];
                        }
                        $posts_per_page = get_option( 'posts_per_page' );
                        if ( isset( $mashup_cat_name ) && $mashup_cat_name != "" ) {
                            $posts_per_page = $mashup_total;
                            $mashup_totalposts = $mashup_total;
                        }
                        $mashup_pages = ceil( $mashup_totalposts / $posts_per_page );

                        $qrystr = '';
                        if ( isset( $_GET['page_id'] ) ) {
                            $qrystr .= "&amp;page_id=" . $_GET['page_id'];
                        }
                        if ( $wp_query->found_posts > get_option( 'posts_per_page' ) ) {
                            if ( function_exists( 'mashup_pagination' ) ) {

                                echo mashup_pagination( $query->found_posts, get_option( 'posts_per_page' ), $qrystr, 'Show Pagination', 'page_id_all' );
                            }
                        }
                        ?>
                    </div> <!--row-->
                </div> <!--col-class-div-end -->
                <?php
                if ( isset( $mashup_layout ) && $mashup_layout == 'sidebar_right' ) {

                    if ( is_active_sidebar( mashup_get_sidebar_id( $mashup_sidebar ) ) ) {
                        ?>
                        <div class="page-sidebar col-lg-4 col-md-4 col-sm-12 col-xs-12"><?php
                            if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( $mashup_sidebar ) ) :
                                ?><?php
                            endif;
                            ?>
                        </div>
                        <?php
                    }
                }if ( is_active_sidebar( 'sidebar-1' ) ) {
                    echo '<div class="page-sidebar col-lg-4 col-md-4 col-sm-12 col-xs-12">';
                    if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'sidebar-1' ) ) : endif;
                    echo '</div>';
                }
                ?>
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-section -->
</div><!-- .main-section -->
<?php
get_footer();
