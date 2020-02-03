<?php 


/**
 * Political Theme Customizer
 *
 * @package Political
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function political_customize_register( $wp_customize ) {
  $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
  $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
  $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'political_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function political_customize_preview_js() {
  wp_enqueue_script( 'political_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'political_customize_preview_js' );


//Select Sanitization Function
function political_sanitize_select($input, $setting) {
	global $wp_customize;
	$control = $wp_customize->get_control($setting->id);
	if (array_key_exists($input, $control->choices)) {
		return $input;
	} else {
		return $setting->default;
	}
}

/* ========= CUSTOM CUSTOMIZER ===================================== */

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function political_customize_partial_blogname() {
  bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function political_customize_partial_blogdescription() {
  bloginfo( 'description' );
}

/**
||-> Customize Colors tab.
*/

function political_theme_customize_register( $wp_customize ) {

  $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
  $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
  $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

  if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'blogname', array(
      'selector'        => '.site-title a',
      'render_callback' => 'political_customize_partial_blogname',
    ) );
    $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
      'selector'        => '.site-description',
      'render_callback' => 'political_customize_partial_blogdescription',
    ) );
  }

    // Header Links Colors
    $wp_customize->add_setting( 'header_links_colors', array(
      'default'   => '',
      'transport' => 'refresh',
      'sanitize_callback'  => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_links_colors', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Header Links Colors', 'political' ),
    ) ) );
    // Header Background Color
    $wp_customize->add_setting( 'header_background_color', array(
      'default'   => '',
      'transport' => 'refresh',
      'sanitize_callback'  => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Header Background Color', 'political' ),
    ) ) );
    // Primary Color
    $wp_customize->add_setting( 'primary_color', array(
      'default'   => '',
      'transport' => 'refresh',
      'sanitize_callback'  => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Primary Color', 'political' ),
    ) ) );
    // Primary Hover Color
    $wp_customize->add_setting( 'primary_hover_color', array(
      'default'   => '',
      'transport' => 'refresh',
      'sanitize_callback'  => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_hover_color', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Primary Hover Color', 'political' ),
    ) ) );
    // Header Ads Image
    $wp_customize->add_setting( 'political_ad_image', array(
      'default'   => get_template_directory_uri() . '/images/728x90.jpg',
      'transport' => 'refresh',
      'sanitize_callback'  => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'political_ad_image', array(
        'label' => __('Header Ad Image', 'political'),
        'section' => 'ads',
    )));
    // Header Ads Link
    $wp_customize->add_setting( 'political_ad_link', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'political_ad_link', array(
      'type' => 'text',
      'section' => 'ads', // Add a default or your own section
      'label' => esc_html__( 'Header Ad Link' ,'political'),
    ) );

    $posts_list = array();
    $args = array('post_type' => 'post','posts_per_page' => -1);
    $posts = get_posts( $args ); 
    foreach($posts as $post) {
        $posts_list[$post->post_title] = $post->post_title;
    }

    $wp_customize->add_section( 'homepage_slider' , array(
      'title'      => __('Homepage slider','political'),
      'priority'   => 50,
    ) );
    $wp_customize->add_section( 'ads' , array(
      'title'      => __('Ads','political'),
      'priority'   => 50,
    ) );
    /* First post slide */
    $wp_customize->add_setting( 'first_post_slide', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback'  => 'political_sanitize_select',
    ) );
    $wp_customize->add_control( 'first_post_slide', array(
      'type' => 'select',
      'section' => 'homepage_slider', // Add a default or your own section
      'label' => esc_html__( 'First post slide' ,'political'),
      'choices' => $posts_list,
    ) );
    /* Second post slide */
    $wp_customize->add_setting( 'second_post_slide', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback'  => 'political_sanitize_select',
    ) );
    $wp_customize->add_control( 'second_post_slide', array(
      'type' => 'select',
      'section' => 'homepage_slider', // Add a default or your own section
      'label' => esc_html__( 'Second post slide' ,'political'),
      'choices' => $posts_list,
    ) );
    /* Third post slide */
    $wp_customize->add_setting( 'third_post_slide', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback'  => 'political_sanitize_select',
    ) );
    $wp_customize->add_control( 'third_post_slide', array(
      'type' => 'select',
      'section' => 'homepage_slider', // Add a default or your own section
      'label' => esc_html__( 'Third post slide' ,'political'),
      'choices' => $posts_list,
    ) );
    /* Uncheck to show slider */ 
    $wp_customize->add_setting( 'themecheck_checkbox_setting_id', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'themecheck_checkbox_setting_id', array(
      'type' => 'checkbox',
      'section' => 'homepage_slider', // Add a default or your own section
      'label' => esc_html__( 'Check to show slider' ,'political'),
    ) );


    /* Footer */ 
    $wp_customize->add_section( 'footer_section' , array(
      'title'      => __('Footer','political'),
      'priority'   => 50,
    ) );

    /* Column 1 */
    /* Title 1 */
    $wp_customize->add_setting( 'footer_title1_id', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'footer_title1_id', array(
      'type' => 'text',
      'section' => 'footer_section', // Add a default or your own section
      'label' => __( 'Footer Title 1st column' ,'political'),
    ) );

    /* Textarea description */
    $wp_customize->add_setting( 'footer_widget_column1', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( 'footer_widget_column1', array(
      'type' => 'select',
      'section' => 'footer_section', // Add a default or your own section
      'label' => esc_html__( 'Select Widget 1st column' ,'political'),
      'choices' => array(
        'WP_Widget_Archives' => esc_html__( 'WP Widget Archives','political'),
        'WP_Widget_Calendar' => esc_html__( 'WP Widget Calendar','political'),
        'WP_Widget_Categories' => esc_html__( 'WP Widget Categories','political'),
        'WP_Widget_Meta' => esc_html__( 'WP Widget Meta','political'),
        'WP_Widget_Pages' => esc_html__( 'WP Widget Pages','political'),
        'WP_Widget_Recent_Comments' => esc_html__( 'WP Widget Recent Comments','political'),
        'WP_Widget_Recent_Posts' => esc_html__( 'WP Widget Recent Posts','political'),
        'WP_Widget_Search' => esc_html__( 'WP Widget Search ','political'),
        'WP_Widget_Tag_Cloud' => esc_html__( 'WP Widget Tag Cloud ','political'),
      ),
    ) );

    /* Column 2 */
    $wp_customize->add_setting( 'footer_title2_id', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'footer_title2_id', array(
      'type' => 'text',
      'section' => 'footer_section', // Add a default or your own section
      'label' => esc_html__( 'Footer Title 2nd column' ,'political'),
    ) );
    $wp_customize->add_setting( 'footer_widget_column2', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'political_sanitize_select',
    ) );
    $wp_customize->add_control( 'footer_widget_column2', array(
      'type' => 'select',
      'section' => 'footer_section', // Add a default or your own section
      'label' => esc_html__( 'Select Widget 2nd column' ,'political'),
      'choices' => array(
        'WP_Widget_Archives' => esc_html__( 'WP Widget Archives','political'),
        'WP_Widget_Calendar' => esc_html__( 'WP Widget Calendar','political'),
        'WP_Widget_Categories' => esc_html__( 'WP Widget Categories','political'),
        'WP_Widget_Meta' => esc_html__( 'WP Widget Meta','political'),
        'WP_Widget_Pages' => esc_html__( 'WP Widget Pages','political'),
        'WP_Widget_Recent_Comments' => esc_html__( 'WP Widget Recent Comments','political'),
        'WP_Widget_Recent_Posts' => esc_html__( 'WP Widget Recent Posts','political'),
        'WP_Widget_Search' => esc_html__( 'WP Widget Search ','political'),
        'WP_Widget_Tag_Cloud' => esc_html__( 'WP Widget Tag Cloud ','political'),
      ),
    ) );


    /* Column 3 */
    $wp_customize->add_setting( 'footer_title3_id', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'footer_title3_id', array(
      'type' => 'text',
      'section' => 'footer_section', // Add a default or your own section
      'label' => esc_html__( 'Footer Title 3rd column' ,'political'),
    ) );
    $wp_customize->add_setting( 'footer_widget_column3', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'political_sanitize_select',
    ) );
    $wp_customize->add_control( 'footer_widget_column3', array(
      'type' => 'select',
      'section' => 'footer_section', // Add a default or your own section
      'label' => esc_html__( 'Select Widget 3rd column' ,'political'),
      'choices' => array(
        'WP_Widget_Archives' => esc_html__( 'WP Widget Archives','political'),
        'WP_Widget_Calendar' => esc_html__( 'WP Widget Calendar','political'),
        'WP_Widget_Categories' => esc_html__( 'WP Widget Categories','political'),
        'WP_Widget_Meta' => esc_html__( 'WP Widget Meta','political'),
        'WP_Widget_Pages' => esc_html__( 'WP Widget Pages','political'),
        'WP_Widget_Recent_Comments' => esc_html__( 'WP Widget Recent Comments','political'),
        'WP_Widget_Recent_Posts' => esc_html__( 'WP Widget Recent Posts','political'),
        'WP_Widget_Search' => esc_html__( 'WP Widget Search ','political'),
        'WP_Widget_Tag_Cloud' => esc_html__( 'WP Widget Tag Cloud ','political'),
      ),
    ) );

    /* Column 4 */
    $wp_customize->add_setting( 'footer_title4_id', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'footer_title4_id', array(
      'type' => 'text',
      'section' => 'footer_section', // Add a default or your own section
      'label' => esc_html__( 'Footer Title 4th column' ,'political'),
    ) );
    $wp_customize->add_setting( 'footer_phone', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'footer_phone', array(
      'type' => 'text',
      'section' => 'footer_section', // Add a default or your own section
      'label' => esc_html__( 'Footer phone 4th column' ,'political'),
    ) );
    $wp_customize->add_setting( 'footer_email', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'footer_email', array(
      'type' => 'text',
      'section' => 'footer_section', // Add a default or your own section
      'label' => esc_html__( 'Footer email 4th column' ,'political'),
    ) );
    $wp_customize->add_setting( 'footer_facebook', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'footer_facebook', array(
      'type' => 'url',
      'section' => 'footer_section', // Add a default or your own section
      'label' => esc_html__( 'Footer facebook link 4th column' ,'political'),
    ) );
    $wp_customize->add_setting( 'footer_twitter', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'footer_twitter', array(
      'type' => 'url',
      'section' => 'footer_section', // Add a default or your own section
      'label' => esc_html__( 'Footer twitter link 4th column' ,'political'),
    ) );
    $wp_customize->add_setting( 'footer_linkedin', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'footer_linkedin', array(
      'type' => 'url',
      'section' => 'footer_section', // Add a default or your own section
      'label' => esc_html__( 'Footer linkedin link 4th column' ,'political'),
    ) );
    $wp_customize->add_setting( 'footer_telegram', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'footer_telegram', array(
      'type' => 'url',
      'section' => 'footer_section', // Add a default or your own section
      'label' => esc_html__( 'Footer telegram link 4th column' ,'political'),
    ) );
    $wp_customize->add_setting( 'footer_google', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'footer_google', array(
      'type' => 'url',
      'section' => 'footer_section', // Add a default or your own section
      'label' => esc_html__( 'Footer google link 4th column' ,'political'),
    ) );
    $wp_customize->add_setting( 'footer_copyright', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( 'footer_copyright', array(
      'type' => 'textarea',
      'section' => 'footer_section', // Add a default or your own section
      'label' => esc_html__( 'Before Footer copyright' ,'political'),
    ) );


}
add_action( 'customize_register', 'political_theme_customize_register' );