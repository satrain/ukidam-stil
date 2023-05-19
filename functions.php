<?php

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ukidam_theme_setup() {
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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'foodordering' ),
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

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

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
add_action( 'after_setup_theme', 'ukidam_theme_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ukidam_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'foodordering' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'foodordering' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ukidam_widgets_init' );

/*
* Creating a function to create CPT menu
*/
  
function ukidam_register_cpt() {
  
    $labels = array(
        'name'                => _x( 'Products', 'Post Type General Name', 'twentytwentyone' ),
        'singular_name'       => _x( 'Product', 'Post Type Singular Name', 'twentytwentyone' ),
        'menu_name'           => __( 'Products', 'twentytwentyone' ),
        'parent_item_colon'   => __( 'Parent Product', 'twentytwentyone' ),
        'all_items'           => __( 'All Products', 'twentytwentyone' ),
        'view_item'           => __( 'View Product', 'twentytwentyone' ),
        'add_new_item'        => __( 'Add New Product', 'twentytwentyone' ),
        'add_new'             => __( 'Add New Product', 'twentytwentyone' ),
        'edit_item'           => __( 'Edit Product', 'twentytwentyone' ),
        'update_item'         => __( 'Update Product', 'twentytwentyone' ),
        'search_items'        => __( 'Search Product', 'twentytwentyone' ),
        'not_found'           => __( 'Not Found', 'twentytwentyone' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwentyone' ),
    );
          
    $args = array(
        'label'               => __( 'products', 'twentytwentyone' ),
        'description'         => __( 'Shop products', 'twentytwentyone' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'show_in_rest'       => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
    
    );
        
    register_post_type( 'products', $args );
} 
add_action( 'init', 'ukidam_register_cpt', 0 );

/**
 * enqueue styles and scripts
 */
function ukidam_enqueue_styles_scripts() {
    wp_register_style('main_style', get_template_directory_uri() . '/css/style.css', array(), _S_VERSION, 'all');
    wp_enqueue_style('main_style');

    wp_enqueue_script( 'main_script', get_template_directory_uri() . '/js/script.js', array(), _S_VERSION, true );
}
add_action('wp_enqueue_scripts', 'ukidam_enqueue_styles_scripts');


?>