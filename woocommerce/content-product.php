<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	//do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	//do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	//do_action( 'woocommerce_after_shop_loop_item_title' ); //PRICE

?>



<?php //print_r( $product ); ?>
<?php if( $product->is_type('variable') ) : ?>
<?php 
	$woo_product_variant_color = $product->get_available_variations();
	$variation_id = $woo_product_variant_color[ count($woo_product_variant_color)-1 ]['variation_id'];
	$attributes = $product->attributes;
	$default_razmer = $attributes['razmer']['options'][0];
?>

<div data-default-variation_id="<?php echo $variation_id; ?>" data-default-razmer="<?php echo $default_razmer; ?>" data-blu-product-id="<?php echo $product->id; ?>" class="product-cart <?php wc_product_class( '', $product ); ?>">

<?php else : ?>

<div data-blu-product-id="<?php echo $product->id; ?>" class="product-cart <?php wc_product_class( '', $product ); ?>">

<?php endif; ?>
	<div class="product-cart__top">
		<?php 
			$date = the_date('', '', '', false);
			$oldDate = date("m.d.y", strtotime( $date ) );
			$newDate = date("m.d.y", strtotime( $date." + 10 day" ) );
			$nowDate = date("m.d.y", time() );
		?>
		<?php if( $nowDate <= $newDate ) : ?>
			<small class="new-icon">Новое</small>
		<?php endif; ?>
		<div class="product-cart__list-icon">
			<?php do_shortcode('[blu_woo_wishlist_public class="like-icon" id="' . $product->id .'"]'); ?>
			<a href="<?php echo $product->add_to_cart_url(); ?>" data-product-id="<?php echo $product->id ?>" class="button blueins_add_to_cart">  <!--product_type_simple add_to_cart_button ajax_add_to_cart-->
				<button class="cart-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"><g transform="translate(9.533 7.333)"><g transform="translate(5.045)"><path d="M80.944,2.05a2.39,2.39,0,0,0-4.3-1.068.281.281,0,1,0,.454.332,1.828,1.828,0,0,1,3.286.816.281.281,0,0,0,.278.242l.04,0A.281.281,0,0,0,80.944,2.05Z" transform="translate(-76.593)" fill="#fff"/></g><g transform="translate(0.562 3.655)"><path d="M35.08,45.914l-.844-1.406A.281.281,0,0,0,34,44.372h-.808a.281.281,0,0,0,0,.562h.649l.506.844H22.963l.506-.844h.3a.281.281,0,1,0,0-.562H23.31a.281.281,0,0,0-.241.137l-.844,1.406a.281.281,0,0,0,.241.426H34.839a.281.281,0,0,0,.241-.426Z" transform="translate(-22.185 -44.372)" fill="#fff"/></g><g transform="translate(7.413 1.576)"><path d="M109.986,20.156a.281.281,0,0,0-.175-.126l-3.833-.9a.281.281,0,0,0-.338.21l-.289,1.236a.281.281,0,0,0,.548.128l.225-.962,3.286.769-.516,2.207a.281.281,0,0,0,.21.338.285.285,0,0,0,.064.007.281.281,0,0,0,.273-.217l.58-2.481A.28.28,0,0,0,109.986,20.156Z" transform="translate(-105.343 -19.126)" fill="#fff"/></g><g transform="translate(1.659 0.855)"><g transform="translate(0)"><path d="M41.014,12.789l-.256-2.167a.281.281,0,0,0-.312-.246l-4.7.556a.281.281,0,0,0-.246.312l.427,3.614a.281.281,0,0,0,.279.248l.033,0a.281.281,0,0,0,.246-.312l-.394-3.335,4.145-.49.223,1.888a.281.281,0,0,0,.559-.066Z" transform="translate(-35.494 -10.374)" fill="#fff"/></g></g><g transform="translate(3.76 2.7)"><path d="M66.64,35.306l-.558-2.321a.281.281,0,0,0-.339-.208l-4.53,1.089a.281.281,0,0,0-.208.339l.279,1.16a.281.281,0,1,0,.547-.131l-.213-.887L65.6,33.39l.492,2.047a.281.281,0,0,0,.547-.132Z" transform="translate(-60.997 -32.769)" fill="#fff"/></g><g transform="translate(0 5.062)"><path d="M28.856,61.708a.281.281,0,0,0-.281-.267H16.2a.281.281,0,0,0-.281.267l-.562,10.966a.281.281,0,0,0,.281.3h13.5a.281.281,0,0,0,.281-.3Zm-12.92,10.7L16.469,62H28.307l.534,10.4Z" transform="translate(-15.359 -61.441)" fill="#fff"/></g><g transform="translate(8.295 6.186)"><path d="M116.9,75.093a.844.844,0,1,0,.844.844A.844.844,0,0,0,116.9,75.093Zm0,1.125a.281.281,0,1,1,.281-.281A.281.281,0,0,1,116.9,76.218Z" transform="translate(-116.052 -75.093)" fill="#fff"/></g><g transform="translate(4.077 6.186)"><path d="M65.7,75.093a.844.844,0,1,0,.844.844A.844.844,0,0,0,65.7,75.093Zm0,1.125a.281.281,0,1,1,.281-.281A.281.281,0,0,1,65.7,76.218Z" transform="translate(-64.852 -75.093)" fill="#fff"/></g><g transform="translate(4.64 7.03)"><path d="M76.178,85.333h-.022a.281.281,0,0,0-.281.281.278.278,0,0,0,.022.108v1.438a1.828,1.828,0,0,1-3.656,0V85.614a.281.281,0,1,0-.562,0v1.547a2.39,2.39,0,0,0,4.78,0V85.614A.281.281,0,0,0,76.178,85.333Z" transform="translate(-71.679 -85.333)" fill="#fff"/></g></g><rect width="33" height="33" fill="none"/></svg>
				</button>
			</a>
		</div>
		<a href="<?php the_permalink(); ?>">
			<figure class="figure-product">
				<?php
					$attachment_ids = $product->get_gallery_image_ids(); 
				?>
				<img class="product-img figure-product__first" src="<?php echo wp_get_attachment_image_url( $attachment_ids[0], 'full' ); ?>" alt="Картинка товара">
				<img class="product-img figure-product__second" src="<?php echo wp_get_attachment_image_url( $attachment_ids[1], 'full' ); ?>" alt="Картинка товара">
			</figure>
		</a>
		<a data-blu-product-id="<?php echo $product->id; ?>" data-el="blu_fastview" class="fast-view" href="<?php //the_permalink(); ?>">Быстрый просмотр</a>
	</div>
	<div class="product-cart__bottom">
		<div class="product-cart__bottom__left">
			<?php 
				/**
				 * Hook: woocommerce_shop_loop_item_title.
				 *
				 * @hooked woocommerce_template_loop_product_title - 10
				 */
				do_action( 'woocommerce_shop_loop_item_title' ); // main title
			?>
			<div class="product-cart__bottom__left__links">
				<p class="price regular-fiveteen"><?php woocommerce_template_loop_price(); ?></p>
				<a class="view-product-link regular-fiveteen" href="<?php the_permalink(); ?>">Просмотреть продукт</a>
			</div>
			<?php
			if( $product->is_type('variable') ){
				$woo_product_variant_color = $product->get_available_variations();
			?>
				<ul class="product-color">
					<?php
						$counter = 0;

						foreach( $woo_product_variant_color as $product_variant ): 
							if( isset($product_variant['attributes']['attribute_czvet']) || isset($product_variant['attributes']['attribute_pa_czvet']) ):
					?>

						<?php
							$prod = isset($product_variant['attributes']['attribute_czvet']) ? $product_variant['attributes']['attribute_czvet'] : $product_variant['attributes']['attribute_pa_czvet'];
							$color = isset($product_variant['attributes']['attribute_czvet']) ? substr($prod, strpos($prod, '#')+1) : substr($prod, strpos($prod, '-')+1);
						?>
						<li class="product-color__item">
							<span data-color-name="<?php echo $prod; ?>" data-blu-variation_id="<?php echo $product_variant['variation_id']; ?>" data-blu-color-id="<?php echo $product->id; ?>" data-img="<?php echo $product_variant['image']['url']; ?>" style="background: #<?php echo $color; ?>" class="color-select-circle <?php if($counter === 0){ echo "color-select"; } ?>"></span>
						</li>

					<?php $counter++; ?>
					<?php endif; endforeach; ?>
				</ul>

			<?php
			}
			?>
			<div class="additing-block-information">
				<div class="block-description regular-fiveteen">
					<?php the_content(); ?>
				</div>
				<?php
					/**
					 * Hook: woocommerce_after_shop_loop_item.
					 *
					 * @hooked woocommerce_template_loop_product_link_close - 5
					 * @hooked woocommerce_template_loop_add_to_cart - 10
					 */
					do_action( 'woocommerce_after_shop_loop_item' ); // add to cart
				?>
			</div>
		</div>
		<div class="product-cart__bottom__right">
			<img class="add-like" src="<?php echo bloginfo('template_url'); ?>/assets/img/Icon/Dark/Like.svg" alt="Like">
		</div>

	</div>
</div>