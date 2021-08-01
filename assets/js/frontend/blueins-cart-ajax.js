document.addEventListener('DOMContentLoaded', event => {

    /**
     *      Common Functions
     */


    /**
     *      Add Cart Element
     */
    let productContainer = document.querySelector('#products__list-container')
    

    if(productContainer){

        const mutationProduct = new MutationObserver( mutation => {
            mutation.forEach( mut => {
                updateLinks();
            })
        })

        mutationProduct.observe( productContainer, {
            attributes: false,
            characterData: false,
            childList: true,
            subtree: false,
            attributeOldValue: false,
            characterDataOldValue: false
        });

        updateLinks()      

        function updateLinks(){
            let allAddToCartButtons = document.querySelectorAll('.blueins_add_to_cart')
            allAddToCartButtons.forEach( item => item.addEventListener('click', addToCart ) )
        }
        
        function addToCart(event){
            event.preventDefault()
        
            const ajax_url = woocommerce_params.ajax_url
            let link = this.getAttribute('href')
            let action = 'blueins_cart_add'
            let r = /add-to-cart=\d+/
            let add_to_cart = link.match(r) ? link.match(r)[0] : false
            let r2 = /\d+/
            let product_id = add_to_cart !== false ? add_to_cart.match(r2)[0] : false

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

            function addRequest(method, url, action, product_id){
                return new Promise( (resolve, reject) => {
                    const xhr = new XMLHttpRequest();

                    xhr.open(method, url + `?action=${action}&product_id=${product_id}`);
                    xhr.onloadstart = () => {
                        document.querySelector('.blueins_cart_center').insertAdjacentHTML('afterbegin', preloader)

                        $('body').css('overflow-y','hidden');
                        $('#cart-menu').addClass('right-ziro');
                        $('#cart-overlay').css('visibility','visible');
                        setTimeout(function(){
                            $('#cart-overlay').css('background','rgba(180,197,204, 0.4)');
                        }, 100);
                    }
                    xhr.onload = () => {
                        resolve(xhr.response)
                    }
                    xhr.onerror = () => {
                        reject(xhr.response)
                    }
                    xhr.send()
                })
            }

            if( product_id ){
                addRequest('GET', ajax_url, action, product_id)
                    .then( data => {
                        //console.log(data)
                        document.querySelector('.blueins_cart_center').innerHTML = data
                    } )
                    .catch( error => {
                        //console.log(error)
                    } )
            }else{
                //console.log(this)
                //let event = new Event('click')
                //this.dispatchEvent(event)
            }

        }

    }

    /**
     *      Add To Cart Single Product Page
     */

    let button_single_page = document.querySelector('.single_add_to_cart_button')

    if(button_single_page){

        button_single_page.addEventListener('click', addToCartSingle)

        function addToCartSingle(event){
            event.preventDefault()

            const ajax_url = woocommerce_params.ajax_url
            let action = 'blueins_cart_add_single'
            let product_id = document.querySelector('input[name="product_id"]') ? document.querySelector('input[name="product_id"]').value : document.querySelector('.single_add_to_cart_button').value
            let product_qty = document.querySelector('#quantity').value ? document.querySelector('#quantity').value : 1
            let variaction_id = document.querySelector('input[name="variation_id"]') ? document.querySelector('input[name="variation_id"]').value : ''
            let color = document.querySelector('#czvet') ? document.querySelector('#czvet').value.replace(' #', '_') : ''
            let size = document.querySelector('#razmer') ? document.querySelector('#razmer').value.replace(' #', '_') : ''

            //console.log(product_id, product_qty, variaction_id, color, size)

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

            function addSingleRequest(method, url, action, product_id, product_qty = 1, variaction_id = '', color = '', size = '' ){
                return new Promise( (resolve, reject) => {
                    const xhr = new XMLHttpRequest();

                    xhr.open(method, url + `?action=${action}&product_id=${product_id}&product_qty=${product_qty}&variaction_id=${variaction_id}&color=${color}&size=${size}`);
                    xhr.onloadstart = () => {
                        document.querySelector('.blueins_cart_center').insertAdjacentHTML('afterbegin', preloader)

                        $('body').css('overflow-y','hidden');
                        $('#cart-menu').addClass('right-ziro');
                        $('#cart-overlay').css('visibility','visible');
                        setTimeout(function(){
                            $('#cart-overlay').css('background','rgba(180,197,204, 0.4)');
                        }, 100);
                    }
                    xhr.onload = () => {
                        resolve(xhr.response)
                    }
                    xhr.onerror = () => {
                        reject(xhr.response)
                    }
                    xhr.send()
                })
            }

            if( product_id ){
                addSingleRequest('GET', ajax_url, action, product_id, product_qty, variaction_id, color, size)
                    .then( data => {
                        //console.log(data)
                        document.querySelector('.blueins_cart_center').innerHTML = data
                    } )
                    .catch( error => {
                        //console.log(error)
                    } )
            }else{
                //console.log(this)
                //let event = new Event('click')
                //this.dispatchEvent(event)
            }
            
        }

    }

    /**
     *      Remove Cart Element
     */
    let cartMenu = document.querySelector('#cart-menu')

    const mutationCart = new MutationObserver( mutCart => {
        mutCart.forEach( mC => {
            updateRemoveLinks()
        })
    })

    mutationCart.observe( cartMenu, {
        attributes: true,
        characterData: true,
        childList: true,
        subtree: true,
        attributeOldValue: true,
        characterDataOldValue: true
    });

    function updateRemoveLinks(){
        let miniCartItem = document.querySelectorAll('.blueins_remove_cart_button')
        miniCartItem.forEach(el => el.addEventListener('click', removeFromCart ) )
    }

    updateRemoveLinks()

    function removeFromCart(event){
        event.preventDefault();
        
        const ajax_url = woocommerce_params.ajax_url;
        let product_id = this.getAttribute('data-product_id')
        let data_cart_item_key = this.getAttribute('data-cart_item_key')
        let action = 'blueins_cart_remove'

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

        function addRequest(method, url, action, product_id, product_key){
            return new Promise( (resolve, reject) => {
                const xhr = new XMLHttpRequest();
    
                xhr.open(method, url + `?action=${action}&product_id=${product_id}&data_cart_item_key=${product_key}`);
                xhr.onloadstart = () => {
                    document.querySelector('.blueins_cart_center').insertAdjacentHTML('afterbegin', preloader)

                    $('body').css('overflow-y','hidden');
                    $('#cart-menu').addClass('right-ziro');
                    $('#cart-overlay').css('visibility','visible');
                    setTimeout(function(){
                        $('#cart-overlay').css('background','rgba(180,197,204, 0.4)');
                    }, 100);
                }
                xhr.onload = () => {
                    resolve(xhr.response)
                }
                xhr.onerror = () => {
                    reject(xhr.response)
                }
                xhr.send()
            })
        }

        if( product_id ){
            addRequest('GET', ajax_url, action, product_id, data_cart_item_key)
                .then( data => {
                    //console.log(data)
                    document.querySelector('.blueins_cart_center').innerHTML = data
                } )
                .catch( error => {
                    //console.log(error)
                } )
        }
    }

    

})
