// Dernier scroll
var lastScroll = null;

// On ready: Attribuer aux click la fonction scroll
$(document).ready(function() {
    $('.scrollTo').click(function(event) {
        event.preventDefault();
        $.scrollTo("#" + $(this).attr('to'));
        return false;
    });

    // Si la page est resize, la div "pages" ne doit pas scroller
    $(window).resize(function() {
        $("#pages").scrollTop($("#pages").scrollTop() + $(lastScroll).offset().top - $("#header").height())
    });
});

// Fonction animation de scroll
$.scrollTo = function(div) {
    var scrollTo = $("#pages").scrollTop() + $(div).offset().top - $("#header").height();
    $("#pages").animate({ scrollTop: scrollTo }, "fast");
    lastScroll = div;
}