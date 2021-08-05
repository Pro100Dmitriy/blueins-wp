<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 */

defined( 'ABSPATH' ) || exit;

if( get_theme_mod( 'shop-start-img-color-text' ) === 'normal' ){
    get_header();
}else{
    get_header('','about__header__bottom');
}

/**
 * Hook: woocommerce_archive_description.
 *
 * @hooked woocommerce_taxonomy_archive_description - 10
 * @hooked woocommerce_product_archive_description - 10
 */
//do_action( 'woocommerce_archive_description' );


/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
//do_action( 'woocommerce_after_main_content' );


//style="background: url('<?php echo get_theme_mod( 'shop-start-img-upload' );') center/cover no-repeat; "
?>


    <!-- Filter -->
    <div id="prod-filter-menu" class="prod-filter">
        <div class="prod-filter__top">
            <h3 class="h3-style">Фильтры</h3>
            <button id="close-button-prod-filter" class="prod-filter__close-button">Готово</button>
        </div>
        <div class="prod-filter__bottom">
            <div class="prod-filter__customs">
                <ul class="customs__list">
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar") ) : ?><?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div id="prod-filter-overlay" class="prod-filter-overlay"></div>
    <!-- Filter -->

    
    <main class="main">
    <!-- Main -->

      	<section class="start-img <?php if( get_theme_mod( 'shop-start-img-color-text' ) === 'normal' ){ echo 'start-img-white-color'; }else{ echo 'start-img-dark-color'; } ?>">
            <div class="start-img__cover">
                <img id="parallax_img" class="start-img__cover__img" src="<?php echo get_theme_mod('shop-start-img-upload'); ?>">
            </div>
            <div class="start-img__cover__content">
                <div class="container">
                    <div class="row">
                        <div class="start-img__content">
                            <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                                <h1 class="h1-style"><?php woocommerce_page_title(); ?></h1>
                            <?php endif; ?>
                            <ul class="start-img__content__list">
                                <?php
                                    $category_id = get_theme_mod('shop_category_id_view');
                                    $category_id_separated = explode( ' | ', $category_id );

                                    $woo_categories = get_categories( array(
                                        'taxonomy'    => 'product_cat',
                                        'orderby'     => 'name',
                                        'order'       => 'ASC',
                                        'hide_empty'  => false,
                                        'include'     => $category_id_separated,
                                        'number'      => 3
                                    ) );
            
                                    $woo_categories = array_reverse ( $woo_categories );
            
                                    foreach( $woo_categories as $woo_cat ):
                                ?>
                                    <li class="start-img__content__list__item">
                                        <a class="light-seventeen" href="<?php echo get_term_link( $woo_cat->term_id, 'product_cat' ); ?>"><?php echo $woo_cat->name; ?></a>
                                    </li>
                                <?php
                                    endforeach;
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
		</section>

		<section id="blueins-filters-block" class="filters">
			<div class="big-container">
				<div class="filters-flex">
				<div class="filters__left">
					<?php woocommerce_breadcrumb(); ?>
				</div>
				<div class="filters__right">
					<ul class="filters__right__list">
						<li class="filters__right__list__item">
							<button id="prod-filter_open-menu" class="filter-button">
							<svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"><defs><style>.a{fill:#17191a;}.b{fill:none;}</style></defs><path class="a" d="M15.288,9.949a.465.465,0,0,0-.42-.266H.464a.465.465,0,0,0-.359.76l5.537,6.715v6.192a.465.465,0,0,0,.671.416l3.111-1.542a.465.465,0,0,0,.258-.416l.006-4.651,5.537-6.716A.464.464,0,0,0,15.288,9.949ZM8.866,16.7a.465.465,0,0,0-.106.295l-.006,4.529L6.572,22.6v-5.61a.464.464,0,0,0-.106-.3L1.45,10.612H13.882Z" transform="translate(9 -0.683)"/><rect class="b" width="33" height="33"/></svg>
							<span>Фильтры</span>
							</button>
						</li>
						<li class="filters__right__list__item">
                            <?php 
                            /**
                             * Hook: woocommerce_before_shop_loop.
                             *
                             * @hooked woocommerce_output_all_notices - 10
                             * @hooked woocommerce_result_count - 20
                             * @hooked woocommerce_catalog_ordering - 30
                             */
                            do_action( 'woocommerce_before_shop_loop' ); //fillter 
                            ?>     
						</li>
						<li class="filters__right__list__item">
							<button id="grid-fore" class="grid-button grid-button-active">
								<!-- fill --><svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"><defs><style>.a{fill:#17191a;}.b{fill:none;}</style></defs><g transform="translate(10 10)"><g transform="translate(0)"><path class="a" d="M5.882,0H.535A.535.535,0,0,0,0,.535V5.882a.535.535,0,0,0,.535.535H5.882a.535.535,0,0,0,.535-.535V.535A.535.535,0,0,0,5.882,0Z"/><path class="a" d="M152.167,0H146.82a.535.535,0,0,0-.535.535V5.882a.535.535,0,0,0,.535.535h5.347a.535.535,0,0,0,.535-.535V.535A.535.535,0,0,0,152.167,0Z" transform="translate(-138.799)"/><path class="a" d="M5.882,146.286H.535a.535.535,0,0,0-.535.535v5.347a.535.535,0,0,0,.535.535H5.882a.535.535,0,0,0,.535-.535v-5.347A.535.535,0,0,0,5.882,146.286Z" transform="translate(0 -138.8)"/><path class="a" d="M152.167,146.286H146.82a.535.535,0,0,0-.535.535v5.347a.535.535,0,0,0,.535.535h5.347a.535.535,0,0,0,.535-.535v-5.347A.535.535,0,0,0,152.167,146.286Z" transform="translate(-138.799 -138.8)"/></g></g><rect class="b" width="33" height="33"/></svg>
								<svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"><defs><style>.a{fill:#17191a;}.b{fill:none;}</style></defs><g transform="translate(10 10)"><g transform="translate(0)"><path class="a" d="M5.713,0H.5A.5.5,0,0,0,0,.5V5.713a.5.5,0,0,0,.5.5H5.713a.5.5,0,0,0,.5-.5V.5A.5.5,0,0,0,5.713,0Zm-.5,5.212H1V1h4.21Z"/></g><g transform="translate(7.317)"><path class="a" d="M151.713,0H146.5a.5.5,0,0,0-.5.5V5.713a.5.5,0,0,0,.5.5h5.212a.5.5,0,0,0,.5-.5V.5A.5.5,0,0,0,151.713,0Zm-.5,5.212H147V1h4.21Z" transform="translate(-146)"/></g><g transform="translate(0 7.317)"><path class="a" d="M5.713,146H.5a.5.5,0,0,0-.5.5v5.212a.5.5,0,0,0,.5.5H5.713a.5.5,0,0,0,.5-.5V146.5A.5.5,0,0,0,5.713,146Zm-.5,5.212H1V147h4.21Z" transform="translate(0 -146)"/></g><g transform="translate(7.317 7.317)"><path class="a" d="M151.713,146H146.5a.5.5,0,0,0-.5.5v5.212a.5.5,0,0,0,.5.5h5.212a.5.5,0,0,0,.5-.5V146.5A.5.5,0,0,0,151.713,146Zm-.5,5.212H147V147h4.21Z" transform="translate(-146 -146)"/></g></g><rect class="b" width="33" height="33"/></svg>
							</button>
							<button id="grid-five" class="grid-button">
								<!-- fill --><svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"><defs><style>.a{fill:#17191a;}.b{fill:none;}</style></defs><g transform="translate(10 10)"><g transform="translate(0)"><path class="a" d="M6.164,0H3.007a.4.4,0,0,0-.395.395V3.552a.4.4,0,0,0,.395.395H6.164a.4.4,0,0,0,.395-.395V.395A.4.4,0,0,0,6.164,0Z" transform="translate(-2.612)"/><path class="a" d="M131.552,0h-3.157A.4.4,0,0,0,128,.395V3.552a.4.4,0,0,0,.395.395h3.157a.4.4,0,0,0,.395-.395V.395A.4.4,0,0,0,131.552,0Z" transform="translate(-123.264)"/><path class="a" d="M6.164,125.388H3.007a.4.4,0,0,0-.395.395v3.157a.4.4,0,0,0,.395.395H6.164a.4.4,0,0,0,.395-.395v-3.157A.4.4,0,0,0,6.164,125.388Z" transform="translate(-2.612 -120.652)"/><path class="a" d="M131.552,125.388h-3.157a.4.4,0,0,0-.395.395v3.157a.4.4,0,0,0,.395.395h3.157a.4.4,0,0,0,.395-.395v-3.157A.4.4,0,0,0,131.552,125.388Z" transform="translate(-123.264 -120.652)"/><path class="a" d="M256.94,0h-3.157a.4.4,0,0,0-.395.395V3.552a.4.4,0,0,0,.395.395h3.157a.4.4,0,0,0,.395-.395V.395A.4.4,0,0,0,256.94,0Z" transform="translate(-243.917)"/><path class="a" d="M256.94,125.388h-3.157a.4.4,0,0,0-.395.395v3.157a.4.4,0,0,0,.395.395h3.157a.4.4,0,0,0,.395-.395v-3.157A.4.4,0,0,0,256.94,125.388Z" transform="translate(-243.917 -120.652)"/><path class="a" d="M6.164,256H3.007a.4.4,0,0,0-.395.395v3.157a.4.4,0,0,0,.395.395H6.164a.4.4,0,0,0,.395-.395v-3.157A.4.4,0,0,0,6.164,256Z" transform="translate(-2.612 -246.332)"/><path class="a" d="M131.552,256h-3.157a.4.4,0,0,0-.395.395v3.157a.4.4,0,0,0,.395.395h3.157a.4.4,0,0,0,.395-.395v-3.157A.4.4,0,0,0,131.552,256Z" transform="translate(-123.264 -246.332)"/><path class="a" d="M256.94,256h-3.157a.4.4,0,0,0-.395.395v3.157a.4.4,0,0,0,.395.395h3.157a.4.4,0,0,0,.395-.395v-3.157A.4.4,0,0,0,256.94,256Z" transform="translate(-243.917 -246.332)"/></g></g><rect class="b" width="33" height="33"/></svg>
								<svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"><defs><style>.a{fill:#17191a;}.b{fill:none;}</style></defs><g transform="translate(10 10)"><g transform="translate(0)"><path class="a" d="M6.6,0H3.387A.388.388,0,0,0,3,.387V3.6a.388.388,0,0,0,.387.387H6.6A.388.388,0,0,0,6.989,3.6V.387A.388.388,0,0,0,6.6,0ZM6.253,3.253H3.775V.775H6.253Z" transform="translate(-3)"/></g><g transform="translate(4.841)"><path class="a" d="M131.6,0h-3.214A.388.388,0,0,0,128,.387V3.6a.388.388,0,0,0,.387.387H131.6a.388.388,0,0,0,.387-.387V.387A.388.388,0,0,0,131.6,0Zm-.349,3.253h-2.478V.775h2.478Z" transform="translate(-128)"/></g><g transform="translate(0 4.879)"><path class="a" d="M6.6,126H3.387a.388.388,0,0,0-.387.387V129.6a.388.388,0,0,0,.387.387H6.6a.388.388,0,0,0,.387-.387v-3.214A.388.388,0,0,0,6.6,126Zm-.349,3.214H3.775v-2.44H6.253Z" transform="translate(-3 -126)"/></g><g transform="translate(4.841 4.879)"><path class="a" d="M131.6,126h-3.214a.388.388,0,0,0-.387.387V129.6a.388.388,0,0,0,.387.387H131.6a.388.388,0,0,0,.387-.387v-3.214A.388.388,0,0,0,131.6,126Zm-.349,3.214h-2.478v-2.44h2.478Z" transform="translate(-128 -126)"/></g><g transform="translate(9.681)"><path class="a" d="M256.6,0h-3.214A.388.388,0,0,0,253,.387V3.6a.388.388,0,0,0,.387.387H256.6a.388.388,0,0,0,.387-.387V.387A.388.388,0,0,0,256.6,0Zm-.349,3.253h-2.478V.775h2.478Z" transform="translate(-253)"/></g><g transform="translate(9.681 4.879)"><path class="a" d="M256.6,126h-3.214a.388.388,0,0,0-.387.387V129.6a.388.388,0,0,0,.387.387H256.6a.388.388,0,0,0,.387-.387v-3.214A.388.388,0,0,0,256.6,126Zm-.349,3.214h-2.478v-2.44h2.478Z" transform="translate(-253 -126)"/></g><g transform="translate(0 9.914)"><path class="a" d="M6.6,256H3.387a.388.388,0,0,0-.387.387V259.6a.388.388,0,0,0,.387.387H6.6a.388.388,0,0,0,.387-.387v-3.214A.388.388,0,0,0,6.6,256Zm-.349,3.253H3.775v-2.478H6.253Z" transform="translate(-3 -256)"/></g><g transform="translate(4.841 9.914)"><path class="a" d="M131.6,256h-3.214a.388.388,0,0,0-.387.387V259.6a.388.388,0,0,0,.387.387H131.6a.388.388,0,0,0,.387-.387v-3.214A.388.388,0,0,0,131.6,256Zm-.349,3.253h-2.478v-2.478h2.478Z" transform="translate(-128 -256)"/></g><g transform="translate(9.681 9.914)"><path class="a" d="M256.6,256h-3.214a.388.388,0,0,0-.387.387V259.6a.388.388,0,0,0,.387.387H256.6a.388.388,0,0,0,.387-.387v-3.214A.388.388,0,0,0,256.6,256Zm-.349,3.253h-2.478v-2.478h2.478Z" transform="translate(-253 -256)"/></g></g><rect class="b" width="33" height="33"/></svg>
							</button>
							<button id="grid-list" class="grid-button">
								<!-- fill --><svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"><defs><style>.a{fill:#17191a;}.b{fill:none;}</style></defs><g transform="translate(10 10)"><g transform="translate(0)"><path class="a" d="M6.6,0H3.387A.388.388,0,0,0,3,.387V3.6a.388.388,0,0,0,.387.387H6.6A.388.388,0,0,0,6.989,3.6V.387A.388.388,0,0,0,6.6,0Z" transform="translate(-3)"/></g><g transform="translate(0 4.879)"><path class="a" d="M6.6,126H3.387a.388.388,0,0,0-.387.387V129.6a.388.388,0,0,0,.387.387H6.6a.388.388,0,0,0,.387-.387v-3.214A.388.388,0,0,0,6.6,126Z" transform="translate(-3 -126)"/></g><g transform="translate(9.681 4.879)"><path class="a" d="M256.6,126h-8.028a.388.388,0,0,0-.387.387V129.6a.388.388,0,0,0,.387.387H256.6a.388.388,0,0,0,.387-.387v-3.214A.388.388,0,0,0,256.6,126Z" transform="translate(-253 -126)"/></g><g transform="translate(9.681 9.879)"><path class="a" d="M256.6,126h-8.028a.388.388,0,0,0-.387.387V129.6a.388.388,0,0,0,.387.387H256.6a.388.388,0,0,0,.387-.387v-3.214A.388.388,0,0,0,256.6,126Z" transform="translate(-253 -126)"/></g><g transform="translate(9.681 -0.121)"><path class="a" d="M256.569,126.116H248.54a.388.388,0,0,0-.387.387v3.215a.388.388,0,0,0,.387.387h8.028a.388.388,0,0,0,.387-.387V126.5A.388.388,0,0,0,256.569,126.116Z" transform="translate(-253 -126)"/></g><g transform="translate(0 9.914)"><path class="a" d="M6.6,256H3.387a.388.388,0,0,0-.387.387V259.6a.388.388,0,0,0,.387.387H6.6a.388.388,0,0,0,.387-.387v-3.214A.388.388,0,0,0,6.6,256Z" transform="translate(-3 -256)"/></g></g><rect class="b" width="33" height="33"/></svg>
								<svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"><defs><style>.a{fill:#17191a;}.b{fill:none;}</style></defs><g transform="translate(10 10)"><g transform="translate(0)"><path class="a" d="M6.6,0H3.387A.388.388,0,0,0,3,.387V3.6a.388.388,0,0,0,.387.387H6.6A.388.388,0,0,0,6.989,3.6V.387A.388.388,0,0,0,6.6,0ZM6.253,3.253H3.775V.775H6.253Z" transform="translate(-3)"/></g><g transform="translate(0 4.879)"><path class="a" d="M6.6,126H3.387a.388.388,0,0,0-.387.387V129.6a.388.388,0,0,0,.387.387H6.6a.388.388,0,0,0,.387-.387v-3.214A.388.388,0,0,0,6.6,126Zm-.349,3.214H3.775v-2.44H6.253Z" transform="translate(-3 -126)"/></g><g transform="translate(9.681 4.879)"><path class="a" d="M256.6,126h-8.028a.388.388,0,0,0-.387.387V129.6a.388.388,0,0,0,.387.387H256.6a.388.388,0,0,0,.387-.387v-3.214A.388.388,0,0,0,256.6,126Zm-.349,3.214h-7.292v-2.44h7.292Z" transform="translate(-253 -126)"/></g><g transform="translate(9.681 9.879)"><path class="a" d="M256.6,126h-8.028a.388.388,0,0,0-.387.387V129.6a.388.388,0,0,0,.387.387H256.6a.388.388,0,0,0,.387-.387v-3.214A.388.388,0,0,0,256.6,126Zm-.349,3.214h-7.292v-2.44h7.292Z" transform="translate(-253 -126)"/></g><g transform="translate(9.681 -0.121)"><path class="a" d="M256.569,126.116H248.54a.388.388,0,0,0-.387.387v3.215a.388.388,0,0,0,.387.387h8.028a.388.388,0,0,0,.387-.387V126.5A.388.388,0,0,0,256.569,126.116Zm-.349,3.215h-7.292V126.89h7.292Z" transform="translate(-253 -126)"/></g><g transform="translate(0 9.914)"><path class="a" d="M6.6,256H3.387a.388.388,0,0,0-.387.387V259.6a.388.388,0,0,0,.387.387H6.6a.388.388,0,0,0,.387-.387v-3.214A.388.388,0,0,0,6.6,256Zm-.349,3.253H3.775v-2.478H6.253Z" transform="translate(-3 -256)"/></g></g><rect class="b" width="33" height="33"/></svg>
							</button>
						</li>
					</ul>
				</div>
				</div>
			</div>
		</section>

        <section class="archive-container">
            <?php
                do_action('woocommerce_before_shop_loop_nitices'); // add notices
            ?>
        </section>

        <section class="products">
            <div class="big-container">
                <?php
                if ( woocommerce_product_loop() ) {
                
                    woocommerce_product_loop_start();

                    $args = array(
                        'post_type' => 'product',
                        'paged' => 1,
                        'post_status' => 'publish',
                        'posts_per_page' => get_option('woocommerce_catalog_columns') * get_option('woocommerce_catalog_rows'),
                        //'posts_per_page' => get_option('woocommerce_catalog_columns') * get_option('woocommerce_catalog_rows'),
                        //'tax_query' => false,
                        //'meta_query' => $meta_query,
                        'orderby' => 'meta_value_num',
                        'meta_key' => 'total_sales',
                        'order' => 'desc'
                    );

                    //print_r($args);                

                    $blu_loop = new WP_Query( $args );
                    if( $blu_loop->have_posts() ){
                        $count = 0;
                        while( $blu_loop->have_posts() ){
                            $blu_loop->the_post();
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
                        }
                        wp_reset_postdata();
                    }
                
                    woocommerce_product_loop_end();
                
                } else {
                    /**
                     * Hook: woocommerce_no_products_found.
                     *
                     * @hooked wc_no_products_found - 10
                     */
                    do_action( 'woocommerce_no_products_found' );
                }
                ?>

            <div class="paggination footer-marg">

                <?php
                /**
                 * Hook: woocommerce_after_shop_loop.
                 *
                 * @hooked woocommerce_pagination - 10
                 */
                do_action( 'woocommerce_after_shop_loop' );
                ?>
                
            </div>
            </div>
        </section>

    <!-- Main -->
    </main>


<?php get_footer(); ?>