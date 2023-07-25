<?php

/**
 * Custom Walker
 * @access      public
 * @since       1.0 
 * @return      void
 */
class mashup_mega_menu_walker extends Walker_Nav_Menu {

    private $CurrentItem, $CategoryMenu, $menu_style;
    public $parent_menu_item_id = 0;
    public $child_items_count = 0;
    public $child_menu_item_id = 0;
    public $view = '';

    function __Construct( $view = '' ) {
        $this->view = $view;
    }

    // Start function for Mega menu
    function mashup_menu_start() {
        $sub_class = $last = '';
        $count_menu_posts = 0;
        $mega_menu_output = '';
    }

    // Start function For Mega menu level
    function start_lvl( &$output, $depth = 0, $args = array(), $id = 0 ) {
        $indent = str_repeat( "\t", $depth );

        $output .= $this->mashup_menu_start();
        $columns_class = $this->CurrentItem->columns;

        $cs_parent_id = $this->CurrentItem->menu_item_parent;

        $parent_nav_mega = get_post_meta( $cs_parent_id, '_menu_item_megamenu', true );

        $parent_nav_mega_view = get_post_meta( $cs_parent_id, '_menu_item_view', true );


        $mega_dropdown_class = 'has-border';


        if ( $this->CurrentItem->megamenu == 'on' && $depth == 0 ) {
            $output .= "\n$indent<ul class=\"mega-dropdown-lg $mega_dropdown_class\">\n";
        } else {
            if ( $this->view === 'main' && $parent_nav_mega == 'on' && $parent_nav_mega_view == 'simple' && $depth == 1 ) {
                $output .= "\n$indent<ul id=\"menulist" . $this->parent_menu_item_id . $this->child_menu_item_id . "\">\n";
            } else {
                $output .= "\n$indent<ul>\n";
            }
        }
    }

    // Start function For Mega menu level end 

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        global $mashup_var_static_text;
        $cs_parent_id = $this->CurrentItem->menu_item_parent;
        $parent_nav_mega = get_post_meta( $this->parent_menu_item_id, '_menu_item_megamenu', true );
        $parent_nav_mega_view = get_post_meta( $this->parent_menu_item_id, '_menu_item_view', true );

        $indent = str_repeat( "\t", $depth );
        $output .= $indent . "</ul> <!--End Sub Menu -->\n";
        $item_id = $this->parent_menu_item_id . $this->child_menu_item_id;
        
    }

    // Start function For Mega menu items

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

        global $wp_query, $menu_counter, $mashup_var_options;
        $this->CurrentItem = $item;

        $parent_nav_mega = 'off';
        $parent_item_mega_view = '';

        //// show more/less more variables 
        $li_style = '';
        if ( $depth == 2 ) {
            $this->child_items_count ++;
        } else {
            $this->child_items_count = 0;
        }

        if ( $depth == 0 ) {
            $this->parent_menu_item_id = $item->ID;
        }
        if ( $depth == 1 ) {
            $this->child_menu_item_id ++;
        } else if ( $depth == 0 ) {
            $this->child_menu_item_id = 0;
        }
        //// end show more/less more

        if ( $depth == 1 ) {
            $parent_menu_id = $item->menu_item_parent;
            $parent_nav_mega = get_post_meta( $parent_menu_id, '_menu_item_megamenu', true );
            $parent_item_mega_view = get_post_meta( $parent_menu_id, '_menu_item_view', true );
        }

        if ( empty( $args ) ) {
            $args = new stdClass();
        }

        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        if ( $depth == 0 ) {
            $class_names = $value = '';
            $mega_menu = '';
        } else if ( $args->has_children ) {
            $class_names = $value = '';
            $mega_menu = '';
        } else {
            $class_names = $value = $mega_menu = '';
        }
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $class_names = join( " $mega_menu ", apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        if ( $this->CurrentItem->megamenu == 'on' && $args->has_children && $depth == 0 ) {
            $class_names = ' class="' . esc_attr( $class_names ) . ' mega-menu"';
        } else if ( $this->CurrentItem->megamenu == 'on' && $this->CurrentItem->view != 'simple' && ! $args->has_children && $depth == 0 ) {
            $class_names = ' class="' . esc_attr( $class_names ) . ' menu-item-has-children mega-menu"';
        } else if ( $parent_nav_mega == 'on' ) {
            if ( $depth == 1 && $parent_item_mega_view == 'simple' ) {
                $class_names = ' class="col-lg-2 col-md-2 col-sm-4 col-xs-12 mega-menu-categories"';
            } else {
                $class_names = ' class="col-lg-2 col-md-2 col-sm-4 col-xs-12"';
            }
        } else {
            $class_names = ' class="' . esc_attr( $class_names ) . '"';
        }

        // add logo in menu start
        $mashup_custom_logo = isset( $mashup_var_options['mashup_var_custom_logo'] ) ? $mashup_var_options['mashup_var_custom_logo'] : '';
        $mashup_custom_logo_switch = isset( $mashup_var_options['mashup_var_custom_logo_switch'] ) ? $mashup_var_options['mashup_var_custom_logo_switch'] : '';
        $mashup_custom_logo_Style = isset( $mashup_var_options['mashup_var_custom_logo_Style'] ) ? $mashup_var_options['mashup_var_custom_logo_Style'] : '';
        $mashup_logo_height = isset( $mashup_var_options['mashup_var_logo_height'] ) ? $mashup_var_options['mashup_var_logo_height'] : '';
        $mashup_logo_width = isset( $mashup_var_options['mashup_var_logo_width'] ) ? $mashup_var_options['mashup_var_logo_width'] : '';
        $mashup_autosidebar = isset( $mashup_var_options['mashup_var_autosidebar'] ) ? $mashup_var_options['mashup_var_autosidebar'] : '';
        $mashup_custom_logo_position = isset( $mashup_var_options['mashup_var_custom_logo_position'] ) ? $mashup_var_options['mashup_var_custom_logo_position'] : '1';
        if ( $depth == 0 ) {
            $menu_counter ++;
        }

        if ( $depth == 0 && $menu_counter == $mashup_custom_logo_position ) {


            $style_string = '';
            if ( '' !== $mashup_logo_width || '' !== $mashup_logo_height ) {
                $style_string = 'style="';
                if ( '' !== $mashup_logo_width ) {
                    $style_string .= 'width:' . absint( $mashup_logo_width ) . 'px;';
                }
                if ( '' !== $mashup_logo_height ) {
                    $style_string .= 'height:' . absint( $mashup_logo_height ) . 'px;';
                }

                $style_string .= '"';
            }
            if ( (isset( $mashup_custom_logo_switch ) && $mashup_custom_logo_switch == 'on') && (isset( $mashup_custom_logo_Style ) && $mashup_custom_logo_Style == 'in-menu') ) {
                $html_logo_li = '<li class="logo"><a href="' . esc_url( home_url( '/' ) ) . '">';
                if ( $mashup_custom_logo != '' ) {
                    $html_logo_li .='<img alt="" src="' . esc_url( $mashup_custom_logo ) . '" ' . mashup_allow_special_char( $style_string ) . ' >';
                } else {
                    $html_logo_li .='<img alt="" src="' . esc_url( get_template_directory_uri() . '/assets/images/logo-classic.png' ) . '" ' . mashup_allow_special_char( $style_string ) . ' >';
                }

                $html_logo_li .='</a></li>';
                if ( $args->theme_location == 'primary' ) {
                    $output .= $html_logo_li;
                }
            }
        }
        // add logo in menu end

        $output .= $indent . '<li id="menu-item-' . $item->ID . '"' . $value . $class_names . '>';

        $attributes = isset( $item->attr_title ) && $item->attr_title != '' ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
        $attributes .= isset( $item->target ) && $item->target != '' ? ' target="' . esc_attr( $item->target ) . '"' : '';
        $attributes .= isset( $item->xfn ) && $item->xfn != '' ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
        $attributes .= isset( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';

        $item_output = isset( $args->before ) ? $args->before : '';

        if ( $parent_nav_mega == 'on' && $depth == 1 ) {
            $item_output .= '<div class="mega-menu-title"><span>';
        } else {
            $item_output .= '<a' . $attributes . '>';
        }
        $cs_link_before = isset( $args->link_before ) ? $args->link_before : '';
        $item_output .= $cs_link_before . apply_filters( 'the_title', $item->title, $item->ID );
        if ( $this->CurrentItem->subtitle != '' ) {
            $item_output .= '<span>' . $this->CurrentItem->subtitle . '</span>';
        }
        $cs_link_after = isset( $args->link_before ) ? $args->link_before : '';
        $item_output .= $cs_link_after;
        if ( $parent_nav_mega == 'on' && $depth == 1 ) {
            $item_output .= '</span></div>';
        } else {
            $item_output .= '</a>';
        }


        $item_output .= isset( $args->after ) ? $args->after : '';
        if ( ! empty( $mega_menu ) && empty( $args->has_children ) && $this->CurrentItem->megamenu == 'on' ) {
            $item_output .= $this->mashup_menu_start();
        }
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
    }

    // Start function For Mega menu display elements

    function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
        $id_field = $this->db_fields['id'];
        if ( is_object( $args[0] ) ) {
            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
        }
        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

}
