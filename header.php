<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package techabout
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
		

<div class='wrapper'>
	
<div class="row bg-color">
	<header id="masthead" class="site-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
		<nav id="site-navigation" class="main-navigation" role="navigation">

			<div class="nav-wrapper container ">
				
				<a href="#" data-activates="side-primary-menu" class="button-collapse tooltip"><i class="material-icons">menu</i></a>
					<!-- Logo -->
                    <?php
                    if(has_custom_logo())
                    {
	                    // Display the Custom Logo
	                    the_custom_logo();
                    }
                     else { ?>
	                    	<a class="navbar-brand" href="<?php echo esc_url(home_url( '/' )); ?>">
	                    		<span class="site-title"><?php bloginfo('name'); ?></span>
	                    		<span class="site-description hide-on-small-only"><?php bloginfo('description','display'); ?></span>
	                    	</a>     
                    <?php } ?>
                    <!-- Logo -->

 				<li id="header-search-button" class="search-button hide-on-med-and-down">
 					<i class="material-icons left">search</i>
 				</li>
				<?php wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_id'        => 'side-primary-menu',
						'menu_class'     => 'side-nav',
						'fallback_cb' => '__return_false',
					)
				); ?>
				<?php wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'primary-menu right hide-on-med-and-down',
						'fallback_cb' => '__return_false',
					)
				); ?>
				<?php //dynamic_sidebar( 'menu-right' ); ?>
			
			</div>
		</nav>
		<!-- #site-navigation -->

	<div class="serach-field-area">
	  	<nav>
		    <div class="nav-wrapper">
		      <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		        <div class="input-field">
		          <input id="search" type="search" value="" name="s" class="validate">
		          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
		        </div>
		      </form>
		    </div>
	  	</nav>
	</div>

	</header>
	<!-- #masthead -->
</div>

	<?php if( is_page_template('customhome.php')) : ?>
		<div id="content" class="site-content-fpage">
	<?php else: ?>

		<?php if(!is_Home()){
				techabout_breadcrumbs();
			}
		?>
		
		<div id="content" class="site-content container">	
	<?php endif; ?>