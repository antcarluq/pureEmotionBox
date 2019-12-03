<?php
/**
 * The archives template file.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Zurbox Lite
 */

get_header(); ?>

<?php do_action( 'zurbox_content_before' ); ?>

<?php
	if ( have_posts() ) :
		/**
		 * Functions hooked
		 * @see template-hooks.php
		 * @hooked zurbox_page_header	- 0
		 * @hooked zurbox_masonry_wrap_start	- 10
		 */
		do_action( 'zurbox_before_archive_loop' );

		get_template_part( 'template-parts/loop/archive' );

		/**
		 * Functions hooked
		 * @see template-hooks.php
		 * @hooked zurbox_masonry_wrap_end	- 10
		 */
		do_action( 'zurbox_after_archive_loop' );
	else :
		get_template_part( 'template-parts/content', 'none' );
	endif;
?>

<?php do_action( 'zurbox_content_after' ); ?>

<?php
get_footer();