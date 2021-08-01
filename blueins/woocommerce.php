<?php

if( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

    // WooCommerce support
    function blueins_add_woocommerce_support(){
        add_theme_support( 'woocommerce' );
    }
    add_action( 'after_setup_theme', 'blueins_add_woocommerce_support' );

    //Remove Baacrumbs
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );


    /**
     * Change the breadcrumb
     */
    add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_delimiter' );
    function wcc_change_breadcrumb_delimiter( $defaults ) {
        // Change the breadcrumb delimeter from '/' to '>'
        $defaults['delimiter'] = ' ';
        $defaults['wrap_before'] = '<ul class="details__breadcrumbs__list" itemprop="breadcrumb">';
        $defaults['wrap_after'] = '</ul>';
        return $defaults;
    }

    // Delete Add To Cart in Shopw page
    //remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

    //Product Data
    remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

    function blueins_custom_title(){
        echo '<h4 class="product-title h4-style">' . get_the_title() . '</h4>';
    }

    add_action('woocommerce_shop_loop_item_title', 'blueins_custom_title', 10);


    //Ordering
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
    remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);
    add_action('woocommerce_before_shop_loop_nitices', 'woocommerce_output_all_notices', 10);


    // Delete Rating in Start page
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);


    // Change Sale Percentage
    remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
    add_action('show_product_sale_flash', 'woocommerce_show_product_sale_flash', 10);
    
    add_filter( 'woocommerce_sale_flash', 'add_percentage_to_sale_badge', 20, 3 );
    function add_percentage_to_sale_badge( $html, $post, $product ) {

    if( $product->is_type('variable')){
        $percentages = array();

        // Get all variation prices
        $prices = $product->get_variation_prices();

        // Loop through variation prices
        foreach( $prices['price'] as $key => $price ){
            // Only on sale variations
            if( $prices['regular_price'][$key] !== $price ){
                // Calculate and set in the array the percentage for each variation on sale
                $percentages[] = round( 100 - ( floatval($prices['sale_price'][$key]) / floatval($prices['regular_price'][$key]) * 100 ) );
            }
        }
        // We keep the highest value
        $percentage = max($percentages) . '%';

    } elseif( $product->is_type('grouped') ){
        $percentages = array();

        // Get all variation prices
        $children_ids = $product->get_children();

        // Loop through variation prices
        foreach( $children_ids as $child_id ){
            $child_product = wc_get_product($child_id);

            $regular_price = (float) $child_product->get_regular_price();
            $sale_price    = (float) $child_product->get_sale_price();

            if ( $sale_price != 0 || ! empty($sale_price) ) {
                // Calculate and set in the array the percentage for each child on sale
                $percentages[] = round(100 - ($sale_price / $regular_price * 100));
            }
        }
        // We keep the highest value
        $percentage = max($percentages) . '%';

    } else {
        $regular_price = (float) $product->get_regular_price();
        $sale_price    = (float) $product->get_sale_price();

        if ( $sale_price != 0 || ! empty($sale_price) ) {
            $percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%';
        } else {
            return $html;
        }
    }
    return '<span class="onsale">-' . $percentage . '</span>';
    }


    // Slider Image
    add_action( 'after_setup_theme', 'blueins_woocommerce_plugin_setup' );
    
    function blueins_woocommerce_plugin_setup(){
        //add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
    }

    add_filter( 'woocommerce_single_product_carousel_options', 'sf_update_woo_flexslider_options' );
    /** 
     * Filer WooCommerce Flexslider options - Add Navigation Arrows
     */
    function sf_update_woo_flexslider_options( $options ) {

        $options['directionNav'] = true;

        return $options;
    }



    // Change Color HTML (Single Product)
    function blueins_dropdown_variation_attribute_options( $args = array() ) { 
        $args = wp_parse_args( apply_filters( 'woocommerce_dropdown_variation_attribute_options_args', $args ), array( 
            'options' => false,  
            'attribute' => false,  
            'product' => false,  
            'selected' => false,  
            'name' => '',  
            'id' => '',  
            'class' => '',  
            'show_option_none' => __( 'Choose an option', 'woocommerce' ),  
     ) ); 
     
        $options = $args['options']; 
        $product = $args['product']; 
        $attribute = $args['attribute']; 
        $name = $args['name'] ? $args['name'] : 'attribute_' . sanitize_title( $attribute ); 
        $id = $args['id'] ? $args['id'] : sanitize_title( $attribute ); 
        $class = $args['class']; 
        $show_option_none = $args['show_option_none'] ? true : false; 
        $show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __( 'Choose an option', 'woocommerce' ); // We'll do our best to hide the placeholder, but we'll need to show something when resetting options. 
     
        if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) { 
            $attributes = $product->get_variation_attributes(); 
            $options = $attributes[ $attribute ]; 
        } 
     
        $html = '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '" name="' . esc_attr( $name ) . '" data-attribute_name="attribute_' . esc_attr( sanitize_title( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">'; 
        $html .= '<option value="">' . esc_html( $show_option_none_text ) . '</option>'; 
        
     
        if ( ! empty( $options ) ) { 
            if ( $product && taxonomy_exists( $attribute ) ) { 
                // Get terms if this is a taxonomy - ordered. We need the names too. 
                $terms = wc_get_product_terms( $product->get_id(), $attribute, array( 'fields' => 'all' ) ); 
     
                foreach ( $terms as $term ) { 
                    if ( in_array( $term->slug, $options ) ) { 
                        $html .= '<option value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $args['selected'] ), $term->slug, false ) . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name ) ) . '</option>'; 
                    } 
                } 
            } else { 
                foreach ( $options as $option ) { 
                    // This handles < 2.4.0 bw compatibility where text attributes were not sanitized. 
                    $selected = sanitize_title( $args['selected'] ) === $args['selected'] ? selected( $args['selected'], sanitize_title( $option ), false ) : selected( $args['selected'], $option, false ); 
                    $html .= '<option value="' . esc_attr( $option ) . '" ' . $selected . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) ) . '</option>'; 
                } 
            } 
        } 
     
        $html .= '</select>'; 
     
        echo apply_filters( 'woocommerce_dropdown_variation_attribute_options_html', $html, $args ); 
    } 


    // Change Meta Information Position
    remove_action('woocommerce_single_product_summary','woocommerce_template_single_add_to_cart', 30);
    add_action('woocommerce_single_product_summary','woocommerce_template_single_add_to_cart', 50);


    //Change Releted Product
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display',15);

    
    /**
     * Remove product data tabs
     */
    add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

    function woo_remove_product_tabs( $tabs ) {

        unset( $tabs['description'] );      	// Remove the description tab
        //unset( $tabs['reviews'] ); 			// Remove the reviews tab
        unset( $tabs['additional_information'] );  	// Remove the additional information tab

        return $tabs;
    }



    /**
     * Change Rating HTML
    */
    add_filter( 'woocommerce_product_get_rating_html', 'blueins_product_get_rating_html', 10, 3 );
    function blueins_product_get_rating_html( $html, $rating, $count ){
        // filter...
    
        if ( 0 < $rating ) {
            /* translators: %s: rating */
            $label = sprintf( __( 'Rated %s out of 5', 'woocommerce' ), $rating );

            $html = '<p class="comment-rating__stars" aria-label="' . esc_attr( $label ) . '"><span>';

            if( $rating == 5 ){
                $html .=   '<a class="star-1 star-active" href="#">1</a>
                            <a class="star-2 star-active" href="#">2</a>
                            <a class="star-3 star-active" href="#">3</a>
                            <a class="star-4 star-active" href="#">4</a>
                            <a class="star-5 star-active" href="#">5</a>';
            }else if( $rating == 4 ){
                $html .=   '<a class="star-1 star-active" href="#">1</a>
                            <a class="star-2 star-active" href="#">2</a>
                            <a class="star-3 star-active" href="#">3</a>
                            <a class="star-4 star-active" href="#">4</a>
                            <a class="star-5" href="#">5</a>';
            }else if( $rating == 3 ){
                $html .=   '<a class="star-1 star-active" href="#">1</a>
                            <a class="star-2 star-active" href="#">2</a>
                            <a class="star-3 star-active" href="#">3</a>
                            <a class="star-4" href="#">4</a>
                            <a class="star-5" href="#">5</a>'; 
            }else if( $rating == 2 ){
                $html .=   '<a class="star-1 star-active" href="#">1</a>
                            <a class="star-2 star-active" href="#">2</a>
                            <a class="star-3" href="#">3</a>
                            <a class="star-4" href="#">4</a>
                            <a class="star-5" href="#">5</a>';
            }else if( $rating == 1 ){
                $html .=   '<a class="star-1 star-active" href="#">1</a>
                            <a class="star-2" href="#">2</a>
                            <a class="star-3" href="#">3</a>
                            <a class="star-4" href="#">4</a>
                            <a class="star-5" href="#">5</a>';
            }

            $html .= '</span></p>';
        //<div class="star-rating" role="img" aria-label="' . esc_attr( $label ) . '">' . wc_get_star_rating_html( $rating, $count ) . '</div>
        }

        return $html;
    }




    if ( ! function_exists( 'blueins_header_cart' ) ) {
        /**
         * Display Header Cart
         *
         * @since  1.0.0
         * @uses  storefront_is_woocommerce_activated() check if WooCommerce is activated
         * @return void
         */
        function blueins_header_cart() {
 
            the_widget( 'Blueins_Widget_Cart', 'title=' ); 

        }
    }


    if ( ! function_exists( 'blueins_cart_link' ) ) {
        /**
         * Cart Link
         * Displayed a link to the cart including the number of items present and the cart total
         *
         * @return void
         * @since  1.0.0
         */
        function blueins_cart_link() {
            ?>
                <a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'storefront' ); ?>">
                    <?php /* translators: %d: number of items in cart */ ?>
                    <?php echo wp_kses_post( WC()->cart->get_cart_subtotal() ); ?> <span class="count"><?php echo wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'storefront' ), WC()->cart->get_cart_contents_count() ) ); ?></span>
                </a>
            <?php
        }
    }
    

    add_action( 'blueins_header', 'blueins_header_cart', 10 );




    add_action('blueins_authorization_user', 'blueins_login_user_form', 10);

    function blueins_login_user_form() {
        if ( is_user_logged_in() ) {
            // Do what you want...
        } else {
            $html_form = wc_get_template('woocommerce/global/form-login.php');
            return $html_form;
        }
    }

    add_action('blueins_authorization_user', 'blueins_registration_user_form', 20);

    function blueins_registration_user_form() {
        if ( is_user_logged_in() ) {
            // Do what you want...
        } else {
            $html_form = wc_get_template('woocommerce/global/form-registration.php');
            return $html_form;
        }
    }


    /**
     * Remove Item User Navigation — My Account
     */

    add_filter ( 'woocommerce_account_menu_items', 'blueins_remove_my_account_links' );
    function blueins_remove_my_account_links( $menu_links ){
    
        //unset( $menu_links['edit-address'] ); // Addresses
        //unset( $menu_links['dashboard'] ); // Remove Dashboard
        //unset( $menu_links['payment-methods'] ); // Remove Payment Methods
        //unset( $menu_links['orders'] ); // Remove Orders
        unset( $menu_links['downloads'] ); // Disable Downloads
        //unset( $menu_links['edit-account'] ); // Remove Account details tab
        //unset( $menu_links['customer-logout'] ); // Remove Logout link

        $menu_links['dashboard'] = 'Мой аккаунт';

        return $menu_links;

    }


    /**
     *  Change Inputs in Checkout Forms
     */

    add_filter( 'woocommerce_checkout_fields', 'blueins_remove_fields', 9999 );
 
    function blueins_remove_fields( $woo_checkout_fields_array ) {
     
        // she wanted me to leave these fields in checkout
        // unset( $woo_checkout_fields_array['billing']['billing_first_name'] );
        // unset( $woo_checkout_fields_array['billing']['billing_last_name'] );
        // unset( $woo_checkout_fields_array['billing']['billing_phone'] );
        // unset( $woo_checkout_fields_array['billing']['billing_email'] );
        // unset( $woo_checkout_fields_array['order']['order_comments'] ); // remove order notes
     
        // and to remove the billing fields below
        //unset( $woo_checkout_fields_array['billing']['billing_company'] ); // remove company field
        unset( $woo_checkout_fields_array['billing']['billing_country'] );
        //unset( $woo_checkout_fields_array['billing']['billing_address_1'] );
        //unset( $woo_checkout_fields_array['billing']['billing_address_2'] );
        //unset( $woo_checkout_fields_array['billing']['billing_city'] );
        unset( $woo_checkout_fields_array['billing']['billing_state'] ); // remove state field
        //unset( $woo_checkout_fields_array['billing']['billing_postcode'] ); // remove zip code field
     
        return $woo_checkout_fields_array;
    }

    function blueins_woocommerce_form_input( $field, $key, $args, $value) {
        // Based on key
        if( $args['required'] == 1 ){
            $reqdot = '*';
            $required = 'required';
        }else{
            $required = '';
            $reqdot = '';
        }

        if ( $args['type'] == 'text' ) {
                
            //$fieldHTML = '<div>';
            //$fieldHTML .= print_r($field);
            //$fieldHTML .= print_r($key);
            //$fieldHTML = print_r($args);
            //$fieldHTML .= print_r($value);
            
            $fieldHTML = '<p class="el-input '. implode( ' ', $args['class'] ) .'">';
            $fieldHTML .= '<label class="el-input__label" for="'. $key .'">'. $args['label'] . $reqdot .'</label>';
            $fieldHTML .= '<input class="el-input__field '.  implode(' ', $args['input_class'] ) .'" type="'. $args['type'] .'" value="" autocomplete="'. $args['autocomplete'] .'" data-priority="'. $args['priority'] .'" name="'. $key .'" id="'. $key .'" '. $required .'/>';
            $fieldHTML .= '</p>';
            
        }else if( $args['type'] == 'textarea' ){
            
            $fieldHTML = '<p class="el-input comments-textarea '. implode( ' ', $args['class'] ) .'">';
            $fieldHTML .= '<label class="el-input__label" for="'. $key .'">'. $args['label'] . $reqdot .'</label>';
            $fieldHTML .= '<textarea class="el-input__field '.  implode(' ', $args['input_class'] ) .'" type="'. $args['type'] .'" value="" autocomplete="'. $args['autocomplete'] .'" data-priority="'. $args['priority'] .'" name="'. $key .'" id="'. $key .'" '. $required .'></textarea>';
            $fieldHTML .= '</p>';

        }else if( $args['type'] == 'email' ){
            
            $fieldHTML = '<p class="el-input '. implode( ' ', $args['class'] ) .'">';
            $fieldHTML .= '<label class="el-input__label" for="'. $key .'">'. $args['label'] . $reqdot .'</label>';
            $fieldHTML .= '<input class="el-input__field '.  implode(' ', $args['input_class'] ) .'" type="'. $args['type'] .'" value="" autocomplete="'. $args['autocomplete'] .'" data-priority="'. $args['priority'] .'" name="'. $key .'" id="'. $key .'" '. $required .'/>';
            $fieldHTML .= '</p>';

        }else if( $args['type'] == 'password' ){
            
            $fieldHTML = '<p class="el-input '. implode( ' ', $args['class'] ) .'">';
            $fieldHTML .= '<label class="el-input__label" for="'. $key .'">'. $args['label'] . $reqdot .'</label>';
            $fieldHTML .= '<i class="el-input__field-box">';
            $fieldHTML .= '<input class="el-input__field '.  implode(' ', $args['input_class'] ) .'" type="'. $args['type'] .'" value="" autocomplete="'. $args['autocomplete'] .'" data-priority="'. $args['priority'] .'" name="'. $key .'" id="'. $key .'" '. $required .'/>';
            
            $fieldHTML .= '<span class="svg-box">';     
            $fieldHTML .= '<i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33 33"><defs><style>.cls-1{fill:#17191a;}.cls-2{fill:none;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="Visible"><path class="cls-1" d="M25.81,16.28c-.14-.22-3.7-5.25-9.31-5.25-4.82,0-9.11,5-9.29,5.22a.39.39,0,0,0,0,.5C7.39,17,11.68,22,16.5,22s9.11-5,9.29-5.22A.36.36,0,0,0,25.81,16.28ZM16.5,21.19C12.64,21.19,9,17.51,8,16.5c.93-1,4.6-4.69,8.47-4.69,4.52,0,7.71,3.68,8.49,4.67C24.09,17.46,20.4,21.19,16.5,21.19Z"/><path class="cls-1" d="M16.5,13.37a3.13,3.13,0,1,0,3.13,3.13A3.13,3.13,0,0,0,16.5,13.37Zm0,5.48a2.35,2.35,0,1,1,2.35-2.35A2.36,2.36,0,0,1,16.5,18.85Z"/><rect class="cls-2" width="33" height="33"/></g></g></g></svg></i>';     
            $fieldHTML .= '</span>'; 

            $fieldHTML .= '</i>';     
            $fieldHTML .= '</p>';

        }else if( $args['type'] == 'state' ){
            
            $fieldHTML = '<p class="el-input '. implode( ' ', $args['class'] ) .'">';
            $fieldHTML .= '<label class="el-input__label" for="'. $key .'">'. $args['label'] . $reqdot .'</label>';
            $fieldHTML .= '<input class="el-input__field '.  implode(' ', $args['input_class'] ) .'" type="'. $args['type'] .'" value="" autocomplete="'. $args['autocomplete'] .'" data-priority="'. $args['priority'] .'" name="'. $key .'" id="'. $key .'" '. $required .'/>'; 
            $fieldHTML .= '</p>';

        }else if( $args['type'] == 'tel' ){
            
            $fieldHTML = '<p class="el-input '. implode( ' ', $args['class'] ) .'">';
            $fieldHTML .= '<label class="el-input__label" for="'. $key .'">'. $args['label'] . $reqdot .'</label>';
            $fieldHTML .= '<input class="el-input__field '.  implode(' ', $args['input_class'] ) .'" type="'. $args['type'] .'" value="" autocomplete="'. $args['autocomplete'] .'" data-priority="'. $args['priority'] .'" name="'. $key .'" id="'. $key .'" '. $required .'/>'; 
            $fieldHTML .= '</p>';

        }else if( $args['type'] == 'country' ){
            
            $fieldHTML = '<p class="el-input '. implode( ' ', $args['class'] ) .'">';
            $fieldHTML .= '<label class="el-input__label" for="'. $key .'">'. $args['label'] . $reqdot .'</label>';
            $fieldHTML .= '<input class="el-input__field '.  implode(' ', $args['input_class'] ) .'" type="'. $args['type'] .'" value="" autocomplete="'. $args['autocomplete'] .'" data-priority="'. $args['priority'] .'" name="'. $key .'" id="'. $key .'" '. $required .'/>'; 
            $fieldHTML .= '</p>';

        }else{
            $fieldHTML = print_r($args);
        }
        
        return $fieldHTML;
    }
    add_filter( 'woocommerce_form_field', 'blueins_woocommerce_form_input', 10, 4 );

    /**
     * Remove Cupon Form
     */
    remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form' );

    }
