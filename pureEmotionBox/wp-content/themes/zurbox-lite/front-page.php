<?php
/**
 * The front page template file.
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear. Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Zurbox Lite
 */

if ( 'posts' == get_option( 'show_on_front' ) ) :
	get_template_part( 'index' );
else :
get_header(); ?>

<?php get_template_part( 'template-parts/front-page/hero' ); ?>

<?php if ( true != zurbox( 'hide_frontpage_content' ) ) { ?>
	<?php if ( get_theme_mod( 'frontpage_content_layout' ) == 'box' || ! get_theme_mod( 'frontpage_content_layout' ) ) { ?>
		<div class="row small-collapse">
			<div id="primary" class="content-area small-centered large-8 column">
				<main id="main" class="site-main" role="main">

			<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/front-page/content', 'box' );
				endwhile;
			?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .row -->
	<?php } ?>
	<?php if ( get_theme_mod( 'frontpage_content_layout' ) == 'full' ) { ?>
		<div class="row expanded frontpage-content">
<div class="row">
			<div id="primary" class="content-area large-12 columns">
				<main id="main" class="site-main" role="main">

			<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/front-page/content', 'full' );
				endwhile;
			?>

				</main><!-- #main -->
			</div><!-- #primary -->
</div>
		</div><!-- .row -->
	<?php } ?>
<?php } ?>

<?php
// Get homepage blocks
$sections = get_theme_mod( 'section_order' );

// Turn blocks into array
if ( $sections ) :				
	$sections = explode( ',', $sections );
	foreach ( $sections as $section ) :
		if ( 'widget-wide:1' == $section ) :
			get_template_part( 'template-parts/front-page/section', 'widget-wide' );

		elseif ( 'widget-column:1' == $section ) :
			get_template_part( 'template-parts/front-page/section', 'widget-column' );

		elseif ( 'widget-box:1' == $section ) :
			get_template_part( 'template-parts/front-page/section', 'widget-box' );

		endif;

	endforeach;
endif; ?>

<?php
endif;
get_footer();