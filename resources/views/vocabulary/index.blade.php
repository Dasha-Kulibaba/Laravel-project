@extends('layouts.main')

@section('content')
<section class="main__vocabulary vocabulary">
	<div class="vocabulary__container">
		<div class="vocabulary__alphabet">
			<a name="alphabet"></a>
			@foreach ($alphabet as $letter)
			<a href="#{{ $letter }}" class="vocabulary__link">
				{{ $letter }}
			</a>
			@endforeach
		</div>
		@can('view', auth()->user())
		<a href="{{ route('vocabulary.create') }}" class="grammar-create__add button">Add One</a>
		@endcan
		<div class="vocabulary__content">
			@foreach ($alphabet as $letter)
			<a href="#alphabet" name="{{ $letter }}" class="vocabulary__letter">
				{{ $letter }}
			</a>
			@foreach ($vocab as $voc)
			@foreach ($voc->vocs as $item)
			@if (Str::startsWith( strtoupper($item->voc_word[0]), $letter[0]))
			<div class="vocabulary__text">
				<p class="vocabulary__word">{{ $item->voc_word }}</p>
				<span class="vocabulary__line">-</span>
				<div class="vocabulary__info">
					<p class="vocabulary__explane">{{ $item->voc_explain }}</p>
					<ul class="vocabulary__example">
						{!! $item->voc_example !!}
					</ul>
				</div>
				@can('view', auth()->user())
				<a href="{{ route('vocabulary.edit', $item->id) }}">edit</a>
				<form action="{{ route('vocabulary.delete', $item->id) }}" method="post">
					@csrf
					@method('delete')
					<button type="submit">delete </button>
				</form>
				@endcan
			</div>
			@endif
			@endforeach
			@endforeach
			@endforeach
		</div>
	</div>
</section>
@endsection