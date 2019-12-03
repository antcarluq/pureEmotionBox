<?php
/**
 * The template for displaying pages and single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Zurbox Lite
 */

get_header(); ?>

<?php do_action( 'zurbox_content_before' ); ?>

<?php
	if( is_page() && true != get_theme_mod( 'hide_page_bread' ) || ! is_page() && true != get_theme_mod( 'hide_post_bread' ) ) {
		zurbox_breadcrumb();
	}
?>

<?php do_action( 'zurbox_singular_loop_before' ); ?>

<?php get_template_part( 'template-parts/loop/singular' ); ?>

<?php do_action( 'zurbox_singular_loop_after' ); ?>

<?php do_action( 'zurbox_content_after' ); ?>

<?php
get_footer();