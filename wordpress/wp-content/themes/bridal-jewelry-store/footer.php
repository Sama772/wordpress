<?php
/**
 * The template for displaying the footer
 * 
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bridal_jewelry_store
 */

// Get the footer background color/image settings from customizer
$bridal_jewelry_store_footer_background_color = get_theme_mod('bridal_jewelry_store_footer_background_color_setting', ''); // Default to white if not set
$bridal_jewelry_store_footer_background_image = get_theme_mod('bridal_jewelry_store_footer_background_image_setting');

if (!is_front_page() || is_home()) {
    ?>
    </div>
    </div>
</div>
<?php } ?>

<footer id="colophon" class="site-footer" style="background-color: <?php echo esc_attr($bridal_jewelry_store_footer_background_color); ?>; <?php echo ($bridal_jewelry_store_footer_background_image) ? 'background-image: url(' . esc_url($bridal_jewelry_store_footer_background_image) . ');' : ''; ?>">
    <div class="site-footer-top">
        <div class="asterthemes-wrapper">
            <div class="footer-widgets-wrapper">

                <?php
                // Footer Widget
                do_action('bridal_jewelry_store_footer_widget');
                ?>

            </div>
        </div>
    </div>
    <div class="site-footer-bottom">
        <div class="asterthemes-wrapper">
            <div class="site-footer-bottom-wrapper">
                <div class="site-info">
                    <?php
                    do_action('bridal_jewelry_store_footer_copyright');
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php
$bridal_jewelry_store_is_scroll_top_active = get_theme_mod( 'bridal_jewelry_store_scroll_top', true );
if ( $bridal_jewelry_store_is_scroll_top_active ) :
    $bridal_jewelry_store_scroll_position = get_theme_mod( 'bridal_jewelry_store_scroll_top_position', 'bottom-right' );
    ?>
    <style>
        #scroll-to-top {
            position: fixed;
            <?php
            switch ( $bridal_jewelry_store_scroll_position ) {
                case 'bottom-left':
                    echo 'bottom: 20px; left: 20px;';
                    break;
                case 'bottom-center':
                    echo 'bottom: 20px; left: 50%; transform: translateX(-50%);';
                    break;
                default: // 'bottom-right'
                    echo 'bottom: 20px; right: 20px;';
            }
            ?>
        }
    </style>
    <a href="#" id="scroll-to-top" class="bridal-jewelry-store-scroll-to-top"><i class="<?php echo esc_attr( get_theme_mod( 'bridal_jewelry_store_scroll_btn_icon', 'fas fa-chevron-up' ) ); ?>"></i></a>
<?php
endif;
?>
</div>

<?php wp_footer(); ?>

</body>

</html>
