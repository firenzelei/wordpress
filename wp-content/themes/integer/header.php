<?php
/**
 * The template for displaying the header.
 *
 * @package Integer
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link btn btn-default screen-reader-text" href="#main">
		<?php esc_html_e( 'Skip to content', 'integer' ); ?>
	</a>

	<header id="masthead" class="site-header initial-reveal" role="banner">
		
		<?php if ( has_custom_logo() ) : ?>
			<div class="site-logo">
				<?php the_custom_logo(); ?>
			</div>
		<?php endif; ?>

		<div class="site-branding">
			<?php
				integer_site_title();
				integer_site_description();
			?>
		</div><!-- .site-branding -->

		<button id="site-navigation-toggle" class="menu-toggle" >
			<i class="fa fa-bars menu-toggle-icon" aria-hidden="true"></i>
			<span class="menu-toggle-text">
				<?php esc_html_e( 'Menu', 'integer' ); ?>
			</span>
		</button><!-- #site-navigation-toggle -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_id' => 'primary-menu',
						'container' => false,
					)
				);
			?>
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->
