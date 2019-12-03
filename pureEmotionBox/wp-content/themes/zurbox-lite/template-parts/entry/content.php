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
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<a href="<?php the_permalink();?>" title="<?php the_title(); ?>">
		<?php the_post_thumbnail( 'zurbox-entry', array('class' => 'thumbnail') ); ?>
	</a>

	<header class="entry-header">
			<?php
				if ( get_the_title() ) {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				} else {
				?>
					<h2 class="entry-title"><a href="<?php esc_url( get_permalink() ); ?>" rel="bookmark">No Title</a></h2>
			<?php
				} ?>

		<?php
			if ( 'post' === get_post_type() ) :
				if( get_theme_mod('hide_pos_date') != true || get_theme_mod('hide_post_author') != true ) { ?>
					<div class="entry-meta">
						<?php zurbox_posted_on(); ?>
					</div><!-- .entry-meta -->
		<?php
				}
			endif; ?>

	</header><!-- .entry-header -->

<?php if( get_theme_mod('hide_entry_excerpt') != true ) { ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>
<?php } ?>
<?php if( get_theme_mod('hide_entry_comment') != true ) { ?>
	<footer class="entry-footer">
		<?php zurbox_entry_comments(); ?>
	</footer><!-- .entry-footer -->
<?php } ?>

</article><!-- #post-## -->
