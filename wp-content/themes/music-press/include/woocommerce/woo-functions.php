<?php // Do not allow direct access to the file.
	if( ! defined( 'ABSPATH' ) ) {
		exit;
	}
	/**
		* WooCommerce Functions
	*/
	/**
		* WooCommerce myaccount page
	*/
	function music_press__woo_account () {
		if ( class_exists( 'WooCommerce' ) and !get_theme_mod('music_press__header_my_account') ) {
			if ( is_user_logged_in() ) { ?>
			<a class="woo_log" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php echo esc_html('My Account','music-press'); ?>"><span class="woo-log-s"><span class="dashicons dashicons-admin-users"></span></span></a>
			<?php } 
			else { ?>
			<a class="woo_log" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php echo esc_html('Login / Register','music-press'); ?>"><span class="woo-log-s"><span class="dashicons dashicons-admin-users"></span></span></a>
			<?php } 	
		}
	}
	add_action( 'music_press__header_woo_cart', 'music_press__woo_account' );
	
		/* WooCommerce Pagination */
	function woocommerce_pagination() { ?>
	<div class="nextpage">
		<div class="pagination">
			<?php echo esc_url(paginate_links()); ?>
		</div> 
	</div>   
	<?php  }
	
	/* View Product Button */
	add_action('woocommerce_after_shop_loop_item','music_press_replace_add_to_cart');
	
	function music_press_replace_add_to_cart() {
		
		global $product;
		$link = $product->get_permalink();
		echo do_shortcode('<a href="'.$link.'" class="button viewbutton">'. __( "View Product", 'music-press' ) .'</a>');
		
	} 	
	
	
	
	

