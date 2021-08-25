export class Blueins_Variation{
    constructor( options ){
        this.space = options.space
        this.setColorCircleContainer = this.space.querySelector(`#${options.circleContainerId}`)
        this.setColorNameContainer = this.space.querySelector(`#${options.circleNameContainerId}`)

        this.init()
    }

    init(){
        let optionsProductPaRazmer = this.space.querySelector('[data-attribute_name="attribute_pa_razmer"]')
        let optionsProductPaCzvet = this.space.querySelector('[data-attribute_name="attribute_pa_czvet"]')

        if( optionsProductPaRazmer ){
      
            let childrenRazmer = [ ...optionsProductPaRazmer.children ]
      
            let squareRazmer = createSquare( childrenRazmer, 'setElementHere__pa_razmer', space )
      
            updateHTML( squareRazmer[0], childrenRazmer, optionsProductPaRazmer, squareRazmer, 'setNameHere__pa_razmer', space )
      
            squareRazmer.forEach( circleEl => {
            circleEl.addEventListener('click', (event)=>{
                event.preventDefault();
      
                updateHTML( circleEl, childrenRazmer, optionsProductPaRazmer, squareRazmer, 'setNameHere__pa_razmer', space );
      
            })
            })
      
        }
        if( optionsProductPaCzvet ){
            this.colorInit( optionsProductPaCzvet )
        }
    }

    colorInit( selectPaCzvet ){
        let optionsPaCzvet = [ ...selectPaCzvet.options ]
            
        let colors = this.createCircle( optionsPaCzvet )
        console.log( colors )
        
        this.renderHTML( colors.first, optionsPaCzvet, selectPaCzvet, colors.list )
    
        colors.list.forEach( color => color.addEventListener( 'click', (e) => {
            e.preventDefault()
            this.renderHTML( e.target, optionsPaCzvet, selectPaCzvet, colors.list )
        } ) )
    }

    createCircle( optionsArray ){
        optionsArray.forEach( (child, childIndex) => {
            if( childIndex != 0 ){
                // Fint Color #Cod
                let colorCod = child.innerHTML.slice( child.innerHTML.indexOf('#') ).trim()
                let colorName = child.innerHTML.slice( 0, child.innerHTML.indexOf('#') ).trim()
        
                let HTML = `
                    <li class="details__colors__list__item" name="${ colorName }">
                        <span   class="details-select-circle element-select" 
                                style="background: ${ colorCod }" 
                                id="${ colorCod }" 
                                data-value="${child.value}">
                        </span>
                    </li>
                `

                this.setColorCircleContainer.insertAdjacentHTML('afterbegin', HTML)
            }
        } );

        return {
            first: this.setColorCircleContainer.querySelector( `li:first-child span` ),
            list: this.setColorCircleContainer.querySelectorAll( `.details__colors__list__item span` )
        }
    }

    createSquare( listArray, whereId ){
        let arraySquare = []

        listArray.forEach( (child, childIndex) => {
            if( childIndex != 0 ){
            let listContainer = space.querySelector( `#${whereId}` )

            let liElem = document.createElement('li')
            let spanElem = document.createElement('span')

            let razmerCod = child.value.slice( child.value.indexOf('#') )
            let razmerCodHTML = child.value.slice( child.value.indexOf('#') + 1 )
            let razmerName = child.value.slice( 0, child.value.indexOf('#') )

            spanElem.setAttribute('class', 'details-select-square')
            spanElem.setAttribute('id', razmerCod.trim());
            spanElem.textContent = razmerCodHTML

            liElem.setAttribute('class', 'details__razmer__list__item')
            liElem.setAttribute('name', razmerName)
            liElem.appendChild( spanElem )

            arraySquare.push( spanElem )
            listContainer.appendChild( liElem )
            }
        } )

        return arraySquare;
    }

    renderHTML( active, optionsHTML, selectHTML, list){
        for( let i=0; i < list.length; i++ ){
            list[i].classList.remove('element-select'); 
        }
        active.classList.add('element-select');
      
        let circleFirstValue = active.getAttribute('data-value');
        let selectedValue = optionsHTML.map( option => {
            if( option.value == circleFirstValue ) return option.value
        } )
      
        selectedValue = selectedValue.filter( optVal => {
           if( optVal != undefined ) return optVal 
        } );
        selectHTML.value = selectedValue
        //$( optionsWoo ).val(fullval[0]).change();
      
        // Set Name Color
        let name = selectHTML.querySelector(`[value="${selectedValue}"]`).innerHTML
        this.setColorNameContainer.innerHTML = name.slice( 0, name.indexOf('#') );
    }

    updateIMG(){

    }
}



/**
 * 
 * let options = {
 *  space: 'DOMElement',
 * }
 * 
 */