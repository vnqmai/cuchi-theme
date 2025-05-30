<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

if (! function_exists('\Roots\bootloader')) {
    wp_die(
        __('You need to install Acorn to use this theme.', 'sage'),
        '',
        [
            'link_url' => 'https://roots.io/acorn/docs/installation/',
            'link_text' => __('Acorn Docs: Installation', 'sage'),
        ]
    );
}

\Roots\bootloader()->boot();

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });


// My custom code for theme support and customization
require_once get_template_directory() . '/vendor/autoload.php';

add_theme_support('custom-logo', [
  'height'      => 80,
  'width'       => 109,
  'flex-height' => true,
  'flex-width'  => true,
  'header-text' => ['site-title', 'site-description'],
]);

require_once get_template_directory() . '/app/Custom/MultipleMediaControl.php';

add_action('customize_register', function ($wp_customize) {
    // HERO SECTION
    $wp_customize->add_section('custom_header_section', [
        'title'    => __('Hero Section', 'sage'),
        'priority' => 30,
    ]);
    $wp_customize->add_setting('header_image_upload', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_image_upload_control', [
        'label'    => __('Header Image', 'sage'),
        'section'  => 'custom_header_section',
        'settings' => 'header_image_upload',
    ]));


    // HASHTAGS SECTION
    $wp_customize->add_section('hashtags_section', [
        'title'    => __('Hashtags Section', 'sage'),
        'priority' => 30,
    ]);
    $wp_customize->add_setting('hero_title', [
        'default'           => 'DOWNTOWN CUCHI',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('hashtags_title', [
        'label'   => __('Title', 'sage'),
        'section' => 'hashtags_section',
        'type'    => 'text',
    ]);
    $wp_customize->add_setting('hashtags_tags', [
        'default'           => '#traditionalcuisine #cozyaccommodations #weekendgetaways #relaxation #teambuilding',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('hashtags_tags', [
        'label'   => __('Hashtags', 'sage'),
        'section' => 'hashtags_section',
        'type'    => 'text',
    ]);


    // INTRO 1 SECTION
    $wp_customize->add_section('intro-1_section', [
        'title'    => __('Intro 1 Section', 'sage'),
        'priority' => 30,
    ]);
    $wp_customize->add_setting('intro_1_title', [
        'default'           => 'What enrich your stay?',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('intro_1_title', [
        'label'   => __('Title', 'sage'),
        'section' => 'intro-1_section',
        'type'    => 'text',
    ]);
    $wp_customize->add_setting('intro_1_description', [
        'default'           => 'At The Downtown Cuchi, there’s never a dull moment. While the serene surroundings invite you to unwind, we also offer a variety of activities to make your stay even more memorable.',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('intro_1_description', [
        'label'   => __('Description', 'sage'),
        'section' => 'intro-1_section',
        'type'    => 'text',
    ]);
    $wp_customize->add_setting('intro_1_button_text', [
        'default'           => 'See More',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('intro_1_button_text', [
        'label'   => __('Button text', 'sage'),
        'section' => 'intro-1_section',
        'type'    => 'text',
    ]);
    $wp_customize->add_setting('intro_1_button_image_upload', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'intro_1_button_image_upload_control', [
        'label'    => __('Image', 'sage'),
        'section'  => 'intro-1_section',
        'settings' => 'intro_1_button_image_upload',
    ]));

    // INTRO 2 SECTION
    $wp_customize->add_section('intro-2_section', [
        'title'    => __('Intro 2 Section', 'sage'),
        'priority' => 30,
    ]);
    $wp_customize->add_setting('intro_2_title', [
        'default'           => 'RIDE A BIKE,',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('intro_2_title', [
        'label'   => __('Title', 'sage'),
        'section' => 'intro-2_section',
        'type'    => 'text',
    ]);
    $wp_customize->add_setting('intro_2_subtitle_main', [
        'default'           => 'NOT YOUR',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('intro_2_subtitle_main', [
        'label'   => __('Subtitle', 'sage'),
        'section' => 'intro-2_section',
        'type'    => 'text',
    ]);
    $wp_customize->add_setting('intro_2_subtitle_emphasis', [
        'default'           => 'MOBILE!',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('intro_2_subtitle_emphasis', [
        'label'   => __('Subtitle emphasis', 'sage'),
        'section' => 'intro-2_section',
        'type'    => 'text',
    ]);
    $wp_customize->add_setting('intro_2_description', [
        'default'           => 'Guided by the team at The Downtown Cuchi, your cycling adventure offers an immersive journey through this picturesque countryside, blending scenic landscapes, local traditions, and memorable activities.',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('intro_2_description', [
        'label'   => __('Description', 'sage'),
        'section' => 'intro-2_section',
        'type'    => 'text',
    ]);
    $wp_customize->add_setting('intro_2_button_text', [
        'default'           => 'See More',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('intro_2_button_text', [
        'label'   => __('Button text', 'sage'),
        'section' => 'intro-2_section',
        'type'    => 'text',
    ]);
    $wp_customize->add_setting('intro_2_button_image_upload', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'intro_2_button_image_upload_control', [
        'label'    => __('Image', 'sage'),
        'section'  => 'intro-2_section',
        'settings' => 'intro_2_button_image_upload',
    ]));


    // HIGHLIGHTED MEMORIES SECTION
    $wp_customize->add_section('highlighted_memories_section', [
        'title'    => __('Highlighted Memories Section', 'sage'),
        'priority' => 30,
    ]);
    $wp_customize->add_setting('highlighted_memories_title', [
        'default'           => 'HIGHLIGHTED MOMENTS',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('highlighted_memories_title', [
        'label'   => __('Title', 'sage'),
        'section' => 'highlighted_memories_section',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('video_urls', [
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control(new Multiple_Media_Control($wp_customize, 'video_urls', [
        'label'   => __('Upload Videos', 'sage'),
        'section' => 'highlighted_memories_section',
    ]));

    // IN ONE TOUR SECTION
    $wp_customize->add_section('in_one_tour_section', [
        'title'    => __('In One Tour Section', 'sage'),
        'priority' => 30,
    ]);
    $wp_customize->add_setting('in_one_tour_title', [
        'default'           => 'IN ONE TOUR',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('in_one_tour_title', [
        'label'   => __('Title', 'sage'),
        'section' => 'in_one_tour_section',
        'type'    => 'text',
    ]);
    $wp_customize->add_setting('in_one_tour_description', [
        'default'           => 'Fresh Air, Outdoor Experience and Savoring Cuisine',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('in_one_tour_description', [
        'label'   => __('Description', 'sage'),
        'section' => 'in_one_tour_section',
        'type'    => 'text',
    ]);
    $wp_customize->add_setting('in_one_tour_button_text', [
        'default'           => 'Book Now',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('in_one_tour_button_text', [
        'label'   => __('Button text', 'sage'),
        'section' => 'in_one_tour_section',
        'type'    => 'text',
    ]);
    $wp_customize->add_setting('in_one_tour_button_image_upload', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'in_one_tour_button_image_upload_control', [
        'label'    => __('Image', 'sage'),
        'section'  => 'in_one_tour_section',
        'settings' => 'in_one_tour_button_image_upload',
    ]));

    // OUR INSIGHTS SECTION
    $wp_customize->add_section('our_insights_section', [
        'title'    => __('Our Insights Section', 'sage'),
        'priority' => 30,
    ]);
    $wp_customize->add_setting('our_insights_title', [
        'default'           => 'Explore insights',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('our_insights_title', [
        'label'   => __('Title', 'sage'),
        'section' => 'our_insights_section',
        'type'    => 'text',
    ]);
    $wp_customize->add_setting('our_insights_sticky_text', [
        'default'           => 'Disconnect to Reconnect',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('our_insights_sticky_text', [
        'label'   => __('Sticky text', 'sage'),
        'section' => 'our_insights_section',
        'type'    => 'text',
    ]);

    if ( class_exists( \Kirki\Kirki::class ) ) {
        \Kirki\Kirki::add_config( 'theme_config_id', [
            'capability'    => 'edit_theme_options',
            'option_type'   => 'theme_mod',
        ] );

        \Kirki\Field::add_field( [
            'settings' => 'hero_items',
            'label'    => esc_html__( 'Hero Items', 'your-textdomain' ),
            'section'  => 'our_insights_section', // or your custom section
            'type'     => 'repeater',
            'fields'   => [
                'image' => [
                    'type'  => 'image',
                    'label' => esc_html__( 'Image', 'your-textdomain' ),
                ],
                'text' => [
                    'type'  => 'text',
                    'label' => esc_html__( 'Text', 'your-textdomain' ),
                ],
                'link' => [
                    'type'  => 'text',
                    'label' => esc_html__( 'Link', 'your-textdomain' ),
                ],
            ],
        ] );
    }

    
    // \Kirki\Field::add_config('sage_config', [
    //     'capability'    => 'edit_theme_options',
    //     'option_type'   => 'theme_mod',
    //     ]);

    //     \Kirki\Field::add_field('sage_config', [
    //     'type'        => 'repeater',
    //     'settings'    => 'custom_repeater',
    //     'label'       => esc_html__('Custom Items'),
    //     'section'     => 'title_tagline', // or a custom section
    //     'fields' => [
    //         'image' => [
    //         'type'        => 'image',
    //         'label'       => esc_html__('Image'),
    //         ],
    //         'text' => [
    //         'type'        => 'text',
    //         'label'       => esc_html__('Text'),
    //         ],
    //         'link' => [
    //         'type'        => 'text',
    //         'label'       => esc_html__('Link URL'),
    //         ],
    //     ],
    //     'default' => [],
    // ]);

});





