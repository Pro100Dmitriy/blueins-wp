<?php
/**
 * Require Widgets Files
 */
require_once 'widget-cart.php';
require_once 'widget-filter.php';
require_once 'widget-category.php';
require_once 'widget-active-taxonomy.php';
require_once 'widget-product-search.php';
require_once 'widget-filter-attributes.php';


/**
 * Register Theme Widgets
 */
function blueins_init_widgets() {
    register_widget('Blueins_Widget_Cart');
    register_widget('Blueins_Widget_Price_Filter');
    register_widget('Blueins_WC_Widget_Product_Categories');
    register_widget('Blu_Widget_Active_Taxonomy');
    register_widget('Blueins_Widget_Product_Search');
    register_widget('Blueins_Widget_Filter_Attributes');
}
add_action('widgets_init','blueins_init_widgets');