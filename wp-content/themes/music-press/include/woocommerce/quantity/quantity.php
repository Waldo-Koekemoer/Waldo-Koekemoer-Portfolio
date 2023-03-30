<?php // Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**************************** Quantity Increment **********************************/

		function music_press_quantity_enqueue_scripts() {
			wp_enqueue_script( 'quantity-js', get_template_directory_uri() . '/include/woocommerce/quantity/quantity-increment.js');
			wp_enqueue_style( 'quantity-css', get_template_directory_uri() . '/include/woocommerce/quantity/quantity-increment.css');
			wp_register_script( 'quantity-number-polyfill', get_template_directory_uri() . '/include/woocommerce/quantity/number-polyfill.min.js');
		}

		add_action( 'wp_enqueue_scripts', 'music_press_quantity_enqueue_scripts');