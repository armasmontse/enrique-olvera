const $ = jQuery;
//Max width 450px
export var logoScroll = function () {
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
    }else {
        // console.log($('#title_JS'));
        // console.log('entra tambien');
        $('#title_JS').show();
        $('#title-fix_JS').css({
            visibility: 'hidden'
        });
    }

}
