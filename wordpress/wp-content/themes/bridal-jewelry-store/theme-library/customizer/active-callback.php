<?php

/**
 * Active Callbacks
 *
 * @package bridal_jewelry_store
 */

// Theme Options.
function bridal_jewelry_store_is_pagination_enabled( $control ) {
	return ( $control->manager->get_setting( 'bridal_jewelry_store_enable_pagination' )->value() );
}
function bridal_jewelry_store_is_breadcrumb_enabled( $control ) {
	return ( $control->manager->get_setting( 'bridal_jewelry_store_enable_breadcrumb' )->value() );
}
// Header Options.
function bridal_jewelry_store_is_topbar_enabled( $control ) {
	return ( $control->manager->get_Setting( 'bridal_jewelry_store_enable_topbar' )->value() );
}
// Banner Slider Section.
function bridal_jewelry_store_is_banner_slider_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'bridal_jewelry_store_enable_banner_section' )->value() );
}
function bridal_jewelry_store_is_banner_slider_section_and_content_type_post_enabled( $control ) {
	$bridal_jewelry_store_content_type = $control->manager->get_setting( 'bridal_jewelry_store_banner_slider_content_type' )->value();
	return ( bridal_jewelry_store_is_banner_slider_section_enabled( $control ) && ( 'post' === $bridal_jewelry_store_content_type ) );
}
function bridal_jewelry_store_is_banner_slider_section_and_content_type_page_enabled( $control ) {
	$bridal_jewelry_store_content_type = $control->manager->get_setting( 'bridal_jewelry_store_banner_slider_content_type' )->value();
	return ( bridal_jewelry_store_is_banner_slider_section_enabled( $control ) && ( 'page' === $bridal_jewelry_store_content_type ) );
}
//Product Section.
function bridal_jewelry_store_is_service_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'bridal_jewelry_store_enable_service_section' )->value() );
}
function bridal_jewelry_store_is_service_section_and_content_type_post_enabled( $control ) {
	$bridal_jewelry_store_content_type = $control->manager->get_setting( 'bridal_jewelry_store_service_content_type' )->value();
	return ( bridal_jewelry_store_is_service_section_enabled( $control ) && ( 'post' === $bridal_jewelry_store_content_type ) );
}
function bridal_jewelry_store_is_service_section_and_content_type_page_enabled( $control ) {
	$bridal_jewelry_store_content_type = $control->manager->get_setting( 'bridal_jewelry_store_service_content_type' )->value();
	return ( bridal_jewelry_store_is_service_section_enabled( $control ) && ( 'page' === $bridal_jewelry_store_content_type ) );
}