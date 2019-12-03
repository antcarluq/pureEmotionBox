<?php
/**
 * @package Zurbox Lite
 */
function zurbox_customizer_google_fonts_options( $options ) {
	/**
	 *	Add Panel.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'font_panel',
		  'opt_type'    => 'panel',
		  'name'        => esc_html__( 'Google Fonts', 'zurbox-lite' ),
		  'priority'    => 84,
	);

	/**
	 *	Add Section General Font.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'font_main',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'General Font', 'zurbox-lite' ),
		  'panel'       => 'font_panel',
	);

	# Font Name.
	$options[] = array(
		  'slug'        => 'main_font_name',
		  'opt_type'    => 'google_fonts',
		  'name'        => esc_html__( 'Google Font Name', 'zurbox-lite' ),
		  'description' => esc_html__( 'Choose a font name. Default: Open Sans', 'zurbox-lite' ),
		  'default'     => 'Open Sans',
		  'section'     => 'font_main',
		  'transport'   => 'refresh',
		  //'js_mod'      => 'google_fonts',
		  'css_output'  => array( array( 'class' => 'body', 'style' => 'font-family' ) ),
	);

	# Font Weight.
	$options[] = array(
		  'slug'        => 'main_font_w',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Font Weight', 'zurbox-lite' ),
		  'description' => esc_html__( 'Set font-weight. Default: 400/Regular. Important: Not all fonts support every font-weight.', 'zurbox-lite' ),
		  'default'     => '400',
            		  'choices'     => zurbox_customizer_font_weight_list(),
		  'section'     => 'font_main',
		  'transport'   => 'refresh',
		//  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => 'body', 'style' => 'font-weight' ) ),
	);

	# Font size.
	$options[] = array(
		  'slug'        => 'main_font_size',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Font Size', 'zurbox-lite' ),
		  'description' => esc_html__( 'Set font-size. Default: 16px', 'zurbox-lite' ),
		  'choices'     => zurbox_customizer_font_size_list(),
		  'default'     => '16',
		  'section'     => 'font_main',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => 'body', 'style' => 'font-size', 'mix' => 'px' ) ),
	);

	/**
	 *	Add Section Headings.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'font_heading',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Page/Post Heading', 'zurbox-lite' ),
		  'description' => esc_html__( 'Used for titles of single posts and pages.', 'zurbox-lite' ),
		  'panel'       => 'font_panel',
	);

	# Font Name.
	$options[] = array(
		  'slug'        => 'heading_font_name',
		  'opt_type'    => 'google_fonts',
		  'name'        => esc_html__( 'Google Font Name', 'zurbox-lite' ),
		  'description' => esc_html__( 'Choose a font name. Default: Open Sans', 'zurbox-lite' ),
		  'default'     => 'Open Sans',
		  'section'     => 'font_heading',
		  'transport'   => 'refresh',
		//  'js_mod'      => 'google_fonts',
		  'css_output'  => array( array( 'class' => '.entry-title, .page-header-title', 'style' => 'font-family' ) ),
	);

	# Font Weight.
	$options[] = array(
		  'slug'        => 'heading_font_w',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Font Weight', 'zurbox-lite' ),
		  'description' => esc_html__( 'Set font-weight. Default: 700/Bolder. Important: Not all fonts support every font-weight.', 'zurbox-lite' ),
		  'default'     => '700',
		  'choices'     => zurbox_customizer_font_weight_list(),
		  'section'     => 'font_heading',
		  'transport'   => 'refresh',
		//  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.entry-title, .page-header-title', 'style' => 'font-weight' ) ),
	);

	# Font size.
	$options[] = array(
		  'slug'        => 'heading_font_size',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Font Size', 'zurbox-lite' ),
		  'description' => esc_html__( 'Set font-size. Default: 28px', 'zurbox-lite' ),
		  'choices'     => zurbox_customizer_font_size_list(),
		  'default'     => '28',
		  'section'     => 'font_heading',
		  'transport'   => 'refresh',
		//  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.entry-title, .page-header-title', 'style' => 'font-size', 'mix' => 'px' ) ),
	);

	/**
	 *	Add Section One Headings.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'one_heading_font',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Blog/Archive Headings', 'zurbox-lite' ),
		  'description' => esc_html__( 'Used for blog/archive page header.', 'zurbox-lite' ),
		  'panel'       => 'font_panel',
	);

	# Font Name.
	$options[] = array(
		  'slug'        => 'one_heading_font_name',
		  'opt_type'    => 'google_fonts',
		  'name'        => esc_html__( 'Google Font Name', 'zurbox-lite' ),
		  'description' => esc_html__( 'Choose a font name. Default: Open Sans', 'zurbox-lite' ),
		  'default'     => 'Open Sans',
		  'section'     => 'one_heading_font',
		  'transport'   => 'refresh',
		 // 'js_mod'      => 'google_fonts',
		  'css_output'  => array( array( 'class' => '.page-title', 'style' => 'font-family' ) ),
	);

	# Font Weight.
	$options[] = array(
		  'slug'        => 'one_heading_font_w',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Font Weight', 'zurbox-lite' ),
		  'description' => esc_html__( 'Set font-weight. Default: 400/Regular. Important: Not all fonts support every font-weight.', 'zurbox-lite' ),
		  'default'     => '400',
		  'choices'     => zurbox_customizer_font_weight_list(),
		  'section'     => 'one_heading_font',
		  'transport'   => 'refresh',
		  //'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.page-title', 'style' => 'font-weight' ) ),
	);

	# Font size.
	$options[] = array(
		  'slug'        => 'one_heading_font_size',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Font Size', 'zurbox-lite' ),
		  'description' => esc_html__( 'Set font-size. Default: 24px', 'zurbox-lite' ),
		  'choices'     => zurbox_customizer_font_size_list(),
		  'default'     => '24',
		  'section'     => 'one_heading_font',
		  'transport'   => 'refresh',
		 // 'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.page-title', 'style' => 'font-size', 'mix' => 'px' ) ),
	);

	/**
	 *	Add Section Two Headings.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'two_heading_font',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Section Heading / H2', 'zurbox-lite' ),
		  'description' => esc_html__( 'Used for section heading.', 'zurbox-lite' ),
		  'panel'       => 'font_panel',
	);

	# Font Name.
	$options[] = array(
		  'slug'        => 'two_heading_font_name',
		  'opt_type'    => 'google_fonts',
		  'name'        => esc_html__( 'Google Font Name', 'zurbox-lite' ),
		  'description' => esc_html__( 'Choose a font name. Default: Open Sans', 'zurbox-lite' ),
		  'default'     => 'Open Sans',
		  'section'     => 'two_heading_font',
		  'transport'   => 'refresh',
		 // 'js_mod'      => 'google_fonts',
		  'css_output'  => array( array( 'class' => 'h2', 'style' => 'font-family' ) ),
	);

	# Font Weight.
	$options[] = array(
		  'slug'        => 'two_heading_font_w',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Font Weight', 'zurbox-lite' ),
		  'description' => esc_html__( 'Set font-weight. Default: 400/Regular. Important: Not all fonts support every font-weight.', 'zurbox-lite' ),
		  'default'     => '400',
		  'choices'     => zurbox_customizer_font_weight_list(),
		  'section'     => 'two_heading_font',
		  'transport'   => 'refresh',
		  //'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => 'h2', 'style' => 'font-weight' ) ),
	);

	# Font size.
	$options[] = array(
		  'slug'        => 'two_heading_font_size',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Font Size', 'zurbox-lite' ),
		  'description' => esc_html__( 'Set font-size. Default: 28px', 'zurbox-lite' ),
		  'choices'     => zurbox_customizer_font_size_list(),
		  'default'     => '28',
		  'section'     => 'two_heading_font',
		  'transport'   => 'refresh',
		 // 'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => 'h2', 'style' => 'font-size', 'mix' => 'px' ) ),
	);

	/**
	 *	Add Section Entry Headings.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'entry_heading_font',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Entry Headings', 'zurbox-lite' ),
		  'description' => esc_html__( 'Used for entry title with grid layout / H3.', 'zurbox-lite' ),
		  'panel'       => 'font_panel',
	);

	# Font Name.
	$options[] = array(
		  'slug'        => 'entry_heading_font_name',
		  'opt_type'    => 'google_fonts',
		  'name'        => esc_html__( 'Google Font Name', 'zurbox-lite' ),
		  'description' => esc_html__( 'Choose a font name. Default: Open Sans', 'zurbox-lite' ),
		  'default'     => 'Open Sans',
		  'section'     => 'entry_heading_font',
		  'transport'   => 'refresh',
		 // 'js_mod'      => 'google_fonts',
		  'css_output'  => array( array( 'class' => 'h3, .post-box-title', 'style' => 'font-family' ) ),
	);

	# Font Weight.
	$options[] = array(
		  'slug'        => 'entry_heading_font_w',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Font Weight', 'zurbox-lite' ),
		  'description' => esc_html__( 'Set font-weight. Default: 400/Regular. Important: Not all fonts support every font-weight.', 'zurbox-lite' ),
		  'default'     => '400',
		  'choices'     => zurbox_customizer_font_weight_list(),
		  'section'     => 'entry_heading_font',
		  'transport'   => 'refresh',
		  //'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => 'h3, .post-box-title', 'style' => 'font-weight' ) ),
	);

	# Font size.
	$options[] = array(
		  'slug'        => 'entry_heading_font_size',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Font Size', 'zurbox-lite' ),
		  'description' => esc_html__( 'Set font-size. Default: 24px', 'zurbox-lite' ),
		  'choices'     => zurbox_customizer_font_size_list(),
		  'default'     => '24',
		  'section'     => 'entry_heading_font',
		  'transport'   => 'refresh',
		 // 'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => 'h3, .post-box-title', 'style' => 'font-size', 'mix' => 'px' ) ),
	);

	/**
	 *	Add Section Comments headings.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'comment_heading_font',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Comments Heading', 'zurbox-lite' ),
		  'description' => esc_html__( 'Used for comments section headers.', 'zurbox-lite' ),
		  'panel'       => 'font_panel',
	);

	# Font Name.
	$options[] = array(
		  'slug'        => 'comment_heading_font_name',
		  'opt_type'    => 'google_fonts',
		  'name'        => esc_html__( 'Google Font Name', 'zurbox-lite' ),
		  'description' => esc_html__( 'Choose a font name. Default: Open Sans', 'zurbox-lite' ),
		  'default'     => 'Open Sans',
		  'section'     => 'comment_heading_font',
		  'transport'   => 'refresh',
		 // 'js_mod'      => 'google_fonts',
		  'css_output'  => array( array( 'class' => '.comments-title, .comment-reply-title', 'style' => 'font-family' ) ),
	);

	# Font Weight.
	$options[] = array(
		  'slug'        => 'comment_heading_font_w',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Font Weight', 'zurbox-lite' ),
		  'description' => esc_html__( 'Set font-weight. Default: 600/Bold. Important: Not all fonts support every font-weight.', 'zurbox-lite' ),
		  'default'     => '600',
		  'choices'     => zurbox_customizer_font_weight_list(),
		  'section'     => 'comment_heading_font',
		  'transport'   => 'refresh',
		  //'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.comments-title, .comment-reply-title', 'style' => 'font-weight' ) ),
	);

	# Font size.
	$options[] = array(
		  'slug'        => 'comment_heading_font_size',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Font Size', 'zurbox-lite' ),
		  'description' => esc_html__( 'Set font-size. Default: 19px', 'zurbox-lite' ),
		  'choices'     => zurbox_customizer_font_size_list(),
		  'default'     => '19',
		  'section'     => 'comment_heading_font',
		  'transport'   => 'refresh',
		 // 'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.comments-title, .comment-reply-title', 'style' => 'font-size', 'mix' => 'px' ) ),
	);

	/**
	 *	Add Section Widgets headings.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'widgets_heading_font',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Widgets Heading', 'zurbox-lite' ),
		  'description' => esc_html__( 'Used for widget title.', 'zurbox-lite' ),
		  'panel'       => 'font_panel',
	);

	# Font Name.
	$options[] = array(
		  'slug'        => 'widgets_heading_font_name',
		  'opt_type'    => 'google_fonts',
		  'name'        => esc_html__( 'Google Font Name', 'zurbox-lite' ),
		  'description' => esc_html__( 'Choose a font name. Default: Open Sans', 'zurbox-lite' ),
		  'default'     => 'Open Sans',
		  'section'     => 'widgets_heading_font',
		  'transport'   => 'refresh',
		 // 'js_mod'      => 'google_fonts',
		  'css_output'  => array( array( 'class' => '.widget-title', 'style' => 'font-family' ) ),
	);

	# Font Weight.
	$options[] = array(
		  'slug'        => 'widgets_heading_font_w',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Font Weight', 'zurbox-lite' ),
		  'description' => esc_html__( 'Set font-weight. Default: 600/Bold. Important: Not all fonts support every font-weight.', 'zurbox-lite' ),
		  'default'     => '600',
		  'choices'     => zurbox_customizer_font_weight_list(),
		  'section'     => 'widgets_heading_font',
		  'transport'   => 'refresh',
		  //'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.widget-title', 'style' => 'font-weight' ) ),
	);

	# Font size.
	$options[] = array(
		  'slug'        => 'widgets_heading_font_size',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Font Size', 'zurbox-lite' ),
		  'description' => esc_html__( 'Set font-size. Default: 19px', 'zurbox-lite' ),
		  'choices'     => zurbox_customizer_font_size_list(),
		  'default'     => '19',
		  'section'     => 'widgets_heading_font',
		  'transport'   => 'refresh',
		 // 'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.widget-title', 'style' => 'font-size', 'mix' => 'px' ) ),
	);

	return $options;
}
add_filter( 'zurbox_settings_input', 'zurbox_customizer_google_fonts_options' );