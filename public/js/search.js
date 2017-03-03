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
}