export class Blueins_Color_Filters{
    constructor( options ){
        this.space = document.querySelector( `.${options.space}` ) ?? null
        if( this.space ){
            // With Pa_
            this.filter_setColorPaCircleContainer = this.space.querySelector(`#${options.colorPaContainerId}`)
            this.filter_setRazmerPaSquareContainer = this.space.querySelector(`#${options.razmerPaContainerId}`)
            this.$ = options.jquery
            this.filter_init()
        }
    }

    filter_init(){
        let optionsProductPaCzvet = this.space.querySelector('[id="pa_czvet"]')
        let optionsProductPaRazmer = this.space.querySelector('[id="pa_razmer"]')
        if( optionsProductPaCzvet ){
            this.filter_colorInit( optionsProductPaCzvet, this.filter_setColorPaCircleContainer )
        }
        if( optionsProductPaRazmer ){
            this.filter_razmerInit( optionsProductPaRazmer, this.filter_setRazmerPaSquareContainer )
        }
    }

    filter_colorInit( selectPaCzvet, container ){
        let optionsPaCzvet = [ ...selectPaCzvet.options ]
            
        let colors = this.createCircle( optionsPaCzvet, container )
        //this.filter_renderHTML( colors.first, optionsPaCzvet, selectPaCzvet, colors.list )
    
        colors.list.forEach( color => color.addEventListener( 'click', (e) => {
            e.preventDefault()
            this.filter_renderHTML( e.target, optionsPaCzvet, selectPaCzvet, colors.list )
        } ) )
    }

    filter_razmerInit( selectPaRazmer, container ){
        let optionsPaRazmer = [ ...selectPaRazmer.options ]
      
        let razmers = this.createSquare( optionsPaRazmer, container )
        //this.filter_renderHTML( razmers.first, optionsPaRazmer, selectPaRazmer, razmers.list )
  
        razmers.list.forEach( razmer => razmer.addEventListener( 'click', (e) => {
            e.preventDefault()
            this.filter_renderHTML( e.target, optionsPaRazmer, selectPaRazmer, razmers.list )
        } ) )
    }

    filter_renderHTML( active, optionsHTML, selectHTML, list ){
        if( active.classList.contains('details-select-circle') || active.classList.contains('details-select-square') ){
            active = active.parentNode
        }else if( active.classList.contains('details__colors__list__item') || active.classList.contains('details__razmer__list__item') ){
            active = active.firstChild
        }else{
            active = active
        }
        
        if( active.classList.contains('element-select') ){
            active.classList.remove('element-select')
        }else{
            active.classList.add('element-select')
        }
      
        let circleFirstValue = active.getAttribute('data-value')
        let selectedValue = optionsHTML.map( option => {
            if( option.value == circleFirstValue ) {
                return option.value
            }
        } )
      
        selectedValue = selectedValue.filter( optVal => {
           if( optVal != undefined ) return optVal 
        } );
        
        //selectHTML.value = selectedValue
        this.$( selectHTML ).val(selectedValue[0]).change();
    }

    createCircle( optionsArray, container ){
        optionsArray.forEach( (child, childIndex) => {
            if( childIndex != 0 ){
                let colorCod = child.innerHTML.slice( child.innerHTML.indexOf('#') ).trim()
                let colorName = child.innerHTML.slice( 0, child.innerHTML.indexOf('#') ).trim()

                let HTML = `
                    <li class="details__colors__list__item" name="${ colorName }">
                        <div class="color-bg">
                            <span   class="details-select-circle" 
                                    style="background: ${ colorCod }" 
                                    id="${ colorCod }" 
                                    data-value="${child.value}">
                            </span>
                        </div>
                    </li>
                `

                container.insertAdjacentHTML('afterbegin', HTML)
            }
        } );

        return {
            first: container.querySelector( `li:first-child div` ),
            list: container.querySelectorAll( `.details__colors__list__item div` )
        }
    }

    createSquare( optionsArray, container ){
        optionsArray.forEach( (child, childIndex) => {
            if( childIndex != 0 ){
                let razmerCod = child.innerHTML.slice( child.innerHTML.indexOf('#') ).trim()
                let razmerCodHTML = child.innerHTML.slice( child.innerHTML.indexOf('#') + 1 )
                let razmerName = child.innerHTML.slice( 0, child.innerHTML.indexOf('#') )

                let HTML = `
                    <li class="details__razmer__list__item" name="${ razmerName }">
                        <div class="razmer-bg">
                            <span   class="details-select-square"
                                    id="${ razmerCod }" 
                                    data-value="${child.value}">
                            ${razmerCodHTML}
                            </span>
                        </div>
                    </li>
                `

                container.insertAdjacentHTML('afterbegin', HTML)
            }
        } )

        return {
            first: container.querySelector( `li:first-child div` ),
            list: container.querySelectorAll( `.details__razmer__list__item div` )
        };
    }
}