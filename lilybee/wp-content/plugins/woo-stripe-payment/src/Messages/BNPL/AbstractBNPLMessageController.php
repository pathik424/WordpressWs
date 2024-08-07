<?php

namespace PaymentPlugins\Stripe\Messages\BNPL;

use PaymentPlugins\Stripe\Assets\AssetDataApi;

abstract class AbstractBNPLMessageController {

	protected $gateway_ids = [];

	protected $supported_gateways;

	protected $asset_data;

	protected $payment_page;

	public function __construct( $gateway_ids = array() ) {
		$this->gateway_ids = $gateway_ids;
		$this->asset_data  = new AssetDataApi();
		$this->initialize();
	}

	abstract protected function initialize();

	protected function get_payment_page() {
		return $this->payment_page;
	}

	protected function get_supported_gateways() {
		if ( ! $this->supported_gateways ) {
			$payment_gateways = WC()->payment_gateways()->payment_gateways();
			/**
			 * @var \WC_Payment_Gateway_Stripe $universal_payment_method
			 */
			$universal_payment_method = $payment_gateways['stripe_upm'] ?? null;
			$ordering                 = (array) get_option( 'woocommerce_gateway_order' );
			$sort                     = 999;
			$this->supported_gateways = array_reduce( $this->gateway_ids, function ( $gateways, $id ) use ( $payment_gateways, $ordering, $universal_payment_method, &$sort ) {
				$gateway = isset( $payment_gateways[ $id ] ) ? $payment_gateways[ $id ] : null;
				if ( $gateway && $gateway instanceof \WC_Payment_Gateway_Stripe_Local_Payment ) {
					if ( wc_string_to_bool( $gateway->enabled )
					     || ( $universal_payment_method && wc_string_to_bool( $universal_payment_method->enabled ) && $universal_payment_method->is_enabled_payment_method( $gateway->id ) )
					) {
						$payment_sections = $gateway->get_option( 'payment_sections', [] );
						$payment_sections = ! is_array( $payment_sections ) ? [] : $payment_sections;
						if ( \in_array( $this->get_payment_page(), $payment_sections ) ) {
							if ( isset( $ordering[ $id ] ) && \is_numeric( $ordering[ $id ] ) ) {
								$gateways[ $ordering[ $id ] ] = $gateway;
							} else {
								$gateways[ $sort ] = $gateway;
								$sort ++;
							}
						}
					}
				}

				return $gateways;
			}, [] );

			ksort( $this->supported_gateways );
		}

		return $this->supported_gateways;
	}

}