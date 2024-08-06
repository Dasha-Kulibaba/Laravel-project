@extends('layouts.main')


@section('content')
<section class="main__lessons lessons">
	<div class="lessons__container">
		<h1 class="lessons__title title">
			Lessons list:
		</h1>
		<ul class="lessons__topics">
			@foreach ($les as $l)
			@foreach ($l->lessons as $item)
			<div class="lessons__item list__item">
				<a href="{{ route('lesson.show', $item->id) }}" class="lessons__link">{!! $item->les_topic !!}</a>
				@can('view', auth()->user())
				<p class="list__group">{{$item->groups->group_name}}</p>
				<div class="edit__menu">
					<a href="{{ route('lesson.edit', $item->id) }}">edit</a>
					<form action="{{ route('lesson.delete', $item->id) }}" method="post">
						@csrf
						@method('delete')
						<button type="submit">delete </button>
					</form>
					<p class="lessons__date">{{ \Carbon\Carbon::parse( $item->les_date)->format('d.m') }}</p>
				</div>
				@endcan
			</div>
			@endforeach
			@endforeach

		</ul>
		@can('view', auth()->user())
		<a href="{{ route('lesson.create') }}" class="grammar-create__add button">Add One</a>
		@endcan
	</div>
</section>
@endsection