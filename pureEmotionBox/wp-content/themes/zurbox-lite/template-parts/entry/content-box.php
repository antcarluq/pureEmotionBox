<?php
/**
 * Template part for displaying post into box.
 * @package Zurbox Lite
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="column">
    	<div class="post-box box">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

		<?php if ( has_post_thumbnail() ) { ?>
      			<div class="post-box-image">
        				<?php the_post_thumbnail('full'); ?>
        				<h3 class="post-box-title">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
						<?php the_title(); ?>
					</a>
				</h3>
			<div class="overlay"></div>
      			</div>
		<?php } ?>
		<?php
			if ( ! has_post_thumbnail() ) { ?>
								<?php
				if ( get_the_title() ) {
					the_title( '<h3 class="post-box-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
				} else {
				?>
					<h3 class="post-box-title"><a href="<?php esc_url( get_permalink() ); ?>" rel="bookmark">No Title</a></h3>
		<?php
				}
			} ?>
		<?php
			if ( 'post' === get_post_type() ) :
				if( get_theme_mod('hide_entry_date') != true || get_theme_mod('hide_entry_author') != true ) { ?>
					<div class="entry-meta">
						<?php zurbox_posted_on(); ?>
					</div><!-- .entry-meta -->
		<?php
				}
			endif; ?>
		<?php if( get_theme_mod('hide_entry_excerpt') != true ) { ?>
      			<div class="entry-summary">
        				<?php the_excerpt(); ?>
      			</div>
		<?php } ?>
		<?php if( get_theme_mod('hide_entry_comment') != true ) { ?>
			<div class="entry-footer">
				<?php zurbox_entry_comments(); ?>
			</div><!-- .entry-footer -->
		<?php } ?>
		<?php if( get_theme_mod('hide_entry_more') != true ) { ?>
      			<div class="post-box-action">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php esc_html_e( 'Read More', 'zurbox-lite' ); ?></a>
			</div>
		<?php } ?>
		</article>
    	</div>
</div>