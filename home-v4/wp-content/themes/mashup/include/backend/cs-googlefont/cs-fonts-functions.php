<?php

/**
 * Google Fonts
 *
 * @package WordPress
 * @subpackage mashup
 * @since Auto Mobile 1.0
 */
if ( ! function_exists('mashup_var_googlefont_list') ) {

	function mashup_var_googlefont_list() {

		global $fonts;
		$font_array = '';
		if ( get_option('mashup_var_font_list') != '' && get_option('mashup_var_font_attribute') != '' ) {
			$font_array = get_option('mashup_var_font_list');
			$font_attribute = get_option('mashup_var_font_attribute');
		} else {
			$font_array = mashup_var_get_google_fontlist($fonts);
			$font_attribute = mashup_var_font_attribute($fonts);
			if ( is_array($font_array) && count($font_array) > 0 && is_array($font_attribute) && count($font_attribute) > 0 ) {
				update_option('mashup_var_font_list', $font_array);
				update_option('mashup_var_font_attribute', $font_attribute);
			}
		}
		return $font_array;
	}

}

/**
 * @Getting Google font Array from json
 *
 */
if ( ! function_exists('mashup_var_get_google_fontlist') ) {

	function mashup_var_get_google_fontlist($response = '') {

		global $fonts;
		$font_list = '';
		$json_fonts = json_decode($response, true);

		if ( $json_fonts != '' ) {
			$items = isset($json_fonts['items']) ? $json_fonts['items'] : '';
			$font_list = array();
			$i = 0;
			foreach ( $items as $item ) {
				$key = isset($item['family']) ? $item['family'] : '';
				$font_list[$key] = isset($item['family']) ? $item['family'] : '';
				$i ++;
			}
		}
		return $font_list;
	}

}
/**
 * @Frontend Font Printing.
 */
if ( ! function_exists('mashup_var_get_google_font_attribute') ) {

	function mashup_var_get_google_font_attribute($response = '', $id = 'ABeeZee') {

		global $fonts;
		if ( get_option('mashup_var_font_attribute') ) {
			$font_attribute = get_option('mashup_var_font_attribute');
			if ( isset($font_attribute) && $font_attribute <> '' ) {
				$items = isset($font_attribute[$id]) ? $font_attribute[$id] : '';
			}
		} else {
			$arrtibue_array = mashup_var_font_attribute($fonts);
			$items = isset($arrtibue_array[$id]) ? $arrtibue_array[$id] : '';
		}
		return $items;
	}

}

/**
 * @Getting Google Font Attributes
 *
 */
if ( ! function_exists('mashup_var_get_google_font_attributes') ) {

	add_action('wp_ajax_mashup_var_get_google_font_attributes', 'mashup_var_get_google_font_attributes');

	function mashup_var_get_google_font_attributes() {

		global $fonts, $mashup_var_static_text;
		$mashup_var_select_attribute = isset($mashup_var_static_text['mashup_var_select_attribute']) ? $mashup_var_static_text['mashup_var_select_attribute'] : '';
		if ( isset($_POST['index']) && $_POST['index'] <> '' ) {
			$index = $_POST['index'];
		} else {
			$index = '';
		}
		if ( $index != 'default' ) {
			if ( get_option('mashup_var_font_attribute') ) {
				$font_attribute = get_option('mashup_var_font_attribute');
				$items = isset($font_attribute[$index]) ? $font_attribute[$index] : '';
			} else {
				$json_fonts = json_decode($fonts, true);
				if ( $json_fonts != '' ) {
					$items = isset($json_fonts['items'][$index]['variants']) ? $json_fonts['items'][$index]['variants'] : '';
				}
			}
			$html = '<select class="chosen-select" id="' . $_POST['id'] . '" name="' . $_POST['id'] . '"><option value="">' . $mashup_var_select_attribute . '</option>';
			foreach ( $items as $key => $value ) {
				$html .= '<option value="' . $value . '">' . $value . '</option>';
			}
			$html .='</select>';
		} else {
			$html = '<select class="chosen-select" id="' . $_POST['id'] . '" name="' . $_POST['id'] . '"><option value="">' . $mashup_var_select_attribute . '</option></select>';
		}

		echo '<script>
            jQuery(document).ready(function ($) {
                chosen_selectionbox();
            });
        </script>';

		echo balanceTags($html, false);
		die();
	}

}

/**
 * @Font Attribute Function
 *
 */
if ( ! function_exists('mashup_var_font_attribute') ) {

	function mashup_var_font_attribute($fontarray = '') {

		//global $fonts;

		$json_fonts = json_decode($fontarray, true);
		$items = isset($json_fonts['items']) ? $json_fonts['items'] : '';
		$font_list = array();
		$i = 0;
		foreach ( $items as $item ) {
			$key = isset($item['family']) ? $item['family'] : '';
			$font_list[$key] = isset($item['variants']) ? $item['variants'] : '';
			$i ++;
		}
		return $font_list;
	}

}

if ( ! function_exists('mashup_is_fonts_loaded') ) {

	function mashup_is_fonts_loaded() {

		global $mashup_var_options;

		if (
				( isset($mashup_var_options['mashup_var_custom_font_woff']) && $mashup_var_options['mashup_var_custom_font_woff'] <> '' ) &&
				( isset($mashup_var_options['mashup_var_custom_font_ttf']) && $mashup_var_options['mashup_var_custom_font_ttf'] <> '' ) &&
				( isset($mashup_var_options['mashup_var_custom_font_svg']) && $mashup_var_options['mashup_var_custom_font_svg'] <> '' ) &&
				( isset($mashup_var_options['mashup_var_custom_font_eot']) && $mashup_var_options['mashup_var_custom_font_eot'] <> '' )
		):

			$custom_font = true;
		else :
			$custom_font = false;
		endif;

		if ( $custom_font !== true ) {
			// font family
			$return_array = array();
			$mashup_var_content_font = (isset($mashup_var_options['mashup_var_content_font'])) ? $mashup_var_options['mashup_var_content_font'] : '';
			$mashup_var_mainmenu_font = (isset($mashup_var_options['mashup_var_mainmenu_font'])) ? $mashup_var_options['mashup_var_mainmenu_font'] : '';
			$mashup_var_heading1_font = (isset($mashup_var_options['mashup_var_heading1_font'])) ? $mashup_var_options['mashup_var_heading1_font'] : '';
			$mashup_var_heading2_font = (isset($mashup_var_options['mashup_var_heading2_font'])) ? $mashup_var_options['mashup_var_heading2_font'] : '';
			$mashup_var_heading3_font = (isset($mashup_var_options['mashup_var_heading3_font'])) ? $mashup_var_options['mashup_var_heading3_font'] : '';
			$mashup_var_heading4_font = (isset($mashup_var_options['mashup_var_heading4_font'])) ? $mashup_var_options['mashup_var_heading4_font'] : '';
			$mashup_var_heading5_font = (isset($mashup_var_options['mashup_var_heading5_font'])) ? $mashup_var_options['mashup_var_heading5_font'] : '';
			$mashup_var_heading6_font = (isset($mashup_var_options['mashup_var_heading6_font'])) ? $mashup_var_options['mashup_var_heading6_font'] : '';
			$mashup_var_section_title_font = (isset($mashup_var_options['mashup_var_section_title_font'])) ? $mashup_var_options['mashup_var_section_title_font'] : '';
			$mashup_var_page_title_font = (isset($mashup_var_options['mashup_var_page_title_font'])) ? $mashup_var_options['mashup_var_page_title_font'] : '';
			$mashup_var_post_title_font = (isset($mashup_var_options['mashup_var_post_title_font'])) ? $mashup_var_options['mashup_var_post_title_font'] : '';
			$mashup_var_widget_heading_font = (isset($mashup_var_options['mashup_var_widget_heading_font'])) ? $mashup_var_options['mashup_var_widget_heading_font'] : '';
			$mashup_var_ft_widget_heading_font = (isset($mashup_var_options['mashup_var_ft_widget_heading_font'])) ? $mashup_var_options['mashup_var_ft_widget_heading_font'] : '';

			$fonts_array = array(
				$mashup_var_content_font,
				$mashup_var_mainmenu_font,
				$mashup_var_heading1_font,
				$mashup_var_heading2_font,
				$mashup_var_heading3_font,
				$mashup_var_heading4_font,
				$mashup_var_heading5_font,
				$mashup_var_heading6_font,
				$mashup_var_section_title_font,
				$mashup_var_page_title_font,
				$mashup_var_post_title_font,
				$mashup_var_widget_heading_font,
				$mashup_var_ft_widget_heading_font,
			);
			$fonts_array = array_unique($fonts_array);
			foreach ( $fonts_array as $font ) {
				if ( $font != '' && $font != 'default' ) {
					$return_array[] = $font;
				}
			}
			if ( sizeof($return_array) > 0 ) {
				return $return_array;
			}
			return false;
		}
		return false;
	}

}

/**
 * @Setting Font for Frontend
 *
 */
if ( ! function_exists('mashup_var_get_font_families') ) {

	function mashup_var_get_font_families($font_indexes = array()) {

		global $fonts, $mashup_var_fonts_subsets;

		if ( get_option('mashup_var_font_list') <> '' && get_option('mashup_var_font_attribute') <> '' ) {
			$font_attribute = get_option('mashup_var_font_attribute');
		} else {
			$font_attribute = mashup_var_font_attribute($fonts);
		}
		$fonts = mashup_var_googlefont_list();

		$all_att = '';
		$mashup_var_subs = '';
		$families_get = array();
		$all_atts_arr = array();
		$all_subs_arr = array();

		foreach ( $font_indexes as $font_index ) {
			if ( $font_index != 'default' && $font_index != '' ) {

				if ( isset($fonts) && is_array($fonts) ) {
					$name = isset($fonts[$font_index]) ? $fonts[$font_index] : '';

					if ( $name != '' ) {
						$families_get[] = $name;
					}

					if ( isset($font_attribute[$font_index]) && is_array($font_attribute[$font_index]) ) {

						foreach ( $font_attribute[$font_index] as $f_atts ) {
							$all_atts_arr[] = $f_atts;
						}
					}

					$mashup_var_subsets = isset($mashup_var_fonts_subsets[$font_index]) ? $mashup_var_fonts_subsets[$font_index] : '';
					if ( is_array($mashup_var_subsets) && sizeof($mashup_var_subsets) > 0 ) {
						foreach ( $mashup_var_subsets as $sub_set ) {
							$all_subs_arr[] = $sub_set;
						}
					}
				}
			}
		}

		if ( sizeof($all_atts_arr) > 0 ) {
			$all_atts_arr = array_unique($all_atts_arr);
			$all_att = ':' . implode(',', $all_atts_arr);
		}

		if ( sizeof($all_subs_arr) > 0 ) {
			$all_atts_arr = array_unique($all_subs_arr);
			$mashup_var_subs = '&subset=' . implode(',', $all_subs_arr);
		}

		if ( sizeof($families_get) > 0 ) {
			$families = implode('|', $families_get);
			return $families . $all_att . $mashup_var_subs;
		}
		return false;
	}

}

/**
 * @Getting Font Family on Frontend
 *
 */
if ( ! function_exists('mashup_var_get_font_name') ) {

	function mashup_var_get_font_name($font_index = 'default') {

		global $fonts;
		if ( $font_index != 'default' ) {
			$fonts = mashup_var_googlefont_list();
			if ( isset($fonts) and is_array($fonts) ) {
				$name = isset($fonts[$font_index]) ? $fonts[$font_index] : '';
				return $name;
			}
		} else {
			return 'default';
		}
	}

}

/**
 * @Function for Recursive Array Replace
 *
 */
if ( ! function_exists('mashup_recursive_array_replace') ) {

	function mashup_recursive_array_replace($array) {

		global $fonts;
		if ( is_array($array) ) {
			$new_array = array();
			for ( $i = 0; $i < sizeof($array); $i ++ ) {
				$new_array[] = $array[$i] == 'regular' ? 'Normal' : $array[$i];
			}
		}
		return $new_array;
	}

}

/**
 * @Getting Font Family on Frontend
 *
 */
if ( ! function_exists('mashup_var_get_font_att_array') ) {

	function mashup_var_get_font_att_array($atts = array()) {

		global $fonts;
		$atts = mashup_recursive_array_replace($atts);

		if ( sizeof($atts) == 1 && is_numeric($atts[0]) )
			$atts = array_merge($atts, array( 'Normal' ));
		$r_att = '';
		foreach ( $atts as $att ) {
			$r_att .= $att . ' ';
		}
		return $r_att;
	}

}

/**
 * @Printing Font on Frontend
 *
 */
if ( ! function_exists('mashup_var_font_font_print') ) {

	function mashup_var_font_font_print($atts = '', $size = '12', $line_height = '20', $f_name, $imp = false) {

		global $fonts;
		$important = '';
		$html = '';
		$f_name = mashup_var_get_font_name($f_name);
		if ( $f_name == 'default' || $f_name == '' ) {
			if ( $imp == true ) {
				$important = ' !important';
			}
			if ( $size > 0 ) {
				$html = 'font-size:' . $size . 'px' . $important . ';';
			}
		} else {
			if ( $imp == true ) {
				$important = ' !important';
			}
			$html = 'font:' . $atts . ' ' . $size . 'px' . ( $line_height != '' ? '/' . $line_height . 'px' : '' ) . ' "' . $f_name . '", sans-serif' . $important . ';';
		}
		return $html;
	}

}