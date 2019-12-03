<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Zurbox Lite
 */

/**
 * Add a custom menu extra item
 */
function zurbox_extra_menu_link( $items, $args ) {
	if ( $args->theme_location == 'top-bar-r' ) {
		if ( is_active_sidebar( 'top-extra' ) ) {
			$items .= '<li class="more-item-icon"><a data-toggle="menuBar"><i class="fa fa-ellipsis-h fa-2x" aria-hidden="true"></i></a></li>';
		}
		if ( class_exists( 'woocommerce' ) && function_exists( 'WC' ) && apply_filters( 'zurbox_show_cart_item', true ) ) {
			$items .= '<li class="shop-item-icon"><a href="' . esc_url( wc_get_cart_url() ) . '" class="cart-contents"><i class="fa fa-shopping-cart"></i></a></li>';
		}
		if ( get_theme_mod( 'top_search_hide' ) != true ) {
			$items .= '<li class="search-item-icon"><a data-toggle="searchBar"><i class="fa fa-search" aria-hidden="true"></i></a></li>';
		}
   	}
   	return $items;
}
add_filter( 'wp_nav_menu_items', 'zurbox_extra_menu_link', 10, 2 );

/**
 * Background Color/Image of the Content
 */
// Removes custom-background from the body_class array.
function zurbox_body_class_filter( $classes ) {
	if ( $key = array_search( 'custom-background', $classes ) )
		unset( $classes[ $key ] );
	return $classes;
}
add_filter( 'body_class', 'zurbox_body_class_filter' );

// Callback func, see functions.php
function zurbox_custom_background() {
	$background = get_background_image();
	$color = get_background_color();

	if ( ! $background && ! $color ) {
		return;
	}

	$style = $color ? "background-color: #$color;" : '';

	if ( $background ) {
		$image = " background-image: url('$background');";

		$repeat = get_theme_mod( 'background_repeat', 'repeat' );

		if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) ) {
			$repeat = 'repeat';
		}
		$repeat = " background-repeat: $repeat;";

		$position = get_theme_mod( 'background_position_x', 'left' );

		if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) ) {
			$position = 'left';
		}
		$position = " background-position: top $position;";

        		$attachment = get_theme_mod( 'background_attachment', 'scroll' );

		if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) ) {
            			$attachment = 'scroll';
		}
        		$attachment = " background-attachment: $attachment;";

        	$style .= $image . $repeat . $position . $attachment;
    }
?>
<style type="text/css" id="custom-background-css">
	.custom-background { <?php echo trim( $style ); ?> }
</style>
<?php
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function zurbox_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( is_home() ) {
		if ( 'grid' == get_theme_mod( 'home_layout' ) ) {
			$classes[] = 'box-grid';
		}
		if ( 'masonry' == get_theme_mod( 'home_layout' ) ) {
			$classes[] = 'masonry-grid';
		}
	}

	if ( is_archive() ) {
		if ( 'grid' == get_theme_mod( 'archive_layout' ) ) {
			$classes[] = 'box-grid';
		}
		if ( 'masonry' == get_theme_mod( 'archive_layout' ) ) {
			$classes[] = 'masonry-grid';
		}
	}

	return $classes;
}
add_filter( 'body_class', 'zurbox_body_classes' );

/**
 * Adds custom classes to the array of post classes.
 *
 * @param array $classes Classes for the post element.
 * @return array
 */
function zurbox_post_classes( $classes ) {

	$background = get_background_image();
	$color = get_background_color();

	if ( $background || $color != 'ffffff' ) :

		if ( 'grid' != get_theme_mod( 'home_layout' ) && is_home() ||  'grid' != get_theme_mod( 'archive_layout' ) && is_archive() ) {
			$classes[] = 'blog-entry box';
		}

	endif;

	return $classes;
}
add_filter( 'post_class', 'zurbox_post_classes' );

/**
 * Add class depending on the number of widgets
 * 
 * @link  http://codex.wordpress.org/Function_Reference/wp_list_comments
 * @since 1.0.0
 */
function zurbox_sidebar_params($params) {
    $sidebar_id = $params[0]['id'];

    if ( $sidebar_id == 'sidebar-bottom' ) {
        $total_widgets = wp_get_sidebars_widgets();
        $sidebar_widgets = count($total_widgets[$sidebar_id]);
        $params[0]['before_widget'] = str_replace('class="', 'class="span' . floor(12 / $sidebar_widgets) . ' ', $params[0]['before_widget']);
    }

    return $params;
}
//add_filter('dynamic_sidebar_params','zurbox_sidebar_params');