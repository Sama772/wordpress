<?php

/**
 * Render homepage sections.
 */
function bridal_jewelry_store_homepage_sections() {
	$homepage_sections = array_keys( bridal_jewelry_store_get_homepage_sections() );

	foreach ( $homepage_sections as $section ) {
		require get_template_directory() . '/sections/' . $section . '.php';
	}
}