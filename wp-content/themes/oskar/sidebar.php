<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Oskar
 */

if ( ! is_active_sidebar( 'oskar-sidebar' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'oskar-sidebar' ); ?>
</div><!-- #secondary -->
