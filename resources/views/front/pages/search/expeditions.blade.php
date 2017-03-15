@extends('layouts.app', [ 'menu_style' => 'static', 'page_title' => 'DropZone - Rechercher un colis ou un transport', 'includesJs' => ['/js/search.js'], 'includesCss' => ['/css/pages/search.css']] ) @section('content')

<section id="search" class="scroll-section root-sec padd-tb-60 team-wrap">
    <div class="row">
        <div class="col m6 s10 offset-m3 offset-s1 center-align">
            <h2><b><i></i></b> transports interessant !</h2>
            <h3>ok <span style="margin: 10px">&#8620;</span> ok</h3>
            <div class="row">
                <form class="col s12" method="post" action="{{ route('search_expedition_post') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-field col m4">
                            <input id="departExpedition" name="departExpedition" type="text" class="validate" placeholder="Indiquez un lieu" required="required">
                            <input type="hidden" name="departTransHidden" id="departTransHidden">
                            <label for="departExpedition">Départ</label>
                        </div>
                        <div class="input-field col m4">
                            <input id="arriveeExpedition" name="arriveeExpedition" type="text" class="validate" placeholder="Indiquez un lieu" required="required">
                            <input type="hidden" name="arriveeTransHidden" id="arriveeTransHidden">
                            <label for="icon_telephone">Arrivée</label>
                        </div>
                        <div class="input-field col m4">
                            <input id="dateExpedition" type="date" class="datepicker" name="dateExpedition" placeholder="JJ/MM/AAAA" required="required">
                            <label for="dateExpedition">Date</label>
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

<section id="expeditionSearch" class="padd-tb-60 team-wrap" style="height: auto!important;">
    <div class="row">
        <div class="col m5 offset-m1 s12" id="transportsList" style="max-height: 400px;">
        <script>
        var tabCoordsExpe = Array();
        </script>
        @for ($i = 0; $i < $expeditions->count(); $i++)
        <script>
        tabCoordsExpe[{{ $expeditions[$i]->id }}] = [{lat: {{ $expeditions[$i]->villeDep->latitude }}, lng: {{ $expeditions[$i]->villeDep->longitude }}}, {lat: {{ $expeditions[$i]->villeArr->latitude }}, lng: {{ $expeditions[$i]->villeArr->longitude }}}];
        </script>
            <div class="row">
                <div class="col m12 s12 Item" id="item_{{ $expeditions[$i]->id }}" onclick="loadPath({{ $expeditions[$i]->id }})">
                    <div class="center-align">
                        <h3 class="blue-text">{{ $expeditions[$i]->costMax }}€</h3>
                        <i>{{ $expeditions[$i]->description }}</i>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col m6 s12">
                            <div class="center-align">
                            @if($expeditions[$i]->user->picLink)
                            <img src="{{$expeditions[$i]->user->picLink}}" width="40%" class="responsive-img circle" alt="">
                            @else
                            <img src="/images/profile/icon-{{$expeditions[$i]->user->sexe}}.png" width="40%" class="responsive-img circle" alt="">
                            @endif
                            </div>
                        </div>
                        <div class="col m6 s12">
                            <div class="center-align">
                                <a target="_blank" href="{{ route('user_profile', array('user_id' => $expeditions[$i]->user->id)) }}">{{$expeditions[$i]->user->login}}</a>
                                <br>
                                <b>Déposé: <i>{{ Date::parse($expeditions[$i]->created_at)->format('l j F') }}</i></b><br />
                                <b>Adresse départ: <i>{{ $expeditions[$i]->villeDep->name }}</i></b><br />
                                <b>Adresse arrivée: <i>{{ $expeditions[$i]->villeArr->name }}</i></b><br />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
        </div>
        <div class="col m5 s10 offset-s1 z-depth-4" id="map" style="height: 400px; border: 2px solid white;">
            Chargement map Google...
        </div>
    </div>
    <div id="selectExpedition" class="center-align" style="margin-top: 25px; display: none;">
        <a id="expeditionSelect" target="_blank" href="" class="waves-effect waves-light btn green">Je demande cette expedition</a>
    </div>
</section>

<script>
    var target = "expedition";
    var depTab = [{{ $latDep }}, {{ $lngDep }}];
    var arrTab = [{{ $latArr }}, {{ $lngArr }}]
</script>
<script src="https://maps.googleapis.com/maps/api/js?signed_in=true&sensor=false&amp;libraries=places&callback=initMap&key=AIzaSyCVpvFQSuDA3GaSh4dj15u5IoXTHLLsqDY" async defer></script>

@endsection