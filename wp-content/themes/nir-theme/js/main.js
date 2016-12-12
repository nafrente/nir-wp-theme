//Main js scripts of the site

jQuery( document ).ready(function() {
    // Using $ instead of jQuery
    var $ = jQuery.noConflict();

    //Home carousel
    $('.the-carousel').slick({
        slidesToShow: 3,
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
});