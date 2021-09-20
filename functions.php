<?php
require_once 'blueins/classes/blueins_walker_nav_menu.php';
require_once 'blueins/classes/blueins_fullscreen_walker_nav_menu.php';
require_once 'blueins/classes/blueins_footer_walker_nav_menu.php';
require_once 'blueins/classes/blueins_footer_qa_walker_nav_menu.php';


/**
 * New Fields.
 */
require_once 'blueins/customizer/customizer-menu.php';



/**
 ************************************  Enqueue scripts and styles. ******************************************
 */

add_action( 'wp_enqueue_scripts', 'blueins_scripts' );


function blueins_scripts() {
	//wp_enqueue_style( 'blueins-style', get_stylesheet_uri() );
	wp_enqueue_style( 'blueins-style', get_template_directory_uri() . '/dist/common.css' );
	wp_enqueue_style( 'blueins-animation', get_template_directory_uri() . '/assets/css/aos.css' );

    wp_enqueue_script( 'blueins-jquery', get_template_directory_uri() . '/assets/js/libs/jquery.min.js', array(), null, true );
    wp_enqueue_script( 'blueins-scripts-animation', get_template_directory_uri() . '/assets/js/libs/aos.js', array(), null, true );
    wp_enqueue_script( 'blueins-scripts', get_template_directory_uri() . '/dist/common.js', array(), null, true );

    //wp_enqueue_script( 'blueins-cart-ajax', get_template_directory_uri() . '/assets/js/frontend/blueins-cart-ajax.js', array(), null, true );
    wp_enqueue_script( 'blueins-cart-ajax', get_template_directory_uri() . '/dist/blueins-cart-ajax.js', array(), null, true );

	global $wp_query;
 
	wp_enqueue_script('jquery');
 
	wp_localize_script( 'blueins-scripts', 'blu_loadmore_param', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
		'posts' => json_encode( $wp_query->query_vars ),
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages,
		'all_query' => $wp_query,
		'posts_per_page' => get_option('woocommerce_catalog_columns') * get_option('woocommerce_catalog_rows'),
		'taxonomy' => get_queried_object()->term_id,
		'theme_url' => get_template_directory_uri(),
	) );

	wp_localize_script( 'blueins-scripts', 'global_params', array(
		'url' => get_template_directory_uri()
	) );
 
 	//wp_enqueue_script( 'blueins-cart-ajax' );
};

/**
 * Enable Menu Bar
 */

add_theme_support('menus');

/**
 ************************************  Filters ******************************************
 */

add_filter('nav_menu_css_class', 'filter_nav_menu_css_class', 10, 3);

function filter_nav_menu_css_class($classes, $item, $args){
    if($args->menu === 'Main'){
        $classes[] = 'main-menu__item';
    }
    return $classes;
}


add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 3);

function filter_nav_menu_link_attributes($atts, $item, $args){
    if($args->menu === 'AQ'){
        $atts['class'] = 'light-thirteen';
    }
    return $atts;
}


/**
 *  Enable Widgets Bar
 */

if ( function_exists('register_sidebar') ){
	register_sidebar(array(
		'name' => 'Sidebar',
		'before_widget' => '<li class="customs__list__item collapsible">',
		'after_widget' => '</li>',
		'before_title' => '<div class="customs__list__item__title collaps-title"><h6 class="groupe-cust-title">',
		'after_title' => '</h6><span></span></div>',
		//'before_sidebar' => '',
		//'after_sidebar'  => '',
		)
	);

	register_sidebar(array(
		'name' => 'Сайдбар с активной категорией',
		'id' => 'blu_taxonomy_sidebar',
		'before_widget' => '<li class="customs__list__item collapsible">',
		'after_widget' => '</li>',
		'before_title' => '<div class="customs__list__item__title collaps-title"><h6 class="groupe-cust-title">',
		'after_title' => '</h6><span></span></div>',
		//'before_sidebar' => '',
		//'after_sidebar'  => '',
		)
	);

	register_sidebar(array(
		'name' => 'Поиск',
		'id' => 'blu_search',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<div class="search__title"><h6 class="groupe-cust-title">',
		'after_title' => '</h6></div>',
		//'before_sidebar' => '',
		//'after_sidebar'  => '',
		)
	);
}

/**
*   Widgets Init
*/

require_once 'blueins/widgets/widgets.php';

/**
*   wooCommerce php file
*/

require_once 'blueins/woocommerce.php';



/**
 ************************************  Load More ******************************************
 */

function blu_loadmore_ajax_handler(){
	$paged = $_GET['paged'] ? $_GET['paged'] + 1 : 1;
	$post_per_page = get_option('woocommerce_catalog_columns') * get_option('woocommerce_catalog_rows');
	$orderby = $_GET['order'] ? $_GET['order'] : 'popularity';

	//$tax_active_page = get_queried_object()->term_id ? get_queried_object()->term_id : false;
	$tax_active_page = $_GET['taxonomyID'] ? $_GET['taxonomyID'] : false;
	$categories = $_GET['category'] ? explode(',', $_GET['category'] ) : false;
	$color = $_GET['color'];
	$razmer = $_GET['razmer'];


	if( $tax_active_page ){
		if( $categories ){
			// Category is Array
			if( in_array( $tax_active_page, $categories ) ){
				// Find Element
			}else{
				// Don't have element
				array_unshift( $categories, $tax_active_page );
			}
		}else{
			// Category don't is Array
			$categories = array($tax_active_page);
		}
	}
	//echo 'asdfasd' . $tax_active_page . '<br>';
	//print_r($categories) . '<br>';

	$meta_query = array(
		array(
			'key' => '_price',
			'value' => array( $_GET['min'], $_GET['max'] ),
			'compare' => 'BETWEEN',
			'type' => 'NUMERIC'
		)
	);

	$tax = array();

	if( !empty($categories) ){
		array_push( $tax, array(
			'taxonomy' => 'product_cat',
			'field' => 'id',
			'terms' => $categories,
			'operator' => 'AND'
		) );
	}

	if( !empty($color) ){
		array_push( $tax, array(
			'taxonomy' => 'pa_czvet',
			'field' => 'id',
			'terms' => $color,
			'operator' => 'IN'
		) );
	}

	if( !empty($razmer) ){
		array_push( $tax, array(
			'taxonomy' => 'pa_razmer',
			'field' => 'id',
			'terms' => $razmer,
			'operator' => 'IN'
		) );
	}

	// $tax_query = $categories ? array(
	// 	array(
	// 		'taxonomy' => 'product_cat',
	// 		'field' => 'id',
	// 		'terms' => $categories
	// 	)
	// ) : false;

	// $tax_query = $color ? array(
	// 	array(
	// 		'taxonomy' => 'pa_czvet',
	// 		'field' => 'id',
	// 		'terms' => $color
	// 	)	
	// ) : false;

	$tax_query = $tax ?? false;

	$args = array(
		'post_type' => 'product',
		'paged' => $paged,
		'post_status' => 'publish',
		'posts_per_page' => $post_per_page,
		'tax_query' => $tax_query,
		'meta_query' => $meta_query
	);

	switch ($orderby) {
		case 'date':
			$args['orderby'] = 'date';
			//$args['meta_key'] = 'date';
			$args['order'] = 'desc';
			break;
		case 'price':
			$args['orderby'] = 'meta_value_num';
			$args['meta_key'] = '_price';
			$args['order'] = 'asc';
			break;
		case 'price-desc':
			$args['orderby'] = 'meta_value_num';
			$args['meta_key'] = '_price';
			$args['order'] = 'desc';
			break;
		case 'popularity':
			$args['orderby'] = 'meta_value_num';
			$args['meta_key'] = 'total_sales';
			$args['order'] = 'desc';
			break;
		case 'rating':
			$args['orderby'] = 'meta_value_num';
			$args['meta_key'] = '_wc_average_rating';
			$args['order'] = 'desc';
			break;
	}

	//print_r($args);
	//print_r($categories2);
	//echo $_GET['active_tax'];

	$loop = new WP_Query( $args );
	if( $loop->have_posts() ){
		$count = 0;
		while( $loop->have_posts() ) : $loop->the_post();
		?>
			<li class="big-products__list__item" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="<?php echo $count += 100; ?>">
				<?php
				/**
				 * Hook: woocommerce_shop_loop.
				 */
				do_action( 'woocommerce_shop_loop' );

				wc_get_template_part( 'content', 'product' );
				?>
			</li>
		<?php
		endwhile;
	}else{
		echo '<p>Это всё</p>';
	}
	die;
}

add_action('wp_ajax_loadmore', 'blu_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmore', 'blu_loadmore_ajax_handler');

/**
 ************************************  WooCommerce Filter ******************************************
 */

function blueins_shop_product(){
	$orderby = $_GET['order'] ? $_GET['order'] : 'popularity';
	$post_per_page = get_option('woocommerce_catalog_columns') * get_option('woocommerce_catalog_rows');
	$paged = 1;

	$categories = $_GET['category'] ? explode(',', $_GET['category']) : false;

	$meta_query = array(
		array(
			'key' => '_price',
			'value' => array( $_GET['min'], $_GET['max'] ),
			'compare' => 'BETWEEN',
			'type' => 'NUMERIC'
		),
	);

	$tax_query = $categories ? array(array(
		'taxonomy' => 'product_cat',
		'field' => 'id',
		'terms' => $categories
	)) : false;

	$args = array(
		'post_type' => 'product',
		'paged' => $paged,
		'post_status' => 'publish',
		'posts_per_page' => $post_per_page,
		'tax_query' => $tax_query,
		'meta_query' => $meta_query
	);

	switch ($orderby) {
		case 'date':
			$args['orderby'] = 'date';
			//$args['meta_key'] = 'date';
			$args['order'] = 'desc';
			break;
		case 'price':
			$args['orderby'] = 'meta_value_num';
			$args['meta_key'] = '_price';
			$args['order'] = 'asc';
			break;
		case 'price-desc':
			$args['orderby'] = 'meta_value_num';
			$args['meta_key'] = '_price';
			$args['order'] = 'desc';
			break;
		case 'popularity':
			$args['orderby'] = 'meta_value_num';
			$args['meta_key'] = 'total_sales';
			$args['order'] = 'desc';
			break;
		case 'rating':
			$args['orderby'] = 'meta_value_num';
			$args['meta_key'] = '_wc_average_rating';
			$args['order'] = 'desc';
			break;
	}

	//print_r($args);

	$loop = new WP_Query( $args );
	if( $loop->have_posts() ){
		$count = 0;
		while( $loop->have_posts() ) : $loop->the_post();
		?>
			<li class="big-products__list__item" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="<?php echo $count += 100; ?>">
				<?php
				/**
				 * Hook: woocommerce_shop_loop.
				 */
				do_action( 'woocommerce_shop_loop' );

				wc_get_template_part( 'content', 'product' );
				?>
			</li>
		<?php
		endwhile;
	}
	die;
}

//add_action('wp_ajax_blueins_filter','blueins_shop_product');
//add_action('wp_ajax_nopriv_blueins_filter','blueins_shop_product');


/**
 ************************************  Cart Ajax ******************************************
*/


function blueins_cart_ajax(){
	$retval = array(
		'success' => false,
		'message' => ""
	);
	if( !function_exists( "WC" ) ){
		$retval['message'] = "woocommerce not installed";
	}elseif( empty( $_GET['product_id'] ) ) {
		$retval['message'] = "no product id provided";
	}else{
		$product_id = $_GET['product_id'];

		$quantity = 1;
		$passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
		$product_status = get_post_status($product_id);
		$product = wc_get_product($product_id);
		$variation_id = absint( $_GET['variaction_id'] );
		$variation = array(
			'attribute_czvet' => $_GET['color'] ? str_replace('_', ' #', $_GET['color']) : false,
			'attribute_razmer' => $_GET['size'] ? str_replace('_', ' #', $_GET['size']) : false
		);
		$cart = WC()->cart;

		if( $product->stock_quantity ){
			$max_qty = $product->stock_quantity;
		}else{
			$max_qty = 1;
		}

		foreach ( $cart->get_cart() as $cart_item_key => $cart_item ){
			if( $cart_item['product_id'] == $product_id ){
				$cart_qty = $cart_item['quantity'];
			}else{
				$cart_qty = 0;
			}
		}

		if( my_custom_cart_contains( $product_id ) ){
			$cart = WC()->cart;

			// Add To Cart
			if ($passed_validation && 'publish' === $product_status) {
				if( $quantity + $cart_qty <= $max_qty){
					$retval['success'] = $cart->add_to_cart( $product_id, $quantity, $variation_id, $variation );
					$retval['message'] = "product added to cart";
				}
			} 

		}else{
			$cart = WC()->cart;

			// Add To Cart
			if ($passed_validation && 'publish' === $product_status) {
				if( $quantity + $cart_qty <= $max_qty){
					$retval['success'] = $cart->add_to_cart( $product_id, $quantity, $variation_id, $variation );
				}
			}
			if( !$retval['success'] ) {
				$retval['message'] = "product could not be added to cart";
			} else {
				$retval['message'] = "product added to cart";
			}
		}
	}
	//echo json_encode( $retval );
	

	if ( ! WC()->cart->is_empty() ) : ?>

		<div class="cart__center">
			<ul class="cart__center__list">
			<!-- List -->

			<?php

			if( $quantity + $cart_qty > $max_qty){
				?>
					<div id="tomatch-container" class="cart__center__tomatch-container">
						<div class="cart__center__tomatch-content">
							<h4 class="h4-style">Корзина</h4>
							<p class="regular-fiveteen">Вы добавили максимальное количесвто товара!</p>
						</div>
					</div>
				<?php
			}

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
	
				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) :
					$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
					$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					
			?>

				<li class="cart-list-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
					<div class="item__img-cover">
						<?php if ( empty( $product_permalink ) ) : ?>
							<?php echo $thumbnail . $product_name;?>
						<?php else : ?>
							<a href="<?php echo esc_url( $product_permalink ); ?>">
								<?php echo $thumbnail . $product_name;?>
							</a>
						<?php endif; ?>
					</div>
					<div class="item__content">
						<span class="item__content__title">
							<?php 
								$hashIndex = strripos( $product_name, '#' );
								if( $hashIndex ){
									$name = substr($product_name, 0, $hashIndex);
								}else{
									$name = $product_name;
								}
							?>
							<a class="medium-fiveteen" href="<?php echo $product_permalink ?>"><?php echo $name ?></a>
							<a  href="#" 
								class="close-button blueins_remove_cart_button"
								aria-label="Remove this item" 
								data-product_id="<?php echo $product_id; ?>" 
								data-cart_item_key="<?php echo $cart_item_key; ?>" 
								data-product_sku="<?php echo $_product->get_sku(); ?>">&times;
							</a>
							<?php
								// echo apply_filters(
								// 	'woocommerce_cart_item_remove_link',
								// 	sprintf(
								// 		'<a href="%s" class="close-button remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
								// 		esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
								// 		esc_attr__( 'Remove this item', 'woocommerce' ),
								// 		esc_attr( $product_id ),
								// 		esc_attr( $cart_item_key ),
								// 		esc_attr( $_product->get_sku() )
								// 	),
								// 	$cart_item_key
								// );
							?>
						</span>
						<div class="product-quantity-price">
							<div class="item-quantity">
							</div>
							<div class="item-price">
								<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
								<!--span class="price lights-fiveteen">BYN 60.00</span-->
							</div>
						</div>
					</div>
				</li>
			
			<?php 
				endif;
			endforeach;
			?>

			<!-- List -->
			</ul>
		</div>
		<div class="cart__bottom">

			<div class="summ-for-price woocommerce-mini-cart__total total">
				<span class="summ-for-price__text medium-fiveteen">К оплате:</span>
				<span class="summ-for-price__price lights-fiveteen"><?php wc_cart_totals_subtotal_html(); ?></span>
			</div>

			<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

			<div class="woocommerce-mini-cart__buttons buttons">
				<?php 
				do_action( 'woocommerce_widget_shopping_cart_buttons' ); 
				?>
			</div>

			<?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>

		</div>

	<?php endif;

	die();
}

add_action('wp_ajax_blueins_cart_add', 'blueins_cart_ajax');
add_action('wp_ajax_nopriv_blueins_cart_add', 'blueins_cart_ajax');



function blueins_cart_add_single(){

	$product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_GET['product_id']));
	$quantity = empty($_GET['product_qty']) ? 1 : wc_stock_amount($_GET['product_qty']);
	$variation_id = absint( $_GET['variaction_id'] );

	if( !empty( $_GET['color'] ) || !empty( $_GET['razmer'] ) ){
		$variation = array(
			'attribute_czvet' => $_GET['color'] ? str_replace('_', ' #', $_GET['color']) : false,
			'attribute_razmer' => $_GET['size'] ? str_replace('_', ' #', $_GET['size']) : false
		);
	}else{
		$variation = array(
			'attribute_pa_czvet' => $_GET['pa_color'] ? $_GET['pa_color'] : false,
			'attribute_pa_razmer' => $_GET['pa_size'] ? $_GET['pa_size'] : false
		);
	}
	

	$passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
	$product_status = get_post_status($product_id);

	$product = wc_get_product($product_id);

	if( $product->is_type('variable') ){
		
		$product_variation = $product->get_available_variations();

		foreach($product_variation as $var){
			if($var['variation_id'] == $variation_id){
				$max_qty = $var['max_qty'] ? $var['max_qty'] : 1;
			}
		}

	}else{

		if( $product->stock_quantity ){
			$max_qty = $product->stock_quantity;
		}else{
			$max_qty = 1;
		}

	}

	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ){
		if( $cart_item['product_id'] == $product_id ){
			if( $cart_item['variation_id'] == $variation_id ){
				$cart_qty = $cart_item['quantity'];
			}
		}else{
			$cart_qty = 0;
		}
	}

	// Add To Cart
	if ($passed_validation && 'publish' === $product_status) {
		if( $quantity + $cart_qty <= $max_qty){
			WC()->cart->add_to_cart($product_id, $quantity, $variation_id, $variation);
		}
		else if( $quantity > $max_qty && $cart_qty == 0 ){
			WC()->cart->add_to_cart($product_id, $max_qty, $variation_id, $variation);
		}
		else if( $quantity + $cart_qty > $max_qty && $cart_qty != 0 ){
			$quantity_last = $max_qty - $cart_qty;
			WC()->cart->add_to_cart($product_id, $quantity_last, $variation_id, $variation); 
		}
	} 

	if ( ! WC()->cart->is_empty() ) : ?>

		<div class="cart__center">
			<ul class="cart__center__list">
			<!-- List -->

			<?php

			if( $quantity + $cart_qty > $max_qty){
				?>
					<div id="tomatch-container" class="cart__center__tomatch-container">
						<div class="cart__center__tomatch-content">
							<h4 class="h4-style">Корзина</h4>
							<p class="regular-fiveteen">Вы добавили максимальное количесвто товара!</p>
						</div>
					</div>
				<?php
			}
			
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
	
				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) :
					$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
					$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					
			?>

				<li class="cart-list-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
					<div class="item__img-cover">
						<?php if ( empty( $product_permalink ) ) : ?>
							<?php echo $thumbnail . $product_name;?>
						<?php else : ?>
							<a href="<?php echo esc_url( $product_permalink ); ?>">
								<?php echo $thumbnail . $product_name;?>
							</a>
						<?php endif; ?>
					</div>
					<div class="item__content">
						<span class="item__content__title">
							<?php 
								$hashIndex = strripos( $product_name, '#' );
								if( $hashIndex ){
									$name = substr($product_name, 0, $hashIndex);
								}else{
									$name = $product_name;
								}
							?>
							<a class="medium-fiveteen" href="<?php echo $product_permalink ?>"><?php echo $name ?></a>
							<a  href="#" 
								class="close-button blueins_remove_cart_button"
								aria-label="Remove this item" 
								data-product_id="<?php echo $product_id; ?>" 
								data-cart_item_key="<?php echo $cart_item_key; ?>" 
								data-product_sku="<?php echo $_product->get_sku(); ?>">&times;
							</a>
							<?php
								// echo apply_filters(
								// 	'woocommerce_cart_item_remove_link',
								// 	sprintf(
								// 		'<a href="%s" class="close-button remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
								// 		esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
								// 		esc_attr__( 'Remove this item', 'woocommerce' ),
								// 		esc_attr( $product_id ),
								// 		esc_attr( $cart_item_key ),
								// 		esc_attr( $_product->get_sku() )
								// 	),
								// 	$cart_item_key
								// );
							?>
						</span>
						<div class="product-quantity-price">
							<div class="item-quantity">
							</div>
							<div class="item-price">
								<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
								<!--span class="price lights-fiveteen">BYN 60.00</span-->
							</div>
						</div>
					</div>
				</li>
			
			<?php 
				endif;
			endforeach;
			?>

			<!-- List -->
			</ul>
		</div>
		<div class="cart__bottom">

			<div class="summ-for-price woocommerce-mini-cart__total total">
				<span class="summ-for-price__text medium-fiveteen">К оплате:</span>
				<span class="summ-for-price__price lights-fiveteen"><?php wc_cart_totals_subtotal_html(); ?></span>
			</div>

			<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

			<div class="woocommerce-mini-cart__buttons buttons">
				<?php 
				do_action( 'woocommerce_widget_shopping_cart_buttons' ); 
				?>
			</div>

			<?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>

		</div>

	<?php elseif($quantity > $max_qty): ?>
		<div class="widget_shopping_cart_content">
			<div class="woocommerce-mini-cart__empty-message__cover">
				<p class="woocommerce-mini-cart__empty-message">Это слишком много.</p>
			</div>
		</div>
	<?php endif;
	die();

}
add_action('wp_ajax_blueins_cart_add_single', 'blueins_cart_add_single');
add_action('wp_ajax_nopriv_blueins_cart_add_single', 'blueins_cart_add_single');



function blueins_remove_cart_ajax(){
	$retval = array(
		'success' => false,
		'message' => ""
	);
	if( !function_exists( "WC" ) ){
		$retval['message'] = "woocommerce not installed";
	}elseif( empty( $_GET['product_id'] ) ) {
		$retval['message'] = "no product id provided";
	}else{
		$product_id = $_GET['product_id'];
		$product_key = $_GET['data_cart_item_key'];
		if( my_custom_cart_contains( $product_id ) ){
			$cart = WC()->cart;
			$retval['success'] = $cart->remove_cart_item( $product_key );
			$retval['message'] = "product added to cart";
		}
	}
	//echo json_encode( $retval );

	if ( ! WC()->cart->is_empty() ) : ?>

		<div class="cart__center">
			<ul class="cart__center__list">
			<!-- List -->

			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
	
				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) :
					$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
					$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					
			?>

				<li class="cart-list-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
					<div class="item__img-cover">
						<?php if ( empty( $product_permalink ) ) : ?>
							<?php echo $thumbnail . $product_name;?>
						<?php else : ?>
							<a href="<?php echo esc_url( $product_permalink ); ?>">
								<?php echo $thumbnail . $product_name;?>
							</a>
						<?php endif; ?>
					</div>
					<div class="item__content">
						<span class="item__content__title">
							<?php 
								$hashIndex = strripos( $product_name, '#' );
								if( $hashIndex ){
									$name = substr($product_name, 0, $hashIndex);
								}else{
									$name = $product_name;
								}
							?>
							<a class="medium-fiveteen" href="<?php echo $product_permalink ?>"><?php echo $name ?></a>
							<a  href="#" 
								class="close-button blueins_remove_cart_button"
								aria-label="Remove this item" 
								data-product_id="<?php echo $product_id; ?>" 
								data-cart_item_key="<?php echo $cart_item_key; ?>" 
								data-product_sku="<?php echo $_product->get_sku(); ?>">&times;
							</a>
							<?php
								// echo apply_filters(
								// 	'woocommerce_cart_item_remove_link',
								// 	sprintf(
								// 		'<a href="%s" class="close-button remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
								// 		esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
								// 		esc_attr__( 'Remove this item', 'woocommerce' ),
								// 		esc_attr( $product_id ),
								// 		esc_attr( $cart_item_key ),
								// 		esc_attr( $_product->get_sku() )
								// 	),
								// 	$cart_item_key
								// );
							?>
						</span>
						<div class="product-quantity-price">
							<div class="item-quantity">
							</div>
							<div class="item-price">
								<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
								<!--span class="price lights-fiveteen">BYN 60.00</span-->
							</div>
						</div>
					</div>
				</li>
			
			<?php 
				endif;
			endforeach;
			?>

			<!-- List -->
			</ul>
		</div>
		<div class="cart__bottom">

			<div class="summ-for-price woocommerce-mini-cart__total total">
				<span class="summ-for-price__text medium-fiveteen">К оплате:</span>
				<span class="summ-for-price__price lights-fiveteen"><?php wc_cart_totals_subtotal_html(); ?></span>
			</div>

			<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

			<div class="woocommerce-mini-cart__buttons buttons">
				<?php 
				do_action( 'woocommerce_widget_shopping_cart_buttons' ); 
				?>
			</div>

			<?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>

		</div>

	<?php else : ?>

		<div class="widget woocommerce widget_shopping_cart">
			<div class="widget_shopping_cart_content">
				<div class="woocommerce-mini-cart__empty-message__cover">
					<p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></p>
				</div>
			</div>
		</div>

	<?php endif;

	die();
}

add_action('wp_ajax_blueins_cart_remove', 'blueins_remove_cart_ajax');
add_action('wp_ajax_nopriv_blueins_cart_remove', 'blueins_remove_cart_ajax');


function my_custom_cart_contains( $product_id ) {
	$cart = WC()->cart;
	$cart_items = $cart->get_cart();
	if( $cart_items ) {
		foreach( $cart_items as $item ) {
			$product = $item['data'];
			if( $product_id == $product->id ) {
				return true;
			}
		}
	}
	return false;
}



/**
 ************************************  Search Ajax ******************************************
*/

function blueins_search_ajax(){
	$query = $_GET;
    
    $args = array(
        'post_type' => 'product',
		'posts_per_page' => 4,
        'post_status' => 'publish',
        's' => $query['messege'],
		'sentence' => true,
    );
    $search = new WP_Query( $args );
    
    ob_start();
    
    if ( $search->have_posts() ) :

		while ( $search->have_posts() ) : 
			$search->the_post();
			wc_get_template_part( 'content', 'search' );
		endwhile;

		wp_reset_postdata();

	else :
		//get_template_part( 'content', 'none' );
	endif;

	die();
}

add_action( 'wp_ajax_blueins_search', 'blueins_search_ajax' );
add_action( 'wp_ajax_nopriv_blueins_search', 'blueins_search_ajax' );