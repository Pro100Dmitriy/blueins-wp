export class Blueins_Collapse{
    constructor( settings = {} ){
        if( !settings.list ) return

        this.$list = settings.list
        this.margin = settings.margin
        this.cssClass = settings.class
        this.$ = settings.jquery
        
        this.collapse_list()
    }

    collapse_list(){
        let titles = this.$list.querySelectorAll('.collaps-title')
        titles.forEach( title => {
            if( title.hasAttribute('data-collapse-breakpoint') ){
                let breakpoint = title.getAttribute('data-collapse-breakpoint')
                let window = document.documentElement.clientWidth
                if( breakpoint >= window ){
                    this.init(title)
                }
            }else{
                this.init(title)
            }
        } )
    }

    init( title ){
        if( title.hasAttribute('data-collapse') & title.getAttribute('data-collapse') == 'true' ){
            let list = title.parentNode
            let item_nav = list.querySelector('.item__nav')
            this.close( item_nav, list )
        }
        title.addEventListener( 'click', this.collapse.bind(this) )
    }
      
    collapse(event){
        event.preventDefault
        let item_nav, list

        if( !event.target.parentNode.classList.contains('collapsible') ){
            list = event.target.parentNode.parentNode
            item_nav = list.querySelector('.item__nav')
        }else{
            list = event.target.parentNode
            item_nav = list.querySelector('.item__nav')
        }
      
        if( item_nav.getAttribute('style') == 'overflow: hidden; height: 0px;' ){
            this.open( item_nav, list )
        }else{
            this.close( item_nav, list )
        }
    }

    close( item_nav, list ){
        item_nav.setAttribute('old_height', item_nav.getBoundingClientRect().height )
        this.$( item_nav ).css('overflow', 'hidden')
        this.$( list ).addClass( this.cssClass );
        this.$( list ).css('margin-bottom', '0px')
        this.$( item_nav ).animate({height: 0}, 5)
    }

    open( item_nav, list ){
        setTimeout( () => {
            this.$( item_nav ).css('overflow', 'visible')
        }, 100 )
        this.$( list ).removeClass( this.cssClass );
        this.$( list ).css('margin-bottom', this.margin)
        this.$( item_nav ).animate({height: item_nav.getAttribute('old_height')}, 5)
    }
}