<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<?php
	if ( $related_products ) : 
?>

	<section class="same-product footer-marg">
		<div class="container">

			<?php
				$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );

				if ( $heading ) :
			?>
				<div class="section-product__title">
					<span class="h2-title h2-style"><?php echo esc_html( $heading ); ?></span>
				</div>
			<?php
				endif; 
			?>

			<div class="same-product__container">
				<ul class="small-products__list">
					<!-- Small Products Item -->
					<?php foreach ( $related_products as $related_product ) : ?>

							<?php
							$post_object = get_post( $related_product->get_id() );

							setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found


							wc_get_template_part( 'content', 'related' );
							?>

					<?php endforeach; ?>
					<!-- Small Products Item -->
				</ul>
			</div>

		</div>
	</section>

<?php
	endif;

	wp_reset_postdata();
?>
	