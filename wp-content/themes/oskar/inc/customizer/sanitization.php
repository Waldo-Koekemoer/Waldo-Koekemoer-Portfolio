<?php
/**
 * Oskar Customizer Sanitization Functions
 *
 * @package Oskar
 */
function oskar_sanitize_color( $input ) {
	return sanitize_hex_color( $input );
}

function oskar_sanitize_number( $input ) {
	return filter_var( $input, FILTER_SANITIZE_NUMBER_FLOAT );
}

function oskar_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

function oskar_sanitize_checkbox( $input ) {
	return absint( $input );
}

function oskar_sanitize_select( $input, $setting ) {
	return oskar_sanitize_choices( $input, $setting );
}

function oskar_sanitize_page_select( $input ) {
	return absint( $input );
}

function oskar_sanitize_sortable( $input ) {
	return oskar_sanitize_sortable_options( $input );
}

function oskar_sanitize_image_radio( $input, $setting ) {
	return oskar_sanitize_radio_select( $input, $setting );
}

function oskar_sanitize_icon_select( $input ) {
	return sanitize_text_field( $input );
}

function oskar_sanitize_label( $input ) {
	return sanitize_text_field( $input );
}

function oskar_sanitize_heading_small( $input ) {
	return sanitize_text_field( $input );
}

function oskar_sanitize_heading_large( $input ) {
	return sanitize_text_field( $input );
}

function oskar_sanitize_helper_text( $input ) {
	return sanitize_text_field( $input );
}

function oskar_sanitize_choices( $input, $setting ) {
	global $wp_customize;

	$control = $wp_customize->get_control( $setting->id );

	if ( array_key_exists( $input, $control->choices ) ) {
		return $input;
	} else {
		return $setting->default;
	}
}

function oskar_sanitize_radio_select( $input, $setting ) {
	// Ensuring that the input is a slug.
	$input = sanitize_key( $input );
	// Get the list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	// If the input is a valid key, return it, else, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function oskar_sanitize_sortable_options( $input ){
	$output = array();

	$valid_choices = array(
		'image',
		'date-author',
		'date',
		'author',
		'title',
		'excerpt',
		'content',
		'categories',
		'tags',
		'comments-link',
		'edit-link',
		'services',
		'page-content',
		'extra-page-content',
		'wc-categories',
		'wc-recent',
		'wc-featured',
		'wc-sale',
		'wc-best',
		'wc-rated'
	);

	$choices = explode( ',', $input );

	if ( ! $choices ) {
		return null;
	}

	foreach ( $choices as $choice ) {

		$choice = explode( ':', $choice );

		if ( isset( $choice[0] ) && isset( $choice[1] ) ) {
			if ( in_array( $choice[0], $valid_choices ) ) {
				$status = $choice[1] ? '1' : '0';
				$output[] = trim( $choice[0] . ':' . $status );
			}
		}

	}

	return trim( esc_attr( implode( ',', $output ) ) );
}
