@extends('layouts.main')

@section('content')
<div class="main__grammar-create">
	<div class="grammar-create__container">
		<form action="{{ route('grammar.store') }}" method="post" enctype="multipart/form-data" class="grammar-create__form">
			@csrf
			<input type="text" name="gr_topic" required placeholder="Topic" class="title grammar-create__topic">
			@error('gr_topic')
			<p class="form-error__message">{{ $message }}</p>
			@enderror
			<select name="group_id">
				@foreach ($groups as $item)
				<option value="{{ $item->id }}">{{ $item->group_name }}</option>
				@endforeach

			</select>
			@error('group_id')
			<p class="form-error__message">{{ $message }}</p>
			@enderror
			<button type="submit" class="grammar-create__button button">Create</button>
		</form>
		<div class="  grammar-create__menu">
			<p class="grammar-create__add">+</p>
			<ul class="grammar-create__type">
				<li>text</li>
				<li>image</li>
				<li>audio</li>
				<li>rule</li>
				<li>exercise</li>
			</ul>
		</div>
	</div>
</div>
<script src="{{ Vite::asset('resources/js/addGrammar.js') }}"></script>
@endsection