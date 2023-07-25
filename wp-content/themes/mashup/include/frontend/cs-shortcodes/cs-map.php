<?php

/*
 *
 * @Shortcode Name : Start function for Map shortcode/element front end view
 * @retrun
 *
 */
if ( !function_exists( 'mashup_var_map_shortcode' ) ) {

	function mashup_var_map_shortcode( $atts, $content = "" ) {
		global $header_map, $mashup_var_form_fields, $mashup_var_html_fields, $mashup_var_options;
		$defaults = array(
			'mashup_var_column_size' => '1/1',
			'mashup_var_map_title' => '',
			'mashup_var_map_height' => '',
			'mashup_var_map_lat' => '40.7143528',
			'mashup_var_map_lon' => '-74.0059731',
			'mashup_var_map_zoom' => '11',
			'mashup_var_map_info' => '',
			'mashup_var_map_info_width' => '200',
			'mashup_var_map_info_height' => '200',
			'mashup_var_map_marker_icon' => '',
			'mashup_var_map_show_marker' => 'true',
			'mashup_var_map_controls' => '',
			'mashup_var_map_draggable' => 'true',
			'mashup_var_map_scrollwheel' => 'true',
			'mashup_var_map_border' => '',
			'mashup_var_map_border_color' => '',
			'mashup_map_style' => '',
			'mashup_map_class' => '',
			'mashup_map_directions' => 'off',
			'mashup_var_map_sub_title' => '',
			'mashup_var_map_element_align' => '',
		);
		extract( shortcode_atts( $defaults, $atts ) );
		$mashup_var_map_sub_title = isset( $mashup_var_map_sub_title ) ? $mashup_var_map_sub_title : '';
		$mashup_var_map_element_align = isset( $mashup_var_map_element_align ) ? $mashup_var_map_element_align : '';

		$mashup_var_column_size = isset( $mashup_var_column_size ) ? $mashup_var_column_size : '';
		$mashup_var_map_title = isset( $mashup_var_map_title ) ? $mashup_var_map_title : '';
		$mashup_var_map_height = isset( $mashup_var_map_height ) ? $mashup_var_map_height : '';
		$mashup_var_map_lat = isset( $mashup_var_map_lat ) ? $mashup_var_map_lat : '';
		$mashup_var_map_lon = isset( $mashup_var_map_lon ) ? $mashup_var_map_lon : '';
		$mashup_var_map_zoom = isset( $mashup_var_map_zoom ) ? $mashup_var_map_zoom : '';
		$mashup_var_map_info = isset( $mashup_var_map_info ) ? $mashup_var_map_info : '';
		$mashup_var_map_info_width = isset( $mashup_var_map_info_width ) ? $mashup_var_map_info_width : '';
		$mashup_var_map_info_height = isset( $mashup_var_map_info_height ) ? $mashup_var_map_info_height : '';
		$mashup_var_map_marker_icon = isset( $mashup_var_map_marker_icon ) ? $mashup_var_map_marker_icon : '';
		$mashup_var_map_show_marker = isset( $mashup_var_map_show_marker ) ? $mashup_var_map_show_marker : '';
		$mashup_var_map_controls = isset( $mashup_var_map_controls ) ? $mashup_var_map_controls : '';
		$mashup_var_map_draggable = isset( $mashup_var_map_draggable ) ? $mashup_var_map_draggable : '';
		$mashup_var_map_scrollwheel = isset( $mashup_var_map_scrollwheel ) ? $mashup_var_map_scrollwheel : '';
		$mashup_var_map_border = isset( $mashup_var_map_border ) ? $mashup_var_map_border : '';
		$mashup_var_map_border_color = isset( $mashup_var_map_border_color ) ? $mashup_var_map_border_color : '';

		$mashup_var_map_style = isset( $mashup_var_options['mashup_var_def_map_style'] ) ? $mashup_var_options['mashup_var_def_map_style'] : '';

		if ( isset( $mashup_var_map_height ) && $mashup_var_map_height == '' ) {
			$mashup_var_map_height = '500';
		}

		$column_class = '';

		if ( $header_map ) {
			$header_map = false;
		} else {
			if ( isset( $mashup_var_column_size ) && $mashup_var_column_size != '' ) {
				if ( function_exists( 'mashup_custom_column_class' ) ) {
					$column_class = mashup_custom_column_class( $mashup_var_column_size );
				}
			}
		}
		$section_title = '';

		// element title and subtitle
		if ( (isset( $mashup_var_map_title ) && $mashup_var_map_title <> '') || (isset( $mashup_var_map_sub_title ) and $mashup_var_map_sub_title <> '' )) {

			$section_title .= '<div class="element-title ' . esc_html( $mashup_var_map_element_align ) . '">';

			if ( isset( $mashup_var_map_title ) && $mashup_var_map_title <> '' ) {
				$section_title .= '<h2>' . esc_html( $mashup_var_map_title ) . '</h2> ';
			}

			$section_title .='<em></em>';

			if ( isset( $mashup_var_map_sub_title ) && $mashup_var_map_sub_title <> '' ) {
				$section_title .= '<p>' . esc_html( $mashup_var_map_sub_title ) . '</p>';
			}

			$section_title .= '</div>';
		}

		if ( $mashup_var_map_show_marker == "true" ) {
			$mashup_var_map_show_marker = " var marker = new google.maps.Marker({
                        position: myLatlng,
                        map: map,
                        title: '',
                        icon: '" . $mashup_var_map_marker_icon . "',
                        shadow: ''
                    });
            ";
		} else {
			$mashup_var_map_show_marker = "var marker = new google.maps.Marker({
                        position: myLatlng,
                        map: map,
                        title: '',
                        icon: '',
                        shadow: ''
                    });";
		}
		$border = '';
		if ( isset( $mashup_var_map_border ) && $mashup_var_map_border == 'yes' && $mashup_var_map_border_color != '' ) {
			$border = 'border:1px solid ' . esc_attr( $mashup_var_map_border_color ) . '; ';
		}

		mashup_enqueue_google_map();

		$map_dynmaic_no = mashup_generate_random_string( '10' );
		$html = '';
		$html .= $section_title;
		$html .= '<div class="cs-map-section">';
		$html .='<div class="maps" style="' . $border . '">';
		$html .= '<div class="cs-map">';
		$html .= '<div class="cs-map-content">';

		$html .= '<div class="mapcode iframe mapsection gmapwrapp" id="map_canvas' . $map_dynmaic_no . '" style="height:' . $mashup_var_map_height . 'px;"> </div>';
		$zoomControl = '';
		if ( isset( $mashup_var_map_controls ) && $mashup_var_map_controls == false ) {
			$zoomControl = ' zoomControl:true,';
		}
		$mashup_inline_script = "
		jQuery(document).ready(function() {
                    var panorama;
                    function initialize() {
                    var myLatlng = new google.maps.LatLng(" . $mashup_var_map_lat . ", " . $mashup_var_map_lon . ");
                    var mapOptions = {
                        " . $zoomControl . "
                        zoom: " . $mashup_var_map_zoom . ",
                        scrollwheel: " . $mashup_var_map_scrollwheel . ",
                        draggable: " . $mashup_var_map_draggable . ",
                        streetViewControl: false,
                        center: myLatlng,
                        disableDefaultUI:" . $mashup_var_map_controls . "
                    };";

		if ( $mashup_map_directions == 'on' ) {
			$mashup_inline_script .= "var directionsDisplay;
                      var directionsService = new google.maps.DirectionsService();
                      directionsDisplay = new google.maps.DirectionsRenderer();";
		}

		$mashup_inline_script .= "var map = new google.maps.Map(document.getElementById('map_canvas" . $map_dynmaic_no . "'), mapOptions);";

		if ( $mashup_map_directions == 'on' ) {
			$mashup_inline_script .= "directionsDisplay.setMap(map);
                        directionsDisplay.setPanel(document.getElementById('cs-directions-panel'));

                        function mashup_calc_route() {
                                var myLatlng = new google.maps.LatLng(" . $mashup_var_map_lat . ", " . $mashup_var_map_lon . ");
                                var start = myLatlng;
                                var end = document.getElementById('mashup_end_direction').value;
                                var mode = document.getElementById('mashup_chng_dir_mode').value;
                                var request = {
                                        origin:start,
                                        destination:end,
                                        travelMode: google.maps.TravelMode[mode]
                                };
                                directionsService.route(request, function(response, status) {
                                        if (status == google.maps.DirectionsStatus.OK) {
                                                directionsDisplay.setDirections(response);
                                        }
                                });
                        }
                        document.getElementById('mashup_search_direction').addEventListener('click', function() {
                                mashup_calc_route();
                        });";
		}

		$mashup_inline_script .= "
				var style = '" . $mashup_var_map_style . "';
				if (style != '') {
					var styles = mashup_map_select_style(style);
					if (styles != '') {
						var styledMap = new google.maps.StyledMapType(styles,
								{name: 'Styled Map'});
						map.mapTypes.set('map_style', styledMap);
						map.setMapTypeId('map_style');
					}
				}
				var infowindow = new google.maps.InfoWindow({
					content: '" . $mashup_var_map_info . "',
					maxWidth: " . $mashup_var_map_info_width . ",
					maxHeight: " . $mashup_var_map_info_height . ",
					
				});
				" . $mashup_var_map_show_marker . "
					if (infowindow.content != ''){
					  infowindow.open(map, marker);
					   map.panBy(1,-60);
					   google.maps.event.addListener(marker, 'click', function(event) {
						infowindow.open(map, marker);
					   });
					}
					panorama = map.getStreetView();
					panorama.setPosition(myLatlng);
					panorama.setPov(({
					  heading: 265,
					  pitch: 0
					}));
			}			
				function mashup_toggle_street_view(btn) {
				  var toggle = panorama.getVisible();
				  if (toggle == false) {
						if(btn == 'streetview'){
						  panorama.setVisible(true);
						}
				  } else {
						if(btn == 'mapview'){
						  panorama.setVisible(false);
						}
				  }
				}
		google.maps.event.addDomListener(window, 'load', initialize);
		});";
		$html .= '</div>';
		$html .= '</div></div></div>';
		mashup_inline_enqueue_script( $mashup_inline_script, 'mashup-functions' );
		return $html;
	}

}

if ( function_exists( 'mashup_var_short_code' ) ) {
	mashup_var_short_code( 'mashup_map', 'mashup_var_map_shortcode' );
}