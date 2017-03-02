$(window).load(function () {
    $('.loader').fadeOut();
    $('#preloader').delay(350).fadeOut('slow');
    $('body').delay(350);
});

$(document).ready(function () {
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
    $('.loginLink').click(function () {
        $('#loginModal').modal('open');
    });

    // Caroussel
    $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 10,
        center: true,
        nav: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 4,
                loop: true
            }
        }
    })

    // DatePicker
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 200, // Creates a dropdown of 15 years to control year
        labelMonthNext: 'Mois suivant',
        labelMonthPrev: 'Mois précedent',
        labelMonthSelect: 'Selectionner un mois',
        labelYearSelect: 'Selectionner une année',
        monthsFull: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
        monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        weekdaysFull: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
        weekdaysShort: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        weekdaysLetter: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
        today: 'Auj.',
        clear: 'Réinit.',
        close: 'Quitter',
        format: 'dd/mm/yyyy'
    });
});
