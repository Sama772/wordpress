<?php
	
require get_template_directory() . '/theme-library/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 */
function bridal_jewelry_store_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'YITH WooCommerce Quick View', 'bridal-jewelry-store' ),
			'slug'             => 'yith-woocommerce-quick-view',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	bridal_jewelry_store_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'bridal_jewelry_store_register_recommended_plugins' );