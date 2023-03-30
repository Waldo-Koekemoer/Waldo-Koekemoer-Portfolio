<?php
/**
 * The sidebar containing the horizontal widget area for WooCommerce archives
 *
 * @package Oskar
 */

if ( ! is_active_sidebar( 'oskar-sidebar-shop-filters' ) ) {
	return;
}
?>

<div class="shop-filter-wrap">
	<div id="shop-filters" class="clearfix">
		<?php dynamic_sidebar( 'oskar-sidebar-shop-filters' ); ?>
	</div><!-- #shop-filters -->
</div>
