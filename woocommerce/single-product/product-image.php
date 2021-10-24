<?php
/**
 * Single Product Image
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);

if(  $product->is_type( 'variable' ) ){
	$variations = $product->get_available_variations();
	$variations_IMG = array();

	foreach($variations as $variant){
		$id = $variant['attributes']['attribute_czvet'] ?? $variant['attributes']['attribute_pa_czvet'];
		$var = array(
			'id' => $id,
			'src' => $variant['image']['src'],
			'data-src' => $variant['image']['url'],
			'data-large_image' => $variant['image']['full_src'],
			'srcset' => $variant['image']['srcset'],
			'data-thumb' => $variant['image']['gallery_thumbnail_src'],
		);
		array_push( $variations_IMG, $var );
	}

	//print_r($variations);
	//print_r($variations_IMG);

	wp_localize_script( 'blueins-scripts', 'img_variation_src', $variations_IMG );
}
?>

<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
	<figure id="blu-variations-slider" class="woocommerce-product-gallery__wrapper">
		<?php
			if ( $product->get_image_id() ) {
				$html = wc_get_gallery_image_html( $post_thumbnail_id, true );
			} else {
				$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
				$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
				$html .= '</div>';
			}

			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id );

			do_action( 'woocommerce_product_thumbnails' );
		?>
	</figure>
</div>