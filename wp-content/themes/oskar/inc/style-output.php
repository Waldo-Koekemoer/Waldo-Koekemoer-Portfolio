<?php
/**
 * Outputs the styling options from the customizer
 *
 * @package Oskar
 */

function oskar_css_font_family( $font_family ) {
	$font_family = str_replace( '+', ' ', $font_family );
	if ( strpos( $font_family, ':' ) ) {
		$font_family = substr( $font_family, 0, strpos( $font_family, ':' ) );
	}
	return '\'' . $font_family . '\'';
}

function oskar_active_home_sections() {
	$home_sec_tabs = get_theme_mod( 'home_sec' );

	$active_tabs = array();

	if ( !empty( $home_sec_tabs['tabs'] ) ) {

		$tabs = explode( ',', $home_sec_tabs['tabs'] );

		foreach ($tabs as $tab) {
			$tab = explode(":", $tab);
			if ( $tab[1] == 1 ) {
				$active_tabs[] = $tab[0];
			}
		}
	}

	return $active_tabs;
}

function oskar_is_featured_services_first() {
	foreach ( oskar_active_home_sections() as $section ) {
		if ( $section[0] === 'services' ) {
			return true;
		} else {
			return false;
		}
	}
}

function oskar_dynamic_style( $body = array(), $css = array() ) {

	$font_sizes = oskar_custom_font_sizes();
	foreach ( $font_sizes as $font_size ) {
		if ( isset( $font_size['fluid'] ) ) {
			if ( $font_size['fluid']['min'] === $font_size['fluid']['max'] ) {
				$font_size_attr = $font_size['size'];
			} else {
				$font_size_attr = wp_get_computed_fluid_typography_value(
					array(
						'minimum_viewport_width' => '768px',
						'maximum_viewport_width' => '1600px',
						'minimum_font_size'      => $font_size['fluid']['min'],
						'maximum_font_size'      => $font_size['fluid']['max'],
						'scale_factor'           => 1,
					)
				);
			}
		} else {
			$font_size_attr = $font_size['size'];
		}
		$body[] = '--wp--preset--font-size--' . esc_attr( $font_size['slug'] ) . ': ' . esc_attr( $font_size_attr ) . ';';
	}

	$container_width = get_theme_mod( 'container_width', '1400' );
	$container_width_unit = get_theme_mod( 'container_width_unit', 'px' );
	if ( $container_width ) {
		$body[] = '--container--width:' . esc_attr( $container_width ) . esc_attr( $container_width_unit ) . ';';
	}

	$site_spacing = get_theme_mod( 'site_spacing', '2' );
	$site_spacing_unit = get_theme_mod( 'site_spacing_unit', '%' );
	if ( $site_spacing === 0 ) {
		$body[] = '--site--spacing:0;';
	} else {
		$body[] = '--site--spacing:' . esc_attr( $site_spacing ) . esc_attr( $site_spacing_unit ) . ';';
	}

	$header_textcolor = get_theme_mod( 'header_textcolor' );
	if ( $header_textcolor && $header_textcolor != 'blank' ) {
		$body[] = '--header--text--color:#' . esc_attr( $header_textcolor ) . ';';
	}

	$featured_overlap = get_theme_mod( 'featured_overlap', '180' );
	$body[] = '--featured--services--overlap:' . esc_attr( $featured_overlap ) . 'px;';

	$colors = oskar_custom_color_palette();
	foreach ( $colors as $color ) {
		$css[] = '.has-' . esc_attr( $color['slug'] ) . '-color{color:var(--wp--preset--color--' . esc_attr( $color['slug'] ) . ');}.has-' . esc_attr( $color['slug'] ) . '-background-color{background-color:var(--wp--preset--color--' . esc_attr( $color['slug'] ) . ');}';
	}

	$gradients = oskar_custom_color_gradients();
	foreach ( $gradients as $gradient ) {
		$css[] = '.has-' . esc_attr( $gradient['slug'] ) . '-gradient-background{background: var(--wp--preset--gradient--' . esc_attr( $gradient['slug'] ) . ');}';
	}

	$font_content = get_theme_mod( 'font_content' );
	$font_headings = get_theme_mod( 'font_headings' );
	$font_site_title = get_theme_mod( 'font_site_title' );
	$font_nav = get_theme_mod( 'font_nav' );

	if ( $font_content ) {
		$body[] = '--font--family--content:' . oskar_css_font_family( $font_content ) . ';';
	}

	if ( $font_headings ) {
		$body[] = '--font--family--headings:' . oskar_css_font_family( $font_headings ) . ';';
	}

	if ( $font_site_title ) {
		$body[] = '--font--family--site-title:' . oskar_css_font_family( $font_site_title ) . ';';
	}

	if ( $font_nav ) {
		$body[] = '--font--family--nav:' . oskar_css_font_family( $font_nav ) . ';';
	}

	return 'body{' . implode( '', $body ) . '}' . implode( '', $css );

}

function oskar_dynamic_style_wc( $body = array(), $css = array() ) {

	$woo_uncat_id = term_exists( 'uncategorized', 'product_cat' );
	if ( $woo_uncat_id != NULL ) {
		$woo_uncat_id = $woo_uncat_id['term_id'];
		$css[] = '#shop-filters .widget_product_categories li.cat-item-' . $woo_uncat_id . '{display:none;}';
	}

	return 'body{' . implode( '', $body ) . '}' . implode( '', $css );

}

function oskar_editor_dynamic_style( $mceInit, $body = array() ) {

	$color_bg = get_theme_mod( 'background_color' );
	if ( $color_bg ) {
		$body[] = '--wp--preset--color--bg:#' . esc_attr( $color_bg ) . ';';
	}

	$color_fg = get_theme_mod( 'color_fg' );
	if ( $color_fg ) {
		$body[] = '--wp--preset--color--fg:' . esc_attr( $color_fg ) . ';';
	}

	$color_accent1 = get_theme_mod( 'color_accent-1' );
	if ( $color_accent1 ) {
		$body[] = '--wp--preset--color--accent-1:' . esc_attr( $color_accent1 ) . ';';
	}

	$font_content = get_theme_mod( 'font_content' );
	if ( $font_content ) {
		$body[] = '--font--family--content:' . oskar_css_font_family( $font_content ) . ';';
	}

	$font_headings = get_theme_mod( 'font_headings' );
	if ( $font_headings ) {
		$body[] = '--font--family--headings:' . oskar_css_font_family( $font_headings ) . ';';
	}

	$styles = 'body{' . implode( '', $body ) . '}';

	if ( isset( $mceInit['content_style'] ) ) {
		$mceInit['content_style'] .= ' ' . $styles . ' ';
	} else {
		$mceInit['content_style'] = $styles . ' ';
	}
	return $mceInit;

}
add_filter( 'tiny_mce_before_init', 'oskar_editor_dynamic_style' );

function oskar_block_editor_dynamic_style( $body = array(), $css = array() ) {

	$container_width = get_theme_mod( 'container_width', '1400' );
	$container_width_unit = get_theme_mod( 'container_width_unit', 'px' );
	if ( $container_width ) {
		$body[] = '--container--width:' . esc_attr( $container_width ) . esc_attr( $container_width_unit ) . ';';
	}

	$site_spacing = get_theme_mod( 'site_spacing', '2' );
	$site_spacing_unit = get_theme_mod( 'site_spacing_unit', '%' );
	if ( $site_spacing === 0 ) {
		$body[] = '--site--spacing:0;';
	} else {
		$body[] = '--site--spacing:' . esc_attr( $site_spacing ) . esc_attr( $site_spacing_unit ) . ';';
	}

	$font_content = get_theme_mod( 'font_content' );
	$font_headings = get_theme_mod( 'font_headings' );

	if ( $font_content ) {
		$body[] = '--font--family--content:' . oskar_css_font_family( $font_content ) . ';';
	}

	if ( $font_headings ) {
		$body[] = '--font--family--headings:' . oskar_css_font_family( $font_headings ) . ';';
	}

	$colors = oskar_custom_color_palette();
	foreach ( $colors as $color ) {
		$css[] = '.has-' . esc_attr( $color['slug'] ) . '-color{color:var(--wp--preset--color--' . esc_attr( $color['slug'] ) . ');}.has-' . esc_attr( $color['slug'] ) . '-background-color{background-color:var(--wp--preset--color--' . esc_attr( $color['slug'] ) . ');}';
	}

	$gradients = oskar_custom_color_gradients();
	foreach ( $gradients as $gradient ) {
		$css[] = '.has-' . esc_attr( $gradient['slug'] ) . '-gradient-background{background: var(--wp--preset--gradient--' . esc_attr( $gradient['slug'] ) . ');}';
	}

	return '.editor-styles-wrapper{' . implode( '', $body ) . '}' . implode( '', $css );

}
