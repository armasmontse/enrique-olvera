/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			exports: {},
/******/ 			id: moduleId,
/******/ 			loaded: false
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "./js/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(0);
/******/ })
/************************************************************************/
/******/ ({

/***/ 0:
/***/ (function(module, exports, __webpack_require__) {

	'use strict';
	
	var _menu = __webpack_require__(324);
	
	var _logo = __webpack_require__(325);
	
	var _footer = __webpack_require__(326);
	
	var _scroll = __webpack_require__(327);
	
	var $ = jQuery;
	
	
	$(window).load(function () {
	    //scroll
	    (0, _scroll.smoothScroll)();
	
	    //menú responsive
	    (0, _menu.menuResponsive)();
	
	    //menú fijo
	    (0, _menu.menuFixed)();
	
	    (0, _logo.logoScroll)();
	
	    (0, _footer.footerFixed)();
	
	    (0, _footer.newsletter)();
	
	    //parallax de imágenes
	    // init controller
	    var controller = new ScrollMagic.Controller();
	
	    var timelineMaxParallax = new TimelineMax();
	    //porcentaje en los que se tienen que mover las imágenes parallax del menú
	    timelineMaxParallax.from('.y-scroll_JS.scroll-15_JS', 1, { y: '15%', ease: Back.easeIn.config(2) }, 0).from('.y-scroll_JS.scroll-45_JS', 1, { y: '45%', ease: Back.easeIn.config(2) }, 0).from('.y-scroll_JS.scroll-75_JS', 1, { y: '75%', ease: Back.easeIn.config(2) }, 0);
	
	    // create a scene
	    var slideParallaxScene = new ScrollMagic.Scene({
	        triggerElement: '.y-scroll_JS',
	        triggerHook: 1,
	        duration: '125%' // the scene should last for a scroll distance of 100px
	    }).setClassToggle(".y-scroll_JS", "in-viewport_JS").setTween(timelineMaxParallax)
	    //.addIndicators() //Indicadores de scroll magic
	    .addTo(controller); // assign the scene to the controller
	});
	
	$(window).scroll(function () {
	    (0, _logo.logoScroll)();
	});

/***/ }),

/***/ 324:
/***/ (function(module, exports) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	var $ = jQuery;
	
	var menuResponsive = exports.menuResponsive = function menuResponsive() {
	    var body = $('body');
	    var menu = $('.mobile_JS');
	    var button = $('.mobile_btn_JS');
	    var toggle = 0;
	
	    // menu.slideUp(0)
	    button.click(function () {
	        if (toggle === 0) {
	            menu.slideDown('fast');
	            toggle++;
	        } else {
	            menu.slideUp('fast');
	            toggle = 0;
	        }
	    });
	    menu.click(function () {
	        $(this).slideUp('fast');
	    });
	    if ($(window).width() <= 768) {
	        $(window).resize(function () {
	            menu.slideUp(0);
	            toggle = 0;
	        });
	    }
	};
	
	var menuFixed = exports.menuFixed = function menuFixed() {
	    var altura = $('#height_JS').height() - 23;
	
	    if ($(window).scrollTop() >= altura) {
	        // $('#header-fixed_JS').slideDown('fast');
	        $('#languages-fixed_JS').css({
	            position: 'fixed',
	            top: 0,
	            right: 0,
	            paddingTop: '10px',
	            zIndex: 99999,
	            width: '100%',
	            background: '#e5e6e5'
	        });
	        $('#header-fixed_JS').css({
	            position: 'fixed',
	            top: '20px',
	            zIndex: 99999,
	            width: '100%',
	            background: '#e5e6e5',
	            boxShadow: '0 4px 2px -2px rgba(0, 0, 0, 0.15)',
	            padding: '0px !important'
	        });
	        if ($(window).width() <= 768) {
	            $('#header-fixed_JS').css({
	                top: '30px'
	            });
	        }
	        $('body').css({
	            paddingTop: '140px'
	        });
	    } else {
	        // $('#header-fixed_JS').slideUp('fast');
	        $('#languages-fixed_JS').css({
	            position: 'relative',
	            top: 0,
	            zIndex: 0,
	            width: '100%'
	        });
	        $('#header-fixed_JS').css({
	            position: 'relative',
	            top: 0,
	            zIndex: 0,
	            background: 'transparent',
	            boxShadow: 'none'
	        });
	        $('body').css({
	            paddingTop: '0px'
	        });
	    }
	};
	
	$(window).scroll(menuFixed);

/***/ }),

/***/ 325:
/***/ (function(module, exports) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	var $ = jQuery;
	//Max width 450px
	var logoScroll = exports.logoScroll = function logoScroll() {
	    var altura = $(window).height() * .23 || 0;
	    var logo = $('#header-fixed_JS').offset().top;
	    //console.log(logo);
	    var title = $('#title_JS').offset().top;
	    //console.log(title);
	    var aux = false;
	
	    if (title >= logo) {
	        $('#title_JS').css({
	            backgound: 'red'
	        });
	        aux = true;
	        $('#title_JS').hide();
	    }
	    $('#title_JS').show();
	    //console.log(aux);
	    //console.log(logo);
	    //console.log($(window).scrollTop());
	    //console.log(logo + $(window).scrollTop());
	    //console.log($('#header-fixed_JS').offset().top);
	    if ($(window).scrollTop() >= altura) {
	        //if(title >= logo){
	        //console.log('entra');
	        $('#title_JS').hide();
	        $('#title-fix_JS').css({
	            visibility: 'visible'
	        });
	    } else {
	        // console.log($('#title_JS'));
	        // console.log('entra tambien');
	        $('#title_JS').show();
	        $('#title-fix_JS').css({
	            visibility: 'hidden'
	        });
	    }
	};

/***/ }),

/***/ 326:
/***/ (function(module, exports) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	var $ = jQuery;
	
	var footerFixed = exports.footerFixed = function footerFixed() {
	    var footer = $("#footer-fixed_JS");
	    var about_height = $('#about-height_JS');
	    var cover_height = $('#height_JS');
	
	    var total_hegiht = about_height.height() + cover_height.height();
	    if ($(window).scrollTop() >= total_hegiht) {
	        footer.show();
	    }
	    if ($(window).scrollTop() < total_hegiht) {
	        footer.hide();
	    }
	};
	
	var newsletter = exports.newsletter = function newsletter() {
	    var newsletter = $('#newsletter_JS');
	    var form = $('#form_JS');
	    var toggle = true;
	
	    newsletter.click(function () {
	        //console.log(toggle);
	        if (toggle === true) {
	            form.slideDown('fast');
	            toggle = false;
	        } else {
	            form.slideUp('fast');
	            toggle = true;
	        }
	    });
	
	    $(window).click(function (e) {
	        if (e.target.id != 'newsletter_JS' && e.target.id != 'mce-EMAIL') {
	            form.slideUp('fast');
	            toggle = true;
	        }
	    });
	};
	
	$(window).scroll(footerFixed);

/***/ }),

/***/ 327:
/***/ (function(module, exports) {

	"use strict";
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	var $ = jQuery;
	
	var smoothScroll = exports.smoothScroll = function smoothScroll() {
	    $("body").on("click", ".link-menu", function (e) {
	        e.preventDefault();
	
	        var target = $(this).attr("href");
	
	        $('html, body').stop().animate({
	            scrollTop: $(target).offset().top - 168
	        }, 600);
	
	        return false;
	    });
	};

/***/ })

/******/ });
//# sourceMappingURL=functions.js.map