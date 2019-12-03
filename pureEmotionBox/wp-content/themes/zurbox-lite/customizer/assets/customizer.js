/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {

	//Update site color in real time...
	wp.customize( 'main_color', function( value ) {
		value.bind( function( newval ) {
			$('body, button, input, select, textarea, .widget a, .related-posts ul li h5, .related-posts ul li h5 a').css('color', newval );
		} );
	} );

	wp.customize( 'accent_color', function( value ) {
		value.bind( function( newval ) {
			$('.post-media .gallery-caption, .wp-caption-text a, .entry-content a, .comment-content a, .widget-text a').css('color', newval );
		} );
	} );

	wp.customize( 'site_header_bg', function( value ) {
		value.bind( function( newval ) {
			$('.site-header').css('background-color', newval );
		} );
	} );

	wp.customize( 'site_title_color', function( value ) {
		value.bind( function( newval ) {
			$('.site-title, .site-title a').css('color', newval );
		} );
	} );

	wp.customize( 'nav_color', function( value ) {
		value.bind( function( newval ) {
			$('.site-navigation ul li a').css('color', newval );
		} );
	} );

	wp.customize( 'top_menu_color', function( value ) {
		value.bind( function( newval ) {
			$('.top-menu ul li a').css('color', newval );
		} );
	} );

	wp.customize( 'top_menu_bg', function( value ) {
		value.bind( function( newval ) {
			$('.top-menu').css('background-color', newval );
		} );
	} );

	wp.customize( 'footer_color', function( value ) {
		value.bind( function( newval ) {
			$('.site-footer, .site-footer a, .site-footer .widget-title').css('color', newval );
		} );
	} );

	wp.customize( 'footer_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('.site-footer').css('background-color', newval );
		} );
	} );

	wp.customize( 'footer_bottom_color', function( value ) {
		value.bind( function( newval ) {
			$('.footer-bottom').css('color', newval );
		} );
	} );

	wp.customize( 'footer_bottom_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('.footer-bottom').css('background-color', newval );
		} );
	} );
	
} )( jQuery );