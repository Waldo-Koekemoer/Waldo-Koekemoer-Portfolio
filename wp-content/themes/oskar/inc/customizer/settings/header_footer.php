<?php
/**
 * Oskar Customizer Settings - Advanced - Header/Footer
 *
 * @package Oskar
 */

function oskar_customizer_settings_header_footer() {

	$section = 'header_footer';

	$choices = oskar_choices_reusable_content();

	return array(
		'header_footer_helper' => array(
			'default' => '',
			'control' => 'helper_text',
			'section' => $section,
			'label' => '',
			'description' => '<p>' . esc_html__( 'Select either a Private Page or a Reusable Block.', 'oskar' ) . '</p>'
		),
		'custom_header' => array(
			'default' => '0',
			'control' => 'select',
			'section' => $section,
			'label' => esc_html__( 'Header', 'oskar' ),
			'choices' => $choices
		),
		'custom_footer' => array(
			'default' => '0',
			'control' => 'select',
			'section' => $section,
			'label' => esc_html__( 'Footer', 'oskar' ),
			'choices' => $choices
		),
		'header_footer_helper2' => array(
			'default' => '',
			'control' => 'helper_text',
			'section' => $section,
			'label' => '',
			'description' => '<p>' . esc_html__( 'Create your content in a new page and set the page "visibility" to "private".', 'oskar' ) . '</p>'
		),
		'header_footer_helper3' => array(
			'default' => '',
			'control' => 'helper_text',
			'section' => $section,
			'label' => '',
			'description' => '<p>' . esc_html__( 'Alternatively save your content as a "reusable block" in the block editor.', 'oskar' ) . '</p>'
		),
		'header_footer_helper4' => array(
			'default' => '',
			'control' => 'helper_text',
			'section' => $section,
			'label' => '',
			'description' => '<p>' . esc_html__( 'These options will completely override the theme header/footer and their associated widget areas.', 'oskar' ) . '</p>'
		)
	);

}
