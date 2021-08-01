// modules are defined as an array
// [ module function, map of requires ]
//
// map of requires is short require name -> numeric require
//
// anything defined in a previous bundle is accessed via the
// orig method which is the require for previous bundles
parcelRequire = (function (modules, cache, entry, globalName) {
  // Save the require from previous bundle to this closure if any
  var previousRequire = typeof parcelRequire === 'function' && parcelRequire;
  var nodeRequire = typeof require === 'function' && require;

  function newRequire(name, jumped) {
    if (!cache[name]) {
      if (!modules[name]) {
        // if we cannot find the module within our internal map or
        // cache jump to the current global require ie. the last bundle
        // that was added to the page.
        var currentRequire = typeof parcelRequire === 'function' && parcelRequire;
        if (!jumped && currentRequire) {
          return currentRequire(name, true);
        }

        // If there are other bundles on this page the require from the
        // previous one is saved to 'previousRequire'. Repeat this as
        // many times as there are bundles until the module is found or
        // we exhaust the require chain.
        if (previousRequire) {
          return previousRequire(name, true);
        }

        // Try the node require function if it exists.
        if (nodeRequire && typeof name === 'string') {
          return nodeRequire(name);
        }

        var err = new Error('Cannot find module \'' + name + '\'');
        err.code = 'MODULE_NOT_FOUND';
        throw err;
      }

      localRequire.resolve = resolve;
      localRequire.cache = {};

      var module = cache[name] = new newRequire.Module(name);

      modules[name][0].call(module.exports, localRequire, module, module.exports, this);
    }

    return cache[name].exports;

    function localRequire(x){
      return newRequire(localRequire.resolve(x));
    }

    function resolve(x){
      return modules[name][1][x] || x;
    }
  }

  function Module(moduleName) {
    this.id = moduleName;
    this.bundle = newRequire;
    this.exports = {};
  }

  newRequire.isParcelRequire = true;
  newRequire.Module = Module;
  newRequire.modules = modules;
  newRequire.cache = cache;
  newRequire.parent = previousRequire;
  newRequire.register = function (id, exports) {
    modules[id] = [function (require, module) {
      module.exports = exports;
    }, {}];
  };

  var error;
  for (var i = 0; i < entry.length; i++) {
    try {
      newRequire(entry[i]);
    } catch (e) {
      // Save first error but execute all entries
      if (!error) {
        error = e;
      }
    }
  }

  if (entry.length) {
    // Expose entry point to Node, AMD or browser globals
    // Based on https://github.com/ForbesLindesay/umd/blob/master/template.js
    var mainExports = newRequire(entry[entry.length - 1]);

    // CommonJS
    if (typeof exports === "object" && typeof module !== "undefined") {
      module.exports = mainExports;

    // RequireJS
    } else if (typeof define === "function" && define.amd) {
     define(function () {
       return mainExports;
     });

    // <script>
    } else if (globalName) {
      this[globalName] = mainExports;
    }
  }

  // Override the current require with this new one
  parcelRequire = newRequire;

  if (error) {
    // throw error from earlier, _after updating parcelRequire_
    throw error;
  }

  return newRequire;
})({"frontend/blueins-animation-class.js":[function(require,module,exports) {
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.Animation = void 0;

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var Animation = /*#__PURE__*/function () {
  function Animation(targetAnimationId, openerId, closerId) {
    var _document$getElementB, _document$getElementB2, _document$getElementB3;

    _classCallCheck(this, Animation);

    this.targetAnimation = (_document$getElementB = document.getElementById(targetAnimationId)) !== null && _document$getElementB !== void 0 ? _document$getElementB : false;
    this.opener = (_document$getElementB2 = document.getElementById(openerId)) !== null && _document$getElementB2 !== void 0 ? _document$getElementB2 : false;
    this.closer = (_document$getElementB3 = document.getElementById(closerId)) !== null && _document$getElementB3 !== void 0 ? _document$getElementB3 : false;
  }

  _createClass(Animation, [{
    key: "slideRight",
    value: function slideRight() {
      var _this = this;

      var cssStyleClose = "\n            right: -100%\n        ";
      var cssStyleOpen = "\n            right: 0\n        ";
      this.targetAnimation.style = cssStyleClose;
      this.opener.addEventListener('click', function (e) {
        e.preventDefault();
        _this.targetAnimation.style = cssStyleOpen;
      });
      this.closer.addEventListener('click', function (e) {
        e.preventDefault();
        _this.targetAnimation.style = cssStyleClose;
      });
    }
  }, {
    key: "slideLeft",
    value: function slideLeft() {
      var _this2 = this;

      var cssStyleClose = "\n            left: -100%\n        ";
      var cssStyleOpen = "\n            left: 0\n        ";
      this.targetAnimation.style = cssStyleClose;
      this.opener.addEventListener('click', function (e) {
        e.preventDefault();
        _this2.targetAnimation.style = cssStyleOpen;
      });
      this.closer.addEventListener('click', function (e) {
        e.preventDefault();
        _this2.targetAnimation.style = cssStyleClose;
      });
    }
  }, {
    key: "fade",
    value: function fade() {
      var _this3 = this;

      var cssStyleClose = "\n            left: 0;\n            opacity: 0;\n            visibility: hidden;\n        ";
      var cssStyleOpen = "\n            left: 0;\n            opacity: 1;\n            visibility: visible;\n        ";
      this.targetAnimation.style = cssStyleClose;
      setTimeout(function () {
        _this3.targetAnimation.style = 'display: none';
      }, 500);
      this.opener.addEventListener('click', function (e) {
        e.preventDefault();
        _this3.targetAnimation.style = cssStyleClose;
        setTimeout(function () {
          _this3.targetAnimation.style = cssStyleOpen;
        }, 100);
      });
      this.closer.addEventListener('click', function (e) {
        e.preventDefault();
        _this3.targetAnimation.style = cssStyleClose;
        setTimeout(function () {
          _this3.targetAnimation.style = 'display: none';
        }, 500);
      });
    }
  }]);

  return Animation;
}();

exports.Animation = Animation;
},{}],"frontend/event-window.js":[function(require,module,exports) {
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.EventWindow = void 0;

var _blueinsAnimationClass = require("./blueins-animation-class");

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

var EventWindow = /*#__PURE__*/function (_Animation) {
  _inherits(EventWindow, _Animation);

  var _super = _createSuper(EventWindow);

  function EventWindow(option) {
    var _this;

    _classCallCheck(this, EventWindow);

    _this = _super.call(this, option.targetAnimationId, option.openerId, option.closerId);
    /**
     * Returned:    this.targetAnimation
     *              this.opener
     *              this.closer
     */

    _this.targetElement = document.getElementById(option.targetElementId);

    if (option.typeAnimation == 'slideRight') {
      var windowWidth = document.documentElement.clientWidth;

      if (!option.media) {
        _this.slideRight();

        return _possibleConstructorReturn(_this);
      }

      option.media.forEach(function (breakpoint) {
        if (breakpoint.breakpoint >= windowWidth) {
          _this.fade();
        } else {
          _this.slideRight();
        }
      });
    }

    if (option.typeAnimation == 'fade') {
      _this.fade();
    }

    if (option.typeAnimation == 'parralax') {
      _this.parralaxImg();
    }

    return _this;
  }

  _createClass(EventWindow, [{
    key: "parralaxImg",
    value: function parralaxImg() {
      if (!this.targetElement) return;
      var parallax = this.targetElement;
      var height = parallax.getBoundingClientRect().height;
      var coverHeight = parallax.parentNode.getBoundingClientRect().height;
      var maxTranslate = height - coverHeight;
      var firstPageHeight = document.documentElement.clientHeight;
      document.addEventListener('scroll', function () {
        var percent2 = (firstPageHeight - window.pageYOffset) / firstPageHeight;
        parallax.style = "transform: translate(-50%, -".concat(maxTranslate - maxTranslate * percent2 + 'px', ")");
      });
    }
  }]);

  return EventWindow;
}(_blueinsAnimationClass.Animation);

exports.EventWindow = EventWindow;
},{"./blueins-animation-class":"frontend/blueins-animation-class.js"}],"frontend/blueins-fullscreen-menu.js":[function(require,module,exports) {
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.FullscreenMenu = void 0;

var _blueinsAnimationClass = require("./blueins-animation-class");

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

var FullscreenMenu = /*#__PURE__*/function (_Animation) {
  _inherits(FullscreenMenu, _Animation);

  var _super = _createSuper(FullscreenMenu);

  function FullscreenMenu(obj) {
    var _document$querySelect;

    var _this;

    _classCallCheck(this, FullscreenMenu);

    _this = _super.call(this, obj.menuId, obj.openerId, obj.closerId);
    /**
     * Returned:    this.targetAnimation
     *              this.opener
     *              this.closer
     */

    _this.$subMenus = (_document$querySelect = document.querySelectorAll('.' + obj.classSubMenus)) !== null && _document$querySelect !== void 0 ? _document$querySelect : false;
    _this.$fullscreenMenu = _this.targetAnimation.querySelector('.fullscreen-menu__nav');
    _this.typeAnimation = obj.typeAnimation;
    _this.media = obj.media;

    if (_this.targetAnimation || _this.opener || _this.closer) {
      _this.init();

      _this.initNavList();
    } else {
      throw new Error('TypeError');
    }

    return _this;
  }

  _createClass(FullscreenMenu, [{
    key: "init",
    value: function init() {
      var _this2 = this;

      if (this.$subMenus[0]) this.initSubMenu();
      var windowWidth = document.documentElement.clientWidth;
      this.media.forEach(function (item) {
        if (item.breakpoint >= windowWidth) {
          _this2.fade();
        } else {
          _this2.slideLeft();
        }
      });
    }
  }, {
    key: "initNavList",
    value: function initNavList() {
      var _this3 = this;

      var nav_list_items = this.targetAnimation.querySelectorAll('.fullscreen__nav__list__item');
      nav_list_items.forEach(function (item) {
        return item.addEventListener('mouseover', _this3.mouseoverEvent);
      });
    }
  }, {
    key: "mouseoverEvent",
    value: function mouseoverEvent(event) {
      event.preventDefault();
      var nav_list_items = document.querySelectorAll('.fullscreen__nav__list__item');
      nav_list_items.forEach(function (item) {
        return item.classList.remove('curent-hover');
      });
      this.classList.add('curent-hover');
    }
  }, {
    key: "initSubMenu",
    value: function initSubMenu() {
      var _this4 = this;

      var button = "<button class=\"close-submenu\">\u041D\u0430\u0437\u0430\u0434</button>";
      this.$fullscreenMenu.style = "right: 0;";
      this.$subMenus.forEach(function (sub) {
        sub.insertAdjacentHTML('afterbegin', button);
        sub.parentNode.querySelector('span').addEventListener('click', _this4.openSubMenu.bind(_this4));
        sub.querySelector('.close-submenu').addEventListener('click', _this4.closeSubMenu.bind(_this4));
      });
    }
  }, {
    key: "openSubMenu",
    value: function openSubMenu(event) {
      event.preventDefault();
      var $fullscreen__navList = event.target.getAttribute('alt') ? event.target.parentNode.parentNode : event.target.parentNode;
      $fullscreen__navList.querySelector('.fullscreen__sub-menu ').style = "display: block;";
      this.$fullscreenMenu.style = "right: calc(100% + 15px);";
    }
  }, {
    key: "closeSubMenu",
    value: function closeSubMenu(event) {
      event.preventDefault();
      var $backButton = event.target.parentNode;
      $backButton.style = "display: none;";
      this.$fullscreenMenu.style = "right: 0;";
    }
  }]);

  return FullscreenMenu;
}(_blueinsAnimationClass.Animation);

exports.FullscreenMenu = FullscreenMenu;
},{"./blueins-animation-class":"frontend/blueins-animation-class.js"}],"common.js":[function(require,module,exports) {
"use strict";

var _eventWindow = require("./frontend/event-window");

var _blueinsFullscreenMenu = require("./frontend/blueins-fullscreen-menu");

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

var start_img_animation = new _eventWindow.EventWindow({
  typeAnimation: 'parralax',
  targetElementId: 'parallax_img'
});
var fullscreenMenu = new _blueinsFullscreenMenu.FullscreenMenu({
  menuId: 'fullscreen-menu',
  openerId: 'burger__button',
  closerId: 'close-fullscreen-menu-button',
  classSubMenus: 'fullscreen__sub-menu',
  typeAnimation: 'slide',
  media: [{
    breakpoint: 480,
    typeAnimation: 'fade'
  }]
}); // Fullscreen menu
// $('.fullscreen__nav__list__item').on('mouseover', function(e){
//   $('.fullscreen__nav__list__item').removeClass('curent-hover')
//   $(this).addClass('curent-hover');
// });

var viewportwidth;
var viewportheight;
var documentheight;
$(document).on('wheel touchmove', function (e) {
  if ($(window).scrollTop() >= 300) {
    $('#header__bottom-cover').addClass('header__bottom-fixed');
  } else {
    $('#header__bottom-cover').removeClass('header__bottom-fixed');
  }
}); // Cart Menu

$(document).ready(function () {
  $('#cart-icon-menu').on('mousemove', function (e) {
    e.preventDefault();
    var $el_menu = document.getElementById('cart-menu');

    if ($el_menu) {
      $('#cart-icon-menu').on('click', function (e) {
        e.preventDefault();
        $('body').css('overflow-y', 'hidden');
        $('#cart-menu').addClass('right-ziro');
        $('#cart-overlay').css('visibility', 'visible');
        setTimeout(function () {
          $('#cart-overlay').css('background', 'rgba(180,197,204, 0.4)');
        }, 100);
      });
    } else {
      $(this).addClass('cart-hov-view-information');
    }
  });
  $('#blueins-close-mini-cart-button').on('click', function (e) {
    $('body').css('overflow-y', 'scroll');
    $('#cart-menu').removeClass('right-ziro');
    $('#cart-overlay').css('background', 'rgba(180,197,204, 0)');
    setTimeout(function () {
      $('#cart-overlay').css('visibility', 'hidden');
    }, 400);
  });
}); // filter Menu

$('#prod-filter_open-menu').on('click', function (e) {
  e.preventDefault;
  $('#prod-filter-menu').addClass('left-ziro');
  $('#prod-filter-overlay').css('visibility', 'visible');
  setTimeout(function () {
    $('#prod-filter-overlay').css('background', 'rgba(180,197,204, 0.4)');
  }, 100);
});
$('#close-button-prod-filter').on('click', function (e) {
  e.preventDefault;
  $('#prod-filter-menu').removeClass('left-ziro');
  $('#prod-filter-overlay').css('background', 'rgba(180,197,204, 0)');
  setTimeout(function () {
    $('#prod-filter-overlay').css('visibility', 'hidden');
  }, 400);
});
var custItemPrev;
$('.groupe-cust-title').on('click', function (e) {
  e.preventDefault;
  custItemPrev = this.parentElement.parentElement;
  $(custItemPrev).toggleClass('cust-active');
}); // Menu

$('.main-menu__item').on('mouseover', function (e) {
  if (this.childNodes[3]) {
    $('.header__bottom').addClass('white-bg');
  } else {//console.log('bad');
  }
});
$('.main-menu__item').on('mouseout', function (e) {
  if (this.childNodes[3]) {
    $('.header__bottom').removeClass('white-bg');
  } else {//console.log('bad');
  }
}); //Email

$('#fotter-email').on('focus', function (e) {
  $('#fotter-email-label').addClass('label-focus');
});
$('#fotter-email').on('blur', function (e) {
  if (this.value) {} else {
    $('#fotter-email-label').removeClass('label-focus');
  }
}); // Go To Top

$('#go-to-top').on('click', function (e) {
  e.preventDefault();
  $('html, body').animate({
    scrollTop: 0
  }, 1000);
  $('#header__bottom-cover').removeClass('header__bottom-fixed');
  $('#go-to-top').addClass('hidden');
});
$(window).on('wheel touchmove', function () {
  if ($(window).scrollTop() >= 1000) {
    $('#go-to-top').removeClass('hidden');
  } else {
    $('#go-to-top').addClass('hidden');
  }
}); //el-form

var elInput;
$(document).ready(function () {
  var elements = document.getElementsByClassName('el-input__field');

  var elementsArray = _toConsumableArray(elements);

  elementsArray.forEach(function (elem, index, elemArray) {
    if (elem.value && elem.previousElementSibling.className == 'el-input__label') {
      elem.previousElementSibling.className += ' el-label-focus';
    } else {// No work)
    }
  });
});
$(document).ready(function () {
  $('.el-input__field').on('focus', function (e) {
    elInput = this.previousElementSibling;

    if (!elInput) {
      elInput = this.parentNode.previousElementSibling;
    }

    $(elInput).addClass('el-label-focus');
  });
  $('.el-input__field').on('blur', function (e) {
    if (this.value) {} else {
      elInput = this.previousElementSibling;

      if (!elInput) {
        elInput = this.parentNode.previousElementSibling;
      }

      $(elInput).removeClass('el-label-focus');
    }
  });
  $('.svg-box').on('click', function (e) {
    var svgb = $(this);
    var inputPass = this.previousElementSibling;

    if (!$(svgb).hasClass('svg-box-visible')) {
      $(svgb).addClass('svg-box-visible');
      inputPass.setAttribute('type', 'text');
    } else {
      $(svgb).removeClass('svg-box-visible');
      inputPass.setAttribute('type', 'password');
    }
  });
});
$('#comments-hidden-toggle').on('click', function () {
  $('#comments-toggle').toggleClass('comments-hidden');
}); // Cart Froms

$('#cart__item-slide').on('click', function () {
  $('.delete-item').toggleClass('close');
  $('#cart__item-forms').toggleClass('item-forms__open');
}); //Selected ordering

var x, i, j, l, li, selElmnt, button, b, c, span;
x = $('.woocommerce-ordering');
l = x.length;

for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  li = selElmnt.length; //Create a new DIC

  button = document.createElement("BUTTON");
  span = document.createElement("SPAN");
  button.setAttribute("class", "select-selected");
  span.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
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
    c.addEventListener("click", function (e) {
      /* When an item is clicked, update the original select box,
      and the selected item: */
      var y, i, k, s, h, sl, yl, same;
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

          for (i = 0; i < s.length; i++) {
            if (s[i].innerHTML == same.innerHTML) {
              s[i].setAttribute("selected", "selected");
            } else if (s[i].innerHTML != undefined) {
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
  button.addEventListener("click", function (e) {
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
  var x,
      y,
      i,
      xl,
      yl,
      arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;

  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i);
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

$(document).ready(function () {
  // Minus
  var allMinusButtonsArray = _toConsumableArray(document.getElementsByClassName('el-quantity__minus'));

  allMinusButtonsArray.forEach(function (elem, index, thisArray) {
    elem.addEventListener('click', function (option) {
      option.preventDefault();
      var parentNodeElement = elem.parentNode;

      var childrenElementsArray = _toConsumableArray(parentNodeElement.children);

      childrenElementsArray.forEach(function (child, childIndex, childArray) {
        if (child.tagName == 'INPUT' && child.hasAttribute('type') && child.getAttribute('type') == 'number') {
          //Get Input Value
          var inputValue = parseInt(child.value); // Change Input Value

          if (inputValue <= 1) {
            child.setAttribute('value', 1);
          } else {
            child.setAttribute('value', inputValue - 1);
          }
        }
      });
    });
  }); // Plus

  var allPlusButtonsArray = _toConsumableArray(document.getElementsByClassName('el-quantity__plus'));

  allPlusButtonsArray.forEach(function (elem, index, thisArray) {
    elem.addEventListener('click', function (option) {
      option.preventDefault();
      var parentNodeElement = elem.parentNode;

      var childrenElementsArray = _toConsumableArray(parentNodeElement.children);

      childrenElementsArray.forEach(function (child, childIndex, childArray) {
        if (child.tagName == 'INPUT' && child.hasAttribute('type') && child.getAttribute('type') == 'number') {
          //Get Input Value
          var inputValue = parseInt(child.value); // Change Input Value

          child.setAttribute('value', inputValue + 1);
        }
      });
    });
  });
});
/**
 * ************************ Vaiable Colors Start ************************
 */

function updateHTML(circleEl, childrenArr, optionsWoo, circle, nameHere) {
  for (var _i = 0; _i < circle.length; _i++) {
    circle[_i].classList.remove('element-select');
  }

  circleEl.classList.add('element-select');
  var circleElId = circleEl.getAttribute('id');
  var fullval = childrenArr.map(function (opt) {
    if (opt.value.slice(opt.value.indexOf('#')) == circleElId) {
      return opt.value;
    }
  });
  fullval = fullval.filter(function (optVal) {
    if (optVal != undefined) return optVal;
  });
  $(optionsWoo).val(fullval[0]).change(); // Set Name Color

  var nameContainer = document.getElementById(nameHere);
  nameContainer.innerHTML = fullval[0].slice(0, fullval[0].indexOf('#'));
}

function updateIMG(targetEl) {
  var activeID;

  if (img_variation_src) {
    img_variation_src.forEach(function (item) {
      var harpIdex = item['id'].indexOf('#');

      if (item['id'].slice(harpIdex) == targetEl) {
        activeID = item;
      }
    });
  }

  var variation_slider = document.getElementById('blu-variations-slider');
  var firstElement = variation_slider.children[0];
  var firstURL = firstElement.children[0];
  var firstIMG = firstElement.querySelector('.wp-post-image');
  var variation_control_nav = document.querySelector('.flex-control-nav');
  var controlFirst_IMG = variation_control_nav.children[0].children[0];
  firstElement.setAttribute('data-thumb', activeID['data-thumb']);
  firstURL.setAttribute('href', activeID['data-src']);
  firstIMG.setAttribute('src', activeID['src']);
  firstIMG.setAttribute('data-src', activeID['data-src']);
  firstIMG.setAttribute('data-large_image', activeID['data-large_image']);
  firstIMG.setAttribute('srcset', activeID['srcset']);
  controlFirst_IMG.setAttribute('src', activeID['data-thumb']);
}

function createSquare(listArray, whereId) {
  var arraySquare = [];
  listArray.forEach(function (child, childIndex) {
    if (childIndex != 0) {
      var listContainer = document.getElementById(whereId);
      var liElem = document.createElement('li');
      var spanElem = document.createElement('span');
      var razmerCod = child.value.slice(child.value.indexOf('#'));
      var razmerCodHTML = child.value.slice(child.value.indexOf('#') + 1);
      var razmerName = child.value.slice(0, child.value.indexOf('#'));
      spanElem.setAttribute('class', 'details-select-square');
      spanElem.setAttribute('id', razmerCod.trim());
      spanElem.textContent = razmerCodHTML;
      liElem.setAttribute('class', 'details__razmer__list__item');
      liElem.setAttribute('name', razmerName);
      liElem.appendChild(spanElem); // let liElem = `
      //   <li class="details__razmer__list__item" name="${razmerName}">
      //     <span class="details-select-square">${razmerCod}</span>
      //   </li>
      // `

      arraySquare.push(spanElem); //listContainer.insertAdjacentHTML( 'afterbegin', liElem )

      listContainer.appendChild(liElem);
    }
  });
  return arraySquare;
}

function createCircle(listArray, whereId) {
  var arratCircle = [];
  listArray.forEach(function (child, childIndex, childArray) {
    if (childIndex != 0) {
      var listContainer = document.getElementById(whereId);
      var liElem = document.createElement('li');
      var spanElem = document.createElement('span'); // Fint Color #Cod

      var colorCod = child.value.slice(child.value.indexOf('#'));
      var colorName = child.value.slice(0, child.value.indexOf('#'));
      spanElem.setAttribute('class', 'details-select-circle');
      spanElem.setAttribute('style', "background: ".concat(colorCod.trim()));
      spanElem.setAttribute('id', colorCod.trim());
      liElem.setAttribute('class', 'details__colors__list__item');
      liElem.setAttribute('name', colorName);
      liElem.appendChild(spanElem);
      arratCircle.push(spanElem);
      listContainer.appendChild(liElem);
    }
  });
  return arratCircle;
}

document.addEventListener('DOMContentLoaded', function (event) {
  var optionsProductCzvet = document.getElementById('czvet');
  var optionsProductRazmer = document.getElementById('razmer');
  var optionsProductPaRazmer = document.getElementById('pa_razmer');

  if (optionsProductCzvet) {
    var childrenCzvet = _toConsumableArray(optionsProductCzvet.children);

    var circleCzvet = createCircle(childrenCzvet, 'setElementHere__czvet');
    updateHTML(circleCzvet[0], childrenCzvet, optionsProductCzvet, circleCzvet, 'setNameHere__czvet');
    circleCzvet.forEach(function (circleEl) {
      circleEl.addEventListener('click', function (event) {
        event.preventDefault();
        var targetEl = event.target.getAttribute('id');
        updateHTML(circleEl, childrenCzvet, optionsProductCzvet, circleCzvet, 'setNameHere__czvet');
        updateIMG(targetEl);
      });
    });
  }

  if (optionsProductRazmer) {
    var childrenRazmer = _toConsumableArray(optionsProductRazmer.children);

    var squareRazmer = createSquare(childrenRazmer, 'setElementHere__razmer');
    updateHTML(squareRazmer[0], childrenRazmer, optionsProductRazmer, squareRazmer, 'setNameHere__razmer');
    squareRazmer.forEach(function (circleEl) {
      circleEl.addEventListener('click', function (event) {
        event.preventDefault();
        updateHTML(circleEl, childrenRazmer, optionsProductRazmer, squareRazmer, 'setNameHere__razmer');
      });
    });
  }

  if (optionsProductPaRazmer) {
    var _childrenRazmer = _toConsumableArray(optionsProductPaRazmer.children);

    var _squareRazmer = createSquare(_childrenRazmer, 'setElementHere__pa_razmer');

    updateHTML(_squareRazmer[0], _childrenRazmer, optionsProductPaRazmer, _squareRazmer, 'setNameHere__pa_razmer');

    _squareRazmer.forEach(function (circleEl) {
      circleEl.addEventListener('click', function (event) {
        event.preventDefault();
        updateHTML(circleEl, _childrenRazmer, optionsProductPaRazmer, _squareRazmer, 'setNameHere__pa_razmer');
      });
    });
  }
});
/**
 * ************************ Vaiable Colors End ************************
 */

/**
* Stars Rating
*/

$(document).ready(function () {
  var starsForm = document.querySelector('.comment-form-rating');

  if (starsForm) {
    var starsDiv = starsForm.querySelector('.stars span');
    var starsLink = starsForm.querySelectorAll('.stars span a');

    var starsArray = _toConsumableArray(starsLink);

    starsArray.forEach(function (elem, index, array) {
      elem.addEventListener('mousemove', function (e) {
        for (var _i2 = 0; _i2 <= index; _i2++) {
          for (var _l = array.length - 1; _l >= index; _l--) {
            if (array[_l].getAttribute('class').indexOf('star-hover', 0) != -1) {
              array[_l].classList.remove('star-hover');
            }
          }

          array[_i2].classList.add('star-hover');
        }
      });
      elem.addEventListener('click', function (e) {
        for (var _i3 = 0; _i3 <= index; _i3++) {
          for (var _l2 = array.length - 1; _l2 >= index; _l2--) {
            if (array[_l2].getAttribute('class').indexOf('star-active', 0) != -1) {
              array[_l2].classList.remove('star-active');
            }
          }

          array[_i3].classList.add('star-active');
        }
      });
    });
    starsDiv.addEventListener('mouseleave', function (e) {
      starsArray.forEach(function (star) {
        star.classList.remove('star-hover');
      });
    });
  }
}); // Login/Registration

$('#blueins_open_user_form_popup, #blueins_open_user_form_popup_checkout').on('click', function (e) {
  e.preventDefault();
  $('.blueins_login_user_form_popup__containter').removeClass('registration-active');
  $('#blueins_user_form_popup-overlay').css('visibility', 'visible');
  $('#blueins_user_form_popup-overlay').css('opacity', '1');
  $('#blueins_user_form_popup').addClass('open_popup_log_form');
});
$('#blueins_user_form_popup-colose').on('click', function (e) {
  e.preventDefault();
  $('#blueins_user_form_popup-overlay').css('visibility', 'hidden');
  $('#blueins_user_form_popup-overlay').css('opacity', '0');
  $('#blueins_user_form_popup').removeClass('open_popup_log_form');
});
$('#button-activate-registration').on('click', function (e) {
  e.preventDefault();
  $('.blueins_login_user_form_popup__containter').addClass('registration-active');
});
$('#button-activate-login').on('click', function (e) {
  e.preventDefault();
  $('.blueins_login_user_form_popup__containter').removeClass('registration-active');
}); //MyAccount

$('#myaccount_button-activate-registration').on('click', function (e) {
  e.preventDefault();
  var titleText = document.querySelector('.section-text__title');
  titleText.innerHTML = 'Регистрация';
  $('.myaccount_authorization').addClass('myaccount_registration-active');
});
$('#myaccount_button-activate-login').on('click', function (e) {
  e.preventDefault();
  var titleText = document.querySelector('.section-text__title');
  titleText.innerHTML = 'Войти';
  $('.myaccount_authorization').removeClass('myaccount_registration-active');
});
/**
 * *************************************** Sliders ******************************************
 */

var PAGE_URL = global_params.url;
$('.slick-slider').slick({
  dots: true,
  infinite: true,
  autoplay: true,
  speed: 700,
  autoplaySpeed: 10000,
  fade: true,
  cssEase: 'linear',
  nextArrow: "<button type=\"button\" class=\"slick-next\"><img src=\"".concat(PAGE_URL, "/assets/img/Icon/Dark/next.svg\" alt=\"Next\"></button>"),
  prevArrow: "<button type=\"button\" class=\"slick-prev\"><img src=\"".concat(PAGE_URL, "/assets/img/Icon/Dark/prev.svg\" alt=\"Prev\"></button>"),
  responsive: [{
    breakpoint: 768,
    settings: {
      arrows: false
    }
  }]
});
$(document).ready(function () {
  if (document.getElementById('slider-in-main')) {
    var changeColor = function changeColor() {
      activeSlide = sclickSlider.querySelector('.slick-current');
      colorTitle = activeSlide.querySelector('.title-slider').style.color;
      header = document.querySelector('.header__bottom');

      if (colorTitle === 'rgb(33, 37, 41)') {
        header.classList.add('about__header__bottom'); //console.log('add');
      } else {
        header.classList.remove('about__header__bottom'); //console.log('remove');
      }
    };

    var activeSlide, colorTitle, header;
    var sclickSlider = document.querySelector('.slick-slider');
    var mutationObserver = new MutationObserver(function (mutations) {
      mutations.forEach(function (mutation) {
        changeColor();
      });
    });
    mutationObserver.observe(sclickSlider, {
      attributes: true,
      characterData: true,
      childList: true,
      subtree: true,
      attributeOldValue: true,
      characterDataOldValue: true
    });
    sclickSlider.querySelectorAll('.slick-arrow, .slick-dots').forEach(function (slide) {
      slide.addEventListener('click', function (event) {
        changeColor();
      });
    });
  }
});
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
  nextArrow: "<button type=\"button\" class=\"slick-next\"><img src=\"".concat(PAGE_URL, "/assets/img/Icon/Dark/next.svg\" alt=\"Next\"></button>"),
  prevArrow: "<button type=\"button\" class=\"slick-prev\"><img src=\"".concat(PAGE_URL, "/assets/img/Icon/Dark/prev.svg\" alt=\"Prev\"></button>"),
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
  nextArrow: "<button type=\"button\" class=\"slick-next\"><img src=\"".concat(PAGE_URL, "/assets/img/Icon/Dark/next.svg\" alt=\"Next\"></button>"),
  prevArrow: "<button type=\"button\" class=\"slick-prev\"><img src=\"".concat(PAGE_URL, "/assets/img/Icon/Dark/prev.svg\" alt=\"Prev\"></button>"),
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
  disable: false,
  // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
  startEvent: 'DOMContentLoaded',
  // name of the event dispatched on the document, that AOS should initialize on
  initClassName: 'aos-init',
  // class applied after initialization
  animatedClassName: 'aos-animate',
  // class applied on animation
  useClassNames: false,
  // if true, will add content of `data-aos` as classes on scroll
  disableMutationObserver: false,
  // disables automatic mutations' detections (advanced)
  debounceDelay: 50,
  // the delay on debounce used while resizing window (advanced)
  throttleDelay: 99,
  // the delay on throttle used while scrolling the page (advanced)
  // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
  offset: 250,
  // offset (in px) from the original trigger point
  delay: 0,
  // values from 0 to 3000, with step 50ms
  duration: 800,
  // values from 0 to 3000, with step 50ms
  easing: 'ease',
  // default easing for AOS animations
  once: true,
  // whether animation should happen only once - while scrolling down
  mirror: false,
  // whether elements should animate out while scrolling past them
  anchorPlacement: 'top-bottom' // defines which position of the element regarding to window should trigger the animation

});
/**
 * ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ Animation ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
 */

/**
 * Product Animation
 */

$(document).ready(function () {
  var foreGrid = document.querySelector('#grid-fore');
  var fiveGrid = document.querySelector('#grid-five');
  var listGrid = document.querySelector('#grid-list');

  if (foreGrid || fiveGrid || listGrid) {
    var viewGrid = function viewGrid(event) {
      var _this = this;

      $('#header__bottom-cover').addClass('header__bottom-fixed');
      var element = document.querySelector('#blueins-filters-block').getBoundingClientRect();
      $('html, body').animate({
        scrollTop: window.pageYOffset + element.y - 76
      }, 1000);
      event.preventDefault();
      var container = document.querySelector('#products__list-container');
      var productArr = document.querySelectorAll('.big-products__list__item');
      butArr.forEach(function (item) {
        return item !== _this ? item.classList.remove('grid-button-active') : item.classList.add('grid-button-active');
      });
      var index = this.getAttribute('id').indexOf('-');
      var gridType = this.getAttribute('id').slice(index + 1);
      var ms = 0;

      for (var _i4 = 0; _i4 <= productArr.length; _i4++) {
        ms += _i4 + 100;
      }

      productArr.forEach(function (item) {
        item.style = 'opacity: 0';
        setTimeout(function () {
          container.classList.remove('five-item', 'fore-item', 'list-item');
          container.classList.add(gridType + '-item');
          setTimeout(function () {
            item.style = 'opacity: 1';
          }, 0.001);
        }, ms * 0.5);
      });
    };

    var butArr = [foreGrid, fiveGrid, listGrid];
    butArr.forEach(function (item) {
      return item.addEventListener('click', viewGrid);
    });
  }
});
/**
 * URL Animation
 */

document.addEventListener('DOMContentLoaded', function (event) {
  var hash = window.location.hash;

  if (hash) {
    var element = document.querySelector('.' + hash.slice(1)).getBoundingClientRect();

    if (element) {
      document.querySelector('#header__bottom-cover').classList.add('header__bottom-fixed');
      $('html, body').animate({
        scrollTop: window.pageYOffset + element.y - 76
      }, 1000);
    }
  }
});
/**
 * To Match Container
 */

document.addEventListener('DOMContentLoaded', function (event) {
  var cart = document.getElementById('cart-menu');
  var cartObsurver = new MutationObserver(function (mutation) {
    mutation.forEach(function (mut) {
      var tomatchContainer = document.getElementById('tomatch-container') ? document.getElementById('tomatch-container') : false;

      if (tomatchContainer) {
        var timeoutId = setTimeout(function () {
          tomatchContainer.classList.add('tomatchContainer-hidden');
        }, 2000);
        var timeoutId_second = setTimeout(function () {
          tomatchContainer.style = 'display: none';
          setTimeout;
        }, 2300);

        if (tomatchContainer.hasAttribute('style')) {
          clearTimeout(timeoutId);
          clearTimeout(timeoutId_second);
        }
      }
    });
  });
  cartObsurver.observe(cart, {
    attributes: true,
    characterData: true,
    childList: true,
    subtree: true,
    attributeOldValue: true,
    characterDataOldValue: true
  });
});
/**
 * Variation Product In Shop Page
 */

document.addEventListener('DOMContentLoaded', function (event) {
  var pagination = document.querySelector('.woocommerce-pagination');
  add_variation_in_shop();

  if (pagination) {
    var shopObsurver = new MutationObserver(function (mutation) {
      mutation.forEach(function (mut) {
        console.log(mut);
        add_variation_in_shop();
      });
    });
    shopObsurver.observe(pagination, {
      attributes: true,
      characterData: true,
      childList: true,
      subtree: true,
      attributeOldValue: true,
      characterDataOldValue: true
    });
  }

  function add_variation_in_shop() {
    var product_color = document.querySelectorAll('.product-cart .product-color__item');

    if (product_color[0]) {
      var variationInShopPage = function variationInShopPage(event) {
        event.preventDefault();
        var span_container = event.target.parentNode.parentNode;
        var spans = span_container.querySelectorAll('.color-select-circle');
        spans.forEach(function (span) {
          return span.classList.remove('color-select');
        });
        event.target.classList.add('color-select');
        var data_color_id = event.target.getAttribute('data-blu-color-id');
        var data_img = event.target.getAttribute('data-img');
        var data_product = document.querySelector("div[data-blu-product-id=\"".concat(data_color_id, "\"]"));
        var data_product_figure = data_product.querySelector('.figure-product__first');
        data_product_figure.setAttribute('src', data_img);
      };

      // Do on start
      var active_circle = document.querySelector('.product-cart .product-color__item .color-select');
      var data_color_id = active_circle.getAttribute('data-blu-color-id');
      var data_img = active_circle.getAttribute('data-img');
      var data_product = document.querySelector("div[data-blu-product-id=\"".concat(data_color_id, "\"]"));
      var data_product_figure = data_product.querySelector('.figure-product__first');
      data_product_figure.setAttribute('src', data_img); // Do on start

      product_color.forEach(function (element) {
        element.addEventListener('click', variationInShopPage);
      });
    }
  }
});
},{"./frontend/event-window":"frontend/event-window.js","./frontend/blueins-fullscreen-menu":"frontend/blueins-fullscreen-menu.js"}],"../../node_modules/parcel-bundler/src/builtins/hmr-runtime.js":[function(require,module,exports) {
var global = arguments[3];
var OVERLAY_ID = '__parcel__error__overlay__';
var OldModule = module.bundle.Module;

function Module(moduleName) {
  OldModule.call(this, moduleName);
  this.hot = {
    data: module.bundle.hotData,
    _acceptCallbacks: [],
    _disposeCallbacks: [],
    accept: function (fn) {
      this._acceptCallbacks.push(fn || function () {});
    },
    dispose: function (fn) {
      this._disposeCallbacks.push(fn);
    }
  };
  module.bundle.hotData = null;
}

module.bundle.Module = Module;
var checkedAssets, assetsToAccept;
var parent = module.bundle.parent;

if ((!parent || !parent.isParcelRequire) && typeof WebSocket !== 'undefined') {
  var hostname = "" || location.hostname;
  var protocol = location.protocol === 'https:' ? 'wss' : 'ws';
  var ws = new WebSocket(protocol + '://' + hostname + ':' + "64366" + '/');

  ws.onmessage = function (event) {
    checkedAssets = {};
    assetsToAccept = [];
    var data = JSON.parse(event.data);

    if (data.type === 'update') {
      var handled = false;
      data.assets.forEach(function (asset) {
        if (!asset.isNew) {
          var didAccept = hmrAcceptCheck(global.parcelRequire, asset.id);

          if (didAccept) {
            handled = true;
          }
        }
      }); // Enable HMR for CSS by default.

      handled = handled || data.assets.every(function (asset) {
        return asset.type === 'css' && asset.generated.js;
      });

      if (handled) {
        console.clear();
        data.assets.forEach(function (asset) {
          hmrApply(global.parcelRequire, asset);
        });
        assetsToAccept.forEach(function (v) {
          hmrAcceptRun(v[0], v[1]);
        });
      } else if (location.reload) {
        // `location` global exists in a web worker context but lacks `.reload()` function.
        location.reload();
      }
    }

    if (data.type === 'reload') {
      ws.close();

      ws.onclose = function () {
        location.reload();
      };
    }

    if (data.type === 'error-resolved') {
      console.log('[parcel] ✨ Error resolved');
      removeErrorOverlay();
    }

    if (data.type === 'error') {
      console.error('[parcel] 🚨  ' + data.error.message + '\n' + data.error.stack);
      removeErrorOverlay();
      var overlay = createErrorOverlay(data);
      document.body.appendChild(overlay);
    }
  };
}

function removeErrorOverlay() {
  var overlay = document.getElementById(OVERLAY_ID);

  if (overlay) {
    overlay.remove();
  }
}

function createErrorOverlay(data) {
  var overlay = document.createElement('div');
  overlay.id = OVERLAY_ID; // html encode message and stack trace

  var message = document.createElement('div');
  var stackTrace = document.createElement('pre');
  message.innerText = data.error.message;
  stackTrace.innerText = data.error.stack;
  overlay.innerHTML = '<div style="background: black; font-size: 16px; color: white; position: fixed; height: 100%; width: 100%; top: 0px; left: 0px; padding: 30px; opacity: 0.85; font-family: Menlo, Consolas, monospace; z-index: 9999;">' + '<span style="background: red; padding: 2px 4px; border-radius: 2px;">ERROR</span>' + '<span style="top: 2px; margin-left: 5px; position: relative;">🚨</span>' + '<div style="font-size: 18px; font-weight: bold; margin-top: 20px;">' + message.innerHTML + '</div>' + '<pre>' + stackTrace.innerHTML + '</pre>' + '</div>';
  return overlay;
}

function getParents(bundle, id) {
  var modules = bundle.modules;

  if (!modules) {
    return [];
  }

  var parents = [];
  var k, d, dep;

  for (k in modules) {
    for (d in modules[k][1]) {
      dep = modules[k][1][d];

      if (dep === id || Array.isArray(dep) && dep[dep.length - 1] === id) {
        parents.push(k);
      }
    }
  }

  if (bundle.parent) {
    parents = parents.concat(getParents(bundle.parent, id));
  }

  return parents;
}

function hmrApply(bundle, asset) {
  var modules = bundle.modules;

  if (!modules) {
    return;
  }

  if (modules[asset.id] || !bundle.parent) {
    var fn = new Function('require', 'module', 'exports', asset.generated.js);
    asset.isNew = !modules[asset.id];
    modules[asset.id] = [fn, asset.deps];
  } else if (bundle.parent) {
    hmrApply(bundle.parent, asset);
  }
}

function hmrAcceptCheck(bundle, id) {
  var modules = bundle.modules;

  if (!modules) {
    return;
  }

  if (!modules[id] && bundle.parent) {
    return hmrAcceptCheck(bundle.parent, id);
  }

  if (checkedAssets[id]) {
    return;
  }

  checkedAssets[id] = true;
  var cached = bundle.cache[id];
  assetsToAccept.push([bundle, id]);

  if (cached && cached.hot && cached.hot._acceptCallbacks.length) {
    return true;
  }

  return getParents(global.parcelRequire, id).some(function (id) {
    return hmrAcceptCheck(global.parcelRequire, id);
  });
}

function hmrAcceptRun(bundle, id) {
  var cached = bundle.cache[id];
  bundle.hotData = {};

  if (cached) {
    cached.hot.data = bundle.hotData;
  }

  if (cached && cached.hot && cached.hot._disposeCallbacks.length) {
    cached.hot._disposeCallbacks.forEach(function (cb) {
      cb(bundle.hotData);
    });
  }

  delete bundle.cache[id];
  bundle(id);
  cached = bundle.cache[id];

  if (cached && cached.hot && cached.hot._acceptCallbacks.length) {
    cached.hot._acceptCallbacks.forEach(function (cb) {
      cb();
    });

    return true;
  }
}
},{}]},{},["../../node_modules/parcel-bundler/src/builtins/hmr-runtime.js","common.js"], null)
//# sourceMappingURL=/common.js.map