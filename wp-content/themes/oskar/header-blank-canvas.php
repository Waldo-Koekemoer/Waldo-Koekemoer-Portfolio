<?php
/**
 * The header used by template-blank-canvas.php.
 *
 * @package Oskar
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<?php oskar_skip_link(); ?>
<?php
if ( get_theme_mod( 'header_search_off' ) ) {
	$masthead_class_search = '';
} else {
	$masthead_class_search = ' has-search';
}

if ( class_exists( 'WooCommerce' ) ) {
	$masthead_class_wc = ' has-wc';
} else {
	$masthead_class_wc = '';
}
?>
<div id="page">
	<?php if ( get_theme_mod( 'custom_header' ) ) { ?>
		<header id="masthead" class="custom-site-header<?php echo $masthead_class_wc; ?>">
			<div class="container">
				<?php echo apply_filters( 'the_content', get_the_content( '', '', get_theme_mod( 'custom_header' ) ) ); ?>
			</div>
		</header><!-- #masthead -->
	<?php } else { ?>
		<header id="masthead" class="site-header not-full<?php echo $masthead_class_search.$masthead_class_wc; ?>">
			<div class="container">
			<?php oskar_header_content(); ?>
			<?php oskar_header_menu(); ?>
			<?php oskar_header_content_extra(); ?>
			</div>
		</header><!-- #masthead -->
	<?php } ?>
	<div id="content" class="site-content clearfix">
		<div class="container clearfix">
