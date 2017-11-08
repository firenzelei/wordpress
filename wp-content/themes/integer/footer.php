<?php
/**
 * The template for displaying the footer.
 *
 * @package Integer
 */

?>
	<footer id="colophon" class="site-footer" role="contentinfo">

			<?php if ( has_nav_menu( 'footer' ) ) : ?>

				<nav id="site-footer-navigation" class="footer-navigation" role="navigation">

					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer',
								'depth' => 1,
								'fallback_cb' => false,
							)
						);
					?>

				</nav><!-- #site-navigation -->

			<?php endif; ?>

			<div class="site-info">

				<?php integer_footer_text(); ?>

			</div><!-- .site-info -->

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
