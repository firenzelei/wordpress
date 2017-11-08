<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Integer
 */

get_header(); ?>

<div id="main" class="site-main error404" role="main">

	<div class="not-found">

		<header class="page-header">
			
			<h1 class="page-header__title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'integer' ); ?></h1>
			
		</header>
		
		<div class="not-found__content">
			
			<p><?php esc_html_e( 'Looks like the page you are looking for has been moved or does not exist. Click on the site logo to go to the homepage or try searching.', 'integer' ); ?></p>
			
			<p><?php get_search_form(); ?></p>
			
		</div>

	</div>

</div>

<?php get_footer(); ?>
