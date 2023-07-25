<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 */
get_header();
$var_arrays = array( 'post', 'mashup_var_static_text' );
$search_global_vars = MASHUP_VAR_GLOBALS()->globalizing( $var_arrays );
extract( $search_global_vars );
$var_arrays = array( 'post' );
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
?>   
<div class="main-section">
    <div class="page-section">
        <!-- Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">     
                <!--Left Sidebar Starts-->
                <?php if ( $mashup_layout == 'sidebar_left' ) { ?>
                    <div class="page-sidebar left col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <?php
                        if ( is_active_sidebar( mashup_get_sidebar_id( $mashup_sidebar ) ) ) {
                            if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( $mashup_sidebar ) ) : endif;
                        }
                        ?>
                    </div>
                <?php } ?>
                <div class= "<?php echo esc_html( $mashup_col_class ); ?>">
                    <?php
                    if ( category_description() || is_tag() ) {
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
                    }
                    if ( empty( $_GET['page_id_all'] ) ) {
                        $_GET['page_id_all'] = 1;
                    }
                    if ( ! isset( $_GET["s"] ) ) {
                        $_GET["s"] = '';
                    }
                    $description = 'yes';
                    $taxonomy = 'category';
                    $taxonomy_tag = 'post_tag';
                    $args_cat = array();
                    if ( is_author() ) {
                        $args_cat = array( 'author' => $wp_query->query_vars['author'] );
                        $post_type = array( 'post' );
                    } elseif ( is_date() ) {
                        if ( is_month() || is_year() || is_day() || is_time() ) {
                            $cs_month = $wp_query->query_vars['monthnum'];
                            $cs_year = $wp_query->query_vars['year'];
                            $cs_month = $cs_year . "0" . $cs_month;
                            $args_cat = array( 'm' => $cs_month, 'year' => $wp_query->query_vars['year'], 'day' => $wp_query->query_vars['day'], 'hour' => $wp_query->query_vars['hour'], 'minute' => $wp_query->query_vars['minute'], 'second' => $wp_query->query_vars['second'] );
                        }
                    } else if ( (isset( $wp_query->query_vars['taxonomy'] ) && ! empty( $wp_query->query_vars['taxonomy'] ) ) ) {
                        $taxonomy = $wp_query->query_vars['taxonomy'];
                        $taxonomy_category = '';
                        if ( isset( $wp_query->query_vars[$taxonomy] ) ) {
                            $taxonomy_category = $wp_query->query_vars[$taxonomy];
                        }
                        if ( isset( $wp_query->query_vars['taxonomy'] ) && $wp_query->query_vars['taxonomy'] == 'service-category' ) {
                            $args_cat = array( $taxonomy => "$taxonomy_category" );
                            $post_type = 'service';
                        } else if ( isset( $wp_query->query_vars['taxonomy'] ) && $wp_query->query_vars['taxonomy'] == 'stylist-category' ) {
                            $args_cat = array( $taxonomy => "$taxonomy_category" );
                            $post_type = 'stylist';
                        } else {
                            $taxonomy = 'category';
                            $args_cat = array();
                            $post_type = 'post';
                        }
                    } else if ( is_category() ) {
                        $taxonomy = 'category';
                        $args_cat = array();
                        $category_blog = '';
                        if ( isset( $wp_query->query_vars['cat'] ) ) {
                            $category_blog = $wp_query->query_vars['cat'];
                        }
                        $post_type = 'post';
                        $args_cat = array( 'cat' => "$category_blog" );
                    } else if ( is_tag() ) {
                        $taxonomy = 'category';
                        $args_cat = array();
                        $tag_blog = '';
                        if ( isset( $wp_query->query_vars['tag'] ) ) {
                            $tag_blog = $wp_query->query_vars['tag'];
                        }
                        $post_type = 'post';
                        $args_cat = array( 'tag' => "$tag_blog" );
                    } else {
                        $taxonomy = 'category';
                        $args_cat = array();
                        $post_type = 'post';
                    }
                    $args = array(
                        'post_type' => $post_type,
                        'paged' => $_GET['page_id_all'],
                        'post_status' => 'publish',
                        'order' => 'DESC',
                    );
                    $args = array_merge( $args_cat, $args );
                    $custom_query = new WP_Query( $args );
                    if ( have_posts() ) :
                        if ( empty( $_GET['page_id_all'] ) ) {
                            $_GET['page_id_all'] = 1;
                        }
                        if ( ! isset( $_GET["s"] ) ) {
                            $_GET["s"] = '';
                        }
                        while ( $custom_query->have_posts() ) : $custom_query->the_post();
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
                        wp_reset_postdata();
                    else:
                        if ( function_exists( 'mashup_no_result_found' ) ) {
                            mashup_no_result_found();
                        }
                    endif;
                    $qrystr = '';
                    if ( isset( $_GET['page_id'] ) ) {
                        $qrystr .= "&amp;page_id=" . $_GET['page_id'];
                    }
                    if ( isset( $_GET['specialisms'] ) ) {
                        $qrystr .= "&specialisms=" . $_GET['specialisms'];
                    }
                    if ( $wp_query->found_posts > get_option( 'posts_per_page' ) ) {
                        if ( function_exists( 'mashup_pagination' ) ) {
                            echo mashup_pagination( $custom_query->found_posts, get_option( 'posts_per_page' ), $qrystr, 'Show Pagination', 'page_id_all' );
                        }
                    }
                    ?>
                </div>
                <?php
                if ( isset( $mashup_layout ) and $mashup_layout == 'sidebar_right' ) {
                    if ( is_active_sidebar( mashup_get_sidebar_id( $mashup_sidebar ) ) ) {
                        echo '<div class="page-sidebar right col-md-4 col-lg-4 col-sm-12 col-xs-12">';
                        if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( $mashup_sidebar ) ) : endif;
                        echo '</div>';
                    }
                }
                if ( is_active_sidebar( 'sidebar-1' ) ) {
                    echo '<div class="page-sidebar col-lg-4 col-md-4 col-sm-12 col-xs-12">';
                    if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'sidebar-1' ) ) : endif;
                    echo '</div>';
                }
                ?>
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-section -->
</div><!-- .main-section -->

<?php get_footer(); ?>