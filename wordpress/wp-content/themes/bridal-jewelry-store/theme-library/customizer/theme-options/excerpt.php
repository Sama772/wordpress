<?php

/**
 * Excerpt
 *
 * @package bridal_jewelry_store
 */

$wp_customize->add_section(
	'bridal_jewelry_store_excerpt_options',
	array(
		'panel' => 'bridal_jewelry_store_theme_options',
		'title' => esc_html__( 'Excerpt', 'bridal-jewelry-store' ),
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'bridal_jewelry_store_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'absint',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'bridal_jewelry_store_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'bridal-jewelry-store' ),
		'section'     => 'bridal_jewelry_store_excerpt_options',
		'settings'    => 'bridal_jewelry_store_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 10,
			'max'  => 200,
			'step' => 1,
		),
	)
);