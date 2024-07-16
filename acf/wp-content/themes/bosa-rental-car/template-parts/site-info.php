<?php
/**
 * Template part for displaying site info
 *
 * @package Bosa Rental Car 1.0.0
 */

?>

<div class="site-info">
	<?php echo wp_kses_post( html_entity_decode( esc_html__( 'Copyright &copy; ' , 'bosa-rental-car' ) ) );
		echo esc_html( date( 'Y' ) );
		printf( esc_html__( ' Bosa Rental Car. Powered by', 'bosa-rental-car' ) );
	?>
	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bosa-rental-car' ) ); ?>" target="_blank">
		<?php
			printf( esc_html__( 'WordPress', 'bosa-rental-car' ) );
		?>
	</a>
</div><!-- .site-info -->