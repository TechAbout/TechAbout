<?php
/**
 * Template part for displaying posts.
 *
 * @package techabout
 */
?>
<div class="col l4 m4 s12">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div>
			<div class="card">
			    <div class="card-image waves-effect waves-block waves-light">
			      	<?php if ( has_post_thumbnail() ) {
								echo "<a href='". esc_url( get_permalink() )."'>";
									techabout_post_thumbnail();
								echo "</a>";
							}
					?>
			    </div>
			    <div class="card-content">
			      <span class="card-title activator grey-text text-darken-4"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a><i class="material-icons right">more_vert</i></span>
			    </div>
			    <div class="card-reveal">
			      <span class="card-title grey-text text-darken-4"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a><i class="material-icons right">close</i></span>
			      <p><?php the_excerpt(); ?></p>
			    </div>
			</div>
		</div>
	</article>
</div>
<!-- #post-## -->