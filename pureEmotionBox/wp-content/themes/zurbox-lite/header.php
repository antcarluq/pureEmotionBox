<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Zurbox Lite
 */

?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php do_action( 'zurbox_sitepage_before' ); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'zurbox-lite' ); ?></a>

	<?php do_action( 'zurbox_site_header_before' ); ?>

	<header id="masthead" class="site-header<?php zurbox_header_layout(); ?>" role="banner">
	<!-- can be changed by adding .stacked-for-medium *see http://foundation.zurb.com/sites/docs/top-bar.html#stacking -->
		<?php do_action( 'zurbox_site_header' ); ?>
	</header>

	<?php do_action( 'zurbox_site_header_after' ); ?>

	<div id="content" class="site-content custom-background">