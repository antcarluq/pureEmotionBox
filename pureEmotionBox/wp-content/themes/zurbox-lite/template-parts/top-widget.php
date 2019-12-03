<?php
/**
 * Template part for displaying top widgets bar
 *
 * @package Zurbox Lite
 */
?>

<?php
$sidebars_widgets = wp_get_sidebars_widgets();
$widget_count = count($sidebars_widgets['top-extra']);

$medium = 2;
$large = $widget_count;

	if ( 1 == $widget_count ) {
		$medium = 1;
	}
	if ( 5 < $widget_count ) {
		$large = 5;
	}
?>

<?php if ( is_active_sidebar( 'top-extra' ) ) { ?>
	<div class="row medium-up-<?php echo esc_attr( $medium ); ?> large-up-<?php echo esc_attr( $large ); ?> is-hidden top-widgets-area" id="menuBar" data-toggler="is-hidden">
		<?php dynamic_sidebar( 'top-extra' ); ?>
	</div>
<?php } else { ?>
	<div class="row column is-hidden" id="menuBar" data-toggler="is-hidden">
		<div class="alert admin callout" data-closable>
  			<h5><?php esc_html_e( 'Place the widgets in the Top Extra Area.','zurbox-lite' ); ?></h5>
  				<button class="close-button" aria-label="Dismiss alert" type="button" data-close>
					<span aria-hidden="true">&times;</span>
				</button>
		</div>
	</div>
<?php } ?>