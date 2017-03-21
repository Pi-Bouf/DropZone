var directionsService = null;
var directionsDisplay = null;
var map = null;
var markerDep = null;
var markerArr = null;
var cityCircle = Array();
var cityPath = null;

function initialize() {
    if (target == "transport" || target == "home") {
        var inputDepTransport = document.getElementById('departTransport');
        var inputArrTransport = document.getElementById('arriveeTransport');
    }

    if (target == "expedition") {
        var inputDepExpedition = document.getElementById('departExpedition');
        var inputArrExpedition = document.getElementById('arriveeExpedition');
    }

    if (target == "transport" || target == "home") {
        autocompleteDepTrans = new google.maps.places.Autocomplete(
            (inputDepTransport));
        autocompleteDepTrans.addListener('place_changed', function() {
            var place = autocompleteDepTrans.getPlace();
            $('#departTransport_hidden').val(place.formatted_address);
            $('.departTransportCoord_hidden').val(place.geometry.location.lat() + ";" + place.geometry.location.lng());
        });

        autocompleteArrTrans = new google.maps.places.Autocomplete(
            (inputArrTransport));
        autocompleteArrTrans.addListener('place_changed', function() {
            var place = autocompleteArrTrans.getPlace();
            $('#arriveeTransport_hidden').val(place.formatted_address);
            $('.arriveeTransportCoord_hidden').val(place.geometry.location.lat() + ";" + place.geometry.location.lng());
        });

    }

    if (target == "expedition") {
        autocompleteDebTrans = new google.maps.places.Autocomplete(
            (inputDepExpedition), { types: ['(cities)'] });
        autocompleteDebTrans.addListener('place_changed', function() {
            var place = autocompleteDebTrans.getPlace();
            $('#departExpedition_hidden').val(place.geometry.location.lat() + ";" + place.geometry.location.lng());
            $('.departExpeditionCoord_hidden').val(place.geometry.location.lat() + ";" + place.geometry.location.lng());
        });

        autocompleteArrExpe = new google.maps.places.Autocomplete(
            (inputArrExpedition), { types: ['(cities)'] });
        autocompleteArrExpe.addListener('place_changed', function() {
            var place = autocompleteArrExpe.getPlace();
            $('#arriveeExpedition_hidden').val(place.geometry.location.lat() + ";" + place.geometry.location.lng());
            $('.arriveeExpeditionCoord_hidden').val(place.geometry.location.lat() + ";" + place.geometry.location.lng());
        });
    }

    if (target != "home") {
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
}

function initMap() {
    if (target == "transport" || target == "expedition") {
        directionsDisplay = new google.maps.DirectionsRenderer();
        map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: 46.797, lng: 2.544 },
            zoom: 5
        });
        directionsDisplay.setMap(map);
    }
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
            if (markerDep == null && markerArr == null) {
                var depMark = { lat: parseFloat(depTab[0]), lng: parseFloat(depTab[1]) };
                markerDep = new google.maps.Marker({
                    position: depMark,
                    map: map,
                    icon: "../images/flag-variant-red.svg",
                    title: 'Départ !',
                });

                var arrMark = { lat: parseFloat(arrTab[0]), lng: parseFloat(arrTab[1]) };
                markerArr = new google.maps.Marker({
                    position: arrMark,
                    map: map,
                    icon: "../images/flag-variant-green.svg",
                    title: 'Arrivée'
                });
            }
        }
    });

}