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

    $('.registerLink').click(function() {
        $('#registerModal').modal('open');
    });

    // DatePicker
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 200, // Creates a dropdown of 15 years to control year
        labelMonthNext: 'Mois suivant',
        labelMonthPrev: 'Mois précedent',
        labelMonthSelect: 'Selectionner un mois',
        labelYearSelect: 'Selectionner une année',
        monthsFull: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
        monthsShort: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Aout', 'Sep', 'Oct', 'Nov', 'Dec'],
        weekdaysFull: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
        weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
        weekdaysLetter: ['S', 'L', 'M', 'M', 'J', 'V', 'S'],
        today: 'Auj.',
        clear: 'Réinit.',
        close: 'Quitter',
        format: 'dd/mm/yyyy'
    });

    $('ul.tabs').tabs({ swipeable: true, responsiveThreshold: "100px" });

    //User menu dropdown on hover
    $('.dropdown-hover').dropdown({
          inDuration: 300,
          outDuration: 225,
          hover: true, // Activate on hover
          belowOrigin: true, // Displays dropdown below the button
          alignment: 'right'
        }
      );
});
