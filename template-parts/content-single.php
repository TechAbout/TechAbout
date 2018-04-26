<?php
/**
 * Template part for displaying posts.
 *
 * @package techabout
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'card shades white'); ?> itemscope="" itemtype="http://schema.org/Article">

	<div class="card-content">
		<div class="single-post-img">
			<?php techabout_post_thumbnail(); ?>
		</div>
		<!-- .entry-header -->
		<div class="entry-content" itemprop="articleBody">
			<?php
			the_content();
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
	<div class="card-action meta">
		<?php techabout_entry_footer(); ?>
	</div>
	<!-- .entry-footer -->
</article>
<!-- #post-## -->
<?php
// Author bio.
if ( is_single() && get_the_author_meta( 'description' ) ) :
	get_template_part( 'author-bio' );
endif;
?>
<?php techabout_post_navigation(); ?>


