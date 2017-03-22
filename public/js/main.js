$(window).load(function() {
    $('.loader').fadeOut();
    $('#preloader').delay(350).fadeOut('slow');
    $('body').delay(350);
});

(function($) {
    $.fn.scrollingTo = function(opts) {
        var defaults = {
            animationTime: 1000,
            easing: '',
            topSpace: 0,
            callbackBeforeTransition: function() {},
            callbackAfterTransition: function() {}
        };
        var config = $.extend({}, defaults, opts);
        $(this).on('click', function(e) {
            var eventVal = e;
            e.preventDefault();
            var $section = $(document).find($(this).data('section'));
            if ($section.length < 1) {
                return false;
            }
            if ($('html, body').is(':animated')) {
                $('html, body').stop(true, true);
            }
            var scrollPos = $section.offset().top;
            if ($(window).scrollTop() == (scrollPos + config.topSpace)) {
                return false;
            }
            config.callbackBeforeTransition(eventVal, $section);
            var newScrollPos = (scrollPos - config.topSpace);
            $('html, body').animate({
                'scrollTop': (newScrollPos + 'px')
            }, config.animationTime, config.easing, function() {
                config.callbackAfterTransition(eventVal, $section);
            });
            return $(this);
        });
        $(this).data('scrollOps', config);
        return $(this);
    };
}(jQuery));

$(document).ready(function() {
    // Menu Mobile
    $(".button-collapse").sideNav();

    // Input dates
    $(document).on('keydown', '.dontSubmit', function(e) {
        if (e.which == 13) {
            return false;
        }
    });

    $(document).on('keyup', '.auPif', function(e) {
        if ($(this).val().length > 2) {
            $.getJSON('https://maps.googleapis.com/maps/api/geocode/json?address=' + $(this).val() + '&key=AIzaSyA8s4b7f29R8Mn5v9Xf68GilgyjMUlrPcU', (data) => {
                if (data.status == "OK") {
                    $('[name="' + $(this).attr('hiddenId') + '"]').val(data.results[0].geometry.location.lat + ";" +
                        data.results[0].geometry.location.lng)
                }
            });
        }
    });

    $(document).on('keyup', '.forSecondDiv', function(e) {
        $('#' + $(this).attr('name') + '_hidden').val($(this).val());
    });

    $(document).on('change', '.forSecondDivDate', function(e) {
        $('#' + $(this).attr('name') + '_hidden').val($(this).val());
    });

    // Modal
    $('.modal').modal();
    $('.loginLink').click(function() {
        $('#loginModal').modal('open');
    });

    $('.registerLink').click(function() {
        $('#registerModal').modal('open');
    });

    // Select
    $('select').material_select();

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
        alignment: 'left'
    });

    $('.scrollTo').scrollingTo({
        easing: 'easeOutQuart',
        animationTime: 1000,
        callbackBeforeTransition: function(e) {

        },
        callbackAfterTransition: function(e) {}
    });

    $('.carousel.carousel-slider').carousel({fullWidth: true});

});