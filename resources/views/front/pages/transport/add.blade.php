@extends('layouts.app', [ 
'menu_style' => 'static', 
'page_title' => 'DropZone - Ajout transport',
'includesJs' => ['/js/addtransport.js','/js/components/accordion.min.js'],
'includesCss' => ['/css/addtransport.css']])
@section('content')

<style type="text/css">
    .divFormAddTransport{
        float:left;
        width:40%;
        margin-left:5%;
        margin-right:5%;
        text-align:center;
    }

    .center{
        text-align:center;
    }
</style>
<h1 class="center">Proposer un transport</h1>

<form method="POST" id="formAjoutTransport" action="{{ route('')) }}">
    <div id="divLeft" class="divFormAddTransport">
        <h2>1. Information sur le trajet</h2>
        <label class="labelForm" for="villeDepart">Ville départ : </label><br>
        <input class="inputForm" type="text" id="villeDepart" name="villeDepart"><br><br>

        <label class="labelForm" for="villeArrivee">Ville arrivée : </label><br>
        <input class="inputForm" type="text" id="villeArrivee" name="villeArrivee"><br><br>

        <label class="labelForm" for="villeEtape">Villes étapes : </label><br>
        <div style="display:inline-block" id="etape">
            1.<input class="inputForm" type="text" name="villeEtape1"><br>
        </div>
        <button type="button" onclick="addEtape()" id="ajoutButton">+</button>
        <br><br>
        <label class="labelForm" for="detour">Détour maximum : </label><br>
        <input class="inputForm" type="number" id="detour" name="detour"> km<br><br>

        <label class="labelForm" for="detour">Autoroute emprunté : </label><br>  
        <input type="radio" class="uk-radio" name="autoroute" id="oui" value="oui" checked> <label for="oui">Oui</label>
        <input type="radio" class="uk-radio" name="autoroute" id="non" value="non"> <label for="non">Non</label><br>
        
        <label class="labelForm" for="nature">Nature du trajet : </label><br>  
        <input type="radio" class="uk-radio" name="nature" id="occasionnel" value="occasionnel" onchange="occa()"> <label for="occasionnel">Occasionnel</label>
        <input type="radio" class="uk-radio" name="nature" id="regulier" value="regulier" onchange="regu()"> <label for="regulier">Regulier</label><br>

        <div id="trajetOcca" style="display:none;">
            <label for="dateDepart">Date de départ</label><input type="date" name="dateDepart" id="dateDepart" value="2017-01-01">
        </div>
        <div id="trajetRegu" style="display:none;">
            <label for="frequence">Fréquence du trajet</label>
            <select name="freq">
                <option value="">Plusieurs fois par jour</option>
                <option value="">Une fois par jour</option>
                <option value="">Plusieurs fois par semaine</option>
                <option value="">Une fois par semaine</option>
                <option value="">Plusieurs fois par mois</option>
                <option value="">Une fois par mois</option>
                <option value="">Plusieurs fois par an</option>
                <option value="">Une fois par an</option>
            </select>
            <label for="dateDebut">Date de début : </label><input type="date" name="dateDebut" id="dateDebut" value="2017-01-01">
            <label for="dateFin">Date de fin : </label><input type="date" name="dateFin" id="dateFin" value="2017-01-01">
        </div>
        
        <label class="labelForm" for="heureDepart">Heure de départ : </label><br>
        <input class="inputForm" type="time" id="heureDepart" name="heureDepart"><br><br>
    </div>
    <div id="divLeft" class="divFormAddTransport">
        <h2>2. Information sur le véhicule</h2>
        <label>Véhicule utilisé : </label>
        <select name="vehicule">
            @foreach(Auth::user()->vehicules as $vehicule)
                <option name="$vehicule->id">{{ $vehicule->marque }} {{ $vehicule->modele }}</option>
            @endforeach
        </select>
        <h3>Place disponible :</h3>
        <label for="lod">Longueur disponible :</label><input type="number" id="lod" name="lod"><br>
        <label for="lad">Largeur disponible :</label><input type="number" id="lad" name="lad"><br>
        <label for="hd">Hauteur disponible :</label><input type="number" id="hd" name="hd"><br>
        <label for="pd">Poids disponible :</label><input type="number" id="pd" name="pd"><br>
    </div>
    <div class="uk-form-row"><button class="uk-button uk-button-primary">Proposer</button></div>
</form>



@endsection
