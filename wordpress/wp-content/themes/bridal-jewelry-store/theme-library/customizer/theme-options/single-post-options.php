<?php

/**
 * Single Post Options
 *
 * @package bridal_jewelry_store
 */

$wp_customize->add_section(
	'bridal_jewelry_store_single_post_options',
	array(
		'title' => esc_html__( 'Single Post Options', 'bridal-jewelry-store' ),
		'panel' => 'bridal_jewelry_store_theme_options',
	)
);


// Post Options - Hide Date.
$wp_customize->add_setting(
	'bridal_jewelry_store_single_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Bridal_Jewelry_Store_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bridal_jewelry_store_single_post_hide_date',
		array(
			'label'   => esc_html__( 'Hide Date', 'bridal-jewelry-store' ),
			'section' => 'bridal_jewelry_store_single_post_options',
		)
	)
);

// Post Options - Hide Author.
$wp_customize->add_setting(
	'bridal_jewelry_store_single_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Bridal_Jewelry_Store_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bridal_jewelry_store_single_post_hide_author',
		array(
			'label'   => esc_html__( 'Hide Author', 'bridal-jewelry-store' ),
			'section' => 'bridal_jewelry_store_single_post_options',
		)
	)
);

// Post Options - Hide Category.
$wp_customize->add_setting(
	'bridal_jewelry_store_single_post_hide_category',
	array(
		'default'           => false,
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Bridal_Jewelry_Store_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bridal_jewelry_store_single_post_hide_category',
		array(
			'label'   => esc_html__( 'Hide Category', 'bridal-jewelry-store' ),
			'section' => 'bridal_jewelry_store_single_post_options',
		)
	)
);

// Post Options - Hide Tag.
$wp_customize->add_setting(
	'bridal_jewelry_store_post_hide_tags',
	array(
		'default'           => false,
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Bridal_Jewelry_Store_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bridal_jewelry_store_post_hide_tags',
		array(
			'label'   => esc_html__( 'Hide Tag', 'bridal-jewelry-store' ),
			'section' => 'bridal_jewelry_store_single_post_options',
		)
	)
);
