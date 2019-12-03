<?php
/**
 * Zurbox theme hooks
 * @see  template-tags.php
 * @package Zurbox Lite
 */

/**
 * Off-Canvas Menu
 *
 * @see  zurbox_offcanvas_start()
 * @see zurbox_offcanvas_end()
 */
add_action( 'zurbox_sitepage_before', 'zurbox_offcanvas_start', 10 );
add_action( 'zurbox_sitepage_after', 'zurbox_offcanvas_end', 10 );

/**
 * Top Menu Bar
 *
 * @see  zurbox_header_bar()
 */
add_action( 'zurbox_site_header', 'zurbox_header_bar', 10 );

/**
 * Extra Top Menu Bar
 *
 * @see  zurbox_top_search_enable()
 * @see  zurbox_top_widget_enable()
 */
add_action( 'zurbox_site_header_after', 'zurbox_top_search_enable', 10 );
add_action( 'zurbox_site_header_after', 'zurbox_top_widget_enable', 20 );

/**
 * Content Before
 * Layout/Content wrapper start
 *
 * @see  zurbox_singular_header()
 * @see  zurbox_main_wrap_before()
 * @see  zurbox_content_wrap_start()
 */
add_action( 'zurbox_content_before', 'zurbox_singular_header', 0 );
add_action( 'zurbox_content_before', 'zurbox_main_wrap_before', 10 );
add_action( 'zurbox_content_before', 'zurbox_content_wrap_start', 20 );

/**
 * Home/Archive Loop Before
 */
add_action( 'zurbox_before_index_loop', 'zurbox_page_header', 0 );
add_action( 'zurbox_before_archive_loop', 'zurbox_page_header', 0 );
add_action( 'zurbox_before_index_loop', 'zurbox_masonry_wrap_start', 10 );
add_action( 'zurbox_before_archive_loop', 'zurbox_masonry_wrap_start', 10 );

/**
 * Home/Archive Loop After
 *
 * @see  zurbox_masonry_wrap_end()
 * @see  zurbox_masonry_wrap_end()
 */
add_action( 'zurbox_after_index_loop', 'zurbox_masonry_wrap_end', 10 );
add_action( 'zurbox_after_archive_loop', 'zurbox_masonry_wrap_end', 10 );


/**
 * Content After
 * Layout/Content wrapper end
 *
 * @see  zurbox_content_wrap_end()
 * @see  zurbox_enable_sidebar()
 * @see  zurbox_main_wrap_after()
 */
add_action( 'zurbox_content_after', 'zurbox_content_wrap_end', 10 );
add_action( 'zurbox_content_after', 'zurbox_enable_sidebar', 20 );
add_action( 'zurbox_content_after', 'zurbox_main_wrap_after', 30 );

if ( ! is_singular() ) {
	add_action( 'zurbox_content_after', 'zurbox_posts_pagination', 40 );
}

/**
 * Post
 */
add_action( 'zurbox_post', 'zurbox_post_content', 10 );
add_action( 'zurbox_post', 'zurbox_author_block', 20 );
add_action( 'zurbox_post', 'zurbox_post_navigation', 30 );
add_action( 'zurbox_post', 'zurbox_post_comments', 40 );

/**
 * Page
 *
 * @see  zurbox_page_content()
 * @see  zurbox_post_comments()
 */
add_action( 'zurbox_page', 'zurbox_page_content', 10 );
add_action( 'zurbox_page', 'zurbox_post_comments', 20 );

/**
 * Child pages
 */
add_action( 'zurbox_singular_loop_after', 'zurbox_display_childs', 10 );

/**
 * FontPage Sections
 *
 * @see  zurbox_white_space()
 */
add_action( 'zurbox_widgets_columns_before', 'zurbox_white_space', 10 );
add_action( 'zurbox_widgets_columns_after', 'zurbox_white_space', 10 );

/**
 * Footer
 *
 * @see  zurbox_copytext()
 * @see  zurbox_credits()
 */
add_action( 'zurbox_footer_left', 'zurbox_copytext', 10 );
add_action( 'zurbox_footer_right', 'zurbox_credits', 10 );