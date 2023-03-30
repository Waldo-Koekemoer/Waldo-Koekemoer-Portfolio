<?php
/**
 * Oskar Customizer Settings - Header Image
 *
 * @package Oskar
 */

function oskar_customizer_settings_header_image() {

	$section = 'header_image';

	$choices = array(
		''  => esc_html__( 'Featured Image', 'oskar' ),
		'main'  => esc_html__( 'Default Header Image', 'oskar' )
	);

	return array(
		'header_image_helper' => array(
			'default' => '',
			'control' => 'heading_small',
			'section' => $section,
			'label' => esc_html__( 'See "Layout" > "Page Title Layout" for where the header image is used.', 'oskar' )
		),
		'header_img_post' => array(
			'default' => '',
			'control' => 'select',
			'section' => $section,
			'label' => esc_html__( 'Posts should display...', 'oskar' ),
			'choices' => $choices
		),
		'header_img_page' => array(
			'default' => '',
			'control' => 'select',
			'section' => $section,
			'label' => esc_html__( 'Pages should display...', 'oskar' ),
			'choices' => $choices
		),
		'wc_header_image_helper' => array(
			'default' => '',
			'control' => 'helper_text',
			'section' => $section,
			'label' => '',
			'description' => '<p>' . esc_html__( 'With WooCommerce plugin activated, Oskar theme adds Header Image options for Products and Product Categories.', 'oskar' ) . '</p>',
			'plugin' => array(
				'class' => 'WooCommerce',
				'state' => 'inactive'
			)
		),
		'header_img_product' => array(
			'default' => '',
			'control' => 'select',
			'section' => $section,
			'label' => esc_html__( 'Products should display...', 'oskar' ),
			'choices' => $choices,
			'plugin' => array(
				'class' => 'WooCommerce',
				'state' => 'active'
			)
		),
		'header_img_product_cat' => array(
			'default' => '',
			'control' => 'select',
			'section' => $section,
			'label' => esc_html__( 'Product categories should display...', 'oskar' ),
			'choices' => $choices,
			'plugin' => array(
				'class' => 'WooCommerce',
				'state' => 'active'
			)
		)
	);

}
