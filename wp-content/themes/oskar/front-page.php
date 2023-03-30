<?php
/**
 * The template for displaying the homepage
 *
 * @package Oskar
 */

if ( 'page' === get_option( 'show_on_front' ) ) {

	$has_sidebar = '';
	$oskar_sidebar = 'none';
	$oskar_footer = '';

	if ( is_page_template( 'template-blank-canvas.php' ) ) {
		get_header( 'blank-canvas' );
		$oskar_footer = 'blank-canvas';
	} elseif ( is_page_template( 'template-landing-page.php' ) ) {
		get_header( 'landing-page' );
		$oskar_footer = 'landing-page';
	} elseif ( is_page_template( 'template-no-sidebar.php' ) ) {
		get_header();
	} elseif ( is_page_template( 'template-transparent-header.php' ) ) {
		get_header( 'transparent' );
	} else {
		get_header();
		if ( is_active_sidebar( 'oskar-sidebar-homepage' ) ) {
			$has_sidebar = ' has-sidebar';
		}
		$oskar_sidebar = 'homepage';
	}
?>

	<div id="primary" class="content-area<?php echo $has_sidebar;?>">
		<main id="main" class="site-main" role="main">
		<?php oskar_homepage_sections(); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar( $oskar_sidebar ); ?>

<?php get_footer( $oskar_footer ); ?>

<?php
} else {

	get_header();
	get_template_part( 'home' );

}
