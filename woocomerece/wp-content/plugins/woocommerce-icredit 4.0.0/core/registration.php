<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

/**
 * @param $hook
 *
 * @return void
 *
 * add admin scripts
 */
function rivhit_admin_enqueue( $hook ) {
	$version = RIVHIT_VERSION;
	wp_enqueue_style( 'admin-css', plugin_dir_url( __FILE__ ) . '../assets/css/admin-rivhit.css', array(), $version );
	wp_enqueue_script( 'rivhit-app', plugin_dir_url( __FILE__ ) . '../assets/js/adminIcreditApp.min.js', array( 'jquery' ), $version );
	wp_localize_script( 'rivhit-app', 'cjpg_ajax_obj', array(
		'ajaxurl'     => admin_url( 'admin-ajax.php' ),
		'nonce'       => wp_create_nonce( 'rivhit_nonce_action' ),
		'message'     => __( 'Do you want to charge the order?', 'woocommerce_icredit' ),
		'message_err' => __( 'could not charge, try later', 'woocommerce_icredit' ),
	) );
	wp_enqueue_script( 'checkout-icredit-js', plugin_dir_url( __FILE__ ) . '../../assets/js/checkout.min.js', array(
		'jquery',
		'woocommerce',
		'wc-country-select',
		'wc-address-i18n'
	), $version, true );
}

add_action( 'admin_enqueue_scripts', 'rivhit_admin_enqueue' );

function rivhit_global_fron_enqueue() {
	$version = RIVHIT_VERSION;
	wp_enqueue_style( 'rivhit-css', plugin_dir_url( __FILE__ ) . '../assets/css/rivhit-css.css', array(), $version );
}

add_action( 'wp_enqueue_scripts', 'rivhit_global_fron_enqueue' );
