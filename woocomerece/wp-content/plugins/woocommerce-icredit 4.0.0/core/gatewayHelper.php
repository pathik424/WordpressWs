<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

/**
 * @param $first_part
 *
 * @return mixed|string
 */
function icredit_get_current_website_lang( $first_part = false ) {
	$local = get_locale();
	if ( $first_part === true ) {
		if ( strpos( $local, '_' ) ) {
			$pieces = explode( "_", $local );
			$local = $pieces[0];
		}
	}

	return $local;
}

/**
 * @param $currency
 *
 * @return mixed|string
 */
function icredit_helper_get_currency( $currency = '' ) {
	switch ( $currency ) {
		case "ILS":
			$currency = "1";
			break;
		case "USD":
			$currency = "2";
			break;
		case "EUR":
			$currency = "3";
			break;
		case "GBP":
			$currency = "4";
			break;
		case "AUD":
			$currency = "5";
			break;
		case "CAD":
			$currency = "6";
			break;
		default:
			$currency = "";
			break;
	}

	return $currency;
}

/**
 * @return array
 *
 * get Icredit supported languages
 */
function icredit_helper_available_languages() {
	return array(
		'he' => array( 'title' => __( 'Hebrew', 'woocommerce_icredit' ), 'code' => 'he', 'code2' => 'he_IL' ),
		'en' => array( 'title' => __( 'English', 'woocommerce_icredit' ), 'code' => 'en', 'code2' => 'en_US' ),
		'ru' => array( 'title' => __( 'Russian', 'woocommerce_icredit' ), 'code' => 'ru', 'code2' => 'ru_RU' ),
		'es' => array( 'title' => __( 'Spanish', 'woocommerce_icredit' ), 'code' => 'es', 'code2' => 'es_SP' ),
		'fr' => array( 'title' => __( 'French', 'woocommerce_icredit' ), 'code' => 'fr', 'code2' => 'fr_FR' ),
		'nl' => array( 'title' => __( 'Dutch', 'woocommerce_icredit' ), 'code' => 'nl', 'code2' => 'nl_NL' ),
		'ar' => array( 'title' => __( 'Arabic', 'woocommerce_icredit' ), 'code' => 'ar', 'code2' => 'ar_AR' ),
	);
}

/**
 * @param $lang
 * @param $billing_country
 *
 * @return mixed|string
 * add support for
 */
function icredit_helper_document_lang( $lang = 'always_hebrew', $billing_country = 'IL' ) {
	switch ( $lang ) {
		case 'always_hebrew':
			$lang = 'he';
			break;
		case 'always_english':
			$lang = 'en';
			break;
		case 'always_russian':
			$lang = 'ru';
			break;
		case 'always_french':
			$lang = 'fr';
			break;
		case 'always_spanish':
			$lang = 'es';
			break;
		case 'always_arabic':
			$lang = 'ar';
			break;
		case 'always_dutch':
			$lang = 'nl';
			break;
		case 'by_country_code':
			if ( ! empty( $billing_country ) ) {
				switch ( $billing_country ) {
					case 'IL':
						$lang = 'he';
						break;
					case 'US':
						$lang = 'en';
						break;
					case 'RU':
						$lang = 'ru';
						break;
					case 'FR':
						$lang = 'fr';
						break;
					case 'ES':
						$lang = 'es';
						break;
					case 'AR':
						$lang = 'ar';
						break;
					case 'NL':
						$lang = 'nl';
						break;
					default:
						$lang = 'he';
						break;
				}
			} else {
				$lang = 'en';
			}
			break;
	}

	return $lang;
}

/**
 * @param $order
 *
 * @return string
 */
function icredit_helper_document_lang_by_order( $order ) {
	$lang    = 'en';
	$country = $order->get_billing_country();
	if ( empty( $country ) ) {
		$country = $order->get_shipping_country();
	}
	switch ( $country ) {
		case 'IL':
			$lang = 'he';
			break;
		case 'US':
			$lang = 'en';
			break;
		case 'always_russian':
			$lang = 'ru';
			break;
		case 'always_french':
			$lang = 'fr';
			break;
		case 'always_spanish':
			$lang = 'es';
			break;
		case 'always_arabic':
			$lang = 'ar';
			break;
		case 'always_dutch':
			$lang = 'nl';
			break;
	}

	return $lang;
}

/**
 * @param $vat
 * @param $shipping_country
 * @param $billing_country
 *
 * @return bool
 */
function icredit_helper_exempt_vat( $vat, $shipping_country = '', $billing_country = '' ) {
	$exemptVAT = false;
	switch ( $vat ) {
		case 'always_not_exempt':
			$exemptVAT = false;
			break;
		case 'always_exempt':
			$exemptVAT = true;
			break;
		case 'by_shipping_address':
			$exemptVAT = ( $shipping_country == 'IL' ) ? false : true;
			break;
		case 'by_billing_address':
			$exemptVAT = ( $billing_country == 'IL' ) ? false : true;
			break;
		case 'by_shipping_or_billing_address':
			$exemptVAT = ( ( $billing_country == 'IL' ) || ( $shipping_country == 'IL' ) ) ? false : true;
			break;
	}

	return $exemptVAT;
}

/**
 * @return string[]
 */
function icredit_get_accepted_logos() {
	return array(
		'amex'       => 'Amex-logo.png',
		'discover'   => 'Discover-logo.png',
		'Visa'       => 'Visa-logo.png',
		'Mastercard' => 'Mastercard-logo.png',
		'Isra'       => 'Isra-logo.png',
		'Diners'     => 'Diners-logo.png',
		'Pci'        => 'Pci-logo.png',
	);
}

/**
 * @param $key
 *
 * @return string
 */
function icredit_get_order_card_producer( $key = 0 ) {
	$arr = array(
		'1' => array(
			'producer' => 'Isracard',
		),
		'2' => array(
			'producer' => 'Visa',
		),
		'3' => array(
			'producer' => 'Diners',
		),
		'4' => array(
			'producer' => 'American Express',
		),
		'5' => array(
			'producer' => 'JCB',
		),
		'6' => array(
			'producer' => 'LeumiCard',
		),
		'7' => array(
			'producer' => 'Other',
		),
	);

	if ( empty( $arr[$key] ) ) {
		return 'Other';
	}

	return $arr[ $key ]['producer'];
}

/**
 * @param $key
 *
 * @return string[]
 */
function icredit_get_order_card_label( $key = 0 ) {
	$arr = array(
		'0' => array(
			'label' => 'Private Card (PL)',
			'icon'  => 'credit-card.png',
		),
		'1' => array(
			'label' => 'MasterCard',
			'icon'  => 'Mastercard-logo.png',
		),
		'2' => array(
			'label' => 'Visa',
			'icon'  => 'Visa-logo.png',
		),
		'3' => array(
			'label' => 'Diners',
			'icon'  => 'Diners-logo.png',
		),
		'4' => array(
			'label' => 'American Express',
			'icon'  => 'Amex-logo.png',
		),
		'5' => array(
			'label' => 'Isracard',
			'icon'  => 'Isra-logo.png',
		),
		'6' => array(
			'label' => 'JCB',
			'icon'  => 'credit-card.png',
		),
		'7' => array(
			'label' => 'Discover',
			'icon'  => 'Discover-logo.png',
		),
		'8' => array(
			'label' => 'Maestro',
			'icon'  => 'credit-card.png',
		),
	);

	return $arr[ $key ];
}

/**
 * @return array
 */
function icredit_allowed_langs() {
	return array(
		'always_hebrew'   => __( 'Always Hebrew', 'woocommerce_icredit' ),
		'always_english'  => __( 'Always English', 'woocommerce_icredit' ),
		'always_russian'  => __( 'Always Russian', 'woocommerce_icredit' ),
		'always_french'   => __( 'Always French', 'woocommerce_icredit' ),
		'always_spanish'  => __( 'Always Spanish', 'woocommerce_icredit' ),
		'always_arabic'   => __( 'Always Arabic', 'woocommerce_icredit' ),
		'always_dutch'    => __( 'Always Dutch', 'woocommerce_icredit' ),
		'by_country_code' => __( 'By Country Code', 'woocommerce_icredit' ),
	);
}
/**
 * @return array
 */
function icredit_allowed_langs_admin() {
	return array(
		'always_hebrew'   => __( 'Always Hebrew', 'woocommerce_icredit' ),
		'always_english'  => __( 'Always English', 'woocommerce_icredit' ),
		'by_country_code' => __( 'By Country Code', 'woocommerce_icredit' ),
	);
}

/**
 * @return mixed
 */
function icredit_get_current_language() {
	return get_bloginfo('language');
}

/**
 * @param $lang
 *
 * @return array|mixed
 */
function icredit_get_current_language_token( $lang = 'he_IL' ) {
	$arr = array(
		'he_IL' => array( 'title' => __( 'Hebrew', 'woocommerce_icredit' ), 'code' => 'he', 'code2' => 'he_IL' ),
		'he-IL' => array( 'title' => __( 'Hebrew', 'woocommerce_icredit' ), 'code' => 'he', 'code2' => 'he-IL' ),
		'en_US' => array( 'title' => __( 'English', 'woocommerce_icredit' ), 'code' => 'en', 'code2' => 'en_US' ),
		'en-US' => array( 'title' => __( 'English', 'woocommerce_icredit' ), 'code' => 'en', 'code2' => 'en-US' ),
		'ru_RU' => array( 'title' => __( 'Russian', 'woocommerce_icredit' ), 'code' => 'ru', 'code2' => 'ru_RU' ),
		'ru-RU' => array( 'title' => __( 'Russian', 'woocommerce_icredit' ), 'code' => 'ru', 'code2' => 'ru-RU' ),
		'es_ES' => array( 'title' => __( 'Spanish', 'woocommerce_icredit' ), 'code' => 'es', 'code2' => 'es_SP' ),
		'es-ES' => array( 'title' => __( 'Spanish', 'woocommerce_icredit' ), 'code' => 'es', 'code2' => 'es-SP' ),
		'fr_FR' => array( 'title' => __( 'French', 'woocommerce_icredit' ), 'code' => 'fr', 'code2' => 'fr_FR' ),
		'fr-FR' => array( 'title' => __( 'French', 'woocommerce_icredit' ), 'code' => 'fr', 'code2' => 'fr-FR' ),
		'nl_NL' => array( 'title' => __( 'Dutch', 'woocommerce_icredit' ), 'code' => 'nl', 'code2' => 'nl_NL' ),
		'nl-NL' => array( 'title' => __( 'Dutch', 'woocommerce_icredit' ), 'code' => 'nl', 'code2' => 'nl-NL' ),
		'ar_AR' => array( 'title' => __( 'Arabic', 'woocommerce_icredit' ), 'code' => 'ar', 'code2' => 'ar_AR' ),
		'ar-AR' => array( 'title' => __( 'Arabic', 'woocommerce_icredit' ), 'code' => 'ar', 'code2' => 'ar-AR' ),
	);
	return $arr[ $lang ];
}

/**
 * @return array
 */
function icredit_get_enable_shipping_methods() {
	$arr = array();
	foreach ( icredit_get_all_shipping_zones() as $zone ) {
		$id                                  = $zone->get_id();
		$arr[ $id ]                          = [];
		$arr[ $id ]['zone_name']             = $zone->get_zone_name();
		$arr[ $id ]['zone_shipping_methods'] = [];
		$methods                             = $zone->get_shipping_methods();
		if ( $methods ) {
			foreach ( $methods as $instance_id => $method ) {
				$arr[ $id ]['zone_shipping_methods'][] = array( 'id' => $instance_id, 'name' => $method->get_title() );
			}
		}
	}

	return $arr;
}

/**
 * @return array
 */
function icredit_get_all_shipping_zones() {
	$data_store = WC_Data_Store::load( 'shipping-zone' );
	$raw_zones  = $data_store->get_zones();
	foreach ( $raw_zones as $raw_zone ) {
		$zones[] = new WC_Shipping_Zone( $raw_zone );
	}

	//$zones[] = new WC_Shipping_Zone( 0 );
	return $zones;
}

/**
 * @return array
 */
function icredit_generate_keys_shipping_methods_sku() {
	$fields           = array();
	$shipping_methods = icredit_get_enable_shipping_methods();
	foreach ( $shipping_methods as $m ) {
		if ( ! empty( $m['zone_shipping_methods'] ) ) {
			foreach ( $m['zone_shipping_methods'] as $z ) {
				array_push( $fields, array(
					'key'  => 'icredit_shipping_' . $z['id'],
					'name' => $m['zone_name'] . ' ' . $z['name']
				) );
			}
		}
	}

	return $fields;
}


/**
 * @param $order
 *
 * @return array
 */
function icredit_helper_get_shipping_methods_items( $order ) {
	$items     = array();
	$mainClass = WC_Gateway_ICredit::getInstance();
	if ( ! empty( $order->get_shipping_methods() ) ) {
		foreach ( $order->get_shipping_methods() as $shipping_method ) {
			$shipping_method_name = $shipping_method->get_name();
			$shippingCost         = str_replace( ',', '', number_format( $shipping_method->get_total(), 2 ) );
			$shippingTax          = str_replace( ',', '', number_format( $shipping_method->get_total_tax(), 2 ) );
			$shipping_method_cost = $shippingCost + $shippingTax;
			$data                 = $shipping_method->get_data();
			$method_custom_key    = 'icredit_shipping_' . $data['instance_id'];
			array_push( $items, array(
				//'Id'            => $data['instance_id'],
				'UnitPrice'     => $shipping_method_cost,
				'Quantity'      => 1,
				'Description'   => $shipping_method_name,
				//'method_id'     => $data['method_id'],
				'CatalogNumber' => $mainClass->get_class_inner_option( $method_custom_key ),
			) );
		}
	}

	return $items;
}

/**
 * @param $order
 * @param $bool
 *
 * @return array
 */
function icredit_helper_get_product_items( $order, $bool = false ) {
	$items       = array();
	$order_items = $order->get_items();
	if ( ! empty( $order_items ) ) {
		foreach ( $order_items as $order_item ) {
			$line_total = ( $order_item['line_tax'] > 0 ) ? number_format( ( $order_item['subtotal'] + $order_item['line_tax'] ) / $order_item['qty'], 2 ) : number_format( $order_item['subtotal'] / $order_item['qty'], 2 );
			/* Fix for variation SKU */
			if ( $order_item['variation_id'] ) {
				$temp_product = new WC_Product_Variation( $order_item['variation_id'] );
				array_push( $items, icredit_massive_product_loop_arr( $temp_product, $line_total, $order_item ) );
				if ( $bool === true ) {
					$attributes = $temp_product->get_variation_attributes();
					if ( count( $attributes ) ) {
						foreach ( $attributes as $key => $value ) {
							$key = str_replace( 'attribute_', '', $key );
							$key = str_replace( 'pa_', '', $key );
							array_push( $items, icredit_massive_product_loop_arr_attr( $key, $value ) );
						}
					}
				}
			} else {
				$temp_product = new WC_Product( $order_item['product_id'] );
				array_push( $items, icredit_massive_product_loop_arr( $temp_product, $line_total, $order_item ) );
			}
		}
	}

	return $items;
}

/**
 * @param $temp_product
 * @param $line_total
 * @param $order_item
 *
 * @return array
 */
function icredit_massive_product_loop_arr( $temp_product, $line_total, $order_item ) {
	return array(
		'Id'            => '0',
		'CatalogNumber' => $temp_product->get_sku(),
		'UnitPrice'     => str_replace( ',', '', $line_total ),
		'Quantity'      => $order_item['qty'],
		'Description'   => $order_item['name']
	);
}

/**
 * @param $key
 * @param $value
 *
 * @return string[]
 */
function icredit_massive_product_loop_arr_attr( $key, $value ) {
	return array(
		'Id'            => '0',
		'CatalogNumber' => '0',
		'UnitPrice'     => '0',
		'Quantity'      => '1',
		'Description'   => urldecode( $key ) . ': ' . urldecode( $value )
	);
}

/**
 * @param $order
 * @param $isCompany
 *
 * @return array
 * get modified shipping and billing fields
 */
function icredit_get_shipping_data( $order, $isCompany = false ) {
	$modifiedShipping = [];
	$modifiedBilling  = [];
	// BILLING FIELDS
	$modifiedShipping['Country']           = ( $order->get_shipping_country() == 'IL' || $order->get_shipping_country() == '' ) ? 'IL' : $order->get_shipping_country();
	$modifiedShipping['State']             = $order->get_shipping_state();
	$modifiedShipping['CustomerFirstName'] = $order->get_shipping_first_name();
	$modifiedShipping['CustomerLastName']  = $order->get_shipping_last_name();
	if ( $isCompany === true && ! empty( $order->get_shipping_company() ) ) {
		$modifiedShipping['CustomerLastName'] .= ' - ' . $order->get_shipping_company();
	}
	$modifiedShipping['EmailAddress'] = $order->get_billing_email();
	$modifiedShipping['Address']      = $order->get_shipping_address_1() . ' ' . $order->get_shipping_address_2();
	$modifiedShipping['City']         = $order->get_shipping_city();
	$modifiedShipping['PhoneNumber']  = $order->get_shipping_phone();
	$modifiedShipping['Zipcode']      = icredit_clear_zip_code_for_api( $order->get_shipping_postcode() );
	// SIPPING FIELDS
	$modifiedBilling['Country']           = ( $order->get_billing_country() == 'IL' || $order->get_billing_country() == '' ) ? 'IL' : $order->get_billing_country();
	$modifiedBilling['State']             = $order->get_billing_state();
	$modifiedBilling['CustomerFirstName'] = $order->get_billing_first_name();
	$modifiedBilling['CustomerLastName']  = $order->get_billing_last_name();
	if ( $isCompany === true && ! empty( $order->get_billing_company() ) ) {
		$modifiedBilling['CustomerLastName'] .= ' - ' . $order->get_billing_company();
	}
	$modifiedBilling['EmailAddress'] = $order->get_billing_email();
	$modifiedBilling['Address']      = $order->get_billing_address_1() . ' ' . $order->get_billing_address_2();
	$modifiedBilling['City']         = $order->get_billing_city();
	$modifiedBilling['PhoneNumber']  = $order->get_billing_phone();
	$modifiedBilling['Zipcode']      = icredit_clear_zip_code_for_api( $order->get_billing_postcode() );

	return array( 'billing' => $modifiedBilling, 'shipping' => $modifiedShipping );
}

/**
 * @param $zipCode
 *
 * @return false|float|int|string
 */
function icredit_clear_zip_code_for_api( $zipCode = '' ) {
	if ( ! is_numeric( $zipCode ) ) {
		$zipCode = '00000';
	} else if ( strlen( $zipCode ) > 7 ) {
		$zipCode = substr( $zipCode, 0, 7 );
	}

	return $zipCode;
}

/**
 * @param $order
 *
 * @return int|mixed
 *
 * add gift card `pw-gift card` support
 */
function icredit_get_order_discount( $order ) {
	$discount = $order->get_total_discount();
	if ( empty( $discount ) ) {
		$total_discount = 0;
		if ( function_exists('WC') ) {
			if ( is_object( WC()->session ) ) {
				$session_data = (array) WC()->session->get( 'pw-gift-card-data' );
			}
		}
		if ( isset( $session_data ) && !empty( $session_data ) ) {
			if ( isset( $session_data['gift_cards'] )  && !empty( $session_data['gift_cards'] ) ) {
				foreach ( $session_data['gift_cards'] as $card_number => $discount_amount ) {
					$pw_gift_card = new PW_Gift_Card( $card_number );
					if ( $pw_gift_card->get_id() ) {
						if ( $discount_amount ) {
							$total_discount += (int)$discount_amount;
						}
					}
				}
				$discount .= $total_discount;
			}
		}
	}

	return $discount;
}

/**
 * @param $string
 *
 * @return mixed|string|void
 */
function icredit_handle_card_number_clear( $string = '' ) {
	$count = 0;
	$lookfor = array('xxxxx', 'xxxxxx');
	$filer = $lookfor[0];
	$string = strtolower( $string );
	if ( strpos( $string, $lookfor[0]) !== false ) {
		$count = 5;
	}
	if ( strpos( $string, $lookfor[1]) !== false ) {
		$count = 6;
		$filer = $lookfor[1];
	}
	if ( $count > 0 ) {
		$string = explode( $filer, $string );
		if ( $string[1] ) {
			return $string[1];
		}
	}

	return $string;
}

/**
 * @param $order
 *
 * @return false
 */
function icredit_check_if_order_paid( $order ) {
	if ( !empty( $order ) ) {
		if ( is_numeric( $order ) ) {
			$order = new WC_Order( $order );
		}
		$status = $order->get_status();
		if ( !empty( $status ) ) {
			if ( in_array( $status, icredit_order_status_that_paid() ) ) {
				return true;
			}
		}
	}

	return false;
}

/**
 * @return string[]
 *
 * you may add here any custom order completed statuses you need
 */
function icredit_order_status_that_paid() {
	return array(
		'wc-processing',
		'processing',
		'wc-completed',
		'completed',
	);
}

/**
 * @param $req
 *
 * @return array
 */
function icredit_arr_clean( $req = array() ) {
	$REQUEST = array_map(function ($v) {
		return wc_clean($v);
	}, $req);
	return $REQUEST;
}

/**
 * @param $code
 *
 * @return string
 */
function icredit_credit_card_errors( $code = '' ) {
	$message = '';
	switch ( $code ) {
		case '1004':
			$message = __( 'Credit card declined.', 'woocommerce_icredit' );
			break;
		case '1005':
			$message = __( 'Currency not supported', 'woocommerce_icredit' );
			break;
		default:
			$message = __( 'uknown error.', 'woocommerce_icredit' );
			break;
	}

	return $message;
}

/**
 * @return string[]
 */
function icredit_get_order_optional_statuses_template() {
	//$statuses = wc_get_order_statuses();
	return array(
		'wc-pending'   => 'Pending payment',
		'wc-failed'    => 'Failed',
		'wc-cancelled' => 'Cancelled',
	);
}

/**
 * @return array
 */
function icredit_get_all_statuses() {
	$arr = [];
	$none = array(
		'wc-failed',
		'wc-cancelled',
		'wc-pending',
		'wc-processing',
		'wc-refunded',
		'wc-checkout-draft',
	);
	$statuses = wc_get_order_statuses();
	if ( !empty( $statuses ) ) {
		foreach ( $statuses as $k => $s ) {
			if ( !in_array( $k, $none ) ) {
				$arr[$k] = $s;
			}
		}
	}

	return $arr;
}

/**
 * @param $order
 * @param $token
 * @param $saleTypeParm
 * @param $bool
 *
 * @return false|string
 */
function get_data_for_order_payment_by_admin( $order, $token, $saleTypeParm = '', $bool = false ) {
	$wcGateClass = WC_Gateway_ICredit::getInstance();
	$options = $wcGateClass::get_global_options();
	$arr            = [];
	if ( $options['ChargePendingSale'] != '2' ) {
		$arr['SaleId'] = get_post_meta( $order->get_id(), 'SaleId', true );
		return json_encode( $arr );
	}
	$getAddressData = icredit_get_shipping_data( $order );
	#ADD ITEMS TO ORDER
	if ( $options['products_variation_type'] === 'under' ) {
		$items = icredit_helper_get_product_items( $order, true );
	} else {
		$items = icredit_helper_get_product_items( $order );
	}
	#ADD SHIPPING COSTS
	$items                    = array_merge( $items, icredit_helper_get_shipping_methods_items( $order ) );
	$arr['GroupPrivateToken'] = $options['payment_token']; //שייך לשפה לקחת משפת האתר הדיפולט
	$arr['CreditcardToken']   = $token;
	$arr['Items']             = $items;
	$arr['IPNMethod']         = $options['ipn_method'] == 'GET' ? 2 : 1;
	if ( $bool === true ) {
		$arr['IPNURL'] = '';
	} else {
		$arr['IPNURL'] = $options['ipn_integration'] !== '' ? $options['ipn_integration'] : $options['ipn_url'];
	}
	$arr['Order']            = $order->get_id();
	$arr['Custom1']          = $order->get_id();
	$arr['Custom3']          = $options['ipn_integration'];
	$arr['Custom5']          = false;
	$arr['Comments']         = $order->get_customer_note();
	$arr['DocumentLanguage'] = icredit_helper_document_lang( $options['document_language'], $getAddressData['billing']['Country'] );
	$arr['ExemptVAT']        = icredit_helper_exempt_vat( $options['exempt_vat'], $getAddressData['billing']['Country'], $getAddressData['shipping']['Country'] );
	$arr['Discount']         = icredit_get_order_discount( $order );
	$arr['Currency']         = icredit_helper_get_currency( $order->get_currency() );
	if ( empty( $arr['Currency'] ) ) {
		$errVar     = icredit_credit_card_errors( '1005' );
		$errMessage = __( 'Error happen', 'woocommerce_icredit' );
		$errMessage .= ' ' . sprintf( __( 'the reason: %s', 'woocommerce_icredit' ), $errVar );
		wc_add_notice( $errMessage, 'error' );

		return false;
	}
	$authNum               = get_post_meta( $arr['Order'], 'TransactionAuthNum', true );
	$customerTransactionId = get_post_meta( $arr['Order'], 'CustomerTransactionId', true );
	if ( ! empty( $saleTypeParm ) ) {
		$arr['SaleType'] = $saleTypeParm;
		if ( $options['test_mode'] === true ) {
			$arr['AuthNum'] = $authNum;
		}
	} else {
		$arr['SaleType'] = $arr['saleType'];
	}
	# if this is J5 - pay now
	if ( $saleTypeParm == '1' ) {
		$arr['AuthNum']               = $authNum;
		$arr['CustomerTransactionId'] = $customerTransactionId;
	}
	if ( $options['test_mode'] ) {
		$arr['AuthNum'] = '123456';
	}
	$payments = get_post_meta( $arr['Order'], 'TransactionNumOfPayment', true );
	if ( $saleTypeParm == '1' && !empty( $payments ) ) {
		$arr['NumberOfPayments'] = (int)$payments;
	}
	if ( empty( $payments ) ) {
		$arr['NumberOfPayments'] = 1;
	}
	$creditTerms = get_post_meta( $arr['Order'], 'CreditTerms', true );
	if ( $creditTerms == '6' ) {
		$arr['CreditTerms'] = (int)$creditTerms;
	}
	if ( $options['use_shipping_fields'] == 'yes' ) {
		$arr['CustomerFirstName'] = $getAddressData['shipping']['CustomerFirstName'];
		$arr['CustomerLastName']  = $getAddressData['shipping']['CustomerLastName'];
		$arr['EmailAddress']      = $getAddressData['shipping']['EmailAddress'];
		$arr['Address']           = $getAddressData['shipping']['Address'];
		$arr['City']              = $getAddressData['shipping']['City'];
		$arr['PhoneNumber']       = $getAddressData['shipping']['PhoneNumber'];
		$arr['Zipcode']           = $getAddressData['shipping']['Zipcode'];
		$arr['Country']           = $getAddressData['shipping']['Country'];
	} else {
		$arr['CustomerFirstName'] = $getAddressData['billing']['CustomerFirstName'];
		$arr['CustomerLastName']  = $getAddressData['billing']['CustomerLastName'];
		$arr['EmailAddress']      = $getAddressData['billing']['EmailAddress'];
		$arr['Address']           = $getAddressData['billing']['Address'];
		$arr['City']              = $getAddressData['billing']['City'];
		$arr['PhoneNumber']       = $getAddressData['billing']['PhoneNumber'];
		$arr['Zipcode']           = $getAddressData['billing']['Zipcode'];
		$arr['Country']           = $getAddressData['billing']['Country'];
	}
	if ( ! $options['field_firstname'] ) {
		$arr['CustomerFirstName'] = '';
	}
	if ( ! $options['field_lastname'] ) {
		$arr['CustomerLastName'] = '';
	}
	if ( ! $options['field_email'] ) {
		$arr['EmailAddress'] = '';
	}
	if ( ! $options['field_address'] ) {
		$arr['Address'] = '';
	}
	if ( ! $options['field_city'] ) {
		$arr['City'] = '';
	}
	if ( ! $options['field_phonenumber'] ) {
		$arr['PhoneNumber'] = '';
	}
	$company_billing = $order->get_billing_company();
	if ( $options['field_company'] && ! empty( $company_billing ) ) {
		$arr['CustomerLastName'] = $company_billing . ' - ' . $arr['CustomerLastName'];
	}
	if ( ! $options['field_zipcode'] ) {
		$arr['Zipcode'] = '';
	}

	return json_encode( $arr );
}
