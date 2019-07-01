const $ = jQuery;

export var footerFixed = function() {
    var footer = $("#footer-fixed_JS");
    var about_height = $('#about-height_JS');
    var cover_height = $('#height_JS');

    var total_hegiht = about_height.height() + cover_height.height();
    if ($(window).scrollTop() >= total_hegiht) {
        footer.show()
    }
    if ($(window).scrollTop() < total_hegiht) {
        footer.hide()
    }
}

export var newsletter = function() {
    var newsletter = $('#newsletter_JS');
    var form = $('#form_JS');
    var toggle = true;

    newsletter.click( function () {
        //console.log(toggle);
        if ( toggle === true ) {
            form.slideDown('fast');
            toggle= false;
        } else {
            form.slideUp('fast');
            toggle = true;
        }
    });

    $(window).click( function (e) {
        if(e.target.id != 'newsletter_JS' && 
            e.target.id != 'mce-EMAIL'){
            form.slideUp('fast');
            toggle = true;
        }
    });

};

$(window).scroll(footerFixed);
