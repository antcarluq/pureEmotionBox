<?php
/**
 * @package Zurbox Lite
 */
function zurbox_customizer_footer_settings( $options ) {
	/**
	 *	Add Section.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'footer_section',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Footer Settings', 'zurbox-lite' ),
		  'priority'    => 190,
	);

	/**
	 *	Add Options.
	 *--------------------------------------------------------------*/

	# Columns Number.
	$col_num = array(
		  '2'      => esc_html__( 'Two', 'zurbox-lite' ),
		  '3'      => esc_html__( 'Three', 'zurbox-lite' ),
		  '4'      => esc_html__( 'Four', 'zurbox-lite' ),
		  '5'      => esc_html__( 'Five', 'zurbox-lite' ),
	);
	$options[] = array(
		  'slug'        => 'footer_section_col',
		  'opt_type'    => 'select',
		  'choices'     => $col_num,
		  'default'     => '4',
		  'name'        => esc_html__( 'Column Number', 'zurbox-lite' ),
		  'section'     => 'footer_section',
		  'transport'   => 'refresh',
	);

	# Copyright Text.
	$options[] = array(
		  'slug'        => 'copyright',
		  'opt_type'    => 'textarea',
		  'name'        => esc_html__( 'Copyright Text', 'zurbox-lite' ),
		  'default'     => esc_html__( 'All Rights Reserved', 'zurbox-lite' ),
		  'section'     => 'footer_section',
		  'transport'   => 'postMessage',
	);

	# Credits Options.
	$post_settings = array(
		  'disable_credits'      => esc_html__( 'Disable Theme Credits', 'zurbox-lite' ),
		  'disable_date_copy'      => esc_html__( 'Disable Copyright Date', 'zurbox-lite' ),
	);
	foreach( $post_settings as $key => $name ) {
		$options[] = array(
			  'slug'        => $key,
			  'opt_type'    => 'checkbox',
			  'name'        => $name,
			  'default'     => 0,
			  'section'     => 'footer_section',
		);
	}
	
	return $options;
}
add_filter( 'zurbox_settings_input', 'zurbox_customizer_footer_settings' );