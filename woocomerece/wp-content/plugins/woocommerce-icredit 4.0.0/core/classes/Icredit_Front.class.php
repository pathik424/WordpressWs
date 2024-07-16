<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'Icredit_Front' ) ) {
	/**
	 * class Icredit_Front
	 */
	class Icredit_Front {
		private static $instance = null;
		private
			$option_key,
			$settings;

		/**
		 * IcreditAdmin constructor.
		 */
		public function __construct() {
			$this->option_key = 'woocommerce_icredit_payment_settings';
			$this->settings   = $this->get_icredit_woo_options();

			add_action( 'woocommerce_review_order_before_submit', [ $this, 'remove_form_cc_from_checkout' ] );
			add_action( 'woocommerce_account_add-payment-method_endpoint', [ $this, 'remove_form_cc_from_add_payment' ] );
			add_action( 'woocommerce_credit_card_form_end', [ $this, 'remove_form_cc_from_pay_order' ] );
			add_action( 'woocommerce_after_order_notes', [ $this, 'my_add_additional_hidden_input' ], 10, 2 );

			//add_action( 'woocommerce_review_order_after_submit', [ $this, 'position_iframe_icredit_front' ] );
			//add_action( 'woocommerce_review_order_after_payment', [ $this, 'position_iframe_icredit_front' ] );
			//add_action( 'woocommerce_checkout_after_order_review', [ $this, 'position_iframe_icredit_front' ] );
			add_action( 'woocommerce_after_checkout_form', [ $this, 'position_iframe_icredit_front' ] );

			add_action( 'wp_enqueue_scripts', [ $this, 'icredit_load_public_script' ] );
            add_action( 'wp_ajax_nopriv_icredit_ajax_clear_cart', [ $this, 'icredit_ajax_clear_cart'] );
            add_action( 'wp_ajax_icredit_ajax_clear_cart', [ $this, 'icredit_ajax_clear_cart'] );
            add_action( 'woocommerce_before_thankyou', [ $this, 'icredit_ajax_clear_cart'] );
		}

		/**
		 * security reasons
		 */
		private function __clone() {
		}

		/**
		 * @return Icredit_Front|null
		 */
		public static function getInstance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * @return mixed
		 */
		private function get_icredit_woo_options() {
			return get_option( $this->option_key, null );
		}

		/**
		 * @return void
		 *
		 * add public resource
		 */
		public function icredit_load_public_script() {
			$version = RIVHIT_VERSION;
			if ( $this->settings['popup_mode'] == 'popup' && is_checkout() ) {
				wp_scripts()->registered['wc-checkout']->src = ICREDIT_PLUGIN_URL . 'assets/js/checkout.js';
				wp_scripts()->registered['wc-checkout']->version = $version;
			}
		}

		/**
		 * @param $checkout
		 *
		 * @return void
		 */
		public function my_add_additional_hidden_input( $checkout ) {
			$template = '';
			if ( $this->settings['popup_mode'] == 'popup' ) {
				$template = '<input type="hidden" class="input-hidden" name="method_same_page_option" id="method_same_page_option" value="same">';
			}
			echo $template;
		}

		/**
		 * @return void
		 */
		public function position_iframe_icredit_front() {
			echo '<div id="iframeSamePageIcreditOverlay" aria-expanded="false" aria-hidden="true"></div><div id="iframeSamePageIcredit" aria-expanded="false" aria-hidden="true"><button id="close_icredit_iframe_checkout" data-toggle="#iframeSamePageIcreditOverlay" aria-controls="iframeSamePageIcredit" name="toggle close" title="close" aria-label="cloe" role="button" type="button">&times;</button><div class="inner_iframeSamePageIcredit"></div></div>';
		}

		/**
		 * @return void
		 */
        public function icredit_ajax_clear_cart() {
	        WC()->cart->empty_cart();
	        WC()->session->set('cart', array());
        }

		/**
		 * @return void
		 */
		public function remove_form_cc_from_checkout() {
			?>
            <script type="text/javascript">
                jQuery('#wc-icredit_payment-cc-form').remove();
            </script>
			<?php
		}

		/**
		 * @return void
		 */
		public function remove_form_cc_from_add_payment() {
			?>
            <script type="text/javascript">
                jQuery('#wc-icredit_payment-cc-form').remove();
            </script>
			<?php
		}

		/**
		 * @return void
		 */
		public function remove_form_cc_from_pay_order() {
			?>
            <script type="text/javascript">
                jQuery('#wc-icredit_payment-cc-form').remove();
            </script>
			<?php
		}

		/**
		 * @return void
		 * get outside the popup iframe in thank-you page
		 */
		public static function icredit_add_content_thankyou() {
			if ( isset( $_SERVER['HTTP_SEC_FETCH_DEST'] ) && $_SERVER['HTTP_SEC_FETCH_DEST'] == 'iframe' || !empty( $_GET ) ) {
                echo '<style>#leaderThankYou{position:fixed;overflow:hidden;background:#fff;width:100%;height:100%;left:0;top:0;z-index:999;}#leaderThankYou svg{position:absolute;right:0;left:0;margin:0 auto;top:30%;max-width:120px;color:#257CE1;fill:#257CE1;}#leaderThankYou svg path{fill:#257CE1;}</style>';
                echo '<div id="leaderThankYou" style=""><svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                        <path fill="#257CE1" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                          <animateTransform style="color:#257CE1;background-color:#257CE1;" attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite"></animateTransform>
                      </path>
                    </svg></div>';
            }
			echo '<script>
				function IcredtidTestInIframe () {
				    try {
				        return window.self !== window.top;
				    } catch (e) {
				        return true;
				    }
				}
                if ( IcredtidTestInIframe() ) {
					window.parent.location.href = window.location.href;
                } else {
                	document.getElementById("leaderThankYou").setAttribute("style","display:none"); 
                }
			</script>';
		}

	}

	$selfIcreditFront = new Icredit_Front();
}
