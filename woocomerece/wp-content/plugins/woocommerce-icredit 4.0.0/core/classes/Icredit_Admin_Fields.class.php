<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'Icredit_Admin_Fields' ) ) {
	/**
	 * class Icredit_Admin_Fields
	 */
	class Icredit_Admin_Fields {
		private static $instance = null;
		public $current_tab,
			$current_session;

		/**
		 * Constructor for the admin fields of current gateway.
		 *
		 * @access public
		 * @return void
		 */
		public function __construct() {
			$this->current_tab     = ! empty( $_REQUEST['tab'] ) ? sanitize_title( $_REQUEST['tab'] ) : 'status';
			$this->current_session = ! empty( $_REQUEST['section'] ) ? sanitize_title( $_REQUEST['section'] ) : '';

			$this->init();
		}

		/**
		 * @return void
		 */
		private function __clone() {
		}

		/**
		 * @return Icredit_Admin_Fields|null
		 */
		public static function getInstance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * @return void
		 *
		 * initialize only once
		 */
		private function init() {
			if ( $this->current_tab === 'checkout' && $this->current_session === 'icredit_payment' ) {
				add_action( 'woocommerce_before_settings_' . $this->current_tab, [
					$this,
					'admin_woocommerce_before_setting'
				] );
				add_action( 'woocommerce_after_settings_' . $this->current_tab, [
					$this,
					'admin_woocommerce_after_setting'
				] );
				add_action( 'woocommerce_sections_' . $this->current_tab, [ $this, 'admin_woocommerce_sections' ] );
			}
		}

		/**
		 * @return array[]
		 */
		public function get_admin_fields() {
			//***** tab 1 *****//
			$fields['subheading1']              = array(
				'title' => '<h2 id="GeneralRivhit"></h2>',
				'type'  => 'title'
			);
			$fields['enabled']                  = array(
				'title'   => __( 'Enable/Disable', 'woocommerce_icredit' ),
				'type'    => 'checkbox',
				'label'   => __( 'Enable iCredit Payment', 'woocommerce_icredit' ),
				'default' => 'no'
			);
			$fields['test_mode']                = array(
				'title'   => __( 'Test Mode', 'woocommerce_icredit' ),
				'type'    => 'checkbox',
				'label'   => __( 'Use test mode', 'woocommerce_icredit' ),
				'default' => 'yes'
			);
			$fields['title']                    = array(
				'title'       => __( 'Payment Method Title', 'woocommerce_icredit' ),
				'type'        => 'text',
				'description' => __( 'Edit iCredit payment title displayed on the checkout page', 'woocommerce_icredit' ),
				'default'     => __( 'iCredit Payment', 'woocommerce_icredit' ),
				'desc_tip'    => true,
			);
			$fields['description']              = array(
				'title'       => __( 'Description', 'woocommerce_icredit' ),
				'type'        => 'textarea',
				'description' => __( 'Edit the description of iCredit payment displayed in the checkout page', 'woocommerce_icredit' ),
				'default'     => __( "Pay via iCredit - Secure Credit Card Payment", 'woocommerce_icredit' ),
				'desc_tip'    => true,
			);
			$fields['show_icredit_logo']               = array(
				'title'       => __( 'Display Icredit Logo', 'woocommerce_icredit' ),
				'type'        => 'checkbox',
				'label'       => ' ',
				'default'     => 'yes',
				'desc_tip'    => true,
			);
			$fields['show_icons']               = array(
				'title'       => __( 'Credit Icons', 'woocommerce_icredit' ),
				'type'        => 'checkbox',
				'label'       => ' ',
				'description' => __( 'Choose which credit cards icons will appear in checkout page', 'woocommerce_icredit' ),
				'default'     => 'yes',
				'desc_tip'    => true,
			);
			$fields['show_icons_pci']           = array(
				'title'   => ' ',
				'type'    => 'checkbox',
				'label'   => __( 'Pci', 'woocommerce_icredit' ),
				'default' => 'yes',
				'class'   => 'iconx',
			);
			$fields['show_icons_amex']          = array(
				'title'   => '',
				'type'    => 'checkbox',
				'label'   => __( 'Amex', 'woocommerce_icredit' ),
				'default' => 'yes',
				'class'   => 'iconx',
			);
			$fields['show_icons_discover']      = array(
				'title'   => ' ',
				'type'    => 'checkbox',
				'label'   => __( 'Discover', 'woocommerce_icredit' ),
				'default' => 'yes',
				'class'   => 'iconx',
			);
			$fields['show_icons_visa']          = array(
				'title'   => ' ',
				'type'    => 'checkbox',
				'label'   => __( 'Visa', 'woocommerce_icredit' ),
				'default' => 'yes',
				'class'   => 'iconx',
			);
			$fields['show_icons_mastercard']    = array(
				'title'   => ' ',
				'type'    => 'checkbox',
				'label'   => __( 'Mastercard', 'woocommerce_icredit' ),
				'default' => 'yes',
				'class'   => 'iconx',
			);
			$fields['show_icons_isra']          = array(
				'title'   => ' ',
				'type'    => 'checkbox',
				'label'   => __( 'Isracard', 'woocommerce_icredit' ),
				'default' => 'yes',
				'class'   => 'iconx',
			);
			$fields['show_icons_diners']        = array(
				'title'   => ' ',
				'type'    => 'checkbox',
				'label'   => __( 'Diners', 'woocommerce_icredit' ),
				'default' => 'yes',
				'class'   => 'iconx',
			);
			$fields['real_token']               = array(
				'title' => __( 'Group Private Token', 'woocommerce_icredit' ),
				'type'  => 'text',
				'description' => __( 'This is the payment page token connected to the business terminal', 'woocommerce_icredit' ),
				'desc_tip'    => true,
			);
			$fields['test_token']               = array(
				'title'   => __( 'Test Group Private Token (optional)', 'woocommerce_icredit' ),
				'type'    => 'text',
				'default' => 'bb8a47ab-42e0-4b7f-ba08-72d55f2d9e41',
				'description' => __( 'This is a payment page token for tests', 'woocommerce_icredit' ),
				'desc_tip'    => true,
			);
			$fields['create_token']             = array(
				'title'   => __( 'Create Token', 'woocommerce_icredit' ),
				'type'    => 'checkbox',
				'default' => 'no',
				'description' => __( 'Activate tokenization service in iCredit payment', 'woocommerce_icredit' ),
				'desc_tip'    => true,
			);
			$fields['real_token_2']             = array(
				'title' => __( 'Second Group Private Token', 'woocommerce_icredit' ),
				'type'  => 'text',
				'class'   => 'create_token_controller',
				'description' => __( 'This is the payment page token for a second terminal - according to the credit card company demands', 'woocommerce_icredit' ),
				'desc_tip'    => true,
			);
			$fields['status_for_failed_orders'] = array(
				'title'       => __( 'Failed Order Status', 'woocommerce_icredit' ),
				'type'        => 'select',
				'options'     => icredit_get_order_optional_statuses_template(),
				'default'     => 'wc-on-hold',
				'description' => __( 'Choose the status for orders with failed payments', 'woocommerce_icredit' ),
				'desc_tip'    => true,
			);

			//***** tab 2 *****//
			$fields['subheading2']         = array(
				'title' => '<h2 id="rivhitPaymentSettings"></h2>',
				'type'  => 'title'
			);
			$fields['max_payments']        = array(
				'title'   => __( 'Max Payments', 'woocommerce_icredit' ),
				'type'    => 'number',
				'default' => 0,
				'description' => __( 'Maximun number of payments available for the customer on the payment page', 'woocommerce_icredit' ),
				'desc_tip'    => true,
			);
			$fields['credit_from_payment'] = array(
				'title'   => __( 'Credit From Payments', 'woocommerce_icredit' ),
				'type'    => 'number',
				'default' => 0,
				'description' => __( 'Sets from which number of payment the transaction will be with credit payments', 'woocommerce_icredit' ),
				'desc_tip'    => true,
			);
			$fields['SaleType']            = array(
				'title'   => __( 'Sale Type Mode', 'woocommerce_icredit' ),
				'type'    => 'select',
				'label'   => __( '', 'woocommerce_icredit' ),
				'options' => array(
					'1' => __( 'Immediate transaction', 'woocommerce_icredit' ),
					'2' => __( 'On Hold / j5', 'woocommerce_icredit' ),
				),
				'default' => '1',
				'description' => __( 'Sets if the iCredit payment will be immidiate or on hold', 'woocommerce_icredit' ),
				'desc_tip'    => true,
			);

			$fields['ChargeJ5']            = array(
				'title'   => __( 'Charge J5 By Bulk', 'woocommerce_icredit' ),
				'type'    => 'select',
				'label'   => __( '', 'woocommerce_icredit' ),
				'options' => array(
					'1' => __( 'No', 'woocommerce_icredit' ),
					'2' => __( 'Yes', 'woocommerce_icredit' ),
				),
				'default' => '1',
			    'description' => __( 'Choose if J5 transactions can be charged from the order list with bulk - by changing order status', 'woocommerce_icredit' ),
				'desc_tip'    => true,
				'class'   => 'saletypecontroller',
			);
			$fields['ChargeJ5Status']            = array(
				'title'   => __( 'Bulk J5 Charge Status', 'woocommerce_icredit' ),
				'type'    => 'select',
				'label'   => __( '', 'woocommerce_icredit' ),
				'options' => icredit_get_all_statuses(),
				'default' => 'wc-completed',
				'description' => __( 'Define by which order status a J5 transactions will be charged from the order list bulk', 'woocommerce_icredit' ),
				'desc_tip'    => true,
				'class'   => 'saletypecontroller',
			);
			$fields['ChargePendingSale']            = array(
				'title'   => __( 'Change J5 Details', 'woocommerce_icredit' ),
				'type'    => 'select',
				'label'   => __( '', 'woocommerce_icredit' ),
				'options' => array(
					'1' => __( 'No', 'woocommerce_icredit' ),
					'2' => __( 'Yes', 'woocommerce_icredit' ),
				),
				'default' => '1',
				'description' => __( 'Sets if the J5 charge will create a new sale in iCredit interface and will include order changes - items and total amount','woocommerce_icredit' ),
				'desc_tip'    => true,
				'class'   => 'saletypecontroller',
			);

			$fields['document_language']   = array(
				'title'       => __( 'Document Language', 'woocommerce_icredit' ),
				'description' => __( "Select the language of the invoice - 'By Country Code' will set Hebrew for Israel and English for other countries", 'woocommerce_icredit' ),
				'type'        => 'select',
				'label'       => '',
				'options'     => icredit_allowed_langs_admin(),
				'default'     => 'by_country_code',
				'desc_tip'    => true,
			);
			$fields['exempt_vat']          = array(
				'title'       => __( 'Exampt VAT', 'woocommerce_icredit' ),
				'description' => __( 'Select VAT Settings', 'woocommerce_icredit' ),
				'type'        => 'select',
				'label'       => '',
				'options'     => array(
					'always_not_exempt'              => __( 'Always Not Exempt', 'woocommerce_icredit' ),
					'always_exempt'                  => __( 'Always Exempt', 'woocommerce_icredit' ),
					'by_shipping_address'            => __( 'By Shipping Country', 'woocommerce_icredit' ),
					'by_billing_address'             => __( 'By Billing Country', 'woocommerce_icredit' ),
					'by_shipping_or_billing_address' => __( 'By Shipping or Billing Country', 'woocommerce_icredit' ),
				),
				'default'     => 'by_shipping_or_billing_address',
				'desc_tip'    => true,
			);
			$fields['use_shipping_fields'] = array(
				'title'       => __( 'Order Address', 'woocommerce_icredit' ),
				'type'        => 'select',
				'description' => __( 'Choose customer address to present on the invoice - shipping or billing?', 'woocommerce_icredit' ),
				'options'     => array(
					'no'  => __( 'Billing Address', 'woocommerce_icredit' ),
					'yes' => __( 'Shipping Address', 'woocommerce_icredit' ),
				),
				'desc_tip'    => true,
			);

			$shipping_methods_keys         = icredit_generate_keys_shipping_methods_sku();
			$fields['subheading21']        = array(
				'title'       => '<h4 id="GeneralRivhitZones">' . __( 'Shipping SKU', 'woocommerce_icredit' ) . '</h4>',
				'type'        => 'checkbox',
				'label'       => ' ',
				'description' => __( 'Save SKU for each type of shipping choice', 'woocommerce_icredit' ),
				'default'     => 'yes',
				'desc_tip'    => true,
			);

			if ( ! empty( $shipping_methods_keys ) ) {
				foreach ( $shipping_methods_keys as $key ) {
					$fields[ $key['key'] ] = array(
						'title'       => sprintf( __( '%s', 'woocommerce_icredit' ), $key['name'] ),
						'type'        => 'text',
						'description' => '',
						'class'       => 'shippings',
					);
				}
			}
			$fields['products_variation_type'] = array(
				'title'   => __( 'Item Variation Display', 'woocommerce_icredit' ),
				'type'    => 'select',
				'label'   => __( '', 'woocommerce_icredit' ),
				'options' => array(
					'chain' => __( 'Combined', 'woocommerce_icredit' ),
					'under' => __( 'Detailed', 'woocommerce_icredit' ),
				),
				'default' => 'chain',
				'description' => __( 'Set item Variation invoice Display - combined in the item name or in a seperate row', 'woocommerce_icredit' ),
				'desc_tip'    => true,
			);
			$fields['subheading22']        = array(
				'title' => '<h4 id="GeneralRivhitTransmitted">' . __( 'Transmitted Information', 'woocommerce_icredit' ) . '</h4>',
				'type'        => 'checkbox',
				'label'       => ' ',
				'default'     => 'yes',
				'desc_tip'    => true,
				'description' => __( 'Set which of the customer fields will be transmitted and presented on the invoice', 'woocommerce_icredit' ),
				'desc_tip'    => true,
			);

			$fields['field_firstname']         = array(
				'title'   => __( 'First Name', 'woocommerce_icredit' ),
				'type'    => 'checkbox',
				'default' => 'yes',
				'class'   => 'hideLabel transmittedData',
			);
			$fields['field_lastname']          = array(
				'title'   => __( 'Last Name', 'woocommerce_icredit' ),
				'type'    => 'checkbox',
				'default' => 'yes',
				'class'   => 'hideLabel transmittedData',
			);
			$fields['field_email']             = array(
				'title'   => __( 'e-mail Address', 'woocommerce_icredit' ),
				'type'    => 'checkbox',
				'default' => 'yes',
				'class'   => 'hideLabel transmittedData',
			);
			$fields['field_address']           = array(
				'title'   => __( 'Address', 'woocommerce_icredit' ),
				'type'    => 'checkbox',
				'default' => 'yes',
				'class'   => 'hideLabel transmittedData',
			);
			$fields['field_city']              = array(
				'title'   => __( 'City', 'woocommerce_icredit' ),
				'type'    => 'checkbox',
				'default' => 'yes',
				'class'   => 'hideLabel transmittedData',
			);
			$fields['field_zipcode']           = array(
				'title'   => __( 'Zip Code', 'woocommerce_icredit' ),
				'type'    => 'checkbox',
				'default' => 'yes',
				'class'   => 'hideLabel transmittedData',
			);
			$fields['field_phonenumber']       = array(
				'title'   => __( 'Phone Number', 'woocommerce_icredit' ),
				'type'    => 'checkbox',
				'default' => 'yes',
				'class'   => 'hideLabel transmittedData',
			);
			$fields['field_companyname']       = array(
				'title'   => __( 'Company Name', 'woocommerce_icredit' ),
				'type'    => 'checkbox',
				'default' => 'yes',
				'class'   => 'hideLabel transmittedData',
			);
			$fields['user_comments']           = array(
				'title'   => __( 'User Comments', 'woocommerce_icredit' ),
				'type'    => 'checkbox',
				'default' => 'yes',
				'class'   => 'hideLabel transmittedData',
			);

			//***** tab 3 *****//
			$fields['subheading3']         = array(
				'title' => '<h2 id="rivhitTechnicalSettings"></h2>',
				'type'  => 'title'
			);
			$fields['popup_mode']          = array(
				'title'   => __( 'Payment Window Mode', 'woocommerce_icredit' ),
				'type'    => 'select',
				'label'   => __( '', 'woocommerce_icredit' ),
				'options' => array(
					'redirect' => __( 'Redirect', 'woocommerce_icredit' ),
					'iframe'   => __( 'iFrame', 'woocommerce_icredit' ),
					'popup'    => __( 'PopUp', 'woocommerce_icredit' ),
				),
				'default' => 'redirect',
				'description' => __( 'Choose how to display the payment page', 'woocommerce_icredit' ),
				'desc_tip'    => true
			);
			$fields['iframe_height']       = array(
				'title'   => __( 'iFrame Height', 'woocommerce_icredit' ),
				'type'    => 'number',
				'default' => 700
			);
			$fields['hide_items']          = array(
				'title'   => __( 'Hide Items on Payment Page', 'woocommerce_icredit' ),
				'type'    => 'checkbox',
				'default' => 'no'
			);
			$fields['redirect_url']        = array(
				'title'       => __( 'Thank You page URL', 'woocommerce_icredit' ),
				'type'        => 'text',
				'description' => __( 'Leave empty to use WooCommerce default thank you page (<strong>recommended</strong>)', 'woocommerce_icredit' ),
				'desc_tip'    => true
			);
			$fields['do_logging']          = array(
				'title'       => __( 'IPN LOG', 'woocommerce_icredit' ),
				'type'        => 'checkbox',
				'description' => __( 'This controls the option to do response logs.', 'woocommerce_icredit' ),
				'default'     => 'yes',
				'desc_tip'    => true,
			);
			$fields['do_logging_requests'] = array(
				'title'       => __( 'Icredit requests LOG', 'woocommerce_icredit' ),
				'type'        => 'checkbox',
				'description' => __( 'This controls the option to do requests logs.', 'woocommerce_icredit' ),
				'default'     => 'yes',
				'desc_tip'    => true,
			);
			$fields['http_https']          = array(
				'title'   => __( 'IPN Protocol', 'woocommerce_icredit' ),
				'type'    => 'select',
				'label'   => __( '', 'woocommerce_icredit' ),
				'options' => array(
					'http'  => __( 'http', 'woocommerce_icredit' ),
					'https' => __( 'https', 'woocommerce_icredit' ),
				),
				'default' => 'http',
				'description' => __( 'Set according to the website protocol', 'woocommerce_icredit' ),
				'desc_tip'    => true
			);
			$fields['ipn_integration']     = array(
				'title'   => __( 'IPN Integration', 'woocommerce_icredit' ),
				'type'    => 'text',
				'default' => '',
				'description' => __( 'Leave empty to use plugin default (<strong>recommended</strong>)', 'woocommerce_icredit' ),
				'desc_tip'    => true
			);
			$fields['ipn_method']          = array(
				'title'   => __( 'IPN method', 'woocommerce_icredit' ),
				'type'    => 'select',
				'label'   => __( '', 'woocommerce_icredit' ),
				'options' => array(
					'POST' => __( 'POST', 'woocommerce_icredit' ),
					'GET'  => __( 'GET', 'woocommerce_icredit' ),
				),
				'default' => 'POST',
			);

			//***** tab 4 *****//
			$fields['subheading4'] = array(
				'title' => '<h2 id="rivhitLangsTokens"></h2>',
				'type'  => 'title'
			);

			$available_langs = icredit_helper_available_languages();
			if ( ! empty( $available_langs ) ) {
				foreach ( $available_langs as $key => $lang ) {
//					if ( $key === 'he' ) {
//						continue;
//					}
//					$fields['real_token_lang_symbol_' . $key] = array(
//						'title'       => sprintf( __( '%s Second Language', 'woocommerce_icredit' ), $lang ),
//						'type'        => 'text',
//						'description' => '',
//						'default'     => $key, // allways en or en_IL
//					);
					$fields[ 'real_token_lang_' . $key ]  = array(
						'title' => sprintf( __( '%s', 'woocommerce_icredit' ), $lang['title'] ),
						'type'  => 'text',
					);
					$fields[ 'real_token2_lang_' . $key ] = array(
						'title' => sprintf( __( 'Second %s token', 'woocommerce_icredit' ), $lang['title'] ),
						'type'  => 'text',
						'class'   => 'create_token_controller',
					);
				}
			}


			return apply_filters( 'icredit_admin_fields_extensions_hook', $fields );
		}

		/**
		 * @return void
		 */
		public function admin_woocommerce_before_setting() {
			echo '<div class="icreditAdminFields">';

		}

		/**
		 * @return void
		 */
		public function admin_woocommerce_after_setting() {
			echo '</div>';
		}

		/**
		 * @return void
		 */
		public function admin_woocommerce_sections() {
			$tabs        = $this->get_arr_admin_sub_tabs();
			$icredit_link = 'https://icredit.rivhit.co.il/';
			$templateTab = '<div><div class="adminRichitLogo"><figure><a href="' . $icredit_link . '" aria-label="rivhit website" title="rivhit website" target="_blank" class="rivhitLink"><img width="160px" height="50px" src="' . plugin_dir_url( __FILE__ ) . "../../assets/images/" . 'Rivchit_iCredit.png" alt="rivhit logo" aria-label="rivhit logo"/></a></figure></div><h3 class="mainTopTitleIcredit"><span>iCredit Payment Settings <small class="wc-admin-breadcrumb"><a href="' . site_url() . '/wp-admin/admin.php?page=wc-settings&amp;tab=checkout" aria-label="Return to payments">⤴</a></small></span></h3></div>';
			$templateTab .= '<div id="icreditAdminFieldsSections">';
			if ( ! empty( $tabs ) ) {
				$templateTab .= '<ul>';
				$i           = 1;
				foreach ( $tabs as $key => $tb ) {
					$activeClass = 'nav-tab-active';
					if ( $i > 1 ) {
						$activeClass = '';
					}
					$templateTab .= '<li data-id="' . $key . '"><a id="icreditAdminFieldsSections_' . $i . '" href="#' . $tb['id'] . '" target="_parent" rel="nofollow" role="tablist" aria-label="' . $tb['label'] . '" title="' . $tb['label'] . '" class="rivhit_tab_in nav-tab ' . $activeClass . '">' . $tb['label'] . '</a></li>';
					$i ++;
				}
				$templateTab .= '</ul>';
			}
			$templateTab .= '</div>';

			echo $templateTab;
		}

		/**
		 * @return array
		 */
		private function get_arr_admin_sub_tabs() {
			$tabs = array(
				'GeneralSettings'         => array(
					'label' => __( 'General Settings', 'woocommerce_icredit' ),
					'id'    => 'GeneralRivhit'
				),
				'rivhitPaymentSettings'   => array(
					'label' => __( 'Payment Settings', 'woocommerce_icredit' ),
					'id'    => 'rivhitPaymentSettings',
				),
				'rivhitTechnicalSettings' => array(
					'label' => __( 'Technical Settings', 'woocommerce_icredit' ),
					'id'    => 'rivhitTechnicalSettings',
				),
				'rivhitLangsTokens'       => array(
					'label' => __( 'Languages', 'woocommerce_icredit' ),
					'id'    => 'rivhitLangsTokens',
				),
			);

			return apply_filters( 'icredit_admin_tabs_extensions_hook', $tabs );
		}

	}
}
