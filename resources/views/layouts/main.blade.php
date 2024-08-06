<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="{{ Vite::asset('resources/images/Eng.svg') }}" type="image/x-icon">
	<title> InEnglish,please</title>
	<link href="https://fonts.googleapis.com/css?family=Exo:regular,500,700&display=swap" rel="stylesheet">
	@vite(['resources/css/zerostyle.css', 'resources/scss/style.scss'])
</head>

<body>
	<div class="wrapper">
		<header class="header">
			<div class="header__container">
				<a href="{{ route('hometasks.index') }}" class="header__logo"><img src="{{ Vite::asset('resources/images/red-logo.svg') }}" alt=""></a>
				<nav class="header__menu menu">
					<ul class="menu__list">
						<li class="menu__item"><a href="{{ route('books.index') }}" class="menu__link">Books</a></li>
						<li class="menu__item"><a href="{{ route('grammar.index') }}" class="menu__link">Grammar</a></li>
						<li class="menu__item"><a href="{{ route('lesson.index') }}" class="menu__link">Lessons</a></li>
						<li class="menu__item"><a href="{{ route('vocabulary.index') }}" class="menu__link">Vocabulary</a>
						</li>
					</ul>
				</nav>
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
							<div class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
								<a class="dropdown-item menu__link" href="{{ route('logout') }}" onclick="event.preventDefault();
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
				<a href="{{ route('profile') }}" class="header__avatar"><img src="{{ Vite::asset( Auth::user()->student!==null?Auth::user()->student->st_avatar : Auth::user()->teacher->teacher_avatar) }}" alt=""></a>
			</div>
		</header>
		<main class="main">
			@yield('content')
		</main>
		<footer class="footer">
			<div class="footer__container">
				<p class="footer__quote">
					{{$quote->q_text}}
				</p>
				<p class="footer__copyright">
					© Copyright
					<?php $year = date('Y');
					echo $year;
					?>
					| All rights reserved.
				</p>
			</div>
		</footer>
	</div>
</body>

</html>