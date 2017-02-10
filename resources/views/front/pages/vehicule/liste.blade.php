@extends('layouts.app', [ 
    'menu_style' => 'static', 
    'page_title' => 'DropZone - Mes véhicules',
    'includesJs' => ['/js/components/accordion.min.js'],
    'includesCss' => ['/css/components/accordion.gradient.min.css']]
) 
@section('content')

<div id="vehicule" class="landing_pages_item">
  <div class="uk-accordion" data-uk-accordion>

    @foreach(Auth::user()->vehicules as $vehicule)
    <h3 class="uk-accordion-title">{{ $vehicule->marque }} {{ $vehicule->modele }}</h3>
    <div class="uk-accordion-content">...</div>
    @endforeach
  </div>
</div>

@endsection