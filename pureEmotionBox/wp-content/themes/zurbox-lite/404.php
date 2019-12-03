<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Zurbox Lite
 */

get_header(); ?>

<?php do_action( 'zurbox_content_before' ); ?>

<?php get_template_part( 'template-parts/content', '404' ); ?>

<?php do_action( 'zurbox_content_after' ); ?>

<?php
get_footer();