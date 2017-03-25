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
    @foreach($includesCss as $inc)
    <link href="{{ $inc }}" rel="stylesheet">
    @endforeach

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="/libs/materialize/js/materialize.min.js"></script>
    <script src="/js/jquery.easing.1.3.js"></script>
    <script src="/js/main.js"></script>
    @foreach($includesJs as $inc)
    <script src="{{ $inc }}"></script>
    @endforeach

</head>

<body class="grey lighten-2" id="style-1">

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
          <li><a href="{{ url('/user/myrequest') }}"><i class="mdi mdi-ticket-account purple-text left"></i>Mes demandes</a></li>
          <li class="divider"></li>
          <li><a href="{{ url('/user/mytransport') }}"><i class="mdi mdi-truck-delivery blue-text left"></i>Mes transports</a></li>
          <li><a href="{{ url('/user/mypackage') }}"><i class="mdi mdi-cube-send orange-text left"></i>Mes colis</a></li>
          <li class="divider"></li>
          <li class="red lighten-5"><a href="{{ url('/logout') }}"><i class="mdi mdi-logout left red-text"></i>Déconnexion</a></li>
        </ul>

        <ul id="search-nav" class="dropdown-content" style='width: auto !important;'>
          <li><a href="{{ url('/search/expedition') }}"><i class="mdi mdi-cube-send orange-text left"></i>Une expedition</a></li>
          <li><a href="{{ url('/search/transport') }}"><i class="mdi mdi-truck-delivery blue-text left"></i>Un transport</a></li>
        </ul>

        <header class="navbar-fixed">
            <nav>
                <div class="nav-wrapper navbar-fixed white">
                    <a href="/" class="brand-logo center"><img style="height: 50px;" src="/images/Logo.svg"></a>
                    <a href="#" data-activates="mobile-nav" class="button-collapse"><i class="mdi mdi-dots-vertical"></i></a>
                    <ul id="nav-mobile" class="left hide-on-med-and-down" style="margin-right: 15px;">
                      <ul id="nav-mobile" class="left hide-on-med-and-down" style="margin-left: 15px;">
                        <li><a href="#" class="dropdown-button dropdown-hover" data-activates="search-nav"><i class="mdi mdi-magnify left grey-text"></i>Rechercher</a></li>
                      </ul>
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
              <li class="bold"><a class="collapsible-header waves-effect"><i class="mdi mdi-magnify small grey-text left"></i>Rechercher</a>
                  <div class="collapsible-body no-padding" style="display: none;">
                      <ul>
                        <li><a href="{{ url('/search/expedition') }}"><i class="mdi mdi-cube-send small orange-text left"></i>Une expedition</a></li>
                        <li><a href="{{ url('/search/transport') }}"><i class="mdi mdi-truck-delivery small blue-text left"></i>Un transport</a></li>
                        <li class="divider"></li>
                      </ul>
                  </div>
              </li>
              <li><a href="{{ url('/addtransport') }}"><i class="mdi mdi-truck-delivery blue-text small left"></i>Transporter</a></li>
              <li><a href="{{ url('addcolis') }}"><i class="mdi mdi-cube-send small orange-text left"></i>Expédier</a></li>
              <li class="divider"></li>
              <li class="bold"><a class="collapsible-header waves-effect"><i class="mdi mdi-account small green-text left"></i>Mon Compte</a>
                  <div class="collapsible-body no-padding" style="display: none;">
                      <ul>
                          <li><a href="{{ url('/user/me') }}"><i class="mdi mdi-face-profile pink-text small left"></i>Profil</a></li>
                          <li><a href="{{ url('/user/me/update') }}"><i class="mdi mdi-account-edit grey-text small left"></i>Mes informations</a></li>
                          <li class="divider"></li>
                          <li><a href="{{ url('/user/myrequest') }}"><i class="mdi mdi-ticket-account small purple-text left"></i>Mes demandes</a></li>
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

      <ul id="search-nav" class="dropdown-content" style='width: auto !important;'>
        <li><a href="{{ url('/search/transport') }}"><i class="mdi mdi-truck-delivery blue-text left"></i>Un transport</a></li>
        <li><a href="{{ url('/search/expedition') }}"><i class="mdi mdi-cube-send orange-text left"></i>Une expedition</a></li>
      </ul>

      <header class="navbar-fixed">
          <nav>
              <div class="nav-wrapper navbar-fixed white">
                <ul id="nav-mobile" class="left hide-on-med-and-down" style="margin-left: 15px;">
                  <li><a href="#" class="dropdown-button dropdown-hover" data-activates="search-nav"><i class="mdi mdi-magnify left grey-text"></i>Rechercher</a></li>
                </ul>
                  <a href="{{ url('/') }}" class="brand-logo center"><img style="height: 50px;" src="/images/Logo.svg"></a>
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


            <li class="bold"><a class="collapsible-header waves-effect"><i class="mdi mdi-magnify small grey-text left"></i>Rechercher</a>
                <div class="collapsible-body no-padding" style="display: none;">
                    <ul>
                      <li><a href="{{ url('/search/expedition') }}"><i class="mdi mdi-cube-send small orange-text left"></i>Une expedition</a></li>
                      <li><a href="{{ url('/search/transport') }}"><i class="mdi mdi-truck-delivery small blue-text left"></i>Un transport</a></li>
                      <li class="divider"></li>
                    </ul>
                </div>
            </li>


            <li><a href="#" class="loginLink"><i class="mdi mdi-login small left green-text"></i>Connexion</a></li>
            <li><a href="#" class="registerLink"><i class="mdi mdi-account-plus small left blue-text"></i>Inscription</a></li>


          </ul>
      </mobile>

      @endif

    @yield('content')

    @include('front.partials.login_popup')
    @include('front.partials.register_popup')
</body>

<footer class="darken-3 page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="grey-text white-text">DropZone</h5>
                <p class="grey-text white-text">Transportez vos colis à moindre prix !</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h4 class="footer-header grey-text white-text">Informations</h4>
                <ul>
                  <li><a class="footer-link grey-text white-text" href="#!">Comment ça marche?</a></li>
                  <li><a class="footer-link grey-text white-text" href="#!">Mentions légales</a></li>
                  <li><a class="footer-link grey-text white-text" href="#!">Foire aux questions</a></li>
                  <li><a class="footer-link grey-text white-text" href="#!">Conditions générales d'utilisation</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="grey darken-4 footer-copyright mg-t20">
            <div class="container">
            © 2017 Copyright DropZone
            <a class="grey-text text-lighten-4 right" href="http://www.gap.univ-mrs.fr/miw/">MIW 2017</a>
            </div>
          </div>
        </footer>


</html>
