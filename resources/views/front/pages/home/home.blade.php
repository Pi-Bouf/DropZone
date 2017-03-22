@extends('layouts.app', [ 'menu_style' => 'scroll', 'page_title' => 'DropZone - Ajout transport', 'includesJs' => ['/js/search.js'], 'includesCss' => ['/css/home.css']] ) @section('content')

<section>
    <section id="home" class="scroll-section root-sec grey lighten-5 home-wrap">
        <div class="sec-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="home-inner">
                            <div class="center-align home-content">
                                <h1 class="home-title">Drop<span>Zone</span></h1>
                                <h2 class="home-subtitle">Transportez vos colis à moindre prix ! {{$bouh}}</h2>
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
<section id="contact" class="scroll-section root-sec padd-tb-120 contact-wrap">
    <div class="container">
        <div class="row">
            <div class="col s10 push-s1 m4 push-m1 center">
                <span class="infoTransport">Nos derniers transports</span>
                <div class="carousel carousel-slider center " id="transport" data-indicators="true">
                    <div class="carousel-item  white-text" href="#one!" style="background-color: rgba(150,150,150,0.5)">
                        <h3>First Panel</h3>
                        <p class="white-text">This is your first panel</p>
                        <a class="btn waves-effect white grey-text darken-text-2">button</a>
                    </div>
                    <div class="carousel-item white-text" href="#two!" style="background-color: rgba(75,75,75,0.5)">
                        <h3>Second Panel</h3>
                        <p class="white-text">This is your second panel</p>
                        <a class="btn waves-effect white grey-text darken-text-2">button</a>
                    </div>
                    <div class="carousel-item  white-text" href="#three!" style="background-color: rgba(150,150,150,0.5)">
                        <h3>Third Panel</h3>
                        <p class="white-text">This is your third panel</p>
                        <a class="btn waves-effect white grey-text darken-text-2">button</a>
                    </div>
                    <div class="carousel-item white-text" href="#four!" style="background-color: rgba(75,75,75,0.5)">
                        <h3>Fourth Panel</h3>
                        <p class="white-text">This is your fourth panel</p>
                        <a class="btn waves-effect white grey-text darken-text-2">button</a>
                    </div>
                </div>
            </div>
            <div class="col m3"></div>
            <div class="col s10 push-s1 m4 center">
                <span class="infoColis ">Nos derniers colis</span>
                <div class="carousel carousel-slider center " id="colis" data-indicators="true">
                    <div class="carousel-item  white-text" href="#one!" style="background-color: rgba(150,150,150,0.5)">
                        <h3>First Panel</h3>
                        <p class="white-text">This is your first panel</p>
                        <a class="btn waves-effect white grey-text darken-text-2">button</a>
                    </div>
                    <div class="carousel-item white-text" href="#two!" style="background-color: rgba(75,75,75,0.5)">
                        <h3>Second Panel</h3>
                        <p class="white-text">This is your second panel</p>
                        <a class="btn waves-effect white grey-text darken-text-2">button</a>
                    </div>
                    <div class="carousel-item  white-text" href="#three!" style="background-color: rgba(150,150,150,0.5)">
                        <h3>Third Panel</h3>
                        <p class="white-text">This is your third panel</p>
                        <a class="btn waves-effect white grey-text darken-text-2">button</a>
                    </div>
                    <div class="carousel-item white-text" href="#four!" style="background-color: rgba(75,75,75,0.5)">
                        <h3>Fourth Panel</h3>
                        <p class="white-text">This is your fourth panel</p>
                        <a class="btn waves-effect white grey-text darken-text-2">button</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row black-text center">
            <div class="col s12 m4">
                <i class="mdi mdi-car icon"></i><br><h3>Transport</h3>
                <div class="text-center">
                    Choisissez vous-même, au sein de la communauté, le particulier qui acheminera votre colis. Discutez à tout moment par messages privés. Et pour que vous soyez 100% serein, votre colis est automatiquement assuré. Les galères de colis, avec Cocolis, c'est fini !
                </div>
            </div>
            <div class="col s12 m4">
                <i class="mdi mdi-package-variant-closed icon"></i><br><h3>Expedition</h3>
                <div class="text-center">
                    Grâce au covoiturage de colis, vos frais d'envoi coûtent jusqu'à 80% moins cher que les solutions de transport traditionnelles. Cocolis est plus économique, même pour les meubles et objets lourds ou encombrants. Gardez votre argent pour vos vacances !
                </div>
            </div>
            <div class="col s12 m4">
                <i class="mdi mdi-wechat icon"></i><br><h3>Vos avis </h3>
                <div class="text-center">
                    Une chose est sûre : le porteur du colis aurait réalisé le déplacement même sans le colis ! Alors, profiter de ce trajet pour faire livrer un objet, c’est penser à l’environnement. Aucune émission polluante supplémentaire. Une bonne nouvelle, non ?
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