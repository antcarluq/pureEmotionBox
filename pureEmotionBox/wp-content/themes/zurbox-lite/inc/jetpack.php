<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package Zurbox Lite
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.me/support/infinite-scroll/
 * See: https://jetpack.me/support/responsive-videos/
 */
function zurbox_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'zurbox_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'zurbox_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function zurbox_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( class_exists( 'woocommerce' ) && is_woocommerce() || class_exists( 'Projects' ) && is_projects() ) {
			return;
		}
		if ( is_search() ) {
			get_template_part( 'template-parts/content', 'search' );
		}
		if ( 'grid' == get_theme_mod( 'home_layout' ) && is_home() || 'grid' == get_theme_mod( 'archive_layout' ) && is_archive() ) {
			get_template_part( 'template-parts/entry/content', 'box' );
		} else {
		    	get_template_part( 'template-parts/entry/content' );
		}
	}
}
