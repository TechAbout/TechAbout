<?php
/**
 * The template for displaying all single posts.
 *
 * @package techabout
 */

get_header(); ?>

<div class="row">
	<div id="primary" class="content-area col <?php if( !is_active_sidebar('sidebar-1')) { echo "l12 s12"; } else { echo "l9 s12"; } ?>">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'single' ); ?>

				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main>
		<!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
