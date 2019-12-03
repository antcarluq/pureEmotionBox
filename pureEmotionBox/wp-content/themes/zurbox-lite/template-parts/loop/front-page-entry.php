<?php
	global $count;
	$count++;
		
	if ( $count === 1 ) {
?>
		<div class="row medium-up-2 large-up-3">
<?php
	}
	get_template_part( 'template-parts/entry/content-box', get_post_format() );

	if ( $count === 3 ) { $count = 0;
?>
		</div><!-- .row -->
<?php
	}
?>