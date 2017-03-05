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
              <div class="collapsible-header"><i class="material-icons"></i>transport1</div>
              <div class="collapsible-body"><span>{{}}.</span></div>
            </li>

            @endforeach
            <li>
              <div class="collapsible-header"><i class="material-icons"></i>First</div>
              <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
            </li>

        </div>
      </div>

    </div>
  </div>
</section>




@endsection
