<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Zurbox Lite
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$stored_meta = get_post_meta( $post->ID, 'show_featured_image', true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php
	if ( get_theme_mod( 'featured_image_post' ) != 'overlay' && $stored_meta != 1 ) {
		the_post_thumbnail( 'zurbox-entry', array('class' => 'thumbnail header-image') );
	}
?>

	<header class="entry-header">

		<?php
			if ( ! has_post_thumbnail() || has_post_thumbnail() && $stored_meta == 1 || get_theme_mod( 'featured_image_post' ) != 'overlay' ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} ?>

		<?php if ( 'post' === get_post_type() ) { ?>
			<div class="entry-meta">
				<?php zurbox_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php } ?>

	</header><!-- .entry-header -->


	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'zurbox-lite' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'zurbox-lite' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->


	<footer class="entry-footer">
		<?php zurbox_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
