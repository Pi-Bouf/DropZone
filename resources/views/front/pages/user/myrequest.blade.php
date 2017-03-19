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
                  <div class="collapsible-header">
                    <span style="margin: 10px">{{ $demande->transport->villeDepart->ville->name }}</span> &#10142; <span style="margin: 10px"> {{ $demande->transport->villeArrivee->ville->name }} </span>

                  </div>
                  <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
                @endforeach

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


        </div>





    </section>





@endsection
