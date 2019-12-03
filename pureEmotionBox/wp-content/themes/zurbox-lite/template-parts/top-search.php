<?php
/**
 * Template part for displaying top search bar
 *
 * @package Zurbox Lite
 */
?>

<div class="column row is-hidden" id="searchBar" data-toggler="is-hidden">
	<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
		<input type="text" value="" name="s" id="s" placeholder="<?php esc_attr_e( 'Enter a keyword and press Enter', 'zurbox-lite' ); ?>">
	</form>
</div>