<?php
/**
 * Getting Started Page.
 *
 * @package bridal_jewelry_store
 */


if( ! function_exists( 'bridal_jewelry_store_getting_started_menu' ) ) :
/**
 * Adding Getting Started Page in admin menu
 */
function bridal_jewelry_store_getting_started_menu(){	
	add_theme_page(
		__( 'Getting Started', 'bridal-jewelry-store' ),
		__( 'Getting Started', 'bridal-jewelry-store' ),
		'manage_options',
		'bridal-jewelry-store-getting-started',
		'bridal_jewelry_store_getting_started_page'
	);
}
endif;
add_action( 'admin_menu', 'bridal_jewelry_store_getting_started_menu' );

if( ! function_exists( 'bridal_jewelry_store_getting_started_admin_scripts' ) ) :
/**
 * Load Getting Started styles in the admin
 */
function bridal_jewelry_store_getting_started_admin_scripts( $hook ){
	// Load styles only on our page
	if( 'appearance_page_bridal-jewelry-store-getting-started' != $hook ) return;

    wp_enqueue_style( 'bridal-jewelry-store-getting-started', get_template_directory_uri() . '/resource/css/getting-started.css', false, BRIDAL_JEWELRY_STORE_THEME_VERSION );

    wp_enqueue_script( 'bridal-jewelry-store-getting-started', get_template_directory_uri() . '/resource/js/getting-started.js', array( 'jquery' ), BRIDAL_JEWELRY_STORE_THEME_VERSION, true );
}
endif;
add_action( 'admin_enqueue_scripts', 'bridal_jewelry_store_getting_started_admin_scripts' );

if( ! function_exists( 'bridal_jewelry_store_getting_started_page' ) ) :
/**
 * Callback function for admin page.
*/
function bridal_jewelry_store_getting_started_page(){ 
	$bridal_jewelry_store_theme = wp_get_theme();?>
	<div class="wrap getting-started">
		<div class="intro-wrap">
			<div class="intro cointaner">
				<div class="intro-content">
					<h3><?php echo esc_html( 'Welcome to', 'bridal-jewelry-store' );?> <span class="theme-name"><?php echo esc_html( BRIDAL_JEWELRY_STORE_THEME_NAME ); ?></span></h3>
					<p class="about-text">
						<?php
						// Remove last sentence of description.
						$bridal_jewelry_store_description = explode( '. ', $bridal_jewelry_store_theme->get( 'Description' ) );

						array_pop( $bridal_jewelry_store_description );

						$bridal_jewelry_store_description = implode( '. ', $bridal_jewelry_store_description );

						echo esc_html( $bridal_jewelry_store_description . '.' );
					?></p>
					<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"target="_blank" class="button button-primary"><?php esc_html_e( 'Customize', 'bridal-jewelry-store' ); ?></a>
			        <a class="button button-primary" href="<?php echo esc_url( 'https://wordpress.org/support/theme/bridal-jewelry-store/reviews/#new-post' ); ?>" title="<?php esc_attr_e( 'Visit the Review', 'bridal-jewelry-store' ); ?>" target="_blank">
			            <?php esc_html_e( 'REVIEW', 'bridal-jewelry-store' ); ?>
			        </a>
			        <a class="button button-primary" href="<?php echo esc_url( 'https://wordpress.org/support/theme/bridal-jewelry-store/' ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'bridal-jewelry-store' ); ?>" target="_blank">
			            <?php esc_html_e( 'CONTACT SUPPORT', 'bridal-jewelry-store' ); ?>
			        </a>
				</div>
				<div class="intro-img">
					<img src="<?php echo esc_url(get_template_directory_uri()) .'/screenshot.png'; ?>" />
				</div>
				
			</div>
		</div>

		<div class="cointaner panels">
			<ul class="inline-list">
				<li class="current">
                    <a id="help" href="javascript:void(0);">
                        <?php esc_html_e( 'Getting Started', 'bridal-jewelry-store' ); ?>
                    </a>
                </li>
				<li>
                    <a id="free-pro-panel" href="javascript:void(0);">
                        <?php esc_html_e( 'Free Vs Pro', 'bridal-jewelry-store' ); ?>
                    </a>
                </li>
			</ul>
			<div id="panel" class="panel">
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/help-panel.php'; ?>
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/free-vs-pro-panel.php'; ?>
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/link-panel.php'; ?>
			</div>
		</div>
	</div>
	<?php
}
endif;