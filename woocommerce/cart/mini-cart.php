<?php
/**
 * Mini-cart
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_mini_cart' ); ?>


<?php do_action( 'woocommerce_before_mini_cart' ); ?>

	<?php if ( ! WC()->cart->is_empty() ) : ?>

		<div class="cart__center">
			<ul class="cart__center__list <?php echo esc_attr( $args['list_class'] ); ?>">
			<!-- List -->

			<?php
			do_action( 'woocommerce_before_mini_cart_contents' );

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
	
				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) :
					$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
					$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					
			?>

				<li class="cart-list-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
					<div class="item__img-cover">
						<?php if ( empty( $product_permalink ) ) : ?>
							<?php echo $thumbnail . $product_name;?>
						<?php else : ?>
							<a href="<?php echo esc_url( $product_permalink ); ?>">
								<?php echo $thumbnail . $product_name;?>
							</a>
						<?php endif; ?>
					</div>
					<div class="item__content">
						<span class="item__content__title">
							<?php 
								$hashIndex = strripos( $product_name, '#' );
								if( $hashIndex ){
									$name = substr($product_name, 0, $hashIndex);
								}else{
									$name = $product_name;
								}
							?>
							<a class="medium-fiveteen" href="<?php echo $product_permalink ?>"><?php echo $name ?></a>
							<a  href="#" 
								class="close-button blueins_remove_cart_button"
								aria-label="Remove this item" 
								data-product_id="<?php echo $product_id; ?>" 
								data-cart_item_key="<?php echo $cart_item_key; ?>" 
								data-product_sku="<?php echo $_product->get_sku(); ?>">&times;
							</a>
							<?php
							
								// echo apply_filters(
								// 	'woocommerce_cart_item_remove_link',
								// 	sprintf(
								// 		'<a href="%s" class="close-button remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
								// 		esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
								// 		esc_attr__( 'Remove this item', 'woocommerce' ),
								// 		esc_attr( $product_id ),
								// 		esc_attr( $cart_item_key ),
								// 		esc_attr( $_product->get_sku() )
								// 	),
								// 	$cart_item_key
								// );
							?>
						</span>
						<div class="product-quantity-price">
							<div class="item-quantity">
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
							<div class="item-price">
								<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
								<!--span class="price lights-fiveteen">BYN 60.00</span-->
							</div>
						</div>
					</div>
				</li>
			
			<?php 
				endif;
			endforeach;

			do_action( 'woocommerce_mini_cart_contents' );
			?>

			<!-- List -->
			</ul>
		</div>
		<div class="cart__bottom">

			<div class="summ-for-price woocommerce-mini-cart__total total">
				<?php
				/**
				 * Hook: woocommerce_widget_shopping_cart_total.
				 *
				 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
				 */
				//do_action( 'woocommerce_widget_shopping_cart_total' );
				
				?>
				
                <span class="summ-for-price__text medium-fiveteen">К оплате:</span>
                <span class="summ-for-price__price lights-fiveteen"><?php wc_cart_totals_subtotal_html(); ?></span>
			</div>

			<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

			<div class="woocommerce-mini-cart__buttons buttons">
				<?php 
				do_action( 'woocommerce_widget_shopping_cart_buttons' ); 
				?>
			</div>

			<?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>

		</div>

	<?php else : ?>

		<div class="woocommerce-mini-cart__empty-message__cover">
			<p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></p>
		</div>

	<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>

