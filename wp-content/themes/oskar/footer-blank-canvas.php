<?php
/**
 * The template for displaying the footer.
 * Used with Blank Canvas template.
 *
 * @package Oskar
 */
?>
	</div><!-- .container -->
	</div><!-- #content -->
	<?php if ( get_theme_mod( 'custom_footer' ) ) { ?>
		<footer id="colophon">
			<div class="container">
				<?php echo apply_filters( 'the_content', get_the_content( '', '', get_theme_mod( 'custom_footer' ) ) ); ?>
			</div>
		</footer><!-- #colophon -->
	<?php } else { ?>
		<footer id="colophon" class="site-footer">
			<div id="bottom-footer">
				<div class="container clearfix">
					<?php oskar_powered_by(); ?>
					<?php wp_nav_menu( array( 
						'theme_location' => 'footer',
						'container_id' => 'footer-menu',
						'menu_id' => 'footer-menu', 
						'menu_class' => 'oskar-footer-nav',
						'depth' => 1,
					) ); ?>
				</div>
			</div>
		</footer><!-- #colophon -->
	<?php } ?>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
