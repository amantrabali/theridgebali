<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ridge_Bali
 */

echo do_shortcode( '[hfe_template id='2078']' );
?>
	<main id="primary" class="site-main">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<!-- Blog Grid Start -->
			<div class="container-fluid blog-section">
		    <div class="row justify-content-center">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-archive', get_post_type() );

			endwhile;
			?>

			</div>
			</div>

			<?php

		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>		
	</main><!-- #main -->
<?php
echo do_shortcode( '[hfe_template id='622']' );
