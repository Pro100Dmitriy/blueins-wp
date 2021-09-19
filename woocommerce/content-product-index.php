<?php
/**
 * The template for displaying product content within loops
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>


<div data-blu-product-id="<?php echo $product->id; ?>" class="product-cart">
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
        <a href="<?php the_permalink(); ?>">
            <figure class="figure-product">
                <?php 
                    $attachment_ids = $product->get_gallery_image_ids(); 
                ?>
                <img class="product-img figure-product__first" src="<?php echo wp_get_attachment_image_url( $attachment_ids[0], 'full' ); ?>" alt="Картинка товара">
                <img class="product-img figure-product__second" src="<?php echo wp_get_attachment_image_url( $attachment_ids[1], 'full' ); ?>" alt="Картинка товара">
            </figure>
        </a>
        <a data-blu-product-id="<?php echo $product->id; ?>" data-el="blu_fastview" class="fast-view" href="<?php the_permalink(); ?>">Быстрый просмотр</a>
    </div>
    <div class="product-cart__bottom">
        <div class="product-cart__bottom__left">
            <span class="product-title h4-style"><?php the_title(); ?></span>
            <div class="product-cart__bottom__left__links">
                <p class="price regular-fiveteen"><?php woocommerce_template_loop_price(); ?></p>
                <a class="view-product-link regular-fiveteen" href="<?php the_permalink(); ?>">Просмотреть продукт</a>
            </div>
        </div>
        <div data-target="blu_woo_wishlist_public" data-target-id="<?php echo $product->id ?>" class="product-cart__bottom__right"></div>
    </div>
</div>