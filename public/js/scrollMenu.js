$(document).ready(function() {
    $('.scrollTo').click(function(event) {
        event.preventDefault();
        console.log($("#accueil").offsetParent());
        return false;
    });
});