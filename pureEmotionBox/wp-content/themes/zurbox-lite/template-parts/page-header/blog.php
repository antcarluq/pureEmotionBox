<?php
	if ( is_home() ) :
		if ( get_theme_mod('blog_intro_title') ) { ?>
			<header class="page-header">
		<?php if ( 'grid' == get_theme_mod( 'home_layout' ) || 'masonry' == get_theme_mod( 'home_layout' ) ) { ?>
			<div class="column row">
		<?php } ?>
				<?php if ( get_theme_mod('blog_intro_title') ) { ?>
					<h1 class="page-title"><?php echo esc_html( get_theme_mod('blog_intro_title') ); ?></h1>
				<?php } ?>
		<?php if ( 'grid' == get_theme_mod( 'home_layout' ) || 'masonry' == get_theme_mod( 'home_layout' ) ) { ?>
			</div>
		<?php } ?>
			</header><!-- .page-header -->
<?php
		}
		if ( ! get_theme_mod('blog_intro_title') ) {
			echo '<div class="space"></div>';
		}
	endif;
?>