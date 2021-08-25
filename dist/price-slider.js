/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./frontend/price-slider/blueins-get_posts.js":
/*!****************************************************!*\
  !*** ./frontend/price-slider/blueins-get_posts.js ***!
  \****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"blueins_get_posts\": () => (/* binding */ blueins_get_posts)\n/* harmony export */ });\n/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils */ \"./frontend/utils.js\");\n/* harmony import */ var _price_slider__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./price-slider */ \"./frontend/price-slider/price-slider.js\");\n\r\n\r\n\r\n\r\n\r\nfunction blueins_get_posts(){\r\n    // Consts\r\n    const $product_container = document.querySelector('#products__list-container')\r\n    const $preloader = preloader()\r\n\r\n    // Prepare Data\r\n    const ajax_url = woocommerce_params.ajax_url;\r\n    let category_id = _price_slider__WEBPACK_IMPORTED_MODULE_1__._.blueins_get_category()\r\n    let min = Number( _price_slider__WEBPACK_IMPORTED_MODULE_1__._.blueins_get_min() )\r\n    let max = Number( _price_slider__WEBPACK_IMPORTED_MODULE_1__._.blueins_get_max() )\r\n    let order = String( _price_slider__WEBPACK_IMPORTED_MODULE_1__._.blueins_get_order() )\r\n    let taxonomy = blu_loadmore_param.taxonomy ? String( blu_loadmore_param.taxonomy ) : 0\r\n    \r\n\r\n    ;(0,_utils__WEBPACK_IMPORTED_MODULE_0__.sendRequest)( {\r\n        method: 'GET',\r\n        url: ajax_url,\r\n        action: 'loadmore',\r\n        data: {\r\n            category: category_id,\r\n            min,\r\n            max,\r\n            order,\r\n            taxonomyID: taxonomy\r\n        },\r\n        onloadstart_callback(){\r\n            _price_slider__WEBPACK_IMPORTED_MODULE_1__.activeFilters.add(category_id, min, max)\r\n\r\n            $preloader.show()\r\n\r\n            let filter = document.querySelector('#blueins-filters-block')\r\n            let header = document.querySelector('#header__bottom-cover')\r\n\r\n            let filterBCR = filter.getBoundingClientRect()\r\n            let headerBCR = header.getBoundingClientRect()\r\n\r\n            header.classList.add('header__bottom-fixed')\r\n            $('html, body').animate({\r\n                scrollTop: window.pageYOffset + filterBCR.y - headerBCR.height\r\n            }, 1000);\r\n        }\r\n    } )\r\n    .then( resolve => {\r\n        // *************************** Then Block\r\n        $product_container.innerHTML = resolve\r\n        \r\n        $preloader.hide()\r\n\r\n        blu_loadmore_param.current_page = 1\r\n        let regx = /big-products__list__item/g\r\n        let post_count = resolve.match(regx)\r\n        let posts_per_page = Number(blu_loadmore_param.posts_per_page)\r\n        if ( blu_loadmore_param.current_page == blu_loadmore_param.max_page || post_count.length < posts_per_page ){\r\n            document.querySelector('#blueins-load_more').classList.add('blueins-load_more__hidden');\r\n        }else{\r\n            document.querySelector('#blueins-load_more').classList.remove('blueins-load_more__hidden');\r\n        }\r\n        // *************************** Then Block\r\n    } )\r\n    .catch( reject => {\r\n        // *************************** Catch Block\r\n        $product_container.innerHTML = `\r\n            <div class=\"products__list__img-error\"><img src=\"${blu_loadmore_param.theme_url}/assets/img/Robot.svg\" width=\"500px\" height=\"500px\"></div>\r\n        `\r\n        // *************************** Catch Block\r\n    } )\r\n\r\n}\r\n\r\n\r\n\r\nfunction preloader(){\r\n    let $products = document.querySelector('.products')\r\n    let template = `\r\n        <div class=\"preloader\">\r\n            <svg version=\"1.1\" id=\"L5\" width=\"60px\" height=\"60px\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n                viewBox=\"0 0 100 100\" enable-background=\"new 0 0 0 0\" xml:space=\"preserve\">\r\n                <circle fill=\"#17191A\" stroke=\"none\" cx=\"6\" cy=\"50\" r=\"6\">\r\n                <animateTransform \r\n                    attributeName=\"transform\" \r\n                    dur=\"1s\" \r\n                    type=\"translate\" \r\n                    values=\"0 15 ; 0 -15; 0 15\" \r\n                    repeatCount=\"indefinite\" \r\n                    begin=\"0.1\"/>\r\n                </circle>\r\n                <circle fill=\"#17191A\" stroke=\"none\" cx=\"30\" cy=\"50\" r=\"6\">\r\n                <animateTransform \r\n                    attributeName=\"transform\" \r\n                    dur=\"1s\" \r\n                    type=\"translate\" \r\n                    values=\"0 10 ; 0 -10; 0 10\" \r\n                    repeatCount=\"indefinite\" \r\n                    begin=\"0.2\"/>\r\n                </circle>\r\n                <circle fill=\"#17191A\" stroke=\"none\" cx=\"54\" cy=\"50\" r=\"6\">\r\n                <animateTransform \r\n                    attributeName=\"transform\" \r\n                    dur=\"1s\" \r\n                    type=\"translate\" \r\n                    values=\"0 5 ; 0 -5; 0 5\" \r\n                    repeatCount=\"indefinite\" \r\n                    begin=\"0.3\"/>\r\n                </circle>\r\n            </svg>\r\n        </div>\r\n    `\r\n    return {\r\n        show(){\r\n            $products.insertAdjacentHTML('afterbegin', template)\r\n        },\r\n        hide(){\r\n            $products.querySelector('.preloader').remove()\r\n        }\r\n    }\r\n}\n\n//# sourceURL=webpack:///./frontend/price-slider/blueins-get_posts.js?");

/***/ }),

/***/ "./frontend/price-slider/blueins-loadmore.js":
/*!***************************************************!*\
  !*** ./frontend/price-slider/blueins-loadmore.js ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"blueins_more_posts_loadmore\": () => (/* binding */ blueins_more_posts_loadmore)\n/* harmony export */ });\n/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils */ \"./frontend/utils.js\");\n/* harmony import */ var _price_slider__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./price-slider */ \"./frontend/price-slider/price-slider.js\");\n  \r\n\r\n\r\n\r\n\r\n/*****  Load More  *****/\r\nfunction blueins_more_posts_loadmore(){\r\n     // Consts\r\n     const $product_container = document.querySelector('#products__list-container')\r\n     const $preloader = preloader()\r\n     const $load_more = document.querySelector('#blueins-load_more')\r\n    \r\n     // Prepare Data\r\n    const ajax_url = woocommerce_params.ajax_url\r\n    let page = blu_loadmore_param.current_page\r\n    let category_id = _price_slider__WEBPACK_IMPORTED_MODULE_1__._.blueins_get_category()\r\n    let min = String( _price_slider__WEBPACK_IMPORTED_MODULE_1__._.blueins_get_min() )\r\n    let max = String( _price_slider__WEBPACK_IMPORTED_MODULE_1__._.blueins_get_max() )\r\n    let order = String( _price_slider__WEBPACK_IMPORTED_MODULE_1__._.blueins_get_order() )\r\n    let taxonomy = blu_loadmore_param.taxonomy ? String( blu_loadmore_param.taxonomy ) : 0\r\n\r\n\r\n    ;(0,_utils__WEBPACK_IMPORTED_MODULE_0__.sendRequest)( {\r\n        method: 'GET',\r\n        url: ajax_url,\r\n        action: 'loadmore',\r\n        data: {\r\n            paged: page,\r\n            category: category_id,\r\n            min,\r\n            max,\r\n            order,\r\n            taxonomyID: taxonomy\r\n        },\r\n        onloadstart_callback(){\r\n            $preloader.show()\r\n        }\r\n    } )\r\n    .then( resolve => {\r\n        // *************************** Then Block\r\n        if( resolve ) {\r\n            $preloader.hide()\r\n\r\n            blu_loadmore_param.current_page++;\r\n            $product_container.insertAdjacentHTML('beforeend', resolve)\r\n\r\n            if ( blu_loadmore_param.current_page == blu_loadmore_param.max_page ){\r\n                $load_more.classList.add('blueins-load_more__hidden');\r\n            } \r\n        } else {\r\n            $load_more.classList.add('blueins-load_more__hidden');\r\n        }\r\n        // *************************** Then Block\r\n    } )\r\n    .catch( reject => {\r\n        // *************************** Catch Block\r\n        $product_container.innerHTML = `\r\n            <div class=\"products__list__img-error\"><img src=\"${blu_loadmore_param.theme_url}/assets/img/Robot.svg\" width=\"500px\" height=\"500px\"></div>\r\n        `\r\n        // *************************** Catch Block\r\n    } )\r\n\r\n}\r\n\r\n\r\n\r\nfunction preloader(){\r\n    let $loadMore = document.querySelector('#blueins-load_more')\r\n    let template = `\r\n                <div class=\"button-preloader\">\r\n                    <svg version=\"1.1\" id=\"L5\" width=\"60px\" height=\"60px\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n                        viewBox=\"0 0 100 100\" enable-background=\"new 0 0 0 0\" xml:space=\"preserve\">\r\n                        <circle fill=\"#17191A\" stroke=\"none\" cx=\"6\" cy=\"50\" r=\"6\">\r\n                        <animateTransform \r\n                            attributeName=\"transform\" \r\n                            dur=\"1s\" \r\n                            type=\"translate\" \r\n                            values=\"0 15 ; 0 -15; 0 15\" \r\n                            repeatCount=\"indefinite\" \r\n                            begin=\"0.1\"/>\r\n                        </circle>\r\n                        <circle fill=\"#17191A\" stroke=\"none\" cx=\"30\" cy=\"50\" r=\"6\">\r\n                        <animateTransform \r\n                            attributeName=\"transform\" \r\n                            dur=\"1s\" \r\n                            type=\"translate\" \r\n                            values=\"0 10 ; 0 -10; 0 10\" \r\n                            repeatCount=\"indefinite\" \r\n                            begin=\"0.2\"/>\r\n                        </circle>\r\n                        <circle fill=\"#17191A\" stroke=\"none\" cx=\"54\" cy=\"50\" r=\"6\">\r\n                        <animateTransform \r\n                            attributeName=\"transform\" \r\n                            dur=\"1s\" \r\n                            type=\"translate\" \r\n                            values=\"0 5 ; 0 -5; 0 5\" \r\n                            repeatCount=\"indefinite\" \r\n                            begin=\"0.3\"/>\r\n                        </circle>\r\n                    </svg>\r\n                </div>\r\n    `\r\n    return {\r\n        show(){\r\n            $loadMore.insertAdjacentHTML('beforebegin', template)\r\n            ;(0,_utils__WEBPACK_IMPORTED_MODULE_0__.css)($loadMore, {\r\n                display: 'none'\r\n            })\r\n        },\r\n        hide(){\r\n            $loadMore.parentNode.querySelector('.button-preloader').remove()\r\n            ;(0,_utils__WEBPACK_IMPORTED_MODULE_0__.css)($loadMore, {\r\n                display: 'block'\r\n            })\r\n        }\r\n    }\r\n}\n\n//# sourceURL=webpack:///./frontend/price-slider/blueins-loadmore.js?");

/***/ }),

/***/ "./frontend/price-slider/class/blueins-active_filters-class.js":
/*!*********************************************************************!*\
  !*** ./frontend/price-slider/class/blueins-active_filters-class.js ***!
  \*********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"Active_Filters\": () => (/* binding */ Active_Filters)\n/* harmony export */ });\n/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../utils */ \"./frontend/utils.js\");\n/* harmony import */ var _blueins_get_posts__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../blueins-get_posts */ \"./frontend/price-slider/blueins-get_posts.js\");\n\r\n\r\n\r\nclass Active_Filters{\r\n    $filter = document.querySelector('#prod-filter-menu')\r\n\r\n    constructor( object ){\r\n        this.list = this.create_AF()\r\n        this.sliderEl1 = object.priceSlider\r\n    }\r\n\r\n    create_AF(){\r\n        let filterList = this.$filter.querySelector('.customs__list')\r\n        let template = `\r\n            <li id=\"activeFilters\" style=\"display: none;\" class=\"customs__list__item\">\r\n                <div class=\"customs__list__item__title\">\r\n                    <h6 class=\"groupe-cust-title\">Активные фильтры</h6>\r\n                </div>\r\n                <div class=\"item__nav\">\r\n                    <ul class=\"product-categories-active ul-selected-active\"></ul>\r\n                </div>\r\n            </li>\r\n        `\r\n        filterList.insertAdjacentHTML('afterbegin', template)\r\n        return this.$filter.querySelector('.product-categories-active')\r\n    }\r\n\r\n    add(categorys_id, min, max){\r\n        let $activeFilters = this.$filter.querySelector('#activeFilters')\r\n        if(categorys_id.length == 0 && min == this.sliderEl1.publickMinPrice && max == this.sliderEl1.publickMaxPrice){\r\n            (0,_utils__WEBPACK_IMPORTED_MODULE_0__.css)($activeFilters,{\r\n                display: 'none'\r\n            })\r\n        }else{\r\n            (0,_utils__WEBPACK_IMPORTED_MODULE_0__.css)($activeFilters,{\r\n                display: 'block'\r\n            })\r\n        }\r\n\r\n        let activeCat = categorys_id.map( item => {\r\n            let obj = this.$filter.querySelector(`.cat-item-${item}`)\r\n            return obj.innerHTML\r\n        } )\r\n    \r\n        let template = activeCat.map( (item, index)=> `<li data-cat-id=\"${categorys_id[index]}\" class=\"cat-item-active cart-item-selected-active\">${item}</li>`)\r\n\r\n        if( min != this.sliderEl1.publickMinPrice ){\r\n            template.push(`<li data-cat-min=\"${min}\" class=\"cat-item-active cart-item-selected-active\"><a href=\"#\">Мин: ${min}</a></li>`)   \r\n        }\r\n        if( max != this.sliderEl1.publickMaxPrice ){\r\n            template.push(`<li data-cat-max=\"${max}\" class=\"cat-item-active cart-item-selected-active\"><a href=\"#\">Макс: ${max}</a></li>`)\r\n        }\r\n\r\n        template.push(`<li data-remove-all class=\"cat-item-active cart-item-selected-active cart-item-remove-all\"><a href=\"#\">Очистить фильтры</a></li>`)\r\n        this.list.innerHTML = template.join('');\r\n    \r\n        this.list.querySelectorAll('.cat-item-active').forEach( item => item.addEventListener( 'click', this.remove.bind(this) ) )\r\n    }\r\n\r\n    remove(e){\r\n        e.preventDefault();\r\n\r\n        if( e.target.parentNode.hasAttribute('data-cat-id') ){\r\n            let removeClassFrom = document.querySelector(`.cat-item-${e.target.parentNode.getAttribute('data-cat-id')}`)\r\n            removeClassFrom.classList.remove('cart-item-selected')\r\n            removeClassFrom.parentNode.classList.remove('ul-selected')\r\n        }\r\n        if( e.target.parentNode.hasAttribute('data-cat-min') ){\r\n            this.sliderEl1.cahngeMinPosition( this.sliderEl1.publickMinPrice )\r\n        }\r\n        if( e.target.parentNode.hasAttribute('data-cat-max') ){\r\n            this.sliderEl1.cahngeMaxPosition( this.sliderEl1.publickMaxPrice )\r\n        }\r\n        if( e.target.parentNode.hasAttribute('data-remove-all') ){\r\n\r\n            for( let node of this.list.children ){\r\n                if( node.hasAttribute('data-cat-id') ){\r\n                    let removeClassFrom = document.querySelector(`.cat-item-${node.getAttribute('data-cat-id')}`)\r\n                    removeClassFrom.classList.remove('cart-item-selected')\r\n                    removeClassFrom.parentNode.classList.remove('ul-selected')\r\n                }\r\n                if( node.hasAttribute('data-cat-min') ){\r\n                    this.sliderEl1.cahngeMinPosition( this.sliderEl1.publickMinPrice )\r\n                }\r\n                if( node.hasAttribute('data-cat-max') ){\r\n                    this.sliderEl1.cahngeMaxPosition( this.sliderEl1.publickMaxPrice )\r\n                }\r\n            }\r\n\r\n        }\r\n\r\n        (0,_blueins_get_posts__WEBPACK_IMPORTED_MODULE_1__.blueins_get_posts)()\r\n    }\r\n}\n\n//# sourceURL=webpack:///./frontend/price-slider/class/blueins-active_filters-class.js?");

/***/ }),

/***/ "./frontend/price-slider/class/blueins-slider-class.js":
/*!*************************************************************!*\
  !*** ./frontend/price-slider/class/blueins-slider-class.js ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"Slider\": () => (/* binding */ Slider)\n/* harmony export */ });\n/* harmony import */ var _blueins_get_posts__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../blueins-get_posts */ \"./frontend/price-slider/blueins-get_posts.js\");\n\r\n\r\nclass Slider{\r\n\r\n    _eventHandlers = {}\r\n\r\n    constructor(option){\r\n        this.container = this.createSlider(option.container)\r\n\r\n        this.elem = this.container.querySelector('.noUi-base');\r\n        this.thumbLower = this.elem.querySelector(option.thumbLower);\r\n        this.thumbUpper = this.elem.querySelector(option.thumbUpper);\r\n        this.min = Number(option.min);\r\n        this.max = Number(option.max) + 5;\r\n        this.idContainerMin = option.idContainerMin;\r\n        this.idContainerMax = option.idContainerMax;\r\n\r\n        this.minPrice;\r\n        this.maxPrice;\r\n\r\n        this.publickMinPrice;\r\n        this.publickMaxPrice;\r\n\r\n        this.initElem();\r\n\r\n        this.nowUsing;\r\n        this.sliderCoords;\r\n        this.thumbCoords;\r\n        this.shiftXLower;\r\n        this.lowerX;\r\n        this.shiftXUpper;\r\n        this.upperX;\r\n\r\n        this.elem.ondragstart = () => {\r\n            return false;\r\n        }\r\n\r\n        this.elem.onmousedown = event => {this.startEvent(event, option)}\r\n        this.elem.ontouchstart = event => {this.startEvent(event, option)}\r\n    }\r\n\r\n    createSlider(container){\r\n        let div = `\r\n            <div class=\"noUi-base\">\r\n                <div class=\"noUi-origin\">\r\n                    <div class=\"noUi-handle noUi-handle-lower\"></div>\r\n                </div>\r\n                <div class=\"noUi-origin\">\r\n                    <div class=\"noUi-handle noUi-handle-upper\"></div>\r\n                </div>\r\n            </div>\r\n        `;\r\n    \r\n        container.insertAdjacentHTML('afterbegin', div);\r\n        return container\r\n    }\r\n\r\n    startEvent(event, option){\r\n        if( event.target.closest(option.thumbLower) ){\r\n            this.nowUsing = this.thumbLower;\r\n            if(event.type == 'touchstart') this.startDrag(event.changedTouches[0].clientX, event.changedTouches[0].clientY, event.type);\r\n            if(event.type == 'mousedown') this.startDrag(event.clientX, event.clientY, event.type);\r\n            return false;\r\n        }else if(event.target.closest(option.thumbUpper)){\r\n            this.nowUsing = this.thumbUpper;\r\n            if(event.type == 'touchstart') this.startDrag(event.changedTouches[0].clientX, event.changedTouches[0].clientY, event.type)\r\n            if(event.type == 'mousedown') this.startDrag(event.clientX, event.clientY, event.type);\r\n            return false;\r\n        }\r\n    }\r\n\r\n    initElem(){\r\n        this.thumbLower.parentNode.style.left = '0%';\r\n        this.thumbUpper.parentNode.style.left = '97%';\r\n\r\n        let percentMin = 0\r\n        let percentMax = 97\r\n        this.minPrice = Math.round( this.min + ( ( (this.max - this.min) / 100) * percentMin ), 1 );\r\n        this.maxPrice = Math.round( this.min + ( ( (this.max - this.min) / 100) * percentMax ), 1 );\r\n        this.publickMinPrice = Math.round( this.min + ( ( (this.max - this.min) / 100) * percentMin ), 1 );\r\n        this.publickMaxPrice = Math.round( this.min + ( ( (this.max - this.min) / 100) * percentMax ), 1 );\r\n\r\n        let inputMin = document.querySelector(`#${this.idContainerMin}`);\r\n        let inputMax = document.querySelector(`#${this.idContainerMax}`);\r\n        inputMin.innerHTML = 'Br ' + this.minPrice;\r\n        inputMax.innerHTML = 'Br ' + this.maxPrice;\r\n    }\r\n\r\n    startDrag(startClientX, startClientY, eventType) {\r\n        this.thumbCoords = this.nowUsing.getBoundingClientRect();\r\n        if( this.nowUsing === this.thumbLower){\r\n            this.shiftXLower = startClientX - this.thumbCoords.left;\r\n        }\r\n        if( this.nowUsing === this.thumbUpper){\r\n            this.shiftXUpper = startClientX - this.thumbCoords.left;\r\n        }\r\n        this.sliderCoords = this.elem.getBoundingClientRect();\r\n        //console.log(eventType);\r\n        if(eventType == 'touchstart'){\r\n            this.addListener(document, 'touchmove', this.onDocumentMouseMove.bind(this), false);\r\n            this.addListener(document, 'touchend', this.onDocumentMouseUp.bind(this), false);\r\n        }\r\n        if(eventType == 'mousedown'){\r\n            this.addListener(document, 'mousemove', this.onDocumentMouseMove.bind(this), false);\r\n            this.addListener(document, 'mouseup', this.onDocumentMouseUp.bind(this), false);\r\n        }\r\n    }\r\n\r\n    moveTo(clientX) {\r\n        let rightEdge = this.elem.offsetWidth - this.nowUsing.offsetWidth;\r\n        let newLeftLower = clientX - this.shiftXLower - this.sliderCoords.left;\r\n        let newLeftUpper = clientX - this.shiftXUpper - this.sliderCoords.left;\r\n\r\n        if(newLeftLower < 0) {\r\n            newLeftLower = 0;\r\n        }\r\n        if( newLeftLower > this.upperX ){\r\n            newLeftLower = this.upperX-5;\r\n        }\r\n\r\n        if (newLeftUpper > rightEdge) {\r\n            newLeftUpper = rightEdge;\r\n        }\r\n        if(newLeftUpper < this.lowerX){\r\n            newLeftUpper = this.lowerX+5;\r\n        }\r\n\r\n        if( this.nowUsing === this.thumbLower ){\r\n            let percent = Math.round( this.lowerX / ( this.sliderCoords.width / 100 ), 1 );\r\n            this.lowerX = newLeftLower;\r\n            this.minPrice = Math.round( this.min + ( ( (this.max - this.min) / 100) * percent ), 1 );\r\n            this.nowUsing.parentNode.style.left = percent + '%';\r\n\r\n            this.changeInputs();\r\n        }\r\n        if( this.nowUsing === this.thumbUpper ){\r\n            let percent = Math.round( this.upperX / ( this.sliderCoords.width / 100 ), 1 );\r\n            this.upperX = newLeftUpper;\r\n            this.maxPrice = Math.round( this.min + ( ( (this.max - this.min) / 100) * percent ), 1 );\r\n            this.nowUsing.parentNode.style.left = percent + '%';\r\n\r\n            this.changeInputs();\r\n        }\r\n    }\r\n\r\n    endDrag(e) {\r\n        //console.log(e.type)\r\n        if(e.type == 'touchend'){\r\n            this.removeAllListeners(document, 'touchmove');\r\n            this.removeAllListeners(document, 'touchend');\r\n        }\r\n        if(e.type == 'mouseup'){\r\n            this.removeAllListeners(document, 'mousemove');\r\n            this.removeAllListeners(document, 'mouseup');\r\n        }\r\n        \r\n    }\r\n\r\n    onDocumentMouseMove(e) {\r\n        if(e.type == 'touchmove'){\r\n            this.moveTo(e.changedTouches[0].clientX);\r\n        }\r\n        if(e.type == 'mousemove'){\r\n            this.moveTo(e.clientX);\r\n        }\r\n    }\r\n\r\n    onDocumentMouseUp(e) {\r\n        this.endDrag(e);\r\n        (0,_blueins_get_posts__WEBPACK_IMPORTED_MODULE_0__.blueins_get_posts)();\r\n    }\r\n\r\n    changeInputs(){\r\n        let minPr, maxPr;\r\n\r\n        if(this.minPrice == undefined) minPr = this.min;\r\n        else minPr = this.minPrice\r\n        if(this.maxPrice == undefined) maxPr = this.max - 5;\r\n        else maxPr = this.maxPrice\r\n\r\n        let inputMin = document.querySelector(`#${this.idContainerMin}`);\r\n        let inputMax = document.querySelector(`#${this.idContainerMax}`);\r\n        inputMin.innerHTML = 'Br ' + minPr;\r\n        inputMax.innerHTML = 'Br ' + maxPr;\r\n    }\r\n\r\n    cahngeMinPosition(positionMin){\r\n        this.minPrice = positionMin\r\n        this.nowUsing = undefined\r\n        this.sliderCoords = undefined\r\n        this.thumbCoords = undefined\r\n        this.shiftXLower = undefined\r\n        this.lowerX = undefined\r\n        this.thumbLower.parentNode.style.left = '0%';\r\n        this.changeInputs()\r\n    }\r\n\r\n    cahngeMaxPosition(positionMax){\r\n        this.maxPrice = positionMax\r\n        this.nowUsing = undefined\r\n        this.sliderCoords = undefined\r\n        this.thumbCoords = undefined\r\n        this.shiftXUpper = undefined\r\n        this.upperX = undefined\r\n        this.thumbUpper.parentNode.style.left = '97%';\r\n        this.changeInputs()\r\n    }\r\n\r\n    // Suplement Funstion\r\n    addListener(node, event, handler, capture) {\r\n        if( !(node in this._eventHandlers) ) {\r\n            this._eventHandlers[node] = {};\r\n        }\r\n        if( !(event in this._eventHandlers[node] )) {\r\n            this._eventHandlers[node][event] = [];\r\n        }\r\n        this._eventHandlers[node][event].push([handler, capture]);\r\n        node.addEventListener(event, handler, capture);\r\n    }\r\n\r\n    removeAllListeners(node, event) {\r\n        if(node in this._eventHandlers) {\r\n            var handlers = this._eventHandlers[node];\r\n            if(event in handlers) {\r\n                var eventHandlers = handlers[event];\r\n                for(var i = eventHandlers.length; i--;) {\r\n                    var handler = eventHandlers[i];\r\n                    node.removeEventListener(event, handler[0], handler[1]);\r\n                }\r\n            }\r\n        }\r\n    }\r\n}\n\n//# sourceURL=webpack:///./frontend/price-slider/class/blueins-slider-class.js?");

/***/ }),

/***/ "./frontend/price-slider/price-slider.js":
/*!***********************************************!*\
  !*** ./frontend/price-slider/price-slider.js ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"sliderEl1\": () => (/* binding */ sliderEl1),\n/* harmony export */   \"activeFilters\": () => (/* binding */ activeFilters),\n/* harmony export */   \"_\": () => (/* binding */ _)\n/* harmony export */ });\n/* harmony import */ var _class_blueins_slider_class__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./class/blueins-slider-class */ \"./frontend/price-slider/class/blueins-slider-class.js\");\n/* harmony import */ var _blueins_get_posts__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./blueins-get_posts */ \"./frontend/price-slider/blueins-get_posts.js\");\n/* harmony import */ var _blueins_loadmore__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./blueins-loadmore */ \"./frontend/price-slider/blueins-loadmore.js\");\n/* harmony import */ var _class_blueins_active_filters_class__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./class/blueins-active_filters-class */ \"./frontend/price-slider/class/blueins-active_filters-class.js\");\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n/*****  Price Slider HTML  *****/\r\nconst sliderEl1 = new _class_blueins_slider_class__WEBPACK_IMPORTED_MODULE_0__.Slider({\r\n    container: document.querySelector('.el-price-slider_container'),\r\n    thumbLower: '.noUi-handle-lower',\r\n    thumbUpper: '.noUi-handle-upper',\r\n    min: document.querySelector('#min_price').value,\r\n    max: Number( document.querySelector('#max_price').value ) + 30,\r\n    idContainerMin: 'el-slider-min',\r\n    idContainerMax: 'el-slider-max'\r\n});\r\n\r\n\r\n\r\n/*****  Active Filters HTML  *****/\r\nconst activeFilters = new _class_blueins_active_filters_class__WEBPACK_IMPORTED_MODULE_3__.Active_Filters({\r\n    priceSlider: sliderEl1\r\n})\r\n\r\n\r\n\r\n/*****  Filter Get Min & Max Price  *****/\r\nfunction blueins_get_min(){\r\n    let min = document.querySelector('#el-slider-min').innerHTML;\r\n    let reg = /\\d+/;\r\n    return min.match(reg)[0]\r\n}\r\nfunction blueins_get_max(){\r\n    let max = document.querySelector('#el-slider-max').innerHTML;\r\n    let reg = /\\d+/;\r\n    return max.match(reg)[0]\r\n}\r\n\r\n\r\n\r\n/*****  Filter by catogory  *****/\r\nfunction blueins_category(){\r\n    let prodFilter = document.querySelector('#prod-filter-menu');\r\n    let cartItem = prodFilter.querySelectorAll('.cat-item a');\r\n\r\n    cartItem.forEach( item => item.addEventListener('click', (event) => {\r\n        event.preventDefault();\r\n        event.target.parentNode.classList.toggle('cart-item-selected')\r\n        event.target.parentNode.parentNode.classList.toggle('ul-selected')\r\n        ;(0,_blueins_get_posts__WEBPACK_IMPORTED_MODULE_1__.blueins_get_posts)();\r\n    } ))\r\n}\r\n\r\nblueins_category();\r\n\r\nfunction blueins_get_category(){\r\n    let prodFilter = document.querySelector('#prod-filter-menu');\r\n    let cartItem = prodFilter.querySelectorAll('.cat-item');\r\n    let data = [];\r\n\r\n    cartItem.forEach(item => {\r\n        if( item.classList.contains('cart-item-selected') ){\r\n            let r = /\\d+/;\r\n            let s = item.className;\r\n            data.push( s.match(r)[0] );\r\n        }\r\n    });\r\n    \r\n    return data;\r\n}\r\n\r\n\r\n\r\n\r\n/*****  Filter by Order  *****/\r\nfunction blueins_order(){\r\n    let orderButton = document.querySelector('.select-items')\r\n    orderButton.querySelectorAll('div').forEach(node => {\r\n        node.addEventListener('click', _blueins_get_posts__WEBPACK_IMPORTED_MODULE_1__.blueins_get_posts)\r\n    })\r\n}\r\n\r\nblueins_order()\r\n\r\nfunction blueins_get_order(){\r\n    let orderby = document.querySelector('.orderby');\r\n    for(let i = 0; i <= orderby.children.length; i++){\r\n        if(orderby.children[i].attributes.selected) return orderby.children[i].attributes.value.nodeValue;\r\n    }\r\n}\r\n\r\n\r\n\r\n/*****  Load More Button  *****/\r\nfunction blueins_load_more(){\r\n    let laodMoreButton = document.querySelector('#blueins-load_more')\r\n    if( !laodMoreButton ) return\r\n    laodMoreButton.addEventListener('click', e => {\r\n        e.preventDefault();\r\n        (0,_blueins_loadmore__WEBPACK_IMPORTED_MODULE_2__.blueins_more_posts_loadmore)()\r\n    })\r\n}\r\n\r\nblueins_load_more()\r\n\r\n\r\n\r\nconst _ = {\r\n    blueins_get_min,\r\n    blueins_get_max,\r\n    blueins_get_category,\r\n    blueins_get_order,\r\n}\n\n//# sourceURL=webpack:///./frontend/price-slider/price-slider.js?");

/***/ }),

/***/ "./frontend/utils.js":
/*!***************************!*\
  !*** ./frontend/utils.js ***!
  \***************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"mutation_observe\": () => (/* binding */ mutation_observe),\n/* harmony export */   \"sendRequest\": () => (/* binding */ sendRequest),\n/* harmony export */   \"css\": () => (/* binding */ css)\n/* harmony export */ });\nfunction mutation_observe( $element, callback, settings = {\r\n    attributes: true,\r\n    characterData: true,\r\n    childList: true,\r\n    subtree: true,\r\n    attributeOldValue: true,\r\n    characterDataOldValue: true\r\n} ){\r\n\r\n    const mutationProduct = new MutationObserver( mutation => {\r\n        mutation.forEach( mut => {\r\n            callback();\r\n        })\r\n    })\r\n\r\n    mutationProduct.observe( $element, settings);\r\n\r\n}\r\n\r\n\r\n\r\n/*\r\n\r\nsendRequest( {\r\n    method: 'GET',\r\n    url: ajax_url,\r\n    action: 'loadmore',\r\n    data: {\r\n        category: category_id,\r\n        min,\r\n        max,\r\n        order,\r\n        taxonomyID: taxonomy\r\n    },\r\n    onloadstart_callback(){\r\n        \r\n    }\r\n} )\r\n.then( data => {\r\n\r\n} )\r\n.catch( error => {\r\n\r\n} )\r\n\r\n*/\r\nfunction sendRequest( sendObject ){\r\n    return new Promise( (resolve, reject) => {\r\n        const xhr = new XMLHttpRequest()\r\n\r\n        let dataURL = ''\r\n        let dataKeys = Object.keys( sendObject.data )\r\n        dataKeys.forEach( key => {\r\n            dataURL += `&${key}=${sendObject.data[key]}`\r\n        } )\r\n\r\n        xhr.open( sendObject.method, sendObject.url + `?action=${sendObject.action}` + dataURL )\r\n        xhr.onloadstart = sendObject.onloadstart_callback()\r\n        xhr.onload = () => {\r\n            resolve( xhr.response )\r\n        }\r\n        xhr.onerror = () => {\r\n            reject( xhr.response )\r\n        }\r\n        xhr.send()\r\n\r\n    } )\r\n}\r\n\r\n\r\n\r\nfunction css(el, styles = {}){\r\n    Object.assign(el.style, styles)\r\n}\n\n//# sourceURL=webpack:///./frontend/utils.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module is referenced by other modules so it can't be inlined
/******/ 	var __webpack_exports__ = __webpack_require__("./frontend/price-slider/price-slider.js");
/******/ 	
/******/ })()
;