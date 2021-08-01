<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( $max_value && $min_value === $max_value ) {
	?>
	<div class="quantity hidden">
		<input type="hidden" id="<?php echo esc_attr( $input_id ); ?>" class="qty" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $min_value ); ?>" />
	</div>
	<?php
} else {
	/* translators: %s: Quantity. */
	$label = ! empty( $args['product_name'] ) ? sprintf( esc_html__( '%s quantity', 'woocommerce' ), wp_strip_all_tags( $args['product_name'] ) ) : esc_html__( 'Quantity', 'woocommerce' );
	?>
	<div class="details__quantity-but__quantity">
		<div class="el-quantity quantity">
			<?php do_action( 'woocommerce_before_quantity_input_field' ); ?>

				<button class="el-quantity__button el-quantity__minus">
					<svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"><rect width="33" height="33" fill="none"/><g transform="translate(11 16)"><g transform="translate(0 0)"><rect width="11.432" height="1.429" rx="0.715" fill="#fff"/></g></g></svg>
				</button>
				<label class="screen-reader-text" for="<?php echo esc_attr( $input_id ); ?>"><?php echo esc_attr( $label ); ?></label>
				<input
					type="number"
					id="quantity"
					class="el-quantity__input-number <?php echo esc_attr( join( ' ', (array) $classes ) ); ?>"
					step="<?php echo esc_attr( $step ); ?>"
					min="<?php echo esc_attr( $min_value ); ?>"
					max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>"
					name="<?php echo esc_attr( $input_name ); ?>"
					value="<?php echo esc_attr( $input_value ); ?>"
					title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ); ?>"
					size="4"
					placeholder="<?php echo esc_attr( $placeholder ); ?>"
					inputmode="<?php echo esc_attr( $inputmode ); ?>" />
				<button class="el-quantity__button el-quantity__plus">
					<svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"><rect width="33" height="33" fill="none"/><g transform="translate(11 11)"><g transform="translate(0)"><rect width="11.43" height="1.43" rx="0.715" transform="translate(0 5)" fill="#fff"/><rect width="11.43" height="1.43" rx="0.715" transform="translate(6.43) rotate(90)" fill="#fff"/></g></g></svg>
				</button>

			<?php do_action( 'woocommerce_after_quantity_input_field' ); ?>
		</div>
	</div>
	<?php
}
