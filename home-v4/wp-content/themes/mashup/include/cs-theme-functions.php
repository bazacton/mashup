<?php
/**
 * @Removing More... Link
 *
 */
if ( ! function_exists( 'mashup_remove_more_link_scroll' ) ) {

    function mashup_remove_more_link_scroll( $link ) {
        $link = preg_replace( '|#more-[0-9]+|', '', $link );
        return $link;
    }

    add_filter( 'the_content_more_link', 'mashup_remove_more_link_scroll' );
}

if ( ! function_exists( 'mashup_header_user_cart' ) ) {

    function mashup_header_user_cart( $html = '' ) {
        global $mashup_var_options;
        $mashup_var_woo_cart = isset( $mashup_var_options['mashup_var_woo_cart'] ) ? $mashup_var_options['mashup_var_woo_cart'] : '';
        if ( class_exists( 'WooCommerce' ) && $mashup_var_woo_cart == 'on' ) {
            global $woocommerce;
            $items = WC()->cart->get_cart();
            $html .= '<div class="user-cart"><ul><li><a href="javascript:void(0);"><i class="icon-shopping_cart"></i></a><ul>';
            if ( ! empty( $items ) ) {
                foreach ( $items as $item => $values ) {
                    $cart_product = $values['data']->get_data();
                    if ( isset( $cart_product->ID ) ) {
                      
                        $_product = wc_get_product( $cart_product->ID );
                        $price_html = $_product->get_price_html();

                        $attach_id = get_post_thumbnail_id( $cart_product->ID );
                        if ( $attach_id !== '' ) {
                            $attach_img = get_the_post_thumbnail( $cart_product->ID, 'thumbnail' );
                        } else {
                            $attach_img = wc_placeholder_img();
                        }
                        $html .= '
						<li class="item-' . $item . '">
							<div class="img-holder">
								<figure>
									<a href="' . get_permalink( $cart_product->ID ) . '">' . $attach_img . '</a>
								</figure>
							</div>
							<div class="text-holder">
								<div class="post-title">
									<h6><a href="' . get_permalink( $cart_product->ID ) . '">' . $cart_product->post_title . '</a></h6>
									<strong class="cart-price">' . $price_html . '</strong>
								</div>
								<a class="cart-close cart-close-' . $item . '" href="javascript:mashup_rem_wc_item(\'' . $item . '\', \'' . esc_url( admin_url( 'admin-ajax.php' ) ) . '\')"><i class="icon-cancel"></i></a>
							</div>
						</li>';
                    }
                }
            } else {
                $html .= '<li class="no-product">' . esc_html__( 'No Product in cart.', 'mashup' ) . '</li>';
            }
            $html .= '</ul></li></ul></div>';
            echo force_balance_tags( $html );
        }
    }

    add_action( 'mashup_header_user_option', 'mashup_header_user_cart', 10 );
}

if ( ! function_exists( 'mashup_remove_wc_cart_item' ) ) {

    function mashup_remove_wc_cart_item() {
        global $woocommerce;
        $cart = $woocommerce->cart;
        $prod_key = isset( $_POST['prod_key'] ) ? $_POST['prod_key'] : '';
        if ( $prod_key !== '' ) {
            $cart->remove_cart_item( $prod_key );
            echo json_encode( array( 'rem' => 'true' ) );
            die;
        }
        echo json_encode( array( 'rem' => 'false' ) );
        die;
    }

    add_action( 'wp_ajax_mashup_remove_wc_cart_item', 'mashup_remove_wc_cart_item' );
    add_action( 'wp_ajax_nopriv_mashup_remove_wc_cart_item', 'mashup_remove_wc_cart_item' );
}

/**
 * @Header Settings
 *
 */
if ( ! function_exists( 'mashup_var_header_settings' ) ) {

    function mashup_var_header_settings() {
        global $mashup_var_options;
        $mashup_var_favicon = isset( $mashup_var_options['mashup_var_custom_favicon'] ) ? $mashup_var_options['mashup_var_custom_favicon'] : '#';
        ?>
        <link rel="shortcut icon" href="<?php echo esc_url( $mashup_var_favicon ); ?>">
        <?php
    }

}


/* ----------------------------------------------------------------
  // @ Post Likes Counter
  /---------------------------------------------------------------- */
if ( ! function_exists( 'mashup_post_likes_count' ) ) {

    function mashup_post_likes_count() {
        $mashup_like_counter = get_post_meta( $_POST['post_id'], "mashup_post_like_counter", true );
        if ( ! isset( $_COOKIE["mashup_post_like_counter" . $_POST['post_id']] ) ) {
            setcookie( "mashup_post_like_counter" . $_POST['post_id'], 'true', time() + 86400, '/' );
            update_post_meta( $_POST['post_id'], 'mashup_post_like_counter', $mashup_like_counter + 1 );
        }
        $mashup_like_counter = get_post_meta( $_POST['post_id'], "mashup_post_like_counter", true );
        if ( ! isset( $mashup_like_counter ) or empty( $mashup_like_counter ) )
            $mashup_like_counter = 0;
        if ( isset( $_POST['view'] ) && 'blog_views' === $_POST['view'] ) {
            echo esc_html( $mashup_like_counter );
        } else if ( isset( $_POST['view'] ) && 'widgets_views' === $_POST['view'] ) {
            echo '<i class="icon-heart"></i>' . esc_html( $mashup_like_counter );
        } else {
            echo '<i class="icon-thumbs-up text-color"></i>' . mashup_allow_special_char( $mashup_like_counter );
        }
        die( 0 );
    }

    add_action( 'wp_ajax_mashup_post_likes_count', 'mashup_post_likes_count' );
    add_action( 'wp_ajax_nopriv_mashup_post_likes_count', 'mashup_post_likes_count' );
}

/**
 * @Custom excerpt funciton
 *
 */
if ( ! function_exists( 'mashup_var_the_excerpt' ) ) {

    function mashup_var_the_excerpt() {
        add_filter( 'excerpt_length', 'mashup_var_the_excerpt_length', 30 );
        the_excerpt();
    }

}

if ( ! function_exists( 'mashup_var_the_excerpt_length' ) ) {

    function mashup_var_the_excerpt_length( $length ) {
        global $mashup_var_options;
        $default_excerpt_length = isset( $mashup_var_options['mashup_var_excerpt_length'] ) ? $mashup_var_options['mashup_var_excerpt_length'] : '50';
        return $default_excerpt_length;
    }

}

if ( ! function_exists( 'mashup_var_wpdomashup_excerpt_more' ) ) {

    add_filter( 'excerpt_more', 'mashup_var_wpdomashup_excerpt_more' );

    function mashup_var_wpdomashup_excerpt_more( $more = '...' ) {
        return '...';
    }

}

/**
 * @Categories List by Post
 *
 */
if ( ! function_exists( 'mashup_var_cat_list' ) ):

    function mashup_var_cat_list( $mashup_var_post_id ) {
        if ( $mashup_var_post_id == '' ) {
            $mashup_var_post_id = get_the_id();
        }
        $mashup_var_cats_list = array();
        $mashup_var_cats = get_the_category( $mashup_var_post_id );
        if ( $mashup_var_cats != '' ):
            foreach ( $mashup_var_cats as $mashup_var_cat ) {
                $mashup_var_term_link = get_category_link( $mashup_var_cat->cat_ID );
                $mashup_var_cats_list[$mashup_var_cat->name] = $mashup_var_term_link;
            }
        endif;
        return $mashup_var_cats_list;
    }

endif;

/**
 * @Tag List by Post
 *
 */
if ( ! function_exists( 'mashup_var_tag_list' ) ) {

    function mashup_var_tag_list( $mashup_var_post_id ) {
        if ( $mashup_var_post_id == '' ) {
            $mashup_var_post_id = get_the_id();
        }
        $mashup_var_tags_list = array();
        $mashup_var_tags = get_the_tags( $mashup_var_post_id );
        if ( $mashup_var_tags != '' ) {
            foreach ( $mashup_var_tags as $mashup_var_tag ) {
                $mashup_var_tag_link = get_tag_link( $mashup_var_tag->term_id );
                $mashup_var_tags_list[$mashup_var_tag->name] = $mashup_var_tag_link;
            }
        }
        return $mashup_var_tags_list;
    }

}


/**
 * @Getting child Comments
 *
 */
if ( ! function_exists( 'mashup_var_comment' ) ):

    function mashup_var_comment( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        global $wpdb, $mashup_var_static_text;


        $mashup_var_childs = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(comment_parent) FROM $wpdb->comments WHERE comment_parent = %d", $comment->comment_ID ) );


        $GLOBALS['comment'] = $comment;
        $args['reply_text'] = '<i class="icon-reply2"></i> ' . mashup_var_theme_text_srt( 'mashup_var_reply' );
        $args['after'] = '';
        switch ( $comment->comment_type ) :
            case '' :
                ?>
                <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                    <div class="thumb-list" id="comment-<?php comment_ID(); ?>">
                        <div class="media-holder">
                            <figure><?php echo get_avatar( $comment, 40 ); ?></figure>
                        </div>
                        <div class="text-holder">
                            <div class="heading">
                                <h6><?php comment_author(); ?></h6>
                                <span class="post-date" datetime="<?php echo date( 'Y-m-d', strtotime( get_comment_time() ) ); ?>"><?php echo get_comment_date() . ' ' . get_comment_time(); ?></span>
                            </div>
                            <?php if ( $comment->comment_approved == '0' ) : ?>
                                <p><div class="comment-awaiting-moderation colr"><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_comment_awaiting' ) ); ?></div></p>
                            <?php endif; ?>
                            <?php comment_text(); ?>
                            <div class="reply-btn">
                                <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth ) ) ); ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    break;
                case 'pingback' :
                case 'trackback' :
                    ?>
                <li class="post pingback">
                    <p><?php comment_author_link(); ?><?php edit_comment_link( mashup_var_theme_text_srt( 'mashup_var_edit' ), ' ' ); ?></p>
                    <?php
                    break;
            endswitch;
        }

    endif;

    /**
     * @Replacing Reply Link Classes
     *
     */
    if ( ! function_exists( 'mashup_replace_reply_link_class' ) ) {


        function mashup_replace_reply_link_class( $class ) {
            $class = str_replace( "class='comment-reply-link", "class='comment-reply-link cs-color", $class );
            return $class;
        }

    }

    /**
     * @Generating Random String
     *
     */
    if ( ! function_exists( 'mashup_generate_random_string' ) ) {

        function mashup_generate_random_string( $length = 3 ) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            for ( $i = 0; $i < $length; $i ++ ) {
                $randomString .= $characters[rand( 0, strlen( $characters ) - 1 )];
            }
            return $randomString;
        }

    }

    if ( ! function_exists( 'mashup_allow_special_char' ) ) {

        function mashup_allow_special_char( $input = '' ) {
            $output = $input;
            return $output;
        }

    }


    if ( ! function_exists( 'mashup_section' ) ) {

        function mashup_section( $class, $title, $csheading ) {
            if ( $title <> '' ) {
                $mashup_html = '';
                $mashup_html .= '<div class="' . $class . '">
                    <h' . $csheading . '>' . esc_html( $title ) . '</h' . $csheading . '>
                    <div class="stripe-line"></div>
                </div>';
                return $mashup_html;
            }
        }

    }

    /**
     * @Getting Image Source by Post
     *
     */
    if ( ! function_exists( 'mashup_get_post_img_src' ) ) {

        function mashup_get_post_img_src( $post_id, $width, $height, $fixed_size = true ) {
            global $post;
            if ( has_post_thumbnail() ) {
                $image_id = get_post_thumbnail_id( $post_id );
                $image_url = wp_get_attachment_image_src( $image_id, array( $width, $height ), true );
                if ( ( $image_url[1] == $width and $image_url[2] == $height ) || true !== $fixed_size ) {
                    return $image_url[0];
                } else {
                    $image_url = wp_get_attachment_image_src( $image_id, "full", true );
                    return $image_url[0];
                }
            }
        }

    }
    /**
     * @Getting Image Source by Post
     *
     */
    if ( ! function_exists( 'mashup_get_post_img_src_search' ) ) {

        function mashup_get_post_img_src_search( $post_id, $width, $height ) {
            global $post;
            if ( has_post_thumbnail() ) {
                $image_id = get_post_thumbnail_id( $post_id );
                $image_url = wp_get_attachment_image_src( $image_id, array( $width, $height ), true );
                if ( $image_url[1] == $width and $image_url[2] == $height ) {
                    return $image_url[0];
                } else {
                    $image_url = wp_get_attachment_image_src( $image_id, "thumbnail", true );
                    return $image_url[0];
                }
            }
        }

    }

    /**
     * @Flex Slider
     *
     */
    if ( ! function_exists( 'mashup_post_flex_slider' ) ) {

        function mashup_post_flex_slider( $width, $height, $postid, $view ) {
            global $post, $mashup_node, $mashup_theme_options, $mashup_counter_node;
            $mashup_post_counter = rand( 40, 9999999 );
            $mashup_counter_node ++;

            if ( $view == 'post-list' ) {
                $viewMeta = 'mashup_post_list_gallery';
            } else {
                $viewMeta = $view;
            }

            $mashup_meta_slider_options = get_post_meta( "$postid", $viewMeta, true );
            $totaImages = '';
            ?>

            <div id="flexslider<?php echo esc_attr( $mashup_post_counter ); ?>" class="flexslider">
                <div class="flex-viewport">
                    <ul class="slides slides-1">
                        <?php
                        $mashup_counter = 1;

                        if ( $view == 'post' ) {
                            $sliderData = get_post_meta( $post->ID, 'mashup_post_detail_gallery', true );
                            $sliderData = explode( ',', $sliderData );
                            $totaImages = count( $sliderData );
                        } else if ( $view == 'post-list' ) {
                            $sliderData = get_post_meta( $post->ID, 'mashup_post_list_gallery', true );
                            $sliderData = explode( ',', $sliderData );
                            $totaImages = count( $sliderData );
                        } else {
                            $sliderData = get_post_meta( $post->ID, 'mashup_post_list_gallery', true );
                            $sliderData = explode( ',', $sliderData );
                            $totaImages = count( $sliderData );
                        }

                        foreach ( $sliderData as $as_node ) {
                            $image_url = mashup_attachment_image_src( (int) $as_node, $width, $height );
                            echo '<li>
                                    <figure>
                                        <img class="lazyload no-src" src="' . esc_url( $image_url ) . '" alt="">';
                            if ( isset( $as_node['title'] ) && $as_node['title'] != '' ) {
                                ?>         
                                <figcaption>
                                    <div class="container">
                                        <?php if ( $as_node['title'] <> '' ) { ?>
                                            <h2 class="colr">
                                                <?php
                                                if ( $as_node['link_url'] <> '' ) {
                                                    
                                                } else {

                                                    echo esc_attr( $as_node['title'] );
                                                }
                                                ?>
                                            </h2>
                                        <?php }
                                        ?>
                                    </div>
                                </figcaption>
                            <?php } ?>

                            </figure>
                            </li>
                            <?php
                            $mashup_counter ++;
                        }
                        ?>
                    </ul>
                </div>
            </div>

            <?php
        }

    }

    /**
     * @Getting Attachment Source by ID
     *
     */
    if ( ! function_exists( 'mashup_attachment_image_src' ) ) {

        function mashup_attachment_image_src( $attachment_id, $width, $height ) {
            $image_url = wp_get_attachment_image_src( $attachment_id, array( $width, $height ), true );
            if ( $image_url[1] == $width and $image_url[2] == $height )
                return $image_url[0];
            else
                $image_url = wp_get_attachment_image_src( $attachment_id, "full", true );
            $parts = explode( '/uploads/', $image_url[0] );
            if ( count( $parts ) > 1 )
                return $image_url[0];
        }

    }

    /**
     * @Comment Form Submit Button Filter
     *
     */
    if ( ! function_exists( 'mashup_awesome_comment_form_submit_button' ) ) {

        function mashup_awesome_comment_form_submit_button( $button ) {
            $button = '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="btn-holder"><input name="submit" type="submit" tabindex="5" value="' . __('Post Comment','mashup') . '" />
                            </div>
                        </div>';
            return $button;
        }

        add_filter( 'comment_form_submit_button', 'mashup_awesome_comment_form_submit_button' );
    }

    /**
     * @Social Media Sharing Function
     *
     */
    if ( ! function_exists( 'mashup_social_share_blog' ) ) {

        function mashup_social_share_blog( $default_icon = 'false', $title = 'true', $post_social_sharing_text = '' ) {

            global $mashup_var_options;
            $mashup_var_twitter = isset( $mashup_var_options['mashup_var_twitter_share'] ) ? $mashup_var_options['mashup_var_twitter_share'] : '';
            $mashup_var_facebook = isset( $mashup_var_options['mashup_var_facebook_share'] ) ? $mashup_var_options['mashup_var_facebook_share'] : '';
            $mashup_var_google_plus = isset( $mashup_var_options['mashup_var_google_plus_share'] ) ? $mashup_var_options['mashup_var_google_plus_share'] : '';
            $mashup_var_tumblr = isset( $mashup_var_options['mashup_var_tumblr_share'] ) ? $mashup_var_options['mashup_var_tumblr_share'] : '';
            $mashup_var_dribbble = isset( $mashup_var_options['mashup_var_dribbble_share'] ) ? $mashup_var_options['mashup_var_dribbble_share'] : '';
            $mashup_var_share = isset( $mashup_var_options['mashup_var_stumbleupon_share'] ) ? $mashup_var_options['mashup_var_stumbleupon_share'] : '';
            $mashup_var_stumbleupon = isset( $mashup_var_options['mashup_var_stumbleupon_share'] ) ? $mashup_var_options['mashup_var_stumbleupon_share'] : '';
            $mashup_var_sharemore = isset( $mashup_var_options['mashup_var_share_share'] ) ? $mashup_var_options['mashup_var_share_share'] : '';
            mashup_addthis_script_init_method();
            $html = '';

            $single = false;
            if ( is_single() ) {
                $single = true;
            }

            $path = trailingslashit( get_template_directory_uri() ) . "include/assets/images/";
            if ( $mashup_var_twitter == 'on' or $mashup_var_facebook == 'on' or $mashup_var_google_plus == 'on' or $mashup_var_tumblr == 'on' or $mashup_var_dribbble == 'on' or $mashup_var_share == 'on' or $mashup_var_stumbleupon == 'on' ) {


                if ( isset( $mashup_var_twitter ) && $mashup_var_twitter == 'on' ) {

                    if ( $single == true ) {
                        $html .='<li><a class="addthis_button_tweet"></a></li>';
                    } else {
                        $html .='<li><a class="addthis_button_tweet"></a></li>';
                    }
                }
                if ( isset( $mashup_var_facebook ) && $mashup_var_facebook == 'on' ) {
                    if ( $single == true ) {
                        $html .='<li><a class="addthis_button_facebook_share" fb:share:layout="button_count"></a></li>';
                    } else {
                        $html .='<li><a class="addthis_button_facebook_share" fb:share:layout="button_count"></a></li>';
                    }
                }
                if ( isset( $mashup_var_google_plus ) && $mashup_var_google_plus == 'on' ) {

                    if ( $single == true ) {
                        $html .='<li><a class="addthis_button_google_plusone" data-original-title="google+"></a></li>';
                    } else {
                        $html .='<li><a class="addthis_button_google_plusone" data-original-title="google+"></i></a></li>';
                    }
                }
                if ( isset( $mashup_var_tumblr ) && $mashup_var_tumblr == 'on' ) {

                    if ( $single == true ) {
                        $html .='<li><a class="addthis_button_tumblr" data-original-title="tumbler"></a></li>';
                    } else {
                        $html .='<li><a class="addthis_button_tumblr" data-original-title="tumbler"></a></li>';
                    }
                }

                if ( isset( $mashup_var_dribbble ) && $mashup_var_dribbble == 'on' ) {
                    if ( $single == true ) {
                        $html .='<li><a class="addthis_button_dribbble" data-original-title="dribble"></a></li>';
                    } else {
                        $html .='<li><a class="addthis_button_dribbble" data-original-title="dribble"></a></li>';
                    }
                }
                if ( isset( $mashup_var_stumbleupon ) && $mashup_var_stumbleupon == 'on' ) {
                    if ( $single == true ) {
                        $html .='<li><a class="addthis_button_stumbleupon" data-original-title="stumbleupon"></a></li>';
                    } else {
                        $html .='<li><a class="addthis_button_stumbleupon" data-original-title="stumbleupon"></a></li>';
                    }
                }
                if ( isset( $mashup_var_sharemore ) && $mashup_var_sharemore == 'on' ) {
                    $html .='<li><a class="cs-more addthis_button_compact"></a></li>';
                }
            }
            echo balanceTags( $html, true );
        }

    }

    /**
     * @Getting Attachment ID by URL
     *
     */
    if ( ! function_exists( 'mashup_var_get_image_id' ) ) {

        function mashup_var_get_image_id( $attachment_url ) {
            global $wpdb;
            $attachment_id = false;
            //  If there is no url, return. 
            if ( '' == $attachment_url )
                return;
            // Get the upload directory paths 
            $upload_dir_paths = wp_upload_dir();
            if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {
                //  If this is the URL of an auto-generated thumbnail, get the URL of the original image 
                $attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
                // Remove the upload path base directory from the attachment URL 
                $attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );

                $attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );
            }
            return $attachment_id;
        }

    }

    if ( ! function_exists( 'mashup_post_views_count' ) ) {

        function mashup_post_views_count( $postID ) {
            $mashup_views_counter = get_post_meta( $postID, "mashup_post_views_counter", true );
            $mashup_views_counter = $mashup_views_counter <> '' ? $mashup_views_counter : 0;
            if ( ! isset( $_COOKIE["mashup_post_views_counter" . $postID] ) ) {
                setcookie( "mashup_post_views_counter" . $postID, time() + 86400 );
                update_post_meta( $postID, 'mashup_post_views_counter', $mashup_views_counter + 1 );
            }
        }

    }
    /*
      password form
     */
    if ( ! function_exists( 'mashup_password_form' ) ) {

        function mashup_password_form() {
            global $post, $mashup_var_options, $mashup_var_form_fields;
            $cs_password_opt_array = array(
                'std' => '',
                'id' => '',
                'classes' => '',
                'extra_atr' => ' size="20"',
                'cust_id' => 'password_field',
                'cust_name' => 'post_password',
                'return' => true,
                'required' => false,
                'cust_type' => 'password',
            );

            $cs_submit_opt_array = array(
                'std' => mashup_var_theme_text_srt( 'mashup_submit_button_text' ),
                'id' => '',
                'classes' => 'bgcolr',
                'extra_atr' => '',
                'cust_id' => '',
                'cust_name' => 'Submit',
                'return' => true,
                'required' => false,
                'cust_type' => 'submit',
            );


            $label = 'pwbox-' . ( empty( $post->ID ) ? rand() : $post->ID );
            $o = '<div class="password_protected">
                <div class="protected-icon"><a href="#"><i class="icon-unlock-alt icon-4x"></i></a></div>
                <h3>' . mashup_var_theme_text_srt( 'mashup_var_password_form_message' ) . '</h3>';
            $o .= '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post"><label>'
                    . $mashup_var_form_fields->mashup_var_form_text_render( $cs_password_opt_array )
                    . '</label>'
                    . $mashup_var_form_fields->mashup_var_form_text_render( $cs_submit_opt_array )
                    . '</form>
            </div>';
            return $o;
        }

    }