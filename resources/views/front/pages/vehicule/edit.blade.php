@extends('layouts.app', [ 'menu_style' => 'static', 'page_title' => 'DropZone - Mes véhicules', 'includesJs' => ['/js/components/accordion.min.js'], 'includesCss' => ['/css/components/accordion.gradient.min.css']] ) @section('content')

<div id="profile" class="landing_pages_item">
    <div class="landing_form">
        <form class="uk-form">
            <fieldset data-uk-margin>
                <legend style="color: #3498db">{{ $vehicule->marque }} {{ $vehicule->modele }}</legend>
            </fieldset>
            <div class="uk-form-row">
                <label for="marque">Marque:</label> <input type="text" placeholder="Marque" id="marque" name="marque" value="{{ $vehicule->marque }}">
            </div>
            <div class="uk-form-row">
                <label for="modele">Modele:</label> <input type="text" placeholder="modele" id="modele" name="modele" value="{{ $vehicule->modele }}">
            </div>
        </form>
    </div>
</div>

@endsection