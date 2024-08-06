@extends('layouts.main')

@section('content')
<section class="main__profile profile">
	<div class="profile__container">
		<div class="profile__head">
			<div class="profile__avatar">
				<img src="{{ Vite::asset(Auth::user()->student!==null?Auth::user()->student->st_avatar : Auth::user()->teacher->teacher_avatar) }}" alt="">
			</div>
			<h1 class="profile__name">
				{{Auth::user()->name}}
			</h1>
		</div>
		@yield('profile')

	</div>
</section>
@endsection