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
        
    </div>
</section>

<script>
    var target = "expedition";
    var depTab = [{{-- $latDep --}}, {{-- $lngDep --}}];
    var arrTab = [{{-- $latArr --}}, {{-- $lngArr --}}]
</script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?signed_in=true&sensor=false&amp;libraries=places&callback=initMap&key=AIzaSyCVpvFQSuDA3GaSh4dj15u5IoXTHLLsqDY" async defer></script> -->

@endsection