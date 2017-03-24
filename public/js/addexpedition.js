var place;



function initMap() {
    directionsDisplay = new google.maps.DirectionsRenderer();
     map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 46.797, lng: 2.544},
        zoom: 5
     });
     directionsDisplay.setMap(map);
    google.maps.event.addDomListener(window, 'load', initialize);
}


function showMarkers() {
  for (var i = 0; i < mesMark.length; i++) {
    mesMark[i].setMap(map);
  }
}

var markDep;

var latDepart;
var lngDepart;

var latArrivee;
var lngArrivee;


function initialize() {

        var inputDepart = document.getElementById('villeDepart');
        var autocompleteDepart = new google.maps.places.Autocomplete(inputDepart);
        inputDepart.placeholder ="";
        google.maps.event.addListener(autocompleteDepart, 'place_changed', function () {
            var place = autocompleteDepart.getPlace();
            latDepart = place.geometry.location.lat();
            lngDepart = place.geometry.location.lng();
            marqueur();
                    

        });
        var inputArrivee = document.getElementById('villeArrivee');
        var autocompleteArrivee = new google.maps.places.Autocomplete(inputArrivee);
        inputArrivee.placeholder ="";
        google.maps.event.addListener(autocompleteArrivee, 'place_changed', function () {
            var place = autocompleteArrivee.getPlace();
            latArrivee = place.geometry.location.lat();
            lngArrivee = place.geometry.location.lng();
            marqueur();
                    

        });  
                    
 

}
$(document).ready(function() {
    $('.auPif').change(function() {
        marqueur();
    });
});

function marqueur(){
    
    var directionsService = new google.maps.DirectionsService();
    if(document.getElementById('villeDepart').value!="" && document.getElementById('villeArrivee').value!="")
    {
        //document.getElementById('villeDepartHidden').value = latDepart+";"+lngDepart;
        //document.getElementById('villeArriveeHidden').value = latArrivee+";"+lngArrivee;
        
        document.getElementById('btProposer').disabled  = false;
        var depart = new google.maps.LatLng($("#villeDepartHidden").val().split(";")[0], $("#villeDepartHidden").val().split(";")[1]);
        var arrivee = new google.maps.LatLng($("#villeArriveeHidden").val().split(";")[0], $("#villeArriveeHidden").val().split(";")[1]);
        var request = {
            destination: arrivee,
            avoidHighways: true,
            origin: depart,
            travelMode: 'DRIVING'
        };

        // Pass the directions request to the directions service.
        directionsService.route(request, function(response, status) {
            if (status === google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
            } else{
            }
        });
    } else {
        document.getElementById('btProposer').disabled  = true;
    }
}

