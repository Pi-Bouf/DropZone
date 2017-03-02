@extends('layouts.app', [ 
'menu_style' => 'static', 
'page_title' => 'DropZone - Ajout expedition',
'includesJs' => ['/js/addexpedition.js'],
'includesCss' => ['']])
@section('content')

<style>
    #map{
        height:400px;
    }
    input{
        color:black;
    }
    textarea{
        color:black;
    }
</style>

        <section id="contact" class="scroll-section root-sec brand-bg padd-tb-120 contact-wrap">
            <h2 class="header center">Proposer une expédition</h2>
            <div class="container">
                <div class="row">
                        <!-- Map Start -->


                    <form method="POST" id="formAjoutTransport" action="{{url('/postaddexpedition')}}"  novalidate>
                        <div class="row">
                            <div class="col s12 l7">
                                <div class="map-wrapper ">
                                    
                                    <div id="map" class="card-panel col s12"></div>
                                </div>
                            </div> <!-- Map end -->
                            {{ csrf_field() }}
                            <div class="col s12 l5">
                                <div class="clearfix card-panel grey lighten-5 cform-wrapper">
                                    <span>Information sur le trajet</span>
                                    <div class="input-field">
                                        <input id="villeDepart" type="text" name="villeDepart" class="validate input-box" onchange="marqueur()">
                                        <label for="villeDepart" class="input-label">Adresse de départ :</label>
                                        <input id="villeDepartHidden" name="villeDepartHidden" type="hidden" value="">
                                    </div>
                                    <div class="input-field">
                                        <input id="villeArrivee" type="text" name="villeArrivee" class="validate input-box" onchange="marqueur()">
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
                                    <span>Information sur le colis</span>
                                    <div class="input-field">
                                        <input id="prix" type="number" name="prix" class="validate input-box" onchange="marqueur()" step="0.01">
                                        <label for="prix" class="input-label">Prix de la livraison (€) :</label>
                                    </div>
                                    <div class="input-field">
                                        <textarea id="description" type="text" name="description" class="validate input-box" onchange="marqueur()"></textarea>
                                        <label for="description" class="input-label">Description :</label>
                                    </div>
                                    <div class="input-field">
                                        <input id="poids" type="number" name="poids" class="validate input-box" onchange="marqueur()">
                                        <label for="poids" class="input-label">Poids (g) :</label>
                                    </div>
                                    <div class="input-field">
                                        <input id="longueur" type="number" name="longueur" class="validate input-box" onchange="marqueur()">
                                        <label for="longueur" class="input-label">Longueur (cm) :</label>
                                    </div>
                                    <div class="input-field">
                                        <input id="largeur" type="number" name="largeur" class="validate input-box" onchange="marqueur()">
                                        <label for="largeur" class="input-label">Largeur (cm) :</label>
                                    </div>
                                    <div class="input-field">
                                        <input id="hauteur" type="number" name="hauteur" class="validate input-box" onchange="marqueur()">
                                        <label for="hauteur" class="input-label">Hauteur (cm) :</label>
                                    </div>
                                        <label>Description :</label>
                                    <div class="input-field">
                                        <textarea id="description" type="text" name="description" class="validate input-box" onchange="marqueur()"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" id="btProposer" disabled>
                    </form>
                </div>
            </div>
            <div class="section-call-to-area">
                <div class="container">
                    <div class="row">
                        <a href="#home" class="btn-floating btn-large button-middle call-to-home section-call-to-btn animated btn-up btn-hidden" data-section="#home">
                        <i class="mdi-navigation-expand-less"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

    <script src="https://maps.googleapis.com/maps/api/js?signed_in=true&sensor=false&amp;libraries=places&callback=initMap&key=AIzaSyCVpvFQSuDA3GaSh4dj15u5IoXTHLLsqDY" async defer></script>
@endsection