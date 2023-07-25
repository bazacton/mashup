<?php

/**
 * Albums Playlist html form 
 * page builder to
 * Frontend side
 * 
 * @retun markup
 */
if ( ! function_exists('mashup_album_playlist_shortcode') ) {

	function mashup_album_playlist_shortcode($atts) {

		$defaults = array(
			'mashup_album_playlist_select_to_play' => '',
			'mashup_album_playlist_num_tracks' => '',
			'mashup_album_playlist_bg' => '',
			'mashup_album_playlist_bg_opacity' => '',
		);

		extract(shortcode_atts($defaults, $atts));

		$html = '';

		$album_id = $mashup_album_playlist_select_to_play;
		$mashup_get_tracks_list = get_post_meta($album_id, 'mashup_var_alb_list_array', true);
		$mashup_alb_names = get_post_meta($album_id, 'mashup_var_alb_track_name_array', true);
		$mashup_alb_tracks = get_post_meta($album_id, 'mashup_var_alb_track_url_array', true);
		$num_of_tracks = absint(sizeof($mashup_get_tracks_list));

		$buy_url = get_post_meta($album_id, 'mashup_var_album_buy_url', true);
		$itunes_url = get_post_meta($album_id, 'mashup_var_album_itunes_url', true);
		$amazon_url = get_post_meta($album_id, 'mashup_var_album_amazon_url', true);

		if ( is_array($mashup_get_tracks_list) && sizeof($mashup_get_tracks_list) > 0 ) {
			$rand_rand = rand(1000000, 9999999);
			if ( mashup_post_have_thumbnail($album_id) ) {
				$alb_img = get_the_post_thumbnail($album_id, 'thumbnail');
			} else {
				$alb_img = '<img src="' . wp_mashup_framework::plugin_url('assets/images/no-image.jpg') . '" alt="" />';
			}
			$mashup_playlist_style = '';
			if ( $mashup_album_playlist_bg != '' ) {
				$mashup_album_bg_color = $mashup_album_playlist_bg;
				if ( function_exists('mashup_hex2rgb') ) {
					$mashup_album_bg_color = mashup_hex2rgb($mashup_album_playlist_bg);
					$mashup_bg_opacity = ! empty($mashup_album_playlist_bg_opacity) ? ', 0.' . $mashup_album_playlist_bg_opacity : '';
					$mashup_bg_rgb_func = ! empty($mashup_album_playlist_bg_opacity) ? 'rgba' : 'rgb';
					$mashup_album_bg_color = ! empty($mashup_album_bg_color) ? $mashup_bg_rgb_func . '(' . $mashup_album_bg_color['red'] . ', ' . $mashup_album_bg_color['green'] . ', ' . $mashup_album_bg_color['blue'] . $mashup_bg_opacity . ')' : '';
				}
				$mashup_playlist_style = '
				.main-player,
				.main-player .jp-playlist {
					background-color: ' . $mashup_album_bg_color . ' !important;
				}';
			}
			if ( function_exists('mashup_var_dynamic_scripts') && $mashup_playlist_style != '' ) {
				mashup_var_dynamic_scripts('mashup_playlist_style', 'css', $mashup_playlist_style);
			}
			$html .= '
			<div class="main-player transparent">
			<div class="container">
				<div id="jquery_jplayer_main_' . $rand_rand . '" class="jp-jplayer"></div>
				<div id="jp_container_main_' . $rand_rand . '" class="jp-audio" role="application" aria-label="media player">
					<div class="jp-type-playlist">
						<div class="jp-gui jp-interface">
							<div class="jp-controls">
								<button class="jp-previous" role="button" tabindex="0"></button>
								<button class="jp-play" role="button" tabindex="0"></button>
								<button class="jp-next" role="button" tabindex="0"></button>
								<button class="jp-stop" role="button" tabindex="0"></button>
							</div>
							<div class="img-holder">
								<figure>' . $alb_img . '</figure>
							</div>
							<div class="jp-progress">
								<div class="jp-details">
									<div class="jp-title" aria-label="title">Stirring of a fool</div>
								</div>
								<div class="jp-seek-bar">
									<div class="jp-play-bar"></div>
								</div>
							</div>
							<div class="jp-time-holder">
								<div class="jp-current-time" role="timer" aria-label="time"> &nbsp;</div>
								<div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
							</div>';
			if ( $buy_url != '' || $itunes_url != '' || $amazon_url != '' ) {
				$html .= '
				<div class="share-player">';
				if ( $buy_url != '' ) {
					$html .= '<a href="' . $buy_url . '"><i class="icon-download2"></i></a>';
				}
				if ( $itunes_url != '' ) {
					$html .= '<a href="' . $itunes_url . '"><i class="icon-apple"></i></a>';
				}
				if ( $amazon_url != '' ) {
					$html .= '<a href="' . $amazon_url . '"><i class="icon-amazon"></i></a>';
				}
				$html .= '
				</div>';
			}
			$html .= '
							<div class="playlist-toggel">
								<a href="#"><i class="icon-list-ul"></i></a>
							</div>
							<div class="jp-toggles">
								<button class="jp-repeat" role="button" tabindex="0">repeat</button>
								<button class="jp-shuffle" role="button" tabindex="0">shuffle</button>
							</div>
							<div class="jp-volume-controls">
								<button class="jp-mute" role="button" tabindex="0">mute</button>
								<button class="jp-volume-max" role="button" tabindex="0">max volume</button>
								<div class="jp-volume-bar">
									<div class="jp-volume-bar-value"></div>
								</div>
							</div>
						</div>
						<div id="jplayer-list-scroll-' . $rand_rand . '" class="jp-playlist">
							<ul>
								<li>&nbsp;</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			</div>
			<script type="text/javascript">
			jQuery(document).ready(function($) {
			$("#jplayer-list-scroll-' . $rand_rand . '").mCustomScrollbar({
				setHeight: 165,
				theme: "dark"
			});
			new jPlayerPlaylist({
				jPlayer: "#jquery_jplayer_main_' . $rand_rand . '",
				cssSelectorAncestor: "#jp_container_main_' . $rand_rand . '"
			}, [';
			$track_counter = 0;
			foreach ( $mashup_get_tracks_list as $track_item ) {
				if ( isset($mashup_alb_tracks[$track_counter]) && $mashup_alb_tracks[$track_counter] != '' ) {
					$html .= '
					{
						title:"' . $mashup_alb_names[$track_counter] . '",
						free: true,
						mp3:"' . $mashup_alb_tracks[$track_counter] . '",
					},';
				}
				if ( $mashup_album_playlist_num_tracks > 0 && $mashup_album_playlist_num_tracks == ($track_counter + 1) ) {
					break;
				}
				$track_counter ++;
			}
			$html .= '
			], {
				supplied: "oga, mp3",
				wmode: "window",
				useStateClassSkin: true,
				autoBlur: false,
				smoothPlayBar: true,
				keyEnabled: true
			});
			});
			</script>';
		}

		return $html;
	}

	if ( function_exists('mashup_var_short_code') ) {
		mashup_var_short_code('mashup_album_playlist', 'mashup_album_playlist_shortcode');
	}
}
