<?php

/**
 * Breadcrumb
 *
 * @package bridal_jewelry_store
 */

$wp_customize->add_section(
	'bridal_jewelry_store_breadcrumb',
	array(
		'title' => esc_html__( 'Breadcrumb', 'bridal-jewelry-store' ),
		'panel' => 'bridal_jewelry_store_theme_options',
	)
);

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'bridal_jewelry_store_enable_breadcrumb',
	array(
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Bridal_Jewelry_Store_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bridal_jewelry_store_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'bridal-jewelry-store' ),
			'section' => 'bridal_jewelry_store_breadcrumb',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'bridal_jewelry_store_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'bridal_jewelry_store_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'bridal-jewelry-store' ),
		'active_callback' => 'bridal_jewelry_store_is_breadcrumb_enabled',
		'section'         => 'bridal_jewelry_store_breadcrumb',
	)
);
