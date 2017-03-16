var directionsService = null;
var directionsDisplay = null;
var map = null;
var markerDep = null;
var markerArr = null;
var cityCircle = Array();
var cityPath = null;

function initialize() {
    var inputDepTransport = document.getElementById('departTransport');
    var inputArrTransport = document.getElementById('arriveeTransport');

    var inputDepExpedition = document.getElementById('departExpedition');
    var inputArrExpedition = document.getElementById('arriveeExpedition');

    autocompleteDepTrans = new google.maps.places.Autocomplete(
        (inputDepTransport));
    autocompleteDepTrans.addListener('place_changed', function() {
        var place = autocompleteDepTrans.getPlace();
        $('#departTransHidden').val(place.geometry.location.lat() + ";" + place.geometry.location.lng());
    });

    $(document).on('keydown', '.dontSubmit', function(e) {
        if (e.which == 13) {
            return false;
        }
    });

    $(document).on('keyup', '.dontSubmit', function(e) {
        if ($(this).val().length > 2) {
            $.getJSON('https://maps.googleapis.com/maps/api/geocode/json?address=' + $(this).val() + '&key=AIzaSyA8s4b7f29R8Mn5v9Xf68GilgyjMUlrPcU', function(data) {
                console.log(data.results[0].geometry.location);
            });
        }
    });

    autocompleteArrTrans = new google.maps.places.Autocomplete(
        (inputArrTransport));
    autocompleteArrTrans.addListener('place_changed', function() {
        var place = autocompleteArrTrans.getPlace();
        $('#arriveeTransHidden').val(place.geometry.location.lat() + ";" + place.geometry.location.lng());
    });

    autocompleteDebTrans = new google.maps.places.Autocomplete(
        (inputDepExpedition), { types: ['(cities)'] });
    autocompleteDebTrans.addListener('place_changed', function() {
        var place = autocompleteDebTrans.getPlace();
        $('#departExpeHidden').val(place.geometry.location.lat() + ";" + place.geometry.location.lng());
    });

    autocompleteArrExpe = new google.maps.places.Autocomplete(
        (inputArrExpedition), { types: ['(cities)'] });
    autocompleteArrExpe.addListener('place_changed', function() {
        var place = autocompleteArrExpe.getPlace();
        $('#arriveeExpeHidden').val(place.geometry.location.lat() + ";" + place.geometry.location.lng());
    });

    directionsService = new google.maps.DirectionsService();

    var depart = new google.maps.LatLng(depTab[0], depTab[1]);
    var arrivee = new google.maps.LatLng(arrTab[0], arrTab[1]);
    var request = {
        destination: arrivee,
        avoidHighways: true,
        origin: depart,
        travelMode: 'DRIVING'
    };

    directionsService.route(request, function(response, status) {
        if (status === google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        } else {}
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

function loadPath(id) {
    directionsDisplay.setDirections({ routes: [] });
    if (cityPath != null) {
        cityPath.setMap(null);
    }
    if (markerArr != null && markerDep != null) {
        markerDep.setMap(null);
        markerArr.setMap(null);
    }

    cityPath = new google.maps.Polyline({
        path: tabCoordsExpe[id],
        geodesic: true,
        strokeColor: '#FF0000',
        strokeOpacity: 1.0,
        strokeWeight: 2,
        map: map,
    });

    var depMark = tabCoordsExpe[id][0];
    markerDep = new google.maps.Marker({
        position: depMark,
        map: map,
        icon: "../images/after.png",
        title: 'Départ !'
    });

    var arrMark = tabCoordsExpe[id][1];
    markerArr = new google.maps.Marker({
        position: arrMark,
        map: map,
        icon: "../images/before.png",
        title: 'Arrivée'
    });

    $('.Item').css({ 'background-color': "#FFFFFF" });
    $("#item_" + id).css({ 'background-color': "#EEEEEE" });
    $("#expeditionSelect").attr('href', '/expedition/' + id);
    $("#selectExpedition").fadeIn();

}

function loadRoad(id) {
    for (var i = 0; i < cityCircle.length; i++) {
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

    directionsService.route(request, function(response, status) {
        if (status === google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        }
    });

    $("#transportSelect").attr('href', '/transport/' + id);
    $("#selectTransport").fadeIn();
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