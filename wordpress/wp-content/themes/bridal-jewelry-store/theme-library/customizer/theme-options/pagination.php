<?php

/**
 * Pagination
 *
 * @package bridal_jewelry_store
 */

$wp_customize->add_section(
	'bridal_jewelry_store_pagination',
	array(
		'panel' => 'bridal_jewelry_store_theme_options',
		'title' => esc_html__( 'Pagination', 'bridal-jewelry-store' ),
	)
);

// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'bridal_jewelry_store_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Bridal_Jewelry_Store_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bridal_jewelry_store_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'bridal-jewelry-store' ),
			'section'  => 'bridal_jewelry_store_pagination',
			'settings' => 'bridal_jewelry_store_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'bridal_jewelry_store_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_select',
	)
);

$wp_customize->add_control(
	'bridal_jewelry_store_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'bridal-jewelry-store' ),
		'section'         => 'bridal_jewelry_store_pagination',
		'settings'        => 'bridal_jewelry_store_pagination_type',
		'active_callback' => 'bridal_jewelry_store_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'bridal-jewelry-store' ),
			'numeric' => __( 'Numeric', 'bridal-jewelry-store' ),
		),
	)
);