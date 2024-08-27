<?php

/**
 * Header Options
 *
 * @package bridal_jewelry_store
 */

// General Options
$wp_customize->add_section(
	'bridal_jewelry_store_general_options',
	array(
		'panel' => 'bridal_jewelry_store_theme_options',
		'title' => esc_html__( 'General Options', 'bridal-jewelry-store' ),
	)
);

// General Options - Enable Preloader.
$wp_customize->add_setting(
	'bridal_jewelry_store_enable_preloader',
	array(
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Bridal_Jewelry_Store_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bridal_jewelry_store_enable_preloader',
		array(
			'label'   => esc_html__( 'Enable Preloader', 'bridal-jewelry-store' ),
			'section' => 'bridal_jewelry_store_general_options',
		)
	)
);

// Add setting for sticky header
$wp_customize->add_setting(
	'bridal_jewelry_store_enable_sticky_header',
	array(
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_switch',
		'default'           => false,
	)
);

// Add control for sticky header setting
$wp_customize->add_control(
	new Bridal_Jewelry_Store_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bridal_jewelry_store_enable_sticky_header',
		array(
			'label'   => esc_html__( 'Enable Sticky Header', 'bridal-jewelry-store' ),
			'section' => 'bridal_jewelry_store_general_options',
		)
	)
);

// Site Title - Enable Setting.
$wp_customize->add_setting(
	'bridal_jewelry_store_enable_site_title_setting',
	array(
		'default'           => true,
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Bridal_Jewelry_Store_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bridal_jewelry_store_enable_site_title_setting',
		array(
			'label'    => esc_html__( 'Disable Site Title', 'bridal-jewelry-store' ),
			'section'  => 'title_tagline',
			'settings' => 'bridal_jewelry_store_enable_site_title_setting',
		)
	)
);
$wp_customize->add_setting( 'bridal_jewelry_store_site_title_size', array(
    'default'           => 30, // Default font size in pixels
    'sanitize_callback' => 'absint', // Sanitize the input as a positive integer
) );

// Add control for site title size
$wp_customize->add_control( 'bridal_jewelry_store_site_title_size', array(
    'type'        => 'number',
    'section'     => 'title_tagline', // You can change this section to your preferred section
    'label'       => __( 'Site Title Font Size ', 'bridal-jewelry-store' ),
    'input_attrs' => array(
        'min'  => 10,
        'max'  => 100,
        'step' => 1,
    ),
) );

// Tagline - Enable Setting.
$wp_customize->add_setting(
	'bridal_jewelry_store_enable_tagline_setting',
	array(
		'default'           => false,
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Bridal_Jewelry_Store_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bridal_jewelry_store_enable_tagline_setting',
		array(
			'label'    => esc_html__( 'Enable Tagline', 'bridal-jewelry-store' ),
			'section'  => 'title_tagline',
			'settings' => 'bridal_jewelry_store_enable_tagline_setting',
		)
	)
);

// Header Options
$wp_customize->add_section(
	'bridal_jewelry_store_header_options',
	array(
		'panel' => 'bridal_jewelry_store_theme_options',
		'title' => esc_html__( 'Header Options', 'bridal-jewelry-store' ),
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'bridal_jewelry_store_enable_header_search_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Bridal_Jewelry_Store_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bridal_jewelry_store_enable_header_search_section',
		array(
			'label'    => esc_html__( 'Enable Search Section', 'bridal-jewelry-store' ),
			'section'  => 'bridal_jewelry_store_header_options',
			'settings' => 'bridal_jewelry_store_enable_header_search_section',
		)
	)
);