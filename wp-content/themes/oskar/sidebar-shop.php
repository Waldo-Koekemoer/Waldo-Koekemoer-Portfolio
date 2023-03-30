<?php
/**
 * The sidebar containing the main widget area for WooCommerce archives
 *
 * @package Oskar
 */

if ( ! is_active_sidebar( 'oskar-sidebar-shop' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'oskar-sidebar-shop' ); ?>
</div><!-- #secondary -->
