		<div class="clear"></div>
		<a href="#" id="top" tilte="返回顶部"> <i class="fa fa-chevron-up fa-2x"> </i></a>
		<footer class="site-footer">
			<div class="site-info">
				© 2012-2016 <a href="<?php echo home_url();?>"  id="copyright"><?php echo get_bloginfo('name');?></a>
				<em>Theme by <a href="http://zhangshiyu.name" target="_blank">Erl</a></em>
		</div> <!-- .site-info -->
        </footer>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/comments-ajax.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.tooltipster.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/common.js"></script>
		<?php if (is_home() || is_category() ||is_page()):?>
			<script src="<?php bloginfo('template_directory'); ?>/js/jquery.backstretch.min.js"></script>
			<?php include('includes/bgbanner.php'); ?>
		<?php endif;?>
		<?php 
		$option=get_option('erlsimple_theme_options');
		if (is_home() && ($option['if_bg_on']==1)):?>
		<script src="<?php bloginfo('template_directory'); ?>/js/common_scroll.js"></script>
		<?php endif;?>
	</body>
</html>