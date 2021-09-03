import { css } from './utils'


export function blueins_product_search(){
    const $search = search()
    $search.openButton.addEventListener('click', e => {
        e.preventDefault()
        $search.open()
    })
    $search.closeButton.addEventListener('click', e => {
        e.preventDefault()
        $search.close()
    })
}


function search(){
    let openButton = document.querySelector('#search-icon-menu')
    let closeButton = document.querySelector('#blueins-search-bar_popup-colose')
    let $bar = document.querySelector('#blueins-search-bar')
    let $overlay = document.querySelector('#blueins-search-bar-overlay')
    return {
        openButton,
        closeButton,
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