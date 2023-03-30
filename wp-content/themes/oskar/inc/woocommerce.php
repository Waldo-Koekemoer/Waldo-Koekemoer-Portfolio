<?php
/**
 * Custom functions for WooCommerce compatability.
 *
 * @package Oskar
 */

/**
 * WooCommerce login/register/account in header.
 */
function oskar_header_account() {
	if ( class_exists( 'WooCommerce' ) ) { ?>
		<div class="top-account">
		<?php $woo_account_page_id = get_option( 'woocommerce_myaccount_page_id' );
		if ( $woo_account_page_id ) {
			$woo_account_page_url = get_permalink( $woo_account_page_id ); ?>
			<a class="oskar-account" href="<?php echo get_permalink( $woo_account_page_id ); ?>" role="button"><span id="icon-user" class="icons oskar-icon-user"></span></a>
		<?php } else {
			$woo_account_page_url = wp_login_url( get_permalink() ); ?>
			<span class="oskar-account" role="button"><span id="icon-user" class="icons oskar-icon-user"></span></span>
		<?php } ?>
			<div class="mini-account">
			<?php if ( is_user_logged_in() ) {
				echo '<p class="display-name"><i class="fa fa-user"></i> <strong>' . esc_html( wp_get_current_user()->display_name ) . '</strong></p>';
				woocommerce_account_navigation();
			} else {
				wc_get_template( 'myaccount/form-login.php' );
			} ?>
			</div>
		</div>
	<?php }
}


function oskar_header_wishlist() {
	if ( class_exists( 'WooCommerce' ) ) {
		if ( class_exists( 'YITH_WCWL' ) ) { ?>
			<div class="top-wishlist"><a class="oskar-wishlist" href="<?php echo esc_url( YITH_WCWL()->get_wishlist_url() ); ?>" role="button"><span class="icons oskar-icon-heart"></span><span class="wishlist_products_counter_number"><?php echo yith_wcwl_count_all_products(); ?></span></a></div>
		<?php } elseif ( class_exists( 'TInvWL' ) ) {
			echo do_shortcode( '[ti_wishlist_products_counter show_icon="off" show_text="off"]' );
		}
	}
}


function oskar_update_wishlist_count() {
	if( class_exists( 'YITH_WCWL' ) ){
		wp_send_json( array(
			'count' => yith_wcwl_count_all_products()
		) );
	}
}
add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'oskar_update_wishlist_count' );
add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'oskar_update_wishlist_count' );


/**
 * WooCommerce shopping cart in header.
 */
function oskar_header_cart() {

	if ( class_exists( 'WooCommerce' ) ) {
		$cart_items = WC()->cart->get_cart_contents_count();
		if ( $cart_items > 0 ) {
			$cart_class = ' items';
		} else {
			$cart_class = '';
		} ?>
				<div class="top-cart"><a class="oskar-cart<?php echo $cart_class; ?>" href="<?php echo esc_url( wc_get_cart_url() ); ?>" role="button"><span class="icons oskar-icon-shopping-cart"></span><?php echo sprintf ( '<span class="item-count">%d</span>', $cart_items ); ?></a><div class="mini-cart"><?php woocommerce_mini_cart();?></div></div>
	<?php }

}


/**
 * Update header mini-cart contents when products are added to the cart via AJAX
 */
function oskar_header_cart_update( $fragments ) {
	$cart_items = WC()->cart->get_cart_contents_count();
	if ( $cart_items > 0 ) {
		$cart_class = ' items';
	} else {
		$cart_class = '';
	}
	ob_start();
	?>
				<div class="top-cart"><a class="oskar-cart<?php echo $cart_class; ?>" href="<?php echo esc_url( wc_get_cart_url() ); ?>" role="button"><span class="icons oskar-icon-shopping-cart"></span><?php echo sprintf ( '<span class="item-count">%d</span>', $cart_items ); ?></a><div class="mini-cart"><?php woocommerce_mini_cart();?></div></div>
	<?php	
	$fragments['.top-cart'] = ob_get_clean();	
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'oskar_header_cart_update' );


remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

add_action( 'woocommerce_before_main_content', 'oskar_theme_wrapper_start', 10);
add_action( 'woocommerce_after_main_content', 'oskar_theme_wrapper_end', 10);
add_action( 'woocommerce_before_shop_loop', 'oskar_shop_filter_section', 15);
add_action( 'woocommerce_after_shop_loop_item', 'oskar_before_shop_loop_addtocart', 6);
add_action( 'woocommerce_after_shop_loop_item', 'oskar_after_shop_loop_addtocart', 100);

add_action( 'woocommerce_before_shop_loop_item_title', 'oskar_shop_loop_image_before', 9);
add_action( 'woocommerce_before_subcategory_title', 'oskar_shop_loop_image_before', 9);
add_action( 'woocommerce_before_shop_loop_item_title', 'oskar_shop_loop_image_after', 11);
add_action( 'woocommerce_before_subcategory_title', 'oskar_shop_loop_image_after', 11);

function oskar_shop_loop_image_before() {
	echo '<div class="product-image-wrap">';
}

function oskar_shop_loop_image_after() {
	echo '</div>';
}

function oskar_before_shop_loop_addtocart() {
	echo '<div class="product-addtocart-wrap">';
}

function oskar_after_shop_loop_addtocart() {
	echo '</div>';
}

function oskar_shop_filter_section() {
	if ( !is_product() ) {
		get_sidebar( 'shop-filters' );
	}
}

function oskar_theme_wrapper_start() {
	$has_sidebar = '';
	if ( is_active_sidebar( 'oskar-sidebar-shop' ) && !is_product() ) {
		$has_sidebar = ' has-sidebar';
	}
	echo '<div id="primary" class="content-area' . $has_sidebar . '">
		<main id="main" class="site-main" role="main">';
}

function oskar_theme_wrapper_end() {
	echo '</main><!-- #main -->
	</div><!-- #primary -->';
	if ( !is_product() ) {
		get_sidebar( 'shop' );
	}
}


function oskar_change_prev_next( $args ) {
	$args['prev_text'] = '<i class="fa fa-chevron-left"></i>';
	$args['next_text'] = '<i class="fa fa-chevron-right"></i>';
	return $args;
}
add_filter( 'woocommerce_pagination_args', 'oskar_change_prev_next' );


function oskar_woocommerce_placeholder_img_src() {
	return OSKAR_TEMPLATE_DIR_URI . '/images/woocommerce-placeholder.png';
}
if ( !get_option( 'woocommerce_placeholder_image', 0 ) ) {
	add_filter('woocommerce_placeholder_img_src', 'oskar_woocommerce_placeholder_img_src');
}

function oskar_upsell_products_args( $args ) {
	$col_per_page = esc_attr( get_option( 'woocommerce_catalog_columns', 4 ) );
	$args['posts_per_page'] = $col_per_page;
	$args['columns'] = $col_per_page;
	return $args;
}
add_filter( 'woocommerce_upsell_display_args', 'oskar_upsell_products_args' );


function oskar_related_products_args( $args ) {
	$col_per_page = esc_attr( get_option( 'woocommerce_catalog_columns', 4 ) );
	$args['posts_per_page'] = $col_per_page;
	$args['columns'] = $col_per_page;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'oskar_related_products_args' );


function oskar_woocommerce_gallery_thumbnail_size( $size ) {
	return 'woocommerce_thumbnail';
}
add_filter( 'woocommerce_gallery_thumbnail_size', 'oskar_woocommerce_gallery_thumbnail_size' );
