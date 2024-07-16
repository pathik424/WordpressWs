<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly
if ( ! class_exists( 'Icredit_Admin' ) ) {
	/**
	 * class Icredit_Admin
	 */
	class Icredit_Admin {
		private static $instance = null;
		private
			$wpdb,
			$logger = null,
			$mainClass;

		/**
		 * Icredit_Admin constructor.
		 */
		public function __construct() {
			global $wpdb;

			$this->wpdb      = $wpdb;
			$this->mainClass = WC_Gateway_ICredit::getInstance();
			// hooks
			add_action( 'woocommerce_receipt_icredit_payment', array( $this, 'rivhit_receipt_page' ), 10 );
			add_action( 'woocommerce_admin_order_actions_end', array( $this, 'admin_orders_list_print_invoice' ) );
			add_action( 'woocommerce_order_actions_start', array( $this, 'admin_invoice_print_link' ) );
			add_action( 'add_meta_boxes', array( $this, 'icredit_admin_order_page_metabox' ) );
			//ajax
			add_action( 'wp_ajax_rivhit_admin_charge_token', array( $this, 'rivhit_admin_charge_token_ajax' ) );
			add_action( 'wp_ajax_nopriv_rivhit_admin_charge_token', array( $this, 'rivhit_admin_charge_token_ajax' ) );

			// on status change hook
			add_action( 'woocommerce_order_status_changed', [ $this, 'rivhit_status_change_order' ], 10, 3 );

			if ( $this->logger === null ) {
				$this->logger = new WC_Logger();
			}
		}

		/**
		 * security reasons
		 */
		private function __clone() {
		}

		/**
		 * @return Icredit_Admin|null
		 */
		public static function getInstance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * @param $order_id
		 *
		 * @return void
		 */
		function rivhit_receipt_page( $order_id ) {
			if ( WC()->session->get( 'icredit_iframe_displayed' ) == true ) {
				return;
			}
			WC()->session->set( 'icredit_iframe_displayed', true );
			$order = new WC_Order( $order_id );
			if ( $icredit_payment_url = WC()->session->get( 'icredit_payment_url' ) ) : $style = 'style="border-style: hidden"'; ?>
                <div id="step-payment" class="checkout-step">
                    <div class="checkout-step-heading clearfix">
                        <div class="sprite-stepsIndicator indicatorStep3 step-indicator pull-left"></div>
                        <h3 class="step-title"><?php _e( '', 'woocommerce_icredit' ); ?></h3>
                    </div>
                    <div class="checkout-frame">
                        <iframe id="icredit-iframe" <?php echo $style; ?> width="100%"
                                height="<?php echo $this->mainClass->iframe_height; ?>"
                                src="<?php echo $icredit_payment_url; ?>" scrolling="yes"></iframe>
                    </div><!-- .checkout-frame -->
                </div>
			<?php
			endif;
		}

		/**
		 * @return void
		 */
		function admin_orders_list_print_invoice() {
			global $post;
			$print_url = get_post_meta( $post->ID, 'DocumentURL', true );
			if ( ! $print_url ) {
				return;
			}
			$print_button = '<a id="" target="_blank" data-tip="' . __( 'Print Invoice', 'woocommerce_icredit' ) . '" class="button tips invoice-button-small " href="' . $print_url . '">';
			$print_button .= __( 'Print Invoice', 'woocommerce_icredit' );
			$print_button .= '</a>';
			echo $print_button;
		}

		/**
		 * @return void
		 */
		function admin_invoice_print_link() {
			global $post;
			$print_url = get_post_meta( $post->ID, 'DocumentURL', true );
			if ( ! $print_url ) {
				return;
			}
			$print_button = '<a id="" target="_blank" data-tip="' . __( 'Print Invoice', 'woocommerce_icredit' ) . '" class="button tips invoice-button invoice-button-small" href="' . $print_url . '">';
			$print_button .= __( 'Print Invoice', 'woocommerce_icredit' );
			$print_button .= '</a>';
			echo $print_button;
		}

		/**
		 * @return void
		 */
		public function icredit_admin_order_page_metabox() {
			add_meta_box(
				'icredit_order_payment_details',
				__( 'Icredit order payment details', 'woocommerce_icredit' ),
				array( $this, 'icredit_order_payment_details_callback' ),
				'shop_order',
				'side',
				'high'
			);
		}

		/**
		 * @return void
		 */
		public function icredit_order_payment_details_callback() {
			global $post;
			$keys      = [
				'icredit_ccnum',
				'SaleId',
				'Reference',
				'TransactionAmount',
				'DocumentURL',
				'TransactionCardLabel',
				'icredit_cardname',
				'icredit_status',
				'TransactionToken',
				'TransactionTokenRivhitPayBy',
				'TransactionParamJ',
				'TransactionNumOfPayment',
			];
			$meta_data = $this->get_meta_data_for_keys( $post->ID, $keys );
			if ( empty( $meta_data['SaleId'] ) ) {
				$template = __( 'No Data', 'woocommerce_icredit' );
			} else {
				$test          = get_post_meta( $post->ID, 'charged_token_rivhit', true );
				$order         = new WC_Order( $post->ID );
				$is_paid       = icredit_check_if_order_paid( $order );
				$path          = plugin_dir_url( __FILE__ ) . '../../assets/images/';
				$usedCardLabel = array();
				if ( ! empty( $meta_data['TransactionCardLabel'] ) ) {
					$usedCardLabel = icredit_get_order_card_label( $meta_data['TransactionCardLabel'] );
				} else if ( ! empty( $meta_data['icredit_cardname'] ) ) {
					$usedCardLabel = icredit_get_order_card_label( $meta_data['icredit_cardname'] );
				}
				$title_documents      = __( 'Documents', 'woocommerce_icredit' );
				$title_credit_details = __( 'Credit Card', 'woocommerce_icredit' );
				$title_actions        = __( 'Actions', 'woocommerce_icredit' );
				$title_btn            = __( 'Charge payment', 'woocommerce_icredit' );
				$title_sure           = __( 'Charge J5', 'woocommerce_icredit' );

				$template = '<div id="metaboxRivhit"><div class="metaboxRivhitInner"><figure><img class="icon_rivhit" width="150" height="60" src="' . plugin_dir_url( __FILE__ ) . '../../assets/images/Rivchit_iCredit.png' . '" alt="rivhit icredit" aria-label="logo rivhit icredit" /></figure>';
				$template .= '<div class="rivhitSectionFirst">';
				$template .= '<h3>' . $title_documents . '</h3>';
				if ( ! empty( $meta_data['DocumentURL'] ) ) {
					$template .= '<a id="" target="_blank" data-tip="' . __( 'Print Invoice', 'woocommerce_icredit' ) . '" class="button tips invoice-button-small " href="' . $meta_data['DocumentURL'] . '">';
					$template .= __( 'Print Invoice', 'woocommerce_icredit' );
					$template .= '</a>';
				}
				$template .= '</div>';
				if ( ! empty( $meta_data['icredit_ccnum'] ) && ! empty( $meta_data['icredit_ccnum'] ) ) {
					$template .= '<div class="rivhitSectionSecond">';
					$template .= '<div class="title_credit_details">';
					$template .= '<div><h3>' . $title_credit_details . '</h3></div>';
					$template .= '<div class="Card-number">' . icredit_handle_card_number_clear( $meta_data['icredit_ccnum'] ) . '</div>';
					$template .= '</div>';
					if ( !empty( $usedCardLabel['icon'] ) ) {
						$template .= '<div><picture><img class="icon_label" width="52" height="32" src="' . $path . $usedCardLabel['icon'] . '" alt="' . $usedCardLabel['label'] . '" aria-label="' . $usedCardLabel['label'] . '" title="' . $usedCardLabel['label'] . '"/></picture></div>';
					}
					$template .= '<div class="wrapper_icredit_card_template"><div class="wrapper_icredit_card_template_inner">';
					if ( ! empty( $meta_data['TransactionNumOfPayment'] ) ) {
						if ( (int) $meta_data['TransactionNumOfPayment'] > 0 ) {
							$counts   = (int) $meta_data['TransactionNumOfPayment'];
							$template .= '<div class="NUM-payments">' . __( 'Payments', 'woocommerce_icredit' ) . '<br/>' . $counts . '</div>';
						}
					}
					$template .= '</div></div></div>';
				}
				if ( ! empty( $meta_data['TransactionParamJ'] ) ) {
					if ( $meta_data['TransactionParamJ'] == '5' ) {
						$template .= '<div class="rivghitSectionThird">';
						if ( empty( $test ) ) {
							$template .= '<h3>' . $title_actions . '</h3>';
							$template .= '<button id="chargeTokenRivhit" class="button btnRivhit" role="button" data-order="' . $post->ID . '" data-id="' . $post->ID . '" title="' . $title_btn . '" aria-label="' . $title_btn . '" data-message="' . $title_btn . '">' . $title_sure . '</button>';
						} else {
							$template .= '<div><h4><span>' . __( 'Order Paid', 'woocommerce_icredit' ) . '</span></h4></div>';
						}
						$template .= '</div>';
					}
				}

				$template .= '</div></div>';
			}

			echo $template;
		}

		/**
		 * @param $order_id
		 * @param $keys
		 *
		 * @return array
		 */
		private function get_meta_data_for_keys( $order_id, $keys = array() ) {
			$arr = [];
			global $wpdb;
			$sql = "SELECT m.meta_key, m.meta_value FROM `$wpdb->posts` AS p RIGHT JOIN `$wpdb->postmeta` AS m ON (p.ID = m.post_id) WHERE p.post_type = 'shop_order' AND p.ID = $order_id AND ";
			if ( ! empty( $keys ) ) {
				$sql .= " (SELECT ";
				foreach ( $keys as $l => $k ) {
					$or = ' OR ';
					if ( $l == 0 ) {
						$or = '';
					}
					$sql .= $or . " meta_key = '$k' ";;
				}
				$sql .= " )";
			}
			$rows = $wpdb->get_results( $sql );
			if ( ! empty( $rows ) ) {
				foreach ( $rows as $row ) {
					$arr[ $row->meta_key ] = $row->meta_value;
				}
			}

			return $arr;
		}

		/**
		 * @return void
		 * charge orderby token - by administrator only
		 */
		public function rivhit_admin_charge_token_ajax() {
			if ( current_user_can( 'activate_plugins' ) ) {
				$nonce    = htmlentities( trim( $_POST['nonce'] ) );
				$order_id = htmlentities( trim( $_POST['order_id'] ) );
				if ( ! empty( $nonce ) && wp_verify_nonce( $nonce, 'rivhit_nonce_action' ) ) {
					if ( ! empty( $order_id ) && is_numeric( (int) $order_id ) ) {
						$this->charge_token( $order_id );
						echo json_encode( array( 'status' => 'ok', 'message' => 'charged' ) );
						wp_die();
					}
				}
			}
			echo json_encode( array( 'status' => 'error', 'message' => 'validation' ) );
			wp_die();
		}

		/**
		 * @param $order_id
		 * @param $bool
		 *
		 * @return false|void
		 */
		private function charge_token( $order_id, $bool = false ) {
			$test          = get_post_meta( $order_id, 'charged_token_rivhit', true );
			if ( !empty( $test ) ) {
				return true;
			}
			$order         = new WC_Order( $order_id );
			$token         = get_post_meta( $order_id, 'TransactionToken', true );
			$saleType = 2;
			$mdType = get_post_meta( $order_id, 'TransactionParamJ', true );
			if ( $mdType == '5' ) {
				$saleType = 1;
			}
			$response      = $this->mainClass->call_to_icredit_charge_j5( $order, $token, $saleType );
			$json_response = json_decode( $response['body'] );
			if ( $json_response->Status === 0 ) {
				wc_reduce_stock_levels( $order_id );
				update_post_meta( $order_id, 'charged_token_rivhit', 'true' );
			} else {
				$message = $json_response->ClientMessage;
				$order->add_order_note( __( $message, 'woocommerce_icredit' ) );
//				if ( isset( $_GET['post'] ) ) {
//					wc_add_notice( sprintf( __( 'Error: credit card declined: %s', 'woocommerce_icredit' ), $message ), 'error' );
//				}
				echo json_encode( array('status' => 'error') );
				$this->save_logs( 'icredit_process_payment', 'SaleChargeToken Charge J5 response error: ' . print_r( $json_response, true ) );
				wp_die();
			}
			$this->save_logs( 'icredit_process_payment', 'SaleChargeToken Charge j5 token response: ' . print_r( $json_response, true ) );
			do_action( 'rivhit_process_payment_completed', $order_id );
			// add document to order
            if ( isset( $json_response->data ) ) {
	            update_post_meta( $order_id, 'DocumentURL', $json_response->data->DocumentURL );
            }
			if ( isset( $json_response->DocumentURL ) ) {
				update_post_meta( $order_id, 'DocumentURL', $json_response->DocumentURL );
			}
            if ( isset( $json_response->DocumentLink ) ) {
                update_post_meta( $order_id, 'DocumentURL', $json_response->DocumentLink );
            }
			//update order status
			$order->update_status( "wc-completed", 'Completed', TRUE );
			if ( $bool != true ) {
				echo json_encode( array('status' => 'ok') );
				wp_die();
			}
		}

		/**
		 * @param $key
		 * @param $string
		 *
		 * @return void
		 */
		private function save_logs( $key = '', $string = '' ) {
			if( ! empty( $key ) && ! empty( $string ) ) {
				$this->logger->add( $key, $string );
			}
		}

		/**
		 * @param $order_id
		 * @param $old_status
		 * @param $new_status
		 *
		 * @return void
		 */
		public function rivhit_status_change_order( $order_id, $old_status, $new_status ) {
			$meta = get_post_meta( $order_id, 'TransactionParamJ', true );
			if ( !empty( $meta ) ) {
				$wcGateClass = WC_Gateway_ICredit::getInstance();
				$options = $wcGateClass::get_global_options();
				$toStatus = explode( '-', $options['ChargeJ5Status'] );
				if ( $options['ChargeJ5'] == '2' && $new_status == $toStatus[1] ) {
					$this->charge_token( $order_id, true );
				}
			}
		}

	}

	$selfIcreditAdmin = new Icredit_Admin();
}
