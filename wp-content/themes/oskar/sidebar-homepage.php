<?php
/**
 * The sidebar containing the main widget area for the homepage
 *
 * @package Oskar
 */

if ( ! is_active_sidebar( 'oskar-sidebar-homepage' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'oskar-sidebar-homepage' ); ?>
</div><!-- #secondary -->
