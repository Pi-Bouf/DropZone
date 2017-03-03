@extends('layouts.app', [ 'menu_style' => 'static', 'page_title' => 'DropZone - Rechercher un colis ou un transport', 'includesJs' => [], 'includesCss' => ['/css/pages/search.css']] ) @section('content')

<section id="search" class="scroll-section root-sec padd-tb-60 team-wrap">
    <div class="row">
        <div class="col m4 offset-m4">
            <ul id="tabs-swipe-demo" class="tabs">
                <li class="tab col m6"><a class="active" href="#transportSearch">Transport</a></li>
                <li class="tab col m6"><a href="#expeditionSearch">Expedition</a></li>
            </ul>
        </div>
    </div>
</section>

<section class="researchForm">
    <div class="row">
        <div id="transportSearch" class="col s12">
            <div class="row">
                <div class="col m6 offset-m3">
                    <div class="formBox">
                        sdfsdf
                    </div>
                </div>
            </div>
        </div>
        <div id="expeditionSearch" class="col s12">
            <div class="row">
                <div class="col m6 offset-m3">
                    <div class="formBox">
                        sdfsdf
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection