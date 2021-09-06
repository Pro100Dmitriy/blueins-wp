import { sendRequest } from '../utils'
import { _, activeFilters } from './price-slider'



export function blueins_get_posts(){
    // Consts
    const $product_container = document.querySelector('#products__list-container')
    const $preloader = preloader()

    // Prepare Data
    const ajax_url = woocommerce_params.ajax_url;
    let category_id = _.blueins_get_category()
    let min = Number( _.blueins_get_min() )
    let max = Number( _.blueins_get_max() )
    let order = String( _.blueins_get_order() )
    let taxonomy = blu_loadmore_param.taxonomy ? String( blu_loadmore_param.taxonomy ) : 0
    let color = _.blueins_get_color()
    let razmer = _.blueins_get_razmer()
    
    
    sendRequest( {
        method: 'GET',
        url: ajax_url,
        action: 'loadmore',
        data: {
            category: category_id,
            min,
            max,
            order,
            taxonomyID: taxonomy,
            color: color,
            razmer: razmer
        },
        onloadstart_callback(){
            activeFilters.add(category_id, min, max)

            $preloader.show()

            let filter = document.querySelector('#blueins-filters-block')
            let header = document.querySelector('#header__bottom-cover')

            let filterBCR = filter.getBoundingClientRect()
            let headerBCR = header.getBoundingClientRect()

            header.classList.add('header__bottom-fixed')
            $('html, body').animate({
                scrollTop: window.pageYOffset + filterBCR.y - headerBCR.height
            }, 1000);
        }
    } )
    .then( resolve => {
        // *************************** Then Block
        $product_container.innerHTML = resolve
        
        $preloader.hide()

        blu_loadmore_param.current_page = 1
        let regx = /big-products__list__item/g
        let post_count = resolve.match(regx)
        let posts_per_page = Number(blu_loadmore_param.posts_per_page)
        if ( blu_loadmore_param.current_page == blu_loadmore_param.max_page || post_count.length < posts_per_page ){
            document.querySelector('#blueins-load_more').classList.add('blueins-load_more__hidden');
        }else{
            document.querySelector('#blueins-load_more').classList.remove('blueins-load_more__hidden');
        }
        // *************************** Then Block
    } )
    .catch( reject => {
        // *************************** Catch Block
        $product_container.innerHTML = `
            <div class="products__list__img-error"><img src="${blu_loadmore_param.theme_url}/assets/img/Robot.svg" width="500px" height="500px"></div>
        `
        // *************************** Catch Block
    } )

}



function preloader(){
    let $products = document.querySelector('.products')
    let template = `
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
    return {
        show(){
            $products.insertAdjacentHTML('afterbegin', template)
        },
        hide(){
            $products.querySelector('.preloader').remove()
        }
    }
}