<?php
if ( ! get_theme_mod( 'bridal_jewelry_store_enable_banner_section', false ) ) {
	return;
}

$bridal_jewelry_store_slider_content_ids  = array();
$bridal_jewelry_store_slider_content_type = get_theme_mod( 'bridal_jewelry_store_banner_slider_content_type', 'post' );

for ( $i = 1; $i <= 3; $i++ ) {
	$bridal_jewelry_store_slider_content_ids[] = get_theme_mod( 'bridal_jewelry_store_banner_slider_content_' . $bridal_jewelry_store_slider_content_type . '_' . $i );
}
$bridal_jewelry_store_banner_slider_args = array(
	'post_type'           => $bridal_jewelry_store_slider_content_type,
	'post__in'            => array_filter( $bridal_jewelry_store_slider_content_ids ),
	'orderby'             => 'post__in',
	'posts_per_page'      => absint( 3 ),
	'ignore_sticky_posts' => true,
);
$bridal_jewelry_store_banner_slider_args = apply_filters( 'bridal_jewelry_store_banner_section_args', $bridal_jewelry_store_banner_slider_args );

bridal_jewelry_store_render_banner_section( $bridal_jewelry_store_banner_slider_args );

/**
 * Render Banner Section.
 */
function bridal_jewelry_store_render_banner_section( $bridal_jewelry_store_banner_slider_args ) {     ?>

	<section id="bridal_jewelry_store_banner_section" class="banner-section banner-style-1">
		<?php
		if ( is_customize_preview() ) :
			bridal_jewelry_store_section_link( 'bridal_jewelry_store_banner_section' );
		endif;
		?>
		<div class="banner-section-wrapper">
			<?php
			$query = new WP_Query( $bridal_jewelry_store_banner_slider_args );
			if ( $query->have_posts() ) :
				?>
				<div class="asterthemes-banner-wrapper banner-slider bridal-jewelry-store-carousel-navigation" data-slick='{"autoplay": false }'>
					<?php 
					$i = 1;
					while ( $query->have_posts() ) :
						$query->the_post();
						$bridal_jewelry_store_button_label = get_theme_mod( 'bridal_jewelry_store_banner_button_label_' . $i, '' );
						$bridal_jewelry_store_button_link  = get_theme_mod( 'bridal_jewelry_store_banner_button_link_' . $i, '' );
						$bridal_jewelry_store_button_link  = ! empty( $bridal_jewelry_store_button_link ) ? $bridal_jewelry_store_button_link : get_the_permalink();
						$bridal_jewelry_store_default_image_url_head = get_theme_mod('bridal_jewelry_store_about_left_image_1'. $i,'' );
						?>
						<div class="banner-single-outer">
							<div class="banner-single">
								<div class="banner-main-image">
									<div class="banner-img">
										<?php 
							                if ( has_post_thumbnail() ) {
							                    the_post_thumbnail(); 
							                } else {
							                    // URL of the default image
							                    $bridal_jewelry_store_default_image_url = get_template_directory_uri() . '/resource/img/default.png';
							                    echo '<img src="' . esc_url( $bridal_jewelry_store_default_image_url ) . '" alt="' . esc_attr( get_the_title() ) . '">';
							                }
							            ?>
									</div>								
								</div>
								<div class="banner-caption">
									<div class="banner-catption-wrapper">
									
										<h1 class="banner-caption-title">
											<a href="<?php the_permalink(); ?>">
						                        <?php the_title(); ?>
						                    </a>
										</h1>
										<div class="mag-post-excerpt">
					                        <?php  $bridal_jewelry_store_excerpt = wp_trim_words(get_the_excerpt(), 20, '...');
					                          echo $bridal_jewelry_store_excerpt;
					                        ?>
					                    </div>
										<?php if ( ! empty( $bridal_jewelry_store_button_label ) ) { ?>
											<div class="banner-slider-btn">
												<a href="<?php echo esc_url( $bridal_jewelry_store_button_link ); ?>" class="asterthemes-button"><?php echo esc_html( $bridal_jewelry_store_button_label ); ?></a>
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<?php
						$i++;
					endwhile;
					wp_reset_postdata();
					?>
				</div>
				<?php
			endif;
			?>
		</div>
	</section>

	<?php
}
