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
const sendObject = {
    method: 'GET',
    url: ajax_url,
    action,
    product_id,
    priduct_qty,
    variation_id,
    color,
    size,
    onloadstart_callback(){},
}
*/
export function sendRequest( sendObject ){
    return new Promise( (resolve, reject) => {
        const xhr = new XMLHttpRequest();

        xhr.open( sendObject.method, sendObject.url + sendObject.query )
        
        xhr.onloadstart = sendObject.onloadstart_callback()
        xhr.onload = () => {
            resolve(xhr.response)
        }
        xhr.onerror = () => {
            reject(xhr.response)
        }
        xhr.send()
    })
}