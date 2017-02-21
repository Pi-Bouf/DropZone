@extends('layouts.app', [ 'menu_style' => 'scroll',
'includesJs' => [],
'includesCss' => [] ])
@section('content')

<div id="profile" class="landing_pages_item">
  <div data-uk-scrollspy="{cls:'uk-animation-fade', delay:300}" class="landing_form">
    <div  class="uk-form">
      <div class="uk-grid">
        <div class="uk-width-large-1-1 uk-width-medium-1-1 uk-width-small-1-1 uk-container-center">
          <fieldset data-uk-margin>
          @if(Auth::user()->id == $user->id)
            <legend class="profile_section profile_header">Mon profil</legend>
          @else
            <legend class="profile_section profile_header">{{$user->firstName}} {{$user->lastName}}</legend>
          @endif
          </fieldset>


          @if($user->picLink==null)
            <img src="../../images/profile/icon-{{$user->sexe}}.png" class="uk-thumbnail uk-thumbnail-mini uk-border-circle" alt="">
          @else
            <img src="../../images/profile/{{$user->picLink}}" class="uk-thumbnail uk-thumbnail-mini uk-border-circle" alt="">
          @endif
          <div class="age"><b>{{$age}} ans</b></div>
          <div class="">
            <i class="notation uk-icon-medium uk-icon-star"></i>
            <i class="notation uk-icon-medium uk-icon-star"></i>
            <i class="notation uk-icon-medium uk-icon-star"></i>
            <i class="notation uk-icon-medium uk-icon-star-half-o"></i>
            <i class="notation uk-icon-medium uk-icon-star-o"></i>
          </div>
        </div>
      </div>

      <fieldset>
        <legend class="profile_section">Description</legend>
      </fieldset>
      <div class="uk-grid">
        <div class="uk-width-large-8-10 uk-width-medium-9-10 uk-width-small-1-1 uk-container-center ">
            <div class="description uk-text-left">
              {{$user->description}}
            </div>
        </div>
      </div>

      <fieldset class="profile_section">
        <legend>Véhicule</legend>
      </fieldset>
      <div class="uk-grid">
        <div class="uk-width-large-8-10 uk-width-medium-9-10 uk-width-small-1-1 uk-container-center ">
            <div class="description uk-text-left">
              //vehicule par def
            </div>
        </div>
      </div>

    </div>
  </div>
</div>




@endsection
