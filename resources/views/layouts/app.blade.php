<!DOCTYPE html>
<html lang="fr">

<head>
	<title></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="/css/uikit.min.css" rel="stylesheet">
	<link href="/css/components/datepicker.min.css" rel="stylesheet">
	<link href="/css/app.css" rel="stylesheet">
	<script src="/js/jquery.min.js"></script>
	<script src="/js/uikit.min.js"></script>
	<script src="/js/components/datepicker.min.js"></script>
	<script src="/js/components/lightbox.min.js"></script>
	<script src="/js/gsap/tweenmax.min.js"></script>
	<script src="/js/gsap/plugins/AttrPlugin.min.js"></script>
	<script src="/js/gsap/plugins/DrawSVGPlugin.min.js"></script>
	<script src="/js/gsap/plugins/MorphSVGPlugin.min.js"></script>
	<script src="/js/scrollMenu.js"></script>
	<script src="/js/global.js"></script>

</head>

<body>
	<div id="page" class="uk-container-expand">
		<div class="uk-grid">
			<div id="slideMenu" class="uk-width-2-10">
				<ul class="uk-nav uk-nav-parent-icon" data-uk-nav>
					<li class="parent"><a href="#" class="scrollTo" to="accueil"><span class="icon-menu fi flaticon-home-1"></span><span class="text-menu">Accueil</span></a></li>
					<li class="parent"><a href="#" class="scrollTo" to="expedition"><span class="icon-menu fi flaticon-archive"></span><span class="text-menu">Expedier un colis</span></a></li>
					<li class="parent"><a href="#" class="scrollTo" to="transport"><span class="icon-menu fi flaticon-paper-plane-1"></span><span class="text-menu">Proposer transport</span></a></li>
					<li class="parent"><a href="#" class="scrollTo" to="recherche"><span class="icon-menu fi flaticon-route"></span><span class="text-menu">Recherche Tansport/Colis</span></a></li>
					<li class="parent"><a href="#my-id" data-uk-modal><span class="icon-menu fi flaticon-user-3"></span><span class="text-menu">
					@if(Auth::user())
						Mon compte
					@else
						Se connecter
					@endif
					</span></a></li>
				</ul>
			</div>
			<div id="content" class="uk-width-8-10 right">
				<div id="header"><img src="/images/Logo.svg" class="logo"></div>
				<div id="pages">
					<div id="accueil" class="landing_pages_item">
						@yield('content')
					</div>
					<div id="expedition" class="landing_pages_item">
						<div class="landing_form">
							<form class="uk-form">
								<fieldset data-uk-margin>
									<legend>Expedier un colis</legend>
									<div class="uk-form-row"><input type="text" placeholder="qsdqsd"></div>
									<div class="uk-form-row"><input type="password" placeholder="qsdqsd"></div>
									<div class="uk-form-row">
										<input type="date" class='datePicker' placeholder="Date ramassage">
									</div>
									<div class="uk-form-row">
										<select>
											<option>Oui</option>
											<option>Non</option>
										</select>
									</div>

									<div class="uk-form-row"><button class="uk-button uk-animation-shake uk-animation-hover">Valider</button></div>
								</fieldset>
							</form>
						</div>
					</div>
					<div id="transport" class="landing_pages_item">
						<div class="landing_form">
							<form class="uk-form">
								<fieldset data-uk-margin>
									<legend>Proposer un transport</legend>
									<div class="uk-form-row"><input type="text" placeholder="qsdqsd"></div>
									<div class="uk-form-row"><input type="password" placeholder="qsdqsd"></div>
									<div class="uk-form-row">
										<select>
											<option>HEY</option>
											<option>HOY</option>
										</select>
									</div>

									<div class="uk-form-row"><button class="uk-button uk-button-primary uk-animation-shake uk-animation-hover">Valider</button></div>
								</fieldset>
							</form>
						</div>
					</div>
					<div id="recherche" class="landing_pages_item">
						<div class="landing_form">
							<form class="uk-form">
								<fieldset data-uk-margin>
									<legend>Rechercher</legend>
									<div class="uk-form-row"><input type="text" placeholder="qsdqsd"></div>
									<div class="uk-form-row"><input type="password" placeholder="qsdqsd"></div>
									<div class="uk-form-row">
										<select>
											<option>HEY</option>
											<option>HOY</option>
										</select>
									</div>

									<div class="uk-form-row"><button class="uk-button uk-button-primary uk-animation-shake uk-animation-hover">Valider</button></div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="my-id" class="uk-modal">
		<div class="uk-modal-dialog">
			<a class="uk-modal-close uk-close"></a>
					@if(Auth::user())
						<form method="post" action="{{ route('logout') }}">
						{{ csrf_field() }}
						<button class="uk-button-danger">Déconnexion</button>
						</form>
					@endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
		</div>
	</div>
</body>

</html>