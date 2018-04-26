
</div><!-- id = content closing -->

<footer id="colophon" class="site-footer page-footer" role="contentinfo" itemscope="" itemtype="http://schema.org/WPFooter">
	<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) : ?>
		<div class="container footer-widget-container">
			<div class="row">
				<div id="sidebar-footer-1" class="widget-area col m4 s12" role="complementary">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div>
				<!-- #sidebar-footer-1 -->
				<div id="sidebar-footer-2" class="widget-area col m4 s12" role="complementary">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div>
				<!-- #sidebar-footer-2 -->
				<div id="sidebar-footer-3" class="widget-area col m4 s12" role="complementary">
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div>
				<!-- #sidebar-footer-3 -->
			</div>
		</div>
	<?php endif; ?>
	<div class="site-info footer-copyright">
		<div class="container">
		<?php  
			$wordpress_uri = 'https://wordpress.org/';
			$author_uri = 'https://www.techabout.com/';
		?>
			&copy; <?php echo esc_html(date_i18n( __( 'Y', 'techabout' ) )); ?> <a href="<?php echo esc_url(home_url()); ?>"><?php echo esc_attr(get_bloginfo('name')); ?></a> - Theme By <a href="<?php echo esc_url($author_uri); ?>" target="_blank">TechAbout</a> . <?php echo esc_html__('Powered by', 'techabout'); ?> <a href="<?php echo esc_url($wordpress_uri); ?>" target="_blank">WordPress.</a>
		</div>
		<!-- .container -->
	</div>

	<!-- .site-info -->
</footer><!-- #colophon -->
<div class="fixed-action-btn to-top">
	<a class="btn-floating btn-large waves-effect waves-light">
		<i class="material-icons">keyboard_arrow_up</i>
	</a>
</div>
</div><!-- Wrapper Closing -->

<?php wp_footer(); ?>

</body>
</html>