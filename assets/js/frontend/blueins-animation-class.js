export class Animation{
    constructor(targetAnimationId, openerId, closerId){
        this.targetAnimation = document.getElementById( targetAnimationId ) ?? false
        this.opener = document.getElementById( openerId ) ?? false
        this.closer = document.getElementById( closerId ) ?? false
    }

    slideRight(){
        let cssStyleClose = `
            right: -100%
        `
        let cssStyleOpen = `
            right: 0
        `

        this.targetAnimation.style = cssStyleClose

        this.opener.addEventListener('click',(e) => {
            e.preventDefault()
            this.targetAnimation.style = cssStyleOpen
        })
        this.closer.addEventListener('click', (e) => {
            e.preventDefault()
            this.targetAnimation.style = cssStyleClose
        })
    }

    slideLeft(){
        let cssStyleClose = `
            left: -100%
        `
        let cssStyleOpen = `
            left: 0
        `

        this.targetAnimation.style = cssStyleClose

        this.opener.addEventListener('click',(e) => {
            e.preventDefault()
            this.targetAnimation.style = cssStyleOpen
        })
        this.closer.addEventListener('click', (e) => {
            e.preventDefault()
            this.targetAnimation.style = cssStyleClose
        })
    }

    fade(){
        let cssStyleClose = `
            left: 0;
            opacity: 0;
            visibility: hidden;
        `
        let cssStyleOpen = `
            left: 0;
            opacity: 1;
            visibility: visible;
        `

        this.targetAnimation.style = cssStyleClose
        setTimeout(()=>{
            this.targetAnimation.style = 'display: none'
        }, 500)

        this.opener.addEventListener('click',(e) => {
            e.preventDefault()
            this.targetAnimation.style = cssStyleClose
            setTimeout(()=>{
                this.targetAnimation.style = cssStyleOpen
            },100)
        })

        this.closer.addEventListener('click', (e) => {
            e.preventDefault()
            this.targetAnimation.style = cssStyleClose
            setTimeout(()=>{
                this.targetAnimation.style = 'display: none'
            }, 500)
        })
    }

}