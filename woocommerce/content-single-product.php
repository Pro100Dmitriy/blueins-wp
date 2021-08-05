<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>

	<?php
		if ( post_password_required() ) {
			echo get_the_password_form(); // WPCS: XSS ok.
			return;
		}
	?>

	<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

		<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		//do_action( 'woocommerce_before_single_product_summary' );
		?>

	</div>

    <section class="information-product">
        <div class="single-product-container">
		

            <div class="d-flex">
                <div class="information-product__sliders">
                    <?php
                    /**
                     * Hook: woocommerce_before_single_product_summary.
                     *
                     * @hooked woocommerce_show_product_sale_flash - 10
                     * @hooked woocommerce_show_product_images - 20
                     */
                    do_action( 'woocommerce_before_single_product_summary' );
                    ?>
                </div>
                <div class="information-product__details">
					<?php
					/**
					 * Hook: woocommerce_before_single_product.
					 *
					 * @hooked woocommerce_output_all_notices - 10
					 */
					do_action( 'woocommerce_before_single_product' );
					?>
                    <div class="details__breadcrumbs">
                        <?php woocommerce_breadcrumb(); ?>
                    </div>
                    <?php
                    /**
                     * Hook: woocommerce_single_product_summary.
                     *
                     * @hooked woocommerce_template_single_title - 5
                     * @hooked woocommerce_template_single_rating - 10
                     * @hooked woocommerce_template_single_price - 10
                     * @hooked woocommerce_template_single_excerpt - 20
                     * @hooked woocommerce_template_single_add_to_cart - 30
                     * @hooked woocommerce_template_single_meta - 40
                     * @hooked woocommerce_template_single_sharing - 50
                     * @hooked WC_Structured_Data::generate_product_data() - 60
                     */
                    do_action( 'woocommerce_single_product_summary' );
                    ?>
                </div>
            </div>

        </div>	
	</section>
	
	<section class="description-product">
		<div class="container">
			<div class="section-product__title">
				<?php
					$heading = apply_filters( 'woocommerce_product_description_heading', __( 'Description', 'woocommerce' ) );
				?>
				<?php if ( $heading ) : ?>
					<span class="h2-title h2-style"><?php echo esc_html( $heading ); ?></span>
				<?php endif; ?>
			</div>
			<div class="description-product__text">
				<?php the_content(); ?>
			</div>
		</div>
	</section>
	
	<?php if($product->get_short_description()) : ?>
	<section class="description-product">
		<div class="container">
			<div class="section-product__title">
				<?php
					$heading = apply_filters( 'woocommerce_product_description_heading', __( 'Дополнительно', 'woocommerce' ) );
				?>
				<?php if ( $heading ) : ?>
					<span class="h2-title h2-style"><?php echo esc_html( $heading ); ?></span>
				<?php endif; ?>
			</div>
			<div class="description-product__text">
				<?php echo apply_filters( 'woocommerce_short_description', $product->get_short_description() ) ?>
			</div>
		</div>
	</section>
	<?php endif; ?>



	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );  //Related & Comments
	?>

<?php 
do_action( 'woocommerce_after_single_product' ); 
?>
