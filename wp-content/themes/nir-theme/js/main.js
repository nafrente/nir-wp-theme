//Main js scripts of the site

jQuery( document ).ready(function() {
    // Using $ instead of jQuery
    var $ = jQuery.noConflict();

    //Home carousel
    $('.the-carousel').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
    });

});