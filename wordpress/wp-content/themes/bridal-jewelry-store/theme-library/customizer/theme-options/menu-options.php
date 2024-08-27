<?php

/**
 * Menu Options
 *
 * @package bridal_jewelry_store
 */

// Menu Options
$wp_customize->add_section(
	'bridal_jewelry_store_Menu_options',
	array(
		'panel' => 'bridal_jewelry_store_theme_options',
		'title' => esc_html__( 'Menu Options', 'bridal-jewelry-store' ),
	)
);

$wp_customize->add_setting( 'menu_text_transform', array(
    'default'           => 'capitalize', // Default value for text transform
    'sanitize_callback' => 'sanitize_text_field',
) );

// Add control for menu text transform
$wp_customize->add_control( 'menu_text_transform', array(
    'type'     => 'select',
    'section'  => 'bridal_jewelry_store_Menu_options', // Adjust the section as needed
    'label'    => __( 'Menu Text Transform', 'bridal-jewelry-store' ),
    'choices'  => array(
        'none'       => __( 'None', 'bridal-jewelry-store' ),
        'capitalize' => __( 'Capitalize', 'bridal-jewelry-store' ),
        'uppercase'  => __( 'Uppercase', 'bridal-jewelry-store' ),
        'lowercase'  => __( 'Lowercase', 'bridal-jewelry-store' ),
    ),
) );
