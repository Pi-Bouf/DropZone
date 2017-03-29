@extends('layouts.app', [ 'menu_style' => 'scroll',
'includesJs' => [],
'page_title' => 'DropZone - Mes demandes',
'includesCss' => ['/css/pages/request.css'] ])
@section('content')


    <section id="about" class="scroll-section root-sec padd-tb-55  grey lighten-2">
        <div class="row">
          <div class="col s12 m12 l6">
            <div class="col s12 m12 l10 offset-l1 black-text">
              <h3 class="about-subtitle center-align">Je demande une expedition</h3>
              <ul class="collapsible" data-collapsible="accordion">
                @foreach(Auth::user()->demandesExpedition->sortBy('created_at') as $demande)
                <li>
                  <div class="collapsible-header">
                    <span style="margin: 5px">{{ $demande->expedition->villeDep->name }}</span> &#10142; <span style="margin: 5px"> {{ $demande->expedition->villeArr->name }} </span>

                    @if($demande->isAccepted == 0)
                    <span class="hide-on-small-only right orange white-text new badge" style="font-weight:bold;" data-badge-caption="En attente"></span>
                    @elseif($demande->isAccepted == 1)
                    <span class="hide-on-small-only right red white-text new badge" style="font-weight:bold;" data-badge-caption="Refusée"></span>
                    @elseif($demande->isAccepted == 2)
                    <span class="hide-on-small-only right green white-text new badge" style="font-weight:bold;" data-badge-caption="Acceptée"></span>
                    @elseif($demande->isAccepted == 3)
                    <span class="hide-on-small-only right blue white-text new badge" style="font-weight:bold;" data-badge-caption="Effectuée"></span>
                    @endif

                  </div>
                  <div class="collapsible-body grey lighten-5">
                    <div class="row">
                      <div class="col s12 m12 l12 hide-on-med-and-up" style="margin-bottom:15px;">
                        @if($demande->isAccepted == 0)
                        <span class="left orange white-text new badge" style="font-weight:bold;" data-badge-caption="En attente"></span>
                        @elseif($demande->isAccepted == 1)
                        <span class="left red white-text new badge" style="font-weight:bold;" data-badge-caption="Refusée"></span>
                        @elseif($demande->isAccepted == 2)
                        <span class="left green white-text new badge" style="font-weight:bold;" data-badge-caption="Acceptée"></span>
                        @elseif($demande->isAccepted == 3)
                        <span class="left blue white-text new badge" style="font-weight:bold;" data-badge-caption="Effectuée"></span>
                        @endif
                      </div>
                      <div class="col s12 m12 l12">
                        @if($demande->beginDate == $demande->endDate)
                        <span class="black-text date-depart-transport">Départ le <span class="bold">{{ Date::parse($demande->beginDate)->format('l j F') }}</span>.</span>
                        @else
                        <span class="black-text date-depart-transport">Départ entre le <span class="bold">{{ Date::parse($demande->beginDate)->format('l j F') }}</span> et le <span class="bold">{{ Date::parse($demande->endDate)->format('l j F Y') }}</span>.</span>
                        @endif
                      </div>

                      <div class="col s12 m6 l6 mg-t20">
                        Expediteur : <a href="/user/{{$demande->expedition->user->id}}">{{$demande->expedition->user->login}}</a>
                        @if($demande->isAccepted == 3 || $demande->isAccepted == 2)
                          <p class="grey-text">
                            @if($demande->expedition->user->phone)
                              {{$demande->expedition->user->phone}}
                            @else
                              {{$demande->expedition->user->email}}
                            @endif
                          </p>
                        @endif
                      </div>
                      <div class="col s12 m6 l6 mg-t20">
                        Prix proposé : {{$demande->prixAsked}} €
                      </div>
                      <div class="col s12 m12 l12 mg-t20">
                        <span>{{ $demande->propositionText }}</span>
                      </div>

                      <div class="col s12 m12 l12 mg-t20">
                        @if($demande->isAccepted == 3 || $demande->isAccepted == 2)
                          @if($demande->isAccepted == 3 && !is_null($demande->expedition->notationTransporter))
                            <div class="col s6 m4 l4 center-align" >

                            </div>
                            <div class="col s12 m12 l12 mg-t20">
                              <a href="/expedition/{{$demande->expedition->id}}" title="Afficher l'expedition" class="left waves-effect blue waves-light btn">Afficher</a>
                              <div class="right">Note attribuée : {{$demande->expedition->notationTransporter->note}}/5<i class="mdi mdi-star icon-size yellow-text" aria-hidden="true"></i></div>
                            </div>
                          @else
                            <div class="col s12 m12 l12 mg-t20">
                              <a href="/expedition/{{$demande->expedition->id}}" title="Afficher l'expedition" class=" waves-effect blue waves-light btn">Afficher</a>
                              @if($demande->beginDate < date('Y-m-d H:i:s'))
                              <div class="hide-on-med-and-up mg-t20"></div>

                                <a href="#note_expe_{{ $demande->id }}" title="Noter l'expedition" class=" waves-effect green waves-light btn">Noter</a>
                              @else
                              <div class="hide-on-med-and-up mg-t20"></div>
                                <a href="#delete_expe{{$demande->id}}" title="Supprimer ma demande" class=" waves-effect red waves-light btn"><i class="mdi mdi-delete right white-text"></i>Supprimer</a>
                              @endif
                            </div>
                          @endif

                        @else
                          <div class="col s12 m12 l12 mg-t20">
                            <a href="/expedition/{{$demande->expedition->id}}" title="Afficher l'expedition" class=" waves-effect blue waves-light btn">Afficher</a>
                            <div class="hide-on-med-and-up mg-t20"></div>
                            <a href="#delete_expe{{$demande->id}}" title="Supprimer ma demande" class=" waves-effect red waves-light btn"><i class="mdi mdi-delete right white-text"></i>Supprimer</a>
                          </div>
                        @endif
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
                <div id="note_expe_{{ $demande->id }}" class="modal">
                  <form method="POST" id="formAjoutTransport" action="{{route('postnoteexpeditiontrans', array('demande' => $demande->id))}}">
                    <div class="modal-content">
                      <h4>Noter ce transport :</h4>
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
                    @if($demande->isAccepted == 0)
                    <span class="hide-on-small-only right orange white-text new badge" style="font-weight:bold;" data-badge-caption="En attente"></span>
                    @elseif($demande->isAccepted == 1)
                    <span class="hide-on-small-only right red white-text new badge" style="font-weight:bold;" data-badge-caption="Refusée"></span>
                    @elseif($demande->isAccepted == 2)
                    <span class="hide-on-small-only right green white-text new badge" style="font-weight:bold;" data-badge-caption="Acceptée"></span>
                    @elseif($demande->isAccepted == 3)
                    <span class="hide-on-small-only right blue white-text new badge" style="font-weight:bold;" data-badge-caption="Effectuée"></span>
                    @endif

                  </div>
                  <div class="collapsible-body grey lighten-5">
                    <div class="row">
                      <div class="col s12 m12 l12 hide-on-med-and-up" style="margin-bottom:15px;">
                        @if($demande->isAccepted == 0)
                        <span class="left orange white-text new badge" style="font-weight:bold;" data-badge-caption="En attente"></span>
                        @elseif($demande->isAccepted == 1)
                        <span class="left red white-text new badge" style="font-weight:bold;" data-badge-caption="Refusée"></span>
                        @elseif($demande->isAccepted == 2)
                        <span class="left green white-text new badge" style="font-weight:bold;" data-badge-caption="Acceptée"></span>
                        @elseif($demande->isAccepted == 3)
                        <span class="left blue white-text new badge" style="font-weight:bold;" data-badge-caption="Effectuée"></span>
                        @endif
                      </div>
                      <div class="col s12 m6 l6 ">
                        Transporteur : <a href="/user/{{$demande->transport->user->id}}">{{$demande->transport->user->login}}</a>
                        @if($demande->isAccepted == 2 || $demande->isAccepted == 3)
                          <p class="grey-text">
                            @if($demande->transport->user->phone)
                              {{$demande->transport->user->phone}}
                            @else
                              {{$demande->transport->user->email}}
                            @endif
                          </p>
                        @endif
                      </div>
                      <div class="col s12 m6 l6">
                        Prix proposé : {{$demande->cost}} €
                      </div>
                      <div class="col s12 m12 l12 mg-t20">
                        <span>{{ $demande->text }}</span>
                      </div>
                        <div class="col s12 m12 l12 mg-t20">
                          @if($demande->isAccepted == 2 || $demande->isAccepted == 3)
                            @if($demande->isAccepted==3 && !is_null($demande->notationUser))
                              <a href="/transport/{{$demande->transport->id}}" title="Afficher le transport" class="left waves-effect blue waves-light btn">Afficher</a>
                              <div class="right">Note attribuée : {{$demande->notationUser->note}}/5<i class="mdi mdi-star icon-size yellow-text" aria-hidden="true"></i></div>
                            @else
                              <a href="/transport/{{$demande->transport->id}}" title="Afficher le transport" class=" waves-effect blue waves-light btn">Afficher</a>
                              @if($demande->transport->natureTransport == 0)
                                @if($demande->transport->beginningDate < date('Y-m-d H:i:s'))
                                <div class="hide-on-med-and-up mg-t20"></div>
                                  <a href="#note_trans_{{ $demande->id }}" title="Noter cette expéditeur" class=" waves-effect green waves-light btn">Noter</a>
                                @else
                                  <a href="#delete_{{$demande->id}}" title="Supprimer ma demande" class=" waves-effect red waves-light btn"><i class="mdi mdi-delete right white-text"></i>Supprimer</a>
                                @endif
                              @else
                                @if($demande->transport->regularyBeginningDate < date('Y-m-d H:i:s'))
                                <div class="hide-on-med-and-up mg-t20"></div>

                                  <a href="#note_trans_{{ $demande->id }}" title="Noter cette expéditeur" class=" waves-effect green waves-light btn">Noter</a>
                                @else
                                <div class="hide-on-med-and-up mg-t20"></div>
                                  <a href="#delete_{{$demande->id}}" title="Supprimer ma demande" class=" waves-effect red waves-light btn"><i class="mdi mdi-delete right white-text"></i>Supprimer</a>
                                @endif
                              @endif
                            @endif
                          @else
                            <a href="/transport/{{$demande->transport->id}}" title="Afficher le transport" class=" waves-effect blue waves-light btn">Afficher</a>
                            <div class="hide-on-med-and-up mg-t20"></div>
                            <a href="#delete_{{$demande->id}}" title="Supprimer ma demande" class=" waves-effect red waves-light btn"><i class="mdi mdi-delete right white-text"></i>Supprimer</a>
                          @endif
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
                <div id="note_trans_{{ $demande->id }}" class="modal">
                  <form method="POST" id="formAjoutTransport" action="{{route('postnotetransportuser', array('demande' => $demande->id))}}">
                    <div class="modal-content">
                      <h4>Noter l'expéditeur :</h4>
                      {{ csrf_field() }}
                      <div class="input-field">
                        <label for="message">Votre message :</label>
                        <textarea type="text" class="materialize-textarea" id="message" name="message" required ></textarea><br>
                      </div>
                      <label for="note">Note : </label>
                      <span class="rating">
                        <input type="radio" class="rating-input"
                                id="rating-tra-{{$demande->id}}-input-1-5" name="rating-input-1" value="5" required/>
                        <label for="rating-tra-{{$demande->id}}-input-1-5" class="rating-star"></label>
                        <input type="radio" class="rating-input"
                                id="rating-tra-{{$demande->id}}-input-1-4" name="rating-input-1" value="4"/>
                        <label for="rating-tra-{{$demande->id}}-input-1-4" class="rating-star"></label>
                        <input type="radio" class="rating-input"
                                id="rating-tra-{{$demande->id}}-input-1-3" name="rating-input-1" value="3"/>
                        <label for="rating-tra-{{$demande->id}}-input-1-3" class="rating-star"></label>
                        <input type="radio" class="rating-input"
                                id="rating-tra-{{$demande->id}}-input-1-2" name="rating-input-1" value="2"/>
                        <label for="rating-tra-{{$demande->id}}-input-1-2" class="rating-star"></label>
                        <input type="radio" class="rating-input"
                                id="rating-tra-{{$demande->id}}-input-1-1" name="rating-input-1" value="1"/>
                        <label for="rating-tra-{{$demande->id}}-input-1-1" class="rating-star"></label>
                      </span>
                    </div>
                    <div class="modal-footer">
                      <button class=" modal-action modal-close waves-effect green white-text waves-green btn-flat"><i class="mdi mdi-star yellow-text left"></i>Noter ! </button>
                      <a href="#!" class="margin-r10 modal-action modal-close waves-effect red white-text waves-green btn-flat">Retour</a>
                    </div>
                  </form>
                </div>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
    </section>





@endsection
