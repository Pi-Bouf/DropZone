@extends('layouts.app', [ 'menu_style' => 'scroll',
'includesJs' => [],
'includesCss' => [] ])
@section('content')

<div id="profile" class="landing_pages_item">
    <div data-uk-scrollspy="{cls:'uk-animation-fade', delay:300}" class="landing_form">
        <div  class="uk-form">
            <fieldset data-uk-margin>
              @if(Auth::user()->id == $user->id)
                <legend>Mon profil</legend>
              @else
                <legend>{{$user->firstName}} {{$user->lastName}}</legend>
              @endif

              @if($user->picLink==null)
                <img src="../../images/icon-{{$user->sexe}}.png" class="uk-thumbnail-mini uk-border-circle" alt="">
              @else
              <img src="../../images/{{$user->picLink}}" class="uk-thumbnail-mini uk-border-circle" alt="">

              @endif
                  <p>Profil de {{$user->firstName}} {{$user->lastName}}</p>
                  <p>{{$user->description}}</p>

            </fieldset>
        </div>
    </div>
</div>



@endsection
