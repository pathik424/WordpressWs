<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
 * Plugin Name: Woocommerce iCredit
 * Description: Enable Rivhit iCredit Payment Gateway
 * Version: 4.0.0
 * Author: rivhit
 * Author URI: https://www.rivhit.co.il/
 * Requires at least: 3.5
 * Tested up to: 6.4
 * License: GPLv2 or later
 * Text Domain: woocommerce icredit
 */

/**
 * iCredit class
 */
class iCredit {
	/**
	 * @var string
	 */
	public $plugin_url;

	/**
	 * @var string
	 */
	public $plugin_path;

	public function __construct(){
		define( 'RIVHIT_VERSION', '4.0.4' );
		$this->plugin_path = plugin_dir_path(__FILE__);
		define('ICREDIT_PLUGIN_URL', plugins_url('/', __FILE__));

		//Load icredit payment gateway
		add_action( 'woocommerce_loaded', array( $this, 'load_payment_gateways') );
		add_filter( 'woocommerce_payment_gateways', array( $this, 'icredit_gateway' ) );
		add_action( 'init', array( $this, 'init' ), 0 );
	}

	/**
	 * @return void
	 */
	function load_payment_gateways() {
		include_once 'core/registration.php';
		include_once 'core/gatewayHelper.php';
		include_once 'core/classes/Icredit_Admin_Fields.class.php';
		include_once 'core/classes/WC_Gateway_ICredit.class.php';
		include_once 'core/classes/Icredit_Admin.class.php';
		include_once 'core/classes/Icredit_Front.class.php';
	}

	/**
	 * @param $methods
	 *
	 * @return mixed
	 */
	public function icredit_gateway( $methods ) {
		$methods[] = 'WC_Gateway_ICredit' ;
		return $methods ;
	}

	/**
	 * @return void
	 */
	public function init(){
		load_plugin_textdomain('woocommerce_icredit', false, dirname( plugin_basename( __FILE__ ) ) . "/languages");
		do_action( 'icredit_payment_gateway_loaded' );
		// handle ipn response
		add_action( 'woocommerce_api_icredit_gateway', [ 'WC_Gateway_ICredit', 'icredit_gateway_ipn_response' ] );
		add_action( 'woocommerce_thankyou', [ 'Icredit_Front', 'icredit_add_content_thankyou' ] );
	}

	/**
	 * Get the plugin url.
	 *
	 * @access public
	 * @return string
	 */
	public function plugin_url() {
		if ( $this->plugin_url ) return $this->plugin_url;
		return $this->plugin_url = ICREDIT_PLUGIN_URL;
	}

}

$GLOBALS['icredit'] = new iCredit();
?>
