<?php
/**
 * Customize the output of menus
 * @package Zurbox Lite
 */

if ( ! class_exists( 'Zurbox_Top_Bar_Walker' ) ) :
class Zurbox_Top_Bar_Walker extends Walker_Nav_Menu {
 	function start_lvl( &$output, $depth = 0, $args = array() ) {
 			$indent = str_repeat("\t", $depth);
      			$output .= "\n$indent<ul class=\"dropdown menu vertical\" data-toggle>\n";
 	}
}
endif;

if ( ! class_exists( 'Zurbox_Mobile_Walker' ) ) :
class Zurbox_Mobile_Walker extends Walker_Nav_Menu {
 	function start_lvl( &$output, $depth = 0, $args = array() ) {
 			$indent = str_repeat("\t", $depth);
 			$output .= "\n$indent<ul class=\"vertical nested menu\">\n";
 	}
}
endif;
