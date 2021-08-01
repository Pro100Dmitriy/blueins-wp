<?php
/**
 * View Order
 *
 * Shows the details of a particular order on the account page.
 *
 */

defined( 'ABSPATH' ) || exit;

$notes = $order->get_customer_order_notes();
?>


<div class="user-container">

	<div class="blueins-order-details">

		<p class="regular-fiveteen">
		<?php
		printf(
			/* translators: 1: order number 2: order date 3: order status */
			esc_html__( 'Order #%1$s was placed on %2$s and is currently %3$s.', 'woocommerce' ),
			'<i class="order-number">' . $order->get_order_number() . '</i>', 
			'<i class="order-date">' . wc_format_datetime( $order->get_date_created() ) . '</i>',
			'<i class="order-status">' . wc_get_order_status_name( $order->get_status() ) . '</i>'
		);
		?>
		</p>


		<?php if ( $notes ) : ?>

			<h2><?php esc_html_e( 'Order updates', 'woocommerce' ); ?></h2>

			<ol class="woocommerce-OrderUpdates commentlist notes">
				<?php foreach ( $notes as $note ) : ?>
				<li class="woocommerce-OrderUpdate comment note">
					<div class="woocommerce-OrderUpdate-inner comment_container">
						<div class="woocommerce-OrderUpdate-text comment-text">
							<p class="woocommerce-OrderUpdate-meta meta"><?php echo date_i18n( esc_html__( 'l jS \o\f F Y, h:ia', 'woocommerce' ), strtotime( $note->comment_date ) );  ?></p>
							<div class="woocommerce-OrderUpdate-description description">
								<?php echo wpautop( wptexturize( $note->comment_content ) ); ?>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
				</li>
				<?php endforeach; ?>
			</ol>

		<?php endif; ?>

		<?php do_action( 'woocommerce_view_order', $order_id ); ?>
	
	</div>

</div>

