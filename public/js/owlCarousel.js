$(document).ready(function() {

    var owl = $("#owl-demo");

    owl.owlCarousel();

    $(".next").click(function() {
        owl.trigger('owl.next');
    })
    $(".prev").click(function() {
        owl.trigger('owl.prev');
    })

});