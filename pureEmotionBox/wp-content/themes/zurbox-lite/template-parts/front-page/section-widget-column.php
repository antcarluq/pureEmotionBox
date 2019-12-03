<?php
/**
 * Template part for displaying widgets area with columns
 * @package Zurbox Lite
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>


<?php do_action( 'zurbox_widgets_columns_before' ); ?>

	<div class="row small-up-1 medium-up-2 large-up-<?php echo esc_html( get_theme_mod( 'front_widgets_columns', '3' ) ); ?>">
		<?php dynamic_sidebar( 'widgets-columns' ); ?>
	</div>

<?php do_action( 'zurbox_widgets_columns_after' ); ?>