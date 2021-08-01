import {Animation} from './blueins-animation-class'



export class FullscreenMenu extends Animation{

    constructor(obj){
        super(obj.menuId, obj.openerId, obj.closerId)
        /**
         * Returned:    this.targetAnimation
         *              this.opener
         *              this.closer
         */

        this.$subMenus = document.querySelectorAll( '.' + obj.classSubMenus ) ?? false
        this.$fullscreenMenu = this.targetAnimation.querySelector('.fullscreen-menu__nav')

        this.typeAnimation = obj.typeAnimation
        this.media = obj.media
        
        if( this.targetAnimation || this.opener || this.closer ){
            this.init()
            this.initNavList()
        }else{
            throw new Error('TypeError')
        }
        
    }



    init(){

        if( this.$subMenus[0] ) this.initSubMenu()

        let windowWidth = document.documentElement.clientWidth;
        this.media.forEach( item => {
            if( item.breakpoint >= windowWidth ){
                this.fade()
            }else{
                this.slideLeft()
            }
        } )
    }



    initNavList(){
        let nav_list_items = this.targetAnimation.querySelectorAll('.fullscreen__nav__list__item')

        nav_list_items.forEach( item => item.addEventListener( 'mouseover', this.mouseoverEvent ) )
    }



    mouseoverEvent(event){
        event.preventDefault()
        let nav_list_items = document.querySelectorAll('.fullscreen__nav__list__item')

        nav_list_items.forEach( item => item.classList.remove('curent-hover') )

        this.classList.add('curent-hover')
    }



    initSubMenu(){
        let button = `<button class="close-submenu">Назад</button>`

        this.$fullscreenMenu.style = `right: 0;`

        this.$subMenus.forEach( sub => {
            sub.insertAdjacentHTML( 'afterbegin', button )

            sub.parentNode.querySelector('span').addEventListener( 'click', this.openSubMenu.bind(this) )
            sub.querySelector('.close-submenu').addEventListener( 'click', this.closeSubMenu.bind(this) )
        })
    }



    openSubMenu(event){
        event.preventDefault()

        let $fullscreen__navList = event.target.getAttribute('alt') ? event.target.parentNode.parentNode : event.target.parentNode

        $fullscreen__navList.querySelector('.fullscreen__sub-menu ').style = `display: block;`
        this.$fullscreenMenu.style = `right: calc(100% + 15px);`
    }



    closeSubMenu(event){
        event.preventDefault()

        let $backButton = event.target.parentNode

        $backButton.style = `display: none;`
        this.$fullscreenMenu.style = `right: 0;`
    }

}