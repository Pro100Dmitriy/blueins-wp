<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<div class="small-container">

	<?php do_action( 'woocommerce_before_checkout_form', $checkout ); ?>

	<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

		<?php if ( $checkout->get_checkout_fields() ) : ?>
		<!-- if start -->

			<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

				<div class="woocommerce-checkout__content">
					<div class="woocommerce-checkout__content__inputs">
						<?php do_action( 'woocommerce_checkout_billing' ); ?>
					</div>

					<div class="woocommerce-checkout__content__details">
						<?php do_action( 'woocommerce_checkout_shipping' ); ?>
					</div>
				</div>

			<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

		<!-- if end -->
		<?php endif; ?>


		
		<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
		
			<h3 class="h3-style" id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
			
		<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

			<div id="order_review" class="woocommerce-checkout-review-order">
				<?php do_action( 'woocommerce_checkout_order_review' ); ?>
			</div>

		<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

	</form>

</div>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
