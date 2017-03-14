@extends('layouts.app', [ 'menu_style' => 'scroll',
'includesJs' => [],
'page_title' => 'DropZone - Mes transports',
'includesCss' => [] ])
@section('content')


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
                        @if($transport->longMax)
                          <h5 class="black-text"><span>Longueur :</span> {{ $transport->longMax }} cm</h5>
                        @else
                          <h5 class="black-text"><span>Longueur :</span> {{ $transport->vehicule->longMax }} cm</h5>
                        @endif
                        @if($transport->hautMax)
                          <h5 class="black-text"><span>Hauteur :</span> {{ $transport->hautMax }} cm</h5>
                        @else
                          <h5 class="black-text"><span>Hauteur :</span> {{ $transport->vehicule->hautMax }} cm</h5>
                        @endif
                        @if($transport->largMax)
                          <h5 class="black-text"><span>Largeur :</span> {{ $transport->largMax }} cm</h5>
                        @else
                          <h5 class="black-text"><span>Largeur :</span> {{ $transport->vehicule->largMax }} cm</h5>
                        @endif
                        @if($transport->poidMax)
                          <h5 class="black-text"><span>Poids Max :</span> {{ $transport->poidMax }} kg</h5>
                        @else
                          <h5 class="black-text"><span>Poids Max :</span> {{ $transport->vehicule->poidMax }} kg</h5>
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
                        <h5 class="black-text"><span>Détour au départ :</span> {{ $transport->detourRetirMax }} km</h5>
                        <h5 class="black-text"><span>Détour a l'arrivé :</span> {{ $transport->detourDepotMax }} km</h5>
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
                        @if($transport->longMax)
                          <h5 class="black-text"><span>Longueur :</span> {{ $transport->longMax }} cm</h5>
                        @else
                          <h5 class="black-text"><span>Longueur :</span> {{ $transport->vehicule->longMax }} cm</h5>
                        @endif
                        @if($transport->hautMax)
                          <h5 class="black-text"><span>Hauteur :</span> {{ $transport->hautMax }} cm</h5>
                        @else
                          <h5 class="black-text"><span>Hauteur :</span> {{ $transport->vehicule->hautMax }} cm</h5>
                        @endif
                        @if($transport->largMax)
                          <h5 class="black-text"><span>Largeur :</span> {{ $transport->largMax }} cm</h5>
                        @else
                          <h5 class="black-text"><span>Largeur :</span> {{ $transport->vehicule->largMax }} cm</h5>
                        @endif
                        @if($transport->poidMax)
                          <h5 class="black-text"><span>Poids Max :</span> {{ $transport->poidMax }} kg</h5>
                        @else
                          <h5 class="black-text"><span>Poids Max :</span> {{ $transport->vehicule->poidMax }} kg</h5>
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
                        <h5 class="black-text"><span>Détour au départ :</span> {{ $transport->detourRetirMax }} km</h5>
                        <h5 class="black-text"><span>Détour a l'arrivé :</span> {{ $transport->detourDepotMax }} km</h5>
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
                </div>
              </li>
            @endforeach
          </ul>
        </div>
      </div>




    </section>





@endsection
