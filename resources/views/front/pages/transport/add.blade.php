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

</style>
    <section id="contenuSection" class="scroll-section root-sec brand-bg padd-tb-60 contact-wrap grey lighten-3">
        @if(session('add'))
            <div>
                <div class="alert center" onclick="this.parentElement.style.display='none';" style="background-color:#d9edf7; color:#31708f; padding-top:3px; padding-bottom:3px;">
                    <i class="mdi mdi-check"></i> 
                    <strong>Transport ajouté avec succès !</strong>
                </div>
            </div>
        @endif
        @if(session('error') || $errors->count()>0)
            <div>
                <div class="alert center" onclick="this.parentElement.style.display='none';" style="background-color:#fad5d5; color:#a94442; padding-top:3px; padding-bottom:3px;">
                    <i class="mdi mdi-close"></i> 
                    <strong>Vous devez remplir les champs marqués d'une *</strong>
                </div>
            </div>
        @endif


        <br>

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
                        
                                        <h3 class="about-subtitle">Proposer un transport</h3>
                                        <div class="input-field">
                                            <input id="villeDepart" type="text" name="villeDepart" class="validate input-box dontSubmit auPif" hiddenId="villeDepartHidden" onchange="marqueur()" required>
                                            <label for="villeDepart" class="input-label">Adresse de départ : <span class="red-text">*</span></label>
                                            <input id="villeDepartHidden" name="villeDepartHidden" type="hidden" value="">
                                        </div>
                                        <div class="input-field">
                                            <input id="villeArrivee" type="text" name="villeArrivee" class="validate input-box dontSubmit auPif" hiddenId="villeArriveeHidden" onchange="marqueur()" required>
                                            <label for="villeArrivee" class="input-label">Adresse d'arrivée : <span class="red-text">*</span></label>
                                            <input id="villeArriveeHidden" name="villeArriveeHidden" type="hidden" value="">
                                        </div><br>
                                        <div><label class="input-label" for="villeEtape1">Villes étapes : </label></div>
                                        <div id="etape" class="center"> 
                                            <div class="input-field">
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
                            <br><br><label class="labelForm" for="detour">Détour maximum : (km) <span class="red-text">*</span></label><br>
                            <input class="inputForm" type="number" id="detour" name="detour" min="1" value="10"><br><br>

                            <label class="labelForm" for="detour">Autoroute emprunté : </label><br>
                            <input type="radio" class="with-gap" name="autoroute" id="oui" value="oui" onchange="autorouteClicked()" checked> <label for="oui">Oui</label>
                            <input type="radio" class="with-gap" name="autoroute" id="non" value="non" onchange="autorouteClicked()"> <label for="non">Non</label><br>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 l6 ">
                            <div class="clearfix card-panel grey lighten-5 cform-wrapper">
                            <h3 class="about-subtitle">Les dates du trajet</h3>
                            <br><br>
                            <label class="" for="nature">Nature du trajet :  <span class="red-text">*</span></label><br>
                            <p>
                                <input type="radio" class="with-gap" name="nature" id="occasionnel" value="occasionnel" onchange="occa()" checked> <label for="occasionnel">Occasionnel</label>
                                <input type="radio" class="with-gap" name="nature" id="regulier" value="regulier" onchange="regu()"> <label for="regulier">Regulier</label><br>
                            </p>
                            <div id="trajetOcca">
                                <div class="input-field">
                                    <label for="dateDepart" class="input-label">Date de départ <span class="red-text">*</span></label>
                                    <input type="text" name="dateDepart" class="datepicker input-box" id="dateDepart"><br>
                                    <strong><font color="red">{{ $errors->first('dateDepart') }}</font></strong>
                                </div>
                                <div class="input-field">
                                    <label class="input-label" for="heureDepart">Heure de départ : (Format hh) <span class="red-text">*</span></label>
                                    <input class="input-box validate" type="number" id="heureDepart" name="heureDepart" data-length="2" min="0" max="23"><br><br>
                                    <strong><font color="red">{{ $errors->first('heureDepart') }}</font></strong>
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
                                    <label for="frequence">Fréquence du trajet <span class="red-text">*</span></label>
                                </div>
                                <div class="input-field">
                                    <label for="dateDebut" class="input-label">Date de début :  <span class="red-text">*</span></label>
                                    <input type="date" class="datepicker input-box" name="dateDebut" id="dateDebut">
                                    <strong><font color="red">{{ $errors->first('dateDebut') }}</font></strong>
                                </div>
                                <div class="input-field">
                                    <label for="dateFin" class="input-label">Date de fin :  <span class="red-text">*</span></label>
                                    <input type="date" class="datepicker input-box" name="dateFin" id="dateFin">
                                    <strong><font color="red">{{ $errors->first('dateFin') }}</font></strong>
                                </div>
                            </div>
                            <div class="input-field">
                                <label for="descri">Description : <span class="red-text">*</span></label>
                                <textarea type="text" class="materialize-textarea" id="descri" name="descri" required ></textarea><br>
                                <strong><font color="red">{{ $errors->first('descri') }}</font></strong>
                            </div>
                        </div>
                    </div> 

                    <div class="col s12 l6">
                        <div class="clearfix card-panel grey lighten-5 cform-wrapper">
                            <h3 class="about-subtitle">Information sur le véhicule</h3>
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
                                <label for="lod" class="input-label">Longueur disponible : (cm)</label>
                                <input type="number" class="input-box validate" id="lod" name="lod"><br>
                            </div>
                            <div class="input-field">
                                <label for="lad" class="input-label">Largeur disponible : (cm)</label>
                                <input type="number" class="input-box validate" id="lad" name="lad"><br>
                            </div>
                            <div class="input-field">
                                <label for="hd" class="input-label">Hauteur disponible : (cm)</label>
                                <input type="number" class="input-box validate" id="hd" name="hd"><br>
                            </div>
                            <div class="input-field">
                                <label for="pd" class="input-label">Poids disponible : (kg)</label>
                                <input type="number" class="input-box validate" id="pd" name="pd" step="0.1"><br>
                            </div>
                            <div class="input-field">
                                <label for="v" class="input-label">Volume : (m³)</label>
                                <input type="number" class="input-box validate" id="v" name="v" step="0.01"><br>
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
