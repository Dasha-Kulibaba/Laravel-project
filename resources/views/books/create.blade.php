@extends('layouts.main')

@section('content')
<section class="main__book-create">
	<div class="book-create__container">
		<h1 class="book-create__title title">Book create</h1>
		<form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="book-create__form">
			@csrf
			<select multiple name="groups[]">
				@foreach ($groups as $group)
				<option value="{{ $group->id }}" class="vocabulary-create__groups">
					{{ $group->group_name }}
				</option>
				@endforeach
			</select>

			@error('groups')
			<p class="form-error__message">{{ $message }}</p>
			@enderror
			<div class="book-create__book">
				<div class="grammar-create__block book-create__cover">
					<label class="grammar-create__image book-create__image">
						<input type="file" required hidden="" name="book_cover">
						<img src="#" alt="Натисніть, щоб завантажити зображення" id="book_cover">
					</label>
					@error('book_cover')
					<p class="form-error__message">{{ $message }}</p>
					@enderror
				</div>
				<div class="book-create__info">
					<input type="text" name="book_title" value="{{ old('book_title') }}" placeholder="Title">
					@error('book_title')
					<p class="form-error__message">{{ $message }}</p>
					@enderror
					<input type="text" name="book_link" value="{{ old('book_link') }}" placeholder="Google Drive link">
					@error('book_link')
					<p class="form-error__message">{{ $message }}</p>
					@enderror
					<p id="link-error"></p>
					<button type="submit" class="grammar-create__button button">Create</button>
				</div>
			</div>



		</form>
	</div>
	<script src="{{ Vite::asset('resources/js/bookCover.js') }}"></script>
</section>
@endsection