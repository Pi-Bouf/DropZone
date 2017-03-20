@extends('layouts.app', [
'menu_style' => 'static',
'page_title' => 'DropZone - Ajout transport',
'includesJs' => ['/js/addtransport.js'],
'includesCss' => ['/css/pages/transports.css']])
@section('content')

<script>
    $(document).ready(function() {
        $('select').material_select();
    });
</script>

<style type="text/css">
    .center{
        text-align:center;
    }
</style>
    <section id="contenuSection" class="scroll-section root-sec brand-bg padd-tb-60 contact-wrap grey lighten-3">
        
        @if(session('add'))
            <div class="uk-alert uk-alert-success"> Transport ajouté !</div>
        @endif

        @if(session('error'))
            <div class="uk-alert uk-alert-error"> Erreur de la BDD !</div>
        @endif

        <h2 class="center">Proposer un transport</h2>

        @if ($nbVehicule==0)
            <h2 class="center">Vous n'avez pas encore de véhicule. Veuillez en ajouter ici : <a href="{{url('/user/myvehicules/add')}}">Ajouter un véhicule</a></h2>
        @else
        <div class="container">
            <form method="POST" id="formAjoutTransport" action="{{url('/postaddtransport')}}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col s12 l7">
                        <div class="map-wrapper ">
                                        
                            <div id="map" class="card-panel col s12"></div>
                        </div>
                    </div> <!-- Map end -->
                    <div class="col s12 l5" id="infoTrajet">
                        <div class="clearfix card-panel grey lighten-5 cform-wrapper">
                                        <h3>Information sur le trajet</h3>
                                        <div class="input-field">
                                            <input id="villeDepart" type="text" name="villeDepart" class="validate input-box dontSubmit auPif" hiddenId="villeDepartHidden" onchange="marqueur()" required>
                                            <label for="villeDepart" class="input-label">Adresse de départ :</label>
                                            <input id="villeDepartHidden" name="villeDepartHidden" type="hidden" value="">
                                        </div>
                                        <div class="input-field">
                                            <input id="villeArrivee" type="text" name="villeArrivee" class="validate input-box dontSubmit auPif" hiddenId="villeArriveeHidden" onchange="marqueur()" required>
                                            <label for="villeArrivee" class="input-label">Adresse d'arrivée :</label>
                                            <input id="villeArriveeHidden" name="villeArriveeHidden" type="hidden" value="">
                                        </div>
                                        <div id="etape">
                                            <div class="input-field">
                                                <input class="validate input-box" type="text" name="villeEtape1" id="villeEtape1" onchange="tryit();">
                                                <label class="input-label" for="villeEtape">Villes étapes : </label>
                                                <input id="villeEtapeHidden" type="hidden" value="">
                                            </div>
                                        </div>
                            <div id="trajet" class="center">
                                <button id="ajoutButton" onclick="addEtape()" type="button" class="btn-floating waves-effect waves-light blue"><i class="material-icons">+</i></button>
                            </div>
                            <input id="villeEtapeHidden1" name="villeEtapeHidden1" type="hidden" value="">
                            <input id="villeEtapeHidden2" name="villeEtapeHidden2" type="hidden" value="">
                            <input id="villeEtapeHidden3" name="villeEtapeHidden3" type="hidden" value="">
                            <input id="villeEtapeHidden4" name="villeEtapeHidden4" type="hidden" value="">
                            <input id="villeEtapeHidden5" name="villeEtapeHidden5" type="hidden" value="">
                            <br><br><label class="labelForm" for="detour">Détour maximum : (km)</label><br>
                            <input class="inputForm" type="number" id="detour" name="detour" min="1" value="1"><br><br>

                            <label class="labelForm" for="detour">Autoroute emprunté : </label><br>
                            <input type="radio" class="with-gap" name="autoroute" id="oui" value="oui" onchange="autorouteClicked()" checked> <label for="oui">Oui</label>
                            <input type="radio" class="with-gap" name="autoroute" id="non" value="non" onchange="autorouteClicked()"> <label for="non">Non</label><br>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 l6 ">
                            <div class="clearfix card-panel grey lighten-5 cform-wrapper">
                            <h3>Les dates du trajet</h3>
                            <br><br>
                            <label class="" for="nature">Nature du trajet : </label><br>
                            <p>
                                <input type="radio" class="with-gap" name="nature" id="occasionnel" value="occasionnel" onchange="occa()" checked> <label for="occasionnel">Occasionnel</label>
                                <input type="radio" class="with-gap" name="nature" id="regulier" value="regulier" onchange="regu()"> <label for="regulier">Regulier</label><br>
                            </p>
                            <div id="trajetOcca">
                                <div class="input-field">
                                    <label for="dateDepart" class="input-label">Date de départ</label>
                                    <input type="text" name="dateDepart" class="datepicker input-box" id="dateDepart"><br>
                                </div>
                                <div class="input-field">
                                    <label class="input-label" for="heureDepart">Heure de départ : (Format hh:mm)</label>
                                    <input class="input-box validate" type="text" id="heureDepart" name="heureDepart" data-length="5"><br><br>
                                </div>
                            </div>
                            <div id="trajetRegu" style="display:none;">
                                <div class="input-field">
                                    <select name="freq" id="freq">
                                        <option value="Plusieurs fois par jour">Plusieurs fois par jour</option>
                                        <option value="Une fois par jour">Une fois par jour</option>
                                        <option value="Plusieurs fois par semaine">Plusieurs fois par semaine</option>
                                        <option value="Une fois par semaine">Une fois par semaine</option>
                                        <option value="Plusieurs fois par mois">Plusieurs fois par mois</option>
                                        <option value="Une fois par mois">Une fois par mois</option>
                                        <option value="Plusieurs fois par an">Plusieurs fois par an</option>
                                        <option value="Une fois par an">Une fois par an</option>
                                    </select>
                                    <label for="frequence">Fréquence du trajet</label>
                                </div>
                                <div class="input-field">
                                    <label for="dateDebut" class="input-label">Date de début : </label>
                                    <input type="date" class="datepicker input-box" name="dateDebut" id="dateDebut">
                                </div>
                                <div class="input-field">
                                    <label for="dateFin" class="input-label">Date de fin : </label>
                                    <input type="date" class="datepicker input-box" name="dateFin" id="dateFin">
                                </div>
                            </div>
                            <div class="input-field">
                                <label for="descri">Description :</label>
                                <textarea type="text" class="materialize-textarea" id="descri" name="descri" required ></textarea><br>
                            </div>
                        </div>
                    </div> 

                    <div class="col s12 l6">
                        <div class="clearfix card-panel grey lighten-5 cform-wrapper">
                            <h3>Information sur le véhicule</h3>
                            <br><br>
                            <label>Véhicule utilisé : </label>
                            <div class="input-field">
                                <select name="vehicule" id="vehicule">
                                    @foreach(Auth::user()->vehicules as $vehicule)
                                        <option value="{{$vehicule->id}}">{{ $vehicule->marque }} {{ $vehicule->modele }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span id="info">Si les champs suivants ne sont pas remplis, ils prendront la capacité du véhicule.</span>
                            <div class="input-field">
                                <label for="lod" class="input-label">Longueur disponible :</label>
                                <input type="number" class="input-box" id="lod" name="lod"><br>
                            </div>
                            <div class="input-field">
                                <label for="lad" class="input-label">Largeur disponible :</label>
                                <input type="number" class="input-box" id="lad" name="lad"><br>
                            </div>
                            <div class="input-field">
                                <label for="hd" class="input-label">Hauteur disponible :</label>
                                <input type="number" class="input-box" id="hd" name="hd"><br>
                            </div>
                            <div class="input-field">
                                <label for="pd" class="input-label">Poids disponible :</label>
                                <input type="number" class="input-box" id="pd" name="pd"><br>
                            </div>
                            <div class="input-field">
                                <label for="v" class="input-label">Volume :</label>
                                <input type="number" class="input-box" id="v" name="v"><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="center">
                    <button id="btProposer" type="submit" class=" btn-large blue darken-3" disabled><i class="mdi mdi-cube-send right"></i>Proposer</button>
                </div>


            </form>

            <script src="https://maps.googleapis.com/maps/api/js?signed_in=true&sensor=false&amp;libraries=places&callback=initMap&key=AIzaSyCVpvFQSuDA3GaSh4dj15u5IoXTHLLsqDY" async defer></script>  
        </div>
        @endif
    </section>
@endsection
