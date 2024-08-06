@extends('layouts.app')

@section('content')
<section class="main__login">
	<div class="container login__container">
		<h1 class="login__title title">Login</h1>
		<form method="POST" action="{{ route('login') }}">
			@csrf
			<div class="login__email">
				<label for="email" class="login__email-label">Email Address</label>
				<input id="email" type="email" class="login__email-input" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="example@gmail.com">
				@error('email')
				<p>is-invalid</p>
				@enderror
				@error('email')
				<span>
					{{ $message }}
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
			<div class="login__remember">
				<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

				<label class="form-check-label" for="remember">
					{{ __('Remember Me') }}
				</label>
			</div>

			<div class="row mb-0">
				<div class="col-md-8 offset-md-4">
					<button type="submit" class="button login__button">
						{{ __('Login') }}
					</button>

					@if (Route::has('password.request'))
					<a class="login__forgot" href="{{ route('password.request') }}">
						Forgot Your Password?
					</a>
					@endif
				</div>
			</div>
		</form>

	</div>
</section>
@endsection