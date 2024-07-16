<?php
/**
 * Automobile Car Shop: Block Patterns
 *
 * @since Automobile Car Shop 1.0
 */

 /**
  * Get patterns content.
  *
  * @param string $file_name Filename.
  * @return string
  */
function automobile_car_shop_get_pattern_content( $file_name ) {
	ob_start();
	include get_theme_file_path( '/patterns/' . $file_name . '.php' );
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}

/**
 * Registers block patterns and categories.
 *
 * @since Automobile Car Shop 1.0
 *
 * @return void
 */
function automobile_car_shop_register_block_patterns() {

	$patterns = array(
		'header-default' => array(
			'title'      => __( 'Default header', 'automobile-car-shop' ),
			'categories' => array( 'automobile-car-shop-headers' ),
			'blockTypes' => array( 'parts/header' ),
		),
		'footer-default' => array(
			'title'      => __( 'Default footer', 'automobile-car-shop' ),
			'categories' => array( 'automobile-car-shop-footers' ),
			'blockTypes' => array( 'parts/footer' ),
		),
		'home-banner' => array(
			'title'      => __( 'Home Banner', 'automobile-car-shop' ),
			'categories' => array( 'automobile-car-shop-banner' ),
		),
		'performance-section' => array(
			'title'      => __( 'Performance Section', 'automobile-car-shop' ),
			'categories' => array( 'automobile-car-shop-performance-section' ),
		),
		'primary-sidebar' => array(
			'title'    => __( 'Primary Sidebar', 'automobile-car-shop' ),
			'categories' => array( 'automobile-car-shop-sidebars' ),
		),
		'hidden-404' => array(
			'title'    => __( '404 content', 'automobile-car-shop' ),
			'categories' => array( 'automobile-car-shop-pages' ),
		),
		'post-listing-single-column' => array(
			'title'    => __( 'Post Single Column', 'automobile-car-shop' ),
			//'inserter' => false,
			'categories' => array( 'automobile-car-shop-query' ),
		),
		'post-listing-two-column' => array(
			'title'    => __( 'Post Two Column', 'automobile-car-shop' ),
			//'inserter' => false,
			'categories' => array( 'automobile-car-shop-query' ),
		),
		'post-listing-three-column' => array(
			'title'    => __( 'Post Three Column', 'automobile-car-shop' ),
			//'inserter' => false,
			'categories' => array( 'automobile-car-shop-query' ),
		),
		'post-listing-four-column' => array(
			'title'    => __( 'Post Four Column', 'automobile-car-shop' ),
			//'inserter' => false,
			'categories' => array( 'automobile-car-shop-query' ),
		),
		'feature-post-column' => array(
			'title'    => __( 'Feature Post Column', 'automobile-car-shop' ),
			//'inserter' => false,
			'categories' => array( 'automobile-car-shop-query' ),
		),
		'comment-section-1' => array(
			'title'    => __( 'Comment Section 1', 'automobile-car-shop' ),
			'categories' => array( 'automobile-car-shop-comment-sections' ),
		),
		'cover-with-post-title' => array(
			'title'    => __( 'Cover With Post Title', 'automobile-car-shop' ),
			'categories' => array( 'automobile-car-shop-banner-sections' ),
		),
		'theme-button' => array(
			'title'    => __( 'Theme Button', 'automobile-car-shop' ),
			'categories' => array( 'automobile-car-shop-theme-button' ),
		),
	);

	$block_pattern_categories = array(
		'automobile-car-shop-footers' => array( 'label' => __( 'Footers', 'automobile-car-shop' ) ),
		'automobile-car-shop-headers' => array( 'label' => __( 'Headers', 'automobile-car-shop' ) ),
		'automobile-car-shop-pages'   => array( 'label' => __( 'Pages', 'automobile-car-shop' ) ),
		'automobile-car-shop-query'   => array( 'label' => __( 'Query', 'automobile-car-shop' ) ),
		'automobile-car-shop-sidebars'   => array( 'label' => __( 'Sidebars', 'automobile-car-shop' ) ),
		'automobile-car-shop-banner'   => array( 'label' => __( 'Banner Sections', 'automobile-car-shop' ) ),
		'automobile-car-shop-performance-section'   => array( 'label' => __( 'Performance Sections', 'automobile-car-shop' ) ),
		'automobile-car-shop-comment-section'   => array( 'label' => __( 'Comment Sections', 'automobile-car-shop' ) ),
		'automobile-car-shop-theme-button'   => array( 'label' => __( 'Theme Button Sections', 'automobile-car-shop' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since Automobile Car Shop 1.0
	 *
	 * @param array[] $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 *     @type array[] $properties {
	 *         An array of block category properties.
	 *
	 *         @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'automobile_car_shop_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	/**
	 * Filters the theme block patterns.
	 *
	 * @since Automobile Car Shop 1.0
	 *
	 * @param array $block_patterns List of block patterns by name.
	 */
	$patterns = apply_filters( 'automobile_car_shop_block_patterns', $patterns );

	foreach ( $patterns as $block_pattern => $pattern ) {
		$pattern['content'] = automobile_car_shop_get_pattern_content( $block_pattern );
		register_block_pattern(
			'automobile-car-shop/' . $block_pattern,
			$pattern
		);
	}
}
add_action( 'init', 'automobile_car_shop_register_block_patterns', 9 );
