<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package Integer
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function integer_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Add index class.
	if ( integer_is_blog() || is_archive() || is_search() ) {
		$classes[] = 'index';
	}

	// Add class if the site title and tagline is hidden.
	if ( 0 == get_theme_mod( 'header_text', 1 ) ) {
		$classes[] = 'title-tagline-hidden';
	}

	// Add class if the site title and tagline is hidden.
	if ( get_theme_mod( 'sticky_header', 1 ) ) {
		$classes[] = 'sticky-header';
	}

	return $classes;
}
add_filter( 'body_class', 'integer_body_classes' );

/**
 * Detects blog index page.
 */
function integer_is_blog() {
	if ( is_front_page() && is_home() ) {
		return true;
	} elseif ( is_front_page() ) {
		return false;
	} elseif ( is_home() ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Outputs the grid class.
 */
function integer_grid_class() {
	if ( 'grid' == get_theme_mod( 'blog_layout' ) ) {
		echo 'blogroll-grid';
	} else {
		echo 'blogroll-column';
	}
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function integer_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'integer' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'integer_excerpt_more' );

/**
 * Filters the_category() to output HTML5 valid rel tag.
 *
 * @param string $text markup containing list of categories.
 */
function integer_category_rel( $text ) {
	$search  = array( 'rel="category"', 'rel="category tag"' );
	$replace = 'rel="tag"';
	$text    = str_replace( $search, $replace, $text );
	return $text;
}
add_filter( 'the_category', 'integer_category_rel' );

/**
 * Update maximum srcset image width.
 *
 * @param int $max_width Maximum allowed image width.
 */
function integer_remove_max_srcset_image_width( $max_width ) {
	return 2880;
}
add_filter( 'max_srcset_image_width', 'integer_remove_max_srcset_image_width' );

