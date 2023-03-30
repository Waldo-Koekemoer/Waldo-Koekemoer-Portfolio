<?php
/**
 * Default theme colors.
 */
function oskar_custom_colors() {
	return array(
		array(
			'name' => esc_html__( 'Foreground', 'oskar' ),
			'description' => esc_html__( 'Header scrolled background, sub-menu background, footer background, main text color', 'oskar' ),
			'slug' => 'fg',
			'color' => get_theme_mod( 'color_fg', '#0a001e' ),
			'default' => '#0a001e'
		),
		array(
			'name' => esc_html__( 'One', 'oskar' ),
			'description' => esc_html__( 'Button background and default text link color', 'oskar' ),
			'slug' => 'accent-1',
			'color' => get_theme_mod( 'color_accent-1', '#4fc99a' ),
			'default' => '#4fc99a'
		),
		array(
			'name' => esc_html__( 'Two', 'oskar' ),
			'description' => '',
			'slug' => 'accent-2',
			'color' => get_theme_mod( 'color_accent-2', '#f48fb1' ),
			'default' => '#f48fb1'
		),
		array(
			'name' => esc_html__( 'Three', 'oskar' ),
			'description' => '',
			'slug' => 'accent-3',
			'color' => get_theme_mod( 'color_accent-3', '#ff8a65' ),
			'default' => '#ff8a65'
		),
		array(
			'name' => esc_html__( 'Four', 'oskar' ),
			'description' => '',
			'slug' => 'accent-4',
			'color' => get_theme_mod( 'color_accent-4', '#4ac6d6' ),
			'default' => '#4ac6d6'
		),
	);
}

/**
 * Custom block editor color palette.
 */
function oskar_custom_color_palette() {
	$palette = array();
	$background_color = array(
		array(
			'name' => esc_html__( 'Background', 'oskar' ),
			'slug' => 'bg',
			'color' => '#' . get_theme_mod( 'background_color', 'ffffff' )
		)
	);
	$colors = array_merge( $background_color, oskar_custom_colors() );
	foreach ( $colors as $color ) {
		if ( $color['color'] === '#000' || $color['color'] === '#000000' ) {
			$palette[] = array(
				'name' => $color['name'],
				'slug' => $color['slug'],
				'color' => $color['color']
			);
			$palette[] = array(
				'name' => $color['name'] . ' ' . esc_html__( 'Light', 'oskar' ),
				'slug' => $color['slug'] . '-light',
				'color' => oskar_color_variation( $color['color'], '0.4', true )
			);
			$palette[] = array(
				'name' => $color['name'] . ' ' . esc_html__( 'Very Light', 'oskar' ),
				'slug' => $color['slug'] . '-very-light',
				'color' => oskar_color_variation( $color['color'], '0.1', true )
			);
		} elseif ( $color['color'] === '#fff' || $color['color'] === '#ffffff' ) {
			$palette[] = array(
				'name' => $color['name'] . ' ' . esc_html__( 'Dark', 'oskar' ),
				'slug' => $color['slug'] . '-dark',
				'color' => oskar_color_variation( $color['color'], '0.3' )
			);
			$palette[] = array(
				'name' => $color['name'],
				'slug' => $color['slug'],
				'color' => $color['color']
			);			
		} else {
			$palette[] = array(
				'name' => $color['name'] . ' ' . esc_html__( 'Dark', 'oskar' ),
				'slug' => $color['slug'] . '-dark',
				'color' => oskar_color_variation( $color['color'], '0.3' )
			);
			$palette[] = array(
				'name' => $color['name'],
				'slug' => $color['slug'],
				'color' => $color['color']
			);
			$palette[] = array(
				'name' => $color['name'] . ' ' . esc_html__( 'Light', 'oskar' ),
				'slug' => $color['slug'] . '-light',
				'color' => oskar_color_variation( $color['color'], '0.4', true )
			);
			$palette[] = array(
				'name' => $color['name'] . ' ' . esc_html__( 'Very Light', 'oskar' ),
				'slug' => $color['slug'] . '-very-light',
				'color' => oskar_color_variation( $color['color'], '0.1', true )
			);
		}
	}
	$palette[] = array(
		'name' => esc_html__( 'Transparent Light', 'oskar' ),
		'slug' => 'transparent-light',
		'color' => 'rgba(255,255,255,0.3)'
	);
	$palette[] = array(
		'name' => esc_html__( 'Transparent Very Light', 'oskar' ),
		'slug' => 'transparent-very-light',
		'color' => 'rgba(255,255,255,0.7)'
	);
	$palette[] = array(
		'name' => esc_html__( 'Transparent Dark', 'oskar' ),
		'slug' => 'transparent-dark',
		'color' => 'rgba(0,0,0,0.04)'
	);
	$palette[] = array(
		'name' => esc_html__( 'Transparent Very Dark', 'oskar' ),
		'slug' => 'transparent-very-dark',
		'color' => 'rgba(0,0,0,0.3)'
	);
	return $palette;
}


/**
 * Custom block editor color gradients.
 */
function oskar_custom_color_gradients() {

	return array(
		array(
			'name' => esc_html__( 'Transparent to Foreground', 'oskar' ),
			'slug' => 'transparent-to-fg',
			'gradient' => 'linear-gradient( 180deg, transparent 0%, ' . get_theme_mod( 'color_fg', '#0a001e' ) . ' 100% )'
		),
		array(
			'name' => esc_html__( 'One to Two', 'oskar' ),
			'slug' => 'one-to-two',
			'gradient' => 'linear-gradient( 135deg, ' . get_theme_mod( "color_accent-1", "#4fc99a" ) . ' 0%, ' . get_theme_mod( "color_accent-2", "#f48fb1" ) . ' 100% )'
		),
		array(
			'name' => esc_html__( 'One to Three', 'oskar' ),
			'slug' => 'one-to-three',
			'gradient' => 'linear-gradient( 135deg, ' . get_theme_mod( "color_accent-1", "#4fc99a" ) . ' 0%, ' . get_theme_mod( "color_accent-3", "#ff8a65" ) . ' 100% )'
		),
		array(
			'name' => esc_html__( 'One to Four', 'oskar' ),
			'slug' => 'one-to-four',
			'gradient' => 'linear-gradient( 135deg, ' . get_theme_mod( "color_accent-1", "#4fc99a" ) . ' 0%, ' . get_theme_mod( "color_accent-4", "#4ac6d6" ) . ' 100% )'
		),
		array(
			'name' => esc_html__( 'One to Two to Three to Four', 'oskar' ),
			'slug' => 'accents-all',
			'gradient' => 'linear-gradient( 135deg, ' . get_theme_mod( "color_accent-1", "#4fc99a" ) . ' 0%, ' . get_theme_mod( "color_accent-2", "#f48fb1" ) . ' 33.33%, ' . get_theme_mod( "color_accent-3", "#ff8a65" ) . ' 66.67%, ' . get_theme_mod( "color_accent-4", "#4ac6d6" ) . ' 100% )'
		),
		array(
			'name' => esc_html__( 'Four Color Block', 'oskar' ),
			'slug' => 'four-color-block',
			'gradient' => 'linear-gradient( to right, ' . get_theme_mod( "color_accent-1", "#4fc99a" ) . ', ' . get_theme_mod( "color_accent-1", "#4fc99a" ) . ' 25%, ' . get_theme_mod( "color_accent-2", "#f48fb1" ) . ' 25%, ' . get_theme_mod( "color_accent-2", "#f48fb1" ) . ' 50%, ' . get_theme_mod( "color_accent-3", "#ff8a65" ) . ' 50%, ' . get_theme_mod( "color_accent-3", "#ff8a65" ) . ' 75%, ' . get_theme_mod( "color_accent-4", "#4ac6d6" ) . ' 75%, ' . get_theme_mod( "color_accent-4", "#4ac6d6" ) . ' )'
		),
		array(
			'name' => esc_html__( 'Four (Circular)', 'oskar' ),
			'slug' => 'four-circular',
			'gradient' => 'radial-gradient( circle, var(--wp--preset--color--accent-4-dark) 33%, var(--wp--preset--color--accent-4) calc(33% + 1px) )'
		),
		array(
			'name' => esc_html__( 'Four (Diagonal)', 'oskar' ),
			'slug' => 'four-diagonal',
			'gradient' => 'linear-gradient( 135deg, var(--wp--preset--color--accent-4) 50%, var(--wp--preset--color--accent-4-light) calc(49.95% + 1px) )'
		),
	);

}


/**
 * Generate a lighter/darker color variation.
 */
function oskar_color_variation( $hex, $percent, $lighter = false ) {
	$hash = '';
	if ( stristr( $hex, '#' ) ) {
		$hex = str_replace( '#', '', $hex );
		$hash = '#';
	}
	$rgb = [hexdec( substr( $hex, 0, 2 ) ), hexdec( substr( $hex, 2, 2 ) ), hexdec( substr( $hex, 4, 2 ) )];
	for ( $i = 0; $i < 3; $i++ ) {
		if ( $lighter ) {
			$rgb[$i] = round( $rgb[$i] * $percent ) + round( 255 * ( 1 - $percent ) );
		} else {
			$rgb[$i] = round( $rgb[$i] * ( 1 - $percent ) );
		}
		if ( $rgb[$i] > 255 ) {
			$rgb[$i] = 255;
		}
	}
	$hex = '';
	for ( $i = 0; $i < 3; $i++ ) {
		$hexDigit = dechex( $rgb[$i] );
		if ( strlen( $hexDigit ) == 1 ) {
			$hexDigit = "0" . $hexDigit;
		}
		$hex .= $hexDigit;
	}
	return $hash . $hex;
}
