<?php
/**
 * @package Zurbox Lite
 */

// Only show this option if we're not using WordPress 4.5
if ( function_exists( 'the_custom_logo' ) ) {
	return;
}

function zurbox_customizer_site_logo( $options ) {
	/**
	 *	Add section.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'logo_section',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Site Logo', 'zurbox-lite' ),
		  'priority'    => 30,
	);

	/**
	 *	Upload.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'logo',
		  'opt_type'    => 'image',
		  'section'     => 'logo_section',
		  'default'     => '',
		  'name'        => esc_html__( 'Site Logo', 'zurbox-lite' ),
		  'description' => esc_html__( 'Upload your custom logo. It will automatically replace the site title.', 'zurbox-lite' ),
	);

	return $options;
}
add_filter( 'zurbox_settings_input', 'zurbox_customizer_site_logo' );