@extends('layouts.app', [ 
'menu_style' => 'static', 
'page_title' => 'DropZone - Ajout expedition',
'includesJs' => ['/js/addexpedition.js','/js/components/accordion.min.js'],
'includesCss' => ['/css/addexpedition.css']])
@section('content')

    <h1 class="center">Proposer une expédition</h1>

    <form method="POST" id="formAjoutTransport" action="{{url('/postaddexpedition')}}" class="uk-form-file">
        {{ csrf_field() }}
        <div id="divLeft" class="divFormAddTransport ">

            <label class="labelForm" for="villeDepart">Ville départ :</label><br>
            <input class="inputForm" type="text" id="villeDepart" name="villeDepart" onchange="marqueur()">
            <input id="villeDepartHidden" name="villeDepartHidden" type="hidden" value="">
            <br><br>

            <label class="labelForm" for="villeArrivee">Ville arrivée : </label><br>
            <input class="inputForm" type="text" id="villeArrivee" name="villeArrivee" onchange="marqueur()">
            <input id="villeArriveeHidden" name="villeArriveeHidden" type="hidden" value="">
            <br><br>

            <h3>Taile du colis :</h3>
            <label for="lod">Longueur (cm) :</label><input type="number" id="lod" name="lod"><br>
            <label for="lad">Largeur (cm) :</label><input type="number" id="lad" name="lad"><br>
            <label for="hd">Hauteur (cm) :</label><input type="number" id="hd" name="hd"><br>
            <label for="pd">Poids (kg) :</label><input type="number" id="pd" name="pd"><br>
            <label for="v">Volume :</label><input type="number" id="v" name="v"><br>
            <label for="descri">Description :</label><textarea type="text" id="descri" name="descri"></textarea><br>
            
            <div id="map" style="width:300px; height:300px;"></div>
       <button class="uk-button uk-button-primary" id="btProposer" disabled>Proposer</button>
        </div>


    </form>

    <script src="https://maps.googleapis.com/maps/api/js?signed_in=true&sensor=false&amp;libraries=places&callback=initMap&key=AIzaSyCVpvFQSuDA3GaSh4dj15u5IoXTHLLsqDY" async defer></script>
@endsection