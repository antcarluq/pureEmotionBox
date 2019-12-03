<?php
/**
 * Main functions Theme Customizer
 */

function zurbox_define_constants() {
	if( ! defined( 'ZURBOX_ADMIN_DIR' ) ) {
		define( 'ZURBOX_ADMIN_DIR', trailingslashit( get_template_directory() . '/customizer' ) );
	}
	if( ! defined( 'ZURBOX_ADMIN_URI' ) ) {
		define( 'ZURBOX_ADMIN_URI', trailingslashit( get_template_directory_uri() . '/customizer/assets' ) );
	}
}
add_action( 'init', 'zurbox_define_constants' );

/**
 * 	Modify default sections.
 */
function zurbox_customizer_modify_sections( $wp_customize ) {
	$wp_customize->remove_section('colors');
	$wp_customize->get_section( 'static_front_page' )->priority  = 100;
	$wp_customize->get_control( 'background_color'  )->section   = 'background_image';
	$wp_customize->get_section( 'background_image'  )->title     = esc_html__( 'Site Background', 'zurbox-lite' );
}
add_action( 'customize_register', 'zurbox_customizer_modify_sections' );

/**
 * 	Load files.
 */
function zurbox_admin_files() {
	// Customizer
	load_template( ZURBOX_ADMIN_DIR . 'customizer.php' );

	// Custom Controls
	foreach( glob( ZURBOX_ADMIN_DIR . "controls/*.php" ) as $filename ) {
		load_template( $filename );
	}

	// Settings
	foreach( glob( ZURBOX_ADMIN_DIR . "settings/*.php" ) as $filename ) {
		load_template( $filename );
	}

	// Helper
	foreach( glob( ZURBOX_ADMIN_DIR . "controls/helper/*.php" ) as $filename ) {
		load_template( $filename );
	}
}
add_action( 'init', 'zurbox_admin_files' );

/**
 * 	Get default values.
 */
function zurbox_option_defaults( $key = 'all' ) {
	$defaults = apply_filters( 'zurbox_option_defaults', array() );
	if( 'all' != $key ) {
		return isset( $defaults[$key] ) ? $defaults[$key] : NULL;
	}
	return $defaults;
}

/**
 * 	Retrieve and display value.
 * 	Replacement: get_theme_mod( $key ) - zurbox( $key )
 */
function zurbox( $key = '', $default = null, $echo = false ) {
	$value  = get_theme_mod( $key, $default );
	$output = ( $value != $default ) ? $value : zurbox_option_defaults( $key );
	if( $echo ) {
		echo $output;
	}
	else {
		return $output;
	}
}