<?php $the_query = new WP_Query( array( 'post_type' => 'post', 'showposts' => 3, 'post__not_in' => get_option( 'sticky_posts' ) )); ?>
<div class="sixth-block">
	<div class="container">
		<h2 class="recent-post-heading">LATEST FROM OUR BLOG</h2>
		<hr>
			<div class="row">
				<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
				
				<?php get_template_part( 'template-parts/latest-post-content' ); ?>
				
				<?php 
					endwhile;
					wp_reset_postdata();
				?>
			</div>
	</div>
</div>