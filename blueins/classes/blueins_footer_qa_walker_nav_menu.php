<?php

class blueins_footer_qa_walker_nav_menu extends Walker_Nav_Menu{

    // add classes to ul sub-menus
    function start_lvl( &$output, $depth = 0, $args = NULL ) {


        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' );
        
        $display_depth = ( $depth + 1);
        $classes = array(
            ( $depth == 0 ? 'footer-menu-bottom__list' : '' ),
        );
        $class_names = implode( ' ', $classes );

        //build html
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
        
    }

    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ){

        $depth_classes = array(
            ( $depth == 0 ? 'footer-menu-bottom__list__item' : '' )
        );

        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

        $output .= '<li class="' . $depth_class_names . ' ">';

        // link attributes
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        if( ! empty( $item->url ) && $depth !== 1 ) { 
            $attributes .= ' href="' . esc_attr( $item->url ) . '"';
        }else{
            $attributes .= ' href="#"';
        }
        $attributes .= "class='" .  ( $depth == 0 ? 'lights-fiveteen' : '' ) . "'";

        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after
        );

        // build html
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

}