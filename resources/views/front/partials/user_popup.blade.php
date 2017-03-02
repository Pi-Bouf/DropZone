<!-- Modal Structure -->
<div id="loginModal" class="modal">
    <div class="modal-content">
        @if(Auth::user())
        <form class="col s12" method="post" action="{{ url('/logout') }}">
            <div class="center-align">
                <button class="btn waves-effect waves-light red darken-1" type="submit" name="action">
                    Déconnexion
                    <i class="material-icons right mdi mdi-cancel"></i>
                </button>
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