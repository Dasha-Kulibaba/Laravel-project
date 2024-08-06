<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" href="{{ asset('resources/images/Eng.svg') }}" type="image/x-icon">
	<title> InEnglish,please</title>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

	<!-- Scripts -->
	@vite([ 'resources/js/app.js'])
	@vite(['resources/css/zerostyle.css', 'resources/css/style.css'])


</head>

<body>

	<div id="app">
		<div class="wrapper"></div>
		<header class="header">
			<div class="header__container">
				<a class="navbar-brand header__logo" href="{{ url('/') }}">
					<img src="{{ Vite::asset('resources/images/red-logo.svg') }}" alt="">
				</a>
				<nav class="header__menu menu">
					<ul class="menu__list">
						@guest
						@if (Route::has('login'))
						<li class="nav-item menu__item">
							<a class="nav-link menu__link" href="{{ route('login') }}">{{ __('Login') }}</a>
						</li>
						@endif

						@if (Route::has('register'))
						<li class="nav-item menu__item">
							<a class="nav-link menu__link" href="{{ route('register') }}">{{ __('Register') }}</a>
						</li>
						@endif
						@else
						<li class="nav-item dropdown menu__item">
							<a id="navbarDropdown" class="nav-link dropdown-toggle menu__link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								{{ Auth::user()->name }}
							</a>

							<div class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
								<a class="dropdown-item menu__item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									@csrf
								</form>
							</div>
						</li>
						@endguest
						</li>
					</ul>
				</nav>
			</div>
		</header>
		<main class="py-4 main">
			@yield('content')
		</main>
	</div>
	</div>
</body>

</html>