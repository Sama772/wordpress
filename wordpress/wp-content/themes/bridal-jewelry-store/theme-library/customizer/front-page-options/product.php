<?php

/**
 * Product Section
 *
 * @package bridal_jewelry_store
 */

$wp_customize->add_section(
	'bridal_jewelry_store_services_section',
	array(
		'panel'    => 'bridal_jewelry_store_front_page_options',
		'title'    => esc_html__( 'Product Section', 'bridal-jewelry-store' ),
		'priority' => 10,
	)
);

// Product Section - Enable Section.
$wp_customize->add_setting(
	'bridal_jewelry_store_enable_service_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Bridal_Jewelry_Store_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bridal_jewelry_store_enable_service_section',
		array(
			'label'    => esc_html__( 'Enable Product Section', 'bridal-jewelry-store' ),
			'section'  => 'bridal_jewelry_store_services_section',
			'settings' => 'bridal_jewelry_store_enable_service_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'bridal_jewelry_store_enable_service_section',
		array(
			'selector' => '#bridal_jewelry_store_service_section .section-link',
			'settings' => 'bridal_jewelry_store_enable_service_section',
		)
	);
}

// Offer Section - Offer Heading.
$wp_customize->add_setting(
	'bridal_jewelry_store_about_left_image_2',
	array(
		'sanitize_callback' => 'bridal_jewelry_store_sanitize_image',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'bridal_jewelry_store_about_left_image_2',
		array(
			'label'           => esc_html__( 'Product Left Banner Image', 'bridal-jewelry-store'),
			'section'         => 'bridal_jewelry_store_services_section',
			'settings'        => 'bridal_jewelry_store_about_left_image_2',
			'active_callback' => 'bridal_jewelry_store_is_service_section_enabled',
		)
	)
);

// Offer Section - Heading Label.
$wp_customize->add_setting(
	'bridal_jewelry_store_about_2_heading',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'bridal_jewelry_store_about_2_heading',
	array(
		'label'           => esc_html__( 'Product Left Banner Heading', 'bridal-jewelry-store' ),
		'section'         => 'bridal_jewelry_store_services_section',
		'settings'        => 'bridal_jewelry_store_about_2_heading',
		'type'            => 'text',
		'active_callback' => 'bridal_jewelry_store_is_service_section_enabled',
	)
);

// Offer Section - Button Link.
$wp_customize->add_setting(
	'bridal_jewelry_store_about_2_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'bridal_jewelry_store_about_2_button_link',
	array(
		'label'           => esc_html__( 'Product Left Banner Button Link', 'bridal-jewelry-store'),
		'section'         => 'bridal_jewelry_store_services_section',
		'settings'        => 'bridal_jewelry_store_about_2_button_link',
		'type'            => 'url',
		'active_callback' => 'bridal_jewelry_store_is_service_section_enabled',
	)
);

// Product Section - Button Label.
$wp_customize->add_setting(
	'bridal_jewelry_store_trending_product_heading',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'bridal_jewelry_store_trending_product_heading',
	array(
		'label'           => esc_html__( 'Product Heading', 'bridal-jewelry-store' ),
		'section'         => 'bridal_jewelry_store_services_section',
		'settings'        => 'bridal_jewelry_store_trending_product_heading',
		'type'            => 'text',
		'active_callback' => 'bridal_jewelry_store_is_service_section_enabled',
	)
);

if(class_exists('woocommerce')){

$bridal_jewelry_store_args = array(
	'type'                     => 'product',
	'child_of'                 => 0,
	'parent'                   => '',
	'orderby'                  => 'term_group',
	'order'                    => 'ASC',
	'hide_empty'               => false,
	'hierarchical'             => 1,
	'number'                   => '',
	'taxonomy'                 => 'product_cat',
	'pad_counts'               => false
);
$bridal_jewelry_store_categories = get_categories($bridal_jewelry_store_args);
$cat_posts = array();
$m = 0;
$cat_posts[]='Select';
foreach($bridal_jewelry_store_categories as $category){
	if($m==0){
		$default = $category->slug;
		$m++;
	}
	$cat_posts[$category->slug] = $category->name;
}

$wp_customize->add_setting('bridal_jewelry_store_trending_product_category',array(
	'default'	=> 'select',
	'sanitize_callback' => 'bridal_jewelry_store_sanitize_select',
));
$wp_customize->add_control('bridal_jewelry_store_trending_product_category',array(
	'type'    => 'select',
	'choices' => $cat_posts,
	'label' => __('Select category to display products ','bridal-jewelry-store'),
	'section' => 'bridal_jewelry_store_services_section',
	'active_callback' => 'bridal_jewelry_store_is_service_section_enabled',
));
}
