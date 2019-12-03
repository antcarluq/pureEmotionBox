<?php
	/* Start the Loop */
	while ( have_posts() ) : the_post();

		if ( ! is_singular( 'page' ) ) {
			do_action( 'zurbox_post' );
		} else {
			do_action( 'zurbox_page' );
		}

	endwhile;
?>