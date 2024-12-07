<?php
/**
 * fin-law functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fin-law
 */

if (!defined('_S_VERSION')) {
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
function fin_law_setup()
{
  /*
    * Make theme available for translation.
    * Translations can be filed in the /languages/ directory.
    * If you're building a theme based on fin-law, use a find and replace
    * to change 'fin-law' to the name of your theme in all the template files.
    */
  load_theme_textdomain('fin-law', get_template_directory() . '/languages');

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
      'fin_law_custom_background_args',
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
      'height' => 250,
      'width' => 250,
      'flex-width' => true,
      'flex-height' => true,
    )
  );
}

add_action('after_setup_theme', 'fin_law_setup');

function register_my_menus()
{
  // This theme uses wp_nav_menu() in one location.
  register_nav_menus(
    array(
      'menu-header' => esc_html__('Header', 'fin-law'),
      'menu-header-language' => esc_html__('Header-language', 'fin-law'),
      'top-menu-footer' => esc_html__('Top-Footer', 'fin-law'),
      'menu-footer' => esc_html__('Footer', 'fin-law'),
    )
  );
}

add_action('init', 'register_my_menus');
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fin_law_content_width()
{
  $GLOBALS['content_width'] = apply_filters('fin_law_content_width', 640);
}

add_action('after_setup_theme', 'fin_law_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fin_law_widgets_init()
{
  register_sidebar(
    array(
      'name' => esc_html__('Sidebar', 'fin-law'),
      'id' => 'sidebar-1',
      'description' => esc_html__('Add widgets here.', 'fin-law'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget' => '</section>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
    )
  );
}

add_action('widgets_init', 'fin_law_widgets_init');

/**
 * Enqueue scripts and styles.
 */


function fin_law_scripts()
{
  wp_enqueue_style('fin-law-style', get_stylesheet_uri(), array(), _S_VERSION);
  wp_enqueue_style('stylesheet', get_template_directory_uri() . '/assets/fonts/stylesheet.min.css', array(), '1.0.0');
  wp_enqueue_style('splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css', array(), '4.1.3');
  wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0');

  wp_enqueue_script('splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js', array(), '4.1.4', true);
  wp_enqueue_script('splide-grid', 'https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-grid@0.4.1/dist/js/splide-extension-grid.min.js', array(), '0.4.1', true);
  wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true);

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}

add_action('wp_enqueue_scripts', 'fin_law_scripts');
//add_action('admin_enqueue_scripts', 'fin_law_scripts');

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

//Adding an Options Page
if (function_exists('acf_add_options_page')) {
  acf_add_options_page();
}

//Register ACF Blocks
function register_acf_blocks()
{
  register_block_type(__DIR__ . '/blocks/main-news');
  register_block_type(__DIR__ . '/blocks/main-accordion');
  register_block_type(__DIR__ . '/blocks/main-hero');
  register_block_type(__DIR__ . '/blocks/main-financial-advisory');
}

add_action('init', 'register_acf_blocks');

//Registering your own style files and scripts for ACF blocks depending on their use
add_action('enqueue_block_assets', function () {
  if (has_block('acf/main-hero')) {
    wp_register_style('main-hero', get_template_directory_uri() . '/blocks/main-hero/style.css', array(), '1.0.0');
  }
  if (has_block('acf/main-financial-advisory')) {
    wp_register_style('main-financial-advisory', get_template_directory_uri() . '/blocks/main-financial-advisory/style.css', array(), '1.0.0');
    wp_register_script('main-financial-advisory', get_template_directory_uri() . '/blocks/main-financial-advisory/script.js', false, '1.0.0', true);
  }
  if (has_block('acf/main-accordion')) {
    wp_register_style('main-accordion', get_template_directory_uri() . '/blocks/main-accordion/style.css', array(), '1.0.0');
    wp_register_script('main-accordion', get_template_directory_uri() . '/blocks/main-accordion/script.js', false, '1.0.0', true);
  }
  if (has_block('acf/main-news')) {
    wp_register_style('main-news', get_template_directory_uri() . '/blocks/main-news/style.css', array(), '1.0.0');
  }
});


//Registering a new post type "Services"
function my_custom_init_services()
{
  register_taxonomy('services_type', 'services', array(
    'labels' => array(
      'name' => 'Services Types', // основное название во множественном числе
      'singular_name' => 'Service Type', // название единичного элемента таксономии
      'menu_name' => 'Services Types', // Название в меню. По умолчанию: name.
      'all_items' => 'Services Types',
      'edit_item' => 'Edit Service Type',
      'view_item' => 'View Service Type', // текст кнопки просмотра записи на сайте (если поддерживается типом)
      'update_item' => 'Update Service Type',
      'add_new_item' => 'Add New Service Type',
      'new_item_name' => 'New Name Service Type',
      'search_items' => 'Search Services Types',
      'popular_items' => 'Popular Services Types', // для таксономий без иерархий
      'not_found' => 'Not found Service Type',
      'back_to_items' => '← Back to Services Types',
    ),
    'show_in_quick_edit' => true,
    'show_admin_column' => true,
    'has_archive' => false,
    'hierarchical' => true,
  ));

  register_post_type('services', array(
    'labels' => array(
      'name' => 'Services', // Основное название типа записи
      'singular_name' => 'Service', // отдельное название записи типа services
      'add_new' => 'Add Service',
      'add_new_item' => 'Add Service',
      'edit_item' => 'Edit Service',
      'new_item' => 'New Service',
      'view_item' => 'View Service',
      'search_items' => 'Search Services',
      'not_found' => 'Services not found',
      'not_found_in_trash' => 'Services not_found_in_trash',
      'parent_item_colon' => '',
      'menu_name' => 'Services'
    ),
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_rest' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'has_archive' => false,
    'hierarchical' => true,
    'menu_position' => 4,
    'menu_icon' => 'dashicons-list-view',
    'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt'),
//    'rewrite' => array('slug' => 'produkt', 'with_front' => false),
  ));
}

add_action('init', 'my_custom_init_services');

//Registering a new post type "Team"
function my_custom_init_team()
{
  register_taxonomy('team_rank', 'team', array(
    'labels' => array(
      'name' => 'Team Rank', // основное название во множественном числе
      'singular_name' => 'Team Rank', // название единичного элемента таксономии
      'menu_name' => 'Team Ranks', // Название в меню. По умолчанию: name.
      'all_items' => 'Team Ranks',
      'edit_item' => 'Edit Team Rank',
      'view_item' => 'View Team Rank', // текст кнопки просмотра записи на сайте (если поддерживается типом)
      'update_item' => 'Update Team Rank',
      'add_new_item' => 'Add New Team Rank',
      'new_item_name' => 'New Name Team Rank',
      'search_items' => 'Search Team Ranks',
      'popular_items' => 'Popular Team Ranks', // для таксономий без иерархий
      'not_found' => 'Not found Team Rank',
      'back_to_items' => '← Back to Team Ranks',
    ),
    'show_in_quick_edit' => true,
    'show_admin_column' => true,
    'has_archive' => true,
    'hierarchical' => true,
  ));

  register_post_type('team', array(
    'labels' => array(
      'name' => 'Team', // Основное название типа записи
      'singular_name' => 'Team', // отдельное название записи типа services
      'add_new' => 'Add a Team Member',
      'add_new_item' => 'Add a Team Member',
      'edit_item' => 'Edit a team Member',
      'new_item' => 'New a Team Member',
      'view_item' => 'View a Team Member',
      'search_items' => 'Search Team',
      'not_found' => 'Team Members not found',
      'not_found_in_trash' => 'Team Members not_found_in_trash',
      'parent_item_colon' => '',
      'menu_name' => 'Team'
    ),
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_rest' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => true,
    'menu_position' => 4,
    'menu_icon' => 'dashicons-buddicons-buddypress-logo',
    'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt'),
//    'rewrite' => array('slug' => 'produkt', 'with_front' => false),
  ));
}

add_action('init', 'my_custom_init_team');

//Обрезаем длину краткого описания новостей
add_filter('the_excerpt', function ($excerpt) {
  return wp_trim_words($excerpt, 76, '...');
});

// Удаление обертки тегом з в плагине Contact Form 7
add_filter('wpcf7_autop_or_not', '__return_false');

// Убрать ненужные теги у Contact Form
add_filter('wpcf7_form_elements', function ($content) {
  // Убрать обёртку в виде <span>
//  $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

  // Убрать атрибуты size, rows, cols
  $content = preg_replace('/(size|rows|cols)="\d+"/i', '', $content);

  return $content;
});
