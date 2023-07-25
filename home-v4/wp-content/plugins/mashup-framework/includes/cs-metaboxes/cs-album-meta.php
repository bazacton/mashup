<?php
/**
 * @ Start function for Add Meta Box For Album
 * @return
 */
add_action('add_meta_boxes', 'mashup_meta_album_add');
if ( ! function_exists('mashup_meta_album_add') ) {

	function mashup_meta_album_add() {
		global $mashup_var_frame_static_text;
		add_meta_box('mashup_meta_album', mashup_var_frame_text_srt('mashup_var_album_options'), 'mashup_meta_albums', 'albums', 'normal', 'high');
	}

}

/**
 * @ Start function for Meta Box For Post  
 * @return
 */
if ( ! function_exists('mashup_meta_albums') ) {

	function mashup_meta_albums($post) {
		global $mashup_var_frame_static_text;
		?>
		<div class="page-wrap page-opts left" style="overflow:hidden; position:relative;">
			<div class="option-sec" style="margin-bottom:0;">
				<div class="opt-conts">
					<div class="elementhidden">
						<nav class="admin-navigtion">
							<ul id="cs-options-tab">
								<li><a name="#tab-general-settings" href="javascript:;"><i class="icon-settings"></i><?php echo mashup_var_frame_text_srt('mashup_var_general_setting'); ?> </a></li>
								<li><a name="#tab-subheader-settings" href="javascript:;"><i class="icon-forward2"></i> <?php echo mashup_var_frame_text_srt('mashup_var_subheader'); ?></a></li>
								<li><a name="#tab-album-settings" href="javascript:;"><i class="icon-music2"></i> <?php echo mashup_var_frame_text_srt('mashup_var_album_settings'); ?></a></li>
							</ul>
						</nav>
						<div id="tabbed-content">
							<div id="tab-general-settings">
								<?php
								mashup_sidebar_layout_options();
								?>
							</div>
							<div id="tab-subheader-settings">
								<?php mashup_subheader_element(); ?>
							</div>
							<div id="tab-album-settings">
								<?php mashup_var_album_meta_fields(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<?php
	}

}

/**
 * @page/post Gallery Function
 * @return
 *
 */
if ( ! function_exists('mashup_var_album_meta_fields') ) {

	function mashup_var_album_meta_fields() {
		global $post, $mashup_var_form_fields, $mashup_var_html_fields, $mashup_var_frame_static_text;
		
		$mashup_var_html_fields->mashup_var_checkbox_field(
				array(
					'name' => mashup_var_frame_text_srt('mashup_var_album_meta_featured'),
					'desc' => '',
					'hint_text' => '',
					'echo' => true,
					'field_params' => array(
						'std' => '',
						'id' => 'album_featured',
						'return' => true,
					),
		));
		
		$mashup_var_html_fields->mashup_var_date_field(
				array(
					'name' => mashup_var_frame_text_srt('mashup_var_album_meta_release_date'),
					'desc' => '',
					'hint_text' => '',
					'echo' => true,
					'field_params' => array(
						'std' => '',
						'id' => 'album_release_date',
						'return' => true,
					),
		));
		
		$mashup_var_html_fields->mashup_var_textarea_field(
				array(
					'name' => mashup_var_frame_text_srt('mashup_var_album_meta_small_desc'),
					'desc' => '',
					'hint_text' => '',
					'echo' => true,
					'field_params' => array(
						'std' => '',
						'id' => 'album_small_desc',
						'return' => true,
					),
		));

		$mashup_var_html_fields->mashup_var_text_field(
				array(
					'name' => mashup_var_frame_text_srt('mashup_var_album_meta_buy_URL'),
					'desc' => '',
					'hint_text' => '',
					'echo' => true,
					'field_params' => array(
						'std' => '',
						'id' => 'album_buy_url',
						'return' => true,
					),
		));

		$mashup_var_html_fields->mashup_var_text_field(
				array(
					'name' => mashup_var_frame_text_srt('mashup_var_album_meta_itunes_URL'),
					'desc' => '',
					'hint_text' => '',
					'echo' => true,
					'field_params' => array(
						'std' => '',
						'id' => 'album_itunes_url',
						'return' => true,
					),
		));
		
		$mashup_var_html_fields->mashup_var_text_field(
				array(
					'name' => mashup_var_frame_text_srt('mashup_var_album_meta_amazon_URL'),
					'desc' => '',
					'hint_text' => '',
					'echo' => true,
					'field_params' => array(
						'std' => '',
						'id' => 'album_amazon_url',
						'return' => true,
					),
		));

		$mashup_var_html_fields->mashup_var_heading_render(
				array(
					'name' => mashup_var_frame_text_srt('mashup_var_album_meta_album_tracks'),
					'id' => 'mashup_alubum_tracks',
		));

		if ( function_exists('mashup_album_tracks_list') ) {
			mashup_album_tracks_list();
		}
	}

}

if ( ! function_exists('mashup_album_tracks_list') ) {

	function mashup_album_tracks_list() {
		global $post, $mashup_var_html_fields, $mashup_var_form_fields,$mashup_var_frame_static_text;
		$mashup_get_exp_list = get_post_meta($post->ID, 'mashup_var_alb_list_array', true);
		$mashup_alb_names = get_post_meta($post->ID, 'mashup_var_alb_track_name_array', true);
		$mashup_alb_tracks = get_post_meta($post->ID, 'mashup_var_alb_track_url_array', true);
		
		$html = '
		<script>
			jQuery(document).ready(function($) {
				$("#total_alb_list").sortable({
					cancel : \'td div.table-form-elem\'
				});
			});
		</script>
		<ul class="form-elements">
			<li class="to-button"><a href="javascript:mashup_frame_createpop(\'add_alb_title\',\'filter\')" class="button">' . mashup_var_frame_text_srt('mashup_var_album_meta_add_track') . '</a> </li>
		</ul>
		<div class="px-list-table">
			<table class="to-table" border="0" cellspacing="0">
				<thead>
				  <tr>
					<th style="width:100%;">' . mashup_var_frame_text_srt('mashup_var_album_meta_title') . '</th>
					<th style="width:20%;" class="right">' . mashup_var_frame_text_srt('mashup_var_album_meta_actions') . '</th>
				  </tr>
				</thead>
				<tbody id="total_alb_list">';
		if ( isset($mashup_get_exp_list) && is_array($mashup_get_exp_list) && count($mashup_get_exp_list) > 0 ) {
			$mashup_alb_counter = 0;
			foreach ( $mashup_get_exp_list as $exp_list ) {
				if ( isset($exp_list) && $exp_list <> '' ) {

					$counter_extra_feature = $extra_feature_id = $exp_list;
					$mashup_alb_name = isset($mashup_alb_names[$mashup_alb_counter]) ? $mashup_alb_names[$mashup_alb_counter] : '';
					$mashup_alb_track = isset($mashup_alb_tracks[$mashup_alb_counter]) ? $mashup_alb_tracks[$mashup_alb_counter] : '';

					$ca_awards_array = array(
						'counter_extra_feature' => $counter_extra_feature,
						'extra_feature_id' => $extra_feature_id,
						'mashup_alb_name' => $mashup_alb_name,
						'mashup_alb_track' => $mashup_alb_track,
					);

					$html .= add_album_add_to_list($ca_awards_array);
				}
				$mashup_alb_counter ++;
			}
		}
		$html .= '
			</tbody>
		  </table>

		  </div>
		  <div id="add_alb_title" style="display: none;">
			<div class="px-heading-area">
			  <h5><i class="icon-plus-circle"></i> ' . mashup_var_frame_text_srt('mashup_var_album_meta_track_setting') . '</h5>
			  <span class="px-btnclose" onClick="javascript:mashup_frame_removeoverlay(\'add_alb_title\',\'append\')"> <i class="icon-cancel"></i></span> 	
			</div>';
		$html .= $mashup_var_html_fields->mashup_var_text_field(
				array(
					'name' => mashup_var_frame_text_srt('mashup_var_album_meta_title'),
					'desc' => '',
					'hint_text' => '',
					'echo' => false,
					'field_params' => array(
						'std' => '',
						'id' => 'alb_track_name',
						'return' => true,
					),
				)
		);

		$html .= $mashup_var_html_fields->mashup_var_text_field(
				array(
					'name' => mashup_var_frame_text_srt('mashup_var_album_meta_album_mp3_track'),
					'desc' => '',
					'hint_text' => '',
					'echo' => false,
					'field_params' => array(
						'std' => '',
						'id' => 'alb_track_url',
						'return' => true,
					),
				)
		);
		$html .= '
			<ul class="form-elements noborder">
			  <li class="to-label"></li>
			  <li class="to-field">
				<input type="button" value="' . mashup_var_frame_text_srt('mashup_var_album_meta_add_track_list') . '" onClick="add_track_to_list(\'' . esc_js(admin_url('admin-ajax.php')) . '\', \'' . esc_js(wp_mashup_framework::plugin_url()) . '\')" />
				<div id="albums-loading"></div>
			  </li>
			</ul>
		  </div>';

		echo force_balance_tags($html, true);
	}

}

if ( ! function_exists('add_album_add_to_list') ) {
	function add_album_add_to_list($mashup_atts) {
		global $post, $mashup_var_html_fields, $mashup_var_form_fields,$mashup_var_frame_static_text;

		$mashup_defaults = array(
			'counter_extra_feature' => '',
			'extra_feature_id' => '',
			'mashup_alb_name' => '',
			'mashup_alb_track' => '',
		);
		extract(shortcode_atts($mashup_defaults, $mashup_atts));

		foreach ( $_POST as $keys => $values ) {
			$$keys = $values;
		}

		if ( isset($_POST['mashup_alb_name']) && $_POST['mashup_alb_name'] <> '' )
			$mashup_alb_name = $_POST['mashup_alb_name'];
		if ( isset($_POST['mashup_alb_track']) && $_POST['mashup_alb_track'] <> '' )
			$mashup_alb_track = $_POST['mashup_alb_track'];

		if ( $extra_feature_id == '' && $counter_extra_feature == '' ) {
			$counter_extra_feature = $extra_feature_id = time();
		}

		$html = '
		<tr class="parentdelete" id="edit_track' . absint($counter_extra_feature) . '">
		  <td id="subject-title' . absint($counter_extra_feature) . '" style="width:100%;">' . esc_attr($mashup_alb_name) . '</td>

		  <td class="centr" style="width:20%;"><a href="javascript:mashup_frame_createpop(\'edit_track_form' . absint($counter_extra_feature) . '\',\'filter\')" class="actions edit">&nbsp;</a> <a href="#" class="delete-it btndeleteit actions delete">&nbsp;</a></td>
		  <td style="width:0"><div id="edit_track_form' . esc_attr($counter_extra_feature) . '" style="display: none;" class="table-form-elem">
			<input type="hidden" name="mashup_var_alb_list_array[]" value="' . absint($extra_feature_id) . '" />
			  <div class="px-heading-area">
				<h5 style="text-align: left;">' . mashup_var_frame_text_srt('mashup_var_album_meta_track_setting') . '</h5>
				<span onclick="javascript:mashup_frame_removeoverlay(\'edit_track_form' . esc_js($counter_extra_feature) . '\',\'append\')" class="px-btnclose"> <i class="icon-cancel"></i></span>
				<div class="clear"></div>
			  </div>';
		$html .= $mashup_var_html_fields->mashup_var_text_field(
				array(
					'name' => mashup_var_frame_text_srt('mashup_var_album_meta_title'),
					'desc' => '',
					'hint_text' => '',
					'echo' => false,
					'field_params' => array(
						'std' => $mashup_alb_name,
						'id' => 'alb_track_name',
						'array' => true,
						'force_std' => true,
						'return' => true,
					),
				)
		);

		$html .= $mashup_var_html_fields->mashup_var_text_field(
				array(
					'name' => mashup_var_frame_text_srt('mashup_var_album_meta_album_mp3_track'),
					'desc' => '',
					'hint_text' => '',
					'echo' => false,
					'field_params' => array(
						'std' => $mashup_alb_track,
						'id' => 'alb_track_url',
						'array' => true,
						'force_std' => true,
						'return' => true,
					),
				)
		);

		$html .= '
			<ul class="form-elements noborder">
			  <li class="to-label">
				<label></label>
			  </li>
			  <li class="to-field">
				<input type="button" value="' . mashup_var_frame_text_srt('mashup_var_album_meta_update_track') . '" onclick="mashup_frame_removeoverlay(\'edit_track_form' . esc_js($counter_extra_feature) . '\',\'append\')" />
			  </li>
			</ul>
		  </div></td>
	  </tr>';

		if ( isset($_POST['mashup_alb_name']) && isset($_POST['mashup_alb_track']) ) {
			echo force_balance_tags($html);
		} else {
			return $html;
		}

		if ( isset($_POST['mashup_alb_name']) && isset($_POST['mashup_alb_track']) )
			die();
	}
	
	add_action('wp_ajax_add_album_add_to_list', 'add_album_add_to_list');
}
