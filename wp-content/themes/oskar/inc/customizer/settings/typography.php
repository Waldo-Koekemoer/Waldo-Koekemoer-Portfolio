<?php
/**
 * Oskar Customizer Settings - Layout
 *
 * @package Oskar
 */

function oskar_customizer_settings_typography() {

	$section = 'typography';

	$choices_fonts = oskar_google_fonts_array();

	$settings_options = array(
		'heading_fonts' => array(
			'default' => '',
			'control' => 'heading_large',
			'section' => $section,
			'label' => esc_html__( 'Fonts', 'oskar' )
		),
		'local_google_fonts' => array(
			'default' => 0,
			'control' => 'checkbox',
			'section' => $section,
			'label' => esc_html__( 'Save Google Fonts Locally', 'oskar' ),
			'description' => esc_html__( 'This option will save the selected Google fonts to your server and your website visitors will not be presented with fonts loaded directly from Google. Please note: you may still have fonts loaded from Google by another plugin. In this case you should check with the plugin in question.', 'oskar' )
		),
		'font_site_title' => array(
			'default' => 'Montserrat:wght@100|200|300|400|500|600|700|800|900',
			'control' => 'select',
			'section' => $section,
			'label' => esc_html__( 'Site Title', 'oskar' ),
			'choices' => $choices_fonts,
			'preview' => true
		),
		'font_nav' => array(
			'default' => 'Poppins:wght@300|400|500|600|700',
			'control' => 'select',
			'section' => $section,
			'label' => esc_html__( 'Navigation', 'oskar' ),
			'choices' => $choices_fonts,
			'preview' => true
		),
		'font_headings' => array(
			'default' => 'Montserrat:wght@100|200|300|400|500|600|700|800|900',
			'control' => 'select',
			'section' => $section,
			'label' => esc_html__( 'Headings', 'oskar' ),
			'choices' => $choices_fonts,
			'preview' => true
		),
		'font_content' => array(
			'default' => 'Poppins:wght@300|400|500|600|700',
			'control' => 'select',
			'section' => $section,
			'label' => esc_html__( 'Content', 'oskar' ),
			'choices' => $choices_fonts,
			'preview' => true
		),
		'heading_font_sizes' => array(
			'default' => '',
			'control' => 'heading_large',
			'section' => $section,
			'label' => esc_html__( 'Font Sizes', 'oskar' ),
			'description' => esc_html__( 'Oskar theme uses responsive fluid font sizes that resize according to the browser/screen size. To disable fluid sizing set Min and Max to the same size.', 'oskar' )
		)
	);

	$settings_font_sizes = array();

	foreach ( oskar_custom_font_sizes() as $font_size ) {
		$settings_font_sizes['heading_font_'.$font_size['slug']] = array(
			'default' => '',
			'control' => 'heading_small',
			'section' => $section,
			'label' => $font_size['name']
		);
		$settings_font_sizes['font_size_'.$font_size['slug'].'_min'] = array(
			'default' => intval( $font_size['default']['min'] ),
			'control' => 'number',
			'section' => $section,
			'label' => esc_html__( 'Min', 'oskar' ),
			'attrs' => array(
				'min' => 10,
				'max' => 120,
				'step' => 1
			),
			'preview' => true
		);
		$settings_font_sizes['font_size_'.$font_size['slug'].'_max'] = array(
			'default' => intval( $font_size['default']['max'] ),
			'control' => 'number',
			'section' => $section,
			'label' => esc_html__( 'Max', 'oskar' ),
			'attrs' => array(
				'min' => 10,
				'max' => 120,
				'step' => 1
			),
			'preview' => true
		);
	}

	return array_merge( $settings_options, $settings_font_sizes );

}
