<?php
/**
 * @package Zurbox Lite
 */
function zurbox_customizer_frontpage_section( $options ) {
	/**
	 *	Add Panel.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'front_page_section',
		  'opt_type'    => 'panel',
		  'name'        => esc_html__( 'Front Page Sections', 'zurbox-lite' ),
		  'description' => esc_html__( 'The front display must be assigned a static page with a default template.', 'zurbox-lite' ),
		  'priority'    => 102,
	);

	/**
	 *	Page Content.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'section_content',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Page Content', 'zurbox-lite' ),
		  'panel'       => 'front_page_section',
	);

	# Page Content Options.
	$post_settings = array(
		  'hide_frontpage_content'      => esc_html__( 'Hide Content Box', 'zurbox-lite' ),
	);
	foreach( $post_settings as $key => $name ) {
		$options[] = array(
			  'slug'        => $key,
			  'opt_type'    => 'checkbox',
			  'name'        => $name,
			  'description' => esc_html__( 'Check it if you want to hide the box with the page title and content.', 'zurbox-lite' ),
			  'default'     => 0,
			  'section'     => 'section_content',
		);
	}
	# Display Options.
	$content_layout = array(
		  		'full'      => esc_html__( 'Full Width', 'zurbox-lite' ),
		  		'box'      => esc_html__( 'Framed Box', 'zurbox-lite' ),
				);
	$options[] = array(
		  'slug'        => 'frontpage_content_layout',
		  'opt_type'    => 'select',
		  'choices'     => $content_layout,
		  'default'     => 'box',
		  'name'        => esc_html__( 'Content Layout', 'zurbox-lite' ),
		  'section'     => 'section_content',
		  'transport'   => 'refresh',
	);
	# Background Color.
	$options[] = array(
		  'slug'        => 'frontpage_content_bg',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Background Color', 'zurbox-lite' ),
		  'default'     => '#ffffff',
		  'section'     => 'section_content',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array(
			array(
				  'class' => '.frontpage-content, .hero-container-inner',
				  'style' => 'background-color'
			),
		   )
	);
	# Text Color.
	$options[] = array(
		  'slug'        => 'frontpage_text_color',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Text Color', 'zurbox-lite' ),
		  'default'     => '#2c2c2c',
		  'section'     => 'section_content',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array(
			array(
				  'class' => '.frontpage-content .entry-content, .hero-container-inner .entry-content',
				  'style' => 'color'
			),
		   )
	);
	# Title Color.
	$options[] = array(
		  'slug'        => 'frontpage_title_color',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Title Color', 'zurbox-lite' ),
		  'default'     => '#2c2c2c',
		  'section'     => 'section_content',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array(
			array(
				  'class' => '.frontpage-content .entry-title, .hero-container-inner .entry-title',
				  'style' => 'color'
			),
		   )
	);
	# Box Border Color.
	$options[] = array(
		  'slug'        => 'frontpage_box_border',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Box Frame Color', 'zurbox-lite' ),
		  'default'     => '#dedede',
		  'section'     => 'section_content',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array(
			array(
				  'class' => '.hero-container-inner .hentry',
				  'style' => 'border-color'
			),
		   )
	);

	/**
	 *	Widgets Area Columns.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'section_front_widgets',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Widgets Area Columns', 'zurbox-lite' ),
		  'description' => esc_html__( 'To place widgets go to Menu Appearance > Widgets: Widgets Area Columns.', 'zurbox-lite' ),
		  'panel'       => 'front_page_section',
	);

	#  Columns Number.
	$columns_num = array(
		  '2'      => esc_html__( 'Two Columns', 'zurbox-lite' ),
		  '3'      => esc_html__( 'Three Columns', 'zurbox-lite' ),
		  '4'      => esc_html__( 'Four Columns', 'zurbox-lite' ),
	);
	$options[] = array(
		  'slug'        => 'front_widgets_columns',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Columns Number', 'zurbox-lite' ),
		  'choices'     => $columns_num,
		  'default' => '3',
		  'section'     => 'section_front_widgets',
		  'transport'   => 'refresh'
	);
	
	return $options;
}
add_filter( 'zurbox_settings_input', 'zurbox_customizer_frontpage_section' );