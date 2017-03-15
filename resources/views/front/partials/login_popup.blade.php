<!-- Modal Structure -->
<div id="loginModal" class="modal">
    <div class="modal-content">
        @if(!Auth::user())
          <div class="row">
            <form class="col s12" method="post" action="{{ url('/login') }}">
              <h2 class="center-align">Connexion</h2>
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col s12 offset-m2 m8">
                        <i class="material-icons prefix mdi mdi-at"></i>
                        <input id="email" name="email" type="email" class="validate">
                        <label for="email">Email</label>
                        <strong><font color="red">{{ $errors->first('email') }}</font></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 offset-m2 m8">
                        <i class="material-icons prefix mdi mdi-key"></i>
                        <input id="password" name="password" type="password" class="validate">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class=" col s12 offset-m2 m8 center-align">
                            <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : ''}}>
                            <label for="remember">Se souvenir de moi</label>
                    </div>
                </div>
                <br />
                <div class="center-align">
                    <button class="btn waves-effect waves-light cyan darken-1" type="submit" name="action">Connexion
                            <i class="material-icons right mdi mdi-send"></i>
                    </button>
                    <a href="auth/facebook" class="btn waves-effect waves-light blue darken-1"><i class="material-icons right mdi mdi-facebook-box"></i>Facebook</a>
                </div>
            </form>
        </div>
        @endif
    </div>
</div>

@if($errors->has('email'))
<script>
    setTimeout(function() {
        $('#loginModal').modal('open');
    }, 500);
</script>
@endif
