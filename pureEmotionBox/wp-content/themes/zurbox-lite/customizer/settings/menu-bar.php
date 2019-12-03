<?php
/**
 * @package Zurbox Lite
 */
function zurbox_customizer_menu_bar( $options ) {
	/**
	 *	Add section.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'menu_bar',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Main Menu Bar', 'zurbox-lite' ),
		  'priority'    => 89,
	);

	/**
	 *	Options.
	 *--------------------------------------------------------------*/
	# Extra Top Bar Layout and Menu Items.
	$post_settings = array(
		  'top_search_hide'      => esc_html__( 'Hide Right Search Item', 'zurbox-lite' ),
	);
	foreach( $post_settings as $key => $name ) {
		$options[] = array(
			  'slug'        => $key,
			  'opt_type'    => 'checkbox',
			  'name'        => $name,
			 // 'description'        => esc_html__( 'Hide additional items (icons) in the Right Top Bar of the menu location.', 'zurbox-lite' ),
			  'default'     => 0,
			  'section'     => 'menu_bar',
		);
	}

	# Mobile Menu Layout.
	$options[] = array(
		  'slug'        => 'mobile_menu_layout',
		  'opt_type'    => 'radio',
		  'section'     => 'menu_bar',
		  'default'     => 'topbar',
		  'name'        => esc_html__( 'Mobile Layout', 'zurbox-lite' ),
		  'choices'     => array(
			  'topbar'           => esc_html__( 'Top-bar', 'zurbox-lite' ),
			  'offcanvas'           => esc_html__( 'Off-canvas', 'zurbox-lite' ),
		)
	);

	return $options;
}
add_filter( 'zurbox_settings_input', 'zurbox_customizer_menu_bar' );