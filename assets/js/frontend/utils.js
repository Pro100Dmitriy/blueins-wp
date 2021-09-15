export function mutation_observe( $element, callback, settings = {
    attributes: true,
    characterData: true,
    childList: true,
    subtree: true,
    attributeOldValue: true,
    characterDataOldValue: true
} ){

    const mutationProduct = new MutationObserver( mutation => {
        mutation.forEach( mut => {
            callback();
        })
    })

    mutationProduct.observe( $element, settings);

}



/*

sendRequest( {
    method: 'GET',
    url: ajax_url,
    action: 'loadmore',
    data: {
        category: category_id,
        min,
        max,
        order,
        taxonomyID: taxonomy
    },
    onloadstart_callback(){
        
    }
} )
.then( data => {

} )
.catch( error => {

} )

*/
export function sendRequest( sendObject ){
    return new Promise( (resolve, reject) => {
        const xhr = new XMLHttpRequest()

        let dataURL = ''
        let dataKeys = Object.keys( sendObject.data )
        dataKeys.forEach( key => {
            dataURL += `&${key}=${sendObject.data[key]}`
        } )

        xhr.open( sendObject.method, sendObject.url + `?action=${sendObject.action}` + dataURL )
        xhr.onloadstart = sendObject.onloadstart_callback()
        xhr.onload = () => {
            resolve( xhr.response )
        }
        xhr.onerror = () => {
            reject( xhr.response )
        }
        xhr.send()

    } )
}



export function css(el, styles = {}){
    Object.assign(el.style, styles)
}