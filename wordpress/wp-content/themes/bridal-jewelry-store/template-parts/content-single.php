<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bridal_jewelry_store
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="mag-post-single">
		<div class="mag-post-detail">
			<div class="mag-post-category">
				<?php bridal_jewelry_store_categories_single_list(); ?>
			</div>
			<header class="entry-header">
				<?php
				if ( is_singular() ) {
				    if ( ! get_theme_mod( 'bridal_jewelry_store_single_post_hide_post_heading', false ) ) {
				        the_title( '<h1 class="entry-title">', '</h1>' );
				    }
				} else {
				    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}

				if ( 'post' === get_post_type() ) :
					?>
					<div class="mag-post-meta">
						<?php
						bridal_jewelry_store_posted_by_single();
						bridal_jewelry_store_posted_on_single();
						?>
					</div>
				<?php endif; ?>
			</header><!-- .entry-header -->
		</div>
		<?php bridal_jewelry_store_post_thumbnail(); ?>
		<?php if ( !get_theme_mod( 'bridal_jewelry_store_single_post_hide_post_content', false ) ) { ?>
			<div class="entry-content">
				<?php
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bridal-jewelry-store' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bridal-jewelry-store' ),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->
		<?php } ?>
	</div>

	<footer class="entry-footer">
		<?php bridal_jewelry_store_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->