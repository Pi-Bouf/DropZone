<!-- Modal Structure -->
<div id="loginModal" class="modal">
    <div class="modal-content">
        @if(Auth::user())
        <form class="col s12" method="post" action="{{ url('/logout') }}">
        {{ csrf_field() }}
            <div class="center-align">

                <div class="row">
                 <div class="col s12 m4 l4">
                      <a href="{{ url('/user/me') }}" style="width:100%;" class="btn btn-large waves-effect waves-light blue darken-1 white-text">Mon Profil</a>
                 </div>
                 <div class="col s12 m4 l4">
                      <a href="{{ url('/user/me/update') }}" style="width:100%;" class="btn btn-large waves-effect waves-light blue darken-1 white-text">Modifier mon Profil</a>
                 </div>
                 <div class="col s12 m4 l4">
                      <a href="{{ url('/user/myvehicules') }}" style="width:100%;" class="btn btn-large waves-effect waves-light green darken-1 white-text">Vehicules</a>
                 </div>
                 <div class="col s12 m4 l4">
                      <a href="{{ url('/logout') }}" style="width:100%; margin-top:15px;" class="btn btn-large waves-effect waves-light red darken-1 white-text">Déconnexion</a>
                 </div>
                </div>

            </div>
        </form>
        @else
        <div class="row">
            <form class="col s12" method="post" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col offset-m2 m8">
                        <i class="material-icons prefix mdi mdi-at"></i>
                        <input id="email" name="email" type="email" class="validate">
                        <label for="email">Email</label>
                        <strong><font color="red">{{ $errors->first('email') }}</font></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col offset-m2 m8">
                        <i class="material-icons prefix mdi mdi-key"></i>
                        <input id="password" name="password" type="password" class="validate">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="center-align">
                    <button class="btn waves-effect waves-light cyan darken-1" type="submit" name="action">Connexion
                            <i class="material-icons right mdi mdi-send"></i>
                        </button>
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
