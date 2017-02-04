$(document).ready(function () {

    var loader_path = document.getElementById('loader_path').getElementsByTagName('path');
    loader_path[0].setAttribute('d', 'm 0,' + $('#accueil').height() / 2 + ' h ' + $('#accueil').width());

    TweenMax.set([loader], {
        width: $('#accueil').width(),
        height: $('#accueil').height()
    });

    var myTimeline = new TimelineMax();
    myTimeline.set([loader_path], {
        drawSVG: '50% 50%'
    })
    myTimeline.delay(1);
    myTimeline.to(loader_path, 0.8, {
        drawSVG: '0% 100%'
    });

});