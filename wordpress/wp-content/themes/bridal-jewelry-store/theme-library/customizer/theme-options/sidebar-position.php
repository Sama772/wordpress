<?php

/**
 * Sidebar Position
 *
 * @package bridal_jewelry_store
 */

$wp_customize->add_section(
	'bridal_jewelry_store_sidebar_position',
	array(
		'title' => esc_html__( 'Sidebar Position', 'bridal-jewelry-store' ),
		'panel' => 'bridal_jewelry_store_theme_options',
	)
);

// Sidebar Position - Global Sidebar Position.
$wp_customize->add_setting(
	'bridal_jewelry_store_sidebar_position',
	array(
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'bridal_jewelry_store_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'bridal-jewelry-store' ),
		'section' => 'bridal_jewelry_store_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'bridal-jewelry-store' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'bridal-jewelry-store' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'bridal-jewelry-store' ),
		),
	)
);

// Sidebar Position - Post Sidebar Position.
$wp_customize->add_setting(
	'bridal_jewelry_store_post_sidebar_position',
	array(
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'bridal_jewelry_store_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'bridal-jewelry-store' ),
		'section' => 'bridal_jewelry_store_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'bridal-jewelry-store' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'bridal-jewelry-store' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'bridal-jewelry-store' ),
		),
	)
);

// Sidebar Position - Page Sidebar Position.
$wp_customize->add_setting(
	'bridal_jewelry_store_page_sidebar_position',
	array(
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'bridal_jewelry_store_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'bridal-jewelry-store' ),
		'section' => 'bridal_jewelry_store_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'bridal-jewelry-store' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'bridal-jewelry-store' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'bridal-jewelry-store' ),
		),
	)
);
