<?php
/**
 * Template part for display extra item in the mobile menu bar
 *
 * @package Zurbox Lite
 */
?>
<div class="extra-item-mobile show-for-small-only">
<?php
	if ( is_active_sidebar( 'top-extra' ) ) { ?>
	<span class="more-item-icon"><a data-toggle="menuBar"><i class="fa fa-ellipsis-h fa-2x" aria-hidden="true"></i></a></span>
<?php
	}
	if ( class_exists( 'woocommerce' ) && apply_filters( 'zurbox_show_cart_item', true ) ) {
?>
		<span class="shop-item-icon"><a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>"><i class="fa fa-shopping-cart"></i></a></span>
<?php
	}
	if ( get_theme_mod( 'top_search_hide' ) != true ) {
?>
	<span class="search-item-icon"><a data-toggle="searchBar"><i class="fa fa-search" aria-hidden="true"></i></a></span>
<?php
	} ?>
</div>