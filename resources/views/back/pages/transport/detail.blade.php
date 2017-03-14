@extends('back.app') @section('content')
<style>
#timeline .timeline-item:after, #timeline .timeline-item:before {
  content: '';
  display: block;
  width: 100%;
  clear: both;
}

*, *:before, *:after {
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
}

#timeline {
  line-height: 1.5em;
  font-size: 14px;
  width: 90%;
  margin: 30px auto;
  position: relative;
  -webkit-transition: all 0.4s ease;
  -moz-transition: all 0.4s ease;
  -ms-transition: all 0.4s ease;
  transition: all 0.4s ease;
}
#timeline:before {
  content: "";
  width: 3px;
  height: 100%;
  background: #ee4d4d;
  left: 50%;
  top: 0;
  position: absolute;
}
#timeline:after {
  content: "";
  clear: both;
  display: table;
  width: 100%;
}
#timeline .timeline-item {
  margin-bottom: 50px;
  position: relative;
}
#timeline .timeline-item .timeline-icon {
  background: #ee4d4d;
  width: 50px;
  height: 50px;
  position: absolute;
  top: 0;
  left: 50%;
  overflow: hidden;
  margin-left: -23px;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  -ms-border-radius: 50%;
  border-radius: 50%;
}
#timeline .timeline-item .timeline-icon .step {
  position: relative;
  top: 14px;
  left: 19px;
  color: white;
  font-weight: bold;
  font-size: 20px;
}
#timeline .timeline-item .timeline-content {
  width: 45%;
  background: #fff;
  padding: 20px 20px 0px 20px;
  -webkit-box-shadow: 0 3px 0 rgba(0, 0, 0, 0.1);
  -moz-box-shadow: 0 3px 0 rgba(0, 0, 0, 0.1);
  -ms-box-shadow: 0 3px 0 rgba(0, 0, 0, 0.1);
  box-shadow: 0 3px 0 rgba(0, 0, 0, 0.1);
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  -ms-border-radius: 5px;
  border-radius: 5px;
  -webkit-transition: all 0.3s ease;
  -moz-transition: all 0.3s ease;
  -ms-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
#timeline .timeline-item .timeline-content h2 {
  padding: 15px;
  font-size: 14px;
  background: #ee4d4d;
  color: #fff;
  margin: -20px -20px 0 -20px;
  font-weight: 500;
  -webkit-border-radius: 3px 3px 0 0;
  -moz-border-radius: 3px 3px 0 0;
  -ms-border-radius: 3px 3px 0 0;
  border-radius: 3px 3px 0 0;
}
#timeline .timeline-item .timeline-content:before {
  content: '';
  position: absolute;
  left: 45%;
  top: 20px;
  width: 0;
  height: 0;
  border-top: 7px solid transparent;
  border-bottom: 7px solid transparent;
  border-left: 7px solid #ee4d4d;
}
#timeline .timeline-item .timeline-content.right {
  float: right;
}
#timeline .timeline-item .timeline-content.right:before {
  content: '';
  right: 45%;
  left: inherit;
  border-left: 0;
  border-right: 7px solid #ee4d4d;
}

@media screen and (max-width: 768px) {
  #timeline {
    margin: 30px;
    padding: 0;
  }
  #timeline:before {
    left: 0;
  }
  #timeline .timeline-item .timeline-content {
    width: 90%;
    float: right;
  }
  #timeline .timeline-item .timeline-content:before, #timeline .timeline-item .timeline-content.right:before {
    left: 10%;
    margin-left: -6px;
    border-left: 0;
    border-right: 7px solid #ee4d4d;
  }
  #timeline .timeline-item .timeline-icon {
    left: 0;
  }
}

</style>
<div class="row">
    <div class="col-md-8">
        <div class="panel">
            <header class="panel-heading">
                Transport
            </header>
            <div class="panel-body">
                <div class="text-center">
                    <h4><b>{{ $transport->villeDepart->ville->name }} </b> <span style="margin: 10px">&#8620;</span> <b> {{ $transport->villeArrivee->ville->name }}</b></h4>
                </div>

                <!-- Timeline begin here -->
                <div id="timeline">
                    @foreach($transport->etapes as $etape)
                    <div class="timeline-item">
                        <div class="timeline-icon">
                            <span class="step">{{ $etape->ville_position }}</span>
                        </div>
                        <div class="timeline-content @if($etape->ville_position %2 == 0) right @endif">
                            <h2>{{ $etape->ville->name }}</h2>
                            <p>
                                <b>Latitude: </b> {{ $etape->ville->latitude }}
                            </p>
                            <p>
                                <b>Latitude: </b> {{ $etape->ville->longitude }}
                            </p>                            
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Timeline ends here -->
                <div class="text-center" style="font-style: italic;">
                {{ $transport->information }}
                </div>
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
                        <th>Utilisateur</th>
                        <td><a href="{{ route('admin_user_detail', array('user' => $transport->user->id)) }}">{{ $transport->user->login }}</a></td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>@if($transport->natureTransport) Régulier @else Ponctuel @endif</td>
                    </tr>
                    @if($transport->natureTransport)
                    <tr>
                        <td>Date début</td>
                        <td>{{ $transport->regularyBeginningDate }}</td>
                    </tr>
                    <tr>
                        <td>Date fin</td>
                        <td>{{ $transport->regularyEndingDate }}</td>
                    </tr>
                    <tr>
                        <td>Fréquence</td>
                        <td>{{ $transport->frequency }}</td>
                    </tr> 
                    @else
                    <tr>
                        <td>Date départ</td>
                        <td>{{ $transport->beginningDate }}</td>
                    </tr>
                    <tr>
                        <td>Heure départ</td>
                        <td>{{ $transport->beginningHour }}</td>
                    </tr>
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
                    @endif
                </table>
            </div>
        </div>
        <div class="panel">
            <header class="panel-heading">
                Demandes
            </header>
            <div class="panel-body" id="noti-box">
                @if($transport->demandesTransport->count() == 0)
                <i>Aucune demande pour le moment.</i>
                @endif
                @foreach($transport->demandesTransport as $demande)
                <div class="alert @if($demande->isAccepted) alert-success @else alert-danger @endif">
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            @if($demande->user->picLink != NULL)
                            <img style="width: 50%;" class="img-circle" src="/images/profile/{{ $user->picLink }}"></img>
                            @else
                            <img src="/images/profile/icon-{{$user->sexe}}.png" width="50%" class="img-circle" alt="">
                            @endif
                        </div>
                        <div class="col-md-8 col-xs-12">
                        <strong>{{ $demande->cost }}€</strong> - {{ $demande->text }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection