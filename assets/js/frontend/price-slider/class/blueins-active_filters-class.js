import { css } from "../../utils";
import { blueins_get_posts } from "../blueins-get_posts";

export class Active_Filters{
    $filter = document.querySelector('#prod-filter-menu')

    constructor( object ){
        this.list = this.create_AF()
        this.sliderEl1 = object.priceSlider

        if( this.space && options.type == 'filter' ){
            // With Pa_
            this.filter_setColorPaCircleContainer = this.space.querySelector(`#${options.colorPaContainerId}`)
            this.filter_setRazmerPaSquareContainer = this.space.querySelector(`#${options.razmerPaContainerId}`)
            this.$ = options.jquery
            this.filterinit()
        }
    }

    create_AF(){
        let filterList = this.$filter.querySelector('.customs__list')
        let template = `
            <li id="activeFilters" style="display: none;" class="customs__list__item">
                <div class="customs__list__item__title">
                    <h6 class="groupe-cust-title">Активные фильтры</h6>
                </div>
                <div class="item__nav">
                    <ul class="product-categories-active ul-selected-active"></ul>
                </div>
            </li>
        `
        filterList.insertAdjacentHTML('afterbegin', template)
        return this.$filter.querySelector('.product-categories-active')
    }

    add(categorys_id, min, max){
        let $activeFilters = this.$filter.querySelector('#activeFilters')
        if(categorys_id.length == 0 && min == this.sliderEl1.publickMinPrice && max == this.sliderEl1.publickMaxPrice){
            css($activeFilters,{
                display: 'none'
            })
        }else{
            css($activeFilters,{
                display: 'block'
            })
        }

        let activeCat = categorys_id.map( item => {
            let obj = this.$filter.querySelector(`.cat-item-${item}`)
            return obj.innerHTML
        } )
    
        let template = activeCat.map( (item, index)=> `<li data-cat-id="${categorys_id[index]}" class="cat-item-active cart-item-selected-active">${item}</li>`)

        if( min != this.sliderEl1.publickMinPrice ){
            template.push(`<li data-cat-min="${min}" class="cat-item-active cart-item-selected-active"><a href="#">Мин: ${min}</a></li>`)   
        }
        if( max != this.sliderEl1.publickMaxPrice ){
            template.push(`<li data-cat-max="${max}" class="cat-item-active cart-item-selected-active"><a href="#">Макс: ${max}</a></li>`)
        }

        template.push(`<li data-remove-all class="cat-item-active cart-item-selected-active cart-item-remove-all"><a href="#">Очистить фильтры</a></li>`)
        this.list.innerHTML = template.join('');
    
        this.list.querySelectorAll('.cat-item-active').forEach( item => item.addEventListener( 'click', this.remove.bind(this) ) )
    }

    remove(e){
        e.preventDefault();

        if( e.target.parentNode.hasAttribute('data-cat-id') ){
            let removeClassFrom = document.querySelector(`.cat-item-${e.target.parentNode.getAttribute('data-cat-id')}`)
            removeClassFrom.classList.remove('cart-item-selected')
            removeClassFrom.parentNode.classList.remove('ul-selected')
        }
        if( e.target.parentNode.hasAttribute('data-cat-min') ){
            this.sliderEl1.cahngeMinPosition( this.sliderEl1.publickMinPrice )
        }
        if( e.target.parentNode.hasAttribute('data-cat-max') ){
            this.sliderEl1.cahngeMaxPosition( this.sliderEl1.publickMaxPrice )
        }
        if( e.target.parentNode.hasAttribute('data-remove-all') ){

            for( let node of this.list.children ){
                if( node.hasAttribute('data-cat-id') ){
                    let removeClassFrom = document.querySelector(`.cat-item-${node.getAttribute('data-cat-id')}`)
                    removeClassFrom.classList.remove('cart-item-selected')
                    removeClassFrom.parentNode.classList.remove('ul-selected')
                }
                if( node.hasAttribute('data-cat-min') ){
                    this.sliderEl1.cahngeMinPosition( this.sliderEl1.publickMinPrice )
                }
                if( node.hasAttribute('data-cat-max') ){
                    this.sliderEl1.cahngeMaxPosition( this.sliderEl1.publickMaxPrice )
                }
            }

        }

        blueins_get_posts()
    }
    
}