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

    $('.gallery-thumbnails ul li').click ( function() {
    //$('.gallery-thumb-group > ul li a img').click( function() {

        // get source
        var source = $(this).data("id");
        alert (source);

        // get destination
        /*  var destination = $('.home-carousel').data('id'); */
        //$('.home-carousel[data-id="60"]').slickGoTo(source);

        $('.home-carousel').slick('slickGoTo', parseInt(source));


        // animate and close footer
        //$(this).closest('footer').animate({height: "80px"}, 500);
        //$(this).closest('footer').addClass("closed-menu");

    });




    //$('.gallery-thumbnails ul li').each( function() {

    /*
     $('nav .slide-' + i + ' a').click(function() {

     //$('.home-carousel').slickGoTo(i);

     console.log( $(this) );             // debug this shit
     })
     */
    //});





    /**
     * Home page slider
     * @author: Archie
     */
/*
    $('.home-carousel').slick({
        autoplay: true,
        autoplaySpeed: 16000,
        mobileFirst: true,
        adaptiveHeight: true,
        infinite: true
    });
*/



    /**
     * Link to homepage current slider
     *
     *
     *

    $(".slideshow-slider").on("afterChange", function(t, n, s) {
        if (e) {
            var r = n.currentSlide + 1;
            $(".current-count").text(r);
            var a = $(".slick-current").find(".slide-caption").html();
            $(".slideshow-caption").html(a),
                o.getAds({
                    enableSingleRequest: !0,
                    refreshExisting: !0
                });
            var l = window.location.pathname
                , c = /\/slideshows\/detail\/(\d+)-([-|\w]+)\/(\d+)\//;
            if (l.match(c)) {
                //var d = l.replace(/\/slideshows\/detail\/(\d+)-([-|\w]+)\/(\d+)\//, "/slideshows/detail/$1-$2/" + r + "/");
                var d = l.replace(/\/slideshows\/detail\/(\d+)-([-|\w]+)\/(\d+)\//, r + "/");
                window.history.replaceState(null , null , d),
                    ga("send", "pageview", d)
            } else {
                var d = l + r + "/";
                window.history.replaceState(null , null , d),
                    ga("send", "pageview", d)
            }
        }
    });

    */




});

