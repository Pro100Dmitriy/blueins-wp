let priceFilter = document.querySelector('.el-price-slider');
let container = document.querySelector('.el-price-slider_container');
let _eventHandlers = {}; 

/*****  Price Slider  *****/

function createSlider(container){
    let div = `
        <div class="noUi-base">
            <div class="noUi-origin">
                <div class="noUi-handle noUi-handle-lower"></div>
            </div>
            <div class="noUi-origin">
                <div class="noUi-handle noUi-handle-upper"></div>
            </div>
        </div>
    `;

    container.insertAdjacentHTML('afterbegin', div);
}

function addListener(node, event, handler, capture) {
    if( !(node in _eventHandlers) ) {
        _eventHandlers[node] = {};
    }
    if( !(event in _eventHandlers[node] )) {
        _eventHandlers[node][event] = [];
    }
    _eventHandlers[node][event].push([handler, capture]);
    node.addEventListener(event, handler, capture);
}

function removeAllListeners(node, event) {
    if(node in _eventHandlers) {
        var handlers = _eventHandlers[node];
        if(event in handlers) {
            var eventHandlers = handlers[event];
            for(var i = eventHandlers.length; i--;) {
                var handler = eventHandlers[i];
                node.removeEventListener(event, handler[0], handler[1]);
            }
        }
    }
}

class Slider{
    constructor(option){
        this.elem = option.el;
        this.thumbLower = this.elem.querySelector(option.thumbLower);
        this.thumbUpper = this.elem.querySelector(option.thumbUpper);
        this.min = Number(option.min);
        this.max = Number(option.max) + 5;
        this.idContainerMin = option.idContainerMin;
        this.idContainerMax = option.idContainerMax;

        this.minPrice;
        this.maxPrice;

        this.publickMinPrice;
        this.publickMaxPrice;

        this.initElem();

        this.nowUsing;
        this.sliderCoords;
        this.thumbCoords;
        this.shiftXLower;
        this.lowerX;
        this.shiftXUpper;
        this.upperX;

        this.elem.ondragstart = () => {
            return false;
        }

        this.elem.onmousedown = event => {this.startEvent(event, option)}
        this.elem.ontouchstart = event => {this.startEvent(event, option)}
    }

    startEvent(event, option){
        if( event.target.closest(option.thumbLower) ){
            this.nowUsing = this.thumbLower;
            if(event.type == 'touchstart') this.startDrag(event.changedTouches[0].clientX, event.changedTouches[0].clientY, event.type);
            if(event.type == 'mousedown') this.startDrag(event.clientX, event.clientY, event.type);
            return false;
        }else if(event.target.closest(option.thumbUpper)){
            this.nowUsing = this.thumbUpper;
            if(event.type == 'touchstart') this.startDrag(event.changedTouches[0].clientX, event.changedTouches[0].clientY, event.type)
            if(event.type == 'mousedown') this.startDrag(event.clientX, event.clientY, event.type);
            return false;
        }
    }

    initElem(){
        this.thumbLower.parentNode.style.left = '0%';
        this.thumbUpper.parentNode.style.left = '97%';

        let percentMin = 0
        let percentMax = 97
        this.minPrice = Math.round( this.min + ( ( (this.max - this.min) / 100) * percentMin ), 1 );
        this.maxPrice = Math.round( this.min + ( ( (this.max - this.min) / 100) * percentMax ), 1 );
        this.publickMinPrice = Math.round( this.min + ( ( (this.max - this.min) / 100) * percentMin ), 1 );
        this.publickMaxPrice = Math.round( this.min + ( ( (this.max - this.min) / 100) * percentMax ), 1 );

        let inputMin = document.querySelector(`#${this.idContainerMin}`);
        let inputMax = document.querySelector(`#${this.idContainerMax}`);
        inputMin.innerHTML = 'Br ' + this.minPrice;
        inputMax.innerHTML = 'Br ' + this.maxPrice;
    }

    startDrag(startClientX, startClientY, eventType) {
        this.thumbCoords = this.nowUsing.getBoundingClientRect();
        if( this.nowUsing === this.thumbLower){
            this.shiftXLower = startClientX - this.thumbCoords.left;
        }
        if( this.nowUsing === this.thumbUpper){
            this.shiftXUpper = startClientX - this.thumbCoords.left;
        }
        this.sliderCoords = this.elem.getBoundingClientRect();
        //console.log(eventType);
        if(eventType == 'touchstart'){
            addListener(document, 'touchmove', this.onDocumentMouseMove.bind(this), false);
            addListener(document, 'touchend', this.onDocumentMouseUp.bind(this), false);
        }
        if(eventType == 'mousedown'){
            addListener(document, 'mousemove', this.onDocumentMouseMove.bind(this), false);
            addListener(document, 'mouseup', this.onDocumentMouseUp.bind(this), false);
        }
    }

    moveTo(clientX) {
        let rightEdge = this.elem.offsetWidth - this.nowUsing.offsetWidth;
        let newLeftLower = clientX - this.shiftXLower - this.sliderCoords.left;
        let newLeftUpper = clientX - this.shiftXUpper - this.sliderCoords.left;

        if(newLeftLower < 0) {
            newLeftLower = 0;
        }
        if( newLeftLower > this.upperX ){
            newLeftLower = this.upperX-5;
        }

        if (newLeftUpper > rightEdge) {
            newLeftUpper = rightEdge;
        }
        if(newLeftUpper < this.lowerX){
            newLeftUpper = this.lowerX+5;
        }

        if( this.nowUsing === this.thumbLower ){
            let percent = Math.round( this.lowerX / ( this.sliderCoords.width / 100 ), 1 );
            this.lowerX = newLeftLower;
            this.minPrice = Math.round( this.min + ( ( (this.max - this.min) / 100) * percent ), 1 );
            this.nowUsing.parentNode.style.left = percent + '%';

            this.changeInputs();
        }
        if( this.nowUsing === this.thumbUpper ){
            let percent = Math.round( this.upperX / ( this.sliderCoords.width / 100 ), 1 );
            this.upperX = newLeftUpper;
            this.maxPrice = Math.round( this.min + ( ( (this.max - this.min) / 100) * percent ), 1 );
            this.nowUsing.parentNode.style.left = percent + '%';

            this.changeInputs();
        }
    }

    endDrag(e) {
        //console.log(e.type)
        if(e.type == 'touchend'){
            removeAllListeners(document, 'touchmove');
            removeAllListeners(document, 'touchend');
        }
        if(e.type == 'mouseup'){
            removeAllListeners(document, 'mousemove');
            removeAllListeners(document, 'mouseup');
        }
        
    }

    onDocumentMouseMove(e) {
        if(e.type == 'touchmove'){
            this.moveTo(e.changedTouches[0].clientX);
        }
        if(e.type == 'mousemove'){
            this.moveTo(e.clientX);
        }
    }

    onDocumentMouseUp(e) {
        this.endDrag(e);
        blueins_get_posts();
    }

    changeInputs(){
        let minPr, maxPr;

        if(this.minPrice == undefined) minPr = this.min;
        else minPr = this.minPrice
        if(this.maxPrice == undefined) maxPr = this.max - 5;
        else maxPr = this.maxPrice

        let inputMin = document.querySelector(`#${this.idContainerMin}`);
        let inputMax = document.querySelector(`#${this.idContainerMax}`);
        inputMin.innerHTML = 'Br ' + minPr;
        inputMax.innerHTML = 'Br ' + maxPr;
    }

    cahngeMinPosition(positionMin){
        this.minPrice = positionMin
        this.nowUsing = undefined
        this.sliderCoords = undefined
        this.thumbCoords = undefined
        this.shiftXLower = undefined
        this.lowerX = undefined
        this.thumbLower.parentNode.style.left = '0%';
        this.changeInputs()
    }

    cahngeMaxPosition(positionMax){
        this.maxPrice = positionMax
        this.nowUsing = undefined
        this.sliderCoords = undefined
        this.thumbCoords = undefined
        this.shiftXUpper = undefined
        this.upperX = undefined
        this.thumbUpper.parentNode.style.left = '97%';
        this.changeInputs()
    }
}

createSlider(container);

const sliderEl1 = new Slider({
    el: document.querySelector('.noUi-base'),
    thumbLower: '.noUi-handle-lower',
    thumbUpper: '.noUi-handle-upper',
    min: document.querySelector('#min_price').value,
    max: Number( document.querySelector('#max_price').value ) + 30,
    idContainerMin: 'el-slider-min',
    idContainerMax: 'el-slider-max'
});

function blueins_get_min(){
    let min = document.querySelector('#el-slider-min').innerHTML;
    let reg = /\d+/;
    return min.match(reg)[0]
}
function blueins_get_max(){
    let max = document.querySelector('#el-slider-max').innerHTML;
    let reg = /\d+/;
    return max.match(reg)[0]
}

/*****  Filter by catogory  *****/

function blueins_category(){
    let prodFilter = document.querySelector('#prod-filter-menu');
    let cartItem = prodFilter.querySelectorAll('.cat-item a');

    cartItem.forEach( item => item.addEventListener('click', (event) => {
        event.preventDefault();
        event.target.parentNode.classList.toggle('cart-item-selected')
        event.target.parentNode.parentNode.classList.toggle('ul-selected')
        blueins_get_posts();
    } ))
}

blueins_category();


function blueins_get_category(){
    let prodFilter = document.querySelector('#prod-filter-menu');
    let cartItem = prodFilter.querySelectorAll('.cat-item');
    let data = [];

    cartItem.forEach(item => {
        if( item.classList.contains('cart-item-selected') ){
            let r = /\d+/;
            let s = item.className;
            data.push( s.match(r)[0] );
        }
    });
    
    return data;
}

/*****  Filter by Order  *****/

function blueins_order(){
    let orderButton = document.querySelector('.select-items')
    orderButton.querySelectorAll('div').forEach(node => {
        node.addEventListener('click', blueins_get_posts)
    })
}

blueins_order()

function blueins_get_order(){
    let orderby = document.querySelector('.orderby');
    for(let i = 0; i <= orderby.children.length; i++){
        if(orderby.children[i].attributes.selected) return orderby.children[i].attributes.value.nodeValue;
    }
}

/*****  Load More Button  *****/

function blueins_load_more(){
    let laodMoreButton = document.querySelector('#blueins-load_more')
    if( !laodMoreButton ) return
    laodMoreButton.addEventListener('click', e => {
        e.preventDefault();
        blueins_more_posts_loadmore()
    })
}

blueins_load_more()

/*****  Load More Button  *****/
function blueins_active_filter(){
    let filterList = document.querySelector('.customs__list');
    let activeFilters = `
        <li id="activeFilters" class="customs__list__item activeFilters-hidden">
            <div class="customs__list__item__title">
                <h6 class="groupe-cust-title">Активные фильтры</h6>
            </div>
            <div class="item__nav">
                <ul class="product-categories-active ul-selected-active"></ul>
            </div>
        </li>
    `;
    filterList.insertAdjacentHTML('afterbegin', activeFilters);
}

blueins_active_filter()

/*****  Filter  *****/
function blueins_get_posts(numberPage){
    const ajax_url = woocommerce_params.ajax_url;
    let category_id = blueins_get_category();
    let min = Number( blueins_get_min() );
    let max = Number( blueins_get_max() );
    let order = String( blueins_get_order() );
    let taxonomy = misha_loadmore_params.taxonomy ? String( misha_loadmore_params.taxonomy ) : 0;
    let preloader = `
                    <div class="preloader">
                        <svg version="1.1" id="L5" width="60px" height="60px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                            <circle fill="#17191A" stroke="none" cx="6" cy="50" r="6">
                            <animateTransform 
                                attributeName="transform" 
                                dur="1s" 
                                type="translate" 
                                values="0 15 ; 0 -15; 0 15" 
                                repeatCount="indefinite" 
                                begin="0.1"/>
                            </circle>
                            <circle fill="#17191A" stroke="none" cx="30" cy="50" r="6">
                            <animateTransform 
                                attributeName="transform" 
                                dur="1s" 
                                type="translate" 
                                values="0 10 ; 0 -10; 0 10" 
                                repeatCount="indefinite" 
                                begin="0.2"/>
                            </circle>
                            <circle fill="#17191A" stroke="none" cx="54" cy="50" r="6">
                            <animateTransform 
                                attributeName="transform" 
                                dur="1s" 
                                type="translate" 
                                values="0 5 ; 0 -5; 0 5" 
                                repeatCount="indefinite" 
                                begin="0.3"/>
                            </circle>
                        </svg>
                    </div>
    `

    //console.log(misha_loadmore_params.taxonomy)

    function removeActiveClass(e){
        e.preventDefault();
        if( e.target.parentNode.hasAttribute('data-cat-id') ){
            let removeClassFrom = document.querySelector(`.cat-item-${e.target.parentNode.getAttribute('data-cat-id')}`)
            removeClassFrom.classList.remove('cart-item-selected')
            removeClassFrom.parentNode.classList.remove('ul-selected')
        }
        if( e.target.parentNode.hasAttribute('data-cat-min') ){
            sliderEl1.cahngeMinPosition( sliderEl1.publickMinPrice )
        }
        if( e.target.parentNode.hasAttribute('data-cat-max') ){
            sliderEl1.cahngeMaxPosition( sliderEl1.publickMaxPrice )
        }
        if( e.target.parentNode.hasAttribute('data-remove-all') ){
            let activeFiltersContainer = document.querySelector('.product-categories-active');
            for( node of activeFiltersContainer.children ){
                if( node.hasAttribute('data-cat-id') ){
                    let removeClassFrom = document.querySelector(`.cat-item-${node.getAttribute('data-cat-id')}`)
                    removeClassFrom.classList.remove('cart-item-selected')
                    removeClassFrom.parentNode.classList.remove('ul-selected')
                }
                if( node.hasAttribute('data-cat-min') ){
                    sliderEl1.cahngeMinPosition( sliderEl1.publickMinPrice )
                }
                if( node.hasAttribute('data-cat-max') ){
                    sliderEl1.cahngeMaxPosition( sliderEl1.publickMaxPrice )
                }
            }
        }
        blueins_get_posts()
    }

    function actFilters(category){
        if(category.length == 0 && min == sliderEl1.publickMinPrice && max == sliderEl1.publickMaxPrice){
            document.querySelector('#activeFilters').classList.add('activeFilters-hidden')
        }else{
            document.querySelector('#activeFilters').classList.remove('activeFilters-hidden')
        }
        let filterList = document.querySelector('#activeFilters').querySelector('.product-categories-active')

        let activeCat = category.map( item => {
            let obj = document.querySelector(`.cat-item-${item}`)
            return obj.innerHTML
        } )

        let template = activeCat.map( (item, index)=> `<li data-cat-id="${category[index]}" class="cat-item-active cart-item-selected-active">${item}</li>`)
        if( min != sliderEl1.publickMinPrice ){
            template.push(`<li data-cat-min="${min}" class="cat-item-active cart-item-selected-active"><a href="#">Мин: ${min}</a></li>`)   
        }
        if( max != sliderEl1.publickMaxPrice ){
            template.push(`<li data-cat-max="${max}" class="cat-item-active cart-item-selected-active"><a href="#">Макс: ${max}</a></li>`)
        }
        template.push(`<li data-remove-all class="cat-item-active cart-item-selected-active cart-item-remove-all"><a href="#">Очистить фильтры</a></li>`)
        filterList.innerHTML = template.join('');

        filterList.querySelectorAll('.cat-item-active').forEach( item => item.addEventListener( 'click', removeActiveClass ) )
    }

    function sendRquest(method, url, action, category, min, max, order, tax){
        return new Promise( (resolve, reject) => {
            const xhr = new XMLHttpRequest();

            xhr.open(method, url + `?action=${action}&category=${category}&min=${min}&max=${max}&order=${order}&taxonomyID=${tax}`);
            xhr.onloadstart = () => {
                //add  active filters
                actFilters(category);

                document.querySelector('.products').insertAdjacentHTML('afterbegin', preloader);
                let filter = document.querySelector('#blueins-filters-block').getBoundingClientRect()
                document.querySelector('#header__bottom-cover').classList.add('header__bottom-fixed')
                $('html, body').animate({scrollTop: window.pageYOffset + filter.y - 76}, 1000);
            }
            xhr.onload = () => {
                resolve( xhr.response )
            }
            xhr.onerror = () => {
                reject( xhr.response )
            }
            xhr.send()
        })
    }

    //console.log(min, max, category_id, order)

    sendRquest('GET', ajax_url, 'loadmore', category_id, String(min), String(max), String(order), taxonomy)
        .then( data => {
            document.querySelector('#products__list-container').innerHTML = data
            document.querySelector('.preloader').remove()
            misha_loadmore_params.current_page = 1
            //console.log(misha_loadmore_params.max_page, misha_loadmore_params.current_page)

            let regx = /big-products__list__item/g
            let post_count = data.match(regx)
            let posts_per_page = Number(misha_loadmore_params.posts_per_page)

            if ( misha_loadmore_params.current_page == misha_loadmore_params.max_page || post_count.length < posts_per_page ){
                document.querySelector('#blueins-load_more').classList.add('blueins-load_more__hidden');
            }else{
                document.querySelector('#blueins-load_more').classList.remove('blueins-load_more__hidden');
            }
        } )
        .catch( error => {
            document.querySelector('#products__list-container').innerHTML = `<div class="products__list__img-error"><img src="${misha_loadmore_params.theme_url}/assets/img/Robot.svg" width="500px" height="500px"></div>`
        } )

}


/*****  Load More  *****/

// function blueins_more_posts(){
//     const ajax_url = woocommerce_params.ajax_url;
//     let category_id = blueins_get_category();
//     let min = String( blueins_get_min() );
//     let max = String( blueins_get_max() );
//     let order = String( blueins_get_order() );

//     let query = misha_loadmore_params.posts
//     let page = String( misha_loadmore_params.current_page )
//     let max_page = String( misha_loadmore_params.max_page )

//     console.log(page, max_page, min, max, category_id, order)

//     let preloader = `
//                     <div class="button-preloader">
//                         <svg version="1.1" id="L5" width="60px" height="60px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
//                             viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
//                             <circle fill="#17191A" stroke="none" cx="6" cy="50" r="6">
//                             <animateTransform 
//                                 attributeName="transform" 
//                                 dur="1s" 
//                                 type="translate" 
//                                 values="0 15 ; 0 -15; 0 15" 
//                                 repeatCount="indefinite" 
//                                 begin="0.1"/>
//                             </circle>
//                             <circle fill="#17191A" stroke="none" cx="30" cy="50" r="6">
//                             <animateTransform 
//                                 attributeName="transform" 
//                                 dur="1s" 
//                                 type="translate" 
//                                 values="0 10 ; 0 -10; 0 10" 
//                                 repeatCount="indefinite" 
//                                 begin="0.2"/>
//                             </circle>
//                             <circle fill="#17191A" stroke="none" cx="54" cy="50" r="6">
//                             <animateTransform 
//                                 attributeName="transform" 
//                                 dur="1s" 
//                                 type="translate" 
//                                 values="0 5 ; 0 -5; 0 5" 
//                                 repeatCount="indefinite" 
//                                 begin="0.3"/>
//                             </circle>
//                         </svg>
//                     </div>
//     `

//     function loadMore(method, url, action, category, min, max, order, page){
//         return new Promise( (resolve, reject) => {
//             const xhr = new XMLHttpRequest();

//             xhr.open(method, url + `?action=${action}&category=${category}&min=${min}&max=${max}&order=${order}&paged=${page}`);
//             xhr.onloadstart = () => {
//                 let loadMore = document.querySelector('#blueins-load_more')
//                 loadMore.insertAdjacentHTML('beforebegin', preloader)
//                 loadMore.style = 'display: none'
//             }
//             xhr.onload = () => {
//                 resolve( xhr.response )
//             }
//             xhr.onerror = () => {
//                 reject( xhr.response )
//             }
//             xhr.send()
//         })
//     }

//     loadMore('GET', ajax_url, 'blueins_filter', category_id, min, max, order, page)
//         .then( data => {
//             if( data ) {
//                 let loadMore = document.querySelector('#blueins-load_more')
//                 document.querySelector('.button-preloader').remove()
//                 loadMore.style = 'display: block'

//                 misha_loadmore_params.current_page++;
//                 document.querySelector('#products__list-container').insertAdjacentHTML('beforeend', data)

//                 if ( misha_loadmore_params.current_page == misha_loadmore_params.max_page ){
//                     document.querySelector('#blueins-load_more').classList.add('blueins-load_more__hidden');
//                 } 
//             } else {
//                 //document.querySelector('#blueins-load_more').classList.add('blueins-load_more__hidden');
//             }
//         } )
//         .catch( error => {
//             document.querySelector('#products__list-container').innerHTML = 'error'
//         } )

// }


function blueins_more_posts_loadmore(){
    const ajax_url = woocommerce_params.ajax_url;
    let page = misha_loadmore_params.current_page
    let category_id = blueins_get_category();
    let min = String( blueins_get_min() );
    let max = String( blueins_get_max() );
    let order = String( blueins_get_order() );
    let taxonomy = misha_loadmore_params.taxonomy ? String( misha_loadmore_params.taxonomy ) : 0;

    //console.log( category_id, min, max, order, taxonomy );
    
    let preloader = `
                    <div class="button-preloader">
                        <svg version="1.1" id="L5" width="60px" height="60px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                            <circle fill="#17191A" stroke="none" cx="6" cy="50" r="6">
                            <animateTransform 
                                attributeName="transform" 
                                dur="1s" 
                                type="translate" 
                                values="0 15 ; 0 -15; 0 15" 
                                repeatCount="indefinite" 
                                begin="0.1"/>
                            </circle>
                            <circle fill="#17191A" stroke="none" cx="30" cy="50" r="6">
                            <animateTransform 
                                attributeName="transform" 
                                dur="1s" 
                                type="translate" 
                                values="0 10 ; 0 -10; 0 10" 
                                repeatCount="indefinite" 
                                begin="0.2"/>
                            </circle>
                            <circle fill="#17191A" stroke="none" cx="54" cy="50" r="6">
                            <animateTransform 
                                attributeName="transform" 
                                dur="1s" 
                                type="translate" 
                                values="0 5 ; 0 -5; 0 5" 
                                repeatCount="indefinite" 
                                begin="0.3"/>
                            </circle>
                        </svg>
                    </div>
    `

    function loadMore(method, url, action, page, category, min, max, order, tax){
        return new Promise( (resolve, reject) => {
            const xhr = new XMLHttpRequest();

            xhr.open(method, url + `?action=${action}&paged=${page}&category=${category}&min=${min}&max=${max}&order=${order}&taxonomyID=${tax}`);
            xhr.onloadstart = () => {
                let loadMore = document.querySelector('#blueins-load_more')
                loadMore.insertAdjacentHTML('beforebegin', preloader)
                loadMore.style = 'display: none'
            }
            xhr.onload = () => {
                resolve( xhr.response )
            }
            xhr.onerror = () => {
                reject( xhr.response )
            }
            xhr.send()
        })
    }

    loadMore('GET', ajax_url, 'loadmore', String(page), category_id, String(min), String(max), String(order), taxonomy)
        .then( data => {
            if( data ) {
                let loadMore = document.querySelector('#blueins-load_more')
                document.querySelector('.button-preloader').remove()
                loadMore.style = 'display: block'

                misha_loadmore_params.current_page++;
                document.querySelector('#products__list-container').insertAdjacentHTML('beforeend', data)

                if ( misha_loadmore_params.current_page == misha_loadmore_params.max_page ){
                    document.querySelector('#blueins-load_more').classList.add('blueins-load_more__hidden');
                } 
            } else {
                //document.querySelector('#blueins-load_more').classList.add('blueins-load_more__hidden');
            }
        } )
        .catch( error => {
            document.querySelector('#products__list-container').innerHTML = `<div class="products__list__img-error"><img src="${misha_loadmore_params.theme_url}/assets/img/Robot.svg" width="500px" height="500px"></div>`
        } )

}