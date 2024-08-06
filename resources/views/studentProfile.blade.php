@extends('layouts.main')


@section('content')
<section class="main__profile profile">
	<div class="profile__container">
		<div class="profile__head">
			<div class="profile__avatar">
				<img src="{{ Vite::asset(Auth::user()->student->st_avatar ) }}" alt="">
			</div>
			<h1 class="profile__name">
				{{Auth::user()->name}}
			</h1>
		</div>
		@yield('profile')

		<div class="profile__body profile__student-body">

			<!-- <div class="profile__progress progress">
		<progress max="100" value="60"></progress>
		<div class="progress__value">
			<div class="progress__item">0%</div>
			<div class="progress__item">60%</div>
			<div class="progress__item">100%</div>
		</div>
	</div> -->
			<div class="profile__topics profile-topics">
				<ul class="profile-topics__list">
					<li class="profile-topics__item list__item">
						<div class="profile-topics__checkbox done">
							<span></span>
						</div>
						<a href="{{ route('grammar.show', 4) }}" class="profile-topics__link lessons__link">A brief
							History of
							Mobile Phones</a>
					</li>
					@for ($i = 0; $i < 5; $i++) <li class="profile-topics__item list__item">
						<div class="profile-topics__checkbox">
							<span></span>
						</div>
						<a href="{{ route('grammar.show', 4) }}" class="profile-topics__link lessons__link">A brief
							History of
							Mobile Phones</a>
						</li>
						@endfor

				</ul>
			</div>
		</div>
	</div>
</section>
@endsection