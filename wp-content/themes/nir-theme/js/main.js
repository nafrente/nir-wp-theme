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
            $('header .container nav').addClass('full');
        }else {
            $('#menu-main').addClass('hide-on-mobile');
            $('.branding a span').addClass('hide-on-mobile');
            $('header .container nav').removeClass('full');
        }
    })

    //Unwrapping images from p tags done by wordpress
    var imgTags = $( '.single-main img' );
    if ( imgTags.parent().is( 'p' ) ) {
        imgTags.unwrap();
    }

    // link scroll
    $('a').on('click', function (event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate(
                {scrollTop: $(hash).offset().top},
                800,
                function(){
                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        }
    })
    //Scroll top link
    $('#top-link').on('click', function (event) {
        event.preventDefault();
        $('html, body').animate({scrollTop: 0}, 800);
    })

});