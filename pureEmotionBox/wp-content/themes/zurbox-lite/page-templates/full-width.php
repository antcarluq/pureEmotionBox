<?php
/*
Template Name: Full Width
*/
get_header();
$stored_meta = get_post_meta( $post->ID, 'show_featured_image', true );
?>

<?php do_action( 'zurbox_content_before' ); ?>

<?php zurbox_breadcrumb(); ?>

<?php do_action( 'zurbox_singular_loop_before' ); ?>

<?php while ( have_posts() ) : the_post(); ?>
<?php zurbox_page_content(); ?>
<?php endwhile; ?>

<?php do_action( 'zurbox_singular_loop_after' ); ?>

<?php do_action( 'zurbox_content_after' ); ?>

<?php
get_footer();