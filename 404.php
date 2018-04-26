<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package techabout
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<section class="error-404 not-found row">
			<div class="page-content col s12">
				<div class="card hoverable z-depth-1">
					<div class="card-content">
						<h1 class="page-title card-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'techabout' ); ?></h1>

						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links aside or a search below?', 'techabout' ); ?></p>

						<?php get_search_form(); ?>
					</div>
					<div class="card-action">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php printf( esc_html__( 'Continue to %s', 'techabout' ), esc_attr(get_bloginfo( 'name' )) ); ?></a>
					</div>
				</div>
			</div>
		</section>
		<!-- .error-404 -->

	</main>
	<!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
