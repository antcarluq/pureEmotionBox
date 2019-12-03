jQuery(document).ready(function($) {
        var $containter = $('#masonry-container');
        $containter.imagesLoaded( function() {
            	$containter.masonry({
                	itemSelector: '.column',
            	});
        });
});