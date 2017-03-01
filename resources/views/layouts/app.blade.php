<!DOCTYPE html>
<html lang="fr">

<head>
	<title>{{ $page_title }}</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="/css/uikit.min.css" rel="stylesheet">
	<link href="" rel="stylesheet">
	<link href="" rel="stylesheet">
	<link href="/css/app.css" rel="stylesheet">
	@foreach($includesCss as $inc)
	<link href="{{ $inc }}" rel="stylesheet">
	@endforeach
	<script src="/js/jquery.min.js"></script>
	<script src="/js/uikit.min.js"></script>
	<script src="/js/global.js"></script>
	<script src="/js/jquery.slimscroll.min.js"></script>
	@foreach($includesJs as $inc)
	<script src="{{ $inc }}"></script>
	@endforeach

</head>

<body>
	<div id="page" class="uk-container-expand">
		<div class="uk-grid">
			<div id="slideMenu" class="uk-width-2-10">
				@if($menu_style == "scroll")
					@include('layouts.menus.menu_scroll')
				@endif
				@if($menu_style == "static")
					@include('layouts.menus.menu_static')
				@endif
			</div>
			<div id="content" class="uk-width-8-10 right">
				<div id="header"><img src="/images/Logo.svg" class="logo"></div>
				<div id="pages">
					@yield('content')
				</div>
			</div>
		</div>
	</div>
	@include('front.partials.user_popup')
</body>

</html>
