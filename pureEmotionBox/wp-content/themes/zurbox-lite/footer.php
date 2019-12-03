<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Zurbox Lite
 */
?>

	</div><!-- #content -->

<div id="sticky-btm" class="clearfix"></div><!-- sticky sidebar -->

<?php do_action( 'zurbox_footer_before' ); ?>

<footer id="colophon" class="site-footer" role="contentinfo">

<?php if ( is_active_sidebar( 'footer' ) ) { ?>
	<div class="footer-top">
		<div class="row medium-up-2 large-up-<?php echo esc_html( get_theme_mod( 'footer_section_col', '4' ) ); ?>">
			<?php dynamic_sidebar( 'footer' ); ?>
		</div><!-- .row -->
	</div>
<?php } ?>

<div class="row footer-bottom">
	<div class="medium-6 columns">
			<?php
			/**
			 * Functions hooked in to zurbox_footer_left action
			 * @see template-hooks.php
			 * @hooked zurbox_copytext() - 10
			 */
			do_action( 'zurbox_footer_left' ); ?>
	</div>
	<div class="medium-6 columns">
			<?php
			/**
			 * @see template-hooks.php
			 * @hooked zurbox_credit() - 10
			 */
			do_action( 'zurbox_footer_right' ); ?>
	</div>
</div><!-- .row -->
</footer><!-- #colophon -->

<?php do_action( 'zurbox_footer_after' ); ?>

</div><!-- #page -->

<?php do_action( 'zurbox_sitepage_after' ); ?>

<?php wp_footer(); ?>

</body>
</html>