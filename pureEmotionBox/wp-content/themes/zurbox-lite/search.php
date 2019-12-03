<?php
/**
 * @package Zurbox Lite
 */

get_header(); ?>

<?php do_action( 'zurbox_content_before' ); ?>

<?php
	if ( have_posts() ) :

		get_template_part( 'template-parts/page-header/search' );

		/* Start the Loop */
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'search' );
		endwhile;
	else :
		get_template_part( 'template-parts/content', 'none' );
	endif;
?>

<?php do_action( 'zurbox_content_after' ); ?>

<?php
get_footer();