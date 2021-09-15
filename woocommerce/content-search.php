<?php
/**
 * The template for displaying search product content within loops
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<div data-blu-product-id="<?php echo $product->id; ?>" class="product-cart-search <?php wc_product_class( '', $product ); ?>">
	<div class="product-cart-search__top">
		<?php 
		$date = the_date('', '', '', false);
		$oldDate = date("m.d.y", strtotime( $date ) );
		$newDate = date("m.d.y", strtotime( $date." + 10 day" ) );
		$nowDate = date("m.d.y", time() );
		?>
		<?php if( $nowDate <= $newDate ) : ?>
			<small class="new-icon">Новое</small>
		<?php endif; ?>
		<a href="<?php the_permalink(); ?>">
			<figure class="figure-product">
			<?php
				$attachment_ids = $product->get_gallery_image_ids(); 
			?>
				<img class="product-img figure-product__first" src="<?php echo wp_get_attachment_image_url( $attachment_ids[0], 'full' ); ?>" alt="Картинка товара">
			</figure>
		</a>
	</div>
	<div class="product-cart-search__bottom">
		<div class="product-cart-search__bottom__left">
			<?php 
				/**
				 * Hook: woocommerce_shop_loop_item_title.
				 *
				 * @hooked woocommerce_template_loop_product_title - 10
				 */
				do_action( 'woocommerce_shop_loop_item_title' ); // main title
			?>
			<div class="product-cart-search__bottom__left__links">
				<p class="price regular-fiveteen"><?php woocommerce_template_loop_price(); ?></p>
			</div>
		</div>

	</div>
</div>