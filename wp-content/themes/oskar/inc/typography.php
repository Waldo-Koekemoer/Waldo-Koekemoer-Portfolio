<?php
/**
 * Custom block editor font sizes.
 */
function oskar_custom_font_sizes() {
	return array(
		array(
			'name' => esc_html__( 'Small', 'oskar' ),
			'slug' => 'small',
			'fluid' => array( 'min' => get_theme_mod( 'font_size_small_min', '12' ) .'px', 'max' => get_theme_mod( 'font_size_small_max', '14' ) .'px' ),
			'size' => '14px',
			'default' => array( 'min' => '12px', 'max' => '14px' )
		),
		array(
			'name' => esc_html__( 'Normal', 'oskar' ),
			'slug' => 'normal',
			'fluid' => array( 'min' => get_theme_mod( 'font_size_normal_min', '14' ) .'px', 'max' => get_theme_mod( 'font_size_normal_max', '16' ) .'px' ),
			'size' => get_theme_mod( 'font_size_normal_max', '16' ) .'px',
			'default' => array( 'min' => '14px', 'max' => '16px' )
		),
		array(
			'name' => esc_html__( 'Medium', 'oskar' ),
			'slug' => 'medium',
			'fluid' => array( 'min' => get_theme_mod( 'font_size_medium_min', '18' ) .'px', 'max' => get_theme_mod( 'font_size_medium_max', '22' ) .'px' ),
			'size' => get_theme_mod( 'font_size_medium_max', '22' ) .'px',
			'default' => array( 'min' => '18px', 'max' => '22px' )
		),
		array(
			'name' => esc_html__( 'Large', 'oskar' ),
			'slug' => 'large',
			'fluid' => array( 'min' => get_theme_mod( 'font_size_large_min', '22' ) .'px', 'max' => get_theme_mod( 'font_size_large_max', '36' ) .'px' ),
			'size' => '36px',
			'default' => array( 'min' => '22px', 'max' => '36px' )
		),
		array(
			'name' => esc_html__( 'Extra Large', 'oskar' ),
			'slug' => 'x-large',
			'fluid' => array( 'min' => get_theme_mod( 'font_size_x-large_min', '36' ) .'px', 'max' => get_theme_mod( 'font_size_x-large_max', '54' ) .'px' ),
			'size' => '48px',
			'default' => array( 'min' => '36px', 'max' => '54px' )
		),
		array(
			'name' => esc_html__( 'XXL', 'oskar' ),
			'slug' => 'xx-large',
			'fluid' => array( 'min' => get_theme_mod( 'font_size_xx-large_min', '54' ) .'px', 'max' => get_theme_mod( 'font_size_xx-large_max', '76' ) .'px' ),
			'size' => '64px',
			'default' => array( 'min' => '54px', 'max' => '76px' )
		),
	);
}


/**
 * Get Google fonts and optionally save locally with WPTT Webfont Loader.
 */
function oskar_fonts_url() {

	$fonts_url = '';
	$fonts = array();

	$font_site_title = get_theme_mod( 'font_site_title', 'Montserrat:wght@100|200|300|400|500|600|700|800|900' );
	if ( $font_site_title !== '' ) {
		$fonts[] = $font_site_title;
	}

	$font_nav = get_theme_mod( 'font_nav', 'Poppins:wght@300|400|500|600|700' );
	if ( $font_nav !== '' ) {
		$fonts[] = $font_nav;
	}

	$font_headings = get_theme_mod( 'font_headings', 'Montserrat:wght@100|200|300|400|500|600|700|800|900' );
	if ( $font_headings !== '' ) {
		$fonts[] = $font_headings;
	}

	$font_content = get_theme_mod( 'font_content', 'Poppins:wght@300|400|500|600|700' );
	if ( $font_content !== '' ) {
		$fonts[] = $font_content;
	}

	if ( !empty( $fonts ) ) {
		$fonts_url = add_query_arg( array(
			'family' => implode( '&family=', array_unique( str_replace('|', ';', $fonts) ) ),
			'display' => 'swap',
		), 'https://fonts.googleapis.com/css2' );

		if ( get_theme_mod( 'local_google_fonts' ) ) {
			require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
			return wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
		} else {
			return esc_url_raw( $fonts_url );
		}
	} else {
		return NULL;
	}

}


/**
 * Array of Google fonts
 */
function oskar_google_fonts_array() {
	return array(
		'' => esc_html__( '&mdash; Select &mdash;', 'oskar' ),
		'Alegreya+Sans:wght@100|200|300|400|500|600|700|800|900' => 'Alegreya Sans',
		'Arimo:wght@400|700' => 'Arimo',
		'Arvo:wght@400|700' => 'Arvo',
		'Asap:wght@400|700' => 'Asap',
		'Bitter:wght@400|700' => 'Bitter',
		'Bree+Serif:wght@400' => 'Bree Serif',
		'Cabin:wght@400|500|600|700' => 'Cabin',
		'Catamaran:wght@300|400|600|700|800' => 'Catamaran',
		'Crimson+Text:wght@400|600|700' => 'Crimson Text',
		'Cuprum:wght@400|700' => 'Cuprum',
		'Dosis:wght@200|300|400|500|600|700|800' => 'Dosis',
		'Droid+Sans:wght@400|700' => 'Droid Sans',
		'Droid+Serif:wght@400|700' => 'Droid Serif',
		'Exo:wght@100|200|300|400|500|600|700|800|900' => 'Exo',
		'Exo+2:wght@100|200|300|400|500|600|700|800|900' => 'Exo 2',
		'Hind:wght@300|400|500|600|700' => 'Hind',
		'Josefin+Sans:wght@100|300|400|600|700' => 'Josefin Sans',
		'Lato:wght@100|300|400|700|900' => 'Lato',
		'Libre+Franklin:wght@100|200|300|400|500|600|700|800|900' => 'Libre Franklin',
		'Maven+Pro:wght@400|500|700|900' => 'Maven Pro',
		'Merriweather:wght@300|400|700|900' => 'Merriweather',
		'Merriweather+Sans:wght@300|400|700|800' => 'Merriweather Sans',
		'Montserrat:wght@100|200|300|400|500|600|700|800|900' => 'Montserrat',
		'Muli:wght@300|400' => 'Muli',
		'Noto+Sans:wght@400|700' => 'Noto Sans',
		'Noto+Serif:wght@400|700' => 'Noto Serif',
		'Nunito:wght@300|400|700' => 'Nunito',
		'Open+Sans:wght@300|400|600|700|800' => 'Open Sans',
		'Orbitron:wght@400|500|700|900' => 'Orbitron',
		'Oswald:wght@300|400|700' => 'Oswald',
		'Oxygen:wght@300|400|700' => 'Oxygen',
		'Playfair+Display:wght@400|700|900' => 'Playfair Display',
		'Poppins:wght@300|400|500|600|700' => 'Poppins',
		'PT+Sans:wght@400|700' => 'PT Sans',
		'PT+Serif:wght@400|700' => 'PT Serif',
		'Rajdhani:wght@300|400|500|600|700' => 'Rajdhani',
		'Raleway:wght@100|200|300|400|500|600|700|800|900' => 'Raleway',
		'Roboto:wght@100|300|400|500|700|900' => 'Roboto',
		'Roboto+Slab:wght@100|300|400|700' => 'Roboto Slab',
		'Source+Sans+Pro:wght@200|300|400|600|700|900' => 'Source Sans Pro',
		'Titillium+Web:wght@200|300|400|600|700|900' => 'Titillium Web',
		'Ubuntu:wght@300|400|500|700' => 'Ubuntu',
	);
}
