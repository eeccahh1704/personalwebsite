<?php
/**
 * Graceful Blog Mag functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Graceful Blog Mag
 */

// ----------------------------------------------------------------------------------
//	Register Front-End Styles And Scripts
// ----------------------------------------------------------------------------------

function graceful_blog_mag_enqueue_child_styles() {
 
    wp_enqueue_style( 'graceful-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'graceful-blog-mag-style', get_stylesheet_directory_uri() . '/style.css', array( 'graceful-style' ), wp_get_theme()->get('Version') );
}
add_action( 'wp_enqueue_scripts', 'graceful_blog_mag_enqueue_child_styles' );


// ----------------------------------------------------------------------------------
//  Customize Register
// ----------------------------------------------------------------------------------
function graceful_blog_mag_customize_register( $wp_customize ) {

    /** Top Navigation */
    $wp_customize->add_panel(
        'layout_settings',
        array(
            'priority'   => 20,
            'capability' => 'edit_theme_options',
            'title'      => __( 'Top Navigaion', 'graceful-blog-mag' ),
        )
    );

    // add Top Navigation section
    $wp_customize->add_section( 'graceful_top_navigation' , array(
        'title'      => esc_html__( 'Top Navigation', 'graceful-blog-mag' ),
        'priority'   => 23,
        'capability' => 'edit_theme_options'
    ) );

    // Enable Top Navigation
    $wp_customize->add_setting( 'graceful_blog_mag_options[top_navigation_show]', array(
        'default'    => graceful_blog_mag_options('top_navigation_show'),
        'type'       => 'option',
        'transport'  => 'refresh',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'graceful_sanitize_checkboxes'
    ) );
    $wp_customize->add_control( 'graceful_blog_mag_options[top_navigation_show]', array(
        'label'     => esc_html__( 'Enable Top Navigation', 'graceful-blog-mag' ),
        'section'   => 'graceful_top_navigation',
        'type'      => 'checkbox',
        'priority'  => 1
    ) );

    // Top Navigation Background Color
    $wp_customize->add_setting( 'graceful_blog_mag_options[top_navigation_bg]', array(
        'default'    => graceful_blog_mag_options('top_navigation_bg'),
        'type'       => 'option',
        'transport'  => 'refresh',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'graceful_blog_mag_options[top_navigation_bg]', array(
        'label'     => esc_html__( 'Top Navigation Background Color', 'graceful-blog-mag' ),
        'section'   => 'graceful_top_navigation',
        'priority'  => 3
    ) ) );

    // Top Navigation Text Color
    $wp_customize->add_setting( 'graceful_blog_mag_options[top_navigation_text_color]', array(
        'default'    => graceful_blog_mag_options('top_navigation_text_color'),
        'type'       => 'option',
        'transport'  => 'refresh',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'graceful_blog_mag_options[top_navigation_text_color]', array(
        'label'     => esc_html__( 'Top Navigation Text Color', 'graceful-blog-mag' ),
        'section'   => 'graceful_top_navigation',
        'priority'  => 5
    ) ) );


    /** Main Navigation */
    // Main Navigation - Search button and Active link text Color
    $wp_customize->add_setting( 'graceful_blog_mag_options[main_navigation_active_link_color]', array(
        'default'    => graceful_blog_mag_options('main_navigation_active_link_color'),
        'type'       => 'option',
        'transport'  => 'refresh',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'graceful_blog_mag_options[main_navigation_active_link_color]', array(
        'label'     => esc_html__( 'Main Navigation Active Link Color', 'graceful-blog-mag' ),
        'section'   => 'graceful_main_navigation',
        'priority'  => 5
    ) ) );


    /** Popular Post Section */
    // Add Popular Post Section
    $wp_customize->add_section( 'graceful_popular_post_ticker' , array(
        'title'      => esc_html__( 'Popular Post', 'graceful-blog-mag' ),
        'priority'   => 24,
        'capability' => 'edit_theme_options'
    ) );

    // Enable Popular Post Section
    $wp_customize->add_setting( 'graceful_blog_mag_options[popular_post_ticker_show]', array(
        'default'    => graceful_blog_mag_options( 'popular_post_ticker_show' ),
        'type'       => 'option',
        'transport'  => 'refresh',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'graceful_sanitize_checkboxes'
    ) );
    $wp_customize->add_control( 'graceful_blog_mag_options[popular_post_ticker_show]', array(
        'label'     => esc_html__( 'Enable Popular Post Ticker', 'graceful-blog-mag' ),
        'section'   => 'graceful_popular_post_ticker',
        'type'      => 'checkbox',
        'priority'  => 1
    ) );


    /** Featured Boxes */
    // Featured Boxes section
    $wp_customize->add_section( 'graceful_blog_mag_featured_boxes' , array(
        'title'      => esc_html__( 'Featured Boxes', 'graceful-blog-mag' ),
        'priority'   => 27,
        'capability' => 'edit_theme_options'
    ) );

    // Featured Boxes 1
    $wp_customize->add_setting( 'graceful_blog_mag_options[featured_boxes_show]', array(
        'default'    => graceful_blog_mag_options( 'featured_boxes_show' ),
        'type'       => 'option',
        'transport'  => 'refresh',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'graceful_sanitize_checkboxes'
    ) );
    $wp_customize->add_control( 'graceful_blog_mag_options[featured_boxes_show]', array(
        'label'     => esc_html__( 'Enable Featured Boxes', 'graceful-blog-mag' ),
        'section'   => 'graceful_blog_mag_featured_boxes',
        'type'      => 'checkbox',
        'priority'  => 1
    ) );


    $wp_customize->add_setting( 'graceful_blog_mag_options[featured_boxes_title_1]', array(
        'default'    => graceful_blog_mag_options( 'featured_boxes_title_1' ),
        'type'       => 'option',
        'transport'  => 'refresh',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control( 'graceful_blog_mag_options[featured_boxes_title_1]', array(
        'label'     => esc_html__( 'Title 1', 'graceful-blog-mag' ),
        'section'   => 'graceful_blog_mag_featured_boxes',
        'type'      => 'text',
        'priority'  => 9
    ) );

    $wp_customize->add_setting( 'graceful_blog_mag_options[featured_boxes_url_1]', array(
        'default'    => graceful_blog_mag_options( 'featured_boxes_url_1' ),
        'type'       => 'option',
        'transport'  => 'refresh',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ) );
    $wp_customize->add_control( 'graceful_blog_mag_options[featured_boxes_url_1]', array(
        'label'     => esc_html__( 'URL 1', 'graceful-blog-mag' ),
        'section'   => 'graceful_blog_mag_featured_boxes',
        'type'      => 'text',
        'priority'  => 11
    ) );

    $wp_customize->add_setting( 'graceful_blog_mag_options[featured_boxes_image_1]', array(
        'default'   => '',
        'type'      => 'option',
        'transport' => 'refresh',
        'sanitize_callback' => 'graceful_sanitize_number_absint'
    ) );
    $wp_customize->add_control(
        new WP_Customize_Cropped_Image_Control( $wp_customize, 'graceful_blog_mag_options[featured_boxes_image_1]', array(
            'label'         => esc_html__( 'Image 1', 'graceful-blog-mag' ),
            'section'       => 'graceful_blog_mag_featured_boxes',
            'flex_width'    => false,
            'flex_height'   => false,
            'width'         => 600,
            'height'        => 340,
            'priority'      => 13
        )
    ) );

    // Featured Boxes Enable
    $wp_customize->add_setting( 'graceful_blog_mag_options[featured_boxes_show]', array(
        'default'    => graceful_blog_mag_options( 'featured_boxes_show' ),
        'type'       => 'option',
        'transport'  => 'refresh',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'graceful_sanitize_checkboxes'
    ) );
    $wp_customize->add_control( 'graceful_blog_mag_options[featured_boxes_show]', array(
        'label'     => esc_html__( 'Enable Featured Boxes', 'graceful-blog-mag' ),
        'section'   => 'graceful_blog_mag_featured_boxes',
        'type'      => 'checkbox',
        'priority'  => 1
    ) );

    // Featured Boxes 1
    $wp_customize->add_setting( 'graceful_blog_mag_options[featured_boxes_title_1]', array(
        'default'    => graceful_blog_mag_options( 'featured_boxes_title_1' ),
        'type'       => 'option',
        'transport'  => 'refresh',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control( 'graceful_blog_mag_options[featured_boxes_title_1]', array(
        'label'     => esc_html__( 'Title 1', 'graceful-blog-mag' ),
        'section'   => 'graceful_blog_mag_featured_boxes',
        'type'      => 'text',
        'priority'  => 9
    ) );

    $wp_customize->add_setting( 'graceful_blog_mag_options[featured_boxes_url_1]', array(
        'default'    => graceful_blog_mag_options( 'featured_boxes_url_1' ),
        'type'       => 'option',
        'transport'  => 'refresh',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ) );
    $wp_customize->add_control( 'graceful_blog_mag_options[featured_boxes_url_1]', array(
        'label'     => esc_html__( 'URL 1', 'graceful-blog-mag' ),
        'section'   => 'graceful_blog_mag_featured_boxes',
        'type'      => 'text',
        'priority'  => 11
    ) );

    $wp_customize->add_setting( 'graceful_blog_mag_options[featured_boxes_image_1]', array(
        'default'   => '',
        'type'      => 'option',
        'transport' => 'refresh',
        'sanitize_callback' => 'graceful_sanitize_number_absint'
    ) );
    $wp_customize->add_control(
        new WP_Customize_Cropped_Image_Control( $wp_customize, 'graceful_blog_mag_options[featured_boxes_image_1]', array(
            'label'         => esc_html__( 'Image 1', 'graceful-blog-mag' ),
            'section'       => 'graceful_blog_mag_featured_boxes',
            'flex_width'    => false,
            'flex_height'   => false,
            'width'         => 600,
            'height'        => 340,
            'priority'      => 13
        )
    ) );

    // Featured Boxes 2
    $wp_customize->add_setting( 'graceful_blog_mag_options[featured_boxes_title_2]', array(
        'default'    => graceful_blog_mag_options( 'featured_boxes_title_2' ),
        'type'       => 'option',
        'transport'  => 'refresh',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control( 'graceful_blog_mag_options[featured_boxes_title_2]', array(
        'label'     => esc_html__( 'Title 2', 'graceful-blog-mag' ),
        'section'   => 'graceful_blog_mag_featured_boxes',
        'type'      => 'text',
        'priority'  => 15
    ) );

    $wp_customize->add_setting( 'graceful_blog_mag_options[featured_boxes_url_2]', array(
        'default'    => graceful_blog_mag_options( 'featured_boxes_url_2' ),
        'type'       => 'option',
        'transport'  => 'refresh',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ) );
    $wp_customize->add_control( 'graceful_blog_mag_options[featured_boxes_url_2]', array(
        'label'     => esc_html__( 'URL 2', 'graceful-blog-mag' ),
        'section'   => 'graceful_blog_mag_featured_boxes',
        'type'      => 'text',
        'priority'  => 17
    ) );

    $wp_customize->add_setting( 'graceful_blog_mag_options[featured_boxes_image_2]', array(
        'default'   => '',
        'type'      => 'option',
        'transport' => 'refresh',
        'sanitize_callback' => 'graceful_sanitize_number_absint'
    ) );
    $wp_customize->add_control(
        new WP_Customize_Cropped_Image_Control( $wp_customize, 'graceful_blog_mag_options[featured_boxes_image_2]', array(
            'label'         => esc_html__( 'Image 2', 'graceful-blog-mag' ),
            'section'       => 'graceful_blog_mag_featured_boxes',
            'flex_width'    => false,
            'flex_height'   => false,
            'width'         => 600,
            'height'        => 340,
            'priority'      => 19
        )
    ) );

    // Featured Boxes 3
    $wp_customize->add_setting( 'graceful_blog_mag_options[featured_boxes_title_3]', array(
        'default'    => graceful_blog_mag_options( 'featured_boxes_title_3' ),
        'type'       => 'option',
        'transport'  => 'refresh',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control( 'graceful_blog_mag_options[featured_boxes_title_3]', array(
        'label'     => esc_html__( 'Title 3', 'graceful-blog-mag' ),
        'section'   => 'graceful_blog_mag_featured_boxes',
        'type'      => 'text',
        'priority'  => 21
    ) );

    $wp_customize->add_setting( 'graceful_blog_mag_options[featured_boxes_url_3]', array(
        'default'    => graceful_blog_mag_options( 'featured_boxes_url_3' ),
        'type'       => 'option',
        'transport'  => 'refresh',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ) );
    $wp_customize->add_control( 'graceful_blog_mag_options[featured_boxes_url_3]', array(
        'label'     => esc_html__( 'URL 3', 'graceful-blog-mag' ),
        'section'   => 'graceful_blog_mag_featured_boxes',
        'type'      => 'text',
        'priority'  => 23
    ) );

    $wp_customize->add_setting( 'graceful_blog_mag_options[featured_boxes_image_3]', array(
        'default'   => '',
        'type'      => 'option',
        'transport' => 'refresh',
        'sanitize_callback' => 'graceful_sanitize_number_absint'
    ) );
    $wp_customize->add_control(
        new WP_Customize_Cropped_Image_Control( $wp_customize, 'graceful_blog_mag_options[featured_boxes_image_3]', array(
            'label'         => esc_html__( 'Image 3', 'graceful-blog-mag' ),
            'section'       => 'graceful_blog_mag_featured_boxes',
            'flex_width'    => false,
            'flex_height'   => false,
            'width'         => 600,
            'height'        => 340,
            'priority'      => 25
        )
    ) );

    // Featured Boxes Layout Width
    $boxed_width_featured_boxes = array(
        'full' => esc_html__( 'Full', 'graceful-blog-mag' ),
        'wrapped' => esc_html__( 'Boxed', 'graceful-blog-mag' ),
    );

    $wp_customize->add_setting( 'graceful_blog_mag_options[featured_boxes_width]', array(
        'default'    => graceful_blog_mag_options( 'featured_boxes_width' ),
        'type'       => 'option',
        'transport'  => 'refresh',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'graceful_sanitize_select'
    ) );
    $wp_customize->add_control( 'graceful_blog_mag_options[featured_boxes_width]', array(
        'label'         => esc_html__( 'Featured Boxes Width', 'graceful-blog-mag' ),
        'section'       => 'graceful_basic',
        'type'          => 'select',
        'choices'       => $boxed_width_featured_boxes,
        'priority'      => 28
    ) );


}
add_action( 'customize_register', 'graceful_blog_mag_customize_register', 99 );

// Sanitize number absint
function graceful_sanitize_number_absint( $number, $setting ) {

    // ensure $number is an absolute integer
    $number = absint( $number );

    // return default if not integer
    return ( $number ? $number : $setting->default );

}

// Register Top Menu
register_nav_menus(
    array(
        'top'  => esc_html__( 'Top Menu', 'graceful-blog-mag' ),
    )
);

function graceful_top_menu_fallback() {
    if ( current_user_can( 'edit_theme_options' ) ) {
        ?>
        <ul id="top-menu">
            <li>
                <a href="<?php echo esc_url( home_url( '/wp-admin/nav-menus.php') ) ?>">
                    <?php esc_html_e( 'Set-up Top Menu', 'graceful-blog-mag' ) ?>
                </a>
            </li>
        </ul>
        <?php
    }
}

function graceful_blog_mag_options( $controls ) {

    $graceful_blog_mag_defaults = array(
        'top_navigation_show' => true,
        'top_navigation_bg' => '#29b0d5',
        'top_navigation_text_color' => '#ffffff',
        'main_navigation_active_link_color' => '#ff2c54',
        'popular_post_ticker_show' => true,
        'blog_grid_excerpt_length' => '50',
        'featured_boxes_show' => false,
        'featured_boxes_window' => true,
        'featured_boxes_width' => 'wrapped',
        'featured_boxes_title_1' => '',
        'featured_boxes_url_1' => '',
        'featured_boxes_image_1' => '',
        'featured_boxes_title_2' => '',
        'featured_boxes_url_2' => '',
        'featured_boxes_image_2' => '',
        'featured_boxes_title_3' => '',
        'featured_boxes_url_3' => '',
        'featured_boxes_image_3' => ''
    );

    // merge defaults and options
    $graceful_blog_mag_defaults = wp_parse_args( get_option( 'graceful_blog_mag_options' ), $graceful_blog_mag_defaults );

    // return control
    return $graceful_blog_mag_defaults[ $controls ];

}

// ----------------------------------------------------------------------------------
//  New Fonts
// ----------------------------------------------------------------------------------
function graceful_blog_mag_enqueue_assets()
{
    // Include the file.
    require_once get_theme_file_path('webfont-loader/wptt-webfont-loader.php');
    // Load the webfont.
    wp_enqueue_style(
        'graceful-blog-mag-fonts',
        wptt_get_webfont_url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=auto'),
        array(),
        '1.0'
    );
}
add_action('wp_enqueue_scripts', 'graceful_blog_mag_enqueue_assets');