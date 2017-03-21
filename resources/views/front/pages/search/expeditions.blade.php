@extends('layouts.app', [ 'menu_style' => 'static', 'page_title' => 'DropZone - Recherche d\'expedition', 'includesJs' => ['/js/search.js'], 'includesCss' => ['/css/pages/search.css']] ) @section('content')


<section class="padd-tb-55">
    <div class="row">

        <div class="col l7 m8 s12 offset-l1" id="style-1" style="max-height: 800px !important; overflow: auto !important;">
        
        @if(isset($expeditions))
            <script>
            var tabCoordsExpe = Array();
            </script>
            @if($expeditions->count() == 0)
            <div class="card white lighten-3">
                <div class="card-content grey-text">
                    <div class="person-about center-align">
                        <h3 class="about-subtitle">Aucune expedition trouvée</h3>
                        <i class="mdi mdi-alert-circle large"></i>
                    </div>
                </div>
            </div>
            @endif
            @foreach($expeditions as $expedition)
            <script>
            tabCoordsExpe[{{ $expedition->id }}] = [{lat: {{ $expedition->villeDep->latitude }}, lng: {{ $expedition->villeDep->longitude }}}, {lat: {{ $expedition->villeArr->latitude }}, lng: {{ $expedition->villeArr->longitude }}}];
            </script>
            <div class="card white lighten-3 hoverable">
                <div class="card-content grey-text">
                    <div class="person-about">
                        <div class="row">
                            <div class="col l6 s6">
                                <div class="row person-about">
                                    <h3 class="about-subtitle">{{ $expedition->costMax }}€</h3>
                                </div>
                                <div class="row">
                                    {{ $expedition->description }}
                                </div>
                                <div class="row center-align" style="margin-top: 25px;">
                                    <a class="btn-floating waves-effect waves-light orange darken-3 scrollTo" data-section="#frameMap" onclick="loadPath({{ $expedition->id }})"><i class="mdi mdi-google-maps"></i></a> 
                                    @if(Auth::user())
                                    <a href="/expedition/{{ $expedition->id }}" target="_blank" class="waves-effect waves-light blue darken-1 btn">Réserver expedition</a>
                                    @else
                                    <a href="#" class="loginLink waves-effect waves-light blue darken-1 btn">Réserver expedition</a>
                                    @endif
                                </div>
                            </div>
                            <div class="col l4 s6 hide-on-med-and-down" style="border-left: 1px solid #EEE; border-right: 1px solid #EEE;">
                                <div class="row">
                                    Dimensions:<br/>
                                    <table class="bordered striped centered" style="margin-top: 5px;">
                                        <tbody>
                                            <tr>
                                                <td>Longueur Max.:</td>
                                                <td>
                                                @if($expedition->lengthItem && $expedition->lengthItem > 0)
                                                {{ $expedition->lengthItem }} cm
                                                @else
                                                <i><b>NR.</b></i>
                                                @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Hauteur Max.:</td>
                                                <td>
                                                @if($expedition->heightItem && $expedition->heightItem > 0)
                                                {{ $expedition->heightItem }} cm
                                                @else
                                                <i><b>NR.</b></i>
                                                @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Largeur Max.:</td>
                                                <td>
                                                @if($expedition->widthItem && $expedition->widthItem > 0)
                                                {{ $expedition->widthItem }} cm
                                                @else
                                                <i><b>NR.</b></i>
                                                @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Poid Max.:</td>
                                                <td>
                                                @if($expedition->weightItem && $expedition->weightItem > 0)
                                                {{ $expedition->weightItem }} kg
                                                @else
                                                <i><b>NR.</b></i>
                                                @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Volume Max.:</td>
                                                <td>
                                                @if($expedition->volumeItem && $expedition->volumeItem > 0)
                                                {{ $expedition->volumeItem }} kg
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
                                @if($expedition->user->picLink==null)
                                <img src="/images/profile/icon-{{$expedition->user->sexe}}.png" style="width: 100px !important; height: auto;" class="responsive-img circle" alt="">
                                @else
                                <img src="{{$expedition->user->picLink}}" style="width: 100px !important; height: auto;" class="responsive-img circle" alt="">
                                @endif
                                <br><a target="_blank" href="{{ route('user_profile', array('user_id' => $expedition->user->id)) }}">{{ $expedition->user->login }}</a><br>
                                <div id="etoile"><i class="mdi mdi-star icon-size yellow-text" aria-hidden="true"></i> {{$expedition->user->note()}}/5 - {{$expedition->user->nbNotes()}} avis</div>
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
                    <h3 class="about-subtitle">Trouvez une expedition à transporter !</h3>
                    <i class="mdi mdi-arrow-right large"></i>
                </div>
            </div>
        </div>
        @endif
        </div>

        <div class="col l3 m4 s12">
            <div class="card white lighten-3">
                <div class="card-content grey-text">
                    <div class="person-about">
                        <h3 class="about-subtitle">Recherche d'expédition'</h3>
                        <form method="post" action="{{ route('search_expedition_post') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="input-field col l12 s12">
                                    <input id="departExpedition" name="departExpedition" type="text" class="validate dontSubmit auPif forSecondDiv" placeholder="" hiddenId="departExpeditionCoord" value="{{ $departExpedition or old('departExpedition') }}" required="required">
                                    <input type="hidden" name="departExpeditionCoord" id="departExpeditionCoord" class="departExpeditionCoord" value="{{ $departExpeditionCoord or old('departExpeditionCoord') }}">
                                    <label for="departExpedition" class="active">Lieu départ</label>
                                </div>
                                <div class="input-field col l12 s12">
                                    <input id="arriveeExpedition" name="arriveeExpedition" type="text" class="validate dontSubmit auPif forSecondDiv" placeholder="" hiddenId="arriveeExpeditionCoord" value="{{ $arriveeExpedition or old('arriveeExpedition') }}" required="required">
                                    <input type="hidden" name="arriveeExpeditionCoord" id="arriveeExpeditionCoord" class="arriveeExpeditionCoord" value="{{ $arriveeExpeditionCoord or old('arriveeExpeditionCoord') }}">
                                    <label for="icon_telephone" class="active">Lieu arrivée</label>
                                </div>

                                <div class="input-field col l9 m12 s12">
                                    Détour:
                                    <p class="range-field">
                                        <input type="range" name="rangeKM" class="forSecondDivDate" min="1" max="300" value="{{ $rangeKM or '1'}}" />
                                    </p>
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
    <form class="col s12" method="post" action="{{ route('search_expedition_post') }}">
        {{ csrf_field() }}
        <input name="departExpedition" id="departExpedition_hidden" type="hidden" value="{{ $departExpedition or old('departExpedition') }}" required="required">
        <input name="arriveeExpedition" id="arriveeExpedition_hidden" type="hidden" value="{{ $arriveeExpedition or old('arriveeExpedition') }}" required="required">
        <input name="rangeKM" id="rangeKM_hidden" type="hidden" value="{{ $rangeKM or old('rangeKM') or '1' }}">
        <input type="hidden" name="departExpeditionCoord" class="departExpeditionCoord_hidden" id="departExpeditionCoord_hidden" value="{{ $departExpeditionCoord or old('departExpeditionCoord') }}">
        <input type="hidden" name="arriveeExpeditionCoord" class="arriveeExpeditionCoord_hidden" id="arriveeExpeditionCoord_hidden" value="{{ $arriveeExpeditionCoord or old('arriveeExpeditionCoord') }}">

        <div class="modal-content">
            <h4>Dimensions maximum</h4>
            <div class="row">
                <div class="input-field col l3 m3 s11">
                    Longueur (cm):
                    <p class="range-field">
                        <input type="range" name="longMax" min="0" max="300" value="{{ $longMax or '300'}}" />
                    </p>
                </div>
                <div class="input-field col l3 m3 s11">
                    Largeur (cm):
                    <p class="range-field">
                        <input type="range" name="largMax" min="0" max="300" value="{{ $largMax or '300' }}" />
                    </p>
                </div>
                <div class="input-field col l3 m3 s11">
                    Hauteur (cm):
                    <p class="range-field">
                        <input type="range" name="hautMax" min="0" max="300" value="{{ $hautMax or '300' }}" />
                    </p>
                </div>
                <div class="input-field col l3 m3 s11">
                    Poids (kg):
                    <p class="range-field">
                        <input type="range" name="poidMax" min="0" max="10000" value="{{ $poidMax or '10000' }}" />
                    </p>
                </div>
                <div class="input-field col l4 m4 s11 offset-l4 offset-m4">
                    Volume (cm³):
                    <p class="range-field">
                        <input type="range" name="volume" min="0" max="300" value="{{ $volume or '300' }}" />
                    </p>
                </div>
            </div>
            <h4>Prix</h4>
            <div class="row">
                <div class="input-field col l4 m4 s11 offset-l2 offset-m2">
                    Minimum (€)
                    <p class="range-field">
                        <input type="range" name="prixMin" min="0" max="300" value="{{ $prixMin or '0' }}" />
                    </p>
                </div>
                <div class="input-field col l4 m4 s11">
                    Maximum (€)
                    <p class="range-field">
                        <input type="range" name="prixMax" min="0" max="300" value="{{ $prixMax or '300' }}" />
                    </p>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="waves-effect waves-green btn-flat">Appliquer les filtres</button>
        </div>
    </form>
</div>

<script>
    var target = "expedition";
    var tmp = "{{ $departExpeditionCoord or '0;0' }}".split(";");
    var depTab = [tmp[0], tmp[1]];
    var tmp = "{{ $arriveeExpeditionCoord or '0;0' }}".split(";");
    var arrTab = [tmp[0], tmp[1]];
</script>
<script src="https://maps.googleapis.com/maps/api/js?signed_in=true&sensor=false&amp;libraries=places&callback=initMap&key=AIzaSyDafB5RLEbXzBKpSNsil8N82xBJ8zXHH8U" async defer></script>


@endsection
