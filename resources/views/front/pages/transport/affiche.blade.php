@extends('layouts.app', [
'menu_style' => 'static',
'page_title' => 'DropZone - Affiche du transport',
'includesJs' => [''],
'includesCss' => ['']])
@section('content')
    <style>
        body{
            color:black;
            text-align:center;
        }
        h2{
            font-size:2.5em !important;
            margin-top:-20px;
            color:cornflowerblue;
        }
        textarea:focus {
            border-bottom: 1px solid white !important;
            -webkit-box-shadow: 0 1px 0 0 white !important;
            -moz-box-shadow: 0 1px 0 0 white !important;
            box-shadow: 0 1px 0 0 white !important;
        }
        input:focus {
            border-bottom: 1px solid white !important;
            -webkit-box-shadow: 0 1px 0 0 white !important;
            -moz-box-shadow: 0 1px 0 0 white !important;
            box-shadow: 0 1px 0 0 white !important;
        }
    </style>

<section id="contenuSection" class="scroll-section root-sec padd-tb-60 team-wrap">
    <h2>Détail et réservation du transport</h2>
    <div class="row">
        <div class="col s12 l6 push-l1 ">
            <div class="row deep-orange lighten-4">
                <h3>   </h3>
                <div id="trajet">
                    <h4>Trajet</h4>
                    <div> {{ $depart->ville->name }} -> {{ $fin->ville->name }}</div>
                    @if(count($etapes) != 2)
                        <div>
                            Les villes étapes :
                            @foreach($etapes as $etape)
                                @if($etape->ville_position!=1 && $etape->ville_position!=7)
                                    {{$etape->ville->name}}
                                @endif
                            @endforeach
                        </div>
                    @endif


                </div>
            </div><br>
            <div class="row blue lighten-2">
                <h4>Information</h4>
                @if($transport->natureTransport == "1")
                    <div>
                        <div id="nature">Transport régulier : {{$transport->frequency}}</div>
                        <div id="date">Date de début : <i>{{ Date::parse($transport->regularyBeginningDate)->format('l j F') }}<br></i> Date de fin : <i>{{ Date::parse($transport->regularyEndingDate)->format('l j F') }}</i></div>
                    </div>
                @else
                    <div>
                        <div id="nature">Transport occasionnel</div>
                        <div id="date">Départ le {{ Date::parse($transport->beginningDate)->format('l j F') }} à {{ Date::parse($transport->beginningHour)->format('H:i') }}.</div>
                    </div>
                @endif
                <div id="detour">Detour maximum : {{$transport->detourRetirMax}}km</div>
                <div id="autoroute">Autoroute : 
                    @if($transport->withHighway == true)
                        Oui
                    @else
                        Non
                    @endif
                </div>
            </div>
        </div>
        <div class="col s12 l3 push-l2 cyan lighten-2">
            <h3>Conducteur</h3>
            @if($transport->user->picLink==null)
                <img src="/images/profile/icon-{{$transport->user->sexe}}.png" width="35%" class="responsive-img circle" alt="">
            @else
                <img src="/images/profile/{{$transport->user->picLink}}" width="35%" class="responsive-img circle" alt="">
            @endif
            <div id="nomConducteur"><a href="/user/{{$transport->user->id}}">{{$transport->user->firstName}}</a> - {{$age}} ans</div>
            <div id="etoile"><i class="mdi mdi-star icon-size yellow-text" aria-hidden="true"></i> 3.5/5 - 43 avis</div>
            <img style="width: 70%; max-height: 100px;" src="/images/vehicles/{{ $transport->vehicule->vehiculetype->name }}.svg"><br>
            <h3 class="black-text">{{ $transport->vehicule->marque }} {{ $transport->vehicule->modele }}</h3>
            <table class="bordered striped centered" style="margin-top: 5px;">
                <tbody>
                <tr>
                    <td>Longueur Max.:</td>
                    <td>
                    @if($transport->longMax && $transport->longMax > 0)
                    {{ $transport->longMax }} cm
                    @elseif($transport->vehicule->longMax > 0)
                    {{ $transport->vehicule->longMax }} cm
                    @else
                    <i><b>NR.</b></i>
                    @endif
                    </td>
                </tr>
                <tr>
                    <td>Hauteur Max.:</td>
                    <td>
                    @if($transport->hautMax && $transport->hautMax > 0)
                    {{ $transport->hautMax }} cm
                    @elseif($transport->vehicule->hautMax > 0)
                    {{ $transport->vehicule->hautMax }} cm
                    @else
                    <i><b>NR.</b></i>
                    @endif
                    </td>
                </tr>
                <tr>
                    <td>Largeur Max.:</td>
                    <td>
                    @if($transport->largMax && $transport->largMax > 0)
                    {{ $transport->largMax }} cm
                    @elseif($transport->vehicule->largMax > 0)
                    {{ $transport->vehicule->largMax }} cm
                    @else
                    <i><b>NR.</b></i>
                    @endif
                    </td>
                </tr>
                <tr>
                    <td>Poid Max.:</td>
                    <td>
                    @if($transport->poidMax && $transport->poidMax > 0)
                    {{ $transport->poidMax }} kg
                    @elseif($transport->vehicule->poidMax > 0)
                    {{ $transport->vehicule->poidMax }} kg
                    @else
                    <i><b>NR.</b></i>
                    @endif
                    </td>
                </tr>
                <tr>
                    <td>Volume Max.:</td>
                    <td>
                    @if($transport->volume && $transport->volume > 0)
                    {{ $transport->volume }} kg
                    @elseif($transport->vehicule->volume > 0)
                    {{ $transport->vehicule->volume }} kg
                    @else
                    <i><b>NR.</b></i>
                    @endif
                    </td>
                </tr>
                </tbody>
            </table>
            <br>
        </div>
    </div>
</section>

<section class="scroll-section root-sec padd-tb-60 team-wrap blue">
    <div class="row">
        <h2 class="reservation white-text">Réservation du transport</h2>
        <form class="reservation col s12 push-m2 m8 push-l3 l6">
            <div class="row">
                <div class="input-field">
                    <textarea id="message" class="validate materialize-textarea white-text"></textarea>
                    <label for="message" class="white-text">Description de votre colis</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input id="prix" type="text" class="validate white-text">
                    <label for="prix" class="white-text">Prix proposé</label>
                </div>
            </div>
            <p class="center-align"><button id="btProposer" type="submit" class=" btn-large white"><i class="mdi mdi-cube-send right"></i>Proposer</button></p>
        </form>
    </div>
</section>
@endsection