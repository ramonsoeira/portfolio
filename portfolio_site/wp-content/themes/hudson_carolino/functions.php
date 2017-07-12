<?php
/**
 * Portfólio Hudson Carolino functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Portfólio_Hudson_Carolino
 */

if ( ! function_exists( 'hudson_carolino_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function hudson_carolino_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Portfólio Hudson Carolino, use a find and replace
	 * to change 'hudson_carolino' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'hudson_carolino', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'hudson_carolino' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'hudson_carolino_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );
}
endif;
add_action( 'after_setup_theme', 'hudson_carolino_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hudson_carolino_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hudson_carolino_content_width', 640 );
}
add_action( 'after_setup_theme', 'hudson_carolino_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hudson_carolino_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'hudson_carolino' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'hudson_carolino' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'hudson_carolino_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hudson_carolino_scripts() {
	wp_enqueue_style( 'hudson_carolino-style', get_stylesheet_uri() );

	wp_enqueue_script( 'hudson_carolino-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'hudson_carolino-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hudson_carolino_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/********************************************
	REGISTRANDO MENUS
*********************************************/
function register_my_menus() {
	register_nav_menus(
		array(
			'menuAudioText' => __( 'Menu Topo AudioText' ),
			'menuRodapeAudioText' => __( 'Menu Rodapé AudioText' ),
		)
	);
}
add_action( 'init', 'register_my_menus' );

/********************************************
	//FUNÇÃO REDUX//
*********************************************/
if (class_exists('ReduxFramework')) {
	require_once (get_template_directory() . '/redux/sample-config.php');
}

/************************************************************
	//FUNÇÃO PARA MOSTRAR AS IMAGENS DA GALERIA DO REDUX//
************************************************************/
function wp_get_attachment( $attachment_id ) {
    $attachment = get_post( $attachment_id );
    return array(
        'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
        'caption' => $attachment->post_excerpt,
        'description' => $attachment->post_content,
        'href' => get_permalink( $attachment->ID ),
        'src' => $attachment->guid,
        'title' => $attachment->post_title
    );
}

/***********************************************************
	// VERSIONAMENTO DE FOLHAS DE ESTILO//
************************************************************/
	// VERSIONAMENTO DE FOLHAS DE ESTILO
	function versionamentoEstilos($estilos){
		$estilos->default_version = "12072017";
	}
	add_action("wp_default_styles", "versionamentoEstilos");
	// VERSIONAMENTO DE SCRIPTS
	function versionamentoScripts($scripts){
		$scripts->default_version = "12072017";
	}
	add_action("wp_default_scripts", "versionamentoScripts");

/***********************************************************
	// FUNÇÃO EXCERPT CARACTERS //
************************************************************/
function customExcerpt($qtdCaracteres) {
	$excerpt = get_the_excerpt();
	$qtdCaracteres++;
	if ( mb_strlen( $excerpt ) > $qtdCaracteres ) {
		$subex = mb_substr( $excerpt, 0, $qtdCaracteres - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '...';
	} else {
		echo $excerpt;
	}
}