<?php
/**
 * Foundation tweaks
 *
 * @package Zurbox Lite
 */

/**
 * Add 'active' class for the current menu item.
 */
if ( ! function_exists( 'zurbox_active_nav_class' ) ) :
function zurbox_active_nav_class( $classes, $item ) {
	if ( 1 == $item->current || true == $item->current_item_ancestor ) {
		$classes[] = 'active';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'zurbox_active_nav_class', 10, 2 );
endif;

/**
 * Use the active class of Foundation on wp_list_pages output.
 */
if ( ! function_exists( 'zurbox_active_list_pages_class' ) ) :
function zurbox_active_list_pages_class( $input ) {

	$pattern = '/current_page_item/';
	$replace = 'current_page_item active';

	$output = preg_replace( $pattern, $replace, $input );

	return $output;
}
add_filter( 'wp_list_pages', 'zurbox_active_list_pages_class', 10, 2 );
endif;