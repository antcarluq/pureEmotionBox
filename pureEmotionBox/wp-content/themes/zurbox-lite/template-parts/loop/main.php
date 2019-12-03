<?php
	$count = 0;
	if( 'grid' == get_theme_mod( 'home_layout' ) ) {
		while ( have_posts() ) : the_post();

		$count++;
		
		if ( $count === 1 ) { ?>
			<div class="row medium-up-2 large-up-3">
	<?php
		}
			get_template_part( 'template-parts/entry/content-box', get_post_format() );

		if ( $count === 3 ) { $count = 0; ?>
			</div><!-- .row -->
	<?php
		}
		endwhile;
	} elseif( 'masonry' == get_theme_mod( 'home_layout' ) ) {
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/entry/content-box', get_post_format() );
		endwhile;
	} else {
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/entry/content', get_post_format() );
		endwhile;
	}
?>