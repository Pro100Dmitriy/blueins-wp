<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="small-container">

	<div class="blueins-woocommerce-order">

		<?php
		if ( $order ) :

			do_action( 'woocommerce_before_thankyou', $order->get_id() );
			?>

			<?php if ( $order->has_status( 'failed' ) ) : ?>

				<p class="woocommerce-notice regular-fiveteen woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

				<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
					<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
					<?php if ( is_user_logged_in() ) : ?>
						<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
					<?php endif; ?>
				</p>

			<?php else : ?>
			<!-- Successful -->

				<p class="woocommerce-notice regular-fiveteen woocommerce-notice--success woocommerce-thankyou-order-received">
					<?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); ?>
				</p>

				<ul class="blueins-woocommerce-order__overview woocommerce-thankyou-order-details">

					<li class="blueins-woocommerce-order__overview__order order">
						<?php esc_html_e( 'Order number:', 'woocommerce' ); ?>
						<strong><?php echo $order->get_order_number(); ?></strong>
					</li>

					<li class="blueins-woocommerce-order__overview__date date">
						<?php esc_html_e( 'Date:', 'woocommerce' ); ?>
						<strong><?php echo wc_format_datetime( $order->get_date_created() ); ?></strong>
					</li>

					<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
						<li class="blueins-woocommerce-order__overview__email email">
							<?php esc_html_e( 'Email:', 'woocommerce' ); ?>
							<strong><?php echo $order->get_billing_email(); ?></strong>
						</li>
					<?php endif; ?>

					<li class="blueins-woocommerce-order__overview__total total">
						<?php esc_html_e( 'Total:', 'woocommerce' ); ?>
						<strong><?php echo $order->get_formatted_order_total(); ?></strong>
					</li>

					<?php //if ( $order->get_payment_method_title() ) : ?>
						<!--li class="woocommerce-order-overview__payment-method method">
							<?php //esc_html_e( 'Payment method:', 'woocommerce' ); ?>
							<strong><?php //echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
						</li-->
					<?php //endif; ?>

				</ul>

			<!-- Successful -->
			<?php endif; ?>

			<?php //do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
			<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

		<?php else : ?>

			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">
				<?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?>
			</p>

		<?php endif; ?>

	</div>

</div>