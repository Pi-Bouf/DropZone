function initialize() {
    var inputDep = document.getElementById('departTransport');
    var inputArr = document.getElementById('arriveeTransport');

    autocompleteDepTrans = new google.maps.places.Autocomplete(
        (inputDep));
    autocompleteDepTrans.addListener('place_changed', function() {
        var place = autocompleteDepTrans.getPlace();
        $('#departTransHidden').val(place.geometry.location.lat() + ";" + place.geometry.location.lng());
    });

    autocompleteArrTrans = new google.maps.places.Autocomplete(
        (inputArr));
    autocompleteArrTrans.addListener('place_changed', function() {
        var place = autocompleteArrTrans.getPlace();
        $('#arriveeTransHidden').val(place.geometry.location.lat() + ";" + place.geometry.location.lng());
    });
}

function initMap() {
    directionsDisplay = new google.maps.DirectionsRenderer();
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 46.797, lng: 2.544 },
        zoom: 5
    });
    directionsDisplay.setMap(map);
    google.maps.event.addDomListener(window, 'load', initialize);
}

$(document).ready(function() {
    // Scrollbar
    var $document_body = $('#transportsList');
    if ($document_body.data('scrollator') === undefined) {
        $document_body.scrollator({
            custom_class: 'body_scroller'
        });
    }
});