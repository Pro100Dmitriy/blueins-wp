<?php
/**
 * The template for displaying product price filter widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-price-filter.php
 *
 */

defined( 'ABSPATH' ) || exit;

?>
<?php do_action( 'woocommerce_widget_price_filter_start', $args ); ?>

<div class="item__nav">

<form method="get" action="<?php echo esc_url( $form_action ); ?>">
	<div class="el-price-slider">
		<div class="el-price-slider_container"></div>
		<div class="el-price-slider_values" data-step="<?php echo esc_attr( $step ); ?>">
			<div class="el-price-slider_values__inputs">
				<input type="text" id="min_price" name="min_price" value="<?php echo esc_attr( $current_min_price ); ?>" data-min="<?php echo esc_attr( $min_price ); ?>" placeholder="<?php echo esc_attr__( 'Min price', 'woocommerce' ); ?>" />
				<input type="text" id="max_price" name="max_price" value="<?php echo esc_attr( $current_max_price ) + 5; ?>" data-max="<?php echo esc_attr( $max_price ); ?>" placeholder="<?php echo esc_attr__( 'Max price', 'woocommerce' ); ?>" />
				<button type="submit" class="button"><?php echo esc_html__( 'Filter', 'woocommerce' ); ?></button>
				<div class="price_label">
					<?php echo esc_html__( 'Price:', 'woocommerce' ); ?> <span class="from"></span> &mdash; <span class="to"></span>
				</div>

				<?php echo wc_query_string_form_fields( null, array( 'min_price', 'max_price', 'paged' ), '', true ); ?>
				<div class="clear"></div>
			</div>
			<div class="el-slider__values">
				<p>Максимальная: <span id="el-slider-min" class="el-slider__values__price"></span></p>
				<p>Минимальная: <span id="el-slider-max" class="el-slider__values__price"></span></p>
			</div>
		</div>
	</div>
</form>

</div>

<?php do_action( 'woocommerce_widget_price_filter_end', $args ); ?>
