export function mutation_observe( $element, callback, settings = {
    attributes: true,
    characterData: true,
    childList: true,subtree: true,
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
    onloadstart_callback(){},
    onload_callback(){},
    onerror_callback(){}
}
*/
export function sendRequest( sendObject ){
    return new Promise( (resolve, reject) => {
        const xhr = new XMLHttpRequest();

        xhr.open( sendObject.method, sendObject.url + `?action=${sendObject.action}&product_id=${sendObject.product_id}`);
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