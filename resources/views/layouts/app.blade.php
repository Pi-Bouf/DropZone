<!DOCTYPE html>
<html class="no-js">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ $page_title }}</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

	<!-- Favicon-->
	<link rel="shortcut icon" href="images/favicon.png">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="/css/normalize.css">
	<link rel="stylesheet" href="/font/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/libs/materialize/css/materialize.min.css" media="screen,projection" />
	<link rel="stylesheet" href="/css/bootstrap.css" media="screen,projection" />

	<link rel="stylesheet" href="/css/animate.min.css" media="screen,projection" />
	<link rel="stylesheet" href="/libs/sweetalert/sweet-alert.css" media="screen,projection" />

	<link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" href="/css/responsive.css">
	<link rel="stylesheet" href="/css/colors/color8.css">
	@foreach($includesCss as $inc)
	<link href="{{ $inc }}" rel="stylesheet">
	@endforeach
</head>

<body>

	<!-- Preloader -->
	<div id="preloader">
		<div class="loader">
			<svg class="circle-loader" height="50" width="50">
				<circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="6" stroke-miterlimit="10" />
			</svg>
		</div>
	</div>
	<!--preloader end-->

	<!-- Main Container -->
	<main id="app" class="main-section">
		<!-- header navigation start -->
		<header id="navigation" class="root-sec white nav">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="nav-inner">
							<nav class="primary-nav">
								<div class="clearfix nav-wrapper">
									<a href="#home" class="left brand-logo menu-smooth-scroll" data-section="#home"><img src="images/Logo.svg" alt="">
									</a>
									<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
									<ul class="right static-menu">
										<li>
											<a class="dropdown-button blog-submenu-init" href="#!" data-activates="dropdown1">
												<i class="mdi-action-account-circle right"></i>
											</a>
										</li>
									</ul>
									<ul class="inline-menu side-nav" id="mobile-demo">

										<!-- Mini Profile // only visible in Tab and Mobile -->
										<li class="mobile-profile">
											<div class="profile-inner">
												<div class="pp-container">
													<img src="images/person.png" alt="">
												</div>
												<h3>John Doe</h3>
												<h5>Creative UI/UX Expert</h5>
											</div>
										</li>


										<li>
											<a href="#home" data-section="#home" class="menu-smooth-scroll"><i class="fa fa-user fa-fw"></i>Accueil</a>
										</li>
										<li>
											<a href="#team" data-section="#team" class="menu-smooth-scroll"><i class="fa fa-users fa-fw"></i>Team</a>
										</li>
									</ul>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<!-- .container end -->
		</header>
		@yield('content')
		<footer id="footer" class="root-sec white root-sec footer-wrap">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="clearfix footer-inner">
							<ul class="left social-icons">
								<li><a href="#" class="tooltips tooltipped facebook" data-position="top" data-delay="50" data-tooltip="Facebook"><i class="fa fa-facebook"></i></a>
								</li>
								<li><a href="#" class="tooltips tooltipped linkedin" data-position="top" data-delay="50" data-tooltip="Linkdin"><i class="fa fa-linkedin"></i></a>
								</li>
								<li><a href="#" class="tooltips tooltipped twitter" data-position="top" data-delay="50" data-tooltip="Twitter"><i class="fa fa-twitter"></i></a>
								</li>
								<li><a href="#" class="tooltips tooltipped google-plus" data-position="top" data-delay="50" data-tooltip="Google Plus"><i class="fa fa-google-plus"></i></a>
								</li>
								<li><a href="#" class="tooltips tooltipped dribbble" data-position="top" data-delay="50" data-tooltip="Dribbble"><i class="fa fa-dribbble"></i></a>
								</li>
								<li><a href="#" class="tooltips tooltipped behance" data-position="top" data-delay="50" data-tooltip="Behance"><i class="fa fa-behance"></i></a>
								</li>
							</ul>
							<div class="right copyright">
								<p>Coucou
									<3</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- #footer end -->

	</main>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="/js/jquery.easing.1.3.js"></script>
	<script src="/js/detectmobilebrowser.js"></script>
	<script src="/js/waypoints.js"></script>
	<script src="/js/jquery.counterup.min.js"></script>
	<script src="/js/jquery.nicescroll.min.js"></script>
	<script src="/libs/materialize/js/materialize.min.js"></script>
	<script src="/libs/sweetalert/sweet-alert.min.js"></script>
	<script src="/js/common.js"></script>
	<script src="/js/main.js"></script>
	@foreach($includesJs as $inc)
	<script src="{{ $inc }}"></script>
	@endforeach
</body>

</html>