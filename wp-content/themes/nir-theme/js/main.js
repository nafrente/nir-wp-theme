//Main js scripts of the site

jQuery( document ).ready(function() {
    // Using $ instead of jQuery
    var $ = jQuery.noConflict();

    //Home carousel
    $('.the-carousel').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
    });

    //Portfolio Scripts
    jQuery('.sorting-link.by-date').on('click', function(){
        event.preventDefault();
        jQuery('.list-projects.by-date').removeClass('hide');
        jQuery('.list-projects.by-title').addClass('hide');
        jQuery(this).addClass('selected');
        jQuery(this).siblings().removeClass('selected');
    });

    jQuery('.sorting-link.by-title').on('click', function(){
        event.preventDefault();
        jQuery('.list-projects.by-date').addClass('hide');
        jQuery('.list-projects.by-title').removeClass('hide');
        jQuery(this).addClass('selected');
        jQuery(this).siblings().removeClass('selected');
    });

    //Main menu events
    $('#mobile-menu-text .text').on('click', function (event) {
        event.preventDefault();
        $('#mobile-menu-text .text').toggleClass('hide');
        if( !$(this).hasClass('open') ){
            $('#menu-main').removeClass('hide-on-mobile');
            $('.branding a span').removeClass('hide-on-mobile');
        }else {
            $('#menu-main').addClass('hide-on-mobile');
            $('.branding a span').addClass('hide-on-mobile');
        }
    })
});