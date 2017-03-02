@extends('layouts.app', [ 
'menu_style' => 'static', 
'page_title' => 'DropZone - Ajout transport',
'includesJs' => ['/js/addtransport.js','/js/components/accordion.min.js'],
'includesCss' => ['/css/addtransport.css']])
@section('content')

<style type="text/css">
    .center{
        text-align:center;
    }
</style>       
    @if(session('add'))
        <div class="uk-alert uk-alert-success"> Transport ajouté !</div>
    @endif 
    <h1 class="center">Proposer un transport</h1>

    @if ($nbVehicule==0)
        <h2 class="center">Vous n'avez pas encore de véhicule. Veuillez en ajouter ici : <a href="{{url('/user/myvehicules/add')}}">Ajouter un véhicule</a></h2>
    @else

    <form method="POST" id="formAjoutTransport" action="{{url('/postaddtransport')}}" class="uk-form-file">
        {{ csrf_field() }}
        <div id="divUn" class="landing_pages_item">
            <div id="divUk" class="landing_form">
                    <h2>1. Information sur le trajet</h2>
                    <label class="labelForm" for="villeDepart">Ville départ :</label><br>
                    <input class="inputForm" type="text" id="villeDepart" name="villeDepart">
                    <input id="villeDepartHidden" name="villeDepartHidden" type="hidden" value="">
                    <br><br>

                    <label class="labelForm" for="villeArrivee">Ville arrivée : </label><br>
                    <input class="inputForm" type="text" id="villeArrivee" name="villeArrivee">
                    <input id="villeArriveeHidden" name="villeArriveeHidden" type="hidden" value="">
                    <br><br>

                    <label class="labelForm" for="villeEtape">Villes étapes : </label><br>
                    <input id="villeEtapeHidden" type="hidden" value="">
                    <div style="display:inline-block" id="etape">
                        1.<input class="inputForm" type="text" name="villeEtape1" id="villeEtape1" onchange="tryit();"><br>
                    </div>
                    <button type="button" onclick="addEtape()" id="ajoutButton">+</button>
                    <br><br>
                    <input id="villeEtapeHidden1" name="villeEtapeHidden1" type="hidden" value="">
                    <input id="villeEtapeHidden2" name="villeEtapeHidden2" type="hidden" value="">
                    <input id="villeEtapeHidden3" name="villeEtapeHidden3" type="hidden" value="">
                    <input id="villeEtapeHidden4" name="villeEtapeHidden4" type="hidden" value="">
                    <input id="villeEtapeHidden5" name="villeEtapeHidden5" type="hidden" value="">
                    <label class="labelForm" for="detour">Détour maximum : </label><br>
                    <input class="inputForm" type="number" id="detour" name="detour" min="1" value="1"> km<br><br>

                    <label class="labelForm" for="detour">Autoroute emprunté : </label><br>  
                    <input type="radio" class="uk-radio" name="autoroute" id="oui" value="oui" onchange="autorouteClicked()" checked> <label for="oui">Oui</label>
                    <input type="radio" class="uk-radio" name="autoroute" id="non" value="non" onchange="autorouteClicked()"> <label for="non">Non</label><br>
                    
                    <div id="map" style="width:300px; height:300px;"></div>
                </div>
        </div>

        <div id="divDeux" class="divFormAddTransport landing_pages_item">
            
            <h2>2. Les dates du trajet</h2>
            <label class="labelForm" for="nature">Nature du trajet : </label><br>  
            <input type="radio" class="uk-radio" name="nature" id="occasionnel" value="occasionnel" onchange="occa()"> <label for="occasionnel">Occasionnel</label>
            <input type="radio" class="uk-radio" name="nature" id="regulier" value="regulier" onchange="regu()"> <label for="regulier">Regulier</label><br>

            <div id="trajetOcca" style="display:none;">
                <label for="dateDepart">Date de départ</label><input type="date" name="dateDepart" id="dateDepart" value="2017-01-01"><br>
            <label class="labelForm" for="heureDepart">Heure de départ : </label><br>
            <input class="inputForm" type="time" id="heureDepart" name="heureDepart"><br><br>
            </div>
            <div id="trajetRegu" style="display:none;">
                <label for="frequence">Fréquence du trajet</label>
                <select name="freq" id="freq">
                    <option value="p/j">Plusieurs fois par jour</option>
                    <option value="1/j">Une fois par jour</option>
                    <option value="p/s">Plusieurs fois par semaine</option>
                    <option value="1/s">Une fois par semaine</option>
                    <option value="p/m">Plusieurs fois par mois</option>
                    <option value="1/m">Une fois par mois</option>
                    <option value="p/a">Plusieurs fois par an</option>
                    <option value="1/a">Une fois par an</option>
                </select>
                <label for="dateDebut">Date de début : </label><input type="date" name="dateDebut" id="dateDebut" value="2017-01-01">
                <label for="dateFin">Date de fin : </label><input type="date" name="dateFin" id="dateFin" value="2017-01-01">
            </div>
            
        </div>
        <div id="divTrois" class="divFormAddTransport landing_pages_item">
            <h2>3. Information sur le véhicule</h2>
            <label>Véhicule utilisé : </label>
            <select name="vehicule" id="vehicule">
                @foreach(Auth::user()->vehicules as $vehicule)
                    <option value="{{$vehicule->id}}">{{ $vehicule->marque }} {{ $vehicule->modele }}</option>
                @endforeach
            </select>
            <h3>Place disponible :</h3>
            <label for="lod">Longueur disponible :</label><input type="number" id="lod" name="lod"><br>
            <label for="lad">Largeur disponible :</label><input type="number" id="lad" name="lad"><br>
            <label for="hd">Hauteur disponible :</label><input type="number" id="hd" name="hd"><br>
            <label for="pd">Poids disponible :</label><input type="number" id="pd" name="pd"><br>
            <label for="v">Volume :</label><input type="number" id="v" name="v"><br>
            <label for="descri">Description :</label><textarea type="text" id="descri" name="descri"></textarea><br>
        </div>
        <div class="uk-form-row"><button class="uk-button uk-button-primary" id="btProposer" disabled>Proposer</button></div>


    </form>

    <script src="https://maps.googleapis.com/maps/api/js?signed_in=true&sensor=false&amp;libraries=places&callback=initMap&key=AIzaSyCVpvFQSuDA3GaSh4dj15u5IoXTHLLsqDY" async defer></script>
    @endif
@endsection
