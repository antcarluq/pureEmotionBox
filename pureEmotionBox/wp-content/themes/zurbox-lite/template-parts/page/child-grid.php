<?php
/**
 * Template part for displaying child pages grid
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

<?php
	$display_child = get_post_meta( $post->ID, 'meta-child', true );
	if ( empty( $display_child ) ) {
		return;
	}
?>

<!-- ChildGrid -->
	<?php
		$child_pages = new WP_Query( array(
			'post_type'      => 'page',
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
			'post_parent'    => $post->ID,
			'posts_per_page' => 999,
			'no_found_rows'  => true,
		) );
	?>

	<?php if ( $child_pages->have_posts() ) : ?>
		<div class="child-pages-grid">
			<div class="row small-up-1 large-up-<?php echo esc_attr( get_post_meta( $post->ID, 'meta-child', true ) ); ?>">
				<?php while ( $child_pages->have_posts() ) : $child_pages->the_post(); ?>

					<div class="column">
						<article class="callout">
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="thumb">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'zurbox-entry' ); ?>
								</a>
							</div>
						<?php } ?>
							<a href="<?php the_permalink(); ?>">
								<?php the_title( '<h4>', '</h4>' ); ?>
							</a>
						</article>
					</div>

				<?php endwhile; ?>
			</div>
		</div><!-- .child-pages-grid -->
	<?php
		endif;
		wp_reset_postdata();
	?>
<!-- ChildGrid -->