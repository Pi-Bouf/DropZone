@extends('layouts.app', [
    'menu_style' => 'scroll',
    'page_title' => 'DropZone - Mise à jour du profil',
    'includesJs' => ['/js/components/datepicker.min.js', '/js/components/lightbox.min.js', '/js/components/accordion.min.js', '/js/scrollMenu.js'],
    'includesCss' => ['/css/components/datepicker.min.css', '/css/components/accordion.gradient.min.css']]
) @section('content')

<section id="about" class="scroll-section root-sec padd-tb-100-30 ">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <form class="card-panel" method="POST" action="{{ url('/user/me/update') }}" enctype="multipart/form-data">
          <h3 class="about-subtitle">Modifier mes informations personnelles</h3>

          {{ csrf_field() }}
          <div class="row black-text">
            <div class="input-field col s6">
              <input type="text" id="firstName" name="firstName"  class="validate" placeholder="Prénom..." value="{{ $user->firstName }}" required>
              <label for="firstName">Prénom</label>
              <br><strong>{{ $errors->first('firstName') }}</strong>
            </div>
            <div class="input-field col s6">
              <input type="text" name="lastName" class="validate" placeholder="Nom..." value="{{ $user->lastName }}" required>
              <label for="lastName">Nom</label>
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
              <input id="profil_email" name="profil_email" type="email" class="validate" placeholder="Email..." value="{{ $user->email }}" required>
              <label for="profil_email">Adresse Email</label>
              <br><strong>{{ $errors->first('profil_email') }}</strong>
            </div>

            <div class="input-field col s12">
              <input type="date" id="birthday" name="reg_birthday" class="datepicker" value="{{ $user->birthday }}" required>
              <label for="birthday">Date de naissance</label>
              <br><strong>{{ $errors->first('reg_birthday') }}</strong>
            </div>

            <div class="input-field col s12">
              <input type="text" name="phone" class="validate" placeholder="Téléphone..." value="{{ $user->phone }}" required>
              <label for="phone">Téléphone</label>
              <br><strong>{{ $errors->first('phone') }}</strong>

            </div>
          </div>

          <div class="row black-text">
            <div class="input-field col s12">
              <textarea name="description" id="description" class="materialize-textarea">{{ $user->description }}</textarea>
              <label for="description">Décrivez-vous</label>
            </div>
          </div>

          <label class="grey-text" for="avatar">Avatar: </label><input type="file" id="avatar" name="avatar"><br /><br />

          <button class="waves-effect waves-light btn">Envoyer</button>
        </form>
      </div>

  </div>
</section>

<script>
    $(document).ready(function() {
        var $input = $('.datepicker').pickadate();
        var picker = $input.pickadate('picker');
        picker.set('select', "{{ $user->birthday or old('dateTransport') }}");
    });
</script>


@endsection
