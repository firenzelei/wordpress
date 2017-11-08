<?php get_header(); ?>
    <div class="container">
        <div class="content" id="archive">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content'); ?>
                        <?php endwhile; ?>
                            <?php endif; ?>
        </div>
        <div id="pagination">
            <?php next_posts_link(__( '加载更多')); ?>
        </div>
    </div>
<?php get_footer(); ?>