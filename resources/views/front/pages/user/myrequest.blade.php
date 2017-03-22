@extends('layouts.app', [ 'menu_style' => 'scroll',
'includesJs' => [],
'page_title' => 'DropZone - Mes demandes',
'includesCss' => [] ])
@section('content')


    <section id="about" class="scroll-section root-sec padd-tb-55  grey lighten-2">
        <div class="row">
          <div class="col s12 m12 l6">
            <div class="col s12 m12 l10 offset-l1 black-text">
              <h3 class="about-subtitle center-align">Je demande une expedition</h3>
              <ul class="collapsible" data-collapsible="accordion">
                @foreach(Auth::user()->demandesExpedition->sortBy('created_at') as $demande)
                <li>
                  <div class="collapsible-header  ">
                    <span style="margin: 10px">{{ $demande->expedition->villeDep->name }}</span> &#10142; <span style="margin: 10px"> {{ $demande->expedition->villeArr->name }} </span>
                    @if($demande->isAccepted === 1)
                    <span class="right green white-text new badge" style="font-weight:bold;" data-badge-caption="Acceptée"></span>
                    @elseif($demande->isAccepted === 0)
                    <span class="right red white-text new badge" style="font-weight:bold;" data-badge-caption="Refusée"></span>
                    @elseif($demande->isAccepted === 2)
                    <span class="right blue white-text new badge" style="font-weight:bold;" data-badge-caption="Effectuée"></span>
                    @else
                    <span class="right orange white-text new badge" style="font-weight:bold;" data-badge-caption="En attente"></span>
                    @endif

                  </div>
                  <div class="collapsible-body grey lighten-5">
                    <div class="row">
                      <div class="col s12 m12 l12">
                        @if($demande->expedition->beginDate == $demande->expedition->endDate)
                        <span class="black-text date-depart-transport">Départ le <span class="bold">{{ Date::parse($demande->expedition->beginDate)->format('l j F') }}</span>.</span>
                        @else
                        <span class="black-text date-depart-transport">Départ entre le <span class="bold">{{ Date::parse($demande->expedition->beginDate)->format('l j F') }}</span> et le <span class="bold">{{ Date::parse($demande->expedition->endDate)->format('l j F Y') }}</span>.</span>
                        @endif
                      </div>

                      <div class="col s12 m6 l6 mg-t20">
                        Expediteur : <a href="/user/{{$demande->expedition->user->id}}">{{$demande->expedition->user->login}}</a>
                      </div>
                      <div class="col s12 m6 l6">
                        Prix proposé : {{$demande->prixAsked}} €
                      </div>
                      <div class="col s12 m12 l12 mg-t20">
                        <span>{{ $demande->propositionText }}</span>
                      </div>

                      <div class="col s12 m12 l12 mg-t20">
                        @if($demande->isAccepted === 1 || $demande->isAccepted === 2)
                        <a href="#" title="Noter l'expedition" class="right waves-effect blue waves-light btn">Noter</a>
                        @endif
                      </div>

                      <div class="col s12 m12 l12 mg-t20">
                        <a href="/expedition/{{$demande->expedition->id}}" title="Afficher l'expedition" class="left waves-effect blue waves-light btn">Afficher</a>
                        <a href="#delete_expe{{$demande->id}}" title="Supprimer ma demande" class="right waves-effect red waves-light btn"><i class="mdi mdi-delete right white-text"></i>Supprimer</a>
                      </div>

                      <div id="delete_expe{{ $demande->id }}" class="modal">
                        <div class="modal-content">
                          <h4>Confirmer la suppression</h4>
                          <p>Voulez-vous vraiment supprimer cette demande?</p>
                        </div>
                        <div class="modal-footer">
                          <a href="/user/myrequest/delExpe/{{$demande->id}}" class="modal-action modal-close waves-effect red white-text waves-green btn-flat"><i class="mdi mdi-delete white-text left"></i>Supprimer</a>
                          <a href="#!" class="margin-r10 modal-action modal-close waves-effect green white-text waves-green btn-flat">Retour</a>
                        </div>
                      </div>



                    </div>

                  </div>

                </li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="col s12 m12 l6">
            <div class="col s12 m12 l10 offset-l1 black-text">
              <h3 class="about-subtitle center-align">Je demande un transport</h3>
              <ul class="collapsible" data-collapsible="accordion">
                @foreach(Auth::user()->demandesTransport->sortBy('created_at') as $demande)
                <li>
                  <div class="collapsible-header  ">
                    <span style="margin: 10px">{{ $demande->transport->villeDepart->ville->name }}</span> &#10142; <span style="margin: 10px"> {{ $demande->transport->villeArrivee->ville->name }} </span>
                    @if($demande->isAccepted === 1)
                    <span class="right green white-text new badge" style="font-weight:bold;" data-badge-caption="Acceptée"></span>
                    @elseif($demande->isAccepted === 0)
                    <span class="right red white-text new badge" style="font-weight:bold;" data-badge-caption="Refusée"></span>
                    @elseif($demande->isAccepted === 2)
                    <span class="right blue white-text new badge" style="font-weight:bold;" data-badge-caption="Effectuée"></span>
                    @else
                    <span class="right orange white-text new badge" style="font-weight:bold;" data-badge-caption="En attente"></span>
                    @endif

                  </div>
                  <div class="collapsible-body grey lighten-5">
                    <div class="row">
                      <div class="col s12 m6 l6 ">
                        Transporteur : <a href="/user/{{$demande->transport->user->id}}">{{$demande->transport->user->login}}</a>
                      </div>
                      <div class="col s12 m6 l6">
                        Prix proposé : {{$demande->cost}} €
                      </div>
                      <div class="col s12 m12 l12 mg-t20">
                        <span>{{ $demande->text }}</span>
                      </div>

                      <div class="col s12 m12 l12 mg-t20">
                        <a href="/transport/{{$demande->transport->id}}" title="Afficher le transport" class="left waves-effect blue waves-light btn">Afficher</a>
                        <a href="#delete_{{$demande->id}}" title="Supprimer ma demande" class="right waves-effect red waves-light btn"><i class="mdi mdi-delete right white-text"></i>Supprimer</a>
                      </div>

                      <div id="delete_{{ $demande->id }}" class="modal">
                        <div class="modal-content">
                          <h4>Confirmer la suppression</h4>
                          <p>Voulez-vous vraiment supprimer cette demande?</p>
                        </div>
                        <div class="modal-footer">
                          <a href="/user/myrequest/delTransport/{{$demande->id}}" class="modal-action modal-close waves-effect red white-text waves-green btn-flat"><i class="mdi mdi-delete white-text left"></i>Supprimer</a>
                          <a href="#!" class="margin-r10 modal-action modal-close waves-effect green white-text waves-green btn-flat">Retour</a>
                        </div>
                      </div>



                    </div>

                  </div>

                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
    </section>





@endsection
