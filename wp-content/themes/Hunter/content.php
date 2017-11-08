<article id="post-<?php the_ID(); ?>" <?php post_class('post-list'); ?>>
    <section class="title-list">
		<h2 itemprop="entry-name" class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
    </section>
	<!--文章meta1-END-->
	<!--缩略图，需设置特色图片方显示-->
	<div class="thumbnail thumb-cont">
	<?php if (has_post_thumbnail()) {?>
		<div class="thumb-margin">
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
		<?php the_post_thumbnail('thumbnail' ,array('alt'=> trim(strip_tags( $post->post_title )), 'title'=> trim(strip_tags( $post->post_title ))));?>
		</a> 
		</div>
	<?php } ?>
	</div>
	<!--缩略图END-->
	<!--正文摘要-->
	<div class="loop-content" itemprop="description">
	    <?php if (has_excerpt()) { ?> 
				<?php the_excerpt() ?>
		<?php } else { ?>
				<p><?php echo mb_strimwidth(strip_shortcodes(strip_tags(apply_filters('the_content', $post->post_content))), 0, 220,"...");?></p>
		<?php } ?>
	</div>
	<!--正文摘要END-->
	<!--文章底部访问量、评论-->
    <div class="entry-meta1">
		<span class="cat-links"><?php the_category(', ') ?></span>
        <span class="posted-on"><a><time><?php the_time('Y-m-d') ?></time></a></span>
		<span class="eye"><a><?php if(function_exists('custom_the_views') ) custom_the_views($post->ID); ?>° watch</a></span>
		<?php edit_post_link( __( '[编辑]', '' ), '<span class="edit-link">', '</span>' ); ?>
      
        <?php $tags_list = get_the_tag_list( '', __( ', ', 'way' ) );if ( $tags_list ) :?><span itemprop="keywords" class="tags-meta"><i class="iconfont">&#xe608;</i><?php printf( __( '%1$s', 'way' ), $tags_list ); ?></span><?php endif; ?>
		<span class="comments-meta xihuan">
		    <a href="javascript:;" data-action="ding" data-id="<?php the_ID(); ?>" title="点赞" class="WayZan <?php if(isset($_COOKIE['way_zan_'.$post->ID])) echo 'done';?>"><i class="iconfont">&#xe616;</i><c class="count"><?php if( get_post_meta($post->ID,'way_zan',true) ){ echo get_post_meta($post->ID,'way_zan',true);} else {echo '0';}?></c>
			</a><i class="iconfont">&#xe60d;</i><?php comments_popup_link(__('0'), __('1'), __('%')); ?></span>
    


    </div>
	<!--文章meta2-END-->
</article>