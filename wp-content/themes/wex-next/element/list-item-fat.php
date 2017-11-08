
<article class="post post-type-normal">
    <header class="post-header">
        <h1 class="post-title" itemprop="name headline">
            <a class="post-title-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h1>
        <div class="post-meta">
                                 <span class="post-time">发表于
                                     <time itemprop="dateCreated" datetime="<?php the_time('Y-n-j') ?>"
                                           content="<?php the_time('Y-n-j') ?>">
                                         <?php the_time('Y-n-j') ?>
                                     </time>
                                </span>
            <span class="post-category"> &nbsp; | &nbsp; 分类于
              <span itemprop="about"><?php $category = get_the_category();  echo $category[0]->cat_name; ?></span> </span> <span class="post-comments-count">
                &nbsp; | &nbsp;<?php comments_popup_link('0 条评论', '1 条评论', '% 条评论', '', '评论已关闭'); ?>
                     </span><span class="post-comments-count">
                &nbsp;|&nbsp;
                <span class="post-meta-item-icon">
                 <i class="fa fa-eye"></i>
               </span> <?php echo getPostViews( get_the_ID() );?></span>
        </div>
    </header>
    <div class="post-body">
        <p><?php wex_summary(get_the_content(), 230);?></p>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
        <p class="more"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">阅读全文 »</a>
        </p>
    </div>
    <footer class="post-footer">
        <div class="post-eof"></div>
    </footer>
</article>
