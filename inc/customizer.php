<?php
/**
 * healthaawaj Theme Customizer
 *
 * @package agnikhabar
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function healthaawaj_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'healthaawaj_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'healthaawaj_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'healthaawaj_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function healthaawaj_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function healthaawaj_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function healthaawaj_customize_preview_js() {
	wp_enqueue_script( 'healthaawaj-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'healthaawaj_customize_preview_js' );
function techie_additional_customizer_settings( $wp_customize ) {
    $wp_customize->add_setting(
        'facebook_link',
        array(
            'default' => '',
            'type' => 'option', // you can also use 'theme_mod'
            'capability' => 'edit_theme_options'
        ),
    );

	$wp_customize->add_setting(
        'twitter_link',
        array(
            'default' => '',
            'type' => 'option', // you can also use 'theme_mod'
            'capability' => 'edit_theme_options'
        ),
    );

	$wp_customize->add_setting(
        'insta_link',
        array(
            'default' => '',
            'type' => 'option', // you can also use 'theme_mod'
            'capability' => 'edit_theme_options'
        ),
    );

	$wp_customize->add_setting(
        'youtube_link',
        array(
            'default' => '',
            'type' => 'option', // you can also use 'theme_mod'
            'capability' => 'edit_theme_options'
        ),
    );

	$wp_customize->add_setting(
        'linkedin_link',
        array(
            'default' => '',
            'type' => 'option', // you can also use 'theme_mod'
            'capability' => 'edit_theme_options'
        ),
    );

	$wp_customize->add_setting(
        'pinterest_link',
        array(
            'default' => '',
            'type' => 'option', // you can also use 'theme_mod'
            'capability' => 'edit_theme_options'
        ),
    );

	$wp_customize->add_setting(
        'tumblr_link',
        array(
            'default' => '',
            'type' => 'option', // you can also use 'theme_mod'
            'capability' => 'edit_theme_options'
        ),
    );

    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'facebook_link',
        array(
            'label'      => __( 'Facebook Link', 'samayasamachar' ),
            'settings'   => 'facebook_link',
            'priority'   => 30,
            'section'    => 'title_tagline',
            'type'       => 'text',
        )
    ) );

	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'twitter_link',
        array(
            'label'      => __( 'Twitter Link', 'samayasamachar' ),
            'settings'   => 'twitter_link',
            'priority'   => 30,
            'section'    => 'title_tagline',
            'type'       => 'text',
        )
    ) );
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'insta_link',
        array(
            'label'      => __( 'Instagram Link', 'samayasamachar' ),
            'settings'   => 'insta_link',
            'priority'   => 30,
            'section'    => 'title_tagline',
            'type'       => 'text',
        )
    ) );
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'youtube_link',
        array(
            'label'      => __( 'Youtube Link', 'samayasamachar' ),
            'settings'   => 'youtube_link',
            'priority'   => 30,
            'section'    => 'title_tagline',
            'type'       => 'text',
        )
    ) );
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'linkedin_link',
        array(
            'label'      => __( 'Linkedin Link', 'samayasamachar' ),
            'settings'   => 'linkedin_link',
            'priority'   => 30,
            'section'    => 'title_tagline',
            'type'       => 'text',
        )
    ) );
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'pinterest_link',
        array(
            'label'      => __( 'Pinterest Link', 'samayasamachar' ),
            'settings'   => 'pinterest_link',
            'priority'   => 30,
            'section'    => 'title_tagline',
            'type'       => 'text',
        )
    ) );
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'tumblr_link',
        array(
            'label'      => __( 'Tumblr Link', 'samayasamachar' ),
            'settings'   => 'tumblr_link',
            'priority'   => 30,
            'section'    => 'title_tagline',
            'type'       => 'text',
        )
    ) );
}
add_action( 'customize_register', 'techie_additional_customizer_settings' );
