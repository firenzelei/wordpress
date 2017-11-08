<?php
get_header(); 
?>
 <?php 
 $option=get_option('erlsimple_theme_options');
 if($option['if_bg_on']==1):
 ?>
 <style>
.nav-bar{ display:none;}
</style>
<header class="site-header">
	<div class="site-header-inner">
		<a href="<?php bloginfo('siteurl'); ?>" rel="home" >
		<h1><!--<img src="<?php bloginfo('template_url') ?>/images/logohome.png" id="logo" class="animated fadeInDown">-->
		<?php echo get_bloginfo('name');?>
		</h1></a>
		<h2 class="animated fadeInUp"><?php echo get_bloginfo('description');?></h2>
	</div><!-- /.site-header-inner -->
</header>
<?php endif;?>
<div class="container">
	<div class="main">
		<div class="content">
				<div class="posts-inner">
			<section class="posts">
					<?php 
					if (have_posts()) :
						while (have_posts()) : the_post();
							get_template_part( 'content');
						endwhile;
						paging_nav();
					else:?>
					<h3 style="margin-top:45px; text-align:center"><i class="fa fa-exclamation-triangle"></i>&nbsp;&nbsp;暂无文章发表！</h3>
					<?php endif;?>
				</div><!-- /.posts-inner -->
			</section>
		</div>
	<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>