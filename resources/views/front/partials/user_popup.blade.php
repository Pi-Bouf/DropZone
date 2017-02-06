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
                        <input type="password" name="password" {{ $errors->has('password') ? 'class=uk-form-danger' : '' }} placeholder="Password...">
                        <br><strong>{{ $errors->first('password') }}</strong>
                    </div>
                    <div class="uk-form-row">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Se souvenir de moi !
                    </div>
                    <div class="uk-form-row"><button class="uk-button uk-button-primary">Connexion</button></div>
                </form>
            </div>

            <h3 class="uk-accordion-title">Inscription</h3>
            <div class="uk-accordion-content">
                COUCOUUUUUU
            </div>
        </div>
        @else
            <a href="">Mes réservations</a><br>
            <a href="">Mes transports</a><br>
            <a href="">Mon compte</a><br>
            <br><br>
            <form class="uk-form" method="post" action="{{ url('/logout') }}">
                {{ csrf_field() }}
                <div class="uk-form-row">
                    <button class="uk-button uk-button-danger">Déconnexion</button>
                </div>
            </form>
        @endif
    </div>
</div>
@if($errors->has('email'))
    <script>
        var modal = UIkit.modal("#user-popup");
        modal.show();
    </script>
@endif