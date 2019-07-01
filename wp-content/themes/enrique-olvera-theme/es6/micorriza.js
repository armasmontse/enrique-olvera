const $ = jQuery;
import {menuResponsive, menuFixed} from './menu';
import {logoScroll} from './logo';
import {footerFixed, newsletter} from './footer';
import {smoothScroll} from './scroll';

$(window).load(() => {
    //scroll
    smoothScroll();

    //menú responsive
    menuResponsive();

    //menú fijo
    menuFixed();

    logoScroll();

    footerFixed();

    newsletter();

    //parallax de imágenes
    // init controller
    var controller = new ScrollMagic.Controller();

    var timelineMaxParallax = new TimelineMax();
    //porcentaje en los que se tienen que mover las imágenes parallax del menú
    timelineMaxParallax
        .from('.y-scroll_JS.scroll-15_JS', 1, {y: '15%', ease: Back.easeIn.config(2) }, 0)
        .from('.y-scroll_JS.scroll-45_JS', 1, {y: '45%', ease: Back.easeIn.config(2) }, 0)
        .from('.y-scroll_JS.scroll-75_JS', 1, {y: '75%', ease: Back.easeIn.config(2) }, 0)

    // create a scene
    var slideParallaxScene = new ScrollMagic.Scene({
        triggerElement: '.y-scroll_JS',
        triggerHook: 1,
        duration: '125%',    // the scene should last for a scroll distance of 100px
    })
    .setClassToggle(".y-scroll_JS", "in-viewport_JS")
    .setTween(timelineMaxParallax)
    //.addIndicators() //Indicadores de scroll magic
    .addTo(controller); // assign the scene to the controller

});

$(window).scroll(function() {
    logoScroll();
})
