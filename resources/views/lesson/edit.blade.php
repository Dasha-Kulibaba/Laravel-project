@extends('layouts.main')

@section('content')
<div class="main__grammar-create">
	<div class="grammar-create__container">
		<form action="{{ route('lesson.update', $lessons->id) }}" method="post" enctype="multipart/form-data" class="grammar-create__form">
			@csrf
			@method('PATCH')
			<input type="text" name="les_topic" placeholder="Topic" class="title grammar-create__topic" value="{{ $lessons->les_topic }}">
			@error('gr_topic')
			<p class="form-error__message">{{ $message }}</p>
			@enderror
			<select name="group_id">
				@foreach ($groups as $group)
				<option value="{{ $group->id }}" {{ $group->id === $lessons->groups->id ? 'selected' : '' }}>
					{{ $group->group_name }}
				</option>
				@endforeach

			</select>
			<input type="date" name="les_date" placeholder="Lesson Date" value="{{ $lessons->les_date }}">
			@foreach ($lc_content as $item)
			@switch($item->lc_type)
			@case('image')
			<div class="grammar-create__block">
				<label class="grammar-create__image">
					<input type="file" hidden="" name="lc_content{{ $index }}">
					<img src="{{ Vite::asset($item->lc_content) }}" alt="Натисніть, щоб завантажити зображення" id="previewImage0">
				</label>
				<input type="text " style="display: none;" name="id{{ $index }}" value="{{ $item->id }}">
				<select style="display: none;" name="lc_type[]">
					<option value="image" selected></option>
					<option value="text"></option>
					<option value="audio"></option>
				</select>
				<input type="text " style="display: none;" name="id{{ $index }}" value="{{ $item->id }}">
				<a href="{{ route('lesson.destroyContentForm', $item->id) }}" class="grammar-create__delete">x</a>
			</div>
			<input style="display: none;" value="{{ $index++ }}" name="index">
			@break

			@case('text')
			<div class="grammar-create__block">
				<textarea placeholder="text" required name="lc_content{{ $index }}">{!! $item->lc_content !!}</textarea>
				<select style="display: none;" name="lc_type[]">
					<option value="image"></option>
					<option value="text" selected></option>
					<option value="audio"></option>
				</select>
				<a href="{{ route('lesson.destroyContentForm', $item->id) }}" class="grammar-create__delete">x</a>
				<input type="text " style="display: none;" name="id{{ $index }}" value="{{ $item->id }}">
			</div>
			<input style="display: none;" value="{{ $index++ }}" name="index">
			@break

			@case('audio')
			<div class="grammar-create__block">
				<label class="grammar-create__image grammar-create__audio">
					<input type="file" required hidden="" name="lc_content{{ $index }}">
					<audio src="{{ Vite::asset($item->lc_content) }}" id="previewAudio0" controls></audio>
				</label>
				<select style="display: none;" name="lc_type[]">
					<option value="image"></option>
					<option value="text"></option>
					<option value="audio" selected></option>
				</select>
				<a href="{{ route('lesson.destroyContentForm', $item->id) }}" class="grammar-create__delete">x</a>
				<input type="text " style="display: none;" name="id{{ $index }}" value="{{ $item->id }}">
			</div>
			<input style="display: none;" value="{{ $index++ }}" name="index">
			@break

			@default
			@endswitch
			@endforeach
			@if (count($exer) > 0)
			<div class="lesson-topic__exercise exercise">
				<h3 class="exercise__title">Exercises</h3>
				@foreach ($exer as $item)
				<div class="grammar-create__block">
					<div class="grammar-create__exercise">
						<input name="ex_task{{ $index }}" required placeholder="task" value="{{ $item->ex_task }}">
						<div class="grammar-create__exercise__variants">
							<input type="radio" required name="ex_answer{{ $index }}" {{ $item->ex_answer == $item->ex_var1 ? 'checked' : '' }}>
							<input type="text" name="ex_var{{ $index }}_1" placeholder="variant 1" value="{{ $item->ex_var1 }}">
							<input type="radio" required name="ex_answer{{ $index }}" {{ $item->ex_answer == $item->ex_var2 ? 'checked' : '' }}>
							<input type="text" name="ex_var{{ $index }}_2" placeholder="variant 2" value="{{ $item->ex_var2 }}">
							<input type="radio" name="ex_answer{{ $index }}" {{ $item->ex_answer == $item->ex_var3 ? 'checked' : '' }}>
							<input type="text" name="ex_var{{ $index }}_3" placeholder="variant 3" value={{ $item->ex_var3 !== null ? $item->ex_var3 : '' }}>
						</div>
					</div><select style="display: none;" name="lc_type[]">
						<option value="text">text</option>
						<option value="image">image</option>
						<option value="audio">audio</option>
						<option value="rule">rule</option>
						<option value="exercise" selected="">exercise</option>
					</select>

					<a href="{{ route('lesson.destroyExerForm', $item->id) }}" class="grammar-create__delete">x</a>

					<input type="text " style="display: none;" name="id{{ $index }}" value="{{ $item->id }}">
					<input style="display: none;" value="{{ $index++ }}" name="index">
				</div>
				@endforeach
			</div>
			@endif
			<button type="submit" class="grammar-create__button button">Update</button>
		</form>
		<div class="  grammar-create__menu">
			<p class="grammar-create__add">+</p>
			<ul class="grammar-create__type">
				<li>text</li>
				<li>image</li>
				<li>audio</li>
				<li>exercise</li>
			</ul>
		</div>
	</div>
</div>
<!-- <script src="{{ Vite::asset('resources/js/script.js') }}"></script> -->
<script src="{{ Vite::asset('resources/js/updateLesson.js') }}"></script>
@endsection