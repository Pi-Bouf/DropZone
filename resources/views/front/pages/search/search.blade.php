<!DOCTYPE html>
<html lang="fr">

<head>
  <title></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="/css/uikit.min.css" rel="stylesheet">
  <link href="/css/app.css" rel="stylesheet">
  <script src="/js/jquery.min.js"></script>
  <script src="/js/uikit.min.js"></script>
</head>

<body>
  <div id="page" class="uk-container-expand">
    <div class="uk-grid">
      <div id="slideMenu" class="uk-width-2-10">
        <ul class="uk-nav uk-nav-parent-icon" data-uk-nav>
          <li class="parent"><a href="#">Accueil</a></li>
          <li class="uk-parent parent">
            <a href="#">Deposer</a>
            <ul class="uk-nav-sub">
              <li class="child"><a href="#">Colis</a></li>
              <li class="child"><a href="#">Transport</a></li>
            </ul>
          </li>
          <li class="parent"><i class="flaticon-search-1"></i><a href="#">Rechercher</a></li>
          <li class="parent"><a href="#">Se connecter</a></li>
        </ul>
      </div>
      <div id="content" class="uk-width-8-10 right">
        <div id="header"><img src="/images/Logo.svg" class="logo"></div>
        <div id="pages">
          <div id="rechercheInput">
            <input type="text" id="searchLieuDepart" placeholder="Lieu de départ">
            <button><=></button>
            <input type="text" id="searchLieuArrivee" placeholder="Lieu d'arrivée'">
            <input type="date" id="searchDate" placeholder="date"><br>
            <input type="submit" value="Rechercher un colis">
            <input type="submit" value="Rechercher un transport">
          </div>
          <div id="searchMap">
            api
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
