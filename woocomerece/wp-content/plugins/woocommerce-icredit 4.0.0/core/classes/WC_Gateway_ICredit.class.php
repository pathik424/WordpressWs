<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'WC_Gateway_ICredit' ) ) {
	/**
	 * iCredit Payment Gateway
	 * Checked for WooCommerce Version 4.7
	 *
	 * Provides a iCredit Payment Gateway.
	 *
	 * @class        WC_Gateway_ICredit
	 * @extends        WC_Payment_Gateway_CC
	 */
	class WC_Gateway_ICredit extends WC_Payment_Gateway_CC {
		private static $instance = null;
		public
			$ipn_method,
			$logging,
			$loggingRequests,
			$logger = null,
			$id;

		private static $m_called = false;

		private
			$wp,
			$wp_query,
			$wp_the_query,
			$wp_rewrite,
			$wp_did_header,
			$woocommerce,
			$admin_fields_class,
			$success_url,
			$error_url,
			$cancel_url,
			$redirect_url,
			$hide_items,
			$max_payments,
			$credit_from_payment,
			$saleType,
			$document_language,
			$exempt_vat,
			$popup_mode,
			$http_https,
			$ipn_integration,
			$field_company,
			$user_comments,
			$use_shipping_fields,
			$icredit_verify_gateway_url,
			$icredit_payment_gateway_url,
			$icredit_payment_gateway_get_token_details,
			$icredit_payment_gateway_sale_details,
			$payment_token1,
			$payment_token2,
			$credit_box_token,
			$real_token_lang_symbol_1,
			$real_token_lang_1,
			$real_token_lang_2,
			$real_token_lang_key,
			$real_token_lang_key2,
			$ipn_url,
			$ipn_url_failure,
			$products_variation_type,
			$status_for_failed_orders,
			$field_firstname,
			$field_lastname,
			$field_email,
			$field_address,
			$field_city,
			$field_phonenumber,
			$field_zipcode,
			$show_icredit_logo,
			$do_status_charge_j5,
			$status_charge_j5_type,
			$create_token,
			$ChargePendingSale;

		const ICREDIT_VERIFY_GATEWAY_URL_TEST = 'https://testicredit.rivhit.co.il/API/PaymentPageRequest.svc/Verify';
		const ICREDIT_VERIFY_GATEWAY_URL_REAL = 'https://icredit.rivhit.co.il/API/PaymentPageRequest.svc/Verify';
		const ICREDIT_PAYMENT_GATEWAY_URL_TEST = 'https://testicredit.rivhit.co.il/API/PaymentPageRequest.svc/GetUrl';
		const ICREDIT_PAYMENT_GATEWAY_URL_REAL = 'https://icredit.rivhit.co.il/API/PaymentPageRequest.svc/GetUrl';
		const ICREDIT_PAYMENT_GATEWAY_TOKEN_URL_TEST = 'https://testicredit.rivhit.co.il/API/PaymentPageRequest.svc/SaleChargeToken';
		const ICREDIT_PAYMENT_GATEWAY_TOKEN_CHARGE_URL_TEST = 'https://testicredit.rivhit.co.il/API/PaymentPageRequest.svc/ChargePendingSale';
		const ICREDIT_PAYMENT_GATEWAY_TOKEN_URL_REAL = 'https://icredit.rivhit.co.il/API/PaymentPageRequest.svc/SaleChargeToken'; // להשתמש ב טוקן 2 אם קיים על פני 1
		const ICREDIT_PAYMENT_GATEWAY_TOKEN_CHARGE_URL_REAL = 'https://icredit.rivhit.co.il/API/PaymentPageRequest.svc/ChargePendingSale'; // להשתמש ב טוקן 2 אם קיים על פני 1
		const ICREDIT_PAYMENT_GATEWAY_TOKEN_DETAILS_REAL = 'https://pci.rivhit.co.il/api/RivhitRestAPIService.svc/GetTokenDetails';
		const ICREDIT_PAYMENT_GATEWAY_TOKEN_DETAILS_TEST = 'https://testpci.rivhit.co.il/api/RivhitRestAPIService.svc/GetTokenDetails';
		const ICREDIT_SALEDETAILS_GATEWAY_URL_TEST = 'https://testicredit.rivhit.co.il/API/PaymentPageRequest.svc/SaleDetails';
		const ICREDIT_SALEDETAILS_GATEWAY_URL_REAL = 'https://icredit.rivhit.co.il/API/PaymentPageRequest.svc/SaleDetails';


		/**
		 * Constructor for the gateway.
		 *
		 * @access public
		 * @return void
		 */
		public function __construct() {
			global $wp, $wp_query, $wp_the_query, $wp_rewrite, $wp_did_header, $woocommerce;

			$this->wp                 = $wp;
			$this->wp_query           = $wp_query;
			$this->wp_the_query       = $wp_the_query;
			$this->wp_rewrite         = $wp_rewrite;
			$this->wp_did_header      = $wp_did_header;
			$this->woocommerce        = $woocommerce;
			$this->use_ipn            = true;
			$this->id                 = 'icredit_payment';
			$this->icon               = ICREDIT_PLUGIN_URL . 'assets/images/Rivhit_iCredit.png';
			$this->has_fields         = false; // do true in case you need a custom credit card form
			$this->method_title       = __( 'iCredit Payment', 'woocommerce_icredit' );
			$this->method_description = '';

			$this->admin_fields_class = Icredit_Admin_Fields::getInstance();
			// Load supports of the payment gateway.
			$this->supports = array(
				'products',
				'subscriptions',
				'subscription_cancellation',
				'subscription_suspension',
				'subscription_reactivation',
				'subscription_amount_changes',
				'subscription_date_changes',
				'subscription_payment_method_change',
				'subscription_payment_method_change_customer',
				'subscription_payment_method_change_admin',
				'multiple_subscriptions',
				'refunds',
				'pre-orders',
			);
			// Load the settings.
			$this->init_form_fields();
			$this->init_settings();
			// Define user set variables
			$base_url                                        = home_url( '/?' ) . http_build_query( array( 'wc-api' => 'WC_Gateway_ICredit' ), '', '%26amp;' );
			$this->title                                     = $this->get_option( 'title' );
			$this->description                               = $this->get_option( 'description' );
			$this->show_icons                                = $this->get_option( 'show_icons' );
			$this->test_mode                                 = $this->get_option( 'test_mode' ) == 'yes';
			$this->redirect_url                              = $this->get_option( 'redirect_url' ) ? $this->get_option( 'redirect_url' ) : false;
			$this->hide_items                                = $this->get_option( 'hide_items' ) == 'yes';
			$this->products_variation_type                   = $this->get_option( 'products_variation_type' );
			$this->status_for_failed_orders                  = $this->get_option( 'status_for_failed_orders' );
			$this->max_payments                              = $this->get_option( 'max_payments' ) ? $this->get_option( 'max_payments' ) : 0;
			$this->credit_from_payment                       = ( $this->get_option( 'credit_from_payment' ) != '' ) ? $this->get_option( 'credit_from_payment' ) : 0;
			$this->saleType                                  = $this->get_option( 'SaleType' );
			$this->document_language                         = $this->get_option( 'document_language' );
			$this->exempt_vat                                = $this->get_option( 'exempt_vat' );
			$this->popup_mode                                = $this->get_option( 'popup_mode' );
			$this->iframe_height                             = $this->get_option( 'iframe_height' );
			$this->http_https                                = $this->get_option( 'http_https' );
			$this->ipn_integration                           = $this->get_option( 'ipn_integration' );
			$this->ipn_method                                = $this->get_option( 'ipn_method' );
			$this->field_company                             = $this->get_option( 'field_companyname' ) == 'yes';
			$this->user_comments                             = $this->get_option( 'user_comments' ) == 'yes';
			$this->use_shipping_fields                       = $this->get_option( 'use_shipping_fields' ) == 'yes';
			$this->field_firstname                           = $this->get_option( 'field_firstname' ) == 'yes';
			$this->field_lastname                            = $this->get_option( 'field_lastname' ) == 'yes';
			$this->field_email                               = $this->get_option( 'field_email' ) == 'yes';
			$this->field_address                             = $this->get_option( 'field_address' ) == 'yes';
			$this->field_city                                = $this->get_option( 'field_city' ) == 'yes';
			$this->field_phonenumber                         = $this->get_option( 'field_phonenumber' ) == 'yes';
			$this->field_zipcode                             = $this->get_option( 'field_zipcode' ) == 'yes';
			$this->show_icredit_logo                         = $this->get_option( 'show_icredit_logo' ) == 'yes';
			$this->ChargePendingSale                         = $this->get_option( 'ChargePendingSale' ) ? $this->get_option( 'ChargePendingSale' ) : 1;
			$this->do_status_charge_j5                       = $this->get_option( 'ChargeJ5' );
			$this->status_charge_j5_type                     = $this->get_option( 'ChargeJ5Status' );
			$this->icredit_verify_gateway_url                = $this->test_mode ? self::ICREDIT_VERIFY_GATEWAY_URL_TEST : self::ICREDIT_VERIFY_GATEWAY_URL_REAL;
			$this->icredit_payment_gateway_url               = $this->test_mode ? self::ICREDIT_PAYMENT_GATEWAY_URL_TEST : self::ICREDIT_PAYMENT_GATEWAY_URL_REAL;
			$this->icredit_payment_gateway_get_token_details = $this->test_mode ? self::ICREDIT_PAYMENT_GATEWAY_TOKEN_DETAILS_TEST : self::ICREDIT_PAYMENT_GATEWAY_TOKEN_DETAILS_REAL;
			$this->icredit_payment_gateway_sale_details      = $this->test_mode ? self::ICREDIT_SALEDETAILS_GATEWAY_URL_TEST : self::ICREDIT_SALEDETAILS_GATEWAY_URL_REAL;
			$this->credit_box_token                          = $this->test_mode ? '7cd9f149-d25a-4df3-9b01-d1ecce097c31' : $this->get_option( 'CreditboxToken' );
			$this->payment_token1                            = $this->test_mode ? $this->get_option( 'test_token' ) : $this->get_option( 'real_token' );
			$this->payment_token2                            = $this->test_mode ? $this->get_option( 'test_token' ) : $this->get_option( 'real_token_2' );
			$this->real_token_lang_symbol_1                  = icredit_get_current_website_lang( true ); //# default language
			$this->real_token_lang_key                       = 'real_token_lang_';
			$this->real_token_lang_key2                      = 'real_token2_lang_';
			$this->real_token_lang_1                         = $this->get_option( $this->payment_token1 );
			$this->real_token_lang_2                         = $this->get_option( $this->payment_token2 );
			$this->logging                                   = $this->get_option( 'do_logging' ) == 'yes' ? true : false;
			$this->loggingRequests                           = $this->get_option( 'do_logging_requests' ) == 'yes' ? true : false;
			$this->success_url                               = $base_url . "%26amp;target=success" . "%26amp;";
			$this->error_url                                 = $base_url . "%26amp;target=error" . "%26amp;";
			$this->cancel_url                                = $base_url . "%26amp;target=cancel" . "%26amp;";
			if ( $this->show_icredit_logo != true ) {
				$this->icon = '';
			}
			$this->init_admin_form_fields();
			//self::$m_called = true;
			//Activate Tokenization
			$this->create_token = 'no';
			if ( $this->get_option( 'create_token' ) == 'yes' ) {
				$this->supports[]   = 'tokenization';
				$this->create_token = 'yes';
			}
			if ( $this->logger === null ) {
				$this->logger = new WC_Logger();
			}

			$this->ipn_url         = add_query_arg( 'wc-api', 'icredit_gateway', home_url( '/' ) );
			$this->ipn_url_failure = add_query_arg( 'wc-api', 'icredit_gateway_failure', home_url( '/' ) );

			// ipn structure https://woocommerce-616287-2626793.cloudwaysapps.com/?wc-api=icredit_gateway
			// Actions
			add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, [
				$this,
				'process_admin_options'
			] );
		}

		/**
		 * @return WC_Gateway_ICredit|null
		 */
		public static function getInstance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * @return void
		 */
		function reset_payment_session() {
			WC()->session->set( 'icredit_iframe_displayed', false );
		}

		/**
		 * @param $key
		 *
		 * @return mixed
		 */
		public function get_class_inner_option( $key ) {
			return $this->get_option( $key );
		}

		/**
		 * @return array
		 * for user add payment method from account page
		 */
		function add_payment_method() {
			global $current_user;
			if ( ! $current_user ) {
				$current_user = wp_get_current_user();
			}
			if ( $this->field_firstname ) {
				$user_first_name = $current_user->user_firstname;
			}
			if ( $this->field_lastname ) {
				$user_last_name = $current_user->user_lastname;
			}
			$items         = array(
				array(
					'Id'            => '0',
					"CatalogNumber" => '0',
					"UnitPrice"     => 1,
					"Quantity"      => 1,
					"Description"   => "item for token"
				)
			);
			$redirectUrl   = apply_filters( 'icredit_add_payment_by_user_url', wc_get_page_permalink( 'myaccount' ) . '/payment-methods/', array() );
			$postData      = array(
				'IPNURL'            => $this->ipn_url,
				//'IPNFailureURL'     => $this->ipn_url_failure,
				'Custom1'           => 'add_payment_method',
				'Custom2'           => '',
				'Custom3'           => 'CreatToken',
				'Custom4'           => get_current_user_id(),
				'Custom5'           => 'true',
				'HideItemList'      => 'true',
				'GroupPrivateToken' => $this->payment_token1, //שייך לשפה לקחת משפת האתר הדיפולט
				'Items'             => $items,
				'CustomerFirstName' => $user_first_name ? $user_first_name : '',
				'CustomerLastName'  => $user_last_name ? $user_last_name : '',
				'RedirectURL'       => $redirectUrl,
				'CreateToken'       => 'true',
				'SaleType'          => 3,
				'IPNMethod'         => $this->ipn_method == 'GET' ? 2 : 1,
			);
			$jsonData      = json_encode( $postData );
			$response      = $this->call_to_icredit( $this->icredit_payment_gateway_url, $jsonData );
			$json_response = json_decode( $response['body'] );
			if ( $json_response->result === 'failure' ) {
				return array(
					'result'   => 'failure',
					'messages' => $json_response->messages,
					'redirect' => $json_response->URL,
				);
			}

			return array(
				'result'   => 'success',
				'redirect' => $json_response->URL
			);
		}

		/**
		 * Initialize Gateway Settings Form Fields
		 *
		 * @access public
		 * @return void
		 */
		public function init_admin_form_fields() {
			$this->form_fields = $this->admin_fields_class->get_admin_fields();
		}

		/**
		 * @param $order_id
		 * @param $url_redirect
		 *
		 * @return array|false|string
		 *
		 * Process the payment and return the result
		 */
		public function process_payment( $order_id, $url_redirect = '' ) {
			$isNew   = true;
			$custom5 = false;
			if ( isset( $_POST['wc-icredit_payment-new-payment-method'] ) ) {
				$custom5 = $_POST['wc-icredit_payment-new-payment-method'];
			}
			$order = new WC_Order( $order_id );
			if ( ! $order ) {
				return [];
			}
			$getAddressData = icredit_get_shipping_data( $order );
			#ADD ITEMS TO ORDER
			if ( $this->products_variation_type === 'under' ) {
				$items = icredit_helper_get_product_items( $order, true );
			} else {
				$items = icredit_helper_get_product_items( $order );
			}
			#ADD SHIPPING COSTS
			$items = array_merge( $items, icredit_helper_get_shipping_methods_items( $order ) );

			#GET CURRENT LANGUAGE
			$useLangToken    = false;
			$currentLanguage = icredit_get_current_language();
			if ( $currentLanguage !== icredit_get_current_website_lang() && ! $this->test_mode ) {
				$langArr         = icredit_get_current_language_token( $currentLanguage );
				$optionTokenLang = $this->get_option( $this->real_token_lang_key . $langArr['code'] );
				if ( ! empty( $optionTokenLang ) ) {
					$this->real_token_lang_1        = $optionTokenLang;
					$this->real_token_lang_symbol_1 = $langArr['code'];
					$useLangToken                   = true;
				}
			}
			// token 2 - for using token charge sale (if not empty)
			$CreditcardToken = '';
			if ( isset( $_POST['wc-icredit_payment-payment-token'] ) ) {
				if ( $_POST['wc-icredit_payment-payment-token'] != null && $_POST['wc-icredit_payment-payment-token'] != 'new' ) {
					$isNew           = false;
					$token_id        = $_POST['wc-icredit_payment-payment-token'];
					$CreditcardToken = WC_Payment_Tokens::get( (int) $token_id )->get_token();
					//@@@ get lang token 2
					$this->icredit_payment_gateway_url = $this->test_mode ? self::ICREDIT_PAYMENT_GATEWAY_TOKEN_URL_TEST : self::ICREDIT_PAYMENT_GATEWAY_TOKEN_URL_REAL;
					if ( ! empty( $this->real_token_lang_2 ) && $currentLanguage === icredit_get_current_website_lang() && ! $this->test_mode ) {
						$this->real_token_lang_1 = $this->real_token_lang_2;
					}
					if ( $currentLanguage !== icredit_get_current_website_lang() && ! $this->test_mode ) {
						$langArr         = icredit_get_current_language_token( $currentLanguage );
						$optionTokenLang = $this->get_option( $this->real_token_lang_key2 . $langArr['code'] );
						if ( ! empty( $optionTokenLang ) ) {
							$this->real_token_lang_1        = $optionTokenLang;
							$this->real_token_lang_symbol_1 = $langArr['code'];
							$useLangToken                   = true;
						}
					}
				}
			}
			$currency = icredit_helper_get_currency( get_woocommerce_currency() );
			if ( empty( $currency ) ) {
				$errVar     = icredit_credit_card_errors( '1005' );
				$errMessage = __( 'Error happen', 'woocommerce_icredit' );
				$errMessage .= ' ' . sprintf( __( 'the reason: %s', 'woocommerce_icredit' ), $errVar );
				$argsErr    = array(
					'messages' => '<div class="woocommerce-NoticeGroup woocommerce-NoticeGroup-checkout"><div class="woocommerce-error">' . $errMessage . '</div></div>',
					'refresh'  => false,
					'reload'   => false,
					'result:'  => 'failure',
				);
				echo json_encode( $argsErr );
				wp_die();
			}
			$postData = array(
				'IPNURL'            => $this->ipn_integration !== '' ? $this->ipn_integration : $this->ipn_url,
				//'IPNFailureURL'     => $this->ipn_url_failure,
				'Order'             => $order->get_id(),
				'Custom1'           => $order->get_id(),
				//'Custom2'           => $wpml_token,
				'Custom3'           => $this->ipn_integration,
				'Custom4'           => get_current_user_id(),
				'Custom5'           => $custom5,
				'HideItemList'      => $this->hide_items,
				'GroupPrivateToken' => $this->payment_token1,
				'Items'             => $items,
				'MaxPayments'       => $this->max_payments,
				'CreditFromPayment' => $this->credit_from_payment,
				'CreateToken'       => $this->create_token,
				'Discount'          => icredit_get_order_discount( $order ),
				'PriceIncludeVAT'   => true,
				'Currency'          => $currency,
				'IPNMethod'         => $this->ipn_method == 'GET' ? 2 : 1,
				'SaleType'          => $this->saleType,
			);
			if ( ! empty( $CreditcardToken ) ) {
				$postData['CreditcardToken'] = $CreditcardToken;
			}
			$postData['DocumentLanguage'] = icredit_helper_document_lang( $this->document_language, $getAddressData['billing']['Country'] );
			$postData['ExemptVAT']        = icredit_helper_exempt_vat( $this->exempt_vat, $getAddressData['billing']['Country'], $getAddressData['shipping']['Country'] );
			if ( $useLangToken === true ) {
				# over-ride
				$postData['GroupPrivateToken'] = $this->real_token_lang_1;
			}
			if ( $this->redirect_url ) {
				$redirect_url = $this->redirect_url;
			} else {
				$redirect_url = $order->get_checkout_order_received_url();
			}
			#redirect url for order admin page
			if ( $url_redirect ) {
				$redirect_url = $url_redirect;
			}
			if ( $this->popup_mode == 'iframe' ) {
				$redirect_url = $order->get_checkout_order_received_url();
				WC()->session->set( 'icredit_iframe_redirect_url', $redirect_url );
				$redirect_url_endcode = urlencode( $redirect_url );
				//$redirect_url         = dirname( plugin_basename( __FILE__ ) ) . 'redirect.php?RedirectUrl=' . $redirect_url_endcode;
			}
			$postData['RedirectURL'] = $redirect_url;

			if ( $this->use_shipping_fields == 'yes' ) {
				$postData['CustomerFirstName'] = $getAddressData['shipping']['CustomerFirstName'];
				$postData['CustomerLastName']  = $getAddressData['shipping']['CustomerLastName'];
				$postData['EmailAddress']      = $getAddressData['shipping']['EmailAddress'];
				$postData['Address']           = $getAddressData['shipping']['Address'];
				$postData['City']              = $getAddressData['shipping']['City'];
				$postData['PhoneNumber']       = $getAddressData['shipping']['PhoneNumber'];
				$postData['Zipcode']           = $getAddressData['shipping']['Zipcode'];
				$postData['Country']           = $getAddressData['shipping']['Country'];
			} else {
				$postData['CustomerFirstName'] = $getAddressData['billing']['CustomerFirstName'];
				$postData['CustomerLastName']  = $getAddressData['billing']['CustomerLastName'];
				$postData['EmailAddress']      = $getAddressData['billing']['EmailAddress'];
				$postData['Address']           = $getAddressData['billing']['Address'];
				$postData['City']              = $getAddressData['billing']['City'];
				$postData['PhoneNumber']       = $getAddressData['billing']['PhoneNumber'];
				$postData['Zipcode']           = $getAddressData['billing']['Zipcode'];
				$postData['Country']           = $getAddressData['billing']['Country'];
			}
			if ( ! $this->field_firstname ) {
				$postData['CustomerFirstName'] = '';
			}
			if ( ! $this->field_lastname ) {
				$postData['CustomerLastName'] = '';
			}
			if ( ! $this->field_email ) {
				$postData['EmailAddress'] = '';
			}
			if ( ! $this->field_address ) {
				$postData['Address'] = '';
			}
			if ( ! $this->field_city ) {
				$postData['City'] = '';
			}
			if ( ! $this->field_phonenumber ) {
				$postData['PhoneNumber'] = '';
			}
			$company_billing = $order->get_billing_company();
			if ( $this->field_company && ! empty( $company_billing ) ) {
				$postData['CustomerLastName'] = $company_billing . ' ' . $postData['CustomerLastName'];
			}
			if ( ! $this->field_zipcode ) {
				$postData['Zipcode'] = '';
			}

			if ( ( $this->user_comments ) && ( $order->get_customer_note() ) ) {
				$postData['Comments'] = $order->get_customer_note();
			}

			if ( $this->test_mode && $isNew === false ) {
				$postData['AuthNum'] = '123456';
			}

			$payments = get_post_meta( $order_id, 'TransactionNumOfPayment', true );
			if ( $isNew === false && ! empty( $payments ) ) {
				$postData['NumberOfPayments'] = (int) $payments + 1;;
			}

			$_SESSION['current_customer_order_id'] = $order->get_id();
			$jsonData                              = json_encode( $postData );

			// before
			$this->save_logs( 'icredit_process_payment', 'Charge Request', 2 );
			$this->save_logs( 'icredit_process_payment', print_r( $jsonData, true ), 2 );

			$response = $this->call_to_icredit( $this->icredit_payment_gateway_url, $jsonData );

			// after
			$this->save_logs( 'icredit_process_payment', 'Charge Response' );
			$this->save_logs( 'icredit_process_payment', print_r( $response, true ) );

			$json_response = json_decode( $response['body'] );
			if ( $_POST['wc-icredit_payment-payment-token'] != null && $_POST['wc-icredit_payment-payment-token'] != 'new' ) {
				if ( $json_response->Status === 0 ) {
					// Reduce stock levels
					wc_reduce_stock_levels( $order_id );
					// Remove cart
					WC()->cart->empty_cart();

					// Return thank-you redirect
					$redirect_url_order = $this->get_return_url( $order );

					return array(
						'result'   => 'success',
						'redirect' => $redirect_url_order
					);
				} else {
					$order->add_order_note( __( 'Icredit Payment Failed', 'woocommerce_icredit' ) );
					$order->update_status( $this->status_for_failed_orders );
					$err = json_decode( $response['body'] );
					if ( is_object( $err ) ) {
						$errStatus = $err->Status;
					} else {
						$errStatus = $err['Status'];
					}
					$errMessage = __( 'An error has occured while trying to charge the selected credit card.', 'woocommerce_icredit' );
					if ( isset( $errStatus ) ) {
						$errVar = icredit_credit_card_errors( $errStatus );
					} else {
						$errVar = icredit_credit_card_errors();
					}
					$errMessage .= ' ' . sprintf( __( 'the reason: %s', 'woocommerce_icredit' ), $errVar );
					wc_add_notice( $errMessage, 'error' );
					if ( $json_response->Status === 1004 ) {
						if ( $this->redirect_url ) {
							$redirect_url = $this->redirect_url;
						} else {
							$redirect_url = $order->get_checkout_order_received_url();
						}
						$argsErr = array(
							'messages' => '<div class="woocommerce-NoticeGroup woocommerce-NoticeGroup-checkout"><div class="woocommerce-error">' . $errMessage . '</div></div>',
							'refresh'  => false,
							'reload'   => false,
							'result'   => 'failure',
							'redirect' => $redirect_url,
						);
						echo json_encode( $argsErr );
						wp_die();
					}
				}
			}

			WC()->session->set( 'icredit_payment_url', $json_response->URL );
			do_action( 'rivhit_process_payment_completed', $order_id );

			/* If iFrame mode */
			$this->reset_payment_session();
			$result = [
				'result'   => 'success',
				'redirect' => $json_response->URL,
				'viewMode' => $this->popup_mode
			];
			if ( $this->popup_mode == 'iframe' ) {
				$result['redirect'] = $order->get_checkout_payment_url( true );

				return $result;
			}
			if ( $this->popup_mode == 'popup' ) {
				$result['refresh'] = true;
				$result['reload']  = false;
			}

			return $result;

			wp_die();
		}

		/**
		 * @return void
		 */
		public static function icredit_gateway_ipn_response() {
			$self = WC_Gateway_ICredit::getInstance();
			if ( stripos( $self->ipn_method, 'GET' ) !== false ) {
				$self->ipn_method_get( $_GET );
				do_action( 'icredit_ipn_response_data_hook_getter', $_GET );
			} else {
				$REQUEST = icredit_arr_clean( $_REQUEST );
				$self->ipn_method_post( $REQUEST );
				do_action( 'icredit_ipn_response_data_hook_getter', $REQUEST );
			}
		}

		/**
		 * @param $IPNPost
		 * @param $bool
		 *
		 * @return void
		 *
		 *  IPN found GET
		 */
		public function ipn_method_get( $IPNPost = array(), $bool = false ) {
			$saleId = array(
				"SaleId" => $IPNPost['saleId']
			);
			#get details from transaction
			$jsonData         = json_encode( $saleId );
			$response         = $this->call_to_icredit( $this->icredit_payment_gateway_sale_details, $jsonData );
			$json_response    = json_decode( $response['body'] );
			$ipn_get_response = $json_response;
			if ( $ipn_get_response->Custom2 == true ) {
				$this->payment_token1 = $this->real_token_lang_1;
			}
			#creat token from add-payment-method
			if ( $ipn_get_response->Custom1 == 'add_payment_method' && $ipn_get_response->Token && $ipn_get_response->Custom3 == 'CreatToken'
			     || $ipn_get_response->Custom3 == 'CreatToken' && $ipn_get_response->TransactionToken && ( $ipn_get_response->TransactionToken != '00000000-0000-0000-0000-000000000000' )
			) {
				$postData = array(
					'Token'          => $ipn_get_response->Token,
					'CreditboxToken' => $this->credit_box_token,
					'CardDueDate'    => $ipn_get_response->CardDueDate,
					'CardName'       => $ipn_get_response->CardName,
					'CardNum'        => $ipn_get_response->CardNum,
					'CardProducer'   => $ipn_get_response->CardProducer,
				);
				$cardmm   = (string) ( substr( $postData['CardDueDate'], 2 ) );
				$cardyy   = (string) ( substr( $postData['CardDueDate'], 0, 2 ) );
				$this->save_order_token( (string) $postData['Token'], (string) $postData['CardNum'], $ipn_get_response->Custom4, $cardmm, $cardyy, $ipn_get_response->CardProducer, true );
				$this->save_logs( 'icredit_ipn', 'New Credit Added To Account', 2 );
			}

			$this->save_logs( 'icredit_ipn', 'IPN Data', 2 );
			$this->save_logs( 'icredit_ipn', print_r( $IPNPost, true ), 2 );
			$this->save_logs( 'icredit_ipn', 'Type: GET' );
			$this->save_logs( 'icredit_ipn', print_r( $ipn_get_response, true ), 2 );
			$this->save_logs( 'icredit_ipn', 'Payment Token: ' . $this->payment_token1 );
			$this->save_logs( 'icredit_ipn', 'Order: ' . $json_response->Order );
			$this->save_logs( 'icredit_ipn', 'Sale Id: ' . $json_response->SaleId );
			$this->save_logs( 'icredit_ipn', 'Transaction Amount: ' . $ipn_get_response->Amount );

			$postData = array(
				'GroupPrivateToken' => $this->payment_token1,
				'SaleId'            => $saleId['SaleId'],
				'TotalAmount'       => $ipn_get_response->Amount
			);
			$jsonData = json_encode( $postData );
			$response = $this->call_to_icredit( $this->icredit_verify_gateway_url, $jsonData );

			$this->save_logs( 'icredit_ipn', 'WP IPN Verify Completed', 2 );
			$this->save_logs( 'icredit_ipn', print_r( $response['body'], true ), 2 );

			$json_response2 = json_decode( $response['body'] );

			$this->save_logs( 'icredit_ipn', print_r( $jsonData, true ), 2 );
			$this->save_logs( 'icredit_ipn', 'json Status: ' . $json_response2->Status );

			// inspect IPN validation result and act accordingly
			$this->update_order_data( $json_response->Order, 'icredit_status', $json_response2->Status );
			if ( $json_response2->Status == 'VERIFIED' ) {
				if ( $json_response->Token && ( $json_response->Token != '00000000-0000-0000-0000-000000000000' ) && ( $json_response->Custom5 == 'true' ) && $ipn_get_response->Custom3 != 'CreatToken' ) {
					$postData = array(
						'Token'          => $ipn_get_response->Token,
						'CreditboxToken' => $this->credit_box_token,
						'CardDueDate'    => $ipn_get_response->CardDueDate,
						'CardName'       => $ipn_get_response->CardName,
						'CardNum'        => $ipn_get_response->CardNum,
						'CardProducer'   => $ipn_get_response->CardProducer,
					);
					$cardyy   = (string) ( substr( $postData['CardDueDate'], 2 ) );
					$cardmm   = (string) ( substr( $postData['CardDueDate'], 0, 2 ) );
					$this->save_order_token( (string) $postData['Token'], (string) $postData['CardNum'], $ipn_get_response->Custom4, $cardmm, $cardyy, $ipn_get_response->CardLable );
				}
				$order    = new WC_Order( $ipn_get_response->Order );
				$order_id = $order->get_id();
				$this->save_logs( 'icredit_ipn', 'Order ID: ' . $order_id );
				if ( $ipn_get_response->Custom3 ) {
					$ipn_integration_url = $ipn_get_response->Custom3;
					$response            = $this->call_to_icredit( $ipn_integration_url, $IPNPost );
				}
				if ( $this->saleType == '1' ) {
					if ( !empty( $ipn_get_response->TransactionCardNum ) ) {
						$cardNumber = icredit_handle_card_number_clear( $ipn_get_response->TransactionCardNum );
					} else {
						$cardNumber = icredit_handle_card_number_clear( $ipn_get_response->CardNum );
					}
					$this->update_order_data( $order_id, 'icredit_ccnum', $cardNumber );
					if ( !empty( $ipn_get_response->CardLable ) ) {
						$this->update_order_data( $order_id, 'icredit_cardname', $ipn_get_response->CardLable );
					} else {
						$this->update_order_data( $order_id, 'icredit_cardname', $ipn_get_response->CardProducer );
					}
					$this->update_order_data( $order_id, 'SaleId', $ipn_get_response->SaleId );
					$this->update_order_data( $order_id, 'Reference', $ipn_get_response->Reference );
					if ( !empty( $ipn_get_response->TransactionAmount ) ) {
						$this->update_order_data( $order_id, 'TransactionAmount', $ipn_get_response->TransactionAmount );
					} else {
						$this->update_order_data( $order_id, 'TransactionAmount', $ipn_get_response->Amount );
					}
					$this->update_order_data( $order_id, 'DocumentURL', $ipn_get_response->DocumentURL );
					if ( !empty( $ipn_get_response->TransactionToken ) ) {
						$this->update_order_data( $order_id, 'TransactionToken', $ipn_get_response->TransactionToken );
					} else {
						$this->update_order_data( $order_id, 'TransactionToken', $ipn_get_response->Token );
					}
					$this->update_order_data( $order_id, 'CustomerTransactionId', $ipn_get_response->CustomerTransactionId );
					$this->update_order_data( $order_id, 'CustomerTransactionId', $ipn_get_response->CustomerTransactionId );
//					$this->update_order_data( $order_id, 'TransactionAuthNum', $ipn_get_response->TransactionAuthNum );
					$this->update_order_data( $order_id, 'SalePrivateToken', $ipn_get_response->SalePrivateToken );
				} else {
					if ( !empty( $ipn_get_response->TransactionCardNum ) ) {
						$cardNumber = icredit_handle_card_number_clear( $ipn_get_response->TransactionCardNum );
					} else {
						$cardNumber = icredit_handle_card_number_clear( $ipn_get_response->CardNum );
					}
					$this->update_order_data( $order_id, 'icredit_ccnum', $cardNumber );
					if ( !empty( $ipn_get_response->CardLable ) ) {
						$this->update_order_data( $order_id, 'icredit_cardname', $ipn_get_response->CardLable );
					} else {
						$this->update_order_data( $order_id, 'icredit_cardname', $ipn_get_response->CardProducer );
					}
					$this->update_order_data( $order_id, 'SaleId', $ipn_get_response->SaleId );
					$this->update_order_data( $order_id, 'Reference', $ipn_get_response->Reference );
					if ( !empty( $ipn_get_response->TransactionAmount ) ) {
						$this->update_order_data( $order_id, 'TransactionAmount', $ipn_get_response->TransactionAmount );
					} else {
						$this->update_order_data( $order_id, 'TransactionAmount', $ipn_get_response->Amount );
					}
					$this->update_order_data( $order_id, 'DocumentURL', $ipn_get_response->DocumentURL );
					if ( !empty( $ipn_get_response->TransactionToken ) ) {
						$this->update_order_data( $order_id, 'TransactionToken', $ipn_get_response->TransactionToken );
					} else {
						$this->update_order_data( $order_id, 'TransactionToken', $ipn_get_response->Token );
					}
					$this->update_order_data( $order_id, 'CustomerTransactionId', $ipn_get_response->CustomerTransactionId );
					//$this->update_order_data( $order_id, 'TransactionAuthNum', $ipn_get_response->TransactionAuthNum );
					$this->update_order_data( $order_id, 'SalePrivateToken', $ipn_get_response->SalePrivateToken );
				}
				$addPayments = 0;
				if ( !empty( $ipn_get_response->CreditTerms ) ) {
					if ( $ipn_get_response->CreditTerms == '8' ) {
						$addPayments = 1;
					}
					$this->update_order_data( $order_id, 'CreditTerms', $ipn_get_response->CreditTerms );
				}
				if ( ! empty( $ipn_get_response->TransactionNumOfPayment ) ) {
					$this->update_order_data( $order_id, 'TransactionNumOfPayment', ((int)$ipn_get_response->TransactionNumOfPayment + $addPayments) );
				} else if ( ! empty( $ipn_get_response->NumOfPayment ) ) {
					$this->update_order_data( $order_id, 'TransactionNumOfPayment', ((int)$ipn_get_response->NumOfPayment + $addPayments) );
				}
				if ( ! empty( $ipn_get_response->TransactionParamJ ) ) {
					$this->update_order_data( $order_id, 'TransactionParamJ', $ipn_get_response->TransactionParamJ );
				}
				if ( $this->saleType == '2' ) {
					$this->update_order_data( $order_id, 'TransactionTokenRivhitPayBy', 'true' );
				}
				$order->add_order_note( __( 'iCredit payment complete.', 'woocommerce_icredit' ) );
				$order->payment_complete();
				do_action( 'icredit_payment_complete' );
			}

		}

		/**
		 * @param $IPNPost
		 * @param $bool
		 *
		 * @return void
		 *
		 *  IPN found POST
		 */
		public function ipn_method_post( $IPNPost = array(), $bool = false ) {
			if ( isset( $IPNPost['Custom2'] ) ) {
				if ( $IPNPost['Custom2'] == true ) {
					$this->payment_token1 = $this->real_token_lang_1;
				}
			}
			#create token from add-payment-method
			if ( $IPNPost['Custom3'] == 'CreatToken' && $IPNPost['TransactionToken'] && ( $IPNPost['TransactionToken'] != '00000000-0000-0000-0000-000000000000' ) ) {
				$postData                   = array(
					'Token'          => $IPNPost['TransactionToken'],
					'CreditboxToken' => $this->credit_box_token
				);
				$jsonData                   = json_encode( $postData );
				$response                   = $this->call_to_icredit( $this->icredit_payment_gateway_get_token_details, $jsonData );
				$json_response_credit       = json_decode( $response['body'] );
				$TransactionCardDueDateMMYY = $IPNPost['TransactionCardDueDateMMYY'];
				$cardyy                     = (string) ( substr( $TransactionCardDueDateMMYY, 2 ) );
				$cardmm                     = (string) ( substr( $TransactionCardDueDateMMYY, 0, 2 ) );
				$this->save_order_token( (string) $IPNPost['TransactionToken'], (string) $IPNPost['TransactionCardNum'], $IPNPost['Custom4'], $cardmm, $cardyy, $IPNPost['TransactionCardProducer'], true );
				$this->save_logs( 'icredit_ipn', 'New Credit Added To Account', 2 );
			}

			$this->save_logs( 'icredit_ipn', 'IPN Data', 2 );
			$this->save_logs( 'icredit_ipn', print_r( $IPNPost, true ), 2 );
			$this->save_logs( 'icredit_ipn', 'Type: POST' );
			$this->save_logs( 'icredit_ipn', 'Payment Token: ' . $this->payment_token1 );
			$this->save_logs( 'icredit_ipn', 'Order: ' . $IPNPost['Order'] );
			$this->save_logs( 'icredit_ipn', 'Sale Id: ' . $IPNPost['SaleId'] );
			$this->save_logs( 'icredit_ipn', 'Transaction Amount: ' . $IPNPost['TransactionAmount'] );

			$postData = array(
				'GroupPrivateToken' => $IPNPost['GroupPrivateToken'],
				'SaleId'            => $IPNPost['SaleId'],
				'TotalAmount'       => $IPNPost['TransactionAmount']
			);

			$jsonData      = json_encode( $postData );
			$response      = $this->call_to_icredit( $this->icredit_verify_gateway_url, $jsonData );
			$json_response = json_decode( $response['body'] );

			$this->save_logs( 'icredit_ipn', print_r( $jsonData, true ), 2 );
			$this->save_logs( 'icredit_ipn', 'WP IPN Verify Completed' );
			$this->save_logs( 'icredit_ipn', print_r( $response, true ) );
			$this->save_logs( 'icredit_ipn', 'json Status: ' . $json_response->Status );
			$this->save_logs( 'icredit_ipn', 'TransactionCardNum: ' . $IPNPost['TransactionCardNum'] );

			$post_reference = '';
			if ( isset( $IPNPost['Reference'] ) ) {
				$post_reference = $IPNPost['Reference'];
			}
			$this->save_logs( 'icredit_ipn', 'Reference: ' . $post_reference );
			$this->save_logs( 'icredit_ipn', 'DocumentURL: ' . $IPNPost['DocumentURL'] );

			// inspect IPN validation result and act accordingly
			$this->update_order_data( $IPNPost['Order'], 'icredit_status', $json_response->Status );

			if ( $json_response->Status == 'VERIFIED' ) {
				#add credit card token by user id
				if ( $IPNPost['TransactionToken'] && ( $IPNPost['TransactionToken'] != '00000000-0000-0000-0000-000000000000' ) && ( isset( $IPNPost['Custom5'] ) && $IPNPost['Custom5'] == 'true' ) && $IPNPost['Custom3'] != 'CreatToken' ) {
					$TransactionCardDueDateMMYY = $IPNPost['TransactionCardDueDateMMYY'];
					$cardyy                     = (string) ( substr( $TransactionCardDueDateMMYY, 2 ) );
					$cardmm                     = (string) ( substr( $TransactionCardDueDateMMYY, 0, 2 ) );
					$this->save_order_token( (string) $IPNPost['TransactionToken'], (string) $IPNPost['TransactionCardNum'], $IPNPost['Custom4'], $cardmm, $cardyy, $IPNPost['TransactionCardLabel'] );
					$this->save_logs( 'icredit_ipn', print_r( $IPNPost, true ) );
				}
				$order    = new WC_Order( $IPNPost['Order'] );
				$order_id = $order->get_id();
				$this->save_logs( 'icredit_ipn', 'Order ID: ' . $order_id );

				if ( $IPNPost['Custom3'] ) {
					$ipn_integration_url = $IPNPost['Custom3'];
					$response            = $this->call_to_icredit( $ipn_integration_url, $IPNPost );
				}
				$cardNumber = icredit_handle_card_number_clear( $IPNPost['TransactionCardNum'] );
				$this->update_order_data( $order_id, 'icredit_ccnum', $cardNumber );
				$this->update_order_data( $order_id, 'SaleId', $IPNPost['SaleId'] );

				$post_reference = '';
				if ( isset( $IPNPost['Reference'] ) ) {
					$post_reference = $IPNPost['Reference'];
				}
				if ( isset( $IPNPost['DocumentURL'] ) ) {
					$this->update_order_data( $order_id, 'DocumentURL', $IPNPost['DocumentURL'] );
				}
				$this->update_order_data( $order_id, 'Reference', $post_reference );
				$this->update_order_data( $order_id, 'TransactionAmount', $IPNPost['TransactionAmount'] );
				$this->update_order_data( $order_id, 'TransactionCardLabel', $IPNPost['TransactionCardLabel'] );
				$this->update_order_data( $order_id, 'TransactionToken', $IPNPost['TransactionToken'] );
				$this->update_order_data( $order_id, 'CustomerTransactionId', $IPNPost['CustomerTransactionId'] );
				$this->update_order_data( $order_id, 'TransactionAuthNum', $IPNPost['TransactionAuthNum'] );
				$addPayments = 0;
				if ( !empty( $IPNPost['TransactionCreditTerms'] ) ) {
					if ( $IPNPost['TransactionCreditTerms'] == '8' ) {
						$addPayments = 1;
					}
					$this->update_order_data( $order_id, 'CreditTerms', $IPNPost['TransactionCreditTerms'] );
				}
				if ( ! empty( $IPNPost['TransactionNumOfPayment'] ) ) {
					$this->update_order_data( $order_id, 'TransactionNumOfPayment', $IPNPost['TransactionNumOfPayment'] + $addPayments );
				}
				if ( ! empty( $IPNPost['TransactionParamJ'] ) ) {
					$this->update_order_data( $order_id, 'TransactionParamJ', $IPNPost['TransactionParamJ'] );
				}
				if ( $this->saleType == '2' ) {
					$this->update_order_data( $order_id, 'TransactionTokenRivhitPayBy', 'true' );
				}
				$order->add_order_note( __( 'iCredit payment complete.', 'woocommerce_icredit' ) );
				$order->payment_complete();
				do_action( 'icredit_payment_complete' );
			}
		}

		/**
		 * @param $transactionToken
		 * @param $cardNumber
		 * @param $additional
		 * @param $cardmm
		 * @param $cardyy
		 * @param $caredType
		 * @param $bool
		 *
		 * @return void
		 */
		private function save_order_token( $transactionToken, $cardNumber, $additional, $cardmm = '', $cardyy = '', $caredType = 'כרטיס אשראי', $bool = false ) {
			$token = new WC_Payment_Token_CC();
			$token->set_token( wc_clean( $transactionToken ) );
			$token->set_gateway_id( 'icredit_payment' );
			if ( is_numeric( (int) $caredType ) && $bool === true ) {
				$token->set_card_type( icredit_get_order_card_producer( wc_clean( $caredType ) ) );
			} else {
				if ( is_numeric( (int) $caredType ) ) {
					$token->set_card_type( icredit_get_order_card_label( wc_clean( $caredType ) )['label'] );
				} else {
					$token->set_card_type( wc_clean( $caredType ) );
				}
			}
			$token->set_last4( wc_clean( ( substr( $cardNumber, 12 ) ) ) );
			$token->set_expiry_month( wc_clean( $cardmm ) );
			$token->set_expiry_year( '20' . wc_clean( $cardyy ) );
			$token->set_user_id( wc_clean( $additional ) );
			$token->save();
		}

		/**
		 * @param $order_id
		 * @param $key
		 * @param $data
		 *
		 * @return void
		 */
		private function update_order_data( $order_id, $key, $data ) {
			update_post_meta( $order_id, $key, $data );
		}

		/**
		 * @param $url
		 * @param $jsonData
		 * @param $bool
		 *
		 * @return mixed
		 */
		private function call_to_icredit( $url, $jsonData, $bool = false ) {
			if ( $bool === true ) {
				return wp_remote_post( $url, $jsonData );
			}

			return wp_remote_post( $url, array(
					'method'      => 'POST',
					'timeout'     => 45,
					'redirection' => 5,
					'httpversion' => '1.0',
					'blocking'    => true,
					'headers'     => array( 'Content-Type' => 'application/json' ),
					'body'        => $jsonData,
					'cookies'     => array()
				)
			);
		}

		/**
		 * @param $order
		 * @param $token
		 * @param $saleType
		 *
		 * @return mixed
		 *
		 * charge token form admin
		 */
		public function call_to_icredit_charge_j5( $order, $token = '', $saleType = '' ) {
			$jsonData		= get_data_for_order_payment_by_admin( $order, $token, $saleType, true );

			$this->save_logs( 'beforeSendChargeToken', print_r( $jsonData, true ), 2 );
			if ( $this->ChargePendingSale != '2' ) {
				$icredit_payment_gateway_url = $this->test_mode ? self::ICREDIT_PAYMENT_GATEWAY_TOKEN_CHARGE_URL_TEST : self::ICREDIT_PAYMENT_GATEWAY_TOKEN_CHARGE_URL_REAL;
			} else {
				$icredit_payment_gateway_url = $this->test_mode ? self::ICREDIT_PAYMENT_GATEWAY_TOKEN_URL_TEST : self::ICREDIT_PAYMENT_GATEWAY_TOKEN_URL_REAL;
			}

			return $this->call_to_icredit( $icredit_payment_gateway_url, $jsonData );
		}

		/**
		 * @return array
		 *
		 * for other classes
		 */
		public static function get_global_options() {
			$self = WC_Gateway_ICredit::getInstance();

			return array(
				'icredit_verify_gateway_url'                => $self->icredit_verify_gateway_url,
				'icredit_payment_gateway_url'               => $self->icredit_payment_gateway_url,
				'icredit_payment_gateway_get_token_details' => $self->icredit_payment_gateway_get_token_details,
				'icredit_payment_gateway_sale_details'      => $self->icredit_payment_gateway_sale_details,
				'credit_box_token'                          => $self->credit_box_token,
				'payment_token'                             => $self->payment_token1,
				'payment_token2'                            => $self->payment_token2,
				'real_token_lang_symbol_1'                  => $self->real_token_lang_symbol_1,
				'real_token_lang_1'                         => $self->real_token_lang_1,
				'test_mode'                                 => $self->test_mode,
				'exempt_vat'                                => $self->exempt_vat,
				'status_for_failed_orders'                  => $self->status_for_failed_orders,
				'products_variation_type'                   => $self->products_variation_type,
				'use_shipping_fields'                       => $self->use_shipping_fields,
				'field_firstname'                           => $self->field_firstname,
				'field_lastname'                            => $self->field_lastname,
				'field_email'                               => $self->field_email,
				'field_address'                             => $self->field_address,
				'field_city'                                => $self->field_city,
				'field_phonenumber'                         => $self->field_phonenumber,
				'field_company'                             => $self->field_company,
				'field_zipcode'                             => $self->field_zipcode,
				'ChargeJ5'                                  => $self->do_status_charge_j5,
				'ChargeJ5Status'                            => $self->status_charge_j5_type,
				'ipn_method'                                => $self->ipn_method,
				'ipn_integration'                           => $self->ipn_integration,
				'document_language'                         => $self->document_language,
				'ChargePendingSale'                         => $self->ChargePendingSale,
			);
		}

		/**
		 * @return void
		 */
		public function payment_fields() {
			if ( ! empty( $this->description ) ) {
				echo wpautop( wptexturize( $this->description ) );
			}
			if ( $this->supports( 'tokenization' ) && is_checkout() ) {
				$this->tokenization_script();
				$this->saved_payment_methods();
				$this->form();
				$this->save_payment_method_checkbox();
			} else {
				$this->form();
			}
			if ( $this->show_icons === 'yes' ) {
				$allowedIcons = $this->icredit_get_allowed_icons_checkout();
				$arrIcons     = icredit_get_accepted_logos();
				include_once dirname( __FILE__ ) . '/../../templates/checkout-page-cards.php';
			}
		}

		/**
		 * @return array
		 */
		private function icredit_get_allowed_icons_checkout() {
			return array(
				'amex'       => $this->get_option( 'show_icons_amex' ),
				'discover'   => $this->get_option( 'show_icons_discover' ),
				'Visa'       => $this->get_option( 'show_icons_visa' ),
				'Mastercard' => $this->get_option( 'show_icons_mastercard' ),
				'Isra'       => $this->get_option( 'show_icons_isra' ),
				'Diners'     => $this->get_option( 'show_icons_diners' ),
				'Pci'        => $this->get_option( 'show_icons_pci' ),
			);
		}

		/**
		 * @param $key
		 * @param $string
		 * @param $type
		 *
		 * @return void
		 */
		private function save_logs( $key = '', $string = '', $type = 0 ) {
			$approvedLogs = $this->logging;
			if ( $type == 2 ) {
				$approvedLogs = $this->loggingRequests;
			}
			if ( $type == 0 ) {
				$approvedLogs = true;
			}
			if ( $approvedLogs === true && ! empty( $key ) && ! empty( $string ) ) {
				$this->logger->add( $key, $string );
			}
		}

	}

	$selfIcreditWC = new WC_Gateway_ICredit();
}
