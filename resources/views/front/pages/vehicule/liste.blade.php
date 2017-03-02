@extends('layouts.app', [ 'menu_style' => 'static', 'page_title' => 'DropZone - Mes véhicules', 'includesJs' => ['/js/components/accordion.min.js'], 'includesCss' => ['/css/components/accordion.gradient.min.css']] ) @section('content')

<section id="contact" class="scroll-section root-sec brand-bg padd-tb-120 contact-wrap">
    <div class="row">
        <div class="col m4 offset-m2 center-align">
            <h2>Mes véhicules</h2>
        </div>
        <div class="col m4 center-align valign-wrapper">
            <img src="/images/rocket.svg" class="valign" style="width: 100%; max-height: 250px;">
        </div>
    </div>
</section>

<section id="contact" class="scroll-section black-text root-sec padd-tb-120 contact-wrap">
    sdfsdf
</section>

<div id="profile" class="landing_pages_item">
    <div class="landing_form">
        <div class="uk-form">
            <fieldset data-uk-margin>
                <legend style="color: #3498db">Mes véhicules</legend>
            </fieldset>
        </div>
        @if(!Auth::user()->vehicules->count())
        <div class="uk-alert uk-alert-info"> Aucun véhicule !</div>
        @endif @if(session('edit'))
        <div class="uk-alert uk-alert-success"> Véhicule sauvegardé ! </div>
        @endif @if(session('add'))
        <div class="uk-alert uk-alert-success"> Véhicule ajouté !</div>
        @endif
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
                        <b>Longueur Max (cm): </b> {{ $vehicule->longMax }} @else
                        <b>Longueur Max (cm): </b>
                        <font color="red">Non renseigné.</font>
                        @endif
                        <br> @if($vehicule->hautMax)
                        <b>Hauteur Max (cm): </b> {{ $vehicule->hautMax }} @else
                        <b>Hauteur Max (cm): </b>
                        <font color="red">Non renseigné.</font>
                        @endif
                        <br> @if($vehicule->largMax)
                        <b>Largeur Max (cm): </b> {{ $vehicule->largMax }} @else
                        <b>Largeur Max (cm): </b>
                        <font color="red">Non renseigné.</font>
                        @endif
                        <br> @if($vehicule->poidMax)
                        <b>Poid Max (kg): </b> {{ $vehicule->poidMax }} @else
                        <b>Poid Max (kg): </b>
                        <font color="red">Non renseigné.</font>
                        @endif
                        <br> @if($vehicule->volume)
                        <b>Volume Max (cm³): </b> {{ $vehicule->volume }} @else
                        <b>Volume Max (cm³): </b>
                        <font color="red">Non renseigné.</font>
                        @endif
                    </div>
                </div>
                <a style="border-radius: 5px;" class="uk-button uk-button-primary" href="{{ route('user_vehicule_edit', array('vehicule' => $vehicule->id)) }}">Modifier</a> @if($vehicule->isDefault == 1)
                <span style="border-radius: 5px;" class="uk-button" disabled>Véhicule par défaut</span> @else
                <a style="border-radius: 5px;" class="uk-button uk-button-success" href="{{ url('user/myvehicules/setDefault/'.$vehicule->id) }}">Par défaut</a> @endif

                <a style="border-radius: 5px;" class="uk-button uk-button-danger" href="{{ route('user_vehicule_delete', array('vehicule' => $vehicule->id)) }}">Supprimer</a>
            </div>
            @endforeach
        </div>
        <a href="{{ route('user_vehicule_add') }}" class="uk-button uk-button-primary">Ajouter un véhicule</a>
    </div>
</div>

@endsection