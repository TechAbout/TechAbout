<?php
/**
 * The template for displaying Author bios.
 *
 * @package techabout
 */
?>

<div class="author-info z-depth-1" itemscope itemtype="http://schema.org/Person">
	<div class="collection">
		<div class="author-avatar collection-item avatar">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), '', '', get_the_author() ); ?>
			<h3 class="author-title title" itemprop="name">
				<a class="author-link" itemprop="url" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html(get_the_author()); ?></a>
			</h3>

			<p class="author-bio">
				<?php esc_html(the_author_meta( 'description' )); ?>
			</p><!-- .author-bio -->

		</div>
	</div>
</div><!-- .author-info -->






