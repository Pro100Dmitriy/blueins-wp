import '../sass/style.sass'

import {EventWindow} from './frontend/event-window'
import {FullscreenMenu} from './frontend/blueins-fullscreen-menu'
import {mutation_observe} from './frontend/utils'
import {Blueins_Variation} from './frontend/blueins-variation-class'
import {blueins_product_search} from './frontend/blueins-product-search'
import { Blueins_Collapse } from './frontend/blueins-collapse-class'


const start_img_animation = new EventWindow({
  typeAnimation: 'parralax',
  targetElementId: 'parallax_img',
})

const fullscreenMenu = new FullscreenMenu( {
  menuId: 'fullscreen-menu',
  openerId: 'burger__button',
  closerId: 'close-fullscreen-menu-button',
  classSubMenus: 'fullscreen__sub-menu',
  typeAnimation: 'slide',
  media: [
      {
          breakpoint: 480,
          typeAnimation: 'fade'
      }
  ]
} )




let TOP_HEADER = 0
let wppanel = document.querySelector('#wpadminbar')

if( wppanel ){
  TOP_HEADER = wppanel.getBoundingClientRect().height
}

const header = document.querySelector('.header')
const { height } = document.querySelector('.header__top').getBoundingClientRect()
const $header_bottom = document.querySelector('#header__bottom-cover')
const $go_to_top = document.querySelector('#go-to-top')


document.addEventListener( 'DOMContentLoaded', headerAnimation )
document.addEventListener( 'DOMContentLoaded', go_to_topAnimation )
document.addEventListener( 'DOMContentLoaded', go_to_topView )

/**
 *      Header
 */
document.addEventListener( 'wheel', headerAnimation )
document.addEventListener( 'touchmove', headerAnimation )

function headerAnimation(event){
  
  if( $(window).scrollTop() >= 10 ){
    header.style = `top: -${height + 2}px`
    $header_bottom.classList.add('header__bottom-fixed')
    $header_bottom.style = `top: ${TOP_HEADER}px`
  }else{
    header.style = `top: ${TOP_HEADER}px`
    $header_bottom.classList.remove('header__bottom-fixed')
    $header_bottom.style = `top: 0px`
  }

}

/**
 *      Search
 */
blueins_product_search()



/**
 *      Go To Top
 */
$go_to_top.addEventListener( 'click', go_to_topAnimation )
window.addEventListener( 'wheel', go_to_topView )
window.addEventListener( 'touchmove', go_to_topView )

function go_to_topAnimation(event){

  $('html, body').animate({scrollTop: 0}, 600);
  $('#go-to-top').addClass('hidden');

  setTimeout( () => {

    if( $(window).scrollTop() < height ){
      header.style = `top: ${TOP_HEADER}px`
      $header_bottom.classList.remove('header__bottom-fixed')
    }

  }, 600 )
  
}

function go_to_topView(){

  if( $(window).scrollTop() >= 1000 ){
    $go_to_top.classList.remove('hidden');
  }else{
    $go_to_top.classList.add('hidden');
  }

}



/**
 *      Filter Menu
 */
$('#prod-filter_open-menu').on('click',function(e){
  e.preventDefault;
  $('#prod-filter-menu').addClass('left-ziro');
  $('#prod-filter-overlay').css('visibility','visible');
  setTimeout(function(){
    $('#prod-filter-overlay').css('background','rgba(180,197,204, 0.4)');
  }, 100);
})
$('#close-button-prod-filter').on('click',function(e){
  e.preventDefault;
  $('#prod-filter-menu').removeClass('left-ziro');
  $('#prod-filter-overlay').css('background','rgba(180,197,204, 0)');
  setTimeout(function(){
    $('#prod-filter-overlay').css('visibility', 'hidden');
  }, 400);
})



/**
 *      Collapse
 */

const $filter = new Blueins_Collapse({
  list: document.querySelector('#prod-filter-menu .customs__list'),
  class: 'cust-active',
  margin: '2.5rem',
  jquery: $
})


const $footer = new Blueins_Collapse({
  list: document.querySelector('.footer__links'),
  class: 'footer-item-active',
  margin: '5rem',
  jquery: $
})


/**
 *      Collapse
 */


/**
 *      Variations
 */
const variation = new Blueins_Variation({
  space: 'information-product',
  colorPaContainerId: 'setElementHere__pa_czvet',
  colorPaNameContainerId: 'setNameHere__pa_czvet',
  razmerPaContainerId: 'setElementHere__pa_razmer',
  razmerPaNameContainerId: 'setNameHere__pa_razmer',
  colorContainerId: 'setElementHere__czvet',
  colorNameContainerId: 'setNameHere__czvet',
  razmerContainerId: 'setElementHere__razmer',
  razmerNameContainerId: 'setNameHere__razmer',
  jquery: $
})




// Cart Menu
$(document).ready(function(){

  $('#cart-icon-menu').on('mousemove',function(e){
    e.preventDefault();

    let $el_menu = document.getElementById('cart-menu');

    if( $el_menu ){

      $('#cart-icon-menu').on('click',function(e){

        e.preventDefault();
        $('body').css('overflow-y','hidden');
        $('#cart-menu').addClass('right-ziro');
        $('#cart-overlay').css('visibility','visible');
        setTimeout(function(){
          $('#cart-overlay').css('background','rgba(180,197,204, 0.4)');
        }, 100);

      });

    }else{
      $(this).addClass('cart-hov-view-information');
    }

  });

  $('#blueins-close-mini-cart-button').on('click',function(e){
    $('body').css('overflow-y','scroll');
    $('#cart-menu').removeClass('right-ziro');
    $('#cart-overlay').css('background','rgba(180,197,204, 0)');
    setTimeout(function(){
      $('#cart-overlay').css('visibility', 'hidden');
    }, 400);
  });

});




// Menu
$('.main-menu__item').on('mouseover',function(e){
  if(this.childNodes[3]){
    $('.header__bottom').addClass('white-bg')
  }else{
    //console.log('bad');
  }
})
$('.main-menu__item').on('mouseout',function(e){
  if(this.childNodes[3]){
    $('.header__bottom').removeClass('white-bg')
  }else{
    //console.log('bad');
  }
})



//Email
$('#fotter-email').on('focus',function(e){
  $('#fotter-email-label').addClass('label-focus');
});
$('#fotter-email').on('blur',function(e){
  if(this.value){

  }else{
    $('#fotter-email-label').removeClass('label-focus');
  }
});





//el-form
let elInput;

$(document).ready( () => {
  let elements = document.getElementsByClassName('el-input__field');

  let elementsArray = [ ...elements ];
  
  elementsArray.forEach( (elem, index, elemArray)=>{
    if( elem.value && elem.previousElementSibling.className == 'el-input__label' ){
      elem.previousElementSibling.className += ' el-label-focus';
    }else{
      // No work)
    }
  } );

} );


$(document).ready(function(){

  $('.el-input__field').on('focus',function(e){
    elInput = this.previousElementSibling;
    if( !elInput ){
      elInput = this.parentNode.previousElementSibling;
    }
    $(elInput).addClass('el-label-focus');
  });
  $('.el-input__field').on('blur',function(e){
    if(this.value){
  
    }else{
      elInput = this.previousElementSibling;
      if( !elInput ){
        elInput = this.parentNode.previousElementSibling;
      }
      $(elInput).removeClass('el-label-focus');
    }
  });
  
  $('.svg-box').on('click', function(e){
  
    let svgb = $(this);
    let inputPass = this.previousElementSibling;
  
    if( !$( svgb ).hasClass('svg-box-visible') ){
      $(svgb).addClass('svg-box-visible');
      inputPass.setAttribute('type','text');
    }else{
      $(svgb).removeClass('svg-box-visible');
      inputPass.setAttribute('type','password');
    }
  
  })

});


$('#comments-hidden-toggle').on('click', function(){
  $('#comments-toggle').toggleClass('comments-hidden')
});

// Cart Froms

$('#cart__item-slide').on('click', function(){
  $('.delete-item').toggleClass('close');
  $('#cart__item-forms').toggleClass('item-forms__open');
});


//Selected ordering

let x, i, j, l, li, selElmnt, button, b, c, span;
x = $('.woocommerce-ordering');
l = x.length;
for(i=0; i<l; i++){
  selElmnt = x[i].getElementsByTagName("select")[0];
  li = selElmnt.length
  //Create a new DIC
  button = document.createElement("BUTTON");
  span = document.createElement("SPAN");
  button.setAttribute("class","select-selected");
  span.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML
  button.appendChild(span);
  button.innerHTML += '<svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"><defs><style>.a{fill:#17191a;}.b{fill:none;}</style></defs><g transform="translate(22.034 -40.113) rotate(90)"><path class="a" d="M60.027,5.123,55.065.163a.557.557,0,1,0-.789.787l4.568,4.567-4.568,4.567a.557.557,0,0,0,.789.788l4.962-4.96A.562.562,0,0,0,60.027,5.123Z"/></g><rect class="b" width="33" height="33"/></svg>';
  x[i].appendChild(button);
  /* For each element, create a new DIV that will contain the option list: */
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  
  for (j = 0; j < li; j++) {
    /* For each option in the original select element,
    create a new DIV that will act as an option item: */
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /* When an item is clicked, update the original select box,
        and the selected item: */
        let y, i, k, s, h, sl, yl, same;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            h.innerHTML += '<svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"><defs><style>.a{fill:#17191a;}.b{fill:none;}</style></defs><g transform="translate(22.034 -40.113) rotate(90)"><path class="a" d="M60.027,5.123,55.065.163a.557.557,0,1,0-.789.787l4.568,4.567-4.568,4.567a.557.557,0,0,0,.789.788l4.962-4.96A.562.562,0,0,0,60.027,5.123Z"/></g><rect class="b" width="33" height="33"/></svg>';
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            s = s.childNodes;
            same = this;
            for(i=0; i < s.length; i++){
                if( s[i].innerHTML == same.innerHTML ){
                  s[i].setAttribute("selected", "selected");
                }else if( s[i].innerHTML != undefined ){
                  s[i].removeAttribute("selected");
                }
            }
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);

  button.addEventListener("click", function(e) {
    /* When the select box is clicked, close any other select boxes,
    and open/close the current select box: */
    e.stopPropagation();
    closeAllSelect(this);
    e.preventDefault();
    this.nextSibling.classList.toggle("select-hide");
    this.classList.toggle("select-arrow-active");
  });

}



function closeAllSelect(elmnt) {
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}

document.addEventListener("click", closeAllSelect);




/**
 * Quantity Buttons
 */

$(document).ready( ()=>{

  // Minus
  let allMinusButtonsArray = [ ...document.getElementsByClassName('el-quantity__minus') ];

  allMinusButtonsArray.forEach( (elem, index, thisArray)=>{
    elem.addEventListener( 'click', ( option )=>{

      option.preventDefault();
      let parentNodeElement = elem.parentNode;
      let childrenElementsArray = [ ...parentNodeElement.children ];

      childrenElementsArray.forEach( (child, childIndex, childArray )=>{

        if( child.tagName == 'INPUT' && child.hasAttribute('type') && child.getAttribute('type') == 'number' ){

          //Get Input Value
          let inputValue = parseInt( child.value );
          // Change Input Value
          if( inputValue <= 1 ){
            child.setAttribute('value', 1);
          }else{
            child.setAttribute('value', inputValue - 1);
          }

        }

      } );

    } );
  } );

  // Plus
  let allPlusButtonsArray = [ ...document.getElementsByClassName('el-quantity__plus') ];

  allPlusButtonsArray.forEach( (elem, index, thisArray)=>{
    elem.addEventListener( 'click', ( option )=>{

      option.preventDefault();
      let parentNodeElement = elem.parentNode;
      let childrenElementsArray = [ ...parentNodeElement.children ];

      childrenElementsArray.forEach( (child, childIndex, childArray )=>{

        if( child.tagName == 'INPUT' && child.hasAttribute('type') && child.getAttribute('type') == 'number' ){

          //Get Input Value
          let inputValue = parseInt( child.value );
          // Change Input Value
          child.setAttribute('value', inputValue + 1);

        }

      } );

    } );
  } );


} );


 /**
 * Stars Rating
 */

$(document).ready(function(){

  let starsForm = document.querySelector('.comment-form-rating');
  if( starsForm ){
    let starsDiv = starsForm.querySelector('.stars span');
    let starsLink = starsForm.querySelectorAll('.stars span a');
    let starsArray = [ ...starsLink ];

    starsArray.forEach( ( elem, index, array ) => {

      elem.addEventListener( 'mousemove', function(e){
        for( let i = 0; i <= index; i++ ){
          for( let l = array.length-1; l >= index; l-- ){
            if( array[l].getAttribute('class').indexOf('star-hover', 0) != -1 ){
              array[l].classList.remove('star-hover');
            }
          }
          array[i].classList.add('star-hover');
        }
      } );

      elem.addEventListener( 'click', function(e){
        for( let i = 0; i <= index; i++ ){
          for( let l = array.length-1; l >= index; l-- ){
            if( array[l].getAttribute('class').indexOf('star-active', 0) != -1 ){
              array[l].classList.remove('star-active');
            }
          }
          array[i].classList.add('star-active');
        }
      } );

    } );

    starsDiv.addEventListener( 'mouseleave', function(e){
      starsArray.forEach( star => {
        star.classList.remove('star-hover');
      } );
    } );

  }

});






// Login/Registration
$('#blueins_open_user_form_popup, #blueins_open_user_form_popup_checkout').on('click', function(e){
  e.preventDefault();
  $('.blueins_login_user_form_popup__containter').removeClass('registration-active');
  $('#blueins_user_form_popup-overlay').css('visibility', 'visible');
  $('#blueins_user_form_popup-overlay').css('opacity', '1');
  $('#blueins_user_form_popup').addClass('open_popup_log_form');
})

$('#blueins_user_form_popup-colose').on('click', function(e){
  e.preventDefault();
  $('#blueins_user_form_popup-overlay').css('visibility', 'hidden');
  $('#blueins_user_form_popup-overlay').css('opacity', '0');
  $('#blueins_user_form_popup').removeClass('open_popup_log_form');
});


$('#button-activate-registration').on('click',function(e){
  e.preventDefault();
  $('.blueins_login_user_form_popup__containter').addClass('registration-active');
});

$('#button-activate-login').on('click',function(e){
  e.preventDefault();
  $('.blueins_login_user_form_popup__containter').removeClass('registration-active');
});


//MyAccount

$('#myaccount_button-activate-registration').on('click',function(e){
  e.preventDefault();
  let titleText = document.querySelector('.section-text__title');
  titleText.innerHTML = 'Регистрация';
  $('.myaccount_authorization').addClass('myaccount_registration-active');
});

$('#myaccount_button-activate-login').on('click',function(e){
  e.preventDefault();
  let titleText = document.querySelector('.section-text__title');
  titleText.innerHTML = 'Войти';
  $('.myaccount_authorization').removeClass('myaccount_registration-active');
});




/**
 * *************************************** Sliders ******************************************
 */

const PAGE_URL = global_params.url

$('.slick-slider').slick({
   dots: true,
   infinite: true,
   autoplay: true,
   speed: 700,
   autoplaySpeed: 10000,
   fade: true,
   cssEase: 'linear',
   nextArrow: `<button type="button" class="slick-next"><img src="${PAGE_URL}/assets/img/Icon/Dark/next.svg" alt="Next"></button>`,
   prevArrow: `<button type="button" class="slick-prev"><img src="${PAGE_URL}/assets/img/Icon/Dark/prev.svg" alt="Prev"></button>`,
   responsive: [{

    breakpoint: 768,
    settings: {
      arrows: false
    }

  },
  {

    breakpoint: 480,
    settings: {
      arrows: false,
      fade: false,
      speed: 400
    }

  }]
 });

$(document).ready( ()=>{

  const main_slider = document.querySelector('#slider-in-main')

  if( main_slider ){

    let activeSlide, colorTitle, header;
    let sclickSlider = main_slider.querySelector('.slick-slider');

    function changeColor(){

      activeSlide = sclickSlider.querySelector('.slick-current');
      colorTitle = activeSlide.querySelector('.title-slider').style.color;
      header = document.querySelector('.header__bottom');

      if( colorTitle === 'rgb(33, 37, 41)' ){
        header.classList.add('about__header__bottom');
        //console.log('add');
      }else{
        header.classList.remove('about__header__bottom');
        //console.log('remove');
      }

    }

    const mutationObserver = new MutationObserver( mutations => {
      mutations.forEach( mutation => {
        changeColor();
      });
    } );

    mutationObserver.observe(sclickSlider, {
      attributes: true,
      characterData: true,
      childList: true,
      subtree: true,
      attributeOldValue: true,
      characterDataOldValue: true
    });

    sclickSlider.querySelectorAll('.slick-arrow, .slick-dots').forEach( slide => {
      slide.addEventListener('click', event => {changeColor()})
    } );

  }

} );



$('.slider-controll').slick({
  slidesToShow: 4,
  dots: false,
  infinite: false,
  autoplay: false,
  fade: false,
  arrows: true,
  asNavFor: '.slick-product-slider',
  nextArrow: `<button type="button" class="slick-next"><img src="${PAGE_URL}/assets/img/Icon/Dark/next.svg" alt="Next"></button>`,
  prevArrow: `<button type="button" class="slick-prev"><img src="${PAGE_URL}/assets/img/Icon/Dark/prev.svg" alt="Prev"></button>`,
})
$('.slick-product-slider').slick({
  slidesToShow: 4,
  dots: false,
  infinite: false,
  autoplay: false,
  fade: false,
  arrows: false,
  asNavFor: '.slider-controll',
})



$('#feedback__slider__img').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  centerPadding: '0px',
  centerMode: true,
  arrows: false,
  dots: false,
  fade: false,
  draggable: false,
  asNavFor: '#feedback__slider__text',
  responsive: [{

    breakpoint: 500,
    settings: {
      slidesToShow: 1
    }

  }]
});
$('#feedback__slider__text').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  asNavFor: '#feedback__slider__img',
  autoplay: true,
  fade: true,
  dots: true,
  arrows: true,
  centerMode: true,
  draggable: false,
  focusOnSelect: true,
  nextArrow: `<button type="button" class="slick-next"><img src="${PAGE_URL}/assets/img/Icon/Dark/next.svg" alt="Next"></button>`,
  prevArrow: `<button type="button" class="slick-prev"><img src="${PAGE_URL}/assets/img/Icon/Dark/prev.svg" alt="Prev"></button>`,
  responsive: [{

      breakpoint: 768,
      settings: {
        arrows: false
      }

    }]
});


$('#information-product__sliders__slick').slick({
  dots: true,
  infinite: true,
  autoplay: false,
  speed: 500,
  fade: true,
  cssEase: 'linear',
  nextArrow: `<button type="button" class="slick-next"><img src="${PAGE_URL}/assets/img/Icon/Dark/next.svg" alt="Next"></button>`,
  prevArrow: `<button type="button" class="slick-prev"><img src="${PAGE_URL}/assets/img/Icon/Dark/prev.svg" alt="Prev"></button>`,
  responsive: [{

    breakpoint: 1100,
    settings: {
      arrows: false,
      dots: false
    }

  }]
});



/**
 * *************************************** Animation ******************************************
 */


AOS.init();

AOS.init({
  // Global settings:
  disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
  startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
  initClassName: 'aos-init', // class applied after initialization
  animatedClassName: 'aos-animate', // class applied on animation
  useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
  disableMutationObserver: false, // disables automatic mutations' detections (advanced)
  debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
  throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
  

  // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
  offset: 250, // offset (in px) from the original trigger point
  delay: 0, // values from 0 to 3000, with step 50ms
  duration: 800, // values from 0 to 3000, with step 50ms
  easing: 'ease', // default easing for AOS animations
  once: true, // whether animation should happen only once - while scrolling down
  mirror: false, // whether elements should animate out while scrolling past them
  anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

});


/**
 * ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ Animation ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
 */

/**
 * Product Animation
 */

$(document).ready(function(){

  let foreGrid = document.querySelector('#grid-fore');
  let fiveGrid = document.querySelector('#grid-five');
  let listGrid = document.querySelector('#grid-list');

  if(foreGrid || fiveGrid || listGrid){

    let butArr = [foreGrid, fiveGrid, listGrid];

    butArr.forEach( item => item.addEventListener( 'click',viewGrid ) );

    function viewGrid(event){

      const header = document.querySelector('.header')
      const { height } = document.querySelector('.header__top').getBoundingClientRect()
      const $header_bottom = document.querySelector('#header__bottom-cover')
      const $go_to_top = document.querySelector('#go-to-top')

  
      header.style = `top: -${height}px`
      $header_bottom.classList.add('header__bottom-fixed')
      $header_bottom.style = `top: ${TOP_HEADER}px`


      let element = document.querySelector('#blueins-filters-block').getBoundingClientRect()
      $('html, body').animate({scrollTop: window.pageYOffset + element.y - element.height}, 1000);

      console.log(window.pageYOffset)
      console.log(element.y)
      console.log(element.height)
      console.log(element)

      event.preventDefault();

      let container = document.querySelector('#products__list-container');
      let productArr = document.querySelectorAll('.big-products__list__item');
      
      butArr.forEach( item => item !== this ? item.classList.remove('grid-button-active') : item.classList.add('grid-button-active') );

      let index = this.getAttribute('id').indexOf('-');
      let gridType = this.getAttribute('id').slice(index+1);

      let ms = 0;
      for( let i = 0; i <= productArr.length; i++){
        ms += i + 100 ;
      }
    
      productArr.forEach( item => {
        item.style = 'opacity: 0';
        setTimeout( () => {
          container.classList.remove('five-item','fore-item','list-item');
          container.classList.add( gridType + '-item' );
          setTimeout( () => {item.style = 'opacity: 1'}, 0.001 );
        }, ms * 0.5 );
      } );
      
    }
  }

});



/**
 * URL Animation
 */

document.addEventListener('DOMContentLoaded', event => {

  let hash = window.location.hash
  if( hash ){
    let element = document.querySelector( '.' + hash.slice(1) ).getBoundingClientRect()
    if( element ){
      document.querySelector('#header__bottom-cover').classList.add('header__bottom-fixed')
      $('html, body').animate({scrollTop: window.pageYOffset + element.y  - 76 }, 1000);
    }
  }

} )


/**
 * To Match Container
 */

document.addEventListener('DOMContentLoaded', event => {

  let cart = document.getElementById('cart-menu')

  const cartObsurver = new MutationObserver( mutation => {
    mutation.forEach( mut => {

      let tomatchContainer = document.getElementById('tomatch-container') ? document.getElementById('tomatch-container') : false
      if( tomatchContainer ){
        let timeoutId = setTimeout(() => {
          tomatchContainer.classList.add('tomatchContainer-hidden')
        }, 2000)
        let timeoutId_second = setTimeout(() => {
          tomatchContainer.style = 'display: none'
          setTimeout
        }, 2300)

        if( tomatchContainer.hasAttribute('style') ){
          clearTimeout(timeoutId)
          clearTimeout(timeoutId_second)
        }
      }

    } )
  } )

  cartObsurver.observe(cart,{
    attributes: true,
    characterData: true,
    childList: true,
    subtree: true,
    attributeOldValue: true,
    characterDataOldValue: true
  })

} )



/**
 * Variation Product In Shop Page
 */
document.addEventListener('DOMContentLoaded', event => {

  let pagination = document.querySelector('.woocommerce-pagination')
  add_variation_in_shop()

  if( pagination ){

    const shopObsurver = new MutationObserver( mutation => {
      mutation.forEach( mut => {

        //console.log(mut)
        add_variation_in_shop()

      } )
    } )

    shopObsurver.observe(pagination,{
      attributes: true,
      characterData: true,
      childList: true,
      subtree: true,
      attributeOldValue: true,
      characterDataOldValue: true
    })

  }



  function add_variation_in_shop(){

    let product_color = document.querySelectorAll('.product-cart .product-color__item')

    if( product_color[0] ){
      // Do on start
      let active_circle = document.querySelector('.product-cart .product-color__item .color-select')
      let data_color_id = active_circle.getAttribute('data-blu-color-id')
      let data_img = active_circle.getAttribute('data-img')
      let data_product = document.querySelector(`div[data-blu-product-id="${data_color_id}"]`)
      let data_product_figure = data_product.querySelector('.figure-product__first')
      data_product_figure.setAttribute('src', data_img)
      // Do on start

      product_color.forEach( element => { element.addEventListener( 'click', variationInShopPage ) } )

      function variationInShopPage(event){
        event.preventDefault()

        let span_container = event.target.parentNode.parentNode
        let spans = span_container.querySelectorAll('.color-select-circle')
        spans.forEach( span => span.classList.remove('color-select') )
        event.target.classList.add('color-select')

        let data_color_id = event.target.getAttribute('data-blu-color-id')
        let data_img = event.target.getAttribute('data-img')
        let data_product = document.querySelector(`div[data-blu-product-id="${data_color_id}"]`)
        let data_product_figure = data_product.querySelector('.figure-product__first')

        data_product_figure.setAttribute('src', data_img)
      }

    }

  }


} )

