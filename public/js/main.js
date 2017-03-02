$(window).load(function() {
    $('.loader').fadeOut();
    $('#preloader').delay(350).fadeOut('slow');
    $('body').delay(350);
});

$(document).ready(function() {
    // Menu Mobile
    $(".button-collapse").sideNav();

    // Scrollbar
    var $document_body = $('body');
    if ($document_body.data('scrollator') === undefined) {
        $document_body.scrollator({
            custom_class: 'body_scroller'
        });
    }

    // Modal
    $('.modal').modal();
    $('.loginLink').click(function() {
        $('#loginModal').modal('open');
    });
});