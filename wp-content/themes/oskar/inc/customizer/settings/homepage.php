<?php
/**
 * Oskar Customizer Settings - Homepage
 *
 * @package Oskar
 */

function oskar_customizer_settings_homepage() {

	$section = 'static_front_page';

	$home_sections_choices = array(
		'services' => esc_html__( 'Featured Services', 'oskar' ),
		'page-content' => esc_html__( 'Page Content (your chosen static homepage)', 'oskar' ),
		'extra-page-content' => esc_html__( 'Extra Page Content (select the page below)', 'oskar' ),
	);

	if ( class_exists( 'WooCommerce' ) ) {
		$home_sections_choices_wc = array(
			'wc-categories' => esc_html__( 'Product Categories', 'oskar' ),
			'wc-recent' => esc_html__( 'New products', 'oskar' ),
			'wc-featured' => esc_html__( 'Featured products', 'oskar' ),
			'wc-sale' => esc_html__( 'On-sale products', 'oskar' ),
			'wc-best' => esc_html__( 'Top sellers', 'oskar' ),
			'wc-rated' => esc_html__( 'Top rated products', 'oskar' )
		);
		$home_sections_choices = array_merge( $home_sections_choices, $home_sections_choices_wc );
	}

	$settings_options = array(
		'heading_homepage_sections' => array(
			'default' => '',
			'control' => 'heading_large',
			'section' => $section,
			'label' => esc_html__( 'Homepage Sections', 'oskar' ),
			'description'	=> esc_html__( 'You should first select a Static Homepage if you have not already done so.', 'oskar' )
		),
		'home_sections[options]' => array(
			'default' => 'services:1,page-content:1,extra-page-content:0,wc-categories:0,wc-recent:0,wc-featured:0,wc-sale:0,wc-best:0,wc-rated:0',
			'control' => 'sortable',
			'section' => $section,
			'label' => esc_html__( 'Homepage Sections', 'oskar' ),
			'description' => esc_html__( 'Check the box to display. Sortable: drag and drop into your preferred order.', 'oskar' ),
			'choices' => $home_sections_choices
		),
		'wc_sections_helper' => array(
			'default' => '',
			'control' => 'helper_text',
			'section' => $section,
			'label' => '',
			'description' => oskar_home_tabs_description(),
			'plugin' => array(
				'class' => 'WooCommerce',
				'state' => 'inactive'
			)
		),
		'heading_featured_services' => array(
			'default' => '',
			'control' => 'heading_large',
			'section' => $section,
			'label' => esc_html__( 'Featured Services', 'oskar' )
		),
		'featured_style' => array(
			'default' => '1',
			'control' => 'image_radio',
			'section' => $section,
			'label' => esc_html__( 'Style', 'oskar' ),
			'choices' => array(
				'1' => OSKAR_TEMPLATE_DIR_URI . '/images/featured-style-1.png',
				'2' => OSKAR_TEMPLATE_DIR_URI . '/images/featured-style-2.png',
				'3' => OSKAR_TEMPLATE_DIR_URI . '/images/featured-style-3.png'
			),
			'preview' => true
		),
		'featured_zoom' => array(
			'default' => 0,
			'control' => 'checkbox',
			'section' => $section,
			'label' => esc_html__( 'Enable Zoom On Hover', 'oskar' ),
			'description' => esc_html__( 'Activates the zoom effect when hovering over each featured service box.', 'oskar' ),
			'preview' => true
		),
		'featured_overlap' => array(
			'default' => '180',
			'control' => 'number',
			'section' => $section,
			'label' => esc_html__( 'Overlap', 'oskar' ),
			'description' => esc_html__( 'How far the Featured Services should overlap the Header Hero Section. Recommended to set this to 0 if Featured Services is not the first section.', 'oskar' ),
			'attrs' => array(
				'min' => 0,
				'max' => 490,
				'step' => 1
			),
			'preview' => true
		),
		'featured_pages' => array(
			'default' => 0,
			'control' => 'checkbox',
			'section' => $section,
			'label' => esc_html__( 'Select Pages', 'oskar' ),
			'description' => esc_html__( 'By default your latest posts are displayed. Enable this option to choose a page for each featured service.', 'oskar' ),
			'preview' => true
		)
	);

	$settings_featured_services = array();

	for ( $i = 1; $i <= oskar_featured_services_number(); $i++ ) {
		$settings_featured_services['featured_header'.$i] = array(
			'default' => '',
			'control' => 'heading_small',
			'section' => $section,
			'label' => esc_html__( 'Feature ', 'oskar' ).$i
		);
		$settings_featured_services['featured_page_icon'.$i] = array(
			'default' => oskar_featured_icon_defaults($i),
			'control' => 'icon_select',
			'section' => $section,
			'label' => esc_html__( 'Icon', 'oskar' ),
			'description' => 'featuredpageicon'.$i, //not for display, no translation as using only for unique element name
			'preview' => true
		);
		$settings_featured_services['featured_page_link'.$i] = array(
			'default' => '0',
			'control' => 'page_select',
			'section' => $section,
			'label' => esc_html__( 'Select Page', 'oskar' ),
			'description' => esc_html__( 'Displays title and excerpt of selected page. You can add an optional hand-crafted excerpt in the page editor (make sure []excerpt is checked in Screen Options).', 'oskar' ),
			'preview' => true
		);
	}

	$settings_extra_page = array(
		'heading_extra_page' => array(
			'default' => '',
			'control' => 'heading_large',
			'section' => $section,
			'label' => esc_html__( 'Extra Page Content', 'oskar' )
		),
		'homepage_extra_page' => array(
			'default' => '0',
			'control' => 'page_select',
			'section' => $section,
			'label' => esc_html__( 'Select Page', 'oskar' ),
			'description' => esc_html__( 'Choose which extra page content to display on homepage.', 'oskar' )
		)
	);

	return array_merge( $settings_options, $settings_featured_services, $settings_extra_page );

}
