<?php
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'zurbox-featured' );
	$image = $image[0];

	if ( ! is_active_sidebar( 'sidebar-main' ) && ! is_active_sidebar( 'sidebar-sticky' ) ) {
		$align = ' text-center';
	}else{
		$align = '';
	}
?>

	<header id="featured-hero" role="banner" style="background-image: url('<?php echo esc_url( $image ); ?>')">

	<div class="header-container row">
		<div class="columns<?php echo esc_html( $align ); ?>">

			<?php the_title( '<h1 class="page-header-title">', '</h1>' ); ?>

			<?php if ( has_excerpt() ) : ?>
				<div class="page-header-excerpt">
					<?php the_excerpt(); ?>
				</div>
			<?php endif; ?>

		</div>
	</div><!-- .header-container -->
			<span class="overlay"></span>
	</header>