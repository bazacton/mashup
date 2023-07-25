<?php
/**
 * @Recent posts widget Class
 *
 *
 */
if ( ! class_exists( 'mashup_latest_albums' ) ) {

    class mashup_latest_albums extends WP_Widget {

        /**
         * @init Recent posts Module
         *
         *
         */
        public function __construct() {
            global $mashup_var_static_text;

            parent::__construct(
                    'mashup_latest_albums', // Base ID
                    mashup_var_theme_text_srt( 'mashup_var_latest_albums' ), // Name
                    array( 'classname' => 'widget-recent-blog', 'description' => mashup_var_theme_text_srt( 'mashup_var_latest_albums_des' ), ) // Args
            );
        }

        /**
         * @Recent posts html form
         *
         *
         */
        function form( $instance ) {
            global $mashup_var_form_fields, $mashup_var_html_fields, $mashup_var_static_text;
            $strings = new mashup_theme_all_strings;
            $strings->mashup_short_code_strings();

            $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
            $title = $instance['title'];
            $album_category = isset( $instance['album_category'] ) ? esc_attr( $instance['album_category'] ) : '';
            $showcount = isset( $instance['showcount'] ) ? esc_attr( $instance['showcount'] ) : '';

            $mashup_opt_array = array(
                'name' => mashup_var_theme_text_srt( 'mashup_var_title_field' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr( $title ),
                    'id' => mashup_allow_special_char( $this->get_field_id( 'title' ) ),
                    'classes' => '',
                    'cust_id' => mashup_allow_special_char( $this->get_field_name( 'title' ) ),
                    'cust_name' => mashup_allow_special_char( $this->get_field_name( 'title' ) ),
                    'return' => true,
                    'required' => false
                ),
            );
            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
            if ( function_exists( 'mashup_show_all_cats' ) ) {
                $a_options = array();
                $a_options = mashup_show_all_cats( '', '', mashup_allow_special_char( $this->get_field_id( 'album_category' ) ), 'album-category', true );
//                echo '<pre>';
//		print_r($a_options);
//		echo '</pre>';
                $mashup_opt_array = array(
                    'name' => mashup_var_theme_text_srt( 'mashup_var_choose_category' ),
                    'desc' => '',
                    'hint_text' => '',
                    'echo' => true,
                    'field_params' => array(
                        'std' => $album_category,
                        'cust_name' => mashup_allow_special_char( $this->get_field_name( 'album_category' ) ),
                        'cust_id' => mashup_allow_special_char( $this->get_field_id( 'album_category' ) ),
                        'id' => '',
                        //'classes' => 'chosen-select cs-recentpost-width',
                        'options' => $a_options,
                        'return' => true,
                    ),
                );

                $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
            }
            $mashup_opt_array = array(
                'name' => mashup_var_theme_text_srt( 'mashup_var_num_post' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr( $showcount ),
                    'id' => mashup_allow_special_char( $this->get_field_id( 'showcount' ) ),
                    'classes' => '',
                    'cust_id' => mashup_allow_special_char( $this->get_field_name( 'showcount' ) ),
                    'cust_name' => mashup_allow_special_char( $this->get_field_name( 'showcount' ) ),
                    'return' => true,
                    'required' => false
                ),
            );
            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
        }

        /**
         * @Recent posts update form data
         *
         *
         */
        function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance['title'] = $new_instance['title'];
            $instance['album_category'] = $new_instance['album_category'];
            $instance['showcount'] = $new_instance['showcount'];
            return $instance;
        }

        /**
         * @Display Recent posts widget
         *
         */
        function widget( $args, $instance ) {
            global $mashup_node, $wpdb, $post, $mashup_var_static_text;

            extract( $args, EXTR_SKIP );
            $title = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );
            $title = htmlspecialchars_decode( stripslashes( $title ) );
            $album_category = $instance['album_category'];
            $showcount = empty( $instance['showcount'] ) ? ' ' : apply_filters( 'widget_title', $instance['showcount'] );

            if ( $instance['showcount'] == "" ) {
                $instance['showcount'] = '-1';
            }
            echo '<div class="widget widget-recent-post">';
            if ( ! empty( $title ) && $title <> ' ' ) {
                echo '<div class="widget-title">';
                echo '<h6 class="text-color">' . mashup_allow_special_char( $title ) . '</h6>';
                echo '</div>';
            }
            ?>
            <ul>
                <?php
                if ( isset( $album_category ) && $album_category <> '' ) {
                    $album_category = get_cat_name( $album_category );
                    $args = array( 'posts_per_page' => $showcount, 'post_type' => 'albums', 'cat' => $album_category, );
                } else {
                    $args = array( 'posts_per_page' => $showcount, 'post_type' => 'albums' );
                }
                $title_limit = 4;
                $custom_query = new WP_Query( $args );
                if ( $custom_query->have_posts() <> "" ) {
                    while ( $custom_query->have_posts() ) : $custom_query->the_post();
                        $mashup_post_id = get_the_ID();
                        $mashup_noimage = '';
                        $width = 75;
                        $height = 75;
                        $image_id = get_post_thumbnail_id( $mashup_post_id );
                        $image_url = mashup_attachment_image_src( $image_id, $width, $height );
                        if ( $image_url == '' ) {
                            $mashup_noimage = ' class="cs-noimage"';
                        }
                        ?>
                        <li>
                            <?php if ( $image_url != '' ) { ?>
                                <div class="img-holder">
                                    <figure> 
                                        <a href="<?php echo esc_url( get_permalink() ); ?>"><img  src="<?php echo esc_url( $image_url ); ?>" alt=""></a>
                                    </figure>
                                </div>
                            <?php } ?>
                            <div class="post-text">
                                <div class="post-title">
                                    <h4><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo wp_trim_words( get_the_title( $mashup_post_id ), $title_limit, '...' ); ?></a></h4>
                                </div>
                                <span><?php echo esc_html( mashup_var_theme_text_srt( 'mashup_var_by' ) );
                    the_author(); ?></span> </div>
                        </li>

                        <?php
                    endwhile;
                    wp_reset_postdata();
                } else {
                    echo '<p>' . esc_html(mashup_var_theme_text_srt( 'mashup_var_noresult_found' )) . '</p>';
                }
                ?>
            </ul>
            <?php
            echo '</div>';
        }

    }

}
    add_action('widgets_init', function() {
        register_widget('mashup_latest_albums');
    });
