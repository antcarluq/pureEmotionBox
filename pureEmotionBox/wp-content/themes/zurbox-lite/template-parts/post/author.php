<?php
/**
 * Used to display post author info
 *
 * @package Zurbox Lite
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Disable on blog posts if disabled in the theme mods
if ( ! get_theme_mod( 'blog_post_author_bio', true ) ) {
	//return;
}

// Vars
$author		= get_the_author();
$author_description	= get_the_author_meta( 'description' );
$author_url	= esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
$author_avatar	= get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'zurbox_author_bio_avatar_size', 75 ) );

// Only display if author has a description
if ( ! $author_description || get_theme_mod( 'hide_author_box' ) == true ) {
	return;
} ?>

<div class="author-info">
	<span><?php printf( esc_html__( 'Published by %s', 'zurbox-lite' ), $author ); ?></span>

	<div class="author-info-content<?php if ( $author_avatar ) { echo ' avatar'; } ?>">
		<?php if ( $author_avatar ) { ?>
			<a href="<?php echo $author_url; ?>" rel="author" class="author-avatar">
				<?php echo $author_avatar; ?>
			</a>
		<?php } ?>
		<div class="author-description">
			<p><?php echo $author_description; ?></p>
			<a href="<?php echo $author_url; ?>" title="<?php esc_html_e( 'View all author posts', 'zurbox-lite' ); ?>"><?php esc_html_e( 'View all author posts', 'zurbox-lite' ); ?> &rarr;</a>
		</div><!-- .author-description -->
	</div><!-- .author-info-inner -->
</div><!-- .author-info -->