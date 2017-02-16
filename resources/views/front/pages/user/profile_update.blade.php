@extends('layouts.app', [ 'page_title' => 'DropZone - Modification du profil', 'menu_style' => 'scroll',
'includesJs' => [],
'includesCss' => [] ])
@section('content')

<div id="profile_update" class="landing_pages_item">
  <div class="landing_form">
    <form class="uk-form" method="POST" action="{{ url('/login') }}">
          <fieldset data-uk-margin>
              <legend>Modifier mon profil</legend>
                  {{ csrf_field() }}
                  <div class="uk-form-row">
                      <input type="text" name="firstName" {{ $errors->has('firstName') ? 'class=uk-form-danger' : '' }} placeholder="Prénom...">
                      <br><strong>{{ $errors->first('firstName') }}</strong>
                  </div>
                  <div class="uk-form-row">
                      <input type="text" name="lastName" {{ $errors->has('lastName') ? 'class=uk-form-danger' : '' }} placeholder="Nom...">
                      <br><strong>{{ $errors->first('lastName') }}</strong>
                  </div>

                  <div class="uk-form-row">
                    <input id="m" class="gender" type="radio" name="gender" value="m" />
                    <label for="m">Homme</label>

                    <input id="f" class="gender" type="radio" name="gender" value="f" />
                    <label for="f">Femme</label>

                  </div>

                  <div class="uk-form-row">
                      <input type="email" name="email" {{ $errors->has('email') ? 'class=uk-form-danger' : '' }} placeholder="Email...">
                      <br><strong>{{ $errors->first('email') }}</strong>
                  </div>
                  <div class="uk-form-row">
                      <input type="date" name="birthdate" {{ $errors->has('birthdate') ? 'class=uk-form-danger' : '' }} placeholder="Date de naissance...">
                      <br><strong>{{ $errors->first('birthdate') }}</strong>
                  </div>
                  <div class="uk-form-row">
                      <input type="text" name="phone" {{ $errors->has('phone') ? 'class=uk-form-danger' : '' }} placeholder="Téléphone...">
                      <br><strong>{{ $errors->first('phone') }}</strong>
                  </div>
                  <div class="uk-form-row">
                      <input type="password" name="password" {{ $errors->has('password') ? 'class=uk-form-danger' : ''
                      }} placeholder="Password...">
                      <br><strong>{{ $errors->first('password') }}</strong>
                  </div>

                  <div class="uk-form-row"><button class="uk-button uk-button-primary">Connexion</button></div>
          </fieldset>
      </form>
  </div>
</div>




@endsection
