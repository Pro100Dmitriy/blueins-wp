<?php
/**
 * The template for displaying product search form
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!--form role="search" method="get" class="woocommerce-product-search" action="<?php //echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="woocommerce-product-search-field-<?php //echo isset( $index ) ? absint( $index ) : 0; ?>"><?php //esc_html_e( 'Search for:', 'woocommerce' ); ?></label>
	<input type="search" id="woocommerce-product-search-field-<?php //echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field" placeholder="<?php //echo esc_attr__( 'Search products&hellip;', 'woocommerce' ); ?>" value="<?php //echo get_search_query(); ?>" name="s" />
	<button type="submit" value="<?php //echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>"><?php //echo esc_html_x( 'Search', 'submit button', 'woocommerce' ); ?></button>
	<input type="hidden" name="post_type" value="product" />
</form-->

<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="search-button-group">
		<label class="screen-reader-text" for="s"><?php echo esc_attr__( 'Введите ключевое слово или номер продукта', 'woocommerce' ); ?></label>
		<span class="search-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 45 45"><path d="M19.589,18.322l-3.008-2.965a9.386,9.386,0,1,0-1.224,1.224l3.009,2.965a.866.866,0,1,0,1.224-1.224ZM1.732,9.373a7.641,7.641,0,1,1,7.641,7.641A7.65,7.65,0,0,1,1.732,9.373Z" transform="translate(13 12)" fill="#000"/><rect width="45" height="45" fill="none"/></svg>
		</span>
		<input class="search-input" type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php echo esc_attr__( 'Поиск товара...', 'woocommerce' ); ?>" />
		<input class="search-button" type="submit" id="searchsubmit" value="<?php echo esc_attr__( 'Поиск', 'woocommerce' ); ?>" />
		<input type="hidden" name="post_type" value="product" />
	</div>
</form>

<div class="search-result">
	<div class="search-result__container">
		
	</div>
</div>