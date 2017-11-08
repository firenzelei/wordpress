<?php
/**
 * The template for displaying archive pages.
 *
 * @package Integer
 */

get_header(); ?>

<div id="main" class="site-main blogroll <?php integer_grid_class(); ?>" role="main">

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			
			<?php the_archive_title( '<h1 class="page-header__title">', '</h1>' ); ?>
			
			<?php the_archive_description( '<div class="page-header__description">', '</div>' ); ?>
			
		</header><!-- .page-header -->

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content' ); ?>

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

<?php get_sidebar(); ?>

<?php get_footer();
