@extends('layouts.app', [ 'menu_style' => 'static', 'page_title' => 'DropZone - Mes véhicules', 'includesJs' => ['/js/components/accordion.min.js'], 'includesCss' => ['/css/components/accordion.gradient.min.css']] ) @section('content')

<div id="profile" class="landing_pages_item">
    <div class="landing_form">
        <form class="uk-form" method="post" action="{{ route('user_vehicule_edit_post', array('vehicule' => $vehicule->id)) }}">
            {{ csrf_field() }}
            <fieldset data-uk-margin>
                <legend style="color: #3498db">{{ $vehicule->marque }} {{ $vehicule->modele }}</legend>
            </fieldset>
            @if(session('success'))
            <div class="uk-alert uk-alert-success"> Véhicule sauvegardé ! </div>
            @endif @if(session('error'))
            <div class="uk-alert uk-alert-danger"> Erreur lors de l'enregistrement, veuillez vérifier les données !</div>
            @endif
            <div class="uk-form-row">
                <label for="marque">Marque:</label>
                <input type="text" placeholder="Marque..." id="marque" name="marque" value="{{ $vehicule->marque }}">
            </div>
            <div class="uk-form-row">
                <label for="modele">Modele:</label>
                <input type="text" placeholder="Modele..." id="modele" name="modele" value="{{ $vehicule->modele }}">
            </div>
            <div class="uk-form-row">
                <label for="longMax">Longueur Max. (cm):</label>
                <input type="number" step="any" placeholder="Longueur maximum..." id="longMax" name="longMax" value="{{ $vehicule->longMax }}">
            </div>
            <div class="uk-form-row">
                <label for="hautMax">Hauteur Max. (cm):</label>
                <input type="number" step="any" placeholder="Hauteur maximum..." id="hautMax" name="hautMax" value="{{ $vehicule->hautMax }}">
            </div>
            <div class="uk-form-row">
                <label for="largMax">Hauteur Max. (cm):</label>
                <input type="number" step="any" placeholder="Largeur maximum..." id="largMax" name="largMax" value="{{ $vehicule->largMax }}">
            </div>
            <div class="uk-form-row">
                <label for="poidMax">Poid Max. (kg):</label>
                <input type="number" step="any" placeholder="Hauteur maximum..." id="poidMax" name="poidMax" value="{{ $vehicule->poidMax }}">
            </div>
            <div class="uk-form-row">
                <label for="volume">Volume Max. (cm³):</label>
                <input type="number" step="any" placeholder="Hauteur maximum..." id="volume" name="volume" value="{{ $vehicule->volume }}">
            </div>
            <div class="uk-form-row">
                <button class="uk-button uk-button-primary">Modifier</button>
            </div>
        </form>
    </div>
</div>

@endsection