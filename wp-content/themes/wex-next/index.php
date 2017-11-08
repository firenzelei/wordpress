<?php get_header();?>
<main id="main" class="main">
    <div class="main-inner">
        <div id="content" class="content">
            <section id="posts" class="posts-collapse">
                <?php
                if (have_posts() ) {while (have_posts() ):the_post();


                    include 'element/list-item-thin.php';

                endwhile;}
                else{
                    echo '<h4 style="margin-top: 160px;">老铁你来早了，我还没有写东西呢</h4>';
                }
                ?>

            </section>
            <?php wex_pagenavi();?>

        </div>
    </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>