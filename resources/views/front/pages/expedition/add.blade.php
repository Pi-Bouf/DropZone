@extends('layouts.app', [ 
'menu_style' => 'static', 
'page_title' => 'DropZone - Ajout expedition',
'includesJs' => ['/js/addexpedition.js','/js/components/accordion.min.js'],
'includesCss' => ['']])
@section('content')

<style>
    #map{
        height:400px;
    }
    input{
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
                                    <div class="input-field">
                                        <input id="villeDepart" type="text" name="villeDepart" class="validate input-box" onchange="marqueur()">
                                        <label for="villeDepart" class="input-label">Ville départ :</label>
                                        <input id="villeDepartHidden" name="villeDepartHidden" type="hidden" value="">
                                    </div>
                                    <div class="input-field">
                                        <input id="villeArrivee" type="text" name="villeArrivee" class="validate input-box" onchange="marqueur()">
                                        <label for="villeArrivee" class="input-label">Ville arrivée :</label>
                                        <input id="villeArriveeHidden" name="villeArriveeHidden" type="hidden" value="">
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <div class="row">                      
                            <div class="col s12 l7">
                                <div class="clearfix card-panel grey lighten-5 cform-wrapper">
                                    <div class="input-field">
                                        <input id="villeDepart" type="text" name="villeDepart" class="validate input-box" onchange="marqueur()">
                                        <label for="villeDepart" class="input-label">Ville départ :</label>
                                        <input id="villeDepartHidden" name="villeDepartHidden" type="hidden" value="">
                                    </div>
                                    <div class="input-field">
                                        <input id="villeArrivee" type="text" name="villeArrivee" class="validate input-box" onchange="marqueur()">
                                        <label for="villeArrivee" class="input-label">Ville arrivée :</label>
                                        <input id="villeArriveeHidden" name="villeArriveeHidden" type="hidden" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                    </form>
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
            </div>
        </section>

    <script src="https://maps.googleapis.com/maps/api/js?signed_in=true&sensor=false&amp;libraries=places&callback=initMap&key=AIzaSyCVpvFQSuDA3GaSh4dj15u5IoXTHLLsqDY" async defer></script>
@endsection