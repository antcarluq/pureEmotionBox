<?php
/**
 * @package Zurbox Lite
 */
function zurbox_customizer_page_set( $options ) {
	/**
	 *	Add Section.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'page_section',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Page Settings', 'zurbox-lite' ),
		  'priority'    => 109,
	);

	/**
	 *	Add Options.
	 *--------------------------------------------------------------*/

	# Featured Image.
	$content_layout = array(
		  		'disable'      => esc_html__( 'Not Display', 'zurbox-lite' ),
		  		'overlay'      => esc_html__( 'Overlay Style', 'zurbox-lite' ),
		  		'header'      => esc_html__( 'Header Style', 'zurbox-lite' ),
				);
	$options[] = array(
		  'slug'        => 'featured_image_page',
		  'opt_type'    => 'select',
		  'choices'     => $content_layout,
		  'default'     => 'overlay',
		  'name'        => esc_html__( 'Featured Image', 'zurbox-lite' ),
		  'section'     => 'page_section',
		  'transport'   => 'refresh',
	);

	# Breadcrumbs.
	$post_settings = array(
		  'hide_page_bread'      => esc_html__( 'Hide Breadcrumbs', 'zurbox-lite' ),
	);
	foreach( $post_settings as $key => $name ) {
		$options[] = array(
			  'slug'        => $key,
			  'opt_type'    => 'checkbox',
			  'name'        => $name,
			  'default'     => 0,
			  'section'     => 'page_section',
		);
	}
	
	return $options;
}
add_filter( 'zurbox_settings_input', 'zurbox_customizer_page_set' );