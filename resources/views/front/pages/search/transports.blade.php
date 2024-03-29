@extends('layouts.app', [ 'menu_style' => 'static', 'page_title' => 'DropZone - Recherche de transports', 'includesJs' => ['/js/search.js'], 'includesCss' => ['/css/pages/search.css']] ) @section('content')

<!--    <button class="btn-floating btn-large waves-effect waves-light red scrollTo" data-section="#test"><i class="mdi mdi-search-web"></i></button> -->

<section class="padd-tb-55">
    <div class="row">
        <div class="col l3 m4 s12 offset-l1">
            <div class="card white lighten-3">
                <div class="card-content grey-text">
                    <div class="person-about">
                        <h3 class="about-subtitle">Recherche de transport</h3>
                        <form method="post" action="{{ route('search_transport_post') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="input-field col l12 s12">
                                    <input id="departTransport" name="departTransport" type="text" class="validate dontSubmit auPif forSecondDiv" placeholder="" hiddenId="departTransportCoord" value="{{ $departTransport or old('departTransport') }}" required="required">
                                    <input type="hidden" name="departTransportCoord" id="departTransportCoord" class="departTransportCoord" value="{{ $departTransportCoord or old('departTransportCoord') }}">
                                    <label for="departTransport" class="active">Lieu départ</label>
                                </div>
                                <div class="input-field col l12 s12">
                                    <input id="arriveeTransport" name="arriveeTransport" type="text" class="validate dontSubmit auPif forSecondDiv" placeholder="" hiddenId="arriveeTransportCoord" value="{{ $arriveeTransport or old('arriveeTransport') }}" required="required">
                                    <input type="hidden" name="arriveeTransportCoord" id="arriveeTransportCoord" class="arriveeTransportCoord" value="{{ $arriveeTransportCoord or old('arriveeTransportCoord') }}">
                                    <label for="icon_telephone" class="active">Lieu arrivée</label>
                                </div>

                                <div class="input-field col l9 m12 s12">
                                    <input id="dateTransport" name="dateTransport" type="date" class="datepicker forSecondDivDate">
                                    <label for="dateTransport" class="active">Date</label>
                                </div>
                                <div class="col l3 m12 s6 center-align">
                                    <button class="btn-floating btn-large waves-effect waves-light red"><i class="mdi mdi-search-web"></i></button>
                                </div>
                                <div class="col l12 m12 s6 center-align">
                                    <br><a class="waves-effect waves-light btn" href="#filterSearch"><i class="mdi mdi-chart-gantt"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col l7 m8 s12" id="style-1" style="max-height: 800px !important; overflow: auto !important;">

        @if(isset($transports))
        <script>
            var tabEtapeTransport = Array();
            var tabDetourMax = Array();
        </script>
            @if($transports->count() == 0)
            <div class="card white lighten-3">
                <div class="card-content grey-text">
                    <div class="person-about center-align">
                        <h3 class="about-subtitle">Aucun transport trouvé</h3>
                        <i class="mdi mdi-alert-circle large"></i>
                    </div>
                </div>
            </div>
            @endif
            @foreach($transports as $transport)
            <script>
            tabDetourMax[{{ $transport->id }}] = {{ $transport->detourRetirMax }};
            var tabEtape = Array();
            @foreach($transport->etapes as $etape)
            tabEtape.push({{ $etape->ville->latitude }} + ";" + {{ $etape->ville->longitude }});
            @endforeach
            tabEtapeTransport[{{ $transport->id }}] = tabEtape;
            </script>
            <div class="card white lighten-3 hoverable">
                <div class="card-content grey-text">
                    <div class="person-about">
                        <div class="row">
                            <div class="col l6 s6">
                                <div class="row">
                                    @if($transport->natureTransport)
                                        <h3 style="font-size: 18px;" class="about-subtitle green-text">{{ Date::parse($transport->regularyBeginningDate)->format('l j F') }}<br>{{ Date::parse($transport->regularyEndingDate)->format('l j F') }}</h3>
                                    @else
                                        <h3 style="font-size: 18px;" class="about-subtitle blue-text">{{ Date::parse($transport->beginningDate)->format('l j F') }}<br>{{ Date::parse($transport->beginningHour)->format('H:i') }}</h3>
                                    @endif
                                </div>
                                <div class="row light italic">
                                    <div class="row" style="margin-bottom: 25px;">
                                        @if($transport->withHighway)
                                        <i class="mdi mdi-highway small blue-text"></i>
                                        @else
                                        <i class="mdi mdi-highway small grey-text"></i>
                                        @endif
                                    </div>
                                    <div class="row">
                                        {{ $transport->information }}
                                    </div>
                                    <div class="row center-align">
                                        <a class="btn-floating waves-effect waves-light orange darken-3 scrollTo" data-section="#frameMap" onclick="loadRoad({{ $transport->id }})"><i class="mdi mdi-google-maps"></i></a> 
                                        @if(Auth::user())
                                        <a href="/transport/{{ $transport->id }}" target="_blank" class="waves-effect waves-light blue darken-1 btn">Réserver trajet</a>
                                        @else
                                        <a href="#" class="loginLink waves-effect waves-light blue darken-1 btn">Réserver trajet</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col l4 s6 hide-on-med-and-down" style="border-left: 1px solid #EEE; border-right: 1px solid #EEE;">
                                <div class="row center-align bold">
                                    <img style="width: 70%; max-height: 100px;" src="/images/vehicles/{{ $transport->vehicule->vehiculetype->name }}.svg"><br>
                                    {{ $transport->vehicule->marque }} {{ $transport->vehicule->modele }}
                                </div>
                                <div class="row">
                                    <table class="bordered striped centered" style="margin-top: 5px;">
                                        <tbody>
                                            <tr>
                                                <td>Longueur Max.:</td>
                                                <td>
                                                @if($transport->longMax && $transport->longMax > 0)
                                                {{ $transport->longMax }} cm
                                                @elseif($transport->vehicule->longMax > 0)
                                                {{ $transport->vehicule->longMax }} cm
                                                @else
                                                <i><b>NR.</b></i>
                                                @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Hauteur Max.:</td>
                                                <td>
                                                @if($transport->hautMax && $transport->hautMax > 0)
                                                {{ $transport->hautMax }} cm
                                                @elseif($transport->vehicule->hautMax > 0)
                                                {{ $transport->vehicule->hautMax }} cm
                                                @else
                                                <i><b>NR.</b></i>
                                                @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Largeur Max.:</td>
                                                <td>
                                                @if($transport->largMax && $transport->largMax > 0)
                                                {{ $transport->largMax }} cm
                                                @elseif($transport->vehicule->largMax > 0)
                                                {{ $transport->vehicule->largMax }} cm
                                                @else
                                                <i><b>NR.</b></i>
                                                @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Poid Max.:</td>
                                                <td>
                                                @if($transport->poidMax && $transport->poidMax > 0)
                                                {{ $transport->poidMax }} kg
                                                @elseif($transport->vehicule->poidMax > 0)
                                                {{ $transport->vehicule->poidMax }} kg
                                                @else
                                                <i><b>NR.</b></i>
                                                @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Volume Max.:</td>
                                                <td>
                                                @if($transport->volume && $transport->volume > 0)
                                                {{ $transport->volume }} m³
                                                @elseif($transport->vehicule->volume > 0)
                                                {{ $transport->vehicule->volume }} m³
                                                @else
                                                <i><b>NR.</b></i>
                                                @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col l2 s6 center-align">
                                @if($transport->user->picLink==null)
                                <img src="/images/profile/icon-{{$transport->user->sexe}}.png" style="width: 100px !important; height: auto;" class="responsive-img circle" alt="">
                                @else
                                <img src="{{$transport->user->picLink}}" style="width: 100px !important; height: auto;" class="responsive-img circle" alt="">
                                @endif
                                <br><a target="_blank" href="{{ route('user_profile', array('user_id' => $transport->user->id)) }}">{{ $transport->user->login }}</a><br>
                                <div id="etoile"><i class="mdi mdi-star icon-size yellow-text" aria-hidden="true"></i> {{$transport->user->note()}}/5 - {{$transport->user->nbNotes()}} avis</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
        <div class="card white lighten-3">
            <div class="card-content grey-text">
                <div class="person-about center-align">
                    <h3 class="about-subtitle">Trouvez un transport pour vos colis !</h3>
                    <i class="mdi mdi-arrow-left large"></i>
                </div>
            </div>
        </div>
        @endif
        </div>
    </div>
</section>


<section id="frameMap">
    <div class="row">
        <div class="col l10 m12 s12 offset-l1">
            <div class="card white lighten-3">
                <div class="card-content grey-text">
                    <div class="person-about">
                        <h3 class="about-subtitle">Map</h3>
                        <div id="map" style="height: 400px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div id="filterSearch" class="modal bottom-sheet">
    <form class="col s12" method="post" action="{{ route('search_transport_post') }}">
        {{ csrf_field() }}
        <input name="departTransport" id="departTransport_hidden" type="hidden" value="{{ $departTransport or old('departTransport') }}" required="required">
        <input name="arriveeTransport" id="arriveeTransport_hidden" type="hidden" value="{{ $arriveeTransport or old('arriveeTransport') }}" required="required">
        <input name="dateTransport" id="dateTransport_hidden" type="hidden" value="{{ $dateTransport or old('dateTransport') }}">
        <input type="hidden" name="departTransportCoord" class="departTransportCoord_hidden" id="departTransportCoord_hidden" value="{{ $departTransportCoord or old('departTransportCoord') }}">
        <input type="hidden" name="arriveeTransportCoord" class="arriveeTransportCoord_hidden" id="arriveeTransportCoord_hidden" value="{{ $arriveeTransportCoord or old('arriveeTransportCoord') }}">

        <div class="modal-content">
            <h4>Dimensions minimum</h4>
            <div class="row">
                <div class="input-field col l3 m3 s11">
                    Longueur (cm):
                    <p class="range-field">
                        <input type="range" name="longMax" min="0" max="300" value="{{ $longMax or '0'}}" />
                    </p>
                </div>
                <div class="input-field col l3 m3 s11">
                    Largeur (cm):
                    <p class="range-field">
                        <input type="range" name="largMax" min="0" max="300" value="{{ $largMax or '0' }}" />
                    </p>
                </div>
                <div class="input-field col l3 m3 s11">
                    Hauteur (cm):
                    <p class="range-field">
                        <input type="range" name="hautMax" min="0" max="300" value="{{ $hautMax or '0' }}" />
                    </p>
                </div>
                <div class="input-field col l3 m3 s11">
                    Poids (kg):
                    <p class="range-field">
                        <input type="range" name="poidMax" min="0" max="300" value="{{ $poidMax or '0' }}" />
                    </p>
                </div>
                <div class="input-field col l4 m4 s11 offset-l4 offset-m4">
                    Volume (m³):
                    <p class="range-field">
                        <input type="range" name="volume" min="0" max="5" value="{{ $volume or '0' }}" />
                    </p>
                </div>
            </div>
            <br>
            <h4>Autres</h4>
            <div class="row">
                <div class="input-field col l4 m3 s12">
                    <input type="time" name="beginningHour" id="beginningHour" value="{{ $beginningHour or '--:--' }}" class="active">
                    <label for="beginningHour" class="active">Heure minimum</label>
                </div>
                <div class="input-field col l4 m3 s12">
                    <select name="natureTransport">
                <option value="all" @if(isset($natureTransport) && $natureTransport == 'all') selected @endif>Les deux</option>
                <option value="false" @if(isset($natureTransport) && $natureTransport == 'false') selected @endif>Ponctuel</option>
                <option value="1" @if(isset($natureTransport) && $natureTransport == '1') selected @endif>Regulier</option>
                </select>
                    <label>Nature transport</label>
                </div>
                <div class="col l4 m6 s12 center-align" style="padding-top: 40px !important;">
                    <div class="switch">
                        Autoroute&nbsp;&nbsp;
                        <label>
                        Non
                        <input name='withHighway' type='hidden' value='0'>
                        <input name="withHighway" type="checkbox" value="1" @if(isset($withHighway) && $withHighway == 0) @else checked @endif>
                        <span class="lever"></span>
                        Oui
                    </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="waves-effect waves-green btn-flat">Appliquer les filtres</button>
        </div>
    </form>
</div>

<script>
    var target = "transport";
    var tmp = "{{ $departTransportCoord or '0;0' }}".split(";");
    var depTab = [tmp[0], tmp[1]];
    var tmp = "{{ $arriveeTransportCoord or '0;0' }}".split(";");
    var arrTab = [tmp[0], tmp[1]];

    $(document).ready(function() {
        var $input = $('.datepicker').pickadate();
        var picker = $input.pickadate('picker');
        picker.set('select', "{{ Date::now()->format('d/m/Y') }}");
        picker.set('select', "{{ $dateTransport or old('dateTransport') }}");
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?signed_in=true&sensor=false&amp;libraries=places&callback=initMap&key=AIzaSyDafB5RLEbXzBKpSNsil8N82xBJ8zXHH8U" async defer></script>


@endsection
