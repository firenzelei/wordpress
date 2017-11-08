<?php get_header(); ?>
<div class="container">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('entry-content'); ?>>
		<div class="content">
		<?php the_content(); ?>
		</div>
	</article>
	<?php
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
	?>
	<?php endwhile; ?>
	<?php endif; ?>
</div>
<?php get_footer(); ?>