@extends('layouts.main')

@section('content')
<section class="main__hometask-create">
	<div class="hometask-create__container">
		<h1 class="hometask-create__title title">
			Hometask update
		</h1>
		<form action="{{ route('hometasks.update', $task->id) }}" method="post" class="hometask-create__form">
			@csrf
			@method('patch')
			<input type="date" name="task_deadline" placeholder="Task Deadline" value="{{ $task->task_deadline }}">
			@error('task_deadline')
			<p class="form-error__message">{{ $message }}</p>
			@enderror
			<select name="group_id">
				@foreach ($groups as $group)
				<option value="{{ $group->id }}" {{ $group->id === $task->group->id ? 'selected' : '' }}>
					{{ $group->group_name }}
				</option>
				@endforeach
			</select>
			<textarea name="task_text" placeholder="Hometask text">{{ $task->task_text }}</textarea>
			@error('task_text')
			<p class="form-error__message">{{ $message }}</p>
			@enderror
			<button type="submit" class="grammar-create__button button">Update</button>
		</form>
	</div>
</section>
@endsection