<!DOCTYPE html>
<html lang="fr">

<head>
    <title>{{ $page_title }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/libs/materialize/css/materialize.min.css" rel="stylesheet">
    <link href="/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/colors/color8.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/smoothScroll.css" rel="stylesheet">
    @foreach($includesCss as $inc)
    <link href="{{ $inc }}" rel="stylesheet">
    @endforeach

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="/libs/materialize/js/materialize.min.js"></script>
    <script src="/js/smoothScroll.js"></script>
    <script src="/js/jquery.easing.1.3.js"></script>
    <script src="/js/main.js"></script>
    @foreach($includesJs as $inc)
    <script src="{{ $inc }}"></script>
    @endforeach

</head>

<body class="grey lighten-2">

    <!-- Preloader -->
    <div id="preloader">
        <div class="loader">
            <svg class="circle-loader" height="50" width="50">
              <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="6" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--preloader end-->
      @if(Auth::user())
        <ul id="user-nav" class="dropdown-content" style='width: auto !important;'>
          <li><a href="{{ url('/user/me') }}"><i class="mdi mdi-face-profile pink-text left"></i>Profil</a></li>
          <li><a href="{{ url('/user/me/update') }}"><i class="mdi mdi-account-edit grey-text left"></i>Mes informations</a></li>
          <li class="divider"></li>
          <li><a href="{{ url('/user/myvehicules') }}"><i class="mdi mdi-car left brown-text"></i>Mes véhicules</a></li>
          <li class="divider"></li>
          <li><a href="{{ url('/user/mytransport') }}"><i class="mdi mdi-truck-delivery blue-text left"></i>Mes transports</a></li>
          <li><a href="{{ url('/user/mypackage') }}"><i class="mdi mdi-cube-send orange-text left"></i>Mes colis</a></li>
          <li class="divider"></li>

          <li class="red lighten-5"><a href="{{ url('/logout') }}"><i class="mdi mdi-logout left red-text"></i>Déconnexion</a></li>
        </ul>

        <header class="navbar-fixed">
            <nav>
                <div class="nav-wrapper navbar-fixed white">
                    <a href="/" class="brand-logo center"><img style="height: 50px;" src="/images/Logo.svg"></a>
                    <a href="#" data-activates="mobile-nav" class="button-collapse"><i class="mdi mdi-dots-vertical"></i></a>
                    <ul id="nav-mobile" class="left hide-on-med-and-down" style="margin-right: 25px;">
                      <li><a href="{{ url('/search') }}"><i class="mdi mdi-magnify left"></i>Rechercher</a></li>
                      <li><a href="{{ url('/addtransport') }}"><i class="mdi mdi-truck-delivery blue-text left"></i>Transporter</a></li>
                      <li><a href="{{ url('addcolis') }}"><i class="mdi mdi-cube-send orange-text left"></i>Expédier</a></li>
                    </ul>
                    <ul id="nav-mobile" class="right hide-on-med-and-down" style="margin-right: 25px;">
                      <li><a href="#" class="dropdown-button dropdown-hover" data-activates="user-nav"><i class="mdi mdi-account left green-text"></i>{{ Auth::user()->firstName}} {{ Auth::user()->lastName}}</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <mobile>
            <ul class="side-nav collapsible collapsible-accordion" id="mobile-nav">
              <li><a href="{{ url('/') }}" class="dropdown-button"><i class="mdi mdi-home small left"></i>Accueil</a></li>
              <li><a href="{{ url('/search') }}"><i class="mdi mdi-magnify small left"></i>Rechercher</a></li>
              <li><a href="{{ url('/addtransport') }}"><i class="mdi mdi-truck-delivery blue-text small left"></i>Transporter</a></li>
              <li><a href="{{ url('addcolis') }}"><i class="mdi mdi-cube-send small orange-text left"></i>Expédier</a></li>
              <li class="divider"></li>
              <li class="bold"><a class="active collapsible-header waves-effect"><i class="mdi mdi-account small green-text left"></i>Mon Compte</a>
                  <div class="collapsible-body no-padding" style="display: none;">
                      <ul>
                          <li><a href="{{ url('/user/me') }}"><i class="mdi mdi-face-profile pink-text small left"></i>Profil</a></li>
                          <li><a href="{{ url('/user/me/update') }}"><i class="mdi mdi-account-edit grey-text small left"></i>Mes informations</a></li>
                          <li class="divider"></li>
                          <li><a href="{{ url('/user/myvehicules') }}"><i class="mdi mdi-car small brown-text left"></i>Mes véhicules</a></li>
                          <li class="divider"></li>
                          <li><a href="{{ url('/user/mytransport') }}"><i class="mdi mdi-truck-delivery blue-text small left"></i>Mes transports</a></li>
                          <li><a href="{{ url('/user/mypackage') }}"><i class="mdi mdi-cube-send orange-text small left"></i>Mes colis</a></li>
                          <li class="divider"></li>
                      </ul>
                  </div>
              </li>
              <li><a class="red lighten-5" href="{{ url('/logout') }}" class="dropdown-button"><i class="mdi mdi-logout small left red-text"></i>Déconnexion</a></li>
            </ul>
        </mobile>

      @else

      <header class="navbar-fixed">
          <nav>
              <div class="nav-wrapper navbar-fixed white">
                  <a href="#" class="brand-logo center"><img style="height: 50px;" src="/images/Logo.svg"></a>
                  <a href="#" data-activates="mobile-nav" class="button-collapse"><i class="mdi mdi-dots-vertical"></i></a>
                  <ul id="nav-mobile" class="right hide-on-med-and-down" style="margin-right: 25px;">
                    <li><a href="#" class="loginLink"><i class="mdi mdi-login right green-text"></i>Connexion</a></li>
                    <li><a href="#" class="registerLink"><i class="mdi mdi-account-plus right blue-text"></i>Inscription</a></li>
                  </ul>
              </div>
          </nav>
      </header>
      <mobile>
          <ul class="side-nav collapsible collapsible-accordion" id="mobile-nav">
            <li><a href="#" class="loginLink"><i class="mdi mdi-login small left green-text"></i>Connexion</a></li>
            <li><a href="#" class="registerLink"><i class="mdi mdi-account-plus small left blue-text"></i>Inscription</a></li>


          </ul>
      </mobile>

      @endif

    @yield('content')

    @include('front.partials.login_popup')
    @include('front.partials.register_popup')
</body>



</html>
