<?php
/**
 * The sidebar containing the main widget area for pages
 *
 * @package Oskar
 */

if ( ! is_active_sidebar( 'oskar-sidebar-page' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'oskar-sidebar-page' ); ?>
</div><!-- #secondary -->
