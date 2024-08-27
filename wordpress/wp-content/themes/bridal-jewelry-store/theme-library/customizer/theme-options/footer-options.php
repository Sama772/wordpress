<?php

/**
 * Footer Options
 *
 * @package bridal_jewelry_store
 */

$wp_customize->add_section(
	'bridal_jewelry_store_footer_options',
	array(
		'panel' => 'bridal_jewelry_store_theme_options',
		'title' => esc_html__( 'Footer Options', 'bridal-jewelry-store' ),
	)
);

// column // 
$wp_customize->add_setting(
	'bridal_jewelry_store_footer_widget_column',
	array(
        'default'			=> '4',
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_select',
		
	)
);	

$wp_customize->add_control(
	'bridal_jewelry_store_footer_widget_column',
	array(
	    'label'   		=> __('Select Widget Column','bridal-jewelry-store'),
	    'section' 		=> 'bridal_jewelry_store_footer_options',
		'type'			=> 'select',
		'choices'        => 
		array(
			'' => __( 'None', 'bridal-jewelry-store' ),
			'1' => __( '1 Column', 'bridal-jewelry-store' ),
			'2' => __( '2 Column', 'bridal-jewelry-store' ),
			'3' => __( '3 Column', 'bridal-jewelry-store' ),
			'4' => __( '4 Column', 'bridal-jewelry-store' )
		) 
	) 
);

$wp_customize->add_setting(
	'bridal_jewelry_store_footer_copyright_text',
	array(
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'bridal_jewelry_store_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'bridal-jewelry-store' ),
		'section'  => 'bridal_jewelry_store_footer_options',
		'settings' => 'bridal_jewelry_store_footer_copyright_text',
		'type'     => 'textarea',
	)
);

//  Image // 
$wp_customize->add_setting('bridal_jewelry_store_footer_background_color_setting', array(
    'default' => '#000',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'bridal_jewelry_store_footer_background_color_setting', array(
    'label' => __('Footer Background Color', 'bridal-jewelry-store'),
    'section' => 'bridal_jewelry_store_footer_options',
)));

// Footer Background Image Setting
$wp_customize->add_setting('bridal_jewelry_store_footer_background_image_setting', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'bridal_jewelry_store_footer_background_image_setting', array(
    'label' => __('Footer Background Image', 'bridal-jewelry-store'),
    'section' => 'bridal_jewelry_store_footer_options',
)));

// Footer Options - Scroll Top.
$wp_customize->add_setting(
	'bridal_jewelry_store_scroll_top',
	array(
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Bridal_Jewelry_Store_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bridal_jewelry_store_scroll_top',
		array(
			'label'   => esc_html__( 'Enable Scroll Top Button', 'bridal-jewelry-store' ),
			'section' => 'bridal_jewelry_store_footer_options',
		)
	)
);

// icon // 
$wp_customize->add_setting(
	'bridal_jewelry_store_scroll_btn_icon',
	array(
        'default' => 'fas fa-chevron-up',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
		
	)
);	

$wp_customize->add_control(new Bridal_Jewelry_Store_Icon_Control($wp_customize, 
	'bridal_jewelry_store_scroll_btn_icon',
	array(
	    'label'   		=> __('Scroll Top Icon','bridal-jewelry-store'),
	    'section' 		=> 'bridal_jewelry_store_footer_options',
		'iconset' => 'fa',
	))  
);
$wp_customize->add_setting( 'bridal_jewelry_store_scroll_top_position', array(
    'default'           => 'bottom-right',
    'sanitize_callback' => 'bridal_jewelry_store_sanitize_scroll_top_position',
) );

// Add control for Scroll Top Button Position
$wp_customize->add_control( 'bridal_jewelry_store_scroll_top_position', array(
    'label'    => __( 'Scroll Top Button Position', 'bridal-jewelry-store' ),
    'section'  => 'bridal_jewelry_store_footer_options',
    'settings' => 'bridal_jewelry_store_scroll_top_position',
    'type'     => 'select',
    'choices'  => array(
        'bottom-right' => __( 'Bottom Right', 'bridal-jewelry-store' ),
        'bottom-left'  => __( 'Bottom Left', 'bridal-jewelry-store' ),
        'bottom-center'=> __( 'Bottom Center', 'bridal-jewelry-store' ),
    ),
) );