<?php
/**
 * Dropdown list.
 */

/**
 * Button style.
 */
function zurbox_button_class() {
	$output = array(
		  ''       => esc_html__( 'default', 'zurbox-lite' ),
		  'secondary '       => esc_html__( 'gray', 'zurbox-lite' ),
		  'success '       => esc_html__( 'green', 'zurbox-lite' ),
		  'alert '       => esc_html__( 'red', 'zurbox-lite' ),
		  'warning '       => esc_html__( 'orange', 'zurbox-lite' ),
		  'hollow '       => esc_html__( 'hollow', 'zurbox-lite' ),
		  'secondary hollow '       => esc_html__( 'gray hollow', 'zurbox-lite' ),
		  'success hollow '       => esc_html__( 'green hollow', 'zurbox-lite' ),
		  'alert hollow '       => esc_html__( 'red hollow', 'zurbox-lite' ),
		  'warning hollow '       => esc_html__( 'orange hollow', 'zurbox-lite' ),
	);
	return $output;
}

/**
 * Category List.
 */
function zurbox_customizer_category_list( $args = array() ) {
	$args = wp_parse_args( $args, array( 'hide_empty' => 1 ) );
	$cats = get_categories( $args );
	$output = array();
	$output[''] = esc_html__( '&mdash; Select &mdash;', 'zurbox-lite' );
	foreach( $cats as $cat ) {
		$output[$cat->term_id] = sprintf('%s (%s)', $cat->name, $cat->count );
	}
	return $output;
}

/**
 * Tag List.
 */
function zurbox_customizer_tag_list( $args = array() ) {
	$args = wp_parse_args( $args, array( 'hide_empty' => 1 ) );
	$tags = get_tags( $args );
	$output = array();
	$output[''] = esc_html__( '&mdash; Select &mdash;', 'zurbox-lite' );
	foreach( $tags as $tag ) {
		$output[$tag->term_id] = sprintf('%s (%s)', $tag->name, $tag->count );
	}
	return $output;
}

/**
 * Post Formats.
 */
function zurbox_customizer_post_format() {
	$output = array(
		  'post-format-video'       => esc_html__( 'Video', 'zurbox-lite' ),
		  'post-format-audio'       => esc_html__( 'Audio', 'zurbox-lite' ),
		  'post-format-image'       => esc_html__( 'Image', 'zurbox-lite' ),
	);
	return $output;
}

/**
 * Featured Cat Layout.
 */
function zurbox_customizer_featured_category_layout() {
	$output = array(
		  'boxed'       => esc_html__( 'Post Boxed', 'zurbox-lite' ),
		  'metro'       => esc_html__( 'Metro Box', 'zurbox-lite' ),
	);
	return $output;
}

/**
 * Number Post.
 */
function zurbox_number_post() {
	$output = array(
		  '3'       => '3',
		  '4'       => '4',
		  '6'       => '6',
		  '9'       => '9',
		  '10'     => '10',
	);
	return $output;
}

/**
 * Number Length.
 */
function zurbox_number_length() {
	$output = array(
		  '5'       => '5',
		  '7'       => '7',
		  '9'       => '9',
		  '12'       => '12',
	);
	return $output;
}

/**
 * Font weight list.
 */
function zurbox_customizer_font_weight_list() {
	$output = array(
			'100'       => esc_html__( 'Ultra Light', 'zurbox-lite' ),
			'200'       => esc_html__( 'Light', 'zurbox-lite' ),
			'300'       => esc_html__( 'Book', 'zurbox-lite' ),
			'400'       => esc_html__( 'Regular', 'zurbox-lite' ),
			'500'       => esc_html__( 'Medium', 'zurbox-lite' ),
			'600'       => esc_html__( 'Semi-Bold', 'zurbox-lite' ),
			'700'       => esc_html__( 'Bold', 'zurbox-lite' ),
			'800'       => esc_html__( 'Extra Bold', 'zurbox-lite' ),
			'900'       => esc_html__( 'Ultra Bold', 'zurbox-lite' )
	);
	return $output;
}

/**
 * Font size list.
 */
function zurbox_customizer_font_size_list() {
	$output = array(
		  	'10'       => esc_html__( '10px', 'zurbox-lite' ),
		  	'12'       => esc_html__( '12px', 'zurbox-lite' ),
		  	'14'       => esc_html__( '14px', 'zurbox-lite' ),
		  	'16'       => esc_html__( '16px', 'zurbox-lite' ),
		  	'18'       => esc_html__( '18px', 'zurbox-lite' ),
		  	'20'       => esc_html__( '20px', 'zurbox-lite' ),
		  	'22'       => esc_html__( '22px', 'zurbox-lite' ),
		  	'24'       => esc_html__( '24px', 'zurbox-lite' ),
		  	'28'       => esc_html__( '28px', 'zurbox-lite' ),
		  	'30'       => esc_html__( '30px', 'zurbox-lite' ),
		  	'32'       => esc_html__( '32px', 'zurbox-lite' ),
		  	'34'       => esc_html__( '34px', 'zurbox-lite' ),
		  	'36'       => esc_html__( '36px', 'zurbox-lite' ),
	);
	return $output;
}