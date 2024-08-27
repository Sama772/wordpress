<?php

/**
 * Color Option
 *
 * @package bridal_jewelry_store
 */

// Primary Color.
    // Add setting for primary color
    $wp_customize->add_setting(
        'primary_color',
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    // Add control for primary color
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_color',
            array(
                'label'    => __( 'Primary Color', 'bridal-jewelry-store' ),
                'section'  => 'colors',
                'settings' => 'primary_color',
                'priority' => 5,
            )
        )
    );