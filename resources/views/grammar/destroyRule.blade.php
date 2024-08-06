@extends('layouts.main')

@section('content')
<form action="{{ route('grammar.destroyrule', $rule) }}" method="post" id="FormDestroy">
	@csrf
	@method('delete')
	<button type="submit" class="grammar-create__delete">x</button>
</form>
<script src="{{ Vite::asset('resources/js/form.js') }}"></script>
@endsection