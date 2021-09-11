import { css } from './utils'


export function blueins_product_search(){
    const $search = search()

    let search_input = $search.$bar.querySelector('.search-input')
    search_input.addEventListener( 'input', input )

    $search.openButton.addEventListener('click', e => {
        e.preventDefault()
        $search.open()
    })
    $search.closeButton.addEventListener('click', e => {
        e.preventDefault()
        $search.close()
    })
}



function input(){
    console.log( event.target.value )
}



function search(){
    let openButton = document.querySelector('#search-icon-menu')
    let closeButton = document.querySelector('#blueins-search-bar_popup-colose')
    let $bar = document.querySelector('#blueins-search-bar')
    let $overlay = document.querySelector('#blueins-search-bar-overlay')
    return {
        openButton,
        closeButton,
        $bar,
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
                top: '-50%'
            } )

            css( $overlay, {
                opacity: 0,
                visibility: 'hidden'
            } )
        }
    }
}