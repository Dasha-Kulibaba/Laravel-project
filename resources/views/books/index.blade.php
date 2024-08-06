@extends('layouts.main')

@section('content')
<section class="main__books books">
	<div class="books__container">
		<h1 class="book__title title">Books:</h1>
		<div class="books__flex">
			@foreach ($books as $item)
			@foreach ($item->books as $book)
			<div class="books__item">
				<div class="books__cover">
					<img src="{{ Vite::asset($book->book_cover) }}" alt="">
				</div>
				<div class="books__info">
					<p class="books__title">
						{{ $book->book_title }}
					</p>
					<a href="{{ $book->book_link }}" target="_blank" class="books__google-link">google drive
					</a>
					<a href="{{ $book->book_download }}" target="_blank" class="books__download-link">Download</a>
					@can('view', auth()->user())
					<a href="{{ route('books.edit', $book->id) }}">edit</a>
					<form action="{{ route('books.delete', $book->id) }}" method="post">
						@csrf
						@method('delete')
						<button type="submit">delete </button>
					</form>
					@endcan
				</div>
			</div>
			@endforeach
			@endforeach


		</div>
		@can('view', auth()->user())
		<a href="{{ route('books.create') }}" class="grammar-create__add button">Add One</a>
		@endcan
	</div>
</section>
@endsection