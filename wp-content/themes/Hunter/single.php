<?php get_header(); ?>
	<div class="container">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('entry-content'); ?>>
			<div class="content">
			<?php the_content(); ?>
			</div>
			<!--点赞-赞助-分享-->
			<?php get_template_part( 'support', get_post_format() ); ?>
		</article>
		<nav class="pager">
			<li class="previous"><a class="prev">上一篇</a><?php $prev_post = get_previous_post();if (!empty( $prev_post )): ?><a style="display:none" class="prevspan" title="<?php echo $prev_post->post_title; ?>" href="<?php echo get_permalink( $prev_post->ID ); ?>"><?php echo $prev_post->post_title; ?></a><?php else: ?><a style="display:none" class="prevspan">没有上一篇了</a><?php endif; ?></li>
			<li class="nextpost"><a class="next">下一篇</a><?php $next_post = get_next_post();if (!empty( $next_post )): ?><a style="display:none" class="nextspan" title="<?php echo $next_post->post_title; ?>" href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo $next_post->post_title; ?></a><?php else: ?><a style="display:none" class="nextspan">没有下一篇了</a><?php endif; ?></li>
	    </nav>
		<?php
		if ( comments_open() || get_comments_number() ) :
		comments_template();
		endif;
		?>
		<?php endwhile; ?><?php endif; ?>
	</div>
<?php get_footer(); ?>