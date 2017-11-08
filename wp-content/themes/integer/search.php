<?php
/**
 * The template for displaying search results pages.
 *
 * @package Integer
 */

get_header(); ?>

<div id="main" class="site-main blogroll blogroll-column" role="main">

	<?php if ( have_posts() ) : ?>

		<header class="page-header">

			<h1 class="page-header__title">
				<?php
					printf(
						/* Translators: %s: search term. */
						esc_html__( 'Search Results for: %s', 'integer' ),
						'<span>' . get_search_query() . '</span>'
					);
				?>
			</h1>

			<?php get_search_form(); ?>

		</header><!-- .page-header -->

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'search' ); ?>

		<?php endwhile; ?>

		<?php
			the_posts_pagination( array(
				'prev_text' => 'Newer',
				'next_text' => 'Older',
			) );
		?>

	<?php else : ?>

		<?php get_template_part( 'template-parts/content', 'none' ); ?>

	<?php endif; ?>

</div><!-- #main -->

<?php get_footer();
