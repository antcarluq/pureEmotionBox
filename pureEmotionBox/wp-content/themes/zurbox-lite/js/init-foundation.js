jQuery(document).foundation();
/* 
These functions make sure WordPress 
and Foundation play nice together.
*/

jQuery(document).ready(function() {

	// Add button class to certain buttons in the theme
	jQuery('input[type="submit"]').addClass('button');

    	// Add clearfix class to gallery
	jQuery('.gallery').addClass('clearfix');
    
    	// Remove empty P tags created by WP inside of Accordion and Orbit
    	jQuery('.accordion p:empty, .orbit p:empty').remove();
    
	 // Makes sure last grid item floats left
	jQuery('.archive-grid .columns').last().addClass( 'end' );
	
	// Adds Flex Video to YouTube and Vimeo Embeds
	jQuery('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').wrap("<div class='flex-video'/>");

});