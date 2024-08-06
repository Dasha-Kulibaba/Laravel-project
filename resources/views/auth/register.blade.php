@extends('layouts.app')

@section('content')
<section class="main__login main__register">
	<div class="container login__container">
		<h1 class="login__title title">Register</h1>
		<form method="POST" action="{{ route('register') }}">
			@csrf
			<div class="login__email register__name">
				<label for="name" class="login__email-label">Name Surname</label>
				<input id="name" type="text" class="" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name Surname">
				@error('name')
				<p>is-invalid</p>
				@enderror
				@error('name')
				<span class="invalid-feedback" role="alert">
					{{ $message }}
				</span>
				@enderror
			</div>
			<div class="login__email register__email">
				<label for="email" class="login__email-label">Email Address</label>
				<input id="email" type="email" class="login__email-input" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="example@gmail.com">
				@error('email')
				is-invalid
				@enderror
				@error('email')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>
			<div class="login__password">
				<label for="email" class="login__email-label login__password-label">Password</label>
				<input id="password" type="password" class="login__password-input" name="password" required autocomplete="current-password" placeholder="password">
				@error('password')
				<p>is-invalid</p>
				@enderror

				@error('password')
				<span class="invalid-feedback" role="alert">
					{{ $message }}
				</span>
				@enderror
			</div>
			<div class="login__password">
				<label for="password-confirm" class="login__email-label login__password-label">Confirm Password</label>
				<input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat password">
				@error('password')
				<p>is-invalid</p>
				@enderror

				@error('password')
				<span class="invalid-feedback" role="alert">
					{{ $message }}
				</span>
				@enderror
			</div>
			@if(isset($groups) && $groups!=null)
			<div class="studentcheck">
				<div class="iamst">
					<input type="checkbox" id="isSt" name="isstudent" class="">
					<label for="isstudent">Я студент</label>
				</div>
				<div class="studentgroup">
					<select name="group_id" required>
						@foreach ($groups as $item )
						<option value="{{$item->id}}">{{$item->group_name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			@endif
			<div class="login__remember">
				<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

				<label class="form-check-label" for="remember">
					{{ __('Remember Me') }}
				</label>
			</div>
			<div class="row mb-0">
				<div class="col-md-8 offset-md-4">
					<button type="submit" class="button login__button">
						{{ __('Register') }}
					</button>
				</div>
			</div>
		</form>

	</div>
	<script src="{{Vite::asset('resources\js\isStudent.js')}}">

	</script>
</section>
@endsection