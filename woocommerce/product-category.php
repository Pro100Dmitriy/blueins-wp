<?php
/**
 * Template name: Категории товара
 **/

get_header();
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
                    <li class="customs__list__item">
                        <div class="customs__list__item__title">
                            <h6 class="groupe-cust-title">Фильтер по категории</h6>
                            <span></span>
                        </div>
                        <div class="item__nav">
                            <ul>
                                <li><a href="#">Пледы</a></li>
                                <li><a href="#">Одеяла</a></li>
                                <li><a href="#">Подушки</a></li>
                                <li><a href="#">Покрывала</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="customs__list__item">
                        <div class="customs__list__item__title">
                            <h6 class="groupe-cust-title">Фильтер по категории</h6>
                            <span></span>
                        </div>
                        <div class="item__nav">
                            <ul>
                                <li><a href="#">Лён</a></li>
                                <li><a href="#">Синтетика</a></li>
                                <li><a href="#">Ткань</a></li>
                                <li><a href="#">Поддержка</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="customs__list__item">
                        <div class="customs__list__item__title">
                            <h6 class="groupe-cust-title">Фильтер по категории</h6>
                            <span></span>
                        </div>
                        <div class="item__nav">
                            <ul class="customs__cl">
                                <li class="customs__cl__item"><a href="#">
                                    <span class="cl-circle red"></span>
                                </a></li>
                                <li class="customs__cl__item"><a href="#">
                                    <span class="cl-circle black"></span>
                                </a></li>
                                <li class="customs__cl__item"><a href="#">
                                    <span class="cl-circle blue"></span>
                                </a></li>
                                <li class="customs__cl__item"><a href="#">
                                    <span class="cl-circle gold"></span>
                                </a></li>
                                <li class="customs__cl__item"><a href="#">
                                    <span class="cl-circle grey"></span>
                                </a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="customs__list__item">
                        <div class="customs__list__item__title">
                            <h6 class="groupe-cust-title">Фильтер по категории</h6>
                            <span></span>
                        </div>
                        <div class="item__nav">
                            
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="prod-filter-overlay" class="prod-filter-overlay"></div>
    <!-- Filter -->

    <main class="main">
    <!-- Main -->

      <section class="start-img">
         <div class="container">
            <div class="row">
               <div class="col">
                  <div class="start-img__content">
                     <h1 class="h1-style">Магазин</h1>
                     <ul class="start-img__content__list">
                        <li class="start-img__content__list__item"><a class="light-seventeen" href="#">Пледы</a></li>
                        <li class="start-img__content__list__item"><a class="light-seventeen" href="#">Одеяла</a></li>
                        <li class="start-img__content__list__item"><a class="light-seventeen" href="#">Подушки</a></li>
                        <li class="start-img__content__list__item"><a class="light-seventeen" href="#">Покрывала</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <section class="filters">
         <div class="big-container">
            <div class="filters-flex">
               <div class="filters__left">
                  <span class="bradcrumbs medium-fiveteen"><a class="regular-fiveteen" href="index.html">Главная</a> / Магазин</span>
               </div>
               <div class="filters__right">
                  <ul class="filters__right__list">
                     <li class="filters__right__list__item">
                        <button id="prod-filter_open-menu" class="filter-button">
                           <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"><defs><style>.a{fill:#17191a;}.b{fill:none;}</style></defs><path class="a" d="M15.288,9.949a.465.465,0,0,0-.42-.266H.464a.465.465,0,0,0-.359.76l5.537,6.715v6.192a.465.465,0,0,0,.671.416l3.111-1.542a.465.465,0,0,0,.258-.416l.006-4.651,5.537-6.716A.464.464,0,0,0,15.288,9.949ZM8.866,16.7a.465.465,0,0,0-.106.295l-.006,4.529L6.572,22.6v-5.61a.464.464,0,0,0-.106-.3L1.45,10.612H13.882Z" transform="translate(9 -0.683)"/><rect class="b" width="33" height="33"/></svg>
                           <span>Фильтер</span>
                        </button>
                     </li>
                     <li class="filters__right__list__item">
                        <button class="sort-button">
                           <span>Сортировка</span>
                           <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"><defs><style>.a{fill:#17191a;}.b{fill:none;}</style></defs><g transform="translate(22.034 -40.113) rotate(90)"><path class="a" d="M60.027,5.123,55.065.163a.557.557,0,1,0-.789.787l4.568,4.567-4.568,4.567a.557.557,0,0,0,.789.788l4.962-4.96A.562.562,0,0,0,60.027,5.123Z"/></g><rect class="b" width="33" height="33"/></svg>
                        </button>           
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


      <section class="products">
         <div class="big-container">
            <ul id="products__list-container" class="products__list fore-item">
                <!-- Big Products Item -->
                <li class="big-products__list__item">
                    <div class="product-cart">
                        <div class="product-cart__top">
                            <small class="new-icon">Новое</small>
                            <div class="product-cart__list-icon">
                                <button class="like-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"><g transform="translate(8.105 8.684)"><path d="M8.323,43.324a23.174,23.174,0,0,1-2.4-2.07C2.355,38.223,0,36.221,0,33.3a4.537,4.537,0,0,1,4.421-4.763c2.815,0,3.722,2.634,3.9,2.634s1.007-2.634,3.9-2.634A4.537,4.537,0,0,1,16.645,33.3c0,2.923-2.355,4.926-5.919,7.957A23.087,23.087,0,0,1,8.323,43.324Zm-3.9-13.815A3.549,3.549,0,0,0,.975,33.3c0,2.473,2.218,4.359,5.576,7.214C7.12,41,8.1,42.029,8.323,42.029s1.2-1.034,1.771-1.518c3.358-2.855,5.576-4.742,5.576-7.214a3.549,3.549,0,0,0-3.446-3.788c-1.774,0-3.024,1.59-3.431,3.056v0l-.939,0h0C7.493,31.271,6.326,29.509,4.421,29.509Z" transform="translate(0 -28.534)" fill="#fff"/></g><rect width="33" height="33" fill="none"/></svg>
                                </button>
                                <button class="cart-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"><g transform="translate(9.533 7.333)"><g transform="translate(5.045)"><path d="M80.944,2.05a2.39,2.39,0,0,0-4.3-1.068.281.281,0,1,0,.454.332,1.828,1.828,0,0,1,3.286.816.281.281,0,0,0,.278.242l.04,0A.281.281,0,0,0,80.944,2.05Z" transform="translate(-76.593)" fill="#fff"/></g><g transform="translate(0.562 3.655)"><path d="M35.08,45.914l-.844-1.406A.281.281,0,0,0,34,44.372h-.808a.281.281,0,0,0,0,.562h.649l.506.844H22.963l.506-.844h.3a.281.281,0,1,0,0-.562H23.31a.281.281,0,0,0-.241.137l-.844,1.406a.281.281,0,0,0,.241.426H34.839a.281.281,0,0,0,.241-.426Z" transform="translate(-22.185 -44.372)" fill="#fff"/></g><g transform="translate(7.413 1.576)"><path d="M109.986,20.156a.281.281,0,0,0-.175-.126l-3.833-.9a.281.281,0,0,0-.338.21l-.289,1.236a.281.281,0,0,0,.548.128l.225-.962,3.286.769-.516,2.207a.281.281,0,0,0,.21.338.285.285,0,0,0,.064.007.281.281,0,0,0,.273-.217l.58-2.481A.28.28,0,0,0,109.986,20.156Z" transform="translate(-105.343 -19.126)" fill="#fff"/></g><g transform="translate(1.659 0.855)"><g transform="translate(0)"><path d="M41.014,12.789l-.256-2.167a.281.281,0,0,0-.312-.246l-4.7.556a.281.281,0,0,0-.246.312l.427,3.614a.281.281,0,0,0,.279.248l.033,0a.281.281,0,0,0,.246-.312l-.394-3.335,4.145-.49.223,1.888a.281.281,0,0,0,.559-.066Z" transform="translate(-35.494 -10.374)" fill="#fff"/></g></g><g transform="translate(3.76 2.7)"><path d="M66.64,35.306l-.558-2.321a.281.281,0,0,0-.339-.208l-4.53,1.089a.281.281,0,0,0-.208.339l.279,1.16a.281.281,0,1,0,.547-.131l-.213-.887L65.6,33.39l.492,2.047a.281.281,0,0,0,.547-.132Z" transform="translate(-60.997 -32.769)" fill="#fff"/></g><g transform="translate(0 5.062)"><path d="M28.856,61.708a.281.281,0,0,0-.281-.267H16.2a.281.281,0,0,0-.281.267l-.562,10.966a.281.281,0,0,0,.281.3h13.5a.281.281,0,0,0,.281-.3Zm-12.92,10.7L16.469,62H28.307l.534,10.4Z" transform="translate(-15.359 -61.441)" fill="#fff"/></g><g transform="translate(8.295 6.186)"><path d="M116.9,75.093a.844.844,0,1,0,.844.844A.844.844,0,0,0,116.9,75.093Zm0,1.125a.281.281,0,1,1,.281-.281A.281.281,0,0,1,116.9,76.218Z" transform="translate(-116.052 -75.093)" fill="#fff"/></g><g transform="translate(4.077 6.186)"><path d="M65.7,75.093a.844.844,0,1,0,.844.844A.844.844,0,0,0,65.7,75.093Zm0,1.125a.281.281,0,1,1,.281-.281A.281.281,0,0,1,65.7,76.218Z" transform="translate(-64.852 -75.093)" fill="#fff"/></g><g transform="translate(4.64 7.03)"><path d="M76.178,85.333h-.022a.281.281,0,0,0-.281.281.278.278,0,0,0,.022.108v1.438a1.828,1.828,0,0,1-3.656,0V85.614a.281.281,0,1,0-.562,0v1.547a2.39,2.39,0,0,0,4.78,0V85.614A.281.281,0,0,0,76.178,85.333Z" transform="translate(-71.679 -85.333)" fill="#fff"/></g></g><rect width="33" height="33" fill="none"/></svg>
                                </button>
                            </div>
                            <figure class="figure-product">
                                <img class="product-img figure-product__first" src="img/product_1.jpg" alt="Картинка товара">
                                <img class="product-img figure-product__second" src="img/category_1.JPG" alt="Картинка товара">
                            </figure>
                            <a class="fast-view" href="product-single.html">Быстрый просмотр</a>
                        </div>
                        <div class="product-cart__bottom">
                            <div class="product-cart__bottom__left">
                                <h4 class="product-title h4-style">Постельное бельё Stelvio</h4>
                                <div class="product-cart__bottom__left__links">
                                    <p class="price regular-fiveteen">BYN 40.00</p>
                                    <a class="view-product-link regular-fiveteen" href="product-single.html">Просмотреть продукт</a>
                                </div>
                                <ul class="product-color">
                                    <li class="product-color__item">
                                        <span class="color-select-circle color-red color-select"></span>
                                    </li>
                                    <li class="product-color__item">
                                        <span class="color-select-circle color-blue"></span>
                                    </li>
                                </ul>
                                <div class="additing-block-information">
                                    <p class="block-description regular-fiveteen">Здесь будут отображаться самые новые и продоваемые продаваемые товары и услуги. </p>
                                    <a class="stroke-button" href="#"><span>Добавить</span> <i>в</i> корзину</a>
                                </div>
                            </div>
                            <div class="product-cart__bottom__right">
                                <img class="add-like" src="img/Icon/Dark/Like.svg" alt="Like">
                            </div>

                        </div>
                    </div>
                </li>

                <li class="big-products__list__item">
                    <div class="product-cart">
                        <div class="product-cart__top">
                            <small class="new-icon">Новое</small>
                            <div class="product-cart__list-icon">
                                <button class="like-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"><g transform="translate(8.105 8.684)"><path d="M8.323,43.324a23.174,23.174,0,0,1-2.4-2.07C2.355,38.223,0,36.221,0,33.3a4.537,4.537,0,0,1,4.421-4.763c2.815,0,3.722,2.634,3.9,2.634s1.007-2.634,3.9-2.634A4.537,4.537,0,0,1,16.645,33.3c0,2.923-2.355,4.926-5.919,7.957A23.087,23.087,0,0,1,8.323,43.324Zm-3.9-13.815A3.549,3.549,0,0,0,.975,33.3c0,2.473,2.218,4.359,5.576,7.214C7.12,41,8.1,42.029,8.323,42.029s1.2-1.034,1.771-1.518c3.358-2.855,5.576-4.742,5.576-7.214a3.549,3.549,0,0,0-3.446-3.788c-1.774,0-3.024,1.59-3.431,3.056v0l-.939,0h0C7.493,31.271,6.326,29.509,4.421,29.509Z" transform="translate(0 -28.534)" fill="#fff"/></g><rect width="33" height="33" fill="none"/></svg>
                                </button>
                                <button class="cart-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"><g transform="translate(9.533 7.333)"><g transform="translate(5.045)"><path d="M80.944,2.05a2.39,2.39,0,0,0-4.3-1.068.281.281,0,1,0,.454.332,1.828,1.828,0,0,1,3.286.816.281.281,0,0,0,.278.242l.04,0A.281.281,0,0,0,80.944,2.05Z" transform="translate(-76.593)" fill="#fff"/></g><g transform="translate(0.562 3.655)"><path d="M35.08,45.914l-.844-1.406A.281.281,0,0,0,34,44.372h-.808a.281.281,0,0,0,0,.562h.649l.506.844H22.963l.506-.844h.3a.281.281,0,1,0,0-.562H23.31a.281.281,0,0,0-.241.137l-.844,1.406a.281.281,0,0,0,.241.426H34.839a.281.281,0,0,0,.241-.426Z" transform="translate(-22.185 -44.372)" fill="#fff"/></g><g transform="translate(7.413 1.576)"><path d="M109.986,20.156a.281.281,0,0,0-.175-.126l-3.833-.9a.281.281,0,0,0-.338.21l-.289,1.236a.281.281,0,0,0,.548.128l.225-.962,3.286.769-.516,2.207a.281.281,0,0,0,.21.338.285.285,0,0,0,.064.007.281.281,0,0,0,.273-.217l.58-2.481A.28.28,0,0,0,109.986,20.156Z" transform="translate(-105.343 -19.126)" fill="#fff"/></g><g transform="translate(1.659 0.855)"><g transform="translate(0)"><path d="M41.014,12.789l-.256-2.167a.281.281,0,0,0-.312-.246l-4.7.556a.281.281,0,0,0-.246.312l.427,3.614a.281.281,0,0,0,.279.248l.033,0a.281.281,0,0,0,.246-.312l-.394-3.335,4.145-.49.223,1.888a.281.281,0,0,0,.559-.066Z" transform="translate(-35.494 -10.374)" fill="#fff"/></g></g><g transform="translate(3.76 2.7)"><path d="M66.64,35.306l-.558-2.321a.281.281,0,0,0-.339-.208l-4.53,1.089a.281.281,0,0,0-.208.339l.279,1.16a.281.281,0,1,0,.547-.131l-.213-.887L65.6,33.39l.492,2.047a.281.281,0,0,0,.547-.132Z" transform="translate(-60.997 -32.769)" fill="#fff"/></g><g transform="translate(0 5.062)"><path d="M28.856,61.708a.281.281,0,0,0-.281-.267H16.2a.281.281,0,0,0-.281.267l-.562,10.966a.281.281,0,0,0,.281.3h13.5a.281.281,0,0,0,.281-.3Zm-12.92,10.7L16.469,62H28.307l.534,10.4Z" transform="translate(-15.359 -61.441)" fill="#fff"/></g><g transform="translate(8.295 6.186)"><path d="M116.9,75.093a.844.844,0,1,0,.844.844A.844.844,0,0,0,116.9,75.093Zm0,1.125a.281.281,0,1,1,.281-.281A.281.281,0,0,1,116.9,76.218Z" transform="translate(-116.052 -75.093)" fill="#fff"/></g><g transform="translate(4.077 6.186)"><path d="M65.7,75.093a.844.844,0,1,0,.844.844A.844.844,0,0,0,65.7,75.093Zm0,1.125a.281.281,0,1,1,.281-.281A.281.281,0,0,1,65.7,76.218Z" transform="translate(-64.852 -75.093)" fill="#fff"/></g><g transform="translate(4.64 7.03)"><path d="M76.178,85.333h-.022a.281.281,0,0,0-.281.281.278.278,0,0,0,.022.108v1.438a1.828,1.828,0,0,1-3.656,0V85.614a.281.281,0,1,0-.562,0v1.547a2.39,2.39,0,0,0,4.78,0V85.614A.281.281,0,0,0,76.178,85.333Z" transform="translate(-71.679 -85.333)" fill="#fff"/></g></g><rect width="33" height="33" fill="none"/></svg>
                                </button>
                            </div>
                            <figure class="figure-product">
                                <img class="product-img figure-product__first" src="img/product_1.jpg" alt="Картинка товара">
                                <img class="product-img figure-product__second" src="img/category_1.JPG" alt="Картинка товара">
                            </figure>
                            <a class="fast-view" href="#">Быстрый просмотр</a>
                        </div>
                        <div class="product-cart__bottom">
                            <div class="product-cart__bottom__left">
                                <h4 class="product-title h4-style">Постельное бельё Stelvio</h4>
                                <div class="product-cart__bottom__left__links">
                                    <p class="price regular-fiveteen">BYN 40.00</p>
                                    <a class="view-product-link regular-fiveteen" href="#">Просмотреть продукт</a>
                                </div>
                                <ul class="product-color">
                                    <li class="product-color__item">
                                        <span class="color-select-circle color-red color-select"></span>
                                    </li>
                                    <li class="product-color__item">
                                        <span class="color-select-circle color-blue"></span>
                                    </li>
                                </ul>
                                <div class="additing-block-information">
                                    <p class="block-description regular-fiveteen">Здесь будут отображаться самые новые и продоваемые продаваемые товары и услуги. </p>
                                    <a class="stroke-button" href="#"><span>Добавить</span> <i>в</i> корзину</a>
                                </div>
                            </div>
                            <div class="product-cart__bottom__right">
                                <img class="add-like" src="img/Icon/Dark/Like.svg" alt="Like">
                            </div>

                        </div>
                    </div>
                </li>
               
                <li class="big-products__list__item">
                    <div class="product-cart">
                        <div class="product-cart__top">
                            <small class="new-icon">Новое</small>
                            <div class="product-cart__list-icon">
                                <button class="like-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"><g transform="translate(8.105 8.684)"><path d="M8.323,43.324a23.174,23.174,0,0,1-2.4-2.07C2.355,38.223,0,36.221,0,33.3a4.537,4.537,0,0,1,4.421-4.763c2.815,0,3.722,2.634,3.9,2.634s1.007-2.634,3.9-2.634A4.537,4.537,0,0,1,16.645,33.3c0,2.923-2.355,4.926-5.919,7.957A23.087,23.087,0,0,1,8.323,43.324Zm-3.9-13.815A3.549,3.549,0,0,0,.975,33.3c0,2.473,2.218,4.359,5.576,7.214C7.12,41,8.1,42.029,8.323,42.029s1.2-1.034,1.771-1.518c3.358-2.855,5.576-4.742,5.576-7.214a3.549,3.549,0,0,0-3.446-3.788c-1.774,0-3.024,1.59-3.431,3.056v0l-.939,0h0C7.493,31.271,6.326,29.509,4.421,29.509Z" transform="translate(0 -28.534)" fill="#fff"/></g><rect width="33" height="33" fill="none"/></svg>
                                </button>
                                <button class="cart-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"><g transform="translate(9.533 7.333)"><g transform="translate(5.045)"><path d="M80.944,2.05a2.39,2.39,0,0,0-4.3-1.068.281.281,0,1,0,.454.332,1.828,1.828,0,0,1,3.286.816.281.281,0,0,0,.278.242l.04,0A.281.281,0,0,0,80.944,2.05Z" transform="translate(-76.593)" fill="#fff"/></g><g transform="translate(0.562 3.655)"><path d="M35.08,45.914l-.844-1.406A.281.281,0,0,0,34,44.372h-.808a.281.281,0,0,0,0,.562h.649l.506.844H22.963l.506-.844h.3a.281.281,0,1,0,0-.562H23.31a.281.281,0,0,0-.241.137l-.844,1.406a.281.281,0,0,0,.241.426H34.839a.281.281,0,0,0,.241-.426Z" transform="translate(-22.185 -44.372)" fill="#fff"/></g><g transform="translate(7.413 1.576)"><path d="M109.986,20.156a.281.281,0,0,0-.175-.126l-3.833-.9a.281.281,0,0,0-.338.21l-.289,1.236a.281.281,0,0,0,.548.128l.225-.962,3.286.769-.516,2.207a.281.281,0,0,0,.21.338.285.285,0,0,0,.064.007.281.281,0,0,0,.273-.217l.58-2.481A.28.28,0,0,0,109.986,20.156Z" transform="translate(-105.343 -19.126)" fill="#fff"/></g><g transform="translate(1.659 0.855)"><g transform="translate(0)"><path d="M41.014,12.789l-.256-2.167a.281.281,0,0,0-.312-.246l-4.7.556a.281.281,0,0,0-.246.312l.427,3.614a.281.281,0,0,0,.279.248l.033,0a.281.281,0,0,0,.246-.312l-.394-3.335,4.145-.49.223,1.888a.281.281,0,0,0,.559-.066Z" transform="translate(-35.494 -10.374)" fill="#fff"/></g></g><g transform="translate(3.76 2.7)"><path d="M66.64,35.306l-.558-2.321a.281.281,0,0,0-.339-.208l-4.53,1.089a.281.281,0,0,0-.208.339l.279,1.16a.281.281,0,1,0,.547-.131l-.213-.887L65.6,33.39l.492,2.047a.281.281,0,0,0,.547-.132Z" transform="translate(-60.997 -32.769)" fill="#fff"/></g><g transform="translate(0 5.062)"><path d="M28.856,61.708a.281.281,0,0,0-.281-.267H16.2a.281.281,0,0,0-.281.267l-.562,10.966a.281.281,0,0,0,.281.3h13.5a.281.281,0,0,0,.281-.3Zm-12.92,10.7L16.469,62H28.307l.534,10.4Z" transform="translate(-15.359 -61.441)" fill="#fff"/></g><g transform="translate(8.295 6.186)"><path d="M116.9,75.093a.844.844,0,1,0,.844.844A.844.844,0,0,0,116.9,75.093Zm0,1.125a.281.281,0,1,1,.281-.281A.281.281,0,0,1,116.9,76.218Z" transform="translate(-116.052 -75.093)" fill="#fff"/></g><g transform="translate(4.077 6.186)"><path d="M65.7,75.093a.844.844,0,1,0,.844.844A.844.844,0,0,0,65.7,75.093Zm0,1.125a.281.281,0,1,1,.281-.281A.281.281,0,0,1,65.7,76.218Z" transform="translate(-64.852 -75.093)" fill="#fff"/></g><g transform="translate(4.64 7.03)"><path d="M76.178,85.333h-.022a.281.281,0,0,0-.281.281.278.278,0,0,0,.022.108v1.438a1.828,1.828,0,0,1-3.656,0V85.614a.281.281,0,1,0-.562,0v1.547a2.39,2.39,0,0,0,4.78,0V85.614A.281.281,0,0,0,76.178,85.333Z" transform="translate(-71.679 -85.333)" fill="#fff"/></g></g><rect width="33" height="33" fill="none"/></svg>
                                </button>
                            </div>
                            <figure class="figure-product">
                                <img class="product-img figure-product__first" src="img/product_1.jpg" alt="Картинка товара">
                                <img class="product-img figure-product__second" src="img/category_1.JPG" alt="Картинка товара">
                            </figure>
                            <a class="fast-view" href="#">Быстрый просмотр</a>
                        </div>
                        <div class="product-cart__bottom">
                            <div class="product-cart__bottom__left">
                                <h4 class="product-title h4-style">Постельное бельё Stelvio</h4>
                                <div class="product-cart__bottom__left__links">
                                    <p class="price regular-fiveteen">BYN 40.00</p>
                                    <a class="view-product-link regular-fiveteen" href="#">Просмотреть продукт</a>
                                </div>
                                <ul class="product-color">
                                    <li class="product-color__item">
                                        <span class="color-select-circle color-red color-select"></span>
                                    </li>
                                    <li class="product-color__item">
                                        <span class="color-select-circle color-blue"></span>
                                    </li>
                                </ul>
                                <div class="additing-block-information">
                                    <p class="block-description regular-fiveteen">Здесь будут отображаться самые новые и продоваемые продаваемые товары и услуги. </p>
                                    <a class="stroke-button" href="#"><span>Добавить</span> <i>в</i> корзину</a>
                                </div>
                            </div>
                            <div class="product-cart__bottom__right">
                                <img class="add-like" src="img/Icon/Dark/Like.svg" alt="Like">
                            </div>

                        </div>
                    </div>
                </li>

                <li class="big-products__list__item">
                    <div class="product-cart">
                        <div class="product-cart__top">
                            <small class="new-icon">Новое</small>
                            <div class="product-cart__list-icon">
                                <button class="like-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"><g transform="translate(8.105 8.684)"><path d="M8.323,43.324a23.174,23.174,0,0,1-2.4-2.07C2.355,38.223,0,36.221,0,33.3a4.537,4.537,0,0,1,4.421-4.763c2.815,0,3.722,2.634,3.9,2.634s1.007-2.634,3.9-2.634A4.537,4.537,0,0,1,16.645,33.3c0,2.923-2.355,4.926-5.919,7.957A23.087,23.087,0,0,1,8.323,43.324Zm-3.9-13.815A3.549,3.549,0,0,0,.975,33.3c0,2.473,2.218,4.359,5.576,7.214C7.12,41,8.1,42.029,8.323,42.029s1.2-1.034,1.771-1.518c3.358-2.855,5.576-4.742,5.576-7.214a3.549,3.549,0,0,0-3.446-3.788c-1.774,0-3.024,1.59-3.431,3.056v0l-.939,0h0C7.493,31.271,6.326,29.509,4.421,29.509Z" transform="translate(0 -28.534)" fill="#fff"/></g><rect width="33" height="33" fill="none"/></svg>
                                </button>
                                <button class="cart-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"><g transform="translate(9.533 7.333)"><g transform="translate(5.045)"><path d="M80.944,2.05a2.39,2.39,0,0,0-4.3-1.068.281.281,0,1,0,.454.332,1.828,1.828,0,0,1,3.286.816.281.281,0,0,0,.278.242l.04,0A.281.281,0,0,0,80.944,2.05Z" transform="translate(-76.593)" fill="#fff"/></g><g transform="translate(0.562 3.655)"><path d="M35.08,45.914l-.844-1.406A.281.281,0,0,0,34,44.372h-.808a.281.281,0,0,0,0,.562h.649l.506.844H22.963l.506-.844h.3a.281.281,0,1,0,0-.562H23.31a.281.281,0,0,0-.241.137l-.844,1.406a.281.281,0,0,0,.241.426H34.839a.281.281,0,0,0,.241-.426Z" transform="translate(-22.185 -44.372)" fill="#fff"/></g><g transform="translate(7.413 1.576)"><path d="M109.986,20.156a.281.281,0,0,0-.175-.126l-3.833-.9a.281.281,0,0,0-.338.21l-.289,1.236a.281.281,0,0,0,.548.128l.225-.962,3.286.769-.516,2.207a.281.281,0,0,0,.21.338.285.285,0,0,0,.064.007.281.281,0,0,0,.273-.217l.58-2.481A.28.28,0,0,0,109.986,20.156Z" transform="translate(-105.343 -19.126)" fill="#fff"/></g><g transform="translate(1.659 0.855)"><g transform="translate(0)"><path d="M41.014,12.789l-.256-2.167a.281.281,0,0,0-.312-.246l-4.7.556a.281.281,0,0,0-.246.312l.427,3.614a.281.281,0,0,0,.279.248l.033,0a.281.281,0,0,0,.246-.312l-.394-3.335,4.145-.49.223,1.888a.281.281,0,0,0,.559-.066Z" transform="translate(-35.494 -10.374)" fill="#fff"/></g></g><g transform="translate(3.76 2.7)"><path d="M66.64,35.306l-.558-2.321a.281.281,0,0,0-.339-.208l-4.53,1.089a.281.281,0,0,0-.208.339l.279,1.16a.281.281,0,1,0,.547-.131l-.213-.887L65.6,33.39l.492,2.047a.281.281,0,0,0,.547-.132Z" transform="translate(-60.997 -32.769)" fill="#fff"/></g><g transform="translate(0 5.062)"><path d="M28.856,61.708a.281.281,0,0,0-.281-.267H16.2a.281.281,0,0,0-.281.267l-.562,10.966a.281.281,0,0,0,.281.3h13.5a.281.281,0,0,0,.281-.3Zm-12.92,10.7L16.469,62H28.307l.534,10.4Z" transform="translate(-15.359 -61.441)" fill="#fff"/></g><g transform="translate(8.295 6.186)"><path d="M116.9,75.093a.844.844,0,1,0,.844.844A.844.844,0,0,0,116.9,75.093Zm0,1.125a.281.281,0,1,1,.281-.281A.281.281,0,0,1,116.9,76.218Z" transform="translate(-116.052 -75.093)" fill="#fff"/></g><g transform="translate(4.077 6.186)"><path d="M65.7,75.093a.844.844,0,1,0,.844.844A.844.844,0,0,0,65.7,75.093Zm0,1.125a.281.281,0,1,1,.281-.281A.281.281,0,0,1,65.7,76.218Z" transform="translate(-64.852 -75.093)" fill="#fff"/></g><g transform="translate(4.64 7.03)"><path d="M76.178,85.333h-.022a.281.281,0,0,0-.281.281.278.278,0,0,0,.022.108v1.438a1.828,1.828,0,0,1-3.656,0V85.614a.281.281,0,1,0-.562,0v1.547a2.39,2.39,0,0,0,4.78,0V85.614A.281.281,0,0,0,76.178,85.333Z" transform="translate(-71.679 -85.333)" fill="#fff"/></g></g><rect width="33" height="33" fill="none"/></svg>
                                </button>
                            </div>
                            <figure class="figure-product">
                                <img class="product-img figure-product__first" src="img/product_1.jpg" alt="Картинка товара">
                                <img class="product-img figure-product__second" src="img/category_1.JPG" alt="Картинка товара">
                            </figure>
                            <a class="fast-view" href="#">Быстрый просмотр</a>
                        </div>
                        <div class="product-cart__bottom">
                            <div class="product-cart__bottom__left">
                                <h4 class="product-title h4-style">Постельное бельё Stelvio</h4>
                                <div class="product-cart__bottom__left__links">
                                    <p class="price regular-fiveteen">BYN 40.00</p>
                                    <a class="view-product-link regular-fiveteen" href="#">Просмотреть продукт</a>
                                </div>
                                <ul class="product-color">
                                    <li class="product-color__item">
                                        <span class="color-select-circle color-red color-select"></span>
                                    </li>
                                    <li class="product-color__item">
                                        <span class="color-select-circle color-blue"></span>
                                    </li>
                                </ul>
                                <div class="additing-block-information">
                                    <p class="block-description regular-fiveteen">Здесь будут отображаться самые новые и продоваемые продаваемые товары и услуги. </p>
                                    <a class="stroke-button" href="#"><span>Добавить</span> <i>в</i> корзину</a>
                                </div>
                            </div>
                            <div class="product-cart__bottom__right">
                                <img class="add-like" src="img/Icon/Dark/Like.svg" alt="Like">
                            </div>

                        </div>
                    </div>
                </li>
               <!-- Big Products Item -->
            </ul>
            <div class="paggination footer-marg">
                <a class="page-prev page-arrow prev-no">
                    <svg xmlns="http://www.w3.org/2000/svg" width="9.534" height="17.316" viewBox="0 0 9.534 17.316"><g transform="translate(63.647 17.316) rotate(180)"><path d="M63.394,8.04,55.607.256a.874.874,0,0,0-1.238,1.235l7.169,7.167L54.37,15.824a.875.875,0,1,0,1.238,1.236l7.787-7.784A.882.882,0,0,0,63.394,8.04Z"/></g></svg>
                </a>
                <ul class="paggination__list">
                    <li class="paggination__list__item active-page"><a href="#">1</a></li>
                    <li class="paggination__list__item"><a href="#">2</a></li>
                    <li class="paggination__list__item"><a href="#">3</a></li>
                    <li class="paggination__list__item"><a href="#">4</a></li>
                </ul>
                <a class="page-next page-arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="9.534" height="17.316" viewBox="0 0 9.534 17.316"><g transform="translate(-54.113)"><path d="M63.394,8.04,55.607.256a.874.874,0,0,0-1.238,1.235l7.169,7.167L54.37,15.824a.875.875,0,1,0,1.238,1.236l7.787-7.784A.882.882,0,0,0,63.394,8.04Z"/></g></svg>
                </a>
            </div>
         </div>
      </section>

    <!-- Main -->
    </main>


<?php get_footer(); ?>