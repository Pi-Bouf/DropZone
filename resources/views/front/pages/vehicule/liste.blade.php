@extends('layouts.app', [ 'menu_style' => 'static', 'page_title' => 'DropZone - Mes véhicules', 'includesJs' => ['/js/components/accordion.min.js'], 'includesCss' => ['/css/components/accordion.gradient.min.css']] ) @section('content')

<div id="profile" class="landing_pages_item">
    <div class="landing_form">
        <div class="uk-form">
            <fieldset data-uk-margin>
                <legend style="color: #3498db">Expedier un colis</legend>
            </fieldset>
        </div>

        <div class="uk-accordion" style="margin: 10px;" data-uk-accordion>
            @foreach(Auth::user()->vehicules as $vehicule)
            <h3 class="uk-accordion-title">{{ $vehicule->marque }} {{ $vehicule->modele }}</h3>
            <div class="uk-accordion-content">
                <div class="uk-grid">
                    <div class="uk-width-1-5">
                        <img style="width: 100%; height: auto;" src="/images/vehicles/{{ $vehicule->vehiculetype->name }}.svg">
                    </div>
                    <div class="uk-width-4-5">
                        <b>Marque: </b> {{ $vehicule->marque }}<br>
                        <b>Modèle: </b> {{ $vehicule->modele }}<br> @if($vehicule->longMax)
                        <b>Longueur Max: </b> {{ $vehicule->longMax }} @else
                        <b>Longueur Max: </b>
                        <font color="red">Non renseigné.</font>
                        @endif
                        <br> @if($vehicule->hautMax)
                        <b>Hauteur Max: </b> {{ $vehicule->hautMax }} @else
                        <b>Hauteur Max: </b>
                        <font color="red">Non renseigné.</font>
                        @endif
                        <br> @if($vehicule->volumeMax)
                        <b>Volume Max: </b> {{ $vehicule->volumeMax }} @else
                        <b>Volume Max: </b>
                        <font color="red">Non renseigné.</font>
                        @endif
                    </div>
                </div>
                <a style="border-radius: 5px;" class="uk-button uk-button-primary" href="{{ route('user_vehicule_edit', array('vehicule' => $vehicule->id)) }}">Modifier</a>
                @if($vehicule->isDefault == 1)
                    <span style="border-radius: 5px;" class="uk-button" disabled>Véhicule par défaut</span>
                @else
                    <a style="border-radius: 5px;" class="uk-button uk-button-success" href="{{ url('user/myvehicules/setDefault/'.$vehicule->id) }}">Par défaut</a>
                @endif

                <a style="border-radius: 5px;" class="uk-button uk-button-danger" href="">Supprimer</a>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection