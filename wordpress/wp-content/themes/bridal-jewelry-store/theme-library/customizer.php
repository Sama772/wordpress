<?php

/**
 * Bridal Jewelry Store Theme Customizer
 *
 * @package bridal_jewelry_store
 */

// Sanitize callback.
require get_template_directory() . '/theme-library/customizer/sanitize-callback.php';

// Active Callback.
require get_template_directory() . '/theme-library/customizer/active-callback.php';

// Custom Controls.
require get_template_directory() . '/theme-library/customizer/custom-controls/custom-controls.php';

// Icon Controls.
require get_template_directory() . '/theme-library/customizer/custom-controls/icon-control.php';

function bridal_jewelry_store_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'bridal_jewelry_store_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'bridal_jewelry_store_customize_partial_blogdescription',
			)
		);
	}

	// Upsell Section.
	$wp_customize->add_section(
		new Bridal_Jewelry_Store_Upsell_Section(
			$wp_customize,
			'upsell_section',
			array(
				'title'            => __( 'Bridal Jewelry Store Pro', 'bridal-jewelry-store' ),
				'button_text'      => __( 'Buy Pro', 'bridal-jewelry-store' ),
				'url'              => 'https://asterthemes.com/products/jewelry-store-wordpress-theme',
				'background_color' => '#000000',
				'text_color'       => '#fff',
				'priority'         => 0,
			)
		)
	);

	// Theme Options.
	require get_template_directory() . '/theme-library/customizer/theme-options.php';

	// Front Page Options.
	require get_template_directory() . '/theme-library/customizer/front-page-options.php';

	// Colors.
	require get_template_directory() . '/theme-library/customizer/colors.php';

}
add_action( 'customize_register', 'bridal_jewelry_store_customize_register' );

function bridal_jewelry_store_customize_partial_blogname() {
	bloginfo( 'name' );
}

function bridal_jewelry_store_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function bridal_jewelry_store_customize_preview_js() {
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script( 'bridal-jewelry-store-customizer', get_template_directory_uri() . '/resource/js/customizer' . $min . '.js', array( 'customize-preview' ), BRIDAL_JEWELRY_STORE_VERSION, true );
}
add_action( 'customize_preview_init', 'bridal_jewelry_store_customize_preview_js' );

function bridal_jewelry_store_custom_control_scripts() {
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style( 'bridal-jewelry-store-custom-controls-css', get_template_directory_uri() . '/resource/css/custom-controls' . $min . '.css', array(), '1.0', 'all' );

	wp_enqueue_script( 'bridal-jewelry-store-custom-controls-js', get_template_directory_uri() . '/resource/js/custom-controls' . $min . '.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'bridal_jewelry_store_custom_control_scripts' );