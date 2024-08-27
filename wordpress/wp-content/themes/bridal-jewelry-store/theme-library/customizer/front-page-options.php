<?php

/**
 * Front Page Options
 *
 * @package Bridal Jewelry Store
 */

$wp_customize->add_panel(
	'bridal_jewelry_store_front_page_options',
	array(
		'title'    => esc_html__( 'Front Page Options', 'bridal-jewelry-store' ),
		'priority' => 20,
	)
);

// Banner Section.
require get_template_directory() . '/theme-library/customizer/front-page-options/banner.php';

// Tranding Product Section.
require get_template_directory() . '/theme-library/customizer/front-page-options/product.php';