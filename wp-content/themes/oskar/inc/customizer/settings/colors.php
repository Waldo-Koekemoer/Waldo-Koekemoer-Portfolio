<?php
/**
 * Oskar Customizer Settings - Colors
 *
 * @package Oskar
 */

function oskar_customizer_settings_colors() {

	$settings = array();

	$section = 'colors';

	$color_palette = oskar_custom_colors();

	foreach ( $color_palette as $color ) {
		$settings['color_' . $color['slug']] = array(
			'default' => $color['default'],
			'control' => 'color',
			'section' => 'colors',
			'label' => $color['name'],
			'description' => $color['description'],
			'preview' => array(
				'selector' => 'body',
				'property' => '--wp--preset--color--' . $color['slug'],
				'prepend' => '',
				'append' => '',
				'colorvariations' => true
			),
		);
	}

	return $settings;

}
