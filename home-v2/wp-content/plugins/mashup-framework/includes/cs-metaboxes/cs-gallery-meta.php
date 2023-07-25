<?php
/**
 * @Add Meta Box For Galleries
 * @return
 *
 */
if (!class_exists('mashup_var_gallery_meta')) {

    class mashup_var_gallery_meta {

        public function __construct() {
            add_action('add_meta_boxes', array($this, 'mashup_var_meta_gallery_add'));
        }

        function mashup_var_meta_gallery_add() {
            //$strings = new mashup_plugin_all_strings;
            //$strings -> mashup_plugin_activation_strings();
			
            add_meta_box('mashup_meta_galleryy', mashup_var_frame_text_srt('mashup_var_gallery_meta_options'), array($this, 'mashup_var_meta_galleryy'), 'gallery', 'normal', 'high');
        }

        function mashup_var_meta_galleryy($post) {
			
            global $post, $mashup_var_theme_options, $page_option, $mashup_var_form_meta;
            //$mashup_var_theme_options = get_option('mashup_var_theme_options');
            //$mashup_var_builtin_seo_fields = isset($mashup_var_theme_options['mashup_var_builtin_seo_fields']) ? $mashup_var_theme_options['mashup_var_builtin_seo_fields'] : '';
            //$mashup_var_header_position = isset($mashup_var_theme_options['mashup_var_header_position']) ? $mashup_var_theme_options['mashup_var_header_position'] : '';
            ?>		
            <div class="page-wrap page-opts left" style="overflow:hidden; position:relative;">
                <div class="option-sec" style="margin-bottom:0;">
                    <div class="opt-conts">
                        <div class="elementhidden">
                            <nav class="admin-navigtion">
                                <ul id="cs-options-tab">
                                    <li><a href="javascript:;" name="#tab-galleries-settings-cs-galleries"><i class="icon-briefcase"></i><?php echo mashup_var_frame_text_srt('mashup_var_gallery_meta_options'); ?></a></li>
                                </ul>
                            </nav>
                            <div id="tabbed-content">
                                <div id="tab-galleries-settings-cs-galleries">
                                    <?php $this->mashup_var_post_gallery_fields(); ?>
                                    <a href="../post-types/cs-gallery.php"></a>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <?php
        }

        /**
         * @Gallery Custom Fileds Function
         * @return
         */
        function mashup_var_post_gallery_fields() {

            global $post, $mashup_var_form_fields, $mashup_var_html_fields;
            //$strings = new mashup_plugin_all_strings;
            //$strings -> mashup_plugin_activation_strings();

            $mashup_var_html_fields->mashup_var_gallery_render(
                    array(
                        'name' => mashup_var_frame_text_srt('mashup_var_gallery_add_images'),
                        'id' => 'list_gallery',
                        'classes' => '',
                        'std' => 'gallery_meta_form',
                    )
            );
        }

    }

    return new mashup_var_gallery_meta();
}
