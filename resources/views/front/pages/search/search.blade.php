@extends('layouts.app', [ 'menu_style' => 'static', 'page_title' => 'DropZone - Rechercher un colis ou un transport', 'includesJs' => [], 'includesCss' => ['/css/pages/search.css']] ) @section('content')

<section id="about" class="scroll-section root-sec padd-tb-100-30  grey lighten-5">
  <div class="container">
    <div class="row">
      <div class="clearfix ">
        test
      </div>
    </div>
  </div>
</section>

<section id="vehicule" class="scroll-section root-sec brand-bg padd-tb-60 team-wrap">
  <div class="container">
      <div class="row">
        <div class="default-vehicule">
            <div class="col s12 m12 l6 offset-l3 black-text">
              <h3 class="about-subtitle white-text center-align">Véhicule</h3>
              <div class="col s12 m6 l6">
              </div>
              <div class="col s12 m6 l6">
                <div class="person-info marg-top-15px">
                </div>
              </div>
            </div>
        </div>
        <div class="default-vehicule center-align">
          <p>Ce membre n'a pas encore ajouté de véhicule...</p>
        </div>
      </div>
  </div>
</section>

@endsection
