<div id="comments">
<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.'); ?></p>
<!-- #comments -->
<?php
		/* 本文件由Lanerzhao制作，禁止引用到其他主题*/
		return;
	endif;
?>
	<?php if (comments_open()): ?>
		<div id="respond">
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			    <?php if($user_ID): ?>
					<div class="welcome">
						<div class="user_avatar"><?php echo get_avatar( get_the_author_email(), '16' ); ?></div>
						<div class="hello_user"><a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>，<a href="<?php echo wp_logout_url(get_permalink()); ?>" style="color:#F96B4D;" title="注销登录">退出</a></div>
					</div>
					<?php else: ?>
					<?php if(isset($_COOKIE['comment_author_email_'.COOKIEHASH]) && isset($_COOKIE['comment_author_'.COOKIEHASH]))  : ?>
					<div class="welcome">
						<div class="user_avatar"><?php echo get_avatar($comment_author_email, $size = '16');  ?></div>
						<div class="hello_user">
						<?php printf(__('欢迎 %1s 回来，'), $comment_author); ?>
						<a style="cursor: pointer;color:#F96B4D;" id="infoedit">更改资料</a>
						<script type="text/javascript">
							$(document).ready(function () {
							//显示名字邮件
							$("#infoedit").click(function(){
								$(".comment-show").show(500);
							});
							});
						</script>
						</div>
					</div>					
					<?php else:?>
						<script type="text/javascript">
							$(document).ready(function () {
							//显示名字邮件
							$("#comment,.smilies-down a").click(function(){
								$(".comment-show").show(500);
							});
							});
						</script>
					<?php endif; ?>
					<div class="comment-show" style="display:none;">
						<ul>
						<li class="form-inline-author">
							<label>昵称 *</label>
							<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" <?php if($req) echo "aria-required='true'"; ?> />
						</li>
						<li class="form-inline-email">
							<label>邮箱 *</label>
							<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" <?php if($req) echo "aria-required='true'"; ?> />
						</li>
						<li class="form-inline-url">
							<label>网站</label>
							<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" />
						</li>
						</ul>
				    </div>
				<?php endif; ?>
				<div class="f-publish" id="real-avatar">
					<textarea name="comment" id="comment" tabindex="4" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};" placeholder="<?php if(have_comments()):?>已经有<?php comments_number('人', '1人', '%人' );?>抢在你前面了，要说点什么？<?php else : ?>还没有人抢沙发呢，赶紧抢一下~<?php endif; ?>"></textarea>
				</div>
				<div>
					<input name="submit" type="submit" id="submit" tabindex="5" value="发表评论" />
					<?php cancel_comment_reply_link('取消回复'); ?>
					<?php comment_id_fields(); ?>
				</div>
				<?php get_template_part( 'smiley', get_post_format() ); ?>
				<?php do_action('comment_form',$post->ID); ?>
			</form>
		</div>
	<?php endif; ?>
	    <?php if(have_comments()):?>
		<ul class="commentlist">
			<?php wp_list_comments("type=comment&callback=commentlist"); ?>
		</ul>
		<div class="commentnavi">
        <?php if (get_option('default_comments_page') == 'newest' ) {echo previous_comments_link(__('加载更多'));} else { next_comments_link(__('加载更多'));}?>
		</div>
		<?php endif; ?>
</div>