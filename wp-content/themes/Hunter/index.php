<?php get_header(); ?>
<div class="home-container">
	<div class="content" id="archive">
		<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
	</div>
	<div id="pagination">
	<?php next_posts_link(__('加载更多')); ?>
	</div>
</div>
<?php get_footer(); ?>