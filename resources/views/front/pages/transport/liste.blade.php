@extends('layouts.app', [ 'menu_style' => 'scroll',
'includesJs' => [],
'page_title' => 'DropZone - Mes transports',
'includesCss' => [] ])
@section('content')

<style>
  .rating {
      overflow: hidden !important;
      display: inline-block !important;
      font-size: 0 !important;
      position: relative !important;
  }
  .rating-input {
      float: right !important;
      width: 16px !important;
      height: 16px !important;
      padding: 0 !important;
      margin: 0 0 0 -16px !important;
      opacity: 0 !important;
  }
  .rating:hover .rating-star:hover,
  .rating:hover .rating-star:hover ~ .rating-star,
  .rating-input:checked ~ .rating-star {
      background-position: 0 0 !important;
      border: 0px !important;
  }


[type="radio"]:not(:checked)+label:before, [type="radio"]:not(:checked)+label:after{
  border: 0px !important;
}
[type="radio"]:checked+label:after, [type="radio"].with-gap:checked+label:after{
  background-color:transparent !important;
  border: 0px !important;
}
  .rating-star,
  .rating:hover .rating-star {
      padding-left:0px !important;
      position: relative !important;
      float: right !important;
      display: block !important;
      width: 28px !important;
      height: 28px !important;
      background: url('http://kubyshkin.ru/samples/star-rating/star.png') 0 -28px !important;
      background-size: 28px auto !important;
  }



</style>

    <section id="about" class="scroll-section root-sec padd-tb-100-30  grey lighten-5">
      <h3 class="about-subtitle center-align">Mes transports</h3>
        <div class="container">
          <div class="row">
            <a href="{{ url('/addtransport') }}" class="waves-effect waves-light btn blue"><i class="mdi mdi-truck-delivery white-text right"></i> Ajouter</a>
            <ul class="collapsible" data-collapsible="accordion">
            @foreach(Auth::user()->transportsWaiting as $transport)
              <li>
                <div class="collapsible-header active black-text"> <div class=" green-text lighten-2 red-text lighten-2">
                  <span style="margin: 10px">{{ $transport->villeDepart->ville->name }}</span> &#10142; <span style="margin: 10px"> {{ $transport->villeArrivee->ville->name }} </span></div>

                </div>
                <div class="collapsible-body grey lighten-4">
                  <div class="row">
                    <div class="col s12 m12 l12 mg-b15">
                      @if($transport->natureTransport == 0)
                        <span class="black-text date-depart-transport">Départ le prévu le <span class="bold">{{ Date::parse($transport->beginningDate)->format('l j F Y') }}</span>  à <span class="bold">{{ $transport->beginningHour }}</span>.</span>
                      @else
                        <span class="black-text date-depart-transport">Voyage effectué régulièrement du <span class="bold">{{ Date::parse($transport->regularyBeginningDate)->format('l j F') }}</span>  au <span class="bold">{{ Date::parse($transport->regularyEndingDate)->format('l j F Y') }}</span>.</span>
                      @endif
                    </div>
                  </div>
                  <div class="row">
                    <div class="col s12 m4 l4">
                      <div class="person-info">
                        <h3 class="about-subtitle">Itinéraire prévu</h3>
                      </div>
                      <ul class="liste_ville black-text mg-b15">
                      @foreach($transport->etapes as $etape)
                        <li class="mg-t20">
                          @if($etape->ville_position == 1 || $etape->ville_position == 7)
                            <i class="mdi mdi-map-marker"></i>
                          @else
                            <i class="mdi mdi-subdirectory-arrow-right ville_Etape"></i>
                          @endif
                          {{ $etape->ville->name }}<br>
                        </li>
                      @endforeach
                      </ul>
                    </div>
                    <div class="col s12 m4 l4">
                      <h3 class="about-subtitle">Espace disponible</h3>
                      <div class="person-info">
                        <h5 class="black-text"><span>Véhicule :</span> {{ $transport->vehicule->marque }} {{ $transport->vehicule->modele }}</h5>

                        @if($transport->longMax > 0)
                          <h5 class="black-text"><span>Longueur :</span> {{ $transport->longMax }} cm</h5>
                        @elseif($transport->vehicule->longMax > 0)
                          <h5 class="black-text"><span>Longueur :</span> {{ $transport->vehicule->longMax}} cm</h5>
                        @else
                          <h5 class="black-text"><span>Longueur :</span> Non renseigné</h5>
                        @endif

                        @if($transport->hautMax > 0)
                          <h5 class="black-text"><span>Hauteur :</span> {{ $transport->hautMax }} cm</h5>
                        @elseif($transport->vehicule->hautMax > 0)
                          <h5 class="black-text"><span>Hauteur :</span> {{ $transport->vehicule->hautMax}} cm</h5>
                        @else
                          <h5 class="black-text"><span>Hauteur :</span> Non renseigné</h5>
                        @endif

                        @if($transport->largMax > 0)
                          <h5 class="black-text"><span>Largeur :</span> {{ $transport->largMax }} cm</h5>
                        @elseif($transport->vehicule->largMax > 0)
                          <h5 class="black-text"><span>Largeur :</span> {{ $transport->vehicule->largMax}} cm</h5>
                        @else
                          <h5 class="black-text"><span>Largeur :</span> Non renseigné</h5>
                        @endif

                        @if($transport->poidMax > 0)
                          <h5 class="black-text"><span>Poids Max :</span> {{ $transport->poidMax }} kg</h5>
                        @elseif($transport->vehicule->poidMax > 0)
                          <h5 class="black-text"><span>Poids Max :</span> {{ $transport->vehicule->poidMax}} kg</h5>
                        @else
                          <h5 class="black-text"><span>Poids Max :</span> Non renseigné</h5>
                        @endif

                        @if($transport->volume > 0)
                          <h5 class="black-text"><span>Volume :</span> {{ $transport->volume }} m³</h5>
                        @elseif($transport->vehicule->volume > 0)
                          <h5 class="black-text"><span>Volume :</span> {{ $transport->vehicule->volume}} m³</h5>
                        @else
                          <h5 class="black-text"><span>Volume :</span> Non renseigné</h5>
                        @endif
                      </div>
                    </div>
                    <div class="col s12 m4 l4">
                      <h3 class="about-subtitle">Détails</h3>
                      @if($transport->information)
                      <div class="black-text">
                        {{ $transport->information }}
                      </div>
                      @endif
                      <div class="person-info mg-t30">
                        <h5 class="black-text"><span>Détour possible :</span> {{ $transport->detourRetirMax }} km</h5>
                      </div>
                      @if($transport->withHighway == 1)
                      <div class="black-text mg-t20">
                        <i class="mdi mdi-highway small"></i>
                      </div>
                      @endif
                    </div>
                  </div>
                  <div class="row mg-t20">
                    <div class="col s12 m6 l6">
                      <span class="grey-text mg-t20">
                        Annonce déposée {{ Date::parse($transport->created_at)->format('l j F Y') }}.
                      </span>
                    </div>
                    <div class="col s12 m6 l6 right-align">
                        <a href="{{url('/transport/'.$transport->id)}}" class="mg-t20 waves-effect waves-light btn green"><i class="mdi mdi-information-variant white-text left"></i>Détail</a>
                        <a href="#delete_{{ $transport->id }}" class="mg-t20 waves-effect waves-light btn red"><i class="mdi mdi-delete white-text left"></i>Supprimer</a>
                    </div>

                    <div id="delete_{{ $transport->id }}" class="modal">
                      <div class="modal-content">
                        <h4>Confirmer la suppression</h4>
                        <p>Voulez-vous vraiment supprimer ce transport?</p>
                      </div>
                      <div class="modal-footer">
                        <a href="/user/deltransport/{{ $transport->id}}" class=" modal-action modal-close waves-effect red white-text waves-green btn-flat"><i class="mdi mdi-delete white-text left"></i>Supprimer</a>
                        <a href="#!" class="margin-r10 modal-action modal-close waves-effect green white-text waves-green btn-flat">Retour</a>
                      </div>
                    </div>
                  </div>


                    <div class="row mg-t20">
                      <div class="col s12 m12 l12 black-text">
                        <h3 class="about-subtitle">Demande(s) en attente(s)</h3>
                        @foreach($transport->demandesTransport as $demande)
                            @if($demande->isAccepted ==0)

                              <div class="row card blue lighten-3 demande-expe">
                                <div class="col s6 m2 l2 center-align">
                                  @if($demande->user->picLink==null)
                                    <img src="/images/profile/icon-{{$demande->user->sexe}}.png" width="50%" class="circle" alt="">
                                  @else
                                    <img src="{{$demande->user->picLink}}" width="50%" class="circle" alt="">
                                  @endif
                                </div>
                                <div class="col s6 m2 l2">
                                  <p>
                                    <a href="/user/{{$demande->user->id}}" target="blank">{{ $demande->user->login }}</a>
                                  </p>
                                  <p>
                                    <i class="mdi mdi-star icon-size yellow-text" aria-hidden="true"></i>
                                     {{$demande->user->note()}}/5 - {{$demande->user->nbNotes()}} avis
                                  </p>
                                </div>
                                <div class="col s6 m4 l4">
                                  <p>
                                    {{ $demande->text}}
                                  </p>
                                  <p>
                                    Prix : {{ $demande->cost }} €
                                  </p>
                                </div>
                                <div class="col s6 m4 l4 center-align" style="margin-top: 15px;">
                                  <a href="{{ route('confirmtransport', array("demande" => $demande->id)) }}" title="Accepter" class="btn-floating btn-large waves-effect waves-light green"><i class="mdi mdi-check"></i></a>
                                  <a href="{{ route('canceltransport', array("demande" => $demande->id)) }}" title="Refuser" class="btn-floating btn-large waves-effect waves-light red"><i class="mdi mdi-close"></i></a>
                                </div>
                            </div>
                            @endif

                          @endforeach
                        </div>
                      </div>

                      <div class="row mg-t20">

                        <div class="col s12 m12 l12 black-text">
                            <h3 class="about-subtitle">Demande(s) acceptée(s)</h3>
                            @foreach($transport->demandesTransport as $demande)
                              @if($demande->isAccepted == 3 || $demande->isAccepted == 2)
                                <div class="row card blue lighten-3 demande-expe">
                                      <div class="col s6 m2 l2 center-align">
                                        @if($demande->user->picLink==null)
                                          <img src="/images/profile/icon-{{$demande->user->sexe}}.png" width="50%" class="circle" alt="">
                                        @else
                                          <img src="{{$demande->user->picLink}}" width="50%" class="circle" alt="">
                                        @endif
                                      </div>
                                      <div class="col s6 m2 l3">
                                        <p>
                                          <a href="/user/{{$demande->user->id}}" target="blank">{{ $demande->user->login }}</a>
                                        </p>
                                        <p>
                                          <i class="mdi mdi-star icon-size yellow-text" aria-hidden="true"></i>
                                           {{$demande->user->note()}}/5 - {{$demande->user->nbNotes()}} avis
                                        </p>
                                        <p>
                                          @if($demande->user->phone)
                                            {{$demande->user->phone}}
                                          @else
                                            {{$demande->user->email}}
                                          @endif
                                        </p>
                                      </div>
                                      <div class="col s6 m4 l4">
                                        <p>
                                          {{ $demande->text}}
                                        </p>
                                        <p>
                                          Prix : {{ $demande->cost }} €
                                        </p>
                                      </div>
                                      @if($demande->isAccepted==3 && !is_null($demande->notation))
                                        <div class="col s6 m4 l3 center-align" style="margin-top: 15px;">
                                          Votre note :<br>
                                              {{$demande->notation->note}}
                                             /5<i class="mdi mdi-star icon-size yellow-text" aria-hidden="true"></i>
                                        </div>
                                      @else
                                        @if($demande->transport->natureTransport == 0)
                                          @if($demande->transport->beginningDate < date('Y-m-d H:i:s'))
                                            <div class="col s6 m4 l3 center-align" style="margin-top: 15px;">
                                              <a href="#note_{{ $demande->id }}" title="Noter cette expéditeur" class="btn-floating btn-large waves-effect waves-light purple lighten-1"><i class="mdi mdi-account-star"></i></a>
                                            </div>
                                          @endif
                                        @else
                                          @if($demande->transport->regularyBeginningDate < date('Y-m-d H:i:s'))
                                            <div class="col s6 m4 l3 center-align" style="margin-top: 15px;">
                                              <a href="#note_{{ $demande->id }}" title="Noter cette expéditeur" class="btn-floating btn-large waves-effect waves-light purple lighten-1"><i class="mdi mdi-account-star"></i></a>
                                            </div>
                                          @endif
                                        @endif
                                      @endif
                              </div>

                              <div id="note_{{ $demande->id }}" class="modal">
                                <form method="POST" id="formAjoutExpedition" action="{{route('postnotetransport', array('demande' => $demande->id))}}">
                                  <div class="modal-content">
                                    <h4>Noter cet expéditeur :</h4>
                                    {{ csrf_field() }}
                                    <div class="input-field">
                                      <label for="message">Votre message :</label>
                                      <textarea type="text" class="materialize-textarea" id="message" name="message" required ></textarea><br>
                                    </div>
                                    <label for="note">Note : </label>
                                    <span class="rating">
                                      <input type="radio" class="rating-input"
                                              id="rating-{{$demande->id}}-input-1-5" name="rating-input-1" value="5" required/>
                                      <label for="rating-{{$demande->id}}-input-1-5" class="rating-star"></label>
                                      <input type="radio" class="rating-input"
                                              id="rating-{{$demande->id}}-input-1-4" name="rating-input-1" value="4"/>
                                      <label for="rating-{{$demande->id}}-input-1-4" class="rating-star"></label>
                                      <input type="radio" class="rating-input"
                                              id="rating-{{$demande->id}}-input-1-3" name="rating-input-1" value="3"/>
                                      <label for="rating-{{$demande->id}}-input-1-3" class="rating-star"></label>
                                      <input type="radio" class="rating-input"
                                              id="rating-{{$demande->id}}-input-1-2" name="rating-input-1" value="2"/>
                                      <label for="rating-{{$demande->id}}-input-1-2" class="rating-star"></label>
                                      <input type="radio" class="rating-input"
                                              id="rating-{{$demande->id}}-input-1-1" name="rating-input-1" value="1"/>
                                      <label for="rating-{{$demande->id}}-input-1-1" class="rating-star"></label>
                                    </span>
                                  </div>
                                  <div class="modal-footer">
                                    <button class=" modal-action modal-close waves-effect green white-text waves-green btn-flat"><i class="mdi mdi-star yellow-text left"></i>Noter ! </button>
                                    <a href="#!" class="margin-r10 modal-action modal-close waves-effect red white-text waves-green btn-flat">Retour</a>
                                  </div>
                                </form>
                              </div>
                              @endif
                            @endforeach
                          </div>



                  </div>



                </div>
              </li>
            @endforeach

            @foreach(Auth::user()->transportsOK as $transport)
              <li>
                <div class="collapsible-header active black-text"> <div class=" red-text lighten-2">
                  <span style="margin: 10px">{{ $transport->villeDepart->ville->name }}</span> &#10142; <span style="margin: 10px"> {{ $transport->villeArrivee->ville->name }} </span></div>

                </div>
                <div class="collapsible-body grey lighten-4">
                  <div class="row">
                    <div class="col s12 m12 l12 mg-b15">
                      @if($transport->natureTransport == 0)
                        <span class="black-text date-depart-transport">Départ le prévu le <span class="bold">{{ Date::parse($transport->beginningDate)->format('l j F Y') }}</span>  à <span class="bold">{{ $transport->beginningHour }}</span>.</span>
                      @else
                        <span class="black-text date-depart-transport">Voyage effectué régulièrement du <span class="bold">{{ Date::parse($transport->regularyBeginningDate)->format('l j F') }}</span>  au <span class="bold">{{ Date::parse($transport->regularyEndingDate)->format('l j F Y') }}</span>.</span>
                      @endif
                    </div>
                  </div>
                  <div class="row">
                    <div class="col s12 m4 l4">
                      <div class="person-info">
                        <h3 class="about-subtitle">Itinéraire prévu</h3>
                      </div>
                      <ul class="liste_ville black-text">
                      @foreach($transport->etapes as $etape)
                        <li class="mg-t20">
                          @if($etape->ville_position == 1 || $etape->ville_position == 7)
                            <i class="mdi mdi-map-marker"></i>
                          @else
                            <i class="mdi mdi-subdirectory-arrow-right ville_Etape"></i>
                          @endif
                          {{ $etape->ville->name }}<br>
                        </li>
                      @endforeach
                      </ul>
                    </div>
                    <div class="col s12 m4 l4">
                      <h3 class="about-subtitle">Espace disponible</h3>
                      <div class="person-info">
                        <h5 class="black-text"><span>Véhicule :</span> {{ $transport->vehicule->marque }} {{ $transport->vehicule->modele }}</h5>

                        @if($transport->longMax > 0)
                          <h5 class="black-text"><span>Longueur :</span> {{ $transport->longMax }} cm</h5>
                        @elseif($transport->vehicule->longMax > 0)
                          <h5 class="black-text"><span>Longueur :</span> {{ $transport->vehicule->longMax}} cm</h5>
                        @else
                          <h5 class="black-text"><span>Longueur :</span> Non renseigné</h5>
                        @endif

                        @if($transport->hautMax > 0)
                          <h5 class="black-text"><span>Hauteur :</span> {{ $transport->hautMax }} cm</h5>
                        @elseif($transport->vehicule->hautMax > 0)
                          <h5 class="black-text"><span>Hauteur :</span> {{ $transport->vehicule->hautMax}} cm</h5>
                        @else
                          <h5 class="black-text"><span>Hauteur :</span> Non renseigné</h5>
                        @endif

                        @if($transport->largMax > 0)
                          <h5 class="black-text"><span>Largeur :</span> {{ $transport->largMax }} cm</h5>
                        @elseif($transport->vehicule->largMax > 0)
                          <h5 class="black-text"><span>Largeur :</span> {{ $transport->vehicule->largMax}} cm</h5>
                        @else
                          <h5 class="black-text"><span>Largeur :</span> Non renseigné</h5>
                        @endif

                        @if($transport->poidMax > 0)
                          <h5 class="black-text"><span>Poids Max :</span> {{ $transport->poidMax }} kg</h5>
                        @elseif($transport->vehicule->poidMax > 0)
                          <h5 class="black-text"><span>Poids Max :</span> {{ $transport->vehicule->poidMax}} kg</h5>
                        @else
                          <h5 class="black-text"><span>Poids Max :</span> Non renseigné</h5>
                        @endif

                        @if($transport->volume > 0)
                          <h5 class="black-text"><span>Volume :</span> {{ $transport->volume }} m³</h5>
                        @elseif($transport->vehicule->volume > 0)
                          <h5 class="black-text"><span>Volume :</span> {{ $transport->vehicule->volume}} m³</h5>
                        @else
                          <h5 class="black-text"><span>Volume :</span> Non renseigné</h5>
                        @endif
                      </div>
                    </div>
                    <div class="col s12 m4 l4">
                      <h3 class="about-subtitle">Détails</h3>
                      @if($transport->information)
                      <div class="black-text">
                        {{ $transport->information }}
                      </div>
                      @endif
                      <div class="person-info mg-t30">
                        <h5 class="black-text"><span>Détour possible :</span> {{ $transport->detourRetirMax }} km</h5>
                      </div>
                      @if($transport->withHighway == 1)
                      <div class="black-text mg-t20">
                        <i class="mdi mdi-highway small"></i>
                      </div>
                      @endif
                    </div>
                  </div>
                  <div class="row mg-t20">
                    <div class="col s12 m6 l6">
                      <span class="grey-text mg-t20">
                        Annonce déposée {{ Date::parse($transport->created_at)->format('l j F Y') }}.
                      </span>
                    </div>
                    <div class="col s12 m6 l6 right-align">
                        <a href="{{url('/transport/'.$transport->id)}}" class="mg-t20 waves-effect waves-light btn green"><i class="mdi mdi-information-variant white-text left"></i>Détail</a>
                        <a href="#delete_{{ $transport->id }}" class="mg-t20 waves-effect waves-light btn red"><i class="mdi mdi-delete white-text left"></i>Supprimer</a>
                    </div>

                    <div id="delete_{{ $transport->id }}" class="modal">
                      <div class="modal-content">
                        <h4>Confirmer la suppression</h4>
                        <p>Voulez-vous vraiment supprimer ce transport?</p>
                      </div>
                      <div class="modal-footer">
                        <a href="/user/deltransport/{{ $transport->id}}" class=" modal-action modal-close waves-effect red white-text waves-green btn-flat"><i class="mdi mdi-delete white-text left"></i>Supprimer</a>
                        <a href="#!" class="margin-r10 modal-action modal-close waves-effect green white-text waves-green btn-flat">Retour</a>
                      </div>
                    </div>
                    <div class="row mg-t20">

                        <div class="col s12 m12 l12 black-text">
                            <h3 class="about-subtitle">Demande(s) acceptée(s)</h3>
                            @foreach($transport->demandesTransport as $demande)
                              @if($demande->isAccepted == 3 || $demande->isAccepted == 2)
                                <div class="row card blue lighten-3 demande-expe">
                                      <div class="col s6 m2 l2 center-align">
                                        @if($demande->user->picLink==null)
                                          <img src="/images/profile/icon-{{$demande->user->sexe}}.png" width="50%" class="circle" alt="">
                                        @else
                                          <img src="{{$demande->user->picLink}}" width="50%" class="circle" alt="">
                                        @endif
                                      </div>
                                      <div class="col s6 m2 l3">
                                        <p>
                                          <a href="/user/{{$demande->user->id}}" target="blank">{{ $demande->user->login }}</a>
                                        </p>
                                        <p>
                                          <i class="mdi mdi-star icon-size yellow-text" aria-hidden="true"></i>
                                           {{$demande->user->note()}}/5 - {{$demande->user->nbNotes()}} avis
                                        </p>
                                        <p>
                                          @if($demande->user->phone)
                                            {{$demande->user->phone}}
                                          @else
                                            {{$demande->user->email}}
                                          @endif
                                        </p>
                                      </div>
                                      <div class="col s6 m4 l4">
                                        <p>
                                          {{ $demande->text}}
                                        </p>
                                        <p>
                                          Prix : {{ $demande->cost }} €
                                        </p>
                                      </div>
                                      @if($demande->isAccepted==3 && !is_null($demande->notation))
                                        <div class="col s6 m4 l2 center-align" style="margin-top: 15px;">
                                          Votre note :<br>
                                              {{$demande->notation->note}}
                                             /5<i class="mdi mdi-star icon-size yellow-text" aria-hidden="true"></i>
                                        </div>
                                      @else
                                        @if($demande->transport->natureTransport == 0)
                                          @if($demande->transport->beginningDate < date('Y-m-d H:i:s'))
                                            <div class="col s6 m4 l2 center-align" style="margin-top: 15px;">
                                              <a href="#note_{{ $demande->id }}" title="Noter cette expéditeur" class="btn-floating btn-large waves-effect waves-light purple lighten-1"><i class="mdi mdi-account-star"></i></a>
                                            </div>
                                          @endif
                                        @else
                                          @if($demande->transport->regularyBeginningDate < date('Y-m-d H:i:s'))
                                            <div class="col s6 m4 l2 center-align" style="margin-top: 15px;">
                                              <a href="#note_{{ $demande->id }}" title="Noter cette expéditeur" class="btn-floating btn-large waves-effect waves-light purple lighten-1"><i class="mdi mdi-account-star"></i></a>
                                            </div>
                                          @endif
                                        @endif
                                      @endif
                              </div>

                              <div id="note_{{ $demande->id }}" class="modal">
                                <form method="POST" id="formAjoutExpedition" action="{{route('postnotetransport', array('demande' => $demande->id))}}">
                                  <div class="modal-content">
                                    <h4>Noter cet expéditeur :</h4>
                                    {{ csrf_field() }}
                                    <div class="input-field">
                                      <label for="message">Votre message :</label>
                                      <textarea type="text" class="materialize-textarea" id="message" name="message" required ></textarea><br>
                                    </div>
                                    <label for="note">Note : </label>
                                    <span class="rating">
                                      <input type="radio" class="rating-input"
                                              id="rating-{{$demande->id}}-input-1-5" name="rating-input-1" value="5" required/>
                                      <label for="rating-{{$demande->id}}-input-1-5" class="rating-star"></label>
                                      <input type="radio" class="rating-input"
                                              id="rating-{{$demande->id}}-input-1-4" name="rating-input-1" value="4"/>
                                      <label for="rating-{{$demande->id}}-input-1-4" class="rating-star"></label>
                                      <input type="radio" class="rating-input"
                                              id="rating-{{$demande->id}}-input-1-3" name="rating-input-1" value="3"/>
                                      <label for="rating-{{$demande->id}}-input-1-3" class="rating-star"></label>
                                      <input type="radio" class="rating-input"
                                              id="rating-{{$demande->id}}-input-1-2" name="rating-input-1" value="2"/>
                                      <label for="rating-{{$demande->id}}-input-1-2" class="rating-star"></label>
                                      <input type="radio" class="rating-input"
                                              id="rating-{{$demande->id}}-input-1-1" name="rating-input-1" value="1"/>
                                      <label for="rating-{{$demande->id}}-input-1-1" class="rating-star"></label>
                                    </span>
                                  </div>
                                  <div class="modal-footer">
                                    <button class=" modal-action modal-close waves-effect green white-text waves-green btn-flat"><i class="mdi mdi-star yellow-text left"></i>Noter ! </button>
                                    <a href="#!" class="margin-r10 modal-action modal-close waves-effect red white-text waves-green btn-flat">Retour</a>
                                  </div>
                                </form>
                              </div>
                              @endif
                            @endforeach
                          </div>



                  </div>



                </div>
                  </div>
                </div>

              </li>
            @endforeach
          </ul>
        </div>
      </div>




    </section>





@endsection
