<header class="page-header">

<?php if ( 'grid' == get_theme_mod( 'archive_layout' ) || 'masonry' == get_theme_mod( 'archive_layout' ) ) { ?>
	<div class="column row">
<?php } ?>

<?php
	the_archive_title( '<h1 class="page-title">', '</h1>' );
	the_archive_description( '<div class="taxonomy-description">', '</div>' );
?>

<?php if ( 'grid' == get_theme_mod( 'archive_layout' ) || 'masonry' == get_theme_mod( 'archive_layout' ) ) { ?>
	</div>
<?php } ?>

</header><!-- .page-header -->
