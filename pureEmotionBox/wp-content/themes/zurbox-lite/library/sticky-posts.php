<?php
/**
 * Change the class for sticky posts to .wp-sticky
 *
 * @package Zurbox Lite
 */

if ( ! function_exists( 'zurbox_sticky_posts' ) ) :
	function zurbox_sticky_posts( $classes ) {
		$classes = array_diff($classes, array('sticky'));
		$classes[] = 'wp-sticky';

		return $classes;
	}
	add_filter( 'post_class', 'zurbox_sticky_posts' );
endif;
?>
