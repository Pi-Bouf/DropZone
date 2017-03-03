function initialize() {
    var inputDep = document.getElementById('departTransport');
    var inputArr = document.getElementById('arriveeTransport');

    autocompleteDepTrans = new google.maps.places.Autocomplete(
        (inputDep),
        { types: ['(cities)'] });
    autocompleteDepTrans.addListener('place_changed', function () {
        var place = autocompleteDepTrans.getPlace();
        $('#departTransHidden').val(place.place_id);
    });

    autocompleteArrTrans = new google.maps.places.Autocomplete(
        (inputArr), { types: ['(cities)'] });
    autocompleteArrTrans.addListener('place_changed', function () {
        var place = autocompleteArrTrans.getPlace();
        $('#arriveeTransHidden').val(place.place_id);
    });
}