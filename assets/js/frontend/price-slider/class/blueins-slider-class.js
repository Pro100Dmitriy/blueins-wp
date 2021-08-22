import { blueins_get_posts } from '../blueins-get_posts'

export class Slider{

    _eventHandlers = {}

    constructor(option){
        this.container = this.createSlider(option.container)

        this.elem = this.container.querySelector('.noUi-base');
        this.thumbLower = this.elem.querySelector(option.thumbLower);
        this.thumbUpper = this.elem.querySelector(option.thumbUpper);
        this.min = Number(option.min);
        this.max = Number(option.max) + 5;
        this.idContainerMin = option.idContainerMin;
        this.idContainerMax = option.idContainerMax;

        this.minPrice;
        this.maxPrice;

        this.publickMinPrice;
        this.publickMaxPrice;

        this.initElem();

        this.nowUsing;
        this.sliderCoords;
        this.thumbCoords;
        this.shiftXLower;
        this.lowerX;
        this.shiftXUpper;
        this.upperX;

        this.elem.ondragstart = () => {
            return false;
        }

        this.elem.onmousedown = event => {this.startEvent(event, option)}
        this.elem.ontouchstart = event => {this.startEvent(event, option)}
    }

    createSlider(container){
        let div = `
            <div class="noUi-base">
                <div class="noUi-origin">
                    <div class="noUi-handle noUi-handle-lower"></div>
                </div>
                <div class="noUi-origin">
                    <div class="noUi-handle noUi-handle-upper"></div>
                </div>
            </div>
        `;
    
        container.insertAdjacentHTML('afterbegin', div);
        return container
    }

    startEvent(event, option){
        if( event.target.closest(option.thumbLower) ){
            this.nowUsing = this.thumbLower;
            if(event.type == 'touchstart') this.startDrag(event.changedTouches[0].clientX, event.changedTouches[0].clientY, event.type);
            if(event.type == 'mousedown') this.startDrag(event.clientX, event.clientY, event.type);
            return false;
        }else if(event.target.closest(option.thumbUpper)){
            this.nowUsing = this.thumbUpper;
            if(event.type == 'touchstart') this.startDrag(event.changedTouches[0].clientX, event.changedTouches[0].clientY, event.type)
            if(event.type == 'mousedown') this.startDrag(event.clientX, event.clientY, event.type);
            return false;
        }
    }

    initElem(){
        this.thumbLower.parentNode.style.left = '0%';
        this.thumbUpper.parentNode.style.left = '97%';

        let percentMin = 0
        let percentMax = 97
        this.minPrice = Math.round( this.min + ( ( (this.max - this.min) / 100) * percentMin ), 1 );
        this.maxPrice = Math.round( this.min + ( ( (this.max - this.min) / 100) * percentMax ), 1 );
        this.publickMinPrice = Math.round( this.min + ( ( (this.max - this.min) / 100) * percentMin ), 1 );
        this.publickMaxPrice = Math.round( this.min + ( ( (this.max - this.min) / 100) * percentMax ), 1 );

        let inputMin = document.querySelector(`#${this.idContainerMin}`);
        let inputMax = document.querySelector(`#${this.idContainerMax}`);
        inputMin.innerHTML = 'Br ' + this.minPrice;
        inputMax.innerHTML = 'Br ' + this.maxPrice;
    }

    startDrag(startClientX, startClientY, eventType) {
        this.thumbCoords = this.nowUsing.getBoundingClientRect();
        if( this.nowUsing === this.thumbLower){
            this.shiftXLower = startClientX - this.thumbCoords.left;
        }
        if( this.nowUsing === this.thumbUpper){
            this.shiftXUpper = startClientX - this.thumbCoords.left;
        }
        this.sliderCoords = this.elem.getBoundingClientRect();
        //console.log(eventType);
        if(eventType == 'touchstart'){
            this.addListener(document, 'touchmove', this.onDocumentMouseMove.bind(this), false);
            this.addListener(document, 'touchend', this.onDocumentMouseUp.bind(this), false);
        }
        if(eventType == 'mousedown'){
            this.addListener(document, 'mousemove', this.onDocumentMouseMove.bind(this), false);
            this.addListener(document, 'mouseup', this.onDocumentMouseUp.bind(this), false);
        }
    }

    moveTo(clientX) {
        let rightEdge = this.elem.offsetWidth - this.nowUsing.offsetWidth;
        let newLeftLower = clientX - this.shiftXLower - this.sliderCoords.left;
        let newLeftUpper = clientX - this.shiftXUpper - this.sliderCoords.left;

        if(newLeftLower < 0) {
            newLeftLower = 0;
        }
        if( newLeftLower > this.upperX ){
            newLeftLower = this.upperX-5;
        }

        if (newLeftUpper > rightEdge) {
            newLeftUpper = rightEdge;
        }
        if(newLeftUpper < this.lowerX){
            newLeftUpper = this.lowerX+5;
        }

        if( this.nowUsing === this.thumbLower ){
            let percent = Math.round( this.lowerX / ( this.sliderCoords.width / 100 ), 1 );
            this.lowerX = newLeftLower;
            this.minPrice = Math.round( this.min + ( ( (this.max - this.min) / 100) * percent ), 1 );
            this.nowUsing.parentNode.style.left = percent + '%';

            this.changeInputs();
        }
        if( this.nowUsing === this.thumbUpper ){
            let percent = Math.round( this.upperX / ( this.sliderCoords.width / 100 ), 1 );
            this.upperX = newLeftUpper;
            this.maxPrice = Math.round( this.min + ( ( (this.max - this.min) / 100) * percent ), 1 );
            this.nowUsing.parentNode.style.left = percent + '%';

            this.changeInputs();
        }
    }

    endDrag(e) {
        //console.log(e.type)
        if(e.type == 'touchend'){
            this.removeAllListeners(document, 'touchmove');
            this.removeAllListeners(document, 'touchend');
        }
        if(e.type == 'mouseup'){
            this.removeAllListeners(document, 'mousemove');
            this.removeAllListeners(document, 'mouseup');
        }
        
    }

    onDocumentMouseMove(e) {
        if(e.type == 'touchmove'){
            this.moveTo(e.changedTouches[0].clientX);
        }
        if(e.type == 'mousemove'){
            this.moveTo(e.clientX);
        }
    }

    onDocumentMouseUp(e) {
        this.endDrag(e);
        blueins_get_posts();
    }

    changeInputs(){
        let minPr, maxPr;

        if(this.minPrice == undefined) minPr = this.min;
        else minPr = this.minPrice
        if(this.maxPrice == undefined) maxPr = this.max - 5;
        else maxPr = this.maxPrice

        let inputMin = document.querySelector(`#${this.idContainerMin}`);
        let inputMax = document.querySelector(`#${this.idContainerMax}`);
        inputMin.innerHTML = 'Br ' + minPr;
        inputMax.innerHTML = 'Br ' + maxPr;
    }

    cahngeMinPosition(positionMin){
        this.minPrice = positionMin
        this.nowUsing = undefined
        this.sliderCoords = undefined
        this.thumbCoords = undefined
        this.shiftXLower = undefined
        this.lowerX = undefined
        this.thumbLower.parentNode.style.left = '0%';
        this.changeInputs()
    }

    cahngeMaxPosition(positionMax){
        this.maxPrice = positionMax
        this.nowUsing = undefined
        this.sliderCoords = undefined
        this.thumbCoords = undefined
        this.shiftXUpper = undefined
        this.upperX = undefined
        this.thumbUpper.parentNode.style.left = '97%';
        this.changeInputs()
    }

    // Suplement Funstion
    addListener(node, event, handler, capture) {
        if( !(node in this._eventHandlers) ) {
            this._eventHandlers[node] = {};
        }
        if( !(event in this._eventHandlers[node] )) {
            this._eventHandlers[node][event] = [];
        }
        this._eventHandlers[node][event].push([handler, capture]);
        node.addEventListener(event, handler, capture);
    }

    removeAllListeners(node, event) {
        if(node in this._eventHandlers) {
            var handlers = this._eventHandlers[node];
            if(event in handlers) {
                var eventHandlers = handlers[event];
                for(var i = eventHandlers.length; i--;) {
                    var handler = eventHandlers[i];
                    node.removeEventListener(event, handler[0], handler[1]);
                }
            }
        }
    }
}