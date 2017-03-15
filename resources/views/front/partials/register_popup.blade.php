<!-- Modal Structure -->

<div id="registerModal" class="modal register-modal">
    <div class="modal-content register-content">
        @if(!Auth::user())
          <div class="row">
            <form class="col s12" method="post" action="{{ url('/register') }}">
              <h2 class="center-align">Inscription</h2>
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-field col s12 offset-m2 m8">
                            <input id="reg_firstname" name="reg_firstname" type="text" class="validate" {{ $errors->has('reg_firstname') ? 'class=uk-form-danger' : '' }} required>
                            <label for="reg_firstname">Prénom</label>
                            <strong><font color="red">{{ $errors->first('reg_firstname') }}</font></strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 offset-m2 m8">
                            <input id="reg_lastname" name="reg_lastname" type="text" class="validate" {{ $errors->has('reg_lastname') ? 'class=uk-form-danger' : '' }} required>
                            <label for="reg_lastname">Nom</label>
                            <strong><font color="red">{{ $errors->first('reg_lastname') }}</font></strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 offset-m2 m8">
                          <i class="material-icons prefix mdi mdi-calendar"></i>
                            <input class="datepicker" id="reg_birthday" name="reg_birthday" type="text" class="validate" onfocus="(this.type='date')" onblur="(this.type='text')" {{ $errors->has('reg_birthday') ? 'class=uk-form-danger' : '' }} required>
                            <label for="reg_birthday">Date de naissance</label>
                            <strong><font color="red">{{ $errors->first('reg_birthday') }}</font></strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 offset-m2 m8">
                          <i class="material-icons prefix mdi mdi-at"></i>
                            <input id="reg_email" name="reg_email" type="email" class="validate" {{ $errors->has('reg_email') ? 'class=uk-form-danger' : '' }} required>
                            <label for="reg_email">Adresse email</label>
                            <strong><font color="red">{{ $errors->first('reg_email') }}</font></strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 offset-m2 m8">
                          <i class="material-icons prefix mdi mdi-account-key"></i>
                            <input id="reg_password" name="reg_password" type="password" class="validate" {{ $errors->has('reg_password') ? 'class=uk-form-danger' : '' }} required>
                            <label for="reg_password">Mot de passe</label>
                            <strong><font color="red">{{ $errors->first('reg_password') }}</font></strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 offset-m2 m8">
                          <i class="material-icons prefix mdi mdi-key-plus"></i>
                            <input id="reg_password_confirmation" name="reg_password_confirmation" type="password" class="validate" {{ $errors->has('reg_password_confirmation') ? 'class=uk-form-danger' : '' }} required>
                            <label for="reg_password_confirmation">Confirmation du mot de passe</label>
                            <strong><font color="red">{{ $errors->first('reg_password_confirmation') }}</font></strong>
                        </div>
                    </div>
                    <div class="center-align">
                        <button class="btn waves-effect waves-light cyan darken-1" type="submit" name="action">Inscription
                                <i class="material-icons right mdi mdi-account-plus"></i>
                        </button>
                        <a href="auth/facebook" class="btn waves-effect waves-light blue darken-1"><i class="material-icons right mdi mdi-facebook-box"></i>Facebook</a>
                    </div>
                </form>
        </div>
        @endif
    </div>
</div>

@if($errors->has('reg_lastname') || $errors->has('reg_firstname') || $errors->has('reg_email') || $errors->has('reg_password') || $errors->has('reg_birthday'))
<script>
    setTimeout(function() {
        $('#registerModal').modal('open');
    }, 500);
</script>
@endif
