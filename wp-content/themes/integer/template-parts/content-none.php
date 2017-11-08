<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package Integer
 */

?>

<div class="not-found">

	<header class="page-header">
		
		<h1 class="page-header__title"><?php esc_html_e( 'Nothing Found', 'integer' ); ?></h1>
		
	</header><!-- .page-header -->
	
	<div class="not-found__content">

		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php integer_first_post_link(); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'integer' ); ?></p>

			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'integer' ); ?></p>

			<?php get_search_form(); ?>

		<?php endif; ?>
	
	</div>

</div><!-- .not-found -->
