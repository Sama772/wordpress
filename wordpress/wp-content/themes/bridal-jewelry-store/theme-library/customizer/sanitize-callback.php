<?php

function bridal_jewelry_store_sanitize_select( $input, $setting ) {
	$input = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function bridal_jewelry_store_sanitize_switch( $input ) {
	if ( true === $input ) {
		return true;
	} else {
		return false;
	}
}

function bridal_jewelry_store_sanitize_google_fonts( $input, $setting ) {
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Sanitize URL input.
 *
 * @param string $input URL input to sanitize.
 * @return string Sanitized URL.
 */
function bridal_jewelry_store_sanitize_url( $input ) {
    return esc_url_raw( $input );
}

// Sanitize Scroll Top Position
function bridal_jewelry_store_sanitize_scroll_top_position( $input ) {
    $bridal_jewelry_store_valid_positions = array( 'bottom-right', 'bottom-left', 'bottom-center' );
    if ( in_array( $input, $bridal_jewelry_store_valid_positions ) ) {
        return $input;
    } else {
        return 'bottom-right'; // Default to bottom-right if invalid value
    }
}

function bridal_jewelry_store_sanitize_image( $image, $setting ) {
	/*
	* Array of valid image file types.
	*
	* The array includes image mime types that are included in wp_get_mime_types()
	*/
	$mimes = array(
		'jpg|jpeg|jpe' => 'image/jpeg',
		'gif'          => 'image/gif',
		'png'          => 'image/png',
		'bmp'          => 'image/bmp',
		'tif|tiff'     => 'image/tiff',
		'ico'          => 'image/x-icon',
		'svg'          => 'image/svg+xml',
	);
	// Return an array with file extension and mime_type.
	$file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
	return ( $file['ext'] ? $image : $setting->default );
}