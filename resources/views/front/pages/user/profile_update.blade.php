@extends('layouts.app', [
    'menu_style' => 'scroll',
    'page_title' => 'DropZone - Mise à jour du profil',
    'includesJs' => ['/js/components/datepicker.min.js', '/js/components/lightbox.min.js', '/js/components/accordion.min.js', '/js/scrollMenu.js'],
    'includesCss' => ['/css/components/datepicker.min.css', '/css/components/accordion.gradient.min.css']]
) @section('content')

<section id="about" class="scroll-section root-sec padd-tb-100-30  grey lighten-5">
  <div class="container">
    <div class="row">
    <form class="col s12">
      <h3 class="about-subtitle">Modifier mes informations personnelles</h3>

      {{ csrf_field() }}
      <div class="row black-text">
        <div class="input-field col s6">
          <input id="firstName" type="text" class="validate" {{ $errors->has('firstName') ? 'class=uk-form-danger' : '' }} placeholder="Prénom..." value="{{ $user->firstName }}" required>
          <label for="firstName">First Name</label>
          <br><strong>{{ $errors->first('firstName') }}</strong>
        </div>
        <div class="input-field col s6">
          <input type="text" name="lastName" class="validate" {{ $errors->has('lastName') ? 'class=uk-form-danger' : '' }} placeholder="Nom..." value="{{ $user->lastName }}" required>
          <label for="lastName">Last Name</label>
          <br><strong>{{ $errors->first('lastName') }}</strong>
        </div>
      </div>
      <div class="row black-text">
        <div class="input-field col s12">
          <span class="grey-text">Sexe</span>
          <p>
            <input name="sexe" type="radio" id="0" value="h" @if($user->sexe=='h')checked @endif />
            <label for="0">Homme</label>

            <input name="sexe" type="radio" id="1" value="f" @if($user->sexe=='f')checked @endif/>
            <label for="1">Femme</label>
          </p><br/>
        </div>
      </div>
      <div class="row black-text">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate" {{ $errors->has('email') ? 'class=uk-form-danger' : '' }} placeholder="Email..." value="{{ $user->email }}" required>
          <label for="email">Email</label>
          <br><strong>{{ $errors->first('email') }}</strong>
        </div>

        <div class="input-field col s12">
          <input type="text" id="birthday" name="reg_birthday" class="datepicker validate" {{ $errors->has('reg_birthday') ? 'class=uk-form-danger' : '' }} value="{{ $user->birthday }}" required>
          <label for="birthday">Date de naissance</label>
          <br><strong>{{ $errors->first('reg_birthday') }}</strong>
        </div>

        <div class="input-field col s12">
          <input type="text" name="phone" class="validate" {{ $errors->has('phone') ? 'class=uk-form-danger' : '' }} placeholder="Téléphone..." value="{{ $user->phone }}" required>
          <label for="phone">Téléphone</label>
          <br><strong>{{ $errors->first('phone') }}</strong>

        </div>
      </div>

      <div class="row black-text">
        <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea" {{ $errors->has('description') ? 'class=uk-form-danger' : '' }}>{{ $user->description }}></textarea>
          <label for="textarea1">Description</label>
        </div>
      </div>
      <button class="waves-effect waves-light btn">Envoyer</button>
    </form>
  </div>
</section>




@endsection
