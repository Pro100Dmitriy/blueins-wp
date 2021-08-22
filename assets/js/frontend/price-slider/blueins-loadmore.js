import { sendRequest, css } from "../utils"  
import { _ } from "./price-slider"



/*****  Load More  *****/
export function blueins_more_posts_loadmore(){
     // Consts
     const $product_container = document.querySelector('#products__list-container')
     const $preloader = preloader()
     const $load_more = document.querySelector('#blueins-load_more')
    
     // Prepare Data
    const ajax_url = woocommerce_params.ajax_url
    let page = blu_loadmore_param.current_page
    let category_id = _.blueins_get_category()
    let min = String( _.blueins_get_min() )
    let max = String( _.blueins_get_max() )
    let order = String( _.blueins_get_order() )
    let taxonomy = blu_loadmore_param.taxonomy ? String( blu_loadmore_param.taxonomy ) : 0


    sendRequest( {
        method: 'GET',
        url: ajax_url,
        action: 'loadmore',
        data: {
            paged: page,
            category: category_id,
            min,
            max,
            order,
            taxonomyID: taxonomy
        },
        onloadstart_callback(){
            $preloader.show()
        }
    } )
    .then( resolve => {
        // *************************** Then Block
        if( resolve ) {
            $preloader.hide()

            blu_loadmore_param.current_page++;
            $product_container.insertAdjacentHTML('beforeend', resolve)

            if ( blu_loadmore_param.current_page == blu_loadmore_param.max_page ){
                $load_more.classList.add('blueins-load_more__hidden');
            } 
        } else {
            $load_more.classList.add('blueins-load_more__hidden');
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
    let $loadMore = document.querySelector('#blueins-load_more')
    let template = `
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
    return {
        show(){
            $loadMore.insertAdjacentHTML('beforebegin', template)
            css($loadMore, {
                display: 'none'
            })
        },
        hide(){
            $loadMore.parentNode.querySelector('.button-preloader').remove()
            css($loadMore, {
                display: 'block'
            })
        }
    }
}