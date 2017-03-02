@extends('layouts.app', [ 'menu_style' => 'static', 'page_title' => 'DropZone - Mes véhicules', 'includesJs' => [], 'includesCss'
=> ['/css/pages/vehicules.css']] ) @section('content')

<div id="background">
    <section id="vehiculeList" class="scroll-section black-text root-sec padd-tb-55 contact-wrap">
        <div class="row">
            <div class="col m6 offset-m3">
                <h2>MES VEHICULES</h2>
                <h3>Voici la liste des véhicules ! Ici, vous pouvez ajouter, modifier, supprimer et mettre par défaut des véhicules !</h3>
                <ul class="collapsible" style="border-radius: 3px;" data-collapsible="accordion">
                    @foreach(Auth::user()->vehicules as $vehicule)
                    <li>
                        <div class="collapsible-header active">{{ $vehicule->marque }} {{ $vehicule->modele }}</div>
                        <div class="collapsible-body">
                            <div class="row">
                                <div class="col m4 align-center">
                                    <img style="width: 70%;" src="/images/vehicles/{{ $vehicule->vehiculetype->name }}.svg">
                                </div>
                                <div class="col m6 offset-m2">
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
                                    <br>
                                    <a class="waves-effect waves-light btn-floating green" href="{{ route('user_vehicule_edit', array('vehicule' => $vehicule->id)) }}"><i class="mdi mdi-clipboard-text"></i></a>
                                    @if($vehicule->isDefault == 1)
                                    <span class="waves-effect waves-light btn-floating grey" disabled><i class="mdi mdi-check-all"></i></span>
                                    @else
                                    <a class="waves-effect waves-light btn-floating blue" href="{{ url('user/myvehicules/setDefault/'.$vehicule->id) }}"><i class="mdi mdi-check"></i></a>
                                    @endif
                                    <a class="waves-effect waves-light btn-floating red" href="{{ route('user_vehicule_delete', array('vehicule' => $vehicule->id)) }}"><i class="mdi mdi-close"></i></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
</div>
@endsection