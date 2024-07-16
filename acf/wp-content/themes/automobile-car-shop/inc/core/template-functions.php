<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Automobile Car Shop
 */

/**
 * Add customizer default values.
 *
 * @param array $default_options
 * @return array
 */
function automobile_car_shop_customizer_add_defaults( $default_options) {
	$defaults = array(
		// Excerpt Options
		'automobile_car_shop_excerpt_length'    => 15,
	);

	$updated_defaults = wp_parse_args( $defaults, $default_options );

	return $updated_defaults;
}
add_filter( 'automobile_car_shop_customizer_defaults', 'automobile_car_shop_customizer_add_defaults' );

/**
 * Returns theme mod value saved for option merging with default option if available.
 * @since 1.0
 */
function automobile_car_shop_gtm( $option ) {
	// Get our Customizer defaults
	$defaults = apply_filters( 'automobile_car_shop_customizer_defaults', true );

	return isset( $defaults[ $option ] ) ? get_theme_mod( $option, $defaults[ $option ] ) : get_theme_mod( $option );
}

if ( ! function_exists( 'automobile_car_shop_excerpt_length' ) ) :
	/**
	 * Sets the post excerpt length to n words.
	 *
	 * function tied to the excerpt_length filter hook.
	 * @uses filter excerpt_length
	 */
	function automobile_car_shop_excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}

		// Getting data from Theme Options
		$length	= automobile_car_shop_gtm( 'automobile_car_shop_excerpt_length' );

		return absint( $length );
	} // automobile_car_shop_excerpt_length.
endif;
add_filter( 'excerpt_length', 'automobile_car_shop_excerpt_length', 999 );
