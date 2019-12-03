<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Zurbox Lite
 */
?>

<?php
	if ( get_theme_mod( 'sidebar_position' ) == 'left-sidebar' ) {
		$layout = ' large-pull-8 ';
	} else {
		$layout = ' ';
	}
?>

<aside id="secondary" class="widget-area small-12 large-4<?php echo esc_html( $layout ); ?>columns" role="complementary">

<?php if ( is_active_sidebar( 'sidebar-main' ) ) { ?>
	<?php dynamic_sidebar( 'sidebar-main' ); ?>
<?php } ?>

</aside><!-- #secondary -->