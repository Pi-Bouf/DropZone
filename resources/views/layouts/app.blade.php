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
					<li class="parent"><a href="#" class="scrollTo" to="transport"><span class="icon-menu fi flaticon-paper-plane-1"></span><span class="text-menu">Propose transport</span></a></li>
					<li class="parent"><a href="#" class="scrollTo" to="recherche"><span class="icon-menu fi flaticon-route"></span><span class="text-menu">Recherche Tansport/Colis</span></a></li>
					<li class="parent"><a href="#"><span class="icon-menu fi flaticon-user-3"></span><span class="text-menu">Se connecter</span></a></li>
				</ul>
			</div>
			<div id="content" class="uk-width-8-10 right">
				<div id="header"><img src="/images/Logo.svg" class="logo"></div>
				<div id="pages">
					<div id="accueil" class="pages_item">
						<div id="presentation">	
							<svg id="loader">
							<g id="loader_path">
								<path style="fill:none; stroke:#2472fb; stroke-width:2px; stroke-linecap:butt; stroke-linejoin:miter; stroke-opacity:1;"/>
							</g>
							</svg>
						</div>
					</div>
					<div id="expedition" class="pages_item">Expedition</div>
					<div id="transport" class="pages_item">Transport</div>
					<div id="recherche" class="pages_item">Recherche !</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>