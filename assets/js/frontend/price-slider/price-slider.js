import { Slider } from './class/blueins-slider-class'
import { blueins_get_posts } from './blueins-get_posts'
import { blueins_more_posts_loadmore } from './blueins-loadmore'
import { Active_Filters } from './class/blueins-active_filters-class'
import { Blueins_Color_Filters } from './class/blueins-color-filters-class'


const PROD_FILTER = document.querySelector('#prod-filter-menu')


/*****  Price Slider HTML  *****/
export const sliderEl1 = new Slider({
    container: document.querySelector('.el-price-slider_container'),
    thumbLower: '.noUi-handle-lower',
    thumbUpper: '.noUi-handle-upper',
    min: document.querySelector('#min_price').value,
    max: Number( document.querySelector('#max_price').value ) + 30,
    idContainerMin: 'el-slider-min',
    idContainerMax: 'el-slider-max'
});



/*****  Active Filters HTML  *****/
export const activeFilters = new Active_Filters({
    priceSlider: sliderEl1
})



/*****  Color Filters HTML  *****/
const variation_filter = new Blueins_Color_Filters({
    space: 'prod-filter',
    colorPaContainerId: 'setElementHere__pa_czvet',
    razmerPaContainerId: 'setElementHere__pa_razmer',
    jquery: $
})



/*****  Filter Get Min & Max Price  *****/
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
    let cartItem = PROD_FILTER.querySelectorAll('.cat-item a');

    cartItem.forEach( item => item.addEventListener('click', (event) => {
        event.preventDefault();
        event.target.parentNode.classList.toggle('cart-item-selected')
        event.target.parentNode.parentNode.classList.toggle('ul-selected')
        blueins_get_posts();
    } ))
}

blueins_category();

function blueins_get_category(){
    let cartItem = PROD_FILTER.querySelectorAll('.cat-item');
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



/*****  Get Color  *****/
function blueins_color(){
    let colors = PROD_FILTER.querySelectorAll('#setElementHere__pa_czvet .color-bg')

    colors.forEach( color => {
        color.addEventListener( 'click', blueins_get_posts ) 
    } )
}

blueins_color()

function blueins_get_color(){
    let color_selected = PROD_FILTER.querySelectorAll('#setElementHere__pa_czvet .element-select span')
    let values = []

    color_selected.forEach( color => {
        let color_name = color.parentNode.parentNode.getAttribute('name')
        let color_code = color.getAttribute( 'data-value' )
        values.push([color_name, color_code])
    } )

    return values
}



/*****  Get Razmer  *****/
function blueins_razmer(){
    let razmers = PROD_FILTER.querySelectorAll('#setElementHere__pa_razmer .razmer-bg')

    razmers.forEach( razmer => {
        razmer.addEventListener( 'click', blueins_get_posts )
    } )
}

blueins_razmer()

function blueins_get_razmer(){
    let razmer_selected = PROD_FILTER.querySelectorAll('#setElementHere__pa_razmer .element-select span')
    let values = []

    razmer_selected.forEach( razmer => {
        let razmer_name = razmer.parentNode.parentNode.getAttribute('name')
        let razmer_code = razmer.getAttribute( 'data-value' )
        values.push( [razmer_name, razmer_code] )
    } )

    return values
}



export const _ = {
    blueins_get_min,
    blueins_get_max,
    blueins_get_category,
    blueins_get_order,
    blueins_get_color,
    blueins_get_razmer
}