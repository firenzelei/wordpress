<?php get_header();?>
    <main id="main" class="main">
        <div class="main-inner">
            <div id="content" class="content">
                <section id="posts" class="posts-collapse">
                    <span class="archive-move-on"></span>
                
                   <span class="archive-page-counter">
        <?php _e( '', '' );echo ' '; single_cat_title(); ?></span>
                   <?php  
                                $loop_cate_id=array(3); 
                                $num=6;//指定每次循环输出的文章篇数     
                           $posts = query_posts($query_string . "&cat={$value}&orderby=date&showposts={$num}" ); ?>
                                <?php while(have_posts()) : the_post(); ?>
                    <article class="post post-type-normal" >
                        <header class="post-header">
                            <h1 class="post-title">
                                <a class="post-title-link" href="<?php the_permalink(); ?>" itemprop="url">
                                <span itemprop="name"><?php the_title();?></span>
                                </a>
                               
                            </h1>
                            
                            <div class="post-meta">
                                <time class="post-time" itemprop="dateCreated" datetime="2016-07-17T05:39:00+00:00" content="1616-07-17">
                                    <?php the_time('m-d');?>
                                </time>
                            </div>
                            
                        </header>
                    </article>
                     <?php endwhile;?>
                </section>
            </div>
        </div>
    </main>
<?php get_sidebar();?>
<?php get_footer();?>
