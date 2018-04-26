<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package techabout
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'card shades white' ); ?> itemscope="" itemtype="http://schema.org/Article">

	<div class="card-content">
	<div class="single-post-img">
		<?php techabout_post_thumbnail(); ?>
	</div>
		<!-- .entry-header -->
		<div class="entry-content" itemprop="articleBody">
			<?php the_content(); ?>
			<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'techabout' ),
					'after'  => '</div>',
				)
			);
			?>
		</div>
		<!-- .entry-content -->
	</div>
	<div class="card-action">
		<?php edit_post_link( esc_html__( 'Edit', 'techabout' ), '<span class="edit-link">', '</span>' ); ?>
	</div>
	<!-- .entry-footer -->
</article>
<!-- #post-## -->

