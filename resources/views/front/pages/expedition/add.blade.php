@extends('layouts.app', [ 
'menu_style' => 'static', 
'page_title' => 'DropZone - Ajout expedition',
'includesJs' => ['/js/addexpedition.js'],
'includesCss' => ['/css/pages/expeditions.css']])
@section('content')

<script>
    function calcVolume() {
        $("#volume").val((parseFloat($("#longueur").val()) * parseFloat($("#largeur").val()) * parseFloat($("#hauteur").val())) / 1000000);
        if ($("#volume").val() != "") {
            $('[for="volume"]').addClass("active");
        }
    }
</script>

        <section id="contenuSection" class="scroll-section root-sec brand-bg padd-tb-60 contact-wrap grey lighten-3">
            @if(session('add'))
                <div>
                    <div class="alert center" onclick="this.parentElement.style.display='none';" style="background-color:#fcf4c9; color:darkorange; padding-top:3px; padding-bottom:3px;">
                        <i class="mdi mdi-check"></i> 
                        <strong>Expédition ajouté avec succès !</strong>
                    </div>
                </div>
            @endif
            @if(session('error') || $errors->count()>0)
                <div>
                    <div class="alert center" onclick="this.parentElement.style.display='none';" style="background-color:#fad5d5; color:#a94442; padding-top:3px; padding-bottom:3px;">
                        <i class="mdi mdi-close"></i> 
                        <strong>Vous devez remplir tous les champs.</strong>
                    </div>
                </div>
            @endif
            <br>
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
                                    <h3 class="about-subtitle">Proposer une expédition de colis</h3>
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
                                    <h3 class="about-subtitle">Information sur le colis</h3>
                                    <div class="input-field">
                                        <input id="prix" type="number" name="prix" class="validate input-box" step="0.01" required>
                                        <label for="prix" class="input-label">Prix de la livraison (€) :</label>
                                    </div>
                                    <div class="input-field">
                                        <textarea id="description" type="text" name="description" class="validate materialize-textarea" required></textarea>
                                        <label for="description" class="input-label">Description du colis :</label>
                                    </div>
                                    <div class="input-field">
                                        <input id="longueur" type="number" name="longueur" class="validate input-box" onchange="calcVolume()" required>
                                        <label for="longueur" class="input-label">Longueur (cm) :</label>
                                    </div>
                                    <div class="input-field">
                                        <input id="hauteur" type="number" name="hauteur" class="validate input-box" onchange="calcVolume()" required>
                                        <label for="hauteur" class="input-label">Hauteur (cm) :</label>
                                    </div>
                                    <div class="input-field">
                                        <input id="largeur" type="number" name="largeur" class="validate input-box" onchange="calcVolume()" required>
                                        <label for="largeur" class="input-label">Largeur (cm) :</label>
                                    </div>
                                    <div class="input-field">
                                        <input id="poids" type="number" name="poids" class="validate input-box" step="0.1" required>
                                        <label for="poids" class="input-label">Poids (kg) :</label>
                                    </div>
                                    <div class="input-field">
                                        <input id="volume" type="number" name="volume" class="validate input-box" step="0.00000001" required>
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