<?php

/**
 * Post Options
 *
 * @package bridal_jewelry_store
 */

$wp_customize->add_section(
	'bridal_jewelry_store_post_options',
	array(
		'title' => esc_html__( 'Post Options', 'bridal-jewelry-store' ),
		'panel' => 'bridal_jewelry_store_theme_options',
	)
);

// Post Options - Hide Feature Image.
$wp_customize->add_setting(
	'bridal_jewelry_store_post_hide_feature_image',
	array(
		'default'           => false,
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Bridal_Jewelry_Store_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bridal_jewelry_store_post_hide_feature_image',
		array(
			'label'   => esc_html__( 'Hide Featured Image', 'bridal-jewelry-store' ),
			'section' => 'bridal_jewelry_store_post_options',
		)
	)
);

// Post Options - Hide Post Heading.
$wp_customize->add_setting(
	'bridal_jewelry_store_post_hide_post_heading',
	array(
		'default'           => false,
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Bridal_Jewelry_Store_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bridal_jewelry_store_post_hide_post_heading',
		array(
			'label'   => esc_html__( 'Hide Post Heading', 'bridal-jewelry-store' ),
			'section' => 'bridal_jewelry_store_post_options',
		)
	)
);

// Post Options - Hide Post Content.
$wp_customize->add_setting(
	'bridal_jewelry_store_post_hide_post_content',
	array(
		'default'           => false,
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Bridal_Jewelry_Store_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bridal_jewelry_store_post_hide_post_content',
		array(
			'label'   => esc_html__( 'Hide Post Content', 'bridal-jewelry-store' ),
			'section' => 'bridal_jewelry_store_post_options',
		)
	)
);

// Post Options - Hide Date.
$wp_customize->add_setting(
	'bridal_jewelry_store_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Bridal_Jewelry_Store_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bridal_jewelry_store_post_hide_date',
		array(
			'label'   => esc_html__( 'Hide Date', 'bridal-jewelry-store' ),
			'section' => 'bridal_jewelry_store_post_options',
		)
	)
);

// Post Options - Hide Author.
$wp_customize->add_setting(
	'bridal_jewelry_store_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Bridal_Jewelry_Store_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bridal_jewelry_store_post_hide_author',
		array(
			'label'   => esc_html__( 'Hide Author', 'bridal-jewelry-store' ),
			'section' => 'bridal_jewelry_store_post_options',
		)
	)
);

// Post Options - Hide Category.
$wp_customize->add_setting(
	'bridal_jewelry_store_post_hide_category',
	array(
		'default'           => false,
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Bridal_Jewelry_Store_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bridal_jewelry_store_post_hide_category',
		array(
			'label'   => esc_html__( 'Hide Category', 'bridal-jewelry-store' ),
			'section' => 'bridal_jewelry_store_post_options',
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
			'section' => 'bridal_jewelry_store_post_options',
		)
	)
);

// Post Options - Related Post Label.
$wp_customize->add_setting(
	'bridal_jewelry_store_post_related_post_label',
	array(
		'default'           => __( 'Related Posts', 'bridal-jewelry-store' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'bridal_jewelry_store_post_related_post_label',
	array(
		'label'    => esc_html__( 'Related Posts Label', 'bridal-jewelry-store' ),
		'section'  => 'bridal_jewelry_store_post_options',
		'settings' => 'bridal_jewelry_store_post_related_post_label',
		'type'     => 'text',
	)
);

// Post Options - Hide Related Posts.
$wp_customize->add_setting(
	'bridal_jewelry_store_post_hide_related_posts',
	array(
		'default'           => false,
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Bridal_Jewelry_Store_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bridal_jewelry_store_post_hide_related_posts',
		array(
			'label'   => esc_html__( 'Hide Related Posts', 'bridal-jewelry-store' ),
			'section' => 'bridal_jewelry_store_post_options',
		)
	)
);
