<?php
/**
 * The main template file.
 *
 * @package Integer
 */

get_header(); ?>

<div id="main" class="site-main blogroll <?php integer_grid_class(); ?>" role="main">

	<?php if ( have_posts() ) : ?>

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
