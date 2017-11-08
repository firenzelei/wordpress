<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- 移动端适应 -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<?php $options=get_option('w_options'); ?>
    <?php include('seo.php'); ?>
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon">

    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/highlight.min.js"></script>
    <script >hljs.initHighlightingOnLoad();</script>
	<!-- IE9以下支持HTML5和CSS3 -->
	<!--[if lt IE 9]>
		<script src="http://apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
		<script src="http://apps.bdimg.com/libs/respond.js/1.4.2/respond.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
  </head>
<body>
<!-- 导航 -->
<nav id="topnav" class="yapiskan">
	<div class="container">
		<div class="navbar-header">
			<div class="home-logo"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php if($options["w_logo"]){?><img src="<?php echo $options['w_logo']; ?>" alt="<?php bloginfo('name'); ?>"><?php } else { ?><?php bloginfo('name'); ?><?php } ?></a></div>
			<!-- 移动端菜单 -->
			<div class="mobile-menu">
				<a class="iconfont iconfont-menu" style="cursor:pointer;">&#xe605;</a>
				<!--侧滑-->
				<div class="left-menu">
					<h3>Menu</h3>
					<?php if ( has_nav_menu('header-menu')){ ?>
						<?php wp_nav_menu( array( 'container' => false, 'menu_class' => 'left-menu-ul', 'theme_location' => 'header-menu' ) ); ?>
						<?php } else { ?>
						<p style="padding:10px"><a target="_blank" href="<?php bloginfo('url'); ?>/wp-admin/nav-menus.php">请点此跳转到后台外观-菜单处设置您的导航自定义菜单</a></p>
					<?php } ?>
					<a style="cursor:pointer;" class="close-menu iconfont">&#xe609;</a>
				</div>
			</div>
			<!-- 移动端菜单END -->
		</div>
		<div class="navbar-menu">
		    <?php if ( has_nav_menu('header-menu')){ ?>
			    <?php wp_nav_menu( array( 'container' => false, 'menu_class' => 'top-menu', 'theme_location' => 'header-menu' ) ); ?>
				<?php } else { ?>
				<ul style="line-height:64px" class="top-menu"><a target="_blank" href="<?php bloginfo('url'); ?>/wp-admin/nav-menus.php">请点此跳转到后台设置您的导航自定义菜单</a></ul>
			<?php } ?>
			<ul class="navbar-search">
				<!-- 搜索按钮 -->
				<a class="iconfont iconfont-search" style="cursor:pointer;">&#xe610;</a>
				<!--弹框-->
				<div class="search-window">
						<div class="form-group">
						<form role="search" method="get" action="<?php bloginfo('url'); ?>">
						<input type="text" name="s" class="form-control" placeholder="请输入关键字...">
						<button type="submit" class="search-btn iconfont">&#xe610;</button>
						</form>
						</div>
						<a style="cursor:pointer;" class="close-search iconfont">&#xe609;</a>
				</div><!-- 搜索按钮END -->
			</ul>
		</div>
	</div>
</nav><!-- 导航END -->

<!-- 大标题 -->
<?php get_template_part( 'loop', get_post_format() ); ?>
<!-- 大标题END -->