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
            sdfsdf
        </div>
        <div class="col m5 s12" id="transportsList" style="max-height: 400px; padding-top: 20px;">
            @for ($i = 0; $i < $transports->count(); $i++)
            <div class="row">
                <div class="col m12 s12 transportItem">
                    {{ $transports[$i]->villeDepart->ville->name }}
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>

<script src="https://maps.googleapis.com/maps/api/js?signed_in=true&sensor=false&amp;libraries=places&callback=initMap&key=AIzaSyCVpvFQSuDA3GaSh4dj15u5IoXTHLLsqDY" async defer></script>

@endsection