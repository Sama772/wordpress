<?php

/**
 * Banner Section
 *
 * @package bridal_jewelry_store
 */

$wp_customize->add_section(
	'bridal_jewelry_store_banner_section',
	array(
		'panel'    => 'bridal_jewelry_store_front_page_options',
		'title'    => esc_html__( 'Banner Section', 'bridal-jewelry-store' ),
		'priority' => 10,
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'bridal_jewelry_store_enable_banner_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Bridal_Jewelry_Store_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bridal_jewelry_store_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'bridal-jewelry-store' ),
			'section'  => 'bridal_jewelry_store_banner_section',
			'settings' => 'bridal_jewelry_store_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'bridal_jewelry_store_enable_banner_section',
		array(
			'selector' => '#bridal_jewelry_store_banner_section .section-link',
			'settings' => 'bridal_jewelry_store_enable_banner_section',
		)
	);
}


// Banner Section - Banner Slider Content Type.
$wp_customize->add_setting(
	'bridal_jewelry_store_banner_slider_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_select',
	)
);

$wp_customize->add_control(
	'bridal_jewelry_store_banner_slider_content_type',
	array(
		'label'           => esc_html__( 'Select Banner Slider Content Type', 'bridal-jewelry-store' ),
		'section'         => 'bridal_jewelry_store_banner_section',
		'settings'        => 'bridal_jewelry_store_banner_slider_content_type',
		'type'            => 'select',
		'active_callback' => 'bridal_jewelry_store_is_banner_slider_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'bridal-jewelry-store' ),
			'post' => esc_html__( 'Post', 'bridal-jewelry-store' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {

	// Banner Section - Select Banner Post.
	$wp_customize->add_setting(
		'bridal_jewelry_store_banner_slider_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'bridal_jewelry_store_banner_slider_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'bridal-jewelry-store' ), $i ),
			'section'         => 'bridal_jewelry_store_banner_section',
			'settings'        => 'bridal_jewelry_store_banner_slider_content_post_' . $i,
			'active_callback' => 'bridal_jewelry_store_is_banner_slider_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => bridal_jewelry_store_get_post_choices(),
		)
	);

	// Banner Section - Select Banner Page.
	$wp_customize->add_setting(
		'bridal_jewelry_store_banner_slider_content_page_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'bridal_jewelry_store_banner_slider_content_page_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Page %d', 'bridal-jewelry-store' ), $i ),
			'section'         => 'bridal_jewelry_store_banner_section',
			'settings'        => 'bridal_jewelry_store_banner_slider_content_page_' . $i,
			'active_callback' => 'bridal_jewelry_store_is_banner_slider_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => bridal_jewelry_store_get_page_choices(),
		)
	);

	// Banner Section - Button Label.
	$wp_customize->add_setting(
		'bridal_jewelry_store_banner_button_label_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'bridal_jewelry_store_banner_button_label_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Button Label %d', 'bridal-jewelry-store' ), $i ),
			'section'         => 'bridal_jewelry_store_banner_section',
			'settings'        => 'bridal_jewelry_store_banner_button_label_' . $i,
			'type'            => 'text',
			'active_callback' => 'bridal_jewelry_store_is_banner_slider_section_enabled',
		)
	);

	// Banner Section - Button Link.
	$wp_customize->add_setting(
		'bridal_jewelry_store_banner_button_link_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'bridal_jewelry_store_banner_button_link_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Button Link %d', 'bridal-jewelry-store' ), $i ),
			'section'         => 'bridal_jewelry_store_banner_section',
			'settings'        => 'bridal_jewelry_store_banner_button_link_' . $i,
			'type'            => 'url',
			'active_callback' => 'bridal_jewelry_store_is_banner_slider_section_enabled',
		)
	);
}