<?php // Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
* WooCommerce Cart
*/
	function music_press_wc_cart_count() {
		if( get_theme_mod( 'music_press_header_cart' ) ) {
		// Returns an empty string, if the cart item is not found
				global $woocommerce;
				$total = $woocommerce->cart->get_cart_total();
				$count = WC()->cart->cart_contents_count;	
				?><a title="<?php __('View your cart','music-press'); ?>" class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>"><?php
					if ( $count == 0 ) {
						?>
						<span class="my-cart cart-contents-count"> 
							<i class="fa-solid fa-basket-shopping"></i>
							<span class="s-cart_num">0</span>
						</span>
						<?php            
					}		
					if ( $count == 1 ) {
						?>
						<span class="my-cart"><i class="fa-solid fa-basket-shopping"></i><span class="s-cart_num"><?php echo esc_html( $count ); ?></span></span>
						<?php
					}
					if ( $count > 1 ) {
						?>
						<span class="my-cart"><i class="fa-solid fa-basket-shopping"></i><span class="s-cart_num"><?php echo esc_html( $count ); ?></span></span>
						<?php
					}		
				?></a>
				<?php
		}
	}
	add_action( 'music_press_header_woo_cart', 'music_press_wc_cart_count' );
	/**
	 * Ensure cart contents update when products are added to the cart via AJAX
	 */
	function music_press_header_add_to_cart_fragment( $fragments ) {
		ob_start();
			global $woocommerce;	
			$total = $woocommerce->cart->get_cart_total();
			$count = WC()->cart->cart_contents_count;
			?><a title="<?php __('View your cart','music-press'); ?>" class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>"><?php
				if ( $count == 0 ) {
					?>
					<span class="my-cart cart-contents-count">
					    <i class="fa-solid fa-basket-shopping"></i>
						<span class="s-cart_num">0</span>
					</span>
					<?php            
				}
				if ( $count == 1 ) {
					?>
					<span class="my-cart"><i class="fa-solid fa-basket-shopping"></i><span class="s-cart_num"><?php echo esc_html( $count ); ?></span></span>
					<?php            
				}
				if ( $count > 1 ) {
					?>
					<span class="my-cart"><i class="fa-solid fa-basket-shopping"></i><span class="s-cart_num"><?php echo esc_html( $count ); ?></span></span>
					<?php
				}			
			?></a>
			<?php
		$fragments['a.cart-contents'] = ob_get_clean();
		return $fragments;
	}
	add_filter( 'woocommerce_add_to_cart_fragments', 'music_press_header_add_to_cart_fragment' );