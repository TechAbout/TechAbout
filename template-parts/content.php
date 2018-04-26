<?php
/**
 * Template part for displaying posts.
 *
 * @package techabout
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="card hoverable grid-card post-content-container">
		<?php ?>
			<div class="row">
				<div class="col s12 m4 l4">
					<div class="card-image waves-effect waves-block waves-light post-card-image">
						<?php if ( has_post_thumbnail() ) {
							echo "<a href='". esc_url( get_permalink() )."'>";
								techabout_post_thumbnail();
							echo "</a>";
						}
						else{
							$img =get_template_directory_uri().'/img/overlay.png';
							echo "<a href='". esc_url( get_permalink() )."'>";
							echo '<img src="'. esc_url($img) .'"class="card-thumb red">';
							echo "</a>";
						}
						?>
					</div>
				</div>
				<div class="col 12 m7 l7">
					<div class="post-content">
						<div class="category-div">
							<i class="tiny material-icons">folder</i>
							<?php $cat_list = get_the_category_list();
							if(!empty($cat_list)) { ?>
									<?php if(!empty($cat_list)) { ?>
										<?php the_category(', '); ?>
								<?php }
							} ?>
						</div>

						<h3>
							<a class="card-post-title" href="<?php echo esc_url( get_permalink() ); ?>">
								<?php the_title(); ?>		
							</a>
						</h3>
						<div class="excerpt-div">
							<?php the_excerpt(); ?>
						</div>
						<div class="post-meta-data">
							<i class="tiny material-icons">account_box</i>
							<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>">
								<?php the_author(); ?>
							</a>
							<i class="tiny material-icons">event_note</i>
							<span class="meta-data-date"><?php echo esc_html(get_the_date()); ?></span>
						</div>
					</div>
				</div>
			</div>
		<!-- .entry-footer -->
	</div>
</article>
<!-- #post-## -->