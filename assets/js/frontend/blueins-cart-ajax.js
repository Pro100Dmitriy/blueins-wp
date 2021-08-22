import { mutation_observe, sendRequest } from './utils'


const AJAX_URL = woocommerce_params.ajax_url


document.addEventListener('DOMContentLoaded', event => {
// *************************************************************************** DOM Content Loaded


    /**
     *      Add To Cart (Shop Page)
     */

    let $productContainer = document.querySelector('#products__list-container')

    if( $productContainer ){

        mutation_observe( $productContainer, updateLinks, {
            attributes: false,
            characterData: false,
            childList: true,
            subtree: false,
            attributeOldValue: false,
            characterDataOldValue: false
        } )

        updateLinks()

        function updateLinks(){
            let allAddToCartButtons = document.querySelectorAll('.blueins_add_to_cart')
            allAddToCartButtons.forEach( item => item.addEventListener('click', addToCart ) )
        }
        
        function addToCart(event){
            event.preventDefault()
        
            let link = this.getAttribute('href')

            let action = 'blueins_cart_add'                                                                                     // Action
            let add_to_cart = link.match( /add-to-cart=\d+/ ) ? link.match( /add-to-cart=\d+/ )[0] : false                      // Add To Cart Buttons
            let product_id = add_to_cart !== false ? add_to_cart.match( /\d+/ )[0] : false                                      // Product ID
            let preloader = `
                <div class="preloader">
                    <svg version="1.1" id="L5" width="60px" height="60px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                        <circle fill="#fff" stroke="none" cx="6" cy="50" r="6">
                        <animateTransform 
                            attributeName="transform" 
                            dur="1s" 
                            type="translate" 
                            values="0 15 ; 0 -15; 0 15" 
                            repeatCount="indefinite" 
                            begin="0.1"/>
                        </circle>
                        <circle fill="#fff" stroke="none" cx="30" cy="50" r="6">
                        <animateTransform 
                            attributeName="transform" 
                            dur="1s" 
                            type="translate" 
                            values="0 10 ; 0 -10; 0 10" 
                            repeatCount="indefinite" 
                            begin="0.2"/>
                        </circle>
                        <circle fill="#fff" stroke="none" cx="54" cy="50" r="6">
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

            if( product_id ){

                sendRequest( {
                    method: 'GET',
                    url: AJAX_URL,
                    action,
                    data: {
                        product_id
                    },
                    onloadstart_callback(){
    
                        document.querySelector('.blueins_cart_center').insertAdjacentHTML('afterbegin', preloader)
                        $('body').css('overflow-y','hidden');
                        $('#cart-menu').addClass('right-ziro');
                        $('#cart-overlay').css('visibility','visible');
                        setTimeout(function(){
                            $('#cart-overlay').css('background','rgba(180,197,204, 0.4)');
                        }, 100);
    
                    }
                } )
                .then( data => document.querySelector('.blueins_cart_center').innerHTML = data )
                .catch( error => console.log(error) )

            }else{
                //console.log(this)
                //let event = new Event('click')
                //this.dispatchEvent(event)
            }

        }

    }




    /**
     *      Add To Cart (Single Product Page)
     */

    let button_single_page = document.querySelector('.single_add_to_cart_button')

    if( button_single_page ){

        button_single_page.addEventListener('click', addToCartSingle)

        function addToCartSingle(event){
            event.preventDefault()

            let action = 'blueins_cart_add_single'                                                                                                                                                                          // Action
            let product_id = document.querySelector('input[name="product_id"]') ? document.querySelector('input[name="product_id"]').value : document.querySelector('.single_add_to_cart_button').value                     // Product ID
            let product_qty = document.querySelector('#quantity').value ? document.querySelector('#quantity').value : 1                                                                                                     // Product Quantity
            let variaction_id = document.querySelector('input[name="variation_id"]') ? document.querySelector('input[name="variation_id"]').value : ''                                                                      // Variaction ID
            let color = document.querySelector('#czvet') ? document.querySelector('#czvet').value.replace(' #', '_') : ''                                                                                                   // Color
            let size = document.querySelector('#razmer') ? document.querySelector('#razmer').value.replace(' #', '_') : ''                                                                                                  // Size

            let preloader = `
                <div class="preloader">
                    <svg version="1.1" id="L5" width="60px" height="60px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                        <circle fill="#fff" stroke="none" cx="6" cy="50" r="6">
                        <animateTransform 
                            attributeName="transform" 
                            dur="1s" 
                            type="translate" 
                            values="0 15 ; 0 -15; 0 15" 
                            repeatCount="indefinite" 
                            begin="0.1"/>
                        </circle>
                        <circle fill="#fff" stroke="none" cx="30" cy="50" r="6">
                        <animateTransform 
                            attributeName="transform" 
                            dur="1s" 
                            type="translate" 
                            values="0 10 ; 0 -10; 0 10" 
                            repeatCount="indefinite" 
                            begin="0.2"/>
                        </circle>
                        <circle fill="#fff" stroke="none" cx="54" cy="50" r="6">
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

            if( product_id ){

                sendRequest( {
                    method: 'GET',
                    url: AJAX_URL,
                    action,
                    data: {
                        product_id,
                        product_qty,
                        variaction_id,
                        color,
                        size
                    },
                    onloadstart_callback(){
    
                        document.querySelector('.blueins_cart_center').insertAdjacentHTML('afterbegin', preloader)
                        $('body').css('overflow-y','hidden');
                        $('#cart-menu').addClass('right-ziro');
                        $('#cart-overlay').css('visibility','visible');
                        setTimeout(function(){
                            $('#cart-overlay').css('background','rgba(180,197,204, 0.4)');
                        }, 100);
    
                    }
                } )
                .then( data => document.querySelector('.blueins_cart_center').innerHTML = data )
                .catch( error => console.log(error) )

            }else{
                //console.log(this)
                //let event = new Event('click')
                //this.dispatchEvent(event)
            }
            
        }

    }




    /**
     *      Remove Cart Element (Cart Template)
     */

    let cartMenu = document.querySelector('#cart-menu')

    if( cartMenu ){

        mutation_observe( cartMenu, updateRemoveLinks )

        updateRemoveLinks()

        function updateRemoveLinks(){
            let miniCartItem = document.querySelectorAll('.blueins_remove_cart_button')
            miniCartItem.forEach(el => el.addEventListener('click', removeFromCart ) )
        }

        function removeFromCart(event){
            event.preventDefault();
            
            let action = 'blueins_cart_remove'                                                                                                              // Action
            let product_id = this.getAttribute('data-product_id')                                                                                           // Product ID
            let product_key = this.getAttribute('data-cart_item_key')                                                                                       // Item Key

            let preloader = `
                        <div class="preloader">
                            <svg version="1.1" id="L5" width="60px" height="60px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                                <circle fill="#fff" stroke="none" cx="6" cy="50" r="6">
                                <animateTransform 
                                    attributeName="transform" 
                                    dur="1s" 
                                    type="translate" 
                                    values="0 15 ; 0 -15; 0 15" 
                                    repeatCount="indefinite" 
                                    begin="0.1"/>
                                </circle>
                                <circle fill="#fff" stroke="none" cx="30" cy="50" r="6">
                                <animateTransform 
                                    attributeName="transform" 
                                    dur="1s" 
                                    type="translate" 
                                    values="0 10 ; 0 -10; 0 10" 
                                    repeatCount="indefinite" 
                                    begin="0.2"/>
                                </circle>
                                <circle fill="#fff" stroke="none" cx="54" cy="50" r="6">
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

            if( product_id ){

                sendRequest( {
                    method: 'GET',
                    url: AJAX_URL,
                    action,
                    data: {
                        product_id,
                        data_cart_item_key: product_key
                    },
                    onloadstart_callback(){
    
                        document.querySelector('.blueins_cart_center').insertAdjacentHTML('afterbegin', preloader)
                        $('body').css('overflow-y','hidden');
                        $('#cart-menu').addClass('right-ziro');
                        $('#cart-overlay').css('visibility','visible');
                        setTimeout(function(){
                            $('#cart-overlay').css('background','rgba(180,197,204, 0.4)');
                        }, 100);
    
                    }
                } )
                .then( data => document.querySelector('.blueins_cart_center').innerHTML = data )
                .catch( error => console.log(error) )

            }else{
                //console.log(this)
                //let event = new Event('click')
                //this.dispatchEvent(event)
            }

        }

    }


// *************************************************************************** DOM Content Loaded
})
