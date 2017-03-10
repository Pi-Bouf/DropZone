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

        
    </style>

<section id="contenuSection" class="scroll-section root-sec padd-tb-60 team-wrap">

    <div class="row">
        <div class="col s12 l6 push-l1 deep-orange lighten-4">
            <h3>Détails du voyage</h3>
            <div id="trajet">
                <h4>Trajet</h4>
                <div> {{ $depart->ville->name }} -> {{ $fin->ville->name }}</div>
                @if(count($etapes) != 2)
                    <div>
                        <i class="mdi mdi-subdirectory-arrow-right"></i>
                        @foreach($etapes as $etape)
                            @if($etape->ville_position!=1 && $etape->ville_position!=7)
                                {{$etape->ville->name}}
                            @endif
                        @endforeach
                        <i class="mdi mdi-subdirectory-arrow-right mdi-rotate-90"></i>
                    </div>
                @endif

                @if($transport->natureTransport == "1")
                                <div>
                                    Date de début : <i>{{ Date::parse($transport->regularyBeginningDate)->format('l j F') }}<br></i> Date de fin : <i>{{ Date::parse($transport->regularyEndingDate)->format('l j F') }}</i><br>{{ $transport->frequency }}
                                </div>
                            @else
                                <div>
                                    <h3>{{ Date::parse($transport->beginningDate)->format('l j F') }}<br>{{ Date::parse($transport->beginningHour)->format('H:i') }}</h3>
                                </div>
                @endif
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
@endsection
