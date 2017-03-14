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
                        <h5 class="black-text"><span>Largeur :</span> {{ $expedition->widthhItem }} cm</h5>
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

                    <h3 class="about-subtitle">Demandes en attente</h3>

                    <div class="col s12 m12 l12">
                      @foreach($expedition->demandeExpedition as $demande)
                      <div class="black-text">Une demande de {{ $demande->user->login }}</div>
                      @endforeach
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
