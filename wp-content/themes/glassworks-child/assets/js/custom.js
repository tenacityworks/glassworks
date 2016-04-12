/**
 *
 */


jQuery( document ).ready(function($) {

    /**
     * Home page slider
     * @author: Archie
     */
    
    $('.home-carousel').slick({
        autoplay: true,
        autoplaySpeed: 16000,
        centerMode: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        mobileFirst: true,
        adaptiveHeight: true,
        infinite: true
        //lazyLoad: demand
    });

    


    /**
     * Footer Menu Toggle Switch
     * @author: Archie
     */

    // slide up and add custom class
    $("#gallery-toggle").click( function(e) {

        e.preventDefault();

        if ($('footer').hasClass("closed-menu") ) {
            $('footer').animate({height: "100%"}, 500);
            $('footer').removeClass("closed-menu");
        } else {
            $('footer').animate({height: "80px"}, 500);
            $('footer').addClass("closed-menu");
        }

        $(this).toggleClass("closed-menu");
        return false;

    });





    //



    /*
    $('span.gallery-toggle').click(function () {
        $('footer').animate({height:"100%"}, 500);
    });
    */




});

