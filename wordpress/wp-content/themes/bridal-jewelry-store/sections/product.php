<?php

if ( ! get_theme_mod( 'bridal_jewelry_store_enable_service_section', false ) ) {
  return;
}

$bridal_jewelry_store_content_ids  = array();
$bridal_jewelry_store_content_type = get_theme_mod( 'bridal_jewelry_store_service_content_type', 'page' );

for ( $bridal_jewelry_store_i = 1; $bridal_jewelry_store_i <= 4; $bridal_jewelry_store_i++ ) {
  $bridal_jewelry_store_content_ids[] = get_theme_mod( 'bridal_jewelry_store_service_content_' . $bridal_jewelry_store_content_type . '_' . $bridal_jewelry_store_i );
}

$args = array(
  'post_type'           => $bridal_jewelry_store_content_type,
  'post__in'            => array_filter( $bridal_jewelry_store_content_ids ),
  'orderby'             => 'post__in',
  'posts_per_page'      => 4,
  'ignore_sticky_posts' => true,
);

$args = apply_filters( 'bridal_jewelry_store_service_section_args', $args );

bridal_jewelry_store_render_service_section( $args );

/**
 * Render Product Section.
 */
function bridal_jewelry_store_render_service_section( $args ) { ?>

  <section id="bridal_jewelry_store_trending_section" class="asterthemes-frontpage-section trending-section trending-style-1">
    <?php
    if ( is_customize_preview() ) :
      bridal_jewelry_store_section_link( 'bridal_jewelry_store_service_section' );
    endif;

    $bridal_jewelry_store_trending_product_heading = get_theme_mod( 'bridal_jewelry_store_trending_product_heading', '' );
    $bridal_jewelry_store_about_2_heading = get_theme_mod( 'bridal_jewelry_store_about_2_heading', '' );
    $bridal_jewelry_store_about_left_image_2 = get_theme_mod( 'bridal_jewelry_store_about_left_image_2', '' );
    $bridal_jewelry_store_about_2_button_link = get_theme_mod( 'bridal_jewelry_store_about_2_button_link', '' );
    $bridal_jewelry_store_trending_product_heading = get_theme_mod( 'bridal_jewelry_store_trending_product_heading', '' );
    ?>
    <div class="asterthemes-wrapper">
      <div class="product-main main-widget-section-wrap">
        <div class="asce-col-40">
          <div class="about-img-3">
            <?php if ( ! empty( $bridal_jewelry_store_about_left_image_2 ) ) { ?>
              <div class="service-img">
                <img src="<?php echo esc_url( $bridal_jewelry_store_about_left_image_2 ); ?>" alt="<?php the_title_attribute(); ?>">
                <?php if ( ! empty( $bridal_jewelry_store_about_2_button_link ) || ! empty( $bridal_jewelry_store_about_2_heading ) ) { ?>
                  <div class="left-content">
                    <?php if ( ! empty( $bridal_jewelry_store_about_2_heading ) ) { ?>
                      <h3 data-text="heading"><?php echo esc_html( $bridal_jewelry_store_about_2_heading ); ?></h3>
                    <?php } ?>
                    <a href="<?php echo esc_url( $bridal_jewelry_store_about_2_button_link ); ?>" class="asterthemes-button"><?php echo esc_html('Shop Now','bridal-jewelry-store' ); ?></a>
                  </div>
                <?php } ?>
              </div>
            <?php } ?>
          </div>
        </div>
        <div class="asce-col-60 product-slider">
          <?php if ( ! empty( $bridal_jewelry_store_trending_product_heading ) ) { ?>
            <div class="product-contact-inner">
              <?php if ( ! empty( $bridal_jewelry_store_trending_product_heading ) ) { ?>
                <h3 class="heading"><?php echo esc_html( $bridal_jewelry_store_trending_product_heading ); ?></h3>
              <?php } ?>
            </div>
          <?php } ?>
          <div class="">
          <?php $bridal_jewelry_store_catData = get_theme_mod('bridal_jewelry_store_trending_product_category','');
          if ( class_exists( 'WooCommerce' ) ) {
            $bridal_jewelry_store_args = array(
              'post_type' => 'product',
              'posts_per_page' => 100,
              'product_cat' => $bridal_jewelry_store_catData,
              'order' => 'ASC'
            );?>
            <div class="owl-carousel"> 
              <?php $loop = new WP_Query( $bridal_jewelry_store_args );
              while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                <div class="tab-product">
                  <div class="product-image" style="position: relative;">
                    <figure>
                      <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                    </figure>
                    <div class="box-content intro-button">
                      <?php if( $product->is_type( 'simple' ) ) { woocommerce_template_loop_add_to_cart(  $loop->post, $product );} ?>
                    </div>
                    <?php if(class_exists('YITH_WCQV')){ ?>
                      <span class="view-button"><?php echo do_shortcode('[yith_quick_view]'); ?></span>
                    <?php }?>
                  </div>
                  <div class="product-content-box">
                    <div class="product-rating">
                      <div class="cat-box">
                        <?php echo wp_kses_post( wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">', '</span>' ) ); ?>
                      </div>
                      <span class="rating-box">
                        <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?>  
                      </span>
                    </div>
                    <h5 class="product-text"><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h5>
                    <div class="mag-post-excerpt">
                      <?php  $bridal_jewelry_store_excerpt = wp_trim_words(get_the_excerpt(), 20, '...');
                        echo $bridal_jewelry_store_excerpt;
                      ?>
                    </div>
                    <span class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>">
                      <?php echo $product->get_price_html(); ?>
                    </span>
                  </div>
                </div>
              <?php endwhile; wp_reset_postdata(); ?>
            </div>
          <?php } ?>
        </div>  
        </div>
      </div>
    </div>
  </section>
  <?php
}
