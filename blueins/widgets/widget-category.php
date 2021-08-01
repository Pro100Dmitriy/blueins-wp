<?php
defined( 'ABSPATH' ) || exit;

class Blueins_WC_Widget_Product_Categories extends WC_Widget {

	/**
	 * Category ancestors.
	 *
	 * @var array
	 */
	public $cat_ancestors;

	/**
	 * Current Category.
	 *
	 * @var bool
	 */
	public $current_cat;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->widget_cssclass    = 'woocommerce widget_product_categories';
		$this->widget_description = __( 'A list or dropdown of product categories.', 'woocommerce' );
		$this->widget_id          = 'woocommerce_product_categories';
		$this->widget_name        = __( 'Product Categories', 'woocommerce' );
		$this->settings           = array(
			'title'              => array(
				'type'  => 'text',
				'std'   => __( 'Product categories', 'woocommerce' ),
				'label' => __( 'Title', 'woocommerce' ),
			),
			'orderby'            => array(
				'type'    => 'select',
				'std'     => 'name',
				'label'   => __( 'Order by', 'woocommerce' ),
				'options' => array(
					'order' => __( 'Category order', 'woocommerce' ),
					'name'  => __( 'Name', 'woocommerce' ),
				),
			),
			'count'              => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Show product counts', 'woocommerce' ),
			),
			'hierarchical'       => array(
				'type'  => 'checkbox',
				'std'   => 1,
				'label' => __( 'Show hierarchy', 'woocommerce' ),
			),
			// 'show_children_only' => array(
			// 	'type'  => 'checkbox',
			// 	'std'   => 0,
			// 	'label' => __( 'Only show children of the current category', 'woocommerce' ),
			// ),
			'hide_empty'         => array(
				'type'  => 'checkbox',
				'std'   => 1,
				'label' => __( 'Hide empty categories', 'woocommerce' ),
			),
			'max_depth'          => array(
				'type'  => 'text',
				'std'   => '',
				'label' => __( 'Выводимые категории', 'woocommerce' ),
			)
		);

		parent::__construct();
	}

	/**
	 * Output widget.
	 *
	 * @see WP_Widget
	 * @param array $args     Widget arguments.
	 * @param array $instance Widget instance.
	 */
	public function widget( $args, $instance ) {
		global $wp_query, $post;

		$count              = isset( $instance['count'] ) ? $instance['count'] : $this->settings['count']['std'];
		$hierarchical       = isset( $instance['hierarchical'] ) ? $instance['hierarchical'] : $this->settings['hierarchical']['std'];
		$show_children_only = isset( $instance['show_children_only'] ) ? $instance['show_children_only'] : $this->settings['show_children_only']['std'];
		$orderby            = isset( $instance['orderby'] ) ? $instance['orderby'] : $this->settings['orderby']['std'];
		$hide_empty         = isset( $instance['hide_empty'] ) ? $instance['hide_empty'] : $this->settings['hide_empty']['std'];

		$list_args          = array(
			'show_count'   => $count,
			'hierarchical' => $hierarchical,
			'taxonomy'     => 'product_cat',
			'hide_empty'   => $hide_empty
		);

		$max_depth          = absint( isset( $instance['max_depth'] ) ? $instance['max_depth'] : $this->settings['max_depth']['std'] );
        //$child_of           = absint( isset( $instance['child_of'] ) ? $instance['child_of'] : $this->settings['chlid_of']['std'] );

		$list_args['menu_order'] = false;
		$list_args['depth']      = $max_depth;
        //$list_args['child_of']   = $child_of;

		if ( 'order' === $orderby ) {
			$list_args['orderby']      = 'meta_value_num';
			$list_args['meta_key']     = 'order';
		}

		$this->current_cat   = false;
		$this->cat_ancestors = array();

		if ( is_tax( 'product_cat' ) ) {
			$this->current_cat   = $wp_query->queried_object;
			$this->cat_ancestors = get_ancestors( $this->current_cat->term_id, 'product_cat' );
		} elseif ( is_singular( 'product' ) ) {
			$terms = wc_get_product_terms(
				$post->ID,
				'product_cat',
				apply_filters(
					'woocommerce_product_categories_widget_product_terms_args',
					array(
						'orderby' => 'parent',
						'order'   => 'DESC',
					)
				)
			);

			if ( $terms ) {
				$main_term           = apply_filters( 'woocommerce_product_categories_widget_main_term', $terms[0], $terms );
				$this->current_cat   = $main_term;
				$this->cat_ancestors = get_ancestors( $main_term->term_id, 'product_cat' );
			}
		}

		// Show Siblings and Children Only.
		// if ( $show_children_only && $this->current_cat ) {
		// 	if ( $hierarchical ) {
		// 		$include = array_merge(
		// 			$this->cat_ancestors,
		// 			array( $this->current_cat->term_id ),
		// 			get_terms(
		// 				'product_cat',
		// 				array(
		// 					'fields'       => 'ids',
		// 					'parent'       => 0,
		// 					'hierarchical' => true,
		// 					'hide_empty'   => false,
		// 				)
		// 			),
		// 			get_terms(
		// 				'product_cat',
		// 				array(
		// 					'fields'       => 'ids',
		// 					'parent'       => $this->current_cat->term_id,
		// 					'hierarchical' => true,
		// 					'hide_empty'   => false,
		// 				)
		// 			)
		// 		);
		// 		// Gather siblings of ancestors.
		// 		if ( $this->cat_ancestors ) {
		// 			foreach ( $this->cat_ancestors as $ancestor ) {
		// 				$include = array_merge(
		// 					$include,
		// 					get_terms(
		// 						'product_cat',
		// 						array(
		// 							'fields'       => 'ids',
		// 							'parent'       => $ancestor,
		// 							'hierarchical' => false,
		// 							'hide_empty'   => false,
		// 						)
		// 					)
		// 				);
		// 			}
		// 		}
		// 	} else {
		// 		// Direct children.
		// 		$include = get_terms(
		// 			'product_cat',
		// 			array(
		// 				'fields'       => 'ids',
		// 				'parent'       => $this->current_cat->term_id,
		// 				'hierarchical' => true,
		// 				'hide_empty'   => false,
		// 			)
		// 		);
		// 	}

		// 	$list_args['include']     = implode( ',', $include );

		// 	if ( empty( $include ) ) {
		// 		return;
		// 	}
		// } elseif ( $show_children_only ) {
		// 	$list_args['depth']            = 1;
		// 	$list_args['child_of']         = 0;
		// 	$list_args['hierarchical']     = 1;
		// }

		// $this->widget_start( $args, $instance );

		
			//include_once WC()->plugin_path() . '/includes/walkers/class-wc-product-cat-list-walker.php';

			//$list_args['walker']                     = new WC_Product_Cat_List_Walker();
			// $list_args['title_li']                   = '';
			// $list_args['pad_counts']                 = 1;
			// $list_args['show_option_none']           = __( 'No product categories exist.', 'woocommerce' );
			// $list_args['current_category']           = ( $this->current_cat ) ? $this->current_cat->term_id : '';
			// $list_args['current_category_ancestors'] = $this->cat_ancestors;
			// $list_args['max_depth']                  = $max_depth;

			// echo '<div class="item__nav"><ul class="product-categories">';

			// wp_list_categories( apply_filters( 'woocommerce_product_categories_widget_args', $list_args ) );

			// echo '</ul></div>';

        $this->widget_start( $args, $instance );

        $list_args['title_li']                   = '';
        $list_args['pad_counts']                 = 1;
        $list_args['show_option_none']           = __( 'No product categories exist.', 'woocommerce' );
        $list_args['current_category_ancestors'] = $this->cat_ancestors;
        //$list_args['max_depth']                  = $max_depth;
        $list_args['child_of']                   = $max_depth;

        echo '<div class="item__nav"><ul class="product-categories">';

        wp_list_categories( apply_filters( 'woocommerce_product_categories_widget_args', $list_args ) );

        echo '</ul></div>';

		$this->widget_end( $args );
	}
}
