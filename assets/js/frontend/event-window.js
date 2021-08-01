import { Animation } from "./blueins-animation-class"

export class EventWindow extends Animation{
    constructor(option){
        super(option.targetAnimationId, option.openerId, option.closerId)
        /**
         * Returned:    this.targetAnimation
         *              this.opener
         *              this.closer
         */

        this.targetElement = document.getElementById(option.targetElementId)

        if( option.typeAnimation == 'slideRight' ){
            let windowWidth = document.documentElement.clientWidth;

            if(!option.media){
                this.slideRight();
                return
            }
            
            option.media.forEach( breakpoint => {
                if( breakpoint.breakpoint >= windowWidth ){
                    this.fade()
                }else{
                    this.slideRight()
                }
            } )
            
        }
        if( option.typeAnimation == 'fade' ){
            this.fade()
        }
        if( option.typeAnimation == 'parralax' ){
            this.parralaxImg()
        }
    }

    parralaxImg(){
        if( !this.targetElement ) return
        let parallax = this.targetElement
        let height = parallax.getBoundingClientRect().height
        let coverHeight = parallax.parentNode.getBoundingClientRect().height
        let maxTranslate = height - coverHeight
        let firstPageHeight = document.documentElement.clientHeight
        
        document.addEventListener('scroll', ()=>{
            let percent2 = (firstPageHeight - window.pageYOffset) / firstPageHeight
            parallax.style = `transform: translate(-50%, -${ maxTranslate - (maxTranslate * percent2) + 'px'})`
        })
    }
}



