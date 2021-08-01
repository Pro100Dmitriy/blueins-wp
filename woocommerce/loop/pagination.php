<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
$base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
$format  = isset( $format ) ? $format : '';

if ( $total <= 1 ) {
	return;
}
?>
<nav class="woocommerce-pagination">
	<?php
	// echo paginate_links(
	// 	apply_filters(
	// 		'woocommerce_pagination_args',
	// 		array( // WPCS: XSS ok.
	// 			'base'      => $base,
	// 			'format'    => $format,
	// 			'add_args'  => true,
	// 			'current'   => max( 1, $current ),
	// 			'total'     => $total,
	// 			'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="9.534" height="17.316" viewBox="0 0 9.534 17.316"><g transform="translate(63.647 17.316) rotate(180)"><path d="M63.394,8.04,55.607.256a.874.874,0,0,0-1.238,1.235l7.169,7.167L54.37,15.824a.875.875,0,1,0,1.238,1.236l7.787-7.784A.882.882,0,0,0,63.394,8.04Z"/></g></svg>',
	// 			'next_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="9.534" height="17.316" viewBox="0 0 9.534 17.316"><g transform="translate(-54.113)"><path d="M63.394,8.04,55.607.256a.874.874,0,0,0-1.238,1.235l7.169,7.167L54.37,15.824a.875.875,0,1,0,1.238,1.236l7.787-7.784A.882.882,0,0,0,63.394,8.04Z"/></g></svg>',
	// 			'type'      => 'list',
	// 			'end_size'  => 3,
	// 			'mid_size'  => 3,
	// 		)
	// 	)
	// );
	?>
	<?php
		global $wp_query; // you can remove this line if everything works for you
		
		// don't display the button if there are not enough posts
		if (  $wp_query->max_num_pages > 1 )
			echo '<button id="blueins-load_more" class="el-stroke-button">Ещё...?</button>'; // you can use <a> as well
	?>
</nav>
