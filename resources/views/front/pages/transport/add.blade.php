@extends('layouts.app', [ 
'menu_style' => 'static', 
'page_title' => 'DropZone - Ajout transport',
'includesJs' => ['/js/addtransport.js'],
'includesCss' => ['/css/addtransport.css']])
@section('content')


<h1>Proposer un transport</h1>

<form method="POST" id="formAjoutTransport">

    <label class="labelForm" for="villeDepart">Ville départ : </label><br>
    <input class="inputForm" type="text" id="villeDepart" name="villeDepart"><br><br>

    <label class="labelForm" for="villeArrivee">Ville arrivée : </label><br>
    <input class="inputForm" type="text" id="villeArrivee" name="villeArrivee"><br><br>

    <label class="labelForm" for="villeEtape">Villes étapes : </label><br>
    <div style="display:inline-block" id="etape">
        <input class="inputForm" type="text" name="villeEtape1">
    </div>
    <button type="button" onclick="addEtape()" id="ajoutButton">+</button>
    <br><br>
    <label class="labelForm" for="detour">Détour maximum : </label><br>
    <input class="inputForm" type="number" id="detour" name="detour"><br><br>

    <label class="labelForm" for="detour">Autoroute emprunté : </label><br>  
    <input type="radio" class="uk-radio" name="autoroute" id="oui" value="oui" checked> <label for="oui">Oui</label>
    <input type="radio" class="uk-radio" name="autoroute" id="non" value="non"> <label for="non">Non</label><br>
    
    <label class="labelForm" for="nature">Nature du trajet : </label><br>  
    <input type="radio" class="uk-radio" name="nature" id="occasionnel" value="occasionnel" onclick="occa()"> <label for="occasionnel">Occasionnel</label>
    <input type="radio" class="uk-radio" name="nature" id="regulier" value="regulier" onchange="regu()"> <label for="regulier">Regulier</label><br>

    
    <label class="labelForm" for="heureDepart">Heure de départ : </label><br>
    <input class="inputForm" type="time" id="heureDepart" name="heureDepart"><br><br>
    
    




</form>



@endsection
