<?php
/**
 * Template name: Главная
 * The main template file
 **/

//get_header();
get_header('','about__header__bottom');
?>

    <main class="main">
    <!-- Main -->


        <section id="slider-in-main" class="slider">
            <div class="slick-slider">
                <!-- Slick Slider-->

                <?php
                
                $slider = get_posts( array(
                    'numberposts'   => -1,
                    'category_name' => 'slider',
                    'orderby'       => 'date',
                    'order'         => 'ASC',
                    'post_type'     => 'post'
                ) );

                foreach ($slider as $post) :
                    setup_postdata($post);
                ?>

                <div class="slick-slider__item">
                    <img class="slick-slider__item__img" width="100%" height="100%" src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" alt="Slider Img">
                    <div class="slick-slider__item__content">
                        <div class="h2-cover">
                            <span class="title-slider h1-style" style="<?php
                                $field_color = get_field('slider_color');
                                if( $field_color == 'white' ){
                                    ?> color: white; <?php
                                }else{
                                    ?> color: #212529; <?php
                                }
                            ?>"><?php the_title(); ?></span>
                        </div>
                        <div class="description">
                            <?php 
                            if( $post->post_content ) : ?>
                                <div class="description__text-cover">
                                    <div class="description__text regular-seventeen" style="<?php
                                        if( $field_color == 'white' ){
                                            ?> color: white; <?php
                                        }else{
                                            ?> color: #212529; <?php
                                        }
                                    ?>"><?php the_content(); ?></div>
                                </div>
                            <?php endif; ?>
                            <div class="line-button-cover">
                                <a class="line-button <?php
                                if( $field_color == 'white' ){
                                    ?> line-button-white <?php
                                }else{
                                    ?> line-button-dark <?php
                                }
                                ?>" href="<?php echo get_field('slider_button_permalink'); ?>" style="<?php
                                if( $field_color == 'white' ){
                                    ?> color: white; <?php
                                }else{
                                    ?> color: #212529; <?php
                                }
                            ?>">Перейти</a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                endforeach;
                wp_reset_postdata();
                ?>

                <!-- Slick Slider-->
              </div>
        </section>

        <section class="category">
            <div class="container-fluid">
                <?php if( get_field('main_title_section_0') ) : ?>
                    <!-- <div class="section-title"> -->
                        <!-- <h1 class="section-text__title h2-style"><?php echo get_field('main_title_section_0'); ?></h1> -->
                        <?php if( get_field('main_describtion_section_0') ): ?>
                            <!-- <p class="seciton-text__description regular-fiveteen"><?php echo get_field('main_describtion_section_0'); ?></p> -->
                        <?php endif; ?>
                    <!-- </div> -->
                <?php endif; ?>
                <div class="row justify-content-between row-cols-md-3 row-cols-sm-1">
                    <?php

                    $category_id = get_theme_mod('shop_category_id_view');
                    $category_id_separated = explode( ' | ', $category_id );

                    $woo_categories = get_categories( array(
                        'taxonomy'    => 'product_cat',
                        'orderby'     => 'name',
	                    'order'       => 'ASC',
                        'hide_empty'  => false,
                        //'include'     => array(17,18,19),
                        //'include'     => array(34,18,19),
                        'include'     => $category_id_separated,
                        'number'      => 3
                      ) );

                    $woo_categories = array_reverse ( $woo_categories );

                    foreach( $woo_categories as $woo_cat ):
                    setup_postdata( $woo_cat );
                    ?>

                    <div class="coll">
                        <div class="category__cart" data-aos="fade-up" data-aos-delay="<?php 
                            if($woo_cat->term_id == 34) echo '0';
                            if($woo_cat->term_id == 19) echo '100';
                            if($woo_cat->term_id == 18) echo '200';
                            ?>">
                            <?php 
                                $thumbnail_id = get_term_meta( $woo_cat->term_id, 'thumbnail_id', true );
                                if( $thumbnail_id != 0 ){
                            ?>
                                <img class="category__cart__img" src="<?php echo wp_get_attachment_url( $thumbnail_id );  ?>" alt="Image Category">
                            <?php } ?>
                            <div class="category__cart__text">
                                <h3 class="cart-title h2-style"><?php echo $woo_cat->name; ?></h3>
                                <?php if( $thumbnail_id == 0 ){ ?>
                                    <p class="cart-description lights-fiveteen">Посмотреть остальные категории :)</p>
                                <?php } ?>
                                <a class="fill-button-white" href="<?php echo get_term_link( $woo_cat->term_id, 'product_cat' );?>">Посмотреть</a>
                            </div>
                        </div>
                    </div>

                    <?php 
                    endforeach;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </section>

        <section class="big-products">
            <div class="container pos-relative">
                <div class="big-products__title">
                    <?php if( get_field('main_title_section_1') ) : ?>
                    <div class="section-title">
                        <span class="section-text__title h2-style"><?php echo get_field('main_title_section_1'); ?></span>
                        <p class="seciton-text__description regular-fiveteen"><?php echo get_field('main_describtion_section_1'); ?></p>
                    </div>
                    <?php endif; ?>
                    <div class="big-products__title__slider-controll">
                        <div class="slider-controll">
                            <!-- Big Products Controll -->
                            <?php
                            $loop = new WP_Query( array(
                                'post_type' => 'product',
                                'posts_per_page' => 6,
                                'orderby' => 'menu_order',
                                'order' => 'ASC',
                            ));
                            while ( $loop->have_posts() ):
                                
                                $loop->the_post();
                                global $product;
                                ?>

                                <div class="slider-controll__item"></div>

                                <?php

                            endwhile;
                            wp_reset_postdata();
                            ?>
                            <!-- Big Products Controll -->
                        </div>
                    </div>
                </div>
                
                <div class="slick-product-slider">
                    <!-- Big Products Item -->
                    <?php
                    $loop = new WP_Query( array(
                        'post_type' => 'product',
                        'posts_per_page' => 6,
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                    ));
                    $count = 0;
                    while ( $loop->have_posts() ):
                        
                        $loop->the_post();
                        global $product;
                        ?>

                        <div class="slick-product__item">
                            <div class="big-products__list__item" data-aos="fade-up"  data-aos-delay="<?php echo $count += 100; ?>">
                                <?php wc_get_template_part( 'content', 'product-index' ); ?>
                            </div>
                        </div>

                        <?php

                    endwhile;
                    wp_reset_postdata();
                    ?>
                    <!-- Big Products Item -->
                </div>
            </div>
        </section>

        <section class="feedback">
            <div class="container">
                <div class="section-title">
                    <span class="section-text__title h2-style">Отзывы</span>
                </div>
                <div class="feedback__slider">
                 <div id="feedback__slider__img" class="feedback__slider__img">
                    <?php
                    
                    $sliderComment = get_posts( array(
                        'numberposts'   => -1,
                        'category_name' => 'company-comments',
                        'orderby'       => 'date',
                        'order'         => 'ASC',
                        'post_type'     => 'post'
                    ) );

                    foreach ($sliderComment as $post) :
                        setup_postdata($post);
                    ?>
                        <div class="feedback__img__el">
                            <div class="img-cover">
                                <img class="img-cover__img" src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" alt="Slide 1">
                            </div>
                        </div>
                    <?php
                    endforeach;
                    wp_reset_postdata();
                    ?>
                 </div>
                 <div id="feedback__slider__text" class="feedback__slider__text">
                    <?php
                    
                    $sliderComment = get_posts( array(
                        'numberposts'   => -1,
                        'category_name' => 'company-comments',
                        'orderby'       => 'date',
                        'order'         => 'ASC',
                        'post_type'     => 'post'
                    ) );

                    foreach ($sliderComment as $post) :
                        setup_postdata($post);
                    ?>
                        <div class="feedback__text__el">
                            <cite class="el-name medium-ninteen"><?php the_title(); ?></cite>
                            <div class="el-description regular-fiveteen"><?php the_content(); ?></div>
                        </div>
                    <?php
                    endforeach;
                    wp_reset_postdata();
                    ?>
                 </div>
             </div>
            </div>
        </section>

        <?php //do_shortcode('[blu_BCP_get_content]') ?>

        <section class="small-products">
            <div class="container">
                <?php if( get_field('main_title_section_2') ) : ?>
                <div class="section-title">
                    <span class="section-text__title h2-style"><?php echo get_field('main_title_section_2'); ?></span>
                    <p class="seciton-text__description regular-fiveteen"><?php echo get_field('main_describtion_section_2'); ?></p>
                </div>
                <?php endif; ?>
                <div class="row">
                    <ul class="small-products__list">
                        <!-- Small Products Item -->
                        <?php
                        $loop = new WP_Query( array(
                            'post_type' => 'product',
                            'posts_per_page' => 4,
                            'orderby' => 'menu_order',
                            'order' => 'ASC',
                        ));
                        $count = 0;
                        while ( $loop->have_posts() ):

                            $loop->the_post();
                            global $product;
                            ?>

                            <li class="small-products__list__item" data-aos="fade-up" data-aos-delay="<?php echo $count += 100; ?>">
                                <?php wc_get_template_part( 'content', 'product-index-small' ); ?>
                            </li>

                            <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                        <!-- Small Products Item -->
                    </ul>
                </div>
            </div>
        </section>

        <section class="about footer-marg">
            <div class="container">
                <?php if( get_field('main_title_section_3') ) : ?>
                <div class="section-title">
                    <h2 class="section-text__title h2-style"><?php echo get_field('main_title_section_3'); ?></h2>
                    <p class="seciton-text__description regular-fiveteen"><?php echo get_field('main_describtion_section_3'); ?></p>
                </div>
                <?php endif; ?>
                <?php if( get_field('main_image_section_3') ) : ?>
                <div class="about__content" data-aos="fade-up">
                    <div class="about__content__img-cover">
                        <img class="about__content__img-cover__img" src="<?php echo get_field('main_image_section_3'); ?>" alt="Bluins">
                    </div>
                    <?php $count = 0; ?>
                    <?php
                        $qualityCompany = explode( ' | ', get_field('main_quality_section_3') );

                        if( count( $qualityCompany ) > 3 ){
                            $qualityCompany = array_slice( $qualityCompany, 0, 3 );
                        }

                        if( $qualityCompany ) :
                    ?>
                    <div class="about__content__text">
                        <?php foreach( $qualityCompany as $index => $value ) : ?>
                            <div class="text-box text-left" data-aos="fade-up"  data-aos-delay="<?php echo $count += 100; ?>">
                                <p class="medium-ninteen"><?php echo $value; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php
                        endif;
                    ?>
                </div>
                <?php endif; ?>
            </div>
        </section>


    <!-- Main -->
    </main>
    
<?php
get_footer();









                