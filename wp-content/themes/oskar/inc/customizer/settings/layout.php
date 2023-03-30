<?php
/**
 * Oskar Customizer Settings - Layout
 *
 * @package Oskar
 */

function oskar_customizer_settings_layout() {

	$section = 'layout';

	$choices_units = array(
		'px' => esc_html__( 'px', 'oskar' ),
		'em' => esc_html__( 'em', 'oskar' ),
		'rem' => esc_html__( 'rem', 'oskar' )
	);

	$choices_units_pc = array_merge(
		array(
			'%'	=> esc_html__( '%', 'oskar' )
		),
		$choices_units
	);

	return array(
		'heading_layout_site' => array(
			'default' => '',
			'control' => 'heading_large',
			'section' => $section,
			'label' => esc_html__( 'Site', 'oskar' )
		),
		'heading_container_width' => array(
			'default' => '',
			'control' => '',
			'section' => $section,
			'label' => esc_html__( 'Container Width - default: 1400px', 'oskar' )
		),
		'container_width' => array(
			'default' => '1400',
			'control' => 'number',
			'section' => $section,
			'label' => '',
			'attrs' => array(
				'min' => 10,
				'max' => 2560,
				'step' => 1,
			),
			'preview' => true
		),
		'container_width_unit' => array(
			'default' => 'px',
			'control' => 'select',
			'section' => $section,
			'label' => '',
			'choices' => $choices_units_pc,
			'preview' => true
		),
		'heading_site_spacing' => array(
			'default' => '',
			'control' => '',
			'section' => $section,
			'label' => esc_html__( 'Site Spacing - default: 2%', 'oskar' ),
			'description'	=> esc_html__( 'On screens narrower than the Container Width, the left/right space around the site (full-width blocks still go edge-to-edge)', 'oskar' )
		),
		'site_spacing' => array(
			'default' => '2',
			'control' => 'number',
			'section' => $section,
			'label' => '',
			'attrs' => array(
				'min' => 0,
				'max' => 100,
				'step' => 1,
			),
			'preview' => true
		),
		'site_spacing_unit' => array(
			'default' => '%',
			'control' => 'select',
			'section' => $section,
			'label' => '',
			'choices' => $choices_units_pc,
			'preview' => true
		),
		'heading_breakpoints' => array(
			'default' => '',
			'control' => 'heading_small',
			'section' => $section,
			'label' => esc_html__( 'Responsive Breakpoints', 'oskar' ),
			'description' => esc_html__( 'Up to maximum width.', 'oskar' )
		),
		'heading_breakpoint_tablet' => array(
			'default' => '',
			'control' => '',
			'section' => $section,
			'label' => esc_html__( 'Tablet - default: 1024px', 'oskar' )
		),
		'breakpoint_tablet' => array(
			'default' => '1024',
			'control' => 'number',
			'section' => $section,
			'label' => '',
			'attrs' => array(
				'min' => 0,
				'max' => 2560,
				'step' => 1,
			),
			'preview' => true
		),
		'breakpoint_tablet_unit' => array(
			'default' => 'px',
			'control' => 'select',
			'section' => $section,
			'label' => '',
			'choices' => $choices_units,
			'preview' => true
		),
		'heading_breakpoint_mobile' => array(
			'default' => '',
			'control' => '',
			'section' => $section,
			'label' => esc_html__( 'Mobile - default: 768px', 'oskar' )
		),
		'breakpoint_mobile' => array(
			'default' => '768',
			'control' => 'number',
			'section' => $section,
			'label' => '',
			'attrs' => array(
				'min' => 0,
				'max' => 2560,
				'step' => 1,
			),
			'preview' => true
		),
		'breakpoint_mobile_unit' => array(
			'default' => 'px',
			'control' => 'select',
			'section' => $section,
			'label' => '',
			'choices' => $choices_units,
			'preview' => true
		),
		'heading_breakpoint_small' => array(
			'default' => '',
			'control' => '',
			'section' => $section,
			'label' => esc_html__( 'Small - default: 480px', 'oskar' )
		),
		'breakpoint_small' => array(
			'default' => '480',
			'control' => 'number',
			'section' => $section,
			'label' => '',
			'attrs' => array(
				'min' => 0,
				'max' => 2560,
				'step' => 1,
			),
			'preview' => true
		),
		'breakpoint_small_unit' => array(
			'default' => 'px',
			'control' => 'select',
			'section' => $section,
			'label' => '',
			'choices' => $choices_units,
			'preview' => true
		),
		'heading_layout_header' => array(
			'default' => '',
			'control' => 'heading_large',
			'section' => $section,
			'label' => esc_html__( 'Header', 'oskar' )
		),
		'header_search_off' => array(
			'default' => 0,
			'control' => 'checkbox',
			'section' => $section,
			'label' => esc_html__( 'Disable Search Form in Header', 'oskar' )
		),
		'page_title_style' => array(
			'default' => '',
			'control' => 'image_radio',
			'section' => $section,
			'label' => esc_html__( 'Page Title Layout', 'oskar' ),
			'description' => esc_html__( 'Large image header uses default "Header Image" or page/post "Featured Image" if available.', 'oskar' ),
			'choices' => array(
				'' => OSKAR_TEMPLATE_DIR_URI . '/images/header-title-style-1.png',
				'2' => OSKAR_TEMPLATE_DIR_URI . '/images/header-title-style-2.png',
				'4' => OSKAR_TEMPLATE_DIR_URI . '/images/header-title-style-4.png'
			)
		),
		'heading_layout_grid' => array(
			'default' => '',
			'control' => 'heading_large',
			'section' => $section,
			'label' => esc_html__( 'Blog', 'oskar' )
		),
		'grid_layout' => array(
			'default' => '4',
			'control' => 'image_radio',
			'section' => $section,
			'label' => esc_html__( 'Grid Layout', 'oskar' ),
			'choices' => array(
				'1' => OSKAR_TEMPLATE_DIR_URI . '/images/mag-layout-1.png',
				'2' => OSKAR_TEMPLATE_DIR_URI . '/images/mag-layout-2.png',
				'3' => OSKAR_TEMPLATE_DIR_URI . '/images/mag-layout-3.png',
				'4' => OSKAR_TEMPLATE_DIR_URI . '/images/mag-layout-4.png'
			),
			'preview' => true
		),
		'archive_img_size' => array(
			'default' => 'medium',
			'control' => 'select',
			'section' => $section,
			'label' => esc_html__( 'Posts Image Size', 'oskar' ),
			'description' => esc_html__( 'See: "Settings" > "Media" (or any active plugins that control image sizes)', 'oskar' ),
			'choices' => oskar_image_size_options()
		),
		'excerpt_length' => array(
			'default' => '20',
			'control' => 'number',
			'section' => $section,
			'label' => esc_html__( 'Post excerpt length', 'oskar' ),
			'description' => esc_html__( 'Default setting is 20 words', 'oskar' ),
			'attrs' => array(
				'min' => 1,
				'max' => 600,
				'step' => 1,
			)
		),
		'archive_post[options]' => array(
			'default' => 'image:1,title:1,categories:1,date-author:1,date:0,author:0,excerpt:1,content:0,tags:1,comments-link:1,edit-link:1',
			'control' => 'sortable',
			'section' => $section,
			'label' => esc_html__( 'Post options', 'oskar' ),
			'description' => esc_html__( 'Check the box to display. Sortable: drag and drop into your preferred order.', 'oskar' ),
			'choices' => array(
				'image' => esc_html__( 'Featured image', 'oskar' ),
				'title' => esc_html__( 'Title', 'oskar' ),
				'categories' => esc_html__( 'Categories', 'oskar' ),
				'date-author' => esc_html__( 'Date & author', 'oskar' ),
				'date' => esc_html__( 'Date', 'oskar' ),
				'author' => esc_html__( 'Author', 'oskar' ),
				'excerpt' => esc_html__( 'Excerpt', 'oskar' ),
				'content' => esc_html__( 'Full content', 'oskar' ),
				'tags' => esc_html__( 'Tags', 'oskar' ),
				'comments-link' => esc_html__( 'Comments link (only if comments enabled)', 'oskar' ),
				'edit-link' => esc_html__( 'Edit link (only if user is logged in and allowed to edit the post)', 'oskar' )
			)
		),
		'heading_layout_sidebar' => array(
			'default' => '',
			'control' => 'heading_large',
			'section' => $section,
			'label' => esc_html__( 'Sidebar', 'oskar' )
		),
		'sidebar_position' => array(
			'default' => 'right',
			'control' => 'select',
			'section' => $section,
			'label' => esc_html__( 'Position', 'oskar' ),
			'choices' => array(
				'left'	=> esc_html__( 'Left', 'oskar' ),
				'right'	=> esc_html__( 'Right', 'oskar' )
			)
		)
	);

}
