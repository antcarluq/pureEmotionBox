<?php
/**
 * @package Zurbox Lite
 */
function zurbox_customizer_layouts( $options ) {
	/**
	 *	Add section.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'layout_section',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Layouts', 'zurbox-lite' ),
		  'priority'    => 85,
	);

	/**
	 *	Home Layout.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'home_layout',
		  'opt_type'    => 'radio',
		  'section'     => 'layout_section',
		  'default'     => 'layout-three-columns',
		  'name'        => esc_html__( 'Home/Blog Posts', 'zurbox-lite' ),
		  'choices'     => array(
			  'default'           => esc_html__( 'One Column / Sidebar', 'zurbox-lite' ),
			  'grid'       => esc_html__( 'Wide Grid 3 Columns', 'zurbox-lite' ),
			  'masonry'       => esc_html__( 'Wide Masonry 3 Columns', 'zurbox-lite' ),
		)
	);

	/**
	 *	Archive Layout.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'archive_layout',
		  'opt_type'    => 'radio',
		  'section'     => 'layout_section',
		  'default'     => 'layout-two-columns',
		  'name'        => esc_html__( 'Archive/Category Posts', 'zurbox-lite' ),
		  'choices'     => array(
			  'default'           => esc_html__( 'One Column / Sidebar', 'zurbox-lite' ),
			  'grid'       => esc_html__( 'Wide Grid 3 Columns', 'zurbox-lite' ),
			  'masonry'       => esc_html__( 'Wide Masonry 3 Columns', 'zurbox-lite' ),
		)
	);

	/**
	 *	Sidebar Position.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'sidebar_position',
		  'opt_type'    => 'radio',
		  'section'     => 'layout_section',
		  'default'     => 'right-sidebar',
		  'name'        => esc_html__( 'Sidebar Layout', 'zurbox-lite' ),
		  'description'        => esc_html__( 'For each page you can choose a special alignment of the sidebar on the edit screen of the page.', 'zurbox-lite' ),
		  'choices'     => array(
			  'right-sidebar' => esc_html__( 'Right Alignment', 'zurbox-lite' ),
			  'left-sidebar'  => esc_html__( 'Left Alignment', 'zurbox-lite' ),
		),
		  'transport'   => 'refresh',
	);

	return $options;
}
add_filter( 'zurbox_settings_input', 'zurbox_customizer_layouts' );