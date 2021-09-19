import { css, sendRequest } from './utils'

const AJAX_URL = woocommerce_params.ajax_url
const $search = search()

export function blueins_product_search(){
    if( !$search ){ return }
    
    $search.UI.$input.addEventListener( 'input', input )

    $search.openButton.addEventListener('click', e => {
        e.preventDefault()
        $search.open()
        css(document.querySelector('body'),{
            'overflow-y': 'hidden'
        })
    })
    $search.closeButton.addEventListener('click', e => {
        e.preventDefault()
        $search.close()
        css(document.querySelector('body'),{
            'overflow-y': 'scroll'
        })
    })
}



function input(event){
    let messege = event.target.value

    setTimeout( () => {
        sendRequest( {
            method: 'GET',
            url: AJAX_URL,
            action: 'blueins_search',
            data: {
                messege
            },
            onloadstart_callback(){
                $search.preloader_on()
            }
        } )
        .then( data => {
            $search.preloader_off()
            $search.UI.$search_result.innerHTML = data
        } )
        .catch( error => {
            console.log( error )
        } )
    }, 1000 )
}



function search(){
    let openButton = document.querySelector('#search-icon-menu')
    let closeButton = document.querySelector('#blueins-search-bar_popup-colose')
    let $bar = document.querySelector('#blueins-search-bar')
    let $overlay = document.querySelector('#blueins-search-bar-overlay')

    /** UI */
    let $input = $bar.querySelector('.search-input')
    let $search_result = $bar.querySelector('.search-result__container')
    let $icon_container = $bar.querySelector('.search-icon')
    let $preloader = `
                <div class="preloader">
                    <svg version="1.1" id="L5" width="45px" height="45px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                        <circle fill="#000" stroke="none" cx="6" cy="50" r="6">
                        <animateTransform 
                            attributeName="transform" 
                            dur="1s" 
                            type="translate" 
                            values="0 15 ; 0 -15; 0 15" 
                            repeatCount="indefinite" 
                            begin="0.1"/>
                        </circle>
                        <circle fill="#000" stroke="none" cx="30" cy="50" r="6">
                        <animateTransform 
                            attributeName="transform" 
                            dur="1s" 
                            type="translate" 
                            values="0 10 ; 0 -10; 0 10" 
                            repeatCount="indefinite" 
                            begin="0.2"/>
                        </circle>
                        <circle fill="#000" stroke="none" cx="54" cy="50" r="6">
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
    let $icon = `
                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 45 45"><path d="M19.589,18.322l-3.008-2.965a9.386,9.386,0,1,0-1.224,1.224l3.009,2.965a.866.866,0,1,0,1.224-1.224ZM1.732,9.373a7.641,7.641,0,1,1,7.641,7.641A7.65,7.65,0,0,1,1.732,9.373Z" transform="translate(13 12)" fill="#000"/><rect width="45" height="45" fill="none"/></svg>
    `
    let $clear = `
                <button class="close-button blueins-search-clear">Clear text</button>
    `

    if( !openButton || !closeButton || !$bar || !$overlay || !$input || !$search_result || !$icon_container ){
        return false
    }

    return {
        openButton,
        closeButton,
        $bar,
        UI: {
            $input,
            $search_result,
            $icon_container
        },
        open(){
            css( $bar, {
                top: '0%'
            } )

            css( $overlay, {
                opacity: 1,
                visibility: 'visible'
            } )
        },
        close(){
            css( $bar, {
                top: '-150%'
            } )

            css( $overlay, {
                opacity: 0,
                visibility: 'hidden'
            } )
        },
        preloader_on(){
            $icon_container.innerHTML = $preloader
        },
        preloader_off(){
            if( $input.value != '' ){
                $icon_container.innerHTML = $clear
                let clear_button = $icon_container.querySelector('.blueins-search-clear')
                clear_button.addEventListener( 'click', e => {
                    e.preventDefault()
                    $input.value = ''
                    $search_result.innerHTML = ''
                } )
            }else{
                $icon_container.innerHTML = $icon
            }
        },
        clearInput(){
            $input.value = ''
        }
    }
}