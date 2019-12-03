<?php
/**
 * Custom template tags for this theme.
 *
 * @package Zurbox Lite
 */

if ( ! function_exists( 'zurbox_tag_close' ) ) :
/**
 * Display Tag that Closes a container
 *
 * @param string $element	Can be any valid tag element.
 * @param string $comment	Optional, can be any plain text comment.
 */
function zurbox_tag_close( $element = 'div', $comment = null ) {
	echo '</' . $element . '>';
	if ( $comment ) { echo '<!-- ' . $comment . ' -->'; }
}
endif;

if ( ! function_exists( 'zurbox_display_childs' ) ) :
/**
 * The inclusion of a template displaying the child pages
 */
function zurbox_display_childs() {
	if ( is_singular( 'page' ) ) {
		get_template_part( 'template-parts/page/child', 'grid' );
	}
}
endif;

if ( ! function_exists( 'zurbox_top_search_enable' ) ) :
/**
 * The inclusion of a template displaying the top search bar
 */
function zurbox_top_search_enable() {
	if ( get_theme_mod( 'top_search_hide' ) != true ) {
		get_template_part( 'template-parts/top', 'search' );
	}
}
endif;

if ( ! function_exists( 'zurbox_top_widget_enable' ) ) :
/**
 * The inclusion of a template displaying the top widgets bar
 */
function zurbox_top_widget_enable() {
	if ( get_theme_mod( 'top_widget_hide' ) != true ) {
		get_template_part( 'template-parts/top', 'widget' );
	}
}
endif;

if ( ! function_exists( 'zurbox_white_space' ) ) :
/**
 * The Container of white space top and bottom
 */
function zurbox_white_space() {
		echo '<div class="space"></div>';
}
endif;

if ( ! function_exists( 'zurbox_offcanvas_start' ) ) :
/**
 * The inclusion of a template displaying the off-canvas menu
 */
function zurbox_offcanvas_start() {
	if ( get_theme_mod( 'mobile_menu_layout' ) == 'offcanvas' ) {
		get_template_part( 'template-parts/menu-offcanvas' );
	}
}
endif;

if ( ! function_exists( 'zurbox_offcanvas_end' ) ) :
/**
 * Closing off-canvas containers
 */
function zurbox_offcanvas_end() {
	if ( get_theme_mod( 'mobile_menu_layout' ) == 'offcanvas' ) {
		zurbox_tag_close( 'div', 'Close off-canvas wrapper inner' );
		zurbox_tag_close( 'div', 'Close off-canvas wrapper' );
		zurbox_tag_close( 'div', 'Close off-canvas content wrapper' );
	}
}
endif;

if ( ! function_exists( 'zurbox_header_bar' ) ) :
/**
 * The inclusion of a template displaying the menu top bar
 */
function zurbox_header_bar() {
	get_template_part( 'template-parts/top-bar' );
}
endif;

if ( ! function_exists( 'zurbox_post_comments' ) ) :
/**
 * The inclusion of a template displaying the post comments / form
 */
function zurbox_post_comments() {
	zurbox_enable_comments();
}
endif;

if ( ! function_exists( 'zurbox_post_navigation' ) ) :
/**
 * The inclusion of a template displaying the posts navigation
 */
function zurbox_post_navigation() {
	// Post Navigation
	the_post_navigation();
}
endif;

if ( ! function_exists( 'zurbox_author_block' ) ) :
/**
 * The inclusion of a template displaying the post author box
 */
function zurbox_author_block() {
	// Author Box
	get_template_part( 'template-parts/post/author' );
}
endif;

if ( ! function_exists( 'zurbox_post_content' ) ) :
/**
 * The inclusion of a template displaying the post content
 */
function zurbox_post_content() {
	// Main Content
	get_template_part( 'template-parts/post/content', get_post_format() );
}
endif;

if ( ! function_exists( 'zurbox_page_content' ) ) :
/**
 * The inclusion of a template displaying the page content
 */
function zurbox_page_content() {
	// Main Content
	get_template_part( 'template-parts/page/content' );
}
endif;

if ( ! function_exists( 'zurbox_page_header' ) ) :
/**
 * The inclusion of a template displaying the page header
 */
function zurbox_page_header() {
	if ( is_home() ) {
		get_template_part( 'template-parts/page-header/blog' );
	}
	if ( is_archive() ) {
		get_template_part( 'template-parts/page-header/archive' );
	}
}
endif;

if ( ! function_exists( 'zurbox_credits' ) ) :
/**
 * The inclusion of a template displaying the credits info
 */
function zurbox_credits() {
	if ( true != get_theme_mod( 'disable_credits' ) ) {
		get_template_part( 'template-parts/footer', 'credits' );
	}
}
endif;

if ( ! function_exists( 'zurbox_copytext' ) ) :
/**
 * The inclusion of a template displaying the credits info
 */
function zurbox_copytext() {
	if( get_theme_mod( 'disable_date_copy' ) != true || get_theme_mod( 'copyright' ) ) {
		echo '<div class="site-info">';
	}
	if( get_theme_mod( 'disable_date_copy' ) != true ) {
		echo '&copy; '.date('Y') . '&nbsp;&middot;&nbsp;';
	}
	if ( get_theme_mod( 'copyright' ) ) {
		echo esc_html( get_theme_mod( 'copyright', 'All Rights Reserved' ) );
	}
	if( get_theme_mod( 'disable_date_copy' ) != true || get_theme_mod( 'copyright' ) ) {
		echo '</div>';
	}
}
endif;

if ( ! function_exists( 'zurbox_masonry_wrap_start' ) ) :
/**
 * Masonry container wrap start 
 */
function zurbox_masonry_wrap_start() {
	if ( is_home() && 'masonry' == get_theme_mod( 'home_layout' ) || is_archive() && 'masonry' == get_theme_mod( 'archive_layout' ) ) {
		get_template_part( 'template-parts/layout/masonry-wrap-start' );
	}
}
endif;

if ( ! function_exists( 'zurbox_masonry_wrap_end' ) ) :
/**
 * Masonry container wrap end
 */
function zurbox_masonry_wrap_end() {
	if ( is_home() && 'masonry' == get_theme_mod( 'home_layout' ) || is_archive() && 'masonry' == get_theme_mod( 'archive_layout' ) ) {
		zurbox_tag_close( 'div', '#masonry-container' );
	}
}
endif;

if ( ! function_exists( 'zurbox_singular_header' ) ) :
/**
 * Singular Header with Thumbnail/Featured Image
 */
function zurbox_singular_header() {
	if ( has_post_thumbnail() ) {
		if ( is_single() && get_theme_mod( 'featured_image_post' ) == 'overlay' ) {
			$singular_header = get_template_part( 'template-parts/singular', 'header' );
		}
		if ( is_page() && get_theme_mod( 'featured_image_page' ) == 'overlay' ) {
			$singular_header = get_template_part( 'template-parts/singular', 'header' );
		}
	}
}
endif;

if ( ! function_exists( 'zurbox_main_wrap_before' ) ) :
/**
 * Wrap before main wrap
 */
function zurbox_main_wrap_before() {
	if ( is_home() ) {
		if( 'grid' != get_theme_mod( 'home_layout' ) && 'masonry' != get_theme_mod( 'home_layout' ) ) {
			get_template_part( 'template-parts/layout/div', 'row-open' );
		}
	} elseif ( is_archive() ) {
		if( 'grid' != get_theme_mod( 'archive_layout' ) && 'masonry' != get_theme_mod( 'archive_layout' ) ) {
			get_template_part( 'template-parts/layout/div', 'row-open' );
		}
	} else {
		get_template_part( 'template-parts/layout/div', 'row-open' );
	}
}
endif;

if ( ! function_exists( 'zurbox_content_wrap_start' ) ) :
/**
 * Main Content wrap begin
 */
function zurbox_content_wrap_start() {
	get_template_part( 'template-parts/layout/content-wrap', 'start' );
}
endif;

if ( ! function_exists( 'zurbox_content_wrap_end' ) ) :
/**
 * Main Content wrap end
 */
function zurbox_content_wrap_end() {
	zurbox_tag_close( 'main', '#main' );
	zurbox_tag_close( 'div', '#primary' );
}
endif;

if ( ! function_exists( 'zurbox_main_wrap_after' ) ) :
/**
 * Wrap after main wrap
 */
function zurbox_main_wrap_after() {
	if ( is_home() ) {
		if( 'grid' != get_theme_mod( 'home_layout' ) && 'masonry' != get_theme_mod( 'home_layout' ) ) {
			zurbox_tag_close( 'div', '.row' );
		}
	} elseif ( is_archive() ) {
		if( 'grid' != get_theme_mod( 'archive_layout' ) && 'masonry' != get_theme_mod( 'archive_layout' ) ) {
			zurbox_tag_close( 'div', '.row' );
		}
	} else {
		zurbox_tag_close( 'div', '.row' );
	}
}
endif;

if ( ! function_exists( 'zurbox_enable_sidebar' ) ) :
/**
 * Enable Sidebar
 */
function zurbox_enable_sidebar() {
	if ( is_home() ) {
		if( 'grid' != get_theme_mod( 'home_layout' ) && 'masonry' != get_theme_mod( 'home_layout' ) ) {
			if ( is_active_sidebar( 'sidebar-main' ) || is_active_sidebar( 'sidebar-sticky' ) ) {
				get_sidebar();
			}
		}
	} elseif ( is_archive() ) {
		if( 'grid' != get_theme_mod( 'archive_layout' ) && 'masonry' != get_theme_mod( 'archive_layout' ) ) {
			if ( is_active_sidebar( 'sidebar-main' ) || is_active_sidebar( 'sidebar-sticky' ) ) {
				get_sidebar();
			}
		}
	} else {
		if ( ! is_page_template( 'page-templates/full-width.php' ) ) {
			if ( is_active_sidebar( 'sidebar-main' ) || is_active_sidebar( 'sidebar-sticky' ) ) {
				get_sidebar();
			}
		}
	}
}
endif;

if ( ! function_exists( 'zurbox_enable_comments' ) ) :
/**
 * Enable Comments
 */
function zurbox_enable_comments() {
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
}
endif;

if ( ! function_exists( 'zurbox_header_layout' ) ) :
/**
 * Adding classes to site header wrap
 */
function zurbox_header_layout() {
	if ( get_theme_mod( 'menu_layout' ) == 'centered' ) {
		echo ' center-align';
	}
}
endif;

if ( ! function_exists( 'zurbox_content_layout' ) ) :
/**
 * Adding classes to content wrap
 */
function zurbox_content_layout() {
	if( is_home() && 'grid' == get_theme_mod( 'home_layout' ) || is_home() && 'masonry' == get_theme_mod( 'home_layout' ) ) {
			echo ' blog-grid';
	}
	elseif( is_archive() && 'grid' == get_theme_mod( 'archive_layout' ) || is_archive() && 'masonry' == get_theme_mod( 'archive_layout' ) ) {
			echo ' blog-grid';
	}
	elseif( is_page_template( 'page-templates/full-width.php' ) ) {
			echo ' large-12 columns';
	} else {
  		if ( is_active_sidebar( 'sidebar-main' ) || is_active_sidebar( 'sidebar-sticky' ) ) :
			if ( get_theme_mod( 'sidebar_position' ) == 'left-sidebar' ) {
				$layout = ' large-push-4 ';
			} else {
				$layout = ' ';
			}
    			echo ' small-12 large-8' . $layout . 'columns'; // large-push-4
  		else :
    			echo ' small-12 large-8 large-centered columns';
  		endif;
	}
}
endif;

if ( ! function_exists( 'zurbox_post_date' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function zurbox_post_date() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x('Posted on %s', 'post date', 'zurbox-lite' ),
		'<a href="' . esc_url( home_url( '/' ) . get_the_date( 'Y/m/d/' ) ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	echo '<span class="entry-meta">' . $posted_on . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'zurbox_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function zurbox_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'zurbox-lite' ),
		'<a href="' . esc_url( home_url( '/' ) . get_the_date( 'Y/m/d/' ) ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'zurbox-lite' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	if( !is_singular('post') && get_theme_mod('hide_entry_date') != true || is_singular('post') && get_theme_mod('hide_post_date') != true ) {
		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
	}
	if( !is_singular('post') && get_theme_mod('hide_entry_author') != true || is_singular('post') && get_theme_mod('hide_post_author') != true) {
		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
	}
}
endif;

if ( ! function_exists( 'zurbox_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function zurbox_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'zurbox-lite' ) );
		if ( $categories_list && zurbox_categorized_blog() && get_theme_mod('hide_post_cats') != true ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'zurbox-lite' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'zurbox-lite' ) );
		if ( $tags_list && get_theme_mod('hide_post_tags') != true ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'zurbox-lite' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'zurbox-lite' ), esc_html__( '1 Comment', 'zurbox-lite' ), esc_html__( '% Comments', 'zurbox-lite' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'zurbox-lite' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function zurbox_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'zurbox_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'zurbox_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so zurbox_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so zurbox_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in zurbox_categorized_blog.
 */
function zurbox_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'zurbox_categories' );
}
add_action( 'edit_category', 'zurbox_category_transient_flusher' );
add_action( 'save_post',     'zurbox_category_transient_flusher' );

if ( ! function_exists( 'zurbox_entry_comments' ) ) :
/**
 * Prints HTML with meta information for comments only.
 */
function zurbox_entry_comments() {
	if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'zurbox-lite' ), esc_html__( '1 Comment', 'zurbox-lite' ), esc_html__( '% Comments', 'zurbox-lite' ) );
		echo '</span>';
	}
}
endif;


if ( ! function_exists( 'zurbox_posts_pagination' ) ) :
/**
 * Posts nav/pagination
 */
function zurbox_posts_pagination() {
	if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) {
			return;
	} else {
	echo '<div class="column row">';
		the_posts_pagination( array(
					'show_all'     => False,
					'end_size'     => 1,
					'mid_size'     => 5,
					'prev_next'    => True,
					'prev_text'    => esc_html__( 'Previous', 'zurbox-lite' ),
					'next_text'    => esc_html__( 'Next', 'zurbox-lite' ),
					'add_args'     => False,
					'add_fragment' => '',
					'screen_reader_text' => esc_html__( 'Posts navigation', 'zurbox-lite' ),
					'type' => 'list',
				) );
	echo '</div>';
	}
}
endif;

/**
 * Footer credits.
 */
function zurbox_txt_credits() {
	$text = sprintf( esc_html__( 'Powered by %s', 'zurbox-lite' ), '<a href="http://wordpress.org/">WordPress</a>' );
	$text .= '<span class="sep"> &middot; </span>';
	$text .= sprintf( esc_html__( 'Theme by %s', 'zurbox-lite' ), '<a href="http://www.dinevthemes.com/">DinevThemes</a>' );
	echo apply_filters( 'zurbox_txt_credits', $text );
}
add_action( 'zurbox_credits', 'zurbox_txt_credits' );