<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Fired during plugin activation
 * @package    awp-companion
 */

/**
 * This awp_companion_plugin_activator Class defines that all code are necessary to run during the AWP companion plugins activation.
 */
class awp_companion_plugin_activator {

	public static function activate() {

		$fresh_website_activate = get_option( 'fresh_website_activate' );
		if ( (bool) $fresh_website_activate === false ) {
			// Widgets file
			 require awp_companion_plugin_dir . 'inc/widgets/widget.php';
			//Default pages when set as static posts
			$pages = array( esc_html__( 'Home', 'awp-companion' ), esc_html__( 'Blog', 'awp-companion' ) );
			foreach ($pages as $page){
				$post_data = array( 'post_author' => 1, 'post_name' => $page,  'post_status' => 'publish' , 'post_title' => $page, 'post_type' => 'page', );
				if($page == 'Home'): 
					$page_option = 'page_on_front';
					$template = 'page-templates/frontpage.php';
				else:
					$page_option = 'page_for_posts';
					$template = 'page.php';
				endif;
				$post_data = wp_insert_post( $post_data, false );
				if ( $post_data ){
					update_post_meta( $post_data, '_wp_page_template', $template );
					$page = get_page_by_title($page);
					update_option( 'show_on_front', 'page' );
					update_option( $page_option, $page->ID );
				}
			}
			update_option( 'fresh_website_activate', true );
		}
	} // end of activate function
	
}// end of class