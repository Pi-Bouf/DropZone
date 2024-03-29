var div;
var newInput;
var name = 0;
var tabEtape = [];
var tabAuto = [];
var tabLatEtape = [];
var tabLngEtape = [];
var waypts = [];
var place;
var autoroute = false;

function addEtape() {
    div = document.getElementById('etape')
    name++;
    newInput = document.createElement('input');

    newInput.setAttribute('type', 'text');
    newInput.setAttribute('id', 'villeEtape' + name);
    newInput.setAttribute('name', 'villeEtape' + name);
    newInput.setAttribute('onchange', 'tryit()');
    newInput.setAttribute('placeholder', 'Ville étape');
    newInput.setAttribute('hiddenId', "villeEtapeHidden" + name);
    newInput.className += "auPif dontSubmit inputEtape";

    newButton = document.createElement('button');
    newButton.className += "btSuppr btn-floating waves-effect waves-light red";
    newButton.setAttribute('id', 'brSuppr'+name);
    newButton.setAttribute('onclick', 'suppr(' +name+ ')');
    newButton.setAttribute('type', 'button');
    newButton.innerHTML  = 'X';
    

    div.appendChild(newInput);
    div.appendChild(newButton);
    
    if (name == 5) {
        var e = document.getElementById('trajet');
        var but = document.getElementById('ajoutButton');
        e.removeChild(but);
    }

    tabEtape[name] = document.getElementById('villeEtape' + name);
    tabAuto[name] = new google.maps.places.Autocomplete(tabEtape[name]);
    google.maps.event.addListener(tabAuto[name], 'place_changed', function() {
        place = tabAuto[name].getPlace();
        tabLatEtape[name] = place.geometry.location.lat();
        tabLngEtape[name] = place.geometry.location.lng();
        marqueur();
    });
}

function suppr(nb){
    for(var i = 0; i<name-nb;i++){
        var result = nb+i;
        var etun = result+1;
        document.getElementById('villeEtape'+result).value = document.getElementById('villeEtape'+etun).value;
        document.getElementById('villeEtapeHidden'+result).value = document.getElementById('villeEtapeHidden'+etun).value;

    }
    document.getElementById("villeEtape"+name).remove();
    document.getElementById("brSuppr"+name).remove();
    if(name==5){
        document.getElementById('trajet').innerHTML = '<button id="ajoutButton" onclick="addEtape()" type="button" class="btn-floating waves-effect waves-light blue"><i class="material-icons">+</i></button>';
    }
    name=name-1;
    marqueur();
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
        center: { lat: 46.797, lng: 2.544 },
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
    inputDepart.placeholder = "";
    google.maps.event.addListener(autocompleteDepart, 'place_changed', function() {
        var place = autocompleteDepart.getPlace();
        latDepart = place.geometry.location.lat();
        lngDepart = place.geometry.location.lng();
        marqueur();


    });
    var inputArrivee = document.getElementById('villeArrivee');
    var autocompleteArrivee = new google.maps.places.Autocomplete(inputArrivee);
    inputArrivee.placeholder = "";
    google.maps.event.addListener(autocompleteArrivee, 'place_changed', function() {
        var place = autocompleteArrivee.getPlace();
        latArrivee = place.geometry.location.lat();
        lngArrivee = place.geometry.location.lng();
        marqueur();


    });

    /*var inputEtape1 = document.getElementById('villeEtape1');
    var autocompleteEtape1 = new google.maps.places.Autocomplete(inputEtape1);
    inputEtape1.placeholder = "";
    google.maps.event.addListener(autocompleteEtape1, 'place_changed', function() {
        var place = autocompleteEtape1.getPlace();
        tabLatEtape[1] = place.geometry.location.lat();
        tabLngEtape[1] = place.geometry.location.lng();
        marqueur();

    });*/

}

function tryit(oe) {
    marqueur();
}

function autorouteClicked() {
    if (document.getElementById('oui').checked) {
        autoroute = false;
    } else {
        autoroute = true;
    }
    marqueur();
}

function marqueur() {
    waypts = [];
    var directionsService = new google.maps.DirectionsService();
    var etape;
    setTimeout(function(){
        if (document.getElementById('villeDepart').value != "" && document.getElementById('villeArrivee').value != "") {
            //document.getElementById('villeDepartHidden').value = latDepart + ";" + lngDepart;
            //document.getElementById('villeArriveeHidden').value = latArrivee + ";" + lngArrivee;
            var e;
            for (var i = 0; i < name; i++) {
                e = i + 1;
                etape = document.getElementById('villeEtape' + e);
                if (etape.value != "") {
                    //document.getElementById('villeEtapeHidden' + e).value = tabLatEtape[e] + ';' + tabLngEtape[e];
                    waypts.push({
                        location: etape.value
                    });
                }
            }

            document.getElementById('btProposer').disabled = false;
            var depart = new google.maps.LatLng($("#villeDepartHidden").val().split(";")[0], $("#villeDepartHidden").val().split(";")[1]);
            var arrivee = new google.maps.LatLng($("#villeArriveeHidden").val().split(";")[0], $("#villeArriveeHidden").val().split(";")[1]);
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
                } else {}
            });
        } else {
            document.getElementById('btProposer').disabled = true;
        }
     }, 300);
}