@extends('layouts.app', [ 'menu_style' => 'scroll',
'includesJs' => [],
'includesCss' => [] ])
@section('content')

<div id="profile" class="landing_pages_item">
    <div data-uk-scrollspy="{cls:'uk-animation-fade', delay:300}" class="landing_form">
        <div  class="uk-form">
            <fieldset data-uk-margin>
              @if(Auth::user()->id == $user->id)
                <div class="profile_header">Mon profil</div>
              @else
                <div class="profile_header">{{$user->firstName}} {{$user->lastName}}</div>
              @endif



              @if($user->picLink==null)
                <img src="../../images/icon-{{$user->sexe}}.png" class="uk-thumbnail-mini uk-border-circle" alt="">
              @else
                <img src="../../images/{{$user->picLink}}" class="uk-thumbnail-mini uk-border-circle" alt="">
              @endif

              <div class="">
                <i class="notation uk-icon-medium uk-icon-star"></i>
                <i class="notation uk-icon-medium uk-icon-star"></i>
                <i class="notation uk-icon-medium uk-icon-star"></i>
                <i class="notation uk-icon-medium uk-icon-star-half-o"></i>
                <i class="notation uk-icon-medium uk-icon-star-o"></i>
              </div>

              <p>Profil de {{$user->firstName}} {{$user->lastName}}</p>
              <p>{{$user->description}}</p>


              </div>




            </fieldset>
        </div>
    </div>
</div>



@endsection
