

<section id="fastview" class="fastview">
    <div class="fastview-relative">
        <div class="preloader">

        </div>
        <div class="fastview__container">
            <div  class="fastview__container__slider">
                <div id="fastview-slick-slider" class="fastview-slick-list">
                    <!-- Slick List-->

                    <div class="slick-item">
                        <img src="https://blueins.by/wp-content/uploads/2021/07/12-1_800x800-min.jpg">
                    </div>
                    <div class="slick-item">
                        <img src="https://blueins.by/wp-content/uploads/2021/07/8_2_800x800-min.jpg">
                    </div>
                    <div class="slick-item">
                        <img src="https://blueins.by/wp-content/uploads/2021/07/15-1_800x800-min.jpg">
                    </div>

                    <!-- Slick List-->
                </div>
            </div>
            <div class="fastview__container__content">
                <div class="close-fastview-button-cover">
                    <button id="close-fastview-menu-button" class="close-button">Close Fullscreen Menu</button>
                </div>
                <h2>Плед Герда</h2>
                <div class="price">
                    <span>Br 80.00 – Br 123.00</span>
                </div>
                <div class="description">
                    <p>Здесь будут отображаться самые новые и продоваемые продаваемые товары и услуги. Здесь будут отображать-ся самые новые и продоваемые продаваемые товары и услуги.</p>
                </div>
                <div class="variation">
                    <div class="color"></div>
                    <div class="razmer"></div>
                </div>
                <div class="content__buttons">
                <div class="details__quantity-but__quantity">
                    <div class="el-quantity quantity">
                        <?php do_action( 'woocommerce_before_quantity_input_field' ); ?>

                            <button class="el-quantity__button el-quantity__minus">
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"><rect width="33" height="33" fill="none"/><g transform="translate(11 16)"><g transform="translate(0 0)"><rect width="11.432" height="1.429" rx="0.715" fill="#fff"/></g></g></svg>
                            </button>
                            <label class="screen-reader-text" for="quantity"></label>
                            <input
                                type="number"
                                id="quantity"
                                class="el-quantity__input-number <?php echo esc_attr( join( ' ', (array) $classes ) ); ?>"
                                step="1"
                                min="1"
                                max="100"
                                name="quantity"
                                value="1"
                                title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ); ?>"
                                size="4"
                                placeholder="1"
                                inputmode="" />
                            <button class="el-quantity__button el-quantity__plus">
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"><rect width="33" height="33" fill="none"/><g transform="translate(11 11)"><g transform="translate(0)"><rect width="11.43" height="1.43" rx="0.715" transform="translate(0 5)" fill="#fff"/><rect width="11.43" height="1.43" rx="0.715" transform="translate(6.43) rotate(90)" fill="#fff"/></g></g></svg>
                            </button>
                    </div>
                    <button type="submit" name="add-to-cart" value="add" class="el-form__button single_add_to_cart_button button alt">Добавить в корзину</button>
                </div>
            </div>
        </div>
    </div>
</section>