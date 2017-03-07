var directionsService = null;
var directionsDisplay = null;
var map = null;
var markerDep = null;
var markerArr = null;
var cityCircle = Array();

function initialize() {
    var inputDep = document.getElementById('departTransport');
    var inputArr = document.getElementById('arriveeTransport');

    autocompleteDepTrans = new google.maps.places.Autocomplete(
        (inputDep));
    autocompleteDepTrans.addListener('place_changed', function () {
        var place = autocompleteDepTrans.getPlace();
        $('#departTransHidden').val(place.geometry.location.lat() + ";" + place.geometry.location.lng());
    });

    autocompleteArrTrans = new google.maps.places.Autocomplete(
        (inputArr));
    autocompleteArrTrans.addListener('place_changed', function () {
        var place = autocompleteArrTrans.getPlace();
        $('#arriveeTransHidden').val(place.geometry.location.lat() + ";" + place.geometry.location.lng());
    });


    // Trajet sur la map
    directionsService = new google.maps.DirectionsService();

    var depart = new google.maps.LatLng(depTab[0], depTab[1]);
    var arrivee = new google.maps.LatLng(arrTab[0], arrTab[1]);
    var request = {
        destination: arrivee,
        avoidHighways: true,
        origin: depart,
        travelMode: 'DRIVING'
    };

    directionsService.route(request, function (response, status) {
        if (status === google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        } else {
        }
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

function loadRoad(id) {
    for(var i = 0; i < cityCircle.length; i++) {
        cityCircle[i].setMap(null);
    }

    if (markerDep == null && markerArr == null) {
        var depMark = { lat: depTab[0], lng: depTab[1] };
        markerDep = new google.maps.Marker({
            position: depMark,
            map: map,
            icon: "../images/before.png",
            title: 'Départ !'
        });

        var arrMark = { lat: arrTab[0], lng: arrTab[1] };
        markerArr = new google.maps.Marker({
            position: arrMark,
            map: map,
            icon: "../images/after.png",
            title: 'Arrivée'
        });
    }

    var waypts = [];

    // Trajet sur la map
    directionsService = new google.maps.DirectionsService();
    var coorDeb = tabEtapeTransport[id][0].split(";");
    var depart = new google.maps.LatLng(coorDeb[0], coorDeb[1]);
    var coorArr = tabEtapeTransport[id][tabEtapeTransport[id].length - 1].split(";");
    var arrivee = new google.maps.LatLng(coorArr[0], coorArr[1]);

    for (var i = 1; i < tabEtapeTransport[id].length - 1; i++) {
        var tmp = tabEtapeTransport[id][i].split(';');
        waypts.push({
            location: new google.maps.LatLng(tmp[0], tmp[1])
        });
    }

    for (var i = 0; i < tabEtapeTransport[id].length; i++) {
        var tmp = tabEtapeTransport[id][i].split(';');
        cityCircle[i] = new google.maps.Circle({
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.35,
            map: map,
            center: { lat: parseFloat(tmp[0]), lng: parseFloat(tmp[1]) },
            radius: 1000 * parseInt(tabDetourMax[id])
        });
    }

    var request = {
        destination: arrivee,
        avoidHighways: true,
        origin: depart,
        waypoints: waypts,
        travelMode: 'DRIVING'
    };

    directionsService.route(request, function (response, status) {
        if (status === google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        }
    });

    $("#selectTransport").fadeIn();
}

$(document).ready(function () {
    // Scrollbar
    var $document_body = $('#transportsList');
    if ($document_body.data('scrollator') === undefined) {
        $document_body.scrollator({
            custom_class: 'body_scroller'
        });
    }
});