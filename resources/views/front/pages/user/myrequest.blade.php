@extends('layouts.app', [ 'menu_style' => 'scroll',
'includesJs' => [],
'page_title' => 'DropZone - Mes demandes',
'includesCss' => [] ])
@section('content')


    <section id="about" class="scroll-section root-sec padd-tb-55  grey lighten-2">
        <div class="row">
          <div class="col s12 m12 l6">
            <div class="col s12 m12 l10 offset-l1 black-text">
              <h3 class="about-subtitle center-align">Demande d'expedition</h3>
              <ul class="collapsible" data-collapsible="accordion">
                <li>
                  <div class="collapsible-header"><i class="material-icons"></i>First</div>
                  <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
                <li>
                  <div class="collapsible-header"><i class="material-icons"></i>Second</div>
                  <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
                <li>
                  <div class="collapsible-header"><i class="material-icons"></i>Third</div>
                  <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
              </ul>
            </div>
          </div>
          <div class="col s12 m12 l6">
            <div class="col s12 m12 l10 offset-l1 black-text">
              <h3 class="about-subtitle center-align">Demande de transport</h3>
              <ul class="collapsible" data-collapsible="accordion">
                @foreach(Auth::user()->demandesTransport as $demande)
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
                        <a href="#" title="Supprimer ma demande" class="right waves-effect red waves-light btn"><i class="mdi mdi-delete right white-text"></i>Supprimer</a>
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
