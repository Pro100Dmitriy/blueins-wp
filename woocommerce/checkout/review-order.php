<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 */

defined( 'ABSPATH' ) || exit;
?>


<div class="blueins_shop_table woocommerce-checkout-review-order-table">
	<div class="blueins_shop_table__cart">
		<ul class="blueins_shop_table__cart__list">
			<?php
				do_action( 'woocommerce_review_order_before_cart_contents' );

				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					?>
					<li class="like__products__list__item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
						<div class="like__products__list__item__img">
							<div class="like__products__img__cover">
								<?php
								$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

								if ( ! $product_permalink ) {
									echo $thumbnail; // PHPCS: XSS ok.
								} else {
									printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
								}
								?>
							</div>
							<div class="like__products__title">
								<?php
									$hashIndex = strripos( $_product->get_name(), '#' );
									if( $hashIndex ){
										$name = substr( $_product->get_name(), 0, $hashIndex );
									}else{
										$name = $_product->get_name();
									}
								?>
								<p class="like-title"><?php echo apply_filters( 'woocommerce_cart_item_name', $name, $cart_item, $cart_item_key ) . '&nbsp;'; ?></p>
								<p class="like-details">Количество: <?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', sprintf( '&nbsp;%s', $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?></p>
								<?php
									$razmer = wc_get_formatted_cart_item_data( $cart_item, true );
									$regexp = "/\s[а-яА-Я]+\s/u";
									$regexp2 = "/[а-яА-Я]+/u";
									preg_match( $regexp, $razmer, $match );
									preg_match( $regexp2, $razmer, $match2 );
								?>
								<?php if( !empty($match) ): ?>
									<p class="like-variation"><?php echo $match2[0]; ?>: <span><?php echo trim( $match[0] ); ?></span></p>
								<?php endif; ?>
							</div>
						</div>
						<div class="like__products__list__item__price">
							<p class="like-price"><?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?></p>
						</div>
					</li>
					<?php
					}
				}

				do_action( 'woocommerce_review_order_after_cart_contents' );
			?>
		</ul>
	</div>
	<div class="blueins_shop_table__checkout">


		<table class="cart__table">
			<tr class="cart__menu__top cart-subtotal">
				<th><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
				<td><?php wc_cart_totals_subtotal_html(); ?></td>
			</tr>
			<tr class="cart__menu__middle">
				<th>Доставка</th>
				<td colspan="2">
					<ul class="cart__menu__middle__list">

						<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
							<li class="cart__menu__middle__list__item cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
								<p><?php wc_cart_totals_coupon_label( $coupon ); ?></p>
								<span><?php wc_cart_totals_coupon_html( $coupon ); ?></span>
							</li>
						<?php endforeach; ?>

						<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
							<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
								<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited ?>
									<li class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
										<p><?php echo esc_html( $tax->label ); ?></p>
										<span><?php echo wp_kses_post( $tax->formatted_amount ); ?></span>
									</li>
								<?php endforeach; ?>
							<?php else : ?>
								<li class="tax-total">
									<p><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></p>
									<span><?php wc_cart_totals_taxes_total_html(); ?></span>
								</li>
							<?php endif; ?>
						<?php endif; ?>

						<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
							<li class="cart__menu__middle__list__item fee">
								<p><?php echo esc_html( $fee->name ); ?></p>
								<span><?php wc_cart_totals_fee_html( $fee ); ?></span>
							</li>
						<?php endforeach; ?>
					
					</ul>
				</td>
			</tr>
			<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>
			<tr class="cart__menu__bottom order-total">
				<th><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
				<td><?php wc_cart_totals_order_total_html(); ?></td>
			</tr>
			<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
		</table>

		
	</div>
</div>


