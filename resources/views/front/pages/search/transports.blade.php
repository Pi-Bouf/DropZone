@extends('layouts.app', [ 'menu_style' => 'static', 'page_title' => 'DropZone - Recherche de transports', 'includesJs' => ['/js/search.js'], 'includesCss' => ['/css/pages/search.css']] ) @section('content')

<section class="scroll-section root-sec padd-tb-100-30">
    <div class="row">
        <div class="col l2 m4 s12 offset-l1 offset-m1">
            <div class="card white lighten-3">
                <div class="card-content grey-text">
                    <div class="person-about">
                        <h3 class="about-subtitle">Filtres</h3>
                        <form method="post" action="#">

                            <input type="date" class="datepicker">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col l8 m6 s12">
            <div class="card white lighten-3">
                <div class="card-content grey-text">
                    <div class="person-about">
                        <h3 class="about-subtitle">Transports</h3>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection