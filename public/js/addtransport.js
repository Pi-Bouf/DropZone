var div;
var newInput;
var name = 1;

function addEtape() {
    div = document.getElementById('etape')
    name++;
    t = document.createTextNode(name + '.');
    div.appendChild(t);

    newInput = document.createElement('input');

    newInput.setAttribute('type', 'text');
    newInput.setAttribute('name', 'villeEtape' + name);
    div.appendChild(newInput);
    div.appendChild(document.createElement('br'));
    if (name == 5) {
        var e = document.getElementById('divLeft');
        var but = document.getElementById('ajoutButton');
        e.removeChild(but);
    }

}

function occa() {
    document.getElementById('trajetOcca').style.display = "block";
    document.getElementById('trajetRegu').style.display = "none";
}

function regu() {
    document.getElementById('trajetOcca').style.display = "none";
    document.getElementById('trajetRegu').style.display = "block";
}

function change(){
	var myLatLng1 = {lat: 44.566667, lng: 6.083333};
	monCercle = new google.maps.Circle(null);
	tailleCercle[0]=document.getElementById('taille').value*1;
	cercle ={
	map: map,
	center: myLatLng1,
	radius: tailleCercle[0]
  }
  monCercle = new google.maps.Circle(cercle);
}
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 46.797, lng: 2.544},
    zoom: 5
  });
    google.maps.event.addDomListener(window, 'load', initialize);
}


function showMarkers() {
  for (var i = 0; i < mesMark.length; i++) {
    mesMark[i].setMap(map);
  }
}

function marqueur(){
    alert('change');
}
var markDep;
function initialize() {

var input = document.getElementById('villeDepart');
var autocomplete = new google.maps.places.Autocomplete(input);
google.maps.event.addListener(autocomplete, 'place_changed', function () {
    var place = autocomplete.getPlace();
    var lat = place.geometry.location.lat();
    var lng = place.geometry.location.lng();
            
    markDep = new google.maps.Marker({
                position : {lat,lng},
                map: map,
                title: ''
    });
});

var inputArrivee = document.getElementById('villeArrivee');
var autocomplete = new google.maps.places.Autocomplete(input);
google.maps.event.addListener(autocomplete, 'place_changed', function () {
    var place = autocomplete.getPlace();
    var lat = place.geometry.location.lat();
    var lng = place.geometry.location.lng();
            
    markDep = new google.maps.Marker({
                position : {lat,lng},
                map: map,
                title: ''
    });
});
            //alert("This function is working!");
            //alert(place.name);
           // alert(place.address_components[0].long_name);

}
