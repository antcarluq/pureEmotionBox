<?php
/**
 * Template part for main top bar menu
 *
 * @package Zurbox Lite
 */
?>

<div class="menu-bar-wrap top-bar clearfix">
  <div class="column row">
	<div class="top-bar-title">
		<span data-responsive-toggle="site-navigation">
			<button class="menu-icon <?php echo esc_html( get_theme_mod( 'menu_icon_style' ) ); ?> show-for-small-only" type="button" data-toggle="mobile-menu"></button>
		</span>
		<?php get_template_part( 'template-parts/top-bar', 'title' ); ?>
	</div><!-- .top-bar-title -->
		
	<nav id="site-navigation" class="main-navigation" role="navigation">
		<div class="top-bar-left">
			<?php zurbox_topbar_l(); ?>
		</div>
		<div class="top-bar-right">
			<?php zurbox_topbar_r(); ?>
		</div>
	<?php
		// Mobile Navigation
		if ( ! get_theme_mod( 'mobile_menu_layout' ) || get_theme_mod( 'mobile_menu_layout' ) == 'topbar' ) :
			get_template_part( 'template-parts/mobile-top-bar' );
		endif; ?>
	</nav>

<?php
	get_template_part( 'template-parts/top-bar', 'extra' );
?>
  </div><!-- .column row -->
</div><!-- .menu-bar-wrap -->