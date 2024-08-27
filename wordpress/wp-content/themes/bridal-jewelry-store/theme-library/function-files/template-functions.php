<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package bridal_jewelry_store
 */

function bridal_jewelry_store_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	$classes[] = bridal_jewelry_store_sidebar_layout();

	return $classes;
}
add_filter( 'body_class', 'bridal_jewelry_store_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function bridal_jewelry_store_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'bridal_jewelry_store_pingback_header' );


/**
 * Get all posts for customizer Post content type.
 */
function bridal_jewelry_store_get_post_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'bridal-jewelry-store' ) );
	$args    = array( 'numberposts' => -1 );
	$bridal_jewelry_store_posts   = get_posts( $args );

	foreach ( $bridal_jewelry_store_posts as $bridal_jewelry_store_post ) {
		$id             = $bridal_jewelry_store_post->ID;
		$bridal_jewelry_store_title          = $bridal_jewelry_store_post->post_title;
		$choices[ $id ] = $bridal_jewelry_store_title;
	}

	return $choices;
}

/**
 * Get all pages for customizer Page content type.
 */
function bridal_jewelry_store_get_page_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'bridal-jewelry-store' ) );
	$pages   = get_pages();

	foreach ( $pages as $page ) {
		$choices[ $page->ID ] = $page->post_title;
	}

	return $choices;
}

/**
 * Get all categories for customizer Category content type.
 */
function bridal_jewelry_store_get_post_cat_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'bridal-jewelry-store' ) );
	$cats    = get_categories();

	foreach ( $cats as $cat ) {
		$choices[ $cat->term_id ] = $cat->name;
	}

	return $choices;
}

/**
 * Get all donation forms for customizer form content type.
 */
function bridal_jewelry_store_get_post_donation_form_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'bridal-jewelry-store' ) );
	$bridal_jewelry_store_posts   = get_posts(
		array(
			'post_type'   => 'give_forms',
			'numberposts' => -1,
		)
	);
	foreach ( $bridal_jewelry_store_posts as $bridal_jewelry_store_post ) {
		$choices[ $bridal_jewelry_store_post->ID ] = $bridal_jewelry_store_post->post_title;
	}
	return $choices;
}

if ( ! function_exists( 'bridal_jewelry_store_excerpt_length' ) ) :
	/**
	 * Excerpt length.
	 */
	function bridal_jewelry_store_excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}

		return get_theme_mod( 'bridal_jewelry_store_excerpt_length', 20 );
	}
endif;
add_filter( 'excerpt_length', 'bridal_jewelry_store_excerpt_length', 999 );

if ( ! function_exists( 'bridal_jewelry_store_excerpt_more' ) ) :
	/**
	 * Excerpt more.
	 */
	function bridal_jewelry_store_excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		}

		return '&hellip;';
	}
endif;
add_filter( 'excerpt_more', 'bridal_jewelry_store_excerpt_more' );

if ( ! function_exists( 'bridal_jewelry_store_sidebar_layout' ) ) {
	/**
	 * Get sidebar layout.
	 */
	function bridal_jewelry_store_sidebar_layout() {
		$bridal_jewelry_store_sidebar_position      = get_theme_mod( 'bridal_jewelry_store_sidebar_position', 'right-sidebar' );
		$bridal_jewelry_store_sidebar_position_post = get_theme_mod( 'bridal_jewelry_store_post_sidebar_position', 'right-sidebar' );
		$bridal_jewelry_store_sidebar_position_page = get_theme_mod( 'bridal_jewelry_store_page_sidebar_position', 'right-sidebar' );

		if ( is_single() ) {
			$bridal_jewelry_store_sidebar_position = $bridal_jewelry_store_sidebar_position_post;
		} elseif ( is_page() ) {
			$bridal_jewelry_store_sidebar_position = $bridal_jewelry_store_sidebar_position_page;
		}

		return $bridal_jewelry_store_sidebar_position;
	}
}

if ( ! function_exists( 'bridal_jewelry_store_is_sidebar_enabled' ) ) {
	/**
	 * Check if sidebar is enabled.
	 */
	function bridal_jewelry_store_is_sidebar_enabled() {
		$bridal_jewelry_store_sidebar_position      = get_theme_mod( 'bridal_jewelry_store_sidebar_position', 'right-sidebar' );
		$bridal_jewelry_store_sidebar_position_post = get_theme_mod( 'bridal_jewelry_store_post_sidebar_position', 'right-sidebar' );
		$bridal_jewelry_store_sidebar_position_page = get_theme_mod( 'bridal_jewelry_store_page_sidebar_position', 'right-sidebar' );

		$bridal_jewelry_store_sidebar_enabled = true;
		if ( is_home() || is_archive() || is_search() ) {
			if ( 'no-sidebar' === $bridal_jewelry_store_sidebar_position ) {
				$bridal_jewelry_store_sidebar_enabled = false;
			}
		} elseif ( is_single() ) {
			if ( 'no-sidebar' === $bridal_jewelry_store_sidebar_position || 'no-sidebar' === $bridal_jewelry_store_sidebar_position_post ) {
				$bridal_jewelry_store_sidebar_enabled = false;
			}
		} elseif ( is_page() ) {
			if ( 'no-sidebar' === $bridal_jewelry_store_sidebar_position || 'no-sidebar' === $bridal_jewelry_store_sidebar_position_page ) {
				$bridal_jewelry_store_sidebar_enabled = false;
			}
		}
		return $bridal_jewelry_store_sidebar_enabled;
	}
}

if ( ! function_exists( 'bridal_jewelry_store_get_homepage_sections ' ) ) {
	/**
	 * Returns homepage sections.
	 */
	function bridal_jewelry_store_get_homepage_sections() {
		$bridal_jewelry_store_sections = array(
			'banner'  => esc_html__( 'Banner Section', 'bridal-jewelry-store' ),
			'product' => esc_html__( 'Product Section', 'bridal-jewelry-store' ),
		);
		return $bridal_jewelry_store_sections;
	}
}

/**
 * Renders customizer section link
 */
function bridal_jewelry_store_section_link( $bridal_jewelry_store_section_id ) {
	$bridal_jewelry_store_section_name      = str_replace( 'bridal_jewelry_store_', ' ', $bridal_jewelry_store_section_id );
	$bridal_jewelry_store_section_name      = str_replace( '_', ' ', $bridal_jewelry_store_section_name );
	$bridal_jewelry_store_starting_notation = '#';
	?>
	<span class="section-link">
		<span class="section-link-title"><?php echo esc_html( $bridal_jewelry_store_section_name ); ?></span>
	</span>
	<style type="text/css">
		<?php echo $bridal_jewelry_store_starting_notation . $bridal_jewelry_store_section_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>:hover .section-link {
			visibility: visible;
		}
	</style>
	<?php
}

/**
 * Adds customizer section link css
 */
function bridal_jewelry_store_section_link_css() {
	if ( is_customize_preview() ) {
		?>
		<style type="text/css">
			.section-link {
				visibility: hidden;
				background-color: black;
				position: relative;
				top: 80px;
				z-index: 99;
				left: 40px;
				color: #fff;
				text-align: center;
				font-size: 20px;
				border-radius: 10px;
				padding: 20px 10px;
				text-transform: capitalize;
			}

			.section-link-title {
				padding: 0 10px;
			}

			.banner-section {
				position: relative;
			}

			.banner-section .section-link {
				position: absolute;
				top: 100px;
			}
		</style>
		<?php
	}
}
add_action( 'wp_head', 'bridal_jewelry_store_section_link_css' );

/**
 * Breadcrumb.
 */
function bridal_jewelry_store_breadcrumb( $args = array() ) {
	if ( ! get_theme_mod( 'bridal_jewelry_store_enable_breadcrumb', true ) ) {
		return;
	}

	$args = array(
		'show_on_front' => false,
		'show_title'    => true,
		'show_browse'   => false,
	);
	breadcrumb_trail( $args );
}
add_action( 'bridal_jewelry_store_breadcrumb', 'bridal_jewelry_store_breadcrumb', 10 );

/**
 * Add separator for breadcrumb trail.
 */
function bridal_jewelry_store_breadcrumb_trail_print_styles() {
	$bridal_jewelry_store_breadcrumb_separator = get_theme_mod( 'bridal_jewelry_store_breadcrumb_separator', '/' );

	$style = '
		.trail-items li::after {
			content: "' . $bridal_jewelry_store_breadcrumb_separator . '";
		}'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	$style = apply_filters( 'bridal_jewelry_store_breadcrumb_trail_inline_style', trim( str_replace( array( "\r", "\n", "\t", '  ' ), '', $style ) ) );

	if ( $style ) {
		echo "\n" . '<style type="text/css" id="breadcrumb-trail-css">' . $style . '</style>' . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
add_action( 'wp_head', 'bridal_jewelry_store_breadcrumb_trail_print_styles' );

/**
 * Pagination for archive.
 */
function bridal_jewelry_store_render_posts_pagination() {
	$bridal_jewelry_store_is_pagination_enabled = get_theme_mod( 'bridal_jewelry_store_enable_pagination', true );
	if ( $bridal_jewelry_store_is_pagination_enabled ) {
		$bridal_jewelry_store_pagination_type = get_theme_mod( 'bridal_jewelry_store_pagination_type', 'default' );
		if ( 'default' === $bridal_jewelry_store_pagination_type ) :
			the_posts_navigation();
		else :
			the_posts_pagination();
		endif;
	}
}
add_action( 'bridal_jewelry_store_posts_pagination', 'bridal_jewelry_store_render_posts_pagination', 10 );

/**
 * Pagination for single post.
 */
function bridal_jewelry_store_render_post_navigation() {
	the_post_navigation(
		array(
			'prev_text' => '<span>&#10229;</span> <span class="nav-title">%title</span>',
			'next_text' => '<span class="nav-title">%title</span> <span>&#10230;</span>',
		)
	);
}
add_action( 'bridal_jewelry_store_post_navigation', 'bridal_jewelry_store_render_post_navigation' );

/**
 * Adds footer copyright text.
 */
function bridal_jewelry_store_output_footer_copyright_content() {
    $bridal_jewelry_store_theme_data = wp_get_theme();
    $bridal_jewelry_store_copyright_text = get_theme_mod('bridal_jewelry_store_footer_copyright_text');

    if (!empty($bridal_jewelry_store_copyright_text)) {
        $bridal_jewelry_store_text = esc_html($bridal_jewelry_store_copyright_text);
    } else {
        $bridal_jewelry_store_default_text = esc_html($bridal_jewelry_store_theme_data->get('Name')) . '&nbsp;' . esc_html__('by', 'bridal-jewelry-store') . '&nbsp;<a target="_blank" href="' . esc_url($bridal_jewelry_store_theme_data->get('AuthorURI')) . '">' . esc_html(ucwords($bridal_jewelry_store_theme_data->get('Author'))) . '</a>';
        $bridal_jewelry_store_default_text .= sprintf(esc_html__(' | Powered by %s', 'bridal-jewelry-store'), '<a href="' . esc_url(__('https://wordpress.org/', 'bridal-jewelry-store')) . '" target="_blank">WordPress</a>. ');

        $bridal_jewelry_store_text = $bridal_jewelry_store_default_text;
    }
    ?>
    <span><?php echo wp_kses_post($bridal_jewelry_store_text); ?></span>
    <?php
}
add_action('bridal_jewelry_store_footer_copyright', 'bridal_jewelry_store_output_footer_copyright_content');


if ( ! function_exists( 'bridal_jewelry_store_footer_widget' ) ) :
function bridal_jewelry_store_footer_widget() {
	$bridal_jewelry_store_footer_widget_column	= get_theme_mod('bridal_jewelry_store_footer_widget_column','4'); 
		if ($bridal_jewelry_store_footer_widget_column == '4') {
			$bridal_jewelry_store_column = '3';
		} elseif ($bridal_jewelry_store_footer_widget_column == '3') {
			$bridal_jewelry_store_column = '4';
		} elseif ($bridal_jewelry_store_footer_widget_column == '2') {
			$bridal_jewelry_store_column = '6';
		} else{
			$bridal_jewelry_store_column = '12';
		}
	if($bridal_jewelry_store_footer_widget_column !==''): 
	?>
	<div class="dt_footer-widgets">
		
    <div class="footer-widgets-column">
    	<?php
		$bridal_jewelry_store_footer_widget_column = get_theme_mod('bridal_jewelry_store_footer_widget_column','4');
	for ($i=1; $i<=$bridal_jewelry_store_footer_widget_column; $i++) { ?>
        <?php if ( is_active_sidebar( 'bridal-jewelry-store-footer-widget-' .$i ) ) : ?>
            <div class="footer-one-column" >
                <?php dynamic_sidebar( 'bridal-jewelry-store-footer-widget-'.$i); ?>
            </div>
        <?php endif; ?>
        <?php  } ?>
    </div>

</div>
	<?php 
	endif; } 
endif;
add_action( 'bridal_jewelry_store_footer_widget', 'bridal_jewelry_store_footer_widget' );