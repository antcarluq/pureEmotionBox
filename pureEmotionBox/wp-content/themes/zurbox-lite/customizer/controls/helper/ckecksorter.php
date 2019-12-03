<?php
/**
 * 	Helper/Sanitize for sortable multi-check boxes custom control.
 * 	choice items
 */

function customize_sorter(){

	$sorters = array();

	$sorters['widget-wide'] = array(
		'id'       => 'widget-wide',
		'label'    => esc_html__( 'Widgets Area Wide', 'zurbox-lite' ),
		// 'callback' => '',
	);

	$sorters['widget-column'] = array(
		'id'       => 'widget-column',
		'label'    => esc_html__( 'Widgets Area Columns', 'zurbox-lite' ),
		// 'callback' => '',
	);

	$sorters['widget-box'] = array(
		'id'       => 'widget-box',
		'label'    => esc_html__( 'Widgets Area Box', 'zurbox-lite' ),
		// 'callback' => '',
	);

	return apply_filters( 'customize_sorter', $sorters );
}


/**
 * 	Utility: Default sorters to use in customizer default value.
 * 	@return string
 *--------------------------------------------------------------------------------------------*/
function customize_sorter_default(){
	$default = array();
	$sorters = customize_sorter();
	foreach( $sorters as $sorter ){
		$default[] = $sorter['id'] . ':0'; /* activate all as default. */
	}
	return apply_filters( 'customize_sorter_default', implode( ',', $default ) );
}

/**
 *	Sanitize.
 *--------------------------------------------------------------------------------------------*/
function zurbox_sorter_sanitaze( $input ) {
	$output = array();
	$valid_sorters = customize_sorter();
	$sorters = explode( ',', $input );

	if( ! $sorters ){
		return null;
	}
	foreach( $sorters as $sorter ){

		$sorter = explode( ':', $sorter );

		if( isset( $sorter[0] ) && isset( $sorter[1] ) ){
			if( array_key_exists( $sorter[0], $valid_sorters ) ){
				$status = $sorter[1] ? '1' : '0';
				$output[] = trim( $sorter[0] . ':' . $status );
			}
		}

	}

	return trim( esc_attr( implode( ',', $output ) ) );
}