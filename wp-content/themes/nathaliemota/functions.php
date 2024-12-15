<?php

/**
 * Nathalie Mota functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Nathalie_Mota
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nathaliemota_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Nathalie Mota, use a find and replace
		* to change 'nathaliemota' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('nathaliemota', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Principal', 'nathaliemota'), // Muda de nome no wordpress deahboard
			'menu-2' => esc_html__('Footer', 'nathaliemota'), // Muda de nome no wordpress deahboard
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'nathaliemota_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'nathaliemota_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nathaliemota_content_width()
{
	$GLOBALS['content_width'] = apply_filters('nathaliemota_content_width', 640);
}
add_action('after_setup_theme', 'nathaliemota_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nathaliemota_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'nathaliemota'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'nathaliemota'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'nathaliemota_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function nathaliemota_scripts()
{
	wp_enqueue_style('nathaliemota-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('nathaliemota-style', 'rtl', 'replace');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/fonts/fontawesome/css/all.min.css', false, '6.4.2');
	wp_enqueue_style('theme-css', get_template_directory_uri() . '/assets/css/theme.css', array(), _S_VERSION);
	wp_enqueue_script('nathaliemota-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('nathaliemota-main', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, true);
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'nathaliemota_scripts');

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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**Ajax fuction add **/
function enqueue_load_more_script()
{
	wp_enqueue_script('load-more-photos', get_template_directory_uri() . '/js/load-more-photos.js', ['jquery'], null, true);

	// Passa a URL de AJAX e outros parâmetros para o JavaScript
	wp_localize_script('load-more-photos', 'ajax_params', [
		'ajax_url' => admin_url('admin-ajax.php'),
	]);
}
add_action('wp_enqueue_scripts', 'enqueue_load_more_script');

function load_more_photos()
{
	// Obtém o número da página enviado via AJAX
	$paged = isset($_POST['page']) ? intval($_POST['page']) : 1;

	$args = array(
		'post_type'      => 'photo',
		'posts_per_page' => 8, // Número de imagens por página
		'paged'          => $paged,
		'order'          => 'DESC',
		'orderby'        => 'DATE',
	);

	$query = new WP_Query($args);

	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			get_template_part('template-parts/photo/one-photo'); // Renderiza o template de cada imagem
		}

		// Adiciona uma classe no último bloco para indicar que não há mais posts
		if ($paged >= $query->max_num_pages) {
			echo '<div class="no-more-posts"></div>';
		}
	}

	wp_die(); // Finaliza a requisição AJAX
}
add_action('wp_ajax_load_more_photos', 'load_more_photos');
add_action('wp_ajax_nopriv_load_more_photos', 'load_more_photos'); // Permite acesso para visitantes
