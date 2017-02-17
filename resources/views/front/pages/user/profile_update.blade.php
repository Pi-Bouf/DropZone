@extends('layouts.app', [
    'menu_style' => 'scroll',
    'page_title' => 'DropZone - Mise à jour du profil',
    'includesJs' => ['/js/components/datepicker.min.js', '/js/components/lightbox.min.js', '/js/components/accordion.min.js', '/js/scrollMenu.js'],
    'includesCss' => ['/css/components/datepicker.min.css', '/css/components/accordion.gradient.min.css']]
) @section('content')

<div id="profile_update" class="landing_pages_item">
  <div class="landing_form">
    <form class="uk-form" method="POST" action="{{ url('/user/me/update') }}">
          <fieldset data-uk-margin>
              <legend>Modifier mon profil</legend>
                  {{ csrf_field() }}
                  <div class="uk-form-row">
                      <input type="text" name="firstName" {{ $errors->has('firstName') ? 'class=uk-form-danger' : '' }} placeholder="Prénom..." value="{{ $user->firstName }}" required>
                      <br><strong>{{ $errors->first('firstName') }}</strong>
                  </div>
                  <div class="uk-form-row">
                      <input type="text" name="lastName" {{ $errors->has('lastName') ? 'class=uk-form-danger' : '' }} placeholder="Nom..." value="{{ $user->lastName }}" required>
                      <br><strong>{{ $errors->first('lastName') }}</strong>
                  </div>

                  <div class="uk-form-row">
                    <input id="m" class="gender" type="radio" name="gender" value="0" @if($user->sexe=='h')checked @endif/>
                    <label for="m">Homme</label>

                    <input id="f" class="gender" type="radio" name="gender" value="1" @if($user->sexe=='f')checked @endif/>
                    <label for="f">Femme</label>

                  </div>

                  <div class="uk-form-row">
                      <input type="email" name="email" {{ $errors->has('email') ? 'class=uk-form-danger' : '' }} placeholder="Email..." value="{{ $user->email }}" required>
                      <br><strong>{{ $errors->first('email') }}</strong>
                  </div>


                  <div class="uk-form-row">
                      <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="birthday" name="reg_birthday" {{ $errors->has('reg_birthday') ? 'class=uk-form-danger' : '' }} placeholder="Date de naissance..." value="{{ $user->birthday }}" required>
                      <br><strong>{{ $errors->first('reg_birthday') }}</strong>
                  </div>

                  <div class="uk-form-row">
                      <input type="text" name="phone" {{ $errors->has('phone') ? 'class=uk-form-danger' : '' }} placeholder="Téléphone..." value="{{ $user->phone }}" required>
                      <br><strong>{{ $errors->first('phone') }}</strong>
                  </div>


                  <textarea placeholder="Dévrivez vous en quelques lignes..." name="description" {{ $errors->has('description') ? 'class=uk-form-danger' : '' }}>{{ $user->description }}</textarea>


                  <div class="uk-form-row"><button class="uk-button uk-button-primary">Enregistrer</button></div>
          </fieldset>
      </form>
  </div>
</div>




@endsection
