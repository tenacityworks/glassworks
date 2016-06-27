/**
 * Custom Glassworks Javascript / jQuery
 *
 * Developer: Archie22is
 * Last Mod: June 2016
 */


jQuery( document ).ready(function($) {

    /**
     * Footer Menu Toggle Switch
     * slide up and add custom class
     *
     * @author: Archie
     */

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




    /**
     * Gallery navigate to slider onClick
     *
     * Footer Click on Image  ->  Minimise Footer  -> Go to image in Slider
     * http://codepen.io/anon/pen/NPeLrd
     *
     * @author: Archie
     */

    $('.gallery-thumbnails ul li').click ( function(e) {

        // get source
        var source = $(this).data("id");

        // get destination
        var destination = $('.home-carousel').find("[data-id='" + source + "']");
        var destinationIndex = destination.parent().data("slick-index");

        // go to related image in the slider
        $('.home-carousel').slick('slickGoTo', destinationIndex)


        // animate and close footer
        $("#gallery-toggle").click();

    });



});
