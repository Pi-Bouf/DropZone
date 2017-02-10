<div id="user-popup" class="uk-modal">
    <div class="uk-modal-dialog modal-login">
        <a class="uk-modal-close uk-close"></a>
        @if(Auth::guest())
        <div class="uk-accordion" data-uk-accordion>
            <h3 class="uk-accordion-title" style="margin-top: 15px">Login</h3>
            <div class="uk-accordion-content">
                <form class="uk-form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    <div class="uk-form-row">
                        <input type="email" name="email" {{ $errors->has('email') ? 'class=uk-form-danger' : '' }} placeholder="Email...">
                        <br><strong>{{ $errors->first('email') }}</strong>
                    </div>
                    <div class="uk-form-row">
                        <input type="password" name="password" {{ $errors->has('password') ? 'class=uk-form-danger' : ''
                        }} placeholder="Password...">
                        <br><strong>{{ $errors->first('password') }}</strong>
                    </div>
                    <div class="uk-form-row">
                        <input type="checkbox" name="remember" {{ old( 'remember') ? 'checked' : ''}}> Se souvenir de moi
                        !
                    </div>
                    <div class="uk-form-row"><button class="uk-button uk-button-primary">Connexion</button></div>
                </form>
            </div>

            <h3 class="uk-accordion-title">Inscription</h3>
            <div class="uk-accordion-content">
                <form class="uk-form" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}
                    <div class="uk-form-row">
                        <input type="text" name="reg_firstname" {{ $errors->has('reg_firstname') ? 'class=uk-form-danger' : '' }}
                        placeholder="Prénom..." required autofocus>
                        <br><strong>{{ $errors->first('reg_firstname') }}</strong>
                    </div>
                    <div class="uk-form-row">
                        <input type="text" name="reg_lastname" {{ $errors->has('reg_lastname') ? 'class=uk-form-danger' : '' }} placeholder="Nom..." required>
                        <br><strong>{{ $errors->first('reg_lastname') }}</strong>
                    </div>
                    <div class="uk-form-row">
                        <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="birthday" name="reg_birthday" {{ $errors->has('birthday') ? 'class=uk-form-danger' : '' }} placeholder="Date de naissance..." required>
                        <br><strong>{{ $errors->first('reg_birthday') }}</strong>
                    </div>
                    <div class="uk-form-row">
                        <input type="email" name="reg_email" {{ $errors->has('reg_email') ? 'class=uk-form-danger' : '' }} placeholder="Email..."
                        required>
                        <br><strong>{{ $errors->first('reg_email') }}</strong>
                    </div>
                    <div class="uk-form-row">
                        <input type="password" name="reg_password" {{ $errors->has('reg_password') ? 'class=uk-form-danger' : ''
                        }} placeholder="Mot de passe..." required>
                        <br><strong>{{ $errors->first('reg_password') }}</strong>
                    </div>
                    <div class="uk-form-row">
                        <input type="password" name="reg_password_confirmation" placeholder="Confirmation du mot de passe..." required>
                        <br><strong>{{ $errors->first('reg_password-confirm') }}</strong>
                    </div>
                    <div class="uk-form-row"><button class="uk-button uk-button-success">Inscription</button></div>
                </form>
            </div>
        </div>
        @else
        <div class="uk-flex uk-flex-middle uk-flex-space-between uk-flex-wrap">
            <div class="uk-flex-item-1">
                <a href="{{ url('/user/mytransport') }}">
                    <span class="fi flaticon-map-1" style="font-size: 45px;"></span>
                    <div>Transports</div>
                </a>
            </div>
            <div class="uk-flex-item-1">
                <a href="{{ url('/user/myreservation') }}">
                    <span class="fi flaticon-notepad-2" style="font-size: 45px;"></span>
                    <div>Réservations</div>
                </a>
            </div>
            <div class="uk-flex-item-1">
                <a href="{{ url('/user/me') }}">
                    <span class="fi flaticon-user-5" style="font-size: 45px;"></span>
                    <div>Compte</div>
                </a>
            </div>
        </div>

        <div style="margin-top: 25px">
            <form class="uk-form" method="post" action="{{ url('/logout') }}">
                {{ csrf_field() }}
                <div class="uk-form-row">
                    <button class="uk-button uk-button-danger">Déconnexion</button>
                </div>
            </form>
        </div>
        @endif
    </div>
</div>
@if($errors->has('email'))
<script>
    var modal = UIkit.modal("#user-popup");
    modal.show();
</script>
@endif