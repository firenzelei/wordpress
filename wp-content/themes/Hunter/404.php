<?php 
/**
 * 这个页面是404错误页面 (404 Not Found).
 *
 * @package Theme Hunter
 */
get_header(); ?>
<div class="container">
        <div class="noss">
		<h1>Error-404：很抱歉！您要找的页面无法显示</h1>
		<p>似乎您是在找某篇文章？或许在下面搜索一下可以找到哦！</p>
		<?php get_search_form(); ?><br>
		<p><img class="aligncenter" src="http://www.xszzz.com/wp-content/uploads/2014/09/404.jpg" style="border: none;"></p>
	</div>
</div>
<?php get_footer(); ?>