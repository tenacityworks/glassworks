/**
 * Load google maps on the contact page
 * @author Archie
 *
 */


// get coordinates from data-tags on the contact page
    /*
var lat = $('.map-wrapper').attr('data-lat');
var long = $('.map-wrapper').data('data-long');
*/



jQuery( window ).ready(function($) {

    /* load maps function */
    loadMap();

});


function loadMap() {

    // Get dynamic coordinates
    var wrapper = document.getElementById('map-wrapper');
    var long = wrapper.dataset.long;
    var lat = wrapper.dataset.lat;

    // Convert to floats
    var newLat = parseFloat(lat);
    var newLng = parseFloat(long);

    // Define pin location
    var pinPos = new google.maps.LatLng(newLat, newLng);

    // Create a map object and specify the DOM element for display.
    var map = new google.maps.Map(document.getElementById('map'), {
        center: pinPos,
        scrollwheel: false,

        zoom: 16,
        styles: [
            {
                "featureType":"water",
                "elementType":"geometry",
                "stylers":[
                    {"color":"#e9e9e9"},
                    {"lightness":17}
                ]
            },
            {
                "featureType":"landscape",
                "elementType":"geometry",
                "stylers":[
                    {"color":"#f5f5f5"},
                    {"lightness":20}
                ]
            },
            {
                "featureType":"road.highway",
                "elementType":"geometry.fill",
                "stylers":[
                    {"color":"#ffffff"},
                    {"lightness":17}
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [{"color": "#ffffff"},
                    {"lightness": 29},
                    {"weight": 0.2}]
            },
            {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [
                    {"color": "#ffffff"},
                    {"lightness": 18}
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "geometry",
                "stylers": [
                    {"color": "#ffffff"},
                    {"lightness": 16}
                ]
            },
            {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [
                    {"color": "#f5f5f5"},
                    {"lightness": 21}]
            },
            {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [
                    {"color": "#dedede"},
                    {"lightness": 21}
                ]
            },
            {
                "elementType": "labels.text.stroke",
                "stylers": [
                    {"visibility": "on"},
                    {"color": "#ffffff"},
                    {"lightness": 16}
                ]
            },
            {
                "elementType": "labels.text.fill",
                "stylers": [
                    {"saturation": 36},
                    {"color": "#333333"},
                    {"lightness": 40}
                ]
            },
            {
                "elementType": "labels.icon",
                "stylers": [
                    {"visibility": "off"}
                ]
            },
            {
                "featureType": "transit",
                "elementType": "geometry",
                "stylers": [
                    {"color": "#f2f2f2"},
                    {"lightness": 19}
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "geometry.fill",
                "stylers": [
                    {"color": "#fefefe"},
                    {"lightness": 20}
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "geometry.stroke",
                "stylers": [
                    {"color": "#fefefe"},
                    {"lightness": 17},
                    {"weight": 1.2}
                ]
            }
        ]

    });


    // Info window content
    var contentString = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading">The Glassworks</h1>'+
        '<div id="bodyContent">'+
        '<p>1c Montford Place<br> ' +
        '<p>Kennington Green<br> ' +
        '<p>London SE11 5DE<br> ' +
        '<p>United Kingdom<br> '+
        '</div>'+
        '</div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });


    // Create a marker titile.
    var marker = new google.maps.Marker({
        map: map,
        position: pinPos,
        title: 'The Glassworks'
    });


    // Open info window on click
    marker.addListener('click', function() {
        infowindow.open(map, marker);
    });


}
