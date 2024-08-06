@extends('layouts.main')


@section('content')
<section class="main__profile profile">
	<div class="profile__container">
		<div class="profile__head">
			<form action="{{ route('student.avatar') }}" method="post" enctype="multipart/form-data" class="profile__avatar">
				@csrf
				<label class="grammar-create__image teacher__avatar-label">
					<input type="file" hidden="" name="avatar">
					<img src="{{ Vite::asset(Auth::user()->student->st_avatar) }}" id="previewAvatar">
				</label>
			</form>
			<h1 class="profile__name">
				{{Auth::user()->name}}
			</h1>
		</div>
		<div class="profile__group">
			<p>Group:</p>
			<p>{{Auth::user()->student->group->group_name}}</p>
		</div>
	</div>
	<script src="{{ Vite::asset('resources\js\avatar.js') }}"></script>

</section>
@endsection