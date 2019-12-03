<?php
/**
 * @package Zurbox Lite
 */
function zurbox_customizer_add_colors( $options ) {
	/**
	 *	Add Panel.
	 *---------------------------------------------------------*/
	$options[] = array(
		  	'slug'        => 'colors_panel',
			'opt_type'    => 'panel',
			'name'        => esc_html__( 'Color Settings', 'zurbox-lite' ),
			'priority'    => 83
	);

	/**
	 *	Body Color.
	 *---------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'body_color',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Body Colors', 'zurbox-lite' ),
		  'panel'       => 'colors_panel',
	);
	$options[] = array(
		  'slug'        => 'main_color',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Main Text Color', 'zurbox-lite' ),
		  'default'     => '#2b2b2b',
		  'section'     => 'body_color',
		  'transport'   => 'postMessage',
		  'js_mod'      => 'css_output',
		  'css_output'  => array(
				array( 
					'class' => 'body, input, select, textarea, label, .entry-content blockquote, .comment-content blockquote, .widget-text blockquote, .widget a, .widget_recent_comments ul li a, .related-posts ul li h5, .related-posts ul li h5 a',
					'style' => 'color'
				         )
				)
	);
	
	/**
	 *	Accent Color.
	 *---------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'accent_color',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Accent / Link Color', 'zurbox-lite' ),
		  'default'     => '#3F72D8',
		  'section'     => 'body_color',
		  'transport'   => 'postMessage',
		  'js_mod'      => 'css_output',
		  'css_output'  => array(
			array(
				  'class' => 'a, .breadcrumbs a, .button.hollow, .widget a',
				  'style' => 'color'
			),
			array(
				  'class' => '.button, input[type="button"], input[type="reset"], input[type="submit"], .menu-toggle, #infinite-handle span, .more-link span:hover, .mc4wp-form button, .mc4wp-form input[type=button], .mc4wp-form input[type=submit], .pagination .current',
				  'style' => 'background-color'
			),
			array(
				  'class' => '.button.hollow',
				  'style' => 'border-color'
			),
			array(
				  'class' => '.is-dropdown-submenu-parent>a:after, .top-bar .submenu, .is-accordion-submenu-parent>a:after',
				  'style' => 'border-top-color',
				  'mix' => ' !important'
			),
			array(
				  'class' => '.is-dropdown-submenu .is-dropdown-submenu-parent.opens-right>a:after',
				  'style' => 'border-left-color',
				  'mix' => ' !important'
			),
			array(
				  'class' => '.is-dropdown-submenu .is-dropdown-submenu-parent.opens-left>a:after',
				  'style' => 'border-right-color',
				  'mix' => ' !important'
			)
		)
	);

	/**
	 *	Hover Color.
	 *---------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'accent_color_hover',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Hover Link Color', 'zurbox-lite' ),
		  'default'     => '#2a57b1',
		  'section'     => 'body_color',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array(
			array(
				  'class' => 'a:hover, .breadcrumbs a:hover, .button.hollow:hover',
				  'style' => 'color'
			),
			array(
				  'class' => '.button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, .menu-toggle:hover, #infinite-handle span:hover, .more-link span:hover, .mc4wp-form button:hover, .mc4wp-form input[type=button]:hover, .mc4wp-form input[type=submit]:hover',
				  'style' => 'background-color'
			),
			array(
				  'class' => '.button.hollow:hover',
				  'style' => 'border-color'
			),
		)
	);
	
	/**
	 *	Navigation Color.
	 *---------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'navigation_color',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Navigation Colors', 'zurbox-lite' ),
		  'panel'       => 'colors_panel',
	);

	/**
	 *	Options.
	 *---------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'site_header_bg',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Main Menu Bar Background', 'zurbox-lite' ),
		  'default'     => '#ffffff',
		  'section'     => 'navigation_color',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array(
				array(
					'class' => '.top-bar',
					'style' => 'background-color'
				),
				array(
					'class' => '.top-bar',
					'style' => 'border-bottom-color'
				),
		),
	);
	
	$options[] = array(
		  'slug'        => 'nav_color',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Main Menu Item', 'zurbox-lite' ),
		  'default'     => '#3f72d8',
		  'section'     => 'navigation_color',
		  'transport'   => 'postMessage',
		  'js_mod'      => 'css_output',
		  'css_output'  => array(
			array(
				'class' => '.menu-item a, .more-item-icon .fa, .search-item-icon .fa, .shop-item-icon a',
				'style' => 'color'
			),
			array(
				  'class' => '.is-dropdown-submenu-parent>a:after, .is-accordion-submenu-parent>a:after, .top-bar .submenu',
				  'style' => 'border-top-color',
				  'mix' => ' !important'
			),
			array(
				  'class' => '.is-dropdown-submenu .is-dropdown-submenu-parent.opens-right>a:after',
				  'style' => 'border-left-color',
				  'mix' => ' !important'
			),
			array(
				  'class' => '.is-dropdown-submenu .is-dropdown-submenu-parent.opens-left>a:after',
				  'style' => 'border-right-color',
				  'mix' => ' !important'
			)
		),
	);

	$options[] = array(
		  'slug'        => 'sub_menu_bgcolor',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Main Sub-Menu Background', 'zurbox-lite' ),
		  'default'     => '#fefefe',
		  'section'     => 'navigation_color',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array(
				array(
					'class' => '.top-bar .submenu',
					'style' => 'background-color'
					),
				array(
					'class' => '.top-bar .submenu',
					'style' => 'border-right-color'
					),
				array(
					'class' => '.top-bar .submenu',
					'style' => 'border-left-color'
					),
				array(
					'class' => '.top-bar .submenu',
					'style' => 'border-bottom-color'
					),
				),
	);

	$options[] = array(
		  'slug'        => 'sub_menu_color',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Main Sub-Menu Item', 'zurbox-lite' ),
		  'default'     => '#3f72d8',
		  'section'     => 'navigation_color',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.submenu .menu-item a', 'style' => 'color' ) ),
	);

	$options[] = array(
		  'slug'        => 'mobile_menu_bgcolor',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Mobile Menu Background', 'zurbox-lite' ),
		  'default'     => '#2c2c2c',
		  'section'     => 'navigation_color',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array(
				array(
					'class' => '.off-canvas',
					'style' => 'background-color'
					),
				),
	);

	$options[] = array(
		  'slug'        => 'mobile_menu_color',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Mobile Menu Item', 'zurbox-lite' ),
		  'default'     => '#ffffff',
		  'section'     => 'navigation_color',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array(
				array(
					'class' => '.off-canvas .menu-item a',
					'style' => 'color'
					),
				array(
					'class' => '.off-canvas .is-dropdown-submenu-parent>a:after,.off-canvas .is-accordion-submenu-parent>a:after',
					'style' => 'border-top-color',
				  	'mix' => ' !important'
					),
				),
	);

	# Menu Icon.
	$title_tag = array(
		  'dark'      => esc_html__( 'Black', 'zurbox-lite' ),
		  'white'      => esc_html__( 'White', 'zurbox-lite' ),
	);
	$options[] = array(
		  'slug'        => 'menu_icon_style',
		  'opt_type'    => 'select',
		  'choices'     => $title_tag,
		  'default'     => 'dark',
		  'name'        => esc_html__( 'Mobile Menu Icon Style', 'zurbox-lite' ),
		  'section'     => 'navigation_color',
		  'transport'   => 'refresh',
	);


	/**
	 *	Content Elements.
	 *---------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'content_color',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Content Elements', 'zurbox-lite' ),
		  'panel'       => 'colors_panel',
	);
	# Post/Page Heading.
	$options[] = array(
		  'slug'        => 'content_color_title',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Post/Page Title', 'zurbox-lite' ),
		  'default'     => '#2b2b2b',
		  'section'     => 'content_color',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.entry-title', 'style' => 'color' ) ),
	);
	# Post Meta.
	$options[] = array(
		  'slug'        => 'content_color_meta',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Post Meta Info', 'zurbox-lite' ),
		  'default'     => '#888888',
		  'section'     => 'content_color',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.entry-meta, .entry-footer', 'style' => 'color' ) ),
	);
	$options[] = array(
		  'slug'        => 'content_color_meta_link',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Post Meta Link', 'zurbox-lite' ),
		  'default'     => '#3F72D8',
		  'section'     => 'content_color',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.entry-meta a, .entry-footer a', 'style' => 'color' ) ),
	);
	# Sidebar Widgets.
	$options[] = array(
		  'slug'        => 'content_color_widget',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Sidebar Widget Title', 'zurbox-lite' ),
		  'default'     => '#888888',
		  'section'     => 'content_color',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '#secondary .widget-title', 'style' => 'color' ) ),
	);

	/**
	 *	Comments.
	 *---------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'comment_block',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Comment Block', 'zurbox-lite' ),
		  'panel'       => 'colors_panel',
	);
	# Comments.
	$options[] = array(
		  'slug'        => 'comment_block_title',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Headings', 'zurbox-lite' ),
		  'default'     => '#2b2b2b',
		  'section'     => 'comment_block',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.comments-title, .comment-reply-title, .comment-form label', 'style' => 'color' ) ),
	);
	$options[] = array(
		  'slug'        => 'comment_block_content',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Content', 'zurbox-lite' ),
		  'default'     => '#888888',
		  'section'     => 'comment_block',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.comment-content', 'style' => 'color' ) ),
	);
	$options[] = array(
		  'slug'        => 'comments_meta',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Meta Info', 'zurbox-lite' ),
		  'default'     => '#888888',
		  'section'     => 'comment_block',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.comment-meta, .comment-meta a', 'style' => 'color' ) ),
	);

	/**
	 *	Author Block.
	 *---------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'author_block',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Author Block', 'zurbox-lite' ),
		  'panel'       => 'colors_panel',
	);
	# Author Block.
	$options[] = array(
		  'slug'        => 'author_block_bg',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Background', 'zurbox-lite' ),
		  'default'     => '#ffffff',
		  'section'     => 'author_block',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.author-info', 'style' => 'background-color' ) ),
	);
	$options[] = array(
		  'slug'        => 'author_block_title',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Heading', 'zurbox-lite' ),
		  'default'     => '#2b2b2b',
		  'section'     => 'author_block',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.author-info span', 'style' => 'color' ) ),
	);
	$options[] = array(
		  'slug'        => 'author_block_content',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Description', 'zurbox-lite' ),
		  'default'     => '#888888',
		  'section'     => 'author_block',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.author-description', 'style' => 'color' ) ),
	);

	/**
	 *	Primary Button.
	 *---------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'primary_button',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Primary Button', 'zurbox-lite' ),
		  'panel'       => 'colors_panel',
	);
	# Background.
	$options[] = array(
		  'slug'        => 'primary_button_bg',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Button Background', 'zurbox-lite' ),
		  'default'     => '#3f72d8',
		  'section'     => 'primary_button',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.button, input[type="button"], input[type="reset"], input[type="submit"], .menu-toggle, #infinite-handle span, .more-link span:hover, .mc4wp-form button, .mc4wp-form input[type=button], .mc4wp-form input[type=submit]', 'style' => 'background-color' ) ),
	);
	# Text.
	$options[] = array(
		  'slug'        => 'primary_button_color',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Button Text', 'zurbox-lite' ),
		  'default'     => '#ffffff',
		  'section'     => 'primary_button',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => 'a.button, .widget a.button, input[type="button"], input[type="reset"], input[type="submit"], .menu-toggle, #infinite-handle span, .more-link span:hover, .mc4wp-form button, .mc4wp-form input[type=button], .mc4wp-form input[type=submit]', 'style' => 'color' ) ),
	);


	/**
	 *	Footer.
	 *---------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'footer_color',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Footer Colors', 'zurbox-lite' ),
		  'panel'       => 'colors_panel',
	);
	$options[] = array(
		  'slug'        => 'footer_text',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Text', 'zurbox-lite' ),
		  'default'     => '#888888',
		  'section'     => 'footer_color',
		  'transport'   => 'postMessage',
		  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.footer-top, .footer-top a, .footer-top .widget-title', 'style' => 'color' ) ),
	);

	$options[] = array(
		  'slug'        => 'footer_bg_color',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Background', 'zurbox-lite' ),
		  'default'     => '#FFFFFF',
		  'section'     => 'footer_color',
		  'transport'   => 'postMessage',
		  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.footer-top', 'style' => 'background-color' ) ),
	);

	$options[] = array(
		  'slug'        => 'footer_bottom_color',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Bottom Text', 'zurbox-lite' ),
		  'default'     => '#888888',
		  'section'     => 'footer_color',
		  'transport'   => 'postMessage',
		  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.footer-bottom, .footer-bottom a', 'style' => 'color' ) ),
	);

	$options[] = array(
		  'slug'        => 'footer_bottom_bg_color',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Bottom Background', 'zurbox-lite' ),
		  'default'     => '#2b2b2b',
		  'section'     => 'footer_color',
		  'transport'   => 'postMessage',
		  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.site-footer', 'style' => 'background-color' ) ),
	);

	return $options;
}
add_filter( 'zurbox_settings_input', 'zurbox_customizer_add_colors' );