@extends('layouts.app', [ 'menu_style' => 'static', 'page_title' => 'DropZone - Mes véhicules', 'includesJs' => ['/js/components/accordion.min.js'], 'includesCss' => ['/css/components/accordion.gradient.min.css']] ) @section('content')

<div id="profile" class="landing_pages_item">
    <div class="landing_form">
        <div class="uk-form">
            <fieldset data-uk-margin>
                <legend style="color: #3498db">{{ $vehicule->marque }} {{ $vehicule->modele }}</legend>
            </fieldset>
            COUCOU
        </div>
    </div>
</div>

@endsection