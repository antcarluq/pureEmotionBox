<?php
/**
 * @package Zurbox Lite
 */
function zurbox_customizer_blog_posts( $options ) {
	/**
	 *	Add Panel.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'blog_post_settings',
		  'opt_type'    => 'panel',
		  'name'        => esc_html__( 'Posts Options', 'zurbox-lite' ),
		  'description' => esc_html__( 'Here the view of posts options on an home/blog page and single.', 'zurbox-lite' ),
		  'priority'    => 109,
	);

	/**
	 * Blog Post.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'blog_post_options',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Blog Posts', 'zurbox-lite' ),
		 // 'description' => esc_html__( '....', 'zurbox-lite' ),
		  'panel'       => 'blog_post_settings',
	);

	# Blog Intro Title.
	$options[] = array(
		  'slug'        => 'blog_intro_title',
		  'opt_type'    => 'text',
		  'name'        => esc_html__( 'Blog Intro Title', 'zurbox-lite' ),
		  'default'     => esc_html__( 'My Journal', 'zurbox-lite' ),
		  'section'     => 'blog_post_options',
		  'transport'   => 'refresh',
	);

	# Blog Posts Options.
	$post_settings = array(
		  'hide_entry_author'      => esc_html__( 'Hide Author', 'zurbox-lite' ),
		  'hide_entry_date'      => esc_html__( 'Hide Date', 'zurbox-lite' ),
		  'hide_entry_excerpt'      => esc_html__( 'Hide Post Excerpt', 'zurbox-lite' ),
		  'hide_entry_comment'      => esc_html__( 'Hide Comments Link', 'zurbox-lite' ),
		  'hide_entry_more'      => esc_html__( 'Hide Read More', 'zurbox-lite' ),
	);
	foreach( $post_settings as $key => $name ) {
		$options[] = array(
			  'slug'        => $key,
			  'opt_type'    => 'checkbox',
			  'name'        => $name,
			  'default'     => 0,
			  'section'     => 'blog_post_options',
		);
	}

	/**
	 * Single Post.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'single_post_options',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Single Post', 'zurbox-lite' ),
		  'panel'       => 'blog_post_settings',
	);

	# Single Post Options.
	$post_settings = array(
		  'hide_post_bread'      => esc_html__( 'Hide Breadcrumbs', 'zurbox-lite' ),
		  'hide_post_date'      => esc_html__( 'Hide Date', 'zurbox-lite' ),
		  'hide_post_author'      => esc_html__( 'Hide Author', 'zurbox-lite' ),
		  'hide_post_tags'      => esc_html__( 'Hide Tags Meta', 'zurbox-lite' ),
		  'hide_post_cats'      => esc_html__( 'Hide Category Meta', 'zurbox-lite' ),
		  'hide_author_box'  => esc_html__( 'Hide Author Box', 'zurbox-lite' ),
	);
	foreach( $post_settings as $key => $name ) {
		$options[] = array(
			  'slug'        => $key,
			  'opt_type'    => 'checkbox',
			  'name'        => $name,
			  'default'     => 0,
			  'section'     => 'single_post_options',
		);
	}

	# Featured Image.
	$content_layout = array(
		  		'disable'      => esc_html__( 'Not Display', 'zurbox-lite' ),
		  		'overlay'      => esc_html__( 'Overlay Style', 'zurbox-lite' ),
		  		'header'      => esc_html__( 'Header Style', 'zurbox-lite' ),
				);
	$options[] = array(
		  'slug'        => 'featured_image_post',
		  'opt_type'    => 'select',
		  'choices'     => $content_layout,
		  'default'     => 'header',
		  'name'        => esc_html__( 'Featured Image', 'zurbox-lite' ),
		  'section'     => 'single_post_options',
		  'transport'   => 'refresh',
	);
	
	return $options;
}
add_filter( 'zurbox_settings_input', 'zurbox_customizer_blog_posts' );