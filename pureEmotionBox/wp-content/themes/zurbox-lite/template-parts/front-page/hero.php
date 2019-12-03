<?php
/**
 * @package Zurbox Lite
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php if ( has_post_thumbnail() ) : ?>
	<?php
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		$page_image = $thumb['0'];
		?>
			<div class="hero" id="hero" style="background-image: url(<?php echo esc_url( $page_image ); ?>)">
				<?php the_post_thumbnail( 'zurbox-large' ); ?>
			</div>
<?php endif; ?>