@extends('layouts.main')


@section('content')
<section class="main__grammar grammar">
	<div class="grammar__container">
		<h1 class="grammar__title title">
			Grammar list:
		</h1>
		<ul class="grammar__topics">
			@foreach ($grammar as $item)
			@foreach ($item->grammars as $topic)
			<li class="grammar__item  list__item"><a href="{{ route('grammar.show', $topic->id) }}" class="grammar__link">
					{{ $topic->gr_topic }}
				</a>
				@can('view', auth()->user())
				<p class="list__group">{{ $topic->groups->group_name }}</p>
				<div class="edit__menu">
					<a href="{{ route('grammar.edit', $topic->id) }}">edit</a>
					<form action="{{ route('grammar.delete', $topic->id) }}" method="post">
						@csrf
						@method('delete')
						<button type="submit">delete </button>
					</form>

				</div>
				@endcan
			</li>
			@endforeach
			@endforeach
		</ul>
		@can('view', auth()->user())
		<a href="{{ route('grammar.create') }}" class="grammar-create__add button">Add One</a>
		@endcan
	</div>
</section>
@endsection