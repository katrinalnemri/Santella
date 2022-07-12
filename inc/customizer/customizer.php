<?php
/**
 * Theme Customizer
 *
 * @package santella
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function santella_customize_preview_js() {
	wp_enqueue_script( 'santella-customizer', get_template_directory_uri() . '/inc/customizer/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'santella_customize_preview_js' );

// santella customizer settings
add_action( 'customize_register', 'santella_customizer_register' );
function santella_customizer_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'santella_customize_partial_blogname',
			)
		);
		
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'santella_customize_partial_blogdescription',
			)
		);

	}


 /* ---------------------------------------------
	*  1- COLORS.
	* --------------------------------------------- */
 $wp_customize->add_panel( 'santella_colors' , array(
		 'title'      => __( 'Colors', 'santella' ),
		 'priority'   => 1,
 ));

 /* ---------------------------------------------
	*  1. Main Colors.
	* --------------------------------------------- */
 $wp_customize->add_section( 'santella_general' , array(
		 'title'      => __( 'Main Colors', 'santella' ),
		 'priority'   => 1,
		 'panel'      => 'santella_colors',
 ));

 // Body text color.
 $wp_customize->add_setting( 'santella_body_text_color' , array(
		 'default' => '#000000',
		 'sanitize_callback' => 'sanitize_hex_color',
	 'priority' => 1,
 ));
 $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_body_text_color', array(
	 'label'      => __( 'Body Text Color', 'santella' ),
	 'section'    => 'santella_general',
	 'settings'   => 'santella_body_text_color',
	 'description' => __( 'Change the text color.' ),
 )));

 // Body links color.
 $wp_customize->add_setting( 'santella_body_links_color' , array(
		 'default' => '#b2b2f3',
		 'sanitize_callback' => 'sanitize_hex_color',
	 'priority' => 2,
 ));
 $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_body_links_color', array(
	 'label'      => __( 'Body Links Color', 'santella' ),
	 'section'    => 'santella_general',
	 'settings'   => 'santella_body_links_color',
	 'description' => __( 'Change the links color.' ),
 )));

 // Body Links color on hover.
 $wp_customize->add_setting( 'santella_body_links_color_hover' , array(
		 'default' => '#000000',
		 'sanitize_callback' => 'sanitize_hex_color',
	 'priority' => 3,
 ));
 $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_body_links_color_hover', array(
	 'label'      => __( 'Body Links Color on Hover', 'santella' ),
	 'section'    => 'santella_general',
	 'settings'   => 'santella_body_links_color_hover',
	 'description' => __( 'Change the links color on hover.' ),
 )));

 // Body background color.
 $wp_customize->add_setting( 'santella_body_bg' , array(
		 'default' => '#ffffff',
		 'sanitize_callback' => 'sanitize_hex_color',
	 'priority' => 4,
 ));
 $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_body_bg', array(
	 'label'      => __( 'Body Background Color', 'santella' ),
	 'section'    => 'santella_general',
	 'settings'   => 'santella_body_bg',
	 'description' => __( 'Change the background color.' ),
 )));

 // Widget Title.
 $wp_customize->add_setting( 'santella_widget_title_color' , array(
		 'default' => '#000000',
		 'sanitize_callback' => 'sanitize_hex_color',
	 'priority' => 5,
 ));
 $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_widget_title_color', array(
	 'label'      => __( 'Widget Title Color', 'santella' ),
	 'section'    => 'santella_general',
	 'settings'   => 'santella_widget_title_color',
	 'description' => __( 'Change the widget title color.' ),
 )));

 //Scrollbar
 $wp_customize->add_setting( 'santella_scrollbar_bg_color' , array(
		 'default' => '#f7f7f7',
		 'sanitize_callback' => 'sanitize_hex_color',
	 'priority' => 6,
 ));
 $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_scrollbar_bg_color', array(
	 'label'      => __( 'Scrollbar Background Color', 'santella' ),
	 'section'    => 'santella_general',
	 'settings'   => 'santella_scrollbar_bg_color',
	 'description' => __( 'Change the scrollbar background color.' ),
 )));

 $wp_customize->add_setting( 'santella_scrollbar_thumb_color' , array(
		 'default' => '#dddddd',
		 'sanitize_callback' => 'sanitize_hex_color',
	 'priority' => 7,
 ));
 $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_scrollbar_thumb_color', array(
	 'label'      => __( 'Scrollbar Thumb Color', 'santella' ),
	 'section'    => 'santella_general',
	 'settings'   => 'santella_scrollbar_thumb_color',
	 'description' => __( 'Change the scrollbar thumb color.' ),
 )));

 //Selection
 $wp_customize->add_setting( 'santella_selection_color' , array(
		 'default' => '#000000',
		 'sanitize_callback' => 'sanitize_hex_color',
	 'priority' => 8,
 ));
 $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_selection_color', array(
	 'label'      => __( 'Selection Text Color', 'santella' ),
	 'section'    => 'santella_general',
	 'settings'   => 'santella_selection_color',
	 'description' => __( 'Change the selection text color.' ),
 )));

 $wp_customize->add_setting( 'santella_selection_bg' , array(
		 'default' => '#eeeeee',
		 'sanitize_callback' => 'sanitize_hex_color',
	 'priority' => 9,
 ));
 $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_selection_bg', array(
	 'label'      => __( 'Selection Background Color', 'santella' ),
	 'section'    => 'santella_general',
	 'settings'   => 'santella_selection_bg',
	 'description' => __( 'Change the selection background color.' ),
 )));

  //Back to top
  $wp_customize->add_setting( 'santella_btt_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 10,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_btt_color', array(
		'label'      => __( 'Back To Top Color', 'santella' ),
		'section'    => 'santella_general',
		'settings'   => 'santella_btt_color',
		'description' => __( 'Change the back to top button color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_btt_color_hover' , array(
	    'default' => '#b2b2f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 11,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_btt_color_hover', array(
		'label'      => __( 'Back To Top Color on Hover', 'santella' ),
		'section'    => 'santella_general',
		'settings'   => 'santella_btt_color_hover',
		'description' => __( 'Change the back to top button color on hover.' ),
	)));
	
	//Tables
  $wp_customize->add_setting( 'santella_table_border_color' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 12,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_table_border_color', array(
		'label'      => __( 'Table Border Color', 'santella' ),
		'section'    => 'santella_general',
		'settings'   => 'santella_table_border_color',
		'description' => __( 'Change the tables borders color.' ),
	)));
	
	//Blockquote
  $wp_customize->add_setting( 'santella_blockquote_border' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 13,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_blockquote_border', array(
		'label'      => __( 'Blockquote Border Color', 'santella' ),
		'section'    => 'santella_general',
		'settings'   => 'santella_blockquote_border',
		'description' => __( 'Change the blockquote left border color.' ),
	)));
	
	/* ---------------------------------------------
 	 *  2. Input Fields and Buttons.
	 * --------------------------------------------- */
	$wp_customize->add_section( 'santella_fields_buttons' , array(
	    'title'      => __( 'Input Fields and Buttons', 'santella' ),
	    'priority'   => 2,
		'panel'      => 'santella_colors',
	));
	
	// Fields.
	$wp_customize->add_setting( 'santella_fields_border' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 1,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_fields_border', array(
		'label'      => __( 'Fields Border Color', 'santella' ),
		'section'    => 'santella_fields_buttons',
		'settings'   => 'santella_fields_border',
		'description' => __( 'Change the fields border color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_fields_bg' , array(
	    'default' => 'transparent',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 2,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_fields_bg', array(
		'label'      => __( 'Fields Background Color', 'santella' ),
		'section'    => 'santella_fields_buttons',
		'settings'   => 'santella_fields_bg',
		'description' => __( 'Change the fields background color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_fields_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 3,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_fields_color', array(
		'label'      => __( 'Fields Text Color', 'santella' ),
		'section'    => 'santella_fields_buttons',
		'settings'   => 'santella_fields_color',
		'description' => __( 'Change the fields text color.' ),
	)));
	
	// Buttons.
	$wp_customize->add_setting( 'santella_buttons_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 4,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_buttons_color', array(
		'label'      => __( 'Buttons Color', 'santella' ),
		'section'    => 'santella_fields_buttons',
		'settings'   => 'santella_buttons_color',
		'description' => __( 'Change the Buttons color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_buttons_color_hover' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 5,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_buttons_color_hover', array(
		'label'      => __( 'Buttons Color on Hover', 'santella' ),
		'section'    => 'santella_fields_buttons',
		'settings'   => 'santella_buttons_color_hover',
		'description' => __( 'Change the Buttons color on hover.' ),
	)));
	
	$wp_customize->add_setting( 'santella_buttons_bg' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 6,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_buttons_bg', array(
		'label'      => __( 'Buttons Background', 'santella' ),
		'section'    => 'santella_fields_buttons',
		'settings'   => 'santella_buttons_bg',
		'description' => __( 'Change the Buttons Background color.' ),
	)));
	
		$wp_customize->add_setting( 'santella_buttons_bg_hover' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 7,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_buttons_bg_hover', array(
		'label'      => __( 'Buttons Background on Hover', 'santella' ),
		'section'    => 'santella_fields_buttons',
		'settings'   => 'santella_buttons_bg_hover',
		'description' => __( 'Change the Buttons Background background on hover.' ),
	)));

	/* ---------------------------------------------
 	 *  3. Header.
	 * --------------------------------------------- */
	$wp_customize->add_section( 'santella_header_colors' , array(
	    'title'      => __( 'Header', 'santella' ),
	    'priority'   => 3,
		'panel'      => 'santella_colors',
	));
	
	$wp_customize->add_setting( 'santella_header_bg' , array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 1,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_header_bg', array(
		'label'      => __( 'Header Background Color', 'santella' ),
		'section'    => 'santella_header_colors',
		'settings'   => 'santella_header_bg',
		'description' => __( 'Change the header background color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_header_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 2,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_header_color', array(
		'label'      => __( 'Site Title Color', 'santella' ),
		'section'    => 'santella_header_colors',
		'settings'   => 'santella_header_color',
		'description' => __( 'Change the site title color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_description_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 3,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_description_color', array(
		'label'      => __( 'Site Description Color', 'santella' ),
		'section'    => 'santella_header_colors',
		'settings'   => 'santella_description_color',
		'description' => __( 'Change the site description color.' ),
	)));
	
	/* ---------------------------------------------
 	 *  4. Primary Navigation.
	 * --------------------------------------------- */
	$wp_customize->add_section( 'santella_primary_nav_colors' , array(
	    'title'      => __( 'Primary Navigation', 'santella' ),
	    'priority'   => 4,
		'panel'      => 'santella_colors',
	));
	
	$wp_customize->add_setting( 'santella_primary_nav_links_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 1,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_primary_nav_links_color', array(
		'label'      => __( 'Links Color', 'santella' ),
		'section'    => 'santella_primary_nav_colors',
		'settings'   => 'santella_primary_nav_links_color',
		'description' => __( 'Change the primary navigation links color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_primary_nav_links_color_hover' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 2,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_primary_nav_links_color_hover', array(
		'label'      => __( 'Links Color on Hover', 'santella' ),
		'section'    => 'santella_primary_nav_colors',
		'settings'   => 'santella_primary_nav_links_color_hover',
		'description' => __( 'Change the primary navigation links color on hover.' ),
	)));
	
	$wp_customize->add_setting( 'santella_primary_nav_drop_down_bg' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 3,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_primary_nav_drop_down_bg', array(
		'label'      => __( 'Drop Down Background Color', 'santella' ),
		'section'    => 'santella_primary_nav_colors',
		'settings'   => 'santella_primary_nav_drop_down_bg',
		'description' => __( 'Change the primary navigation drop down background color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_primary_nav_drop_down_links' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 4,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_primary_nav_drop_down_links', array(
		'label'      => __( 'Drop Down Links Color', 'santella' ),
		'section'    => 'santella_primary_nav_colors',
		'settings'   => 'santella_primary_nav_drop_down_links',
		'description' => __( 'Change the primary navigation drop down links color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_primary_nav_drop_down_links_hover' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 5,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_primary_nav_drop_down_links_hover', array(
		'label'      => __( 'Drop Down Links Color on Hover', 'santella' ),
		'section'    => 'santella_primary_nav_colors',
		'settings'   => 'santella_primary_nav_drop_down_links_hover',
		'description' => __( 'Change the primary navigation drop down links color on hover.' ),
	)));
	
	/* ---------------------------------------------
 	 *  5. Primary Navigation Social Icons and Search Pop up Feature.
	 * --------------------------------------------- */
	$wp_customize->add_section( 'santella_primary_nav_socials_colors' , array(
	    'title'      => __( 'Primary Navigation Social Icons and Search Pop up Feature', 'santella' ),
	    'priority'   => 5,
		'panel'      => 'santella_colors',
	));
	
	$wp_customize->add_setting( 'santella_primary_nav_social_icons_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 1,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_primary_nav_social_icons_color', array(
		'label'      => __( 'Social Icons Color', 'santella' ),
		'section'    => 'santella_primary_nav_socials_colors',
		'settings'   => 'santella_primary_nav_social_icons_color',
		'description' => __( 'Change the primary navigation social icons color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_primary_nav_social_icons_color_hover' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 2,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_primary_nav_social_icons_color_hover', array(
		'label'      => __( 'Social Icons Color on Hover', 'santella' ),
		'section'    => 'santella_primary_nav_socials_colors',
		'settings'   => 'santella_primary_nav_social_icons_color_hover',
		'description' => __( 'Change the primary navigation social icons color on hover.' ),
	)));
	
	$wp_customize->add_setting( 'santella_primary_nav_search_icon_border' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 3,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_primary_nav_search_icon_border', array(
		'label'      => __( 'Search Icon Left Border color', 'santella' ),
		'section'    => 'santella_primary_nav_socials_colors',
		'settings'   => 'santella_primary_nav_search_icon_border',
		'description' => __( 'Change the primary navigation search icon left border color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_primary_nav_search_bg' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 4,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_primary_nav_search_bg', array(
		'label'      => __( 'Search Pop Up Background color', 'santella' ),
		'section'    => 'santella_primary_nav_socials_colors',
		'settings'   => 'santella_primary_nav_search_bg',
		'description' => __( 'Change the primary navigation search pop up feature background color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_primary_nav_search_form_border' , array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 5,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_primary_nav_search_form_border', array(
		'label'      => __( 'Search Form Bottom Border color', 'santella' ),
		'section'    => 'santella_primary_nav_socials_colors',
		'settings'   => 'santella_primary_nav_search_form_border',
		'description' => __( 'Change the primary navigation search form bottom border color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_primary_nav_search_form_color' , array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 6,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_primary_nav_search_form_color', array(
		'label'      => __( 'Search Form Field Text color', 'santella' ),
		'section'    => 'santella_primary_nav_socials_colors',
		'settings'   => 'santella_primary_nav_search_form_color',
		'description' => __( 'Change the primary navigation search form field text color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_primary_nav_search_form_close' , array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 7,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_primary_nav_search_form_close', array(
		'label'      => __( 'Search Close Button color', 'santella' ),
		'section'    => 'santella_primary_nav_socials_colors',
		'settings'   => 'santella_primary_nav_search_form_close',
		'description' => __( 'Change the primary navigation search close button color.' ),
	)));
	
	/* ---------------------------------------------
 	 *  6. Secondary Navigation.
	 * --------------------------------------------- */
	$wp_customize->add_section( 'santella_secondary_nav_colors' , array(
	    'title'      => __( 'Secondary Navigation', 'santella' ),
	    'priority'   => 6,
		'panel'      => 'santella_colors',
	));
	
	$wp_customize->add_setting( 'santella_secondary_nav_bg' , array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 1,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_secondary_nav_bg', array(
		'label'      => __( 'Background Color', 'santella' ),
		'section'    => 'santella_secondary_nav_colors',
		'settings'   => 'santella_secondary_nav_bg',
		'description' => __( 'Change the secondary navigation background color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_secondary_nav_border' , array(
	    'default' => '#f7f7f7',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 2,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_secondary_nav_border', array(
		'label'      => __( 'Border Color', 'santella' ),
		'section'    => 'santella_secondary_nav_colors',
		'settings'   => 'santella_secondary_nav_border',
		'description' => __( 'Change the secondary navigation border color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_secondary_nav_links_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 3,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_secondary_nav_links_color', array(
		'label'      => __( 'Links Color', 'santella' ),
		'section'    => 'santella_secondary_nav_colors',
		'settings'   => 'santella_secondary_nav_links_color',
		'description' => __( 'Change the secondary navigation links color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_secondary_nav_links_color_hover' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 4,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_secondary_nav_links_color_hover', array(
		'label'      => __( 'Links Color on Hover', 'santella' ),
		'section'    => 'santella_secondary_nav_colors',
		'settings'   => 'santella_secondary_nav_links_color_hover',
		'description' => __( 'Change the secondary navigation links color on hover.' ),
	)));
	
	$wp_customize->add_setting( 'santella_secondary_nav_drop_down_bg' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 5,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_secondary_nav_drop_down_bg', array(
		'label'      => __( 'Drop Down Background Color', 'santella' ),
		'section'    => 'santella_secondary_nav_colors',
		'settings'   => 'santella_secondary_nav_drop_down_bg',
		'description' => __( 'Change the secondary navigation drop down background color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_secondary_nav_drop_down_links' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 6,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_secondary_nav_drop_down_links', array(
		'label'      => __( 'Drop Down Links Color', 'santella' ),
		'section'    => 'santella_secondary_nav_colors',
		'settings'   => 'santella_secondary_nav_drop_down_links',
		'description' => __( 'Change the secondary navigation drop down links color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_secondary_nav_drop_down_links_hover' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 7,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_secondary_nav_drop_down_links_hover', array(
		'label'      => __( 'Drop Down Links Color on Hover', 'santella' ),
		'section'    => 'santella_secondary_nav_colors',
		'settings'   => 'santella_secondary_nav_drop_down_links_hover',
		'description' => __( 'Change the secondary navigation drop down links color on hover.' ),
	)));


	/* ---------------------------------------------
 	 *  7. Slider.
	 * --------------------------------------------- */
	$wp_customize->add_section( 'santella_slider_colors' , array(
	    'title'      => __( 'Slider', 'santella' ),
	    'priority'   => 7,
		'panel'      => 'santella_colors',
	));
	
	$wp_customize->add_setting( 'santella_slider_slide_bg' , array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 1,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_slider_slide_bg', array(
		'label'      => __( 'Slides Background/Overlay color', 'santella' ),
		'section'    => 'santella_slider_colors',
		'settings'   => 'santella_slider_slide_bg',
		'description' => __( 'Change the slides Background/Overlay color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_slider_title' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 2,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_slider_title', array(
		'label'      => __( 'Titles Color', 'santella' ),
		'section'    => 'santella_slider_colors',
		'settings'   => 'santella_slider_title',
		'description' => __( 'Change the titles color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_slider_snippet' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 3,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_slider_snippet', array(
		'label'      => __( 'Snippet Color', 'santella' ),
		'section'    => 'santella_slider_colors',
		'settings'   => 'santella_slider_snippet',
		'description' => __( 'Change the snippet color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_slider_date' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 4,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_slider_date', array(
		'label'      => __( 'Date Color', 'santella' ),
		'section'    => 'santella_slider_colors',
		'settings'   => 'santella_slider_date',
		'description' => __( 'Change the date color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_slider_btn' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 5,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_slider_btn', array(
		'label'      => __( 'Button Color', 'santella' ),
		'section'    => 'santella_slider_colors',
		'settings'   => 'santella_slider_btn',
		'description' => __( 'Change the button color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_slider_btn_bg' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 6,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_slider_btn_bg', array(
		'label'      => __( 'Button Background Color', 'santella' ),
		'section'    => 'santella_slider_colors',
		'settings'   => 'santella_slider_btn_bg',
		'description' => __( 'Change the button background color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_slider_btn_hover' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 7,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_slider_btn_hover', array(
		'label'      => __( 'Button Color on Hover', 'santella' ),
		'section'    => 'santella_slider_colors',
		'settings'   => 'santella_slider_btn_hover',
		'description' => __( 'Change the button color on hover.' ),
	)));
	
	$wp_customize->add_setting( 'santella_slider_btn_bg_hover' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 8,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_slider_btn_bg_hover', array(
		'label'      => __( 'Button Background Color on Hover', 'santella' ),
		'section'    => 'santella_slider_colors',
		'settings'   => 'santella_slider_btn_bg_hover',
		'description' => __( 'Change the button background color on hover.' ),
	)));
	
	$wp_customize->add_setting( 'santella_slider_arrows' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 9,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_slider_arrows', array(
		'label'      => __( 'Arrows Color', 'santella' ),
		'section'    => 'santella_slider_colors',
		'settings'   => 'santella_slider_arrows',
		'description' => __( 'Change the arrows color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_slider_arrows_bg' , array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 10,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_slider_arrows_bg', array(
		'label'      => __( 'Arrows Background Color', 'santella' ),
		'section'    => 'santella_slider_colors',
		'settings'   => 'santella_slider_arrows_bg',
		'description' => __( 'Change the arrows background color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_slider_dots' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 11,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_slider_dots', array(
		'label'      => __( 'Dots Color', 'santella' ),
		'section'    => 'santella_slider_colors',
		'settings'   => 'santella_slider_dots',
		'description' => __( 'Change the dots color.' ),
	)));
	
	/* ---------------------------------------------
 	 *  8. Columns Sections.
	 * --------------------------------------------- */
	$wp_customize->add_section( 'santella_cols_colors' , array(
	    'title'      => __( 'Columns Sections', 'santella' ),
	    'priority'   => 8,
		'panel'      => 'santella_colors',
	));
	
	$wp_customize->add_setting( 'santella_home_cols_bg' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 1,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_home_cols_bg', array(
		'label'      => __( 'Homepage Columns Section Background Color', 'santella' ),
		'section'    => 'santella_cols_colors',
		'settings'   => 'santella_home_cols_bg',
		'description' => __( 'Change the homepage columns section background color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_home_cols_img_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 2,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_home_cols_img_color', array(
		'label'      => __( 'Homepage Columns Images Text Color', 'santella' ),
		'section'    => 'santella_cols_colors',
		'settings'   => 'santella_home_cols_img_color',
		'description' => __( 'Change the homepage columns images text color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_home_cols_img_text_shadow' , array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 3,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_home_cols_img_text_shadow', array(
		'label'      => __( 'Homepage Columns Images Text Shadow Color', 'santella' ),
		'section'    => 'santella_cols_colors',
		'settings'   => 'santella_home_cols_text_shadow',
		'description' => __( 'Change the homepage columns images text shadow color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_footer_cols_bg' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 4,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_footer_cols_bg', array(
		'label'      => __( 'Footer Columns Section Background Color', 'santella' ),
		'section'    => 'santella_cols_colors',
		'settings'   => 'santella_footer_cols_bg',
		'description' => __( 'Change the footer columns section background color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_footer_cols_border' , array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 5,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_footer_cols_border', array(
		'label'      => __( 'Footer Columns Section Bottom Border Color', 'santella' ),
		'section'    => 'santella_cols_colors',
		'settings'   => 'santella_footer_cols_border',
		'description' => __( 'Change the footer columns section bottom border color.' ),
	)));
	
	/* ---------------------------------------------
 	 *  9. Profile widget (Full-width).
	 * --------------------------------------------- */
	$wp_customize->add_section( 'santella_bfd_profile_widget_colors' , array(
	    'title'      => __( 'Profile widget (Full-width).', 'santella' ),
	    'priority'   => 9,
		'panel'      => 'santella_colors',
	));
	
	$wp_customize->add_setting( 'santella_bfd_profile_widget_img_overlay' , array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 1,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_bfd_profile_widget_img_overlay', array(
		'label'      => __( 'Image Overlay Color on Hover', 'santella' ),
		'section'    => 'santella_bfd_profile_widget_colors',
		'settings'   => 'santella_bfd_profile_widget_img_overlay',
		'description' => __( 'Change the image overlay color on hover.' ),
	)));
	
	$wp_customize->add_setting( 'santella_bfd_profile_widget_img_bg' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 2,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_bfd_profile_widget_img_bg', array(
		'label'      => __( 'Image Background Color', 'santella' ),
		'section'    => 'santella_bfd_profile_widget_colors',
		'settings'   => 'santella_bfd_profile_widget_img_bg',
		'description' => __( 'Change the image background color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_bfd_profile_widget_content_bg' , array(
	    'default' => '#fefbff',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 3,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_bfd_profile_widget_content_bg', array(
		'label'      => __( 'Content Background Color', 'santella' ),
		'section'    => 'santella_bfd_profile_widget_colors',
		'settings'   => 'santella_bfd_profile_widget_content_bg',
		'description' => __( 'Change the content background color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_bfd_profile_widget_img_border' , array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 4,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_bfd_profile_widget_img_border', array(
		'label'      => __( 'Image Border Color', 'santella' ),
		'section'    => 'santella_bfd_profile_widget_colors',
		'settings'   => 'santella_bfd_profile_widget_img_border',
		'description' => __( 'Change the image border color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_bfd_profile_widget_heading_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 5,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_bfd_profile_widget_heading_color', array(
		'label'      => __( 'Heading Color', 'santella' ),
		'section'    => 'santella_bfd_profile_widget_colors',
		'settings'   => 'santella_bfd_profile_widget_heading_color',
		'description' => __( 'Change the heading color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_bfd_profile_widget_text_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 6,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_bfd_profile_widget_text_color', array(
		'label'      => __( 'Text Color', 'santella' ),
		'section'    => 'santella_bfd_profile_widget_colors',
		'settings'   => 'santella_bfd_profile_widget_text_color',
		'description' => __( 'Change the text color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_bfd_profile_widget_btn_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 7,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_bfd_profile_widget_btn_color', array(
		'label'      => __( 'Button Color', 'santella' ),
		'section'    => 'santella_bfd_profile_widget_colors',
		'settings'   => 'santella_bfd_profile_widget_btn_color',
		'description' => __( 'Change the button color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_bfd_profile_widget_btn_bg' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 8,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_bfd_profile_widget_btn_bg', array(
		'label'      => __( 'Button Background Color', 'santella' ),
		'section'    => 'santella_bfd_profile_widget_colors',
		'settings'   => 'santella_bfd_profile_widget_btn_bg',
		'description' => __( 'Change the button background color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_bfd_profile_widget_btn_color_hover' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 9,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_bfd_profile_widget_btn_color_hover', array(
		'label'      => __( 'Button Color on Hover', 'santella' ),
		'section'    => 'santella_bfd_profile_widget_colors',
		'settings'   => 'santella_bfd_profile_widget_btn_color_hover',
		'description' => __( 'Change the button color on hover.' ),
	)));
	
	$wp_customize->add_setting( 'santella_bfd_profile_widget_btn_bg_hover' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 10,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_bfd_profile_widget_btn_bg_hover', array(
		'label'      => __( 'Button Background Color on Hover', 'santella' ),
		'section'    => 'santella_bfd_profile_widget_colors',
		'settings'   => 'santella_bfd_profile_widget_btn_bg_hover',
		'description' => __( 'Change the button background color on hover.' ),
	)));
	
	/* ---------------------------------------------
 	 *  10. Genesis eNews form.
	 * --------------------------------------------- */
	$wp_customize->add_section( 'santella_enews_colors' , array(
	    'title'      => __( 'Genesis eNews form.', 'santella' ),
	    'priority'   => 10,
		'panel'      => 'santella_colors',
	));
	
	$wp_customize->add_setting( 'santella_enews_bg' , array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 1,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_enews_bg', array(
		'label'      => __( 'Background Color (does NOT apply if the widget is in the sidebar area)', 'santella' ),
		'section'    => 'santella_enews_colors',
		'settings'   => 'santella_enews_bg',
		'description' => __( 'Change the background color (does NOT apply if the widget is in the sidebar area).' ),
	)));
	
	$wp_customize->add_setting( 'santella_enews_field_border' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 2,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_enews_field_border', array(
		'label'      => __( 'Field Border Color', 'santella' ),
		'section'    => 'santella_enews_colors',
		'settings'   => 'santella_enews_field_border',
		'description' => __( 'Change the field border color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_enews_heading_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 3,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_enews_heading_color', array(
		'label'      => __( 'Heading and Subheading Color', 'santella' ),
		'section'    => 'santella_enews_colors',
		'settings'   => 'santella_enews_heading_color',
		'description' => __( 'Change the heading and the subheading color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_enews_btn_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 4,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_enews_btn_color', array(
		'label'      => __( 'Button Color', 'santella' ),
		'section'    => 'santella_enews_colors',
		'settings'   => 'santella_enews_btn_color',
		'description' => __( 'Change the button color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_enews_btn_bg' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 5,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_enews_btn_bg', array(
		'label'      => __( 'Button Background Color', 'santella' ),
		'section'    => 'santella_enews_colors',
		'settings'   => 'santella_enews_btn_bg',
		'description' => __( 'Change the button background color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_enews_btn_color_hover' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 6,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_enews_btn_color_hover', array(
		'label'      => __( 'Button Color on Hover', 'santella' ),
		'section'    => 'santella_enews_colors',
		'settings'   => 'santella_enews_btn_color_hover',
		'description' => __( 'Change the button color on hover.' ),
	)));
	
	$wp_customize->add_setting( 'santella_enews_btn_bg_hover' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 7,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_enews_btn_bg_hover', array(
		'label'      => __( 'Button Background Color on Hover', 'santella' ),
		'section'    => 'santella_enews_colors',
		'settings'   => 'santella_enews_btn_bg_hover',
		'description' => __( 'Change the button background color on hover.' ),
	)));
	
	/* ---------------------------------------------
 	 *  11. Content Area.
	 * --------------------------------------------- */
	$wp_customize->add_section( 'santella_content_area_colors' , array(
	    'title'      => __( 'Content Area.', 'santella' ),
	    'priority'   => 11,
		'panel'      => 'santella_colors',
	));
	
	$wp_customize->add_setting( 'santella_entry_title' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 1,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_entry_title', array(
		'label'      => __( 'Entry Title Color', 'santella' ),
		'section'    => 'santella_content_area_colors',
		'settings'   => 'santella_entry_title',
		'description' => __( 'Change the entry title color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_entry_meta' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 2,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_entry_meta', array(
		'label'      => __( 'Entry Meta Text Color', 'santella' ),
		'section'    => 'santella_content_area_colors',
		'settings'   => 'santella_entry_meta',
		'description' => __( 'Change the entry meta text color (post date and post author name).' ),
	)));
	
	$wp_customize->add_setting( 'santella_entry_meta_line' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 3,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_entry_meta_line', array(
		'label'      => __( 'Entry Meta Bottom Line Color', 'santella' ),
		'section'    => 'santella_content_area_colors',
		'settings'   => 'santella_entry_meta_line',
		'description' => __( 'Change the entry meta bottom line color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_entry_footer' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 4,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_entry_footer', array(
		'label'      => __( 'Entry Footer Color', 'santella' ),
		'section'    => 'santella_content_area_colors',
		'settings'   => 'santella_entry_footer',
		'description' => __( 'Change the entry footer color (Tags, Categories and Share buttons).' ),
	)));
	
	$wp_customize->add_setting( 'santella_entry_links_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 5,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_entry_links_color', array(
		'label'      => __( 'Entry Links Color', 'santella' ),
		'section'    => 'santella_content_area_colors',
		'settings'   => 'santella_entry_links_color',
		'description' => __( 'Change the entry links color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_entry_links_bg' , array(
	    'default' => '#cdd1ed',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 6,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_entry_links_bg', array(
		'label'      => __( 'Entry Links Background Color', 'santella' ),
		'section'    => 'santella_content_area_colors',
		'settings'   => 'santella_entry_links_bg',
		'description' => __( 'Change the entry links background color.' ),
	)));
	
	/* ---------------------------------------------
 	 *  12. Related Posts.
	 * --------------------------------------------- */
	$wp_customize->add_section( 'santella_related_posts_colors' , array(
	    'title'      => __( 'Related Posts.', 'santella' ),
	    'priority'   => 12,
		'panel'      => 'santella_colors',
	));
	
	$wp_customize->add_setting( 'santella_related_heading' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 1,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_related_heading', array(
		'label'      => __( 'Heading Color', 'santella' ),
		'section'    => 'santella_related_posts_colors',
		'settings'   => 'santella_related_heading',
		'description' => __( 'Change the heading color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_related_titles' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 2,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_related_titles', array(
		'label'      => __( 'Post Titles Color', 'santella' ),
		'section'    => 'santella_related_posts_colors',
		'settings'   => 'santella_related_titles',
		'description' => __( 'Change the post titles color.' ),
	)));
	
	/* ---------------------------------------------
 	 *  13. Post Pager.
	 * --------------------------------------------- */
	$wp_customize->add_section( 'santella_post_pager_colors' , array(
	    'title'      => __( 'Post Pager.', 'santella' ),
	    'priority'   => 13,
		'panel'      => 'santella_colors',
	));
	
	$wp_customize->add_setting( 'santella_post_pager_direction' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 1,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_post_pager_direction', array(
		'label'      => __( 'Directions Color', 'santella' ),
		'section'    => 'santella_post_pager_colors',
		'settings'   => 'santella_post_pager_direction',
		'description' => __( 'Change the directions text color (Next Post/Previous post).' ),
	)));
	
	$wp_customize->add_setting( 'santella_post_pager_titles' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 2,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_post_pager_titles', array(
		'label'      => __( 'Titles Color', 'santella' ),
		'section'    => 'santella_post_pager_colors',
		'settings'   => 'santella_post_pager_titles',
		'description' => __( 'Change the titles color.' ),
	)));
	
	/* ---------------------------------------------
 	 *  14. Entry Comments.
	 * --------------------------------------------- */
	$wp_customize->add_section( 'santella_entry_comments_colors' , array(
	    'title'      => __( 'Entry Comments.', 'santella' ),
	    'priority'   => 14,
		'panel'      => 'santella_colors',
	));
	
	$wp_customize->add_setting( 'santella_comment_headings' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 1,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_comment_headings', array(
		'label'      => __( 'Headings Color', 'santella' ),
		'section'    => 'santella_entry_comments_colors',
		'settings'   => 'santella_comment_headings',
		'description' => __( 'Change the headings color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_comment_links' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 2,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_comment_links', array(
		'label'      => __( 'Links Color', 'santella' ),
		'section'    => 'santella_entry_comments_colors',
		'settings'   => 'santella_comment_links',
		'description' => __( 'Change the links color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_comment_reply' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 3,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_comment_reply', array(
		'label'      => __( 'Reply Button Color', 'santella' ),
		'section'    => 'santella_entry_comments_colors',
		'settings'   => 'santella_comment_reply',
		'description' => __( 'Change the reply button color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_comment_reply_bg' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 4,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_comment_reply_bg', array(
		'label'      => __( 'Reply Button Background Color', 'santella' ),
		'section'    => 'santella_entry_comments_colors',
		'settings'   => 'santella_comment_reply_bg',
		'description' => __( 'Change the reply button background color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_comment_reply_hover' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 5,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_comment_reply_hover', array(
		'label'      => __( 'Reply Button Color on Hover', 'santella' ),
		'section'    => 'santella_entry_comments_colors',
		'settings'   => 'santella_comment_reply_hover',
		'description' => __( 'Change the reply button color on hover.' ),
	)));
	
	$wp_customize->add_setting( 'santella_comment_reply_bg_hover' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 6,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_comment_reply_bg_hover', array(
		'label'      => __( 'Reply Button Background Color on Hover', 'santella' ),
		'section'    => 'santella_entry_comments_colors',
		'settings'   => 'santella_comment_reply_bg_hover',
		'description' => __( 'Change the reply button background color on hover.' ),
	)));
	
	/* ---------------------------------------------
 	 *  15. Pagination.
	 * --------------------------------------------- */
	$wp_customize->add_section( 'santella_pagination_colors' , array(
	    'title'      => __( 'Pagination.', 'santella' ),
	    'priority'   => 15,
		'panel'      => 'santella_colors',
	));
	
	$wp_customize->add_setting( 'santella_pagination_btn_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 1,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_pagination_btn_color', array(
		'label'      => __( 'Buttons Pagination Button color', 'santella' ),
		'section'    => 'santella_pagination_colors',
		'settings'   => 'santella_pagination_btn_color',
		'description' => __( 'Change the button color on the buttons styled pagination.' ),
	)));
	
	$wp_customize->add_setting( 'santella_pagination_btn_bg' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 2,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_pagination_btn_bg', array(
		'label'      => __( 'Buttons Pagination Button Background color', 'santella' ),
		'section'    => 'santella_pagination_colors',
		'settings'   => 'santella_pagination_btn_bg',
		'description' => __( 'Change the button background color on the buttons styled pagination.' ),
	)));
	
	$wp_customize->add_setting( 'santella_pagination_btn_color_hover' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 3,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_pagination_btn_color_hover', array(
		'label'      => __( 'Buttons Pagination Button color on Hover', 'santella' ),
		'section'    => 'santella_pagination_colors',
		'settings'   => 'santella_pagination_btn_color_hover',
		'description' => __( 'Change the button hover color on the buttons styled pagination.' ),
	)));
	
	$wp_customize->add_setting( 'santella_pagination_btn_bg_hover' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 4,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_pagination_btn_bg_hover', array(
		'label'      => __( 'Buttons Pagination Button Background color on Hover', 'santella' ),
		'section'    => 'santella_pagination_colors',
		'settings'   => 'santella_pagination_btn_bg_hover',
		'description' => __( 'Change the button background hover color on the buttons styled pagination.' ),
	)));
	
	$wp_customize->add_setting( 'santella_pagination_numeric_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 5,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_pagination_numeric_color', array(
		'label'      => __( 'Numeric Pagination Button Color', 'santella' ),
		'section'    => 'santella_pagination_colors',
		'settings'   => 'santella_pagination_numeric_color',
		'description' => __( 'Change the button color on the numeric styled pagination.' ),
	)));
	
	$wp_customize->add_setting( 'santella_pagination_numeric_bg' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 6,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_pagination_numeric_bg', array(
		'label'      => __( 'Numeric Pagination Button Background color', 'santella' ),
		'section'    => 'santella_pagination_colors',
		'settings'   => 'santella_pagination_numeric_bg',
		'description' => __( 'Change the button background color on the numeric styled pagination.' ),
	)));
	
	$wp_customize->add_setting( 'santella_pagination_numeric_color_hover' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 7,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_pagination_numeric_color_hover', array(
		'label'      => __( 'Numeric Pagination Button Color on Hover', 'santella' ),
		'section'    => 'santella_pagination_colors',
		'settings'   => 'santella_pagination_numeric_color_hover',
		'description' => __( 'Change the button hover color/active button on the numeric styled pagination.' ),
	)));
	
	$wp_customize->add_setting( 'santella_pagination_numeric_bg_hover' , array(
	    'default' => '#cfd3ed',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 8,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_pagination_numeric_bg_hover', array(
		'label'      => __( 'Numeric Pagination Button Background color on Hover/Active Button', 'santella' ),
		'section'    => 'santella_pagination_colors',
		'settings'   => 'santella_pagination_numeric_bg_hover',
		'description' => __( 'Change the button background color on hover/active button on the numeric styled pagination.' ),
	)));
	
	/* ---------------------------------------------
 	 *  16. Thumbnails Layout.
	 * --------------------------------------------- */
	$wp_customize->add_section( 'santella_thumbnails_colors' , array(
	    'title'      => __( 'Thumbnails Layout.', 'santella' ),
	    'priority'   => 16,
		'panel'      => 'santella_colors',
	));
	
	$wp_customize->add_setting( 'santella_thumbnails_title_bg' , array(
	    'default' => '#fefbff',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 1,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_thumbnails_title_bg', array(
		'label'      => __( 'Date and Title Background color', 'santella' ),
		'section'    => 'santella_thumbnails_colors',
		'settings'   => 'santella_thumbnails_title_bg',
		'description' => __( 'Change the background color of the date and the title.' ),
	)));
	
	$wp_customize->add_setting( 'santella_thumbnails_date_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 2,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_thumbnails_date_color', array(
		'label'      => __( 'Post Date color', 'santella' ),
		'section'    => 'santella_thumbnails_colors',
		'settings'   => 'santella_thumbnails_date_color',
		'description' => __( 'Change the post date color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_thumbnails_title_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 3,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_thumbnails_title_color', array(
		'label'      => __( 'Post Title Color', 'santella' ),
		'section'    => 'santella_thumbnails_colors',
		'settings'   => 'santella_thumbnails_title_color',
		'description' => __( 'Change the post title color.' ),
	)));
	
	/* ---------------------------------------------
 	 *  17. Featured Posts Widget.
	 * --------------------------------------------- */
	$wp_customize->add_section( 'santella_featured_posts_widget_colors' , array(
	    'title'      => __( 'Featured Posts Widget.', 'santella' ),
	    'priority'   => 17,
		'panel'      => 'santella_colors',
	));
	
	$wp_customize->add_setting( 'santella_featured_posts_heading_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 1,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_featured_posts_heading_color', array(
		'label'      => __( 'Widget Heading Color', 'santella' ),
		'section'    => 'santella_featured_posts_widget_colors',
		'settings'   => 'santella_featured_posts_heading_color',
		'description' => __( 'Change the widget heading color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_featured_posts_heading_shadow' , array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 2,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_featured_posts_heading_shadow', array(
		'label'      => __( 'Widget Heading Text Shadow Color', 'santella' ),
		'section'    => 'santella_featured_posts_widget_colors',
		'settings'   => 'santella_featured_posts_heading_shadow',
		'description' => __( 'Change the widget heading text shadow color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_featured_posts_heading_bg' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 3,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_featured_posts_heading_bg', array(
		'label'      => __( 'Widget Heading Background Color', 'santella' ),
		'section'    => 'santella_featured_posts_widget_colors',
		'settings'   => 'santella_featured_posts_heading_bg',
		'description' => __( 'Change the widget heading background color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_featured_posts_title_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 4,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_featured_posts_title_color', array(
		'label'      => __( 'Post Title Color', 'santella' ),
		'section'    => 'santella_featured_posts_widget_colors',
		'settings'   => 'santella_featured_posts_title_color',
		'description' => __( 'Change the post title color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_featured_posts_btn_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 5,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_featured_posts_btn_color', array(
		'label'      => __( 'Button Color ("More from this category")', 'santella' ),
		'section'    => 'santella_featured_posts_widget_colors',
		'settings'   => 'santella_featured_posts_btn_color',
		'description' => __( 'Change the ("More from this category") link color.' ),
	)));
	
	/* ---------------------------------------------
 	 *  18. Social Icons and Popular Posts.
	 * --------------------------------------------- */
	$wp_customize->add_section( 'santella_popular_posts_colors' , array(
	    'title'      => __( 'Social Icons and Popular Posts.', 'santella' ),
	    'priority'   => 18,
		'panel'      => 'santella_colors',
	));
	
	$wp_customize->add_setting( 'santella_popular_posts_title' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 1,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_popular_posts_title', array(
		'label'      => __( 'Popular Posts Post Title Color', 'santella' ),
		'section'    => 'santella_popular_posts_colors',
		'settings'   => 'santella_popular_posts_title',
		'description' => __( 'Change the popular posts post title color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_popular_posts_title_hover' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 2,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_popular_posts_title_hover', array(
		'label'      => __( 'Popular Posts Post Title Color on Hover', 'santella' ),
		'section'    => 'santella_popular_posts_colors',
		'settings'   => 'santella_popular_posts_title_hover',
		'description' => __( 'Change the popular posts post title color on hover.' ),
	)));
	
	$wp_customize->add_setting( 'santella_social_icons_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 3,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_social_icons_color', array(
		'label'      => __( 'Social Icons Color', 'santella' ),
		'section'    => 'santella_popular_posts_colors',
		'settings'   => 'santella_social_icons_color',
		'description' => __( 'Change the social icons color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_social_icons_color_hover' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 4,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_social_icons_color_hover', array(
		'label'      => __( 'Social Icons Color on Hover', 'santella' ),
		'section'    => 'santella_popular_posts_colors',
		'settings'   => 'santella_social_icons_color_hover',
		'description' => __( 'Change the social icons color on hover.' ),
	)));
	
	/* ---------------------------------------------
 	 *  19. Navigation menu, Archive and Categories Widgets.
	 * --------------------------------------------- */
	$wp_customize->add_section( 'santella_archive_cat_widget_colors' , array(
	    'title'      => __( 'Navigation menu, Archive and Categories Widgets.', 'santella' ),
	    'priority'   => 19,
		'panel'      => 'santella_colors',
	));
	
	$wp_customize->add_setting( 'santella_archive_cat_bg' , array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 1,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_archive_cat_bg', array(
		'label'      => __( 'Drop Down Background Color', 'santella' ),
		'section'    => 'santella_archive_cat_widget_colors',
		'settings'   => 'santella_archive_cat_bg',
		'description' => __( 'Change the background color (drop down style).' ),
	)));
	
	$wp_customize->add_setting( 'santella_archive_cat_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 2,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_archive_cat_color', array(
		'label'      => __( 'Text Color', 'santella' ),
		'section'    => 'santella_archive_cat_widget_colors',
		'settings'   => 'santella_archive_cat_color',
		'description' => __( 'Change the text color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_archive_cat_color_hover' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 3,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_archive_cat_color_hover', array(
		'label'      => __( 'Text(Links) Color on Hover', 'santella' ),
		'section'    => 'santella_archive_cat_widget_colors',
		'settings'   => 'santella_archive_cat_color_hover',
		'description' => __( 'Change the text(links) color on hover (Does NOT apply to drop down style).' ),
	)));
	
	$wp_customize->add_setting( 'santella_nav_menu_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 4,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_nav_menu_color', array(
		'label'      => __( 'Navigation Menu Widget Links Color', 'santella' ),
		'section'    => 'santella_archive_cat_widget_colors',
		'settings'   => 'santella_nav_menu_color',
		'description' => __( 'Change the navigation menu widget links color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_nav_menu_color_hover' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 5,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_nav_menu_color_hover', array(
		'label'      => __( 'Navigation Menu Widget Links Color on Hover', 'santella' ),
		'section'    => 'santella_archive_cat_widget_colors',
		'settings'   => 'santella_nav_menu_color_hover',
		'description' => __( 'Change the navigation menu widget links color on hover.' ),
	)));
	
	/* ---------------------------------------------
 	 *  20. Instagram Feed.
	 * --------------------------------------------- */
	$wp_customize->add_section( 'santella_instagram_colors' , array(
	    'title'      => __( 'Instagram Feed.', 'santella' ),
	    'priority'   => 20,
		'panel'      => 'santella_colors',
	));
	
	$wp_customize->add_setting( 'santella_insta_feed_btn_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 1,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_insta_feed_btn_color', array(
		'label'      => __( 'Instagram Feed Button Color', 'santella' ),
		'section'    => 'santella_instagram_colors',
		'settings'   => 'santella_insta_feed_btn_color',
		'description' => __( 'Change the instagram feed button color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_insta_feed_btn_bg' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 2,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_insta_feed_btn_bg', array(
		'label'      => __( 'Instagram Feed Button Background Color', 'santella' ),
		'section'    => 'santella_instagram_colors',
		'settings'   => 'santella_insta_feed_btn_bg',
		'description' => __( 'Change the instagram feed button background color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_insta_feed_btn_color_hover' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 3,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_insta_feed_btn_color_hover', array(
		'label'      => __( 'Instagram Feed Button Color on Hover', 'santella' ),
		'section'    => 'santella_instagram_colors',
		'settings'   => 'santella_insta_feed_btn_color_hover',
		'description' => __( 'Change the instagram feed button color on hover.' ),
	)));
	
	$wp_customize->add_setting( 'santella_insta_feed_btn_bg_hover' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 4,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_insta_feed_btn_bg_hover', array(
		'label'      => __( 'Instagram Feed Button Background Color on Hover', 'santella' ),
		'section'    => 'santella_instagram_colors',
		'settings'   => 'santella_insta_feed_btn_bg_hover',
		'description' => __( 'Change the instagram feed button background color on hover.' ),
	)));
	
	/* ---------------------------------------------
 	 *  21. Instagram Page Template.
	 * --------------------------------------------- */
	$wp_customize->add_section( 'santella_instagram_page_colors' , array(
	    'title'      => __( 'Instagram Page Template.', 'santella' ),
	    'priority'   => 21,
		'panel'      => 'santella_colors',
	));
	
	$wp_customize->add_setting( 'santella_insta_page_bg' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 1,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_insta_page_bg', array(
		'label'      => __( 'Body Background Color', 'santella' ),
		'section'    => 'santella_instagram_page_colors',
		'settings'   => 'santella_insta_page_bg',
		'description' => __( 'Change the body background color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_insta_page_nav_links_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 2,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_insta_page_nav_links_color', array(
		'label'      => __( 'Navigation Menu Widget Links Color', 'santella' ),
		'section'    => 'santella_instagram_page_colors',
		'settings'   => 'santella_insta_page_nav_links_color',
		'description' => __( 'Change the navigation menu widget links color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_insta_page_nav_links_bg' , array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 3,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_insta_page_nav_links_bg', array(
		'label'      => __( 'Navigation Menu Widget Links Background Color', 'santella' ),
		'section'    => 'santella_instagram_page_colors',
		'settings'   => 'santella_insta_page_nav_links_bg',
		'description' => __( 'Change the navigation menu widget links background color.' ),
	)));
	
	/* ---------------------------------------------
 	 *  22. WooCommerce.
	 * --------------------------------------------- */
	$wp_customize->add_section( 'santella_woocommerce_colors' , array(
	    'title'      => __( 'WooCommerce.', 'santella' ),
	    'priority'   => 22,
		'panel'      => 'santella_colors',
	));
	
	$wp_customize->add_setting( 'santella_woo_notice_bg' , array(
	    'default' => '#fefbff',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 1,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_woo_notice_bg', array(
		'label'      => __( 'Store Notice Background Color', 'santella' ),
		'section'    => 'santella_woocommerce_colors',
		'settings'   => 'santella_woo_notice_bg',
		'description' => __( 'Change the store notice background color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_woo_notice_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 2,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_woo_notice_color', array(
		'label'      => __( 'Store Notice Text Color', 'santella' ),
		'section'    => 'santella_woocommerce_colors',
		'settings'   => 'santella_woo_notice_color',
		'description' => __( 'Change the store notice text color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_woo_notice_btn_bg' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 3,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_woo_notice_btn_bg', array(
		'label'      => __( 'Store Notice Button Background Color', 'santella' ),
		'section'    => 'santella_woocommerce_colors',
		'settings'   => 'santella_woo_notice_btn_bg',
		'description' => __( 'Change the store notice dismiss button background color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_woo_notice_btn_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 4,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_woo_notice_btn_color', array(
		'label'      => __( 'Store Notice Button Text Color', 'santella' ),
		'section'    => 'santella_woocommerce_colors',
		'settings'   => 'santella_woo_notice_btn_color',
		'description' => __( 'Change the store notice dismiss button text color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_woo_product_title_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 5,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_woo_product_title_color', array(
		'label'      => __( 'Product Title Color', 'santella' ),
		'section'    => 'santella_woocommerce_colors',
		'settings'   => 'santella_woo_product_title_color',
		'description' => __( 'Change the product title color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_woo_product_price_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 6,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_woo_product_price_color', array(
		'label'      => __( 'Product Price Color', 'santella' ),
		'section'    => 'santella_woocommerce_colors',
		'settings'   => 'santella_woo_product_price_color',
		'description' => __( 'Change the product price color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_woo_my_acc_nav_bg' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 7,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_woo_my_acc_nav_bg', array(
		'label'      => __( '"My Account" Navigation Background Color', 'santella' ),
		'section'    => 'santella_woocommerce_colors',
		'settings'   => 'santella_woo_my_acc_nav_bg',
		'description' => __( 'Change the background color of the navigation on the "My Account" page.' ),
	)));
	
	$wp_customize->add_setting( 'santella_woo_my_acc_nav_links' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 8,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_woo_my_acc_nav_links', array(
		'label'      => __( '"My Account" Navigation Links Color', 'santella' ),
		'section'    => 'santella_woocommerce_colors',
		'settings'   => 'santella_woo_my_acc_nav_links',
		'description' => __( 'Change the links(tabs) color of the navigation on the "My Account" page.' ),
	)));
	
	$wp_customize->add_setting( 'santella_woo_product_cats_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 9,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_woo_product_cats_color', array(
		'label'      => __( 'Product Categories and Tags Link Color', 'santella' ),
		'section'    => 'santella_woocommerce_colors',
		'settings'   => 'santella_woo_product_cats_color',
		'description' => __( 'Change the categories and tags link color on the single product pages.' ),
	)));
	
	$wp_customize->add_setting( 'santella_woo_product_tabs_border' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 10,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_woo_product_tabs_border', array(
		'label'      => __( 'Product Tabs Bottom Border Color', 'santella' ),
		'section'    => 'santella_woocommerce_colors',
		'settings'   => 'santella_woo_product_tabs_border',
		'description' => __( 'Change the description/reviews tabs bottom border color on the single product pages.' ),
	)));
	
	$wp_customize->add_setting( 'santella_woo_product_tabs_active_bg' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 11,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_woo_product_tabs_active_bg', array(
		'label'      => __( 'Product Tabs Active and Hover Background Color', 'santella' ),
		'section'    => 'santella_woocommerce_colors',
		'settings'   => 'santella_woo_product_tabs_active_bg',
		'description' => __( 'Change the description/reviews tabs active and hover background color on the single product pages.' ),
	)));
	
	$wp_customize->add_setting( 'santella_woo_product_tabs_active_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 12,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_woo_product_tabs_active_color', array(
		'label'      => __( 'Product Tabs Active and Hover Text Color', 'santella' ),
		'section'    => 'santella_woocommerce_colors',
		'settings'   => 'santella_woo_product_tabs_active_color',
		'description' => __( 'Change the description/reviews tabs active and hover text color on the single product pages.' ),
	)));
	
	$wp_customize->add_setting( 'santella_woo_product_tabs_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 13,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_woo_product_tabs_color', array(
		'label'      => __( 'Product Inactive Tabs Text Color', 'santella' ),
		'section'    => 'santella_woocommerce_colors',
		'settings'   => 'santella_woo_product_tabs_color',
		'description' => __( 'Change the description/reviews inactive tabs text color on the single product pages.' ),
	)));
	
	/* ---------------------------------------------
 	 *  23. FAQs.
	 * --------------------------------------------- */
	$wp_customize->add_section( 'santella_faq_colors' , array(
	    'title'      => __( 'FAQs.', 'santella' ),
	    'priority'   => 23,
		'panel'      => 'santella_colors',
	));
	
	$wp_customize->add_setting( 'santella_faq_question_bg' , array(
	    'default' => '#f3f3f3',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 1,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_faq_question_bg', array(
		'label'      => __( 'Faq Question Background Color', 'santella' ),
		'section'    => 'santella_faq_colors',
		'settings'   => 'santella_faq_question_bg',
		'description' => __( 'Change the faq question background color.' ),
	)));
	
	$wp_customize->add_setting( 'santella_faq_question_color' , array(
	    'default' => '#000000',
	    'sanitize_callback' => 'sanitize_hex_color',
		'priority' => 2,
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'santella_faq_question_color', array(
		'label'      => __( 'Faq Question Text Color', 'santella' ),
		'section'    => 'santella_faq_colors',
		'settings'   => 'santella_faq_question_color',
		'description' => __( 'Change the faq question text color.' ),
	)));
	
	/* ---------------------------------------------
	 *  1. Theme settings.
	 * --------------------------------------------- */

		$wp_customize->add_panel( 'santella_theme_settings' , array(
		    'title'      => __( 'Theme Settings', 'santella' ),
		    'priority'   => 20,
			'capability'     => 'edit_theme_options',
		));
	
	/* ------------------------
	 *  1 Widths
	 * ---------------------------- */
		$wp_customize->add_section( 'santella_widths' , array(
		    'title'      => __( 'Widths', 'santella' ),
			'description' => __( 'Change the widths for the main sections of the theme.', 'santella' ),
		    'priority'   => 1,
			'panel'      => 'santella_theme_settings',
		));
	
	//Main Areas width
	$wp_customize->add_setting( 'santella_content_width', array(
		'default'    => 1030,
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 1,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_content_width', array(
        'label'      => __( 'Main', 'santella' ),
		'description' => __( "Change the width of the Content Area, Flexible Homepage Widgets Area, Full-width Subscribe widget, Full-width Profile widget.", 'santella' ),
        'settings'   => 'santella_content_width',
        'section'    => 'santella_widths',
        'type'       => 'range',
		'input_attrs' => array(
    'min' => 0,
    'max' => 1500,
    'step' => 10,
  ),
	)
	));
	
	//Sidebar Area width
	$wp_customize->add_setting( 'santella_sidebar_width', array(
		'default'    => 270,
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 2,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_sidebar_width', array(
        'label'      => __( 'Sidebar', 'santella' ),
		'description' => __( "Change the width of the sidebar area).", 'santella' ),
        'settings'   => 'santella_sidebar_width',
        'section'    => 'santella_widths',
        'type'       => 'range',
		'input_attrs' => array(
    'min' => 0,
    'max' => 500,
    'step' => 5,
  ),
	)
	));
	
	//Sidebar Area width
	$wp_customize->add_setting( 'santella_insta_width', array(
		'default'    => 750,
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 3,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_insta_width', array(
        'label'      => __( 'Instagram & Landing Page Templates', 'santella' ),
		'description' => __( "Change the width of the page templates Instagram and Simple Landing Page.", 'santella' ),
        'settings'   => 'santella_insta_width',
        'section'    => 'santella_widths',
        'type'       => 'range',
		'input_attrs' => array(
    'min' => 0,
    'max' => 1200,
    'step' => 10,
  ),
	)
	));
	
	    /* ------------------------
	 *  2. Basic Settings.
	 * ---------------------------- */
		$wp_customize->add_section( 'santella_theme_basic_settings' , array(
		    'title'      => __( 'Basic Settings', 'santella' ),
			'description' => __( 'Modify some of the basic theme settings. <br/><i>Posts per page on Archive pages, Search field text, Search button text</i>.', 'santella' ),
		    'priority'   => 2,
			'panel'      => 'santella_theme_settings',
		));
	
	    //Archives Posts Per Page
	$wp_customize->add_setting( 'archive_posts_per_page', array(
		'default'    => 9,
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 1,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'archive_posts_per_page', array(
        'label'      => __( 'Archives Posts Per Page', 'santella' ),
		'description' => __( "Change the number of the posts per page on the archives pages (search pages, categories pages,tag pages etv.).", 'santella' ),
        'settings'   => 'archive_posts_per_page',
        'section'    => 'santella_theme_basic_settings',
        'type'       => 'number'
	)
	));
	
	//Search Field Text
	$wp_customize->add_setting( 'santella_search_text', array(
		'default'    => 'Type some keywords...',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 2,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_search_text', array(
        'label'      => __( 'Search Field Text', 'santella' ),
		'description' => __( "Change the text of the search field.", 'santella' ),
        'settings'   => 'santella_search_text',
        'section'    => 'santella_theme_basic_settings',
        'type'       => 'text'
	)
	));
	
	//Search Button Text
	$wp_customize->add_setting( 'santella_search_btn_text', array(
		'default'    => 'search',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 3,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_search_btn_text', array(
        'label'      => __( 'Search Button Text', 'santella' ),
		'description' => __( "Change the text of the search bar button.", 'santella' ),
        'settings'   => 'santella_search_btn_text',
        'section'    => 'santella_theme_basic_settings',
        'type'       => 'text'
	)
	));
	
	
		/* ------------------------
	 *  3. Options.
	 * ---------------------------- */
		$wp_customize->add_section( 'santella_theme_controls' , array(
		    'title'      => __( 'Options', 'santella' ),
			'description' => __( 'Modify the settings for the Widget block editor. <br/><i style="color:red"><red>After check/uncheck click on the "Publish" button and refresh the page for the changes to take effect</i>.', 'santella' ),
		    'priority'   => 3,
			'panel'      => 'santella_theme_settings',
		));

		//Widgets Block .
		$wp_customize->add_setting( 'santella_widgets_block' , array(
			'default'  => false,
			'sanitize_callback' => 'santella_sanitize_checkbox',
	 		'capability' => 'edit_theme_options',
	 	'priority' => 1,
	  ));
	  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'santella_widgets_block', array(
	 	'label'      => __( 'Enable widgets block editor feature: ', 'santella' ),
	 	'section'    => 'santella_theme_controls',
	 	'settings'   => 'santella_widgets_block',
	 	'type'  => 'checkbox',
	 )
	  ));
	
	//Homepage Posts Layout
	$wp_customize->add_setting( 'santella_home_posts_layout', array(
		'default'    => 'grid',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 2,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_home_posts_layout', array(
        'label'      => __( 'Change the Homepage Posts Layout', 'santella' ),
		'description' => __( "Change the homepage posts layout.", 'santella' ),
        'settings'   => 'santella_home_posts_layout',
        'section'    => 'santella_theme_controls',
        'type'       => 'select',
		'choices'    => array(
			'grid' => 'Grid',
            'regular' => 'Regular',
			'thumbnails' => 'Thumbnails',
		))
	));
	
	//Blog Page Posts Layout
	$wp_customize->add_setting( 'santella_blog_posts_layout', array(
		'default'    => 'regular',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 3,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_blog_posts_layout', array(
        'label'      => __( 'Change the Blog Page Posts Layout', 'santella' ),
		'description' => __( "Change the blog page posts layout.", 'santella' ),
        'settings'   => 'santella_blog_posts_layout',
        'section'    => 'santella_theme_controls',
        'type'       => 'select',
		'choices'    => array(
			'grid' => 'Grid',
            'regular' => 'Regular',
			'thumbnails' => 'Thumbnails',
		))
	));
	
	/* ------------------------
	 *  4. Sidebar.
	 * ---------------------------- */
	$wp_customize->add_section( 'santella_sidebar_visibility' , array(
		    'title'      => __( 'Sidebar', 'santella' ),
			'description' => __( 'Modify the settings for the Sidebar', 'santella' ),
		    'priority'   => 4,
			'panel'      => 'santella_theme_settings',
		));
	
	//Sidebar Position
	$wp_customize->add_setting( 'santella_sidebar_position', array(
		'default'    => 'left',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 1,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_sidebar_position', array(
        'label'      => __( 'Sidebar position', 'santella' ),
		'description' => __( "Choose the position of the sidebar or hide it from all pages.", 'santella' ),
        'settings'   => 'santella_sidebar_position',
        'section'    => 'santella_sidebar_visibility',
        'type'       => 'select',
		'choices'    => array(
			'right' => 'Right',
            'left' => 'Left',
			'hidden' => 'Hidden',
		))
	));
	
	//Single pages
		$wp_customize->add_setting( 'santella_sidebar_page_visibility' , array(
	 		'capability' => 'edit_theme_options',
	 	    'priority' => 2,
            'default'  => true,
			'sanitize_callback' => 'santella_sanitize_checkbox',
	  ));
	  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'santella_sidebar_page_visibility', array(
	 	'label'      => __( 'Hide the sidebar from the Single static pages ', 'santella' ),
	 	'section'    => 'santella_sidebar_visibility',
	 	'settings'   => 'santella_sidebar_page_visibility',
	 	'type'  => 'checkbox',
	 )
	  ));
	
	//Post pages
		$wp_customize->add_setting( 'santella_sidebar_post_visibility' , array(
			'default'  => false,
			'sanitize_callback' => 'santella_sanitize_checkbox',
	 		'capability' => 'edit_theme_options',
	 	'priority' => 2,
	  ));
	  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'santella_sidebar_post_visibility', array(
	 	'label'      => __( 'Hide the sidebar from the Single Post pages ', 'santella' ),
	 	'section'    => 'santella_sidebar_visibility',
	 	'settings'   => 'santella_sidebar_post_visibility',
	 	'type'  => 'checkbox',
	 )
	  ));
	
	//Homepage
		$wp_customize->add_setting( 'santella_sidebar_home_visibility' , array(
			'default'  => false,
			'sanitize_callback' => 'santella_sanitize_checkbox',
	 		'capability' => 'edit_theme_options',
	 	'priority' => 4,
	  ));
	  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'santella_sidebar_home_visibility', array(
	 	'label'      => __( 'Hide the sidebar from the homepage.', 'santella' ),
	 	'section'    => 'santella_sidebar_visibility',
	 	'settings'   => 'santella_sidebar_home_visibility',
	 	'type'  => 'checkbox',
	 )
	  ));
	
	//WooCommerce pages
		$wp_customize->add_setting( 'santella_sidebar_woo_visibility' , array(
			'default'  => true,
			'sanitize_callback' => 'santella_sanitize_checkbox',
	 		'capability' => 'edit_theme_options',
	 	'priority' => 5,
	  ));
	  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'santella_sidebar_woo_visibility', array(
	 	'label'      => __( 'Hide the sidebar from WooCommerce pages. ' , 'santella' ),
		'description' => __( 'This setting does not apply to the "Cart", "Checkout" and "My account" pages as they are blog pages with shortcodes.' , 'santella' ),
	 	'section'    => 'santella_sidebar_visibility',
	 	'settings'   => 'santella_sidebar_woo_visibility',
	 	'type'  => 'checkbox',
	 )
	  ));
	
	  /* ------------------------
	 *  5. Grid Layout Settings.
	 * ---------------------------- */
	$wp_customize->add_section( 'santella_grid_layout_settings', array(
		    'title'      => __( 'Grid Layout Settings', 'santella' ),
			'description' => __( 'Modify the settings for the Grid posts layout', 'santella' ),
		    'priority'   => 5,
			'panel'      => 'santella_theme_settings',
		));
	
	//Excerpt Length
	$wp_customize->add_setting( 'santella_grid_layout_excerpt_length', array(
		'default'    => 20,
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 1,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_grid_layout_excerpt_length', array(
        'label'      => __( 'Post Excerpt Length', 'santella' ),
		'description' => __( "Change the posts excerpt length.", 'santella' ),
        'settings'   => 'santella_grid_layout_excerpt_length',
        'section'    => 'santella_grid_layout_settings',
        'type'       => 'number'
	)
	));
	
	//Excerpt Visibility
	$wp_customize->add_setting( 'santella_grid_layout_excerpt_visibility', array(
		'default'    => 'true',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 2,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_grid_layout_excerpt_visibility', array(
        'label'      => __( 'Excerpt Visibility', 'santella' ),
		'description' => __( "Hide/Show the post excerpt.", 'santella' ),
        'settings'   => 'santella_grid_layout_excerpt_visibility',
        'section'    => 'santella_grid_layout_settings',
        'type'       => 'select',
		'choices'    => array(
			'true' => 'Visible',
            'false' => 'Hidden',
		))
	));
	
	//Button Visibility
	$wp_customize->add_setting( 'santella_grid_layout_btn_visibility', array(
		'default'    => 'true',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 3,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_grid_layout_btn_visibility', array(
        'label'      => __( 'Button Visibility', 'santella' ),
		'description' => __( "Hide/Show the button.", 'santella' ),
        'settings'   => 'santella_grid_layout_btn_visibility',
        'section'    => 'santella_grid_layout_settings',
        'type'       => 'select',
		'choices'    => array(
			'true' => 'Visible',
            'false' => 'Hidden',
		))
	));
	
	//Button Text
	$wp_customize->add_setting( 'santella_grid_layout_btn_text', array(
		'default'    => "read more",
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 4,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_grid_layout_btn_text', array(
        'label'      => __( 'Button Text', 'santella' ),
		'description' => __( "Change the button's text.", 'santella' ),
        'settings'   => 'santella_grid_layout_btn_text',
        'section'    => 'santella_grid_layout_settings',
        'type'       => 'text'
	)
	));
	
	//First Image Size.
	$wp_customize->add_setting( 'santella_grid_layout_first_img_size', array(
		'default'    => 'full',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 5,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_grid_layout_first_img_size', array(
        'label'      => __( 'First Image Size', 'hebecca' ),
		'description' => __( "Choose the size(shape) of the first image (per page).", 'hebecca' ),
        'settings'   => 'santella_grid_layout_first_img_size',
        'section'    => 'santella_grid_layout_settings',
        'type'       => 'select',
		'choices'    => array(
			'landscape' => 'Landscape',
			'square' => 'Square',
            'portrait' => 'Portrait',
			'full'  => 'Full'
		))
	));
	
	//Images Size.
	$wp_customize->add_setting( 'santella_grid_layout_img_size', array(
		'default'    => 'portrait',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 6,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_grid_layout_img_size', array(
        'label'      => __( 'Images Size', 'hebecca' ),
		'description' => __( "Choose the size(shape) of the other images of the layout.", 'hebecca' ),
        'settings'   => 'santella_grid_layout_img_size',
        'section'    => 'santella_grid_layout_settings',
        'type'       => 'select',
		'choices'    => array(
			'landscape' => 'Landscape',
			'square' => 'Square',
            'portrait' => 'Portrait',
			'full'  => 'Original'
		))
	));

	/* ------------------------
	 *  6. Regular Layout Settings.
	 * ---------------------------- */
	$wp_customize->add_section( 'santella_regular_layout_settings', array(
		    'title'      => __( 'Regular Layout Settings', 'santella' ),
			'description' => __( 'Modify the settings for the Regular posts layout', 'santella' ),
		    'priority'   => 6,
			'panel'      => 'santella_theme_settings',
		));
	
	//Excerpt Length
	$wp_customize->add_setting( 'santella_regular_layout_excerpt_length', array(
		'default'    => 20,
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 1,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_regular_layout_excerpt_length', array(
        'label'      => __( 'Post Excerpt Length', 'santella' ),
		'description' => __( "Change the posts excerpt length.", 'santella' ),
        'settings'   => 'santella_regular_layout_excerpt_length',
        'section'    => 'santella_regular_layout_settings',
        'type'       => 'number'
	)
	));
	
	//Excerpt Visibility
	$wp_customize->add_setting( 'santella_regular_layout_excerpt_visibility', array(
		'default'    => 'true',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 2,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_regular_layout_excerpt_visibility', array(
        'label'      => __( 'Excerpt Visibility', 'santella' ),
		'description' => __( "Hide/Show the post excerpt.", 'santella' ),
        'settings'   => 'santella_regular_layout_excerpt_visibility',
        'section'    => 'santella_regular_layout_settings',
        'type'       => 'select',
		'choices'    => array(
			'true' => 'Visible',
            'false' => 'Hidden',
		))
	));
	
	//Button Visibility
	$wp_customize->add_setting( 'santella_regular_layout_btn_visibility', array(
		'default'    => 'true',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 3,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_regular_layout_btn_visibility', array(
        'label'      => __( 'Button Visibility', 'santella' ),
		'description' => __( "Hide/Show the button.", 'santella' ),
        'settings'   => 'santella_regular_layout_btn_visibility',
        'section'    => 'santella_regular_layout_settings',
        'type'       => 'select',
		'choices'    => array(
			'true' => 'Visible',
            'false' => 'Hidden',
		))
	));
	
	//Button Text
	$wp_customize->add_setting( 'santella_regular_layout_btn_text', array(
		'default'    => "read more",
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 4,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_regular_layout_btn_text', array(
        'label'      => __( 'Button Text', 'santella' ),
		'description' => __( "Change the button's text.", 'santella' ),
        'settings'   => 'santella_regular_layout_btn_text',
        'section'    => 'santella_regular_layout_settings',
        'type'       => 'text'
	)
	));
	
	//Image Size.
	$wp_customize->add_setting( 'santella_regular_layout_img_size', array(
		'default'    => 'full',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 5,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_regular_layout_img_size', array(
        'label'      => __( 'Images Size', 'hebecca' ),
		'description' => __( "Choose the size(shape) of the layout image thumbnails.", 'hebecca' ),
        'settings'   => 'santella_regular_layout_img_size',
        'section'    => 'santella_regular_layout_settings',
        'type'       => 'select',
		'choices'    => array(
			'landscape' => 'Landscape',
			'square' => 'Square',
            'portrait' => 'Portrait',
			'full'  => 'Original'
		))
	));
	
	//Image Position.
	$wp_customize->add_setting( 'santella_regular_layout_image_position', array(
		'default'    => 'below',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 6,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_regular_layout_image_position', array(
        'label'      => __( 'Images Position', 'hebecca' ),
		'description' => __( "Change the image position.", 'hebecca' ),
        'settings'   => 'santella_regular_layout_image_position',
        'section'    => 'santella_regular_layout_settings',
        'type'       => 'select',
		'choices'    => array(
			'below' => 'Below Post Header',
			'above' => 'Above Post Header'
		))
	));
	
	/* ------------------------
	 *  7. Thumbs Layout Settings.
	 * ---------------------------- */
	$wp_customize->add_section( 'santella_thumbs_layout_settings', array(
		    'title'      => __( 'Thumbnails Layout Settings', 'santella' ),
			'description' => __( 'Modify the settings for the Thumbnails posts layout', 'santella' ),
		    'priority'   => 7,
			'panel'      => 'santella_theme_settings',
		));
	
	//Image Size.
	$wp_customize->add_setting( 'santella_thumbs_layout_img_size', array(
		'default'    => 'square',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 1,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_thumbs_layout_img_size', array(
        'label'      => __( 'Images Size', 'hebecca' ),
		'description' => __( "Choose the size(shape) of the layout image thumbnails.", 'hebecca' ),
        'settings'   => 'santella_thumbs_layout_img_size',
        'section'    => 'santella_thumbs_layout_settings',
        'type'       => 'select',
		'choices'    => array(
			'landscape' => 'Landscape',
			'square' => 'Square',
            'portrait' => 'Portrait'
		))
	));
	
	/* ------------------------
	 *  8. Related Posts Settings.
	 * ---------------------------- */
	$wp_customize->add_section( 'santella_related_posts_settings', array(
		    'title'      => __( 'Related Posts Settings', 'santella' ),
			'description' => __( 'Modify the settings for the Related Posts feature', 'santella' ),
		    'priority'   => 8,
			'panel'      => 'santella_theme_settings',
		));
	
	//Visibility.
	$wp_customize->add_setting( 'santella_related_posts_visibility', array(
		'default'    => 'true',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 1,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_related_posts_visibility', array(
        'label'      => __( 'Visibility', 'hebecca' ),
		'description' => __( "Show/Hide the Related Posts on the Single post pages.", 'hebecca' ),
        'settings'   => 'santella_related_posts_visibility',
        'section'    => 'santella_related_posts_settings',
        'type'       => 'select',
		'choices'    => array(
			'true' => 'Show',
			'false' => 'Hide'
		))
	));
	
	//Title Visibility.
	$wp_customize->add_setting( 'santella_related_posts_title_visibility', array(
		'default'    => 'true',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 2,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_related_posts_title_visibility', array(
        'label'      => __( 'Post Title Visibility', 'hebecca' ),
		'description' => __( "Show/Hide the Post Titles.", 'hebecca' ),
        'settings'   => 'santella_related_posts_title_visibility',
        'section'    => 'santella_related_posts_settings',
        'type'       => 'select',
		'choices'    => array(
			'true' => 'Show',
			'false' => 'Hide'
		))
	));
	
	//Heading Text.
	$wp_customize->add_setting( 'santella_related_posts_heading_text', array(
		'default'    => 'Similar Posts',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 3,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_related_posts_heading_text', array(
        'label'      => __( 'Heading Text', 'hebecca' ),
		'description' => __( "Change the Heading Text.", 'hebecca' ),
        'settings'   => 'santella_related_posts_heading_text',
        'section'    => 'santella_related_posts_settings',
        'type'       => 'text'
		)
	));
	
	//Image Size.
	$wp_customize->add_setting( 'santella_related_posts_img_size', array(
		'default'    => 'portrait',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 4,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_related_posts_img_size', array(
        'label'      => __( 'Image Size', 'hebecca' ),
		'description' => __( "Choose the size(shape) of the images.", 'hebecca' ),
        'settings'   => 'santella_related_posts_img_size',
        'section'    => 'santella_related_posts_settings',
        'type'       => 'select',
		'choices'    => array(
			'landscape' => 'Landscape',
			'square' => 'Square',
			'portrait' =>  'Portrait'
		))
	));
	
	//Number of Posts.
	$wp_customize->add_setting( 'santella_related_posts_number', array(
		'default'    => 4,
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 5,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_related_posts_number', array(
        'label'      => __( 'Number of Posts', 'hebecca' ),
		'description' => __( "Change the number of the Related Posts shown.", 'hebecca' ),
        'settings'   => 'santella_related_posts_number',
        'section'    => 'santella_related_posts_settings',
        'type'       => 'number'
	)
	));
	
	/* ------------------------
	 *  9. Post Pager Settings.
	 * ---------------------------- */
	$wp_customize->add_section( 'santella_post_pager_settings', array(
		    'title'      => __( 'Post Pager Settings', 'santella' ),
			'description' => __( 'Modify the settings for the Post Pager', 'santella' ),
		    'priority'   => 9,
			'panel'      => 'santella_theme_settings',
		));
	
	//Visibility.
	$wp_customize->add_setting( 'santella_post_pager_visibility', array(
		'default'    => 'true',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 1,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_post_pager_visibility', array(
        'label'      => __( 'Visibility', 'hebecca' ),
		'description' => __( "Show/Hide the Post Pager on the Single post pages.", 'hebecca' ),
        'settings'   => 'santella_post_pager_visibility',
        'section'    => 'santella_post_pager_settings',
        'type'       => 'select',
		'choices'    => array(
			'true' => 'Show',
			'false' => 'Hide'
		))
	));
	
	//Titles Visibility.
	$wp_customize->add_setting( 'santella_post_pager_title_visibility', array(
		'default'    => 'true',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 2,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_post_pager_title_visibility', array(
        'label'      => __( 'Post Titles Visibility', 'hebecca' ),
		'description' => __( "Show/Hide the Post Titles.", 'hebecca' ),
        'settings'   => 'santella_post_pager_title_visibility',
        'section'    => 'santella_post_pager_settings',
        'type'       => 'select',
		'choices'    => array(
			'true' => 'Show',
			'false' => 'Hide'
		))
	));
	
	//Images Visibility.
	$wp_customize->add_setting( 'santella_post_pager_img_visibility', array(
		'default'    => 'true',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 3,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_post_pager_img_visibility', array(
        'label'      => __( 'Images Visibility', 'hebecca' ),
		'description' => __( "Show/Hide the Images.", 'hebecca' ),
        'settings'   => 'santella_post_pager_img_visibility',
        'section'    => 'santella_post_pager_settings',
        'type'       => 'select',
		'choices'    => array(
			'true' => 'Show',
			'false' => 'Hide'
		))
	));
	
	//Images Size.
	$wp_customize->add_setting( 'santella_post_pager_img_size', array(
		'default'    => 'square',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 4,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_post_pager_img_size', array(
        'label'      => __( 'Images Size', 'hebecca' ),
		'description' => __( "Choose the images size(shape).", 'hebecca' ),
        'settings'   => 'santella_post_pager_img_size',
        'section'    => 'santella_post_pager_settings',
        'type'       => 'select',
		'choices'    => array(
			'landscape' => 'Landscape',
			'square' => 'Square',
			'portrait' => 'Portrait'
		))
	));
	
	//Previous Button Text.
	$wp_customize->add_setting( 'santella_post_pager_prev_txt', array(
		'default'    => 'Previous post',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 5,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_post_pager_prev_txt', array(
        'label'      => __( 'Previous Button Text', 'hebecca' ),
		'description' => __( "Change the Previous Post Button.", 'hebecca' ),
        'settings'   => 'santella_post_pager_prev_txt',
        'section'    => 'santella_post_pager_settings',
        'type'       => 'text'
	)
	));
	
	//Next Button Text.
	$wp_customize->add_setting( 'santella_post_pager_next_txt', array(
		'default'    => 'Next post',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 6,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_post_pager_next_txt', array(
        'label'      => __( 'Next Button Text', 'hebecca' ),
		'description' => __( "Change the Next Post Button.", 'hebecca' ),
        'settings'   => 'santella_post_pager_next_txt',
        'section'    => 'santella_post_pager_settings',
        'type'       => 'text'
	)
	));
	
	/* ------------------------
	 *  10. Pagination Settings.
	 * ---------------------------- */
	$wp_customize->add_section( 'santella_pagination_settings', array(
		    'title'      => __( 'Pagination Settings', 'santella' ),
			'description' => __( 'Modify the settings for the Pagination', 'santella' ),
		    'priority'   => 10,
			'panel'      => 'santella_theme_settings',
		));
	
	//Style.
	$wp_customize->add_setting( 'santella_nav_style', array(
		'default'    => 'numeric',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 1,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_nav_style', array(
        'label'      => __( 'Style', 'hebecca' ),
		'description' => __( "Change the style of the pagination.", 'hebecca' ),
        'settings'   => 'santella_nav_style',
        'section'    => 'santella_pagination_settings',
        'type'       => 'select',
		'choices'    => array(
			'numeric' => 'Numbered',
			'buttons' => 'Buttons'
		))
	));
	
	//Previous Button Text.
	$wp_customize->add_setting( 'santella_prev_btn_nav_txt', array(
		'default'    => '< less',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 2,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_prev_btn_nav_txt', array(
        'label'      => __( 'Previous Button Text', 'hebecca' ),
		'description' => __( "Change the Previous Page Button.", 'hebecca' ),
        'settings'   => 'santella_prev_btn_nav_txt',
        'section'    => 'santella_pagination_settings',
        'type'       => 'text'
	)
	));
	
	//Next Button Text.
	$wp_customize->add_setting( 'santella_next_btn_nav_txt', array(
		'default'    => 'Next >',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'priority'   => 3,
	));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'santella_next_btn_nav_txt', array(
        'label'      => __( 'Next Button Text', 'hebecca' ),
		'description' => __( "Change the Next Page Button.", 'hebecca' ),
        'settings'   => 'santella_next_btn_nav_txt',
        'section'    => 'santella_pagination_settings',
        'type'       => 'text'
	)
	));
							   
}

//Checkbox sanitize
function santella_sanitize_checkbox( $checked ) {
  // Boolean check.
  return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function santella_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function santella_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
