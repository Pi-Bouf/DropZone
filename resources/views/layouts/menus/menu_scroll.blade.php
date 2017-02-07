<ul class="uk-nav uk-nav-parent-icon" data-uk-nav>
    <li class="parent"><a href="#" class="scrollTo" to="accueil"><span class="icon-menu fi flaticon-home-1"></span><span class="text-menu">Accueil</span></a></li>
    <li class="parent"><a href="#" class="scrollTo" to="expedition"><span class="icon-menu fi flaticon-archive"></span><span class="text-menu">Expedier un colis</span></a></li>
    <li class="parent"><a href="#" class="scrollTo" to="transport"><span class="icon-menu fi flaticon-paper-plane-1"></span><span class="text-menu">Proposer transport</span></a></li>
    <li class="parent"><a href="#" class="scrollTo" to="recherche"><span class="icon-menu fi flaticon-route"></span><span class="text-menu">Recherche Tansport/Colis</span></a></li>
    <li class="parent"><a href="#user-popup" data-uk-modal><span class="icon-menu fi flaticon-user-3" {{ (Auth::user()) ? "style=color:orange;" : "" }}>
        </span><span class="text-menu">
            @if(Auth::user())
                Mon compte
            @else
                Se connecter
            @endif
	    </span></a></li>
</ul>