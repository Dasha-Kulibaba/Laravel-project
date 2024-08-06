@extends('layouts.main')

@section('content')
<section class="main__hometasks hometasks">
	<div class="hometasks__container">
		<h1 class="hometasks__title title">
			Hometasks:
		</h1>
		<div class="hometasks__tasks tasks">
			@foreach ($tasks as $task)
			@foreach ($task->hometask->sortByDesc('task_deadline') as $item)
			<div class="tasks__item">
				<div class="tasks__head">
					<p class="tasks__date">
						{{ \Carbon\Carbon::parse($item->task_deadline)->format('d.m') }}
					</p>
					@can('view', auth()->user())
					<a href="{{ route('hometasks.edit', $item->id) }}">edit</a>
					<form action="{{ route('hometasks.delete', $item->id) }}" method="post">
						@csrf
						@method('delete')
						<button type="submit">delete </button>
					</form>
					@endcan
				</div>

				<ul class="tasks__list task-list">
					{!! $item->task_text !!}
				</ul>
			</div>
			@endforeach
			@endforeach
		</div>
		@can('view', auth()->user())
		<a href="{{ route('hometasks.create') }}" class="grammar-create__add button">Add One</a>
		@endcan
	</div>
</section>
@endsection