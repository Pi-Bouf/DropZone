@extends('layouts.app', [ 'menu_style' => 'scroll',
'includesJs' => [],
'page_title' => 'DropZone - Mes colis',
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
                        <h5 class="black-text"><span>Longueur :</span>
                        @if($expedition->lengthItem > 0 )
                           {{ $expedition->lengthItem }} cm
                        @else
                          Non renseigné
                        @endif
                        </h5>
                        <h5 class="black-text"><span>Largeur :</span> 
                        @if($expedition->widthItem > 0 )
                           {{ $expedition->widthItem }} cm
                        @else
                          Non renseigné
                        @endif
                        </h5>
                        <h5 class="black-text"><span>Hauteur :</span>
                        @if($expedition->heightItem > 0 )
                           {{ $expedition->heightItem }} cm
                        @else
                          Non renseigné
                        @endif
                        </h5>
                        <h5 class="black-text"><span>Poids :</span>
                        @if($expedition->weightItem > 0 )
                           {{ $expedition->weightItem }} kg
                        @else
                          Non renseigné
                        @endif
                        </h5>
                        <h5 class="black-text"><span>Volume :</span>
                        @if($expedition->volumeItem > 0 )
                           {{ $expedition->volumeItem }} m³
                        @else
                          Non renseigné
                        @endif
                        </h5>
                      </div>
                    </div>

                    <div class="col s12 m4 l4">
                      <div class="person-info">
                        <h3 class="about-subtitle">Description</h3>
                        <h5 class="black-text">{{ $expedition->description }}</h5>
                        <h5 class="black-text"><span>Prix désiré :</span> 
                        @if($expedition->costFixed>0)
                          {{ $expedition->costFixed }} €</h5>
                        @else
                         Non renseigné
                        @endif

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
                        <a href="{{url('/expedition/'.$expedition->id)}}" class="mg-t20 waves-effect waves-light btn green"><i class="mdi mdi-information-variant white-text left"></i>Détail</a>
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
                        <h3 class="about-subtitle">Demande(s) en attente(s)</h3>
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
                                      <a href="/user/{{$demande->user->id}}" target="blank">{{ $demande->user->login }}</a>
                                    </p>
                                    <p>
                                      <i class="mdi mdi-star icon-size yellow-text" aria-hidden="true"></i>
                                      {{$demande->user->note()}}/5 - {{$demande->user->nbNotes()}} avis
                                    </p>
                                  </div>
                                  <div class="col s6 m4 l4">
                                    <p>
                                      Départ entre le {{ Date::parse($demande->beginDate)->format('j') }} et le {{ Date::parse($demande->endDate)->format('j F Y') }}
                                    </p>
                                    <p>{{$demande->propositionText}}</p>
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
                            @if($demande->isAccepted == 3 || $demande->isAccepted == 2 )
                            <div class="row card blue lighten-3 demande-expe">
                                    <div class="col s6 m2 l2 center-align">
                                      @if($demande->user->picLink==null)
                                        <img src="/images/profile/icon-{{$demande->user->sexe}}.png" width="50%" class="circle" alt="">
                                      @else
                                        <img src="{{$demande->user->picLink}}" width="50%" class="circle" alt="">
                                      @endif
                                    </div>
                                    <div class="col s6 m2 l3">
                                      <a href="/user/{{$demande->user->id}}">
                                        {{ $demande->user->login }}
                                      </a>
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
                                        Départ entre le {{ Date::parse($demande->beginDate)->format('j F') }} et le {{ Date::parse($demande->endDate)->format('j F Y') }}
                                      </p>
                                      <p>{{$demande->propositionText}}</p>
                                      <p>
                                        Prix : {{ $demande->prixAsked }} €
                                      </p>
                                    </div>
                                      @if($demande->isAccepted==3 && !is_null($expedition->notation))
                                        <div class="col s6 m4 l3 center-align" style="margin-top: 15px;">
                                          Votre note :<br>
                                              {{$expedition->notation->note}}
                                             /5<i class="mdi mdi-star icon-size yellow-text" aria-hidden="true"></i>
                                        </div>
                                      @else
                                        @if($demande->beginDate < date('Y-m-d H:i:s'))

                                        <div class="col s6 m4 l3 center-align" style="margin-top: 15px;">
                                          <a href="#note_{{ $demande->id }}" title="Noter ce transport" class="btn-floating btn-large waves-effect waves-light purple lighten-1"><i class="mdi mdi-account-star"></i></a>
                                        </div>
                                        @endif
                                      @endif
                              <div id="note_{{ $demande->id }}" class="modal">
                                <form method="POST" id="formAjoutTransport" action="{{route('postnoteexpedition', array('demande' => $demande->id))}}">
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
                            </div>
                            @endif
                          @endforeach
                        </div>


                      </div>

                  </div>
              </li>
              @endforeach
            </div>

            </ul>
        </div>
      </div>
    </section>

@endsection
