<?php
/**
 * Create UI for page builder and handle saving of page builder data.
 *
 * @package mashup
 */
global $post, $mashup_count_node, $mashup_xmlObject;
add_action( 'add_meta_boxes', 'mashup_page_bulider_add' );

/**
 * Adding Meta box with Frame static text.
 */
if ( ! function_exists( 'mashup_page_bulider_add' ) ) {

    function mashup_page_bulider_add() {
        global $mashup_var_frame_static_text;
        $mashup_var_page_builder = isset( $mashup_var_frame_static_text['mashup_var_page_builder'] ) ? $mashup_var_frame_static_text['mashup_var_page_builder'] : '';
        add_meta_box( 'id_page_builder', mashup_var_frame_text_srt( 'mashup_var_page_builder' ), 'mashup_page_bulider', 'page', 'normal', 'high' );
    }

}

if ( ! function_exists( 'mashup_edit_form_after_title_callback' ) ) {

    function mashup_edit_form_after_title_callback() {
        // get globals vars
        global $post;
        if ( isset( $post ) && $post->post_type == 'page' ) {
            $mashup_page_bulider = get_post_meta( $post->ID, "mashup_page_builder", true );
            $builder_active = 0;
            if ( ! empty( $mashup_page_bulider ) && $mashup_page_bulider <> "" ) {
                $mashup_xmlObject = new stdClass();
                $mashup_xmlObject = new SimpleXMLElement( $mashup_page_bulider );
                $builder_active = $mashup_xmlObject->builder_active;
            }
            ob_start();
            $value = ($builder_active == '1') ? mashup_var_frame_text_srt( 'mashup_var_classic_editor' ) : mashup_var_frame_text_srt( 'mashup_var_page_builder' );
            ?>
            <input type="button" value="<?php echo $value; ?>" style="float:none;" class="btn-toggle-page-builder">
            <style type="text/css">
                #titlediv{
                    margin-bottom: 20px;
                }
                <?php if ( $builder_active == '1' ) { ?>
                    #post-body-content {
                        margin-bottom: 10px;
                    }
                <?php } ?>
                #wp-content-editor-tools {
                    padding-top: 10px;
                }
                <?php if ( $builder_active == '1' ) { ?>
                    #postdivrich {
                        display: none;
                    }
                    #id_page_builder {
                        display: block;
                    }
                <?php } else { ?>
                    #postdivrich {
                        display: block;
                    }
                    #id_page_builder {
                        display: none;
                    }
                <?php } ?>
            </style>
            <script type="text/javascript">
                (function ($) {
                    $(function () {
                        var is_builder_active = "<?php echo ($builder_active == '1') ? 'true' : 'false'; ?>";
                        //is_builder_active == "true" ? toggle_builder("#id_page_builder", "#postdivrich") : toggle_builder("#postdivrich", "#id_page_builder");
                        $(".btn-toggle-page-builder").click(function () {
                            if (is_builder_active == "true") {
                                toggle_builder("#postdivrich", "#id_page_builder");
                                $(this).val("<?php echo mashup_var_frame_text_srt( 'mashup_var_page_builder' ); ?>");
                                is_builder_active = "false";
                                $('input[name="builder_active"]').val('0');
                                $("#post-body-content").css("margin-bottom", "20px");
                            } else {
                                toggle_builder("#id_page_builder", "#postdivrich");
                                $(this).val("<?php echo mashup_var_frame_text_srt( 'mashup_var_classic_editor' ); ?>");
                                is_builder_active = "true";
                                $('input[name="builder_active"]').val('1');
                                $("#post-body-content").css("margin-bottom", "10px");
                            }
                        });

                        function toggle_builder(active, inactive) {
                            $(inactive).fadeOut("fast", function () {
                                $(active).fadeIn();
                            });
                            window.editorExpand && window.editorExpand.off && window.editorExpand.off();
                        }
                    });
                })(jQuery);
            </script>
            <?php
            $output = ob_get_clean();
            echo $output;
        }
    }

    add_action( 'edit_form_after_title', 'mashup_edit_form_after_title_callback' );
}

/**
 * @Starting Page Builder
 *
 */
if ( ! function_exists( 'mashup_page_bulider' ) ) {

    function mashup_page_bulider( $post ) {
        global $post, $mashup_xmlObject, $mashup_node, $mashup_count_node, $post, $column_container, $coloum_width, $mashup_var_frame_static_text;
        wp_reset_query();
        $postID = $post->ID;
        $count_widget = 0;
        $page_title = '';
        $page_content = '';
        $page_sub_title = '';
        $builder_active = 0;
        $mashup_page_bulider = get_post_meta( $post->ID, "mashup_page_builder", true );
        if ( ! empty( $mashup_page_bulider ) && $mashup_page_bulider <> "" ) {
            $mashup_xmlObject = new stdClass();
            $mashup_xmlObject = new SimpleXMLElement( $mashup_page_bulider );
            $builder_active = $mashup_xmlObject->builder_active;
        }
        ?>
        <input type="hidden" name="builder_active" value="<?php echo esc_html( $builder_active ) ?>" />
        <div class="clear"></div>
        <div  class = "theme-wrap" id="add_page_builder_item" data-ajax-url="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ) ?>">
            <div id="mashup_shortcode_area"></div>  
            <?php
            if ( $mashup_page_bulider <> "" ) {
                if ( isset( $mashup_xmlObject->page_title ) )
                    $page_title = $mashup_xmlObject->page_title;
                if ( isset( $mashup_xmlObject->page_content ) )
                    $page_content = $mashup_xmlObject->page_content;
                if ( isset( $mashup_xmlObject->page_sub_title ) )
                    $page_sub_title = $mashup_xmlObject->page_sub_title;
                foreach ( $mashup_xmlObject->column_container as $column_container ) {
                    mashup_column_pb( 1 );
                }
            }
            ?>

        </div>
        <div class="clear"></div>
        <div class="add-widget"> <span class="addwidget"> <a href="javascript:ajaxSubmit('mashup_column_pb','1','column_full')"><i class="icon-plus-circle"></i> <?php echo mashup_var_frame_text_srt( 'mashup_var_add_page_section' ); ?> </a> </span> 
            <div id="loading" class="builderload"></div>
            <div class="clear"></div>
            <input type="hidden" name="page_builder_form" value="1" />
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <script type="text/javascript">
            var count_widget = <?php echo absint( $count_widget ); ?>;
            jQuery(function () {
                jQuery(".draginner").sortable({
                    connectWith: '.draginner',
                    handle: '.column-in',
                    start: function (event, ui) {
                        jQuery(ui.item).css({"width": "25%"});
                    },
                    cancel: '.draginner .poped-up,#confirmOverlay',
                    revert: false,
                    receive: function (event, ui) {
                        mashup_frame_callme();
                    },
                    placeholder: "ui-state-highlight",
                    forcePlaceholderSize: true
                });
                jQuery("#add_page_builder_item").sortable({
                    handle: '.column-in',
                    connectWith: ".columnmain",
                    cancel: '.column_container,.draginner,#confirmOverlay',
                    revert: false,
                    placeholder: "ui-state-highlight",
                    forcePlaceholderSize: true
                });

            });
            function ajaxSubmit(action, total_column, column_class) {
                counter++;
                count_widget++;
                jQuery('.builderload').html("<img src='<?php echo mashup_var_frame()->plugin_url() . 'assets/images/ajax_loading.gif' ?>' />");
                var newCustomerForm = "action=" + action + '&counter=' + counter + '&total_column=' + total_column + '&column_class=' + column_class + '&postID=<?php echo esc_js( $postID ); ?>';

                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo admin_url( 'admin-ajax.php' ) ?>",
                    data: newCustomerForm,
                    success: function (data) {
                        jQuery('.builderload').html("");
                        jQuery("#add_page_builder_item").append(data);
                        jQuery('div.cs-drag-slider').each(function () {
                            var _this = jQuery(this);
                            _this.slider({
                                range: 'min',
                                step: _this.data('slider-step'),
                                min: _this.data('slider-min'),
                                max: _this.data('slider-max'),
                                value: _this.data('slider-value'),
                                slide: function (event, ui) {
                                    jQuery(this).parents('li.to-field').find('.cs-range-input').val(ui.value)
                                }
                            });
                        });
                        jQuery('.bg_color').wpColorPicker();
                        jQuery(".draginner").sortable({
                            connectWith: '.draginner',
                            handle: '.column-in',
                            cancel: '.draginner .poped-up,#confirmOverlay',
                            revert: false,
                            start: function (event, ui) {
                                jQuery(ui.item).css({"width": "25%"})
                            },
                            receive: function (event, ui) {
                                mashup_frame_callme();
                            },
                            placeholder: "ui-state-highlight",
                            forcePlaceholderSize: true
                        });

                    }
                });

            }

            function mashup_frame_ajax_widget(action, id) {
                mashup_frame_loader();
                counter++;
                var newCustomerForm = "action=" + action + '&counter=' + counter;
                var edit_url = action + counter;

                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo admin_url( 'admin-ajax.php' ) ?>",
                    data: newCustomerForm,
                    success: function (data) {
                        jQuery("#counter_" + id).append(data);
                        jQuery("#" + action + counter).append('<input type="hidden" name="mashup_widget_element_num[]" value="form" />');
                        jQuery('.bg_color').wpColorPicker();
                        jQuery(".draginner").sortable({
                            connectWith: '.draginner',
                            handle: '.column-in',
                            cancel: '.draginner .poped-up,#confirmOverlay',
                            revert: false,
                            receive: function (event, ui) {
                                mashup_frame_callme();
                            },
                            placeholder: "ui-state-highlight",
                            forcePlaceholderSize: true
                        });
                        mashup_frame_removeoverlay("composer-" + id, "append");
                        jQuery('div.cs-drag-slider').each(function () {
                            var _this = jQuery(this);
                            _this.slider({
                                range: 'min',
                                step: _this.data('slider-step'),
                                min: _this.data('slider-min'),
                                max: _this.data('slider-max'),
                                value: _this.data('slider-value'),
                                slide: function (event, ui) {
                                    jQuery(this).parents('li.to-field').find('.cs-range-input').val(ui.value)
                                }
                            });
                        });
                        mashup_frame_callme();
                        chosen_selectionbox();
                        jQuery('[data-toggle="popover"]').popover();
                    }
                });
            }
            function mashup_frame_ajax_widget_element(action, id, name) {

                mashup_frame_loader();
                counter++;
                var newCustomerForm = "action=" + action + '&element_name=' + name + '&counter=' + counter;
                var edit_url = action + counter;

                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo admin_url( 'admin-ajax.php' ) ?>",
                    data: newCustomerForm,
                    success: function (data) {
                        jQuery("#counter_" + id).append(data);

                        jQuery("#counter_" + id + " #results-shortocde-id-form").append('<input type="hidden" name="mashup_widget_element_num[]" value="form" />');
                        jQuery('.bg_color').wpColorPicker();
                        jQuery(".draginner").sortable({
                            connectWith: '.draginner',
                            handle: '.column-in',
                            cancel: '.draginner .poped-up,#confirmOverlay',
                            revert: false,
                            receive: function (event, ui) {
                                mashup_frame_callme();
                            },
                            placeholder: "ui-state-highlight",
                            forcePlaceholderSize: true
                        });
                        mashup_frame_removeoverlay("composer-" + id, "append");
                        jQuery('div.cs-drag-slider').each(function () {
                            var _this = jQuery(this);
                            _this.slider({
                                range: 'min',
                                step: _this.data('slider-step'),
                                min: _this.data('slider-min'),
                                max: _this.data('slider-max'),
                                value: _this.data('slider-value'),
                                slide: function (event, ui) {
                                    jQuery(this).parents('li.to-field').find('.cs-range-input').val(ui.value)
                                }
                            });
                        });
                        mashup_frame_callme();
                    }
                });
            }
            function mashup_frame_ajax_submit(action) {
                counter++;
                count_widget++;
                var newCustomerForm = "action=" + action + '&counter=' + counter;
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo admin_url() ?>/admin-ajax.php",
                    data: newCustomerForm,
                    success: function (data) {
                        jQuery("#add_page_builder_item").append(data);
                        if (count_widget > 0)
                            jQuery("#add_page_builder_item").addClass('hasclass');

                    }
                });

            }
        </script>
        <?php
    }

}

/**
 * @Saving Data for Page Builder by POST ID
 *
 */
if ( isset( $_POST['page_builder_form'] ) and $_POST['page_builder_form'] == 1 ) {
    add_action( 'save_post', 'save_page_builder' );
    if ( ! function_exists( 'save_page_builder' ) ) {

        /**
         * Save Page Builder contents.
         * @param type $post_id
         * @return typeSave 
         */
        function save_page_builder( $post_id ) {
            if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
                return;
            if ( isset( $_POST['builder_active'] ) ) {
                $sxe = new SimpleXMLElement( "<pagebuilder></pagebuilder>" );
                if ( empty( $_POST["builder_active"] ) )
                    $_POST["builder_active"] = "";
                if ( empty( $_POST["page_content"] ) )
                    $_POST["page_content"] = "";
                $sxe->addChild( 'builder_active', $_POST['builder_active'] );
                $sxe->addChild( 'page_content', $_POST['page_content'] );
                $counters = array(
                    'mashup_counter' => 0,
                    'page_element_id' => 0,
                    'column_container_no' => 0,
                    'widget_no' => 0,
                );

                $counters = apply_filters( 'mashup_load_shortcode_counters', $counters );

                if ( isset( $_POST['total_column'] ) ) {
                    foreach ( $_POST['total_column'] as $count_column ) {
                        // Sections Element Attributes start.
                        $column_container = $sxe->addChild( 'column_container' );
                        if ( empty( $_POST['column_class'][$counters['column_container_no']] ) )
                            $_POST['column_class'][$counters['column_container_no']] = '';
                        $column_container->addAttribute( 'class', $_POST['column_class'][$counters['column_container_no']] );
                        $column_rand_id = $_POST['column_rand_id'][$counters['column_container_no']];
                        // Top level page builder settings.
                        $fields = array(
                            'mashup_var_section_title' => is_set( $_POST['mashup_var_section_title_array'][$counters['column_container_no']], '' ),
                            'mashup_var_section_subtitle' => is_set( $_POST['mashup_var_section_subtitle_array'][$counters['column_container_no']], '' ),
                            'title_sub_title_alignment' => is_set( $_POST['title_sub_title_alignment'][$counters['column_container_no']], '' ),
                            'mashup_var_section_style' => is_set( $_POST['mashup_var_section_style'][$counters['column_container_no']], '' ),
                            'mashup_section_background_option' => is_set( $_POST['mashup_section_background_option'][$counters['column_container_no']], '' ),
                            'mashup_section_bg_image' => is_set( $_POST['mashup_var_section_bg_image_array'][$counters['column_container_no']], '' ),
                            'mashup_section_bg_image_position' => is_set( $_POST['mashup_section_bg_image_position'][$counters['column_container_no']], '' ),
                            'mashup_section_bg_image_repeat' => is_set( $_POST['mashup_section_bg_image_repeat'][$counters['column_container_no']], '' ),
                            'mashup_section_flex_slider' => is_set( $_POST['mashup_section_flex_slider'][$counters['column_container_no']], '' ),
                            'mashup_section_custom_slider' => is_set( $_POST['mashup_section_custom_slider'][$counters['column_container_no']], '' ),
                            'mashup_section_video_url' => isset( $_POST['mashup_section_video_url'][$counters['column_container_no']]),
                            'mashup_section_video_mute' => is_set( $_POST['mashup_section_video_mute'][$counters['column_container_no']], '' ),
                            'mashup_section_video_autoplay' => is_set( $_POST['mashup_section_video_autoplay'][$counters['column_container_no']], '' ),
                            'mashup_section_bg_color' => is_set( $_POST['mashup_section_bg_color'][$counters['column_container_no']], '' ),
                            'mashup_section_padding_top' => is_set( $_POST['mashup_section_padding_top'][$counters['column_container_no']], '' ),
                            'mashup_section_padding_bottom' => is_set( $_POST['mashup_section_padding_bottom'][$counters['column_container_no']], '' ),
                            'mashup_section_border_bottom' => is_set( $_POST['mashup_section_border_bottom'][$counters['column_container_no']], '' ),
                            'mashup_section_border_top' => is_set( $_POST['mashup_section_border_top'][$counters['column_container_no']], '' ),
                            'mashup_section_border_color' => is_set( $_POST['mashup_section_border_color'][$counters['column_container_no']], '' ),
                            'mashup_section_margin_top' => is_set( $_POST['mashup_section_margin_top'][$counters['column_container_no']], '' ),
                            'mashup_section_margin_bottom' => is_set( $_POST['mashup_section_margin_bottom'][$counters['column_container_no']], '' ),
                            'mashup_section_nopadding' => is_set( $_POST['mashup_section_nopadding'][$counters['column_container_no']], '' ),
                            'mashup_section_parallax' => is_set( $_POST['mashup_section_parallax'][$counters['column_container_no']], '' ),
                            'mashup_section_nomargin' => is_set( $_POST['mashup_section_nomargin'][$counters['column_container_no']], '' ),
                            'mashup_section_css_id' => is_set( $_POST['mashup_section_css_id'][$counters['column_container_no']], '' ),
                            'mashup_section_view' => is_set( $_POST['mashup_section_view'][$counters['column_container_no']], '' ),
                            'mashup_layout' => is_set( $_POST['mashup_layout'][$column_rand_id]['0'], '' ),
                            'mashup_sidebar_left' => is_set( $_POST['mashup_sidebar_left'][$counters['column_container_no']], '' ),
                            'mashup_sidebar_right' => is_set( $_POST['mashup_sidebar_right'][$counters['column_container_no']], '' ),
                            'mashup_sidebar_left_second' => is_set( $_POST['mashup_sidebar_left_second'][$counters['column_container_no']], '' ),
                            'mashup_sidebar_right_second' => is_set( $_POST['mashup_sidebar_right_second'][$counters['column_container_no']], '' ),
                        );
                        foreach ( $fields as $key => $value ) {
                            $column_container->addAttribute( $key, $value );
                        }

                        // Sections Element Attributes end.
                        for ( $i = 0; $i < $count_column; $i ++ ) {
                            $column = $column_container->addChild( 'column' );
                            $a = $_POST['total_widget'][$counters['widget_no']];
                            for ( $j = 1; $j <= $a; $j ++ ) {
                                $counters['page_element_id'] ++;

                                $widget_type = is_set( $_POST['mashup_orderby'][$counters['mashup_counter']], '' );

                                $args = array(
                                    'data' => $_POST,
                                    'counters' => $counters,
                                    'column' => $column,
                                    'widget_type' => $widget_type,
                                ); //var_dump($widget_type);
                                $args = apply_filters( 'mashup_save_page_builder_data', $args );

                                $column = $args['column'];
                                $counters = $args['counters'];
                                $widget_type = $args['widget_type'];

                                $counters['mashup_counter'] ++;
                            }
                            $counters['widget_no'] ++;
                        }
                        $counters['column_container_no'] ++;
                    }
                }

                update_post_meta( $post_id, 'mashup_page_builder', $sxe->asXML() );
                //creating xml page builder end
            }
        }

    }
}
