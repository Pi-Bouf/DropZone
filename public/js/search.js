function initialize() {
    var inputDep = document.getElementById('departTransport');
    var inputArr = document.getElementById('arriveeTransport');

    autocompleteDepTrans = new google.maps.places.Autocomplete(
        (inputDep),
        { types: ['geocode'] });

    autocompleteArrTrans = new google.maps.places.Autocomplete(
        (inputArr),
        { types: ['geocode'] });
}