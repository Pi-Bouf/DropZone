@extends('layouts.app', [ 'menu_style' => 'scroll',
'includesJs' => [],
'page_title' => 'DropZone - Mes transports',
'includesCss' => [] ])
@section('content')



<section id="about" class="scroll-section root-sec padd-tb-100-30  grey lighten-5">
  <div class="container">
    <div class="row">
      <div class="card grey lighten-3">
        <div class="card-content black-text">
          <h3 class="about-subtitle ">Mes transports</h3>
          <ul class="collapsible" data-collapsible="accordion">
            @foreach(Auth::user()->transports as $transport)
            <li>
              <div class="collapsible-header active"> <span style="margin: 10px">{{ $transport->villeDepart->ville->name }}</span> &#10142; <span style="margin: 10px"> {{ $transport->villeArrivee->ville->name }} </span></div>
              <div class="collapsible-body">

                <div class="row">
                  <div class="col s4 m4 l4">
                    <h3>Trajet prévu </h3>
                    <ul class="liste_ville">
                    @foreach($transport->etapes as $etape)
                      <li class="uneVille">
                        @if($etape->ville_position == 1 || $etape->ville_position == 7)
                          <i class="mdi mdi-checkbox-blank-circle"></i>
                        @else
                          <i class="mdi mdi-subdirectory-arrow-right ville_Etape"></i>
                        @endif
                        {{ $etape->ville->name }}<br>
                      </li>
                    @endforeach
                    </ul>
                  </div>
                  <div class="col s4 m4 l4">
                    
                  </div>
                </div>






              </div>
            </li>

            @endforeach
            <li>
              <div class="collapsible-header"><i class="material-icons"></i>First</div>
              <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
            </li>
          </ul>
        </div>
      </div>

    </div>
  </div>
</section>




@endsection
