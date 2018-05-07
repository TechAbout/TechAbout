<?php 


function frontpage_customizer_register( $wp_customize ) {

/*Sanitize Functions*/

function techabout_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

//select sanitization function
function techabout_sanitize_select( $input, $setting ){
 
    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    $input = sanitize_key($input);

    //get the list of possible select options 
    $choices = $setting->manager->get_control( $setting->id )->choices;
                     
    //return input if valid or return default option
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
     
}	

function techabout_sanitize_image( $image, $setting ) {
	/*
	 * Array of valid image file types.
	 *
	 * The array includes image mime types that are included in wp_get_mime_types()
	 */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
	// Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}

/*Sanitize Functions END */

/*Front-Page Setting Panel*/

$wp_customize->add_panel( 'front_page_panel', array(
	'priority'       => 50,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __('Front Page Settings', 'techabout'),
	'description'    => __('Customize Front-Page Sections', 'techabout'),
) );

/* END Front-Page Setting Panel */

/* Start Front-Page Welcome Section */

	$wp_customize->add_section( 'Welcome_section', array(
		'title'       => __( 'Welcome Message', 'techabout' ),
		'description' => 'Add/Edit Welcome Banner',
		'panel'  => 'front_page_panel',
	) );

	/*Welcome Display Option*/

		$wp_customize->add_setting( 
	        'welcome_display_option',
	        array(
	        'default' => true,
	        'sanitize_callback' => 'techabout_sanitize_checkbox',
	        'panel'  => 'front_page_panel',
		) );

		$wp_customize->add_control( 'welcome_display_option', array(
	        'type' => 'checkbox',
	        'label' => __('Display Welcome Banner','techabout'),
	        'section' => 'Welcome_section',
	    ) );

		/* First Section First Button Display Option */

		$wp_customize->add_setting( 
	        'first_section_button1_display_option',
	        array(
	        'default' => true,
	        'sanitize_callback' => 'techabout_sanitize_checkbox',
	        'panel'  => 'front_page_panel',
		) );

		$wp_customize->add_control( 'first_section_button1_display_option', array(
	        'type' => 'checkbox',
	        'label' => __('Display Button 1','techabout'),
	        'section' => 'Welcome_section',
	    ) );

	    /* First Section Second Button Display Option */

		$wp_customize->add_setting( 
	        'first_section_button2_display_option',
	        array(
	        'default' => true,
	        'sanitize_callback' => 'techabout_sanitize_checkbox',
	        'panel'  => 'front_page_panel',
		) );

		$wp_customize->add_control( 'first_section_button2_display_option', array(
	        'type' => 'checkbox',
	        'label' => __('Display Button 2','techabout'),
	        'section' => 'Welcome_section',
	    ) );

	/*Welcome Heading*/

		$wp_customize->add_setting( 'Welcome_message_heading', array(
			'sanitize_callback' => 'sanitize_text_field',
			'panel'  => 'front_page_panel',
		) );
		$wp_customize->add_control( 'welcome_heading_control', array(
			'label'    => __( 'Welcome Message Heading: ', 'techabout' ),
			'section'  => 'Welcome_section',
			'settings' => 'Welcome_message_heading',
			'input_attrs' => array(
			'placeholder' => __( 'Your Welcome Message Heading', 'techabout' ))
		) );

	/*Welcome Description*/

		$wp_customize->add_setting( 'Welcome_message_description', array(
			'sanitize_callback' => 'sanitize_text_field',
			'panel'  => 'front_page_panel',
		) );
		$wp_customize->add_control( 'welcome_description_control', array(
			'label'    => __( 'Welcome Message: ', 'techabout' ),
			'section'  => 'Welcome_section',
			'settings' => 'Welcome_message_description',
			'input_attrs' => array(
			'placeholder' => __( 'Your Welcome Message', 'techabout' ))
	) );

	/* Welcome Section Image Upload */
	    $wp_customize->add_setting( 
	    	'welcome_section_image', array(
	    	'sanitize_callback' => 'techabout_sanitize_image',
	    ) );

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
	    	'welcome_section_image', array(
	    	'label'    => __( 'Choose Background Image', 'techabout' ),
	    	'section'  => 'Welcome_section',
	    	'settings' => 'welcome_section_image',) 
	    ) );

	    /* First Section Button 1 Description */

		$wp_customize->add_setting( 'first_section_button1_description', array(
			'sanitize_callback' => 'sanitize_text_field',
			'panel'  => 'front_page_panel',
		) );
		$wp_customize->add_control( 'first_section_button1_description', array(
			'label'    => __( 'Button 1 Description: ', 'techabout' ),
			'section'  => 'Welcome_section',
			'settings' => 'first_section_button1_description',
			'input_attrs' => array(
			'placeholder' => __( 'Button 1', 'techabout' ))	
		) );	

		// First Section Button 1 link

		$wp_customize->add_setting('first_section_button1_link', array(
	        'sanitize_callback' => 'esc_url_raw',
			'panel'  => 'front_page_panel',
			'default' => '#',
	    ) );
		$wp_customize->add_control('first_section_button1_link', array(
	        'label' => __('Button 1 Link URL','techabout'),
	        'section' => 'Welcome_section',
	        'type' => 'url',
	    ) );

		/* First Section Button 1 Color */

			//header background color
			$wp_customize->add_setting('first_section_button1_color', array(
			'default' => '#933e50',
			'sanitize_callback' => 'sanitize_hex_color',
		    ) );
			
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'first_section_button1_color', array(
				'label'      => __('Button 1 Color', 'techabout' ),
				'section'    => 'Welcome_section',
				'settings'   => 'first_section_button1_color',) 
			) );

		/* First Section Button 1 Color */

		/* First Section Button 2 Description */

		$wp_customize->add_setting( 'first_section_button2_description', array(
			'sanitize_callback' => 'sanitize_text_field',
			'panel'  => 'front_page_panel',
		) );
		$wp_customize->add_control( 'first_section_button2_description', array(
			'label'    => __( 'Button 2 Description: ', 'techabout' ),
			'section'  => 'Welcome_section',
			'settings' => 'first_section_button2_description',
			'input_attrs' => array(
			'placeholder' => __( 'Button 2', 'techabout' ))		
		) );	

		// First Section Button 2 link

		$wp_customize->add_setting('first_section_button2_link', array(
	        'sanitize_callback' => 'esc_url_raw',
			'panel'  => 'front_page_panel',
			'default' => '#',
	    ) );
		$wp_customize->add_control('first_section_button2_link', array(
	        'label' => __('Button 2 Link URL','techabout'),
	        'section' => 'Welcome_section',
	        'type' => 'url',
	    ) );

		/* First Section Button 2 Color */

			//header background color
			$wp_customize->add_setting('first_section_button2_color', array(
			'default' => '#d37c30',
			'sanitize_callback' => 'sanitize_hex_color',
		    ) );
			
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'first_section_button2_color', array(
				'label'      => __('Button 2 Color', 'techabout' ),
				'section'    => 'Welcome_section',
				'settings'   => 'first_section_button2_color',) 
			) );

		/* First Section Button 2 Color */	    

/* ---------------- END Front-Page Welcome Section ----------------------- */


/* Start Front-Page Second Section */

	$wp_customize->add_section( 'second_section', array(
		'title'       => __( 'Second Section', 'techabout' ),
		'description' => 'Add/Edit Second Section',
		'panel'  => 'front_page_panel',
	) );


	/* Second Section Display Option */

		$wp_customize->add_setting( 
	        'second_section_display_option',
	        array(
	        'default' => true,
	        'sanitize_callback' => 'techabout_sanitize_checkbox',
	        'panel'  => 'front_page_panel',
		) );

		$wp_customize->add_control( 'second_section_display_option', array(
	        'type' => 'checkbox',
	        'label' => __('Display Second Section','techabout'),
	        'section' => 'second_section',
	    ) );

	/* Second Section Button Display Option */

		$wp_customize->add_setting( 
	        'second_section_button_display_option',
	        array(
	        'default' => true,
	        'sanitize_callback' => 'techabout_sanitize_checkbox',
	        'panel'  => 'front_page_panel',
		) );

		$wp_customize->add_control( 'second_section_button_display_option', array(
	        'type' => 'checkbox',
	        'label' => __('Display Button','techabout'),
	        'section' => 'second_section',
	    ) );  

	/* Second Section Heading */

		$wp_customize->add_setting( 'second_section_heading', array(
			'sanitize_callback' => 'sanitize_text_field',
			'panel'  => 'front_page_panel',
		) );
		$wp_customize->add_control( 'second_section_heading_control', array(
			'label'    => __( 'Heading: ', 'techabout' ),
			'section'  => 'second_section',
			'settings' => 'second_section_heading',
			'input_attrs' => array(
			'placeholder' => __( 'Heading', 'techabout' ))	
		) );

	/* Second Section Description */

		$wp_customize->add_setting( 'second_section_description', array(
			'sanitize_callback' => 'sanitize_text_field',
			'panel'  => 'front_page_panel',
		) );
		$wp_customize->add_control( 'second_section_description_control', array(
			'label'    => __( 'Description: ', 'techabout' ),
			'section'  => 'second_section',
			'settings' => 'second_section_description',
			'input_attrs' => array(
			'placeholder' => __( 'Second Section Description', 'techabout' ))	
		) );

	/* Second Section Button Description */

		$wp_customize->add_setting( 'second_section_button_description', array(
			'sanitize_callback' => 'sanitize_text_field',
			'panel'  => 'front_page_panel',
		) );
		$wp_customize->add_control( 'second_section_button_description', array(
			'label'    => __( 'Button Description: ', 'techabout' ),
			'section'  => 'second_section',
			'settings' => 'second_section_button_description',
			'input_attrs' => array(
			'placeholder' => __( 'Button', 'techabout' ))	
		) );	

	// Second Section Button link
		$wp_customize->add_setting('second_section_button_link', array(
	        'sanitize_callback' => 'esc_url_raw',
			'panel'  => 'front_page_panel',
			'default' => '#',
	    ) );
		$wp_customize->add_control('second_section_button_link', array(
	        'label' => __('Button Link URL','techabout'),
	        'section' => 'second_section',
	        'type' => 'text',
	    ) );

		/* Second Section Button Color */

			//header background color
			$wp_customize->add_setting('second_section_button_color', array(
			'default' => '#ea9c00',
			'sanitize_callback' => 'sanitize_hex_color',
		    ) );
			
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'second_section_button_color', array(
				'label'      => __('Button Color', 'techabout' ),
				'section'    => 'second_section',
				'settings'   => 'second_section_button_color',) 
			) );

		/* Second Section Button  Color */	

/* Second Section Image Upload */
	    $wp_customize->add_setting( 
	    	'second_section_image', array(
	    	'sanitize_callback' => 'techabout_sanitize_image',
	    ) );

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
	    	'second_section_image', array(
	    	'label'    => __( 'Choose Image', 'techabout' ),
	    	'section'  => 'second_section',
	    	'settings' => 'second_section_image',) 
	    ) );	    

/* ---------------- END Front-Page Second Section ----------------------- */

/* Start Front-Page Fourth Section */

	$wp_customize->add_section( 'fourth_section', array(
		'title'       => __( 'Third Section', 'techabout' ),
		'description' => 'Add/Edit third Section',
		'panel'  => 'front_page_panel',
	) );

	/* Fourth Section Display Option */

		$wp_customize->add_setting( 
	        'fourth_section_display_option',
	        array(
	        'default' => true,
	        'sanitize_callback' => 'techabout_sanitize_checkbox',
	        'panel'  => 'front_page_panel',
		) );

		$wp_customize->add_control( 'fourth_section_display_option', array(
	        'type' => 'checkbox',
	        'label' => __('Display Third Section','techabout'),
	        'section' => 'fourth_section',
	    ) );

	/* Fourth Section Description */

		$wp_customize->add_setting( 'fourth_section_description', array(
			'sanitize_callback' => 'sanitize_text_field',
			'panel'  => 'front_page_panel',
		) );
		$wp_customize->add_control( 'fourth_section_description', array(
			'label'    => __( 'Description: ', 'techabout' ),
			'section'  => 'fourth_section',
			'settings' => 'fourth_section_description',
			'input_attrs' => array(
			'placeholder' => __( 'Description', 'techabout' ))		
		) );

/* ---------------- END Front-Page Fourth Section ----------------------- */

/* Start Front-Page Fourth Section */

	$wp_customize->add_section( 'fifth_section', array(
		'title'       => __( 'Fourth Section', 'techabout' ),
		'description' => 'Add/Edit fourth Section',
		'panel'  => 'front_page_panel',
	) );

	/* Fifth Section Display Option */

		$wp_customize->add_setting( 'fifth_section_display_option',
	        array(
	        'default' => true,
	        'sanitize_callback' => 'techabout_sanitize_checkbox',
	        'panel'  => 'front_page_panel',
		) );

		$wp_customize->add_control( 'fifth_section_display_option', array(
	        'type' => 'checkbox',
	        'label' => __('Display Fourth Section','techabout'),
	        'section' => 'fifth_section',
	    ) );
  

	/* Fifth Section Heading */

		$wp_customize->add_setting( 'fifth_section_heading', array(
			'sanitize_callback' => 'sanitize_text_field',
			'panel'  => 'front_page_panel',
		) );
		$wp_customize->add_control( 'fifth_section_heading', array(
			'label'    => __( 'Main Heading: ', 'techabout' ),
			'section'  => 'fifth_section',
			'settings' => 'fifth_section_heading',
			'input_attrs' => array(
			'placeholder' => __( 'Main Heading', 'techabout' ))		
		) );

	/* Fifth Section Description */

		$wp_customize->add_setting( 'fifth_section_description', array(
			'sanitize_callback' => 'sanitize_text_field',
			'panel'  => 'front_page_panel',
		) );
		$wp_customize->add_control( 'fifth_section_description', array(
			'label'    => __( 'Description: ', 'techabout' ),
			'section'  => 'fifth_section',
			'settings' => 'fifth_section_description',
			'input_attrs' => array(
			'placeholder' => __( 'Description', 'techabout' ))	
		) );

	/* Fifth Section Sub-Heading */

		$wp_customize->add_setting( 'fifth_section_sub_heading', array(
			'sanitize_callback' => 'sanitize_text_field',
			'panel'  => 'front_page_panel',
		) );
		$wp_customize->add_control( 'fifth_section_sub_heading', array(
			'label'    => __( 'Sub-Heading: ', 'techabout' ),
			'section'  => 'fifth_section',
			'settings' => 'fifth_section_sub_heading',
			'input_attrs' => array(
			'placeholder' => __( 'Sub-Heading', 'techabout' ))	
		) );

	/* Fifth Section Sub-Heading-Description */

		$wp_customize->add_setting( 'fifth_section_sub_heading_description', array(
			'sanitize_callback' => 'sanitize_text_field',
			'panel'  => 'front_page_panel',
		) );
		$wp_customize->add_control( 'fifth_section_sub_heading_description', array(
			'label'    => __( 'Description: ', 'techabout' ),
			'section'  => 'fifth_section',
			'settings' => 'fifth_section_sub_heading_description',
			'input_attrs' => array(
			'placeholder' => __( 'Description', 'techabout' ))		
		) );

	/* Fifth Section Background Image */
	    $wp_customize->add_setting('fifth_section_image', array(
	    	'sanitize_callback' => 'techabout_sanitize_image',
	    ) );

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
	    	'fifth_section_image', array(
	    	'label'    => __( 'Choose Backgrond Image', 'techabout' ),
	    	'section'  => 'fifth_section',
	    	'settings' => 'fifth_section_image',) 
	    ) );

	/* Fifth Section Icons */

		$wp_customize->add_setting( 'fifth_section_icons',
		array(
		    'default'    => 'code',
		    'type'       => 'theme_mod',
		    'capability' => 'edit_theme_options',
		    'sanitize_callback' => 'techabout_sanitize_select',
		));

		$wp_customize->add_control( new WP_Customize_Control(
		 $wp_customize,
		 'fifth_section_icons',
		 array(
		    'label'      => __( 'Select Icon', 'techabout' ),
		    'description' => __( 'Using this option you can change Icons in section 4','techabout' ),
		    'settings'   => 'fifth_section_icons',
		    'section'    => 'fifth_section',
		    'type'    => 'select',
		    'choices' => array(
		        'account_circle' => 'Account Person',
		        'add' => 'Add',
		        'add_to_queue' => 'Add to Queue',
		        'android' => 'Android',
		        'announcement' => 'announcement',
		        'attach_file' => 'Attachment',
		        'attach_money' => 'Money',
		        'business_center' => 'Business',
		        'code' => 'Code',
		        'camera_alt' => 'Camera',
		        'network_check' => 'Wifi',
		        'wallpaper' => 'Image',
		        'work' => 'Work',
		    )
		)
		) );

/* ---------------- END Front-Page Fifth Section ----------------------- */

/* Start Front-Page Latest Post Section */

	$wp_customize->add_section( 'latest_post_section', array(
		'title'       => __( 'Latest Post Section', 'techabout' ),
		'description' => 'Add/Edit Latest Post Section',
		'panel'  => 'front_page_panel',
	) );

	/* Latest Post Section Display Option */

		$wp_customize->add_setting( 
	        'latest_post_section_display_option',
	        array(
	        'default' => true,
	        'sanitize_callback' => 'techabout_sanitize_checkbox',
	        'panel'  => 'front_page_panel',
		) );

		$wp_customize->add_control( 'latest_post_section_display_option', array(
	        'type' => 'checkbox',
	        'label' => __('Display Latest Post Section','techabout'),
	        'section' => 'latest_post_section',
	    ) );

/* END Front-Page Latest Post Section */	    

/* Start Front-Page call_action Section */

	$wp_customize->add_section( 'call_action_section', array(
		'title'       => __( 'Call To Action Section', 'techabout' ),
		'description' => 'Add/Edit Call To Action Section',
		'panel'  => 'front_page_panel',
	) );

	/* Call To Action Section Display Option */

		$wp_customize->add_setting( 
	        'call_action_section_display_option',
	        array(
	        'default' => true,
	        'sanitize_callback' => 'techabout_sanitize_checkbox',
	        'panel'  => 'front_page_panel',
		) );

		$wp_customize->add_control( 'call_action_section_display_option', array(
	        'type' => 'checkbox',
	        'label' => __('Display Call To Action Section','techabout'),
	        'section' => 'call_action_section',
	    ) );

	/* Call To Action Section Description */

		$wp_customize->add_setting( 'call_action_section_description', array(
			'sanitize_callback' => 'sanitize_text_field',
			'panel'  => 'front_page_panel',
		) );
		$wp_customize->add_control( 'call_action_section_description', array(
			'label'    => __( 'Description: ', 'techabout' ),
			'section'  => 'call_action_section',
			'settings' => 'call_action_section_description',
			'input_attrs' => array(
			'placeholder' => __( 'Call To Action', 'techabout' ))	
		) );
	

	/* Call To Action Section Button Description */

		$wp_customize->add_setting( 'call_action_section_button_description', array(
			'sanitize_callback' => 'sanitize_text_field',
			'panel'  => 'front_page_panel',
		) );
		$wp_customize->add_control( 'call_action_section_button_description', array(
			'label'    => __( 'Button Description: ', 'techabout' ),
			'section'  => 'call_action_section',
			'settings' => 'call_action_section_button_description',
			'input_attrs' => array(
			'placeholder' => __( 'Button', 'techabout' ))	
		) );	

	// Call To Action Section Button link
		$wp_customize->add_setting('call_action_section_button_link', array(
	        'sanitize_callback' => 'esc_url_raw',
			'panel'  => 'front_page_panel',
			'default' => '#',
	    ) );
		$wp_customize->add_control('call_action_section_button_link', array(
	        'label' => __('Button Link URL','techabout'),
	        'section' => 'call_action_section',
	        'type' => 'url',
	    ) );

		/* Call To Action Section Button Color */

			//header background color
			$wp_customize->add_setting('call_action_section_button_color', array(
			'default' => '#2bbbad',
			'sanitize_callback' => 'sanitize_hex_color',
		    ) );
			
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'call_action_section_button_color', array(
				'label'      => __('Button Color', 'techabout' ),
				'section'    => 'call_action_section',
				'settings'   => 'call_action_section_button_color',) 
			) );

		/* Call To Action Section Button Color */		    

/* ---------------- END Front-Page call_action Section ----------------------- */

}

add_action( 'customize_register', 'frontpage_customizer_register' );


// Output Customize CSS
function techabout_customize_css() { ?>

	<style type="text/css">
		
		<?php $img1 = get_template_directory_uri().'/img/tech.jpg'; ?>

		.first-block{	
			background-image: url(<?php echo esc_url(get_theme_mod('welcome_section_image', esc_url($img1) )); ?>);
			background-size: cover;
		}

		.fifth-block{
			background-image: url(<?php echo esc_url(get_theme_mod('fifth_section_image')); ?>);
		}

		.second-block .second-block-content-1 .margin-top-content-1 .btn{
			background-color: <?php echo esc_attr(get_theme_mod('second_section_button_color','#ea9c00')); ?>
		}

		.first-block .button-1{
			background-color: <?php echo esc_attr(get_theme_mod('first_section_button1_color','#933e50')); ?>
		}

		.first-block .button-2{
			background-color: <?php echo esc_attr(get_theme_mod('first_section_button2_color','#d37c30')); ?>
		}

		.seventh-block-content .btn{
			background-color: <?php echo esc_attr(get_theme_mod('call_action_section_button_color','#2bbbad')); ?>
		}

	</style>

<?php }

add_action('wp_head', 'techabout_customize_css');

?>