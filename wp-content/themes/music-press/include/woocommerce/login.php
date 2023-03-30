<?php // Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action('music_press_login','add_loginout_link');
function add_loginout_link() {
	if( get_theme_mod('music_press__header_my_account') ) { ?>
		<div class="woo-loginout">
		<?php
				if ( is_user_logged_in() ) { ?>
				<a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php echo esc_html_e('My Account','music-press'); ?>"><i class="fa-solid fa-user"></i> <?php echo esc_html('My Account','music-press'); ?></a>
				<?php } 
				else { ?>
				<a  href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php echo esc_html_e('Login / Register','music-press'); ?>"><i class="fa-solid fa-user"></i> <?php echo esc_html('Login / Register','music-press'); ?></a>
				<?php }
		?>
		</div>
		<?php
	}
}

