<?php
/**
 * Oskar Customizer Sections
 *
 * @package Oskar
 */

/**
 * Returns array of additional theme customizer sections.
 */
function oskar_customizer_sections() {
	return array(
		'layout' => array(
			'label'			=> esc_html__( 'Layout', 'oskar' ),
			'description'	=> '',
			'panel'			=> '',
			'priority'		=> 27,
		),
		'typography' => array(
			'label'			=> esc_html__( 'Typography & Fonts', 'oskar' ),
			'description'	=> '',
			'panel'			=> '',
			'priority'		=> 42,
		),
		'header_footer' => array(
			'label'			=> esc_html__( 'Advanced - Header/Footer', 'oskar' ),
			'description'	=> esc_html__( 'Build your own custom Header and Footer.', 'oskar' ),
			'panel'			=> '',
			'priority'		=> 190,
		),
		'theme_upgrade' => array(
			'label'			=> esc_html__( 'Go Pro', 'oskar' ),
			'description'	=> esc_html__( 'Upgrade to Oskar Pro for even more cool features and customization options.', 'oskar' ),
			'panel'			=> '',
			'priority'		=> 1,
		),
	);
}
