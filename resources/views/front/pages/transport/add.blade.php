@extends('layouts.app', [ 
'menu_style' => 'static', 
'page_title' => 'DropZone - Ajout transport',
'includesJs' => ['/js/addtransport.js'],
'includesCss' => []])
@section('content')


<h1>Proposer un transport</h1>

<form method="POST">
    <label class="labelForm" for="villeDepart">Ville départ : </label><br>
    <input class="inputForm" type="text" id="villeDepart" name="villeDepart"><br><br>

    <label class="labelForm" for="villeArrivee">Ville arrivée : </label><br>
    <input class="inputForm" type="text" id="villeArrivee" name="villeArrivee"><br><br>

    <label class="labelForm" for="villeEtape">Villes étapes : </label><br>
    <input class="inputForm" type="text" id="villeEtape" name="villeEtape"><button type="button">+</button><br><br>

    <label class="labelForm" for="detour">Détour maximum : </label><br>
    <input class="inputForm" type="text" id="detour" name="detour"><br><br>

    <label class="labelForm" for="detour">Autoroute emprunté : </label><br>  
    <input type="radio" name="autoroute" id="oui" value="oui" checked> <label for="oui">Oui</label>
    <input type="radio" name="autoroute" id="non" value="non"> <label for="non">Non</label><br> 




</form>



@endsection
