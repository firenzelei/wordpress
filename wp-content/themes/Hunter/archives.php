<?php
/*
Template Name: 文章归档
*/
?>
<?php get_header(); ?>
<div class="container">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('entry-content'); ?>>
		<div class="myArchive">
		<?php the_widget( 'WP_Widget_Archives', 'title=按月份归档', 'dropdown=1'); ?>
                <h2>按分类归档</h2>
		<ul>
		<?php
			$categoryPosts = $wpdb->get_results("
			SELECT post_title, ID, post_name, slug, {$wpdb->prefix}terms.term_id AS catID, {$wpdb->prefix}terms.name AS categoryname
			FROM {$wpdb->prefix}posts, {$wpdb->prefix}term_relationships, {$wpdb->prefix}term_taxonomy, {$wpdb->prefix}terms
			WHERE {$wpdb->prefix}posts.ID = {$wpdb->prefix}term_relationships.object_id
			AND {$wpdb->prefix}terms.term_id = {$wpdb->prefix}term_taxonomy.term_id
			AND {$wpdb->prefix}term_taxonomy.term_taxonomy_id = {$wpdb->prefix}term_relationships.term_taxonomy_id
			AND {$wpdb->prefix}term_taxonomy.taxonomy = 'category'
			AND {$wpdb->prefix}posts.post_status = 'publish'
			AND {$wpdb->prefix}posts.post_type = 'post'
			ORDER BY {$wpdb->prefix}terms.term_id, {$wpdb->prefix}posts.post_date DESC");

			$postID = 0;
			if ( $categoryPosts ) :
				$category = $categoryPosts[0]->catID;
				foreach ($categoryPosts as $key => $mypost) :
					if($postID == 0) {
						echo '<li><strong>分类：'.$mypost->categoryname.'</strong>';
						echo '<ul>';
					}
				   
					if($category == $mypost->catID) {          
		?>
			<li><a title="<?php echo $mypost->post_title; ?>" href="<?php echo get_permalink( $mypost->ID ); ?>"><?php echo $mypost->post_title; ?></a></li>
		<?php
						$category = $mypost->catID;
						$postID++;
					}
					else {
						echo "</ul>\n</li>";
						echo '<li><strong>分类：'.$mypost->categoryname.'</strong>';
						echo '<ul>';
		?>
			<li><a title="<?php echo $mypost->post_title; ?>" href="<?php echo get_permalink( $mypost->ID ); ?>"><?php echo $mypost->post_title; ?></a></li>
		<?php
						$category = $mypost->catID;
						$postID = 1;
					}
				endforeach;
			endif;
			echo "</ul>\n</li>";
		?>

		<li><strong>页面</strong>
		<ul>
		<?php
			// 读取所有页面
			$mypages = $wpdb->get_results("
				SELECT post_title, post_name, ID
				FROM {$wpdb->prefix}posts
				WHERE post_status = 'publish'
				AND post_type = 'page'");

			if ( $mypages ) :
				foreach ($mypages as $mypage) :
		?>
			<li><a title="<?php echo $mypage->post_title; ?>" href="<?php echo get_permalink( $mypage->ID ); ?>"><?php echo $mypage->post_title; ?></a></li>
			<?php endforeach; echo "</ul>\n</li>"; endif; ?>
		</ul>
		</div>
	</article>
	<?php
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
	?>
	<?php endwhile; ?>
	<?php endif; ?>
</div>
<?php get_footer(); ?>