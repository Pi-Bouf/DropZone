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
                                <h2 class="home-subtitle">Transportez vos colis à moindre prix ! </h2>
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
                <span class="infoTransport" style="color:#2196F3">Derniers transports</span>
                <div class="carousel carousel-slider center " id="transport" data-indicators="true">
                    @foreach(Transport::offset(0)->orderBy('id','desc')->limit(4)->get() as $transport)
                        <div class="txt">
                            @if($loop->iteration%2!=0)
                            <div class="carousel-item  white-text" href="#one!" style="background-color: rgba(75,75,75,0.6)">
                                <br><br>
                                <h4 class="truncate info">{{$transport->information}}</h4>
                                <br><br>
                                <p class="white-text"><i class="mdi mdi-map-marker green-text"></i>{{$transport->villeDepart->ville->name}}<br><i class="mdi mdi-arrow-down-bold flecheRoute"></i><br><i class="mdi mdi-map-marker red-text"></i>{{$transport->villeArrivee->ville->name}}</p>
                                <br>
                                <p class="compte"><i class="mdi mdi-account"></i> {{$transport->user->login}}</p>
                                <br><br>
                                @if(Auth::user())
                                    <a class="btn waves-effect blue white-text darken-text-2" href="/transport/{{$transport->id}}">Détail</a>
                                @else
                                    <a class="loginLink btn waves-effect blue white-text darken-text-2"  href="#">Détail</a>
                                @endif
                            </div>
                            @else
                            <div class="carousel-item  white-text" href="#one!" style="background-color: rgba(20,20,20,0.6)">
                                <br><br>
                                <h4 class="truncate info">{{$transport->information}}</h4>
                                <br><br>
                                <p class="white-text"><i class="mdi mdi-map-marker green-text"></i>{{$transport->villeDepart->ville->name}}<br><i class="mdi mdi-arrow-down-bold flecheRoute"></i><br><i class="mdi mdi-map-marker red-text"></i>{{$transport->villeArrivee->ville->name}}</p>
                                <br>
                                <p class="compte"><i class="mdi mdi-account"></i> {{$transport->user->login}}</p>
                                <br><br>
                                @if(Auth::user())
                                    <a class="btn waves-effect blue white-text darken-text-2" href="/transport/{{$transport->id}}">Détail</a>
                                @else
                                    <a class="loginLink btn waves-effect blue white-text darken-text-2"  href="#">Détail</a>
                                @endif
                            </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col m3"></div>
            <div class="col s10 push-s1 m4 center">
                <span class="infoColis ">Dernières expéditions</span>
                <div class="carousel carousel-slider center " id="colis" data-indicators="true">
                    @foreach(Expedition::offset(0)->orderBy('id','desc')->limit(4)->get() as $expedition)
                        <div class="txt">
                            @if($loop->iteration%2!=0)
                            <div class="carousel-item  white-text" href="#one!" style="background-color: rgba(75,75,75,0.6)">
                                <br><br>
                                <h4 class="truncate info">{{$expedition->description}}</h4>
                                <br><p style="font-size:1.2em;">{{$expedition->costMax}} €</p>
                                <p class="white-text"><i class="mdi mdi-map-marker green-text"></i>{{$expedition->villeDep->name}}<br><i class="mdi mdi-arrow-down-bold flecheRoute"></i><br><i class="mdi mdi-map-marker red-text"></i>{{$expedition->villeArr->name}}</p>
                                <br>
                                <p class="compte"><i class="mdi mdi-account"></i> {{$expedition->user->login}}</p>
                                <br><br>
                                @if(Auth::user())
                                    <a class="btn waves-effect blue white-text darken-text-2" href="/expedition/{{$expedition->id}}">Détail</a>
                                @else
                                    <a class="loginLink btn waves-effect blue white-text darken-text-2"  href="#">Détail</a>
                                @endif
                            </div>
                            @else
                            <div class="carousel-item  white-text" href="#one!" style="background-color: rgba(20,20,20,0.6)">
                                <br><br>
                                <h4 class="truncate info">{{$expedition->description}}</h4>
                                <br><p style="font-size:1.2em;">{{$expedition->costMax}} €</p>
                                <p class="white-text"><i class="mdi mdi-map-marker green-text"></i>{{$expedition->villeDep->name}}<br><i class="mdi mdi-arrow-down-bold flecheRoute"></i><br><i class="mdi mdi-map-marker red-text"></i>{{$expedition->villeArr->name}}</p>
                                <br>
                                <p class="compte"><i class="mdi mdi-account"></i> {{$expedition->user->login}}</p>
                                <br><br>
                                @if(Auth::user())
                                    <a class="btn waves-effect blue white-text darken-text-2" href="/expedition/{{$expedition->id}}">Détail</a>
                                @else
                                    <a class="loginLink btn waves-effect blue white-text darken-text-2"  href="#">Détail</a>
                                @endif
                            </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class="row noir center padd-tb-120">
            <div class="col s12 m4">
                <i class="mdi mdi-car icon blue-text"></i><br><h3>Transport</h3>
                <br>
                <div class="text-center">
                    Vous faites un voyage et vous avez encore de la place ? Des colis à déposer sont peut-être sur votre chemin. Vous pourrez, grâce à ça, amortir le prix du trajet sans effort ! 
                </div>
            </div>
            <div class="col s12 m4">
                <i class="mdi mdi-package-variant-closed icon" style="color:darkorange"></i><br><h3>Expedition</h3>
                <br>
                <div class="text-center">
                    Un colis à envoyer ? Vous pouvez rechercher un transport existant ou bien créer une expédition pour que votre colis soit envoyé le plus rapidement possible et à faible prix !
                </div>
            </div>
            <div class="col s12 m4">
                <i class="mdi mdi-flower icon green-text"></i><br><h3>Écologique</h3>
                <br>
                <div class="text-center">
                    Le transporteur aurait réalisé le trajet avec ou sans le colis. Profiter de ce trajet pour envoyer un colis, c'est aussi respecter l'environnement ! Génial, non?
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