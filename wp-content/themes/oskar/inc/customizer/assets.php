<?php
/**
 * Oskar Customizer Assets Functions
 *
 * @package Oskar
 */

function oskar_get_image_sizes() {
	global $_wp_additional_image_sizes;

	$sizes = array();

	foreach ( get_intermediate_image_sizes() as $_size ) {
		if ( in_array( $_size, array('thumbnail', 'medium', 'medium_large', 'large') ) ) {
			$sizes[ $_size ]['width']  = get_option( "{$_size}_size_w" );
			$sizes[ $_size ]['height'] = get_option( "{$_size}_size_h" );
			$sizes[ $_size ]['crop']   = (bool) get_option( "{$_size}_crop" );
		} elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
			$sizes[ $_size ] = array(
				'width'  => $_wp_additional_image_sizes[ $_size ]['width'],
				'height' => $_wp_additional_image_sizes[ $_size ]['height'],
				'crop'   => $_wp_additional_image_sizes[ $_size ]['crop'],
			);
		}
	}

	return $sizes;
}

function oskar_image_size_options() {
	$image_size_configs = oskar_get_image_sizes();
	// Hardcoded 'full' because not a registered image size
	// 'full' will result in the original uploaded image size being used
	$sizes = array(
		'full' => esc_html__( 'Full (original full size image)', 'oskar' ),
	);
	foreach( $image_size_configs as $name => $size_config) {
		if ( $size_config['crop'] == 1 ) {
			$hardcrop = esc_html__( '(exact dimensions)', 'oskar' );
		} else {
			$hardcrop = esc_html__( '(proportional)', 'oskar' );
		}
		$sizes[$name] = ucwords(preg_replace('/[-_]/', ' ', $name)) . ' (' . $size_config['width'] . 'x' . $size_config['height'] . ') ' . $hardcrop;
	}

	return $sizes;
}

function oskar_home_tabs_description() {
	$description = '<p>';
	$description .= esc_html__( 'With WooCommerce plugin activated, Oskar theme adds additional sections:', 'oskar' );
	$description .= '</p>';
	$description .= '<ul>';
	$description .= '<li>' . esc_html__( 'Product Categories', 'oskar' ) . '</li>';
	$description .= '<li>' . esc_html__( 'New Products', 'oskar' ) . '</li>';
	$description .= '<li>' . esc_html__( 'Featured Products', 'oskar' ) . '</li>';
	$description .= '<li>' . esc_html__( 'On-sale Products', 'oskar' ) . '</li>';
	$description .= '<li>' . esc_html__( 'Top Sellers', 'oskar' ) . '</li>';
	$description .= '<li>' . esc_html__( 'Top Rated Products', 'oskar' ) . '</li>';
	$description .= '</ul>';
	return $description;
}

function oskar_customize_get_latest_posts() {
	$posts_array = array();

	$posts = wp_get_recent_posts(
		array(
			'numberposts' => '4',
			'orderby' => 'post_date',
			'order' => 'DESC',
			'post_type' => 'post',
			'post_status' => 'publish',
			'suppress_filters' => false
		)
	);

	foreach( $posts as $post ) {

		$post_id = $post['ID'];

		$post_title = $post['post_title'];
		if ( $post_title === '' ) {
			$post_title = '#' . $post_id;
		}

		$post_link = get_permalink( $post_id );

		$post_excerpt = wp_kses_post( wpautop( get_post_field( 'post_excerpt', $post_id ) ) );
		if ( $post_excerpt === '' ) {
			$post_excerpt = wpautop( wp_trim_words( strip_shortcodes( get_post_field( 'post_content', $post_id ) ), 15 ) );
		}

		$posts_array[esc_attr( $post_id )] = array(
			'title' => esc_html( $post_title ),
			'excerpt' => $post_excerpt,
			'link' => esc_url( $post_link )
		);

	}

	wp_reset_postdata();

	return $posts_array;
}

function oskar_customize_get_published_pages() {
	$pages_array = array();

	$pages = get_pages();

	foreach ( $pages as $page ) {

		$page_id = $page->ID;

		$page_title = $page->post_title;
		if ( $page_title === '' ) {
			$page_title = '#' . $page_id;
		}

		$page_link = get_page_link( $page_id );

		$page_excerpt = wp_kses_post( wpautop( get_post_field( 'post_excerpt', $page_id ) ) );
		if ( $page_excerpt === '' ) {
			$page_excerpt = wpautop( wp_trim_words( strip_shortcodes( get_post_field( 'post_content', $page_id ) ), 15 ) );
		}

		$pages_array[esc_attr( $page_id )] = array(
			'title' => esc_html( $page_title ),
			'excerpt' => $page_excerpt,
			'link' => esc_url( $page_link )
		);

	}

	return $pages_array;
}

function oskar_get_private_pages() {
	$pages = array();

	$private_pages = get_pages( array( 'post_status' => 'private' ) );

	if ( ! empty( $private_pages ) ) {
		foreach ( $private_pages as $page ) {
			if ( $page->post_title === '' ) {
				$pages[ $page->ID ] = $page->post_name;
			} else {
				$pages[ $page->ID ] = $page->post_title;
			}
		}
	}

	return $pages;
}

function oskar_get_reusable_blocks() {
	$blocks = array();

	$reusable_blocks = get_posts( array( 'post_type' => 'wp_block', 'orderby' => 'post_title', 'order' => 'ASC' ) );

	if ( ! empty( $reusable_blocks ) ) {
		foreach ( $reusable_blocks as $block ) {
			if ( $block->post_title === '' ) {
				$blocks[ $block->ID ] = $block->post_name;
			} else {
				$blocks[ $block->ID ] = $block->post_title;
			}
		}
	}

	return $blocks;
}

function oskar_choices_reusable_content() {
	$choices = array(
		0 => esc_html__( '&mdash; Select &mdash;', 'oskar' ),
	);

	$pages = oskar_get_private_pages();
	if ( ! empty( $pages ) ) {
		foreach ( $pages as $page => $name ) {
			$pages[ $page ] = esc_html__( 'Private page:', 'oskar' ) . ' ' . esc_html( $name ) ;
		}
	}

	$blocks = oskar_get_reusable_blocks();
	if ( ! empty( $blocks ) ) {
		foreach ( $blocks as $block => $name ) {
			$blocks[ $block ] = esc_html__( 'Reusable block:', 'oskar' ) . ' ' . esc_html( $name ) ;
		}
	}

	$choices = $choices + $pages + $blocks;

	return $choices;
}

function oskar_customize_preview_live_attrs() {
	$attrs_array = array();

	foreach ( oskar_customizer_settings() as $option => $value ) {
		if ( isset($value['preview']) && is_array($value['preview']) ) {

			if ( isset($value['preview']['selector']) && $value['preview']['selector'] !== '' ) {

				$attrs_array[$option] = $value['preview'];

			}

		}
	}

	return $attrs_array;
}
