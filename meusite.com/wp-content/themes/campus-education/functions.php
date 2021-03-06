<?php
/**
 * Campus Education functions and definitions
 * @package Campus Education
 */

/* Breadcrumb Begin */
function campus_education_the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
			echo esc_url( home_url() );
		echo '">';
			bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			the_category(',');
			if (is_single()) {
				echo "<span> ";
					the_title();
				echo "</span> ";
			}
		} elseif (is_page()) {
			the_title();
		}
	}
}

/* Theme Setup */
if ( ! function_exists( 'campus_education_setup' ) ) :

function campus_education_setup() {

	$GLOBALS['content_width'] = apply_filters( 'campus_education_content_width', 640 );
	
	load_theme_textdomain( 'campus-education', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('campus-education-homepage-thumb',240,145,true);
	
    register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'campus-education' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', campus_education_font_url() ) );

	// Theme Activation Notice
	global $pagenow;
	
	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'campus_education_activation_notice' );
	}
}
endif;
add_action( 'after_setup_theme', 'campus_education_setup' );

// Notice after Theme Activation
function campus_education_activation_notice() {
	echo '<div class="notice notice-success is-dismissible welcome">';
		echo '<h3>'. esc_html__( 'Greetings from Themesglance!!', 'campus-education' ) .'</h3>';
		echo '<p>'. esc_html__( 'A heartful thank you for choosing Themesglance. We promise to deliver only the best to you. Please proceed towards welcome section to get started.', 'campus-education' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=campus_education_guide' ) ) .'" class="button button-primary">'. esc_html__( 'About Theme', 'campus-education' ) .'</a></p>';
	echo '</div>';
}

/* Theme Widgets Setup */
function campus_education_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'campus-education' ),
		'description'   => __( 'Appears on blog page sidebar', 'campus-education' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'campus-education' ),
		'description'   => __( 'Appears on page sidebar', 'campus-education' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'campus-education' ),
		'description'   => __( 'Appears on page sidebar', 'campus-education' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'campus-education' ),
		'description'   => __( 'Appears on footer', 'campus-education' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'campus-education' ),
		'description'   => __( 'Appears on footer', 'campus-education' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'campus-education' ),
		'description'   => __( 'Appears on footer', 'campus-education' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'campus-education' ),
		'description'   => __( 'Appears on footer', 'campus-education' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'campus_education_widgets_init' );

/* Theme Font URL */
function campus_education_font_url() {
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Merriweather:300,300i,400,400i,700,700i,900,900i';
	$font_family[] = 'Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

/*radio button sanitization*/
 function campus_education_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Excerpt Limit Begin */
function campus_education_string_limit_words($string, $word_limit) {
$words = explode(' ', $string, ($word_limit + 1));
if(count($words) > $word_limit)
array_pop($words);
return implode(' ', $words);
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'campus_education_loop_columns');
if (!function_exists('campus_education_loop_columns')) {
	function campus_education_loop_columns() {
		return 3; // 3 products per row
	}
}

/* Theme enqueue scripts */
function campus_education_scripts() {
	wp_enqueue_style( 'campus-education-font', campus_education_font_url(), array() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'campus-education-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'campus-education-style', 'rtl', 'replace' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/fontawesome-all.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri().'/css/animate.css' );
	wp_enqueue_script( 'campus-education-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_style('campus-education-ie', get_template_directory_uri().'/css/ie.css', array('campus-education-basic-style'));
	wp_style_add_data( 'campus-education-ie', 'conditional', 'IE' );
}
add_action( 'wp_enqueue_scripts', 'campus_education_scripts' );

/* Theme Credit link */
define('CAMPUS_EDUCATION_THEMESGLANCE_PRO_THEME_URL','https://www.themesglance.com/themes/campus-education-wordpress-theme/','campus-education');
define('CAMPUS_EDUCATION_THEMESGLANCE_THEME_DOC','https://www.themesglance.com/demo/docs/campus-education-pro/','campus-education');
define('CAMPUS_EDUCATION_THEMESGLANCE_LIVE_DEMO','https://themesglance.com/campus-education-pro/','campus-education');
define('CAMPUS_EDUCATION_THEMESGLANCE_FREE_THEME_DOC','http://themesglance.com/demo/docs/free-campus-education/','campus-education');
define('CAMPUS_EDUCATION_THEMESGLANCE_SUPPORT','https://wordpress.org/support/theme/campus-education/','campus-education');
define('CAMPUS_EDUCATION_THEMESGLANCE_REVIEW','https://wordpress.org/support/theme/campus-education/reviews/','campus-education');
define('CAMPUS_EDUCATION_SITE_URL','https://www.themesglance.com/themes/free-education-wordpress-theme/','campus-education');

function campus_education_credit_link() {
    echo "<a href=".esc_url(CAMPUS_EDUCATION_SITE_URL)." target='_blank'>".esc_html__('','campus-education')."</a>";
}

function campus_education_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Implement the Get Started. */
require get_template_directory() . '/inc/getting-started/getting-started.php';