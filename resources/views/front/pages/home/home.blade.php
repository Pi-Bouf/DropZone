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
                                        <div class="card" style="background-color: rgba(0, 0, 0, 0) !important; height: 200px !important;">
                                            <div class="card-content" style="background-color: rgba(0, 0, 0, 0.2) !important; height: 200px !important;">
                                                <div class="person-about" style=" height: 200px !important;">
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
<section id="contact" class="padd-tb-120">
    <div class="container">
        <div class="row">
            <div class="col l5 m12 s12 offset-l1">
                <div class="center-align" style="color: #799CAC; font-size: 24px; font-weight: bold; text-transform: uppercase;">Derniers transports</div>
                <div class="carousel carousel-slider" data-indicators="true">
                    @foreach(Transport::offset(0)->orderBy('id','desc')->limit(4)->get() as $transport)
                        <div class="carousel-item card white grey-text" style="box-shadow: none !important; height: 450px !important;">
                            <div class="center-align">
                                <div class="row">
                                    <h4 style="margin: 10px; padding: 10px; font-style: italic; font-size: 19px;"><i class="mdi mdi-format-quote"></i> {{ mb_strimwidth($transport->information, 0, 100, '...') }} <i class="mdi mdi-format-quote"></i></h4>
                                </div>
                                <div class="row" style="font-size: 18px;">
                                    <i class="mdi mdi-map-marker blue-text"></i> {{$transport->villeDepart->ville->name}}
                                </div>
                                <div class="row" style="font-size: 17px;">
                                    <i class="mdi mdi-arrow-down-bold flecheRoute"></i>
                                </div>
                                <div class="row" style="font-size: 18px; margin-bottom: 10px;">
                                    <i class="mdi mdi-map-marker red-text"></i>{{$transport->villeArrivee->ville->name}}
                                </div>
                                <div class="circle" style="width: 140px; height: 140px; margin-left: auto; margin-right: auto; padding: 10px; background-image: url('@if($transport->user->picLink==null) /images/profile/icon-{{$transport->user->sexe}}.png @else {{$transport->user->picLink}} @endif'); background-position: center center; background-size: cover;">

                                </div>
                                <div class="row"  style="font-size: 18px; margin-top: 20px;">
                                    <i class="mdi mdi-account"></i> <a href="/user/{{$transport->user->id}}">{{$transport->user->login}}</a>
                                </div>
                            </div>
                            @if(Auth::user())
                                <a class="btn waves-effect blue white-text darken-text-2" style="position: absolute; bottom: 50px; left: 50%; margin-left: -60px;" href="/transport/{{$transport->id}}">Détail</a>
                            @else
                                <a class="loginLink btn waves-effect blue white-text darken-text-2" style="position: absolute; bottom: 50px; left: 50%; margin-left: -60px;" href="#">Détail</a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col l5 m12 s12">
                <div class="center-align" style="color: #799CAC; font-size: 24px; font-weight: bold; text-transform: uppercase;">Dernières Expeditions</div>
                <div class="carousel carousel-slider" data-indicators="true">
                    @foreach(Expedition::offset(0)->orderBy('id','desc')->limit(4)->get() as $expedition)
                        <div class="carousel-item card white grey-text" style="box-shadow: none !important; height: 450px !important;">
                            <div class="center-align">
                                <div class="row">
                                    <h4 style="margin: 10px; padding: 10px; font-style: italic; font-size: 19px;"><i class="mdi mdi-format-quote"></i> {{ mb_strimwidth($expedition->description, 0, 100, '...') }} <i class="mdi mdi-format-quote"></i></h4>
                                </div>
                                <div class="row" style="font-size: 18px;">
                                    <i class="mdi mdi-map-marker blue-text"></i> {{$expedition->villeDep->name}}
                                </div>
                                <div class="row" style="font-size: 17px;">
                                    <i class="mdi mdi-arrow-down-bold flecheRoute"></i>
                                </div>
                                <div class="row" style="font-size: 18px; margin-bottom: 10px;">
                                    <i class="mdi mdi-map-marker red-text"></i>{{$expedition->villeArr->name}}
                                </div>
                                <div class="circle" style="width: 140px; height: 140px; margin-left: auto; margin-right: auto; padding: 10px; background-image: url('@if($expedition->user->picLink==null) /images/profile/icon-{{$expedition->user->sexe}}.png @else {{$expedition->user->picLink}} @endif'); background-position: center center; background-size: cover;">

                                </div>
                                <div class="row"  style="font-size: 18px; margin-top: 20px;">
                                    <i class="mdi mdi-account"></i> <a href="/user/{{$expedition->user->id}}">{{$expedition->user->login}}</a>
                                </div>
                            </div>
                            @if(Auth::user())
                                <a class="btn waves-effect blue white-text darken-text-2" style="position: absolute; bottom: 50px; left: 50%; margin-left: -60px;" href="/transport/{{$transport->id}}">Détail</a>
                            @else
                                <a class="loginLink btn waves-effect blue white-text darken-text-2" style="position: absolute; bottom: 50px; left: 50%; margin-left: -60px;" href="#">Détail</a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<section class="white">
    <div class="row noir center padd-tb-120">
        <div class="col s12 m4">
            <i class="mdi mdi-car icon blue-text large"></i><br><h3 class="grey-text text-darken-2">Transport</h3>
            <br>
            <div class="text-center grey-text text-darken-1">
                Vous faites un voyage et vous avez encore de la place ? Des colis à déposer sont peut-être sur votre chemin. Vous pourrez, grâce à ça, amortir le prix du trajet sans effort ! 
            </div>
        </div>
        <div class="col s12 m4">
            <i class="mdi mdi-package-variant-closed icon large" style="color:darkorange"></i><br><h3 class="grey-text text-darken-2">Expedition</h3>
            <br>
            <div class="text-center grey-text text-darken-1">
                Un colis à envoyer ? Vous pouvez rechercher un transport existant ou bien créer une expédition pour que votre colis soit envoyé le plus rapidement possible et à faible prix !
            </div>
        </div>
        <div class="col s12 m4">
            <i class="mdi mdi-flower icon green-text large"></i><br><h3 class="grey-text text-darken-2">Écologique</h3>
            <br>
            <div class="text-center grey-text text-darken-1">
                Le transporteur aurait réalisé le trajet avec ou sans le colis. Profiter de ce trajet pour envoyer un colis, c'est aussi respecter l'environnement ! Génial, non?
            </div>
        </div>
    </div>
</section>
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