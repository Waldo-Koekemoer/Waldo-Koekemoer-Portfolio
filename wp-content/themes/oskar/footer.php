<?php
/**
 * The template for displaying the footer.
 * Default footer.
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
			<?php if ( is_active_sidebar( 'oskar-above-footer' ) ) { ?>
			<div id="above-footer">
				<div class="container">
					<?php dynamic_sidebar( 'oskar-above-footer' ); ?>
				</div>
			</div>
			<?php } ?>
			<?php if ( is_active_sidebar( 'oskar-footer1' ) || is_active_sidebar( 'oskar-footer2' ) || is_active_sidebar( 'oskar-footer3' ) ) { ?>
			<div id="top-footer">
				<div class="container">
					<div class="top-footer clearfix">
						<div class="footer footer1">
							<?php if ( is_active_sidebar( 'oskar-footer1' ) ) {
								dynamic_sidebar( 'oskar-footer1' );
							} ?>	
						</div>
						<div class="footer footer2">
							<?php if ( is_active_sidebar( 'oskar-footer2' ) ) {
								dynamic_sidebar( 'oskar-footer2' );
							} ?>	
						</div>
						<div class="footer footer3">
							<?php if ( is_active_sidebar( 'oskar-footer3' ) ) {
								dynamic_sidebar( 'oskar-footer3' );
							} ?>	
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
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
