<?php
/**
 * The template for displaying product related content within loops
 *
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<li class="small-products__list__item">
    <div class="product-cart small-product-cart" data-blu-product-id="<?php echo $product->id; ?>" class="product-cart <?php wc_product_class( '', $product ); ?>">
        <div class="product-cart__top">
            <small class="new-icon">Новое</small>
            <figure class="figure-product">
			<?php 
				$attachment_ids = $product->get_gallery_image_ids(); 
			?>
				<img class="product-img figure-product__first" src="<?php echo wp_get_attachment_image_url( $attachment_ids[0], 'full' ); ?>" alt="Картинка товара">
				<img class="product-img figure-product__second" src="<?php echo wp_get_attachment_image_url( $attachment_ids[1], 'full' ); ?>" alt="Картинка товара">
			</figure>
            <a class="fast-view" href="<?php the_permalink(); ?>">Быстрый просмотр</a>
        </div>
        <div class="product-cart__bottom">
            <div class="product-cart__bottom__left">
                <?php do_action( 'woocommerce_shop_loop_item_title' ); ?>
                <div class="product-cart__bottom__left__links">
                    <p class="price regular-fiveteen"><?php woocommerce_template_loop_price(); ?></p>
                    <a class="view-product-link regular-fiveteen" href="<?php the_permalink(); ?>">Просмотреть продукт</a>
                </div>
            </div>
            <div data-target="blu_woo_wishlist_public" data-target-id="<?php echo $product->id ?>" class="product-cart__bottom__right"></div>
        </div>
    </div>
</li>