<?php
/**
 * @package Zurbox Lite
 */

function zurbox_customizer_site_title( $options ) {
	/**
	 *	Add Options.
	 *--------------------------------------------------------------*/
	# Disable Title.
	$post_settings = array(
		  'zurbox_site_title_hide'      => esc_html__( 'Hide Site Title', 'zurbox-lite' ),
	);
	foreach( $post_settings as $key => $name ) {
		$options[] = array(
			  'slug'        => $key,
			  'opt_type'    => 'checkbox',
			  'name'        => $name,
			  // 'description'        => esc_html__( 'If there is no logo, display the Site Title on the Menu Bar.', 'zurbox-lite' ),
			  'default'     => 0,
			  'section'     => 'title_tagline',
			  'priority' => 10
		);
	}
	# Disable Tagline.
	$post_settings = array(
		  'zurbox_site_tagline_hide'      => esc_html__( 'Hide Tagline', 'zurbox-lite' ),
	);
	foreach( $post_settings as $key => $name ) {
		$options[] = array(
			  'slug'        => $key,
			  'opt_type'    => 'checkbox',
			  'name'        => $name,
			  // 'description'        => esc_html__( 'If there is no logo, display the Tagline on the Menu Bar.', 'zurbox-lite' ),
			  'default'     => 0,
			  'section'     => 'title_tagline',
			  'priority' => 20
		);
	}

	return $options;
}
add_filter( 'zurbox_settings_input', 'zurbox_customizer_site_title' );