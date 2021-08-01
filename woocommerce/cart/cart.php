<?php
/**
 * Cart Page
 *
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>


<div class="cart__content__flex">

	<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

		<?php do_action( 'woocommerce_before_cart_table' ); ?>
		
		<div class="cart__content__information">
			<ul class="cart__products__list">
			<!-- Cart List Item -->

				<?php do_action( 'woocommerce_before_cart_contents' ); ?>

				<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) : ?>

					<?php
					$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>

						<li class="cart__products__list__item woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
							<div class="cart__products__list__item__img">
								<div class="cart__products__img__cover">
									<?php
									$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

									if ( ! $product_permalink ) {
										echo $thumbnail; // PHPCS: XSS ok.
									} else {
										printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
									}
									?>
								</div>
								<div class="cart__products__title">
									<?php
										$hashIndex = strripos( $_product->get_name(), '#' );
										if( $hashIndex ){
											$name = substr( $_product->get_name(), 0, $hashIndex );
										}else{
											$name = $_product->get_name();
										}
										// View Name
										if ( ! $product_permalink ) {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $name, $cart_item, $cart_item_key ) . '&nbsp;' );
										} else {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a class="cart-title" href="%s">%s</a>', esc_url( $product_permalink ), $name ), $cart_item, $cart_item_key ) );
										}

										//do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

										// Meta data.
										$razmer = wc_get_formatted_cart_item_data( $cart_item, true );
										$regexp = "/\s[а-яА-Я]+\s/u";
										$regexp2 = "/[а-яА-Я]+/u";
										preg_match( $regexp, $razmer, $match );
										preg_match( $regexp2, $razmer, $match2 );

										$czvet = $cart_item['variation']['attribute_czvet'];
										$czvet_regexp = "/[а-яА-Я]+/u";
										preg_match( $czvet_regexp, $czvet, $var_czvet );

										//print_r($match);

										// Backorder notification.
										if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="cart-title backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
										}
									?>
									<?php if( !empty($match) ): ?>
										<p class="cart-color"><?php echo $match2[0]; ?>: <span><?php echo trim( $match[0] ); ?></span></p>
									<?php endif; ?>
									<?php if( !empty($var_czvet) ): ?>
										<p class="cart-color">Цвет: <span><?php echo trim( $var_czvet[0] ); ?></span></p>
									<?php endif; ?>
								</div>
							</div>
							<div class="cart__products__list__item__quantity">
								<?php
								// if ( $_product->is_sold_individually() ) {
								// 	$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
								// } else {
								// 	$product_quantity = woocommerce_quantity_input(
								// 		array(
								// 			'input_name'   => "cart[{$cart_item_key}][qty]",
								// 			'input_value'  => $cart_item['quantity'],
								// 			'max_value'    => $_product->get_max_purchase_quantity(),
								// 			'min_value'    => '0',
								// 			'product_name' => $_product->get_name(),
								// 		),
								// 		$_product,
								// 		false
								// 	);
								// }

								// echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
								?>
							</div>
							<div class="cart__products__list__item__price">
								<?php
									echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
										'woocommerce_cart_item_remove_link',
										sprintf(
											'<a href="%s" class="close-button remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"></a>',
											esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
											esc_html__( 'Remove this item', 'woocommerce' ),
											esc_attr( $product_id ),
											esc_attr( $_product->get_sku() )
										),
										$cart_item_key
									);
								?>
								<p class="cart-price">
									<?php
										echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
									?>
								</p>
							</div>
						</li>

					<?php } ?>

				<?php endforeach; ?>

				<?php do_action( 'woocommerce_cart_contents' ); ?>

				<?php do_action( 'woocommerce_after_cart_contents' ); ?>

			<!-- Cart List Item -->
			</ul>

			<div class="cart__content__information__promocode__d-flex">
				<div class="cart__content__information__promocode coupon">
					<?php if ( wc_coupons_enabled() ) { ?>
						
							<p class="el-input">
								<label class="el-input__label" for="coupon_code"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label>
								<input type="text" name="coupon_code" class="el-input__field input-text" id="coupon_code" value=""  />
							</p>
							<button type="submit" class="stroke-button-dark" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
							<?php do_action( 'woocommerce_cart_coupon' ); ?>
						
					<?php } ?>
				</div>
				<!-- <button type="submit" class="stroke-button-dark" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button> -->

				<?php do_action( 'woocommerce_cart_actions' ); ?>

				<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
			</div>

		</div>


		<?php do_action( 'woocommerce_after_cart_table' ); ?>
	</form>

	<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>


	<?php
		/**
		 * Cart collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
		do_action( 'woocommerce_cart_collaterals' );
	?>


	<?php do_action( 'woocommerce_after_cart' ); ?>

</div>






