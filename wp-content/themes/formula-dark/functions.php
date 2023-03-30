<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// BEGIN ENQUEUE PARENT ACTION.
// AUTO GENERATED - Do not modify or remove comment markers above or below.

if ( ! function_exists( 'formula_dark_chld_thm_cfg_locale_css' ) ) :
	function formula_dark_chld_thm_cfg_locale_css( $uri ) {
		if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) ) {
			$uri = get_template_directory_uri() . '/rtl.css';
		}
		return $uri;
	}
endif;
add_filter( 'locale_stylesheet_uri', 'formula_dark_chld_thm_cfg_locale_css' );


if ( ! function_exists( 'formula_dark_chld_thm_cfg_parent_css' ) ) :
	function formula_dark_chld_thm_cfg_parent_css() {
		wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'bootstrap-min', 'animate-min', 'fontawesome-min', 'carousel-min', 'odometer-min', 'bootstrap-smartmenus-css', 'menu-css', 'responsive', 'theme-dark-css' ) );
	}
endif;
add_action( 'wp_enqueue_scripts', 'formula_dark_chld_thm_cfg_parent_css', 10 );


/**
 * Import Options From Parent Theme
 */
function formula_parent_theme_options() {
	$formula_mods = get_option( 'theme_mods_formula' );
	if ( ! empty( $formula_mods ) ) {
		foreach ( $formula_mods as $formula_mod_k => $formula_mod_v ) {
			set_theme_mod( $formula_mod_k, $formula_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'formula_parent_theme_options' );

/**
 * Fresh site activate
 */
$formula_dark_fresh_site_activate = get_option( 'formula_dark_fresh_site_activate' );
if ( (bool) $formula_dark_fresh_site_activate == false ) {
	set_theme_mod( 'formula_custom_color', true );
	set_theme_mod( 'link_color', '#af0171' );
	set_theme_mod( 'formula_dark_theme_mode', true );
	update_option( 'formula_dark_fresh_site_activate', true );
}
