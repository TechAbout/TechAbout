<?php
/**
 * Template Name:home
 *
 *
 *
 * @package techabout
 */

get_header();
?>

<?php if(get_theme_mod( "welcome_display_option", true) == true) : ?>

<div class="first-block">
	<div class="first-block-content">
		<h1>
			<?php echo esc_html(get_theme_mod( 'Welcome_message_heading', 'Welcome To The Company' )); ?>
		</h1>
		<p>
			<?php echo esc_html(get_theme_mod( 'Welcome_message_description', 'We believe in strongly quality as the most important aspect of our work.' )); ?>
		</p>

		<?php if(get_theme_mod( "first_section_button1_display_option", true) == true) : ?>
			<a class="btn btn-link button-1" href="<?php echo esc_url(get_theme_mod( 'first_section_button1_link', '#' )); ?>">
				<?php echo esc_html(get_theme_mod( 'first_section_button1_description', 'About Us' )); ?>
			</a>	
		<?php endif; ?>

		<?php if(get_theme_mod( "first_section_button2_display_option", true) == true) : ?>
			<a class="btn btn-link button-2" href="<?php echo esc_url(get_theme_mod( 'first_section_button2_link', '#' )); ?>">
				<?php echo esc_html(get_theme_mod( 'first_section_button2_description', 'Contact Us' )); ?>
			</a>	
		<?php endif; ?>

	</div>
</div>

<?php endif; ?>

<?php if(get_theme_mod( "second_section_display_option", true) == true) : ?>

<div class="second-block">
	<div class="row">
			<div class="second-block-content-1">
				<div class="col l4 s12">	
					<div class="margin-top-content-1">
						<h3>
							<?php echo esc_html(get_theme_mod( 'second_section_heading', 'Our Team' )); ?>
						</h3>
						<p>
							<?php echo esc_html(get_theme_mod( 'second_section_description', 'Every member of our team is highly competent in his field and entire team focus on goals and quality results.' )); ?>
						</p>

						<?php if(get_theme_mod( "second_section_button_display_option", true) == true) : ?>
							<a class="btn btn-link" href="<?php echo esc_url(get_theme_mod( 'second_section_button_link', '#' )); ?>">
								<?php echo esc_html(get_theme_mod( 'second_section_button_description', 'Team Members' )); ?>
							</a>	
						<?php endif; ?>
					</div>
				</div>
			</div>
		<div class="second-block-content-2">
			<div class="col l8 s12 aligncenter padding-0">
				<?php $img2 =get_template_directory_uri().'/img/team.jpg'; ?>
				<img src="<?php echo esc_url(get_theme_mod( 'second_section_image', esc_url($img2) )); ?>">
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>

<?php endif; ?>

<?php if(get_theme_mod('fourth_section_display_option', true) == true): ?>

	<div class="fourth-block">
		<div class="fourth-block-content">
			<h2 class="fourth-block-heading-margin">
				<?php echo esc_html(get_theme_mod( 'fourth_section_description', 'Always give people more than they expect to get.' )); ?>
			</h2>
		</div>
	</div>

<?php endif; ?>

<?php if(get_theme_mod('fifth_section_display_option', true) == true): ?>

<div class="fifth-block">
	<div class="container">
		<div class="row">
			<div class="col s12 m5">
				<h1>
					<?php echo esc_html(get_theme_mod( 'fifth_section_heading', 'We believe in quality work.' )); ?>
				</h1>
				<h5>
					<?php echo esc_html(get_theme_mod( 'fifth_section_description', 'There is nothing important then the quality work.' )); ?>
				</h5>
				<br>
				<i class="material-icons left md-48">
					<?php echo esc_html(get_theme_mod( 'fifth_section_icons', 'announcement' )); ?>
				</i>
				<h5>
					<?php echo esc_html(get_theme_mod( 'fifth_section_sub_heading', 'Sub-Heading' )); ?>
				</h5>
				<p>
					<?php echo esc_html(get_theme_mod( 'fifth_section_sub_heading_description', 'Description' )); ?>
				</p>
			</div>
		</div>
	</div>
</div>

<?php endif; ?>

<?php if(get_theme_mod('latest_post_section_display_option', true) == true): ?>

	<?php get_template_part('latest-posts'); ?>

<?php endif; ?>

<?php if(get_theme_mod('call_action_section_display_option', true) == true): ?>
<div class="seventh-block">
	<div class="row">
		<div class="col s12 l12">
			<div class="seventh-block-content">
				<h1>
					<?php echo esc_html(get_theme_mod( 'call_action_section_description', 'Want To Be Our Team Member ?' )); ?>
				</h1>
					<a class="btn btn-link" href="<?php echo esc_url(get_theme_mod( 'call_action_section_button_link', '#' )); ?>">
						<?php echo esc_html(get_theme_mod( 'call_action_section_button_description', 'Join Us Now' )); ?>
					</a>
			</div>
		</div>
	</div>
</div>

<?php endif; ?>

<?php get_footer(); ?>