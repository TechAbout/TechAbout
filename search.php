<?php
/**
 * The template for displaying search results pages.
 *
 * @package techabout
 */

get_header(); ?>

<div class="row">
	<section id="primary" class="content-area col <?php if( !is_active_sidebar('sidebar-1')) { echo "l12 s12"; } else { echo "l9 s12"; } ?>">
	<main id="main" class="site-main" role="main">
		<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content' );
					?>

				<?php endwhile; ?>

			<?php the_posts_pagination(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

	</main>
	<!-- #main -->
</section><!-- #primary -->

	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
