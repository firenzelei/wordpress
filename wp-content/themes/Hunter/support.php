<div class="support-author">
	<p><?php if( get_post_meta($post->ID,'dashang_value',true) ){ echo get_post_meta($post->ID,'dashang_value',true);} else {echo '如果觉得我的文章对您有用，请随意打赏。您的支持将鼓励我继续创作！';}?></p>
	<a class="support-button" title="赞助本站" style="cursor: pointer;">¥ 打赏支持</a><dl></dl>
	<dl class="sponsor-up" style="display:none;">
	    <h5>选择您喜欢的打赏方式：</h5>
		<?php $options=get_option('w_options'); ?>
	    <label class="show-weixin ok"><c class="iconfont">&#xe617;</c>微信红包</label>
		<label class="show-qq"><c class="iconfont">&#xe617;</c>QQ钱包</label>
		<label class="show-alipay"><c class="iconfont">&#xe617;</c>支付宝</label>
		<dt class="qr-weixin"><img src="<?php echo $options['ds_weixin']; ?>"><span>打赏</span></dt>
		<dt class="qr-qq" style="display:none;"><img src="<?php echo $options['ds_qq']; ?>"><span>打赏</span></dt>
		<dt class="qr-alipay" style="display:none;"><img src="<?php echo $options['ds_alipay']; ?>"><span>打赏</span></dt>
		<span class="mobilesm" style="text-align:center;display:block;display:none">手机访客请先将二维码保存后再扫描</span>
		<a href="javascript:reward_tz();" style="text-align:center;display:block">已打赏？点此通知作者</a>
		<i class="close-button iconfont">&#xe609;</i>
    </dl>
</div>
<div class="clear"></div>
<!--文章meta-->
<div class="entry-meta3">
    <!--点赞分享-->
    <div class="post-social">
		<span class="post-like">
			<a href="javascript:;" data-action="ding" data-id="<?php the_ID(); ?>" title="点赞" class="WayZan <?php if(isset($_COOKIE['way_zan_'.$post->ID])) echo 'done';?>"><i class="iconfont">&#xe616;</i> 喜欢
			<c class="count"><?php if( get_post_meta($post->ID,'way_zan',true) ){ echo get_post_meta($post->ID,'way_zan',true);} else {echo '0';}?></c>
			</a>
		</span>
		<span class="comments-count"><a href="#comments"><i class="iconfont">&#xe60d;</i> 评论 <?php $id=$post->ID; echo get_post($id)->comment_count;?></a></span>
		<span class="post-share"><a class="share-button" title="分享" style="cursor: pointer;"><i class="iconfont">&#xe60a;</i> 分享 <c class="share_count"><?php if( get_post_meta($post->ID,'way_share',true) ){ echo get_post_meta($post->ID,'way_share',true);} else {echo '0';}?></c></a><span></span>
			<div class="share-up" style="display:none;">
			    <h5>分享一次，潇洒一世</h5>
				<a class="share-weixin way_share iconfont" data-action="share" data-id="<?php the_ID(); ?>" title="分享到微信">&#xe612;</a>
				<a class="share-qzone way_share iconfont" etap="share" data-share="qzone" data-action="share" data-id="<?php the_ID(); ?>" title="分享到QQ空间">&#xe60e;</a>
				<a class="share-tsina way_share iconfont" etap="share" data-share="weibo" data-action="share" data-id="<?php the_ID(); ?>" title="分享到新浪微博">&#xe615;</a>
				<a class="share-qq way_share iconfont" etap="share" data-share="qq" data-action="share" data-id="<?php the_ID(); ?>" title="分享到QQ好友">&#xe60c;</a>
				<a class="share-douban way_share iconfont" etap="share" data-share="douban" data-action="share" data-id="<?php the_ID(); ?>" title="分享到豆瓣网">&#xe606;</a>
				<a class="share-renren way_share iconfont" etap="share" data-share="renren" data-action="share" data-id="<?php the_ID(); ?>" title="分享到人人网">&#xe600;</a>
				<br><span>每分享一次，MM或JJ就会长大1公分呢</span><span style="display:none">手机访客可使用浏览器自带的分享功能</span>
				<i class="close-button iconfont">&#xe609;</i>
			</div><div></div>
			<div class="qrcode" style="display:none;"><h5 style="text-align:left;font-weight:bold;margin-left:20px">分享到微信：</h5><img src="http://pan.baidu.com/share/qrcode?w=240&h=240&url=<?php the_permalink();?>"><span><i class="iconfont saoma">&#xe611;</i>微信扫码后点“<i class="iconfont" style="vertical-align:1px;font-size:13px">&#xe676;</i>”即可分享</span><i class="close-button iconfont">&#xe609;</i></div>
		</span>
	</div>
	<!--标签-->
	<div class="post-tags">
	<?php $tags_list = get_the_tag_list( '', __( '', 'way' ) );if ( $tags_list ) :?>
	<?php printf( __( '%1$s', 'way' ), $tags_list ); ?>
	<?php endif; ?>
	</div>
</div>
<!--文章meta-END-->
<div class="clear"></div>