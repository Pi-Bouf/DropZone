@extends('layouts.app', [ 'menu_style' => 'static', 'page_title' => 'DropZone - Rechercher un colis ou un transport', 'includesJs'
=> ['/js/search.js'], 'includesCss' => ['/css/pages/search.css']] ) @section('content')

<section id="search" class="scroll-section root-sec padd-tb-60 team-wrap">
    <div class="row">
        <div class="col m6 s10 offset-m3 offset-s1 center-align">
            <h2>Recherche de transports ou d'expeditions</h2>
        </div>
    </div>
</section>

<section class="researchForm">
    <div class="row">
        <div id="transportSearch" class="col m6 s12">
            <div class="row">
                <div class="center-align">
                    <h2>Transport</h2>
                </div>
                <form class="formBox col l6 m10 s12 offset-l3 offset-m1" method="post" action="{{ route('search_transport_post') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="departTransport" name="departTransport" value="{{ old('departTransport') }}" type="text" class="validate dontSubmit" placeholder="" required="required">
                            <input type="hidden" name="departTransHidden" id="departTransHidden">
                            <label for="departTransport">Ville de départ</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="arriveeTransport" name="arriveeTransport" type="text" class="validate dontSubmit" placeholder="" required="required">
                            <input type="hidden" name="arriveeTransHidden" id="arriveeTransHidden">
                            <label for="arriveeTransport">Ville d'arrivée</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="dateTransport" type="date" class="datepicker" name="dateTransport" required="required">
                            <label for="dateTransport">Date</label>
                        </div>
                    </div>
                    <div class="center-align">
                        <button class="waves-effect waves-light btn"><i class="right mdi mdi-search-web"></i>Rechercher</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="expeditionSearch" class="col m6 s12">
            <div class="row">
                <div class="center-align">
                    <h2>Expedition</h2>
                </div>
                <form class="formBox col l6 m10 s12 offset-l3 offset-m1" method="post" action="{{ route('search_expedition_post') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="departExpedition" name="departExpedition" type="text" class="validate dontSubmit" placeholder="">
                            <input type="hidden" name="departExpeHidden" id="departExpeHidden">
                            <label for="departExpedition">Ville de départ</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="arriveeExpedition" name="arriveeExpedition" type="text" class="validate dontSubmit" placeholder="">
                            <input type="hidden" name="arriveeExpeHidden" id="arriveeExpeHidden">
                            <label for="arriveeExpedition">Ville d'arrivée</label>
                        </div>
                    </div>
                    <div class="row">
                        <p class="range-field">
                            <label for="rangeKM">Détours en KM:</label>
                            <input type="range" id="rangeKM" name="rangeKM" min="1" max="20" value="5">
                        </p>
                    </div>
                    <div class="center-align">
                        <button class="waves-effect waves-light btn"><i class="right mdi mdi-search-web"></i>Rechercher</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    var target = "search";
</script>
<script src="https://maps.googleapis.com/maps/api/js?signed_in=true&sensor=false&amp;libraries=places&callback=initialize&key=AIzaSyCVpvFQSuDA3GaSh4dj15u5IoXTHLLsqDY" async defer></script>

@endsection