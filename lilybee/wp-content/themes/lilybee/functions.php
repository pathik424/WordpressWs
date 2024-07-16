<?php

/**
 * lilybee functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lilybee
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
function lilybee_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on lilybee, use a find and replace
		* to change 'lilybee' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('lilybee', get_template_directory() . '/languages');

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
			'header_left' => esc_html__('Primary-menu', 'lilybee'),
			'header_right' => esc_html__('main-menu', 'lilybee'),
			'footer-left' => esc_html__( 'Footer-left-menu', 'lilybee' ),
			'footer-right' => esc_html__( 'Footer-main-menu', 'lilybee' ),
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
			'lilybee_custom_background_args',
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
add_action('after_setup_theme', 'lilybee_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lilybee_content_width()
{
	$GLOBALS['content_width'] = apply_filters('lilybee_content_width', 640);
}
add_action('after_setup_theme', 'lilybee_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lilybee_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'lilybee'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'lilybee'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'lilybee_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function lilybee_scripts()
{
	wp_enqueue_style('lilybee-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('lilybee-style', 'rtl', 'replace');


	/********** css ***********/

	wp_enqueue_style('lilybee-slider', get_template_directory_uri()  . '/css/swiper-bundle.min.css', array(), _S_VERSION);
	wp_enqueue_style('lilybee-media', get_template_directory_uri()  . '/css/media.css', array(), _S_VERSION);



	/********** js ***********/

	wp_enqueue_script('lilybee-jquery1', get_template_directory_uri() . '/js/jquery.min.js', array(), _S_VERSION, false);
	wp_enqueue_script('lilybee-slider-js', get_template_directory_uri() . '/js/swiper-bundle.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('magnific-popup-js', get_template_directory_uri() . '/js/jquery.magnific-popup.js', array(), _S_VERSION, true);
	wp_enqueue_script('popup-js', get_template_directory_uri() . '/js/popup.js', array(), _S_VERSION, true);
	wp_enqueue_script('lilybee-custom', get_template_directory_uri() . '/js/custom.js', array(), filemtime(get_template_directory() . '/js/custom.js'), true);



	wp_enqueue_script('lilybee-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'lilybee_scripts');

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












if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title'     => 'Theme General Settings',
		'menu_title'    => 'Theme Settings',
		'menu_slug'     => 'theme-general-settings',
		'capability'    => 'edit_posts',
		'redirect'        => true,
	));

	acf_add_options_sub_page(array(
		'page_title'    => 'Theme Header Settings',
		'menu_title'    => 'Header',
		'parent_slug'   => 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title'    => 'Theme Footer Settings',
		'menu_title'    => 'Footer',
		'parent_slug'   => 'theme-general-settings',
	));
	acf_add_options_sub_page(array(
		'page_title'    => 'Product List',
		'menu_title'    => 'Shop Page',
		'parent_slug'   => 'theme-general-settings',
	));
}


// Add WooCommerce support
add_theme_support('woocommerce');





/* Breadcrumbs Function */
function get_hansel_and_gretel_breadcrumbs()
{
	// Set variables for later use
	$home_link        = home_url('/');
	$home_text        = __('Home');
	$link_before      = '<span typeof="v:Breadcrumb">';
	$link_after       = '<strong> / </strong> </span>';
	$link_attr        = ' rel="v:url" property="v:title"';
	$link             = '<a' . $link_attr . ' href="%1$s">' . $link_before . '%2$s' . $link_after . '</a>';
	$after            = '</span>'; // Tag after the current crumb
	$page_addon       = ''; // Adds the page number if the query is paged
	$breadcrumb_trail = '';
	$category_links   = '';
	$breadcrumb_output_link = '';
	$before           = '';

	// Get the shop page ID
	$shop_page_id = wc_get_page_id('shop');

	// Append "Home" link
	$breadcrumb_trail .= sprintf($link, $home_link, $home_text);

	/** 
	 * Set our own $wp_the_query variable. Do not use the global variable version due to 
	 * reliability
	 */
	$wp_the_query   = $GLOBALS['wp_the_query'];
	$queried_object = $wp_the_query->get_queried_object();

	// Handle single post requests which includes single pages, posts and attachments
	if (is_singular()) {
		// Set variables 
		$title          = apply_filters('the_title', $queried_object->post_title);
		$post_type      = $queried_object->post_type;
		$post_link      = $before . $title . $after;
		$parent_string  = '';
		$post_type_link = '';

		if (!in_array($post_type, ['post', 'page', 'attachment'])) {
			$post_type_object = get_post_type_object($post_type);
			$archive_link     = esc_url(get_post_type_archive_link($post_type));

			$post_type_link   = sprintf($link, $archive_link, $post_type_object->labels->singular_name);
		}

		// Build the breadcrumb trail for single posts
		if ($post_type_link) {
			$breadcrumb_trail .= $post_type_link;
		}

		// Append a link to the blog list page
		if ($post_type === 'post') {
			$blog_list_page_url = get_permalink(439); // Replace 123 with your blog list page ID
			$blog_list_link = sprintf($link, $blog_list_page_url, 'Story List'); // Change 'Story List' to the desired link text
			$breadcrumb_trail .= $blog_list_link;
		}
	} elseif (is_shop()) {
		// Append "Shop" link for the shop page without URL
		$breadcrumb_trail .= $before . get_the_title($shop_page_id) . $after;
	}

	// Append the current page
	if (is_singular()) {
		$breadcrumb_trail .= $before . get_the_title() . $after;
	}

	// Handle archives, search page, 404, and paged pages (similar to your existing code)

	// Return the breadcrumb output
	$breadcrumb_output_link .= '<div class="breadcrumb">' . $breadcrumb_trail . '</div><!-- .breadcrumbs -->';

	return $breadcrumb_output_link;
}


// remove rating
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);




// shipping option
add_action('wp_enqueue_scripts', 'custom_shipping_scripts');
function custom_shipping_scripts() {
    wp_enqueue_script('custom-shipping-js', get_template_directory_uri() . '/js/custom-shipping.js', array('jquery'), '1.0', true);
    wp_localize_script('custom-shipping-js', 'custom_shipping', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'wc_ajax_nonce' => wp_create_nonce('woocommerce_ajax_nonce')
    ));
}

add_action('wp_ajax_update_shipping_methods', 'update_shipping_methods');
add_action('wp_ajax_nopriv_update_shipping_methods', 'update_shipping_methods');
function update_shipping_methods() {
    $cart_total = WC()->cart->get_cart_contents_total();

    if ($cart_total >= 40) {
        WC()->session->set('chosen_shipping_methods', array('free_shipping:free_shipping')); // Change to correct Free Shipping method ID
    } else {
        WC()->session->set('chosen_shipping_methods', array('flat_rate:1')); // Change to correct Flat Rate method ID
    }

    WC()->cart->calculate_totals();
    WC()->cart->maybe_set_cart_cookies();

    wp_send_json(array('success' => true));
}

add_filter('woocommerce_package_rates', 'hide_shipping_methods_based_on_cart_total', 100, 2);
function hide_shipping_methods_based_on_cart_total($rates, $package) {
    $cart_total = WC()->cart->get_cart_contents_total();

    if ($cart_total >= 40) {
        foreach ($rates as $rate_key => $rate) {
            if ('flat_rate' === $rate->method_id) {
                unset($rates[$rate_key]);
            }
        }
    } else {
        foreach ($rates as $rate_key => $rate) {
            if ('free_shipping' === $rate->method_id) {
                unset($rates[$rate_key]);
            }
        }
    }

    return $rates;
}

add_action('woocommerce_before_cart', 'auto_select_shipping_method');
add_action('woocommerce_before_checkout_form', 'auto_select_shipping_method');

function auto_select_shipping_method() {
    if ( WC()->cart ) {
        $cart_total = WC()->cart->get_cart_contents_total();

        if ($cart_total >= 40) {
            foreach ( WC()->shipping()->get_packages() as $package ) {
                foreach ( $package['rates'] as $rate_id => $rate ) {
                    if ( $rate->method_id === 'free_shipping' ) {
                        WC()->session->set( 'chosen_shipping_methods', array( $rate_id ) );
                        break 2;
                    }
                }
            }
        }
    }
}
