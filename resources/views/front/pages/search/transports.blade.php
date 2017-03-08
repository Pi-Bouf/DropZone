@extends('layouts.app', [ 'menu_style' => 'static', 'page_title' => 'DropZone - Rechercher un colis ou un transport', 'includesJs' => ['/js/search.js'], 'includesCss' => ['/css/pages/search.css']] ) @section('content')

<section id="search" class="scroll-section root-sec padd-tb-60 team-wrap">
    <div class="row">
        <div class="col m6 s10 offset-m3 offset-s1 center-align">
            <h2><b><i>{{ $transports->count() }}</i></b> transports interessant !</h2>
            <h3>{{ $adresseDep }} <span style="margin: 10px">&#8620;</span> {{ $adresseArr }}</h3>
            <div class="row">
                <form class="col s12" method="post" action="{{ route('search_transport_post') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-field col m4">
                            <input id="departTransport" name="departTransport" type="text" class="validate" placeholder="Indiquez un lieu" required="required">
                            <input type="hidden" name="departTransHidden" id="departTransHidden">
                            <label for="departTransport">Départ</label>
                        </div>
                        <div class="input-field col m4">
                            <input id="arriveeTransport" name="arriveeTransport" type="text" class="validate" placeholder="Indiquez un lieu" required="required">
                            <input type="hidden" name="arriveeTransHidden" id="arriveeTransHidden">
                            <label for="icon_telephone">Arrivée</label>
                        </div>
                        <div class="input-field col m4">
                            <input id="dateTransport" type="date" class="datepicker" name="dateTransport" placeholder="JJ/MM/AAAA" required="required">
                            <label for="dateTransport">Date</label>
                        </div>
                        <div class="center-align">
                            <button class="waves-effect waves-light btn red"><i class="right mdi mdi-search-web"></i>Rechercher</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section id="transportResults" class="padd-tb-60 team-wrap" style="height: auto!important;">
    <div class="row">
        <div class="col m5 offset-m1 s10 offset-s1 z-depth-4" id="map" style="height: 400px; border: 2px solid white;">
            Chargement map Google...
        </div>
        <div class="col m5 s12" id="transportsList" style="max-height: 400px;">
        <script>
            var tabEtapeTransport = Array();
            var tabDetourMax = Array();
        </script>
            @for ($i = 0; $i < $transports->count(); $i++)
            <script>
            tabDetourMax[{{ $transports[$i]->id }}] = {{ $transports[$i]->detourRetirMax }};
            var tabEtape = Array();
            @foreach($transports[$i]->etapes as $etape)
            tabEtape.push({{ $etape->ville->latitude }} + ";" + {{ $etape->ville->longitude }});
            @endforeach
            tabEtapeTransport[{{ $transports[$i]->id }}] = tabEtape;
            </script>
            <div class="row">
                <div class="col m12 s12 transportItem" onclick="loadRoad({{ $transports[$i]->id }})">
                    <div class="row">
                        <div class="col m6 s12">
                        <div class="center-align">
                            @if($transports[$i]->natureTransport)
                                <div class="green darken-3 white-text" style="margin: 5px; border-radius: 3px;">
                                <h3><i>{{ Date::parse($transports[$i]->regularyBeginningDate)->format('l j F') }}<br>{{ Date::parse($transports[$i]->regularyEndingDate)->format('l j F') }}</i><br>{{ $transports[$i]->frequency }}</h3>
                                </div>
                            @else
                                <div class="blue darken-3" style="margin: 5px; border-radius: 3px;">
                                <h3>{{ Date::parse($transports[$i]->beginningDate)->format('l j F') }}<br>{{ Date::parse($transports[$i]->beginningHour)->format('H:i') }}</h3>
                                </div>
                            @endif
                        </div>
                        <div class="row center-align">
                        @if($transports[$i]->user->picLink==null)
                        <img src="/images/profile/icon-{{$transports[$i]->user->sexe}}.png" width="20%" class="responsive-img circle" alt="">
                        @else
                        <img src="/images/profile/{{$transports[$i]->user->picLink}}" width="20%" class="responsive-img circle" alt="">
                        @endif
                        <br>
                        <h3 class="black-text">{{ $transports[$i]->user->login }}</h3>
                        
                        <i>{{ $transports[$i]->information }}</i>
                        <div class="center-align">
                            @if($transports[$i]->withHighway)
                            <i class="mdi mdi-highway small blue-text"></i>
                            @else
                            <i class="mdi mdi-highway small grey-text"></i>
                            @endif
                        </div>
                        </div>
                        </div>
                        <div class="col m6 s12">
                            <div class="row center-align">
                                <img style="width: 70%; max-height: 100px;" src="/images/vehicles/{{ $transports[$i]->vehicule->vehiculetype->name }}.svg"><br>
                                <h3 class="black-text">{{ $transports[$i]->vehicule->marque }} {{ $transports[$i]->vehicule->modele }}</h3>
                                <table class="bordered striped centered" style="margin-top: 5px;">
                                    <tbody>
                                    <tr>
                                        <td>Longueur Max.:</td>
                                        <td>
                                        @if($transports[$i]->longMax && $transports[$i]->longMax > 0)
                                        {{ $transports[$i]->longMax }} cm
                                        @elseif($transports[$i]->vehicule->longMax > 0)
                                        {{ $transports[$i]->vehicule->longMax }} cm
                                        @else
                                        <i><b>NR.</b></i>
                                        @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Hauteur Max.:</td>
                                        <td>
                                        @if($transports[$i]->hautMax && $transports[$i]->hautMax > 0)
                                        {{ $transports[$i]->hautMax }} cm
                                        @elseif($transports[$i]->vehicule->hautMax > 0)
                                        {{ $transports[$i]->vehicule->hautMax }} cm
                                        @else
                                        <i><b>NR.</b></i>
                                        @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Largeur Max.:</td>
                                        <td>
                                        @if($transports[$i]->largMax && $transports[$i]->largMax > 0)
                                        {{ $transports[$i]->largMax }} cm
                                        @elseif($transports[$i]->vehicule->largMax > 0)
                                        {{ $transports[$i]->vehicule->largMax }} cm
                                        @else
                                        <i><b>NR.</b></i>
                                        @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Poid Max.:</td>
                                        <td>
                                        @if($transports[$i]->poidMax && $transports[$i]->poidMax > 0)
                                        {{ $transports[$i]->poidMax }} kg
                                        @elseif($transports[$i]->vehicule->poidMax > 0)
                                        {{ $transports[$i]->vehicule->poidMax }} kg
                                        @else
                                        <i><b>NR.</b></i>
                                        @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Volume Max.:</td>
                                        <td>
                                        @if($transports[$i]->volume && $transports[$i]->volume > 0)
                                        {{ $transports[$i]->volume }} kg
                                        @elseif($transports[$i]->vehicule->volume > 0)
                                        {{ $transports[$i]->vehicule->volume }} kg
                                        @else
                                        <i><b>NR.</b></i>
                                        @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
    <div id="selectTransport" class="center-align" style="margin-top: 25px; display: none;">
        <a id="transportSelect" href="" class="waves-effect waves-light btn green">Je prends ce trajet !</a>
    </div>
</section>
<script>
    var depTab = [{{ $latDep }}, {{ $lngDep }}];
    var arrTab = [{{ $latArr }}, {{ $lngArr }}]
</script>
<script src="https://maps.googleapis.com/maps/api/js?signed_in=true&sensor=false&amp;libraries=places&callback=initMap&key=AIzaSyCVpvFQSuDA3GaSh4dj15u5IoXTHLLsqDY" async defer></script>

@endsection