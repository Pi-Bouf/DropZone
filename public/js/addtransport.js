var div;
var newInput;
var name = 1;
var tabEtape=[];
var tabAuto=[];
var tabLatEtape=[];
var tabLngEtape=[];
var waypts = [];
var place;
var autoroute = true;
function addEtape() {
    div = document.getElementById('etape')
    name++;
    t = document.createTextNode(name + '.');
    div.appendChild(t);

    newInput = document.createElement('input');

    newInput.setAttribute('type', 'text');
    newInput.setAttribute('id', 'villeEtape' + name);
    newInput.setAttribute('name', 'villeEtape');
    div.appendChild(newInput);
    div.appendChild(document.createElement('br'));
    if (name == 5) {
        var e = document.getElementById('divLeft');
        var but = document.getElementById('ajoutButton');
        e.removeChild(but);
    }
  
        tabEtape[name] = document.getElementById('villeEtape'+name);
        tabAuto[name] = new google.maps.places.Autocomplete(tabEtape[name]);
        google.maps.event.addListener(tabAuto[name], 'place_changed', function () {
            place = tabAuto[name].getPlace();
            tabLatEtape[name] = place.geometry.location.lat();
            tabLngEtape[name] = place.geometry.location.lng();
            marqueur();
                    

        });   
}

function occa() {
    document.getElementById('trajetOcca').style.display = "block";
    document.getElementById('trajetRegu').style.display = "none";
}

function regu() {
    document.getElementById('trajetOcca').style.display = "none";
    document.getElementById('trajetRegu').style.display = "block";
}


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

var latEtape;
var lngEtape;

function initialize() {

        var inputDepart = document.getElementById('villeDepart');
        var autocompleteDepart = new google.maps.places.Autocomplete(inputDepart);
        google.maps.event.addListener(autocompleteDepart, 'place_changed', function () {
            var place = autocompleteDepart.getPlace();
            latDepart = place.geometry.location.lat();
            lngDepart = place.geometry.location.lng();
            marqueur();
                    

        });
        var inputArrivee = document.getElementById('villeArrivee');
        var autocompleteArrivee = new google.maps.places.Autocomplete(inputArrivee);
        google.maps.event.addListener(autocompleteArrivee, 'place_changed', function () {
            var place = autocompleteArrivee.getPlace();
            latArrivee = place.geometry.location.lat();
            lngArrivee = place.geometry.location.lng();
            marqueur();
                    

        });  
        var inputEtape1 = document.getElementById('villeEtape1');
        var autocompleteEtape1 = new google.maps.places.Autocomplete(inputEtape1);
        google.maps.event.addListener(autocompleteEtape1, 'place_changed', function () {
            var place = autocompleteEtape1.getPlace();
            tabLatEtape[1] = place.geometry.location.lat();
            tabLngEtape[1] = place.geometry.location.lng();
            marqueur();
                    

        });     
            //alert("This function is working!");
            //alert(place.name);
           // alert(place.address_components[0].long_name);

}

function autorouteClicked(){
    if(document.getElementById('oui').checked){
        autoroute = true;
    } else {
        autoroute = false;
    }
    marqueur();
}
function marqueur(){
    
    var directionsService = new google.maps.DirectionsService();
    var etape;
    if(document.getElementById('villeDepart').value!="" && document.getElementById('villeArrivee').value!="")
    {
        document.getElementById('villeDepartHidden').value = latDepart+";"+lngDepart;
        document.getElementById('villeArriveeHidden').value = latArrivee+";"+lngArrivee;


        etape = document.getElementsByName('villeEtape');
        var e;
        for (var i = 0; i < etape.length; i++) {
            e=i+1;
            if (etape[i].value != "") {
                document.getElementById('villeEtapeHidden'+e).value= tabLatEtape[e]+';'+tabLngEtape[e];
                waypts.push({
                    location: etape[i].value
                });
            }
        }

        document.getElementById('btProposer').disabled  = false;
        var depart = new google.maps.LatLng(latDepart, lngDepart);
        var arrivee = new google.maps.LatLng(latArrivee, lngArrivee);
        var request = {
            destination: arrivee,
            avoidHighways: autoroute,
            origin: depart,
            waypoints: waypts,
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

