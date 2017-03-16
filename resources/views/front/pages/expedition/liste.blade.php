@extends('layouts.app', [ 'menu_style' => 'scroll',
'includesJs' => [],
'page_title' => 'DropZone - Mes colis',
'includesCss' => [] ])
@section('content')


    <section id="about" class="scroll-section root-sec padd-tb-100-30  grey lighten-5">
      <h3 class="about-subtitle center-align">Mes colis</h3>
        <div class="container">
          <div class="row">
            <a href="{{ url('/addcolis') }}" class="waves-effect waves-light btn orange"><i class="mdi mdi-cube-send white-text right"></i> Ajouter</a>
            <ul class="collapsible" data-collapsible="accordion">
              @foreach(Auth::user()->expeditions as $expedition)
              <li>
                <div class="collapsible-header active black-text"> <div class=" green-text lighten-2 red-text lighten-2">
                  <span style="margin: 10px; width:200px;" class="truncate">{{ $expedition->description }}</span> </div>
                </div>
                <div class="collapsible-body grey lighten-4">
                  <div class="row">
                    <div class="col s12 m4 l4">
                      <div class="person-info black-text">
                        <h3 class="about-subtitle">Itinéraire demandé</h3>
                        <ul>
                          <li><i class="mdi mdi-map-marker small"></i> {{ $expedition->villeDep->name }}</li>
                          <li><i class="mdi mdi-flag-checkered small"></i> {{ $expedition->villeArr->name }}</li>
                        </ul>
                      </div>

                    </div>
                    <div class="col s12 m4 l4">
                      <h3 class="about-subtitle">Détails du colis</h3>
                      <div class="person-info">
                        <h5 class="black-text"><span>Longueur :</span> {{ $expedition->lengthItem }} cm</h5>
                        <h5 class="black-text"><span>Largeur :</span> {{ $expedition->widthItem }} cm</h5>
                        <h5 class="black-text"><span>Hauteur :</span> {{ $expedition->heightItem }} cm</h5>
                        <h5 class="black-text"><span>Poids :</span> {{ $expedition->weightItem }} kg</h5>

                      </div>
                    </div>

                    <div class="col s12 m4 l4">
                      <div class="person-info">
                        <h3 class="about-subtitle">Description</h3>
                        <h5 class="black-text">{{ $expedition->description }}</h5>
                        <h5 class="black-text"><span>Prix désiré :</span> {{ $expedition->costFixed }} €</h5>

                      </div>
                    </div>
                  </div>

                  <div class="row mg-t20">
                    <div class="col s12 m6 l6">
                      <span class="grey-text mg-t20">
                        Annonce déposée {{ Date::parse($expedition->created_at)->format('l j F Y') }}.
                      </span>
                    </div>
                    <div class="col s12 m6 l6 right-align">
                        <a href="#delete_{{ $expedition->id }}" class="mg-t20 waves-effect waves-light btn red"><i class="mdi mdi-delete white-text left"></i>Supprimer</a>
                    </div>
                    <div id="delete_{{ $expedition->id }}" class="modal">
                      <div class="modal-content">
                        <h4>Confirmer la suppression</h4>
                        <p>Voulez-vous vraiment supprimer ce colis?</p>
                      </div>
                      <div class="modal-footer">
                        <a href="/user/delpackage/{{$expedition->id}}" class="modal-action modal-close waves-effect red white-text waves-green btn-flat"><i class="mdi mdi-delete white-text left"></i>Supprimer</a>
                        <a href="#!" class="margin-r10 modal-action modal-close waves-effect green white-text waves-green btn-flat">Retour</a>
                      </div>
                    </div>
                  </div>
                  <div class="row mg-t20">
                    <div class="col s12 m12 l12 black-text">
                      <h3 class="about-subtitle">Demande en attente</h3>
                        @foreach($expedition->demandeExpedition as $demande)
                          @if($demande->isAccepted==null)
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
                                      {{ $demande->user->login }}
                                    </p>
                                    <p>
                                      <i class="mdi mdi-star icon-size yellow-text" aria-hidden="true"></i>
                                       4.5/5
                                    </p>
                                  </div>
                                  <div class="col s6 m4 l4">
                                    <p>
                                      Départ entre le {{ Date::parse($demande->beginDate)->format('j') }} et le {{ Date::parse($demande->endDate)->format('j F Y') }}
                                    </p>
                                    <p>
                                      Prix : {{ $demande->prixAsked }} €
                                    </p>
                                  </div>
                                  <div class="col s6 m4 l4 center-align" style="margin-top: 15px;">
                                    <a href="{{ route('confirmpackage', array("demande" => $demande->id)) }}" title="Accepter" class="btn-floating btn-large waves-effect waves-light green"><i class="mdi mdi-check"></i></a>
                                    <a href="{{ route('cancelpackage', array("demande" => $demande->id)) }}" title="Refuser" class="btn-floating btn-large waves-effect waves-light red"><i class="mdi mdi-close"></i></a>
                                  </div>
                          </div>
                          @endif
                        @endforeach
                      </div>
                    </div>


                    <div class="row mg-t20">

                      <div class="col s12 m12 l12 black-text">
                        <h3 class="about-subtitle">Demande acceptée</h3>
                          @foreach($expedition->demandeExpedition as $demande)
                            @if($demande->isAccepted == 1)
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
                                        {{ $demande->user->login }}
                                      </p>
                                      <p>
                                        <i class="mdi mdi-star icon-size yellow-text" aria-hidden="true"></i>
                                         4.5/5
                                      </p>
                                    </div>
                                    <div class="col s6 m4 l4">
                                      <p>
                                        Départ entre le {{ Date::parse($demande->beginDate)->format('j') }} et le {{ Date::parse($demande->endDate)->format('j F Y') }}
                                      </p>
                                      <p>
                                        Prix : {{ $demande->prixAsked }} €
                                      </p>
                                    </div>
                                    <div class="col s6 m4 l4 center-align" style="margin-top: 15px;">
                                      <a href="{{ route('confirmpackage', array("demande" => $demande->id)) }}" title="Accepter" class="btn-floating btn-large waves-effect waves-light green"><i class="mdi mdi-check"></i></a>
                                      <a href="{{ route('cancelpackage', array("demande" => $demande->id)) }}" title="Refuser" class="btn-floating btn-large waves-effect waves-light red"><i class="mdi mdi-close"></i></a>
                                    </div>
                            </div>
                            @endif
                          @endforeach
                        </div>


                      </div>
                      <div class="row mg-t20">

                        <div class="col s12 m12 l12 black-text">
                          <h3 class="about-subtitle">Demande refusée</h3>
                            @foreach($expedition->demandeExpedition as $demande)
                              @if($demande->isAccepted == 0)
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
                                          {{ $demande->user->login }}
                                        </p>
                                        <p>
                                          <i class="mdi mdi-star icon-size yellow-text" aria-hidden="true"></i>
                                           4.5/5
                                        </p>
                                      </div>
                                      <div class="col s6 m4 l4">
                                        <p>
                                          Départ entre le {{ Date::parse($demande->beginDate)->format('j') }} et le {{ Date::parse($demande->endDate)->format('j F Y') }}
                                        </p>
                                        <p>
                                          Prix : {{ $demande->prixAsked }} €
                                        </p>
                                      </div>
                                      <div class="col s6 m4 l4 center-align" style="margin-top: 15px;">
                                        <a href="{{ route('confirmpackage', array("demande" => $demande->id)) }}" title="Accepter" class="btn-floating btn-large waves-effect waves-light green"><i class="mdi mdi-check"></i></a>
                                        <a href="{{ route('cancelpackage', array("demande" => $demande->id)) }}" title="Refuser" class="btn-floating btn-large waves-effect waves-light red"><i class="mdi mdi-close"></i></a>
                                      </div>
                              </div>
                              @endif
                            @endforeach
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
