<?php get_header(); ?>
<div class="container">
	<div class="content" id="archive">
		<?php 
		   if (have_posts()) : while (have_posts()) : the_post(); 
		?>
			<?php get_template_part('content'); ?>
				<?php endwhile; else: ?>
				    <div class="noss">
					<h1>很抱歉! 无法搜索到与之相匹配的信息。</h1>
					<p>您可以跟换关键词重新搜索或者直接<a href="javascript:void(0);" onclick="history.back();" style="color: #1a0;">点此</a>返回上一页</p>
					<?php get_search_form(); ?>
					</div>
                <?php endif; ?>
	</div>
	<div id="pagination">
	<?php next_posts_link(__('加载更多')); ?>
	</div>
</div>
<?php get_footer(); ?>