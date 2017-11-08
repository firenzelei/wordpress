<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Integer
 */

/**
 * Displays the site title.
 */
function integer_site_title() {
	$class = 'site-title';
	if ( ! get_theme_mod( 'display_blogname', true ) ) {
		$class .= ' screen-reader-text';
	}

	if ( is_front_page() && is_home() ) {
		printf( '<h1 class="%s"><a href="%s" rel="home">%s</a></h1>',
			esc_attr( $class ),
			esc_url( home_url( '/' ) ),
			esc_html( get_bloginfo( 'name' ) )
		);
	} else {
		printf( '<p class="%s"><a href="%s" rel="home">%s</a></p>',
			esc_attr( $class ),
			esc_url( home_url( '/' ) ),
			esc_html( get_bloginfo( 'name' ) )
		);
	}
}

/**
 * Displays the site description.
 */
function integer_site_description() {
	$class = 'site-description';
	if ( ! get_theme_mod( 'display_blogdescription', true ) ) {
		$class .= ' screen-reader-text';
	}
	printf( '<p class="%s">%s</p>', esc_attr( $class ), esc_html( get_bloginfo( 'description' ) ) );
}

/**
 * Displays the author link.
 */
function integer_entry_author() {
	// Create the span tag.
	$html = '<span class="entry-meta-item byline author vcard">';

	// Author gravatar.
	$html .= sprintf(
		'<a class="author-avatar" href="%1$s">%2$s</a>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		get_avatar( get_the_author_meta( 'ID' ), 44 )
	);

	// Author archive link.
	$html .= sprintf(
		'<a class="url fn n" href="%1$s">%2$s</a>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		get_the_author()
	);

	// Close the span tag.
	$html .= '</span>';

	echo apply_filters( 'integer_entry_author', $html ); // wpcs: xss ok.
}

/**
 * Displays the post date.
 *
 * Displays the date when the post was published and updated. Can be filtered
 * with the 'integer_entry_date' filter.
 */
function integer_entry_date() {
	$time = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time = sprintf( $time,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$html = sprintf(
		'<span class="entry-meta-item posted-on"><a href="%s" rel="bookmark">%s</a></span>',
		esc_url( get_permalink() ),
		$time
	);

	echo apply_filters( 'integer_entry_date', $html ); // wpcs: xss ok.
}

/**
 * Displays categories.
 *
 * Displays a comma-separated list of links to category archives if the post has
 * categories attached to it. Can be filtered with 'integer_entry_categories'
 * filter.
 */
function integer_entry_categories() {
	// Check if we have categories.
	$categories = get_the_category_list( ', ' );

	// Return if no categories or if there is only one.
	if ( ! $categories ) {
		return;
	}

	// Build the string.
	$html = sprintf(
		'<span class="entry-meta-item cat-links">%s</span>',
		$categories
	);

	// Filter and display.
	echo apply_filters( 'integer_entry_categories', $html ); // wpcs: xss ok.
}

/**
 * Displays page views.
 */
function integer_entry_pageviews() {
	if ( ! has_action( 'pageviews' ) ) {
		return;
	}

	printf( '<span class="entry-meta-item pageviews">%1$s %2$s</span>',  // WPCS: XSS OK.
		'<i class="fa fa-eye" aria-hidden="true"></i>',
		Pageviews::get_placeholder( get_the_ID() )
	);
}

/**
 * Prints HTML with a link to post comments.
 */
function integer_entry_comments_link() {
	if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {

		if ( 0 == intval( get_comments_number() ) ) {
			return;
		}

		echo '<span class="entry-meta-item comments-link">';
			comments_popup_link(
				__( 'Leave a comment', 'integer' ),
				__( 'One Comment', 'integer' ),
				__( '% Comments', 'integer' )
			);
		echo '</span>';
	}
}

/**
 * Displays entry footer widgets if there are any.
 */
function integer_entry_footer_widgets() {
	if ( ! is_active_sidebar( 'sidebar-3' ) ) {
		return;
	}

	echo '<div class="widget-area widget-area-after-content" role="complementary">';

		dynamic_sidebar( 'sidebar-3' );

	echo '</div>';
}

/**
 * Prints the list of Tags.
 */
function integer_entry_tags() {
	if ( 'post' == get_post_type() ) {
		$tags_list = get_the_tag_list( '', '' );
		if ( $tags_list ) {
			printf( '<div class="tags-links">%s</div>', $tags_list ); // WPCS: XSS OK.
		}
	}
}

/**
 * Prints the author bio.
 */
function integer_entry_author_bio() {
	// If we aren't on a single post, don't continue.
	if ( ! is_single() ) {
		return;
	}
	?>
	<div class="entry-author">
		<div class="author-avatar">
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author" target="_blank">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), 48 ); ?>
			</a><!-- .author-avatar -->
		</div>
		<div class="author-description">
			<h4 class="author-heading">
				<?php
					/* Translators: %s: author name. */
					printf( esc_html__( 'Published by %s', 'integer' ), '<span class="author-name">' . get_the_author() . '</span>' );
				?>
			</h4>

			<p class="author-bio">
				<?php the_author_meta( 'description' ); ?>
			</p><!-- .author-bio -->

			<p class="author-url">
				<a href="<?php echo esc_url( get_the_author_meta( 'user_url' ) ); ?>" rel="author" target="_blank">
					<?php esc_html_e( 'Visit website', 'integer' ); ?>
				</a>
			</p><!-- .author-url -->

		</div><!-- .author-description -->
	</div><!-- .entry-auhtor -->
	<?php
}

/**
 * Displays the post meta.
 */
function integer_entry_meta_index() {
	// Only display meta on posts.
	if ( 'post' == get_post_type() ) {

		echo '<div class="entry-meta entry-meta-index">';

		integer_entry_categories();

		integer_entry_date();

		integer_entry_pageviews();

		echo '</div>';
	}
}

/**
 * Displays the post meta.
 */
function integer_entry_meta_before_title() {
	// Only display meta on posts.
	if ( 'post' == get_post_type() ) {

		echo '<div class="entry-meta entry-meta-before-title">';

		integer_entry_categories();

		echo '</div>';
	}
}

/**
 * Displays the post meta before the content.
 */
function integer_entry_meta_before_content() {
	// Only display meta on posts.
	if ( 'post' == get_post_type() ) {

		echo '<div class="entry-meta entry-meta-before-content">';

		integer_entry_author();

		integer_entry_date();

		integer_entry_comments_link();

		integer_entry_pageviews();

		echo '</div>';
	}
}

/**
 * Displays the post meta after the content.
 */
function integer_entry_meta_after_content() {

	echo '<footer class="entry-footer">';

	integer_entry_tags();

	integer_entry_author_bio();

	echo '</footer><!-- .entry-footer -->';

}

/**
 * Displays the post thumbnail on singular posts.
 */
function integer_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	$html = sprintf(
		'<div class="entry-thumbnail">%s</div>',
		get_the_post_thumbnail( null, 'integer-single-thumbnail' )
	);

	echo apply_filters( 'integer_post_thumbnail', $html ); // wpcs: xss ok.
}

/**
 * Displays post thumbnail.
 */
function integer_post_thumbnail_archive() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	$html = sprintf(
		'<a class="blogroll-item__thumbnail" href="%1$s">%2$s</a>',
		esc_url( apply_filters( 'the_permalink', get_permalink() ) ),
		get_the_post_thumbnail( null, 'integer-blog-thumbnail' )
	);

	echo apply_filters( 'integer_post_thumbnail_archive', $html ); // wpcs: xss ok.
}

/**
 * Displays Post Navigation.
 *
 * Displays Newer Post/Older Post links along with post titles on a single post
 * page. Can be filtered with 'integer_post_navigation' filter.
 */
function integer_post_navigation() {
	// Check if whe have posts to navigate to.
	$prev = get_previous_post_link( '<div class="nav-pre"><span>' . esc_html__( 'Older Post', 'integer' ) . ' </span>%link</div>' );
	$next = get_next_post_link( '<div class="nav-nxt"><span>' . esc_html__( 'Newer Post', 'integer' ) . ' </span>%link</div>' );

	// Return if there are none.
	if ( ! $prev && ! $next ) {
		return;
	}

	// Create the markup for the links.
	$html = _navigation_markup( $next . $prev, 'post-navigation' );

	// Filter and echo the navigation.
	echo apply_filters( 'integer_post_navigation', $html ); // wpcs: xss ok.
}

/**
 * Displays Comment Navigation.
 */
function integer_comment_navigation() {
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'integer' ); ?></h2>
			<div class="nav-links">
				<div class="nav-pre"><?php previous_comments_link( esc_html__( 'Older Comments', 'integer' ) ); ?></div>
				<div class="nav-nxt"><?php next_comments_link( esc_html__( 'Newer Comments', 'integer' ) ); ?></div>
			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
	<?php endif;
}

/**
 * Displays a link to the Dashboard new post page.
 */
function integer_first_post_link() {
	// Only allow links in the message.
	$args = array(
		'a' => array(
			'href' => array(),
		),
	);

	// Sanitize and print the message.
	printf(
		wp_kses(
			/* Translators: 1: link to WP admin new post page. */
			__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'integer' ),
			$args
		),
		esc_url( admin_url( 'post-new.php' ) )
	);
}

/**
 * Displays Footer Text.
 */
function integer_footer_text() {
	printf(
		/* Translators: 1: name of the theme, 2: Name of the theme shop. */
		esc_html__( '%1$s theme by %2$s', 'integer' ),
		'Integer',
		'<a href="https://themepatio.com/">ThemePatio</a>'
	);
}
