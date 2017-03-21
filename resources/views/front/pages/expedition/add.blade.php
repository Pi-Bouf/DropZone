@extends('layouts.app', [ 
'menu_style' => 'static', 
'page_title' => 'DropZone - Ajout expedition',
'includesJs' => ['/js/addexpedition.js'],
'includesCss' => ['/css/pages/expeditions.css']])
@section('content')


        <section id="contenuSection" class="scroll-section root-sec brand-bg padd-tb-60 contact-wrap grey lighten-3">
            @if(session('add'))
                <div id="card-alert">
                    <div class="orange-text">
                        <p>Votre expédition a été ajouté avec succès !</p>
                    </div>

                </div>
            @endif 
            <h2 class="header center">Proposer une expédition de colis</h2>
            <div class="container">
                <div class="row">
                        <!-- Map Start -->


                    <form method="POST" id="formAjoutTransport" action="{{url('/postaddcolis')}}">
                        <div class="row">
                            <div class="col s12 l7">
                                <div class="map-wrapper ">
                                    
                                    <div id="map" class="card-panel col s12"></div>
                                </div>
                            </div> <!-- Map end -->
                            {{ csrf_field() }}
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
                                </div>
                            </div>  
                        </div>
                        <div class="row">  
                            <div class="col s0 l2"></div>                    
                            <div class="col s12 l8">
                                <div class="clearfix card-panel grey lighten-5 cform-wrapper">
                                    <h3>Information sur le colis</h3>
                                    <div class="input-field">
                                        <input id="prix" type="number" name="prix" class="validate input-box" onchange="marqueur()" step="0.01" required>
                                        <label for="prix" class="input-label">Prix de la livraison (€) :</label>
                                    </div>
                                    <div class="input-field">
                                        <textarea id="description" type="text" name="description" class="validate materialize-textarea" onchange="marqueur()" required></textarea>
                                        <label for="description" class="input-label">Description du colis :</label>
                                    </div>
                                    <div class="input-field">
                                        <input id="poids" type="number" name="poids" class="validate input-box" onchange="marqueur()" required>
                                        <label for="poids" class="input-label">Poids (g) :</label>
                                    </div>
                                    <div class="input-field">
                                        <input id="longueur" type="number" name="longueur" class="validate input-box" onchange="marqueur()" required>
                                        <label for="longueur" class="input-label">Longueur (cm) :</label>
                                    </div>
                                    <div class="input-field">
                                        <input id="largeur" type="number" name="largeur" class="validate input-box" onchange="marqueur()" required>
                                        <label for="largeur" class="input-label">Largeur (cm) :</label>
                                    </div>
                                    <div class="input-field">
                                        <input id="hauteur" type="number" name="hauteur" class="validate input-box" onchange="marqueur()" required>
                                        <label for="hauteur" class="input-label">Hauteur (cm) :</label>
                                    </div>
                                    <div class="input-field">
                                        <input id="volume" type="number" name="volume" class="validate input-box" onchange="marqueur()" step="0.01" required>
                                        <label for="volume" class="input-label">Volume (m³) :</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="center">
                            <button id="btProposer" type="submit" class=" btn-large orange darken-3" disabled><i class="mdi mdi-cube-send right"></i>Proposer</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    <script src="https://maps.googleapis.com/maps/api/js?signed_in=true&sensor=false&amp;libraries=places&callback=initMap&key=AIzaSyCVpvFQSuDA3GaSh4dj15u5IoXTHLLsqDY" async defer></script>
@endsection