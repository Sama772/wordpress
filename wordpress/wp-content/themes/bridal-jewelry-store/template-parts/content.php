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
		<div class="mag-post-img">
			<?php bridal_jewelry_store_post_thumbnail(); ?>
		</div>
		<div class="mag-post-detail">
			<div class="mag-post-category">
				<?php bridal_jewelry_store_categories_list(); ?>
			</div>
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title mag-post-title">', '</h1>' );
			else :
				if ( !get_theme_mod( 'bridal_jewelry_store_post_hide_post_heading', false ) ) { 
					the_title( '<h2 class="entry-title mag-post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			    }
			endif;
			?>
			<div class="mag-post-meta">
				<?php
				bridal_jewelry_store_posted_by();
				bridal_jewelry_store_posted_on();
				?>
			</div>
			<?php if ( !get_theme_mod( 'bridal_jewelry_store_post_hide_post_content', false ) ) { ?>
				<div class="mag-post-excerpt">
					<?php the_excerpt(); ?>
				</div>
		    <?php } ?>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
