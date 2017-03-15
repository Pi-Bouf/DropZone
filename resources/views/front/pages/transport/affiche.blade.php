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
         .whited:focus{
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
         .blued:focus{
            border-bottom: 1px solid #2196F3  !important;
            -webkit-box-shadow: 0 1px 0 0 #2196F3  !important;
            -moz-box-shadow: 0 1px 0 0 #2196F3  !important;
            box-shadow: 0 1px 0 0 #2196F3  !important;
        }

        .bold{
            font-weight: bold;
            
        }

        #date{
            font-size:0.8em;
        }

    </style>

<section id="contenuSection" class="scroll-section root-sec padd-tb-60 team-wrap">
    <h2>Détail et réservation du transport</h2>
    <div class="row">
        <div class="col s12 l6 push-l1 ">
            <div class="row blue lighten-4">
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
            <div class="row blue lighten-4">
                <h4>Information</h4>
                @if($transport->natureTransport == "1")
                    <div>
                        <div id="nature">Transport régulier : {{$transport->frequency}}</div>
                        <div id="dateD">Date de début : <i>{{ Date::parse($transport->regularyBeginningDate)->format('l j F') }}<br></i> Date de fin : <i>{{ Date::parse($transport->regularyEndingDate)->format('l j F') }}</i></div>
                    </div>
                @else
                    <div>
                        <div id="nature">Transport occasionnel</div>
                        <div id="dateD">Départ le {{ Date::parse($transport->beginningDate)->format('l j F') }} à {{ Date::parse($transport->beginningHour)->format('H:i') }}.</div>
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
        <div class="col s12 l3 push-l2 blue lighten-4">
            <h3>Conducteur</h3>
            @if($transport->user->picLink==null)
                <img src="/images/profile/icon-{{$transport->user->sexe}}.png" width="35%" class="responsive-img circle" alt="">
            @else
                <img src="/images/profile/{{$transport->user->picLink}}" width="35%" class="responsive-img circle" alt="">
            @endif
            <div id="nomConducteur"><a href="/user/{{$transport->user->id}}" class="white-text">{{$transport->user->firstName}}</a> - {{$age}} ans</div>
            <div id="etoile"><i class="mdi mdi-star icon-size yellow-text" aria-hidden="true"></i> {{$note}}/5 - {{$nbnote}} avis</div>
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
        <form class="reservation col s12 push-m2 m8 push-l3 l6" method="POST" action="{{route('postaddreservation')}}">
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field">
                    <textarea id="message" name="message" class="validate materialize-textarea white-text whited" required></textarea>
                    <label for="message" class="white-text">Description de votre colis : (taille, qu'est ce que c'est, ...)</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input id="prix" type="number" name="prix" step="0.01" class="validate white-text" required>
                    <label for="prix" class="white-text">Prix proposé €</label>
                </div>
            </div>
            <input id="idT" name="idT" type="hidden" value="{{$transport->id}}">
            <p class="center-align"><button id="btProposer" type="submit" class=" btn-large white blue-text"><i class="mdi mdi-cube-send right"></i>Proposer</button></p>
        </form>
    </div>
</section>

<section class="scroll-section root-sec padd-tb-60 team-wrap white">
    <div class="row">
        <h2 class="reservation ">Questions : </h2>
        <form action="{{route('postaddquestion')}}" method="POST" class="reservation col s12 push-m2 m8 push-l3 l6">
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field">
                    <textarea id="message" name="message" class="validate materialize-textarea blue-text blued"></textarea>
                    <label for="message" class="blue-text ">Poser votre question ici</label>
                </div>
                <input id="idT" name="idT" type="hidden" value="{{$transport->id}}">
            </div>
            <p class="center-align"><button id="btProposer" type="submit" class=" btn-large blue white-text">Envoyer</button></p>
        </form>
    </div>
    <br><br>
    <div class="row">
        @if($transport->questionsTransport->count() != 0)
            <h3>Les questions</h3> <br>
            <table class="col s12 push-m2 m8 push-l3 l6">
                @foreach($transport->questionsTransport as $qu)
                    <tr>
                        <td class="col s2 center">
                            @if($qu->user->picLink==null)
                                <img src="/images/profile/icon-{{$qu->user->sexe}}.png" width="100%" class="responsive-img circle" alt="">
                            @else
                                <img src="/images/profile/{{$qu->user->picLink}}" width="100%" class="responsive-img circle" alt="">
                            @endif
                            <br>
                            <a href="/user/{{$qu->user->id}}">{{$qu->user->login}}</a>
                            <br><br>
                        </td>
                        <td class="col s10">
                            <div id="date">Publié le <span class="bold">{{Date::parse($qu->created_at)->format('l j F') }}</span></div>
                            <div>{{$qu->text}}</div>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            Pas de question pour le moment.
        @endif
    </div>
</section>
@endsection
