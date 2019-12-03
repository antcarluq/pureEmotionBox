<?php
/**
 * @package Zurbox Lite
 */
function zurbox_customizer_front_order( $options ) {
	/**
	 *	Sections Order.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'front_section_order',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Front Page Order', 'zurbox-lite' ),
		  'description' => esc_html__( 'The front display must be assigned a static page with a default template.', 'zurbox-lite' ),
		  'priority'    => 103,
	);

	/* choice items. */
	$choices = array(); 
	$sorters = customize_sorter();
	foreach( $sorters as $key => $val ){
		$choices[$key] = $val['label'];
	}

	# Sections Order.
	$options[] = array(
		  'slug'        => 'section_order',
		  'opt_type'    => 'sorter',
		  'choices'	   => $choices,
		  'name'        => esc_html__( 'Sections Order', 'zurbox-lite' ),
		  'description' => esc_html__( 'Check to show. Drag and drop to sort.', 'zurbox-lite' ),
		  'default'     => customize_sorter_default(),
		  'section'     => 'front_section_order',
		  'transport'   => 'refresh',
		  'sanitize_cb' => 'zurbox_sorter_sanitaze',
	);
	
	return $options;
}
add_filter( 'zurbox_settings_input', 'zurbox_customizer_front_order' );