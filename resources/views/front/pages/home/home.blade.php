@extends('layouts.app', [ 'menu_style' => 'scroll', 'page_title' => 'DropZone - Ajout transport', 'includesJs' => ['/js/search.js'], 'includesCss' => []] ) @section('content')

<section>
    <section id="home" class="scroll-section root-sec grey lighten-5 home-wrap">
        <div class="sec-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="home-inner">
                            <div class="center-align home-content">
                                <h1 class="home-title">Drop<span>Zone</span></h1>
                                <h2 class="home-subtitle">Transportez vos colis à moindre prix !</h2>
                                <div class="row">
                                    <div class="col s12 m6 l8 offset-l2 offset-m3">
                                        <div class="card" style="background-color: rgba(0, 0, 0, 0) !important;">
                                            <div class="card-content" style="background-color: rgba(0, 0, 0, 0.2) !important;">
                                                <div class="person-about">
                                                    <h3 class="about-subtitle" style="color: white !important">Recherche de transport</h3>
                                                    <form method="post" action="{{ route('search_transport_post') }}">
                                                        {{ csrf_field() }}
                                                        <div class="row">
                                                            <div class="input-field col l5 s12">
                                                                <input id="departTransport" name="departTransport" type="text" class="validate dontSubmit auPif" placeholder="" hiddenId="departTransportCoord" required="required">
                                                                <input type="hidden" name="departTransportCoord" id="departTransportCoord" class="departTransportCoord">
                                                                <label for="departTransport" class="active">Lieu départ</label>
                                                            </div>
                                                            <div class="input-field col l5 s12">
                                                                <input id="arriveeTransport" name="arriveeTransport" type="text" class="validate dontSubmit auPif" placeholder="" hiddenId="arriveeTransportCoord" required="required">
                                                                <input type="hidden" name="arriveeTransportCoord" id="arriveeTransportCoord" class="arriveeTransportCoord">
                                                                <label for="icon_telephone" class="active">Lieu arrivée</label>
                                                            </div>

                                                            <div class="input-field col l2 m12 s12">
                                                                <input id="dateTransport" name="dateTransport" type="date" class="datepicker">
                                                                <label for="dateTransport" class="active">Date</label>
                                                            </div>
                                                            <div class="col l12 m12 s6 center-align">
                                                                <button class="btn-floating btn-large waves-effect waves-light white"><i class="mdi mdi-search-web" style="color: dodgerblue !important;"></i></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<!-- Contact Section end -->
<section id="contact" class="scroll-section root-sec brand-bg padd-tb-120 contact-wrap">
    <div class="container">
        <div class="row">
            <div class="carousel carousel-slider center col s4 m3" data-indicators="true">
                <div class="carousel-fixed-item center">
                <a class="btn waves-effect white grey-text darken-text-2">button</a>
                </div>
                <div class="carousel-item red white-text" href="#one!">
                <h2>First Panel</h2>
                <p class="white-text">This is your first panel</p>
                </div>
                <div class="carousel-item amber white-text" href="#two!">
                <h2>Second Panel</h2>
                <p class="white-text">This is your second panel</p>
                </div>
                <div class="carousel-item green white-text" href="#three!">
                <h2>Third Panel</h2>
                <p class="white-text">This is your third panel</p>
                </div>
                <div class="carousel-item blue white-text" href="#four!">
                <h2>Fourth Panel</h2>
                <p class="white-text">This is your fourth panel</p>
                </div>
            </div>

            <div class="carousel carousel-slider center col s4 m3m " data-indicators="true">
                <div class="carousel-fixed-item center">
                <a class="btn waves-effect white grey-text darken-text-2">button</a>
                </div>
                <div class="carousel-item red white-text" href="#one!">
                <h2>First Panel</h2>
                <p class="white-text">This is your first panel</p>
                </div>
                <div class="carousel-item amber white-text" href="#two!">
                <h2>Second Panel</h2>
                <p class="white-text">This is your second panel</p>
                </div>
                <div class="carousel-item green white-text" href="#three!">
                <h2>Third Panel</h2>
                <p class="white-text">This is your third panel</p>
                </div>
                <div class="carousel-item blue white-text" href="#four!">
                <h2>Fourth Panel</h2>
                <p class="white-text">This is your fourth panel</p>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- #contact Section end -->
<script>
    var target = "home";
    $(document).ready(function() {
        var $input = $('.datepicker').pickadate();
        var picker = $input.pickadate('picker');
        picker.set('select', "{{ Date::now()->format('d/m/Y') }}");
        picker.set('select', "{{ $dateTransport or old('dateTransport') }}");
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?signed_in=true&sensor=false&amp;libraries=places&callback=initMap&key=AIzaSyDafB5RLEbXzBKpSNsil8N82xBJ8zXHH8U" async defer></script>

@endsection