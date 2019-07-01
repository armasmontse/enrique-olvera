const $ = jQuery;

export var menuResponsive = function() {
    var body = $('body')
    var menu = $('.mobile_JS')
    var button = $('.mobile_btn_JS')
    var toggle = 0

    // menu.slideUp(0)
    button.click( function () {
        if ( toggle === 0 ) {
            menu.slideDown('fast');
            toggle++;
        } else {
            menu.slideUp('fast');
            toggle = 0;
        }
    });
    menu.click( function () {
        $(this).slideUp('fast');
    });
    if ($(window).width() <= 768) {
        $(window).resize( function () {
            menu.slideUp(0);
            toggle = 0;
        })
    }
}

export var menuFixed = function() {
	var altura = $('#height_JS').height() - 23;

		if ($(window).scrollTop() >= altura) {
			// $('#header-fixed_JS').slideDown('fast');
			$('#languages-fixed_JS').css({
                position: 'fixed',
                top: 0,
                right: 0,
                paddingTop: '10px',
                zIndex: 99999,
                width:'100%',
                background: '#e5e6e5'
            });
			$('#header-fixed_JS').css({
				position: 'fixed',
                top: '20px',
                zIndex: 99999,
                width:'100%',
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
                width:'100%',
			});
            $('#header-fixed_JS').css({
				position: 'relative',
                top: 0,
                zIndex: 0,
                background: 'transparent',
                boxShadow: 'none',
			});
			$('body').css({
				paddingTop: '0px'
			});
		}
}

$(window).scroll(menuFixed);
