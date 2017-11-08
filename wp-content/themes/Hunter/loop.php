<section class="image-header">
<div class="dark">
    <?php wp_reset_query();if ( is_home()){ ?>
	<div class="index-title">
            <h1 class="site-title"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
            <h2 class="site-description"><?php bloginfo('description'); ?></h2>
    </div>
	<?php } ?>
    <?php wp_reset_query();if (is_archive()){ ?>
	<div class="active-header">
		<h1 class="active-title"><?php
			if (is_category()):
				single_cat_title();
			elseif (is_tag()):
				single_tag_title();
			elseif (is_author()):
				the_post();
				printf(__('%s', 'way') , '<span class="vcard">' . get_the_author() . '发表的所有文章</span>');
				rewind_posts();
			elseif (is_day()):
				printf(__('%s', 'way') , '<span>' . get_the_date('Y年n月d日') . '发表的所有文章</span>');
			elseif (is_month()):
				printf(__('%s', 'way') , '<span>' . get_the_date('Y年n月') . '发表的所有文章</span>');
			elseif (is_year()):
				printf(__('%s', 'way') , '<span>' . get_the_date('Y年') . '发表的所有文章</span>');
			else:
				_e('Archives', 'way');
			endif; ?></h1>
		<?php
		$term_description = term_description();
		if (!empty($term_description)):
			printf('<div class="active-description">%s</div>', $term_description);
		endif; ?>  
	</div>
	<?php } ?>
	<?php wp_reset_query();if (is_search()){ ?>
	<h1 class="active-title"><?php echo $s; ?>的搜索结果</h1>
	<div class="active-line"></div><span class="active-type">Search</span>
	<?php } ?>
	<?php wp_reset_query();if ( is_single() || is_page() ){ ?>
	<div class="entry-title">
	<h1><?php the_title(); ?></h1>
	<!--文章meta1-END-->
	</div>
	<?php } ?>
</div>
</section>