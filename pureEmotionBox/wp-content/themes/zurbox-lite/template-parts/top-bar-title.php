<?php
/**
 * Template part for display top bar title
 *
 * @package Zurbox Lite
 */
?>
<?php
	if ( function_exists( 'the_custom_logo' ) && ! get_theme_mod( 'logo' ) ) {
		$image = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
		$logo = $image[0];
	} else {
		$logo = get_theme_mod( 'logo' );
	}
		if ( !empty($logo) ) { ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="site-logo-small" />
			</a>
<?php
		} ?>
		<ul class="menu title-bar-title">
			<li class="site-title-menu">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>
			</li>
			<li class="site-description-menu">
				<?php bloginfo( 'description' ); ?>
			</li>
		</ul>