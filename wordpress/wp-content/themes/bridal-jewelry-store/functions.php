<?php
/**
 * Bridal Jewelry Store functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bridal_jewelry_store
 */

$bridal_jewelry_store_theme_data = wp_get_theme();
if( ! defined( 'BRIDAL_JEWELRY_STORE_THEME_VERSION' ) ) define ( 'BRIDAL_JEWELRY_STORE_THEME_VERSION', $bridal_jewelry_store_theme_data->get( 'Version' ) );
if( ! defined( 'BRIDAL_JEWELRY_STORE_THEME_NAME' ) ) define( 'BRIDAL_JEWELRY_STORE_THEME_NAME', $bridal_jewelry_store_theme_data->get( 'Name' ) );
if( ! defined( 'BRIDAL_JEWELRY_STORE_THEME_TEXTDOMAIN' ) ) define( 'BRIDAL_JEWELRY_STORE_THEME_TEXTDOMAIN', $bridal_jewelry_store_theme_data->get( 'TextDomain' ) );

if ( ! defined( 'BRIDAL_JEWELRY_STORE_VERSION' ) ) {
	define( 'BRIDAL_JEWELRY_STORE_VERSION', '1.0.0' );
}

if ( ! function_exists( 'bridal_jewelry_store_setup' ) ) :
	
	function bridal_jewelry_store_setup() {
		
		load_theme_textdomain( 'bridal-jewelry-store', get_template_directory() . '/languages' );

		add_theme_support( 'woocommerce' );

		add_theme_support( 'automatic-feed-links' );
		
		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'bridal-jewelry-store' ),
				'social'  => esc_html__( 'Social', 'bridal-jewelry-store' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'woocommerce',
			)
		);

		add_theme_support(
			'custom-background',
			apply_filters(
				'bridal_jewelry_store_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_theme_support( 'align-wide' );

		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'bridal_jewelry_store_setup' );

function bridal_jewelry_store_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bridal_jewelry_store_content_width', 640 );
}
add_action( 'after_setup_theme', 'bridal_jewelry_store_content_width', 0 );

function bridal_jewelry_store_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'bridal-jewelry-store' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'bridal-jewelry-store' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2>',
		)
	);

	// Regsiter 4 footer widgets.
	// Regsiter 4 footer widgets.
	$bridal_jewelry_store_footer_widget_column = get_theme_mod('bridal_jewelry_store_footer_widget_column','4');
	for ($i=1; $i<=$bridal_jewelry_store_footer_widget_column; $i++) {
		register_sidebar( array(
			'name' => __( 'Footer  ', 'bridal-jewelry-store' )  . $i,
			'id' => 'bridal-jewelry-store-footer-widget-' . $i,
			'description' => __( 'The Footer Widget Area', 'bridal-jewelry-store' )  . $i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<div class="widget-header"><h4 class="widget-title">',
			'after_title' => '</h4></div>',
		) );
	}
}
add_action( 'widgets_init', 'bridal_jewelry_store_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bridal_jewelry_store_scripts() {
	// Append .min if SCRIPT_DEBUG is false.
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	// Slick style.
	wp_enqueue_style( 'slick-style', get_template_directory_uri() . '/resource/css/slick' . $min . '.css', array(), '1.8.1' );

	// Fontawesome style.
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() . '/resource/css/fontawesome' . $min . '.css', array(), '5.15.4' );

	// Owl Carousel style.
	wp_enqueue_style( 'owl-carousel-style', get_template_directory_uri() . '/resource/css/owl.carousel.css', array(), '2.2.1' );

	// Main style.
	wp_enqueue_style( 'bridal-jewelry-store-style', get_template_directory_uri() . '/style.css', array(), BRIDAL_JEWELRY_STORE_VERSION );

	// Navigation script.
	wp_enqueue_script( 'bridal-jewelry-store-navigation-script', get_template_directory_uri() . '/resource/js/navigation' . $min . '.js', array(), BRIDAL_JEWELRY_STORE_VERSION, true );

	// Slick script.
	wp_enqueue_script( 'slick-script', get_template_directory_uri() . '/resource/js/slick' . $min . '.js', array( 'jquery' ), '1.8.1', true );

	// Owl Carousel script.
	wp_enqueue_script( 'owl-carousel-script', get_template_directory_uri() . '/resource/js/owl.carousel.js', array( 'jquery' ), '2.1.6', true );

	// Custom script.
	wp_enqueue_script( 'bridal-jewelry-store-custom-script', get_template_directory_uri() . '/resource/js/custom.js', array( 'jquery' ), BRIDAL_JEWELRY_STORE_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Include the file.
	require_once get_theme_file_path( 'theme-library/function-files/wptt-webfont-loader.php' );

	// Load the webfont.  font-family: "Cinzel", serif; font-family: "Italiana", sans-serif; font-family: "Tenor Sans", sans-serif;
	wp_enqueue_style(
		'cinzel',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap' ),
		array(),
		'1.0'
	);

	wp_enqueue_style(
		'italiana',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Italiana&display=swap' ),
		array(),
		'1.0'
	);

	wp_enqueue_style(
		'tenor-sans',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Tenor+Sans&display=swap' ),
		array(),
		'1.0'
	);

}
add_action( 'wp_enqueue_scripts', 'bridal_jewelry_store_scripts' );

/**
 * Include wptt webfont loader.
 */
require_once get_theme_file_path( 'theme-library/function-files/wptt-webfont-loader.php' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/theme-library/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/theme-library/function-files/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/theme-library/function-files/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/theme-library/customizer.php';

/**
 * TGM.
 */

require get_template_directory() .'/theme-library/tgm.php';

/**
 * Breadcrumb
 */
require get_template_directory() . '/theme-library/function-files/class-breadcrumb-trail.php';

/**
 * Getting Started
*/
require get_template_directory() . '/theme-library/getting-started/getting-started.php';

// Output inline CSS based on Customizer setting
function bridal_jewelry_store_customizer_css() {
    $bridal_jewelry_store_enable_breadcrumb = get_theme_mod('bridal_jewelry_store_enable_breadcrumb', true);
    ?>
    <style type="text/css">
        <?php if (!$bridal_jewelry_store_enable_breadcrumb) : ?>
            nav.woocommerce-breadcrumb {
                display: none;
            }
        <?php endif; ?>
    </style>
    <?php
}
add_action('wp_head', 'bridal_jewelry_store_customizer_css');

function bridal_jewelry_store_customize_css() {
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_html( get_theme_mod( 'primary_color', '#000000' ) ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'bridal_jewelry_store_customize_css' );

// Retrieve the slider visibility setting
$bridal_jewelry_store_slider = get_theme_mod('bridal_jewelry_store_enable_banner_section', false);

// Function to output custom CSS directly in the head section
function bridal_jewelry_store_custom_css() {
    global $bridal_jewelry_store_slider;
    if ($bridal_jewelry_store_slider == false) {
        echo '<style type="text/css">
            .home header.site-header {
                position: static;
                background: #000000;
            }
        </style>';
    }
}

// Hook the function into the wp_head action
add_action('wp_head', 'bridal_jewelry_store_custom_css');