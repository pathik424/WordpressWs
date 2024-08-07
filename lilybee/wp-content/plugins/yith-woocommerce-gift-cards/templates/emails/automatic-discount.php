<?php
/**
 * Show a section for the automatic discount link and description
 *
 * @author YITH <plugins@yithemes.com>
 * @package yith-woocommerce-gift-cards\templates\emails
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$email_button_label_get_option = get_option( 'ywgc_email_button_label', esc_html__( 'Apply your gift card code', 'yith-woocommerce-gift-cards' ) );

?>
<div class="ywgc-add-cart-discount">
	<div class="ywgc-discount-link-section">
		<a class="ywgc-discount-link"
		href="<?php echo esc_url( $apply_discount_url ); ?>"><?php echo ( empty( $email_button_label_get_option ) ? esc_html__( 'Apply your gift card code', 'yith-woocommerce-gift-cards' ) : wp_kses( $email_button_label_get_option, 'post' ) ); ?></a>
	</div>
</div>
