$(document).ready(function() {
    var scrollTop = $(".scrollTop");

    $(scrollTop).css("opacity", "0");


    $(window).scroll(function() {
        var topPos = $(this).scrollTop();

        if (topPos > 100) {
            $(scrollTop).css("opacity", "1");

        } else {
            $(scrollTop).css("opacity", "0");
            $(scrollTop).css("transition", "linear .3s");
        }
    });
    $(scrollTop).click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        return false;
    }); 
}); 