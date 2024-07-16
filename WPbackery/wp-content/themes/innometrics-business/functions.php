<?php
if (!defined('INNOMETRICS_BUSINESS_VERSION')) {
    // Replace the version number of the theme on each release.
    define('INNOMETRICS_BUSINESS_VERSION', wp_get_theme()->get('Version'));
}
define('INNOMETRICS_BUSINESS_DEBUG', defined('WP_DEBUG') && WP_DEBUG === true);
define('INNOMETRICS_BUSINESS_DIR', trailingslashit(get_template_directory()));
define('INNOMETRICS_BUSINESS_URL', trailingslashit(get_template_directory_uri()));

if (!function_exists('INNOMETRICS_BUSINESS_support')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * @since walker_fse 1.0.0
     *
     * @return void
     */
    function INNOMETRICS_BUSINESS_support()
    {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        // Add support for block styles.
        add_theme_support('wp-block-styles');
        add_theme_support('post-thumbnails');
        // Enqueue editor styles.
        add_editor_style('style.css');
    }

endif;
add_action('after_setup_theme', 'INNOMETRICS_BUSINESS_support');

/*----------------------------------------------------------------------------------
Enqueue Styles
-----------------------------------------------------------------------------------*/
if (!function_exists('INNOMETRICS_BUSINESS_styles')) :
    function INNOMETRICS_BUSINESS_styles()
    {
        // registering style for theme
        wp_enqueue_style('innometrics-business-style', get_stylesheet_uri(), array(), INNOMETRICS_BUSINESS_VERSION);
        wp_enqueue_style('innometrics-business-blocks-style', get_template_directory_uri() . '/assets/css/blocks.css');
        if (is_rtl()) {
            wp_enqueue_style('innometrics-business-rtl-css', get_template_directory_uri() . '/assets/css/rtl.css', 'rtl_css');
        }
        wp_enqueue_script('jquery');
        wp_enqueue_script('innometrics-business-scripts', get_template_directory_uri() . '/assets/js/innometrics-business-scripts.js', array(), INNOMETRICS_BUSINESS_VERSION, true);
    }
endif;

add_action('wp_enqueue_scripts', 'INNOMETRICS_BUSINESS_styles');

/**
 * Enqueue scripts for admin area
 */
function INNOMETRICS_BUSINESS_admin_style()
{
    $hello_notice_current_screen = get_current_screen();
    if (!empty($_GET['page']) && 'about-innometrics-business' === $_GET['page'] || $hello_notice_current_screen->id === 'themes' || $hello_notice_current_screen->id === 'dashboard') {
        wp_enqueue_style('innometrics-business-admin-style', get_template_directory_uri() . '/assets/css/admin-style.css', array(), INNOMETRICS_BUSINESS_VERSION, 'all');
        wp_enqueue_script('innometrics-business-admin-scripts', get_template_directory_uri() . '/assets/js/innometrics-business-admin-scripts.js', array(), INNOMETRICS_BUSINESS_VERSION, true);
    }
}
add_action('admin_enqueue_scripts', 'INNOMETRICS_BUSINESS_admin_style');

/**
 * Enqueue assets scripts for both backend and frontend
 */
function INNOMETRICS_BUSINESS_block_assets()
{
    wp_enqueue_style('innometrics-business-blocks-style', get_template_directory_uri() . '/assets/css/blocks.css');
}
add_action('enqueue_block_assets', 'INNOMETRICS_BUSINESS_block_assets');

/**
 * Load core file.
 */
require_once get_template_directory() . '/inc/core/init.php';

if (!function_exists('INNOMETRICS_BUSINESS_excerpt_more_postfix')) {
    function INNOMETRICS_BUSINESS_excerpt_more_postfix($more)
    {
        if (is_admin()) {
            return $more;
        }
        return '...';
    }
    add_filter('excerpt_more', 'INNOMETRICS_BUSINESS_excerpt_more_postfix');
}
function INNOMETRICS_BUSINESS_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'INNOMETRICS_BUSINESS_add_woocommerce_support');

