/**
 *
 */


jQuery( document ).ready(function($) {

    /**
     * Footer Menu Toggle Switch
     * @author: Archie
     */

    // slide up and add custom class
    $("#gallery-toggle").click( function(e) {

        e.preventDefault();

        var theFooter = $('footer');        // store element in a variable to be resused

        if ($(theFooter).hasClass("closed-menu") ) {
            $(theFooter).animate({height: "100%"}, 500);
            $(theFooter).removeClass("closed-menu");
        } else {
            $(theFooter).animate({height: "80px"}, 500);
            $(theFooter).addClass("closed-menu");
        }

        $(this).toggleClass("closed-menu");
        return false;

    });




    /**
     * Home Page Slider
     *
     * Footer Click on Image  ->  Minimise Footer  -> Go to image in Slider
     * http://codepen.io/anon/pen/NPeLrd
     *
     * @author: Archie
     */

    $('.home-carousel').slick({
        arrows: true,
        mobileFirst: true,
        adaptiveHeight: true,
        infinite: true
    });


    $('.gallery-thumbnails ul li').click ( function(e) {
        //e.preventDefault();

        // get source
        var source = $(this).data("id");

        // get destination
        var destination = $('.home-carousel').find("[data-id='" + source + "']");
        //$('.gallery-thumbnails ul li').slickGoTo(destination);
        //$(this).slickGoTo(destination);
        //$(destination).attr('class').split(' ');
        alert(destination);


        // go to related image in the slider
        //$('.home-carousel').slickGoTo( parseInt(destination) );

        // animate and close footer
        /*
        $(this).closest('footer').animate({height: "80px"}, 500);
        $(this).closest('footer').addClass("closed-menu");
        */
    });


    /*
    Mihai Version

    var slideWhereToGo;
    slideWhereToGo = $(".slick-track").find("[data-id='" + 64 + "']").parent().attr('data-slick-index');
    $('.slick-slider').slickGoTo(slideWhereToGo);
    */


    //$('.gallery-thumbnails ul li').each( function() {

    /*
     $('nav .slide-' + i + ' a').click(function() {

     //$('.home-carousel').slickGoTo(i);

     console.log( $(this) );             // debug this shit
     })
     */
    //});


});

