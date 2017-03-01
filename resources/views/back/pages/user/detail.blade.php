@extends('back.app') @section('content')

<div class="row">
    <div class="col-md-8">
        <div class="panel">
            <header class="panel-heading">
                Profil
            </header>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 text-center">
                        <h3>{{ $actualUser->firstName }} {{ $actualUser->lastName }}</h3>
                        <img style="max-width: 100%;" class="img-circle" src="/images/profile/{{ $actualUser->picLink }}"></img>
                    </div>
                </div>
                <div style="margin-top: 15px;" class="row">
                    <div class="col-md-2 col-md-offset-5 text-center">
                        <h4>{{ $actualUser->birthday }}</h4>
                    </div>
                </div>
                <div style="margin-top: 15px;" class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        {{ $actualUser->description }}
                    </div>
                </div>
                <div style="margin: 20px;"></div>
                <!-- Panel Vehicules -->
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    @foreach($actualUser->vehicules as $vehicule)
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading{{ $vehicule->id }}">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $vehicule->id }}" aria-expanded="true" aria-controls="collapse{{ $vehicule->id }}">
                                {{ $vehicule->marque }} {{ $vehicule->modele }}
                                </a>
                                <div class="pull-right"><img style="width: auto; height: 30px;" src="/images/vehicles/{{ $vehicule->vehiculetype->name }}.svg"></div>
                                <div class="clearfix"></div>
                            </h4>
                        </div>
                        <div id="collapse{{ $vehicule->id }}" class="panel-collapse collapse @if($vehicule->isDefault) in @endif" role="tabpanel" aria-labelledby="heading{{ $vehicule->id }}">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <img style="width: 50%; height: auto;" src="/images/vehicles/{{ $vehicule->vehiculetype->name }}.svg">
                                    </div>
                                    <div class="col-md-6 col-md-offset-2">
                                    <b>Marque: </b> {{ $vehicule->marque }}<br>
                                    <b>Modèle: </b> {{ $vehicule->modele }}<br>
                                    @if($vehicule->longMax)
                                    <b>Longueur Max (cm): </b> {{ $vehicule->longMax }} @else
                                    <b>Longueur Max (cm): </b>
                                    <font color="red">Non renseigné.</font>
                                    @endif
                                    <br> @if($vehicule->hautMax)
                                    <b>Hauteur Max (cm): </b> {{ $vehicule->hautMax }} @else
                                    <b>Hauteur Max (cm): </b>
                                    <font color="red">Non renseigné.</font>
                                    @endif
                                    <br> 
                                    @if($vehicule->largMax)
                                    <b>Largeur Max (cm): </b> {{ $vehicule->largMax }} @else
                                    <b>Largeur Max (cm): </b>
                                    <font color="red">Non renseigné.</font>
                                    @endif
                                    <br> 
                                    @if($vehicule->poidMax)
                                    <b>Poid Max (kg): </b> {{ $vehicule->poidMax }} @else
                                    <b>Poid Max (kg): </b>
                                    <font color="red">Non renseigné.</font>
                                    @endif
                                    <br> 
                                    @if($vehicule->volume)
                                    <b>Volume Max (cm³): </b> {{ $vehicule->volume }} @else
                                    <b>Volume Max (cm³): </b>
                                    <font color="red">Non renseigné.</font>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Fin Panel Vehicules -->
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel">
            <header class="panel-heading">
                Informations
            </header>
            <div class="panel-body">
                <table class="table table-striped">
                    <tr>
                        <th>Login</th>
                        <td>{{ $actualUser->login }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $actualUser->email }}</td>
                    </tr>
                    <tr>
                        <th>Facebook ID</th>
                        <td>@if($actualUser->facebookID) {{ $actualUser->facebookID }} @else <span class="badge bg-red">Pas lié</span> @endif</td>
                    </tr>
                    <tr>
                        <th>Sexe</th>
                        <td>@if($actualUser->sexe == "f") Femme @else Homme @endif</td>
                    </tr>
                    <tr>
                        <th>Aide au chargement</th>
                        <td>@if($actualUser->helperOption) <span class="badge bg-green">Oui</span> @else <span class="badge bg-red">Non</span> @endif</td>
                    </tr>
                    <tr>
                        <th>Transporteur</th>
                        <td>@if($actualUser->transportOption) <span class="badge bg-green">Oui</span> @else <span class="badge bg-red">Non</span> @endif</td>
                    </tr>
                    <tr>
                        <th>Validé</th>
                        <td>@if($actualUser->isChecked) <span class="badge bg-green">Oui</span> @else <span class="badge bg-red">Non</span> @endif</td>
                    </tr>
                    <tr>
                        <th>Bannis</th>
                        <td>@if($actualUser->isBanned) <span class="badge bg-green">Oui</span> @else <span class="badge bg-red">Non</span> @endif</td>
                    </tr>
                    <tr>
                        <th>Téléphone</th>
                        <td>{{ $actualUser->phone }}</td>
                    </tr>
                    <tr>
                        <th>Data inscription</th>
                        <td>{{ $actualUser->created_at }}</td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <th>Nombre de véhicules</th>
                        <td><span class="badge bg-info">{{ $actualUser->vehicules->count() }}</span></td>
                    </tr>
                    <tr>
                        <th>Nombre de transports en attentes</th>
                        <td><span class="badge bg-info"> {{ $actualUser->transportsWaiting->count() }} </span></td>
                    </tr>
                    <tr>
                        <th>Nombre de transports effectués</th>
                        <td><span class="badge bg-info">{{ $actualUser->transportsOK->count() }}</span></td>
                    </tr>
                    <tr>
                        <th>Nombre d'expeditions en attentes</th>
                        <td><span class="badge bg-info"> ??? </span></td>
                    </tr>
                    <tr>
                        <th>Nombre d'expeditions effectuées</th>
                        <td><span class="badge bg-info">{{ $actualUser->expeditions->count() }}</span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel">
            <header class="panel-heading">
                Transports
            </header>
            <div class="panel-body">
                @foreach($actualUser->transports as $transport)
                @if($transport->natureTransport)
                    @if($transport->regularyEndingDate< date( 'Y-m-d H:i:s')) 
                        <?php $color="rgba(0, 255, 0, 0.2)" ; ?>
                    @else
                        <?php $color = "rgba(0, 0, 255, 0.2)"; ?>
                    @endif 
                @else 
                    @if($transport->beginningDate < date( 'Y-m-d H:i:s')) 
                        <?php $color="rgba(0, 255, 0, 0.2)" ; ?>
                    @else
                        <?php $color = "rgba(0, 0, 255, 0.2)"; ?>
                    @endif
                @endif
                <div style="background-color: {{ $color }}; margin-bottom: 5px; border-radius: 5px; padding: 3px; color: #666666;">
                    <div class="text-center">
                        <h4><b>{{ $transport->villeDepart->ville->name }} </b> <span style="margin: 10px">&#8620;</span> <b> {{ $transport->villeArrivee->ville->name }}</b></h4>
                        @if($transport->natureTransport)
                            qsd
                        @else
                            <div><b>Date départ:</b> {{ $transport->beginningDate }}</div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel">
            <header class="panel-heading">
                Expeditions
            </header>
            <div class="panel-body">
                qsd
            </div>
        </div>
    </div>
</div>
@endsection