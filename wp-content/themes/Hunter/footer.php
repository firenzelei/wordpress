<footer>
<?php $options=get_option('w_options'); ?>
<div class="clear"></div>
<div class="cont2-footer">
	<div class="copyright">Copyright &nbsp;·&nbsp;<?php if($options["w_beian"]){?><?php echo $options['w_beian']; ?>&nbsp;·&nbsp;<?php } ?>Design by <a target="_blank" href="http://www.fitcat.xyz">LanerZhao LiShui 2017</a></div>
</div>
</footer>
<div id="back-to-top" class="iconfont" data-scroll="body">&#xe607;</div>
<?php echo stripslashes($options['w_tj']); ?>
</body>
<?php wp_footer(); ?>
</html>