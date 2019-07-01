const $ = jQuery;

export var smoothScroll = function() {
    $("body").on("click", ".link-menu", function(e) {
        e.preventDefault();

        var target = $(this).attr("href");

        $('html, body').stop().animate({
            scrollTop: $(target).offset().top - 168
        }, 600);

        return false;

    });
}
