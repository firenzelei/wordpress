   
          <div class="sidebar-toggle">
                <div class="sidebar-toggle-line-wrap">
                    <span class="sidebar-toggle-line sidebar-toggle-line-first"></span>
                    <span class="sidebar-toggle-line sidebar-toggle-line-middle"></span>
                    <span class="sidebar-toggle-line sidebar-toggle-line-last"></span>
                </div>
            </div>
            <aside id="sidebar" class="sidebar">
                <div class="sidebar-inner" <?php
                   if (is_user_logged_in()){
                      echo 'style="padding-top:50px;"';
                   }


                   if (is_single()){
                       $class1= '';
                       $class2= 'sidebar-panel-active';
                   }else{
                       $class1= 'sidebar-panel-active';
                       $class2='';
                   }

                    ?> >

                    <section class="site-overview sidebar-panel <?php echo $class1 ;?>">
                        <div class="site-author motion-element">



                           <img class="site-author-image"
                                src="<?php wexweb('admin-photo','https://cdn.v2ex.com/gravatar/5385dd848582c2a9f3881a21ba543dd6?s=160&d=mm&r=g');?>"
                                alt="<?php wexweb('site_name','WEX');?>" />
                            <p class="site-author-name"><?php // echo $author_name ;?></p>
                        </div>

                        <p class="site-description motion-element" itemprop="description">
                            <?php wexweb('description','不积跬步无以至千里') ;?>
                        </p>
                        <nav class="site-state motion-element">
                            <div class="site-state-item site-state-posts">
                                <span class="site-state-item-count">
                                    <?php $count_posts = wp_count_posts(); echo $published_posts =$count_posts->publish;?>
                                </span>
                                <span class="site-state-item-name">日志</span>
                            </div>
                            <div class="site-state-item site-state-categories">
                                <span class="site-state-item-count">
                                    <?php echo $count_categories = wp_count_terms('category'); ?>
                                </span>
                                <span class="site-state-item-name">分类</span>
                            </div>
                            <div class="site-state-item site-state-tags">
                                <span class="site-state-item-count">
                                    <?php echo $count_tags = wp_count_terms('post_tag'); ?>
                                </span>
                                <span class="site-state-item-name">标签</span>
                            </div>
                        </nav>

<?php

    if (cs_get_option('friendslink_switcher')==true){
        if(cs_get_option('friendlink_radio')=='index'){
            if(is_home()){ include 'element/sidebar-friendlink.php'; }
        }elseif(cs_get_option('friendlink_radio')=='EveryPage'){
            include 'element/sidebar-friendlink.php';
        }
    }

?>


                    </section>
                    <section class="post-toc-wrap  <?php echo $class2 ;?>">
                    <div class="post-toc-indicator-top post-toc-indicator"></div>
                    <div class="post-toc">
                        <p class="post-toc-empty">
                            <?php if(is_single()){echo '此文章未包含目录'; }?>
                        </p>
                    </div>
                </section>
                </div>
            </aside>














          </main>